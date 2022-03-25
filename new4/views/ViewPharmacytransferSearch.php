<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacytransferSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_pharmacytransfersearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fview_pharmacytransfersearch = currentAdvancedSearchForm = new ew.Form("fview_pharmacytransfersearch", "search");
    <?php } else { ?>
    fview_pharmacytransfersearch = currentForm = new ew.Form("fview_pharmacytransfersearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacytransfer")) ?>,
        fields = currentTable.fields;
    fview_pharmacytransfersearch.addFields([
        ["ORDNO", [], fields.ORDNO.isInvalid],
        ["BRCODE", [ew.Validators.integer], fields.BRCODE.isInvalid],
        ["PRC", [], fields.PRC.isInvalid],
        ["QTY", [ew.Validators.integer], fields.QTY.isInvalid],
        ["DT", [ew.Validators.datetime(0)], fields.DT.isInvalid],
        ["PC", [], fields.PC.isInvalid],
        ["YM", [], fields.YM.isInvalid],
        ["Stock", [ew.Validators.integer], fields.Stock.isInvalid],
        ["Printcheck", [], fields.Printcheck.isInvalid],
        ["id", [ew.Validators.integer], fields.id.isInvalid],
        ["grnid", [ew.Validators.integer], fields.grnid.isInvalid],
        ["poid", [ew.Validators.integer], fields.poid.isInvalid],
        ["LastMonthSale", [ew.Validators.integer], fields.LastMonthSale.isInvalid],
        ["PrName", [], fields.PrName.isInvalid],
        ["GrnQuantity", [ew.Validators.integer], fields.GrnQuantity.isInvalid],
        ["Quantity", [ew.Validators.integer], fields.Quantity.isInvalid],
        ["FreeQty", [ew.Validators.integer], fields.FreeQty.isInvalid],
        ["BatchNo", [], fields.BatchNo.isInvalid],
        ["ExpDate", [ew.Validators.datetime(0)], fields.ExpDate.isInvalid],
        ["HSN", [], fields.HSN.isInvalid],
        ["MFRCODE", [], fields.MFRCODE.isInvalid],
        ["PUnit", [ew.Validators.integer], fields.PUnit.isInvalid],
        ["SUnit", [ew.Validators.integer], fields.SUnit.isInvalid],
        ["MRP", [ew.Validators.float], fields.MRP.isInvalid],
        ["PurValue", [ew.Validators.float], fields.PurValue.isInvalid],
        ["Disc", [ew.Validators.float], fields.Disc.isInvalid],
        ["PSGST", [ew.Validators.float], fields.PSGST.isInvalid],
        ["PCGST", [ew.Validators.float], fields.PCGST.isInvalid],
        ["PTax", [ew.Validators.float], fields.PTax.isInvalid],
        ["ItemValue", [ew.Validators.float], fields.ItemValue.isInvalid],
        ["SalTax", [ew.Validators.float], fields.SalTax.isInvalid],
        ["PurRate", [ew.Validators.float], fields.PurRate.isInvalid],
        ["SalRate", [ew.Validators.float], fields.SalRate.isInvalid],
        ["Discount", [ew.Validators.float], fields.Discount.isInvalid],
        ["SSGST", [ew.Validators.float], fields.SSGST.isInvalid],
        ["SCGST", [ew.Validators.float], fields.SCGST.isInvalid],
        ["Pack", [], fields.Pack.isInvalid],
        ["GrnMRP", [ew.Validators.float], fields.GrnMRP.isInvalid],
        ["trid", [ew.Validators.integer], fields.trid.isInvalid],
        ["HospID", [ew.Validators.integer], fields.HospID.isInvalid],
        ["CreatedBy", [ew.Validators.integer], fields.CreatedBy.isInvalid],
        ["CreatedDateTime", [ew.Validators.datetime(0)], fields.CreatedDateTime.isInvalid],
        ["ModifiedBy", [ew.Validators.integer], fields.ModifiedBy.isInvalid],
        ["ModifiedDateTime", [ew.Validators.datetime(0)], fields.ModifiedDateTime.isInvalid],
        ["grncreatedby", [ew.Validators.integer], fields.grncreatedby.isInvalid],
        ["grncreatedDateTime", [ew.Validators.datetime(0)], fields.grncreatedDateTime.isInvalid],
        ["grnModifiedby", [ew.Validators.integer], fields.grnModifiedby.isInvalid],
        ["grnModifiedDateTime", [ew.Validators.datetime(0)], fields.grnModifiedDateTime.isInvalid],
        ["Received", [], fields.Received.isInvalid],
        ["BillDate", [ew.Validators.datetime(0)], fields.BillDate.isInvalid],
        ["CurStock", [ew.Validators.integer], fields.CurStock.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_pharmacytransfersearch.setInvalid();
    });

    // Validate form
    fview_pharmacytransfersearch.validate = function () {
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
    fview_pharmacytransfersearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacytransfersearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_pharmacytransfersearch.lists.ORDNO = <?= $Page->ORDNO->toClientList($Page) ?>;
    fview_pharmacytransfersearch.lists.BRCODE = <?= $Page->BRCODE->toClientList($Page) ?>;
    fview_pharmacytransfersearch.lists.LastMonthSale = <?= $Page->LastMonthSale->toClientList($Page) ?>;
    loadjs.done("fview_pharmacytransfersearch");
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
<form name="fview_pharmacytransfersearch" id="fview_pharmacytransfersearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacytransfer">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->ORDNO->Visible) { // ORDNO ?>
    <div id="r_ORDNO" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ORDNO"><?= $Page->ORDNO->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ORDNO" id="z_ORDNO" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ORDNO->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_ORDNO" class="ew-search-field ew-search-field-single">
<?php
$onchange = $Page->ORDNO->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->ORDNO->EditAttrs["onchange"] = "";
?>
<span id="as_x_ORDNO" class="ew-auto-suggest">
    <input type="<?= $Page->ORDNO->getInputTextType() ?>" class="form-control" name="sv_x_ORDNO" id="sv_x_ORDNO" value="<?= RemoveHtml($Page->ORDNO->EditValue) ?>" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->ORDNO->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->ORDNO->getPlaceHolder()) ?>"<?= $Page->ORDNO->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacytransfer" data-field="x_ORDNO" data-input="sv_x_ORDNO" data-value-separator="<?= $Page->ORDNO->displayValueSeparatorAttribute() ?>" name="x_ORDNO" id="x_ORDNO" value="<?= HtmlEncode($Page->ORDNO->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->ORDNO->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fview_pharmacytransfersearch"], function() {
    fview_pharmacytransfersearch.createAutoSuggest(Object.assign({"id":"x_ORDNO","forceSelect":false}, ew.vars.tables.view_pharmacytransfer.fields.ORDNO.autoSuggestOptions));
});
</script>
<?= $Page->ORDNO->Lookup->getParamTag($Page, "p_x_ORDNO") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <div id="r_BRCODE" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_BRCODE"><?= $Page->BRCODE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_BRCODE" id="z_BRCODE" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BRCODE->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_BRCODE" class="ew-search-field ew-search-field-single">
<?php
$onchange = $Page->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x_BRCODE" class="ew-auto-suggest">
    <input type="<?= $Page->BRCODE->getInputTextType() ?>" class="form-control" name="sv_x_BRCODE" id="sv_x_BRCODE" value="<?= RemoveHtml($Page->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>"<?= $Page->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacytransfer" data-field="x_BRCODE" data-input="sv_x_BRCODE" data-value-separator="<?= $Page->BRCODE->displayValueSeparatorAttribute() ?>" name="x_BRCODE" id="x_BRCODE" value="<?= HtmlEncode($Page->BRCODE->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fview_pharmacytransfersearch"], function() {
    fview_pharmacytransfersearch.createAutoSuggest(Object.assign({"id":"x_BRCODE","forceSelect":false}, ew.vars.tables.view_pharmacytransfer.fields.BRCODE.autoSuggestOptions));
});
</script>
<?= $Page->BRCODE->Lookup->getParamTag($Page, "p_x_BRCODE") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
    <div id="r_PRC" class="form-group row">
        <label for="x_PRC" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PRC"><?= $Page->PRC->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PRC" id="z_PRC" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRC->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_PRC" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->QTY->Visible) { // QTY ?>
    <div id="r_QTY" class="form-group row">
        <label for="x_QTY" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_QTY"><?= $Page->QTY->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_QTY" id="z_QTY" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->QTY->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_QTY" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->QTY->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_QTY" name="x_QTY" id="x_QTY" size="30" placeholder="<?= HtmlEncode($Page->QTY->getPlaceHolder()) ?>" value="<?= $Page->QTY->EditValue ?>"<?= $Page->QTY->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->QTY->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <div id="r_DT" class="form-group row">
        <label for="x_DT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_DT"><?= $Page->DT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_DT" id="z_DT" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DT->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_DT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DT->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?= HtmlEncode($Page->DT->getPlaceHolder()) ?>" value="<?= $Page->DT->EditValue ?>"<?= $Page->DT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DT->getErrorMessage(false) ?></div>
<?php if (!$Page->DT->ReadOnly && !$Page->DT->Disabled && !isset($Page->DT->EditAttrs["readonly"]) && !isset($Page->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransfersearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacytransfersearch", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
    <div id="r_PC" class="form-group row">
        <label for="x_PC" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PC"><?= $Page->PC->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PC" id="z_PC" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PC->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_PC" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PC->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->PC->getPlaceHolder()) ?>" value="<?= $Page->PC->EditValue ?>"<?= $Page->PC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PC->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
    <div id="r_YM" class="form-group row">
        <label for="x_YM" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_YM"><?= $Page->YM->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_YM" id="z_YM" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->YM->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_YM" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->YM->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->YM->getPlaceHolder()) ?>" value="<?= $Page->YM->EditValue ?>"<?= $Page->YM->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->YM->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Stock->Visible) { // Stock ?>
    <div id="r_Stock" class="form-group row">
        <label for="x_Stock" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Stock"><?= $Page->Stock->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Stock" id="z_Stock" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Stock->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_Stock" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Stock->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?= HtmlEncode($Page->Stock->getPlaceHolder()) ?>" value="<?= $Page->Stock->EditValue ?>"<?= $Page->Stock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Stock->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Printcheck->Visible) { // Printcheck ?>
    <div id="r_Printcheck" class="form-group row">
        <label for="x_Printcheck" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Printcheck"><?= $Page->Printcheck->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Printcheck" id="z_Printcheck" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Printcheck->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_Printcheck" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Printcheck->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_Printcheck" name="x_Printcheck" id="x_Printcheck" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Printcheck->getPlaceHolder()) ?>" value="<?= $Page->Printcheck->EditValue ?>"<?= $Page->Printcheck->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Printcheck->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label for="x_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_id"><?= $Page->id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->id->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_id" name="x_id" id="x_id" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->grnid->Visible) { // grnid ?>
    <div id="r_grnid" class="form-group row">
        <label for="x_grnid" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grnid"><?= $Page->grnid->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_grnid" id="z_grnid" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->grnid->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_grnid" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->grnid->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_grnid" name="x_grnid" id="x_grnid" size="30" placeholder="<?= HtmlEncode($Page->grnid->getPlaceHolder()) ?>" value="<?= $Page->grnid->EditValue ?>"<?= $Page->grnid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->grnid->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->poid->Visible) { // poid ?>
    <div id="r_poid" class="form-group row">
        <label for="x_poid" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_poid"><?= $Page->poid->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_poid" id="z_poid" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->poid->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_poid" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->poid->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_poid" name="x_poid" id="x_poid" size="30" placeholder="<?= HtmlEncode($Page->poid->getPlaceHolder()) ?>" value="<?= $Page->poid->EditValue ?>"<?= $Page->poid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->poid->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
    <div id="r_LastMonthSale" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_LastMonthSale"><?= $Page->LastMonthSale->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_LastMonthSale" id="z_LastMonthSale" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LastMonthSale->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_LastMonthSale" class="ew-search-field ew-search-field-single">
<?php
$onchange = $Page->LastMonthSale->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x_LastMonthSale" class="ew-auto-suggest">
    <input type="<?= $Page->LastMonthSale->getInputTextType() ?>" class="form-control" name="sv_x_LastMonthSale" id="sv_x_LastMonthSale" value="<?= RemoveHtml($Page->LastMonthSale->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->LastMonthSale->getPlaceHolder()) ?>"<?= $Page->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_pharmacytransfer" data-field="x_LastMonthSale" data-input="sv_x_LastMonthSale" data-value-separator="<?= $Page->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x_LastMonthSale" id="x_LastMonthSale" value="<?= HtmlEncode($Page->LastMonthSale->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->LastMonthSale->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fview_pharmacytransfersearch"], function() {
    fview_pharmacytransfersearch.createAutoSuggest(Object.assign({"id":"x_LastMonthSale","forceSelect":true}, ew.vars.tables.view_pharmacytransfer.fields.LastMonthSale.autoSuggestOptions));
});
</script>
<?= $Page->LastMonthSale->Lookup->getParamTag($Page, "p_x_LastMonthSale") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
    <div id="r_PrName" class="form-group row">
        <label for="x_PrName" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PrName"><?= $Page->PrName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PrName" id="z_PrName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrName->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_PrName" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PrName->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" value="<?= $Page->PrName->EditValue ?>"<?= $Page->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->GrnQuantity->Visible) { // GrnQuantity ?>
    <div id="r_GrnQuantity" class="form-group row">
        <label for="x_GrnQuantity" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_GrnQuantity"><?= $Page->GrnQuantity->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_GrnQuantity" id="z_GrnQuantity" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GrnQuantity->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_GrnQuantity" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->GrnQuantity->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_GrnQuantity" name="x_GrnQuantity" id="x_GrnQuantity" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->GrnQuantity->getPlaceHolder()) ?>" value="<?= $Page->GrnQuantity->EditValue ?>"<?= $Page->GrnQuantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GrnQuantity->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
    <div id="r_Quantity" class="form-group row">
        <label for="x_Quantity" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Quantity"><?= $Page->Quantity->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Quantity" id="z_Quantity" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Quantity->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_Quantity" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->FreeQty->Visible) { // FreeQty ?>
    <div id="r_FreeQty" class="form-group row">
        <label for="x_FreeQty" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_FreeQty"><?= $Page->FreeQty->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_FreeQty" id="z_FreeQty" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FreeQty->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_FreeQty" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->FreeQty->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_FreeQty" name="x_FreeQty" id="x_FreeQty" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->FreeQty->getPlaceHolder()) ?>" value="<?= $Page->FreeQty->EditValue ?>"<?= $Page->FreeQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FreeQty->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
    <div id="r_BatchNo" class="form-group row">
        <label for="x_BatchNo" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_BatchNo"><?= $Page->BatchNo->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BatchNo" id="z_BatchNo" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BatchNo->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_BatchNo" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BatchNo->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BatchNo->getPlaceHolder()) ?>" value="<?= $Page->BatchNo->EditValue ?>"<?= $Page->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BatchNo->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ExpDate->Visible) { // ExpDate ?>
    <div id="r_ExpDate" class="form-group row">
        <label for="x_ExpDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ExpDate"><?= $Page->ExpDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_ExpDate" id="z_ExpDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ExpDate->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_ExpDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ExpDate->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_ExpDate" name="x_ExpDate" id="x_ExpDate" size="12" maxlength="12" placeholder="<?= HtmlEncode($Page->ExpDate->getPlaceHolder()) ?>" value="<?= $Page->ExpDate->EditValue ?>"<?= $Page->ExpDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ExpDate->getErrorMessage(false) ?></div>
<?php if (!$Page->ExpDate->ReadOnly && !$Page->ExpDate->Disabled && !isset($Page->ExpDate->EditAttrs["readonly"]) && !isset($Page->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransfersearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacytransfersearch", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HSN->Visible) { // HSN ?>
    <div id="r_HSN" class="form-group row">
        <label for="x_HSN" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_HSN"><?= $Page->HSN->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HSN" id="z_HSN" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HSN->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_HSN" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HSN->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_HSN" name="x_HSN" id="x_HSN" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->HSN->getPlaceHolder()) ?>" value="<?= $Page->HSN->EditValue ?>"<?= $Page->HSN->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HSN->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <div id="r_MFRCODE" class="form-group row">
        <label for="x_MFRCODE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_MFRCODE"><?= $Page->MFRCODE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MFRCODE->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_MFRCODE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MFRCODE->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->MFRCODE->getPlaceHolder()) ?>" value="<?= $Page->MFRCODE->EditValue ?>"<?= $Page->MFRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
    <div id="r_PUnit" class="form-group row">
        <label for="x_PUnit" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PUnit"><?= $Page->PUnit->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PUnit" id="z_PUnit" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PUnit->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_PUnit" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PUnit->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->PUnit->getPlaceHolder()) ?>" value="<?= $Page->PUnit->EditValue ?>"<?= $Page->PUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PUnit->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SUnit->Visible) { // SUnit ?>
    <div id="r_SUnit" class="form-group row">
        <label for="x_SUnit" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SUnit"><?= $Page->SUnit->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SUnit" id="z_SUnit" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SUnit->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_SUnit" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SUnit->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->SUnit->getPlaceHolder()) ?>" value="<?= $Page->SUnit->EditValue ?>"<?= $Page->SUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SUnit->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
    <div id="r_MRP" class="form-group row">
        <label for="x_MRP" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_MRP"><?= $Page->MRP->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_MRP" id="z_MRP" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MRP->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_MRP" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MRP->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_MRP" name="x_MRP" id="x_MRP" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->MRP->getPlaceHolder()) ?>" value="<?= $Page->MRP->EditValue ?>"<?= $Page->MRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRP->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
    <div id="r_PurValue" class="form-group row">
        <label for="x_PurValue" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PurValue"><?= $Page->PurValue->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PurValue" id="z_PurValue" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurValue->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_PurValue" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PurValue->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->PurValue->getPlaceHolder()) ?>" value="<?= $Page->PurValue->EditValue ?>"<?= $Page->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurValue->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Disc->Visible) { // Disc ?>
    <div id="r_Disc" class="form-group row">
        <label for="x_Disc" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Disc"><?= $Page->Disc->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Disc" id="z_Disc" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Disc->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_Disc" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Disc->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_Disc" name="x_Disc" id="x_Disc" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->Disc->getPlaceHolder()) ?>" value="<?= $Page->Disc->EditValue ?>"<?= $Page->Disc->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Disc->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
    <div id="r_PSGST" class="form-group row">
        <label for="x_PSGST" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PSGST"><?= $Page->PSGST->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PSGST" id="z_PSGST" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PSGST->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_PSGST" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PSGST->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->PSGST->getPlaceHolder()) ?>" value="<?= $Page->PSGST->EditValue ?>"<?= $Page->PSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PSGST->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
    <div id="r_PCGST" class="form-group row">
        <label for="x_PCGST" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PCGST"><?= $Page->PCGST->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PCGST" id="z_PCGST" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PCGST->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_PCGST" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PCGST->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->PCGST->getPlaceHolder()) ?>" value="<?= $Page->PCGST->EditValue ?>"<?= $Page->PCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PCGST->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PTax->Visible) { // PTax ?>
    <div id="r_PTax" class="form-group row">
        <label for="x_PTax" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PTax"><?= $Page->PTax->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PTax" id="z_PTax" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PTax->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_PTax" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PTax->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_PTax" name="x_PTax" id="x_PTax" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->PTax->getPlaceHolder()) ?>" value="<?= $Page->PTax->EditValue ?>"<?= $Page->PTax->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PTax->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ItemValue->Visible) { // ItemValue ?>
    <div id="r_ItemValue" class="form-group row">
        <label for="x_ItemValue" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ItemValue"><?= $Page->ItemValue->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_ItemValue" id="z_ItemValue" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ItemValue->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_ItemValue" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ItemValue->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_ItemValue" name="x_ItemValue" id="x_ItemValue" size="10" placeholder="<?= HtmlEncode($Page->ItemValue->getPlaceHolder()) ?>" value="<?= $Page->ItemValue->EditValue ?>"<?= $Page->ItemValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ItemValue->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SalTax->Visible) { // SalTax ?>
    <div id="r_SalTax" class="form-group row">
        <label for="x_SalTax" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SalTax"><?= $Page->SalTax->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SalTax" id="z_SalTax" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SalTax->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_SalTax" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SalTax->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_SalTax" name="x_SalTax" id="x_SalTax" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->SalTax->getPlaceHolder()) ?>" value="<?= $Page->SalTax->EditValue ?>"<?= $Page->SalTax->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SalTax->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
    <div id="r_PurRate" class="form-group row">
        <label for="x_PurRate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_PurRate"><?= $Page->PurRate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PurRate" id="z_PurRate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurRate->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_PurRate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PurRate->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->PurRate->getPlaceHolder()) ?>" value="<?= $Page->PurRate->EditValue ?>"<?= $Page->PurRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurRate->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SalRate->Visible) { // SalRate ?>
    <div id="r_SalRate" class="form-group row">
        <label for="x_SalRate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SalRate"><?= $Page->SalRate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SalRate" id="z_SalRate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SalRate->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_SalRate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SalRate->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_SalRate" name="x_SalRate" id="x_SalRate" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->SalRate->getPlaceHolder()) ?>" value="<?= $Page->SalRate->EditValue ?>"<?= $Page->SalRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SalRate->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
    <div id="r_Discount" class="form-group row">
        <label for="x_Discount" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Discount"><?= $Page->Discount->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Discount" id="z_Discount" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Discount->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_Discount" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Discount->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_Discount" name="x_Discount" id="x_Discount" size="30" placeholder="<?= HtmlEncode($Page->Discount->getPlaceHolder()) ?>" value="<?= $Page->Discount->EditValue ?>"<?= $Page->Discount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Discount->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
    <div id="r_SSGST" class="form-group row">
        <label for="x_SSGST" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SSGST"><?= $Page->SSGST->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SSGST" id="z_SSGST" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SSGST->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_SSGST" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
    <div id="r_SCGST" class="form-group row">
        <label for="x_SCGST" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_SCGST"><?= $Page->SCGST->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SCGST" id="z_SCGST" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SCGST->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_SCGST" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Pack->Visible) { // Pack ?>
    <div id="r_Pack" class="form-group row">
        <label for="x_Pack" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Pack"><?= $Page->Pack->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Pack" id="z_Pack" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pack->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_Pack" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Pack->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_Pack" name="x_Pack" id="x_Pack" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pack->getPlaceHolder()) ?>" value="<?= $Page->Pack->EditValue ?>"<?= $Page->Pack->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Pack->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->GrnMRP->Visible) { // GrnMRP ?>
    <div id="r_GrnMRP" class="form-group row">
        <label for="x_GrnMRP" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_GrnMRP"><?= $Page->GrnMRP->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_GrnMRP" id="z_GrnMRP" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GrnMRP->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_GrnMRP" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->GrnMRP->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_GrnMRP" name="x_GrnMRP" id="x_GrnMRP" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->GrnMRP->getPlaceHolder()) ?>" value="<?= $Page->GrnMRP->EditValue ?>"<?= $Page->GrnMRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GrnMRP->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->trid->Visible) { // trid ?>
    <div id="r_trid" class="form-group row">
        <label for="x_trid" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_trid"><?= $Page->trid->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_trid" id="z_trid" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->trid->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_trid" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->trid->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_trid" name="x_trid" id="x_trid" size="30" placeholder="<?= HtmlEncode($Page->trid->getPlaceHolder()) ?>" value="<?= $Page->trid->EditValue ?>"<?= $Page->trid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->trid->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_HospID"><?= $Page->HospID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_HospID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
    <div id="r_CreatedBy" class="form-group row">
        <label for="x_CreatedBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_CreatedBy"><?= $Page->CreatedBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_CreatedBy" id="z_CreatedBy" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreatedBy->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_CreatedBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CreatedBy->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" placeholder="<?= HtmlEncode($Page->CreatedBy->getPlaceHolder()) ?>" value="<?= $Page->CreatedBy->EditValue ?>"<?= $Page->CreatedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CreatedBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
    <div id="r_CreatedDateTime" class="form-group row">
        <label for="x_CreatedDateTime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_CreatedDateTime"><?= $Page->CreatedDateTime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_CreatedDateTime" id="z_CreatedDateTime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreatedDateTime->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_CreatedDateTime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CreatedDateTime->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?= HtmlEncode($Page->CreatedDateTime->getPlaceHolder()) ?>" value="<?= $Page->CreatedDateTime->EditValue ?>"<?= $Page->CreatedDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CreatedDateTime->getErrorMessage(false) ?></div>
<?php if (!$Page->CreatedDateTime->ReadOnly && !$Page->CreatedDateTime->Disabled && !isset($Page->CreatedDateTime->EditAttrs["readonly"]) && !isset($Page->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransfersearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacytransfersearch", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
    <div id="r_ModifiedBy" class="form-group row">
        <label for="x_ModifiedBy" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ModifiedBy"><?= $Page->ModifiedBy->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_ModifiedBy" id="z_ModifiedBy" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedBy->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_ModifiedBy" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ModifiedBy->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" placeholder="<?= HtmlEncode($Page->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Page->ModifiedBy->EditValue ?>"<?= $Page->ModifiedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ModifiedBy->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
    <div id="r_ModifiedDateTime" class="form-group row">
        <label for="x_ModifiedDateTime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_ModifiedDateTime"><?= $Page->ModifiedDateTime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_ModifiedDateTime" id="z_ModifiedDateTime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedDateTime->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_ModifiedDateTime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ModifiedDateTime->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" placeholder="<?= HtmlEncode($Page->ModifiedDateTime->getPlaceHolder()) ?>" value="<?= $Page->ModifiedDateTime->EditValue ?>"<?= $Page->ModifiedDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ModifiedDateTime->getErrorMessage(false) ?></div>
<?php if (!$Page->ModifiedDateTime->ReadOnly && !$Page->ModifiedDateTime->Disabled && !isset($Page->ModifiedDateTime->EditAttrs["readonly"]) && !isset($Page->ModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransfersearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacytransfersearch", "x_ModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->grncreatedby->Visible) { // grncreatedby ?>
    <div id="r_grncreatedby" class="form-group row">
        <label for="x_grncreatedby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grncreatedby"><?= $Page->grncreatedby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_grncreatedby" id="z_grncreatedby" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->grncreatedby->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_grncreatedby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->grncreatedby->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_grncreatedby" name="x_grncreatedby" id="x_grncreatedby" size="30" placeholder="<?= HtmlEncode($Page->grncreatedby->getPlaceHolder()) ?>" value="<?= $Page->grncreatedby->EditValue ?>"<?= $Page->grncreatedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->grncreatedby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
    <div id="r_grncreatedDateTime" class="form-group row">
        <label for="x_grncreatedDateTime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grncreatedDateTime"><?= $Page->grncreatedDateTime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_grncreatedDateTime" id="z_grncreatedDateTime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->grncreatedDateTime->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_grncreatedDateTime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->grncreatedDateTime->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_grncreatedDateTime" name="x_grncreatedDateTime" id="x_grncreatedDateTime" placeholder="<?= HtmlEncode($Page->grncreatedDateTime->getPlaceHolder()) ?>" value="<?= $Page->grncreatedDateTime->EditValue ?>"<?= $Page->grncreatedDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->grncreatedDateTime->getErrorMessage(false) ?></div>
<?php if (!$Page->grncreatedDateTime->ReadOnly && !$Page->grncreatedDateTime->Disabled && !isset($Page->grncreatedDateTime->EditAttrs["readonly"]) && !isset($Page->grncreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransfersearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacytransfersearch", "x_grncreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->grnModifiedby->Visible) { // grnModifiedby ?>
    <div id="r_grnModifiedby" class="form-group row">
        <label for="x_grnModifiedby" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grnModifiedby"><?= $Page->grnModifiedby->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_grnModifiedby" id="z_grnModifiedby" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->grnModifiedby->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_grnModifiedby" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->grnModifiedby->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_grnModifiedby" name="x_grnModifiedby" id="x_grnModifiedby" size="30" placeholder="<?= HtmlEncode($Page->grnModifiedby->getPlaceHolder()) ?>" value="<?= $Page->grnModifiedby->EditValue ?>"<?= $Page->grnModifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->grnModifiedby->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
    <div id="r_grnModifiedDateTime" class="form-group row">
        <label for="x_grnModifiedDateTime" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_grnModifiedDateTime"><?= $Page->grnModifiedDateTime->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_grnModifiedDateTime" id="z_grnModifiedDateTime" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->grnModifiedDateTime->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_grnModifiedDateTime" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->grnModifiedDateTime->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_grnModifiedDateTime" name="x_grnModifiedDateTime" id="x_grnModifiedDateTime" placeholder="<?= HtmlEncode($Page->grnModifiedDateTime->getPlaceHolder()) ?>" value="<?= $Page->grnModifiedDateTime->EditValue ?>"<?= $Page->grnModifiedDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->grnModifiedDateTime->getErrorMessage(false) ?></div>
<?php if (!$Page->grnModifiedDateTime->ReadOnly && !$Page->grnModifiedDateTime->Disabled && !isset($Page->grnModifiedDateTime->EditAttrs["readonly"]) && !isset($Page->grnModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransfersearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacytransfersearch", "x_grnModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Received->Visible) { // Received ?>
    <div id="r_Received" class="form-group row">
        <label for="x_Received" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_Received"><?= $Page->Received->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Received" id="z_Received" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Received->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_Received" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->Received->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_Received" name="x_Received" id="x_Received" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Received->getPlaceHolder()) ?>" value="<?= $Page->Received->EditValue ?>"<?= $Page->Received->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Received->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
    <div id="r_BillDate" class="form-group row">
        <label for="x_BillDate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_BillDate"><?= $Page->BillDate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_BillDate" id="z_BillDate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillDate->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_BillDate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BillDate->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_BillDate" name="x_BillDate" id="x_BillDate" placeholder="<?= HtmlEncode($Page->BillDate->getPlaceHolder()) ?>" value="<?= $Page->BillDate->EditValue ?>"<?= $Page->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillDate->getErrorMessage(false) ?></div>
<?php if (!$Page->BillDate->ReadOnly && !$Page->BillDate->Disabled && !isset($Page->BillDate->EditAttrs["readonly"]) && !isset($Page->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacytransfersearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacytransfersearch", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CurStock->Visible) { // CurStock ?>
    <div id="r_CurStock" class="form-group row">
        <label for="x_CurStock" class="<?= $Page->LeftColumnClass ?>"><span id="elh_view_pharmacytransfer_CurStock"><?= $Page->CurStock->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_CurStock" id="z_CurStock" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CurStock->cellAttributes() ?>>
            <span id="el_view_pharmacytransfer_CurStock" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CurStock->getInputTextType() ?>" data-table="view_pharmacytransfer" data-field="x_CurStock" name="x_CurStock" id="x_CurStock" size="30" placeholder="<?= HtmlEncode($Page->CurStock->getPlaceHolder()) ?>" value="<?= $Page->CurStock->EditValue ?>"<?= $Page->CurStock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CurStock->getErrorMessage(false) ?></div>
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
    ew.addEventHandlers("view_pharmacytransfer");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

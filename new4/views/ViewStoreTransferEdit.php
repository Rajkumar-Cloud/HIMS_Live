<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewStoreTransferEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_store_transferedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fview_store_transferedit = currentForm = new ew.Form("fview_store_transferedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_store_transfer")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_store_transfer)
        ew.vars.tables.view_store_transfer = currentTable;
    fview_store_transferedit.addFields([
        ["ORDNO", [fields.ORDNO.visible && fields.ORDNO.required ? ew.Validators.required(fields.ORDNO.caption) : null], fields.ORDNO.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["QTY", [fields.QTY.visible && fields.QTY.required ? ew.Validators.required(fields.QTY.caption) : null, ew.Validators.integer], fields.QTY.isInvalid],
        ["DT", [fields.DT.visible && fields.DT.required ? ew.Validators.required(fields.DT.caption) : null, ew.Validators.datetime(0)], fields.DT.isInvalid],
        ["PC", [fields.PC.visible && fields.PC.required ? ew.Validators.required(fields.PC.caption) : null], fields.PC.isInvalid],
        ["YM", [fields.YM.visible && fields.YM.required ? ew.Validators.required(fields.YM.caption) : null], fields.YM.isInvalid],
        ["MFRCODE", [fields.MFRCODE.visible && fields.MFRCODE.required ? ew.Validators.required(fields.MFRCODE.caption) : null], fields.MFRCODE.isInvalid],
        ["Stock", [fields.Stock.visible && fields.Stock.required ? ew.Validators.required(fields.Stock.caption) : null, ew.Validators.integer], fields.Stock.isInvalid],
        ["LastMonthSale", [fields.LastMonthSale.visible && fields.LastMonthSale.required ? ew.Validators.required(fields.LastMonthSale.caption) : null, ew.Validators.integer], fields.LastMonthSale.isInvalid],
        ["Printcheck", [fields.Printcheck.visible && fields.Printcheck.required ? ew.Validators.required(fields.Printcheck.caption) : null], fields.Printcheck.isInvalid],
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["poid", [fields.poid.visible && fields.poid.required ? ew.Validators.required(fields.poid.caption) : null, ew.Validators.integer], fields.poid.isInvalid],
        ["grnid", [fields.grnid.visible && fields.grnid.required ? ew.Validators.required(fields.grnid.caption) : null, ew.Validators.integer], fields.grnid.isInvalid],
        ["BatchNo", [fields.BatchNo.visible && fields.BatchNo.required ? ew.Validators.required(fields.BatchNo.caption) : null], fields.BatchNo.isInvalid],
        ["ExpDate", [fields.ExpDate.visible && fields.ExpDate.required ? ew.Validators.required(fields.ExpDate.caption) : null, ew.Validators.datetime(0)], fields.ExpDate.isInvalid],
        ["PrName", [fields.PrName.visible && fields.PrName.required ? ew.Validators.required(fields.PrName.caption) : null], fields.PrName.isInvalid],
        ["Quantity", [fields.Quantity.visible && fields.Quantity.required ? ew.Validators.required(fields.Quantity.caption) : null, ew.Validators.integer], fields.Quantity.isInvalid],
        ["FreeQty", [fields.FreeQty.visible && fields.FreeQty.required ? ew.Validators.required(fields.FreeQty.caption) : null, ew.Validators.integer], fields.FreeQty.isInvalid],
        ["ItemValue", [fields.ItemValue.visible && fields.ItemValue.required ? ew.Validators.required(fields.ItemValue.caption) : null, ew.Validators.float], fields.ItemValue.isInvalid],
        ["Disc", [fields.Disc.visible && fields.Disc.required ? ew.Validators.required(fields.Disc.caption) : null, ew.Validators.float], fields.Disc.isInvalid],
        ["PTax", [fields.PTax.visible && fields.PTax.required ? ew.Validators.required(fields.PTax.caption) : null, ew.Validators.float], fields.PTax.isInvalid],
        ["MRP", [fields.MRP.visible && fields.MRP.required ? ew.Validators.required(fields.MRP.caption) : null, ew.Validators.float], fields.MRP.isInvalid],
        ["SalTax", [fields.SalTax.visible && fields.SalTax.required ? ew.Validators.required(fields.SalTax.caption) : null, ew.Validators.float], fields.SalTax.isInvalid],
        ["PurValue", [fields.PurValue.visible && fields.PurValue.required ? ew.Validators.required(fields.PurValue.caption) : null, ew.Validators.float], fields.PurValue.isInvalid],
        ["PurRate", [fields.PurRate.visible && fields.PurRate.required ? ew.Validators.required(fields.PurRate.caption) : null, ew.Validators.float], fields.PurRate.isInvalid],
        ["SalRate", [fields.SalRate.visible && fields.SalRate.required ? ew.Validators.required(fields.SalRate.caption) : null, ew.Validators.float], fields.SalRate.isInvalid],
        ["Discount", [fields.Discount.visible && fields.Discount.required ? ew.Validators.required(fields.Discount.caption) : null, ew.Validators.float], fields.Discount.isInvalid],
        ["PSGST", [fields.PSGST.visible && fields.PSGST.required ? ew.Validators.required(fields.PSGST.caption) : null, ew.Validators.float], fields.PSGST.isInvalid],
        ["PCGST", [fields.PCGST.visible && fields.PCGST.required ? ew.Validators.required(fields.PCGST.caption) : null, ew.Validators.float], fields.PCGST.isInvalid],
        ["SSGST", [fields.SSGST.visible && fields.SSGST.required ? ew.Validators.required(fields.SSGST.caption) : null, ew.Validators.float], fields.SSGST.isInvalid],
        ["SCGST", [fields.SCGST.visible && fields.SCGST.required ? ew.Validators.required(fields.SCGST.caption) : null, ew.Validators.float], fields.SCGST.isInvalid],
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null, ew.Validators.integer], fields.BRCODE.isInvalid],
        ["HSN", [fields.HSN.visible && fields.HSN.required ? ew.Validators.required(fields.HSN.caption) : null], fields.HSN.isInvalid],
        ["Pack", [fields.Pack.visible && fields.Pack.required ? ew.Validators.required(fields.Pack.caption) : null], fields.Pack.isInvalid],
        ["PUnit", [fields.PUnit.visible && fields.PUnit.required ? ew.Validators.required(fields.PUnit.caption) : null, ew.Validators.integer], fields.PUnit.isInvalid],
        ["SUnit", [fields.SUnit.visible && fields.SUnit.required ? ew.Validators.required(fields.SUnit.caption) : null, ew.Validators.integer], fields.SUnit.isInvalid],
        ["GrnQuantity", [fields.GrnQuantity.visible && fields.GrnQuantity.required ? ew.Validators.required(fields.GrnQuantity.caption) : null, ew.Validators.integer], fields.GrnQuantity.isInvalid],
        ["GrnMRP", [fields.GrnMRP.visible && fields.GrnMRP.required ? ew.Validators.required(fields.GrnMRP.caption) : null, ew.Validators.float], fields.GrnMRP.isInvalid],
        ["strid", [fields.strid.visible && fields.strid.required ? ew.Validators.required(fields.strid.caption) : null, ew.Validators.integer], fields.strid.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["CreatedBy", [fields.CreatedBy.visible && fields.CreatedBy.required ? ew.Validators.required(fields.CreatedBy.caption) : null, ew.Validators.integer], fields.CreatedBy.isInvalid],
        ["CreatedDateTime", [fields.CreatedDateTime.visible && fields.CreatedDateTime.required ? ew.Validators.required(fields.CreatedDateTime.caption) : null, ew.Validators.datetime(0)], fields.CreatedDateTime.isInvalid],
        ["ModifiedBy", [fields.ModifiedBy.visible && fields.ModifiedBy.required ? ew.Validators.required(fields.ModifiedBy.caption) : null, ew.Validators.integer], fields.ModifiedBy.isInvalid],
        ["ModifiedDateTime", [fields.ModifiedDateTime.visible && fields.ModifiedDateTime.required ? ew.Validators.required(fields.ModifiedDateTime.caption) : null, ew.Validators.datetime(0)], fields.ModifiedDateTime.isInvalid],
        ["grncreatedby", [fields.grncreatedby.visible && fields.grncreatedby.required ? ew.Validators.required(fields.grncreatedby.caption) : null], fields.grncreatedby.isInvalid],
        ["grncreatedDateTime", [fields.grncreatedDateTime.visible && fields.grncreatedDateTime.required ? ew.Validators.required(fields.grncreatedDateTime.caption) : null], fields.grncreatedDateTime.isInvalid],
        ["grnModifiedby", [fields.grnModifiedby.visible && fields.grnModifiedby.required ? ew.Validators.required(fields.grnModifiedby.caption) : null], fields.grnModifiedby.isInvalid],
        ["grnModifiedDateTime", [fields.grnModifiedDateTime.visible && fields.grnModifiedDateTime.required ? ew.Validators.required(fields.grnModifiedDateTime.caption) : null], fields.grnModifiedDateTime.isInvalid],
        ["Received", [fields.Received.visible && fields.Received.required ? ew.Validators.required(fields.Received.caption) : null], fields.Received.isInvalid],
        ["BillDate", [fields.BillDate.visible && fields.BillDate.required ? ew.Validators.required(fields.BillDate.caption) : null, ew.Validators.datetime(0)], fields.BillDate.isInvalid],
        ["CurStock", [fields.CurStock.visible && fields.CurStock.required ? ew.Validators.required(fields.CurStock.caption) : null, ew.Validators.integer], fields.CurStock.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_store_transferedit,
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
    fview_store_transferedit.validate = function () {
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

        // Process detail forms
        var dfs = $fobj.find("input[name='detailpage']").get();
        for (var i = 0; i < dfs.length; i++) {
            var df = dfs[i],
                val = df.value,
                frm = ew.forms.get(val);
            if (val && frm && !frm.validate())
                return false;
        }
        return true;
    }

    // Form_CustomValidate
    fview_store_transferedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_store_transferedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_store_transferedit.lists.ORDNO = <?= $Page->ORDNO->toClientList($Page) ?>;
    fview_store_transferedit.lists.LastMonthSale = <?= $Page->LastMonthSale->toClientList($Page) ?>;
    fview_store_transferedit.lists.BRCODE = <?= $Page->BRCODE->toClientList($Page) ?>;
    loadjs.done("fview_store_transferedit");
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
<form name="fview_store_transferedit" id="fview_store_transferedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_store_transfer">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "store_billing_transfer") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="store_billing_transfer">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->strid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->PRC->Visible) { // PRC ?>
    <div id="r_PRC" class="form-group row">
        <label id="elh_view_store_transfer_PRC" for="x_PRC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PRC->caption() ?><?= $Page->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRC->cellAttributes() ?>>
<span id="el_view_store_transfer_PRC">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?> aria-describedby="x_PRC_help">
<?= $Page->PRC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->QTY->Visible) { // QTY ?>
    <div id="r_QTY" class="form-group row">
        <label id="elh_view_store_transfer_QTY" for="x_QTY" class="<?= $Page->LeftColumnClass ?>"><?= $Page->QTY->caption() ?><?= $Page->QTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->QTY->cellAttributes() ?>>
<span id="el_view_store_transfer_QTY">
<input type="<?= $Page->QTY->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_QTY" name="x_QTY" id="x_QTY" size="30" placeholder="<?= HtmlEncode($Page->QTY->getPlaceHolder()) ?>" value="<?= $Page->QTY->EditValue ?>"<?= $Page->QTY->editAttributes() ?> aria-describedby="x_QTY_help">
<?= $Page->QTY->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->QTY->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <div id="r_DT" class="form-group row">
        <label id="elh_view_store_transfer_DT" for="x_DT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DT->caption() ?><?= $Page->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DT->cellAttributes() ?>>
<span id="el_view_store_transfer_DT">
<input type="<?= $Page->DT->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?= HtmlEncode($Page->DT->getPlaceHolder()) ?>" value="<?= $Page->DT->EditValue ?>"<?= $Page->DT->editAttributes() ?> aria-describedby="x_DT_help">
<?= $Page->DT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DT->getErrorMessage() ?></div>
<?php if (!$Page->DT->ReadOnly && !$Page->DT->Disabled && !isset($Page->DT->EditAttrs["readonly"]) && !isset($Page->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_transferedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_transferedit", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
    <div id="r_PC" class="form-group row">
        <label id="elh_view_store_transfer_PC" for="x_PC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PC->caption() ?><?= $Page->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PC->cellAttributes() ?>>
<span id="el_view_store_transfer_PC">
<input type="<?= $Page->PC->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->PC->getPlaceHolder()) ?>" value="<?= $Page->PC->EditValue ?>"<?= $Page->PC->editAttributes() ?> aria-describedby="x_PC_help">
<?= $Page->PC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
    <div id="r_YM" class="form-group row">
        <label id="elh_view_store_transfer_YM" for="x_YM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->YM->caption() ?><?= $Page->YM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->YM->cellAttributes() ?>>
<span id="el_view_store_transfer_YM">
<input type="<?= $Page->YM->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->YM->getPlaceHolder()) ?>" value="<?= $Page->YM->EditValue ?>"<?= $Page->YM->editAttributes() ?> aria-describedby="x_YM_help">
<?= $Page->YM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->YM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <div id="r_MFRCODE" class="form-group row">
        <label id="elh_view_store_transfer_MFRCODE" for="x_MFRCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MFRCODE->caption() ?><?= $Page->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el_view_store_transfer_MFRCODE">
<input type="<?= $Page->MFRCODE->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->MFRCODE->getPlaceHolder()) ?>" value="<?= $Page->MFRCODE->EditValue ?>"<?= $Page->MFRCODE->editAttributes() ?> aria-describedby="x_MFRCODE_help">
<?= $Page->MFRCODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Stock->Visible) { // Stock ?>
    <div id="r_Stock" class="form-group row">
        <label id="elh_view_store_transfer_Stock" for="x_Stock" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Stock->caption() ?><?= $Page->Stock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Stock->cellAttributes() ?>>
<span id="el_view_store_transfer_Stock">
<input type="<?= $Page->Stock->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?= HtmlEncode($Page->Stock->getPlaceHolder()) ?>" value="<?= $Page->Stock->EditValue ?>"<?= $Page->Stock->editAttributes() ?> aria-describedby="x_Stock_help">
<?= $Page->Stock->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Stock->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
    <div id="r_LastMonthSale" class="form-group row">
        <label id="elh_view_store_transfer_LastMonthSale" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LastMonthSale->caption() ?><?= $Page->LastMonthSale->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LastMonthSale->cellAttributes() ?>>
<span id="el_view_store_transfer_LastMonthSale">
<?php
$onchange = $Page->LastMonthSale->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x_LastMonthSale" class="ew-auto-suggest">
    <input type="<?= $Page->LastMonthSale->getInputTextType() ?>" class="form-control" name="sv_x_LastMonthSale" id="sv_x_LastMonthSale" value="<?= RemoveHtml($Page->LastMonthSale->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->LastMonthSale->getPlaceHolder()) ?>"<?= $Page->LastMonthSale->editAttributes() ?> aria-describedby="x_LastMonthSale_help">
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_store_transfer" data-field="x_LastMonthSale" data-input="sv_x_LastMonthSale" data-value-separator="<?= $Page->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x_LastMonthSale" id="x_LastMonthSale" value="<?= HtmlEncode($Page->LastMonthSale->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->LastMonthSale->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LastMonthSale->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_store_transferedit"], function() {
    fview_store_transferedit.createAutoSuggest(Object.assign({"id":"x_LastMonthSale","forceSelect":true}, ew.vars.tables.view_store_transfer.fields.LastMonthSale.autoSuggestOptions));
});
</script>
<?= $Page->LastMonthSale->Lookup->getParamTag($Page, "p_x_LastMonthSale") ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Printcheck->Visible) { // Printcheck ?>
    <div id="r_Printcheck" class="form-group row">
        <label id="elh_view_store_transfer_Printcheck" for="x_Printcheck" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Printcheck->caption() ?><?= $Page->Printcheck->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Printcheck->cellAttributes() ?>>
<span id="el_view_store_transfer_Printcheck">
<input type="<?= $Page->Printcheck->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_Printcheck" name="x_Printcheck" id="x_Printcheck" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Printcheck->getPlaceHolder()) ?>" value="<?= $Page->Printcheck->EditValue ?>"<?= $Page->Printcheck->editAttributes() ?> aria-describedby="x_Printcheck_help">
<?= $Page->Printcheck->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Printcheck->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_view_store_transfer_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_view_store_transfer_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->poid->Visible) { // poid ?>
    <div id="r_poid" class="form-group row">
        <label id="elh_view_store_transfer_poid" for="x_poid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->poid->caption() ?><?= $Page->poid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->poid->cellAttributes() ?>>
<span id="el_view_store_transfer_poid">
<input type="<?= $Page->poid->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_poid" name="x_poid" id="x_poid" size="30" placeholder="<?= HtmlEncode($Page->poid->getPlaceHolder()) ?>" value="<?= $Page->poid->EditValue ?>"<?= $Page->poid->editAttributes() ?> aria-describedby="x_poid_help">
<?= $Page->poid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->poid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->grnid->Visible) { // grnid ?>
    <div id="r_grnid" class="form-group row">
        <label id="elh_view_store_transfer_grnid" for="x_grnid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->grnid->caption() ?><?= $Page->grnid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->grnid->cellAttributes() ?>>
<span id="el_view_store_transfer_grnid">
<input type="<?= $Page->grnid->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_grnid" name="x_grnid" id="x_grnid" size="30" placeholder="<?= HtmlEncode($Page->grnid->getPlaceHolder()) ?>" value="<?= $Page->grnid->EditValue ?>"<?= $Page->grnid->editAttributes() ?> aria-describedby="x_grnid_help">
<?= $Page->grnid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->grnid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
    <div id="r_BatchNo" class="form-group row">
        <label id="elh_view_store_transfer_BatchNo" for="x_BatchNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BatchNo->caption() ?><?= $Page->BatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BatchNo->cellAttributes() ?>>
<span id="el_view_store_transfer_BatchNo">
<input type="<?= $Page->BatchNo->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BatchNo->getPlaceHolder()) ?>" value="<?= $Page->BatchNo->EditValue ?>"<?= $Page->BatchNo->editAttributes() ?> aria-describedby="x_BatchNo_help">
<?= $Page->BatchNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BatchNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ExpDate->Visible) { // ExpDate ?>
    <div id="r_ExpDate" class="form-group row">
        <label id="elh_view_store_transfer_ExpDate" for="x_ExpDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ExpDate->caption() ?><?= $Page->ExpDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ExpDate->cellAttributes() ?>>
<span id="el_view_store_transfer_ExpDate">
<input type="<?= $Page->ExpDate->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_ExpDate" name="x_ExpDate" id="x_ExpDate" size="12" maxlength="12" placeholder="<?= HtmlEncode($Page->ExpDate->getPlaceHolder()) ?>" value="<?= $Page->ExpDate->EditValue ?>"<?= $Page->ExpDate->editAttributes() ?> aria-describedby="x_ExpDate_help">
<?= $Page->ExpDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ExpDate->getErrorMessage() ?></div>
<?php if (!$Page->ExpDate->ReadOnly && !$Page->ExpDate->Disabled && !isset($Page->ExpDate->EditAttrs["readonly"]) && !isset($Page->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_transferedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_transferedit", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
    <div id="r_PrName" class="form-group row">
        <label id="elh_view_store_transfer_PrName" for="x_PrName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PrName->caption() ?><?= $Page->PrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrName->cellAttributes() ?>>
<span id="el_view_store_transfer_PrName">
<input type="<?= $Page->PrName->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" value="<?= $Page->PrName->EditValue ?>"<?= $Page->PrName->editAttributes() ?> aria-describedby="x_PrName_help">
<?= $Page->PrName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
    <div id="r_Quantity" class="form-group row">
        <label id="elh_view_store_transfer_Quantity" for="x_Quantity" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Quantity->caption() ?><?= $Page->Quantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Quantity->cellAttributes() ?>>
<span id="el_view_store_transfer_Quantity">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?> aria-describedby="x_Quantity_help">
<?= $Page->Quantity->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FreeQty->Visible) { // FreeQty ?>
    <div id="r_FreeQty" class="form-group row">
        <label id="elh_view_store_transfer_FreeQty" for="x_FreeQty" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FreeQty->caption() ?><?= $Page->FreeQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FreeQty->cellAttributes() ?>>
<span id="el_view_store_transfer_FreeQty">
<input type="<?= $Page->FreeQty->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_FreeQty" name="x_FreeQty" id="x_FreeQty" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->FreeQty->getPlaceHolder()) ?>" value="<?= $Page->FreeQty->EditValue ?>"<?= $Page->FreeQty->editAttributes() ?> aria-describedby="x_FreeQty_help">
<?= $Page->FreeQty->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FreeQty->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ItemValue->Visible) { // ItemValue ?>
    <div id="r_ItemValue" class="form-group row">
        <label id="elh_view_store_transfer_ItemValue" for="x_ItemValue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ItemValue->caption() ?><?= $Page->ItemValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ItemValue->cellAttributes() ?>>
<span id="el_view_store_transfer_ItemValue">
<input type="<?= $Page->ItemValue->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_ItemValue" name="x_ItemValue" id="x_ItemValue" size="10" placeholder="<?= HtmlEncode($Page->ItemValue->getPlaceHolder()) ?>" value="<?= $Page->ItemValue->EditValue ?>"<?= $Page->ItemValue->editAttributes() ?> aria-describedby="x_ItemValue_help">
<?= $Page->ItemValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ItemValue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Disc->Visible) { // Disc ?>
    <div id="r_Disc" class="form-group row">
        <label id="elh_view_store_transfer_Disc" for="x_Disc" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Disc->caption() ?><?= $Page->Disc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Disc->cellAttributes() ?>>
<span id="el_view_store_transfer_Disc">
<input type="<?= $Page->Disc->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_Disc" name="x_Disc" id="x_Disc" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->Disc->getPlaceHolder()) ?>" value="<?= $Page->Disc->EditValue ?>"<?= $Page->Disc->editAttributes() ?> aria-describedby="x_Disc_help">
<?= $Page->Disc->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Disc->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PTax->Visible) { // PTax ?>
    <div id="r_PTax" class="form-group row">
        <label id="elh_view_store_transfer_PTax" for="x_PTax" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PTax->caption() ?><?= $Page->PTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PTax->cellAttributes() ?>>
<span id="el_view_store_transfer_PTax">
<input type="<?= $Page->PTax->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_PTax" name="x_PTax" id="x_PTax" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->PTax->getPlaceHolder()) ?>" value="<?= $Page->PTax->EditValue ?>"<?= $Page->PTax->editAttributes() ?> aria-describedby="x_PTax_help">
<?= $Page->PTax->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PTax->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
    <div id="r_MRP" class="form-group row">
        <label id="elh_view_store_transfer_MRP" for="x_MRP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MRP->caption() ?><?= $Page->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MRP->cellAttributes() ?>>
<span id="el_view_store_transfer_MRP">
<input type="<?= $Page->MRP->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_MRP" name="x_MRP" id="x_MRP" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->MRP->getPlaceHolder()) ?>" value="<?= $Page->MRP->EditValue ?>"<?= $Page->MRP->editAttributes() ?> aria-describedby="x_MRP_help">
<?= $Page->MRP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MRP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SalTax->Visible) { // SalTax ?>
    <div id="r_SalTax" class="form-group row">
        <label id="elh_view_store_transfer_SalTax" for="x_SalTax" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SalTax->caption() ?><?= $Page->SalTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SalTax->cellAttributes() ?>>
<span id="el_view_store_transfer_SalTax">
<input type="<?= $Page->SalTax->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_SalTax" name="x_SalTax" id="x_SalTax" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->SalTax->getPlaceHolder()) ?>" value="<?= $Page->SalTax->EditValue ?>"<?= $Page->SalTax->editAttributes() ?> aria-describedby="x_SalTax_help">
<?= $Page->SalTax->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SalTax->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
    <div id="r_PurValue" class="form-group row">
        <label id="elh_view_store_transfer_PurValue" for="x_PurValue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PurValue->caption() ?><?= $Page->PurValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurValue->cellAttributes() ?>>
<span id="el_view_store_transfer_PurValue">
<input type="<?= $Page->PurValue->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->PurValue->getPlaceHolder()) ?>" value="<?= $Page->PurValue->EditValue ?>"<?= $Page->PurValue->editAttributes() ?> aria-describedby="x_PurValue_help">
<?= $Page->PurValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PurValue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
    <div id="r_PurRate" class="form-group row">
        <label id="elh_view_store_transfer_PurRate" for="x_PurRate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PurRate->caption() ?><?= $Page->PurRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurRate->cellAttributes() ?>>
<span id="el_view_store_transfer_PurRate">
<input type="<?= $Page->PurRate->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->PurRate->getPlaceHolder()) ?>" value="<?= $Page->PurRate->EditValue ?>"<?= $Page->PurRate->editAttributes() ?> aria-describedby="x_PurRate_help">
<?= $Page->PurRate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PurRate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SalRate->Visible) { // SalRate ?>
    <div id="r_SalRate" class="form-group row">
        <label id="elh_view_store_transfer_SalRate" for="x_SalRate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SalRate->caption() ?><?= $Page->SalRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SalRate->cellAttributes() ?>>
<span id="el_view_store_transfer_SalRate">
<input type="<?= $Page->SalRate->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_SalRate" name="x_SalRate" id="x_SalRate" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->SalRate->getPlaceHolder()) ?>" value="<?= $Page->SalRate->EditValue ?>"<?= $Page->SalRate->editAttributes() ?> aria-describedby="x_SalRate_help">
<?= $Page->SalRate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SalRate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
    <div id="r_Discount" class="form-group row">
        <label id="elh_view_store_transfer_Discount" for="x_Discount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Discount->caption() ?><?= $Page->Discount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Discount->cellAttributes() ?>>
<span id="el_view_store_transfer_Discount">
<input type="<?= $Page->Discount->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_Discount" name="x_Discount" id="x_Discount" size="30" placeholder="<?= HtmlEncode($Page->Discount->getPlaceHolder()) ?>" value="<?= $Page->Discount->EditValue ?>"<?= $Page->Discount->editAttributes() ?> aria-describedby="x_Discount_help">
<?= $Page->Discount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Discount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
    <div id="r_PSGST" class="form-group row">
        <label id="elh_view_store_transfer_PSGST" for="x_PSGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PSGST->caption() ?><?= $Page->PSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PSGST->cellAttributes() ?>>
<span id="el_view_store_transfer_PSGST">
<input type="<?= $Page->PSGST->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->PSGST->getPlaceHolder()) ?>" value="<?= $Page->PSGST->EditValue ?>"<?= $Page->PSGST->editAttributes() ?> aria-describedby="x_PSGST_help">
<?= $Page->PSGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PSGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
    <div id="r_PCGST" class="form-group row">
        <label id="elh_view_store_transfer_PCGST" for="x_PCGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PCGST->caption() ?><?= $Page->PCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PCGST->cellAttributes() ?>>
<span id="el_view_store_transfer_PCGST">
<input type="<?= $Page->PCGST->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->PCGST->getPlaceHolder()) ?>" value="<?= $Page->PCGST->EditValue ?>"<?= $Page->PCGST->editAttributes() ?> aria-describedby="x_PCGST_help">
<?= $Page->PCGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PCGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
    <div id="r_SSGST" class="form-group row">
        <label id="elh_view_store_transfer_SSGST" for="x_SSGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SSGST->caption() ?><?= $Page->SSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SSGST->cellAttributes() ?>>
<span id="el_view_store_transfer_SSGST">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?> aria-describedby="x_SSGST_help">
<?= $Page->SSGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
    <div id="r_SCGST" class="form-group row">
        <label id="elh_view_store_transfer_SCGST" for="x_SCGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SCGST->caption() ?><?= $Page->SCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SCGST->cellAttributes() ?>>
<span id="el_view_store_transfer_SCGST">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?> aria-describedby="x_SCGST_help">
<?= $Page->SCGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <div id="r_BRCODE" class="form-group row">
        <label id="elh_view_store_transfer_BRCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BRCODE->caption() ?><?= $Page->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el_view_store_transfer_BRCODE">
<?php
$onchange = $Page->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x_BRCODE" class="ew-auto-suggest">
    <input type="<?= $Page->BRCODE->getInputTextType() ?>" class="form-control" name="sv_x_BRCODE" id="sv_x_BRCODE" value="<?= RemoveHtml($Page->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>"<?= $Page->BRCODE->editAttributes() ?> aria-describedby="x_BRCODE_help">
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_store_transfer" data-field="x_BRCODE" data-input="sv_x_BRCODE" data-value-separator="<?= $Page->BRCODE->displayValueSeparatorAttribute() ?>" name="x_BRCODE" id="x_BRCODE" value="<?= HtmlEncode($Page->BRCODE->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->BRCODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_store_transferedit"], function() {
    fview_store_transferedit.createAutoSuggest(Object.assign({"id":"x_BRCODE","forceSelect":false}, ew.vars.tables.view_store_transfer.fields.BRCODE.autoSuggestOptions));
});
</script>
<?= $Page->BRCODE->Lookup->getParamTag($Page, "p_x_BRCODE") ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HSN->Visible) { // HSN ?>
    <div id="r_HSN" class="form-group row">
        <label id="elh_view_store_transfer_HSN" for="x_HSN" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HSN->caption() ?><?= $Page->HSN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HSN->cellAttributes() ?>>
<span id="el_view_store_transfer_HSN">
<input type="<?= $Page->HSN->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_HSN" name="x_HSN" id="x_HSN" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->HSN->getPlaceHolder()) ?>" value="<?= $Page->HSN->EditValue ?>"<?= $Page->HSN->editAttributes() ?> aria-describedby="x_HSN_help">
<?= $Page->HSN->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HSN->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pack->Visible) { // Pack ?>
    <div id="r_Pack" class="form-group row">
        <label id="elh_view_store_transfer_Pack" for="x_Pack" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Pack->caption() ?><?= $Page->Pack->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pack->cellAttributes() ?>>
<span id="el_view_store_transfer_Pack">
<input type="<?= $Page->Pack->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_Pack" name="x_Pack" id="x_Pack" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pack->getPlaceHolder()) ?>" value="<?= $Page->Pack->EditValue ?>"<?= $Page->Pack->editAttributes() ?> aria-describedby="x_Pack_help">
<?= $Page->Pack->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pack->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
    <div id="r_PUnit" class="form-group row">
        <label id="elh_view_store_transfer_PUnit" for="x_PUnit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PUnit->caption() ?><?= $Page->PUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PUnit->cellAttributes() ?>>
<span id="el_view_store_transfer_PUnit">
<input type="<?= $Page->PUnit->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->PUnit->getPlaceHolder()) ?>" value="<?= $Page->PUnit->EditValue ?>"<?= $Page->PUnit->editAttributes() ?> aria-describedby="x_PUnit_help">
<?= $Page->PUnit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PUnit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SUnit->Visible) { // SUnit ?>
    <div id="r_SUnit" class="form-group row">
        <label id="elh_view_store_transfer_SUnit" for="x_SUnit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SUnit->caption() ?><?= $Page->SUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SUnit->cellAttributes() ?>>
<span id="el_view_store_transfer_SUnit">
<input type="<?= $Page->SUnit->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->SUnit->getPlaceHolder()) ?>" value="<?= $Page->SUnit->EditValue ?>"<?= $Page->SUnit->editAttributes() ?> aria-describedby="x_SUnit_help">
<?= $Page->SUnit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SUnit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GrnQuantity->Visible) { // GrnQuantity ?>
    <div id="r_GrnQuantity" class="form-group row">
        <label id="elh_view_store_transfer_GrnQuantity" for="x_GrnQuantity" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GrnQuantity->caption() ?><?= $Page->GrnQuantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GrnQuantity->cellAttributes() ?>>
<span id="el_view_store_transfer_GrnQuantity">
<input type="<?= $Page->GrnQuantity->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_GrnQuantity" name="x_GrnQuantity" id="x_GrnQuantity" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->GrnQuantity->getPlaceHolder()) ?>" value="<?= $Page->GrnQuantity->EditValue ?>"<?= $Page->GrnQuantity->editAttributes() ?> aria-describedby="x_GrnQuantity_help">
<?= $Page->GrnQuantity->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GrnQuantity->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GrnMRP->Visible) { // GrnMRP ?>
    <div id="r_GrnMRP" class="form-group row">
        <label id="elh_view_store_transfer_GrnMRP" for="x_GrnMRP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GrnMRP->caption() ?><?= $Page->GrnMRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GrnMRP->cellAttributes() ?>>
<span id="el_view_store_transfer_GrnMRP">
<input type="<?= $Page->GrnMRP->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_GrnMRP" name="x_GrnMRP" id="x_GrnMRP" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->GrnMRP->getPlaceHolder()) ?>" value="<?= $Page->GrnMRP->EditValue ?>"<?= $Page->GrnMRP->editAttributes() ?> aria-describedby="x_GrnMRP_help">
<?= $Page->GrnMRP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GrnMRP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->strid->Visible) { // strid ?>
    <div id="r_strid" class="form-group row">
        <label id="elh_view_store_transfer_strid" for="x_strid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->strid->caption() ?><?= $Page->strid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->strid->cellAttributes() ?>>
<?php if ($Page->strid->getSessionValue() != "") { ?>
<span id="el_view_store_transfer_strid">
<span<?= $Page->strid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->strid->getDisplayValue($Page->strid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x_strid" name="x_strid" value="<?= HtmlEncode($Page->strid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el_view_store_transfer_strid">
<input type="<?= $Page->strid->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_strid" name="x_strid" id="x_strid" size="30" placeholder="<?= HtmlEncode($Page->strid->getPlaceHolder()) ?>" value="<?= $Page->strid->EditValue ?>"<?= $Page->strid->editAttributes() ?> aria-describedby="x_strid_help">
<?= $Page->strid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->strid->getErrorMessage() ?></div>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
    <div id="r_CreatedBy" class="form-group row">
        <label id="elh_view_store_transfer_CreatedBy" for="x_CreatedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreatedBy->caption() ?><?= $Page->CreatedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el_view_store_transfer_CreatedBy">
<input type="<?= $Page->CreatedBy->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" placeholder="<?= HtmlEncode($Page->CreatedBy->getPlaceHolder()) ?>" value="<?= $Page->CreatedBy->EditValue ?>"<?= $Page->CreatedBy->editAttributes() ?> aria-describedby="x_CreatedBy_help">
<?= $Page->CreatedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreatedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
    <div id="r_CreatedDateTime" class="form-group row">
        <label id="elh_view_store_transfer_CreatedDateTime" for="x_CreatedDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreatedDateTime->caption() ?><?= $Page->CreatedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_store_transfer_CreatedDateTime">
<input type="<?= $Page->CreatedDateTime->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?= HtmlEncode($Page->CreatedDateTime->getPlaceHolder()) ?>" value="<?= $Page->CreatedDateTime->EditValue ?>"<?= $Page->CreatedDateTime->editAttributes() ?> aria-describedby="x_CreatedDateTime_help">
<?= $Page->CreatedDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreatedDateTime->getErrorMessage() ?></div>
<?php if (!$Page->CreatedDateTime->ReadOnly && !$Page->CreatedDateTime->Disabled && !isset($Page->CreatedDateTime->EditAttrs["readonly"]) && !isset($Page->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_transferedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_transferedit", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
    <div id="r_ModifiedBy" class="form-group row">
        <label id="elh_view_store_transfer_ModifiedBy" for="x_ModifiedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModifiedBy->caption() ?><?= $Page->ModifiedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el_view_store_transfer_ModifiedBy">
<input type="<?= $Page->ModifiedBy->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" placeholder="<?= HtmlEncode($Page->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Page->ModifiedBy->EditValue ?>"<?= $Page->ModifiedBy->editAttributes() ?> aria-describedby="x_ModifiedBy_help">
<?= $Page->ModifiedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModifiedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
    <div id="r_ModifiedDateTime" class="form-group row">
        <label id="elh_view_store_transfer_ModifiedDateTime" for="x_ModifiedDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModifiedDateTime->caption() ?><?= $Page->ModifiedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_store_transfer_ModifiedDateTime">
<input type="<?= $Page->ModifiedDateTime->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" placeholder="<?= HtmlEncode($Page->ModifiedDateTime->getPlaceHolder()) ?>" value="<?= $Page->ModifiedDateTime->EditValue ?>"<?= $Page->ModifiedDateTime->editAttributes() ?> aria-describedby="x_ModifiedDateTime_help">
<?= $Page->ModifiedDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModifiedDateTime->getErrorMessage() ?></div>
<?php if (!$Page->ModifiedDateTime->ReadOnly && !$Page->ModifiedDateTime->Disabled && !isset($Page->ModifiedDateTime->EditAttrs["readonly"]) && !isset($Page->ModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_transferedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_transferedit", "x_ModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Received->Visible) { // Received ?>
    <div id="r_Received" class="form-group row">
        <label id="elh_view_store_transfer_Received" for="x_Received" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Received->caption() ?><?= $Page->Received->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Received->cellAttributes() ?>>
<span id="el_view_store_transfer_Received">
<input type="<?= $Page->Received->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_Received" name="x_Received" id="x_Received" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Received->getPlaceHolder()) ?>" value="<?= $Page->Received->EditValue ?>"<?= $Page->Received->editAttributes() ?> aria-describedby="x_Received_help">
<?= $Page->Received->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Received->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
    <div id="r_BillDate" class="form-group row">
        <label id="elh_view_store_transfer_BillDate" for="x_BillDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BillDate->caption() ?><?= $Page->BillDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillDate->cellAttributes() ?>>
<span id="el_view_store_transfer_BillDate">
<input type="<?= $Page->BillDate->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_BillDate" name="x_BillDate" id="x_BillDate" placeholder="<?= HtmlEncode($Page->BillDate->getPlaceHolder()) ?>" value="<?= $Page->BillDate->EditValue ?>"<?= $Page->BillDate->editAttributes() ?> aria-describedby="x_BillDate_help">
<?= $Page->BillDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillDate->getErrorMessage() ?></div>
<?php if (!$Page->BillDate->ReadOnly && !$Page->BillDate->Disabled && !isset($Page->BillDate->EditAttrs["readonly"]) && !isset($Page->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_transferedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_transferedit", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CurStock->Visible) { // CurStock ?>
    <div id="r_CurStock" class="form-group row">
        <label id="elh_view_store_transfer_CurStock" for="x_CurStock" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CurStock->caption() ?><?= $Page->CurStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CurStock->cellAttributes() ?>>
<span id="el_view_store_transfer_CurStock">
<input type="<?= $Page->CurStock->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_CurStock" name="x_CurStock" id="x_CurStock" size="30" placeholder="<?= HtmlEncode($Page->CurStock->getPlaceHolder()) ?>" value="<?= $Page->CurStock->EditValue ?>"<?= $Page->CurStock->editAttributes() ?> aria-describedby="x_CurStock_help">
<?= $Page->CurStock->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CurStock->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("view_store_transfer");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

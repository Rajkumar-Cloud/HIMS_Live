<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewStoreGrnAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_store_grnadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fview_store_grnadd = currentForm = new ew.Form("fview_store_grnadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_store_grn")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_store_grn)
        ew.vars.tables.view_store_grn = currentTable;
    fview_store_grnadd.addFields([
        ["ORDNO", [fields.ORDNO.visible && fields.ORDNO.required ? ew.Validators.required(fields.ORDNO.caption) : null], fields.ORDNO.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["PrName", [fields.PrName.visible && fields.PrName.required ? ew.Validators.required(fields.PrName.caption) : null], fields.PrName.isInvalid],
        ["GrnQuantity", [fields.GrnQuantity.visible && fields.GrnQuantity.required ? ew.Validators.required(fields.GrnQuantity.caption) : null, ew.Validators.integer], fields.GrnQuantity.isInvalid],
        ["QTY", [fields.QTY.visible && fields.QTY.required ? ew.Validators.required(fields.QTY.caption) : null, ew.Validators.integer], fields.QTY.isInvalid],
        ["FreeQty", [fields.FreeQty.visible && fields.FreeQty.required ? ew.Validators.required(fields.FreeQty.caption) : null, ew.Validators.integer], fields.FreeQty.isInvalid],
        ["DT", [fields.DT.visible && fields.DT.required ? ew.Validators.required(fields.DT.caption) : null, ew.Validators.datetime(0)], fields.DT.isInvalid],
        ["PC", [fields.PC.visible && fields.PC.required ? ew.Validators.required(fields.PC.caption) : null], fields.PC.isInvalid],
        ["YM", [fields.YM.visible && fields.YM.required ? ew.Validators.required(fields.YM.caption) : null], fields.YM.isInvalid],
        ["MFRCODE", [fields.MFRCODE.visible && fields.MFRCODE.required ? ew.Validators.required(fields.MFRCODE.caption) : null], fields.MFRCODE.isInvalid],
        ["PUnit", [fields.PUnit.visible && fields.PUnit.required ? ew.Validators.required(fields.PUnit.caption) : null, ew.Validators.integer], fields.PUnit.isInvalid],
        ["SUnit", [fields.SUnit.visible && fields.SUnit.required ? ew.Validators.required(fields.SUnit.caption) : null, ew.Validators.integer], fields.SUnit.isInvalid],
        ["Stock", [fields.Stock.visible && fields.Stock.required ? ew.Validators.required(fields.Stock.caption) : null, ew.Validators.integer], fields.Stock.isInvalid],
        ["MRP", [fields.MRP.visible && fields.MRP.required ? ew.Validators.required(fields.MRP.caption) : null, ew.Validators.float], fields.MRP.isInvalid],
        ["PurRate", [fields.PurRate.visible && fields.PurRate.required ? ew.Validators.required(fields.PurRate.caption) : null, ew.Validators.float], fields.PurRate.isInvalid],
        ["PurValue", [fields.PurValue.visible && fields.PurValue.required ? ew.Validators.required(fields.PurValue.caption) : null, ew.Validators.float], fields.PurValue.isInvalid],
        ["Disc", [fields.Disc.visible && fields.Disc.required ? ew.Validators.required(fields.Disc.caption) : null, ew.Validators.float], fields.Disc.isInvalid],
        ["PSGST", [fields.PSGST.visible && fields.PSGST.required ? ew.Validators.required(fields.PSGST.caption) : null], fields.PSGST.isInvalid],
        ["PCGST", [fields.PCGST.visible && fields.PCGST.required ? ew.Validators.required(fields.PCGST.caption) : null], fields.PCGST.isInvalid],
        ["PTax", [fields.PTax.visible && fields.PTax.required ? ew.Validators.required(fields.PTax.caption) : null, ew.Validators.float], fields.PTax.isInvalid],
        ["ItemValue", [fields.ItemValue.visible && fields.ItemValue.required ? ew.Validators.required(fields.ItemValue.caption) : null, ew.Validators.float], fields.ItemValue.isInvalid],
        ["SalTax", [fields.SalTax.visible && fields.SalTax.required ? ew.Validators.required(fields.SalTax.caption) : null, ew.Validators.float], fields.SalTax.isInvalid],
        ["LastMonthSale", [fields.LastMonthSale.visible && fields.LastMonthSale.required ? ew.Validators.required(fields.LastMonthSale.caption) : null, ew.Validators.integer], fields.LastMonthSale.isInvalid],
        ["Printcheck", [fields.Printcheck.visible && fields.Printcheck.required ? ew.Validators.required(fields.Printcheck.caption) : null], fields.Printcheck.isInvalid],
        ["poid", [fields.poid.visible && fields.poid.required ? ew.Validators.required(fields.poid.caption) : null, ew.Validators.integer], fields.poid.isInvalid],
        ["grnid", [fields.grnid.visible && fields.grnid.required ? ew.Validators.required(fields.grnid.caption) : null, ew.Validators.integer], fields.grnid.isInvalid],
        ["BatchNo", [fields.BatchNo.visible && fields.BatchNo.required ? ew.Validators.required(fields.BatchNo.caption) : null], fields.BatchNo.isInvalid],
        ["ExpDate", [fields.ExpDate.visible && fields.ExpDate.required ? ew.Validators.required(fields.ExpDate.caption) : null, ew.Validators.datetime(7)], fields.ExpDate.isInvalid],
        ["Quantity", [fields.Quantity.visible && fields.Quantity.required ? ew.Validators.required(fields.Quantity.caption) : null, ew.Validators.integer], fields.Quantity.isInvalid],
        ["SalRate", [fields.SalRate.visible && fields.SalRate.required ? ew.Validators.required(fields.SalRate.caption) : null, ew.Validators.float], fields.SalRate.isInvalid],
        ["Discount", [fields.Discount.visible && fields.Discount.required ? ew.Validators.required(fields.Discount.caption) : null, ew.Validators.float], fields.Discount.isInvalid],
        ["SSGST", [fields.SSGST.visible && fields.SSGST.required ? ew.Validators.required(fields.SSGST.caption) : null], fields.SSGST.isInvalid],
        ["SCGST", [fields.SCGST.visible && fields.SCGST.required ? ew.Validators.required(fields.SCGST.caption) : null], fields.SCGST.isInvalid],
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null], fields.BRCODE.isInvalid],
        ["HSN", [fields.HSN.visible && fields.HSN.required ? ew.Validators.required(fields.HSN.caption) : null], fields.HSN.isInvalid],
        ["Pack", [fields.Pack.visible && fields.Pack.required ? ew.Validators.required(fields.Pack.caption) : null], fields.Pack.isInvalid],
        ["GrnMRP", [fields.GrnMRP.visible && fields.GrnMRP.required ? ew.Validators.required(fields.GrnMRP.caption) : null, ew.Validators.float], fields.GrnMRP.isInvalid],
        ["trid", [fields.trid.visible && fields.trid.required ? ew.Validators.required(fields.trid.caption) : null, ew.Validators.integer], fields.trid.isInvalid],
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
        ["CurStock", [fields.CurStock.visible && fields.CurStock.required ? ew.Validators.required(fields.CurStock.caption) : null, ew.Validators.integer], fields.CurStock.isInvalid],
        ["FreeQtyyy", [fields.FreeQtyyy.visible && fields.FreeQtyyy.required ? ew.Validators.required(fields.FreeQtyyy.caption) : null, ew.Validators.integer], fields.FreeQtyyy.isInvalid],
        ["grndate", [fields.grndate.visible && fields.grndate.required ? ew.Validators.required(fields.grndate.caption) : null, ew.Validators.datetime(0)], fields.grndate.isInvalid],
        ["grndatetime", [fields.grndatetime.visible && fields.grndatetime.required ? ew.Validators.required(fields.grndatetime.caption) : null, ew.Validators.datetime(0)], fields.grndatetime.isInvalid],
        ["strid", [fields.strid.visible && fields.strid.required ? ew.Validators.required(fields.strid.caption) : null, ew.Validators.integer], fields.strid.isInvalid],
        ["GRNPer", [fields.GRNPer.visible && fields.GRNPer.required ? ew.Validators.required(fields.GRNPer.caption) : null, ew.Validators.float], fields.GRNPer.isInvalid],
        ["StoreID", [fields.StoreID.visible && fields.StoreID.required ? ew.Validators.required(fields.StoreID.caption) : null], fields.StoreID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_store_grnadd,
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
    fview_store_grnadd.validate = function () {
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
    fview_store_grnadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_store_grnadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_store_grnadd.lists.PrName = <?= $Page->PrName->toClientList($Page) ?>;
    loadjs.done("fview_store_grnadd");
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
<form name="fview_store_grnadd" id="fview_store_grnadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_store_grn">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "store_grn") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="store_grn">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->grnid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->ORDNO->Visible) { // ORDNO ?>
    <div id="r_ORDNO" class="form-group row">
        <label id="elh_view_store_grn_ORDNO" for="x_ORDNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ORDNO->caption() ?><?= $Page->ORDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ORDNO->cellAttributes() ?>>
<span id="el_view_store_grn_ORDNO">
<input type="<?= $Page->ORDNO->getInputTextType() ?>" data-table="view_store_grn" data-field="x_ORDNO" name="x_ORDNO" id="x_ORDNO" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->ORDNO->getPlaceHolder()) ?>" value="<?= $Page->ORDNO->EditValue ?>"<?= $Page->ORDNO->editAttributes() ?> aria-describedby="x_ORDNO_help">
<?= $Page->ORDNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ORDNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
    <div id="r_PRC" class="form-group row">
        <label id="elh_view_store_grn_PRC" for="x_PRC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PRC->caption() ?><?= $Page->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRC->cellAttributes() ?>>
<span id="el_view_store_grn_PRC">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PRC" name="x_PRC" id="x_PRC" size="4" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?> aria-describedby="x_PRC_help">
<?= $Page->PRC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
    <div id="r_PrName" class="form-group row">
        <label id="elh_view_store_grn_PrName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PrName->caption() ?><?= $Page->PrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrName->cellAttributes() ?>>
<span id="el_view_store_grn_PrName">
<?php
$onchange = $Page->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PrName" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Page->PrName->getInputTextType() ?>" class="form-control" name="sv_x_PrName" id="sv_x_PrName" value="<?= RemoveHtml($Page->PrName->EditValue) ?>" size="20" maxlength="45" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>"<?= $Page->PrName->editAttributes() ?> aria-describedby="x_PrName_help">
        <?php if (AllowAdd(CurrentProjectID() . "store_storemast") && !$Page->PrName->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_PrName" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->PrName->caption() ?>" data-title="<?= $Page->PrName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_PrName',url:'<?= GetUrl("StoreStoremastAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_store_grn" data-field="x_PrName" data-input="sv_x_PrName" data-value-separator="<?= $Page->PrName->displayValueSeparatorAttribute() ?>" name="x_PrName" id="x_PrName" value="<?= HtmlEncode($Page->PrName->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->PrName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_store_grnadd"], function() {
    fview_store_grnadd.createAutoSuggest(Object.assign({"id":"x_PrName","forceSelect":true}, ew.vars.tables.view_store_grn.fields.PrName.autoSuggestOptions));
});
</script>
<?= $Page->PrName->Lookup->getParamTag($Page, "p_x_PrName") ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GrnQuantity->Visible) { // GrnQuantity ?>
    <div id="r_GrnQuantity" class="form-group row">
        <label id="elh_view_store_grn_GrnQuantity" for="x_GrnQuantity" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GrnQuantity->caption() ?><?= $Page->GrnQuantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GrnQuantity->cellAttributes() ?>>
<span id="el_view_store_grn_GrnQuantity">
<input type="<?= $Page->GrnQuantity->getInputTextType() ?>" data-table="view_store_grn" data-field="x_GrnQuantity" name="x_GrnQuantity" id="x_GrnQuantity" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->GrnQuantity->getPlaceHolder()) ?>" value="<?= $Page->GrnQuantity->EditValue ?>"<?= $Page->GrnQuantity->editAttributes() ?> aria-describedby="x_GrnQuantity_help">
<?= $Page->GrnQuantity->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GrnQuantity->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->QTY->Visible) { // QTY ?>
    <div id="r_QTY" class="form-group row">
        <label id="elh_view_store_grn_QTY" for="x_QTY" class="<?= $Page->LeftColumnClass ?>"><?= $Page->QTY->caption() ?><?= $Page->QTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->QTY->cellAttributes() ?>>
<span id="el_view_store_grn_QTY">
<input type="<?= $Page->QTY->getInputTextType() ?>" data-table="view_store_grn" data-field="x_QTY" name="x_QTY" id="x_QTY" size="30" placeholder="<?= HtmlEncode($Page->QTY->getPlaceHolder()) ?>" value="<?= $Page->QTY->EditValue ?>"<?= $Page->QTY->editAttributes() ?> aria-describedby="x_QTY_help">
<?= $Page->QTY->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->QTY->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FreeQty->Visible) { // FreeQty ?>
    <div id="r_FreeQty" class="form-group row">
        <label id="elh_view_store_grn_FreeQty" for="x_FreeQty" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FreeQty->caption() ?><?= $Page->FreeQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FreeQty->cellAttributes() ?>>
<span id="el_view_store_grn_FreeQty">
<input type="<?= $Page->FreeQty->getInputTextType() ?>" data-table="view_store_grn" data-field="x_FreeQty" name="x_FreeQty" id="x_FreeQty" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->FreeQty->getPlaceHolder()) ?>" value="<?= $Page->FreeQty->EditValue ?>"<?= $Page->FreeQty->editAttributes() ?> aria-describedby="x_FreeQty_help">
<?= $Page->FreeQty->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FreeQty->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <div id="r_DT" class="form-group row">
        <label id="elh_view_store_grn_DT" for="x_DT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DT->caption() ?><?= $Page->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DT->cellAttributes() ?>>
<span id="el_view_store_grn_DT">
<input type="<?= $Page->DT->getInputTextType() ?>" data-table="view_store_grn" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?= HtmlEncode($Page->DT->getPlaceHolder()) ?>" value="<?= $Page->DT->EditValue ?>"<?= $Page->DT->editAttributes() ?> aria-describedby="x_DT_help">
<?= $Page->DT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DT->getErrorMessage() ?></div>
<?php if (!$Page->DT->ReadOnly && !$Page->DT->Disabled && !isset($Page->DT->EditAttrs["readonly"]) && !isset($Page->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_grnadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_grnadd", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
    <div id="r_PC" class="form-group row">
        <label id="elh_view_store_grn_PC" for="x_PC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PC->caption() ?><?= $Page->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PC->cellAttributes() ?>>
<span id="el_view_store_grn_PC">
<input type="<?= $Page->PC->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->PC->getPlaceHolder()) ?>" value="<?= $Page->PC->EditValue ?>"<?= $Page->PC->editAttributes() ?> aria-describedby="x_PC_help">
<?= $Page->PC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
    <div id="r_YM" class="form-group row">
        <label id="elh_view_store_grn_YM" for="x_YM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->YM->caption() ?><?= $Page->YM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->YM->cellAttributes() ?>>
<span id="el_view_store_grn_YM">
<input type="<?= $Page->YM->getInputTextType() ?>" data-table="view_store_grn" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->YM->getPlaceHolder()) ?>" value="<?= $Page->YM->EditValue ?>"<?= $Page->YM->editAttributes() ?> aria-describedby="x_YM_help">
<?= $Page->YM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->YM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <div id="r_MFRCODE" class="form-group row">
        <label id="elh_view_store_grn_MFRCODE" for="x_MFRCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MFRCODE->caption() ?><?= $Page->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el_view_store_grn_MFRCODE">
<input type="<?= $Page->MFRCODE->getInputTextType() ?>" data-table="view_store_grn" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="6" maxlength="6" placeholder="<?= HtmlEncode($Page->MFRCODE->getPlaceHolder()) ?>" value="<?= $Page->MFRCODE->EditValue ?>"<?= $Page->MFRCODE->editAttributes() ?> aria-describedby="x_MFRCODE_help">
<?= $Page->MFRCODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
    <div id="r_PUnit" class="form-group row">
        <label id="elh_view_store_grn_PUnit" for="x_PUnit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PUnit->caption() ?><?= $Page->PUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PUnit->cellAttributes() ?>>
<span id="el_view_store_grn_PUnit">
<input type="<?= $Page->PUnit->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->PUnit->getPlaceHolder()) ?>" value="<?= $Page->PUnit->EditValue ?>"<?= $Page->PUnit->editAttributes() ?> aria-describedby="x_PUnit_help">
<?= $Page->PUnit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PUnit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SUnit->Visible) { // SUnit ?>
    <div id="r_SUnit" class="form-group row">
        <label id="elh_view_store_grn_SUnit" for="x_SUnit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SUnit->caption() ?><?= $Page->SUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SUnit->cellAttributes() ?>>
<span id="el_view_store_grn_SUnit">
<input type="<?= $Page->SUnit->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->SUnit->getPlaceHolder()) ?>" value="<?= $Page->SUnit->EditValue ?>"<?= $Page->SUnit->editAttributes() ?> aria-describedby="x_SUnit_help">
<?= $Page->SUnit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SUnit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Stock->Visible) { // Stock ?>
    <div id="r_Stock" class="form-group row">
        <label id="elh_view_store_grn_Stock" for="x_Stock" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Stock->caption() ?><?= $Page->Stock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Stock->cellAttributes() ?>>
<span id="el_view_store_grn_Stock">
<input type="<?= $Page->Stock->getInputTextType() ?>" data-table="view_store_grn" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?= HtmlEncode($Page->Stock->getPlaceHolder()) ?>" value="<?= $Page->Stock->EditValue ?>"<?= $Page->Stock->editAttributes() ?> aria-describedby="x_Stock_help">
<?= $Page->Stock->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Stock->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
    <div id="r_MRP" class="form-group row">
        <label id="elh_view_store_grn_MRP" for="x_MRP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MRP->caption() ?><?= $Page->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MRP->cellAttributes() ?>>
<span id="el_view_store_grn_MRP">
<input type="<?= $Page->MRP->getInputTextType() ?>" data-table="view_store_grn" data-field="x_MRP" name="x_MRP" id="x_MRP" size="4" maxlength="8" placeholder="<?= HtmlEncode($Page->MRP->getPlaceHolder()) ?>" value="<?= $Page->MRP->EditValue ?>"<?= $Page->MRP->editAttributes() ?> aria-describedby="x_MRP_help">
<?= $Page->MRP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MRP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
    <div id="r_PurRate" class="form-group row">
        <label id="elh_view_store_grn_PurRate" for="x_PurRate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PurRate->caption() ?><?= $Page->PurRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurRate->cellAttributes() ?>>
<span id="el_view_store_grn_PurRate">
<input type="<?= $Page->PurRate->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="4" maxlength="8" placeholder="<?= HtmlEncode($Page->PurRate->getPlaceHolder()) ?>" value="<?= $Page->PurRate->EditValue ?>"<?= $Page->PurRate->editAttributes() ?> aria-describedby="x_PurRate_help">
<?= $Page->PurRate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PurRate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
    <div id="r_PurValue" class="form-group row">
        <label id="elh_view_store_grn_PurValue" for="x_PurValue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PurValue->caption() ?><?= $Page->PurValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurValue->cellAttributes() ?>>
<span id="el_view_store_grn_PurValue">
<input type="<?= $Page->PurValue->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="4" maxlength="8" placeholder="<?= HtmlEncode($Page->PurValue->getPlaceHolder()) ?>" value="<?= $Page->PurValue->EditValue ?>"<?= $Page->PurValue->editAttributes() ?> aria-describedby="x_PurValue_help">
<?= $Page->PurValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PurValue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Disc->Visible) { // Disc ?>
    <div id="r_Disc" class="form-group row">
        <label id="elh_view_store_grn_Disc" for="x_Disc" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Disc->caption() ?><?= $Page->Disc->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Disc->cellAttributes() ?>>
<span id="el_view_store_grn_Disc">
<input type="<?= $Page->Disc->getInputTextType() ?>" data-table="view_store_grn" data-field="x_Disc" name="x_Disc" id="x_Disc" size="4" maxlength="8" placeholder="<?= HtmlEncode($Page->Disc->getPlaceHolder()) ?>" value="<?= $Page->Disc->EditValue ?>"<?= $Page->Disc->editAttributes() ?> aria-describedby="x_Disc_help">
<?= $Page->Disc->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Disc->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
    <div id="r_PSGST" class="form-group row">
        <label id="elh_view_store_grn_PSGST" for="x_PSGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PSGST->caption() ?><?= $Page->PSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PSGST->cellAttributes() ?>>
<span id="el_view_store_grn_PSGST">
<input type="<?= $Page->PSGST->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->PSGST->getPlaceHolder()) ?>" value="<?= $Page->PSGST->EditValue ?>"<?= $Page->PSGST->editAttributes() ?> aria-describedby="x_PSGST_help">
<?= $Page->PSGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PSGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
    <div id="r_PCGST" class="form-group row">
        <label id="elh_view_store_grn_PCGST" for="x_PCGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PCGST->caption() ?><?= $Page->PCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PCGST->cellAttributes() ?>>
<span id="el_view_store_grn_PCGST">
<input type="<?= $Page->PCGST->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->PCGST->getPlaceHolder()) ?>" value="<?= $Page->PCGST->EditValue ?>"<?= $Page->PCGST->editAttributes() ?> aria-describedby="x_PCGST_help">
<?= $Page->PCGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PCGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PTax->Visible) { // PTax ?>
    <div id="r_PTax" class="form-group row">
        <label id="elh_view_store_grn_PTax" for="x_PTax" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PTax->caption() ?><?= $Page->PTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PTax->cellAttributes() ?>>
<span id="el_view_store_grn_PTax">
<input type="<?= $Page->PTax->getInputTextType() ?>" data-table="view_store_grn" data-field="x_PTax" name="x_PTax" id="x_PTax" size="6" maxlength="10" placeholder="<?= HtmlEncode($Page->PTax->getPlaceHolder()) ?>" value="<?= $Page->PTax->EditValue ?>"<?= $Page->PTax->editAttributes() ?> aria-describedby="x_PTax_help">
<?= $Page->PTax->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PTax->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ItemValue->Visible) { // ItemValue ?>
    <div id="r_ItemValue" class="form-group row">
        <label id="elh_view_store_grn_ItemValue" for="x_ItemValue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ItemValue->caption() ?><?= $Page->ItemValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ItemValue->cellAttributes() ?>>
<span id="el_view_store_grn_ItemValue">
<input type="<?= $Page->ItemValue->getInputTextType() ?>" data-table="view_store_grn" data-field="x_ItemValue" name="x_ItemValue" id="x_ItemValue" size="8" maxlength="12" placeholder="<?= HtmlEncode($Page->ItemValue->getPlaceHolder()) ?>" value="<?= $Page->ItemValue->EditValue ?>"<?= $Page->ItemValue->editAttributes() ?> aria-describedby="x_ItemValue_help">
<?= $Page->ItemValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ItemValue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SalTax->Visible) { // SalTax ?>
    <div id="r_SalTax" class="form-group row">
        <label id="elh_view_store_grn_SalTax" for="x_SalTax" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SalTax->caption() ?><?= $Page->SalTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SalTax->cellAttributes() ?>>
<span id="el_view_store_grn_SalTax">
<input type="<?= $Page->SalTax->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SalTax" name="x_SalTax" id="x_SalTax" size="8" maxlength="12" placeholder="<?= HtmlEncode($Page->SalTax->getPlaceHolder()) ?>" value="<?= $Page->SalTax->EditValue ?>"<?= $Page->SalTax->editAttributes() ?> aria-describedby="x_SalTax_help">
<?= $Page->SalTax->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SalTax->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
    <div id="r_LastMonthSale" class="form-group row">
        <label id="elh_view_store_grn_LastMonthSale" for="x_LastMonthSale" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LastMonthSale->caption() ?><?= $Page->LastMonthSale->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LastMonthSale->cellAttributes() ?>>
<span id="el_view_store_grn_LastMonthSale">
<input type="<?= $Page->LastMonthSale->getInputTextType() ?>" data-table="view_store_grn" data-field="x_LastMonthSale" name="x_LastMonthSale" id="x_LastMonthSale" size="30" placeholder="<?= HtmlEncode($Page->LastMonthSale->getPlaceHolder()) ?>" value="<?= $Page->LastMonthSale->EditValue ?>"<?= $Page->LastMonthSale->editAttributes() ?> aria-describedby="x_LastMonthSale_help">
<?= $Page->LastMonthSale->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LastMonthSale->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Printcheck->Visible) { // Printcheck ?>
    <div id="r_Printcheck" class="form-group row">
        <label id="elh_view_store_grn_Printcheck" for="x_Printcheck" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Printcheck->caption() ?><?= $Page->Printcheck->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Printcheck->cellAttributes() ?>>
<span id="el_view_store_grn_Printcheck">
<input type="<?= $Page->Printcheck->getInputTextType() ?>" data-table="view_store_grn" data-field="x_Printcheck" name="x_Printcheck" id="x_Printcheck" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Printcheck->getPlaceHolder()) ?>" value="<?= $Page->Printcheck->EditValue ?>"<?= $Page->Printcheck->editAttributes() ?> aria-describedby="x_Printcheck_help">
<?= $Page->Printcheck->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Printcheck->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->poid->Visible) { // poid ?>
    <div id="r_poid" class="form-group row">
        <label id="elh_view_store_grn_poid" for="x_poid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->poid->caption() ?><?= $Page->poid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->poid->cellAttributes() ?>>
<span id="el_view_store_grn_poid">
<input type="<?= $Page->poid->getInputTextType() ?>" data-table="view_store_grn" data-field="x_poid" name="x_poid" id="x_poid" size="30" placeholder="<?= HtmlEncode($Page->poid->getPlaceHolder()) ?>" value="<?= $Page->poid->EditValue ?>"<?= $Page->poid->editAttributes() ?> aria-describedby="x_poid_help">
<?= $Page->poid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->poid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->grnid->Visible) { // grnid ?>
    <div id="r_grnid" class="form-group row">
        <label id="elh_view_store_grn_grnid" for="x_grnid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->grnid->caption() ?><?= $Page->grnid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->grnid->cellAttributes() ?>>
<?php if ($Page->grnid->getSessionValue() != "") { ?>
<span id="el_view_store_grn_grnid">
<span<?= $Page->grnid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->grnid->getDisplayValue($Page->grnid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x_grnid" name="x_grnid" value="<?= HtmlEncode($Page->grnid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el_view_store_grn_grnid">
<input type="<?= $Page->grnid->getInputTextType() ?>" data-table="view_store_grn" data-field="x_grnid" name="x_grnid" id="x_grnid" size="30" placeholder="<?= HtmlEncode($Page->grnid->getPlaceHolder()) ?>" value="<?= $Page->grnid->EditValue ?>"<?= $Page->grnid->editAttributes() ?> aria-describedby="x_grnid_help">
<?= $Page->grnid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->grnid->getErrorMessage() ?></div>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
    <div id="r_BatchNo" class="form-group row">
        <label id="elh_view_store_grn_BatchNo" for="x_BatchNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BatchNo->caption() ?><?= $Page->BatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BatchNo->cellAttributes() ?>>
<span id="el_view_store_grn_BatchNo">
<input type="<?= $Page->BatchNo->getInputTextType() ?>" data-table="view_store_grn" data-field="x_BatchNo" name="x_BatchNo" id="x_BatchNo" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->BatchNo->getPlaceHolder()) ?>" value="<?= $Page->BatchNo->EditValue ?>"<?= $Page->BatchNo->editAttributes() ?> aria-describedby="x_BatchNo_help">
<?= $Page->BatchNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BatchNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ExpDate->Visible) { // ExpDate ?>
    <div id="r_ExpDate" class="form-group row">
        <label id="elh_view_store_grn_ExpDate" for="x_ExpDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ExpDate->caption() ?><?= $Page->ExpDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ExpDate->cellAttributes() ?>>
<span id="el_view_store_grn_ExpDate">
<input type="<?= $Page->ExpDate->getInputTextType() ?>" data-table="view_store_grn" data-field="x_ExpDate" data-format="7" name="x_ExpDate" id="x_ExpDate" size="8" maxlength="10" placeholder="<?= HtmlEncode($Page->ExpDate->getPlaceHolder()) ?>" value="<?= $Page->ExpDate->EditValue ?>"<?= $Page->ExpDate->editAttributes() ?> aria-describedby="x_ExpDate_help">
<?= $Page->ExpDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ExpDate->getErrorMessage() ?></div>
<?php if (!$Page->ExpDate->ReadOnly && !$Page->ExpDate->Disabled && !isset($Page->ExpDate->EditAttrs["readonly"]) && !isset($Page->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_grnadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_grnadd", "x_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
    <div id="r_Quantity" class="form-group row">
        <label id="elh_view_store_grn_Quantity" for="x_Quantity" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Quantity->caption() ?><?= $Page->Quantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Quantity->cellAttributes() ?>>
<span id="el_view_store_grn_Quantity">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="view_store_grn" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?> aria-describedby="x_Quantity_help">
<?= $Page->Quantity->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SalRate->Visible) { // SalRate ?>
    <div id="r_SalRate" class="form-group row">
        <label id="elh_view_store_grn_SalRate" for="x_SalRate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SalRate->caption() ?><?= $Page->SalRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SalRate->cellAttributes() ?>>
<span id="el_view_store_grn_SalRate">
<input type="<?= $Page->SalRate->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SalRate" name="x_SalRate" id="x_SalRate" size="4" maxlength="8" placeholder="<?= HtmlEncode($Page->SalRate->getPlaceHolder()) ?>" value="<?= $Page->SalRate->EditValue ?>"<?= $Page->SalRate->editAttributes() ?> aria-describedby="x_SalRate_help">
<?= $Page->SalRate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SalRate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
    <div id="r_Discount" class="form-group row">
        <label id="elh_view_store_grn_Discount" for="x_Discount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Discount->caption() ?><?= $Page->Discount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Discount->cellAttributes() ?>>
<span id="el_view_store_grn_Discount">
<input type="<?= $Page->Discount->getInputTextType() ?>" data-table="view_store_grn" data-field="x_Discount" name="x_Discount" id="x_Discount" size="4" maxlength="8" placeholder="<?= HtmlEncode($Page->Discount->getPlaceHolder()) ?>" value="<?= $Page->Discount->EditValue ?>"<?= $Page->Discount->editAttributes() ?> aria-describedby="x_Discount_help">
<?= $Page->Discount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Discount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
    <div id="r_SSGST" class="form-group row">
        <label id="elh_view_store_grn_SSGST" for="x_SSGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SSGST->caption() ?><?= $Page->SSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SSGST->cellAttributes() ?>>
<span id="el_view_store_grn_SSGST">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?> aria-describedby="x_SSGST_help">
<?= $Page->SSGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
    <div id="r_SCGST" class="form-group row">
        <label id="elh_view_store_grn_SCGST" for="x_SCGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SCGST->caption() ?><?= $Page->SCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SCGST->cellAttributes() ?>>
<span id="el_view_store_grn_SCGST">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="view_store_grn" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?> aria-describedby="x_SCGST_help">
<?= $Page->SCGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HSN->Visible) { // HSN ?>
    <div id="r_HSN" class="form-group row">
        <label id="elh_view_store_grn_HSN" for="x_HSN" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HSN->caption() ?><?= $Page->HSN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HSN->cellAttributes() ?>>
<span id="el_view_store_grn_HSN">
<input type="<?= $Page->HSN->getInputTextType() ?>" data-table="view_store_grn" data-field="x_HSN" name="x_HSN" id="x_HSN" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->HSN->getPlaceHolder()) ?>" value="<?= $Page->HSN->EditValue ?>"<?= $Page->HSN->editAttributes() ?> aria-describedby="x_HSN_help">
<?= $Page->HSN->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HSN->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pack->Visible) { // Pack ?>
    <div id="r_Pack" class="form-group row">
        <label id="elh_view_store_grn_Pack" for="x_Pack" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Pack->caption() ?><?= $Page->Pack->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pack->cellAttributes() ?>>
<span id="el_view_store_grn_Pack">
<input type="<?= $Page->Pack->getInputTextType() ?>" data-table="view_store_grn" data-field="x_Pack" name="x_Pack" id="x_Pack" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->Pack->getPlaceHolder()) ?>" value="<?= $Page->Pack->EditValue ?>"<?= $Page->Pack->editAttributes() ?> aria-describedby="x_Pack_help">
<?= $Page->Pack->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pack->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GrnMRP->Visible) { // GrnMRP ?>
    <div id="r_GrnMRP" class="form-group row">
        <label id="elh_view_store_grn_GrnMRP" for="x_GrnMRP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GrnMRP->caption() ?><?= $Page->GrnMRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GrnMRP->cellAttributes() ?>>
<span id="el_view_store_grn_GrnMRP">
<input type="<?= $Page->GrnMRP->getInputTextType() ?>" data-table="view_store_grn" data-field="x_GrnMRP" name="x_GrnMRP" id="x_GrnMRP" size="4" maxlength="8" placeholder="<?= HtmlEncode($Page->GrnMRP->getPlaceHolder()) ?>" value="<?= $Page->GrnMRP->EditValue ?>"<?= $Page->GrnMRP->editAttributes() ?> aria-describedby="x_GrnMRP_help">
<?= $Page->GrnMRP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GrnMRP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->trid->Visible) { // trid ?>
    <div id="r_trid" class="form-group row">
        <label id="elh_view_store_grn_trid" for="x_trid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->trid->caption() ?><?= $Page->trid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->trid->cellAttributes() ?>>
<span id="el_view_store_grn_trid">
<input type="<?= $Page->trid->getInputTextType() ?>" data-table="view_store_grn" data-field="x_trid" name="x_trid" id="x_trid" size="30" placeholder="<?= HtmlEncode($Page->trid->getPlaceHolder()) ?>" value="<?= $Page->trid->EditValue ?>"<?= $Page->trid->editAttributes() ?> aria-describedby="x_trid_help">
<?= $Page->trid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->trid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
    <div id="r_CreatedBy" class="form-group row">
        <label id="elh_view_store_grn_CreatedBy" for="x_CreatedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreatedBy->caption() ?><?= $Page->CreatedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el_view_store_grn_CreatedBy">
<input type="<?= $Page->CreatedBy->getInputTextType() ?>" data-table="view_store_grn" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" placeholder="<?= HtmlEncode($Page->CreatedBy->getPlaceHolder()) ?>" value="<?= $Page->CreatedBy->EditValue ?>"<?= $Page->CreatedBy->editAttributes() ?> aria-describedby="x_CreatedBy_help">
<?= $Page->CreatedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreatedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
    <div id="r_CreatedDateTime" class="form-group row">
        <label id="elh_view_store_grn_CreatedDateTime" for="x_CreatedDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreatedDateTime->caption() ?><?= $Page->CreatedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el_view_store_grn_CreatedDateTime">
<input type="<?= $Page->CreatedDateTime->getInputTextType() ?>" data-table="view_store_grn" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?= HtmlEncode($Page->CreatedDateTime->getPlaceHolder()) ?>" value="<?= $Page->CreatedDateTime->EditValue ?>"<?= $Page->CreatedDateTime->editAttributes() ?> aria-describedby="x_CreatedDateTime_help">
<?= $Page->CreatedDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreatedDateTime->getErrorMessage() ?></div>
<?php if (!$Page->CreatedDateTime->ReadOnly && !$Page->CreatedDateTime->Disabled && !isset($Page->CreatedDateTime->EditAttrs["readonly"]) && !isset($Page->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_grnadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_grnadd", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
    <div id="r_ModifiedBy" class="form-group row">
        <label id="elh_view_store_grn_ModifiedBy" for="x_ModifiedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModifiedBy->caption() ?><?= $Page->ModifiedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el_view_store_grn_ModifiedBy">
<input type="<?= $Page->ModifiedBy->getInputTextType() ?>" data-table="view_store_grn" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" placeholder="<?= HtmlEncode($Page->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Page->ModifiedBy->EditValue ?>"<?= $Page->ModifiedBy->editAttributes() ?> aria-describedby="x_ModifiedBy_help">
<?= $Page->ModifiedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModifiedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
    <div id="r_ModifiedDateTime" class="form-group row">
        <label id="elh_view_store_grn_ModifiedDateTime" for="x_ModifiedDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModifiedDateTime->caption() ?><?= $Page->ModifiedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el_view_store_grn_ModifiedDateTime">
<input type="<?= $Page->ModifiedDateTime->getInputTextType() ?>" data-table="view_store_grn" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" placeholder="<?= HtmlEncode($Page->ModifiedDateTime->getPlaceHolder()) ?>" value="<?= $Page->ModifiedDateTime->EditValue ?>"<?= $Page->ModifiedDateTime->editAttributes() ?> aria-describedby="x_ModifiedDateTime_help">
<?= $Page->ModifiedDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModifiedDateTime->getErrorMessage() ?></div>
<?php if (!$Page->ModifiedDateTime->ReadOnly && !$Page->ModifiedDateTime->Disabled && !isset($Page->ModifiedDateTime->EditAttrs["readonly"]) && !isset($Page->ModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_grnadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_grnadd", "x_ModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Received->Visible) { // Received ?>
    <div id="r_Received" class="form-group row">
        <label id="elh_view_store_grn_Received" for="x_Received" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Received->caption() ?><?= $Page->Received->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Received->cellAttributes() ?>>
<span id="el_view_store_grn_Received">
<input type="<?= $Page->Received->getInputTextType() ?>" data-table="view_store_grn" data-field="x_Received" name="x_Received" id="x_Received" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Received->getPlaceHolder()) ?>" value="<?= $Page->Received->EditValue ?>"<?= $Page->Received->editAttributes() ?> aria-describedby="x_Received_help">
<?= $Page->Received->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Received->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
    <div id="r_BillDate" class="form-group row">
        <label id="elh_view_store_grn_BillDate" for="x_BillDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BillDate->caption() ?><?= $Page->BillDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillDate->cellAttributes() ?>>
<span id="el_view_store_grn_BillDate">
<input type="<?= $Page->BillDate->getInputTextType() ?>" data-table="view_store_grn" data-field="x_BillDate" name="x_BillDate" id="x_BillDate" placeholder="<?= HtmlEncode($Page->BillDate->getPlaceHolder()) ?>" value="<?= $Page->BillDate->EditValue ?>"<?= $Page->BillDate->editAttributes() ?> aria-describedby="x_BillDate_help">
<?= $Page->BillDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillDate->getErrorMessage() ?></div>
<?php if (!$Page->BillDate->ReadOnly && !$Page->BillDate->Disabled && !isset($Page->BillDate->EditAttrs["readonly"]) && !isset($Page->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_grnadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_grnadd", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CurStock->Visible) { // CurStock ?>
    <div id="r_CurStock" class="form-group row">
        <label id="elh_view_store_grn_CurStock" for="x_CurStock" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CurStock->caption() ?><?= $Page->CurStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CurStock->cellAttributes() ?>>
<span id="el_view_store_grn_CurStock">
<input type="<?= $Page->CurStock->getInputTextType() ?>" data-table="view_store_grn" data-field="x_CurStock" name="x_CurStock" id="x_CurStock" size="30" placeholder="<?= HtmlEncode($Page->CurStock->getPlaceHolder()) ?>" value="<?= $Page->CurStock->EditValue ?>"<?= $Page->CurStock->editAttributes() ?> aria-describedby="x_CurStock_help">
<?= $Page->CurStock->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CurStock->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FreeQtyyy->Visible) { // FreeQtyyy ?>
    <div id="r_FreeQtyyy" class="form-group row">
        <label id="elh_view_store_grn_FreeQtyyy" for="x_FreeQtyyy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FreeQtyyy->caption() ?><?= $Page->FreeQtyyy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FreeQtyyy->cellAttributes() ?>>
<span id="el_view_store_grn_FreeQtyyy">
<input type="<?= $Page->FreeQtyyy->getInputTextType() ?>" data-table="view_store_grn" data-field="x_FreeQtyyy" name="x_FreeQtyyy" id="x_FreeQtyyy" size="30" placeholder="<?= HtmlEncode($Page->FreeQtyyy->getPlaceHolder()) ?>" value="<?= $Page->FreeQtyyy->EditValue ?>"<?= $Page->FreeQtyyy->editAttributes() ?> aria-describedby="x_FreeQtyyy_help">
<?= $Page->FreeQtyyy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FreeQtyyy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->grndate->Visible) { // grndate ?>
    <div id="r_grndate" class="form-group row">
        <label id="elh_view_store_grn_grndate" for="x_grndate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->grndate->caption() ?><?= $Page->grndate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->grndate->cellAttributes() ?>>
<span id="el_view_store_grn_grndate">
<input type="<?= $Page->grndate->getInputTextType() ?>" data-table="view_store_grn" data-field="x_grndate" name="x_grndate" id="x_grndate" placeholder="<?= HtmlEncode($Page->grndate->getPlaceHolder()) ?>" value="<?= $Page->grndate->EditValue ?>"<?= $Page->grndate->editAttributes() ?> aria-describedby="x_grndate_help">
<?= $Page->grndate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->grndate->getErrorMessage() ?></div>
<?php if (!$Page->grndate->ReadOnly && !$Page->grndate->Disabled && !isset($Page->grndate->EditAttrs["readonly"]) && !isset($Page->grndate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_grnadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_grnadd", "x_grndate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->grndatetime->Visible) { // grndatetime ?>
    <div id="r_grndatetime" class="form-group row">
        <label id="elh_view_store_grn_grndatetime" for="x_grndatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->grndatetime->caption() ?><?= $Page->grndatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->grndatetime->cellAttributes() ?>>
<span id="el_view_store_grn_grndatetime">
<input type="<?= $Page->grndatetime->getInputTextType() ?>" data-table="view_store_grn" data-field="x_grndatetime" name="x_grndatetime" id="x_grndatetime" placeholder="<?= HtmlEncode($Page->grndatetime->getPlaceHolder()) ?>" value="<?= $Page->grndatetime->EditValue ?>"<?= $Page->grndatetime->editAttributes() ?> aria-describedby="x_grndatetime_help">
<?= $Page->grndatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->grndatetime->getErrorMessage() ?></div>
<?php if (!$Page->grndatetime->ReadOnly && !$Page->grndatetime->Disabled && !isset($Page->grndatetime->EditAttrs["readonly"]) && !isset($Page->grndatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_grnadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_grnadd", "x_grndatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->strid->Visible) { // strid ?>
    <div id="r_strid" class="form-group row">
        <label id="elh_view_store_grn_strid" for="x_strid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->strid->caption() ?><?= $Page->strid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->strid->cellAttributes() ?>>
<span id="el_view_store_grn_strid">
<input type="<?= $Page->strid->getInputTextType() ?>" data-table="view_store_grn" data-field="x_strid" name="x_strid" id="x_strid" size="30" placeholder="<?= HtmlEncode($Page->strid->getPlaceHolder()) ?>" value="<?= $Page->strid->EditValue ?>"<?= $Page->strid->editAttributes() ?> aria-describedby="x_strid_help">
<?= $Page->strid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->strid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GRNPer->Visible) { // GRNPer ?>
    <div id="r_GRNPer" class="form-group row">
        <label id="elh_view_store_grn_GRNPer" for="x_GRNPer" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GRNPer->caption() ?><?= $Page->GRNPer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GRNPer->cellAttributes() ?>>
<span id="el_view_store_grn_GRNPer">
<input type="<?= $Page->GRNPer->getInputTextType() ?>" data-table="view_store_grn" data-field="x_GRNPer" name="x_GRNPer" id="x_GRNPer" size="30" placeholder="<?= HtmlEncode($Page->GRNPer->getPlaceHolder()) ?>" value="<?= $Page->GRNPer->EditValue ?>"<?= $Page->GRNPer->editAttributes() ?> aria-describedby="x_GRNPer_help">
<?= $Page->GRNPer->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GRNPer->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StoreID->Visible) { // StoreID ?>
    <div id="r_StoreID" class="form-group row">
        <label id="elh_view_store_grn_StoreID" for="x_StoreID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StoreID->caption() ?><?= $Page->StoreID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StoreID->cellAttributes() ?>>
<span id="el_view_store_grn_StoreID">
<input type="<?= $Page->StoreID->getInputTextType() ?>" data-table="view_store_grn" data-field="x_StoreID" name="x_StoreID" id="x_StoreID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->StoreID->getPlaceHolder()) ?>" value="<?= $Page->StoreID->EditValue ?>"<?= $Page->StoreID->editAttributes() ?> aria-describedby="x_StoreID_help">
<?= $Page->StoreID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StoreID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
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
    ew.addEventHandlers("view_store_grn");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    $("[data-name='Quantity']").hide(),$("[data-name='BillDate']").hide();
});
</script>

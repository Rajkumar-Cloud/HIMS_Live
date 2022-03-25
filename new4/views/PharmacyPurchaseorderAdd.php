<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyPurchaseorderAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_purchaseorderadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpharmacy_purchaseorderadd = currentForm = new ew.Form("fpharmacy_purchaseorderadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_purchaseorder")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_purchaseorder)
        ew.vars.tables.pharmacy_purchaseorder = currentTable;
    fpharmacy_purchaseorderadd.addFields([
        ["ORDNO", [fields.ORDNO.visible && fields.ORDNO.required ? ew.Validators.required(fields.ORDNO.caption) : null], fields.ORDNO.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["QTY", [fields.QTY.visible && fields.QTY.required ? ew.Validators.required(fields.QTY.caption) : null, ew.Validators.float], fields.QTY.isInvalid],
        ["DT", [fields.DT.visible && fields.DT.required ? ew.Validators.required(fields.DT.caption) : null, ew.Validators.datetime(0)], fields.DT.isInvalid],
        ["PC", [fields.PC.visible && fields.PC.required ? ew.Validators.required(fields.PC.caption) : null], fields.PC.isInvalid],
        ["YM", [fields.YM.visible && fields.YM.required ? ew.Validators.required(fields.YM.caption) : null], fields.YM.isInvalid],
        ["MFRCODE", [fields.MFRCODE.visible && fields.MFRCODE.required ? ew.Validators.required(fields.MFRCODE.caption) : null], fields.MFRCODE.isInvalid],
        ["Stock", [fields.Stock.visible && fields.Stock.required ? ew.Validators.required(fields.Stock.caption) : null, ew.Validators.float], fields.Stock.isInvalid],
        ["LastMonthSale", [fields.LastMonthSale.visible && fields.LastMonthSale.required ? ew.Validators.required(fields.LastMonthSale.caption) : null, ew.Validators.float], fields.LastMonthSale.isInvalid],
        ["Printcheck", [fields.Printcheck.visible && fields.Printcheck.required ? ew.Validators.required(fields.Printcheck.caption) : null], fields.Printcheck.isInvalid],
        ["poid", [fields.poid.visible && fields.poid.required ? ew.Validators.required(fields.poid.caption) : null, ew.Validators.integer], fields.poid.isInvalid],
        ["PSGST", [fields.PSGST.visible && fields.PSGST.required ? ew.Validators.required(fields.PSGST.caption) : null], fields.PSGST.isInvalid],
        ["PCGST", [fields.PCGST.visible && fields.PCGST.required ? ew.Validators.required(fields.PCGST.caption) : null], fields.PCGST.isInvalid],
        ["SSGST", [fields.SSGST.visible && fields.SSGST.required ? ew.Validators.required(fields.SSGST.caption) : null], fields.SSGST.isInvalid],
        ["SCGST", [fields.SCGST.visible && fields.SCGST.required ? ew.Validators.required(fields.SCGST.caption) : null], fields.SCGST.isInvalid],
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null, ew.Validators.integer], fields.BRCODE.isInvalid],
        ["HSN", [fields.HSN.visible && fields.HSN.required ? ew.Validators.required(fields.HSN.caption) : null], fields.HSN.isInvalid],
        ["Pack", [fields.Pack.visible && fields.Pack.required ? ew.Validators.required(fields.Pack.caption) : null], fields.Pack.isInvalid],
        ["PUnit", [fields.PUnit.visible && fields.PUnit.required ? ew.Validators.required(fields.PUnit.caption) : null, ew.Validators.integer], fields.PUnit.isInvalid],
        ["SUnit", [fields.SUnit.visible && fields.SUnit.required ? ew.Validators.required(fields.SUnit.caption) : null, ew.Validators.integer], fields.SUnit.isInvalid],
        ["GrnQuantity", [fields.GrnQuantity.visible && fields.GrnQuantity.required ? ew.Validators.required(fields.GrnQuantity.caption) : null, ew.Validators.integer], fields.GrnQuantity.isInvalid],
        ["GrnMRP", [fields.GrnMRP.visible && fields.GrnMRP.required ? ew.Validators.required(fields.GrnMRP.caption) : null, ew.Validators.float], fields.GrnMRP.isInvalid],
        ["trid", [fields.trid.visible && fields.trid.required ? ew.Validators.required(fields.trid.caption) : null, ew.Validators.integer], fields.trid.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["CreatedBy", [fields.CreatedBy.visible && fields.CreatedBy.required ? ew.Validators.required(fields.CreatedBy.caption) : null], fields.CreatedBy.isInvalid],
        ["CreatedDateTime", [fields.CreatedDateTime.visible && fields.CreatedDateTime.required ? ew.Validators.required(fields.CreatedDateTime.caption) : null], fields.CreatedDateTime.isInvalid],
        ["ModifiedBy", [fields.ModifiedBy.visible && fields.ModifiedBy.required ? ew.Validators.required(fields.ModifiedBy.caption) : null], fields.ModifiedBy.isInvalid],
        ["ModifiedDateTime", [fields.ModifiedDateTime.visible && fields.ModifiedDateTime.required ? ew.Validators.required(fields.ModifiedDateTime.caption) : null], fields.ModifiedDateTime.isInvalid],
        ["grncreatedby", [fields.grncreatedby.visible && fields.grncreatedby.required ? ew.Validators.required(fields.grncreatedby.caption) : null, ew.Validators.integer], fields.grncreatedby.isInvalid],
        ["grncreatedDateTime", [fields.grncreatedDateTime.visible && fields.grncreatedDateTime.required ? ew.Validators.required(fields.grncreatedDateTime.caption) : null, ew.Validators.datetime(0)], fields.grncreatedDateTime.isInvalid],
        ["grnModifiedby", [fields.grnModifiedby.visible && fields.grnModifiedby.required ? ew.Validators.required(fields.grnModifiedby.caption) : null, ew.Validators.integer], fields.grnModifiedby.isInvalid],
        ["grnModifiedDateTime", [fields.grnModifiedDateTime.visible && fields.grnModifiedDateTime.required ? ew.Validators.required(fields.grnModifiedDateTime.caption) : null, ew.Validators.datetime(0)], fields.grnModifiedDateTime.isInvalid],
        ["Received", [fields.Received.visible && fields.Received.required ? ew.Validators.required(fields.Received.caption) : null], fields.Received.isInvalid],
        ["BillDate", [fields.BillDate.visible && fields.BillDate.required ? ew.Validators.required(fields.BillDate.caption) : null, ew.Validators.datetime(0)], fields.BillDate.isInvalid],
        ["CurStock", [fields.CurStock.visible && fields.CurStock.required ? ew.Validators.required(fields.CurStock.caption) : null, ew.Validators.integer], fields.CurStock.isInvalid],
        ["grndate", [fields.grndate.visible && fields.grndate.required ? ew.Validators.required(fields.grndate.caption) : null], fields.grndate.isInvalid],
        ["grndatetime", [fields.grndatetime.visible && fields.grndatetime.required ? ew.Validators.required(fields.grndatetime.caption) : null], fields.grndatetime.isInvalid],
        ["strid", [fields.strid.visible && fields.strid.required ? ew.Validators.required(fields.strid.caption) : null, ew.Validators.integer], fields.strid.isInvalid],
        ["GRNPer", [fields.GRNPer.visible && fields.GRNPer.required ? ew.Validators.required(fields.GRNPer.caption) : null, ew.Validators.float], fields.GRNPer.isInvalid],
        ["FreeQtyyy", [fields.FreeQtyyy.visible && fields.FreeQtyyy.required ? ew.Validators.required(fields.FreeQtyyy.caption) : null, ew.Validators.integer], fields.FreeQtyyy.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_purchaseorderadd,
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
    fpharmacy_purchaseorderadd.validate = function () {
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
    fpharmacy_purchaseorderadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_purchaseorderadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_purchaseorderadd.lists.PRC = <?= $Page->PRC->toClientList($Page) ?>;
    fpharmacy_purchaseorderadd.lists.PC = <?= $Page->PC->toClientList($Page) ?>;
    fpharmacy_purchaseorderadd.lists.Received = <?= $Page->Received->toClientList($Page) ?>;
    loadjs.done("fpharmacy_purchaseorderadd");
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
<form name="fpharmacy_purchaseorderadd" id="fpharmacy_purchaseorderadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchaseorder">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "pharmacy_po") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="pharmacy_po">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->poid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->ORDNO->Visible) { // ORDNO ?>
    <div id="r_ORDNO" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_ORDNO" for="x_ORDNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ORDNO->caption() ?><?= $Page->ORDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ORDNO->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_ORDNO">
<input type="<?= $Page->ORDNO->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_ORDNO" name="x_ORDNO" id="x_ORDNO" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->ORDNO->getPlaceHolder()) ?>" value="<?= $Page->ORDNO->EditValue ?>"<?= $Page->ORDNO->editAttributes() ?> aria-describedby="x_ORDNO_help">
<?= $Page->ORDNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ORDNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
    <div id="r_PRC" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_PRC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PRC->caption() ?><?= $Page->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRC->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PRC">
<?php
$onchange = $Page->PRC->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PRC->EditAttrs["onchange"] = "";
?>
<span id="as_x_PRC" class="ew-auto-suggest">
    <input type="<?= $Page->PRC->getInputTextType() ?>" class="form-control" name="sv_x_PRC" id="sv_x_PRC" value="<?= RemoveHtml($Page->PRC->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>"<?= $Page->PRC->editAttributes() ?> aria-describedby="x_PRC_help">
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-input="sv_x_PRC" data-value-separator="<?= $Page->PRC->displayValueSeparatorAttribute() ?>" name="x_PRC" id="x_PRC" value="<?= HtmlEncode($Page->PRC->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->PRC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_purchaseorderadd"], function() {
    fpharmacy_purchaseorderadd.createAutoSuggest(Object.assign({"id":"x_PRC","forceSelect":true}, ew.vars.tables.pharmacy_purchaseorder.fields.PRC.autoSuggestOptions));
});
</script>
<?= $Page->PRC->Lookup->getParamTag($Page, "p_x_PRC") ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->QTY->Visible) { // QTY ?>
    <div id="r_QTY" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_QTY" for="x_QTY" class="<?= $Page->LeftColumnClass ?>"><?= $Page->QTY->caption() ?><?= $Page->QTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->QTY->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_QTY">
<input type="<?= $Page->QTY->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x_QTY" id="x_QTY" size="4" maxlength="6" placeholder="<?= HtmlEncode($Page->QTY->getPlaceHolder()) ?>" value="<?= $Page->QTY->EditValue ?>"<?= $Page->QTY->editAttributes() ?> aria-describedby="x_QTY_help">
<?= $Page->QTY->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->QTY->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <div id="r_DT" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_DT" for="x_DT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DT->caption() ?><?= $Page->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DT->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_DT">
<input type="<?= $Page->DT->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?= HtmlEncode($Page->DT->getPlaceHolder()) ?>" value="<?= $Page->DT->EditValue ?>"<?= $Page->DT->editAttributes() ?> aria-describedby="x_DT_help">
<?= $Page->DT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DT->getErrorMessage() ?></div>
<?php if (!$Page->DT->ReadOnly && !$Page->DT->Disabled && !isset($Page->DT->EditAttrs["readonly"]) && !isset($Page->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseorderadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_purchaseorderadd", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
    <div id="r_PC" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_PC" for="x_PC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PC->caption() ?><?= $Page->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PC->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PC">
<div class="input-group ew-lookup-list" aria-describedby="x_PC_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PC"><?= EmptyValue(strval($Page->PC->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->PC->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PC->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->PC->ReadOnly || $Page->PC->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PC',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->PC->getErrorMessage() ?></div>
<?= $Page->PC->getCustomMessage() ?>
<?= $Page->PC->Lookup->getParamTag($Page, "p_x_PC") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_purchaseorder" data-field="x_PC" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PC->displayValueSeparatorAttribute() ?>" name="x_PC" id="x_PC" value="<?= $Page->PC->CurrentValue ?>"<?= $Page->PC->editAttributes() ?>>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
    <div id="r_YM" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_YM" for="x_YM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->YM->caption() ?><?= $Page->YM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->YM->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_YM">
<input type="<?= $Page->YM->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_YM" name="x_YM" id="x_YM" size="4" maxlength="6" placeholder="<?= HtmlEncode($Page->YM->getPlaceHolder()) ?>" value="<?= $Page->YM->EditValue ?>"<?= $Page->YM->editAttributes() ?> aria-describedby="x_YM_help">
<?= $Page->YM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->YM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <div id="r_MFRCODE" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_MFRCODE" for="x_MFRCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MFRCODE->caption() ?><?= $Page->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_MFRCODE">
<input type="<?= $Page->MFRCODE->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->MFRCODE->getPlaceHolder()) ?>" value="<?= $Page->MFRCODE->EditValue ?>"<?= $Page->MFRCODE->editAttributes() ?> aria-describedby="x_MFRCODE_help">
<?= $Page->MFRCODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Stock->Visible) { // Stock ?>
    <div id="r_Stock" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_Stock" for="x_Stock" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Stock->caption() ?><?= $Page->Stock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Stock->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Stock">
<input type="<?= $Page->Stock->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x_Stock" id="x_Stock" size="4" maxlength="6" placeholder="<?= HtmlEncode($Page->Stock->getPlaceHolder()) ?>" value="<?= $Page->Stock->EditValue ?>"<?= $Page->Stock->editAttributes() ?> aria-describedby="x_Stock_help">
<?= $Page->Stock->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Stock->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
    <div id="r_LastMonthSale" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_LastMonthSale" for="x_LastMonthSale" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LastMonthSale->caption() ?><?= $Page->LastMonthSale->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LastMonthSale->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_LastMonthSale">
<input type="<?= $Page->LastMonthSale->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x_LastMonthSale" id="x_LastMonthSale" size="4" maxlength="6" placeholder="<?= HtmlEncode($Page->LastMonthSale->getPlaceHolder()) ?>" value="<?= $Page->LastMonthSale->EditValue ?>"<?= $Page->LastMonthSale->editAttributes() ?> aria-describedby="x_LastMonthSale_help">
<?= $Page->LastMonthSale->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LastMonthSale->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Printcheck->Visible) { // Printcheck ?>
    <div id="r_Printcheck" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_Printcheck" for="x_Printcheck" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Printcheck->caption() ?><?= $Page->Printcheck->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Printcheck->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Printcheck">
<input type="<?= $Page->Printcheck->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_Printcheck" name="x_Printcheck" id="x_Printcheck" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Printcheck->getPlaceHolder()) ?>" value="<?= $Page->Printcheck->EditValue ?>"<?= $Page->Printcheck->editAttributes() ?> aria-describedby="x_Printcheck_help">
<?= $Page->Printcheck->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Printcheck->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->poid->Visible) { // poid ?>
    <div id="r_poid" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_poid" for="x_poid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->poid->caption() ?><?= $Page->poid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->poid->cellAttributes() ?>>
<?php if ($Page->poid->getSessionValue() != "") { ?>
<span id="el_pharmacy_purchaseorder_poid">
<span<?= $Page->poid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->poid->getDisplayValue($Page->poid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x_poid" name="x_poid" value="<?= HtmlEncode($Page->poid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el_pharmacy_purchaseorder_poid">
<input type="<?= $Page->poid->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_poid" name="x_poid" id="x_poid" size="30" placeholder="<?= HtmlEncode($Page->poid->getPlaceHolder()) ?>" value="<?= $Page->poid->EditValue ?>"<?= $Page->poid->editAttributes() ?> aria-describedby="x_poid_help">
<?= $Page->poid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->poid->getErrorMessage() ?></div>
</span>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
    <div id="r_PSGST" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_PSGST" for="x_PSGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PSGST->caption() ?><?= $Page->PSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PSGST">
<input type="<?= $Page->PSGST->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PSGST->getPlaceHolder()) ?>" value="<?= $Page->PSGST->EditValue ?>"<?= $Page->PSGST->editAttributes() ?> aria-describedby="x_PSGST_help">
<?= $Page->PSGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PSGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
    <div id="r_PCGST" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_PCGST" for="x_PCGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PCGST->caption() ?><?= $Page->PCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PCGST">
<input type="<?= $Page->PCGST->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PCGST->getPlaceHolder()) ?>" value="<?= $Page->PCGST->EditValue ?>"<?= $Page->PCGST->editAttributes() ?> aria-describedby="x_PCGST_help">
<?= $Page->PCGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PCGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
    <div id="r_SSGST" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_SSGST" for="x_SSGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SSGST->caption() ?><?= $Page->SSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SSGST">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?> aria-describedby="x_SSGST_help">
<?= $Page->SSGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
    <div id="r_SCGST" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_SCGST" for="x_SCGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SCGST->caption() ?><?= $Page->SCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SCGST">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?> aria-describedby="x_SCGST_help">
<?= $Page->SCGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <div id="r_BRCODE" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_BRCODE" for="x_BRCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BRCODE->caption() ?><?= $Page->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_BRCODE">
<input type="<?= $Page->BRCODE->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>" value="<?= $Page->BRCODE->EditValue ?>"<?= $Page->BRCODE->editAttributes() ?> aria-describedby="x_BRCODE_help">
<?= $Page->BRCODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HSN->Visible) { // HSN ?>
    <div id="r_HSN" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_HSN" for="x_HSN" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HSN->caption() ?><?= $Page->HSN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HSN->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_HSN">
<input type="<?= $Page->HSN->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_HSN" name="x_HSN" id="x_HSN" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HSN->getPlaceHolder()) ?>" value="<?= $Page->HSN->EditValue ?>"<?= $Page->HSN->editAttributes() ?> aria-describedby="x_HSN_help">
<?= $Page->HSN->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HSN->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pack->Visible) { // Pack ?>
    <div id="r_Pack" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_Pack" for="x_Pack" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Pack->caption() ?><?= $Page->Pack->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pack->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Pack">
<input type="<?= $Page->Pack->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_Pack" name="x_Pack" id="x_Pack" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pack->getPlaceHolder()) ?>" value="<?= $Page->Pack->EditValue ?>"<?= $Page->Pack->editAttributes() ?> aria-describedby="x_Pack_help">
<?= $Page->Pack->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pack->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
    <div id="r_PUnit" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_PUnit" for="x_PUnit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PUnit->caption() ?><?= $Page->PUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PUnit->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_PUnit">
<input type="<?= $Page->PUnit->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="30" placeholder="<?= HtmlEncode($Page->PUnit->getPlaceHolder()) ?>" value="<?= $Page->PUnit->EditValue ?>"<?= $Page->PUnit->editAttributes() ?> aria-describedby="x_PUnit_help">
<?= $Page->PUnit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PUnit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SUnit->Visible) { // SUnit ?>
    <div id="r_SUnit" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_SUnit" for="x_SUnit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SUnit->caption() ?><?= $Page->SUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SUnit->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_SUnit">
<input type="<?= $Page->SUnit->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="30" placeholder="<?= HtmlEncode($Page->SUnit->getPlaceHolder()) ?>" value="<?= $Page->SUnit->EditValue ?>"<?= $Page->SUnit->editAttributes() ?> aria-describedby="x_SUnit_help">
<?= $Page->SUnit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SUnit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GrnQuantity->Visible) { // GrnQuantity ?>
    <div id="r_GrnQuantity" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_GrnQuantity" for="x_GrnQuantity" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GrnQuantity->caption() ?><?= $Page->GrnQuantity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GrnQuantity->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_GrnQuantity">
<input type="<?= $Page->GrnQuantity->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_GrnQuantity" name="x_GrnQuantity" id="x_GrnQuantity" size="30" placeholder="<?= HtmlEncode($Page->GrnQuantity->getPlaceHolder()) ?>" value="<?= $Page->GrnQuantity->EditValue ?>"<?= $Page->GrnQuantity->editAttributes() ?> aria-describedby="x_GrnQuantity_help">
<?= $Page->GrnQuantity->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GrnQuantity->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GrnMRP->Visible) { // GrnMRP ?>
    <div id="r_GrnMRP" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_GrnMRP" for="x_GrnMRP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GrnMRP->caption() ?><?= $Page->GrnMRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GrnMRP->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_GrnMRP">
<input type="<?= $Page->GrnMRP->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_GrnMRP" name="x_GrnMRP" id="x_GrnMRP" size="30" placeholder="<?= HtmlEncode($Page->GrnMRP->getPlaceHolder()) ?>" value="<?= $Page->GrnMRP->EditValue ?>"<?= $Page->GrnMRP->editAttributes() ?> aria-describedby="x_GrnMRP_help">
<?= $Page->GrnMRP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GrnMRP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->trid->Visible) { // trid ?>
    <div id="r_trid" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_trid" for="x_trid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->trid->caption() ?><?= $Page->trid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->trid->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_trid">
<input type="<?= $Page->trid->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_trid" name="x_trid" id="x_trid" size="30" placeholder="<?= HtmlEncode($Page->trid->getPlaceHolder()) ?>" value="<?= $Page->trid->EditValue ?>"<?= $Page->trid->editAttributes() ?> aria-describedby="x_trid_help">
<?= $Page->trid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->trid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->grncreatedby->Visible) { // grncreatedby ?>
    <div id="r_grncreatedby" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_grncreatedby" for="x_grncreatedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->grncreatedby->caption() ?><?= $Page->grncreatedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->grncreatedby->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grncreatedby">
<input type="<?= $Page->grncreatedby->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_grncreatedby" name="x_grncreatedby" id="x_grncreatedby" size="30" placeholder="<?= HtmlEncode($Page->grncreatedby->getPlaceHolder()) ?>" value="<?= $Page->grncreatedby->EditValue ?>"<?= $Page->grncreatedby->editAttributes() ?> aria-describedby="x_grncreatedby_help">
<?= $Page->grncreatedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->grncreatedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
    <div id="r_grncreatedDateTime" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_grncreatedDateTime" for="x_grncreatedDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->grncreatedDateTime->caption() ?><?= $Page->grncreatedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->grncreatedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grncreatedDateTime">
<input type="<?= $Page->grncreatedDateTime->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_grncreatedDateTime" name="x_grncreatedDateTime" id="x_grncreatedDateTime" placeholder="<?= HtmlEncode($Page->grncreatedDateTime->getPlaceHolder()) ?>" value="<?= $Page->grncreatedDateTime->EditValue ?>"<?= $Page->grncreatedDateTime->editAttributes() ?> aria-describedby="x_grncreatedDateTime_help">
<?= $Page->grncreatedDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->grncreatedDateTime->getErrorMessage() ?></div>
<?php if (!$Page->grncreatedDateTime->ReadOnly && !$Page->grncreatedDateTime->Disabled && !isset($Page->grncreatedDateTime->EditAttrs["readonly"]) && !isset($Page->grncreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseorderadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_purchaseorderadd", "x_grncreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->grnModifiedby->Visible) { // grnModifiedby ?>
    <div id="r_grnModifiedby" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_grnModifiedby" for="x_grnModifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->grnModifiedby->caption() ?><?= $Page->grnModifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->grnModifiedby->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grnModifiedby">
<input type="<?= $Page->grnModifiedby->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_grnModifiedby" name="x_grnModifiedby" id="x_grnModifiedby" size="30" placeholder="<?= HtmlEncode($Page->grnModifiedby->getPlaceHolder()) ?>" value="<?= $Page->grnModifiedby->EditValue ?>"<?= $Page->grnModifiedby->editAttributes() ?> aria-describedby="x_grnModifiedby_help">
<?= $Page->grnModifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->grnModifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
    <div id="r_grnModifiedDateTime" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_grnModifiedDateTime" for="x_grnModifiedDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->grnModifiedDateTime->caption() ?><?= $Page->grnModifiedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->grnModifiedDateTime->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_grnModifiedDateTime">
<input type="<?= $Page->grnModifiedDateTime->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_grnModifiedDateTime" name="x_grnModifiedDateTime" id="x_grnModifiedDateTime" placeholder="<?= HtmlEncode($Page->grnModifiedDateTime->getPlaceHolder()) ?>" value="<?= $Page->grnModifiedDateTime->EditValue ?>"<?= $Page->grnModifiedDateTime->editAttributes() ?> aria-describedby="x_grnModifiedDateTime_help">
<?= $Page->grnModifiedDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->grnModifiedDateTime->getErrorMessage() ?></div>
<?php if (!$Page->grnModifiedDateTime->ReadOnly && !$Page->grnModifiedDateTime->Disabled && !isset($Page->grnModifiedDateTime->EditAttrs["readonly"]) && !isset($Page->grnModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseorderadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_purchaseorderadd", "x_grnModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Received->Visible) { // Received ?>
    <div id="r_Received" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_Received" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Received->caption() ?><?= $Page->Received->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Received->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_Received">
<template id="tp_x_Received">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="pharmacy_purchaseorder" data-field="x_Received" name="x_Received" id="x_Received"<?= $Page->Received->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Received" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Received[]"
    name="x_Received[]"
    value="<?= HtmlEncode($Page->Received->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_Received"
    data-target="dsl_x_Received"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Received->isInvalidClass() ?>"
    data-table="pharmacy_purchaseorder"
    data-field="x_Received"
    data-value-separator="<?= $Page->Received->displayValueSeparatorAttribute() ?>"
    <?= $Page->Received->editAttributes() ?>>
<?= $Page->Received->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Received->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
    <div id="r_BillDate" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_BillDate" for="x_BillDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BillDate->caption() ?><?= $Page->BillDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillDate->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_BillDate">
<input type="<?= $Page->BillDate->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x_BillDate" id="x_BillDate" placeholder="<?= HtmlEncode($Page->BillDate->getPlaceHolder()) ?>" value="<?= $Page->BillDate->EditValue ?>"<?= $Page->BillDate->editAttributes() ?> aria-describedby="x_BillDate_help">
<?= $Page->BillDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillDate->getErrorMessage() ?></div>
<?php if (!$Page->BillDate->ReadOnly && !$Page->BillDate->Disabled && !isset($Page->BillDate->EditAttrs["readonly"]) && !isset($Page->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseorderadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_purchaseorderadd", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CurStock->Visible) { // CurStock ?>
    <div id="r_CurStock" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_CurStock" for="x_CurStock" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CurStock->caption() ?><?= $Page->CurStock->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CurStock->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_CurStock">
<input type="<?= $Page->CurStock->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x_CurStock" id="x_CurStock" size="30" placeholder="<?= HtmlEncode($Page->CurStock->getPlaceHolder()) ?>" value="<?= $Page->CurStock->EditValue ?>"<?= $Page->CurStock->editAttributes() ?> aria-describedby="x_CurStock_help">
<?= $Page->CurStock->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CurStock->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->strid->Visible) { // strid ?>
    <div id="r_strid" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_strid" for="x_strid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->strid->caption() ?><?= $Page->strid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->strid->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_strid">
<input type="<?= $Page->strid->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_strid" name="x_strid" id="x_strid" size="30" placeholder="<?= HtmlEncode($Page->strid->getPlaceHolder()) ?>" value="<?= $Page->strid->EditValue ?>"<?= $Page->strid->editAttributes() ?> aria-describedby="x_strid_help">
<?= $Page->strid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->strid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GRNPer->Visible) { // GRNPer ?>
    <div id="r_GRNPer" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_GRNPer" for="x_GRNPer" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GRNPer->caption() ?><?= $Page->GRNPer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GRNPer->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_GRNPer">
<input type="<?= $Page->GRNPer->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" name="x_GRNPer" id="x_GRNPer" size="30" placeholder="<?= HtmlEncode($Page->GRNPer->getPlaceHolder()) ?>" value="<?= $Page->GRNPer->EditValue ?>"<?= $Page->GRNPer->editAttributes() ?> aria-describedby="x_GRNPer_help">
<?= $Page->GRNPer->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GRNPer->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FreeQtyyy->Visible) { // FreeQtyyy ?>
    <div id="r_FreeQtyyy" class="form-group row">
        <label id="elh_pharmacy_purchaseorder_FreeQtyyy" for="x_FreeQtyyy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FreeQtyyy->caption() ?><?= $Page->FreeQtyyy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FreeQtyyy->cellAttributes() ?>>
<span id="el_pharmacy_purchaseorder_FreeQtyyy">
<input type="<?= $Page->FreeQtyyy->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" name="x_FreeQtyyy" id="x_FreeQtyyy" size="30" placeholder="<?= HtmlEncode($Page->FreeQtyyy->getPlaceHolder()) ?>" value="<?= $Page->FreeQtyyy->EditValue ?>"<?= $Page->FreeQtyyy->editAttributes() ?> aria-describedby="x_FreeQtyyy_help">
<?= $Page->FreeQtyyy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FreeQtyyy->getErrorMessage() ?></div>
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
    ew.addEventHandlers("pharmacy_purchaseorder");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

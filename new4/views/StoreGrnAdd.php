<?php

namespace PHPMaker2021\HIMS;

// Page object
$StoreGrnAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fstore_grnadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fstore_grnadd = currentForm = new ew.Form("fstore_grnadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "store_grn")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.store_grn)
        ew.vars.tables.store_grn = currentTable;
    fstore_grnadd.addFields([
        ["GRNNO", [fields.GRNNO.visible && fields.GRNNO.required ? ew.Validators.required(fields.GRNNO.caption) : null], fields.GRNNO.isInvalid],
        ["DT", [fields.DT.visible && fields.DT.required ? ew.Validators.required(fields.DT.caption) : null, ew.Validators.datetime(0)], fields.DT.isInvalid],
        ["YM", [fields.YM.visible && fields.YM.required ? ew.Validators.required(fields.YM.caption) : null], fields.YM.isInvalid],
        ["PC", [fields.PC.visible && fields.PC.required ? ew.Validators.required(fields.PC.caption) : null], fields.PC.isInvalid],
        ["Customercode", [fields.Customercode.visible && fields.Customercode.required ? ew.Validators.required(fields.Customercode.caption) : null], fields.Customercode.isInvalid],
        ["Customername", [fields.Customername.visible && fields.Customername.required ? ew.Validators.required(fields.Customername.caption) : null], fields.Customername.isInvalid],
        ["pharmacy_pocol", [fields.pharmacy_pocol.visible && fields.pharmacy_pocol.required ? ew.Validators.required(fields.pharmacy_pocol.caption) : null], fields.pharmacy_pocol.isInvalid],
        ["Address1", [fields.Address1.visible && fields.Address1.required ? ew.Validators.required(fields.Address1.caption) : null], fields.Address1.isInvalid],
        ["Address2", [fields.Address2.visible && fields.Address2.required ? ew.Validators.required(fields.Address2.caption) : null], fields.Address2.isInvalid],
        ["Address3", [fields.Address3.visible && fields.Address3.required ? ew.Validators.required(fields.Address3.caption) : null], fields.Address3.isInvalid],
        ["State", [fields.State.visible && fields.State.required ? ew.Validators.required(fields.State.caption) : null], fields.State.isInvalid],
        ["Pincode", [fields.Pincode.visible && fields.Pincode.required ? ew.Validators.required(fields.Pincode.caption) : null], fields.Pincode.isInvalid],
        ["Phone", [fields.Phone.visible && fields.Phone.required ? ew.Validators.required(fields.Phone.caption) : null], fields.Phone.isInvalid],
        ["Fax", [fields.Fax.visible && fields.Fax.required ? ew.Validators.required(fields.Fax.caption) : null], fields.Fax.isInvalid],
        ["EEmail", [fields.EEmail.visible && fields.EEmail.required ? ew.Validators.required(fields.EEmail.caption) : null], fields.EEmail.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["BILLNO", [fields.BILLNO.visible && fields.BILLNO.required ? ew.Validators.required(fields.BILLNO.caption) : null], fields.BILLNO.isInvalid],
        ["BILLDT", [fields.BILLDT.visible && fields.BILLDT.required ? ew.Validators.required(fields.BILLDT.caption) : null, ew.Validators.datetime(0)], fields.BILLDT.isInvalid],
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null], fields.BRCODE.isInvalid],
        ["PharmacyID", [fields.PharmacyID.visible && fields.PharmacyID.required ? ew.Validators.required(fields.PharmacyID.caption) : null], fields.PharmacyID.isInvalid],
        ["BillTotalValue", [fields.BillTotalValue.visible && fields.BillTotalValue.required ? ew.Validators.required(fields.BillTotalValue.caption) : null, ew.Validators.float], fields.BillTotalValue.isInvalid],
        ["GRNTotalValue", [fields.GRNTotalValue.visible && fields.GRNTotalValue.required ? ew.Validators.required(fields.GRNTotalValue.caption) : null, ew.Validators.float], fields.GRNTotalValue.isInvalid],
        ["BillDiscount", [fields.BillDiscount.visible && fields.BillDiscount.required ? ew.Validators.required(fields.BillDiscount.caption) : null, ew.Validators.float], fields.BillDiscount.isInvalid],
        ["BillUpload", [fields.BillUpload.visible && fields.BillUpload.required ? ew.Validators.fileRequired(fields.BillUpload.caption) : null], fields.BillUpload.isInvalid],
        ["TransPort", [fields.TransPort.visible && fields.TransPort.required ? ew.Validators.required(fields.TransPort.caption) : null, ew.Validators.float], fields.TransPort.isInvalid],
        ["AnyOther", [fields.AnyOther.visible && fields.AnyOther.required ? ew.Validators.required(fields.AnyOther.caption) : null, ew.Validators.float], fields.AnyOther.isInvalid],
        ["Remarks", [fields.Remarks.visible && fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid],
        ["GrnValue", [fields.GrnValue.visible && fields.GrnValue.required ? ew.Validators.required(fields.GrnValue.caption) : null, ew.Validators.float], fields.GrnValue.isInvalid],
        ["Pid", [fields.Pid.visible && fields.Pid.required ? ew.Validators.required(fields.Pid.caption) : null, ew.Validators.integer], fields.Pid.isInvalid],
        ["PaymentNo", [fields.PaymentNo.visible && fields.PaymentNo.required ? ew.Validators.required(fields.PaymentNo.caption) : null], fields.PaymentNo.isInvalid],
        ["PaymentStatus", [fields.PaymentStatus.visible && fields.PaymentStatus.required ? ew.Validators.required(fields.PaymentStatus.caption) : null], fields.PaymentStatus.isInvalid],
        ["PaidAmount", [fields.PaidAmount.visible && fields.PaidAmount.required ? ew.Validators.required(fields.PaidAmount.caption) : null, ew.Validators.float], fields.PaidAmount.isInvalid],
        ["StoreID", [fields.StoreID.visible && fields.StoreID.required ? ew.Validators.required(fields.StoreID.caption) : null, ew.Validators.integer], fields.StoreID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fstore_grnadd,
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
    fstore_grnadd.validate = function () {
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
    fstore_grnadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fstore_grnadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fstore_grnadd.lists.PC = <?= $Page->PC->toClientList($Page) ?>;
    fstore_grnadd.lists.BRCODE = <?= $Page->BRCODE->toClientList($Page) ?>;
    loadjs.done("fstore_grnadd");
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
<form name="fstore_grnadd" id="fstore_grnadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="store_grn">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "store_payment") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="store_payment">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->Pid->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($Page->GRNNO->Visible) { // GRNNO ?>
    <div id="r_GRNNO" class="form-group row">
        <label id="elh_store_grn_GRNNO" for="x_GRNNO" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_GRNNO"><?= $Page->GRNNO->caption() ?><?= $Page->GRNNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GRNNO->cellAttributes() ?>>
<template id="tpx_store_grn_GRNNO"><span id="el_store_grn_GRNNO">
<input type="<?= $Page->GRNNO->getInputTextType() ?>" data-table="store_grn" data-field="x_GRNNO" name="x_GRNNO" id="x_GRNNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GRNNO->getPlaceHolder()) ?>" value="<?= $Page->GRNNO->EditValue ?>"<?= $Page->GRNNO->editAttributes() ?> aria-describedby="x_GRNNO_help">
<?= $Page->GRNNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GRNNO->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <div id="r_DT" class="form-group row">
        <label id="elh_store_grn_DT" for="x_DT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_DT"><?= $Page->DT->caption() ?><?= $Page->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DT->cellAttributes() ?>>
<template id="tpx_store_grn_DT"><span id="el_store_grn_DT">
<input type="<?= $Page->DT->getInputTextType() ?>" data-table="store_grn" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?= HtmlEncode($Page->DT->getPlaceHolder()) ?>" value="<?= $Page->DT->EditValue ?>"<?= $Page->DT->editAttributes() ?> aria-describedby="x_DT_help">
<?= $Page->DT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DT->getErrorMessage() ?></div>
<?php if (!$Page->DT->ReadOnly && !$Page->DT->Disabled && !isset($Page->DT->EditAttrs["readonly"]) && !isset($Page->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_grnadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fstore_grnadd", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
    <div id="r_YM" class="form-group row">
        <label id="elh_store_grn_YM" for="x_YM" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_YM"><?= $Page->YM->caption() ?><?= $Page->YM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->YM->cellAttributes() ?>>
<template id="tpx_store_grn_YM"><span id="el_store_grn_YM">
<input type="<?= $Page->YM->getInputTextType() ?>" data-table="store_grn" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->YM->getPlaceHolder()) ?>" value="<?= $Page->YM->EditValue ?>"<?= $Page->YM->editAttributes() ?> aria-describedby="x_YM_help">
<?= $Page->YM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->YM->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
    <div id="r_PC" class="form-group row">
        <label id="elh_store_grn_PC" for="x_PC" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_PC"><?= $Page->PC->caption() ?><?= $Page->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PC->cellAttributes() ?>>
<template id="tpx_store_grn_PC"><span id="el_store_grn_PC">
<?php $Page->PC->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_PC_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PC"><?= EmptyValue(strval($Page->PC->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->PC->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PC->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->PC->ReadOnly || $Page->PC->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PC',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
        <?php if (AllowAdd(CurrentProjectID() . "store_suppliers") && !$Page->PC->ReadOnly) { ?>
        <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_PC" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->PC->caption() ?>" data-title="<?= $Page->PC->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_PC',url:'<?= GetUrl("StoreSuppliersAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
        <?php } ?>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->PC->getErrorMessage() ?></div>
<?= $Page->PC->getCustomMessage() ?>
<?= $Page->PC->Lookup->getParamTag($Page, "p_x_PC") ?>
<input type="hidden" is="selection-list" data-table="store_grn" data-field="x_PC" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PC->displayValueSeparatorAttribute() ?>" name="x_PC" id="x_PC" value="<?= $Page->PC->CurrentValue ?>"<?= $Page->PC->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Customercode->Visible) { // Customercode ?>
    <div id="r_Customercode" class="form-group row">
        <label id="elh_store_grn_Customercode" for="x_Customercode" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_Customercode"><?= $Page->Customercode->caption() ?><?= $Page->Customercode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Customercode->cellAttributes() ?>>
<template id="tpx_store_grn_Customercode"><span id="el_store_grn_Customercode">
<input type="<?= $Page->Customercode->getInputTextType() ?>" data-table="store_grn" data-field="x_Customercode" name="x_Customercode" id="x_Customercode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Customercode->getPlaceHolder()) ?>" value="<?= $Page->Customercode->EditValue ?>"<?= $Page->Customercode->editAttributes() ?> aria-describedby="x_Customercode_help">
<?= $Page->Customercode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Customercode->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
    <div id="r_Customername" class="form-group row">
        <label id="elh_store_grn_Customername" for="x_Customername" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_Customername"><?= $Page->Customername->caption() ?><?= $Page->Customername->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Customername->cellAttributes() ?>>
<template id="tpx_store_grn_Customername"><span id="el_store_grn_Customername">
<input type="<?= $Page->Customername->getInputTextType() ?>" data-table="store_grn" data-field="x_Customername" name="x_Customername" id="x_Customername" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Customername->getPlaceHolder()) ?>" value="<?= $Page->Customername->EditValue ?>"<?= $Page->Customername->editAttributes() ?> aria-describedby="x_Customername_help">
<?= $Page->Customername->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Customername->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
    <div id="r_pharmacy_pocol" class="form-group row">
        <label id="elh_store_grn_pharmacy_pocol" for="x_pharmacy_pocol" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_pharmacy_pocol"><?= $Page->pharmacy_pocol->caption() ?><?= $Page->pharmacy_pocol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pharmacy_pocol->cellAttributes() ?>>
<template id="tpx_store_grn_pharmacy_pocol"><span id="el_store_grn_pharmacy_pocol">
<input type="<?= $Page->pharmacy_pocol->getInputTextType() ?>" data-table="store_grn" data-field="x_pharmacy_pocol" name="x_pharmacy_pocol" id="x_pharmacy_pocol" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pharmacy_pocol->getPlaceHolder()) ?>" value="<?= $Page->pharmacy_pocol->EditValue ?>"<?= $Page->pharmacy_pocol->editAttributes() ?> aria-describedby="x_pharmacy_pocol_help">
<?= $Page->pharmacy_pocol->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pharmacy_pocol->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
    <div id="r_Address1" class="form-group row">
        <label id="elh_store_grn_Address1" for="x_Address1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_Address1"><?= $Page->Address1->caption() ?><?= $Page->Address1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Address1->cellAttributes() ?>>
<template id="tpx_store_grn_Address1"><span id="el_store_grn_Address1">
<input type="<?= $Page->Address1->getInputTextType() ?>" data-table="store_grn" data-field="x_Address1" name="x_Address1" id="x_Address1" placeholder="<?= HtmlEncode($Page->Address1->getPlaceHolder()) ?>" value="<?= $Page->Address1->EditValue ?>"<?= $Page->Address1->editAttributes() ?> aria-describedby="x_Address1_help">
<?= $Page->Address1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Address1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
    <div id="r_Address2" class="form-group row">
        <label id="elh_store_grn_Address2" for="x_Address2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_Address2"><?= $Page->Address2->caption() ?><?= $Page->Address2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Address2->cellAttributes() ?>>
<template id="tpx_store_grn_Address2"><span id="el_store_grn_Address2">
<input type="<?= $Page->Address2->getInputTextType() ?>" data-table="store_grn" data-field="x_Address2" name="x_Address2" id="x_Address2" placeholder="<?= HtmlEncode($Page->Address2->getPlaceHolder()) ?>" value="<?= $Page->Address2->EditValue ?>"<?= $Page->Address2->editAttributes() ?> aria-describedby="x_Address2_help">
<?= $Page->Address2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Address2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
    <div id="r_Address3" class="form-group row">
        <label id="elh_store_grn_Address3" for="x_Address3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_Address3"><?= $Page->Address3->caption() ?><?= $Page->Address3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Address3->cellAttributes() ?>>
<template id="tpx_store_grn_Address3"><span id="el_store_grn_Address3">
<input type="<?= $Page->Address3->getInputTextType() ?>" data-table="store_grn" data-field="x_Address3" name="x_Address3" id="x_Address3" placeholder="<?= HtmlEncode($Page->Address3->getPlaceHolder()) ?>" value="<?= $Page->Address3->EditValue ?>"<?= $Page->Address3->editAttributes() ?> aria-describedby="x_Address3_help">
<?= $Page->Address3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Address3->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <div id="r_State" class="form-group row">
        <label id="elh_store_grn_State" for="x_State" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_State"><?= $Page->State->caption() ?><?= $Page->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->State->cellAttributes() ?>>
<template id="tpx_store_grn_State"><span id="el_store_grn_State">
<input type="<?= $Page->State->getInputTextType() ?>" data-table="store_grn" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->State->getPlaceHolder()) ?>" value="<?= $Page->State->EditValue ?>"<?= $Page->State->editAttributes() ?> aria-describedby="x_State_help">
<?= $Page->State->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->State->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
    <div id="r_Pincode" class="form-group row">
        <label id="elh_store_grn_Pincode" for="x_Pincode" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_Pincode"><?= $Page->Pincode->caption() ?><?= $Page->Pincode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pincode->cellAttributes() ?>>
<template id="tpx_store_grn_Pincode"><span id="el_store_grn_Pincode">
<input type="<?= $Page->Pincode->getInputTextType() ?>" data-table="store_grn" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pincode->getPlaceHolder()) ?>" value="<?= $Page->Pincode->EditValue ?>"<?= $Page->Pincode->editAttributes() ?> aria-describedby="x_Pincode_help">
<?= $Page->Pincode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pincode->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
    <div id="r_Phone" class="form-group row">
        <label id="elh_store_grn_Phone" for="x_Phone" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_Phone"><?= $Page->Phone->caption() ?><?= $Page->Phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Phone->cellAttributes() ?>>
<template id="tpx_store_grn_Phone"><span id="el_store_grn_Phone">
<input type="<?= $Page->Phone->getInputTextType() ?>" data-table="store_grn" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Phone->getPlaceHolder()) ?>" value="<?= $Page->Phone->EditValue ?>"<?= $Page->Phone->editAttributes() ?> aria-describedby="x_Phone_help">
<?= $Page->Phone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Phone->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
    <div id="r_Fax" class="form-group row">
        <label id="elh_store_grn_Fax" for="x_Fax" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_Fax"><?= $Page->Fax->caption() ?><?= $Page->Fax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Fax->cellAttributes() ?>>
<template id="tpx_store_grn_Fax"><span id="el_store_grn_Fax">
<input type="<?= $Page->Fax->getInputTextType() ?>" data-table="store_grn" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Fax->getPlaceHolder()) ?>" value="<?= $Page->Fax->EditValue ?>"<?= $Page->Fax->editAttributes() ?> aria-describedby="x_Fax_help">
<?= $Page->Fax->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Fax->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EEmail->Visible) { // EEmail ?>
    <div id="r_EEmail" class="form-group row">
        <label id="elh_store_grn_EEmail" for="x_EEmail" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_EEmail"><?= $Page->EEmail->caption() ?><?= $Page->EEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EEmail->cellAttributes() ?>>
<template id="tpx_store_grn_EEmail"><span id="el_store_grn_EEmail">
<input type="<?= $Page->EEmail->getInputTextType() ?>" data-table="store_grn" data-field="x_EEmail" name="x_EEmail" id="x_EEmail" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EEmail->getPlaceHolder()) ?>" value="<?= $Page->EEmail->EditValue ?>"<?= $Page->EEmail->editAttributes() ?> aria-describedby="x_EEmail_help">
<?= $Page->EEmail->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EEmail->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
    <div id="r_BILLNO" class="form-group row">
        <label id="elh_store_grn_BILLNO" for="x_BILLNO" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_BILLNO"><?= $Page->BILLNO->caption() ?><?= $Page->BILLNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BILLNO->cellAttributes() ?>>
<template id="tpx_store_grn_BILLNO"><span id="el_store_grn_BILLNO">
<input type="<?= $Page->BILLNO->getInputTextType() ?>" data-table="store_grn" data-field="x_BILLNO" name="x_BILLNO" id="x_BILLNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BILLNO->getPlaceHolder()) ?>" value="<?= $Page->BILLNO->EditValue ?>"<?= $Page->BILLNO->editAttributes() ?> aria-describedby="x_BILLNO_help">
<?= $Page->BILLNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BILLNO->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
    <div id="r_BILLDT" class="form-group row">
        <label id="elh_store_grn_BILLDT" for="x_BILLDT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_BILLDT"><?= $Page->BILLDT->caption() ?><?= $Page->BILLDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BILLDT->cellAttributes() ?>>
<template id="tpx_store_grn_BILLDT"><span id="el_store_grn_BILLDT">
<input type="<?= $Page->BILLDT->getInputTextType() ?>" data-table="store_grn" data-field="x_BILLDT" name="x_BILLDT" id="x_BILLDT" placeholder="<?= HtmlEncode($Page->BILLDT->getPlaceHolder()) ?>" value="<?= $Page->BILLDT->EditValue ?>"<?= $Page->BILLDT->editAttributes() ?> aria-describedby="x_BILLDT_help">
<?= $Page->BILLDT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BILLDT->getErrorMessage() ?></div>
<?php if (!$Page->BILLDT->ReadOnly && !$Page->BILLDT->Disabled && !isset($Page->BILLDT->EditAttrs["readonly"]) && !isset($Page->BILLDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_grnadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fstore_grnadd", "x_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <div id="r_BRCODE" class="form-group row">
        <label id="elh_store_grn_BRCODE" for="x_BRCODE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_BRCODE"><?= $Page->BRCODE->caption() ?><?= $Page->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BRCODE->cellAttributes() ?>>
<template id="tpx_store_grn_BRCODE"><span id="el_store_grn_BRCODE">
    <select
        id="x_BRCODE"
        name="x_BRCODE"
        class="form-control ew-select<?= $Page->BRCODE->isInvalidClass() ?>"
        data-select2-id="store_grn_x_BRCODE"
        data-table="store_grn"
        data-field="x_BRCODE"
        data-value-separator="<?= $Page->BRCODE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>"
        <?= $Page->BRCODE->editAttributes() ?>>
        <?= $Page->BRCODE->selectOptionListHtml("x_BRCODE") ?>
    </select>
    <?= $Page->BRCODE->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage() ?></div>
<?= $Page->BRCODE->Lookup->getParamTag($Page, "p_x_BRCODE") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='store_grn_x_BRCODE']"),
        options = { name: "x_BRCODE", selectId: "store_grn_x_BRCODE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.store_grn.fields.BRCODE.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
    <div id="r_BillTotalValue" class="form-group row">
        <label id="elh_store_grn_BillTotalValue" for="x_BillTotalValue" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_BillTotalValue"><?= $Page->BillTotalValue->caption() ?><?= $Page->BillTotalValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillTotalValue->cellAttributes() ?>>
<template id="tpx_store_grn_BillTotalValue"><span id="el_store_grn_BillTotalValue">
<input type="<?= $Page->BillTotalValue->getInputTextType() ?>" data-table="store_grn" data-field="x_BillTotalValue" name="x_BillTotalValue" id="x_BillTotalValue" size="30" placeholder="<?= HtmlEncode($Page->BillTotalValue->getPlaceHolder()) ?>" value="<?= $Page->BillTotalValue->EditValue ?>"<?= $Page->BillTotalValue->editAttributes() ?> aria-describedby="x_BillTotalValue_help">
<?= $Page->BillTotalValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillTotalValue->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
    <div id="r_GRNTotalValue" class="form-group row">
        <label id="elh_store_grn_GRNTotalValue" for="x_GRNTotalValue" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_GRNTotalValue"><?= $Page->GRNTotalValue->caption() ?><?= $Page->GRNTotalValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GRNTotalValue->cellAttributes() ?>>
<template id="tpx_store_grn_GRNTotalValue"><span id="el_store_grn_GRNTotalValue">
<input type="<?= $Page->GRNTotalValue->getInputTextType() ?>" data-table="store_grn" data-field="x_GRNTotalValue" name="x_GRNTotalValue" id="x_GRNTotalValue" size="30" placeholder="<?= HtmlEncode($Page->GRNTotalValue->getPlaceHolder()) ?>" value="<?= $Page->GRNTotalValue->EditValue ?>"<?= $Page->GRNTotalValue->editAttributes() ?> aria-describedby="x_GRNTotalValue_help">
<?= $Page->GRNTotalValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GRNTotalValue->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
    <div id="r_BillDiscount" class="form-group row">
        <label id="elh_store_grn_BillDiscount" for="x_BillDiscount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_BillDiscount"><?= $Page->BillDiscount->caption() ?><?= $Page->BillDiscount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillDiscount->cellAttributes() ?>>
<template id="tpx_store_grn_BillDiscount"><span id="el_store_grn_BillDiscount">
<input type="<?= $Page->BillDiscount->getInputTextType() ?>" data-table="store_grn" data-field="x_BillDiscount" name="x_BillDiscount" id="x_BillDiscount" size="30" placeholder="<?= HtmlEncode($Page->BillDiscount->getPlaceHolder()) ?>" value="<?= $Page->BillDiscount->EditValue ?>"<?= $Page->BillDiscount->editAttributes() ?> aria-describedby="x_BillDiscount_help">
<?= $Page->BillDiscount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillDiscount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillUpload->Visible) { // BillUpload ?>
    <div id="r_BillUpload" class="form-group row">
        <label id="elh_store_grn_BillUpload" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_BillUpload"><?= $Page->BillUpload->caption() ?><?= $Page->BillUpload->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillUpload->cellAttributes() ?>>
<template id="tpx_store_grn_BillUpload"><span id="el_store_grn_BillUpload">
<div id="fd_x_BillUpload">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->BillUpload->title() ?>" data-table="store_grn" data-field="x_BillUpload" name="x_BillUpload" id="x_BillUpload" lang="<?= CurrentLanguageID() ?>"<?= $Page->BillUpload->editAttributes() ?><?= ($Page->BillUpload->ReadOnly || $Page->BillUpload->Disabled) ? " disabled" : "" ?> aria-describedby="x_BillUpload_help">
        <label class="custom-file-label ew-file-label" for="x_BillUpload"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<?= $Page->BillUpload->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillUpload->getErrorMessage() ?></div>
<input type="hidden" name="fn_x_BillUpload" id= "fn_x_BillUpload" value="<?= $Page->BillUpload->Upload->FileName ?>">
<input type="hidden" name="fa_x_BillUpload" id= "fa_x_BillUpload" value="0">
<input type="hidden" name="fs_x_BillUpload" id= "fs_x_BillUpload" value="450">
<input type="hidden" name="fx_x_BillUpload" id= "fx_x_BillUpload" value="<?= $Page->BillUpload->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x_BillUpload" id= "fm_x_BillUpload" value="<?= $Page->BillUpload->UploadMaxFileSize ?>">
</div>
<table id="ft_x_BillUpload" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TransPort->Visible) { // TransPort ?>
    <div id="r_TransPort" class="form-group row">
        <label id="elh_store_grn_TransPort" for="x_TransPort" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_TransPort"><?= $Page->TransPort->caption() ?><?= $Page->TransPort->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TransPort->cellAttributes() ?>>
<template id="tpx_store_grn_TransPort"><span id="el_store_grn_TransPort">
<input type="<?= $Page->TransPort->getInputTextType() ?>" data-table="store_grn" data-field="x_TransPort" name="x_TransPort" id="x_TransPort" size="30" placeholder="<?= HtmlEncode($Page->TransPort->getPlaceHolder()) ?>" value="<?= $Page->TransPort->EditValue ?>"<?= $Page->TransPort->editAttributes() ?> aria-describedby="x_TransPort_help">
<?= $Page->TransPort->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TransPort->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnyOther->Visible) { // AnyOther ?>
    <div id="r_AnyOther" class="form-group row">
        <label id="elh_store_grn_AnyOther" for="x_AnyOther" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_AnyOther"><?= $Page->AnyOther->caption() ?><?= $Page->AnyOther->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnyOther->cellAttributes() ?>>
<template id="tpx_store_grn_AnyOther"><span id="el_store_grn_AnyOther">
<input type="<?= $Page->AnyOther->getInputTextType() ?>" data-table="store_grn" data-field="x_AnyOther" name="x_AnyOther" id="x_AnyOther" size="30" placeholder="<?= HtmlEncode($Page->AnyOther->getPlaceHolder()) ?>" value="<?= $Page->AnyOther->EditValue ?>"<?= $Page->AnyOther->editAttributes() ?> aria-describedby="x_AnyOther_help">
<?= $Page->AnyOther->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnyOther->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label id="elh_store_grn_Remarks" for="x_Remarks" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_Remarks"><?= $Page->Remarks->caption() ?><?= $Page->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Remarks->cellAttributes() ?>>
<template id="tpx_store_grn_Remarks"><span id="el_store_grn_Remarks">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="store_grn" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="205" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?> aria-describedby="x_Remarks_help">
<?= $Page->Remarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GrnValue->Visible) { // GrnValue ?>
    <div id="r_GrnValue" class="form-group row">
        <label id="elh_store_grn_GrnValue" for="x_GrnValue" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_GrnValue"><?= $Page->GrnValue->caption() ?><?= $Page->GrnValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GrnValue->cellAttributes() ?>>
<template id="tpx_store_grn_GrnValue"><span id="el_store_grn_GrnValue">
<input type="<?= $Page->GrnValue->getInputTextType() ?>" data-table="store_grn" data-field="x_GrnValue" name="x_GrnValue" id="x_GrnValue" size="30" placeholder="<?= HtmlEncode($Page->GrnValue->getPlaceHolder()) ?>" value="<?= $Page->GrnValue->EditValue ?>"<?= $Page->GrnValue->editAttributes() ?> aria-describedby="x_GrnValue_help">
<?= $Page->GrnValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GrnValue->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pid->Visible) { // Pid ?>
    <div id="r_Pid" class="form-group row">
        <label id="elh_store_grn_Pid" for="x_Pid" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_Pid"><?= $Page->Pid->caption() ?><?= $Page->Pid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pid->cellAttributes() ?>>
<?php if ($Page->Pid->getSessionValue() != "") { ?>
<template id="tpx_store_grn_Pid"><span id="el_store_grn_Pid">
<span<?= $Page->Pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Pid->getDisplayValue($Page->Pid->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_Pid" name="x_Pid" value="<?= HtmlEncode($Page->Pid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_store_grn_Pid"><span id="el_store_grn_Pid">
<input type="<?= $Page->Pid->getInputTextType() ?>" data-table="store_grn" data-field="x_Pid" name="x_Pid" id="x_Pid" size="30" placeholder="<?= HtmlEncode($Page->Pid->getPlaceHolder()) ?>" value="<?= $Page->Pid->EditValue ?>"<?= $Page->Pid->editAttributes() ?> aria-describedby="x_Pid_help">
<?= $Page->Pid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pid->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaymentNo->Visible) { // PaymentNo ?>
    <div id="r_PaymentNo" class="form-group row">
        <label id="elh_store_grn_PaymentNo" for="x_PaymentNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_PaymentNo"><?= $Page->PaymentNo->caption() ?><?= $Page->PaymentNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaymentNo->cellAttributes() ?>>
<template id="tpx_store_grn_PaymentNo"><span id="el_store_grn_PaymentNo">
<input type="<?= $Page->PaymentNo->getInputTextType() ?>" data-table="store_grn" data-field="x_PaymentNo" name="x_PaymentNo" id="x_PaymentNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaymentNo->getPlaceHolder()) ?>" value="<?= $Page->PaymentNo->EditValue ?>"<?= $Page->PaymentNo->editAttributes() ?> aria-describedby="x_PaymentNo_help">
<?= $Page->PaymentNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PaymentNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
    <div id="r_PaymentStatus" class="form-group row">
        <label id="elh_store_grn_PaymentStatus" for="x_PaymentStatus" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_PaymentStatus"><?= $Page->PaymentStatus->caption() ?><?= $Page->PaymentStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaymentStatus->cellAttributes() ?>>
<template id="tpx_store_grn_PaymentStatus"><span id="el_store_grn_PaymentStatus">
<input type="<?= $Page->PaymentStatus->getInputTextType() ?>" data-table="store_grn" data-field="x_PaymentStatus" name="x_PaymentStatus" id="x_PaymentStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaymentStatus->getPlaceHolder()) ?>" value="<?= $Page->PaymentStatus->EditValue ?>"<?= $Page->PaymentStatus->editAttributes() ?> aria-describedby="x_PaymentStatus_help">
<?= $Page->PaymentStatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PaymentStatus->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
    <div id="r_PaidAmount" class="form-group row">
        <label id="elh_store_grn_PaidAmount" for="x_PaidAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_PaidAmount"><?= $Page->PaidAmount->caption() ?><?= $Page->PaidAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaidAmount->cellAttributes() ?>>
<template id="tpx_store_grn_PaidAmount"><span id="el_store_grn_PaidAmount">
<input type="<?= $Page->PaidAmount->getInputTextType() ?>" data-table="store_grn" data-field="x_PaidAmount" name="x_PaidAmount" id="x_PaidAmount" size="30" placeholder="<?= HtmlEncode($Page->PaidAmount->getPlaceHolder()) ?>" value="<?= $Page->PaidAmount->EditValue ?>"<?= $Page->PaidAmount->editAttributes() ?> aria-describedby="x_PaidAmount_help">
<?= $Page->PaidAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PaidAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StoreID->Visible) { // StoreID ?>
    <div id="r_StoreID" class="form-group row">
        <label id="elh_store_grn_StoreID" for="x_StoreID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_store_grn_StoreID"><?= $Page->StoreID->caption() ?><?= $Page->StoreID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StoreID->cellAttributes() ?>>
<template id="tpx_store_grn_StoreID"><span id="el_store_grn_StoreID">
<input type="<?= $Page->StoreID->getInputTextType() ?>" data-table="store_grn" data-field="x_StoreID" name="x_StoreID" id="x_StoreID" size="30" placeholder="<?= HtmlEncode($Page->StoreID->getPlaceHolder()) ?>" value="<?= $Page->StoreID->EditValue ?>"<?= $Page->StoreID->editAttributes() ?> aria-describedby="x_StoreID_help">
<?= $Page->StoreID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StoreID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_store_grnadd" class="ew-custom-template"></div>
<template id="tpm_store_grnadd">
<div id="ct_StoreGrnAdd"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<div class="row">
	<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_store_grn_GRNNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_GRNNO"></slot></h3>
	</div>
</div>
<div id="divCheckbox" style="display: none;"><slot class="ew-slot" name="tpc_store_grn_pharmacy_pocol"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_pharmacy_pocol"></slot></div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Supplier</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_BRCODE"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_BRCODE"></slot></span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_PC"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_PC"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_DT"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_DT"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_YM"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_YM"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Customercode"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Customercode"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Customername"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Customername"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_BILLDT"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_BILLDT"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_BILLNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_BILLNO"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_BillTotalValue"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_BillTotalValue"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_BillUpload"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_BillUpload"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Remarks"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Remarks"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-8">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Details</h3>
			</div>
			<div class="card-body">
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Address1"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Address1"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Address2"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Address2"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Address3"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Address3"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_State"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_State"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Pincode"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Pincode"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Fax"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Fax"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_Phone"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_Phone"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_GRNTotalValue"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_GRNTotalValue"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_TransPort"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_TransPort"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_AnyOther"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_AnyOther"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_BillDiscount"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_BillDiscount"></slot></span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_store_grn_GrnValue"></slot>&nbsp;<slot class="ew-slot" name="tpx_store_grn_GrnValue"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
</div>
</template>
<?php
    if (in_array("view_store_grn", explode(",", $Page->getCurrentDetailTable())) && $view_store_grn->DetailAdd) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("view_store_grn", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ViewStoreGrnGrid.php" ?>
<?php } ?>
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_store_grnadd", "tpm_store_grnadd", "store_grnadd", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("store_grn");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    // Write your table-specific startup script here
    // document.write("page loaded");

    // Write your table-specific startup script here
    // document.write("page loaded");
    </script>
    <style>
    .input-group>.form-control.ew-lookup-text {
    	width: 35em;
    }
    .input-group {
    	position: relative;
    	display: flex;
    	flex-wrap: nowrap;
    	align-items: stretch;
    	width: 100%;
    }
    .ew-grid .ew-table, .ew-grid .ew-grid-middle-panel {
    	border: 0;
    	padding: 0;
    	margin-bottom: 0;
    	overflow-x: scroll;
    }
    </style>
    <script>
    $("[data-name='Quantity']").hide();
    $("[data-name='BillDate']").hide();

    function addtotalSum()
    {	
    	var totSum = 0;
    	for (var i = 1; i < 40; i++) {
    			try {
    				var amount = document.getElementById("x" + i + "_SalTax");
    				if (amount.value != '') {
    				//	totSum = parseFloat(totSum).toFixed(2) + parseFloat(amount.value).toFixed(2);
    				totSum = ((Number(totSum)) + Number(amount.value));
    				}
    			}
    			catch(err) {
    			}
    	}
    		var BillAmount = document.getElementById("x_GRNTotalValue");
    	//	BillAmount.value = parseFloat(totSum).toFixed(2);
    		BillAmount.value = Math.round(totSum).toFixed(2);
    		var BillAmount = document.getElementById("x_GrnValue");
    		BillAmount.value = Math.round(totSum).toFixed(2);
    }
});
</script>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyPaymentAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_paymentadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpharmacy_paymentadd = currentForm = new ew.Form("fpharmacy_paymentadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_payment")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_payment)
        ew.vars.tables.pharmacy_payment = currentTable;
    fpharmacy_paymentadd.addFields([
        ["PAYNO", [fields.PAYNO.visible && fields.PAYNO.required ? ew.Validators.required(fields.PAYNO.caption) : null], fields.PAYNO.isInvalid],
        ["DT", [fields.DT.visible && fields.DT.required ? ew.Validators.required(fields.DT.caption) : null, ew.Validators.datetime(7)], fields.DT.isInvalid],
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
        ["PharmacyID", [fields.PharmacyID.visible && fields.PharmacyID.required ? ew.Validators.required(fields.PharmacyID.caption) : null], fields.PharmacyID.isInvalid],
        ["BillTotalValue", [fields.BillTotalValue.visible && fields.BillTotalValue.required ? ew.Validators.required(fields.BillTotalValue.caption) : null, ew.Validators.float], fields.BillTotalValue.isInvalid],
        ["GRNTotalValue", [fields.GRNTotalValue.visible && fields.GRNTotalValue.required ? ew.Validators.required(fields.GRNTotalValue.caption) : null, ew.Validators.float], fields.GRNTotalValue.isInvalid],
        ["BillDiscount", [fields.BillDiscount.visible && fields.BillDiscount.required ? ew.Validators.required(fields.BillDiscount.caption) : null, ew.Validators.float], fields.BillDiscount.isInvalid],
        ["BillUpload", [fields.BillUpload.visible && fields.BillUpload.required ? ew.Validators.required(fields.BillUpload.caption) : null], fields.BillUpload.isInvalid],
        ["TransPort", [fields.TransPort.visible && fields.TransPort.required ? ew.Validators.required(fields.TransPort.caption) : null, ew.Validators.float], fields.TransPort.isInvalid],
        ["AnyOther", [fields.AnyOther.visible && fields.AnyOther.required ? ew.Validators.required(fields.AnyOther.caption) : null, ew.Validators.float], fields.AnyOther.isInvalid],
        ["voucher_type", [fields.voucher_type.visible && fields.voucher_type.required ? ew.Validators.required(fields.voucher_type.caption) : null], fields.voucher_type.isInvalid],
        ["Details", [fields.Details.visible && fields.Details.required ? ew.Validators.required(fields.Details.caption) : null], fields.Details.isInvalid],
        ["ModeofPayment", [fields.ModeofPayment.visible && fields.ModeofPayment.required ? ew.Validators.required(fields.ModeofPayment.caption) : null], fields.ModeofPayment.isInvalid],
        ["Amount", [fields.Amount.visible && fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid],
        ["BankName", [fields.BankName.visible && fields.BankName.required ? ew.Validators.required(fields.BankName.caption) : null], fields.BankName.isInvalid],
        ["AccountNumber", [fields.AccountNumber.visible && fields.AccountNumber.required ? ew.Validators.required(fields.AccountNumber.caption) : null], fields.AccountNumber.isInvalid],
        ["chequeNumber", [fields.chequeNumber.visible && fields.chequeNumber.required ? ew.Validators.required(fields.chequeNumber.caption) : null], fields.chequeNumber.isInvalid],
        ["Remarks", [fields.Remarks.visible && fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid],
        ["SeectPaymentMode", [fields.SeectPaymentMode.visible && fields.SeectPaymentMode.required ? ew.Validators.required(fields.SeectPaymentMode.caption) : null], fields.SeectPaymentMode.isInvalid],
        ["PaidAmount", [fields.PaidAmount.visible && fields.PaidAmount.required ? ew.Validators.required(fields.PaidAmount.caption) : null], fields.PaidAmount.isInvalid],
        ["Currency", [fields.Currency.visible && fields.Currency.required ? ew.Validators.required(fields.Currency.caption) : null], fields.Currency.isInvalid],
        ["CardNumber", [fields.CardNumber.visible && fields.CardNumber.required ? ew.Validators.required(fields.CardNumber.caption) : null], fields.CardNumber.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_paymentadd,
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
    fpharmacy_paymentadd.validate = function () {
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
    fpharmacy_paymentadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_paymentadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_paymentadd.lists.Customername = <?= $Page->Customername->toClientList($Page) ?>;
    fpharmacy_paymentadd.lists.pharmacy_pocol = <?= $Page->pharmacy_pocol->toClientList($Page) ?>;
    fpharmacy_paymentadd.lists.ModeofPayment = <?= $Page->ModeofPayment->toClientList($Page) ?>;
    loadjs.done("fpharmacy_paymentadd");
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
<form name="fpharmacy_paymentadd" id="fpharmacy_paymentadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_payment">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($Page->PAYNO->Visible) { // PAYNO ?>
    <div id="r_PAYNO" class="form-group row">
        <label id="elh_pharmacy_payment_PAYNO" for="x_PAYNO" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_PAYNO"><?= $Page->PAYNO->caption() ?><?= $Page->PAYNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PAYNO->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_PAYNO"><span id="el_pharmacy_payment_PAYNO">
<input type="<?= $Page->PAYNO->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_PAYNO" name="x_PAYNO" id="x_PAYNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PAYNO->getPlaceHolder()) ?>" value="<?= $Page->PAYNO->EditValue ?>"<?= $Page->PAYNO->editAttributes() ?> aria-describedby="x_PAYNO_help">
<?= $Page->PAYNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PAYNO->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <div id="r_DT" class="form-group row">
        <label id="elh_pharmacy_payment_DT" for="x_DT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_DT"><?= $Page->DT->caption() ?><?= $Page->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DT->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_DT"><span id="el_pharmacy_payment_DT">
<input type="<?= $Page->DT->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_DT" data-format="7" name="x_DT" id="x_DT" placeholder="<?= HtmlEncode($Page->DT->getPlaceHolder()) ?>" value="<?= $Page->DT->EditValue ?>"<?= $Page->DT->editAttributes() ?> aria-describedby="x_DT_help">
<?= $Page->DT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DT->getErrorMessage() ?></div>
<?php if (!$Page->DT->ReadOnly && !$Page->DT->Disabled && !isset($Page->DT->EditAttrs["readonly"]) && !isset($Page->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_paymentadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_paymentadd", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
    <div id="r_YM" class="form-group row">
        <label id="elh_pharmacy_payment_YM" for="x_YM" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_YM"><?= $Page->YM->caption() ?><?= $Page->YM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->YM->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_YM"><span id="el_pharmacy_payment_YM">
<input type="<?= $Page->YM->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->YM->getPlaceHolder()) ?>" value="<?= $Page->YM->EditValue ?>"<?= $Page->YM->editAttributes() ?> aria-describedby="x_YM_help">
<?= $Page->YM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->YM->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
    <div id="r_PC" class="form-group row">
        <label id="elh_pharmacy_payment_PC" for="x_PC" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_PC"><?= $Page->PC->caption() ?><?= $Page->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PC->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_PC"><span id="el_pharmacy_payment_PC">
<input type="<?= $Page->PC->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PC->getPlaceHolder()) ?>" value="<?= $Page->PC->EditValue ?>"<?= $Page->PC->editAttributes() ?> aria-describedby="x_PC_help">
<?= $Page->PC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PC->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Customercode->Visible) { // Customercode ?>
    <div id="r_Customercode" class="form-group row">
        <label id="elh_pharmacy_payment_Customercode" for="x_Customercode" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_Customercode"><?= $Page->Customercode->caption() ?><?= $Page->Customercode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Customercode->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_Customercode"><span id="el_pharmacy_payment_Customercode">
<input type="<?= $Page->Customercode->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_Customercode" name="x_Customercode" id="x_Customercode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Customercode->getPlaceHolder()) ?>" value="<?= $Page->Customercode->EditValue ?>"<?= $Page->Customercode->editAttributes() ?> aria-describedby="x_Customercode_help">
<?= $Page->Customercode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Customercode->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
    <div id="r_Customername" class="form-group row">
        <label id="elh_pharmacy_payment_Customername" for="x_Customername" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_Customername"><?= $Page->Customername->caption() ?><?= $Page->Customername->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Customername->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_Customername"><span id="el_pharmacy_payment_Customername">
<?php $Page->Customername->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_Customername_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Customername"><?= EmptyValue(strval($Page->Customername->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Customername->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Customername->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Customername->ReadOnly || $Page->Customername->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Customername',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Customername->getErrorMessage() ?></div>
<?= $Page->Customername->getCustomMessage() ?>
<?= $Page->Customername->Lookup->getParamTag($Page, "p_x_Customername") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_payment" data-field="x_Customername" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Customername->displayValueSeparatorAttribute() ?>" name="x_Customername" id="x_Customername" value="<?= $Page->Customername->CurrentValue ?>"<?= $Page->Customername->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
    <div id="r_pharmacy_pocol" class="form-group row">
        <label id="elh_pharmacy_payment_pharmacy_pocol" for="x_pharmacy_pocol" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_pharmacy_pocol"><?= $Page->pharmacy_pocol->caption() ?><?= $Page->pharmacy_pocol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pharmacy_pocol->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_pharmacy_pocol"><span id="el_pharmacy_payment_pharmacy_pocol">
    <select
        id="x_pharmacy_pocol"
        name="x_pharmacy_pocol"
        class="form-control ew-select<?= $Page->pharmacy_pocol->isInvalidClass() ?>"
        data-select2-id="pharmacy_payment_x_pharmacy_pocol"
        data-table="pharmacy_payment"
        data-field="x_pharmacy_pocol"
        data-value-separator="<?= $Page->pharmacy_pocol->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->pharmacy_pocol->getPlaceHolder()) ?>"
        <?= $Page->pharmacy_pocol->editAttributes() ?>>
        <?= $Page->pharmacy_pocol->selectOptionListHtml("x_pharmacy_pocol") ?>
    </select>
    <?= $Page->pharmacy_pocol->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->pharmacy_pocol->getErrorMessage() ?></div>
<?= $Page->pharmacy_pocol->Lookup->getParamTag($Page, "p_x_pharmacy_pocol") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_payment_x_pharmacy_pocol']"),
        options = { name: "x_pharmacy_pocol", selectId: "pharmacy_payment_x_pharmacy_pocol", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_payment.fields.pharmacy_pocol.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
    <div id="r_Address1" class="form-group row">
        <label id="elh_pharmacy_payment_Address1" for="x_Address1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_Address1"><?= $Page->Address1->caption() ?><?= $Page->Address1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Address1->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_Address1"><span id="el_pharmacy_payment_Address1">
<input type="<?= $Page->Address1->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_Address1" name="x_Address1" id="x_Address1" placeholder="<?= HtmlEncode($Page->Address1->getPlaceHolder()) ?>" value="<?= $Page->Address1->EditValue ?>"<?= $Page->Address1->editAttributes() ?> aria-describedby="x_Address1_help">
<?= $Page->Address1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Address1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
    <div id="r_Address2" class="form-group row">
        <label id="elh_pharmacy_payment_Address2" for="x_Address2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_Address2"><?= $Page->Address2->caption() ?><?= $Page->Address2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Address2->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_Address2"><span id="el_pharmacy_payment_Address2">
<input type="<?= $Page->Address2->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_Address2" name="x_Address2" id="x_Address2" placeholder="<?= HtmlEncode($Page->Address2->getPlaceHolder()) ?>" value="<?= $Page->Address2->EditValue ?>"<?= $Page->Address2->editAttributes() ?> aria-describedby="x_Address2_help">
<?= $Page->Address2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Address2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
    <div id="r_Address3" class="form-group row">
        <label id="elh_pharmacy_payment_Address3" for="x_Address3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_Address3"><?= $Page->Address3->caption() ?><?= $Page->Address3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Address3->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_Address3"><span id="el_pharmacy_payment_Address3">
<input type="<?= $Page->Address3->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_Address3" name="x_Address3" id="x_Address3" placeholder="<?= HtmlEncode($Page->Address3->getPlaceHolder()) ?>" value="<?= $Page->Address3->EditValue ?>"<?= $Page->Address3->editAttributes() ?> aria-describedby="x_Address3_help">
<?= $Page->Address3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Address3->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <div id="r_State" class="form-group row">
        <label id="elh_pharmacy_payment_State" for="x_State" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_State"><?= $Page->State->caption() ?><?= $Page->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->State->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_State"><span id="el_pharmacy_payment_State">
<input type="<?= $Page->State->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->State->getPlaceHolder()) ?>" value="<?= $Page->State->EditValue ?>"<?= $Page->State->editAttributes() ?> aria-describedby="x_State_help">
<?= $Page->State->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->State->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
    <div id="r_Pincode" class="form-group row">
        <label id="elh_pharmacy_payment_Pincode" for="x_Pincode" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_Pincode"><?= $Page->Pincode->caption() ?><?= $Page->Pincode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pincode->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_Pincode"><span id="el_pharmacy_payment_Pincode">
<input type="<?= $Page->Pincode->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pincode->getPlaceHolder()) ?>" value="<?= $Page->Pincode->EditValue ?>"<?= $Page->Pincode->editAttributes() ?> aria-describedby="x_Pincode_help">
<?= $Page->Pincode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pincode->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
    <div id="r_Phone" class="form-group row">
        <label id="elh_pharmacy_payment_Phone" for="x_Phone" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_Phone"><?= $Page->Phone->caption() ?><?= $Page->Phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Phone->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_Phone"><span id="el_pharmacy_payment_Phone">
<input type="<?= $Page->Phone->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Phone->getPlaceHolder()) ?>" value="<?= $Page->Phone->EditValue ?>"<?= $Page->Phone->editAttributes() ?> aria-describedby="x_Phone_help">
<?= $Page->Phone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Phone->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
    <div id="r_Fax" class="form-group row">
        <label id="elh_pharmacy_payment_Fax" for="x_Fax" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_Fax"><?= $Page->Fax->caption() ?><?= $Page->Fax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Fax->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_Fax"><span id="el_pharmacy_payment_Fax">
<input type="<?= $Page->Fax->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Fax->getPlaceHolder()) ?>" value="<?= $Page->Fax->EditValue ?>"<?= $Page->Fax->editAttributes() ?> aria-describedby="x_Fax_help">
<?= $Page->Fax->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Fax->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EEmail->Visible) { // EEmail ?>
    <div id="r_EEmail" class="form-group row">
        <label id="elh_pharmacy_payment_EEmail" for="x_EEmail" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_EEmail"><?= $Page->EEmail->caption() ?><?= $Page->EEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EEmail->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_EEmail"><span id="el_pharmacy_payment_EEmail">
<input type="<?= $Page->EEmail->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_EEmail" name="x_EEmail" id="x_EEmail" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EEmail->getPlaceHolder()) ?>" value="<?= $Page->EEmail->EditValue ?>"<?= $Page->EEmail->editAttributes() ?> aria-describedby="x_EEmail_help">
<?= $Page->EEmail->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EEmail->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
    <div id="r_BillTotalValue" class="form-group row">
        <label id="elh_pharmacy_payment_BillTotalValue" for="x_BillTotalValue" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_BillTotalValue"><?= $Page->BillTotalValue->caption() ?><?= $Page->BillTotalValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillTotalValue->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_BillTotalValue"><span id="el_pharmacy_payment_BillTotalValue">
<input type="<?= $Page->BillTotalValue->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_BillTotalValue" name="x_BillTotalValue" id="x_BillTotalValue" size="30" placeholder="<?= HtmlEncode($Page->BillTotalValue->getPlaceHolder()) ?>" value="<?= $Page->BillTotalValue->EditValue ?>"<?= $Page->BillTotalValue->editAttributes() ?> aria-describedby="x_BillTotalValue_help">
<?= $Page->BillTotalValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillTotalValue->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
    <div id="r_GRNTotalValue" class="form-group row">
        <label id="elh_pharmacy_payment_GRNTotalValue" for="x_GRNTotalValue" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_GRNTotalValue"><?= $Page->GRNTotalValue->caption() ?><?= $Page->GRNTotalValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GRNTotalValue->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_GRNTotalValue"><span id="el_pharmacy_payment_GRNTotalValue">
<input type="<?= $Page->GRNTotalValue->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_GRNTotalValue" name="x_GRNTotalValue" id="x_GRNTotalValue" size="30" placeholder="<?= HtmlEncode($Page->GRNTotalValue->getPlaceHolder()) ?>" value="<?= $Page->GRNTotalValue->EditValue ?>"<?= $Page->GRNTotalValue->editAttributes() ?> aria-describedby="x_GRNTotalValue_help">
<?= $Page->GRNTotalValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GRNTotalValue->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
    <div id="r_BillDiscount" class="form-group row">
        <label id="elh_pharmacy_payment_BillDiscount" for="x_BillDiscount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_BillDiscount"><?= $Page->BillDiscount->caption() ?><?= $Page->BillDiscount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillDiscount->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_BillDiscount"><span id="el_pharmacy_payment_BillDiscount">
<input type="<?= $Page->BillDiscount->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_BillDiscount" name="x_BillDiscount" id="x_BillDiscount" size="30" placeholder="<?= HtmlEncode($Page->BillDiscount->getPlaceHolder()) ?>" value="<?= $Page->BillDiscount->EditValue ?>"<?= $Page->BillDiscount->editAttributes() ?> aria-describedby="x_BillDiscount_help">
<?= $Page->BillDiscount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillDiscount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillUpload->Visible) { // BillUpload ?>
    <div id="r_BillUpload" class="form-group row">
        <label id="elh_pharmacy_payment_BillUpload" for="x_BillUpload" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_BillUpload"><?= $Page->BillUpload->caption() ?><?= $Page->BillUpload->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillUpload->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_BillUpload"><span id="el_pharmacy_payment_BillUpload">
<textarea data-table="pharmacy_payment" data-field="x_BillUpload" name="x_BillUpload" id="x_BillUpload" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->BillUpload->getPlaceHolder()) ?>"<?= $Page->BillUpload->editAttributes() ?> aria-describedby="x_BillUpload_help"><?= $Page->BillUpload->EditValue ?></textarea>
<?= $Page->BillUpload->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillUpload->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TransPort->Visible) { // TransPort ?>
    <div id="r_TransPort" class="form-group row">
        <label id="elh_pharmacy_payment_TransPort" for="x_TransPort" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_TransPort"><?= $Page->TransPort->caption() ?><?= $Page->TransPort->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TransPort->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_TransPort"><span id="el_pharmacy_payment_TransPort">
<input type="<?= $Page->TransPort->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_TransPort" name="x_TransPort" id="x_TransPort" size="30" placeholder="<?= HtmlEncode($Page->TransPort->getPlaceHolder()) ?>" value="<?= $Page->TransPort->EditValue ?>"<?= $Page->TransPort->editAttributes() ?> aria-describedby="x_TransPort_help">
<?= $Page->TransPort->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TransPort->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnyOther->Visible) { // AnyOther ?>
    <div id="r_AnyOther" class="form-group row">
        <label id="elh_pharmacy_payment_AnyOther" for="x_AnyOther" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_AnyOther"><?= $Page->AnyOther->caption() ?><?= $Page->AnyOther->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnyOther->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_AnyOther"><span id="el_pharmacy_payment_AnyOther">
<input type="<?= $Page->AnyOther->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_AnyOther" name="x_AnyOther" id="x_AnyOther" size="30" placeholder="<?= HtmlEncode($Page->AnyOther->getPlaceHolder()) ?>" value="<?= $Page->AnyOther->EditValue ?>"<?= $Page->AnyOther->editAttributes() ?> aria-describedby="x_AnyOther_help">
<?= $Page->AnyOther->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnyOther->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <div id="r_voucher_type" class="form-group row">
        <label id="elh_pharmacy_payment_voucher_type" for="x_voucher_type" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_voucher_type"><?= $Page->voucher_type->caption() ?><?= $Page->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->voucher_type->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_voucher_type"><span id="el_pharmacy_payment_voucher_type">
<input type="<?= $Page->voucher_type->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->voucher_type->getPlaceHolder()) ?>" value="<?= $Page->voucher_type->EditValue ?>"<?= $Page->voucher_type->editAttributes() ?> aria-describedby="x_voucher_type_help">
<?= $Page->voucher_type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->voucher_type->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <div id="r_Details" class="form-group row">
        <label id="elh_pharmacy_payment_Details" for="x_Details" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_Details"><?= $Page->Details->caption() ?><?= $Page->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Details->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_Details"><span id="el_pharmacy_payment_Details">
<input type="<?= $Page->Details->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Details->getPlaceHolder()) ?>" value="<?= $Page->Details->EditValue ?>"<?= $Page->Details->editAttributes() ?> aria-describedby="x_Details_help">
<?= $Page->Details->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Details->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <div id="r_ModeofPayment" class="form-group row">
        <label id="elh_pharmacy_payment_ModeofPayment" for="x_ModeofPayment" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_ModeofPayment"><?= $Page->ModeofPayment->caption() ?><?= $Page->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModeofPayment->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_ModeofPayment"><span id="el_pharmacy_payment_ModeofPayment">
    <select
        id="x_ModeofPayment"
        name="x_ModeofPayment"
        class="form-control ew-select<?= $Page->ModeofPayment->isInvalidClass() ?>"
        data-select2-id="pharmacy_payment_x_ModeofPayment"
        data-table="pharmacy_payment"
        data-field="x_ModeofPayment"
        data-value-separator="<?= $Page->ModeofPayment->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ModeofPayment->getPlaceHolder()) ?>"
        <?= $Page->ModeofPayment->editAttributes() ?>>
        <?= $Page->ModeofPayment->selectOptionListHtml("x_ModeofPayment") ?>
    </select>
    <?= $Page->ModeofPayment->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ModeofPayment->getErrorMessage() ?></div>
<?= $Page->ModeofPayment->Lookup->getParamTag($Page, "p_x_ModeofPayment") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_payment_x_ModeofPayment']"),
        options = { name: "x_ModeofPayment", selectId: "pharmacy_payment_x_ModeofPayment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_payment.fields.ModeofPayment.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label id="elh_pharmacy_payment_Amount" for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_Amount"><?= $Page->Amount->caption() ?><?= $Page->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_Amount"><span id="el_pharmacy_payment_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?> aria-describedby="x_Amount_help">
<?= $Page->Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <div id="r_BankName" class="form-group row">
        <label id="elh_pharmacy_payment_BankName" for="x_BankName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_BankName"><?= $Page->BankName->caption() ?><?= $Page->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BankName->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_BankName"><span id="el_pharmacy_payment_BankName">
<input type="<?= $Page->BankName->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BankName->getPlaceHolder()) ?>" value="<?= $Page->BankName->EditValue ?>"<?= $Page->BankName->editAttributes() ?> aria-describedby="x_BankName_help">
<?= $Page->BankName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BankName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AccountNumber->Visible) { // AccountNumber ?>
    <div id="r_AccountNumber" class="form-group row">
        <label id="elh_pharmacy_payment_AccountNumber" for="x_AccountNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_AccountNumber"><?= $Page->AccountNumber->caption() ?><?= $Page->AccountNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AccountNumber->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_AccountNumber"><span id="el_pharmacy_payment_AccountNumber">
<input type="<?= $Page->AccountNumber->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_AccountNumber" name="x_AccountNumber" id="x_AccountNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AccountNumber->getPlaceHolder()) ?>" value="<?= $Page->AccountNumber->EditValue ?>"<?= $Page->AccountNumber->editAttributes() ?> aria-describedby="x_AccountNumber_help">
<?= $Page->AccountNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AccountNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->chequeNumber->Visible) { // chequeNumber ?>
    <div id="r_chequeNumber" class="form-group row">
        <label id="elh_pharmacy_payment_chequeNumber" for="x_chequeNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_chequeNumber"><?= $Page->chequeNumber->caption() ?><?= $Page->chequeNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->chequeNumber->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_chequeNumber"><span id="el_pharmacy_payment_chequeNumber">
<input type="<?= $Page->chequeNumber->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_chequeNumber" name="x_chequeNumber" id="x_chequeNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->chequeNumber->getPlaceHolder()) ?>" value="<?= $Page->chequeNumber->EditValue ?>"<?= $Page->chequeNumber->editAttributes() ?> aria-describedby="x_chequeNumber_help">
<?= $Page->chequeNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->chequeNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label id="elh_pharmacy_payment_Remarks" for="x_Remarks" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_Remarks"><?= $Page->Remarks->caption() ?><?= $Page->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Remarks->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_Remarks"><span id="el_pharmacy_payment_Remarks">
<textarea data-table="pharmacy_payment" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>"<?= $Page->Remarks->editAttributes() ?> aria-describedby="x_Remarks_help"><?= $Page->Remarks->EditValue ?></textarea>
<?= $Page->Remarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
    <div id="r_SeectPaymentMode" class="form-group row">
        <label id="elh_pharmacy_payment_SeectPaymentMode" for="x_SeectPaymentMode" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_SeectPaymentMode"><?= $Page->SeectPaymentMode->caption() ?><?= $Page->SeectPaymentMode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SeectPaymentMode->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_SeectPaymentMode"><span id="el_pharmacy_payment_SeectPaymentMode">
<input type="<?= $Page->SeectPaymentMode->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_SeectPaymentMode" name="x_SeectPaymentMode" id="x_SeectPaymentMode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SeectPaymentMode->getPlaceHolder()) ?>" value="<?= $Page->SeectPaymentMode->EditValue ?>"<?= $Page->SeectPaymentMode->editAttributes() ?> aria-describedby="x_SeectPaymentMode_help">
<?= $Page->SeectPaymentMode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SeectPaymentMode->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
    <div id="r_PaidAmount" class="form-group row">
        <label id="elh_pharmacy_payment_PaidAmount" for="x_PaidAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_PaidAmount"><?= $Page->PaidAmount->caption() ?><?= $Page->PaidAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaidAmount->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_PaidAmount"><span id="el_pharmacy_payment_PaidAmount">
<input type="<?= $Page->PaidAmount->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_PaidAmount" name="x_PaidAmount" id="x_PaidAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaidAmount->getPlaceHolder()) ?>" value="<?= $Page->PaidAmount->EditValue ?>"<?= $Page->PaidAmount->editAttributes() ?> aria-describedby="x_PaidAmount_help">
<?= $Page->PaidAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PaidAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <div id="r_Currency" class="form-group row">
        <label id="elh_pharmacy_payment_Currency" for="x_Currency" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_Currency"><?= $Page->Currency->caption() ?><?= $Page->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Currency->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_Currency"><span id="el_pharmacy_payment_Currency">
<input type="<?= $Page->Currency->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Currency->getPlaceHolder()) ?>" value="<?= $Page->Currency->EditValue ?>"<?= $Page->Currency->editAttributes() ?> aria-describedby="x_Currency_help">
<?= $Page->Currency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Currency->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <div id="r_CardNumber" class="form-group row">
        <label id="elh_pharmacy_payment_CardNumber" for="x_CardNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_payment_CardNumber"><?= $Page->CardNumber->caption() ?><?= $Page->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CardNumber->cellAttributes() ?>>
<template id="tpx_pharmacy_payment_CardNumber"><span id="el_pharmacy_payment_CardNumber">
<input type="<?= $Page->CardNumber->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CardNumber->getPlaceHolder()) ?>" value="<?= $Page->CardNumber->EditValue ?>"<?= $Page->CardNumber->editAttributes() ?> aria-describedby="x_CardNumber_help">
<?= $Page->CardNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CardNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_pharmacy_paymentadd" class="ew-custom-template"></div>
<template id="tpm_pharmacy_paymentadd">
<div id="ct_PharmacyPaymentAdd"><style>
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
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<input type="hidden" id="HospitalIDDD" name="HospitalIDDD" value="<?php echo HospitalID(); ?>">
<div class="row">
	<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_pharmacy_payment_PAYNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_PAYNO"></slot></h3>
	</div>
</div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Supplier</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_payment_pharmacy_pocol"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_pharmacy_pocol"></slot></span>
				  </div>
				 <div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_payment_PC"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_PC"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_payment_DT"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_DT"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_payment_YM"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_YM"></slot></span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_payment_Customercode"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_Customercode"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_payment_Customername"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_Customername"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_payment_Remarks"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_Remarks"></slot></span>
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
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_payment_Address1"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_Address1"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_payment_Address2"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_Address2"></slot></span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_payment_Address3"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_Address3"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_payment_State"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_State"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_payment_Pincode"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_Pincode"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_payment_Fax"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_Fax"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_payment_Phone"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_Phone"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Payment</h3>
			</div>
			<div class="card-body">
<table class="table table-striped ew-table ew-export-table" align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style="width:40%"><slot class="ew-slot" name="tpc_pharmacy_payment_ModeofPayment"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_ModeofPayment"></slot></td>
			<td><slot class="ew-slot" name="tpc_pharmacy_payment_Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_Amount"></slot></td>
			<td></td>
		</tr>
		<tr>
			<td style="width:40%"><slot class="ew-slot" name="tpc_pharmacy_payment_BankName"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_BankName"></slot></td>
			<td><slot class="ew-slot" name="tpc_pharmacy_payment_AccountNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_AccountNumber"></slot></td>
			<td><slot class="ew-slot" name="tpc_pharmacy_payment_chequeNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_chequeNumber"></slot></td>
		</tr>
		<tr>
			<td style="width:40%"><slot class="ew-slot" name="tpc_pharmacy_payment_Remarks"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_payment_Remarks"></slot></td>
			<td></td>
				<td></td>
		</tr>
	</tbody>
</table>
			</div>
		</div>				
	</div>
</div>
<div id="loadGrnItems"> </div>
</div>
</template>
<?php
    if (in_array("pharmacy_grn", explode(",", $Page->getCurrentDetailTable())) && $pharmacy_grn->DetailAdd) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("pharmacy_grn", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PharmacyGrnGrid.php" ?>
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
    ew.applyTemplate("tpd_pharmacy_paymentadd", "tpm_pharmacy_paymentadd", "pharmacy_paymentadd", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("pharmacy_payment");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    function calulateselectedAmount(){for(var e=document.getElementById("Totttlcnt").value,t=0,n=0;n<e;n++){if(1==document.getElementById("select"+n).checked){var d=document.getElementById("PaidAmount"+n).value;t=parseInt(t)+parseInt(d)}document.getElementById("totalAMTtoPay").innerText=t.toFixed(2),document.getElementById("x_Amount").value=t.toFixed(2)}}
});
</script>

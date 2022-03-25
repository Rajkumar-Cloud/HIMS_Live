<?php

namespace PHPMaker2021\project3;

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
    var fields = ew.vars.tables.pharmacy_payment.fields;
    fpharmacy_paymentadd.addFields([
        ["PAYNO", [fields.PAYNO.required ? ew.Validators.required(fields.PAYNO.caption) : null], fields.PAYNO.isInvalid],
        ["DT", [fields.DT.required ? ew.Validators.required(fields.DT.caption) : null, ew.Validators.datetime(0)], fields.DT.isInvalid],
        ["YM", [fields.YM.required ? ew.Validators.required(fields.YM.caption) : null], fields.YM.isInvalid],
        ["PC", [fields.PC.required ? ew.Validators.required(fields.PC.caption) : null], fields.PC.isInvalid],
        ["Customercode", [fields.Customercode.required ? ew.Validators.required(fields.Customercode.caption) : null], fields.Customercode.isInvalid],
        ["Customername", [fields.Customername.required ? ew.Validators.required(fields.Customername.caption) : null], fields.Customername.isInvalid],
        ["pharmacy_pocol", [fields.pharmacy_pocol.required ? ew.Validators.required(fields.pharmacy_pocol.caption) : null], fields.pharmacy_pocol.isInvalid],
        ["Address1", [fields.Address1.required ? ew.Validators.required(fields.Address1.caption) : null], fields.Address1.isInvalid],
        ["Address2", [fields.Address2.required ? ew.Validators.required(fields.Address2.caption) : null], fields.Address2.isInvalid],
        ["Address3", [fields.Address3.required ? ew.Validators.required(fields.Address3.caption) : null], fields.Address3.isInvalid],
        ["State", [fields.State.required ? ew.Validators.required(fields.State.caption) : null], fields.State.isInvalid],
        ["Pincode", [fields.Pincode.required ? ew.Validators.required(fields.Pincode.caption) : null], fields.Pincode.isInvalid],
        ["Phone", [fields.Phone.required ? ew.Validators.required(fields.Phone.caption) : null], fields.Phone.isInvalid],
        ["Fax", [fields.Fax.required ? ew.Validators.required(fields.Fax.caption) : null], fields.Fax.isInvalid],
        ["EEmail", [fields.EEmail.required ? ew.Validators.required(fields.EEmail.caption) : null], fields.EEmail.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["PharmacyID", [fields.PharmacyID.required ? ew.Validators.required(fields.PharmacyID.caption) : null, ew.Validators.integer], fields.PharmacyID.isInvalid],
        ["BillTotalValue", [fields.BillTotalValue.required ? ew.Validators.required(fields.BillTotalValue.caption) : null, ew.Validators.float], fields.BillTotalValue.isInvalid],
        ["GRNTotalValue", [fields.GRNTotalValue.required ? ew.Validators.required(fields.GRNTotalValue.caption) : null, ew.Validators.float], fields.GRNTotalValue.isInvalid],
        ["BillDiscount", [fields.BillDiscount.required ? ew.Validators.required(fields.BillDiscount.caption) : null, ew.Validators.float], fields.BillDiscount.isInvalid],
        ["BillUpload", [fields.BillUpload.required ? ew.Validators.required(fields.BillUpload.caption) : null], fields.BillUpload.isInvalid],
        ["TransPort", [fields.TransPort.required ? ew.Validators.required(fields.TransPort.caption) : null, ew.Validators.float], fields.TransPort.isInvalid],
        ["AnyOther", [fields.AnyOther.required ? ew.Validators.required(fields.AnyOther.caption) : null, ew.Validators.float], fields.AnyOther.isInvalid],
        ["voucher_type", [fields.voucher_type.required ? ew.Validators.required(fields.voucher_type.caption) : null], fields.voucher_type.isInvalid],
        ["Details", [fields.Details.required ? ew.Validators.required(fields.Details.caption) : null], fields.Details.isInvalid],
        ["ModeofPayment", [fields.ModeofPayment.required ? ew.Validators.required(fields.ModeofPayment.caption) : null], fields.ModeofPayment.isInvalid],
        ["Amount", [fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid],
        ["BankName", [fields.BankName.required ? ew.Validators.required(fields.BankName.caption) : null], fields.BankName.isInvalid],
        ["AccountNumber", [fields.AccountNumber.required ? ew.Validators.required(fields.AccountNumber.caption) : null], fields.AccountNumber.isInvalid],
        ["chequeNumber", [fields.chequeNumber.required ? ew.Validators.required(fields.chequeNumber.caption) : null], fields.chequeNumber.isInvalid],
        ["Remarks", [fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid],
        ["SeectPaymentMode", [fields.SeectPaymentMode.required ? ew.Validators.required(fields.SeectPaymentMode.caption) : null], fields.SeectPaymentMode.isInvalid],
        ["PaidAmount", [fields.PaidAmount.required ? ew.Validators.required(fields.PaidAmount.caption) : null], fields.PaidAmount.isInvalid],
        ["Currency", [fields.Currency.required ? ew.Validators.required(fields.Currency.caption) : null], fields.Currency.isInvalid],
        ["CardNumber", [fields.CardNumber.required ? ew.Validators.required(fields.CardNumber.caption) : null], fields.CardNumber.isInvalid]
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
<form name="fpharmacy_paymentadd" id="fpharmacy_paymentadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_payment">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->PAYNO->Visible) { // PAYNO ?>
    <div id="r_PAYNO" class="form-group row">
        <label id="elh_pharmacy_payment_PAYNO" for="x_PAYNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PAYNO->caption() ?><?= $Page->PAYNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PAYNO->cellAttributes() ?>>
<span id="el_pharmacy_payment_PAYNO">
<input type="<?= $Page->PAYNO->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_PAYNO" name="x_PAYNO" id="x_PAYNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PAYNO->getPlaceHolder()) ?>" value="<?= $Page->PAYNO->EditValue ?>"<?= $Page->PAYNO->editAttributes() ?> aria-describedby="x_PAYNO_help">
<?= $Page->PAYNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PAYNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <div id="r_DT" class="form-group row">
        <label id="elh_pharmacy_payment_DT" for="x_DT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DT->caption() ?><?= $Page->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DT->cellAttributes() ?>>
<span id="el_pharmacy_payment_DT">
<input type="<?= $Page->DT->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?= HtmlEncode($Page->DT->getPlaceHolder()) ?>" value="<?= $Page->DT->EditValue ?>"<?= $Page->DT->editAttributes() ?> aria-describedby="x_DT_help">
<?= $Page->DT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DT->getErrorMessage() ?></div>
<?php if (!$Page->DT->ReadOnly && !$Page->DT->Disabled && !isset($Page->DT->EditAttrs["readonly"]) && !isset($Page->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_paymentadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_paymentadd", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
    <div id="r_YM" class="form-group row">
        <label id="elh_pharmacy_payment_YM" for="x_YM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->YM->caption() ?><?= $Page->YM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->YM->cellAttributes() ?>>
<span id="el_pharmacy_payment_YM">
<input type="<?= $Page->YM->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->YM->getPlaceHolder()) ?>" value="<?= $Page->YM->EditValue ?>"<?= $Page->YM->editAttributes() ?> aria-describedby="x_YM_help">
<?= $Page->YM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->YM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
    <div id="r_PC" class="form-group row">
        <label id="elh_pharmacy_payment_PC" for="x_PC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PC->caption() ?><?= $Page->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PC->cellAttributes() ?>>
<span id="el_pharmacy_payment_PC">
<input type="<?= $Page->PC->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PC->getPlaceHolder()) ?>" value="<?= $Page->PC->EditValue ?>"<?= $Page->PC->editAttributes() ?> aria-describedby="x_PC_help">
<?= $Page->PC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Customercode->Visible) { // Customercode ?>
    <div id="r_Customercode" class="form-group row">
        <label id="elh_pharmacy_payment_Customercode" for="x_Customercode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Customercode->caption() ?><?= $Page->Customercode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Customercode->cellAttributes() ?>>
<span id="el_pharmacy_payment_Customercode">
<input type="<?= $Page->Customercode->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_Customercode" name="x_Customercode" id="x_Customercode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Customercode->getPlaceHolder()) ?>" value="<?= $Page->Customercode->EditValue ?>"<?= $Page->Customercode->editAttributes() ?> aria-describedby="x_Customercode_help">
<?= $Page->Customercode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Customercode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
    <div id="r_Customername" class="form-group row">
        <label id="elh_pharmacy_payment_Customername" for="x_Customername" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Customername->caption() ?><?= $Page->Customername->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Customername->cellAttributes() ?>>
<span id="el_pharmacy_payment_Customername">
<input type="<?= $Page->Customername->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_Customername" name="x_Customername" id="x_Customername" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Customername->getPlaceHolder()) ?>" value="<?= $Page->Customername->EditValue ?>"<?= $Page->Customername->editAttributes() ?> aria-describedby="x_Customername_help">
<?= $Page->Customername->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Customername->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
    <div id="r_pharmacy_pocol" class="form-group row">
        <label id="elh_pharmacy_payment_pharmacy_pocol" for="x_pharmacy_pocol" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pharmacy_pocol->caption() ?><?= $Page->pharmacy_pocol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pharmacy_pocol->cellAttributes() ?>>
<span id="el_pharmacy_payment_pharmacy_pocol">
<input type="<?= $Page->pharmacy_pocol->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_pharmacy_pocol" name="x_pharmacy_pocol" id="x_pharmacy_pocol" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pharmacy_pocol->getPlaceHolder()) ?>" value="<?= $Page->pharmacy_pocol->EditValue ?>"<?= $Page->pharmacy_pocol->editAttributes() ?> aria-describedby="x_pharmacy_pocol_help">
<?= $Page->pharmacy_pocol->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pharmacy_pocol->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
    <div id="r_Address1" class="form-group row">
        <label id="elh_pharmacy_payment_Address1" for="x_Address1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Address1->caption() ?><?= $Page->Address1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Address1->cellAttributes() ?>>
<span id="el_pharmacy_payment_Address1">
<textarea data-table="pharmacy_payment" data-field="x_Address1" name="x_Address1" id="x_Address1" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Address1->getPlaceHolder()) ?>"<?= $Page->Address1->editAttributes() ?> aria-describedby="x_Address1_help"><?= $Page->Address1->EditValue ?></textarea>
<?= $Page->Address1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Address1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
    <div id="r_Address2" class="form-group row">
        <label id="elh_pharmacy_payment_Address2" for="x_Address2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Address2->caption() ?><?= $Page->Address2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Address2->cellAttributes() ?>>
<span id="el_pharmacy_payment_Address2">
<textarea data-table="pharmacy_payment" data-field="x_Address2" name="x_Address2" id="x_Address2" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Address2->getPlaceHolder()) ?>"<?= $Page->Address2->editAttributes() ?> aria-describedby="x_Address2_help"><?= $Page->Address2->EditValue ?></textarea>
<?= $Page->Address2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Address2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
    <div id="r_Address3" class="form-group row">
        <label id="elh_pharmacy_payment_Address3" for="x_Address3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Address3->caption() ?><?= $Page->Address3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Address3->cellAttributes() ?>>
<span id="el_pharmacy_payment_Address3">
<textarea data-table="pharmacy_payment" data-field="x_Address3" name="x_Address3" id="x_Address3" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Address3->getPlaceHolder()) ?>"<?= $Page->Address3->editAttributes() ?> aria-describedby="x_Address3_help"><?= $Page->Address3->EditValue ?></textarea>
<?= $Page->Address3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Address3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <div id="r_State" class="form-group row">
        <label id="elh_pharmacy_payment_State" for="x_State" class="<?= $Page->LeftColumnClass ?>"><?= $Page->State->caption() ?><?= $Page->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->State->cellAttributes() ?>>
<span id="el_pharmacy_payment_State">
<input type="<?= $Page->State->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->State->getPlaceHolder()) ?>" value="<?= $Page->State->EditValue ?>"<?= $Page->State->editAttributes() ?> aria-describedby="x_State_help">
<?= $Page->State->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->State->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
    <div id="r_Pincode" class="form-group row">
        <label id="elh_pharmacy_payment_Pincode" for="x_Pincode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Pincode->caption() ?><?= $Page->Pincode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pincode->cellAttributes() ?>>
<span id="el_pharmacy_payment_Pincode">
<input type="<?= $Page->Pincode->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pincode->getPlaceHolder()) ?>" value="<?= $Page->Pincode->EditValue ?>"<?= $Page->Pincode->editAttributes() ?> aria-describedby="x_Pincode_help">
<?= $Page->Pincode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pincode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
    <div id="r_Phone" class="form-group row">
        <label id="elh_pharmacy_payment_Phone" for="x_Phone" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Phone->caption() ?><?= $Page->Phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Phone->cellAttributes() ?>>
<span id="el_pharmacy_payment_Phone">
<input type="<?= $Page->Phone->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Phone->getPlaceHolder()) ?>" value="<?= $Page->Phone->EditValue ?>"<?= $Page->Phone->editAttributes() ?> aria-describedby="x_Phone_help">
<?= $Page->Phone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Phone->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
    <div id="r_Fax" class="form-group row">
        <label id="elh_pharmacy_payment_Fax" for="x_Fax" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Fax->caption() ?><?= $Page->Fax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Fax->cellAttributes() ?>>
<span id="el_pharmacy_payment_Fax">
<input type="<?= $Page->Fax->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Fax->getPlaceHolder()) ?>" value="<?= $Page->Fax->EditValue ?>"<?= $Page->Fax->editAttributes() ?> aria-describedby="x_Fax_help">
<?= $Page->Fax->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Fax->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EEmail->Visible) { // EEmail ?>
    <div id="r_EEmail" class="form-group row">
        <label id="elh_pharmacy_payment_EEmail" for="x_EEmail" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EEmail->caption() ?><?= $Page->EEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EEmail->cellAttributes() ?>>
<span id="el_pharmacy_payment_EEmail">
<input type="<?= $Page->EEmail->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_EEmail" name="x_EEmail" id="x_EEmail" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EEmail->getPlaceHolder()) ?>" value="<?= $Page->EEmail->EditValue ?>"<?= $Page->EEmail->editAttributes() ?> aria-describedby="x_EEmail_help">
<?= $Page->EEmail->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EEmail->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_pharmacy_payment_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_pharmacy_payment_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_pharmacy_payment_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_pharmacy_payment_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_pharmacy_payment_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_pharmacy_payment_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_paymentadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_paymentadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_pharmacy_payment_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_pharmacy_payment_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_pharmacy_payment_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_pharmacy_payment_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_paymentadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_paymentadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PharmacyID->Visible) { // PharmacyID ?>
    <div id="r_PharmacyID" class="form-group row">
        <label id="elh_pharmacy_payment_PharmacyID" for="x_PharmacyID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PharmacyID->caption() ?><?= $Page->PharmacyID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PharmacyID->cellAttributes() ?>>
<span id="el_pharmacy_payment_PharmacyID">
<input type="<?= $Page->PharmacyID->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_PharmacyID" name="x_PharmacyID" id="x_PharmacyID" size="30" placeholder="<?= HtmlEncode($Page->PharmacyID->getPlaceHolder()) ?>" value="<?= $Page->PharmacyID->EditValue ?>"<?= $Page->PharmacyID->editAttributes() ?> aria-describedby="x_PharmacyID_help">
<?= $Page->PharmacyID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PharmacyID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillTotalValue->Visible) { // BillTotalValue ?>
    <div id="r_BillTotalValue" class="form-group row">
        <label id="elh_pharmacy_payment_BillTotalValue" for="x_BillTotalValue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BillTotalValue->caption() ?><?= $Page->BillTotalValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillTotalValue->cellAttributes() ?>>
<span id="el_pharmacy_payment_BillTotalValue">
<input type="<?= $Page->BillTotalValue->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_BillTotalValue" name="x_BillTotalValue" id="x_BillTotalValue" size="30" placeholder="<?= HtmlEncode($Page->BillTotalValue->getPlaceHolder()) ?>" value="<?= $Page->BillTotalValue->EditValue ?>"<?= $Page->BillTotalValue->editAttributes() ?> aria-describedby="x_BillTotalValue_help">
<?= $Page->BillTotalValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillTotalValue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GRNTotalValue->Visible) { // GRNTotalValue ?>
    <div id="r_GRNTotalValue" class="form-group row">
        <label id="elh_pharmacy_payment_GRNTotalValue" for="x_GRNTotalValue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GRNTotalValue->caption() ?><?= $Page->GRNTotalValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GRNTotalValue->cellAttributes() ?>>
<span id="el_pharmacy_payment_GRNTotalValue">
<input type="<?= $Page->GRNTotalValue->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_GRNTotalValue" name="x_GRNTotalValue" id="x_GRNTotalValue" size="30" placeholder="<?= HtmlEncode($Page->GRNTotalValue->getPlaceHolder()) ?>" value="<?= $Page->GRNTotalValue->EditValue ?>"<?= $Page->GRNTotalValue->editAttributes() ?> aria-describedby="x_GRNTotalValue_help">
<?= $Page->GRNTotalValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GRNTotalValue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillDiscount->Visible) { // BillDiscount ?>
    <div id="r_BillDiscount" class="form-group row">
        <label id="elh_pharmacy_payment_BillDiscount" for="x_BillDiscount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BillDiscount->caption() ?><?= $Page->BillDiscount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillDiscount->cellAttributes() ?>>
<span id="el_pharmacy_payment_BillDiscount">
<input type="<?= $Page->BillDiscount->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_BillDiscount" name="x_BillDiscount" id="x_BillDiscount" size="30" placeholder="<?= HtmlEncode($Page->BillDiscount->getPlaceHolder()) ?>" value="<?= $Page->BillDiscount->EditValue ?>"<?= $Page->BillDiscount->editAttributes() ?> aria-describedby="x_BillDiscount_help">
<?= $Page->BillDiscount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillDiscount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillUpload->Visible) { // BillUpload ?>
    <div id="r_BillUpload" class="form-group row">
        <label id="elh_pharmacy_payment_BillUpload" for="x_BillUpload" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BillUpload->caption() ?><?= $Page->BillUpload->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillUpload->cellAttributes() ?>>
<span id="el_pharmacy_payment_BillUpload">
<textarea data-table="pharmacy_payment" data-field="x_BillUpload" name="x_BillUpload" id="x_BillUpload" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->BillUpload->getPlaceHolder()) ?>"<?= $Page->BillUpload->editAttributes() ?> aria-describedby="x_BillUpload_help"><?= $Page->BillUpload->EditValue ?></textarea>
<?= $Page->BillUpload->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillUpload->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TransPort->Visible) { // TransPort ?>
    <div id="r_TransPort" class="form-group row">
        <label id="elh_pharmacy_payment_TransPort" for="x_TransPort" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TransPort->caption() ?><?= $Page->TransPort->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TransPort->cellAttributes() ?>>
<span id="el_pharmacy_payment_TransPort">
<input type="<?= $Page->TransPort->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_TransPort" name="x_TransPort" id="x_TransPort" size="30" placeholder="<?= HtmlEncode($Page->TransPort->getPlaceHolder()) ?>" value="<?= $Page->TransPort->EditValue ?>"<?= $Page->TransPort->editAttributes() ?> aria-describedby="x_TransPort_help">
<?= $Page->TransPort->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TransPort->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnyOther->Visible) { // AnyOther ?>
    <div id="r_AnyOther" class="form-group row">
        <label id="elh_pharmacy_payment_AnyOther" for="x_AnyOther" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AnyOther->caption() ?><?= $Page->AnyOther->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnyOther->cellAttributes() ?>>
<span id="el_pharmacy_payment_AnyOther">
<input type="<?= $Page->AnyOther->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_AnyOther" name="x_AnyOther" id="x_AnyOther" size="30" placeholder="<?= HtmlEncode($Page->AnyOther->getPlaceHolder()) ?>" value="<?= $Page->AnyOther->EditValue ?>"<?= $Page->AnyOther->editAttributes() ?> aria-describedby="x_AnyOther_help">
<?= $Page->AnyOther->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnyOther->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <div id="r_voucher_type" class="form-group row">
        <label id="elh_pharmacy_payment_voucher_type" for="x_voucher_type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->voucher_type->caption() ?><?= $Page->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->voucher_type->cellAttributes() ?>>
<span id="el_pharmacy_payment_voucher_type">
<input type="<?= $Page->voucher_type->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->voucher_type->getPlaceHolder()) ?>" value="<?= $Page->voucher_type->EditValue ?>"<?= $Page->voucher_type->editAttributes() ?> aria-describedby="x_voucher_type_help">
<?= $Page->voucher_type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->voucher_type->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <div id="r_Details" class="form-group row">
        <label id="elh_pharmacy_payment_Details" for="x_Details" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Details->caption() ?><?= $Page->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Details->cellAttributes() ?>>
<span id="el_pharmacy_payment_Details">
<input type="<?= $Page->Details->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Details->getPlaceHolder()) ?>" value="<?= $Page->Details->EditValue ?>"<?= $Page->Details->editAttributes() ?> aria-describedby="x_Details_help">
<?= $Page->Details->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Details->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <div id="r_ModeofPayment" class="form-group row">
        <label id="elh_pharmacy_payment_ModeofPayment" for="x_ModeofPayment" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModeofPayment->caption() ?><?= $Page->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el_pharmacy_payment_ModeofPayment">
<input type="<?= $Page->ModeofPayment->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModeofPayment->getPlaceHolder()) ?>" value="<?= $Page->ModeofPayment->EditValue ?>"<?= $Page->ModeofPayment->editAttributes() ?> aria-describedby="x_ModeofPayment_help">
<?= $Page->ModeofPayment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModeofPayment->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label id="elh_pharmacy_payment_Amount" for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Amount->caption() ?><?= $Page->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
<span id="el_pharmacy_payment_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?> aria-describedby="x_Amount_help">
<?= $Page->Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <div id="r_BankName" class="form-group row">
        <label id="elh_pharmacy_payment_BankName" for="x_BankName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BankName->caption() ?><?= $Page->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BankName->cellAttributes() ?>>
<span id="el_pharmacy_payment_BankName">
<input type="<?= $Page->BankName->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BankName->getPlaceHolder()) ?>" value="<?= $Page->BankName->EditValue ?>"<?= $Page->BankName->editAttributes() ?> aria-describedby="x_BankName_help">
<?= $Page->BankName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BankName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AccountNumber->Visible) { // AccountNumber ?>
    <div id="r_AccountNumber" class="form-group row">
        <label id="elh_pharmacy_payment_AccountNumber" for="x_AccountNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AccountNumber->caption() ?><?= $Page->AccountNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AccountNumber->cellAttributes() ?>>
<span id="el_pharmacy_payment_AccountNumber">
<input type="<?= $Page->AccountNumber->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_AccountNumber" name="x_AccountNumber" id="x_AccountNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AccountNumber->getPlaceHolder()) ?>" value="<?= $Page->AccountNumber->EditValue ?>"<?= $Page->AccountNumber->editAttributes() ?> aria-describedby="x_AccountNumber_help">
<?= $Page->AccountNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AccountNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->chequeNumber->Visible) { // chequeNumber ?>
    <div id="r_chequeNumber" class="form-group row">
        <label id="elh_pharmacy_payment_chequeNumber" for="x_chequeNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->chequeNumber->caption() ?><?= $Page->chequeNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->chequeNumber->cellAttributes() ?>>
<span id="el_pharmacy_payment_chequeNumber">
<input type="<?= $Page->chequeNumber->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_chequeNumber" name="x_chequeNumber" id="x_chequeNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->chequeNumber->getPlaceHolder()) ?>" value="<?= $Page->chequeNumber->EditValue ?>"<?= $Page->chequeNumber->editAttributes() ?> aria-describedby="x_chequeNumber_help">
<?= $Page->chequeNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->chequeNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label id="elh_pharmacy_payment_Remarks" for="x_Remarks" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Remarks->caption() ?><?= $Page->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_pharmacy_payment_Remarks">
<textarea data-table="pharmacy_payment" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>"<?= $Page->Remarks->editAttributes() ?> aria-describedby="x_Remarks_help"><?= $Page->Remarks->EditValue ?></textarea>
<?= $Page->Remarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
    <div id="r_SeectPaymentMode" class="form-group row">
        <label id="elh_pharmacy_payment_SeectPaymentMode" for="x_SeectPaymentMode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SeectPaymentMode->caption() ?><?= $Page->SeectPaymentMode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SeectPaymentMode->cellAttributes() ?>>
<span id="el_pharmacy_payment_SeectPaymentMode">
<input type="<?= $Page->SeectPaymentMode->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_SeectPaymentMode" name="x_SeectPaymentMode" id="x_SeectPaymentMode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SeectPaymentMode->getPlaceHolder()) ?>" value="<?= $Page->SeectPaymentMode->EditValue ?>"<?= $Page->SeectPaymentMode->editAttributes() ?> aria-describedby="x_SeectPaymentMode_help">
<?= $Page->SeectPaymentMode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SeectPaymentMode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
    <div id="r_PaidAmount" class="form-group row">
        <label id="elh_pharmacy_payment_PaidAmount" for="x_PaidAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PaidAmount->caption() ?><?= $Page->PaidAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaidAmount->cellAttributes() ?>>
<span id="el_pharmacy_payment_PaidAmount">
<input type="<?= $Page->PaidAmount->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_PaidAmount" name="x_PaidAmount" id="x_PaidAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaidAmount->getPlaceHolder()) ?>" value="<?= $Page->PaidAmount->EditValue ?>"<?= $Page->PaidAmount->editAttributes() ?> aria-describedby="x_PaidAmount_help">
<?= $Page->PaidAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PaidAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <div id="r_Currency" class="form-group row">
        <label id="elh_pharmacy_payment_Currency" for="x_Currency" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Currency->caption() ?><?= $Page->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Currency->cellAttributes() ?>>
<span id="el_pharmacy_payment_Currency">
<input type="<?= $Page->Currency->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Currency->getPlaceHolder()) ?>" value="<?= $Page->Currency->EditValue ?>"<?= $Page->Currency->editAttributes() ?> aria-describedby="x_Currency_help">
<?= $Page->Currency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Currency->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <div id="r_CardNumber" class="form-group row">
        <label id="elh_pharmacy_payment_CardNumber" for="x_CardNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CardNumber->caption() ?><?= $Page->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CardNumber->cellAttributes() ?>>
<span id="el_pharmacy_payment_CardNumber">
<input type="<?= $Page->CardNumber->getInputTextType() ?>" data-table="pharmacy_payment" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CardNumber->getPlaceHolder()) ?>" value="<?= $Page->CardNumber->EditValue ?>"<?= $Page->CardNumber->editAttributes() ?> aria-describedby="x_CardNumber_help">
<?= $Page->CardNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CardNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("pharmacy_payment");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$ReceiptsAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var freceiptsadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    freceiptsadd = currentForm = new ew.Form("freceiptsadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "receipts")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.receipts)
        ew.vars.tables.receipts = currentTable;
    freceiptsadd.addFields([
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null, ew.Validators.integer], fields.Reception.isInvalid],
        ["Aid", [fields.Aid.visible && fields.Aid.required ? ew.Validators.required(fields.Aid.caption) : null, ew.Validators.integer], fields.Aid.isInvalid],
        ["Vid", [fields.Vid.visible && fields.Vid.required ? ew.Validators.required(fields.Vid.caption) : null, ew.Validators.integer], fields.Vid.isInvalid],
        ["patient_id", [fields.patient_id.visible && fields.patient_id.required ? ew.Validators.required(fields.patient_id.caption) : null, ew.Validators.integer], fields.patient_id.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["amount", [fields.amount.visible && fields.amount.required ? ew.Validators.required(fields.amount.caption) : null, ew.Validators.float], fields.amount.isInvalid],
        ["Discount", [fields.Discount.visible && fields.Discount.required ? ew.Validators.required(fields.Discount.caption) : null, ew.Validators.float], fields.Discount.isInvalid],
        ["SubTotal", [fields.SubTotal.visible && fields.SubTotal.required ? ew.Validators.required(fields.SubTotal.caption) : null, ew.Validators.float], fields.SubTotal.isInvalid],
        ["patient_type", [fields.patient_type.visible && fields.patient_type.required ? ew.Validators.required(fields.patient_type.caption) : null, ew.Validators.integer], fields.patient_type.isInvalid],
        ["invoiceId", [fields.invoiceId.visible && fields.invoiceId.required ? ew.Validators.required(fields.invoiceId.caption) : null, ew.Validators.integer], fields.invoiceId.isInvalid],
        ["invoiceAmount", [fields.invoiceAmount.visible && fields.invoiceAmount.required ? ew.Validators.required(fields.invoiceAmount.caption) : null, ew.Validators.float], fields.invoiceAmount.isInvalid],
        ["invoiceStatus", [fields.invoiceStatus.visible && fields.invoiceStatus.required ? ew.Validators.required(fields.invoiceStatus.caption) : null], fields.invoiceStatus.isInvalid],
        ["modeOfPayment", [fields.modeOfPayment.visible && fields.modeOfPayment.required ? ew.Validators.required(fields.modeOfPayment.caption) : null], fields.modeOfPayment.isInvalid],
        ["charged_date", [fields.charged_date.visible && fields.charged_date.required ? ew.Validators.required(fields.charged_date.caption) : null, ew.Validators.datetime(0)], fields.charged_date.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["ChequeCardNo", [fields.ChequeCardNo.visible && fields.ChequeCardNo.required ? ew.Validators.required(fields.ChequeCardNo.caption) : null], fields.ChequeCardNo.isInvalid],
        ["CreditBankName", [fields.CreditBankName.visible && fields.CreditBankName.required ? ew.Validators.required(fields.CreditBankName.caption) : null], fields.CreditBankName.isInvalid],
        ["CreditCardHolder", [fields.CreditCardHolder.visible && fields.CreditCardHolder.required ? ew.Validators.required(fields.CreditCardHolder.caption) : null], fields.CreditCardHolder.isInvalid],
        ["CreditCardType", [fields.CreditCardType.visible && fields.CreditCardType.required ? ew.Validators.required(fields.CreditCardType.caption) : null], fields.CreditCardType.isInvalid],
        ["CreditCardMachine", [fields.CreditCardMachine.visible && fields.CreditCardMachine.required ? ew.Validators.required(fields.CreditCardMachine.caption) : null], fields.CreditCardMachine.isInvalid],
        ["CreditCardBatchNo", [fields.CreditCardBatchNo.visible && fields.CreditCardBatchNo.required ? ew.Validators.required(fields.CreditCardBatchNo.caption) : null], fields.CreditCardBatchNo.isInvalid],
        ["CreditCardTax", [fields.CreditCardTax.visible && fields.CreditCardTax.required ? ew.Validators.required(fields.CreditCardTax.caption) : null], fields.CreditCardTax.isInvalid],
        ["CreditDeductionAmount", [fields.CreditDeductionAmount.visible && fields.CreditDeductionAmount.required ? ew.Validators.required(fields.CreditDeductionAmount.caption) : null], fields.CreditDeductionAmount.isInvalid],
        ["RealizationAmount", [fields.RealizationAmount.visible && fields.RealizationAmount.required ? ew.Validators.required(fields.RealizationAmount.caption) : null], fields.RealizationAmount.isInvalid],
        ["RealizationStatus", [fields.RealizationStatus.visible && fields.RealizationStatus.required ? ew.Validators.required(fields.RealizationStatus.caption) : null], fields.RealizationStatus.isInvalid],
        ["RealizationRemarks", [fields.RealizationRemarks.visible && fields.RealizationRemarks.required ? ew.Validators.required(fields.RealizationRemarks.caption) : null], fields.RealizationRemarks.isInvalid],
        ["RealizationBatchNo", [fields.RealizationBatchNo.visible && fields.RealizationBatchNo.required ? ew.Validators.required(fields.RealizationBatchNo.caption) : null], fields.RealizationBatchNo.isInvalid],
        ["RealizationDate", [fields.RealizationDate.visible && fields.RealizationDate.required ? ew.Validators.required(fields.RealizationDate.caption) : null], fields.RealizationDate.isInvalid],
        ["BankAccHolderMobileNumber", [fields.BankAccHolderMobileNumber.visible && fields.BankAccHolderMobileNumber.required ? ew.Validators.required(fields.BankAccHolderMobileNumber.caption) : null], fields.BankAccHolderMobileNumber.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = freceiptsadd,
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
    freceiptsadd.validate = function () {
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
    freceiptsadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    freceiptsadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("freceiptsadd");
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
<form name="freceiptsadd" id="freceiptsadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="receipts">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_receipts_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<span id="el_receipts_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="receipts" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Aid->Visible) { // Aid ?>
    <div id="r_Aid" class="form-group row">
        <label id="elh_receipts_Aid" for="x_Aid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Aid->caption() ?><?= $Page->Aid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Aid->cellAttributes() ?>>
<span id="el_receipts_Aid">
<input type="<?= $Page->Aid->getInputTextType() ?>" data-table="receipts" data-field="x_Aid" name="x_Aid" id="x_Aid" size="30" placeholder="<?= HtmlEncode($Page->Aid->getPlaceHolder()) ?>" value="<?= $Page->Aid->EditValue ?>"<?= $Page->Aid->editAttributes() ?> aria-describedby="x_Aid_help">
<?= $Page->Aid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Aid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Vid->Visible) { // Vid ?>
    <div id="r_Vid" class="form-group row">
        <label id="elh_receipts_Vid" for="x_Vid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Vid->caption() ?><?= $Page->Vid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Vid->cellAttributes() ?>>
<span id="el_receipts_Vid">
<input type="<?= $Page->Vid->getInputTextType() ?>" data-table="receipts" data-field="x_Vid" name="x_Vid" id="x_Vid" size="30" placeholder="<?= HtmlEncode($Page->Vid->getPlaceHolder()) ?>" value="<?= $Page->Vid->EditValue ?>"<?= $Page->Vid->editAttributes() ?> aria-describedby="x_Vid_help">
<?= $Page->Vid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Vid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <div id="r_patient_id" class="form-group row">
        <label id="elh_receipts_patient_id" for="x_patient_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->patient_id->caption() ?><?= $Page->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_id->cellAttributes() ?>>
<span id="el_receipts_patient_id">
<input type="<?= $Page->patient_id->getInputTextType() ?>" data-table="receipts" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?= HtmlEncode($Page->patient_id->getPlaceHolder()) ?>" value="<?= $Page->patient_id->EditValue ?>"<?= $Page->patient_id->editAttributes() ?> aria-describedby="x_patient_id_help">
<?= $Page->patient_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->patient_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_receipts_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_receipts_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="receipts" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_receipts_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_receipts_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="receipts" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
    <div id="r_amount" class="form-group row">
        <label id="elh_receipts_amount" for="x_amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->amount->caption() ?><?= $Page->amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->amount->cellAttributes() ?>>
<span id="el_receipts_amount">
<input type="<?= $Page->amount->getInputTextType() ?>" data-table="receipts" data-field="x_amount" name="x_amount" id="x_amount" size="30" placeholder="<?= HtmlEncode($Page->amount->getPlaceHolder()) ?>" value="<?= $Page->amount->EditValue ?>"<?= $Page->amount->editAttributes() ?> aria-describedby="x_amount_help">
<?= $Page->amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
    <div id="r_Discount" class="form-group row">
        <label id="elh_receipts_Discount" for="x_Discount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Discount->caption() ?><?= $Page->Discount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Discount->cellAttributes() ?>>
<span id="el_receipts_Discount">
<input type="<?= $Page->Discount->getInputTextType() ?>" data-table="receipts" data-field="x_Discount" name="x_Discount" id="x_Discount" size="30" placeholder="<?= HtmlEncode($Page->Discount->getPlaceHolder()) ?>" value="<?= $Page->Discount->EditValue ?>"<?= $Page->Discount->editAttributes() ?> aria-describedby="x_Discount_help">
<?= $Page->Discount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Discount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
    <div id="r_SubTotal" class="form-group row">
        <label id="elh_receipts_SubTotal" for="x_SubTotal" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SubTotal->caption() ?><?= $Page->SubTotal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SubTotal->cellAttributes() ?>>
<span id="el_receipts_SubTotal">
<input type="<?= $Page->SubTotal->getInputTextType() ?>" data-table="receipts" data-field="x_SubTotal" name="x_SubTotal" id="x_SubTotal" size="30" placeholder="<?= HtmlEncode($Page->SubTotal->getPlaceHolder()) ?>" value="<?= $Page->SubTotal->EditValue ?>"<?= $Page->SubTotal->editAttributes() ?> aria-describedby="x_SubTotal_help">
<?= $Page->SubTotal->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SubTotal->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_type->Visible) { // patient_type ?>
    <div id="r_patient_type" class="form-group row">
        <label id="elh_receipts_patient_type" for="x_patient_type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->patient_type->caption() ?><?= $Page->patient_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_type->cellAttributes() ?>>
<span id="el_receipts_patient_type">
<input type="<?= $Page->patient_type->getInputTextType() ?>" data-table="receipts" data-field="x_patient_type" name="x_patient_type" id="x_patient_type" size="30" placeholder="<?= HtmlEncode($Page->patient_type->getPlaceHolder()) ?>" value="<?= $Page->patient_type->EditValue ?>"<?= $Page->patient_type->editAttributes() ?> aria-describedby="x_patient_type_help">
<?= $Page->patient_type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->patient_type->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->invoiceId->Visible) { // invoiceId ?>
    <div id="r_invoiceId" class="form-group row">
        <label id="elh_receipts_invoiceId" for="x_invoiceId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->invoiceId->caption() ?><?= $Page->invoiceId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->invoiceId->cellAttributes() ?>>
<span id="el_receipts_invoiceId">
<input type="<?= $Page->invoiceId->getInputTextType() ?>" data-table="receipts" data-field="x_invoiceId" name="x_invoiceId" id="x_invoiceId" size="30" placeholder="<?= HtmlEncode($Page->invoiceId->getPlaceHolder()) ?>" value="<?= $Page->invoiceId->EditValue ?>"<?= $Page->invoiceId->editAttributes() ?> aria-describedby="x_invoiceId_help">
<?= $Page->invoiceId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->invoiceId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->invoiceAmount->Visible) { // invoiceAmount ?>
    <div id="r_invoiceAmount" class="form-group row">
        <label id="elh_receipts_invoiceAmount" for="x_invoiceAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->invoiceAmount->caption() ?><?= $Page->invoiceAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->invoiceAmount->cellAttributes() ?>>
<span id="el_receipts_invoiceAmount">
<input type="<?= $Page->invoiceAmount->getInputTextType() ?>" data-table="receipts" data-field="x_invoiceAmount" name="x_invoiceAmount" id="x_invoiceAmount" size="30" placeholder="<?= HtmlEncode($Page->invoiceAmount->getPlaceHolder()) ?>" value="<?= $Page->invoiceAmount->EditValue ?>"<?= $Page->invoiceAmount->editAttributes() ?> aria-describedby="x_invoiceAmount_help">
<?= $Page->invoiceAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->invoiceAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->invoiceStatus->Visible) { // invoiceStatus ?>
    <div id="r_invoiceStatus" class="form-group row">
        <label id="elh_receipts_invoiceStatus" for="x_invoiceStatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->invoiceStatus->caption() ?><?= $Page->invoiceStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->invoiceStatus->cellAttributes() ?>>
<span id="el_receipts_invoiceStatus">
<input type="<?= $Page->invoiceStatus->getInputTextType() ?>" data-table="receipts" data-field="x_invoiceStatus" name="x_invoiceStatus" id="x_invoiceStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->invoiceStatus->getPlaceHolder()) ?>" value="<?= $Page->invoiceStatus->EditValue ?>"<?= $Page->invoiceStatus->editAttributes() ?> aria-describedby="x_invoiceStatus_help">
<?= $Page->invoiceStatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->invoiceStatus->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modeOfPayment->Visible) { // modeOfPayment ?>
    <div id="r_modeOfPayment" class="form-group row">
        <label id="elh_receipts_modeOfPayment" for="x_modeOfPayment" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modeOfPayment->caption() ?><?= $Page->modeOfPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modeOfPayment->cellAttributes() ?>>
<span id="el_receipts_modeOfPayment">
<input type="<?= $Page->modeOfPayment->getInputTextType() ?>" data-table="receipts" data-field="x_modeOfPayment" name="x_modeOfPayment" id="x_modeOfPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modeOfPayment->getPlaceHolder()) ?>" value="<?= $Page->modeOfPayment->EditValue ?>"<?= $Page->modeOfPayment->editAttributes() ?> aria-describedby="x_modeOfPayment_help">
<?= $Page->modeOfPayment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modeOfPayment->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
    <div id="r_charged_date" class="form-group row">
        <label id="elh_receipts_charged_date" for="x_charged_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->charged_date->caption() ?><?= $Page->charged_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->charged_date->cellAttributes() ?>>
<span id="el_receipts_charged_date">
<input type="<?= $Page->charged_date->getInputTextType() ?>" data-table="receipts" data-field="x_charged_date" name="x_charged_date" id="x_charged_date" placeholder="<?= HtmlEncode($Page->charged_date->getPlaceHolder()) ?>" value="<?= $Page->charged_date->EditValue ?>"<?= $Page->charged_date->editAttributes() ?> aria-describedby="x_charged_date_help">
<?= $Page->charged_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->charged_date->getErrorMessage() ?></div>
<?php if (!$Page->charged_date->ReadOnly && !$Page->charged_date->Disabled && !isset($Page->charged_date->EditAttrs["readonly"]) && !isset($Page->charged_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["freceiptsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("freceiptsadd", "x_charged_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_receipts_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_receipts_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="receipts" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_receipts_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_receipts_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="receipts" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_receipts_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_receipts_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="receipts" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["freceiptsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("freceiptsadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_receipts_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_receipts_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="receipts" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_receipts_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_receipts_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="receipts" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["freceiptsadd", "datetimepicker"], function() {
    ew.createDateTimePicker("freceiptsadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChequeCardNo->Visible) { // ChequeCardNo ?>
    <div id="r_ChequeCardNo" class="form-group row">
        <label id="elh_receipts_ChequeCardNo" for="x_ChequeCardNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ChequeCardNo->caption() ?><?= $Page->ChequeCardNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChequeCardNo->cellAttributes() ?>>
<span id="el_receipts_ChequeCardNo">
<input type="<?= $Page->ChequeCardNo->getInputTextType() ?>" data-table="receipts" data-field="x_ChequeCardNo" name="x_ChequeCardNo" id="x_ChequeCardNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ChequeCardNo->getPlaceHolder()) ?>" value="<?= $Page->ChequeCardNo->EditValue ?>"<?= $Page->ChequeCardNo->editAttributes() ?> aria-describedby="x_ChequeCardNo_help">
<?= $Page->ChequeCardNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChequeCardNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreditBankName->Visible) { // CreditBankName ?>
    <div id="r_CreditBankName" class="form-group row">
        <label id="elh_receipts_CreditBankName" for="x_CreditBankName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreditBankName->caption() ?><?= $Page->CreditBankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreditBankName->cellAttributes() ?>>
<span id="el_receipts_CreditBankName">
<input type="<?= $Page->CreditBankName->getInputTextType() ?>" data-table="receipts" data-field="x_CreditBankName" name="x_CreditBankName" id="x_CreditBankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreditBankName->getPlaceHolder()) ?>" value="<?= $Page->CreditBankName->EditValue ?>"<?= $Page->CreditBankName->editAttributes() ?> aria-describedby="x_CreditBankName_help">
<?= $Page->CreditBankName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreditBankName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreditCardHolder->Visible) { // CreditCardHolder ?>
    <div id="r_CreditCardHolder" class="form-group row">
        <label id="elh_receipts_CreditCardHolder" for="x_CreditCardHolder" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreditCardHolder->caption() ?><?= $Page->CreditCardHolder->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreditCardHolder->cellAttributes() ?>>
<span id="el_receipts_CreditCardHolder">
<input type="<?= $Page->CreditCardHolder->getInputTextType() ?>" data-table="receipts" data-field="x_CreditCardHolder" name="x_CreditCardHolder" id="x_CreditCardHolder" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreditCardHolder->getPlaceHolder()) ?>" value="<?= $Page->CreditCardHolder->EditValue ?>"<?= $Page->CreditCardHolder->editAttributes() ?> aria-describedby="x_CreditCardHolder_help">
<?= $Page->CreditCardHolder->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreditCardHolder->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreditCardType->Visible) { // CreditCardType ?>
    <div id="r_CreditCardType" class="form-group row">
        <label id="elh_receipts_CreditCardType" for="x_CreditCardType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreditCardType->caption() ?><?= $Page->CreditCardType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreditCardType->cellAttributes() ?>>
<span id="el_receipts_CreditCardType">
<input type="<?= $Page->CreditCardType->getInputTextType() ?>" data-table="receipts" data-field="x_CreditCardType" name="x_CreditCardType" id="x_CreditCardType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreditCardType->getPlaceHolder()) ?>" value="<?= $Page->CreditCardType->EditValue ?>"<?= $Page->CreditCardType->editAttributes() ?> aria-describedby="x_CreditCardType_help">
<?= $Page->CreditCardType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreditCardType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreditCardMachine->Visible) { // CreditCardMachine ?>
    <div id="r_CreditCardMachine" class="form-group row">
        <label id="elh_receipts_CreditCardMachine" for="x_CreditCardMachine" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreditCardMachine->caption() ?><?= $Page->CreditCardMachine->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreditCardMachine->cellAttributes() ?>>
<span id="el_receipts_CreditCardMachine">
<input type="<?= $Page->CreditCardMachine->getInputTextType() ?>" data-table="receipts" data-field="x_CreditCardMachine" name="x_CreditCardMachine" id="x_CreditCardMachine" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreditCardMachine->getPlaceHolder()) ?>" value="<?= $Page->CreditCardMachine->EditValue ?>"<?= $Page->CreditCardMachine->editAttributes() ?> aria-describedby="x_CreditCardMachine_help">
<?= $Page->CreditCardMachine->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreditCardMachine->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreditCardBatchNo->Visible) { // CreditCardBatchNo ?>
    <div id="r_CreditCardBatchNo" class="form-group row">
        <label id="elh_receipts_CreditCardBatchNo" for="x_CreditCardBatchNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreditCardBatchNo->caption() ?><?= $Page->CreditCardBatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreditCardBatchNo->cellAttributes() ?>>
<span id="el_receipts_CreditCardBatchNo">
<input type="<?= $Page->CreditCardBatchNo->getInputTextType() ?>" data-table="receipts" data-field="x_CreditCardBatchNo" name="x_CreditCardBatchNo" id="x_CreditCardBatchNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreditCardBatchNo->getPlaceHolder()) ?>" value="<?= $Page->CreditCardBatchNo->EditValue ?>"<?= $Page->CreditCardBatchNo->editAttributes() ?> aria-describedby="x_CreditCardBatchNo_help">
<?= $Page->CreditCardBatchNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreditCardBatchNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreditCardTax->Visible) { // CreditCardTax ?>
    <div id="r_CreditCardTax" class="form-group row">
        <label id="elh_receipts_CreditCardTax" for="x_CreditCardTax" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreditCardTax->caption() ?><?= $Page->CreditCardTax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreditCardTax->cellAttributes() ?>>
<span id="el_receipts_CreditCardTax">
<input type="<?= $Page->CreditCardTax->getInputTextType() ?>" data-table="receipts" data-field="x_CreditCardTax" name="x_CreditCardTax" id="x_CreditCardTax" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreditCardTax->getPlaceHolder()) ?>" value="<?= $Page->CreditCardTax->EditValue ?>"<?= $Page->CreditCardTax->editAttributes() ?> aria-describedby="x_CreditCardTax_help">
<?= $Page->CreditCardTax->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreditCardTax->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreditDeductionAmount->Visible) { // CreditDeductionAmount ?>
    <div id="r_CreditDeductionAmount" class="form-group row">
        <label id="elh_receipts_CreditDeductionAmount" for="x_CreditDeductionAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreditDeductionAmount->caption() ?><?= $Page->CreditDeductionAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreditDeductionAmount->cellAttributes() ?>>
<span id="el_receipts_CreditDeductionAmount">
<input type="<?= $Page->CreditDeductionAmount->getInputTextType() ?>" data-table="receipts" data-field="x_CreditDeductionAmount" name="x_CreditDeductionAmount" id="x_CreditDeductionAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreditDeductionAmount->getPlaceHolder()) ?>" value="<?= $Page->CreditDeductionAmount->EditValue ?>"<?= $Page->CreditDeductionAmount->editAttributes() ?> aria-describedby="x_CreditDeductionAmount_help">
<?= $Page->CreditDeductionAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreditDeductionAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
    <div id="r_RealizationAmount" class="form-group row">
        <label id="elh_receipts_RealizationAmount" for="x_RealizationAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RealizationAmount->caption() ?><?= $Page->RealizationAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationAmount->cellAttributes() ?>>
<span id="el_receipts_RealizationAmount">
<input type="<?= $Page->RealizationAmount->getInputTextType() ?>" data-table="receipts" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationAmount->getPlaceHolder()) ?>" value="<?= $Page->RealizationAmount->EditValue ?>"<?= $Page->RealizationAmount->editAttributes() ?> aria-describedby="x_RealizationAmount_help">
<?= $Page->RealizationAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationStatus->Visible) { // RealizationStatus ?>
    <div id="r_RealizationStatus" class="form-group row">
        <label id="elh_receipts_RealizationStatus" for="x_RealizationStatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RealizationStatus->caption() ?><?= $Page->RealizationStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationStatus->cellAttributes() ?>>
<span id="el_receipts_RealizationStatus">
<input type="<?= $Page->RealizationStatus->getInputTextType() ?>" data-table="receipts" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationStatus->getPlaceHolder()) ?>" value="<?= $Page->RealizationStatus->EditValue ?>"<?= $Page->RealizationStatus->editAttributes() ?> aria-describedby="x_RealizationStatus_help">
<?= $Page->RealizationStatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationStatus->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationRemarks->Visible) { // RealizationRemarks ?>
    <div id="r_RealizationRemarks" class="form-group row">
        <label id="elh_receipts_RealizationRemarks" for="x_RealizationRemarks" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RealizationRemarks->caption() ?><?= $Page->RealizationRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationRemarks->cellAttributes() ?>>
<span id="el_receipts_RealizationRemarks">
<input type="<?= $Page->RealizationRemarks->getInputTextType() ?>" data-table="receipts" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationRemarks->getPlaceHolder()) ?>" value="<?= $Page->RealizationRemarks->EditValue ?>"<?= $Page->RealizationRemarks->editAttributes() ?> aria-describedby="x_RealizationRemarks_help">
<?= $Page->RealizationRemarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationRemarks->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
    <div id="r_RealizationBatchNo" class="form-group row">
        <label id="elh_receipts_RealizationBatchNo" for="x_RealizationBatchNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RealizationBatchNo->caption() ?><?= $Page->RealizationBatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationBatchNo->cellAttributes() ?>>
<span id="el_receipts_RealizationBatchNo">
<input type="<?= $Page->RealizationBatchNo->getInputTextType() ?>" data-table="receipts" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationBatchNo->getPlaceHolder()) ?>" value="<?= $Page->RealizationBatchNo->EditValue ?>"<?= $Page->RealizationBatchNo->editAttributes() ?> aria-describedby="x_RealizationBatchNo_help">
<?= $Page->RealizationBatchNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationBatchNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationDate->Visible) { // RealizationDate ?>
    <div id="r_RealizationDate" class="form-group row">
        <label id="elh_receipts_RealizationDate" for="x_RealizationDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RealizationDate->caption() ?><?= $Page->RealizationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationDate->cellAttributes() ?>>
<span id="el_receipts_RealizationDate">
<input type="<?= $Page->RealizationDate->getInputTextType() ?>" data-table="receipts" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationDate->getPlaceHolder()) ?>" value="<?= $Page->RealizationDate->EditValue ?>"<?= $Page->RealizationDate->editAttributes() ?> aria-describedby="x_RealizationDate_help">
<?= $Page->RealizationDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationDate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BankAccHolderMobileNumber->Visible) { // BankAccHolderMobileNumber ?>
    <div id="r_BankAccHolderMobileNumber" class="form-group row">
        <label id="elh_receipts_BankAccHolderMobileNumber" for="x_BankAccHolderMobileNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BankAccHolderMobileNumber->caption() ?><?= $Page->BankAccHolderMobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BankAccHolderMobileNumber->cellAttributes() ?>>
<span id="el_receipts_BankAccHolderMobileNumber">
<input type="<?= $Page->BankAccHolderMobileNumber->getInputTextType() ?>" data-table="receipts" data-field="x_BankAccHolderMobileNumber" name="x_BankAccHolderMobileNumber" id="x_BankAccHolderMobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BankAccHolderMobileNumber->getPlaceHolder()) ?>" value="<?= $Page->BankAccHolderMobileNumber->EditValue ?>"<?= $Page->BankAccHolderMobileNumber->editAttributes() ?> aria-describedby="x_BankAccHolderMobileNumber_help">
<?= $Page->BankAccHolderMobileNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BankAccHolderMobileNumber->getErrorMessage() ?></div>
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
    ew.addEventHandlers("receipts");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

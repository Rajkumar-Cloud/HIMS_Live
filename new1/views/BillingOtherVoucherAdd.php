<?php

namespace PHPMaker2021\project3;

// Page object
$BillingOtherVoucherAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fbilling_other_voucheradd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fbilling_other_voucheradd = currentForm = new ew.Form("fbilling_other_voucheradd", "add");

    // Add fields
    var fields = ew.vars.tables.billing_other_voucher.fields;
    fbilling_other_voucheradd.addFields([
        ["Name", [fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["Mobile", [fields.Mobile.required ? ew.Validators.required(fields.Mobile.caption) : null], fields.Mobile.isInvalid],
        ["voucher_type", [fields.voucher_type.required ? ew.Validators.required(fields.voucher_type.caption) : null], fields.voucher_type.isInvalid],
        ["Details", [fields.Details.required ? ew.Validators.required(fields.Details.caption) : null], fields.Details.isInvalid],
        ["ModeofPayment", [fields.ModeofPayment.required ? ew.Validators.required(fields.ModeofPayment.caption) : null], fields.ModeofPayment.isInvalid],
        ["Amount", [fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid],
        ["AnyDues", [fields.AnyDues.required ? ew.Validators.required(fields.AnyDues.caption) : null], fields.AnyDues.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["PatID", [fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null, ew.Validators.integer], fields.PatID.isInvalid],
        ["PatientID", [fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["PatientName", [fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["VisiteType", [fields.VisiteType.required ? ew.Validators.required(fields.VisiteType.caption) : null], fields.VisiteType.isInvalid],
        ["VisitDate", [fields.VisitDate.required ? ew.Validators.required(fields.VisitDate.caption) : null, ew.Validators.datetime(0)], fields.VisitDate.isInvalid],
        ["AdvanceNo", [fields.AdvanceNo.required ? ew.Validators.required(fields.AdvanceNo.caption) : null], fields.AdvanceNo.isInvalid],
        ["Status", [fields.Status.required ? ew.Validators.required(fields.Status.caption) : null], fields.Status.isInvalid],
        ["Date", [fields.Date.required ? ew.Validators.required(fields.Date.caption) : null, ew.Validators.datetime(0)], fields.Date.isInvalid],
        ["AdvanceValidityDate", [fields.AdvanceValidityDate.required ? ew.Validators.required(fields.AdvanceValidityDate.caption) : null, ew.Validators.datetime(0)], fields.AdvanceValidityDate.isInvalid],
        ["TotalRemainingAdvance", [fields.TotalRemainingAdvance.required ? ew.Validators.required(fields.TotalRemainingAdvance.caption) : null], fields.TotalRemainingAdvance.isInvalid],
        ["Remarks", [fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid],
        ["SeectPaymentMode", [fields.SeectPaymentMode.required ? ew.Validators.required(fields.SeectPaymentMode.caption) : null], fields.SeectPaymentMode.isInvalid],
        ["PaidAmount", [fields.PaidAmount.required ? ew.Validators.required(fields.PaidAmount.caption) : null], fields.PaidAmount.isInvalid],
        ["Currency", [fields.Currency.required ? ew.Validators.required(fields.Currency.caption) : null], fields.Currency.isInvalid],
        ["CardNumber", [fields.CardNumber.required ? ew.Validators.required(fields.CardNumber.caption) : null], fields.CardNumber.isInvalid],
        ["BankName", [fields.BankName.required ? ew.Validators.required(fields.BankName.caption) : null], fields.BankName.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid],
        ["Reception", [fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null, ew.Validators.integer], fields.Reception.isInvalid],
        ["mrnno", [fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["GetUserName", [fields.GetUserName.required ? ew.Validators.required(fields.GetUserName.caption) : null], fields.GetUserName.isInvalid],
        ["AdjustmentwithAdvance", [fields.AdjustmentwithAdvance.required ? ew.Validators.required(fields.AdjustmentwithAdvance.caption) : null], fields.AdjustmentwithAdvance.isInvalid],
        ["AdjustmentBillNumber", [fields.AdjustmentBillNumber.required ? ew.Validators.required(fields.AdjustmentBillNumber.caption) : null], fields.AdjustmentBillNumber.isInvalid],
        ["CancelAdvance", [fields.CancelAdvance.required ? ew.Validators.required(fields.CancelAdvance.caption) : null], fields.CancelAdvance.isInvalid],
        ["CancelReasan", [fields.CancelReasan.required ? ew.Validators.required(fields.CancelReasan.caption) : null], fields.CancelReasan.isInvalid],
        ["CancelBy", [fields.CancelBy.required ? ew.Validators.required(fields.CancelBy.caption) : null], fields.CancelBy.isInvalid],
        ["CancelDate", [fields.CancelDate.required ? ew.Validators.required(fields.CancelDate.caption) : null, ew.Validators.datetime(0)], fields.CancelDate.isInvalid],
        ["CancelDateTime", [fields.CancelDateTime.required ? ew.Validators.required(fields.CancelDateTime.caption) : null, ew.Validators.datetime(0)], fields.CancelDateTime.isInvalid],
        ["CanceledBy", [fields.CanceledBy.required ? ew.Validators.required(fields.CanceledBy.caption) : null], fields.CanceledBy.isInvalid],
        ["CancelStatus", [fields.CancelStatus.required ? ew.Validators.required(fields.CancelStatus.caption) : null], fields.CancelStatus.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fbilling_other_voucheradd,
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
    fbilling_other_voucheradd.validate = function () {
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
    fbilling_other_voucheradd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fbilling_other_voucheradd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fbilling_other_voucheradd");
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
<form name="fbilling_other_voucheradd" id="fbilling_other_voucheradd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="billing_other_voucher">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_billing_other_voucher_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<span id="el_billing_other_voucher_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <div id="r_Mobile" class="form-group row">
        <label id="elh_billing_other_voucher_Mobile" for="x_Mobile" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Mobile->caption() ?><?= $Page->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mobile->cellAttributes() ?>>
<span id="el_billing_other_voucher_Mobile">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?> aria-describedby="x_Mobile_help">
<?= $Page->Mobile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <div id="r_voucher_type" class="form-group row">
        <label id="elh_billing_other_voucher_voucher_type" for="x_voucher_type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->voucher_type->caption() ?><?= $Page->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->voucher_type->cellAttributes() ?>>
<span id="el_billing_other_voucher_voucher_type">
<input type="<?= $Page->voucher_type->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->voucher_type->getPlaceHolder()) ?>" value="<?= $Page->voucher_type->EditValue ?>"<?= $Page->voucher_type->editAttributes() ?> aria-describedby="x_voucher_type_help">
<?= $Page->voucher_type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->voucher_type->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <div id="r_Details" class="form-group row">
        <label id="elh_billing_other_voucher_Details" for="x_Details" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Details->caption() ?><?= $Page->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Details->cellAttributes() ?>>
<span id="el_billing_other_voucher_Details">
<input type="<?= $Page->Details->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Details->getPlaceHolder()) ?>" value="<?= $Page->Details->EditValue ?>"<?= $Page->Details->editAttributes() ?> aria-describedby="x_Details_help">
<?= $Page->Details->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Details->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <div id="r_ModeofPayment" class="form-group row">
        <label id="elh_billing_other_voucher_ModeofPayment" for="x_ModeofPayment" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModeofPayment->caption() ?><?= $Page->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el_billing_other_voucher_ModeofPayment">
<input type="<?= $Page->ModeofPayment->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_ModeofPayment" name="x_ModeofPayment" id="x_ModeofPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModeofPayment->getPlaceHolder()) ?>" value="<?= $Page->ModeofPayment->EditValue ?>"<?= $Page->ModeofPayment->editAttributes() ?> aria-describedby="x_ModeofPayment_help">
<?= $Page->ModeofPayment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModeofPayment->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label id="elh_billing_other_voucher_Amount" for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Amount->caption() ?><?= $Page->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
<span id="el_billing_other_voucher_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?> aria-describedby="x_Amount_help">
<?= $Page->Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
    <div id="r_AnyDues" class="form-group row">
        <label id="elh_billing_other_voucher_AnyDues" for="x_AnyDues" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AnyDues->caption() ?><?= $Page->AnyDues->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnyDues->cellAttributes() ?>>
<span id="el_billing_other_voucher_AnyDues">
<input type="<?= $Page->AnyDues->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AnyDues->getPlaceHolder()) ?>" value="<?= $Page->AnyDues->EditValue ?>"<?= $Page->AnyDues->editAttributes() ?> aria-describedby="x_AnyDues_help">
<?= $Page->AnyDues->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnyDues->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_billing_other_voucher_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_billing_other_voucher_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_billing_other_voucher_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_billing_other_voucher_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbilling_other_voucheradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fbilling_other_voucheradd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_billing_other_voucher_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_billing_other_voucher_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_billing_other_voucher_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_billing_other_voucher_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbilling_other_voucheradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fbilling_other_voucheradd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_billing_other_voucher_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<span id="el_billing_other_voucher_PatID">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?> aria-describedby="x_PatID_help">
<?= $Page->PatID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_billing_other_voucher_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<span id="el_billing_other_voucher_PatientID">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?> aria-describedby="x_PatientID_help">
<?= $Page->PatientID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_billing_other_voucher_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_billing_other_voucher_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VisiteType->Visible) { // VisiteType ?>
    <div id="r_VisiteType" class="form-group row">
        <label id="elh_billing_other_voucher_VisiteType" for="x_VisiteType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->VisiteType->caption() ?><?= $Page->VisiteType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VisiteType->cellAttributes() ?>>
<span id="el_billing_other_voucher_VisiteType">
<input type="<?= $Page->VisiteType->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_VisiteType" name="x_VisiteType" id="x_VisiteType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VisiteType->getPlaceHolder()) ?>" value="<?= $Page->VisiteType->EditValue ?>"<?= $Page->VisiteType->editAttributes() ?> aria-describedby="x_VisiteType_help">
<?= $Page->VisiteType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->VisiteType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VisitDate->Visible) { // VisitDate ?>
    <div id="r_VisitDate" class="form-group row">
        <label id="elh_billing_other_voucher_VisitDate" for="x_VisitDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->VisitDate->caption() ?><?= $Page->VisitDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VisitDate->cellAttributes() ?>>
<span id="el_billing_other_voucher_VisitDate">
<input type="<?= $Page->VisitDate->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_VisitDate" name="x_VisitDate" id="x_VisitDate" placeholder="<?= HtmlEncode($Page->VisitDate->getPlaceHolder()) ?>" value="<?= $Page->VisitDate->EditValue ?>"<?= $Page->VisitDate->editAttributes() ?> aria-describedby="x_VisitDate_help">
<?= $Page->VisitDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->VisitDate->getErrorMessage() ?></div>
<?php if (!$Page->VisitDate->ReadOnly && !$Page->VisitDate->Disabled && !isset($Page->VisitDate->EditAttrs["readonly"]) && !isset($Page->VisitDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbilling_other_voucheradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fbilling_other_voucheradd", "x_VisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdvanceNo->Visible) { // AdvanceNo ?>
    <div id="r_AdvanceNo" class="form-group row">
        <label id="elh_billing_other_voucher_AdvanceNo" for="x_AdvanceNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AdvanceNo->caption() ?><?= $Page->AdvanceNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdvanceNo->cellAttributes() ?>>
<span id="el_billing_other_voucher_AdvanceNo">
<input type="<?= $Page->AdvanceNo->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_AdvanceNo" name="x_AdvanceNo" id="x_AdvanceNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AdvanceNo->getPlaceHolder()) ?>" value="<?= $Page->AdvanceNo->EditValue ?>"<?= $Page->AdvanceNo->editAttributes() ?> aria-describedby="x_AdvanceNo_help">
<?= $Page->AdvanceNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AdvanceNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <div id="r_Status" class="form-group row">
        <label id="elh_billing_other_voucher_Status" for="x_Status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Status->caption() ?><?= $Page->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Status->cellAttributes() ?>>
<span id="el_billing_other_voucher_Status">
<input type="<?= $Page->Status->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Status" name="x_Status" id="x_Status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Status->getPlaceHolder()) ?>" value="<?= $Page->Status->EditValue ?>"<?= $Page->Status->editAttributes() ?> aria-describedby="x_Status_help">
<?= $Page->Status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
    <div id="r_Date" class="form-group row">
        <label id="elh_billing_other_voucher_Date" for="x_Date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Date->caption() ?><?= $Page->Date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Date->cellAttributes() ?>>
<span id="el_billing_other_voucher_Date">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Date" name="x_Date" id="x_Date" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue ?>"<?= $Page->Date->editAttributes() ?> aria-describedby="x_Date_help">
<?= $Page->Date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage() ?></div>
<?php if (!$Page->Date->ReadOnly && !$Page->Date->Disabled && !isset($Page->Date->EditAttrs["readonly"]) && !isset($Page->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbilling_other_voucheradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fbilling_other_voucheradd", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
    <div id="r_AdvanceValidityDate" class="form-group row">
        <label id="elh_billing_other_voucher_AdvanceValidityDate" for="x_AdvanceValidityDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AdvanceValidityDate->caption() ?><?= $Page->AdvanceValidityDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdvanceValidityDate->cellAttributes() ?>>
<span id="el_billing_other_voucher_AdvanceValidityDate">
<input type="<?= $Page->AdvanceValidityDate->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_AdvanceValidityDate" name="x_AdvanceValidityDate" id="x_AdvanceValidityDate" placeholder="<?= HtmlEncode($Page->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?= $Page->AdvanceValidityDate->EditValue ?>"<?= $Page->AdvanceValidityDate->editAttributes() ?> aria-describedby="x_AdvanceValidityDate_help">
<?= $Page->AdvanceValidityDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AdvanceValidityDate->getErrorMessage() ?></div>
<?php if (!$Page->AdvanceValidityDate->ReadOnly && !$Page->AdvanceValidityDate->Disabled && !isset($Page->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($Page->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbilling_other_voucheradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fbilling_other_voucheradd", "x_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
    <div id="r_TotalRemainingAdvance" class="form-group row">
        <label id="elh_billing_other_voucher_TotalRemainingAdvance" for="x_TotalRemainingAdvance" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TotalRemainingAdvance->caption() ?><?= $Page->TotalRemainingAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalRemainingAdvance->cellAttributes() ?>>
<span id="el_billing_other_voucher_TotalRemainingAdvance">
<input type="<?= $Page->TotalRemainingAdvance->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_TotalRemainingAdvance" name="x_TotalRemainingAdvance" id="x_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?= $Page->TotalRemainingAdvance->EditValue ?>"<?= $Page->TotalRemainingAdvance->editAttributes() ?> aria-describedby="x_TotalRemainingAdvance_help">
<?= $Page->TotalRemainingAdvance->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalRemainingAdvance->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label id="elh_billing_other_voucher_Remarks" for="x_Remarks" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Remarks->caption() ?><?= $Page->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_billing_other_voucher_Remarks">
<textarea data-table="billing_other_voucher" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>"<?= $Page->Remarks->editAttributes() ?> aria-describedby="x_Remarks_help"><?= $Page->Remarks->EditValue ?></textarea>
<?= $Page->Remarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
    <div id="r_SeectPaymentMode" class="form-group row">
        <label id="elh_billing_other_voucher_SeectPaymentMode" for="x_SeectPaymentMode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SeectPaymentMode->caption() ?><?= $Page->SeectPaymentMode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SeectPaymentMode->cellAttributes() ?>>
<span id="el_billing_other_voucher_SeectPaymentMode">
<input type="<?= $Page->SeectPaymentMode->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_SeectPaymentMode" name="x_SeectPaymentMode" id="x_SeectPaymentMode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SeectPaymentMode->getPlaceHolder()) ?>" value="<?= $Page->SeectPaymentMode->EditValue ?>"<?= $Page->SeectPaymentMode->editAttributes() ?> aria-describedby="x_SeectPaymentMode_help">
<?= $Page->SeectPaymentMode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SeectPaymentMode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
    <div id="r_PaidAmount" class="form-group row">
        <label id="elh_billing_other_voucher_PaidAmount" for="x_PaidAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PaidAmount->caption() ?><?= $Page->PaidAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaidAmount->cellAttributes() ?>>
<span id="el_billing_other_voucher_PaidAmount">
<input type="<?= $Page->PaidAmount->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_PaidAmount" name="x_PaidAmount" id="x_PaidAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaidAmount->getPlaceHolder()) ?>" value="<?= $Page->PaidAmount->EditValue ?>"<?= $Page->PaidAmount->editAttributes() ?> aria-describedby="x_PaidAmount_help">
<?= $Page->PaidAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PaidAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <div id="r_Currency" class="form-group row">
        <label id="elh_billing_other_voucher_Currency" for="x_Currency" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Currency->caption() ?><?= $Page->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Currency->cellAttributes() ?>>
<span id="el_billing_other_voucher_Currency">
<input type="<?= $Page->Currency->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Currency->getPlaceHolder()) ?>" value="<?= $Page->Currency->EditValue ?>"<?= $Page->Currency->editAttributes() ?> aria-describedby="x_Currency_help">
<?= $Page->Currency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Currency->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <div id="r_CardNumber" class="form-group row">
        <label id="elh_billing_other_voucher_CardNumber" for="x_CardNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CardNumber->caption() ?><?= $Page->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CardNumber->cellAttributes() ?>>
<span id="el_billing_other_voucher_CardNumber">
<input type="<?= $Page->CardNumber->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CardNumber->getPlaceHolder()) ?>" value="<?= $Page->CardNumber->EditValue ?>"<?= $Page->CardNumber->editAttributes() ?> aria-describedby="x_CardNumber_help">
<?= $Page->CardNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CardNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <div id="r_BankName" class="form-group row">
        <label id="elh_billing_other_voucher_BankName" for="x_BankName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BankName->caption() ?><?= $Page->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BankName->cellAttributes() ?>>
<span id="el_billing_other_voucher_BankName">
<input type="<?= $Page->BankName->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BankName->getPlaceHolder()) ?>" value="<?= $Page->BankName->EditValue ?>"<?= $Page->BankName->editAttributes() ?> aria-describedby="x_BankName_help">
<?= $Page->BankName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BankName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_billing_other_voucher_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_billing_other_voucher_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_billing_other_voucher_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<span id="el_billing_other_voucher_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_billing_other_voucher_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_billing_other_voucher_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GetUserName->Visible) { // GetUserName ?>
    <div id="r_GetUserName" class="form-group row">
        <label id="elh_billing_other_voucher_GetUserName" for="x_GetUserName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GetUserName->caption() ?><?= $Page->GetUserName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GetUserName->cellAttributes() ?>>
<span id="el_billing_other_voucher_GetUserName">
<input type="<?= $Page->GetUserName->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_GetUserName" name="x_GetUserName" id="x_GetUserName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GetUserName->getPlaceHolder()) ?>" value="<?= $Page->GetUserName->EditValue ?>"<?= $Page->GetUserName->editAttributes() ?> aria-describedby="x_GetUserName_help">
<?= $Page->GetUserName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GetUserName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdjustmentwithAdvance->Visible) { // AdjustmentwithAdvance ?>
    <div id="r_AdjustmentwithAdvance" class="form-group row">
        <label id="elh_billing_other_voucher_AdjustmentwithAdvance" for="x_AdjustmentwithAdvance" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AdjustmentwithAdvance->caption() ?><?= $Page->AdjustmentwithAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdjustmentwithAdvance->cellAttributes() ?>>
<span id="el_billing_other_voucher_AdjustmentwithAdvance">
<input type="<?= $Page->AdjustmentwithAdvance->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_AdjustmentwithAdvance" name="x_AdjustmentwithAdvance" id="x_AdjustmentwithAdvance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AdjustmentwithAdvance->getPlaceHolder()) ?>" value="<?= $Page->AdjustmentwithAdvance->EditValue ?>"<?= $Page->AdjustmentwithAdvance->editAttributes() ?> aria-describedby="x_AdjustmentwithAdvance_help">
<?= $Page->AdjustmentwithAdvance->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AdjustmentwithAdvance->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdjustmentBillNumber->Visible) { // AdjustmentBillNumber ?>
    <div id="r_AdjustmentBillNumber" class="form-group row">
        <label id="elh_billing_other_voucher_AdjustmentBillNumber" for="x_AdjustmentBillNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AdjustmentBillNumber->caption() ?><?= $Page->AdjustmentBillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdjustmentBillNumber->cellAttributes() ?>>
<span id="el_billing_other_voucher_AdjustmentBillNumber">
<input type="<?= $Page->AdjustmentBillNumber->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_AdjustmentBillNumber" name="x_AdjustmentBillNumber" id="x_AdjustmentBillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AdjustmentBillNumber->getPlaceHolder()) ?>" value="<?= $Page->AdjustmentBillNumber->EditValue ?>"<?= $Page->AdjustmentBillNumber->editAttributes() ?> aria-describedby="x_AdjustmentBillNumber_help">
<?= $Page->AdjustmentBillNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AdjustmentBillNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelAdvance->Visible) { // CancelAdvance ?>
    <div id="r_CancelAdvance" class="form-group row">
        <label id="elh_billing_other_voucher_CancelAdvance" for="x_CancelAdvance" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CancelAdvance->caption() ?><?= $Page->CancelAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelAdvance->cellAttributes() ?>>
<span id="el_billing_other_voucher_CancelAdvance">
<input type="<?= $Page->CancelAdvance->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_CancelAdvance" name="x_CancelAdvance" id="x_CancelAdvance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelAdvance->getPlaceHolder()) ?>" value="<?= $Page->CancelAdvance->EditValue ?>"<?= $Page->CancelAdvance->editAttributes() ?> aria-describedby="x_CancelAdvance_help">
<?= $Page->CancelAdvance->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelAdvance->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelReasan->Visible) { // CancelReasan ?>
    <div id="r_CancelReasan" class="form-group row">
        <label id="elh_billing_other_voucher_CancelReasan" for="x_CancelReasan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CancelReasan->caption() ?><?= $Page->CancelReasan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelReasan->cellAttributes() ?>>
<span id="el_billing_other_voucher_CancelReasan">
<textarea data-table="billing_other_voucher" data-field="x_CancelReasan" name="x_CancelReasan" id="x_CancelReasan" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->CancelReasan->getPlaceHolder()) ?>"<?= $Page->CancelReasan->editAttributes() ?> aria-describedby="x_CancelReasan_help"><?= $Page->CancelReasan->EditValue ?></textarea>
<?= $Page->CancelReasan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelReasan->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelBy->Visible) { // CancelBy ?>
    <div id="r_CancelBy" class="form-group row">
        <label id="elh_billing_other_voucher_CancelBy" for="x_CancelBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CancelBy->caption() ?><?= $Page->CancelBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelBy->cellAttributes() ?>>
<span id="el_billing_other_voucher_CancelBy">
<input type="<?= $Page->CancelBy->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_CancelBy" name="x_CancelBy" id="x_CancelBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelBy->getPlaceHolder()) ?>" value="<?= $Page->CancelBy->EditValue ?>"<?= $Page->CancelBy->editAttributes() ?> aria-describedby="x_CancelBy_help">
<?= $Page->CancelBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelDate->Visible) { // CancelDate ?>
    <div id="r_CancelDate" class="form-group row">
        <label id="elh_billing_other_voucher_CancelDate" for="x_CancelDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CancelDate->caption() ?><?= $Page->CancelDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelDate->cellAttributes() ?>>
<span id="el_billing_other_voucher_CancelDate">
<input type="<?= $Page->CancelDate->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_CancelDate" name="x_CancelDate" id="x_CancelDate" placeholder="<?= HtmlEncode($Page->CancelDate->getPlaceHolder()) ?>" value="<?= $Page->CancelDate->EditValue ?>"<?= $Page->CancelDate->editAttributes() ?> aria-describedby="x_CancelDate_help">
<?= $Page->CancelDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelDate->getErrorMessage() ?></div>
<?php if (!$Page->CancelDate->ReadOnly && !$Page->CancelDate->Disabled && !isset($Page->CancelDate->EditAttrs["readonly"]) && !isset($Page->CancelDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbilling_other_voucheradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fbilling_other_voucheradd", "x_CancelDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelDateTime->Visible) { // CancelDateTime ?>
    <div id="r_CancelDateTime" class="form-group row">
        <label id="elh_billing_other_voucher_CancelDateTime" for="x_CancelDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CancelDateTime->caption() ?><?= $Page->CancelDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelDateTime->cellAttributes() ?>>
<span id="el_billing_other_voucher_CancelDateTime">
<input type="<?= $Page->CancelDateTime->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_CancelDateTime" name="x_CancelDateTime" id="x_CancelDateTime" placeholder="<?= HtmlEncode($Page->CancelDateTime->getPlaceHolder()) ?>" value="<?= $Page->CancelDateTime->EditValue ?>"<?= $Page->CancelDateTime->editAttributes() ?> aria-describedby="x_CancelDateTime_help">
<?= $Page->CancelDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelDateTime->getErrorMessage() ?></div>
<?php if (!$Page->CancelDateTime->ReadOnly && !$Page->CancelDateTime->Disabled && !isset($Page->CancelDateTime->EditAttrs["readonly"]) && !isset($Page->CancelDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbilling_other_voucheradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fbilling_other_voucheradd", "x_CancelDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CanceledBy->Visible) { // CanceledBy ?>
    <div id="r_CanceledBy" class="form-group row">
        <label id="elh_billing_other_voucher_CanceledBy" for="x_CanceledBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CanceledBy->caption() ?><?= $Page->CanceledBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CanceledBy->cellAttributes() ?>>
<span id="el_billing_other_voucher_CanceledBy">
<input type="<?= $Page->CanceledBy->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_CanceledBy" name="x_CanceledBy" id="x_CanceledBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CanceledBy->getPlaceHolder()) ?>" value="<?= $Page->CanceledBy->EditValue ?>"<?= $Page->CanceledBy->editAttributes() ?> aria-describedby="x_CanceledBy_help">
<?= $Page->CanceledBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CanceledBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelStatus->Visible) { // CancelStatus ?>
    <div id="r_CancelStatus" class="form-group row">
        <label id="elh_billing_other_voucher_CancelStatus" for="x_CancelStatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CancelStatus->caption() ?><?= $Page->CancelStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelStatus->cellAttributes() ?>>
<span id="el_billing_other_voucher_CancelStatus">
<input type="<?= $Page->CancelStatus->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_CancelStatus" name="x_CancelStatus" id="x_CancelStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelStatus->getPlaceHolder()) ?>" value="<?= $Page->CancelStatus->EditValue ?>"<?= $Page->CancelStatus->editAttributes() ?> aria-describedby="x_CancelStatus_help">
<?= $Page->CancelStatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelStatus->getErrorMessage() ?></div>
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
    ew.addEventHandlers("billing_other_voucher");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$BillingOtherVoucherEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fbilling_other_voucheredit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fbilling_other_voucheredit = currentForm = new ew.Form("fbilling_other_voucheredit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "billing_other_voucher")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.billing_other_voucher)
        ew.vars.tables.billing_other_voucher = currentTable;
    fbilling_other_voucheredit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["freezed", [fields.freezed.visible && fields.freezed.required ? ew.Validators.required(fields.freezed.caption) : null], fields.freezed.isInvalid],
        ["AdvanceNo", [fields.AdvanceNo.visible && fields.AdvanceNo.required ? ew.Validators.required(fields.AdvanceNo.caption) : null], fields.AdvanceNo.isInvalid],
        ["PatientID", [fields.PatientID.visible && fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Mobile", [fields.Mobile.visible && fields.Mobile.required ? ew.Validators.required(fields.Mobile.caption) : null], fields.Mobile.isInvalid],
        ["ModeofPayment", [fields.ModeofPayment.visible && fields.ModeofPayment.required ? ew.Validators.required(fields.ModeofPayment.caption) : null], fields.ModeofPayment.isInvalid],
        ["Amount", [fields.Amount.visible && fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid],
        ["CardNumber", [fields.CardNumber.visible && fields.CardNumber.required ? ew.Validators.required(fields.CardNumber.caption) : null], fields.CardNumber.isInvalid],
        ["BankName", [fields.BankName.visible && fields.BankName.required ? ew.Validators.required(fields.BankName.caption) : null], fields.BankName.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["voucher_type", [fields.voucher_type.visible && fields.voucher_type.required ? ew.Validators.required(fields.voucher_type.caption) : null], fields.voucher_type.isInvalid],
        ["Details", [fields.Details.visible && fields.Details.required ? ew.Validators.required(fields.Details.caption) : null], fields.Details.isInvalid],
        ["Date", [fields.Date.visible && fields.Date.required ? ew.Validators.required(fields.Date.caption) : null, ew.Validators.datetime(7)], fields.Date.isInvalid],
        ["AnyDues", [fields.AnyDues.visible && fields.AnyDues.required ? ew.Validators.required(fields.AnyDues.caption) : null], fields.AnyDues.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["VisiteType", [fields.VisiteType.visible && fields.VisiteType.required ? ew.Validators.required(fields.VisiteType.caption) : null], fields.VisiteType.isInvalid],
        ["VisitDate", [fields.VisitDate.visible && fields.VisitDate.required ? ew.Validators.required(fields.VisitDate.caption) : null], fields.VisitDate.isInvalid],
        ["Status", [fields.Status.visible && fields.Status.required ? ew.Validators.required(fields.Status.caption) : null], fields.Status.isInvalid],
        ["AdvanceValidityDate", [fields.AdvanceValidityDate.visible && fields.AdvanceValidityDate.required ? ew.Validators.required(fields.AdvanceValidityDate.caption) : null, ew.Validators.datetime(0)], fields.AdvanceValidityDate.isInvalid],
        ["TotalRemainingAdvance", [fields.TotalRemainingAdvance.visible && fields.TotalRemainingAdvance.required ? ew.Validators.required(fields.TotalRemainingAdvance.caption) : null], fields.TotalRemainingAdvance.isInvalid],
        ["Remarks", [fields.Remarks.visible && fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid],
        ["SeectPaymentMode", [fields.SeectPaymentMode.visible && fields.SeectPaymentMode.required ? ew.Validators.required(fields.SeectPaymentMode.caption) : null], fields.SeectPaymentMode.isInvalid],
        ["PaidAmount", [fields.PaidAmount.visible && fields.PaidAmount.required ? ew.Validators.required(fields.PaidAmount.caption) : null], fields.PaidAmount.isInvalid],
        ["Currency", [fields.Currency.visible && fields.Currency.required ? ew.Validators.required(fields.Currency.caption) : null], fields.Currency.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null, ew.Validators.integer], fields.Reception.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["GetUserName", [fields.GetUserName.visible && fields.GetUserName.required ? ew.Validators.required(fields.GetUserName.caption) : null], fields.GetUserName.isInvalid],
        ["AdjustmentwithAdvance", [fields.AdjustmentwithAdvance.visible && fields.AdjustmentwithAdvance.required ? ew.Validators.required(fields.AdjustmentwithAdvance.caption) : null], fields.AdjustmentwithAdvance.isInvalid],
        ["AdjustmentBillNumber", [fields.AdjustmentBillNumber.visible && fields.AdjustmentBillNumber.required ? ew.Validators.required(fields.AdjustmentBillNumber.caption) : null], fields.AdjustmentBillNumber.isInvalid],
        ["CancelAdvance", [fields.CancelAdvance.visible && fields.CancelAdvance.required ? ew.Validators.required(fields.CancelAdvance.caption) : null], fields.CancelAdvance.isInvalid],
        ["CancelReasan", [fields.CancelReasan.visible && fields.CancelReasan.required ? ew.Validators.required(fields.CancelReasan.caption) : null], fields.CancelReasan.isInvalid],
        ["CancelBy", [fields.CancelBy.visible && fields.CancelBy.required ? ew.Validators.required(fields.CancelBy.caption) : null], fields.CancelBy.isInvalid],
        ["CancelDate", [fields.CancelDate.visible && fields.CancelDate.required ? ew.Validators.required(fields.CancelDate.caption) : null, ew.Validators.datetime(7)], fields.CancelDate.isInvalid],
        ["CancelDateTime", [fields.CancelDateTime.visible && fields.CancelDateTime.required ? ew.Validators.required(fields.CancelDateTime.caption) : null, ew.Validators.datetime(0)], fields.CancelDateTime.isInvalid],
        ["CanceledBy", [fields.CanceledBy.visible && fields.CanceledBy.required ? ew.Validators.required(fields.CanceledBy.caption) : null], fields.CanceledBy.isInvalid],
        ["CancelStatus", [fields.CancelStatus.visible && fields.CancelStatus.required ? ew.Validators.required(fields.CancelStatus.caption) : null], fields.CancelStatus.isInvalid],
        ["Cash", [fields.Cash.visible && fields.Cash.required ? ew.Validators.required(fields.Cash.caption) : null, ew.Validators.float], fields.Cash.isInvalid],
        ["Card", [fields.Card.visible && fields.Card.required ? ew.Validators.required(fields.Card.caption) : null, ew.Validators.float], fields.Card.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fbilling_other_voucheredit,
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
    fbilling_other_voucheredit.validate = function () {
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
    fbilling_other_voucheredit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fbilling_other_voucheredit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fbilling_other_voucheredit.lists.ModeofPayment = <?= $Page->ModeofPayment->toClientList($Page) ?>;
    fbilling_other_voucheredit.lists.PatID = <?= $Page->PatID->toClientList($Page) ?>;
    fbilling_other_voucheredit.lists.CancelAdvance = <?= $Page->CancelAdvance->toClientList($Page) ?>;
    fbilling_other_voucheredit.lists.CancelStatus = <?= $Page->CancelStatus->toClientList($Page) ?>;
    loadjs.done("fbilling_other_voucheredit");
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
<form name="fbilling_other_voucheredit" id="fbilling_other_voucheredit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="billing_other_voucher">
<?php if ($Page->isConfirm()) { // Confirm page ?>
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="confirm" id="confirm" value="confirm">
<?php } else { ?>
<input type="hidden" name="action" id="action" value="confirm">
<?php } ?>
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_billing_other_voucher_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_id"><span id="el_billing_other_voucher_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } else { ?>
<template id="tpx_billing_other_voucher_id"><span id="el_billing_other_voucher_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->freezed->Visible) { // freezed ?>
    <div id="r_freezed" class="form-group row">
        <label id="elh_billing_other_voucher_freezed" for="x_freezed" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_freezed"><?= $Page->freezed->caption() ?><?= $Page->freezed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->freezed->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_freezed"><span id="el_billing_other_voucher_freezed">
<input type="<?= $Page->freezed->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_freezed" name="x_freezed" id="x_freezed" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->freezed->getPlaceHolder()) ?>" value="<?= $Page->freezed->EditValue ?>"<?= $Page->freezed->editAttributes() ?> aria-describedby="x_freezed_help">
<?= $Page->freezed->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->freezed->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_freezed"><span id="el_billing_other_voucher_freezed">
<span<?= $Page->freezed->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->freezed->getDisplayValue($Page->freezed->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_freezed" data-hidden="1" name="x_freezed" id="x_freezed" value="<?= HtmlEncode($Page->freezed->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdvanceNo->Visible) { // AdvanceNo ?>
    <div id="r_AdvanceNo" class="form-group row">
        <label id="elh_billing_other_voucher_AdvanceNo" for="x_AdvanceNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_AdvanceNo"><?= $Page->AdvanceNo->caption() ?><?= $Page->AdvanceNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdvanceNo->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_AdvanceNo"><span id="el_billing_other_voucher_AdvanceNo">
<span<?= $Page->AdvanceNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->AdvanceNo->getDisplayValue($Page->AdvanceNo->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_AdvanceNo" data-hidden="1" name="x_AdvanceNo" id="x_AdvanceNo" value="<?= HtmlEncode($Page->AdvanceNo->CurrentValue) ?>">
<?php } else { ?>
<template id="tpx_billing_other_voucher_AdvanceNo"><span id="el_billing_other_voucher_AdvanceNo">
<span<?= $Page->AdvanceNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->AdvanceNo->getDisplayValue($Page->AdvanceNo->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_AdvanceNo" data-hidden="1" name="x_AdvanceNo" id="x_AdvanceNo" value="<?= HtmlEncode($Page->AdvanceNo->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_billing_other_voucher_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_PatientID"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_PatientID"><span id="el_billing_other_voucher_PatientID">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?> aria-describedby="x_PatientID_help">
<?= $Page->PatientID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_PatientID"><span id="el_billing_other_voucher_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientID->getDisplayValue($Page->PatientID->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_PatientID" data-hidden="1" name="x_PatientID" id="x_PatientID" value="<?= HtmlEncode($Page->PatientID->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_billing_other_voucher_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_PatientName"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_PatientName"><span id="el_billing_other_voucher_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_PatientName"><span id="el_billing_other_voucher_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientName->getDisplayValue($Page->PatientName->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_PatientName" data-hidden="1" name="x_PatientName" id="x_PatientName" value="<?= HtmlEncode($Page->PatientName->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <div id="r_Mobile" class="form-group row">
        <label id="elh_billing_other_voucher_Mobile" for="x_Mobile" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_Mobile"><?= $Page->Mobile->caption() ?><?= $Page->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mobile->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_Mobile"><span id="el_billing_other_voucher_Mobile">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?> aria-describedby="x_Mobile_help">
<?= $Page->Mobile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_Mobile"><span id="el_billing_other_voucher_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Mobile->getDisplayValue($Page->Mobile->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Mobile" data-hidden="1" name="x_Mobile" id="x_Mobile" value="<?= HtmlEncode($Page->Mobile->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <div id="r_ModeofPayment" class="form-group row">
        <label id="elh_billing_other_voucher_ModeofPayment" for="x_ModeofPayment" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_ModeofPayment"><?= $Page->ModeofPayment->caption() ?><?= $Page->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModeofPayment->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_ModeofPayment"><span id="el_billing_other_voucher_ModeofPayment">
    <select
        id="x_ModeofPayment"
        name="x_ModeofPayment"
        class="form-control ew-select<?= $Page->ModeofPayment->isInvalidClass() ?>"
        data-select2-id="billing_other_voucher_x_ModeofPayment"
        data-table="billing_other_voucher"
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
    var el = document.querySelector("select[data-select2-id='billing_other_voucher_x_ModeofPayment']"),
        options = { name: "x_ModeofPayment", selectId: "billing_other_voucher_x_ModeofPayment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.billing_other_voucher.fields.ModeofPayment.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_ModeofPayment"><span id="el_billing_other_voucher_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ModeofPayment->getDisplayValue($Page->ModeofPayment->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_ModeofPayment" data-hidden="1" name="x_ModeofPayment" id="x_ModeofPayment" value="<?= HtmlEncode($Page->ModeofPayment->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label id="elh_billing_other_voucher_Amount" for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_Amount"><?= $Page->Amount->caption() ?><?= $Page->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_Amount"><span id="el_billing_other_voucher_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?> aria-describedby="x_Amount_help">
<?= $Page->Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_Amount"><span id="el_billing_other_voucher_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Amount->getDisplayValue($Page->Amount->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Amount" data-hidden="1" name="x_Amount" id="x_Amount" value="<?= HtmlEncode($Page->Amount->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <div id="r_CardNumber" class="form-group row">
        <label id="elh_billing_other_voucher_CardNumber" for="x_CardNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_CardNumber"><?= $Page->CardNumber->caption() ?><?= $Page->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CardNumber->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_CardNumber"><span id="el_billing_other_voucher_CardNumber">
<input type="<?= $Page->CardNumber->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CardNumber->getPlaceHolder()) ?>" value="<?= $Page->CardNumber->EditValue ?>"<?= $Page->CardNumber->editAttributes() ?> aria-describedby="x_CardNumber_help">
<?= $Page->CardNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CardNumber->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_CardNumber"><span id="el_billing_other_voucher_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CardNumber->getDisplayValue($Page->CardNumber->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_CardNumber" data-hidden="1" name="x_CardNumber" id="x_CardNumber" value="<?= HtmlEncode($Page->CardNumber->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <div id="r_BankName" class="form-group row">
        <label id="elh_billing_other_voucher_BankName" for="x_BankName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_BankName"><?= $Page->BankName->caption() ?><?= $Page->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BankName->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_BankName"><span id="el_billing_other_voucher_BankName">
<input type="<?= $Page->BankName->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BankName->getPlaceHolder()) ?>" value="<?= $Page->BankName->EditValue ?>"<?= $Page->BankName->editAttributes() ?> aria-describedby="x_BankName_help">
<?= $Page->BankName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BankName->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_BankName"><span id="el_billing_other_voucher_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BankName->getDisplayValue($Page->BankName->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_BankName" data-hidden="1" name="x_BankName" id="x_BankName" value="<?= HtmlEncode($Page->BankName->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_billing_other_voucher_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_Name"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_Name"><span id="el_billing_other_voucher_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_Name"><span id="el_billing_other_voucher_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Name->getDisplayValue($Page->Name->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Name" data-hidden="1" name="x_Name" id="x_Name" value="<?= HtmlEncode($Page->Name->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <div id="r_voucher_type" class="form-group row">
        <label id="elh_billing_other_voucher_voucher_type" for="x_voucher_type" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_voucher_type"><?= $Page->voucher_type->caption() ?><?= $Page->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->voucher_type->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_voucher_type"><span id="el_billing_other_voucher_voucher_type">
<input type="<?= $Page->voucher_type->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->voucher_type->getPlaceHolder()) ?>" value="<?= $Page->voucher_type->EditValue ?>"<?= $Page->voucher_type->editAttributes() ?> aria-describedby="x_voucher_type_help">
<?= $Page->voucher_type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->voucher_type->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_voucher_type"><span id="el_billing_other_voucher_voucher_type">
<span<?= $Page->voucher_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->voucher_type->getDisplayValue($Page->voucher_type->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_voucher_type" data-hidden="1" name="x_voucher_type" id="x_voucher_type" value="<?= HtmlEncode($Page->voucher_type->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <div id="r_Details" class="form-group row">
        <label id="elh_billing_other_voucher_Details" for="x_Details" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_Details"><?= $Page->Details->caption() ?><?= $Page->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Details->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_Details"><span id="el_billing_other_voucher_Details">
<input type="<?= $Page->Details->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Details->getPlaceHolder()) ?>" value="<?= $Page->Details->EditValue ?>"<?= $Page->Details->editAttributes() ?> aria-describedby="x_Details_help">
<?= $Page->Details->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Details->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_Details"><span id="el_billing_other_voucher_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Details->getDisplayValue($Page->Details->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Details" data-hidden="1" name="x_Details" id="x_Details" value="<?= HtmlEncode($Page->Details->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
    <div id="r_Date" class="form-group row">
        <label id="elh_billing_other_voucher_Date" for="x_Date" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_Date"><?= $Page->Date->caption() ?><?= $Page->Date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Date->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_Date"><span id="el_billing_other_voucher_Date">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Date" data-format="7" name="x_Date" id="x_Date" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue ?>"<?= $Page->Date->editAttributes() ?> aria-describedby="x_Date_help">
<?= $Page->Date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage() ?></div>
<?php if (!$Page->Date->ReadOnly && !$Page->Date->Disabled && !isset($Page->Date->EditAttrs["readonly"]) && !isset($Page->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbilling_other_voucheredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fbilling_other_voucheredit", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_Date"><span id="el_billing_other_voucher_Date">
<span<?= $Page->Date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Date->getDisplayValue($Page->Date->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Date" data-hidden="1" name="x_Date" id="x_Date" value="<?= HtmlEncode($Page->Date->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
    <div id="r_AnyDues" class="form-group row">
        <label id="elh_billing_other_voucher_AnyDues" for="x_AnyDues" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_AnyDues"><?= $Page->AnyDues->caption() ?><?= $Page->AnyDues->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnyDues->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_AnyDues"><span id="el_billing_other_voucher_AnyDues">
<input type="<?= $Page->AnyDues->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AnyDues->getPlaceHolder()) ?>" value="<?= $Page->AnyDues->EditValue ?>"<?= $Page->AnyDues->editAttributes() ?> aria-describedby="x_AnyDues_help">
<?= $Page->AnyDues->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnyDues->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_AnyDues"><span id="el_billing_other_voucher_AnyDues">
<span<?= $Page->AnyDues->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->AnyDues->getDisplayValue($Page->AnyDues->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_AnyDues" data-hidden="1" name="x_AnyDues" id="x_AnyDues" value="<?= HtmlEncode($Page->AnyDues->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_billing_other_voucher_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_PatID"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_PatID"><span id="el_billing_other_voucher_PatID">
<?php $Page->PatID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_PatID_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatID"><?= EmptyValue(strval($Page->PatID->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->PatID->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PatID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->PatID->ReadOnly || $Page->PatID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
<?= $Page->PatID->getCustomMessage() ?>
<?= $Page->PatID->Lookup->getParamTag($Page, "p_x_PatID") ?>
<input type="hidden" is="selection-list" data-table="billing_other_voucher" data-field="x_PatID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PatID->displayValueSeparatorAttribute() ?>" name="x_PatID" id="x_PatID" value="<?= $Page->PatID->CurrentValue ?>"<?= $Page->PatID->editAttributes() ?>>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_PatID"><span id="el_billing_other_voucher_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatID->getDisplayValue($Page->PatID->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_PatID" data-hidden="1" name="x_PatID" id="x_PatID" value="<?= HtmlEncode($Page->PatID->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VisiteType->Visible) { // VisiteType ?>
    <div id="r_VisiteType" class="form-group row">
        <label id="elh_billing_other_voucher_VisiteType" for="x_VisiteType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_VisiteType"><?= $Page->VisiteType->caption() ?><?= $Page->VisiteType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VisiteType->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_VisiteType"><span id="el_billing_other_voucher_VisiteType">
<input type="<?= $Page->VisiteType->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_VisiteType" name="x_VisiteType" id="x_VisiteType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VisiteType->getPlaceHolder()) ?>" value="<?= $Page->VisiteType->EditValue ?>"<?= $Page->VisiteType->editAttributes() ?> aria-describedby="x_VisiteType_help">
<?= $Page->VisiteType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->VisiteType->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_VisiteType"><span id="el_billing_other_voucher_VisiteType">
<span<?= $Page->VisiteType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->VisiteType->getDisplayValue($Page->VisiteType->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_VisiteType" data-hidden="1" name="x_VisiteType" id="x_VisiteType" value="<?= HtmlEncode($Page->VisiteType->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VisitDate->Visible) { // VisitDate ?>
    <div id="r_VisitDate" class="form-group row">
        <label id="elh_billing_other_voucher_VisitDate" for="x_VisitDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_VisitDate"><?= $Page->VisitDate->caption() ?><?= $Page->VisitDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VisitDate->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_VisitDate"><span id="el_billing_other_voucher_VisitDate">
<input type="<?= $Page->VisitDate->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_VisitDate" name="x_VisitDate" id="x_VisitDate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VisitDate->getPlaceHolder()) ?>" value="<?= $Page->VisitDate->EditValue ?>"<?= $Page->VisitDate->editAttributes() ?> aria-describedby="x_VisitDate_help">
<?= $Page->VisitDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->VisitDate->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_VisitDate"><span id="el_billing_other_voucher_VisitDate">
<span<?= $Page->VisitDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->VisitDate->getDisplayValue($Page->VisitDate->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_VisitDate" data-hidden="1" name="x_VisitDate" id="x_VisitDate" value="<?= HtmlEncode($Page->VisitDate->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <div id="r_Status" class="form-group row">
        <label id="elh_billing_other_voucher_Status" for="x_Status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_Status"><?= $Page->Status->caption() ?><?= $Page->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Status->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_Status"><span id="el_billing_other_voucher_Status">
<input type="<?= $Page->Status->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Status" name="x_Status" id="x_Status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Status->getPlaceHolder()) ?>" value="<?= $Page->Status->EditValue ?>"<?= $Page->Status->editAttributes() ?> aria-describedby="x_Status_help">
<?= $Page->Status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Status->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_Status"><span id="el_billing_other_voucher_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Status->getDisplayValue($Page->Status->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Status" data-hidden="1" name="x_Status" id="x_Status" value="<?= HtmlEncode($Page->Status->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
    <div id="r_AdvanceValidityDate" class="form-group row">
        <label id="elh_billing_other_voucher_AdvanceValidityDate" for="x_AdvanceValidityDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_AdvanceValidityDate"><?= $Page->AdvanceValidityDate->caption() ?><?= $Page->AdvanceValidityDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdvanceValidityDate->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_AdvanceValidityDate"><span id="el_billing_other_voucher_AdvanceValidityDate">
<input type="<?= $Page->AdvanceValidityDate->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_AdvanceValidityDate" name="x_AdvanceValidityDate" id="x_AdvanceValidityDate" placeholder="<?= HtmlEncode($Page->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?= $Page->AdvanceValidityDate->EditValue ?>"<?= $Page->AdvanceValidityDate->editAttributes() ?> aria-describedby="x_AdvanceValidityDate_help">
<?= $Page->AdvanceValidityDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AdvanceValidityDate->getErrorMessage() ?></div>
<?php if (!$Page->AdvanceValidityDate->ReadOnly && !$Page->AdvanceValidityDate->Disabled && !isset($Page->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($Page->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbilling_other_voucheredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fbilling_other_voucheredit", "x_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_AdvanceValidityDate"><span id="el_billing_other_voucher_AdvanceValidityDate">
<span<?= $Page->AdvanceValidityDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->AdvanceValidityDate->getDisplayValue($Page->AdvanceValidityDate->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_AdvanceValidityDate" data-hidden="1" name="x_AdvanceValidityDate" id="x_AdvanceValidityDate" value="<?= HtmlEncode($Page->AdvanceValidityDate->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
    <div id="r_TotalRemainingAdvance" class="form-group row">
        <label id="elh_billing_other_voucher_TotalRemainingAdvance" for="x_TotalRemainingAdvance" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_TotalRemainingAdvance"><?= $Page->TotalRemainingAdvance->caption() ?><?= $Page->TotalRemainingAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalRemainingAdvance->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_TotalRemainingAdvance"><span id="el_billing_other_voucher_TotalRemainingAdvance">
<input type="<?= $Page->TotalRemainingAdvance->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_TotalRemainingAdvance" name="x_TotalRemainingAdvance" id="x_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?= $Page->TotalRemainingAdvance->EditValue ?>"<?= $Page->TotalRemainingAdvance->editAttributes() ?> aria-describedby="x_TotalRemainingAdvance_help">
<?= $Page->TotalRemainingAdvance->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalRemainingAdvance->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_TotalRemainingAdvance"><span id="el_billing_other_voucher_TotalRemainingAdvance">
<span<?= $Page->TotalRemainingAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->TotalRemainingAdvance->getDisplayValue($Page->TotalRemainingAdvance->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_TotalRemainingAdvance" data-hidden="1" name="x_TotalRemainingAdvance" id="x_TotalRemainingAdvance" value="<?= HtmlEncode($Page->TotalRemainingAdvance->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label id="elh_billing_other_voucher_Remarks" for="x_Remarks" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_Remarks"><?= $Page->Remarks->caption() ?><?= $Page->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Remarks->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_Remarks"><span id="el_billing_other_voucher_Remarks">
<textarea data-table="billing_other_voucher" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>"<?= $Page->Remarks->editAttributes() ?> aria-describedby="x_Remarks_help"><?= $Page->Remarks->EditValue ?></textarea>
<?= $Page->Remarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_Remarks"><span id="el_billing_other_voucher_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->ViewValue ?></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Remarks" data-hidden="1" name="x_Remarks" id="x_Remarks" value="<?= HtmlEncode($Page->Remarks->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
    <div id="r_SeectPaymentMode" class="form-group row">
        <label id="elh_billing_other_voucher_SeectPaymentMode" for="x_SeectPaymentMode" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_SeectPaymentMode"><?= $Page->SeectPaymentMode->caption() ?><?= $Page->SeectPaymentMode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SeectPaymentMode->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_SeectPaymentMode"><span id="el_billing_other_voucher_SeectPaymentMode">
<input type="<?= $Page->SeectPaymentMode->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_SeectPaymentMode" name="x_SeectPaymentMode" id="x_SeectPaymentMode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SeectPaymentMode->getPlaceHolder()) ?>" value="<?= $Page->SeectPaymentMode->EditValue ?>"<?= $Page->SeectPaymentMode->editAttributes() ?> aria-describedby="x_SeectPaymentMode_help">
<?= $Page->SeectPaymentMode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SeectPaymentMode->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_SeectPaymentMode"><span id="el_billing_other_voucher_SeectPaymentMode">
<span<?= $Page->SeectPaymentMode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->SeectPaymentMode->getDisplayValue($Page->SeectPaymentMode->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_SeectPaymentMode" data-hidden="1" name="x_SeectPaymentMode" id="x_SeectPaymentMode" value="<?= HtmlEncode($Page->SeectPaymentMode->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
    <div id="r_PaidAmount" class="form-group row">
        <label id="elh_billing_other_voucher_PaidAmount" for="x_PaidAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_PaidAmount"><?= $Page->PaidAmount->caption() ?><?= $Page->PaidAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaidAmount->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_PaidAmount"><span id="el_billing_other_voucher_PaidAmount">
<input type="<?= $Page->PaidAmount->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_PaidAmount" name="x_PaidAmount" id="x_PaidAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaidAmount->getPlaceHolder()) ?>" value="<?= $Page->PaidAmount->EditValue ?>"<?= $Page->PaidAmount->editAttributes() ?> aria-describedby="x_PaidAmount_help">
<?= $Page->PaidAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PaidAmount->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_PaidAmount"><span id="el_billing_other_voucher_PaidAmount">
<span<?= $Page->PaidAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PaidAmount->getDisplayValue($Page->PaidAmount->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_PaidAmount" data-hidden="1" name="x_PaidAmount" id="x_PaidAmount" value="<?= HtmlEncode($Page->PaidAmount->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <div id="r_Currency" class="form-group row">
        <label id="elh_billing_other_voucher_Currency" for="x_Currency" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_Currency"><?= $Page->Currency->caption() ?><?= $Page->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Currency->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_Currency"><span id="el_billing_other_voucher_Currency">
<input type="<?= $Page->Currency->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Currency->getPlaceHolder()) ?>" value="<?= $Page->Currency->EditValue ?>"<?= $Page->Currency->editAttributes() ?> aria-describedby="x_Currency_help">
<?= $Page->Currency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Currency->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_Currency"><span id="el_billing_other_voucher_Currency">
<span<?= $Page->Currency->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Currency->getDisplayValue($Page->Currency->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Currency" data-hidden="1" name="x_Currency" id="x_Currency" value="<?= HtmlEncode($Page->Currency->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_billing_other_voucher_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_Reception"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_Reception"><span id="el_billing_other_voucher_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_Reception"><span id="el_billing_other_voucher_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Reception->getDisplayValue($Page->Reception->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Reception" data-hidden="1" name="x_Reception" id="x_Reception" value="<?= HtmlEncode($Page->Reception->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_billing_other_voucher_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_mrnno"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_mrnno"><span id="el_billing_other_voucher_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_mrnno"><span id="el_billing_other_voucher_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_mrnno" data-hidden="1" name="x_mrnno" id="x_mrnno" value="<?= HtmlEncode($Page->mrnno->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdjustmentwithAdvance->Visible) { // AdjustmentwithAdvance ?>
    <div id="r_AdjustmentwithAdvance" class="form-group row">
        <label id="elh_billing_other_voucher_AdjustmentwithAdvance" for="x_AdjustmentwithAdvance" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_AdjustmentwithAdvance"><?= $Page->AdjustmentwithAdvance->caption() ?><?= $Page->AdjustmentwithAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdjustmentwithAdvance->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_AdjustmentwithAdvance"><span id="el_billing_other_voucher_AdjustmentwithAdvance">
<input type="<?= $Page->AdjustmentwithAdvance->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_AdjustmentwithAdvance" name="x_AdjustmentwithAdvance" id="x_AdjustmentwithAdvance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AdjustmentwithAdvance->getPlaceHolder()) ?>" value="<?= $Page->AdjustmentwithAdvance->EditValue ?>"<?= $Page->AdjustmentwithAdvance->editAttributes() ?> aria-describedby="x_AdjustmentwithAdvance_help">
<?= $Page->AdjustmentwithAdvance->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AdjustmentwithAdvance->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_AdjustmentwithAdvance"><span id="el_billing_other_voucher_AdjustmentwithAdvance">
<span<?= $Page->AdjustmentwithAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->AdjustmentwithAdvance->getDisplayValue($Page->AdjustmentwithAdvance->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_AdjustmentwithAdvance" data-hidden="1" name="x_AdjustmentwithAdvance" id="x_AdjustmentwithAdvance" value="<?= HtmlEncode($Page->AdjustmentwithAdvance->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdjustmentBillNumber->Visible) { // AdjustmentBillNumber ?>
    <div id="r_AdjustmentBillNumber" class="form-group row">
        <label id="elh_billing_other_voucher_AdjustmentBillNumber" for="x_AdjustmentBillNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_AdjustmentBillNumber"><?= $Page->AdjustmentBillNumber->caption() ?><?= $Page->AdjustmentBillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdjustmentBillNumber->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_AdjustmentBillNumber"><span id="el_billing_other_voucher_AdjustmentBillNumber">
<input type="<?= $Page->AdjustmentBillNumber->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_AdjustmentBillNumber" name="x_AdjustmentBillNumber" id="x_AdjustmentBillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AdjustmentBillNumber->getPlaceHolder()) ?>" value="<?= $Page->AdjustmentBillNumber->EditValue ?>"<?= $Page->AdjustmentBillNumber->editAttributes() ?> aria-describedby="x_AdjustmentBillNumber_help">
<?= $Page->AdjustmentBillNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AdjustmentBillNumber->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_AdjustmentBillNumber"><span id="el_billing_other_voucher_AdjustmentBillNumber">
<span<?= $Page->AdjustmentBillNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->AdjustmentBillNumber->getDisplayValue($Page->AdjustmentBillNumber->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_AdjustmentBillNumber" data-hidden="1" name="x_AdjustmentBillNumber" id="x_AdjustmentBillNumber" value="<?= HtmlEncode($Page->AdjustmentBillNumber->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelAdvance->Visible) { // CancelAdvance ?>
    <div id="r_CancelAdvance" class="form-group row">
        <label id="elh_billing_other_voucher_CancelAdvance" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_CancelAdvance"><?= $Page->CancelAdvance->caption() ?><?= $Page->CancelAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelAdvance->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_CancelAdvance"><span id="el_billing_other_voucher_CancelAdvance">
<template id="tp_x_CancelAdvance">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="billing_other_voucher" data-field="x_CancelAdvance" name="x_CancelAdvance" id="x_CancelAdvance"<?= $Page->CancelAdvance->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_CancelAdvance" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_CancelAdvance[]"
    name="x_CancelAdvance[]"
    value="<?= HtmlEncode($Page->CancelAdvance->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_CancelAdvance"
    data-target="dsl_x_CancelAdvance"
    data-repeatcolumn="5"
    class="form-control<?= $Page->CancelAdvance->isInvalidClass() ?>"
    data-table="billing_other_voucher"
    data-field="x_CancelAdvance"
    data-value-separator="<?= $Page->CancelAdvance->displayValueSeparatorAttribute() ?>"
    <?= $Page->CancelAdvance->editAttributes() ?>>
<?= $Page->CancelAdvance->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelAdvance->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_CancelAdvance"><span id="el_billing_other_voucher_CancelAdvance">
<span<?= $Page->CancelAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelAdvance->getDisplayValue($Page->CancelAdvance->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_CancelAdvance" data-hidden="1" name="x_CancelAdvance" id="x_CancelAdvance" value="<?= HtmlEncode($Page->CancelAdvance->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelReasan->Visible) { // CancelReasan ?>
    <div id="r_CancelReasan" class="form-group row">
        <label id="elh_billing_other_voucher_CancelReasan" for="x_CancelReasan" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_CancelReasan"><?= $Page->CancelReasan->caption() ?><?= $Page->CancelReasan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelReasan->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_CancelReasan"><span id="el_billing_other_voucher_CancelReasan">
<textarea data-table="billing_other_voucher" data-field="x_CancelReasan" name="x_CancelReasan" id="x_CancelReasan" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->CancelReasan->getPlaceHolder()) ?>"<?= $Page->CancelReasan->editAttributes() ?> aria-describedby="x_CancelReasan_help"><?= $Page->CancelReasan->EditValue ?></textarea>
<?= $Page->CancelReasan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelReasan->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_CancelReasan"><span id="el_billing_other_voucher_CancelReasan">
<span<?= $Page->CancelReasan->viewAttributes() ?>>
<?= $Page->CancelReasan->ViewValue ?></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_CancelReasan" data-hidden="1" name="x_CancelReasan" id="x_CancelReasan" value="<?= HtmlEncode($Page->CancelReasan->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelBy->Visible) { // CancelBy ?>
    <div id="r_CancelBy" class="form-group row">
        <label id="elh_billing_other_voucher_CancelBy" for="x_CancelBy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_CancelBy"><?= $Page->CancelBy->caption() ?><?= $Page->CancelBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelBy->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_CancelBy"><span id="el_billing_other_voucher_CancelBy">
<input type="<?= $Page->CancelBy->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_CancelBy" name="x_CancelBy" id="x_CancelBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelBy->getPlaceHolder()) ?>" value="<?= $Page->CancelBy->EditValue ?>"<?= $Page->CancelBy->editAttributes() ?> aria-describedby="x_CancelBy_help">
<?= $Page->CancelBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelBy->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_CancelBy"><span id="el_billing_other_voucher_CancelBy">
<span<?= $Page->CancelBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelBy->getDisplayValue($Page->CancelBy->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_CancelBy" data-hidden="1" name="x_CancelBy" id="x_CancelBy" value="<?= HtmlEncode($Page->CancelBy->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelDate->Visible) { // CancelDate ?>
    <div id="r_CancelDate" class="form-group row">
        <label id="elh_billing_other_voucher_CancelDate" for="x_CancelDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_CancelDate"><?= $Page->CancelDate->caption() ?><?= $Page->CancelDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelDate->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_CancelDate"><span id="el_billing_other_voucher_CancelDate">
<input type="<?= $Page->CancelDate->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_CancelDate" data-format="7" name="x_CancelDate" id="x_CancelDate" placeholder="<?= HtmlEncode($Page->CancelDate->getPlaceHolder()) ?>" value="<?= $Page->CancelDate->EditValue ?>"<?= $Page->CancelDate->editAttributes() ?> aria-describedby="x_CancelDate_help">
<?= $Page->CancelDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelDate->getErrorMessage() ?></div>
<?php if (!$Page->CancelDate->ReadOnly && !$Page->CancelDate->Disabled && !isset($Page->CancelDate->EditAttrs["readonly"]) && !isset($Page->CancelDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbilling_other_voucheredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fbilling_other_voucheredit", "x_CancelDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_CancelDate"><span id="el_billing_other_voucher_CancelDate">
<span<?= $Page->CancelDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelDate->getDisplayValue($Page->CancelDate->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_CancelDate" data-hidden="1" name="x_CancelDate" id="x_CancelDate" value="<?= HtmlEncode($Page->CancelDate->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelDateTime->Visible) { // CancelDateTime ?>
    <div id="r_CancelDateTime" class="form-group row">
        <label id="elh_billing_other_voucher_CancelDateTime" for="x_CancelDateTime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_CancelDateTime"><?= $Page->CancelDateTime->caption() ?><?= $Page->CancelDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelDateTime->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_CancelDateTime"><span id="el_billing_other_voucher_CancelDateTime">
<input type="<?= $Page->CancelDateTime->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_CancelDateTime" name="x_CancelDateTime" id="x_CancelDateTime" placeholder="<?= HtmlEncode($Page->CancelDateTime->getPlaceHolder()) ?>" value="<?= $Page->CancelDateTime->EditValue ?>"<?= $Page->CancelDateTime->editAttributes() ?> aria-describedby="x_CancelDateTime_help">
<?= $Page->CancelDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelDateTime->getErrorMessage() ?></div>
<?php if (!$Page->CancelDateTime->ReadOnly && !$Page->CancelDateTime->Disabled && !isset($Page->CancelDateTime->EditAttrs["readonly"]) && !isset($Page->CancelDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fbilling_other_voucheredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fbilling_other_voucheredit", "x_CancelDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_CancelDateTime"><span id="el_billing_other_voucher_CancelDateTime">
<span<?= $Page->CancelDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelDateTime->getDisplayValue($Page->CancelDateTime->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_CancelDateTime" data-hidden="1" name="x_CancelDateTime" id="x_CancelDateTime" value="<?= HtmlEncode($Page->CancelDateTime->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CanceledBy->Visible) { // CanceledBy ?>
    <div id="r_CanceledBy" class="form-group row">
        <label id="elh_billing_other_voucher_CanceledBy" for="x_CanceledBy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_CanceledBy"><?= $Page->CanceledBy->caption() ?><?= $Page->CanceledBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CanceledBy->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_CanceledBy"><span id="el_billing_other_voucher_CanceledBy">
<input type="<?= $Page->CanceledBy->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_CanceledBy" name="x_CanceledBy" id="x_CanceledBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CanceledBy->getPlaceHolder()) ?>" value="<?= $Page->CanceledBy->EditValue ?>"<?= $Page->CanceledBy->editAttributes() ?> aria-describedby="x_CanceledBy_help">
<?= $Page->CanceledBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CanceledBy->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_CanceledBy"><span id="el_billing_other_voucher_CanceledBy">
<span<?= $Page->CanceledBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CanceledBy->getDisplayValue($Page->CanceledBy->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_CanceledBy" data-hidden="1" name="x_CanceledBy" id="x_CanceledBy" value="<?= HtmlEncode($Page->CanceledBy->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelStatus->Visible) { // CancelStatus ?>
    <div id="r_CancelStatus" class="form-group row">
        <label id="elh_billing_other_voucher_CancelStatus" for="x_CancelStatus" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_CancelStatus"><?= $Page->CancelStatus->caption() ?><?= $Page->CancelStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelStatus->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_CancelStatus"><span id="el_billing_other_voucher_CancelStatus">
    <select
        id="x_CancelStatus"
        name="x_CancelStatus"
        class="form-control ew-select<?= $Page->CancelStatus->isInvalidClass() ?>"
        data-select2-id="billing_other_voucher_x_CancelStatus"
        data-table="billing_other_voucher"
        data-field="x_CancelStatus"
        data-value-separator="<?= $Page->CancelStatus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->CancelStatus->getPlaceHolder()) ?>"
        <?= $Page->CancelStatus->editAttributes() ?>>
        <?= $Page->CancelStatus->selectOptionListHtml("x_CancelStatus") ?>
    </select>
    <?= $Page->CancelStatus->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->CancelStatus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='billing_other_voucher_x_CancelStatus']"),
        options = { name: "x_CancelStatus", selectId: "billing_other_voucher_x_CancelStatus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.billing_other_voucher.fields.CancelStatus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.billing_other_voucher.fields.CancelStatus.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_CancelStatus"><span id="el_billing_other_voucher_CancelStatus">
<span<?= $Page->CancelStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelStatus->getDisplayValue($Page->CancelStatus->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_CancelStatus" data-hidden="1" name="x_CancelStatus" id="x_CancelStatus" value="<?= HtmlEncode($Page->CancelStatus->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
    <div id="r_Cash" class="form-group row">
        <label id="elh_billing_other_voucher_Cash" for="x_Cash" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_Cash"><?= $Page->Cash->caption() ?><?= $Page->Cash->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Cash->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_Cash"><span id="el_billing_other_voucher_Cash">
<input type="<?= $Page->Cash->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Cash" name="x_Cash" id="x_Cash" size="30" placeholder="<?= HtmlEncode($Page->Cash->getPlaceHolder()) ?>" value="<?= $Page->Cash->EditValue ?>"<?= $Page->Cash->editAttributes() ?> aria-describedby="x_Cash_help">
<?= $Page->Cash->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Cash->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_Cash"><span id="el_billing_other_voucher_Cash">
<span<?= $Page->Cash->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Cash->getDisplayValue($Page->Cash->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Cash" data-hidden="1" name="x_Cash" id="x_Cash" value="<?= HtmlEncode($Page->Cash->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
    <div id="r_Card" class="form-group row">
        <label id="elh_billing_other_voucher_Card" for="x_Card" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_other_voucher_Card"><?= $Page->Card->caption() ?><?= $Page->Card->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Card->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_other_voucher_Card"><span id="el_billing_other_voucher_Card">
<input type="<?= $Page->Card->getInputTextType() ?>" data-table="billing_other_voucher" data-field="x_Card" name="x_Card" id="x_Card" size="30" placeholder="<?= HtmlEncode($Page->Card->getPlaceHolder()) ?>" value="<?= $Page->Card->EditValue ?>"<?= $Page->Card->editAttributes() ?> aria-describedby="x_Card_help">
<?= $Page->Card->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Card->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_other_voucher_Card"><span id="el_billing_other_voucher_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Card->getDisplayValue($Page->Card->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_other_voucher" data-field="x_Card" data-hidden="1" name="x_Card" id="x_Card" value="<?= HtmlEncode($Page->Card->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_billing_other_voucheredit" class="ew-custom-template"></div>
<template id="tpm_billing_other_voucheredit">
<div id="ct_BillingOtherVoucherEdit"><style>
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
<input id="createdbyId" name="createdbyId" type="hidden" value="<?php echo CurrentUserName(); ?>">
<input id="HospIDId" name="HospIDId" type="hidden" value="<?php echo HospitalID(); ?>">
<div class="row">
	<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_billing_other_voucher_PatID"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_other_voucher_PatID"></slot></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"></h3>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#229954">
				<h3 class="card-title">Patient Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
		<td><slot class="ew-slot" name="tpc_billing_other_voucher_PatientID"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_other_voucher_PatientID"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_other_voucher_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_other_voucher_PatientName"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_other_voucher_Mobile"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_other_voucher_Mobile"></slot></td>
		</tr>
		<tr>
		<td><slot class="ew-slot" name="tpc_billing_other_voucher_Date"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_other_voucher_Date"></slot></td>
		<td><slot class="ew-slot" name="tpc_billing_other_voucher_AdvanceValidityDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_other_voucher_AdvanceValidityDate"></slot></td>
		<td></td>
		</tr>
		 <tr>
			<td><slot class="ew-slot" name="tpc_billing_other_voucher_AdvanceNo"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_other_voucher_AdvanceNo"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_other_voucher_Status"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_other_voucher_Status"></slot></td>
			<td></td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div id="LoadGetOPAdvance"> </div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#E706B7">
				<h3 class="card-title">Payment Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
			<td><slot class="ew-slot" name="tpc_billing_other_voucher_ModeofPayment"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_other_voucher_ModeofPayment"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_other_voucher_Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_other_voucher_Amount"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_other_voucher_Remarks"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_other_voucher_Remarks"></slot></td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
<div id="viewBankName" class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#06A5E7">
				<h3 id="viewBankDetails" class="card-title">BankName</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
			<td><slot class="ew-slot" name="tpc_billing_other_voucher_CardNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_other_voucher_CardNumber"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_other_voucher_BankName"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_other_voucher_BankName"></slot></td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
<div id="viewBankName" class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#06A5E7">
				<h3 id="viewBankDetails" class="card-title">Cancel Advance</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
		<td><slot class="ew-slot" name="tpc_billing_other_voucher_CancelStatus"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_other_voucher_CancelStatus"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_other_voucher_CancelAdvance"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_other_voucher_CancelAdvance"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_other_voucher_CancelReasan"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_other_voucher_CancelReasan"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_other_voucher_CancelDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_other_voucher_CancelDate"></slot></td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
</div>
</template>
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<?php if (!$Page->isConfirm()) { // Confirm page ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" onclick="this.form.action.value='confirm';"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("ConfirmBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="submit" onclick="this.form.action.value='cancel';"><?= $Language->phrase("CancelBtn") ?></button>
<?php } ?>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_billing_other_voucheredit", "tpm_billing_other_voucheredit", "billing_other_voucheredit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("billing_other_voucher");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

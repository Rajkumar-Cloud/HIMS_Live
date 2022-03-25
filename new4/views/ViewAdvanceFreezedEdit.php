<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewAdvanceFreezedEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_advance_freezededit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fview_advance_freezededit = currentForm = new ew.Form("fview_advance_freezededit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_advance_freezed")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_advance_freezed)
        ew.vars.tables.view_advance_freezed = currentTable;
    fview_advance_freezededit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["freezed", [fields.freezed.visible && fields.freezed.required ? ew.Validators.required(fields.freezed.caption) : null], fields.freezed.isInvalid],
        ["PatientID", [fields.PatientID.visible && fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["Mobile", [fields.Mobile.visible && fields.Mobile.required ? ew.Validators.required(fields.Mobile.caption) : null], fields.Mobile.isInvalid],
        ["voucher_type", [fields.voucher_type.visible && fields.voucher_type.required ? ew.Validators.required(fields.voucher_type.caption) : null], fields.voucher_type.isInvalid],
        ["Details", [fields.Details.visible && fields.Details.required ? ew.Validators.required(fields.Details.caption) : null], fields.Details.isInvalid],
        ["ModeofPayment", [fields.ModeofPayment.visible && fields.ModeofPayment.required ? ew.Validators.required(fields.ModeofPayment.caption) : null], fields.ModeofPayment.isInvalid],
        ["Amount", [fields.Amount.visible && fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null], fields.Amount.isInvalid],
        ["AnyDues", [fields.AnyDues.visible && fields.AnyDues.required ? ew.Validators.required(fields.AnyDues.caption) : null], fields.AnyDues.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["VisiteType", [fields.VisiteType.visible && fields.VisiteType.required ? ew.Validators.required(fields.VisiteType.caption) : null], fields.VisiteType.isInvalid],
        ["VisitDate", [fields.VisitDate.visible && fields.VisitDate.required ? ew.Validators.required(fields.VisitDate.caption) : null], fields.VisitDate.isInvalid],
        ["AdvanceNo", [fields.AdvanceNo.visible && fields.AdvanceNo.required ? ew.Validators.required(fields.AdvanceNo.caption) : null], fields.AdvanceNo.isInvalid],
        ["Status", [fields.Status.visible && fields.Status.required ? ew.Validators.required(fields.Status.caption) : null], fields.Status.isInvalid],
        ["Date", [fields.Date.visible && fields.Date.required ? ew.Validators.required(fields.Date.caption) : null], fields.Date.isInvalid],
        ["AdvanceValidityDate", [fields.AdvanceValidityDate.visible && fields.AdvanceValidityDate.required ? ew.Validators.required(fields.AdvanceValidityDate.caption) : null], fields.AdvanceValidityDate.isInvalid],
        ["TotalRemainingAdvance", [fields.TotalRemainingAdvance.visible && fields.TotalRemainingAdvance.required ? ew.Validators.required(fields.TotalRemainingAdvance.caption) : null], fields.TotalRemainingAdvance.isInvalid],
        ["Remarks", [fields.Remarks.visible && fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid],
        ["SeectPaymentMode", [fields.SeectPaymentMode.visible && fields.SeectPaymentMode.required ? ew.Validators.required(fields.SeectPaymentMode.caption) : null], fields.SeectPaymentMode.isInvalid],
        ["PaidAmount", [fields.PaidAmount.visible && fields.PaidAmount.required ? ew.Validators.required(fields.PaidAmount.caption) : null], fields.PaidAmount.isInvalid],
        ["Currency", [fields.Currency.visible && fields.Currency.required ? ew.Validators.required(fields.Currency.caption) : null], fields.Currency.isInvalid],
        ["CardNumber", [fields.CardNumber.visible && fields.CardNumber.required ? ew.Validators.required(fields.CardNumber.caption) : null], fields.CardNumber.isInvalid],
        ["BankName", [fields.BankName.visible && fields.BankName.required ? ew.Validators.required(fields.BankName.caption) : null], fields.BankName.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["GetUserName", [fields.GetUserName.visible && fields.GetUserName.required ? ew.Validators.required(fields.GetUserName.caption) : null], fields.GetUserName.isInvalid],
        ["AdjustmentwithAdvance", [fields.AdjustmentwithAdvance.visible && fields.AdjustmentwithAdvance.required ? ew.Validators.required(fields.AdjustmentwithAdvance.caption) : null], fields.AdjustmentwithAdvance.isInvalid],
        ["AdjustmentBillNumber", [fields.AdjustmentBillNumber.visible && fields.AdjustmentBillNumber.required ? ew.Validators.required(fields.AdjustmentBillNumber.caption) : null], fields.AdjustmentBillNumber.isInvalid],
        ["CancelAdvance", [fields.CancelAdvance.visible && fields.CancelAdvance.required ? ew.Validators.required(fields.CancelAdvance.caption) : null], fields.CancelAdvance.isInvalid],
        ["CancelReasan", [fields.CancelReasan.visible && fields.CancelReasan.required ? ew.Validators.required(fields.CancelReasan.caption) : null], fields.CancelReasan.isInvalid],
        ["CancelBy", [fields.CancelBy.visible && fields.CancelBy.required ? ew.Validators.required(fields.CancelBy.caption) : null], fields.CancelBy.isInvalid],
        ["CancelDate", [fields.CancelDate.visible && fields.CancelDate.required ? ew.Validators.required(fields.CancelDate.caption) : null], fields.CancelDate.isInvalid],
        ["CancelDateTime", [fields.CancelDateTime.visible && fields.CancelDateTime.required ? ew.Validators.required(fields.CancelDateTime.caption) : null], fields.CancelDateTime.isInvalid],
        ["CanceledBy", [fields.CanceledBy.visible && fields.CanceledBy.required ? ew.Validators.required(fields.CanceledBy.caption) : null], fields.CanceledBy.isInvalid],
        ["CancelStatus", [fields.CancelStatus.visible && fields.CancelStatus.required ? ew.Validators.required(fields.CancelStatus.caption) : null], fields.CancelStatus.isInvalid],
        ["Cash", [fields.Cash.visible && fields.Cash.required ? ew.Validators.required(fields.Cash.caption) : null], fields.Cash.isInvalid],
        ["Card", [fields.Card.visible && fields.Card.required ? ew.Validators.required(fields.Card.caption) : null], fields.Card.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_advance_freezededit,
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
    fview_advance_freezededit.validate = function () {
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
    fview_advance_freezededit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_advance_freezededit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_advance_freezededit.lists.freezed = <?= $Page->freezed->toClientList($Page) ?>;
    loadjs.done("fview_advance_freezededit");
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
<form name="fview_advance_freezededit" id="fview_advance_freezededit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_advance_freezed">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_view_advance_freezed_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_view_advance_freezed_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->freezed->Visible) { // freezed ?>
    <div id="r_freezed" class="form-group row">
        <label id="elh_view_advance_freezed_freezed" class="<?= $Page->LeftColumnClass ?>"><?= $Page->freezed->caption() ?><?= $Page->freezed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->freezed->cellAttributes() ?>>
<span id="el_view_advance_freezed_freezed">
<template id="tp_x_freezed">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_advance_freezed" data-field="x_freezed" name="x_freezed" id="x_freezed"<?= $Page->freezed->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_freezed" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_freezed"
    name="x_freezed"
    value="<?= HtmlEncode($Page->freezed->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_freezed"
    data-target="dsl_x_freezed"
    data-repeatcolumn="5"
    class="form-control<?= $Page->freezed->isInvalidClass() ?>"
    data-table="view_advance_freezed"
    data-field="x_freezed"
    data-value-separator="<?= $Page->freezed->displayValueSeparatorAttribute() ?>"
    <?= $Page->freezed->editAttributes() ?>>
<?= $Page->freezed->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->freezed->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_view_advance_freezed_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<span id="el_view_advance_freezed_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientID->getDisplayValue($Page->PatientID->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatientID" data-hidden="1" name="x_PatientID" id="x_PatientID" value="<?= HtmlEncode($Page->PatientID->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_view_advance_freezed_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_view_advance_freezed_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientName->getDisplayValue($Page->PatientName->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatientName" data-hidden="1" name="x_PatientName" id="x_PatientName" value="<?= HtmlEncode($Page->PatientName->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_view_advance_freezed_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<span id="el_view_advance_freezed_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Name->getDisplayValue($Page->Name->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Name" data-hidden="1" name="x_Name" id="x_Name" value="<?= HtmlEncode($Page->Name->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <div id="r_Mobile" class="form-group row">
        <label id="elh_view_advance_freezed_Mobile" for="x_Mobile" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Mobile->caption() ?><?= $Page->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mobile->cellAttributes() ?>>
<span id="el_view_advance_freezed_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Mobile->getDisplayValue($Page->Mobile->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Mobile" data-hidden="1" name="x_Mobile" id="x_Mobile" value="<?= HtmlEncode($Page->Mobile->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <div id="r_voucher_type" class="form-group row">
        <label id="elh_view_advance_freezed_voucher_type" for="x_voucher_type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->voucher_type->caption() ?><?= $Page->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->voucher_type->cellAttributes() ?>>
<span id="el_view_advance_freezed_voucher_type">
<span<?= $Page->voucher_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->voucher_type->getDisplayValue($Page->voucher_type->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_voucher_type" data-hidden="1" name="x_voucher_type" id="x_voucher_type" value="<?= HtmlEncode($Page->voucher_type->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <div id="r_Details" class="form-group row">
        <label id="elh_view_advance_freezed_Details" for="x_Details" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Details->caption() ?><?= $Page->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Details->cellAttributes() ?>>
<span id="el_view_advance_freezed_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Details->getDisplayValue($Page->Details->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Details" data-hidden="1" name="x_Details" id="x_Details" value="<?= HtmlEncode($Page->Details->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <div id="r_ModeofPayment" class="form-group row">
        <label id="elh_view_advance_freezed_ModeofPayment" for="x_ModeofPayment" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModeofPayment->caption() ?><?= $Page->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModeofPayment->cellAttributes() ?>>
<span id="el_view_advance_freezed_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ModeofPayment->getDisplayValue($Page->ModeofPayment->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_ModeofPayment" data-hidden="1" name="x_ModeofPayment" id="x_ModeofPayment" value="<?= HtmlEncode($Page->ModeofPayment->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label id="elh_view_advance_freezed_Amount" for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Amount->caption() ?><?= $Page->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
<span id="el_view_advance_freezed_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Amount->getDisplayValue($Page->Amount->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Amount" data-hidden="1" name="x_Amount" id="x_Amount" value="<?= HtmlEncode($Page->Amount->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
    <div id="r_AnyDues" class="form-group row">
        <label id="elh_view_advance_freezed_AnyDues" for="x_AnyDues" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AnyDues->caption() ?><?= $Page->AnyDues->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnyDues->cellAttributes() ?>>
<span id="el_view_advance_freezed_AnyDues">
<span<?= $Page->AnyDues->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->AnyDues->getDisplayValue($Page->AnyDues->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AnyDues" data-hidden="1" name="x_AnyDues" id="x_AnyDues" value="<?= HtmlEncode($Page->AnyDues->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_view_advance_freezed_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_view_advance_freezed_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->createdby->getDisplayValue($Page->createdby->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_createdby" data-hidden="1" name="x_createdby" id="x_createdby" value="<?= HtmlEncode($Page->createdby->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_view_advance_freezed_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_view_advance_freezed_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->createddatetime->getDisplayValue($Page->createddatetime->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_createddatetime" data-hidden="1" name="x_createddatetime" id="x_createddatetime" value="<?= HtmlEncode($Page->createddatetime->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_view_advance_freezed_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_view_advance_freezed_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->modifiedby->getDisplayValue($Page->modifiedby->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_modifiedby" data-hidden="1" name="x_modifiedby" id="x_modifiedby" value="<?= HtmlEncode($Page->modifiedby->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_view_advance_freezed_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_view_advance_freezed_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->modifieddatetime->getDisplayValue($Page->modifieddatetime->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_modifieddatetime" data-hidden="1" name="x_modifieddatetime" id="x_modifieddatetime" value="<?= HtmlEncode($Page->modifieddatetime->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_view_advance_freezed_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<span id="el_view_advance_freezed_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatID->getDisplayValue($Page->PatID->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PatID" data-hidden="1" name="x_PatID" id="x_PatID" value="<?= HtmlEncode($Page->PatID->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VisiteType->Visible) { // VisiteType ?>
    <div id="r_VisiteType" class="form-group row">
        <label id="elh_view_advance_freezed_VisiteType" for="x_VisiteType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->VisiteType->caption() ?><?= $Page->VisiteType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VisiteType->cellAttributes() ?>>
<span id="el_view_advance_freezed_VisiteType">
<span<?= $Page->VisiteType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->VisiteType->getDisplayValue($Page->VisiteType->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_VisiteType" data-hidden="1" name="x_VisiteType" id="x_VisiteType" value="<?= HtmlEncode($Page->VisiteType->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VisitDate->Visible) { // VisitDate ?>
    <div id="r_VisitDate" class="form-group row">
        <label id="elh_view_advance_freezed_VisitDate" for="x_VisitDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->VisitDate->caption() ?><?= $Page->VisitDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VisitDate->cellAttributes() ?>>
<span id="el_view_advance_freezed_VisitDate">
<span<?= $Page->VisitDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->VisitDate->getDisplayValue($Page->VisitDate->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_VisitDate" data-hidden="1" name="x_VisitDate" id="x_VisitDate" value="<?= HtmlEncode($Page->VisitDate->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdvanceNo->Visible) { // AdvanceNo ?>
    <div id="r_AdvanceNo" class="form-group row">
        <label id="elh_view_advance_freezed_AdvanceNo" for="x_AdvanceNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AdvanceNo->caption() ?><?= $Page->AdvanceNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdvanceNo->cellAttributes() ?>>
<span id="el_view_advance_freezed_AdvanceNo">
<span<?= $Page->AdvanceNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->AdvanceNo->getDisplayValue($Page->AdvanceNo->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdvanceNo" data-hidden="1" name="x_AdvanceNo" id="x_AdvanceNo" value="<?= HtmlEncode($Page->AdvanceNo->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <div id="r_Status" class="form-group row">
        <label id="elh_view_advance_freezed_Status" for="x_Status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Status->caption() ?><?= $Page->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Status->cellAttributes() ?>>
<span id="el_view_advance_freezed_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Status->getDisplayValue($Page->Status->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Status" data-hidden="1" name="x_Status" id="x_Status" value="<?= HtmlEncode($Page->Status->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
    <div id="r_Date" class="form-group row">
        <label id="elh_view_advance_freezed_Date" for="x_Date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Date->caption() ?><?= $Page->Date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Date->cellAttributes() ?>>
<span id="el_view_advance_freezed_Date">
<span<?= $Page->Date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Date->getDisplayValue($Page->Date->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Date" data-hidden="1" name="x_Date" id="x_Date" value="<?= HtmlEncode($Page->Date->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
    <div id="r_AdvanceValidityDate" class="form-group row">
        <label id="elh_view_advance_freezed_AdvanceValidityDate" for="x_AdvanceValidityDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AdvanceValidityDate->caption() ?><?= $Page->AdvanceValidityDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdvanceValidityDate->cellAttributes() ?>>
<span id="el_view_advance_freezed_AdvanceValidityDate">
<span<?= $Page->AdvanceValidityDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->AdvanceValidityDate->getDisplayValue($Page->AdvanceValidityDate->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdvanceValidityDate" data-hidden="1" name="x_AdvanceValidityDate" id="x_AdvanceValidityDate" value="<?= HtmlEncode($Page->AdvanceValidityDate->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
    <div id="r_TotalRemainingAdvance" class="form-group row">
        <label id="elh_view_advance_freezed_TotalRemainingAdvance" for="x_TotalRemainingAdvance" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TotalRemainingAdvance->caption() ?><?= $Page->TotalRemainingAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalRemainingAdvance->cellAttributes() ?>>
<span id="el_view_advance_freezed_TotalRemainingAdvance">
<span<?= $Page->TotalRemainingAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->TotalRemainingAdvance->getDisplayValue($Page->TotalRemainingAdvance->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_TotalRemainingAdvance" data-hidden="1" name="x_TotalRemainingAdvance" id="x_TotalRemainingAdvance" value="<?= HtmlEncode($Page->TotalRemainingAdvance->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label id="elh_view_advance_freezed_Remarks" for="x_Remarks" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Remarks->caption() ?><?= $Page->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Remarks->cellAttributes() ?>>
<span id="el_view_advance_freezed_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->EditValue ?></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Remarks" data-hidden="1" name="x_Remarks" id="x_Remarks" value="<?= HtmlEncode($Page->Remarks->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
    <div id="r_SeectPaymentMode" class="form-group row">
        <label id="elh_view_advance_freezed_SeectPaymentMode" for="x_SeectPaymentMode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SeectPaymentMode->caption() ?><?= $Page->SeectPaymentMode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SeectPaymentMode->cellAttributes() ?>>
<span id="el_view_advance_freezed_SeectPaymentMode">
<span<?= $Page->SeectPaymentMode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->SeectPaymentMode->getDisplayValue($Page->SeectPaymentMode->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_SeectPaymentMode" data-hidden="1" name="x_SeectPaymentMode" id="x_SeectPaymentMode" value="<?= HtmlEncode($Page->SeectPaymentMode->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
    <div id="r_PaidAmount" class="form-group row">
        <label id="elh_view_advance_freezed_PaidAmount" for="x_PaidAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PaidAmount->caption() ?><?= $Page->PaidAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaidAmount->cellAttributes() ?>>
<span id="el_view_advance_freezed_PaidAmount">
<span<?= $Page->PaidAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PaidAmount->getDisplayValue($Page->PaidAmount->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_PaidAmount" data-hidden="1" name="x_PaidAmount" id="x_PaidAmount" value="<?= HtmlEncode($Page->PaidAmount->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <div id="r_Currency" class="form-group row">
        <label id="elh_view_advance_freezed_Currency" for="x_Currency" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Currency->caption() ?><?= $Page->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Currency->cellAttributes() ?>>
<span id="el_view_advance_freezed_Currency">
<span<?= $Page->Currency->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Currency->getDisplayValue($Page->Currency->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Currency" data-hidden="1" name="x_Currency" id="x_Currency" value="<?= HtmlEncode($Page->Currency->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <div id="r_CardNumber" class="form-group row">
        <label id="elh_view_advance_freezed_CardNumber" for="x_CardNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CardNumber->caption() ?><?= $Page->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CardNumber->cellAttributes() ?>>
<span id="el_view_advance_freezed_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CardNumber->getDisplayValue($Page->CardNumber->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CardNumber" data-hidden="1" name="x_CardNumber" id="x_CardNumber" value="<?= HtmlEncode($Page->CardNumber->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <div id="r_BankName" class="form-group row">
        <label id="elh_view_advance_freezed_BankName" for="x_BankName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BankName->caption() ?><?= $Page->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BankName->cellAttributes() ?>>
<span id="el_view_advance_freezed_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BankName->getDisplayValue($Page->BankName->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_BankName" data-hidden="1" name="x_BankName" id="x_BankName" value="<?= HtmlEncode($Page->BankName->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_view_advance_freezed_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_view_advance_freezed_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->HospID->getDisplayValue($Page->HospID->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_HospID" data-hidden="1" name="x_HospID" id="x_HospID" value="<?= HtmlEncode($Page->HospID->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_view_advance_freezed_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<span id="el_view_advance_freezed_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Reception->getDisplayValue($Page->Reception->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Reception" data-hidden="1" name="x_Reception" id="x_Reception" value="<?= HtmlEncode($Page->Reception->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_view_advance_freezed_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_view_advance_freezed_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_mrnno" data-hidden="1" name="x_mrnno" id="x_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GetUserName->Visible) { // GetUserName ?>
    <div id="r_GetUserName" class="form-group row">
        <label id="elh_view_advance_freezed_GetUserName" for="x_GetUserName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GetUserName->caption() ?><?= $Page->GetUserName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GetUserName->cellAttributes() ?>>
<span id="el_view_advance_freezed_GetUserName">
<span<?= $Page->GetUserName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->GetUserName->getDisplayValue($Page->GetUserName->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_GetUserName" data-hidden="1" name="x_GetUserName" id="x_GetUserName" value="<?= HtmlEncode($Page->GetUserName->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdjustmentwithAdvance->Visible) { // AdjustmentwithAdvance ?>
    <div id="r_AdjustmentwithAdvance" class="form-group row">
        <label id="elh_view_advance_freezed_AdjustmentwithAdvance" for="x_AdjustmentwithAdvance" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AdjustmentwithAdvance->caption() ?><?= $Page->AdjustmentwithAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdjustmentwithAdvance->cellAttributes() ?>>
<span id="el_view_advance_freezed_AdjustmentwithAdvance">
<span<?= $Page->AdjustmentwithAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->AdjustmentwithAdvance->getDisplayValue($Page->AdjustmentwithAdvance->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdjustmentwithAdvance" data-hidden="1" name="x_AdjustmentwithAdvance" id="x_AdjustmentwithAdvance" value="<?= HtmlEncode($Page->AdjustmentwithAdvance->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdjustmentBillNumber->Visible) { // AdjustmentBillNumber ?>
    <div id="r_AdjustmentBillNumber" class="form-group row">
        <label id="elh_view_advance_freezed_AdjustmentBillNumber" for="x_AdjustmentBillNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AdjustmentBillNumber->caption() ?><?= $Page->AdjustmentBillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdjustmentBillNumber->cellAttributes() ?>>
<span id="el_view_advance_freezed_AdjustmentBillNumber">
<span<?= $Page->AdjustmentBillNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->AdjustmentBillNumber->getDisplayValue($Page->AdjustmentBillNumber->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_AdjustmentBillNumber" data-hidden="1" name="x_AdjustmentBillNumber" id="x_AdjustmentBillNumber" value="<?= HtmlEncode($Page->AdjustmentBillNumber->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelAdvance->Visible) { // CancelAdvance ?>
    <div id="r_CancelAdvance" class="form-group row">
        <label id="elh_view_advance_freezed_CancelAdvance" for="x_CancelAdvance" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CancelAdvance->caption() ?><?= $Page->CancelAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelAdvance->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelAdvance">
<span<?= $Page->CancelAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelAdvance->getDisplayValue($Page->CancelAdvance->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelAdvance" data-hidden="1" name="x_CancelAdvance" id="x_CancelAdvance" value="<?= HtmlEncode($Page->CancelAdvance->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelReasan->Visible) { // CancelReasan ?>
    <div id="r_CancelReasan" class="form-group row">
        <label id="elh_view_advance_freezed_CancelReasan" for="x_CancelReasan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CancelReasan->caption() ?><?= $Page->CancelReasan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelReasan->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelReasan">
<span<?= $Page->CancelReasan->viewAttributes() ?>>
<?= $Page->CancelReasan->EditValue ?></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelReasan" data-hidden="1" name="x_CancelReasan" id="x_CancelReasan" value="<?= HtmlEncode($Page->CancelReasan->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelBy->Visible) { // CancelBy ?>
    <div id="r_CancelBy" class="form-group row">
        <label id="elh_view_advance_freezed_CancelBy" for="x_CancelBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CancelBy->caption() ?><?= $Page->CancelBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelBy->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelBy">
<span<?= $Page->CancelBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelBy->getDisplayValue($Page->CancelBy->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelBy" data-hidden="1" name="x_CancelBy" id="x_CancelBy" value="<?= HtmlEncode($Page->CancelBy->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelDate->Visible) { // CancelDate ?>
    <div id="r_CancelDate" class="form-group row">
        <label id="elh_view_advance_freezed_CancelDate" for="x_CancelDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CancelDate->caption() ?><?= $Page->CancelDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelDate->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelDate">
<span<?= $Page->CancelDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelDate->getDisplayValue($Page->CancelDate->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelDate" data-hidden="1" name="x_CancelDate" id="x_CancelDate" value="<?= HtmlEncode($Page->CancelDate->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelDateTime->Visible) { // CancelDateTime ?>
    <div id="r_CancelDateTime" class="form-group row">
        <label id="elh_view_advance_freezed_CancelDateTime" for="x_CancelDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CancelDateTime->caption() ?><?= $Page->CancelDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelDateTime->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelDateTime">
<span<?= $Page->CancelDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelDateTime->getDisplayValue($Page->CancelDateTime->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelDateTime" data-hidden="1" name="x_CancelDateTime" id="x_CancelDateTime" value="<?= HtmlEncode($Page->CancelDateTime->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CanceledBy->Visible) { // CanceledBy ?>
    <div id="r_CanceledBy" class="form-group row">
        <label id="elh_view_advance_freezed_CanceledBy" for="x_CanceledBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CanceledBy->caption() ?><?= $Page->CanceledBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CanceledBy->cellAttributes() ?>>
<span id="el_view_advance_freezed_CanceledBy">
<span<?= $Page->CanceledBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CanceledBy->getDisplayValue($Page->CanceledBy->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CanceledBy" data-hidden="1" name="x_CanceledBy" id="x_CanceledBy" value="<?= HtmlEncode($Page->CanceledBy->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelStatus->Visible) { // CancelStatus ?>
    <div id="r_CancelStatus" class="form-group row">
        <label id="elh_view_advance_freezed_CancelStatus" for="x_CancelStatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CancelStatus->caption() ?><?= $Page->CancelStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelStatus->cellAttributes() ?>>
<span id="el_view_advance_freezed_CancelStatus">
<span<?= $Page->CancelStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelStatus->getDisplayValue($Page->CancelStatus->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_CancelStatus" data-hidden="1" name="x_CancelStatus" id="x_CancelStatus" value="<?= HtmlEncode($Page->CancelStatus->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
    <div id="r_Cash" class="form-group row">
        <label id="elh_view_advance_freezed_Cash" for="x_Cash" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Cash->caption() ?><?= $Page->Cash->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Cash->cellAttributes() ?>>
<span id="el_view_advance_freezed_Cash">
<span<?= $Page->Cash->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Cash->getDisplayValue($Page->Cash->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Cash" data-hidden="1" name="x_Cash" id="x_Cash" value="<?= HtmlEncode($Page->Cash->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
    <div id="r_Card" class="form-group row">
        <label id="elh_view_advance_freezed_Card" for="x_Card" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Card->caption() ?><?= $Page->Card->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Card->cellAttributes() ?>>
<span id="el_view_advance_freezed_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Card->getDisplayValue($Page->Card->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_advance_freezed" data-field="x_Card" data-hidden="1" name="x_Card" id="x_Card" value="<?= HtmlEncode($Page->Card->CurrentValue) ?>">
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
    ew.addEventHandlers("view_advance_freezed");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

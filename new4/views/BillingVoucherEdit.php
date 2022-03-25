<?php

namespace PHPMaker2021\HIMS;

// Page object
$BillingVoucherEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fbilling_voucheredit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fbilling_voucheredit = currentForm = new ew.Form("fbilling_voucheredit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "billing_voucher")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.billing_voucher)
        ew.vars.tables.billing_voucher = currentTable;
    fbilling_voucheredit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["PatId", [fields.PatId.visible && fields.PatId.required ? ew.Validators.required(fields.PatId.caption) : null, ew.Validators.integer], fields.PatId.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["BillNumber", [fields.BillNumber.visible && fields.BillNumber.required ? ew.Validators.required(fields.BillNumber.caption) : null], fields.BillNumber.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null, ew.Validators.integer], fields.PatientId.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["profilePic", [fields.profilePic.visible && fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["Mobile", [fields.Mobile.visible && fields.Mobile.required ? ew.Validators.required(fields.Mobile.caption) : null], fields.Mobile.isInvalid],
        ["IP_OP", [fields.IP_OP.visible && fields.IP_OP.required ? ew.Validators.required(fields.IP_OP.caption) : null], fields.IP_OP.isInvalid],
        ["Doctor", [fields.Doctor.visible && fields.Doctor.required ? ew.Validators.required(fields.Doctor.caption) : null], fields.Doctor.isInvalid],
        ["voucher_type", [fields.voucher_type.visible && fields.voucher_type.required ? ew.Validators.required(fields.voucher_type.caption) : null], fields.voucher_type.isInvalid],
        ["Details", [fields.Details.visible && fields.Details.required ? ew.Validators.required(fields.Details.caption) : null], fields.Details.isInvalid],
        ["ModeofPayment", [fields.ModeofPayment.visible && fields.ModeofPayment.required ? ew.Validators.required(fields.ModeofPayment.caption) : null], fields.ModeofPayment.isInvalid],
        ["Amount", [fields.Amount.visible && fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid],
        ["AnyDues", [fields.AnyDues.visible && fields.AnyDues.required ? ew.Validators.required(fields.AnyDues.caption) : null], fields.AnyDues.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["RealizationAmount", [fields.RealizationAmount.visible && fields.RealizationAmount.required ? ew.Validators.required(fields.RealizationAmount.caption) : null, ew.Validators.float], fields.RealizationAmount.isInvalid],
        ["RealizationStatus", [fields.RealizationStatus.visible && fields.RealizationStatus.required ? ew.Validators.required(fields.RealizationStatus.caption) : null], fields.RealizationStatus.isInvalid],
        ["RealizationRemarks", [fields.RealizationRemarks.visible && fields.RealizationRemarks.required ? ew.Validators.required(fields.RealizationRemarks.caption) : null], fields.RealizationRemarks.isInvalid],
        ["RealizationBatchNo", [fields.RealizationBatchNo.visible && fields.RealizationBatchNo.required ? ew.Validators.required(fields.RealizationBatchNo.caption) : null], fields.RealizationBatchNo.isInvalid],
        ["RealizationDate", [fields.RealizationDate.visible && fields.RealizationDate.required ? ew.Validators.required(fields.RealizationDate.caption) : null], fields.RealizationDate.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["RIDNO", [fields.RIDNO.visible && fields.RIDNO.required ? ew.Validators.required(fields.RIDNO.caption) : null, ew.Validators.integer], fields.RIDNO.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["CId", [fields.CId.visible && fields.CId.required ? ew.Validators.required(fields.CId.caption) : null, ew.Validators.integer], fields.CId.isInvalid],
        ["PartnerName", [fields.PartnerName.visible && fields.PartnerName.required ? ew.Validators.required(fields.PartnerName.caption) : null], fields.PartnerName.isInvalid],
        ["PayerType", [fields.PayerType.visible && fields.PayerType.required ? ew.Validators.required(fields.PayerType.caption) : null], fields.PayerType.isInvalid],
        ["Dob", [fields.Dob.visible && fields.Dob.required ? ew.Validators.required(fields.Dob.caption) : null], fields.Dob.isInvalid],
        ["Currency", [fields.Currency.visible && fields.Currency.required ? ew.Validators.required(fields.Currency.caption) : null], fields.Currency.isInvalid],
        ["DiscountRemarks", [fields.DiscountRemarks.visible && fields.DiscountRemarks.required ? ew.Validators.required(fields.DiscountRemarks.caption) : null], fields.DiscountRemarks.isInvalid],
        ["Remarks", [fields.Remarks.visible && fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid],
        ["DrDepartment", [fields.DrDepartment.visible && fields.DrDepartment.required ? ew.Validators.required(fields.DrDepartment.caption) : null], fields.DrDepartment.isInvalid],
        ["RefferedBy", [fields.RefferedBy.visible && fields.RefferedBy.required ? ew.Validators.required(fields.RefferedBy.caption) : null], fields.RefferedBy.isInvalid],
        ["CardNumber", [fields.CardNumber.visible && fields.CardNumber.required ? ew.Validators.required(fields.CardNumber.caption) : null], fields.CardNumber.isInvalid],
        ["BankName", [fields.BankName.visible && fields.BankName.required ? ew.Validators.required(fields.BankName.caption) : null], fields.BankName.isInvalid],
        ["DrID", [fields.DrID.visible && fields.DrID.required ? ew.Validators.required(fields.DrID.caption) : null, ew.Validators.integer], fields.DrID.isInvalid],
        ["BillStatus", [fields.BillStatus.visible && fields.BillStatus.required ? ew.Validators.required(fields.BillStatus.caption) : null, ew.Validators.integer], fields.BillStatus.isInvalid],
        ["ReportHeader", [fields.ReportHeader.visible && fields.ReportHeader.required ? ew.Validators.required(fields.ReportHeader.caption) : null], fields.ReportHeader.isInvalid],
        ["_UserName", [fields._UserName.visible && fields._UserName.required ? ew.Validators.required(fields._UserName.caption) : null], fields._UserName.isInvalid],
        ["AdjustmentAdvance", [fields.AdjustmentAdvance.visible && fields.AdjustmentAdvance.required ? ew.Validators.required(fields.AdjustmentAdvance.caption) : null], fields.AdjustmentAdvance.isInvalid],
        ["billing_vouchercol", [fields.billing_vouchercol.visible && fields.billing_vouchercol.required ? ew.Validators.required(fields.billing_vouchercol.caption) : null], fields.billing_vouchercol.isInvalid],
        ["BillType", [fields.BillType.visible && fields.BillType.required ? ew.Validators.required(fields.BillType.caption) : null], fields.BillType.isInvalid],
        ["ProcedureName", [fields.ProcedureName.visible && fields.ProcedureName.required ? ew.Validators.required(fields.ProcedureName.caption) : null], fields.ProcedureName.isInvalid],
        ["ProcedureAmount", [fields.ProcedureAmount.visible && fields.ProcedureAmount.required ? ew.Validators.required(fields.ProcedureAmount.caption) : null, ew.Validators.float], fields.ProcedureAmount.isInvalid],
        ["IncludePackage", [fields.IncludePackage.visible && fields.IncludePackage.required ? ew.Validators.required(fields.IncludePackage.caption) : null], fields.IncludePackage.isInvalid],
        ["CancelBill", [fields.CancelBill.visible && fields.CancelBill.required ? ew.Validators.required(fields.CancelBill.caption) : null], fields.CancelBill.isInvalid],
        ["CancelReason", [fields.CancelReason.visible && fields.CancelReason.required ? ew.Validators.required(fields.CancelReason.caption) : null], fields.CancelReason.isInvalid],
        ["CancelModeOfPayment", [fields.CancelModeOfPayment.visible && fields.CancelModeOfPayment.required ? ew.Validators.required(fields.CancelModeOfPayment.caption) : null], fields.CancelModeOfPayment.isInvalid],
        ["CancelAmount", [fields.CancelAmount.visible && fields.CancelAmount.required ? ew.Validators.required(fields.CancelAmount.caption) : null], fields.CancelAmount.isInvalid],
        ["CancelBankName", [fields.CancelBankName.visible && fields.CancelBankName.required ? ew.Validators.required(fields.CancelBankName.caption) : null], fields.CancelBankName.isInvalid],
        ["CancelTransactionNumber", [fields.CancelTransactionNumber.visible && fields.CancelTransactionNumber.required ? ew.Validators.required(fields.CancelTransactionNumber.caption) : null], fields.CancelTransactionNumber.isInvalid],
        ["LabTest", [fields.LabTest.visible && fields.LabTest.required ? ew.Validators.required(fields.LabTest.caption) : null], fields.LabTest.isInvalid],
        ["sid", [fields.sid.visible && fields.sid.required ? ew.Validators.required(fields.sid.caption) : null, ew.Validators.integer], fields.sid.isInvalid],
        ["SidNo", [fields.SidNo.visible && fields.SidNo.required ? ew.Validators.required(fields.SidNo.caption) : null], fields.SidNo.isInvalid],
        ["createdDatettime", [fields.createdDatettime.visible && fields.createdDatettime.required ? ew.Validators.required(fields.createdDatettime.caption) : null], fields.createdDatettime.isInvalid],
        ["LabTestReleased", [fields.LabTestReleased.visible && fields.LabTestReleased.required ? ew.Validators.required(fields.LabTestReleased.caption) : null], fields.LabTestReleased.isInvalid],
        ["GoogleReviewID", [fields.GoogleReviewID.visible && fields.GoogleReviewID.required ? ew.Validators.required(fields.GoogleReviewID.caption) : null], fields.GoogleReviewID.isInvalid],
        ["CardType", [fields.CardType.visible && fields.CardType.required ? ew.Validators.required(fields.CardType.caption) : null], fields.CardType.isInvalid],
        ["PharmacyBill", [fields.PharmacyBill.visible && fields.PharmacyBill.required ? ew.Validators.required(fields.PharmacyBill.caption) : null], fields.PharmacyBill.isInvalid],
        ["DiscountAmount", [fields.DiscountAmount.visible && fields.DiscountAmount.required ? ew.Validators.required(fields.DiscountAmount.caption) : null, ew.Validators.float], fields.DiscountAmount.isInvalid],
        ["Cash", [fields.Cash.visible && fields.Cash.required ? ew.Validators.required(fields.Cash.caption) : null, ew.Validators.float], fields.Cash.isInvalid],
        ["Card", [fields.Card.visible && fields.Card.required ? ew.Validators.required(fields.Card.caption) : null, ew.Validators.float], fields.Card.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fbilling_voucheredit,
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
    fbilling_voucheredit.validate = function () {
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
    fbilling_voucheredit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fbilling_voucheredit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fbilling_voucheredit.lists.Reception = <?= $Page->Reception->toClientList($Page) ?>;
    fbilling_voucheredit.lists.Doctor = <?= $Page->Doctor->toClientList($Page) ?>;
    fbilling_voucheredit.lists.voucher_type = <?= $Page->voucher_type->toClientList($Page) ?>;
    fbilling_voucheredit.lists.ModeofPayment = <?= $Page->ModeofPayment->toClientList($Page) ?>;
    loadjs.done("fbilling_voucheredit");
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
<form name="fbilling_voucheredit" id="fbilling_voucheredit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="billing_voucher">
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
        <label id="elh_billing_voucher_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_id"><span id="el_billing_voucher_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } else { ?>
<template id="tpx_billing_voucher_id"><span id="el_billing_voucher_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
    <div id="r_PatId" class="form-group row">
        <label id="elh_billing_voucher_PatId" for="x_PatId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_PatId"><?= $Page->PatId->caption() ?><?= $Page->PatId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatId->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_PatId"><span id="el_billing_voucher_PatId">
<input type="<?= $Page->PatId->getInputTextType() ?>" data-table="billing_voucher" data-field="x_PatId" name="x_PatId" id="x_PatId" size="30" placeholder="<?= HtmlEncode($Page->PatId->getPlaceHolder()) ?>" value="<?= $Page->PatId->EditValue ?>"<?= $Page->PatId->editAttributes() ?> aria-describedby="x_PatId_help">
<?= $Page->PatId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatId->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_PatId"><span id="el_billing_voucher_PatId">
<span<?= $Page->PatId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatId->getDisplayValue($Page->PatId->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_PatId" data-hidden="1" name="x_PatId" id="x_PatId" value="<?= HtmlEncode($Page->PatId->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_billing_voucher_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_Reception"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_Reception"><span id="el_billing_voucher_Reception">
<?php $Page->Reception->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_Reception_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Reception"><?= EmptyValue(strval($Page->Reception->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Reception->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Reception->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Reception->ReadOnly || $Page->Reception->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Reception',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
<?= $Page->Reception->getCustomMessage() ?>
<?= $Page->Reception->Lookup->getParamTag($Page, "p_x_Reception") ?>
<input type="hidden" is="selection-list" data-table="billing_voucher" data-field="x_Reception" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Reception->displayValueSeparatorAttribute() ?>" name="x_Reception" id="x_Reception" value="<?= $Page->Reception->CurrentValue ?>"<?= $Page->Reception->editAttributes() ?>>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_Reception"><span id="el_billing_voucher_Reception">
<span>
<?= GetImageViewTag($Page->Reception, $Page->Reception->ViewValue) ?></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_Reception" data-hidden="1" name="x_Reception" id="x_Reception" value="<?= HtmlEncode($Page->Reception->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <div id="r_BillNumber" class="form-group row">
        <label id="elh_billing_voucher_BillNumber" for="x_BillNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_BillNumber"><?= $Page->BillNumber->caption() ?><?= $Page->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillNumber->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_BillNumber"><span id="el_billing_voucher_BillNumber">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="billing_voucher" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?> aria-describedby="x_BillNumber_help">
<?= $Page->BillNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillNumber->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_BillNumber"><span id="el_billing_voucher_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BillNumber->getDisplayValue($Page->BillNumber->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_BillNumber" data-hidden="1" name="x_BillNumber" id="x_BillNumber" value="<?= HtmlEncode($Page->BillNumber->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_billing_voucher_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_PatientId"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_PatientId"><span id="el_billing_voucher_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="billing_voucher" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="80" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_PatientId"><span id="el_billing_voucher_PatientId">
<span>
<?= GetImageViewTag($Page->PatientId, $Page->PatientId->ViewValue) ?></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_PatientId" data-hidden="1" name="x_PatientId" id="x_PatientId" value="<?= HtmlEncode($Page->PatientId->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_billing_voucher_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_mrnno"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_mrnno"><span id="el_billing_voucher_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="billing_voucher" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_mrnno"><span id="el_billing_voucher_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_mrnno" data-hidden="1" name="x_mrnno" id="x_mrnno" value="<?= HtmlEncode($Page->mrnno->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_billing_voucher_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_PatientName"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_PatientName"><span id="el_billing_voucher_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_PatientName"><span id="el_billing_voucher_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientName->getDisplayValue($Page->PatientName->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_PatientName" data-hidden="1" name="x_PatientName" id="x_PatientName" value="<?= HtmlEncode($Page->PatientName->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_billing_voucher_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_Age"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_Age"><span id="el_billing_voucher_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="billing_voucher" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_Age"><span id="el_billing_voucher_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Age->getDisplayValue($Page->Age->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_Age" data-hidden="1" name="x_Age" id="x_Age" value="<?= HtmlEncode($Page->Age->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_billing_voucher_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_Gender"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_Gender"><span id="el_billing_voucher_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="billing_voucher" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_Gender"><span id="el_billing_voucher_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Gender->getDisplayValue($Page->Gender->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_Gender" data-hidden="1" name="x_Gender" id="x_Gender" value="<?= HtmlEncode($Page->Gender->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_billing_voucher_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_profilePic"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_profilePic"><span id="el_billing_voucher_profilePic">
<input type="<?= $Page->profilePic->getInputTextType() ?>" data-table="billing_voucher" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>" value="<?= $Page->profilePic->EditValue ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help">
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_profilePic"><span id="el_billing_voucher_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->profilePic->getDisplayValue($Page->profilePic->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_profilePic" data-hidden="1" name="x_profilePic" id="x_profilePic" value="<?= HtmlEncode($Page->profilePic->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <div id="r_Mobile" class="form-group row">
        <label id="elh_billing_voucher_Mobile" for="x_Mobile" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_Mobile"><?= $Page->Mobile->caption() ?><?= $Page->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mobile->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_Mobile"><span id="el_billing_voucher_Mobile">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?> aria-describedby="x_Mobile_help">
<?= $Page->Mobile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_Mobile"><span id="el_billing_voucher_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Mobile->getDisplayValue($Page->Mobile->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_Mobile" data-hidden="1" name="x_Mobile" id="x_Mobile" value="<?= HtmlEncode($Page->Mobile->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IP_OP->Visible) { // IP_OP ?>
    <div id="r_IP_OP" class="form-group row">
        <label id="elh_billing_voucher_IP_OP" for="x_IP_OP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_IP_OP"><?= $Page->IP_OP->caption() ?><?= $Page->IP_OP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IP_OP->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_IP_OP"><span id="el_billing_voucher_IP_OP">
<input type="<?= $Page->IP_OP->getInputTextType() ?>" data-table="billing_voucher" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IP_OP->getPlaceHolder()) ?>" value="<?= $Page->IP_OP->EditValue ?>"<?= $Page->IP_OP->editAttributes() ?> aria-describedby="x_IP_OP_help">
<?= $Page->IP_OP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IP_OP->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_IP_OP"><span id="el_billing_voucher_IP_OP">
<span<?= $Page->IP_OP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->IP_OP->getDisplayValue($Page->IP_OP->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_IP_OP" data-hidden="1" name="x_IP_OP" id="x_IP_OP" value="<?= HtmlEncode($Page->IP_OP->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
    <div id="r_Doctor" class="form-group row">
        <label id="elh_billing_voucher_Doctor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_Doctor"><?= $Page->Doctor->caption() ?><?= $Page->Doctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Doctor->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_Doctor"><span id="el_billing_voucher_Doctor">
<?php
$onchange = $Page->Doctor->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Doctor->EditAttrs["onchange"] = "";
?>
<span id="as_x_Doctor" class="ew-auto-suggest">
    <input type="<?= $Page->Doctor->getInputTextType() ?>" class="form-control" name="sv_x_Doctor" id="sv_x_Doctor" value="<?= RemoveHtml($Page->Doctor->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>"<?= $Page->Doctor->editAttributes() ?> aria-describedby="x_Doctor_help">
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="billing_voucher" data-field="x_Doctor" data-input="sv_x_Doctor" data-value-separator="<?= $Page->Doctor->displayValueSeparatorAttribute() ?>" name="x_Doctor" id="x_Doctor" value="<?= HtmlEncode($Page->Doctor->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->Doctor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage() ?></div>
<script>
loadjs.ready(["fbilling_voucheredit"], function() {
    fbilling_voucheredit.createAutoSuggest(Object.assign({"id":"x_Doctor","forceSelect":false}, ew.vars.tables.billing_voucher.fields.Doctor.autoSuggestOptions));
});
</script>
<?= $Page->Doctor->Lookup->getParamTag($Page, "p_x_Doctor") ?>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_Doctor"><span id="el_billing_voucher_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Doctor->getDisplayValue($Page->Doctor->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_Doctor" data-hidden="1" name="x_Doctor" id="x_Doctor" value="<?= HtmlEncode($Page->Doctor->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <div id="r_voucher_type" class="form-group row">
        <label id="elh_billing_voucher_voucher_type" for="x_voucher_type" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_voucher_type"><?= $Page->voucher_type->caption() ?><?= $Page->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->voucher_type->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_voucher_type"><span id="el_billing_voucher_voucher_type">
    <select
        id="x_voucher_type"
        name="x_voucher_type"
        class="form-control ew-select<?= $Page->voucher_type->isInvalidClass() ?>"
        data-select2-id="billing_voucher_x_voucher_type"
        data-table="billing_voucher"
        data-field="x_voucher_type"
        data-value-separator="<?= $Page->voucher_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->voucher_type->getPlaceHolder()) ?>"
        <?= $Page->voucher_type->editAttributes() ?>>
        <?= $Page->voucher_type->selectOptionListHtml("x_voucher_type") ?>
    </select>
    <?= $Page->voucher_type->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->voucher_type->getErrorMessage() ?></div>
<?= $Page->voucher_type->Lookup->getParamTag($Page, "p_x_voucher_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='billing_voucher_x_voucher_type']"),
        options = { name: "x_voucher_type", selectId: "billing_voucher_x_voucher_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.billing_voucher.fields.voucher_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_voucher_type"><span id="el_billing_voucher_voucher_type">
<span<?= $Page->voucher_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->voucher_type->getDisplayValue($Page->voucher_type->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_voucher_type" data-hidden="1" name="x_voucher_type" id="x_voucher_type" value="<?= HtmlEncode($Page->voucher_type->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <div id="r_Details" class="form-group row">
        <label id="elh_billing_voucher_Details" for="x_Details" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_Details"><?= $Page->Details->caption() ?><?= $Page->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Details->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_Details"><span id="el_billing_voucher_Details">
<input type="<?= $Page->Details->getInputTextType() ?>" data-table="billing_voucher" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Details->getPlaceHolder()) ?>" value="<?= $Page->Details->EditValue ?>"<?= $Page->Details->editAttributes() ?> aria-describedby="x_Details_help">
<?= $Page->Details->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Details->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_Details"><span id="el_billing_voucher_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Details->getDisplayValue($Page->Details->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_Details" data-hidden="1" name="x_Details" id="x_Details" value="<?= HtmlEncode($Page->Details->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <div id="r_ModeofPayment" class="form-group row">
        <label id="elh_billing_voucher_ModeofPayment" for="x_ModeofPayment" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_ModeofPayment"><?= $Page->ModeofPayment->caption() ?><?= $Page->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModeofPayment->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_ModeofPayment"><span id="el_billing_voucher_ModeofPayment">
    <select
        id="x_ModeofPayment"
        name="x_ModeofPayment"
        class="form-control ew-select<?= $Page->ModeofPayment->isInvalidClass() ?>"
        data-select2-id="billing_voucher_x_ModeofPayment"
        data-table="billing_voucher"
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
    var el = document.querySelector("select[data-select2-id='billing_voucher_x_ModeofPayment']"),
        options = { name: "x_ModeofPayment", selectId: "billing_voucher_x_ModeofPayment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.billing_voucher.fields.ModeofPayment.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_ModeofPayment"><span id="el_billing_voucher_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ModeofPayment->getDisplayValue($Page->ModeofPayment->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_ModeofPayment" data-hidden="1" name="x_ModeofPayment" id="x_ModeofPayment" value="<?= HtmlEncode($Page->ModeofPayment->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label id="elh_billing_voucher_Amount" for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_Amount"><?= $Page->Amount->caption() ?><?= $Page->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_Amount"><span id="el_billing_voucher_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="billing_voucher" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?> aria-describedby="x_Amount_help">
<?= $Page->Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_Amount"><span id="el_billing_voucher_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Amount->getDisplayValue($Page->Amount->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_Amount" data-hidden="1" name="x_Amount" id="x_Amount" value="<?= HtmlEncode($Page->Amount->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
    <div id="r_AnyDues" class="form-group row">
        <label id="elh_billing_voucher_AnyDues" for="x_AnyDues" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_AnyDues"><?= $Page->AnyDues->caption() ?><?= $Page->AnyDues->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnyDues->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_AnyDues"><span id="el_billing_voucher_AnyDues">
<input type="<?= $Page->AnyDues->getInputTextType() ?>" data-table="billing_voucher" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AnyDues->getPlaceHolder()) ?>" value="<?= $Page->AnyDues->EditValue ?>"<?= $Page->AnyDues->editAttributes() ?> aria-describedby="x_AnyDues_help">
<?= $Page->AnyDues->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnyDues->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_AnyDues"><span id="el_billing_voucher_AnyDues">
<span<?= $Page->AnyDues->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->AnyDues->getDisplayValue($Page->AnyDues->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_AnyDues" data-hidden="1" name="x_AnyDues" id="x_AnyDues" value="<?= HtmlEncode($Page->AnyDues->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
    <div id="r_RealizationAmount" class="form-group row">
        <label id="elh_billing_voucher_RealizationAmount" for="x_RealizationAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_RealizationAmount"><?= $Page->RealizationAmount->caption() ?><?= $Page->RealizationAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationAmount->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_RealizationAmount"><span id="el_billing_voucher_RealizationAmount">
<input type="<?= $Page->RealizationAmount->getInputTextType() ?>" data-table="billing_voucher" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?= HtmlEncode($Page->RealizationAmount->getPlaceHolder()) ?>" value="<?= $Page->RealizationAmount->EditValue ?>"<?= $Page->RealizationAmount->editAttributes() ?> aria-describedby="x_RealizationAmount_help">
<?= $Page->RealizationAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationAmount->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_RealizationAmount"><span id="el_billing_voucher_RealizationAmount">
<span<?= $Page->RealizationAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RealizationAmount->getDisplayValue($Page->RealizationAmount->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationAmount" data-hidden="1" name="x_RealizationAmount" id="x_RealizationAmount" value="<?= HtmlEncode($Page->RealizationAmount->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationStatus->Visible) { // RealizationStatus ?>
    <div id="r_RealizationStatus" class="form-group row">
        <label id="elh_billing_voucher_RealizationStatus" for="x_RealizationStatus" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_RealizationStatus"><?= $Page->RealizationStatus->caption() ?><?= $Page->RealizationStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationStatus->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_RealizationStatus"><span id="el_billing_voucher_RealizationStatus">
<input type="<?= $Page->RealizationStatus->getInputTextType() ?>" data-table="billing_voucher" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationStatus->getPlaceHolder()) ?>" value="<?= $Page->RealizationStatus->EditValue ?>"<?= $Page->RealizationStatus->editAttributes() ?> aria-describedby="x_RealizationStatus_help">
<?= $Page->RealizationStatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationStatus->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_RealizationStatus"><span id="el_billing_voucher_RealizationStatus">
<span<?= $Page->RealizationStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RealizationStatus->getDisplayValue($Page->RealizationStatus->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationStatus" data-hidden="1" name="x_RealizationStatus" id="x_RealizationStatus" value="<?= HtmlEncode($Page->RealizationStatus->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationRemarks->Visible) { // RealizationRemarks ?>
    <div id="r_RealizationRemarks" class="form-group row">
        <label id="elh_billing_voucher_RealizationRemarks" for="x_RealizationRemarks" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_RealizationRemarks"><?= $Page->RealizationRemarks->caption() ?><?= $Page->RealizationRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationRemarks->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_RealizationRemarks"><span id="el_billing_voucher_RealizationRemarks">
<input type="<?= $Page->RealizationRemarks->getInputTextType() ?>" data-table="billing_voucher" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationRemarks->getPlaceHolder()) ?>" value="<?= $Page->RealizationRemarks->EditValue ?>"<?= $Page->RealizationRemarks->editAttributes() ?> aria-describedby="x_RealizationRemarks_help">
<?= $Page->RealizationRemarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationRemarks->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_RealizationRemarks"><span id="el_billing_voucher_RealizationRemarks">
<span<?= $Page->RealizationRemarks->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RealizationRemarks->getDisplayValue($Page->RealizationRemarks->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationRemarks" data-hidden="1" name="x_RealizationRemarks" id="x_RealizationRemarks" value="<?= HtmlEncode($Page->RealizationRemarks->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
    <div id="r_RealizationBatchNo" class="form-group row">
        <label id="elh_billing_voucher_RealizationBatchNo" for="x_RealizationBatchNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_RealizationBatchNo"><?= $Page->RealizationBatchNo->caption() ?><?= $Page->RealizationBatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationBatchNo->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_RealizationBatchNo"><span id="el_billing_voucher_RealizationBatchNo">
<input type="<?= $Page->RealizationBatchNo->getInputTextType() ?>" data-table="billing_voucher" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationBatchNo->getPlaceHolder()) ?>" value="<?= $Page->RealizationBatchNo->EditValue ?>"<?= $Page->RealizationBatchNo->editAttributes() ?> aria-describedby="x_RealizationBatchNo_help">
<?= $Page->RealizationBatchNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationBatchNo->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_RealizationBatchNo"><span id="el_billing_voucher_RealizationBatchNo">
<span<?= $Page->RealizationBatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RealizationBatchNo->getDisplayValue($Page->RealizationBatchNo->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationBatchNo" data-hidden="1" name="x_RealizationBatchNo" id="x_RealizationBatchNo" value="<?= HtmlEncode($Page->RealizationBatchNo->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationDate->Visible) { // RealizationDate ?>
    <div id="r_RealizationDate" class="form-group row">
        <label id="elh_billing_voucher_RealizationDate" for="x_RealizationDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_RealizationDate"><?= $Page->RealizationDate->caption() ?><?= $Page->RealizationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationDate->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_RealizationDate"><span id="el_billing_voucher_RealizationDate">
<input type="<?= $Page->RealizationDate->getInputTextType() ?>" data-table="billing_voucher" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationDate->getPlaceHolder()) ?>" value="<?= $Page->RealizationDate->EditValue ?>"<?= $Page->RealizationDate->editAttributes() ?> aria-describedby="x_RealizationDate_help">
<?= $Page->RealizationDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationDate->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_RealizationDate"><span id="el_billing_voucher_RealizationDate">
<span<?= $Page->RealizationDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RealizationDate->getDisplayValue($Page->RealizationDate->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_RealizationDate" data-hidden="1" name="x_RealizationDate" id="x_RealizationDate" value="<?= HtmlEncode($Page->RealizationDate->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <div id="r_RIDNO" class="form-group row">
        <label id="elh_billing_voucher_RIDNO" for="x_RIDNO" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_RIDNO"><?= $Page->RIDNO->caption() ?><?= $Page->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNO->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_RIDNO"><span id="el_billing_voucher_RIDNO">
<input type="<?= $Page->RIDNO->getInputTextType() ?>" data-table="billing_voucher" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?= HtmlEncode($Page->RIDNO->getPlaceHolder()) ?>" value="<?= $Page->RIDNO->EditValue ?>"<?= $Page->RIDNO->editAttributes() ?> aria-describedby="x_RIDNO_help">
<?= $Page->RIDNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNO->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_RIDNO"><span id="el_billing_voucher_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RIDNO->getDisplayValue($Page->RIDNO->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_RIDNO" data-hidden="1" name="x_RIDNO" id="x_RIDNO" value="<?= HtmlEncode($Page->RIDNO->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_billing_voucher_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_TidNo"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_TidNo"><span id="el_billing_voucher_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="billing_voucher" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_TidNo"><span id="el_billing_voucher_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->TidNo->getDisplayValue($Page->TidNo->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_TidNo" data-hidden="1" name="x_TidNo" id="x_TidNo" value="<?= HtmlEncode($Page->TidNo->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
    <div id="r_CId" class="form-group row">
        <label id="elh_billing_voucher_CId" for="x_CId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_CId"><?= $Page->CId->caption() ?><?= $Page->CId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CId->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_CId"><span id="el_billing_voucher_CId">
<input type="<?= $Page->CId->getInputTextType() ?>" data-table="billing_voucher" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?= HtmlEncode($Page->CId->getPlaceHolder()) ?>" value="<?= $Page->CId->EditValue ?>"<?= $Page->CId->editAttributes() ?> aria-describedby="x_CId_help">
<?= $Page->CId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CId->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_CId"><span id="el_billing_voucher_CId">
<span<?= $Page->CId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CId->getDisplayValue($Page->CId->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_CId" data-hidden="1" name="x_CId" id="x_CId" value="<?= HtmlEncode($Page->CId->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <div id="r_PartnerName" class="form-group row">
        <label id="elh_billing_voucher_PartnerName" for="x_PartnerName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_PartnerName"><?= $Page->PartnerName->caption() ?><?= $Page->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerName->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_PartnerName"><span id="el_billing_voucher_PartnerName">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="billing_voucher" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?> aria-describedby="x_PartnerName_help">
<?= $Page->PartnerName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_PartnerName"><span id="el_billing_voucher_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PartnerName->getDisplayValue($Page->PartnerName->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_PartnerName" data-hidden="1" name="x_PartnerName" id="x_PartnerName" value="<?= HtmlEncode($Page->PartnerName->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PayerType->Visible) { // PayerType ?>
    <div id="r_PayerType" class="form-group row">
        <label id="elh_billing_voucher_PayerType" for="x_PayerType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_PayerType"><?= $Page->PayerType->caption() ?><?= $Page->PayerType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PayerType->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_PayerType"><span id="el_billing_voucher_PayerType">
<input type="<?= $Page->PayerType->getInputTextType() ?>" data-table="billing_voucher" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PayerType->getPlaceHolder()) ?>" value="<?= $Page->PayerType->EditValue ?>"<?= $Page->PayerType->editAttributes() ?> aria-describedby="x_PayerType_help">
<?= $Page->PayerType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PayerType->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_PayerType"><span id="el_billing_voucher_PayerType">
<span<?= $Page->PayerType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PayerType->getDisplayValue($Page->PayerType->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_PayerType" data-hidden="1" name="x_PayerType" id="x_PayerType" value="<?= HtmlEncode($Page->PayerType->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Dob->Visible) { // Dob ?>
    <div id="r_Dob" class="form-group row">
        <label id="elh_billing_voucher_Dob" for="x_Dob" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_Dob"><?= $Page->Dob->caption() ?><?= $Page->Dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Dob->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_Dob"><span id="el_billing_voucher_Dob">
<input type="<?= $Page->Dob->getInputTextType() ?>" data-table="billing_voucher" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Dob->getPlaceHolder()) ?>" value="<?= $Page->Dob->EditValue ?>"<?= $Page->Dob->editAttributes() ?> aria-describedby="x_Dob_help">
<?= $Page->Dob->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Dob->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_Dob"><span id="el_billing_voucher_Dob">
<span<?= $Page->Dob->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Dob->getDisplayValue($Page->Dob->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_Dob" data-hidden="1" name="x_Dob" id="x_Dob" value="<?= HtmlEncode($Page->Dob->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <div id="r_Currency" class="form-group row">
        <label id="elh_billing_voucher_Currency" for="x_Currency" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_Currency"><?= $Page->Currency->caption() ?><?= $Page->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Currency->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_Currency"><span id="el_billing_voucher_Currency">
<input type="<?= $Page->Currency->getInputTextType() ?>" data-table="billing_voucher" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Currency->getPlaceHolder()) ?>" value="<?= $Page->Currency->EditValue ?>"<?= $Page->Currency->editAttributes() ?> aria-describedby="x_Currency_help">
<?= $Page->Currency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Currency->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_Currency"><span id="el_billing_voucher_Currency">
<span<?= $Page->Currency->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Currency->getDisplayValue($Page->Currency->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_Currency" data-hidden="1" name="x_Currency" id="x_Currency" value="<?= HtmlEncode($Page->Currency->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DiscountRemarks->Visible) { // DiscountRemarks ?>
    <div id="r_DiscountRemarks" class="form-group row">
        <label id="elh_billing_voucher_DiscountRemarks" for="x_DiscountRemarks" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_DiscountRemarks"><?= $Page->DiscountRemarks->caption() ?><?= $Page->DiscountRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DiscountRemarks->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_DiscountRemarks"><span id="el_billing_voucher_DiscountRemarks">
<input type="<?= $Page->DiscountRemarks->getInputTextType() ?>" data-table="billing_voucher" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DiscountRemarks->getPlaceHolder()) ?>" value="<?= $Page->DiscountRemarks->EditValue ?>"<?= $Page->DiscountRemarks->editAttributes() ?> aria-describedby="x_DiscountRemarks_help">
<?= $Page->DiscountRemarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DiscountRemarks->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_DiscountRemarks"><span id="el_billing_voucher_DiscountRemarks">
<span<?= $Page->DiscountRemarks->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->DiscountRemarks->getDisplayValue($Page->DiscountRemarks->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_DiscountRemarks" data-hidden="1" name="x_DiscountRemarks" id="x_DiscountRemarks" value="<?= HtmlEncode($Page->DiscountRemarks->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label id="elh_billing_voucher_Remarks" for="x_Remarks" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_Remarks"><?= $Page->Remarks->caption() ?><?= $Page->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Remarks->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_Remarks"><span id="el_billing_voucher_Remarks">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="billing_voucher" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?> aria-describedby="x_Remarks_help">
<?= $Page->Remarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_Remarks"><span id="el_billing_voucher_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Remarks->getDisplayValue($Page->Remarks->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_Remarks" data-hidden="1" name="x_Remarks" id="x_Remarks" value="<?= HtmlEncode($Page->Remarks->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
    <div id="r_DrDepartment" class="form-group row">
        <label id="elh_billing_voucher_DrDepartment" for="x_DrDepartment" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_DrDepartment"><?= $Page->DrDepartment->caption() ?><?= $Page->DrDepartment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrDepartment->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_DrDepartment"><span id="el_billing_voucher_DrDepartment">
<input type="<?= $Page->DrDepartment->getInputTextType() ?>" data-table="billing_voucher" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrDepartment->getPlaceHolder()) ?>" value="<?= $Page->DrDepartment->EditValue ?>"<?= $Page->DrDepartment->editAttributes() ?> aria-describedby="x_DrDepartment_help">
<?= $Page->DrDepartment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrDepartment->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_DrDepartment"><span id="el_billing_voucher_DrDepartment">
<span<?= $Page->DrDepartment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->DrDepartment->getDisplayValue($Page->DrDepartment->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_DrDepartment" data-hidden="1" name="x_DrDepartment" id="x_DrDepartment" value="<?= HtmlEncode($Page->DrDepartment->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RefferedBy->Visible) { // RefferedBy ?>
    <div id="r_RefferedBy" class="form-group row">
        <label id="elh_billing_voucher_RefferedBy" for="x_RefferedBy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_RefferedBy"><?= $Page->RefferedBy->caption() ?><?= $Page->RefferedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefferedBy->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_RefferedBy"><span id="el_billing_voucher_RefferedBy">
<input type="<?= $Page->RefferedBy->getInputTextType() ?>" data-table="billing_voucher" data-field="x_RefferedBy" name="x_RefferedBy" id="x_RefferedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RefferedBy->getPlaceHolder()) ?>" value="<?= $Page->RefferedBy->EditValue ?>"<?= $Page->RefferedBy->editAttributes() ?> aria-describedby="x_RefferedBy_help">
<?= $Page->RefferedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RefferedBy->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_RefferedBy"><span id="el_billing_voucher_RefferedBy">
<span<?= $Page->RefferedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RefferedBy->getDisplayValue($Page->RefferedBy->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_RefferedBy" data-hidden="1" name="x_RefferedBy" id="x_RefferedBy" value="<?= HtmlEncode($Page->RefferedBy->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <div id="r_CardNumber" class="form-group row">
        <label id="elh_billing_voucher_CardNumber" for="x_CardNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_CardNumber"><?= $Page->CardNumber->caption() ?><?= $Page->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CardNumber->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_CardNumber"><span id="el_billing_voucher_CardNumber">
<input type="<?= $Page->CardNumber->getInputTextType() ?>" data-table="billing_voucher" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CardNumber->getPlaceHolder()) ?>" value="<?= $Page->CardNumber->EditValue ?>"<?= $Page->CardNumber->editAttributes() ?> aria-describedby="x_CardNumber_help">
<?= $Page->CardNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CardNumber->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_CardNumber"><span id="el_billing_voucher_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CardNumber->getDisplayValue($Page->CardNumber->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_CardNumber" data-hidden="1" name="x_CardNumber" id="x_CardNumber" value="<?= HtmlEncode($Page->CardNumber->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <div id="r_BankName" class="form-group row">
        <label id="elh_billing_voucher_BankName" for="x_BankName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_BankName"><?= $Page->BankName->caption() ?><?= $Page->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BankName->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_BankName"><span id="el_billing_voucher_BankName">
<input type="<?= $Page->BankName->getInputTextType() ?>" data-table="billing_voucher" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BankName->getPlaceHolder()) ?>" value="<?= $Page->BankName->EditValue ?>"<?= $Page->BankName->editAttributes() ?> aria-describedby="x_BankName_help">
<?= $Page->BankName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BankName->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_BankName"><span id="el_billing_voucher_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BankName->getDisplayValue($Page->BankName->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_BankName" data-hidden="1" name="x_BankName" id="x_BankName" value="<?= HtmlEncode($Page->BankName->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <div id="r_DrID" class="form-group row">
        <label id="elh_billing_voucher_DrID" for="x_DrID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_DrID"><?= $Page->DrID->caption() ?><?= $Page->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrID->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_DrID"><span id="el_billing_voucher_DrID">
<input type="<?= $Page->DrID->getInputTextType() ?>" data-table="billing_voucher" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?= HtmlEncode($Page->DrID->getPlaceHolder()) ?>" value="<?= $Page->DrID->EditValue ?>"<?= $Page->DrID->editAttributes() ?> aria-describedby="x_DrID_help">
<?= $Page->DrID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrID->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_DrID"><span id="el_billing_voucher_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->DrID->getDisplayValue($Page->DrID->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_DrID" data-hidden="1" name="x_DrID" id="x_DrID" value="<?= HtmlEncode($Page->DrID->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillStatus->Visible) { // BillStatus ?>
    <div id="r_BillStatus" class="form-group row">
        <label id="elh_billing_voucher_BillStatus" for="x_BillStatus" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_BillStatus"><?= $Page->BillStatus->caption() ?><?= $Page->BillStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillStatus->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_BillStatus"><span id="el_billing_voucher_BillStatus">
<input type="<?= $Page->BillStatus->getInputTextType() ?>" data-table="billing_voucher" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?= HtmlEncode($Page->BillStatus->getPlaceHolder()) ?>" value="<?= $Page->BillStatus->EditValue ?>"<?= $Page->BillStatus->editAttributes() ?> aria-describedby="x_BillStatus_help">
<?= $Page->BillStatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillStatus->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_BillStatus"><span id="el_billing_voucher_BillStatus">
<span<?= $Page->BillStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BillStatus->getDisplayValue($Page->BillStatus->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_BillStatus" data-hidden="1" name="x_BillStatus" id="x_BillStatus" value="<?= HtmlEncode($Page->BillStatus->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
    <div id="r_ReportHeader" class="form-group row">
        <label id="elh_billing_voucher_ReportHeader" for="x_ReportHeader" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_ReportHeader"><?= $Page->ReportHeader->caption() ?><?= $Page->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReportHeader->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_ReportHeader"><span id="el_billing_voucher_ReportHeader">
<input type="<?= $Page->ReportHeader->getInputTextType() ?>" data-table="billing_voucher" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReportHeader->getPlaceHolder()) ?>" value="<?= $Page->ReportHeader->EditValue ?>"<?= $Page->ReportHeader->editAttributes() ?> aria-describedby="x_ReportHeader_help">
<?= $Page->ReportHeader->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReportHeader->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_ReportHeader"><span id="el_billing_voucher_ReportHeader">
<span<?= $Page->ReportHeader->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ReportHeader->getDisplayValue($Page->ReportHeader->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_ReportHeader" data-hidden="1" name="x_ReportHeader" id="x_ReportHeader" value="<?= HtmlEncode($Page->ReportHeader->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
    <div id="r_AdjustmentAdvance" class="form-group row">
        <label id="elh_billing_voucher_AdjustmentAdvance" for="x_AdjustmentAdvance" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_AdjustmentAdvance"><?= $Page->AdjustmentAdvance->caption() ?><?= $Page->AdjustmentAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdjustmentAdvance->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_AdjustmentAdvance"><span id="el_billing_voucher_AdjustmentAdvance">
<input type="<?= $Page->AdjustmentAdvance->getInputTextType() ?>" data-table="billing_voucher" data-field="x_AdjustmentAdvance" name="x_AdjustmentAdvance" id="x_AdjustmentAdvance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AdjustmentAdvance->getPlaceHolder()) ?>" value="<?= $Page->AdjustmentAdvance->EditValue ?>"<?= $Page->AdjustmentAdvance->editAttributes() ?> aria-describedby="x_AdjustmentAdvance_help">
<?= $Page->AdjustmentAdvance->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AdjustmentAdvance->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_AdjustmentAdvance"><span id="el_billing_voucher_AdjustmentAdvance">
<span<?= $Page->AdjustmentAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->AdjustmentAdvance->getDisplayValue($Page->AdjustmentAdvance->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_AdjustmentAdvance" data-hidden="1" name="x_AdjustmentAdvance" id="x_AdjustmentAdvance" value="<?= HtmlEncode($Page->AdjustmentAdvance->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->billing_vouchercol->Visible) { // billing_vouchercol ?>
    <div id="r_billing_vouchercol" class="form-group row">
        <label id="elh_billing_voucher_billing_vouchercol" for="x_billing_vouchercol" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_billing_vouchercol"><?= $Page->billing_vouchercol->caption() ?><?= $Page->billing_vouchercol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->billing_vouchercol->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_billing_vouchercol"><span id="el_billing_voucher_billing_vouchercol">
<input type="<?= $Page->billing_vouchercol->getInputTextType() ?>" data-table="billing_voucher" data-field="x_billing_vouchercol" name="x_billing_vouchercol" id="x_billing_vouchercol" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->billing_vouchercol->getPlaceHolder()) ?>" value="<?= $Page->billing_vouchercol->EditValue ?>"<?= $Page->billing_vouchercol->editAttributes() ?> aria-describedby="x_billing_vouchercol_help">
<?= $Page->billing_vouchercol->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->billing_vouchercol->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_billing_vouchercol"><span id="el_billing_voucher_billing_vouchercol">
<span<?= $Page->billing_vouchercol->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->billing_vouchercol->getDisplayValue($Page->billing_vouchercol->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_billing_vouchercol" data-hidden="1" name="x_billing_vouchercol" id="x_billing_vouchercol" value="<?= HtmlEncode($Page->billing_vouchercol->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
    <div id="r_BillType" class="form-group row">
        <label id="elh_billing_voucher_BillType" for="x_BillType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_BillType"><?= $Page->BillType->caption() ?><?= $Page->BillType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillType->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_BillType"><span id="el_billing_voucher_BillType">
<input type="<?= $Page->BillType->getInputTextType() ?>" data-table="billing_voucher" data-field="x_BillType" name="x_BillType" id="x_BillType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillType->getPlaceHolder()) ?>" value="<?= $Page->BillType->EditValue ?>"<?= $Page->BillType->editAttributes() ?> aria-describedby="x_BillType_help">
<?= $Page->BillType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillType->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_BillType"><span id="el_billing_voucher_BillType">
<span<?= $Page->BillType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BillType->getDisplayValue($Page->BillType->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_BillType" data-hidden="1" name="x_BillType" id="x_BillType" value="<?= HtmlEncode($Page->BillType->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureName->Visible) { // ProcedureName ?>
    <div id="r_ProcedureName" class="form-group row">
        <label id="elh_billing_voucher_ProcedureName" for="x_ProcedureName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_ProcedureName"><?= $Page->ProcedureName->caption() ?><?= $Page->ProcedureName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureName->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_ProcedureName"><span id="el_billing_voucher_ProcedureName">
<input type="<?= $Page->ProcedureName->getInputTextType() ?>" data-table="billing_voucher" data-field="x_ProcedureName" name="x_ProcedureName" id="x_ProcedureName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProcedureName->getPlaceHolder()) ?>" value="<?= $Page->ProcedureName->EditValue ?>"<?= $Page->ProcedureName->editAttributes() ?> aria-describedby="x_ProcedureName_help">
<?= $Page->ProcedureName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProcedureName->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_ProcedureName"><span id="el_billing_voucher_ProcedureName">
<span<?= $Page->ProcedureName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ProcedureName->getDisplayValue($Page->ProcedureName->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_ProcedureName" data-hidden="1" name="x_ProcedureName" id="x_ProcedureName" value="<?= HtmlEncode($Page->ProcedureName->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureAmount->Visible) { // ProcedureAmount ?>
    <div id="r_ProcedureAmount" class="form-group row">
        <label id="elh_billing_voucher_ProcedureAmount" for="x_ProcedureAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_ProcedureAmount"><?= $Page->ProcedureAmount->caption() ?><?= $Page->ProcedureAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureAmount->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_ProcedureAmount"><span id="el_billing_voucher_ProcedureAmount">
<input type="<?= $Page->ProcedureAmount->getInputTextType() ?>" data-table="billing_voucher" data-field="x_ProcedureAmount" name="x_ProcedureAmount" id="x_ProcedureAmount" size="30" placeholder="<?= HtmlEncode($Page->ProcedureAmount->getPlaceHolder()) ?>" value="<?= $Page->ProcedureAmount->EditValue ?>"<?= $Page->ProcedureAmount->editAttributes() ?> aria-describedby="x_ProcedureAmount_help">
<?= $Page->ProcedureAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProcedureAmount->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_ProcedureAmount"><span id="el_billing_voucher_ProcedureAmount">
<span<?= $Page->ProcedureAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ProcedureAmount->getDisplayValue($Page->ProcedureAmount->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_ProcedureAmount" data-hidden="1" name="x_ProcedureAmount" id="x_ProcedureAmount" value="<?= HtmlEncode($Page->ProcedureAmount->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IncludePackage->Visible) { // IncludePackage ?>
    <div id="r_IncludePackage" class="form-group row">
        <label id="elh_billing_voucher_IncludePackage" for="x_IncludePackage" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_IncludePackage"><?= $Page->IncludePackage->caption() ?><?= $Page->IncludePackage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IncludePackage->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_IncludePackage"><span id="el_billing_voucher_IncludePackage">
<input type="<?= $Page->IncludePackage->getInputTextType() ?>" data-table="billing_voucher" data-field="x_IncludePackage" name="x_IncludePackage" id="x_IncludePackage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IncludePackage->getPlaceHolder()) ?>" value="<?= $Page->IncludePackage->EditValue ?>"<?= $Page->IncludePackage->editAttributes() ?> aria-describedby="x_IncludePackage_help">
<?= $Page->IncludePackage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IncludePackage->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_IncludePackage"><span id="el_billing_voucher_IncludePackage">
<span<?= $Page->IncludePackage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->IncludePackage->getDisplayValue($Page->IncludePackage->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_IncludePackage" data-hidden="1" name="x_IncludePackage" id="x_IncludePackage" value="<?= HtmlEncode($Page->IncludePackage->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelBill->Visible) { // CancelBill ?>
    <div id="r_CancelBill" class="form-group row">
        <label id="elh_billing_voucher_CancelBill" for="x_CancelBill" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_CancelBill"><?= $Page->CancelBill->caption() ?><?= $Page->CancelBill->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelBill->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_CancelBill"><span id="el_billing_voucher_CancelBill">
<input type="<?= $Page->CancelBill->getInputTextType() ?>" data-table="billing_voucher" data-field="x_CancelBill" name="x_CancelBill" id="x_CancelBill" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelBill->getPlaceHolder()) ?>" value="<?= $Page->CancelBill->EditValue ?>"<?= $Page->CancelBill->editAttributes() ?> aria-describedby="x_CancelBill_help">
<?= $Page->CancelBill->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelBill->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_CancelBill"><span id="el_billing_voucher_CancelBill">
<span<?= $Page->CancelBill->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelBill->getDisplayValue($Page->CancelBill->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_CancelBill" data-hidden="1" name="x_CancelBill" id="x_CancelBill" value="<?= HtmlEncode($Page->CancelBill->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelReason->Visible) { // CancelReason ?>
    <div id="r_CancelReason" class="form-group row">
        <label id="elh_billing_voucher_CancelReason" for="x_CancelReason" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_CancelReason"><?= $Page->CancelReason->caption() ?><?= $Page->CancelReason->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelReason->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_CancelReason"><span id="el_billing_voucher_CancelReason">
<input type="<?= $Page->CancelReason->getInputTextType() ?>" data-table="billing_voucher" data-field="x_CancelReason" name="x_CancelReason" id="x_CancelReason" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelReason->getPlaceHolder()) ?>" value="<?= $Page->CancelReason->EditValue ?>"<?= $Page->CancelReason->editAttributes() ?> aria-describedby="x_CancelReason_help">
<?= $Page->CancelReason->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelReason->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_CancelReason"><span id="el_billing_voucher_CancelReason">
<span<?= $Page->CancelReason->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelReason->getDisplayValue($Page->CancelReason->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_CancelReason" data-hidden="1" name="x_CancelReason" id="x_CancelReason" value="<?= HtmlEncode($Page->CancelReason->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
    <div id="r_CancelModeOfPayment" class="form-group row">
        <label id="elh_billing_voucher_CancelModeOfPayment" for="x_CancelModeOfPayment" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_CancelModeOfPayment"><?= $Page->CancelModeOfPayment->caption() ?><?= $Page->CancelModeOfPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelModeOfPayment->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_CancelModeOfPayment"><span id="el_billing_voucher_CancelModeOfPayment">
<input type="<?= $Page->CancelModeOfPayment->getInputTextType() ?>" data-table="billing_voucher" data-field="x_CancelModeOfPayment" name="x_CancelModeOfPayment" id="x_CancelModeOfPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelModeOfPayment->getPlaceHolder()) ?>" value="<?= $Page->CancelModeOfPayment->EditValue ?>"<?= $Page->CancelModeOfPayment->editAttributes() ?> aria-describedby="x_CancelModeOfPayment_help">
<?= $Page->CancelModeOfPayment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelModeOfPayment->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_CancelModeOfPayment"><span id="el_billing_voucher_CancelModeOfPayment">
<span<?= $Page->CancelModeOfPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelModeOfPayment->getDisplayValue($Page->CancelModeOfPayment->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_CancelModeOfPayment" data-hidden="1" name="x_CancelModeOfPayment" id="x_CancelModeOfPayment" value="<?= HtmlEncode($Page->CancelModeOfPayment->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelAmount->Visible) { // CancelAmount ?>
    <div id="r_CancelAmount" class="form-group row">
        <label id="elh_billing_voucher_CancelAmount" for="x_CancelAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_CancelAmount"><?= $Page->CancelAmount->caption() ?><?= $Page->CancelAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelAmount->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_CancelAmount"><span id="el_billing_voucher_CancelAmount">
<input type="<?= $Page->CancelAmount->getInputTextType() ?>" data-table="billing_voucher" data-field="x_CancelAmount" name="x_CancelAmount" id="x_CancelAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelAmount->getPlaceHolder()) ?>" value="<?= $Page->CancelAmount->EditValue ?>"<?= $Page->CancelAmount->editAttributes() ?> aria-describedby="x_CancelAmount_help">
<?= $Page->CancelAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelAmount->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_CancelAmount"><span id="el_billing_voucher_CancelAmount">
<span<?= $Page->CancelAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelAmount->getDisplayValue($Page->CancelAmount->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_CancelAmount" data-hidden="1" name="x_CancelAmount" id="x_CancelAmount" value="<?= HtmlEncode($Page->CancelAmount->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelBankName->Visible) { // CancelBankName ?>
    <div id="r_CancelBankName" class="form-group row">
        <label id="elh_billing_voucher_CancelBankName" for="x_CancelBankName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_CancelBankName"><?= $Page->CancelBankName->caption() ?><?= $Page->CancelBankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelBankName->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_CancelBankName"><span id="el_billing_voucher_CancelBankName">
<input type="<?= $Page->CancelBankName->getInputTextType() ?>" data-table="billing_voucher" data-field="x_CancelBankName" name="x_CancelBankName" id="x_CancelBankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelBankName->getPlaceHolder()) ?>" value="<?= $Page->CancelBankName->EditValue ?>"<?= $Page->CancelBankName->editAttributes() ?> aria-describedby="x_CancelBankName_help">
<?= $Page->CancelBankName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelBankName->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_CancelBankName"><span id="el_billing_voucher_CancelBankName">
<span<?= $Page->CancelBankName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelBankName->getDisplayValue($Page->CancelBankName->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_CancelBankName" data-hidden="1" name="x_CancelBankName" id="x_CancelBankName" value="<?= HtmlEncode($Page->CancelBankName->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
    <div id="r_CancelTransactionNumber" class="form-group row">
        <label id="elh_billing_voucher_CancelTransactionNumber" for="x_CancelTransactionNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_CancelTransactionNumber"><?= $Page->CancelTransactionNumber->caption() ?><?= $Page->CancelTransactionNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelTransactionNumber->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_CancelTransactionNumber"><span id="el_billing_voucher_CancelTransactionNumber">
<input type="<?= $Page->CancelTransactionNumber->getInputTextType() ?>" data-table="billing_voucher" data-field="x_CancelTransactionNumber" name="x_CancelTransactionNumber" id="x_CancelTransactionNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelTransactionNumber->getPlaceHolder()) ?>" value="<?= $Page->CancelTransactionNumber->EditValue ?>"<?= $Page->CancelTransactionNumber->editAttributes() ?> aria-describedby="x_CancelTransactionNumber_help">
<?= $Page->CancelTransactionNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelTransactionNumber->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_CancelTransactionNumber"><span id="el_billing_voucher_CancelTransactionNumber">
<span<?= $Page->CancelTransactionNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CancelTransactionNumber->getDisplayValue($Page->CancelTransactionNumber->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_CancelTransactionNumber" data-hidden="1" name="x_CancelTransactionNumber" id="x_CancelTransactionNumber" value="<?= HtmlEncode($Page->CancelTransactionNumber->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LabTest->Visible) { // LabTest ?>
    <div id="r_LabTest" class="form-group row">
        <label id="elh_billing_voucher_LabTest" for="x_LabTest" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_LabTest"><?= $Page->LabTest->caption() ?><?= $Page->LabTest->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LabTest->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_LabTest"><span id="el_billing_voucher_LabTest">
<input type="<?= $Page->LabTest->getInputTextType() ?>" data-table="billing_voucher" data-field="x_LabTest" name="x_LabTest" id="x_LabTest" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LabTest->getPlaceHolder()) ?>" value="<?= $Page->LabTest->EditValue ?>"<?= $Page->LabTest->editAttributes() ?> aria-describedby="x_LabTest_help">
<?= $Page->LabTest->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LabTest->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_LabTest"><span id="el_billing_voucher_LabTest">
<span<?= $Page->LabTest->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->LabTest->getDisplayValue($Page->LabTest->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_LabTest" data-hidden="1" name="x_LabTest" id="x_LabTest" value="<?= HtmlEncode($Page->LabTest->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
    <div id="r_sid" class="form-group row">
        <label id="elh_billing_voucher_sid" for="x_sid" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_sid"><?= $Page->sid->caption() ?><?= $Page->sid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->sid->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_sid"><span id="el_billing_voucher_sid">
<input type="<?= $Page->sid->getInputTextType() ?>" data-table="billing_voucher" data-field="x_sid" name="x_sid" id="x_sid" size="30" placeholder="<?= HtmlEncode($Page->sid->getPlaceHolder()) ?>" value="<?= $Page->sid->EditValue ?>"<?= $Page->sid->editAttributes() ?> aria-describedby="x_sid_help">
<?= $Page->sid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->sid->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_sid"><span id="el_billing_voucher_sid">
<span<?= $Page->sid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->sid->getDisplayValue($Page->sid->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_sid" data-hidden="1" name="x_sid" id="x_sid" value="<?= HtmlEncode($Page->sid->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SidNo->Visible) { // SidNo ?>
    <div id="r_SidNo" class="form-group row">
        <label id="elh_billing_voucher_SidNo" for="x_SidNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_SidNo"><?= $Page->SidNo->caption() ?><?= $Page->SidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SidNo->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_SidNo"><span id="el_billing_voucher_SidNo">
<input type="<?= $Page->SidNo->getInputTextType() ?>" data-table="billing_voucher" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SidNo->getPlaceHolder()) ?>" value="<?= $Page->SidNo->EditValue ?>"<?= $Page->SidNo->editAttributes() ?> aria-describedby="x_SidNo_help">
<?= $Page->SidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SidNo->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_SidNo"><span id="el_billing_voucher_SidNo">
<span<?= $Page->SidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->SidNo->getDisplayValue($Page->SidNo->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_SidNo" data-hidden="1" name="x_SidNo" id="x_SidNo" value="<?= HtmlEncode($Page->SidNo->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LabTestReleased->Visible) { // LabTestReleased ?>
    <div id="r_LabTestReleased" class="form-group row">
        <label id="elh_billing_voucher_LabTestReleased" for="x_LabTestReleased" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_LabTestReleased"><?= $Page->LabTestReleased->caption() ?><?= $Page->LabTestReleased->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LabTestReleased->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_LabTestReleased"><span id="el_billing_voucher_LabTestReleased">
<input type="<?= $Page->LabTestReleased->getInputTextType() ?>" data-table="billing_voucher" data-field="x_LabTestReleased" name="x_LabTestReleased" id="x_LabTestReleased" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LabTestReleased->getPlaceHolder()) ?>" value="<?= $Page->LabTestReleased->EditValue ?>"<?= $Page->LabTestReleased->editAttributes() ?> aria-describedby="x_LabTestReleased_help">
<?= $Page->LabTestReleased->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LabTestReleased->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_LabTestReleased"><span id="el_billing_voucher_LabTestReleased">
<span<?= $Page->LabTestReleased->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->LabTestReleased->getDisplayValue($Page->LabTestReleased->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_LabTestReleased" data-hidden="1" name="x_LabTestReleased" id="x_LabTestReleased" value="<?= HtmlEncode($Page->LabTestReleased->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GoogleReviewID->Visible) { // GoogleReviewID ?>
    <div id="r_GoogleReviewID" class="form-group row">
        <label id="elh_billing_voucher_GoogleReviewID" for="x_GoogleReviewID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_GoogleReviewID"><?= $Page->GoogleReviewID->caption() ?><?= $Page->GoogleReviewID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GoogleReviewID->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_GoogleReviewID"><span id="el_billing_voucher_GoogleReviewID">
<input type="<?= $Page->GoogleReviewID->getInputTextType() ?>" data-table="billing_voucher" data-field="x_GoogleReviewID" name="x_GoogleReviewID" id="x_GoogleReviewID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GoogleReviewID->getPlaceHolder()) ?>" value="<?= $Page->GoogleReviewID->EditValue ?>"<?= $Page->GoogleReviewID->editAttributes() ?> aria-describedby="x_GoogleReviewID_help">
<?= $Page->GoogleReviewID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GoogleReviewID->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_GoogleReviewID"><span id="el_billing_voucher_GoogleReviewID">
<span<?= $Page->GoogleReviewID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->GoogleReviewID->getDisplayValue($Page->GoogleReviewID->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_GoogleReviewID" data-hidden="1" name="x_GoogleReviewID" id="x_GoogleReviewID" value="<?= HtmlEncode($Page->GoogleReviewID->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CardType->Visible) { // CardType ?>
    <div id="r_CardType" class="form-group row">
        <label id="elh_billing_voucher_CardType" for="x_CardType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_CardType"><?= $Page->CardType->caption() ?><?= $Page->CardType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CardType->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_CardType"><span id="el_billing_voucher_CardType">
<input type="<?= $Page->CardType->getInputTextType() ?>" data-table="billing_voucher" data-field="x_CardType" name="x_CardType" id="x_CardType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CardType->getPlaceHolder()) ?>" value="<?= $Page->CardType->EditValue ?>"<?= $Page->CardType->editAttributes() ?> aria-describedby="x_CardType_help">
<?= $Page->CardType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CardType->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_CardType"><span id="el_billing_voucher_CardType">
<span<?= $Page->CardType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CardType->getDisplayValue($Page->CardType->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_CardType" data-hidden="1" name="x_CardType" id="x_CardType" value="<?= HtmlEncode($Page->CardType->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PharmacyBill->Visible) { // PharmacyBill ?>
    <div id="r_PharmacyBill" class="form-group row">
        <label id="elh_billing_voucher_PharmacyBill" for="x_PharmacyBill" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_PharmacyBill"><?= $Page->PharmacyBill->caption() ?><?= $Page->PharmacyBill->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PharmacyBill->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_PharmacyBill"><span id="el_billing_voucher_PharmacyBill">
<input type="<?= $Page->PharmacyBill->getInputTextType() ?>" data-table="billing_voucher" data-field="x_PharmacyBill" name="x_PharmacyBill" id="x_PharmacyBill" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PharmacyBill->getPlaceHolder()) ?>" value="<?= $Page->PharmacyBill->EditValue ?>"<?= $Page->PharmacyBill->editAttributes() ?> aria-describedby="x_PharmacyBill_help">
<?= $Page->PharmacyBill->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PharmacyBill->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_PharmacyBill"><span id="el_billing_voucher_PharmacyBill">
<span<?= $Page->PharmacyBill->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PharmacyBill->getDisplayValue($Page->PharmacyBill->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_PharmacyBill" data-hidden="1" name="x_PharmacyBill" id="x_PharmacyBill" value="<?= HtmlEncode($Page->PharmacyBill->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
    <div id="r_DiscountAmount" class="form-group row">
        <label id="elh_billing_voucher_DiscountAmount" for="x_DiscountAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_DiscountAmount"><?= $Page->DiscountAmount->caption() ?><?= $Page->DiscountAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DiscountAmount->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_DiscountAmount"><span id="el_billing_voucher_DiscountAmount">
<input type="<?= $Page->DiscountAmount->getInputTextType() ?>" data-table="billing_voucher" data-field="x_DiscountAmount" name="x_DiscountAmount" id="x_DiscountAmount" size="30" placeholder="<?= HtmlEncode($Page->DiscountAmount->getPlaceHolder()) ?>" value="<?= $Page->DiscountAmount->EditValue ?>"<?= $Page->DiscountAmount->editAttributes() ?> aria-describedby="x_DiscountAmount_help">
<?= $Page->DiscountAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DiscountAmount->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_DiscountAmount"><span id="el_billing_voucher_DiscountAmount">
<span<?= $Page->DiscountAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->DiscountAmount->getDisplayValue($Page->DiscountAmount->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_DiscountAmount" data-hidden="1" name="x_DiscountAmount" id="x_DiscountAmount" value="<?= HtmlEncode($Page->DiscountAmount->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
    <div id="r_Cash" class="form-group row">
        <label id="elh_billing_voucher_Cash" for="x_Cash" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_Cash"><?= $Page->Cash->caption() ?><?= $Page->Cash->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Cash->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_Cash"><span id="el_billing_voucher_Cash">
<input type="<?= $Page->Cash->getInputTextType() ?>" data-table="billing_voucher" data-field="x_Cash" name="x_Cash" id="x_Cash" size="30" placeholder="<?= HtmlEncode($Page->Cash->getPlaceHolder()) ?>" value="<?= $Page->Cash->EditValue ?>"<?= $Page->Cash->editAttributes() ?> aria-describedby="x_Cash_help">
<?= $Page->Cash->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Cash->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_Cash"><span id="el_billing_voucher_Cash">
<span<?= $Page->Cash->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Cash->getDisplayValue($Page->Cash->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_Cash" data-hidden="1" name="x_Cash" id="x_Cash" value="<?= HtmlEncode($Page->Cash->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
    <div id="r_Card" class="form-group row">
        <label id="elh_billing_voucher_Card" for="x_Card" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_billing_voucher_Card"><?= $Page->Card->caption() ?><?= $Page->Card->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Card->cellAttributes() ?>>
<?php if (!$Page->isConfirm()) { ?>
<template id="tpx_billing_voucher_Card"><span id="el_billing_voucher_Card">
<input type="<?= $Page->Card->getInputTextType() ?>" data-table="billing_voucher" data-field="x_Card" name="x_Card" id="x_Card" size="30" placeholder="<?= HtmlEncode($Page->Card->getPlaceHolder()) ?>" value="<?= $Page->Card->EditValue ?>"<?= $Page->Card->editAttributes() ?> aria-describedby="x_Card_help">
<?= $Page->Card->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Card->getErrorMessage() ?></div>
</span></template>
<?php } else { ?>
<template id="tpx_billing_voucher_Card"><span id="el_billing_voucher_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Card->getDisplayValue($Page->Card->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="billing_voucher" data-field="x_Card" data-hidden="1" name="x_Card" id="x_Card" value="<?= HtmlEncode($Page->Card->FormValue) ?>">
<?php } ?>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_billing_voucheredit" class="ew-custom-template"></div>
<template id="tpm_billing_voucheredit">
<div id="ct_BillingVoucherEdit"><style>
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
<div class="row">
	<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_billing_voucher_PatId"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_PatId"></slot></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_billing_voucher_RIDNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_RIDNO"></slot></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_billing_voucher_CId"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_CId"></slot></h3>
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
		<td><slot class="ew-slot" name="tpc_billing_voucher_PatientId"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_PatientId"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_voucher_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_PatientName"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_voucher_Mobile"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_Mobile"></slot></td>
		</tr>
		<tr>
			<td><slot class="ew-slot" name="tpc_billing_voucher_Dob"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_Dob"></slot></td>
		<td><slot class="ew-slot" name="tpc_billing_voucher_Age"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_Age"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_voucher_Gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_Gender"></slot></td>
		</tr>
		<tr>
			<td><slot class="ew-slot" name="tpc_billing_voucher_PartnerName"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_PartnerName"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_voucher_PayerType"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_PayerType"></slot></td>
			<td></td>
		</tr>
		 <tr>
			<td><slot class="ew-slot" name="tpc_billing_voucher_Doctor"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_Doctor"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_voucher_DrDepartment"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_DrDepartment"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_voucher_RefferedBy"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_RefferedBy"></slot></td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div id="LoadGetOPAdvance"> </div>
<slot class="ew-slot" name="tpc_billing_voucher_ReportHeader"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_ReportHeader"></slot>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#D68910">
				<h3 class="card-title">Payment Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
			<td><slot class="ew-slot" name="tpc_billing_voucher_ModeofPayment"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_ModeofPayment"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_voucher_Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_Amount"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_voucher_AnyDues"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_AnyDues"></slot></td>
		</tr>
		<tr>
			<td><slot class="ew-slot" name="tpc_billing_voucher_DiscountRemarks"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_DiscountRemarks"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_voucher_Remarks"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_Remarks"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_voucher_AdjustmentAdvance"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_AdjustmentAdvance"></slot></td>
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
			<div class="card-header"  style="background-color:#E706B7">
				<h3 id="viewBankDetails" class="card-title">BankName</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
			<td><slot class="ew-slot" name="tpc_billing_voucher_CardNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_CardNumber"></slot></td>
			<td><slot class="ew-slot" name="tpc_billing_voucher_BankName"></slot>&nbsp;<slot class="ew-slot" name="tpx_billing_voucher_BankName"></slot></td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
</div>
</template>
<?php
    if (in_array("patient_services", explode(",", $Page->getCurrentDetailTable())) && $patient_services->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientServicesGrid.php" ?>
<?php } ?>
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
    ew.applyTemplate("tpd_billing_voucheredit", "tpm_billing_voucheredit", "billing_voucheredit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("billing_voucher");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewBillingVoucherPrintEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_billing_voucher_printedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fview_billing_voucher_printedit = currentForm = new ew.Form("fview_billing_voucher_printedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_billing_voucher_print")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_billing_voucher_print)
        ew.vars.tables.view_billing_voucher_print = currentTable;
    fview_billing_voucher_printedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
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
        ["Amount", [fields.Amount.visible && fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null], fields.Amount.isInvalid],
        ["AnyDues", [fields.AnyDues.visible && fields.AnyDues.required ? ew.Validators.required(fields.AnyDues.caption) : null], fields.AnyDues.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["RealizationAmount", [fields.RealizationAmount.visible && fields.RealizationAmount.required ? ew.Validators.required(fields.RealizationAmount.caption) : null], fields.RealizationAmount.isInvalid],
        ["RealizationStatus", [fields.RealizationStatus.visible && fields.RealizationStatus.required ? ew.Validators.required(fields.RealizationStatus.caption) : null], fields.RealizationStatus.isInvalid],
        ["RealizationRemarks", [fields.RealizationRemarks.visible && fields.RealizationRemarks.required ? ew.Validators.required(fields.RealizationRemarks.caption) : null], fields.RealizationRemarks.isInvalid],
        ["RealizationBatchNo", [fields.RealizationBatchNo.visible && fields.RealizationBatchNo.required ? ew.Validators.required(fields.RealizationBatchNo.caption) : null], fields.RealizationBatchNo.isInvalid],
        ["RealizationDate", [fields.RealizationDate.visible && fields.RealizationDate.required ? ew.Validators.required(fields.RealizationDate.caption) : null], fields.RealizationDate.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["RIDNO", [fields.RIDNO.visible && fields.RIDNO.required ? ew.Validators.required(fields.RIDNO.caption) : null], fields.RIDNO.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null], fields.TidNo.isInvalid],
        ["CId", [fields.CId.visible && fields.CId.required ? ew.Validators.required(fields.CId.caption) : null], fields.CId.isInvalid],
        ["PartnerName", [fields.PartnerName.visible && fields.PartnerName.required ? ew.Validators.required(fields.PartnerName.caption) : null], fields.PartnerName.isInvalid],
        ["PayerType", [fields.PayerType.visible && fields.PayerType.required ? ew.Validators.required(fields.PayerType.caption) : null], fields.PayerType.isInvalid],
        ["Dob", [fields.Dob.visible && fields.Dob.required ? ew.Validators.required(fields.Dob.caption) : null], fields.Dob.isInvalid],
        ["Currency", [fields.Currency.visible && fields.Currency.required ? ew.Validators.required(fields.Currency.caption) : null], fields.Currency.isInvalid],
        ["DiscountRemarks", [fields.DiscountRemarks.visible && fields.DiscountRemarks.required ? ew.Validators.required(fields.DiscountRemarks.caption) : null], fields.DiscountRemarks.isInvalid],
        ["Remarks", [fields.Remarks.visible && fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid],
        ["PatId", [fields.PatId.visible && fields.PatId.required ? ew.Validators.required(fields.PatId.caption) : null], fields.PatId.isInvalid],
        ["DrDepartment", [fields.DrDepartment.visible && fields.DrDepartment.required ? ew.Validators.required(fields.DrDepartment.caption) : null], fields.DrDepartment.isInvalid],
        ["RefferedBy", [fields.RefferedBy.visible && fields.RefferedBy.required ? ew.Validators.required(fields.RefferedBy.caption) : null], fields.RefferedBy.isInvalid],
        ["BillNumber", [fields.BillNumber.visible && fields.BillNumber.required ? ew.Validators.required(fields.BillNumber.caption) : null], fields.BillNumber.isInvalid],
        ["CardNumber", [fields.CardNumber.visible && fields.CardNumber.required ? ew.Validators.required(fields.CardNumber.caption) : null], fields.CardNumber.isInvalid],
        ["BankName", [fields.BankName.visible && fields.BankName.required ? ew.Validators.required(fields.BankName.caption) : null], fields.BankName.isInvalid],
        ["DrID", [fields.DrID.visible && fields.DrID.required ? ew.Validators.required(fields.DrID.caption) : null], fields.DrID.isInvalid],
        ["BillStatus", [fields.BillStatus.visible && fields.BillStatus.required ? ew.Validators.required(fields.BillStatus.caption) : null], fields.BillStatus.isInvalid],
        ["ReportHeader", [fields.ReportHeader.visible && fields.ReportHeader.required ? ew.Validators.required(fields.ReportHeader.caption) : null], fields.ReportHeader.isInvalid],
        ["_UserName", [fields._UserName.visible && fields._UserName.required ? ew.Validators.required(fields._UserName.caption) : null], fields._UserName.isInvalid],
        ["AdjustmentAdvance", [fields.AdjustmentAdvance.visible && fields.AdjustmentAdvance.required ? ew.Validators.required(fields.AdjustmentAdvance.caption) : null], fields.AdjustmentAdvance.isInvalid],
        ["billing_vouchercol", [fields.billing_vouchercol.visible && fields.billing_vouchercol.required ? ew.Validators.required(fields.billing_vouchercol.caption) : null], fields.billing_vouchercol.isInvalid],
        ["BillType", [fields.BillType.visible && fields.BillType.required ? ew.Validators.required(fields.BillType.caption) : null], fields.BillType.isInvalid],
        ["ProcedureName", [fields.ProcedureName.visible && fields.ProcedureName.required ? ew.Validators.required(fields.ProcedureName.caption) : null], fields.ProcedureName.isInvalid],
        ["ProcedureAmount", [fields.ProcedureAmount.visible && fields.ProcedureAmount.required ? ew.Validators.required(fields.ProcedureAmount.caption) : null], fields.ProcedureAmount.isInvalid],
        ["IncludePackage", [fields.IncludePackage.visible && fields.IncludePackage.required ? ew.Validators.required(fields.IncludePackage.caption) : null], fields.IncludePackage.isInvalid],
        ["CancelBill", [fields.CancelBill.visible && fields.CancelBill.required ? ew.Validators.required(fields.CancelBill.caption) : null], fields.CancelBill.isInvalid],
        ["CancelReason", [fields.CancelReason.visible && fields.CancelReason.required ? ew.Validators.required(fields.CancelReason.caption) : null], fields.CancelReason.isInvalid],
        ["CancelModeOfPayment", [fields.CancelModeOfPayment.visible && fields.CancelModeOfPayment.required ? ew.Validators.required(fields.CancelModeOfPayment.caption) : null], fields.CancelModeOfPayment.isInvalid],
        ["CancelAmount", [fields.CancelAmount.visible && fields.CancelAmount.required ? ew.Validators.required(fields.CancelAmount.caption) : null], fields.CancelAmount.isInvalid],
        ["CancelBankName", [fields.CancelBankName.visible && fields.CancelBankName.required ? ew.Validators.required(fields.CancelBankName.caption) : null], fields.CancelBankName.isInvalid],
        ["CancelTransactionNumber", [fields.CancelTransactionNumber.visible && fields.CancelTransactionNumber.required ? ew.Validators.required(fields.CancelTransactionNumber.caption) : null], fields.CancelTransactionNumber.isInvalid],
        ["LabTest", [fields.LabTest.visible && fields.LabTest.required ? ew.Validators.required(fields.LabTest.caption) : null], fields.LabTest.isInvalid],
        ["sid", [fields.sid.visible && fields.sid.required ? ew.Validators.required(fields.sid.caption) : null, ew.Validators.integer], fields.sid.isInvalid],
        ["SidNo", [fields.SidNo.visible && fields.SidNo.required ? ew.Validators.required(fields.SidNo.caption) : null], fields.SidNo.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_billing_voucher_printedit,
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
    fview_billing_voucher_printedit.validate = function () {
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
    fview_billing_voucher_printedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_billing_voucher_printedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_billing_voucher_printedit.lists.CancelBill = <?= $Page->CancelBill->toClientList($Page) ?>;
    loadjs.done("fview_billing_voucher_printedit");
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
<form name="fview_billing_voucher_printedit" id="fview_billing_voucher_printedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher_print">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_view_billing_voucher_print_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_id"><span id="el_view_billing_voucher_print_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_view_billing_voucher_print_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Reception"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Reception"><span id="el_view_billing_voucher_print_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Reception->getDisplayValue($Page->Reception->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Reception" data-hidden="1" name="x_Reception" id="x_Reception" value="<?= HtmlEncode($Page->Reception->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_view_billing_voucher_print_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_PatientId"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_PatientId"><span id="el_view_billing_voucher_print_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientId->getDisplayValue($Page->PatientId->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PatientId" data-hidden="1" name="x_PatientId" id="x_PatientId" value="<?= HtmlEncode($Page->PatientId->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_view_billing_voucher_print_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_mrnno"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_mrnno"><span id="el_view_billing_voucher_print_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_mrnno" data-hidden="1" name="x_mrnno" id="x_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_view_billing_voucher_print_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_PatientName"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_PatientName"><span id="el_view_billing_voucher_print_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientName->getDisplayValue($Page->PatientName->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PatientName" data-hidden="1" name="x_PatientName" id="x_PatientName" value="<?= HtmlEncode($Page->PatientName->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_view_billing_voucher_print_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Age"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Age"><span id="el_view_billing_voucher_print_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Age->getDisplayValue($Page->Age->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Age" data-hidden="1" name="x_Age" id="x_Age" value="<?= HtmlEncode($Page->Age->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_view_billing_voucher_print_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Gender"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Gender"><span id="el_view_billing_voucher_print_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Gender->getDisplayValue($Page->Gender->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Gender" data-hidden="1" name="x_Gender" id="x_Gender" value="<?= HtmlEncode($Page->Gender->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_view_billing_voucher_print_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_profilePic"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_profilePic"><span id="el_view_billing_voucher_print_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->EditValue ?></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_profilePic" data-hidden="1" name="x_profilePic" id="x_profilePic" value="<?= HtmlEncode($Page->profilePic->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <div id="r_Mobile" class="form-group row">
        <label id="elh_view_billing_voucher_print_Mobile" for="x_Mobile" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Mobile"><?= $Page->Mobile->caption() ?><?= $Page->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mobile->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Mobile"><span id="el_view_billing_voucher_print_Mobile">
<span<?= $Page->Mobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Mobile->getDisplayValue($Page->Mobile->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Mobile" data-hidden="1" name="x_Mobile" id="x_Mobile" value="<?= HtmlEncode($Page->Mobile->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IP_OP->Visible) { // IP_OP ?>
    <div id="r_IP_OP" class="form-group row">
        <label id="elh_view_billing_voucher_print_IP_OP" for="x_IP_OP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_IP_OP"><?= $Page->IP_OP->caption() ?><?= $Page->IP_OP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IP_OP->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_IP_OP"><span id="el_view_billing_voucher_print_IP_OP">
<span<?= $Page->IP_OP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->IP_OP->getDisplayValue($Page->IP_OP->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_IP_OP" data-hidden="1" name="x_IP_OP" id="x_IP_OP" value="<?= HtmlEncode($Page->IP_OP->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
    <div id="r_Doctor" class="form-group row">
        <label id="elh_view_billing_voucher_print_Doctor" for="x_Doctor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Doctor"><?= $Page->Doctor->caption() ?><?= $Page->Doctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Doctor->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Doctor"><span id="el_view_billing_voucher_print_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Doctor->getDisplayValue($Page->Doctor->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Doctor" data-hidden="1" name="x_Doctor" id="x_Doctor" value="<?= HtmlEncode($Page->Doctor->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <div id="r_voucher_type" class="form-group row">
        <label id="elh_view_billing_voucher_print_voucher_type" for="x_voucher_type" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_voucher_type"><?= $Page->voucher_type->caption() ?><?= $Page->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->voucher_type->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_voucher_type"><span id="el_view_billing_voucher_print_voucher_type">
<span<?= $Page->voucher_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->voucher_type->getDisplayValue($Page->voucher_type->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_voucher_type" data-hidden="1" name="x_voucher_type" id="x_voucher_type" value="<?= HtmlEncode($Page->voucher_type->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <div id="r_Details" class="form-group row">
        <label id="elh_view_billing_voucher_print_Details" for="x_Details" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Details"><?= $Page->Details->caption() ?><?= $Page->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Details->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Details"><span id="el_view_billing_voucher_print_Details">
<span<?= $Page->Details->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Details->getDisplayValue($Page->Details->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Details" data-hidden="1" name="x_Details" id="x_Details" value="<?= HtmlEncode($Page->Details->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <div id="r_ModeofPayment" class="form-group row">
        <label id="elh_view_billing_voucher_print_ModeofPayment" for="x_ModeofPayment" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_ModeofPayment"><?= $Page->ModeofPayment->caption() ?><?= $Page->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModeofPayment->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_ModeofPayment"><span id="el_view_billing_voucher_print_ModeofPayment">
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ModeofPayment->getDisplayValue($Page->ModeofPayment->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_ModeofPayment" data-hidden="1" name="x_ModeofPayment" id="x_ModeofPayment" value="<?= HtmlEncode($Page->ModeofPayment->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label id="elh_view_billing_voucher_print_Amount" for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Amount"><?= $Page->Amount->caption() ?><?= $Page->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Amount"><span id="el_view_billing_voucher_print_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Amount->getDisplayValue($Page->Amount->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Amount" data-hidden="1" name="x_Amount" id="x_Amount" value="<?= HtmlEncode($Page->Amount->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
    <div id="r_AnyDues" class="form-group row">
        <label id="elh_view_billing_voucher_print_AnyDues" for="x_AnyDues" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_AnyDues"><?= $Page->AnyDues->caption() ?><?= $Page->AnyDues->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnyDues->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_AnyDues"><span id="el_view_billing_voucher_print_AnyDues">
<span<?= $Page->AnyDues->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->AnyDues->getDisplayValue($Page->AnyDues->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_AnyDues" data-hidden="1" name="x_AnyDues" id="x_AnyDues" value="<?= HtmlEncode($Page->AnyDues->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
    <div id="r_RealizationAmount" class="form-group row">
        <label id="elh_view_billing_voucher_print_RealizationAmount" for="x_RealizationAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_RealizationAmount"><?= $Page->RealizationAmount->caption() ?><?= $Page->RealizationAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationAmount->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_RealizationAmount"><span id="el_view_billing_voucher_print_RealizationAmount">
<span<?= $Page->RealizationAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RealizationAmount->getDisplayValue($Page->RealizationAmount->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_RealizationAmount" data-hidden="1" name="x_RealizationAmount" id="x_RealizationAmount" value="<?= HtmlEncode($Page->RealizationAmount->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationStatus->Visible) { // RealizationStatus ?>
    <div id="r_RealizationStatus" class="form-group row">
        <label id="elh_view_billing_voucher_print_RealizationStatus" for="x_RealizationStatus" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_RealizationStatus"><?= $Page->RealizationStatus->caption() ?><?= $Page->RealizationStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationStatus->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_RealizationStatus"><span id="el_view_billing_voucher_print_RealizationStatus">
<span<?= $Page->RealizationStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RealizationStatus->getDisplayValue($Page->RealizationStatus->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_RealizationStatus" data-hidden="1" name="x_RealizationStatus" id="x_RealizationStatus" value="<?= HtmlEncode($Page->RealizationStatus->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationRemarks->Visible) { // RealizationRemarks ?>
    <div id="r_RealizationRemarks" class="form-group row">
        <label id="elh_view_billing_voucher_print_RealizationRemarks" for="x_RealizationRemarks" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_RealizationRemarks"><?= $Page->RealizationRemarks->caption() ?><?= $Page->RealizationRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationRemarks->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_RealizationRemarks"><span id="el_view_billing_voucher_print_RealizationRemarks">
<span<?= $Page->RealizationRemarks->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RealizationRemarks->getDisplayValue($Page->RealizationRemarks->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_RealizationRemarks" data-hidden="1" name="x_RealizationRemarks" id="x_RealizationRemarks" value="<?= HtmlEncode($Page->RealizationRemarks->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
    <div id="r_RealizationBatchNo" class="form-group row">
        <label id="elh_view_billing_voucher_print_RealizationBatchNo" for="x_RealizationBatchNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_RealizationBatchNo"><?= $Page->RealizationBatchNo->caption() ?><?= $Page->RealizationBatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationBatchNo->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_RealizationBatchNo"><span id="el_view_billing_voucher_print_RealizationBatchNo">
<span<?= $Page->RealizationBatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RealizationBatchNo->getDisplayValue($Page->RealizationBatchNo->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_RealizationBatchNo" data-hidden="1" name="x_RealizationBatchNo" id="x_RealizationBatchNo" value="<?= HtmlEncode($Page->RealizationBatchNo->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationDate->Visible) { // RealizationDate ?>
    <div id="r_RealizationDate" class="form-group row">
        <label id="elh_view_billing_voucher_print_RealizationDate" for="x_RealizationDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_RealizationDate"><?= $Page->RealizationDate->caption() ?><?= $Page->RealizationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationDate->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_RealizationDate"><span id="el_view_billing_voucher_print_RealizationDate">
<span<?= $Page->RealizationDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RealizationDate->getDisplayValue($Page->RealizationDate->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_RealizationDate" data-hidden="1" name="x_RealizationDate" id="x_RealizationDate" value="<?= HtmlEncode($Page->RealizationDate->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <div id="r_RIDNO" class="form-group row">
        <label id="elh_view_billing_voucher_print_RIDNO" for="x_RIDNO" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_RIDNO"><?= $Page->RIDNO->caption() ?><?= $Page->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNO->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_RIDNO"><span id="el_view_billing_voucher_print_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RIDNO->getDisplayValue($Page->RIDNO->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_RIDNO" data-hidden="1" name="x_RIDNO" id="x_RIDNO" value="<?= HtmlEncode($Page->RIDNO->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_view_billing_voucher_print_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_TidNo"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_TidNo"><span id="el_view_billing_voucher_print_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->TidNo->getDisplayValue($Page->TidNo->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_TidNo" data-hidden="1" name="x_TidNo" id="x_TidNo" value="<?= HtmlEncode($Page->TidNo->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
    <div id="r_CId" class="form-group row">
        <label id="elh_view_billing_voucher_print_CId" for="x_CId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_CId"><?= $Page->CId->caption() ?><?= $Page->CId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CId->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_CId"><span id="el_view_billing_voucher_print_CId">
<span<?= $Page->CId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CId->getDisplayValue($Page->CId->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CId" data-hidden="1" name="x_CId" id="x_CId" value="<?= HtmlEncode($Page->CId->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <div id="r_PartnerName" class="form-group row">
        <label id="elh_view_billing_voucher_print_PartnerName" for="x_PartnerName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_PartnerName"><?= $Page->PartnerName->caption() ?><?= $Page->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerName->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_PartnerName"><span id="el_view_billing_voucher_print_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PartnerName->getDisplayValue($Page->PartnerName->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PartnerName" data-hidden="1" name="x_PartnerName" id="x_PartnerName" value="<?= HtmlEncode($Page->PartnerName->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PayerType->Visible) { // PayerType ?>
    <div id="r_PayerType" class="form-group row">
        <label id="elh_view_billing_voucher_print_PayerType" for="x_PayerType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_PayerType"><?= $Page->PayerType->caption() ?><?= $Page->PayerType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PayerType->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_PayerType"><span id="el_view_billing_voucher_print_PayerType">
<span<?= $Page->PayerType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PayerType->getDisplayValue($Page->PayerType->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PayerType" data-hidden="1" name="x_PayerType" id="x_PayerType" value="<?= HtmlEncode($Page->PayerType->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Dob->Visible) { // Dob ?>
    <div id="r_Dob" class="form-group row">
        <label id="elh_view_billing_voucher_print_Dob" for="x_Dob" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Dob"><?= $Page->Dob->caption() ?><?= $Page->Dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Dob->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Dob"><span id="el_view_billing_voucher_print_Dob">
<span<?= $Page->Dob->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Dob->getDisplayValue($Page->Dob->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Dob" data-hidden="1" name="x_Dob" id="x_Dob" value="<?= HtmlEncode($Page->Dob->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <div id="r_Currency" class="form-group row">
        <label id="elh_view_billing_voucher_print_Currency" for="x_Currency" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Currency"><?= $Page->Currency->caption() ?><?= $Page->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Currency->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Currency"><span id="el_view_billing_voucher_print_Currency">
<span<?= $Page->Currency->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Currency->getDisplayValue($Page->Currency->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Currency" data-hidden="1" name="x_Currency" id="x_Currency" value="<?= HtmlEncode($Page->Currency->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DiscountRemarks->Visible) { // DiscountRemarks ?>
    <div id="r_DiscountRemarks" class="form-group row">
        <label id="elh_view_billing_voucher_print_DiscountRemarks" for="x_DiscountRemarks" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_DiscountRemarks"><?= $Page->DiscountRemarks->caption() ?><?= $Page->DiscountRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DiscountRemarks->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_DiscountRemarks"><span id="el_view_billing_voucher_print_DiscountRemarks">
<span<?= $Page->DiscountRemarks->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->DiscountRemarks->getDisplayValue($Page->DiscountRemarks->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_DiscountRemarks" data-hidden="1" name="x_DiscountRemarks" id="x_DiscountRemarks" value="<?= HtmlEncode($Page->DiscountRemarks->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label id="elh_view_billing_voucher_print_Remarks" for="x_Remarks" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Remarks"><?= $Page->Remarks->caption() ?><?= $Page->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Remarks->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Remarks"><span id="el_view_billing_voucher_print_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->EditValue ?></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_Remarks" data-hidden="1" name="x_Remarks" id="x_Remarks" value="<?= HtmlEncode($Page->Remarks->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
    <div id="r_PatId" class="form-group row">
        <label id="elh_view_billing_voucher_print_PatId" for="x_PatId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_PatId"><?= $Page->PatId->caption() ?><?= $Page->PatId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatId->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_PatId"><span id="el_view_billing_voucher_print_PatId">
<span<?= $Page->PatId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatId->getDisplayValue($Page->PatId->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_PatId" data-hidden="1" name="x_PatId" id="x_PatId" value="<?= HtmlEncode($Page->PatId->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
    <div id="r_DrDepartment" class="form-group row">
        <label id="elh_view_billing_voucher_print_DrDepartment" for="x_DrDepartment" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_DrDepartment"><?= $Page->DrDepartment->caption() ?><?= $Page->DrDepartment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrDepartment->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_DrDepartment"><span id="el_view_billing_voucher_print_DrDepartment">
<span<?= $Page->DrDepartment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->DrDepartment->getDisplayValue($Page->DrDepartment->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_DrDepartment" data-hidden="1" name="x_DrDepartment" id="x_DrDepartment" value="<?= HtmlEncode($Page->DrDepartment->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RefferedBy->Visible) { // RefferedBy ?>
    <div id="r_RefferedBy" class="form-group row">
        <label id="elh_view_billing_voucher_print_RefferedBy" for="x_RefferedBy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_RefferedBy"><?= $Page->RefferedBy->caption() ?><?= $Page->RefferedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefferedBy->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_RefferedBy"><span id="el_view_billing_voucher_print_RefferedBy">
<span<?= $Page->RefferedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RefferedBy->getDisplayValue($Page->RefferedBy->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_RefferedBy" data-hidden="1" name="x_RefferedBy" id="x_RefferedBy" value="<?= HtmlEncode($Page->RefferedBy->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <div id="r_BillNumber" class="form-group row">
        <label id="elh_view_billing_voucher_print_BillNumber" for="x_BillNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_BillNumber"><?= $Page->BillNumber->caption() ?><?= $Page->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillNumber->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_BillNumber"><span id="el_view_billing_voucher_print_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BillNumber->getDisplayValue($Page->BillNumber->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BillNumber" data-hidden="1" name="x_BillNumber" id="x_BillNumber" value="<?= HtmlEncode($Page->BillNumber->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <div id="r_CardNumber" class="form-group row">
        <label id="elh_view_billing_voucher_print_CardNumber" for="x_CardNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_CardNumber"><?= $Page->CardNumber->caption() ?><?= $Page->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CardNumber->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_CardNumber"><span id="el_view_billing_voucher_print_CardNumber">
<span<?= $Page->CardNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CardNumber->getDisplayValue($Page->CardNumber->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_CardNumber" data-hidden="1" name="x_CardNumber" id="x_CardNumber" value="<?= HtmlEncode($Page->CardNumber->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <div id="r_BankName" class="form-group row">
        <label id="elh_view_billing_voucher_print_BankName" for="x_BankName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_BankName"><?= $Page->BankName->caption() ?><?= $Page->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BankName->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_BankName"><span id="el_view_billing_voucher_print_BankName">
<span<?= $Page->BankName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BankName->getDisplayValue($Page->BankName->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BankName" data-hidden="1" name="x_BankName" id="x_BankName" value="<?= HtmlEncode($Page->BankName->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <div id="r_DrID" class="form-group row">
        <label id="elh_view_billing_voucher_print_DrID" for="x_DrID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_DrID"><?= $Page->DrID->caption() ?><?= $Page->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrID->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_DrID"><span id="el_view_billing_voucher_print_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->DrID->getDisplayValue($Page->DrID->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_DrID" data-hidden="1" name="x_DrID" id="x_DrID" value="<?= HtmlEncode($Page->DrID->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillStatus->Visible) { // BillStatus ?>
    <div id="r_BillStatus" class="form-group row">
        <label id="elh_view_billing_voucher_print_BillStatus" for="x_BillStatus" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_BillStatus"><?= $Page->BillStatus->caption() ?><?= $Page->BillStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillStatus->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_BillStatus"><span id="el_view_billing_voucher_print_BillStatus">
<span<?= $Page->BillStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BillStatus->getDisplayValue($Page->BillStatus->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BillStatus" data-hidden="1" name="x_BillStatus" id="x_BillStatus" value="<?= HtmlEncode($Page->BillStatus->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
    <div id="r_ReportHeader" class="form-group row">
        <label id="elh_view_billing_voucher_print_ReportHeader" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_ReportHeader"><?= $Page->ReportHeader->caption() ?><?= $Page->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReportHeader->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_ReportHeader"><span id="el_view_billing_voucher_print_ReportHeader">
<span<?= $Page->ReportHeader->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ReportHeader->getDisplayValue($Page->ReportHeader->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_ReportHeader" data-hidden="1" name="x_ReportHeader" id="x_ReportHeader" value="<?= HtmlEncode($Page->ReportHeader->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
    <div id="r_AdjustmentAdvance" class="form-group row">
        <label id="elh_view_billing_voucher_print_AdjustmentAdvance" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_AdjustmentAdvance"><?= $Page->AdjustmentAdvance->caption() ?><?= $Page->AdjustmentAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdjustmentAdvance->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_AdjustmentAdvance"><span id="el_view_billing_voucher_print_AdjustmentAdvance">
<span<?= $Page->AdjustmentAdvance->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->AdjustmentAdvance->getDisplayValue($Page->AdjustmentAdvance->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_AdjustmentAdvance" data-hidden="1" name="x_AdjustmentAdvance" id="x_AdjustmentAdvance" value="<?= HtmlEncode($Page->AdjustmentAdvance->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->billing_vouchercol->Visible) { // billing_vouchercol ?>
    <div id="r_billing_vouchercol" class="form-group row">
        <label id="elh_view_billing_voucher_print_billing_vouchercol" for="x_billing_vouchercol" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_billing_vouchercol"><?= $Page->billing_vouchercol->caption() ?><?= $Page->billing_vouchercol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->billing_vouchercol->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_billing_vouchercol"><span id="el_view_billing_voucher_print_billing_vouchercol">
<span<?= $Page->billing_vouchercol->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->billing_vouchercol->getDisplayValue($Page->billing_vouchercol->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_billing_vouchercol" data-hidden="1" name="x_billing_vouchercol" id="x_billing_vouchercol" value="<?= HtmlEncode($Page->billing_vouchercol->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
    <div id="r_BillType" class="form-group row">
        <label id="elh_view_billing_voucher_print_BillType" for="x_BillType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_BillType"><?= $Page->BillType->caption() ?><?= $Page->BillType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillType->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_BillType"><span id="el_view_billing_voucher_print_BillType">
<span<?= $Page->BillType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BillType->getDisplayValue($Page->BillType->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_BillType" data-hidden="1" name="x_BillType" id="x_BillType" value="<?= HtmlEncode($Page->BillType->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureName->Visible) { // ProcedureName ?>
    <div id="r_ProcedureName" class="form-group row">
        <label id="elh_view_billing_voucher_print_ProcedureName" for="x_ProcedureName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_ProcedureName"><?= $Page->ProcedureName->caption() ?><?= $Page->ProcedureName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureName->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_ProcedureName"><span id="el_view_billing_voucher_print_ProcedureName">
<span<?= $Page->ProcedureName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ProcedureName->getDisplayValue($Page->ProcedureName->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_ProcedureName" data-hidden="1" name="x_ProcedureName" id="x_ProcedureName" value="<?= HtmlEncode($Page->ProcedureName->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureAmount->Visible) { // ProcedureAmount ?>
    <div id="r_ProcedureAmount" class="form-group row">
        <label id="elh_view_billing_voucher_print_ProcedureAmount" for="x_ProcedureAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_ProcedureAmount"><?= $Page->ProcedureAmount->caption() ?><?= $Page->ProcedureAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureAmount->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_ProcedureAmount"><span id="el_view_billing_voucher_print_ProcedureAmount">
<span<?= $Page->ProcedureAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ProcedureAmount->getDisplayValue($Page->ProcedureAmount->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_ProcedureAmount" data-hidden="1" name="x_ProcedureAmount" id="x_ProcedureAmount" value="<?= HtmlEncode($Page->ProcedureAmount->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IncludePackage->Visible) { // IncludePackage ?>
    <div id="r_IncludePackage" class="form-group row">
        <label id="elh_view_billing_voucher_print_IncludePackage" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_IncludePackage"><?= $Page->IncludePackage->caption() ?><?= $Page->IncludePackage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IncludePackage->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_IncludePackage"><span id="el_view_billing_voucher_print_IncludePackage">
<span<?= $Page->IncludePackage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->IncludePackage->getDisplayValue($Page->IncludePackage->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_billing_voucher_print" data-field="x_IncludePackage" data-hidden="1" name="x_IncludePackage" id="x_IncludePackage" value="<?= HtmlEncode($Page->IncludePackage->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelBill->Visible) { // CancelBill ?>
    <div id="r_CancelBill" class="form-group row">
        <label id="elh_view_billing_voucher_print_CancelBill" for="x_CancelBill" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_CancelBill"><?= $Page->CancelBill->caption() ?><?= $Page->CancelBill->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelBill->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_CancelBill"><span id="el_view_billing_voucher_print_CancelBill">
    <select
        id="x_CancelBill"
        name="x_CancelBill"
        class="form-control ew-select<?= $Page->CancelBill->isInvalidClass() ?>"
        data-select2-id="view_billing_voucher_print_x_CancelBill"
        data-table="view_billing_voucher_print"
        data-field="x_CancelBill"
        data-value-separator="<?= $Page->CancelBill->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->CancelBill->getPlaceHolder()) ?>"
        <?= $Page->CancelBill->editAttributes() ?>>
        <?= $Page->CancelBill->selectOptionListHtml("x_CancelBill") ?>
    </select>
    <?= $Page->CancelBill->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->CancelBill->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_billing_voucher_print_x_CancelBill']"),
        options = { name: "x_CancelBill", selectId: "view_billing_voucher_print_x_CancelBill", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_billing_voucher_print.fields.CancelBill.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_billing_voucher_print.fields.CancelBill.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelReason->Visible) { // CancelReason ?>
    <div id="r_CancelReason" class="form-group row">
        <label id="elh_view_billing_voucher_print_CancelReason" for="x_CancelReason" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_CancelReason"><?= $Page->CancelReason->caption() ?><?= $Page->CancelReason->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelReason->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_CancelReason"><span id="el_view_billing_voucher_print_CancelReason">
<textarea data-table="view_billing_voucher_print" data-field="x_CancelReason" name="x_CancelReason" id="x_CancelReason" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->CancelReason->getPlaceHolder()) ?>"<?= $Page->CancelReason->editAttributes() ?> aria-describedby="x_CancelReason_help"><?= $Page->CancelReason->EditValue ?></textarea>
<?= $Page->CancelReason->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelReason->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
    <div id="r_CancelModeOfPayment" class="form-group row">
        <label id="elh_view_billing_voucher_print_CancelModeOfPayment" for="x_CancelModeOfPayment" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_CancelModeOfPayment"><?= $Page->CancelModeOfPayment->caption() ?><?= $Page->CancelModeOfPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelModeOfPayment->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_CancelModeOfPayment"><span id="el_view_billing_voucher_print_CancelModeOfPayment">
<input type="<?= $Page->CancelModeOfPayment->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_CancelModeOfPayment" name="x_CancelModeOfPayment" id="x_CancelModeOfPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelModeOfPayment->getPlaceHolder()) ?>" value="<?= $Page->CancelModeOfPayment->EditValue ?>"<?= $Page->CancelModeOfPayment->editAttributes() ?> aria-describedby="x_CancelModeOfPayment_help">
<?= $Page->CancelModeOfPayment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelModeOfPayment->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelAmount->Visible) { // CancelAmount ?>
    <div id="r_CancelAmount" class="form-group row">
        <label id="elh_view_billing_voucher_print_CancelAmount" for="x_CancelAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_CancelAmount"><?= $Page->CancelAmount->caption() ?><?= $Page->CancelAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelAmount->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_CancelAmount"><span id="el_view_billing_voucher_print_CancelAmount">
<input type="<?= $Page->CancelAmount->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_CancelAmount" name="x_CancelAmount" id="x_CancelAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelAmount->getPlaceHolder()) ?>" value="<?= $Page->CancelAmount->EditValue ?>"<?= $Page->CancelAmount->editAttributes() ?> aria-describedby="x_CancelAmount_help">
<?= $Page->CancelAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelBankName->Visible) { // CancelBankName ?>
    <div id="r_CancelBankName" class="form-group row">
        <label id="elh_view_billing_voucher_print_CancelBankName" for="x_CancelBankName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_CancelBankName"><?= $Page->CancelBankName->caption() ?><?= $Page->CancelBankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelBankName->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_CancelBankName"><span id="el_view_billing_voucher_print_CancelBankName">
<input type="<?= $Page->CancelBankName->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_CancelBankName" name="x_CancelBankName" id="x_CancelBankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelBankName->getPlaceHolder()) ?>" value="<?= $Page->CancelBankName->EditValue ?>"<?= $Page->CancelBankName->editAttributes() ?> aria-describedby="x_CancelBankName_help">
<?= $Page->CancelBankName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelBankName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
    <div id="r_CancelTransactionNumber" class="form-group row">
        <label id="elh_view_billing_voucher_print_CancelTransactionNumber" for="x_CancelTransactionNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_CancelTransactionNumber"><?= $Page->CancelTransactionNumber->caption() ?><?= $Page->CancelTransactionNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CancelTransactionNumber->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_CancelTransactionNumber"><span id="el_view_billing_voucher_print_CancelTransactionNumber">
<input type="<?= $Page->CancelTransactionNumber->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_CancelTransactionNumber" name="x_CancelTransactionNumber" id="x_CancelTransactionNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CancelTransactionNumber->getPlaceHolder()) ?>" value="<?= $Page->CancelTransactionNumber->EditValue ?>"<?= $Page->CancelTransactionNumber->editAttributes() ?> aria-describedby="x_CancelTransactionNumber_help">
<?= $Page->CancelTransactionNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CancelTransactionNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LabTest->Visible) { // LabTest ?>
    <div id="r_LabTest" class="form-group row">
        <label id="elh_view_billing_voucher_print_LabTest" for="x_LabTest" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_LabTest"><?= $Page->LabTest->caption() ?><?= $Page->LabTest->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LabTest->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_LabTest"><span id="el_view_billing_voucher_print_LabTest">
<input type="<?= $Page->LabTest->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_LabTest" name="x_LabTest" id="x_LabTest" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LabTest->getPlaceHolder()) ?>" value="<?= $Page->LabTest->EditValue ?>"<?= $Page->LabTest->editAttributes() ?> aria-describedby="x_LabTest_help">
<?= $Page->LabTest->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LabTest->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
    <div id="r_sid" class="form-group row">
        <label id="elh_view_billing_voucher_print_sid" for="x_sid" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_sid"><?= $Page->sid->caption() ?><?= $Page->sid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->sid->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_sid"><span id="el_view_billing_voucher_print_sid">
<input type="<?= $Page->sid->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_sid" name="x_sid" id="x_sid" size="30" placeholder="<?= HtmlEncode($Page->sid->getPlaceHolder()) ?>" value="<?= $Page->sid->EditValue ?>"<?= $Page->sid->editAttributes() ?> aria-describedby="x_sid_help">
<?= $Page->sid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->sid->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SidNo->Visible) { // SidNo ?>
    <div id="r_SidNo" class="form-group row">
        <label id="elh_view_billing_voucher_print_SidNo" for="x_SidNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_SidNo"><?= $Page->SidNo->caption() ?><?= $Page->SidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SidNo->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_SidNo"><span id="el_view_billing_voucher_print_SidNo">
<input type="<?= $Page->SidNo->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_SidNo" name="x_SidNo" id="x_SidNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SidNo->getPlaceHolder()) ?>" value="<?= $Page->SidNo->EditValue ?>"<?= $Page->SidNo->editAttributes() ?> aria-describedby="x_SidNo_help">
<?= $Page->SidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SidNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_billing_voucher_printedit" class="ew-custom-template"></div>
<template id="tpm_view_billing_voucher_printedit">
<div id="ct_ViewBillingVoucherPrintEdit"><style>
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
<div hidden><slot class="ew-slot" name="tpc_view_billing_voucher_print_billing_vouchercol"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_billing_vouchercol"></slot> </div>
<div class="row">
	<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_view_billing_voucher_print_PatId"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_PatId"></slot></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_view_billing_voucher_print_RIDNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_RIDNO"></slot></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_view_billing_voucher_print_CId"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_CId"></slot></h3>
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
		<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_PatientId"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_PatientId"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_PatientName"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_Mobile"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_Mobile"></slot></td>
		</tr>
		<tr>
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_Dob"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_Dob"></slot></td>
		<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_Age"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_Age"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_Gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_Gender"></slot></td>
		</tr>
		<tr>
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_PartnerName"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_PartnerName"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_PayerType"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_PayerType"></slot></td>
			<td></td>
		</tr>
		 <tr>
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_Doctor"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_Doctor"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_DrDepartment"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_DrDepartment"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_RefferedBy"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_RefferedBy"></slot></td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#229954">
				<h3 class="card-title">Cancel Bill Details</h3>
			</div>
			<div class="card-body">
<table>
	 <tbody>
		<tr>
		<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_CancelBill"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_CancelBill"></slot></td>
		<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_CancelAmount"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_CancelAmount"></slot></td>
		<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_CancelReason"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_CancelReason"></slot></td>
				</tr>
<tr id="IIDDCancelBankName">
<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_CancelBankName"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_CancelBankName"></slot></td>
<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_CancelTransactionNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_CancelTransactionNumber"></slot></td>
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
<slot class="ew-slot" name="tpc_view_billing_voucher_print_ReportHeader"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_ReportHeader"></slot>
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
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_ModeofPayment"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_ModeofPayment"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_Amount"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_AnyDues"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_AnyDues"></slot></td>
		</tr>
		<tr>
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_DiscountRemarks"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_DiscountRemarks"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_Remarks"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_Remarks"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_AdjustmentAdvance"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_AdjustmentAdvance"></slot></td>
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
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_CardNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_CardNumber"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_BankName"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_BankName"></slot></td>
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
    if (in_array("view_patient_services", explode(",", $Page->getCurrentDetailTable())) && $view_patient_services->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("view_patient_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ViewPatientServicesGrid.php" ?>
<?php } ?>
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_view_billing_voucher_printedit", "tpm_view_billing_voucher_printedit", "view_billing_voucher_printedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("view_billing_voucher_print");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    document.getElementById("IIDDCancelBankName").style.display="none";
});
</script>

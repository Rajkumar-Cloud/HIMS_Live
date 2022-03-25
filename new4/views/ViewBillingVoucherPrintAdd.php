<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewBillingVoucherPrintAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_billing_voucher_printadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fview_billing_voucher_printadd = currentForm = new ew.Form("fview_billing_voucher_printadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_billing_voucher_print")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_billing_voucher_print)
        ew.vars.tables.view_billing_voucher_print = currentTable;
    fview_billing_voucher_printadd.addFields([
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
        ["Amount", [fields.Amount.visible && fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid],
        ["AnyDues", [fields.AnyDues.visible && fields.AnyDues.required ? ew.Validators.required(fields.AnyDues.caption) : null], fields.AnyDues.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["RealizationAmount", [fields.RealizationAmount.visible && fields.RealizationAmount.required ? ew.Validators.required(fields.RealizationAmount.caption) : null, ew.Validators.float], fields.RealizationAmount.isInvalid],
        ["RealizationStatus", [fields.RealizationStatus.visible && fields.RealizationStatus.required ? ew.Validators.required(fields.RealizationStatus.caption) : null], fields.RealizationStatus.isInvalid],
        ["RealizationRemarks", [fields.RealizationRemarks.visible && fields.RealizationRemarks.required ? ew.Validators.required(fields.RealizationRemarks.caption) : null], fields.RealizationRemarks.isInvalid],
        ["RealizationBatchNo", [fields.RealizationBatchNo.visible && fields.RealizationBatchNo.required ? ew.Validators.required(fields.RealizationBatchNo.caption) : null], fields.RealizationBatchNo.isInvalid],
        ["RealizationDate", [fields.RealizationDate.visible && fields.RealizationDate.required ? ew.Validators.required(fields.RealizationDate.caption) : null], fields.RealizationDate.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["RIDNO", [fields.RIDNO.visible && fields.RIDNO.required ? ew.Validators.required(fields.RIDNO.caption) : null], fields.RIDNO.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
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
        ["SidNo", [fields.SidNo.visible && fields.SidNo.required ? ew.Validators.required(fields.SidNo.caption) : null], fields.SidNo.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_billing_voucher_printadd,
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
    fview_billing_voucher_printadd.validate = function () {
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
    fview_billing_voucher_printadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_billing_voucher_printadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_billing_voucher_printadd.lists.Reception = <?= $Page->Reception->toClientList($Page) ?>;
    fview_billing_voucher_printadd.lists.ModeofPayment = <?= $Page->ModeofPayment->toClientList($Page) ?>;
    fview_billing_voucher_printadd.lists.RIDNO = <?= $Page->RIDNO->toClientList($Page) ?>;
    fview_billing_voucher_printadd.lists.CId = <?= $Page->CId->toClientList($Page) ?>;
    fview_billing_voucher_printadd.lists.PatId = <?= $Page->PatId->toClientList($Page) ?>;
    fview_billing_voucher_printadd.lists.RefferedBy = <?= $Page->RefferedBy->toClientList($Page) ?>;
    fview_billing_voucher_printadd.lists.DrID = <?= $Page->DrID->toClientList($Page) ?>;
    fview_billing_voucher_printadd.lists.ReportHeader = <?= $Page->ReportHeader->toClientList($Page) ?>;
    fview_billing_voucher_printadd.lists.AdjustmentAdvance = <?= $Page->AdjustmentAdvance->toClientList($Page) ?>;
    fview_billing_voucher_printadd.lists.IncludePackage = <?= $Page->IncludePackage->toClientList($Page) ?>;
    fview_billing_voucher_printadd.lists.CancelBill = <?= $Page->CancelBill->toClientList($Page) ?>;
    loadjs.done("fview_billing_voucher_printadd");
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
<form name="fview_billing_voucher_printadd" id="fview_billing_voucher_printadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher_print">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_view_billing_voucher_print_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Reception"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Reception"><span id="el_view_billing_voucher_print_Reception">
<div class="input-group ew-lookup-list" aria-describedby="x_Reception_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Reception"><?= EmptyValue(strval($Page->Reception->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Reception->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Reception->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Reception->ReadOnly || $Page->Reception->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Reception',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
<?= $Page->Reception->getCustomMessage() ?>
<?= $Page->Reception->Lookup->getParamTag($Page, "p_x_Reception") ?>
<input type="hidden" is="selection-list" data-table="view_billing_voucher_print" data-field="x_Reception" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Reception->displayValueSeparatorAttribute() ?>" name="x_Reception" id="x_Reception" value="<?= $Page->Reception->CurrentValue ?>"<?= $Page->Reception->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_view_billing_voucher_print_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_PatientId"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_PatientId"><span id="el_view_billing_voucher_print_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_view_billing_voucher_print_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_mrnno"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_mrnno"><span id="el_view_billing_voucher_print_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_view_billing_voucher_print_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_PatientName"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_PatientName"><span id="el_view_billing_voucher_print_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_view_billing_voucher_print_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Age"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Age"><span id="el_view_billing_voucher_print_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_view_billing_voucher_print_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Gender"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Gender"><span id="el_view_billing_voucher_print_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_view_billing_voucher_print_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_profilePic"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_profilePic"><span id="el_view_billing_voucher_print_profilePic">
<textarea data-table="view_billing_voucher_print" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help"><?= $Page->profilePic->EditValue ?></textarea>
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <div id="r_Mobile" class="form-group row">
        <label id="elh_view_billing_voucher_print_Mobile" for="x_Mobile" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Mobile"><?= $Page->Mobile->caption() ?><?= $Page->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mobile->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Mobile"><span id="el_view_billing_voucher_print_Mobile">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?> aria-describedby="x_Mobile_help">
<?= $Page->Mobile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IP_OP->Visible) { // IP_OP ?>
    <div id="r_IP_OP" class="form-group row">
        <label id="elh_view_billing_voucher_print_IP_OP" for="x_IP_OP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_IP_OP"><?= $Page->IP_OP->caption() ?><?= $Page->IP_OP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IP_OP->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_IP_OP"><span id="el_view_billing_voucher_print_IP_OP">
<input type="<?= $Page->IP_OP->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IP_OP->getPlaceHolder()) ?>" value="<?= $Page->IP_OP->EditValue ?>"<?= $Page->IP_OP->editAttributes() ?> aria-describedby="x_IP_OP_help">
<?= $Page->IP_OP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IP_OP->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
    <div id="r_Doctor" class="form-group row">
        <label id="elh_view_billing_voucher_print_Doctor" for="x_Doctor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Doctor"><?= $Page->Doctor->caption() ?><?= $Page->Doctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Doctor->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Doctor"><span id="el_view_billing_voucher_print_Doctor">
<input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?> aria-describedby="x_Doctor_help">
<?= $Page->Doctor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <div id="r_voucher_type" class="form-group row">
        <label id="elh_view_billing_voucher_print_voucher_type" for="x_voucher_type" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_voucher_type"><?= $Page->voucher_type->caption() ?><?= $Page->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->voucher_type->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_voucher_type"><span id="el_view_billing_voucher_print_voucher_type">
<input type="<?= $Page->voucher_type->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->voucher_type->getPlaceHolder()) ?>" value="<?= $Page->voucher_type->EditValue ?>"<?= $Page->voucher_type->editAttributes() ?> aria-describedby="x_voucher_type_help">
<?= $Page->voucher_type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->voucher_type->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <div id="r_Details" class="form-group row">
        <label id="elh_view_billing_voucher_print_Details" for="x_Details" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Details"><?= $Page->Details->caption() ?><?= $Page->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Details->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Details"><span id="el_view_billing_voucher_print_Details">
<input type="<?= $Page->Details->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Details->getPlaceHolder()) ?>" value="<?= $Page->Details->EditValue ?>"<?= $Page->Details->editAttributes() ?> aria-describedby="x_Details_help">
<?= $Page->Details->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Details->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <div id="r_ModeofPayment" class="form-group row">
        <label id="elh_view_billing_voucher_print_ModeofPayment" for="x_ModeofPayment" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_ModeofPayment"><?= $Page->ModeofPayment->caption() ?><?= $Page->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModeofPayment->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_ModeofPayment"><span id="el_view_billing_voucher_print_ModeofPayment">
    <select
        id="x_ModeofPayment"
        name="x_ModeofPayment"
        class="form-control ew-select<?= $Page->ModeofPayment->isInvalidClass() ?>"
        data-select2-id="view_billing_voucher_print_x_ModeofPayment"
        data-table="view_billing_voucher_print"
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
    var el = document.querySelector("select[data-select2-id='view_billing_voucher_print_x_ModeofPayment']"),
        options = { name: "x_ModeofPayment", selectId: "view_billing_voucher_print_x_ModeofPayment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_billing_voucher_print.fields.ModeofPayment.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label id="elh_view_billing_voucher_print_Amount" for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Amount"><?= $Page->Amount->caption() ?><?= $Page->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Amount"><span id="el_view_billing_voucher_print_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?> aria-describedby="x_Amount_help">
<?= $Page->Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
    <div id="r_AnyDues" class="form-group row">
        <label id="elh_view_billing_voucher_print_AnyDues" for="x_AnyDues" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_AnyDues"><?= $Page->AnyDues->caption() ?><?= $Page->AnyDues->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnyDues->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_AnyDues"><span id="el_view_billing_voucher_print_AnyDues">
<input type="<?= $Page->AnyDues->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AnyDues->getPlaceHolder()) ?>" value="<?= $Page->AnyDues->EditValue ?>"<?= $Page->AnyDues->editAttributes() ?> aria-describedby="x_AnyDues_help">
<?= $Page->AnyDues->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnyDues->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
    <div id="r_RealizationAmount" class="form-group row">
        <label id="elh_view_billing_voucher_print_RealizationAmount" for="x_RealizationAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_RealizationAmount"><?= $Page->RealizationAmount->caption() ?><?= $Page->RealizationAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationAmount->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_RealizationAmount"><span id="el_view_billing_voucher_print_RealizationAmount">
<input type="<?= $Page->RealizationAmount->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?= HtmlEncode($Page->RealizationAmount->getPlaceHolder()) ?>" value="<?= $Page->RealizationAmount->EditValue ?>"<?= $Page->RealizationAmount->editAttributes() ?> aria-describedby="x_RealizationAmount_help">
<?= $Page->RealizationAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationStatus->Visible) { // RealizationStatus ?>
    <div id="r_RealizationStatus" class="form-group row">
        <label id="elh_view_billing_voucher_print_RealizationStatus" for="x_RealizationStatus" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_RealizationStatus"><?= $Page->RealizationStatus->caption() ?><?= $Page->RealizationStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationStatus->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_RealizationStatus"><span id="el_view_billing_voucher_print_RealizationStatus">
<input type="<?= $Page->RealizationStatus->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationStatus->getPlaceHolder()) ?>" value="<?= $Page->RealizationStatus->EditValue ?>"<?= $Page->RealizationStatus->editAttributes() ?> aria-describedby="x_RealizationStatus_help">
<?= $Page->RealizationStatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationStatus->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationRemarks->Visible) { // RealizationRemarks ?>
    <div id="r_RealizationRemarks" class="form-group row">
        <label id="elh_view_billing_voucher_print_RealizationRemarks" for="x_RealizationRemarks" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_RealizationRemarks"><?= $Page->RealizationRemarks->caption() ?><?= $Page->RealizationRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationRemarks->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_RealizationRemarks"><span id="el_view_billing_voucher_print_RealizationRemarks">
<input type="<?= $Page->RealizationRemarks->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationRemarks->getPlaceHolder()) ?>" value="<?= $Page->RealizationRemarks->EditValue ?>"<?= $Page->RealizationRemarks->editAttributes() ?> aria-describedby="x_RealizationRemarks_help">
<?= $Page->RealizationRemarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationRemarks->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
    <div id="r_RealizationBatchNo" class="form-group row">
        <label id="elh_view_billing_voucher_print_RealizationBatchNo" for="x_RealizationBatchNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_RealizationBatchNo"><?= $Page->RealizationBatchNo->caption() ?><?= $Page->RealizationBatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationBatchNo->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_RealizationBatchNo"><span id="el_view_billing_voucher_print_RealizationBatchNo">
<input type="<?= $Page->RealizationBatchNo->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationBatchNo->getPlaceHolder()) ?>" value="<?= $Page->RealizationBatchNo->EditValue ?>"<?= $Page->RealizationBatchNo->editAttributes() ?> aria-describedby="x_RealizationBatchNo_help">
<?= $Page->RealizationBatchNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationBatchNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationDate->Visible) { // RealizationDate ?>
    <div id="r_RealizationDate" class="form-group row">
        <label id="elh_view_billing_voucher_print_RealizationDate" for="x_RealizationDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_RealizationDate"><?= $Page->RealizationDate->caption() ?><?= $Page->RealizationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationDate->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_RealizationDate"><span id="el_view_billing_voucher_print_RealizationDate">
<input type="<?= $Page->RealizationDate->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationDate->getPlaceHolder()) ?>" value="<?= $Page->RealizationDate->EditValue ?>"<?= $Page->RealizationDate->editAttributes() ?> aria-describedby="x_RealizationDate_help">
<?= $Page->RealizationDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationDate->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <div id="r_RIDNO" class="form-group row">
        <label id="elh_view_billing_voucher_print_RIDNO" for="x_RIDNO" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_RIDNO"><?= $Page->RIDNO->caption() ?><?= $Page->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNO->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_RIDNO"><span id="el_view_billing_voucher_print_RIDNO">
<div class="input-group ew-lookup-list" aria-describedby="x_RIDNO_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RIDNO"><?= EmptyValue(strval($Page->RIDNO->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->RIDNO->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->RIDNO->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->RIDNO->ReadOnly || $Page->RIDNO->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RIDNO',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->RIDNO->getErrorMessage() ?></div>
<?= $Page->RIDNO->getCustomMessage() ?>
<?= $Page->RIDNO->Lookup->getParamTag($Page, "p_x_RIDNO") ?>
<input type="hidden" is="selection-list" data-table="view_billing_voucher_print" data-field="x_RIDNO" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->RIDNO->displayValueSeparatorAttribute() ?>" name="x_RIDNO" id="x_RIDNO" value="<?= $Page->RIDNO->CurrentValue ?>"<?= $Page->RIDNO->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_view_billing_voucher_print_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_TidNo"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_TidNo"><span id="el_view_billing_voucher_print_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
    <div id="r_CId" class="form-group row">
        <label id="elh_view_billing_voucher_print_CId" for="x_CId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_CId"><?= $Page->CId->caption() ?><?= $Page->CId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CId->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_CId"><span id="el_view_billing_voucher_print_CId">
<?php $Page->CId->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_CId_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_CId"><?= EmptyValue(strval($Page->CId->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->CId->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->CId->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->CId->ReadOnly || $Page->CId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_CId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->CId->getErrorMessage() ?></div>
<?= $Page->CId->getCustomMessage() ?>
<?= $Page->CId->Lookup->getParamTag($Page, "p_x_CId") ?>
<input type="hidden" is="selection-list" data-table="view_billing_voucher_print" data-field="x_CId" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->CId->displayValueSeparatorAttribute() ?>" name="x_CId" id="x_CId" value="<?= $Page->CId->CurrentValue ?>"<?= $Page->CId->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <div id="r_PartnerName" class="form-group row">
        <label id="elh_view_billing_voucher_print_PartnerName" for="x_PartnerName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_PartnerName"><?= $Page->PartnerName->caption() ?><?= $Page->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerName->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_PartnerName"><span id="el_view_billing_voucher_print_PartnerName">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?> aria-describedby="x_PartnerName_help">
<?= $Page->PartnerName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PayerType->Visible) { // PayerType ?>
    <div id="r_PayerType" class="form-group row">
        <label id="elh_view_billing_voucher_print_PayerType" for="x_PayerType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_PayerType"><?= $Page->PayerType->caption() ?><?= $Page->PayerType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PayerType->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_PayerType"><span id="el_view_billing_voucher_print_PayerType">
<input type="<?= $Page->PayerType->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PayerType->getPlaceHolder()) ?>" value="<?= $Page->PayerType->EditValue ?>"<?= $Page->PayerType->editAttributes() ?> aria-describedby="x_PayerType_help">
<?= $Page->PayerType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PayerType->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Dob->Visible) { // Dob ?>
    <div id="r_Dob" class="form-group row">
        <label id="elh_view_billing_voucher_print_Dob" for="x_Dob" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Dob"><?= $Page->Dob->caption() ?><?= $Page->Dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Dob->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Dob"><span id="el_view_billing_voucher_print_Dob">
<input type="<?= $Page->Dob->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Dob->getPlaceHolder()) ?>" value="<?= $Page->Dob->EditValue ?>"<?= $Page->Dob->editAttributes() ?> aria-describedby="x_Dob_help">
<?= $Page->Dob->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Dob->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <div id="r_Currency" class="form-group row">
        <label id="elh_view_billing_voucher_print_Currency" for="x_Currency" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Currency"><?= $Page->Currency->caption() ?><?= $Page->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Currency->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Currency"><span id="el_view_billing_voucher_print_Currency">
<input type="<?= $Page->Currency->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Currency->getPlaceHolder()) ?>" value="<?= $Page->Currency->EditValue ?>"<?= $Page->Currency->editAttributes() ?> aria-describedby="x_Currency_help">
<?= $Page->Currency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Currency->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DiscountRemarks->Visible) { // DiscountRemarks ?>
    <div id="r_DiscountRemarks" class="form-group row">
        <label id="elh_view_billing_voucher_print_DiscountRemarks" for="x_DiscountRemarks" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_DiscountRemarks"><?= $Page->DiscountRemarks->caption() ?><?= $Page->DiscountRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DiscountRemarks->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_DiscountRemarks"><span id="el_view_billing_voucher_print_DiscountRemarks">
<input type="<?= $Page->DiscountRemarks->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DiscountRemarks->getPlaceHolder()) ?>" value="<?= $Page->DiscountRemarks->EditValue ?>"<?= $Page->DiscountRemarks->editAttributes() ?> aria-describedby="x_DiscountRemarks_help">
<?= $Page->DiscountRemarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DiscountRemarks->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label id="elh_view_billing_voucher_print_Remarks" for="x_Remarks" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_Remarks"><?= $Page->Remarks->caption() ?><?= $Page->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Remarks->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_Remarks"><span id="el_view_billing_voucher_print_Remarks">
<textarea data-table="view_billing_voucher_print" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>"<?= $Page->Remarks->editAttributes() ?> aria-describedby="x_Remarks_help"><?= $Page->Remarks->EditValue ?></textarea>
<?= $Page->Remarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
    <div id="r_PatId" class="form-group row">
        <label id="elh_view_billing_voucher_print_PatId" for="x_PatId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_PatId"><?= $Page->PatId->caption() ?><?= $Page->PatId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatId->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_PatId"><span id="el_view_billing_voucher_print_PatId">
<?php $Page->PatId->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_PatId_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatId"><?= EmptyValue(strval($Page->PatId->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->PatId->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PatId->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->PatId->ReadOnly || $Page->PatId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->PatId->getErrorMessage() ?></div>
<?= $Page->PatId->getCustomMessage() ?>
<?= $Page->PatId->Lookup->getParamTag($Page, "p_x_PatId") ?>
<input type="hidden" is="selection-list" data-table="view_billing_voucher_print" data-field="x_PatId" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PatId->displayValueSeparatorAttribute() ?>" name="x_PatId" id="x_PatId" value="<?= $Page->PatId->CurrentValue ?>"<?= $Page->PatId->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
    <div id="r_DrDepartment" class="form-group row">
        <label id="elh_view_billing_voucher_print_DrDepartment" for="x_DrDepartment" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_DrDepartment"><?= $Page->DrDepartment->caption() ?><?= $Page->DrDepartment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrDepartment->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_DrDepartment"><span id="el_view_billing_voucher_print_DrDepartment">
<input type="<?= $Page->DrDepartment->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrDepartment->getPlaceHolder()) ?>" value="<?= $Page->DrDepartment->EditValue ?>"<?= $Page->DrDepartment->editAttributes() ?> aria-describedby="x_DrDepartment_help">
<?= $Page->DrDepartment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrDepartment->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RefferedBy->Visible) { // RefferedBy ?>
    <div id="r_RefferedBy" class="form-group row">
        <label id="elh_view_billing_voucher_print_RefferedBy" for="x_RefferedBy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_RefferedBy"><?= $Page->RefferedBy->caption() ?><?= $Page->RefferedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefferedBy->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_RefferedBy"><span id="el_view_billing_voucher_print_RefferedBy">
<div class="input-group ew-lookup-list" aria-describedby="x_RefferedBy_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RefferedBy"><?= EmptyValue(strval($Page->RefferedBy->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->RefferedBy->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->RefferedBy->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->RefferedBy->ReadOnly || $Page->RefferedBy->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RefferedBy',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
        <?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$Page->RefferedBy->ReadOnly) { ?>
        <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_RefferedBy" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->RefferedBy->caption() ?>" data-title="<?= $Page->RefferedBy->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_RefferedBy',url:'<?= GetUrl("MasReferenceTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
        <?php } ?>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->RefferedBy->getErrorMessage() ?></div>
<?= $Page->RefferedBy->getCustomMessage() ?>
<?= $Page->RefferedBy->Lookup->getParamTag($Page, "p_x_RefferedBy") ?>
<input type="hidden" is="selection-list" data-table="view_billing_voucher_print" data-field="x_RefferedBy" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->RefferedBy->displayValueSeparatorAttribute() ?>" name="x_RefferedBy" id="x_RefferedBy" value="<?= $Page->RefferedBy->CurrentValue ?>"<?= $Page->RefferedBy->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <div id="r_BillNumber" class="form-group row">
        <label id="elh_view_billing_voucher_print_BillNumber" for="x_BillNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_BillNumber"><?= $Page->BillNumber->caption() ?><?= $Page->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillNumber->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_BillNumber"><span id="el_view_billing_voucher_print_BillNumber">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?> aria-describedby="x_BillNumber_help">
<?= $Page->BillNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <div id="r_CardNumber" class="form-group row">
        <label id="elh_view_billing_voucher_print_CardNumber" for="x_CardNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_CardNumber"><?= $Page->CardNumber->caption() ?><?= $Page->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CardNumber->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_CardNumber"><span id="el_view_billing_voucher_print_CardNumber">
<input type="<?= $Page->CardNumber->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CardNumber->getPlaceHolder()) ?>" value="<?= $Page->CardNumber->EditValue ?>"<?= $Page->CardNumber->editAttributes() ?> aria-describedby="x_CardNumber_help">
<?= $Page->CardNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CardNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <div id="r_BankName" class="form-group row">
        <label id="elh_view_billing_voucher_print_BankName" for="x_BankName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_BankName"><?= $Page->BankName->caption() ?><?= $Page->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BankName->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_BankName"><span id="el_view_billing_voucher_print_BankName">
<input type="<?= $Page->BankName->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BankName->getPlaceHolder()) ?>" value="<?= $Page->BankName->EditValue ?>"<?= $Page->BankName->editAttributes() ?> aria-describedby="x_BankName_help">
<?= $Page->BankName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BankName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <div id="r_DrID" class="form-group row">
        <label id="elh_view_billing_voucher_print_DrID" for="x_DrID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_DrID"><?= $Page->DrID->caption() ?><?= $Page->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrID->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_DrID"><span id="el_view_billing_voucher_print_DrID">
<?php $Page->DrID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_DrID_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrID"><?= EmptyValue(strval($Page->DrID->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->DrID->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->DrID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->DrID->ReadOnly || $Page->DrID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->DrID->getErrorMessage() ?></div>
<?= $Page->DrID->getCustomMessage() ?>
<?= $Page->DrID->Lookup->getParamTag($Page, "p_x_DrID") ?>
<input type="hidden" is="selection-list" data-table="view_billing_voucher_print" data-field="x_DrID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?= $Page->DrID->CurrentValue ?>"<?= $Page->DrID->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillStatus->Visible) { // BillStatus ?>
    <div id="r_BillStatus" class="form-group row">
        <label id="elh_view_billing_voucher_print_BillStatus" for="x_BillStatus" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_BillStatus"><?= $Page->BillStatus->caption() ?><?= $Page->BillStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillStatus->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_BillStatus"><span id="el_view_billing_voucher_print_BillStatus">
<input type="<?= $Page->BillStatus->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?= HtmlEncode($Page->BillStatus->getPlaceHolder()) ?>" value="<?= $Page->BillStatus->EditValue ?>"<?= $Page->BillStatus->editAttributes() ?> aria-describedby="x_BillStatus_help">
<?= $Page->BillStatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillStatus->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
    <div id="r_ReportHeader" class="form-group row">
        <label id="elh_view_billing_voucher_print_ReportHeader" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_ReportHeader"><?= $Page->ReportHeader->caption() ?><?= $Page->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReportHeader->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_ReportHeader"><span id="el_view_billing_voucher_print_ReportHeader">
<template id="tp_x_ReportHeader">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_billing_voucher_print" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader"<?= $Page->ReportHeader->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_ReportHeader" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_ReportHeader[]"
    name="x_ReportHeader[]"
    value="<?= HtmlEncode($Page->ReportHeader->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_ReportHeader"
    data-target="dsl_x_ReportHeader"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ReportHeader->isInvalidClass() ?>"
    data-table="view_billing_voucher_print"
    data-field="x_ReportHeader"
    data-value-separator="<?= $Page->ReportHeader->displayValueSeparatorAttribute() ?>"
    <?= $Page->ReportHeader->editAttributes() ?>>
<?= $Page->ReportHeader->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReportHeader->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
    <div id="r_AdjustmentAdvance" class="form-group row">
        <label id="elh_view_billing_voucher_print_AdjustmentAdvance" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_AdjustmentAdvance"><?= $Page->AdjustmentAdvance->caption() ?><?= $Page->AdjustmentAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdjustmentAdvance->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_AdjustmentAdvance"><span id="el_view_billing_voucher_print_AdjustmentAdvance">
<template id="tp_x_AdjustmentAdvance">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_billing_voucher_print" data-field="x_AdjustmentAdvance" name="x_AdjustmentAdvance" id="x_AdjustmentAdvance"<?= $Page->AdjustmentAdvance->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_AdjustmentAdvance" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_AdjustmentAdvance[]"
    name="x_AdjustmentAdvance[]"
    value="<?= HtmlEncode($Page->AdjustmentAdvance->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_AdjustmentAdvance"
    data-target="dsl_x_AdjustmentAdvance"
    data-repeatcolumn="5"
    class="form-control<?= $Page->AdjustmentAdvance->isInvalidClass() ?>"
    data-table="view_billing_voucher_print"
    data-field="x_AdjustmentAdvance"
    data-value-separator="<?= $Page->AdjustmentAdvance->displayValueSeparatorAttribute() ?>"
    <?= $Page->AdjustmentAdvance->editAttributes() ?>>
<?= $Page->AdjustmentAdvance->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AdjustmentAdvance->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->billing_vouchercol->Visible) { // billing_vouchercol ?>
    <div id="r_billing_vouchercol" class="form-group row">
        <label id="elh_view_billing_voucher_print_billing_vouchercol" for="x_billing_vouchercol" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_billing_vouchercol"><?= $Page->billing_vouchercol->caption() ?><?= $Page->billing_vouchercol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->billing_vouchercol->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_billing_vouchercol"><span id="el_view_billing_voucher_print_billing_vouchercol">
<input type="<?= $Page->billing_vouchercol->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_billing_vouchercol" name="x_billing_vouchercol" id="x_billing_vouchercol" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->billing_vouchercol->getPlaceHolder()) ?>" value="<?= $Page->billing_vouchercol->EditValue ?>"<?= $Page->billing_vouchercol->editAttributes() ?> aria-describedby="x_billing_vouchercol_help">
<?= $Page->billing_vouchercol->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->billing_vouchercol->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
    <div id="r_BillType" class="form-group row">
        <label id="elh_view_billing_voucher_print_BillType" for="x_BillType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_BillType"><?= $Page->BillType->caption() ?><?= $Page->BillType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillType->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_BillType"><span id="el_view_billing_voucher_print_BillType">
<input type="<?= $Page->BillType->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_BillType" name="x_BillType" id="x_BillType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillType->getPlaceHolder()) ?>" value="<?= $Page->BillType->EditValue ?>"<?= $Page->BillType->editAttributes() ?> aria-describedby="x_BillType_help">
<?= $Page->BillType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillType->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureName->Visible) { // ProcedureName ?>
    <div id="r_ProcedureName" class="form-group row">
        <label id="elh_view_billing_voucher_print_ProcedureName" for="x_ProcedureName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_ProcedureName"><?= $Page->ProcedureName->caption() ?><?= $Page->ProcedureName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureName->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_ProcedureName"><span id="el_view_billing_voucher_print_ProcedureName">
<input type="<?= $Page->ProcedureName->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_ProcedureName" name="x_ProcedureName" id="x_ProcedureName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProcedureName->getPlaceHolder()) ?>" value="<?= $Page->ProcedureName->EditValue ?>"<?= $Page->ProcedureName->editAttributes() ?> aria-describedby="x_ProcedureName_help">
<?= $Page->ProcedureName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProcedureName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureAmount->Visible) { // ProcedureAmount ?>
    <div id="r_ProcedureAmount" class="form-group row">
        <label id="elh_view_billing_voucher_print_ProcedureAmount" for="x_ProcedureAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_ProcedureAmount"><?= $Page->ProcedureAmount->caption() ?><?= $Page->ProcedureAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureAmount->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_ProcedureAmount"><span id="el_view_billing_voucher_print_ProcedureAmount">
<input type="<?= $Page->ProcedureAmount->getInputTextType() ?>" data-table="view_billing_voucher_print" data-field="x_ProcedureAmount" name="x_ProcedureAmount" id="x_ProcedureAmount" size="30" placeholder="<?= HtmlEncode($Page->ProcedureAmount->getPlaceHolder()) ?>" value="<?= $Page->ProcedureAmount->EditValue ?>"<?= $Page->ProcedureAmount->editAttributes() ?> aria-describedby="x_ProcedureAmount_help">
<?= $Page->ProcedureAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProcedureAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IncludePackage->Visible) { // IncludePackage ?>
    <div id="r_IncludePackage" class="form-group row">
        <label id="elh_view_billing_voucher_print_IncludePackage" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_billing_voucher_print_IncludePackage"><?= $Page->IncludePackage->caption() ?><?= $Page->IncludePackage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IncludePackage->cellAttributes() ?>>
<template id="tpx_view_billing_voucher_print_IncludePackage"><span id="el_view_billing_voucher_print_IncludePackage">
<template id="tp_x_IncludePackage">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_billing_voucher_print" data-field="x_IncludePackage" name="x_IncludePackage" id="x_IncludePackage"<?= $Page->IncludePackage->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_IncludePackage" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_IncludePackage[]"
    name="x_IncludePackage[]"
    value="<?= HtmlEncode($Page->IncludePackage->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_IncludePackage"
    data-target="dsl_x_IncludePackage"
    data-repeatcolumn="5"
    class="form-control<?= $Page->IncludePackage->isInvalidClass() ?>"
    data-table="view_billing_voucher_print"
    data-field="x_IncludePackage"
    data-value-separator="<?= $Page->IncludePackage->displayValueSeparatorAttribute() ?>"
    <?= $Page->IncludePackage->editAttributes() ?>>
<?= $Page->IncludePackage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IncludePackage->getErrorMessage() ?></div>
</span></template>
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
<div id="tpd_view_billing_voucher_printadd" class="ew-custom-template"></div>
<template id="tpm_view_billing_voucher_printadd">
<div id="ct_ViewBillingVoucherPrintAdd"><style>
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
<input id="createdbyId" name="createdbyId" type="hidden" value="<?php echo CurrentUserName(); ?>">
<input id="HospIDId" name="HospIDId" type="hidden" value="<?php echo HospitalID(); ?>">
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
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_RefferedBy"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_RefferedBy"></slot></td>
			<td></td>
		</tr>
		 <tr>
		 	<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_DrID"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_DrID"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_Doctor"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_Doctor"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_DrDepartment"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_DrDepartment"></slot></td>
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
		<tr id="ProcedureIITem">
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_IncludePackage"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_IncludePackage"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_ProcedureName"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_ProcedureName"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_billing_voucher_print_ProcedureAmount"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_billing_voucher_print_ProcedureAmount"></slot></td>
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
    if (in_array("view_patient_services", explode(",", $Page->getCurrentDetailTable())) && $view_patient_services->DetailAdd) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("view_patient_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ViewPatientServicesGrid.php" ?>
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
    ew.applyTemplate("tpd_view_billing_voucher_printadd", "tpm_view_billing_voucher_printadd", "view_billing_voucher_printadd", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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

<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyBillingVoucherEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_billing_voucheredit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpharmacy_billing_voucheredit = currentForm = new ew.Form("fpharmacy_billing_voucheredit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_billing_voucher")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_billing_voucher)
        ew.vars.tables.pharmacy_billing_voucher = currentTable;
    fpharmacy_billing_voucheredit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["BillNumber", [fields.BillNumber.visible && fields.BillNumber.required ? ew.Validators.required(fields.BillNumber.caption) : null], fields.BillNumber.isInvalid],
        ["voucher_type", [fields.voucher_type.visible && fields.voucher_type.required ? ew.Validators.required(fields.voucher_type.caption) : null], fields.voucher_type.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Mobile", [fields.Mobile.visible && fields.Mobile.required ? ew.Validators.required(fields.Mobile.caption) : null], fields.Mobile.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["IP_OP", [fields.IP_OP.visible && fields.IP_OP.required ? ew.Validators.required(fields.IP_OP.caption) : null], fields.IP_OP.isInvalid],
        ["Doctor", [fields.Doctor.visible && fields.Doctor.required ? ew.Validators.required(fields.Doctor.caption) : null], fields.Doctor.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
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
        ["RIDNO", [fields.RIDNO.visible && fields.RIDNO.required ? ew.Validators.required(fields.RIDNO.caption) : null], fields.RIDNO.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["CId", [fields.CId.visible && fields.CId.required ? ew.Validators.required(fields.CId.caption) : null], fields.CId.isInvalid],
        ["PartnerName", [fields.PartnerName.visible && fields.PartnerName.required ? ew.Validators.required(fields.PartnerName.caption) : null], fields.PartnerName.isInvalid],
        ["PayerType", [fields.PayerType.visible && fields.PayerType.required ? ew.Validators.required(fields.PayerType.caption) : null], fields.PayerType.isInvalid],
        ["profilePic", [fields.profilePic.visible && fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["Dob", [fields.Dob.visible && fields.Dob.required ? ew.Validators.required(fields.Dob.caption) : null], fields.Dob.isInvalid],
        ["Currency", [fields.Currency.visible && fields.Currency.required ? ew.Validators.required(fields.Currency.caption) : null], fields.Currency.isInvalid],
        ["DiscountRemarks", [fields.DiscountRemarks.visible && fields.DiscountRemarks.required ? ew.Validators.required(fields.DiscountRemarks.caption) : null], fields.DiscountRemarks.isInvalid],
        ["Remarks", [fields.Remarks.visible && fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid],
        ["PatId", [fields.PatId.visible && fields.PatId.required ? ew.Validators.required(fields.PatId.caption) : null], fields.PatId.isInvalid],
        ["DrDepartment", [fields.DrDepartment.visible && fields.DrDepartment.required ? ew.Validators.required(fields.DrDepartment.caption) : null], fields.DrDepartment.isInvalid],
        ["RefferedBy", [fields.RefferedBy.visible && fields.RefferedBy.required ? ew.Validators.required(fields.RefferedBy.caption) : null], fields.RefferedBy.isInvalid],
        ["CardNumber", [fields.CardNumber.visible && fields.CardNumber.required ? ew.Validators.required(fields.CardNumber.caption) : null], fields.CardNumber.isInvalid],
        ["BankName", [fields.BankName.visible && fields.BankName.required ? ew.Validators.required(fields.BankName.caption) : null], fields.BankName.isInvalid],
        ["DrID", [fields.DrID.visible && fields.DrID.required ? ew.Validators.required(fields.DrID.caption) : null], fields.DrID.isInvalid],
        ["BillStatus", [fields.BillStatus.visible && fields.BillStatus.required ? ew.Validators.required(fields.BillStatus.caption) : null, ew.Validators.integer], fields.BillStatus.isInvalid],
        ["ReportHeader", [fields.ReportHeader.visible && fields.ReportHeader.required ? ew.Validators.required(fields.ReportHeader.caption) : null], fields.ReportHeader.isInvalid],
        ["PharID", [fields.PharID.visible && fields.PharID.required ? ew.Validators.required(fields.PharID.caption) : null], fields.PharID.isInvalid],
        ["_UserName", [fields._UserName.visible && fields._UserName.required ? ew.Validators.required(fields._UserName.caption) : null], fields._UserName.isInvalid],
        ["CardType", [fields.CardType.visible && fields.CardType.required ? ew.Validators.required(fields.CardType.caption) : null], fields.CardType.isInvalid],
        ["DiscountAmount", [fields.DiscountAmount.visible && fields.DiscountAmount.required ? ew.Validators.required(fields.DiscountAmount.caption) : null], fields.DiscountAmount.isInvalid],
        ["ApprovalNumber", [fields.ApprovalNumber.visible && fields.ApprovalNumber.required ? ew.Validators.required(fields.ApprovalNumber.caption) : null], fields.ApprovalNumber.isInvalid],
        ["Cash", [fields.Cash.visible && fields.Cash.required ? ew.Validators.required(fields.Cash.caption) : null, ew.Validators.float], fields.Cash.isInvalid],
        ["Card", [fields.Card.visible && fields.Card.required ? ew.Validators.required(fields.Card.caption) : null, ew.Validators.float], fields.Card.isInvalid],
        ["BillType", [fields.BillType.visible && fields.BillType.required ? ew.Validators.required(fields.BillType.caption) : null], fields.BillType.isInvalid],
        ["PartialSave", [fields.PartialSave.visible && fields.PartialSave.required ? ew.Validators.required(fields.PartialSave.caption) : null], fields.PartialSave.isInvalid],
        ["PatientGST", [fields.PatientGST.visible && fields.PatientGST.required ? ew.Validators.required(fields.PatientGST.caption) : null], fields.PatientGST.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_billing_voucheredit,
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
    fpharmacy_billing_voucheredit.validate = function () {
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
    fpharmacy_billing_voucheredit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_billing_voucheredit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_billing_voucheredit.lists.Reception = <?= $Page->Reception->toClientList($Page) ?>;
    fpharmacy_billing_voucheredit.lists.ModeofPayment = <?= $Page->ModeofPayment->toClientList($Page) ?>;
    fpharmacy_billing_voucheredit.lists.RIDNO = <?= $Page->RIDNO->toClientList($Page) ?>;
    fpharmacy_billing_voucheredit.lists.CId = <?= $Page->CId->toClientList($Page) ?>;
    fpharmacy_billing_voucheredit.lists.PatId = <?= $Page->PatId->toClientList($Page) ?>;
    fpharmacy_billing_voucheredit.lists.RefferedBy = <?= $Page->RefferedBy->toClientList($Page) ?>;
    fpharmacy_billing_voucheredit.lists.DrID = <?= $Page->DrID->toClientList($Page) ?>;
    fpharmacy_billing_voucheredit.lists.ReportHeader = <?= $Page->ReportHeader->toClientList($Page) ?>;
    fpharmacy_billing_voucheredit.lists.CardType = <?= $Page->CardType->toClientList($Page) ?>;
    fpharmacy_billing_voucheredit.lists.BillType = <?= $Page->BillType->toClientList($Page) ?>;
    fpharmacy_billing_voucheredit.lists.PartialSave = <?= $Page->PartialSave->toClientList($Page) ?>;
    loadjs.done("fpharmacy_billing_voucheredit");
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
<form name="fpharmacy_billing_voucheredit" id="fpharmacy_billing_voucheredit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_voucher">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_id"><span id="el_pharmacy_billing_voucher_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <div id="r_BillNumber" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_BillNumber" for="x_BillNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_BillNumber"><?= $Page->BillNumber->caption() ?><?= $Page->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillNumber->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_BillNumber"><span id="el_pharmacy_billing_voucher_BillNumber">
<span<?= $Page->BillNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BillNumber->getDisplayValue($Page->BillNumber->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="pharmacy_billing_voucher" data-field="x_BillNumber" data-hidden="1" name="x_BillNumber" id="x_BillNumber" value="<?= HtmlEncode($Page->BillNumber->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <div id="r_voucher_type" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_voucher_type" for="x_voucher_type" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_voucher_type"><?= $Page->voucher_type->caption() ?><?= $Page->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->voucher_type->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_voucher_type"><span id="el_pharmacy_billing_voucher_voucher_type">
<input type="<?= $Page->voucher_type->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->voucher_type->getPlaceHolder()) ?>" value="<?= $Page->voucher_type->EditValue ?>"<?= $Page->voucher_type->editAttributes() ?> aria-describedby="x_voucher_type_help">
<?= $Page->voucher_type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->voucher_type->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_Reception"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Reception"><span id="el_pharmacy_billing_voucher_Reception">
<div class="input-group ew-lookup-list" aria-describedby="x_Reception_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Reception"><?= EmptyValue(strval($Page->Reception->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Reception->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Reception->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Reception->ReadOnly || $Page->Reception->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Reception',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
<?= $Page->Reception->getCustomMessage() ?>
<?= $Page->Reception->Lookup->getParamTag($Page, "p_x_Reception") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_billing_voucher" data-field="x_Reception" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Reception->displayValueSeparatorAttribute() ?>" name="x_Reception" id="x_Reception" value="<?= $Page->Reception->CurrentValue ?>"<?= $Page->Reception->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_PatientId"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_PatientId"><span id="el_pharmacy_billing_voucher_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_PatientName"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_PatientName"><span id="el_pharmacy_billing_voucher_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <div id="r_Mobile" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_Mobile" for="x_Mobile" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_Mobile"><?= $Page->Mobile->caption() ?><?= $Page->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mobile->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Mobile"><span id="el_pharmacy_billing_voucher_Mobile">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?> aria-describedby="x_Mobile_help">
<?= $Page->Mobile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_Age"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Age"><span id="el_pharmacy_billing_voucher_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_mrnno"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_mrnno"><span id="el_pharmacy_billing_voucher_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IP_OP->Visible) { // IP_OP ?>
    <div id="r_IP_OP" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_IP_OP" for="x_IP_OP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_IP_OP"><?= $Page->IP_OP->caption() ?><?= $Page->IP_OP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IP_OP->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_IP_OP"><span id="el_pharmacy_billing_voucher_IP_OP">
<input type="<?= $Page->IP_OP->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_IP_OP" name="x_IP_OP" id="x_IP_OP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IP_OP->getPlaceHolder()) ?>" value="<?= $Page->IP_OP->EditValue ?>"<?= $Page->IP_OP->editAttributes() ?> aria-describedby="x_IP_OP_help">
<?= $Page->IP_OP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IP_OP->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
    <div id="r_Doctor" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_Doctor" for="x_Doctor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_Doctor"><?= $Page->Doctor->caption() ?><?= $Page->Doctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Doctor->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Doctor"><span id="el_pharmacy_billing_voucher_Doctor">
<input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?> aria-describedby="x_Doctor_help">
<?= $Page->Doctor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_Gender"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Gender"><span id="el_pharmacy_billing_voucher_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <div id="r_Details" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_Details" for="x_Details" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_Details"><?= $Page->Details->caption() ?><?= $Page->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Details->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Details"><span id="el_pharmacy_billing_voucher_Details">
<input type="<?= $Page->Details->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Details->getPlaceHolder()) ?>" value="<?= $Page->Details->EditValue ?>"<?= $Page->Details->editAttributes() ?> aria-describedby="x_Details_help">
<?= $Page->Details->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Details->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <div id="r_ModeofPayment" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_ModeofPayment" for="x_ModeofPayment" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_ModeofPayment"><?= $Page->ModeofPayment->caption() ?><?= $Page->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModeofPayment->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_ModeofPayment"><span id="el_pharmacy_billing_voucher_ModeofPayment">
    <select
        id="x_ModeofPayment"
        name="x_ModeofPayment"
        class="form-control ew-select<?= $Page->ModeofPayment->isInvalidClass() ?>"
        data-select2-id="pharmacy_billing_voucher_x_ModeofPayment"
        data-table="pharmacy_billing_voucher"
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
    var el = document.querySelector("select[data-select2-id='pharmacy_billing_voucher_x_ModeofPayment']"),
        options = { name: "x_ModeofPayment", selectId: "pharmacy_billing_voucher_x_ModeofPayment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_billing_voucher.fields.ModeofPayment.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_Amount" for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_Amount"><?= $Page->Amount->caption() ?><?= $Page->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Amount"><span id="el_pharmacy_billing_voucher_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?> aria-describedby="x_Amount_help">
<?= $Page->Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
    <div id="r_AnyDues" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_AnyDues" for="x_AnyDues" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_AnyDues"><?= $Page->AnyDues->caption() ?><?= $Page->AnyDues->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnyDues->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_AnyDues"><span id="el_pharmacy_billing_voucher_AnyDues">
<input type="<?= $Page->AnyDues->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AnyDues->getPlaceHolder()) ?>" value="<?= $Page->AnyDues->EditValue ?>"<?= $Page->AnyDues->editAttributes() ?> aria-describedby="x_AnyDues_help">
<?= $Page->AnyDues->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnyDues->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationAmount->Visible) { // RealizationAmount ?>
    <div id="r_RealizationAmount" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_RealizationAmount" for="x_RealizationAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_RealizationAmount"><?= $Page->RealizationAmount->caption() ?><?= $Page->RealizationAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationAmount->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_RealizationAmount"><span id="el_pharmacy_billing_voucher_RealizationAmount">
<input type="<?= $Page->RealizationAmount->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_RealizationAmount" name="x_RealizationAmount" id="x_RealizationAmount" size="30" placeholder="<?= HtmlEncode($Page->RealizationAmount->getPlaceHolder()) ?>" value="<?= $Page->RealizationAmount->EditValue ?>"<?= $Page->RealizationAmount->editAttributes() ?> aria-describedby="x_RealizationAmount_help">
<?= $Page->RealizationAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationStatus->Visible) { // RealizationStatus ?>
    <div id="r_RealizationStatus" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_RealizationStatus" for="x_RealizationStatus" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_RealizationStatus"><?= $Page->RealizationStatus->caption() ?><?= $Page->RealizationStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationStatus->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_RealizationStatus"><span id="el_pharmacy_billing_voucher_RealizationStatus">
<input type="<?= $Page->RealizationStatus->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_RealizationStatus" name="x_RealizationStatus" id="x_RealizationStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationStatus->getPlaceHolder()) ?>" value="<?= $Page->RealizationStatus->EditValue ?>"<?= $Page->RealizationStatus->editAttributes() ?> aria-describedby="x_RealizationStatus_help">
<?= $Page->RealizationStatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationStatus->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationRemarks->Visible) { // RealizationRemarks ?>
    <div id="r_RealizationRemarks" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_RealizationRemarks" for="x_RealizationRemarks" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_RealizationRemarks"><?= $Page->RealizationRemarks->caption() ?><?= $Page->RealizationRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationRemarks->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_RealizationRemarks"><span id="el_pharmacy_billing_voucher_RealizationRemarks">
<input type="<?= $Page->RealizationRemarks->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_RealizationRemarks" name="x_RealizationRemarks" id="x_RealizationRemarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationRemarks->getPlaceHolder()) ?>" value="<?= $Page->RealizationRemarks->EditValue ?>"<?= $Page->RealizationRemarks->editAttributes() ?> aria-describedby="x_RealizationRemarks_help">
<?= $Page->RealizationRemarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationRemarks->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
    <div id="r_RealizationBatchNo" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_RealizationBatchNo" for="x_RealizationBatchNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_RealizationBatchNo"><?= $Page->RealizationBatchNo->caption() ?><?= $Page->RealizationBatchNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationBatchNo->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_RealizationBatchNo"><span id="el_pharmacy_billing_voucher_RealizationBatchNo">
<input type="<?= $Page->RealizationBatchNo->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_RealizationBatchNo" name="x_RealizationBatchNo" id="x_RealizationBatchNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationBatchNo->getPlaceHolder()) ?>" value="<?= $Page->RealizationBatchNo->EditValue ?>"<?= $Page->RealizationBatchNo->editAttributes() ?> aria-describedby="x_RealizationBatchNo_help">
<?= $Page->RealizationBatchNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationBatchNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RealizationDate->Visible) { // RealizationDate ?>
    <div id="r_RealizationDate" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_RealizationDate" for="x_RealizationDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_RealizationDate"><?= $Page->RealizationDate->caption() ?><?= $Page->RealizationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RealizationDate->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_RealizationDate"><span id="el_pharmacy_billing_voucher_RealizationDate">
<input type="<?= $Page->RealizationDate->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_RealizationDate" name="x_RealizationDate" id="x_RealizationDate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RealizationDate->getPlaceHolder()) ?>" value="<?= $Page->RealizationDate->EditValue ?>"<?= $Page->RealizationDate->editAttributes() ?> aria-describedby="x_RealizationDate_help">
<?= $Page->RealizationDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RealizationDate->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <div id="r_RIDNO" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_RIDNO" for="x_RIDNO" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_RIDNO"><?= $Page->RIDNO->caption() ?><?= $Page->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNO->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_RIDNO"><span id="el_pharmacy_billing_voucher_RIDNO">
<div class="input-group ew-lookup-list" aria-describedby="x_RIDNO_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RIDNO"><?= EmptyValue(strval($Page->RIDNO->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->RIDNO->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->RIDNO->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->RIDNO->ReadOnly || $Page->RIDNO->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RIDNO',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->RIDNO->getErrorMessage() ?></div>
<?= $Page->RIDNO->getCustomMessage() ?>
<?= $Page->RIDNO->Lookup->getParamTag($Page, "p_x_RIDNO") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_billing_voucher" data-field="x_RIDNO" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->RIDNO->displayValueSeparatorAttribute() ?>" name="x_RIDNO" id="x_RIDNO" value="<?= $Page->RIDNO->CurrentValue ?>"<?= $Page->RIDNO->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_TidNo"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_TidNo"><span id="el_pharmacy_billing_voucher_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
    <div id="r_CId" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_CId" for="x_CId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_CId"><?= $Page->CId->caption() ?><?= $Page->CId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CId->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_CId"><span id="el_pharmacy_billing_voucher_CId">
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
<input type="hidden" is="selection-list" data-table="pharmacy_billing_voucher" data-field="x_CId" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->CId->displayValueSeparatorAttribute() ?>" name="x_CId" id="x_CId" value="<?= $Page->CId->CurrentValue ?>"<?= $Page->CId->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <div id="r_PartnerName" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_PartnerName" for="x_PartnerName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_PartnerName"><?= $Page->PartnerName->caption() ?><?= $Page->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerName->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_PartnerName"><span id="el_pharmacy_billing_voucher_PartnerName">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?> aria-describedby="x_PartnerName_help">
<?= $Page->PartnerName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PayerType->Visible) { // PayerType ?>
    <div id="r_PayerType" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_PayerType" for="x_PayerType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_PayerType"><?= $Page->PayerType->caption() ?><?= $Page->PayerType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PayerType->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_PayerType"><span id="el_pharmacy_billing_voucher_PayerType">
<input type="<?= $Page->PayerType->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_PayerType" name="x_PayerType" id="x_PayerType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PayerType->getPlaceHolder()) ?>" value="<?= $Page->PayerType->EditValue ?>"<?= $Page->PayerType->editAttributes() ?> aria-describedby="x_PayerType_help">
<?= $Page->PayerType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PayerType->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_profilePic"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_profilePic"><span id="el_pharmacy_billing_voucher_profilePic">
<textarea data-table="pharmacy_billing_voucher" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help"><?= $Page->profilePic->EditValue ?></textarea>
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Dob->Visible) { // Dob ?>
    <div id="r_Dob" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_Dob" for="x_Dob" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_Dob"><?= $Page->Dob->caption() ?><?= $Page->Dob->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Dob->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Dob"><span id="el_pharmacy_billing_voucher_Dob">
<input type="<?= $Page->Dob->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Dob" name="x_Dob" id="x_Dob" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Dob->getPlaceHolder()) ?>" value="<?= $Page->Dob->EditValue ?>"<?= $Page->Dob->editAttributes() ?> aria-describedby="x_Dob_help">
<?= $Page->Dob->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Dob->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <div id="r_Currency" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_Currency" for="x_Currency" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_Currency"><?= $Page->Currency->caption() ?><?= $Page->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Currency->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Currency"><span id="el_pharmacy_billing_voucher_Currency">
<input type="<?= $Page->Currency->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Currency->getPlaceHolder()) ?>" value="<?= $Page->Currency->EditValue ?>"<?= $Page->Currency->editAttributes() ?> aria-describedby="x_Currency_help">
<?= $Page->Currency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Currency->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DiscountRemarks->Visible) { // DiscountRemarks ?>
    <div id="r_DiscountRemarks" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_DiscountRemarks" for="x_DiscountRemarks" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_DiscountRemarks"><?= $Page->DiscountRemarks->caption() ?><?= $Page->DiscountRemarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DiscountRemarks->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_DiscountRemarks"><span id="el_pharmacy_billing_voucher_DiscountRemarks">
<input type="<?= $Page->DiscountRemarks->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_DiscountRemarks" name="x_DiscountRemarks" id="x_DiscountRemarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DiscountRemarks->getPlaceHolder()) ?>" value="<?= $Page->DiscountRemarks->EditValue ?>"<?= $Page->DiscountRemarks->editAttributes() ?> aria-describedby="x_DiscountRemarks_help">
<?= $Page->DiscountRemarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DiscountRemarks->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_Remarks" for="x_Remarks" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_Remarks"><?= $Page->Remarks->caption() ?><?= $Page->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Remarks->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Remarks"><span id="el_pharmacy_billing_voucher_Remarks">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?> aria-describedby="x_Remarks_help">
<?= $Page->Remarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
    <div id="r_PatId" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_PatId" for="x_PatId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_PatId"><?= $Page->PatId->caption() ?><?= $Page->PatId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatId->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_PatId"><span id="el_pharmacy_billing_voucher_PatId">
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
<input type="hidden" is="selection-list" data-table="pharmacy_billing_voucher" data-field="x_PatId" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PatId->displayValueSeparatorAttribute() ?>" name="x_PatId" id="x_PatId" value="<?= $Page->PatId->CurrentValue ?>"<?= $Page->PatId->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
    <div id="r_DrDepartment" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_DrDepartment" for="x_DrDepartment" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_DrDepartment"><?= $Page->DrDepartment->caption() ?><?= $Page->DrDepartment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrDepartment->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_DrDepartment"><span id="el_pharmacy_billing_voucher_DrDepartment">
<input type="<?= $Page->DrDepartment->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrDepartment->getPlaceHolder()) ?>" value="<?= $Page->DrDepartment->EditValue ?>"<?= $Page->DrDepartment->editAttributes() ?> aria-describedby="x_DrDepartment_help">
<?= $Page->DrDepartment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrDepartment->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RefferedBy->Visible) { // RefferedBy ?>
    <div id="r_RefferedBy" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_RefferedBy" for="x_RefferedBy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_RefferedBy"><?= $Page->RefferedBy->caption() ?><?= $Page->RefferedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefferedBy->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_RefferedBy"><span id="el_pharmacy_billing_voucher_RefferedBy">
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
<input type="hidden" is="selection-list" data-table="pharmacy_billing_voucher" data-field="x_RefferedBy" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->RefferedBy->displayValueSeparatorAttribute() ?>" name="x_RefferedBy" id="x_RefferedBy" value="<?= $Page->RefferedBy->CurrentValue ?>"<?= $Page->RefferedBy->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <div id="r_CardNumber" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_CardNumber" for="x_CardNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_CardNumber"><?= $Page->CardNumber->caption() ?><?= $Page->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CardNumber->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_CardNumber"><span id="el_pharmacy_billing_voucher_CardNumber">
<input type="<?= $Page->CardNumber->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CardNumber->getPlaceHolder()) ?>" value="<?= $Page->CardNumber->EditValue ?>"<?= $Page->CardNumber->editAttributes() ?> aria-describedby="x_CardNumber_help">
<?= $Page->CardNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CardNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <div id="r_BankName" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_BankName" for="x_BankName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_BankName"><?= $Page->BankName->caption() ?><?= $Page->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BankName->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_BankName"><span id="el_pharmacy_billing_voucher_BankName">
<input type="<?= $Page->BankName->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BankName->getPlaceHolder()) ?>" value="<?= $Page->BankName->EditValue ?>"<?= $Page->BankName->editAttributes() ?> aria-describedby="x_BankName_help">
<?= $Page->BankName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BankName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <div id="r_DrID" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_DrID" for="x_DrID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_DrID"><?= $Page->DrID->caption() ?><?= $Page->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrID->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_DrID"><span id="el_pharmacy_billing_voucher_DrID">
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
<input type="hidden" is="selection-list" data-table="pharmacy_billing_voucher" data-field="x_DrID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DrID->displayValueSeparatorAttribute() ?>" name="x_DrID" id="x_DrID" value="<?= $Page->DrID->CurrentValue ?>"<?= $Page->DrID->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillStatus->Visible) { // BillStatus ?>
    <div id="r_BillStatus" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_BillStatus" for="x_BillStatus" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_BillStatus"><?= $Page->BillStatus->caption() ?><?= $Page->BillStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillStatus->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_BillStatus"><span id="el_pharmacy_billing_voucher_BillStatus">
<input type="<?= $Page->BillStatus->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?= HtmlEncode($Page->BillStatus->getPlaceHolder()) ?>" value="<?= $Page->BillStatus->EditValue ?>"<?= $Page->BillStatus->editAttributes() ?> aria-describedby="x_BillStatus_help">
<?= $Page->BillStatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillStatus->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
    <div id="r_ReportHeader" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_ReportHeader" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_ReportHeader"><?= $Page->ReportHeader->caption() ?><?= $Page->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReportHeader->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_ReportHeader"><span id="el_pharmacy_billing_voucher_ReportHeader">
<template id="tp_x_ReportHeader">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader"<?= $Page->ReportHeader->editAttributes() ?>>
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
    data-table="pharmacy_billing_voucher"
    data-field="x_ReportHeader"
    data-value-separator="<?= $Page->ReportHeader->displayValueSeparatorAttribute() ?>"
    <?= $Page->ReportHeader->editAttributes() ?>>
<?= $Page->ReportHeader->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReportHeader->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CardType->Visible) { // CardType ?>
    <div id="r_CardType" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_CardType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_CardType"><?= $Page->CardType->caption() ?><?= $Page->CardType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CardType->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_CardType"><span id="el_pharmacy_billing_voucher_CardType">
<template id="tp_x_CardType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_CardType" name="x_CardType" id="x_CardType"<?= $Page->CardType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_CardType" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_CardType"
    name="x_CardType"
    value="<?= HtmlEncode($Page->CardType->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_CardType"
    data-target="dsl_x_CardType"
    data-repeatcolumn="5"
    class="form-control<?= $Page->CardType->isInvalidClass() ?>"
    data-table="pharmacy_billing_voucher"
    data-field="x_CardType"
    data-value-separator="<?= $Page->CardType->displayValueSeparatorAttribute() ?>"
    <?= $Page->CardType->editAttributes() ?>>
<?= $Page->CardType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CardType->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DiscountAmount->Visible) { // DiscountAmount ?>
    <div id="r_DiscountAmount" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_DiscountAmount" for="x_DiscountAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_DiscountAmount"><?= $Page->DiscountAmount->caption() ?><?= $Page->DiscountAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DiscountAmount->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_DiscountAmount"><span id="el_pharmacy_billing_voucher_DiscountAmount">
<input type="<?= $Page->DiscountAmount->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_DiscountAmount" name="x_DiscountAmount" id="x_DiscountAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DiscountAmount->getPlaceHolder()) ?>" value="<?= $Page->DiscountAmount->EditValue ?>"<?= $Page->DiscountAmount->editAttributes() ?> aria-describedby="x_DiscountAmount_help">
<?= $Page->DiscountAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DiscountAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ApprovalNumber->Visible) { // ApprovalNumber ?>
    <div id="r_ApprovalNumber" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_ApprovalNumber" for="x_ApprovalNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_ApprovalNumber"><?= $Page->ApprovalNumber->caption() ?><?= $Page->ApprovalNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ApprovalNumber->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_ApprovalNumber"><span id="el_pharmacy_billing_voucher_ApprovalNumber">
<input type="<?= $Page->ApprovalNumber->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_ApprovalNumber" name="x_ApprovalNumber" id="x_ApprovalNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ApprovalNumber->getPlaceHolder()) ?>" value="<?= $Page->ApprovalNumber->EditValue ?>"<?= $Page->ApprovalNumber->editAttributes() ?> aria-describedby="x_ApprovalNumber_help">
<?= $Page->ApprovalNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ApprovalNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Cash->Visible) { // Cash ?>
    <div id="r_Cash" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_Cash" for="x_Cash" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_Cash"><?= $Page->Cash->caption() ?><?= $Page->Cash->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Cash->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Cash"><span id="el_pharmacy_billing_voucher_Cash">
<input type="<?= $Page->Cash->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Cash" name="x_Cash" id="x_Cash" size="30" placeholder="<?= HtmlEncode($Page->Cash->getPlaceHolder()) ?>" value="<?= $Page->Cash->EditValue ?>"<?= $Page->Cash->editAttributes() ?> aria-describedby="x_Cash_help">
<?= $Page->Cash->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Cash->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
    <div id="r_Card" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_Card" for="x_Card" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_Card"><?= $Page->Card->caption() ?><?= $Page->Card->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Card->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_Card"><span id="el_pharmacy_billing_voucher_Card">
<input type="<?= $Page->Card->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_Card" name="x_Card" id="x_Card" size="30" placeholder="<?= HtmlEncode($Page->Card->getPlaceHolder()) ?>" value="<?= $Page->Card->EditValue ?>"<?= $Page->Card->editAttributes() ?> aria-describedby="x_Card_help">
<?= $Page->Card->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Card->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
    <div id="r_BillType" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_BillType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_BillType"><?= $Page->BillType->caption() ?><?= $Page->BillType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillType->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_BillType"><span id="el_pharmacy_billing_voucher_BillType">
<template id="tp_x_BillType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_BillType" name="x_BillType" id="x_BillType"<?= $Page->BillType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_BillType" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_BillType"
    name="x_BillType"
    value="<?= HtmlEncode($Page->BillType->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_BillType"
    data-target="dsl_x_BillType"
    data-repeatcolumn="5"
    class="form-control<?= $Page->BillType->isInvalidClass() ?>"
    data-table="pharmacy_billing_voucher"
    data-field="x_BillType"
    data-value-separator="<?= $Page->BillType->displayValueSeparatorAttribute() ?>"
    <?= $Page->BillType->editAttributes() ?>>
<?= $Page->BillType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillType->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartialSave->Visible) { // PartialSave ?>
    <div id="r_PartialSave" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_PartialSave" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_PartialSave"><?= $Page->PartialSave->caption() ?><?= $Page->PartialSave->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartialSave->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_PartialSave"><span id="el_pharmacy_billing_voucher_PartialSave">
<template id="tp_x_PartialSave">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="pharmacy_billing_voucher" data-field="x_PartialSave" name="x_PartialSave" id="x_PartialSave"<?= $Page->PartialSave->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_PartialSave" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_PartialSave[]"
    name="x_PartialSave[]"
    value="<?= HtmlEncode($Page->PartialSave->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_PartialSave"
    data-target="dsl_x_PartialSave"
    data-repeatcolumn="5"
    class="form-control<?= $Page->PartialSave->isInvalidClass() ?>"
    data-table="pharmacy_billing_voucher"
    data-field="x_PartialSave"
    data-value-separator="<?= $Page->PartialSave->displayValueSeparatorAttribute() ?>"
    <?= $Page->PartialSave->editAttributes() ?>>
<?= $Page->PartialSave->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartialSave->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientGST->Visible) { // PatientGST ?>
    <div id="r_PatientGST" class="form-group row">
        <label id="elh_pharmacy_billing_voucher_PatientGST" for="x_PatientGST" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_voucher_PatientGST"><?= $Page->PatientGST->caption() ?><?= $Page->PatientGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientGST->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_voucher_PatientGST"><span id="el_pharmacy_billing_voucher_PatientGST">
<input type="<?= $Page->PatientGST->getInputTextType() ?>" data-table="pharmacy_billing_voucher" data-field="x_PatientGST" name="x_PatientGST" id="x_PatientGST" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientGST->getPlaceHolder()) ?>" value="<?= $Page->PatientGST->EditValue ?>"<?= $Page->PatientGST->editAttributes() ?> aria-describedby="x_PatientGST_help">
<?= $Page->PatientGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientGST->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_pharmacy_billing_voucheredit" class="ew-custom-template"></div>
<template id="tpm_pharmacy_billing_voucheredit">
<div id="ct_PharmacyBillingVoucherEdit"><style>
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
	<slot class="ew-slot" name="tpc_pharmacy_billing_voucher_BillNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_BillNumber"></slot>
<div class="row">
	<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_PatId"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_PatId"></slot></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_RIDNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_RIDNO"></slot></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_CId"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_CId"></slot></h3>
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
		<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_PatientId"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_PatientId"></slot></td>
			<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_PatientName"></slot></td>
			<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_Mobile"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_Mobile"></slot></td>
		</tr>
		<tr>
			<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_Dob"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_Dob"></slot></td>
		<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_Age"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_Age"></slot></td>
			<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_Gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_Gender"></slot></td>
		</tr>
		<tr>
			<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_PartnerName"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_PartnerName"></slot></td>
			<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_PayerType"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_PayerType"></slot></td>
			<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_RefferedBy"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_RefferedBy"></slot></td>
			<td></td>
		</tr>
		 <tr>
		 	<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_DrID"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_DrID"></slot></td>
			<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_Doctor"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_Doctor"></slot></td>
			<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_DrDepartment"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_DrDepartment"></slot></td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<table class="">
	 <tbody>
		<tr>
			<td>
				<slot class="ew-slot" name="tpc_pharmacy_billing_voucher_ReportHeader"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_ReportHeader"></slot>
			</td>
			<td>
				<slot class="ew-slot" name="tpc_pharmacy_billing_voucher_BillType"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_BillType"></slot>
			</td>
			<td>
				<slot class="ew-slot" name="tpc_pharmacy_billing_voucher_PatientGST"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_PatientGST"></slot>
			</td>
		</tr>
	</tbody>
</table>
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
			<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_ModeofPayment"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_ModeofPayment"></slot></td>
			<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_Amount"></slot></td>
			<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_AnyDues"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_AnyDues"></slot></td>
		</tr>
		<tr>
			<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_DiscountRemarks"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_DiscountRemarks"></slot></td>
			<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_Remarks"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_Remarks"></slot></td>
			<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_DiscountAmount"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_DiscountAmount"></slot></td>
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
		<tr id="viewCardType">
			<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_CardType"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_CardType"></slot></td>
			<td id="viewCash"><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_Cash"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_Cash"></slot></td>
			<td id="viewCard"><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_Card"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_Card"></slot></td>
		</tr>
		<tr>
			<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_CardNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_CardNumber"></slot></td>
			<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_BankName"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_BankName"></slot></td>
			<td><slot class="ew-slot" name="tpc_pharmacy_billing_voucher_ApprovalNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_ApprovalNumber"></slot></td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
<slot class="ew-slot" name="tpc_pharmacy_billing_voucher_PartialSave"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_voucher_PartialSave"></slot>   
</div>
</template>
<?php
    if (in_array("pharmacy_pharled", explode(",", $Page->getCurrentDetailTable())) && $pharmacy_pharled->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("pharmacy_pharled", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PharmacyPharledGrid.php" ?>
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
    ew.applyTemplate("tpd_pharmacy_billing_voucheredit", "tpm_pharmacy_billing_voucheredit", "pharmacy_billing_voucheredit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("pharmacy_billing_voucher");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    function addtotalSum(){for(var e=0,a=1;a<100;a++)try{var t=document.getElementById("x"+a+"_DAMT");if(""!=t.value)e=parseFloat(e)+parseFloat(t.value),document.getElementById("x"+a+"_SiNo").value=a;document.getElementById("x"+a+"_RT");if(""!=document.getElementById("sv_x"+a+"_Product").value)document.getElementById("x"+a+"_SiNo").value=a}catch(e){}var d=document.getElementById("x_DiscountAmount").value,n=document.getElementById("x_Amount"),i=parseFloat(e)-parseFloat(d),m=Math.round(i);n.value=m.toFixed(2)}document.getElementById("viewBankName").style.display="none",$("[data-name='PRC']").hide(),$("[data-name='UR']").hide(),$("[data-name='Product']").hide(),$("[data-name='baid']").hide(),$("[data-name='isdate']").hide(),$("[data-name='PCGST']").hide(),$("[data-name='PSGST']").hide(),$("[data-name='PUnit']").hide(),$("[data-name='PurRate']").hide(),$("[data-name='PurValue']").hide(),$("[data-name='SCGST']").hide(),$("[data-name='SSGST']").hide(),$("[data-name='SUnit']").hide(),$("[data-name='id']").hide();var HospitalIDDD="<?php echo HospitalID(); ?>",grpButton='<input type="hidden" id="HospitalIDDD" name="HospitalIDDD" value="'+HospitalIDDD+'">',searchfrm=document.getElementById("tbl_view_patient_servicesgrid"),node=document.createElement("div");node.innerHTML=grpButton,searchfrm.appendChild(node);
});
</script>

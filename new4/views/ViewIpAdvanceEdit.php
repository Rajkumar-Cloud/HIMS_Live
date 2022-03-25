<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIpAdvanceEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_ip_advanceedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fview_ip_advanceedit = currentForm = new ew.Form("fview_ip_advanceedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_ip_advance")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_ip_advance)
        ew.vars.tables.view_ip_advance = currentTable;
    fview_ip_advanceedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["Mobile", [fields.Mobile.visible && fields.Mobile.required ? ew.Validators.required(fields.Mobile.caption) : null], fields.Mobile.isInvalid],
        ["voucher_type", [fields.voucher_type.visible && fields.voucher_type.required ? ew.Validators.required(fields.voucher_type.caption) : null], fields.voucher_type.isInvalid],
        ["Details", [fields.Details.visible && fields.Details.required ? ew.Validators.required(fields.Details.caption) : null], fields.Details.isInvalid],
        ["ModeofPayment", [fields.ModeofPayment.visible && fields.ModeofPayment.required ? ew.Validators.required(fields.ModeofPayment.caption) : null], fields.ModeofPayment.isInvalid],
        ["Amount", [fields.Amount.visible && fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid],
        ["AnyDues", [fields.AnyDues.visible && fields.AnyDues.required ? ew.Validators.required(fields.AnyDues.caption) : null], fields.AnyDues.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["PatientID", [fields.PatientID.visible && fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["VisiteType", [fields.VisiteType.visible && fields.VisiteType.required ? ew.Validators.required(fields.VisiteType.caption) : null], fields.VisiteType.isInvalid],
        ["VisitDate", [fields.VisitDate.visible && fields.VisitDate.required ? ew.Validators.required(fields.VisitDate.caption) : null, ew.Validators.datetime(0)], fields.VisitDate.isInvalid],
        ["AdvanceNo", [fields.AdvanceNo.visible && fields.AdvanceNo.required ? ew.Validators.required(fields.AdvanceNo.caption) : null], fields.AdvanceNo.isInvalid],
        ["Status", [fields.Status.visible && fields.Status.required ? ew.Validators.required(fields.Status.caption) : null], fields.Status.isInvalid],
        ["Date", [fields.Date.visible && fields.Date.required ? ew.Validators.required(fields.Date.caption) : null, ew.Validators.datetime(0)], fields.Date.isInvalid],
        ["AdvanceValidityDate", [fields.AdvanceValidityDate.visible && fields.AdvanceValidityDate.required ? ew.Validators.required(fields.AdvanceValidityDate.caption) : null, ew.Validators.datetime(0)], fields.AdvanceValidityDate.isInvalid],
        ["TotalRemainingAdvance", [fields.TotalRemainingAdvance.visible && fields.TotalRemainingAdvance.required ? ew.Validators.required(fields.TotalRemainingAdvance.caption) : null], fields.TotalRemainingAdvance.isInvalid],
        ["Remarks", [fields.Remarks.visible && fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid],
        ["SeectPaymentMode", [fields.SeectPaymentMode.visible && fields.SeectPaymentMode.required ? ew.Validators.required(fields.SeectPaymentMode.caption) : null], fields.SeectPaymentMode.isInvalid],
        ["PaidAmount", [fields.PaidAmount.visible && fields.PaidAmount.required ? ew.Validators.required(fields.PaidAmount.caption) : null], fields.PaidAmount.isInvalid],
        ["Currency", [fields.Currency.visible && fields.Currency.required ? ew.Validators.required(fields.Currency.caption) : null], fields.Currency.isInvalid],
        ["CardNumber", [fields.CardNumber.visible && fields.CardNumber.required ? ew.Validators.required(fields.CardNumber.caption) : null], fields.CardNumber.isInvalid],
        ["BankName", [fields.BankName.visible && fields.BankName.required ? ew.Validators.required(fields.BankName.caption) : null], fields.BankName.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_ip_advanceedit,
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
    fview_ip_advanceedit.validate = function () {
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
    fview_ip_advanceedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_ip_advanceedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_ip_advanceedit.lists.ModeofPayment = <?= $Page->ModeofPayment->toClientList($Page) ?>;
    loadjs.done("fview_ip_advanceedit");
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
<form name="fview_ip_advanceedit" id="fview_ip_advanceedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ip_advance">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_mrnNo" value="<?= HtmlEncode($Page->mrnno->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?= HtmlEncode($Page->PatID->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_view_ip_advance_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_view_ip_advance_id"><span id="el_view_ip_advance_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_advance" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_view_ip_advance_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_Name"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<template id="tpx_view_ip_advance_Name"><span id="el_view_ip_advance_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <div id="r_Mobile" class="form-group row">
        <label id="elh_view_ip_advance_Mobile" for="x_Mobile" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_Mobile"><?= $Page->Mobile->caption() ?><?= $Page->Mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mobile->cellAttributes() ?>>
<template id="tpx_view_ip_advance_Mobile"><span id="el_view_ip_advance_Mobile">
<input type="<?= $Page->Mobile->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Mobile" name="x_Mobile" id="x_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mobile->getPlaceHolder()) ?>" value="<?= $Page->Mobile->EditValue ?>"<?= $Page->Mobile->editAttributes() ?> aria-describedby="x_Mobile_help">
<?= $Page->Mobile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mobile->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <div id="r_voucher_type" class="form-group row">
        <label id="elh_view_ip_advance_voucher_type" for="x_voucher_type" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_voucher_type"><?= $Page->voucher_type->caption() ?><?= $Page->voucher_type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->voucher_type->cellAttributes() ?>>
<template id="tpx_view_ip_advance_voucher_type"><span id="el_view_ip_advance_voucher_type">
<input type="<?= $Page->voucher_type->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_voucher_type" name="x_voucher_type" id="x_voucher_type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->voucher_type->getPlaceHolder()) ?>" value="<?= $Page->voucher_type->EditValue ?>"<?= $Page->voucher_type->editAttributes() ?> aria-describedby="x_voucher_type_help">
<?= $Page->voucher_type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->voucher_type->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <div id="r_Details" class="form-group row">
        <label id="elh_view_ip_advance_Details" for="x_Details" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_Details"><?= $Page->Details->caption() ?><?= $Page->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Details->cellAttributes() ?>>
<template id="tpx_view_ip_advance_Details"><span id="el_view_ip_advance_Details">
<input type="<?= $Page->Details->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Details->getPlaceHolder()) ?>" value="<?= $Page->Details->EditValue ?>"<?= $Page->Details->editAttributes() ?> aria-describedby="x_Details_help">
<?= $Page->Details->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Details->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <div id="r_ModeofPayment" class="form-group row">
        <label id="elh_view_ip_advance_ModeofPayment" for="x_ModeofPayment" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_ModeofPayment"><?= $Page->ModeofPayment->caption() ?><?= $Page->ModeofPayment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModeofPayment->cellAttributes() ?>>
<template id="tpx_view_ip_advance_ModeofPayment"><span id="el_view_ip_advance_ModeofPayment">
    <select
        id="x_ModeofPayment"
        name="x_ModeofPayment"
        class="form-control ew-select<?= $Page->ModeofPayment->isInvalidClass() ?>"
        data-select2-id="view_ip_advance_x_ModeofPayment"
        data-table="view_ip_advance"
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
    var el = document.querySelector("select[data-select2-id='view_ip_advance_x_ModeofPayment']"),
        options = { name: "x_ModeofPayment", selectId: "view_ip_advance_x_ModeofPayment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ip_advance.fields.ModeofPayment.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label id="elh_view_ip_advance_Amount" for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_Amount"><?= $Page->Amount->caption() ?><?= $Page->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
<template id="tpx_view_ip_advance_Amount"><span id="el_view_ip_advance_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?> aria-describedby="x_Amount_help">
<?= $Page->Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
    <div id="r_AnyDues" class="form-group row">
        <label id="elh_view_ip_advance_AnyDues" for="x_AnyDues" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_AnyDues"><?= $Page->AnyDues->caption() ?><?= $Page->AnyDues->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnyDues->cellAttributes() ?>>
<template id="tpx_view_ip_advance_AnyDues"><span id="el_view_ip_advance_AnyDues">
<input type="<?= $Page->AnyDues->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_AnyDues" name="x_AnyDues" id="x_AnyDues" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AnyDues->getPlaceHolder()) ?>" value="<?= $Page->AnyDues->EditValue ?>"<?= $Page->AnyDues->editAttributes() ?> aria-describedby="x_AnyDues_help">
<?= $Page->AnyDues->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnyDues->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_view_ip_advance_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_PatID"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<template id="tpx_view_ip_advance_PatID"><span id="el_view_ip_advance_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatID->getDisplayValue($Page->PatID->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_advance" data-field="x_PatID" data-hidden="1" name="x_PatID" id="x_PatID" value="<?= HtmlEncode($Page->PatID->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_view_ip_advance_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_PatientID"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx_view_ip_advance_PatientID"><span id="el_view_ip_advance_PatientID">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?> aria-describedby="x_PatientID_help">
<?= $Page->PatientID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_view_ip_advance_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_PatientName"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_view_ip_advance_PatientName"><span id="el_view_ip_advance_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VisiteType->Visible) { // VisiteType ?>
    <div id="r_VisiteType" class="form-group row">
        <label id="elh_view_ip_advance_VisiteType" for="x_VisiteType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_VisiteType"><?= $Page->VisiteType->caption() ?><?= $Page->VisiteType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VisiteType->cellAttributes() ?>>
<template id="tpx_view_ip_advance_VisiteType"><span id="el_view_ip_advance_VisiteType">
<input type="<?= $Page->VisiteType->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_VisiteType" name="x_VisiteType" id="x_VisiteType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VisiteType->getPlaceHolder()) ?>" value="<?= $Page->VisiteType->EditValue ?>"<?= $Page->VisiteType->editAttributes() ?> aria-describedby="x_VisiteType_help">
<?= $Page->VisiteType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->VisiteType->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VisitDate->Visible) { // VisitDate ?>
    <div id="r_VisitDate" class="form-group row">
        <label id="elh_view_ip_advance_VisitDate" for="x_VisitDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_VisitDate"><?= $Page->VisitDate->caption() ?><?= $Page->VisitDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VisitDate->cellAttributes() ?>>
<template id="tpx_view_ip_advance_VisitDate"><span id="el_view_ip_advance_VisitDate">
<input type="<?= $Page->VisitDate->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_VisitDate" name="x_VisitDate" id="x_VisitDate" placeholder="<?= HtmlEncode($Page->VisitDate->getPlaceHolder()) ?>" value="<?= $Page->VisitDate->EditValue ?>"<?= $Page->VisitDate->editAttributes() ?> aria-describedby="x_VisitDate_help">
<?= $Page->VisitDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->VisitDate->getErrorMessage() ?></div>
<?php if (!$Page->VisitDate->ReadOnly && !$Page->VisitDate->Disabled && !isset($Page->VisitDate->EditAttrs["readonly"]) && !isset($Page->VisitDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advanceedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_advanceedit", "x_VisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdvanceNo->Visible) { // AdvanceNo ?>
    <div id="r_AdvanceNo" class="form-group row">
        <label id="elh_view_ip_advance_AdvanceNo" for="x_AdvanceNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_AdvanceNo"><?= $Page->AdvanceNo->caption() ?><?= $Page->AdvanceNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdvanceNo->cellAttributes() ?>>
<template id="tpx_view_ip_advance_AdvanceNo"><span id="el_view_ip_advance_AdvanceNo">
<input type="<?= $Page->AdvanceNo->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_AdvanceNo" name="x_AdvanceNo" id="x_AdvanceNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AdvanceNo->getPlaceHolder()) ?>" value="<?= $Page->AdvanceNo->EditValue ?>"<?= $Page->AdvanceNo->editAttributes() ?> aria-describedby="x_AdvanceNo_help">
<?= $Page->AdvanceNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AdvanceNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <div id="r_Status" class="form-group row">
        <label id="elh_view_ip_advance_Status" for="x_Status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_Status"><?= $Page->Status->caption() ?><?= $Page->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Status->cellAttributes() ?>>
<template id="tpx_view_ip_advance_Status"><span id="el_view_ip_advance_Status">
<input type="<?= $Page->Status->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Status" name="x_Status" id="x_Status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Status->getPlaceHolder()) ?>" value="<?= $Page->Status->EditValue ?>"<?= $Page->Status->editAttributes() ?> aria-describedby="x_Status_help">
<?= $Page->Status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Status->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
    <div id="r_Date" class="form-group row">
        <label id="elh_view_ip_advance_Date" for="x_Date" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_Date"><?= $Page->Date->caption() ?><?= $Page->Date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Date->cellAttributes() ?>>
<template id="tpx_view_ip_advance_Date"><span id="el_view_ip_advance_Date">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Date" name="x_Date" id="x_Date" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue ?>"<?= $Page->Date->editAttributes() ?> aria-describedby="x_Date_help">
<?= $Page->Date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage() ?></div>
<?php if (!$Page->Date->ReadOnly && !$Page->Date->Disabled && !isset($Page->Date->EditAttrs["readonly"]) && !isset($Page->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advanceedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_advanceedit", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
    <div id="r_AdvanceValidityDate" class="form-group row">
        <label id="elh_view_ip_advance_AdvanceValidityDate" for="x_AdvanceValidityDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_AdvanceValidityDate"><?= $Page->AdvanceValidityDate->caption() ?><?= $Page->AdvanceValidityDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdvanceValidityDate->cellAttributes() ?>>
<template id="tpx_view_ip_advance_AdvanceValidityDate"><span id="el_view_ip_advance_AdvanceValidityDate">
<input type="<?= $Page->AdvanceValidityDate->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_AdvanceValidityDate" name="x_AdvanceValidityDate" id="x_AdvanceValidityDate" placeholder="<?= HtmlEncode($Page->AdvanceValidityDate->getPlaceHolder()) ?>" value="<?= $Page->AdvanceValidityDate->EditValue ?>"<?= $Page->AdvanceValidityDate->editAttributes() ?> aria-describedby="x_AdvanceValidityDate_help">
<?= $Page->AdvanceValidityDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AdvanceValidityDate->getErrorMessage() ?></div>
<?php if (!$Page->AdvanceValidityDate->ReadOnly && !$Page->AdvanceValidityDate->Disabled && !isset($Page->AdvanceValidityDate->EditAttrs["readonly"]) && !isset($Page->AdvanceValidityDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_advanceedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_advanceedit", "x_AdvanceValidityDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
    <div id="r_TotalRemainingAdvance" class="form-group row">
        <label id="elh_view_ip_advance_TotalRemainingAdvance" for="x_TotalRemainingAdvance" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_TotalRemainingAdvance"><?= $Page->TotalRemainingAdvance->caption() ?><?= $Page->TotalRemainingAdvance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalRemainingAdvance->cellAttributes() ?>>
<template id="tpx_view_ip_advance_TotalRemainingAdvance"><span id="el_view_ip_advance_TotalRemainingAdvance">
<input type="<?= $Page->TotalRemainingAdvance->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_TotalRemainingAdvance" name="x_TotalRemainingAdvance" id="x_TotalRemainingAdvance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TotalRemainingAdvance->getPlaceHolder()) ?>" value="<?= $Page->TotalRemainingAdvance->EditValue ?>"<?= $Page->TotalRemainingAdvance->editAttributes() ?> aria-describedby="x_TotalRemainingAdvance_help">
<?= $Page->TotalRemainingAdvance->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalRemainingAdvance->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <div id="r_Remarks" class="form-group row">
        <label id="elh_view_ip_advance_Remarks" for="x_Remarks" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_Remarks"><?= $Page->Remarks->caption() ?><?= $Page->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Remarks->cellAttributes() ?>>
<template id="tpx_view_ip_advance_Remarks"><span id="el_view_ip_advance_Remarks">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?> aria-describedby="x_Remarks_help">
<?= $Page->Remarks->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
    <div id="r_SeectPaymentMode" class="form-group row">
        <label id="elh_view_ip_advance_SeectPaymentMode" for="x_SeectPaymentMode" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_SeectPaymentMode"><?= $Page->SeectPaymentMode->caption() ?><?= $Page->SeectPaymentMode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SeectPaymentMode->cellAttributes() ?>>
<template id="tpx_view_ip_advance_SeectPaymentMode"><span id="el_view_ip_advance_SeectPaymentMode">
<input type="<?= $Page->SeectPaymentMode->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_SeectPaymentMode" name="x_SeectPaymentMode" id="x_SeectPaymentMode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SeectPaymentMode->getPlaceHolder()) ?>" value="<?= $Page->SeectPaymentMode->EditValue ?>"<?= $Page->SeectPaymentMode->editAttributes() ?> aria-describedby="x_SeectPaymentMode_help">
<?= $Page->SeectPaymentMode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SeectPaymentMode->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
    <div id="r_PaidAmount" class="form-group row">
        <label id="elh_view_ip_advance_PaidAmount" for="x_PaidAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_PaidAmount"><?= $Page->PaidAmount->caption() ?><?= $Page->PaidAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaidAmount->cellAttributes() ?>>
<template id="tpx_view_ip_advance_PaidAmount"><span id="el_view_ip_advance_PaidAmount">
<input type="<?= $Page->PaidAmount->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_PaidAmount" name="x_PaidAmount" id="x_PaidAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaidAmount->getPlaceHolder()) ?>" value="<?= $Page->PaidAmount->EditValue ?>"<?= $Page->PaidAmount->editAttributes() ?> aria-describedby="x_PaidAmount_help">
<?= $Page->PaidAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PaidAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <div id="r_Currency" class="form-group row">
        <label id="elh_view_ip_advance_Currency" for="x_Currency" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_Currency"><?= $Page->Currency->caption() ?><?= $Page->Currency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Currency->cellAttributes() ?>>
<template id="tpx_view_ip_advance_Currency"><span id="el_view_ip_advance_Currency">
<input type="<?= $Page->Currency->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_Currency" name="x_Currency" id="x_Currency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Currency->getPlaceHolder()) ?>" value="<?= $Page->Currency->EditValue ?>"<?= $Page->Currency->editAttributes() ?> aria-describedby="x_Currency_help">
<?= $Page->Currency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Currency->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <div id="r_CardNumber" class="form-group row">
        <label id="elh_view_ip_advance_CardNumber" for="x_CardNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_CardNumber"><?= $Page->CardNumber->caption() ?><?= $Page->CardNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CardNumber->cellAttributes() ?>>
<template id="tpx_view_ip_advance_CardNumber"><span id="el_view_ip_advance_CardNumber">
<input type="<?= $Page->CardNumber->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_CardNumber" name="x_CardNumber" id="x_CardNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CardNumber->getPlaceHolder()) ?>" value="<?= $Page->CardNumber->EditValue ?>"<?= $Page->CardNumber->editAttributes() ?> aria-describedby="x_CardNumber_help">
<?= $Page->CardNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CardNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <div id="r_BankName" class="form-group row">
        <label id="elh_view_ip_advance_BankName" for="x_BankName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_BankName"><?= $Page->BankName->caption() ?><?= $Page->BankName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BankName->cellAttributes() ?>>
<template id="tpx_view_ip_advance_BankName"><span id="el_view_ip_advance_BankName">
<input type="<?= $Page->BankName->getInputTextType() ?>" data-table="view_ip_advance" data-field="x_BankName" name="x_BankName" id="x_BankName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BankName->getPlaceHolder()) ?>" value="<?= $Page->BankName->EditValue ?>"<?= $Page->BankName->editAttributes() ?> aria-describedby="x_BankName_help">
<?= $Page->BankName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BankName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_view_ip_advance_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_Reception"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<template id="tpx_view_ip_advance_Reception"><span id="el_view_ip_advance_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Reception->getDisplayValue($Page->Reception->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_advance" data-field="x_Reception" data-hidden="1" name="x_Reception" id="x_Reception" value="<?= HtmlEncode($Page->Reception->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_view_ip_advance_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_advance_mrnno"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<template id="tpx_view_ip_advance_mrnno"><span id="el_view_ip_advance_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_advance" data-field="x_mrnno" data-hidden="1" name="x_mrnno" id="x_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_ip_advanceedit" class="ew-custom-template"></div>
<template id="tpm_view_ip_advanceedit">
<div id="ct_ViewIpAdvanceEdit"><style>
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
<div class="row">
	<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_view_ip_advance_PatID"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_advance_PatID"></slot></h3>
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
		<td><slot class="ew-slot" name="tpc_view_ip_advance_PatientID"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_advance_PatientID"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_ip_advance_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_advance_PatientName"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_ip_advance_Mobile"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_advance_Mobile"></slot></td>
		</tr>
		<tr>
		<td><slot class="ew-slot" name="tpc_view_ip_advance_Date"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_advance_Date"></slot></td>
		<td><slot class="ew-slot" name="tpc_view_ip_advance_AdvanceValidityDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_advance_AdvanceValidityDate"></slot></td>
		<td></td>
		</tr>
		 <tr>
			<td><slot class="ew-slot" name="tpc_view_ip_advance_AdvanceNo"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_advance_AdvanceNo"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_ip_advance_Status"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_advance_Status"></slot></td>
			<td></td>
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
			<div class="card-header"  style="background-color:#E706B7">
				<h3 class="card-title">Payment Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
			<td><slot class="ew-slot" name="tpc_view_ip_advance_ModeofPayment"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_advance_ModeofPayment"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_ip_advance_Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_advance_Amount"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_ip_advance_Remarks"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_advance_Remarks"></slot></td>
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
			<td><slot class="ew-slot" name="tpc_view_ip_advance_CardNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_advance_CardNumber"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_ip_advance_BankName"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_advance_BankName"></slot></td>
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_view_ip_advanceedit", "tpm_view_ip_advanceedit", "view_ip_advanceedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("view_ip_advance");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

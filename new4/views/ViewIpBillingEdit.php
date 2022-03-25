<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIpBillingEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_ip_billingedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fview_ip_billingedit = currentForm = new ew.Form("fview_ip_billingedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_ip_billing")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_ip_billing)
        ew.vars.tables.view_ip_billing = currentTable;
    fview_ip_billingedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["PatientID", [fields.PatientID.visible && fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["patient_name", [fields.patient_name.visible && fields.patient_name.required ? ew.Validators.required(fields.patient_name.caption) : null], fields.patient_name.isInvalid],
        ["mrnNo", [fields.mrnNo.visible && fields.mrnNo.required ? ew.Validators.required(fields.mrnNo.caption) : null], fields.mrnNo.isInvalid],
        ["mobileno", [fields.mobileno.visible && fields.mobileno.required ? ew.Validators.required(fields.mobileno.caption) : null], fields.mobileno.isInvalid],
        ["profilePic", [fields.profilePic.visible && fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["gender", [fields.gender.visible && fields.gender.required ? ew.Validators.required(fields.gender.caption) : null], fields.gender.isInvalid],
        ["age", [fields.age.visible && fields.age.required ? ew.Validators.required(fields.age.caption) : null], fields.age.isInvalid],
        ["physician_id", [fields.physician_id.visible && fields.physician_id.required ? ew.Validators.required(fields.physician_id.caption) : null], fields.physician_id.isInvalid],
        ["typeRegsisteration", [fields.typeRegsisteration.visible && fields.typeRegsisteration.required ? ew.Validators.required(fields.typeRegsisteration.caption) : null], fields.typeRegsisteration.isInvalid],
        ["PaymentCategory", [fields.PaymentCategory.visible && fields.PaymentCategory.required ? ew.Validators.required(fields.PaymentCategory.caption) : null], fields.PaymentCategory.isInvalid],
        ["admission_consultant_id", [fields.admission_consultant_id.visible && fields.admission_consultant_id.required ? ew.Validators.required(fields.admission_consultant_id.caption) : null], fields.admission_consultant_id.isInvalid],
        ["leading_consultant_id", [fields.leading_consultant_id.visible && fields.leading_consultant_id.required ? ew.Validators.required(fields.leading_consultant_id.caption) : null], fields.leading_consultant_id.isInvalid],
        ["cause", [fields.cause.visible && fields.cause.required ? ew.Validators.required(fields.cause.caption) : null], fields.cause.isInvalid],
        ["admission_date", [fields.admission_date.visible && fields.admission_date.required ? ew.Validators.required(fields.admission_date.caption) : null], fields.admission_date.isInvalid],
        ["release_date", [fields.release_date.visible && fields.release_date.required ? ew.Validators.required(fields.release_date.caption) : null, ew.Validators.datetime(7)], fields.release_date.isInvalid],
        ["PaymentStatus", [fields.PaymentStatus.visible && fields.PaymentStatus.required ? ew.Validators.required(fields.PaymentStatus.caption) : null], fields.PaymentStatus.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["ReferedByDr", [fields.ReferedByDr.visible && fields.ReferedByDr.required ? ew.Validators.required(fields.ReferedByDr.caption) : null], fields.ReferedByDr.isInvalid],
        ["ReferClinicname", [fields.ReferClinicname.visible && fields.ReferClinicname.required ? ew.Validators.required(fields.ReferClinicname.caption) : null], fields.ReferClinicname.isInvalid],
        ["ReferCity", [fields.ReferCity.visible && fields.ReferCity.required ? ew.Validators.required(fields.ReferCity.caption) : null], fields.ReferCity.isInvalid],
        ["ReferMobileNo", [fields.ReferMobileNo.visible && fields.ReferMobileNo.required ? ew.Validators.required(fields.ReferMobileNo.caption) : null], fields.ReferMobileNo.isInvalid],
        ["ReferA4TreatingConsultant", [fields.ReferA4TreatingConsultant.visible && fields.ReferA4TreatingConsultant.required ? ew.Validators.required(fields.ReferA4TreatingConsultant.caption) : null], fields.ReferA4TreatingConsultant.isInvalid],
        ["PurposreReferredfor", [fields.PurposreReferredfor.visible && fields.PurposreReferredfor.required ? ew.Validators.required(fields.PurposreReferredfor.caption) : null], fields.PurposreReferredfor.isInvalid],
        ["patient_id", [fields.patient_id.visible && fields.patient_id.required ? ew.Validators.required(fields.patient_id.caption) : null], fields.patient_id.isInvalid],
        ["BillClosing", [fields.BillClosing.visible && fields.BillClosing.required ? ew.Validators.required(fields.BillClosing.caption) : null], fields.BillClosing.isInvalid],
        ["BillClosingDate", [fields.BillClosingDate.visible && fields.BillClosingDate.required ? ew.Validators.required(fields.BillClosingDate.caption) : null, ew.Validators.datetime(7)], fields.BillClosingDate.isInvalid],
        ["BillNumber", [fields.BillNumber.visible && fields.BillNumber.required ? ew.Validators.required(fields.BillNumber.caption) : null], fields.BillNumber.isInvalid],
        ["ClosingAmount", [fields.ClosingAmount.visible && fields.ClosingAmount.required ? ew.Validators.required(fields.ClosingAmount.caption) : null], fields.ClosingAmount.isInvalid],
        ["ClosingType", [fields.ClosingType.visible && fields.ClosingType.required ? ew.Validators.required(fields.ClosingType.caption) : null], fields.ClosingType.isInvalid],
        ["BillAmount", [fields.BillAmount.visible && fields.BillAmount.required ? ew.Validators.required(fields.BillAmount.caption) : null], fields.BillAmount.isInvalid],
        ["billclosedBy", [fields.billclosedBy.visible && fields.billclosedBy.required ? ew.Validators.required(fields.billclosedBy.caption) : null], fields.billclosedBy.isInvalid],
        ["bllcloseByDate", [fields.bllcloseByDate.visible && fields.bllcloseByDate.required ? ew.Validators.required(fields.bllcloseByDate.caption) : null], fields.bllcloseByDate.isInvalid],
        ["ReportHeader", [fields.ReportHeader.visible && fields.ReportHeader.required ? ew.Validators.required(fields.ReportHeader.caption) : null], fields.ReportHeader.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_ip_billingedit,
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
    fview_ip_billingedit.validate = function () {
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
    fview_ip_billingedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_ip_billingedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_ip_billingedit.lists.BillClosing = <?= $Page->BillClosing->toClientList($Page) ?>;
    fview_ip_billingedit.lists.ReportHeader = <?= $Page->ReportHeader->toClientList($Page) ?>;
    loadjs.done("fview_ip_billingedit");
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
<form name="fview_ip_billingedit" id="fview_ip_billingedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ip_billing">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_view_ip_billing_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_view_ip_billing_id"><span id="el_view_ip_billing_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_view_ip_billing_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_PatientID"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx_view_ip_billing_PatientID"><span id="el_view_ip_billing_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientID->getDisplayValue($Page->PatientID->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_PatientID" data-hidden="1" name="x_PatientID" id="x_PatientID" value="<?= HtmlEncode($Page->PatientID->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
    <div id="r_patient_name" class="form-group row">
        <label id="elh_view_ip_billing_patient_name" for="x_patient_name" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_patient_name"><?= $Page->patient_name->caption() ?><?= $Page->patient_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_name->cellAttributes() ?>>
<template id="tpx_view_ip_billing_patient_name"><span id="el_view_ip_billing_patient_name">
<span<?= $Page->patient_name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->patient_name->getDisplayValue($Page->patient_name->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_patient_name" data-hidden="1" name="x_patient_name" id="x_patient_name" value="<?= HtmlEncode($Page->patient_name->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
    <div id="r_mrnNo" class="form-group row">
        <label id="elh_view_ip_billing_mrnNo" for="x_mrnNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_mrnNo"><?= $Page->mrnNo->caption() ?><?= $Page->mrnNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnNo->cellAttributes() ?>>
<template id="tpx_view_ip_billing_mrnNo"><span id="el_view_ip_billing_mrnNo">
<span<?= $Page->mrnNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnNo->getDisplayValue($Page->mrnNo->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_mrnNo" data-hidden="1" name="x_mrnNo" id="x_mrnNo" value="<?= HtmlEncode($Page->mrnNo->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mobileno->Visible) { // mobileno ?>
    <div id="r_mobileno" class="form-group row">
        <label id="elh_view_ip_billing_mobileno" for="x_mobileno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_mobileno"><?= $Page->mobileno->caption() ?><?= $Page->mobileno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mobileno->cellAttributes() ?>>
<template id="tpx_view_ip_billing_mobileno"><span id="el_view_ip_billing_mobileno">
<span<?= $Page->mobileno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mobileno->getDisplayValue($Page->mobileno->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_mobileno" data-hidden="1" name="x_mobileno" id="x_mobileno" value="<?= HtmlEncode($Page->mobileno->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_view_ip_billing_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_profilePic"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_view_ip_billing_profilePic"><span id="el_view_ip_billing_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->EditValue ?></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_profilePic" data-hidden="1" name="x_profilePic" id="x_profilePic" value="<?= HtmlEncode($Page->profilePic->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <div id="r_gender" class="form-group row">
        <label id="elh_view_ip_billing_gender" for="x_gender" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_gender"><?= $Page->gender->caption() ?><?= $Page->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->gender->cellAttributes() ?>>
<template id="tpx_view_ip_billing_gender"><span id="el_view_ip_billing_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->gender->getDisplayValue($Page->gender->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_gender" data-hidden="1" name="x_gender" id="x_gender" value="<?= HtmlEncode($Page->gender->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
    <div id="r_age" class="form-group row">
        <label id="elh_view_ip_billing_age" for="x_age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_age"><?= $Page->age->caption() ?><?= $Page->age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->age->cellAttributes() ?>>
<template id="tpx_view_ip_billing_age"><span id="el_view_ip_billing_age">
<span<?= $Page->age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->age->getDisplayValue($Page->age->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_age" data-hidden="1" name="x_age" id="x_age" value="<?= HtmlEncode($Page->age->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
    <div id="r_physician_id" class="form-group row">
        <label id="elh_view_ip_billing_physician_id" for="x_physician_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_physician_id"><?= $Page->physician_id->caption() ?><?= $Page->physician_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->physician_id->cellAttributes() ?>>
<template id="tpx_view_ip_billing_physician_id"><span id="el_view_ip_billing_physician_id">
<span<?= $Page->physician_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->physician_id->getDisplayValue($Page->physician_id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_physician_id" data-hidden="1" name="x_physician_id" id="x_physician_id" value="<?= HtmlEncode($Page->physician_id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
    <div id="r_typeRegsisteration" class="form-group row">
        <label id="elh_view_ip_billing_typeRegsisteration" for="x_typeRegsisteration" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_typeRegsisteration"><?= $Page->typeRegsisteration->caption() ?><?= $Page->typeRegsisteration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->typeRegsisteration->cellAttributes() ?>>
<template id="tpx_view_ip_billing_typeRegsisteration"><span id="el_view_ip_billing_typeRegsisteration">
<span<?= $Page->typeRegsisteration->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->typeRegsisteration->getDisplayValue($Page->typeRegsisteration->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_typeRegsisteration" data-hidden="1" name="x_typeRegsisteration" id="x_typeRegsisteration" value="<?= HtmlEncode($Page->typeRegsisteration->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
    <div id="r_PaymentCategory" class="form-group row">
        <label id="elh_view_ip_billing_PaymentCategory" for="x_PaymentCategory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_PaymentCategory"><?= $Page->PaymentCategory->caption() ?><?= $Page->PaymentCategory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaymentCategory->cellAttributes() ?>>
<template id="tpx_view_ip_billing_PaymentCategory"><span id="el_view_ip_billing_PaymentCategory">
<span<?= $Page->PaymentCategory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PaymentCategory->getDisplayValue($Page->PaymentCategory->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_PaymentCategory" data-hidden="1" name="x_PaymentCategory" id="x_PaymentCategory" value="<?= HtmlEncode($Page->PaymentCategory->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
    <div id="r_admission_consultant_id" class="form-group row">
        <label id="elh_view_ip_billing_admission_consultant_id" for="x_admission_consultant_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_admission_consultant_id"><?= $Page->admission_consultant_id->caption() ?><?= $Page->admission_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->admission_consultant_id->cellAttributes() ?>>
<template id="tpx_view_ip_billing_admission_consultant_id"><span id="el_view_ip_billing_admission_consultant_id">
<span<?= $Page->admission_consultant_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->admission_consultant_id->getDisplayValue($Page->admission_consultant_id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_admission_consultant_id" data-hidden="1" name="x_admission_consultant_id" id="x_admission_consultant_id" value="<?= HtmlEncode($Page->admission_consultant_id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
    <div id="r_leading_consultant_id" class="form-group row">
        <label id="elh_view_ip_billing_leading_consultant_id" for="x_leading_consultant_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_leading_consultant_id"><?= $Page->leading_consultant_id->caption() ?><?= $Page->leading_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leading_consultant_id->cellAttributes() ?>>
<template id="tpx_view_ip_billing_leading_consultant_id"><span id="el_view_ip_billing_leading_consultant_id">
<span<?= $Page->leading_consultant_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->leading_consultant_id->getDisplayValue($Page->leading_consultant_id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_leading_consultant_id" data-hidden="1" name="x_leading_consultant_id" id="x_leading_consultant_id" value="<?= HtmlEncode($Page->leading_consultant_id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->cause->Visible) { // cause ?>
    <div id="r_cause" class="form-group row">
        <label id="elh_view_ip_billing_cause" for="x_cause" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_cause"><?= $Page->cause->caption() ?><?= $Page->cause->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->cause->cellAttributes() ?>>
<template id="tpx_view_ip_billing_cause"><span id="el_view_ip_billing_cause">
<span<?= $Page->cause->viewAttributes() ?>>
<?= $Page->cause->EditValue ?></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_cause" data-hidden="1" name="x_cause" id="x_cause" value="<?= HtmlEncode($Page->cause->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
    <div id="r_admission_date" class="form-group row">
        <label id="elh_view_ip_billing_admission_date" for="x_admission_date" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_admission_date"><?= $Page->admission_date->caption() ?><?= $Page->admission_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->admission_date->cellAttributes() ?>>
<template id="tpx_view_ip_billing_admission_date"><span id="el_view_ip_billing_admission_date">
<span<?= $Page->admission_date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->admission_date->getDisplayValue($Page->admission_date->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_admission_date" data-hidden="1" name="x_admission_date" id="x_admission_date" value="<?= HtmlEncode($Page->admission_date->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
    <div id="r_release_date" class="form-group row">
        <label id="elh_view_ip_billing_release_date" for="x_release_date" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_release_date"><?= $Page->release_date->caption() ?><?= $Page->release_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->release_date->cellAttributes() ?>>
<template id="tpx_view_ip_billing_release_date"><span id="el_view_ip_billing_release_date">
<input type="<?= $Page->release_date->getInputTextType() ?>" data-table="view_ip_billing" data-field="x_release_date" data-format="7" name="x_release_date" id="x_release_date" placeholder="<?= HtmlEncode($Page->release_date->getPlaceHolder()) ?>" value="<?= $Page->release_date->EditValue ?>"<?= $Page->release_date->editAttributes() ?> aria-describedby="x_release_date_help">
<?= $Page->release_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->release_date->getErrorMessage() ?></div>
<?php if (!$Page->release_date->ReadOnly && !$Page->release_date->Disabled && !isset($Page->release_date->EditAttrs["readonly"]) && !isset($Page->release_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_billingedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_billingedit", "x_release_date", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
    <div id="r_PaymentStatus" class="form-group row">
        <label id="elh_view_ip_billing_PaymentStatus" for="x_PaymentStatus" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_PaymentStatus"><?= $Page->PaymentStatus->caption() ?><?= $Page->PaymentStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaymentStatus->cellAttributes() ?>>
<template id="tpx_view_ip_billing_PaymentStatus"><span id="el_view_ip_billing_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PaymentStatus->getDisplayValue($Page->PaymentStatus->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_PaymentStatus" data-hidden="1" name="x_PaymentStatus" id="x_PaymentStatus" value="<?= HtmlEncode($Page->PaymentStatus->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_view_ip_billing_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_status"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<template id="tpx_view_ip_billing_status"><span id="el_view_ip_billing_status">
<span<?= $Page->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->status->getDisplayValue($Page->status->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_status" data-hidden="1" name="x_status" id="x_status" value="<?= HtmlEncode($Page->status->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_view_ip_billing_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_createdby"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_view_ip_billing_createdby"><span id="el_view_ip_billing_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->createdby->getDisplayValue($Page->createdby->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_createdby" data-hidden="1" name="x_createdby" id="x_createdby" value="<?= HtmlEncode($Page->createdby->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_view_ip_billing_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_createddatetime"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_view_ip_billing_createddatetime"><span id="el_view_ip_billing_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->createddatetime->getDisplayValue($Page->createddatetime->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_createddatetime" data-hidden="1" name="x_createddatetime" id="x_createddatetime" value="<?= HtmlEncode($Page->createddatetime->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_view_ip_billing_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_modifiedby"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_view_ip_billing_modifiedby"><span id="el_view_ip_billing_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->modifiedby->getDisplayValue($Page->modifiedby->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_modifiedby" data-hidden="1" name="x_modifiedby" id="x_modifiedby" value="<?= HtmlEncode($Page->modifiedby->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_view_ip_billing_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_modifieddatetime"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_view_ip_billing_modifieddatetime"><span id="el_view_ip_billing_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->modifieddatetime->getDisplayValue($Page->modifieddatetime->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_modifieddatetime" data-hidden="1" name="x_modifieddatetime" id="x_modifieddatetime" value="<?= HtmlEncode($Page->modifieddatetime->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_view_ip_billing_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_HospID"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_view_ip_billing_HospID"><span id="el_view_ip_billing_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->HospID->getDisplayValue($Page->HospID->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_HospID" data-hidden="1" name="x_HospID" id="x_HospID" value="<?= HtmlEncode($Page->HospID->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
    <div id="r_ReferedByDr" class="form-group row">
        <label id="elh_view_ip_billing_ReferedByDr" for="x_ReferedByDr" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_ReferedByDr"><?= $Page->ReferedByDr->caption() ?><?= $Page->ReferedByDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferedByDr->cellAttributes() ?>>
<template id="tpx_view_ip_billing_ReferedByDr"><span id="el_view_ip_billing_ReferedByDr">
<span<?= $Page->ReferedByDr->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ReferedByDr->getDisplayValue($Page->ReferedByDr->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_ReferedByDr" data-hidden="1" name="x_ReferedByDr" id="x_ReferedByDr" value="<?= HtmlEncode($Page->ReferedByDr->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
    <div id="r_ReferClinicname" class="form-group row">
        <label id="elh_view_ip_billing_ReferClinicname" for="x_ReferClinicname" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_ReferClinicname"><?= $Page->ReferClinicname->caption() ?><?= $Page->ReferClinicname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferClinicname->cellAttributes() ?>>
<template id="tpx_view_ip_billing_ReferClinicname"><span id="el_view_ip_billing_ReferClinicname">
<span<?= $Page->ReferClinicname->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ReferClinicname->getDisplayValue($Page->ReferClinicname->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_ReferClinicname" data-hidden="1" name="x_ReferClinicname" id="x_ReferClinicname" value="<?= HtmlEncode($Page->ReferClinicname->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
    <div id="r_ReferCity" class="form-group row">
        <label id="elh_view_ip_billing_ReferCity" for="x_ReferCity" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_ReferCity"><?= $Page->ReferCity->caption() ?><?= $Page->ReferCity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferCity->cellAttributes() ?>>
<template id="tpx_view_ip_billing_ReferCity"><span id="el_view_ip_billing_ReferCity">
<span<?= $Page->ReferCity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ReferCity->getDisplayValue($Page->ReferCity->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_ReferCity" data-hidden="1" name="x_ReferCity" id="x_ReferCity" value="<?= HtmlEncode($Page->ReferCity->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
    <div id="r_ReferMobileNo" class="form-group row">
        <label id="elh_view_ip_billing_ReferMobileNo" for="x_ReferMobileNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_ReferMobileNo"><?= $Page->ReferMobileNo->caption() ?><?= $Page->ReferMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferMobileNo->cellAttributes() ?>>
<template id="tpx_view_ip_billing_ReferMobileNo"><span id="el_view_ip_billing_ReferMobileNo">
<span<?= $Page->ReferMobileNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ReferMobileNo->getDisplayValue($Page->ReferMobileNo->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_ReferMobileNo" data-hidden="1" name="x_ReferMobileNo" id="x_ReferMobileNo" value="<?= HtmlEncode($Page->ReferMobileNo->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
    <div id="r_ReferA4TreatingConsultant" class="form-group row">
        <label id="elh_view_ip_billing_ReferA4TreatingConsultant" for="x_ReferA4TreatingConsultant" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_ReferA4TreatingConsultant"><?= $Page->ReferA4TreatingConsultant->caption() ?><?= $Page->ReferA4TreatingConsultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<template id="tpx_view_ip_billing_ReferA4TreatingConsultant"><span id="el_view_ip_billing_ReferA4TreatingConsultant">
<span<?= $Page->ReferA4TreatingConsultant->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ReferA4TreatingConsultant->getDisplayValue($Page->ReferA4TreatingConsultant->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_ReferA4TreatingConsultant" data-hidden="1" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" value="<?= HtmlEncode($Page->ReferA4TreatingConsultant->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
    <div id="r_PurposreReferredfor" class="form-group row">
        <label id="elh_view_ip_billing_PurposreReferredfor" for="x_PurposreReferredfor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_PurposreReferredfor"><?= $Page->PurposreReferredfor->caption() ?><?= $Page->PurposreReferredfor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurposreReferredfor->cellAttributes() ?>>
<template id="tpx_view_ip_billing_PurposreReferredfor"><span id="el_view_ip_billing_PurposreReferredfor">
<span<?= $Page->PurposreReferredfor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PurposreReferredfor->getDisplayValue($Page->PurposreReferredfor->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_PurposreReferredfor" data-hidden="1" name="x_PurposreReferredfor" id="x_PurposreReferredfor" value="<?= HtmlEncode($Page->PurposreReferredfor->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <div id="r_patient_id" class="form-group row">
        <label id="elh_view_ip_billing_patient_id" for="x_patient_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_patient_id"><?= $Page->patient_id->caption() ?><?= $Page->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_id->cellAttributes() ?>>
<template id="tpx_view_ip_billing_patient_id"><span id="el_view_ip_billing_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->patient_id->getDisplayValue($Page->patient_id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_billing" data-field="x_patient_id" data-hidden="1" name="x_patient_id" id="x_patient_id" value="<?= HtmlEncode($Page->patient_id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillClosing->Visible) { // BillClosing ?>
    <div id="r_BillClosing" class="form-group row">
        <label id="elh_view_ip_billing_BillClosing" for="x_BillClosing" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_BillClosing"><?= $Page->BillClosing->caption() ?><?= $Page->BillClosing->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillClosing->cellAttributes() ?>>
<template id="tpx_view_ip_billing_BillClosing"><span id="el_view_ip_billing_BillClosing">
    <select
        id="x_BillClosing"
        name="x_BillClosing"
        class="form-control ew-select<?= $Page->BillClosing->isInvalidClass() ?>"
        data-select2-id="view_ip_billing_x_BillClosing"
        data-table="view_ip_billing"
        data-field="x_BillClosing"
        data-value-separator="<?= $Page->BillClosing->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->BillClosing->getPlaceHolder()) ?>"
        <?= $Page->BillClosing->editAttributes() ?>>
        <?= $Page->BillClosing->selectOptionListHtml("x_BillClosing") ?>
    </select>
    <?= $Page->BillClosing->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->BillClosing->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_ip_billing_x_BillClosing']"),
        options = { name: "x_BillClosing", selectId: "view_ip_billing_x_BillClosing", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_ip_billing.fields.BillClosing.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ip_billing.fields.BillClosing.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
    <div id="r_BillClosingDate" class="form-group row">
        <label id="elh_view_ip_billing_BillClosingDate" for="x_BillClosingDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_BillClosingDate"><?= $Page->BillClosingDate->caption() ?><?= $Page->BillClosingDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillClosingDate->cellAttributes() ?>>
<template id="tpx_view_ip_billing_BillClosingDate"><span id="el_view_ip_billing_BillClosingDate">
<input type="<?= $Page->BillClosingDate->getInputTextType() ?>" data-table="view_ip_billing" data-field="x_BillClosingDate" data-format="7" name="x_BillClosingDate" id="x_BillClosingDate" placeholder="<?= HtmlEncode($Page->BillClosingDate->getPlaceHolder()) ?>" value="<?= $Page->BillClosingDate->EditValue ?>"<?= $Page->BillClosingDate->editAttributes() ?> aria-describedby="x_BillClosingDate_help">
<?= $Page->BillClosingDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillClosingDate->getErrorMessage() ?></div>
<?php if (!$Page->BillClosingDate->ReadOnly && !$Page->BillClosingDate->Disabled && !isset($Page->BillClosingDate->EditAttrs["readonly"]) && !isset($Page->BillClosingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_billingedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_billingedit", "x_BillClosingDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <div id="r_BillNumber" class="form-group row">
        <label id="elh_view_ip_billing_BillNumber" for="x_BillNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_BillNumber"><?= $Page->BillNumber->caption() ?><?= $Page->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillNumber->cellAttributes() ?>>
<template id="tpx_view_ip_billing_BillNumber"><span id="el_view_ip_billing_BillNumber">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="view_ip_billing" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?> aria-describedby="x_BillNumber_help">
<?= $Page->BillNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ClosingAmount->Visible) { // ClosingAmount ?>
    <div id="r_ClosingAmount" class="form-group row">
        <label id="elh_view_ip_billing_ClosingAmount" for="x_ClosingAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_ClosingAmount"><?= $Page->ClosingAmount->caption() ?><?= $Page->ClosingAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ClosingAmount->cellAttributes() ?>>
<template id="tpx_view_ip_billing_ClosingAmount"><span id="el_view_ip_billing_ClosingAmount">
<input type="<?= $Page->ClosingAmount->getInputTextType() ?>" data-table="view_ip_billing" data-field="x_ClosingAmount" name="x_ClosingAmount" id="x_ClosingAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ClosingAmount->getPlaceHolder()) ?>" value="<?= $Page->ClosingAmount->EditValue ?>"<?= $Page->ClosingAmount->editAttributes() ?> aria-describedby="x_ClosingAmount_help">
<?= $Page->ClosingAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ClosingAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ClosingType->Visible) { // ClosingType ?>
    <div id="r_ClosingType" class="form-group row">
        <label id="elh_view_ip_billing_ClosingType" for="x_ClosingType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_ClosingType"><?= $Page->ClosingType->caption() ?><?= $Page->ClosingType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ClosingType->cellAttributes() ?>>
<template id="tpx_view_ip_billing_ClosingType"><span id="el_view_ip_billing_ClosingType">
<input type="<?= $Page->ClosingType->getInputTextType() ?>" data-table="view_ip_billing" data-field="x_ClosingType" name="x_ClosingType" id="x_ClosingType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ClosingType->getPlaceHolder()) ?>" value="<?= $Page->ClosingType->EditValue ?>"<?= $Page->ClosingType->editAttributes() ?> aria-describedby="x_ClosingType_help">
<?= $Page->ClosingType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ClosingType->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillAmount->Visible) { // BillAmount ?>
    <div id="r_BillAmount" class="form-group row">
        <label id="elh_view_ip_billing_BillAmount" for="x_BillAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_BillAmount"><?= $Page->BillAmount->caption() ?><?= $Page->BillAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillAmount->cellAttributes() ?>>
<template id="tpx_view_ip_billing_BillAmount"><span id="el_view_ip_billing_BillAmount">
<input type="<?= $Page->BillAmount->getInputTextType() ?>" data-table="view_ip_billing" data-field="x_BillAmount" name="x_BillAmount" id="x_BillAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillAmount->getPlaceHolder()) ?>" value="<?= $Page->BillAmount->EditValue ?>"<?= $Page->BillAmount->editAttributes() ?> aria-describedby="x_BillAmount_help">
<?= $Page->BillAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
    <div id="r_ReportHeader" class="form-group row">
        <label id="elh_view_ip_billing_ReportHeader" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_billing_ReportHeader"><?= $Page->ReportHeader->caption() ?><?= $Page->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReportHeader->cellAttributes() ?>>
<template id="tpx_view_ip_billing_ReportHeader"><span id="el_view_ip_billing_ReportHeader">
<template id="tp_x_ReportHeader">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_ip_billing" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader"<?= $Page->ReportHeader->editAttributes() ?>>
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
    data-table="view_ip_billing"
    data-field="x_ReportHeader"
    data-value-separator="<?= $Page->ReportHeader->displayValueSeparatorAttribute() ?>"
    <?= $Page->ReportHeader->editAttributes() ?>>
<?= $Page->ReportHeader->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReportHeader->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_ip_billingedit" class="ew-custom-template"></div>
<template id="tpm_view_ip_billingedit">
<div id="ct_ViewIpBillingEdit"><style>
.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
	width: 90%;
}
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 90%;
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
.alignleft {
	float: left;
}
.alignright {
	float: right;
}
</style>
<?php

function convertToIndianCurrency($number) {
	$no = round($number);
	$decimal = round($number - ($no = floor($number)), 2) * 100;    
	$digits_length = strlen($no);    
	$i = 0;
	$str = array();
	$words = array(
		0 => '',
		1 => 'One',
		2 => 'Two',
		3 => 'Three',
		4 => 'Four',
		5 => 'Five',
		6 => 'Six',
		7 => 'Seven',
		8 => 'Eight',
		9 => 'Nine',
		10 => 'Ten',
		11 => 'Eleven',
		12 => 'Twelve',
		13 => 'Thirteen',
		14 => 'Fourteen',
		15 => 'Fifteen',
		16 => 'Sixteen',
		17 => 'Seventeen',
		18 => 'Eighteen',
		19 => 'Nineteen',
		20 => 'Twenty',
		30 => 'Thirty',
		40 => 'Forty',
		50 => 'Fifty',
		60 => 'Sixty',
		70 => 'Seventy',
		80 => 'Eighty',
		90 => 'Ninety');
	$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
	while ($i < $digits_length) {
		$divider = ($i == 2) ? 10 : 100;
		$number = floor($no % $divider);
		$no = floor($no / $divider);
		$i += $divider == 10 ? 1 : 2;
		if ($number) {
			$plural = (($counter = count($str)) && $number > 9) ? 's' : null;            
			$str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
		} else {
			$str [] = null;
		}  
	}
	$Rupees = implode(' ', array_reverse($str));
	$paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
	return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
}
	$invoiceId = $Page->id->CurrentValue;
	$dbhelper = &DbHelper();
	$sql = "SELECT * FROM ganeshkumar_bjhims.ip_admission where id='".$invoiceId."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$physician_id = $results1[0]["physician_id"];
	$BillNumber =  $results1[0]["BillNumber"];
	$sql = "SELECT * FROM ganeshkumar_bjhims.doctors where id='".$physician_id."'; ";
	$results1A = $dbhelper->ExecuteRows($sql);
	$Doctor = $results1A[0]["NAME"];
	$patient_id = $results1[0]["PatientID"];
	$PatId = $results1[0]["patient_id"];
	$HospID = $results1[0]["HospID"];
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$PatId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $Patid =  $row["id"];
	 $PatientID =  $row["PatientID"];
	 $PatientName =  $row["first_name"];
	 $gender =  $row["gender"];
	 $dob =  $row["dob"];
	 $Age =  $row["Age"];
	 if($dob != null)
	 {
	 	$Age = $Age;
	 }
	 $mobile_no =  $row["mobile_no"];
	 $IdentificationMark =  $row["IdentificationMark"];
	 $Religion =  $row["Religion"];
	 $street =  $row["street"];
	 $town =  $row["town"];
	 $province =  $row["province"];
	 $country =  $row["country"];
	 $postal_code =  $row["postal_code"];
	 $PEmail =  $row["PEmail"];
	if( $street != '')
	{
		$address .= $street;
	}
	if( $town != '')
	{
		$address .= ', '.$town;
	}
	if( $province != '')
	{
		$address .= ', '.$province;
	}
	if( $country != '')
	{
		$address .= ', '.$country;
	}
	 if( $postal_code != '')
	{
		$address .= ', '.$postal_code;
	}
	 $rs->MoveNext();
 }
$aa = "ewbarcode.php?data=".$Page->id->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
 $sql = "SELECT * FROM ganeshkumar_bjhims.hospital where id='".$HospID."' ;";
$results2 = $dbhelper->ExecuteRows($sql);
if($results2[0]["BillingGST"] != "")
{
$HospGST = "GST No:". $results2[0]["BillingGST"];
}
if($Page->ReportHeader->CurrentValue=="Yes")
{
$id =  $results2[0]["id"];
 $logo = $results2[0]["logo"];
 $hospital = $results2[0]["hospital"];
 $street = $results2[0]["street"];
 $area = $results2[0]["area"];
 $town = $results2[0]["town"];
 $province = $results2[0]["province"];
 $postal_code = $results2[0]["postal_code"];
 $phone_no = $results2[0]["phone_no"];
 $PreFixCode = $results2[0]["PreFixCode"];
 $status = $results2[0]["status"];
$createdby =  $results2[0]["createdby"];
$createddatetime =  $results2[0]["createddatetime"];
$modifiedby =  $results2[0]["modifiedby"];
$modifieddatetime =  $results2[0]["modifieddatetime"];
$BillingGST =  $results2[0]["BillingGST"];
$pharmacyGST =  $results2[0]["pharmacyGST"];
$hospaddress = '';
if( $street != '')
{
	$hospaddress .= $street;
}
if( $area != '')
{
	$hospaddress .= ', '.$area;
}
if( $town != '')
{
	$hospaddress .= ', '.$town;
}
if( $province != '')
{
	$hospaddress .= ', '.$province;
}
if( $country != '')
{
	$hospaddress .= ', '.$country;
}
if( $postal_code != '')
{
	$hospaddress .= ', '.$postal_code . '.';
	}
$hospphone_no = '';
if( $phone_no != '')
{
	$hospphone_no .= '		<tr>
			<td  style="width:50px;"></td>
			<td align="center">Ph: '.$phone_no.' .</td>
			<td  style="width:50px;"></td>
		</tr>';
}
$heeddeer = '<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr>
			<td  style="width:50px;"></td>
			<td><h2 align="center">'.$hospital.'</h2></td>
			<td  style="width:50px;"></td>
		</tr>
		<tr>
			<td  style="width:50px;"></td>
			<td align="center">'.$hospaddress.'</td>
			<td  style="width:50px;"></td>
		</tr>
		'.$hospphone_no.'
	</tbody>
</table>
';
echo $heeddeer;
}
 ?>
<table width="100%">
	 <tbody>
		<tr>
<td></td>
<td>
<?php
		if($Page->ReportHeader->CurrentValue=="Yes")
		{
			echo '<h5 align="center"><u>PATIENT BILL OF SUPPLY</u></h5>';
		}else{
			echo '<h2 align="center">PATIENT BILL OF SUPPLY</h2>';
		}
?>
</td>
<td  style="float: right;"><?php echo $HospGST; ?></td>
</tr>
	</tbody>
</table>
<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr><td  style="float:left;">Patient Id: <?php echo $PatientID; ?> </td><td  style="float: right;">Bill No: <?php echo $BillNumber; ?></td></tr>
		<tr><td  style="float:left;">Patient Name: <?php echo $PatientName; ?></td><td  style="float: right;">Bill Date:<?php echo date("d-m-Y", strtotime($Page->createddatetime->CurrentValue)); ?></td></tr>
		<tr><td  style="float:left;"> Age: <?php echo $Age; ?> </td><td  style="float: right;">Consultant: <?php echo $Doctor; ?></td></tr>
		<tr><td  style="float:left;width:50%;">Gender: <?php echo $gender; ?> </td><td  style="float: right;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td></tr>
		<tr><td  style="float:left;width:50%;">Address: <?php echo $address; ?> </td><td  style="float: right;"></td></tr>
	</tbody>
</table>
	</font>
<?php
$GRTotal = 0;
$dbhelper = &DbHelper();
$sqlA = "SELECT Service_Department FROM ganeshkumar_bjhims.patient_services where Reception='".$invoiceId."' group by Service_Department;";
$rsA = $dbhelper->LoadRecordset($sqlA);
while (!$rsA->EOF) {
	$rowA = &$rsA->fields;
 $hhh = '<font size="4" > <b>'.$rowA["Service_Department"].'</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Description</b></td>
<td align="center"><b>Unit Price</b></td>
<td align="center"><b>Quantity</b></td>
<td align="center"><b align="right">Price</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_services where Reception='".$invoiceId."' and  Service_Department='".$rowA["Service_Department"]."';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Services"];
				$ItemCode =  $row["ItemCode"];
				$Qty = $row["Quantity"];
				$Rate =  $row["amount"];
				$SubTotal =  $row["SubTotal"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$Rate.'</td><td align="center">'.$Qty.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SSTotal = $SSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
	  $GRTotal = $GRTotal + $SSTotal;
	  	$rsA->MoveNext();
}

//==============================

//$GRTotal = 0;
$dbhelper = &DbHelper();
$sqlA = "SELECT BRCODE,BRNAME FROM ganeshkumar_bjhims.pharmacy_pharled where Reception='".$invoiceId."' group by BRCODE,BRNAME;";
$rsA = $dbhelper->LoadRecordset($sqlA);
while (!$rsA->EOF) {
	$rowA = &$rsA->fields;
 $hhh = '<font size="4" > <b>'.$rowA["BRNAME"].'</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Description</b></td>
<td align="center"><b>Mfg</b></td>
<td align="center"><b>Exp</b></td>
<td align="center"><b>Batch</b></td>
<td align="center"><b>Unit Price</b></td>
<td align="center"><b>Quantity</b></td>
<td align="center"><b align="right">Price</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.pharmacy_pharled where Reception='".$invoiceId."' and  BRCODE='".$rowA["BRCODE"]."';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Product"];
				$ItemCode =  $row["PRC"];
				$Mfg =  $row["Mfg"];
				//$EXPDT =  $row["EXPDT"];
				$EXPDT =  date("d-m-Y", strtotime($row["EXPDT"]));
				$BATCHNO =  $row["BATCHNO"];
				$Qty = number_format($row["IQ"]);
				$Rate =  $row["RT"];
				$SubTotal =  $row["DAMT"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$hhh .= '<tr><td>'.$Services.'</td><td>'.$Mfg.'</td><td>'.$EXPDT.'</td><td>'.$BATCHNO.'</td><td align="right">'.$Rate.'</td><td align="center">'.$Qty.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SSTotal = $SSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td></td><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
	  $GRTotal = $GRTotal + $SSTotal;
	  	$rsA->MoveNext();
}
 $hhh = '<font size="4" > <b>Advance</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Advance No</b></td>
<td align="center"><b>Date </b></td>
<td align="center"><b>Mode Of Payment</b></td>
<td align="center"><b align="right">Amount</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SASTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.billing_other_voucher where Reception='".$invoiceId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["AdvanceNo"];
				$ItemCode =  date("d-m-Y", strtotime( $row["Date"]));
				$Qty = 1; //$row["Services"];
				$Rate =  $row["ModeofPayment"];
				$SubTotal =  $row["Amount"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
				$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$ItemCode.'</td><td align="center">'.$Rate.'</td><td align="right">'.number_format($row["Amount"],2).'</td></tr>  ';
$SASTotal = $SASTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SASTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
 $hhh = '<font size="4" > <b>Refund</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Refund No</b></td>
<td align="center"><b>Date </b></td>
<td align="center"><b>Mode Of Payment</b></td>
<td align="center"><b align="right">Amount</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SrSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.billing_refund_voucher where Reception='".$invoiceId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["AdvanceNo"];
				$ItemCode =  date("d-m-Y", strtotime( $row["Date"]));
				$Qty = 1; //$row["Services"];
				$Rate =  $row["ModeofPayment"];
				$SubTotal =  number_format($row["Amount"],2);

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
				$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$ItemCode.'</td><td align="center">'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SrSTotal = $SrSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SrSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
if($SSTotal != '')
{
	  echo $hhh;
}
 $hhh = '<font size="4" > 
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="left" style="width:50%"><b>Total Bill Amount</b></td>
<td align="right"><b align="right">'.number_format($GRTotal,2).'</b></td>
</tr>';
 $hhh .= '
<tr>
<td align="left" style="width:50%"><b>Total Advance Amount</b></td>
<td align="right"><b align="right">'.number_format($SASTotal,2).'</b></td>
</tr>';
if($SSTotal != '')
{
 $hhh .= '
<tr>
<td align="left" style="width:50%"><b>Total Refund Amount</b></td>
<td align="right"><b align="right">'.number_format($SrSTotal,2).'</b></td>
</tr>';
	   $BALTotal = ($GRTotal - $SASTotal)+$SrSTotal;
	$hhh .= '<tr><td align="left">(Total Bill Amount - Total Advance Amount) + Total Refund Amount </td><td align="right">'.number_format($BALTotal,2).'</td></tr>  ';
}else
{
 $BALTotal = $GRTotal - $SASTotal;
$hhh .= '<tr><td align="left">Total Bill Amount - Total Advance Amount </td><td align="right">'.number_format($BALTotal,2).'</td></tr>  ';
}
$hhh .= '</table> </font><br>';
 echo $hhh;
 if($BALTotal > 100)
 {
 	echo '</br><b>Balance amount to be paid : '.$BALTotal.' <b></br>';
 	$AccountClosingType = 'Paid';
 }
 if($BALTotal < 0)
 {
 	echo '</br><b>Balance amount to be Refund : '.$BALTotal.' <b></br>';
 	$AccountClosingType = 'Refund';
 }
 if($BALTotal >= 0 && $BALTotal <= 100)
 {
	 echo '</br><b>Bill Tallied <b> </br>';
 }
	  $tt = "ewbarcode.php?data=".$Page->BillNumber->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
	  echo '<b>Grand Total :   '. number_format($GRTotal,2).' </b></br>';
	  echo '<b>Grand Total in words  :   '. convertToIndianCurrency($GRTotal).' </b></br>';
?>
<br><br>
<table class="ew-table">
	 <tbody>
		<tr><td><slot class="ew-slot" name="tpc_view_ip_billing_release_date"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_billing_release_date"></slot></td><td><slot class="ew-slot" name="tpc_view_ip_billing_BillClosing"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_billing_BillClosing"></slot></td><td><slot class="ew-slot" name="tpc_view_ip_billing_BillClosingDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_billing_BillClosingDate"></slot></td></tr>
		<tr><td><slot class="ew-slot" name="tpc_view_ip_billing_BillAmount"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_billing_BillAmount"></slot></td><td><slot class="ew-slot" name="tpc_view_ip_billing_ClosingAmount"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_billing_ClosingAmount"></slot></td><td><slot class="ew-slot" name="tpc_view_ip_billing_ClosingType"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_billing_ClosingType"></slot></td></tr>
		<tr><td><slot class="ew-slot" name="tpc_view_ip_billing_BillNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_billing_BillNumber"></slot></td><td><slot class="ew-slot" name="tpc_view_ip_billing_ReportHeader"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_billing_ReportHeader"></slot></td><td></td></tr>
	</tbody>
</table>
<br>
<font size="4" >
<img src='<?php echo $tt; ?>' alt style="border: 0;">
<p align="right">Signature<p>
	  </font>
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
    ew.applyTemplate("tpd_view_ip_billingedit", "tpm_view_ip_billingedit", "view_ip_billingedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("view_ip_billing");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    document.getElementById("x_BillNumber").readOnly=!0,document.getElementById("x_ClosingAmount").value="<?php echo number_format($BALTotal,2); ?>",document.getElementById("x_ClosingType").value="<?php echo $AccountClosingType; ?>",document.getElementById("x_ClosingAmount").readOnly=!0,document.getElementById("x_ClosingType").readOnly=!0,document.getElementById("x_BillAmount").readOnly=!0,document.getElementById("x_BillAmount").value="<?php echo number_format($GRTotal,2); ?>";
});
</script>

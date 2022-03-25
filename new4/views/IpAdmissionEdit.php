<?php

namespace PHPMaker2021\HIMS;

// Page object
$IpAdmissionEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fip_admissionedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fip_admissionedit = currentForm = new ew.Form("fip_admissionedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ip_admission")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ip_admission)
        ew.vars.tables.ip_admission = currentTable;
    fip_admissionedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["mrnNo", [fields.mrnNo.visible && fields.mrnNo.required ? ew.Validators.required(fields.mrnNo.caption) : null], fields.mrnNo.isInvalid],
        ["PatientID", [fields.PatientID.visible && fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["patient_name", [fields.patient_name.visible && fields.patient_name.required ? ew.Validators.required(fields.patient_name.caption) : null], fields.patient_name.isInvalid],
        ["mobileno", [fields.mobileno.visible && fields.mobileno.required ? ew.Validators.required(fields.mobileno.caption) : null], fields.mobileno.isInvalid],
        ["gender", [fields.gender.visible && fields.gender.required ? ew.Validators.required(fields.gender.caption) : null], fields.gender.isInvalid],
        ["age", [fields.age.visible && fields.age.required ? ew.Validators.required(fields.age.caption) : null], fields.age.isInvalid],
        ["typeRegsisteration", [fields.typeRegsisteration.visible && fields.typeRegsisteration.required ? ew.Validators.required(fields.typeRegsisteration.caption) : null], fields.typeRegsisteration.isInvalid],
        ["PaymentCategory", [fields.PaymentCategory.visible && fields.PaymentCategory.required ? ew.Validators.required(fields.PaymentCategory.caption) : null], fields.PaymentCategory.isInvalid],
        ["physician_id", [fields.physician_id.visible && fields.physician_id.required ? ew.Validators.required(fields.physician_id.caption) : null], fields.physician_id.isInvalid],
        ["admission_consultant_id", [fields.admission_consultant_id.visible && fields.admission_consultant_id.required ? ew.Validators.required(fields.admission_consultant_id.caption) : null], fields.admission_consultant_id.isInvalid],
        ["leading_consultant_id", [fields.leading_consultant_id.visible && fields.leading_consultant_id.required ? ew.Validators.required(fields.leading_consultant_id.caption) : null], fields.leading_consultant_id.isInvalid],
        ["cause", [fields.cause.visible && fields.cause.required ? ew.Validators.required(fields.cause.caption) : null], fields.cause.isInvalid],
        ["admission_date", [fields.admission_date.visible && fields.admission_date.required ? ew.Validators.required(fields.admission_date.caption) : null, ew.Validators.datetime(11)], fields.admission_date.isInvalid],
        ["release_date", [fields.release_date.visible && fields.release_date.required ? ew.Validators.required(fields.release_date.caption) : null, ew.Validators.datetime(17)], fields.release_date.isInvalid],
        ["PaymentStatus", [fields.PaymentStatus.visible && fields.PaymentStatus.required ? ew.Validators.required(fields.PaymentStatus.caption) : null], fields.PaymentStatus.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["profilePic", [fields.profilePic.visible && fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["DOB", [fields.DOB.visible && fields.DOB.required ? ew.Validators.required(fields.DOB.caption) : null], fields.DOB.isInvalid],
        ["ReferedByDr", [fields.ReferedByDr.visible && fields.ReferedByDr.required ? ew.Validators.required(fields.ReferedByDr.caption) : null], fields.ReferedByDr.isInvalid],
        ["ReferClinicname", [fields.ReferClinicname.visible && fields.ReferClinicname.required ? ew.Validators.required(fields.ReferClinicname.caption) : null], fields.ReferClinicname.isInvalid],
        ["ReferCity", [fields.ReferCity.visible && fields.ReferCity.required ? ew.Validators.required(fields.ReferCity.caption) : null], fields.ReferCity.isInvalid],
        ["ReferMobileNo", [fields.ReferMobileNo.visible && fields.ReferMobileNo.required ? ew.Validators.required(fields.ReferMobileNo.caption) : null], fields.ReferMobileNo.isInvalid],
        ["ReferA4TreatingConsultant", [fields.ReferA4TreatingConsultant.visible && fields.ReferA4TreatingConsultant.required ? ew.Validators.required(fields.ReferA4TreatingConsultant.caption) : null], fields.ReferA4TreatingConsultant.isInvalid],
        ["PurposreReferredfor", [fields.PurposreReferredfor.visible && fields.PurposreReferredfor.required ? ew.Validators.required(fields.PurposreReferredfor.caption) : null], fields.PurposreReferredfor.isInvalid],
        ["BillClosing", [fields.BillClosing.visible && fields.BillClosing.required ? ew.Validators.required(fields.BillClosing.caption) : null], fields.BillClosing.isInvalid],
        ["BillClosingDate", [fields.BillClosingDate.visible && fields.BillClosingDate.required ? ew.Validators.required(fields.BillClosingDate.caption) : null, ew.Validators.datetime(0)], fields.BillClosingDate.isInvalid],
        ["BillNumber", [fields.BillNumber.visible && fields.BillNumber.required ? ew.Validators.required(fields.BillNumber.caption) : null], fields.BillNumber.isInvalid],
        ["ClosingAmount", [fields.ClosingAmount.visible && fields.ClosingAmount.required ? ew.Validators.required(fields.ClosingAmount.caption) : null], fields.ClosingAmount.isInvalid],
        ["ClosingType", [fields.ClosingType.visible && fields.ClosingType.required ? ew.Validators.required(fields.ClosingType.caption) : null], fields.ClosingType.isInvalid],
        ["BillAmount", [fields.BillAmount.visible && fields.BillAmount.required ? ew.Validators.required(fields.BillAmount.caption) : null], fields.BillAmount.isInvalid],
        ["billclosedBy", [fields.billclosedBy.visible && fields.billclosedBy.required ? ew.Validators.required(fields.billclosedBy.caption) : null], fields.billclosedBy.isInvalid],
        ["bllcloseByDate", [fields.bllcloseByDate.visible && fields.bllcloseByDate.required ? ew.Validators.required(fields.bllcloseByDate.caption) : null, ew.Validators.datetime(0)], fields.bllcloseByDate.isInvalid],
        ["ReportHeader", [fields.ReportHeader.visible && fields.ReportHeader.required ? ew.Validators.required(fields.ReportHeader.caption) : null], fields.ReportHeader.isInvalid],
        ["Procedure", [fields.Procedure.visible && fields.Procedure.required ? ew.Validators.required(fields.Procedure.caption) : null], fields.Procedure.isInvalid],
        ["Consultant", [fields.Consultant.visible && fields.Consultant.required ? ew.Validators.required(fields.Consultant.caption) : null], fields.Consultant.isInvalid],
        ["Anesthetist", [fields.Anesthetist.visible && fields.Anesthetist.required ? ew.Validators.required(fields.Anesthetist.caption) : null], fields.Anesthetist.isInvalid],
        ["Amound", [fields.Amound.visible && fields.Amound.required ? ew.Validators.required(fields.Amound.caption) : null, ew.Validators.float], fields.Amound.isInvalid],
        ["Package", [fields.Package.visible && fields.Package.required ? ew.Validators.required(fields.Package.caption) : null], fields.Package.isInvalid],
        ["patient_id", [fields.patient_id.visible && fields.patient_id.required ? ew.Validators.required(fields.patient_id.caption) : null], fields.patient_id.isInvalid],
        ["PartnerID", [fields.PartnerID.visible && fields.PartnerID.required ? ew.Validators.required(fields.PartnerID.caption) : null], fields.PartnerID.isInvalid],
        ["PartnerName", [fields.PartnerName.visible && fields.PartnerName.required ? ew.Validators.required(fields.PartnerName.caption) : null], fields.PartnerName.isInvalid],
        ["PartnerMobile", [fields.PartnerMobile.visible && fields.PartnerMobile.required ? ew.Validators.required(fields.PartnerMobile.caption) : null], fields.PartnerMobile.isInvalid],
        ["Cid", [fields.Cid.visible && fields.Cid.required ? ew.Validators.required(fields.Cid.caption) : null, ew.Validators.integer], fields.Cid.isInvalid],
        ["PartId", [fields.PartId.visible && fields.PartId.required ? ew.Validators.required(fields.PartId.caption) : null, ew.Validators.integer], fields.PartId.isInvalid],
        ["IDProof", [fields.IDProof.visible && fields.IDProof.required ? ew.Validators.required(fields.IDProof.caption) : null], fields.IDProof.isInvalid],
        ["AdviceToOtherHospital", [fields.AdviceToOtherHospital.visible && fields.AdviceToOtherHospital.required ? ew.Validators.required(fields.AdviceToOtherHospital.caption) : null], fields.AdviceToOtherHospital.isInvalid],
        ["Reason", [fields.Reason.visible && fields.Reason.required ? ew.Validators.required(fields.Reason.caption) : null], fields.Reason.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fip_admissionedit,
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
    fip_admissionedit.validate = function () {
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
    fip_admissionedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fip_admissionedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fip_admissionedit.lists.gender = <?= $Page->gender->toClientList($Page) ?>;
    fip_admissionedit.lists.typeRegsisteration = <?= $Page->typeRegsisteration->toClientList($Page) ?>;
    fip_admissionedit.lists.PaymentCategory = <?= $Page->PaymentCategory->toClientList($Page) ?>;
    fip_admissionedit.lists.physician_id = <?= $Page->physician_id->toClientList($Page) ?>;
    fip_admissionedit.lists.admission_consultant_id = <?= $Page->admission_consultant_id->toClientList($Page) ?>;
    fip_admissionedit.lists.leading_consultant_id = <?= $Page->leading_consultant_id->toClientList($Page) ?>;
    fip_admissionedit.lists.PaymentStatus = <?= $Page->PaymentStatus->toClientList($Page) ?>;
    fip_admissionedit.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fip_admissionedit.lists.HospID = <?= $Page->HospID->toClientList($Page) ?>;
    fip_admissionedit.lists.ReferedByDr = <?= $Page->ReferedByDr->toClientList($Page) ?>;
    fip_admissionedit.lists.ReferA4TreatingConsultant = <?= $Page->ReferA4TreatingConsultant->toClientList($Page) ?>;
    fip_admissionedit.lists.patient_id = <?= $Page->patient_id->toClientList($Page) ?>;
    loadjs.done("fip_admissionedit");
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
<form name="fip_admissionedit" id="fip_admissionedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ip_admission">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_ip_admission_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_ip_admission_id"><span id="el_ip_admission_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="ip_admission" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
    <div id="r_mrnNo" class="form-group row">
        <label id="elh_ip_admission_mrnNo" for="x_mrnNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_mrnNo"><?= $Page->mrnNo->caption() ?><?= $Page->mrnNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnNo->cellAttributes() ?>>
<template id="tpx_ip_admission_mrnNo"><span id="el_ip_admission_mrnNo">
<input type="<?= $Page->mrnNo->getInputTextType() ?>" data-table="ip_admission" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnNo->getPlaceHolder()) ?>" value="<?= $Page->mrnNo->EditValue ?>"<?= $Page->mrnNo->editAttributes() ?> aria-describedby="x_mrnNo_help">
<?= $Page->mrnNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_ip_admission_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_PatientID"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx_ip_admission_PatientID"><span id="el_ip_admission_PatientID">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="ip_admission" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?> aria-describedby="x_PatientID_help">
<?= $Page->PatientID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
    <div id="r_patient_name" class="form-group row">
        <label id="elh_ip_admission_patient_name" for="x_patient_name" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_patient_name"><?= $Page->patient_name->caption() ?><?= $Page->patient_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_name->cellAttributes() ?>>
<template id="tpx_ip_admission_patient_name"><span id="el_ip_admission_patient_name">
<input type="<?= $Page->patient_name->getInputTextType() ?>" data-table="ip_admission" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patient_name->getPlaceHolder()) ?>" value="<?= $Page->patient_name->EditValue ?>"<?= $Page->patient_name->editAttributes() ?> aria-describedby="x_patient_name_help">
<?= $Page->patient_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->patient_name->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mobileno->Visible) { // mobileno ?>
    <div id="r_mobileno" class="form-group row">
        <label id="elh_ip_admission_mobileno" for="x_mobileno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_mobileno"><?= $Page->mobileno->caption() ?><?= $Page->mobileno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mobileno->cellAttributes() ?>>
<template id="tpx_ip_admission_mobileno"><span id="el_ip_admission_mobileno">
<input type="<?= $Page->mobileno->getInputTextType() ?>" data-table="ip_admission" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mobileno->getPlaceHolder()) ?>" value="<?= $Page->mobileno->EditValue ?>"<?= $Page->mobileno->editAttributes() ?> aria-describedby="x_mobileno_help">
<?= $Page->mobileno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mobileno->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <div id="r_gender" class="form-group row">
        <label id="elh_ip_admission_gender" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_gender"><?= $Page->gender->caption() ?><?= $Page->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->gender->cellAttributes() ?>>
<template id="tpx_ip_admission_gender"><span id="el_ip_admission_gender">
<?php
$onchange = $Page->gender->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->gender->EditAttrs["onchange"] = "";
?>
<span id="as_x_gender" class="ew-auto-suggest">
    <input type="<?= $Page->gender->getInputTextType() ?>" class="form-control" name="sv_x_gender" id="sv_x_gender" value="<?= RemoveHtml($Page->gender->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->gender->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->gender->getPlaceHolder()) ?>"<?= $Page->gender->editAttributes() ?> aria-describedby="x_gender_help">
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="ip_admission" data-field="x_gender" data-input="sv_x_gender" data-value-separator="<?= $Page->gender->displayValueSeparatorAttribute() ?>" name="x_gender" id="x_gender" value="<?= HtmlEncode($Page->gender->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->gender->getErrorMessage() ?></div>
<script>
loadjs.ready(["fip_admissionedit"], function() {
    fip_admissionedit.createAutoSuggest(Object.assign({"id":"x_gender","forceSelect":false}, ew.vars.tables.ip_admission.fields.gender.autoSuggestOptions));
});
</script>
<?= $Page->gender->Lookup->getParamTag($Page, "p_x_gender") ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
    <div id="r_age" class="form-group row">
        <label id="elh_ip_admission_age" for="x_age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_age"><?= $Page->age->caption() ?><?= $Page->age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->age->cellAttributes() ?>>
<template id="tpx_ip_admission_age"><span id="el_ip_admission_age">
<input type="<?= $Page->age->getInputTextType() ?>" data-table="ip_admission" data-field="x_age" name="x_age" id="x_age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->age->getPlaceHolder()) ?>" value="<?= $Page->age->EditValue ?>"<?= $Page->age->editAttributes() ?> aria-describedby="x_age_help">
<?= $Page->age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->age->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
    <div id="r_typeRegsisteration" class="form-group row">
        <label id="elh_ip_admission_typeRegsisteration" for="x_typeRegsisteration" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_typeRegsisteration"><?= $Page->typeRegsisteration->caption() ?><?= $Page->typeRegsisteration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->typeRegsisteration->cellAttributes() ?>>
<template id="tpx_ip_admission_typeRegsisteration"><span id="el_ip_admission_typeRegsisteration">
    <select
        id="x_typeRegsisteration"
        name="x_typeRegsisteration"
        class="form-control ew-select<?= $Page->typeRegsisteration->isInvalidClass() ?>"
        data-select2-id="ip_admission_x_typeRegsisteration"
        data-table="ip_admission"
        data-field="x_typeRegsisteration"
        data-value-separator="<?= $Page->typeRegsisteration->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->typeRegsisteration->getPlaceHolder()) ?>"
        <?= $Page->typeRegsisteration->editAttributes() ?>>
        <?= $Page->typeRegsisteration->selectOptionListHtml("x_typeRegsisteration") ?>
    </select>
    <?= $Page->typeRegsisteration->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->typeRegsisteration->getErrorMessage() ?></div>
<?= $Page->typeRegsisteration->Lookup->getParamTag($Page, "p_x_typeRegsisteration") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ip_admission_x_typeRegsisteration']"),
        options = { name: "x_typeRegsisteration", selectId: "ip_admission_x_typeRegsisteration", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ip_admission.fields.typeRegsisteration.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
    <div id="r_PaymentCategory" class="form-group row">
        <label id="elh_ip_admission_PaymentCategory" for="x_PaymentCategory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_PaymentCategory"><?= $Page->PaymentCategory->caption() ?><?= $Page->PaymentCategory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaymentCategory->cellAttributes() ?>>
<template id="tpx_ip_admission_PaymentCategory"><span id="el_ip_admission_PaymentCategory">
    <select
        id="x_PaymentCategory"
        name="x_PaymentCategory"
        class="form-control ew-select<?= $Page->PaymentCategory->isInvalidClass() ?>"
        data-select2-id="ip_admission_x_PaymentCategory"
        data-table="ip_admission"
        data-field="x_PaymentCategory"
        data-value-separator="<?= $Page->PaymentCategory->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PaymentCategory->getPlaceHolder()) ?>"
        <?= $Page->PaymentCategory->editAttributes() ?>>
        <?= $Page->PaymentCategory->selectOptionListHtml("x_PaymentCategory") ?>
    </select>
    <?= $Page->PaymentCategory->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->PaymentCategory->getErrorMessage() ?></div>
<?= $Page->PaymentCategory->Lookup->getParamTag($Page, "p_x_PaymentCategory") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ip_admission_x_PaymentCategory']"),
        options = { name: "x_PaymentCategory", selectId: "ip_admission_x_PaymentCategory", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ip_admission.fields.PaymentCategory.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
    <div id="r_physician_id" class="form-group row">
        <label id="elh_ip_admission_physician_id" for="x_physician_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_physician_id"><?= $Page->physician_id->caption() ?><?= $Page->physician_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->physician_id->cellAttributes() ?>>
<template id="tpx_ip_admission_physician_id"><span id="el_ip_admission_physician_id">
    <select
        id="x_physician_id"
        name="x_physician_id"
        class="form-control ew-select<?= $Page->physician_id->isInvalidClass() ?>"
        data-select2-id="ip_admission_x_physician_id"
        data-table="ip_admission"
        data-field="x_physician_id"
        data-value-separator="<?= $Page->physician_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->physician_id->getPlaceHolder()) ?>"
        <?= $Page->physician_id->editAttributes() ?>>
        <?= $Page->physician_id->selectOptionListHtml("x_physician_id") ?>
    </select>
    <?= $Page->physician_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->physician_id->getErrorMessage() ?></div>
<?= $Page->physician_id->Lookup->getParamTag($Page, "p_x_physician_id") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ip_admission_x_physician_id']"),
        options = { name: "x_physician_id", selectId: "ip_admission_x_physician_id", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ip_admission.fields.physician_id.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
    <div id="r_admission_consultant_id" class="form-group row">
        <label id="elh_ip_admission_admission_consultant_id" for="x_admission_consultant_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_admission_consultant_id"><?= $Page->admission_consultant_id->caption() ?><?= $Page->admission_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->admission_consultant_id->cellAttributes() ?>>
<template id="tpx_ip_admission_admission_consultant_id"><span id="el_ip_admission_admission_consultant_id">
    <select
        id="x_admission_consultant_id"
        name="x_admission_consultant_id"
        class="form-control ew-select<?= $Page->admission_consultant_id->isInvalidClass() ?>"
        data-select2-id="ip_admission_x_admission_consultant_id"
        data-table="ip_admission"
        data-field="x_admission_consultant_id"
        data-value-separator="<?= $Page->admission_consultant_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->admission_consultant_id->getPlaceHolder()) ?>"
        <?= $Page->admission_consultant_id->editAttributes() ?>>
        <?= $Page->admission_consultant_id->selectOptionListHtml("x_admission_consultant_id") ?>
    </select>
    <?= $Page->admission_consultant_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->admission_consultant_id->getErrorMessage() ?></div>
<?= $Page->admission_consultant_id->Lookup->getParamTag($Page, "p_x_admission_consultant_id") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ip_admission_x_admission_consultant_id']"),
        options = { name: "x_admission_consultant_id", selectId: "ip_admission_x_admission_consultant_id", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ip_admission.fields.admission_consultant_id.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
    <div id="r_leading_consultant_id" class="form-group row">
        <label id="elh_ip_admission_leading_consultant_id" for="x_leading_consultant_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_leading_consultant_id"><?= $Page->leading_consultant_id->caption() ?><?= $Page->leading_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leading_consultant_id->cellAttributes() ?>>
<template id="tpx_ip_admission_leading_consultant_id"><span id="el_ip_admission_leading_consultant_id">
    <select
        id="x_leading_consultant_id"
        name="x_leading_consultant_id"
        class="form-control ew-select<?= $Page->leading_consultant_id->isInvalidClass() ?>"
        data-select2-id="ip_admission_x_leading_consultant_id"
        data-table="ip_admission"
        data-field="x_leading_consultant_id"
        data-value-separator="<?= $Page->leading_consultant_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->leading_consultant_id->getPlaceHolder()) ?>"
        <?= $Page->leading_consultant_id->editAttributes() ?>>
        <?= $Page->leading_consultant_id->selectOptionListHtml("x_leading_consultant_id") ?>
    </select>
    <?= $Page->leading_consultant_id->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->leading_consultant_id->getErrorMessage() ?></div>
<?= $Page->leading_consultant_id->Lookup->getParamTag($Page, "p_x_leading_consultant_id") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ip_admission_x_leading_consultant_id']"),
        options = { name: "x_leading_consultant_id", selectId: "ip_admission_x_leading_consultant_id", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ip_admission.fields.leading_consultant_id.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->cause->Visible) { // cause ?>
    <div id="r_cause" class="form-group row">
        <label id="elh_ip_admission_cause" for="x_cause" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_cause"><?= $Page->cause->caption() ?><?= $Page->cause->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->cause->cellAttributes() ?>>
<template id="tpx_ip_admission_cause"><span id="el_ip_admission_cause">
<textarea data-table="ip_admission" data-field="x_cause" name="x_cause" id="x_cause" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->cause->getPlaceHolder()) ?>"<?= $Page->cause->editAttributes() ?> aria-describedby="x_cause_help"><?= $Page->cause->EditValue ?></textarea>
<?= $Page->cause->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->cause->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
    <div id="r_admission_date" class="form-group row">
        <label id="elh_ip_admission_admission_date" for="x_admission_date" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_admission_date"><?= $Page->admission_date->caption() ?><?= $Page->admission_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->admission_date->cellAttributes() ?>>
<template id="tpx_ip_admission_admission_date"><span id="el_ip_admission_admission_date">
<input type="<?= $Page->admission_date->getInputTextType() ?>" data-table="ip_admission" data-field="x_admission_date" data-format="11" name="x_admission_date" id="x_admission_date" placeholder="<?= HtmlEncode($Page->admission_date->getPlaceHolder()) ?>" value="<?= $Page->admission_date->EditValue ?>"<?= $Page->admission_date->editAttributes() ?> aria-describedby="x_admission_date_help">
<?= $Page->admission_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->admission_date->getErrorMessage() ?></div>
<?php if (!$Page->admission_date->ReadOnly && !$Page->admission_date->Disabled && !isset($Page->admission_date->EditAttrs["readonly"]) && !isset($Page->admission_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fip_admissionedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fip_admissionedit", "x_admission_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
    <div id="r_release_date" class="form-group row">
        <label id="elh_ip_admission_release_date" for="x_release_date" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_release_date"><?= $Page->release_date->caption() ?><?= $Page->release_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->release_date->cellAttributes() ?>>
<template id="tpx_ip_admission_release_date"><span id="el_ip_admission_release_date">
<input type="<?= $Page->release_date->getInputTextType() ?>" data-table="ip_admission" data-field="x_release_date" data-format="17" name="x_release_date" id="x_release_date" placeholder="<?= HtmlEncode($Page->release_date->getPlaceHolder()) ?>" value="<?= $Page->release_date->EditValue ?>"<?= $Page->release_date->editAttributes() ?> aria-describedby="x_release_date_help">
<?= $Page->release_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->release_date->getErrorMessage() ?></div>
<?php if (!$Page->release_date->ReadOnly && !$Page->release_date->Disabled && !isset($Page->release_date->EditAttrs["readonly"]) && !isset($Page->release_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fip_admissionedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fip_admissionedit", "x_release_date", {"ignoreReadonly":true,"useCurrent":false,"format":17});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
    <div id="r_PaymentStatus" class="form-group row">
        <label id="elh_ip_admission_PaymentStatus" for="x_PaymentStatus" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_PaymentStatus"><?= $Page->PaymentStatus->caption() ?><?= $Page->PaymentStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaymentStatus->cellAttributes() ?>>
<template id="tpx_ip_admission_PaymentStatus"><span id="el_ip_admission_PaymentStatus">
    <select
        id="x_PaymentStatus"
        name="x_PaymentStatus"
        class="form-control ew-select<?= $Page->PaymentStatus->isInvalidClass() ?>"
        data-select2-id="ip_admission_x_PaymentStatus"
        data-table="ip_admission"
        data-field="x_PaymentStatus"
        data-value-separator="<?= $Page->PaymentStatus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PaymentStatus->getPlaceHolder()) ?>"
        <?= $Page->PaymentStatus->editAttributes() ?>>
        <?= $Page->PaymentStatus->selectOptionListHtml("x_PaymentStatus") ?>
    </select>
    <?= $Page->PaymentStatus->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->PaymentStatus->getErrorMessage() ?></div>
<?= $Page->PaymentStatus->Lookup->getParamTag($Page, "p_x_PaymentStatus") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ip_admission_x_PaymentStatus']"),
        options = { name: "x_PaymentStatus", selectId: "ip_admission_x_PaymentStatus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ip_admission.fields.PaymentStatus.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_ip_admission_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_profilePic"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_ip_admission_profilePic"><span id="el_ip_admission_profilePic">
<textarea data-table="ip_admission" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help"><?= $Page->profilePic->EditValue ?></textarea>
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DOB->Visible) { // DOB ?>
    <div id="r_DOB" class="form-group row">
        <label id="elh_ip_admission_DOB" for="x_DOB" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_DOB"><?= $Page->DOB->caption() ?><?= $Page->DOB->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DOB->cellAttributes() ?>>
<template id="tpx_ip_admission_DOB"><span id="el_ip_admission_DOB">
<input type="<?= $Page->DOB->getInputTextType() ?>" data-table="ip_admission" data-field="x_DOB" name="x_DOB" id="x_DOB" placeholder="<?= HtmlEncode($Page->DOB->getPlaceHolder()) ?>" value="<?= $Page->DOB->EditValue ?>"<?= $Page->DOB->editAttributes() ?> aria-describedby="x_DOB_help">
<?= $Page->DOB->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DOB->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
    <div id="r_ReferedByDr" class="form-group row">
        <label id="elh_ip_admission_ReferedByDr" for="x_ReferedByDr" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_ReferedByDr"><?= $Page->ReferedByDr->caption() ?><?= $Page->ReferedByDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferedByDr->cellAttributes() ?>>
<template id="tpx_ip_admission_ReferedByDr"><span id="el_ip_admission_ReferedByDr">
<?php $Page->ReferedByDr->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_ReferedByDr_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferedByDr"><?= EmptyValue(strval($Page->ReferedByDr->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->ReferedByDr->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->ReferedByDr->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->ReferedByDr->ReadOnly || $Page->ReferedByDr->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferedByDr',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
        <?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$Page->ReferedByDr->ReadOnly) { ?>
        <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ReferedByDr" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->ReferedByDr->caption() ?>" data-title="<?= $Page->ReferedByDr->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ReferedByDr',url:'<?= GetUrl("MasReferenceTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
        <?php } ?>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->ReferedByDr->getErrorMessage() ?></div>
<?= $Page->ReferedByDr->getCustomMessage() ?>
<?= $Page->ReferedByDr->Lookup->getParamTag($Page, "p_x_ReferedByDr") ?>
<input type="hidden" is="selection-list" data-table="ip_admission" data-field="x_ReferedByDr" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->ReferedByDr->displayValueSeparatorAttribute() ?>" name="x_ReferedByDr" id="x_ReferedByDr" value="<?= $Page->ReferedByDr->CurrentValue ?>"<?= $Page->ReferedByDr->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
    <div id="r_ReferClinicname" class="form-group row">
        <label id="elh_ip_admission_ReferClinicname" for="x_ReferClinicname" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_ReferClinicname"><?= $Page->ReferClinicname->caption() ?><?= $Page->ReferClinicname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferClinicname->cellAttributes() ?>>
<template id="tpx_ip_admission_ReferClinicname"><span id="el_ip_admission_ReferClinicname">
<input type="<?= $Page->ReferClinicname->getInputTextType() ?>" data-table="ip_admission" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferClinicname->getPlaceHolder()) ?>" value="<?= $Page->ReferClinicname->EditValue ?>"<?= $Page->ReferClinicname->editAttributes() ?> aria-describedby="x_ReferClinicname_help">
<?= $Page->ReferClinicname->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferClinicname->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
    <div id="r_ReferCity" class="form-group row">
        <label id="elh_ip_admission_ReferCity" for="x_ReferCity" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_ReferCity"><?= $Page->ReferCity->caption() ?><?= $Page->ReferCity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferCity->cellAttributes() ?>>
<template id="tpx_ip_admission_ReferCity"><span id="el_ip_admission_ReferCity">
<input type="<?= $Page->ReferCity->getInputTextType() ?>" data-table="ip_admission" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferCity->getPlaceHolder()) ?>" value="<?= $Page->ReferCity->EditValue ?>"<?= $Page->ReferCity->editAttributes() ?> aria-describedby="x_ReferCity_help">
<?= $Page->ReferCity->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferCity->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
    <div id="r_ReferMobileNo" class="form-group row">
        <label id="elh_ip_admission_ReferMobileNo" for="x_ReferMobileNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_ReferMobileNo"><?= $Page->ReferMobileNo->caption() ?><?= $Page->ReferMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferMobileNo->cellAttributes() ?>>
<template id="tpx_ip_admission_ReferMobileNo"><span id="el_ip_admission_ReferMobileNo">
<input type="<?= $Page->ReferMobileNo->getInputTextType() ?>" data-table="ip_admission" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferMobileNo->getPlaceHolder()) ?>" value="<?= $Page->ReferMobileNo->EditValue ?>"<?= $Page->ReferMobileNo->editAttributes() ?> aria-describedby="x_ReferMobileNo_help">
<?= $Page->ReferMobileNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferMobileNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
    <div id="r_ReferA4TreatingConsultant" class="form-group row">
        <label id="elh_ip_admission_ReferA4TreatingConsultant" for="x_ReferA4TreatingConsultant" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_ReferA4TreatingConsultant"><?= $Page->ReferA4TreatingConsultant->caption() ?><?= $Page->ReferA4TreatingConsultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<template id="tpx_ip_admission_ReferA4TreatingConsultant"><span id="el_ip_admission_ReferA4TreatingConsultant">
<div class="input-group ew-lookup-list" aria-describedby="x_ReferA4TreatingConsultant_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ReferA4TreatingConsultant"><?= EmptyValue(strval($Page->ReferA4TreatingConsultant->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->ReferA4TreatingConsultant->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->ReferA4TreatingConsultant->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->ReferA4TreatingConsultant->ReadOnly || $Page->ReferA4TreatingConsultant->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ReferA4TreatingConsultant',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
        <?php if (AllowAdd(CurrentProjectID() . "doctors") && !$Page->ReferA4TreatingConsultant->ReadOnly) { ?>
        <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_ReferA4TreatingConsultant" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->ReferA4TreatingConsultant->caption() ?>" data-title="<?= $Page->ReferA4TreatingConsultant->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_ReferA4TreatingConsultant',url:'<?= GetUrl("DoctorsAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
        <?php } ?>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->ReferA4TreatingConsultant->getErrorMessage() ?></div>
<?= $Page->ReferA4TreatingConsultant->getCustomMessage() ?>
<?= $Page->ReferA4TreatingConsultant->Lookup->getParamTag($Page, "p_x_ReferA4TreatingConsultant") ?>
<input type="hidden" is="selection-list" data-table="ip_admission" data-field="x_ReferA4TreatingConsultant" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->ReferA4TreatingConsultant->displayValueSeparatorAttribute() ?>" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" value="<?= $Page->ReferA4TreatingConsultant->CurrentValue ?>"<?= $Page->ReferA4TreatingConsultant->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
    <div id="r_PurposreReferredfor" class="form-group row">
        <label id="elh_ip_admission_PurposreReferredfor" for="x_PurposreReferredfor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_PurposreReferredfor"><?= $Page->PurposreReferredfor->caption() ?><?= $Page->PurposreReferredfor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurposreReferredfor->cellAttributes() ?>>
<template id="tpx_ip_admission_PurposreReferredfor"><span id="el_ip_admission_PurposreReferredfor">
<input type="<?= $Page->PurposreReferredfor->getInputTextType() ?>" data-table="ip_admission" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PurposreReferredfor->getPlaceHolder()) ?>" value="<?= $Page->PurposreReferredfor->EditValue ?>"<?= $Page->PurposreReferredfor->editAttributes() ?> aria-describedby="x_PurposreReferredfor_help">
<?= $Page->PurposreReferredfor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PurposreReferredfor->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillClosing->Visible) { // BillClosing ?>
    <div id="r_BillClosing" class="form-group row">
        <label id="elh_ip_admission_BillClosing" for="x_BillClosing" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_BillClosing"><?= $Page->BillClosing->caption() ?><?= $Page->BillClosing->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillClosing->cellAttributes() ?>>
<template id="tpx_ip_admission_BillClosing"><span id="el_ip_admission_BillClosing">
<input type="<?= $Page->BillClosing->getInputTextType() ?>" data-table="ip_admission" data-field="x_BillClosing" name="x_BillClosing" id="x_BillClosing" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillClosing->getPlaceHolder()) ?>" value="<?= $Page->BillClosing->EditValue ?>"<?= $Page->BillClosing->editAttributes() ?> aria-describedby="x_BillClosing_help">
<?= $Page->BillClosing->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillClosing->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
    <div id="r_BillClosingDate" class="form-group row">
        <label id="elh_ip_admission_BillClosingDate" for="x_BillClosingDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_BillClosingDate"><?= $Page->BillClosingDate->caption() ?><?= $Page->BillClosingDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillClosingDate->cellAttributes() ?>>
<template id="tpx_ip_admission_BillClosingDate"><span id="el_ip_admission_BillClosingDate">
<input type="<?= $Page->BillClosingDate->getInputTextType() ?>" data-table="ip_admission" data-field="x_BillClosingDate" name="x_BillClosingDate" id="x_BillClosingDate" placeholder="<?= HtmlEncode($Page->BillClosingDate->getPlaceHolder()) ?>" value="<?= $Page->BillClosingDate->EditValue ?>"<?= $Page->BillClosingDate->editAttributes() ?> aria-describedby="x_BillClosingDate_help">
<?= $Page->BillClosingDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillClosingDate->getErrorMessage() ?></div>
<?php if (!$Page->BillClosingDate->ReadOnly && !$Page->BillClosingDate->Disabled && !isset($Page->BillClosingDate->EditAttrs["readonly"]) && !isset($Page->BillClosingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fip_admissionedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fip_admissionedit", "x_BillClosingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <div id="r_BillNumber" class="form-group row">
        <label id="elh_ip_admission_BillNumber" for="x_BillNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_BillNumber"><?= $Page->BillNumber->caption() ?><?= $Page->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillNumber->cellAttributes() ?>>
<template id="tpx_ip_admission_BillNumber"><span id="el_ip_admission_BillNumber">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="ip_admission" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?> aria-describedby="x_BillNumber_help">
<?= $Page->BillNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ClosingAmount->Visible) { // ClosingAmount ?>
    <div id="r_ClosingAmount" class="form-group row">
        <label id="elh_ip_admission_ClosingAmount" for="x_ClosingAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_ClosingAmount"><?= $Page->ClosingAmount->caption() ?><?= $Page->ClosingAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ClosingAmount->cellAttributes() ?>>
<template id="tpx_ip_admission_ClosingAmount"><span id="el_ip_admission_ClosingAmount">
<input type="<?= $Page->ClosingAmount->getInputTextType() ?>" data-table="ip_admission" data-field="x_ClosingAmount" name="x_ClosingAmount" id="x_ClosingAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ClosingAmount->getPlaceHolder()) ?>" value="<?= $Page->ClosingAmount->EditValue ?>"<?= $Page->ClosingAmount->editAttributes() ?> aria-describedby="x_ClosingAmount_help">
<?= $Page->ClosingAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ClosingAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ClosingType->Visible) { // ClosingType ?>
    <div id="r_ClosingType" class="form-group row">
        <label id="elh_ip_admission_ClosingType" for="x_ClosingType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_ClosingType"><?= $Page->ClosingType->caption() ?><?= $Page->ClosingType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ClosingType->cellAttributes() ?>>
<template id="tpx_ip_admission_ClosingType"><span id="el_ip_admission_ClosingType">
<input type="<?= $Page->ClosingType->getInputTextType() ?>" data-table="ip_admission" data-field="x_ClosingType" name="x_ClosingType" id="x_ClosingType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ClosingType->getPlaceHolder()) ?>" value="<?= $Page->ClosingType->EditValue ?>"<?= $Page->ClosingType->editAttributes() ?> aria-describedby="x_ClosingType_help">
<?= $Page->ClosingType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ClosingType->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillAmount->Visible) { // BillAmount ?>
    <div id="r_BillAmount" class="form-group row">
        <label id="elh_ip_admission_BillAmount" for="x_BillAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_BillAmount"><?= $Page->BillAmount->caption() ?><?= $Page->BillAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillAmount->cellAttributes() ?>>
<template id="tpx_ip_admission_BillAmount"><span id="el_ip_admission_BillAmount">
<input type="<?= $Page->BillAmount->getInputTextType() ?>" data-table="ip_admission" data-field="x_BillAmount" name="x_BillAmount" id="x_BillAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillAmount->getPlaceHolder()) ?>" value="<?= $Page->BillAmount->EditValue ?>"<?= $Page->BillAmount->editAttributes() ?> aria-describedby="x_BillAmount_help">
<?= $Page->BillAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->billclosedBy->Visible) { // billclosedBy ?>
    <div id="r_billclosedBy" class="form-group row">
        <label id="elh_ip_admission_billclosedBy" for="x_billclosedBy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_billclosedBy"><?= $Page->billclosedBy->caption() ?><?= $Page->billclosedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->billclosedBy->cellAttributes() ?>>
<template id="tpx_ip_admission_billclosedBy"><span id="el_ip_admission_billclosedBy">
<input type="<?= $Page->billclosedBy->getInputTextType() ?>" data-table="ip_admission" data-field="x_billclosedBy" name="x_billclosedBy" id="x_billclosedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->billclosedBy->getPlaceHolder()) ?>" value="<?= $Page->billclosedBy->EditValue ?>"<?= $Page->billclosedBy->editAttributes() ?> aria-describedby="x_billclosedBy_help">
<?= $Page->billclosedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->billclosedBy->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->bllcloseByDate->Visible) { // bllcloseByDate ?>
    <div id="r_bllcloseByDate" class="form-group row">
        <label id="elh_ip_admission_bllcloseByDate" for="x_bllcloseByDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_bllcloseByDate"><?= $Page->bllcloseByDate->caption() ?><?= $Page->bllcloseByDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->bllcloseByDate->cellAttributes() ?>>
<template id="tpx_ip_admission_bllcloseByDate"><span id="el_ip_admission_bllcloseByDate">
<input type="<?= $Page->bllcloseByDate->getInputTextType() ?>" data-table="ip_admission" data-field="x_bllcloseByDate" name="x_bllcloseByDate" id="x_bllcloseByDate" placeholder="<?= HtmlEncode($Page->bllcloseByDate->getPlaceHolder()) ?>" value="<?= $Page->bllcloseByDate->EditValue ?>"<?= $Page->bllcloseByDate->editAttributes() ?> aria-describedby="x_bllcloseByDate_help">
<?= $Page->bllcloseByDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->bllcloseByDate->getErrorMessage() ?></div>
<?php if (!$Page->bllcloseByDate->ReadOnly && !$Page->bllcloseByDate->Disabled && !isset($Page->bllcloseByDate->EditAttrs["readonly"]) && !isset($Page->bllcloseByDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fip_admissionedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fip_admissionedit", "x_bllcloseByDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
    <div id="r_ReportHeader" class="form-group row">
        <label id="elh_ip_admission_ReportHeader" for="x_ReportHeader" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_ReportHeader"><?= $Page->ReportHeader->caption() ?><?= $Page->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReportHeader->cellAttributes() ?>>
<template id="tpx_ip_admission_ReportHeader"><span id="el_ip_admission_ReportHeader">
<input type="<?= $Page->ReportHeader->getInputTextType() ?>" data-table="ip_admission" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReportHeader->getPlaceHolder()) ?>" value="<?= $Page->ReportHeader->EditValue ?>"<?= $Page->ReportHeader->editAttributes() ?> aria-describedby="x_ReportHeader_help">
<?= $Page->ReportHeader->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReportHeader->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
    <div id="r_Procedure" class="form-group row">
        <label id="elh_ip_admission_Procedure" for="x_Procedure" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_Procedure"><?= $Page->Procedure->caption() ?><?= $Page->Procedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Procedure->cellAttributes() ?>>
<template id="tpx_ip_admission_Procedure"><span id="el_ip_admission_Procedure">
<input type="<?= $Page->Procedure->getInputTextType() ?>" data-table="ip_admission" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Procedure->getPlaceHolder()) ?>" value="<?= $Page->Procedure->EditValue ?>"<?= $Page->Procedure->editAttributes() ?> aria-describedby="x_Procedure_help">
<?= $Page->Procedure->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Procedure->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <div id="r_Consultant" class="form-group row">
        <label id="elh_ip_admission_Consultant" for="x_Consultant" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_Consultant"><?= $Page->Consultant->caption() ?><?= $Page->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Consultant->cellAttributes() ?>>
<template id="tpx_ip_admission_Consultant"><span id="el_ip_admission_Consultant">
<input type="<?= $Page->Consultant->getInputTextType() ?>" data-table="ip_admission" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Consultant->getPlaceHolder()) ?>" value="<?= $Page->Consultant->EditValue ?>"<?= $Page->Consultant->editAttributes() ?> aria-describedby="x_Consultant_help">
<?= $Page->Consultant->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Consultant->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
    <div id="r_Anesthetist" class="form-group row">
        <label id="elh_ip_admission_Anesthetist" for="x_Anesthetist" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_Anesthetist"><?= $Page->Anesthetist->caption() ?><?= $Page->Anesthetist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Anesthetist->cellAttributes() ?>>
<template id="tpx_ip_admission_Anesthetist"><span id="el_ip_admission_Anesthetist">
<input type="<?= $Page->Anesthetist->getInputTextType() ?>" data-table="ip_admission" data-field="x_Anesthetist" name="x_Anesthetist" id="x_Anesthetist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Anesthetist->getPlaceHolder()) ?>" value="<?= $Page->Anesthetist->EditValue ?>"<?= $Page->Anesthetist->editAttributes() ?> aria-describedby="x_Anesthetist_help">
<?= $Page->Anesthetist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Anesthetist->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amound->Visible) { // Amound ?>
    <div id="r_Amound" class="form-group row">
        <label id="elh_ip_admission_Amound" for="x_Amound" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_Amound"><?= $Page->Amound->caption() ?><?= $Page->Amound->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amound->cellAttributes() ?>>
<template id="tpx_ip_admission_Amound"><span id="el_ip_admission_Amound">
<input type="<?= $Page->Amound->getInputTextType() ?>" data-table="ip_admission" data-field="x_Amound" name="x_Amound" id="x_Amound" size="30" placeholder="<?= HtmlEncode($Page->Amound->getPlaceHolder()) ?>" value="<?= $Page->Amound->EditValue ?>"<?= $Page->Amound->editAttributes() ?> aria-describedby="x_Amound_help">
<?= $Page->Amound->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amound->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Package->Visible) { // Package ?>
    <div id="r_Package" class="form-group row">
        <label id="elh_ip_admission_Package" for="x_Package" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_Package"><?= $Page->Package->caption() ?><?= $Page->Package->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Package->cellAttributes() ?>>
<template id="tpx_ip_admission_Package"><span id="el_ip_admission_Package">
<input type="<?= $Page->Package->getInputTextType() ?>" data-table="ip_admission" data-field="x_Package" name="x_Package" id="x_Package" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Package->getPlaceHolder()) ?>" value="<?= $Page->Package->EditValue ?>"<?= $Page->Package->editAttributes() ?> aria-describedby="x_Package_help">
<?= $Page->Package->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Package->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <div id="r_patient_id" class="form-group row">
        <label id="elh_ip_admission_patient_id" for="x_patient_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_patient_id"><?= $Page->patient_id->caption() ?><?= $Page->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_id->cellAttributes() ?>>
<template id="tpx_ip_admission_patient_id"><span id="el_ip_admission_patient_id">
<?php $Page->patient_id->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_patient_id_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient_id"><?= EmptyValue(strval($Page->patient_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->patient_id->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->patient_id->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->patient_id->ReadOnly || $Page->patient_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
        <?php if (AllowAdd(CurrentProjectID() . "patient") && !$Page->patient_id->ReadOnly) { ?>
        <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_patient_id" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->patient_id->caption() ?>" data-title="<?= $Page->patient_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_patient_id',url:'<?= GetUrl("PatientAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
        <?php } ?>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->patient_id->getErrorMessage() ?></div>
<?= $Page->patient_id->getCustomMessage() ?>
<?= $Page->patient_id->Lookup->getParamTag($Page, "p_x_patient_id") ?>
<input type="hidden" is="selection-list" data-table="ip_admission" data-field="x_patient_id" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->patient_id->displayValueSeparatorAttribute() ?>" name="x_patient_id" id="x_patient_id" value="<?= $Page->patient_id->CurrentValue ?>"<?= $Page->patient_id->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <div id="r_PartnerID" class="form-group row">
        <label id="elh_ip_admission_PartnerID" for="x_PartnerID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_PartnerID"><?= $Page->PartnerID->caption() ?><?= $Page->PartnerID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerID->cellAttributes() ?>>
<template id="tpx_ip_admission_PartnerID"><span id="el_ip_admission_PartnerID">
<input type="<?= $Page->PartnerID->getInputTextType() ?>" data-table="ip_admission" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerID->getPlaceHolder()) ?>" value="<?= $Page->PartnerID->EditValue ?>"<?= $Page->PartnerID->editAttributes() ?> aria-describedby="x_PartnerID_help">
<?= $Page->PartnerID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <div id="r_PartnerName" class="form-group row">
        <label id="elh_ip_admission_PartnerName" for="x_PartnerName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_PartnerName"><?= $Page->PartnerName->caption() ?><?= $Page->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerName->cellAttributes() ?>>
<template id="tpx_ip_admission_PartnerName"><span id="el_ip_admission_PartnerName">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="ip_admission" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?> aria-describedby="x_PartnerName_help">
<?= $Page->PartnerName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
    <div id="r_PartnerMobile" class="form-group row">
        <label id="elh_ip_admission_PartnerMobile" for="x_PartnerMobile" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_PartnerMobile"><?= $Page->PartnerMobile->caption() ?><?= $Page->PartnerMobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerMobile->cellAttributes() ?>>
<template id="tpx_ip_admission_PartnerMobile"><span id="el_ip_admission_PartnerMobile">
<input type="<?= $Page->PartnerMobile->getInputTextType() ?>" data-table="ip_admission" data-field="x_PartnerMobile" name="x_PartnerMobile" id="x_PartnerMobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerMobile->getPlaceHolder()) ?>" value="<?= $Page->PartnerMobile->EditValue ?>"<?= $Page->PartnerMobile->editAttributes() ?> aria-describedby="x_PartnerMobile_help">
<?= $Page->PartnerMobile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerMobile->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Cid->Visible) { // Cid ?>
    <div id="r_Cid" class="form-group row">
        <label id="elh_ip_admission_Cid" for="x_Cid" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_Cid"><?= $Page->Cid->caption() ?><?= $Page->Cid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Cid->cellAttributes() ?>>
<template id="tpx_ip_admission_Cid"><span id="el_ip_admission_Cid">
<input type="<?= $Page->Cid->getInputTextType() ?>" data-table="ip_admission" data-field="x_Cid" name="x_Cid" id="x_Cid" size="30" placeholder="<?= HtmlEncode($Page->Cid->getPlaceHolder()) ?>" value="<?= $Page->Cid->EditValue ?>"<?= $Page->Cid->editAttributes() ?> aria-describedby="x_Cid_help">
<?= $Page->Cid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Cid->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartId->Visible) { // PartId ?>
    <div id="r_PartId" class="form-group row">
        <label id="elh_ip_admission_PartId" for="x_PartId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_PartId"><?= $Page->PartId->caption() ?><?= $Page->PartId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartId->cellAttributes() ?>>
<template id="tpx_ip_admission_PartId"><span id="el_ip_admission_PartId">
<input type="<?= $Page->PartId->getInputTextType() ?>" data-table="ip_admission" data-field="x_PartId" name="x_PartId" id="x_PartId" size="30" placeholder="<?= HtmlEncode($Page->PartId->getPlaceHolder()) ?>" value="<?= $Page->PartId->EditValue ?>"<?= $Page->PartId->editAttributes() ?> aria-describedby="x_PartId_help">
<?= $Page->PartId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartId->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IDProof->Visible) { // IDProof ?>
    <div id="r_IDProof" class="form-group row">
        <label id="elh_ip_admission_IDProof" for="x_IDProof" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_IDProof"><?= $Page->IDProof->caption() ?><?= $Page->IDProof->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IDProof->cellAttributes() ?>>
<template id="tpx_ip_admission_IDProof"><span id="el_ip_admission_IDProof">
<input type="<?= $Page->IDProof->getInputTextType() ?>" data-table="ip_admission" data-field="x_IDProof" name="x_IDProof" id="x_IDProof" size="30" maxlength="115" placeholder="<?= HtmlEncode($Page->IDProof->getPlaceHolder()) ?>" value="<?= $Page->IDProof->EditValue ?>"<?= $Page->IDProof->editAttributes() ?> aria-describedby="x_IDProof_help">
<?= $Page->IDProof->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IDProof->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
    <div id="r_AdviceToOtherHospital" class="form-group row">
        <label id="elh_ip_admission_AdviceToOtherHospital" for="x_AdviceToOtherHospital" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_AdviceToOtherHospital"><?= $Page->AdviceToOtherHospital->caption() ?><?= $Page->AdviceToOtherHospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdviceToOtherHospital->cellAttributes() ?>>
<template id="tpx_ip_admission_AdviceToOtherHospital"><span id="el_ip_admission_AdviceToOtherHospital">
<input type="<?= $Page->AdviceToOtherHospital->getInputTextType() ?>" data-table="ip_admission" data-field="x_AdviceToOtherHospital" name="x_AdviceToOtherHospital" id="x_AdviceToOtherHospital" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AdviceToOtherHospital->getPlaceHolder()) ?>" value="<?= $Page->AdviceToOtherHospital->EditValue ?>"<?= $Page->AdviceToOtherHospital->editAttributes() ?> aria-describedby="x_AdviceToOtherHospital_help">
<?= $Page->AdviceToOtherHospital->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AdviceToOtherHospital->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reason->Visible) { // Reason ?>
    <div id="r_Reason" class="form-group row">
        <label id="elh_ip_admission_Reason" for="x_Reason" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ip_admission_Reason"><?= $Page->Reason->caption() ?><?= $Page->Reason->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reason->cellAttributes() ?>>
<template id="tpx_ip_admission_Reason"><span id="el_ip_admission_Reason">
<textarea data-table="ip_admission" data-field="x_Reason" name="x_Reason" id="x_Reason" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Reason->getPlaceHolder()) ?>"<?= $Page->Reason->editAttributes() ?> aria-describedby="x_Reason_help"><?= $Page->Reason->EditValue ?></textarea>
<?= $Page->Reason->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reason->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ip_admissionedit" class="ew-custom-template"></div>
<template id="tpm_ip_admissionedit">
<div id="ct_IpAdmissionEdit"><style>
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
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#229954">
				<h3 class="card-title">Select Patient </h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_patient_id"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_patient_id"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_patient_name"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_patient_name"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_mobileno"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_mobileno"></slot></span>
				  </div>
				    <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_PatientID"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_PatientID"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_admission_date"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_admission_date"></slot></span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_mrnNo"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_mrnNo"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_gender"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_age"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_age"></slot></span>
				  </div>
				    <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_DOB"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_DOB"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_release_date"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_release_date"></slot></span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#7D3C98">
				<h3 class="card-title">Patient Visit Details</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_physician_id"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_physician_id"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_typeRegsisteration"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_typeRegsisteration"></slot></span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_PaymentCategory"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_PaymentCategory"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_PaymentStatus"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_PaymentStatus"></slot></span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#1F618D">
				<h3 class="card-title">Refered By.</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_ReferedByDr"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_ReferedByDr"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_ReferClinicname"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_ReferClinicname"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_ReferCity"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_ReferCity"></slot></span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_ReferMobileNo"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_ReferMobileNo"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_ReferA4TreatingConsultant"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_ReferA4TreatingConsultant"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ip_admission_PurposreReferredfor"></slot>&nbsp;<slot class="ew-slot" name="tpx_ip_admission_PurposreReferredfor"></slot></span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</template>
<?php
    if (in_array("patient_vitals", explode(",", $Page->getCurrentDetailTable())) && $patient_vitals->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_vitals", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientVitalsGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_history", explode(",", $Page->getCurrentDetailTable())) && $patient_history->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_history", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientHistoryGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_provisional_diagnosis", explode(",", $Page->getCurrentDetailTable())) && $patient_provisional_diagnosis->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_provisional_diagnosis", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientProvisionalDiagnosisGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_prescription", explode(",", $Page->getCurrentDetailTable())) && $patient_prescription->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_prescription", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientPrescriptionGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_final_diagnosis", explode(",", $Page->getCurrentDetailTable())) && $patient_final_diagnosis->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_final_diagnosis", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientFinalDiagnosisGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_follow_up", explode(",", $Page->getCurrentDetailTable())) && $patient_follow_up->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_follow_up", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientFollowUpGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_ot_delivery_register", explode(",", $Page->getCurrentDetailTable())) && $patient_ot_delivery_register->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_ot_delivery_register", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientOtDeliveryRegisterGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_ot_surgery_register", explode(",", $Page->getCurrentDetailTable())) && $patient_ot_surgery_register->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_ot_surgery_register", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientOtSurgeryRegisterGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_services", explode(",", $Page->getCurrentDetailTable())) && $patient_services->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_services", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientServicesGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_investigations", explode(",", $Page->getCurrentDetailTable())) && $patient_investigations->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_investigations", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientInvestigationsGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_insurance", explode(",", $Page->getCurrentDetailTable())) && $patient_insurance->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_insurance", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientInsuranceGrid.php" ?>
<?php } ?>
<?php
    if (in_array("pharmacy_pharled", explode(",", $Page->getCurrentDetailTable())) && $pharmacy_pharled->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("pharmacy_pharled", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PharmacyPharledGrid.php" ?>
<?php } ?>
<?php
    if (in_array("view_ip_advance", explode(",", $Page->getCurrentDetailTable())) && $view_ip_advance->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("view_ip_advance", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ViewIpAdvanceGrid.php" ?>
<?php } ?>
<?php
    if (in_array("patient_room", explode(",", $Page->getCurrentDetailTable())) && $patient_room->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_room", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientRoomGrid.php" ?>
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
    ew.applyTemplate("tpd_ip_admissionedit", "tpm_ip_admissionedit", "ip_admissionedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("ip_admission");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

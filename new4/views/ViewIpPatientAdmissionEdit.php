<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIpPatientAdmissionEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_ip_patient_admissionedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fview_ip_patient_admissionedit = currentForm = new ew.Form("fview_ip_patient_admissionedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_ip_patient_admission")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_ip_patient_admission)
        ew.vars.tables.view_ip_patient_admission = currentTable;
    fview_ip_patient_admissionedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["mrnNo", [fields.mrnNo.visible && fields.mrnNo.required ? ew.Validators.required(fields.mrnNo.caption) : null], fields.mrnNo.isInvalid],
        ["PatientID", [fields.PatientID.visible && fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["patient_name", [fields.patient_name.visible && fields.patient_name.required ? ew.Validators.required(fields.patient_name.caption) : null], fields.patient_name.isInvalid],
        ["mobileno", [fields.mobileno.visible && fields.mobileno.required ? ew.Validators.required(fields.mobileno.caption) : null], fields.mobileno.isInvalid],
        ["profilePic", [fields.profilePic.visible && fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["gender", [fields.gender.visible && fields.gender.required ? ew.Validators.required(fields.gender.caption) : null], fields.gender.isInvalid],
        ["age", [fields.age.visible && fields.age.required ? ew.Validators.required(fields.age.caption) : null], fields.age.isInvalid],
        ["Package", [fields.Package.visible && fields.Package.required ? ew.Validators.required(fields.Package.caption) : null], fields.Package.isInvalid],
        ["typeRegsisteration", [fields.typeRegsisteration.visible && fields.typeRegsisteration.required ? ew.Validators.required(fields.typeRegsisteration.caption) : null], fields.typeRegsisteration.isInvalid],
        ["PaymentCategory", [fields.PaymentCategory.visible && fields.PaymentCategory.required ? ew.Validators.required(fields.PaymentCategory.caption) : null], fields.PaymentCategory.isInvalid],
        ["admission_consultant_id", [fields.admission_consultant_id.visible && fields.admission_consultant_id.required ? ew.Validators.required(fields.admission_consultant_id.caption) : null, ew.Validators.integer], fields.admission_consultant_id.isInvalid],
        ["leading_consultant_id", [fields.leading_consultant_id.visible && fields.leading_consultant_id.required ? ew.Validators.required(fields.leading_consultant_id.caption) : null, ew.Validators.integer], fields.leading_consultant_id.isInvalid],
        ["cause", [fields.cause.visible && fields.cause.required ? ew.Validators.required(fields.cause.caption) : null], fields.cause.isInvalid],
        ["admission_date", [fields.admission_date.visible && fields.admission_date.required ? ew.Validators.required(fields.admission_date.caption) : null, ew.Validators.datetime(11)], fields.admission_date.isInvalid],
        ["release_date", [fields.release_date.visible && fields.release_date.required ? ew.Validators.required(fields.release_date.caption) : null, ew.Validators.datetime(11)], fields.release_date.isInvalid],
        ["PaymentStatus", [fields.PaymentStatus.visible && fields.PaymentStatus.required ? ew.Validators.required(fields.PaymentStatus.caption) : null], fields.PaymentStatus.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
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
        ["physician_id", [fields.physician_id.visible && fields.physician_id.required ? ew.Validators.required(fields.physician_id.caption) : null], fields.physician_id.isInvalid],
        ["PartnerID", [fields.PartnerID.visible && fields.PartnerID.required ? ew.Validators.required(fields.PartnerID.caption) : null], fields.PartnerID.isInvalid],
        ["PartnerName", [fields.PartnerName.visible && fields.PartnerName.required ? ew.Validators.required(fields.PartnerName.caption) : null], fields.PartnerName.isInvalid],
        ["PartnerMobile", [fields.PartnerMobile.visible && fields.PartnerMobile.required ? ew.Validators.required(fields.PartnerMobile.caption) : null], fields.PartnerMobile.isInvalid],
        ["patient_id", [fields.patient_id.visible && fields.patient_id.required ? ew.Validators.required(fields.patient_id.caption) : null], fields.patient_id.isInvalid],
        ["Cid", [fields.Cid.visible && fields.Cid.required ? ew.Validators.required(fields.Cid.caption) : null], fields.Cid.isInvalid],
        ["PartId", [fields.PartId.visible && fields.PartId.required ? ew.Validators.required(fields.PartId.caption) : null, ew.Validators.integer], fields.PartId.isInvalid],
        ["IDProof", [fields.IDProof.visible && fields.IDProof.required ? ew.Validators.required(fields.IDProof.caption) : null], fields.IDProof.isInvalid],
        ["DOB", [fields.DOB.visible && fields.DOB.required ? ew.Validators.required(fields.DOB.caption) : null], fields.DOB.isInvalid],
        ["AdviceToOtherHospital", [fields.AdviceToOtherHospital.visible && fields.AdviceToOtherHospital.required ? ew.Validators.required(fields.AdviceToOtherHospital.caption) : null], fields.AdviceToOtherHospital.isInvalid],
        ["Reason", [fields.Reason.visible && fields.Reason.required ? ew.Validators.required(fields.Reason.caption) : null], fields.Reason.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_ip_patient_admissionedit,
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
    fview_ip_patient_admissionedit.validate = function () {
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
    fview_ip_patient_admissionedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_ip_patient_admissionedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_ip_patient_admissionedit.lists.typeRegsisteration = <?= $Page->typeRegsisteration->toClientList($Page) ?>;
    fview_ip_patient_admissionedit.lists.PaymentCategory = <?= $Page->PaymentCategory->toClientList($Page) ?>;
    fview_ip_patient_admissionedit.lists.PaymentStatus = <?= $Page->PaymentStatus->toClientList($Page) ?>;
    fview_ip_patient_admissionedit.lists.HospID = <?= $Page->HospID->toClientList($Page) ?>;
    fview_ip_patient_admissionedit.lists.ReferedByDr = <?= $Page->ReferedByDr->toClientList($Page) ?>;
    fview_ip_patient_admissionedit.lists.BillClosing = <?= $Page->BillClosing->toClientList($Page) ?>;
    fview_ip_patient_admissionedit.lists.ReportHeader = <?= $Page->ReportHeader->toClientList($Page) ?>;
    fview_ip_patient_admissionedit.lists.Procedure = <?= $Page->Procedure->toClientList($Page) ?>;
    fview_ip_patient_admissionedit.lists.Consultant = <?= $Page->Consultant->toClientList($Page) ?>;
    fview_ip_patient_admissionedit.lists.Anesthetist = <?= $Page->Anesthetist->toClientList($Page) ?>;
    fview_ip_patient_admissionedit.lists.physician_id = <?= $Page->physician_id->toClientList($Page) ?>;
    fview_ip_patient_admissionedit.lists.patient_id = <?= $Page->patient_id->toClientList($Page) ?>;
    fview_ip_patient_admissionedit.lists.Cid = <?= $Page->Cid->toClientList($Page) ?>;
    fview_ip_patient_admissionedit.lists.AdviceToOtherHospital = <?= $Page->AdviceToOtherHospital->toClientList($Page) ?>;
    loadjs.done("fview_ip_patient_admissionedit");
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
<form name="fview_ip_patient_admissionedit" id="fview_ip_patient_admissionedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ip_patient_admission">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_view_ip_patient_admission_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_id"><span id="el_view_ip_patient_admission_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_ip_patient_admission" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
    <div id="r_mrnNo" class="form-group row">
        <label id="elh_view_ip_patient_admission_mrnNo" for="x_mrnNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_mrnNo"><?= $Page->mrnNo->caption() ?><?= $Page->mrnNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnNo->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_mrnNo"><span id="el_view_ip_patient_admission_mrnNo">
<input type="<?= $Page->mrnNo->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnNo->getPlaceHolder()) ?>" value="<?= $Page->mrnNo->EditValue ?>"<?= $Page->mrnNo->editAttributes() ?> aria-describedby="x_mrnNo_help">
<?= $Page->mrnNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_view_ip_patient_admission_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_PatientID"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_PatientID"><span id="el_view_ip_patient_admission_PatientID">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?> aria-describedby="x_PatientID_help">
<?= $Page->PatientID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
    <div id="r_patient_name" class="form-group row">
        <label id="elh_view_ip_patient_admission_patient_name" for="x_patient_name" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_patient_name"><?= $Page->patient_name->caption() ?><?= $Page->patient_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_name->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_patient_name"><span id="el_view_ip_patient_admission_patient_name">
<input type="<?= $Page->patient_name->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patient_name->getPlaceHolder()) ?>" value="<?= $Page->patient_name->EditValue ?>"<?= $Page->patient_name->editAttributes() ?> aria-describedby="x_patient_name_help">
<?= $Page->patient_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->patient_name->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mobileno->Visible) { // mobileno ?>
    <div id="r_mobileno" class="form-group row">
        <label id="elh_view_ip_patient_admission_mobileno" for="x_mobileno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_mobileno"><?= $Page->mobileno->caption() ?><?= $Page->mobileno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mobileno->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_mobileno"><span id="el_view_ip_patient_admission_mobileno">
<input type="<?= $Page->mobileno->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mobileno->getPlaceHolder()) ?>" value="<?= $Page->mobileno->EditValue ?>"<?= $Page->mobileno->editAttributes() ?> aria-describedby="x_mobileno_help">
<?= $Page->mobileno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mobileno->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_view_ip_patient_admission_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_profilePic"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_profilePic"><span id="el_view_ip_patient_admission_profilePic">
<input type="<?= $Page->profilePic->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>" value="<?= $Page->profilePic->EditValue ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help">
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <div id="r_gender" class="form-group row">
        <label id="elh_view_ip_patient_admission_gender" for="x_gender" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_gender"><?= $Page->gender->caption() ?><?= $Page->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->gender->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_gender"><span id="el_view_ip_patient_admission_gender">
<input type="<?= $Page->gender->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_gender" name="x_gender" id="x_gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->gender->getPlaceHolder()) ?>" value="<?= $Page->gender->EditValue ?>"<?= $Page->gender->editAttributes() ?> aria-describedby="x_gender_help">
<?= $Page->gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->gender->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
    <div id="r_age" class="form-group row">
        <label id="elh_view_ip_patient_admission_age" for="x_age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_age"><?= $Page->age->caption() ?><?= $Page->age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->age->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_age"><span id="el_view_ip_patient_admission_age">
<input type="<?= $Page->age->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_age" name="x_age" id="x_age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->age->getPlaceHolder()) ?>" value="<?= $Page->age->EditValue ?>"<?= $Page->age->editAttributes() ?> aria-describedby="x_age_help">
<?= $Page->age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->age->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Package->Visible) { // Package ?>
    <div id="r_Package" class="form-group row">
        <label id="elh_view_ip_patient_admission_Package" for="x_Package" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_Package"><?= $Page->Package->caption() ?><?= $Page->Package->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Package->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_Package"><span id="el_view_ip_patient_admission_Package">
<input type="<?= $Page->Package->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_Package" name="x_Package" id="x_Package" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Package->getPlaceHolder()) ?>" value="<?= $Page->Package->EditValue ?>"<?= $Page->Package->editAttributes() ?> aria-describedby="x_Package_help">
<?= $Page->Package->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Package->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
    <div id="r_typeRegsisteration" class="form-group row">
        <label id="elh_view_ip_patient_admission_typeRegsisteration" for="x_typeRegsisteration" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_typeRegsisteration"><?= $Page->typeRegsisteration->caption() ?><?= $Page->typeRegsisteration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->typeRegsisteration->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_typeRegsisteration"><span id="el_view_ip_patient_admission_typeRegsisteration">
    <select
        id="x_typeRegsisteration"
        name="x_typeRegsisteration"
        class="form-control ew-select<?= $Page->typeRegsisteration->isInvalidClass() ?>"
        data-select2-id="view_ip_patient_admission_x_typeRegsisteration"
        data-table="view_ip_patient_admission"
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
    var el = document.querySelector("select[data-select2-id='view_ip_patient_admission_x_typeRegsisteration']"),
        options = { name: "x_typeRegsisteration", selectId: "view_ip_patient_admission_x_typeRegsisteration", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ip_patient_admission.fields.typeRegsisteration.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
    <div id="r_PaymentCategory" class="form-group row">
        <label id="elh_view_ip_patient_admission_PaymentCategory" for="x_PaymentCategory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_PaymentCategory"><?= $Page->PaymentCategory->caption() ?><?= $Page->PaymentCategory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaymentCategory->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_PaymentCategory"><span id="el_view_ip_patient_admission_PaymentCategory">
    <select
        id="x_PaymentCategory"
        name="x_PaymentCategory"
        class="form-control ew-select<?= $Page->PaymentCategory->isInvalidClass() ?>"
        data-select2-id="view_ip_patient_admission_x_PaymentCategory"
        data-table="view_ip_patient_admission"
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
    var el = document.querySelector("select[data-select2-id='view_ip_patient_admission_x_PaymentCategory']"),
        options = { name: "x_PaymentCategory", selectId: "view_ip_patient_admission_x_PaymentCategory", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ip_patient_admission.fields.PaymentCategory.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
    <div id="r_admission_consultant_id" class="form-group row">
        <label id="elh_view_ip_patient_admission_admission_consultant_id" for="x_admission_consultant_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_admission_consultant_id"><?= $Page->admission_consultant_id->caption() ?><?= $Page->admission_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->admission_consultant_id->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_admission_consultant_id"><span id="el_view_ip_patient_admission_admission_consultant_id">
<input type="<?= $Page->admission_consultant_id->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_admission_consultant_id" name="x_admission_consultant_id" id="x_admission_consultant_id" size="30" placeholder="<?= HtmlEncode($Page->admission_consultant_id->getPlaceHolder()) ?>" value="<?= $Page->admission_consultant_id->EditValue ?>"<?= $Page->admission_consultant_id->editAttributes() ?> aria-describedby="x_admission_consultant_id_help">
<?= $Page->admission_consultant_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->admission_consultant_id->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
    <div id="r_leading_consultant_id" class="form-group row">
        <label id="elh_view_ip_patient_admission_leading_consultant_id" for="x_leading_consultant_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_leading_consultant_id"><?= $Page->leading_consultant_id->caption() ?><?= $Page->leading_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leading_consultant_id->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_leading_consultant_id"><span id="el_view_ip_patient_admission_leading_consultant_id">
<input type="<?= $Page->leading_consultant_id->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_leading_consultant_id" name="x_leading_consultant_id" id="x_leading_consultant_id" size="30" placeholder="<?= HtmlEncode($Page->leading_consultant_id->getPlaceHolder()) ?>" value="<?= $Page->leading_consultant_id->EditValue ?>"<?= $Page->leading_consultant_id->editAttributes() ?> aria-describedby="x_leading_consultant_id_help">
<?= $Page->leading_consultant_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leading_consultant_id->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->cause->Visible) { // cause ?>
    <div id="r_cause" class="form-group row">
        <label id="elh_view_ip_patient_admission_cause" for="x_cause" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_cause"><?= $Page->cause->caption() ?><?= $Page->cause->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->cause->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_cause"><span id="el_view_ip_patient_admission_cause">
<textarea data-table="view_ip_patient_admission" data-field="x_cause" name="x_cause" id="x_cause" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->cause->getPlaceHolder()) ?>"<?= $Page->cause->editAttributes() ?> aria-describedby="x_cause_help"><?= $Page->cause->EditValue ?></textarea>
<?= $Page->cause->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->cause->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
    <div id="r_admission_date" class="form-group row">
        <label id="elh_view_ip_patient_admission_admission_date" for="x_admission_date" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_admission_date"><?= $Page->admission_date->caption() ?><?= $Page->admission_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->admission_date->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_admission_date"><span id="el_view_ip_patient_admission_admission_date">
<input type="<?= $Page->admission_date->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_admission_date" data-format="11" name="x_admission_date" id="x_admission_date" placeholder="<?= HtmlEncode($Page->admission_date->getPlaceHolder()) ?>" value="<?= $Page->admission_date->EditValue ?>"<?= $Page->admission_date->editAttributes() ?> aria-describedby="x_admission_date_help">
<?= $Page->admission_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->admission_date->getErrorMessage() ?></div>
<?php if (!$Page->admission_date->ReadOnly && !$Page->admission_date->Disabled && !isset($Page->admission_date->EditAttrs["readonly"]) && !isset($Page->admission_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_patient_admissionedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_patient_admissionedit", "x_admission_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
    <div id="r_release_date" class="form-group row">
        <label id="elh_view_ip_patient_admission_release_date" for="x_release_date" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_release_date"><?= $Page->release_date->caption() ?><?= $Page->release_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->release_date->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_release_date"><span id="el_view_ip_patient_admission_release_date">
<input type="<?= $Page->release_date->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_release_date" data-format="11" name="x_release_date" id="x_release_date" placeholder="<?= HtmlEncode($Page->release_date->getPlaceHolder()) ?>" value="<?= $Page->release_date->EditValue ?>"<?= $Page->release_date->editAttributes() ?> aria-describedby="x_release_date_help">
<?= $Page->release_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->release_date->getErrorMessage() ?></div>
<?php if (!$Page->release_date->ReadOnly && !$Page->release_date->Disabled && !isset($Page->release_date->EditAttrs["readonly"]) && !isset($Page->release_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_patient_admissionedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_patient_admissionedit", "x_release_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
    <div id="r_PaymentStatus" class="form-group row">
        <label id="elh_view_ip_patient_admission_PaymentStatus" for="x_PaymentStatus" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_PaymentStatus"><?= $Page->PaymentStatus->caption() ?><?= $Page->PaymentStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaymentStatus->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_PaymentStatus"><span id="el_view_ip_patient_admission_PaymentStatus">
    <select
        id="x_PaymentStatus"
        name="x_PaymentStatus"
        class="form-control ew-select<?= $Page->PaymentStatus->isInvalidClass() ?>"
        data-select2-id="view_ip_patient_admission_x_PaymentStatus"
        data-table="view_ip_patient_admission"
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
    var el = document.querySelector("select[data-select2-id='view_ip_patient_admission_x_PaymentStatus']"),
        options = { name: "x_PaymentStatus", selectId: "view_ip_patient_admission_x_PaymentStatus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ip_patient_admission.fields.PaymentStatus.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_view_ip_patient_admission_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_status"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_status"><span id="el_view_ip_patient_admission_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
    <div id="r_ReferedByDr" class="form-group row">
        <label id="elh_view_ip_patient_admission_ReferedByDr" for="x_ReferedByDr" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_ReferedByDr"><?= $Page->ReferedByDr->caption() ?><?= $Page->ReferedByDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferedByDr->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_ReferedByDr"><span id="el_view_ip_patient_admission_ReferedByDr">
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
<input type="hidden" is="selection-list" data-table="view_ip_patient_admission" data-field="x_ReferedByDr" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->ReferedByDr->displayValueSeparatorAttribute() ?>" name="x_ReferedByDr" id="x_ReferedByDr" value="<?= $Page->ReferedByDr->CurrentValue ?>"<?= $Page->ReferedByDr->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
    <div id="r_ReferClinicname" class="form-group row">
        <label id="elh_view_ip_patient_admission_ReferClinicname" for="x_ReferClinicname" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_ReferClinicname"><?= $Page->ReferClinicname->caption() ?><?= $Page->ReferClinicname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferClinicname->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_ReferClinicname"><span id="el_view_ip_patient_admission_ReferClinicname">
<input type="<?= $Page->ReferClinicname->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferClinicname->getPlaceHolder()) ?>" value="<?= $Page->ReferClinicname->EditValue ?>"<?= $Page->ReferClinicname->editAttributes() ?> aria-describedby="x_ReferClinicname_help">
<?= $Page->ReferClinicname->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferClinicname->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
    <div id="r_ReferCity" class="form-group row">
        <label id="elh_view_ip_patient_admission_ReferCity" for="x_ReferCity" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_ReferCity"><?= $Page->ReferCity->caption() ?><?= $Page->ReferCity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferCity->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_ReferCity"><span id="el_view_ip_patient_admission_ReferCity">
<input type="<?= $Page->ReferCity->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferCity->getPlaceHolder()) ?>" value="<?= $Page->ReferCity->EditValue ?>"<?= $Page->ReferCity->editAttributes() ?> aria-describedby="x_ReferCity_help">
<?= $Page->ReferCity->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferCity->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
    <div id="r_ReferMobileNo" class="form-group row">
        <label id="elh_view_ip_patient_admission_ReferMobileNo" for="x_ReferMobileNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_ReferMobileNo"><?= $Page->ReferMobileNo->caption() ?><?= $Page->ReferMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferMobileNo->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_ReferMobileNo"><span id="el_view_ip_patient_admission_ReferMobileNo">
<input type="<?= $Page->ReferMobileNo->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferMobileNo->getPlaceHolder()) ?>" value="<?= $Page->ReferMobileNo->EditValue ?>"<?= $Page->ReferMobileNo->editAttributes() ?> aria-describedby="x_ReferMobileNo_help">
<?= $Page->ReferMobileNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferMobileNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
    <div id="r_ReferA4TreatingConsultant" class="form-group row">
        <label id="elh_view_ip_patient_admission_ReferA4TreatingConsultant" for="x_ReferA4TreatingConsultant" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_ReferA4TreatingConsultant"><?= $Page->ReferA4TreatingConsultant->caption() ?><?= $Page->ReferA4TreatingConsultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_ReferA4TreatingConsultant"><span id="el_view_ip_patient_admission_ReferA4TreatingConsultant">
<input type="<?= $Page->ReferA4TreatingConsultant->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_ReferA4TreatingConsultant" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferA4TreatingConsultant->getPlaceHolder()) ?>" value="<?= $Page->ReferA4TreatingConsultant->EditValue ?>"<?= $Page->ReferA4TreatingConsultant->editAttributes() ?> aria-describedby="x_ReferA4TreatingConsultant_help">
<?= $Page->ReferA4TreatingConsultant->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferA4TreatingConsultant->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
    <div id="r_PurposreReferredfor" class="form-group row">
        <label id="elh_view_ip_patient_admission_PurposreReferredfor" for="x_PurposreReferredfor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_PurposreReferredfor"><?= $Page->PurposreReferredfor->caption() ?><?= $Page->PurposreReferredfor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurposreReferredfor->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_PurposreReferredfor"><span id="el_view_ip_patient_admission_PurposreReferredfor">
<input type="<?= $Page->PurposreReferredfor->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PurposreReferredfor->getPlaceHolder()) ?>" value="<?= $Page->PurposreReferredfor->EditValue ?>"<?= $Page->PurposreReferredfor->editAttributes() ?> aria-describedby="x_PurposreReferredfor_help">
<?= $Page->PurposreReferredfor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PurposreReferredfor->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillClosing->Visible) { // BillClosing ?>
    <div id="r_BillClosing" class="form-group row">
        <label id="elh_view_ip_patient_admission_BillClosing" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_BillClosing"><?= $Page->BillClosing->caption() ?><?= $Page->BillClosing->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillClosing->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_BillClosing"><span id="el_view_ip_patient_admission_BillClosing">
<template id="tp_x_BillClosing">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_ip_patient_admission" data-field="x_BillClosing" name="x_BillClosing" id="x_BillClosing"<?= $Page->BillClosing->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_BillClosing" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_BillClosing[]"
    name="x_BillClosing[]"
    value="<?= HtmlEncode($Page->BillClosing->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_BillClosing"
    data-target="dsl_x_BillClosing"
    data-repeatcolumn="5"
    class="form-control<?= $Page->BillClosing->isInvalidClass() ?>"
    data-table="view_ip_patient_admission"
    data-field="x_BillClosing"
    data-value-separator="<?= $Page->BillClosing->displayValueSeparatorAttribute() ?>"
    <?= $Page->BillClosing->editAttributes() ?>>
<?= $Page->BillClosing->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillClosing->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
    <div id="r_BillClosingDate" class="form-group row">
        <label id="elh_view_ip_patient_admission_BillClosingDate" for="x_BillClosingDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_BillClosingDate"><?= $Page->BillClosingDate->caption() ?><?= $Page->BillClosingDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillClosingDate->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_BillClosingDate"><span id="el_view_ip_patient_admission_BillClosingDate">
<input type="<?= $Page->BillClosingDate->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_BillClosingDate" name="x_BillClosingDate" id="x_BillClosingDate" placeholder="<?= HtmlEncode($Page->BillClosingDate->getPlaceHolder()) ?>" value="<?= $Page->BillClosingDate->EditValue ?>"<?= $Page->BillClosingDate->editAttributes() ?> aria-describedby="x_BillClosingDate_help">
<?= $Page->BillClosingDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillClosingDate->getErrorMessage() ?></div>
<?php if (!$Page->BillClosingDate->ReadOnly && !$Page->BillClosingDate->Disabled && !isset($Page->BillClosingDate->EditAttrs["readonly"]) && !isset($Page->BillClosingDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_patient_admissionedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_patient_admissionedit", "x_BillClosingDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <div id="r_BillNumber" class="form-group row">
        <label id="elh_view_ip_patient_admission_BillNumber" for="x_BillNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_BillNumber"><?= $Page->BillNumber->caption() ?><?= $Page->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillNumber->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_BillNumber"><span id="el_view_ip_patient_admission_BillNumber">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?> aria-describedby="x_BillNumber_help">
<?= $Page->BillNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ClosingAmount->Visible) { // ClosingAmount ?>
    <div id="r_ClosingAmount" class="form-group row">
        <label id="elh_view_ip_patient_admission_ClosingAmount" for="x_ClosingAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_ClosingAmount"><?= $Page->ClosingAmount->caption() ?><?= $Page->ClosingAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ClosingAmount->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_ClosingAmount"><span id="el_view_ip_patient_admission_ClosingAmount">
<input type="<?= $Page->ClosingAmount->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_ClosingAmount" name="x_ClosingAmount" id="x_ClosingAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ClosingAmount->getPlaceHolder()) ?>" value="<?= $Page->ClosingAmount->EditValue ?>"<?= $Page->ClosingAmount->editAttributes() ?> aria-describedby="x_ClosingAmount_help">
<?= $Page->ClosingAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ClosingAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ClosingType->Visible) { // ClosingType ?>
    <div id="r_ClosingType" class="form-group row">
        <label id="elh_view_ip_patient_admission_ClosingType" for="x_ClosingType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_ClosingType"><?= $Page->ClosingType->caption() ?><?= $Page->ClosingType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ClosingType->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_ClosingType"><span id="el_view_ip_patient_admission_ClosingType">
<input type="<?= $Page->ClosingType->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_ClosingType" name="x_ClosingType" id="x_ClosingType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ClosingType->getPlaceHolder()) ?>" value="<?= $Page->ClosingType->EditValue ?>"<?= $Page->ClosingType->editAttributes() ?> aria-describedby="x_ClosingType_help">
<?= $Page->ClosingType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ClosingType->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillAmount->Visible) { // BillAmount ?>
    <div id="r_BillAmount" class="form-group row">
        <label id="elh_view_ip_patient_admission_BillAmount" for="x_BillAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_BillAmount"><?= $Page->BillAmount->caption() ?><?= $Page->BillAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillAmount->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_BillAmount"><span id="el_view_ip_patient_admission_BillAmount">
<input type="<?= $Page->BillAmount->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_BillAmount" name="x_BillAmount" id="x_BillAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillAmount->getPlaceHolder()) ?>" value="<?= $Page->BillAmount->EditValue ?>"<?= $Page->BillAmount->editAttributes() ?> aria-describedby="x_BillAmount_help">
<?= $Page->BillAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->billclosedBy->Visible) { // billclosedBy ?>
    <div id="r_billclosedBy" class="form-group row">
        <label id="elh_view_ip_patient_admission_billclosedBy" for="x_billclosedBy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_billclosedBy"><?= $Page->billclosedBy->caption() ?><?= $Page->billclosedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->billclosedBy->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_billclosedBy"><span id="el_view_ip_patient_admission_billclosedBy">
<input type="<?= $Page->billclosedBy->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_billclosedBy" name="x_billclosedBy" id="x_billclosedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->billclosedBy->getPlaceHolder()) ?>" value="<?= $Page->billclosedBy->EditValue ?>"<?= $Page->billclosedBy->editAttributes() ?> aria-describedby="x_billclosedBy_help">
<?= $Page->billclosedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->billclosedBy->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->bllcloseByDate->Visible) { // bllcloseByDate ?>
    <div id="r_bllcloseByDate" class="form-group row">
        <label id="elh_view_ip_patient_admission_bllcloseByDate" for="x_bllcloseByDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_bllcloseByDate"><?= $Page->bllcloseByDate->caption() ?><?= $Page->bllcloseByDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->bllcloseByDate->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_bllcloseByDate"><span id="el_view_ip_patient_admission_bllcloseByDate">
<input type="<?= $Page->bllcloseByDate->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_bllcloseByDate" name="x_bllcloseByDate" id="x_bllcloseByDate" placeholder="<?= HtmlEncode($Page->bllcloseByDate->getPlaceHolder()) ?>" value="<?= $Page->bllcloseByDate->EditValue ?>"<?= $Page->bllcloseByDate->editAttributes() ?> aria-describedby="x_bllcloseByDate_help">
<?= $Page->bllcloseByDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->bllcloseByDate->getErrorMessage() ?></div>
<?php if (!$Page->bllcloseByDate->ReadOnly && !$Page->bllcloseByDate->Disabled && !isset($Page->bllcloseByDate->EditAttrs["readonly"]) && !isset($Page->bllcloseByDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ip_patient_admissionedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ip_patient_admissionedit", "x_bllcloseByDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
    <div id="r_ReportHeader" class="form-group row">
        <label id="elh_view_ip_patient_admission_ReportHeader" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_ReportHeader"><?= $Page->ReportHeader->caption() ?><?= $Page->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReportHeader->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_ReportHeader"><span id="el_view_ip_patient_admission_ReportHeader">
<template id="tp_x_ReportHeader">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_ip_patient_admission" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader"<?= $Page->ReportHeader->editAttributes() ?>>
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
    data-table="view_ip_patient_admission"
    data-field="x_ReportHeader"
    data-value-separator="<?= $Page->ReportHeader->displayValueSeparatorAttribute() ?>"
    <?= $Page->ReportHeader->editAttributes() ?>>
<?= $Page->ReportHeader->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReportHeader->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
    <div id="r_Procedure" class="form-group row">
        <label id="elh_view_ip_patient_admission_Procedure" for="x_Procedure" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_Procedure"><?= $Page->Procedure->caption() ?><?= $Page->Procedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Procedure->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_Procedure"><span id="el_view_ip_patient_admission_Procedure">
<?php $Page->Procedure->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_Procedure_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Procedure"><?= EmptyValue(strval($Page->Procedure->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Procedure->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Procedure->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Procedure->ReadOnly || $Page->Procedure->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Procedure',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Procedure->getErrorMessage() ?></div>
<?= $Page->Procedure->getCustomMessage() ?>
<?= $Page->Procedure->Lookup->getParamTag($Page, "p_x_Procedure") ?>
<input type="hidden" is="selection-list" data-table="view_ip_patient_admission" data-field="x_Procedure" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Procedure->displayValueSeparatorAttribute() ?>" name="x_Procedure" id="x_Procedure" value="<?= $Page->Procedure->CurrentValue ?>"<?= $Page->Procedure->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <div id="r_Consultant" class="form-group row">
        <label id="elh_view_ip_patient_admission_Consultant" for="x_Consultant" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_Consultant"><?= $Page->Consultant->caption() ?><?= $Page->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Consultant->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_Consultant"><span id="el_view_ip_patient_admission_Consultant">
    <select
        id="x_Consultant"
        name="x_Consultant"
        class="form-control ew-select<?= $Page->Consultant->isInvalidClass() ?>"
        data-select2-id="view_ip_patient_admission_x_Consultant"
        data-table="view_ip_patient_admission"
        data-field="x_Consultant"
        data-value-separator="<?= $Page->Consultant->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Consultant->getPlaceHolder()) ?>"
        <?= $Page->Consultant->editAttributes() ?>>
        <?= $Page->Consultant->selectOptionListHtml("x_Consultant") ?>
    </select>
    <?= $Page->Consultant->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Consultant->getErrorMessage() ?></div>
<?= $Page->Consultant->Lookup->getParamTag($Page, "p_x_Consultant") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_ip_patient_admission_x_Consultant']"),
        options = { name: "x_Consultant", selectId: "view_ip_patient_admission_x_Consultant", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ip_patient_admission.fields.Consultant.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
    <div id="r_Anesthetist" class="form-group row">
        <label id="elh_view_ip_patient_admission_Anesthetist" for="x_Anesthetist" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_Anesthetist"><?= $Page->Anesthetist->caption() ?><?= $Page->Anesthetist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Anesthetist->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_Anesthetist"><span id="el_view_ip_patient_admission_Anesthetist">
    <select
        id="x_Anesthetist"
        name="x_Anesthetist"
        class="form-control ew-select<?= $Page->Anesthetist->isInvalidClass() ?>"
        data-select2-id="view_ip_patient_admission_x_Anesthetist"
        data-table="view_ip_patient_admission"
        data-field="x_Anesthetist"
        data-value-separator="<?= $Page->Anesthetist->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Anesthetist->getPlaceHolder()) ?>"
        <?= $Page->Anesthetist->editAttributes() ?>>
        <?= $Page->Anesthetist->selectOptionListHtml("x_Anesthetist") ?>
    </select>
    <?= $Page->Anesthetist->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Anesthetist->getErrorMessage() ?></div>
<?= $Page->Anesthetist->Lookup->getParamTag($Page, "p_x_Anesthetist") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_ip_patient_admission_x_Anesthetist']"),
        options = { name: "x_Anesthetist", selectId: "view_ip_patient_admission_x_Anesthetist", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ip_patient_admission.fields.Anesthetist.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amound->Visible) { // Amound ?>
    <div id="r_Amound" class="form-group row">
        <label id="elh_view_ip_patient_admission_Amound" for="x_Amound" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_Amound"><?= $Page->Amound->caption() ?><?= $Page->Amound->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amound->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_Amound"><span id="el_view_ip_patient_admission_Amound">
<input type="<?= $Page->Amound->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_Amound" name="x_Amound" id="x_Amound" size="12" maxlength="12" placeholder="<?= HtmlEncode($Page->Amound->getPlaceHolder()) ?>" value="<?= $Page->Amound->EditValue ?>"<?= $Page->Amound->editAttributes() ?> aria-describedby="x_Amound_help">
<?= $Page->Amound->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amound->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
    <div id="r_physician_id" class="form-group row">
        <label id="elh_view_ip_patient_admission_physician_id" for="x_physician_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_physician_id"><?= $Page->physician_id->caption() ?><?= $Page->physician_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->physician_id->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_physician_id"><span id="el_view_ip_patient_admission_physician_id">
<div class="input-group ew-lookup-list" aria-describedby="x_physician_id_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_physician_id"><?= EmptyValue(strval($Page->physician_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->physician_id->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->physician_id->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->physician_id->ReadOnly || $Page->physician_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_physician_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->physician_id->getErrorMessage() ?></div>
<?= $Page->physician_id->getCustomMessage() ?>
<?= $Page->physician_id->Lookup->getParamTag($Page, "p_x_physician_id") ?>
<input type="hidden" is="selection-list" data-table="view_ip_patient_admission" data-field="x_physician_id" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->physician_id->displayValueSeparatorAttribute() ?>" name="x_physician_id" id="x_physician_id" value="<?= $Page->physician_id->CurrentValue ?>"<?= $Page->physician_id->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <div id="r_PartnerID" class="form-group row">
        <label id="elh_view_ip_patient_admission_PartnerID" for="x_PartnerID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_PartnerID"><?= $Page->PartnerID->caption() ?><?= $Page->PartnerID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerID->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_PartnerID"><span id="el_view_ip_patient_admission_PartnerID">
<input type="<?= $Page->PartnerID->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerID->getPlaceHolder()) ?>" value="<?= $Page->PartnerID->EditValue ?>"<?= $Page->PartnerID->editAttributes() ?> aria-describedby="x_PartnerID_help">
<?= $Page->PartnerID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <div id="r_PartnerName" class="form-group row">
        <label id="elh_view_ip_patient_admission_PartnerName" for="x_PartnerName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_PartnerName"><?= $Page->PartnerName->caption() ?><?= $Page->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerName->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_PartnerName"><span id="el_view_ip_patient_admission_PartnerName">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?> aria-describedby="x_PartnerName_help">
<?= $Page->PartnerName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
    <div id="r_PartnerMobile" class="form-group row">
        <label id="elh_view_ip_patient_admission_PartnerMobile" for="x_PartnerMobile" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_PartnerMobile"><?= $Page->PartnerMobile->caption() ?><?= $Page->PartnerMobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerMobile->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_PartnerMobile"><span id="el_view_ip_patient_admission_PartnerMobile">
<input type="<?= $Page->PartnerMobile->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_PartnerMobile" name="x_PartnerMobile" id="x_PartnerMobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerMobile->getPlaceHolder()) ?>" value="<?= $Page->PartnerMobile->EditValue ?>"<?= $Page->PartnerMobile->editAttributes() ?> aria-describedby="x_PartnerMobile_help">
<?= $Page->PartnerMobile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerMobile->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <div id="r_patient_id" class="form-group row">
        <label id="elh_view_ip_patient_admission_patient_id" for="x_patient_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_patient_id"><?= $Page->patient_id->caption() ?><?= $Page->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_id->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_patient_id"><span id="el_view_ip_patient_admission_patient_id">
<?php $Page->patient_id->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_patient_id_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_patient_id"><?= EmptyValue(strval($Page->patient_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->patient_id->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->patient_id->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->patient_id->ReadOnly || $Page->patient_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_patient_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->patient_id->getErrorMessage() ?></div>
<?= $Page->patient_id->getCustomMessage() ?>
<?= $Page->patient_id->Lookup->getParamTag($Page, "p_x_patient_id") ?>
<input type="hidden" is="selection-list" data-table="view_ip_patient_admission" data-field="x_patient_id" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->patient_id->displayValueSeparatorAttribute() ?>" name="x_patient_id" id="x_patient_id" value="<?= $Page->patient_id->CurrentValue ?>"<?= $Page->patient_id->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Cid->Visible) { // Cid ?>
    <div id="r_Cid" class="form-group row">
        <label id="elh_view_ip_patient_admission_Cid" for="x_Cid" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_Cid"><?= $Page->Cid->caption() ?><?= $Page->Cid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Cid->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_Cid"><span id="el_view_ip_patient_admission_Cid">
<?php $Page->Cid->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_Cid_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Cid"><?= EmptyValue(strval($Page->Cid->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Cid->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Cid->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Cid->ReadOnly || $Page->Cid->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Cid',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Cid->getErrorMessage() ?></div>
<?= $Page->Cid->getCustomMessage() ?>
<?= $Page->Cid->Lookup->getParamTag($Page, "p_x_Cid") ?>
<input type="hidden" is="selection-list" data-table="view_ip_patient_admission" data-field="x_Cid" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Cid->displayValueSeparatorAttribute() ?>" name="x_Cid" id="x_Cid" value="<?= $Page->Cid->CurrentValue ?>"<?= $Page->Cid->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartId->Visible) { // PartId ?>
    <div id="r_PartId" class="form-group row">
        <label id="elh_view_ip_patient_admission_PartId" for="x_PartId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_PartId"><?= $Page->PartId->caption() ?><?= $Page->PartId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartId->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_PartId"><span id="el_view_ip_patient_admission_PartId">
<input type="<?= $Page->PartId->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_PartId" name="x_PartId" id="x_PartId" size="30" placeholder="<?= HtmlEncode($Page->PartId->getPlaceHolder()) ?>" value="<?= $Page->PartId->EditValue ?>"<?= $Page->PartId->editAttributes() ?> aria-describedby="x_PartId_help">
<?= $Page->PartId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartId->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IDProof->Visible) { // IDProof ?>
    <div id="r_IDProof" class="form-group row">
        <label id="elh_view_ip_patient_admission_IDProof" for="x_IDProof" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_IDProof"><?= $Page->IDProof->caption() ?><?= $Page->IDProof->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IDProof->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_IDProof"><span id="el_view_ip_patient_admission_IDProof">
<input type="<?= $Page->IDProof->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_IDProof" name="x_IDProof" id="x_IDProof" size="30" maxlength="115" placeholder="<?= HtmlEncode($Page->IDProof->getPlaceHolder()) ?>" value="<?= $Page->IDProof->EditValue ?>"<?= $Page->IDProof->editAttributes() ?> aria-describedby="x_IDProof_help">
<?= $Page->IDProof->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IDProof->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DOB->Visible) { // DOB ?>
    <div id="r_DOB" class="form-group row">
        <label id="elh_view_ip_patient_admission_DOB" for="x_DOB" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_DOB"><?= $Page->DOB->caption() ?><?= $Page->DOB->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DOB->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_DOB"><span id="el_view_ip_patient_admission_DOB">
<input type="<?= $Page->DOB->getInputTextType() ?>" data-table="view_ip_patient_admission" data-field="x_DOB" name="x_DOB" id="x_DOB" placeholder="<?= HtmlEncode($Page->DOB->getPlaceHolder()) ?>" value="<?= $Page->DOB->EditValue ?>"<?= $Page->DOB->editAttributes() ?> aria-describedby="x_DOB_help">
<?= $Page->DOB->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DOB->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
    <div id="r_AdviceToOtherHospital" class="form-group row">
        <label id="elh_view_ip_patient_admission_AdviceToOtherHospital" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_AdviceToOtherHospital"><?= $Page->AdviceToOtherHospital->caption() ?><?= $Page->AdviceToOtherHospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdviceToOtherHospital->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_AdviceToOtherHospital"><span id="el_view_ip_patient_admission_AdviceToOtherHospital">
<template id="tp_x_AdviceToOtherHospital">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_ip_patient_admission" data-field="x_AdviceToOtherHospital" name="x_AdviceToOtherHospital" id="x_AdviceToOtherHospital"<?= $Page->AdviceToOtherHospital->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_AdviceToOtherHospital" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_AdviceToOtherHospital[]"
    name="x_AdviceToOtherHospital[]"
    value="<?= HtmlEncode($Page->AdviceToOtherHospital->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_AdviceToOtherHospital"
    data-target="dsl_x_AdviceToOtherHospital"
    data-repeatcolumn="5"
    class="form-control<?= $Page->AdviceToOtherHospital->isInvalidClass() ?>"
    data-table="view_ip_patient_admission"
    data-field="x_AdviceToOtherHospital"
    data-value-separator="<?= $Page->AdviceToOtherHospital->displayValueSeparatorAttribute() ?>"
    <?= $Page->AdviceToOtherHospital->editAttributes() ?>>
<?= $Page->AdviceToOtherHospital->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AdviceToOtherHospital->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reason->Visible) { // Reason ?>
    <div id="r_Reason" class="form-group row">
        <label id="elh_view_ip_patient_admission_Reason" for="x_Reason" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ip_patient_admission_Reason"><?= $Page->Reason->caption() ?><?= $Page->Reason->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reason->cellAttributes() ?>>
<template id="tpx_view_ip_patient_admission_Reason"><span id="el_view_ip_patient_admission_Reason">
<textarea data-table="view_ip_patient_admission" data-field="x_Reason" name="x_Reason" id="x_Reason" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Reason->getPlaceHolder()) ?>"<?= $Page->Reason->editAttributes() ?> aria-describedby="x_Reason_help"><?= $Page->Reason->EditValue ?></textarea>
<?= $Page->Reason->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reason->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_ip_patient_admissionedit" class="ew-custom-template"></div>
<template id="tpm_view_ip_patient_admissionedit">
<div id="ct_ViewIpPatientAdmissionEdit"><style>
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
	<span hidden class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_profilePic"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_profilePic"></slot></span>
	<span hidden class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_Consultant"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_Consultant"></slot></span>
<div class="row">
	<div class="col-12">
		<table style="width:100%">
			<tr>
				<td><slot class="ew-slot" name="tpc_view_ip_patient_admission_patient_id"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_patient_id"></slot></td>
				<td></td>
 			</tr>
 		</table>
	</div>
</div>
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
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_PatientID"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_PatientID"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_patient_name"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_patient_name"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_gender"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_age"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_age"></slot></span>
				  </div>
				   <div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_DOB"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_DOB"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_mobileno"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_mobileno"></slot></span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_mrnNo"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_mrnNo"></slot></span>
				  </div>
				 <div class="ew-row">
					<img id="patientPropic" src=""  height="100" width="100">
				  </div>
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_PartnerID"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_PartnerID"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_PartnerName"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_PartnerName"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_PartnerMobile"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_PartnerMobile"></slot></span>
				  </div>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
	  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_ReportHeader"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_ReportHeader"></slot></span>
	</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#C71585">
				<h3 class="card-title">Patient Admission Details</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_admission_date"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_admission_date"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_physician_id"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_physician_id"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_Anesthetist"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_Anesthetist"></slot></span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_release_date"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_release_date"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_Procedure"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_Procedure"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_Amound"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_Amound"></slot></span>
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
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_IDProof"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_IDProof"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_typeRegsisteration"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_typeRegsisteration"></slot></span>
				  </div>
				</div>
				<div class="col-6">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_PaymentCategory"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_PaymentCategory"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_PaymentStatus"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_PaymentStatus"></slot></span>
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
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_ReferedByDr"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_ReferedByDr"></slot></span>
				  </div>
				  <div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_ReferClinicname"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_ReferClinicname"></slot></span>
				  </div>
				</div>
				<div class="col-6">
				  <div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_ReferMobileNo"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_ReferMobileNo"></slot></span>
				  </div>
				<div hidden class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_ReferCity"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_ReferCity"></slot></span>
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
			<div class="card-header"  style="background-color:#03ABA2">
				<h3 class="card-title">Manual Bill Closing.</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-6">
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_BillClosing"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_BillClosing"></slot></span>
				  </div>
				  <div  class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_BillClosingDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_BillClosingDate"></slot></span>
				  </div>
				</div>
				<div class="col-6">
				  <div  class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_BillNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_BillNumber"></slot></span>
				  </div>
				<div  class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_ClosingAmount"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_ClosingAmount"></slot></span>
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
			<div class="card-header"  style="background-color:#7e0420">
				<h3 class="card-title">Clinical Summary.</h3>
			</div>
			<div class="card-body">
			  <div class="row">
				<div class="col-3">
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_AdviceToOtherHospital"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_AdviceToOtherHospital"></slot></span>
				  </div>
				</div>
				<div id="AdviceToOtherHospitalReason" class="col-9">
				  <div  class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ip_patient_admission_Reason"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ip_patient_admission_Reason"></slot></span>
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
    ew.applyTemplate("tpd_view_ip_patient_admissionedit", "tpm_view_ip_patient_admissionedit", "view_ip_patient_admissionedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("view_ip_patient_admission");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    document.getElementById("x_Amound").style.width="150px",document.getElementById("AdviceToOtherHospitalReason").style.display="none";
});
</script>

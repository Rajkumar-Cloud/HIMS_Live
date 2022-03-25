<?php

namespace PHPMaker2021\project3;

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
    var fields = ew.vars.tables.ip_admission.fields;
    fip_admissionedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["mrnNo", [fields.mrnNo.required ? ew.Validators.required(fields.mrnNo.caption) : null], fields.mrnNo.isInvalid],
        ["patient_id", [fields.patient_id.required ? ew.Validators.required(fields.patient_id.caption) : null, ew.Validators.integer], fields.patient_id.isInvalid],
        ["patient_name", [fields.patient_name.required ? ew.Validators.required(fields.patient_name.caption) : null], fields.patient_name.isInvalid],
        ["profilePic", [fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["gender", [fields.gender.required ? ew.Validators.required(fields.gender.caption) : null], fields.gender.isInvalid],
        ["age", [fields.age.required ? ew.Validators.required(fields.age.caption) : null], fields.age.isInvalid],
        ["physician_id", [fields.physician_id.required ? ew.Validators.required(fields.physician_id.caption) : null, ew.Validators.integer], fields.physician_id.isInvalid],
        ["typeRegsisteration", [fields.typeRegsisteration.required ? ew.Validators.required(fields.typeRegsisteration.caption) : null], fields.typeRegsisteration.isInvalid],
        ["PaymentCategory", [fields.PaymentCategory.required ? ew.Validators.required(fields.PaymentCategory.caption) : null], fields.PaymentCategory.isInvalid],
        ["admission_consultant_id", [fields.admission_consultant_id.required ? ew.Validators.required(fields.admission_consultant_id.caption) : null, ew.Validators.integer], fields.admission_consultant_id.isInvalid],
        ["leading_consultant_id", [fields.leading_consultant_id.required ? ew.Validators.required(fields.leading_consultant_id.caption) : null, ew.Validators.integer], fields.leading_consultant_id.isInvalid],
        ["cause", [fields.cause.required ? ew.Validators.required(fields.cause.caption) : null], fields.cause.isInvalid],
        ["admission_date", [fields.admission_date.required ? ew.Validators.required(fields.admission_date.caption) : null, ew.Validators.datetime(0)], fields.admission_date.isInvalid],
        ["release_date", [fields.release_date.required ? ew.Validators.required(fields.release_date.caption) : null, ew.Validators.datetime(0)], fields.release_date.isInvalid],
        ["PaymentStatus", [fields.PaymentStatus.required ? ew.Validators.required(fields.PaymentStatus.caption) : null, ew.Validators.integer], fields.PaymentStatus.isInvalid],
        ["status", [fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["PatientID", [fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["ReferedByDr", [fields.ReferedByDr.required ? ew.Validators.required(fields.ReferedByDr.caption) : null], fields.ReferedByDr.isInvalid],
        ["ReferClinicname", [fields.ReferClinicname.required ? ew.Validators.required(fields.ReferClinicname.caption) : null], fields.ReferClinicname.isInvalid],
        ["ReferCity", [fields.ReferCity.required ? ew.Validators.required(fields.ReferCity.caption) : null], fields.ReferCity.isInvalid],
        ["ReferMobileNo", [fields.ReferMobileNo.required ? ew.Validators.required(fields.ReferMobileNo.caption) : null], fields.ReferMobileNo.isInvalid],
        ["ReferA4TreatingConsultant", [fields.ReferA4TreatingConsultant.required ? ew.Validators.required(fields.ReferA4TreatingConsultant.caption) : null], fields.ReferA4TreatingConsultant.isInvalid],
        ["PurposreReferredfor", [fields.PurposreReferredfor.required ? ew.Validators.required(fields.PurposreReferredfor.caption) : null], fields.PurposreReferredfor.isInvalid],
        ["mobileno", [fields.mobileno.required ? ew.Validators.required(fields.mobileno.caption) : null], fields.mobileno.isInvalid],
        ["BillClosing", [fields.BillClosing.required ? ew.Validators.required(fields.BillClosing.caption) : null], fields.BillClosing.isInvalid],
        ["BillClosingDate", [fields.BillClosingDate.required ? ew.Validators.required(fields.BillClosingDate.caption) : null, ew.Validators.datetime(0)], fields.BillClosingDate.isInvalid],
        ["BillNumber", [fields.BillNumber.required ? ew.Validators.required(fields.BillNumber.caption) : null], fields.BillNumber.isInvalid],
        ["ClosingAmount", [fields.ClosingAmount.required ? ew.Validators.required(fields.ClosingAmount.caption) : null], fields.ClosingAmount.isInvalid],
        ["ClosingType", [fields.ClosingType.required ? ew.Validators.required(fields.ClosingType.caption) : null], fields.ClosingType.isInvalid],
        ["BillAmount", [fields.BillAmount.required ? ew.Validators.required(fields.BillAmount.caption) : null], fields.BillAmount.isInvalid],
        ["billclosedBy", [fields.billclosedBy.required ? ew.Validators.required(fields.billclosedBy.caption) : null], fields.billclosedBy.isInvalid],
        ["bllcloseByDate", [fields.bllcloseByDate.required ? ew.Validators.required(fields.bllcloseByDate.caption) : null, ew.Validators.datetime(0)], fields.bllcloseByDate.isInvalid],
        ["ReportHeader", [fields.ReportHeader.required ? ew.Validators.required(fields.ReportHeader.caption) : null], fields.ReportHeader.isInvalid],
        ["Procedure", [fields.Procedure.required ? ew.Validators.required(fields.Procedure.caption) : null], fields.Procedure.isInvalid],
        ["Consultant", [fields.Consultant.required ? ew.Validators.required(fields.Consultant.caption) : null], fields.Consultant.isInvalid],
        ["Anesthetist", [fields.Anesthetist.required ? ew.Validators.required(fields.Anesthetist.caption) : null], fields.Anesthetist.isInvalid],
        ["Amound", [fields.Amound.required ? ew.Validators.required(fields.Amound.caption) : null, ew.Validators.float], fields.Amound.isInvalid],
        ["Package", [fields.Package.required ? ew.Validators.required(fields.Package.caption) : null], fields.Package.isInvalid],
        ["PartnerID", [fields.PartnerID.required ? ew.Validators.required(fields.PartnerID.caption) : null], fields.PartnerID.isInvalid],
        ["PartnerName", [fields.PartnerName.required ? ew.Validators.required(fields.PartnerName.caption) : null], fields.PartnerName.isInvalid],
        ["PartnerMobile", [fields.PartnerMobile.required ? ew.Validators.required(fields.PartnerMobile.caption) : null], fields.PartnerMobile.isInvalid],
        ["Cid", [fields.Cid.required ? ew.Validators.required(fields.Cid.caption) : null, ew.Validators.integer], fields.Cid.isInvalid],
        ["PartId", [fields.PartId.required ? ew.Validators.required(fields.PartId.caption) : null, ew.Validators.integer], fields.PartId.isInvalid],
        ["IDProof", [fields.IDProof.required ? ew.Validators.required(fields.IDProof.caption) : null], fields.IDProof.isInvalid],
        ["AdviceToOtherHospital", [fields.AdviceToOtherHospital.required ? ew.Validators.required(fields.AdviceToOtherHospital.caption) : null], fields.AdviceToOtherHospital.isInvalid],
        ["Reason", [fields.Reason.required ? ew.Validators.required(fields.Reason.caption) : null], fields.Reason.isInvalid]
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
<form name="fip_admissionedit" id="fip_admissionedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ip_admission">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_ip_admission_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_ip_admission_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ip_admission" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
    <div id="r_mrnNo" class="form-group row">
        <label id="elh_ip_admission_mrnNo" for="x_mrnNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mrnNo->caption() ?><?= $Page->mrnNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnNo->cellAttributes() ?>>
<span id="el_ip_admission_mrnNo">
<input type="<?= $Page->mrnNo->getInputTextType() ?>" data-table="ip_admission" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnNo->getPlaceHolder()) ?>" value="<?= $Page->mrnNo->EditValue ?>"<?= $Page->mrnNo->editAttributes() ?> aria-describedby="x_mrnNo_help">
<?= $Page->mrnNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <div id="r_patient_id" class="form-group row">
        <label id="elh_ip_admission_patient_id" for="x_patient_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->patient_id->caption() ?><?= $Page->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_id->cellAttributes() ?>>
<span id="el_ip_admission_patient_id">
<input type="<?= $Page->patient_id->getInputTextType() ?>" data-table="ip_admission" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?= HtmlEncode($Page->patient_id->getPlaceHolder()) ?>" value="<?= $Page->patient_id->EditValue ?>"<?= $Page->patient_id->editAttributes() ?> aria-describedby="x_patient_id_help">
<?= $Page->patient_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->patient_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
    <div id="r_patient_name" class="form-group row">
        <label id="elh_ip_admission_patient_name" for="x_patient_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->patient_name->caption() ?><?= $Page->patient_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_name->cellAttributes() ?>>
<span id="el_ip_admission_patient_name">
<input type="<?= $Page->patient_name->getInputTextType() ?>" data-table="ip_admission" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patient_name->getPlaceHolder()) ?>" value="<?= $Page->patient_name->EditValue ?>"<?= $Page->patient_name->editAttributes() ?> aria-describedby="x_patient_name_help">
<?= $Page->patient_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->patient_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_ip_admission_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_ip_admission_profilePic">
<textarea data-table="ip_admission" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help"><?= $Page->profilePic->EditValue ?></textarea>
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <div id="r_gender" class="form-group row">
        <label id="elh_ip_admission_gender" for="x_gender" class="<?= $Page->LeftColumnClass ?>"><?= $Page->gender->caption() ?><?= $Page->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->gender->cellAttributes() ?>>
<span id="el_ip_admission_gender">
<input type="<?= $Page->gender->getInputTextType() ?>" data-table="ip_admission" data-field="x_gender" name="x_gender" id="x_gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->gender->getPlaceHolder()) ?>" value="<?= $Page->gender->EditValue ?>"<?= $Page->gender->editAttributes() ?> aria-describedby="x_gender_help">
<?= $Page->gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->gender->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
    <div id="r_age" class="form-group row">
        <label id="elh_ip_admission_age" for="x_age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->age->caption() ?><?= $Page->age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->age->cellAttributes() ?>>
<span id="el_ip_admission_age">
<input type="<?= $Page->age->getInputTextType() ?>" data-table="ip_admission" data-field="x_age" name="x_age" id="x_age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->age->getPlaceHolder()) ?>" value="<?= $Page->age->EditValue ?>"<?= $Page->age->editAttributes() ?> aria-describedby="x_age_help">
<?= $Page->age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
    <div id="r_physician_id" class="form-group row">
        <label id="elh_ip_admission_physician_id" for="x_physician_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->physician_id->caption() ?><?= $Page->physician_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->physician_id->cellAttributes() ?>>
<span id="el_ip_admission_physician_id">
<input type="<?= $Page->physician_id->getInputTextType() ?>" data-table="ip_admission" data-field="x_physician_id" name="x_physician_id" id="x_physician_id" size="30" placeholder="<?= HtmlEncode($Page->physician_id->getPlaceHolder()) ?>" value="<?= $Page->physician_id->EditValue ?>"<?= $Page->physician_id->editAttributes() ?> aria-describedby="x_physician_id_help">
<?= $Page->physician_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->physician_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
    <div id="r_typeRegsisteration" class="form-group row">
        <label id="elh_ip_admission_typeRegsisteration" for="x_typeRegsisteration" class="<?= $Page->LeftColumnClass ?>"><?= $Page->typeRegsisteration->caption() ?><?= $Page->typeRegsisteration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->typeRegsisteration->cellAttributes() ?>>
<span id="el_ip_admission_typeRegsisteration">
<input type="<?= $Page->typeRegsisteration->getInputTextType() ?>" data-table="ip_admission" data-field="x_typeRegsisteration" name="x_typeRegsisteration" id="x_typeRegsisteration" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->typeRegsisteration->getPlaceHolder()) ?>" value="<?= $Page->typeRegsisteration->EditValue ?>"<?= $Page->typeRegsisteration->editAttributes() ?> aria-describedby="x_typeRegsisteration_help">
<?= $Page->typeRegsisteration->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->typeRegsisteration->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
    <div id="r_PaymentCategory" class="form-group row">
        <label id="elh_ip_admission_PaymentCategory" for="x_PaymentCategory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PaymentCategory->caption() ?><?= $Page->PaymentCategory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaymentCategory->cellAttributes() ?>>
<span id="el_ip_admission_PaymentCategory">
<input type="<?= $Page->PaymentCategory->getInputTextType() ?>" data-table="ip_admission" data-field="x_PaymentCategory" name="x_PaymentCategory" id="x_PaymentCategory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaymentCategory->getPlaceHolder()) ?>" value="<?= $Page->PaymentCategory->EditValue ?>"<?= $Page->PaymentCategory->editAttributes() ?> aria-describedby="x_PaymentCategory_help">
<?= $Page->PaymentCategory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PaymentCategory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
    <div id="r_admission_consultant_id" class="form-group row">
        <label id="elh_ip_admission_admission_consultant_id" for="x_admission_consultant_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->admission_consultant_id->caption() ?><?= $Page->admission_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->admission_consultant_id->cellAttributes() ?>>
<span id="el_ip_admission_admission_consultant_id">
<input type="<?= $Page->admission_consultant_id->getInputTextType() ?>" data-table="ip_admission" data-field="x_admission_consultant_id" name="x_admission_consultant_id" id="x_admission_consultant_id" size="30" placeholder="<?= HtmlEncode($Page->admission_consultant_id->getPlaceHolder()) ?>" value="<?= $Page->admission_consultant_id->EditValue ?>"<?= $Page->admission_consultant_id->editAttributes() ?> aria-describedby="x_admission_consultant_id_help">
<?= $Page->admission_consultant_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->admission_consultant_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
    <div id="r_leading_consultant_id" class="form-group row">
        <label id="elh_ip_admission_leading_consultant_id" for="x_leading_consultant_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leading_consultant_id->caption() ?><?= $Page->leading_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leading_consultant_id->cellAttributes() ?>>
<span id="el_ip_admission_leading_consultant_id">
<input type="<?= $Page->leading_consultant_id->getInputTextType() ?>" data-table="ip_admission" data-field="x_leading_consultant_id" name="x_leading_consultant_id" id="x_leading_consultant_id" size="30" placeholder="<?= HtmlEncode($Page->leading_consultant_id->getPlaceHolder()) ?>" value="<?= $Page->leading_consultant_id->EditValue ?>"<?= $Page->leading_consultant_id->editAttributes() ?> aria-describedby="x_leading_consultant_id_help">
<?= $Page->leading_consultant_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leading_consultant_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->cause->Visible) { // cause ?>
    <div id="r_cause" class="form-group row">
        <label id="elh_ip_admission_cause" for="x_cause" class="<?= $Page->LeftColumnClass ?>"><?= $Page->cause->caption() ?><?= $Page->cause->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->cause->cellAttributes() ?>>
<span id="el_ip_admission_cause">
<textarea data-table="ip_admission" data-field="x_cause" name="x_cause" id="x_cause" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->cause->getPlaceHolder()) ?>"<?= $Page->cause->editAttributes() ?> aria-describedby="x_cause_help"><?= $Page->cause->EditValue ?></textarea>
<?= $Page->cause->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->cause->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
    <div id="r_admission_date" class="form-group row">
        <label id="elh_ip_admission_admission_date" for="x_admission_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->admission_date->caption() ?><?= $Page->admission_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->admission_date->cellAttributes() ?>>
<span id="el_ip_admission_admission_date">
<input type="<?= $Page->admission_date->getInputTextType() ?>" data-table="ip_admission" data-field="x_admission_date" name="x_admission_date" id="x_admission_date" placeholder="<?= HtmlEncode($Page->admission_date->getPlaceHolder()) ?>" value="<?= $Page->admission_date->EditValue ?>"<?= $Page->admission_date->editAttributes() ?> aria-describedby="x_admission_date_help">
<?= $Page->admission_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->admission_date->getErrorMessage() ?></div>
<?php if (!$Page->admission_date->ReadOnly && !$Page->admission_date->Disabled && !isset($Page->admission_date->EditAttrs["readonly"]) && !isset($Page->admission_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fip_admissionedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fip_admissionedit", "x_admission_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
    <div id="r_release_date" class="form-group row">
        <label id="elh_ip_admission_release_date" for="x_release_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->release_date->caption() ?><?= $Page->release_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->release_date->cellAttributes() ?>>
<span id="el_ip_admission_release_date">
<input type="<?= $Page->release_date->getInputTextType() ?>" data-table="ip_admission" data-field="x_release_date" name="x_release_date" id="x_release_date" placeholder="<?= HtmlEncode($Page->release_date->getPlaceHolder()) ?>" value="<?= $Page->release_date->EditValue ?>"<?= $Page->release_date->editAttributes() ?> aria-describedby="x_release_date_help">
<?= $Page->release_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->release_date->getErrorMessage() ?></div>
<?php if (!$Page->release_date->ReadOnly && !$Page->release_date->Disabled && !isset($Page->release_date->EditAttrs["readonly"]) && !isset($Page->release_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fip_admissionedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fip_admissionedit", "x_release_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
    <div id="r_PaymentStatus" class="form-group row">
        <label id="elh_ip_admission_PaymentStatus" for="x_PaymentStatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PaymentStatus->caption() ?><?= $Page->PaymentStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaymentStatus->cellAttributes() ?>>
<span id="el_ip_admission_PaymentStatus">
<input type="<?= $Page->PaymentStatus->getInputTextType() ?>" data-table="ip_admission" data-field="x_PaymentStatus" name="x_PaymentStatus" id="x_PaymentStatus" size="30" placeholder="<?= HtmlEncode($Page->PaymentStatus->getPlaceHolder()) ?>" value="<?= $Page->PaymentStatus->EditValue ?>"<?= $Page->PaymentStatus->editAttributes() ?> aria-describedby="x_PaymentStatus_help">
<?= $Page->PaymentStatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PaymentStatus->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_ip_admission_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_ip_admission_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="ip_admission" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_ip_admission_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_ip_admission_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="ip_admission" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_ip_admission_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_ip_admission_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="ip_admission" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fip_admissionedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fip_admissionedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_ip_admission_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_ip_admission_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="ip_admission" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_ip_admission_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_ip_admission_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="ip_admission" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fip_admissionedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fip_admissionedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_ip_admission_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<span id="el_ip_admission_PatientID">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="ip_admission" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?> aria-describedby="x_PatientID_help">
<?= $Page->PatientID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_ip_admission_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_ip_admission_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="ip_admission" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferedByDr->Visible) { // ReferedByDr ?>
    <div id="r_ReferedByDr" class="form-group row">
        <label id="elh_ip_admission_ReferedByDr" for="x_ReferedByDr" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReferedByDr->caption() ?><?= $Page->ReferedByDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferedByDr->cellAttributes() ?>>
<span id="el_ip_admission_ReferedByDr">
<input type="<?= $Page->ReferedByDr->getInputTextType() ?>" data-table="ip_admission" data-field="x_ReferedByDr" name="x_ReferedByDr" id="x_ReferedByDr" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferedByDr->getPlaceHolder()) ?>" value="<?= $Page->ReferedByDr->EditValue ?>"<?= $Page->ReferedByDr->editAttributes() ?> aria-describedby="x_ReferedByDr_help">
<?= $Page->ReferedByDr->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferedByDr->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferClinicname->Visible) { // ReferClinicname ?>
    <div id="r_ReferClinicname" class="form-group row">
        <label id="elh_ip_admission_ReferClinicname" for="x_ReferClinicname" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReferClinicname->caption() ?><?= $Page->ReferClinicname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferClinicname->cellAttributes() ?>>
<span id="el_ip_admission_ReferClinicname">
<input type="<?= $Page->ReferClinicname->getInputTextType() ?>" data-table="ip_admission" data-field="x_ReferClinicname" name="x_ReferClinicname" id="x_ReferClinicname" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferClinicname->getPlaceHolder()) ?>" value="<?= $Page->ReferClinicname->EditValue ?>"<?= $Page->ReferClinicname->editAttributes() ?> aria-describedby="x_ReferClinicname_help">
<?= $Page->ReferClinicname->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferClinicname->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferCity->Visible) { // ReferCity ?>
    <div id="r_ReferCity" class="form-group row">
        <label id="elh_ip_admission_ReferCity" for="x_ReferCity" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReferCity->caption() ?><?= $Page->ReferCity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferCity->cellAttributes() ?>>
<span id="el_ip_admission_ReferCity">
<input type="<?= $Page->ReferCity->getInputTextType() ?>" data-table="ip_admission" data-field="x_ReferCity" name="x_ReferCity" id="x_ReferCity" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferCity->getPlaceHolder()) ?>" value="<?= $Page->ReferCity->EditValue ?>"<?= $Page->ReferCity->editAttributes() ?> aria-describedby="x_ReferCity_help">
<?= $Page->ReferCity->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferCity->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferMobileNo->Visible) { // ReferMobileNo ?>
    <div id="r_ReferMobileNo" class="form-group row">
        <label id="elh_ip_admission_ReferMobileNo" for="x_ReferMobileNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReferMobileNo->caption() ?><?= $Page->ReferMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferMobileNo->cellAttributes() ?>>
<span id="el_ip_admission_ReferMobileNo">
<input type="<?= $Page->ReferMobileNo->getInputTextType() ?>" data-table="ip_admission" data-field="x_ReferMobileNo" name="x_ReferMobileNo" id="x_ReferMobileNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferMobileNo->getPlaceHolder()) ?>" value="<?= $Page->ReferMobileNo->EditValue ?>"<?= $Page->ReferMobileNo->editAttributes() ?> aria-describedby="x_ReferMobileNo_help">
<?= $Page->ReferMobileNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferMobileNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
    <div id="r_ReferA4TreatingConsultant" class="form-group row">
        <label id="elh_ip_admission_ReferA4TreatingConsultant" for="x_ReferA4TreatingConsultant" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReferA4TreatingConsultant->caption() ?><?= $Page->ReferA4TreatingConsultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el_ip_admission_ReferA4TreatingConsultant">
<input type="<?= $Page->ReferA4TreatingConsultant->getInputTextType() ?>" data-table="ip_admission" data-field="x_ReferA4TreatingConsultant" name="x_ReferA4TreatingConsultant" id="x_ReferA4TreatingConsultant" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferA4TreatingConsultant->getPlaceHolder()) ?>" value="<?= $Page->ReferA4TreatingConsultant->EditValue ?>"<?= $Page->ReferA4TreatingConsultant->editAttributes() ?> aria-describedby="x_ReferA4TreatingConsultant_help">
<?= $Page->ReferA4TreatingConsultant->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferA4TreatingConsultant->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
    <div id="r_PurposreReferredfor" class="form-group row">
        <label id="elh_ip_admission_PurposreReferredfor" for="x_PurposreReferredfor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PurposreReferredfor->caption() ?><?= $Page->PurposreReferredfor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurposreReferredfor->cellAttributes() ?>>
<span id="el_ip_admission_PurposreReferredfor">
<input type="<?= $Page->PurposreReferredfor->getInputTextType() ?>" data-table="ip_admission" data-field="x_PurposreReferredfor" name="x_PurposreReferredfor" id="x_PurposreReferredfor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PurposreReferredfor->getPlaceHolder()) ?>" value="<?= $Page->PurposreReferredfor->EditValue ?>"<?= $Page->PurposreReferredfor->editAttributes() ?> aria-describedby="x_PurposreReferredfor_help">
<?= $Page->PurposreReferredfor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PurposreReferredfor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mobileno->Visible) { // mobileno ?>
    <div id="r_mobileno" class="form-group row">
        <label id="elh_ip_admission_mobileno" for="x_mobileno" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mobileno->caption() ?><?= $Page->mobileno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mobileno->cellAttributes() ?>>
<span id="el_ip_admission_mobileno">
<input type="<?= $Page->mobileno->getInputTextType() ?>" data-table="ip_admission" data-field="x_mobileno" name="x_mobileno" id="x_mobileno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mobileno->getPlaceHolder()) ?>" value="<?= $Page->mobileno->EditValue ?>"<?= $Page->mobileno->editAttributes() ?> aria-describedby="x_mobileno_help">
<?= $Page->mobileno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mobileno->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillClosing->Visible) { // BillClosing ?>
    <div id="r_BillClosing" class="form-group row">
        <label id="elh_ip_admission_BillClosing" for="x_BillClosing" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BillClosing->caption() ?><?= $Page->BillClosing->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillClosing->cellAttributes() ?>>
<span id="el_ip_admission_BillClosing">
<input type="<?= $Page->BillClosing->getInputTextType() ?>" data-table="ip_admission" data-field="x_BillClosing" name="x_BillClosing" id="x_BillClosing" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillClosing->getPlaceHolder()) ?>" value="<?= $Page->BillClosing->EditValue ?>"<?= $Page->BillClosing->editAttributes() ?> aria-describedby="x_BillClosing_help">
<?= $Page->BillClosing->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillClosing->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillClosingDate->Visible) { // BillClosingDate ?>
    <div id="r_BillClosingDate" class="form-group row">
        <label id="elh_ip_admission_BillClosingDate" for="x_BillClosingDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BillClosingDate->caption() ?><?= $Page->BillClosingDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillClosingDate->cellAttributes() ?>>
<span id="el_ip_admission_BillClosingDate">
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
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <div id="r_BillNumber" class="form-group row">
        <label id="elh_ip_admission_BillNumber" for="x_BillNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BillNumber->caption() ?><?= $Page->BillNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillNumber->cellAttributes() ?>>
<span id="el_ip_admission_BillNumber">
<input type="<?= $Page->BillNumber->getInputTextType() ?>" data-table="ip_admission" data-field="x_BillNumber" name="x_BillNumber" id="x_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillNumber->getPlaceHolder()) ?>" value="<?= $Page->BillNumber->EditValue ?>"<?= $Page->BillNumber->editAttributes() ?> aria-describedby="x_BillNumber_help">
<?= $Page->BillNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ClosingAmount->Visible) { // ClosingAmount ?>
    <div id="r_ClosingAmount" class="form-group row">
        <label id="elh_ip_admission_ClosingAmount" for="x_ClosingAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ClosingAmount->caption() ?><?= $Page->ClosingAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ClosingAmount->cellAttributes() ?>>
<span id="el_ip_admission_ClosingAmount">
<input type="<?= $Page->ClosingAmount->getInputTextType() ?>" data-table="ip_admission" data-field="x_ClosingAmount" name="x_ClosingAmount" id="x_ClosingAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ClosingAmount->getPlaceHolder()) ?>" value="<?= $Page->ClosingAmount->EditValue ?>"<?= $Page->ClosingAmount->editAttributes() ?> aria-describedby="x_ClosingAmount_help">
<?= $Page->ClosingAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ClosingAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ClosingType->Visible) { // ClosingType ?>
    <div id="r_ClosingType" class="form-group row">
        <label id="elh_ip_admission_ClosingType" for="x_ClosingType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ClosingType->caption() ?><?= $Page->ClosingType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ClosingType->cellAttributes() ?>>
<span id="el_ip_admission_ClosingType">
<input type="<?= $Page->ClosingType->getInputTextType() ?>" data-table="ip_admission" data-field="x_ClosingType" name="x_ClosingType" id="x_ClosingType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ClosingType->getPlaceHolder()) ?>" value="<?= $Page->ClosingType->EditValue ?>"<?= $Page->ClosingType->editAttributes() ?> aria-describedby="x_ClosingType_help">
<?= $Page->ClosingType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ClosingType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillAmount->Visible) { // BillAmount ?>
    <div id="r_BillAmount" class="form-group row">
        <label id="elh_ip_admission_BillAmount" for="x_BillAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BillAmount->caption() ?><?= $Page->BillAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillAmount->cellAttributes() ?>>
<span id="el_ip_admission_BillAmount">
<input type="<?= $Page->BillAmount->getInputTextType() ?>" data-table="ip_admission" data-field="x_BillAmount" name="x_BillAmount" id="x_BillAmount" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BillAmount->getPlaceHolder()) ?>" value="<?= $Page->BillAmount->EditValue ?>"<?= $Page->BillAmount->editAttributes() ?> aria-describedby="x_BillAmount_help">
<?= $Page->BillAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->billclosedBy->Visible) { // billclosedBy ?>
    <div id="r_billclosedBy" class="form-group row">
        <label id="elh_ip_admission_billclosedBy" for="x_billclosedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->billclosedBy->caption() ?><?= $Page->billclosedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->billclosedBy->cellAttributes() ?>>
<span id="el_ip_admission_billclosedBy">
<input type="<?= $Page->billclosedBy->getInputTextType() ?>" data-table="ip_admission" data-field="x_billclosedBy" name="x_billclosedBy" id="x_billclosedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->billclosedBy->getPlaceHolder()) ?>" value="<?= $Page->billclosedBy->EditValue ?>"<?= $Page->billclosedBy->editAttributes() ?> aria-describedby="x_billclosedBy_help">
<?= $Page->billclosedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->billclosedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->bllcloseByDate->Visible) { // bllcloseByDate ?>
    <div id="r_bllcloseByDate" class="form-group row">
        <label id="elh_ip_admission_bllcloseByDate" for="x_bllcloseByDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->bllcloseByDate->caption() ?><?= $Page->bllcloseByDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->bllcloseByDate->cellAttributes() ?>>
<span id="el_ip_admission_bllcloseByDate">
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
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReportHeader->Visible) { // ReportHeader ?>
    <div id="r_ReportHeader" class="form-group row">
        <label id="elh_ip_admission_ReportHeader" for="x_ReportHeader" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReportHeader->caption() ?><?= $Page->ReportHeader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReportHeader->cellAttributes() ?>>
<span id="el_ip_admission_ReportHeader">
<input type="<?= $Page->ReportHeader->getInputTextType() ?>" data-table="ip_admission" data-field="x_ReportHeader" name="x_ReportHeader" id="x_ReportHeader" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReportHeader->getPlaceHolder()) ?>" value="<?= $Page->ReportHeader->EditValue ?>"<?= $Page->ReportHeader->editAttributes() ?> aria-describedby="x_ReportHeader_help">
<?= $Page->ReportHeader->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReportHeader->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
    <div id="r_Procedure" class="form-group row">
        <label id="elh_ip_admission_Procedure" for="x_Procedure" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Procedure->caption() ?><?= $Page->Procedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Procedure->cellAttributes() ?>>
<span id="el_ip_admission_Procedure">
<input type="<?= $Page->Procedure->getInputTextType() ?>" data-table="ip_admission" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Procedure->getPlaceHolder()) ?>" value="<?= $Page->Procedure->EditValue ?>"<?= $Page->Procedure->editAttributes() ?> aria-describedby="x_Procedure_help">
<?= $Page->Procedure->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Procedure->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <div id="r_Consultant" class="form-group row">
        <label id="elh_ip_admission_Consultant" for="x_Consultant" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Consultant->caption() ?><?= $Page->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Consultant->cellAttributes() ?>>
<span id="el_ip_admission_Consultant">
<input type="<?= $Page->Consultant->getInputTextType() ?>" data-table="ip_admission" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Consultant->getPlaceHolder()) ?>" value="<?= $Page->Consultant->EditValue ?>"<?= $Page->Consultant->editAttributes() ?> aria-describedby="x_Consultant_help">
<?= $Page->Consultant->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Consultant->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
    <div id="r_Anesthetist" class="form-group row">
        <label id="elh_ip_admission_Anesthetist" for="x_Anesthetist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Anesthetist->caption() ?><?= $Page->Anesthetist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Anesthetist->cellAttributes() ?>>
<span id="el_ip_admission_Anesthetist">
<input type="<?= $Page->Anesthetist->getInputTextType() ?>" data-table="ip_admission" data-field="x_Anesthetist" name="x_Anesthetist" id="x_Anesthetist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Anesthetist->getPlaceHolder()) ?>" value="<?= $Page->Anesthetist->EditValue ?>"<?= $Page->Anesthetist->editAttributes() ?> aria-describedby="x_Anesthetist_help">
<?= $Page->Anesthetist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Anesthetist->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amound->Visible) { // Amound ?>
    <div id="r_Amound" class="form-group row">
        <label id="elh_ip_admission_Amound" for="x_Amound" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Amound->caption() ?><?= $Page->Amound->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amound->cellAttributes() ?>>
<span id="el_ip_admission_Amound">
<input type="<?= $Page->Amound->getInputTextType() ?>" data-table="ip_admission" data-field="x_Amound" name="x_Amound" id="x_Amound" size="30" placeholder="<?= HtmlEncode($Page->Amound->getPlaceHolder()) ?>" value="<?= $Page->Amound->EditValue ?>"<?= $Page->Amound->editAttributes() ?> aria-describedby="x_Amound_help">
<?= $Page->Amound->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amound->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Package->Visible) { // Package ?>
    <div id="r_Package" class="form-group row">
        <label id="elh_ip_admission_Package" for="x_Package" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Package->caption() ?><?= $Page->Package->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Package->cellAttributes() ?>>
<span id="el_ip_admission_Package">
<input type="<?= $Page->Package->getInputTextType() ?>" data-table="ip_admission" data-field="x_Package" name="x_Package" id="x_Package" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Package->getPlaceHolder()) ?>" value="<?= $Page->Package->EditValue ?>"<?= $Page->Package->editAttributes() ?> aria-describedby="x_Package_help">
<?= $Page->Package->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Package->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <div id="r_PartnerID" class="form-group row">
        <label id="elh_ip_admission_PartnerID" for="x_PartnerID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PartnerID->caption() ?><?= $Page->PartnerID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el_ip_admission_PartnerID">
<input type="<?= $Page->PartnerID->getInputTextType() ?>" data-table="ip_admission" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerID->getPlaceHolder()) ?>" value="<?= $Page->PartnerID->EditValue ?>"<?= $Page->PartnerID->editAttributes() ?> aria-describedby="x_PartnerID_help">
<?= $Page->PartnerID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <div id="r_PartnerName" class="form-group row">
        <label id="elh_ip_admission_PartnerName" for="x_PartnerName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PartnerName->caption() ?><?= $Page->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el_ip_admission_PartnerName">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="ip_admission" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?> aria-describedby="x_PartnerName_help">
<?= $Page->PartnerName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
    <div id="r_PartnerMobile" class="form-group row">
        <label id="elh_ip_admission_PartnerMobile" for="x_PartnerMobile" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PartnerMobile->caption() ?><?= $Page->PartnerMobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerMobile->cellAttributes() ?>>
<span id="el_ip_admission_PartnerMobile">
<input type="<?= $Page->PartnerMobile->getInputTextType() ?>" data-table="ip_admission" data-field="x_PartnerMobile" name="x_PartnerMobile" id="x_PartnerMobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerMobile->getPlaceHolder()) ?>" value="<?= $Page->PartnerMobile->EditValue ?>"<?= $Page->PartnerMobile->editAttributes() ?> aria-describedby="x_PartnerMobile_help">
<?= $Page->PartnerMobile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerMobile->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Cid->Visible) { // Cid ?>
    <div id="r_Cid" class="form-group row">
        <label id="elh_ip_admission_Cid" for="x_Cid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Cid->caption() ?><?= $Page->Cid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Cid->cellAttributes() ?>>
<span id="el_ip_admission_Cid">
<input type="<?= $Page->Cid->getInputTextType() ?>" data-table="ip_admission" data-field="x_Cid" name="x_Cid" id="x_Cid" size="30" placeholder="<?= HtmlEncode($Page->Cid->getPlaceHolder()) ?>" value="<?= $Page->Cid->EditValue ?>"<?= $Page->Cid->editAttributes() ?> aria-describedby="x_Cid_help">
<?= $Page->Cid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Cid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartId->Visible) { // PartId ?>
    <div id="r_PartId" class="form-group row">
        <label id="elh_ip_admission_PartId" for="x_PartId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PartId->caption() ?><?= $Page->PartId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartId->cellAttributes() ?>>
<span id="el_ip_admission_PartId">
<input type="<?= $Page->PartId->getInputTextType() ?>" data-table="ip_admission" data-field="x_PartId" name="x_PartId" id="x_PartId" size="30" placeholder="<?= HtmlEncode($Page->PartId->getPlaceHolder()) ?>" value="<?= $Page->PartId->EditValue ?>"<?= $Page->PartId->editAttributes() ?> aria-describedby="x_PartId_help">
<?= $Page->PartId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IDProof->Visible) { // IDProof ?>
    <div id="r_IDProof" class="form-group row">
        <label id="elh_ip_admission_IDProof" for="x_IDProof" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IDProof->caption() ?><?= $Page->IDProof->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IDProof->cellAttributes() ?>>
<span id="el_ip_admission_IDProof">
<input type="<?= $Page->IDProof->getInputTextType() ?>" data-table="ip_admission" data-field="x_IDProof" name="x_IDProof" id="x_IDProof" size="30" maxlength="115" placeholder="<?= HtmlEncode($Page->IDProof->getPlaceHolder()) ?>" value="<?= $Page->IDProof->EditValue ?>"<?= $Page->IDProof->editAttributes() ?> aria-describedby="x_IDProof_help">
<?= $Page->IDProof->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IDProof->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
    <div id="r_AdviceToOtherHospital" class="form-group row">
        <label id="elh_ip_admission_AdviceToOtherHospital" for="x_AdviceToOtherHospital" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AdviceToOtherHospital->caption() ?><?= $Page->AdviceToOtherHospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AdviceToOtherHospital->cellAttributes() ?>>
<span id="el_ip_admission_AdviceToOtherHospital">
<input type="<?= $Page->AdviceToOtherHospital->getInputTextType() ?>" data-table="ip_admission" data-field="x_AdviceToOtherHospital" name="x_AdviceToOtherHospital" id="x_AdviceToOtherHospital" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AdviceToOtherHospital->getPlaceHolder()) ?>" value="<?= $Page->AdviceToOtherHospital->EditValue ?>"<?= $Page->AdviceToOtherHospital->editAttributes() ?> aria-describedby="x_AdviceToOtherHospital_help">
<?= $Page->AdviceToOtherHospital->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AdviceToOtherHospital->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reason->Visible) { // Reason ?>
    <div id="r_Reason" class="form-group row">
        <label id="elh_ip_admission_Reason" for="x_Reason" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Reason->caption() ?><?= $Page->Reason->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reason->cellAttributes() ?>>
<span id="el_ip_admission_Reason">
<textarea data-table="ip_admission" data-field="x_Reason" name="x_Reason" id="x_Reason" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Reason->getPlaceHolder()) ?>"<?= $Page->Reason->editAttributes() ?> aria-describedby="x_Reason_help"><?= $Page->Reason->EditValue ?></textarea>
<?= $Page->Reason->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reason->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("ip_admission");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

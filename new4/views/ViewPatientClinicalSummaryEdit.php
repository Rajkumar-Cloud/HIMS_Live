<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPatientClinicalSummaryEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_patient_clinical_summaryedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fview_patient_clinical_summaryedit = currentForm = new ew.Form("fview_patient_clinical_summaryedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_patient_clinical_summary")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_patient_clinical_summary)
        ew.vars.tables.view_patient_clinical_summary = currentTable;
    fview_patient_clinical_summaryedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null, ew.Validators.integer], fields.id.isInvalid],
        ["PatientID", [fields.PatientID.visible && fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["mrnNo", [fields.mrnNo.visible && fields.mrnNo.required ? ew.Validators.required(fields.mrnNo.caption) : null], fields.mrnNo.isInvalid],
        ["patient_id", [fields.patient_id.visible && fields.patient_id.required ? ew.Validators.required(fields.patient_id.caption) : null, ew.Validators.integer], fields.patient_id.isInvalid],
        ["patient_name", [fields.patient_name.visible && fields.patient_name.required ? ew.Validators.required(fields.patient_name.caption) : null], fields.patient_name.isInvalid],
        ["profilePic", [fields.profilePic.visible && fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["gender", [fields.gender.visible && fields.gender.required ? ew.Validators.required(fields.gender.caption) : null], fields.gender.isInvalid],
        ["age", [fields.age.visible && fields.age.required ? ew.Validators.required(fields.age.caption) : null], fields.age.isInvalid],
        ["physician_id", [fields.physician_id.visible && fields.physician_id.required ? ew.Validators.required(fields.physician_id.caption) : null, ew.Validators.integer], fields.physician_id.isInvalid],
        ["typeRegsisteration", [fields.typeRegsisteration.visible && fields.typeRegsisteration.required ? ew.Validators.required(fields.typeRegsisteration.caption) : null], fields.typeRegsisteration.isInvalid],
        ["PaymentCategory", [fields.PaymentCategory.visible && fields.PaymentCategory.required ? ew.Validators.required(fields.PaymentCategory.caption) : null], fields.PaymentCategory.isInvalid],
        ["admission_consultant_id", [fields.admission_consultant_id.visible && fields.admission_consultant_id.required ? ew.Validators.required(fields.admission_consultant_id.caption) : null, ew.Validators.integer], fields.admission_consultant_id.isInvalid],
        ["leading_consultant_id", [fields.leading_consultant_id.visible && fields.leading_consultant_id.required ? ew.Validators.required(fields.leading_consultant_id.caption) : null, ew.Validators.integer], fields.leading_consultant_id.isInvalid],
        ["cause", [fields.cause.visible && fields.cause.required ? ew.Validators.required(fields.cause.caption) : null], fields.cause.isInvalid],
        ["admission_date", [fields.admission_date.visible && fields.admission_date.required ? ew.Validators.required(fields.admission_date.caption) : null, ew.Validators.datetime(0)], fields.admission_date.isInvalid],
        ["release_date", [fields.release_date.visible && fields.release_date.required ? ew.Validators.required(fields.release_date.caption) : null, ew.Validators.datetime(0)], fields.release_date.isInvalid],
        ["PaymentStatus", [fields.PaymentStatus.visible && fields.PaymentStatus.required ? ew.Validators.required(fields.PaymentStatus.caption) : null, ew.Validators.integer], fields.PaymentStatus.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["provisional_diagnosis", [fields.provisional_diagnosis.visible && fields.provisional_diagnosis.required ? ew.Validators.required(fields.provisional_diagnosis.caption) : null], fields.provisional_diagnosis.isInvalid],
        ["Treatments", [fields.Treatments.visible && fields.Treatments.required ? ew.Validators.required(fields.Treatments.caption) : null], fields.Treatments.isInvalid],
        ["FinalDiagnosis", [fields.FinalDiagnosis.visible && fields.FinalDiagnosis.required ? ew.Validators.required(fields.FinalDiagnosis.caption) : null], fields.FinalDiagnosis.isInvalid],
        ["courseinhospital", [fields.courseinhospital.visible && fields.courseinhospital.required ? ew.Validators.required(fields.courseinhospital.caption) : null], fields.courseinhospital.isInvalid],
        ["procedurenotes", [fields.procedurenotes.visible && fields.procedurenotes.required ? ew.Validators.required(fields.procedurenotes.caption) : null], fields.procedurenotes.isInvalid],
        ["conditionatdischarge", [fields.conditionatdischarge.visible && fields.conditionatdischarge.required ? ew.Validators.required(fields.conditionatdischarge.caption) : null], fields.conditionatdischarge.isInvalid],
        ["BP", [fields.BP.visible && fields.BP.required ? ew.Validators.required(fields.BP.caption) : null], fields.BP.isInvalid],
        ["Pulse", [fields.Pulse.visible && fields.Pulse.required ? ew.Validators.required(fields.Pulse.caption) : null], fields.Pulse.isInvalid],
        ["Resp", [fields.Resp.visible && fields.Resp.required ? ew.Validators.required(fields.Resp.caption) : null], fields.Resp.isInvalid],
        ["SPO2", [fields.SPO2.visible && fields.SPO2.required ? ew.Validators.required(fields.SPO2.caption) : null], fields.SPO2.isInvalid],
        ["FollowupAdvice", [fields.FollowupAdvice.visible && fields.FollowupAdvice.required ? ew.Validators.required(fields.FollowupAdvice.caption) : null], fields.FollowupAdvice.isInvalid],
        ["NextReviewDate", [fields.NextReviewDate.visible && fields.NextReviewDate.required ? ew.Validators.required(fields.NextReviewDate.caption) : null, ew.Validators.datetime(0)], fields.NextReviewDate.isInvalid],
        ["History", [fields.History.visible && fields.History.required ? ew.Validators.required(fields.History.caption) : null], fields.History.isInvalid],
        ["vitals", [fields.vitals.visible && fields.vitals.required ? ew.Validators.required(fields.vitals.caption) : null], fields.vitals.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_patient_clinical_summaryedit,
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
    fview_patient_clinical_summaryedit.validate = function () {
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
    fview_patient_clinical_summaryedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_patient_clinical_summaryedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fview_patient_clinical_summaryedit");
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
<form name="fview_patient_clinical_summaryedit" id="fview_patient_clinical_summaryedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_patient_clinical_summary">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_view_patient_clinical_summary_id" for="x_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<input type="<?= $Page->id->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_id" name="x_id" id="x_id" size="30" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?> aria-describedby="x_id_help">
<?= $Page->id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage() ?></div>
<input type="hidden" data-table="view_patient_clinical_summary" data-field="x_id" data-hidden="1" name="o_id" id="o_id" value="<?= HtmlEncode($Page->id->OldValue ?? $Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_view_patient_clinical_summary_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_PatientID">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?> aria-describedby="x_PatientID_help">
<?= $Page->PatientID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_view_patient_clinical_summary_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
    <div id="r_mrnNo" class="form-group row">
        <label id="elh_view_patient_clinical_summary_mrnNo" for="x_mrnNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mrnNo->caption() ?><?= $Page->mrnNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnNo->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_mrnNo">
<input type="<?= $Page->mrnNo->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_mrnNo" name="x_mrnNo" id="x_mrnNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnNo->getPlaceHolder()) ?>" value="<?= $Page->mrnNo->EditValue ?>"<?= $Page->mrnNo->editAttributes() ?> aria-describedby="x_mrnNo_help">
<?= $Page->mrnNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <div id="r_patient_id" class="form-group row">
        <label id="elh_view_patient_clinical_summary_patient_id" for="x_patient_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->patient_id->caption() ?><?= $Page->patient_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_id->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_patient_id">
<input type="<?= $Page->patient_id->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_patient_id" name="x_patient_id" id="x_patient_id" size="30" placeholder="<?= HtmlEncode($Page->patient_id->getPlaceHolder()) ?>" value="<?= $Page->patient_id->EditValue ?>"<?= $Page->patient_id->editAttributes() ?> aria-describedby="x_patient_id_help">
<?= $Page->patient_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->patient_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
    <div id="r_patient_name" class="form-group row">
        <label id="elh_view_patient_clinical_summary_patient_name" for="x_patient_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->patient_name->caption() ?><?= $Page->patient_name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->patient_name->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_patient_name">
<input type="<?= $Page->patient_name->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patient_name->getPlaceHolder()) ?>" value="<?= $Page->patient_name->EditValue ?>"<?= $Page->patient_name->editAttributes() ?> aria-describedby="x_patient_name_help">
<?= $Page->patient_name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->patient_name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_view_patient_clinical_summary_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_profilePic">
<textarea data-table="view_patient_clinical_summary" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help"><?= $Page->profilePic->EditValue ?></textarea>
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
    <div id="r_gender" class="form-group row">
        <label id="elh_view_patient_clinical_summary_gender" for="x_gender" class="<?= $Page->LeftColumnClass ?>"><?= $Page->gender->caption() ?><?= $Page->gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->gender->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_gender">
<input type="<?= $Page->gender->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_gender" name="x_gender" id="x_gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->gender->getPlaceHolder()) ?>" value="<?= $Page->gender->EditValue ?>"<?= $Page->gender->editAttributes() ?> aria-describedby="x_gender_help">
<?= $Page->gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->gender->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->age->Visible) { // age ?>
    <div id="r_age" class="form-group row">
        <label id="elh_view_patient_clinical_summary_age" for="x_age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->age->caption() ?><?= $Page->age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->age->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_age">
<input type="<?= $Page->age->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_age" name="x_age" id="x_age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->age->getPlaceHolder()) ?>" value="<?= $Page->age->EditValue ?>"<?= $Page->age->editAttributes() ?> aria-describedby="x_age_help">
<?= $Page->age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
    <div id="r_physician_id" class="form-group row">
        <label id="elh_view_patient_clinical_summary_physician_id" for="x_physician_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->physician_id->caption() ?><?= $Page->physician_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->physician_id->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_physician_id">
<input type="<?= $Page->physician_id->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_physician_id" name="x_physician_id" id="x_physician_id" size="30" placeholder="<?= HtmlEncode($Page->physician_id->getPlaceHolder()) ?>" value="<?= $Page->physician_id->EditValue ?>"<?= $Page->physician_id->editAttributes() ?> aria-describedby="x_physician_id_help">
<?= $Page->physician_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->physician_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
    <div id="r_typeRegsisteration" class="form-group row">
        <label id="elh_view_patient_clinical_summary_typeRegsisteration" for="x_typeRegsisteration" class="<?= $Page->LeftColumnClass ?>"><?= $Page->typeRegsisteration->caption() ?><?= $Page->typeRegsisteration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->typeRegsisteration->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_typeRegsisteration">
<input type="<?= $Page->typeRegsisteration->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_typeRegsisteration" name="x_typeRegsisteration" id="x_typeRegsisteration" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->typeRegsisteration->getPlaceHolder()) ?>" value="<?= $Page->typeRegsisteration->EditValue ?>"<?= $Page->typeRegsisteration->editAttributes() ?> aria-describedby="x_typeRegsisteration_help">
<?= $Page->typeRegsisteration->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->typeRegsisteration->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaymentCategory->Visible) { // PaymentCategory ?>
    <div id="r_PaymentCategory" class="form-group row">
        <label id="elh_view_patient_clinical_summary_PaymentCategory" for="x_PaymentCategory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PaymentCategory->caption() ?><?= $Page->PaymentCategory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaymentCategory->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_PaymentCategory">
<input type="<?= $Page->PaymentCategory->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_PaymentCategory" name="x_PaymentCategory" id="x_PaymentCategory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaymentCategory->getPlaceHolder()) ?>" value="<?= $Page->PaymentCategory->EditValue ?>"<?= $Page->PaymentCategory->editAttributes() ?> aria-describedby="x_PaymentCategory_help">
<?= $Page->PaymentCategory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PaymentCategory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->admission_consultant_id->Visible) { // admission_consultant_id ?>
    <div id="r_admission_consultant_id" class="form-group row">
        <label id="elh_view_patient_clinical_summary_admission_consultant_id" for="x_admission_consultant_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->admission_consultant_id->caption() ?><?= $Page->admission_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->admission_consultant_id->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_admission_consultant_id">
<input type="<?= $Page->admission_consultant_id->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_admission_consultant_id" name="x_admission_consultant_id" id="x_admission_consultant_id" size="30" placeholder="<?= HtmlEncode($Page->admission_consultant_id->getPlaceHolder()) ?>" value="<?= $Page->admission_consultant_id->EditValue ?>"<?= $Page->admission_consultant_id->editAttributes() ?> aria-describedby="x_admission_consultant_id_help">
<?= $Page->admission_consultant_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->admission_consultant_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->leading_consultant_id->Visible) { // leading_consultant_id ?>
    <div id="r_leading_consultant_id" class="form-group row">
        <label id="elh_view_patient_clinical_summary_leading_consultant_id" for="x_leading_consultant_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leading_consultant_id->caption() ?><?= $Page->leading_consultant_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leading_consultant_id->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_leading_consultant_id">
<input type="<?= $Page->leading_consultant_id->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_leading_consultant_id" name="x_leading_consultant_id" id="x_leading_consultant_id" size="30" placeholder="<?= HtmlEncode($Page->leading_consultant_id->getPlaceHolder()) ?>" value="<?= $Page->leading_consultant_id->EditValue ?>"<?= $Page->leading_consultant_id->editAttributes() ?> aria-describedby="x_leading_consultant_id_help">
<?= $Page->leading_consultant_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leading_consultant_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->cause->Visible) { // cause ?>
    <div id="r_cause" class="form-group row">
        <label id="elh_view_patient_clinical_summary_cause" for="x_cause" class="<?= $Page->LeftColumnClass ?>"><?= $Page->cause->caption() ?><?= $Page->cause->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->cause->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_cause">
<textarea data-table="view_patient_clinical_summary" data-field="x_cause" name="x_cause" id="x_cause" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->cause->getPlaceHolder()) ?>"<?= $Page->cause->editAttributes() ?> aria-describedby="x_cause_help"><?= $Page->cause->EditValue ?></textarea>
<?= $Page->cause->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->cause->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->admission_date->Visible) { // admission_date ?>
    <div id="r_admission_date" class="form-group row">
        <label id="elh_view_patient_clinical_summary_admission_date" for="x_admission_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->admission_date->caption() ?><?= $Page->admission_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->admission_date->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_admission_date">
<input type="<?= $Page->admission_date->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_admission_date" name="x_admission_date" id="x_admission_date" placeholder="<?= HtmlEncode($Page->admission_date->getPlaceHolder()) ?>" value="<?= $Page->admission_date->EditValue ?>"<?= $Page->admission_date->editAttributes() ?> aria-describedby="x_admission_date_help">
<?= $Page->admission_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->admission_date->getErrorMessage() ?></div>
<?php if (!$Page->admission_date->ReadOnly && !$Page->admission_date->Disabled && !isset($Page->admission_date->EditAttrs["readonly"]) && !isset($Page->admission_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_clinical_summaryedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_patient_clinical_summaryedit", "x_admission_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->release_date->Visible) { // release_date ?>
    <div id="r_release_date" class="form-group row">
        <label id="elh_view_patient_clinical_summary_release_date" for="x_release_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->release_date->caption() ?><?= $Page->release_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->release_date->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_release_date">
<input type="<?= $Page->release_date->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_release_date" name="x_release_date" id="x_release_date" placeholder="<?= HtmlEncode($Page->release_date->getPlaceHolder()) ?>" value="<?= $Page->release_date->EditValue ?>"<?= $Page->release_date->editAttributes() ?> aria-describedby="x_release_date_help">
<?= $Page->release_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->release_date->getErrorMessage() ?></div>
<?php if (!$Page->release_date->ReadOnly && !$Page->release_date->Disabled && !isset($Page->release_date->EditAttrs["readonly"]) && !isset($Page->release_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_clinical_summaryedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_patient_clinical_summaryedit", "x_release_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
    <div id="r_PaymentStatus" class="form-group row">
        <label id="elh_view_patient_clinical_summary_PaymentStatus" for="x_PaymentStatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PaymentStatus->caption() ?><?= $Page->PaymentStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaymentStatus->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_PaymentStatus">
<input type="<?= $Page->PaymentStatus->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_PaymentStatus" name="x_PaymentStatus" id="x_PaymentStatus" size="30" placeholder="<?= HtmlEncode($Page->PaymentStatus->getPlaceHolder()) ?>" value="<?= $Page->PaymentStatus->EditValue ?>"<?= $Page->PaymentStatus->editAttributes() ?> aria-describedby="x_PaymentStatus_help">
<?= $Page->PaymentStatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PaymentStatus->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_view_patient_clinical_summary_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_view_patient_clinical_summary_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_view_patient_clinical_summary_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_clinical_summaryedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_patient_clinical_summaryedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_view_patient_clinical_summary_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_view_patient_clinical_summary_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_clinical_summaryedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_patient_clinical_summaryedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->provisional_diagnosis->Visible) { // provisional_diagnosis ?>
    <div id="r_provisional_diagnosis" class="form-group row">
        <label id="elh_view_patient_clinical_summary_provisional_diagnosis" for="x_provisional_diagnosis" class="<?= $Page->LeftColumnClass ?>"><?= $Page->provisional_diagnosis->caption() ?><?= $Page->provisional_diagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->provisional_diagnosis->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_provisional_diagnosis">
<textarea data-table="view_patient_clinical_summary" data-field="x_provisional_diagnosis" name="x_provisional_diagnosis" id="x_provisional_diagnosis" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->provisional_diagnosis->getPlaceHolder()) ?>"<?= $Page->provisional_diagnosis->editAttributes() ?> aria-describedby="x_provisional_diagnosis_help"><?= $Page->provisional_diagnosis->EditValue ?></textarea>
<?= $Page->provisional_diagnosis->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->provisional_diagnosis->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Treatments->Visible) { // Treatments ?>
    <div id="r_Treatments" class="form-group row">
        <label id="elh_view_patient_clinical_summary_Treatments" for="x_Treatments" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Treatments->caption() ?><?= $Page->Treatments->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Treatments->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_Treatments">
<textarea data-table="view_patient_clinical_summary" data-field="x_Treatments" name="x_Treatments" id="x_Treatments" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Treatments->getPlaceHolder()) ?>"<?= $Page->Treatments->editAttributes() ?> aria-describedby="x_Treatments_help"><?= $Page->Treatments->EditValue ?></textarea>
<?= $Page->Treatments->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Treatments->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FinalDiagnosis->Visible) { // FinalDiagnosis ?>
    <div id="r_FinalDiagnosis" class="form-group row">
        <label id="elh_view_patient_clinical_summary_FinalDiagnosis" for="x_FinalDiagnosis" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FinalDiagnosis->caption() ?><?= $Page->FinalDiagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FinalDiagnosis->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_FinalDiagnosis">
<textarea data-table="view_patient_clinical_summary" data-field="x_FinalDiagnosis" name="x_FinalDiagnosis" id="x_FinalDiagnosis" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->FinalDiagnosis->getPlaceHolder()) ?>"<?= $Page->FinalDiagnosis->editAttributes() ?> aria-describedby="x_FinalDiagnosis_help"><?= $Page->FinalDiagnosis->EditValue ?></textarea>
<?= $Page->FinalDiagnosis->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FinalDiagnosis->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->courseinhospital->Visible) { // courseinhospital ?>
    <div id="r_courseinhospital" class="form-group row">
        <label id="elh_view_patient_clinical_summary_courseinhospital" for="x_courseinhospital" class="<?= $Page->LeftColumnClass ?>"><?= $Page->courseinhospital->caption() ?><?= $Page->courseinhospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->courseinhospital->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_courseinhospital">
<textarea data-table="view_patient_clinical_summary" data-field="x_courseinhospital" name="x_courseinhospital" id="x_courseinhospital" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->courseinhospital->getPlaceHolder()) ?>"<?= $Page->courseinhospital->editAttributes() ?> aria-describedby="x_courseinhospital_help"><?= $Page->courseinhospital->EditValue ?></textarea>
<?= $Page->courseinhospital->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->courseinhospital->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->procedurenotes->Visible) { // procedurenotes ?>
    <div id="r_procedurenotes" class="form-group row">
        <label id="elh_view_patient_clinical_summary_procedurenotes" for="x_procedurenotes" class="<?= $Page->LeftColumnClass ?>"><?= $Page->procedurenotes->caption() ?><?= $Page->procedurenotes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->procedurenotes->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_procedurenotes">
<textarea data-table="view_patient_clinical_summary" data-field="x_procedurenotes" name="x_procedurenotes" id="x_procedurenotes" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->procedurenotes->getPlaceHolder()) ?>"<?= $Page->procedurenotes->editAttributes() ?> aria-describedby="x_procedurenotes_help"><?= $Page->procedurenotes->EditValue ?></textarea>
<?= $Page->procedurenotes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->procedurenotes->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->conditionatdischarge->Visible) { // conditionatdischarge ?>
    <div id="r_conditionatdischarge" class="form-group row">
        <label id="elh_view_patient_clinical_summary_conditionatdischarge" for="x_conditionatdischarge" class="<?= $Page->LeftColumnClass ?>"><?= $Page->conditionatdischarge->caption() ?><?= $Page->conditionatdischarge->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->conditionatdischarge->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_conditionatdischarge">
<textarea data-table="view_patient_clinical_summary" data-field="x_conditionatdischarge" name="x_conditionatdischarge" id="x_conditionatdischarge" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->conditionatdischarge->getPlaceHolder()) ?>"<?= $Page->conditionatdischarge->editAttributes() ?> aria-describedby="x_conditionatdischarge_help"><?= $Page->conditionatdischarge->EditValue ?></textarea>
<?= $Page->conditionatdischarge->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->conditionatdischarge->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
    <div id="r_BP" class="form-group row">
        <label id="elh_view_patient_clinical_summary_BP" for="x_BP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BP->caption() ?><?= $Page->BP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BP->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_BP">
<input type="<?= $Page->BP->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_BP" name="x_BP" id="x_BP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BP->getPlaceHolder()) ?>" value="<?= $Page->BP->EditValue ?>"<?= $Page->BP->editAttributes() ?> aria-describedby="x_BP_help">
<?= $Page->BP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
    <div id="r_Pulse" class="form-group row">
        <label id="elh_view_patient_clinical_summary_Pulse" for="x_Pulse" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Pulse->caption() ?><?= $Page->Pulse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pulse->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_Pulse">
<input type="<?= $Page->Pulse->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_Pulse" name="x_Pulse" id="x_Pulse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pulse->getPlaceHolder()) ?>" value="<?= $Page->Pulse->EditValue ?>"<?= $Page->Pulse->editAttributes() ?> aria-describedby="x_Pulse_help">
<?= $Page->Pulse->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pulse->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Resp->Visible) { // Resp ?>
    <div id="r_Resp" class="form-group row">
        <label id="elh_view_patient_clinical_summary_Resp" for="x_Resp" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Resp->caption() ?><?= $Page->Resp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Resp->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_Resp">
<input type="<?= $Page->Resp->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_Resp" name="x_Resp" id="x_Resp" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Resp->getPlaceHolder()) ?>" value="<?= $Page->Resp->EditValue ?>"<?= $Page->Resp->editAttributes() ?> aria-describedby="x_Resp_help">
<?= $Page->Resp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Resp->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SPO2->Visible) { // SPO2 ?>
    <div id="r_SPO2" class="form-group row">
        <label id="elh_view_patient_clinical_summary_SPO2" for="x_SPO2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SPO2->caption() ?><?= $Page->SPO2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SPO2->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_SPO2">
<input type="<?= $Page->SPO2->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_SPO2" name="x_SPO2" id="x_SPO2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SPO2->getPlaceHolder()) ?>" value="<?= $Page->SPO2->EditValue ?>"<?= $Page->SPO2->editAttributes() ?> aria-describedby="x_SPO2_help">
<?= $Page->SPO2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SPO2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FollowupAdvice->Visible) { // FollowupAdvice ?>
    <div id="r_FollowupAdvice" class="form-group row">
        <label id="elh_view_patient_clinical_summary_FollowupAdvice" for="x_FollowupAdvice" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FollowupAdvice->caption() ?><?= $Page->FollowupAdvice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FollowupAdvice->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_FollowupAdvice">
<textarea data-table="view_patient_clinical_summary" data-field="x_FollowupAdvice" name="x_FollowupAdvice" id="x_FollowupAdvice" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->FollowupAdvice->getPlaceHolder()) ?>"<?= $Page->FollowupAdvice->editAttributes() ?> aria-describedby="x_FollowupAdvice_help"><?= $Page->FollowupAdvice->EditValue ?></textarea>
<?= $Page->FollowupAdvice->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FollowupAdvice->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
    <div id="r_NextReviewDate" class="form-group row">
        <label id="elh_view_patient_clinical_summary_NextReviewDate" for="x_NextReviewDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NextReviewDate->caption() ?><?= $Page->NextReviewDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NextReviewDate->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_NextReviewDate">
<input type="<?= $Page->NextReviewDate->getInputTextType() ?>" data-table="view_patient_clinical_summary" data-field="x_NextReviewDate" name="x_NextReviewDate" id="x_NextReviewDate" placeholder="<?= HtmlEncode($Page->NextReviewDate->getPlaceHolder()) ?>" value="<?= $Page->NextReviewDate->EditValue ?>"<?= $Page->NextReviewDate->editAttributes() ?> aria-describedby="x_NextReviewDate_help">
<?= $Page->NextReviewDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NextReviewDate->getErrorMessage() ?></div>
<?php if (!$Page->NextReviewDate->ReadOnly && !$Page->NextReviewDate->Disabled && !isset($Page->NextReviewDate->EditAttrs["readonly"]) && !isset($Page->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_patient_clinical_summaryedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_patient_clinical_summaryedit", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->History->Visible) { // History ?>
    <div id="r_History" class="form-group row">
        <label id="elh_view_patient_clinical_summary_History" for="x_History" class="<?= $Page->LeftColumnClass ?>"><?= $Page->History->caption() ?><?= $Page->History->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->History->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_History">
<textarea data-table="view_patient_clinical_summary" data-field="x_History" name="x_History" id="x_History" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->History->getPlaceHolder()) ?>"<?= $Page->History->editAttributes() ?> aria-describedby="x_History_help"><?= $Page->History->EditValue ?></textarea>
<?= $Page->History->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->History->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->vitals->Visible) { // vitals ?>
    <div id="r_vitals" class="form-group row">
        <label id="elh_view_patient_clinical_summary_vitals" for="x_vitals" class="<?= $Page->LeftColumnClass ?>"><?= $Page->vitals->caption() ?><?= $Page->vitals->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->vitals->cellAttributes() ?>>
<span id="el_view_patient_clinical_summary_vitals">
<textarea data-table="view_patient_clinical_summary" data-field="x_vitals" name="x_vitals" id="x_vitals" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->vitals->getPlaceHolder()) ?>"<?= $Page->vitals->editAttributes() ?> aria-describedby="x_vitals_help"><?= $Page->vitals->EditValue ?></textarea>
<?= $Page->vitals->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->vitals->getErrorMessage() ?></div>
</span>
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
    ew.addEventHandlers("view_patient_clinical_summary");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

<?php

namespace PHPMaker2021\project3;

// Page object
$PatientOpdFollowUpAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_opd_follow_upadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpatient_opd_follow_upadd = currentForm = new ew.Form("fpatient_opd_follow_upadd", "add");

    // Add fields
    var fields = ew.vars.tables.patient_opd_follow_up.fields;
    fpatient_opd_follow_upadd.addFields([
        ["Reception", [fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null, ew.Validators.integer], fields.PatientId.isInvalid],
        ["mrnno", [fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["PatientName", [fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Telephone", [fields.Telephone.required ? ew.Validators.required(fields.Telephone.caption) : null], fields.Telephone.isInvalid],
        ["Age", [fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["profilePic", [fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["procedurenotes", [fields.procedurenotes.required ? ew.Validators.required(fields.procedurenotes.caption) : null], fields.procedurenotes.isInvalid],
        ["NextReviewDate", [fields.NextReviewDate.required ? ew.Validators.required(fields.NextReviewDate.caption) : null, ew.Validators.datetime(0)], fields.NextReviewDate.isInvalid],
        ["ICSIAdvised", [fields.ICSIAdvised.required ? ew.Validators.required(fields.ICSIAdvised.caption) : null], fields.ICSIAdvised.isInvalid],
        ["DeliveryRegistered", [fields.DeliveryRegistered.required ? ew.Validators.required(fields.DeliveryRegistered.caption) : null], fields.DeliveryRegistered.isInvalid],
        ["EDD", [fields.EDD.required ? ew.Validators.required(fields.EDD.caption) : null, ew.Validators.datetime(0)], fields.EDD.isInvalid],
        ["SerologyPositive", [fields.SerologyPositive.required ? ew.Validators.required(fields.SerologyPositive.caption) : null], fields.SerologyPositive.isInvalid],
        ["Allergy", [fields.Allergy.required ? ew.Validators.required(fields.Allergy.caption) : null], fields.Allergy.isInvalid],
        ["status", [fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["LMP", [fields.LMP.required ? ew.Validators.required(fields.LMP.caption) : null, ew.Validators.datetime(0)], fields.LMP.isInvalid],
        ["Procedure", [fields.Procedure.required ? ew.Validators.required(fields.Procedure.caption) : null], fields.Procedure.isInvalid],
        ["ProcedureDateTime", [fields.ProcedureDateTime.required ? ew.Validators.required(fields.ProcedureDateTime.caption) : null, ew.Validators.datetime(0)], fields.ProcedureDateTime.isInvalid],
        ["ICSIDate", [fields.ICSIDate.required ? ew.Validators.required(fields.ICSIDate.caption) : null, ew.Validators.datetime(0)], fields.ICSIDate.isInvalid],
        ["PatID", [fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["MobileNumber", [fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["createdUserName", [fields.createdUserName.required ? ew.Validators.required(fields.createdUserName.caption) : null], fields.createdUserName.isInvalid],
        ["reportheader", [fields.reportheader.required ? ew.Validators.required(fields.reportheader.caption) : null], fields.reportheader.isInvalid],
        ["PatientSearch", [fields.PatientSearch.required ? ew.Validators.required(fields.PatientSearch.caption) : null], fields.PatientSearch.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_opd_follow_upadd,
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
    fpatient_opd_follow_upadd.validate = function () {
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
    fpatient_opd_follow_upadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_opd_follow_upadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpatient_opd_follow_upadd");
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
<form name="fpatient_opd_follow_upadd" id="fpatient_opd_follow_upadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_opd_follow_up">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_patient_opd_follow_up_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_patient_opd_follow_up_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_patient_opd_follow_up_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_patient_opd_follow_up_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Telephone->Visible) { // Telephone ?>
    <div id="r_Telephone" class="form-group row">
        <label id="elh_patient_opd_follow_up_Telephone" for="x_Telephone" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Telephone->caption() ?><?= $Page->Telephone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Telephone->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_Telephone">
<input type="<?= $Page->Telephone->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_Telephone" name="x_Telephone" id="x_Telephone" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Telephone->getPlaceHolder()) ?>" value="<?= $Page->Telephone->EditValue ?>"<?= $Page->Telephone->editAttributes() ?> aria-describedby="x_Telephone_help">
<?= $Page->Telephone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Telephone->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_patient_opd_follow_up_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_patient_opd_follow_up_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_patient_opd_follow_up_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_profilePic">
<textarea data-table="patient_opd_follow_up" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help"><?= $Page->profilePic->EditValue ?></textarea>
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->procedurenotes->Visible) { // procedurenotes ?>
    <div id="r_procedurenotes" class="form-group row">
        <label id="elh_patient_opd_follow_up_procedurenotes" for="x_procedurenotes" class="<?= $Page->LeftColumnClass ?>"><?= $Page->procedurenotes->caption() ?><?= $Page->procedurenotes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->procedurenotes->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_procedurenotes">
<textarea data-table="patient_opd_follow_up" data-field="x_procedurenotes" name="x_procedurenotes" id="x_procedurenotes" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->procedurenotes->getPlaceHolder()) ?>"<?= $Page->procedurenotes->editAttributes() ?> aria-describedby="x_procedurenotes_help"><?= $Page->procedurenotes->EditValue ?></textarea>
<?= $Page->procedurenotes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->procedurenotes->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
    <div id="r_NextReviewDate" class="form-group row">
        <label id="elh_patient_opd_follow_up_NextReviewDate" for="x_NextReviewDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NextReviewDate->caption() ?><?= $Page->NextReviewDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NextReviewDate->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_NextReviewDate">
<input type="<?= $Page->NextReviewDate->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_NextReviewDate" name="x_NextReviewDate" id="x_NextReviewDate" placeholder="<?= HtmlEncode($Page->NextReviewDate->getPlaceHolder()) ?>" value="<?= $Page->NextReviewDate->EditValue ?>"<?= $Page->NextReviewDate->editAttributes() ?> aria-describedby="x_NextReviewDate_help">
<?= $Page->NextReviewDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NextReviewDate->getErrorMessage() ?></div>
<?php if (!$Page->NextReviewDate->ReadOnly && !$Page->NextReviewDate->Disabled && !isset($Page->NextReviewDate->EditAttrs["readonly"]) && !isset($Page->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upadd", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ICSIAdvised->Visible) { // ICSIAdvised ?>
    <div id="r_ICSIAdvised" class="form-group row">
        <label id="elh_patient_opd_follow_up_ICSIAdvised" for="x_ICSIAdvised" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ICSIAdvised->caption() ?><?= $Page->ICSIAdvised->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ICSIAdvised->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_ICSIAdvised">
<input type="<?= $Page->ICSIAdvised->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_ICSIAdvised" name="x_ICSIAdvised" id="x_ICSIAdvised" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ICSIAdvised->getPlaceHolder()) ?>" value="<?= $Page->ICSIAdvised->EditValue ?>"<?= $Page->ICSIAdvised->editAttributes() ?> aria-describedby="x_ICSIAdvised_help">
<?= $Page->ICSIAdvised->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ICSIAdvised->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
    <div id="r_DeliveryRegistered" class="form-group row">
        <label id="elh_patient_opd_follow_up_DeliveryRegistered" for="x_DeliveryRegistered" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DeliveryRegistered->caption() ?><?= $Page->DeliveryRegistered->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeliveryRegistered->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_DeliveryRegistered">
<input type="<?= $Page->DeliveryRegistered->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_DeliveryRegistered" name="x_DeliveryRegistered" id="x_DeliveryRegistered" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DeliveryRegistered->getPlaceHolder()) ?>" value="<?= $Page->DeliveryRegistered->EditValue ?>"<?= $Page->DeliveryRegistered->editAttributes() ?> aria-describedby="x_DeliveryRegistered_help">
<?= $Page->DeliveryRegistered->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DeliveryRegistered->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EDD->Visible) { // EDD ?>
    <div id="r_EDD" class="form-group row">
        <label id="elh_patient_opd_follow_up_EDD" for="x_EDD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EDD->caption() ?><?= $Page->EDD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EDD->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_EDD">
<input type="<?= $Page->EDD->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_EDD" name="x_EDD" id="x_EDD" placeholder="<?= HtmlEncode($Page->EDD->getPlaceHolder()) ?>" value="<?= $Page->EDD->EditValue ?>"<?= $Page->EDD->editAttributes() ?> aria-describedby="x_EDD_help">
<?= $Page->EDD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EDD->getErrorMessage() ?></div>
<?php if (!$Page->EDD->ReadOnly && !$Page->EDD->Disabled && !isset($Page->EDD->EditAttrs["readonly"]) && !isset($Page->EDD->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upadd", "x_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SerologyPositive->Visible) { // SerologyPositive ?>
    <div id="r_SerologyPositive" class="form-group row">
        <label id="elh_patient_opd_follow_up_SerologyPositive" for="x_SerologyPositive" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SerologyPositive->caption() ?><?= $Page->SerologyPositive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SerologyPositive->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_SerologyPositive">
<input type="<?= $Page->SerologyPositive->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_SerologyPositive" name="x_SerologyPositive" id="x_SerologyPositive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SerologyPositive->getPlaceHolder()) ?>" value="<?= $Page->SerologyPositive->EditValue ?>"<?= $Page->SerologyPositive->editAttributes() ?> aria-describedby="x_SerologyPositive_help">
<?= $Page->SerologyPositive->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SerologyPositive->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Allergy->Visible) { // Allergy ?>
    <div id="r_Allergy" class="form-group row">
        <label id="elh_patient_opd_follow_up_Allergy" for="x_Allergy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Allergy->caption() ?><?= $Page->Allergy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Allergy->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_Allergy">
<input type="<?= $Page->Allergy->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_Allergy" name="x_Allergy" id="x_Allergy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Allergy->getPlaceHolder()) ?>" value="<?= $Page->Allergy->EditValue ?>"<?= $Page->Allergy->editAttributes() ?> aria-describedby="x_Allergy_help">
<?= $Page->Allergy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Allergy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_patient_opd_follow_up_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_patient_opd_follow_up_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_patient_opd_follow_up_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_patient_opd_follow_up_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_patient_opd_follow_up_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
    <div id="r_LMP" class="form-group row">
        <label id="elh_patient_opd_follow_up_LMP" for="x_LMP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LMP->caption() ?><?= $Page->LMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LMP->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_LMP">
<input type="<?= $Page->LMP->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_LMP" name="x_LMP" id="x_LMP" placeholder="<?= HtmlEncode($Page->LMP->getPlaceHolder()) ?>" value="<?= $Page->LMP->EditValue ?>"<?= $Page->LMP->editAttributes() ?> aria-describedby="x_LMP_help">
<?= $Page->LMP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LMP->getErrorMessage() ?></div>
<?php if (!$Page->LMP->ReadOnly && !$Page->LMP->Disabled && !isset($Page->LMP->EditAttrs["readonly"]) && !isset($Page->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upadd", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
    <div id="r_Procedure" class="form-group row">
        <label id="elh_patient_opd_follow_up_Procedure" for="x_Procedure" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Procedure->caption() ?><?= $Page->Procedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Procedure->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_Procedure">
<textarea data-table="patient_opd_follow_up" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Procedure->getPlaceHolder()) ?>"<?= $Page->Procedure->editAttributes() ?> aria-describedby="x_Procedure_help"><?= $Page->Procedure->EditValue ?></textarea>
<?= $Page->Procedure->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Procedure->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
    <div id="r_ProcedureDateTime" class="form-group row">
        <label id="elh_patient_opd_follow_up_ProcedureDateTime" for="x_ProcedureDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProcedureDateTime->caption() ?><?= $Page->ProcedureDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureDateTime->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_ProcedureDateTime">
<input type="<?= $Page->ProcedureDateTime->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_ProcedureDateTime" name="x_ProcedureDateTime" id="x_ProcedureDateTime" placeholder="<?= HtmlEncode($Page->ProcedureDateTime->getPlaceHolder()) ?>" value="<?= $Page->ProcedureDateTime->EditValue ?>"<?= $Page->ProcedureDateTime->editAttributes() ?> aria-describedby="x_ProcedureDateTime_help">
<?= $Page->ProcedureDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProcedureDateTime->getErrorMessage() ?></div>
<?php if (!$Page->ProcedureDateTime->ReadOnly && !$Page->ProcedureDateTime->Disabled && !isset($Page->ProcedureDateTime->EditAttrs["readonly"]) && !isset($Page->ProcedureDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upadd", "x_ProcedureDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ICSIDate->Visible) { // ICSIDate ?>
    <div id="r_ICSIDate" class="form-group row">
        <label id="elh_patient_opd_follow_up_ICSIDate" for="x_ICSIDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ICSIDate->caption() ?><?= $Page->ICSIDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ICSIDate->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_ICSIDate">
<input type="<?= $Page->ICSIDate->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_ICSIDate" name="x_ICSIDate" id="x_ICSIDate" placeholder="<?= HtmlEncode($Page->ICSIDate->getPlaceHolder()) ?>" value="<?= $Page->ICSIDate->EditValue ?>"<?= $Page->ICSIDate->editAttributes() ?> aria-describedby="x_ICSIDate_help">
<?= $Page->ICSIDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ICSIDate->getErrorMessage() ?></div>
<?php if (!$Page->ICSIDate->ReadOnly && !$Page->ICSIDate->Disabled && !isset($Page->ICSIDate->EditAttrs["readonly"]) && !isset($Page->ICSIDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upadd", "x_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_patient_opd_follow_up_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_PatID">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?> aria-describedby="x_PatID_help">
<?= $Page->PatID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label id="elh_patient_opd_follow_up_MobileNumber" for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MobileNumber->caption() ?><?= $Page->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_MobileNumber">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?> aria-describedby="x_MobileNumber_help">
<?= $Page->MobileNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_patient_opd_follow_up_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdUserName->Visible) { // createdUserName ?>
    <div id="r_createdUserName" class="form-group row">
        <label id="elh_patient_opd_follow_up_createdUserName" for="x_createdUserName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdUserName->caption() ?><?= $Page->createdUserName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdUserName->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_createdUserName">
<input type="<?= $Page->createdUserName->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_createdUserName" name="x_createdUserName" id="x_createdUserName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdUserName->getPlaceHolder()) ?>" value="<?= $Page->createdUserName->EditValue ?>"<?= $Page->createdUserName->editAttributes() ?> aria-describedby="x_createdUserName_help">
<?= $Page->createdUserName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdUserName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->reportheader->Visible) { // reportheader ?>
    <div id="r_reportheader" class="form-group row">
        <label id="elh_patient_opd_follow_up_reportheader" for="x_reportheader" class="<?= $Page->LeftColumnClass ?>"><?= $Page->reportheader->caption() ?><?= $Page->reportheader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->reportheader->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_reportheader">
<input type="<?= $Page->reportheader->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_reportheader" name="x_reportheader" id="x_reportheader" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->reportheader->getPlaceHolder()) ?>" value="<?= $Page->reportheader->EditValue ?>"<?= $Page->reportheader->editAttributes() ?> aria-describedby="x_reportheader_help">
<?= $Page->reportheader->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->reportheader->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientSearch->Visible) { // PatientSearch ?>
    <div id="r_PatientSearch" class="form-group row">
        <label id="elh_patient_opd_follow_up_PatientSearch" for="x_PatientSearch" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientSearch->caption() ?><?= $Page->PatientSearch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientSearch->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_PatientSearch">
<input type="<?= $Page->PatientSearch->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_PatientSearch" name="x_PatientSearch" id="x_PatientSearch" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientSearch->getPlaceHolder()) ?>" value="<?= $Page->PatientSearch->EditValue ?>"<?= $Page->PatientSearch->editAttributes() ?> aria-describedby="x_PatientSearch_help">
<?= $Page->PatientSearch->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientSearch->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
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
    ew.addEventHandlers("patient_opd_follow_up");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

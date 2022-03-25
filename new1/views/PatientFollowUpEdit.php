<?php

namespace PHPMaker2021\project3;

// Page object
$PatientFollowUpEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_follow_upedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpatient_follow_upedit = currentForm = new ew.Form("fpatient_follow_upedit", "edit");

    // Add fields
    var fields = ew.vars.tables.patient_follow_up.fields;
    fpatient_follow_upedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Reception", [fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["mrnno", [fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["PatientName", [fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Age", [fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["profilePic", [fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["courseinhospital", [fields.courseinhospital.required ? ew.Validators.required(fields.courseinhospital.caption) : null], fields.courseinhospital.isInvalid],
        ["procedurenotes", [fields.procedurenotes.required ? ew.Validators.required(fields.procedurenotes.caption) : null], fields.procedurenotes.isInvalid],
        ["conditionatdischarge", [fields.conditionatdischarge.required ? ew.Validators.required(fields.conditionatdischarge.caption) : null], fields.conditionatdischarge.isInvalid],
        ["BP", [fields.BP.required ? ew.Validators.required(fields.BP.caption) : null], fields.BP.isInvalid],
        ["Pulse", [fields.Pulse.required ? ew.Validators.required(fields.Pulse.caption) : null], fields.Pulse.isInvalid],
        ["Resp", [fields.Resp.required ? ew.Validators.required(fields.Resp.caption) : null], fields.Resp.isInvalid],
        ["SPO2", [fields.SPO2.required ? ew.Validators.required(fields.SPO2.caption) : null], fields.SPO2.isInvalid],
        ["FollowupAdvice", [fields.FollowupAdvice.required ? ew.Validators.required(fields.FollowupAdvice.caption) : null], fields.FollowupAdvice.isInvalid],
        ["NextReviewDate", [fields.NextReviewDate.required ? ew.Validators.required(fields.NextReviewDate.caption) : null, ew.Validators.datetime(0)], fields.NextReviewDate.isInvalid],
        ["PatID", [fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["MobileNumber", [fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_follow_upedit,
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
    fpatient_follow_upedit.validate = function () {
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
    fpatient_follow_upedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_follow_upedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpatient_follow_upedit");
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
<form name="fpatient_follow_upedit" id="fpatient_follow_upedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_follow_up">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_patient_follow_up_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_patient_follow_up_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_patient_follow_up_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<span id="el_patient_follow_up_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_patient_follow_up_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_patient_follow_up_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_patient_follow_up_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_patient_follow_up_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_patient_follow_up_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_patient_follow_up_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_patient_follow_up_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<span id="el_patient_follow_up_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_patient_follow_up_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<span id="el_patient_follow_up_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_patient_follow_up_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_patient_follow_up_profilePic">
<textarea data-table="patient_follow_up" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help"><?= $Page->profilePic->EditValue ?></textarea>
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->courseinhospital->Visible) { // courseinhospital ?>
    <div id="r_courseinhospital" class="form-group row">
        <label id="elh_patient_follow_up_courseinhospital" for="x_courseinhospital" class="<?= $Page->LeftColumnClass ?>"><?= $Page->courseinhospital->caption() ?><?= $Page->courseinhospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->courseinhospital->cellAttributes() ?>>
<span id="el_patient_follow_up_courseinhospital">
<textarea data-table="patient_follow_up" data-field="x_courseinhospital" name="x_courseinhospital" id="x_courseinhospital" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->courseinhospital->getPlaceHolder()) ?>"<?= $Page->courseinhospital->editAttributes() ?> aria-describedby="x_courseinhospital_help"><?= $Page->courseinhospital->EditValue ?></textarea>
<?= $Page->courseinhospital->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->courseinhospital->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->procedurenotes->Visible) { // procedurenotes ?>
    <div id="r_procedurenotes" class="form-group row">
        <label id="elh_patient_follow_up_procedurenotes" for="x_procedurenotes" class="<?= $Page->LeftColumnClass ?>"><?= $Page->procedurenotes->caption() ?><?= $Page->procedurenotes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->procedurenotes->cellAttributes() ?>>
<span id="el_patient_follow_up_procedurenotes">
<textarea data-table="patient_follow_up" data-field="x_procedurenotes" name="x_procedurenotes" id="x_procedurenotes" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->procedurenotes->getPlaceHolder()) ?>"<?= $Page->procedurenotes->editAttributes() ?> aria-describedby="x_procedurenotes_help"><?= $Page->procedurenotes->EditValue ?></textarea>
<?= $Page->procedurenotes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->procedurenotes->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->conditionatdischarge->Visible) { // conditionatdischarge ?>
    <div id="r_conditionatdischarge" class="form-group row">
        <label id="elh_patient_follow_up_conditionatdischarge" for="x_conditionatdischarge" class="<?= $Page->LeftColumnClass ?>"><?= $Page->conditionatdischarge->caption() ?><?= $Page->conditionatdischarge->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->conditionatdischarge->cellAttributes() ?>>
<span id="el_patient_follow_up_conditionatdischarge">
<textarea data-table="patient_follow_up" data-field="x_conditionatdischarge" name="x_conditionatdischarge" id="x_conditionatdischarge" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->conditionatdischarge->getPlaceHolder()) ?>"<?= $Page->conditionatdischarge->editAttributes() ?> aria-describedby="x_conditionatdischarge_help"><?= $Page->conditionatdischarge->EditValue ?></textarea>
<?= $Page->conditionatdischarge->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->conditionatdischarge->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
    <div id="r_BP" class="form-group row">
        <label id="elh_patient_follow_up_BP" for="x_BP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BP->caption() ?><?= $Page->BP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BP->cellAttributes() ?>>
<span id="el_patient_follow_up_BP">
<input type="<?= $Page->BP->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_BP" name="x_BP" id="x_BP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BP->getPlaceHolder()) ?>" value="<?= $Page->BP->EditValue ?>"<?= $Page->BP->editAttributes() ?> aria-describedby="x_BP_help">
<?= $Page->BP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
    <div id="r_Pulse" class="form-group row">
        <label id="elh_patient_follow_up_Pulse" for="x_Pulse" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Pulse->caption() ?><?= $Page->Pulse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pulse->cellAttributes() ?>>
<span id="el_patient_follow_up_Pulse">
<input type="<?= $Page->Pulse->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Pulse" name="x_Pulse" id="x_Pulse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pulse->getPlaceHolder()) ?>" value="<?= $Page->Pulse->EditValue ?>"<?= $Page->Pulse->editAttributes() ?> aria-describedby="x_Pulse_help">
<?= $Page->Pulse->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pulse->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Resp->Visible) { // Resp ?>
    <div id="r_Resp" class="form-group row">
        <label id="elh_patient_follow_up_Resp" for="x_Resp" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Resp->caption() ?><?= $Page->Resp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Resp->cellAttributes() ?>>
<span id="el_patient_follow_up_Resp">
<input type="<?= $Page->Resp->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Resp" name="x_Resp" id="x_Resp" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Resp->getPlaceHolder()) ?>" value="<?= $Page->Resp->EditValue ?>"<?= $Page->Resp->editAttributes() ?> aria-describedby="x_Resp_help">
<?= $Page->Resp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Resp->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SPO2->Visible) { // SPO2 ?>
    <div id="r_SPO2" class="form-group row">
        <label id="elh_patient_follow_up_SPO2" for="x_SPO2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SPO2->caption() ?><?= $Page->SPO2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SPO2->cellAttributes() ?>>
<span id="el_patient_follow_up_SPO2">
<input type="<?= $Page->SPO2->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_SPO2" name="x_SPO2" id="x_SPO2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SPO2->getPlaceHolder()) ?>" value="<?= $Page->SPO2->EditValue ?>"<?= $Page->SPO2->editAttributes() ?> aria-describedby="x_SPO2_help">
<?= $Page->SPO2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SPO2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FollowupAdvice->Visible) { // FollowupAdvice ?>
    <div id="r_FollowupAdvice" class="form-group row">
        <label id="elh_patient_follow_up_FollowupAdvice" for="x_FollowupAdvice" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FollowupAdvice->caption() ?><?= $Page->FollowupAdvice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FollowupAdvice->cellAttributes() ?>>
<span id="el_patient_follow_up_FollowupAdvice">
<textarea data-table="patient_follow_up" data-field="x_FollowupAdvice" name="x_FollowupAdvice" id="x_FollowupAdvice" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->FollowupAdvice->getPlaceHolder()) ?>"<?= $Page->FollowupAdvice->editAttributes() ?> aria-describedby="x_FollowupAdvice_help"><?= $Page->FollowupAdvice->EditValue ?></textarea>
<?= $Page->FollowupAdvice->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FollowupAdvice->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
    <div id="r_NextReviewDate" class="form-group row">
        <label id="elh_patient_follow_up_NextReviewDate" for="x_NextReviewDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NextReviewDate->caption() ?><?= $Page->NextReviewDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NextReviewDate->cellAttributes() ?>>
<span id="el_patient_follow_up_NextReviewDate">
<input type="<?= $Page->NextReviewDate->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_NextReviewDate" name="x_NextReviewDate" id="x_NextReviewDate" placeholder="<?= HtmlEncode($Page->NextReviewDate->getPlaceHolder()) ?>" value="<?= $Page->NextReviewDate->EditValue ?>"<?= $Page->NextReviewDate->editAttributes() ?> aria-describedby="x_NextReviewDate_help">
<?= $Page->NextReviewDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NextReviewDate->getErrorMessage() ?></div>
<?php if (!$Page->NextReviewDate->ReadOnly && !$Page->NextReviewDate->Disabled && !isset($Page->NextReviewDate->EditAttrs["readonly"]) && !isset($Page->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_follow_upedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_follow_upedit", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_patient_follow_up_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<span id="el_patient_follow_up_PatID">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?> aria-describedby="x_PatID_help">
<?= $Page->PatID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label id="elh_patient_follow_up_MobileNumber" for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MobileNumber->caption() ?><?= $Page->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el_patient_follow_up_MobileNumber">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?> aria-describedby="x_MobileNumber_help">
<?= $Page->MobileNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_patient_follow_up_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_patient_follow_up_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
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
    ew.addEventHandlers("patient_follow_up");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

<?php

namespace PHPMaker2021\project3;

// Page object
$PatientInvestigationsEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_investigationsedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpatient_investigationsedit = currentForm = new ew.Form("fpatient_investigationsedit", "edit");

    // Add fields
    var fields = ew.vars.tables.patient_investigations.fields;
    fpatient_investigationsedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Reception", [fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["mrnno", [fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["PatientName", [fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Age", [fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["profilePic", [fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["Investigation", [fields.Investigation.required ? ew.Validators.required(fields.Investigation.caption) : null], fields.Investigation.isInvalid],
        ["Value", [fields.Value.required ? ew.Validators.required(fields.Value.caption) : null], fields.Value.isInvalid],
        ["NormalRange", [fields.NormalRange.required ? ew.Validators.required(fields.NormalRange.caption) : null], fields.NormalRange.isInvalid],
        ["SampleCollected", [fields.SampleCollected.required ? ew.Validators.required(fields.SampleCollected.caption) : null, ew.Validators.datetime(0)], fields.SampleCollected.isInvalid],
        ["SampleCollectedBy", [fields.SampleCollectedBy.required ? ew.Validators.required(fields.SampleCollectedBy.caption) : null], fields.SampleCollectedBy.isInvalid],
        ["ResultedDate", [fields.ResultedDate.required ? ew.Validators.required(fields.ResultedDate.caption) : null, ew.Validators.datetime(0)], fields.ResultedDate.isInvalid],
        ["ResultedBy", [fields.ResultedBy.required ? ew.Validators.required(fields.ResultedBy.caption) : null], fields.ResultedBy.isInvalid],
        ["Modified", [fields.Modified.required ? ew.Validators.required(fields.Modified.caption) : null, ew.Validators.datetime(0)], fields.Modified.isInvalid],
        ["ModifiedBy", [fields.ModifiedBy.required ? ew.Validators.required(fields.ModifiedBy.caption) : null], fields.ModifiedBy.isInvalid],
        ["Created", [fields.Created.required ? ew.Validators.required(fields.Created.caption) : null, ew.Validators.datetime(0)], fields.Created.isInvalid],
        ["CreatedBy", [fields.CreatedBy.required ? ew.Validators.required(fields.CreatedBy.caption) : null], fields.CreatedBy.isInvalid],
        ["GroupHead", [fields.GroupHead.required ? ew.Validators.required(fields.GroupHead.caption) : null], fields.GroupHead.isInvalid],
        ["Cost", [fields.Cost.required ? ew.Validators.required(fields.Cost.caption) : null, ew.Validators.float], fields.Cost.isInvalid],
        ["PaymentStatus", [fields.PaymentStatus.required ? ew.Validators.required(fields.PaymentStatus.caption) : null], fields.PaymentStatus.isInvalid],
        ["PayMode", [fields.PayMode.required ? ew.Validators.required(fields.PayMode.caption) : null], fields.PayMode.isInvalid],
        ["VoucherNo", [fields.VoucherNo.required ? ew.Validators.required(fields.VoucherNo.caption) : null], fields.VoucherNo.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_investigationsedit,
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
    fpatient_investigationsedit.validate = function () {
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
    fpatient_investigationsedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_investigationsedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpatient_investigationsedit");
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
<form name="fpatient_investigationsedit" id="fpatient_investigationsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_investigations">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_patient_investigations_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_patient_investigations_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_patient_investigations_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<span id="el_patient_investigations_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_patient_investigations_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_patient_investigations_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_investigations" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_patient_investigations_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_patient_investigations_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_investigations" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_patient_investigations_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_patient_investigations_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_investigations" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_patient_investigations_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<span id="el_patient_investigations_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_patient_investigations_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<span id="el_patient_investigations_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_patient_investigations_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_patient_investigations_profilePic">
<textarea data-table="patient_investigations" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help"><?= $Page->profilePic->EditValue ?></textarea>
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Investigation->Visible) { // Investigation ?>
    <div id="r_Investigation" class="form-group row">
        <label id="elh_patient_investigations_Investigation" for="x_Investigation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Investigation->caption() ?><?= $Page->Investigation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Investigation->cellAttributes() ?>>
<span id="el_patient_investigations_Investigation">
<input type="<?= $Page->Investigation->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Investigation" name="x_Investigation" id="x_Investigation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Investigation->getPlaceHolder()) ?>" value="<?= $Page->Investigation->EditValue ?>"<?= $Page->Investigation->editAttributes() ?> aria-describedby="x_Investigation_help">
<?= $Page->Investigation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Investigation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Value->Visible) { // Value ?>
    <div id="r_Value" class="form-group row">
        <label id="elh_patient_investigations_Value" for="x_Value" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Value->caption() ?><?= $Page->Value->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Value->cellAttributes() ?>>
<span id="el_patient_investigations_Value">
<input type="<?= $Page->Value->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Value" name="x_Value" id="x_Value" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Value->getPlaceHolder()) ?>" value="<?= $Page->Value->EditValue ?>"<?= $Page->Value->editAttributes() ?> aria-describedby="x_Value_help">
<?= $Page->Value->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Value->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NormalRange->Visible) { // NormalRange ?>
    <div id="r_NormalRange" class="form-group row">
        <label id="elh_patient_investigations_NormalRange" for="x_NormalRange" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NormalRange->caption() ?><?= $Page->NormalRange->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NormalRange->cellAttributes() ?>>
<span id="el_patient_investigations_NormalRange">
<input type="<?= $Page->NormalRange->getInputTextType() ?>" data-table="patient_investigations" data-field="x_NormalRange" name="x_NormalRange" id="x_NormalRange" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NormalRange->getPlaceHolder()) ?>" value="<?= $Page->NormalRange->EditValue ?>"<?= $Page->NormalRange->editAttributes() ?> aria-describedby="x_NormalRange_help">
<?= $Page->NormalRange->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NormalRange->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SampleCollected->Visible) { // SampleCollected ?>
    <div id="r_SampleCollected" class="form-group row">
        <label id="elh_patient_investigations_SampleCollected" for="x_SampleCollected" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SampleCollected->caption() ?><?= $Page->SampleCollected->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SampleCollected->cellAttributes() ?>>
<span id="el_patient_investigations_SampleCollected">
<input type="<?= $Page->SampleCollected->getInputTextType() ?>" data-table="patient_investigations" data-field="x_SampleCollected" name="x_SampleCollected" id="x_SampleCollected" placeholder="<?= HtmlEncode($Page->SampleCollected->getPlaceHolder()) ?>" value="<?= $Page->SampleCollected->EditValue ?>"<?= $Page->SampleCollected->editAttributes() ?> aria-describedby="x_SampleCollected_help">
<?= $Page->SampleCollected->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SampleCollected->getErrorMessage() ?></div>
<?php if (!$Page->SampleCollected->ReadOnly && !$Page->SampleCollected->Disabled && !isset($Page->SampleCollected->EditAttrs["readonly"]) && !isset($Page->SampleCollected->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationsedit", "x_SampleCollected", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
    <div id="r_SampleCollectedBy" class="form-group row">
        <label id="elh_patient_investigations_SampleCollectedBy" for="x_SampleCollectedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SampleCollectedBy->caption() ?><?= $Page->SampleCollectedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SampleCollectedBy->cellAttributes() ?>>
<span id="el_patient_investigations_SampleCollectedBy">
<input type="<?= $Page->SampleCollectedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x_SampleCollectedBy" id="x_SampleCollectedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SampleCollectedBy->getPlaceHolder()) ?>" value="<?= $Page->SampleCollectedBy->EditValue ?>"<?= $Page->SampleCollectedBy->editAttributes() ?> aria-describedby="x_SampleCollectedBy_help">
<?= $Page->SampleCollectedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SampleCollectedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ResultedDate->Visible) { // ResultedDate ?>
    <div id="r_ResultedDate" class="form-group row">
        <label id="elh_patient_investigations_ResultedDate" for="x_ResultedDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ResultedDate->caption() ?><?= $Page->ResultedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResultedDate->cellAttributes() ?>>
<span id="el_patient_investigations_ResultedDate">
<input type="<?= $Page->ResultedDate->getInputTextType() ?>" data-table="patient_investigations" data-field="x_ResultedDate" name="x_ResultedDate" id="x_ResultedDate" placeholder="<?= HtmlEncode($Page->ResultedDate->getPlaceHolder()) ?>" value="<?= $Page->ResultedDate->EditValue ?>"<?= $Page->ResultedDate->editAttributes() ?> aria-describedby="x_ResultedDate_help">
<?= $Page->ResultedDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ResultedDate->getErrorMessage() ?></div>
<?php if (!$Page->ResultedDate->ReadOnly && !$Page->ResultedDate->Disabled && !isset($Page->ResultedDate->EditAttrs["readonly"]) && !isset($Page->ResultedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationsedit", "x_ResultedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
    <div id="r_ResultedBy" class="form-group row">
        <label id="elh_patient_investigations_ResultedBy" for="x_ResultedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ResultedBy->caption() ?><?= $Page->ResultedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResultedBy->cellAttributes() ?>>
<span id="el_patient_investigations_ResultedBy">
<input type="<?= $Page->ResultedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_ResultedBy" name="x_ResultedBy" id="x_ResultedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ResultedBy->getPlaceHolder()) ?>" value="<?= $Page->ResultedBy->EditValue ?>"<?= $Page->ResultedBy->editAttributes() ?> aria-describedby="x_ResultedBy_help">
<?= $Page->ResultedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ResultedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Modified->Visible) { // Modified ?>
    <div id="r_Modified" class="form-group row">
        <label id="elh_patient_investigations_Modified" for="x_Modified" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Modified->caption() ?><?= $Page->Modified->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Modified->cellAttributes() ?>>
<span id="el_patient_investigations_Modified">
<input type="<?= $Page->Modified->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Modified" name="x_Modified" id="x_Modified" placeholder="<?= HtmlEncode($Page->Modified->getPlaceHolder()) ?>" value="<?= $Page->Modified->EditValue ?>"<?= $Page->Modified->editAttributes() ?> aria-describedby="x_Modified_help">
<?= $Page->Modified->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Modified->getErrorMessage() ?></div>
<?php if (!$Page->Modified->ReadOnly && !$Page->Modified->Disabled && !isset($Page->Modified->EditAttrs["readonly"]) && !isset($Page->Modified->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationsedit", "x_Modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
    <div id="r_ModifiedBy" class="form-group row">
        <label id="elh_patient_investigations_ModifiedBy" for="x_ModifiedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModifiedBy->caption() ?><?= $Page->ModifiedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el_patient_investigations_ModifiedBy">
<input type="<?= $Page->ModifiedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Page->ModifiedBy->EditValue ?>"<?= $Page->ModifiedBy->editAttributes() ?> aria-describedby="x_ModifiedBy_help">
<?= $Page->ModifiedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModifiedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Created->Visible) { // Created ?>
    <div id="r_Created" class="form-group row">
        <label id="elh_patient_investigations_Created" for="x_Created" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Created->caption() ?><?= $Page->Created->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Created->cellAttributes() ?>>
<span id="el_patient_investigations_Created">
<input type="<?= $Page->Created->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Created" name="x_Created" id="x_Created" placeholder="<?= HtmlEncode($Page->Created->getPlaceHolder()) ?>" value="<?= $Page->Created->EditValue ?>"<?= $Page->Created->editAttributes() ?> aria-describedby="x_Created_help">
<?= $Page->Created->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Created->getErrorMessage() ?></div>
<?php if (!$Page->Created->ReadOnly && !$Page->Created->Disabled && !isset($Page->Created->EditAttrs["readonly"]) && !isset($Page->Created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationsedit", "x_Created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
    <div id="r_CreatedBy" class="form-group row">
        <label id="elh_patient_investigations_CreatedBy" for="x_CreatedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreatedBy->caption() ?><?= $Page->CreatedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el_patient_investigations_CreatedBy">
<input type="<?= $Page->CreatedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreatedBy->getPlaceHolder()) ?>" value="<?= $Page->CreatedBy->EditValue ?>"<?= $Page->CreatedBy->editAttributes() ?> aria-describedby="x_CreatedBy_help">
<?= $Page->CreatedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreatedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GroupHead->Visible) { // GroupHead ?>
    <div id="r_GroupHead" class="form-group row">
        <label id="elh_patient_investigations_GroupHead" for="x_GroupHead" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GroupHead->caption() ?><?= $Page->GroupHead->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GroupHead->cellAttributes() ?>>
<span id="el_patient_investigations_GroupHead">
<input type="<?= $Page->GroupHead->getInputTextType() ?>" data-table="patient_investigations" data-field="x_GroupHead" name="x_GroupHead" id="x_GroupHead" size="30" maxlength="4" placeholder="<?= HtmlEncode($Page->GroupHead->getPlaceHolder()) ?>" value="<?= $Page->GroupHead->EditValue ?>"<?= $Page->GroupHead->editAttributes() ?> aria-describedby="x_GroupHead_help">
<?= $Page->GroupHead->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GroupHead->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Cost->Visible) { // Cost ?>
    <div id="r_Cost" class="form-group row">
        <label id="elh_patient_investigations_Cost" for="x_Cost" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Cost->caption() ?><?= $Page->Cost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Cost->cellAttributes() ?>>
<span id="el_patient_investigations_Cost">
<input type="<?= $Page->Cost->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Cost" name="x_Cost" id="x_Cost" size="30" placeholder="<?= HtmlEncode($Page->Cost->getPlaceHolder()) ?>" value="<?= $Page->Cost->EditValue ?>"<?= $Page->Cost->editAttributes() ?> aria-describedby="x_Cost_help">
<?= $Page->Cost->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Cost->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
    <div id="r_PaymentStatus" class="form-group row">
        <label id="elh_patient_investigations_PaymentStatus" for="x_PaymentStatus" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PaymentStatus->caption() ?><?= $Page->PaymentStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaymentStatus->cellAttributes() ?>>
<span id="el_patient_investigations_PaymentStatus">
<input type="<?= $Page->PaymentStatus->getInputTextType() ?>" data-table="patient_investigations" data-field="x_PaymentStatus" name="x_PaymentStatus" id="x_PaymentStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaymentStatus->getPlaceHolder()) ?>" value="<?= $Page->PaymentStatus->EditValue ?>"<?= $Page->PaymentStatus->editAttributes() ?> aria-describedby="x_PaymentStatus_help">
<?= $Page->PaymentStatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PaymentStatus->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PayMode->Visible) { // PayMode ?>
    <div id="r_PayMode" class="form-group row">
        <label id="elh_patient_investigations_PayMode" for="x_PayMode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PayMode->caption() ?><?= $Page->PayMode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PayMode->cellAttributes() ?>>
<span id="el_patient_investigations_PayMode">
<input type="<?= $Page->PayMode->getInputTextType() ?>" data-table="patient_investigations" data-field="x_PayMode" name="x_PayMode" id="x_PayMode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PayMode->getPlaceHolder()) ?>" value="<?= $Page->PayMode->EditValue ?>"<?= $Page->PayMode->editAttributes() ?> aria-describedby="x_PayMode_help">
<?= $Page->PayMode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PayMode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VoucherNo->Visible) { // VoucherNo ?>
    <div id="r_VoucherNo" class="form-group row">
        <label id="elh_patient_investigations_VoucherNo" for="x_VoucherNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->VoucherNo->caption() ?><?= $Page->VoucherNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VoucherNo->cellAttributes() ?>>
<span id="el_patient_investigations_VoucherNo">
<input type="<?= $Page->VoucherNo->getInputTextType() ?>" data-table="patient_investigations" data-field="x_VoucherNo" name="x_VoucherNo" id="x_VoucherNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VoucherNo->getPlaceHolder()) ?>" value="<?= $Page->VoucherNo->EditValue ?>"<?= $Page->VoucherNo->editAttributes() ?> aria-describedby="x_VoucherNo_help">
<?= $Page->VoucherNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->VoucherNo->getErrorMessage() ?></div>
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
    ew.addEventHandlers("patient_investigations");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

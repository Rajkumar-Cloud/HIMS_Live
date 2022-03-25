<?php

namespace PHPMaker2021\project3;

// Page object
$IvfAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivfadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fivfadd = currentForm = new ew.Form("fivfadd", "add");

    // Add fields
    var fields = ew.vars.tables.ivf.fields;
    fivfadd.addFields([
        ["Male", [fields.Male.required ? ew.Validators.required(fields.Male.caption) : null, ew.Validators.integer], fields.Male.isInvalid],
        ["Female", [fields.Female.required ? ew.Validators.required(fields.Female.caption) : null, ew.Validators.integer], fields.Female.isInvalid],
        ["status", [fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["malepropic", [fields.malepropic.required ? ew.Validators.required(fields.malepropic.caption) : null], fields.malepropic.isInvalid],
        ["femalepropic", [fields.femalepropic.required ? ew.Validators.required(fields.femalepropic.caption) : null], fields.femalepropic.isInvalid],
        ["HusbandEducation", [fields.HusbandEducation.required ? ew.Validators.required(fields.HusbandEducation.caption) : null], fields.HusbandEducation.isInvalid],
        ["WifeEducation", [fields.WifeEducation.required ? ew.Validators.required(fields.WifeEducation.caption) : null], fields.WifeEducation.isInvalid],
        ["HusbandWorkHours", [fields.HusbandWorkHours.required ? ew.Validators.required(fields.HusbandWorkHours.caption) : null], fields.HusbandWorkHours.isInvalid],
        ["WifeWorkHours", [fields.WifeWorkHours.required ? ew.Validators.required(fields.WifeWorkHours.caption) : null], fields.WifeWorkHours.isInvalid],
        ["PatientLanguage", [fields.PatientLanguage.required ? ew.Validators.required(fields.PatientLanguage.caption) : null], fields.PatientLanguage.isInvalid],
        ["ReferedBy", [fields.ReferedBy.required ? ew.Validators.required(fields.ReferedBy.caption) : null], fields.ReferedBy.isInvalid],
        ["ReferPhNo", [fields.ReferPhNo.required ? ew.Validators.required(fields.ReferPhNo.caption) : null], fields.ReferPhNo.isInvalid],
        ["WifeCell", [fields.WifeCell.required ? ew.Validators.required(fields.WifeCell.caption) : null], fields.WifeCell.isInvalid],
        ["HusbandCell", [fields.HusbandCell.required ? ew.Validators.required(fields.HusbandCell.caption) : null], fields.HusbandCell.isInvalid],
        ["WifeEmail", [fields.WifeEmail.required ? ew.Validators.required(fields.WifeEmail.caption) : null], fields.WifeEmail.isInvalid],
        ["HusbandEmail", [fields.HusbandEmail.required ? ew.Validators.required(fields.HusbandEmail.caption) : null], fields.HusbandEmail.isInvalid],
        ["ARTCYCLE", [fields.ARTCYCLE.required ? ew.Validators.required(fields.ARTCYCLE.caption) : null], fields.ARTCYCLE.isInvalid],
        ["RESULT", [fields.RESULT.required ? ew.Validators.required(fields.RESULT.caption) : null], fields.RESULT.isInvalid],
        ["CoupleID", [fields.CoupleID.required ? ew.Validators.required(fields.CoupleID.caption) : null], fields.CoupleID.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid],
        ["PatientName", [fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["PatientID", [fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["PartnerName", [fields.PartnerName.required ? ew.Validators.required(fields.PartnerName.caption) : null], fields.PartnerName.isInvalid],
        ["PartnerID", [fields.PartnerID.required ? ew.Validators.required(fields.PartnerID.caption) : null], fields.PartnerID.isInvalid],
        ["DrID", [fields.DrID.required ? ew.Validators.required(fields.DrID.caption) : null, ew.Validators.integer], fields.DrID.isInvalid],
        ["DrDepartment", [fields.DrDepartment.required ? ew.Validators.required(fields.DrDepartment.caption) : null], fields.DrDepartment.isInvalid],
        ["Doctor", [fields.Doctor.required ? ew.Validators.required(fields.Doctor.caption) : null], fields.Doctor.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivfadd,
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
    fivfadd.validate = function () {
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
    fivfadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivfadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fivfadd");
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
<form name="fivfadd" id="fivfadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->Male->Visible) { // Male ?>
    <div id="r_Male" class="form-group row">
        <label id="elh_ivf_Male" for="x_Male" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Male->caption() ?><?= $Page->Male->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Male->cellAttributes() ?>>
<span id="el_ivf_Male">
<input type="<?= $Page->Male->getInputTextType() ?>" data-table="ivf" data-field="x_Male" name="x_Male" id="x_Male" size="30" placeholder="<?= HtmlEncode($Page->Male->getPlaceHolder()) ?>" value="<?= $Page->Male->EditValue ?>"<?= $Page->Male->editAttributes() ?> aria-describedby="x_Male_help">
<?= $Page->Male->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Male->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Female->Visible) { // Female ?>
    <div id="r_Female" class="form-group row">
        <label id="elh_ivf_Female" for="x_Female" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Female->caption() ?><?= $Page->Female->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Female->cellAttributes() ?>>
<span id="el_ivf_Female">
<input type="<?= $Page->Female->getInputTextType() ?>" data-table="ivf" data-field="x_Female" name="x_Female" id="x_Female" size="30" placeholder="<?= HtmlEncode($Page->Female->getPlaceHolder()) ?>" value="<?= $Page->Female->EditValue ?>"<?= $Page->Female->editAttributes() ?> aria-describedby="x_Female_help">
<?= $Page->Female->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Female->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_ivf_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_ivf_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="ivf" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_ivf_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_ivf_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="ivf" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_ivf_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_ivf_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="ivf" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivfadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivfadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_ivf_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_ivf_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="ivf" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_ivf_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_ivf_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="ivf" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivfadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivfadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->malepropic->Visible) { // malepropic ?>
    <div id="r_malepropic" class="form-group row">
        <label id="elh_ivf_malepropic" for="x_malepropic" class="<?= $Page->LeftColumnClass ?>"><?= $Page->malepropic->caption() ?><?= $Page->malepropic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->malepropic->cellAttributes() ?>>
<span id="el_ivf_malepropic">
<textarea data-table="ivf" data-field="x_malepropic" name="x_malepropic" id="x_malepropic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->malepropic->getPlaceHolder()) ?>"<?= $Page->malepropic->editAttributes() ?> aria-describedby="x_malepropic_help"><?= $Page->malepropic->EditValue ?></textarea>
<?= $Page->malepropic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->malepropic->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->femalepropic->Visible) { // femalepropic ?>
    <div id="r_femalepropic" class="form-group row">
        <label id="elh_ivf_femalepropic" for="x_femalepropic" class="<?= $Page->LeftColumnClass ?>"><?= $Page->femalepropic->caption() ?><?= $Page->femalepropic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->femalepropic->cellAttributes() ?>>
<span id="el_ivf_femalepropic">
<textarea data-table="ivf" data-field="x_femalepropic" name="x_femalepropic" id="x_femalepropic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->femalepropic->getPlaceHolder()) ?>"<?= $Page->femalepropic->editAttributes() ?> aria-describedby="x_femalepropic_help"><?= $Page->femalepropic->EditValue ?></textarea>
<?= $Page->femalepropic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->femalepropic->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HusbandEducation->Visible) { // HusbandEducation ?>
    <div id="r_HusbandEducation" class="form-group row">
        <label id="elh_ivf_HusbandEducation" for="x_HusbandEducation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HusbandEducation->caption() ?><?= $Page->HusbandEducation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HusbandEducation->cellAttributes() ?>>
<span id="el_ivf_HusbandEducation">
<input type="<?= $Page->HusbandEducation->getInputTextType() ?>" data-table="ivf" data-field="x_HusbandEducation" name="x_HusbandEducation" id="x_HusbandEducation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HusbandEducation->getPlaceHolder()) ?>" value="<?= $Page->HusbandEducation->EditValue ?>"<?= $Page->HusbandEducation->editAttributes() ?> aria-describedby="x_HusbandEducation_help">
<?= $Page->HusbandEducation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HusbandEducation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WifeEducation->Visible) { // WifeEducation ?>
    <div id="r_WifeEducation" class="form-group row">
        <label id="elh_ivf_WifeEducation" for="x_WifeEducation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->WifeEducation->caption() ?><?= $Page->WifeEducation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WifeEducation->cellAttributes() ?>>
<span id="el_ivf_WifeEducation">
<input type="<?= $Page->WifeEducation->getInputTextType() ?>" data-table="ivf" data-field="x_WifeEducation" name="x_WifeEducation" id="x_WifeEducation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WifeEducation->getPlaceHolder()) ?>" value="<?= $Page->WifeEducation->EditValue ?>"<?= $Page->WifeEducation->editAttributes() ?> aria-describedby="x_WifeEducation_help">
<?= $Page->WifeEducation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WifeEducation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
    <div id="r_HusbandWorkHours" class="form-group row">
        <label id="elh_ivf_HusbandWorkHours" for="x_HusbandWorkHours" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HusbandWorkHours->caption() ?><?= $Page->HusbandWorkHours->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HusbandWorkHours->cellAttributes() ?>>
<span id="el_ivf_HusbandWorkHours">
<input type="<?= $Page->HusbandWorkHours->getInputTextType() ?>" data-table="ivf" data-field="x_HusbandWorkHours" name="x_HusbandWorkHours" id="x_HusbandWorkHours" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HusbandWorkHours->getPlaceHolder()) ?>" value="<?= $Page->HusbandWorkHours->EditValue ?>"<?= $Page->HusbandWorkHours->editAttributes() ?> aria-describedby="x_HusbandWorkHours_help">
<?= $Page->HusbandWorkHours->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HusbandWorkHours->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WifeWorkHours->Visible) { // WifeWorkHours ?>
    <div id="r_WifeWorkHours" class="form-group row">
        <label id="elh_ivf_WifeWorkHours" for="x_WifeWorkHours" class="<?= $Page->LeftColumnClass ?>"><?= $Page->WifeWorkHours->caption() ?><?= $Page->WifeWorkHours->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WifeWorkHours->cellAttributes() ?>>
<span id="el_ivf_WifeWorkHours">
<input type="<?= $Page->WifeWorkHours->getInputTextType() ?>" data-table="ivf" data-field="x_WifeWorkHours" name="x_WifeWorkHours" id="x_WifeWorkHours" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WifeWorkHours->getPlaceHolder()) ?>" value="<?= $Page->WifeWorkHours->EditValue ?>"<?= $Page->WifeWorkHours->editAttributes() ?> aria-describedby="x_WifeWorkHours_help">
<?= $Page->WifeWorkHours->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WifeWorkHours->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientLanguage->Visible) { // PatientLanguage ?>
    <div id="r_PatientLanguage" class="form-group row">
        <label id="elh_ivf_PatientLanguage" for="x_PatientLanguage" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientLanguage->caption() ?><?= $Page->PatientLanguage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientLanguage->cellAttributes() ?>>
<span id="el_ivf_PatientLanguage">
<input type="<?= $Page->PatientLanguage->getInputTextType() ?>" data-table="ivf" data-field="x_PatientLanguage" name="x_PatientLanguage" id="x_PatientLanguage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientLanguage->getPlaceHolder()) ?>" value="<?= $Page->PatientLanguage->EditValue ?>"<?= $Page->PatientLanguage->editAttributes() ?> aria-describedby="x_PatientLanguage_help">
<?= $Page->PatientLanguage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientLanguage->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferedBy->Visible) { // ReferedBy ?>
    <div id="r_ReferedBy" class="form-group row">
        <label id="elh_ivf_ReferedBy" for="x_ReferedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReferedBy->caption() ?><?= $Page->ReferedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferedBy->cellAttributes() ?>>
<span id="el_ivf_ReferedBy">
<input type="<?= $Page->ReferedBy->getInputTextType() ?>" data-table="ivf" data-field="x_ReferedBy" name="x_ReferedBy" id="x_ReferedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferedBy->getPlaceHolder()) ?>" value="<?= $Page->ReferedBy->EditValue ?>"<?= $Page->ReferedBy->editAttributes() ?> aria-describedby="x_ReferedBy_help">
<?= $Page->ReferedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReferPhNo->Visible) { // ReferPhNo ?>
    <div id="r_ReferPhNo" class="form-group row">
        <label id="elh_ivf_ReferPhNo" for="x_ReferPhNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReferPhNo->caption() ?><?= $Page->ReferPhNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReferPhNo->cellAttributes() ?>>
<span id="el_ivf_ReferPhNo">
<input type="<?= $Page->ReferPhNo->getInputTextType() ?>" data-table="ivf" data-field="x_ReferPhNo" name="x_ReferPhNo" id="x_ReferPhNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReferPhNo->getPlaceHolder()) ?>" value="<?= $Page->ReferPhNo->EditValue ?>"<?= $Page->ReferPhNo->editAttributes() ?> aria-describedby="x_ReferPhNo_help">
<?= $Page->ReferPhNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReferPhNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WifeCell->Visible) { // WifeCell ?>
    <div id="r_WifeCell" class="form-group row">
        <label id="elh_ivf_WifeCell" for="x_WifeCell" class="<?= $Page->LeftColumnClass ?>"><?= $Page->WifeCell->caption() ?><?= $Page->WifeCell->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WifeCell->cellAttributes() ?>>
<span id="el_ivf_WifeCell">
<input type="<?= $Page->WifeCell->getInputTextType() ?>" data-table="ivf" data-field="x_WifeCell" name="x_WifeCell" id="x_WifeCell" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WifeCell->getPlaceHolder()) ?>" value="<?= $Page->WifeCell->EditValue ?>"<?= $Page->WifeCell->editAttributes() ?> aria-describedby="x_WifeCell_help">
<?= $Page->WifeCell->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WifeCell->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
    <div id="r_HusbandCell" class="form-group row">
        <label id="elh_ivf_HusbandCell" for="x_HusbandCell" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HusbandCell->caption() ?><?= $Page->HusbandCell->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HusbandCell->cellAttributes() ?>>
<span id="el_ivf_HusbandCell">
<input type="<?= $Page->HusbandCell->getInputTextType() ?>" data-table="ivf" data-field="x_HusbandCell" name="x_HusbandCell" id="x_HusbandCell" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HusbandCell->getPlaceHolder()) ?>" value="<?= $Page->HusbandCell->EditValue ?>"<?= $Page->HusbandCell->editAttributes() ?> aria-describedby="x_HusbandCell_help">
<?= $Page->HusbandCell->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HusbandCell->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WifeEmail->Visible) { // WifeEmail ?>
    <div id="r_WifeEmail" class="form-group row">
        <label id="elh_ivf_WifeEmail" for="x_WifeEmail" class="<?= $Page->LeftColumnClass ?>"><?= $Page->WifeEmail->caption() ?><?= $Page->WifeEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WifeEmail->cellAttributes() ?>>
<span id="el_ivf_WifeEmail">
<input type="<?= $Page->WifeEmail->getInputTextType() ?>" data-table="ivf" data-field="x_WifeEmail" name="x_WifeEmail" id="x_WifeEmail" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WifeEmail->getPlaceHolder()) ?>" value="<?= $Page->WifeEmail->EditValue ?>"<?= $Page->WifeEmail->editAttributes() ?> aria-describedby="x_WifeEmail_help">
<?= $Page->WifeEmail->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WifeEmail->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HusbandEmail->Visible) { // HusbandEmail ?>
    <div id="r_HusbandEmail" class="form-group row">
        <label id="elh_ivf_HusbandEmail" for="x_HusbandEmail" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HusbandEmail->caption() ?><?= $Page->HusbandEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HusbandEmail->cellAttributes() ?>>
<span id="el_ivf_HusbandEmail">
<input type="<?= $Page->HusbandEmail->getInputTextType() ?>" data-table="ivf" data-field="x_HusbandEmail" name="x_HusbandEmail" id="x_HusbandEmail" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HusbandEmail->getPlaceHolder()) ?>" value="<?= $Page->HusbandEmail->EditValue ?>"<?= $Page->HusbandEmail->editAttributes() ?> aria-describedby="x_HusbandEmail_help">
<?= $Page->HusbandEmail->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HusbandEmail->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
    <div id="r_ARTCYCLE" class="form-group row">
        <label id="elh_ivf_ARTCYCLE" for="x_ARTCYCLE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ARTCYCLE->caption() ?><?= $Page->ARTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ARTCYCLE->cellAttributes() ?>>
<span id="el_ivf_ARTCYCLE">
<input type="<?= $Page->ARTCYCLE->getInputTextType() ?>" data-table="ivf" data-field="x_ARTCYCLE" name="x_ARTCYCLE" id="x_ARTCYCLE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ARTCYCLE->getPlaceHolder()) ?>" value="<?= $Page->ARTCYCLE->EditValue ?>"<?= $Page->ARTCYCLE->editAttributes() ?> aria-describedby="x_ARTCYCLE_help">
<?= $Page->ARTCYCLE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ARTCYCLE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
    <div id="r_RESULT" class="form-group row">
        <label id="elh_ivf_RESULT" for="x_RESULT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RESULT->caption() ?><?= $Page->RESULT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RESULT->cellAttributes() ?>>
<span id="el_ivf_RESULT">
<input type="<?= $Page->RESULT->getInputTextType() ?>" data-table="ivf" data-field="x_RESULT" name="x_RESULT" id="x_RESULT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RESULT->getPlaceHolder()) ?>" value="<?= $Page->RESULT->EditValue ?>"<?= $Page->RESULT->editAttributes() ?> aria-describedby="x_RESULT_help">
<?= $Page->RESULT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RESULT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
    <div id="r_CoupleID" class="form-group row">
        <label id="elh_ivf_CoupleID" for="x_CoupleID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CoupleID->caption() ?><?= $Page->CoupleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CoupleID->cellAttributes() ?>>
<span id="el_ivf_CoupleID">
<input type="<?= $Page->CoupleID->getInputTextType() ?>" data-table="ivf" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CoupleID->getPlaceHolder()) ?>" value="<?= $Page->CoupleID->EditValue ?>"<?= $Page->CoupleID->editAttributes() ?> aria-describedby="x_CoupleID_help">
<?= $Page->CoupleID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CoupleID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_ivf_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_ivf_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="ivf" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_ivf_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_ivf_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="ivf" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_ivf_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<span id="el_ivf_PatientID">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="ivf" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?> aria-describedby="x_PatientID_help">
<?= $Page->PatientID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <div id="r_PartnerName" class="form-group row">
        <label id="elh_ivf_PartnerName" for="x_PartnerName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PartnerName->caption() ?><?= $Page->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el_ivf_PartnerName">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="ivf" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?> aria-describedby="x_PartnerName_help">
<?= $Page->PartnerName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <div id="r_PartnerID" class="form-group row">
        <label id="elh_ivf_PartnerID" for="x_PartnerID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PartnerID->caption() ?><?= $Page->PartnerID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el_ivf_PartnerID">
<input type="<?= $Page->PartnerID->getInputTextType() ?>" data-table="ivf" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerID->getPlaceHolder()) ?>" value="<?= $Page->PartnerID->EditValue ?>"<?= $Page->PartnerID->editAttributes() ?> aria-describedby="x_PartnerID_help">
<?= $Page->PartnerID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <div id="r_DrID" class="form-group row">
        <label id="elh_ivf_DrID" for="x_DrID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DrID->caption() ?><?= $Page->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrID->cellAttributes() ?>>
<span id="el_ivf_DrID">
<input type="<?= $Page->DrID->getInputTextType() ?>" data-table="ivf" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?= HtmlEncode($Page->DrID->getPlaceHolder()) ?>" value="<?= $Page->DrID->EditValue ?>"<?= $Page->DrID->editAttributes() ?> aria-describedby="x_DrID_help">
<?= $Page->DrID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
    <div id="r_DrDepartment" class="form-group row">
        <label id="elh_ivf_DrDepartment" for="x_DrDepartment" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DrDepartment->caption() ?><?= $Page->DrDepartment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrDepartment->cellAttributes() ?>>
<span id="el_ivf_DrDepartment">
<input type="<?= $Page->DrDepartment->getInputTextType() ?>" data-table="ivf" data-field="x_DrDepartment" name="x_DrDepartment" id="x_DrDepartment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrDepartment->getPlaceHolder()) ?>" value="<?= $Page->DrDepartment->EditValue ?>"<?= $Page->DrDepartment->editAttributes() ?> aria-describedby="x_DrDepartment_help">
<?= $Page->DrDepartment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrDepartment->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
    <div id="r_Doctor" class="form-group row">
        <label id="elh_ivf_Doctor" for="x_Doctor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Doctor->caption() ?><?= $Page->Doctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Doctor->cellAttributes() ?>>
<span id="el_ivf_Doctor">
<input type="<?= $Page->Doctor->getInputTextType() ?>" data-table="ivf" data-field="x_Doctor" name="x_Doctor" id="x_Doctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Doctor->getPlaceHolder()) ?>" value="<?= $Page->Doctor->EditValue ?>"<?= $Page->Doctor->editAttributes() ?> aria-describedby="x_Doctor_help">
<?= $Page->Doctor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Doctor->getErrorMessage() ?></div>
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
    ew.addEventHandlers("ivf");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

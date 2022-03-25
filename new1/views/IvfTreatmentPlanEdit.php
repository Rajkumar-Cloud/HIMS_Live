<?php

namespace PHPMaker2021\project3;

// Page object
$IvfTreatmentPlanEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_treatment_planedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fivf_treatment_planedit = currentForm = new ew.Form("fivf_treatment_planedit", "edit");

    // Add fields
    var fields = ew.vars.tables.ivf_treatment_plan.fields;
    fivf_treatment_planedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["RIDNO", [fields.RIDNO.required ? ew.Validators.required(fields.RIDNO.caption) : null, ew.Validators.integer], fields.RIDNO.isInvalid],
        ["Name", [fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["Age", [fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["treatment_status", [fields.treatment_status.required ? ew.Validators.required(fields.treatment_status.caption) : null], fields.treatment_status.isInvalid],
        ["ARTCYCLE", [fields.ARTCYCLE.required ? ew.Validators.required(fields.ARTCYCLE.caption) : null], fields.ARTCYCLE.isInvalid],
        ["RESULT", [fields.RESULT.required ? ew.Validators.required(fields.RESULT.caption) : null], fields.RESULT.isInvalid],
        ["status", [fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["TreatmentStartDate", [fields.TreatmentStartDate.required ? ew.Validators.required(fields.TreatmentStartDate.caption) : null, ew.Validators.datetime(0)], fields.TreatmentStartDate.isInvalid],
        ["TreatementStopDate", [fields.TreatementStopDate.required ? ew.Validators.required(fields.TreatementStopDate.caption) : null, ew.Validators.datetime(0)], fields.TreatementStopDate.isInvalid],
        ["TypePatient", [fields.TypePatient.required ? ew.Validators.required(fields.TypePatient.caption) : null], fields.TypePatient.isInvalid],
        ["Treatment", [fields.Treatment.required ? ew.Validators.required(fields.Treatment.caption) : null], fields.Treatment.isInvalid],
        ["TreatmentTec", [fields.TreatmentTec.required ? ew.Validators.required(fields.TreatmentTec.caption) : null], fields.TreatmentTec.isInvalid],
        ["TypeOfCycle", [fields.TypeOfCycle.required ? ew.Validators.required(fields.TypeOfCycle.caption) : null], fields.TypeOfCycle.isInvalid],
        ["SpermOrgin", [fields.SpermOrgin.required ? ew.Validators.required(fields.SpermOrgin.caption) : null], fields.SpermOrgin.isInvalid],
        ["State", [fields.State.required ? ew.Validators.required(fields.State.caption) : null], fields.State.isInvalid],
        ["Origin", [fields.Origin.required ? ew.Validators.required(fields.Origin.caption) : null], fields.Origin.isInvalid],
        ["MACS", [fields.MACS.required ? ew.Validators.required(fields.MACS.caption) : null], fields.MACS.isInvalid],
        ["Technique", [fields.Technique.required ? ew.Validators.required(fields.Technique.caption) : null], fields.Technique.isInvalid],
        ["PgdPlanning", [fields.PgdPlanning.required ? ew.Validators.required(fields.PgdPlanning.caption) : null], fields.PgdPlanning.isInvalid],
        ["IMSI", [fields.IMSI.required ? ew.Validators.required(fields.IMSI.caption) : null], fields.IMSI.isInvalid],
        ["SequentialCulture", [fields.SequentialCulture.required ? ew.Validators.required(fields.SequentialCulture.caption) : null], fields.SequentialCulture.isInvalid],
        ["TimeLapse", [fields.TimeLapse.required ? ew.Validators.required(fields.TimeLapse.caption) : null], fields.TimeLapse.isInvalid],
        ["AH", [fields.AH.required ? ew.Validators.required(fields.AH.caption) : null], fields.AH.isInvalid],
        ["Weight", [fields.Weight.required ? ew.Validators.required(fields.Weight.caption) : null], fields.Weight.isInvalid],
        ["BMI", [fields.BMI.required ? ew.Validators.required(fields.BMI.caption) : null], fields.BMI.isInvalid],
        ["MaleIndications", [fields.MaleIndications.required ? ew.Validators.required(fields.MaleIndications.caption) : null], fields.MaleIndications.isInvalid],
        ["FemaleIndications", [fields.FemaleIndications.required ? ew.Validators.required(fields.FemaleIndications.caption) : null], fields.FemaleIndications.isInvalid],
        ["UseOfThe", [fields.UseOfThe.required ? ew.Validators.required(fields.UseOfThe.caption) : null], fields.UseOfThe.isInvalid],
        ["Ectopic", [fields.Ectopic.required ? ew.Validators.required(fields.Ectopic.caption) : null], fields.Ectopic.isInvalid],
        ["Heterotopic", [fields.Heterotopic.required ? ew.Validators.required(fields.Heterotopic.caption) : null], fields.Heterotopic.isInvalid],
        ["TransferDFE", [fields.TransferDFE.required ? ew.Validators.required(fields.TransferDFE.caption) : null], fields.TransferDFE.isInvalid],
        ["Evolutive", [fields.Evolutive.required ? ew.Validators.required(fields.Evolutive.caption) : null], fields.Evolutive.isInvalid],
        ["Number", [fields.Number.required ? ew.Validators.required(fields.Number.caption) : null], fields.Number.isInvalid],
        ["SequentialCult", [fields.SequentialCult.required ? ew.Validators.required(fields.SequentialCult.caption) : null], fields.SequentialCult.isInvalid],
        ["TineLapse", [fields.TineLapse.required ? ew.Validators.required(fields.TineLapse.caption) : null], fields.TineLapse.isInvalid],
        ["PatientName", [fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["PatientID", [fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["PartnerName", [fields.PartnerName.required ? ew.Validators.required(fields.PartnerName.caption) : null], fields.PartnerName.isInvalid],
        ["PartnerID", [fields.PartnerID.required ? ew.Validators.required(fields.PartnerID.caption) : null], fields.PartnerID.isInvalid],
        ["WifeCell", [fields.WifeCell.required ? ew.Validators.required(fields.WifeCell.caption) : null], fields.WifeCell.isInvalid],
        ["HusbandCell", [fields.HusbandCell.required ? ew.Validators.required(fields.HusbandCell.caption) : null], fields.HusbandCell.isInvalid],
        ["CoupleID", [fields.CoupleID.required ? ew.Validators.required(fields.CoupleID.caption) : null], fields.CoupleID.isInvalid],
        ["IVFCycleNO", [fields.IVFCycleNO.required ? ew.Validators.required(fields.IVFCycleNO.caption) : null], fields.IVFCycleNO.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_treatment_planedit,
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
    fivf_treatment_planedit.validate = function () {
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
    fivf_treatment_planedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_treatment_planedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fivf_treatment_planedit");
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
<form name="fivf_treatment_planedit" id="fivf_treatment_planedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_treatment_plan">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_ivf_treatment_plan_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <div id="r_RIDNO" class="form-group row">
        <label id="elh_ivf_treatment_plan_RIDNO" for="x_RIDNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RIDNO->caption() ?><?= $Page->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_RIDNO">
<input type="<?= $Page->RIDNO->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?= HtmlEncode($Page->RIDNO->getPlaceHolder()) ?>" value="<?= $Page->RIDNO->EditValue ?>"<?= $Page->RIDNO->editAttributes() ?> aria-describedby="x_RIDNO_help">
<?= $Page->RIDNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_treatment_plan_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_ivf_treatment_plan_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
    <div id="r_treatment_status" class="form-group row">
        <label id="elh_ivf_treatment_plan_treatment_status" for="x_treatment_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->treatment_status->caption() ?><?= $Page->treatment_status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->treatment_status->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_treatment_status">
<input type="<?= $Page->treatment_status->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_treatment_status" name="x_treatment_status" id="x_treatment_status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->treatment_status->getPlaceHolder()) ?>" value="<?= $Page->treatment_status->EditValue ?>"<?= $Page->treatment_status->editAttributes() ?> aria-describedby="x_treatment_status_help">
<?= $Page->treatment_status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->treatment_status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
    <div id="r_ARTCYCLE" class="form-group row">
        <label id="elh_ivf_treatment_plan_ARTCYCLE" for="x_ARTCYCLE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ARTCYCLE->caption() ?><?= $Page->ARTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ARTCYCLE->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_ARTCYCLE">
<input type="<?= $Page->ARTCYCLE->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" name="x_ARTCYCLE" id="x_ARTCYCLE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ARTCYCLE->getPlaceHolder()) ?>" value="<?= $Page->ARTCYCLE->EditValue ?>"<?= $Page->ARTCYCLE->editAttributes() ?> aria-describedby="x_ARTCYCLE_help">
<?= $Page->ARTCYCLE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ARTCYCLE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
    <div id="r_RESULT" class="form-group row">
        <label id="elh_ivf_treatment_plan_RESULT" for="x_RESULT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RESULT->caption() ?><?= $Page->RESULT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RESULT->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_RESULT">
<input type="<?= $Page->RESULT->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_RESULT" name="x_RESULT" id="x_RESULT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RESULT->getPlaceHolder()) ?>" value="<?= $Page->RESULT->EditValue ?>"<?= $Page->RESULT->editAttributes() ?> aria-describedby="x_RESULT_help">
<?= $Page->RESULT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RESULT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_ivf_treatment_plan_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_ivf_treatment_plan_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_ivf_treatment_plan_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_treatment_planedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_treatment_planedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_ivf_treatment_plan_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_ivf_treatment_plan_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_treatment_planedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_treatment_planedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
    <div id="r_TreatmentStartDate" class="form-group row">
        <label id="elh_ivf_treatment_plan_TreatmentStartDate" for="x_TreatmentStartDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TreatmentStartDate->caption() ?><?= $Page->TreatmentStartDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TreatmentStartDate->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_TreatmentStartDate">
<input type="<?= $Page->TreatmentStartDate->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" name="x_TreatmentStartDate" id="x_TreatmentStartDate" placeholder="<?= HtmlEncode($Page->TreatmentStartDate->getPlaceHolder()) ?>" value="<?= $Page->TreatmentStartDate->EditValue ?>"<?= $Page->TreatmentStartDate->editAttributes() ?> aria-describedby="x_TreatmentStartDate_help">
<?= $Page->TreatmentStartDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TreatmentStartDate->getErrorMessage() ?></div>
<?php if (!$Page->TreatmentStartDate->ReadOnly && !$Page->TreatmentStartDate->Disabled && !isset($Page->TreatmentStartDate->EditAttrs["readonly"]) && !isset($Page->TreatmentStartDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_treatment_planedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_treatment_planedit", "x_TreatmentStartDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TreatementStopDate->Visible) { // TreatementStopDate ?>
    <div id="r_TreatementStopDate" class="form-group row">
        <label id="elh_ivf_treatment_plan_TreatementStopDate" for="x_TreatementStopDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TreatementStopDate->caption() ?><?= $Page->TreatementStopDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TreatementStopDate->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_TreatementStopDate">
<input type="<?= $Page->TreatementStopDate->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_TreatementStopDate" name="x_TreatementStopDate" id="x_TreatementStopDate" placeholder="<?= HtmlEncode($Page->TreatementStopDate->getPlaceHolder()) ?>" value="<?= $Page->TreatementStopDate->EditValue ?>"<?= $Page->TreatementStopDate->editAttributes() ?> aria-describedby="x_TreatementStopDate_help">
<?= $Page->TreatementStopDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TreatementStopDate->getErrorMessage() ?></div>
<?php if (!$Page->TreatementStopDate->ReadOnly && !$Page->TreatementStopDate->Disabled && !isset($Page->TreatementStopDate->EditAttrs["readonly"]) && !isset($Page->TreatementStopDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_treatment_planedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_treatment_planedit", "x_TreatementStopDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TypePatient->Visible) { // TypePatient ?>
    <div id="r_TypePatient" class="form-group row">
        <label id="elh_ivf_treatment_plan_TypePatient" for="x_TypePatient" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TypePatient->caption() ?><?= $Page->TypePatient->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TypePatient->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_TypePatient">
<input type="<?= $Page->TypePatient->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_TypePatient" name="x_TypePatient" id="x_TypePatient" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TypePatient->getPlaceHolder()) ?>" value="<?= $Page->TypePatient->EditValue ?>"<?= $Page->TypePatient->editAttributes() ?> aria-describedby="x_TypePatient_help">
<?= $Page->TypePatient->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TypePatient->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
    <div id="r_Treatment" class="form-group row">
        <label id="elh_ivf_treatment_plan_Treatment" for="x_Treatment" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Treatment->caption() ?><?= $Page->Treatment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Treatment->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Treatment">
<input type="<?= $Page->Treatment->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_Treatment" name="x_Treatment" id="x_Treatment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Treatment->getPlaceHolder()) ?>" value="<?= $Page->Treatment->EditValue ?>"<?= $Page->Treatment->editAttributes() ?> aria-describedby="x_Treatment_help">
<?= $Page->Treatment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Treatment->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TreatmentTec->Visible) { // TreatmentTec ?>
    <div id="r_TreatmentTec" class="form-group row">
        <label id="elh_ivf_treatment_plan_TreatmentTec" for="x_TreatmentTec" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TreatmentTec->caption() ?><?= $Page->TreatmentTec->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TreatmentTec->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_TreatmentTec">
<input type="<?= $Page->TreatmentTec->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="x_TreatmentTec" id="x_TreatmentTec" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TreatmentTec->getPlaceHolder()) ?>" value="<?= $Page->TreatmentTec->EditValue ?>"<?= $Page->TreatmentTec->editAttributes() ?> aria-describedby="x_TreatmentTec_help">
<?= $Page->TreatmentTec->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TreatmentTec->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TypeOfCycle->Visible) { // TypeOfCycle ?>
    <div id="r_TypeOfCycle" class="form-group row">
        <label id="elh_ivf_treatment_plan_TypeOfCycle" for="x_TypeOfCycle" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TypeOfCycle->caption() ?><?= $Page->TypeOfCycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TypeOfCycle->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_TypeOfCycle">
<input type="<?= $Page->TypeOfCycle->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" name="x_TypeOfCycle" id="x_TypeOfCycle" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TypeOfCycle->getPlaceHolder()) ?>" value="<?= $Page->TypeOfCycle->EditValue ?>"<?= $Page->TypeOfCycle->editAttributes() ?> aria-describedby="x_TypeOfCycle_help">
<?= $Page->TypeOfCycle->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TypeOfCycle->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SpermOrgin->Visible) { // SpermOrgin ?>
    <div id="r_SpermOrgin" class="form-group row">
        <label id="elh_ivf_treatment_plan_SpermOrgin" for="x_SpermOrgin" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SpermOrgin->caption() ?><?= $Page->SpermOrgin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SpermOrgin->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_SpermOrgin">
<input type="<?= $Page->SpermOrgin->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" name="x_SpermOrgin" id="x_SpermOrgin" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SpermOrgin->getPlaceHolder()) ?>" value="<?= $Page->SpermOrgin->EditValue ?>"<?= $Page->SpermOrgin->editAttributes() ?> aria-describedby="x_SpermOrgin_help">
<?= $Page->SpermOrgin->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SpermOrgin->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <div id="r_State" class="form-group row">
        <label id="elh_ivf_treatment_plan_State" for="x_State" class="<?= $Page->LeftColumnClass ?>"><?= $Page->State->caption() ?><?= $Page->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->State->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_State">
<input type="<?= $Page->State->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->State->getPlaceHolder()) ?>" value="<?= $Page->State->EditValue ?>"<?= $Page->State->editAttributes() ?> aria-describedby="x_State_help">
<?= $Page->State->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->State->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
    <div id="r_Origin" class="form-group row">
        <label id="elh_ivf_treatment_plan_Origin" for="x_Origin" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Origin->caption() ?><?= $Page->Origin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Origin->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Origin">
<input type="<?= $Page->Origin->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_Origin" name="x_Origin" id="x_Origin" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Origin->getPlaceHolder()) ?>" value="<?= $Page->Origin->EditValue ?>"<?= $Page->Origin->editAttributes() ?> aria-describedby="x_Origin_help">
<?= $Page->Origin->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Origin->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MACS->Visible) { // MACS ?>
    <div id="r_MACS" class="form-group row">
        <label id="elh_ivf_treatment_plan_MACS" for="x_MACS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MACS->caption() ?><?= $Page->MACS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MACS->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_MACS">
<input type="<?= $Page->MACS->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_MACS" name="x_MACS" id="x_MACS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MACS->getPlaceHolder()) ?>" value="<?= $Page->MACS->EditValue ?>"<?= $Page->MACS->editAttributes() ?> aria-describedby="x_MACS_help">
<?= $Page->MACS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MACS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Technique->Visible) { // Technique ?>
    <div id="r_Technique" class="form-group row">
        <label id="elh_ivf_treatment_plan_Technique" for="x_Technique" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Technique->caption() ?><?= $Page->Technique->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Technique->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Technique">
<input type="<?= $Page->Technique->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_Technique" name="x_Technique" id="x_Technique" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Technique->getPlaceHolder()) ?>" value="<?= $Page->Technique->EditValue ?>"<?= $Page->Technique->editAttributes() ?> aria-describedby="x_Technique_help">
<?= $Page->Technique->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Technique->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PgdPlanning->Visible) { // PgdPlanning ?>
    <div id="r_PgdPlanning" class="form-group row">
        <label id="elh_ivf_treatment_plan_PgdPlanning" for="x_PgdPlanning" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PgdPlanning->caption() ?><?= $Page->PgdPlanning->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PgdPlanning->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_PgdPlanning">
<input type="<?= $Page->PgdPlanning->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" name="x_PgdPlanning" id="x_PgdPlanning" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PgdPlanning->getPlaceHolder()) ?>" value="<?= $Page->PgdPlanning->EditValue ?>"<?= $Page->PgdPlanning->editAttributes() ?> aria-describedby="x_PgdPlanning_help">
<?= $Page->PgdPlanning->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PgdPlanning->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IMSI->Visible) { // IMSI ?>
    <div id="r_IMSI" class="form-group row">
        <label id="elh_ivf_treatment_plan_IMSI" for="x_IMSI" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IMSI->caption() ?><?= $Page->IMSI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IMSI->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_IMSI">
<input type="<?= $Page->IMSI->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_IMSI" name="x_IMSI" id="x_IMSI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IMSI->getPlaceHolder()) ?>" value="<?= $Page->IMSI->EditValue ?>"<?= $Page->IMSI->editAttributes() ?> aria-describedby="x_IMSI_help">
<?= $Page->IMSI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IMSI->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SequentialCulture->Visible) { // SequentialCulture ?>
    <div id="r_SequentialCulture" class="form-group row">
        <label id="elh_ivf_treatment_plan_SequentialCulture" for="x_SequentialCulture" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SequentialCulture->caption() ?><?= $Page->SequentialCulture->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SequentialCulture->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_SequentialCulture">
<input type="<?= $Page->SequentialCulture->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="x_SequentialCulture" id="x_SequentialCulture" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SequentialCulture->getPlaceHolder()) ?>" value="<?= $Page->SequentialCulture->EditValue ?>"<?= $Page->SequentialCulture->editAttributes() ?> aria-describedby="x_SequentialCulture_help">
<?= $Page->SequentialCulture->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SequentialCulture->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TimeLapse->Visible) { // TimeLapse ?>
    <div id="r_TimeLapse" class="form-group row">
        <label id="elh_ivf_treatment_plan_TimeLapse" for="x_TimeLapse" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TimeLapse->caption() ?><?= $Page->TimeLapse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TimeLapse->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_TimeLapse">
<input type="<?= $Page->TimeLapse->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="x_TimeLapse" id="x_TimeLapse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TimeLapse->getPlaceHolder()) ?>" value="<?= $Page->TimeLapse->EditValue ?>"<?= $Page->TimeLapse->editAttributes() ?> aria-describedby="x_TimeLapse_help">
<?= $Page->TimeLapse->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TimeLapse->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AH->Visible) { // AH ?>
    <div id="r_AH" class="form-group row">
        <label id="elh_ivf_treatment_plan_AH" for="x_AH" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AH->caption() ?><?= $Page->AH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AH->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_AH">
<input type="<?= $Page->AH->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_AH" name="x_AH" id="x_AH" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AH->getPlaceHolder()) ?>" value="<?= $Page->AH->EditValue ?>"<?= $Page->AH->editAttributes() ?> aria-describedby="x_AH_help">
<?= $Page->AH->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AH->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Weight->Visible) { // Weight ?>
    <div id="r_Weight" class="form-group row">
        <label id="elh_ivf_treatment_plan_Weight" for="x_Weight" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Weight->caption() ?><?= $Page->Weight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Weight->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Weight">
<input type="<?= $Page->Weight->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_Weight" name="x_Weight" id="x_Weight" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Weight->getPlaceHolder()) ?>" value="<?= $Page->Weight->EditValue ?>"<?= $Page->Weight->editAttributes() ?> aria-describedby="x_Weight_help">
<?= $Page->Weight->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Weight->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BMI->Visible) { // BMI ?>
    <div id="r_BMI" class="form-group row">
        <label id="elh_ivf_treatment_plan_BMI" for="x_BMI" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BMI->caption() ?><?= $Page->BMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BMI->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_BMI">
<input type="<?= $Page->BMI->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_BMI" name="x_BMI" id="x_BMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BMI->getPlaceHolder()) ?>" value="<?= $Page->BMI->EditValue ?>"<?= $Page->BMI->editAttributes() ?> aria-describedby="x_BMI_help">
<?= $Page->BMI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BMI->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MaleIndications->Visible) { // MaleIndications ?>
    <div id="r_MaleIndications" class="form-group row">
        <label id="elh_ivf_treatment_plan_MaleIndications" for="x_MaleIndications" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MaleIndications->caption() ?><?= $Page->MaleIndications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MaleIndications->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_MaleIndications">
<input type="<?= $Page->MaleIndications->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_MaleIndications" name="x_MaleIndications" id="x_MaleIndications" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MaleIndications->getPlaceHolder()) ?>" value="<?= $Page->MaleIndications->EditValue ?>"<?= $Page->MaleIndications->editAttributes() ?> aria-describedby="x_MaleIndications_help">
<?= $Page->MaleIndications->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MaleIndications->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FemaleIndications->Visible) { // FemaleIndications ?>
    <div id="r_FemaleIndications" class="form-group row">
        <label id="elh_ivf_treatment_plan_FemaleIndications" for="x_FemaleIndications" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FemaleIndications->caption() ?><?= $Page->FemaleIndications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FemaleIndications->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_FemaleIndications">
<input type="<?= $Page->FemaleIndications->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" name="x_FemaleIndications" id="x_FemaleIndications" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FemaleIndications->getPlaceHolder()) ?>" value="<?= $Page->FemaleIndications->EditValue ?>"<?= $Page->FemaleIndications->editAttributes() ?> aria-describedby="x_FemaleIndications_help">
<?= $Page->FemaleIndications->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FemaleIndications->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UseOfThe->Visible) { // UseOfThe ?>
    <div id="r_UseOfThe" class="form-group row">
        <label id="elh_ivf_treatment_plan_UseOfThe" for="x_UseOfThe" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UseOfThe->caption() ?><?= $Page->UseOfThe->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UseOfThe->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_UseOfThe">
<input type="<?= $Page->UseOfThe->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_UseOfThe" name="x_UseOfThe" id="x_UseOfThe" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UseOfThe->getPlaceHolder()) ?>" value="<?= $Page->UseOfThe->EditValue ?>"<?= $Page->UseOfThe->editAttributes() ?> aria-describedby="x_UseOfThe_help">
<?= $Page->UseOfThe->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UseOfThe->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Ectopic->Visible) { // Ectopic ?>
    <div id="r_Ectopic" class="form-group row">
        <label id="elh_ivf_treatment_plan_Ectopic" for="x_Ectopic" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Ectopic->caption() ?><?= $Page->Ectopic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Ectopic->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Ectopic">
<input type="<?= $Page->Ectopic->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_Ectopic" name="x_Ectopic" id="x_Ectopic" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Ectopic->getPlaceHolder()) ?>" value="<?= $Page->Ectopic->EditValue ?>"<?= $Page->Ectopic->editAttributes() ?> aria-describedby="x_Ectopic_help">
<?= $Page->Ectopic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Ectopic->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Heterotopic->Visible) { // Heterotopic ?>
    <div id="r_Heterotopic" class="form-group row">
        <label id="elh_ivf_treatment_plan_Heterotopic" for="x_Heterotopic" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Heterotopic->caption() ?><?= $Page->Heterotopic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Heterotopic->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Heterotopic">
<input type="<?= $Page->Heterotopic->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_Heterotopic" name="x_Heterotopic" id="x_Heterotopic" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Heterotopic->getPlaceHolder()) ?>" value="<?= $Page->Heterotopic->EditValue ?>"<?= $Page->Heterotopic->editAttributes() ?> aria-describedby="x_Heterotopic_help">
<?= $Page->Heterotopic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Heterotopic->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TransferDFE->Visible) { // TransferDFE ?>
    <div id="r_TransferDFE" class="form-group row">
        <label id="elh_ivf_treatment_plan_TransferDFE" for="x_TransferDFE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TransferDFE->caption() ?><?= $Page->TransferDFE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TransferDFE->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_TransferDFE">
<input type="<?= $Page->TransferDFE->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_TransferDFE" name="x_TransferDFE" id="x_TransferDFE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TransferDFE->getPlaceHolder()) ?>" value="<?= $Page->TransferDFE->EditValue ?>"<?= $Page->TransferDFE->editAttributes() ?> aria-describedby="x_TransferDFE_help">
<?= $Page->TransferDFE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TransferDFE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Evolutive->Visible) { // Evolutive ?>
    <div id="r_Evolutive" class="form-group row">
        <label id="elh_ivf_treatment_plan_Evolutive" for="x_Evolutive" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Evolutive->caption() ?><?= $Page->Evolutive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Evolutive->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Evolutive">
<input type="<?= $Page->Evolutive->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_Evolutive" name="x_Evolutive" id="x_Evolutive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Evolutive->getPlaceHolder()) ?>" value="<?= $Page->Evolutive->EditValue ?>"<?= $Page->Evolutive->editAttributes() ?> aria-describedby="x_Evolutive_help">
<?= $Page->Evolutive->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Evolutive->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Number->Visible) { // Number ?>
    <div id="r_Number" class="form-group row">
        <label id="elh_ivf_treatment_plan_Number" for="x_Number" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Number->caption() ?><?= $Page->Number->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Number->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_Number">
<input type="<?= $Page->Number->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_Number" name="x_Number" id="x_Number" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Number->getPlaceHolder()) ?>" value="<?= $Page->Number->EditValue ?>"<?= $Page->Number->editAttributes() ?> aria-describedby="x_Number_help">
<?= $Page->Number->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Number->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SequentialCult->Visible) { // SequentialCult ?>
    <div id="r_SequentialCult" class="form-group row">
        <label id="elh_ivf_treatment_plan_SequentialCult" for="x_SequentialCult" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SequentialCult->caption() ?><?= $Page->SequentialCult->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SequentialCult->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_SequentialCult">
<input type="<?= $Page->SequentialCult->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_SequentialCult" name="x_SequentialCult" id="x_SequentialCult" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SequentialCult->getPlaceHolder()) ?>" value="<?= $Page->SequentialCult->EditValue ?>"<?= $Page->SequentialCult->editAttributes() ?> aria-describedby="x_SequentialCult_help">
<?= $Page->SequentialCult->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SequentialCult->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TineLapse->Visible) { // TineLapse ?>
    <div id="r_TineLapse" class="form-group row">
        <label id="elh_ivf_treatment_plan_TineLapse" for="x_TineLapse" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TineLapse->caption() ?><?= $Page->TineLapse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TineLapse->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_TineLapse">
<input type="<?= $Page->TineLapse->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_TineLapse" name="x_TineLapse" id="x_TineLapse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TineLapse->getPlaceHolder()) ?>" value="<?= $Page->TineLapse->EditValue ?>"<?= $Page->TineLapse->editAttributes() ?> aria-describedby="x_TineLapse_help">
<?= $Page->TineLapse->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TineLapse->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_ivf_treatment_plan_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_ivf_treatment_plan_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_PatientID">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?> aria-describedby="x_PatientID_help">
<?= $Page->PatientID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <div id="r_PartnerName" class="form-group row">
        <label id="elh_ivf_treatment_plan_PartnerName" for="x_PartnerName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PartnerName->caption() ?><?= $Page->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_PartnerName">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?> aria-describedby="x_PartnerName_help">
<?= $Page->PartnerName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <div id="r_PartnerID" class="form-group row">
        <label id="elh_ivf_treatment_plan_PartnerID" for="x_PartnerID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PartnerID->caption() ?><?= $Page->PartnerID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_PartnerID">
<input type="<?= $Page->PartnerID->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerID->getPlaceHolder()) ?>" value="<?= $Page->PartnerID->EditValue ?>"<?= $Page->PartnerID->editAttributes() ?> aria-describedby="x_PartnerID_help">
<?= $Page->PartnerID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WifeCell->Visible) { // WifeCell ?>
    <div id="r_WifeCell" class="form-group row">
        <label id="elh_ivf_treatment_plan_WifeCell" for="x_WifeCell" class="<?= $Page->LeftColumnClass ?>"><?= $Page->WifeCell->caption() ?><?= $Page->WifeCell->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WifeCell->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_WifeCell">
<input type="<?= $Page->WifeCell->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_WifeCell" name="x_WifeCell" id="x_WifeCell" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WifeCell->getPlaceHolder()) ?>" value="<?= $Page->WifeCell->EditValue ?>"<?= $Page->WifeCell->editAttributes() ?> aria-describedby="x_WifeCell_help">
<?= $Page->WifeCell->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WifeCell->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
    <div id="r_HusbandCell" class="form-group row">
        <label id="elh_ivf_treatment_plan_HusbandCell" for="x_HusbandCell" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HusbandCell->caption() ?><?= $Page->HusbandCell->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HusbandCell->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_HusbandCell">
<input type="<?= $Page->HusbandCell->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_HusbandCell" name="x_HusbandCell" id="x_HusbandCell" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HusbandCell->getPlaceHolder()) ?>" value="<?= $Page->HusbandCell->EditValue ?>"<?= $Page->HusbandCell->editAttributes() ?> aria-describedby="x_HusbandCell_help">
<?= $Page->HusbandCell->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HusbandCell->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
    <div id="r_CoupleID" class="form-group row">
        <label id="elh_ivf_treatment_plan_CoupleID" for="x_CoupleID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CoupleID->caption() ?><?= $Page->CoupleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CoupleID->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_CoupleID">
<input type="<?= $Page->CoupleID->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CoupleID->getPlaceHolder()) ?>" value="<?= $Page->CoupleID->EditValue ?>"<?= $Page->CoupleID->editAttributes() ?> aria-describedby="x_CoupleID_help">
<?= $Page->CoupleID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CoupleID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IVFCycleNO->Visible) { // IVFCycleNO ?>
    <div id="r_IVFCycleNO" class="form-group row">
        <label id="elh_ivf_treatment_plan_IVFCycleNO" for="x_IVFCycleNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IVFCycleNO->caption() ?><?= $Page->IVFCycleNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IVFCycleNO->cellAttributes() ?>>
<span id="el_ivf_treatment_plan_IVFCycleNO">
<input type="<?= $Page->IVFCycleNO->getInputTextType() ?>" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="x_IVFCycleNO" id="x_IVFCycleNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IVFCycleNO->getPlaceHolder()) ?>" value="<?= $Page->IVFCycleNO->EditValue ?>"<?= $Page->IVFCycleNO->editAttributes() ?> aria-describedby="x_IVFCycleNO_help">
<?= $Page->IVFCycleNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IVFCycleNO->getErrorMessage() ?></div>
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
    ew.addEventHandlers("ivf_treatment_plan");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

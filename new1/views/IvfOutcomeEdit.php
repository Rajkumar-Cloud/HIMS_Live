<?php

namespace PHPMaker2021\project3;

// Page object
$IvfOutcomeEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_outcomeedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fivf_outcomeedit = currentForm = new ew.Form("fivf_outcomeedit", "edit");

    // Add fields
    var fields = ew.vars.tables.ivf_outcome.fields;
    fivf_outcomeedit.addFields([
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
        ["outcomeDate", [fields.outcomeDate.required ? ew.Validators.required(fields.outcomeDate.caption) : null, ew.Validators.datetime(0)], fields.outcomeDate.isInvalid],
        ["outcomeDay", [fields.outcomeDay.required ? ew.Validators.required(fields.outcomeDay.caption) : null, ew.Validators.datetime(0)], fields.outcomeDay.isInvalid],
        ["OPResult", [fields.OPResult.required ? ew.Validators.required(fields.OPResult.caption) : null], fields.OPResult.isInvalid],
        ["Gestation", [fields.Gestation.required ? ew.Validators.required(fields.Gestation.caption) : null], fields.Gestation.isInvalid],
        ["TransferdEmbryos", [fields.TransferdEmbryos.required ? ew.Validators.required(fields.TransferdEmbryos.caption) : null], fields.TransferdEmbryos.isInvalid],
        ["InitalOfSacs", [fields.InitalOfSacs.required ? ew.Validators.required(fields.InitalOfSacs.caption) : null], fields.InitalOfSacs.isInvalid],
        ["ImplimentationRate", [fields.ImplimentationRate.required ? ew.Validators.required(fields.ImplimentationRate.caption) : null], fields.ImplimentationRate.isInvalid],
        ["EmbryoNo", [fields.EmbryoNo.required ? ew.Validators.required(fields.EmbryoNo.caption) : null], fields.EmbryoNo.isInvalid],
        ["ExtrauterineSac", [fields.ExtrauterineSac.required ? ew.Validators.required(fields.ExtrauterineSac.caption) : null], fields.ExtrauterineSac.isInvalid],
        ["PregnancyMonozygotic", [fields.PregnancyMonozygotic.required ? ew.Validators.required(fields.PregnancyMonozygotic.caption) : null], fields.PregnancyMonozygotic.isInvalid],
        ["TypeGestation", [fields.TypeGestation.required ? ew.Validators.required(fields.TypeGestation.caption) : null], fields.TypeGestation.isInvalid],
        ["Urine", [fields.Urine.required ? ew.Validators.required(fields.Urine.caption) : null], fields.Urine.isInvalid],
        ["PTdate", [fields.PTdate.required ? ew.Validators.required(fields.PTdate.caption) : null], fields.PTdate.isInvalid],
        ["Reduced", [fields.Reduced.required ? ew.Validators.required(fields.Reduced.caption) : null], fields.Reduced.isInvalid],
        ["INduced", [fields.INduced.required ? ew.Validators.required(fields.INduced.caption) : null], fields.INduced.isInvalid],
        ["INducedDate", [fields.INducedDate.required ? ew.Validators.required(fields.INducedDate.caption) : null], fields.INducedDate.isInvalid],
        ["Miscarriage", [fields.Miscarriage.required ? ew.Validators.required(fields.Miscarriage.caption) : null], fields.Miscarriage.isInvalid],
        ["Induced1", [fields.Induced1.required ? ew.Validators.required(fields.Induced1.caption) : null], fields.Induced1.isInvalid],
        ["Type", [fields.Type.required ? ew.Validators.required(fields.Type.caption) : null], fields.Type.isInvalid],
        ["IfClinical", [fields.IfClinical.required ? ew.Validators.required(fields.IfClinical.caption) : null], fields.IfClinical.isInvalid],
        ["GADate", [fields.GADate.required ? ew.Validators.required(fields.GADate.caption) : null], fields.GADate.isInvalid],
        ["GA", [fields.GA.required ? ew.Validators.required(fields.GA.caption) : null], fields.GA.isInvalid],
        ["FoetalDeath", [fields.FoetalDeath.required ? ew.Validators.required(fields.FoetalDeath.caption) : null], fields.FoetalDeath.isInvalid],
        ["FerinatalDeath", [fields.FerinatalDeath.required ? ew.Validators.required(fields.FerinatalDeath.caption) : null], fields.FerinatalDeath.isInvalid],
        ["TidNo", [fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["Ectopic", [fields.Ectopic.required ? ew.Validators.required(fields.Ectopic.caption) : null], fields.Ectopic.isInvalid],
        ["Extra", [fields.Extra.required ? ew.Validators.required(fields.Extra.caption) : null], fields.Extra.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_outcomeedit,
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
    fivf_outcomeedit.validate = function () {
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
    fivf_outcomeedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_outcomeedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fivf_outcomeedit");
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
<form name="fivf_outcomeedit" id="fivf_outcomeedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_outcome">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_ivf_outcome_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_outcome_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_outcome" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <div id="r_RIDNO" class="form-group row">
        <label id="elh_ivf_outcome_RIDNO" for="x_RIDNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RIDNO->caption() ?><?= $Page->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el_ivf_outcome_RIDNO">
<input type="<?= $Page->RIDNO->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?= HtmlEncode($Page->RIDNO->getPlaceHolder()) ?>" value="<?= $Page->RIDNO->EditValue ?>"<?= $Page->RIDNO->editAttributes() ?> aria-describedby="x_RIDNO_help">
<?= $Page->RIDNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_outcome_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_outcome_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_ivf_outcome_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<span id="el_ivf_outcome_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
    <div id="r_treatment_status" class="form-group row">
        <label id="elh_ivf_outcome_treatment_status" for="x_treatment_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->treatment_status->caption() ?><?= $Page->treatment_status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->treatment_status->cellAttributes() ?>>
<span id="el_ivf_outcome_treatment_status">
<input type="<?= $Page->treatment_status->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_treatment_status" name="x_treatment_status" id="x_treatment_status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->treatment_status->getPlaceHolder()) ?>" value="<?= $Page->treatment_status->EditValue ?>"<?= $Page->treatment_status->editAttributes() ?> aria-describedby="x_treatment_status_help">
<?= $Page->treatment_status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->treatment_status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
    <div id="r_ARTCYCLE" class="form-group row">
        <label id="elh_ivf_outcome_ARTCYCLE" for="x_ARTCYCLE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ARTCYCLE->caption() ?><?= $Page->ARTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ARTCYCLE->cellAttributes() ?>>
<span id="el_ivf_outcome_ARTCYCLE">
<input type="<?= $Page->ARTCYCLE->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="x_ARTCYCLE" id="x_ARTCYCLE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ARTCYCLE->getPlaceHolder()) ?>" value="<?= $Page->ARTCYCLE->EditValue ?>"<?= $Page->ARTCYCLE->editAttributes() ?> aria-describedby="x_ARTCYCLE_help">
<?= $Page->ARTCYCLE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ARTCYCLE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
    <div id="r_RESULT" class="form-group row">
        <label id="elh_ivf_outcome_RESULT" for="x_RESULT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RESULT->caption() ?><?= $Page->RESULT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RESULT->cellAttributes() ?>>
<span id="el_ivf_outcome_RESULT">
<input type="<?= $Page->RESULT->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_RESULT" name="x_RESULT" id="x_RESULT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RESULT->getPlaceHolder()) ?>" value="<?= $Page->RESULT->EditValue ?>"<?= $Page->RESULT->editAttributes() ?> aria-describedby="x_RESULT_help">
<?= $Page->RESULT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RESULT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_ivf_outcome_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_ivf_outcome_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_ivf_outcome_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_ivf_outcome_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_ivf_outcome_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_ivf_outcome_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomeedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomeedit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_ivf_outcome_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_ivf_outcome_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_ivf_outcome_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_ivf_outcome_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomeedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomeedit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->outcomeDate->Visible) { // outcomeDate ?>
    <div id="r_outcomeDate" class="form-group row">
        <label id="elh_ivf_outcome_outcomeDate" for="x_outcomeDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->outcomeDate->caption() ?><?= $Page->outcomeDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->outcomeDate->cellAttributes() ?>>
<span id="el_ivf_outcome_outcomeDate">
<input type="<?= $Page->outcomeDate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_outcomeDate" name="x_outcomeDate" id="x_outcomeDate" placeholder="<?= HtmlEncode($Page->outcomeDate->getPlaceHolder()) ?>" value="<?= $Page->outcomeDate->EditValue ?>"<?= $Page->outcomeDate->editAttributes() ?> aria-describedby="x_outcomeDate_help">
<?= $Page->outcomeDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->outcomeDate->getErrorMessage() ?></div>
<?php if (!$Page->outcomeDate->ReadOnly && !$Page->outcomeDate->Disabled && !isset($Page->outcomeDate->EditAttrs["readonly"]) && !isset($Page->outcomeDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomeedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomeedit", "x_outcomeDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->outcomeDay->Visible) { // outcomeDay ?>
    <div id="r_outcomeDay" class="form-group row">
        <label id="elh_ivf_outcome_outcomeDay" for="x_outcomeDay" class="<?= $Page->LeftColumnClass ?>"><?= $Page->outcomeDay->caption() ?><?= $Page->outcomeDay->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->outcomeDay->cellAttributes() ?>>
<span id="el_ivf_outcome_outcomeDay">
<input type="<?= $Page->outcomeDay->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_outcomeDay" name="x_outcomeDay" id="x_outcomeDay" placeholder="<?= HtmlEncode($Page->outcomeDay->getPlaceHolder()) ?>" value="<?= $Page->outcomeDay->EditValue ?>"<?= $Page->outcomeDay->editAttributes() ?> aria-describedby="x_outcomeDay_help">
<?= $Page->outcomeDay->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->outcomeDay->getErrorMessage() ?></div>
<?php if (!$Page->outcomeDay->ReadOnly && !$Page->outcomeDay->Disabled && !isset($Page->outcomeDay->EditAttrs["readonly"]) && !isset($Page->outcomeDay->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomeedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomeedit", "x_outcomeDay", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OPResult->Visible) { // OPResult ?>
    <div id="r_OPResult" class="form-group row">
        <label id="elh_ivf_outcome_OPResult" for="x_OPResult" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OPResult->caption() ?><?= $Page->OPResult->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OPResult->cellAttributes() ?>>
<span id="el_ivf_outcome_OPResult">
<input type="<?= $Page->OPResult->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_OPResult" name="x_OPResult" id="x_OPResult" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OPResult->getPlaceHolder()) ?>" value="<?= $Page->OPResult->EditValue ?>"<?= $Page->OPResult->editAttributes() ?> aria-describedby="x_OPResult_help">
<?= $Page->OPResult->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OPResult->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gestation->Visible) { // Gestation ?>
    <div id="r_Gestation" class="form-group row">
        <label id="elh_ivf_outcome_Gestation" for="x_Gestation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Gestation->caption() ?><?= $Page->Gestation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gestation->cellAttributes() ?>>
<span id="el_ivf_outcome_Gestation">
<input type="<?= $Page->Gestation->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Gestation" name="x_Gestation" id="x_Gestation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gestation->getPlaceHolder()) ?>" value="<?= $Page->Gestation->EditValue ?>"<?= $Page->Gestation->editAttributes() ?> aria-describedby="x_Gestation_help">
<?= $Page->Gestation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gestation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
    <div id="r_TransferdEmbryos" class="form-group row">
        <label id="elh_ivf_outcome_TransferdEmbryos" for="x_TransferdEmbryos" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TransferdEmbryos->caption() ?><?= $Page->TransferdEmbryos->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TransferdEmbryos->cellAttributes() ?>>
<span id="el_ivf_outcome_TransferdEmbryos">
<input type="<?= $Page->TransferdEmbryos->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="x_TransferdEmbryos" id="x_TransferdEmbryos" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TransferdEmbryos->getPlaceHolder()) ?>" value="<?= $Page->TransferdEmbryos->EditValue ?>"<?= $Page->TransferdEmbryos->editAttributes() ?> aria-describedby="x_TransferdEmbryos_help">
<?= $Page->TransferdEmbryos->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TransferdEmbryos->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->InitalOfSacs->Visible) { // InitalOfSacs ?>
    <div id="r_InitalOfSacs" class="form-group row">
        <label id="elh_ivf_outcome_InitalOfSacs" for="x_InitalOfSacs" class="<?= $Page->LeftColumnClass ?>"><?= $Page->InitalOfSacs->caption() ?><?= $Page->InitalOfSacs->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InitalOfSacs->cellAttributes() ?>>
<span id="el_ivf_outcome_InitalOfSacs">
<input type="<?= $Page->InitalOfSacs->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="x_InitalOfSacs" id="x_InitalOfSacs" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->InitalOfSacs->getPlaceHolder()) ?>" value="<?= $Page->InitalOfSacs->EditValue ?>"<?= $Page->InitalOfSacs->editAttributes() ?> aria-describedby="x_InitalOfSacs_help">
<?= $Page->InitalOfSacs->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->InitalOfSacs->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ImplimentationRate->Visible) { // ImplimentationRate ?>
    <div id="r_ImplimentationRate" class="form-group row">
        <label id="elh_ivf_outcome_ImplimentationRate" for="x_ImplimentationRate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ImplimentationRate->caption() ?><?= $Page->ImplimentationRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ImplimentationRate->cellAttributes() ?>>
<span id="el_ivf_outcome_ImplimentationRate">
<input type="<?= $Page->ImplimentationRate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="x_ImplimentationRate" id="x_ImplimentationRate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ImplimentationRate->getPlaceHolder()) ?>" value="<?= $Page->ImplimentationRate->EditValue ?>"<?= $Page->ImplimentationRate->editAttributes() ?> aria-describedby="x_ImplimentationRate_help">
<?= $Page->ImplimentationRate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ImplimentationRate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
    <div id="r_EmbryoNo" class="form-group row">
        <label id="elh_ivf_outcome_EmbryoNo" for="x_EmbryoNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EmbryoNo->caption() ?><?= $Page->EmbryoNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EmbryoNo->cellAttributes() ?>>
<span id="el_ivf_outcome_EmbryoNo">
<input type="<?= $Page->EmbryoNo->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_EmbryoNo" name="x_EmbryoNo" id="x_EmbryoNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EmbryoNo->getPlaceHolder()) ?>" value="<?= $Page->EmbryoNo->EditValue ?>"<?= $Page->EmbryoNo->editAttributes() ?> aria-describedby="x_EmbryoNo_help">
<?= $Page->EmbryoNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EmbryoNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
    <div id="r_ExtrauterineSac" class="form-group row">
        <label id="elh_ivf_outcome_ExtrauterineSac" for="x_ExtrauterineSac" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ExtrauterineSac->caption() ?><?= $Page->ExtrauterineSac->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ExtrauterineSac->cellAttributes() ?>>
<span id="el_ivf_outcome_ExtrauterineSac">
<input type="<?= $Page->ExtrauterineSac->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="x_ExtrauterineSac" id="x_ExtrauterineSac" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ExtrauterineSac->getPlaceHolder()) ?>" value="<?= $Page->ExtrauterineSac->EditValue ?>"<?= $Page->ExtrauterineSac->editAttributes() ?> aria-describedby="x_ExtrauterineSac_help">
<?= $Page->ExtrauterineSac->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ExtrauterineSac->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
    <div id="r_PregnancyMonozygotic" class="form-group row">
        <label id="elh_ivf_outcome_PregnancyMonozygotic" for="x_PregnancyMonozygotic" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PregnancyMonozygotic->caption() ?><?= $Page->PregnancyMonozygotic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PregnancyMonozygotic->cellAttributes() ?>>
<span id="el_ivf_outcome_PregnancyMonozygotic">
<input type="<?= $Page->PregnancyMonozygotic->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="x_PregnancyMonozygotic" id="x_PregnancyMonozygotic" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PregnancyMonozygotic->getPlaceHolder()) ?>" value="<?= $Page->PregnancyMonozygotic->EditValue ?>"<?= $Page->PregnancyMonozygotic->editAttributes() ?> aria-describedby="x_PregnancyMonozygotic_help">
<?= $Page->PregnancyMonozygotic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PregnancyMonozygotic->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TypeGestation->Visible) { // TypeGestation ?>
    <div id="r_TypeGestation" class="form-group row">
        <label id="elh_ivf_outcome_TypeGestation" for="x_TypeGestation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TypeGestation->caption() ?><?= $Page->TypeGestation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TypeGestation->cellAttributes() ?>>
<span id="el_ivf_outcome_TypeGestation">
<input type="<?= $Page->TypeGestation->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_TypeGestation" name="x_TypeGestation" id="x_TypeGestation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TypeGestation->getPlaceHolder()) ?>" value="<?= $Page->TypeGestation->EditValue ?>"<?= $Page->TypeGestation->editAttributes() ?> aria-describedby="x_TypeGestation_help">
<?= $Page->TypeGestation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TypeGestation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Urine->Visible) { // Urine ?>
    <div id="r_Urine" class="form-group row">
        <label id="elh_ivf_outcome_Urine" for="x_Urine" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Urine->caption() ?><?= $Page->Urine->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Urine->cellAttributes() ?>>
<span id="el_ivf_outcome_Urine">
<input type="<?= $Page->Urine->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Urine" name="x_Urine" id="x_Urine" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Urine->getPlaceHolder()) ?>" value="<?= $Page->Urine->EditValue ?>"<?= $Page->Urine->editAttributes() ?> aria-describedby="x_Urine_help">
<?= $Page->Urine->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Urine->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PTdate->Visible) { // PTdate ?>
    <div id="r_PTdate" class="form-group row">
        <label id="elh_ivf_outcome_PTdate" for="x_PTdate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PTdate->caption() ?><?= $Page->PTdate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PTdate->cellAttributes() ?>>
<span id="el_ivf_outcome_PTdate">
<input type="<?= $Page->PTdate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_PTdate" name="x_PTdate" id="x_PTdate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PTdate->getPlaceHolder()) ?>" value="<?= $Page->PTdate->EditValue ?>"<?= $Page->PTdate->editAttributes() ?> aria-describedby="x_PTdate_help">
<?= $Page->PTdate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PTdate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reduced->Visible) { // Reduced ?>
    <div id="r_Reduced" class="form-group row">
        <label id="elh_ivf_outcome_Reduced" for="x_Reduced" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Reduced->caption() ?><?= $Page->Reduced->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reduced->cellAttributes() ?>>
<span id="el_ivf_outcome_Reduced">
<input type="<?= $Page->Reduced->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Reduced" name="x_Reduced" id="x_Reduced" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Reduced->getPlaceHolder()) ?>" value="<?= $Page->Reduced->EditValue ?>"<?= $Page->Reduced->editAttributes() ?> aria-describedby="x_Reduced_help">
<?= $Page->Reduced->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reduced->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->INduced->Visible) { // INduced ?>
    <div id="r_INduced" class="form-group row">
        <label id="elh_ivf_outcome_INduced" for="x_INduced" class="<?= $Page->LeftColumnClass ?>"><?= $Page->INduced->caption() ?><?= $Page->INduced->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->INduced->cellAttributes() ?>>
<span id="el_ivf_outcome_INduced">
<input type="<?= $Page->INduced->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_INduced" name="x_INduced" id="x_INduced" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->INduced->getPlaceHolder()) ?>" value="<?= $Page->INduced->EditValue ?>"<?= $Page->INduced->editAttributes() ?> aria-describedby="x_INduced_help">
<?= $Page->INduced->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->INduced->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->INducedDate->Visible) { // INducedDate ?>
    <div id="r_INducedDate" class="form-group row">
        <label id="elh_ivf_outcome_INducedDate" for="x_INducedDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->INducedDate->caption() ?><?= $Page->INducedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->INducedDate->cellAttributes() ?>>
<span id="el_ivf_outcome_INducedDate">
<input type="<?= $Page->INducedDate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_INducedDate" name="x_INducedDate" id="x_INducedDate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->INducedDate->getPlaceHolder()) ?>" value="<?= $Page->INducedDate->EditValue ?>"<?= $Page->INducedDate->editAttributes() ?> aria-describedby="x_INducedDate_help">
<?= $Page->INducedDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->INducedDate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Miscarriage->Visible) { // Miscarriage ?>
    <div id="r_Miscarriage" class="form-group row">
        <label id="elh_ivf_outcome_Miscarriage" for="x_Miscarriage" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Miscarriage->caption() ?><?= $Page->Miscarriage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Miscarriage->cellAttributes() ?>>
<span id="el_ivf_outcome_Miscarriage">
<input type="<?= $Page->Miscarriage->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Miscarriage" name="x_Miscarriage" id="x_Miscarriage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Miscarriage->getPlaceHolder()) ?>" value="<?= $Page->Miscarriage->EditValue ?>"<?= $Page->Miscarriage->editAttributes() ?> aria-describedby="x_Miscarriage_help">
<?= $Page->Miscarriage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Miscarriage->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Induced1->Visible) { // Induced1 ?>
    <div id="r_Induced1" class="form-group row">
        <label id="elh_ivf_outcome_Induced1" for="x_Induced1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Induced1->caption() ?><?= $Page->Induced1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Induced1->cellAttributes() ?>>
<span id="el_ivf_outcome_Induced1">
<input type="<?= $Page->Induced1->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Induced1" name="x_Induced1" id="x_Induced1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Induced1->getPlaceHolder()) ?>" value="<?= $Page->Induced1->EditValue ?>"<?= $Page->Induced1->editAttributes() ?> aria-describedby="x_Induced1_help">
<?= $Page->Induced1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Induced1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
    <div id="r_Type" class="form-group row">
        <label id="elh_ivf_outcome_Type" for="x_Type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Type->caption() ?><?= $Page->Type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Type->cellAttributes() ?>>
<span id="el_ivf_outcome_Type">
<input type="<?= $Page->Type->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Type" name="x_Type" id="x_Type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Type->getPlaceHolder()) ?>" value="<?= $Page->Type->EditValue ?>"<?= $Page->Type->editAttributes() ?> aria-describedby="x_Type_help">
<?= $Page->Type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Type->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IfClinical->Visible) { // IfClinical ?>
    <div id="r_IfClinical" class="form-group row">
        <label id="elh_ivf_outcome_IfClinical" for="x_IfClinical" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IfClinical->caption() ?><?= $Page->IfClinical->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IfClinical->cellAttributes() ?>>
<span id="el_ivf_outcome_IfClinical">
<input type="<?= $Page->IfClinical->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_IfClinical" name="x_IfClinical" id="x_IfClinical" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IfClinical->getPlaceHolder()) ?>" value="<?= $Page->IfClinical->EditValue ?>"<?= $Page->IfClinical->editAttributes() ?> aria-describedby="x_IfClinical_help">
<?= $Page->IfClinical->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IfClinical->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GADate->Visible) { // GADate ?>
    <div id="r_GADate" class="form-group row">
        <label id="elh_ivf_outcome_GADate" for="x_GADate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GADate->caption() ?><?= $Page->GADate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GADate->cellAttributes() ?>>
<span id="el_ivf_outcome_GADate">
<input type="<?= $Page->GADate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_GADate" name="x_GADate" id="x_GADate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GADate->getPlaceHolder()) ?>" value="<?= $Page->GADate->EditValue ?>"<?= $Page->GADate->editAttributes() ?> aria-describedby="x_GADate_help">
<?= $Page->GADate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GADate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GA->Visible) { // GA ?>
    <div id="r_GA" class="form-group row">
        <label id="elh_ivf_outcome_GA" for="x_GA" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GA->caption() ?><?= $Page->GA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GA->cellAttributes() ?>>
<span id="el_ivf_outcome_GA">
<input type="<?= $Page->GA->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_GA" name="x_GA" id="x_GA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GA->getPlaceHolder()) ?>" value="<?= $Page->GA->EditValue ?>"<?= $Page->GA->editAttributes() ?> aria-describedby="x_GA_help">
<?= $Page->GA->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GA->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FoetalDeath->Visible) { // FoetalDeath ?>
    <div id="r_FoetalDeath" class="form-group row">
        <label id="elh_ivf_outcome_FoetalDeath" for="x_FoetalDeath" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FoetalDeath->caption() ?><?= $Page->FoetalDeath->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FoetalDeath->cellAttributes() ?>>
<span id="el_ivf_outcome_FoetalDeath">
<input type="<?= $Page->FoetalDeath->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_FoetalDeath" name="x_FoetalDeath" id="x_FoetalDeath" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FoetalDeath->getPlaceHolder()) ?>" value="<?= $Page->FoetalDeath->EditValue ?>"<?= $Page->FoetalDeath->editAttributes() ?> aria-describedby="x_FoetalDeath_help">
<?= $Page->FoetalDeath->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FoetalDeath->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FerinatalDeath->Visible) { // FerinatalDeath ?>
    <div id="r_FerinatalDeath" class="form-group row">
        <label id="elh_ivf_outcome_FerinatalDeath" for="x_FerinatalDeath" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FerinatalDeath->caption() ?><?= $Page->FerinatalDeath->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FerinatalDeath->cellAttributes() ?>>
<span id="el_ivf_outcome_FerinatalDeath">
<input type="<?= $Page->FerinatalDeath->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_FerinatalDeath" name="x_FerinatalDeath" id="x_FerinatalDeath" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FerinatalDeath->getPlaceHolder()) ?>" value="<?= $Page->FerinatalDeath->EditValue ?>"<?= $Page->FerinatalDeath->editAttributes() ?> aria-describedby="x_FerinatalDeath_help">
<?= $Page->FerinatalDeath->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FerinatalDeath->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_outcome_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_outcome_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Ectopic->Visible) { // Ectopic ?>
    <div id="r_Ectopic" class="form-group row">
        <label id="elh_ivf_outcome_Ectopic" for="x_Ectopic" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Ectopic->caption() ?><?= $Page->Ectopic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Ectopic->cellAttributes() ?>>
<span id="el_ivf_outcome_Ectopic">
<input type="<?= $Page->Ectopic->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Ectopic" name="x_Ectopic" id="x_Ectopic" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Ectopic->getPlaceHolder()) ?>" value="<?= $Page->Ectopic->EditValue ?>"<?= $Page->Ectopic->editAttributes() ?> aria-describedby="x_Ectopic_help">
<?= $Page->Ectopic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Ectopic->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Extra->Visible) { // Extra ?>
    <div id="r_Extra" class="form-group row">
        <label id="elh_ivf_outcome_Extra" for="x_Extra" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Extra->caption() ?><?= $Page->Extra->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Extra->cellAttributes() ?>>
<span id="el_ivf_outcome_Extra">
<input type="<?= $Page->Extra->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Extra" name="x_Extra" id="x_Extra" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Extra->getPlaceHolder()) ?>" value="<?= $Page->Extra->EditValue ?>"<?= $Page->Extra->editAttributes() ?> aria-describedby="x_Extra_help">
<?= $Page->Extra->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Extra->getErrorMessage() ?></div>
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
    ew.addEventHandlers("ivf_outcome");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

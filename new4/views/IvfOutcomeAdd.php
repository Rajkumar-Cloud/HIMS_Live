<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfOutcomeAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_outcomeadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fivf_outcomeadd = currentForm = new ew.Form("fivf_outcomeadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_outcome")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_outcome)
        ew.vars.tables.ivf_outcome = currentTable;
    fivf_outcomeadd.addFields([
        ["RIDNO", [fields.RIDNO.visible && fields.RIDNO.required ? ew.Validators.required(fields.RIDNO.caption) : null, ew.Validators.integer], fields.RIDNO.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["treatment_status", [fields.treatment_status.visible && fields.treatment_status.required ? ew.Validators.required(fields.treatment_status.caption) : null], fields.treatment_status.isInvalid],
        ["ARTCYCLE", [fields.ARTCYCLE.visible && fields.ARTCYCLE.required ? ew.Validators.required(fields.ARTCYCLE.caption) : null], fields.ARTCYCLE.isInvalid],
        ["RESULT", [fields.RESULT.visible && fields.RESULT.required ? ew.Validators.required(fields.RESULT.caption) : null], fields.RESULT.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["outcomeDate", [fields.outcomeDate.visible && fields.outcomeDate.required ? ew.Validators.required(fields.outcomeDate.caption) : null, ew.Validators.datetime(0)], fields.outcomeDate.isInvalid],
        ["outcomeDay", [fields.outcomeDay.visible && fields.outcomeDay.required ? ew.Validators.required(fields.outcomeDay.caption) : null, ew.Validators.datetime(0)], fields.outcomeDay.isInvalid],
        ["OPResult", [fields.OPResult.visible && fields.OPResult.required ? ew.Validators.required(fields.OPResult.caption) : null], fields.OPResult.isInvalid],
        ["Gestation", [fields.Gestation.visible && fields.Gestation.required ? ew.Validators.required(fields.Gestation.caption) : null], fields.Gestation.isInvalid],
        ["TransferdEmbryos", [fields.TransferdEmbryos.visible && fields.TransferdEmbryos.required ? ew.Validators.required(fields.TransferdEmbryos.caption) : null], fields.TransferdEmbryos.isInvalid],
        ["InitalOfSacs", [fields.InitalOfSacs.visible && fields.InitalOfSacs.required ? ew.Validators.required(fields.InitalOfSacs.caption) : null], fields.InitalOfSacs.isInvalid],
        ["ImplimentationRate", [fields.ImplimentationRate.visible && fields.ImplimentationRate.required ? ew.Validators.required(fields.ImplimentationRate.caption) : null], fields.ImplimentationRate.isInvalid],
        ["EmbryoNo", [fields.EmbryoNo.visible && fields.EmbryoNo.required ? ew.Validators.required(fields.EmbryoNo.caption) : null], fields.EmbryoNo.isInvalid],
        ["ExtrauterineSac", [fields.ExtrauterineSac.visible && fields.ExtrauterineSac.required ? ew.Validators.required(fields.ExtrauterineSac.caption) : null], fields.ExtrauterineSac.isInvalid],
        ["PregnancyMonozygotic", [fields.PregnancyMonozygotic.visible && fields.PregnancyMonozygotic.required ? ew.Validators.required(fields.PregnancyMonozygotic.caption) : null], fields.PregnancyMonozygotic.isInvalid],
        ["TypeGestation", [fields.TypeGestation.visible && fields.TypeGestation.required ? ew.Validators.required(fields.TypeGestation.caption) : null], fields.TypeGestation.isInvalid],
        ["Urine", [fields.Urine.visible && fields.Urine.required ? ew.Validators.required(fields.Urine.caption) : null], fields.Urine.isInvalid],
        ["PTdate", [fields.PTdate.visible && fields.PTdate.required ? ew.Validators.required(fields.PTdate.caption) : null], fields.PTdate.isInvalid],
        ["Reduced", [fields.Reduced.visible && fields.Reduced.required ? ew.Validators.required(fields.Reduced.caption) : null], fields.Reduced.isInvalid],
        ["INduced", [fields.INduced.visible && fields.INduced.required ? ew.Validators.required(fields.INduced.caption) : null], fields.INduced.isInvalid],
        ["INducedDate", [fields.INducedDate.visible && fields.INducedDate.required ? ew.Validators.required(fields.INducedDate.caption) : null], fields.INducedDate.isInvalid],
        ["Miscarriage", [fields.Miscarriage.visible && fields.Miscarriage.required ? ew.Validators.required(fields.Miscarriage.caption) : null], fields.Miscarriage.isInvalid],
        ["Induced1", [fields.Induced1.visible && fields.Induced1.required ? ew.Validators.required(fields.Induced1.caption) : null], fields.Induced1.isInvalid],
        ["Type", [fields.Type.visible && fields.Type.required ? ew.Validators.required(fields.Type.caption) : null], fields.Type.isInvalid],
        ["IfClinical", [fields.IfClinical.visible && fields.IfClinical.required ? ew.Validators.required(fields.IfClinical.caption) : null], fields.IfClinical.isInvalid],
        ["GADate", [fields.GADate.visible && fields.GADate.required ? ew.Validators.required(fields.GADate.caption) : null], fields.GADate.isInvalid],
        ["GA", [fields.GA.visible && fields.GA.required ? ew.Validators.required(fields.GA.caption) : null], fields.GA.isInvalid],
        ["FoetalDeath", [fields.FoetalDeath.visible && fields.FoetalDeath.required ? ew.Validators.required(fields.FoetalDeath.caption) : null], fields.FoetalDeath.isInvalid],
        ["FerinatalDeath", [fields.FerinatalDeath.visible && fields.FerinatalDeath.required ? ew.Validators.required(fields.FerinatalDeath.caption) : null], fields.FerinatalDeath.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["Ectopic", [fields.Ectopic.visible && fields.Ectopic.required ? ew.Validators.required(fields.Ectopic.caption) : null], fields.Ectopic.isInvalid],
        ["Extra", [fields.Extra.visible && fields.Extra.required ? ew.Validators.required(fields.Extra.caption) : null], fields.Extra.isInvalid],
        ["Implantation", [fields.Implantation.visible && fields.Implantation.required ? ew.Validators.required(fields.Implantation.caption) : null], fields.Implantation.isInvalid],
        ["DeliveryDate", [fields.DeliveryDate.visible && fields.DeliveryDate.required ? ew.Validators.required(fields.DeliveryDate.caption) : null, ew.Validators.datetime(7)], fields.DeliveryDate.isInvalid],
        ["BabyDetails", [fields.BabyDetails.visible && fields.BabyDetails.required ? ew.Validators.required(fields.BabyDetails.caption) : null], fields.BabyDetails.isInvalid],
        ["LSCSNormal", [fields.LSCSNormal.visible && fields.LSCSNormal.required ? ew.Validators.required(fields.LSCSNormal.caption) : null], fields.LSCSNormal.isInvalid],
        ["Notes", [fields.Notes.visible && fields.Notes.required ? ew.Validators.required(fields.Notes.caption) : null], fields.Notes.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_outcomeadd,
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
    fivf_outcomeadd.validate = function () {
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
    fivf_outcomeadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_outcomeadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_outcomeadd.lists.Gestation = <?= $Page->Gestation->toClientList($Page) ?>;
    fivf_outcomeadd.lists.Urine = <?= $Page->Urine->toClientList($Page) ?>;
    fivf_outcomeadd.lists.Miscarriage = <?= $Page->Miscarriage->toClientList($Page) ?>;
    fivf_outcomeadd.lists.Induced1 = <?= $Page->Induced1->toClientList($Page) ?>;
    fivf_outcomeadd.lists.Type = <?= $Page->Type->toClientList($Page) ?>;
    fivf_outcomeadd.lists.FoetalDeath = <?= $Page->FoetalDeath->toClientList($Page) ?>;
    fivf_outcomeadd.lists.FerinatalDeath = <?= $Page->FerinatalDeath->toClientList($Page) ?>;
    fivf_outcomeadd.lists.Ectopic = <?= $Page->Ectopic->toClientList($Page) ?>;
    fivf_outcomeadd.lists.Extra = <?= $Page->Extra->toClientList($Page) ?>;
    loadjs.done("fivf_outcomeadd");
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
<form name="fivf_outcomeadd" id="fivf_outcomeadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_outcome">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "ivf_treatment_plan") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ivf_treatment_plan">
<input type="hidden" name="fk_RIDNO" value="<?= HtmlEncode($Page->RIDNO->getSessionValue()) ?>">
<input type="hidden" name="fk_Name" value="<?= HtmlEncode($Page->Name->getSessionValue()) ?>">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->TidNo->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <div id="r_RIDNO" class="form-group row">
        <label id="elh_ivf_outcome_RIDNO" for="x_RIDNO" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_RIDNO"><?= $Page->RIDNO->caption() ?><?= $Page->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNO->cellAttributes() ?>>
<?php if ($Page->RIDNO->getSessionValue() != "") { ?>
<template id="tpx_ivf_outcome_RIDNO"><span id="el_ivf_outcome_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RIDNO->getDisplayValue($Page->RIDNO->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_RIDNO" name="x_RIDNO" value="<?= HtmlEncode($Page->RIDNO->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_ivf_outcome_RIDNO"><span id="el_ivf_outcome_RIDNO">
<input type="<?= $Page->RIDNO->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?= HtmlEncode($Page->RIDNO->getPlaceHolder()) ?>" value="<?= $Page->RIDNO->EditValue ?>"<?= $Page->RIDNO->editAttributes() ?> aria-describedby="x_RIDNO_help">
<?= $Page->RIDNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNO->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_outcome_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_Name"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<?php if ($Page->Name->getSessionValue() != "") { ?>
<template id="tpx_ivf_outcome_Name"><span id="el_ivf_outcome_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Name->getDisplayValue($Page->Name->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_Name" name="x_Name" value="<?= HtmlEncode($Page->Name->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_ivf_outcome_Name"><span id="el_ivf_outcome_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_ivf_outcome_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_Age"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Age"><span id="el_ivf_outcome_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
    <div id="r_treatment_status" class="form-group row">
        <label id="elh_ivf_outcome_treatment_status" for="x_treatment_status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_treatment_status"><?= $Page->treatment_status->caption() ?><?= $Page->treatment_status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->treatment_status->cellAttributes() ?>>
<template id="tpx_ivf_outcome_treatment_status"><span id="el_ivf_outcome_treatment_status">
<input type="<?= $Page->treatment_status->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_treatment_status" name="x_treatment_status" id="x_treatment_status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->treatment_status->getPlaceHolder()) ?>" value="<?= $Page->treatment_status->EditValue ?>"<?= $Page->treatment_status->editAttributes() ?> aria-describedby="x_treatment_status_help">
<?= $Page->treatment_status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->treatment_status->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
    <div id="r_ARTCYCLE" class="form-group row">
        <label id="elh_ivf_outcome_ARTCYCLE" for="x_ARTCYCLE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_ARTCYCLE"><?= $Page->ARTCYCLE->caption() ?><?= $Page->ARTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ARTCYCLE->cellAttributes() ?>>
<template id="tpx_ivf_outcome_ARTCYCLE"><span id="el_ivf_outcome_ARTCYCLE">
<input type="<?= $Page->ARTCYCLE->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_ARTCYCLE" name="x_ARTCYCLE" id="x_ARTCYCLE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ARTCYCLE->getPlaceHolder()) ?>" value="<?= $Page->ARTCYCLE->EditValue ?>"<?= $Page->ARTCYCLE->editAttributes() ?> aria-describedby="x_ARTCYCLE_help">
<?= $Page->ARTCYCLE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ARTCYCLE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
    <div id="r_RESULT" class="form-group row">
        <label id="elh_ivf_outcome_RESULT" for="x_RESULT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_RESULT"><?= $Page->RESULT->caption() ?><?= $Page->RESULT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RESULT->cellAttributes() ?>>
<template id="tpx_ivf_outcome_RESULT"><span id="el_ivf_outcome_RESULT">
<input type="<?= $Page->RESULT->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_RESULT" name="x_RESULT" id="x_RESULT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RESULT->getPlaceHolder()) ?>" value="<?= $Page->RESULT->EditValue ?>"<?= $Page->RESULT->editAttributes() ?> aria-describedby="x_RESULT_help">
<?= $Page->RESULT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RESULT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_ivf_outcome_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_status"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<template id="tpx_ivf_outcome_status"><span id="el_ivf_outcome_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_ivf_outcome_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_createdby"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_ivf_outcome_createdby"><span id="el_ivf_outcome_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_ivf_outcome_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_createddatetime"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_ivf_outcome_createddatetime"><span id="el_ivf_outcome_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomeadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomeadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_ivf_outcome_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_modifiedby"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_ivf_outcome_modifiedby"><span id="el_ivf_outcome_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_ivf_outcome_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_modifieddatetime"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_ivf_outcome_modifieddatetime"><span id="el_ivf_outcome_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomeadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomeadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->outcomeDate->Visible) { // outcomeDate ?>
    <div id="r_outcomeDate" class="form-group row">
        <label id="elh_ivf_outcome_outcomeDate" for="x_outcomeDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_outcomeDate"><?= $Page->outcomeDate->caption() ?><?= $Page->outcomeDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->outcomeDate->cellAttributes() ?>>
<template id="tpx_ivf_outcome_outcomeDate"><span id="el_ivf_outcome_outcomeDate">
<input type="<?= $Page->outcomeDate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_outcomeDate" name="x_outcomeDate" id="x_outcomeDate" placeholder="<?= HtmlEncode($Page->outcomeDate->getPlaceHolder()) ?>" value="<?= $Page->outcomeDate->EditValue ?>"<?= $Page->outcomeDate->editAttributes() ?> aria-describedby="x_outcomeDate_help">
<?= $Page->outcomeDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->outcomeDate->getErrorMessage() ?></div>
<?php if (!$Page->outcomeDate->ReadOnly && !$Page->outcomeDate->Disabled && !isset($Page->outcomeDate->EditAttrs["readonly"]) && !isset($Page->outcomeDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomeadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomeadd", "x_outcomeDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->outcomeDay->Visible) { // outcomeDay ?>
    <div id="r_outcomeDay" class="form-group row">
        <label id="elh_ivf_outcome_outcomeDay" for="x_outcomeDay" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_outcomeDay"><?= $Page->outcomeDay->caption() ?><?= $Page->outcomeDay->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->outcomeDay->cellAttributes() ?>>
<template id="tpx_ivf_outcome_outcomeDay"><span id="el_ivf_outcome_outcomeDay">
<input type="<?= $Page->outcomeDay->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_outcomeDay" name="x_outcomeDay" id="x_outcomeDay" placeholder="<?= HtmlEncode($Page->outcomeDay->getPlaceHolder()) ?>" value="<?= $Page->outcomeDay->EditValue ?>"<?= $Page->outcomeDay->editAttributes() ?> aria-describedby="x_outcomeDay_help">
<?= $Page->outcomeDay->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->outcomeDay->getErrorMessage() ?></div>
<?php if (!$Page->outcomeDay->ReadOnly && !$Page->outcomeDay->Disabled && !isset($Page->outcomeDay->EditAttrs["readonly"]) && !isset($Page->outcomeDay->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomeadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomeadd", "x_outcomeDay", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OPResult->Visible) { // OPResult ?>
    <div id="r_OPResult" class="form-group row">
        <label id="elh_ivf_outcome_OPResult" for="x_OPResult" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_OPResult"><?= $Page->OPResult->caption() ?><?= $Page->OPResult->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OPResult->cellAttributes() ?>>
<template id="tpx_ivf_outcome_OPResult"><span id="el_ivf_outcome_OPResult">
<input type="<?= $Page->OPResult->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_OPResult" name="x_OPResult" id="x_OPResult" size="4" maxlength="45" placeholder="<?= HtmlEncode($Page->OPResult->getPlaceHolder()) ?>" value="<?= $Page->OPResult->EditValue ?>"<?= $Page->OPResult->editAttributes() ?> aria-describedby="x_OPResult_help">
<?= $Page->OPResult->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OPResult->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gestation->Visible) { // Gestation ?>
    <div id="r_Gestation" class="form-group row">
        <label id="elh_ivf_outcome_Gestation" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_Gestation"><?= $Page->Gestation->caption() ?><?= $Page->Gestation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gestation->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Gestation"><span id="el_ivf_outcome_Gestation">
<template id="tp_x_Gestation">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Gestation" name="x_Gestation" id="x_Gestation"<?= $Page->Gestation->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Gestation" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Gestation"
    name="x_Gestation"
    value="<?= HtmlEncode($Page->Gestation->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_Gestation"
    data-target="dsl_x_Gestation"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Gestation->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Gestation"
    data-value-separator="<?= $Page->Gestation->displayValueSeparatorAttribute() ?>"
    <?= $Page->Gestation->editAttributes() ?>>
<?= $Page->Gestation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gestation->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
    <div id="r_TransferdEmbryos" class="form-group row">
        <label id="elh_ivf_outcome_TransferdEmbryos" for="x_TransferdEmbryos" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_TransferdEmbryos"><?= $Page->TransferdEmbryos->caption() ?><?= $Page->TransferdEmbryos->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TransferdEmbryos->cellAttributes() ?>>
<template id="tpx_ivf_outcome_TransferdEmbryos"><span id="el_ivf_outcome_TransferdEmbryos">
<input type="<?= $Page->TransferdEmbryos->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_TransferdEmbryos" name="x_TransferdEmbryos" id="x_TransferdEmbryos" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TransferdEmbryos->getPlaceHolder()) ?>" value="<?= $Page->TransferdEmbryos->EditValue ?>"<?= $Page->TransferdEmbryos->editAttributes() ?> aria-describedby="x_TransferdEmbryos_help">
<?= $Page->TransferdEmbryos->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TransferdEmbryos->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->InitalOfSacs->Visible) { // InitalOfSacs ?>
    <div id="r_InitalOfSacs" class="form-group row">
        <label id="elh_ivf_outcome_InitalOfSacs" for="x_InitalOfSacs" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_InitalOfSacs"><?= $Page->InitalOfSacs->caption() ?><?= $Page->InitalOfSacs->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InitalOfSacs->cellAttributes() ?>>
<template id="tpx_ivf_outcome_InitalOfSacs"><span id="el_ivf_outcome_InitalOfSacs">
<input type="<?= $Page->InitalOfSacs->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_InitalOfSacs" name="x_InitalOfSacs" id="x_InitalOfSacs" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->InitalOfSacs->getPlaceHolder()) ?>" value="<?= $Page->InitalOfSacs->EditValue ?>"<?= $Page->InitalOfSacs->editAttributes() ?> aria-describedby="x_InitalOfSacs_help">
<?= $Page->InitalOfSacs->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->InitalOfSacs->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ImplimentationRate->Visible) { // ImplimentationRate ?>
    <div id="r_ImplimentationRate" class="form-group row">
        <label id="elh_ivf_outcome_ImplimentationRate" for="x_ImplimentationRate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_ImplimentationRate"><?= $Page->ImplimentationRate->caption() ?><?= $Page->ImplimentationRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ImplimentationRate->cellAttributes() ?>>
<template id="tpx_ivf_outcome_ImplimentationRate"><span id="el_ivf_outcome_ImplimentationRate">
<input type="<?= $Page->ImplimentationRate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_ImplimentationRate" name="x_ImplimentationRate" id="x_ImplimentationRate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ImplimentationRate->getPlaceHolder()) ?>" value="<?= $Page->ImplimentationRate->EditValue ?>"<?= $Page->ImplimentationRate->editAttributes() ?> aria-describedby="x_ImplimentationRate_help">
<?= $Page->ImplimentationRate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ImplimentationRate->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
    <div id="r_EmbryoNo" class="form-group row">
        <label id="elh_ivf_outcome_EmbryoNo" for="x_EmbryoNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_EmbryoNo"><?= $Page->EmbryoNo->caption() ?><?= $Page->EmbryoNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EmbryoNo->cellAttributes() ?>>
<template id="tpx_ivf_outcome_EmbryoNo"><span id="el_ivf_outcome_EmbryoNo">
<input type="<?= $Page->EmbryoNo->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_EmbryoNo" name="x_EmbryoNo" id="x_EmbryoNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EmbryoNo->getPlaceHolder()) ?>" value="<?= $Page->EmbryoNo->EditValue ?>"<?= $Page->EmbryoNo->editAttributes() ?> aria-describedby="x_EmbryoNo_help">
<?= $Page->EmbryoNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EmbryoNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
    <div id="r_ExtrauterineSac" class="form-group row">
        <label id="elh_ivf_outcome_ExtrauterineSac" for="x_ExtrauterineSac" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_ExtrauterineSac"><?= $Page->ExtrauterineSac->caption() ?><?= $Page->ExtrauterineSac->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ExtrauterineSac->cellAttributes() ?>>
<template id="tpx_ivf_outcome_ExtrauterineSac"><span id="el_ivf_outcome_ExtrauterineSac">
<input type="<?= $Page->ExtrauterineSac->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_ExtrauterineSac" name="x_ExtrauterineSac" id="x_ExtrauterineSac" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ExtrauterineSac->getPlaceHolder()) ?>" value="<?= $Page->ExtrauterineSac->EditValue ?>"<?= $Page->ExtrauterineSac->editAttributes() ?> aria-describedby="x_ExtrauterineSac_help">
<?= $Page->ExtrauterineSac->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ExtrauterineSac->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
    <div id="r_PregnancyMonozygotic" class="form-group row">
        <label id="elh_ivf_outcome_PregnancyMonozygotic" for="x_PregnancyMonozygotic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_PregnancyMonozygotic"><?= $Page->PregnancyMonozygotic->caption() ?><?= $Page->PregnancyMonozygotic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PregnancyMonozygotic->cellAttributes() ?>>
<template id="tpx_ivf_outcome_PregnancyMonozygotic"><span id="el_ivf_outcome_PregnancyMonozygotic">
<input type="<?= $Page->PregnancyMonozygotic->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_PregnancyMonozygotic" name="x_PregnancyMonozygotic" id="x_PregnancyMonozygotic" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PregnancyMonozygotic->getPlaceHolder()) ?>" value="<?= $Page->PregnancyMonozygotic->EditValue ?>"<?= $Page->PregnancyMonozygotic->editAttributes() ?> aria-describedby="x_PregnancyMonozygotic_help">
<?= $Page->PregnancyMonozygotic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PregnancyMonozygotic->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TypeGestation->Visible) { // TypeGestation ?>
    <div id="r_TypeGestation" class="form-group row">
        <label id="elh_ivf_outcome_TypeGestation" for="x_TypeGestation" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_TypeGestation"><?= $Page->TypeGestation->caption() ?><?= $Page->TypeGestation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TypeGestation->cellAttributes() ?>>
<template id="tpx_ivf_outcome_TypeGestation"><span id="el_ivf_outcome_TypeGestation">
<input type="<?= $Page->TypeGestation->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_TypeGestation" name="x_TypeGestation" id="x_TypeGestation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TypeGestation->getPlaceHolder()) ?>" value="<?= $Page->TypeGestation->EditValue ?>"<?= $Page->TypeGestation->editAttributes() ?> aria-describedby="x_TypeGestation_help">
<?= $Page->TypeGestation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TypeGestation->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Urine->Visible) { // Urine ?>
    <div id="r_Urine" class="form-group row">
        <label id="elh_ivf_outcome_Urine" for="x_Urine" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_Urine"><?= $Page->Urine->caption() ?><?= $Page->Urine->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Urine->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Urine"><span id="el_ivf_outcome_Urine">
    <select
        id="x_Urine"
        name="x_Urine"
        class="form-control ew-select<?= $Page->Urine->isInvalidClass() ?>"
        data-select2-id="ivf_outcome_x_Urine"
        data-table="ivf_outcome"
        data-field="x_Urine"
        data-value-separator="<?= $Page->Urine->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Urine->getPlaceHolder()) ?>"
        <?= $Page->Urine->editAttributes() ?>>
        <?= $Page->Urine->selectOptionListHtml("x_Urine") ?>
    </select>
    <?= $Page->Urine->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Urine->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_outcome_x_Urine']"),
        options = { name: "x_Urine", selectId: "ivf_outcome_x_Urine", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_outcome.fields.Urine.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_outcome.fields.Urine.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PTdate->Visible) { // PTdate ?>
    <div id="r_PTdate" class="form-group row">
        <label id="elh_ivf_outcome_PTdate" for="x_PTdate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_PTdate"><?= $Page->PTdate->caption() ?><?= $Page->PTdate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PTdate->cellAttributes() ?>>
<template id="tpx_ivf_outcome_PTdate"><span id="el_ivf_outcome_PTdate">
<input type="<?= $Page->PTdate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_PTdate" name="x_PTdate" id="x_PTdate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PTdate->getPlaceHolder()) ?>" value="<?= $Page->PTdate->EditValue ?>"<?= $Page->PTdate->editAttributes() ?> aria-describedby="x_PTdate_help">
<?= $Page->PTdate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PTdate->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reduced->Visible) { // Reduced ?>
    <div id="r_Reduced" class="form-group row">
        <label id="elh_ivf_outcome_Reduced" for="x_Reduced" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_Reduced"><?= $Page->Reduced->caption() ?><?= $Page->Reduced->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reduced->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Reduced"><span id="el_ivf_outcome_Reduced">
<input type="<?= $Page->Reduced->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Reduced" name="x_Reduced" id="x_Reduced" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Reduced->getPlaceHolder()) ?>" value="<?= $Page->Reduced->EditValue ?>"<?= $Page->Reduced->editAttributes() ?> aria-describedby="x_Reduced_help">
<?= $Page->Reduced->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reduced->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->INduced->Visible) { // INduced ?>
    <div id="r_INduced" class="form-group row">
        <label id="elh_ivf_outcome_INduced" for="x_INduced" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_INduced"><?= $Page->INduced->caption() ?><?= $Page->INduced->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->INduced->cellAttributes() ?>>
<template id="tpx_ivf_outcome_INduced"><span id="el_ivf_outcome_INduced">
<input type="<?= $Page->INduced->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_INduced" name="x_INduced" id="x_INduced" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->INduced->getPlaceHolder()) ?>" value="<?= $Page->INduced->EditValue ?>"<?= $Page->INduced->editAttributes() ?> aria-describedby="x_INduced_help">
<?= $Page->INduced->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->INduced->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->INducedDate->Visible) { // INducedDate ?>
    <div id="r_INducedDate" class="form-group row">
        <label id="elh_ivf_outcome_INducedDate" for="x_INducedDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_INducedDate"><?= $Page->INducedDate->caption() ?><?= $Page->INducedDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->INducedDate->cellAttributes() ?>>
<template id="tpx_ivf_outcome_INducedDate"><span id="el_ivf_outcome_INducedDate">
<input type="<?= $Page->INducedDate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_INducedDate" name="x_INducedDate" id="x_INducedDate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->INducedDate->getPlaceHolder()) ?>" value="<?= $Page->INducedDate->EditValue ?>"<?= $Page->INducedDate->editAttributes() ?> aria-describedby="x_INducedDate_help">
<?= $Page->INducedDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->INducedDate->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Miscarriage->Visible) { // Miscarriage ?>
    <div id="r_Miscarriage" class="form-group row">
        <label id="elh_ivf_outcome_Miscarriage" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_Miscarriage"><?= $Page->Miscarriage->caption() ?><?= $Page->Miscarriage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Miscarriage->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Miscarriage"><span id="el_ivf_outcome_Miscarriage">
<template id="tp_x_Miscarriage">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Miscarriage" name="x_Miscarriage" id="x_Miscarriage"<?= $Page->Miscarriage->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Miscarriage" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Miscarriage"
    name="x_Miscarriage"
    value="<?= HtmlEncode($Page->Miscarriage->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_Miscarriage"
    data-target="dsl_x_Miscarriage"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Miscarriage->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Miscarriage"
    data-value-separator="<?= $Page->Miscarriage->displayValueSeparatorAttribute() ?>"
    <?= $Page->Miscarriage->editAttributes() ?>>
<?= $Page->Miscarriage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Miscarriage->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Induced1->Visible) { // Induced1 ?>
    <div id="r_Induced1" class="form-group row">
        <label id="elh_ivf_outcome_Induced1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_Induced1"><?= $Page->Induced1->caption() ?><?= $Page->Induced1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Induced1->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Induced1"><span id="el_ivf_outcome_Induced1">
<template id="tp_x_Induced1">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Induced1" name="x_Induced1" id="x_Induced1"<?= $Page->Induced1->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Induced1" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Induced1"
    name="x_Induced1"
    value="<?= HtmlEncode($Page->Induced1->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_Induced1"
    data-target="dsl_x_Induced1"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Induced1->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Induced1"
    data-value-separator="<?= $Page->Induced1->displayValueSeparatorAttribute() ?>"
    <?= $Page->Induced1->editAttributes() ?>>
<?= $Page->Induced1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Induced1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
    <div id="r_Type" class="form-group row">
        <label id="elh_ivf_outcome_Type" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_Type"><?= $Page->Type->caption() ?><?= $Page->Type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Type->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Type"><span id="el_ivf_outcome_Type">
<template id="tp_x_Type">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Type" name="x_Type" id="x_Type"<?= $Page->Type->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Type" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Type"
    name="x_Type"
    value="<?= HtmlEncode($Page->Type->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_Type"
    data-target="dsl_x_Type"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Type->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Type"
    data-value-separator="<?= $Page->Type->displayValueSeparatorAttribute() ?>"
    <?= $Page->Type->editAttributes() ?>>
<?= $Page->Type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Type->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IfClinical->Visible) { // IfClinical ?>
    <div id="r_IfClinical" class="form-group row">
        <label id="elh_ivf_outcome_IfClinical" for="x_IfClinical" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_IfClinical"><?= $Page->IfClinical->caption() ?><?= $Page->IfClinical->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IfClinical->cellAttributes() ?>>
<template id="tpx_ivf_outcome_IfClinical"><span id="el_ivf_outcome_IfClinical">
<input type="<?= $Page->IfClinical->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_IfClinical" name="x_IfClinical" id="x_IfClinical" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IfClinical->getPlaceHolder()) ?>" value="<?= $Page->IfClinical->EditValue ?>"<?= $Page->IfClinical->editAttributes() ?> aria-describedby="x_IfClinical_help">
<?= $Page->IfClinical->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IfClinical->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GADate->Visible) { // GADate ?>
    <div id="r_GADate" class="form-group row">
        <label id="elh_ivf_outcome_GADate" for="x_GADate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_GADate"><?= $Page->GADate->caption() ?><?= $Page->GADate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GADate->cellAttributes() ?>>
<template id="tpx_ivf_outcome_GADate"><span id="el_ivf_outcome_GADate">
<input type="<?= $Page->GADate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_GADate" name="x_GADate" id="x_GADate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GADate->getPlaceHolder()) ?>" value="<?= $Page->GADate->EditValue ?>"<?= $Page->GADate->editAttributes() ?> aria-describedby="x_GADate_help">
<?= $Page->GADate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GADate->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GA->Visible) { // GA ?>
    <div id="r_GA" class="form-group row">
        <label id="elh_ivf_outcome_GA" for="x_GA" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_GA"><?= $Page->GA->caption() ?><?= $Page->GA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GA->cellAttributes() ?>>
<template id="tpx_ivf_outcome_GA"><span id="el_ivf_outcome_GA">
<input type="<?= $Page->GA->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_GA" name="x_GA" id="x_GA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GA->getPlaceHolder()) ?>" value="<?= $Page->GA->EditValue ?>"<?= $Page->GA->editAttributes() ?> aria-describedby="x_GA_help">
<?= $Page->GA->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GA->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FoetalDeath->Visible) { // FoetalDeath ?>
    <div id="r_FoetalDeath" class="form-group row">
        <label id="elh_ivf_outcome_FoetalDeath" for="x_FoetalDeath" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_FoetalDeath"><?= $Page->FoetalDeath->caption() ?><?= $Page->FoetalDeath->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FoetalDeath->cellAttributes() ?>>
<template id="tpx_ivf_outcome_FoetalDeath"><span id="el_ivf_outcome_FoetalDeath">
    <select
        id="x_FoetalDeath"
        name="x_FoetalDeath"
        class="form-control ew-select<?= $Page->FoetalDeath->isInvalidClass() ?>"
        data-select2-id="ivf_outcome_x_FoetalDeath"
        data-table="ivf_outcome"
        data-field="x_FoetalDeath"
        data-value-separator="<?= $Page->FoetalDeath->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->FoetalDeath->getPlaceHolder()) ?>"
        <?= $Page->FoetalDeath->editAttributes() ?>>
        <?= $Page->FoetalDeath->selectOptionListHtml("x_FoetalDeath") ?>
    </select>
    <?= $Page->FoetalDeath->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->FoetalDeath->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_outcome_x_FoetalDeath']"),
        options = { name: "x_FoetalDeath", selectId: "ivf_outcome_x_FoetalDeath", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_outcome.fields.FoetalDeath.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_outcome.fields.FoetalDeath.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FerinatalDeath->Visible) { // FerinatalDeath ?>
    <div id="r_FerinatalDeath" class="form-group row">
        <label id="elh_ivf_outcome_FerinatalDeath" for="x_FerinatalDeath" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_FerinatalDeath"><?= $Page->FerinatalDeath->caption() ?><?= $Page->FerinatalDeath->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FerinatalDeath->cellAttributes() ?>>
<template id="tpx_ivf_outcome_FerinatalDeath"><span id="el_ivf_outcome_FerinatalDeath">
    <select
        id="x_FerinatalDeath"
        name="x_FerinatalDeath"
        class="form-control ew-select<?= $Page->FerinatalDeath->isInvalidClass() ?>"
        data-select2-id="ivf_outcome_x_FerinatalDeath"
        data-table="ivf_outcome"
        data-field="x_FerinatalDeath"
        data-value-separator="<?= $Page->FerinatalDeath->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->FerinatalDeath->getPlaceHolder()) ?>"
        <?= $Page->FerinatalDeath->editAttributes() ?>>
        <?= $Page->FerinatalDeath->selectOptionListHtml("x_FerinatalDeath") ?>
    </select>
    <?= $Page->FerinatalDeath->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->FerinatalDeath->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_outcome_x_FerinatalDeath']"),
        options = { name: "x_FerinatalDeath", selectId: "ivf_outcome_x_FerinatalDeath", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_outcome.fields.FerinatalDeath.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_outcome.fields.FerinatalDeath.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_outcome_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_TidNo"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<?php if ($Page->TidNo->getSessionValue() != "") { ?>
<template id="tpx_ivf_outcome_TidNo"><span id="el_ivf_outcome_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->TidNo->getDisplayValue($Page->TidNo->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_TidNo" name="x_TidNo" value="<?= HtmlEncode($Page->TidNo->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_ivf_outcome_TidNo"><span id="el_ivf_outcome_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Ectopic->Visible) { // Ectopic ?>
    <div id="r_Ectopic" class="form-group row">
        <label id="elh_ivf_outcome_Ectopic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_Ectopic"><?= $Page->Ectopic->caption() ?><?= $Page->Ectopic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Ectopic->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Ectopic"><span id="el_ivf_outcome_Ectopic">
<template id="tp_x_Ectopic">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Ectopic" name="x_Ectopic" id="x_Ectopic"<?= $Page->Ectopic->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Ectopic" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Ectopic"
    name="x_Ectopic"
    value="<?= HtmlEncode($Page->Ectopic->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_Ectopic"
    data-target="dsl_x_Ectopic"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Ectopic->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Ectopic"
    data-value-separator="<?= $Page->Ectopic->displayValueSeparatorAttribute() ?>"
    <?= $Page->Ectopic->editAttributes() ?>>
<?= $Page->Ectopic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Ectopic->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Extra->Visible) { // Extra ?>
    <div id="r_Extra" class="form-group row">
        <label id="elh_ivf_outcome_Extra" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_Extra"><?= $Page->Extra->caption() ?><?= $Page->Extra->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Extra->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Extra"><span id="el_ivf_outcome_Extra">
<template id="tp_x_Extra">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_outcome" data-field="x_Extra" name="x_Extra" id="x_Extra"<?= $Page->Extra->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Extra" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Extra"
    name="x_Extra"
    value="<?= HtmlEncode($Page->Extra->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_Extra"
    data-target="dsl_x_Extra"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Extra->isInvalidClass() ?>"
    data-table="ivf_outcome"
    data-field="x_Extra"
    data-value-separator="<?= $Page->Extra->displayValueSeparatorAttribute() ?>"
    <?= $Page->Extra->editAttributes() ?>>
<?= $Page->Extra->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Extra->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Implantation->Visible) { // Implantation ?>
    <div id="r_Implantation" class="form-group row">
        <label id="elh_ivf_outcome_Implantation" for="x_Implantation" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_Implantation"><?= $Page->Implantation->caption() ?><?= $Page->Implantation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Implantation->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Implantation"><span id="el_ivf_outcome_Implantation">
<input type="<?= $Page->Implantation->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_Implantation" name="x_Implantation" id="x_Implantation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Implantation->getPlaceHolder()) ?>" value="<?= $Page->Implantation->EditValue ?>"<?= $Page->Implantation->editAttributes() ?> aria-describedby="x_Implantation_help">
<?= $Page->Implantation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Implantation->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DeliveryDate->Visible) { // DeliveryDate ?>
    <div id="r_DeliveryDate" class="form-group row">
        <label id="elh_ivf_outcome_DeliveryDate" for="x_DeliveryDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_DeliveryDate"><?= $Page->DeliveryDate->caption() ?><?= $Page->DeliveryDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeliveryDate->cellAttributes() ?>>
<template id="tpx_ivf_outcome_DeliveryDate"><span id="el_ivf_outcome_DeliveryDate">
<input type="<?= $Page->DeliveryDate->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_DeliveryDate" data-format="7" name="x_DeliveryDate" id="x_DeliveryDate" placeholder="<?= HtmlEncode($Page->DeliveryDate->getPlaceHolder()) ?>" value="<?= $Page->DeliveryDate->EditValue ?>"<?= $Page->DeliveryDate->editAttributes() ?> aria-describedby="x_DeliveryDate_help">
<?= $Page->DeliveryDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DeliveryDate->getErrorMessage() ?></div>
<?php if (!$Page->DeliveryDate->ReadOnly && !$Page->DeliveryDate->Disabled && !isset($Page->DeliveryDate->EditAttrs["readonly"]) && !isset($Page->DeliveryDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_outcomeadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_outcomeadd", "x_DeliveryDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BabyDetails->Visible) { // BabyDetails ?>
    <div id="r_BabyDetails" class="form-group row">
        <label id="elh_ivf_outcome_BabyDetails" for="x_BabyDetails" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_BabyDetails"><?= $Page->BabyDetails->caption() ?><?= $Page->BabyDetails->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BabyDetails->cellAttributes() ?>>
<template id="tpx_ivf_outcome_BabyDetails"><span id="el_ivf_outcome_BabyDetails">
<input type="<?= $Page->BabyDetails->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_BabyDetails" name="x_BabyDetails" id="x_BabyDetails" placeholder="<?= HtmlEncode($Page->BabyDetails->getPlaceHolder()) ?>" value="<?= $Page->BabyDetails->EditValue ?>"<?= $Page->BabyDetails->editAttributes() ?> aria-describedby="x_BabyDetails_help">
<?= $Page->BabyDetails->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BabyDetails->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LSCSNormal->Visible) { // LSCSNormal ?>
    <div id="r_LSCSNormal" class="form-group row">
        <label id="elh_ivf_outcome_LSCSNormal" for="x_LSCSNormal" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_LSCSNormal"><?= $Page->LSCSNormal->caption() ?><?= $Page->LSCSNormal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LSCSNormal->cellAttributes() ?>>
<template id="tpx_ivf_outcome_LSCSNormal"><span id="el_ivf_outcome_LSCSNormal">
<input type="<?= $Page->LSCSNormal->getInputTextType() ?>" data-table="ivf_outcome" data-field="x_LSCSNormal" name="x_LSCSNormal" id="x_LSCSNormal" placeholder="<?= HtmlEncode($Page->LSCSNormal->getPlaceHolder()) ?>" value="<?= $Page->LSCSNormal->EditValue ?>"<?= $Page->LSCSNormal->editAttributes() ?> aria-describedby="x_LSCSNormal_help">
<?= $Page->LSCSNormal->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LSCSNormal->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Notes->Visible) { // Notes ?>
    <div id="r_Notes" class="form-group row">
        <label id="elh_ivf_outcome_Notes" for="x_Notes" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_outcome_Notes"><?= $Page->Notes->caption() ?><?= $Page->Notes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Notes->cellAttributes() ?>>
<template id="tpx_ivf_outcome_Notes"><span id="el_ivf_outcome_Notes">
<textarea data-table="ivf_outcome" data-field="x_Notes" name="x_Notes" id="x_Notes" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Notes->getPlaceHolder()) ?>"<?= $Page->Notes->editAttributes() ?> aria-describedby="x_Notes_help"><?= $Page->Notes->EditValue ?></textarea>
<?= $Page->Notes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Notes->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_outcomeadd" class="ew-custom-template"></div>
<template id="tpm_ivf_outcomeadd">
<div id="ct_IvfOutcomeAdd"><style>
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
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["id"] ;
$IVFid = $_GET["fk_id"] ;
$dbhelper = &DbHelper();
$Tid = $_GET["fk_RIDNO"];//
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$Tid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
if($results2[0]["profilePic"] == "")
{
   $PatientProfilePic = "hims\profile-picture.png";
}else{
 $PatientProfilePic = $results2[0]["profilePic"];
}
if($results1[0]["profilePic"] == "")
{
   $PartnerProfilePic = "hims\profile-picture.png";
}else{
 $PartnerProfilePic = $results1[0]["profilePic"];
}
?>	
 <?php  if($results[0]["Male"]== '0')
{ echo "Donor ID : ".$results[0]["CoupleID"]; }
else{ echo "Couple ID : ".$results[0]["CoupleID"]; }
  ?>
<div class="row">
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Partner Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Partner Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PartnerProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results1[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results1[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<?php
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$VitalsHistory = $dbhelper->ExecuteRows($sql);
	$VitalsHistoryRowCount = count($VitalsHistory);
	if($VitalsHistory == false)
	{
		$$VitalsHistorywarn = "";
		$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$$VitalsHistorywarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
			if($cid == $VitalsHistory[$VitalsHistoryRowCount-1]["TidNo"])
			{
				$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $VitalsHistoryRowCount; $x++) {
					if($cid == $VitalsHistory[$x]["TidNo"])
					{
						$kk = 1;
						$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";
				}
			}
		}else{
			$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
	$opurl = "view_opd_follow_upadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";

	//$ivfTreatmentwarnUrl = "treatment.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$ivfTreatmentwarnUrl ="ivf_treatment_planlist.php?showdetail=&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_et_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivf_et_chart = $dbhelper->ExecuteRows($sql);
	$Vivf_et_chartRowCount = count($ivf_et_chart);
	if($ivf_et_chart == false)
	{
		$Etcountwarn = "";
		$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($Vivf_et_chartRowCount > 0)
		{
			$Etcountwarn ='<span class="badge bg-warning">'.$Vivf_et_chartRowCount.'</span>';
			if($cid == $ivf_et_chart[$Vivf_et_chartRowCount-1]["TidNo"])
			{
				$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $Vivf_et_chartRowCount; $x++) {
					if($cid == $ivf_et_chart[$x]["TidNo"])
					{
						$kk = 1;
						$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
	//http://localhost:1445/ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_art_summary where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfartsummary = $dbhelper->ExecuteRows($sql);
	$ivfartsummaryRowCount = count($ivfartsummary);
	if($ivfartsummary == false)
	{
		$ivfartsummarycountwarn = "";
		$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfartsummaryRowCount > 0)
		{
			$ivfartsummarycountwarn ='<span class="badge bg-warning">'.$ivfartsummaryRowCount.'</span>';
			if($cid == $ivfartsummary[$ivfartsummaryRowCount-1]["TidNo"])
			{
				$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfartsummaryRowCount; $x++) {
					if($cid == $ivfartsummary[$x]["TidNo"])
					{
						$kk = 1;
						$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_Name=597&fk_RIDNO=11
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_stimulation_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfstimulationchart = $dbhelper->ExecuteRows($sql);
	$ivfstimulationchartRowCount = count($ivfstimulationchart);
	if($ivfstimulationchart == false)
	{
		$ivfstimulationchartwarn = "";
		$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$ivfstimulationchartwarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
			if($cid == $ivfstimulationchart[$ivfstimulationchartRowCount-1]["TidNo"])
			{
				$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfstimulationchartRowCount; $x++) {
					if($cid == $ivfstimulationchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where RIDNo='".$IVFid."' and PatientName='".$results2[0]["id"]."' ;";
	$ivfsemenanalysisreport = $dbhelper->ExecuteRows($sql);
	$ivfsemenanalysisreportRowCount = count($ivfsemenanalysisreport);
	if($ivfsemenanalysisreport == false)
	{
		$ivfsemenanalysisreportwarn = "";
		$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfsemenanalysisreportRowCount > 0)
		{
			$ivfsemenanalysisreportwarn ='<span class="badge bg-warning">'.$ivfsemenanalysisreportRowCount.'</span>';
			if($cid == $ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["TidNo"])
			{
				$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfsemenanalysisreportRowCount; $x++) {
					if($cid == $ivfsemenanalysisreport[$x]["TidNo"])
					{
						$kk = 1;
						$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_ovum_pick_up_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfovumpickupchart = $dbhelper->ExecuteRows($sql);
	$ivfovumpickupchartRowCount = count($ivfovumpickupchart);
	if($ivfovumpickupchart == false)
	{
		$ivfovumpickupchartwarn = "";
		$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfovumpickupchartRowCount > 0)
		{
			$ivfovumpickupchartwarn ='<span class="badge bg-warning">'.$ivfovumpickupchartRowCount.'</span>';
			if($cid == $ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["TidNo"])
			{
				$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfovumpickupchartRowCount; $x++) {
					if($cid == $ivfovumpickupchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
   // http://localhost:1445/ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_otherprocedure where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfotherprocedure = $dbhelper->ExecuteRows($sql);
	$ivfotherprocedureRowCount = count($ivfotherprocedure);
	if($ivfotherprocedure == false)
	{
		$ivfotherprocedurewarn = "";
		$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfotherprocedureRowCount > 0)
		{
			$ivfotherprocedurewarn ='<span class="badge bg-warning">'.$ivfotherprocedureRowCount.'</span>';
			if($cid == $ivfotherprocedure[$ivfotherprocedureRowCount-1]["TidNo"])
			{
				$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfotherprocedureRowCount; $x++) {
					if($cid == $ivfotherprocedure[$x]["TidNo"])
					{
						$kk = 1;
						$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$ivfembryologychartlistUrl = "ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	//http://localhost:1445/ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$patientserviceslistUrl = "patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";
	//http://localhost:1445/patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_Name=597&fk_RIDNO=11&fk_id=1
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	//http://localhost:1445/ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_RIDNO=11&fk_Name=597
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$TrPlanurl = "ivf_treatment_planview.php?showdetail=&id=".$cid."&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";
	//http://localhost:1445/ivf_treatment_planview.php?showdetail=&id=1&showmaster=ivf&fk_id=11&fk_Female=597
?>
		<div class="card">
			  <div class="card-header">
				<h3 class="card-title">Application Buttons</h3>
			  </div>
			  <div class="card-body">
				<a class="btn btn-app"  href="javascript:history.back()">
				  <i class="fas fa-undo"></i> Back
				</a>	  
			  </div>
			  <!-- /.card-body -->
		</div>
</br>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Out Come</h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="TypeOfCycle"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_outcomeDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_outcomeDate"></slot></span>
						</td>
						<td id="SpermOrgin"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_outcomeDay"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_outcomeDay"></slot></span>
						</td>
					</tr>
										<tr>
						<td id="State"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_OPResult"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_OPResult"></slot></span>
						</td>
						<td id="Origin"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_Gestation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_Gestation"></slot></span>
						</td>
					</tr>
										<tr>
						<td id="State"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_Ectopic"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_Ectopic"></slot></span>
						</td>
						<td id="Origin"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_Extra"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_Extra"></slot></span>
						</td>
					</tr>
										<tr>
						<td id="MACS"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_InitalOfSacs"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_InitalOfSacs"></slot></span>
						</td>
						<td  id="Technique" style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_ImplimentationRate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_ImplimentationRate"></slot></span>
						</td>
					</tr>
					<tr>
						<td id="PgdPlanning"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_Miscarriage"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_Miscarriage"></slot></span>
						</td>
						<td id="IMSI"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_Induced1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_Induced1"></slot></span>
						</td>
					</tr>
 					<tr>
						<td id="SequentialCulture"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_Type"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_Type"></slot></span>
						</td>
						<td id="TimeLapse"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_GADate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_GADate"></slot></span>
						</td>
					</tr>
															<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_GA"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_GA"></slot></span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
					<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_Urine"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_Urine"></slot></span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_PTdate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_PTdate"></slot></span>
						</td>
					</tr>
					</tbody>
			</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Live Birth</h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="TypeOfCycle"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_BabyDetails"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_BabyDetails"></slot></span>
						</td>
						<td id="SpermOrgin"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_DeliveryDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_DeliveryDate"></slot></span>
						</td>
					</tr>
					<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_Implantation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_Implantation"></slot></span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_LSCSNormal"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_LSCSNormal"></slot></span>
						</td>
					</tr>
					<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_outcome_Notes"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_outcome_Notes"></slot></span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
					</tbody>
			</table>
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_ivf_outcomeadd", "tpm_ivf_outcomeadd", "ivf_outcomeadd", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("ivf_outcome");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

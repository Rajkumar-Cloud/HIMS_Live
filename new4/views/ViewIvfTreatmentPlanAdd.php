<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIvfTreatmentPlanAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_ivf_treatment_planadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fview_ivf_treatment_planadd = currentForm = new ew.Form("fview_ivf_treatment_planadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_ivf_treatment_plan")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_ivf_treatment_plan)
        ew.vars.tables.view_ivf_treatment_plan = currentTable;
    fview_ivf_treatment_planadd.addFields([
        ["CoupleID", [fields.CoupleID.visible && fields.CoupleID.required ? ew.Validators.required(fields.CoupleID.caption) : null], fields.CoupleID.isInvalid],
        ["PatientID", [fields.PatientID.visible && fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["WifeCell", [fields.WifeCell.visible && fields.WifeCell.required ? ew.Validators.required(fields.WifeCell.caption) : null], fields.WifeCell.isInvalid],
        ["PartnerID", [fields.PartnerID.visible && fields.PartnerID.required ? ew.Validators.required(fields.PartnerID.caption) : null], fields.PartnerID.isInvalid],
        ["PartnerName", [fields.PartnerName.visible && fields.PartnerName.required ? ew.Validators.required(fields.PartnerName.caption) : null], fields.PartnerName.isInvalid],
        ["HusbandCell", [fields.HusbandCell.visible && fields.HusbandCell.required ? ew.Validators.required(fields.HusbandCell.caption) : null], fields.HusbandCell.isInvalid],
        ["RIDNO", [fields.RIDNO.visible && fields.RIDNO.required ? ew.Validators.required(fields.RIDNO.caption) : null], fields.RIDNO.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["TreatmentStartDate", [fields.TreatmentStartDate.visible && fields.TreatmentStartDate.required ? ew.Validators.required(fields.TreatmentStartDate.caption) : null, ew.Validators.datetime(0)], fields.TreatmentStartDate.isInvalid],
        ["treatment_status", [fields.treatment_status.visible && fields.treatment_status.required ? ew.Validators.required(fields.treatment_status.caption) : null], fields.treatment_status.isInvalid],
        ["ARTCYCLE", [fields.ARTCYCLE.visible && fields.ARTCYCLE.required ? ew.Validators.required(fields.ARTCYCLE.caption) : null], fields.ARTCYCLE.isInvalid],
        ["RESULT", [fields.RESULT.visible && fields.RESULT.required ? ew.Validators.required(fields.RESULT.caption) : null], fields.RESULT.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["TreatementStopDate", [fields.TreatementStopDate.visible && fields.TreatementStopDate.required ? ew.Validators.required(fields.TreatementStopDate.caption) : null, ew.Validators.datetime(0)], fields.TreatementStopDate.isInvalid],
        ["TypePatient", [fields.TypePatient.visible && fields.TypePatient.required ? ew.Validators.required(fields.TypePatient.caption) : null], fields.TypePatient.isInvalid],
        ["Treatment", [fields.Treatment.visible && fields.Treatment.required ? ew.Validators.required(fields.Treatment.caption) : null], fields.Treatment.isInvalid],
        ["TreatmentTec", [fields.TreatmentTec.visible && fields.TreatmentTec.required ? ew.Validators.required(fields.TreatmentTec.caption) : null], fields.TreatmentTec.isInvalid],
        ["TypeOfCycle", [fields.TypeOfCycle.visible && fields.TypeOfCycle.required ? ew.Validators.required(fields.TypeOfCycle.caption) : null], fields.TypeOfCycle.isInvalid],
        ["SpermOrgin", [fields.SpermOrgin.visible && fields.SpermOrgin.required ? ew.Validators.required(fields.SpermOrgin.caption) : null], fields.SpermOrgin.isInvalid],
        ["State", [fields.State.visible && fields.State.required ? ew.Validators.required(fields.State.caption) : null], fields.State.isInvalid],
        ["Origin", [fields.Origin.visible && fields.Origin.required ? ew.Validators.required(fields.Origin.caption) : null], fields.Origin.isInvalid],
        ["MACS", [fields.MACS.visible && fields.MACS.required ? ew.Validators.required(fields.MACS.caption) : null], fields.MACS.isInvalid],
        ["Technique", [fields.Technique.visible && fields.Technique.required ? ew.Validators.required(fields.Technique.caption) : null], fields.Technique.isInvalid],
        ["PgdPlanning", [fields.PgdPlanning.visible && fields.PgdPlanning.required ? ew.Validators.required(fields.PgdPlanning.caption) : null], fields.PgdPlanning.isInvalid],
        ["IMSI", [fields.IMSI.visible && fields.IMSI.required ? ew.Validators.required(fields.IMSI.caption) : null], fields.IMSI.isInvalid],
        ["SequentialCulture", [fields.SequentialCulture.visible && fields.SequentialCulture.required ? ew.Validators.required(fields.SequentialCulture.caption) : null], fields.SequentialCulture.isInvalid],
        ["TimeLapse", [fields.TimeLapse.visible && fields.TimeLapse.required ? ew.Validators.required(fields.TimeLapse.caption) : null], fields.TimeLapse.isInvalid],
        ["AH", [fields.AH.visible && fields.AH.required ? ew.Validators.required(fields.AH.caption) : null], fields.AH.isInvalid],
        ["Weight", [fields.Weight.visible && fields.Weight.required ? ew.Validators.required(fields.Weight.caption) : null], fields.Weight.isInvalid],
        ["BMI", [fields.BMI.visible && fields.BMI.required ? ew.Validators.required(fields.BMI.caption) : null], fields.BMI.isInvalid],
        ["MaleIndications", [fields.MaleIndications.visible && fields.MaleIndications.required ? ew.Validators.required(fields.MaleIndications.caption) : null], fields.MaleIndications.isInvalid],
        ["FemaleIndications", [fields.FemaleIndications.visible && fields.FemaleIndications.required ? ew.Validators.required(fields.FemaleIndications.caption) : null], fields.FemaleIndications.isInvalid],
        ["UseOfThe", [fields.UseOfThe.visible && fields.UseOfThe.required ? ew.Validators.required(fields.UseOfThe.caption) : null], fields.UseOfThe.isInvalid],
        ["Ectopic", [fields.Ectopic.visible && fields.Ectopic.required ? ew.Validators.required(fields.Ectopic.caption) : null], fields.Ectopic.isInvalid],
        ["Heterotopic", [fields.Heterotopic.visible && fields.Heterotopic.required ? ew.Validators.required(fields.Heterotopic.caption) : null], fields.Heterotopic.isInvalid],
        ["TransferDFE", [fields.TransferDFE.visible && fields.TransferDFE.required ? ew.Validators.required(fields.TransferDFE.caption) : null], fields.TransferDFE.isInvalid],
        ["Evolutive", [fields.Evolutive.visible && fields.Evolutive.required ? ew.Validators.required(fields.Evolutive.caption) : null], fields.Evolutive.isInvalid],
        ["Number", [fields.Number.visible && fields.Number.required ? ew.Validators.required(fields.Number.caption) : null], fields.Number.isInvalid],
        ["SequentialCult", [fields.SequentialCult.visible && fields.SequentialCult.required ? ew.Validators.required(fields.SequentialCult.caption) : null], fields.SequentialCult.isInvalid],
        ["TineLapse", [fields.TineLapse.visible && fields.TineLapse.required ? ew.Validators.required(fields.TineLapse.caption) : null], fields.TineLapse.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_ivf_treatment_planadd,
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
    fview_ivf_treatment_planadd.validate = function () {
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
    fview_ivf_treatment_planadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_ivf_treatment_planadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_ivf_treatment_planadd.lists.RIDNO = <?= $Page->RIDNO->toClientList($Page) ?>;
    fview_ivf_treatment_planadd.lists.treatment_status = <?= $Page->treatment_status->toClientList($Page) ?>;
    fview_ivf_treatment_planadd.lists.ARTCYCLE = <?= $Page->ARTCYCLE->toClientList($Page) ?>;
    fview_ivf_treatment_planadd.lists.RESULT = <?= $Page->RESULT->toClientList($Page) ?>;
    fview_ivf_treatment_planadd.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fview_ivf_treatment_planadd.lists.Treatment = <?= $Page->Treatment->toClientList($Page) ?>;
    fview_ivf_treatment_planadd.lists.TypeOfCycle = <?= $Page->TypeOfCycle->toClientList($Page) ?>;
    fview_ivf_treatment_planadd.lists.SpermOrgin = <?= $Page->SpermOrgin->toClientList($Page) ?>;
    fview_ivf_treatment_planadd.lists.State = <?= $Page->State->toClientList($Page) ?>;
    fview_ivf_treatment_planadd.lists.MACS = <?= $Page->MACS->toClientList($Page) ?>;
    fview_ivf_treatment_planadd.lists.PgdPlanning = <?= $Page->PgdPlanning->toClientList($Page) ?>;
    fview_ivf_treatment_planadd.lists.MaleIndications = <?= $Page->MaleIndications->toClientList($Page) ?>;
    fview_ivf_treatment_planadd.lists.FemaleIndications = <?= $Page->FemaleIndications->toClientList($Page) ?>;
    fview_ivf_treatment_planadd.lists.Heterotopic = <?= $Page->Heterotopic->toClientList($Page) ?>;
    fview_ivf_treatment_planadd.lists.TransferDFE = <?= $Page->TransferDFE->toClientList($Page) ?>;
    fview_ivf_treatment_planadd.lists.TineLapse = <?= $Page->TineLapse->toClientList($Page) ?>;
    loadjs.done("fview_ivf_treatment_planadd");
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
<form name="fview_ivf_treatment_planadd" id="fview_ivf_treatment_planadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ivf_treatment_plan">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
    <div id="r_CoupleID" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_CoupleID" for="x_CoupleID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_CoupleID"><?= $Page->CoupleID->caption() ?><?= $Page->CoupleID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CoupleID->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_CoupleID"><span id="el_view_ivf_treatment_plan_CoupleID">
<input type="<?= $Page->CoupleID->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_CoupleID" name="x_CoupleID" id="x_CoupleID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CoupleID->getPlaceHolder()) ?>" value="<?= $Page->CoupleID->EditValue ?>"<?= $Page->CoupleID->editAttributes() ?> aria-describedby="x_CoupleID_help">
<?= $Page->CoupleID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CoupleID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_PatientID"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_PatientID"><span id="el_view_ivf_treatment_plan_PatientID">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?> aria-describedby="x_PatientID_help">
<?= $Page->PatientID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_PatientName"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_PatientName"><span id="el_view_ivf_treatment_plan_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WifeCell->Visible) { // WifeCell ?>
    <div id="r_WifeCell" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_WifeCell" for="x_WifeCell" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_WifeCell"><?= $Page->WifeCell->caption() ?><?= $Page->WifeCell->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WifeCell->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_WifeCell"><span id="el_view_ivf_treatment_plan_WifeCell">
<input type="<?= $Page->WifeCell->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_WifeCell" name="x_WifeCell" id="x_WifeCell" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->WifeCell->getPlaceHolder()) ?>" value="<?= $Page->WifeCell->EditValue ?>"<?= $Page->WifeCell->editAttributes() ?> aria-describedby="x_WifeCell_help">
<?= $Page->WifeCell->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WifeCell->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <div id="r_PartnerID" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_PartnerID" for="x_PartnerID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_PartnerID"><?= $Page->PartnerID->caption() ?><?= $Page->PartnerID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerID->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_PartnerID"><span id="el_view_ivf_treatment_plan_PartnerID">
<input type="<?= $Page->PartnerID->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerID->getPlaceHolder()) ?>" value="<?= $Page->PartnerID->EditValue ?>"<?= $Page->PartnerID->editAttributes() ?> aria-describedby="x_PartnerID_help">
<?= $Page->PartnerID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <div id="r_PartnerName" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_PartnerName" for="x_PartnerName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_PartnerName"><?= $Page->PartnerName->caption() ?><?= $Page->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerName->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_PartnerName"><span id="el_view_ivf_treatment_plan_PartnerName">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?> aria-describedby="x_PartnerName_help">
<?= $Page->PartnerName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
    <div id="r_HusbandCell" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_HusbandCell" for="x_HusbandCell" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_HusbandCell"><?= $Page->HusbandCell->caption() ?><?= $Page->HusbandCell->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HusbandCell->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_HusbandCell"><span id="el_view_ivf_treatment_plan_HusbandCell">
<input type="<?= $Page->HusbandCell->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_HusbandCell" name="x_HusbandCell" id="x_HusbandCell" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HusbandCell->getPlaceHolder()) ?>" value="<?= $Page->HusbandCell->EditValue ?>"<?= $Page->HusbandCell->editAttributes() ?> aria-describedby="x_HusbandCell_help">
<?= $Page->HusbandCell->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HusbandCell->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <div id="r_RIDNO" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_RIDNO" for="x_RIDNO" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_RIDNO"><?= $Page->RIDNO->caption() ?><?= $Page->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNO->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_RIDNO"><span id="el_view_ivf_treatment_plan_RIDNO">
<?php $Page->RIDNO->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_RIDNO_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RIDNO"><?= EmptyValue(strval($Page->RIDNO->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->RIDNO->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->RIDNO->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->RIDNO->ReadOnly || $Page->RIDNO->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RIDNO',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->RIDNO->getErrorMessage() ?></div>
<?= $Page->RIDNO->getCustomMessage() ?>
<?= $Page->RIDNO->Lookup->getParamTag($Page, "p_x_RIDNO") ?>
<input type="hidden" is="selection-list" data-table="view_ivf_treatment_plan" data-field="x_RIDNO" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->RIDNO->displayValueSeparatorAttribute() ?>" name="x_RIDNO" id="x_RIDNO" value="<?= $Page->RIDNO->CurrentValue ?>"<?= $Page->RIDNO->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_Name"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_Name"><span id="el_view_ivf_treatment_plan_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_Age"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_Age"><span id="el_view_ivf_treatment_plan_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
    <div id="r_TreatmentStartDate" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_TreatmentStartDate" for="x_TreatmentStartDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_TreatmentStartDate"><?= $Page->TreatmentStartDate->caption() ?><?= $Page->TreatmentStartDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TreatmentStartDate->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_TreatmentStartDate"><span id="el_view_ivf_treatment_plan_TreatmentStartDate">
<input type="<?= $Page->TreatmentStartDate->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_TreatmentStartDate" name="x_TreatmentStartDate" id="x_TreatmentStartDate" placeholder="<?= HtmlEncode($Page->TreatmentStartDate->getPlaceHolder()) ?>" value="<?= $Page->TreatmentStartDate->EditValue ?>"<?= $Page->TreatmentStartDate->editAttributes() ?> aria-describedby="x_TreatmentStartDate_help">
<?= $Page->TreatmentStartDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TreatmentStartDate->getErrorMessage() ?></div>
<?php if (!$Page->TreatmentStartDate->ReadOnly && !$Page->TreatmentStartDate->Disabled && !isset($Page->TreatmentStartDate->EditAttrs["readonly"]) && !isset($Page->TreatmentStartDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ivf_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ivf_treatment_planadd", "x_TreatmentStartDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
    <div id="r_treatment_status" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_treatment_status" for="x_treatment_status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_treatment_status"><?= $Page->treatment_status->caption() ?><?= $Page->treatment_status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->treatment_status->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_treatment_status"><span id="el_view_ivf_treatment_plan_treatment_status">
    <select
        id="x_treatment_status"
        name="x_treatment_status"
        class="form-control ew-select<?= $Page->treatment_status->isInvalidClass() ?>"
        data-select2-id="view_ivf_treatment_plan_x_treatment_status"
        data-table="view_ivf_treatment_plan"
        data-field="x_treatment_status"
        data-value-separator="<?= $Page->treatment_status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->treatment_status->getPlaceHolder()) ?>"
        <?= $Page->treatment_status->editAttributes() ?>>
        <?= $Page->treatment_status->selectOptionListHtml("x_treatment_status") ?>
    </select>
    <?= $Page->treatment_status->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->treatment_status->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_ivf_treatment_plan_x_treatment_status']"),
        options = { name: "x_treatment_status", selectId: "view_ivf_treatment_plan_x_treatment_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_ivf_treatment_plan.fields.treatment_status.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ivf_treatment_plan.fields.treatment_status.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
    <div id="r_ARTCYCLE" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_ARTCYCLE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_ARTCYCLE"><?= $Page->ARTCYCLE->caption() ?><?= $Page->ARTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ARTCYCLE->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_ARTCYCLE"><span id="el_view_ivf_treatment_plan_ARTCYCLE">
<template id="tp_x_ARTCYCLE">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_ivf_treatment_plan" data-field="x_ARTCYCLE" name="x_ARTCYCLE" id="x_ARTCYCLE"<?= $Page->ARTCYCLE->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_ARTCYCLE" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_ARTCYCLE"
    name="x_ARTCYCLE"
    value="<?= HtmlEncode($Page->ARTCYCLE->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_ARTCYCLE"
    data-target="dsl_x_ARTCYCLE"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ARTCYCLE->isInvalidClass() ?>"
    data-table="view_ivf_treatment_plan"
    data-field="x_ARTCYCLE"
    data-value-separator="<?= $Page->ARTCYCLE->displayValueSeparatorAttribute() ?>"
    <?= $Page->ARTCYCLE->editAttributes() ?>>
<?= $Page->ARTCYCLE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ARTCYCLE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
    <div id="r_RESULT" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_RESULT" for="x_RESULT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_RESULT"><?= $Page->RESULT->caption() ?><?= $Page->RESULT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RESULT->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_RESULT"><span id="el_view_ivf_treatment_plan_RESULT">
    <select
        id="x_RESULT"
        name="x_RESULT"
        class="form-control ew-select<?= $Page->RESULT->isInvalidClass() ?>"
        data-select2-id="view_ivf_treatment_plan_x_RESULT"
        data-table="view_ivf_treatment_plan"
        data-field="x_RESULT"
        data-value-separator="<?= $Page->RESULT->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RESULT->getPlaceHolder()) ?>"
        <?= $Page->RESULT->editAttributes() ?>>
        <?= $Page->RESULT->selectOptionListHtml("x_RESULT") ?>
    </select>
    <?= $Page->RESULT->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RESULT->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_ivf_treatment_plan_x_RESULT']"),
        options = { name: "x_RESULT", selectId: "view_ivf_treatment_plan_x_RESULT", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_ivf_treatment_plan.fields.RESULT.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ivf_treatment_plan.fields.RESULT.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_status"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_status"><span id="el_view_ivf_treatment_plan_status">
    <select
        id="x_status"
        name="x_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="view_ivf_treatment_plan_x_status"
        data-table="view_ivf_treatment_plan"
        data-field="x_status"
        data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>"
        <?= $Page->status->editAttributes() ?>>
        <?= $Page->status->selectOptionListHtml("x_status") ?>
    </select>
    <?= $Page->status->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
<?= $Page->status->Lookup->getParamTag($Page, "p_x_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_ivf_treatment_plan_x_status']"),
        options = { name: "x_status", selectId: "view_ivf_treatment_plan_x_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ivf_treatment_plan.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TreatementStopDate->Visible) { // TreatementStopDate ?>
    <div id="r_TreatementStopDate" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_TreatementStopDate" for="x_TreatementStopDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_TreatementStopDate"><?= $Page->TreatementStopDate->caption() ?><?= $Page->TreatementStopDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TreatementStopDate->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_TreatementStopDate"><span id="el_view_ivf_treatment_plan_TreatementStopDate">
<input type="<?= $Page->TreatementStopDate->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_TreatementStopDate" name="x_TreatementStopDate" id="x_TreatementStopDate" placeholder="<?= HtmlEncode($Page->TreatementStopDate->getPlaceHolder()) ?>" value="<?= $Page->TreatementStopDate->EditValue ?>"<?= $Page->TreatementStopDate->editAttributes() ?> aria-describedby="x_TreatementStopDate_help">
<?= $Page->TreatementStopDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TreatementStopDate->getErrorMessage() ?></div>
<?php if (!$Page->TreatementStopDate->ReadOnly && !$Page->TreatementStopDate->Disabled && !isset($Page->TreatementStopDate->EditAttrs["readonly"]) && !isset($Page->TreatementStopDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_ivf_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_ivf_treatment_planadd", "x_TreatementStopDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TypePatient->Visible) { // TypePatient ?>
    <div id="r_TypePatient" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_TypePatient" for="x_TypePatient" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_TypePatient"><?= $Page->TypePatient->caption() ?><?= $Page->TypePatient->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TypePatient->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_TypePatient"><span id="el_view_ivf_treatment_plan_TypePatient">
<input type="<?= $Page->TypePatient->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_TypePatient" name="x_TypePatient" id="x_TypePatient" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TypePatient->getPlaceHolder()) ?>" value="<?= $Page->TypePatient->EditValue ?>"<?= $Page->TypePatient->editAttributes() ?> aria-describedby="x_TypePatient_help">
<?= $Page->TypePatient->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TypePatient->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
    <div id="r_Treatment" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_Treatment" for="x_Treatment" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_Treatment"><?= $Page->Treatment->caption() ?><?= $Page->Treatment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Treatment->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_Treatment"><span id="el_view_ivf_treatment_plan_Treatment">
    <select
        id="x_Treatment"
        name="x_Treatment"
        class="form-control ew-select<?= $Page->Treatment->isInvalidClass() ?>"
        data-select2-id="view_ivf_treatment_plan_x_Treatment"
        data-table="view_ivf_treatment_plan"
        data-field="x_Treatment"
        data-value-separator="<?= $Page->Treatment->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Treatment->getPlaceHolder()) ?>"
        <?= $Page->Treatment->editAttributes() ?>>
        <?= $Page->Treatment->selectOptionListHtml("x_Treatment") ?>
    </select>
    <?= $Page->Treatment->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Treatment->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_ivf_treatment_plan_x_Treatment']"),
        options = { name: "x_Treatment", selectId: "view_ivf_treatment_plan_x_Treatment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_ivf_treatment_plan.fields.Treatment.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ivf_treatment_plan.fields.Treatment.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TreatmentTec->Visible) { // TreatmentTec ?>
    <div id="r_TreatmentTec" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_TreatmentTec" for="x_TreatmentTec" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_TreatmentTec"><?= $Page->TreatmentTec->caption() ?><?= $Page->TreatmentTec->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TreatmentTec->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_TreatmentTec"><span id="el_view_ivf_treatment_plan_TreatmentTec">
<input type="<?= $Page->TreatmentTec->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_TreatmentTec" name="x_TreatmentTec" id="x_TreatmentTec" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TreatmentTec->getPlaceHolder()) ?>" value="<?= $Page->TreatmentTec->EditValue ?>"<?= $Page->TreatmentTec->editAttributes() ?> aria-describedby="x_TreatmentTec_help">
<?= $Page->TreatmentTec->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TreatmentTec->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TypeOfCycle->Visible) { // TypeOfCycle ?>
    <div id="r_TypeOfCycle" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_TypeOfCycle" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_TypeOfCycle"><?= $Page->TypeOfCycle->caption() ?><?= $Page->TypeOfCycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TypeOfCycle->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_TypeOfCycle"><span id="el_view_ivf_treatment_plan_TypeOfCycle">
<template id="tp_x_TypeOfCycle">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_ivf_treatment_plan" data-field="x_TypeOfCycle" name="x_TypeOfCycle" id="x_TypeOfCycle"<?= $Page->TypeOfCycle->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_TypeOfCycle" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_TypeOfCycle"
    name="x_TypeOfCycle"
    value="<?= HtmlEncode($Page->TypeOfCycle->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_TypeOfCycle"
    data-target="dsl_x_TypeOfCycle"
    data-repeatcolumn="5"
    class="form-control<?= $Page->TypeOfCycle->isInvalidClass() ?>"
    data-table="view_ivf_treatment_plan"
    data-field="x_TypeOfCycle"
    data-value-separator="<?= $Page->TypeOfCycle->displayValueSeparatorAttribute() ?>"
    <?= $Page->TypeOfCycle->editAttributes() ?>>
<?= $Page->TypeOfCycle->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TypeOfCycle->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SpermOrgin->Visible) { // SpermOrgin ?>
    <div id="r_SpermOrgin" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_SpermOrgin" for="x_SpermOrgin" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_SpermOrgin"><?= $Page->SpermOrgin->caption() ?><?= $Page->SpermOrgin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SpermOrgin->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_SpermOrgin"><span id="el_view_ivf_treatment_plan_SpermOrgin">
    <select
        id="x_SpermOrgin"
        name="x_SpermOrgin"
        class="form-control ew-select<?= $Page->SpermOrgin->isInvalidClass() ?>"
        data-select2-id="view_ivf_treatment_plan_x_SpermOrgin"
        data-table="view_ivf_treatment_plan"
        data-field="x_SpermOrgin"
        data-value-separator="<?= $Page->SpermOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SpermOrgin->getPlaceHolder()) ?>"
        <?= $Page->SpermOrgin->editAttributes() ?>>
        <?= $Page->SpermOrgin->selectOptionListHtml("x_SpermOrgin") ?>
    </select>
    <?= $Page->SpermOrgin->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->SpermOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_ivf_treatment_plan_x_SpermOrgin']"),
        options = { name: "x_SpermOrgin", selectId: "view_ivf_treatment_plan_x_SpermOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_ivf_treatment_plan.fields.SpermOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ivf_treatment_plan.fields.SpermOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <div id="r_State" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_State" for="x_State" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_State"><?= $Page->State->caption() ?><?= $Page->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->State->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_State"><span id="el_view_ivf_treatment_plan_State">
    <select
        id="x_State"
        name="x_State"
        class="form-control ew-select<?= $Page->State->isInvalidClass() ?>"
        data-select2-id="view_ivf_treatment_plan_x_State"
        data-table="view_ivf_treatment_plan"
        data-field="x_State"
        data-value-separator="<?= $Page->State->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->State->getPlaceHolder()) ?>"
        <?= $Page->State->editAttributes() ?>>
        <?= $Page->State->selectOptionListHtml("x_State") ?>
    </select>
    <?= $Page->State->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->State->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_ivf_treatment_plan_x_State']"),
        options = { name: "x_State", selectId: "view_ivf_treatment_plan_x_State", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_ivf_treatment_plan.fields.State.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ivf_treatment_plan.fields.State.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
    <div id="r_Origin" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_Origin" for="x_Origin" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_Origin"><?= $Page->Origin->caption() ?><?= $Page->Origin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Origin->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_Origin"><span id="el_view_ivf_treatment_plan_Origin">
<input type="<?= $Page->Origin->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_Origin" name="x_Origin" id="x_Origin" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Origin->getPlaceHolder()) ?>" value="<?= $Page->Origin->EditValue ?>"<?= $Page->Origin->editAttributes() ?> aria-describedby="x_Origin_help">
<?= $Page->Origin->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Origin->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MACS->Visible) { // MACS ?>
    <div id="r_MACS" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_MACS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_MACS"><?= $Page->MACS->caption() ?><?= $Page->MACS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MACS->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_MACS"><span id="el_view_ivf_treatment_plan_MACS">
<template id="tp_x_MACS">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_ivf_treatment_plan" data-field="x_MACS" name="x_MACS" id="x_MACS"<?= $Page->MACS->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_MACS" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_MACS"
    name="x_MACS"
    value="<?= HtmlEncode($Page->MACS->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_MACS"
    data-target="dsl_x_MACS"
    data-repeatcolumn="5"
    class="form-control<?= $Page->MACS->isInvalidClass() ?>"
    data-table="view_ivf_treatment_plan"
    data-field="x_MACS"
    data-value-separator="<?= $Page->MACS->displayValueSeparatorAttribute() ?>"
    <?= $Page->MACS->editAttributes() ?>>
<?= $Page->MACS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MACS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Technique->Visible) { // Technique ?>
    <div id="r_Technique" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_Technique" for="x_Technique" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_Technique"><?= $Page->Technique->caption() ?><?= $Page->Technique->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Technique->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_Technique"><span id="el_view_ivf_treatment_plan_Technique">
<input type="<?= $Page->Technique->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_Technique" name="x_Technique" id="x_Technique" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Technique->getPlaceHolder()) ?>" value="<?= $Page->Technique->EditValue ?>"<?= $Page->Technique->editAttributes() ?> aria-describedby="x_Technique_help">
<?= $Page->Technique->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Technique->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PgdPlanning->Visible) { // PgdPlanning ?>
    <div id="r_PgdPlanning" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_PgdPlanning" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_PgdPlanning"><?= $Page->PgdPlanning->caption() ?><?= $Page->PgdPlanning->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PgdPlanning->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_PgdPlanning"><span id="el_view_ivf_treatment_plan_PgdPlanning">
<template id="tp_x_PgdPlanning">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_ivf_treatment_plan" data-field="x_PgdPlanning" name="x_PgdPlanning" id="x_PgdPlanning"<?= $Page->PgdPlanning->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_PgdPlanning" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_PgdPlanning"
    name="x_PgdPlanning"
    value="<?= HtmlEncode($Page->PgdPlanning->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_PgdPlanning"
    data-target="dsl_x_PgdPlanning"
    data-repeatcolumn="5"
    class="form-control<?= $Page->PgdPlanning->isInvalidClass() ?>"
    data-table="view_ivf_treatment_plan"
    data-field="x_PgdPlanning"
    data-value-separator="<?= $Page->PgdPlanning->displayValueSeparatorAttribute() ?>"
    <?= $Page->PgdPlanning->editAttributes() ?>>
<?= $Page->PgdPlanning->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PgdPlanning->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IMSI->Visible) { // IMSI ?>
    <div id="r_IMSI" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_IMSI" for="x_IMSI" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_IMSI"><?= $Page->IMSI->caption() ?><?= $Page->IMSI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IMSI->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_IMSI"><span id="el_view_ivf_treatment_plan_IMSI">
<input type="<?= $Page->IMSI->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_IMSI" name="x_IMSI" id="x_IMSI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IMSI->getPlaceHolder()) ?>" value="<?= $Page->IMSI->EditValue ?>"<?= $Page->IMSI->editAttributes() ?> aria-describedby="x_IMSI_help">
<?= $Page->IMSI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IMSI->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SequentialCulture->Visible) { // SequentialCulture ?>
    <div id="r_SequentialCulture" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_SequentialCulture" for="x_SequentialCulture" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_SequentialCulture"><?= $Page->SequentialCulture->caption() ?><?= $Page->SequentialCulture->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SequentialCulture->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_SequentialCulture"><span id="el_view_ivf_treatment_plan_SequentialCulture">
<input type="<?= $Page->SequentialCulture->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_SequentialCulture" name="x_SequentialCulture" id="x_SequentialCulture" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SequentialCulture->getPlaceHolder()) ?>" value="<?= $Page->SequentialCulture->EditValue ?>"<?= $Page->SequentialCulture->editAttributes() ?> aria-describedby="x_SequentialCulture_help">
<?= $Page->SequentialCulture->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SequentialCulture->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TimeLapse->Visible) { // TimeLapse ?>
    <div id="r_TimeLapse" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_TimeLapse" for="x_TimeLapse" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_TimeLapse"><?= $Page->TimeLapse->caption() ?><?= $Page->TimeLapse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TimeLapse->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_TimeLapse"><span id="el_view_ivf_treatment_plan_TimeLapse">
<input type="<?= $Page->TimeLapse->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_TimeLapse" name="x_TimeLapse" id="x_TimeLapse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TimeLapse->getPlaceHolder()) ?>" value="<?= $Page->TimeLapse->EditValue ?>"<?= $Page->TimeLapse->editAttributes() ?> aria-describedby="x_TimeLapse_help">
<?= $Page->TimeLapse->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TimeLapse->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AH->Visible) { // AH ?>
    <div id="r_AH" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_AH" for="x_AH" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_AH"><?= $Page->AH->caption() ?><?= $Page->AH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AH->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_AH"><span id="el_view_ivf_treatment_plan_AH">
<input type="<?= $Page->AH->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_AH" name="x_AH" id="x_AH" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AH->getPlaceHolder()) ?>" value="<?= $Page->AH->EditValue ?>"<?= $Page->AH->editAttributes() ?> aria-describedby="x_AH_help">
<?= $Page->AH->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AH->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Weight->Visible) { // Weight ?>
    <div id="r_Weight" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_Weight" for="x_Weight" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_Weight"><?= $Page->Weight->caption() ?><?= $Page->Weight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Weight->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_Weight"><span id="el_view_ivf_treatment_plan_Weight">
<input type="<?= $Page->Weight->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_Weight" name="x_Weight" id="x_Weight" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Weight->getPlaceHolder()) ?>" value="<?= $Page->Weight->EditValue ?>"<?= $Page->Weight->editAttributes() ?> aria-describedby="x_Weight_help">
<?= $Page->Weight->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Weight->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BMI->Visible) { // BMI ?>
    <div id="r_BMI" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_BMI" for="x_BMI" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_BMI"><?= $Page->BMI->caption() ?><?= $Page->BMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BMI->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_BMI"><span id="el_view_ivf_treatment_plan_BMI">
<input type="<?= $Page->BMI->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_BMI" name="x_BMI" id="x_BMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BMI->getPlaceHolder()) ?>" value="<?= $Page->BMI->EditValue ?>"<?= $Page->BMI->editAttributes() ?> aria-describedby="x_BMI_help">
<?= $Page->BMI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BMI->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MaleIndications->Visible) { // MaleIndications ?>
    <div id="r_MaleIndications" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_MaleIndications" for="x_MaleIndications" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_MaleIndications"><?= $Page->MaleIndications->caption() ?><?= $Page->MaleIndications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MaleIndications->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_MaleIndications"><span id="el_view_ivf_treatment_plan_MaleIndications">
    <select
        id="x_MaleIndications"
        name="x_MaleIndications"
        class="form-control ew-select<?= $Page->MaleIndications->isInvalidClass() ?>"
        data-select2-id="view_ivf_treatment_plan_x_MaleIndications"
        data-table="view_ivf_treatment_plan"
        data-field="x_MaleIndications"
        data-value-separator="<?= $Page->MaleIndications->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->MaleIndications->getPlaceHolder()) ?>"
        <?= $Page->MaleIndications->editAttributes() ?>>
        <?= $Page->MaleIndications->selectOptionListHtml("x_MaleIndications") ?>
    </select>
    <?= $Page->MaleIndications->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->MaleIndications->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_ivf_treatment_plan_x_MaleIndications']"),
        options = { name: "x_MaleIndications", selectId: "view_ivf_treatment_plan_x_MaleIndications", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_ivf_treatment_plan.fields.MaleIndications.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ivf_treatment_plan.fields.MaleIndications.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FemaleIndications->Visible) { // FemaleIndications ?>
    <div id="r_FemaleIndications" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_FemaleIndications" for="x_FemaleIndications" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_FemaleIndications"><?= $Page->FemaleIndications->caption() ?><?= $Page->FemaleIndications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FemaleIndications->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_FemaleIndications"><span id="el_view_ivf_treatment_plan_FemaleIndications">
    <select
        id="x_FemaleIndications"
        name="x_FemaleIndications"
        class="form-control ew-select<?= $Page->FemaleIndications->isInvalidClass() ?>"
        data-select2-id="view_ivf_treatment_plan_x_FemaleIndications"
        data-table="view_ivf_treatment_plan"
        data-field="x_FemaleIndications"
        data-value-separator="<?= $Page->FemaleIndications->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->FemaleIndications->getPlaceHolder()) ?>"
        <?= $Page->FemaleIndications->editAttributes() ?>>
        <?= $Page->FemaleIndications->selectOptionListHtml("x_FemaleIndications") ?>
    </select>
    <?= $Page->FemaleIndications->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->FemaleIndications->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_ivf_treatment_plan_x_FemaleIndications']"),
        options = { name: "x_FemaleIndications", selectId: "view_ivf_treatment_plan_x_FemaleIndications", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_ivf_treatment_plan.fields.FemaleIndications.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ivf_treatment_plan.fields.FemaleIndications.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UseOfThe->Visible) { // UseOfThe ?>
    <div id="r_UseOfThe" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_UseOfThe" for="x_UseOfThe" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_UseOfThe"><?= $Page->UseOfThe->caption() ?><?= $Page->UseOfThe->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UseOfThe->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_UseOfThe"><span id="el_view_ivf_treatment_plan_UseOfThe">
<input type="<?= $Page->UseOfThe->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_UseOfThe" name="x_UseOfThe" id="x_UseOfThe" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UseOfThe->getPlaceHolder()) ?>" value="<?= $Page->UseOfThe->EditValue ?>"<?= $Page->UseOfThe->editAttributes() ?> aria-describedby="x_UseOfThe_help">
<?= $Page->UseOfThe->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UseOfThe->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Ectopic->Visible) { // Ectopic ?>
    <div id="r_Ectopic" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_Ectopic" for="x_Ectopic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_Ectopic"><?= $Page->Ectopic->caption() ?><?= $Page->Ectopic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Ectopic->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_Ectopic"><span id="el_view_ivf_treatment_plan_Ectopic">
<input type="<?= $Page->Ectopic->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_Ectopic" name="x_Ectopic" id="x_Ectopic" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Ectopic->getPlaceHolder()) ?>" value="<?= $Page->Ectopic->EditValue ?>"<?= $Page->Ectopic->editAttributes() ?> aria-describedby="x_Ectopic_help">
<?= $Page->Ectopic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Ectopic->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Heterotopic->Visible) { // Heterotopic ?>
    <div id="r_Heterotopic" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_Heterotopic" for="x_Heterotopic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_Heterotopic"><?= $Page->Heterotopic->caption() ?><?= $Page->Heterotopic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Heterotopic->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_Heterotopic"><span id="el_view_ivf_treatment_plan_Heterotopic">
    <select
        id="x_Heterotopic"
        name="x_Heterotopic"
        class="form-control ew-select<?= $Page->Heterotopic->isInvalidClass() ?>"
        data-select2-id="view_ivf_treatment_plan_x_Heterotopic"
        data-table="view_ivf_treatment_plan"
        data-field="x_Heterotopic"
        data-value-separator="<?= $Page->Heterotopic->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Heterotopic->getPlaceHolder()) ?>"
        <?= $Page->Heterotopic->editAttributes() ?>>
        <?= $Page->Heterotopic->selectOptionListHtml("x_Heterotopic") ?>
    </select>
    <?= $Page->Heterotopic->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Heterotopic->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_ivf_treatment_plan_x_Heterotopic']"),
        options = { name: "x_Heterotopic", selectId: "view_ivf_treatment_plan_x_Heterotopic", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_ivf_treatment_plan.fields.Heterotopic.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ivf_treatment_plan.fields.Heterotopic.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TransferDFE->Visible) { // TransferDFE ?>
    <div id="r_TransferDFE" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_TransferDFE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_TransferDFE"><?= $Page->TransferDFE->caption() ?><?= $Page->TransferDFE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TransferDFE->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_TransferDFE"><span id="el_view_ivf_treatment_plan_TransferDFE">
<template id="tp_x_TransferDFE">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_ivf_treatment_plan" data-field="x_TransferDFE" name="x_TransferDFE" id="x_TransferDFE"<?= $Page->TransferDFE->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_TransferDFE" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_TransferDFE[]"
    name="x_TransferDFE[]"
    value="<?= HtmlEncode($Page->TransferDFE->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_TransferDFE"
    data-target="dsl_x_TransferDFE"
    data-repeatcolumn="5"
    class="form-control<?= $Page->TransferDFE->isInvalidClass() ?>"
    data-table="view_ivf_treatment_plan"
    data-field="x_TransferDFE"
    data-value-separator="<?= $Page->TransferDFE->displayValueSeparatorAttribute() ?>"
    <?= $Page->TransferDFE->editAttributes() ?>>
<?= $Page->TransferDFE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TransferDFE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Evolutive->Visible) { // Evolutive ?>
    <div id="r_Evolutive" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_Evolutive" for="x_Evolutive" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_Evolutive"><?= $Page->Evolutive->caption() ?><?= $Page->Evolutive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Evolutive->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_Evolutive"><span id="el_view_ivf_treatment_plan_Evolutive">
<input type="<?= $Page->Evolutive->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_Evolutive" name="x_Evolutive" id="x_Evolutive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Evolutive->getPlaceHolder()) ?>" value="<?= $Page->Evolutive->EditValue ?>"<?= $Page->Evolutive->editAttributes() ?> aria-describedby="x_Evolutive_help">
<?= $Page->Evolutive->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Evolutive->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Number->Visible) { // Number ?>
    <div id="r_Number" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_Number" for="x_Number" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_Number"><?= $Page->Number->caption() ?><?= $Page->Number->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Number->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_Number"><span id="el_view_ivf_treatment_plan_Number">
<input type="<?= $Page->Number->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_Number" name="x_Number" id="x_Number" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Number->getPlaceHolder()) ?>" value="<?= $Page->Number->EditValue ?>"<?= $Page->Number->editAttributes() ?> aria-describedby="x_Number_help">
<?= $Page->Number->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Number->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SequentialCult->Visible) { // SequentialCult ?>
    <div id="r_SequentialCult" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_SequentialCult" for="x_SequentialCult" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_SequentialCult"><?= $Page->SequentialCult->caption() ?><?= $Page->SequentialCult->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SequentialCult->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_SequentialCult"><span id="el_view_ivf_treatment_plan_SequentialCult">
<input type="<?= $Page->SequentialCult->getInputTextType() ?>" data-table="view_ivf_treatment_plan" data-field="x_SequentialCult" name="x_SequentialCult" id="x_SequentialCult" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SequentialCult->getPlaceHolder()) ?>" value="<?= $Page->SequentialCult->EditValue ?>"<?= $Page->SequentialCult->editAttributes() ?> aria-describedby="x_SequentialCult_help">
<?= $Page->SequentialCult->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SequentialCult->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TineLapse->Visible) { // TineLapse ?>
    <div id="r_TineLapse" class="form-group row">
        <label id="elh_view_ivf_treatment_plan_TineLapse" for="x_TineLapse" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_ivf_treatment_plan_TineLapse"><?= $Page->TineLapse->caption() ?><?= $Page->TineLapse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TineLapse->cellAttributes() ?>>
<template id="tpx_view_ivf_treatment_plan_TineLapse"><span id="el_view_ivf_treatment_plan_TineLapse">
    <select
        id="x_TineLapse"
        name="x_TineLapse"
        class="form-control ew-select<?= $Page->TineLapse->isInvalidClass() ?>"
        data-select2-id="view_ivf_treatment_plan_x_TineLapse"
        data-table="view_ivf_treatment_plan"
        data-field="x_TineLapse"
        data-value-separator="<?= $Page->TineLapse->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TineLapse->getPlaceHolder()) ?>"
        <?= $Page->TineLapse->editAttributes() ?>>
        <?= $Page->TineLapse->selectOptionListHtml("x_TineLapse") ?>
    </select>
    <?= $Page->TineLapse->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->TineLapse->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_ivf_treatment_plan_x_TineLapse']"),
        options = { name: "x_TineLapse", selectId: "view_ivf_treatment_plan_x_TineLapse", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_ivf_treatment_plan.fields.TineLapse.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_ivf_treatment_plan.fields.TineLapse.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_ivf_treatment_planadd" class="ew-custom-template"></div>
<template id="tpm_view_ivf_treatment_planadd">
<div id="ct_ViewIvfTreatmentPlanAdd"><style>
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
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$Tid = $_GET["id"] ;
$showmaster = $_GET["showmaster"] ;
if( $showmaster=="ivf_treatment_plan")
{
$sql = "SELECT * FROM ganeshkumar_bjhims.view_ivf_treatment where id='".$Tid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$results[0]["RIDNO"]."'; ";
$results = $dbhelper->ExecuteRows($sql);
}else{
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
}
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
<slot class="ew-slot" name="tpc_view_ivf_treatment_plan_RIDNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_RIDNO"></slot>
<div id="divCheckbox" style="display: none;">
<slot class="ew-slot" name="tpc_view_ivf_treatment_plan_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_PatientName"></slot>
<slot class="ew-slot" name="tpc_view_ivf_treatment_plan_PatientID"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_PatientID"></slot>
<slot class="ew-slot" name="tpc_view_ivf_treatment_plan_PartnerName"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_PartnerName"></slot>
<slot class="ew-slot" name="tpc_view_ivf_treatment_plan_PartnerID"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_PartnerID"></slot>
<slot class="ew-slot" name="tpc_view_ivf_treatment_plan_WifeCell"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_WifeCell"></slot>
<slot class="ew-slot" name="tpc_view_ivf_treatment_plan_HusbandCell"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_HusbandCell"></slot>
<slot class="ew-slot" name="tpc_view_ivf_treatment_plan_Name"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_Name"></slot>
<slot class="ew-slot" name="tpc_view_ivf_treatment_plan_CoupleID"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_CoupleID"></slot>
</div>
<div class="row">
<div id="patientdataview" class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span id="SemPatientId" class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span id="SemPatientPatientName" class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span id="SemPatientGender" class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span id="SemPatientBloodGroup" class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient"  class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span id="SemPatientAge" class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 id="SemPatientMobile" class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 id="SemPatientEmail" class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
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
<div id="partnerdataview" class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span id="SemPartnerId" class="ew-cell">Partner Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span id="SemPartnerPatientName" class="ew-cell">Partner Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span id="SemPartnerGender" class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span id="SemPartnerBloodGroup" class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="SemPartnerprofilePicturePatient"  class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span id="SemPartnerAge" class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 id="SemPartnerMobile" class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 id="SemPartnerEmail" class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
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
				<h3 class="card-title">Plan</h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td    style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_FemaleIndications"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_FemaleIndications"></slot></span>
						</td>
						<td   style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_MaleIndications"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_MaleIndications"></slot></span>
						</td>
					</tr>
	</tbody>
			</table>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_ARTCYCLE"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_ARTCYCLE"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Treatment</h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td  id="Treatment"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_Treatment"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_Treatment"></slot></span>
						</td>
						<td  id="TreatmentTec" style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_TreatmentTec"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_TreatmentTec"></slot></span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="TypeOfCycle"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_TypeOfCycle"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_TypeOfCycle"></slot></span>
						</td>
						<td id="SpermOrgin"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_SpermOrgin"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_SpermOrgin"></slot></span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="State"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_State"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_State"></slot></span>
						</td>
						<td id="Origin"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_Origin"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_Origin"></slot></span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
						<tr>
						<td id="MACS"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_MACS"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_MACS"></slot></span>
						</td>
						<td  id="Technique" style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_Technique"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_Technique"></slot></span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="PgdPlanning"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_PgdPlanning"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_PgdPlanning"></slot></span>
						</td>
						<td id="IMSI"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_IMSI"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_IMSI"></slot></span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
						<tr>
						<td id="SequentialCulture"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_SequentialCulture"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_SequentialCulture"></slot></span>
						</td>
						<td id="TimeLapse"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_TimeLapse"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_TimeLapse"></slot></span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
						<tr>
						<td id="AH"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_AH"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_AH"></slot></span>
						</td>
						<td id="Weight"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_Weight"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_Weight"></slot></span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="BMI"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_BMI"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_BMI"></slot></span>
						</td>
						<td id="aaa"  style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
					</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
					<tbody>
					<tr>
						<td id="Ectopic"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_Ectopic"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_Ectopic"></slot></span>
						</td>
						<td id="use"  style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_UseOfThe"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_UseOfThe"></slot></span>
						</td>
					</tr>
					</tbody>
			</table>
			  <!-- /.card-body -->
			<table class="ew-table" style="width:100%;">
					<tbody>
			  		<tr id="TreatmentTreatment">
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_TransferDFE"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_TransferDFE"></slot></span>
						</td>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_Evolutive"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_Evolutive"></slot></span>
						</td>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_Number"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_Number"></slot></span>
						</td>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_SequentialCult"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_SequentialCult"></slot></span>
						</td>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_TineLapse"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_TineLapse"></slot></span>
						</td>
												<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_view_ivf_treatment_plan_Heterotopic"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_ivf_treatment_plan_Heterotopic"></slot></span>
						</td>
					</tr>				
					</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
<input type="hidden" id="Repagehistoryview" name="Repagehistoryview" value="3487">
<table class="ew-table">
	 <tbody>
		<tr>
			<td>
				<button class="btn bg-secondary btn-lg" onClick="callHomeFunction()">Home</button>
			</td>
			<td>
				<button class="btn bg-info btn-lg" onClick="callSaveFunction()">Save</button>
			</td>
			<td>
				<button class="btn bg-warning btn-lg" onClick="callViewFunction()">View</button>
			</td>
			<td>
				<button class="btn bg-success btn-lg" onClick="callNextFunction()">Next</button>
			</td>
		</tr>
	</tbody>
</table>
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
    ew.applyTemplate("tpd_view_ivf_treatment_planadd", "tpm_view_ivf_treatment_planadd", "view_ivf_treatment_planadd", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("view_ivf_treatment_plan");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    function callSaveFunction(){document.getElementById("Repagehistoryview").value="EditFunction"}function callViewFunction(){document.getElementById("Repagehistoryview").value="ViewFunction"}function callNextFunction(){document.getElementById("Repagehistoryview").value="NextFunction"}function callHomeFunction(){document.getElementById("Repagehistoryview").value="HomeFunction"}document.getElementById("Treatment").style.display="none",document.getElementById("TreatmentTec").style.display="none",document.getElementById("TypeOfCycle").style.display="none",document.getElementById("SpermOrgin").style.display="none",document.getElementById("State").style.display="none",document.getElementById("Origin").style.display="none",document.getElementById("MACS").style.display="none",document.getElementById("Technique").style.display="none",document.getElementById("PgdPlanning").style.display="none",document.getElementById("IMSI").style.display="none",document.getElementById("SequentialCulture").style.display="none",document.getElementById("TimeLapse").style.display="none",document.getElementById("AH").style.display="none",document.getElementById("Weight").style.display="none",document.getElementById("BMI").style.display="none",document.getElementById("TreatmentTreatment").style.display="none",document.getElementById("Ectopic").style.display="none",document.getElementById("use").style.display="none";
});
</script>

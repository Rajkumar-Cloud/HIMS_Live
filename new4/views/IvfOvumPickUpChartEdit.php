<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfOvumPickUpChartEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_ovum_pick_up_chartedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fivf_ovum_pick_up_chartedit = currentForm = new ew.Form("fivf_ovum_pick_up_chartedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_ovum_pick_up_chart")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_ovum_pick_up_chart)
        ew.vars.tables.ivf_ovum_pick_up_chart = currentTable;
    fivf_ovum_pick_up_chartedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["RIDNo", [fields.RIDNo.visible && fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null, ew.Validators.integer], fields.RIDNo.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["ARTCycle", [fields.ARTCycle.visible && fields.ARTCycle.required ? ew.Validators.required(fields.ARTCycle.caption) : null], fields.ARTCycle.isInvalid],
        ["Consultant", [fields.Consultant.visible && fields.Consultant.required ? ew.Validators.required(fields.Consultant.caption) : null], fields.Consultant.isInvalid],
        ["TotalDoseOfStimulation", [fields.TotalDoseOfStimulation.visible && fields.TotalDoseOfStimulation.required ? ew.Validators.required(fields.TotalDoseOfStimulation.caption) : null], fields.TotalDoseOfStimulation.isInvalid],
        ["Protocol", [fields.Protocol.visible && fields.Protocol.required ? ew.Validators.required(fields.Protocol.caption) : null], fields.Protocol.isInvalid],
        ["NumberOfDaysOfStimulation", [fields.NumberOfDaysOfStimulation.visible && fields.NumberOfDaysOfStimulation.required ? ew.Validators.required(fields.NumberOfDaysOfStimulation.caption) : null], fields.NumberOfDaysOfStimulation.isInvalid],
        ["TriggerDateTime", [fields.TriggerDateTime.visible && fields.TriggerDateTime.required ? ew.Validators.required(fields.TriggerDateTime.caption) : null, ew.Validators.datetime(0)], fields.TriggerDateTime.isInvalid],
        ["OPUDateTime", [fields.OPUDateTime.visible && fields.OPUDateTime.required ? ew.Validators.required(fields.OPUDateTime.caption) : null, ew.Validators.datetime(0)], fields.OPUDateTime.isInvalid],
        ["HoursAfterTrigger", [fields.HoursAfterTrigger.visible && fields.HoursAfterTrigger.required ? ew.Validators.required(fields.HoursAfterTrigger.caption) : null], fields.HoursAfterTrigger.isInvalid],
        ["SerumE2", [fields.SerumE2.visible && fields.SerumE2.required ? ew.Validators.required(fields.SerumE2.caption) : null], fields.SerumE2.isInvalid],
        ["SerumP4", [fields.SerumP4.visible && fields.SerumP4.required ? ew.Validators.required(fields.SerumP4.caption) : null], fields.SerumP4.isInvalid],
        ["FORT", [fields.FORT.visible && fields.FORT.required ? ew.Validators.required(fields.FORT.caption) : null], fields.FORT.isInvalid],
        ["ExperctedOocytes", [fields.ExperctedOocytes.visible && fields.ExperctedOocytes.required ? ew.Validators.required(fields.ExperctedOocytes.caption) : null], fields.ExperctedOocytes.isInvalid],
        ["NoOfOocytesRetrieved", [fields.NoOfOocytesRetrieved.visible && fields.NoOfOocytesRetrieved.required ? ew.Validators.required(fields.NoOfOocytesRetrieved.caption) : null], fields.NoOfOocytesRetrieved.isInvalid],
        ["OocytesRetreivalRate", [fields.OocytesRetreivalRate.visible && fields.OocytesRetreivalRate.required ? ew.Validators.required(fields.OocytesRetreivalRate.caption) : null], fields.OocytesRetreivalRate.isInvalid],
        ["Anesthesia", [fields.Anesthesia.visible && fields.Anesthesia.required ? ew.Validators.required(fields.Anesthesia.caption) : null], fields.Anesthesia.isInvalid],
        ["TrialCannulation", [fields.TrialCannulation.visible && fields.TrialCannulation.required ? ew.Validators.required(fields.TrialCannulation.caption) : null], fields.TrialCannulation.isInvalid],
        ["UCL", [fields.UCL.visible && fields.UCL.required ? ew.Validators.required(fields.UCL.caption) : null], fields.UCL.isInvalid],
        ["Angle", [fields.Angle.visible && fields.Angle.required ? ew.Validators.required(fields.Angle.caption) : null], fields.Angle.isInvalid],
        ["EMS", [fields.EMS.visible && fields.EMS.required ? ew.Validators.required(fields.EMS.caption) : null], fields.EMS.isInvalid],
        ["Cannulation", [fields.Cannulation.visible && fields.Cannulation.required ? ew.Validators.required(fields.Cannulation.caption) : null], fields.Cannulation.isInvalid],
        ["ProcedureT", [fields.ProcedureT.visible && fields.ProcedureT.required ? ew.Validators.required(fields.ProcedureT.caption) : null], fields.ProcedureT.isInvalid],
        ["NoOfOocytesRetrievedd", [fields.NoOfOocytesRetrievedd.visible && fields.NoOfOocytesRetrievedd.required ? ew.Validators.required(fields.NoOfOocytesRetrievedd.caption) : null], fields.NoOfOocytesRetrievedd.isInvalid],
        ["CourseInHospital", [fields.CourseInHospital.visible && fields.CourseInHospital.required ? ew.Validators.required(fields.CourseInHospital.caption) : null], fields.CourseInHospital.isInvalid],
        ["DischargeAdvise", [fields.DischargeAdvise.visible && fields.DischargeAdvise.required ? ew.Validators.required(fields.DischargeAdvise.caption) : null], fields.DischargeAdvise.isInvalid],
        ["FollowUpAdvise", [fields.FollowUpAdvise.visible && fields.FollowUpAdvise.required ? ew.Validators.required(fields.FollowUpAdvise.caption) : null], fields.FollowUpAdvise.isInvalid],
        ["PlanT", [fields.PlanT.visible && fields.PlanT.required ? ew.Validators.required(fields.PlanT.caption) : null], fields.PlanT.isInvalid],
        ["ReviewDate", [fields.ReviewDate.visible && fields.ReviewDate.required ? ew.Validators.required(fields.ReviewDate.caption) : null, ew.Validators.datetime(0)], fields.ReviewDate.isInvalid],
        ["ReviewDoctor", [fields.ReviewDoctor.visible && fields.ReviewDoctor.required ? ew.Validators.required(fields.ReviewDoctor.caption) : null], fields.ReviewDoctor.isInvalid],
        ["TemplateProcedure", [fields.TemplateProcedure.visible && fields.TemplateProcedure.required ? ew.Validators.required(fields.TemplateProcedure.caption) : null], fields.TemplateProcedure.isInvalid],
        ["TemplateCourseInHospital", [fields.TemplateCourseInHospital.visible && fields.TemplateCourseInHospital.required ? ew.Validators.required(fields.TemplateCourseInHospital.caption) : null], fields.TemplateCourseInHospital.isInvalid],
        ["TemplateDischargeAdvise", [fields.TemplateDischargeAdvise.visible && fields.TemplateDischargeAdvise.required ? ew.Validators.required(fields.TemplateDischargeAdvise.caption) : null], fields.TemplateDischargeAdvise.isInvalid],
        ["TemplateFollowUpAdvise", [fields.TemplateFollowUpAdvise.visible && fields.TemplateFollowUpAdvise.required ? ew.Validators.required(fields.TemplateFollowUpAdvise.caption) : null], fields.TemplateFollowUpAdvise.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_ovum_pick_up_chartedit,
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
    fivf_ovum_pick_up_chartedit.validate = function () {
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
    fivf_ovum_pick_up_chartedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_ovum_pick_up_chartedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_ovum_pick_up_chartedit.lists.Protocol = <?= $Page->Protocol->toClientList($Page) ?>;
    fivf_ovum_pick_up_chartedit.lists.Cannulation = <?= $Page->Cannulation->toClientList($Page) ?>;
    fivf_ovum_pick_up_chartedit.lists.PlanT = <?= $Page->PlanT->toClientList($Page) ?>;
    fivf_ovum_pick_up_chartedit.lists.TemplateProcedure = <?= $Page->TemplateProcedure->toClientList($Page) ?>;
    fivf_ovum_pick_up_chartedit.lists.TemplateCourseInHospital = <?= $Page->TemplateCourseInHospital->toClientList($Page) ?>;
    fivf_ovum_pick_up_chartedit.lists.TemplateDischargeAdvise = <?= $Page->TemplateDischargeAdvise->toClientList($Page) ?>;
    fivf_ovum_pick_up_chartedit.lists.TemplateFollowUpAdvise = <?= $Page->TemplateFollowUpAdvise->toClientList($Page) ?>;
    loadjs.done("fivf_ovum_pick_up_chartedit");
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
<form name="fivf_ovum_pick_up_chartedit" id="fivf_ovum_pick_up_chartedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_ovum_pick_up_chart">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_id"><span id="el_ivf_ovum_pick_up_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_RIDNo" for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_RIDNo"><?= $Page->RIDNo->caption() ?><?= $Page->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_RIDNo"><span id="el_ivf_ovum_pick_up_chart_RIDNo">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?> aria-describedby="x_RIDNo_help">
<?= $Page->RIDNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_Name"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_Name"><span id="el_ivf_ovum_pick_up_chart_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
    <div id="r_ARTCycle" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_ARTCycle" for="x_ARTCycle" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_ARTCycle"><?= $Page->ARTCycle->caption() ?><?= $Page->ARTCycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ARTCycle->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_ARTCycle"><span id="el_ivf_ovum_pick_up_chart_ARTCycle">
<input type="<?= $Page->ARTCycle->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_ARTCycle" name="x_ARTCycle" id="x_ARTCycle" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ARTCycle->getPlaceHolder()) ?>" value="<?= $Page->ARTCycle->EditValue ?>"<?= $Page->ARTCycle->editAttributes() ?> aria-describedby="x_ARTCycle_help">
<?= $Page->ARTCycle->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ARTCycle->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <div id="r_Consultant" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_Consultant" for="x_Consultant" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_Consultant"><?= $Page->Consultant->caption() ?><?= $Page->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Consultant->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_Consultant"><span id="el_ivf_ovum_pick_up_chart_Consultant">
<input type="<?= $Page->Consultant->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Consultant->getPlaceHolder()) ?>" value="<?= $Page->Consultant->EditValue ?>"<?= $Page->Consultant->editAttributes() ?> aria-describedby="x_Consultant_help">
<?= $Page->Consultant->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Consultant->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
    <div id="r_TotalDoseOfStimulation" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" for="x_TotalDoseOfStimulation" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_TotalDoseOfStimulation"><?= $Page->TotalDoseOfStimulation->caption() ?><?= $Page->TotalDoseOfStimulation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalDoseOfStimulation->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_TotalDoseOfStimulation"><span id="el_ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
<input type="<?= $Page->TotalDoseOfStimulation->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_TotalDoseOfStimulation" name="x_TotalDoseOfStimulation" id="x_TotalDoseOfStimulation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TotalDoseOfStimulation->getPlaceHolder()) ?>" value="<?= $Page->TotalDoseOfStimulation->EditValue ?>"<?= $Page->TotalDoseOfStimulation->editAttributes() ?> aria-describedby="x_TotalDoseOfStimulation_help">
<?= $Page->TotalDoseOfStimulation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalDoseOfStimulation->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Protocol->Visible) { // Protocol ?>
    <div id="r_Protocol" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_Protocol" for="x_Protocol" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_Protocol"><?= $Page->Protocol->caption() ?><?= $Page->Protocol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Protocol->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_Protocol"><span id="el_ivf_ovum_pick_up_chart_Protocol">
    <select
        id="x_Protocol"
        name="x_Protocol"
        class="form-control ew-select<?= $Page->Protocol->isInvalidClass() ?>"
        data-select2-id="ivf_ovum_pick_up_chart_x_Protocol"
        data-table="ivf_ovum_pick_up_chart"
        data-field="x_Protocol"
        data-value-separator="<?= $Page->Protocol->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Protocol->getPlaceHolder()) ?>"
        <?= $Page->Protocol->editAttributes() ?>>
        <?= $Page->Protocol->selectOptionListHtml("x_Protocol") ?>
    </select>
    <?= $Page->Protocol->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Protocol->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_ovum_pick_up_chart_x_Protocol']"),
        options = { name: "x_Protocol", selectId: "ivf_ovum_pick_up_chart_x_Protocol", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_ovum_pick_up_chart.fields.Protocol.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_ovum_pick_up_chart.fields.Protocol.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
    <div id="r_NumberOfDaysOfStimulation" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" for="x_NumberOfDaysOfStimulation" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"><?= $Page->NumberOfDaysOfStimulation->caption() ?><?= $Page->NumberOfDaysOfStimulation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NumberOfDaysOfStimulation->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"><span id="el_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
<input type="<?= $Page->NumberOfDaysOfStimulation->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_NumberOfDaysOfStimulation" name="x_NumberOfDaysOfStimulation" id="x_NumberOfDaysOfStimulation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NumberOfDaysOfStimulation->getPlaceHolder()) ?>" value="<?= $Page->NumberOfDaysOfStimulation->EditValue ?>"<?= $Page->NumberOfDaysOfStimulation->editAttributes() ?> aria-describedby="x_NumberOfDaysOfStimulation_help">
<?= $Page->NumberOfDaysOfStimulation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NumberOfDaysOfStimulation->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TriggerDateTime->Visible) { // TriggerDateTime ?>
    <div id="r_TriggerDateTime" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_TriggerDateTime" for="x_TriggerDateTime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_TriggerDateTime"><?= $Page->TriggerDateTime->caption() ?><?= $Page->TriggerDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TriggerDateTime->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_TriggerDateTime"><span id="el_ivf_ovum_pick_up_chart_TriggerDateTime">
<input type="<?= $Page->TriggerDateTime->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_TriggerDateTime" name="x_TriggerDateTime" id="x_TriggerDateTime" placeholder="<?= HtmlEncode($Page->TriggerDateTime->getPlaceHolder()) ?>" value="<?= $Page->TriggerDateTime->EditValue ?>"<?= $Page->TriggerDateTime->editAttributes() ?> aria-describedby="x_TriggerDateTime_help">
<?= $Page->TriggerDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TriggerDateTime->getErrorMessage() ?></div>
<?php if (!$Page->TriggerDateTime->ReadOnly && !$Page->TriggerDateTime->Disabled && !isset($Page->TriggerDateTime->EditAttrs["readonly"]) && !isset($Page->TriggerDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_ovum_pick_up_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_ovum_pick_up_chartedit", "x_TriggerDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OPUDateTime->Visible) { // OPUDateTime ?>
    <div id="r_OPUDateTime" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_OPUDateTime" for="x_OPUDateTime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_OPUDateTime"><?= $Page->OPUDateTime->caption() ?><?= $Page->OPUDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OPUDateTime->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_OPUDateTime"><span id="el_ivf_ovum_pick_up_chart_OPUDateTime">
<input type="<?= $Page->OPUDateTime->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_OPUDateTime" name="x_OPUDateTime" id="x_OPUDateTime" placeholder="<?= HtmlEncode($Page->OPUDateTime->getPlaceHolder()) ?>" value="<?= $Page->OPUDateTime->EditValue ?>"<?= $Page->OPUDateTime->editAttributes() ?> aria-describedby="x_OPUDateTime_help">
<?= $Page->OPUDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OPUDateTime->getErrorMessage() ?></div>
<?php if (!$Page->OPUDateTime->ReadOnly && !$Page->OPUDateTime->Disabled && !isset($Page->OPUDateTime->EditAttrs["readonly"]) && !isset($Page->OPUDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_ovum_pick_up_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_ovum_pick_up_chartedit", "x_OPUDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
    <div id="r_HoursAfterTrigger" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_HoursAfterTrigger" for="x_HoursAfterTrigger" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_HoursAfterTrigger"><?= $Page->HoursAfterTrigger->caption() ?><?= $Page->HoursAfterTrigger->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HoursAfterTrigger->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_HoursAfterTrigger"><span id="el_ivf_ovum_pick_up_chart_HoursAfterTrigger">
<input type="<?= $Page->HoursAfterTrigger->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_HoursAfterTrigger" name="x_HoursAfterTrigger" id="x_HoursAfterTrigger" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HoursAfterTrigger->getPlaceHolder()) ?>" value="<?= $Page->HoursAfterTrigger->EditValue ?>"<?= $Page->HoursAfterTrigger->editAttributes() ?> aria-describedby="x_HoursAfterTrigger_help">
<?= $Page->HoursAfterTrigger->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HoursAfterTrigger->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SerumE2->Visible) { // SerumE2 ?>
    <div id="r_SerumE2" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_SerumE2" for="x_SerumE2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_SerumE2"><?= $Page->SerumE2->caption() ?><?= $Page->SerumE2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SerumE2->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_SerumE2"><span id="el_ivf_ovum_pick_up_chart_SerumE2">
<input type="<?= $Page->SerumE2->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumE2" name="x_SerumE2" id="x_SerumE2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SerumE2->getPlaceHolder()) ?>" value="<?= $Page->SerumE2->EditValue ?>"<?= $Page->SerumE2->editAttributes() ?> aria-describedby="x_SerumE2_help">
<?= $Page->SerumE2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SerumE2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SerumP4->Visible) { // SerumP4 ?>
    <div id="r_SerumP4" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_SerumP4" for="x_SerumP4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_SerumP4"><?= $Page->SerumP4->caption() ?><?= $Page->SerumP4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SerumP4->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_SerumP4"><span id="el_ivf_ovum_pick_up_chart_SerumP4">
<input type="<?= $Page->SerumP4->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumP4" name="x_SerumP4" id="x_SerumP4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SerumP4->getPlaceHolder()) ?>" value="<?= $Page->SerumP4->EditValue ?>"<?= $Page->SerumP4->editAttributes() ?> aria-describedby="x_SerumP4_help">
<?= $Page->SerumP4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SerumP4->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FORT->Visible) { // FORT ?>
    <div id="r_FORT" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_FORT" for="x_FORT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_FORT"><?= $Page->FORT->caption() ?><?= $Page->FORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FORT->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_FORT"><span id="el_ivf_ovum_pick_up_chart_FORT">
<input type="<?= $Page->FORT->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_FORT" name="x_FORT" id="x_FORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FORT->getPlaceHolder()) ?>" value="<?= $Page->FORT->EditValue ?>"<?= $Page->FORT->editAttributes() ?> aria-describedby="x_FORT_help">
<?= $Page->FORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FORT->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
    <div id="r_ExperctedOocytes" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_ExperctedOocytes" for="x_ExperctedOocytes" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_ExperctedOocytes"><?= $Page->ExperctedOocytes->caption() ?><?= $Page->ExperctedOocytes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ExperctedOocytes->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_ExperctedOocytes"><span id="el_ivf_ovum_pick_up_chart_ExperctedOocytes">
<input type="<?= $Page->ExperctedOocytes->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_ExperctedOocytes" name="x_ExperctedOocytes" id="x_ExperctedOocytes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ExperctedOocytes->getPlaceHolder()) ?>" value="<?= $Page->ExperctedOocytes->EditValue ?>"<?= $Page->ExperctedOocytes->editAttributes() ?> aria-describedby="x_ExperctedOocytes_help">
<?= $Page->ExperctedOocytes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ExperctedOocytes->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
    <div id="r_NoOfOocytesRetrieved" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" for="x_NoOfOocytesRetrieved" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"><?= $Page->NoOfOocytesRetrieved->caption() ?><?= $Page->NoOfOocytesRetrieved->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoOfOocytesRetrieved->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"><span id="el_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
<input type="<?= $Page->NoOfOocytesRetrieved->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrieved" name="x_NoOfOocytesRetrieved" id="x_NoOfOocytesRetrieved" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NoOfOocytesRetrieved->getPlaceHolder()) ?>" value="<?= $Page->NoOfOocytesRetrieved->EditValue ?>"<?= $Page->NoOfOocytesRetrieved->editAttributes() ?> aria-describedby="x_NoOfOocytesRetrieved_help">
<?= $Page->NoOfOocytesRetrieved->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoOfOocytesRetrieved->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
    <div id="r_OocytesRetreivalRate" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_OocytesRetreivalRate" for="x_OocytesRetreivalRate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_OocytesRetreivalRate"><?= $Page->OocytesRetreivalRate->caption() ?><?= $Page->OocytesRetreivalRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OocytesRetreivalRate->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_OocytesRetreivalRate"><span id="el_ivf_ovum_pick_up_chart_OocytesRetreivalRate">
<input type="<?= $Page->OocytesRetreivalRate->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_OocytesRetreivalRate" name="x_OocytesRetreivalRate" id="x_OocytesRetreivalRate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocytesRetreivalRate->getPlaceHolder()) ?>" value="<?= $Page->OocytesRetreivalRate->EditValue ?>"<?= $Page->OocytesRetreivalRate->editAttributes() ?> aria-describedby="x_OocytesRetreivalRate_help">
<?= $Page->OocytesRetreivalRate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OocytesRetreivalRate->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Anesthesia->Visible) { // Anesthesia ?>
    <div id="r_Anesthesia" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_Anesthesia" for="x_Anesthesia" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_Anesthesia"><?= $Page->Anesthesia->caption() ?><?= $Page->Anesthesia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Anesthesia->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_Anesthesia"><span id="el_ivf_ovum_pick_up_chart_Anesthesia">
<input type="<?= $Page->Anesthesia->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_Anesthesia" name="x_Anesthesia" id="x_Anesthesia" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Anesthesia->getPlaceHolder()) ?>" value="<?= $Page->Anesthesia->EditValue ?>"<?= $Page->Anesthesia->editAttributes() ?> aria-describedby="x_Anesthesia_help">
<?= $Page->Anesthesia->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Anesthesia->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
    <div id="r_TrialCannulation" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_TrialCannulation" for="x_TrialCannulation" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_TrialCannulation"><?= $Page->TrialCannulation->caption() ?><?= $Page->TrialCannulation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TrialCannulation->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_TrialCannulation"><span id="el_ivf_ovum_pick_up_chart_TrialCannulation">
<input type="<?= $Page->TrialCannulation->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_TrialCannulation" name="x_TrialCannulation" id="x_TrialCannulation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TrialCannulation->getPlaceHolder()) ?>" value="<?= $Page->TrialCannulation->EditValue ?>"<?= $Page->TrialCannulation->editAttributes() ?> aria-describedby="x_TrialCannulation_help">
<?= $Page->TrialCannulation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TrialCannulation->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UCL->Visible) { // UCL ?>
    <div id="r_UCL" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_UCL" for="x_UCL" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_UCL"><?= $Page->UCL->caption() ?><?= $Page->UCL->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UCL->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_UCL"><span id="el_ivf_ovum_pick_up_chart_UCL">
<input type="<?= $Page->UCL->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_UCL" name="x_UCL" id="x_UCL" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UCL->getPlaceHolder()) ?>" value="<?= $Page->UCL->EditValue ?>"<?= $Page->UCL->editAttributes() ?> aria-describedby="x_UCL_help">
<?= $Page->UCL->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UCL->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Angle->Visible) { // Angle ?>
    <div id="r_Angle" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_Angle" for="x_Angle" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_Angle"><?= $Page->Angle->caption() ?><?= $Page->Angle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Angle->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_Angle"><span id="el_ivf_ovum_pick_up_chart_Angle">
<input type="<?= $Page->Angle->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_Angle" name="x_Angle" id="x_Angle" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Angle->getPlaceHolder()) ?>" value="<?= $Page->Angle->EditValue ?>"<?= $Page->Angle->editAttributes() ?> aria-describedby="x_Angle_help">
<?= $Page->Angle->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Angle->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EMS->Visible) { // EMS ?>
    <div id="r_EMS" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_EMS" for="x_EMS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_EMS"><?= $Page->EMS->caption() ?><?= $Page->EMS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EMS->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_EMS"><span id="el_ivf_ovum_pick_up_chart_EMS">
<input type="<?= $Page->EMS->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_EMS" name="x_EMS" id="x_EMS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EMS->getPlaceHolder()) ?>" value="<?= $Page->EMS->EditValue ?>"<?= $Page->EMS->editAttributes() ?> aria-describedby="x_EMS_help">
<?= $Page->EMS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EMS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Cannulation->Visible) { // Cannulation ?>
    <div id="r_Cannulation" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_Cannulation" for="x_Cannulation" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_Cannulation"><?= $Page->Cannulation->caption() ?><?= $Page->Cannulation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Cannulation->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_Cannulation"><span id="el_ivf_ovum_pick_up_chart_Cannulation">
    <select
        id="x_Cannulation"
        name="x_Cannulation"
        class="form-control ew-select<?= $Page->Cannulation->isInvalidClass() ?>"
        data-select2-id="ivf_ovum_pick_up_chart_x_Cannulation"
        data-table="ivf_ovum_pick_up_chart"
        data-field="x_Cannulation"
        data-value-separator="<?= $Page->Cannulation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Cannulation->getPlaceHolder()) ?>"
        <?= $Page->Cannulation->editAttributes() ?>>
        <?= $Page->Cannulation->selectOptionListHtml("x_Cannulation") ?>
    </select>
    <?= $Page->Cannulation->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Cannulation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_ovum_pick_up_chart_x_Cannulation']"),
        options = { name: "x_Cannulation", selectId: "ivf_ovum_pick_up_chart_x_Cannulation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_ovum_pick_up_chart.fields.Cannulation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_ovum_pick_up_chart.fields.Cannulation.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureT->Visible) { // ProcedureT ?>
    <div id="r_ProcedureT" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_ProcedureT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_ProcedureT"><?= $Page->ProcedureT->caption() ?><?= $Page->ProcedureT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureT->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_ProcedureT"><span id="el_ivf_ovum_pick_up_chart_ProcedureT">
<?php $Page->ProcedureT->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_ovum_pick_up_chart" data-field="x_ProcedureT" name="x_ProcedureT" id="x_ProcedureT" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->ProcedureT->getPlaceHolder()) ?>"<?= $Page->ProcedureT->editAttributes() ?> aria-describedby="x_ProcedureT_help"><?= $Page->ProcedureT->EditValue ?></textarea>
<?= $Page->ProcedureT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProcedureT->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_ovum_pick_up_chartedit", "editor"], function() {
	ew.createEditor("fivf_ovum_pick_up_chartedit", "x_ProcedureT", 35, 4, <?= $Page->ProcedureT->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
    <div id="r_NoOfOocytesRetrievedd" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" for="x_NoOfOocytesRetrievedd" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"><?= $Page->NoOfOocytesRetrievedd->caption() ?><?= $Page->NoOfOocytesRetrievedd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoOfOocytesRetrievedd->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"><span id="el_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
<input type="<?= $Page->NoOfOocytesRetrievedd->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrievedd" name="x_NoOfOocytesRetrievedd" id="x_NoOfOocytesRetrievedd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NoOfOocytesRetrievedd->getPlaceHolder()) ?>" value="<?= $Page->NoOfOocytesRetrievedd->EditValue ?>"<?= $Page->NoOfOocytesRetrievedd->editAttributes() ?> aria-describedby="x_NoOfOocytesRetrievedd_help">
<?= $Page->NoOfOocytesRetrievedd->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoOfOocytesRetrievedd->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CourseInHospital->Visible) { // CourseInHospital ?>
    <div id="r_CourseInHospital" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_CourseInHospital" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_CourseInHospital"><?= $Page->CourseInHospital->caption() ?><?= $Page->CourseInHospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CourseInHospital->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_CourseInHospital"><span id="el_ivf_ovum_pick_up_chart_CourseInHospital">
<?php $Page->CourseInHospital->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_ovum_pick_up_chart" data-field="x_CourseInHospital" name="x_CourseInHospital" id="x_CourseInHospital" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->CourseInHospital->getPlaceHolder()) ?>"<?= $Page->CourseInHospital->editAttributes() ?> aria-describedby="x_CourseInHospital_help"><?= $Page->CourseInHospital->EditValue ?></textarea>
<?= $Page->CourseInHospital->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CourseInHospital->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_ovum_pick_up_chartedit", "editor"], function() {
	ew.createEditor("fivf_ovum_pick_up_chartedit", "x_CourseInHospital", 35, 4, <?= $Page->CourseInHospital->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DischargeAdvise->Visible) { // DischargeAdvise ?>
    <div id="r_DischargeAdvise" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_DischargeAdvise" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_DischargeAdvise"><?= $Page->DischargeAdvise->caption() ?><?= $Page->DischargeAdvise->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DischargeAdvise->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_DischargeAdvise"><span id="el_ivf_ovum_pick_up_chart_DischargeAdvise">
<?php $Page->DischargeAdvise->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_ovum_pick_up_chart" data-field="x_DischargeAdvise" name="x_DischargeAdvise" id="x_DischargeAdvise" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->DischargeAdvise->getPlaceHolder()) ?>"<?= $Page->DischargeAdvise->editAttributes() ?> aria-describedby="x_DischargeAdvise_help"><?= $Page->DischargeAdvise->EditValue ?></textarea>
<?= $Page->DischargeAdvise->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DischargeAdvise->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_ovum_pick_up_chartedit", "editor"], function() {
	ew.createEditor("fivf_ovum_pick_up_chartedit", "x_DischargeAdvise", 35, 4, <?= $Page->DischargeAdvise->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FollowUpAdvise->Visible) { // FollowUpAdvise ?>
    <div id="r_FollowUpAdvise" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_FollowUpAdvise" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_FollowUpAdvise"><?= $Page->FollowUpAdvise->caption() ?><?= $Page->FollowUpAdvise->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FollowUpAdvise->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_FollowUpAdvise"><span id="el_ivf_ovum_pick_up_chart_FollowUpAdvise">
<?php $Page->FollowUpAdvise->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_ovum_pick_up_chart" data-field="x_FollowUpAdvise" name="x_FollowUpAdvise" id="x_FollowUpAdvise" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->FollowUpAdvise->getPlaceHolder()) ?>"<?= $Page->FollowUpAdvise->editAttributes() ?> aria-describedby="x_FollowUpAdvise_help"><?= $Page->FollowUpAdvise->EditValue ?></textarea>
<?= $Page->FollowUpAdvise->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FollowUpAdvise->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_ovum_pick_up_chartedit", "editor"], function() {
	ew.createEditor("fivf_ovum_pick_up_chartedit", "x_FollowUpAdvise", 35, 4, <?= $Page->FollowUpAdvise->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PlanT->Visible) { // PlanT ?>
    <div id="r_PlanT" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_PlanT" for="x_PlanT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_PlanT"><?= $Page->PlanT->caption() ?><?= $Page->PlanT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PlanT->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_PlanT"><span id="el_ivf_ovum_pick_up_chart_PlanT">
    <select
        id="x_PlanT"
        name="x_PlanT"
        class="form-control ew-select<?= $Page->PlanT->isInvalidClass() ?>"
        data-select2-id="ivf_ovum_pick_up_chart_x_PlanT"
        data-table="ivf_ovum_pick_up_chart"
        data-field="x_PlanT"
        data-value-separator="<?= $Page->PlanT->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PlanT->getPlaceHolder()) ?>"
        <?= $Page->PlanT->editAttributes() ?>>
        <?= $Page->PlanT->selectOptionListHtml("x_PlanT") ?>
    </select>
    <?= $Page->PlanT->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->PlanT->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_ovum_pick_up_chart_x_PlanT']"),
        options = { name: "x_PlanT", selectId: "ivf_ovum_pick_up_chart_x_PlanT", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_ovum_pick_up_chart.fields.PlanT.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_ovum_pick_up_chart.fields.PlanT.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReviewDate->Visible) { // ReviewDate ?>
    <div id="r_ReviewDate" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_ReviewDate" for="x_ReviewDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_ReviewDate"><?= $Page->ReviewDate->caption() ?><?= $Page->ReviewDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReviewDate->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_ReviewDate"><span id="el_ivf_ovum_pick_up_chart_ReviewDate">
<input type="<?= $Page->ReviewDate->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDate" name="x_ReviewDate" id="x_ReviewDate" placeholder="<?= HtmlEncode($Page->ReviewDate->getPlaceHolder()) ?>" value="<?= $Page->ReviewDate->EditValue ?>"<?= $Page->ReviewDate->editAttributes() ?> aria-describedby="x_ReviewDate_help">
<?= $Page->ReviewDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReviewDate->getErrorMessage() ?></div>
<?php if (!$Page->ReviewDate->ReadOnly && !$Page->ReviewDate->Disabled && !isset($Page->ReviewDate->EditAttrs["readonly"]) && !isset($Page->ReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_ovum_pick_up_chartedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_ovum_pick_up_chartedit", "x_ReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReviewDoctor->Visible) { // ReviewDoctor ?>
    <div id="r_ReviewDoctor" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_ReviewDoctor" for="x_ReviewDoctor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_ReviewDoctor"><?= $Page->ReviewDoctor->caption() ?><?= $Page->ReviewDoctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReviewDoctor->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_ReviewDoctor"><span id="el_ivf_ovum_pick_up_chart_ReviewDoctor">
<input type="<?= $Page->ReviewDoctor->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDoctor" name="x_ReviewDoctor" id="x_ReviewDoctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReviewDoctor->getPlaceHolder()) ?>" value="<?= $Page->ReviewDoctor->EditValue ?>"<?= $Page->ReviewDoctor->editAttributes() ?> aria-describedby="x_ReviewDoctor_help">
<?= $Page->ReviewDoctor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReviewDoctor->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateProcedure->Visible) { // TemplateProcedure ?>
    <div id="r_TemplateProcedure" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_TemplateProcedure" for="x_TemplateProcedure" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_TemplateProcedure"><?= $Page->TemplateProcedure->caption() ?><?= $Page->TemplateProcedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateProcedure->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_TemplateProcedure"><span id="el_ivf_ovum_pick_up_chart_TemplateProcedure">
<?php $Page->TemplateProcedure->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateProcedure"
        name="x_TemplateProcedure"
        class="form-control ew-select<?= $Page->TemplateProcedure->isInvalidClass() ?>"
        data-select2-id="ivf_ovum_pick_up_chart_x_TemplateProcedure"
        data-table="ivf_ovum_pick_up_chart"
        data-field="x_TemplateProcedure"
        data-value-separator="<?= $Page->TemplateProcedure->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateProcedure->getPlaceHolder()) ?>"
        <?= $Page->TemplateProcedure->editAttributes() ?>>
        <?= $Page->TemplateProcedure->selectOptionListHtml("x_TemplateProcedure") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplateProcedure->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateProcedure" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateProcedure->caption() ?>" data-title="<?= $Page->TemplateProcedure->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateProcedure',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateProcedure->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateProcedure->getErrorMessage() ?></div>
<?= $Page->TemplateProcedure->Lookup->getParamTag($Page, "p_x_TemplateProcedure") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_ovum_pick_up_chart_x_TemplateProcedure']"),
        options = { name: "x_TemplateProcedure", selectId: "ivf_ovum_pick_up_chart_x_TemplateProcedure", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_ovum_pick_up_chart.fields.TemplateProcedure.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateCourseInHospital->Visible) { // TemplateCourseInHospital ?>
    <div id="r_TemplateCourseInHospital" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_TemplateCourseInHospital" for="x_TemplateCourseInHospital" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_TemplateCourseInHospital"><?= $Page->TemplateCourseInHospital->caption() ?><?= $Page->TemplateCourseInHospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateCourseInHospital->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_TemplateCourseInHospital"><span id="el_ivf_ovum_pick_up_chart_TemplateCourseInHospital">
<?php $Page->TemplateCourseInHospital->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateCourseInHospital"
        name="x_TemplateCourseInHospital"
        class="form-control ew-select<?= $Page->TemplateCourseInHospital->isInvalidClass() ?>"
        data-select2-id="ivf_ovum_pick_up_chart_x_TemplateCourseInHospital"
        data-table="ivf_ovum_pick_up_chart"
        data-field="x_TemplateCourseInHospital"
        data-value-separator="<?= $Page->TemplateCourseInHospital->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateCourseInHospital->getPlaceHolder()) ?>"
        <?= $Page->TemplateCourseInHospital->editAttributes() ?>>
        <?= $Page->TemplateCourseInHospital->selectOptionListHtml("x_TemplateCourseInHospital") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplateCourseInHospital->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateCourseInHospital" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateCourseInHospital->caption() ?>" data-title="<?= $Page->TemplateCourseInHospital->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateCourseInHospital',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateCourseInHospital->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateCourseInHospital->getErrorMessage() ?></div>
<?= $Page->TemplateCourseInHospital->Lookup->getParamTag($Page, "p_x_TemplateCourseInHospital") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_ovum_pick_up_chart_x_TemplateCourseInHospital']"),
        options = { name: "x_TemplateCourseInHospital", selectId: "ivf_ovum_pick_up_chart_x_TemplateCourseInHospital", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_ovum_pick_up_chart.fields.TemplateCourseInHospital.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateDischargeAdvise->Visible) { // TemplateDischargeAdvise ?>
    <div id="r_TemplateDischargeAdvise" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_TemplateDischargeAdvise" for="x_TemplateDischargeAdvise" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_TemplateDischargeAdvise"><?= $Page->TemplateDischargeAdvise->caption() ?><?= $Page->TemplateDischargeAdvise->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateDischargeAdvise->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_TemplateDischargeAdvise"><span id="el_ivf_ovum_pick_up_chart_TemplateDischargeAdvise">
<?php $Page->TemplateDischargeAdvise->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateDischargeAdvise"
        name="x_TemplateDischargeAdvise"
        class="form-control ew-select<?= $Page->TemplateDischargeAdvise->isInvalidClass() ?>"
        data-select2-id="ivf_ovum_pick_up_chart_x_TemplateDischargeAdvise"
        data-table="ivf_ovum_pick_up_chart"
        data-field="x_TemplateDischargeAdvise"
        data-value-separator="<?= $Page->TemplateDischargeAdvise->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateDischargeAdvise->getPlaceHolder()) ?>"
        <?= $Page->TemplateDischargeAdvise->editAttributes() ?>>
        <?= $Page->TemplateDischargeAdvise->selectOptionListHtml("x_TemplateDischargeAdvise") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplateDischargeAdvise->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateDischargeAdvise" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateDischargeAdvise->caption() ?>" data-title="<?= $Page->TemplateDischargeAdvise->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateDischargeAdvise',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateDischargeAdvise->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateDischargeAdvise->getErrorMessage() ?></div>
<?= $Page->TemplateDischargeAdvise->Lookup->getParamTag($Page, "p_x_TemplateDischargeAdvise") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_ovum_pick_up_chart_x_TemplateDischargeAdvise']"),
        options = { name: "x_TemplateDischargeAdvise", selectId: "ivf_ovum_pick_up_chart_x_TemplateDischargeAdvise", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_ovum_pick_up_chart.fields.TemplateDischargeAdvise.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateFollowUpAdvise->Visible) { // TemplateFollowUpAdvise ?>
    <div id="r_TemplateFollowUpAdvise" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise" for="x_TemplateFollowUpAdvise" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise"><?= $Page->TemplateFollowUpAdvise->caption() ?><?= $Page->TemplateFollowUpAdvise->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateFollowUpAdvise->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise"><span id="el_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise">
<?php $Page->TemplateFollowUpAdvise->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateFollowUpAdvise"
        name="x_TemplateFollowUpAdvise"
        class="form-control ew-select<?= $Page->TemplateFollowUpAdvise->isInvalidClass() ?>"
        data-select2-id="ivf_ovum_pick_up_chart_x_TemplateFollowUpAdvise"
        data-table="ivf_ovum_pick_up_chart"
        data-field="x_TemplateFollowUpAdvise"
        data-value-separator="<?= $Page->TemplateFollowUpAdvise->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateFollowUpAdvise->getPlaceHolder()) ?>"
        <?= $Page->TemplateFollowUpAdvise->editAttributes() ?>>
        <?= $Page->TemplateFollowUpAdvise->selectOptionListHtml("x_TemplateFollowUpAdvise") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplateFollowUpAdvise->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateFollowUpAdvise" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateFollowUpAdvise->caption() ?>" data-title="<?= $Page->TemplateFollowUpAdvise->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateFollowUpAdvise',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateFollowUpAdvise->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateFollowUpAdvise->getErrorMessage() ?></div>
<?= $Page->TemplateFollowUpAdvise->Lookup->getParamTag($Page, "p_x_TemplateFollowUpAdvise") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_ovum_pick_up_chart_x_TemplateFollowUpAdvise']"),
        options = { name: "x_TemplateFollowUpAdvise", selectId: "ivf_ovum_pick_up_chart_x_TemplateFollowUpAdvise", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_ovum_pick_up_chart.fields.TemplateFollowUpAdvise.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_ovum_pick_up_chart_TidNo"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_ivf_ovum_pick_up_chart_TidNo"><span id="el_ivf_ovum_pick_up_chart_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_ovum_pick_up_chartedit" class="ew-custom-template"></div>
<template id="tpm_ivf_ovum_pick_up_chartedit">
<div id="ct_IvfOvumPickUpChartEdit"><style>
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
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
?>	
<slot class="ew-slot" name="tpx_RIDNO"></slot>
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
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results2[0]["profilePic"]; ?>' alt="User Avatar"> 
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
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results1[0]["profilePic"]; ?>' alt="User Avatar"> 
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
	if($VitalsHistoryRowCount > 0)
	{
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
	$opurl = "view_opd_follow_upadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
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
				<a class="btn btn-app"  href="<?php echo $TrPlanurl; ?>">
				  <i class="fas fa-cart-plus"></i> Plan
				</a>
				<a class="btn btn-app" href="patientview.php?showdetail=&id=<?php echo $results2[0]["id"]; ?>">
				  <i class="fas fa-female"></i> Patient
				</a>
				<a class="btn btn-app"  href="patientview.php?showdetail=&id=<?php echo $results1[0]["id"]; ?>">
				  <i class="fas fa-male"></i> Partner
				</a>
				<a class="btn btn-app" href="<?php echo $VitalsHistoryUrl; ?>">
				  <span class="badge bg-warning"><?php echo $VitalsHistoryRowCount; ?></span>
				  <i class="fas fa-thermometer-full"></i> Vitals & History
				</a>
				<a class="btn btn-app" href="<?php echo $opurl; ?>">
				  <i class="fas fa-pencil-square-o"></i> OP
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfstimulationchartUrl; ?>">
							<?php echo $ivfstimulationchartwarn; ?>
				  <i class="fas fa-sticky-note "></i> Stimulation
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfovumpickupchartUrl; ?>">
							<?php echo $ivfovumpickupchartwarn; ?>
				  <i class="fas fa-object-group"></i> Ovum Pick Up
				</a>
				<a class="btn btn-app"  href="<?php echo $ivf_et_chartUrl; ?>">
					<?php echo $Etcountwarn; ?>
				  <i class="fas fa-globe"></i> ET
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfsemenanalysisreportUrl; ?>">
							<?php echo $ivfsemenanalysisreportwarn; ?>
				  <i class="fas fa-puzzle-piece"></i> Semen Analysis
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfembryologychartlistUrl; ?>">
				  <i class="fas fa-bullseye"></i> Embryology 
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfotherprocedureUrl; ?>">
							<?php echo $ivfotherprocedurewarn; ?>
				  <i class="fas fa-life-ring"></i> Other Procedure
				</a>
				<a class="btn btn-app"  href="<?php echo $followupurl; ?>">
				  <i class="fas fa-map-marker"></i> Tracking
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfartsummaryUrl; ?>">
							 <?php echo $ivfartsummarycountwarn; ?>
				  <i class="fas fa-medkit"></i> Summary
				</a>
				<a class="btn btn-app"  href="<?php echo $patientserviceslistUrl; ?>">
				  <i class="fas fa-credit-card"></i> Billing
				</a>
				<a class="btn btn-app"  href="javascript:history.back()">
				  <i class="fas fa-undo"></i> Back
				</a>	  
			  </div>
			  <!-- /.card-body -->
		</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Ovum Pick Up Chart</h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_ARTCycle"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_ARTCycle"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_Consultant"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_Consultant"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_TotalDoseOfStimulation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_TotalDoseOfStimulation"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_Protocol"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_Protocol"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"></slot></span>
						</td>
						<td style="width:50%">
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_TriggerDateTime"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_TriggerDateTime"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_OPUDateTime"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_OPUDateTime"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_HoursAfterTrigger"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_HoursAfterTrigger"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_SerumE2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_SerumE2"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_FORT"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_FORT"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_SerumP4"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_SerumP4"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_ExperctedOocytes"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_ExperctedOocytes"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_OocytesRetreivalRate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_OocytesRetreivalRate"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_Anesthesia"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_Anesthesia"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_TrialCannulation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_TrialCannulation"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_UCL"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_UCL"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_Angle"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_Angle"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_EMS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_EMS"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_Cannulation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_Cannulation"></slot></span>
						</td>
						<td style="width:50%">
						</td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Procedure</h3>
			</div>
			<div class="card-body">			
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_TemplateProcedure"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_TemplateProcedure"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_ProcedureT"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_ProcedureT"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_TemplateCourseInHospital"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_TemplateCourseInHospital"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_CourseInHospital"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_CourseInHospital"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_TemplateDischargeAdvise"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_TemplateDischargeAdvise"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_DischargeAdvise"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_DischargeAdvise"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_TemplateFollowUpAdvise"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_FollowUpAdvise"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_FollowUpAdvise"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_PlanT"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_PlanT"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_ReviewDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_ReviewDate"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ovum_pick_up_chart_ReviewDoctor"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ovum_pick_up_chart_ReviewDoctor"></slot></span>
				  </div>
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_ivf_ovum_pick_up_chartedit", "tpm_ivf_ovum_pick_up_chartedit", "ivf_ovum_pick_up_chartedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("ivf_ovum_pick_up_chart");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

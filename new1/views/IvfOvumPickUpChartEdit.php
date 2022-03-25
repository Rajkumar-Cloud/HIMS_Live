<?php

namespace PHPMaker2021\project3;

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
    var fields = ew.vars.tables.ivf_ovum_pick_up_chart.fields;
    fivf_ovum_pick_up_chartedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["RIDNo", [fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null, ew.Validators.integer], fields.RIDNo.isInvalid],
        ["Name", [fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["ARTCycle", [fields.ARTCycle.required ? ew.Validators.required(fields.ARTCycle.caption) : null], fields.ARTCycle.isInvalid],
        ["Consultant", [fields.Consultant.required ? ew.Validators.required(fields.Consultant.caption) : null], fields.Consultant.isInvalid],
        ["TotalDoseOfStimulation", [fields.TotalDoseOfStimulation.required ? ew.Validators.required(fields.TotalDoseOfStimulation.caption) : null], fields.TotalDoseOfStimulation.isInvalid],
        ["Protocol", [fields.Protocol.required ? ew.Validators.required(fields.Protocol.caption) : null], fields.Protocol.isInvalid],
        ["NumberOfDaysOfStimulation", [fields.NumberOfDaysOfStimulation.required ? ew.Validators.required(fields.NumberOfDaysOfStimulation.caption) : null], fields.NumberOfDaysOfStimulation.isInvalid],
        ["TriggerDateTime", [fields.TriggerDateTime.required ? ew.Validators.required(fields.TriggerDateTime.caption) : null, ew.Validators.datetime(0)], fields.TriggerDateTime.isInvalid],
        ["OPUDateTime", [fields.OPUDateTime.required ? ew.Validators.required(fields.OPUDateTime.caption) : null, ew.Validators.datetime(0)], fields.OPUDateTime.isInvalid],
        ["HoursAfterTrigger", [fields.HoursAfterTrigger.required ? ew.Validators.required(fields.HoursAfterTrigger.caption) : null], fields.HoursAfterTrigger.isInvalid],
        ["SerumE2", [fields.SerumE2.required ? ew.Validators.required(fields.SerumE2.caption) : null], fields.SerumE2.isInvalid],
        ["SerumP4", [fields.SerumP4.required ? ew.Validators.required(fields.SerumP4.caption) : null], fields.SerumP4.isInvalid],
        ["FORT", [fields.FORT.required ? ew.Validators.required(fields.FORT.caption) : null], fields.FORT.isInvalid],
        ["ExperctedOocytes", [fields.ExperctedOocytes.required ? ew.Validators.required(fields.ExperctedOocytes.caption) : null], fields.ExperctedOocytes.isInvalid],
        ["NoOfOocytesRetrieved", [fields.NoOfOocytesRetrieved.required ? ew.Validators.required(fields.NoOfOocytesRetrieved.caption) : null], fields.NoOfOocytesRetrieved.isInvalid],
        ["OocytesRetreivalRate", [fields.OocytesRetreivalRate.required ? ew.Validators.required(fields.OocytesRetreivalRate.caption) : null], fields.OocytesRetreivalRate.isInvalid],
        ["Anesthesia", [fields.Anesthesia.required ? ew.Validators.required(fields.Anesthesia.caption) : null], fields.Anesthesia.isInvalid],
        ["TrialCannulation", [fields.TrialCannulation.required ? ew.Validators.required(fields.TrialCannulation.caption) : null], fields.TrialCannulation.isInvalid],
        ["UCL", [fields.UCL.required ? ew.Validators.required(fields.UCL.caption) : null], fields.UCL.isInvalid],
        ["Angle", [fields.Angle.required ? ew.Validators.required(fields.Angle.caption) : null], fields.Angle.isInvalid],
        ["EMS", [fields.EMS.required ? ew.Validators.required(fields.EMS.caption) : null], fields.EMS.isInvalid],
        ["Cannulation", [fields.Cannulation.required ? ew.Validators.required(fields.Cannulation.caption) : null], fields.Cannulation.isInvalid],
        ["ProcedureT", [fields.ProcedureT.required ? ew.Validators.required(fields.ProcedureT.caption) : null], fields.ProcedureT.isInvalid],
        ["NoOfOocytesRetrievedd", [fields.NoOfOocytesRetrievedd.required ? ew.Validators.required(fields.NoOfOocytesRetrievedd.caption) : null], fields.NoOfOocytesRetrievedd.isInvalid],
        ["CourseInHospital", [fields.CourseInHospital.required ? ew.Validators.required(fields.CourseInHospital.caption) : null], fields.CourseInHospital.isInvalid],
        ["DischargeAdvise", [fields.DischargeAdvise.required ? ew.Validators.required(fields.DischargeAdvise.caption) : null], fields.DischargeAdvise.isInvalid],
        ["FollowUpAdvise", [fields.FollowUpAdvise.required ? ew.Validators.required(fields.FollowUpAdvise.caption) : null], fields.FollowUpAdvise.isInvalid],
        ["PlanT", [fields.PlanT.required ? ew.Validators.required(fields.PlanT.caption) : null], fields.PlanT.isInvalid],
        ["ReviewDate", [fields.ReviewDate.required ? ew.Validators.required(fields.ReviewDate.caption) : null, ew.Validators.datetime(0)], fields.ReviewDate.isInvalid],
        ["ReviewDoctor", [fields.ReviewDoctor.required ? ew.Validators.required(fields.ReviewDoctor.caption) : null], fields.ReviewDoctor.isInvalid],
        ["TidNo", [fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid]
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
<form name="fivf_ovum_pick_up_chartedit" id="fivf_ovum_pick_up_chartedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_ovum_pick_up_chart">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_RIDNo" for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RIDNo->caption() ?><?= $Page->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_RIDNo">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?> aria-describedby="x_RIDNo_help">
<?= $Page->RIDNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
    <div id="r_ARTCycle" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_ARTCycle" for="x_ARTCycle" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ARTCycle->caption() ?><?= $Page->ARTCycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_ARTCycle">
<input type="<?= $Page->ARTCycle->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_ARTCycle" name="x_ARTCycle" id="x_ARTCycle" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ARTCycle->getPlaceHolder()) ?>" value="<?= $Page->ARTCycle->EditValue ?>"<?= $Page->ARTCycle->editAttributes() ?> aria-describedby="x_ARTCycle_help">
<?= $Page->ARTCycle->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ARTCycle->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <div id="r_Consultant" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_Consultant" for="x_Consultant" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Consultant->caption() ?><?= $Page->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Consultant->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_Consultant">
<input type="<?= $Page->Consultant->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Consultant->getPlaceHolder()) ?>" value="<?= $Page->Consultant->EditValue ?>"<?= $Page->Consultant->editAttributes() ?> aria-describedby="x_Consultant_help">
<?= $Page->Consultant->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Consultant->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
    <div id="r_TotalDoseOfStimulation" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" for="x_TotalDoseOfStimulation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TotalDoseOfStimulation->caption() ?><?= $Page->TotalDoseOfStimulation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalDoseOfStimulation->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
<input type="<?= $Page->TotalDoseOfStimulation->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_TotalDoseOfStimulation" name="x_TotalDoseOfStimulation" id="x_TotalDoseOfStimulation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TotalDoseOfStimulation->getPlaceHolder()) ?>" value="<?= $Page->TotalDoseOfStimulation->EditValue ?>"<?= $Page->TotalDoseOfStimulation->editAttributes() ?> aria-describedby="x_TotalDoseOfStimulation_help">
<?= $Page->TotalDoseOfStimulation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalDoseOfStimulation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Protocol->Visible) { // Protocol ?>
    <div id="r_Protocol" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_Protocol" for="x_Protocol" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Protocol->caption() ?><?= $Page->Protocol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Protocol->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_Protocol">
<input type="<?= $Page->Protocol->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_Protocol" name="x_Protocol" id="x_Protocol" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Protocol->getPlaceHolder()) ?>" value="<?= $Page->Protocol->EditValue ?>"<?= $Page->Protocol->editAttributes() ?> aria-describedby="x_Protocol_help">
<?= $Page->Protocol->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Protocol->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
    <div id="r_NumberOfDaysOfStimulation" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" for="x_NumberOfDaysOfStimulation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NumberOfDaysOfStimulation->caption() ?><?= $Page->NumberOfDaysOfStimulation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NumberOfDaysOfStimulation->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
<input type="<?= $Page->NumberOfDaysOfStimulation->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_NumberOfDaysOfStimulation" name="x_NumberOfDaysOfStimulation" id="x_NumberOfDaysOfStimulation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NumberOfDaysOfStimulation->getPlaceHolder()) ?>" value="<?= $Page->NumberOfDaysOfStimulation->EditValue ?>"<?= $Page->NumberOfDaysOfStimulation->editAttributes() ?> aria-describedby="x_NumberOfDaysOfStimulation_help">
<?= $Page->NumberOfDaysOfStimulation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NumberOfDaysOfStimulation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TriggerDateTime->Visible) { // TriggerDateTime ?>
    <div id="r_TriggerDateTime" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_TriggerDateTime" for="x_TriggerDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TriggerDateTime->caption() ?><?= $Page->TriggerDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TriggerDateTime->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_TriggerDateTime">
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
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OPUDateTime->Visible) { // OPUDateTime ?>
    <div id="r_OPUDateTime" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_OPUDateTime" for="x_OPUDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OPUDateTime->caption() ?><?= $Page->OPUDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OPUDateTime->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_OPUDateTime">
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
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
    <div id="r_HoursAfterTrigger" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_HoursAfterTrigger" for="x_HoursAfterTrigger" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HoursAfterTrigger->caption() ?><?= $Page->HoursAfterTrigger->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HoursAfterTrigger->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_HoursAfterTrigger">
<input type="<?= $Page->HoursAfterTrigger->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_HoursAfterTrigger" name="x_HoursAfterTrigger" id="x_HoursAfterTrigger" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HoursAfterTrigger->getPlaceHolder()) ?>" value="<?= $Page->HoursAfterTrigger->EditValue ?>"<?= $Page->HoursAfterTrigger->editAttributes() ?> aria-describedby="x_HoursAfterTrigger_help">
<?= $Page->HoursAfterTrigger->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HoursAfterTrigger->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SerumE2->Visible) { // SerumE2 ?>
    <div id="r_SerumE2" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_SerumE2" for="x_SerumE2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SerumE2->caption() ?><?= $Page->SerumE2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SerumE2->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_SerumE2">
<input type="<?= $Page->SerumE2->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumE2" name="x_SerumE2" id="x_SerumE2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SerumE2->getPlaceHolder()) ?>" value="<?= $Page->SerumE2->EditValue ?>"<?= $Page->SerumE2->editAttributes() ?> aria-describedby="x_SerumE2_help">
<?= $Page->SerumE2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SerumE2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SerumP4->Visible) { // SerumP4 ?>
    <div id="r_SerumP4" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_SerumP4" for="x_SerumP4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SerumP4->caption() ?><?= $Page->SerumP4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SerumP4->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_SerumP4">
<input type="<?= $Page->SerumP4->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumP4" name="x_SerumP4" id="x_SerumP4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SerumP4->getPlaceHolder()) ?>" value="<?= $Page->SerumP4->EditValue ?>"<?= $Page->SerumP4->editAttributes() ?> aria-describedby="x_SerumP4_help">
<?= $Page->SerumP4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SerumP4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FORT->Visible) { // FORT ?>
    <div id="r_FORT" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_FORT" for="x_FORT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FORT->caption() ?><?= $Page->FORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FORT->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_FORT">
<input type="<?= $Page->FORT->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_FORT" name="x_FORT" id="x_FORT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FORT->getPlaceHolder()) ?>" value="<?= $Page->FORT->EditValue ?>"<?= $Page->FORT->editAttributes() ?> aria-describedby="x_FORT_help">
<?= $Page->FORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FORT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
    <div id="r_ExperctedOocytes" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_ExperctedOocytes" for="x_ExperctedOocytes" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ExperctedOocytes->caption() ?><?= $Page->ExperctedOocytes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ExperctedOocytes->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_ExperctedOocytes">
<input type="<?= $Page->ExperctedOocytes->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_ExperctedOocytes" name="x_ExperctedOocytes" id="x_ExperctedOocytes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ExperctedOocytes->getPlaceHolder()) ?>" value="<?= $Page->ExperctedOocytes->EditValue ?>"<?= $Page->ExperctedOocytes->editAttributes() ?> aria-describedby="x_ExperctedOocytes_help">
<?= $Page->ExperctedOocytes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ExperctedOocytes->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
    <div id="r_NoOfOocytesRetrieved" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" for="x_NoOfOocytesRetrieved" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NoOfOocytesRetrieved->caption() ?><?= $Page->NoOfOocytesRetrieved->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoOfOocytesRetrieved->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
<input type="<?= $Page->NoOfOocytesRetrieved->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrieved" name="x_NoOfOocytesRetrieved" id="x_NoOfOocytesRetrieved" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NoOfOocytesRetrieved->getPlaceHolder()) ?>" value="<?= $Page->NoOfOocytesRetrieved->EditValue ?>"<?= $Page->NoOfOocytesRetrieved->editAttributes() ?> aria-describedby="x_NoOfOocytesRetrieved_help">
<?= $Page->NoOfOocytesRetrieved->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoOfOocytesRetrieved->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
    <div id="r_OocytesRetreivalRate" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_OocytesRetreivalRate" for="x_OocytesRetreivalRate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OocytesRetreivalRate->caption() ?><?= $Page->OocytesRetreivalRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OocytesRetreivalRate->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_OocytesRetreivalRate">
<input type="<?= $Page->OocytesRetreivalRate->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_OocytesRetreivalRate" name="x_OocytesRetreivalRate" id="x_OocytesRetreivalRate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocytesRetreivalRate->getPlaceHolder()) ?>" value="<?= $Page->OocytesRetreivalRate->EditValue ?>"<?= $Page->OocytesRetreivalRate->editAttributes() ?> aria-describedby="x_OocytesRetreivalRate_help">
<?= $Page->OocytesRetreivalRate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OocytesRetreivalRate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Anesthesia->Visible) { // Anesthesia ?>
    <div id="r_Anesthesia" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_Anesthesia" for="x_Anesthesia" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Anesthesia->caption() ?><?= $Page->Anesthesia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Anesthesia->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_Anesthesia">
<input type="<?= $Page->Anesthesia->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_Anesthesia" name="x_Anesthesia" id="x_Anesthesia" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Anesthesia->getPlaceHolder()) ?>" value="<?= $Page->Anesthesia->EditValue ?>"<?= $Page->Anesthesia->editAttributes() ?> aria-describedby="x_Anesthesia_help">
<?= $Page->Anesthesia->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Anesthesia->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
    <div id="r_TrialCannulation" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_TrialCannulation" for="x_TrialCannulation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TrialCannulation->caption() ?><?= $Page->TrialCannulation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TrialCannulation->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_TrialCannulation">
<input type="<?= $Page->TrialCannulation->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_TrialCannulation" name="x_TrialCannulation" id="x_TrialCannulation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TrialCannulation->getPlaceHolder()) ?>" value="<?= $Page->TrialCannulation->EditValue ?>"<?= $Page->TrialCannulation->editAttributes() ?> aria-describedby="x_TrialCannulation_help">
<?= $Page->TrialCannulation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TrialCannulation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UCL->Visible) { // UCL ?>
    <div id="r_UCL" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_UCL" for="x_UCL" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UCL->caption() ?><?= $Page->UCL->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UCL->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_UCL">
<input type="<?= $Page->UCL->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_UCL" name="x_UCL" id="x_UCL" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UCL->getPlaceHolder()) ?>" value="<?= $Page->UCL->EditValue ?>"<?= $Page->UCL->editAttributes() ?> aria-describedby="x_UCL_help">
<?= $Page->UCL->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UCL->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Angle->Visible) { // Angle ?>
    <div id="r_Angle" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_Angle" for="x_Angle" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Angle->caption() ?><?= $Page->Angle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Angle->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_Angle">
<input type="<?= $Page->Angle->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_Angle" name="x_Angle" id="x_Angle" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Angle->getPlaceHolder()) ?>" value="<?= $Page->Angle->EditValue ?>"<?= $Page->Angle->editAttributes() ?> aria-describedby="x_Angle_help">
<?= $Page->Angle->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Angle->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EMS->Visible) { // EMS ?>
    <div id="r_EMS" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_EMS" for="x_EMS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EMS->caption() ?><?= $Page->EMS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EMS->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_EMS">
<input type="<?= $Page->EMS->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_EMS" name="x_EMS" id="x_EMS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EMS->getPlaceHolder()) ?>" value="<?= $Page->EMS->EditValue ?>"<?= $Page->EMS->editAttributes() ?> aria-describedby="x_EMS_help">
<?= $Page->EMS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EMS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Cannulation->Visible) { // Cannulation ?>
    <div id="r_Cannulation" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_Cannulation" for="x_Cannulation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Cannulation->caption() ?><?= $Page->Cannulation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Cannulation->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_Cannulation">
<input type="<?= $Page->Cannulation->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_Cannulation" name="x_Cannulation" id="x_Cannulation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Cannulation->getPlaceHolder()) ?>" value="<?= $Page->Cannulation->EditValue ?>"<?= $Page->Cannulation->editAttributes() ?> aria-describedby="x_Cannulation_help">
<?= $Page->Cannulation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Cannulation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureT->Visible) { // ProcedureT ?>
    <div id="r_ProcedureT" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_ProcedureT" for="x_ProcedureT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProcedureT->caption() ?><?= $Page->ProcedureT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureT->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_ProcedureT">
<textarea data-table="ivf_ovum_pick_up_chart" data-field="x_ProcedureT" name="x_ProcedureT" id="x_ProcedureT" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->ProcedureT->getPlaceHolder()) ?>"<?= $Page->ProcedureT->editAttributes() ?> aria-describedby="x_ProcedureT_help"><?= $Page->ProcedureT->EditValue ?></textarea>
<?= $Page->ProcedureT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProcedureT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
    <div id="r_NoOfOocytesRetrievedd" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" for="x_NoOfOocytesRetrievedd" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NoOfOocytesRetrievedd->caption() ?><?= $Page->NoOfOocytesRetrievedd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoOfOocytesRetrievedd->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
<input type="<?= $Page->NoOfOocytesRetrievedd->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrievedd" name="x_NoOfOocytesRetrievedd" id="x_NoOfOocytesRetrievedd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NoOfOocytesRetrievedd->getPlaceHolder()) ?>" value="<?= $Page->NoOfOocytesRetrievedd->EditValue ?>"<?= $Page->NoOfOocytesRetrievedd->editAttributes() ?> aria-describedby="x_NoOfOocytesRetrievedd_help">
<?= $Page->NoOfOocytesRetrievedd->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoOfOocytesRetrievedd->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CourseInHospital->Visible) { // CourseInHospital ?>
    <div id="r_CourseInHospital" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_CourseInHospital" for="x_CourseInHospital" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CourseInHospital->caption() ?><?= $Page->CourseInHospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CourseInHospital->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_CourseInHospital">
<textarea data-table="ivf_ovum_pick_up_chart" data-field="x_CourseInHospital" name="x_CourseInHospital" id="x_CourseInHospital" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->CourseInHospital->getPlaceHolder()) ?>"<?= $Page->CourseInHospital->editAttributes() ?> aria-describedby="x_CourseInHospital_help"><?= $Page->CourseInHospital->EditValue ?></textarea>
<?= $Page->CourseInHospital->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CourseInHospital->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DischargeAdvise->Visible) { // DischargeAdvise ?>
    <div id="r_DischargeAdvise" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_DischargeAdvise" for="x_DischargeAdvise" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DischargeAdvise->caption() ?><?= $Page->DischargeAdvise->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DischargeAdvise->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_DischargeAdvise">
<textarea data-table="ivf_ovum_pick_up_chart" data-field="x_DischargeAdvise" name="x_DischargeAdvise" id="x_DischargeAdvise" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->DischargeAdvise->getPlaceHolder()) ?>"<?= $Page->DischargeAdvise->editAttributes() ?> aria-describedby="x_DischargeAdvise_help"><?= $Page->DischargeAdvise->EditValue ?></textarea>
<?= $Page->DischargeAdvise->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DischargeAdvise->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FollowUpAdvise->Visible) { // FollowUpAdvise ?>
    <div id="r_FollowUpAdvise" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_FollowUpAdvise" for="x_FollowUpAdvise" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FollowUpAdvise->caption() ?><?= $Page->FollowUpAdvise->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FollowUpAdvise->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_FollowUpAdvise">
<textarea data-table="ivf_ovum_pick_up_chart" data-field="x_FollowUpAdvise" name="x_FollowUpAdvise" id="x_FollowUpAdvise" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->FollowUpAdvise->getPlaceHolder()) ?>"<?= $Page->FollowUpAdvise->editAttributes() ?> aria-describedby="x_FollowUpAdvise_help"><?= $Page->FollowUpAdvise->EditValue ?></textarea>
<?= $Page->FollowUpAdvise->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FollowUpAdvise->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PlanT->Visible) { // PlanT ?>
    <div id="r_PlanT" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_PlanT" for="x_PlanT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PlanT->caption() ?><?= $Page->PlanT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PlanT->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_PlanT">
<input type="<?= $Page->PlanT->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_PlanT" name="x_PlanT" id="x_PlanT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PlanT->getPlaceHolder()) ?>" value="<?= $Page->PlanT->EditValue ?>"<?= $Page->PlanT->editAttributes() ?> aria-describedby="x_PlanT_help">
<?= $Page->PlanT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PlanT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReviewDate->Visible) { // ReviewDate ?>
    <div id="r_ReviewDate" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_ReviewDate" for="x_ReviewDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReviewDate->caption() ?><?= $Page->ReviewDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReviewDate->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_ReviewDate">
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
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReviewDoctor->Visible) { // ReviewDoctor ?>
    <div id="r_ReviewDoctor" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_ReviewDoctor" for="x_ReviewDoctor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReviewDoctor->caption() ?><?= $Page->ReviewDoctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReviewDoctor->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_ReviewDoctor">
<input type="<?= $Page->ReviewDoctor->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDoctor" name="x_ReviewDoctor" id="x_ReviewDoctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReviewDoctor->getPlaceHolder()) ?>" value="<?= $Page->ReviewDoctor->EditValue ?>"<?= $Page->ReviewDoctor->editAttributes() ?> aria-describedby="x_ReviewDoctor_help">
<?= $Page->ReviewDoctor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReviewDoctor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_ovum_pick_up_chart_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_ovum_pick_up_chart_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_ovum_pick_up_chart" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
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
    ew.addEventHandlers("ivf_ovum_pick_up_chart");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

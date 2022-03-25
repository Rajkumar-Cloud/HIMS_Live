<?php

namespace PHPMaker2021\project3;

// Page object
$MonitorTreatmentPlanAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmonitor_treatment_planadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fmonitor_treatment_planadd = currentForm = new ew.Form("fmonitor_treatment_planadd", "add");

    // Add fields
    var fields = ew.vars.tables.monitor_treatment_plan.fields;
    fmonitor_treatment_planadd.addFields([
        ["PatId", [fields.PatId.required ? ew.Validators.required(fields.PatId.caption) : null, ew.Validators.integer], fields.PatId.isInvalid],
        ["PatientId", [fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["PatientName", [fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Age", [fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["MobileNo", [fields.MobileNo.required ? ew.Validators.required(fields.MobileNo.caption) : null], fields.MobileNo.isInvalid],
        ["ConsultantName", [fields.ConsultantName.required ? ew.Validators.required(fields.ConsultantName.caption) : null], fields.ConsultantName.isInvalid],
        ["RefDrName", [fields.RefDrName.required ? ew.Validators.required(fields.RefDrName.caption) : null], fields.RefDrName.isInvalid],
        ["RefDrMobileNo", [fields.RefDrMobileNo.required ? ew.Validators.required(fields.RefDrMobileNo.caption) : null], fields.RefDrMobileNo.isInvalid],
        ["NewVisitDate", [fields.NewVisitDate.required ? ew.Validators.required(fields.NewVisitDate.caption) : null, ew.Validators.datetime(0)], fields.NewVisitDate.isInvalid],
        ["NewVisitYesNo", [fields.NewVisitYesNo.required ? ew.Validators.required(fields.NewVisitYesNo.caption) : null], fields.NewVisitYesNo.isInvalid],
        ["Treatment", [fields.Treatment.required ? ew.Validators.required(fields.Treatment.caption) : null], fields.Treatment.isInvalid],
        ["IUIDoneDate1", [fields.IUIDoneDate1.required ? ew.Validators.required(fields.IUIDoneDate1.caption) : null, ew.Validators.datetime(0)], fields.IUIDoneDate1.isInvalid],
        ["IUIDoneYesNo1", [fields.IUIDoneYesNo1.required ? ew.Validators.required(fields.IUIDoneYesNo1.caption) : null], fields.IUIDoneYesNo1.isInvalid],
        ["UPTTestDate1", [fields.UPTTestDate1.required ? ew.Validators.required(fields.UPTTestDate1.caption) : null, ew.Validators.datetime(0)], fields.UPTTestDate1.isInvalid],
        ["UPTTestYesNo1", [fields.UPTTestYesNo1.required ? ew.Validators.required(fields.UPTTestYesNo1.caption) : null], fields.UPTTestYesNo1.isInvalid],
        ["IUIDoneDate2", [fields.IUIDoneDate2.required ? ew.Validators.required(fields.IUIDoneDate2.caption) : null, ew.Validators.datetime(0)], fields.IUIDoneDate2.isInvalid],
        ["IUIDoneYesNo2", [fields.IUIDoneYesNo2.required ? ew.Validators.required(fields.IUIDoneYesNo2.caption) : null], fields.IUIDoneYesNo2.isInvalid],
        ["UPTTestDate2", [fields.UPTTestDate2.required ? ew.Validators.required(fields.UPTTestDate2.caption) : null, ew.Validators.datetime(0)], fields.UPTTestDate2.isInvalid],
        ["UPTTestYesNo2", [fields.UPTTestYesNo2.required ? ew.Validators.required(fields.UPTTestYesNo2.caption) : null], fields.UPTTestYesNo2.isInvalid],
        ["IUIDoneDate3", [fields.IUIDoneDate3.required ? ew.Validators.required(fields.IUIDoneDate3.caption) : null, ew.Validators.datetime(0)], fields.IUIDoneDate3.isInvalid],
        ["IUIDoneYesNo3", [fields.IUIDoneYesNo3.required ? ew.Validators.required(fields.IUIDoneYesNo3.caption) : null], fields.IUIDoneYesNo3.isInvalid],
        ["UPTTestDate3", [fields.UPTTestDate3.required ? ew.Validators.required(fields.UPTTestDate3.caption) : null, ew.Validators.datetime(0)], fields.UPTTestDate3.isInvalid],
        ["UPTTestYesNo3", [fields.UPTTestYesNo3.required ? ew.Validators.required(fields.UPTTestYesNo3.caption) : null], fields.UPTTestYesNo3.isInvalid],
        ["IUIDoneDate4", [fields.IUIDoneDate4.required ? ew.Validators.required(fields.IUIDoneDate4.caption) : null, ew.Validators.datetime(0)], fields.IUIDoneDate4.isInvalid],
        ["IUIDoneYesNo4", [fields.IUIDoneYesNo4.required ? ew.Validators.required(fields.IUIDoneYesNo4.caption) : null], fields.IUIDoneYesNo4.isInvalid],
        ["UPTTestDate4", [fields.UPTTestDate4.required ? ew.Validators.required(fields.UPTTestDate4.caption) : null, ew.Validators.datetime(0)], fields.UPTTestDate4.isInvalid],
        ["UPTTestYesNo4", [fields.UPTTestYesNo4.required ? ew.Validators.required(fields.UPTTestYesNo4.caption) : null], fields.UPTTestYesNo4.isInvalid],
        ["IVFStimulationDate", [fields.IVFStimulationDate.required ? ew.Validators.required(fields.IVFStimulationDate.caption) : null, ew.Validators.datetime(0)], fields.IVFStimulationDate.isInvalid],
        ["IVFStimulationYesNo", [fields.IVFStimulationYesNo.required ? ew.Validators.required(fields.IVFStimulationYesNo.caption) : null], fields.IVFStimulationYesNo.isInvalid],
        ["OPUDate", [fields.OPUDate.required ? ew.Validators.required(fields.OPUDate.caption) : null, ew.Validators.datetime(0)], fields.OPUDate.isInvalid],
        ["OPUYesNo", [fields.OPUYesNo.required ? ew.Validators.required(fields.OPUYesNo.caption) : null], fields.OPUYesNo.isInvalid],
        ["ETDate", [fields.ETDate.required ? ew.Validators.required(fields.ETDate.caption) : null, ew.Validators.datetime(0)], fields.ETDate.isInvalid],
        ["ETYesNo", [fields.ETYesNo.required ? ew.Validators.required(fields.ETYesNo.caption) : null], fields.ETYesNo.isInvalid],
        ["BetaHCGDate", [fields.BetaHCGDate.required ? ew.Validators.required(fields.BetaHCGDate.caption) : null, ew.Validators.datetime(0)], fields.BetaHCGDate.isInvalid],
        ["BetaHCGYesNo", [fields.BetaHCGYesNo.required ? ew.Validators.required(fields.BetaHCGYesNo.caption) : null], fields.BetaHCGYesNo.isInvalid],
        ["FETDate", [fields.FETDate.required ? ew.Validators.required(fields.FETDate.caption) : null, ew.Validators.datetime(0)], fields.FETDate.isInvalid],
        ["FETYesNo", [fields.FETYesNo.required ? ew.Validators.required(fields.FETYesNo.caption) : null], fields.FETYesNo.isInvalid],
        ["FBetaHCGDate", [fields.FBetaHCGDate.required ? ew.Validators.required(fields.FBetaHCGDate.caption) : null, ew.Validators.datetime(0)], fields.FBetaHCGDate.isInvalid],
        ["FBetaHCGYesNo", [fields.FBetaHCGYesNo.required ? ew.Validators.required(fields.FBetaHCGYesNo.caption) : null], fields.FBetaHCGYesNo.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fmonitor_treatment_planadd,
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
    fmonitor_treatment_planadd.validate = function () {
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
    fmonitor_treatment_planadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fmonitor_treatment_planadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fmonitor_treatment_planadd");
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
<form name="fmonitor_treatment_planadd" id="fmonitor_treatment_planadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="monitor_treatment_plan">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->PatId->Visible) { // PatId ?>
    <div id="r_PatId" class="form-group row">
        <label id="elh_monitor_treatment_plan_PatId" for="x_PatId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatId->caption() ?><?= $Page->PatId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatId->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_PatId">
<input type="<?= $Page->PatId->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_PatId" name="x_PatId" id="x_PatId" size="30" placeholder="<?= HtmlEncode($Page->PatId->getPlaceHolder()) ?>" value="<?= $Page->PatId->EditValue ?>"<?= $Page->PatId->editAttributes() ?> aria-describedby="x_PatId_help">
<?= $Page->PatId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_monitor_treatment_plan_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_monitor_treatment_plan_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_monitor_treatment_plan_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNo->Visible) { // MobileNo ?>
    <div id="r_MobileNo" class="form-group row">
        <label id="elh_monitor_treatment_plan_MobileNo" for="x_MobileNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MobileNo->caption() ?><?= $Page->MobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_MobileNo">
<input type="<?= $Page->MobileNo->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_MobileNo" name="x_MobileNo" id="x_MobileNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNo->getPlaceHolder()) ?>" value="<?= $Page->MobileNo->EditValue ?>"<?= $Page->MobileNo->editAttributes() ?> aria-describedby="x_MobileNo_help">
<?= $Page->MobileNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MobileNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ConsultantName->Visible) { // ConsultantName ?>
    <div id="r_ConsultantName" class="form-group row">
        <label id="elh_monitor_treatment_plan_ConsultantName" for="x_ConsultantName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ConsultantName->caption() ?><?= $Page->ConsultantName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ConsultantName->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_ConsultantName">
<input type="<?= $Page->ConsultantName->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_ConsultantName" name="x_ConsultantName" id="x_ConsultantName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ConsultantName->getPlaceHolder()) ?>" value="<?= $Page->ConsultantName->EditValue ?>"<?= $Page->ConsultantName->editAttributes() ?> aria-describedby="x_ConsultantName_help">
<?= $Page->ConsultantName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ConsultantName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RefDrName->Visible) { // RefDrName ?>
    <div id="r_RefDrName" class="form-group row">
        <label id="elh_monitor_treatment_plan_RefDrName" for="x_RefDrName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RefDrName->caption() ?><?= $Page->RefDrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefDrName->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_RefDrName">
<input type="<?= $Page->RefDrName->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_RefDrName" name="x_RefDrName" id="x_RefDrName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RefDrName->getPlaceHolder()) ?>" value="<?= $Page->RefDrName->EditValue ?>"<?= $Page->RefDrName->editAttributes() ?> aria-describedby="x_RefDrName_help">
<?= $Page->RefDrName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RefDrName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RefDrMobileNo->Visible) { // RefDrMobileNo ?>
    <div id="r_RefDrMobileNo" class="form-group row">
        <label id="elh_monitor_treatment_plan_RefDrMobileNo" for="x_RefDrMobileNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RefDrMobileNo->caption() ?><?= $Page->RefDrMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefDrMobileNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_RefDrMobileNo">
<input type="<?= $Page->RefDrMobileNo->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_RefDrMobileNo" name="x_RefDrMobileNo" id="x_RefDrMobileNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RefDrMobileNo->getPlaceHolder()) ?>" value="<?= $Page->RefDrMobileNo->EditValue ?>"<?= $Page->RefDrMobileNo->editAttributes() ?> aria-describedby="x_RefDrMobileNo_help">
<?= $Page->RefDrMobileNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RefDrMobileNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NewVisitDate->Visible) { // NewVisitDate ?>
    <div id="r_NewVisitDate" class="form-group row">
        <label id="elh_monitor_treatment_plan_NewVisitDate" for="x_NewVisitDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NewVisitDate->caption() ?><?= $Page->NewVisitDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NewVisitDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_NewVisitDate">
<input type="<?= $Page->NewVisitDate->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_NewVisitDate" name="x_NewVisitDate" id="x_NewVisitDate" placeholder="<?= HtmlEncode($Page->NewVisitDate->getPlaceHolder()) ?>" value="<?= $Page->NewVisitDate->EditValue ?>"<?= $Page->NewVisitDate->editAttributes() ?> aria-describedby="x_NewVisitDate_help">
<?= $Page->NewVisitDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NewVisitDate->getErrorMessage() ?></div>
<?php if (!$Page->NewVisitDate->ReadOnly && !$Page->NewVisitDate->Disabled && !isset($Page->NewVisitDate->EditAttrs["readonly"]) && !isset($Page->NewVisitDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_NewVisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NewVisitYesNo->Visible) { // NewVisitYesNo ?>
    <div id="r_NewVisitYesNo" class="form-group row">
        <label id="elh_monitor_treatment_plan_NewVisitYesNo" for="x_NewVisitYesNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NewVisitYesNo->caption() ?><?= $Page->NewVisitYesNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NewVisitYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_NewVisitYesNo">
<input type="<?= $Page->NewVisitYesNo->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_NewVisitYesNo" name="x_NewVisitYesNo" id="x_NewVisitYesNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NewVisitYesNo->getPlaceHolder()) ?>" value="<?= $Page->NewVisitYesNo->EditValue ?>"<?= $Page->NewVisitYesNo->editAttributes() ?> aria-describedby="x_NewVisitYesNo_help">
<?= $Page->NewVisitYesNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NewVisitYesNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
    <div id="r_Treatment" class="form-group row">
        <label id="elh_monitor_treatment_plan_Treatment" for="x_Treatment" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Treatment->caption() ?><?= $Page->Treatment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Treatment->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_Treatment">
<input type="<?= $Page->Treatment->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_Treatment" name="x_Treatment" id="x_Treatment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Treatment->getPlaceHolder()) ?>" value="<?= $Page->Treatment->EditValue ?>"<?= $Page->Treatment->editAttributes() ?> aria-describedby="x_Treatment_help">
<?= $Page->Treatment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Treatment->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUIDoneDate1->Visible) { // IUIDoneDate1 ?>
    <div id="r_IUIDoneDate1" class="form-group row">
        <label id="elh_monitor_treatment_plan_IUIDoneDate1" for="x_IUIDoneDate1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IUIDoneDate1->caption() ?><?= $Page->IUIDoneDate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUIDoneDate1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate1">
<input type="<?= $Page->IUIDoneDate1->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_IUIDoneDate1" name="x_IUIDoneDate1" id="x_IUIDoneDate1" placeholder="<?= HtmlEncode($Page->IUIDoneDate1->getPlaceHolder()) ?>" value="<?= $Page->IUIDoneDate1->EditValue ?>"<?= $Page->IUIDoneDate1->editAttributes() ?> aria-describedby="x_IUIDoneDate1_help">
<?= $Page->IUIDoneDate1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IUIDoneDate1->getErrorMessage() ?></div>
<?php if (!$Page->IUIDoneDate1->ReadOnly && !$Page->IUIDoneDate1->Disabled && !isset($Page->IUIDoneDate1->EditAttrs["readonly"]) && !isset($Page->IUIDoneDate1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_IUIDoneDate1", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUIDoneYesNo1->Visible) { // IUIDoneYesNo1 ?>
    <div id="r_IUIDoneYesNo1" class="form-group row">
        <label id="elh_monitor_treatment_plan_IUIDoneYesNo1" for="x_IUIDoneYesNo1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IUIDoneYesNo1->caption() ?><?= $Page->IUIDoneYesNo1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUIDoneYesNo1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo1">
<input type="<?= $Page->IUIDoneYesNo1->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_IUIDoneYesNo1" name="x_IUIDoneYesNo1" id="x_IUIDoneYesNo1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IUIDoneYesNo1->getPlaceHolder()) ?>" value="<?= $Page->IUIDoneYesNo1->EditValue ?>"<?= $Page->IUIDoneYesNo1->editAttributes() ?> aria-describedby="x_IUIDoneYesNo1_help">
<?= $Page->IUIDoneYesNo1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IUIDoneYesNo1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UPTTestDate1->Visible) { // UPTTestDate1 ?>
    <div id="r_UPTTestDate1" class="form-group row">
        <label id="elh_monitor_treatment_plan_UPTTestDate1" for="x_UPTTestDate1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UPTTestDate1->caption() ?><?= $Page->UPTTestDate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UPTTestDate1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate1">
<input type="<?= $Page->UPTTestDate1->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_UPTTestDate1" name="x_UPTTestDate1" id="x_UPTTestDate1" placeholder="<?= HtmlEncode($Page->UPTTestDate1->getPlaceHolder()) ?>" value="<?= $Page->UPTTestDate1->EditValue ?>"<?= $Page->UPTTestDate1->editAttributes() ?> aria-describedby="x_UPTTestDate1_help">
<?= $Page->UPTTestDate1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UPTTestDate1->getErrorMessage() ?></div>
<?php if (!$Page->UPTTestDate1->ReadOnly && !$Page->UPTTestDate1->Disabled && !isset($Page->UPTTestDate1->EditAttrs["readonly"]) && !isset($Page->UPTTestDate1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_UPTTestDate1", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UPTTestYesNo1->Visible) { // UPTTestYesNo1 ?>
    <div id="r_UPTTestYesNo1" class="form-group row">
        <label id="elh_monitor_treatment_plan_UPTTestYesNo1" for="x_UPTTestYesNo1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UPTTestYesNo1->caption() ?><?= $Page->UPTTestYesNo1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UPTTestYesNo1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo1">
<input type="<?= $Page->UPTTestYesNo1->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_UPTTestYesNo1" name="x_UPTTestYesNo1" id="x_UPTTestYesNo1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UPTTestYesNo1->getPlaceHolder()) ?>" value="<?= $Page->UPTTestYesNo1->EditValue ?>"<?= $Page->UPTTestYesNo1->editAttributes() ?> aria-describedby="x_UPTTestYesNo1_help">
<?= $Page->UPTTestYesNo1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UPTTestYesNo1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUIDoneDate2->Visible) { // IUIDoneDate2 ?>
    <div id="r_IUIDoneDate2" class="form-group row">
        <label id="elh_monitor_treatment_plan_IUIDoneDate2" for="x_IUIDoneDate2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IUIDoneDate2->caption() ?><?= $Page->IUIDoneDate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUIDoneDate2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate2">
<input type="<?= $Page->IUIDoneDate2->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_IUIDoneDate2" name="x_IUIDoneDate2" id="x_IUIDoneDate2" placeholder="<?= HtmlEncode($Page->IUIDoneDate2->getPlaceHolder()) ?>" value="<?= $Page->IUIDoneDate2->EditValue ?>"<?= $Page->IUIDoneDate2->editAttributes() ?> aria-describedby="x_IUIDoneDate2_help">
<?= $Page->IUIDoneDate2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IUIDoneDate2->getErrorMessage() ?></div>
<?php if (!$Page->IUIDoneDate2->ReadOnly && !$Page->IUIDoneDate2->Disabled && !isset($Page->IUIDoneDate2->EditAttrs["readonly"]) && !isset($Page->IUIDoneDate2->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_IUIDoneDate2", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUIDoneYesNo2->Visible) { // IUIDoneYesNo2 ?>
    <div id="r_IUIDoneYesNo2" class="form-group row">
        <label id="elh_monitor_treatment_plan_IUIDoneYesNo2" for="x_IUIDoneYesNo2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IUIDoneYesNo2->caption() ?><?= $Page->IUIDoneYesNo2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUIDoneYesNo2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo2">
<input type="<?= $Page->IUIDoneYesNo2->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_IUIDoneYesNo2" name="x_IUIDoneYesNo2" id="x_IUIDoneYesNo2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IUIDoneYesNo2->getPlaceHolder()) ?>" value="<?= $Page->IUIDoneYesNo2->EditValue ?>"<?= $Page->IUIDoneYesNo2->editAttributes() ?> aria-describedby="x_IUIDoneYesNo2_help">
<?= $Page->IUIDoneYesNo2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IUIDoneYesNo2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UPTTestDate2->Visible) { // UPTTestDate2 ?>
    <div id="r_UPTTestDate2" class="form-group row">
        <label id="elh_monitor_treatment_plan_UPTTestDate2" for="x_UPTTestDate2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UPTTestDate2->caption() ?><?= $Page->UPTTestDate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UPTTestDate2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate2">
<input type="<?= $Page->UPTTestDate2->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_UPTTestDate2" name="x_UPTTestDate2" id="x_UPTTestDate2" placeholder="<?= HtmlEncode($Page->UPTTestDate2->getPlaceHolder()) ?>" value="<?= $Page->UPTTestDate2->EditValue ?>"<?= $Page->UPTTestDate2->editAttributes() ?> aria-describedby="x_UPTTestDate2_help">
<?= $Page->UPTTestDate2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UPTTestDate2->getErrorMessage() ?></div>
<?php if (!$Page->UPTTestDate2->ReadOnly && !$Page->UPTTestDate2->Disabled && !isset($Page->UPTTestDate2->EditAttrs["readonly"]) && !isset($Page->UPTTestDate2->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_UPTTestDate2", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UPTTestYesNo2->Visible) { // UPTTestYesNo2 ?>
    <div id="r_UPTTestYesNo2" class="form-group row">
        <label id="elh_monitor_treatment_plan_UPTTestYesNo2" for="x_UPTTestYesNo2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UPTTestYesNo2->caption() ?><?= $Page->UPTTestYesNo2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UPTTestYesNo2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo2">
<input type="<?= $Page->UPTTestYesNo2->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_UPTTestYesNo2" name="x_UPTTestYesNo2" id="x_UPTTestYesNo2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UPTTestYesNo2->getPlaceHolder()) ?>" value="<?= $Page->UPTTestYesNo2->EditValue ?>"<?= $Page->UPTTestYesNo2->editAttributes() ?> aria-describedby="x_UPTTestYesNo2_help">
<?= $Page->UPTTestYesNo2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UPTTestYesNo2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUIDoneDate3->Visible) { // IUIDoneDate3 ?>
    <div id="r_IUIDoneDate3" class="form-group row">
        <label id="elh_monitor_treatment_plan_IUIDoneDate3" for="x_IUIDoneDate3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IUIDoneDate3->caption() ?><?= $Page->IUIDoneDate3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUIDoneDate3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate3">
<input type="<?= $Page->IUIDoneDate3->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_IUIDoneDate3" name="x_IUIDoneDate3" id="x_IUIDoneDate3" placeholder="<?= HtmlEncode($Page->IUIDoneDate3->getPlaceHolder()) ?>" value="<?= $Page->IUIDoneDate3->EditValue ?>"<?= $Page->IUIDoneDate3->editAttributes() ?> aria-describedby="x_IUIDoneDate3_help">
<?= $Page->IUIDoneDate3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IUIDoneDate3->getErrorMessage() ?></div>
<?php if (!$Page->IUIDoneDate3->ReadOnly && !$Page->IUIDoneDate3->Disabled && !isset($Page->IUIDoneDate3->EditAttrs["readonly"]) && !isset($Page->IUIDoneDate3->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_IUIDoneDate3", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUIDoneYesNo3->Visible) { // IUIDoneYesNo3 ?>
    <div id="r_IUIDoneYesNo3" class="form-group row">
        <label id="elh_monitor_treatment_plan_IUIDoneYesNo3" for="x_IUIDoneYesNo3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IUIDoneYesNo3->caption() ?><?= $Page->IUIDoneYesNo3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUIDoneYesNo3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo3">
<input type="<?= $Page->IUIDoneYesNo3->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_IUIDoneYesNo3" name="x_IUIDoneYesNo3" id="x_IUIDoneYesNo3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IUIDoneYesNo3->getPlaceHolder()) ?>" value="<?= $Page->IUIDoneYesNo3->EditValue ?>"<?= $Page->IUIDoneYesNo3->editAttributes() ?> aria-describedby="x_IUIDoneYesNo3_help">
<?= $Page->IUIDoneYesNo3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IUIDoneYesNo3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UPTTestDate3->Visible) { // UPTTestDate3 ?>
    <div id="r_UPTTestDate3" class="form-group row">
        <label id="elh_monitor_treatment_plan_UPTTestDate3" for="x_UPTTestDate3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UPTTestDate3->caption() ?><?= $Page->UPTTestDate3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UPTTestDate3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate3">
<input type="<?= $Page->UPTTestDate3->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_UPTTestDate3" name="x_UPTTestDate3" id="x_UPTTestDate3" placeholder="<?= HtmlEncode($Page->UPTTestDate3->getPlaceHolder()) ?>" value="<?= $Page->UPTTestDate3->EditValue ?>"<?= $Page->UPTTestDate3->editAttributes() ?> aria-describedby="x_UPTTestDate3_help">
<?= $Page->UPTTestDate3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UPTTestDate3->getErrorMessage() ?></div>
<?php if (!$Page->UPTTestDate3->ReadOnly && !$Page->UPTTestDate3->Disabled && !isset($Page->UPTTestDate3->EditAttrs["readonly"]) && !isset($Page->UPTTestDate3->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_UPTTestDate3", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UPTTestYesNo3->Visible) { // UPTTestYesNo3 ?>
    <div id="r_UPTTestYesNo3" class="form-group row">
        <label id="elh_monitor_treatment_plan_UPTTestYesNo3" for="x_UPTTestYesNo3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UPTTestYesNo3->caption() ?><?= $Page->UPTTestYesNo3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UPTTestYesNo3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo3">
<input type="<?= $Page->UPTTestYesNo3->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_UPTTestYesNo3" name="x_UPTTestYesNo3" id="x_UPTTestYesNo3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UPTTestYesNo3->getPlaceHolder()) ?>" value="<?= $Page->UPTTestYesNo3->EditValue ?>"<?= $Page->UPTTestYesNo3->editAttributes() ?> aria-describedby="x_UPTTestYesNo3_help">
<?= $Page->UPTTestYesNo3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UPTTestYesNo3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUIDoneDate4->Visible) { // IUIDoneDate4 ?>
    <div id="r_IUIDoneDate4" class="form-group row">
        <label id="elh_monitor_treatment_plan_IUIDoneDate4" for="x_IUIDoneDate4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IUIDoneDate4->caption() ?><?= $Page->IUIDoneDate4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUIDoneDate4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate4">
<input type="<?= $Page->IUIDoneDate4->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_IUIDoneDate4" name="x_IUIDoneDate4" id="x_IUIDoneDate4" placeholder="<?= HtmlEncode($Page->IUIDoneDate4->getPlaceHolder()) ?>" value="<?= $Page->IUIDoneDate4->EditValue ?>"<?= $Page->IUIDoneDate4->editAttributes() ?> aria-describedby="x_IUIDoneDate4_help">
<?= $Page->IUIDoneDate4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IUIDoneDate4->getErrorMessage() ?></div>
<?php if (!$Page->IUIDoneDate4->ReadOnly && !$Page->IUIDoneDate4->Disabled && !isset($Page->IUIDoneDate4->EditAttrs["readonly"]) && !isset($Page->IUIDoneDate4->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_IUIDoneDate4", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUIDoneYesNo4->Visible) { // IUIDoneYesNo4 ?>
    <div id="r_IUIDoneYesNo4" class="form-group row">
        <label id="elh_monitor_treatment_plan_IUIDoneYesNo4" for="x_IUIDoneYesNo4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IUIDoneYesNo4->caption() ?><?= $Page->IUIDoneYesNo4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUIDoneYesNo4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo4">
<input type="<?= $Page->IUIDoneYesNo4->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_IUIDoneYesNo4" name="x_IUIDoneYesNo4" id="x_IUIDoneYesNo4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IUIDoneYesNo4->getPlaceHolder()) ?>" value="<?= $Page->IUIDoneYesNo4->EditValue ?>"<?= $Page->IUIDoneYesNo4->editAttributes() ?> aria-describedby="x_IUIDoneYesNo4_help">
<?= $Page->IUIDoneYesNo4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IUIDoneYesNo4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UPTTestDate4->Visible) { // UPTTestDate4 ?>
    <div id="r_UPTTestDate4" class="form-group row">
        <label id="elh_monitor_treatment_plan_UPTTestDate4" for="x_UPTTestDate4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UPTTestDate4->caption() ?><?= $Page->UPTTestDate4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UPTTestDate4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate4">
<input type="<?= $Page->UPTTestDate4->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_UPTTestDate4" name="x_UPTTestDate4" id="x_UPTTestDate4" placeholder="<?= HtmlEncode($Page->UPTTestDate4->getPlaceHolder()) ?>" value="<?= $Page->UPTTestDate4->EditValue ?>"<?= $Page->UPTTestDate4->editAttributes() ?> aria-describedby="x_UPTTestDate4_help">
<?= $Page->UPTTestDate4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UPTTestDate4->getErrorMessage() ?></div>
<?php if (!$Page->UPTTestDate4->ReadOnly && !$Page->UPTTestDate4->Disabled && !isset($Page->UPTTestDate4->EditAttrs["readonly"]) && !isset($Page->UPTTestDate4->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_UPTTestDate4", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UPTTestYesNo4->Visible) { // UPTTestYesNo4 ?>
    <div id="r_UPTTestYesNo4" class="form-group row">
        <label id="elh_monitor_treatment_plan_UPTTestYesNo4" for="x_UPTTestYesNo4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UPTTestYesNo4->caption() ?><?= $Page->UPTTestYesNo4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UPTTestYesNo4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo4">
<input type="<?= $Page->UPTTestYesNo4->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_UPTTestYesNo4" name="x_UPTTestYesNo4" id="x_UPTTestYesNo4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UPTTestYesNo4->getPlaceHolder()) ?>" value="<?= $Page->UPTTestYesNo4->EditValue ?>"<?= $Page->UPTTestYesNo4->editAttributes() ?> aria-describedby="x_UPTTestYesNo4_help">
<?= $Page->UPTTestYesNo4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UPTTestYesNo4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IVFStimulationDate->Visible) { // IVFStimulationDate ?>
    <div id="r_IVFStimulationDate" class="form-group row">
        <label id="elh_monitor_treatment_plan_IVFStimulationDate" for="x_IVFStimulationDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IVFStimulationDate->caption() ?><?= $Page->IVFStimulationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IVFStimulationDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IVFStimulationDate">
<input type="<?= $Page->IVFStimulationDate->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_IVFStimulationDate" name="x_IVFStimulationDate" id="x_IVFStimulationDate" placeholder="<?= HtmlEncode($Page->IVFStimulationDate->getPlaceHolder()) ?>" value="<?= $Page->IVFStimulationDate->EditValue ?>"<?= $Page->IVFStimulationDate->editAttributes() ?> aria-describedby="x_IVFStimulationDate_help">
<?= $Page->IVFStimulationDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IVFStimulationDate->getErrorMessage() ?></div>
<?php if (!$Page->IVFStimulationDate->ReadOnly && !$Page->IVFStimulationDate->Disabled && !isset($Page->IVFStimulationDate->EditAttrs["readonly"]) && !isset($Page->IVFStimulationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_IVFStimulationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IVFStimulationYesNo->Visible) { // IVFStimulationYesNo ?>
    <div id="r_IVFStimulationYesNo" class="form-group row">
        <label id="elh_monitor_treatment_plan_IVFStimulationYesNo" for="x_IVFStimulationYesNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IVFStimulationYesNo->caption() ?><?= $Page->IVFStimulationYesNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IVFStimulationYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IVFStimulationYesNo">
<input type="<?= $Page->IVFStimulationYesNo->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_IVFStimulationYesNo" name="x_IVFStimulationYesNo" id="x_IVFStimulationYesNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IVFStimulationYesNo->getPlaceHolder()) ?>" value="<?= $Page->IVFStimulationYesNo->EditValue ?>"<?= $Page->IVFStimulationYesNo->editAttributes() ?> aria-describedby="x_IVFStimulationYesNo_help">
<?= $Page->IVFStimulationYesNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IVFStimulationYesNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OPUDate->Visible) { // OPUDate ?>
    <div id="r_OPUDate" class="form-group row">
        <label id="elh_monitor_treatment_plan_OPUDate" for="x_OPUDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OPUDate->caption() ?><?= $Page->OPUDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OPUDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_OPUDate">
<input type="<?= $Page->OPUDate->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_OPUDate" name="x_OPUDate" id="x_OPUDate" placeholder="<?= HtmlEncode($Page->OPUDate->getPlaceHolder()) ?>" value="<?= $Page->OPUDate->EditValue ?>"<?= $Page->OPUDate->editAttributes() ?> aria-describedby="x_OPUDate_help">
<?= $Page->OPUDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OPUDate->getErrorMessage() ?></div>
<?php if (!$Page->OPUDate->ReadOnly && !$Page->OPUDate->Disabled && !isset($Page->OPUDate->EditAttrs["readonly"]) && !isset($Page->OPUDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_OPUDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OPUYesNo->Visible) { // OPUYesNo ?>
    <div id="r_OPUYesNo" class="form-group row">
        <label id="elh_monitor_treatment_plan_OPUYesNo" for="x_OPUYesNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OPUYesNo->caption() ?><?= $Page->OPUYesNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OPUYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_OPUYesNo">
<input type="<?= $Page->OPUYesNo->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_OPUYesNo" name="x_OPUYesNo" id="x_OPUYesNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OPUYesNo->getPlaceHolder()) ?>" value="<?= $Page->OPUYesNo->EditValue ?>"<?= $Page->OPUYesNo->editAttributes() ?> aria-describedby="x_OPUYesNo_help">
<?= $Page->OPUYesNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OPUYesNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ETDate->Visible) { // ETDate ?>
    <div id="r_ETDate" class="form-group row">
        <label id="elh_monitor_treatment_plan_ETDate" for="x_ETDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ETDate->caption() ?><?= $Page->ETDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ETDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_ETDate">
<input type="<?= $Page->ETDate->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_ETDate" name="x_ETDate" id="x_ETDate" placeholder="<?= HtmlEncode($Page->ETDate->getPlaceHolder()) ?>" value="<?= $Page->ETDate->EditValue ?>"<?= $Page->ETDate->editAttributes() ?> aria-describedby="x_ETDate_help">
<?= $Page->ETDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ETDate->getErrorMessage() ?></div>
<?php if (!$Page->ETDate->ReadOnly && !$Page->ETDate->Disabled && !isset($Page->ETDate->EditAttrs["readonly"]) && !isset($Page->ETDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_ETDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ETYesNo->Visible) { // ETYesNo ?>
    <div id="r_ETYesNo" class="form-group row">
        <label id="elh_monitor_treatment_plan_ETYesNo" for="x_ETYesNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ETYesNo->caption() ?><?= $Page->ETYesNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ETYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_ETYesNo">
<input type="<?= $Page->ETYesNo->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_ETYesNo" name="x_ETYesNo" id="x_ETYesNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ETYesNo->getPlaceHolder()) ?>" value="<?= $Page->ETYesNo->EditValue ?>"<?= $Page->ETYesNo->editAttributes() ?> aria-describedby="x_ETYesNo_help">
<?= $Page->ETYesNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ETYesNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BetaHCGDate->Visible) { // BetaHCGDate ?>
    <div id="r_BetaHCGDate" class="form-group row">
        <label id="elh_monitor_treatment_plan_BetaHCGDate" for="x_BetaHCGDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BetaHCGDate->caption() ?><?= $Page->BetaHCGDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BetaHCGDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_BetaHCGDate">
<input type="<?= $Page->BetaHCGDate->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_BetaHCGDate" name="x_BetaHCGDate" id="x_BetaHCGDate" placeholder="<?= HtmlEncode($Page->BetaHCGDate->getPlaceHolder()) ?>" value="<?= $Page->BetaHCGDate->EditValue ?>"<?= $Page->BetaHCGDate->editAttributes() ?> aria-describedby="x_BetaHCGDate_help">
<?= $Page->BetaHCGDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BetaHCGDate->getErrorMessage() ?></div>
<?php if (!$Page->BetaHCGDate->ReadOnly && !$Page->BetaHCGDate->Disabled && !isset($Page->BetaHCGDate->EditAttrs["readonly"]) && !isset($Page->BetaHCGDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_BetaHCGDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BetaHCGYesNo->Visible) { // BetaHCGYesNo ?>
    <div id="r_BetaHCGYesNo" class="form-group row">
        <label id="elh_monitor_treatment_plan_BetaHCGYesNo" for="x_BetaHCGYesNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BetaHCGYesNo->caption() ?><?= $Page->BetaHCGYesNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BetaHCGYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_BetaHCGYesNo">
<input type="<?= $Page->BetaHCGYesNo->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_BetaHCGYesNo" name="x_BetaHCGYesNo" id="x_BetaHCGYesNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BetaHCGYesNo->getPlaceHolder()) ?>" value="<?= $Page->BetaHCGYesNo->EditValue ?>"<?= $Page->BetaHCGYesNo->editAttributes() ?> aria-describedby="x_BetaHCGYesNo_help">
<?= $Page->BetaHCGYesNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BetaHCGYesNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FETDate->Visible) { // FETDate ?>
    <div id="r_FETDate" class="form-group row">
        <label id="elh_monitor_treatment_plan_FETDate" for="x_FETDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FETDate->caption() ?><?= $Page->FETDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FETDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FETDate">
<input type="<?= $Page->FETDate->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_FETDate" name="x_FETDate" id="x_FETDate" placeholder="<?= HtmlEncode($Page->FETDate->getPlaceHolder()) ?>" value="<?= $Page->FETDate->EditValue ?>"<?= $Page->FETDate->editAttributes() ?> aria-describedby="x_FETDate_help">
<?= $Page->FETDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FETDate->getErrorMessage() ?></div>
<?php if (!$Page->FETDate->ReadOnly && !$Page->FETDate->Disabled && !isset($Page->FETDate->EditAttrs["readonly"]) && !isset($Page->FETDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_FETDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FETYesNo->Visible) { // FETYesNo ?>
    <div id="r_FETYesNo" class="form-group row">
        <label id="elh_monitor_treatment_plan_FETYesNo" for="x_FETYesNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FETYesNo->caption() ?><?= $Page->FETYesNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FETYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FETYesNo">
<input type="<?= $Page->FETYesNo->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_FETYesNo" name="x_FETYesNo" id="x_FETYesNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FETYesNo->getPlaceHolder()) ?>" value="<?= $Page->FETYesNo->EditValue ?>"<?= $Page->FETYesNo->editAttributes() ?> aria-describedby="x_FETYesNo_help">
<?= $Page->FETYesNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FETYesNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FBetaHCGDate->Visible) { // FBetaHCGDate ?>
    <div id="r_FBetaHCGDate" class="form-group row">
        <label id="elh_monitor_treatment_plan_FBetaHCGDate" for="x_FBetaHCGDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FBetaHCGDate->caption() ?><?= $Page->FBetaHCGDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FBetaHCGDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FBetaHCGDate">
<input type="<?= $Page->FBetaHCGDate->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_FBetaHCGDate" name="x_FBetaHCGDate" id="x_FBetaHCGDate" placeholder="<?= HtmlEncode($Page->FBetaHCGDate->getPlaceHolder()) ?>" value="<?= $Page->FBetaHCGDate->EditValue ?>"<?= $Page->FBetaHCGDate->editAttributes() ?> aria-describedby="x_FBetaHCGDate_help">
<?= $Page->FBetaHCGDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FBetaHCGDate->getErrorMessage() ?></div>
<?php if (!$Page->FBetaHCGDate->ReadOnly && !$Page->FBetaHCGDate->Disabled && !isset($Page->FBetaHCGDate->EditAttrs["readonly"]) && !isset($Page->FBetaHCGDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_FBetaHCGDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FBetaHCGYesNo->Visible) { // FBetaHCGYesNo ?>
    <div id="r_FBetaHCGYesNo" class="form-group row">
        <label id="elh_monitor_treatment_plan_FBetaHCGYesNo" for="x_FBetaHCGYesNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FBetaHCGYesNo->caption() ?><?= $Page->FBetaHCGYesNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FBetaHCGYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FBetaHCGYesNo">
<input type="<?= $Page->FBetaHCGYesNo->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_FBetaHCGYesNo" name="x_FBetaHCGYesNo" id="x_FBetaHCGYesNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FBetaHCGYesNo->getPlaceHolder()) ?>" value="<?= $Page->FBetaHCGYesNo->EditValue ?>"<?= $Page->FBetaHCGYesNo->editAttributes() ?> aria-describedby="x_FBetaHCGYesNo_help">
<?= $Page->FBetaHCGYesNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FBetaHCGYesNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_monitor_treatment_plan_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_monitor_treatment_plan_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_monitor_treatment_plan_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_monitor_treatment_plan_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_monitor_treatment_plan_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
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
    ew.addEventHandlers("monitor_treatment_plan");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

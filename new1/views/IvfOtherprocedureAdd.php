<?php

namespace PHPMaker2021\project3;

// Page object
$IvfOtherprocedureAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_otherprocedureadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fivf_otherprocedureadd = currentForm = new ew.Form("fivf_otherprocedureadd", "add");

    // Add fields
    var fields = ew.vars.tables.ivf_otherprocedure.fields;
    fivf_otherprocedureadd.addFields([
        ["RIDNO", [fields.RIDNO.required ? ew.Validators.required(fields.RIDNO.caption) : null, ew.Validators.integer], fields.RIDNO.isInvalid],
        ["Name", [fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["Age", [fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["SEX", [fields.SEX.required ? ew.Validators.required(fields.SEX.caption) : null], fields.SEX.isInvalid],
        ["Address", [fields.Address.required ? ew.Validators.required(fields.Address.caption) : null], fields.Address.isInvalid],
        ["DateofAdmission", [fields.DateofAdmission.required ? ew.Validators.required(fields.DateofAdmission.caption) : null, ew.Validators.datetime(0)], fields.DateofAdmission.isInvalid],
        ["DateofProcedure", [fields.DateofProcedure.required ? ew.Validators.required(fields.DateofProcedure.caption) : null, ew.Validators.datetime(0)], fields.DateofProcedure.isInvalid],
        ["DateofDischarge", [fields.DateofDischarge.required ? ew.Validators.required(fields.DateofDischarge.caption) : null, ew.Validators.datetime(0)], fields.DateofDischarge.isInvalid],
        ["Consultant", [fields.Consultant.required ? ew.Validators.required(fields.Consultant.caption) : null], fields.Consultant.isInvalid],
        ["Surgeon", [fields.Surgeon.required ? ew.Validators.required(fields.Surgeon.caption) : null], fields.Surgeon.isInvalid],
        ["Anesthetist", [fields.Anesthetist.required ? ew.Validators.required(fields.Anesthetist.caption) : null], fields.Anesthetist.isInvalid],
        ["IdentificationMark", [fields.IdentificationMark.required ? ew.Validators.required(fields.IdentificationMark.caption) : null], fields.IdentificationMark.isInvalid],
        ["ProcedureDone", [fields.ProcedureDone.required ? ew.Validators.required(fields.ProcedureDone.caption) : null], fields.ProcedureDone.isInvalid],
        ["PROVISIONALDIAGNOSIS", [fields.PROVISIONALDIAGNOSIS.required ? ew.Validators.required(fields.PROVISIONALDIAGNOSIS.caption) : null], fields.PROVISIONALDIAGNOSIS.isInvalid],
        ["Chiefcomplaints", [fields.Chiefcomplaints.required ? ew.Validators.required(fields.Chiefcomplaints.caption) : null], fields.Chiefcomplaints.isInvalid],
        ["MaritallHistory", [fields.MaritallHistory.required ? ew.Validators.required(fields.MaritallHistory.caption) : null], fields.MaritallHistory.isInvalid],
        ["MenstrualHistory", [fields.MenstrualHistory.required ? ew.Validators.required(fields.MenstrualHistory.caption) : null], fields.MenstrualHistory.isInvalid],
        ["SurgicalHistory", [fields.SurgicalHistory.required ? ew.Validators.required(fields.SurgicalHistory.caption) : null], fields.SurgicalHistory.isInvalid],
        ["PastHistory", [fields.PastHistory.required ? ew.Validators.required(fields.PastHistory.caption) : null], fields.PastHistory.isInvalid],
        ["FamilyHistory", [fields.FamilyHistory.required ? ew.Validators.required(fields.FamilyHistory.caption) : null], fields.FamilyHistory.isInvalid],
        ["Temp", [fields.Temp.required ? ew.Validators.required(fields.Temp.caption) : null], fields.Temp.isInvalid],
        ["Pulse", [fields.Pulse.required ? ew.Validators.required(fields.Pulse.caption) : null], fields.Pulse.isInvalid],
        ["BP", [fields.BP.required ? ew.Validators.required(fields.BP.caption) : null], fields.BP.isInvalid],
        ["CNS", [fields.CNS.required ? ew.Validators.required(fields.CNS.caption) : null], fields.CNS.isInvalid],
        ["_RS", [fields._RS.required ? ew.Validators.required(fields._RS.caption) : null], fields._RS.isInvalid],
        ["CVS", [fields.CVS.required ? ew.Validators.required(fields.CVS.caption) : null], fields.CVS.isInvalid],
        ["PA", [fields.PA.required ? ew.Validators.required(fields.PA.caption) : null], fields.PA.isInvalid],
        ["InvestigationReport", [fields.InvestigationReport.required ? ew.Validators.required(fields.InvestigationReport.caption) : null], fields.InvestigationReport.isInvalid],
        ["FinalDiagnosis", [fields.FinalDiagnosis.required ? ew.Validators.required(fields.FinalDiagnosis.caption) : null], fields.FinalDiagnosis.isInvalid],
        ["Treatment", [fields.Treatment.required ? ew.Validators.required(fields.Treatment.caption) : null], fields.Treatment.isInvalid],
        ["DetailOfOperation", [fields.DetailOfOperation.required ? ew.Validators.required(fields.DetailOfOperation.caption) : null], fields.DetailOfOperation.isInvalid],
        ["FollowUpAdvice", [fields.FollowUpAdvice.required ? ew.Validators.required(fields.FollowUpAdvice.caption) : null], fields.FollowUpAdvice.isInvalid],
        ["FollowUpMedication", [fields.FollowUpMedication.required ? ew.Validators.required(fields.FollowUpMedication.caption) : null], fields.FollowUpMedication.isInvalid],
        ["Plan", [fields.Plan.required ? ew.Validators.required(fields.Plan.caption) : null], fields.Plan.isInvalid],
        ["TidNo", [fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_otherprocedureadd,
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
    fivf_otherprocedureadd.validate = function () {
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
    fivf_otherprocedureadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_otherprocedureadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fivf_otherprocedureadd");
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
<form name="fivf_otherprocedureadd" id="fivf_otherprocedureadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_otherprocedure">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <div id="r_RIDNO" class="form-group row">
        <label id="elh_ivf_otherprocedure_RIDNO" for="x_RIDNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RIDNO->caption() ?><?= $Page->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_RIDNO">
<input type="<?= $Page->RIDNO->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?= HtmlEncode($Page->RIDNO->getPlaceHolder()) ?>" value="<?= $Page->RIDNO->EditValue ?>"<?= $Page->RIDNO->editAttributes() ?> aria-describedby="x_RIDNO_help">
<?= $Page->RIDNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_otherprocedure_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_ivf_otherprocedure_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SEX->Visible) { // SEX ?>
    <div id="r_SEX" class="form-group row">
        <label id="elh_ivf_otherprocedure_SEX" for="x_SEX" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SEX->caption() ?><?= $Page->SEX->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SEX->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_SEX">
<input type="<?= $Page->SEX->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_SEX" name="x_SEX" id="x_SEX" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SEX->getPlaceHolder()) ?>" value="<?= $Page->SEX->EditValue ?>"<?= $Page->SEX->editAttributes() ?> aria-describedby="x_SEX_help">
<?= $Page->SEX->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SEX->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Address->Visible) { // Address ?>
    <div id="r_Address" class="form-group row">
        <label id="elh_ivf_otherprocedure_Address" for="x_Address" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Address->caption() ?><?= $Page->Address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Address->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Address">
<input type="<?= $Page->Address->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_Address" name="x_Address" id="x_Address" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Address->getPlaceHolder()) ?>" value="<?= $Page->Address->EditValue ?>"<?= $Page->Address->editAttributes() ?> aria-describedby="x_Address_help">
<?= $Page->Address->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Address->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DateofAdmission->Visible) { // DateofAdmission ?>
    <div id="r_DateofAdmission" class="form-group row">
        <label id="elh_ivf_otherprocedure_DateofAdmission" for="x_DateofAdmission" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DateofAdmission->caption() ?><?= $Page->DateofAdmission->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DateofAdmission->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_DateofAdmission">
<input type="<?= $Page->DateofAdmission->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_DateofAdmission" name="x_DateofAdmission" id="x_DateofAdmission" placeholder="<?= HtmlEncode($Page->DateofAdmission->getPlaceHolder()) ?>" value="<?= $Page->DateofAdmission->EditValue ?>"<?= $Page->DateofAdmission->editAttributes() ?> aria-describedby="x_DateofAdmission_help">
<?= $Page->DateofAdmission->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DateofAdmission->getErrorMessage() ?></div>
<?php if (!$Page->DateofAdmission->ReadOnly && !$Page->DateofAdmission->Disabled && !isset($Page->DateofAdmission->EditAttrs["readonly"]) && !isset($Page->DateofAdmission->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_otherprocedureadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_otherprocedureadd", "x_DateofAdmission", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DateofProcedure->Visible) { // DateofProcedure ?>
    <div id="r_DateofProcedure" class="form-group row">
        <label id="elh_ivf_otherprocedure_DateofProcedure" for="x_DateofProcedure" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DateofProcedure->caption() ?><?= $Page->DateofProcedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DateofProcedure->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_DateofProcedure">
<input type="<?= $Page->DateofProcedure->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_DateofProcedure" name="x_DateofProcedure" id="x_DateofProcedure" placeholder="<?= HtmlEncode($Page->DateofProcedure->getPlaceHolder()) ?>" value="<?= $Page->DateofProcedure->EditValue ?>"<?= $Page->DateofProcedure->editAttributes() ?> aria-describedby="x_DateofProcedure_help">
<?= $Page->DateofProcedure->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DateofProcedure->getErrorMessage() ?></div>
<?php if (!$Page->DateofProcedure->ReadOnly && !$Page->DateofProcedure->Disabled && !isset($Page->DateofProcedure->EditAttrs["readonly"]) && !isset($Page->DateofProcedure->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_otherprocedureadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_otherprocedureadd", "x_DateofProcedure", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DateofDischarge->Visible) { // DateofDischarge ?>
    <div id="r_DateofDischarge" class="form-group row">
        <label id="elh_ivf_otherprocedure_DateofDischarge" for="x_DateofDischarge" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DateofDischarge->caption() ?><?= $Page->DateofDischarge->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DateofDischarge->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_DateofDischarge">
<input type="<?= $Page->DateofDischarge->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_DateofDischarge" name="x_DateofDischarge" id="x_DateofDischarge" placeholder="<?= HtmlEncode($Page->DateofDischarge->getPlaceHolder()) ?>" value="<?= $Page->DateofDischarge->EditValue ?>"<?= $Page->DateofDischarge->editAttributes() ?> aria-describedby="x_DateofDischarge_help">
<?= $Page->DateofDischarge->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DateofDischarge->getErrorMessage() ?></div>
<?php if (!$Page->DateofDischarge->ReadOnly && !$Page->DateofDischarge->Disabled && !isset($Page->DateofDischarge->EditAttrs["readonly"]) && !isset($Page->DateofDischarge->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_otherprocedureadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_otherprocedureadd", "x_DateofDischarge", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <div id="r_Consultant" class="form-group row">
        <label id="elh_ivf_otherprocedure_Consultant" for="x_Consultant" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Consultant->caption() ?><?= $Page->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Consultant->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Consultant">
<input type="<?= $Page->Consultant->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Consultant->getPlaceHolder()) ?>" value="<?= $Page->Consultant->EditValue ?>"<?= $Page->Consultant->editAttributes() ?> aria-describedby="x_Consultant_help">
<?= $Page->Consultant->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Consultant->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
    <div id="r_Surgeon" class="form-group row">
        <label id="elh_ivf_otherprocedure_Surgeon" for="x_Surgeon" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Surgeon->caption() ?><?= $Page->Surgeon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Surgeon->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Surgeon">
<input type="<?= $Page->Surgeon->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_Surgeon" name="x_Surgeon" id="x_Surgeon" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Surgeon->getPlaceHolder()) ?>" value="<?= $Page->Surgeon->EditValue ?>"<?= $Page->Surgeon->editAttributes() ?> aria-describedby="x_Surgeon_help">
<?= $Page->Surgeon->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Surgeon->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
    <div id="r_Anesthetist" class="form-group row">
        <label id="elh_ivf_otherprocedure_Anesthetist" for="x_Anesthetist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Anesthetist->caption() ?><?= $Page->Anesthetist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Anesthetist->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Anesthetist">
<input type="<?= $Page->Anesthetist->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_Anesthetist" name="x_Anesthetist" id="x_Anesthetist" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Anesthetist->getPlaceHolder()) ?>" value="<?= $Page->Anesthetist->EditValue ?>"<?= $Page->Anesthetist->editAttributes() ?> aria-describedby="x_Anesthetist_help">
<?= $Page->Anesthetist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Anesthetist->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
    <div id="r_IdentificationMark" class="form-group row">
        <label id="elh_ivf_otherprocedure_IdentificationMark" for="x_IdentificationMark" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IdentificationMark->caption() ?><?= $Page->IdentificationMark->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IdentificationMark->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_IdentificationMark">
<input type="<?= $Page->IdentificationMark->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_IdentificationMark" name="x_IdentificationMark" id="x_IdentificationMark" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IdentificationMark->getPlaceHolder()) ?>" value="<?= $Page->IdentificationMark->EditValue ?>"<?= $Page->IdentificationMark->editAttributes() ?> aria-describedby="x_IdentificationMark_help">
<?= $Page->IdentificationMark->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IdentificationMark->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureDone->Visible) { // ProcedureDone ?>
    <div id="r_ProcedureDone" class="form-group row">
        <label id="elh_ivf_otherprocedure_ProcedureDone" for="x_ProcedureDone" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProcedureDone->caption() ?><?= $Page->ProcedureDone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureDone->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_ProcedureDone">
<input type="<?= $Page->ProcedureDone->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_ProcedureDone" name="x_ProcedureDone" id="x_ProcedureDone" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProcedureDone->getPlaceHolder()) ?>" value="<?= $Page->ProcedureDone->EditValue ?>"<?= $Page->ProcedureDone->editAttributes() ?> aria-describedby="x_ProcedureDone_help">
<?= $Page->ProcedureDone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProcedureDone->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
    <div id="r_PROVISIONALDIAGNOSIS" class="form-group row">
        <label id="elh_ivf_otherprocedure_PROVISIONALDIAGNOSIS" for="x_PROVISIONALDIAGNOSIS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PROVISIONALDIAGNOSIS->caption() ?><?= $Page->PROVISIONALDIAGNOSIS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_PROVISIONALDIAGNOSIS">
<input type="<?= $Page->PROVISIONALDIAGNOSIS->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_PROVISIONALDIAGNOSIS" name="x_PROVISIONALDIAGNOSIS" id="x_PROVISIONALDIAGNOSIS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PROVISIONALDIAGNOSIS->getPlaceHolder()) ?>" value="<?= $Page->PROVISIONALDIAGNOSIS->EditValue ?>"<?= $Page->PROVISIONALDIAGNOSIS->editAttributes() ?> aria-describedby="x_PROVISIONALDIAGNOSIS_help">
<?= $Page->PROVISIONALDIAGNOSIS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PROVISIONALDIAGNOSIS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
    <div id="r_Chiefcomplaints" class="form-group row">
        <label id="elh_ivf_otherprocedure_Chiefcomplaints" for="x_Chiefcomplaints" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Chiefcomplaints->caption() ?><?= $Page->Chiefcomplaints->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Chiefcomplaints->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Chiefcomplaints">
<input type="<?= $Page->Chiefcomplaints->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_Chiefcomplaints" name="x_Chiefcomplaints" id="x_Chiefcomplaints" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Chiefcomplaints->getPlaceHolder()) ?>" value="<?= $Page->Chiefcomplaints->EditValue ?>"<?= $Page->Chiefcomplaints->editAttributes() ?> aria-describedby="x_Chiefcomplaints_help">
<?= $Page->Chiefcomplaints->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Chiefcomplaints->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MaritallHistory->Visible) { // MaritallHistory ?>
    <div id="r_MaritallHistory" class="form-group row">
        <label id="elh_ivf_otherprocedure_MaritallHistory" for="x_MaritallHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MaritallHistory->caption() ?><?= $Page->MaritallHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MaritallHistory->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_MaritallHistory">
<input type="<?= $Page->MaritallHistory->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_MaritallHistory" name="x_MaritallHistory" id="x_MaritallHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MaritallHistory->getPlaceHolder()) ?>" value="<?= $Page->MaritallHistory->EditValue ?>"<?= $Page->MaritallHistory->editAttributes() ?> aria-describedby="x_MaritallHistory_help">
<?= $Page->MaritallHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MaritallHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
    <div id="r_MenstrualHistory" class="form-group row">
        <label id="elh_ivf_otherprocedure_MenstrualHistory" for="x_MenstrualHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MenstrualHistory->caption() ?><?= $Page->MenstrualHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MenstrualHistory->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_MenstrualHistory">
<input type="<?= $Page->MenstrualHistory->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_MenstrualHistory" name="x_MenstrualHistory" id="x_MenstrualHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MenstrualHistory->getPlaceHolder()) ?>" value="<?= $Page->MenstrualHistory->EditValue ?>"<?= $Page->MenstrualHistory->editAttributes() ?> aria-describedby="x_MenstrualHistory_help">
<?= $Page->MenstrualHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MenstrualHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
    <div id="r_SurgicalHistory" class="form-group row">
        <label id="elh_ivf_otherprocedure_SurgicalHistory" for="x_SurgicalHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SurgicalHistory->caption() ?><?= $Page->SurgicalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SurgicalHistory->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_SurgicalHistory">
<input type="<?= $Page->SurgicalHistory->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_SurgicalHistory" name="x_SurgicalHistory" id="x_SurgicalHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SurgicalHistory->getPlaceHolder()) ?>" value="<?= $Page->SurgicalHistory->EditValue ?>"<?= $Page->SurgicalHistory->editAttributes() ?> aria-describedby="x_SurgicalHistory_help">
<?= $Page->SurgicalHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SurgicalHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PastHistory->Visible) { // PastHistory ?>
    <div id="r_PastHistory" class="form-group row">
        <label id="elh_ivf_otherprocedure_PastHistory" for="x_PastHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PastHistory->caption() ?><?= $Page->PastHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PastHistory->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_PastHistory">
<input type="<?= $Page->PastHistory->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_PastHistory" name="x_PastHistory" id="x_PastHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PastHistory->getPlaceHolder()) ?>" value="<?= $Page->PastHistory->EditValue ?>"<?= $Page->PastHistory->editAttributes() ?> aria-describedby="x_PastHistory_help">
<?= $Page->PastHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PastHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
    <div id="r_FamilyHistory" class="form-group row">
        <label id="elh_ivf_otherprocedure_FamilyHistory" for="x_FamilyHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FamilyHistory->caption() ?><?= $Page->FamilyHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FamilyHistory->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_FamilyHistory">
<input type="<?= $Page->FamilyHistory->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_FamilyHistory" name="x_FamilyHistory" id="x_FamilyHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FamilyHistory->getPlaceHolder()) ?>" value="<?= $Page->FamilyHistory->EditValue ?>"<?= $Page->FamilyHistory->editAttributes() ?> aria-describedby="x_FamilyHistory_help">
<?= $Page->FamilyHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FamilyHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Temp->Visible) { // Temp ?>
    <div id="r_Temp" class="form-group row">
        <label id="elh_ivf_otherprocedure_Temp" for="x_Temp" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Temp->caption() ?><?= $Page->Temp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Temp->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Temp">
<input type="<?= $Page->Temp->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_Temp" name="x_Temp" id="x_Temp" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Temp->getPlaceHolder()) ?>" value="<?= $Page->Temp->EditValue ?>"<?= $Page->Temp->editAttributes() ?> aria-describedby="x_Temp_help">
<?= $Page->Temp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Temp->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
    <div id="r_Pulse" class="form-group row">
        <label id="elh_ivf_otherprocedure_Pulse" for="x_Pulse" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Pulse->caption() ?><?= $Page->Pulse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pulse->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Pulse">
<input type="<?= $Page->Pulse->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_Pulse" name="x_Pulse" id="x_Pulse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pulse->getPlaceHolder()) ?>" value="<?= $Page->Pulse->EditValue ?>"<?= $Page->Pulse->editAttributes() ?> aria-describedby="x_Pulse_help">
<?= $Page->Pulse->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pulse->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
    <div id="r_BP" class="form-group row">
        <label id="elh_ivf_otherprocedure_BP" for="x_BP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BP->caption() ?><?= $Page->BP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BP->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_BP">
<input type="<?= $Page->BP->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_BP" name="x_BP" id="x_BP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BP->getPlaceHolder()) ?>" value="<?= $Page->BP->EditValue ?>"<?= $Page->BP->editAttributes() ?> aria-describedby="x_BP_help">
<?= $Page->BP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CNS->Visible) { // CNS ?>
    <div id="r_CNS" class="form-group row">
        <label id="elh_ivf_otherprocedure_CNS" for="x_CNS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CNS->caption() ?><?= $Page->CNS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CNS->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_CNS">
<input type="<?= $Page->CNS->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_CNS" name="x_CNS" id="x_CNS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CNS->getPlaceHolder()) ?>" value="<?= $Page->CNS->EditValue ?>"<?= $Page->CNS->editAttributes() ?> aria-describedby="x_CNS_help">
<?= $Page->CNS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CNS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_RS->Visible) { // RS ?>
    <div id="r__RS" class="form-group row">
        <label id="elh_ivf_otherprocedure__RS" for="x__RS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_RS->caption() ?><?= $Page->_RS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_RS->cellAttributes() ?>>
<span id="el_ivf_otherprocedure__RS">
<input type="<?= $Page->_RS->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x__RS" name="x__RS" id="x__RS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->_RS->getPlaceHolder()) ?>" value="<?= $Page->_RS->EditValue ?>"<?= $Page->_RS->editAttributes() ?> aria-describedby="x__RS_help">
<?= $Page->_RS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_RS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
    <div id="r_CVS" class="form-group row">
        <label id="elh_ivf_otherprocedure_CVS" for="x_CVS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CVS->caption() ?><?= $Page->CVS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CVS->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_CVS">
<input type="<?= $Page->CVS->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_CVS" name="x_CVS" id="x_CVS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CVS->getPlaceHolder()) ?>" value="<?= $Page->CVS->EditValue ?>"<?= $Page->CVS->editAttributes() ?> aria-describedby="x_CVS_help">
<?= $Page->CVS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CVS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
    <div id="r_PA" class="form-group row">
        <label id="elh_ivf_otherprocedure_PA" for="x_PA" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PA->caption() ?><?= $Page->PA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PA->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_PA">
<input type="<?= $Page->PA->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_PA" name="x_PA" id="x_PA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PA->getPlaceHolder()) ?>" value="<?= $Page->PA->EditValue ?>"<?= $Page->PA->editAttributes() ?> aria-describedby="x_PA_help">
<?= $Page->PA->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PA->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->InvestigationReport->Visible) { // InvestigationReport ?>
    <div id="r_InvestigationReport" class="form-group row">
        <label id="elh_ivf_otherprocedure_InvestigationReport" for="x_InvestigationReport" class="<?= $Page->LeftColumnClass ?>"><?= $Page->InvestigationReport->caption() ?><?= $Page->InvestigationReport->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InvestigationReport->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_InvestigationReport">
<textarea data-table="ivf_otherprocedure" data-field="x_InvestigationReport" name="x_InvestigationReport" id="x_InvestigationReport" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->InvestigationReport->getPlaceHolder()) ?>"<?= $Page->InvestigationReport->editAttributes() ?> aria-describedby="x_InvestigationReport_help"><?= $Page->InvestigationReport->EditValue ?></textarea>
<?= $Page->InvestigationReport->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->InvestigationReport->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FinalDiagnosis->Visible) { // FinalDiagnosis ?>
    <div id="r_FinalDiagnosis" class="form-group row">
        <label id="elh_ivf_otherprocedure_FinalDiagnosis" for="x_FinalDiagnosis" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FinalDiagnosis->caption() ?><?= $Page->FinalDiagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FinalDiagnosis->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_FinalDiagnosis">
<textarea data-table="ivf_otherprocedure" data-field="x_FinalDiagnosis" name="x_FinalDiagnosis" id="x_FinalDiagnosis" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->FinalDiagnosis->getPlaceHolder()) ?>"<?= $Page->FinalDiagnosis->editAttributes() ?> aria-describedby="x_FinalDiagnosis_help"><?= $Page->FinalDiagnosis->EditValue ?></textarea>
<?= $Page->FinalDiagnosis->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FinalDiagnosis->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
    <div id="r_Treatment" class="form-group row">
        <label id="elh_ivf_otherprocedure_Treatment" for="x_Treatment" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Treatment->caption() ?><?= $Page->Treatment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Treatment->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Treatment">
<textarea data-table="ivf_otherprocedure" data-field="x_Treatment" name="x_Treatment" id="x_Treatment" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Treatment->getPlaceHolder()) ?>"<?= $Page->Treatment->editAttributes() ?> aria-describedby="x_Treatment_help"><?= $Page->Treatment->EditValue ?></textarea>
<?= $Page->Treatment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Treatment->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DetailOfOperation->Visible) { // DetailOfOperation ?>
    <div id="r_DetailOfOperation" class="form-group row">
        <label id="elh_ivf_otherprocedure_DetailOfOperation" for="x_DetailOfOperation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DetailOfOperation->caption() ?><?= $Page->DetailOfOperation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DetailOfOperation->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_DetailOfOperation">
<textarea data-table="ivf_otherprocedure" data-field="x_DetailOfOperation" name="x_DetailOfOperation" id="x_DetailOfOperation" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->DetailOfOperation->getPlaceHolder()) ?>"<?= $Page->DetailOfOperation->editAttributes() ?> aria-describedby="x_DetailOfOperation_help"><?= $Page->DetailOfOperation->EditValue ?></textarea>
<?= $Page->DetailOfOperation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DetailOfOperation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FollowUpAdvice->Visible) { // FollowUpAdvice ?>
    <div id="r_FollowUpAdvice" class="form-group row">
        <label id="elh_ivf_otherprocedure_FollowUpAdvice" for="x_FollowUpAdvice" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FollowUpAdvice->caption() ?><?= $Page->FollowUpAdvice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FollowUpAdvice->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_FollowUpAdvice">
<textarea data-table="ivf_otherprocedure" data-field="x_FollowUpAdvice" name="x_FollowUpAdvice" id="x_FollowUpAdvice" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->FollowUpAdvice->getPlaceHolder()) ?>"<?= $Page->FollowUpAdvice->editAttributes() ?> aria-describedby="x_FollowUpAdvice_help"><?= $Page->FollowUpAdvice->EditValue ?></textarea>
<?= $Page->FollowUpAdvice->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FollowUpAdvice->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FollowUpMedication->Visible) { // FollowUpMedication ?>
    <div id="r_FollowUpMedication" class="form-group row">
        <label id="elh_ivf_otherprocedure_FollowUpMedication" for="x_FollowUpMedication" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FollowUpMedication->caption() ?><?= $Page->FollowUpMedication->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FollowUpMedication->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_FollowUpMedication">
<textarea data-table="ivf_otherprocedure" data-field="x_FollowUpMedication" name="x_FollowUpMedication" id="x_FollowUpMedication" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->FollowUpMedication->getPlaceHolder()) ?>"<?= $Page->FollowUpMedication->editAttributes() ?> aria-describedby="x_FollowUpMedication_help"><?= $Page->FollowUpMedication->EditValue ?></textarea>
<?= $Page->FollowUpMedication->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FollowUpMedication->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Plan->Visible) { // Plan ?>
    <div id="r_Plan" class="form-group row">
        <label id="elh_ivf_otherprocedure_Plan" for="x_Plan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Plan->caption() ?><?= $Page->Plan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Plan->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Plan">
<textarea data-table="ivf_otherprocedure" data-field="x_Plan" name="x_Plan" id="x_Plan" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Plan->getPlaceHolder()) ?>"<?= $Page->Plan->editAttributes() ?> aria-describedby="x_Plan_help"><?= $Page->Plan->EditValue ?></textarea>
<?= $Page->Plan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Plan->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_otherprocedure_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
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
    ew.addEventHandlers("ivf_otherprocedure");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfOtherprocedureEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_otherprocedureedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fivf_otherprocedureedit = currentForm = new ew.Form("fivf_otherprocedureedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_otherprocedure")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_otherprocedure)
        ew.vars.tables.ivf_otherprocedure = currentTable;
    fivf_otherprocedureedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["RIDNO", [fields.RIDNO.visible && fields.RIDNO.required ? ew.Validators.required(fields.RIDNO.caption) : null, ew.Validators.integer], fields.RIDNO.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["SEX", [fields.SEX.visible && fields.SEX.required ? ew.Validators.required(fields.SEX.caption) : null], fields.SEX.isInvalid],
        ["Address", [fields.Address.visible && fields.Address.required ? ew.Validators.required(fields.Address.caption) : null], fields.Address.isInvalid],
        ["DateofAdmission", [fields.DateofAdmission.visible && fields.DateofAdmission.required ? ew.Validators.required(fields.DateofAdmission.caption) : null, ew.Validators.datetime(11)], fields.DateofAdmission.isInvalid],
        ["DateofProcedure", [fields.DateofProcedure.visible && fields.DateofProcedure.required ? ew.Validators.required(fields.DateofProcedure.caption) : null], fields.DateofProcedure.isInvalid],
        ["DateofDischarge", [fields.DateofDischarge.visible && fields.DateofDischarge.required ? ew.Validators.required(fields.DateofDischarge.caption) : null], fields.DateofDischarge.isInvalid],
        ["Consultant", [fields.Consultant.visible && fields.Consultant.required ? ew.Validators.required(fields.Consultant.caption) : null], fields.Consultant.isInvalid],
        ["Surgeon", [fields.Surgeon.visible && fields.Surgeon.required ? ew.Validators.required(fields.Surgeon.caption) : null], fields.Surgeon.isInvalid],
        ["Anesthetist", [fields.Anesthetist.visible && fields.Anesthetist.required ? ew.Validators.required(fields.Anesthetist.caption) : null], fields.Anesthetist.isInvalid],
        ["IdentificationMark", [fields.IdentificationMark.visible && fields.IdentificationMark.required ? ew.Validators.required(fields.IdentificationMark.caption) : null], fields.IdentificationMark.isInvalid],
        ["ProcedureDone", [fields.ProcedureDone.visible && fields.ProcedureDone.required ? ew.Validators.required(fields.ProcedureDone.caption) : null], fields.ProcedureDone.isInvalid],
        ["PROVISIONALDIAGNOSIS", [fields.PROVISIONALDIAGNOSIS.visible && fields.PROVISIONALDIAGNOSIS.required ? ew.Validators.required(fields.PROVISIONALDIAGNOSIS.caption) : null], fields.PROVISIONALDIAGNOSIS.isInvalid],
        ["Chiefcomplaints", [fields.Chiefcomplaints.visible && fields.Chiefcomplaints.required ? ew.Validators.required(fields.Chiefcomplaints.caption) : null], fields.Chiefcomplaints.isInvalid],
        ["MaritallHistory", [fields.MaritallHistory.visible && fields.MaritallHistory.required ? ew.Validators.required(fields.MaritallHistory.caption) : null], fields.MaritallHistory.isInvalid],
        ["MenstrualHistory", [fields.MenstrualHistory.visible && fields.MenstrualHistory.required ? ew.Validators.required(fields.MenstrualHistory.caption) : null], fields.MenstrualHistory.isInvalid],
        ["SurgicalHistory", [fields.SurgicalHistory.visible && fields.SurgicalHistory.required ? ew.Validators.required(fields.SurgicalHistory.caption) : null], fields.SurgicalHistory.isInvalid],
        ["PastHistory", [fields.PastHistory.visible && fields.PastHistory.required ? ew.Validators.required(fields.PastHistory.caption) : null], fields.PastHistory.isInvalid],
        ["FamilyHistory", [fields.FamilyHistory.visible && fields.FamilyHistory.required ? ew.Validators.required(fields.FamilyHistory.caption) : null], fields.FamilyHistory.isInvalid],
        ["Temp", [fields.Temp.visible && fields.Temp.required ? ew.Validators.required(fields.Temp.caption) : null], fields.Temp.isInvalid],
        ["Pulse", [fields.Pulse.visible && fields.Pulse.required ? ew.Validators.required(fields.Pulse.caption) : null], fields.Pulse.isInvalid],
        ["BP", [fields.BP.visible && fields.BP.required ? ew.Validators.required(fields.BP.caption) : null], fields.BP.isInvalid],
        ["CNS", [fields.CNS.visible && fields.CNS.required ? ew.Validators.required(fields.CNS.caption) : null], fields.CNS.isInvalid],
        ["_RS", [fields._RS.visible && fields._RS.required ? ew.Validators.required(fields._RS.caption) : null], fields._RS.isInvalid],
        ["CVS", [fields.CVS.visible && fields.CVS.required ? ew.Validators.required(fields.CVS.caption) : null], fields.CVS.isInvalid],
        ["PA", [fields.PA.visible && fields.PA.required ? ew.Validators.required(fields.PA.caption) : null], fields.PA.isInvalid],
        ["InvestigationReport", [fields.InvestigationReport.visible && fields.InvestigationReport.required ? ew.Validators.required(fields.InvestigationReport.caption) : null], fields.InvestigationReport.isInvalid],
        ["FinalDiagnosis", [fields.FinalDiagnosis.visible && fields.FinalDiagnosis.required ? ew.Validators.required(fields.FinalDiagnosis.caption) : null], fields.FinalDiagnosis.isInvalid],
        ["Treatment", [fields.Treatment.visible && fields.Treatment.required ? ew.Validators.required(fields.Treatment.caption) : null], fields.Treatment.isInvalid],
        ["DetailOfOperation", [fields.DetailOfOperation.visible && fields.DetailOfOperation.required ? ew.Validators.required(fields.DetailOfOperation.caption) : null], fields.DetailOfOperation.isInvalid],
        ["FollowUpAdvice", [fields.FollowUpAdvice.visible && fields.FollowUpAdvice.required ? ew.Validators.required(fields.FollowUpAdvice.caption) : null], fields.FollowUpAdvice.isInvalid],
        ["FollowUpMedication", [fields.FollowUpMedication.visible && fields.FollowUpMedication.required ? ew.Validators.required(fields.FollowUpMedication.caption) : null], fields.FollowUpMedication.isInvalid],
        ["Plan", [fields.Plan.visible && fields.Plan.required ? ew.Validators.required(fields.Plan.caption) : null], fields.Plan.isInvalid],
        ["TempleteFinalDiagnosis", [fields.TempleteFinalDiagnosis.visible && fields.TempleteFinalDiagnosis.required ? ew.Validators.required(fields.TempleteFinalDiagnosis.caption) : null], fields.TempleteFinalDiagnosis.isInvalid],
        ["TemplateTreatment", [fields.TemplateTreatment.visible && fields.TemplateTreatment.required ? ew.Validators.required(fields.TemplateTreatment.caption) : null], fields.TemplateTreatment.isInvalid],
        ["TemplateOperation", [fields.TemplateOperation.visible && fields.TemplateOperation.required ? ew.Validators.required(fields.TemplateOperation.caption) : null], fields.TemplateOperation.isInvalid],
        ["TemplateFollowUpAdvice", [fields.TemplateFollowUpAdvice.visible && fields.TemplateFollowUpAdvice.required ? ew.Validators.required(fields.TemplateFollowUpAdvice.caption) : null], fields.TemplateFollowUpAdvice.isInvalid],
        ["TemplateFollowUpMedication", [fields.TemplateFollowUpMedication.visible && fields.TemplateFollowUpMedication.required ? ew.Validators.required(fields.TemplateFollowUpMedication.caption) : null], fields.TemplateFollowUpMedication.isInvalid],
        ["TemplatePlan", [fields.TemplatePlan.visible && fields.TemplatePlan.required ? ew.Validators.required(fields.TemplatePlan.caption) : null], fields.TemplatePlan.isInvalid],
        ["QRCode", [fields.QRCode.visible && fields.QRCode.required ? ew.Validators.required(fields.QRCode.caption) : null], fields.QRCode.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_otherprocedureedit,
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
    fivf_otherprocedureedit.validate = function () {
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
    fivf_otherprocedureedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_otherprocedureedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_otherprocedureedit.lists.Name = <?= $Page->Name->toClientList($Page) ?>;
    fivf_otherprocedureedit.lists.Consultant = <?= $Page->Consultant->toClientList($Page) ?>;
    fivf_otherprocedureedit.lists.Surgeon = <?= $Page->Surgeon->toClientList($Page) ?>;
    fivf_otherprocedureedit.lists.Anesthetist = <?= $Page->Anesthetist->toClientList($Page) ?>;
    fivf_otherprocedureedit.lists.TempleteFinalDiagnosis = <?= $Page->TempleteFinalDiagnosis->toClientList($Page) ?>;
    fivf_otherprocedureedit.lists.TemplateTreatment = <?= $Page->TemplateTreatment->toClientList($Page) ?>;
    fivf_otherprocedureedit.lists.TemplateOperation = <?= $Page->TemplateOperation->toClientList($Page) ?>;
    fivf_otherprocedureedit.lists.TemplateFollowUpAdvice = <?= $Page->TemplateFollowUpAdvice->toClientList($Page) ?>;
    fivf_otherprocedureedit.lists.TemplateFollowUpMedication = <?= $Page->TemplateFollowUpMedication->toClientList($Page) ?>;
    fivf_otherprocedureedit.lists.TemplatePlan = <?= $Page->TemplatePlan->toClientList($Page) ?>;
    loadjs.done("fivf_otherprocedureedit");
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
<form name="fivf_otherprocedureedit" id="fivf_otherprocedureedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_otherprocedure">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_ivf_otherprocedure_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_id"><span id="el_ivf_otherprocedure_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <div id="r_RIDNO" class="form-group row">
        <label id="elh_ivf_otherprocedure_RIDNO" for="x_RIDNO" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_RIDNO"><?= $Page->RIDNO->caption() ?><?= $Page->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNO->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_RIDNO"><span id="el_ivf_otherprocedure_RIDNO">
<input type="<?= $Page->RIDNO->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?= HtmlEncode($Page->RIDNO->getPlaceHolder()) ?>" value="<?= $Page->RIDNO->EditValue ?>"<?= $Page->RIDNO->editAttributes() ?> aria-describedby="x_RIDNO_help">
<?= $Page->RIDNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNO->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_otherprocedure_Name" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_Name"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Name"><span id="el_ivf_otherprocedure_Name">
<?php
$onchange = $Page->Name->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Name->EditAttrs["onchange"] = "";
?>
<span id="as_x_Name" class="ew-auto-suggest">
    <input type="<?= $Page->Name->getInputTextType() ?>" class="form-control" name="sv_x_Name" id="sv_x_Name" value="<?= RemoveHtml($Page->Name->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="ivf_otherprocedure" data-field="x_Name" data-input="sv_x_Name" data-value-separator="<?= $Page->Name->displayValueSeparatorAttribute() ?>" name="x_Name" id="x_Name" value="<?= HtmlEncode($Page->Name->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_otherprocedureedit"], function() {
    fivf_otherprocedureedit.createAutoSuggest(Object.assign({"id":"x_Name","forceSelect":false}, ew.vars.tables.ivf_otherprocedure.fields.Name.autoSuggestOptions));
});
</script>
<?= $Page->Name->Lookup->getParamTag($Page, "p_x_Name") ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_ivf_otherprocedure_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_Age"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Age"><span id="el_ivf_otherprocedure_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SEX->Visible) { // SEX ?>
    <div id="r_SEX" class="form-group row">
        <label id="elh_ivf_otherprocedure_SEX" for="x_SEX" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_SEX"><?= $Page->SEX->caption() ?><?= $Page->SEX->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SEX->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_SEX"><span id="el_ivf_otherprocedure_SEX">
<input type="<?= $Page->SEX->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_SEX" name="x_SEX" id="x_SEX" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SEX->getPlaceHolder()) ?>" value="<?= $Page->SEX->EditValue ?>"<?= $Page->SEX->editAttributes() ?> aria-describedby="x_SEX_help">
<?= $Page->SEX->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SEX->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Address->Visible) { // Address ?>
    <div id="r_Address" class="form-group row">
        <label id="elh_ivf_otherprocedure_Address" for="x_Address" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_Address"><?= $Page->Address->caption() ?><?= $Page->Address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Address->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Address"><span id="el_ivf_otherprocedure_Address">
<input type="<?= $Page->Address->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_Address" name="x_Address" id="x_Address" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Address->getPlaceHolder()) ?>" value="<?= $Page->Address->EditValue ?>"<?= $Page->Address->editAttributes() ?> aria-describedby="x_Address_help">
<?= $Page->Address->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Address->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DateofAdmission->Visible) { // DateofAdmission ?>
    <div id="r_DateofAdmission" class="form-group row">
        <label id="elh_ivf_otherprocedure_DateofAdmission" for="x_DateofAdmission" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_DateofAdmission"><?= $Page->DateofAdmission->caption() ?><?= $Page->DateofAdmission->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DateofAdmission->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_DateofAdmission"><span id="el_ivf_otherprocedure_DateofAdmission">
<input type="<?= $Page->DateofAdmission->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_DateofAdmission" data-format="11" name="x_DateofAdmission" id="x_DateofAdmission" placeholder="<?= HtmlEncode($Page->DateofAdmission->getPlaceHolder()) ?>" value="<?= $Page->DateofAdmission->EditValue ?>"<?= $Page->DateofAdmission->editAttributes() ?> aria-describedby="x_DateofAdmission_help">
<?= $Page->DateofAdmission->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DateofAdmission->getErrorMessage() ?></div>
<?php if (!$Page->DateofAdmission->ReadOnly && !$Page->DateofAdmission->Disabled && !isset($Page->DateofAdmission->EditAttrs["readonly"]) && !isset($Page->DateofAdmission->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_otherprocedureedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_otherprocedureedit", "x_DateofAdmission", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DateofProcedure->Visible) { // DateofProcedure ?>
    <div id="r_DateofProcedure" class="form-group row">
        <label id="elh_ivf_otherprocedure_DateofProcedure" for="x_DateofProcedure" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_DateofProcedure"><?= $Page->DateofProcedure->caption() ?><?= $Page->DateofProcedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DateofProcedure->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_DateofProcedure"><span id="el_ivf_otherprocedure_DateofProcedure">
<input type="<?= $Page->DateofProcedure->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_DateofProcedure" data-format="11" name="x_DateofProcedure" id="x_DateofProcedure" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DateofProcedure->getPlaceHolder()) ?>" value="<?= $Page->DateofProcedure->EditValue ?>"<?= $Page->DateofProcedure->editAttributes() ?> aria-describedby="x_DateofProcedure_help">
<?= $Page->DateofProcedure->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DateofProcedure->getErrorMessage() ?></div>
<?php if (!$Page->DateofProcedure->ReadOnly && !$Page->DateofProcedure->Disabled && !isset($Page->DateofProcedure->EditAttrs["readonly"]) && !isset($Page->DateofProcedure->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_otherprocedureedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_otherprocedureedit", "x_DateofProcedure", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DateofDischarge->Visible) { // DateofDischarge ?>
    <div id="r_DateofDischarge" class="form-group row">
        <label id="elh_ivf_otherprocedure_DateofDischarge" for="x_DateofDischarge" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_DateofDischarge"><?= $Page->DateofDischarge->caption() ?><?= $Page->DateofDischarge->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DateofDischarge->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_DateofDischarge"><span id="el_ivf_otherprocedure_DateofDischarge">
<input type="<?= $Page->DateofDischarge->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_DateofDischarge" data-format="11" name="x_DateofDischarge" id="x_DateofDischarge" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DateofDischarge->getPlaceHolder()) ?>" value="<?= $Page->DateofDischarge->EditValue ?>"<?= $Page->DateofDischarge->editAttributes() ?> aria-describedby="x_DateofDischarge_help">
<?= $Page->DateofDischarge->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DateofDischarge->getErrorMessage() ?></div>
<?php if (!$Page->DateofDischarge->ReadOnly && !$Page->DateofDischarge->Disabled && !isset($Page->DateofDischarge->EditAttrs["readonly"]) && !isset($Page->DateofDischarge->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_otherprocedureedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_otherprocedureedit", "x_DateofDischarge", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <div id="r_Consultant" class="form-group row">
        <label id="elh_ivf_otherprocedure_Consultant" for="x_Consultant" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_Consultant"><?= $Page->Consultant->caption() ?><?= $Page->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Consultant->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Consultant"><span id="el_ivf_otherprocedure_Consultant">
<div class="input-group flex-nowrap">
    <select
        id="x_Consultant"
        name="x_Consultant"
        class="form-control ew-select<?= $Page->Consultant->isInvalidClass() ?>"
        data-select2-id="ivf_otherprocedure_x_Consultant"
        data-table="ivf_otherprocedure"
        data-field="x_Consultant"
        data-value-separator="<?= $Page->Consultant->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Consultant->getPlaceHolder()) ?>"
        <?= $Page->Consultant->editAttributes() ?>>
        <?= $Page->Consultant->selectOptionListHtml("x_Consultant") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "doctors") && !$Page->Consultant->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Consultant" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->Consultant->caption() ?>" data-title="<?= $Page->Consultant->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Consultant',url:'<?= GetUrl("DoctorsAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->Consultant->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Consultant->getErrorMessage() ?></div>
<?= $Page->Consultant->Lookup->getParamTag($Page, "p_x_Consultant") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_otherprocedure_x_Consultant']"),
        options = { name: "x_Consultant", selectId: "ivf_otherprocedure_x_Consultant", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_otherprocedure.fields.Consultant.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
    <div id="r_Surgeon" class="form-group row">
        <label id="elh_ivf_otherprocedure_Surgeon" for="x_Surgeon" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_Surgeon"><?= $Page->Surgeon->caption() ?><?= $Page->Surgeon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Surgeon->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Surgeon"><span id="el_ivf_otherprocedure_Surgeon">
<div class="input-group flex-nowrap">
    <select
        id="x_Surgeon"
        name="x_Surgeon"
        class="form-control ew-select<?= $Page->Surgeon->isInvalidClass() ?>"
        data-select2-id="ivf_otherprocedure_x_Surgeon"
        data-table="ivf_otherprocedure"
        data-field="x_Surgeon"
        data-value-separator="<?= $Page->Surgeon->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Surgeon->getPlaceHolder()) ?>"
        <?= $Page->Surgeon->editAttributes() ?>>
        <?= $Page->Surgeon->selectOptionListHtml("x_Surgeon") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "doctors") && !$Page->Surgeon->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Surgeon" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->Surgeon->caption() ?>" data-title="<?= $Page->Surgeon->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Surgeon',url:'<?= GetUrl("DoctorsAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->Surgeon->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Surgeon->getErrorMessage() ?></div>
<?= $Page->Surgeon->Lookup->getParamTag($Page, "p_x_Surgeon") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_otherprocedure_x_Surgeon']"),
        options = { name: "x_Surgeon", selectId: "ivf_otherprocedure_x_Surgeon", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_otherprocedure.fields.Surgeon.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
    <div id="r_Anesthetist" class="form-group row">
        <label id="elh_ivf_otherprocedure_Anesthetist" for="x_Anesthetist" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_Anesthetist"><?= $Page->Anesthetist->caption() ?><?= $Page->Anesthetist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Anesthetist->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Anesthetist"><span id="el_ivf_otherprocedure_Anesthetist">
<div class="input-group flex-nowrap">
    <select
        id="x_Anesthetist"
        name="x_Anesthetist"
        class="form-control ew-select<?= $Page->Anesthetist->isInvalidClass() ?>"
        data-select2-id="ivf_otherprocedure_x_Anesthetist"
        data-table="ivf_otherprocedure"
        data-field="x_Anesthetist"
        data-value-separator="<?= $Page->Anesthetist->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Anesthetist->getPlaceHolder()) ?>"
        <?= $Page->Anesthetist->editAttributes() ?>>
        <?= $Page->Anesthetist->selectOptionListHtml("x_Anesthetist") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "doctors") && !$Page->Anesthetist->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Anesthetist" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->Anesthetist->caption() ?>" data-title="<?= $Page->Anesthetist->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Anesthetist',url:'<?= GetUrl("DoctorsAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->Anesthetist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Anesthetist->getErrorMessage() ?></div>
<?= $Page->Anesthetist->Lookup->getParamTag($Page, "p_x_Anesthetist") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_otherprocedure_x_Anesthetist']"),
        options = { name: "x_Anesthetist", selectId: "ivf_otherprocedure_x_Anesthetist", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_otherprocedure.fields.Anesthetist.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
    <div id="r_IdentificationMark" class="form-group row">
        <label id="elh_ivf_otherprocedure_IdentificationMark" for="x_IdentificationMark" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_IdentificationMark"><?= $Page->IdentificationMark->caption() ?><?= $Page->IdentificationMark->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IdentificationMark->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_IdentificationMark"><span id="el_ivf_otherprocedure_IdentificationMark">
<input type="<?= $Page->IdentificationMark->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_IdentificationMark" name="x_IdentificationMark" id="x_IdentificationMark" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IdentificationMark->getPlaceHolder()) ?>" value="<?= $Page->IdentificationMark->EditValue ?>"<?= $Page->IdentificationMark->editAttributes() ?> aria-describedby="x_IdentificationMark_help">
<?= $Page->IdentificationMark->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IdentificationMark->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureDone->Visible) { // ProcedureDone ?>
    <div id="r_ProcedureDone" class="form-group row">
        <label id="elh_ivf_otherprocedure_ProcedureDone" for="x_ProcedureDone" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_ProcedureDone"><?= $Page->ProcedureDone->caption() ?><?= $Page->ProcedureDone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureDone->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_ProcedureDone"><span id="el_ivf_otherprocedure_ProcedureDone">
<input type="<?= $Page->ProcedureDone->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_ProcedureDone" name="x_ProcedureDone" id="x_ProcedureDone" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProcedureDone->getPlaceHolder()) ?>" value="<?= $Page->ProcedureDone->EditValue ?>"<?= $Page->ProcedureDone->editAttributes() ?> aria-describedby="x_ProcedureDone_help">
<?= $Page->ProcedureDone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProcedureDone->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
    <div id="r_PROVISIONALDIAGNOSIS" class="form-group row">
        <label id="elh_ivf_otherprocedure_PROVISIONALDIAGNOSIS" for="x_PROVISIONALDIAGNOSIS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_PROVISIONALDIAGNOSIS"><?= $Page->PROVISIONALDIAGNOSIS->caption() ?><?= $Page->PROVISIONALDIAGNOSIS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_PROVISIONALDIAGNOSIS"><span id="el_ivf_otherprocedure_PROVISIONALDIAGNOSIS">
<input type="<?= $Page->PROVISIONALDIAGNOSIS->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_PROVISIONALDIAGNOSIS" name="x_PROVISIONALDIAGNOSIS" id="x_PROVISIONALDIAGNOSIS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PROVISIONALDIAGNOSIS->getPlaceHolder()) ?>" value="<?= $Page->PROVISIONALDIAGNOSIS->EditValue ?>"<?= $Page->PROVISIONALDIAGNOSIS->editAttributes() ?> aria-describedby="x_PROVISIONALDIAGNOSIS_help">
<?= $Page->PROVISIONALDIAGNOSIS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PROVISIONALDIAGNOSIS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
    <div id="r_Chiefcomplaints" class="form-group row">
        <label id="elh_ivf_otherprocedure_Chiefcomplaints" for="x_Chiefcomplaints" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_Chiefcomplaints"><?= $Page->Chiefcomplaints->caption() ?><?= $Page->Chiefcomplaints->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Chiefcomplaints->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Chiefcomplaints"><span id="el_ivf_otherprocedure_Chiefcomplaints">
<input type="<?= $Page->Chiefcomplaints->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_Chiefcomplaints" name="x_Chiefcomplaints" id="x_Chiefcomplaints" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Chiefcomplaints->getPlaceHolder()) ?>" value="<?= $Page->Chiefcomplaints->EditValue ?>"<?= $Page->Chiefcomplaints->editAttributes() ?> aria-describedby="x_Chiefcomplaints_help">
<?= $Page->Chiefcomplaints->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Chiefcomplaints->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MaritallHistory->Visible) { // MaritallHistory ?>
    <div id="r_MaritallHistory" class="form-group row">
        <label id="elh_ivf_otherprocedure_MaritallHistory" for="x_MaritallHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_MaritallHistory"><?= $Page->MaritallHistory->caption() ?><?= $Page->MaritallHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MaritallHistory->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_MaritallHistory"><span id="el_ivf_otherprocedure_MaritallHistory">
<input type="<?= $Page->MaritallHistory->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_MaritallHistory" name="x_MaritallHistory" id="x_MaritallHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MaritallHistory->getPlaceHolder()) ?>" value="<?= $Page->MaritallHistory->EditValue ?>"<?= $Page->MaritallHistory->editAttributes() ?> aria-describedby="x_MaritallHistory_help">
<?= $Page->MaritallHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MaritallHistory->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
    <div id="r_MenstrualHistory" class="form-group row">
        <label id="elh_ivf_otherprocedure_MenstrualHistory" for="x_MenstrualHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_MenstrualHistory"><?= $Page->MenstrualHistory->caption() ?><?= $Page->MenstrualHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MenstrualHistory->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_MenstrualHistory"><span id="el_ivf_otherprocedure_MenstrualHistory">
<input type="<?= $Page->MenstrualHistory->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_MenstrualHistory" name="x_MenstrualHistory" id="x_MenstrualHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MenstrualHistory->getPlaceHolder()) ?>" value="<?= $Page->MenstrualHistory->EditValue ?>"<?= $Page->MenstrualHistory->editAttributes() ?> aria-describedby="x_MenstrualHistory_help">
<?= $Page->MenstrualHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MenstrualHistory->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
    <div id="r_SurgicalHistory" class="form-group row">
        <label id="elh_ivf_otherprocedure_SurgicalHistory" for="x_SurgicalHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_SurgicalHistory"><?= $Page->SurgicalHistory->caption() ?><?= $Page->SurgicalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SurgicalHistory->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_SurgicalHistory"><span id="el_ivf_otherprocedure_SurgicalHistory">
<input type="<?= $Page->SurgicalHistory->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_SurgicalHistory" name="x_SurgicalHistory" id="x_SurgicalHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SurgicalHistory->getPlaceHolder()) ?>" value="<?= $Page->SurgicalHistory->EditValue ?>"<?= $Page->SurgicalHistory->editAttributes() ?> aria-describedby="x_SurgicalHistory_help">
<?= $Page->SurgicalHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SurgicalHistory->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PastHistory->Visible) { // PastHistory ?>
    <div id="r_PastHistory" class="form-group row">
        <label id="elh_ivf_otherprocedure_PastHistory" for="x_PastHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_PastHistory"><?= $Page->PastHistory->caption() ?><?= $Page->PastHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PastHistory->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_PastHistory"><span id="el_ivf_otherprocedure_PastHistory">
<input type="<?= $Page->PastHistory->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_PastHistory" name="x_PastHistory" id="x_PastHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PastHistory->getPlaceHolder()) ?>" value="<?= $Page->PastHistory->EditValue ?>"<?= $Page->PastHistory->editAttributes() ?> aria-describedby="x_PastHistory_help">
<?= $Page->PastHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PastHistory->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
    <div id="r_FamilyHistory" class="form-group row">
        <label id="elh_ivf_otherprocedure_FamilyHistory" for="x_FamilyHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_FamilyHistory"><?= $Page->FamilyHistory->caption() ?><?= $Page->FamilyHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FamilyHistory->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_FamilyHistory"><span id="el_ivf_otherprocedure_FamilyHistory">
<input type="<?= $Page->FamilyHistory->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_FamilyHistory" name="x_FamilyHistory" id="x_FamilyHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FamilyHistory->getPlaceHolder()) ?>" value="<?= $Page->FamilyHistory->EditValue ?>"<?= $Page->FamilyHistory->editAttributes() ?> aria-describedby="x_FamilyHistory_help">
<?= $Page->FamilyHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FamilyHistory->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Temp->Visible) { // Temp ?>
    <div id="r_Temp" class="form-group row">
        <label id="elh_ivf_otherprocedure_Temp" for="x_Temp" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_Temp"><?= $Page->Temp->caption() ?><?= $Page->Temp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Temp->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Temp"><span id="el_ivf_otherprocedure_Temp">
<input type="<?= $Page->Temp->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_Temp" name="x_Temp" id="x_Temp" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Temp->getPlaceHolder()) ?>" value="<?= $Page->Temp->EditValue ?>"<?= $Page->Temp->editAttributes() ?> aria-describedby="x_Temp_help">
<?= $Page->Temp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Temp->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
    <div id="r_Pulse" class="form-group row">
        <label id="elh_ivf_otherprocedure_Pulse" for="x_Pulse" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_Pulse"><?= $Page->Pulse->caption() ?><?= $Page->Pulse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pulse->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Pulse"><span id="el_ivf_otherprocedure_Pulse">
<input type="<?= $Page->Pulse->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_Pulse" name="x_Pulse" id="x_Pulse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pulse->getPlaceHolder()) ?>" value="<?= $Page->Pulse->EditValue ?>"<?= $Page->Pulse->editAttributes() ?> aria-describedby="x_Pulse_help">
<?= $Page->Pulse->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pulse->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
    <div id="r_BP" class="form-group row">
        <label id="elh_ivf_otherprocedure_BP" for="x_BP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_BP"><?= $Page->BP->caption() ?><?= $Page->BP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BP->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_BP"><span id="el_ivf_otherprocedure_BP">
<input type="<?= $Page->BP->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_BP" name="x_BP" id="x_BP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BP->getPlaceHolder()) ?>" value="<?= $Page->BP->EditValue ?>"<?= $Page->BP->editAttributes() ?> aria-describedby="x_BP_help">
<?= $Page->BP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BP->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CNS->Visible) { // CNS ?>
    <div id="r_CNS" class="form-group row">
        <label id="elh_ivf_otherprocedure_CNS" for="x_CNS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_CNS"><?= $Page->CNS->caption() ?><?= $Page->CNS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CNS->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_CNS"><span id="el_ivf_otherprocedure_CNS">
<input type="<?= $Page->CNS->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_CNS" name="x_CNS" id="x_CNS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CNS->getPlaceHolder()) ?>" value="<?= $Page->CNS->EditValue ?>"<?= $Page->CNS->editAttributes() ?> aria-describedby="x_CNS_help">
<?= $Page->CNS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CNS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_RS->Visible) { // RS ?>
    <div id="r__RS" class="form-group row">
        <label id="elh_ivf_otherprocedure__RS" for="x__RS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure__RS"><?= $Page->_RS->caption() ?><?= $Page->_RS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_RS->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure__RS"><span id="el_ivf_otherprocedure__RS">
<input type="<?= $Page->_RS->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x__RS" name="x__RS" id="x__RS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->_RS->getPlaceHolder()) ?>" value="<?= $Page->_RS->EditValue ?>"<?= $Page->_RS->editAttributes() ?> aria-describedby="x__RS_help">
<?= $Page->_RS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_RS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
    <div id="r_CVS" class="form-group row">
        <label id="elh_ivf_otherprocedure_CVS" for="x_CVS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_CVS"><?= $Page->CVS->caption() ?><?= $Page->CVS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CVS->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_CVS"><span id="el_ivf_otherprocedure_CVS">
<input type="<?= $Page->CVS->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_CVS" name="x_CVS" id="x_CVS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CVS->getPlaceHolder()) ?>" value="<?= $Page->CVS->EditValue ?>"<?= $Page->CVS->editAttributes() ?> aria-describedby="x_CVS_help">
<?= $Page->CVS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CVS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
    <div id="r_PA" class="form-group row">
        <label id="elh_ivf_otherprocedure_PA" for="x_PA" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_PA"><?= $Page->PA->caption() ?><?= $Page->PA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PA->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_PA"><span id="el_ivf_otherprocedure_PA">
<input type="<?= $Page->PA->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_PA" name="x_PA" id="x_PA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PA->getPlaceHolder()) ?>" value="<?= $Page->PA->EditValue ?>"<?= $Page->PA->editAttributes() ?> aria-describedby="x_PA_help">
<?= $Page->PA->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PA->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->InvestigationReport->Visible) { // InvestigationReport ?>
    <div id="r_InvestigationReport" class="form-group row">
        <label id="elh_ivf_otherprocedure_InvestigationReport" for="x_InvestigationReport" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_InvestigationReport"><?= $Page->InvestigationReport->caption() ?><?= $Page->InvestigationReport->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InvestigationReport->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_InvestigationReport"><span id="el_ivf_otherprocedure_InvestigationReport">
<textarea data-table="ivf_otherprocedure" data-field="x_InvestigationReport" name="x_InvestigationReport" id="x_InvestigationReport" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->InvestigationReport->getPlaceHolder()) ?>"<?= $Page->InvestigationReport->editAttributes() ?> aria-describedby="x_InvestigationReport_help"><?= $Page->InvestigationReport->EditValue ?></textarea>
<?= $Page->InvestigationReport->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->InvestigationReport->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FinalDiagnosis->Visible) { // FinalDiagnosis ?>
    <div id="r_FinalDiagnosis" class="form-group row">
        <label id="elh_ivf_otherprocedure_FinalDiagnosis" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_FinalDiagnosis"><?= $Page->FinalDiagnosis->caption() ?><?= $Page->FinalDiagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FinalDiagnosis->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_FinalDiagnosis"><span id="el_ivf_otherprocedure_FinalDiagnosis">
<?php $Page->FinalDiagnosis->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_otherprocedure" data-field="x_FinalDiagnosis" name="x_FinalDiagnosis" id="x_FinalDiagnosis" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->FinalDiagnosis->getPlaceHolder()) ?>"<?= $Page->FinalDiagnosis->editAttributes() ?> aria-describedby="x_FinalDiagnosis_help"><?= $Page->FinalDiagnosis->EditValue ?></textarea>
<?= $Page->FinalDiagnosis->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FinalDiagnosis->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_otherprocedureedit", "editor"], function() {
	ew.createEditor("fivf_otherprocedureedit", "x_FinalDiagnosis", 0, 0, <?= $Page->FinalDiagnosis->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
    <div id="r_Treatment" class="form-group row">
        <label id="elh_ivf_otherprocedure_Treatment" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_Treatment"><?= $Page->Treatment->caption() ?><?= $Page->Treatment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Treatment->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Treatment"><span id="el_ivf_otherprocedure_Treatment">
<?php $Page->Treatment->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_otherprocedure" data-field="x_Treatment" name="x_Treatment" id="x_Treatment" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Treatment->getPlaceHolder()) ?>"<?= $Page->Treatment->editAttributes() ?> aria-describedby="x_Treatment_help"><?= $Page->Treatment->EditValue ?></textarea>
<?= $Page->Treatment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Treatment->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_otherprocedureedit", "editor"], function() {
	ew.createEditor("fivf_otherprocedureedit", "x_Treatment", 35, 4, <?= $Page->Treatment->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DetailOfOperation->Visible) { // DetailOfOperation ?>
    <div id="r_DetailOfOperation" class="form-group row">
        <label id="elh_ivf_otherprocedure_DetailOfOperation" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_DetailOfOperation"><?= $Page->DetailOfOperation->caption() ?><?= $Page->DetailOfOperation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DetailOfOperation->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_DetailOfOperation"><span id="el_ivf_otherprocedure_DetailOfOperation">
<?php $Page->DetailOfOperation->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_otherprocedure" data-field="x_DetailOfOperation" name="x_DetailOfOperation" id="x_DetailOfOperation" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->DetailOfOperation->getPlaceHolder()) ?>"<?= $Page->DetailOfOperation->editAttributes() ?> aria-describedby="x_DetailOfOperation_help"><?= $Page->DetailOfOperation->EditValue ?></textarea>
<?= $Page->DetailOfOperation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DetailOfOperation->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_otherprocedureedit", "editor"], function() {
	ew.createEditor("fivf_otherprocedureedit", "x_DetailOfOperation", 35, 4, <?= $Page->DetailOfOperation->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FollowUpAdvice->Visible) { // FollowUpAdvice ?>
    <div id="r_FollowUpAdvice" class="form-group row">
        <label id="elh_ivf_otherprocedure_FollowUpAdvice" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_FollowUpAdvice"><?= $Page->FollowUpAdvice->caption() ?><?= $Page->FollowUpAdvice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FollowUpAdvice->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_FollowUpAdvice"><span id="el_ivf_otherprocedure_FollowUpAdvice">
<?php $Page->FollowUpAdvice->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_otherprocedure" data-field="x_FollowUpAdvice" name="x_FollowUpAdvice" id="x_FollowUpAdvice" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->FollowUpAdvice->getPlaceHolder()) ?>"<?= $Page->FollowUpAdvice->editAttributes() ?> aria-describedby="x_FollowUpAdvice_help"><?= $Page->FollowUpAdvice->EditValue ?></textarea>
<?= $Page->FollowUpAdvice->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FollowUpAdvice->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_otherprocedureedit", "editor"], function() {
	ew.createEditor("fivf_otherprocedureedit", "x_FollowUpAdvice", 35, 4, <?= $Page->FollowUpAdvice->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FollowUpMedication->Visible) { // FollowUpMedication ?>
    <div id="r_FollowUpMedication" class="form-group row">
        <label id="elh_ivf_otherprocedure_FollowUpMedication" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_FollowUpMedication"><?= $Page->FollowUpMedication->caption() ?><?= $Page->FollowUpMedication->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FollowUpMedication->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_FollowUpMedication"><span id="el_ivf_otherprocedure_FollowUpMedication">
<?php $Page->FollowUpMedication->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_otherprocedure" data-field="x_FollowUpMedication" name="x_FollowUpMedication" id="x_FollowUpMedication" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->FollowUpMedication->getPlaceHolder()) ?>"<?= $Page->FollowUpMedication->editAttributes() ?> aria-describedby="x_FollowUpMedication_help"><?= $Page->FollowUpMedication->EditValue ?></textarea>
<?= $Page->FollowUpMedication->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FollowUpMedication->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_otherprocedureedit", "editor"], function() {
	ew.createEditor("fivf_otherprocedureedit", "x_FollowUpMedication", 35, 4, <?= $Page->FollowUpMedication->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Plan->Visible) { // Plan ?>
    <div id="r_Plan" class="form-group row">
        <label id="elh_ivf_otherprocedure_Plan" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_Plan"><?= $Page->Plan->caption() ?><?= $Page->Plan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Plan->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Plan"><span id="el_ivf_otherprocedure_Plan">
<?php $Page->Plan->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_otherprocedure" data-field="x_Plan" name="x_Plan" id="x_Plan" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Plan->getPlaceHolder()) ?>"<?= $Page->Plan->editAttributes() ?> aria-describedby="x_Plan_help"><?= $Page->Plan->EditValue ?></textarea>
<?= $Page->Plan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Plan->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_otherprocedureedit", "editor"], function() {
	ew.createEditor("fivf_otherprocedureedit", "x_Plan", 35, 4, <?= $Page->Plan->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TempleteFinalDiagnosis->Visible) { // TempleteFinalDiagnosis ?>
    <div id="r_TempleteFinalDiagnosis" class="form-group row">
        <label id="elh_ivf_otherprocedure_TempleteFinalDiagnosis" for="x_TempleteFinalDiagnosis" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_TempleteFinalDiagnosis"><?= $Page->TempleteFinalDiagnosis->caption() ?><?= $Page->TempleteFinalDiagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TempleteFinalDiagnosis->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_TempleteFinalDiagnosis"><span id="el_ivf_otherprocedure_TempleteFinalDiagnosis">
<?php $Page->TempleteFinalDiagnosis->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TempleteFinalDiagnosis"
        name="x_TempleteFinalDiagnosis"
        class="form-control ew-select<?= $Page->TempleteFinalDiagnosis->isInvalidClass() ?>"
        data-select2-id="ivf_otherprocedure_x_TempleteFinalDiagnosis"
        data-table="ivf_otherprocedure"
        data-field="x_TempleteFinalDiagnosis"
        data-value-separator="<?= $Page->TempleteFinalDiagnosis->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TempleteFinalDiagnosis->getPlaceHolder()) ?>"
        <?= $Page->TempleteFinalDiagnosis->editAttributes() ?>>
        <?= $Page->TempleteFinalDiagnosis->selectOptionListHtml("x_TempleteFinalDiagnosis") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TempleteFinalDiagnosis->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TempleteFinalDiagnosis" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TempleteFinalDiagnosis->caption() ?>" data-title="<?= $Page->TempleteFinalDiagnosis->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TempleteFinalDiagnosis',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TempleteFinalDiagnosis->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TempleteFinalDiagnosis->getErrorMessage() ?></div>
<?= $Page->TempleteFinalDiagnosis->Lookup->getParamTag($Page, "p_x_TempleteFinalDiagnosis") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_otherprocedure_x_TempleteFinalDiagnosis']"),
        options = { name: "x_TempleteFinalDiagnosis", selectId: "ivf_otherprocedure_x_TempleteFinalDiagnosis", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_otherprocedure.fields.TempleteFinalDiagnosis.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateTreatment->Visible) { // TemplateTreatment ?>
    <div id="r_TemplateTreatment" class="form-group row">
        <label id="elh_ivf_otherprocedure_TemplateTreatment" for="x_TemplateTreatment" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_TemplateTreatment"><?= $Page->TemplateTreatment->caption() ?><?= $Page->TemplateTreatment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateTreatment->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_TemplateTreatment"><span id="el_ivf_otherprocedure_TemplateTreatment">
<?php $Page->TemplateTreatment->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateTreatment"
        name="x_TemplateTreatment"
        class="form-control ew-select<?= $Page->TemplateTreatment->isInvalidClass() ?>"
        data-select2-id="ivf_otherprocedure_x_TemplateTreatment"
        data-table="ivf_otherprocedure"
        data-field="x_TemplateTreatment"
        data-value-separator="<?= $Page->TemplateTreatment->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateTreatment->getPlaceHolder()) ?>"
        <?= $Page->TemplateTreatment->editAttributes() ?>>
        <?= $Page->TemplateTreatment->selectOptionListHtml("x_TemplateTreatment") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplateTreatment->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateTreatment" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateTreatment->caption() ?>" data-title="<?= $Page->TemplateTreatment->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateTreatment',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateTreatment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateTreatment->getErrorMessage() ?></div>
<?= $Page->TemplateTreatment->Lookup->getParamTag($Page, "p_x_TemplateTreatment") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_otherprocedure_x_TemplateTreatment']"),
        options = { name: "x_TemplateTreatment", selectId: "ivf_otherprocedure_x_TemplateTreatment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_otherprocedure.fields.TemplateTreatment.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateOperation->Visible) { // TemplateOperation ?>
    <div id="r_TemplateOperation" class="form-group row">
        <label id="elh_ivf_otherprocedure_TemplateOperation" for="x_TemplateOperation" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_TemplateOperation"><?= $Page->TemplateOperation->caption() ?><?= $Page->TemplateOperation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateOperation->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_TemplateOperation"><span id="el_ivf_otherprocedure_TemplateOperation">
<?php $Page->TemplateOperation->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateOperation"
        name="x_TemplateOperation"
        class="form-control ew-select<?= $Page->TemplateOperation->isInvalidClass() ?>"
        data-select2-id="ivf_otherprocedure_x_TemplateOperation"
        data-table="ivf_otherprocedure"
        data-field="x_TemplateOperation"
        data-value-separator="<?= $Page->TemplateOperation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateOperation->getPlaceHolder()) ?>"
        <?= $Page->TemplateOperation->editAttributes() ?>>
        <?= $Page->TemplateOperation->selectOptionListHtml("x_TemplateOperation") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplateOperation->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateOperation" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateOperation->caption() ?>" data-title="<?= $Page->TemplateOperation->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateOperation',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateOperation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateOperation->getErrorMessage() ?></div>
<?= $Page->TemplateOperation->Lookup->getParamTag($Page, "p_x_TemplateOperation") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_otherprocedure_x_TemplateOperation']"),
        options = { name: "x_TemplateOperation", selectId: "ivf_otherprocedure_x_TemplateOperation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_otherprocedure.fields.TemplateOperation.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateFollowUpAdvice->Visible) { // TemplateFollowUpAdvice ?>
    <div id="r_TemplateFollowUpAdvice" class="form-group row">
        <label id="elh_ivf_otherprocedure_TemplateFollowUpAdvice" for="x_TemplateFollowUpAdvice" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_TemplateFollowUpAdvice"><?= $Page->TemplateFollowUpAdvice->caption() ?><?= $Page->TemplateFollowUpAdvice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateFollowUpAdvice->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_TemplateFollowUpAdvice"><span id="el_ivf_otherprocedure_TemplateFollowUpAdvice">
<?php $Page->TemplateFollowUpAdvice->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateFollowUpAdvice"
        name="x_TemplateFollowUpAdvice"
        class="form-control ew-select<?= $Page->TemplateFollowUpAdvice->isInvalidClass() ?>"
        data-select2-id="ivf_otherprocedure_x_TemplateFollowUpAdvice"
        data-table="ivf_otherprocedure"
        data-field="x_TemplateFollowUpAdvice"
        data-value-separator="<?= $Page->TemplateFollowUpAdvice->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateFollowUpAdvice->getPlaceHolder()) ?>"
        <?= $Page->TemplateFollowUpAdvice->editAttributes() ?>>
        <?= $Page->TemplateFollowUpAdvice->selectOptionListHtml("x_TemplateFollowUpAdvice") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplateFollowUpAdvice->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateFollowUpAdvice" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateFollowUpAdvice->caption() ?>" data-title="<?= $Page->TemplateFollowUpAdvice->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateFollowUpAdvice',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateFollowUpAdvice->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateFollowUpAdvice->getErrorMessage() ?></div>
<?= $Page->TemplateFollowUpAdvice->Lookup->getParamTag($Page, "p_x_TemplateFollowUpAdvice") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_otherprocedure_x_TemplateFollowUpAdvice']"),
        options = { name: "x_TemplateFollowUpAdvice", selectId: "ivf_otherprocedure_x_TemplateFollowUpAdvice", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_otherprocedure.fields.TemplateFollowUpAdvice.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateFollowUpMedication->Visible) { // TemplateFollowUpMedication ?>
    <div id="r_TemplateFollowUpMedication" class="form-group row">
        <label id="elh_ivf_otherprocedure_TemplateFollowUpMedication" for="x_TemplateFollowUpMedication" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_TemplateFollowUpMedication"><?= $Page->TemplateFollowUpMedication->caption() ?><?= $Page->TemplateFollowUpMedication->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateFollowUpMedication->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_TemplateFollowUpMedication"><span id="el_ivf_otherprocedure_TemplateFollowUpMedication">
<?php $Page->TemplateFollowUpMedication->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateFollowUpMedication"
        name="x_TemplateFollowUpMedication"
        class="form-control ew-select<?= $Page->TemplateFollowUpMedication->isInvalidClass() ?>"
        data-select2-id="ivf_otherprocedure_x_TemplateFollowUpMedication"
        data-table="ivf_otherprocedure"
        data-field="x_TemplateFollowUpMedication"
        data-value-separator="<?= $Page->TemplateFollowUpMedication->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateFollowUpMedication->getPlaceHolder()) ?>"
        <?= $Page->TemplateFollowUpMedication->editAttributes() ?>>
        <?= $Page->TemplateFollowUpMedication->selectOptionListHtml("x_TemplateFollowUpMedication") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplateFollowUpMedication->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateFollowUpMedication" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateFollowUpMedication->caption() ?>" data-title="<?= $Page->TemplateFollowUpMedication->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateFollowUpMedication',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateFollowUpMedication->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateFollowUpMedication->getErrorMessage() ?></div>
<?= $Page->TemplateFollowUpMedication->Lookup->getParamTag($Page, "p_x_TemplateFollowUpMedication") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_otherprocedure_x_TemplateFollowUpMedication']"),
        options = { name: "x_TemplateFollowUpMedication", selectId: "ivf_otherprocedure_x_TemplateFollowUpMedication", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_otherprocedure.fields.TemplateFollowUpMedication.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplatePlan->Visible) { // TemplatePlan ?>
    <div id="r_TemplatePlan" class="form-group row">
        <label id="elh_ivf_otherprocedure_TemplatePlan" for="x_TemplatePlan" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_TemplatePlan"><?= $Page->TemplatePlan->caption() ?><?= $Page->TemplatePlan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplatePlan->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_TemplatePlan"><span id="el_ivf_otherprocedure_TemplatePlan">
<?php $Page->TemplatePlan->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplatePlan"
        name="x_TemplatePlan"
        class="form-control ew-select<?= $Page->TemplatePlan->isInvalidClass() ?>"
        data-select2-id="ivf_otherprocedure_x_TemplatePlan"
        data-table="ivf_otherprocedure"
        data-field="x_TemplatePlan"
        data-value-separator="<?= $Page->TemplatePlan->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplatePlan->getPlaceHolder()) ?>"
        <?= $Page->TemplatePlan->editAttributes() ?>>
        <?= $Page->TemplatePlan->selectOptionListHtml("x_TemplatePlan") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplatePlan->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplatePlan" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplatePlan->caption() ?>" data-title="<?= $Page->TemplatePlan->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplatePlan',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplatePlan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplatePlan->getErrorMessage() ?></div>
<?= $Page->TemplatePlan->Lookup->getParamTag($Page, "p_x_TemplatePlan") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_otherprocedure_x_TemplatePlan']"),
        options = { name: "x_TemplatePlan", selectId: "ivf_otherprocedure_x_TemplatePlan", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_otherprocedure.fields.TemplatePlan.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->QRCode->Visible) { // QRCode ?>
    <div id="r_QRCode" class="form-group row">
        <label id="elh_ivf_otherprocedure_QRCode" for="x_QRCode" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_QRCode"><?= $Page->QRCode->caption() ?><?= $Page->QRCode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->QRCode->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_QRCode"><span id="el_ivf_otherprocedure_QRCode">
<textarea data-table="ivf_otherprocedure" data-field="x_QRCode" name="x_QRCode" id="x_QRCode" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->QRCode->getPlaceHolder()) ?>"<?= $Page->QRCode->editAttributes() ?> aria-describedby="x_QRCode_help"><?= $Page->QRCode->EditValue ?></textarea>
<?= $Page->QRCode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->QRCode->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_otherprocedure_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_otherprocedure_TidNo"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_TidNo"><span id="el_ivf_otherprocedure_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_otherprocedure" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_otherprocedureedit" class="ew-custom-template"></div>
<template id="tpm_ivf_otherprocedureedit">
<div id="ct_IvfOtherprocedureEdit"><style>
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
<slot class="ew-slot" name="tpc_ivf_otherprocedure_RIDNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_RIDNO"></slot>
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
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_DateofAdmission"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_DateofAdmission"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_DateofProcedure"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_DateofProcedure"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_DateofDischarge"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_DateofDischarge"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_ProcedureDone"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_ProcedureDone"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_Consultant"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_Consultant"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_Surgeon"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_Surgeon"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_Anesthetist"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_Anesthetist"></slot></span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_InvestigationReport"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_InvestigationReport"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_otherprocedure_TempleteFinalDiagnosis"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_TempleteFinalDiagnosis"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_FinalDiagnosis"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_FinalDiagnosis"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_otherprocedure_TemplateTreatment"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_TemplateTreatment"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_Treatment"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_Treatment"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_otherprocedure_TemplateOperation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_TemplateOperation"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_DetailOfOperation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_DetailOfOperation"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_otherprocedure_TemplateFollowUpAdvice"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_TemplateFollowUpAdvice"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_FollowUpAdvice"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_FollowUpAdvice"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_otherprocedure_TemplateFollowUpMedication"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_TemplateFollowUpMedication"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_FollowUpMedication"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_FollowUpMedication"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_otherprocedure_TemplatePlan"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_TemplatePlan"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_Plan"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_Plan"></slot></span>
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
    ew.applyTemplate("tpd_ivf_otherprocedureedit", "tpm_ivf_otherprocedureedit", "ivf_otherprocedureedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("ivf_otherprocedure");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

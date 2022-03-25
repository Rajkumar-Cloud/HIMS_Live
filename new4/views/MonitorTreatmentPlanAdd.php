<?php

namespace PHPMaker2021\HIMS;

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
    var currentTable = <?= JsonEncode(GetClientVar("tables", "monitor_treatment_plan")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.monitor_treatment_plan)
        ew.vars.tables.monitor_treatment_plan = currentTable;
    fmonitor_treatment_planadd.addFields([
        ["PatId", [fields.PatId.visible && fields.PatId.required ? ew.Validators.required(fields.PatId.caption) : null], fields.PatId.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["MobileNo", [fields.MobileNo.visible && fields.MobileNo.required ? ew.Validators.required(fields.MobileNo.caption) : null], fields.MobileNo.isInvalid],
        ["ConsultantName", [fields.ConsultantName.visible && fields.ConsultantName.required ? ew.Validators.required(fields.ConsultantName.caption) : null], fields.ConsultantName.isInvalid],
        ["RefDrName", [fields.RefDrName.visible && fields.RefDrName.required ? ew.Validators.required(fields.RefDrName.caption) : null], fields.RefDrName.isInvalid],
        ["RefDrMobileNo", [fields.RefDrMobileNo.visible && fields.RefDrMobileNo.required ? ew.Validators.required(fields.RefDrMobileNo.caption) : null], fields.RefDrMobileNo.isInvalid],
        ["NewVisitDate", [fields.NewVisitDate.visible && fields.NewVisitDate.required ? ew.Validators.required(fields.NewVisitDate.caption) : null, ew.Validators.datetime(7)], fields.NewVisitDate.isInvalid],
        ["NewVisitYesNo", [fields.NewVisitYesNo.visible && fields.NewVisitYesNo.required ? ew.Validators.required(fields.NewVisitYesNo.caption) : null], fields.NewVisitYesNo.isInvalid],
        ["Treatment", [fields.Treatment.visible && fields.Treatment.required ? ew.Validators.required(fields.Treatment.caption) : null], fields.Treatment.isInvalid],
        ["IUIDoneDate1", [fields.IUIDoneDate1.visible && fields.IUIDoneDate1.required ? ew.Validators.required(fields.IUIDoneDate1.caption) : null, ew.Validators.datetime(7)], fields.IUIDoneDate1.isInvalid],
        ["IUIDoneYesNo1", [fields.IUIDoneYesNo1.visible && fields.IUIDoneYesNo1.required ? ew.Validators.required(fields.IUIDoneYesNo1.caption) : null], fields.IUIDoneYesNo1.isInvalid],
        ["UPTTestDate1", [fields.UPTTestDate1.visible && fields.UPTTestDate1.required ? ew.Validators.required(fields.UPTTestDate1.caption) : null, ew.Validators.datetime(7)], fields.UPTTestDate1.isInvalid],
        ["UPTTestYesNo1", [fields.UPTTestYesNo1.visible && fields.UPTTestYesNo1.required ? ew.Validators.required(fields.UPTTestYesNo1.caption) : null], fields.UPTTestYesNo1.isInvalid],
        ["IUIDoneDate2", [fields.IUIDoneDate2.visible && fields.IUIDoneDate2.required ? ew.Validators.required(fields.IUIDoneDate2.caption) : null, ew.Validators.datetime(7)], fields.IUIDoneDate2.isInvalid],
        ["IUIDoneYesNo2", [fields.IUIDoneYesNo2.visible && fields.IUIDoneYesNo2.required ? ew.Validators.required(fields.IUIDoneYesNo2.caption) : null], fields.IUIDoneYesNo2.isInvalid],
        ["UPTTestDate2", [fields.UPTTestDate2.visible && fields.UPTTestDate2.required ? ew.Validators.required(fields.UPTTestDate2.caption) : null, ew.Validators.datetime(7)], fields.UPTTestDate2.isInvalid],
        ["UPTTestYesNo2", [fields.UPTTestYesNo2.visible && fields.UPTTestYesNo2.required ? ew.Validators.required(fields.UPTTestYesNo2.caption) : null], fields.UPTTestYesNo2.isInvalid],
        ["IUIDoneDate3", [fields.IUIDoneDate3.visible && fields.IUIDoneDate3.required ? ew.Validators.required(fields.IUIDoneDate3.caption) : null, ew.Validators.datetime(7)], fields.IUIDoneDate3.isInvalid],
        ["IUIDoneYesNo3", [fields.IUIDoneYesNo3.visible && fields.IUIDoneYesNo3.required ? ew.Validators.required(fields.IUIDoneYesNo3.caption) : null], fields.IUIDoneYesNo3.isInvalid],
        ["UPTTestDate3", [fields.UPTTestDate3.visible && fields.UPTTestDate3.required ? ew.Validators.required(fields.UPTTestDate3.caption) : null, ew.Validators.datetime(7)], fields.UPTTestDate3.isInvalid],
        ["UPTTestYesNo3", [fields.UPTTestYesNo3.visible && fields.UPTTestYesNo3.required ? ew.Validators.required(fields.UPTTestYesNo3.caption) : null], fields.UPTTestYesNo3.isInvalid],
        ["IUIDoneDate4", [fields.IUIDoneDate4.visible && fields.IUIDoneDate4.required ? ew.Validators.required(fields.IUIDoneDate4.caption) : null, ew.Validators.datetime(7)], fields.IUIDoneDate4.isInvalid],
        ["IUIDoneYesNo4", [fields.IUIDoneYesNo4.visible && fields.IUIDoneYesNo4.required ? ew.Validators.required(fields.IUIDoneYesNo4.caption) : null], fields.IUIDoneYesNo4.isInvalid],
        ["UPTTestDate4", [fields.UPTTestDate4.visible && fields.UPTTestDate4.required ? ew.Validators.required(fields.UPTTestDate4.caption) : null, ew.Validators.datetime(7)], fields.UPTTestDate4.isInvalid],
        ["UPTTestYesNo4", [fields.UPTTestYesNo4.visible && fields.UPTTestYesNo4.required ? ew.Validators.required(fields.UPTTestYesNo4.caption) : null], fields.UPTTestYesNo4.isInvalid],
        ["IVFStimulationDate", [fields.IVFStimulationDate.visible && fields.IVFStimulationDate.required ? ew.Validators.required(fields.IVFStimulationDate.caption) : null, ew.Validators.datetime(7)], fields.IVFStimulationDate.isInvalid],
        ["IVFStimulationYesNo", [fields.IVFStimulationYesNo.visible && fields.IVFStimulationYesNo.required ? ew.Validators.required(fields.IVFStimulationYesNo.caption) : null], fields.IVFStimulationYesNo.isInvalid],
        ["OPUDate", [fields.OPUDate.visible && fields.OPUDate.required ? ew.Validators.required(fields.OPUDate.caption) : null, ew.Validators.datetime(7)], fields.OPUDate.isInvalid],
        ["OPUYesNo", [fields.OPUYesNo.visible && fields.OPUYesNo.required ? ew.Validators.required(fields.OPUYesNo.caption) : null], fields.OPUYesNo.isInvalid],
        ["ETDate", [fields.ETDate.visible && fields.ETDate.required ? ew.Validators.required(fields.ETDate.caption) : null, ew.Validators.datetime(7)], fields.ETDate.isInvalid],
        ["ETYesNo", [fields.ETYesNo.visible && fields.ETYesNo.required ? ew.Validators.required(fields.ETYesNo.caption) : null], fields.ETYesNo.isInvalid],
        ["BetaHCGDate", [fields.BetaHCGDate.visible && fields.BetaHCGDate.required ? ew.Validators.required(fields.BetaHCGDate.caption) : null, ew.Validators.datetime(7)], fields.BetaHCGDate.isInvalid],
        ["BetaHCGYesNo", [fields.BetaHCGYesNo.visible && fields.BetaHCGYesNo.required ? ew.Validators.required(fields.BetaHCGYesNo.caption) : null], fields.BetaHCGYesNo.isInvalid],
        ["FETDate", [fields.FETDate.visible && fields.FETDate.required ? ew.Validators.required(fields.FETDate.caption) : null, ew.Validators.datetime(7)], fields.FETDate.isInvalid],
        ["FETYesNo", [fields.FETYesNo.visible && fields.FETYesNo.required ? ew.Validators.required(fields.FETYesNo.caption) : null], fields.FETYesNo.isInvalid],
        ["FBetaHCGDate", [fields.FBetaHCGDate.visible && fields.FBetaHCGDate.required ? ew.Validators.required(fields.FBetaHCGDate.caption) : null, ew.Validators.datetime(7)], fields.FBetaHCGDate.isInvalid],
        ["FBetaHCGYesNo", [fields.FBetaHCGYesNo.visible && fields.FBetaHCGYesNo.required ? ew.Validators.required(fields.FBetaHCGYesNo.caption) : null], fields.FBetaHCGYesNo.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid]
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
    fmonitor_treatment_planadd.lists.PatId = <?= $Page->PatId->toClientList($Page) ?>;
    fmonitor_treatment_planadd.lists.NewVisitYesNo = <?= $Page->NewVisitYesNo->toClientList($Page) ?>;
    fmonitor_treatment_planadd.lists.Treatment = <?= $Page->Treatment->toClientList($Page) ?>;
    fmonitor_treatment_planadd.lists.IUIDoneYesNo1 = <?= $Page->IUIDoneYesNo1->toClientList($Page) ?>;
    fmonitor_treatment_planadd.lists.UPTTestYesNo1 = <?= $Page->UPTTestYesNo1->toClientList($Page) ?>;
    fmonitor_treatment_planadd.lists.IUIDoneYesNo2 = <?= $Page->IUIDoneYesNo2->toClientList($Page) ?>;
    fmonitor_treatment_planadd.lists.UPTTestYesNo2 = <?= $Page->UPTTestYesNo2->toClientList($Page) ?>;
    fmonitor_treatment_planadd.lists.IUIDoneYesNo3 = <?= $Page->IUIDoneYesNo3->toClientList($Page) ?>;
    fmonitor_treatment_planadd.lists.UPTTestYesNo3 = <?= $Page->UPTTestYesNo3->toClientList($Page) ?>;
    fmonitor_treatment_planadd.lists.IUIDoneYesNo4 = <?= $Page->IUIDoneYesNo4->toClientList($Page) ?>;
    fmonitor_treatment_planadd.lists.UPTTestYesNo4 = <?= $Page->UPTTestYesNo4->toClientList($Page) ?>;
    fmonitor_treatment_planadd.lists.IVFStimulationYesNo = <?= $Page->IVFStimulationYesNo->toClientList($Page) ?>;
    fmonitor_treatment_planadd.lists.OPUYesNo = <?= $Page->OPUYesNo->toClientList($Page) ?>;
    fmonitor_treatment_planadd.lists.ETYesNo = <?= $Page->ETYesNo->toClientList($Page) ?>;
    fmonitor_treatment_planadd.lists.BetaHCGYesNo = <?= $Page->BetaHCGYesNo->toClientList($Page) ?>;
    fmonitor_treatment_planadd.lists.FETYesNo = <?= $Page->FETYesNo->toClientList($Page) ?>;
    fmonitor_treatment_planadd.lists.FBetaHCGYesNo = <?= $Page->FBetaHCGYesNo->toClientList($Page) ?>;
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
<form name="fmonitor_treatment_planadd" id="fmonitor_treatment_planadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="monitor_treatment_plan">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($Page->PatId->Visible) { // PatId ?>
    <div id="r_PatId" class="form-group row">
        <label id="elh_monitor_treatment_plan_PatId" for="x_PatId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_PatId"><?= $Page->PatId->caption() ?><?= $Page->PatId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatId->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_PatId"><span id="el_monitor_treatment_plan_PatId">
<?php $Page->PatId->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_PatId_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatId"><?= EmptyValue(strval($Page->PatId->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->PatId->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PatId->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->PatId->ReadOnly || $Page->PatId->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatId',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->PatId->getErrorMessage() ?></div>
<?= $Page->PatId->getCustomMessage() ?>
<?= $Page->PatId->Lookup->getParamTag($Page, "p_x_PatId") ?>
<input type="hidden" is="selection-list" data-table="monitor_treatment_plan" data-field="x_PatId" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PatId->displayValueSeparatorAttribute() ?>" name="x_PatId" id="x_PatId" value="<?= $Page->PatId->CurrentValue ?>"<?= $Page->PatId->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_monitor_treatment_plan_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_PatientId"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_PatientId"><span id="el_monitor_treatment_plan_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_monitor_treatment_plan_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_PatientName"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_PatientName"><span id="el_monitor_treatment_plan_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_monitor_treatment_plan_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_Age"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_Age"><span id="el_monitor_treatment_plan_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNo->Visible) { // MobileNo ?>
    <div id="r_MobileNo" class="form-group row">
        <label id="elh_monitor_treatment_plan_MobileNo" for="x_MobileNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_MobileNo"><?= $Page->MobileNo->caption() ?><?= $Page->MobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNo->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_MobileNo"><span id="el_monitor_treatment_plan_MobileNo">
<input type="<?= $Page->MobileNo->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_MobileNo" name="x_MobileNo" id="x_MobileNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNo->getPlaceHolder()) ?>" value="<?= $Page->MobileNo->EditValue ?>"<?= $Page->MobileNo->editAttributes() ?> aria-describedby="x_MobileNo_help">
<?= $Page->MobileNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MobileNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ConsultantName->Visible) { // ConsultantName ?>
    <div id="r_ConsultantName" class="form-group row">
        <label id="elh_monitor_treatment_plan_ConsultantName" for="x_ConsultantName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_ConsultantName"><?= $Page->ConsultantName->caption() ?><?= $Page->ConsultantName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ConsultantName->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_ConsultantName"><span id="el_monitor_treatment_plan_ConsultantName">
<input type="<?= $Page->ConsultantName->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_ConsultantName" name="x_ConsultantName" id="x_ConsultantName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ConsultantName->getPlaceHolder()) ?>" value="<?= $Page->ConsultantName->EditValue ?>"<?= $Page->ConsultantName->editAttributes() ?> aria-describedby="x_ConsultantName_help">
<?= $Page->ConsultantName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ConsultantName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RefDrName->Visible) { // RefDrName ?>
    <div id="r_RefDrName" class="form-group row">
        <label id="elh_monitor_treatment_plan_RefDrName" for="x_RefDrName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_RefDrName"><?= $Page->RefDrName->caption() ?><?= $Page->RefDrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefDrName->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_RefDrName"><span id="el_monitor_treatment_plan_RefDrName">
<input type="<?= $Page->RefDrName->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_RefDrName" name="x_RefDrName" id="x_RefDrName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RefDrName->getPlaceHolder()) ?>" value="<?= $Page->RefDrName->EditValue ?>"<?= $Page->RefDrName->editAttributes() ?> aria-describedby="x_RefDrName_help">
<?= $Page->RefDrName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RefDrName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RefDrMobileNo->Visible) { // RefDrMobileNo ?>
    <div id="r_RefDrMobileNo" class="form-group row">
        <label id="elh_monitor_treatment_plan_RefDrMobileNo" for="x_RefDrMobileNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_RefDrMobileNo"><?= $Page->RefDrMobileNo->caption() ?><?= $Page->RefDrMobileNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RefDrMobileNo->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_RefDrMobileNo"><span id="el_monitor_treatment_plan_RefDrMobileNo">
<input type="<?= $Page->RefDrMobileNo->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_RefDrMobileNo" name="x_RefDrMobileNo" id="x_RefDrMobileNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RefDrMobileNo->getPlaceHolder()) ?>" value="<?= $Page->RefDrMobileNo->EditValue ?>"<?= $Page->RefDrMobileNo->editAttributes() ?> aria-describedby="x_RefDrMobileNo_help">
<?= $Page->RefDrMobileNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RefDrMobileNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NewVisitDate->Visible) { // NewVisitDate ?>
    <div id="r_NewVisitDate" class="form-group row">
        <label id="elh_monitor_treatment_plan_NewVisitDate" for="x_NewVisitDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_NewVisitDate"><?= $Page->NewVisitDate->caption() ?><?= $Page->NewVisitDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NewVisitDate->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_NewVisitDate"><span id="el_monitor_treatment_plan_NewVisitDate">
<input type="<?= $Page->NewVisitDate->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_NewVisitDate" data-format="7" name="x_NewVisitDate" id="x_NewVisitDate" placeholder="<?= HtmlEncode($Page->NewVisitDate->getPlaceHolder()) ?>" value="<?= $Page->NewVisitDate->EditValue ?>"<?= $Page->NewVisitDate->editAttributes() ?> aria-describedby="x_NewVisitDate_help">
<?= $Page->NewVisitDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NewVisitDate->getErrorMessage() ?></div>
<?php if (!$Page->NewVisitDate->ReadOnly && !$Page->NewVisitDate->Disabled && !isset($Page->NewVisitDate->EditAttrs["readonly"]) && !isset($Page->NewVisitDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_NewVisitDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NewVisitYesNo->Visible) { // NewVisitYesNo ?>
    <div id="r_NewVisitYesNo" class="form-group row">
        <label id="elh_monitor_treatment_plan_NewVisitYesNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_NewVisitYesNo"><?= $Page->NewVisitYesNo->caption() ?><?= $Page->NewVisitYesNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NewVisitYesNo->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_NewVisitYesNo"><span id="el_monitor_treatment_plan_NewVisitYesNo">
<template id="tp_x_NewVisitYesNo">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="monitor_treatment_plan" data-field="x_NewVisitYesNo" name="x_NewVisitYesNo" id="x_NewVisitYesNo"<?= $Page->NewVisitYesNo->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_NewVisitYesNo" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_NewVisitYesNo[]"
    name="x_NewVisitYesNo[]"
    value="<?= HtmlEncode($Page->NewVisitYesNo->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_NewVisitYesNo"
    data-target="dsl_x_NewVisitYesNo"
    data-repeatcolumn="5"
    class="form-control<?= $Page->NewVisitYesNo->isInvalidClass() ?>"
    data-table="monitor_treatment_plan"
    data-field="x_NewVisitYesNo"
    data-value-separator="<?= $Page->NewVisitYesNo->displayValueSeparatorAttribute() ?>"
    <?= $Page->NewVisitYesNo->editAttributes() ?>>
<?= $Page->NewVisitYesNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NewVisitYesNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
    <div id="r_Treatment" class="form-group row">
        <label id="elh_monitor_treatment_plan_Treatment" for="x_Treatment" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_Treatment"><?= $Page->Treatment->caption() ?><?= $Page->Treatment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Treatment->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_Treatment"><span id="el_monitor_treatment_plan_Treatment">
    <select
        id="x_Treatment"
        name="x_Treatment"
        class="form-control ew-select<?= $Page->Treatment->isInvalidClass() ?>"
        data-select2-id="monitor_treatment_plan_x_Treatment"
        data-table="monitor_treatment_plan"
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
    var el = document.querySelector("select[data-select2-id='monitor_treatment_plan_x_Treatment']"),
        options = { name: "x_Treatment", selectId: "monitor_treatment_plan_x_Treatment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.monitor_treatment_plan.fields.Treatment.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.monitor_treatment_plan.fields.Treatment.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUIDoneDate1->Visible) { // IUIDoneDate1 ?>
    <div id="r_IUIDoneDate1" class="form-group row">
        <label id="elh_monitor_treatment_plan_IUIDoneDate1" for="x_IUIDoneDate1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_IUIDoneDate1"><?= $Page->IUIDoneDate1->caption() ?><?= $Page->IUIDoneDate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUIDoneDate1->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_IUIDoneDate1"><span id="el_monitor_treatment_plan_IUIDoneDate1">
<input type="<?= $Page->IUIDoneDate1->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_IUIDoneDate1" data-format="7" name="x_IUIDoneDate1" id="x_IUIDoneDate1" placeholder="<?= HtmlEncode($Page->IUIDoneDate1->getPlaceHolder()) ?>" value="<?= $Page->IUIDoneDate1->EditValue ?>"<?= $Page->IUIDoneDate1->editAttributes() ?> aria-describedby="x_IUIDoneDate1_help">
<?= $Page->IUIDoneDate1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IUIDoneDate1->getErrorMessage() ?></div>
<?php if (!$Page->IUIDoneDate1->ReadOnly && !$Page->IUIDoneDate1->Disabled && !isset($Page->IUIDoneDate1->EditAttrs["readonly"]) && !isset($Page->IUIDoneDate1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_IUIDoneDate1", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUIDoneYesNo1->Visible) { // IUIDoneYesNo1 ?>
    <div id="r_IUIDoneYesNo1" class="form-group row">
        <label id="elh_monitor_treatment_plan_IUIDoneYesNo1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_IUIDoneYesNo1"><?= $Page->IUIDoneYesNo1->caption() ?><?= $Page->IUIDoneYesNo1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUIDoneYesNo1->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_IUIDoneYesNo1"><span id="el_monitor_treatment_plan_IUIDoneYesNo1">
<template id="tp_x_IUIDoneYesNo1">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="monitor_treatment_plan" data-field="x_IUIDoneYesNo1" name="x_IUIDoneYesNo1" id="x_IUIDoneYesNo1"<?= $Page->IUIDoneYesNo1->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_IUIDoneYesNo1" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_IUIDoneYesNo1[]"
    name="x_IUIDoneYesNo1[]"
    value="<?= HtmlEncode($Page->IUIDoneYesNo1->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_IUIDoneYesNo1"
    data-target="dsl_x_IUIDoneYesNo1"
    data-repeatcolumn="5"
    class="form-control<?= $Page->IUIDoneYesNo1->isInvalidClass() ?>"
    data-table="monitor_treatment_plan"
    data-field="x_IUIDoneYesNo1"
    data-value-separator="<?= $Page->IUIDoneYesNo1->displayValueSeparatorAttribute() ?>"
    <?= $Page->IUIDoneYesNo1->editAttributes() ?>>
<?= $Page->IUIDoneYesNo1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IUIDoneYesNo1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UPTTestDate1->Visible) { // UPTTestDate1 ?>
    <div id="r_UPTTestDate1" class="form-group row">
        <label id="elh_monitor_treatment_plan_UPTTestDate1" for="x_UPTTestDate1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_UPTTestDate1"><?= $Page->UPTTestDate1->caption() ?><?= $Page->UPTTestDate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UPTTestDate1->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_UPTTestDate1"><span id="el_monitor_treatment_plan_UPTTestDate1">
<input type="<?= $Page->UPTTestDate1->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_UPTTestDate1" data-format="7" name="x_UPTTestDate1" id="x_UPTTestDate1" placeholder="<?= HtmlEncode($Page->UPTTestDate1->getPlaceHolder()) ?>" value="<?= $Page->UPTTestDate1->EditValue ?>"<?= $Page->UPTTestDate1->editAttributes() ?> aria-describedby="x_UPTTestDate1_help">
<?= $Page->UPTTestDate1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UPTTestDate1->getErrorMessage() ?></div>
<?php if (!$Page->UPTTestDate1->ReadOnly && !$Page->UPTTestDate1->Disabled && !isset($Page->UPTTestDate1->EditAttrs["readonly"]) && !isset($Page->UPTTestDate1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_UPTTestDate1", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UPTTestYesNo1->Visible) { // UPTTestYesNo1 ?>
    <div id="r_UPTTestYesNo1" class="form-group row">
        <label id="elh_monitor_treatment_plan_UPTTestYesNo1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_UPTTestYesNo1"><?= $Page->UPTTestYesNo1->caption() ?><?= $Page->UPTTestYesNo1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UPTTestYesNo1->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_UPTTestYesNo1"><span id="el_monitor_treatment_plan_UPTTestYesNo1">
<template id="tp_x_UPTTestYesNo1">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="monitor_treatment_plan" data-field="x_UPTTestYesNo1" name="x_UPTTestYesNo1" id="x_UPTTestYesNo1"<?= $Page->UPTTestYesNo1->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_UPTTestYesNo1" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_UPTTestYesNo1[]"
    name="x_UPTTestYesNo1[]"
    value="<?= HtmlEncode($Page->UPTTestYesNo1->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_UPTTestYesNo1"
    data-target="dsl_x_UPTTestYesNo1"
    data-repeatcolumn="5"
    class="form-control<?= $Page->UPTTestYesNo1->isInvalidClass() ?>"
    data-table="monitor_treatment_plan"
    data-field="x_UPTTestYesNo1"
    data-value-separator="<?= $Page->UPTTestYesNo1->displayValueSeparatorAttribute() ?>"
    <?= $Page->UPTTestYesNo1->editAttributes() ?>>
<?= $Page->UPTTestYesNo1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UPTTestYesNo1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUIDoneDate2->Visible) { // IUIDoneDate2 ?>
    <div id="r_IUIDoneDate2" class="form-group row">
        <label id="elh_monitor_treatment_plan_IUIDoneDate2" for="x_IUIDoneDate2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_IUIDoneDate2"><?= $Page->IUIDoneDate2->caption() ?><?= $Page->IUIDoneDate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUIDoneDate2->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_IUIDoneDate2"><span id="el_monitor_treatment_plan_IUIDoneDate2">
<input type="<?= $Page->IUIDoneDate2->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_IUIDoneDate2" data-format="7" name="x_IUIDoneDate2" id="x_IUIDoneDate2" placeholder="<?= HtmlEncode($Page->IUIDoneDate2->getPlaceHolder()) ?>" value="<?= $Page->IUIDoneDate2->EditValue ?>"<?= $Page->IUIDoneDate2->editAttributes() ?> aria-describedby="x_IUIDoneDate2_help">
<?= $Page->IUIDoneDate2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IUIDoneDate2->getErrorMessage() ?></div>
<?php if (!$Page->IUIDoneDate2->ReadOnly && !$Page->IUIDoneDate2->Disabled && !isset($Page->IUIDoneDate2->EditAttrs["readonly"]) && !isset($Page->IUIDoneDate2->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_IUIDoneDate2", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUIDoneYesNo2->Visible) { // IUIDoneYesNo2 ?>
    <div id="r_IUIDoneYesNo2" class="form-group row">
        <label id="elh_monitor_treatment_plan_IUIDoneYesNo2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_IUIDoneYesNo2"><?= $Page->IUIDoneYesNo2->caption() ?><?= $Page->IUIDoneYesNo2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUIDoneYesNo2->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_IUIDoneYesNo2"><span id="el_monitor_treatment_plan_IUIDoneYesNo2">
<template id="tp_x_IUIDoneYesNo2">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="monitor_treatment_plan" data-field="x_IUIDoneYesNo2" name="x_IUIDoneYesNo2" id="x_IUIDoneYesNo2"<?= $Page->IUIDoneYesNo2->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_IUIDoneYesNo2" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_IUIDoneYesNo2[]"
    name="x_IUIDoneYesNo2[]"
    value="<?= HtmlEncode($Page->IUIDoneYesNo2->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_IUIDoneYesNo2"
    data-target="dsl_x_IUIDoneYesNo2"
    data-repeatcolumn="5"
    class="form-control<?= $Page->IUIDoneYesNo2->isInvalidClass() ?>"
    data-table="monitor_treatment_plan"
    data-field="x_IUIDoneYesNo2"
    data-value-separator="<?= $Page->IUIDoneYesNo2->displayValueSeparatorAttribute() ?>"
    <?= $Page->IUIDoneYesNo2->editAttributes() ?>>
<?= $Page->IUIDoneYesNo2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IUIDoneYesNo2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UPTTestDate2->Visible) { // UPTTestDate2 ?>
    <div id="r_UPTTestDate2" class="form-group row">
        <label id="elh_monitor_treatment_plan_UPTTestDate2" for="x_UPTTestDate2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_UPTTestDate2"><?= $Page->UPTTestDate2->caption() ?><?= $Page->UPTTestDate2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UPTTestDate2->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_UPTTestDate2"><span id="el_monitor_treatment_plan_UPTTestDate2">
<input type="<?= $Page->UPTTestDate2->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_UPTTestDate2" data-format="7" name="x_UPTTestDate2" id="x_UPTTestDate2" placeholder="<?= HtmlEncode($Page->UPTTestDate2->getPlaceHolder()) ?>" value="<?= $Page->UPTTestDate2->EditValue ?>"<?= $Page->UPTTestDate2->editAttributes() ?> aria-describedby="x_UPTTestDate2_help">
<?= $Page->UPTTestDate2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UPTTestDate2->getErrorMessage() ?></div>
<?php if (!$Page->UPTTestDate2->ReadOnly && !$Page->UPTTestDate2->Disabled && !isset($Page->UPTTestDate2->EditAttrs["readonly"]) && !isset($Page->UPTTestDate2->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_UPTTestDate2", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UPTTestYesNo2->Visible) { // UPTTestYesNo2 ?>
    <div id="r_UPTTestYesNo2" class="form-group row">
        <label id="elh_monitor_treatment_plan_UPTTestYesNo2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_UPTTestYesNo2"><?= $Page->UPTTestYesNo2->caption() ?><?= $Page->UPTTestYesNo2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UPTTestYesNo2->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_UPTTestYesNo2"><span id="el_monitor_treatment_plan_UPTTestYesNo2">
<template id="tp_x_UPTTestYesNo2">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="monitor_treatment_plan" data-field="x_UPTTestYesNo2" name="x_UPTTestYesNo2" id="x_UPTTestYesNo2"<?= $Page->UPTTestYesNo2->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_UPTTestYesNo2" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_UPTTestYesNo2[]"
    name="x_UPTTestYesNo2[]"
    value="<?= HtmlEncode($Page->UPTTestYesNo2->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_UPTTestYesNo2"
    data-target="dsl_x_UPTTestYesNo2"
    data-repeatcolumn="5"
    class="form-control<?= $Page->UPTTestYesNo2->isInvalidClass() ?>"
    data-table="monitor_treatment_plan"
    data-field="x_UPTTestYesNo2"
    data-value-separator="<?= $Page->UPTTestYesNo2->displayValueSeparatorAttribute() ?>"
    <?= $Page->UPTTestYesNo2->editAttributes() ?>>
<?= $Page->UPTTestYesNo2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UPTTestYesNo2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUIDoneDate3->Visible) { // IUIDoneDate3 ?>
    <div id="r_IUIDoneDate3" class="form-group row">
        <label id="elh_monitor_treatment_plan_IUIDoneDate3" for="x_IUIDoneDate3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_IUIDoneDate3"><?= $Page->IUIDoneDate3->caption() ?><?= $Page->IUIDoneDate3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUIDoneDate3->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_IUIDoneDate3"><span id="el_monitor_treatment_plan_IUIDoneDate3">
<input type="<?= $Page->IUIDoneDate3->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_IUIDoneDate3" data-format="7" name="x_IUIDoneDate3" id="x_IUIDoneDate3" placeholder="<?= HtmlEncode($Page->IUIDoneDate3->getPlaceHolder()) ?>" value="<?= $Page->IUIDoneDate3->EditValue ?>"<?= $Page->IUIDoneDate3->editAttributes() ?> aria-describedby="x_IUIDoneDate3_help">
<?= $Page->IUIDoneDate3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IUIDoneDate3->getErrorMessage() ?></div>
<?php if (!$Page->IUIDoneDate3->ReadOnly && !$Page->IUIDoneDate3->Disabled && !isset($Page->IUIDoneDate3->EditAttrs["readonly"]) && !isset($Page->IUIDoneDate3->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_IUIDoneDate3", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUIDoneYesNo3->Visible) { // IUIDoneYesNo3 ?>
    <div id="r_IUIDoneYesNo3" class="form-group row">
        <label id="elh_monitor_treatment_plan_IUIDoneYesNo3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_IUIDoneYesNo3"><?= $Page->IUIDoneYesNo3->caption() ?><?= $Page->IUIDoneYesNo3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUIDoneYesNo3->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_IUIDoneYesNo3"><span id="el_monitor_treatment_plan_IUIDoneYesNo3">
<template id="tp_x_IUIDoneYesNo3">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="monitor_treatment_plan" data-field="x_IUIDoneYesNo3" name="x_IUIDoneYesNo3" id="x_IUIDoneYesNo3"<?= $Page->IUIDoneYesNo3->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_IUIDoneYesNo3" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_IUIDoneYesNo3[]"
    name="x_IUIDoneYesNo3[]"
    value="<?= HtmlEncode($Page->IUIDoneYesNo3->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_IUIDoneYesNo3"
    data-target="dsl_x_IUIDoneYesNo3"
    data-repeatcolumn="5"
    class="form-control<?= $Page->IUIDoneYesNo3->isInvalidClass() ?>"
    data-table="monitor_treatment_plan"
    data-field="x_IUIDoneYesNo3"
    data-value-separator="<?= $Page->IUIDoneYesNo3->displayValueSeparatorAttribute() ?>"
    <?= $Page->IUIDoneYesNo3->editAttributes() ?>>
<?= $Page->IUIDoneYesNo3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IUIDoneYesNo3->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UPTTestDate3->Visible) { // UPTTestDate3 ?>
    <div id="r_UPTTestDate3" class="form-group row">
        <label id="elh_monitor_treatment_plan_UPTTestDate3" for="x_UPTTestDate3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_UPTTestDate3"><?= $Page->UPTTestDate3->caption() ?><?= $Page->UPTTestDate3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UPTTestDate3->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_UPTTestDate3"><span id="el_monitor_treatment_plan_UPTTestDate3">
<input type="<?= $Page->UPTTestDate3->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_UPTTestDate3" data-format="7" name="x_UPTTestDate3" id="x_UPTTestDate3" placeholder="<?= HtmlEncode($Page->UPTTestDate3->getPlaceHolder()) ?>" value="<?= $Page->UPTTestDate3->EditValue ?>"<?= $Page->UPTTestDate3->editAttributes() ?> aria-describedby="x_UPTTestDate3_help">
<?= $Page->UPTTestDate3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UPTTestDate3->getErrorMessage() ?></div>
<?php if (!$Page->UPTTestDate3->ReadOnly && !$Page->UPTTestDate3->Disabled && !isset($Page->UPTTestDate3->EditAttrs["readonly"]) && !isset($Page->UPTTestDate3->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_UPTTestDate3", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UPTTestYesNo3->Visible) { // UPTTestYesNo3 ?>
    <div id="r_UPTTestYesNo3" class="form-group row">
        <label id="elh_monitor_treatment_plan_UPTTestYesNo3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_UPTTestYesNo3"><?= $Page->UPTTestYesNo3->caption() ?><?= $Page->UPTTestYesNo3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UPTTestYesNo3->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_UPTTestYesNo3"><span id="el_monitor_treatment_plan_UPTTestYesNo3">
<template id="tp_x_UPTTestYesNo3">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="monitor_treatment_plan" data-field="x_UPTTestYesNo3" name="x_UPTTestYesNo3" id="x_UPTTestYesNo3"<?= $Page->UPTTestYesNo3->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_UPTTestYesNo3" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_UPTTestYesNo3[]"
    name="x_UPTTestYesNo3[]"
    value="<?= HtmlEncode($Page->UPTTestYesNo3->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_UPTTestYesNo3"
    data-target="dsl_x_UPTTestYesNo3"
    data-repeatcolumn="5"
    class="form-control<?= $Page->UPTTestYesNo3->isInvalidClass() ?>"
    data-table="monitor_treatment_plan"
    data-field="x_UPTTestYesNo3"
    data-value-separator="<?= $Page->UPTTestYesNo3->displayValueSeparatorAttribute() ?>"
    <?= $Page->UPTTestYesNo3->editAttributes() ?>>
<?= $Page->UPTTestYesNo3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UPTTestYesNo3->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUIDoneDate4->Visible) { // IUIDoneDate4 ?>
    <div id="r_IUIDoneDate4" class="form-group row">
        <label id="elh_monitor_treatment_plan_IUIDoneDate4" for="x_IUIDoneDate4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_IUIDoneDate4"><?= $Page->IUIDoneDate4->caption() ?><?= $Page->IUIDoneDate4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUIDoneDate4->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_IUIDoneDate4"><span id="el_monitor_treatment_plan_IUIDoneDate4">
<input type="<?= $Page->IUIDoneDate4->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_IUIDoneDate4" data-format="7" name="x_IUIDoneDate4" id="x_IUIDoneDate4" placeholder="<?= HtmlEncode($Page->IUIDoneDate4->getPlaceHolder()) ?>" value="<?= $Page->IUIDoneDate4->EditValue ?>"<?= $Page->IUIDoneDate4->editAttributes() ?> aria-describedby="x_IUIDoneDate4_help">
<?= $Page->IUIDoneDate4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IUIDoneDate4->getErrorMessage() ?></div>
<?php if (!$Page->IUIDoneDate4->ReadOnly && !$Page->IUIDoneDate4->Disabled && !isset($Page->IUIDoneDate4->EditAttrs["readonly"]) && !isset($Page->IUIDoneDate4->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_IUIDoneDate4", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUIDoneYesNo4->Visible) { // IUIDoneYesNo4 ?>
    <div id="r_IUIDoneYesNo4" class="form-group row">
        <label id="elh_monitor_treatment_plan_IUIDoneYesNo4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_IUIDoneYesNo4"><?= $Page->IUIDoneYesNo4->caption() ?><?= $Page->IUIDoneYesNo4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUIDoneYesNo4->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_IUIDoneYesNo4"><span id="el_monitor_treatment_plan_IUIDoneYesNo4">
<template id="tp_x_IUIDoneYesNo4">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="monitor_treatment_plan" data-field="x_IUIDoneYesNo4" name="x_IUIDoneYesNo4" id="x_IUIDoneYesNo4"<?= $Page->IUIDoneYesNo4->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_IUIDoneYesNo4" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_IUIDoneYesNo4[]"
    name="x_IUIDoneYesNo4[]"
    value="<?= HtmlEncode($Page->IUIDoneYesNo4->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_IUIDoneYesNo4"
    data-target="dsl_x_IUIDoneYesNo4"
    data-repeatcolumn="5"
    class="form-control<?= $Page->IUIDoneYesNo4->isInvalidClass() ?>"
    data-table="monitor_treatment_plan"
    data-field="x_IUIDoneYesNo4"
    data-value-separator="<?= $Page->IUIDoneYesNo4->displayValueSeparatorAttribute() ?>"
    <?= $Page->IUIDoneYesNo4->editAttributes() ?>>
<?= $Page->IUIDoneYesNo4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IUIDoneYesNo4->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UPTTestDate4->Visible) { // UPTTestDate4 ?>
    <div id="r_UPTTestDate4" class="form-group row">
        <label id="elh_monitor_treatment_plan_UPTTestDate4" for="x_UPTTestDate4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_UPTTestDate4"><?= $Page->UPTTestDate4->caption() ?><?= $Page->UPTTestDate4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UPTTestDate4->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_UPTTestDate4"><span id="el_monitor_treatment_plan_UPTTestDate4">
<input type="<?= $Page->UPTTestDate4->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_UPTTestDate4" data-format="7" name="x_UPTTestDate4" id="x_UPTTestDate4" placeholder="<?= HtmlEncode($Page->UPTTestDate4->getPlaceHolder()) ?>" value="<?= $Page->UPTTestDate4->EditValue ?>"<?= $Page->UPTTestDate4->editAttributes() ?> aria-describedby="x_UPTTestDate4_help">
<?= $Page->UPTTestDate4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UPTTestDate4->getErrorMessage() ?></div>
<?php if (!$Page->UPTTestDate4->ReadOnly && !$Page->UPTTestDate4->Disabled && !isset($Page->UPTTestDate4->EditAttrs["readonly"]) && !isset($Page->UPTTestDate4->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_UPTTestDate4", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UPTTestYesNo4->Visible) { // UPTTestYesNo4 ?>
    <div id="r_UPTTestYesNo4" class="form-group row">
        <label id="elh_monitor_treatment_plan_UPTTestYesNo4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_UPTTestYesNo4"><?= $Page->UPTTestYesNo4->caption() ?><?= $Page->UPTTestYesNo4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UPTTestYesNo4->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_UPTTestYesNo4"><span id="el_monitor_treatment_plan_UPTTestYesNo4">
<template id="tp_x_UPTTestYesNo4">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="monitor_treatment_plan" data-field="x_UPTTestYesNo4" name="x_UPTTestYesNo4" id="x_UPTTestYesNo4"<?= $Page->UPTTestYesNo4->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_UPTTestYesNo4" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_UPTTestYesNo4[]"
    name="x_UPTTestYesNo4[]"
    value="<?= HtmlEncode($Page->UPTTestYesNo4->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_UPTTestYesNo4"
    data-target="dsl_x_UPTTestYesNo4"
    data-repeatcolumn="5"
    class="form-control<?= $Page->UPTTestYesNo4->isInvalidClass() ?>"
    data-table="monitor_treatment_plan"
    data-field="x_UPTTestYesNo4"
    data-value-separator="<?= $Page->UPTTestYesNo4->displayValueSeparatorAttribute() ?>"
    <?= $Page->UPTTestYesNo4->editAttributes() ?>>
<?= $Page->UPTTestYesNo4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UPTTestYesNo4->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IVFStimulationDate->Visible) { // IVFStimulationDate ?>
    <div id="r_IVFStimulationDate" class="form-group row">
        <label id="elh_monitor_treatment_plan_IVFStimulationDate" for="x_IVFStimulationDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_IVFStimulationDate"><?= $Page->IVFStimulationDate->caption() ?><?= $Page->IVFStimulationDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IVFStimulationDate->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_IVFStimulationDate"><span id="el_monitor_treatment_plan_IVFStimulationDate">
<input type="<?= $Page->IVFStimulationDate->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_IVFStimulationDate" data-format="7" name="x_IVFStimulationDate" id="x_IVFStimulationDate" placeholder="<?= HtmlEncode($Page->IVFStimulationDate->getPlaceHolder()) ?>" value="<?= $Page->IVFStimulationDate->EditValue ?>"<?= $Page->IVFStimulationDate->editAttributes() ?> aria-describedby="x_IVFStimulationDate_help">
<?= $Page->IVFStimulationDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IVFStimulationDate->getErrorMessage() ?></div>
<?php if (!$Page->IVFStimulationDate->ReadOnly && !$Page->IVFStimulationDate->Disabled && !isset($Page->IVFStimulationDate->EditAttrs["readonly"]) && !isset($Page->IVFStimulationDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_IVFStimulationDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IVFStimulationYesNo->Visible) { // IVFStimulationYesNo ?>
    <div id="r_IVFStimulationYesNo" class="form-group row">
        <label id="elh_monitor_treatment_plan_IVFStimulationYesNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_IVFStimulationYesNo"><?= $Page->IVFStimulationYesNo->caption() ?><?= $Page->IVFStimulationYesNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IVFStimulationYesNo->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_IVFStimulationYesNo"><span id="el_monitor_treatment_plan_IVFStimulationYesNo">
<template id="tp_x_IVFStimulationYesNo">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="monitor_treatment_plan" data-field="x_IVFStimulationYesNo" name="x_IVFStimulationYesNo" id="x_IVFStimulationYesNo"<?= $Page->IVFStimulationYesNo->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_IVFStimulationYesNo" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_IVFStimulationYesNo[]"
    name="x_IVFStimulationYesNo[]"
    value="<?= HtmlEncode($Page->IVFStimulationYesNo->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_IVFStimulationYesNo"
    data-target="dsl_x_IVFStimulationYesNo"
    data-repeatcolumn="5"
    class="form-control<?= $Page->IVFStimulationYesNo->isInvalidClass() ?>"
    data-table="monitor_treatment_plan"
    data-field="x_IVFStimulationYesNo"
    data-value-separator="<?= $Page->IVFStimulationYesNo->displayValueSeparatorAttribute() ?>"
    <?= $Page->IVFStimulationYesNo->editAttributes() ?>>
<?= $Page->IVFStimulationYesNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IVFStimulationYesNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OPUDate->Visible) { // OPUDate ?>
    <div id="r_OPUDate" class="form-group row">
        <label id="elh_monitor_treatment_plan_OPUDate" for="x_OPUDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_OPUDate"><?= $Page->OPUDate->caption() ?><?= $Page->OPUDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OPUDate->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_OPUDate"><span id="el_monitor_treatment_plan_OPUDate">
<input type="<?= $Page->OPUDate->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_OPUDate" data-format="7" name="x_OPUDate" id="x_OPUDate" placeholder="<?= HtmlEncode($Page->OPUDate->getPlaceHolder()) ?>" value="<?= $Page->OPUDate->EditValue ?>"<?= $Page->OPUDate->editAttributes() ?> aria-describedby="x_OPUDate_help">
<?= $Page->OPUDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OPUDate->getErrorMessage() ?></div>
<?php if (!$Page->OPUDate->ReadOnly && !$Page->OPUDate->Disabled && !isset($Page->OPUDate->EditAttrs["readonly"]) && !isset($Page->OPUDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_OPUDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OPUYesNo->Visible) { // OPUYesNo ?>
    <div id="r_OPUYesNo" class="form-group row">
        <label id="elh_monitor_treatment_plan_OPUYesNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_OPUYesNo"><?= $Page->OPUYesNo->caption() ?><?= $Page->OPUYesNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OPUYesNo->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_OPUYesNo"><span id="el_monitor_treatment_plan_OPUYesNo">
<template id="tp_x_OPUYesNo">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="monitor_treatment_plan" data-field="x_OPUYesNo" name="x_OPUYesNo" id="x_OPUYesNo"<?= $Page->OPUYesNo->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_OPUYesNo" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_OPUYesNo[]"
    name="x_OPUYesNo[]"
    value="<?= HtmlEncode($Page->OPUYesNo->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_OPUYesNo"
    data-target="dsl_x_OPUYesNo"
    data-repeatcolumn="5"
    class="form-control<?= $Page->OPUYesNo->isInvalidClass() ?>"
    data-table="monitor_treatment_plan"
    data-field="x_OPUYesNo"
    data-value-separator="<?= $Page->OPUYesNo->displayValueSeparatorAttribute() ?>"
    <?= $Page->OPUYesNo->editAttributes() ?>>
<?= $Page->OPUYesNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OPUYesNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ETDate->Visible) { // ETDate ?>
    <div id="r_ETDate" class="form-group row">
        <label id="elh_monitor_treatment_plan_ETDate" for="x_ETDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_ETDate"><?= $Page->ETDate->caption() ?><?= $Page->ETDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ETDate->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_ETDate"><span id="el_monitor_treatment_plan_ETDate">
<input type="<?= $Page->ETDate->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_ETDate" data-format="7" name="x_ETDate" id="x_ETDate" placeholder="<?= HtmlEncode($Page->ETDate->getPlaceHolder()) ?>" value="<?= $Page->ETDate->EditValue ?>"<?= $Page->ETDate->editAttributes() ?> aria-describedby="x_ETDate_help">
<?= $Page->ETDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ETDate->getErrorMessage() ?></div>
<?php if (!$Page->ETDate->ReadOnly && !$Page->ETDate->Disabled && !isset($Page->ETDate->EditAttrs["readonly"]) && !isset($Page->ETDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_ETDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ETYesNo->Visible) { // ETYesNo ?>
    <div id="r_ETYesNo" class="form-group row">
        <label id="elh_monitor_treatment_plan_ETYesNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_ETYesNo"><?= $Page->ETYesNo->caption() ?><?= $Page->ETYesNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ETYesNo->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_ETYesNo"><span id="el_monitor_treatment_plan_ETYesNo">
<template id="tp_x_ETYesNo">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="monitor_treatment_plan" data-field="x_ETYesNo" name="x_ETYesNo" id="x_ETYesNo"<?= $Page->ETYesNo->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_ETYesNo" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_ETYesNo[]"
    name="x_ETYesNo[]"
    value="<?= HtmlEncode($Page->ETYesNo->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_ETYesNo"
    data-target="dsl_x_ETYesNo"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ETYesNo->isInvalidClass() ?>"
    data-table="monitor_treatment_plan"
    data-field="x_ETYesNo"
    data-value-separator="<?= $Page->ETYesNo->displayValueSeparatorAttribute() ?>"
    <?= $Page->ETYesNo->editAttributes() ?>>
<?= $Page->ETYesNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ETYesNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BetaHCGDate->Visible) { // BetaHCGDate ?>
    <div id="r_BetaHCGDate" class="form-group row">
        <label id="elh_monitor_treatment_plan_BetaHCGDate" for="x_BetaHCGDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_BetaHCGDate"><?= $Page->BetaHCGDate->caption() ?><?= $Page->BetaHCGDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BetaHCGDate->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_BetaHCGDate"><span id="el_monitor_treatment_plan_BetaHCGDate">
<input type="<?= $Page->BetaHCGDate->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_BetaHCGDate" data-format="7" name="x_BetaHCGDate" id="x_BetaHCGDate" placeholder="<?= HtmlEncode($Page->BetaHCGDate->getPlaceHolder()) ?>" value="<?= $Page->BetaHCGDate->EditValue ?>"<?= $Page->BetaHCGDate->editAttributes() ?> aria-describedby="x_BetaHCGDate_help">
<?= $Page->BetaHCGDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BetaHCGDate->getErrorMessage() ?></div>
<?php if (!$Page->BetaHCGDate->ReadOnly && !$Page->BetaHCGDate->Disabled && !isset($Page->BetaHCGDate->EditAttrs["readonly"]) && !isset($Page->BetaHCGDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_BetaHCGDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BetaHCGYesNo->Visible) { // BetaHCGYesNo ?>
    <div id="r_BetaHCGYesNo" class="form-group row">
        <label id="elh_monitor_treatment_plan_BetaHCGYesNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_BetaHCGYesNo"><?= $Page->BetaHCGYesNo->caption() ?><?= $Page->BetaHCGYesNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BetaHCGYesNo->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_BetaHCGYesNo"><span id="el_monitor_treatment_plan_BetaHCGYesNo">
<template id="tp_x_BetaHCGYesNo">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="monitor_treatment_plan" data-field="x_BetaHCGYesNo" name="x_BetaHCGYesNo" id="x_BetaHCGYesNo"<?= $Page->BetaHCGYesNo->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_BetaHCGYesNo" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_BetaHCGYesNo[]"
    name="x_BetaHCGYesNo[]"
    value="<?= HtmlEncode($Page->BetaHCGYesNo->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_BetaHCGYesNo"
    data-target="dsl_x_BetaHCGYesNo"
    data-repeatcolumn="5"
    class="form-control<?= $Page->BetaHCGYesNo->isInvalidClass() ?>"
    data-table="monitor_treatment_plan"
    data-field="x_BetaHCGYesNo"
    data-value-separator="<?= $Page->BetaHCGYesNo->displayValueSeparatorAttribute() ?>"
    <?= $Page->BetaHCGYesNo->editAttributes() ?>>
<?= $Page->BetaHCGYesNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BetaHCGYesNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FETDate->Visible) { // FETDate ?>
    <div id="r_FETDate" class="form-group row">
        <label id="elh_monitor_treatment_plan_FETDate" for="x_FETDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_FETDate"><?= $Page->FETDate->caption() ?><?= $Page->FETDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FETDate->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_FETDate"><span id="el_monitor_treatment_plan_FETDate">
<input type="<?= $Page->FETDate->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_FETDate" data-format="7" name="x_FETDate" id="x_FETDate" placeholder="<?= HtmlEncode($Page->FETDate->getPlaceHolder()) ?>" value="<?= $Page->FETDate->EditValue ?>"<?= $Page->FETDate->editAttributes() ?> aria-describedby="x_FETDate_help">
<?= $Page->FETDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FETDate->getErrorMessage() ?></div>
<?php if (!$Page->FETDate->ReadOnly && !$Page->FETDate->Disabled && !isset($Page->FETDate->EditAttrs["readonly"]) && !isset($Page->FETDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_FETDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FETYesNo->Visible) { // FETYesNo ?>
    <div id="r_FETYesNo" class="form-group row">
        <label id="elh_monitor_treatment_plan_FETYesNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_FETYesNo"><?= $Page->FETYesNo->caption() ?><?= $Page->FETYesNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FETYesNo->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_FETYesNo"><span id="el_monitor_treatment_plan_FETYesNo">
<template id="tp_x_FETYesNo">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="monitor_treatment_plan" data-field="x_FETYesNo" name="x_FETYesNo" id="x_FETYesNo"<?= $Page->FETYesNo->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_FETYesNo" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_FETYesNo[]"
    name="x_FETYesNo[]"
    value="<?= HtmlEncode($Page->FETYesNo->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_FETYesNo"
    data-target="dsl_x_FETYesNo"
    data-repeatcolumn="5"
    class="form-control<?= $Page->FETYesNo->isInvalidClass() ?>"
    data-table="monitor_treatment_plan"
    data-field="x_FETYesNo"
    data-value-separator="<?= $Page->FETYesNo->displayValueSeparatorAttribute() ?>"
    <?= $Page->FETYesNo->editAttributes() ?>>
<?= $Page->FETYesNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FETYesNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FBetaHCGDate->Visible) { // FBetaHCGDate ?>
    <div id="r_FBetaHCGDate" class="form-group row">
        <label id="elh_monitor_treatment_plan_FBetaHCGDate" for="x_FBetaHCGDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_FBetaHCGDate"><?= $Page->FBetaHCGDate->caption() ?><?= $Page->FBetaHCGDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FBetaHCGDate->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_FBetaHCGDate"><span id="el_monitor_treatment_plan_FBetaHCGDate">
<input type="<?= $Page->FBetaHCGDate->getInputTextType() ?>" data-table="monitor_treatment_plan" data-field="x_FBetaHCGDate" data-format="7" name="x_FBetaHCGDate" id="x_FBetaHCGDate" placeholder="<?= HtmlEncode($Page->FBetaHCGDate->getPlaceHolder()) ?>" value="<?= $Page->FBetaHCGDate->EditValue ?>"<?= $Page->FBetaHCGDate->editAttributes() ?> aria-describedby="x_FBetaHCGDate_help">
<?= $Page->FBetaHCGDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FBetaHCGDate->getErrorMessage() ?></div>
<?php if (!$Page->FBetaHCGDate->ReadOnly && !$Page->FBetaHCGDate->Disabled && !isset($Page->FBetaHCGDate->EditAttrs["readonly"]) && !isset($Page->FBetaHCGDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fmonitor_treatment_planadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fmonitor_treatment_planadd", "x_FBetaHCGDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FBetaHCGYesNo->Visible) { // FBetaHCGYesNo ?>
    <div id="r_FBetaHCGYesNo" class="form-group row">
        <label id="elh_monitor_treatment_plan_FBetaHCGYesNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_monitor_treatment_plan_FBetaHCGYesNo"><?= $Page->FBetaHCGYesNo->caption() ?><?= $Page->FBetaHCGYesNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FBetaHCGYesNo->cellAttributes() ?>>
<template id="tpx_monitor_treatment_plan_FBetaHCGYesNo"><span id="el_monitor_treatment_plan_FBetaHCGYesNo">
<template id="tp_x_FBetaHCGYesNo">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="monitor_treatment_plan" data-field="x_FBetaHCGYesNo" name="x_FBetaHCGYesNo" id="x_FBetaHCGYesNo"<?= $Page->FBetaHCGYesNo->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_FBetaHCGYesNo" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_FBetaHCGYesNo[]"
    name="x_FBetaHCGYesNo[]"
    value="<?= HtmlEncode($Page->FBetaHCGYesNo->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_FBetaHCGYesNo"
    data-target="dsl_x_FBetaHCGYesNo"
    data-repeatcolumn="5"
    class="form-control<?= $Page->FBetaHCGYesNo->isInvalidClass() ?>"
    data-table="monitor_treatment_plan"
    data-field="x_FBetaHCGYesNo"
    data-value-separator="<?= $Page->FBetaHCGYesNo->displayValueSeparatorAttribute() ?>"
    <?= $Page->FBetaHCGYesNo->editAttributes() ?>>
<?= $Page->FBetaHCGYesNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FBetaHCGYesNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_monitor_treatment_planadd" class="ew-custom-template"></div>
<template id="tpm_monitor_treatment_planadd">
<div id="ct_MonitorTreatmentPlanAdd"><style>
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
.customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
}
.customers td, .customers th {
  padding: 8px;
}
</style>
<div class="row">
	<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_monitor_treatment_plan_PatId"></slot>&nbsp;<slot class="ew-slot" name="tpx_monitor_treatment_plan_PatId"></slot></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"></h3>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#229954">
				<h3 class="card-title">Patient Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
			<td><slot class="ew-slot" name="tpc_monitor_treatment_plan_PatientId"></slot>&nbsp;<slot class="ew-slot" name="tpx_monitor_treatment_plan_PatientId"></slot></td>
			<td><slot class="ew-slot" name="tpc_monitor_treatment_plan_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_monitor_treatment_plan_PatientName"></slot></td>
			<td></td>		
		</tr>
		<tr>			
			<td><slot class="ew-slot" name="tpc_monitor_treatment_plan_Age"></slot>&nbsp;<slot class="ew-slot" name="tpx_monitor_treatment_plan_Age"></slot></td>
			<td><slot class="ew-slot" name="tpc_monitor_treatment_plan_MobileNo"></slot>&nbsp;<slot class="ew-slot" name="tpx_monitor_treatment_plan_MobileNo"></slot></td>
			<td></td>
		</tr>
		<tr>
			<td><slot class="ew-slot" name="tpc_monitor_treatment_plan_ConsultantName"></slot>&nbsp;<slot class="ew-slot" name="tpx_monitor_treatment_plan_ConsultantName"></slot></td>
			<td><slot class="ew-slot" name="tpc_monitor_treatment_plan_RefDrName"></slot>&nbsp;<slot class="ew-slot" name="tpx_monitor_treatment_plan_RefDrName"></slot></td>
			<td><slot class="ew-slot" name="tpc_monitor_treatment_plan_RefDrMobileNo"></slot>&nbsp;<slot class="ew-slot" name="tpx_monitor_treatment_plan_RefDrMobileNo"></slot></td>
			<td></td>
		</tr>
		 <tr>
		 	<td><slot class="ew-slot" name="tpc_monitor_treatment_plan_NewVisitDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_monitor_treatment_plan_NewVisitDate"></slot></td>
			<td><slot class="ew-slot" name="tpc_monitor_treatment_plan_NewVisitYesNo"></slot>&nbsp;<slot class="ew-slot" name="tpx_monitor_treatment_plan_NewVisitYesNo"></slot></td>
			<td><slot class="ew-slot" name="tpc_monitor_treatment_plan_Treatment"></slot>&nbsp;<slot class="ew-slot" name="tpx_monitor_treatment_plan_Treatment"></slot></td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div id="stIUIDetails" class="">
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#D68910">
				<h3 class="card-title">1 st IUI Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table customers">
	 <tbody>
		<tr>
			<td  style="width:20%" >IUI Done Date  </td>
			<td  style="width:30%" ><slot class="ew-slot" name="tpx_monitor_treatment_plan_IUIDoneDate1"></slot></td>
			<td  style="width:30%" ><slot class="ew-slot" name="tpx_monitor_treatment_plan_IUIDoneYesNo1"></slot></td>
		</tr>
		<tr>
			<td  style="width:20%" >UPT Test Date  </td>
			<td  style="width:30%" ><slot class="ew-slot" name="tpx_monitor_treatment_plan_UPTTestDate1"></slot></td>
			<td  style="width:30%"><slot class="ew-slot" name="tpx_monitor_treatment_plan_UPTTestYesNo1"></slot></td>
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
			<div class="card-header"  style="background-color:#D68910">
				<h3 class="card-title">2 nd IUI Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table customers">
	 <tbody>
		<tr>
			<td  style="width:20%" >IUI Done Date  </td>
			<td  style="width:30%" ><slot class="ew-slot" name="tpx_monitor_treatment_plan_IUIDoneDate2"></slot></td>
			<td  style="width:30%" ><slot class="ew-slot" name="tpx_monitor_treatment_plan_IUIDoneYesNo2"></slot></td>
		</tr>
		<tr>
			<td  style="width:20%" >UPT Test Date  </td>
			<td  style="width:30%" ><slot class="ew-slot" name="tpx_monitor_treatment_plan_UPTTestDate2"></slot></td>
			<td  style="width:30%"><slot class="ew-slot" name="tpx_monitor_treatment_plan_UPTTestYesNo2"></slot></td>
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
			<div class="card-header"  style="background-color:#D68910">
				<h3 class="card-title">3 rd IUI Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table customers">
	 <tbody>
		<tr>
			<td  style="width:20%" >IUI Done Date  </td>
			<td  style="width:30%" ><slot class="ew-slot" name="tpx_monitor_treatment_plan_IUIDoneDate3"></slot></td>
			<td  style="width:30%" ><slot class="ew-slot" name="tpx_monitor_treatment_plan_IUIDoneYesNo3"></slot></td>
		</tr>
		<tr>
			<td  style="width:20%" >UPT Test Date  </td>
			<td  style="width:30%" ><slot class="ew-slot" name="tpx_monitor_treatment_plan_UPTTestDate3"></slot></td>
			<td  style="width:30%"><slot class="ew-slot" name="tpx_monitor_treatment_plan_UPTTestYesNo3"></slot></td>
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
			<div class="card-header"  style="background-color:#D68910">
				<h3 class="card-title">4 th IUI Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table customers">
	 <tbody>
		<tr>
			<td  style="width:20%" >IUI Done Date  </td>
			<td  style="width:30%" ><slot class="ew-slot" name="tpx_monitor_treatment_plan_IUIDoneDate4"></slot></td>
			<td  style="width:30%" ><slot class="ew-slot" name="tpx_monitor_treatment_plan_IUIDoneYesNo4"></slot></td>
		</tr>
		<tr>
			<td  style="width:20%" >UPT Test Date  </td>
			<td  style="width:30%" ><slot class="ew-slot" name="tpx_monitor_treatment_plan_UPTTestDate4"></slot></td>
			<td  style="width:30%"><slot class="ew-slot" name="tpx_monitor_treatment_plan_UPTTestYesNo4"></slot></td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
</div>
<div id="IVFviewBankName" class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#E706B7">
				<h3 id="viewBankDetails" class="card-title">IVF</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
	 		<tr>
			<td  style="width:20%" >IVF Stimulation Date  </td>
			<td  style="width:30%" ><slot class="ew-slot" name="tpx_monitor_treatment_plan_IVFStimulationDate"></slot></td>
			<td  style="width:30%"><slot class="ew-slot" name="tpx_monitor_treatment_plan_IVFStimulationYesNo"></slot></td>
		</tr>
				<tr>
			<td  style="width:20%" >OPU Date  </td>
			<td  style="width:30%" ><slot class="ew-slot" name="tpx_monitor_treatment_plan_OPUDate"></slot></td>
			<td  style="width:30%"><slot class="ew-slot" name="tpx_monitor_treatment_plan_OPUYesNo"></slot></td>
		</tr>
				<tr>
			<td  style="width:20%" >ET Date  </td>
			<td  style="width:30%" ><slot class="ew-slot" name="tpx_monitor_treatment_plan_ETDate"></slot></td>
			<td  style="width:30%"><slot class="ew-slot" name="tpx_monitor_treatment_plan_ETYesNo"></slot></td>
		</tr>
				<tr>
			<td  style="width:20%" >Beta HCG Date  </td>
			<td  style="width:30%" ><slot class="ew-slot" name="tpx_monitor_treatment_plan_BetaHCGDate"></slot></td>
			<td  style="width:30%"><slot class="ew-slot" name="tpx_monitor_treatment_plan_BetaHCGYesNo"></slot></td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
<div id="FETviewBankName" class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#E706B7">
				<h3 id="viewBankDetails" class="card-title">FET</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
	 		<tr>
			<td  style="width:20%" >ET Date   </td>
			<td  style="width:30%" ><slot class="ew-slot" name="tpx_monitor_treatment_plan_FETDate"></slot></td>
			<td  style="width:30%"><slot class="ew-slot" name="tpx_monitor_treatment_plan_FETYesNo"></slot></td>
		</tr>
				<tr>
			<td  style="width:20%" >Beta HCG Date   </td>
			<td  style="width:30%" ><slot class="ew-slot" name="tpx_monitor_treatment_plan_FBetaHCGDate"></slot></td>
			<td  style="width:30%"><slot class="ew-slot" name="tpx_monitor_treatment_plan_FBetaHCGYesNo"></slot></td>
		</tr>
	</tbody>
</table>
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
    ew.applyTemplate("tpd_monitor_treatment_planadd", "tpm_monitor_treatment_planadd", "monitor_treatment_planadd", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("monitor_treatment_plan");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    document.getElementById("stIUIDetails").style.display="none",document.getElementById("IVFviewBankName").style.display="none",document.getElementById("FETviewBankName").style.display="none";
});
</script>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfEtChartAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_et_chartadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fivf_et_chartadd = currentForm = new ew.Form("fivf_et_chartadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_et_chart")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_et_chart)
        ew.vars.tables.ivf_et_chart = currentTable;
    fivf_et_chartadd.addFields([
        ["RIDNo", [fields.RIDNo.visible && fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null, ew.Validators.integer], fields.RIDNo.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["ARTCycle", [fields.ARTCycle.visible && fields.ARTCycle.required ? ew.Validators.required(fields.ARTCycle.caption) : null], fields.ARTCycle.isInvalid],
        ["Consultant", [fields.Consultant.visible && fields.Consultant.required ? ew.Validators.required(fields.Consultant.caption) : null], fields.Consultant.isInvalid],
        ["InseminatinTechnique", [fields.InseminatinTechnique.visible && fields.InseminatinTechnique.required ? ew.Validators.required(fields.InseminatinTechnique.caption) : null], fields.InseminatinTechnique.isInvalid],
        ["IndicationForART", [fields.IndicationForART.visible && fields.IndicationForART.required ? ew.Validators.required(fields.IndicationForART.caption) : null], fields.IndicationForART.isInvalid],
        ["PreTreatment", [fields.PreTreatment.visible && fields.PreTreatment.required ? ew.Validators.required(fields.PreTreatment.caption) : null], fields.PreTreatment.isInvalid],
        ["Hysteroscopy", [fields.Hysteroscopy.visible && fields.Hysteroscopy.required ? ew.Validators.required(fields.Hysteroscopy.caption) : null], fields.Hysteroscopy.isInvalid],
        ["EndometrialScratching", [fields.EndometrialScratching.visible && fields.EndometrialScratching.required ? ew.Validators.required(fields.EndometrialScratching.caption) : null], fields.EndometrialScratching.isInvalid],
        ["TrialCannulation", [fields.TrialCannulation.visible && fields.TrialCannulation.required ? ew.Validators.required(fields.TrialCannulation.caption) : null], fields.TrialCannulation.isInvalid],
        ["CYCLETYPE", [fields.CYCLETYPE.visible && fields.CYCLETYPE.required ? ew.Validators.required(fields.CYCLETYPE.caption) : null], fields.CYCLETYPE.isInvalid],
        ["HRTCYCLE", [fields.HRTCYCLE.visible && fields.HRTCYCLE.required ? ew.Validators.required(fields.HRTCYCLE.caption) : null], fields.HRTCYCLE.isInvalid],
        ["OralEstrogenDosage", [fields.OralEstrogenDosage.visible && fields.OralEstrogenDosage.required ? ew.Validators.required(fields.OralEstrogenDosage.caption) : null], fields.OralEstrogenDosage.isInvalid],
        ["VaginalEstrogen", [fields.VaginalEstrogen.visible && fields.VaginalEstrogen.required ? ew.Validators.required(fields.VaginalEstrogen.caption) : null], fields.VaginalEstrogen.isInvalid],
        ["GCSF", [fields.GCSF.visible && fields.GCSF.required ? ew.Validators.required(fields.GCSF.caption) : null], fields.GCSF.isInvalid],
        ["ActivatedPRP", [fields.ActivatedPRP.visible && fields.ActivatedPRP.required ? ew.Validators.required(fields.ActivatedPRP.caption) : null], fields.ActivatedPRP.isInvalid],
        ["ERA", [fields.ERA.visible && fields.ERA.required ? ew.Validators.required(fields.ERA.caption) : null], fields.ERA.isInvalid],
        ["UCLcm", [fields.UCLcm.visible && fields.UCLcm.required ? ew.Validators.required(fields.UCLcm.caption) : null], fields.UCLcm.isInvalid],
        ["DATEOFSTART", [fields.DATEOFSTART.visible && fields.DATEOFSTART.required ? ew.Validators.required(fields.DATEOFSTART.caption) : null, ew.Validators.datetime(11)], fields.DATEOFSTART.isInvalid],
        ["DATEOFEMBRYOTRANSFER", [fields.DATEOFEMBRYOTRANSFER.visible && fields.DATEOFEMBRYOTRANSFER.required ? ew.Validators.required(fields.DATEOFEMBRYOTRANSFER.caption) : null, ew.Validators.datetime(11)], fields.DATEOFEMBRYOTRANSFER.isInvalid],
        ["DAYOFEMBRYOTRANSFER", [fields.DAYOFEMBRYOTRANSFER.visible && fields.DAYOFEMBRYOTRANSFER.required ? ew.Validators.required(fields.DAYOFEMBRYOTRANSFER.caption) : null], fields.DAYOFEMBRYOTRANSFER.isInvalid],
        ["NOOFEMBRYOSTHAWED", [fields.NOOFEMBRYOSTHAWED.visible && fields.NOOFEMBRYOSTHAWED.required ? ew.Validators.required(fields.NOOFEMBRYOSTHAWED.caption) : null], fields.NOOFEMBRYOSTHAWED.isInvalid],
        ["NOOFEMBRYOSTRANSFERRED", [fields.NOOFEMBRYOSTRANSFERRED.visible && fields.NOOFEMBRYOSTRANSFERRED.required ? ew.Validators.required(fields.NOOFEMBRYOSTRANSFERRED.caption) : null], fields.NOOFEMBRYOSTRANSFERRED.isInvalid],
        ["DAYOFEMBRYOS", [fields.DAYOFEMBRYOS.visible && fields.DAYOFEMBRYOS.required ? ew.Validators.required(fields.DAYOFEMBRYOS.caption) : null], fields.DAYOFEMBRYOS.isInvalid],
        ["CRYOPRESERVEDEMBRYOS", [fields.CRYOPRESERVEDEMBRYOS.visible && fields.CRYOPRESERVEDEMBRYOS.required ? ew.Validators.required(fields.CRYOPRESERVEDEMBRYOS.caption) : null], fields.CRYOPRESERVEDEMBRYOS.isInvalid],
        ["Code1", [fields.Code1.visible && fields.Code1.required ? ew.Validators.required(fields.Code1.caption) : null], fields.Code1.isInvalid],
        ["Code2", [fields.Code2.visible && fields.Code2.required ? ew.Validators.required(fields.Code2.caption) : null], fields.Code2.isInvalid],
        ["CellStage1", [fields.CellStage1.visible && fields.CellStage1.required ? ew.Validators.required(fields.CellStage1.caption) : null], fields.CellStage1.isInvalid],
        ["CellStage2", [fields.CellStage2.visible && fields.CellStage2.required ? ew.Validators.required(fields.CellStage2.caption) : null], fields.CellStage2.isInvalid],
        ["Grade1", [fields.Grade1.visible && fields.Grade1.required ? ew.Validators.required(fields.Grade1.caption) : null], fields.Grade1.isInvalid],
        ["Grade2", [fields.Grade2.visible && fields.Grade2.required ? ew.Validators.required(fields.Grade2.caption) : null], fields.Grade2.isInvalid],
        ["ProcedureRecord", [fields.ProcedureRecord.visible && fields.ProcedureRecord.required ? ew.Validators.required(fields.ProcedureRecord.caption) : null], fields.ProcedureRecord.isInvalid],
        ["Medicationsadvised", [fields.Medicationsadvised.visible && fields.Medicationsadvised.required ? ew.Validators.required(fields.Medicationsadvised.caption) : null], fields.Medicationsadvised.isInvalid],
        ["PostProcedureInstructions", [fields.PostProcedureInstructions.visible && fields.PostProcedureInstructions.required ? ew.Validators.required(fields.PostProcedureInstructions.caption) : null], fields.PostProcedureInstructions.isInvalid],
        ["PregnancyTestingWithSerumBetaHcG", [fields.PregnancyTestingWithSerumBetaHcG.visible && fields.PregnancyTestingWithSerumBetaHcG.required ? ew.Validators.required(fields.PregnancyTestingWithSerumBetaHcG.caption) : null], fields.PregnancyTestingWithSerumBetaHcG.isInvalid],
        ["ReviewDate", [fields.ReviewDate.visible && fields.ReviewDate.required ? ew.Validators.required(fields.ReviewDate.caption) : null, ew.Validators.datetime(0)], fields.ReviewDate.isInvalid],
        ["ReviewDoctor", [fields.ReviewDoctor.visible && fields.ReviewDoctor.required ? ew.Validators.required(fields.ReviewDoctor.caption) : null], fields.ReviewDoctor.isInvalid],
        ["TemplateProcedureRecord", [fields.TemplateProcedureRecord.visible && fields.TemplateProcedureRecord.required ? ew.Validators.required(fields.TemplateProcedureRecord.caption) : null], fields.TemplateProcedureRecord.isInvalid],
        ["TemplateMedicationsadvised", [fields.TemplateMedicationsadvised.visible && fields.TemplateMedicationsadvised.required ? ew.Validators.required(fields.TemplateMedicationsadvised.caption) : null], fields.TemplateMedicationsadvised.isInvalid],
        ["TemplatePostProcedureInstructions", [fields.TemplatePostProcedureInstructions.visible && fields.TemplatePostProcedureInstructions.required ? ew.Validators.required(fields.TemplatePostProcedureInstructions.caption) : null], fields.TemplatePostProcedureInstructions.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_et_chartadd,
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
    fivf_et_chartadd.validate = function () {
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
    fivf_et_chartadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_et_chartadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_et_chartadd.lists.ARTCycle = <?= $Page->ARTCycle->toClientList($Page) ?>;
    fivf_et_chartadd.lists.InseminatinTechnique = <?= $Page->InseminatinTechnique->toClientList($Page) ?>;
    fivf_et_chartadd.lists.PreTreatment = <?= $Page->PreTreatment->toClientList($Page) ?>;
    fivf_et_chartadd.lists.Hysteroscopy = <?= $Page->Hysteroscopy->toClientList($Page) ?>;
    fivf_et_chartadd.lists.EndometrialScratching = <?= $Page->EndometrialScratching->toClientList($Page) ?>;
    fivf_et_chartadd.lists.TrialCannulation = <?= $Page->TrialCannulation->toClientList($Page) ?>;
    fivf_et_chartadd.lists.CYCLETYPE = <?= $Page->CYCLETYPE->toClientList($Page) ?>;
    fivf_et_chartadd.lists.OralEstrogenDosage = <?= $Page->OralEstrogenDosage->toClientList($Page) ?>;
    fivf_et_chartadd.lists.GCSF = <?= $Page->GCSF->toClientList($Page) ?>;
    fivf_et_chartadd.lists.ActivatedPRP = <?= $Page->ActivatedPRP->toClientList($Page) ?>;
    fivf_et_chartadd.lists.ERA = <?= $Page->ERA->toClientList($Page) ?>;
    fivf_et_chartadd.lists.TemplateProcedureRecord = <?= $Page->TemplateProcedureRecord->toClientList($Page) ?>;
    fivf_et_chartadd.lists.TemplateMedicationsadvised = <?= $Page->TemplateMedicationsadvised->toClientList($Page) ?>;
    fivf_et_chartadd.lists.TemplatePostProcedureInstructions = <?= $Page->TemplatePostProcedureInstructions->toClientList($Page) ?>;
    loadjs.done("fivf_et_chartadd");
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
<form name="fivf_et_chartadd" id="fivf_et_chartadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_et_chart">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label id="elh_ivf_et_chart_RIDNo" for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_RIDNo"><?= $Page->RIDNo->caption() ?><?= $Page->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_RIDNo"><span id="el_ivf_et_chart_RIDNo">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?> aria-describedby="x_RIDNo_help">
<?= $Page->RIDNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_et_chart_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_Name"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_Name"><span id="el_ivf_et_chart_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
    <div id="r_ARTCycle" class="form-group row">
        <label id="elh_ivf_et_chart_ARTCycle" for="x_ARTCycle" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_ARTCycle"><?= $Page->ARTCycle->caption() ?><?= $Page->ARTCycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ARTCycle->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_ARTCycle"><span id="el_ivf_et_chart_ARTCycle">
    <select
        id="x_ARTCycle"
        name="x_ARTCycle"
        class="form-control ew-select<?= $Page->ARTCycle->isInvalidClass() ?>"
        data-select2-id="ivf_et_chart_x_ARTCycle"
        data-table="ivf_et_chart"
        data-field="x_ARTCycle"
        data-value-separator="<?= $Page->ARTCycle->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ARTCycle->getPlaceHolder()) ?>"
        <?= $Page->ARTCycle->editAttributes() ?>>
        <?= $Page->ARTCycle->selectOptionListHtml("x_ARTCycle") ?>
    </select>
    <?= $Page->ARTCycle->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ARTCycle->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_et_chart_x_ARTCycle']"),
        options = { name: "x_ARTCycle", selectId: "ivf_et_chart_x_ARTCycle", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_et_chart.fields.ARTCycle.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_et_chart.fields.ARTCycle.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <div id="r_Consultant" class="form-group row">
        <label id="elh_ivf_et_chart_Consultant" for="x_Consultant" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_Consultant"><?= $Page->Consultant->caption() ?><?= $Page->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Consultant->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_Consultant"><span id="el_ivf_et_chart_Consultant">
<input type="<?= $Page->Consultant->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Consultant->getPlaceHolder()) ?>" value="<?= $Page->Consultant->EditValue ?>"<?= $Page->Consultant->editAttributes() ?> aria-describedby="x_Consultant_help">
<?= $Page->Consultant->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Consultant->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
    <div id="r_InseminatinTechnique" class="form-group row">
        <label id="elh_ivf_et_chart_InseminatinTechnique" for="x_InseminatinTechnique" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_InseminatinTechnique"><?= $Page->InseminatinTechnique->caption() ?><?= $Page->InseminatinTechnique->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_InseminatinTechnique"><span id="el_ivf_et_chart_InseminatinTechnique">
    <select
        id="x_InseminatinTechnique"
        name="x_InseminatinTechnique"
        class="form-control ew-select<?= $Page->InseminatinTechnique->isInvalidClass() ?>"
        data-select2-id="ivf_et_chart_x_InseminatinTechnique"
        data-table="ivf_et_chart"
        data-field="x_InseminatinTechnique"
        data-value-separator="<?= $Page->InseminatinTechnique->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->InseminatinTechnique->getPlaceHolder()) ?>"
        <?= $Page->InseminatinTechnique->editAttributes() ?>>
        <?= $Page->InseminatinTechnique->selectOptionListHtml("x_InseminatinTechnique") ?>
    </select>
    <?= $Page->InseminatinTechnique->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->InseminatinTechnique->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_et_chart_x_InseminatinTechnique']"),
        options = { name: "x_InseminatinTechnique", selectId: "ivf_et_chart_x_InseminatinTechnique", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_et_chart.fields.InseminatinTechnique.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_et_chart.fields.InseminatinTechnique.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
    <div id="r_IndicationForART" class="form-group row">
        <label id="elh_ivf_et_chart_IndicationForART" for="x_IndicationForART" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_IndicationForART"><?= $Page->IndicationForART->caption() ?><?= $Page->IndicationForART->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IndicationForART->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_IndicationForART"><span id="el_ivf_et_chart_IndicationForART">
<input type="<?= $Page->IndicationForART->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_IndicationForART" name="x_IndicationForART" id="x_IndicationForART" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IndicationForART->getPlaceHolder()) ?>" value="<?= $Page->IndicationForART->EditValue ?>"<?= $Page->IndicationForART->editAttributes() ?> aria-describedby="x_IndicationForART_help">
<?= $Page->IndicationForART->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IndicationForART->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreTreatment->Visible) { // PreTreatment ?>
    <div id="r_PreTreatment" class="form-group row">
        <label id="elh_ivf_et_chart_PreTreatment" for="x_PreTreatment" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_PreTreatment"><?= $Page->PreTreatment->caption() ?><?= $Page->PreTreatment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreTreatment->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_PreTreatment"><span id="el_ivf_et_chart_PreTreatment">
    <select
        id="x_PreTreatment"
        name="x_PreTreatment"
        class="form-control ew-select<?= $Page->PreTreatment->isInvalidClass() ?>"
        data-select2-id="ivf_et_chart_x_PreTreatment"
        data-table="ivf_et_chart"
        data-field="x_PreTreatment"
        data-value-separator="<?= $Page->PreTreatment->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PreTreatment->getPlaceHolder()) ?>"
        <?= $Page->PreTreatment->editAttributes() ?>>
        <?= $Page->PreTreatment->selectOptionListHtml("x_PreTreatment") ?>
    </select>
    <?= $Page->PreTreatment->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->PreTreatment->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_et_chart_x_PreTreatment']"),
        options = { name: "x_PreTreatment", selectId: "ivf_et_chart_x_PreTreatment", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_et_chart.fields.PreTreatment.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_et_chart.fields.PreTreatment.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
    <div id="r_Hysteroscopy" class="form-group row">
        <label id="elh_ivf_et_chart_Hysteroscopy" for="x_Hysteroscopy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_Hysteroscopy"><?= $Page->Hysteroscopy->caption() ?><?= $Page->Hysteroscopy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Hysteroscopy->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_Hysteroscopy"><span id="el_ivf_et_chart_Hysteroscopy">
    <select
        id="x_Hysteroscopy"
        name="x_Hysteroscopy"
        class="form-control ew-select<?= $Page->Hysteroscopy->isInvalidClass() ?>"
        data-select2-id="ivf_et_chart_x_Hysteroscopy"
        data-table="ivf_et_chart"
        data-field="x_Hysteroscopy"
        data-value-separator="<?= $Page->Hysteroscopy->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Hysteroscopy->getPlaceHolder()) ?>"
        <?= $Page->Hysteroscopy->editAttributes() ?>>
        <?= $Page->Hysteroscopy->selectOptionListHtml("x_Hysteroscopy") ?>
    </select>
    <?= $Page->Hysteroscopy->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Hysteroscopy->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_et_chart_x_Hysteroscopy']"),
        options = { name: "x_Hysteroscopy", selectId: "ivf_et_chart_x_Hysteroscopy", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_et_chart.fields.Hysteroscopy.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_et_chart.fields.Hysteroscopy.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EndometrialScratching->Visible) { // EndometrialScratching ?>
    <div id="r_EndometrialScratching" class="form-group row">
        <label id="elh_ivf_et_chart_EndometrialScratching" for="x_EndometrialScratching" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_EndometrialScratching"><?= $Page->EndometrialScratching->caption() ?><?= $Page->EndometrialScratching->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EndometrialScratching->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_EndometrialScratching"><span id="el_ivf_et_chart_EndometrialScratching">
    <select
        id="x_EndometrialScratching"
        name="x_EndometrialScratching"
        class="form-control ew-select<?= $Page->EndometrialScratching->isInvalidClass() ?>"
        data-select2-id="ivf_et_chart_x_EndometrialScratching"
        data-table="ivf_et_chart"
        data-field="x_EndometrialScratching"
        data-value-separator="<?= $Page->EndometrialScratching->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->EndometrialScratching->getPlaceHolder()) ?>"
        <?= $Page->EndometrialScratching->editAttributes() ?>>
        <?= $Page->EndometrialScratching->selectOptionListHtml("x_EndometrialScratching") ?>
    </select>
    <?= $Page->EndometrialScratching->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->EndometrialScratching->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_et_chart_x_EndometrialScratching']"),
        options = { name: "x_EndometrialScratching", selectId: "ivf_et_chart_x_EndometrialScratching", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_et_chart.fields.EndometrialScratching.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_et_chart.fields.EndometrialScratching.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
    <div id="r_TrialCannulation" class="form-group row">
        <label id="elh_ivf_et_chart_TrialCannulation" for="x_TrialCannulation" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_TrialCannulation"><?= $Page->TrialCannulation->caption() ?><?= $Page->TrialCannulation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TrialCannulation->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_TrialCannulation"><span id="el_ivf_et_chart_TrialCannulation">
    <select
        id="x_TrialCannulation"
        name="x_TrialCannulation"
        class="form-control ew-select<?= $Page->TrialCannulation->isInvalidClass() ?>"
        data-select2-id="ivf_et_chart_x_TrialCannulation"
        data-table="ivf_et_chart"
        data-field="x_TrialCannulation"
        data-value-separator="<?= $Page->TrialCannulation->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TrialCannulation->getPlaceHolder()) ?>"
        <?= $Page->TrialCannulation->editAttributes() ?>>
        <?= $Page->TrialCannulation->selectOptionListHtml("x_TrialCannulation") ?>
    </select>
    <?= $Page->TrialCannulation->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->TrialCannulation->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_et_chart_x_TrialCannulation']"),
        options = { name: "x_TrialCannulation", selectId: "ivf_et_chart_x_TrialCannulation", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_et_chart.fields.TrialCannulation.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_et_chart.fields.TrialCannulation.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CYCLETYPE->Visible) { // CYCLETYPE ?>
    <div id="r_CYCLETYPE" class="form-group row">
        <label id="elh_ivf_et_chart_CYCLETYPE" for="x_CYCLETYPE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_CYCLETYPE"><?= $Page->CYCLETYPE->caption() ?><?= $Page->CYCLETYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CYCLETYPE->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_CYCLETYPE"><span id="el_ivf_et_chart_CYCLETYPE">
    <select
        id="x_CYCLETYPE"
        name="x_CYCLETYPE"
        class="form-control ew-select<?= $Page->CYCLETYPE->isInvalidClass() ?>"
        data-select2-id="ivf_et_chart_x_CYCLETYPE"
        data-table="ivf_et_chart"
        data-field="x_CYCLETYPE"
        data-value-separator="<?= $Page->CYCLETYPE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->CYCLETYPE->getPlaceHolder()) ?>"
        <?= $Page->CYCLETYPE->editAttributes() ?>>
        <?= $Page->CYCLETYPE->selectOptionListHtml("x_CYCLETYPE") ?>
    </select>
    <?= $Page->CYCLETYPE->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->CYCLETYPE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_et_chart_x_CYCLETYPE']"),
        options = { name: "x_CYCLETYPE", selectId: "ivf_et_chart_x_CYCLETYPE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_et_chart.fields.CYCLETYPE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_et_chart.fields.CYCLETYPE.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HRTCYCLE->Visible) { // HRTCYCLE ?>
    <div id="r_HRTCYCLE" class="form-group row">
        <label id="elh_ivf_et_chart_HRTCYCLE" for="x_HRTCYCLE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_HRTCYCLE"><?= $Page->HRTCYCLE->caption() ?><?= $Page->HRTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HRTCYCLE->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_HRTCYCLE"><span id="el_ivf_et_chart_HRTCYCLE">
<input type="<?= $Page->HRTCYCLE->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_HRTCYCLE" name="x_HRTCYCLE" id="x_HRTCYCLE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HRTCYCLE->getPlaceHolder()) ?>" value="<?= $Page->HRTCYCLE->EditValue ?>"<?= $Page->HRTCYCLE->editAttributes() ?> aria-describedby="x_HRTCYCLE_help">
<?= $Page->HRTCYCLE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HRTCYCLE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
    <div id="r_OralEstrogenDosage" class="form-group row">
        <label id="elh_ivf_et_chart_OralEstrogenDosage" for="x_OralEstrogenDosage" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_OralEstrogenDosage"><?= $Page->OralEstrogenDosage->caption() ?><?= $Page->OralEstrogenDosage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OralEstrogenDosage->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_OralEstrogenDosage"><span id="el_ivf_et_chart_OralEstrogenDosage">
    <select
        id="x_OralEstrogenDosage"
        name="x_OralEstrogenDosage"
        class="form-control ew-select<?= $Page->OralEstrogenDosage->isInvalidClass() ?>"
        data-select2-id="ivf_et_chart_x_OralEstrogenDosage"
        data-table="ivf_et_chart"
        data-field="x_OralEstrogenDosage"
        data-value-separator="<?= $Page->OralEstrogenDosage->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->OralEstrogenDosage->getPlaceHolder()) ?>"
        <?= $Page->OralEstrogenDosage->editAttributes() ?>>
        <?= $Page->OralEstrogenDosage->selectOptionListHtml("x_OralEstrogenDosage") ?>
    </select>
    <?= $Page->OralEstrogenDosage->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->OralEstrogenDosage->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_et_chart_x_OralEstrogenDosage']"),
        options = { name: "x_OralEstrogenDosage", selectId: "ivf_et_chart_x_OralEstrogenDosage", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_et_chart.fields.OralEstrogenDosage.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_et_chart.fields.OralEstrogenDosage.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
    <div id="r_VaginalEstrogen" class="form-group row">
        <label id="elh_ivf_et_chart_VaginalEstrogen" for="x_VaginalEstrogen" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_VaginalEstrogen"><?= $Page->VaginalEstrogen->caption() ?><?= $Page->VaginalEstrogen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VaginalEstrogen->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_VaginalEstrogen"><span id="el_ivf_et_chart_VaginalEstrogen">
<input type="<?= $Page->VaginalEstrogen->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_VaginalEstrogen" name="x_VaginalEstrogen" id="x_VaginalEstrogen" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VaginalEstrogen->getPlaceHolder()) ?>" value="<?= $Page->VaginalEstrogen->EditValue ?>"<?= $Page->VaginalEstrogen->editAttributes() ?> aria-describedby="x_VaginalEstrogen_help">
<?= $Page->VaginalEstrogen->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->VaginalEstrogen->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GCSF->Visible) { // GCSF ?>
    <div id="r_GCSF" class="form-group row">
        <label id="elh_ivf_et_chart_GCSF" for="x_GCSF" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_GCSF"><?= $Page->GCSF->caption() ?><?= $Page->GCSF->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GCSF->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_GCSF"><span id="el_ivf_et_chart_GCSF">
    <select
        id="x_GCSF"
        name="x_GCSF"
        class="form-control ew-select<?= $Page->GCSF->isInvalidClass() ?>"
        data-select2-id="ivf_et_chart_x_GCSF"
        data-table="ivf_et_chart"
        data-field="x_GCSF"
        data-value-separator="<?= $Page->GCSF->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->GCSF->getPlaceHolder()) ?>"
        <?= $Page->GCSF->editAttributes() ?>>
        <?= $Page->GCSF->selectOptionListHtml("x_GCSF") ?>
    </select>
    <?= $Page->GCSF->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->GCSF->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_et_chart_x_GCSF']"),
        options = { name: "x_GCSF", selectId: "ivf_et_chart_x_GCSF", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_et_chart.fields.GCSF.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_et_chart.fields.GCSF.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ActivatedPRP->Visible) { // ActivatedPRP ?>
    <div id="r_ActivatedPRP" class="form-group row">
        <label id="elh_ivf_et_chart_ActivatedPRP" for="x_ActivatedPRP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_ActivatedPRP"><?= $Page->ActivatedPRP->caption() ?><?= $Page->ActivatedPRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ActivatedPRP->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_ActivatedPRP"><span id="el_ivf_et_chart_ActivatedPRP">
    <select
        id="x_ActivatedPRP"
        name="x_ActivatedPRP"
        class="form-control ew-select<?= $Page->ActivatedPRP->isInvalidClass() ?>"
        data-select2-id="ivf_et_chart_x_ActivatedPRP"
        data-table="ivf_et_chart"
        data-field="x_ActivatedPRP"
        data-value-separator="<?= $Page->ActivatedPRP->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ActivatedPRP->getPlaceHolder()) ?>"
        <?= $Page->ActivatedPRP->editAttributes() ?>>
        <?= $Page->ActivatedPRP->selectOptionListHtml("x_ActivatedPRP") ?>
    </select>
    <?= $Page->ActivatedPRP->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ActivatedPRP->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_et_chart_x_ActivatedPRP']"),
        options = { name: "x_ActivatedPRP", selectId: "ivf_et_chart_x_ActivatedPRP", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_et_chart.fields.ActivatedPRP.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_et_chart.fields.ActivatedPRP.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ERA->Visible) { // ERA ?>
    <div id="r_ERA" class="form-group row">
        <label id="elh_ivf_et_chart_ERA" for="x_ERA" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_ERA"><?= $Page->ERA->caption() ?><?= $Page->ERA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ERA->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_ERA"><span id="el_ivf_et_chart_ERA">
    <select
        id="x_ERA"
        name="x_ERA"
        class="form-control ew-select<?= $Page->ERA->isInvalidClass() ?>"
        data-select2-id="ivf_et_chart_x_ERA"
        data-table="ivf_et_chart"
        data-field="x_ERA"
        data-value-separator="<?= $Page->ERA->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->ERA->getPlaceHolder()) ?>"
        <?= $Page->ERA->editAttributes() ?>>
        <?= $Page->ERA->selectOptionListHtml("x_ERA") ?>
    </select>
    <?= $Page->ERA->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->ERA->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_et_chart_x_ERA']"),
        options = { name: "x_ERA", selectId: "ivf_et_chart_x_ERA", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_et_chart.fields.ERA.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_et_chart.fields.ERA.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UCLcm->Visible) { // UCLcm ?>
    <div id="r_UCLcm" class="form-group row">
        <label id="elh_ivf_et_chart_UCLcm" for="x_UCLcm" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_UCLcm"><?= $Page->UCLcm->caption() ?><?= $Page->UCLcm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UCLcm->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_UCLcm"><span id="el_ivf_et_chart_UCLcm">
<input type="<?= $Page->UCLcm->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_UCLcm" name="x_UCLcm" id="x_UCLcm" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UCLcm->getPlaceHolder()) ?>" value="<?= $Page->UCLcm->EditValue ?>"<?= $Page->UCLcm->editAttributes() ?> aria-describedby="x_UCLcm_help">
<?= $Page->UCLcm->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UCLcm->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DATEOFSTART->Visible) { // DATEOFSTART ?>
    <div id="r_DATEOFSTART" class="form-group row">
        <label id="elh_ivf_et_chart_DATEOFSTART" for="x_DATEOFSTART" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_DATEOFSTART"><?= $Page->DATEOFSTART->caption() ?><?= $Page->DATEOFSTART->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DATEOFSTART->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_DATEOFSTART"><span id="el_ivf_et_chart_DATEOFSTART">
<input type="<?= $Page->DATEOFSTART->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_DATEOFSTART" data-format="11" name="x_DATEOFSTART" id="x_DATEOFSTART" placeholder="<?= HtmlEncode($Page->DATEOFSTART->getPlaceHolder()) ?>" value="<?= $Page->DATEOFSTART->EditValue ?>"<?= $Page->DATEOFSTART->editAttributes() ?> aria-describedby="x_DATEOFSTART_help">
<?= $Page->DATEOFSTART->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DATEOFSTART->getErrorMessage() ?></div>
<?php if (!$Page->DATEOFSTART->ReadOnly && !$Page->DATEOFSTART->Disabled && !isset($Page->DATEOFSTART->EditAttrs["readonly"]) && !isset($Page->DATEOFSTART->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_et_chartadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_et_chartadd", "x_DATEOFSTART", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
    <div id="r_DATEOFEMBRYOTRANSFER" class="form-group row">
        <label id="elh_ivf_et_chart_DATEOFEMBRYOTRANSFER" for="x_DATEOFEMBRYOTRANSFER" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_DATEOFEMBRYOTRANSFER"><?= $Page->DATEOFEMBRYOTRANSFER->caption() ?><?= $Page->DATEOFEMBRYOTRANSFER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DATEOFEMBRYOTRANSFER->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_DATEOFEMBRYOTRANSFER"><span id="el_ivf_et_chart_DATEOFEMBRYOTRANSFER">
<input type="<?= $Page->DATEOFEMBRYOTRANSFER->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_DATEOFEMBRYOTRANSFER" data-format="11" name="x_DATEOFEMBRYOTRANSFER" id="x_DATEOFEMBRYOTRANSFER" placeholder="<?= HtmlEncode($Page->DATEOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?= $Page->DATEOFEMBRYOTRANSFER->EditValue ?>"<?= $Page->DATEOFEMBRYOTRANSFER->editAttributes() ?> aria-describedby="x_DATEOFEMBRYOTRANSFER_help">
<?= $Page->DATEOFEMBRYOTRANSFER->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DATEOFEMBRYOTRANSFER->getErrorMessage() ?></div>
<?php if (!$Page->DATEOFEMBRYOTRANSFER->ReadOnly && !$Page->DATEOFEMBRYOTRANSFER->Disabled && !isset($Page->DATEOFEMBRYOTRANSFER->EditAttrs["readonly"]) && !isset($Page->DATEOFEMBRYOTRANSFER->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_et_chartadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_et_chartadd", "x_DATEOFEMBRYOTRANSFER", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
    <div id="r_DAYOFEMBRYOTRANSFER" class="form-group row">
        <label id="elh_ivf_et_chart_DAYOFEMBRYOTRANSFER" for="x_DAYOFEMBRYOTRANSFER" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_DAYOFEMBRYOTRANSFER"><?= $Page->DAYOFEMBRYOTRANSFER->caption() ?><?= $Page->DAYOFEMBRYOTRANSFER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_DAYOFEMBRYOTRANSFER"><span id="el_ivf_et_chart_DAYOFEMBRYOTRANSFER">
<input type="<?= $Page->DAYOFEMBRYOTRANSFER->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOTRANSFER" name="x_DAYOFEMBRYOTRANSFER" id="x_DAYOFEMBRYOTRANSFER" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DAYOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?= $Page->DAYOFEMBRYOTRANSFER->EditValue ?>"<?= $Page->DAYOFEMBRYOTRANSFER->editAttributes() ?> aria-describedby="x_DAYOFEMBRYOTRANSFER_help">
<?= $Page->DAYOFEMBRYOTRANSFER->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DAYOFEMBRYOTRANSFER->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
    <div id="r_NOOFEMBRYOSTHAWED" class="form-group row">
        <label id="elh_ivf_et_chart_NOOFEMBRYOSTHAWED" for="x_NOOFEMBRYOSTHAWED" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_NOOFEMBRYOSTHAWED"><?= $Page->NOOFEMBRYOSTHAWED->caption() ?><?= $Page->NOOFEMBRYOSTHAWED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_NOOFEMBRYOSTHAWED"><span id="el_ivf_et_chart_NOOFEMBRYOSTHAWED">
<input type="<?= $Page->NOOFEMBRYOSTHAWED->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTHAWED" name="x_NOOFEMBRYOSTHAWED" id="x_NOOFEMBRYOSTHAWED" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NOOFEMBRYOSTHAWED->getPlaceHolder()) ?>" value="<?= $Page->NOOFEMBRYOSTHAWED->EditValue ?>"<?= $Page->NOOFEMBRYOSTHAWED->editAttributes() ?> aria-describedby="x_NOOFEMBRYOSTHAWED_help">
<?= $Page->NOOFEMBRYOSTHAWED->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NOOFEMBRYOSTHAWED->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
    <div id="r_NOOFEMBRYOSTRANSFERRED" class="form-group row">
        <label id="elh_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" for="x_NOOFEMBRYOSTRANSFERRED" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_NOOFEMBRYOSTRANSFERRED"><?= $Page->NOOFEMBRYOSTRANSFERRED->caption() ?><?= $Page->NOOFEMBRYOSTRANSFERRED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_NOOFEMBRYOSTRANSFERRED"><span id="el_ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
<input type="<?= $Page->NOOFEMBRYOSTRANSFERRED->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTRANSFERRED" name="x_NOOFEMBRYOSTRANSFERRED" id="x_NOOFEMBRYOSTRANSFERRED" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NOOFEMBRYOSTRANSFERRED->getPlaceHolder()) ?>" value="<?= $Page->NOOFEMBRYOSTRANSFERRED->EditValue ?>"<?= $Page->NOOFEMBRYOSTRANSFERRED->editAttributes() ?> aria-describedby="x_NOOFEMBRYOSTRANSFERRED_help">
<?= $Page->NOOFEMBRYOSTRANSFERRED->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NOOFEMBRYOSTRANSFERRED->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
    <div id="r_DAYOFEMBRYOS" class="form-group row">
        <label id="elh_ivf_et_chart_DAYOFEMBRYOS" for="x_DAYOFEMBRYOS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_DAYOFEMBRYOS"><?= $Page->DAYOFEMBRYOS->caption() ?><?= $Page->DAYOFEMBRYOS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DAYOFEMBRYOS->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_DAYOFEMBRYOS"><span id="el_ivf_et_chart_DAYOFEMBRYOS">
<input type="<?= $Page->DAYOFEMBRYOS->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOS" name="x_DAYOFEMBRYOS" id="x_DAYOFEMBRYOS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DAYOFEMBRYOS->getPlaceHolder()) ?>" value="<?= $Page->DAYOFEMBRYOS->EditValue ?>"<?= $Page->DAYOFEMBRYOS->editAttributes() ?> aria-describedby="x_DAYOFEMBRYOS_help">
<?= $Page->DAYOFEMBRYOS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DAYOFEMBRYOS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
    <div id="r_CRYOPRESERVEDEMBRYOS" class="form-group row">
        <label id="elh_ivf_et_chart_CRYOPRESERVEDEMBRYOS" for="x_CRYOPRESERVEDEMBRYOS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_CRYOPRESERVEDEMBRYOS"><?= $Page->CRYOPRESERVEDEMBRYOS->caption() ?><?= $Page->CRYOPRESERVEDEMBRYOS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_CRYOPRESERVEDEMBRYOS"><span id="el_ivf_et_chart_CRYOPRESERVEDEMBRYOS">
<input type="<?= $Page->CRYOPRESERVEDEMBRYOS->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_CRYOPRESERVEDEMBRYOS" name="x_CRYOPRESERVEDEMBRYOS" id="x_CRYOPRESERVEDEMBRYOS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CRYOPRESERVEDEMBRYOS->getPlaceHolder()) ?>" value="<?= $Page->CRYOPRESERVEDEMBRYOS->EditValue ?>"<?= $Page->CRYOPRESERVEDEMBRYOS->editAttributes() ?> aria-describedby="x_CRYOPRESERVEDEMBRYOS_help">
<?= $Page->CRYOPRESERVEDEMBRYOS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CRYOPRESERVEDEMBRYOS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Code1->Visible) { // Code1 ?>
    <div id="r_Code1" class="form-group row">
        <label id="elh_ivf_et_chart_Code1" for="x_Code1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_Code1"><?= $Page->Code1->caption() ?><?= $Page->Code1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Code1->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_Code1"><span id="el_ivf_et_chart_Code1">
<input type="<?= $Page->Code1->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_Code1" name="x_Code1" id="x_Code1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Code1->getPlaceHolder()) ?>" value="<?= $Page->Code1->EditValue ?>"<?= $Page->Code1->editAttributes() ?> aria-describedby="x_Code1_help">
<?= $Page->Code1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Code1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Code2->Visible) { // Code2 ?>
    <div id="r_Code2" class="form-group row">
        <label id="elh_ivf_et_chart_Code2" for="x_Code2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_Code2"><?= $Page->Code2->caption() ?><?= $Page->Code2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Code2->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_Code2"><span id="el_ivf_et_chart_Code2">
<input type="<?= $Page->Code2->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_Code2" name="x_Code2" id="x_Code2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Code2->getPlaceHolder()) ?>" value="<?= $Page->Code2->EditValue ?>"<?= $Page->Code2->editAttributes() ?> aria-describedby="x_Code2_help">
<?= $Page->Code2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Code2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CellStage1->Visible) { // CellStage1 ?>
    <div id="r_CellStage1" class="form-group row">
        <label id="elh_ivf_et_chart_CellStage1" for="x_CellStage1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_CellStage1"><?= $Page->CellStage1->caption() ?><?= $Page->CellStage1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CellStage1->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_CellStage1"><span id="el_ivf_et_chart_CellStage1">
<input type="<?= $Page->CellStage1->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_CellStage1" name="x_CellStage1" id="x_CellStage1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CellStage1->getPlaceHolder()) ?>" value="<?= $Page->CellStage1->EditValue ?>"<?= $Page->CellStage1->editAttributes() ?> aria-describedby="x_CellStage1_help">
<?= $Page->CellStage1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CellStage1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CellStage2->Visible) { // CellStage2 ?>
    <div id="r_CellStage2" class="form-group row">
        <label id="elh_ivf_et_chart_CellStage2" for="x_CellStage2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_CellStage2"><?= $Page->CellStage2->caption() ?><?= $Page->CellStage2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CellStage2->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_CellStage2"><span id="el_ivf_et_chart_CellStage2">
<input type="<?= $Page->CellStage2->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_CellStage2" name="x_CellStage2" id="x_CellStage2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CellStage2->getPlaceHolder()) ?>" value="<?= $Page->CellStage2->EditValue ?>"<?= $Page->CellStage2->editAttributes() ?> aria-describedby="x_CellStage2_help">
<?= $Page->CellStage2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CellStage2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Grade1->Visible) { // Grade1 ?>
    <div id="r_Grade1" class="form-group row">
        <label id="elh_ivf_et_chart_Grade1" for="x_Grade1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_Grade1"><?= $Page->Grade1->caption() ?><?= $Page->Grade1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Grade1->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_Grade1"><span id="el_ivf_et_chart_Grade1">
<input type="<?= $Page->Grade1->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_Grade1" name="x_Grade1" id="x_Grade1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Grade1->getPlaceHolder()) ?>" value="<?= $Page->Grade1->EditValue ?>"<?= $Page->Grade1->editAttributes() ?> aria-describedby="x_Grade1_help">
<?= $Page->Grade1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Grade1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Grade2->Visible) { // Grade2 ?>
    <div id="r_Grade2" class="form-group row">
        <label id="elh_ivf_et_chart_Grade2" for="x_Grade2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_Grade2"><?= $Page->Grade2->caption() ?><?= $Page->Grade2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Grade2->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_Grade2"><span id="el_ivf_et_chart_Grade2">
<input type="<?= $Page->Grade2->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_Grade2" name="x_Grade2" id="x_Grade2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Grade2->getPlaceHolder()) ?>" value="<?= $Page->Grade2->EditValue ?>"<?= $Page->Grade2->editAttributes() ?> aria-describedby="x_Grade2_help">
<?= $Page->Grade2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Grade2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureRecord->Visible) { // ProcedureRecord ?>
    <div id="r_ProcedureRecord" class="form-group row">
        <label id="elh_ivf_et_chart_ProcedureRecord" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_ProcedureRecord"><?= $Page->ProcedureRecord->caption() ?><?= $Page->ProcedureRecord->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureRecord->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_ProcedureRecord"><span id="el_ivf_et_chart_ProcedureRecord">
<?php $Page->ProcedureRecord->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_et_chart" data-field="x_ProcedureRecord" name="x_ProcedureRecord" id="x_ProcedureRecord" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->ProcedureRecord->getPlaceHolder()) ?>"<?= $Page->ProcedureRecord->editAttributes() ?> aria-describedby="x_ProcedureRecord_help"><?= $Page->ProcedureRecord->EditValue ?></textarea>
<?= $Page->ProcedureRecord->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProcedureRecord->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_et_chartadd", "editor"], function() {
	ew.createEditor("fivf_et_chartadd", "x_ProcedureRecord", 35, 4, <?= $Page->ProcedureRecord->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Medicationsadvised->Visible) { // Medicationsadvised ?>
    <div id="r_Medicationsadvised" class="form-group row">
        <label id="elh_ivf_et_chart_Medicationsadvised" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_Medicationsadvised"><?= $Page->Medicationsadvised->caption() ?><?= $Page->Medicationsadvised->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Medicationsadvised->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_Medicationsadvised"><span id="el_ivf_et_chart_Medicationsadvised">
<?php $Page->Medicationsadvised->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_et_chart" data-field="x_Medicationsadvised" name="x_Medicationsadvised" id="x_Medicationsadvised" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Medicationsadvised->getPlaceHolder()) ?>"<?= $Page->Medicationsadvised->editAttributes() ?> aria-describedby="x_Medicationsadvised_help"><?= $Page->Medicationsadvised->EditValue ?></textarea>
<?= $Page->Medicationsadvised->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Medicationsadvised->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_et_chartadd", "editor"], function() {
	ew.createEditor("fivf_et_chartadd", "x_Medicationsadvised", 35, 4, <?= $Page->Medicationsadvised->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PostProcedureInstructions->Visible) { // PostProcedureInstructions ?>
    <div id="r_PostProcedureInstructions" class="form-group row">
        <label id="elh_ivf_et_chart_PostProcedureInstructions" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_PostProcedureInstructions"><?= $Page->PostProcedureInstructions->caption() ?><?= $Page->PostProcedureInstructions->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PostProcedureInstructions->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_PostProcedureInstructions"><span id="el_ivf_et_chart_PostProcedureInstructions">
<?php $Page->PostProcedureInstructions->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_et_chart" data-field="x_PostProcedureInstructions" name="x_PostProcedureInstructions" id="x_PostProcedureInstructions" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->PostProcedureInstructions->getPlaceHolder()) ?>"<?= $Page->PostProcedureInstructions->editAttributes() ?> aria-describedby="x_PostProcedureInstructions_help"><?= $Page->PostProcedureInstructions->EditValue ?></textarea>
<?= $Page->PostProcedureInstructions->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PostProcedureInstructions->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_et_chartadd", "editor"], function() {
	ew.createEditor("fivf_et_chartadd", "x_PostProcedureInstructions", 35, 4, <?= $Page->PostProcedureInstructions->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
    <div id="r_PregnancyTestingWithSerumBetaHcG" class="form-group row">
        <label id="elh_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" for="x_PregnancyTestingWithSerumBetaHcG" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_PregnancyTestingWithSerumBetaHcG"><?= $Page->PregnancyTestingWithSerumBetaHcG->caption() ?><?= $Page->PregnancyTestingWithSerumBetaHcG->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PregnancyTestingWithSerumBetaHcG->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_PregnancyTestingWithSerumBetaHcG"><span id="el_ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
<input type="<?= $Page->PregnancyTestingWithSerumBetaHcG->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_PregnancyTestingWithSerumBetaHcG" name="x_PregnancyTestingWithSerumBetaHcG" id="x_PregnancyTestingWithSerumBetaHcG" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PregnancyTestingWithSerumBetaHcG->getPlaceHolder()) ?>" value="<?= $Page->PregnancyTestingWithSerumBetaHcG->EditValue ?>"<?= $Page->PregnancyTestingWithSerumBetaHcG->editAttributes() ?> aria-describedby="x_PregnancyTestingWithSerumBetaHcG_help">
<?= $Page->PregnancyTestingWithSerumBetaHcG->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PregnancyTestingWithSerumBetaHcG->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReviewDate->Visible) { // ReviewDate ?>
    <div id="r_ReviewDate" class="form-group row">
        <label id="elh_ivf_et_chart_ReviewDate" for="x_ReviewDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_ReviewDate"><?= $Page->ReviewDate->caption() ?><?= $Page->ReviewDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReviewDate->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_ReviewDate"><span id="el_ivf_et_chart_ReviewDate">
<input type="<?= $Page->ReviewDate->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_ReviewDate" name="x_ReviewDate" id="x_ReviewDate" placeholder="<?= HtmlEncode($Page->ReviewDate->getPlaceHolder()) ?>" value="<?= $Page->ReviewDate->EditValue ?>"<?= $Page->ReviewDate->editAttributes() ?> aria-describedby="x_ReviewDate_help">
<?= $Page->ReviewDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReviewDate->getErrorMessage() ?></div>
<?php if (!$Page->ReviewDate->ReadOnly && !$Page->ReviewDate->Disabled && !isset($Page->ReviewDate->EditAttrs["readonly"]) && !isset($Page->ReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_et_chartadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_et_chartadd", "x_ReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReviewDoctor->Visible) { // ReviewDoctor ?>
    <div id="r_ReviewDoctor" class="form-group row">
        <label id="elh_ivf_et_chart_ReviewDoctor" for="x_ReviewDoctor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_ReviewDoctor"><?= $Page->ReviewDoctor->caption() ?><?= $Page->ReviewDoctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReviewDoctor->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_ReviewDoctor"><span id="el_ivf_et_chart_ReviewDoctor">
<input type="<?= $Page->ReviewDoctor->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_ReviewDoctor" name="x_ReviewDoctor" id="x_ReviewDoctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReviewDoctor->getPlaceHolder()) ?>" value="<?= $Page->ReviewDoctor->EditValue ?>"<?= $Page->ReviewDoctor->editAttributes() ?> aria-describedby="x_ReviewDoctor_help">
<?= $Page->ReviewDoctor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReviewDoctor->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateProcedureRecord->Visible) { // TemplateProcedureRecord ?>
    <div id="r_TemplateProcedureRecord" class="form-group row">
        <label id="elh_ivf_et_chart_TemplateProcedureRecord" for="x_TemplateProcedureRecord" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_TemplateProcedureRecord"><?= $Page->TemplateProcedureRecord->caption() ?><?= $Page->TemplateProcedureRecord->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateProcedureRecord->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_TemplateProcedureRecord"><span id="el_ivf_et_chart_TemplateProcedureRecord">
<?php $Page->TemplateProcedureRecord->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateProcedureRecord"
        name="x_TemplateProcedureRecord"
        class="form-control ew-select<?= $Page->TemplateProcedureRecord->isInvalidClass() ?>"
        data-select2-id="ivf_et_chart_x_TemplateProcedureRecord"
        data-table="ivf_et_chart"
        data-field="x_TemplateProcedureRecord"
        data-value-separator="<?= $Page->TemplateProcedureRecord->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateProcedureRecord->getPlaceHolder()) ?>"
        <?= $Page->TemplateProcedureRecord->editAttributes() ?>>
        <?= $Page->TemplateProcedureRecord->selectOptionListHtml("x_TemplateProcedureRecord") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplateProcedureRecord->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateProcedureRecord" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateProcedureRecord->caption() ?>" data-title="<?= $Page->TemplateProcedureRecord->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateProcedureRecord',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateProcedureRecord->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateProcedureRecord->getErrorMessage() ?></div>
<?= $Page->TemplateProcedureRecord->Lookup->getParamTag($Page, "p_x_TemplateProcedureRecord") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_et_chart_x_TemplateProcedureRecord']"),
        options = { name: "x_TemplateProcedureRecord", selectId: "ivf_et_chart_x_TemplateProcedureRecord", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_et_chart.fields.TemplateProcedureRecord.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateMedicationsadvised->Visible) { // TemplateMedicationsadvised ?>
    <div id="r_TemplateMedicationsadvised" class="form-group row">
        <label id="elh_ivf_et_chart_TemplateMedicationsadvised" for="x_TemplateMedicationsadvised" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_TemplateMedicationsadvised"><?= $Page->TemplateMedicationsadvised->caption() ?><?= $Page->TemplateMedicationsadvised->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateMedicationsadvised->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_TemplateMedicationsadvised"><span id="el_ivf_et_chart_TemplateMedicationsadvised">
<?php $Page->TemplateMedicationsadvised->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateMedicationsadvised"
        name="x_TemplateMedicationsadvised"
        class="form-control ew-select<?= $Page->TemplateMedicationsadvised->isInvalidClass() ?>"
        data-select2-id="ivf_et_chart_x_TemplateMedicationsadvised"
        data-table="ivf_et_chart"
        data-field="x_TemplateMedicationsadvised"
        data-value-separator="<?= $Page->TemplateMedicationsadvised->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateMedicationsadvised->getPlaceHolder()) ?>"
        <?= $Page->TemplateMedicationsadvised->editAttributes() ?>>
        <?= $Page->TemplateMedicationsadvised->selectOptionListHtml("x_TemplateMedicationsadvised") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplateMedicationsadvised->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateMedicationsadvised" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateMedicationsadvised->caption() ?>" data-title="<?= $Page->TemplateMedicationsadvised->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateMedicationsadvised',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateMedicationsadvised->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateMedicationsadvised->getErrorMessage() ?></div>
<?= $Page->TemplateMedicationsadvised->Lookup->getParamTag($Page, "p_x_TemplateMedicationsadvised") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_et_chart_x_TemplateMedicationsadvised']"),
        options = { name: "x_TemplateMedicationsadvised", selectId: "ivf_et_chart_x_TemplateMedicationsadvised", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_et_chart.fields.TemplateMedicationsadvised.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplatePostProcedureInstructions->Visible) { // TemplatePostProcedureInstructions ?>
    <div id="r_TemplatePostProcedureInstructions" class="form-group row">
        <label id="elh_ivf_et_chart_TemplatePostProcedureInstructions" for="x_TemplatePostProcedureInstructions" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_TemplatePostProcedureInstructions"><?= $Page->TemplatePostProcedureInstructions->caption() ?><?= $Page->TemplatePostProcedureInstructions->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplatePostProcedureInstructions->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_TemplatePostProcedureInstructions"><span id="el_ivf_et_chart_TemplatePostProcedureInstructions">
<div class="input-group flex-nowrap">
    <select
        id="x_TemplatePostProcedureInstructions"
        name="x_TemplatePostProcedureInstructions"
        class="form-control ew-select<?= $Page->TemplatePostProcedureInstructions->isInvalidClass() ?>"
        data-select2-id="ivf_et_chart_x_TemplatePostProcedureInstructions"
        data-table="ivf_et_chart"
        data-field="x_TemplatePostProcedureInstructions"
        data-value-separator="<?= $Page->TemplatePostProcedureInstructions->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplatePostProcedureInstructions->getPlaceHolder()) ?>"
        <?= $Page->TemplatePostProcedureInstructions->editAttributes() ?>>
        <?= $Page->TemplatePostProcedureInstructions->selectOptionListHtml("x_TemplatePostProcedureInstructions") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplatePostProcedureInstructions->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplatePostProcedureInstructions" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplatePostProcedureInstructions->caption() ?>" data-title="<?= $Page->TemplatePostProcedureInstructions->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplatePostProcedureInstructions',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplatePostProcedureInstructions->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplatePostProcedureInstructions->getErrorMessage() ?></div>
<?= $Page->TemplatePostProcedureInstructions->Lookup->getParamTag($Page, "p_x_TemplatePostProcedureInstructions") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_et_chart_x_TemplatePostProcedureInstructions']"),
        options = { name: "x_TemplatePostProcedureInstructions", selectId: "ivf_et_chart_x_TemplatePostProcedureInstructions", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_et_chart.fields.TemplatePostProcedureInstructions.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_et_chart_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_et_chart_TidNo"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_TidNo"><span id="el_ivf_et_chart_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_et_chartadd" class="ew-custom-template"></div>
<template id="tpm_ivf_et_chartadd">
<div id="ct_IvfEtChartAdd"><style>
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
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">ET chart</h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_ARTCycle"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_ARTCycle"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_Consultant"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_Consultant"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_InseminatinTechnique"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_InseminatinTechnique"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_IndicationForART"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_IndicationForART"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_PreTreatment"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_PreTreatment"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_Hysteroscopy"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_Hysteroscopy"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_EndometrialScratching"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_EndometrialScratching"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_TrialCannulation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_TrialCannulation"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_CYCLETYPE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_CYCLETYPE"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_HRTCYCLE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_HRTCYCLE"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_OralEstrogenDosage"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_OralEstrogenDosage"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_VaginalEstrogen"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_VaginalEstrogen"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_GCSF"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_GCSF"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_ActivatedPRP"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_ActivatedPRP"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_ERA"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_ERA"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_UCLcm"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_UCLcm"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_DATEOFSTART"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_DATEOFSTART"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_DATEOFEMBRYOTRANSFER"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_DATEOFEMBRYOTRANSFER"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_DAYOFEMBRYOTRANSFER"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_DAYOFEMBRYOTRANSFER"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_NOOFEMBRYOSTHAWED"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_NOOFEMBRYOSTHAWED"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_NOOFEMBRYOSTRANSFERRED"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_NOOFEMBRYOSTRANSFERRED"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_DAYOFEMBRYOS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_DAYOFEMBRYOS"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_CRYOPRESERVEDEMBRYOS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_CRYOPRESERVEDEMBRYOS"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"></span>
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
				<h3 class="card-title">Embryo development summary</h3>
			</div>
			<div class="card-body"  style="overflow-x:auto;">
			<table   class="table table-striped ew-table ew-export-table" style="width:100%;">
			<thead>
				<tr>
					<td ><span class="ew-cell">Embryo</span></td>
					<td ><span class="ew-cell">Code</span></td>
					<td><span class="ew-cell">Day</span></td>
					<td ><span class="ew-cell">Cell Stage</span></td>
					<td><span class="ew-cell">Grade</span></td>
					<td><span class="ew-cell">State</span></td>
					</tr>
		    </thead>
			<tbody>
				<tr>
					<td><span class="ew-cell">1</span></td>
					<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_Code1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_Code1"></slot></span></td>
					<td><span class="ew-cell">D5</span></td>
					<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_CellStage1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_CellStage1"></slot></span></td>
					<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_Grade1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_Grade1"></slot></span></td>
					<td><span class="ew-cell">Transferred</span></td>
				</tr>
				<tr>
					<td><span class="ew-cell">2</span></td>
					<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_Code2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_Code2"></slot></span></td>
					<td><span class="ew-cell">D6</span></td>
					<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_CellStage2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_CellStage2"></slot></span></td>
					<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_Grade2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_Grade2"></slot></span></td>
					<td><span class="ew-cell">Transferred</span></td>
				</tr>
			</tbody>
			</table>				  
			</div>
		</div>
	</div>
</div>
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td style="width:33%">
					<span class="ew-cell">Legend Cell Stage</span>
				 </td>
				 <td style="width:33%">
					<span class="ew-cell"></span>
				</td>
					<td style="width:33%">
					<span class="ew-cell"></span>
				 </td>
		 </tr>
		 <tr>
				<td style="width:33%">
					<span class="ew-cell">cleavage stage</span>
				 </td>
				 <td style="width:33%">
					<span class="ew-cell">Day 3 embryos</span>
				</td>
					<td  style="width:33%">
					<span class="ew-cell"></span>
				 </td>
		 </tr>
		 <tr>
				<td style="width:33%">
					<span class="ew-cell">CM : Compacting Morula</span>
				 </td>
				 <td  style="width:33%">
					<span class="ew-cell">CB : Cavitated Blastocyst</span>
				</td>
					<td  style="width:33%">
					<span class="ew-cell">XB : Expanded Blastocyst</span>
				 </td>
		 </tr>
		  <tr>
				<td style="width:33%">
					<span class="ew-cell">iHB : Hatching Blastocyst</span>
				 </td>
				 <td  style="width:33%">
					<span class="ew-cell">HB : Hatched Blastocyst</span>
				</td>
					<td  style="width:33%">
					<span class="ew-cell">EB : Early Blastocyst</span>
				 </td>
		 </tr>
	</tbody>
</table>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Procedure</h3>
			</div>
			<div class="card-body">			
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_et_chart_TemplateProcedureRecord"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_TemplateProcedureRecord"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_ProcedureRecord"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_ProcedureRecord"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_et_chart_TemplateMedicationsadvised"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_TemplateMedicationsadvised"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_Medicationsadvised"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_Medicationsadvised"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_et_chart_TemplatePostProcedureInstructions"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_TemplatePostProcedureInstructions"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_PostProcedureInstructions"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_PostProcedureInstructions"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_PregnancyTestingWithSerumBetaHcG"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_PregnancyTestingWithSerumBetaHcG"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_ReviewDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_ReviewDate"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_ReviewDoctor"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_ReviewDoctor"></slot></span>
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_ivf_et_chartadd", "tpm_ivf_et_chartadd", "ivf_et_chartadd", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("ivf_et_chart");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

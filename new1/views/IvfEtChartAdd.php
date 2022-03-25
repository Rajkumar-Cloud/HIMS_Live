<?php

namespace PHPMaker2021\project3;

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
    var fields = ew.vars.tables.ivf_et_chart.fields;
    fivf_et_chartadd.addFields([
        ["RIDNo", [fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null, ew.Validators.integer], fields.RIDNo.isInvalid],
        ["Name", [fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["ARTCycle", [fields.ARTCycle.required ? ew.Validators.required(fields.ARTCycle.caption) : null], fields.ARTCycle.isInvalid],
        ["Consultant", [fields.Consultant.required ? ew.Validators.required(fields.Consultant.caption) : null], fields.Consultant.isInvalid],
        ["InseminatinTechnique", [fields.InseminatinTechnique.required ? ew.Validators.required(fields.InseminatinTechnique.caption) : null], fields.InseminatinTechnique.isInvalid],
        ["IndicationForART", [fields.IndicationForART.required ? ew.Validators.required(fields.IndicationForART.caption) : null], fields.IndicationForART.isInvalid],
        ["PreTreatment", [fields.PreTreatment.required ? ew.Validators.required(fields.PreTreatment.caption) : null], fields.PreTreatment.isInvalid],
        ["Hysteroscopy", [fields.Hysteroscopy.required ? ew.Validators.required(fields.Hysteroscopy.caption) : null], fields.Hysteroscopy.isInvalid],
        ["EndometrialScratching", [fields.EndometrialScratching.required ? ew.Validators.required(fields.EndometrialScratching.caption) : null], fields.EndometrialScratching.isInvalid],
        ["TrialCannulation", [fields.TrialCannulation.required ? ew.Validators.required(fields.TrialCannulation.caption) : null], fields.TrialCannulation.isInvalid],
        ["CYCLETYPE", [fields.CYCLETYPE.required ? ew.Validators.required(fields.CYCLETYPE.caption) : null], fields.CYCLETYPE.isInvalid],
        ["HRTCYCLE", [fields.HRTCYCLE.required ? ew.Validators.required(fields.HRTCYCLE.caption) : null], fields.HRTCYCLE.isInvalid],
        ["OralEstrogenDosage", [fields.OralEstrogenDosage.required ? ew.Validators.required(fields.OralEstrogenDosage.caption) : null], fields.OralEstrogenDosage.isInvalid],
        ["VaginalEstrogen", [fields.VaginalEstrogen.required ? ew.Validators.required(fields.VaginalEstrogen.caption) : null], fields.VaginalEstrogen.isInvalid],
        ["GCSF", [fields.GCSF.required ? ew.Validators.required(fields.GCSF.caption) : null], fields.GCSF.isInvalid],
        ["ActivatedPRP", [fields.ActivatedPRP.required ? ew.Validators.required(fields.ActivatedPRP.caption) : null], fields.ActivatedPRP.isInvalid],
        ["ERA", [fields.ERA.required ? ew.Validators.required(fields.ERA.caption) : null], fields.ERA.isInvalid],
        ["UCLcm", [fields.UCLcm.required ? ew.Validators.required(fields.UCLcm.caption) : null], fields.UCLcm.isInvalid],
        ["DATEOFSTART", [fields.DATEOFSTART.required ? ew.Validators.required(fields.DATEOFSTART.caption) : null, ew.Validators.datetime(0)], fields.DATEOFSTART.isInvalid],
        ["DATEOFEMBRYOTRANSFER", [fields.DATEOFEMBRYOTRANSFER.required ? ew.Validators.required(fields.DATEOFEMBRYOTRANSFER.caption) : null, ew.Validators.datetime(0)], fields.DATEOFEMBRYOTRANSFER.isInvalid],
        ["DAYOFEMBRYOTRANSFER", [fields.DAYOFEMBRYOTRANSFER.required ? ew.Validators.required(fields.DAYOFEMBRYOTRANSFER.caption) : null], fields.DAYOFEMBRYOTRANSFER.isInvalid],
        ["NOOFEMBRYOSTHAWED", [fields.NOOFEMBRYOSTHAWED.required ? ew.Validators.required(fields.NOOFEMBRYOSTHAWED.caption) : null], fields.NOOFEMBRYOSTHAWED.isInvalid],
        ["NOOFEMBRYOSTRANSFERRED", [fields.NOOFEMBRYOSTRANSFERRED.required ? ew.Validators.required(fields.NOOFEMBRYOSTRANSFERRED.caption) : null], fields.NOOFEMBRYOSTRANSFERRED.isInvalid],
        ["DAYOFEMBRYOS", [fields.DAYOFEMBRYOS.required ? ew.Validators.required(fields.DAYOFEMBRYOS.caption) : null], fields.DAYOFEMBRYOS.isInvalid],
        ["CRYOPRESERVEDEMBRYOS", [fields.CRYOPRESERVEDEMBRYOS.required ? ew.Validators.required(fields.CRYOPRESERVEDEMBRYOS.caption) : null], fields.CRYOPRESERVEDEMBRYOS.isInvalid],
        ["Code1", [fields.Code1.required ? ew.Validators.required(fields.Code1.caption) : null], fields.Code1.isInvalid],
        ["Code2", [fields.Code2.required ? ew.Validators.required(fields.Code2.caption) : null], fields.Code2.isInvalid],
        ["CellStage1", [fields.CellStage1.required ? ew.Validators.required(fields.CellStage1.caption) : null], fields.CellStage1.isInvalid],
        ["CellStage2", [fields.CellStage2.required ? ew.Validators.required(fields.CellStage2.caption) : null], fields.CellStage2.isInvalid],
        ["Grade1", [fields.Grade1.required ? ew.Validators.required(fields.Grade1.caption) : null], fields.Grade1.isInvalid],
        ["Grade2", [fields.Grade2.required ? ew.Validators.required(fields.Grade2.caption) : null], fields.Grade2.isInvalid],
        ["ProcedureRecord", [fields.ProcedureRecord.required ? ew.Validators.required(fields.ProcedureRecord.caption) : null], fields.ProcedureRecord.isInvalid],
        ["Medicationsadvised", [fields.Medicationsadvised.required ? ew.Validators.required(fields.Medicationsadvised.caption) : null], fields.Medicationsadvised.isInvalid],
        ["PostProcedureInstructions", [fields.PostProcedureInstructions.required ? ew.Validators.required(fields.PostProcedureInstructions.caption) : null], fields.PostProcedureInstructions.isInvalid],
        ["PregnancyTestingWithSerumBetaHcG", [fields.PregnancyTestingWithSerumBetaHcG.required ? ew.Validators.required(fields.PregnancyTestingWithSerumBetaHcG.caption) : null], fields.PregnancyTestingWithSerumBetaHcG.isInvalid],
        ["ReviewDate", [fields.ReviewDate.required ? ew.Validators.required(fields.ReviewDate.caption) : null, ew.Validators.datetime(0)], fields.ReviewDate.isInvalid],
        ["ReviewDoctor", [fields.ReviewDoctor.required ? ew.Validators.required(fields.ReviewDoctor.caption) : null], fields.ReviewDoctor.isInvalid],
        ["TidNo", [fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid]
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
<form name="fivf_et_chartadd" id="fivf_et_chartadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_et_chart">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label id="elh_ivf_et_chart_RIDNo" for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RIDNo->caption() ?><?= $Page->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_ivf_et_chart_RIDNo">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?> aria-describedby="x_RIDNo_help">
<?= $Page->RIDNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_et_chart_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_et_chart_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
    <div id="r_ARTCycle" class="form-group row">
        <label id="elh_ivf_et_chart_ARTCycle" for="x_ARTCycle" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ARTCycle->caption() ?><?= $Page->ARTCycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el_ivf_et_chart_ARTCycle">
<input type="<?= $Page->ARTCycle->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_ARTCycle" name="x_ARTCycle" id="x_ARTCycle" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ARTCycle->getPlaceHolder()) ?>" value="<?= $Page->ARTCycle->EditValue ?>"<?= $Page->ARTCycle->editAttributes() ?> aria-describedby="x_ARTCycle_help">
<?= $Page->ARTCycle->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ARTCycle->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <div id="r_Consultant" class="form-group row">
        <label id="elh_ivf_et_chart_Consultant" for="x_Consultant" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Consultant->caption() ?><?= $Page->Consultant->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Consultant->cellAttributes() ?>>
<span id="el_ivf_et_chart_Consultant">
<input type="<?= $Page->Consultant->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_Consultant" name="x_Consultant" id="x_Consultant" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Consultant->getPlaceHolder()) ?>" value="<?= $Page->Consultant->EditValue ?>"<?= $Page->Consultant->editAttributes() ?> aria-describedby="x_Consultant_help">
<?= $Page->Consultant->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Consultant->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
    <div id="r_InseminatinTechnique" class="form-group row">
        <label id="elh_ivf_et_chart_InseminatinTechnique" for="x_InseminatinTechnique" class="<?= $Page->LeftColumnClass ?>"><?= $Page->InseminatinTechnique->caption() ?><?= $Page->InseminatinTechnique->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<span id="el_ivf_et_chart_InseminatinTechnique">
<input type="<?= $Page->InseminatinTechnique->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_InseminatinTechnique" name="x_InseminatinTechnique" id="x_InseminatinTechnique" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->InseminatinTechnique->getPlaceHolder()) ?>" value="<?= $Page->InseminatinTechnique->EditValue ?>"<?= $Page->InseminatinTechnique->editAttributes() ?> aria-describedby="x_InseminatinTechnique_help">
<?= $Page->InseminatinTechnique->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->InseminatinTechnique->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
    <div id="r_IndicationForART" class="form-group row">
        <label id="elh_ivf_et_chart_IndicationForART" for="x_IndicationForART" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IndicationForART->caption() ?><?= $Page->IndicationForART->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IndicationForART->cellAttributes() ?>>
<span id="el_ivf_et_chart_IndicationForART">
<input type="<?= $Page->IndicationForART->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_IndicationForART" name="x_IndicationForART" id="x_IndicationForART" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IndicationForART->getPlaceHolder()) ?>" value="<?= $Page->IndicationForART->EditValue ?>"<?= $Page->IndicationForART->editAttributes() ?> aria-describedby="x_IndicationForART_help">
<?= $Page->IndicationForART->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IndicationForART->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreTreatment->Visible) { // PreTreatment ?>
    <div id="r_PreTreatment" class="form-group row">
        <label id="elh_ivf_et_chart_PreTreatment" for="x_PreTreatment" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PreTreatment->caption() ?><?= $Page->PreTreatment->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreTreatment->cellAttributes() ?>>
<span id="el_ivf_et_chart_PreTreatment">
<input type="<?= $Page->PreTreatment->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_PreTreatment" name="x_PreTreatment" id="x_PreTreatment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PreTreatment->getPlaceHolder()) ?>" value="<?= $Page->PreTreatment->EditValue ?>"<?= $Page->PreTreatment->editAttributes() ?> aria-describedby="x_PreTreatment_help">
<?= $Page->PreTreatment->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PreTreatment->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
    <div id="r_Hysteroscopy" class="form-group row">
        <label id="elh_ivf_et_chart_Hysteroscopy" for="x_Hysteroscopy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Hysteroscopy->caption() ?><?= $Page->Hysteroscopy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Hysteroscopy->cellAttributes() ?>>
<span id="el_ivf_et_chart_Hysteroscopy">
<input type="<?= $Page->Hysteroscopy->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_Hysteroscopy" name="x_Hysteroscopy" id="x_Hysteroscopy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Hysteroscopy->getPlaceHolder()) ?>" value="<?= $Page->Hysteroscopy->EditValue ?>"<?= $Page->Hysteroscopy->editAttributes() ?> aria-describedby="x_Hysteroscopy_help">
<?= $Page->Hysteroscopy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Hysteroscopy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EndometrialScratching->Visible) { // EndometrialScratching ?>
    <div id="r_EndometrialScratching" class="form-group row">
        <label id="elh_ivf_et_chart_EndometrialScratching" for="x_EndometrialScratching" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EndometrialScratching->caption() ?><?= $Page->EndometrialScratching->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EndometrialScratching->cellAttributes() ?>>
<span id="el_ivf_et_chart_EndometrialScratching">
<input type="<?= $Page->EndometrialScratching->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_EndometrialScratching" name="x_EndometrialScratching" id="x_EndometrialScratching" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EndometrialScratching->getPlaceHolder()) ?>" value="<?= $Page->EndometrialScratching->EditValue ?>"<?= $Page->EndometrialScratching->editAttributes() ?> aria-describedby="x_EndometrialScratching_help">
<?= $Page->EndometrialScratching->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EndometrialScratching->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
    <div id="r_TrialCannulation" class="form-group row">
        <label id="elh_ivf_et_chart_TrialCannulation" for="x_TrialCannulation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TrialCannulation->caption() ?><?= $Page->TrialCannulation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TrialCannulation->cellAttributes() ?>>
<span id="el_ivf_et_chart_TrialCannulation">
<input type="<?= $Page->TrialCannulation->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_TrialCannulation" name="x_TrialCannulation" id="x_TrialCannulation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TrialCannulation->getPlaceHolder()) ?>" value="<?= $Page->TrialCannulation->EditValue ?>"<?= $Page->TrialCannulation->editAttributes() ?> aria-describedby="x_TrialCannulation_help">
<?= $Page->TrialCannulation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TrialCannulation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CYCLETYPE->Visible) { // CYCLETYPE ?>
    <div id="r_CYCLETYPE" class="form-group row">
        <label id="elh_ivf_et_chart_CYCLETYPE" for="x_CYCLETYPE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CYCLETYPE->caption() ?><?= $Page->CYCLETYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CYCLETYPE->cellAttributes() ?>>
<span id="el_ivf_et_chart_CYCLETYPE">
<input type="<?= $Page->CYCLETYPE->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_CYCLETYPE" name="x_CYCLETYPE" id="x_CYCLETYPE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CYCLETYPE->getPlaceHolder()) ?>" value="<?= $Page->CYCLETYPE->EditValue ?>"<?= $Page->CYCLETYPE->editAttributes() ?> aria-describedby="x_CYCLETYPE_help">
<?= $Page->CYCLETYPE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CYCLETYPE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HRTCYCLE->Visible) { // HRTCYCLE ?>
    <div id="r_HRTCYCLE" class="form-group row">
        <label id="elh_ivf_et_chart_HRTCYCLE" for="x_HRTCYCLE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HRTCYCLE->caption() ?><?= $Page->HRTCYCLE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HRTCYCLE->cellAttributes() ?>>
<span id="el_ivf_et_chart_HRTCYCLE">
<input type="<?= $Page->HRTCYCLE->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_HRTCYCLE" name="x_HRTCYCLE" id="x_HRTCYCLE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HRTCYCLE->getPlaceHolder()) ?>" value="<?= $Page->HRTCYCLE->EditValue ?>"<?= $Page->HRTCYCLE->editAttributes() ?> aria-describedby="x_HRTCYCLE_help">
<?= $Page->HRTCYCLE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HRTCYCLE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
    <div id="r_OralEstrogenDosage" class="form-group row">
        <label id="elh_ivf_et_chart_OralEstrogenDosage" for="x_OralEstrogenDosage" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OralEstrogenDosage->caption() ?><?= $Page->OralEstrogenDosage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OralEstrogenDosage->cellAttributes() ?>>
<span id="el_ivf_et_chart_OralEstrogenDosage">
<input type="<?= $Page->OralEstrogenDosage->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_OralEstrogenDosage" name="x_OralEstrogenDosage" id="x_OralEstrogenDosage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OralEstrogenDosage->getPlaceHolder()) ?>" value="<?= $Page->OralEstrogenDosage->EditValue ?>"<?= $Page->OralEstrogenDosage->editAttributes() ?> aria-describedby="x_OralEstrogenDosage_help">
<?= $Page->OralEstrogenDosage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OralEstrogenDosage->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
    <div id="r_VaginalEstrogen" class="form-group row">
        <label id="elh_ivf_et_chart_VaginalEstrogen" for="x_VaginalEstrogen" class="<?= $Page->LeftColumnClass ?>"><?= $Page->VaginalEstrogen->caption() ?><?= $Page->VaginalEstrogen->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VaginalEstrogen->cellAttributes() ?>>
<span id="el_ivf_et_chart_VaginalEstrogen">
<input type="<?= $Page->VaginalEstrogen->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_VaginalEstrogen" name="x_VaginalEstrogen" id="x_VaginalEstrogen" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VaginalEstrogen->getPlaceHolder()) ?>" value="<?= $Page->VaginalEstrogen->EditValue ?>"<?= $Page->VaginalEstrogen->editAttributes() ?> aria-describedby="x_VaginalEstrogen_help">
<?= $Page->VaginalEstrogen->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->VaginalEstrogen->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GCSF->Visible) { // GCSF ?>
    <div id="r_GCSF" class="form-group row">
        <label id="elh_ivf_et_chart_GCSF" for="x_GCSF" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GCSF->caption() ?><?= $Page->GCSF->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GCSF->cellAttributes() ?>>
<span id="el_ivf_et_chart_GCSF">
<input type="<?= $Page->GCSF->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_GCSF" name="x_GCSF" id="x_GCSF" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GCSF->getPlaceHolder()) ?>" value="<?= $Page->GCSF->EditValue ?>"<?= $Page->GCSF->editAttributes() ?> aria-describedby="x_GCSF_help">
<?= $Page->GCSF->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GCSF->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ActivatedPRP->Visible) { // ActivatedPRP ?>
    <div id="r_ActivatedPRP" class="form-group row">
        <label id="elh_ivf_et_chart_ActivatedPRP" for="x_ActivatedPRP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ActivatedPRP->caption() ?><?= $Page->ActivatedPRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ActivatedPRP->cellAttributes() ?>>
<span id="el_ivf_et_chart_ActivatedPRP">
<input type="<?= $Page->ActivatedPRP->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_ActivatedPRP" name="x_ActivatedPRP" id="x_ActivatedPRP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ActivatedPRP->getPlaceHolder()) ?>" value="<?= $Page->ActivatedPRP->EditValue ?>"<?= $Page->ActivatedPRP->editAttributes() ?> aria-describedby="x_ActivatedPRP_help">
<?= $Page->ActivatedPRP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ActivatedPRP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ERA->Visible) { // ERA ?>
    <div id="r_ERA" class="form-group row">
        <label id="elh_ivf_et_chart_ERA" for="x_ERA" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ERA->caption() ?><?= $Page->ERA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ERA->cellAttributes() ?>>
<span id="el_ivf_et_chart_ERA">
<input type="<?= $Page->ERA->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_ERA" name="x_ERA" id="x_ERA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ERA->getPlaceHolder()) ?>" value="<?= $Page->ERA->EditValue ?>"<?= $Page->ERA->editAttributes() ?> aria-describedby="x_ERA_help">
<?= $Page->ERA->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ERA->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UCLcm->Visible) { // UCLcm ?>
    <div id="r_UCLcm" class="form-group row">
        <label id="elh_ivf_et_chart_UCLcm" for="x_UCLcm" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UCLcm->caption() ?><?= $Page->UCLcm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UCLcm->cellAttributes() ?>>
<span id="el_ivf_et_chart_UCLcm">
<input type="<?= $Page->UCLcm->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_UCLcm" name="x_UCLcm" id="x_UCLcm" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UCLcm->getPlaceHolder()) ?>" value="<?= $Page->UCLcm->EditValue ?>"<?= $Page->UCLcm->editAttributes() ?> aria-describedby="x_UCLcm_help">
<?= $Page->UCLcm->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UCLcm->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DATEOFSTART->Visible) { // DATEOFSTART ?>
    <div id="r_DATEOFSTART" class="form-group row">
        <label id="elh_ivf_et_chart_DATEOFSTART" for="x_DATEOFSTART" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DATEOFSTART->caption() ?><?= $Page->DATEOFSTART->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DATEOFSTART->cellAttributes() ?>>
<span id="el_ivf_et_chart_DATEOFSTART">
<input type="<?= $Page->DATEOFSTART->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_DATEOFSTART" name="x_DATEOFSTART" id="x_DATEOFSTART" placeholder="<?= HtmlEncode($Page->DATEOFSTART->getPlaceHolder()) ?>" value="<?= $Page->DATEOFSTART->EditValue ?>"<?= $Page->DATEOFSTART->editAttributes() ?> aria-describedby="x_DATEOFSTART_help">
<?= $Page->DATEOFSTART->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DATEOFSTART->getErrorMessage() ?></div>
<?php if (!$Page->DATEOFSTART->ReadOnly && !$Page->DATEOFSTART->Disabled && !isset($Page->DATEOFSTART->EditAttrs["readonly"]) && !isset($Page->DATEOFSTART->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_et_chartadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_et_chartadd", "x_DATEOFSTART", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
    <div id="r_DATEOFEMBRYOTRANSFER" class="form-group row">
        <label id="elh_ivf_et_chart_DATEOFEMBRYOTRANSFER" for="x_DATEOFEMBRYOTRANSFER" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DATEOFEMBRYOTRANSFER->caption() ?><?= $Page->DATEOFEMBRYOTRANSFER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DATEOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el_ivf_et_chart_DATEOFEMBRYOTRANSFER">
<input type="<?= $Page->DATEOFEMBRYOTRANSFER->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_DATEOFEMBRYOTRANSFER" name="x_DATEOFEMBRYOTRANSFER" id="x_DATEOFEMBRYOTRANSFER" placeholder="<?= HtmlEncode($Page->DATEOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?= $Page->DATEOFEMBRYOTRANSFER->EditValue ?>"<?= $Page->DATEOFEMBRYOTRANSFER->editAttributes() ?> aria-describedby="x_DATEOFEMBRYOTRANSFER_help">
<?= $Page->DATEOFEMBRYOTRANSFER->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DATEOFEMBRYOTRANSFER->getErrorMessage() ?></div>
<?php if (!$Page->DATEOFEMBRYOTRANSFER->ReadOnly && !$Page->DATEOFEMBRYOTRANSFER->Disabled && !isset($Page->DATEOFEMBRYOTRANSFER->EditAttrs["readonly"]) && !isset($Page->DATEOFEMBRYOTRANSFER->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_et_chartadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_et_chartadd", "x_DATEOFEMBRYOTRANSFER", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
    <div id="r_DAYOFEMBRYOTRANSFER" class="form-group row">
        <label id="elh_ivf_et_chart_DAYOFEMBRYOTRANSFER" for="x_DAYOFEMBRYOTRANSFER" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DAYOFEMBRYOTRANSFER->caption() ?><?= $Page->DAYOFEMBRYOTRANSFER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el_ivf_et_chart_DAYOFEMBRYOTRANSFER">
<input type="<?= $Page->DAYOFEMBRYOTRANSFER->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOTRANSFER" name="x_DAYOFEMBRYOTRANSFER" id="x_DAYOFEMBRYOTRANSFER" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DAYOFEMBRYOTRANSFER->getPlaceHolder()) ?>" value="<?= $Page->DAYOFEMBRYOTRANSFER->EditValue ?>"<?= $Page->DAYOFEMBRYOTRANSFER->editAttributes() ?> aria-describedby="x_DAYOFEMBRYOTRANSFER_help">
<?= $Page->DAYOFEMBRYOTRANSFER->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DAYOFEMBRYOTRANSFER->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
    <div id="r_NOOFEMBRYOSTHAWED" class="form-group row">
        <label id="elh_ivf_et_chart_NOOFEMBRYOSTHAWED" for="x_NOOFEMBRYOSTHAWED" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NOOFEMBRYOSTHAWED->caption() ?><?= $Page->NOOFEMBRYOSTHAWED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<span id="el_ivf_et_chart_NOOFEMBRYOSTHAWED">
<input type="<?= $Page->NOOFEMBRYOSTHAWED->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTHAWED" name="x_NOOFEMBRYOSTHAWED" id="x_NOOFEMBRYOSTHAWED" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NOOFEMBRYOSTHAWED->getPlaceHolder()) ?>" value="<?= $Page->NOOFEMBRYOSTHAWED->EditValue ?>"<?= $Page->NOOFEMBRYOSTHAWED->editAttributes() ?> aria-describedby="x_NOOFEMBRYOSTHAWED_help">
<?= $Page->NOOFEMBRYOSTHAWED->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NOOFEMBRYOSTHAWED->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
    <div id="r_NOOFEMBRYOSTRANSFERRED" class="form-group row">
        <label id="elh_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" for="x_NOOFEMBRYOSTRANSFERRED" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NOOFEMBRYOSTRANSFERRED->caption() ?><?= $Page->NOOFEMBRYOSTRANSFERRED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<span id="el_ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
<input type="<?= $Page->NOOFEMBRYOSTRANSFERRED->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_NOOFEMBRYOSTRANSFERRED" name="x_NOOFEMBRYOSTRANSFERRED" id="x_NOOFEMBRYOSTRANSFERRED" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NOOFEMBRYOSTRANSFERRED->getPlaceHolder()) ?>" value="<?= $Page->NOOFEMBRYOSTRANSFERRED->EditValue ?>"<?= $Page->NOOFEMBRYOSTRANSFERRED->editAttributes() ?> aria-describedby="x_NOOFEMBRYOSTRANSFERRED_help">
<?= $Page->NOOFEMBRYOSTRANSFERRED->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NOOFEMBRYOSTRANSFERRED->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
    <div id="r_DAYOFEMBRYOS" class="form-group row">
        <label id="elh_ivf_et_chart_DAYOFEMBRYOS" for="x_DAYOFEMBRYOS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DAYOFEMBRYOS->caption() ?><?= $Page->DAYOFEMBRYOS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DAYOFEMBRYOS->cellAttributes() ?>>
<span id="el_ivf_et_chart_DAYOFEMBRYOS">
<input type="<?= $Page->DAYOFEMBRYOS->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_DAYOFEMBRYOS" name="x_DAYOFEMBRYOS" id="x_DAYOFEMBRYOS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DAYOFEMBRYOS->getPlaceHolder()) ?>" value="<?= $Page->DAYOFEMBRYOS->EditValue ?>"<?= $Page->DAYOFEMBRYOS->editAttributes() ?> aria-describedby="x_DAYOFEMBRYOS_help">
<?= $Page->DAYOFEMBRYOS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DAYOFEMBRYOS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
    <div id="r_CRYOPRESERVEDEMBRYOS" class="form-group row">
        <label id="elh_ivf_et_chart_CRYOPRESERVEDEMBRYOS" for="x_CRYOPRESERVEDEMBRYOS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CRYOPRESERVEDEMBRYOS->caption() ?><?= $Page->CRYOPRESERVEDEMBRYOS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<span id="el_ivf_et_chart_CRYOPRESERVEDEMBRYOS">
<input type="<?= $Page->CRYOPRESERVEDEMBRYOS->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_CRYOPRESERVEDEMBRYOS" name="x_CRYOPRESERVEDEMBRYOS" id="x_CRYOPRESERVEDEMBRYOS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CRYOPRESERVEDEMBRYOS->getPlaceHolder()) ?>" value="<?= $Page->CRYOPRESERVEDEMBRYOS->EditValue ?>"<?= $Page->CRYOPRESERVEDEMBRYOS->editAttributes() ?> aria-describedby="x_CRYOPRESERVEDEMBRYOS_help">
<?= $Page->CRYOPRESERVEDEMBRYOS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CRYOPRESERVEDEMBRYOS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Code1->Visible) { // Code1 ?>
    <div id="r_Code1" class="form-group row">
        <label id="elh_ivf_et_chart_Code1" for="x_Code1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Code1->caption() ?><?= $Page->Code1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Code1->cellAttributes() ?>>
<span id="el_ivf_et_chart_Code1">
<input type="<?= $Page->Code1->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_Code1" name="x_Code1" id="x_Code1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Code1->getPlaceHolder()) ?>" value="<?= $Page->Code1->EditValue ?>"<?= $Page->Code1->editAttributes() ?> aria-describedby="x_Code1_help">
<?= $Page->Code1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Code1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Code2->Visible) { // Code2 ?>
    <div id="r_Code2" class="form-group row">
        <label id="elh_ivf_et_chart_Code2" for="x_Code2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Code2->caption() ?><?= $Page->Code2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Code2->cellAttributes() ?>>
<span id="el_ivf_et_chart_Code2">
<input type="<?= $Page->Code2->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_Code2" name="x_Code2" id="x_Code2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Code2->getPlaceHolder()) ?>" value="<?= $Page->Code2->EditValue ?>"<?= $Page->Code2->editAttributes() ?> aria-describedby="x_Code2_help">
<?= $Page->Code2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Code2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CellStage1->Visible) { // CellStage1 ?>
    <div id="r_CellStage1" class="form-group row">
        <label id="elh_ivf_et_chart_CellStage1" for="x_CellStage1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CellStage1->caption() ?><?= $Page->CellStage1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CellStage1->cellAttributes() ?>>
<span id="el_ivf_et_chart_CellStage1">
<input type="<?= $Page->CellStage1->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_CellStage1" name="x_CellStage1" id="x_CellStage1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CellStage1->getPlaceHolder()) ?>" value="<?= $Page->CellStage1->EditValue ?>"<?= $Page->CellStage1->editAttributes() ?> aria-describedby="x_CellStage1_help">
<?= $Page->CellStage1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CellStage1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CellStage2->Visible) { // CellStage2 ?>
    <div id="r_CellStage2" class="form-group row">
        <label id="elh_ivf_et_chart_CellStage2" for="x_CellStage2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CellStage2->caption() ?><?= $Page->CellStage2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CellStage2->cellAttributes() ?>>
<span id="el_ivf_et_chart_CellStage2">
<input type="<?= $Page->CellStage2->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_CellStage2" name="x_CellStage2" id="x_CellStage2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CellStage2->getPlaceHolder()) ?>" value="<?= $Page->CellStage2->EditValue ?>"<?= $Page->CellStage2->editAttributes() ?> aria-describedby="x_CellStage2_help">
<?= $Page->CellStage2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CellStage2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Grade1->Visible) { // Grade1 ?>
    <div id="r_Grade1" class="form-group row">
        <label id="elh_ivf_et_chart_Grade1" for="x_Grade1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Grade1->caption() ?><?= $Page->Grade1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Grade1->cellAttributes() ?>>
<span id="el_ivf_et_chart_Grade1">
<input type="<?= $Page->Grade1->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_Grade1" name="x_Grade1" id="x_Grade1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Grade1->getPlaceHolder()) ?>" value="<?= $Page->Grade1->EditValue ?>"<?= $Page->Grade1->editAttributes() ?> aria-describedby="x_Grade1_help">
<?= $Page->Grade1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Grade1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Grade2->Visible) { // Grade2 ?>
    <div id="r_Grade2" class="form-group row">
        <label id="elh_ivf_et_chart_Grade2" for="x_Grade2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Grade2->caption() ?><?= $Page->Grade2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Grade2->cellAttributes() ?>>
<span id="el_ivf_et_chart_Grade2">
<input type="<?= $Page->Grade2->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_Grade2" name="x_Grade2" id="x_Grade2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Grade2->getPlaceHolder()) ?>" value="<?= $Page->Grade2->EditValue ?>"<?= $Page->Grade2->editAttributes() ?> aria-describedby="x_Grade2_help">
<?= $Page->Grade2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Grade2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureRecord->Visible) { // ProcedureRecord ?>
    <div id="r_ProcedureRecord" class="form-group row">
        <label id="elh_ivf_et_chart_ProcedureRecord" for="x_ProcedureRecord" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProcedureRecord->caption() ?><?= $Page->ProcedureRecord->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureRecord->cellAttributes() ?>>
<span id="el_ivf_et_chart_ProcedureRecord">
<textarea data-table="ivf_et_chart" data-field="x_ProcedureRecord" name="x_ProcedureRecord" id="x_ProcedureRecord" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->ProcedureRecord->getPlaceHolder()) ?>"<?= $Page->ProcedureRecord->editAttributes() ?> aria-describedby="x_ProcedureRecord_help"><?= $Page->ProcedureRecord->EditValue ?></textarea>
<?= $Page->ProcedureRecord->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProcedureRecord->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Medicationsadvised->Visible) { // Medicationsadvised ?>
    <div id="r_Medicationsadvised" class="form-group row">
        <label id="elh_ivf_et_chart_Medicationsadvised" for="x_Medicationsadvised" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Medicationsadvised->caption() ?><?= $Page->Medicationsadvised->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Medicationsadvised->cellAttributes() ?>>
<span id="el_ivf_et_chart_Medicationsadvised">
<textarea data-table="ivf_et_chart" data-field="x_Medicationsadvised" name="x_Medicationsadvised" id="x_Medicationsadvised" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Medicationsadvised->getPlaceHolder()) ?>"<?= $Page->Medicationsadvised->editAttributes() ?> aria-describedby="x_Medicationsadvised_help"><?= $Page->Medicationsadvised->EditValue ?></textarea>
<?= $Page->Medicationsadvised->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Medicationsadvised->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PostProcedureInstructions->Visible) { // PostProcedureInstructions ?>
    <div id="r_PostProcedureInstructions" class="form-group row">
        <label id="elh_ivf_et_chart_PostProcedureInstructions" for="x_PostProcedureInstructions" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PostProcedureInstructions->caption() ?><?= $Page->PostProcedureInstructions->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PostProcedureInstructions->cellAttributes() ?>>
<span id="el_ivf_et_chart_PostProcedureInstructions">
<textarea data-table="ivf_et_chart" data-field="x_PostProcedureInstructions" name="x_PostProcedureInstructions" id="x_PostProcedureInstructions" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->PostProcedureInstructions->getPlaceHolder()) ?>"<?= $Page->PostProcedureInstructions->editAttributes() ?> aria-describedby="x_PostProcedureInstructions_help"><?= $Page->PostProcedureInstructions->EditValue ?></textarea>
<?= $Page->PostProcedureInstructions->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PostProcedureInstructions->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
    <div id="r_PregnancyTestingWithSerumBetaHcG" class="form-group row">
        <label id="elh_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" for="x_PregnancyTestingWithSerumBetaHcG" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PregnancyTestingWithSerumBetaHcG->caption() ?><?= $Page->PregnancyTestingWithSerumBetaHcG->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PregnancyTestingWithSerumBetaHcG->cellAttributes() ?>>
<span id="el_ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
<input type="<?= $Page->PregnancyTestingWithSerumBetaHcG->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_PregnancyTestingWithSerumBetaHcG" name="x_PregnancyTestingWithSerumBetaHcG" id="x_PregnancyTestingWithSerumBetaHcG" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PregnancyTestingWithSerumBetaHcG->getPlaceHolder()) ?>" value="<?= $Page->PregnancyTestingWithSerumBetaHcG->EditValue ?>"<?= $Page->PregnancyTestingWithSerumBetaHcG->editAttributes() ?> aria-describedby="x_PregnancyTestingWithSerumBetaHcG_help">
<?= $Page->PregnancyTestingWithSerumBetaHcG->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PregnancyTestingWithSerumBetaHcG->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReviewDate->Visible) { // ReviewDate ?>
    <div id="r_ReviewDate" class="form-group row">
        <label id="elh_ivf_et_chart_ReviewDate" for="x_ReviewDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReviewDate->caption() ?><?= $Page->ReviewDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReviewDate->cellAttributes() ?>>
<span id="el_ivf_et_chart_ReviewDate">
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
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ReviewDoctor->Visible) { // ReviewDoctor ?>
    <div id="r_ReviewDoctor" class="form-group row">
        <label id="elh_ivf_et_chart_ReviewDoctor" for="x_ReviewDoctor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ReviewDoctor->caption() ?><?= $Page->ReviewDoctor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ReviewDoctor->cellAttributes() ?>>
<span id="el_ivf_et_chart_ReviewDoctor">
<input type="<?= $Page->ReviewDoctor->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_ReviewDoctor" name="x_ReviewDoctor" id="x_ReviewDoctor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ReviewDoctor->getPlaceHolder()) ?>" value="<?= $Page->ReviewDoctor->EditValue ?>"<?= $Page->ReviewDoctor->editAttributes() ?> aria-describedby="x_ReviewDoctor_help">
<?= $Page->ReviewDoctor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ReviewDoctor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_et_chart_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_et_chart_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_et_chart" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
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
    ew.addEventHandlers("ivf_et_chart");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

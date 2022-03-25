<?php

namespace PHPMaker2021\project3;

// Page object
$IvfArtSummaryAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_art_summaryadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fivf_art_summaryadd = currentForm = new ew.Form("fivf_art_summaryadd", "add");

    // Add fields
    var fields = ew.vars.tables.ivf_art_summary.fields;
    fivf_art_summaryadd.addFields([
        ["IVFRegistrationID", [fields.IVFRegistrationID.required ? ew.Validators.required(fields.IVFRegistrationID.caption) : null, ew.Validators.integer], fields.IVFRegistrationID.isInvalid],
        ["ARTCycle", [fields.ARTCycle.required ? ew.Validators.required(fields.ARTCycle.caption) : null], fields.ARTCycle.isInvalid],
        ["Spermorigin", [fields.Spermorigin.required ? ew.Validators.required(fields.Spermorigin.caption) : null], fields.Spermorigin.isInvalid],
        ["InseminatinTechnique", [fields.InseminatinTechnique.required ? ew.Validators.required(fields.InseminatinTechnique.caption) : null], fields.InseminatinTechnique.isInvalid],
        ["IndicationforART", [fields.IndicationforART.required ? ew.Validators.required(fields.IndicationforART.caption) : null], fields.IndicationforART.isInvalid],
        ["ICSIDetails", [fields.ICSIDetails.required ? ew.Validators.required(fields.ICSIDetails.caption) : null], fields.ICSIDetails.isInvalid],
        ["DateofICSI", [fields.DateofICSI.required ? ew.Validators.required(fields.DateofICSI.caption) : null, ew.Validators.datetime(0)], fields.DateofICSI.isInvalid],
        ["Origin", [fields.Origin.required ? ew.Validators.required(fields.Origin.caption) : null], fields.Origin.isInvalid],
        ["Status", [fields.Status.required ? ew.Validators.required(fields.Status.caption) : null], fields.Status.isInvalid],
        ["Method", [fields.Method.required ? ew.Validators.required(fields.Method.caption) : null], fields.Method.isInvalid],
        ["pre_Concentration", [fields.pre_Concentration.required ? ew.Validators.required(fields.pre_Concentration.caption) : null], fields.pre_Concentration.isInvalid],
        ["pre_Motility", [fields.pre_Motility.required ? ew.Validators.required(fields.pre_Motility.caption) : null], fields.pre_Motility.isInvalid],
        ["pre_Morphology", [fields.pre_Morphology.required ? ew.Validators.required(fields.pre_Morphology.caption) : null], fields.pre_Morphology.isInvalid],
        ["post_Concentration", [fields.post_Concentration.required ? ew.Validators.required(fields.post_Concentration.caption) : null], fields.post_Concentration.isInvalid],
        ["post_Motility", [fields.post_Motility.required ? ew.Validators.required(fields.post_Motility.caption) : null], fields.post_Motility.isInvalid],
        ["post_Morphology", [fields.post_Morphology.required ? ew.Validators.required(fields.post_Morphology.caption) : null], fields.post_Morphology.isInvalid],
        ["DateofET", [fields.DateofET.required ? ew.Validators.required(fields.DateofET.caption) : null], fields.DateofET.isInvalid],
        ["NumberofEmbryostransferred", [fields.NumberofEmbryostransferred.required ? ew.Validators.required(fields.NumberofEmbryostransferred.caption) : null], fields.NumberofEmbryostransferred.isInvalid],
        ["Reasonfornotranfer", [fields.Reasonfornotranfer.required ? ew.Validators.required(fields.Reasonfornotranfer.caption) : null], fields.Reasonfornotranfer.isInvalid],
        ["Embryosunderobservation", [fields.Embryosunderobservation.required ? ew.Validators.required(fields.Embryosunderobservation.caption) : null], fields.Embryosunderobservation.isInvalid],
        ["EmbryosCryopreserved", [fields.EmbryosCryopreserved.required ? ew.Validators.required(fields.EmbryosCryopreserved.caption) : null], fields.EmbryosCryopreserved.isInvalid],
        ["EmbryoDevelopmentSummary", [fields.EmbryoDevelopmentSummary.required ? ew.Validators.required(fields.EmbryoDevelopmentSummary.caption) : null], fields.EmbryoDevelopmentSummary.isInvalid],
        ["LegendCellStage", [fields.LegendCellStage.required ? ew.Validators.required(fields.LegendCellStage.caption) : null], fields.LegendCellStage.isInvalid],
        ["EmbryologistSignature", [fields.EmbryologistSignature.required ? ew.Validators.required(fields.EmbryologistSignature.caption) : null], fields.EmbryologistSignature.isInvalid],
        ["ConsultantsSignature", [fields.ConsultantsSignature.required ? ew.Validators.required(fields.ConsultantsSignature.caption) : null], fields.ConsultantsSignature.isInvalid],
        ["Name", [fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["M2", [fields.M2.required ? ew.Validators.required(fields.M2.caption) : null], fields.M2.isInvalid],
        ["Mi2", [fields.Mi2.required ? ew.Validators.required(fields.Mi2.caption) : null], fields.Mi2.isInvalid],
        ["ICSI", [fields.ICSI.required ? ew.Validators.required(fields.ICSI.caption) : null], fields.ICSI.isInvalid],
        ["IVF", [fields.IVF.required ? ew.Validators.required(fields.IVF.caption) : null], fields.IVF.isInvalid],
        ["M1", [fields.M1.required ? ew.Validators.required(fields.M1.caption) : null], fields.M1.isInvalid],
        ["GV", [fields.GV.required ? ew.Validators.required(fields.GV.caption) : null], fields.GV.isInvalid],
        ["_Others", [fields._Others.required ? ew.Validators.required(fields._Others.caption) : null], fields._Others.isInvalid],
        ["Normal2PN", [fields.Normal2PN.required ? ew.Validators.required(fields.Normal2PN.caption) : null], fields.Normal2PN.isInvalid],
        ["Abnormalfertilisation1N", [fields.Abnormalfertilisation1N.required ? ew.Validators.required(fields.Abnormalfertilisation1N.caption) : null], fields.Abnormalfertilisation1N.isInvalid],
        ["Abnormalfertilisation3N", [fields.Abnormalfertilisation3N.required ? ew.Validators.required(fields.Abnormalfertilisation3N.caption) : null], fields.Abnormalfertilisation3N.isInvalid],
        ["NotFertilized", [fields.NotFertilized.required ? ew.Validators.required(fields.NotFertilized.caption) : null], fields.NotFertilized.isInvalid],
        ["Degenerated", [fields.Degenerated.required ? ew.Validators.required(fields.Degenerated.caption) : null], fields.Degenerated.isInvalid],
        ["SpermDate", [fields.SpermDate.required ? ew.Validators.required(fields.SpermDate.caption) : null, ew.Validators.datetime(0)], fields.SpermDate.isInvalid],
        ["Code1", [fields.Code1.required ? ew.Validators.required(fields.Code1.caption) : null], fields.Code1.isInvalid],
        ["Day1", [fields.Day1.required ? ew.Validators.required(fields.Day1.caption) : null], fields.Day1.isInvalid],
        ["CellStage1", [fields.CellStage1.required ? ew.Validators.required(fields.CellStage1.caption) : null], fields.CellStage1.isInvalid],
        ["Grade1", [fields.Grade1.required ? ew.Validators.required(fields.Grade1.caption) : null], fields.Grade1.isInvalid],
        ["State1", [fields.State1.required ? ew.Validators.required(fields.State1.caption) : null], fields.State1.isInvalid],
        ["Code2", [fields.Code2.required ? ew.Validators.required(fields.Code2.caption) : null], fields.Code2.isInvalid],
        ["Day2", [fields.Day2.required ? ew.Validators.required(fields.Day2.caption) : null], fields.Day2.isInvalid],
        ["CellStage2", [fields.CellStage2.required ? ew.Validators.required(fields.CellStage2.caption) : null], fields.CellStage2.isInvalid],
        ["Grade2", [fields.Grade2.required ? ew.Validators.required(fields.Grade2.caption) : null], fields.Grade2.isInvalid],
        ["State2", [fields.State2.required ? ew.Validators.required(fields.State2.caption) : null], fields.State2.isInvalid],
        ["Code3", [fields.Code3.required ? ew.Validators.required(fields.Code3.caption) : null], fields.Code3.isInvalid],
        ["Day3", [fields.Day3.required ? ew.Validators.required(fields.Day3.caption) : null], fields.Day3.isInvalid],
        ["CellStage3", [fields.CellStage3.required ? ew.Validators.required(fields.CellStage3.caption) : null], fields.CellStage3.isInvalid],
        ["Grade3", [fields.Grade3.required ? ew.Validators.required(fields.Grade3.caption) : null], fields.Grade3.isInvalid],
        ["State3", [fields.State3.required ? ew.Validators.required(fields.State3.caption) : null], fields.State3.isInvalid],
        ["Code4", [fields.Code4.required ? ew.Validators.required(fields.Code4.caption) : null], fields.Code4.isInvalid],
        ["Day4", [fields.Day4.required ? ew.Validators.required(fields.Day4.caption) : null], fields.Day4.isInvalid],
        ["CellStage4", [fields.CellStage4.required ? ew.Validators.required(fields.CellStage4.caption) : null], fields.CellStage4.isInvalid],
        ["Grade4", [fields.Grade4.required ? ew.Validators.required(fields.Grade4.caption) : null], fields.Grade4.isInvalid],
        ["State4", [fields.State4.required ? ew.Validators.required(fields.State4.caption) : null], fields.State4.isInvalid],
        ["Code5", [fields.Code5.required ? ew.Validators.required(fields.Code5.caption) : null], fields.Code5.isInvalid],
        ["Day5", [fields.Day5.required ? ew.Validators.required(fields.Day5.caption) : null], fields.Day5.isInvalid],
        ["CellStage5", [fields.CellStage5.required ? ew.Validators.required(fields.CellStage5.caption) : null], fields.CellStage5.isInvalid],
        ["Grade5", [fields.Grade5.required ? ew.Validators.required(fields.Grade5.caption) : null], fields.Grade5.isInvalid],
        ["State5", [fields.State5.required ? ew.Validators.required(fields.State5.caption) : null], fields.State5.isInvalid],
        ["TidNo", [fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["RIDNo", [fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null, ew.Validators.integer], fields.RIDNo.isInvalid],
        ["Volume", [fields.Volume.required ? ew.Validators.required(fields.Volume.caption) : null], fields.Volume.isInvalid],
        ["Volume1", [fields.Volume1.required ? ew.Validators.required(fields.Volume1.caption) : null], fields.Volume1.isInvalid],
        ["Volume2", [fields.Volume2.required ? ew.Validators.required(fields.Volume2.caption) : null], fields.Volume2.isInvalid],
        ["Concentration2", [fields.Concentration2.required ? ew.Validators.required(fields.Concentration2.caption) : null], fields.Concentration2.isInvalid],
        ["Total", [fields.Total.required ? ew.Validators.required(fields.Total.caption) : null], fields.Total.isInvalid],
        ["Total1", [fields.Total1.required ? ew.Validators.required(fields.Total1.caption) : null], fields.Total1.isInvalid],
        ["Total2", [fields.Total2.required ? ew.Validators.required(fields.Total2.caption) : null], fields.Total2.isInvalid],
        ["Progressive", [fields.Progressive.required ? ew.Validators.required(fields.Progressive.caption) : null], fields.Progressive.isInvalid],
        ["Progressive1", [fields.Progressive1.required ? ew.Validators.required(fields.Progressive1.caption) : null], fields.Progressive1.isInvalid],
        ["Progressive2", [fields.Progressive2.required ? ew.Validators.required(fields.Progressive2.caption) : null], fields.Progressive2.isInvalid],
        ["NotProgressive", [fields.NotProgressive.required ? ew.Validators.required(fields.NotProgressive.caption) : null], fields.NotProgressive.isInvalid],
        ["NotProgressive1", [fields.NotProgressive1.required ? ew.Validators.required(fields.NotProgressive1.caption) : null], fields.NotProgressive1.isInvalid],
        ["NotProgressive2", [fields.NotProgressive2.required ? ew.Validators.required(fields.NotProgressive2.caption) : null], fields.NotProgressive2.isInvalid],
        ["Motility2", [fields.Motility2.required ? ew.Validators.required(fields.Motility2.caption) : null], fields.Motility2.isInvalid],
        ["Morphology2", [fields.Morphology2.required ? ew.Validators.required(fields.Morphology2.caption) : null], fields.Morphology2.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_art_summaryadd,
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
    fivf_art_summaryadd.validate = function () {
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
    fivf_art_summaryadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_art_summaryadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fivf_art_summaryadd");
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
<form name="fivf_art_summaryadd" id="fivf_art_summaryadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_art_summary">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
    <div id="r_IVFRegistrationID" class="form-group row">
        <label id="elh_ivf_art_summary_IVFRegistrationID" for="x_IVFRegistrationID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IVFRegistrationID->caption() ?><?= $Page->IVFRegistrationID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IVFRegistrationID->cellAttributes() ?>>
<span id="el_ivf_art_summary_IVFRegistrationID">
<input type="<?= $Page->IVFRegistrationID->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_IVFRegistrationID" name="x_IVFRegistrationID" id="x_IVFRegistrationID" size="30" placeholder="<?= HtmlEncode($Page->IVFRegistrationID->getPlaceHolder()) ?>" value="<?= $Page->IVFRegistrationID->EditValue ?>"<?= $Page->IVFRegistrationID->editAttributes() ?> aria-describedby="x_IVFRegistrationID_help">
<?= $Page->IVFRegistrationID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IVFRegistrationID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
    <div id="r_ARTCycle" class="form-group row">
        <label id="elh_ivf_art_summary_ARTCycle" for="x_ARTCycle" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ARTCycle->caption() ?><?= $Page->ARTCycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el_ivf_art_summary_ARTCycle">
<input type="<?= $Page->ARTCycle->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_ARTCycle" name="x_ARTCycle" id="x_ARTCycle" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ARTCycle->getPlaceHolder()) ?>" value="<?= $Page->ARTCycle->EditValue ?>"<?= $Page->ARTCycle->editAttributes() ?> aria-describedby="x_ARTCycle_help">
<?= $Page->ARTCycle->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ARTCycle->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Spermorigin->Visible) { // Spermorigin ?>
    <div id="r_Spermorigin" class="form-group row">
        <label id="elh_ivf_art_summary_Spermorigin" for="x_Spermorigin" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Spermorigin->caption() ?><?= $Page->Spermorigin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Spermorigin->cellAttributes() ?>>
<span id="el_ivf_art_summary_Spermorigin">
<input type="<?= $Page->Spermorigin->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Spermorigin" name="x_Spermorigin" id="x_Spermorigin" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Spermorigin->getPlaceHolder()) ?>" value="<?= $Page->Spermorigin->EditValue ?>"<?= $Page->Spermorigin->editAttributes() ?> aria-describedby="x_Spermorigin_help">
<?= $Page->Spermorigin->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Spermorigin->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
    <div id="r_InseminatinTechnique" class="form-group row">
        <label id="elh_ivf_art_summary_InseminatinTechnique" for="x_InseminatinTechnique" class="<?= $Page->LeftColumnClass ?>"><?= $Page->InseminatinTechnique->caption() ?><?= $Page->InseminatinTechnique->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<span id="el_ivf_art_summary_InseminatinTechnique">
<input type="<?= $Page->InseminatinTechnique->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_InseminatinTechnique" name="x_InseminatinTechnique" id="x_InseminatinTechnique" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->InseminatinTechnique->getPlaceHolder()) ?>" value="<?= $Page->InseminatinTechnique->EditValue ?>"<?= $Page->InseminatinTechnique->editAttributes() ?> aria-describedby="x_InseminatinTechnique_help">
<?= $Page->InseminatinTechnique->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->InseminatinTechnique->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IndicationforART->Visible) { // IndicationforART ?>
    <div id="r_IndicationforART" class="form-group row">
        <label id="elh_ivf_art_summary_IndicationforART" for="x_IndicationforART" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IndicationforART->caption() ?><?= $Page->IndicationforART->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IndicationforART->cellAttributes() ?>>
<span id="el_ivf_art_summary_IndicationforART">
<input type="<?= $Page->IndicationforART->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_IndicationforART" name="x_IndicationforART" id="x_IndicationforART" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IndicationforART->getPlaceHolder()) ?>" value="<?= $Page->IndicationforART->EditValue ?>"<?= $Page->IndicationforART->editAttributes() ?> aria-describedby="x_IndicationforART_help">
<?= $Page->IndicationforART->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IndicationforART->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ICSIDetails->Visible) { // ICSIDetails ?>
    <div id="r_ICSIDetails" class="form-group row">
        <label id="elh_ivf_art_summary_ICSIDetails" for="x_ICSIDetails" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ICSIDetails->caption() ?><?= $Page->ICSIDetails->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ICSIDetails->cellAttributes() ?>>
<span id="el_ivf_art_summary_ICSIDetails">
<input type="<?= $Page->ICSIDetails->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_ICSIDetails" name="x_ICSIDetails" id="x_ICSIDetails" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ICSIDetails->getPlaceHolder()) ?>" value="<?= $Page->ICSIDetails->EditValue ?>"<?= $Page->ICSIDetails->editAttributes() ?> aria-describedby="x_ICSIDetails_help">
<?= $Page->ICSIDetails->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ICSIDetails->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DateofICSI->Visible) { // DateofICSI ?>
    <div id="r_DateofICSI" class="form-group row">
        <label id="elh_ivf_art_summary_DateofICSI" for="x_DateofICSI" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DateofICSI->caption() ?><?= $Page->DateofICSI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DateofICSI->cellAttributes() ?>>
<span id="el_ivf_art_summary_DateofICSI">
<input type="<?= $Page->DateofICSI->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_DateofICSI" name="x_DateofICSI" id="x_DateofICSI" placeholder="<?= HtmlEncode($Page->DateofICSI->getPlaceHolder()) ?>" value="<?= $Page->DateofICSI->EditValue ?>"<?= $Page->DateofICSI->editAttributes() ?> aria-describedby="x_DateofICSI_help">
<?= $Page->DateofICSI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DateofICSI->getErrorMessage() ?></div>
<?php if (!$Page->DateofICSI->ReadOnly && !$Page->DateofICSI->Disabled && !isset($Page->DateofICSI->EditAttrs["readonly"]) && !isset($Page->DateofICSI->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_art_summaryadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_art_summaryadd", "x_DateofICSI", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
    <div id="r_Origin" class="form-group row">
        <label id="elh_ivf_art_summary_Origin" for="x_Origin" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Origin->caption() ?><?= $Page->Origin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Origin->cellAttributes() ?>>
<span id="el_ivf_art_summary_Origin">
<input type="<?= $Page->Origin->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Origin" name="x_Origin" id="x_Origin" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Origin->getPlaceHolder()) ?>" value="<?= $Page->Origin->EditValue ?>"<?= $Page->Origin->editAttributes() ?> aria-describedby="x_Origin_help">
<?= $Page->Origin->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Origin->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <div id="r_Status" class="form-group row">
        <label id="elh_ivf_art_summary_Status" for="x_Status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Status->caption() ?><?= $Page->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Status->cellAttributes() ?>>
<span id="el_ivf_art_summary_Status">
<input type="<?= $Page->Status->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Status" name="x_Status" id="x_Status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Status->getPlaceHolder()) ?>" value="<?= $Page->Status->EditValue ?>"<?= $Page->Status->editAttributes() ?> aria-describedby="x_Status_help">
<?= $Page->Status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <div id="r_Method" class="form-group row">
        <label id="elh_ivf_art_summary_Method" for="x_Method" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Method->caption() ?><?= $Page->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Method->cellAttributes() ?>>
<span id="el_ivf_art_summary_Method">
<input type="<?= $Page->Method->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>" value="<?= $Page->Method->EditValue ?>"<?= $Page->Method->editAttributes() ?> aria-describedby="x_Method_help">
<?= $Page->Method->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Method->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pre_Concentration->Visible) { // pre_Concentration ?>
    <div id="r_pre_Concentration" class="form-group row">
        <label id="elh_ivf_art_summary_pre_Concentration" for="x_pre_Concentration" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pre_Concentration->caption() ?><?= $Page->pre_Concentration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pre_Concentration->cellAttributes() ?>>
<span id="el_ivf_art_summary_pre_Concentration">
<input type="<?= $Page->pre_Concentration->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_pre_Concentration" name="x_pre_Concentration" id="x_pre_Concentration" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pre_Concentration->getPlaceHolder()) ?>" value="<?= $Page->pre_Concentration->EditValue ?>"<?= $Page->pre_Concentration->editAttributes() ?> aria-describedby="x_pre_Concentration_help">
<?= $Page->pre_Concentration->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pre_Concentration->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pre_Motility->Visible) { // pre_Motility ?>
    <div id="r_pre_Motility" class="form-group row">
        <label id="elh_ivf_art_summary_pre_Motility" for="x_pre_Motility" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pre_Motility->caption() ?><?= $Page->pre_Motility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pre_Motility->cellAttributes() ?>>
<span id="el_ivf_art_summary_pre_Motility">
<input type="<?= $Page->pre_Motility->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_pre_Motility" name="x_pre_Motility" id="x_pre_Motility" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pre_Motility->getPlaceHolder()) ?>" value="<?= $Page->pre_Motility->EditValue ?>"<?= $Page->pre_Motility->editAttributes() ?> aria-describedby="x_pre_Motility_help">
<?= $Page->pre_Motility->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pre_Motility->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pre_Morphology->Visible) { // pre_Morphology ?>
    <div id="r_pre_Morphology" class="form-group row">
        <label id="elh_ivf_art_summary_pre_Morphology" for="x_pre_Morphology" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pre_Morphology->caption() ?><?= $Page->pre_Morphology->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pre_Morphology->cellAttributes() ?>>
<span id="el_ivf_art_summary_pre_Morphology">
<input type="<?= $Page->pre_Morphology->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_pre_Morphology" name="x_pre_Morphology" id="x_pre_Morphology" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pre_Morphology->getPlaceHolder()) ?>" value="<?= $Page->pre_Morphology->EditValue ?>"<?= $Page->pre_Morphology->editAttributes() ?> aria-describedby="x_pre_Morphology_help">
<?= $Page->pre_Morphology->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pre_Morphology->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->post_Concentration->Visible) { // post_Concentration ?>
    <div id="r_post_Concentration" class="form-group row">
        <label id="elh_ivf_art_summary_post_Concentration" for="x_post_Concentration" class="<?= $Page->LeftColumnClass ?>"><?= $Page->post_Concentration->caption() ?><?= $Page->post_Concentration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->post_Concentration->cellAttributes() ?>>
<span id="el_ivf_art_summary_post_Concentration">
<input type="<?= $Page->post_Concentration->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_post_Concentration" name="x_post_Concentration" id="x_post_Concentration" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->post_Concentration->getPlaceHolder()) ?>" value="<?= $Page->post_Concentration->EditValue ?>"<?= $Page->post_Concentration->editAttributes() ?> aria-describedby="x_post_Concentration_help">
<?= $Page->post_Concentration->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->post_Concentration->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->post_Motility->Visible) { // post_Motility ?>
    <div id="r_post_Motility" class="form-group row">
        <label id="elh_ivf_art_summary_post_Motility" for="x_post_Motility" class="<?= $Page->LeftColumnClass ?>"><?= $Page->post_Motility->caption() ?><?= $Page->post_Motility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->post_Motility->cellAttributes() ?>>
<span id="el_ivf_art_summary_post_Motility">
<input type="<?= $Page->post_Motility->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_post_Motility" name="x_post_Motility" id="x_post_Motility" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->post_Motility->getPlaceHolder()) ?>" value="<?= $Page->post_Motility->EditValue ?>"<?= $Page->post_Motility->editAttributes() ?> aria-describedby="x_post_Motility_help">
<?= $Page->post_Motility->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->post_Motility->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->post_Morphology->Visible) { // post_Morphology ?>
    <div id="r_post_Morphology" class="form-group row">
        <label id="elh_ivf_art_summary_post_Morphology" for="x_post_Morphology" class="<?= $Page->LeftColumnClass ?>"><?= $Page->post_Morphology->caption() ?><?= $Page->post_Morphology->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->post_Morphology->cellAttributes() ?>>
<span id="el_ivf_art_summary_post_Morphology">
<input type="<?= $Page->post_Morphology->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_post_Morphology" name="x_post_Morphology" id="x_post_Morphology" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->post_Morphology->getPlaceHolder()) ?>" value="<?= $Page->post_Morphology->EditValue ?>"<?= $Page->post_Morphology->editAttributes() ?> aria-describedby="x_post_Morphology_help">
<?= $Page->post_Morphology->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->post_Morphology->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DateofET->Visible) { // DateofET ?>
    <div id="r_DateofET" class="form-group row">
        <label id="elh_ivf_art_summary_DateofET" for="x_DateofET" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DateofET->caption() ?><?= $Page->DateofET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DateofET->cellAttributes() ?>>
<span id="el_ivf_art_summary_DateofET">
<input type="<?= $Page->DateofET->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_DateofET" name="x_DateofET" id="x_DateofET" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DateofET->getPlaceHolder()) ?>" value="<?= $Page->DateofET->EditValue ?>"<?= $Page->DateofET->editAttributes() ?> aria-describedby="x_DateofET_help">
<?= $Page->DateofET->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DateofET->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
    <div id="r_NumberofEmbryostransferred" class="form-group row">
        <label id="elh_ivf_art_summary_NumberofEmbryostransferred" for="x_NumberofEmbryostransferred" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NumberofEmbryostransferred->caption() ?><?= $Page->NumberofEmbryostransferred->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NumberofEmbryostransferred->cellAttributes() ?>>
<span id="el_ivf_art_summary_NumberofEmbryostransferred">
<input type="<?= $Page->NumberofEmbryostransferred->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_NumberofEmbryostransferred" name="x_NumberofEmbryostransferred" id="x_NumberofEmbryostransferred" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NumberofEmbryostransferred->getPlaceHolder()) ?>" value="<?= $Page->NumberofEmbryostransferred->EditValue ?>"<?= $Page->NumberofEmbryostransferred->editAttributes() ?> aria-describedby="x_NumberofEmbryostransferred_help">
<?= $Page->NumberofEmbryostransferred->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NumberofEmbryostransferred->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
    <div id="r_Reasonfornotranfer" class="form-group row">
        <label id="elh_ivf_art_summary_Reasonfornotranfer" for="x_Reasonfornotranfer" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Reasonfornotranfer->caption() ?><?= $Page->Reasonfornotranfer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reasonfornotranfer->cellAttributes() ?>>
<span id="el_ivf_art_summary_Reasonfornotranfer">
<input type="<?= $Page->Reasonfornotranfer->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Reasonfornotranfer" name="x_Reasonfornotranfer" id="x_Reasonfornotranfer" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Reasonfornotranfer->getPlaceHolder()) ?>" value="<?= $Page->Reasonfornotranfer->EditValue ?>"<?= $Page->Reasonfornotranfer->editAttributes() ?> aria-describedby="x_Reasonfornotranfer_help">
<?= $Page->Reasonfornotranfer->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reasonfornotranfer->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
    <div id="r_Embryosunderobservation" class="form-group row">
        <label id="elh_ivf_art_summary_Embryosunderobservation" for="x_Embryosunderobservation" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Embryosunderobservation->caption() ?><?= $Page->Embryosunderobservation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Embryosunderobservation->cellAttributes() ?>>
<span id="el_ivf_art_summary_Embryosunderobservation">
<input type="<?= $Page->Embryosunderobservation->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Embryosunderobservation" name="x_Embryosunderobservation" id="x_Embryosunderobservation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Embryosunderobservation->getPlaceHolder()) ?>" value="<?= $Page->Embryosunderobservation->EditValue ?>"<?= $Page->Embryosunderobservation->editAttributes() ?> aria-describedby="x_Embryosunderobservation_help">
<?= $Page->Embryosunderobservation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Embryosunderobservation->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
    <div id="r_EmbryosCryopreserved" class="form-group row">
        <label id="elh_ivf_art_summary_EmbryosCryopreserved" for="x_EmbryosCryopreserved" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EmbryosCryopreserved->caption() ?><?= $Page->EmbryosCryopreserved->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EmbryosCryopreserved->cellAttributes() ?>>
<span id="el_ivf_art_summary_EmbryosCryopreserved">
<input type="<?= $Page->EmbryosCryopreserved->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_EmbryosCryopreserved" name="x_EmbryosCryopreserved" id="x_EmbryosCryopreserved" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EmbryosCryopreserved->getPlaceHolder()) ?>" value="<?= $Page->EmbryosCryopreserved->EditValue ?>"<?= $Page->EmbryosCryopreserved->editAttributes() ?> aria-describedby="x_EmbryosCryopreserved_help">
<?= $Page->EmbryosCryopreserved->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EmbryosCryopreserved->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
    <div id="r_EmbryoDevelopmentSummary" class="form-group row">
        <label id="elh_ivf_art_summary_EmbryoDevelopmentSummary" for="x_EmbryoDevelopmentSummary" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EmbryoDevelopmentSummary->caption() ?><?= $Page->EmbryoDevelopmentSummary->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EmbryoDevelopmentSummary->cellAttributes() ?>>
<span id="el_ivf_art_summary_EmbryoDevelopmentSummary">
<input type="<?= $Page->EmbryoDevelopmentSummary->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_EmbryoDevelopmentSummary" name="x_EmbryoDevelopmentSummary" id="x_EmbryoDevelopmentSummary" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EmbryoDevelopmentSummary->getPlaceHolder()) ?>" value="<?= $Page->EmbryoDevelopmentSummary->EditValue ?>"<?= $Page->EmbryoDevelopmentSummary->editAttributes() ?> aria-describedby="x_EmbryoDevelopmentSummary_help">
<?= $Page->EmbryoDevelopmentSummary->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EmbryoDevelopmentSummary->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LegendCellStage->Visible) { // LegendCellStage ?>
    <div id="r_LegendCellStage" class="form-group row">
        <label id="elh_ivf_art_summary_LegendCellStage" for="x_LegendCellStage" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LegendCellStage->caption() ?><?= $Page->LegendCellStage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LegendCellStage->cellAttributes() ?>>
<span id="el_ivf_art_summary_LegendCellStage">
<input type="<?= $Page->LegendCellStage->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_LegendCellStage" name="x_LegendCellStage" id="x_LegendCellStage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LegendCellStage->getPlaceHolder()) ?>" value="<?= $Page->LegendCellStage->EditValue ?>"<?= $Page->LegendCellStage->editAttributes() ?> aria-describedby="x_LegendCellStage_help">
<?= $Page->LegendCellStage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LegendCellStage->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
    <div id="r_EmbryologistSignature" class="form-group row">
        <label id="elh_ivf_art_summary_EmbryologistSignature" for="x_EmbryologistSignature" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EmbryologistSignature->caption() ?><?= $Page->EmbryologistSignature->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EmbryologistSignature->cellAttributes() ?>>
<span id="el_ivf_art_summary_EmbryologistSignature">
<input type="<?= $Page->EmbryologistSignature->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_EmbryologistSignature" name="x_EmbryologistSignature" id="x_EmbryologistSignature" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EmbryologistSignature->getPlaceHolder()) ?>" value="<?= $Page->EmbryologistSignature->EditValue ?>"<?= $Page->EmbryologistSignature->editAttributes() ?> aria-describedby="x_EmbryologistSignature_help">
<?= $Page->EmbryologistSignature->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EmbryologistSignature->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
    <div id="r_ConsultantsSignature" class="form-group row">
        <label id="elh_ivf_art_summary_ConsultantsSignature" for="x_ConsultantsSignature" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ConsultantsSignature->caption() ?><?= $Page->ConsultantsSignature->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ConsultantsSignature->cellAttributes() ?>>
<span id="el_ivf_art_summary_ConsultantsSignature">
<input type="<?= $Page->ConsultantsSignature->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_ConsultantsSignature" name="x_ConsultantsSignature" id="x_ConsultantsSignature" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ConsultantsSignature->getPlaceHolder()) ?>" value="<?= $Page->ConsultantsSignature->EditValue ?>"<?= $Page->ConsultantsSignature->editAttributes() ?> aria-describedby="x_ConsultantsSignature_help">
<?= $Page->ConsultantsSignature->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ConsultantsSignature->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_art_summary_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_art_summary_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->M2->Visible) { // M2 ?>
    <div id="r_M2" class="form-group row">
        <label id="elh_ivf_art_summary_M2" for="x_M2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->M2->caption() ?><?= $Page->M2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->M2->cellAttributes() ?>>
<span id="el_ivf_art_summary_M2">
<input type="<?= $Page->M2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_M2" name="x_M2" id="x_M2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->M2->getPlaceHolder()) ?>" value="<?= $Page->M2->EditValue ?>"<?= $Page->M2->editAttributes() ?> aria-describedby="x_M2_help">
<?= $Page->M2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->M2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mi2->Visible) { // Mi2 ?>
    <div id="r_Mi2" class="form-group row">
        <label id="elh_ivf_art_summary_Mi2" for="x_Mi2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Mi2->caption() ?><?= $Page->Mi2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mi2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Mi2">
<input type="<?= $Page->Mi2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Mi2" name="x_Mi2" id="x_Mi2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mi2->getPlaceHolder()) ?>" value="<?= $Page->Mi2->EditValue ?>"<?= $Page->Mi2->editAttributes() ?> aria-describedby="x_Mi2_help">
<?= $Page->Mi2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mi2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ICSI->Visible) { // ICSI ?>
    <div id="r_ICSI" class="form-group row">
        <label id="elh_ivf_art_summary_ICSI" for="x_ICSI" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ICSI->caption() ?><?= $Page->ICSI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ICSI->cellAttributes() ?>>
<span id="el_ivf_art_summary_ICSI">
<input type="<?= $Page->ICSI->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_ICSI" name="x_ICSI" id="x_ICSI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ICSI->getPlaceHolder()) ?>" value="<?= $Page->ICSI->EditValue ?>"<?= $Page->ICSI->editAttributes() ?> aria-describedby="x_ICSI_help">
<?= $Page->ICSI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ICSI->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IVF->Visible) { // IVF ?>
    <div id="r_IVF" class="form-group row">
        <label id="elh_ivf_art_summary_IVF" for="x_IVF" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IVF->caption() ?><?= $Page->IVF->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IVF->cellAttributes() ?>>
<span id="el_ivf_art_summary_IVF">
<input type="<?= $Page->IVF->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_IVF" name="x_IVF" id="x_IVF" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IVF->getPlaceHolder()) ?>" value="<?= $Page->IVF->EditValue ?>"<?= $Page->IVF->editAttributes() ?> aria-describedby="x_IVF_help">
<?= $Page->IVF->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IVF->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->M1->Visible) { // M1 ?>
    <div id="r_M1" class="form-group row">
        <label id="elh_ivf_art_summary_M1" for="x_M1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->M1->caption() ?><?= $Page->M1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->M1->cellAttributes() ?>>
<span id="el_ivf_art_summary_M1">
<input type="<?= $Page->M1->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_M1" name="x_M1" id="x_M1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->M1->getPlaceHolder()) ?>" value="<?= $Page->M1->EditValue ?>"<?= $Page->M1->editAttributes() ?> aria-describedby="x_M1_help">
<?= $Page->M1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->M1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GV->Visible) { // GV ?>
    <div id="r_GV" class="form-group row">
        <label id="elh_ivf_art_summary_GV" for="x_GV" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GV->caption() ?><?= $Page->GV->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GV->cellAttributes() ?>>
<span id="el_ivf_art_summary_GV">
<input type="<?= $Page->GV->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_GV" name="x_GV" id="x_GV" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GV->getPlaceHolder()) ?>" value="<?= $Page->GV->EditValue ?>"<?= $Page->GV->editAttributes() ?> aria-describedby="x_GV_help">
<?= $Page->GV->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GV->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_Others->Visible) { // Others ?>
    <div id="r__Others" class="form-group row">
        <label id="elh_ivf_art_summary__Others" for="x__Others" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_Others->caption() ?><?= $Page->_Others->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_Others->cellAttributes() ?>>
<span id="el_ivf_art_summary__Others">
<input type="<?= $Page->_Others->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x__Others" name="x__Others" id="x__Others" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->_Others->getPlaceHolder()) ?>" value="<?= $Page->_Others->EditValue ?>"<?= $Page->_Others->editAttributes() ?> aria-describedby="x__Others_help">
<?= $Page->_Others->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_Others->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Normal2PN->Visible) { // Normal2PN ?>
    <div id="r_Normal2PN" class="form-group row">
        <label id="elh_ivf_art_summary_Normal2PN" for="x_Normal2PN" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Normal2PN->caption() ?><?= $Page->Normal2PN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Normal2PN->cellAttributes() ?>>
<span id="el_ivf_art_summary_Normal2PN">
<input type="<?= $Page->Normal2PN->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Normal2PN" name="x_Normal2PN" id="x_Normal2PN" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Normal2PN->getPlaceHolder()) ?>" value="<?= $Page->Normal2PN->EditValue ?>"<?= $Page->Normal2PN->editAttributes() ?> aria-describedby="x_Normal2PN_help">
<?= $Page->Normal2PN->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Normal2PN->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
    <div id="r_Abnormalfertilisation1N" class="form-group row">
        <label id="elh_ivf_art_summary_Abnormalfertilisation1N" for="x_Abnormalfertilisation1N" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Abnormalfertilisation1N->caption() ?><?= $Page->Abnormalfertilisation1N->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Abnormalfertilisation1N->cellAttributes() ?>>
<span id="el_ivf_art_summary_Abnormalfertilisation1N">
<input type="<?= $Page->Abnormalfertilisation1N->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation1N" name="x_Abnormalfertilisation1N" id="x_Abnormalfertilisation1N" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Abnormalfertilisation1N->getPlaceHolder()) ?>" value="<?= $Page->Abnormalfertilisation1N->EditValue ?>"<?= $Page->Abnormalfertilisation1N->editAttributes() ?> aria-describedby="x_Abnormalfertilisation1N_help">
<?= $Page->Abnormalfertilisation1N->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Abnormalfertilisation1N->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
    <div id="r_Abnormalfertilisation3N" class="form-group row">
        <label id="elh_ivf_art_summary_Abnormalfertilisation3N" for="x_Abnormalfertilisation3N" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Abnormalfertilisation3N->caption() ?><?= $Page->Abnormalfertilisation3N->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Abnormalfertilisation3N->cellAttributes() ?>>
<span id="el_ivf_art_summary_Abnormalfertilisation3N">
<input type="<?= $Page->Abnormalfertilisation3N->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation3N" name="x_Abnormalfertilisation3N" id="x_Abnormalfertilisation3N" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Abnormalfertilisation3N->getPlaceHolder()) ?>" value="<?= $Page->Abnormalfertilisation3N->EditValue ?>"<?= $Page->Abnormalfertilisation3N->editAttributes() ?> aria-describedby="x_Abnormalfertilisation3N_help">
<?= $Page->Abnormalfertilisation3N->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Abnormalfertilisation3N->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NotFertilized->Visible) { // NotFertilized ?>
    <div id="r_NotFertilized" class="form-group row">
        <label id="elh_ivf_art_summary_NotFertilized" for="x_NotFertilized" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NotFertilized->caption() ?><?= $Page->NotFertilized->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NotFertilized->cellAttributes() ?>>
<span id="el_ivf_art_summary_NotFertilized">
<input type="<?= $Page->NotFertilized->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_NotFertilized" name="x_NotFertilized" id="x_NotFertilized" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NotFertilized->getPlaceHolder()) ?>" value="<?= $Page->NotFertilized->EditValue ?>"<?= $Page->NotFertilized->editAttributes() ?> aria-describedby="x_NotFertilized_help">
<?= $Page->NotFertilized->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NotFertilized->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Degenerated->Visible) { // Degenerated ?>
    <div id="r_Degenerated" class="form-group row">
        <label id="elh_ivf_art_summary_Degenerated" for="x_Degenerated" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Degenerated->caption() ?><?= $Page->Degenerated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Degenerated->cellAttributes() ?>>
<span id="el_ivf_art_summary_Degenerated">
<input type="<?= $Page->Degenerated->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Degenerated" name="x_Degenerated" id="x_Degenerated" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Degenerated->getPlaceHolder()) ?>" value="<?= $Page->Degenerated->EditValue ?>"<?= $Page->Degenerated->editAttributes() ?> aria-describedby="x_Degenerated_help">
<?= $Page->Degenerated->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Degenerated->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SpermDate->Visible) { // SpermDate ?>
    <div id="r_SpermDate" class="form-group row">
        <label id="elh_ivf_art_summary_SpermDate" for="x_SpermDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SpermDate->caption() ?><?= $Page->SpermDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SpermDate->cellAttributes() ?>>
<span id="el_ivf_art_summary_SpermDate">
<input type="<?= $Page->SpermDate->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_SpermDate" name="x_SpermDate" id="x_SpermDate" placeholder="<?= HtmlEncode($Page->SpermDate->getPlaceHolder()) ?>" value="<?= $Page->SpermDate->EditValue ?>"<?= $Page->SpermDate->editAttributes() ?> aria-describedby="x_SpermDate_help">
<?= $Page->SpermDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SpermDate->getErrorMessage() ?></div>
<?php if (!$Page->SpermDate->ReadOnly && !$Page->SpermDate->Disabled && !isset($Page->SpermDate->EditAttrs["readonly"]) && !isset($Page->SpermDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_art_summaryadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_art_summaryadd", "x_SpermDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Code1->Visible) { // Code1 ?>
    <div id="r_Code1" class="form-group row">
        <label id="elh_ivf_art_summary_Code1" for="x_Code1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Code1->caption() ?><?= $Page->Code1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Code1->cellAttributes() ?>>
<span id="el_ivf_art_summary_Code1">
<input type="<?= $Page->Code1->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Code1" name="x_Code1" id="x_Code1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Code1->getPlaceHolder()) ?>" value="<?= $Page->Code1->EditValue ?>"<?= $Page->Code1->editAttributes() ?> aria-describedby="x_Code1_help">
<?= $Page->Code1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Code1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day1->Visible) { // Day1 ?>
    <div id="r_Day1" class="form-group row">
        <label id="elh_ivf_art_summary_Day1" for="x_Day1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day1->caption() ?><?= $Page->Day1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day1->cellAttributes() ?>>
<span id="el_ivf_art_summary_Day1">
<input type="<?= $Page->Day1->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Day1" name="x_Day1" id="x_Day1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Day1->getPlaceHolder()) ?>" value="<?= $Page->Day1->EditValue ?>"<?= $Page->Day1->editAttributes() ?> aria-describedby="x_Day1_help">
<?= $Page->Day1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CellStage1->Visible) { // CellStage1 ?>
    <div id="r_CellStage1" class="form-group row">
        <label id="elh_ivf_art_summary_CellStage1" for="x_CellStage1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CellStage1->caption() ?><?= $Page->CellStage1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CellStage1->cellAttributes() ?>>
<span id="el_ivf_art_summary_CellStage1">
<input type="<?= $Page->CellStage1->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_CellStage1" name="x_CellStage1" id="x_CellStage1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CellStage1->getPlaceHolder()) ?>" value="<?= $Page->CellStage1->EditValue ?>"<?= $Page->CellStage1->editAttributes() ?> aria-describedby="x_CellStage1_help">
<?= $Page->CellStage1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CellStage1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Grade1->Visible) { // Grade1 ?>
    <div id="r_Grade1" class="form-group row">
        <label id="elh_ivf_art_summary_Grade1" for="x_Grade1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Grade1->caption() ?><?= $Page->Grade1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Grade1->cellAttributes() ?>>
<span id="el_ivf_art_summary_Grade1">
<input type="<?= $Page->Grade1->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Grade1" name="x_Grade1" id="x_Grade1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Grade1->getPlaceHolder()) ?>" value="<?= $Page->Grade1->EditValue ?>"<?= $Page->Grade1->editAttributes() ?> aria-describedby="x_Grade1_help">
<?= $Page->Grade1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Grade1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->State1->Visible) { // State1 ?>
    <div id="r_State1" class="form-group row">
        <label id="elh_ivf_art_summary_State1" for="x_State1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->State1->caption() ?><?= $Page->State1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->State1->cellAttributes() ?>>
<span id="el_ivf_art_summary_State1">
<input type="<?= $Page->State1->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_State1" name="x_State1" id="x_State1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->State1->getPlaceHolder()) ?>" value="<?= $Page->State1->EditValue ?>"<?= $Page->State1->editAttributes() ?> aria-describedby="x_State1_help">
<?= $Page->State1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->State1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Code2->Visible) { // Code2 ?>
    <div id="r_Code2" class="form-group row">
        <label id="elh_ivf_art_summary_Code2" for="x_Code2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Code2->caption() ?><?= $Page->Code2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Code2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Code2">
<input type="<?= $Page->Code2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Code2" name="x_Code2" id="x_Code2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Code2->getPlaceHolder()) ?>" value="<?= $Page->Code2->EditValue ?>"<?= $Page->Code2->editAttributes() ?> aria-describedby="x_Code2_help">
<?= $Page->Code2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Code2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day2->Visible) { // Day2 ?>
    <div id="r_Day2" class="form-group row">
        <label id="elh_ivf_art_summary_Day2" for="x_Day2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day2->caption() ?><?= $Page->Day2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Day2">
<input type="<?= $Page->Day2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Day2" name="x_Day2" id="x_Day2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Day2->getPlaceHolder()) ?>" value="<?= $Page->Day2->EditValue ?>"<?= $Page->Day2->editAttributes() ?> aria-describedby="x_Day2_help">
<?= $Page->Day2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CellStage2->Visible) { // CellStage2 ?>
    <div id="r_CellStage2" class="form-group row">
        <label id="elh_ivf_art_summary_CellStage2" for="x_CellStage2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CellStage2->caption() ?><?= $Page->CellStage2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CellStage2->cellAttributes() ?>>
<span id="el_ivf_art_summary_CellStage2">
<input type="<?= $Page->CellStage2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_CellStage2" name="x_CellStage2" id="x_CellStage2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CellStage2->getPlaceHolder()) ?>" value="<?= $Page->CellStage2->EditValue ?>"<?= $Page->CellStage2->editAttributes() ?> aria-describedby="x_CellStage2_help">
<?= $Page->CellStage2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CellStage2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Grade2->Visible) { // Grade2 ?>
    <div id="r_Grade2" class="form-group row">
        <label id="elh_ivf_art_summary_Grade2" for="x_Grade2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Grade2->caption() ?><?= $Page->Grade2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Grade2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Grade2">
<input type="<?= $Page->Grade2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Grade2" name="x_Grade2" id="x_Grade2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Grade2->getPlaceHolder()) ?>" value="<?= $Page->Grade2->EditValue ?>"<?= $Page->Grade2->editAttributes() ?> aria-describedby="x_Grade2_help">
<?= $Page->Grade2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Grade2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->State2->Visible) { // State2 ?>
    <div id="r_State2" class="form-group row">
        <label id="elh_ivf_art_summary_State2" for="x_State2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->State2->caption() ?><?= $Page->State2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->State2->cellAttributes() ?>>
<span id="el_ivf_art_summary_State2">
<input type="<?= $Page->State2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_State2" name="x_State2" id="x_State2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->State2->getPlaceHolder()) ?>" value="<?= $Page->State2->EditValue ?>"<?= $Page->State2->editAttributes() ?> aria-describedby="x_State2_help">
<?= $Page->State2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->State2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Code3->Visible) { // Code3 ?>
    <div id="r_Code3" class="form-group row">
        <label id="elh_ivf_art_summary_Code3" for="x_Code3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Code3->caption() ?><?= $Page->Code3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Code3->cellAttributes() ?>>
<span id="el_ivf_art_summary_Code3">
<input type="<?= $Page->Code3->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Code3" name="x_Code3" id="x_Code3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Code3->getPlaceHolder()) ?>" value="<?= $Page->Code3->EditValue ?>"<?= $Page->Code3->editAttributes() ?> aria-describedby="x_Code3_help">
<?= $Page->Code3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Code3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day3->Visible) { // Day3 ?>
    <div id="r_Day3" class="form-group row">
        <label id="elh_ivf_art_summary_Day3" for="x_Day3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day3->caption() ?><?= $Page->Day3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day3->cellAttributes() ?>>
<span id="el_ivf_art_summary_Day3">
<input type="<?= $Page->Day3->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Day3" name="x_Day3" id="x_Day3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Day3->getPlaceHolder()) ?>" value="<?= $Page->Day3->EditValue ?>"<?= $Page->Day3->editAttributes() ?> aria-describedby="x_Day3_help">
<?= $Page->Day3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CellStage3->Visible) { // CellStage3 ?>
    <div id="r_CellStage3" class="form-group row">
        <label id="elh_ivf_art_summary_CellStage3" for="x_CellStage3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CellStage3->caption() ?><?= $Page->CellStage3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CellStage3->cellAttributes() ?>>
<span id="el_ivf_art_summary_CellStage3">
<input type="<?= $Page->CellStage3->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_CellStage3" name="x_CellStage3" id="x_CellStage3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CellStage3->getPlaceHolder()) ?>" value="<?= $Page->CellStage3->EditValue ?>"<?= $Page->CellStage3->editAttributes() ?> aria-describedby="x_CellStage3_help">
<?= $Page->CellStage3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CellStage3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Grade3->Visible) { // Grade3 ?>
    <div id="r_Grade3" class="form-group row">
        <label id="elh_ivf_art_summary_Grade3" for="x_Grade3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Grade3->caption() ?><?= $Page->Grade3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Grade3->cellAttributes() ?>>
<span id="el_ivf_art_summary_Grade3">
<input type="<?= $Page->Grade3->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Grade3" name="x_Grade3" id="x_Grade3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Grade3->getPlaceHolder()) ?>" value="<?= $Page->Grade3->EditValue ?>"<?= $Page->Grade3->editAttributes() ?> aria-describedby="x_Grade3_help">
<?= $Page->Grade3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Grade3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->State3->Visible) { // State3 ?>
    <div id="r_State3" class="form-group row">
        <label id="elh_ivf_art_summary_State3" for="x_State3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->State3->caption() ?><?= $Page->State3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->State3->cellAttributes() ?>>
<span id="el_ivf_art_summary_State3">
<input type="<?= $Page->State3->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_State3" name="x_State3" id="x_State3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->State3->getPlaceHolder()) ?>" value="<?= $Page->State3->EditValue ?>"<?= $Page->State3->editAttributes() ?> aria-describedby="x_State3_help">
<?= $Page->State3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->State3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Code4->Visible) { // Code4 ?>
    <div id="r_Code4" class="form-group row">
        <label id="elh_ivf_art_summary_Code4" for="x_Code4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Code4->caption() ?><?= $Page->Code4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Code4->cellAttributes() ?>>
<span id="el_ivf_art_summary_Code4">
<input type="<?= $Page->Code4->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Code4" name="x_Code4" id="x_Code4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Code4->getPlaceHolder()) ?>" value="<?= $Page->Code4->EditValue ?>"<?= $Page->Code4->editAttributes() ?> aria-describedby="x_Code4_help">
<?= $Page->Code4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Code4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day4->Visible) { // Day4 ?>
    <div id="r_Day4" class="form-group row">
        <label id="elh_ivf_art_summary_Day4" for="x_Day4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day4->caption() ?><?= $Page->Day4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day4->cellAttributes() ?>>
<span id="el_ivf_art_summary_Day4">
<input type="<?= $Page->Day4->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Day4" name="x_Day4" id="x_Day4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Day4->getPlaceHolder()) ?>" value="<?= $Page->Day4->EditValue ?>"<?= $Page->Day4->editAttributes() ?> aria-describedby="x_Day4_help">
<?= $Page->Day4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CellStage4->Visible) { // CellStage4 ?>
    <div id="r_CellStage4" class="form-group row">
        <label id="elh_ivf_art_summary_CellStage4" for="x_CellStage4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CellStage4->caption() ?><?= $Page->CellStage4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CellStage4->cellAttributes() ?>>
<span id="el_ivf_art_summary_CellStage4">
<input type="<?= $Page->CellStage4->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_CellStage4" name="x_CellStage4" id="x_CellStage4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CellStage4->getPlaceHolder()) ?>" value="<?= $Page->CellStage4->EditValue ?>"<?= $Page->CellStage4->editAttributes() ?> aria-describedby="x_CellStage4_help">
<?= $Page->CellStage4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CellStage4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Grade4->Visible) { // Grade4 ?>
    <div id="r_Grade4" class="form-group row">
        <label id="elh_ivf_art_summary_Grade4" for="x_Grade4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Grade4->caption() ?><?= $Page->Grade4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Grade4->cellAttributes() ?>>
<span id="el_ivf_art_summary_Grade4">
<input type="<?= $Page->Grade4->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Grade4" name="x_Grade4" id="x_Grade4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Grade4->getPlaceHolder()) ?>" value="<?= $Page->Grade4->EditValue ?>"<?= $Page->Grade4->editAttributes() ?> aria-describedby="x_Grade4_help">
<?= $Page->Grade4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Grade4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->State4->Visible) { // State4 ?>
    <div id="r_State4" class="form-group row">
        <label id="elh_ivf_art_summary_State4" for="x_State4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->State4->caption() ?><?= $Page->State4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->State4->cellAttributes() ?>>
<span id="el_ivf_art_summary_State4">
<input type="<?= $Page->State4->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_State4" name="x_State4" id="x_State4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->State4->getPlaceHolder()) ?>" value="<?= $Page->State4->EditValue ?>"<?= $Page->State4->editAttributes() ?> aria-describedby="x_State4_help">
<?= $Page->State4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->State4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Code5->Visible) { // Code5 ?>
    <div id="r_Code5" class="form-group row">
        <label id="elh_ivf_art_summary_Code5" for="x_Code5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Code5->caption() ?><?= $Page->Code5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Code5->cellAttributes() ?>>
<span id="el_ivf_art_summary_Code5">
<input type="<?= $Page->Code5->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Code5" name="x_Code5" id="x_Code5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Code5->getPlaceHolder()) ?>" value="<?= $Page->Code5->EditValue ?>"<?= $Page->Code5->editAttributes() ?> aria-describedby="x_Code5_help">
<?= $Page->Code5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Code5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day5->Visible) { // Day5 ?>
    <div id="r_Day5" class="form-group row">
        <label id="elh_ivf_art_summary_Day5" for="x_Day5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Day5->caption() ?><?= $Page->Day5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day5->cellAttributes() ?>>
<span id="el_ivf_art_summary_Day5">
<input type="<?= $Page->Day5->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Day5" name="x_Day5" id="x_Day5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Day5->getPlaceHolder()) ?>" value="<?= $Page->Day5->EditValue ?>"<?= $Page->Day5->editAttributes() ?> aria-describedby="x_Day5_help">
<?= $Page->Day5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Day5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CellStage5->Visible) { // CellStage5 ?>
    <div id="r_CellStage5" class="form-group row">
        <label id="elh_ivf_art_summary_CellStage5" for="x_CellStage5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CellStage5->caption() ?><?= $Page->CellStage5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CellStage5->cellAttributes() ?>>
<span id="el_ivf_art_summary_CellStage5">
<input type="<?= $Page->CellStage5->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_CellStage5" name="x_CellStage5" id="x_CellStage5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CellStage5->getPlaceHolder()) ?>" value="<?= $Page->CellStage5->EditValue ?>"<?= $Page->CellStage5->editAttributes() ?> aria-describedby="x_CellStage5_help">
<?= $Page->CellStage5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CellStage5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Grade5->Visible) { // Grade5 ?>
    <div id="r_Grade5" class="form-group row">
        <label id="elh_ivf_art_summary_Grade5" for="x_Grade5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Grade5->caption() ?><?= $Page->Grade5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Grade5->cellAttributes() ?>>
<span id="el_ivf_art_summary_Grade5">
<input type="<?= $Page->Grade5->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Grade5" name="x_Grade5" id="x_Grade5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Grade5->getPlaceHolder()) ?>" value="<?= $Page->Grade5->EditValue ?>"<?= $Page->Grade5->editAttributes() ?> aria-describedby="x_Grade5_help">
<?= $Page->Grade5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Grade5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->State5->Visible) { // State5 ?>
    <div id="r_State5" class="form-group row">
        <label id="elh_ivf_art_summary_State5" for="x_State5" class="<?= $Page->LeftColumnClass ?>"><?= $Page->State5->caption() ?><?= $Page->State5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->State5->cellAttributes() ?>>
<span id="el_ivf_art_summary_State5">
<input type="<?= $Page->State5->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_State5" name="x_State5" id="x_State5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->State5->getPlaceHolder()) ?>" value="<?= $Page->State5->EditValue ?>"<?= $Page->State5->editAttributes() ?> aria-describedby="x_State5_help">
<?= $Page->State5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->State5->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_art_summary_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_art_summary_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label id="elh_ivf_art_summary_RIDNo" for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RIDNo->caption() ?><?= $Page->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_ivf_art_summary_RIDNo">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?> aria-describedby="x_RIDNo_help">
<?= $Page->RIDNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
    <div id="r_Volume" class="form-group row">
        <label id="elh_ivf_art_summary_Volume" for="x_Volume" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Volume->caption() ?><?= $Page->Volume->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Volume->cellAttributes() ?>>
<span id="el_ivf_art_summary_Volume">
<input type="<?= $Page->Volume->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Volume" name="x_Volume" id="x_Volume" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Volume->getPlaceHolder()) ?>" value="<?= $Page->Volume->EditValue ?>"<?= $Page->Volume->editAttributes() ?> aria-describedby="x_Volume_help">
<?= $Page->Volume->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Volume->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Volume1->Visible) { // Volume1 ?>
    <div id="r_Volume1" class="form-group row">
        <label id="elh_ivf_art_summary_Volume1" for="x_Volume1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Volume1->caption() ?><?= $Page->Volume1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Volume1->cellAttributes() ?>>
<span id="el_ivf_art_summary_Volume1">
<input type="<?= $Page->Volume1->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Volume1" name="x_Volume1" id="x_Volume1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Volume1->getPlaceHolder()) ?>" value="<?= $Page->Volume1->EditValue ?>"<?= $Page->Volume1->editAttributes() ?> aria-describedby="x_Volume1_help">
<?= $Page->Volume1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Volume1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Volume2->Visible) { // Volume2 ?>
    <div id="r_Volume2" class="form-group row">
        <label id="elh_ivf_art_summary_Volume2" for="x_Volume2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Volume2->caption() ?><?= $Page->Volume2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Volume2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Volume2">
<input type="<?= $Page->Volume2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Volume2" name="x_Volume2" id="x_Volume2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Volume2->getPlaceHolder()) ?>" value="<?= $Page->Volume2->EditValue ?>"<?= $Page->Volume2->editAttributes() ?> aria-describedby="x_Volume2_help">
<?= $Page->Volume2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Volume2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Concentration2->Visible) { // Concentration2 ?>
    <div id="r_Concentration2" class="form-group row">
        <label id="elh_ivf_art_summary_Concentration2" for="x_Concentration2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Concentration2->caption() ?><?= $Page->Concentration2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Concentration2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Concentration2">
<input type="<?= $Page->Concentration2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Concentration2" name="x_Concentration2" id="x_Concentration2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Concentration2->getPlaceHolder()) ?>" value="<?= $Page->Concentration2->EditValue ?>"<?= $Page->Concentration2->editAttributes() ?> aria-describedby="x_Concentration2_help">
<?= $Page->Concentration2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Concentration2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
    <div id="r_Total" class="form-group row">
        <label id="elh_ivf_art_summary_Total" for="x_Total" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Total->caption() ?><?= $Page->Total->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Total->cellAttributes() ?>>
<span id="el_ivf_art_summary_Total">
<input type="<?= $Page->Total->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Total" name="x_Total" id="x_Total" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Total->getPlaceHolder()) ?>" value="<?= $Page->Total->EditValue ?>"<?= $Page->Total->editAttributes() ?> aria-describedby="x_Total_help">
<?= $Page->Total->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Total->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Total1->Visible) { // Total1 ?>
    <div id="r_Total1" class="form-group row">
        <label id="elh_ivf_art_summary_Total1" for="x_Total1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Total1->caption() ?><?= $Page->Total1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Total1->cellAttributes() ?>>
<span id="el_ivf_art_summary_Total1">
<input type="<?= $Page->Total1->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Total1" name="x_Total1" id="x_Total1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Total1->getPlaceHolder()) ?>" value="<?= $Page->Total1->EditValue ?>"<?= $Page->Total1->editAttributes() ?> aria-describedby="x_Total1_help">
<?= $Page->Total1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Total1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Total2->Visible) { // Total2 ?>
    <div id="r_Total2" class="form-group row">
        <label id="elh_ivf_art_summary_Total2" for="x_Total2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Total2->caption() ?><?= $Page->Total2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Total2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Total2">
<input type="<?= $Page->Total2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Total2" name="x_Total2" id="x_Total2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Total2->getPlaceHolder()) ?>" value="<?= $Page->Total2->EditValue ?>"<?= $Page->Total2->editAttributes() ?> aria-describedby="x_Total2_help">
<?= $Page->Total2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Total2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Progressive->Visible) { // Progressive ?>
    <div id="r_Progressive" class="form-group row">
        <label id="elh_ivf_art_summary_Progressive" for="x_Progressive" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Progressive->caption() ?><?= $Page->Progressive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Progressive->cellAttributes() ?>>
<span id="el_ivf_art_summary_Progressive">
<input type="<?= $Page->Progressive->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Progressive" name="x_Progressive" id="x_Progressive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Progressive->getPlaceHolder()) ?>" value="<?= $Page->Progressive->EditValue ?>"<?= $Page->Progressive->editAttributes() ?> aria-describedby="x_Progressive_help">
<?= $Page->Progressive->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Progressive->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Progressive1->Visible) { // Progressive1 ?>
    <div id="r_Progressive1" class="form-group row">
        <label id="elh_ivf_art_summary_Progressive1" for="x_Progressive1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Progressive1->caption() ?><?= $Page->Progressive1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Progressive1->cellAttributes() ?>>
<span id="el_ivf_art_summary_Progressive1">
<input type="<?= $Page->Progressive1->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Progressive1" name="x_Progressive1" id="x_Progressive1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Progressive1->getPlaceHolder()) ?>" value="<?= $Page->Progressive1->EditValue ?>"<?= $Page->Progressive1->editAttributes() ?> aria-describedby="x_Progressive1_help">
<?= $Page->Progressive1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Progressive1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Progressive2->Visible) { // Progressive2 ?>
    <div id="r_Progressive2" class="form-group row">
        <label id="elh_ivf_art_summary_Progressive2" for="x_Progressive2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Progressive2->caption() ?><?= $Page->Progressive2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Progressive2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Progressive2">
<input type="<?= $Page->Progressive2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Progressive2" name="x_Progressive2" id="x_Progressive2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Progressive2->getPlaceHolder()) ?>" value="<?= $Page->Progressive2->EditValue ?>"<?= $Page->Progressive2->editAttributes() ?> aria-describedby="x_Progressive2_help">
<?= $Page->Progressive2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Progressive2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NotProgressive->Visible) { // NotProgressive ?>
    <div id="r_NotProgressive" class="form-group row">
        <label id="elh_ivf_art_summary_NotProgressive" for="x_NotProgressive" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NotProgressive->caption() ?><?= $Page->NotProgressive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NotProgressive->cellAttributes() ?>>
<span id="el_ivf_art_summary_NotProgressive">
<input type="<?= $Page->NotProgressive->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_NotProgressive" name="x_NotProgressive" id="x_NotProgressive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NotProgressive->getPlaceHolder()) ?>" value="<?= $Page->NotProgressive->EditValue ?>"<?= $Page->NotProgressive->editAttributes() ?> aria-describedby="x_NotProgressive_help">
<?= $Page->NotProgressive->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NotProgressive->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NotProgressive1->Visible) { // NotProgressive1 ?>
    <div id="r_NotProgressive1" class="form-group row">
        <label id="elh_ivf_art_summary_NotProgressive1" for="x_NotProgressive1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NotProgressive1->caption() ?><?= $Page->NotProgressive1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NotProgressive1->cellAttributes() ?>>
<span id="el_ivf_art_summary_NotProgressive1">
<input type="<?= $Page->NotProgressive1->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_NotProgressive1" name="x_NotProgressive1" id="x_NotProgressive1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NotProgressive1->getPlaceHolder()) ?>" value="<?= $Page->NotProgressive1->EditValue ?>"<?= $Page->NotProgressive1->editAttributes() ?> aria-describedby="x_NotProgressive1_help">
<?= $Page->NotProgressive1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NotProgressive1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NotProgressive2->Visible) { // NotProgressive2 ?>
    <div id="r_NotProgressive2" class="form-group row">
        <label id="elh_ivf_art_summary_NotProgressive2" for="x_NotProgressive2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NotProgressive2->caption() ?><?= $Page->NotProgressive2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NotProgressive2->cellAttributes() ?>>
<span id="el_ivf_art_summary_NotProgressive2">
<input type="<?= $Page->NotProgressive2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_NotProgressive2" name="x_NotProgressive2" id="x_NotProgressive2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NotProgressive2->getPlaceHolder()) ?>" value="<?= $Page->NotProgressive2->EditValue ?>"<?= $Page->NotProgressive2->editAttributes() ?> aria-describedby="x_NotProgressive2_help">
<?= $Page->NotProgressive2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NotProgressive2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Motility2->Visible) { // Motility2 ?>
    <div id="r_Motility2" class="form-group row">
        <label id="elh_ivf_art_summary_Motility2" for="x_Motility2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Motility2->caption() ?><?= $Page->Motility2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Motility2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Motility2">
<input type="<?= $Page->Motility2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Motility2" name="x_Motility2" id="x_Motility2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Motility2->getPlaceHolder()) ?>" value="<?= $Page->Motility2->EditValue ?>"<?= $Page->Motility2->editAttributes() ?> aria-describedby="x_Motility2_help">
<?= $Page->Motility2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Motility2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Morphology2->Visible) { // Morphology2 ?>
    <div id="r_Morphology2" class="form-group row">
        <label id="elh_ivf_art_summary_Morphology2" for="x_Morphology2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Morphology2->caption() ?><?= $Page->Morphology2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Morphology2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Morphology2">
<input type="<?= $Page->Morphology2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Morphology2" name="x_Morphology2" id="x_Morphology2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Morphology2->getPlaceHolder()) ?>" value="<?= $Page->Morphology2->EditValue ?>"<?= $Page->Morphology2->editAttributes() ?> aria-describedby="x_Morphology2_help">
<?= $Page->Morphology2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Morphology2->getErrorMessage() ?></div>
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
    ew.addEventHandlers("ivf_art_summary");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

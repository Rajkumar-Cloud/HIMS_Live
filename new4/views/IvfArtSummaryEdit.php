<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfArtSummaryEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_art_summaryedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fivf_art_summaryedit = currentForm = new ew.Form("fivf_art_summaryedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_art_summary")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_art_summary)
        ew.vars.tables.ivf_art_summary = currentTable;
    fivf_art_summaryedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["ARTCycle", [fields.ARTCycle.visible && fields.ARTCycle.required ? ew.Validators.required(fields.ARTCycle.caption) : null], fields.ARTCycle.isInvalid],
        ["Spermorigin", [fields.Spermorigin.visible && fields.Spermorigin.required ? ew.Validators.required(fields.Spermorigin.caption) : null], fields.Spermorigin.isInvalid],
        ["IndicationforART", [fields.IndicationforART.visible && fields.IndicationforART.required ? ew.Validators.required(fields.IndicationforART.caption) : null], fields.IndicationforART.isInvalid],
        ["DateofICSI", [fields.DateofICSI.visible && fields.DateofICSI.required ? ew.Validators.required(fields.DateofICSI.caption) : null, ew.Validators.datetime(7)], fields.DateofICSI.isInvalid],
        ["Origin", [fields.Origin.visible && fields.Origin.required ? ew.Validators.required(fields.Origin.caption) : null], fields.Origin.isInvalid],
        ["Status", [fields.Status.visible && fields.Status.required ? ew.Validators.required(fields.Status.caption) : null], fields.Status.isInvalid],
        ["Method", [fields.Method.visible && fields.Method.required ? ew.Validators.required(fields.Method.caption) : null], fields.Method.isInvalid],
        ["pre_Concentration", [fields.pre_Concentration.visible && fields.pre_Concentration.required ? ew.Validators.required(fields.pre_Concentration.caption) : null], fields.pre_Concentration.isInvalid],
        ["pre_Motility", [fields.pre_Motility.visible && fields.pre_Motility.required ? ew.Validators.required(fields.pre_Motility.caption) : null], fields.pre_Motility.isInvalid],
        ["pre_Morphology", [fields.pre_Morphology.visible && fields.pre_Morphology.required ? ew.Validators.required(fields.pre_Morphology.caption) : null], fields.pre_Morphology.isInvalid],
        ["post_Concentration", [fields.post_Concentration.visible && fields.post_Concentration.required ? ew.Validators.required(fields.post_Concentration.caption) : null], fields.post_Concentration.isInvalid],
        ["post_Motility", [fields.post_Motility.visible && fields.post_Motility.required ? ew.Validators.required(fields.post_Motility.caption) : null], fields.post_Motility.isInvalid],
        ["post_Morphology", [fields.post_Morphology.visible && fields.post_Morphology.required ? ew.Validators.required(fields.post_Morphology.caption) : null], fields.post_Morphology.isInvalid],
        ["NumberofEmbryostransferred", [fields.NumberofEmbryostransferred.visible && fields.NumberofEmbryostransferred.required ? ew.Validators.required(fields.NumberofEmbryostransferred.caption) : null], fields.NumberofEmbryostransferred.isInvalid],
        ["Embryosunderobservation", [fields.Embryosunderobservation.visible && fields.Embryosunderobservation.required ? ew.Validators.required(fields.Embryosunderobservation.caption) : null], fields.Embryosunderobservation.isInvalid],
        ["EmbryoDevelopmentSummary", [fields.EmbryoDevelopmentSummary.visible && fields.EmbryoDevelopmentSummary.required ? ew.Validators.required(fields.EmbryoDevelopmentSummary.caption) : null], fields.EmbryoDevelopmentSummary.isInvalid],
        ["EmbryologistSignature", [fields.EmbryologistSignature.visible && fields.EmbryologistSignature.required ? ew.Validators.required(fields.EmbryologistSignature.caption) : null], fields.EmbryologistSignature.isInvalid],
        ["IVFRegistrationID", [fields.IVFRegistrationID.visible && fields.IVFRegistrationID.required ? ew.Validators.required(fields.IVFRegistrationID.caption) : null, ew.Validators.integer], fields.IVFRegistrationID.isInvalid],
        ["InseminatinTechnique", [fields.InseminatinTechnique.visible && fields.InseminatinTechnique.required ? ew.Validators.required(fields.InseminatinTechnique.caption) : null], fields.InseminatinTechnique.isInvalid],
        ["ICSIDetails", [fields.ICSIDetails.visible && fields.ICSIDetails.required ? ew.Validators.required(fields.ICSIDetails.caption) : null], fields.ICSIDetails.isInvalid],
        ["DateofET", [fields.DateofET.visible && fields.DateofET.required ? ew.Validators.required(fields.DateofET.caption) : null], fields.DateofET.isInvalid],
        ["Reasonfornotranfer", [fields.Reasonfornotranfer.visible && fields.Reasonfornotranfer.required ? ew.Validators.required(fields.Reasonfornotranfer.caption) : null], fields.Reasonfornotranfer.isInvalid],
        ["EmbryosCryopreserved", [fields.EmbryosCryopreserved.visible && fields.EmbryosCryopreserved.required ? ew.Validators.required(fields.EmbryosCryopreserved.caption) : null], fields.EmbryosCryopreserved.isInvalid],
        ["LegendCellStage", [fields.LegendCellStage.visible && fields.LegendCellStage.required ? ew.Validators.required(fields.LegendCellStage.caption) : null], fields.LegendCellStage.isInvalid],
        ["ConsultantsSignature", [fields.ConsultantsSignature.visible && fields.ConsultantsSignature.required ? ew.Validators.required(fields.ConsultantsSignature.caption) : null], fields.ConsultantsSignature.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["M2", [fields.M2.visible && fields.M2.required ? ew.Validators.required(fields.M2.caption) : null], fields.M2.isInvalid],
        ["Mi2", [fields.Mi2.visible && fields.Mi2.required ? ew.Validators.required(fields.Mi2.caption) : null], fields.Mi2.isInvalid],
        ["ICSI", [fields.ICSI.visible && fields.ICSI.required ? ew.Validators.required(fields.ICSI.caption) : null], fields.ICSI.isInvalid],
        ["IVF", [fields.IVF.visible && fields.IVF.required ? ew.Validators.required(fields.IVF.caption) : null], fields.IVF.isInvalid],
        ["M1", [fields.M1.visible && fields.M1.required ? ew.Validators.required(fields.M1.caption) : null], fields.M1.isInvalid],
        ["GV", [fields.GV.visible && fields.GV.required ? ew.Validators.required(fields.GV.caption) : null], fields.GV.isInvalid],
        ["_Others", [fields._Others.visible && fields._Others.required ? ew.Validators.required(fields._Others.caption) : null], fields._Others.isInvalid],
        ["Normal2PN", [fields.Normal2PN.visible && fields.Normal2PN.required ? ew.Validators.required(fields.Normal2PN.caption) : null], fields.Normal2PN.isInvalid],
        ["Abnormalfertilisation1N", [fields.Abnormalfertilisation1N.visible && fields.Abnormalfertilisation1N.required ? ew.Validators.required(fields.Abnormalfertilisation1N.caption) : null], fields.Abnormalfertilisation1N.isInvalid],
        ["Abnormalfertilisation3N", [fields.Abnormalfertilisation3N.visible && fields.Abnormalfertilisation3N.required ? ew.Validators.required(fields.Abnormalfertilisation3N.caption) : null], fields.Abnormalfertilisation3N.isInvalid],
        ["NotFertilized", [fields.NotFertilized.visible && fields.NotFertilized.required ? ew.Validators.required(fields.NotFertilized.caption) : null], fields.NotFertilized.isInvalid],
        ["Degenerated", [fields.Degenerated.visible && fields.Degenerated.required ? ew.Validators.required(fields.Degenerated.caption) : null], fields.Degenerated.isInvalid],
        ["SpermDate", [fields.SpermDate.visible && fields.SpermDate.required ? ew.Validators.required(fields.SpermDate.caption) : null, ew.Validators.datetime(0)], fields.SpermDate.isInvalid],
        ["Code1", [fields.Code1.visible && fields.Code1.required ? ew.Validators.required(fields.Code1.caption) : null], fields.Code1.isInvalid],
        ["Day1", [fields.Day1.visible && fields.Day1.required ? ew.Validators.required(fields.Day1.caption) : null], fields.Day1.isInvalid],
        ["CellStage1", [fields.CellStage1.visible && fields.CellStage1.required ? ew.Validators.required(fields.CellStage1.caption) : null], fields.CellStage1.isInvalid],
        ["Grade1", [fields.Grade1.visible && fields.Grade1.required ? ew.Validators.required(fields.Grade1.caption) : null], fields.Grade1.isInvalid],
        ["State1", [fields.State1.visible && fields.State1.required ? ew.Validators.required(fields.State1.caption) : null], fields.State1.isInvalid],
        ["Code2", [fields.Code2.visible && fields.Code2.required ? ew.Validators.required(fields.Code2.caption) : null], fields.Code2.isInvalid],
        ["Day2", [fields.Day2.visible && fields.Day2.required ? ew.Validators.required(fields.Day2.caption) : null], fields.Day2.isInvalid],
        ["CellStage2", [fields.CellStage2.visible && fields.CellStage2.required ? ew.Validators.required(fields.CellStage2.caption) : null], fields.CellStage2.isInvalid],
        ["Grade2", [fields.Grade2.visible && fields.Grade2.required ? ew.Validators.required(fields.Grade2.caption) : null], fields.Grade2.isInvalid],
        ["State2", [fields.State2.visible && fields.State2.required ? ew.Validators.required(fields.State2.caption) : null], fields.State2.isInvalid],
        ["Code3", [fields.Code3.visible && fields.Code3.required ? ew.Validators.required(fields.Code3.caption) : null], fields.Code3.isInvalid],
        ["Day3", [fields.Day3.visible && fields.Day3.required ? ew.Validators.required(fields.Day3.caption) : null], fields.Day3.isInvalid],
        ["CellStage3", [fields.CellStage3.visible && fields.CellStage3.required ? ew.Validators.required(fields.CellStage3.caption) : null], fields.CellStage3.isInvalid],
        ["Grade3", [fields.Grade3.visible && fields.Grade3.required ? ew.Validators.required(fields.Grade3.caption) : null], fields.Grade3.isInvalid],
        ["State3", [fields.State3.visible && fields.State3.required ? ew.Validators.required(fields.State3.caption) : null], fields.State3.isInvalid],
        ["Code4", [fields.Code4.visible && fields.Code4.required ? ew.Validators.required(fields.Code4.caption) : null], fields.Code4.isInvalid],
        ["Day4", [fields.Day4.visible && fields.Day4.required ? ew.Validators.required(fields.Day4.caption) : null], fields.Day4.isInvalid],
        ["CellStage4", [fields.CellStage4.visible && fields.CellStage4.required ? ew.Validators.required(fields.CellStage4.caption) : null], fields.CellStage4.isInvalid],
        ["Grade4", [fields.Grade4.visible && fields.Grade4.required ? ew.Validators.required(fields.Grade4.caption) : null], fields.Grade4.isInvalid],
        ["State4", [fields.State4.visible && fields.State4.required ? ew.Validators.required(fields.State4.caption) : null], fields.State4.isInvalid],
        ["Code5", [fields.Code5.visible && fields.Code5.required ? ew.Validators.required(fields.Code5.caption) : null], fields.Code5.isInvalid],
        ["Day5", [fields.Day5.visible && fields.Day5.required ? ew.Validators.required(fields.Day5.caption) : null], fields.Day5.isInvalid],
        ["CellStage5", [fields.CellStage5.visible && fields.CellStage5.required ? ew.Validators.required(fields.CellStage5.caption) : null], fields.CellStage5.isInvalid],
        ["Grade5", [fields.Grade5.visible && fields.Grade5.required ? ew.Validators.required(fields.Grade5.caption) : null], fields.Grade5.isInvalid],
        ["State5", [fields.State5.visible && fields.State5.required ? ew.Validators.required(fields.State5.caption) : null], fields.State5.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["RIDNo", [fields.RIDNo.visible && fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null, ew.Validators.integer], fields.RIDNo.isInvalid],
        ["Volume", [fields.Volume.visible && fields.Volume.required ? ew.Validators.required(fields.Volume.caption) : null], fields.Volume.isInvalid],
        ["Volume1", [fields.Volume1.visible && fields.Volume1.required ? ew.Validators.required(fields.Volume1.caption) : null], fields.Volume1.isInvalid],
        ["Volume2", [fields.Volume2.visible && fields.Volume2.required ? ew.Validators.required(fields.Volume2.caption) : null], fields.Volume2.isInvalid],
        ["Concentration2", [fields.Concentration2.visible && fields.Concentration2.required ? ew.Validators.required(fields.Concentration2.caption) : null], fields.Concentration2.isInvalid],
        ["Total", [fields.Total.visible && fields.Total.required ? ew.Validators.required(fields.Total.caption) : null], fields.Total.isInvalid],
        ["Total1", [fields.Total1.visible && fields.Total1.required ? ew.Validators.required(fields.Total1.caption) : null], fields.Total1.isInvalid],
        ["Total2", [fields.Total2.visible && fields.Total2.required ? ew.Validators.required(fields.Total2.caption) : null], fields.Total2.isInvalid],
        ["Progressive", [fields.Progressive.visible && fields.Progressive.required ? ew.Validators.required(fields.Progressive.caption) : null], fields.Progressive.isInvalid],
        ["Progressive1", [fields.Progressive1.visible && fields.Progressive1.required ? ew.Validators.required(fields.Progressive1.caption) : null], fields.Progressive1.isInvalid],
        ["Progressive2", [fields.Progressive2.visible && fields.Progressive2.required ? ew.Validators.required(fields.Progressive2.caption) : null], fields.Progressive2.isInvalid],
        ["NotProgressive", [fields.NotProgressive.visible && fields.NotProgressive.required ? ew.Validators.required(fields.NotProgressive.caption) : null], fields.NotProgressive.isInvalid],
        ["NotProgressive1", [fields.NotProgressive1.visible && fields.NotProgressive1.required ? ew.Validators.required(fields.NotProgressive1.caption) : null], fields.NotProgressive1.isInvalid],
        ["NotProgressive2", [fields.NotProgressive2.visible && fields.NotProgressive2.required ? ew.Validators.required(fields.NotProgressive2.caption) : null], fields.NotProgressive2.isInvalid],
        ["Motility2", [fields.Motility2.visible && fields.Motility2.required ? ew.Validators.required(fields.Motility2.caption) : null], fields.Motility2.isInvalid],
        ["Morphology2", [fields.Morphology2.visible && fields.Morphology2.required ? ew.Validators.required(fields.Morphology2.caption) : null], fields.Morphology2.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_art_summaryedit,
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
    fivf_art_summaryedit.validate = function () {
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
    fivf_art_summaryedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_art_summaryedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fivf_art_summaryedit.lists.ARTCycle = <?= $Page->ARTCycle->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.Spermorigin = <?= $Page->Spermorigin->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.Origin = <?= $Page->Origin->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.Status = <?= $Page->Status->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.Method = <?= $Page->Method->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.InseminatinTechnique = <?= $Page->InseminatinTechnique->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.DateofET = <?= $Page->DateofET->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.Reasonfornotranfer = <?= $Page->Reasonfornotranfer->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.ConsultantsSignature = <?= $Page->ConsultantsSignature->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.Day1 = <?= $Page->Day1->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.CellStage1 = <?= $Page->CellStage1->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.Grade1 = <?= $Page->Grade1->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.State1 = <?= $Page->State1->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.Day2 = <?= $Page->Day2->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.CellStage2 = <?= $Page->CellStage2->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.Grade2 = <?= $Page->Grade2->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.State2 = <?= $Page->State2->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.Day3 = <?= $Page->Day3->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.CellStage3 = <?= $Page->CellStage3->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.Grade3 = <?= $Page->Grade3->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.State3 = <?= $Page->State3->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.Day4 = <?= $Page->Day4->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.CellStage4 = <?= $Page->CellStage4->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.Grade4 = <?= $Page->Grade4->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.State4 = <?= $Page->State4->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.Day5 = <?= $Page->Day5->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.CellStage5 = <?= $Page->CellStage5->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.Grade5 = <?= $Page->Grade5->toClientList($Page) ?>;
    fivf_art_summaryedit.lists.State5 = <?= $Page->State5->toClientList($Page) ?>;
    loadjs.done("fivf_art_summaryedit");
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
<form name="fivf_art_summaryedit" id="fivf_art_summaryedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_art_summary">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_ivf_art_summary_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_id"><span id="el_ivf_art_summary_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="ivf_art_summary" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
    <div id="r_ARTCycle" class="form-group row">
        <label id="elh_ivf_art_summary_ARTCycle" for="x_ARTCycle" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_ARTCycle"><?= $Page->ARTCycle->caption() ?><?= $Page->ARTCycle->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ARTCycle->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_ARTCycle"><span id="el_ivf_art_summary_ARTCycle">
    <select
        id="x_ARTCycle"
        name="x_ARTCycle"
        class="form-control ew-select<?= $Page->ARTCycle->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_ARTCycle"
        data-table="ivf_art_summary"
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
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_ARTCycle']"),
        options = { name: "x_ARTCycle", selectId: "ivf_art_summary_x_ARTCycle", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.ARTCycle.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.ARTCycle.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Spermorigin->Visible) { // Spermorigin ?>
    <div id="r_Spermorigin" class="form-group row">
        <label id="elh_ivf_art_summary_Spermorigin" for="x_Spermorigin" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Spermorigin"><?= $Page->Spermorigin->caption() ?><?= $Page->Spermorigin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Spermorigin->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Spermorigin"><span id="el_ivf_art_summary_Spermorigin">
    <select
        id="x_Spermorigin"
        name="x_Spermorigin"
        class="form-control ew-select<?= $Page->Spermorigin->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_Spermorigin"
        data-table="ivf_art_summary"
        data-field="x_Spermorigin"
        data-value-separator="<?= $Page->Spermorigin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Spermorigin->getPlaceHolder()) ?>"
        <?= $Page->Spermorigin->editAttributes() ?>>
        <?= $Page->Spermorigin->selectOptionListHtml("x_Spermorigin") ?>
    </select>
    <?= $Page->Spermorigin->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Spermorigin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_Spermorigin']"),
        options = { name: "x_Spermorigin", selectId: "ivf_art_summary_x_Spermorigin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.Spermorigin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.Spermorigin.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IndicationforART->Visible) { // IndicationforART ?>
    <div id="r_IndicationforART" class="form-group row">
        <label id="elh_ivf_art_summary_IndicationforART" for="x_IndicationforART" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_IndicationforART"><?= $Page->IndicationforART->caption() ?><?= $Page->IndicationforART->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IndicationforART->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_IndicationforART"><span id="el_ivf_art_summary_IndicationforART">
<input type="<?= $Page->IndicationforART->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_IndicationforART" name="x_IndicationforART" id="x_IndicationforART" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IndicationforART->getPlaceHolder()) ?>" value="<?= $Page->IndicationforART->EditValue ?>"<?= $Page->IndicationforART->editAttributes() ?> aria-describedby="x_IndicationforART_help">
<?= $Page->IndicationforART->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IndicationforART->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DateofICSI->Visible) { // DateofICSI ?>
    <div id="r_DateofICSI" class="form-group row">
        <label id="elh_ivf_art_summary_DateofICSI" for="x_DateofICSI" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_DateofICSI"><?= $Page->DateofICSI->caption() ?><?= $Page->DateofICSI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DateofICSI->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_DateofICSI"><span id="el_ivf_art_summary_DateofICSI">
<input type="<?= $Page->DateofICSI->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_DateofICSI" data-format="7" name="x_DateofICSI" id="x_DateofICSI" placeholder="<?= HtmlEncode($Page->DateofICSI->getPlaceHolder()) ?>" value="<?= $Page->DateofICSI->EditValue ?>"<?= $Page->DateofICSI->editAttributes() ?> aria-describedby="x_DateofICSI_help">
<?= $Page->DateofICSI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DateofICSI->getErrorMessage() ?></div>
<?php if (!$Page->DateofICSI->ReadOnly && !$Page->DateofICSI->Disabled && !isset($Page->DateofICSI->EditAttrs["readonly"]) && !isset($Page->DateofICSI->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_art_summaryedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_art_summaryedit", "x_DateofICSI", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
    <div id="r_Origin" class="form-group row">
        <label id="elh_ivf_art_summary_Origin" for="x_Origin" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Origin"><?= $Page->Origin->caption() ?><?= $Page->Origin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Origin->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Origin"><span id="el_ivf_art_summary_Origin">
    <select
        id="x_Origin"
        name="x_Origin"
        class="form-control ew-select<?= $Page->Origin->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_Origin"
        data-table="ivf_art_summary"
        data-field="x_Origin"
        data-value-separator="<?= $Page->Origin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Origin->getPlaceHolder()) ?>"
        <?= $Page->Origin->editAttributes() ?>>
        <?= $Page->Origin->selectOptionListHtml("x_Origin") ?>
    </select>
    <?= $Page->Origin->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Origin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_Origin']"),
        options = { name: "x_Origin", selectId: "ivf_art_summary_x_Origin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.Origin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.Origin.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <div id="r_Status" class="form-group row">
        <label id="elh_ivf_art_summary_Status" for="x_Status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Status"><?= $Page->Status->caption() ?><?= $Page->Status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Status->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Status"><span id="el_ivf_art_summary_Status">
    <select
        id="x_Status"
        name="x_Status"
        class="form-control ew-select<?= $Page->Status->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_Status"
        data-table="ivf_art_summary"
        data-field="x_Status"
        data-value-separator="<?= $Page->Status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Status->getPlaceHolder()) ?>"
        <?= $Page->Status->editAttributes() ?>>
        <?= $Page->Status->selectOptionListHtml("x_Status") ?>
    </select>
    <?= $Page->Status->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Status->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_Status']"),
        options = { name: "x_Status", selectId: "ivf_art_summary_x_Status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.Status.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.Status.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <div id="r_Method" class="form-group row">
        <label id="elh_ivf_art_summary_Method" for="x_Method" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Method"><?= $Page->Method->caption() ?><?= $Page->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Method->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Method"><span id="el_ivf_art_summary_Method">
    <select
        id="x_Method"
        name="x_Method"
        class="form-control ew-select<?= $Page->Method->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_Method"
        data-table="ivf_art_summary"
        data-field="x_Method"
        data-value-separator="<?= $Page->Method->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>"
        <?= $Page->Method->editAttributes() ?>>
        <?= $Page->Method->selectOptionListHtml("x_Method") ?>
    </select>
    <?= $Page->Method->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Method->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_Method']"),
        options = { name: "x_Method", selectId: "ivf_art_summary_x_Method", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.Method.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.Method.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pre_Concentration->Visible) { // pre_Concentration ?>
    <div id="r_pre_Concentration" class="form-group row">
        <label id="elh_ivf_art_summary_pre_Concentration" for="x_pre_Concentration" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_pre_Concentration"><?= $Page->pre_Concentration->caption() ?><?= $Page->pre_Concentration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pre_Concentration->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_pre_Concentration"><span id="el_ivf_art_summary_pre_Concentration">
<input type="<?= $Page->pre_Concentration->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_pre_Concentration" name="x_pre_Concentration" id="x_pre_Concentration" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pre_Concentration->getPlaceHolder()) ?>" value="<?= $Page->pre_Concentration->EditValue ?>"<?= $Page->pre_Concentration->editAttributes() ?> aria-describedby="x_pre_Concentration_help">
<?= $Page->pre_Concentration->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pre_Concentration->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pre_Motility->Visible) { // pre_Motility ?>
    <div id="r_pre_Motility" class="form-group row">
        <label id="elh_ivf_art_summary_pre_Motility" for="x_pre_Motility" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_pre_Motility"><?= $Page->pre_Motility->caption() ?><?= $Page->pre_Motility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pre_Motility->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_pre_Motility"><span id="el_ivf_art_summary_pre_Motility">
<input type="<?= $Page->pre_Motility->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_pre_Motility" name="x_pre_Motility" id="x_pre_Motility" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pre_Motility->getPlaceHolder()) ?>" value="<?= $Page->pre_Motility->EditValue ?>"<?= $Page->pre_Motility->editAttributes() ?> aria-describedby="x_pre_Motility_help">
<?= $Page->pre_Motility->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pre_Motility->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pre_Morphology->Visible) { // pre_Morphology ?>
    <div id="r_pre_Morphology" class="form-group row">
        <label id="elh_ivf_art_summary_pre_Morphology" for="x_pre_Morphology" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_pre_Morphology"><?= $Page->pre_Morphology->caption() ?><?= $Page->pre_Morphology->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pre_Morphology->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_pre_Morphology"><span id="el_ivf_art_summary_pre_Morphology">
<input type="<?= $Page->pre_Morphology->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_pre_Morphology" name="x_pre_Morphology" id="x_pre_Morphology" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pre_Morphology->getPlaceHolder()) ?>" value="<?= $Page->pre_Morphology->EditValue ?>"<?= $Page->pre_Morphology->editAttributes() ?> aria-describedby="x_pre_Morphology_help">
<?= $Page->pre_Morphology->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pre_Morphology->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->post_Concentration->Visible) { // post_Concentration ?>
    <div id="r_post_Concentration" class="form-group row">
        <label id="elh_ivf_art_summary_post_Concentration" for="x_post_Concentration" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_post_Concentration"><?= $Page->post_Concentration->caption() ?><?= $Page->post_Concentration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->post_Concentration->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_post_Concentration"><span id="el_ivf_art_summary_post_Concentration">
<input type="<?= $Page->post_Concentration->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_post_Concentration" name="x_post_Concentration" id="x_post_Concentration" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->post_Concentration->getPlaceHolder()) ?>" value="<?= $Page->post_Concentration->EditValue ?>"<?= $Page->post_Concentration->editAttributes() ?> aria-describedby="x_post_Concentration_help">
<?= $Page->post_Concentration->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->post_Concentration->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->post_Motility->Visible) { // post_Motility ?>
    <div id="r_post_Motility" class="form-group row">
        <label id="elh_ivf_art_summary_post_Motility" for="x_post_Motility" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_post_Motility"><?= $Page->post_Motility->caption() ?><?= $Page->post_Motility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->post_Motility->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_post_Motility"><span id="el_ivf_art_summary_post_Motility">
<input type="<?= $Page->post_Motility->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_post_Motility" name="x_post_Motility" id="x_post_Motility" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->post_Motility->getPlaceHolder()) ?>" value="<?= $Page->post_Motility->EditValue ?>"<?= $Page->post_Motility->editAttributes() ?> aria-describedby="x_post_Motility_help">
<?= $Page->post_Motility->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->post_Motility->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->post_Morphology->Visible) { // post_Morphology ?>
    <div id="r_post_Morphology" class="form-group row">
        <label id="elh_ivf_art_summary_post_Morphology" for="x_post_Morphology" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_post_Morphology"><?= $Page->post_Morphology->caption() ?><?= $Page->post_Morphology->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->post_Morphology->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_post_Morphology"><span id="el_ivf_art_summary_post_Morphology">
<input type="<?= $Page->post_Morphology->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_post_Morphology" name="x_post_Morphology" id="x_post_Morphology" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->post_Morphology->getPlaceHolder()) ?>" value="<?= $Page->post_Morphology->EditValue ?>"<?= $Page->post_Morphology->editAttributes() ?> aria-describedby="x_post_Morphology_help">
<?= $Page->post_Morphology->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->post_Morphology->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
    <div id="r_NumberofEmbryostransferred" class="form-group row">
        <label id="elh_ivf_art_summary_NumberofEmbryostransferred" for="x_NumberofEmbryostransferred" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_NumberofEmbryostransferred"><?= $Page->NumberofEmbryostransferred->caption() ?><?= $Page->NumberofEmbryostransferred->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NumberofEmbryostransferred->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_NumberofEmbryostransferred"><span id="el_ivf_art_summary_NumberofEmbryostransferred">
<input type="<?= $Page->NumberofEmbryostransferred->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_NumberofEmbryostransferred" name="x_NumberofEmbryostransferred" id="x_NumberofEmbryostransferred" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NumberofEmbryostransferred->getPlaceHolder()) ?>" value="<?= $Page->NumberofEmbryostransferred->EditValue ?>"<?= $Page->NumberofEmbryostransferred->editAttributes() ?> aria-describedby="x_NumberofEmbryostransferred_help">
<?= $Page->NumberofEmbryostransferred->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NumberofEmbryostransferred->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
    <div id="r_Embryosunderobservation" class="form-group row">
        <label id="elh_ivf_art_summary_Embryosunderobservation" for="x_Embryosunderobservation" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Embryosunderobservation"><?= $Page->Embryosunderobservation->caption() ?><?= $Page->Embryosunderobservation->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Embryosunderobservation->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Embryosunderobservation"><span id="el_ivf_art_summary_Embryosunderobservation">
<input type="<?= $Page->Embryosunderobservation->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Embryosunderobservation" name="x_Embryosunderobservation" id="x_Embryosunderobservation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Embryosunderobservation->getPlaceHolder()) ?>" value="<?= $Page->Embryosunderobservation->EditValue ?>"<?= $Page->Embryosunderobservation->editAttributes() ?> aria-describedby="x_Embryosunderobservation_help">
<?= $Page->Embryosunderobservation->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Embryosunderobservation->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
    <div id="r_EmbryoDevelopmentSummary" class="form-group row">
        <label id="elh_ivf_art_summary_EmbryoDevelopmentSummary" for="x_EmbryoDevelopmentSummary" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_EmbryoDevelopmentSummary"><?= $Page->EmbryoDevelopmentSummary->caption() ?><?= $Page->EmbryoDevelopmentSummary->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EmbryoDevelopmentSummary->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_EmbryoDevelopmentSummary"><span id="el_ivf_art_summary_EmbryoDevelopmentSummary">
<input type="<?= $Page->EmbryoDevelopmentSummary->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_EmbryoDevelopmentSummary" name="x_EmbryoDevelopmentSummary" id="x_EmbryoDevelopmentSummary" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EmbryoDevelopmentSummary->getPlaceHolder()) ?>" value="<?= $Page->EmbryoDevelopmentSummary->EditValue ?>"<?= $Page->EmbryoDevelopmentSummary->editAttributes() ?> aria-describedby="x_EmbryoDevelopmentSummary_help">
<?= $Page->EmbryoDevelopmentSummary->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EmbryoDevelopmentSummary->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
    <div id="r_EmbryologistSignature" class="form-group row">
        <label id="elh_ivf_art_summary_EmbryologistSignature" for="x_EmbryologistSignature" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_EmbryologistSignature"><?= $Page->EmbryologistSignature->caption() ?><?= $Page->EmbryologistSignature->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EmbryologistSignature->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_EmbryologistSignature"><span id="el_ivf_art_summary_EmbryologistSignature">
<input type="<?= $Page->EmbryologistSignature->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_EmbryologistSignature" name="x_EmbryologistSignature" id="x_EmbryologistSignature" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EmbryologistSignature->getPlaceHolder()) ?>" value="<?= $Page->EmbryologistSignature->EditValue ?>"<?= $Page->EmbryologistSignature->editAttributes() ?> aria-describedby="x_EmbryologistSignature_help">
<?= $Page->EmbryologistSignature->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EmbryologistSignature->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
    <div id="r_IVFRegistrationID" class="form-group row">
        <label id="elh_ivf_art_summary_IVFRegistrationID" for="x_IVFRegistrationID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_IVFRegistrationID"><?= $Page->IVFRegistrationID->caption() ?><?= $Page->IVFRegistrationID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IVFRegistrationID->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_IVFRegistrationID"><span id="el_ivf_art_summary_IVFRegistrationID">
<input type="<?= $Page->IVFRegistrationID->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_IVFRegistrationID" name="x_IVFRegistrationID" id="x_IVFRegistrationID" size="30" placeholder="<?= HtmlEncode($Page->IVFRegistrationID->getPlaceHolder()) ?>" value="<?= $Page->IVFRegistrationID->EditValue ?>"<?= $Page->IVFRegistrationID->editAttributes() ?> aria-describedby="x_IVFRegistrationID_help">
<?= $Page->IVFRegistrationID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IVFRegistrationID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
    <div id="r_InseminatinTechnique" class="form-group row">
        <label id="elh_ivf_art_summary_InseminatinTechnique" for="x_InseminatinTechnique" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_InseminatinTechnique"><?= $Page->InseminatinTechnique->caption() ?><?= $Page->InseminatinTechnique->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_InseminatinTechnique"><span id="el_ivf_art_summary_InseminatinTechnique">
    <select
        id="x_InseminatinTechnique"
        name="x_InseminatinTechnique"
        class="form-control ew-select<?= $Page->InseminatinTechnique->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_InseminatinTechnique"
        data-table="ivf_art_summary"
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
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_InseminatinTechnique']"),
        options = { name: "x_InseminatinTechnique", selectId: "ivf_art_summary_x_InseminatinTechnique", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.InseminatinTechnique.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.InseminatinTechnique.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ICSIDetails->Visible) { // ICSIDetails ?>
    <div id="r_ICSIDetails" class="form-group row">
        <label id="elh_ivf_art_summary_ICSIDetails" for="x_ICSIDetails" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_ICSIDetails"><?= $Page->ICSIDetails->caption() ?><?= $Page->ICSIDetails->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ICSIDetails->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_ICSIDetails"><span id="el_ivf_art_summary_ICSIDetails">
<input type="<?= $Page->ICSIDetails->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_ICSIDetails" name="x_ICSIDetails" id="x_ICSIDetails" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ICSIDetails->getPlaceHolder()) ?>" value="<?= $Page->ICSIDetails->EditValue ?>"<?= $Page->ICSIDetails->editAttributes() ?> aria-describedby="x_ICSIDetails_help">
<?= $Page->ICSIDetails->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ICSIDetails->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DateofET->Visible) { // DateofET ?>
    <div id="r_DateofET" class="form-group row">
        <label id="elh_ivf_art_summary_DateofET" for="x_DateofET" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_DateofET"><?= $Page->DateofET->caption() ?><?= $Page->DateofET->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DateofET->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_DateofET"><span id="el_ivf_art_summary_DateofET">
    <select
        id="x_DateofET"
        name="x_DateofET"
        class="form-control ew-select<?= $Page->DateofET->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_DateofET"
        data-table="ivf_art_summary"
        data-field="x_DateofET"
        data-value-separator="<?= $Page->DateofET->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DateofET->getPlaceHolder()) ?>"
        <?= $Page->DateofET->editAttributes() ?>>
        <?= $Page->DateofET->selectOptionListHtml("x_DateofET") ?>
    </select>
    <?= $Page->DateofET->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->DateofET->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_DateofET']"),
        options = { name: "x_DateofET", selectId: "ivf_art_summary_x_DateofET", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.DateofET.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.DateofET.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
    <div id="r_Reasonfornotranfer" class="form-group row">
        <label id="elh_ivf_art_summary_Reasonfornotranfer" for="x_Reasonfornotranfer" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Reasonfornotranfer"><?= $Page->Reasonfornotranfer->caption() ?><?= $Page->Reasonfornotranfer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reasonfornotranfer->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Reasonfornotranfer"><span id="el_ivf_art_summary_Reasonfornotranfer">
    <select
        id="x_Reasonfornotranfer"
        name="x_Reasonfornotranfer"
        class="form-control ew-select<?= $Page->Reasonfornotranfer->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_Reasonfornotranfer"
        data-table="ivf_art_summary"
        data-field="x_Reasonfornotranfer"
        data-value-separator="<?= $Page->Reasonfornotranfer->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Reasonfornotranfer->getPlaceHolder()) ?>"
        <?= $Page->Reasonfornotranfer->editAttributes() ?>>
        <?= $Page->Reasonfornotranfer->selectOptionListHtml("x_Reasonfornotranfer") ?>
    </select>
    <?= $Page->Reasonfornotranfer->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Reasonfornotranfer->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_Reasonfornotranfer']"),
        options = { name: "x_Reasonfornotranfer", selectId: "ivf_art_summary_x_Reasonfornotranfer", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.Reasonfornotranfer.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.Reasonfornotranfer.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
    <div id="r_EmbryosCryopreserved" class="form-group row">
        <label id="elh_ivf_art_summary_EmbryosCryopreserved" for="x_EmbryosCryopreserved" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_EmbryosCryopreserved"><?= $Page->EmbryosCryopreserved->caption() ?><?= $Page->EmbryosCryopreserved->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EmbryosCryopreserved->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_EmbryosCryopreserved"><span id="el_ivf_art_summary_EmbryosCryopreserved">
<input type="<?= $Page->EmbryosCryopreserved->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_EmbryosCryopreserved" name="x_EmbryosCryopreserved" id="x_EmbryosCryopreserved" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EmbryosCryopreserved->getPlaceHolder()) ?>" value="<?= $Page->EmbryosCryopreserved->EditValue ?>"<?= $Page->EmbryosCryopreserved->editAttributes() ?> aria-describedby="x_EmbryosCryopreserved_help">
<?= $Page->EmbryosCryopreserved->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EmbryosCryopreserved->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LegendCellStage->Visible) { // LegendCellStage ?>
    <div id="r_LegendCellStage" class="form-group row">
        <label id="elh_ivf_art_summary_LegendCellStage" for="x_LegendCellStage" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_LegendCellStage"><?= $Page->LegendCellStage->caption() ?><?= $Page->LegendCellStage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LegendCellStage->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_LegendCellStage"><span id="el_ivf_art_summary_LegendCellStage">
<input type="<?= $Page->LegendCellStage->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_LegendCellStage" name="x_LegendCellStage" id="x_LegendCellStage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LegendCellStage->getPlaceHolder()) ?>" value="<?= $Page->LegendCellStage->EditValue ?>"<?= $Page->LegendCellStage->editAttributes() ?> aria-describedby="x_LegendCellStage_help">
<?= $Page->LegendCellStage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LegendCellStage->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
    <div id="r_ConsultantsSignature" class="form-group row">
        <label id="elh_ivf_art_summary_ConsultantsSignature" for="x_ConsultantsSignature" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_ConsultantsSignature"><?= $Page->ConsultantsSignature->caption() ?><?= $Page->ConsultantsSignature->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ConsultantsSignature->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_ConsultantsSignature"><span id="el_ivf_art_summary_ConsultantsSignature">
<div class="input-group ew-lookup-list" aria-describedby="x_ConsultantsSignature_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ConsultantsSignature"><?= EmptyValue(strval($Page->ConsultantsSignature->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->ConsultantsSignature->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->ConsultantsSignature->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->ConsultantsSignature->ReadOnly || $Page->ConsultantsSignature->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ConsultantsSignature',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->ConsultantsSignature->getErrorMessage() ?></div>
<?= $Page->ConsultantsSignature->getCustomMessage() ?>
<?= $Page->ConsultantsSignature->Lookup->getParamTag($Page, "p_x_ConsultantsSignature") ?>
<input type="hidden" is="selection-list" data-table="ivf_art_summary" data-field="x_ConsultantsSignature" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->ConsultantsSignature->displayValueSeparatorAttribute() ?>" name="x_ConsultantsSignature" id="x_ConsultantsSignature" value="<?= $Page->ConsultantsSignature->CurrentValue ?>"<?= $Page->ConsultantsSignature->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_art_summary_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Name"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Name"><span id="el_ivf_art_summary_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->M2->Visible) { // M2 ?>
    <div id="r_M2" class="form-group row">
        <label id="elh_ivf_art_summary_M2" for="x_M2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_M2"><?= $Page->M2->caption() ?><?= $Page->M2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->M2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_M2"><span id="el_ivf_art_summary_M2">
<input type="<?= $Page->M2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_M2" name="x_M2" id="x_M2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->M2->getPlaceHolder()) ?>" value="<?= $Page->M2->EditValue ?>"<?= $Page->M2->editAttributes() ?> aria-describedby="x_M2_help">
<?= $Page->M2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->M2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mi2->Visible) { // Mi2 ?>
    <div id="r_Mi2" class="form-group row">
        <label id="elh_ivf_art_summary_Mi2" for="x_Mi2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Mi2"><?= $Page->Mi2->caption() ?><?= $Page->Mi2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mi2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Mi2"><span id="el_ivf_art_summary_Mi2">
<input type="<?= $Page->Mi2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Mi2" name="x_Mi2" id="x_Mi2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mi2->getPlaceHolder()) ?>" value="<?= $Page->Mi2->EditValue ?>"<?= $Page->Mi2->editAttributes() ?> aria-describedby="x_Mi2_help">
<?= $Page->Mi2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mi2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ICSI->Visible) { // ICSI ?>
    <div id="r_ICSI" class="form-group row">
        <label id="elh_ivf_art_summary_ICSI" for="x_ICSI" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_ICSI"><?= $Page->ICSI->caption() ?><?= $Page->ICSI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ICSI->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_ICSI"><span id="el_ivf_art_summary_ICSI">
<input type="<?= $Page->ICSI->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_ICSI" name="x_ICSI" id="x_ICSI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ICSI->getPlaceHolder()) ?>" value="<?= $Page->ICSI->EditValue ?>"<?= $Page->ICSI->editAttributes() ?> aria-describedby="x_ICSI_help">
<?= $Page->ICSI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ICSI->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IVF->Visible) { // IVF ?>
    <div id="r_IVF" class="form-group row">
        <label id="elh_ivf_art_summary_IVF" for="x_IVF" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_IVF"><?= $Page->IVF->caption() ?><?= $Page->IVF->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IVF->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_IVF"><span id="el_ivf_art_summary_IVF">
<input type="<?= $Page->IVF->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_IVF" name="x_IVF" id="x_IVF" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IVF->getPlaceHolder()) ?>" value="<?= $Page->IVF->EditValue ?>"<?= $Page->IVF->editAttributes() ?> aria-describedby="x_IVF_help">
<?= $Page->IVF->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IVF->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->M1->Visible) { // M1 ?>
    <div id="r_M1" class="form-group row">
        <label id="elh_ivf_art_summary_M1" for="x_M1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_M1"><?= $Page->M1->caption() ?><?= $Page->M1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->M1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_M1"><span id="el_ivf_art_summary_M1">
<input type="<?= $Page->M1->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_M1" name="x_M1" id="x_M1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->M1->getPlaceHolder()) ?>" value="<?= $Page->M1->EditValue ?>"<?= $Page->M1->editAttributes() ?> aria-describedby="x_M1_help">
<?= $Page->M1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->M1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GV->Visible) { // GV ?>
    <div id="r_GV" class="form-group row">
        <label id="elh_ivf_art_summary_GV" for="x_GV" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_GV"><?= $Page->GV->caption() ?><?= $Page->GV->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GV->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_GV"><span id="el_ivf_art_summary_GV">
<input type="<?= $Page->GV->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_GV" name="x_GV" id="x_GV" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GV->getPlaceHolder()) ?>" value="<?= $Page->GV->EditValue ?>"<?= $Page->GV->editAttributes() ?> aria-describedby="x_GV_help">
<?= $Page->GV->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GV->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_Others->Visible) { // Others ?>
    <div id="r__Others" class="form-group row">
        <label id="elh_ivf_art_summary__Others" for="x__Others" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary__Others"><?= $Page->_Others->caption() ?><?= $Page->_Others->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_Others->cellAttributes() ?>>
<template id="tpx_ivf_art_summary__Others"><span id="el_ivf_art_summary__Others">
<input type="<?= $Page->_Others->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x__Others" name="x__Others" id="x__Others" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->_Others->getPlaceHolder()) ?>" value="<?= $Page->_Others->EditValue ?>"<?= $Page->_Others->editAttributes() ?> aria-describedby="x__Others_help">
<?= $Page->_Others->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_Others->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Normal2PN->Visible) { // Normal2PN ?>
    <div id="r_Normal2PN" class="form-group row">
        <label id="elh_ivf_art_summary_Normal2PN" for="x_Normal2PN" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Normal2PN"><?= $Page->Normal2PN->caption() ?><?= $Page->Normal2PN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Normal2PN->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Normal2PN"><span id="el_ivf_art_summary_Normal2PN">
<input type="<?= $Page->Normal2PN->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Normal2PN" name="x_Normal2PN" id="x_Normal2PN" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Normal2PN->getPlaceHolder()) ?>" value="<?= $Page->Normal2PN->EditValue ?>"<?= $Page->Normal2PN->editAttributes() ?> aria-describedby="x_Normal2PN_help">
<?= $Page->Normal2PN->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Normal2PN->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
    <div id="r_Abnormalfertilisation1N" class="form-group row">
        <label id="elh_ivf_art_summary_Abnormalfertilisation1N" for="x_Abnormalfertilisation1N" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Abnormalfertilisation1N"><?= $Page->Abnormalfertilisation1N->caption() ?><?= $Page->Abnormalfertilisation1N->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Abnormalfertilisation1N->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Abnormalfertilisation1N"><span id="el_ivf_art_summary_Abnormalfertilisation1N">
<input type="<?= $Page->Abnormalfertilisation1N->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation1N" name="x_Abnormalfertilisation1N" id="x_Abnormalfertilisation1N" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Abnormalfertilisation1N->getPlaceHolder()) ?>" value="<?= $Page->Abnormalfertilisation1N->EditValue ?>"<?= $Page->Abnormalfertilisation1N->editAttributes() ?> aria-describedby="x_Abnormalfertilisation1N_help">
<?= $Page->Abnormalfertilisation1N->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Abnormalfertilisation1N->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
    <div id="r_Abnormalfertilisation3N" class="form-group row">
        <label id="elh_ivf_art_summary_Abnormalfertilisation3N" for="x_Abnormalfertilisation3N" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Abnormalfertilisation3N"><?= $Page->Abnormalfertilisation3N->caption() ?><?= $Page->Abnormalfertilisation3N->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Abnormalfertilisation3N->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Abnormalfertilisation3N"><span id="el_ivf_art_summary_Abnormalfertilisation3N">
<input type="<?= $Page->Abnormalfertilisation3N->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Abnormalfertilisation3N" name="x_Abnormalfertilisation3N" id="x_Abnormalfertilisation3N" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Abnormalfertilisation3N->getPlaceHolder()) ?>" value="<?= $Page->Abnormalfertilisation3N->EditValue ?>"<?= $Page->Abnormalfertilisation3N->editAttributes() ?> aria-describedby="x_Abnormalfertilisation3N_help">
<?= $Page->Abnormalfertilisation3N->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Abnormalfertilisation3N->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NotFertilized->Visible) { // NotFertilized ?>
    <div id="r_NotFertilized" class="form-group row">
        <label id="elh_ivf_art_summary_NotFertilized" for="x_NotFertilized" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_NotFertilized"><?= $Page->NotFertilized->caption() ?><?= $Page->NotFertilized->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NotFertilized->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_NotFertilized"><span id="el_ivf_art_summary_NotFertilized">
<input type="<?= $Page->NotFertilized->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_NotFertilized" name="x_NotFertilized" id="x_NotFertilized" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NotFertilized->getPlaceHolder()) ?>" value="<?= $Page->NotFertilized->EditValue ?>"<?= $Page->NotFertilized->editAttributes() ?> aria-describedby="x_NotFertilized_help">
<?= $Page->NotFertilized->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NotFertilized->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Degenerated->Visible) { // Degenerated ?>
    <div id="r_Degenerated" class="form-group row">
        <label id="elh_ivf_art_summary_Degenerated" for="x_Degenerated" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Degenerated"><?= $Page->Degenerated->caption() ?><?= $Page->Degenerated->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Degenerated->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Degenerated"><span id="el_ivf_art_summary_Degenerated">
<input type="<?= $Page->Degenerated->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Degenerated" name="x_Degenerated" id="x_Degenerated" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Degenerated->getPlaceHolder()) ?>" value="<?= $Page->Degenerated->EditValue ?>"<?= $Page->Degenerated->editAttributes() ?> aria-describedby="x_Degenerated_help">
<?= $Page->Degenerated->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Degenerated->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SpermDate->Visible) { // SpermDate ?>
    <div id="r_SpermDate" class="form-group row">
        <label id="elh_ivf_art_summary_SpermDate" for="x_SpermDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_SpermDate"><?= $Page->SpermDate->caption() ?><?= $Page->SpermDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SpermDate->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_SpermDate"><span id="el_ivf_art_summary_SpermDate">
<input type="<?= $Page->SpermDate->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_SpermDate" name="x_SpermDate" id="x_SpermDate" placeholder="<?= HtmlEncode($Page->SpermDate->getPlaceHolder()) ?>" value="<?= $Page->SpermDate->EditValue ?>"<?= $Page->SpermDate->editAttributes() ?> aria-describedby="x_SpermDate_help">
<?= $Page->SpermDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SpermDate->getErrorMessage() ?></div>
<?php if (!$Page->SpermDate->ReadOnly && !$Page->SpermDate->Disabled && !isset($Page->SpermDate->EditAttrs["readonly"]) && !isset($Page->SpermDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_art_summaryedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_art_summaryedit", "x_SpermDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Code1->Visible) { // Code1 ?>
    <div id="r_Code1" class="form-group row">
        <label id="elh_ivf_art_summary_Code1" for="x_Code1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Code1"><?= $Page->Code1->caption() ?><?= $Page->Code1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Code1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Code1"><span id="el_ivf_art_summary_Code1">
<input type="<?= $Page->Code1->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Code1" name="x_Code1" id="x_Code1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Code1->getPlaceHolder()) ?>" value="<?= $Page->Code1->EditValue ?>"<?= $Page->Code1->editAttributes() ?> aria-describedby="x_Code1_help">
<?= $Page->Code1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Code1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day1->Visible) { // Day1 ?>
    <div id="r_Day1" class="form-group row">
        <label id="elh_ivf_art_summary_Day1" for="x_Day1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Day1"><?= $Page->Day1->caption() ?><?= $Page->Day1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Day1"><span id="el_ivf_art_summary_Day1">
    <select
        id="x_Day1"
        name="x_Day1"
        class="form-control ew-select<?= $Page->Day1->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_Day1"
        data-table="ivf_art_summary"
        data-field="x_Day1"
        data-value-separator="<?= $Page->Day1->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day1->getPlaceHolder()) ?>"
        <?= $Page->Day1->editAttributes() ?>>
        <?= $Page->Day1->selectOptionListHtml("x_Day1") ?>
    </select>
    <?= $Page->Day1->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day1->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_Day1']"),
        options = { name: "x_Day1", selectId: "ivf_art_summary_x_Day1", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.Day1.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.Day1.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CellStage1->Visible) { // CellStage1 ?>
    <div id="r_CellStage1" class="form-group row">
        <label id="elh_ivf_art_summary_CellStage1" for="x_CellStage1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_CellStage1"><?= $Page->CellStage1->caption() ?><?= $Page->CellStage1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CellStage1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_CellStage1"><span id="el_ivf_art_summary_CellStage1">
    <select
        id="x_CellStage1"
        name="x_CellStage1"
        class="form-control ew-select<?= $Page->CellStage1->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_CellStage1"
        data-table="ivf_art_summary"
        data-field="x_CellStage1"
        data-value-separator="<?= $Page->CellStage1->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->CellStage1->getPlaceHolder()) ?>"
        <?= $Page->CellStage1->editAttributes() ?>>
        <?= $Page->CellStage1->selectOptionListHtml("x_CellStage1") ?>
    </select>
    <?= $Page->CellStage1->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->CellStage1->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_CellStage1']"),
        options = { name: "x_CellStage1", selectId: "ivf_art_summary_x_CellStage1", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.CellStage1.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.CellStage1.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Grade1->Visible) { // Grade1 ?>
    <div id="r_Grade1" class="form-group row">
        <label id="elh_ivf_art_summary_Grade1" for="x_Grade1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Grade1"><?= $Page->Grade1->caption() ?><?= $Page->Grade1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Grade1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Grade1"><span id="el_ivf_art_summary_Grade1">
    <select
        id="x_Grade1"
        name="x_Grade1"
        class="form-control ew-select<?= $Page->Grade1->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_Grade1"
        data-table="ivf_art_summary"
        data-field="x_Grade1"
        data-value-separator="<?= $Page->Grade1->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Grade1->getPlaceHolder()) ?>"
        <?= $Page->Grade1->editAttributes() ?>>
        <?= $Page->Grade1->selectOptionListHtml("x_Grade1") ?>
    </select>
    <?= $Page->Grade1->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Grade1->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_Grade1']"),
        options = { name: "x_Grade1", selectId: "ivf_art_summary_x_Grade1", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.Grade1.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.Grade1.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->State1->Visible) { // State1 ?>
    <div id="r_State1" class="form-group row">
        <label id="elh_ivf_art_summary_State1" for="x_State1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_State1"><?= $Page->State1->caption() ?><?= $Page->State1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->State1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_State1"><span id="el_ivf_art_summary_State1">
    <select
        id="x_State1"
        name="x_State1"
        class="form-control ew-select<?= $Page->State1->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_State1"
        data-table="ivf_art_summary"
        data-field="x_State1"
        data-value-separator="<?= $Page->State1->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->State1->getPlaceHolder()) ?>"
        <?= $Page->State1->editAttributes() ?>>
        <?= $Page->State1->selectOptionListHtml("x_State1") ?>
    </select>
    <?= $Page->State1->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->State1->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_State1']"),
        options = { name: "x_State1", selectId: "ivf_art_summary_x_State1", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.State1.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.State1.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Code2->Visible) { // Code2 ?>
    <div id="r_Code2" class="form-group row">
        <label id="elh_ivf_art_summary_Code2" for="x_Code2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Code2"><?= $Page->Code2->caption() ?><?= $Page->Code2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Code2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Code2"><span id="el_ivf_art_summary_Code2">
<input type="<?= $Page->Code2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Code2" name="x_Code2" id="x_Code2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Code2->getPlaceHolder()) ?>" value="<?= $Page->Code2->EditValue ?>"<?= $Page->Code2->editAttributes() ?> aria-describedby="x_Code2_help">
<?= $Page->Code2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Code2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day2->Visible) { // Day2 ?>
    <div id="r_Day2" class="form-group row">
        <label id="elh_ivf_art_summary_Day2" for="x_Day2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Day2"><?= $Page->Day2->caption() ?><?= $Page->Day2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Day2"><span id="el_ivf_art_summary_Day2">
    <select
        id="x_Day2"
        name="x_Day2"
        class="form-control ew-select<?= $Page->Day2->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_Day2"
        data-table="ivf_art_summary"
        data-field="x_Day2"
        data-value-separator="<?= $Page->Day2->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day2->getPlaceHolder()) ?>"
        <?= $Page->Day2->editAttributes() ?>>
        <?= $Page->Day2->selectOptionListHtml("x_Day2") ?>
    </select>
    <?= $Page->Day2->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day2->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_Day2']"),
        options = { name: "x_Day2", selectId: "ivf_art_summary_x_Day2", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.Day2.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.Day2.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CellStage2->Visible) { // CellStage2 ?>
    <div id="r_CellStage2" class="form-group row">
        <label id="elh_ivf_art_summary_CellStage2" for="x_CellStage2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_CellStage2"><?= $Page->CellStage2->caption() ?><?= $Page->CellStage2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CellStage2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_CellStage2"><span id="el_ivf_art_summary_CellStage2">
    <select
        id="x_CellStage2"
        name="x_CellStage2"
        class="form-control ew-select<?= $Page->CellStage2->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_CellStage2"
        data-table="ivf_art_summary"
        data-field="x_CellStage2"
        data-value-separator="<?= $Page->CellStage2->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->CellStage2->getPlaceHolder()) ?>"
        <?= $Page->CellStage2->editAttributes() ?>>
        <?= $Page->CellStage2->selectOptionListHtml("x_CellStage2") ?>
    </select>
    <?= $Page->CellStage2->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->CellStage2->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_CellStage2']"),
        options = { name: "x_CellStage2", selectId: "ivf_art_summary_x_CellStage2", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.CellStage2.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.CellStage2.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Grade2->Visible) { // Grade2 ?>
    <div id="r_Grade2" class="form-group row">
        <label id="elh_ivf_art_summary_Grade2" for="x_Grade2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Grade2"><?= $Page->Grade2->caption() ?><?= $Page->Grade2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Grade2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Grade2"><span id="el_ivf_art_summary_Grade2">
    <select
        id="x_Grade2"
        name="x_Grade2"
        class="form-control ew-select<?= $Page->Grade2->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_Grade2"
        data-table="ivf_art_summary"
        data-field="x_Grade2"
        data-value-separator="<?= $Page->Grade2->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Grade2->getPlaceHolder()) ?>"
        <?= $Page->Grade2->editAttributes() ?>>
        <?= $Page->Grade2->selectOptionListHtml("x_Grade2") ?>
    </select>
    <?= $Page->Grade2->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Grade2->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_Grade2']"),
        options = { name: "x_Grade2", selectId: "ivf_art_summary_x_Grade2", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.Grade2.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.Grade2.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->State2->Visible) { // State2 ?>
    <div id="r_State2" class="form-group row">
        <label id="elh_ivf_art_summary_State2" for="x_State2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_State2"><?= $Page->State2->caption() ?><?= $Page->State2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->State2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_State2"><span id="el_ivf_art_summary_State2">
    <select
        id="x_State2"
        name="x_State2"
        class="form-control ew-select<?= $Page->State2->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_State2"
        data-table="ivf_art_summary"
        data-field="x_State2"
        data-value-separator="<?= $Page->State2->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->State2->getPlaceHolder()) ?>"
        <?= $Page->State2->editAttributes() ?>>
        <?= $Page->State2->selectOptionListHtml("x_State2") ?>
    </select>
    <?= $Page->State2->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->State2->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_State2']"),
        options = { name: "x_State2", selectId: "ivf_art_summary_x_State2", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.State2.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.State2.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Code3->Visible) { // Code3 ?>
    <div id="r_Code3" class="form-group row">
        <label id="elh_ivf_art_summary_Code3" for="x_Code3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Code3"><?= $Page->Code3->caption() ?><?= $Page->Code3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Code3->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Code3"><span id="el_ivf_art_summary_Code3">
<input type="<?= $Page->Code3->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Code3" name="x_Code3" id="x_Code3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Code3->getPlaceHolder()) ?>" value="<?= $Page->Code3->EditValue ?>"<?= $Page->Code3->editAttributes() ?> aria-describedby="x_Code3_help">
<?= $Page->Code3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Code3->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day3->Visible) { // Day3 ?>
    <div id="r_Day3" class="form-group row">
        <label id="elh_ivf_art_summary_Day3" for="x_Day3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Day3"><?= $Page->Day3->caption() ?><?= $Page->Day3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day3->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Day3"><span id="el_ivf_art_summary_Day3">
    <select
        id="x_Day3"
        name="x_Day3"
        class="form-control ew-select<?= $Page->Day3->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_Day3"
        data-table="ivf_art_summary"
        data-field="x_Day3"
        data-value-separator="<?= $Page->Day3->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day3->getPlaceHolder()) ?>"
        <?= $Page->Day3->editAttributes() ?>>
        <?= $Page->Day3->selectOptionListHtml("x_Day3") ?>
    </select>
    <?= $Page->Day3->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day3->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_Day3']"),
        options = { name: "x_Day3", selectId: "ivf_art_summary_x_Day3", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.Day3.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.Day3.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CellStage3->Visible) { // CellStage3 ?>
    <div id="r_CellStage3" class="form-group row">
        <label id="elh_ivf_art_summary_CellStage3" for="x_CellStage3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_CellStage3"><?= $Page->CellStage3->caption() ?><?= $Page->CellStage3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CellStage3->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_CellStage3"><span id="el_ivf_art_summary_CellStage3">
    <select
        id="x_CellStage3"
        name="x_CellStage3"
        class="form-control ew-select<?= $Page->CellStage3->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_CellStage3"
        data-table="ivf_art_summary"
        data-field="x_CellStage3"
        data-value-separator="<?= $Page->CellStage3->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->CellStage3->getPlaceHolder()) ?>"
        <?= $Page->CellStage3->editAttributes() ?>>
        <?= $Page->CellStage3->selectOptionListHtml("x_CellStage3") ?>
    </select>
    <?= $Page->CellStage3->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->CellStage3->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_CellStage3']"),
        options = { name: "x_CellStage3", selectId: "ivf_art_summary_x_CellStage3", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.CellStage3.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.CellStage3.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Grade3->Visible) { // Grade3 ?>
    <div id="r_Grade3" class="form-group row">
        <label id="elh_ivf_art_summary_Grade3" for="x_Grade3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Grade3"><?= $Page->Grade3->caption() ?><?= $Page->Grade3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Grade3->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Grade3"><span id="el_ivf_art_summary_Grade3">
    <select
        id="x_Grade3"
        name="x_Grade3"
        class="form-control ew-select<?= $Page->Grade3->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_Grade3"
        data-table="ivf_art_summary"
        data-field="x_Grade3"
        data-value-separator="<?= $Page->Grade3->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Grade3->getPlaceHolder()) ?>"
        <?= $Page->Grade3->editAttributes() ?>>
        <?= $Page->Grade3->selectOptionListHtml("x_Grade3") ?>
    </select>
    <?= $Page->Grade3->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Grade3->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_Grade3']"),
        options = { name: "x_Grade3", selectId: "ivf_art_summary_x_Grade3", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.Grade3.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.Grade3.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->State3->Visible) { // State3 ?>
    <div id="r_State3" class="form-group row">
        <label id="elh_ivf_art_summary_State3" for="x_State3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_State3"><?= $Page->State3->caption() ?><?= $Page->State3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->State3->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_State3"><span id="el_ivf_art_summary_State3">
    <select
        id="x_State3"
        name="x_State3"
        class="form-control ew-select<?= $Page->State3->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_State3"
        data-table="ivf_art_summary"
        data-field="x_State3"
        data-value-separator="<?= $Page->State3->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->State3->getPlaceHolder()) ?>"
        <?= $Page->State3->editAttributes() ?>>
        <?= $Page->State3->selectOptionListHtml("x_State3") ?>
    </select>
    <?= $Page->State3->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->State3->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_State3']"),
        options = { name: "x_State3", selectId: "ivf_art_summary_x_State3", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.State3.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.State3.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Code4->Visible) { // Code4 ?>
    <div id="r_Code4" class="form-group row">
        <label id="elh_ivf_art_summary_Code4" for="x_Code4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Code4"><?= $Page->Code4->caption() ?><?= $Page->Code4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Code4->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Code4"><span id="el_ivf_art_summary_Code4">
<input type="<?= $Page->Code4->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Code4" name="x_Code4" id="x_Code4" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Code4->getPlaceHolder()) ?>" value="<?= $Page->Code4->EditValue ?>"<?= $Page->Code4->editAttributes() ?> aria-describedby="x_Code4_help">
<?= $Page->Code4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Code4->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day4->Visible) { // Day4 ?>
    <div id="r_Day4" class="form-group row">
        <label id="elh_ivf_art_summary_Day4" for="x_Day4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Day4"><?= $Page->Day4->caption() ?><?= $Page->Day4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day4->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Day4"><span id="el_ivf_art_summary_Day4">
    <select
        id="x_Day4"
        name="x_Day4"
        class="form-control ew-select<?= $Page->Day4->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_Day4"
        data-table="ivf_art_summary"
        data-field="x_Day4"
        data-value-separator="<?= $Page->Day4->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day4->getPlaceHolder()) ?>"
        <?= $Page->Day4->editAttributes() ?>>
        <?= $Page->Day4->selectOptionListHtml("x_Day4") ?>
    </select>
    <?= $Page->Day4->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day4->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_Day4']"),
        options = { name: "x_Day4", selectId: "ivf_art_summary_x_Day4", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.Day4.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.Day4.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CellStage4->Visible) { // CellStage4 ?>
    <div id="r_CellStage4" class="form-group row">
        <label id="elh_ivf_art_summary_CellStage4" for="x_CellStage4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_CellStage4"><?= $Page->CellStage4->caption() ?><?= $Page->CellStage4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CellStage4->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_CellStage4"><span id="el_ivf_art_summary_CellStage4">
    <select
        id="x_CellStage4"
        name="x_CellStage4"
        class="form-control ew-select<?= $Page->CellStage4->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_CellStage4"
        data-table="ivf_art_summary"
        data-field="x_CellStage4"
        data-value-separator="<?= $Page->CellStage4->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->CellStage4->getPlaceHolder()) ?>"
        <?= $Page->CellStage4->editAttributes() ?>>
        <?= $Page->CellStage4->selectOptionListHtml("x_CellStage4") ?>
    </select>
    <?= $Page->CellStage4->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->CellStage4->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_CellStage4']"),
        options = { name: "x_CellStage4", selectId: "ivf_art_summary_x_CellStage4", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.CellStage4.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.CellStage4.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Grade4->Visible) { // Grade4 ?>
    <div id="r_Grade4" class="form-group row">
        <label id="elh_ivf_art_summary_Grade4" for="x_Grade4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Grade4"><?= $Page->Grade4->caption() ?><?= $Page->Grade4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Grade4->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Grade4"><span id="el_ivf_art_summary_Grade4">
    <select
        id="x_Grade4"
        name="x_Grade4"
        class="form-control ew-select<?= $Page->Grade4->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_Grade4"
        data-table="ivf_art_summary"
        data-field="x_Grade4"
        data-value-separator="<?= $Page->Grade4->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Grade4->getPlaceHolder()) ?>"
        <?= $Page->Grade4->editAttributes() ?>>
        <?= $Page->Grade4->selectOptionListHtml("x_Grade4") ?>
    </select>
    <?= $Page->Grade4->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Grade4->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_Grade4']"),
        options = { name: "x_Grade4", selectId: "ivf_art_summary_x_Grade4", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.Grade4.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.Grade4.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->State4->Visible) { // State4 ?>
    <div id="r_State4" class="form-group row">
        <label id="elh_ivf_art_summary_State4" for="x_State4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_State4"><?= $Page->State4->caption() ?><?= $Page->State4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->State4->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_State4"><span id="el_ivf_art_summary_State4">
    <select
        id="x_State4"
        name="x_State4"
        class="form-control ew-select<?= $Page->State4->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_State4"
        data-table="ivf_art_summary"
        data-field="x_State4"
        data-value-separator="<?= $Page->State4->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->State4->getPlaceHolder()) ?>"
        <?= $Page->State4->editAttributes() ?>>
        <?= $Page->State4->selectOptionListHtml("x_State4") ?>
    </select>
    <?= $Page->State4->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->State4->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_State4']"),
        options = { name: "x_State4", selectId: "ivf_art_summary_x_State4", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.State4.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.State4.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Code5->Visible) { // Code5 ?>
    <div id="r_Code5" class="form-group row">
        <label id="elh_ivf_art_summary_Code5" for="x_Code5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Code5"><?= $Page->Code5->caption() ?><?= $Page->Code5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Code5->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Code5"><span id="el_ivf_art_summary_Code5">
<input type="<?= $Page->Code5->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Code5" name="x_Code5" id="x_Code5" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Code5->getPlaceHolder()) ?>" value="<?= $Page->Code5->EditValue ?>"<?= $Page->Code5->editAttributes() ?> aria-describedby="x_Code5_help">
<?= $Page->Code5->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Code5->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Day5->Visible) { // Day5 ?>
    <div id="r_Day5" class="form-group row">
        <label id="elh_ivf_art_summary_Day5" for="x_Day5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Day5"><?= $Page->Day5->caption() ?><?= $Page->Day5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Day5->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Day5"><span id="el_ivf_art_summary_Day5">
    <select
        id="x_Day5"
        name="x_Day5"
        class="form-control ew-select<?= $Page->Day5->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_Day5"
        data-table="ivf_art_summary"
        data-field="x_Day5"
        data-value-separator="<?= $Page->Day5->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Day5->getPlaceHolder()) ?>"
        <?= $Page->Day5->editAttributes() ?>>
        <?= $Page->Day5->selectOptionListHtml("x_Day5") ?>
    </select>
    <?= $Page->Day5->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Day5->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_Day5']"),
        options = { name: "x_Day5", selectId: "ivf_art_summary_x_Day5", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.Day5.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.Day5.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CellStage5->Visible) { // CellStage5 ?>
    <div id="r_CellStage5" class="form-group row">
        <label id="elh_ivf_art_summary_CellStage5" for="x_CellStage5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_CellStage5"><?= $Page->CellStage5->caption() ?><?= $Page->CellStage5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CellStage5->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_CellStage5"><span id="el_ivf_art_summary_CellStage5">
    <select
        id="x_CellStage5"
        name="x_CellStage5"
        class="form-control ew-select<?= $Page->CellStage5->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_CellStage5"
        data-table="ivf_art_summary"
        data-field="x_CellStage5"
        data-value-separator="<?= $Page->CellStage5->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->CellStage5->getPlaceHolder()) ?>"
        <?= $Page->CellStage5->editAttributes() ?>>
        <?= $Page->CellStage5->selectOptionListHtml("x_CellStage5") ?>
    </select>
    <?= $Page->CellStage5->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->CellStage5->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_CellStage5']"),
        options = { name: "x_CellStage5", selectId: "ivf_art_summary_x_CellStage5", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.CellStage5.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.CellStage5.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Grade5->Visible) { // Grade5 ?>
    <div id="r_Grade5" class="form-group row">
        <label id="elh_ivf_art_summary_Grade5" for="x_Grade5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Grade5"><?= $Page->Grade5->caption() ?><?= $Page->Grade5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Grade5->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Grade5"><span id="el_ivf_art_summary_Grade5">
    <select
        id="x_Grade5"
        name="x_Grade5"
        class="form-control ew-select<?= $Page->Grade5->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_Grade5"
        data-table="ivf_art_summary"
        data-field="x_Grade5"
        data-value-separator="<?= $Page->Grade5->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Grade5->getPlaceHolder()) ?>"
        <?= $Page->Grade5->editAttributes() ?>>
        <?= $Page->Grade5->selectOptionListHtml("x_Grade5") ?>
    </select>
    <?= $Page->Grade5->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Grade5->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_Grade5']"),
        options = { name: "x_Grade5", selectId: "ivf_art_summary_x_Grade5", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.Grade5.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.Grade5.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->State5->Visible) { // State5 ?>
    <div id="r_State5" class="form-group row">
        <label id="elh_ivf_art_summary_State5" for="x_State5" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_State5"><?= $Page->State5->caption() ?><?= $Page->State5->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->State5->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_State5"><span id="el_ivf_art_summary_State5">
    <select
        id="x_State5"
        name="x_State5"
        class="form-control ew-select<?= $Page->State5->isInvalidClass() ?>"
        data-select2-id="ivf_art_summary_x_State5"
        data-table="ivf_art_summary"
        data-field="x_State5"
        data-value-separator="<?= $Page->State5->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->State5->getPlaceHolder()) ?>"
        <?= $Page->State5->editAttributes() ?>>
        <?= $Page->State5->selectOptionListHtml("x_State5") ?>
    </select>
    <?= $Page->State5->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->State5->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_art_summary_x_State5']"),
        options = { name: "x_State5", selectId: "ivf_art_summary_x_State5", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_art_summary.fields.State5.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_art_summary.fields.State5.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_art_summary_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_TidNo"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_TidNo"><span id="el_ivf_art_summary_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label id="elh_ivf_art_summary_RIDNo" for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_RIDNo"><?= $Page->RIDNo->caption() ?><?= $Page->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_RIDNo"><span id="el_ivf_art_summary_RIDNo">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?> aria-describedby="x_RIDNo_help">
<?= $Page->RIDNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
    <div id="r_Volume" class="form-group row">
        <label id="elh_ivf_art_summary_Volume" for="x_Volume" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Volume"><?= $Page->Volume->caption() ?><?= $Page->Volume->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Volume->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Volume"><span id="el_ivf_art_summary_Volume">
<input type="<?= $Page->Volume->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Volume" name="x_Volume" id="x_Volume" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Volume->getPlaceHolder()) ?>" value="<?= $Page->Volume->EditValue ?>"<?= $Page->Volume->editAttributes() ?> aria-describedby="x_Volume_help">
<?= $Page->Volume->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Volume->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Volume1->Visible) { // Volume1 ?>
    <div id="r_Volume1" class="form-group row">
        <label id="elh_ivf_art_summary_Volume1" for="x_Volume1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Volume1"><?= $Page->Volume1->caption() ?><?= $Page->Volume1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Volume1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Volume1"><span id="el_ivf_art_summary_Volume1">
<input type="<?= $Page->Volume1->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Volume1" name="x_Volume1" id="x_Volume1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Volume1->getPlaceHolder()) ?>" value="<?= $Page->Volume1->EditValue ?>"<?= $Page->Volume1->editAttributes() ?> aria-describedby="x_Volume1_help">
<?= $Page->Volume1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Volume1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Volume2->Visible) { // Volume2 ?>
    <div id="r_Volume2" class="form-group row">
        <label id="elh_ivf_art_summary_Volume2" for="x_Volume2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Volume2"><?= $Page->Volume2->caption() ?><?= $Page->Volume2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Volume2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Volume2"><span id="el_ivf_art_summary_Volume2">
<input type="<?= $Page->Volume2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Volume2" name="x_Volume2" id="x_Volume2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Volume2->getPlaceHolder()) ?>" value="<?= $Page->Volume2->EditValue ?>"<?= $Page->Volume2->editAttributes() ?> aria-describedby="x_Volume2_help">
<?= $Page->Volume2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Volume2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Concentration2->Visible) { // Concentration2 ?>
    <div id="r_Concentration2" class="form-group row">
        <label id="elh_ivf_art_summary_Concentration2" for="x_Concentration2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Concentration2"><?= $Page->Concentration2->caption() ?><?= $Page->Concentration2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Concentration2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Concentration2"><span id="el_ivf_art_summary_Concentration2">
<input type="<?= $Page->Concentration2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Concentration2" name="x_Concentration2" id="x_Concentration2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Concentration2->getPlaceHolder()) ?>" value="<?= $Page->Concentration2->EditValue ?>"<?= $Page->Concentration2->editAttributes() ?> aria-describedby="x_Concentration2_help">
<?= $Page->Concentration2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Concentration2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
    <div id="r_Total" class="form-group row">
        <label id="elh_ivf_art_summary_Total" for="x_Total" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Total"><?= $Page->Total->caption() ?><?= $Page->Total->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Total->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Total"><span id="el_ivf_art_summary_Total">
<input type="<?= $Page->Total->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Total" name="x_Total" id="x_Total" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Total->getPlaceHolder()) ?>" value="<?= $Page->Total->EditValue ?>"<?= $Page->Total->editAttributes() ?> aria-describedby="x_Total_help">
<?= $Page->Total->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Total->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Total1->Visible) { // Total1 ?>
    <div id="r_Total1" class="form-group row">
        <label id="elh_ivf_art_summary_Total1" for="x_Total1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Total1"><?= $Page->Total1->caption() ?><?= $Page->Total1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Total1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Total1"><span id="el_ivf_art_summary_Total1">
<input type="<?= $Page->Total1->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Total1" name="x_Total1" id="x_Total1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Total1->getPlaceHolder()) ?>" value="<?= $Page->Total1->EditValue ?>"<?= $Page->Total1->editAttributes() ?> aria-describedby="x_Total1_help">
<?= $Page->Total1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Total1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Total2->Visible) { // Total2 ?>
    <div id="r_Total2" class="form-group row">
        <label id="elh_ivf_art_summary_Total2" for="x_Total2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Total2"><?= $Page->Total2->caption() ?><?= $Page->Total2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Total2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Total2"><span id="el_ivf_art_summary_Total2">
<input type="<?= $Page->Total2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Total2" name="x_Total2" id="x_Total2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Total2->getPlaceHolder()) ?>" value="<?= $Page->Total2->EditValue ?>"<?= $Page->Total2->editAttributes() ?> aria-describedby="x_Total2_help">
<?= $Page->Total2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Total2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Progressive->Visible) { // Progressive ?>
    <div id="r_Progressive" class="form-group row">
        <label id="elh_ivf_art_summary_Progressive" for="x_Progressive" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Progressive"><?= $Page->Progressive->caption() ?><?= $Page->Progressive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Progressive->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Progressive"><span id="el_ivf_art_summary_Progressive">
<input type="<?= $Page->Progressive->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Progressive" name="x_Progressive" id="x_Progressive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Progressive->getPlaceHolder()) ?>" value="<?= $Page->Progressive->EditValue ?>"<?= $Page->Progressive->editAttributes() ?> aria-describedby="x_Progressive_help">
<?= $Page->Progressive->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Progressive->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Progressive1->Visible) { // Progressive1 ?>
    <div id="r_Progressive1" class="form-group row">
        <label id="elh_ivf_art_summary_Progressive1" for="x_Progressive1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Progressive1"><?= $Page->Progressive1->caption() ?><?= $Page->Progressive1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Progressive1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Progressive1"><span id="el_ivf_art_summary_Progressive1">
<input type="<?= $Page->Progressive1->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Progressive1" name="x_Progressive1" id="x_Progressive1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Progressive1->getPlaceHolder()) ?>" value="<?= $Page->Progressive1->EditValue ?>"<?= $Page->Progressive1->editAttributes() ?> aria-describedby="x_Progressive1_help">
<?= $Page->Progressive1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Progressive1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Progressive2->Visible) { // Progressive2 ?>
    <div id="r_Progressive2" class="form-group row">
        <label id="elh_ivf_art_summary_Progressive2" for="x_Progressive2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Progressive2"><?= $Page->Progressive2->caption() ?><?= $Page->Progressive2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Progressive2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Progressive2"><span id="el_ivf_art_summary_Progressive2">
<input type="<?= $Page->Progressive2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Progressive2" name="x_Progressive2" id="x_Progressive2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Progressive2->getPlaceHolder()) ?>" value="<?= $Page->Progressive2->EditValue ?>"<?= $Page->Progressive2->editAttributes() ?> aria-describedby="x_Progressive2_help">
<?= $Page->Progressive2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Progressive2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NotProgressive->Visible) { // NotProgressive ?>
    <div id="r_NotProgressive" class="form-group row">
        <label id="elh_ivf_art_summary_NotProgressive" for="x_NotProgressive" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_NotProgressive"><?= $Page->NotProgressive->caption() ?><?= $Page->NotProgressive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NotProgressive->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_NotProgressive"><span id="el_ivf_art_summary_NotProgressive">
<input type="<?= $Page->NotProgressive->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_NotProgressive" name="x_NotProgressive" id="x_NotProgressive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NotProgressive->getPlaceHolder()) ?>" value="<?= $Page->NotProgressive->EditValue ?>"<?= $Page->NotProgressive->editAttributes() ?> aria-describedby="x_NotProgressive_help">
<?= $Page->NotProgressive->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NotProgressive->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NotProgressive1->Visible) { // NotProgressive1 ?>
    <div id="r_NotProgressive1" class="form-group row">
        <label id="elh_ivf_art_summary_NotProgressive1" for="x_NotProgressive1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_NotProgressive1"><?= $Page->NotProgressive1->caption() ?><?= $Page->NotProgressive1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NotProgressive1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_NotProgressive1"><span id="el_ivf_art_summary_NotProgressive1">
<input type="<?= $Page->NotProgressive1->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_NotProgressive1" name="x_NotProgressive1" id="x_NotProgressive1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NotProgressive1->getPlaceHolder()) ?>" value="<?= $Page->NotProgressive1->EditValue ?>"<?= $Page->NotProgressive1->editAttributes() ?> aria-describedby="x_NotProgressive1_help">
<?= $Page->NotProgressive1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NotProgressive1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NotProgressive2->Visible) { // NotProgressive2 ?>
    <div id="r_NotProgressive2" class="form-group row">
        <label id="elh_ivf_art_summary_NotProgressive2" for="x_NotProgressive2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_NotProgressive2"><?= $Page->NotProgressive2->caption() ?><?= $Page->NotProgressive2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NotProgressive2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_NotProgressive2"><span id="el_ivf_art_summary_NotProgressive2">
<input type="<?= $Page->NotProgressive2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_NotProgressive2" name="x_NotProgressive2" id="x_NotProgressive2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NotProgressive2->getPlaceHolder()) ?>" value="<?= $Page->NotProgressive2->EditValue ?>"<?= $Page->NotProgressive2->editAttributes() ?> aria-describedby="x_NotProgressive2_help">
<?= $Page->NotProgressive2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NotProgressive2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Motility2->Visible) { // Motility2 ?>
    <div id="r_Motility2" class="form-group row">
        <label id="elh_ivf_art_summary_Motility2" for="x_Motility2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Motility2"><?= $Page->Motility2->caption() ?><?= $Page->Motility2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Motility2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Motility2"><span id="el_ivf_art_summary_Motility2">
<input type="<?= $Page->Motility2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Motility2" name="x_Motility2" id="x_Motility2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Motility2->getPlaceHolder()) ?>" value="<?= $Page->Motility2->EditValue ?>"<?= $Page->Motility2->editAttributes() ?> aria-describedby="x_Motility2_help">
<?= $Page->Motility2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Motility2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Morphology2->Visible) { // Morphology2 ?>
    <div id="r_Morphology2" class="form-group row">
        <label id="elh_ivf_art_summary_Morphology2" for="x_Morphology2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_art_summary_Morphology2"><?= $Page->Morphology2->caption() ?><?= $Page->Morphology2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Morphology2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Morphology2"><span id="el_ivf_art_summary_Morphology2">
<input type="<?= $Page->Morphology2->getInputTextType() ?>" data-table="ivf_art_summary" data-field="x_Morphology2" name="x_Morphology2" id="x_Morphology2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Morphology2->getPlaceHolder()) ?>" value="<?= $Page->Morphology2->EditValue ?>"<?= $Page->Morphology2->editAttributes() ?> aria-describedby="x_Morphology2_help">
<?= $Page->Morphology2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Morphology2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_art_summaryedit" class="ew-custom-template"></div>
<template id="tpm_ivf_art_summaryedit">
<div id="ct_IvfArtSummaryEdit"><style>
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
				<h3 class="card-title">CHARACTERSTICS OF CYCLE</h3>
			</div>
			<div class="card-body">
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td style="width:50%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_ARTCycle"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_ARTCycle"></slot></span>
				 </td>
				 <td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Spermorigin"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Spermorigin"></slot></span>
				</td>
		 </tr>
		 <tr>
				<td style="width:50%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_InseminatinTechnique"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_InseminatinTechnique"></slot></span>
				 </td>
				 <td>					
				 </td>
		 </tr>
		  <tr>
				<td style="width:50%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_IndicationforART"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_IndicationforART"></slot></span>
				</td>
				<td>				
				</td>
		 </tr>
		 <tr>
				<td style="width:50%">
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_ICSIDetails"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_ICSIDetails"></slot></span>
				</td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_DateofICSI"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_DateofICSI"></slot></span>
				</td>
		 </tr>		 
	</tbody>
</table>
 <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">FOLLICULAR RETRIEVAL</h3>
			</div>
			<div class="card-body">
<table   class="table table-striped ew-table ew-export-table" style="width:100%;">
	<thead>
		<tr>
				<td style="width:33%">
					<span class="ew-cell">Mature Oocytes</span>
				 </td>
				 <td style="width:33%">
					<span class="ew-cell">Immature Oocytes</span>
				 </td>
				 <td>
					<span class="ew-cell">Fertilisation details</span>
				</td>
		 </tr>
	</thead>
	<tbody>
		 <tr>
				<td style="width:33%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_M2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_M2"></slot></span>
				 </td>
				 <td style="width:33%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_M1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_M1"></slot></span>
				 </td>
				 <td>
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Normal2PN"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Normal2PN"></slot></span>
				 </td>
		 </tr>
		  <tr>
				<td style="width:33%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Mi2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Mi2"></slot></span>
				</td>
				<td style="width:33%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_GV"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_GV"></slot></span>
				 </td>
				<td>
				<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Abnormalfertilisation1N"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Abnormalfertilisation1N"></slot></span>
				</td>
		 </tr>
		 <tr>
				<td style="width:33%">
					 <span class="ew-cell"></span>
				</td>
				<td style="width:33%">
					<span class="ew-cell"><slot class="ew-slot" name="tpx_Others"></slot></span>
				 </td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Abnormalfertilisation3N"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Abnormalfertilisation3N"></slot></span>
				</td>
		 </tr>
		  <tr>
				<td style="width:33%">
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_ICSI"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_ICSI"></slot></span>
				</td>
				<td style="width:33%">
					<span class="ew-cell"></span>
				 </td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_NotFertilized"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_NotFertilized"></slot></span>
				</td>
		 </tr>
		  <tr>
				<td style="width:33%">
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_IVF"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_IVF"></slot></span>
				</td>
				<td style="width:33%">
					<span class="ew-cell"></span>
				 </td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Degenerated"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Degenerated"></slot></span>
				</td>
		 </tr>		
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Sperm</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Origin"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Origin"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Status"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Status"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Method"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Method"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_SpermDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_SpermDate"></slot></span>
				  </div>		   
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-8">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Spermiogram</h3>
			</div>
			<div class="card-body">
<table   class="table table-striped ew-table ew-export-table" style="width:100%;">
	<thead>
		<tr>
				<td style="width:25%">
					<span class="ew-cell"></span>
				 </td>
				 <td style="width:25%">
					<span class="ew-cell">Pre Capacitation</span>
				 </td>
				 <td style="width:25%">
					<span class="ew-cell">Post Capacitation</span>
				</td>
				<td style="width:25%">
					<span class="ew-cell"></span>
				 </td>
		 </tr>
	</thead>
	<tbody>
		 <tr>
				<td style="width:25%">
					<span class="ew-cell">Volume (ml.) </span>
				 </td>
				 <td style="width:25%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Volume"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Volume"></slot></span>
				 </td>
				 <td>
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Volume1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Volume1"></slot></span>
				 </td>
				 <td>
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Volume2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Volume2"></slot></span>
				 </td>
		 </tr>
		  <tr>
				<td>
					<span class="ew-cell">Concentration (mili/ml)</span>
				</td>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_pre_Concentration"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_pre_Concentration"></slot></span>
				 </td>
				<td>
				<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_post_Concentration"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_post_Concentration"></slot></span>
				</td>
				<td>
				<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Concentration2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Concentration2"></slot></span>
				</td>
		 </tr>
		 <tr>
				<td>
					 <span class="ew-cell">Total</span>
				</td>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Total"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Total"></slot></span>
				 </td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Total1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Total1"></slot></span>
				</td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Total2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Total2"></slot></span>
				</td>
		 </tr>
		  <tr>
				<td>
					 <span class="ew-cell">Progressive (%)</span>
				</td>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Progressive"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Progressive"></slot></span>
				 </td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Progressive1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Progressive1"></slot></span>
				</td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Progressive2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Progressive2"></slot></span>
				</td>
		 </tr>
		  <tr>
				<td>
					 <span class="ew-cell">Not Progressive (%)</span>
				</td>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_NotProgressive"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_NotProgressive"></slot></span>
				 </td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_NotProgressive1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_NotProgressive1"></slot></span>
				</td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_NotProgressive2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_NotProgressive2"></slot></span>
				</td>
		 </tr>
		  <tr>
				<td>
					 <span class="ew-cell">Motility (%)</span>
				</td>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_pre_Motility"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_pre_Motility"></slot></span>
				 </td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_post_Motility"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_post_Motility"></slot></span>
				</td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Motility2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Motility2"></slot></span>
				</td>
		 </tr>
		  <tr>
				<td>
					 <span class="ew-cell">Morphology (%)</span>
				</td>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_pre_Morphology"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_pre_Morphology"></slot></span>
				 </td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_post_Morphology"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_post_Morphology"></slot></span>
				</td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Morphology2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Morphology2"></slot></span>
				</td>
		 </tr>	
	</tbody>
</table>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Summary of Embryo transfer( ET)</h3>
			</div>
			<div class="card-body">
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td style="width:50%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_DateofET"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_DateofET"></slot></span>
				 </td>
				 <td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_NumberofEmbryostransferred"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_NumberofEmbryostransferred"></slot></span>
				</td>
		 </tr>
		 <tr>
				<td style="width:50%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Reasonfornotranfer"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Reasonfornotranfer"></slot></span>
				 </td>
				 <td>
				 	<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Embryosunderobservation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Embryosunderobservation"></slot></span>
				 </td>
		 </tr>
  		  <tr>
				<td style="width:50%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_EmbryosCryopreserved"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_EmbryosCryopreserved"></slot></span>
				</td>
				<td>				
				</td>
		 </tr>
	</tbody>
</table>
 <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Embryo Development Summary</h3>
			</div>
			<div class="card-body">
<table   class="table table-striped ew-table ew-export-table" style="width:100%;">
	<thead>
		<tr>
				<td style="width:16%">
					<span class="ew-cell">Embryo</span>
				 </td>
				 <td style="width:16%">
					<span class="ew-cell">Code</span>
				 </td>
				 <td style="width:16%">
					<span class="ew-cell">Day</span>
				</td>
				 <td style="width:16%">
					<span class="ew-cell">Cell Stage</span>
				</td>
				 <td style="width:16%">
					<span class="ew-cell">Grade</span>
				</td>
				 <td style="width:16%">
					<span class="ew-cell">State</span>
				</td>
		 </tr>
	</thead>
	<tbody>
		 <tr>
				<td  style="width:16%">
					<span class="ew-cell">1</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Code1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Code1"></slot></span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Day1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Day1"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_CellStage1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_CellStage1"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Grade1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Grade1"></slot></span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_State1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_State1"></slot></span>
				 </td>
		 </tr>
		 		 <tr>
				<td  style="width:16%">
					<span class="ew-cell">2</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Code2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Code2"></slot></span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Day2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Day2"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_CellStage2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_CellStage2"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Grade2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Grade2"></slot></span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_State2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_State2"></slot></span>
				 </td>
		 </tr>
		 		 <tr>
				<td  style="width:16%">
					<span class="ew-cell">3</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Code3"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Code3"></slot></span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Day3"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Day3"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_CellStage3"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_CellStage3"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Grade3"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Grade3"></slot></span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_State3"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_State3"></slot></span>
				 </td>
		 </tr>
		 		 <tr>
				<td  style="width:16%">
					<span class="ew-cell">4</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Code4"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Code4"></slot></span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Day4"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Day4"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_CellStage4"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_CellStage4"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Grade4"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Grade4"></slot></span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_State4"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_State4"></slot></span>
				 </td>
		 </tr>
		 		 <tr>
				<td  style="width:16%">
					<span class="ew-cell">5</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Code5"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Code5"></slot></span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Day5"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Day5"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_CellStage5"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_CellStage5"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Grade5"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Grade5"></slot></span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_State5"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_State5"></slot></span>
				 </td>
		 </tr>
	</tbody>
</table>
			  <!-- /.card-body -->
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
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td style="width:50%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_EmbryologistSignature"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_EmbryologistSignature"></slot></span>
				 </td>
				 <td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_ConsultantsSignature"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_ConsultantsSignature"></slot></span>
				</td>
		 </tr>	 
	</tbody>
</table>
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
    ew.applyTemplate("tpd_ivf_art_summaryedit", "tpm_ivf_art_summaryedit", "ivf_art_summaryedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("ivf_art_summary");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    document.getElementById("x_M2").style.width="180px",document.getElementById("x_M1").style.width="180px",document.getElementById("x_Normal2PN").style.width="180px",document.getElementById("x_Mi2").style.width="180px",document.getElementById("x_GV").style.width="180px",document.getElementById("x_Abnormalfertilisation1N").style.width="180px",document.getElementById("x_Others").style.width="180px",document.getElementById("x_Abnormalfertilisation3N").style.width="180px",document.getElementById("x_ICSI").style.width="180px",document.getElementById("x_NotFertilized").style.width="180px",document.getElementById("x_IVF").style.width="180px",document.getElementById("x_Degenerated").style.width="180px",document.getElementById("x_pre_Concentration").style.width="180px",document.getElementById("x_post_Concentration").style.width="180px",document.getElementById("x_pre_Motility").style.width="180px",document.getElementById("x_post_Motility").style.width="180px",document.getElementById("x_pre_Morphology").style.width="180px",document.getElementById("x_post_Morphology").style.width="180px",document.getElementById("x_Volume").style.width="180px",document.getElementById("x_Volume1").style.width="180px",document.getElementById("x_Volume2").style.width="180px",document.getElementById("x_Concentration2").style.width="180px",document.getElementById("x_Total").style.width="180px",document.getElementById("x_Total1").style.width="180px",document.getElementById("x_Total2").style.width="180px",document.getElementById("x_Progressive").style.width="180px",document.getElementById("x_Progressive1").style.width="180px",document.getElementById("x_Progressive2").style.width="180px",document.getElementById("x_NotProgressive").style.width="180px",document.getElementById("x_NotProgressive1").style.width="180px",document.getElementById("x_NotProgressive2").style.width="180px",document.getElementById("x_Motility2").style.width="180px",document.getElementById("x_Morphology2").style.width="180px",document.getElementById("x_Code1").style.width="180px",document.getElementById("x_Day1").style.width="180px",document.getElementById("x_CellStage1").style.width="180px",document.getElementById("x_Grade1").style.width="180px",document.getElementById("x_State1").style.width="180px",document.getElementById("x_Code2").style.width="180px",document.getElementById("x_Day2").style.width="180px",document.getElementById("x_CellStage2").style.width="180px",document.getElementById("x_Grade2").style.width="180px",document.getElementById("x_State2").style.width="180px",document.getElementById("x_Code3").style.width="180px",document.getElementById("x_Day3").style.width="180px",document.getElementById("x_CellStage3").style.width="180px",document.getElementById("x_Grade3").style.width="180px",document.getElementById("x_State3").style.width="180px",document.getElementById("x_Code4").style.width="180px",document.getElementById("x_Day4").style.width="180px",document.getElementById("x_CellStage4").style.width="180px",document.getElementById("x_Grade4").style.width="180px",document.getElementById("x_State4").style.width="180px",document.getElementById("x_Code5").style.width="180px",document.getElementById("x_Day5").style.width="180px",document.getElementById("x_CellStage5").style.width="180px",document.getElementById("x_Grade5").style.width="180px",document.getElementById("x_State5").style.width="180px";
});
</script>

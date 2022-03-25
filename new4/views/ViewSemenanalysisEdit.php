<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewSemenanalysisEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_semenanalysisedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fview_semenanalysisedit = currentForm = new ew.Form("fview_semenanalysisedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_semenanalysis")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_semenanalysis)
        ew.vars.tables.view_semenanalysis = currentTable;
    fview_semenanalysisedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["PaID", [fields.PaID.visible && fields.PaID.required ? ew.Validators.required(fields.PaID.caption) : null], fields.PaID.isInvalid],
        ["PaName", [fields.PaName.visible && fields.PaName.required ? ew.Validators.required(fields.PaName.caption) : null], fields.PaName.isInvalid],
        ["PaMobile", [fields.PaMobile.visible && fields.PaMobile.required ? ew.Validators.required(fields.PaMobile.caption) : null], fields.PaMobile.isInvalid],
        ["PartnerID", [fields.PartnerID.visible && fields.PartnerID.required ? ew.Validators.required(fields.PartnerID.caption) : null], fields.PartnerID.isInvalid],
        ["PartnerName", [fields.PartnerName.visible && fields.PartnerName.required ? ew.Validators.required(fields.PartnerName.caption) : null], fields.PartnerName.isInvalid],
        ["PartnerMobile", [fields.PartnerMobile.visible && fields.PartnerMobile.required ? ew.Validators.required(fields.PartnerMobile.caption) : null], fields.PartnerMobile.isInvalid],
        ["RIDNo", [fields.RIDNo.visible && fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null], fields.RIDNo.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["HusbandName", [fields.HusbandName.visible && fields.HusbandName.required ? ew.Validators.required(fields.HusbandName.caption) : null], fields.HusbandName.isInvalid],
        ["RequestDr", [fields.RequestDr.visible && fields.RequestDr.required ? ew.Validators.required(fields.RequestDr.caption) : null], fields.RequestDr.isInvalid],
        ["CollectionDate", [fields.CollectionDate.visible && fields.CollectionDate.required ? ew.Validators.required(fields.CollectionDate.caption) : null, ew.Validators.datetime(7)], fields.CollectionDate.isInvalid],
        ["ResultDate", [fields.ResultDate.visible && fields.ResultDate.required ? ew.Validators.required(fields.ResultDate.caption) : null, ew.Validators.datetime(7)], fields.ResultDate.isInvalid],
        ["RequestSample", [fields.RequestSample.visible && fields.RequestSample.required ? ew.Validators.required(fields.RequestSample.caption) : null], fields.RequestSample.isInvalid],
        ["CollectionType", [fields.CollectionType.visible && fields.CollectionType.required ? ew.Validators.required(fields.CollectionType.caption) : null], fields.CollectionType.isInvalid],
        ["CollectionMethod", [fields.CollectionMethod.visible && fields.CollectionMethod.required ? ew.Validators.required(fields.CollectionMethod.caption) : null], fields.CollectionMethod.isInvalid],
        ["Medicationused", [fields.Medicationused.visible && fields.Medicationused.required ? ew.Validators.required(fields.Medicationused.caption) : null], fields.Medicationused.isInvalid],
        ["DifficultiesinCollection", [fields.DifficultiesinCollection.visible && fields.DifficultiesinCollection.required ? ew.Validators.required(fields.DifficultiesinCollection.caption) : null], fields.DifficultiesinCollection.isInvalid],
        ["Volume", [fields.Volume.visible && fields.Volume.required ? ew.Validators.required(fields.Volume.caption) : null], fields.Volume.isInvalid],
        ["pH", [fields.pH.visible && fields.pH.required ? ew.Validators.required(fields.pH.caption) : null], fields.pH.isInvalid],
        ["Timeofcollection", [fields.Timeofcollection.visible && fields.Timeofcollection.required ? ew.Validators.required(fields.Timeofcollection.caption) : null], fields.Timeofcollection.isInvalid],
        ["Timeofexamination", [fields.Timeofexamination.visible && fields.Timeofexamination.required ? ew.Validators.required(fields.Timeofexamination.caption) : null], fields.Timeofexamination.isInvalid],
        ["Concentration", [fields.Concentration.visible && fields.Concentration.required ? ew.Validators.required(fields.Concentration.caption) : null], fields.Concentration.isInvalid],
        ["Total", [fields.Total.visible && fields.Total.required ? ew.Validators.required(fields.Total.caption) : null], fields.Total.isInvalid],
        ["ProgressiveMotility", [fields.ProgressiveMotility.visible && fields.ProgressiveMotility.required ? ew.Validators.required(fields.ProgressiveMotility.caption) : null], fields.ProgressiveMotility.isInvalid],
        ["NonProgrssiveMotile", [fields.NonProgrssiveMotile.visible && fields.NonProgrssiveMotile.required ? ew.Validators.required(fields.NonProgrssiveMotile.caption) : null], fields.NonProgrssiveMotile.isInvalid],
        ["Immotile", [fields.Immotile.visible && fields.Immotile.required ? ew.Validators.required(fields.Immotile.caption) : null], fields.Immotile.isInvalid],
        ["TotalProgrssiveMotile", [fields.TotalProgrssiveMotile.visible && fields.TotalProgrssiveMotile.required ? ew.Validators.required(fields.TotalProgrssiveMotile.caption) : null], fields.TotalProgrssiveMotile.isInvalid],
        ["Appearance", [fields.Appearance.visible && fields.Appearance.required ? ew.Validators.required(fields.Appearance.caption) : null], fields.Appearance.isInvalid],
        ["Homogenosity", [fields.Homogenosity.visible && fields.Homogenosity.required ? ew.Validators.required(fields.Homogenosity.caption) : null], fields.Homogenosity.isInvalid],
        ["CompleteSample", [fields.CompleteSample.visible && fields.CompleteSample.required ? ew.Validators.required(fields.CompleteSample.caption) : null], fields.CompleteSample.isInvalid],
        ["Liquefactiontime", [fields.Liquefactiontime.visible && fields.Liquefactiontime.required ? ew.Validators.required(fields.Liquefactiontime.caption) : null], fields.Liquefactiontime.isInvalid],
        ["Normal", [fields.Normal.visible && fields.Normal.required ? ew.Validators.required(fields.Normal.caption) : null], fields.Normal.isInvalid],
        ["Abnormal", [fields.Abnormal.visible && fields.Abnormal.required ? ew.Validators.required(fields.Abnormal.caption) : null], fields.Abnormal.isInvalid],
        ["Headdefects", [fields.Headdefects.visible && fields.Headdefects.required ? ew.Validators.required(fields.Headdefects.caption) : null], fields.Headdefects.isInvalid],
        ["MidpieceDefects", [fields.MidpieceDefects.visible && fields.MidpieceDefects.required ? ew.Validators.required(fields.MidpieceDefects.caption) : null], fields.MidpieceDefects.isInvalid],
        ["TailDefects", [fields.TailDefects.visible && fields.TailDefects.required ? ew.Validators.required(fields.TailDefects.caption) : null], fields.TailDefects.isInvalid],
        ["NormalProgMotile", [fields.NormalProgMotile.visible && fields.NormalProgMotile.required ? ew.Validators.required(fields.NormalProgMotile.caption) : null], fields.NormalProgMotile.isInvalid],
        ["ImmatureForms", [fields.ImmatureForms.visible && fields.ImmatureForms.required ? ew.Validators.required(fields.ImmatureForms.caption) : null], fields.ImmatureForms.isInvalid],
        ["Leucocytes", [fields.Leucocytes.visible && fields.Leucocytes.required ? ew.Validators.required(fields.Leucocytes.caption) : null], fields.Leucocytes.isInvalid],
        ["Agglutination", [fields.Agglutination.visible && fields.Agglutination.required ? ew.Validators.required(fields.Agglutination.caption) : null], fields.Agglutination.isInvalid],
        ["Debris", [fields.Debris.visible && fields.Debris.required ? ew.Validators.required(fields.Debris.caption) : null], fields.Debris.isInvalid],
        ["Diagnosis", [fields.Diagnosis.visible && fields.Diagnosis.required ? ew.Validators.required(fields.Diagnosis.caption) : null], fields.Diagnosis.isInvalid],
        ["Observations", [fields.Observations.visible && fields.Observations.required ? ew.Validators.required(fields.Observations.caption) : null], fields.Observations.isInvalid],
        ["Signature", [fields.Signature.visible && fields.Signature.required ? ew.Validators.required(fields.Signature.caption) : null], fields.Signature.isInvalid],
        ["SemenOrgin", [fields.SemenOrgin.visible && fields.SemenOrgin.required ? ew.Validators.required(fields.SemenOrgin.caption) : null], fields.SemenOrgin.isInvalid],
        ["Donor", [fields.Donor.visible && fields.Donor.required ? ew.Validators.required(fields.Donor.caption) : null], fields.Donor.isInvalid],
        ["DonorBloodgroup", [fields.DonorBloodgroup.visible && fields.DonorBloodgroup.required ? ew.Validators.required(fields.DonorBloodgroup.caption) : null], fields.DonorBloodgroup.isInvalid],
        ["Tank", [fields.Tank.visible && fields.Tank.required ? ew.Validators.required(fields.Tank.caption) : null], fields.Tank.isInvalid],
        ["Location", [fields.Location.visible && fields.Location.required ? ew.Validators.required(fields.Location.caption) : null], fields.Location.isInvalid],
        ["Volume1", [fields.Volume1.visible && fields.Volume1.required ? ew.Validators.required(fields.Volume1.caption) : null], fields.Volume1.isInvalid],
        ["Concentration1", [fields.Concentration1.visible && fields.Concentration1.required ? ew.Validators.required(fields.Concentration1.caption) : null], fields.Concentration1.isInvalid],
        ["Total1", [fields.Total1.visible && fields.Total1.required ? ew.Validators.required(fields.Total1.caption) : null], fields.Total1.isInvalid],
        ["ProgressiveMotility1", [fields.ProgressiveMotility1.visible && fields.ProgressiveMotility1.required ? ew.Validators.required(fields.ProgressiveMotility1.caption) : null], fields.ProgressiveMotility1.isInvalid],
        ["NonProgrssiveMotile1", [fields.NonProgrssiveMotile1.visible && fields.NonProgrssiveMotile1.required ? ew.Validators.required(fields.NonProgrssiveMotile1.caption) : null], fields.NonProgrssiveMotile1.isInvalid],
        ["Immotile1", [fields.Immotile1.visible && fields.Immotile1.required ? ew.Validators.required(fields.Immotile1.caption) : null], fields.Immotile1.isInvalid],
        ["TotalProgrssiveMotile1", [fields.TotalProgrssiveMotile1.visible && fields.TotalProgrssiveMotile1.required ? ew.Validators.required(fields.TotalProgrssiveMotile1.caption) : null], fields.TotalProgrssiveMotile1.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null], fields.TidNo.isInvalid],
        ["Color", [fields.Color.visible && fields.Color.required ? ew.Validators.required(fields.Color.caption) : null], fields.Color.isInvalid],
        ["DoneBy", [fields.DoneBy.visible && fields.DoneBy.required ? ew.Validators.required(fields.DoneBy.caption) : null], fields.DoneBy.isInvalid],
        ["Method", [fields.Method.visible && fields.Method.required ? ew.Validators.required(fields.Method.caption) : null], fields.Method.isInvalid],
        ["Abstinence", [fields.Abstinence.visible && fields.Abstinence.required ? ew.Validators.required(fields.Abstinence.caption) : null], fields.Abstinence.isInvalid],
        ["ProcessedBy", [fields.ProcessedBy.visible && fields.ProcessedBy.required ? ew.Validators.required(fields.ProcessedBy.caption) : null], fields.ProcessedBy.isInvalid],
        ["InseminationTime", [fields.InseminationTime.visible && fields.InseminationTime.required ? ew.Validators.required(fields.InseminationTime.caption) : null], fields.InseminationTime.isInvalid],
        ["InseminationBy", [fields.InseminationBy.visible && fields.InseminationBy.required ? ew.Validators.required(fields.InseminationBy.caption) : null], fields.InseminationBy.isInvalid],
        ["Big", [fields.Big.visible && fields.Big.required ? ew.Validators.required(fields.Big.caption) : null], fields.Big.isInvalid],
        ["Medium", [fields.Medium.visible && fields.Medium.required ? ew.Validators.required(fields.Medium.caption) : null], fields.Medium.isInvalid],
        ["Small", [fields.Small.visible && fields.Small.required ? ew.Validators.required(fields.Small.caption) : null], fields.Small.isInvalid],
        ["NoHalo", [fields.NoHalo.visible && fields.NoHalo.required ? ew.Validators.required(fields.NoHalo.caption) : null], fields.NoHalo.isInvalid],
        ["Fragmented", [fields.Fragmented.visible && fields.Fragmented.required ? ew.Validators.required(fields.Fragmented.caption) : null], fields.Fragmented.isInvalid],
        ["NonFragmented", [fields.NonFragmented.visible && fields.NonFragmented.required ? ew.Validators.required(fields.NonFragmented.caption) : null], fields.NonFragmented.isInvalid],
        ["DFI", [fields.DFI.visible && fields.DFI.required ? ew.Validators.required(fields.DFI.caption) : null], fields.DFI.isInvalid],
        ["IsueBy", [fields.IsueBy.visible && fields.IsueBy.required ? ew.Validators.required(fields.IsueBy.caption) : null], fields.IsueBy.isInvalid],
        ["Volume2", [fields.Volume2.visible && fields.Volume2.required ? ew.Validators.required(fields.Volume2.caption) : null], fields.Volume2.isInvalid],
        ["Concentration2", [fields.Concentration2.visible && fields.Concentration2.required ? ew.Validators.required(fields.Concentration2.caption) : null], fields.Concentration2.isInvalid],
        ["Total2", [fields.Total2.visible && fields.Total2.required ? ew.Validators.required(fields.Total2.caption) : null], fields.Total2.isInvalid],
        ["ProgressiveMotility2", [fields.ProgressiveMotility2.visible && fields.ProgressiveMotility2.required ? ew.Validators.required(fields.ProgressiveMotility2.caption) : null], fields.ProgressiveMotility2.isInvalid],
        ["NonProgrssiveMotile2", [fields.NonProgrssiveMotile2.visible && fields.NonProgrssiveMotile2.required ? ew.Validators.required(fields.NonProgrssiveMotile2.caption) : null], fields.NonProgrssiveMotile2.isInvalid],
        ["Immotile2", [fields.Immotile2.visible && fields.Immotile2.required ? ew.Validators.required(fields.Immotile2.caption) : null], fields.Immotile2.isInvalid],
        ["TotalProgrssiveMotile2", [fields.TotalProgrssiveMotile2.visible && fields.TotalProgrssiveMotile2.required ? ew.Validators.required(fields.TotalProgrssiveMotile2.caption) : null], fields.TotalProgrssiveMotile2.isInvalid],
        ["IssuedBy", [fields.IssuedBy.visible && fields.IssuedBy.required ? ew.Validators.required(fields.IssuedBy.caption) : null], fields.IssuedBy.isInvalid],
        ["IssuedTo", [fields.IssuedTo.visible && fields.IssuedTo.required ? ew.Validators.required(fields.IssuedTo.caption) : null], fields.IssuedTo.isInvalid],
        ["MACS", [fields.MACS.visible && fields.MACS.required ? ew.Validators.required(fields.MACS.caption) : null], fields.MACS.isInvalid],
        ["PREG_TEST_DATE", [fields.PREG_TEST_DATE.visible && fields.PREG_TEST_DATE.required ? ew.Validators.required(fields.PREG_TEST_DATE.caption) : null, ew.Validators.datetime(7)], fields.PREG_TEST_DATE.isInvalid],
        ["SPECIFIC_PROBLEMS", [fields.SPECIFIC_PROBLEMS.visible && fields.SPECIFIC_PROBLEMS.required ? ew.Validators.required(fields.SPECIFIC_PROBLEMS.caption) : null], fields.SPECIFIC_PROBLEMS.isInvalid],
        ["IMSC_1", [fields.IMSC_1.visible && fields.IMSC_1.required ? ew.Validators.required(fields.IMSC_1.caption) : null], fields.IMSC_1.isInvalid],
        ["IMSC_2", [fields.IMSC_2.visible && fields.IMSC_2.required ? ew.Validators.required(fields.IMSC_2.caption) : null], fields.IMSC_2.isInvalid],
        ["LIQUIFACTION_STORAGE", [fields.LIQUIFACTION_STORAGE.visible && fields.LIQUIFACTION_STORAGE.required ? ew.Validators.required(fields.LIQUIFACTION_STORAGE.caption) : null], fields.LIQUIFACTION_STORAGE.isInvalid],
        ["IUI_PREP_METHOD", [fields.IUI_PREP_METHOD.visible && fields.IUI_PREP_METHOD.required ? ew.Validators.required(fields.IUI_PREP_METHOD.caption) : null], fields.IUI_PREP_METHOD.isInvalid],
        ["TIME_FROM_TRIGGER", [fields.TIME_FROM_TRIGGER.visible && fields.TIME_FROM_TRIGGER.required ? ew.Validators.required(fields.TIME_FROM_TRIGGER.caption) : null], fields.TIME_FROM_TRIGGER.isInvalid],
        ["COLLECTION_TO_PREPARATION", [fields.COLLECTION_TO_PREPARATION.visible && fields.COLLECTION_TO_PREPARATION.required ? ew.Validators.required(fields.COLLECTION_TO_PREPARATION.caption) : null], fields.COLLECTION_TO_PREPARATION.isInvalid],
        ["TIME_FROM_PREP_TO_INSEM", [fields.TIME_FROM_PREP_TO_INSEM.visible && fields.TIME_FROM_PREP_TO_INSEM.required ? ew.Validators.required(fields.TIME_FROM_PREP_TO_INSEM.caption) : null], fields.TIME_FROM_PREP_TO_INSEM.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_semenanalysisedit,
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
    fview_semenanalysisedit.validate = function () {
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
    fview_semenanalysisedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_semenanalysisedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_semenanalysisedit.lists.RequestSample = <?= $Page->RequestSample->toClientList($Page) ?>;
    fview_semenanalysisedit.lists.CollectionType = <?= $Page->CollectionType->toClientList($Page) ?>;
    fview_semenanalysisedit.lists.CollectionMethod = <?= $Page->CollectionMethod->toClientList($Page) ?>;
    fview_semenanalysisedit.lists.Medicationused = <?= $Page->Medicationused->toClientList($Page) ?>;
    fview_semenanalysisedit.lists.DifficultiesinCollection = <?= $Page->DifficultiesinCollection->toClientList($Page) ?>;
    fview_semenanalysisedit.lists.Homogenosity = <?= $Page->Homogenosity->toClientList($Page) ?>;
    fview_semenanalysisedit.lists.CompleteSample = <?= $Page->CompleteSample->toClientList($Page) ?>;
    fview_semenanalysisedit.lists.SemenOrgin = <?= $Page->SemenOrgin->toClientList($Page) ?>;
    fview_semenanalysisedit.lists.Donor = <?= $Page->Donor->toClientList($Page) ?>;
    fview_semenanalysisedit.lists.MACS = <?= $Page->MACS->toClientList($Page) ?>;
    fview_semenanalysisedit.lists.SPECIFIC_PROBLEMS = <?= $Page->SPECIFIC_PROBLEMS->toClientList($Page) ?>;
    fview_semenanalysisedit.lists.LIQUIFACTION_STORAGE = <?= $Page->LIQUIFACTION_STORAGE->toClientList($Page) ?>;
    fview_semenanalysisedit.lists.IUI_PREP_METHOD = <?= $Page->IUI_PREP_METHOD->toClientList($Page) ?>;
    fview_semenanalysisedit.lists.TIME_FROM_TRIGGER = <?= $Page->TIME_FROM_TRIGGER->toClientList($Page) ?>;
    fview_semenanalysisedit.lists.COLLECTION_TO_PREPARATION = <?= $Page->COLLECTION_TO_PREPARATION->toClientList($Page) ?>;
    fview_semenanalysisedit.lists.TIME_FROM_PREP_TO_INSEM = <?= $Page->TIME_FROM_PREP_TO_INSEM->toClientList($Page) ?>;
    loadjs.done("fview_semenanalysisedit");
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
<form name="fview_semenanalysisedit" id="fview_semenanalysisedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_semenanalysis">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_view_semenanalysis_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_id"><span id="el_view_semenanalysis_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_semenanalysis" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaID->Visible) { // PaID ?>
    <div id="r_PaID" class="form-group row">
        <label id="elh_view_semenanalysis_PaID" for="x_PaID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_PaID"><?= $Page->PaID->caption() ?><?= $Page->PaID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaID->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_PaID"><span id="el_view_semenanalysis_PaID">
<span<?= $Page->PaID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PaID->getDisplayValue($Page->PaID->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_semenanalysis" data-field="x_PaID" data-hidden="1" name="x_PaID" id="x_PaID" value="<?= HtmlEncode($Page->PaID->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaName->Visible) { // PaName ?>
    <div id="r_PaName" class="form-group row">
        <label id="elh_view_semenanalysis_PaName" for="x_PaName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_PaName"><?= $Page->PaName->caption() ?><?= $Page->PaName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaName->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_PaName"><span id="el_view_semenanalysis_PaName">
<span<?= $Page->PaName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PaName->getDisplayValue($Page->PaName->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_semenanalysis" data-field="x_PaName" data-hidden="1" name="x_PaName" id="x_PaName" value="<?= HtmlEncode($Page->PaName->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaMobile->Visible) { // PaMobile ?>
    <div id="r_PaMobile" class="form-group row">
        <label id="elh_view_semenanalysis_PaMobile" for="x_PaMobile" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_PaMobile"><?= $Page->PaMobile->caption() ?><?= $Page->PaMobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaMobile->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_PaMobile"><span id="el_view_semenanalysis_PaMobile">
<span<?= $Page->PaMobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PaMobile->getDisplayValue($Page->PaMobile->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_semenanalysis" data-field="x_PaMobile" data-hidden="1" name="x_PaMobile" id="x_PaMobile" value="<?= HtmlEncode($Page->PaMobile->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <div id="r_PartnerID" class="form-group row">
        <label id="elh_view_semenanalysis_PartnerID" for="x_PartnerID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_PartnerID"><?= $Page->PartnerID->caption() ?><?= $Page->PartnerID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerID->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_PartnerID"><span id="el_view_semenanalysis_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PartnerID->getDisplayValue($Page->PartnerID->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_semenanalysis" data-field="x_PartnerID" data-hidden="1" name="x_PartnerID" id="x_PartnerID" value="<?= HtmlEncode($Page->PartnerID->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <div id="r_PartnerName" class="form-group row">
        <label id="elh_view_semenanalysis_PartnerName" for="x_PartnerName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_PartnerName"><?= $Page->PartnerName->caption() ?><?= $Page->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerName->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_PartnerName"><span id="el_view_semenanalysis_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PartnerName->getDisplayValue($Page->PartnerName->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_semenanalysis" data-field="x_PartnerName" data-hidden="1" name="x_PartnerName" id="x_PartnerName" value="<?= HtmlEncode($Page->PartnerName->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
    <div id="r_PartnerMobile" class="form-group row">
        <label id="elh_view_semenanalysis_PartnerMobile" for="x_PartnerMobile" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_PartnerMobile"><?= $Page->PartnerMobile->caption() ?><?= $Page->PartnerMobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerMobile->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_PartnerMobile"><span id="el_view_semenanalysis_PartnerMobile">
<span<?= $Page->PartnerMobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PartnerMobile->getDisplayValue($Page->PartnerMobile->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_semenanalysis" data-field="x_PartnerMobile" data-hidden="1" name="x_PartnerMobile" id="x_PartnerMobile" value="<?= HtmlEncode($Page->PartnerMobile->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label id="elh_view_semenanalysis_RIDNo" for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_RIDNo"><?= $Page->RIDNo->caption() ?><?= $Page->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_RIDNo"><span id="el_view_semenanalysis_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RIDNo->getDisplayValue($Page->RIDNo->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_semenanalysis" data-field="x_RIDNo" data-hidden="1" name="x_RIDNo" id="x_RIDNo" value="<?= HtmlEncode($Page->RIDNo->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_view_semenanalysis_PatientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_PatientName"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_PatientName"><span id="el_view_semenanalysis_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientName->getDisplayValue($Page->PatientName->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_semenanalysis" data-field="x_PatientName" data-hidden="1" name="x_PatientName" id="x_PatientName" value="<?= HtmlEncode($Page->PatientName->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HusbandName->Visible) { // HusbandName ?>
    <div id="r_HusbandName" class="form-group row">
        <label id="elh_view_semenanalysis_HusbandName" for="x_HusbandName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_HusbandName"><?= $Page->HusbandName->caption() ?><?= $Page->HusbandName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HusbandName->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_HusbandName"><span id="el_view_semenanalysis_HusbandName">
<span<?= $Page->HusbandName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->HusbandName->getDisplayValue($Page->HusbandName->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_semenanalysis" data-field="x_HusbandName" data-hidden="1" name="x_HusbandName" id="x_HusbandName" value="<?= HtmlEncode($Page->HusbandName->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RequestDr->Visible) { // RequestDr ?>
    <div id="r_RequestDr" class="form-group row">
        <label id="elh_view_semenanalysis_RequestDr" for="x_RequestDr" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_RequestDr"><?= $Page->RequestDr->caption() ?><?= $Page->RequestDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RequestDr->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_RequestDr"><span id="el_view_semenanalysis_RequestDr">
<input type="<?= $Page->RequestDr->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_RequestDr" name="x_RequestDr" id="x_RequestDr" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RequestDr->getPlaceHolder()) ?>" value="<?= $Page->RequestDr->EditValue ?>"<?= $Page->RequestDr->editAttributes() ?> aria-describedby="x_RequestDr_help">
<?= $Page->RequestDr->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RequestDr->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CollectionDate->Visible) { // CollectionDate ?>
    <div id="r_CollectionDate" class="form-group row">
        <label id="elh_view_semenanalysis_CollectionDate" for="x_CollectionDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_CollectionDate"><?= $Page->CollectionDate->caption() ?><?= $Page->CollectionDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CollectionDate->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_CollectionDate"><span id="el_view_semenanalysis_CollectionDate">
<input type="<?= $Page->CollectionDate->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_CollectionDate" data-format="7" name="x_CollectionDate" id="x_CollectionDate" placeholder="<?= HtmlEncode($Page->CollectionDate->getPlaceHolder()) ?>" value="<?= $Page->CollectionDate->EditValue ?>"<?= $Page->CollectionDate->editAttributes() ?> aria-describedby="x_CollectionDate_help">
<?= $Page->CollectionDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CollectionDate->getErrorMessage() ?></div>
<?php if (!$Page->CollectionDate->ReadOnly && !$Page->CollectionDate->Disabled && !isset($Page->CollectionDate->EditAttrs["readonly"]) && !isset($Page->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_semenanalysisedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_semenanalysisedit", "x_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
    <div id="r_ResultDate" class="form-group row">
        <label id="elh_view_semenanalysis_ResultDate" for="x_ResultDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_ResultDate"><?= $Page->ResultDate->caption() ?><?= $Page->ResultDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResultDate->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_ResultDate"><span id="el_view_semenanalysis_ResultDate">
<input type="<?= $Page->ResultDate->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_ResultDate" data-format="7" name="x_ResultDate" id="x_ResultDate" placeholder="<?= HtmlEncode($Page->ResultDate->getPlaceHolder()) ?>" value="<?= $Page->ResultDate->EditValue ?>"<?= $Page->ResultDate->editAttributes() ?> aria-describedby="x_ResultDate_help">
<?= $Page->ResultDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ResultDate->getErrorMessage() ?></div>
<?php if (!$Page->ResultDate->ReadOnly && !$Page->ResultDate->Disabled && !isset($Page->ResultDate->EditAttrs["readonly"]) && !isset($Page->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_semenanalysisedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_semenanalysisedit", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RequestSample->Visible) { // RequestSample ?>
    <div id="r_RequestSample" class="form-group row">
        <label id="elh_view_semenanalysis_RequestSample" for="x_RequestSample" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_RequestSample"><?= $Page->RequestSample->caption() ?><?= $Page->RequestSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RequestSample->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_RequestSample"><span id="el_view_semenanalysis_RequestSample">
    <select
        id="x_RequestSample"
        name="x_RequestSample"
        class="form-control ew-select<?= $Page->RequestSample->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_RequestSample"
        data-table="view_semenanalysis"
        data-field="x_RequestSample"
        data-value-separator="<?= $Page->RequestSample->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RequestSample->getPlaceHolder()) ?>"
        <?= $Page->RequestSample->editAttributes() ?>>
        <?= $Page->RequestSample->selectOptionListHtml("x_RequestSample") ?>
    </select>
    <?= $Page->RequestSample->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->RequestSample->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_RequestSample']"),
        options = { name: "x_RequestSample", selectId: "view_semenanalysis_x_RequestSample", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.RequestSample.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.RequestSample.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CollectionType->Visible) { // CollectionType ?>
    <div id="r_CollectionType" class="form-group row">
        <label id="elh_view_semenanalysis_CollectionType" for="x_CollectionType" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_CollectionType"><?= $Page->CollectionType->caption() ?><?= $Page->CollectionType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CollectionType->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_CollectionType"><span id="el_view_semenanalysis_CollectionType">
    <select
        id="x_CollectionType"
        name="x_CollectionType"
        class="form-control ew-select<?= $Page->CollectionType->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_CollectionType"
        data-table="view_semenanalysis"
        data-field="x_CollectionType"
        data-value-separator="<?= $Page->CollectionType->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->CollectionType->getPlaceHolder()) ?>"
        <?= $Page->CollectionType->editAttributes() ?>>
        <?= $Page->CollectionType->selectOptionListHtml("x_CollectionType") ?>
    </select>
    <?= $Page->CollectionType->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->CollectionType->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_CollectionType']"),
        options = { name: "x_CollectionType", selectId: "view_semenanalysis_x_CollectionType", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.CollectionType.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.CollectionType.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CollectionMethod->Visible) { // CollectionMethod ?>
    <div id="r_CollectionMethod" class="form-group row">
        <label id="elh_view_semenanalysis_CollectionMethod" for="x_CollectionMethod" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_CollectionMethod"><?= $Page->CollectionMethod->caption() ?><?= $Page->CollectionMethod->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CollectionMethod->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_CollectionMethod"><span id="el_view_semenanalysis_CollectionMethod">
    <select
        id="x_CollectionMethod"
        name="x_CollectionMethod"
        class="form-control ew-select<?= $Page->CollectionMethod->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_CollectionMethod"
        data-table="view_semenanalysis"
        data-field="x_CollectionMethod"
        data-value-separator="<?= $Page->CollectionMethod->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->CollectionMethod->getPlaceHolder()) ?>"
        <?= $Page->CollectionMethod->editAttributes() ?>>
        <?= $Page->CollectionMethod->selectOptionListHtml("x_CollectionMethod") ?>
    </select>
    <?= $Page->CollectionMethod->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->CollectionMethod->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_CollectionMethod']"),
        options = { name: "x_CollectionMethod", selectId: "view_semenanalysis_x_CollectionMethod", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.CollectionMethod.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.CollectionMethod.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Medicationused->Visible) { // Medicationused ?>
    <div id="r_Medicationused" class="form-group row">
        <label id="elh_view_semenanalysis_Medicationused" for="x_Medicationused" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Medicationused"><?= $Page->Medicationused->caption() ?><?= $Page->Medicationused->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Medicationused->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Medicationused"><span id="el_view_semenanalysis_Medicationused">
<div class="input-group flex-nowrap">
    <select
        id="x_Medicationused"
        name="x_Medicationused"
        class="form-control ew-select<?= $Page->Medicationused->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_Medicationused"
        data-table="view_semenanalysis"
        data-field="x_Medicationused"
        data-value-separator="<?= $Page->Medicationused->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Medicationused->getPlaceHolder()) ?>"
        <?= $Page->Medicationused->editAttributes() ?>>
        <?= $Page->Medicationused->selectOptionListHtml("x_Medicationused") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_semenan_medication") && !$Page->Medicationused->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Medicationused" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->Medicationused->caption() ?>" data-title="<?= $Page->Medicationused->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Medicationused',url:'<?= GetUrl("IvfSemenanMedicationAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->Medicationused->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Medicationused->getErrorMessage() ?></div>
<?= $Page->Medicationused->Lookup->getParamTag($Page, "p_x_Medicationused") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_Medicationused']"),
        options = { name: "x_Medicationused", selectId: "view_semenanalysis_x_Medicationused", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.Medicationused.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
    <div id="r_DifficultiesinCollection" class="form-group row">
        <label id="elh_view_semenanalysis_DifficultiesinCollection" for="x_DifficultiesinCollection" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_DifficultiesinCollection"><?= $Page->DifficultiesinCollection->caption() ?><?= $Page->DifficultiesinCollection->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DifficultiesinCollection->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_DifficultiesinCollection"><span id="el_view_semenanalysis_DifficultiesinCollection">
    <select
        id="x_DifficultiesinCollection"
        name="x_DifficultiesinCollection"
        class="form-control ew-select<?= $Page->DifficultiesinCollection->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_DifficultiesinCollection"
        data-table="view_semenanalysis"
        data-field="x_DifficultiesinCollection"
        data-value-separator="<?= $Page->DifficultiesinCollection->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DifficultiesinCollection->getPlaceHolder()) ?>"
        <?= $Page->DifficultiesinCollection->editAttributes() ?>>
        <?= $Page->DifficultiesinCollection->selectOptionListHtml("x_DifficultiesinCollection") ?>
    </select>
    <?= $Page->DifficultiesinCollection->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->DifficultiesinCollection->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_DifficultiesinCollection']"),
        options = { name: "x_DifficultiesinCollection", selectId: "view_semenanalysis_x_DifficultiesinCollection", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.DifficultiesinCollection.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.DifficultiesinCollection.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
    <div id="r_Volume" class="form-group row">
        <label id="elh_view_semenanalysis_Volume" for="x_Volume" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Volume"><?= $Page->Volume->caption() ?><?= $Page->Volume->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Volume->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Volume"><span id="el_view_semenanalysis_Volume">
<input type="<?= $Page->Volume->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Volume" name="x_Volume" id="x_Volume" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Volume->getPlaceHolder()) ?>" value="<?= $Page->Volume->EditValue ?>"<?= $Page->Volume->editAttributes() ?> aria-describedby="x_Volume_help">
<?= $Page->Volume->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Volume->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pH->Visible) { // pH ?>
    <div id="r_pH" class="form-group row">
        <label id="elh_view_semenanalysis_pH" for="x_pH" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_pH"><?= $Page->pH->caption() ?><?= $Page->pH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pH->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_pH"><span id="el_view_semenanalysis_pH">
<input type="<?= $Page->pH->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_pH" name="x_pH" id="x_pH" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pH->getPlaceHolder()) ?>" value="<?= $Page->pH->EditValue ?>"<?= $Page->pH->editAttributes() ?> aria-describedby="x_pH_help">
<?= $Page->pH->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pH->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Timeofcollection->Visible) { // Timeofcollection ?>
    <div id="r_Timeofcollection" class="form-group row">
        <label id="elh_view_semenanalysis_Timeofcollection" for="x_Timeofcollection" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Timeofcollection"><?= $Page->Timeofcollection->caption() ?><?= $Page->Timeofcollection->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Timeofcollection->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Timeofcollection"><span id="el_view_semenanalysis_Timeofcollection">
<input type="<?= $Page->Timeofcollection->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Timeofcollection" name="x_Timeofcollection" id="x_Timeofcollection" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Timeofcollection->getPlaceHolder()) ?>" value="<?= $Page->Timeofcollection->EditValue ?>"<?= $Page->Timeofcollection->editAttributes() ?> aria-describedby="x_Timeofcollection_help">
<?= $Page->Timeofcollection->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Timeofcollection->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Timeofexamination->Visible) { // Timeofexamination ?>
    <div id="r_Timeofexamination" class="form-group row">
        <label id="elh_view_semenanalysis_Timeofexamination" for="x_Timeofexamination" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Timeofexamination"><?= $Page->Timeofexamination->caption() ?><?= $Page->Timeofexamination->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Timeofexamination->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Timeofexamination"><span id="el_view_semenanalysis_Timeofexamination">
<input type="<?= $Page->Timeofexamination->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Timeofexamination" name="x_Timeofexamination" id="x_Timeofexamination" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Timeofexamination->getPlaceHolder()) ?>" value="<?= $Page->Timeofexamination->EditValue ?>"<?= $Page->Timeofexamination->editAttributes() ?> aria-describedby="x_Timeofexamination_help">
<?= $Page->Timeofexamination->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Timeofexamination->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Concentration->Visible) { // Concentration ?>
    <div id="r_Concentration" class="form-group row">
        <label id="elh_view_semenanalysis_Concentration" for="x_Concentration" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Concentration"><?= $Page->Concentration->caption() ?><?= $Page->Concentration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Concentration->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Concentration"><span id="el_view_semenanalysis_Concentration">
<input type="<?= $Page->Concentration->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Concentration" name="x_Concentration" id="x_Concentration" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Concentration->getPlaceHolder()) ?>" value="<?= $Page->Concentration->EditValue ?>"<?= $Page->Concentration->editAttributes() ?> aria-describedby="x_Concentration_help">
<?= $Page->Concentration->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Concentration->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
    <div id="r_Total" class="form-group row">
        <label id="elh_view_semenanalysis_Total" for="x_Total" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Total"><?= $Page->Total->caption() ?><?= $Page->Total->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Total->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Total"><span id="el_view_semenanalysis_Total">
<input type="<?= $Page->Total->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Total" name="x_Total" id="x_Total" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Total->getPlaceHolder()) ?>" value="<?= $Page->Total->EditValue ?>"<?= $Page->Total->editAttributes() ?> aria-describedby="x_Total_help">
<?= $Page->Total->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Total->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
    <div id="r_ProgressiveMotility" class="form-group row">
        <label id="elh_view_semenanalysis_ProgressiveMotility" for="x_ProgressiveMotility" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_ProgressiveMotility"><?= $Page->ProgressiveMotility->caption() ?><?= $Page->ProgressiveMotility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProgressiveMotility->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_ProgressiveMotility"><span id="el_view_semenanalysis_ProgressiveMotility">
<input type="<?= $Page->ProgressiveMotility->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_ProgressiveMotility" name="x_ProgressiveMotility" id="x_ProgressiveMotility" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProgressiveMotility->getPlaceHolder()) ?>" value="<?= $Page->ProgressiveMotility->EditValue ?>"<?= $Page->ProgressiveMotility->editAttributes() ?> aria-describedby="x_ProgressiveMotility_help">
<?= $Page->ProgressiveMotility->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProgressiveMotility->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
    <div id="r_NonProgrssiveMotile" class="form-group row">
        <label id="elh_view_semenanalysis_NonProgrssiveMotile" for="x_NonProgrssiveMotile" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_NonProgrssiveMotile"><?= $Page->NonProgrssiveMotile->caption() ?><?= $Page->NonProgrssiveMotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NonProgrssiveMotile->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_NonProgrssiveMotile"><span id="el_view_semenanalysis_NonProgrssiveMotile">
<input type="<?= $Page->NonProgrssiveMotile->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_NonProgrssiveMotile" name="x_NonProgrssiveMotile" id="x_NonProgrssiveMotile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NonProgrssiveMotile->getPlaceHolder()) ?>" value="<?= $Page->NonProgrssiveMotile->EditValue ?>"<?= $Page->NonProgrssiveMotile->editAttributes() ?> aria-describedby="x_NonProgrssiveMotile_help">
<?= $Page->NonProgrssiveMotile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NonProgrssiveMotile->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Immotile->Visible) { // Immotile ?>
    <div id="r_Immotile" class="form-group row">
        <label id="elh_view_semenanalysis_Immotile" for="x_Immotile" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Immotile"><?= $Page->Immotile->caption() ?><?= $Page->Immotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Immotile->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Immotile"><span id="el_view_semenanalysis_Immotile">
<input type="<?= $Page->Immotile->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Immotile" name="x_Immotile" id="x_Immotile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Immotile->getPlaceHolder()) ?>" value="<?= $Page->Immotile->EditValue ?>"<?= $Page->Immotile->editAttributes() ?> aria-describedby="x_Immotile_help">
<?= $Page->Immotile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Immotile->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
    <div id="r_TotalProgrssiveMotile" class="form-group row">
        <label id="elh_view_semenanalysis_TotalProgrssiveMotile" for="x_TotalProgrssiveMotile" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_TotalProgrssiveMotile"><?= $Page->TotalProgrssiveMotile->caption() ?><?= $Page->TotalProgrssiveMotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalProgrssiveMotile->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_TotalProgrssiveMotile"><span id="el_view_semenanalysis_TotalProgrssiveMotile">
<input type="<?= $Page->TotalProgrssiveMotile->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_TotalProgrssiveMotile" name="x_TotalProgrssiveMotile" id="x_TotalProgrssiveMotile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TotalProgrssiveMotile->getPlaceHolder()) ?>" value="<?= $Page->TotalProgrssiveMotile->EditValue ?>"<?= $Page->TotalProgrssiveMotile->editAttributes() ?> aria-describedby="x_TotalProgrssiveMotile_help">
<?= $Page->TotalProgrssiveMotile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalProgrssiveMotile->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Appearance->Visible) { // Appearance ?>
    <div id="r_Appearance" class="form-group row">
        <label id="elh_view_semenanalysis_Appearance" for="x_Appearance" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Appearance"><?= $Page->Appearance->caption() ?><?= $Page->Appearance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Appearance->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Appearance"><span id="el_view_semenanalysis_Appearance">
<input type="<?= $Page->Appearance->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Appearance" name="x_Appearance" id="x_Appearance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Appearance->getPlaceHolder()) ?>" value="<?= $Page->Appearance->EditValue ?>"<?= $Page->Appearance->editAttributes() ?> aria-describedby="x_Appearance_help">
<?= $Page->Appearance->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Appearance->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Homogenosity->Visible) { // Homogenosity ?>
    <div id="r_Homogenosity" class="form-group row">
        <label id="elh_view_semenanalysis_Homogenosity" for="x_Homogenosity" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Homogenosity"><?= $Page->Homogenosity->caption() ?><?= $Page->Homogenosity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Homogenosity->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Homogenosity"><span id="el_view_semenanalysis_Homogenosity">
    <select
        id="x_Homogenosity"
        name="x_Homogenosity"
        class="form-control ew-select<?= $Page->Homogenosity->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_Homogenosity"
        data-table="view_semenanalysis"
        data-field="x_Homogenosity"
        data-value-separator="<?= $Page->Homogenosity->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Homogenosity->getPlaceHolder()) ?>"
        <?= $Page->Homogenosity->editAttributes() ?>>
        <?= $Page->Homogenosity->selectOptionListHtml("x_Homogenosity") ?>
    </select>
    <?= $Page->Homogenosity->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Homogenosity->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_Homogenosity']"),
        options = { name: "x_Homogenosity", selectId: "view_semenanalysis_x_Homogenosity", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.Homogenosity.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.Homogenosity.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CompleteSample->Visible) { // CompleteSample ?>
    <div id="r_CompleteSample" class="form-group row">
        <label id="elh_view_semenanalysis_CompleteSample" for="x_CompleteSample" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_CompleteSample"><?= $Page->CompleteSample->caption() ?><?= $Page->CompleteSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CompleteSample->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_CompleteSample"><span id="el_view_semenanalysis_CompleteSample">
    <select
        id="x_CompleteSample"
        name="x_CompleteSample"
        class="form-control ew-select<?= $Page->CompleteSample->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_CompleteSample"
        data-table="view_semenanalysis"
        data-field="x_CompleteSample"
        data-value-separator="<?= $Page->CompleteSample->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->CompleteSample->getPlaceHolder()) ?>"
        <?= $Page->CompleteSample->editAttributes() ?>>
        <?= $Page->CompleteSample->selectOptionListHtml("x_CompleteSample") ?>
    </select>
    <?= $Page->CompleteSample->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->CompleteSample->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_CompleteSample']"),
        options = { name: "x_CompleteSample", selectId: "view_semenanalysis_x_CompleteSample", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.CompleteSample.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.CompleteSample.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Liquefactiontime->Visible) { // Liquefactiontime ?>
    <div id="r_Liquefactiontime" class="form-group row">
        <label id="elh_view_semenanalysis_Liquefactiontime" for="x_Liquefactiontime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Liquefactiontime"><?= $Page->Liquefactiontime->caption() ?><?= $Page->Liquefactiontime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Liquefactiontime->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Liquefactiontime"><span id="el_view_semenanalysis_Liquefactiontime">
<input type="<?= $Page->Liquefactiontime->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Liquefactiontime" name="x_Liquefactiontime" id="x_Liquefactiontime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Liquefactiontime->getPlaceHolder()) ?>" value="<?= $Page->Liquefactiontime->EditValue ?>"<?= $Page->Liquefactiontime->editAttributes() ?> aria-describedby="x_Liquefactiontime_help">
<?= $Page->Liquefactiontime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Liquefactiontime->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Normal->Visible) { // Normal ?>
    <div id="r_Normal" class="form-group row">
        <label id="elh_view_semenanalysis_Normal" for="x_Normal" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Normal"><?= $Page->Normal->caption() ?><?= $Page->Normal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Normal->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Normal"><span id="el_view_semenanalysis_Normal">
<input type="<?= $Page->Normal->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Normal" name="x_Normal" id="x_Normal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Normal->getPlaceHolder()) ?>" value="<?= $Page->Normal->EditValue ?>"<?= $Page->Normal->editAttributes() ?> aria-describedby="x_Normal_help">
<?= $Page->Normal->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Normal->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
    <div id="r_Abnormal" class="form-group row">
        <label id="elh_view_semenanalysis_Abnormal" for="x_Abnormal" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Abnormal"><?= $Page->Abnormal->caption() ?><?= $Page->Abnormal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Abnormal->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Abnormal"><span id="el_view_semenanalysis_Abnormal">
<input type="<?= $Page->Abnormal->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Abnormal->getPlaceHolder()) ?>" value="<?= $Page->Abnormal->EditValue ?>"<?= $Page->Abnormal->editAttributes() ?> aria-describedby="x_Abnormal_help">
<?= $Page->Abnormal->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Abnormal->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Headdefects->Visible) { // Headdefects ?>
    <div id="r_Headdefects" class="form-group row">
        <label id="elh_view_semenanalysis_Headdefects" for="x_Headdefects" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Headdefects"><?= $Page->Headdefects->caption() ?><?= $Page->Headdefects->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Headdefects->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Headdefects"><span id="el_view_semenanalysis_Headdefects">
<input type="<?= $Page->Headdefects->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Headdefects" name="x_Headdefects" id="x_Headdefects" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Headdefects->getPlaceHolder()) ?>" value="<?= $Page->Headdefects->EditValue ?>"<?= $Page->Headdefects->editAttributes() ?> aria-describedby="x_Headdefects_help">
<?= $Page->Headdefects->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Headdefects->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MidpieceDefects->Visible) { // MidpieceDefects ?>
    <div id="r_MidpieceDefects" class="form-group row">
        <label id="elh_view_semenanalysis_MidpieceDefects" for="x_MidpieceDefects" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_MidpieceDefects"><?= $Page->MidpieceDefects->caption() ?><?= $Page->MidpieceDefects->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MidpieceDefects->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_MidpieceDefects"><span id="el_view_semenanalysis_MidpieceDefects">
<input type="<?= $Page->MidpieceDefects->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_MidpieceDefects" name="x_MidpieceDefects" id="x_MidpieceDefects" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MidpieceDefects->getPlaceHolder()) ?>" value="<?= $Page->MidpieceDefects->EditValue ?>"<?= $Page->MidpieceDefects->editAttributes() ?> aria-describedby="x_MidpieceDefects_help">
<?= $Page->MidpieceDefects->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MidpieceDefects->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TailDefects->Visible) { // TailDefects ?>
    <div id="r_TailDefects" class="form-group row">
        <label id="elh_view_semenanalysis_TailDefects" for="x_TailDefects" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_TailDefects"><?= $Page->TailDefects->caption() ?><?= $Page->TailDefects->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TailDefects->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_TailDefects"><span id="el_view_semenanalysis_TailDefects">
<input type="<?= $Page->TailDefects->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_TailDefects" name="x_TailDefects" id="x_TailDefects" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TailDefects->getPlaceHolder()) ?>" value="<?= $Page->TailDefects->EditValue ?>"<?= $Page->TailDefects->editAttributes() ?> aria-describedby="x_TailDefects_help">
<?= $Page->TailDefects->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TailDefects->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NormalProgMotile->Visible) { // NormalProgMotile ?>
    <div id="r_NormalProgMotile" class="form-group row">
        <label id="elh_view_semenanalysis_NormalProgMotile" for="x_NormalProgMotile" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_NormalProgMotile"><?= $Page->NormalProgMotile->caption() ?><?= $Page->NormalProgMotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NormalProgMotile->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_NormalProgMotile"><span id="el_view_semenanalysis_NormalProgMotile">
<input type="<?= $Page->NormalProgMotile->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_NormalProgMotile" name="x_NormalProgMotile" id="x_NormalProgMotile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NormalProgMotile->getPlaceHolder()) ?>" value="<?= $Page->NormalProgMotile->EditValue ?>"<?= $Page->NormalProgMotile->editAttributes() ?> aria-describedby="x_NormalProgMotile_help">
<?= $Page->NormalProgMotile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NormalProgMotile->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ImmatureForms->Visible) { // ImmatureForms ?>
    <div id="r_ImmatureForms" class="form-group row">
        <label id="elh_view_semenanalysis_ImmatureForms" for="x_ImmatureForms" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_ImmatureForms"><?= $Page->ImmatureForms->caption() ?><?= $Page->ImmatureForms->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ImmatureForms->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_ImmatureForms"><span id="el_view_semenanalysis_ImmatureForms">
<input type="<?= $Page->ImmatureForms->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_ImmatureForms" name="x_ImmatureForms" id="x_ImmatureForms" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ImmatureForms->getPlaceHolder()) ?>" value="<?= $Page->ImmatureForms->EditValue ?>"<?= $Page->ImmatureForms->editAttributes() ?> aria-describedby="x_ImmatureForms_help">
<?= $Page->ImmatureForms->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ImmatureForms->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Leucocytes->Visible) { // Leucocytes ?>
    <div id="r_Leucocytes" class="form-group row">
        <label id="elh_view_semenanalysis_Leucocytes" for="x_Leucocytes" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Leucocytes"><?= $Page->Leucocytes->caption() ?><?= $Page->Leucocytes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Leucocytes->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Leucocytes"><span id="el_view_semenanalysis_Leucocytes">
<input type="<?= $Page->Leucocytes->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Leucocytes" name="x_Leucocytes" id="x_Leucocytes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Leucocytes->getPlaceHolder()) ?>" value="<?= $Page->Leucocytes->EditValue ?>"<?= $Page->Leucocytes->editAttributes() ?> aria-describedby="x_Leucocytes_help">
<?= $Page->Leucocytes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Leucocytes->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Agglutination->Visible) { // Agglutination ?>
    <div id="r_Agglutination" class="form-group row">
        <label id="elh_view_semenanalysis_Agglutination" for="x_Agglutination" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Agglutination"><?= $Page->Agglutination->caption() ?><?= $Page->Agglutination->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Agglutination->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Agglutination"><span id="el_view_semenanalysis_Agglutination">
<input type="<?= $Page->Agglutination->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Agglutination" name="x_Agglutination" id="x_Agglutination" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Agglutination->getPlaceHolder()) ?>" value="<?= $Page->Agglutination->EditValue ?>"<?= $Page->Agglutination->editAttributes() ?> aria-describedby="x_Agglutination_help">
<?= $Page->Agglutination->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Agglutination->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Debris->Visible) { // Debris ?>
    <div id="r_Debris" class="form-group row">
        <label id="elh_view_semenanalysis_Debris" for="x_Debris" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Debris"><?= $Page->Debris->caption() ?><?= $Page->Debris->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Debris->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Debris"><span id="el_view_semenanalysis_Debris">
<input type="<?= $Page->Debris->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Debris" name="x_Debris" id="x_Debris" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Debris->getPlaceHolder()) ?>" value="<?= $Page->Debris->EditValue ?>"<?= $Page->Debris->editAttributes() ?> aria-describedby="x_Debris_help">
<?= $Page->Debris->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Debris->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Diagnosis->Visible) { // Diagnosis ?>
    <div id="r_Diagnosis" class="form-group row">
        <label id="elh_view_semenanalysis_Diagnosis" for="x_Diagnosis" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Diagnosis"><?= $Page->Diagnosis->caption() ?><?= $Page->Diagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Diagnosis->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Diagnosis"><span id="el_view_semenanalysis_Diagnosis">
<input type="<?= $Page->Diagnosis->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Diagnosis" name="x_Diagnosis" id="x_Diagnosis" placeholder="<?= HtmlEncode($Page->Diagnosis->getPlaceHolder()) ?>" value="<?= $Page->Diagnosis->EditValue ?>"<?= $Page->Diagnosis->editAttributes() ?> aria-describedby="x_Diagnosis_help">
<?= $Page->Diagnosis->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Diagnosis->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Observations->Visible) { // Observations ?>
    <div id="r_Observations" class="form-group row">
        <label id="elh_view_semenanalysis_Observations" for="x_Observations" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Observations"><?= $Page->Observations->caption() ?><?= $Page->Observations->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Observations->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Observations"><span id="el_view_semenanalysis_Observations">
<input type="<?= $Page->Observations->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Observations" name="x_Observations" id="x_Observations" placeholder="<?= HtmlEncode($Page->Observations->getPlaceHolder()) ?>" value="<?= $Page->Observations->EditValue ?>"<?= $Page->Observations->editAttributes() ?> aria-describedby="x_Observations_help">
<?= $Page->Observations->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Observations->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Signature->Visible) { // Signature ?>
    <div id="r_Signature" class="form-group row">
        <label id="elh_view_semenanalysis_Signature" for="x_Signature" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Signature"><?= $Page->Signature->caption() ?><?= $Page->Signature->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Signature->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Signature"><span id="el_view_semenanalysis_Signature">
<input type="<?= $Page->Signature->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Signature" name="x_Signature" id="x_Signature" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Signature->getPlaceHolder()) ?>" value="<?= $Page->Signature->EditValue ?>"<?= $Page->Signature->editAttributes() ?> aria-describedby="x_Signature_help">
<?= $Page->Signature->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Signature->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SemenOrgin->Visible) { // SemenOrgin ?>
    <div id="r_SemenOrgin" class="form-group row">
        <label id="elh_view_semenanalysis_SemenOrgin" for="x_SemenOrgin" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_SemenOrgin"><?= $Page->SemenOrgin->caption() ?><?= $Page->SemenOrgin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SemenOrgin->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_SemenOrgin"><span id="el_view_semenanalysis_SemenOrgin">
    <select
        id="x_SemenOrgin"
        name="x_SemenOrgin"
        class="form-control ew-select<?= $Page->SemenOrgin->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_SemenOrgin"
        data-table="view_semenanalysis"
        data-field="x_SemenOrgin"
        data-value-separator="<?= $Page->SemenOrgin->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SemenOrgin->getPlaceHolder()) ?>"
        <?= $Page->SemenOrgin->editAttributes() ?>>
        <?= $Page->SemenOrgin->selectOptionListHtml("x_SemenOrgin") ?>
    </select>
    <?= $Page->SemenOrgin->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->SemenOrgin->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_SemenOrgin']"),
        options = { name: "x_SemenOrgin", selectId: "view_semenanalysis_x_SemenOrgin", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.SemenOrgin.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.SemenOrgin.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Donor->Visible) { // Donor ?>
    <div id="r_Donor" class="form-group row">
        <label id="elh_view_semenanalysis_Donor" for="x_Donor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Donor"><?= $Page->Donor->caption() ?><?= $Page->Donor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Donor->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Donor"><span id="el_view_semenanalysis_Donor">
<?php $Page->Donor->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_Donor_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Donor"><?= EmptyValue(strval($Page->Donor->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Donor->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Donor->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Donor->ReadOnly || $Page->Donor->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Donor',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Donor->getErrorMessage() ?></div>
<?= $Page->Donor->getCustomMessage() ?>
<?= $Page->Donor->Lookup->getParamTag($Page, "p_x_Donor") ?>
<input type="hidden" is="selection-list" data-table="view_semenanalysis" data-field="x_Donor" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Donor->displayValueSeparatorAttribute() ?>" name="x_Donor" id="x_Donor" value="<?= $Page->Donor->CurrentValue ?>"<?= $Page->Donor->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
    <div id="r_DonorBloodgroup" class="form-group row">
        <label id="elh_view_semenanalysis_DonorBloodgroup" for="x_DonorBloodgroup" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_DonorBloodgroup"><?= $Page->DonorBloodgroup->caption() ?><?= $Page->DonorBloodgroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DonorBloodgroup->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_DonorBloodgroup"><span id="el_view_semenanalysis_DonorBloodgroup">
<input type="<?= $Page->DonorBloodgroup->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_DonorBloodgroup" name="x_DonorBloodgroup" id="x_DonorBloodgroup" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DonorBloodgroup->getPlaceHolder()) ?>" value="<?= $Page->DonorBloodgroup->EditValue ?>"<?= $Page->DonorBloodgroup->editAttributes() ?> aria-describedby="x_DonorBloodgroup_help">
<?= $Page->DonorBloodgroup->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DonorBloodgroup->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
    <div id="r_Tank" class="form-group row">
        <label id="elh_view_semenanalysis_Tank" for="x_Tank" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Tank"><?= $Page->Tank->caption() ?><?= $Page->Tank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tank->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Tank"><span id="el_view_semenanalysis_Tank">
<input type="<?= $Page->Tank->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Tank" name="x_Tank" id="x_Tank" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tank->getPlaceHolder()) ?>" value="<?= $Page->Tank->EditValue ?>"<?= $Page->Tank->editAttributes() ?> aria-describedby="x_Tank_help">
<?= $Page->Tank->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tank->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Location->Visible) { // Location ?>
    <div id="r_Location" class="form-group row">
        <label id="elh_view_semenanalysis_Location" for="x_Location" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Location"><?= $Page->Location->caption() ?><?= $Page->Location->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Location->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Location"><span id="el_view_semenanalysis_Location">
<input type="<?= $Page->Location->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Location" name="x_Location" id="x_Location" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Location->getPlaceHolder()) ?>" value="<?= $Page->Location->EditValue ?>"<?= $Page->Location->editAttributes() ?> aria-describedby="x_Location_help">
<?= $Page->Location->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Location->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Volume1->Visible) { // Volume1 ?>
    <div id="r_Volume1" class="form-group row">
        <label id="elh_view_semenanalysis_Volume1" for="x_Volume1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Volume1"><?= $Page->Volume1->caption() ?><?= $Page->Volume1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Volume1->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Volume1"><span id="el_view_semenanalysis_Volume1">
<input type="<?= $Page->Volume1->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Volume1" name="x_Volume1" id="x_Volume1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Volume1->getPlaceHolder()) ?>" value="<?= $Page->Volume1->EditValue ?>"<?= $Page->Volume1->editAttributes() ?> aria-describedby="x_Volume1_help">
<?= $Page->Volume1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Volume1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Concentration1->Visible) { // Concentration1 ?>
    <div id="r_Concentration1" class="form-group row">
        <label id="elh_view_semenanalysis_Concentration1" for="x_Concentration1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Concentration1"><?= $Page->Concentration1->caption() ?><?= $Page->Concentration1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Concentration1->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Concentration1"><span id="el_view_semenanalysis_Concentration1">
<input type="<?= $Page->Concentration1->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Concentration1" name="x_Concentration1" id="x_Concentration1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Concentration1->getPlaceHolder()) ?>" value="<?= $Page->Concentration1->EditValue ?>"<?= $Page->Concentration1->editAttributes() ?> aria-describedby="x_Concentration1_help">
<?= $Page->Concentration1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Concentration1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Total1->Visible) { // Total1 ?>
    <div id="r_Total1" class="form-group row">
        <label id="elh_view_semenanalysis_Total1" for="x_Total1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Total1"><?= $Page->Total1->caption() ?><?= $Page->Total1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Total1->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Total1"><span id="el_view_semenanalysis_Total1">
<input type="<?= $Page->Total1->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Total1" name="x_Total1" id="x_Total1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Total1->getPlaceHolder()) ?>" value="<?= $Page->Total1->EditValue ?>"<?= $Page->Total1->editAttributes() ?> aria-describedby="x_Total1_help">
<?= $Page->Total1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Total1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
    <div id="r_ProgressiveMotility1" class="form-group row">
        <label id="elh_view_semenanalysis_ProgressiveMotility1" for="x_ProgressiveMotility1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_ProgressiveMotility1"><?= $Page->ProgressiveMotility1->caption() ?><?= $Page->ProgressiveMotility1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProgressiveMotility1->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_ProgressiveMotility1"><span id="el_view_semenanalysis_ProgressiveMotility1">
<input type="<?= $Page->ProgressiveMotility1->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_ProgressiveMotility1" name="x_ProgressiveMotility1" id="x_ProgressiveMotility1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProgressiveMotility1->getPlaceHolder()) ?>" value="<?= $Page->ProgressiveMotility1->EditValue ?>"<?= $Page->ProgressiveMotility1->editAttributes() ?> aria-describedby="x_ProgressiveMotility1_help">
<?= $Page->ProgressiveMotility1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProgressiveMotility1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
    <div id="r_NonProgrssiveMotile1" class="form-group row">
        <label id="elh_view_semenanalysis_NonProgrssiveMotile1" for="x_NonProgrssiveMotile1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_NonProgrssiveMotile1"><?= $Page->NonProgrssiveMotile1->caption() ?><?= $Page->NonProgrssiveMotile1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NonProgrssiveMotile1->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_NonProgrssiveMotile1"><span id="el_view_semenanalysis_NonProgrssiveMotile1">
<input type="<?= $Page->NonProgrssiveMotile1->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_NonProgrssiveMotile1" name="x_NonProgrssiveMotile1" id="x_NonProgrssiveMotile1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NonProgrssiveMotile1->getPlaceHolder()) ?>" value="<?= $Page->NonProgrssiveMotile1->EditValue ?>"<?= $Page->NonProgrssiveMotile1->editAttributes() ?> aria-describedby="x_NonProgrssiveMotile1_help">
<?= $Page->NonProgrssiveMotile1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NonProgrssiveMotile1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Immotile1->Visible) { // Immotile1 ?>
    <div id="r_Immotile1" class="form-group row">
        <label id="elh_view_semenanalysis_Immotile1" for="x_Immotile1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Immotile1"><?= $Page->Immotile1->caption() ?><?= $Page->Immotile1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Immotile1->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Immotile1"><span id="el_view_semenanalysis_Immotile1">
<input type="<?= $Page->Immotile1->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Immotile1" name="x_Immotile1" id="x_Immotile1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Immotile1->getPlaceHolder()) ?>" value="<?= $Page->Immotile1->EditValue ?>"<?= $Page->Immotile1->editAttributes() ?> aria-describedby="x_Immotile1_help">
<?= $Page->Immotile1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Immotile1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
    <div id="r_TotalProgrssiveMotile1" class="form-group row">
        <label id="elh_view_semenanalysis_TotalProgrssiveMotile1" for="x_TotalProgrssiveMotile1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_TotalProgrssiveMotile1"><?= $Page->TotalProgrssiveMotile1->caption() ?><?= $Page->TotalProgrssiveMotile1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalProgrssiveMotile1->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_TotalProgrssiveMotile1"><span id="el_view_semenanalysis_TotalProgrssiveMotile1">
<input type="<?= $Page->TotalProgrssiveMotile1->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_TotalProgrssiveMotile1" name="x_TotalProgrssiveMotile1" id="x_TotalProgrssiveMotile1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TotalProgrssiveMotile1->getPlaceHolder()) ?>" value="<?= $Page->TotalProgrssiveMotile1->EditValue ?>"<?= $Page->TotalProgrssiveMotile1->editAttributes() ?> aria-describedby="x_TotalProgrssiveMotile1_help">
<?= $Page->TotalProgrssiveMotile1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalProgrssiveMotile1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_view_semenanalysis_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_TidNo"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_TidNo"><span id="el_view_semenanalysis_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->TidNo->getDisplayValue($Page->TidNo->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="view_semenanalysis" data-field="x_TidNo" data-hidden="1" name="x_TidNo" id="x_TidNo" value="<?= HtmlEncode($Page->TidNo->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Color->Visible) { // Color ?>
    <div id="r_Color" class="form-group row">
        <label id="elh_view_semenanalysis_Color" for="x_Color" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Color"><?= $Page->Color->caption() ?><?= $Page->Color->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Color->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Color"><span id="el_view_semenanalysis_Color">
<input type="<?= $Page->Color->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Color" name="x_Color" id="x_Color" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Color->getPlaceHolder()) ?>" value="<?= $Page->Color->EditValue ?>"<?= $Page->Color->editAttributes() ?> aria-describedby="x_Color_help">
<?= $Page->Color->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Color->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DoneBy->Visible) { // DoneBy ?>
    <div id="r_DoneBy" class="form-group row">
        <label id="elh_view_semenanalysis_DoneBy" for="x_DoneBy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_DoneBy"><?= $Page->DoneBy->caption() ?><?= $Page->DoneBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DoneBy->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_DoneBy"><span id="el_view_semenanalysis_DoneBy">
<input type="<?= $Page->DoneBy->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_DoneBy" name="x_DoneBy" id="x_DoneBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DoneBy->getPlaceHolder()) ?>" value="<?= $Page->DoneBy->EditValue ?>"<?= $Page->DoneBy->editAttributes() ?> aria-describedby="x_DoneBy_help">
<?= $Page->DoneBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DoneBy->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <div id="r_Method" class="form-group row">
        <label id="elh_view_semenanalysis_Method" for="x_Method" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Method"><?= $Page->Method->caption() ?><?= $Page->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Method->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Method"><span id="el_view_semenanalysis_Method">
<input type="<?= $Page->Method->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>" value="<?= $Page->Method->EditValue ?>"<?= $Page->Method->editAttributes() ?> aria-describedby="x_Method_help">
<?= $Page->Method->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Method->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Abstinence->Visible) { // Abstinence ?>
    <div id="r_Abstinence" class="form-group row">
        <label id="elh_view_semenanalysis_Abstinence" for="x_Abstinence" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Abstinence"><?= $Page->Abstinence->caption() ?><?= $Page->Abstinence->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Abstinence->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Abstinence"><span id="el_view_semenanalysis_Abstinence">
<input type="<?= $Page->Abstinence->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Abstinence" name="x_Abstinence" id="x_Abstinence" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Abstinence->getPlaceHolder()) ?>" value="<?= $Page->Abstinence->EditValue ?>"<?= $Page->Abstinence->editAttributes() ?> aria-describedby="x_Abstinence_help">
<?= $Page->Abstinence->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Abstinence->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcessedBy->Visible) { // ProcessedBy ?>
    <div id="r_ProcessedBy" class="form-group row">
        <label id="elh_view_semenanalysis_ProcessedBy" for="x_ProcessedBy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_ProcessedBy"><?= $Page->ProcessedBy->caption() ?><?= $Page->ProcessedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcessedBy->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_ProcessedBy"><span id="el_view_semenanalysis_ProcessedBy">
<input type="<?= $Page->ProcessedBy->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_ProcessedBy" name="x_ProcessedBy" id="x_ProcessedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProcessedBy->getPlaceHolder()) ?>" value="<?= $Page->ProcessedBy->EditValue ?>"<?= $Page->ProcessedBy->editAttributes() ?> aria-describedby="x_ProcessedBy_help">
<?= $Page->ProcessedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProcessedBy->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->InseminationTime->Visible) { // InseminationTime ?>
    <div id="r_InseminationTime" class="form-group row">
        <label id="elh_view_semenanalysis_InseminationTime" for="x_InseminationTime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_InseminationTime"><?= $Page->InseminationTime->caption() ?><?= $Page->InseminationTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InseminationTime->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_InseminationTime"><span id="el_view_semenanalysis_InseminationTime">
<input type="<?= $Page->InseminationTime->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_InseminationTime" name="x_InseminationTime" id="x_InseminationTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->InseminationTime->getPlaceHolder()) ?>" value="<?= $Page->InseminationTime->EditValue ?>"<?= $Page->InseminationTime->editAttributes() ?> aria-describedby="x_InseminationTime_help">
<?= $Page->InseminationTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->InseminationTime->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->InseminationBy->Visible) { // InseminationBy ?>
    <div id="r_InseminationBy" class="form-group row">
        <label id="elh_view_semenanalysis_InseminationBy" for="x_InseminationBy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_InseminationBy"><?= $Page->InseminationBy->caption() ?><?= $Page->InseminationBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InseminationBy->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_InseminationBy"><span id="el_view_semenanalysis_InseminationBy">
<input type="<?= $Page->InseminationBy->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_InseminationBy" name="x_InseminationBy" id="x_InseminationBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->InseminationBy->getPlaceHolder()) ?>" value="<?= $Page->InseminationBy->EditValue ?>"<?= $Page->InseminationBy->editAttributes() ?> aria-describedby="x_InseminationBy_help">
<?= $Page->InseminationBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->InseminationBy->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Big->Visible) { // Big ?>
    <div id="r_Big" class="form-group row">
        <label id="elh_view_semenanalysis_Big" for="x_Big" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Big"><?= $Page->Big->caption() ?><?= $Page->Big->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Big->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Big"><span id="el_view_semenanalysis_Big">
<input type="<?= $Page->Big->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Big" name="x_Big" id="x_Big" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Big->getPlaceHolder()) ?>" value="<?= $Page->Big->EditValue ?>"<?= $Page->Big->editAttributes() ?> aria-describedby="x_Big_help">
<?= $Page->Big->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Big->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Medium->Visible) { // Medium ?>
    <div id="r_Medium" class="form-group row">
        <label id="elh_view_semenanalysis_Medium" for="x_Medium" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Medium"><?= $Page->Medium->caption() ?><?= $Page->Medium->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Medium->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Medium"><span id="el_view_semenanalysis_Medium">
<input type="<?= $Page->Medium->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Medium" name="x_Medium" id="x_Medium" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Medium->getPlaceHolder()) ?>" value="<?= $Page->Medium->EditValue ?>"<?= $Page->Medium->editAttributes() ?> aria-describedby="x_Medium_help">
<?= $Page->Medium->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Medium->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Small->Visible) { // Small ?>
    <div id="r_Small" class="form-group row">
        <label id="elh_view_semenanalysis_Small" for="x_Small" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Small"><?= $Page->Small->caption() ?><?= $Page->Small->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Small->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Small"><span id="el_view_semenanalysis_Small">
<input type="<?= $Page->Small->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Small" name="x_Small" id="x_Small" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Small->getPlaceHolder()) ?>" value="<?= $Page->Small->EditValue ?>"<?= $Page->Small->editAttributes() ?> aria-describedby="x_Small_help">
<?= $Page->Small->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Small->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoHalo->Visible) { // NoHalo ?>
    <div id="r_NoHalo" class="form-group row">
        <label id="elh_view_semenanalysis_NoHalo" for="x_NoHalo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_NoHalo"><?= $Page->NoHalo->caption() ?><?= $Page->NoHalo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoHalo->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_NoHalo"><span id="el_view_semenanalysis_NoHalo">
<input type="<?= $Page->NoHalo->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_NoHalo" name="x_NoHalo" id="x_NoHalo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NoHalo->getPlaceHolder()) ?>" value="<?= $Page->NoHalo->EditValue ?>"<?= $Page->NoHalo->editAttributes() ?> aria-describedby="x_NoHalo_help">
<?= $Page->NoHalo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoHalo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Fragmented->Visible) { // Fragmented ?>
    <div id="r_Fragmented" class="form-group row">
        <label id="elh_view_semenanalysis_Fragmented" for="x_Fragmented" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Fragmented"><?= $Page->Fragmented->caption() ?><?= $Page->Fragmented->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Fragmented->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Fragmented"><span id="el_view_semenanalysis_Fragmented">
<input type="<?= $Page->Fragmented->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Fragmented" name="x_Fragmented" id="x_Fragmented" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Fragmented->getPlaceHolder()) ?>" value="<?= $Page->Fragmented->EditValue ?>"<?= $Page->Fragmented->editAttributes() ?> aria-describedby="x_Fragmented_help">
<?= $Page->Fragmented->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Fragmented->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NonFragmented->Visible) { // NonFragmented ?>
    <div id="r_NonFragmented" class="form-group row">
        <label id="elh_view_semenanalysis_NonFragmented" for="x_NonFragmented" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_NonFragmented"><?= $Page->NonFragmented->caption() ?><?= $Page->NonFragmented->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NonFragmented->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_NonFragmented"><span id="el_view_semenanalysis_NonFragmented">
<input type="<?= $Page->NonFragmented->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_NonFragmented" name="x_NonFragmented" id="x_NonFragmented" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NonFragmented->getPlaceHolder()) ?>" value="<?= $Page->NonFragmented->EditValue ?>"<?= $Page->NonFragmented->editAttributes() ?> aria-describedby="x_NonFragmented_help">
<?= $Page->NonFragmented->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NonFragmented->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DFI->Visible) { // DFI ?>
    <div id="r_DFI" class="form-group row">
        <label id="elh_view_semenanalysis_DFI" for="x_DFI" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_DFI"><?= $Page->DFI->caption() ?><?= $Page->DFI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DFI->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_DFI"><span id="el_view_semenanalysis_DFI">
<input type="<?= $Page->DFI->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_DFI" name="x_DFI" id="x_DFI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DFI->getPlaceHolder()) ?>" value="<?= $Page->DFI->EditValue ?>"<?= $Page->DFI->editAttributes() ?> aria-describedby="x_DFI_help">
<?= $Page->DFI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DFI->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IsueBy->Visible) { // IsueBy ?>
    <div id="r_IsueBy" class="form-group row">
        <label id="elh_view_semenanalysis_IsueBy" for="x_IsueBy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_IsueBy"><?= $Page->IsueBy->caption() ?><?= $Page->IsueBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IsueBy->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_IsueBy"><span id="el_view_semenanalysis_IsueBy">
<input type="<?= $Page->IsueBy->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_IsueBy" name="x_IsueBy" id="x_IsueBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IsueBy->getPlaceHolder()) ?>" value="<?= $Page->IsueBy->EditValue ?>"<?= $Page->IsueBy->editAttributes() ?> aria-describedby="x_IsueBy_help">
<?= $Page->IsueBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IsueBy->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Volume2->Visible) { // Volume2 ?>
    <div id="r_Volume2" class="form-group row">
        <label id="elh_view_semenanalysis_Volume2" for="x_Volume2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Volume2"><?= $Page->Volume2->caption() ?><?= $Page->Volume2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Volume2->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Volume2"><span id="el_view_semenanalysis_Volume2">
<input type="<?= $Page->Volume2->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Volume2" name="x_Volume2" id="x_Volume2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Volume2->getPlaceHolder()) ?>" value="<?= $Page->Volume2->EditValue ?>"<?= $Page->Volume2->editAttributes() ?> aria-describedby="x_Volume2_help">
<?= $Page->Volume2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Volume2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Concentration2->Visible) { // Concentration2 ?>
    <div id="r_Concentration2" class="form-group row">
        <label id="elh_view_semenanalysis_Concentration2" for="x_Concentration2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Concentration2"><?= $Page->Concentration2->caption() ?><?= $Page->Concentration2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Concentration2->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Concentration2"><span id="el_view_semenanalysis_Concentration2">
<input type="<?= $Page->Concentration2->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Concentration2" name="x_Concentration2" id="x_Concentration2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Concentration2->getPlaceHolder()) ?>" value="<?= $Page->Concentration2->EditValue ?>"<?= $Page->Concentration2->editAttributes() ?> aria-describedby="x_Concentration2_help">
<?= $Page->Concentration2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Concentration2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Total2->Visible) { // Total2 ?>
    <div id="r_Total2" class="form-group row">
        <label id="elh_view_semenanalysis_Total2" for="x_Total2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Total2"><?= $Page->Total2->caption() ?><?= $Page->Total2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Total2->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Total2"><span id="el_view_semenanalysis_Total2">
<input type="<?= $Page->Total2->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Total2" name="x_Total2" id="x_Total2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Total2->getPlaceHolder()) ?>" value="<?= $Page->Total2->EditValue ?>"<?= $Page->Total2->editAttributes() ?> aria-describedby="x_Total2_help">
<?= $Page->Total2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Total2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
    <div id="r_ProgressiveMotility2" class="form-group row">
        <label id="elh_view_semenanalysis_ProgressiveMotility2" for="x_ProgressiveMotility2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_ProgressiveMotility2"><?= $Page->ProgressiveMotility2->caption() ?><?= $Page->ProgressiveMotility2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProgressiveMotility2->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_ProgressiveMotility2"><span id="el_view_semenanalysis_ProgressiveMotility2">
<input type="<?= $Page->ProgressiveMotility2->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_ProgressiveMotility2" name="x_ProgressiveMotility2" id="x_ProgressiveMotility2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProgressiveMotility2->getPlaceHolder()) ?>" value="<?= $Page->ProgressiveMotility2->EditValue ?>"<?= $Page->ProgressiveMotility2->editAttributes() ?> aria-describedby="x_ProgressiveMotility2_help">
<?= $Page->ProgressiveMotility2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProgressiveMotility2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
    <div id="r_NonProgrssiveMotile2" class="form-group row">
        <label id="elh_view_semenanalysis_NonProgrssiveMotile2" for="x_NonProgrssiveMotile2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_NonProgrssiveMotile2"><?= $Page->NonProgrssiveMotile2->caption() ?><?= $Page->NonProgrssiveMotile2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NonProgrssiveMotile2->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_NonProgrssiveMotile2"><span id="el_view_semenanalysis_NonProgrssiveMotile2">
<input type="<?= $Page->NonProgrssiveMotile2->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_NonProgrssiveMotile2" name="x_NonProgrssiveMotile2" id="x_NonProgrssiveMotile2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NonProgrssiveMotile2->getPlaceHolder()) ?>" value="<?= $Page->NonProgrssiveMotile2->EditValue ?>"<?= $Page->NonProgrssiveMotile2->editAttributes() ?> aria-describedby="x_NonProgrssiveMotile2_help">
<?= $Page->NonProgrssiveMotile2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NonProgrssiveMotile2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Immotile2->Visible) { // Immotile2 ?>
    <div id="r_Immotile2" class="form-group row">
        <label id="elh_view_semenanalysis_Immotile2" for="x_Immotile2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_Immotile2"><?= $Page->Immotile2->caption() ?><?= $Page->Immotile2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Immotile2->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_Immotile2"><span id="el_view_semenanalysis_Immotile2">
<input type="<?= $Page->Immotile2->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_Immotile2" name="x_Immotile2" id="x_Immotile2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Immotile2->getPlaceHolder()) ?>" value="<?= $Page->Immotile2->EditValue ?>"<?= $Page->Immotile2->editAttributes() ?> aria-describedby="x_Immotile2_help">
<?= $Page->Immotile2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Immotile2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
    <div id="r_TotalProgrssiveMotile2" class="form-group row">
        <label id="elh_view_semenanalysis_TotalProgrssiveMotile2" for="x_TotalProgrssiveMotile2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_TotalProgrssiveMotile2"><?= $Page->TotalProgrssiveMotile2->caption() ?><?= $Page->TotalProgrssiveMotile2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalProgrssiveMotile2->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_TotalProgrssiveMotile2"><span id="el_view_semenanalysis_TotalProgrssiveMotile2">
<input type="<?= $Page->TotalProgrssiveMotile2->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_TotalProgrssiveMotile2" name="x_TotalProgrssiveMotile2" id="x_TotalProgrssiveMotile2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TotalProgrssiveMotile2->getPlaceHolder()) ?>" value="<?= $Page->TotalProgrssiveMotile2->EditValue ?>"<?= $Page->TotalProgrssiveMotile2->editAttributes() ?> aria-describedby="x_TotalProgrssiveMotile2_help">
<?= $Page->TotalProgrssiveMotile2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalProgrssiveMotile2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IssuedBy->Visible) { // IssuedBy ?>
    <div id="r_IssuedBy" class="form-group row">
        <label id="elh_view_semenanalysis_IssuedBy" for="x_IssuedBy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_IssuedBy"><?= $Page->IssuedBy->caption() ?><?= $Page->IssuedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IssuedBy->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_IssuedBy"><span id="el_view_semenanalysis_IssuedBy">
<input type="<?= $Page->IssuedBy->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_IssuedBy" name="x_IssuedBy" id="x_IssuedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IssuedBy->getPlaceHolder()) ?>" value="<?= $Page->IssuedBy->EditValue ?>"<?= $Page->IssuedBy->editAttributes() ?> aria-describedby="x_IssuedBy_help">
<?= $Page->IssuedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IssuedBy->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IssuedTo->Visible) { // IssuedTo ?>
    <div id="r_IssuedTo" class="form-group row">
        <label id="elh_view_semenanalysis_IssuedTo" for="x_IssuedTo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_IssuedTo"><?= $Page->IssuedTo->caption() ?><?= $Page->IssuedTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IssuedTo->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_IssuedTo"><span id="el_view_semenanalysis_IssuedTo">
<input type="<?= $Page->IssuedTo->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_IssuedTo" name="x_IssuedTo" id="x_IssuedTo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IssuedTo->getPlaceHolder()) ?>" value="<?= $Page->IssuedTo->EditValue ?>"<?= $Page->IssuedTo->editAttributes() ?> aria-describedby="x_IssuedTo_help">
<?= $Page->IssuedTo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IssuedTo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MACS->Visible) { // MACS ?>
    <div id="r_MACS" class="form-group row">
        <label id="elh_view_semenanalysis_MACS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_MACS"><?= $Page->MACS->caption() ?><?= $Page->MACS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MACS->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_MACS"><span id="el_view_semenanalysis_MACS">
<template id="tp_x_MACS">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_semenanalysis" data-field="x_MACS" name="x_MACS" id="x_MACS"<?= $Page->MACS->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_MACS" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_MACS[]"
    name="x_MACS[]"
    value="<?= HtmlEncode($Page->MACS->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_MACS"
    data-target="dsl_x_MACS"
    data-repeatcolumn="5"
    class="form-control<?= $Page->MACS->isInvalidClass() ?>"
    data-table="view_semenanalysis"
    data-field="x_MACS"
    data-value-separator="<?= $Page->MACS->displayValueSeparatorAttribute() ?>"
    <?= $Page->MACS->editAttributes() ?>>
<?= $Page->MACS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MACS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
    <div id="r_PREG_TEST_DATE" class="form-group row">
        <label id="elh_view_semenanalysis_PREG_TEST_DATE" for="x_PREG_TEST_DATE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_PREG_TEST_DATE"><?= $Page->PREG_TEST_DATE->caption() ?><?= $Page->PREG_TEST_DATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PREG_TEST_DATE->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_PREG_TEST_DATE"><span id="el_view_semenanalysis_PREG_TEST_DATE">
<input type="<?= $Page->PREG_TEST_DATE->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_PREG_TEST_DATE" data-format="7" name="x_PREG_TEST_DATE" id="x_PREG_TEST_DATE" placeholder="<?= HtmlEncode($Page->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?= $Page->PREG_TEST_DATE->EditValue ?>"<?= $Page->PREG_TEST_DATE->editAttributes() ?> aria-describedby="x_PREG_TEST_DATE_help">
<?= $Page->PREG_TEST_DATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PREG_TEST_DATE->getErrorMessage() ?></div>
<?php if (!$Page->PREG_TEST_DATE->ReadOnly && !$Page->PREG_TEST_DATE->Disabled && !isset($Page->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($Page->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_semenanalysisedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_semenanalysisedit", "x_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
    <div id="r_SPECIFIC_PROBLEMS" class="form-group row">
        <label id="elh_view_semenanalysis_SPECIFIC_PROBLEMS" for="x_SPECIFIC_PROBLEMS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_SPECIFIC_PROBLEMS"><?= $Page->SPECIFIC_PROBLEMS->caption() ?><?= $Page->SPECIFIC_PROBLEMS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_SPECIFIC_PROBLEMS"><span id="el_view_semenanalysis_SPECIFIC_PROBLEMS">
    <select
        id="x_SPECIFIC_PROBLEMS"
        name="x_SPECIFIC_PROBLEMS"
        class="form-control ew-select<?= $Page->SPECIFIC_PROBLEMS->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_SPECIFIC_PROBLEMS"
        data-table="view_semenanalysis"
        data-field="x_SPECIFIC_PROBLEMS"
        data-value-separator="<?= $Page->SPECIFIC_PROBLEMS->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SPECIFIC_PROBLEMS->getPlaceHolder()) ?>"
        <?= $Page->SPECIFIC_PROBLEMS->editAttributes() ?>>
        <?= $Page->SPECIFIC_PROBLEMS->selectOptionListHtml("x_SPECIFIC_PROBLEMS") ?>
    </select>
    <?= $Page->SPECIFIC_PROBLEMS->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->SPECIFIC_PROBLEMS->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_SPECIFIC_PROBLEMS']"),
        options = { name: "x_SPECIFIC_PROBLEMS", selectId: "view_semenanalysis_x_SPECIFIC_PROBLEMS", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.SPECIFIC_PROBLEMS.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.SPECIFIC_PROBLEMS.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IMSC_1->Visible) { // IMSC_1 ?>
    <div id="r_IMSC_1" class="form-group row">
        <label id="elh_view_semenanalysis_IMSC_1" for="x_IMSC_1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_IMSC_1"><?= $Page->IMSC_1->caption() ?><?= $Page->IMSC_1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IMSC_1->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_IMSC_1"><span id="el_view_semenanalysis_IMSC_1">
<input type="<?= $Page->IMSC_1->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_IMSC_1" name="x_IMSC_1" id="x_IMSC_1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IMSC_1->getPlaceHolder()) ?>" value="<?= $Page->IMSC_1->EditValue ?>"<?= $Page->IMSC_1->editAttributes() ?> aria-describedby="x_IMSC_1_help">
<?= $Page->IMSC_1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IMSC_1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IMSC_2->Visible) { // IMSC_2 ?>
    <div id="r_IMSC_2" class="form-group row">
        <label id="elh_view_semenanalysis_IMSC_2" for="x_IMSC_2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_IMSC_2"><?= $Page->IMSC_2->caption() ?><?= $Page->IMSC_2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IMSC_2->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_IMSC_2"><span id="el_view_semenanalysis_IMSC_2">
<input type="<?= $Page->IMSC_2->getInputTextType() ?>" data-table="view_semenanalysis" data-field="x_IMSC_2" name="x_IMSC_2" id="x_IMSC_2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IMSC_2->getPlaceHolder()) ?>" value="<?= $Page->IMSC_2->EditValue ?>"<?= $Page->IMSC_2->editAttributes() ?> aria-describedby="x_IMSC_2_help">
<?= $Page->IMSC_2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IMSC_2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
    <div id="r_LIQUIFACTION_STORAGE" class="form-group row">
        <label id="elh_view_semenanalysis_LIQUIFACTION_STORAGE" for="x_LIQUIFACTION_STORAGE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_LIQUIFACTION_STORAGE"><?= $Page->LIQUIFACTION_STORAGE->caption() ?><?= $Page->LIQUIFACTION_STORAGE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_LIQUIFACTION_STORAGE"><span id="el_view_semenanalysis_LIQUIFACTION_STORAGE">
    <select
        id="x_LIQUIFACTION_STORAGE"
        name="x_LIQUIFACTION_STORAGE"
        class="form-control ew-select<?= $Page->LIQUIFACTION_STORAGE->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_LIQUIFACTION_STORAGE"
        data-table="view_semenanalysis"
        data-field="x_LIQUIFACTION_STORAGE"
        data-value-separator="<?= $Page->LIQUIFACTION_STORAGE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->LIQUIFACTION_STORAGE->getPlaceHolder()) ?>"
        <?= $Page->LIQUIFACTION_STORAGE->editAttributes() ?>>
        <?= $Page->LIQUIFACTION_STORAGE->selectOptionListHtml("x_LIQUIFACTION_STORAGE") ?>
    </select>
    <?= $Page->LIQUIFACTION_STORAGE->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->LIQUIFACTION_STORAGE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_LIQUIFACTION_STORAGE']"),
        options = { name: "x_LIQUIFACTION_STORAGE", selectId: "view_semenanalysis_x_LIQUIFACTION_STORAGE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.LIQUIFACTION_STORAGE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.LIQUIFACTION_STORAGE.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
    <div id="r_IUI_PREP_METHOD" class="form-group row">
        <label id="elh_view_semenanalysis_IUI_PREP_METHOD" for="x_IUI_PREP_METHOD" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_IUI_PREP_METHOD"><?= $Page->IUI_PREP_METHOD->caption() ?><?= $Page->IUI_PREP_METHOD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUI_PREP_METHOD->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_IUI_PREP_METHOD"><span id="el_view_semenanalysis_IUI_PREP_METHOD">
    <select
        id="x_IUI_PREP_METHOD"
        name="x_IUI_PREP_METHOD"
        class="form-control ew-select<?= $Page->IUI_PREP_METHOD->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_IUI_PREP_METHOD"
        data-table="view_semenanalysis"
        data-field="x_IUI_PREP_METHOD"
        data-value-separator="<?= $Page->IUI_PREP_METHOD->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->IUI_PREP_METHOD->getPlaceHolder()) ?>"
        <?= $Page->IUI_PREP_METHOD->editAttributes() ?>>
        <?= $Page->IUI_PREP_METHOD->selectOptionListHtml("x_IUI_PREP_METHOD") ?>
    </select>
    <?= $Page->IUI_PREP_METHOD->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->IUI_PREP_METHOD->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_IUI_PREP_METHOD']"),
        options = { name: "x_IUI_PREP_METHOD", selectId: "view_semenanalysis_x_IUI_PREP_METHOD", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.IUI_PREP_METHOD.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.IUI_PREP_METHOD.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
    <div id="r_TIME_FROM_TRIGGER" class="form-group row">
        <label id="elh_view_semenanalysis_TIME_FROM_TRIGGER" for="x_TIME_FROM_TRIGGER" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_TIME_FROM_TRIGGER"><?= $Page->TIME_FROM_TRIGGER->caption() ?><?= $Page->TIME_FROM_TRIGGER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TIME_FROM_TRIGGER->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_TIME_FROM_TRIGGER"><span id="el_view_semenanalysis_TIME_FROM_TRIGGER">
    <select
        id="x_TIME_FROM_TRIGGER"
        name="x_TIME_FROM_TRIGGER"
        class="form-control ew-select<?= $Page->TIME_FROM_TRIGGER->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_TIME_FROM_TRIGGER"
        data-table="view_semenanalysis"
        data-field="x_TIME_FROM_TRIGGER"
        data-value-separator="<?= $Page->TIME_FROM_TRIGGER->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TIME_FROM_TRIGGER->getPlaceHolder()) ?>"
        <?= $Page->TIME_FROM_TRIGGER->editAttributes() ?>>
        <?= $Page->TIME_FROM_TRIGGER->selectOptionListHtml("x_TIME_FROM_TRIGGER") ?>
    </select>
    <?= $Page->TIME_FROM_TRIGGER->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->TIME_FROM_TRIGGER->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_TIME_FROM_TRIGGER']"),
        options = { name: "x_TIME_FROM_TRIGGER", selectId: "view_semenanalysis_x_TIME_FROM_TRIGGER", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.TIME_FROM_TRIGGER.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.TIME_FROM_TRIGGER.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
    <div id="r_COLLECTION_TO_PREPARATION" class="form-group row">
        <label id="elh_view_semenanalysis_COLLECTION_TO_PREPARATION" for="x_COLLECTION_TO_PREPARATION" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_COLLECTION_TO_PREPARATION"><?= $Page->COLLECTION_TO_PREPARATION->caption() ?><?= $Page->COLLECTION_TO_PREPARATION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_COLLECTION_TO_PREPARATION"><span id="el_view_semenanalysis_COLLECTION_TO_PREPARATION">
    <select
        id="x_COLLECTION_TO_PREPARATION"
        name="x_COLLECTION_TO_PREPARATION"
        class="form-control ew-select<?= $Page->COLLECTION_TO_PREPARATION->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_COLLECTION_TO_PREPARATION"
        data-table="view_semenanalysis"
        data-field="x_COLLECTION_TO_PREPARATION"
        data-value-separator="<?= $Page->COLLECTION_TO_PREPARATION->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->COLLECTION_TO_PREPARATION->getPlaceHolder()) ?>"
        <?= $Page->COLLECTION_TO_PREPARATION->editAttributes() ?>>
        <?= $Page->COLLECTION_TO_PREPARATION->selectOptionListHtml("x_COLLECTION_TO_PREPARATION") ?>
    </select>
    <?= $Page->COLLECTION_TO_PREPARATION->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->COLLECTION_TO_PREPARATION->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_COLLECTION_TO_PREPARATION']"),
        options = { name: "x_COLLECTION_TO_PREPARATION", selectId: "view_semenanalysis_x_COLLECTION_TO_PREPARATION", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.COLLECTION_TO_PREPARATION.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.COLLECTION_TO_PREPARATION.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
    <div id="r_TIME_FROM_PREP_TO_INSEM" class="form-group row">
        <label id="elh_view_semenanalysis_TIME_FROM_PREP_TO_INSEM" for="x_TIME_FROM_PREP_TO_INSEM" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_semenanalysis_TIME_FROM_PREP_TO_INSEM"><?= $Page->TIME_FROM_PREP_TO_INSEM->caption() ?><?= $Page->TIME_FROM_PREP_TO_INSEM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<template id="tpx_view_semenanalysis_TIME_FROM_PREP_TO_INSEM"><span id="el_view_semenanalysis_TIME_FROM_PREP_TO_INSEM">
    <select
        id="x_TIME_FROM_PREP_TO_INSEM"
        name="x_TIME_FROM_PREP_TO_INSEM"
        class="form-control ew-select<?= $Page->TIME_FROM_PREP_TO_INSEM->isInvalidClass() ?>"
        data-select2-id="view_semenanalysis_x_TIME_FROM_PREP_TO_INSEM"
        data-table="view_semenanalysis"
        data-field="x_TIME_FROM_PREP_TO_INSEM"
        data-value-separator="<?= $Page->TIME_FROM_PREP_TO_INSEM->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TIME_FROM_PREP_TO_INSEM->getPlaceHolder()) ?>"
        <?= $Page->TIME_FROM_PREP_TO_INSEM->editAttributes() ?>>
        <?= $Page->TIME_FROM_PREP_TO_INSEM->selectOptionListHtml("x_TIME_FROM_PREP_TO_INSEM") ?>
    </select>
    <?= $Page->TIME_FROM_PREP_TO_INSEM->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->TIME_FROM_PREP_TO_INSEM->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_semenanalysis_x_TIME_FROM_PREP_TO_INSEM']"),
        options = { name: "x_TIME_FROM_PREP_TO_INSEM", selectId: "view_semenanalysis_x_TIME_FROM_PREP_TO_INSEM", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_semenanalysis.fields.TIME_FROM_PREP_TO_INSEM.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_semenanalysis.fields.TIME_FROM_PREP_TO_INSEM.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_semenanalysisedit" class="ew-custom-template"></div>
<template id="tpm_view_semenanalysisedit">
<div id="ct_ViewSemenanalysisEdit"><style>
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
$Tid = $_GET["id"] ;
$showmaster = $_GET["showmaster"] ;

//if( $showmaster=="ivf_treatment_plan")
//{
//$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where id='".$Tid."'; ";
//$results = $dbhelper->ExecuteRows($sql);
//$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$results[0]["RIDNo"]."'; ";
//$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where id='".$Tid."'; ";
$results = $dbhelper->ExecuteRows($sql);
if($results[0]["RIDNo"] == null)
{
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["HusbandName"]."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["HusbandName"]."'; ";
	$results2 = $dbhelper->ExecuteRows($sql);
}else{
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$results[0]["RIDNo"]."'; ";
	$results = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
	$results2 = $dbhelper->ExecuteRows($sql);
}

//}else{
//$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
//$results = $dbhelper->ExecuteRows($sql);
//}

//$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
//$results1 = $dbhelper->ExecuteRows($sql);

//$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
//$results2 = $dbhelper->ExecuteRows($sql);
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
<div class="row">
<div id="viewPatientInfo" class="col-md-6">
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
<div id="ViewPartnerInfo" class="col-md-6">
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
 <div style="width:100%">
<font face = "courier" >
<font size="4" style="font-weight: bold;">
<div class="row">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style='width:50%;'>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td>Semen Orgin</td>
			<td><slot class="ew-slot" name="tpc_view_semenanalysis_SemenOrgin"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_SemenOrgin"></slot> </td>
		</tr>
		<tr id="donorId">
			<td>Donor</td>
			<td><slot class="ew-slot" name="tpc_view_semenanalysis_Donor"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Donor"></slot></td>
		</tr>
		<tr id="DonorBloodGroupId">
			<td>Donor Bloodgroup</td>
			<td><slot class="ew-slot" name="tpc_view_semenanalysis_DonorBloodgroup"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_DonorBloodgroup"></slot></td>
		</tr>
	</tbody>
</table>
			</td>
			<td>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td>Request Dr</td>
			<td><slot class="ew-slot" name="tpc_view_semenanalysis_RequestDr"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_RequestDr"></slot></td>
		</tr>
	<tr>
			<td>Collection Date</td>
			<td><slot class="ew-slot" name="tpc_view_semenanalysis_CollectionDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_CollectionDate"></slot></td>
		</tr>
		<tr>
			<td>Result Date</td>
			<td><slot class="ew-slot" name="tpc_view_semenanalysis_ResultDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_ResultDate"></slot></td>
		</tr>
	</tbody>
</table>
			</td>
		</tr>
	</tbody>
</table>
</div>
<h2  id="SemenHeading"  align="center">Semen Analysis</h2>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
			</div>
			<div class="card-body">
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_semenanalysis_RequestSample"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_RequestSample"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_semenanalysis_CollectionType"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_CollectionType"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_semenanalysis_CollectionMethod"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_CollectionMethod"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_semenanalysis_Abstinence"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Abstinence"></slot></span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_semenanalysis_Medicationused"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Medicationused"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_semenanalysis_DifficultiesinCollection"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_DifficultiesinCollection"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Macroscopic Analysis</h3>
			</div>
			<div class="card-body">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:50%">
	<tbody>
		<tr>
			<td><slot class="ew-slot" name="tpc_view_semenanalysis_pH"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_pH"></slot>>=7.2</td>
			<td></td>
		</tr>
		<tr>
			<td><slot class="ew-slot" name="tpc_view_semenanalysis_Timeofcollection"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Timeofcollection"></slot></td>
			<td></td>
		</tr>
		<tr>
			<td><slot class="ew-slot" name="tpc_view_semenanalysis_Timeofexamination"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Timeofexamination"></slot></td>
			<td></td>
		</tr>
	</tbody>
</table>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:50%">
	<tbody>
		<tr>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_Appearance"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Appearance"></slot></td>
			<td ></td>
		</tr>
		<tr>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_Color"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Color"></slot></td>
			<td ></td>
		</tr>
		<tr>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_Homogenosity"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Homogenosity"></slot></td>
			<td ></td>
		</tr>
		<tr>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_CompleteSample"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_CompleteSample"></slot></td>
			<td ></td>
		</tr>
		<tr>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_Liquefactiontime"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Liquefactiontime"></slot></td>
			<td></td>
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
				<h3 class="card-title">Microscopic Analysis</h3>
			</div>
			<div class="card-body">
<div id="idMacs">				
	<slot class="ew-slot" name="tpc_view_semenanalysis_MACS"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_MACS"></slot>
</div>
<table id="capacitationTable" class="" align="left" border="0" cellpadding="1" cellspacing="1" style="width:60%">
<thead id="capacitationTableHead">
		<tr  style="background-color:#707B7C;color:white;" >
			<td></td>
			<td></td>
			<td id="PreCapacitation">Pre Capacitation</td>
			<td id="PostCapacitation">Post Capacitation</td>
			<td id="MaxCapacitation">MACS Capacitation</td>
			<td></td>
		</tr>
</thead>
	<tbody>
		<tr>
			<td>Volume (ml)</td>
			<td>:</td>
			<td><slot class="ew-slot" name="tpc_view_semenanalysis_Volume"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Volume"></slot></td>
			<td id="Volume1"><slot class="ew-slot" name="tpc_view_semenanalysis_Volume1"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Volume1"></slot></td>
			<td id="Volume2"><slot class="ew-slot" name="tpc_view_semenanalysis_Volume2"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Volume2"></slot></td>
			<td>>=1.5ml</td>
		</tr>
		<tr>
			<td>Concentration (mill/ml)</td>
			<td>:</td>
			<td><slot class="ew-slot" name="tpc_view_semenanalysis_Concentration"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Concentration"></slot></td>
			<td  id="Concentration1"><slot class="ew-slot" name="tpc_view_semenanalysis_Concentration1"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Concentration1"></slot></td>
			<td  id="Concentration2"><slot class="ew-slot" name="tpc_view_semenanalysis_Concentration2"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Concentration2"></slot></td>
			<td>>= 15</td>
		</tr>
		<tr>
			<td>Total (mill/ejaculate)</td>
				<td>:</td>
			<td><slot class="ew-slot" name="tpc_view_semenanalysis_Total"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Total"></slot></td>
			<td  id="Total1"><slot class="ew-slot" name="tpc_view_semenanalysis_Total1"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Total1"></slot></td>
			<td  id="Total2"><slot class="ew-slot" name="tpc_view_semenanalysis_Total2"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Total2"></slot></td>
			<td>>=39</td>
		</tr>
		<tr>
			<td>Progressive Motility (%)</td>
			<td>:</td>
			<td><slot class="ew-slot" name="tpc_view_semenanalysis_ProgressiveMotility"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_ProgressiveMotility"></slot></td>
			<td  id="ProgressiveMotility1"><slot class="ew-slot" name="tpc_view_semenanalysis_ProgressiveMotility1"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_ProgressiveMotility1"></slot></td>
			<td  id="ProgressiveMotility2"><slot class="ew-slot" name="tpc_view_semenanalysis_ProgressiveMotility2"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_ProgressiveMotility2"></slot></td>
			<td>>=32%</td>
		</tr>
		<tr>
			<td>Non Progrssive Motile (%)</td>
			<td>:</td>
			<td><slot class="ew-slot" name="tpc_view_semenanalysis_NonProgrssiveMotile"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_NonProgrssiveMotile"></slot></td>
			<td  id="NonProgrssiveMotile1"><slot class="ew-slot" name="tpc_view_semenanalysis_NonProgrssiveMotile1"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_NonProgrssiveMotile1"></slot></td>
			<td  id="NonProgrssiveMotile2"><slot class="ew-slot" name="tpc_view_semenanalysis_NonProgrssiveMotile2"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_NonProgrssiveMotile2"></slot></td>
			<td></td>
		</tr>
		<tr>
			<td>Immotile (%)</td>
			<td>:</td>
			<td><slot class="ew-slot" name="tpc_view_semenanalysis_Immotile"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Immotile"></slot></td>
			<td  id="Immotile1"><slot class="ew-slot" name="tpc_view_semenanalysis_Immotile1"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Immotile1"></slot></td>
			<td  id="Immotile2"><slot class="ew-slot" name="tpc_view_semenanalysis_Immotile2"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Immotile2"></slot></td>
			<td></td>
		</tr>
		<tr>
			<td>Total motile sperm count (TMSC) </td>
				<td>:</td>
			<td><slot class="ew-slot" name="tpc_view_semenanalysis_TotalProgrssiveMotile"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_TotalProgrssiveMotile"></slot></td>
			<td  id="TotalProgrssiveMotile1"><slot class="ew-slot" name="tpc_view_semenanalysis_TotalProgrssiveMotile1"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_TotalProgrssiveMotile1"></slot></td>
			<td  id="TotalProgrssiveMotile2"><slot class="ew-slot" name="tpc_view_semenanalysis_TotalProgrssiveMotile2"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_TotalProgrssiveMotile2"></slot></td>
			<td></td>
		</tr>
	</tbody>
</table>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:40%">
	<tbody>
		<tr>
			<td >Normal</td>		
			<td >:<slot class="ew-slot" name="tpc_view_semenanalysis_Normal"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Normal"></slot>%</td>
			<td >>=4%</td>
		</tr>
		<tr>
			<td >Abnormal</td>
			<td >:<slot class="ew-slot" name="tpc_view_semenanalysis_Abnormal"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Abnormal"></slot>%</td>
			<td ></td>
		</tr>	
		<tr>
			<td >Head Defects</td>
			<td >:<slot class="ew-slot" name="tpc_view_semenanalysis_Headdefects"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Headdefects"></slot>%</td>
			<td ></td>
		</tr>
		<tr>
			<td >Midpiece Defects</td>
			<td >:<slot class="ew-slot" name="tpc_view_semenanalysis_MidpieceDefects"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_MidpieceDefects"></slot>%</td>
			<td></td>
		</tr>
		<tr>
			<td >Tail Defects</td>
			<td >:<slot class="ew-slot" name="tpc_view_semenanalysis_TailDefects"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_TailDefects"></slot>%</td>
			<td ></td>
		</tr>
		<tr>
			<td >Vitality(%)</td>
			<td >:<slot class="ew-slot" name="tpc_view_semenanalysis_NormalProgMotile"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_NormalProgMotile"></slot></td>
			<td>>=58%</td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
	<tr>
			<td id="Method"><slot class="ew-slot" name="tpc_view_semenanalysis_Method"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Method"></slot></td>
			<td ></td>
			<td ></td>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_Agglutination"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Agglutination"></slot></td>
		</tr>
		<tr>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_ImmatureForms"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_ImmatureForms"></slot></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>
		<tr>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_Leucocytes"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Leucocytes"></slot></td>
			<td >%   <1 mill/ml or 20/field </td>
				<td ></td>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_Debris"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Debris"></slot></td>
		</tr>
	</tbody>
</table>
</div>
<div class="">
<slot class="ew-slot" name="tpc_view_semenanalysis_Diagnosis"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Diagnosis"></slot>
</div>
<div class="">
<slot class="ew-slot" name="tpc_view_semenanalysis_Observations"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Observations"></slot>
</div>
<div class="row">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td id='Big' ><slot class="ew-slot" name="tpc_view_semenanalysis_Big"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Big"></slot></td>
			<td id='Medium' ><slot class="ew-slot" name="tpc_view_semenanalysis_Medium"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Medium"></slot></td>
			<td id='Small'><slot class="ew-slot" name="tpc_view_semenanalysis_Small"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Small"></slot></td>
			<td id='NoHalo'><slot class="ew-slot" name="tpc_view_semenanalysis_NoHalo"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_NoHalo"></slot></td>
		</tr>
		<tr>
			<td id='Fragmented'><slot class="ew-slot" name="tpc_view_semenanalysis_Fragmented"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Fragmented"></slot></td>
			<td id='NonFragmented'><slot class="ew-slot" name="tpc_view_semenanalysis_NonFragmented"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_NonFragmented"></slot></td>
			<td id='DFI'><slot class="ew-slot" name="tpc_view_semenanalysis_DFI"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_DFI"></slot></td>
		</tr>
		<tr>		
		<tr>
			<td id='InseminationTime'><slot class="ew-slot" name="tpc_view_semenanalysis_InseminationTime"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_InseminationTime"></slot></td>
			<td ></td>
			<td ></td>
			<td id='InseminationBy'><slot class="ew-slot" name="tpc_view_semenanalysis_InseminationBy"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_InseminationBy"></slot></td>
		</tr>
		<tr>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_ProcessedBy"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_ProcessedBy"></slot></td>
			<td id='IsueBy'><slot class="ew-slot" name="tpc_view_semenanalysis_IsueBy"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_IsueBy"></slot></td>
			<td ></td>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_DoneBy"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_DoneBy"></slot></td>
		</tr>	
	</tbody>
</table>
</div>
<div class="row" id="TankLocation">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_Tank"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Tank"></slot></td>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_Location"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_Location"></slot></td>
		</tr>
	</tbody>
</table>
</div>
<div class="row" id="IUILocation">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_COLLECTION_TO_PREPARATION"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_COLLECTION_TO_PREPARATION"></slot></td>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_IMSC_1"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_IMSC_1"></slot></td>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_IMSC_2"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_IMSC_2"></slot></td>
		</tr>
		<tr>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_IUI_PREP_METHOD"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_IUI_PREP_METHOD"></slot></td>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_LIQUIFACTION_STORAGE"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_LIQUIFACTION_STORAGE"></slot></td>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_PREG_TEST_DATE"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_PREG_TEST_DATE"></slot></td>
		</tr>
		<tr>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_SPECIFIC_PROBLEMS"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_SPECIFIC_PROBLEMS"></slot></td>
			<td ><slot class="ew-slot" name="tpc_view_semenanalysis_TIME_FROM_TRIGGER"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_TIME_FROM_TRIGGER"></slot></td>
				<td ><slot class="ew-slot" name="tpc_view_semenanalysis_TIME_FROM_PREP_TO_INSEM"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_semenanalysis_TIME_FROM_PREP_TO_INSEM"></slot></td>
		</tr>
	</tbody>
</table>
</div>
<script>
		var OatientType = '<?php     $dbhelper = &DbHelper();
								$Tid = $_GET["id"] ;
								$showmaster = $_GET["showmaster"] ;
								$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where id='".$Tid."'; ";
								$results = $dbhelper->ExecuteRows($sql); echo $results[0]["RIDNo"];  ?>';
	if(OatientType == '')
	{
		document.getElementById("ViewPartnerInfo").style.display = "none";
		document.getElementById("viewPatientInfo").className = "col-md-12";
	}
</script>
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
    ew.applyTemplate("tpd_view_semenanalysisedit", "tpm_view_semenanalysisedit", "view_semenanalysisedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("view_semenanalysis");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    document.getElementById("x_pH").style.width="80px",document.getElementById("x_Volume").style.width="80px",document.getElementById("x_Concentration").style.width="80px",document.getElementById("x_Total").style.width="80px",document.getElementById("x_ProgressiveMotility").style.width="80px",document.getElementById("x_NonProgrssiveMotile").style.width="80px",document.getElementById("x_Immotile").style.width="80px",document.getElementById("x_TotalProgrssiveMotile").style.width="80px",document.getElementById("x_Normal").style.width="80px",document.getElementById("x_Abnormal").style.width="80px",document.getElementById("x_Headdefects").style.width="80px",document.getElementById("x_MidpieceDefects").style.width="80px",document.getElementById("x_TailDefects").style.width="80px",document.getElementById("x_NormalProgMotile").style.width="80px",document.getElementById("x_Volume1").style.width="80px",document.getElementById("x_Concentration1").style.width="80px",document.getElementById("x_Total1").style.width="80px",document.getElementById("x_ProgressiveMotility1").style.width="80px",document.getElementById("x_NonProgrssiveMotile1").style.width="80px",document.getElementById("x_Immotile1").style.width="80px",document.getElementById("x_TotalProgrssiveMotile1").style.width="80px",document.getElementById("x_Volume2").style.width="80px",document.getElementById("x_Concentration2").style.width="80px",document.getElementById("x_Total2").style.width="80px",document.getElementById("x_ProgressiveMotility2").style.width="80px",document.getElementById("x_NonProgrssiveMotile2").style.width="80px",document.getElementById("x_Immotile2").style.width="80px",document.getElementById("x_TotalProgrssiveMotile2").style.width="80px",document.getElementById("idMacs").style.visibility="hidden",document.getElementById("IUILocation").style.visibility="hidden";var RequestSample=(e=document.getElementById("x_RequestSample")).options[e.selectedIndex].value,TankLocation=document.getElementById("TankLocation");document.getElementById("SemenHeading").innerText="Spermiogram","Freezing"==RequestSample?(document.getElementById("SemenHeading").innerText="Semen Freezing",TankLocation.style.visibility="visible"):TankLocation.style.visibility="hidden";var capacitationTable=document.getElementById("capacitationTable");"IUI processing"==RequestSample?(capacitationTable.style.width="100%",document.getElementById("SemenHeading").innerText="INTRA UTERINE INSEMINATION",document.getElementById("Big").style.visibility="hidden",document.getElementById("Medium").style.visibility="hidden",document.getElementById("Small").style.visibility="hidden",document.getElementById("NoHalo").style.visibility="hidden",document.getElementById("Fragmented").style.visibility="hidden",document.getElementById("NonFragmented").style.visibility="hidden",document.getElementById("DFI").style.visibility="hidden",document.getElementById("Volume1").style.visibility="visible",document.getElementById("Concentration1").style.visibility="visible",document.getElementById("Total1").style.visibility="visible",document.getElementById("ProgressiveMotility1").style.visibility="visible",document.getElementById("NonProgrssiveMotile1").style.visibility="visible",document.getElementById("Immotile1").style.visibility="visible",document.getElementById("TotalProgrssiveMotile1").style.visibility="visible",document.getElementById("capacitationTableHead").style.visibility="visible",document.getElementById("PreCapacitation").innerText="Pre Capacitation",document.getElementById("PostCapacitation").innerText="Post Capacitation",document.getElementById("x_Volume1").style.width="80px",document.getElementById("x_Concentration1").style.width="80px",document.getElementById("x_Total1").style.width="80px",document.getElementById("x_ProgressiveMotility1").style.width="80px",document.getElementById("x_NonProgrssiveMotile1").style.width="80px",document.getElementById("x_Immotile1").style.width="80px",document.getElementById("x_TotalProgrssiveMotile1").style.width="80px",document.getElementById("IUILocation").style.visibility="visible"):(capacitationTable.style.width="60%",document.getElementById("Volume1").style.visibility="hidden",document.getElementById("Concentration1").style.visibility="hidden",document.getElementById("Total1").style.visibility="hidden",document.getElementById("ProgressiveMotility1").style.visibility="hidden",document.getElementById("NonProgrssiveMotile1").style.visibility="hidden",document.getElementById("Immotile1").style.visibility="hidden",document.getElementById("TotalProgrssiveMotile1").style.visibility="hidden",document.getElementById("capacitationTableHead").style.visibility="hidden",document.getElementById("PreCapacitation").innerText="",document.getElementById("PostCapacitation").innerText="",document.getElementById("x_Volume1").style.width="0px",document.getElementById("x_Concentration1").style.width="0px",document.getElementById("x_Total1").style.width="0px",document.getElementById("x_ProgressiveMotility1").style.width="0px",document.getElementById("x_NonProgrssiveMotile1").style.width="0px",document.getElementById("x_Immotile1").style.width="0px",document.getElementById("x_TotalProgrssiveMotile1").style.width="0px",document.getElementById("x_Volume2").style.width="0px",document.getElementById("x_Concentration2").style.width="0px",document.getElementById("x_Total2").style.width="0px",document.getElementById("x_ProgressiveMotility2").style.width="0px",document.getElementById("x_NonProgrssiveMotile2").style.width="0px",document.getElementById("x_Immotile2").style.width="0px",document.getElementById("x_TotalProgrssiveMotile2").style.width="0px",document.getElementById("Volume2").style.visibility="hidden",document.getElementById("Concentration2").style.visibility="hidden",document.getElementById("Total2").style.visibility="hidden",document.getElementById("ProgressiveMotility2").style.visibility="hidden",document.getElementById("NonProgrssiveMotile2").style.visibility="hidden",document.getElementById("Immotile2").style.visibility="hidden",document.getElementById("TotalProgrssiveMotile2").style.visibility="hidden",document.getElementById("Big").style.visibility="hidden",document.getElementById("Medium").style.visibility="hidden",document.getElementById("Small").style.visibility="hidden",document.getElementById("NoHalo").style.visibility="hidden",document.getElementById("Fragmented").style.visibility="hidden",document.getElementById("NonFragmented").style.visibility="hidden",document.getElementById("DFI").style.visibility="hidden",document.getElementById("InseminationTime").style.visibility="hidden",document.getElementById("InseminationBy").style.visibility="hidden",document.getElementById("IsueBy").style.visibility="hidden"),"DFI"==RequestSample&&(document.getElementById("SemenHeading").innerText="DNA Framgmentation Index",document.getElementById("Big").style.visibility="visible",document.getElementById("Medium").style.visibility="visible",document.getElementById("Small").style.visibility="visible",document.getElementById("NoHalo").style.visibility="visible",document.getElementById("Fragmented").style.visibility="visible",document.getElementById("NonFragmented").style.visibility="visible",document.getElementById("DFI").style.visibility="visible");var e,SemenOrgin=(e=document.getElementById("x_SemenOrgin")).options[e.selectedIndex].value,donorId=document.getElementById("donorId"),DonorBloodGroupId=document.getElementById("DonorBloodGroupId");"Donor"==SemenOrgin?(donorId.style.visibility="visible",DonorBloodGroupId.style.visibility="visible"):(donorId.style.visibility="hidden",DonorBloodGroupId.style.visibility="hidden");
});
</script>

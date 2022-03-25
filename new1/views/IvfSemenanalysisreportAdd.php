<?php

namespace PHPMaker2021\project3;

// Page object
$IvfSemenanalysisreportAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_semenanalysisreportadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fivf_semenanalysisreportadd = currentForm = new ew.Form("fivf_semenanalysisreportadd", "add");

    // Add fields
    var fields = ew.vars.tables.ivf_semenanalysisreport.fields;
    fivf_semenanalysisreportadd.addFields([
        ["RIDNo", [fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null, ew.Validators.integer], fields.RIDNo.isInvalid],
        ["PatientName", [fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["HusbandName", [fields.HusbandName.required ? ew.Validators.required(fields.HusbandName.caption) : null], fields.HusbandName.isInvalid],
        ["RequestDr", [fields.RequestDr.required ? ew.Validators.required(fields.RequestDr.caption) : null], fields.RequestDr.isInvalid],
        ["CollectionDate", [fields.CollectionDate.required ? ew.Validators.required(fields.CollectionDate.caption) : null, ew.Validators.datetime(0)], fields.CollectionDate.isInvalid],
        ["ResultDate", [fields.ResultDate.required ? ew.Validators.required(fields.ResultDate.caption) : null, ew.Validators.datetime(0)], fields.ResultDate.isInvalid],
        ["RequestSample", [fields.RequestSample.required ? ew.Validators.required(fields.RequestSample.caption) : null], fields.RequestSample.isInvalid],
        ["CollectionType", [fields.CollectionType.required ? ew.Validators.required(fields.CollectionType.caption) : null], fields.CollectionType.isInvalid],
        ["CollectionMethod", [fields.CollectionMethod.required ? ew.Validators.required(fields.CollectionMethod.caption) : null], fields.CollectionMethod.isInvalid],
        ["Medicationused", [fields.Medicationused.required ? ew.Validators.required(fields.Medicationused.caption) : null], fields.Medicationused.isInvalid],
        ["DifficultiesinCollection", [fields.DifficultiesinCollection.required ? ew.Validators.required(fields.DifficultiesinCollection.caption) : null], fields.DifficultiesinCollection.isInvalid],
        ["Volume", [fields.Volume.required ? ew.Validators.required(fields.Volume.caption) : null], fields.Volume.isInvalid],
        ["pH", [fields.pH.required ? ew.Validators.required(fields.pH.caption) : null], fields.pH.isInvalid],
        ["Timeofcollection", [fields.Timeofcollection.required ? ew.Validators.required(fields.Timeofcollection.caption) : null], fields.Timeofcollection.isInvalid],
        ["Timeofexamination", [fields.Timeofexamination.required ? ew.Validators.required(fields.Timeofexamination.caption) : null], fields.Timeofexamination.isInvalid],
        ["Concentration", [fields.Concentration.required ? ew.Validators.required(fields.Concentration.caption) : null], fields.Concentration.isInvalid],
        ["Total", [fields.Total.required ? ew.Validators.required(fields.Total.caption) : null], fields.Total.isInvalid],
        ["ProgressiveMotility", [fields.ProgressiveMotility.required ? ew.Validators.required(fields.ProgressiveMotility.caption) : null], fields.ProgressiveMotility.isInvalid],
        ["NonProgrssiveMotile", [fields.NonProgrssiveMotile.required ? ew.Validators.required(fields.NonProgrssiveMotile.caption) : null], fields.NonProgrssiveMotile.isInvalid],
        ["Immotile", [fields.Immotile.required ? ew.Validators.required(fields.Immotile.caption) : null], fields.Immotile.isInvalid],
        ["TotalProgrssiveMotile", [fields.TotalProgrssiveMotile.required ? ew.Validators.required(fields.TotalProgrssiveMotile.caption) : null], fields.TotalProgrssiveMotile.isInvalid],
        ["Appearance", [fields.Appearance.required ? ew.Validators.required(fields.Appearance.caption) : null], fields.Appearance.isInvalid],
        ["Homogenosity", [fields.Homogenosity.required ? ew.Validators.required(fields.Homogenosity.caption) : null], fields.Homogenosity.isInvalid],
        ["CompleteSample", [fields.CompleteSample.required ? ew.Validators.required(fields.CompleteSample.caption) : null], fields.CompleteSample.isInvalid],
        ["Liquefactiontime", [fields.Liquefactiontime.required ? ew.Validators.required(fields.Liquefactiontime.caption) : null], fields.Liquefactiontime.isInvalid],
        ["Normal", [fields.Normal.required ? ew.Validators.required(fields.Normal.caption) : null], fields.Normal.isInvalid],
        ["Abnormal", [fields.Abnormal.required ? ew.Validators.required(fields.Abnormal.caption) : null], fields.Abnormal.isInvalid],
        ["Headdefects", [fields.Headdefects.required ? ew.Validators.required(fields.Headdefects.caption) : null], fields.Headdefects.isInvalid],
        ["MidpieceDefects", [fields.MidpieceDefects.required ? ew.Validators.required(fields.MidpieceDefects.caption) : null], fields.MidpieceDefects.isInvalid],
        ["TailDefects", [fields.TailDefects.required ? ew.Validators.required(fields.TailDefects.caption) : null], fields.TailDefects.isInvalid],
        ["NormalProgMotile", [fields.NormalProgMotile.required ? ew.Validators.required(fields.NormalProgMotile.caption) : null], fields.NormalProgMotile.isInvalid],
        ["ImmatureForms", [fields.ImmatureForms.required ? ew.Validators.required(fields.ImmatureForms.caption) : null], fields.ImmatureForms.isInvalid],
        ["Leucocytes", [fields.Leucocytes.required ? ew.Validators.required(fields.Leucocytes.caption) : null], fields.Leucocytes.isInvalid],
        ["Agglutination", [fields.Agglutination.required ? ew.Validators.required(fields.Agglutination.caption) : null], fields.Agglutination.isInvalid],
        ["Debris", [fields.Debris.required ? ew.Validators.required(fields.Debris.caption) : null], fields.Debris.isInvalid],
        ["Diagnosis", [fields.Diagnosis.required ? ew.Validators.required(fields.Diagnosis.caption) : null], fields.Diagnosis.isInvalid],
        ["Observations", [fields.Observations.required ? ew.Validators.required(fields.Observations.caption) : null], fields.Observations.isInvalid],
        ["Signature", [fields.Signature.required ? ew.Validators.required(fields.Signature.caption) : null], fields.Signature.isInvalid],
        ["SemenOrgin", [fields.SemenOrgin.required ? ew.Validators.required(fields.SemenOrgin.caption) : null], fields.SemenOrgin.isInvalid],
        ["Donor", [fields.Donor.required ? ew.Validators.required(fields.Donor.caption) : null, ew.Validators.integer], fields.Donor.isInvalid],
        ["DonorBloodgroup", [fields.DonorBloodgroup.required ? ew.Validators.required(fields.DonorBloodgroup.caption) : null], fields.DonorBloodgroup.isInvalid],
        ["Tank", [fields.Tank.required ? ew.Validators.required(fields.Tank.caption) : null], fields.Tank.isInvalid],
        ["Location", [fields.Location.required ? ew.Validators.required(fields.Location.caption) : null], fields.Location.isInvalid],
        ["Volume1", [fields.Volume1.required ? ew.Validators.required(fields.Volume1.caption) : null], fields.Volume1.isInvalid],
        ["Concentration1", [fields.Concentration1.required ? ew.Validators.required(fields.Concentration1.caption) : null], fields.Concentration1.isInvalid],
        ["Total1", [fields.Total1.required ? ew.Validators.required(fields.Total1.caption) : null], fields.Total1.isInvalid],
        ["ProgressiveMotility1", [fields.ProgressiveMotility1.required ? ew.Validators.required(fields.ProgressiveMotility1.caption) : null], fields.ProgressiveMotility1.isInvalid],
        ["NonProgrssiveMotile1", [fields.NonProgrssiveMotile1.required ? ew.Validators.required(fields.NonProgrssiveMotile1.caption) : null], fields.NonProgrssiveMotile1.isInvalid],
        ["Immotile1", [fields.Immotile1.required ? ew.Validators.required(fields.Immotile1.caption) : null], fields.Immotile1.isInvalid],
        ["TotalProgrssiveMotile1", [fields.TotalProgrssiveMotile1.required ? ew.Validators.required(fields.TotalProgrssiveMotile1.caption) : null], fields.TotalProgrssiveMotile1.isInvalid],
        ["TidNo", [fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["Color", [fields.Color.required ? ew.Validators.required(fields.Color.caption) : null], fields.Color.isInvalid],
        ["DoneBy", [fields.DoneBy.required ? ew.Validators.required(fields.DoneBy.caption) : null], fields.DoneBy.isInvalid],
        ["Method", [fields.Method.required ? ew.Validators.required(fields.Method.caption) : null], fields.Method.isInvalid],
        ["Abstinence", [fields.Abstinence.required ? ew.Validators.required(fields.Abstinence.caption) : null], fields.Abstinence.isInvalid],
        ["ProcessedBy", [fields.ProcessedBy.required ? ew.Validators.required(fields.ProcessedBy.caption) : null], fields.ProcessedBy.isInvalid],
        ["InseminationTime", [fields.InseminationTime.required ? ew.Validators.required(fields.InseminationTime.caption) : null], fields.InseminationTime.isInvalid],
        ["InseminationBy", [fields.InseminationBy.required ? ew.Validators.required(fields.InseminationBy.caption) : null], fields.InseminationBy.isInvalid],
        ["Big", [fields.Big.required ? ew.Validators.required(fields.Big.caption) : null], fields.Big.isInvalid],
        ["Medium", [fields.Medium.required ? ew.Validators.required(fields.Medium.caption) : null], fields.Medium.isInvalid],
        ["Small", [fields.Small.required ? ew.Validators.required(fields.Small.caption) : null], fields.Small.isInvalid],
        ["NoHalo", [fields.NoHalo.required ? ew.Validators.required(fields.NoHalo.caption) : null], fields.NoHalo.isInvalid],
        ["Fragmented", [fields.Fragmented.required ? ew.Validators.required(fields.Fragmented.caption) : null], fields.Fragmented.isInvalid],
        ["NonFragmented", [fields.NonFragmented.required ? ew.Validators.required(fields.NonFragmented.caption) : null], fields.NonFragmented.isInvalid],
        ["DFI", [fields.DFI.required ? ew.Validators.required(fields.DFI.caption) : null], fields.DFI.isInvalid],
        ["IsueBy", [fields.IsueBy.required ? ew.Validators.required(fields.IsueBy.caption) : null], fields.IsueBy.isInvalid],
        ["Volume2", [fields.Volume2.required ? ew.Validators.required(fields.Volume2.caption) : null], fields.Volume2.isInvalid],
        ["Concentration2", [fields.Concentration2.required ? ew.Validators.required(fields.Concentration2.caption) : null], fields.Concentration2.isInvalid],
        ["Total2", [fields.Total2.required ? ew.Validators.required(fields.Total2.caption) : null], fields.Total2.isInvalid],
        ["ProgressiveMotility2", [fields.ProgressiveMotility2.required ? ew.Validators.required(fields.ProgressiveMotility2.caption) : null], fields.ProgressiveMotility2.isInvalid],
        ["NonProgrssiveMotile2", [fields.NonProgrssiveMotile2.required ? ew.Validators.required(fields.NonProgrssiveMotile2.caption) : null], fields.NonProgrssiveMotile2.isInvalid],
        ["Immotile2", [fields.Immotile2.required ? ew.Validators.required(fields.Immotile2.caption) : null], fields.Immotile2.isInvalid],
        ["TotalProgrssiveMotile2", [fields.TotalProgrssiveMotile2.required ? ew.Validators.required(fields.TotalProgrssiveMotile2.caption) : null], fields.TotalProgrssiveMotile2.isInvalid],
        ["IssuedBy", [fields.IssuedBy.required ? ew.Validators.required(fields.IssuedBy.caption) : null], fields.IssuedBy.isInvalid],
        ["IssuedTo", [fields.IssuedTo.required ? ew.Validators.required(fields.IssuedTo.caption) : null], fields.IssuedTo.isInvalid],
        ["PaID", [fields.PaID.required ? ew.Validators.required(fields.PaID.caption) : null], fields.PaID.isInvalid],
        ["PaName", [fields.PaName.required ? ew.Validators.required(fields.PaName.caption) : null], fields.PaName.isInvalid],
        ["PaMobile", [fields.PaMobile.required ? ew.Validators.required(fields.PaMobile.caption) : null], fields.PaMobile.isInvalid],
        ["PartnerID", [fields.PartnerID.required ? ew.Validators.required(fields.PartnerID.caption) : null], fields.PartnerID.isInvalid],
        ["PartnerName", [fields.PartnerName.required ? ew.Validators.required(fields.PartnerName.caption) : null], fields.PartnerName.isInvalid],
        ["PartnerMobile", [fields.PartnerMobile.required ? ew.Validators.required(fields.PartnerMobile.caption) : null], fields.PartnerMobile.isInvalid],
        ["MACS", [fields.MACS.required ? ew.Validators.required(fields.MACS.caption) : null], fields.MACS.isInvalid],
        ["PREG_TEST_DATE", [fields.PREG_TEST_DATE.required ? ew.Validators.required(fields.PREG_TEST_DATE.caption) : null, ew.Validators.datetime(0)], fields.PREG_TEST_DATE.isInvalid],
        ["SPECIFIC_PROBLEMS", [fields.SPECIFIC_PROBLEMS.required ? ew.Validators.required(fields.SPECIFIC_PROBLEMS.caption) : null], fields.SPECIFIC_PROBLEMS.isInvalid],
        ["IMSC_1", [fields.IMSC_1.required ? ew.Validators.required(fields.IMSC_1.caption) : null], fields.IMSC_1.isInvalid],
        ["IMSC_2", [fields.IMSC_2.required ? ew.Validators.required(fields.IMSC_2.caption) : null], fields.IMSC_2.isInvalid],
        ["LIQUIFACTION_STORAGE", [fields.LIQUIFACTION_STORAGE.required ? ew.Validators.required(fields.LIQUIFACTION_STORAGE.caption) : null], fields.LIQUIFACTION_STORAGE.isInvalid],
        ["IUI_PREP_METHOD", [fields.IUI_PREP_METHOD.required ? ew.Validators.required(fields.IUI_PREP_METHOD.caption) : null], fields.IUI_PREP_METHOD.isInvalid],
        ["TIME_FROM_TRIGGER", [fields.TIME_FROM_TRIGGER.required ? ew.Validators.required(fields.TIME_FROM_TRIGGER.caption) : null], fields.TIME_FROM_TRIGGER.isInvalid],
        ["COLLECTION_TO_PREPARATION", [fields.COLLECTION_TO_PREPARATION.required ? ew.Validators.required(fields.COLLECTION_TO_PREPARATION.caption) : null], fields.COLLECTION_TO_PREPARATION.isInvalid],
        ["TIME_FROM_PREP_TO_INSEM", [fields.TIME_FROM_PREP_TO_INSEM.required ? ew.Validators.required(fields.TIME_FROM_PREP_TO_INSEM.caption) : null], fields.TIME_FROM_PREP_TO_INSEM.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_semenanalysisreportadd,
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
    fivf_semenanalysisreportadd.validate = function () {
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
    fivf_semenanalysisreportadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_semenanalysisreportadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fivf_semenanalysisreportadd");
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
<form name="fivf_semenanalysisreportadd" id="fivf_semenanalysisreportadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_semenanalysisreport">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_RIDNo" for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RIDNo->caption() ?><?= $Page->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_RIDNo">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?> aria-describedby="x_RIDNo_help">
<?= $Page->RIDNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HusbandName->Visible) { // HusbandName ?>
    <div id="r_HusbandName" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_HusbandName" for="x_HusbandName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HusbandName->caption() ?><?= $Page->HusbandName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HusbandName->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_HusbandName">
<input type="<?= $Page->HusbandName->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_HusbandName" name="x_HusbandName" id="x_HusbandName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HusbandName->getPlaceHolder()) ?>" value="<?= $Page->HusbandName->EditValue ?>"<?= $Page->HusbandName->editAttributes() ?> aria-describedby="x_HusbandName_help">
<?= $Page->HusbandName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HusbandName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RequestDr->Visible) { // RequestDr ?>
    <div id="r_RequestDr" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_RequestDr" for="x_RequestDr" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RequestDr->caption() ?><?= $Page->RequestDr->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RequestDr->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_RequestDr">
<input type="<?= $Page->RequestDr->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_RequestDr" name="x_RequestDr" id="x_RequestDr" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RequestDr->getPlaceHolder()) ?>" value="<?= $Page->RequestDr->EditValue ?>"<?= $Page->RequestDr->editAttributes() ?> aria-describedby="x_RequestDr_help">
<?= $Page->RequestDr->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RequestDr->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CollectionDate->Visible) { // CollectionDate ?>
    <div id="r_CollectionDate" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_CollectionDate" for="x_CollectionDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CollectionDate->caption() ?><?= $Page->CollectionDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CollectionDate->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_CollectionDate">
<input type="<?= $Page->CollectionDate->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_CollectionDate" name="x_CollectionDate" id="x_CollectionDate" placeholder="<?= HtmlEncode($Page->CollectionDate->getPlaceHolder()) ?>" value="<?= $Page->CollectionDate->EditValue ?>"<?= $Page->CollectionDate->editAttributes() ?> aria-describedby="x_CollectionDate_help">
<?= $Page->CollectionDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CollectionDate->getErrorMessage() ?></div>
<?php if (!$Page->CollectionDate->ReadOnly && !$Page->CollectionDate->Disabled && !isset($Page->CollectionDate->EditAttrs["readonly"]) && !isset($Page->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_semenanalysisreportadd", "x_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
    <div id="r_ResultDate" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_ResultDate" for="x_ResultDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ResultDate->caption() ?><?= $Page->ResultDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ResultDate->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_ResultDate">
<input type="<?= $Page->ResultDate->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ResultDate" name="x_ResultDate" id="x_ResultDate" placeholder="<?= HtmlEncode($Page->ResultDate->getPlaceHolder()) ?>" value="<?= $Page->ResultDate->EditValue ?>"<?= $Page->ResultDate->editAttributes() ?> aria-describedby="x_ResultDate_help">
<?= $Page->ResultDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ResultDate->getErrorMessage() ?></div>
<?php if (!$Page->ResultDate->ReadOnly && !$Page->ResultDate->Disabled && !isset($Page->ResultDate->EditAttrs["readonly"]) && !isset($Page->ResultDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_semenanalysisreportadd", "x_ResultDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RequestSample->Visible) { // RequestSample ?>
    <div id="r_RequestSample" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_RequestSample" for="x_RequestSample" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RequestSample->caption() ?><?= $Page->RequestSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RequestSample->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_RequestSample">
<input type="<?= $Page->RequestSample->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_RequestSample" name="x_RequestSample" id="x_RequestSample" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RequestSample->getPlaceHolder()) ?>" value="<?= $Page->RequestSample->EditValue ?>"<?= $Page->RequestSample->editAttributes() ?> aria-describedby="x_RequestSample_help">
<?= $Page->RequestSample->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RequestSample->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CollectionType->Visible) { // CollectionType ?>
    <div id="r_CollectionType" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_CollectionType" for="x_CollectionType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CollectionType->caption() ?><?= $Page->CollectionType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CollectionType->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_CollectionType">
<input type="<?= $Page->CollectionType->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_CollectionType" name="x_CollectionType" id="x_CollectionType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CollectionType->getPlaceHolder()) ?>" value="<?= $Page->CollectionType->EditValue ?>"<?= $Page->CollectionType->editAttributes() ?> aria-describedby="x_CollectionType_help">
<?= $Page->CollectionType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CollectionType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CollectionMethod->Visible) { // CollectionMethod ?>
    <div id="r_CollectionMethod" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_CollectionMethod" for="x_CollectionMethod" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CollectionMethod->caption() ?><?= $Page->CollectionMethod->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CollectionMethod->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_CollectionMethod">
<input type="<?= $Page->CollectionMethod->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_CollectionMethod" name="x_CollectionMethod" id="x_CollectionMethod" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CollectionMethod->getPlaceHolder()) ?>" value="<?= $Page->CollectionMethod->EditValue ?>"<?= $Page->CollectionMethod->editAttributes() ?> aria-describedby="x_CollectionMethod_help">
<?= $Page->CollectionMethod->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CollectionMethod->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Medicationused->Visible) { // Medicationused ?>
    <div id="r_Medicationused" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Medicationused" for="x_Medicationused" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Medicationused->caption() ?><?= $Page->Medicationused->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Medicationused->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Medicationused">
<input type="<?= $Page->Medicationused->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Medicationused" name="x_Medicationused" id="x_Medicationused" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Medicationused->getPlaceHolder()) ?>" value="<?= $Page->Medicationused->EditValue ?>"<?= $Page->Medicationused->editAttributes() ?> aria-describedby="x_Medicationused_help">
<?= $Page->Medicationused->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Medicationused->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
    <div id="r_DifficultiesinCollection" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_DifficultiesinCollection" for="x_DifficultiesinCollection" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DifficultiesinCollection->caption() ?><?= $Page->DifficultiesinCollection->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DifficultiesinCollection->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_DifficultiesinCollection">
<input type="<?= $Page->DifficultiesinCollection->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_DifficultiesinCollection" name="x_DifficultiesinCollection" id="x_DifficultiesinCollection" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DifficultiesinCollection->getPlaceHolder()) ?>" value="<?= $Page->DifficultiesinCollection->EditValue ?>"<?= $Page->DifficultiesinCollection->editAttributes() ?> aria-describedby="x_DifficultiesinCollection_help">
<?= $Page->DifficultiesinCollection->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DifficultiesinCollection->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
    <div id="r_Volume" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Volume" for="x_Volume" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Volume->caption() ?><?= $Page->Volume->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Volume->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Volume">
<input type="<?= $Page->Volume->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Volume" name="x_Volume" id="x_Volume" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Volume->getPlaceHolder()) ?>" value="<?= $Page->Volume->EditValue ?>"<?= $Page->Volume->editAttributes() ?> aria-describedby="x_Volume_help">
<?= $Page->Volume->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Volume->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pH->Visible) { // pH ?>
    <div id="r_pH" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_pH" for="x_pH" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pH->caption() ?><?= $Page->pH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pH->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_pH">
<input type="<?= $Page->pH->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_pH" name="x_pH" id="x_pH" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pH->getPlaceHolder()) ?>" value="<?= $Page->pH->EditValue ?>"<?= $Page->pH->editAttributes() ?> aria-describedby="x_pH_help">
<?= $Page->pH->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pH->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Timeofcollection->Visible) { // Timeofcollection ?>
    <div id="r_Timeofcollection" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Timeofcollection" for="x_Timeofcollection" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Timeofcollection->caption() ?><?= $Page->Timeofcollection->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Timeofcollection->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Timeofcollection">
<input type="<?= $Page->Timeofcollection->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Timeofcollection" name="x_Timeofcollection" id="x_Timeofcollection" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Timeofcollection->getPlaceHolder()) ?>" value="<?= $Page->Timeofcollection->EditValue ?>"<?= $Page->Timeofcollection->editAttributes() ?> aria-describedby="x_Timeofcollection_help">
<?= $Page->Timeofcollection->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Timeofcollection->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Timeofexamination->Visible) { // Timeofexamination ?>
    <div id="r_Timeofexamination" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Timeofexamination" for="x_Timeofexamination" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Timeofexamination->caption() ?><?= $Page->Timeofexamination->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Timeofexamination->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Timeofexamination">
<input type="<?= $Page->Timeofexamination->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Timeofexamination" name="x_Timeofexamination" id="x_Timeofexamination" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Timeofexamination->getPlaceHolder()) ?>" value="<?= $Page->Timeofexamination->EditValue ?>"<?= $Page->Timeofexamination->editAttributes() ?> aria-describedby="x_Timeofexamination_help">
<?= $Page->Timeofexamination->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Timeofexamination->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Concentration->Visible) { // Concentration ?>
    <div id="r_Concentration" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Concentration" for="x_Concentration" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Concentration->caption() ?><?= $Page->Concentration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Concentration->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Concentration">
<input type="<?= $Page->Concentration->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Concentration" name="x_Concentration" id="x_Concentration" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Concentration->getPlaceHolder()) ?>" value="<?= $Page->Concentration->EditValue ?>"<?= $Page->Concentration->editAttributes() ?> aria-describedby="x_Concentration_help">
<?= $Page->Concentration->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Concentration->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
    <div id="r_Total" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Total" for="x_Total" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Total->caption() ?><?= $Page->Total->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Total->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Total">
<input type="<?= $Page->Total->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Total" name="x_Total" id="x_Total" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Total->getPlaceHolder()) ?>" value="<?= $Page->Total->EditValue ?>"<?= $Page->Total->editAttributes() ?> aria-describedby="x_Total_help">
<?= $Page->Total->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Total->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
    <div id="r_ProgressiveMotility" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_ProgressiveMotility" for="x_ProgressiveMotility" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProgressiveMotility->caption() ?><?= $Page->ProgressiveMotility->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProgressiveMotility->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_ProgressiveMotility">
<input type="<?= $Page->ProgressiveMotility->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility" name="x_ProgressiveMotility" id="x_ProgressiveMotility" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProgressiveMotility->getPlaceHolder()) ?>" value="<?= $Page->ProgressiveMotility->EditValue ?>"<?= $Page->ProgressiveMotility->editAttributes() ?> aria-describedby="x_ProgressiveMotility_help">
<?= $Page->ProgressiveMotility->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProgressiveMotility->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
    <div id="r_NonProgrssiveMotile" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_NonProgrssiveMotile" for="x_NonProgrssiveMotile" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NonProgrssiveMotile->caption() ?><?= $Page->NonProgrssiveMotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NonProgrssiveMotile->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_NonProgrssiveMotile">
<input type="<?= $Page->NonProgrssiveMotile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile" name="x_NonProgrssiveMotile" id="x_NonProgrssiveMotile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NonProgrssiveMotile->getPlaceHolder()) ?>" value="<?= $Page->NonProgrssiveMotile->EditValue ?>"<?= $Page->NonProgrssiveMotile->editAttributes() ?> aria-describedby="x_NonProgrssiveMotile_help">
<?= $Page->NonProgrssiveMotile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NonProgrssiveMotile->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Immotile->Visible) { // Immotile ?>
    <div id="r_Immotile" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Immotile" for="x_Immotile" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Immotile->caption() ?><?= $Page->Immotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Immotile->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Immotile">
<input type="<?= $Page->Immotile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Immotile" name="x_Immotile" id="x_Immotile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Immotile->getPlaceHolder()) ?>" value="<?= $Page->Immotile->EditValue ?>"<?= $Page->Immotile->editAttributes() ?> aria-describedby="x_Immotile_help">
<?= $Page->Immotile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Immotile->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
    <div id="r_TotalProgrssiveMotile" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile" for="x_TotalProgrssiveMotile" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TotalProgrssiveMotile->caption() ?><?= $Page->TotalProgrssiveMotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalProgrssiveMotile->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_TotalProgrssiveMotile">
<input type="<?= $Page->TotalProgrssiveMotile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile" name="x_TotalProgrssiveMotile" id="x_TotalProgrssiveMotile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TotalProgrssiveMotile->getPlaceHolder()) ?>" value="<?= $Page->TotalProgrssiveMotile->EditValue ?>"<?= $Page->TotalProgrssiveMotile->editAttributes() ?> aria-describedby="x_TotalProgrssiveMotile_help">
<?= $Page->TotalProgrssiveMotile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalProgrssiveMotile->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Appearance->Visible) { // Appearance ?>
    <div id="r_Appearance" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Appearance" for="x_Appearance" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Appearance->caption() ?><?= $Page->Appearance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Appearance->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Appearance">
<input type="<?= $Page->Appearance->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Appearance" name="x_Appearance" id="x_Appearance" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Appearance->getPlaceHolder()) ?>" value="<?= $Page->Appearance->EditValue ?>"<?= $Page->Appearance->editAttributes() ?> aria-describedby="x_Appearance_help">
<?= $Page->Appearance->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Appearance->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Homogenosity->Visible) { // Homogenosity ?>
    <div id="r_Homogenosity" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Homogenosity" for="x_Homogenosity" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Homogenosity->caption() ?><?= $Page->Homogenosity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Homogenosity->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Homogenosity">
<input type="<?= $Page->Homogenosity->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Homogenosity" name="x_Homogenosity" id="x_Homogenosity" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Homogenosity->getPlaceHolder()) ?>" value="<?= $Page->Homogenosity->EditValue ?>"<?= $Page->Homogenosity->editAttributes() ?> aria-describedby="x_Homogenosity_help">
<?= $Page->Homogenosity->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Homogenosity->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CompleteSample->Visible) { // CompleteSample ?>
    <div id="r_CompleteSample" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_CompleteSample" for="x_CompleteSample" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CompleteSample->caption() ?><?= $Page->CompleteSample->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CompleteSample->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_CompleteSample">
<input type="<?= $Page->CompleteSample->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_CompleteSample" name="x_CompleteSample" id="x_CompleteSample" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CompleteSample->getPlaceHolder()) ?>" value="<?= $Page->CompleteSample->EditValue ?>"<?= $Page->CompleteSample->editAttributes() ?> aria-describedby="x_CompleteSample_help">
<?= $Page->CompleteSample->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CompleteSample->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Liquefactiontime->Visible) { // Liquefactiontime ?>
    <div id="r_Liquefactiontime" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Liquefactiontime" for="x_Liquefactiontime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Liquefactiontime->caption() ?><?= $Page->Liquefactiontime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Liquefactiontime->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Liquefactiontime">
<input type="<?= $Page->Liquefactiontime->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Liquefactiontime" name="x_Liquefactiontime" id="x_Liquefactiontime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Liquefactiontime->getPlaceHolder()) ?>" value="<?= $Page->Liquefactiontime->EditValue ?>"<?= $Page->Liquefactiontime->editAttributes() ?> aria-describedby="x_Liquefactiontime_help">
<?= $Page->Liquefactiontime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Liquefactiontime->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Normal->Visible) { // Normal ?>
    <div id="r_Normal" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Normal" for="x_Normal" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Normal->caption() ?><?= $Page->Normal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Normal->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Normal">
<input type="<?= $Page->Normal->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Normal" name="x_Normal" id="x_Normal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Normal->getPlaceHolder()) ?>" value="<?= $Page->Normal->EditValue ?>"<?= $Page->Normal->editAttributes() ?> aria-describedby="x_Normal_help">
<?= $Page->Normal->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Normal->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
    <div id="r_Abnormal" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Abnormal" for="x_Abnormal" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Abnormal->caption() ?><?= $Page->Abnormal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Abnormal->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Abnormal">
<input type="<?= $Page->Abnormal->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Abnormal" name="x_Abnormal" id="x_Abnormal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Abnormal->getPlaceHolder()) ?>" value="<?= $Page->Abnormal->EditValue ?>"<?= $Page->Abnormal->editAttributes() ?> aria-describedby="x_Abnormal_help">
<?= $Page->Abnormal->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Abnormal->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Headdefects->Visible) { // Headdefects ?>
    <div id="r_Headdefects" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Headdefects" for="x_Headdefects" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Headdefects->caption() ?><?= $Page->Headdefects->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Headdefects->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Headdefects">
<input type="<?= $Page->Headdefects->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Headdefects" name="x_Headdefects" id="x_Headdefects" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Headdefects->getPlaceHolder()) ?>" value="<?= $Page->Headdefects->EditValue ?>"<?= $Page->Headdefects->editAttributes() ?> aria-describedby="x_Headdefects_help">
<?= $Page->Headdefects->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Headdefects->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MidpieceDefects->Visible) { // MidpieceDefects ?>
    <div id="r_MidpieceDefects" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_MidpieceDefects" for="x_MidpieceDefects" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MidpieceDefects->caption() ?><?= $Page->MidpieceDefects->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MidpieceDefects->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_MidpieceDefects">
<input type="<?= $Page->MidpieceDefects->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_MidpieceDefects" name="x_MidpieceDefects" id="x_MidpieceDefects" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MidpieceDefects->getPlaceHolder()) ?>" value="<?= $Page->MidpieceDefects->EditValue ?>"<?= $Page->MidpieceDefects->editAttributes() ?> aria-describedby="x_MidpieceDefects_help">
<?= $Page->MidpieceDefects->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MidpieceDefects->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TailDefects->Visible) { // TailDefects ?>
    <div id="r_TailDefects" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_TailDefects" for="x_TailDefects" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TailDefects->caption() ?><?= $Page->TailDefects->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TailDefects->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_TailDefects">
<input type="<?= $Page->TailDefects->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TailDefects" name="x_TailDefects" id="x_TailDefects" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TailDefects->getPlaceHolder()) ?>" value="<?= $Page->TailDefects->EditValue ?>"<?= $Page->TailDefects->editAttributes() ?> aria-describedby="x_TailDefects_help">
<?= $Page->TailDefects->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TailDefects->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NormalProgMotile->Visible) { // NormalProgMotile ?>
    <div id="r_NormalProgMotile" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_NormalProgMotile" for="x_NormalProgMotile" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NormalProgMotile->caption() ?><?= $Page->NormalProgMotile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NormalProgMotile->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_NormalProgMotile">
<input type="<?= $Page->NormalProgMotile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NormalProgMotile" name="x_NormalProgMotile" id="x_NormalProgMotile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NormalProgMotile->getPlaceHolder()) ?>" value="<?= $Page->NormalProgMotile->EditValue ?>"<?= $Page->NormalProgMotile->editAttributes() ?> aria-describedby="x_NormalProgMotile_help">
<?= $Page->NormalProgMotile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NormalProgMotile->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ImmatureForms->Visible) { // ImmatureForms ?>
    <div id="r_ImmatureForms" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_ImmatureForms" for="x_ImmatureForms" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ImmatureForms->caption() ?><?= $Page->ImmatureForms->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ImmatureForms->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_ImmatureForms">
<input type="<?= $Page->ImmatureForms->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ImmatureForms" name="x_ImmatureForms" id="x_ImmatureForms" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ImmatureForms->getPlaceHolder()) ?>" value="<?= $Page->ImmatureForms->EditValue ?>"<?= $Page->ImmatureForms->editAttributes() ?> aria-describedby="x_ImmatureForms_help">
<?= $Page->ImmatureForms->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ImmatureForms->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Leucocytes->Visible) { // Leucocytes ?>
    <div id="r_Leucocytes" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Leucocytes" for="x_Leucocytes" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Leucocytes->caption() ?><?= $Page->Leucocytes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Leucocytes->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Leucocytes">
<input type="<?= $Page->Leucocytes->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Leucocytes" name="x_Leucocytes" id="x_Leucocytes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Leucocytes->getPlaceHolder()) ?>" value="<?= $Page->Leucocytes->EditValue ?>"<?= $Page->Leucocytes->editAttributes() ?> aria-describedby="x_Leucocytes_help">
<?= $Page->Leucocytes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Leucocytes->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Agglutination->Visible) { // Agglutination ?>
    <div id="r_Agglutination" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Agglutination" for="x_Agglutination" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Agglutination->caption() ?><?= $Page->Agglutination->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Agglutination->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Agglutination">
<input type="<?= $Page->Agglutination->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Agglutination" name="x_Agglutination" id="x_Agglutination" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Agglutination->getPlaceHolder()) ?>" value="<?= $Page->Agglutination->EditValue ?>"<?= $Page->Agglutination->editAttributes() ?> aria-describedby="x_Agglutination_help">
<?= $Page->Agglutination->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Agglutination->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Debris->Visible) { // Debris ?>
    <div id="r_Debris" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Debris" for="x_Debris" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Debris->caption() ?><?= $Page->Debris->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Debris->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Debris">
<input type="<?= $Page->Debris->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Debris" name="x_Debris" id="x_Debris" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Debris->getPlaceHolder()) ?>" value="<?= $Page->Debris->EditValue ?>"<?= $Page->Debris->editAttributes() ?> aria-describedby="x_Debris_help">
<?= $Page->Debris->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Debris->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Diagnosis->Visible) { // Diagnosis ?>
    <div id="r_Diagnosis" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Diagnosis" for="x_Diagnosis" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Diagnosis->caption() ?><?= $Page->Diagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Diagnosis->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Diagnosis">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Diagnosis" name="x_Diagnosis" id="x_Diagnosis" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Diagnosis->getPlaceHolder()) ?>"<?= $Page->Diagnosis->editAttributes() ?> aria-describedby="x_Diagnosis_help"><?= $Page->Diagnosis->EditValue ?></textarea>
<?= $Page->Diagnosis->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Diagnosis->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Observations->Visible) { // Observations ?>
    <div id="r_Observations" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Observations" for="x_Observations" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Observations->caption() ?><?= $Page->Observations->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Observations->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Observations">
<textarea data-table="ivf_semenanalysisreport" data-field="x_Observations" name="x_Observations" id="x_Observations" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Observations->getPlaceHolder()) ?>"<?= $Page->Observations->editAttributes() ?> aria-describedby="x_Observations_help"><?= $Page->Observations->EditValue ?></textarea>
<?= $Page->Observations->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Observations->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Signature->Visible) { // Signature ?>
    <div id="r_Signature" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Signature" for="x_Signature" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Signature->caption() ?><?= $Page->Signature->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Signature->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Signature">
<input type="<?= $Page->Signature->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Signature" name="x_Signature" id="x_Signature" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Signature->getPlaceHolder()) ?>" value="<?= $Page->Signature->EditValue ?>"<?= $Page->Signature->editAttributes() ?> aria-describedby="x_Signature_help">
<?= $Page->Signature->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Signature->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SemenOrgin->Visible) { // SemenOrgin ?>
    <div id="r_SemenOrgin" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_SemenOrgin" for="x_SemenOrgin" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SemenOrgin->caption() ?><?= $Page->SemenOrgin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SemenOrgin->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_SemenOrgin">
<input type="<?= $Page->SemenOrgin->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_SemenOrgin" name="x_SemenOrgin" id="x_SemenOrgin" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SemenOrgin->getPlaceHolder()) ?>" value="<?= $Page->SemenOrgin->EditValue ?>"<?= $Page->SemenOrgin->editAttributes() ?> aria-describedby="x_SemenOrgin_help">
<?= $Page->SemenOrgin->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SemenOrgin->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Donor->Visible) { // Donor ?>
    <div id="r_Donor" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Donor" for="x_Donor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Donor->caption() ?><?= $Page->Donor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Donor->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Donor">
<input type="<?= $Page->Donor->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Donor" name="x_Donor" id="x_Donor" size="30" placeholder="<?= HtmlEncode($Page->Donor->getPlaceHolder()) ?>" value="<?= $Page->Donor->EditValue ?>"<?= $Page->Donor->editAttributes() ?> aria-describedby="x_Donor_help">
<?= $Page->Donor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Donor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
    <div id="r_DonorBloodgroup" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_DonorBloodgroup" for="x_DonorBloodgroup" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DonorBloodgroup->caption() ?><?= $Page->DonorBloodgroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DonorBloodgroup->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_DonorBloodgroup">
<input type="<?= $Page->DonorBloodgroup->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_DonorBloodgroup" name="x_DonorBloodgroup" id="x_DonorBloodgroup" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DonorBloodgroup->getPlaceHolder()) ?>" value="<?= $Page->DonorBloodgroup->EditValue ?>"<?= $Page->DonorBloodgroup->editAttributes() ?> aria-describedby="x_DonorBloodgroup_help">
<?= $Page->DonorBloodgroup->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DonorBloodgroup->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
    <div id="r_Tank" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Tank" for="x_Tank" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tank->caption() ?><?= $Page->Tank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tank->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Tank">
<input type="<?= $Page->Tank->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Tank" name="x_Tank" id="x_Tank" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tank->getPlaceHolder()) ?>" value="<?= $Page->Tank->EditValue ?>"<?= $Page->Tank->editAttributes() ?> aria-describedby="x_Tank_help">
<?= $Page->Tank->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tank->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Location->Visible) { // Location ?>
    <div id="r_Location" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Location" for="x_Location" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Location->caption() ?><?= $Page->Location->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Location->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Location">
<input type="<?= $Page->Location->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Location" name="x_Location" id="x_Location" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Location->getPlaceHolder()) ?>" value="<?= $Page->Location->EditValue ?>"<?= $Page->Location->editAttributes() ?> aria-describedby="x_Location_help">
<?= $Page->Location->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Location->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Volume1->Visible) { // Volume1 ?>
    <div id="r_Volume1" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Volume1" for="x_Volume1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Volume1->caption() ?><?= $Page->Volume1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Volume1->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Volume1">
<input type="<?= $Page->Volume1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Volume1" name="x_Volume1" id="x_Volume1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Volume1->getPlaceHolder()) ?>" value="<?= $Page->Volume1->EditValue ?>"<?= $Page->Volume1->editAttributes() ?> aria-describedby="x_Volume1_help">
<?= $Page->Volume1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Volume1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Concentration1->Visible) { // Concentration1 ?>
    <div id="r_Concentration1" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Concentration1" for="x_Concentration1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Concentration1->caption() ?><?= $Page->Concentration1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Concentration1->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Concentration1">
<input type="<?= $Page->Concentration1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Concentration1" name="x_Concentration1" id="x_Concentration1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Concentration1->getPlaceHolder()) ?>" value="<?= $Page->Concentration1->EditValue ?>"<?= $Page->Concentration1->editAttributes() ?> aria-describedby="x_Concentration1_help">
<?= $Page->Concentration1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Concentration1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Total1->Visible) { // Total1 ?>
    <div id="r_Total1" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Total1" for="x_Total1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Total1->caption() ?><?= $Page->Total1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Total1->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Total1">
<input type="<?= $Page->Total1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Total1" name="x_Total1" id="x_Total1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Total1->getPlaceHolder()) ?>" value="<?= $Page->Total1->EditValue ?>"<?= $Page->Total1->editAttributes() ?> aria-describedby="x_Total1_help">
<?= $Page->Total1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Total1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
    <div id="r_ProgressiveMotility1" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_ProgressiveMotility1" for="x_ProgressiveMotility1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProgressiveMotility1->caption() ?><?= $Page->ProgressiveMotility1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProgressiveMotility1->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_ProgressiveMotility1">
<input type="<?= $Page->ProgressiveMotility1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility1" name="x_ProgressiveMotility1" id="x_ProgressiveMotility1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProgressiveMotility1->getPlaceHolder()) ?>" value="<?= $Page->ProgressiveMotility1->EditValue ?>"<?= $Page->ProgressiveMotility1->editAttributes() ?> aria-describedby="x_ProgressiveMotility1_help">
<?= $Page->ProgressiveMotility1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProgressiveMotility1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
    <div id="r_NonProgrssiveMotile1" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_NonProgrssiveMotile1" for="x_NonProgrssiveMotile1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NonProgrssiveMotile1->caption() ?><?= $Page->NonProgrssiveMotile1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NonProgrssiveMotile1->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_NonProgrssiveMotile1">
<input type="<?= $Page->NonProgrssiveMotile1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile1" name="x_NonProgrssiveMotile1" id="x_NonProgrssiveMotile1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NonProgrssiveMotile1->getPlaceHolder()) ?>" value="<?= $Page->NonProgrssiveMotile1->EditValue ?>"<?= $Page->NonProgrssiveMotile1->editAttributes() ?> aria-describedby="x_NonProgrssiveMotile1_help">
<?= $Page->NonProgrssiveMotile1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NonProgrssiveMotile1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Immotile1->Visible) { // Immotile1 ?>
    <div id="r_Immotile1" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Immotile1" for="x_Immotile1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Immotile1->caption() ?><?= $Page->Immotile1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Immotile1->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Immotile1">
<input type="<?= $Page->Immotile1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Immotile1" name="x_Immotile1" id="x_Immotile1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Immotile1->getPlaceHolder()) ?>" value="<?= $Page->Immotile1->EditValue ?>"<?= $Page->Immotile1->editAttributes() ?> aria-describedby="x_Immotile1_help">
<?= $Page->Immotile1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Immotile1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
    <div id="r_TotalProgrssiveMotile1" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile1" for="x_TotalProgrssiveMotile1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TotalProgrssiveMotile1->caption() ?><?= $Page->TotalProgrssiveMotile1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalProgrssiveMotile1->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_TotalProgrssiveMotile1">
<input type="<?= $Page->TotalProgrssiveMotile1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile1" name="x_TotalProgrssiveMotile1" id="x_TotalProgrssiveMotile1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TotalProgrssiveMotile1->getPlaceHolder()) ?>" value="<?= $Page->TotalProgrssiveMotile1->EditValue ?>"<?= $Page->TotalProgrssiveMotile1->editAttributes() ?> aria-describedby="x_TotalProgrssiveMotile1_help">
<?= $Page->TotalProgrssiveMotile1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalProgrssiveMotile1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Color->Visible) { // Color ?>
    <div id="r_Color" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Color" for="x_Color" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Color->caption() ?><?= $Page->Color->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Color->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Color">
<input type="<?= $Page->Color->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Color" name="x_Color" id="x_Color" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Color->getPlaceHolder()) ?>" value="<?= $Page->Color->EditValue ?>"<?= $Page->Color->editAttributes() ?> aria-describedby="x_Color_help">
<?= $Page->Color->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Color->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DoneBy->Visible) { // DoneBy ?>
    <div id="r_DoneBy" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_DoneBy" for="x_DoneBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DoneBy->caption() ?><?= $Page->DoneBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DoneBy->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_DoneBy">
<input type="<?= $Page->DoneBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_DoneBy" name="x_DoneBy" id="x_DoneBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DoneBy->getPlaceHolder()) ?>" value="<?= $Page->DoneBy->EditValue ?>"<?= $Page->DoneBy->editAttributes() ?> aria-describedby="x_DoneBy_help">
<?= $Page->DoneBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DoneBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <div id="r_Method" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Method" for="x_Method" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Method->caption() ?><?= $Page->Method->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Method->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Method">
<input type="<?= $Page->Method->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Method" name="x_Method" id="x_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>" value="<?= $Page->Method->EditValue ?>"<?= $Page->Method->editAttributes() ?> aria-describedby="x_Method_help">
<?= $Page->Method->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Method->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Abstinence->Visible) { // Abstinence ?>
    <div id="r_Abstinence" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Abstinence" for="x_Abstinence" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Abstinence->caption() ?><?= $Page->Abstinence->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Abstinence->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Abstinence">
<input type="<?= $Page->Abstinence->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Abstinence" name="x_Abstinence" id="x_Abstinence" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Abstinence->getPlaceHolder()) ?>" value="<?= $Page->Abstinence->EditValue ?>"<?= $Page->Abstinence->editAttributes() ?> aria-describedby="x_Abstinence_help">
<?= $Page->Abstinence->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Abstinence->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcessedBy->Visible) { // ProcessedBy ?>
    <div id="r_ProcessedBy" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_ProcessedBy" for="x_ProcessedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProcessedBy->caption() ?><?= $Page->ProcessedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcessedBy->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_ProcessedBy">
<input type="<?= $Page->ProcessedBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ProcessedBy" name="x_ProcessedBy" id="x_ProcessedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProcessedBy->getPlaceHolder()) ?>" value="<?= $Page->ProcessedBy->EditValue ?>"<?= $Page->ProcessedBy->editAttributes() ?> aria-describedby="x_ProcessedBy_help">
<?= $Page->ProcessedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProcessedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->InseminationTime->Visible) { // InseminationTime ?>
    <div id="r_InseminationTime" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_InseminationTime" for="x_InseminationTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->InseminationTime->caption() ?><?= $Page->InseminationTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InseminationTime->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_InseminationTime">
<input type="<?= $Page->InseminationTime->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_InseminationTime" name="x_InseminationTime" id="x_InseminationTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->InseminationTime->getPlaceHolder()) ?>" value="<?= $Page->InseminationTime->EditValue ?>"<?= $Page->InseminationTime->editAttributes() ?> aria-describedby="x_InseminationTime_help">
<?= $Page->InseminationTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->InseminationTime->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->InseminationBy->Visible) { // InseminationBy ?>
    <div id="r_InseminationBy" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_InseminationBy" for="x_InseminationBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->InseminationBy->caption() ?><?= $Page->InseminationBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->InseminationBy->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_InseminationBy">
<input type="<?= $Page->InseminationBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_InseminationBy" name="x_InseminationBy" id="x_InseminationBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->InseminationBy->getPlaceHolder()) ?>" value="<?= $Page->InseminationBy->EditValue ?>"<?= $Page->InseminationBy->editAttributes() ?> aria-describedby="x_InseminationBy_help">
<?= $Page->InseminationBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->InseminationBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Big->Visible) { // Big ?>
    <div id="r_Big" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Big" for="x_Big" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Big->caption() ?><?= $Page->Big->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Big->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Big">
<input type="<?= $Page->Big->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Big" name="x_Big" id="x_Big" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Big->getPlaceHolder()) ?>" value="<?= $Page->Big->EditValue ?>"<?= $Page->Big->editAttributes() ?> aria-describedby="x_Big_help">
<?= $Page->Big->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Big->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Medium->Visible) { // Medium ?>
    <div id="r_Medium" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Medium" for="x_Medium" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Medium->caption() ?><?= $Page->Medium->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Medium->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Medium">
<input type="<?= $Page->Medium->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Medium" name="x_Medium" id="x_Medium" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Medium->getPlaceHolder()) ?>" value="<?= $Page->Medium->EditValue ?>"<?= $Page->Medium->editAttributes() ?> aria-describedby="x_Medium_help">
<?= $Page->Medium->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Medium->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Small->Visible) { // Small ?>
    <div id="r_Small" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Small" for="x_Small" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Small->caption() ?><?= $Page->Small->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Small->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Small">
<input type="<?= $Page->Small->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Small" name="x_Small" id="x_Small" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Small->getPlaceHolder()) ?>" value="<?= $Page->Small->EditValue ?>"<?= $Page->Small->editAttributes() ?> aria-describedby="x_Small_help">
<?= $Page->Small->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Small->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NoHalo->Visible) { // NoHalo ?>
    <div id="r_NoHalo" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_NoHalo" for="x_NoHalo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NoHalo->caption() ?><?= $Page->NoHalo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NoHalo->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_NoHalo">
<input type="<?= $Page->NoHalo->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NoHalo" name="x_NoHalo" id="x_NoHalo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NoHalo->getPlaceHolder()) ?>" value="<?= $Page->NoHalo->EditValue ?>"<?= $Page->NoHalo->editAttributes() ?> aria-describedby="x_NoHalo_help">
<?= $Page->NoHalo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NoHalo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Fragmented->Visible) { // Fragmented ?>
    <div id="r_Fragmented" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Fragmented" for="x_Fragmented" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Fragmented->caption() ?><?= $Page->Fragmented->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Fragmented->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Fragmented">
<input type="<?= $Page->Fragmented->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Fragmented" name="x_Fragmented" id="x_Fragmented" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Fragmented->getPlaceHolder()) ?>" value="<?= $Page->Fragmented->EditValue ?>"<?= $Page->Fragmented->editAttributes() ?> aria-describedby="x_Fragmented_help">
<?= $Page->Fragmented->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Fragmented->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NonFragmented->Visible) { // NonFragmented ?>
    <div id="r_NonFragmented" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_NonFragmented" for="x_NonFragmented" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NonFragmented->caption() ?><?= $Page->NonFragmented->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NonFragmented->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_NonFragmented">
<input type="<?= $Page->NonFragmented->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NonFragmented" name="x_NonFragmented" id="x_NonFragmented" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NonFragmented->getPlaceHolder()) ?>" value="<?= $Page->NonFragmented->EditValue ?>"<?= $Page->NonFragmented->editAttributes() ?> aria-describedby="x_NonFragmented_help">
<?= $Page->NonFragmented->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NonFragmented->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DFI->Visible) { // DFI ?>
    <div id="r_DFI" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_DFI" for="x_DFI" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DFI->caption() ?><?= $Page->DFI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DFI->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_DFI">
<input type="<?= $Page->DFI->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_DFI" name="x_DFI" id="x_DFI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DFI->getPlaceHolder()) ?>" value="<?= $Page->DFI->EditValue ?>"<?= $Page->DFI->editAttributes() ?> aria-describedby="x_DFI_help">
<?= $Page->DFI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DFI->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IsueBy->Visible) { // IsueBy ?>
    <div id="r_IsueBy" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_IsueBy" for="x_IsueBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IsueBy->caption() ?><?= $Page->IsueBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IsueBy->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_IsueBy">
<input type="<?= $Page->IsueBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IsueBy" name="x_IsueBy" id="x_IsueBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IsueBy->getPlaceHolder()) ?>" value="<?= $Page->IsueBy->EditValue ?>"<?= $Page->IsueBy->editAttributes() ?> aria-describedby="x_IsueBy_help">
<?= $Page->IsueBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IsueBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Volume2->Visible) { // Volume2 ?>
    <div id="r_Volume2" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Volume2" for="x_Volume2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Volume2->caption() ?><?= $Page->Volume2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Volume2->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Volume2">
<input type="<?= $Page->Volume2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Volume2" name="x_Volume2" id="x_Volume2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Volume2->getPlaceHolder()) ?>" value="<?= $Page->Volume2->EditValue ?>"<?= $Page->Volume2->editAttributes() ?> aria-describedby="x_Volume2_help">
<?= $Page->Volume2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Volume2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Concentration2->Visible) { // Concentration2 ?>
    <div id="r_Concentration2" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Concentration2" for="x_Concentration2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Concentration2->caption() ?><?= $Page->Concentration2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Concentration2->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Concentration2">
<input type="<?= $Page->Concentration2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Concentration2" name="x_Concentration2" id="x_Concentration2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Concentration2->getPlaceHolder()) ?>" value="<?= $Page->Concentration2->EditValue ?>"<?= $Page->Concentration2->editAttributes() ?> aria-describedby="x_Concentration2_help">
<?= $Page->Concentration2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Concentration2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Total2->Visible) { // Total2 ?>
    <div id="r_Total2" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Total2" for="x_Total2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Total2->caption() ?><?= $Page->Total2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Total2->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Total2">
<input type="<?= $Page->Total2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Total2" name="x_Total2" id="x_Total2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Total2->getPlaceHolder()) ?>" value="<?= $Page->Total2->EditValue ?>"<?= $Page->Total2->editAttributes() ?> aria-describedby="x_Total2_help">
<?= $Page->Total2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Total2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
    <div id="r_ProgressiveMotility2" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_ProgressiveMotility2" for="x_ProgressiveMotility2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProgressiveMotility2->caption() ?><?= $Page->ProgressiveMotility2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProgressiveMotility2->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_ProgressiveMotility2">
<input type="<?= $Page->ProgressiveMotility2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_ProgressiveMotility2" name="x_ProgressiveMotility2" id="x_ProgressiveMotility2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProgressiveMotility2->getPlaceHolder()) ?>" value="<?= $Page->ProgressiveMotility2->EditValue ?>"<?= $Page->ProgressiveMotility2->editAttributes() ?> aria-describedby="x_ProgressiveMotility2_help">
<?= $Page->ProgressiveMotility2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProgressiveMotility2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
    <div id="r_NonProgrssiveMotile2" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_NonProgrssiveMotile2" for="x_NonProgrssiveMotile2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NonProgrssiveMotile2->caption() ?><?= $Page->NonProgrssiveMotile2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NonProgrssiveMotile2->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_NonProgrssiveMotile2">
<input type="<?= $Page->NonProgrssiveMotile2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_NonProgrssiveMotile2" name="x_NonProgrssiveMotile2" id="x_NonProgrssiveMotile2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NonProgrssiveMotile2->getPlaceHolder()) ?>" value="<?= $Page->NonProgrssiveMotile2->EditValue ?>"<?= $Page->NonProgrssiveMotile2->editAttributes() ?> aria-describedby="x_NonProgrssiveMotile2_help">
<?= $Page->NonProgrssiveMotile2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NonProgrssiveMotile2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Immotile2->Visible) { // Immotile2 ?>
    <div id="r_Immotile2" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_Immotile2" for="x_Immotile2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Immotile2->caption() ?><?= $Page->Immotile2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Immotile2->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Immotile2">
<input type="<?= $Page->Immotile2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_Immotile2" name="x_Immotile2" id="x_Immotile2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Immotile2->getPlaceHolder()) ?>" value="<?= $Page->Immotile2->EditValue ?>"<?= $Page->Immotile2->editAttributes() ?> aria-describedby="x_Immotile2_help">
<?= $Page->Immotile2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Immotile2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
    <div id="r_TotalProgrssiveMotile2" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile2" for="x_TotalProgrssiveMotile2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TotalProgrssiveMotile2->caption() ?><?= $Page->TotalProgrssiveMotile2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalProgrssiveMotile2->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_TotalProgrssiveMotile2">
<input type="<?= $Page->TotalProgrssiveMotile2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TotalProgrssiveMotile2" name="x_TotalProgrssiveMotile2" id="x_TotalProgrssiveMotile2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TotalProgrssiveMotile2->getPlaceHolder()) ?>" value="<?= $Page->TotalProgrssiveMotile2->EditValue ?>"<?= $Page->TotalProgrssiveMotile2->editAttributes() ?> aria-describedby="x_TotalProgrssiveMotile2_help">
<?= $Page->TotalProgrssiveMotile2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalProgrssiveMotile2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IssuedBy->Visible) { // IssuedBy ?>
    <div id="r_IssuedBy" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_IssuedBy" for="x_IssuedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IssuedBy->caption() ?><?= $Page->IssuedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IssuedBy->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_IssuedBy">
<input type="<?= $Page->IssuedBy->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IssuedBy" name="x_IssuedBy" id="x_IssuedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IssuedBy->getPlaceHolder()) ?>" value="<?= $Page->IssuedBy->EditValue ?>"<?= $Page->IssuedBy->editAttributes() ?> aria-describedby="x_IssuedBy_help">
<?= $Page->IssuedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IssuedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IssuedTo->Visible) { // IssuedTo ?>
    <div id="r_IssuedTo" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_IssuedTo" for="x_IssuedTo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IssuedTo->caption() ?><?= $Page->IssuedTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IssuedTo->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_IssuedTo">
<input type="<?= $Page->IssuedTo->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IssuedTo" name="x_IssuedTo" id="x_IssuedTo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IssuedTo->getPlaceHolder()) ?>" value="<?= $Page->IssuedTo->EditValue ?>"<?= $Page->IssuedTo->editAttributes() ?> aria-describedby="x_IssuedTo_help">
<?= $Page->IssuedTo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IssuedTo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaID->Visible) { // PaID ?>
    <div id="r_PaID" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_PaID" for="x_PaID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PaID->caption() ?><?= $Page->PaID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaID->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_PaID">
<input type="<?= $Page->PaID->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PaID" name="x_PaID" id="x_PaID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaID->getPlaceHolder()) ?>" value="<?= $Page->PaID->EditValue ?>"<?= $Page->PaID->editAttributes() ?> aria-describedby="x_PaID_help">
<?= $Page->PaID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PaID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaName->Visible) { // PaName ?>
    <div id="r_PaName" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_PaName" for="x_PaName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PaName->caption() ?><?= $Page->PaName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaName->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_PaName">
<input type="<?= $Page->PaName->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PaName" name="x_PaName" id="x_PaName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaName->getPlaceHolder()) ?>" value="<?= $Page->PaName->EditValue ?>"<?= $Page->PaName->editAttributes() ?> aria-describedby="x_PaName_help">
<?= $Page->PaName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PaName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PaMobile->Visible) { // PaMobile ?>
    <div id="r_PaMobile" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_PaMobile" for="x_PaMobile" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PaMobile->caption() ?><?= $Page->PaMobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PaMobile->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_PaMobile">
<input type="<?= $Page->PaMobile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PaMobile" name="x_PaMobile" id="x_PaMobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PaMobile->getPlaceHolder()) ?>" value="<?= $Page->PaMobile->EditValue ?>"<?= $Page->PaMobile->editAttributes() ?> aria-describedby="x_PaMobile_help">
<?= $Page->PaMobile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PaMobile->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <div id="r_PartnerID" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_PartnerID" for="x_PartnerID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PartnerID->caption() ?><?= $Page->PartnerID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_PartnerID">
<input type="<?= $Page->PartnerID->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PartnerID" name="x_PartnerID" id="x_PartnerID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerID->getPlaceHolder()) ?>" value="<?= $Page->PartnerID->EditValue ?>"<?= $Page->PartnerID->editAttributes() ?> aria-describedby="x_PartnerID_help">
<?= $Page->PartnerID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <div id="r_PartnerName" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_PartnerName" for="x_PartnerName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PartnerName->caption() ?><?= $Page->PartnerName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_PartnerName">
<input type="<?= $Page->PartnerName->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PartnerName" name="x_PartnerName" id="x_PartnerName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerName->getPlaceHolder()) ?>" value="<?= $Page->PartnerName->EditValue ?>"<?= $Page->PartnerName->editAttributes() ?> aria-describedby="x_PartnerName_help">
<?= $Page->PartnerName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
    <div id="r_PartnerMobile" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_PartnerMobile" for="x_PartnerMobile" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PartnerMobile->caption() ?><?= $Page->PartnerMobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PartnerMobile->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_PartnerMobile">
<input type="<?= $Page->PartnerMobile->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PartnerMobile" name="x_PartnerMobile" id="x_PartnerMobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PartnerMobile->getPlaceHolder()) ?>" value="<?= $Page->PartnerMobile->EditValue ?>"<?= $Page->PartnerMobile->editAttributes() ?> aria-describedby="x_PartnerMobile_help">
<?= $Page->PartnerMobile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PartnerMobile->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MACS->Visible) { // MACS ?>
    <div id="r_MACS" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_MACS" for="x_MACS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MACS->caption() ?><?= $Page->MACS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MACS->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_MACS">
<input type="<?= $Page->MACS->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_MACS" name="x_MACS" id="x_MACS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MACS->getPlaceHolder()) ?>" value="<?= $Page->MACS->EditValue ?>"<?= $Page->MACS->editAttributes() ?> aria-describedby="x_MACS_help">
<?= $Page->MACS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MACS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
    <div id="r_PREG_TEST_DATE" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_PREG_TEST_DATE" for="x_PREG_TEST_DATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PREG_TEST_DATE->caption() ?><?= $Page->PREG_TEST_DATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PREG_TEST_DATE->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_PREG_TEST_DATE">
<input type="<?= $Page->PREG_TEST_DATE->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_PREG_TEST_DATE" name="x_PREG_TEST_DATE" id="x_PREG_TEST_DATE" placeholder="<?= HtmlEncode($Page->PREG_TEST_DATE->getPlaceHolder()) ?>" value="<?= $Page->PREG_TEST_DATE->EditValue ?>"<?= $Page->PREG_TEST_DATE->editAttributes() ?> aria-describedby="x_PREG_TEST_DATE_help">
<?= $Page->PREG_TEST_DATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PREG_TEST_DATE->getErrorMessage() ?></div>
<?php if (!$Page->PREG_TEST_DATE->ReadOnly && !$Page->PREG_TEST_DATE->Disabled && !isset($Page->PREG_TEST_DATE->EditAttrs["readonly"]) && !isset($Page->PREG_TEST_DATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_semenanalysisreportadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fivf_semenanalysisreportadd", "x_PREG_TEST_DATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
    <div id="r_SPECIFIC_PROBLEMS" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_SPECIFIC_PROBLEMS" for="x_SPECIFIC_PROBLEMS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SPECIFIC_PROBLEMS->caption() ?><?= $Page->SPECIFIC_PROBLEMS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<input type="<?= $Page->SPECIFIC_PROBLEMS->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_SPECIFIC_PROBLEMS" name="x_SPECIFIC_PROBLEMS" id="x_SPECIFIC_PROBLEMS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SPECIFIC_PROBLEMS->getPlaceHolder()) ?>" value="<?= $Page->SPECIFIC_PROBLEMS->EditValue ?>"<?= $Page->SPECIFIC_PROBLEMS->editAttributes() ?> aria-describedby="x_SPECIFIC_PROBLEMS_help">
<?= $Page->SPECIFIC_PROBLEMS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SPECIFIC_PROBLEMS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IMSC_1->Visible) { // IMSC_1 ?>
    <div id="r_IMSC_1" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_IMSC_1" for="x_IMSC_1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IMSC_1->caption() ?><?= $Page->IMSC_1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IMSC_1->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_IMSC_1">
<input type="<?= $Page->IMSC_1->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IMSC_1" name="x_IMSC_1" id="x_IMSC_1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IMSC_1->getPlaceHolder()) ?>" value="<?= $Page->IMSC_1->EditValue ?>"<?= $Page->IMSC_1->editAttributes() ?> aria-describedby="x_IMSC_1_help">
<?= $Page->IMSC_1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IMSC_1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IMSC_2->Visible) { // IMSC_2 ?>
    <div id="r_IMSC_2" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_IMSC_2" for="x_IMSC_2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IMSC_2->caption() ?><?= $Page->IMSC_2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IMSC_2->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_IMSC_2">
<input type="<?= $Page->IMSC_2->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IMSC_2" name="x_IMSC_2" id="x_IMSC_2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IMSC_2->getPlaceHolder()) ?>" value="<?= $Page->IMSC_2->EditValue ?>"<?= $Page->IMSC_2->editAttributes() ?> aria-describedby="x_IMSC_2_help">
<?= $Page->IMSC_2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IMSC_2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
    <div id="r_LIQUIFACTION_STORAGE" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_LIQUIFACTION_STORAGE" for="x_LIQUIFACTION_STORAGE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LIQUIFACTION_STORAGE->caption() ?><?= $Page->LIQUIFACTION_STORAGE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<input type="<?= $Page->LIQUIFACTION_STORAGE->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_LIQUIFACTION_STORAGE" name="x_LIQUIFACTION_STORAGE" id="x_LIQUIFACTION_STORAGE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LIQUIFACTION_STORAGE->getPlaceHolder()) ?>" value="<?= $Page->LIQUIFACTION_STORAGE->EditValue ?>"<?= $Page->LIQUIFACTION_STORAGE->editAttributes() ?> aria-describedby="x_LIQUIFACTION_STORAGE_help">
<?= $Page->LIQUIFACTION_STORAGE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LIQUIFACTION_STORAGE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
    <div id="r_IUI_PREP_METHOD" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_IUI_PREP_METHOD" for="x_IUI_PREP_METHOD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IUI_PREP_METHOD->caption() ?><?= $Page->IUI_PREP_METHOD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IUI_PREP_METHOD->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_IUI_PREP_METHOD">
<input type="<?= $Page->IUI_PREP_METHOD->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_IUI_PREP_METHOD" name="x_IUI_PREP_METHOD" id="x_IUI_PREP_METHOD" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IUI_PREP_METHOD->getPlaceHolder()) ?>" value="<?= $Page->IUI_PREP_METHOD->EditValue ?>"<?= $Page->IUI_PREP_METHOD->editAttributes() ?> aria-describedby="x_IUI_PREP_METHOD_help">
<?= $Page->IUI_PREP_METHOD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IUI_PREP_METHOD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
    <div id="r_TIME_FROM_TRIGGER" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_TIME_FROM_TRIGGER" for="x_TIME_FROM_TRIGGER" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TIME_FROM_TRIGGER->caption() ?><?= $Page->TIME_FROM_TRIGGER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TIME_FROM_TRIGGER->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<input type="<?= $Page->TIME_FROM_TRIGGER->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_TRIGGER" name="x_TIME_FROM_TRIGGER" id="x_TIME_FROM_TRIGGER" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TIME_FROM_TRIGGER->getPlaceHolder()) ?>" value="<?= $Page->TIME_FROM_TRIGGER->EditValue ?>"<?= $Page->TIME_FROM_TRIGGER->editAttributes() ?> aria-describedby="x_TIME_FROM_TRIGGER_help">
<?= $Page->TIME_FROM_TRIGGER->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TIME_FROM_TRIGGER->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
    <div id="r_COLLECTION_TO_PREPARATION" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION" for="x_COLLECTION_TO_PREPARATION" class="<?= $Page->LeftColumnClass ?>"><?= $Page->COLLECTION_TO_PREPARATION->caption() ?><?= $Page->COLLECTION_TO_PREPARATION->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<input type="<?= $Page->COLLECTION_TO_PREPARATION->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_COLLECTION_TO_PREPARATION" name="x_COLLECTION_TO_PREPARATION" id="x_COLLECTION_TO_PREPARATION" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->COLLECTION_TO_PREPARATION->getPlaceHolder()) ?>" value="<?= $Page->COLLECTION_TO_PREPARATION->EditValue ?>"<?= $Page->COLLECTION_TO_PREPARATION->editAttributes() ?> aria-describedby="x_COLLECTION_TO_PREPARATION_help">
<?= $Page->COLLECTION_TO_PREPARATION->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->COLLECTION_TO_PREPARATION->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
    <div id="r_TIME_FROM_PREP_TO_INSEM" class="form-group row">
        <label id="elh_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM" for="x_TIME_FROM_PREP_TO_INSEM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TIME_FROM_PREP_TO_INSEM->caption() ?><?= $Page->TIME_FROM_PREP_TO_INSEM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<input type="<?= $Page->TIME_FROM_PREP_TO_INSEM->getInputTextType() ?>" data-table="ivf_semenanalysisreport" data-field="x_TIME_FROM_PREP_TO_INSEM" name="x_TIME_FROM_PREP_TO_INSEM" id="x_TIME_FROM_PREP_TO_INSEM" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TIME_FROM_PREP_TO_INSEM->getPlaceHolder()) ?>" value="<?= $Page->TIME_FROM_PREP_TO_INSEM->EditValue ?>"<?= $Page->TIME_FROM_PREP_TO_INSEM->editAttributes() ?> aria-describedby="x_TIME_FROM_PREP_TO_INSEM_help">
<?= $Page->TIME_FROM_PREP_TO_INSEM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TIME_FROM_PREP_TO_INSEM->getErrorMessage() ?></div>
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
    ew.addEventHandlers("ivf_semenanalysisreport");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

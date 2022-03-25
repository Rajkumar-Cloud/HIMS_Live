<?php

namespace PHPMaker2021\project3;

// Page object
$IvfVitalsHistoryEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_vitals_historyedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fivf_vitals_historyedit = currentForm = new ew.Form("fivf_vitals_historyedit", "edit");

    // Add fields
    var fields = ew.vars.tables.ivf_vitals_history.fields;
    fivf_vitals_historyedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["RIDNO", [fields.RIDNO.required ? ew.Validators.required(fields.RIDNO.caption) : null, ew.Validators.integer], fields.RIDNO.isInvalid],
        ["Name", [fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["Age", [fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["SEX", [fields.SEX.required ? ew.Validators.required(fields.SEX.caption) : null], fields.SEX.isInvalid],
        ["Religion", [fields.Religion.required ? ew.Validators.required(fields.Religion.caption) : null], fields.Religion.isInvalid],
        ["Address", [fields.Address.required ? ew.Validators.required(fields.Address.caption) : null], fields.Address.isInvalid],
        ["IdentificationMark", [fields.IdentificationMark.required ? ew.Validators.required(fields.IdentificationMark.caption) : null], fields.IdentificationMark.isInvalid],
        ["DoublewitnessName1", [fields.DoublewitnessName1.required ? ew.Validators.required(fields.DoublewitnessName1.caption) : null], fields.DoublewitnessName1.isInvalid],
        ["DoublewitnessName2", [fields.DoublewitnessName2.required ? ew.Validators.required(fields.DoublewitnessName2.caption) : null], fields.DoublewitnessName2.isInvalid],
        ["Chiefcomplaints", [fields.Chiefcomplaints.required ? ew.Validators.required(fields.Chiefcomplaints.caption) : null], fields.Chiefcomplaints.isInvalid],
        ["MenstrualHistory", [fields.MenstrualHistory.required ? ew.Validators.required(fields.MenstrualHistory.caption) : null], fields.MenstrualHistory.isInvalid],
        ["ObstetricHistory", [fields.ObstetricHistory.required ? ew.Validators.required(fields.ObstetricHistory.caption) : null], fields.ObstetricHistory.isInvalid],
        ["MedicalHistory", [fields.MedicalHistory.required ? ew.Validators.required(fields.MedicalHistory.caption) : null], fields.MedicalHistory.isInvalid],
        ["SurgicalHistory", [fields.SurgicalHistory.required ? ew.Validators.required(fields.SurgicalHistory.caption) : null], fields.SurgicalHistory.isInvalid],
        ["Generalexaminationpallor", [fields.Generalexaminationpallor.required ? ew.Validators.required(fields.Generalexaminationpallor.caption) : null], fields.Generalexaminationpallor.isInvalid],
        ["PR", [fields.PR.required ? ew.Validators.required(fields.PR.caption) : null], fields.PR.isInvalid],
        ["CVS", [fields.CVS.required ? ew.Validators.required(fields.CVS.caption) : null], fields.CVS.isInvalid],
        ["PA", [fields.PA.required ? ew.Validators.required(fields.PA.caption) : null], fields.PA.isInvalid],
        ["PROVISIONALDIAGNOSIS", [fields.PROVISIONALDIAGNOSIS.required ? ew.Validators.required(fields.PROVISIONALDIAGNOSIS.caption) : null], fields.PROVISIONALDIAGNOSIS.isInvalid],
        ["Investigations", [fields.Investigations.required ? ew.Validators.required(fields.Investigations.caption) : null], fields.Investigations.isInvalid],
        ["Fheight", [fields.Fheight.required ? ew.Validators.required(fields.Fheight.caption) : null], fields.Fheight.isInvalid],
        ["Fweight", [fields.Fweight.required ? ew.Validators.required(fields.Fweight.caption) : null], fields.Fweight.isInvalid],
        ["FBMI", [fields.FBMI.required ? ew.Validators.required(fields.FBMI.caption) : null], fields.FBMI.isInvalid],
        ["FBloodgroup", [fields.FBloodgroup.required ? ew.Validators.required(fields.FBloodgroup.caption) : null], fields.FBloodgroup.isInvalid],
        ["Mheight", [fields.Mheight.required ? ew.Validators.required(fields.Mheight.caption) : null], fields.Mheight.isInvalid],
        ["Mweight", [fields.Mweight.required ? ew.Validators.required(fields.Mweight.caption) : null], fields.Mweight.isInvalid],
        ["MBMI", [fields.MBMI.required ? ew.Validators.required(fields.MBMI.caption) : null], fields.MBMI.isInvalid],
        ["MBloodgroup", [fields.MBloodgroup.required ? ew.Validators.required(fields.MBloodgroup.caption) : null], fields.MBloodgroup.isInvalid],
        ["FBuild", [fields.FBuild.required ? ew.Validators.required(fields.FBuild.caption) : null], fields.FBuild.isInvalid],
        ["MBuild", [fields.MBuild.required ? ew.Validators.required(fields.MBuild.caption) : null], fields.MBuild.isInvalid],
        ["FSkinColor", [fields.FSkinColor.required ? ew.Validators.required(fields.FSkinColor.caption) : null], fields.FSkinColor.isInvalid],
        ["MSkinColor", [fields.MSkinColor.required ? ew.Validators.required(fields.MSkinColor.caption) : null], fields.MSkinColor.isInvalid],
        ["FEyesColor", [fields.FEyesColor.required ? ew.Validators.required(fields.FEyesColor.caption) : null], fields.FEyesColor.isInvalid],
        ["MEyesColor", [fields.MEyesColor.required ? ew.Validators.required(fields.MEyesColor.caption) : null], fields.MEyesColor.isInvalid],
        ["FHairColor", [fields.FHairColor.required ? ew.Validators.required(fields.FHairColor.caption) : null], fields.FHairColor.isInvalid],
        ["MhairColor", [fields.MhairColor.required ? ew.Validators.required(fields.MhairColor.caption) : null], fields.MhairColor.isInvalid],
        ["FhairTexture", [fields.FhairTexture.required ? ew.Validators.required(fields.FhairTexture.caption) : null], fields.FhairTexture.isInvalid],
        ["MHairTexture", [fields.MHairTexture.required ? ew.Validators.required(fields.MHairTexture.caption) : null], fields.MHairTexture.isInvalid],
        ["Fothers", [fields.Fothers.required ? ew.Validators.required(fields.Fothers.caption) : null], fields.Fothers.isInvalid],
        ["Mothers", [fields.Mothers.required ? ew.Validators.required(fields.Mothers.caption) : null], fields.Mothers.isInvalid],
        ["PGE", [fields.PGE.required ? ew.Validators.required(fields.PGE.caption) : null], fields.PGE.isInvalid],
        ["PPR", [fields.PPR.required ? ew.Validators.required(fields.PPR.caption) : null], fields.PPR.isInvalid],
        ["PBP", [fields.PBP.required ? ew.Validators.required(fields.PBP.caption) : null], fields.PBP.isInvalid],
        ["Breast", [fields.Breast.required ? ew.Validators.required(fields.Breast.caption) : null], fields.Breast.isInvalid],
        ["PPA", [fields.PPA.required ? ew.Validators.required(fields.PPA.caption) : null], fields.PPA.isInvalid],
        ["PPSV", [fields.PPSV.required ? ew.Validators.required(fields.PPSV.caption) : null], fields.PPSV.isInvalid],
        ["PPAPSMEAR", [fields.PPAPSMEAR.required ? ew.Validators.required(fields.PPAPSMEAR.caption) : null], fields.PPAPSMEAR.isInvalid],
        ["PTHYROID", [fields.PTHYROID.required ? ew.Validators.required(fields.PTHYROID.caption) : null], fields.PTHYROID.isInvalid],
        ["MTHYROID", [fields.MTHYROID.required ? ew.Validators.required(fields.MTHYROID.caption) : null], fields.MTHYROID.isInvalid],
        ["SecSexCharacters", [fields.SecSexCharacters.required ? ew.Validators.required(fields.SecSexCharacters.caption) : null], fields.SecSexCharacters.isInvalid],
        ["PenisUM", [fields.PenisUM.required ? ew.Validators.required(fields.PenisUM.caption) : null], fields.PenisUM.isInvalid],
        ["VAS", [fields.VAS.required ? ew.Validators.required(fields.VAS.caption) : null], fields.VAS.isInvalid],
        ["EPIDIDYMIS", [fields.EPIDIDYMIS.required ? ew.Validators.required(fields.EPIDIDYMIS.caption) : null], fields.EPIDIDYMIS.isInvalid],
        ["Varicocele", [fields.Varicocele.required ? ew.Validators.required(fields.Varicocele.caption) : null], fields.Varicocele.isInvalid],
        ["FertilityTreatmentHistory", [fields.FertilityTreatmentHistory.required ? ew.Validators.required(fields.FertilityTreatmentHistory.caption) : null], fields.FertilityTreatmentHistory.isInvalid],
        ["SurgeryHistory", [fields.SurgeryHistory.required ? ew.Validators.required(fields.SurgeryHistory.caption) : null], fields.SurgeryHistory.isInvalid],
        ["FamilyHistory", [fields.FamilyHistory.required ? ew.Validators.required(fields.FamilyHistory.caption) : null], fields.FamilyHistory.isInvalid],
        ["PInvestigations", [fields.PInvestigations.required ? ew.Validators.required(fields.PInvestigations.caption) : null], fields.PInvestigations.isInvalid],
        ["Addictions", [fields.Addictions.required ? ew.Validators.required(fields.Addictions.caption) : null], fields.Addictions.isInvalid],
        ["Medications", [fields.Medications.required ? ew.Validators.required(fields.Medications.caption) : null], fields.Medications.isInvalid],
        ["Medical", [fields.Medical.required ? ew.Validators.required(fields.Medical.caption) : null], fields.Medical.isInvalid],
        ["Surgical", [fields.Surgical.required ? ew.Validators.required(fields.Surgical.caption) : null], fields.Surgical.isInvalid],
        ["CoitalHistory", [fields.CoitalHistory.required ? ew.Validators.required(fields.CoitalHistory.caption) : null], fields.CoitalHistory.isInvalid],
        ["SemenAnalysis", [fields.SemenAnalysis.required ? ew.Validators.required(fields.SemenAnalysis.caption) : null], fields.SemenAnalysis.isInvalid],
        ["MInsvestications", [fields.MInsvestications.required ? ew.Validators.required(fields.MInsvestications.caption) : null], fields.MInsvestications.isInvalid],
        ["PImpression", [fields.PImpression.required ? ew.Validators.required(fields.PImpression.caption) : null], fields.PImpression.isInvalid],
        ["MIMpression", [fields.MIMpression.required ? ew.Validators.required(fields.MIMpression.caption) : null], fields.MIMpression.isInvalid],
        ["PPlanOfManagement", [fields.PPlanOfManagement.required ? ew.Validators.required(fields.PPlanOfManagement.caption) : null], fields.PPlanOfManagement.isInvalid],
        ["MPlanOfManagement", [fields.MPlanOfManagement.required ? ew.Validators.required(fields.MPlanOfManagement.caption) : null], fields.MPlanOfManagement.isInvalid],
        ["PReadMore", [fields.PReadMore.required ? ew.Validators.required(fields.PReadMore.caption) : null], fields.PReadMore.isInvalid],
        ["MReadMore", [fields.MReadMore.required ? ew.Validators.required(fields.MReadMore.caption) : null], fields.MReadMore.isInvalid],
        ["MariedFor", [fields.MariedFor.required ? ew.Validators.required(fields.MariedFor.caption) : null], fields.MariedFor.isInvalid],
        ["CMNCM", [fields.CMNCM.required ? ew.Validators.required(fields.CMNCM.caption) : null], fields.CMNCM.isInvalid],
        ["TidNo", [fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["pFamilyHistory", [fields.pFamilyHistory.required ? ew.Validators.required(fields.pFamilyHistory.caption) : null], fields.pFamilyHistory.isInvalid],
        ["pTemplateMedications", [fields.pTemplateMedications.required ? ew.Validators.required(fields.pTemplateMedications.caption) : null], fields.pTemplateMedications.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fivf_vitals_historyedit,
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
    fivf_vitals_historyedit.validate = function () {
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
    fivf_vitals_historyedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fivf_vitals_historyedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fivf_vitals_historyedit");
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
<form name="fivf_vitals_historyedit" id="fivf_vitals_historyedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_vitals_history">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_ivf_vitals_history_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_vitals_history_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <div id="r_RIDNO" class="form-group row">
        <label id="elh_ivf_vitals_history_RIDNO" for="x_RIDNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RIDNO->caption() ?><?= $Page->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el_ivf_vitals_history_RIDNO">
<input type="<?= $Page->RIDNO->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?= HtmlEncode($Page->RIDNO->getPlaceHolder()) ?>" value="<?= $Page->RIDNO->EditValue ?>"<?= $Page->RIDNO->editAttributes() ?> aria-describedby="x_RIDNO_help">
<?= $Page->RIDNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_vitals_history_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_ivf_vitals_history_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SEX->Visible) { // SEX ?>
    <div id="r_SEX" class="form-group row">
        <label id="elh_ivf_vitals_history_SEX" for="x_SEX" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SEX->caption() ?><?= $Page->SEX->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SEX->cellAttributes() ?>>
<span id="el_ivf_vitals_history_SEX">
<input type="<?= $Page->SEX->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_SEX" name="x_SEX" id="x_SEX" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SEX->getPlaceHolder()) ?>" value="<?= $Page->SEX->EditValue ?>"<?= $Page->SEX->editAttributes() ?> aria-describedby="x_SEX_help">
<?= $Page->SEX->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SEX->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Religion->Visible) { // Religion ?>
    <div id="r_Religion" class="form-group row">
        <label id="elh_ivf_vitals_history_Religion" for="x_Religion" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Religion->caption() ?><?= $Page->Religion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Religion->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Religion">
<input type="<?= $Page->Religion->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Religion" name="x_Religion" id="x_Religion" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Religion->getPlaceHolder()) ?>" value="<?= $Page->Religion->EditValue ?>"<?= $Page->Religion->editAttributes() ?> aria-describedby="x_Religion_help">
<?= $Page->Religion->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Religion->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Address->Visible) { // Address ?>
    <div id="r_Address" class="form-group row">
        <label id="elh_ivf_vitals_history_Address" for="x_Address" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Address->caption() ?><?= $Page->Address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Address->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Address">
<input type="<?= $Page->Address->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Address" name="x_Address" id="x_Address" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Address->getPlaceHolder()) ?>" value="<?= $Page->Address->EditValue ?>"<?= $Page->Address->editAttributes() ?> aria-describedby="x_Address_help">
<?= $Page->Address->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Address->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
    <div id="r_IdentificationMark" class="form-group row">
        <label id="elh_ivf_vitals_history_IdentificationMark" for="x_IdentificationMark" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IdentificationMark->caption() ?><?= $Page->IdentificationMark->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IdentificationMark->cellAttributes() ?>>
<span id="el_ivf_vitals_history_IdentificationMark">
<input type="<?= $Page->IdentificationMark->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_IdentificationMark" name="x_IdentificationMark" id="x_IdentificationMark" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IdentificationMark->getPlaceHolder()) ?>" value="<?= $Page->IdentificationMark->EditValue ?>"<?= $Page->IdentificationMark->editAttributes() ?> aria-describedby="x_IdentificationMark_help">
<?= $Page->IdentificationMark->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IdentificationMark->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
    <div id="r_DoublewitnessName1" class="form-group row">
        <label id="elh_ivf_vitals_history_DoublewitnessName1" for="x_DoublewitnessName1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DoublewitnessName1->caption() ?><?= $Page->DoublewitnessName1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DoublewitnessName1->cellAttributes() ?>>
<span id="el_ivf_vitals_history_DoublewitnessName1">
<textarea data-table="ivf_vitals_history" data-field="x_DoublewitnessName1" name="x_DoublewitnessName1" id="x_DoublewitnessName1" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->DoublewitnessName1->getPlaceHolder()) ?>"<?= $Page->DoublewitnessName1->editAttributes() ?> aria-describedby="x_DoublewitnessName1_help"><?= $Page->DoublewitnessName1->EditValue ?></textarea>
<?= $Page->DoublewitnessName1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DoublewitnessName1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
    <div id="r_DoublewitnessName2" class="form-group row">
        <label id="elh_ivf_vitals_history_DoublewitnessName2" for="x_DoublewitnessName2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DoublewitnessName2->caption() ?><?= $Page->DoublewitnessName2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DoublewitnessName2->cellAttributes() ?>>
<span id="el_ivf_vitals_history_DoublewitnessName2">
<textarea data-table="ivf_vitals_history" data-field="x_DoublewitnessName2" name="x_DoublewitnessName2" id="x_DoublewitnessName2" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->DoublewitnessName2->getPlaceHolder()) ?>"<?= $Page->DoublewitnessName2->editAttributes() ?> aria-describedby="x_DoublewitnessName2_help"><?= $Page->DoublewitnessName2->EditValue ?></textarea>
<?= $Page->DoublewitnessName2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DoublewitnessName2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
    <div id="r_Chiefcomplaints" class="form-group row">
        <label id="elh_ivf_vitals_history_Chiefcomplaints" for="x_Chiefcomplaints" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Chiefcomplaints->caption() ?><?= $Page->Chiefcomplaints->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Chiefcomplaints->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Chiefcomplaints">
<textarea data-table="ivf_vitals_history" data-field="x_Chiefcomplaints" name="x_Chiefcomplaints" id="x_Chiefcomplaints" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Chiefcomplaints->getPlaceHolder()) ?>"<?= $Page->Chiefcomplaints->editAttributes() ?> aria-describedby="x_Chiefcomplaints_help"><?= $Page->Chiefcomplaints->EditValue ?></textarea>
<?= $Page->Chiefcomplaints->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Chiefcomplaints->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
    <div id="r_MenstrualHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_MenstrualHistory" for="x_MenstrualHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MenstrualHistory->caption() ?><?= $Page->MenstrualHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MenstrualHistory->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MenstrualHistory">
<textarea data-table="ivf_vitals_history" data-field="x_MenstrualHistory" name="x_MenstrualHistory" id="x_MenstrualHistory" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->MenstrualHistory->getPlaceHolder()) ?>"<?= $Page->MenstrualHistory->editAttributes() ?> aria-describedby="x_MenstrualHistory_help"><?= $Page->MenstrualHistory->EditValue ?></textarea>
<?= $Page->MenstrualHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MenstrualHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ObstetricHistory->Visible) { // ObstetricHistory ?>
    <div id="r_ObstetricHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_ObstetricHistory" for="x_ObstetricHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ObstetricHistory->caption() ?><?= $Page->ObstetricHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ObstetricHistory->cellAttributes() ?>>
<span id="el_ivf_vitals_history_ObstetricHistory">
<textarea data-table="ivf_vitals_history" data-field="x_ObstetricHistory" name="x_ObstetricHistory" id="x_ObstetricHistory" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->ObstetricHistory->getPlaceHolder()) ?>"<?= $Page->ObstetricHistory->editAttributes() ?> aria-describedby="x_ObstetricHistory_help"><?= $Page->ObstetricHistory->EditValue ?></textarea>
<?= $Page->ObstetricHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ObstetricHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MedicalHistory->Visible) { // MedicalHistory ?>
    <div id="r_MedicalHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_MedicalHistory" for="x_MedicalHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MedicalHistory->caption() ?><?= $Page->MedicalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MedicalHistory->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MedicalHistory">
<input type="<?= $Page->MedicalHistory->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_MedicalHistory" name="x_MedicalHistory" id="x_MedicalHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MedicalHistory->getPlaceHolder()) ?>" value="<?= $Page->MedicalHistory->EditValue ?>"<?= $Page->MedicalHistory->editAttributes() ?> aria-describedby="x_MedicalHistory_help">
<?= $Page->MedicalHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MedicalHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
    <div id="r_SurgicalHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_SurgicalHistory" for="x_SurgicalHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SurgicalHistory->caption() ?><?= $Page->SurgicalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SurgicalHistory->cellAttributes() ?>>
<span id="el_ivf_vitals_history_SurgicalHistory">
<input type="<?= $Page->SurgicalHistory->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_SurgicalHistory" name="x_SurgicalHistory" id="x_SurgicalHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SurgicalHistory->getPlaceHolder()) ?>" value="<?= $Page->SurgicalHistory->EditValue ?>"<?= $Page->SurgicalHistory->editAttributes() ?> aria-describedby="x_SurgicalHistory_help">
<?= $Page->SurgicalHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SurgicalHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
    <div id="r_Generalexaminationpallor" class="form-group row">
        <label id="elh_ivf_vitals_history_Generalexaminationpallor" for="x_Generalexaminationpallor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Generalexaminationpallor->caption() ?><?= $Page->Generalexaminationpallor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Generalexaminationpallor->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Generalexaminationpallor">
<input type="<?= $Page->Generalexaminationpallor->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Generalexaminationpallor" name="x_Generalexaminationpallor" id="x_Generalexaminationpallor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Generalexaminationpallor->getPlaceHolder()) ?>" value="<?= $Page->Generalexaminationpallor->EditValue ?>"<?= $Page->Generalexaminationpallor->editAttributes() ?> aria-describedby="x_Generalexaminationpallor_help">
<?= $Page->Generalexaminationpallor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Generalexaminationpallor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PR->Visible) { // PR ?>
    <div id="r_PR" class="form-group row">
        <label id="elh_ivf_vitals_history_PR" for="x_PR" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PR->caption() ?><?= $Page->PR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PR->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PR">
<input type="<?= $Page->PR->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PR" name="x_PR" id="x_PR" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PR->getPlaceHolder()) ?>" value="<?= $Page->PR->EditValue ?>"<?= $Page->PR->editAttributes() ?> aria-describedby="x_PR_help">
<?= $Page->PR->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PR->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
    <div id="r_CVS" class="form-group row">
        <label id="elh_ivf_vitals_history_CVS" for="x_CVS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CVS->caption() ?><?= $Page->CVS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CVS->cellAttributes() ?>>
<span id="el_ivf_vitals_history_CVS">
<input type="<?= $Page->CVS->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_CVS" name="x_CVS" id="x_CVS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CVS->getPlaceHolder()) ?>" value="<?= $Page->CVS->EditValue ?>"<?= $Page->CVS->editAttributes() ?> aria-describedby="x_CVS_help">
<?= $Page->CVS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CVS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
    <div id="r_PA" class="form-group row">
        <label id="elh_ivf_vitals_history_PA" for="x_PA" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PA->caption() ?><?= $Page->PA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PA->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PA">
<input type="<?= $Page->PA->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PA" name="x_PA" id="x_PA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PA->getPlaceHolder()) ?>" value="<?= $Page->PA->EditValue ?>"<?= $Page->PA->editAttributes() ?> aria-describedby="x_PA_help">
<?= $Page->PA->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PA->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
    <div id="r_PROVISIONALDIAGNOSIS" class="form-group row">
        <label id="elh_ivf_vitals_history_PROVISIONALDIAGNOSIS" for="x_PROVISIONALDIAGNOSIS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PROVISIONALDIAGNOSIS->caption() ?><?= $Page->PROVISIONALDIAGNOSIS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PROVISIONALDIAGNOSIS">
<input type="<?= $Page->PROVISIONALDIAGNOSIS->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PROVISIONALDIAGNOSIS" name="x_PROVISIONALDIAGNOSIS" id="x_PROVISIONALDIAGNOSIS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PROVISIONALDIAGNOSIS->getPlaceHolder()) ?>" value="<?= $Page->PROVISIONALDIAGNOSIS->EditValue ?>"<?= $Page->PROVISIONALDIAGNOSIS->editAttributes() ?> aria-describedby="x_PROVISIONALDIAGNOSIS_help">
<?= $Page->PROVISIONALDIAGNOSIS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PROVISIONALDIAGNOSIS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Investigations->Visible) { // Investigations ?>
    <div id="r_Investigations" class="form-group row">
        <label id="elh_ivf_vitals_history_Investigations" for="x_Investigations" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Investigations->caption() ?><?= $Page->Investigations->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Investigations->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Investigations">
<input type="<?= $Page->Investigations->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Investigations" name="x_Investigations" id="x_Investigations" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Investigations->getPlaceHolder()) ?>" value="<?= $Page->Investigations->EditValue ?>"<?= $Page->Investigations->editAttributes() ?> aria-describedby="x_Investigations_help">
<?= $Page->Investigations->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Investigations->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Fheight->Visible) { // Fheight ?>
    <div id="r_Fheight" class="form-group row">
        <label id="elh_ivf_vitals_history_Fheight" for="x_Fheight" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Fheight->caption() ?><?= $Page->Fheight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Fheight->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Fheight">
<input type="<?= $Page->Fheight->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Fheight" name="x_Fheight" id="x_Fheight" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Fheight->getPlaceHolder()) ?>" value="<?= $Page->Fheight->EditValue ?>"<?= $Page->Fheight->editAttributes() ?> aria-describedby="x_Fheight_help">
<?= $Page->Fheight->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Fheight->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Fweight->Visible) { // Fweight ?>
    <div id="r_Fweight" class="form-group row">
        <label id="elh_ivf_vitals_history_Fweight" for="x_Fweight" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Fweight->caption() ?><?= $Page->Fweight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Fweight->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Fweight">
<input type="<?= $Page->Fweight->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Fweight" name="x_Fweight" id="x_Fweight" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Fweight->getPlaceHolder()) ?>" value="<?= $Page->Fweight->EditValue ?>"<?= $Page->Fweight->editAttributes() ?> aria-describedby="x_Fweight_help">
<?= $Page->Fweight->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Fweight->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FBMI->Visible) { // FBMI ?>
    <div id="r_FBMI" class="form-group row">
        <label id="elh_ivf_vitals_history_FBMI" for="x_FBMI" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FBMI->caption() ?><?= $Page->FBMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FBMI->cellAttributes() ?>>
<span id="el_ivf_vitals_history_FBMI">
<input type="<?= $Page->FBMI->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_FBMI" name="x_FBMI" id="x_FBMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FBMI->getPlaceHolder()) ?>" value="<?= $Page->FBMI->EditValue ?>"<?= $Page->FBMI->editAttributes() ?> aria-describedby="x_FBMI_help">
<?= $Page->FBMI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FBMI->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FBloodgroup->Visible) { // FBloodgroup ?>
    <div id="r_FBloodgroup" class="form-group row">
        <label id="elh_ivf_vitals_history_FBloodgroup" for="x_FBloodgroup" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FBloodgroup->caption() ?><?= $Page->FBloodgroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FBloodgroup->cellAttributes() ?>>
<span id="el_ivf_vitals_history_FBloodgroup">
<input type="<?= $Page->FBloodgroup->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_FBloodgroup" name="x_FBloodgroup" id="x_FBloodgroup" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FBloodgroup->getPlaceHolder()) ?>" value="<?= $Page->FBloodgroup->EditValue ?>"<?= $Page->FBloodgroup->editAttributes() ?> aria-describedby="x_FBloodgroup_help">
<?= $Page->FBloodgroup->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FBloodgroup->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mheight->Visible) { // Mheight ?>
    <div id="r_Mheight" class="form-group row">
        <label id="elh_ivf_vitals_history_Mheight" for="x_Mheight" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Mheight->caption() ?><?= $Page->Mheight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mheight->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Mheight">
<input type="<?= $Page->Mheight->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Mheight" name="x_Mheight" id="x_Mheight" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mheight->getPlaceHolder()) ?>" value="<?= $Page->Mheight->EditValue ?>"<?= $Page->Mheight->editAttributes() ?> aria-describedby="x_Mheight_help">
<?= $Page->Mheight->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mheight->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mweight->Visible) { // Mweight ?>
    <div id="r_Mweight" class="form-group row">
        <label id="elh_ivf_vitals_history_Mweight" for="x_Mweight" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Mweight->caption() ?><?= $Page->Mweight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mweight->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Mweight">
<input type="<?= $Page->Mweight->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Mweight" name="x_Mweight" id="x_Mweight" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mweight->getPlaceHolder()) ?>" value="<?= $Page->Mweight->EditValue ?>"<?= $Page->Mweight->editAttributes() ?> aria-describedby="x_Mweight_help">
<?= $Page->Mweight->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mweight->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MBMI->Visible) { // MBMI ?>
    <div id="r_MBMI" class="form-group row">
        <label id="elh_ivf_vitals_history_MBMI" for="x_MBMI" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MBMI->caption() ?><?= $Page->MBMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MBMI->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MBMI">
<input type="<?= $Page->MBMI->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_MBMI" name="x_MBMI" id="x_MBMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MBMI->getPlaceHolder()) ?>" value="<?= $Page->MBMI->EditValue ?>"<?= $Page->MBMI->editAttributes() ?> aria-describedby="x_MBMI_help">
<?= $Page->MBMI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MBMI->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MBloodgroup->Visible) { // MBloodgroup ?>
    <div id="r_MBloodgroup" class="form-group row">
        <label id="elh_ivf_vitals_history_MBloodgroup" for="x_MBloodgroup" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MBloodgroup->caption() ?><?= $Page->MBloodgroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MBloodgroup->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MBloodgroup">
<input type="<?= $Page->MBloodgroup->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_MBloodgroup" name="x_MBloodgroup" id="x_MBloodgroup" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MBloodgroup->getPlaceHolder()) ?>" value="<?= $Page->MBloodgroup->EditValue ?>"<?= $Page->MBloodgroup->editAttributes() ?> aria-describedby="x_MBloodgroup_help">
<?= $Page->MBloodgroup->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MBloodgroup->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FBuild->Visible) { // FBuild ?>
    <div id="r_FBuild" class="form-group row">
        <label id="elh_ivf_vitals_history_FBuild" for="x_FBuild" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FBuild->caption() ?><?= $Page->FBuild->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FBuild->cellAttributes() ?>>
<span id="el_ivf_vitals_history_FBuild">
<input type="<?= $Page->FBuild->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_FBuild" name="x_FBuild" id="x_FBuild" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FBuild->getPlaceHolder()) ?>" value="<?= $Page->FBuild->EditValue ?>"<?= $Page->FBuild->editAttributes() ?> aria-describedby="x_FBuild_help">
<?= $Page->FBuild->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FBuild->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MBuild->Visible) { // MBuild ?>
    <div id="r_MBuild" class="form-group row">
        <label id="elh_ivf_vitals_history_MBuild" for="x_MBuild" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MBuild->caption() ?><?= $Page->MBuild->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MBuild->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MBuild">
<input type="<?= $Page->MBuild->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_MBuild" name="x_MBuild" id="x_MBuild" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MBuild->getPlaceHolder()) ?>" value="<?= $Page->MBuild->EditValue ?>"<?= $Page->MBuild->editAttributes() ?> aria-describedby="x_MBuild_help">
<?= $Page->MBuild->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MBuild->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FSkinColor->Visible) { // FSkinColor ?>
    <div id="r_FSkinColor" class="form-group row">
        <label id="elh_ivf_vitals_history_FSkinColor" for="x_FSkinColor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FSkinColor->caption() ?><?= $Page->FSkinColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FSkinColor->cellAttributes() ?>>
<span id="el_ivf_vitals_history_FSkinColor">
<input type="<?= $Page->FSkinColor->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_FSkinColor" name="x_FSkinColor" id="x_FSkinColor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FSkinColor->getPlaceHolder()) ?>" value="<?= $Page->FSkinColor->EditValue ?>"<?= $Page->FSkinColor->editAttributes() ?> aria-describedby="x_FSkinColor_help">
<?= $Page->FSkinColor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FSkinColor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MSkinColor->Visible) { // MSkinColor ?>
    <div id="r_MSkinColor" class="form-group row">
        <label id="elh_ivf_vitals_history_MSkinColor" for="x_MSkinColor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MSkinColor->caption() ?><?= $Page->MSkinColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MSkinColor->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MSkinColor">
<input type="<?= $Page->MSkinColor->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_MSkinColor" name="x_MSkinColor" id="x_MSkinColor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MSkinColor->getPlaceHolder()) ?>" value="<?= $Page->MSkinColor->EditValue ?>"<?= $Page->MSkinColor->editAttributes() ?> aria-describedby="x_MSkinColor_help">
<?= $Page->MSkinColor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MSkinColor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FEyesColor->Visible) { // FEyesColor ?>
    <div id="r_FEyesColor" class="form-group row">
        <label id="elh_ivf_vitals_history_FEyesColor" for="x_FEyesColor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FEyesColor->caption() ?><?= $Page->FEyesColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FEyesColor->cellAttributes() ?>>
<span id="el_ivf_vitals_history_FEyesColor">
<input type="<?= $Page->FEyesColor->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_FEyesColor" name="x_FEyesColor" id="x_FEyesColor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FEyesColor->getPlaceHolder()) ?>" value="<?= $Page->FEyesColor->EditValue ?>"<?= $Page->FEyesColor->editAttributes() ?> aria-describedby="x_FEyesColor_help">
<?= $Page->FEyesColor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FEyesColor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MEyesColor->Visible) { // MEyesColor ?>
    <div id="r_MEyesColor" class="form-group row">
        <label id="elh_ivf_vitals_history_MEyesColor" for="x_MEyesColor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MEyesColor->caption() ?><?= $Page->MEyesColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MEyesColor->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MEyesColor">
<input type="<?= $Page->MEyesColor->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_MEyesColor" name="x_MEyesColor" id="x_MEyesColor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MEyesColor->getPlaceHolder()) ?>" value="<?= $Page->MEyesColor->EditValue ?>"<?= $Page->MEyesColor->editAttributes() ?> aria-describedby="x_MEyesColor_help">
<?= $Page->MEyesColor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MEyesColor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FHairColor->Visible) { // FHairColor ?>
    <div id="r_FHairColor" class="form-group row">
        <label id="elh_ivf_vitals_history_FHairColor" for="x_FHairColor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FHairColor->caption() ?><?= $Page->FHairColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FHairColor->cellAttributes() ?>>
<span id="el_ivf_vitals_history_FHairColor">
<input type="<?= $Page->FHairColor->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_FHairColor" name="x_FHairColor" id="x_FHairColor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FHairColor->getPlaceHolder()) ?>" value="<?= $Page->FHairColor->EditValue ?>"<?= $Page->FHairColor->editAttributes() ?> aria-describedby="x_FHairColor_help">
<?= $Page->FHairColor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FHairColor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MhairColor->Visible) { // MhairColor ?>
    <div id="r_MhairColor" class="form-group row">
        <label id="elh_ivf_vitals_history_MhairColor" for="x_MhairColor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MhairColor->caption() ?><?= $Page->MhairColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MhairColor->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MhairColor">
<input type="<?= $Page->MhairColor->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_MhairColor" name="x_MhairColor" id="x_MhairColor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MhairColor->getPlaceHolder()) ?>" value="<?= $Page->MhairColor->EditValue ?>"<?= $Page->MhairColor->editAttributes() ?> aria-describedby="x_MhairColor_help">
<?= $Page->MhairColor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MhairColor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FhairTexture->Visible) { // FhairTexture ?>
    <div id="r_FhairTexture" class="form-group row">
        <label id="elh_ivf_vitals_history_FhairTexture" for="x_FhairTexture" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FhairTexture->caption() ?><?= $Page->FhairTexture->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FhairTexture->cellAttributes() ?>>
<span id="el_ivf_vitals_history_FhairTexture">
<input type="<?= $Page->FhairTexture->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_FhairTexture" name="x_FhairTexture" id="x_FhairTexture" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FhairTexture->getPlaceHolder()) ?>" value="<?= $Page->FhairTexture->EditValue ?>"<?= $Page->FhairTexture->editAttributes() ?> aria-describedby="x_FhairTexture_help">
<?= $Page->FhairTexture->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FhairTexture->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MHairTexture->Visible) { // MHairTexture ?>
    <div id="r_MHairTexture" class="form-group row">
        <label id="elh_ivf_vitals_history_MHairTexture" for="x_MHairTexture" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MHairTexture->caption() ?><?= $Page->MHairTexture->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MHairTexture->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MHairTexture">
<input type="<?= $Page->MHairTexture->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_MHairTexture" name="x_MHairTexture" id="x_MHairTexture" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MHairTexture->getPlaceHolder()) ?>" value="<?= $Page->MHairTexture->EditValue ?>"<?= $Page->MHairTexture->editAttributes() ?> aria-describedby="x_MHairTexture_help">
<?= $Page->MHairTexture->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MHairTexture->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Fothers->Visible) { // Fothers ?>
    <div id="r_Fothers" class="form-group row">
        <label id="elh_ivf_vitals_history_Fothers" for="x_Fothers" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Fothers->caption() ?><?= $Page->Fothers->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Fothers->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Fothers">
<input type="<?= $Page->Fothers->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Fothers" name="x_Fothers" id="x_Fothers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Fothers->getPlaceHolder()) ?>" value="<?= $Page->Fothers->EditValue ?>"<?= $Page->Fothers->editAttributes() ?> aria-describedby="x_Fothers_help">
<?= $Page->Fothers->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Fothers->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mothers->Visible) { // Mothers ?>
    <div id="r_Mothers" class="form-group row">
        <label id="elh_ivf_vitals_history_Mothers" for="x_Mothers" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Mothers->caption() ?><?= $Page->Mothers->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mothers->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Mothers">
<input type="<?= $Page->Mothers->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Mothers" name="x_Mothers" id="x_Mothers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mothers->getPlaceHolder()) ?>" value="<?= $Page->Mothers->EditValue ?>"<?= $Page->Mothers->editAttributes() ?> aria-describedby="x_Mothers_help">
<?= $Page->Mothers->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mothers->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PGE->Visible) { // PGE ?>
    <div id="r_PGE" class="form-group row">
        <label id="elh_ivf_vitals_history_PGE" for="x_PGE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PGE->caption() ?><?= $Page->PGE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PGE->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PGE">
<input type="<?= $Page->PGE->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PGE" name="x_PGE" id="x_PGE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PGE->getPlaceHolder()) ?>" value="<?= $Page->PGE->EditValue ?>"<?= $Page->PGE->editAttributes() ?> aria-describedby="x_PGE_help">
<?= $Page->PGE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PGE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PPR->Visible) { // PPR ?>
    <div id="r_PPR" class="form-group row">
        <label id="elh_ivf_vitals_history_PPR" for="x_PPR" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PPR->caption() ?><?= $Page->PPR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PPR->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PPR">
<input type="<?= $Page->PPR->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PPR" name="x_PPR" id="x_PPR" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PPR->getPlaceHolder()) ?>" value="<?= $Page->PPR->EditValue ?>"<?= $Page->PPR->editAttributes() ?> aria-describedby="x_PPR_help">
<?= $Page->PPR->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PPR->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PBP->Visible) { // PBP ?>
    <div id="r_PBP" class="form-group row">
        <label id="elh_ivf_vitals_history_PBP" for="x_PBP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PBP->caption() ?><?= $Page->PBP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PBP->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PBP">
<input type="<?= $Page->PBP->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PBP" name="x_PBP" id="x_PBP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PBP->getPlaceHolder()) ?>" value="<?= $Page->PBP->EditValue ?>"<?= $Page->PBP->editAttributes() ?> aria-describedby="x_PBP_help">
<?= $Page->PBP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PBP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Breast->Visible) { // Breast ?>
    <div id="r_Breast" class="form-group row">
        <label id="elh_ivf_vitals_history_Breast" for="x_Breast" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Breast->caption() ?><?= $Page->Breast->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Breast->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Breast">
<input type="<?= $Page->Breast->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Breast" name="x_Breast" id="x_Breast" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Breast->getPlaceHolder()) ?>" value="<?= $Page->Breast->EditValue ?>"<?= $Page->Breast->editAttributes() ?> aria-describedby="x_Breast_help">
<?= $Page->Breast->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Breast->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PPA->Visible) { // PPA ?>
    <div id="r_PPA" class="form-group row">
        <label id="elh_ivf_vitals_history_PPA" for="x_PPA" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PPA->caption() ?><?= $Page->PPA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PPA->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PPA">
<input type="<?= $Page->PPA->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PPA" name="x_PPA" id="x_PPA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PPA->getPlaceHolder()) ?>" value="<?= $Page->PPA->EditValue ?>"<?= $Page->PPA->editAttributes() ?> aria-describedby="x_PPA_help">
<?= $Page->PPA->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PPA->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PPSV->Visible) { // PPSV ?>
    <div id="r_PPSV" class="form-group row">
        <label id="elh_ivf_vitals_history_PPSV" for="x_PPSV" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PPSV->caption() ?><?= $Page->PPSV->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PPSV->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PPSV">
<input type="<?= $Page->PPSV->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PPSV" name="x_PPSV" id="x_PPSV" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PPSV->getPlaceHolder()) ?>" value="<?= $Page->PPSV->EditValue ?>"<?= $Page->PPSV->editAttributes() ?> aria-describedby="x_PPSV_help">
<?= $Page->PPSV->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PPSV->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
    <div id="r_PPAPSMEAR" class="form-group row">
        <label id="elh_ivf_vitals_history_PPAPSMEAR" for="x_PPAPSMEAR" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PPAPSMEAR->caption() ?><?= $Page->PPAPSMEAR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PPAPSMEAR->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PPAPSMEAR">
<input type="<?= $Page->PPAPSMEAR->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PPAPSMEAR" name="x_PPAPSMEAR" id="x_PPAPSMEAR" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PPAPSMEAR->getPlaceHolder()) ?>" value="<?= $Page->PPAPSMEAR->EditValue ?>"<?= $Page->PPAPSMEAR->editAttributes() ?> aria-describedby="x_PPAPSMEAR_help">
<?= $Page->PPAPSMEAR->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PPAPSMEAR->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PTHYROID->Visible) { // PTHYROID ?>
    <div id="r_PTHYROID" class="form-group row">
        <label id="elh_ivf_vitals_history_PTHYROID" for="x_PTHYROID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PTHYROID->caption() ?><?= $Page->PTHYROID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PTHYROID->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PTHYROID">
<input type="<?= $Page->PTHYROID->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PTHYROID" name="x_PTHYROID" id="x_PTHYROID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PTHYROID->getPlaceHolder()) ?>" value="<?= $Page->PTHYROID->EditValue ?>"<?= $Page->PTHYROID->editAttributes() ?> aria-describedby="x_PTHYROID_help">
<?= $Page->PTHYROID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PTHYROID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MTHYROID->Visible) { // MTHYROID ?>
    <div id="r_MTHYROID" class="form-group row">
        <label id="elh_ivf_vitals_history_MTHYROID" for="x_MTHYROID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MTHYROID->caption() ?><?= $Page->MTHYROID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MTHYROID->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MTHYROID">
<input type="<?= $Page->MTHYROID->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_MTHYROID" name="x_MTHYROID" id="x_MTHYROID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MTHYROID->getPlaceHolder()) ?>" value="<?= $Page->MTHYROID->EditValue ?>"<?= $Page->MTHYROID->editAttributes() ?> aria-describedby="x_MTHYROID_help">
<?= $Page->MTHYROID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MTHYROID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SecSexCharacters->Visible) { // SecSexCharacters ?>
    <div id="r_SecSexCharacters" class="form-group row">
        <label id="elh_ivf_vitals_history_SecSexCharacters" for="x_SecSexCharacters" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SecSexCharacters->caption() ?><?= $Page->SecSexCharacters->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SecSexCharacters->cellAttributes() ?>>
<span id="el_ivf_vitals_history_SecSexCharacters">
<input type="<?= $Page->SecSexCharacters->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_SecSexCharacters" name="x_SecSexCharacters" id="x_SecSexCharacters" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SecSexCharacters->getPlaceHolder()) ?>" value="<?= $Page->SecSexCharacters->EditValue ?>"<?= $Page->SecSexCharacters->editAttributes() ?> aria-describedby="x_SecSexCharacters_help">
<?= $Page->SecSexCharacters->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SecSexCharacters->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PenisUM->Visible) { // PenisUM ?>
    <div id="r_PenisUM" class="form-group row">
        <label id="elh_ivf_vitals_history_PenisUM" for="x_PenisUM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PenisUM->caption() ?><?= $Page->PenisUM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PenisUM->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PenisUM">
<input type="<?= $Page->PenisUM->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PenisUM" name="x_PenisUM" id="x_PenisUM" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PenisUM->getPlaceHolder()) ?>" value="<?= $Page->PenisUM->EditValue ?>"<?= $Page->PenisUM->editAttributes() ?> aria-describedby="x_PenisUM_help">
<?= $Page->PenisUM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PenisUM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VAS->Visible) { // VAS ?>
    <div id="r_VAS" class="form-group row">
        <label id="elh_ivf_vitals_history_VAS" for="x_VAS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->VAS->caption() ?><?= $Page->VAS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VAS->cellAttributes() ?>>
<span id="el_ivf_vitals_history_VAS">
<input type="<?= $Page->VAS->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_VAS" name="x_VAS" id="x_VAS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VAS->getPlaceHolder()) ?>" value="<?= $Page->VAS->EditValue ?>"<?= $Page->VAS->editAttributes() ?> aria-describedby="x_VAS_help">
<?= $Page->VAS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->VAS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
    <div id="r_EPIDIDYMIS" class="form-group row">
        <label id="elh_ivf_vitals_history_EPIDIDYMIS" for="x_EPIDIDYMIS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EPIDIDYMIS->caption() ?><?= $Page->EPIDIDYMIS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EPIDIDYMIS->cellAttributes() ?>>
<span id="el_ivf_vitals_history_EPIDIDYMIS">
<input type="<?= $Page->EPIDIDYMIS->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_EPIDIDYMIS" name="x_EPIDIDYMIS" id="x_EPIDIDYMIS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EPIDIDYMIS->getPlaceHolder()) ?>" value="<?= $Page->EPIDIDYMIS->EditValue ?>"<?= $Page->EPIDIDYMIS->editAttributes() ?> aria-describedby="x_EPIDIDYMIS_help">
<?= $Page->EPIDIDYMIS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EPIDIDYMIS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Varicocele->Visible) { // Varicocele ?>
    <div id="r_Varicocele" class="form-group row">
        <label id="elh_ivf_vitals_history_Varicocele" for="x_Varicocele" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Varicocele->caption() ?><?= $Page->Varicocele->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Varicocele->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Varicocele">
<input type="<?= $Page->Varicocele->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Varicocele" name="x_Varicocele" id="x_Varicocele" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Varicocele->getPlaceHolder()) ?>" value="<?= $Page->Varicocele->EditValue ?>"<?= $Page->Varicocele->editAttributes() ?> aria-describedby="x_Varicocele_help">
<?= $Page->Varicocele->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Varicocele->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FertilityTreatmentHistory->Visible) { // FertilityTreatmentHistory ?>
    <div id="r_FertilityTreatmentHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_FertilityTreatmentHistory" for="x_FertilityTreatmentHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FertilityTreatmentHistory->caption() ?><?= $Page->FertilityTreatmentHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FertilityTreatmentHistory->cellAttributes() ?>>
<span id="el_ivf_vitals_history_FertilityTreatmentHistory">
<textarea data-table="ivf_vitals_history" data-field="x_FertilityTreatmentHistory" name="x_FertilityTreatmentHistory" id="x_FertilityTreatmentHistory" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->FertilityTreatmentHistory->getPlaceHolder()) ?>"<?= $Page->FertilityTreatmentHistory->editAttributes() ?> aria-describedby="x_FertilityTreatmentHistory_help"><?= $Page->FertilityTreatmentHistory->EditValue ?></textarea>
<?= $Page->FertilityTreatmentHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FertilityTreatmentHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SurgeryHistory->Visible) { // SurgeryHistory ?>
    <div id="r_SurgeryHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_SurgeryHistory" for="x_SurgeryHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SurgeryHistory->caption() ?><?= $Page->SurgeryHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SurgeryHistory->cellAttributes() ?>>
<span id="el_ivf_vitals_history_SurgeryHistory">
<textarea data-table="ivf_vitals_history" data-field="x_SurgeryHistory" name="x_SurgeryHistory" id="x_SurgeryHistory" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->SurgeryHistory->getPlaceHolder()) ?>"<?= $Page->SurgeryHistory->editAttributes() ?> aria-describedby="x_SurgeryHistory_help"><?= $Page->SurgeryHistory->EditValue ?></textarea>
<?= $Page->SurgeryHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SurgeryHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
    <div id="r_FamilyHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_FamilyHistory" for="x_FamilyHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FamilyHistory->caption() ?><?= $Page->FamilyHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FamilyHistory->cellAttributes() ?>>
<span id="el_ivf_vitals_history_FamilyHistory">
<input type="<?= $Page->FamilyHistory->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_FamilyHistory" name="x_FamilyHistory" id="x_FamilyHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FamilyHistory->getPlaceHolder()) ?>" value="<?= $Page->FamilyHistory->EditValue ?>"<?= $Page->FamilyHistory->editAttributes() ?> aria-describedby="x_FamilyHistory_help">
<?= $Page->FamilyHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FamilyHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PInvestigations->Visible) { // PInvestigations ?>
    <div id="r_PInvestigations" class="form-group row">
        <label id="elh_ivf_vitals_history_PInvestigations" for="x_PInvestigations" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PInvestigations->caption() ?><?= $Page->PInvestigations->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PInvestigations->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PInvestigations">
<textarea data-table="ivf_vitals_history" data-field="x_PInvestigations" name="x_PInvestigations" id="x_PInvestigations" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->PInvestigations->getPlaceHolder()) ?>"<?= $Page->PInvestigations->editAttributes() ?> aria-describedby="x_PInvestigations_help"><?= $Page->PInvestigations->EditValue ?></textarea>
<?= $Page->PInvestigations->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PInvestigations->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Addictions->Visible) { // Addictions ?>
    <div id="r_Addictions" class="form-group row">
        <label id="elh_ivf_vitals_history_Addictions" for="x_Addictions" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Addictions->caption() ?><?= $Page->Addictions->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Addictions->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Addictions">
<input type="<?= $Page->Addictions->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Addictions" name="x_Addictions" id="x_Addictions" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Addictions->getPlaceHolder()) ?>" value="<?= $Page->Addictions->EditValue ?>"<?= $Page->Addictions->editAttributes() ?> aria-describedby="x_Addictions_help">
<?= $Page->Addictions->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Addictions->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Medications->Visible) { // Medications ?>
    <div id="r_Medications" class="form-group row">
        <label id="elh_ivf_vitals_history_Medications" for="x_Medications" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Medications->caption() ?><?= $Page->Medications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Medications->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Medications">
<textarea data-table="ivf_vitals_history" data-field="x_Medications" name="x_Medications" id="x_Medications" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Medications->getPlaceHolder()) ?>"<?= $Page->Medications->editAttributes() ?> aria-describedby="x_Medications_help"><?= $Page->Medications->EditValue ?></textarea>
<?= $Page->Medications->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Medications->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Medical->Visible) { // Medical ?>
    <div id="r_Medical" class="form-group row">
        <label id="elh_ivf_vitals_history_Medical" for="x_Medical" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Medical->caption() ?><?= $Page->Medical->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Medical->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Medical">
<input type="<?= $Page->Medical->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Medical" name="x_Medical" id="x_Medical" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Medical->getPlaceHolder()) ?>" value="<?= $Page->Medical->EditValue ?>"<?= $Page->Medical->editAttributes() ?> aria-describedby="x_Medical_help">
<?= $Page->Medical->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Medical->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Surgical->Visible) { // Surgical ?>
    <div id="r_Surgical" class="form-group row">
        <label id="elh_ivf_vitals_history_Surgical" for="x_Surgical" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Surgical->caption() ?><?= $Page->Surgical->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Surgical->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Surgical">
<input type="<?= $Page->Surgical->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Surgical" name="x_Surgical" id="x_Surgical" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Surgical->getPlaceHolder()) ?>" value="<?= $Page->Surgical->EditValue ?>"<?= $Page->Surgical->editAttributes() ?> aria-describedby="x_Surgical_help">
<?= $Page->Surgical->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Surgical->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CoitalHistory->Visible) { // CoitalHistory ?>
    <div id="r_CoitalHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_CoitalHistory" for="x_CoitalHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CoitalHistory->caption() ?><?= $Page->CoitalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CoitalHistory->cellAttributes() ?>>
<span id="el_ivf_vitals_history_CoitalHistory">
<input type="<?= $Page->CoitalHistory->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_CoitalHistory" name="x_CoitalHistory" id="x_CoitalHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CoitalHistory->getPlaceHolder()) ?>" value="<?= $Page->CoitalHistory->EditValue ?>"<?= $Page->CoitalHistory->editAttributes() ?> aria-describedby="x_CoitalHistory_help">
<?= $Page->CoitalHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CoitalHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SemenAnalysis->Visible) { // SemenAnalysis ?>
    <div id="r_SemenAnalysis" class="form-group row">
        <label id="elh_ivf_vitals_history_SemenAnalysis" for="x_SemenAnalysis" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SemenAnalysis->caption() ?><?= $Page->SemenAnalysis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SemenAnalysis->cellAttributes() ?>>
<span id="el_ivf_vitals_history_SemenAnalysis">
<textarea data-table="ivf_vitals_history" data-field="x_SemenAnalysis" name="x_SemenAnalysis" id="x_SemenAnalysis" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->SemenAnalysis->getPlaceHolder()) ?>"<?= $Page->SemenAnalysis->editAttributes() ?> aria-describedby="x_SemenAnalysis_help"><?= $Page->SemenAnalysis->EditValue ?></textarea>
<?= $Page->SemenAnalysis->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SemenAnalysis->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MInsvestications->Visible) { // MInsvestications ?>
    <div id="r_MInsvestications" class="form-group row">
        <label id="elh_ivf_vitals_history_MInsvestications" for="x_MInsvestications" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MInsvestications->caption() ?><?= $Page->MInsvestications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MInsvestications->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MInsvestications">
<textarea data-table="ivf_vitals_history" data-field="x_MInsvestications" name="x_MInsvestications" id="x_MInsvestications" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->MInsvestications->getPlaceHolder()) ?>"<?= $Page->MInsvestications->editAttributes() ?> aria-describedby="x_MInsvestications_help"><?= $Page->MInsvestications->EditValue ?></textarea>
<?= $Page->MInsvestications->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MInsvestications->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PImpression->Visible) { // PImpression ?>
    <div id="r_PImpression" class="form-group row">
        <label id="elh_ivf_vitals_history_PImpression" for="x_PImpression" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PImpression->caption() ?><?= $Page->PImpression->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PImpression->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PImpression">
<textarea data-table="ivf_vitals_history" data-field="x_PImpression" name="x_PImpression" id="x_PImpression" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->PImpression->getPlaceHolder()) ?>"<?= $Page->PImpression->editAttributes() ?> aria-describedby="x_PImpression_help"><?= $Page->PImpression->EditValue ?></textarea>
<?= $Page->PImpression->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PImpression->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MIMpression->Visible) { // MIMpression ?>
    <div id="r_MIMpression" class="form-group row">
        <label id="elh_ivf_vitals_history_MIMpression" for="x_MIMpression" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MIMpression->caption() ?><?= $Page->MIMpression->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MIMpression->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MIMpression">
<textarea data-table="ivf_vitals_history" data-field="x_MIMpression" name="x_MIMpression" id="x_MIMpression" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->MIMpression->getPlaceHolder()) ?>"<?= $Page->MIMpression->editAttributes() ?> aria-describedby="x_MIMpression_help"><?= $Page->MIMpression->EditValue ?></textarea>
<?= $Page->MIMpression->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MIMpression->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PPlanOfManagement->Visible) { // PPlanOfManagement ?>
    <div id="r_PPlanOfManagement" class="form-group row">
        <label id="elh_ivf_vitals_history_PPlanOfManagement" for="x_PPlanOfManagement" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PPlanOfManagement->caption() ?><?= $Page->PPlanOfManagement->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PPlanOfManagement->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PPlanOfManagement">
<textarea data-table="ivf_vitals_history" data-field="x_PPlanOfManagement" name="x_PPlanOfManagement" id="x_PPlanOfManagement" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->PPlanOfManagement->getPlaceHolder()) ?>"<?= $Page->PPlanOfManagement->editAttributes() ?> aria-describedby="x_PPlanOfManagement_help"><?= $Page->PPlanOfManagement->EditValue ?></textarea>
<?= $Page->PPlanOfManagement->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PPlanOfManagement->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MPlanOfManagement->Visible) { // MPlanOfManagement ?>
    <div id="r_MPlanOfManagement" class="form-group row">
        <label id="elh_ivf_vitals_history_MPlanOfManagement" for="x_MPlanOfManagement" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MPlanOfManagement->caption() ?><?= $Page->MPlanOfManagement->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MPlanOfManagement->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MPlanOfManagement">
<textarea data-table="ivf_vitals_history" data-field="x_MPlanOfManagement" name="x_MPlanOfManagement" id="x_MPlanOfManagement" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->MPlanOfManagement->getPlaceHolder()) ?>"<?= $Page->MPlanOfManagement->editAttributes() ?> aria-describedby="x_MPlanOfManagement_help"><?= $Page->MPlanOfManagement->EditValue ?></textarea>
<?= $Page->MPlanOfManagement->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MPlanOfManagement->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PReadMore->Visible) { // PReadMore ?>
    <div id="r_PReadMore" class="form-group row">
        <label id="elh_ivf_vitals_history_PReadMore" for="x_PReadMore" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PReadMore->caption() ?><?= $Page->PReadMore->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PReadMore->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PReadMore">
<textarea data-table="ivf_vitals_history" data-field="x_PReadMore" name="x_PReadMore" id="x_PReadMore" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->PReadMore->getPlaceHolder()) ?>"<?= $Page->PReadMore->editAttributes() ?> aria-describedby="x_PReadMore_help"><?= $Page->PReadMore->EditValue ?></textarea>
<?= $Page->PReadMore->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PReadMore->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MReadMore->Visible) { // MReadMore ?>
    <div id="r_MReadMore" class="form-group row">
        <label id="elh_ivf_vitals_history_MReadMore" for="x_MReadMore" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MReadMore->caption() ?><?= $Page->MReadMore->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MReadMore->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MReadMore">
<textarea data-table="ivf_vitals_history" data-field="x_MReadMore" name="x_MReadMore" id="x_MReadMore" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->MReadMore->getPlaceHolder()) ?>"<?= $Page->MReadMore->editAttributes() ?> aria-describedby="x_MReadMore_help"><?= $Page->MReadMore->EditValue ?></textarea>
<?= $Page->MReadMore->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MReadMore->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MariedFor->Visible) { // MariedFor ?>
    <div id="r_MariedFor" class="form-group row">
        <label id="elh_ivf_vitals_history_MariedFor" for="x_MariedFor" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MariedFor->caption() ?><?= $Page->MariedFor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MariedFor->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MariedFor">
<input type="<?= $Page->MariedFor->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_MariedFor" name="x_MariedFor" id="x_MariedFor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MariedFor->getPlaceHolder()) ?>" value="<?= $Page->MariedFor->EditValue ?>"<?= $Page->MariedFor->editAttributes() ?> aria-describedby="x_MariedFor_help">
<?= $Page->MariedFor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MariedFor->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CMNCM->Visible) { // CMNCM ?>
    <div id="r_CMNCM" class="form-group row">
        <label id="elh_ivf_vitals_history_CMNCM" for="x_CMNCM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CMNCM->caption() ?><?= $Page->CMNCM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CMNCM->cellAttributes() ?>>
<span id="el_ivf_vitals_history_CMNCM">
<input type="<?= $Page->CMNCM->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_CMNCM" name="x_CMNCM" id="x_CMNCM" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CMNCM->getPlaceHolder()) ?>" value="<?= $Page->CMNCM->EditValue ?>"<?= $Page->CMNCM->editAttributes() ?> aria-describedby="x_CMNCM_help">
<?= $Page->CMNCM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CMNCM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_vitals_history_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_vitals_history_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pFamilyHistory->Visible) { // pFamilyHistory ?>
    <div id="r_pFamilyHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_pFamilyHistory" for="x_pFamilyHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pFamilyHistory->caption() ?><?= $Page->pFamilyHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pFamilyHistory->cellAttributes() ?>>
<span id="el_ivf_vitals_history_pFamilyHistory">
<input type="<?= $Page->pFamilyHistory->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_pFamilyHistory" name="x_pFamilyHistory" id="x_pFamilyHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pFamilyHistory->getPlaceHolder()) ?>" value="<?= $Page->pFamilyHistory->EditValue ?>"<?= $Page->pFamilyHistory->editAttributes() ?> aria-describedby="x_pFamilyHistory_help">
<?= $Page->pFamilyHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pFamilyHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pTemplateMedications->Visible) { // pTemplateMedications ?>
    <div id="r_pTemplateMedications" class="form-group row">
        <label id="elh_ivf_vitals_history_pTemplateMedications" for="x_pTemplateMedications" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pTemplateMedications->caption() ?><?= $Page->pTemplateMedications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pTemplateMedications->cellAttributes() ?>>
<span id="el_ivf_vitals_history_pTemplateMedications">
<textarea data-table="ivf_vitals_history" data-field="x_pTemplateMedications" name="x_pTemplateMedications" id="x_pTemplateMedications" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->pTemplateMedications->getPlaceHolder()) ?>"<?= $Page->pTemplateMedications->editAttributes() ?> aria-describedby="x_pTemplateMedications_help"><?= $Page->pTemplateMedications->EditValue ?></textarea>
<?= $Page->pTemplateMedications->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pTemplateMedications->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
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
    ew.addEventHandlers("ivf_vitals_history");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

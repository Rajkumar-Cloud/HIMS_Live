<?php

namespace PHPMaker2021\HIMS;

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
    var currentTable = <?= JsonEncode(GetClientVar("tables", "ivf_vitals_history")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.ivf_vitals_history)
        ew.vars.tables.ivf_vitals_history = currentTable;
    fivf_vitals_historyedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["RIDNO", [fields.RIDNO.visible && fields.RIDNO.required ? ew.Validators.required(fields.RIDNO.caption) : null, ew.Validators.integer], fields.RIDNO.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["SEX", [fields.SEX.visible && fields.SEX.required ? ew.Validators.required(fields.SEX.caption) : null], fields.SEX.isInvalid],
        ["Religion", [fields.Religion.visible && fields.Religion.required ? ew.Validators.required(fields.Religion.caption) : null], fields.Religion.isInvalid],
        ["Address", [fields.Address.visible && fields.Address.required ? ew.Validators.required(fields.Address.caption) : null], fields.Address.isInvalid],
        ["IdentificationMark", [fields.IdentificationMark.visible && fields.IdentificationMark.required ? ew.Validators.required(fields.IdentificationMark.caption) : null], fields.IdentificationMark.isInvalid],
        ["DoublewitnessName1", [fields.DoublewitnessName1.visible && fields.DoublewitnessName1.required ? ew.Validators.required(fields.DoublewitnessName1.caption) : null], fields.DoublewitnessName1.isInvalid],
        ["DoublewitnessName2", [fields.DoublewitnessName2.visible && fields.DoublewitnessName2.required ? ew.Validators.required(fields.DoublewitnessName2.caption) : null], fields.DoublewitnessName2.isInvalid],
        ["Chiefcomplaints", [fields.Chiefcomplaints.visible && fields.Chiefcomplaints.required ? ew.Validators.required(fields.Chiefcomplaints.caption) : null], fields.Chiefcomplaints.isInvalid],
        ["MenstrualHistory", [fields.MenstrualHistory.visible && fields.MenstrualHistory.required ? ew.Validators.required(fields.MenstrualHistory.caption) : null], fields.MenstrualHistory.isInvalid],
        ["ObstetricHistory", [fields.ObstetricHistory.visible && fields.ObstetricHistory.required ? ew.Validators.required(fields.ObstetricHistory.caption) : null], fields.ObstetricHistory.isInvalid],
        ["MedicalHistory", [fields.MedicalHistory.visible && fields.MedicalHistory.required ? ew.Validators.required(fields.MedicalHistory.caption) : null], fields.MedicalHistory.isInvalid],
        ["SurgicalHistory", [fields.SurgicalHistory.visible && fields.SurgicalHistory.required ? ew.Validators.required(fields.SurgicalHistory.caption) : null], fields.SurgicalHistory.isInvalid],
        ["Generalexaminationpallor", [fields.Generalexaminationpallor.visible && fields.Generalexaminationpallor.required ? ew.Validators.required(fields.Generalexaminationpallor.caption) : null], fields.Generalexaminationpallor.isInvalid],
        ["PR", [fields.PR.visible && fields.PR.required ? ew.Validators.required(fields.PR.caption) : null], fields.PR.isInvalid],
        ["CVS", [fields.CVS.visible && fields.CVS.required ? ew.Validators.required(fields.CVS.caption) : null], fields.CVS.isInvalid],
        ["PA", [fields.PA.visible && fields.PA.required ? ew.Validators.required(fields.PA.caption) : null], fields.PA.isInvalid],
        ["PROVISIONALDIAGNOSIS", [fields.PROVISIONALDIAGNOSIS.visible && fields.PROVISIONALDIAGNOSIS.required ? ew.Validators.required(fields.PROVISIONALDIAGNOSIS.caption) : null], fields.PROVISIONALDIAGNOSIS.isInvalid],
        ["Investigations", [fields.Investigations.visible && fields.Investigations.required ? ew.Validators.required(fields.Investigations.caption) : null], fields.Investigations.isInvalid],
        ["Fheight", [fields.Fheight.visible && fields.Fheight.required ? ew.Validators.required(fields.Fheight.caption) : null], fields.Fheight.isInvalid],
        ["Fweight", [fields.Fweight.visible && fields.Fweight.required ? ew.Validators.required(fields.Fweight.caption) : null], fields.Fweight.isInvalid],
        ["FBMI", [fields.FBMI.visible && fields.FBMI.required ? ew.Validators.required(fields.FBMI.caption) : null], fields.FBMI.isInvalid],
        ["FBloodgroup", [fields.FBloodgroup.visible && fields.FBloodgroup.required ? ew.Validators.required(fields.FBloodgroup.caption) : null], fields.FBloodgroup.isInvalid],
        ["Mheight", [fields.Mheight.visible && fields.Mheight.required ? ew.Validators.required(fields.Mheight.caption) : null], fields.Mheight.isInvalid],
        ["Mweight", [fields.Mweight.visible && fields.Mweight.required ? ew.Validators.required(fields.Mweight.caption) : null], fields.Mweight.isInvalid],
        ["MBMI", [fields.MBMI.visible && fields.MBMI.required ? ew.Validators.required(fields.MBMI.caption) : null], fields.MBMI.isInvalid],
        ["MBloodgroup", [fields.MBloodgroup.visible && fields.MBloodgroup.required ? ew.Validators.required(fields.MBloodgroup.caption) : null], fields.MBloodgroup.isInvalid],
        ["FBuild", [fields.FBuild.visible && fields.FBuild.required ? ew.Validators.required(fields.FBuild.caption) : null], fields.FBuild.isInvalid],
        ["MBuild", [fields.MBuild.visible && fields.MBuild.required ? ew.Validators.required(fields.MBuild.caption) : null], fields.MBuild.isInvalid],
        ["FSkinColor", [fields.FSkinColor.visible && fields.FSkinColor.required ? ew.Validators.required(fields.FSkinColor.caption) : null], fields.FSkinColor.isInvalid],
        ["MSkinColor", [fields.MSkinColor.visible && fields.MSkinColor.required ? ew.Validators.required(fields.MSkinColor.caption) : null], fields.MSkinColor.isInvalid],
        ["FEyesColor", [fields.FEyesColor.visible && fields.FEyesColor.required ? ew.Validators.required(fields.FEyesColor.caption) : null], fields.FEyesColor.isInvalid],
        ["MEyesColor", [fields.MEyesColor.visible && fields.MEyesColor.required ? ew.Validators.required(fields.MEyesColor.caption) : null], fields.MEyesColor.isInvalid],
        ["FHairColor", [fields.FHairColor.visible && fields.FHairColor.required ? ew.Validators.required(fields.FHairColor.caption) : null], fields.FHairColor.isInvalid],
        ["MhairColor", [fields.MhairColor.visible && fields.MhairColor.required ? ew.Validators.required(fields.MhairColor.caption) : null], fields.MhairColor.isInvalid],
        ["FhairTexture", [fields.FhairTexture.visible && fields.FhairTexture.required ? ew.Validators.required(fields.FhairTexture.caption) : null], fields.FhairTexture.isInvalid],
        ["MHairTexture", [fields.MHairTexture.visible && fields.MHairTexture.required ? ew.Validators.required(fields.MHairTexture.caption) : null], fields.MHairTexture.isInvalid],
        ["Fothers", [fields.Fothers.visible && fields.Fothers.required ? ew.Validators.required(fields.Fothers.caption) : null], fields.Fothers.isInvalid],
        ["Mothers", [fields.Mothers.visible && fields.Mothers.required ? ew.Validators.required(fields.Mothers.caption) : null], fields.Mothers.isInvalid],
        ["PGE", [fields.PGE.visible && fields.PGE.required ? ew.Validators.required(fields.PGE.caption) : null], fields.PGE.isInvalid],
        ["PPR", [fields.PPR.visible && fields.PPR.required ? ew.Validators.required(fields.PPR.caption) : null], fields.PPR.isInvalid],
        ["PBP", [fields.PBP.visible && fields.PBP.required ? ew.Validators.required(fields.PBP.caption) : null], fields.PBP.isInvalid],
        ["Breast", [fields.Breast.visible && fields.Breast.required ? ew.Validators.required(fields.Breast.caption) : null], fields.Breast.isInvalid],
        ["PPA", [fields.PPA.visible && fields.PPA.required ? ew.Validators.required(fields.PPA.caption) : null], fields.PPA.isInvalid],
        ["PPSV", [fields.PPSV.visible && fields.PPSV.required ? ew.Validators.required(fields.PPSV.caption) : null], fields.PPSV.isInvalid],
        ["PPAPSMEAR", [fields.PPAPSMEAR.visible && fields.PPAPSMEAR.required ? ew.Validators.required(fields.PPAPSMEAR.caption) : null], fields.PPAPSMEAR.isInvalid],
        ["PTHYROID", [fields.PTHYROID.visible && fields.PTHYROID.required ? ew.Validators.required(fields.PTHYROID.caption) : null], fields.PTHYROID.isInvalid],
        ["MTHYROID", [fields.MTHYROID.visible && fields.MTHYROID.required ? ew.Validators.required(fields.MTHYROID.caption) : null], fields.MTHYROID.isInvalid],
        ["SecSexCharacters", [fields.SecSexCharacters.visible && fields.SecSexCharacters.required ? ew.Validators.required(fields.SecSexCharacters.caption) : null], fields.SecSexCharacters.isInvalid],
        ["PenisUM", [fields.PenisUM.visible && fields.PenisUM.required ? ew.Validators.required(fields.PenisUM.caption) : null], fields.PenisUM.isInvalid],
        ["VAS", [fields.VAS.visible && fields.VAS.required ? ew.Validators.required(fields.VAS.caption) : null], fields.VAS.isInvalid],
        ["EPIDIDYMIS", [fields.EPIDIDYMIS.visible && fields.EPIDIDYMIS.required ? ew.Validators.required(fields.EPIDIDYMIS.caption) : null], fields.EPIDIDYMIS.isInvalid],
        ["Varicocele", [fields.Varicocele.visible && fields.Varicocele.required ? ew.Validators.required(fields.Varicocele.caption) : null], fields.Varicocele.isInvalid],
        ["FertilityTreatmentHistory", [fields.FertilityTreatmentHistory.visible && fields.FertilityTreatmentHistory.required ? ew.Validators.required(fields.FertilityTreatmentHistory.caption) : null], fields.FertilityTreatmentHistory.isInvalid],
        ["SurgeryHistory", [fields.SurgeryHistory.visible && fields.SurgeryHistory.required ? ew.Validators.required(fields.SurgeryHistory.caption) : null], fields.SurgeryHistory.isInvalid],
        ["FamilyHistory", [fields.FamilyHistory.visible && fields.FamilyHistory.required ? ew.Validators.required(fields.FamilyHistory.caption) : null], fields.FamilyHistory.isInvalid],
        ["PInvestigations", [fields.PInvestigations.visible && fields.PInvestigations.required ? ew.Validators.required(fields.PInvestigations.caption) : null], fields.PInvestigations.isInvalid],
        ["Addictions", [fields.Addictions.visible && fields.Addictions.required ? ew.Validators.required(fields.Addictions.caption) : null], fields.Addictions.isInvalid],
        ["Medications", [fields.Medications.visible && fields.Medications.required ? ew.Validators.required(fields.Medications.caption) : null], fields.Medications.isInvalid],
        ["Medical", [fields.Medical.visible && fields.Medical.required ? ew.Validators.required(fields.Medical.caption) : null], fields.Medical.isInvalid],
        ["Surgical", [fields.Surgical.visible && fields.Surgical.required ? ew.Validators.required(fields.Surgical.caption) : null], fields.Surgical.isInvalid],
        ["CoitalHistory", [fields.CoitalHistory.visible && fields.CoitalHistory.required ? ew.Validators.required(fields.CoitalHistory.caption) : null], fields.CoitalHistory.isInvalid],
        ["SemenAnalysis", [fields.SemenAnalysis.visible && fields.SemenAnalysis.required ? ew.Validators.required(fields.SemenAnalysis.caption) : null], fields.SemenAnalysis.isInvalid],
        ["MInsvestications", [fields.MInsvestications.visible && fields.MInsvestications.required ? ew.Validators.required(fields.MInsvestications.caption) : null], fields.MInsvestications.isInvalid],
        ["PImpression", [fields.PImpression.visible && fields.PImpression.required ? ew.Validators.required(fields.PImpression.caption) : null], fields.PImpression.isInvalid],
        ["MIMpression", [fields.MIMpression.visible && fields.MIMpression.required ? ew.Validators.required(fields.MIMpression.caption) : null], fields.MIMpression.isInvalid],
        ["PPlanOfManagement", [fields.PPlanOfManagement.visible && fields.PPlanOfManagement.required ? ew.Validators.required(fields.PPlanOfManagement.caption) : null], fields.PPlanOfManagement.isInvalid],
        ["MPlanOfManagement", [fields.MPlanOfManagement.visible && fields.MPlanOfManagement.required ? ew.Validators.required(fields.MPlanOfManagement.caption) : null], fields.MPlanOfManagement.isInvalid],
        ["PReadMore", [fields.PReadMore.visible && fields.PReadMore.required ? ew.Validators.required(fields.PReadMore.caption) : null], fields.PReadMore.isInvalid],
        ["MReadMore", [fields.MReadMore.visible && fields.MReadMore.required ? ew.Validators.required(fields.MReadMore.caption) : null], fields.MReadMore.isInvalid],
        ["MariedFor", [fields.MariedFor.visible && fields.MariedFor.required ? ew.Validators.required(fields.MariedFor.caption) : null], fields.MariedFor.isInvalid],
        ["CMNCM", [fields.CMNCM.visible && fields.CMNCM.required ? ew.Validators.required(fields.CMNCM.caption) : null], fields.CMNCM.isInvalid],
        ["TemplateMenstrualHistory", [fields.TemplateMenstrualHistory.visible && fields.TemplateMenstrualHistory.required ? ew.Validators.required(fields.TemplateMenstrualHistory.caption) : null], fields.TemplateMenstrualHistory.isInvalid],
        ["TemplateObstetricHistory", [fields.TemplateObstetricHistory.visible && fields.TemplateObstetricHistory.required ? ew.Validators.required(fields.TemplateObstetricHistory.caption) : null], fields.TemplateObstetricHistory.isInvalid],
        ["TemplateFertilityTreatmentHistory", [fields.TemplateFertilityTreatmentHistory.visible && fields.TemplateFertilityTreatmentHistory.required ? ew.Validators.required(fields.TemplateFertilityTreatmentHistory.caption) : null], fields.TemplateFertilityTreatmentHistory.isInvalid],
        ["TemplateSurgeryHistory", [fields.TemplateSurgeryHistory.visible && fields.TemplateSurgeryHistory.required ? ew.Validators.required(fields.TemplateSurgeryHistory.caption) : null], fields.TemplateSurgeryHistory.isInvalid],
        ["TemplateFInvestigations", [fields.TemplateFInvestigations.visible && fields.TemplateFInvestigations.required ? ew.Validators.required(fields.TemplateFInvestigations.caption) : null], fields.TemplateFInvestigations.isInvalid],
        ["TemplatePlanOfManagement", [fields.TemplatePlanOfManagement.visible && fields.TemplatePlanOfManagement.required ? ew.Validators.required(fields.TemplatePlanOfManagement.caption) : null], fields.TemplatePlanOfManagement.isInvalid],
        ["TemplatePImpression", [fields.TemplatePImpression.visible && fields.TemplatePImpression.required ? ew.Validators.required(fields.TemplatePImpression.caption) : null], fields.TemplatePImpression.isInvalid],
        ["TemplateMedications", [fields.TemplateMedications.visible && fields.TemplateMedications.required ? ew.Validators.required(fields.TemplateMedications.caption) : null], fields.TemplateMedications.isInvalid],
        ["TemplateSemenAnalysis", [fields.TemplateSemenAnalysis.visible && fields.TemplateSemenAnalysis.required ? ew.Validators.required(fields.TemplateSemenAnalysis.caption) : null], fields.TemplateSemenAnalysis.isInvalid],
        ["MaleInsvestications", [fields.MaleInsvestications.visible && fields.MaleInsvestications.required ? ew.Validators.required(fields.MaleInsvestications.caption) : null], fields.MaleInsvestications.isInvalid],
        ["TemplateMIMpression", [fields.TemplateMIMpression.visible && fields.TemplateMIMpression.required ? ew.Validators.required(fields.TemplateMIMpression.caption) : null], fields.TemplateMIMpression.isInvalid],
        ["TemplateMalePlanOfManagement", [fields.TemplateMalePlanOfManagement.visible && fields.TemplateMalePlanOfManagement.required ? ew.Validators.required(fields.TemplateMalePlanOfManagement.caption) : null], fields.TemplateMalePlanOfManagement.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["pFamilyHistory", [fields.pFamilyHistory.visible && fields.pFamilyHistory.required ? ew.Validators.required(fields.pFamilyHistory.caption) : null], fields.pFamilyHistory.isInvalid],
        ["pTemplateMedications", [fields.pTemplateMedications.visible && fields.pTemplateMedications.required ? ew.Validators.required(fields.pTemplateMedications.caption) : null], fields.pTemplateMedications.isInvalid],
        ["AntiTPO", [fields.AntiTPO.visible && fields.AntiTPO.required ? ew.Validators.required(fields.AntiTPO.caption) : null], fields.AntiTPO.isInvalid],
        ["AntiTG", [fields.AntiTG.visible && fields.AntiTG.required ? ew.Validators.required(fields.AntiTG.caption) : null], fields.AntiTG.isInvalid]
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
    fivf_vitals_historyedit.lists.MedicalHistory = <?= $Page->MedicalHistory->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.FBloodgroup = <?= $Page->FBloodgroup->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.MBloodgroup = <?= $Page->MBloodgroup->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.FBuild = <?= $Page->FBuild->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.MBuild = <?= $Page->MBuild->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.FSkinColor = <?= $Page->FSkinColor->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.MSkinColor = <?= $Page->MSkinColor->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.FEyesColor = <?= $Page->FEyesColor->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.MEyesColor = <?= $Page->MEyesColor->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.FHairColor = <?= $Page->FHairColor->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.MhairColor = <?= $Page->MhairColor->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.FhairTexture = <?= $Page->FhairTexture->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.MHairTexture = <?= $Page->MHairTexture->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.FamilyHistory = <?= $Page->FamilyHistory->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.Addictions = <?= $Page->Addictions->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.Medical = <?= $Page->Medical->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.Surgical = <?= $Page->Surgical->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.CoitalHistory = <?= $Page->CoitalHistory->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.TemplateMenstrualHistory = <?= $Page->TemplateMenstrualHistory->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.TemplateObstetricHistory = <?= $Page->TemplateObstetricHistory->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.TemplateFertilityTreatmentHistory = <?= $Page->TemplateFertilityTreatmentHistory->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.TemplateSurgeryHistory = <?= $Page->TemplateSurgeryHistory->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.TemplateFInvestigations = <?= $Page->TemplateFInvestigations->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.TemplatePlanOfManagement = <?= $Page->TemplatePlanOfManagement->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.TemplatePImpression = <?= $Page->TemplatePImpression->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.TemplateMedications = <?= $Page->TemplateMedications->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.TemplateSemenAnalysis = <?= $Page->TemplateSemenAnalysis->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.MaleInsvestications = <?= $Page->MaleInsvestications->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.TemplateMIMpression = <?= $Page->TemplateMIMpression->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.TemplateMalePlanOfManagement = <?= $Page->TemplateMalePlanOfManagement->toClientList($Page) ?>;
    fivf_vitals_historyedit.lists.pFamilyHistory = <?= $Page->pFamilyHistory->toClientList($Page) ?>;
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
<form name="fivf_vitals_historyedit" id="fivf_vitals_historyedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_vitals_history">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_ivf_vitals_history_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_id"><span id="el_ivf_vitals_history_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="ivf_vitals_history" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <div id="r_RIDNO" class="form-group row">
        <label id="elh_ivf_vitals_history_RIDNO" for="x_RIDNO" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_RIDNO"><?= $Page->RIDNO->caption() ?><?= $Page->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNO->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_RIDNO"><span id="el_ivf_vitals_history_RIDNO">
<input type="<?= $Page->RIDNO->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?= HtmlEncode($Page->RIDNO->getPlaceHolder()) ?>" value="<?= $Page->RIDNO->EditValue ?>"<?= $Page->RIDNO->editAttributes() ?> aria-describedby="x_RIDNO_help">
<?= $Page->RIDNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNO->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <div id="r_Name" class="form-group row">
        <label id="elh_ivf_vitals_history_Name" for="x_Name" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_Name"><?= $Page->Name->caption() ?><?= $Page->Name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Name->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_Name"><span id="el_ivf_vitals_history_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Name" name="x_Name" id="x_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?> aria-describedby="x_Name_help">
<?= $Page->Name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_ivf_vitals_history_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_Age"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_Age"><span id="el_ivf_vitals_history_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SEX->Visible) { // SEX ?>
    <div id="r_SEX" class="form-group row">
        <label id="elh_ivf_vitals_history_SEX" for="x_SEX" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_SEX"><?= $Page->SEX->caption() ?><?= $Page->SEX->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SEX->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_SEX"><span id="el_ivf_vitals_history_SEX">
<input type="<?= $Page->SEX->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_SEX" name="x_SEX" id="x_SEX" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SEX->getPlaceHolder()) ?>" value="<?= $Page->SEX->EditValue ?>"<?= $Page->SEX->editAttributes() ?> aria-describedby="x_SEX_help">
<?= $Page->SEX->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SEX->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Religion->Visible) { // Religion ?>
    <div id="r_Religion" class="form-group row">
        <label id="elh_ivf_vitals_history_Religion" for="x_Religion" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_Religion"><?= $Page->Religion->caption() ?><?= $Page->Religion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Religion->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_Religion"><span id="el_ivf_vitals_history_Religion">
<input type="<?= $Page->Religion->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Religion" name="x_Religion" id="x_Religion" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Religion->getPlaceHolder()) ?>" value="<?= $Page->Religion->EditValue ?>"<?= $Page->Religion->editAttributes() ?> aria-describedby="x_Religion_help">
<?= $Page->Religion->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Religion->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Address->Visible) { // Address ?>
    <div id="r_Address" class="form-group row">
        <label id="elh_ivf_vitals_history_Address" for="x_Address" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_Address"><?= $Page->Address->caption() ?><?= $Page->Address->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Address->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_Address"><span id="el_ivf_vitals_history_Address">
<input type="<?= $Page->Address->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Address" name="x_Address" id="x_Address" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Address->getPlaceHolder()) ?>" value="<?= $Page->Address->EditValue ?>"<?= $Page->Address->editAttributes() ?> aria-describedby="x_Address_help">
<?= $Page->Address->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Address->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
    <div id="r_IdentificationMark" class="form-group row">
        <label id="elh_ivf_vitals_history_IdentificationMark" for="x_IdentificationMark" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_IdentificationMark"><?= $Page->IdentificationMark->caption() ?><?= $Page->IdentificationMark->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IdentificationMark->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_IdentificationMark"><span id="el_ivf_vitals_history_IdentificationMark">
<input type="<?= $Page->IdentificationMark->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_IdentificationMark" name="x_IdentificationMark" id="x_IdentificationMark" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IdentificationMark->getPlaceHolder()) ?>" value="<?= $Page->IdentificationMark->EditValue ?>"<?= $Page->IdentificationMark->editAttributes() ?> aria-describedby="x_IdentificationMark_help">
<?= $Page->IdentificationMark->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IdentificationMark->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
    <div id="r_DoublewitnessName1" class="form-group row">
        <label id="elh_ivf_vitals_history_DoublewitnessName1" for="x_DoublewitnessName1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_DoublewitnessName1"><?= $Page->DoublewitnessName1->caption() ?><?= $Page->DoublewitnessName1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DoublewitnessName1->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_DoublewitnessName1"><span id="el_ivf_vitals_history_DoublewitnessName1">
<textarea data-table="ivf_vitals_history" data-field="x_DoublewitnessName1" name="x_DoublewitnessName1" id="x_DoublewitnessName1" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->DoublewitnessName1->getPlaceHolder()) ?>"<?= $Page->DoublewitnessName1->editAttributes() ?> aria-describedby="x_DoublewitnessName1_help"><?= $Page->DoublewitnessName1->EditValue ?></textarea>
<?= $Page->DoublewitnessName1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DoublewitnessName1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
    <div id="r_DoublewitnessName2" class="form-group row">
        <label id="elh_ivf_vitals_history_DoublewitnessName2" for="x_DoublewitnessName2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_DoublewitnessName2"><?= $Page->DoublewitnessName2->caption() ?><?= $Page->DoublewitnessName2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DoublewitnessName2->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_DoublewitnessName2"><span id="el_ivf_vitals_history_DoublewitnessName2">
<textarea data-table="ivf_vitals_history" data-field="x_DoublewitnessName2" name="x_DoublewitnessName2" id="x_DoublewitnessName2" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->DoublewitnessName2->getPlaceHolder()) ?>"<?= $Page->DoublewitnessName2->editAttributes() ?> aria-describedby="x_DoublewitnessName2_help"><?= $Page->DoublewitnessName2->EditValue ?></textarea>
<?= $Page->DoublewitnessName2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DoublewitnessName2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
    <div id="r_Chiefcomplaints" class="form-group row">
        <label id="elh_ivf_vitals_history_Chiefcomplaints" for="x_Chiefcomplaints" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_Chiefcomplaints"><?= $Page->Chiefcomplaints->caption() ?><?= $Page->Chiefcomplaints->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Chiefcomplaints->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_Chiefcomplaints"><span id="el_ivf_vitals_history_Chiefcomplaints">
<textarea data-table="ivf_vitals_history" data-field="x_Chiefcomplaints" name="x_Chiefcomplaints" id="x_Chiefcomplaints" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Chiefcomplaints->getPlaceHolder()) ?>"<?= $Page->Chiefcomplaints->editAttributes() ?> aria-describedby="x_Chiefcomplaints_help"><?= $Page->Chiefcomplaints->EditValue ?></textarea>
<?= $Page->Chiefcomplaints->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Chiefcomplaints->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
    <div id="r_MenstrualHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_MenstrualHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_MenstrualHistory"><?= $Page->MenstrualHistory->caption() ?><?= $Page->MenstrualHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MenstrualHistory->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_MenstrualHistory"><span id="el_ivf_vitals_history_MenstrualHistory">
<?php $Page->MenstrualHistory->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_MenstrualHistory" name="x_MenstrualHistory" id="x_MenstrualHistory" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->MenstrualHistory->getPlaceHolder()) ?>"<?= $Page->MenstrualHistory->editAttributes() ?> aria-describedby="x_MenstrualHistory_help"><?= $Page->MenstrualHistory->EditValue ?></textarea>
<?= $Page->MenstrualHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MenstrualHistory->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_vitals_historyedit", "editor"], function() {
	ew.createEditor("fivf_vitals_historyedit", "x_MenstrualHistory", 0, 0, <?= $Page->MenstrualHistory->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ObstetricHistory->Visible) { // ObstetricHistory ?>
    <div id="r_ObstetricHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_ObstetricHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_ObstetricHistory"><?= $Page->ObstetricHistory->caption() ?><?= $Page->ObstetricHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ObstetricHistory->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_ObstetricHistory"><span id="el_ivf_vitals_history_ObstetricHistory">
<?php $Page->ObstetricHistory->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_ObstetricHistory" name="x_ObstetricHistory" id="x_ObstetricHistory" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->ObstetricHistory->getPlaceHolder()) ?>"<?= $Page->ObstetricHistory->editAttributes() ?> aria-describedby="x_ObstetricHistory_help"><?= $Page->ObstetricHistory->EditValue ?></textarea>
<?= $Page->ObstetricHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ObstetricHistory->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_vitals_historyedit", "editor"], function() {
	ew.createEditor("fivf_vitals_historyedit", "x_ObstetricHistory", 0, 0, <?= $Page->ObstetricHistory->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MedicalHistory->Visible) { // MedicalHistory ?>
    <div id="r_MedicalHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_MedicalHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_MedicalHistory"><?= $Page->MedicalHistory->caption() ?><?= $Page->MedicalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MedicalHistory->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_MedicalHistory"><span id="el_ivf_vitals_history_MedicalHistory">
    <select
        id="x_MedicalHistory[]"
        name="x_MedicalHistory[]"
        class="form-control ew-select<?= $Page->MedicalHistory->isInvalidClass() ?>"
        data-select2-id="ivf_vitals_history_x_MedicalHistory[]"
        data-table="ivf_vitals_history"
        data-field="x_MedicalHistory"
        data-dropdown
        multiple
        size="1"
        data-value-separator="<?= $Page->MedicalHistory->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->MedicalHistory->getPlaceHolder()) ?>"
        <?= $Page->MedicalHistory->editAttributes() ?>>
        <?= $Page->MedicalHistory->selectOptionListHtml("x_MedicalHistory[]") ?>
    </select>
    <?= $Page->MedicalHistory->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->MedicalHistory->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitals_history_x_MedicalHistory[]']"),
        options = { name: "x_MedicalHistory[]", selectId: "ivf_vitals_history_x_MedicalHistory[]", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.multiple = true;
    options.closeOnSelect = false;
    options.data = ew.vars.tables.ivf_vitals_history.fields.MedicalHistory.lookupOptions;
    options.columns = el.dataset.repeatcolumn || 5;
    options.dropdown = !ew.IS_MOBILE && options.columns > 0; // Use custom dropdown
    if (options.dropdown) {
        options.dropdownAutoWidth = true;
        options.dropdownCssClass = "ew-select-dropdown ew-select-multiple";
        if (options.columns > 1)
            options.dropdownCssClass += " ew-repeat-column";
    }
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitals_history.fields.MedicalHistory.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
    <div id="r_SurgicalHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_SurgicalHistory" for="x_SurgicalHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_SurgicalHistory"><?= $Page->SurgicalHistory->caption() ?><?= $Page->SurgicalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SurgicalHistory->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_SurgicalHistory"><span id="el_ivf_vitals_history_SurgicalHistory">
<input type="<?= $Page->SurgicalHistory->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_SurgicalHistory" name="x_SurgicalHistory" id="x_SurgicalHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SurgicalHistory->getPlaceHolder()) ?>" value="<?= $Page->SurgicalHistory->EditValue ?>"<?= $Page->SurgicalHistory->editAttributes() ?> aria-describedby="x_SurgicalHistory_help">
<?= $Page->SurgicalHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SurgicalHistory->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
    <div id="r_Generalexaminationpallor" class="form-group row">
        <label id="elh_ivf_vitals_history_Generalexaminationpallor" for="x_Generalexaminationpallor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_Generalexaminationpallor"><?= $Page->Generalexaminationpallor->caption() ?><?= $Page->Generalexaminationpallor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Generalexaminationpallor->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_Generalexaminationpallor"><span id="el_ivf_vitals_history_Generalexaminationpallor">
<input type="<?= $Page->Generalexaminationpallor->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Generalexaminationpallor" name="x_Generalexaminationpallor" id="x_Generalexaminationpallor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Generalexaminationpallor->getPlaceHolder()) ?>" value="<?= $Page->Generalexaminationpallor->EditValue ?>"<?= $Page->Generalexaminationpallor->editAttributes() ?> aria-describedby="x_Generalexaminationpallor_help">
<?= $Page->Generalexaminationpallor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Generalexaminationpallor->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PR->Visible) { // PR ?>
    <div id="r_PR" class="form-group row">
        <label id="elh_ivf_vitals_history_PR" for="x_PR" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_PR"><?= $Page->PR->caption() ?><?= $Page->PR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PR->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_PR"><span id="el_ivf_vitals_history_PR">
<input type="<?= $Page->PR->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PR" name="x_PR" id="x_PR" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PR->getPlaceHolder()) ?>" value="<?= $Page->PR->EditValue ?>"<?= $Page->PR->editAttributes() ?> aria-describedby="x_PR_help">
<?= $Page->PR->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PR->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
    <div id="r_CVS" class="form-group row">
        <label id="elh_ivf_vitals_history_CVS" for="x_CVS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_CVS"><?= $Page->CVS->caption() ?><?= $Page->CVS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CVS->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_CVS"><span id="el_ivf_vitals_history_CVS">
<input type="<?= $Page->CVS->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_CVS" name="x_CVS" id="x_CVS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CVS->getPlaceHolder()) ?>" value="<?= $Page->CVS->EditValue ?>"<?= $Page->CVS->editAttributes() ?> aria-describedby="x_CVS_help">
<?= $Page->CVS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CVS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
    <div id="r_PA" class="form-group row">
        <label id="elh_ivf_vitals_history_PA" for="x_PA" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_PA"><?= $Page->PA->caption() ?><?= $Page->PA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PA->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_PA"><span id="el_ivf_vitals_history_PA">
<input type="<?= $Page->PA->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PA" name="x_PA" id="x_PA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PA->getPlaceHolder()) ?>" value="<?= $Page->PA->EditValue ?>"<?= $Page->PA->editAttributes() ?> aria-describedby="x_PA_help">
<?= $Page->PA->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PA->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
    <div id="r_PROVISIONALDIAGNOSIS" class="form-group row">
        <label id="elh_ivf_vitals_history_PROVISIONALDIAGNOSIS" for="x_PROVISIONALDIAGNOSIS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_PROVISIONALDIAGNOSIS"><?= $Page->PROVISIONALDIAGNOSIS->caption() ?><?= $Page->PROVISIONALDIAGNOSIS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_PROVISIONALDIAGNOSIS"><span id="el_ivf_vitals_history_PROVISIONALDIAGNOSIS">
<input type="<?= $Page->PROVISIONALDIAGNOSIS->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PROVISIONALDIAGNOSIS" name="x_PROVISIONALDIAGNOSIS" id="x_PROVISIONALDIAGNOSIS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PROVISIONALDIAGNOSIS->getPlaceHolder()) ?>" value="<?= $Page->PROVISIONALDIAGNOSIS->EditValue ?>"<?= $Page->PROVISIONALDIAGNOSIS->editAttributes() ?> aria-describedby="x_PROVISIONALDIAGNOSIS_help">
<?= $Page->PROVISIONALDIAGNOSIS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PROVISIONALDIAGNOSIS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Investigations->Visible) { // Investigations ?>
    <div id="r_Investigations" class="form-group row">
        <label id="elh_ivf_vitals_history_Investigations" for="x_Investigations" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_Investigations"><?= $Page->Investigations->caption() ?><?= $Page->Investigations->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Investigations->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_Investigations"><span id="el_ivf_vitals_history_Investigations">
<input type="<?= $Page->Investigations->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Investigations" name="x_Investigations" id="x_Investigations" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Investigations->getPlaceHolder()) ?>" value="<?= $Page->Investigations->EditValue ?>"<?= $Page->Investigations->editAttributes() ?> aria-describedby="x_Investigations_help">
<?= $Page->Investigations->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Investigations->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Fheight->Visible) { // Fheight ?>
    <div id="r_Fheight" class="form-group row">
        <label id="elh_ivf_vitals_history_Fheight" for="x_Fheight" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_Fheight"><?= $Page->Fheight->caption() ?><?= $Page->Fheight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Fheight->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_Fheight"><span id="el_ivf_vitals_history_Fheight">
<input type="<?= $Page->Fheight->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Fheight" name="x_Fheight" id="x_Fheight" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Fheight->getPlaceHolder()) ?>" value="<?= $Page->Fheight->EditValue ?>"<?= $Page->Fheight->editAttributes() ?> aria-describedby="x_Fheight_help">
<?= $Page->Fheight->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Fheight->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Fweight->Visible) { // Fweight ?>
    <div id="r_Fweight" class="form-group row">
        <label id="elh_ivf_vitals_history_Fweight" for="x_Fweight" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_Fweight"><?= $Page->Fweight->caption() ?><?= $Page->Fweight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Fweight->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_Fweight"><span id="el_ivf_vitals_history_Fweight">
<input type="<?= $Page->Fweight->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Fweight" name="x_Fweight" id="x_Fweight" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Fweight->getPlaceHolder()) ?>" value="<?= $Page->Fweight->EditValue ?>"<?= $Page->Fweight->editAttributes() ?> aria-describedby="x_Fweight_help">
<?= $Page->Fweight->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Fweight->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FBMI->Visible) { // FBMI ?>
    <div id="r_FBMI" class="form-group row">
        <label id="elh_ivf_vitals_history_FBMI" for="x_FBMI" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_FBMI"><?= $Page->FBMI->caption() ?><?= $Page->FBMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FBMI->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_FBMI"><span id="el_ivf_vitals_history_FBMI">
<input type="<?= $Page->FBMI->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_FBMI" name="x_FBMI" id="x_FBMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FBMI->getPlaceHolder()) ?>" value="<?= $Page->FBMI->EditValue ?>"<?= $Page->FBMI->editAttributes() ?> aria-describedby="x_FBMI_help">
<?= $Page->FBMI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FBMI->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FBloodgroup->Visible) { // FBloodgroup ?>
    <div id="r_FBloodgroup" class="form-group row">
        <label id="elh_ivf_vitals_history_FBloodgroup" for="x_FBloodgroup" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_FBloodgroup"><?= $Page->FBloodgroup->caption() ?><?= $Page->FBloodgroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FBloodgroup->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_FBloodgroup"><span id="el_ivf_vitals_history_FBloodgroup">
<div class="input-group flex-nowrap">
    <select
        id="x_FBloodgroup"
        name="x_FBloodgroup"
        class="form-control ew-select<?= $Page->FBloodgroup->isInvalidClass() ?>"
        data-select2-id="ivf_vitals_history_x_FBloodgroup"
        data-table="ivf_vitals_history"
        data-field="x_FBloodgroup"
        data-value-separator="<?= $Page->FBloodgroup->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->FBloodgroup->getPlaceHolder()) ?>"
        <?= $Page->FBloodgroup->editAttributes() ?>>
        <?= $Page->FBloodgroup->selectOptionListHtml("x_FBloodgroup") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_bloodgroup") && !$Page->FBloodgroup->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_FBloodgroup" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->FBloodgroup->caption() ?>" data-title="<?= $Page->FBloodgroup->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_FBloodgroup',url:'<?= GetUrl("MasBloodgroupAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->FBloodgroup->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FBloodgroup->getErrorMessage() ?></div>
<?= $Page->FBloodgroup->Lookup->getParamTag($Page, "p_x_FBloodgroup") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitals_history_x_FBloodgroup']"),
        options = { name: "x_FBloodgroup", selectId: "ivf_vitals_history_x_FBloodgroup", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitals_history.fields.FBloodgroup.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mheight->Visible) { // Mheight ?>
    <div id="r_Mheight" class="form-group row">
        <label id="elh_ivf_vitals_history_Mheight" for="x_Mheight" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_Mheight"><?= $Page->Mheight->caption() ?><?= $Page->Mheight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mheight->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_Mheight"><span id="el_ivf_vitals_history_Mheight">
<input type="<?= $Page->Mheight->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Mheight" name="x_Mheight" id="x_Mheight" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mheight->getPlaceHolder()) ?>" value="<?= $Page->Mheight->EditValue ?>"<?= $Page->Mheight->editAttributes() ?> aria-describedby="x_Mheight_help">
<?= $Page->Mheight->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mheight->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mweight->Visible) { // Mweight ?>
    <div id="r_Mweight" class="form-group row">
        <label id="elh_ivf_vitals_history_Mweight" for="x_Mweight" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_Mweight"><?= $Page->Mweight->caption() ?><?= $Page->Mweight->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mweight->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_Mweight"><span id="el_ivf_vitals_history_Mweight">
<input type="<?= $Page->Mweight->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Mweight" name="x_Mweight" id="x_Mweight" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mweight->getPlaceHolder()) ?>" value="<?= $Page->Mweight->EditValue ?>"<?= $Page->Mweight->editAttributes() ?> aria-describedby="x_Mweight_help">
<?= $Page->Mweight->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mweight->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MBMI->Visible) { // MBMI ?>
    <div id="r_MBMI" class="form-group row">
        <label id="elh_ivf_vitals_history_MBMI" for="x_MBMI" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_MBMI"><?= $Page->MBMI->caption() ?><?= $Page->MBMI->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MBMI->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_MBMI"><span id="el_ivf_vitals_history_MBMI">
<input type="<?= $Page->MBMI->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_MBMI" name="x_MBMI" id="x_MBMI" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MBMI->getPlaceHolder()) ?>" value="<?= $Page->MBMI->EditValue ?>"<?= $Page->MBMI->editAttributes() ?> aria-describedby="x_MBMI_help">
<?= $Page->MBMI->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MBMI->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MBloodgroup->Visible) { // MBloodgroup ?>
    <div id="r_MBloodgroup" class="form-group row">
        <label id="elh_ivf_vitals_history_MBloodgroup" for="x_MBloodgroup" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_MBloodgroup"><?= $Page->MBloodgroup->caption() ?><?= $Page->MBloodgroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MBloodgroup->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_MBloodgroup"><span id="el_ivf_vitals_history_MBloodgroup">
<div class="input-group flex-nowrap">
    <select
        id="x_MBloodgroup"
        name="x_MBloodgroup"
        class="form-control ew-select<?= $Page->MBloodgroup->isInvalidClass() ?>"
        data-select2-id="ivf_vitals_history_x_MBloodgroup"
        data-table="ivf_vitals_history"
        data-field="x_MBloodgroup"
        data-value-separator="<?= $Page->MBloodgroup->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->MBloodgroup->getPlaceHolder()) ?>"
        <?= $Page->MBloodgroup->editAttributes() ?>>
        <?= $Page->MBloodgroup->selectOptionListHtml("x_MBloodgroup") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_bloodgroup") && !$Page->MBloodgroup->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_MBloodgroup" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->MBloodgroup->caption() ?>" data-title="<?= $Page->MBloodgroup->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_MBloodgroup',url:'<?= GetUrl("MasBloodgroupAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->MBloodgroup->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MBloodgroup->getErrorMessage() ?></div>
<?= $Page->MBloodgroup->Lookup->getParamTag($Page, "p_x_MBloodgroup") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitals_history_x_MBloodgroup']"),
        options = { name: "x_MBloodgroup", selectId: "ivf_vitals_history_x_MBloodgroup", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitals_history.fields.MBloodgroup.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FBuild->Visible) { // FBuild ?>
    <div id="r_FBuild" class="form-group row">
        <label id="elh_ivf_vitals_history_FBuild" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_FBuild"><?= $Page->FBuild->caption() ?><?= $Page->FBuild->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FBuild->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_FBuild"><span id="el_ivf_vitals_history_FBuild">
<template id="tp_x_FBuild">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_FBuild" name="x_FBuild" id="x_FBuild"<?= $Page->FBuild->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_FBuild" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_FBuild"
    name="x_FBuild"
    value="<?= HtmlEncode($Page->FBuild->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_FBuild"
    data-target="dsl_x_FBuild"
    data-repeatcolumn="5"
    class="form-control<?= $Page->FBuild->isInvalidClass() ?>"
    data-table="ivf_vitals_history"
    data-field="x_FBuild"
    data-value-separator="<?= $Page->FBuild->displayValueSeparatorAttribute() ?>"
    <?= $Page->FBuild->editAttributes() ?>>
<?= $Page->FBuild->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FBuild->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MBuild->Visible) { // MBuild ?>
    <div id="r_MBuild" class="form-group row">
        <label id="elh_ivf_vitals_history_MBuild" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_MBuild"><?= $Page->MBuild->caption() ?><?= $Page->MBuild->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MBuild->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_MBuild"><span id="el_ivf_vitals_history_MBuild">
<template id="tp_x_MBuild">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_MBuild" name="x_MBuild" id="x_MBuild"<?= $Page->MBuild->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_MBuild" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_MBuild"
    name="x_MBuild"
    value="<?= HtmlEncode($Page->MBuild->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_MBuild"
    data-target="dsl_x_MBuild"
    data-repeatcolumn="5"
    class="form-control<?= $Page->MBuild->isInvalidClass() ?>"
    data-table="ivf_vitals_history"
    data-field="x_MBuild"
    data-value-separator="<?= $Page->MBuild->displayValueSeparatorAttribute() ?>"
    <?= $Page->MBuild->editAttributes() ?>>
<?= $Page->MBuild->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MBuild->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FSkinColor->Visible) { // FSkinColor ?>
    <div id="r_FSkinColor" class="form-group row">
        <label id="elh_ivf_vitals_history_FSkinColor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_FSkinColor"><?= $Page->FSkinColor->caption() ?><?= $Page->FSkinColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FSkinColor->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_FSkinColor"><span id="el_ivf_vitals_history_FSkinColor">
<template id="tp_x_FSkinColor">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_FSkinColor" name="x_FSkinColor" id="x_FSkinColor"<?= $Page->FSkinColor->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_FSkinColor" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_FSkinColor"
    name="x_FSkinColor"
    value="<?= HtmlEncode($Page->FSkinColor->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_FSkinColor"
    data-target="dsl_x_FSkinColor"
    data-repeatcolumn="5"
    class="form-control<?= $Page->FSkinColor->isInvalidClass() ?>"
    data-table="ivf_vitals_history"
    data-field="x_FSkinColor"
    data-value-separator="<?= $Page->FSkinColor->displayValueSeparatorAttribute() ?>"
    <?= $Page->FSkinColor->editAttributes() ?>>
<?= $Page->FSkinColor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FSkinColor->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MSkinColor->Visible) { // MSkinColor ?>
    <div id="r_MSkinColor" class="form-group row">
        <label id="elh_ivf_vitals_history_MSkinColor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_MSkinColor"><?= $Page->MSkinColor->caption() ?><?= $Page->MSkinColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MSkinColor->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_MSkinColor"><span id="el_ivf_vitals_history_MSkinColor">
<template id="tp_x_MSkinColor">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_MSkinColor" name="x_MSkinColor" id="x_MSkinColor"<?= $Page->MSkinColor->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_MSkinColor" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_MSkinColor"
    name="x_MSkinColor"
    value="<?= HtmlEncode($Page->MSkinColor->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_MSkinColor"
    data-target="dsl_x_MSkinColor"
    data-repeatcolumn="5"
    class="form-control<?= $Page->MSkinColor->isInvalidClass() ?>"
    data-table="ivf_vitals_history"
    data-field="x_MSkinColor"
    data-value-separator="<?= $Page->MSkinColor->displayValueSeparatorAttribute() ?>"
    <?= $Page->MSkinColor->editAttributes() ?>>
<?= $Page->MSkinColor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MSkinColor->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FEyesColor->Visible) { // FEyesColor ?>
    <div id="r_FEyesColor" class="form-group row">
        <label id="elh_ivf_vitals_history_FEyesColor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_FEyesColor"><?= $Page->FEyesColor->caption() ?><?= $Page->FEyesColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FEyesColor->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_FEyesColor"><span id="el_ivf_vitals_history_FEyesColor">
<template id="tp_x_FEyesColor">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_FEyesColor" name="x_FEyesColor" id="x_FEyesColor"<?= $Page->FEyesColor->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_FEyesColor" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_FEyesColor"
    name="x_FEyesColor"
    value="<?= HtmlEncode($Page->FEyesColor->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_FEyesColor"
    data-target="dsl_x_FEyesColor"
    data-repeatcolumn="5"
    class="form-control<?= $Page->FEyesColor->isInvalidClass() ?>"
    data-table="ivf_vitals_history"
    data-field="x_FEyesColor"
    data-value-separator="<?= $Page->FEyesColor->displayValueSeparatorAttribute() ?>"
    <?= $Page->FEyesColor->editAttributes() ?>>
<?= $Page->FEyesColor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FEyesColor->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MEyesColor->Visible) { // MEyesColor ?>
    <div id="r_MEyesColor" class="form-group row">
        <label id="elh_ivf_vitals_history_MEyesColor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_MEyesColor"><?= $Page->MEyesColor->caption() ?><?= $Page->MEyesColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MEyesColor->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_MEyesColor"><span id="el_ivf_vitals_history_MEyesColor">
<template id="tp_x_MEyesColor">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_MEyesColor" name="x_MEyesColor" id="x_MEyesColor"<?= $Page->MEyesColor->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_MEyesColor" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_MEyesColor"
    name="x_MEyesColor"
    value="<?= HtmlEncode($Page->MEyesColor->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_MEyesColor"
    data-target="dsl_x_MEyesColor"
    data-repeatcolumn="5"
    class="form-control<?= $Page->MEyesColor->isInvalidClass() ?>"
    data-table="ivf_vitals_history"
    data-field="x_MEyesColor"
    data-value-separator="<?= $Page->MEyesColor->displayValueSeparatorAttribute() ?>"
    <?= $Page->MEyesColor->editAttributes() ?>>
<?= $Page->MEyesColor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MEyesColor->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FHairColor->Visible) { // FHairColor ?>
    <div id="r_FHairColor" class="form-group row">
        <label id="elh_ivf_vitals_history_FHairColor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_FHairColor"><?= $Page->FHairColor->caption() ?><?= $Page->FHairColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FHairColor->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_FHairColor"><span id="el_ivf_vitals_history_FHairColor">
<template id="tp_x_FHairColor">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_FHairColor" name="x_FHairColor" id="x_FHairColor"<?= $Page->FHairColor->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_FHairColor" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_FHairColor"
    name="x_FHairColor"
    value="<?= HtmlEncode($Page->FHairColor->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_FHairColor"
    data-target="dsl_x_FHairColor"
    data-repeatcolumn="5"
    class="form-control<?= $Page->FHairColor->isInvalidClass() ?>"
    data-table="ivf_vitals_history"
    data-field="x_FHairColor"
    data-value-separator="<?= $Page->FHairColor->displayValueSeparatorAttribute() ?>"
    <?= $Page->FHairColor->editAttributes() ?>>
<?= $Page->FHairColor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FHairColor->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MhairColor->Visible) { // MhairColor ?>
    <div id="r_MhairColor" class="form-group row">
        <label id="elh_ivf_vitals_history_MhairColor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_MhairColor"><?= $Page->MhairColor->caption() ?><?= $Page->MhairColor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MhairColor->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_MhairColor"><span id="el_ivf_vitals_history_MhairColor">
<template id="tp_x_MhairColor">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_MhairColor" name="x_MhairColor" id="x_MhairColor"<?= $Page->MhairColor->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_MhairColor" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_MhairColor"
    name="x_MhairColor"
    value="<?= HtmlEncode($Page->MhairColor->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_MhairColor"
    data-target="dsl_x_MhairColor"
    data-repeatcolumn="5"
    class="form-control<?= $Page->MhairColor->isInvalidClass() ?>"
    data-table="ivf_vitals_history"
    data-field="x_MhairColor"
    data-value-separator="<?= $Page->MhairColor->displayValueSeparatorAttribute() ?>"
    <?= $Page->MhairColor->editAttributes() ?>>
<?= $Page->MhairColor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MhairColor->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FhairTexture->Visible) { // FhairTexture ?>
    <div id="r_FhairTexture" class="form-group row">
        <label id="elh_ivf_vitals_history_FhairTexture" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_FhairTexture"><?= $Page->FhairTexture->caption() ?><?= $Page->FhairTexture->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FhairTexture->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_FhairTexture"><span id="el_ivf_vitals_history_FhairTexture">
<template id="tp_x_FhairTexture">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_FhairTexture" name="x_FhairTexture" id="x_FhairTexture"<?= $Page->FhairTexture->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_FhairTexture" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_FhairTexture"
    name="x_FhairTexture"
    value="<?= HtmlEncode($Page->FhairTexture->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_FhairTexture"
    data-target="dsl_x_FhairTexture"
    data-repeatcolumn="5"
    class="form-control<?= $Page->FhairTexture->isInvalidClass() ?>"
    data-table="ivf_vitals_history"
    data-field="x_FhairTexture"
    data-value-separator="<?= $Page->FhairTexture->displayValueSeparatorAttribute() ?>"
    <?= $Page->FhairTexture->editAttributes() ?>>
<?= $Page->FhairTexture->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FhairTexture->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MHairTexture->Visible) { // MHairTexture ?>
    <div id="r_MHairTexture" class="form-group row">
        <label id="elh_ivf_vitals_history_MHairTexture" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_MHairTexture"><?= $Page->MHairTexture->caption() ?><?= $Page->MHairTexture->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MHairTexture->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_MHairTexture"><span id="el_ivf_vitals_history_MHairTexture">
<template id="tp_x_MHairTexture">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_MHairTexture" name="x_MHairTexture" id="x_MHairTexture"<?= $Page->MHairTexture->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_MHairTexture" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_MHairTexture"
    name="x_MHairTexture"
    value="<?= HtmlEncode($Page->MHairTexture->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_MHairTexture"
    data-target="dsl_x_MHairTexture"
    data-repeatcolumn="5"
    class="form-control<?= $Page->MHairTexture->isInvalidClass() ?>"
    data-table="ivf_vitals_history"
    data-field="x_MHairTexture"
    data-value-separator="<?= $Page->MHairTexture->displayValueSeparatorAttribute() ?>"
    <?= $Page->MHairTexture->editAttributes() ?>>
<?= $Page->MHairTexture->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MHairTexture->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Fothers->Visible) { // Fothers ?>
    <div id="r_Fothers" class="form-group row">
        <label id="elh_ivf_vitals_history_Fothers" for="x_Fothers" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_Fothers"><?= $Page->Fothers->caption() ?><?= $Page->Fothers->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Fothers->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_Fothers"><span id="el_ivf_vitals_history_Fothers">
<input type="<?= $Page->Fothers->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Fothers" name="x_Fothers" id="x_Fothers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Fothers->getPlaceHolder()) ?>" value="<?= $Page->Fothers->EditValue ?>"<?= $Page->Fothers->editAttributes() ?> aria-describedby="x_Fothers_help">
<?= $Page->Fothers->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Fothers->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mothers->Visible) { // Mothers ?>
    <div id="r_Mothers" class="form-group row">
        <label id="elh_ivf_vitals_history_Mothers" for="x_Mothers" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_Mothers"><?= $Page->Mothers->caption() ?><?= $Page->Mothers->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mothers->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_Mothers"><span id="el_ivf_vitals_history_Mothers">
<input type="<?= $Page->Mothers->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Mothers" name="x_Mothers" id="x_Mothers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mothers->getPlaceHolder()) ?>" value="<?= $Page->Mothers->EditValue ?>"<?= $Page->Mothers->editAttributes() ?> aria-describedby="x_Mothers_help">
<?= $Page->Mothers->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mothers->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PGE->Visible) { // PGE ?>
    <div id="r_PGE" class="form-group row">
        <label id="elh_ivf_vitals_history_PGE" for="x_PGE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_PGE"><?= $Page->PGE->caption() ?><?= $Page->PGE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PGE->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_PGE"><span id="el_ivf_vitals_history_PGE">
<input type="<?= $Page->PGE->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PGE" name="x_PGE" id="x_PGE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PGE->getPlaceHolder()) ?>" value="<?= $Page->PGE->EditValue ?>"<?= $Page->PGE->editAttributes() ?> aria-describedby="x_PGE_help">
<?= $Page->PGE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PGE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PPR->Visible) { // PPR ?>
    <div id="r_PPR" class="form-group row">
        <label id="elh_ivf_vitals_history_PPR" for="x_PPR" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_PPR"><?= $Page->PPR->caption() ?><?= $Page->PPR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PPR->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_PPR"><span id="el_ivf_vitals_history_PPR">
<input type="<?= $Page->PPR->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PPR" name="x_PPR" id="x_PPR" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PPR->getPlaceHolder()) ?>" value="<?= $Page->PPR->EditValue ?>"<?= $Page->PPR->editAttributes() ?> aria-describedby="x_PPR_help">
<?= $Page->PPR->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PPR->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PBP->Visible) { // PBP ?>
    <div id="r_PBP" class="form-group row">
        <label id="elh_ivf_vitals_history_PBP" for="x_PBP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_PBP"><?= $Page->PBP->caption() ?><?= $Page->PBP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PBP->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_PBP"><span id="el_ivf_vitals_history_PBP">
<input type="<?= $Page->PBP->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PBP" name="x_PBP" id="x_PBP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PBP->getPlaceHolder()) ?>" value="<?= $Page->PBP->EditValue ?>"<?= $Page->PBP->editAttributes() ?> aria-describedby="x_PBP_help">
<?= $Page->PBP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PBP->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Breast->Visible) { // Breast ?>
    <div id="r_Breast" class="form-group row">
        <label id="elh_ivf_vitals_history_Breast" for="x_Breast" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_Breast"><?= $Page->Breast->caption() ?><?= $Page->Breast->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Breast->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_Breast"><span id="el_ivf_vitals_history_Breast">
<input type="<?= $Page->Breast->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Breast" name="x_Breast" id="x_Breast" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Breast->getPlaceHolder()) ?>" value="<?= $Page->Breast->EditValue ?>"<?= $Page->Breast->editAttributes() ?> aria-describedby="x_Breast_help">
<?= $Page->Breast->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Breast->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PPA->Visible) { // PPA ?>
    <div id="r_PPA" class="form-group row">
        <label id="elh_ivf_vitals_history_PPA" for="x_PPA" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_PPA"><?= $Page->PPA->caption() ?><?= $Page->PPA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PPA->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_PPA"><span id="el_ivf_vitals_history_PPA">
<input type="<?= $Page->PPA->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PPA" name="x_PPA" id="x_PPA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PPA->getPlaceHolder()) ?>" value="<?= $Page->PPA->EditValue ?>"<?= $Page->PPA->editAttributes() ?> aria-describedby="x_PPA_help">
<?= $Page->PPA->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PPA->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PPSV->Visible) { // PPSV ?>
    <div id="r_PPSV" class="form-group row">
        <label id="elh_ivf_vitals_history_PPSV" for="x_PPSV" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_PPSV"><?= $Page->PPSV->caption() ?><?= $Page->PPSV->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PPSV->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_PPSV"><span id="el_ivf_vitals_history_PPSV">
<input type="<?= $Page->PPSV->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PPSV" name="x_PPSV" id="x_PPSV" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PPSV->getPlaceHolder()) ?>" value="<?= $Page->PPSV->EditValue ?>"<?= $Page->PPSV->editAttributes() ?> aria-describedby="x_PPSV_help">
<?= $Page->PPSV->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PPSV->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
    <div id="r_PPAPSMEAR" class="form-group row">
        <label id="elh_ivf_vitals_history_PPAPSMEAR" for="x_PPAPSMEAR" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_PPAPSMEAR"><?= $Page->PPAPSMEAR->caption() ?><?= $Page->PPAPSMEAR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PPAPSMEAR->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_PPAPSMEAR"><span id="el_ivf_vitals_history_PPAPSMEAR">
<input type="<?= $Page->PPAPSMEAR->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PPAPSMEAR" name="x_PPAPSMEAR" id="x_PPAPSMEAR" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PPAPSMEAR->getPlaceHolder()) ?>" value="<?= $Page->PPAPSMEAR->EditValue ?>"<?= $Page->PPAPSMEAR->editAttributes() ?> aria-describedby="x_PPAPSMEAR_help">
<?= $Page->PPAPSMEAR->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PPAPSMEAR->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PTHYROID->Visible) { // PTHYROID ?>
    <div id="r_PTHYROID" class="form-group row">
        <label id="elh_ivf_vitals_history_PTHYROID" for="x_PTHYROID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_PTHYROID"><?= $Page->PTHYROID->caption() ?><?= $Page->PTHYROID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PTHYROID->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_PTHYROID"><span id="el_ivf_vitals_history_PTHYROID">
<input type="<?= $Page->PTHYROID->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PTHYROID" name="x_PTHYROID" id="x_PTHYROID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PTHYROID->getPlaceHolder()) ?>" value="<?= $Page->PTHYROID->EditValue ?>"<?= $Page->PTHYROID->editAttributes() ?> aria-describedby="x_PTHYROID_help">
<?= $Page->PTHYROID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PTHYROID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MTHYROID->Visible) { // MTHYROID ?>
    <div id="r_MTHYROID" class="form-group row">
        <label id="elh_ivf_vitals_history_MTHYROID" for="x_MTHYROID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_MTHYROID"><?= $Page->MTHYROID->caption() ?><?= $Page->MTHYROID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MTHYROID->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_MTHYROID"><span id="el_ivf_vitals_history_MTHYROID">
<input type="<?= $Page->MTHYROID->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_MTHYROID" name="x_MTHYROID" id="x_MTHYROID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MTHYROID->getPlaceHolder()) ?>" value="<?= $Page->MTHYROID->EditValue ?>"<?= $Page->MTHYROID->editAttributes() ?> aria-describedby="x_MTHYROID_help">
<?= $Page->MTHYROID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MTHYROID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SecSexCharacters->Visible) { // SecSexCharacters ?>
    <div id="r_SecSexCharacters" class="form-group row">
        <label id="elh_ivf_vitals_history_SecSexCharacters" for="x_SecSexCharacters" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_SecSexCharacters"><?= $Page->SecSexCharacters->caption() ?><?= $Page->SecSexCharacters->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SecSexCharacters->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_SecSexCharacters"><span id="el_ivf_vitals_history_SecSexCharacters">
<input type="<?= $Page->SecSexCharacters->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_SecSexCharacters" name="x_SecSexCharacters" id="x_SecSexCharacters" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SecSexCharacters->getPlaceHolder()) ?>" value="<?= $Page->SecSexCharacters->EditValue ?>"<?= $Page->SecSexCharacters->editAttributes() ?> aria-describedby="x_SecSexCharacters_help">
<?= $Page->SecSexCharacters->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SecSexCharacters->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PenisUM->Visible) { // PenisUM ?>
    <div id="r_PenisUM" class="form-group row">
        <label id="elh_ivf_vitals_history_PenisUM" for="x_PenisUM" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_PenisUM"><?= $Page->PenisUM->caption() ?><?= $Page->PenisUM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PenisUM->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_PenisUM"><span id="el_ivf_vitals_history_PenisUM">
<input type="<?= $Page->PenisUM->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_PenisUM" name="x_PenisUM" id="x_PenisUM" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PenisUM->getPlaceHolder()) ?>" value="<?= $Page->PenisUM->EditValue ?>"<?= $Page->PenisUM->editAttributes() ?> aria-describedby="x_PenisUM_help">
<?= $Page->PenisUM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PenisUM->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VAS->Visible) { // VAS ?>
    <div id="r_VAS" class="form-group row">
        <label id="elh_ivf_vitals_history_VAS" for="x_VAS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_VAS"><?= $Page->VAS->caption() ?><?= $Page->VAS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VAS->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_VAS"><span id="el_ivf_vitals_history_VAS">
<input type="<?= $Page->VAS->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_VAS" name="x_VAS" id="x_VAS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VAS->getPlaceHolder()) ?>" value="<?= $Page->VAS->EditValue ?>"<?= $Page->VAS->editAttributes() ?> aria-describedby="x_VAS_help">
<?= $Page->VAS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->VAS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
    <div id="r_EPIDIDYMIS" class="form-group row">
        <label id="elh_ivf_vitals_history_EPIDIDYMIS" for="x_EPIDIDYMIS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_EPIDIDYMIS"><?= $Page->EPIDIDYMIS->caption() ?><?= $Page->EPIDIDYMIS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EPIDIDYMIS->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_EPIDIDYMIS"><span id="el_ivf_vitals_history_EPIDIDYMIS">
<input type="<?= $Page->EPIDIDYMIS->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_EPIDIDYMIS" name="x_EPIDIDYMIS" id="x_EPIDIDYMIS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EPIDIDYMIS->getPlaceHolder()) ?>" value="<?= $Page->EPIDIDYMIS->EditValue ?>"<?= $Page->EPIDIDYMIS->editAttributes() ?> aria-describedby="x_EPIDIDYMIS_help">
<?= $Page->EPIDIDYMIS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EPIDIDYMIS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Varicocele->Visible) { // Varicocele ?>
    <div id="r_Varicocele" class="form-group row">
        <label id="elh_ivf_vitals_history_Varicocele" for="x_Varicocele" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_Varicocele"><?= $Page->Varicocele->caption() ?><?= $Page->Varicocele->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Varicocele->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_Varicocele"><span id="el_ivf_vitals_history_Varicocele">
<input type="<?= $Page->Varicocele->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_Varicocele" name="x_Varicocele" id="x_Varicocele" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Varicocele->getPlaceHolder()) ?>" value="<?= $Page->Varicocele->EditValue ?>"<?= $Page->Varicocele->editAttributes() ?> aria-describedby="x_Varicocele_help">
<?= $Page->Varicocele->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Varicocele->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FertilityTreatmentHistory->Visible) { // FertilityTreatmentHistory ?>
    <div id="r_FertilityTreatmentHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_FertilityTreatmentHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_FertilityTreatmentHistory"><?= $Page->FertilityTreatmentHistory->caption() ?><?= $Page->FertilityTreatmentHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FertilityTreatmentHistory->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_FertilityTreatmentHistory"><span id="el_ivf_vitals_history_FertilityTreatmentHistory">
<?php $Page->FertilityTreatmentHistory->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_FertilityTreatmentHistory" name="x_FertilityTreatmentHistory" id="x_FertilityTreatmentHistory" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->FertilityTreatmentHistory->getPlaceHolder()) ?>"<?= $Page->FertilityTreatmentHistory->editAttributes() ?> aria-describedby="x_FertilityTreatmentHistory_help"><?= $Page->FertilityTreatmentHistory->EditValue ?></textarea>
<?= $Page->FertilityTreatmentHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FertilityTreatmentHistory->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_vitals_historyedit", "editor"], function() {
	ew.createEditor("fivf_vitals_historyedit", "x_FertilityTreatmentHistory", 35, 4, <?= $Page->FertilityTreatmentHistory->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SurgeryHistory->Visible) { // SurgeryHistory ?>
    <div id="r_SurgeryHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_SurgeryHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_SurgeryHistory"><?= $Page->SurgeryHistory->caption() ?><?= $Page->SurgeryHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SurgeryHistory->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_SurgeryHistory"><span id="el_ivf_vitals_history_SurgeryHistory">
<?php $Page->SurgeryHistory->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_SurgeryHistory" name="x_SurgeryHistory" id="x_SurgeryHistory" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->SurgeryHistory->getPlaceHolder()) ?>"<?= $Page->SurgeryHistory->editAttributes() ?> aria-describedby="x_SurgeryHistory_help"><?= $Page->SurgeryHistory->EditValue ?></textarea>
<?= $Page->SurgeryHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SurgeryHistory->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_vitals_historyedit", "editor"], function() {
	ew.createEditor("fivf_vitals_historyedit", "x_SurgeryHistory", 35, 4, <?= $Page->SurgeryHistory->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
    <div id="r_FamilyHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_FamilyHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_FamilyHistory"><?= $Page->FamilyHistory->caption() ?><?= $Page->FamilyHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FamilyHistory->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_FamilyHistory"><span id="el_ivf_vitals_history_FamilyHistory">
<?php
$onchange = $Page->FamilyHistory->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->FamilyHistory->EditAttrs["onchange"] = "";
?>
<span id="as_x_FamilyHistory" class="ew-auto-suggest">
    <input type="<?= $Page->FamilyHistory->getInputTextType() ?>" class="form-control" name="sv_x_FamilyHistory" id="sv_x_FamilyHistory" value="<?= RemoveHtml($Page->FamilyHistory->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FamilyHistory->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->FamilyHistory->getPlaceHolder()) ?>"<?= $Page->FamilyHistory->editAttributes() ?> aria-describedby="x_FamilyHistory_help">
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="ivf_vitals_history" data-field="x_FamilyHistory" data-input="sv_x_FamilyHistory" data-value-separator="<?= $Page->FamilyHistory->displayValueSeparatorAttribute() ?>" name="x_FamilyHistory" id="x_FamilyHistory" value="<?= HtmlEncode($Page->FamilyHistory->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->FamilyHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FamilyHistory->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_vitals_historyedit"], function() {
    fivf_vitals_historyedit.createAutoSuggest(Object.assign({"id":"x_FamilyHistory","forceSelect":false}, ew.vars.tables.ivf_vitals_history.fields.FamilyHistory.autoSuggestOptions));
});
</script>
<?= $Page->FamilyHistory->Lookup->getParamTag($Page, "p_x_FamilyHistory") ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PInvestigations->Visible) { // PInvestigations ?>
    <div id="r_PInvestigations" class="form-group row">
        <label id="elh_ivf_vitals_history_PInvestigations" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_PInvestigations"><?= $Page->PInvestigations->caption() ?><?= $Page->PInvestigations->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PInvestigations->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_PInvestigations"><span id="el_ivf_vitals_history_PInvestigations">
<?php $Page->PInvestigations->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_PInvestigations" name="x_PInvestigations" id="x_PInvestigations" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->PInvestigations->getPlaceHolder()) ?>"<?= $Page->PInvestigations->editAttributes() ?> aria-describedby="x_PInvestigations_help"><?= $Page->PInvestigations->EditValue ?></textarea>
<?= $Page->PInvestigations->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PInvestigations->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_vitals_historyedit", "editor"], function() {
	ew.createEditor("fivf_vitals_historyedit", "x_PInvestigations", 35, 4, <?= $Page->PInvestigations->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Addictions->Visible) { // Addictions ?>
    <div id="r_Addictions" class="form-group row">
        <label id="elh_ivf_vitals_history_Addictions" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_Addictions"><?= $Page->Addictions->caption() ?><?= $Page->Addictions->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Addictions->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_Addictions"><span id="el_ivf_vitals_history_Addictions">
<template id="tp_x_Addictions">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="ivf_vitals_history" data-field="x_Addictions" name="x_Addictions" id="x_Addictions"<?= $Page->Addictions->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Addictions" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Addictions[]"
    name="x_Addictions[]"
    value="<?= HtmlEncode($Page->Addictions->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_Addictions"
    data-target="dsl_x_Addictions"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Addictions->isInvalidClass() ?>"
    data-table="ivf_vitals_history"
    data-field="x_Addictions"
    data-value-separator="<?= $Page->Addictions->displayValueSeparatorAttribute() ?>"
    <?= $Page->Addictions->editAttributes() ?>>
<?= $Page->Addictions->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Addictions->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Medications->Visible) { // Medications ?>
    <div id="r_Medications" class="form-group row">
        <label id="elh_ivf_vitals_history_Medications" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_Medications"><?= $Page->Medications->caption() ?><?= $Page->Medications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Medications->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_Medications"><span id="el_ivf_vitals_history_Medications">
<?php $Page->Medications->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_Medications" name="x_Medications" id="x_Medications" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Medications->getPlaceHolder()) ?>"<?= $Page->Medications->editAttributes() ?> aria-describedby="x_Medications_help"><?= $Page->Medications->EditValue ?></textarea>
<?= $Page->Medications->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Medications->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_vitals_historyedit", "editor"], function() {
	ew.createEditor("fivf_vitals_historyedit", "x_Medications", 35, 4, <?= $Page->Medications->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Medical->Visible) { // Medical ?>
    <div id="r_Medical" class="form-group row">
        <label id="elh_ivf_vitals_history_Medical" for="x_Medical" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_Medical"><?= $Page->Medical->caption() ?><?= $Page->Medical->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Medical->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_Medical"><span id="el_ivf_vitals_history_Medical">
    <select
        id="x_Medical"
        name="x_Medical"
        class="form-control ew-select<?= $Page->Medical->isInvalidClass() ?>"
        data-select2-id="ivf_vitals_history_x_Medical"
        data-table="ivf_vitals_history"
        data-field="x_Medical"
        data-value-separator="<?= $Page->Medical->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Medical->getPlaceHolder()) ?>"
        <?= $Page->Medical->editAttributes() ?>>
        <?= $Page->Medical->selectOptionListHtml("x_Medical") ?>
    </select>
    <?= $Page->Medical->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Medical->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitals_history_x_Medical']"),
        options = { name: "x_Medical", selectId: "ivf_vitals_history_x_Medical", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.ivf_vitals_history.fields.Medical.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitals_history.fields.Medical.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Surgical->Visible) { // Surgical ?>
    <div id="r_Surgical" class="form-group row">
        <label id="elh_ivf_vitals_history_Surgical" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_Surgical"><?= $Page->Surgical->caption() ?><?= $Page->Surgical->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Surgical->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_Surgical"><span id="el_ivf_vitals_history_Surgical">
<?php
$onchange = $Page->Surgical->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Surgical->EditAttrs["onchange"] = "";
?>
<span id="as_x_Surgical" class="ew-auto-suggest">
    <input type="<?= $Page->Surgical->getInputTextType() ?>" class="form-control" name="sv_x_Surgical" id="sv_x_Surgical" value="<?= RemoveHtml($Page->Surgical->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Surgical->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Surgical->getPlaceHolder()) ?>"<?= $Page->Surgical->editAttributes() ?> aria-describedby="x_Surgical_help">
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="ivf_vitals_history" data-field="x_Surgical" data-input="sv_x_Surgical" data-value-separator="<?= $Page->Surgical->displayValueSeparatorAttribute() ?>" name="x_Surgical" id="x_Surgical" value="<?= HtmlEncode($Page->Surgical->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->Surgical->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Surgical->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_vitals_historyedit"], function() {
    fivf_vitals_historyedit.createAutoSuggest(Object.assign({"id":"x_Surgical","forceSelect":false}, ew.vars.tables.ivf_vitals_history.fields.Surgical.autoSuggestOptions));
});
</script>
<?= $Page->Surgical->Lookup->getParamTag($Page, "p_x_Surgical") ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CoitalHistory->Visible) { // CoitalHistory ?>
    <div id="r_CoitalHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_CoitalHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_CoitalHistory"><?= $Page->CoitalHistory->caption() ?><?= $Page->CoitalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CoitalHistory->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_CoitalHistory"><span id="el_ivf_vitals_history_CoitalHistory">
<?php
$onchange = $Page->CoitalHistory->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->CoitalHistory->EditAttrs["onchange"] = "";
?>
<span id="as_x_CoitalHistory" class="ew-auto-suggest">
    <input type="<?= $Page->CoitalHistory->getInputTextType() ?>" class="form-control" name="sv_x_CoitalHistory" id="sv_x_CoitalHistory" value="<?= RemoveHtml($Page->CoitalHistory->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CoitalHistory->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->CoitalHistory->getPlaceHolder()) ?>"<?= $Page->CoitalHistory->editAttributes() ?> aria-describedby="x_CoitalHistory_help">
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="ivf_vitals_history" data-field="x_CoitalHistory" data-input="sv_x_CoitalHistory" data-value-separator="<?= $Page->CoitalHistory->displayValueSeparatorAttribute() ?>" name="x_CoitalHistory" id="x_CoitalHistory" value="<?= HtmlEncode($Page->CoitalHistory->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->CoitalHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CoitalHistory->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_vitals_historyedit"], function() {
    fivf_vitals_historyedit.createAutoSuggest(Object.assign({"id":"x_CoitalHistory","forceSelect":false}, ew.vars.tables.ivf_vitals_history.fields.CoitalHistory.autoSuggestOptions));
});
</script>
<?= $Page->CoitalHistory->Lookup->getParamTag($Page, "p_x_CoitalHistory") ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SemenAnalysis->Visible) { // SemenAnalysis ?>
    <div id="r_SemenAnalysis" class="form-group row">
        <label id="elh_ivf_vitals_history_SemenAnalysis" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_SemenAnalysis"><?= $Page->SemenAnalysis->caption() ?><?= $Page->SemenAnalysis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SemenAnalysis->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_SemenAnalysis"><span id="el_ivf_vitals_history_SemenAnalysis">
<?php $Page->SemenAnalysis->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_SemenAnalysis" name="x_SemenAnalysis" id="x_SemenAnalysis" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->SemenAnalysis->getPlaceHolder()) ?>"<?= $Page->SemenAnalysis->editAttributes() ?> aria-describedby="x_SemenAnalysis_help"><?= $Page->SemenAnalysis->EditValue ?></textarea>
<?= $Page->SemenAnalysis->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SemenAnalysis->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_vitals_historyedit", "editor"], function() {
	ew.createEditor("fivf_vitals_historyedit", "x_SemenAnalysis", 35, 4, <?= $Page->SemenAnalysis->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MInsvestications->Visible) { // MInsvestications ?>
    <div id="r_MInsvestications" class="form-group row">
        <label id="elh_ivf_vitals_history_MInsvestications" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_MInsvestications"><?= $Page->MInsvestications->caption() ?><?= $Page->MInsvestications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MInsvestications->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_MInsvestications"><span id="el_ivf_vitals_history_MInsvestications">
<?php $Page->MInsvestications->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_MInsvestications" name="x_MInsvestications" id="x_MInsvestications" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->MInsvestications->getPlaceHolder()) ?>"<?= $Page->MInsvestications->editAttributes() ?> aria-describedby="x_MInsvestications_help"><?= $Page->MInsvestications->EditValue ?></textarea>
<?= $Page->MInsvestications->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MInsvestications->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_vitals_historyedit", "editor"], function() {
	ew.createEditor("fivf_vitals_historyedit", "x_MInsvestications", 35, 4, <?= $Page->MInsvestications->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PImpression->Visible) { // PImpression ?>
    <div id="r_PImpression" class="form-group row">
        <label id="elh_ivf_vitals_history_PImpression" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_PImpression"><?= $Page->PImpression->caption() ?><?= $Page->PImpression->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PImpression->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_PImpression"><span id="el_ivf_vitals_history_PImpression">
<?php $Page->PImpression->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_PImpression" name="x_PImpression" id="x_PImpression" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->PImpression->getPlaceHolder()) ?>"<?= $Page->PImpression->editAttributes() ?> aria-describedby="x_PImpression_help"><?= $Page->PImpression->EditValue ?></textarea>
<?= $Page->PImpression->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PImpression->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_vitals_historyedit", "editor"], function() {
	ew.createEditor("fivf_vitals_historyedit", "x_PImpression", 35, 4, <?= $Page->PImpression->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MIMpression->Visible) { // MIMpression ?>
    <div id="r_MIMpression" class="form-group row">
        <label id="elh_ivf_vitals_history_MIMpression" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_MIMpression"><?= $Page->MIMpression->caption() ?><?= $Page->MIMpression->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MIMpression->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_MIMpression"><span id="el_ivf_vitals_history_MIMpression">
<?php $Page->MIMpression->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_MIMpression" name="x_MIMpression" id="x_MIMpression" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->MIMpression->getPlaceHolder()) ?>"<?= $Page->MIMpression->editAttributes() ?> aria-describedby="x_MIMpression_help"><?= $Page->MIMpression->EditValue ?></textarea>
<?= $Page->MIMpression->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MIMpression->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_vitals_historyedit", "editor"], function() {
	ew.createEditor("fivf_vitals_historyedit", "x_MIMpression", 35, 4, <?= $Page->MIMpression->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PPlanOfManagement->Visible) { // PPlanOfManagement ?>
    <div id="r_PPlanOfManagement" class="form-group row">
        <label id="elh_ivf_vitals_history_PPlanOfManagement" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_PPlanOfManagement"><?= $Page->PPlanOfManagement->caption() ?><?= $Page->PPlanOfManagement->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PPlanOfManagement->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_PPlanOfManagement"><span id="el_ivf_vitals_history_PPlanOfManagement">
<?php $Page->PPlanOfManagement->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_PPlanOfManagement" name="x_PPlanOfManagement" id="x_PPlanOfManagement" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->PPlanOfManagement->getPlaceHolder()) ?>"<?= $Page->PPlanOfManagement->editAttributes() ?> aria-describedby="x_PPlanOfManagement_help"><?= $Page->PPlanOfManagement->EditValue ?></textarea>
<?= $Page->PPlanOfManagement->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PPlanOfManagement->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_vitals_historyedit", "editor"], function() {
	ew.createEditor("fivf_vitals_historyedit", "x_PPlanOfManagement", 35, 4, <?= $Page->PPlanOfManagement->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MPlanOfManagement->Visible) { // MPlanOfManagement ?>
    <div id="r_MPlanOfManagement" class="form-group row">
        <label id="elh_ivf_vitals_history_MPlanOfManagement" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_MPlanOfManagement"><?= $Page->MPlanOfManagement->caption() ?><?= $Page->MPlanOfManagement->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MPlanOfManagement->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_MPlanOfManagement"><span id="el_ivf_vitals_history_MPlanOfManagement">
<?php $Page->MPlanOfManagement->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_MPlanOfManagement" name="x_MPlanOfManagement" id="x_MPlanOfManagement" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->MPlanOfManagement->getPlaceHolder()) ?>"<?= $Page->MPlanOfManagement->editAttributes() ?> aria-describedby="x_MPlanOfManagement_help"><?= $Page->MPlanOfManagement->EditValue ?></textarea>
<?= $Page->MPlanOfManagement->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MPlanOfManagement->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_vitals_historyedit", "editor"], function() {
	ew.createEditor("fivf_vitals_historyedit", "x_MPlanOfManagement", 35, 4, <?= $Page->MPlanOfManagement->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PReadMore->Visible) { // PReadMore ?>
    <div id="r_PReadMore" class="form-group row">
        <label id="elh_ivf_vitals_history_PReadMore" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_PReadMore"><?= $Page->PReadMore->caption() ?><?= $Page->PReadMore->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PReadMore->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_PReadMore"><span id="el_ivf_vitals_history_PReadMore">
<?php $Page->PReadMore->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_PReadMore" name="x_PReadMore" id="x_PReadMore" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->PReadMore->getPlaceHolder()) ?>"<?= $Page->PReadMore->editAttributes() ?> aria-describedby="x_PReadMore_help"><?= $Page->PReadMore->EditValue ?></textarea>
<?= $Page->PReadMore->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PReadMore->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_vitals_historyedit", "editor"], function() {
	ew.createEditor("fivf_vitals_historyedit", "x_PReadMore", 35, 4, <?= $Page->PReadMore->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MReadMore->Visible) { // MReadMore ?>
    <div id="r_MReadMore" class="form-group row">
        <label id="elh_ivf_vitals_history_MReadMore" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_MReadMore"><?= $Page->MReadMore->caption() ?><?= $Page->MReadMore->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MReadMore->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_MReadMore"><span id="el_ivf_vitals_history_MReadMore">
<?php $Page->MReadMore->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_MReadMore" name="x_MReadMore" id="x_MReadMore" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->MReadMore->getPlaceHolder()) ?>"<?= $Page->MReadMore->editAttributes() ?> aria-describedby="x_MReadMore_help"><?= $Page->MReadMore->EditValue ?></textarea>
<?= $Page->MReadMore->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MReadMore->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_vitals_historyedit", "editor"], function() {
	ew.createEditor("fivf_vitals_historyedit", "x_MReadMore", 35, 4, <?= $Page->MReadMore->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MariedFor->Visible) { // MariedFor ?>
    <div id="r_MariedFor" class="form-group row">
        <label id="elh_ivf_vitals_history_MariedFor" for="x_MariedFor" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_MariedFor"><?= $Page->MariedFor->caption() ?><?= $Page->MariedFor->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MariedFor->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_MariedFor"><span id="el_ivf_vitals_history_MariedFor">
<input type="<?= $Page->MariedFor->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_MariedFor" name="x_MariedFor" id="x_MariedFor" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MariedFor->getPlaceHolder()) ?>" value="<?= $Page->MariedFor->EditValue ?>"<?= $Page->MariedFor->editAttributes() ?> aria-describedby="x_MariedFor_help">
<?= $Page->MariedFor->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MariedFor->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CMNCM->Visible) { // CMNCM ?>
    <div id="r_CMNCM" class="form-group row">
        <label id="elh_ivf_vitals_history_CMNCM" for="x_CMNCM" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_CMNCM"><?= $Page->CMNCM->caption() ?><?= $Page->CMNCM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CMNCM->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_CMNCM"><span id="el_ivf_vitals_history_CMNCM">
<input type="<?= $Page->CMNCM->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_CMNCM" name="x_CMNCM" id="x_CMNCM" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CMNCM->getPlaceHolder()) ?>" value="<?= $Page->CMNCM->EditValue ?>"<?= $Page->CMNCM->editAttributes() ?> aria-describedby="x_CMNCM_help">
<?= $Page->CMNCM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CMNCM->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateMenstrualHistory->Visible) { // TemplateMenstrualHistory ?>
    <div id="r_TemplateMenstrualHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_TemplateMenstrualHistory" for="x_TemplateMenstrualHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_TemplateMenstrualHistory"><?= $Page->TemplateMenstrualHistory->caption() ?><?= $Page->TemplateMenstrualHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateMenstrualHistory->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_TemplateMenstrualHistory"><span id="el_ivf_vitals_history_TemplateMenstrualHistory">
<?php $Page->TemplateMenstrualHistory->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateMenstrualHistory"
        name="x_TemplateMenstrualHistory"
        class="form-control ew-select<?= $Page->TemplateMenstrualHistory->isInvalidClass() ?>"
        data-select2-id="ivf_vitals_history_x_TemplateMenstrualHistory"
        data-table="ivf_vitals_history"
        data-field="x_TemplateMenstrualHistory"
        data-value-separator="<?= $Page->TemplateMenstrualHistory->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateMenstrualHistory->getPlaceHolder()) ?>"
        <?= $Page->TemplateMenstrualHistory->editAttributes() ?>>
        <?= $Page->TemplateMenstrualHistory->selectOptionListHtml("x_TemplateMenstrualHistory") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplateMenstrualHistory->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateMenstrualHistory" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateMenstrualHistory->caption() ?>" data-title="<?= $Page->TemplateMenstrualHistory->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateMenstrualHistory',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateMenstrualHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateMenstrualHistory->getErrorMessage() ?></div>
<?= $Page->TemplateMenstrualHistory->Lookup->getParamTag($Page, "p_x_TemplateMenstrualHistory") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitals_history_x_TemplateMenstrualHistory']"),
        options = { name: "x_TemplateMenstrualHistory", selectId: "ivf_vitals_history_x_TemplateMenstrualHistory", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitals_history.fields.TemplateMenstrualHistory.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateObstetricHistory->Visible) { // TemplateObstetricHistory ?>
    <div id="r_TemplateObstetricHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_TemplateObstetricHistory" for="x_TemplateObstetricHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_TemplateObstetricHistory"><?= $Page->TemplateObstetricHistory->caption() ?><?= $Page->TemplateObstetricHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateObstetricHistory->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_TemplateObstetricHistory"><span id="el_ivf_vitals_history_TemplateObstetricHistory">
<?php $Page->TemplateObstetricHistory->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateObstetricHistory"
        name="x_TemplateObstetricHistory"
        class="form-control ew-select<?= $Page->TemplateObstetricHistory->isInvalidClass() ?>"
        data-select2-id="ivf_vitals_history_x_TemplateObstetricHistory"
        data-table="ivf_vitals_history"
        data-field="x_TemplateObstetricHistory"
        data-value-separator="<?= $Page->TemplateObstetricHistory->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateObstetricHistory->getPlaceHolder()) ?>"
        <?= $Page->TemplateObstetricHistory->editAttributes() ?>>
        <?= $Page->TemplateObstetricHistory->selectOptionListHtml("x_TemplateObstetricHistory") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplateObstetricHistory->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateObstetricHistory" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateObstetricHistory->caption() ?>" data-title="<?= $Page->TemplateObstetricHistory->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateObstetricHistory',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateObstetricHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateObstetricHistory->getErrorMessage() ?></div>
<?= $Page->TemplateObstetricHistory->Lookup->getParamTag($Page, "p_x_TemplateObstetricHistory") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitals_history_x_TemplateObstetricHistory']"),
        options = { name: "x_TemplateObstetricHistory", selectId: "ivf_vitals_history_x_TemplateObstetricHistory", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitals_history.fields.TemplateObstetricHistory.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateFertilityTreatmentHistory->Visible) { // TemplateFertilityTreatmentHistory ?>
    <div id="r_TemplateFertilityTreatmentHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_TemplateFertilityTreatmentHistory" for="x_TemplateFertilityTreatmentHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_TemplateFertilityTreatmentHistory"><?= $Page->TemplateFertilityTreatmentHistory->caption() ?><?= $Page->TemplateFertilityTreatmentHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateFertilityTreatmentHistory->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_TemplateFertilityTreatmentHistory"><span id="el_ivf_vitals_history_TemplateFertilityTreatmentHistory">
<?php $Page->TemplateFertilityTreatmentHistory->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateFertilityTreatmentHistory"
        name="x_TemplateFertilityTreatmentHistory"
        class="form-control ew-select<?= $Page->TemplateFertilityTreatmentHistory->isInvalidClass() ?>"
        data-select2-id="ivf_vitals_history_x_TemplateFertilityTreatmentHistory"
        data-table="ivf_vitals_history"
        data-field="x_TemplateFertilityTreatmentHistory"
        data-value-separator="<?= $Page->TemplateFertilityTreatmentHistory->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateFertilityTreatmentHistory->getPlaceHolder()) ?>"
        <?= $Page->TemplateFertilityTreatmentHistory->editAttributes() ?>>
        <?= $Page->TemplateFertilityTreatmentHistory->selectOptionListHtml("x_TemplateFertilityTreatmentHistory") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplateFertilityTreatmentHistory->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateFertilityTreatmentHistory" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateFertilityTreatmentHistory->caption() ?>" data-title="<?= $Page->TemplateFertilityTreatmentHistory->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateFertilityTreatmentHistory',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateFertilityTreatmentHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateFertilityTreatmentHistory->getErrorMessage() ?></div>
<?= $Page->TemplateFertilityTreatmentHistory->Lookup->getParamTag($Page, "p_x_TemplateFertilityTreatmentHistory") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitals_history_x_TemplateFertilityTreatmentHistory']"),
        options = { name: "x_TemplateFertilityTreatmentHistory", selectId: "ivf_vitals_history_x_TemplateFertilityTreatmentHistory", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitals_history.fields.TemplateFertilityTreatmentHistory.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateSurgeryHistory->Visible) { // TemplateSurgeryHistory ?>
    <div id="r_TemplateSurgeryHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_TemplateSurgeryHistory" for="x_TemplateSurgeryHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_TemplateSurgeryHistory"><?= $Page->TemplateSurgeryHistory->caption() ?><?= $Page->TemplateSurgeryHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateSurgeryHistory->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_TemplateSurgeryHistory"><span id="el_ivf_vitals_history_TemplateSurgeryHistory">
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateSurgeryHistory"
        name="x_TemplateSurgeryHistory"
        class="form-control ew-select<?= $Page->TemplateSurgeryHistory->isInvalidClass() ?>"
        data-select2-id="ivf_vitals_history_x_TemplateSurgeryHistory"
        data-table="ivf_vitals_history"
        data-field="x_TemplateSurgeryHistory"
        data-value-separator="<?= $Page->TemplateSurgeryHistory->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateSurgeryHistory->getPlaceHolder()) ?>"
        <?= $Page->TemplateSurgeryHistory->editAttributes() ?>>
        <?= $Page->TemplateSurgeryHistory->selectOptionListHtml("x_TemplateSurgeryHistory") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplateSurgeryHistory->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateSurgeryHistory" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateSurgeryHistory->caption() ?>" data-title="<?= $Page->TemplateSurgeryHistory->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateSurgeryHistory',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateSurgeryHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateSurgeryHistory->getErrorMessage() ?></div>
<?= $Page->TemplateSurgeryHistory->Lookup->getParamTag($Page, "p_x_TemplateSurgeryHistory") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitals_history_x_TemplateSurgeryHistory']"),
        options = { name: "x_TemplateSurgeryHistory", selectId: "ivf_vitals_history_x_TemplateSurgeryHistory", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitals_history.fields.TemplateSurgeryHistory.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateFInvestigations->Visible) { // TemplateFInvestigations ?>
    <div id="r_TemplateFInvestigations" class="form-group row">
        <label id="elh_ivf_vitals_history_TemplateFInvestigations" for="x_TemplateFInvestigations" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_TemplateFInvestigations"><?= $Page->TemplateFInvestigations->caption() ?><?= $Page->TemplateFInvestigations->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateFInvestigations->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_TemplateFInvestigations"><span id="el_ivf_vitals_history_TemplateFInvestigations">
<?php $Page->TemplateFInvestigations->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateFInvestigations"
        name="x_TemplateFInvestigations"
        class="form-control ew-select<?= $Page->TemplateFInvestigations->isInvalidClass() ?>"
        data-select2-id="ivf_vitals_history_x_TemplateFInvestigations"
        data-table="ivf_vitals_history"
        data-field="x_TemplateFInvestigations"
        data-value-separator="<?= $Page->TemplateFInvestigations->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateFInvestigations->getPlaceHolder()) ?>"
        <?= $Page->TemplateFInvestigations->editAttributes() ?>>
        <?= $Page->TemplateFInvestigations->selectOptionListHtml("x_TemplateFInvestigations") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplateFInvestigations->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateFInvestigations" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateFInvestigations->caption() ?>" data-title="<?= $Page->TemplateFInvestigations->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateFInvestigations',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateFInvestigations->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateFInvestigations->getErrorMessage() ?></div>
<?= $Page->TemplateFInvestigations->Lookup->getParamTag($Page, "p_x_TemplateFInvestigations") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitals_history_x_TemplateFInvestigations']"),
        options = { name: "x_TemplateFInvestigations", selectId: "ivf_vitals_history_x_TemplateFInvestigations", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitals_history.fields.TemplateFInvestigations.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplatePlanOfManagement->Visible) { // TemplatePlanOfManagement ?>
    <div id="r_TemplatePlanOfManagement" class="form-group row">
        <label id="elh_ivf_vitals_history_TemplatePlanOfManagement" for="x_TemplatePlanOfManagement" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_TemplatePlanOfManagement"><?= $Page->TemplatePlanOfManagement->caption() ?><?= $Page->TemplatePlanOfManagement->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplatePlanOfManagement->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_TemplatePlanOfManagement"><span id="el_ivf_vitals_history_TemplatePlanOfManagement">
<?php $Page->TemplatePlanOfManagement->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplatePlanOfManagement"
        name="x_TemplatePlanOfManagement"
        class="form-control ew-select<?= $Page->TemplatePlanOfManagement->isInvalidClass() ?>"
        data-select2-id="ivf_vitals_history_x_TemplatePlanOfManagement"
        data-table="ivf_vitals_history"
        data-field="x_TemplatePlanOfManagement"
        data-value-separator="<?= $Page->TemplatePlanOfManagement->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplatePlanOfManagement->getPlaceHolder()) ?>"
        <?= $Page->TemplatePlanOfManagement->editAttributes() ?>>
        <?= $Page->TemplatePlanOfManagement->selectOptionListHtml("x_TemplatePlanOfManagement") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplatePlanOfManagement->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplatePlanOfManagement" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplatePlanOfManagement->caption() ?>" data-title="<?= $Page->TemplatePlanOfManagement->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplatePlanOfManagement',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplatePlanOfManagement->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplatePlanOfManagement->getErrorMessage() ?></div>
<?= $Page->TemplatePlanOfManagement->Lookup->getParamTag($Page, "p_x_TemplatePlanOfManagement") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitals_history_x_TemplatePlanOfManagement']"),
        options = { name: "x_TemplatePlanOfManagement", selectId: "ivf_vitals_history_x_TemplatePlanOfManagement", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitals_history.fields.TemplatePlanOfManagement.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplatePImpression->Visible) { // TemplatePImpression ?>
    <div id="r_TemplatePImpression" class="form-group row">
        <label id="elh_ivf_vitals_history_TemplatePImpression" for="x_TemplatePImpression" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_TemplatePImpression"><?= $Page->TemplatePImpression->caption() ?><?= $Page->TemplatePImpression->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplatePImpression->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_TemplatePImpression"><span id="el_ivf_vitals_history_TemplatePImpression">
<?php $Page->TemplatePImpression->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplatePImpression"
        name="x_TemplatePImpression"
        class="form-control ew-select<?= $Page->TemplatePImpression->isInvalidClass() ?>"
        data-select2-id="ivf_vitals_history_x_TemplatePImpression"
        data-table="ivf_vitals_history"
        data-field="x_TemplatePImpression"
        data-value-separator="<?= $Page->TemplatePImpression->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplatePImpression->getPlaceHolder()) ?>"
        <?= $Page->TemplatePImpression->editAttributes() ?>>
        <?= $Page->TemplatePImpression->selectOptionListHtml("x_TemplatePImpression") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplatePImpression->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplatePImpression" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplatePImpression->caption() ?>" data-title="<?= $Page->TemplatePImpression->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplatePImpression',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplatePImpression->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplatePImpression->getErrorMessage() ?></div>
<?= $Page->TemplatePImpression->Lookup->getParamTag($Page, "p_x_TemplatePImpression") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitals_history_x_TemplatePImpression']"),
        options = { name: "x_TemplatePImpression", selectId: "ivf_vitals_history_x_TemplatePImpression", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitals_history.fields.TemplatePImpression.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateMedications->Visible) { // TemplateMedications ?>
    <div id="r_TemplateMedications" class="form-group row">
        <label id="elh_ivf_vitals_history_TemplateMedications" for="x_TemplateMedications" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_TemplateMedications"><?= $Page->TemplateMedications->caption() ?><?= $Page->TemplateMedications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateMedications->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_TemplateMedications"><span id="el_ivf_vitals_history_TemplateMedications">
<?php $Page->TemplateMedications->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateMedications"
        name="x_TemplateMedications"
        class="form-control ew-select<?= $Page->TemplateMedications->isInvalidClass() ?>"
        data-select2-id="ivf_vitals_history_x_TemplateMedications"
        data-table="ivf_vitals_history"
        data-field="x_TemplateMedications"
        data-value-separator="<?= $Page->TemplateMedications->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateMedications->getPlaceHolder()) ?>"
        <?= $Page->TemplateMedications->editAttributes() ?>>
        <?= $Page->TemplateMedications->selectOptionListHtml("x_TemplateMedications") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplateMedications->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateMedications" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateMedications->caption() ?>" data-title="<?= $Page->TemplateMedications->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateMedications',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateMedications->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateMedications->getErrorMessage() ?></div>
<?= $Page->TemplateMedications->Lookup->getParamTag($Page, "p_x_TemplateMedications") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitals_history_x_TemplateMedications']"),
        options = { name: "x_TemplateMedications", selectId: "ivf_vitals_history_x_TemplateMedications", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitals_history.fields.TemplateMedications.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateSemenAnalysis->Visible) { // TemplateSemenAnalysis ?>
    <div id="r_TemplateSemenAnalysis" class="form-group row">
        <label id="elh_ivf_vitals_history_TemplateSemenAnalysis" for="x_TemplateSemenAnalysis" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_TemplateSemenAnalysis"><?= $Page->TemplateSemenAnalysis->caption() ?><?= $Page->TemplateSemenAnalysis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateSemenAnalysis->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_TemplateSemenAnalysis"><span id="el_ivf_vitals_history_TemplateSemenAnalysis">
<?php $Page->TemplateSemenAnalysis->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateSemenAnalysis"
        name="x_TemplateSemenAnalysis"
        class="form-control ew-select<?= $Page->TemplateSemenAnalysis->isInvalidClass() ?>"
        data-select2-id="ivf_vitals_history_x_TemplateSemenAnalysis"
        data-table="ivf_vitals_history"
        data-field="x_TemplateSemenAnalysis"
        data-value-separator="<?= $Page->TemplateSemenAnalysis->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateSemenAnalysis->getPlaceHolder()) ?>"
        <?= $Page->TemplateSemenAnalysis->editAttributes() ?>>
        <?= $Page->TemplateSemenAnalysis->selectOptionListHtml("x_TemplateSemenAnalysis") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplateSemenAnalysis->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateSemenAnalysis" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateSemenAnalysis->caption() ?>" data-title="<?= $Page->TemplateSemenAnalysis->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateSemenAnalysis',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateSemenAnalysis->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateSemenAnalysis->getErrorMessage() ?></div>
<?= $Page->TemplateSemenAnalysis->Lookup->getParamTag($Page, "p_x_TemplateSemenAnalysis") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitals_history_x_TemplateSemenAnalysis']"),
        options = { name: "x_TemplateSemenAnalysis", selectId: "ivf_vitals_history_x_TemplateSemenAnalysis", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitals_history.fields.TemplateSemenAnalysis.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MaleInsvestications->Visible) { // MaleInsvestications ?>
    <div id="r_MaleInsvestications" class="form-group row">
        <label id="elh_ivf_vitals_history_MaleInsvestications" for="x_MaleInsvestications" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_MaleInsvestications"><?= $Page->MaleInsvestications->caption() ?><?= $Page->MaleInsvestications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MaleInsvestications->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_MaleInsvestications"><span id="el_ivf_vitals_history_MaleInsvestications">
<?php $Page->MaleInsvestications->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_MaleInsvestications"
        name="x_MaleInsvestications"
        class="form-control ew-select<?= $Page->MaleInsvestications->isInvalidClass() ?>"
        data-select2-id="ivf_vitals_history_x_MaleInsvestications"
        data-table="ivf_vitals_history"
        data-field="x_MaleInsvestications"
        data-value-separator="<?= $Page->MaleInsvestications->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->MaleInsvestications->getPlaceHolder()) ?>"
        <?= $Page->MaleInsvestications->editAttributes() ?>>
        <?= $Page->MaleInsvestications->selectOptionListHtml("x_MaleInsvestications") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->MaleInsvestications->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_MaleInsvestications" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->MaleInsvestications->caption() ?>" data-title="<?= $Page->MaleInsvestications->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_MaleInsvestications',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->MaleInsvestications->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MaleInsvestications->getErrorMessage() ?></div>
<?= $Page->MaleInsvestications->Lookup->getParamTag($Page, "p_x_MaleInsvestications") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitals_history_x_MaleInsvestications']"),
        options = { name: "x_MaleInsvestications", selectId: "ivf_vitals_history_x_MaleInsvestications", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitals_history.fields.MaleInsvestications.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateMIMpression->Visible) { // TemplateMIMpression ?>
    <div id="r_TemplateMIMpression" class="form-group row">
        <label id="elh_ivf_vitals_history_TemplateMIMpression" for="x_TemplateMIMpression" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_TemplateMIMpression"><?= $Page->TemplateMIMpression->caption() ?><?= $Page->TemplateMIMpression->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateMIMpression->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_TemplateMIMpression"><span id="el_ivf_vitals_history_TemplateMIMpression">
<?php $Page->TemplateMIMpression->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateMIMpression"
        name="x_TemplateMIMpression"
        class="form-control ew-select<?= $Page->TemplateMIMpression->isInvalidClass() ?>"
        data-select2-id="ivf_vitals_history_x_TemplateMIMpression"
        data-table="ivf_vitals_history"
        data-field="x_TemplateMIMpression"
        data-value-separator="<?= $Page->TemplateMIMpression->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateMIMpression->getPlaceHolder()) ?>"
        <?= $Page->TemplateMIMpression->editAttributes() ?>>
        <?= $Page->TemplateMIMpression->selectOptionListHtml("x_TemplateMIMpression") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplateMIMpression->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateMIMpression" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateMIMpression->caption() ?>" data-title="<?= $Page->TemplateMIMpression->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateMIMpression',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateMIMpression->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateMIMpression->getErrorMessage() ?></div>
<?= $Page->TemplateMIMpression->Lookup->getParamTag($Page, "p_x_TemplateMIMpression") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitals_history_x_TemplateMIMpression']"),
        options = { name: "x_TemplateMIMpression", selectId: "ivf_vitals_history_x_TemplateMIMpression", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitals_history.fields.TemplateMIMpression.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateMalePlanOfManagement->Visible) { // TemplateMalePlanOfManagement ?>
    <div id="r_TemplateMalePlanOfManagement" class="form-group row">
        <label id="elh_ivf_vitals_history_TemplateMalePlanOfManagement" for="x_TemplateMalePlanOfManagement" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_TemplateMalePlanOfManagement"><?= $Page->TemplateMalePlanOfManagement->caption() ?><?= $Page->TemplateMalePlanOfManagement->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateMalePlanOfManagement->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_TemplateMalePlanOfManagement"><span id="el_ivf_vitals_history_TemplateMalePlanOfManagement">
<?php $Page->TemplateMalePlanOfManagement->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateMalePlanOfManagement"
        name="x_TemplateMalePlanOfManagement"
        class="form-control ew-select<?= $Page->TemplateMalePlanOfManagement->isInvalidClass() ?>"
        data-select2-id="ivf_vitals_history_x_TemplateMalePlanOfManagement"
        data-table="ivf_vitals_history"
        data-field="x_TemplateMalePlanOfManagement"
        data-value-separator="<?= $Page->TemplateMalePlanOfManagement->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateMalePlanOfManagement->getPlaceHolder()) ?>"
        <?= $Page->TemplateMalePlanOfManagement->editAttributes() ?>>
        <?= $Page->TemplateMalePlanOfManagement->selectOptionListHtml("x_TemplateMalePlanOfManagement") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "ivf_mas_user_template") && !$Page->TemplateMalePlanOfManagement->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateMalePlanOfManagement" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateMalePlanOfManagement->caption() ?>" data-title="<?= $Page->TemplateMalePlanOfManagement->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateMalePlanOfManagement',url:'<?= GetUrl("IvfMasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateMalePlanOfManagement->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateMalePlanOfManagement->getErrorMessage() ?></div>
<?= $Page->TemplateMalePlanOfManagement->Lookup->getParamTag($Page, "p_x_TemplateMalePlanOfManagement") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='ivf_vitals_history_x_TemplateMalePlanOfManagement']"),
        options = { name: "x_TemplateMalePlanOfManagement", selectId: "ivf_vitals_history_x_TemplateMalePlanOfManagement", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.ivf_vitals_history.fields.TemplateMalePlanOfManagement.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_ivf_vitals_history_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_TidNo"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_TidNo"><span id="el_ivf_vitals_history_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pFamilyHistory->Visible) { // pFamilyHistory ?>
    <div id="r_pFamilyHistory" class="form-group row">
        <label id="elh_ivf_vitals_history_pFamilyHistory" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_pFamilyHistory"><?= $Page->pFamilyHistory->caption() ?><?= $Page->pFamilyHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pFamilyHistory->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_pFamilyHistory"><span id="el_ivf_vitals_history_pFamilyHistory">
<?php
$onchange = $Page->pFamilyHistory->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->pFamilyHistory->EditAttrs["onchange"] = "";
?>
<span id="as_x_pFamilyHistory" class="ew-auto-suggest">
    <input type="<?= $Page->pFamilyHistory->getInputTextType() ?>" class="form-control" name="sv_x_pFamilyHistory" id="sv_x_pFamilyHistory" value="<?= RemoveHtml($Page->pFamilyHistory->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pFamilyHistory->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->pFamilyHistory->getPlaceHolder()) ?>"<?= $Page->pFamilyHistory->editAttributes() ?> aria-describedby="x_pFamilyHistory_help">
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="ivf_vitals_history" data-field="x_pFamilyHistory" data-input="sv_x_pFamilyHistory" data-value-separator="<?= $Page->pFamilyHistory->displayValueSeparatorAttribute() ?>" name="x_pFamilyHistory" id="x_pFamilyHistory" value="<?= HtmlEncode($Page->pFamilyHistory->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->pFamilyHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pFamilyHistory->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_vitals_historyedit"], function() {
    fivf_vitals_historyedit.createAutoSuggest(Object.assign({"id":"x_pFamilyHistory","forceSelect":false}, ew.vars.tables.ivf_vitals_history.fields.pFamilyHistory.autoSuggestOptions));
});
</script>
<?= $Page->pFamilyHistory->Lookup->getParamTag($Page, "p_x_pFamilyHistory") ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pTemplateMedications->Visible) { // pTemplateMedications ?>
    <div id="r_pTemplateMedications" class="form-group row">
        <label id="elh_ivf_vitals_history_pTemplateMedications" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_pTemplateMedications"><?= $Page->pTemplateMedications->caption() ?><?= $Page->pTemplateMedications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pTemplateMedications->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_pTemplateMedications"><span id="el_ivf_vitals_history_pTemplateMedications">
<?php $Page->pTemplateMedications->EditAttrs->appendClass("editor"); ?>
<textarea data-table="ivf_vitals_history" data-field="x_pTemplateMedications" name="x_pTemplateMedications" id="x_pTemplateMedications" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->pTemplateMedications->getPlaceHolder()) ?>"<?= $Page->pTemplateMedications->editAttributes() ?> aria-describedby="x_pTemplateMedications_help"><?= $Page->pTemplateMedications->EditValue ?></textarea>
<?= $Page->pTemplateMedications->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pTemplateMedications->getErrorMessage() ?></div>
<script>
loadjs.ready(["fivf_vitals_historyedit", "editor"], function() {
	ew.createEditor("fivf_vitals_historyedit", "x_pTemplateMedications", 35, 4, <?= $Page->pTemplateMedications->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AntiTPO->Visible) { // AntiTPO ?>
    <div id="r_AntiTPO" class="form-group row">
        <label id="elh_ivf_vitals_history_AntiTPO" for="x_AntiTPO" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_AntiTPO"><?= $Page->AntiTPO->caption() ?><?= $Page->AntiTPO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AntiTPO->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_AntiTPO"><span id="el_ivf_vitals_history_AntiTPO">
<input type="<?= $Page->AntiTPO->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_AntiTPO" name="x_AntiTPO" id="x_AntiTPO" size="20" maxlength="45" placeholder="<?= HtmlEncode($Page->AntiTPO->getPlaceHolder()) ?>" value="<?= $Page->AntiTPO->EditValue ?>"<?= $Page->AntiTPO->editAttributes() ?> aria-describedby="x_AntiTPO_help">
<?= $Page->AntiTPO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AntiTPO->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AntiTG->Visible) { // AntiTG ?>
    <div id="r_AntiTG" class="form-group row">
        <label id="elh_ivf_vitals_history_AntiTG" for="x_AntiTG" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_ivf_vitals_history_AntiTG"><?= $Page->AntiTG->caption() ?><?= $Page->AntiTG->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AntiTG->cellAttributes() ?>>
<template id="tpx_ivf_vitals_history_AntiTG"><span id="el_ivf_vitals_history_AntiTG">
<input type="<?= $Page->AntiTG->getInputTextType() ?>" data-table="ivf_vitals_history" data-field="x_AntiTG" name="x_AntiTG" id="x_AntiTG" size="20" maxlength="45" placeholder="<?= HtmlEncode($Page->AntiTG->getPlaceHolder()) ?>" value="<?= $Page->AntiTG->EditValue ?>"<?= $Page->AntiTG->editAttributes() ?> aria-describedby="x_AntiTG_help">
<?= $Page->AntiTG->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AntiTG->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_ivf_vitals_historyedit" class="ew-custom-template"></div>
<template id="tpm_ivf_vitals_historyedit">
<div id="ct_IvfVitalsHistoryEdit"><style>
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
$Iid = $_GET["id"] ;
$dbhelper = &DbHelper();
if($IVFid == null)
{
	$sqla = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where id='".$Iid."'";
	$resultsa = $dbhelper->ExecuteRows($sqla);
	$IVFid = $resultsa[0]["RIDNO"];
	$cid = $resultsa[0]["Name"];
}
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
<div id="divCheckbox" style="display: none;">
<slot class="ew-slot" name="tpc_ivf_vitals_history_RIDNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_RIDNO"></slot>
<slot class="ew-slot" name="tpc_ivf_vitals_history_Name"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_Name"></slot>
</div>
<input type="hidden" id="ivfRIDNO" name="ivfRIDNO" value="<?php echo $IVFid; ?>">
<input type="hidden" id="ivfName" name="ivfName" value="<?php echo $results[0]["Female"]; ?>">
 <?php  if($results[0]["Male"]== '0')
{ echo "Donor ID : ".$results[0]["CoupleID"]; }
else{ echo "Couple ID : ".$results[0]["CoupleID"]; }
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
	$SaveUrl = "";
	$ViewUrl = "";
	$NextUrl = "";
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
</br>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
				 	<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
			  				<tr><td><slot class="ew-slot" name="tpc_ivf_vitals_history_Fheight"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_Fheight"></slot> Cm.</td><td><slot class="ew-slot" name="tpc_ivf_vitals_history_Fweight"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_Fweight"></slot> Kg.</td></tr>
			  			</tbody>
			  		</table>
					<span class="ew-cell col-6"><slot class="ew-slot" name="tpc_ivf_vitals_history_FBMI"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_FBMI"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_IdentificationMark"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_IdentificationMark"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_FBuild"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_FBuild"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_FSkinColor"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_FSkinColor"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_FEyesColor"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_FEyesColor"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_FHairColor"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_FHairColor"></slot></span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_MHairTexture"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_MHairTexture"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_Mothers"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_Mothers"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
			  				<tr><td><slot class="ew-slot" name="tpc_ivf_vitals_history_Mheight"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_Mheight"></slot> Cm.</td><td><slot class="ew-slot" name="tpc_ivf_vitals_history_Mweight"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_Mweight"></slot> Kg.</td></tr>
			  			</tbody>
			  		</table>
					<span class="ew-cell col-6"><slot class="ew-slot" name="tpc_ivf_vitals_history_MBMI"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_MBMI"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_Address"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_Address"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_MBuild"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_MBuild"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_MSkinColor"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_MSkinColor"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_MEyesColor"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_MEyesColor"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_MhairColor"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_MhairColor"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_FhairTexture"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_FhairTexture"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_Fothers"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_Fothers"></slot></span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<input type="hidden" id="Repagehistoryview" name="Repagehistoryview" value="3487">
<table class="ew-table">
	 <tbody>
		<tr>
			<td>
				<button class="btn bg-secondary btn-lg" onClick="callHomeFunction()">Home</button>
			</td>
			<td>
				<button class="btn bg-info btn-lg" onClick="callSaveFunction()">Save</button>
			</td>
			<td>
				<button class="btn bg-warning btn-lg" onClick="callViewFunction()">View</button>
			</td>
			<td>
				<button class="btn bg-success btn-lg" onClick="callNextFunction()">Next</button>
			</td>
		</tr>
	</tbody>
</table>
  				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_MariedFor"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_MariedFor"></slot></span>
				  </div>
				  				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_CMNCM"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_CMNCM"></slot></span>
				  </div>
<slot class="ew-slot" name="tpc_ivf_vitals_history_Chiefcomplaints"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_Chiefcomplaints"></slot>
  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_CoitalHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_CoitalHistory"></slot></span>
				  </div>
				  				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_FertilityTreatmentHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_FertilityTreatmentHistory"></slot></span>
				  </div>
<table class="ew-table">
	 <tbody>
		<tr>
			<td>
				<button class="btn bg-secondary btn-lg" onClick="callHomeFunction()">Home</button>
			</td>
			<td>
				<button class="btn bg-info btn-lg" onClick="callSaveFunction()">Save</button>
			</td>
			<td>
				<button class="btn bg-warning btn-lg" onClick="callViewFunction()">View</button>
			</td>
			<td>
				<button class="btn bg-success btn-lg" onClick="callNextFunction()">Next</button>
			</td>
		</tr>
	</tbody>
</table>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
			 		<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_MenstrualHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_MenstrualHistory"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_ObstetricHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_ObstetricHistory"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_MedicalHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_MedicalHistory"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_SurgeryHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_SurgeryHistory"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_FamilyHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_FamilyHistory"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_PInvestigations"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_PInvestigations"></slot></span>
				  </div>
					<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_pTemplateMedications"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_pTemplateMedications"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
						<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_Addictions"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_Addictions"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_Medical"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_Medical"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_Surgical"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_Surgical"></slot></span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_pFamilyHistory"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_pFamilyHistory"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_SemenAnalysis"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_SemenAnalysis"></slot></span>
				  </div>
				    <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_MInsvestications"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_MInsvestications"></slot></span>
				  </div>
				   <div class="ew-row">
				  		<table class="ew-table">
				  			<tbody>
				  				<tr>
				  					<td>
				  						<button class="btn bg-secondary btn-lg" onClick="callHomeFunction()">Home</button>
				  					</td>		
				  					<td>
										<button class="btn bg-info btn-lg" onClick="callSaveFunction()">Save</button>
									</td>
									<td>
										<button class="btn bg-warning btn-lg" onClick="callViewFunction()">View</button>
									</td>
									<td>
										<button class="btn bg-success btn-lg" onClick="callNextFunction()">Next</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_Medications"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_Medications"></slot></span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<table class="ew-table">
	 <tbody>
		<tr>
			<td>
				<button class="btn bg-secondary btn-lg" onClick="callHomeFunction()">Home</button>
			</td>
			<td>
				<button class="btn bg-info btn-lg" onClick="callSaveFunction()">Save</button>
			</td>
			<td>
				<button class="btn bg-warning btn-lg" onClick="callViewFunction()">View</button>
			</td>
			<td>
				<button class="btn bg-success btn-lg" onClick="callNextFunction()">Next</button>
			</td>
		</tr>
	</tbody>
</table>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
					<span class="ew-cell col-6"><slot class="ew-slot" name="tpc_ivf_vitals_history_PGE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_PGE"></slot></span>
					<span class="ew-cell col-6"><slot class="ew-slot" name="tpc_ivf_vitals_history_PPR"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_PPR"></slot></span>
					<span class="ew-cell col-6"><slot class="ew-slot" name="tpc_ivf_vitals_history_PBP"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_PBP"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_Breast"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_Breast"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_PPA"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_PPA"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_PPSV"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_PPSV"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_PPAPSMEAR"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_PPAPSMEAR"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_PTHYROID"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_PTHYROID"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
						<span class="ew-cell col-6"><slot class="ew-slot" name="tpc_ivf_vitals_history_MTHYROID"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_MTHYROID"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_SecSexCharacters"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_SecSexCharacters"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_PenisUM"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_PenisUM"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_VAS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_VAS"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_EPIDIDYMIS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_EPIDIDYMIS"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_Varicocele"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_Varicocele"></slot></span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<table class="ew-table">
	 <tbody>
		<tr>
			<td>
				<button class="btn bg-secondary btn-lg" onClick="callHomeFunction()">Home</button>
			</td>
			<td>
				<button class="btn bg-info btn-lg" onClick="callSaveFunction()">Save</button>
			</td>
			<td>
				<button class="btn bg-warning btn-lg" onClick="callViewFunction()">View</button>
			</td>
			<td>
				<button class="btn bg-success btn-lg" onClick="callNextFunction()">Next</button>
			</td>
		</tr>
	</tbody>
</table>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
			 		<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_PImpression"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_PImpression"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_PPlanOfManagement"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_PPlanOfManagement"></slot></span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_PReadMore"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_PReadMore"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
						<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_MIMpression"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_MIMpression"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_MPlanOfManagement"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_MPlanOfManagement"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_vitals_history_MReadMore"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_vitals_history_MReadMore"></slot></span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<table class="ew-table">
	 <tbody>
		<tr>
			<td>
				<button class="btn bg-secondary btn-lg" onClick="callHomeFunction()">Home</button>
			</td>
			<td>
				<button class="btn bg-info btn-lg" onClick="callSaveFunction()">Save</button>
			</td>
			<td>
				<button class="btn bg-warning btn-lg" onClick="callViewFunction()">View</button>
			</td>
			<td>
				<button class="btn bg-success btn-lg" onClick="callNextFunction()">Next</button>
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
    ew.applyTemplate("tpd_ivf_vitals_historyedit", "tpm_ivf_vitals_historyedit", "ivf_vitals_historyedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("ivf_vitals_history");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    function calculateBmi(){var e=document.getElementById("x_Fweight").value,t=document.getElementById("x_Fheight").value;if(e>0&&t>0){var n=e/(t/100*t/100);(n=Math.round(1e3*n)/1e3)<18.5&&(n+=" Too Thin"),n>18.5&&n<25&&(n+=" Healthy"),n>25&&(n+=" Over Weight"),document.getElementById("x_FBMI").value=n}}function calculateBmiM(){var e=document.getElementById("x_Mweight").value,t=document.getElementById("x_Mheight").value;if(e>0&&t>0){var n=e/(t/100*t/100);(n=Math.round(1e3*n)/1e3)<18.5&&(n+=" Too Thin"),n>18.5&&n<25&&(n+=" Healthy"),n>25&&(n+=" Over Weight"),document.getElementById("x_MBMI").value=n}}function callSaveFunction(){document.getElementById("Repagehistoryview").value="EditFunction"}function callViewFunction(){document.getElementById("Repagehistoryview").value="ViewFunction"}function callNextFunction(){document.getElementById("Repagehistoryview").value="NextFunction"}function callHomeFunction(){document.getElementById("Repagehistoryview").value="HomeFunction"}document.getElementById("x_Fweight").style.width="80px",document.getElementById("x_Fheight").style.width="80px",document.getElementById("x_Mweight").style.width="80px",document.getElementById("x_Mheight").style.width="80px",$("#x_Fweight").change((function(){calculateBmi()})),$("#x_Fheight").change((function(){calculateBmi()})),$("#x_Mweight").change((function(){calculateBmiM()})),$("#x_Mheight").change((function(){calculateBmiM()}));
});
</script>

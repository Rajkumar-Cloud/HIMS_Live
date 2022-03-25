<?php

namespace PHPMaker2021\project3;

// Page object
$IvfVitalsHistoryView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_vitals_historyview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_vitals_historyview = currentForm = new ew.Form("fivf_vitals_historyview", "view");
    loadjs.done("fivf_vitals_historyview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fivf_vitals_historyview" id="fivf_vitals_historyview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_vitals_history">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_vitals_history_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <tr id="r_RIDNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_RIDNO"><?= $Page->RIDNO->caption() ?></span></td>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el_ivf_vitals_history_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Name"><?= $Page->Name->caption() ?></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Age"><?= $Page->Age->caption() ?></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SEX->Visible) { // SEX ?>
    <tr id="r_SEX">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_SEX"><?= $Page->SEX->caption() ?></span></td>
        <td data-name="SEX" <?= $Page->SEX->cellAttributes() ?>>
<span id="el_ivf_vitals_history_SEX">
<span<?= $Page->SEX->viewAttributes() ?>>
<?= $Page->SEX->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Religion->Visible) { // Religion ?>
    <tr id="r_Religion">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Religion"><?= $Page->Religion->caption() ?></span></td>
        <td data-name="Religion" <?= $Page->Religion->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Religion">
<span<?= $Page->Religion->viewAttributes() ?>>
<?= $Page->Religion->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address->Visible) { // Address ?>
    <tr id="r_Address">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Address"><?= $Page->Address->caption() ?></span></td>
        <td data-name="Address" <?= $Page->Address->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Address">
<span<?= $Page->Address->viewAttributes() ?>>
<?= $Page->Address->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
    <tr id="r_IdentificationMark">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_IdentificationMark"><?= $Page->IdentificationMark->caption() ?></span></td>
        <td data-name="IdentificationMark" <?= $Page->IdentificationMark->cellAttributes() ?>>
<span id="el_ivf_vitals_history_IdentificationMark">
<span<?= $Page->IdentificationMark->viewAttributes() ?>>
<?= $Page->IdentificationMark->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
    <tr id="r_DoublewitnessName1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_DoublewitnessName1"><?= $Page->DoublewitnessName1->caption() ?></span></td>
        <td data-name="DoublewitnessName1" <?= $Page->DoublewitnessName1->cellAttributes() ?>>
<span id="el_ivf_vitals_history_DoublewitnessName1">
<span<?= $Page->DoublewitnessName1->viewAttributes() ?>>
<?= $Page->DoublewitnessName1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
    <tr id="r_DoublewitnessName2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_DoublewitnessName2"><?= $Page->DoublewitnessName2->caption() ?></span></td>
        <td data-name="DoublewitnessName2" <?= $Page->DoublewitnessName2->cellAttributes() ?>>
<span id="el_ivf_vitals_history_DoublewitnessName2">
<span<?= $Page->DoublewitnessName2->viewAttributes() ?>>
<?= $Page->DoublewitnessName2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
    <tr id="r_Chiefcomplaints">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Chiefcomplaints"><?= $Page->Chiefcomplaints->caption() ?></span></td>
        <td data-name="Chiefcomplaints" <?= $Page->Chiefcomplaints->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Chiefcomplaints">
<span<?= $Page->Chiefcomplaints->viewAttributes() ?>>
<?= $Page->Chiefcomplaints->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
    <tr id="r_MenstrualHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MenstrualHistory"><?= $Page->MenstrualHistory->caption() ?></span></td>
        <td data-name="MenstrualHistory" <?= $Page->MenstrualHistory->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MenstrualHistory">
<span<?= $Page->MenstrualHistory->viewAttributes() ?>>
<?= $Page->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ObstetricHistory->Visible) { // ObstetricHistory ?>
    <tr id="r_ObstetricHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_ObstetricHistory"><?= $Page->ObstetricHistory->caption() ?></span></td>
        <td data-name="ObstetricHistory" <?= $Page->ObstetricHistory->cellAttributes() ?>>
<span id="el_ivf_vitals_history_ObstetricHistory">
<span<?= $Page->ObstetricHistory->viewAttributes() ?>>
<?= $Page->ObstetricHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MedicalHistory->Visible) { // MedicalHistory ?>
    <tr id="r_MedicalHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MedicalHistory"><?= $Page->MedicalHistory->caption() ?></span></td>
        <td data-name="MedicalHistory" <?= $Page->MedicalHistory->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MedicalHistory">
<span<?= $Page->MedicalHistory->viewAttributes() ?>>
<?= $Page->MedicalHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
    <tr id="r_SurgicalHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_SurgicalHistory"><?= $Page->SurgicalHistory->caption() ?></span></td>
        <td data-name="SurgicalHistory" <?= $Page->SurgicalHistory->cellAttributes() ?>>
<span id="el_ivf_vitals_history_SurgicalHistory">
<span<?= $Page->SurgicalHistory->viewAttributes() ?>>
<?= $Page->SurgicalHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
    <tr id="r_Generalexaminationpallor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Generalexaminationpallor"><?= $Page->Generalexaminationpallor->caption() ?></span></td>
        <td data-name="Generalexaminationpallor" <?= $Page->Generalexaminationpallor->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Generalexaminationpallor">
<span<?= $Page->Generalexaminationpallor->viewAttributes() ?>>
<?= $Page->Generalexaminationpallor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PR->Visible) { // PR ?>
    <tr id="r_PR">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PR"><?= $Page->PR->caption() ?></span></td>
        <td data-name="PR" <?= $Page->PR->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PR">
<span<?= $Page->PR->viewAttributes() ?>>
<?= $Page->PR->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
    <tr id="r_CVS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_CVS"><?= $Page->CVS->caption() ?></span></td>
        <td data-name="CVS" <?= $Page->CVS->cellAttributes() ?>>
<span id="el_ivf_vitals_history_CVS">
<span<?= $Page->CVS->viewAttributes() ?>>
<?= $Page->CVS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
    <tr id="r_PA">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PA"><?= $Page->PA->caption() ?></span></td>
        <td data-name="PA" <?= $Page->PA->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PA">
<span<?= $Page->PA->viewAttributes() ?>>
<?= $Page->PA->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
    <tr id="r_PROVISIONALDIAGNOSIS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PROVISIONALDIAGNOSIS"><?= $Page->PROVISIONALDIAGNOSIS->caption() ?></span></td>
        <td data-name="PROVISIONALDIAGNOSIS" <?= $Page->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PROVISIONALDIAGNOSIS">
<span<?= $Page->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?= $Page->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Investigations->Visible) { // Investigations ?>
    <tr id="r_Investigations">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Investigations"><?= $Page->Investigations->caption() ?></span></td>
        <td data-name="Investigations" <?= $Page->Investigations->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Investigations">
<span<?= $Page->Investigations->viewAttributes() ?>>
<?= $Page->Investigations->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Fheight->Visible) { // Fheight ?>
    <tr id="r_Fheight">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Fheight"><?= $Page->Fheight->caption() ?></span></td>
        <td data-name="Fheight" <?= $Page->Fheight->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Fheight">
<span<?= $Page->Fheight->viewAttributes() ?>>
<?= $Page->Fheight->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Fweight->Visible) { // Fweight ?>
    <tr id="r_Fweight">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Fweight"><?= $Page->Fweight->caption() ?></span></td>
        <td data-name="Fweight" <?= $Page->Fweight->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Fweight">
<span<?= $Page->Fweight->viewAttributes() ?>>
<?= $Page->Fweight->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FBMI->Visible) { // FBMI ?>
    <tr id="r_FBMI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FBMI"><?= $Page->FBMI->caption() ?></span></td>
        <td data-name="FBMI" <?= $Page->FBMI->cellAttributes() ?>>
<span id="el_ivf_vitals_history_FBMI">
<span<?= $Page->FBMI->viewAttributes() ?>>
<?= $Page->FBMI->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FBloodgroup->Visible) { // FBloodgroup ?>
    <tr id="r_FBloodgroup">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FBloodgroup"><?= $Page->FBloodgroup->caption() ?></span></td>
        <td data-name="FBloodgroup" <?= $Page->FBloodgroup->cellAttributes() ?>>
<span id="el_ivf_vitals_history_FBloodgroup">
<span<?= $Page->FBloodgroup->viewAttributes() ?>>
<?= $Page->FBloodgroup->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mheight->Visible) { // Mheight ?>
    <tr id="r_Mheight">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Mheight"><?= $Page->Mheight->caption() ?></span></td>
        <td data-name="Mheight" <?= $Page->Mheight->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Mheight">
<span<?= $Page->Mheight->viewAttributes() ?>>
<?= $Page->Mheight->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mweight->Visible) { // Mweight ?>
    <tr id="r_Mweight">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Mweight"><?= $Page->Mweight->caption() ?></span></td>
        <td data-name="Mweight" <?= $Page->Mweight->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Mweight">
<span<?= $Page->Mweight->viewAttributes() ?>>
<?= $Page->Mweight->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MBMI->Visible) { // MBMI ?>
    <tr id="r_MBMI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MBMI"><?= $Page->MBMI->caption() ?></span></td>
        <td data-name="MBMI" <?= $Page->MBMI->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MBMI">
<span<?= $Page->MBMI->viewAttributes() ?>>
<?= $Page->MBMI->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MBloodgroup->Visible) { // MBloodgroup ?>
    <tr id="r_MBloodgroup">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MBloodgroup"><?= $Page->MBloodgroup->caption() ?></span></td>
        <td data-name="MBloodgroup" <?= $Page->MBloodgroup->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MBloodgroup">
<span<?= $Page->MBloodgroup->viewAttributes() ?>>
<?= $Page->MBloodgroup->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FBuild->Visible) { // FBuild ?>
    <tr id="r_FBuild">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FBuild"><?= $Page->FBuild->caption() ?></span></td>
        <td data-name="FBuild" <?= $Page->FBuild->cellAttributes() ?>>
<span id="el_ivf_vitals_history_FBuild">
<span<?= $Page->FBuild->viewAttributes() ?>>
<?= $Page->FBuild->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MBuild->Visible) { // MBuild ?>
    <tr id="r_MBuild">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MBuild"><?= $Page->MBuild->caption() ?></span></td>
        <td data-name="MBuild" <?= $Page->MBuild->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MBuild">
<span<?= $Page->MBuild->viewAttributes() ?>>
<?= $Page->MBuild->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FSkinColor->Visible) { // FSkinColor ?>
    <tr id="r_FSkinColor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FSkinColor"><?= $Page->FSkinColor->caption() ?></span></td>
        <td data-name="FSkinColor" <?= $Page->FSkinColor->cellAttributes() ?>>
<span id="el_ivf_vitals_history_FSkinColor">
<span<?= $Page->FSkinColor->viewAttributes() ?>>
<?= $Page->FSkinColor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MSkinColor->Visible) { // MSkinColor ?>
    <tr id="r_MSkinColor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MSkinColor"><?= $Page->MSkinColor->caption() ?></span></td>
        <td data-name="MSkinColor" <?= $Page->MSkinColor->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MSkinColor">
<span<?= $Page->MSkinColor->viewAttributes() ?>>
<?= $Page->MSkinColor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FEyesColor->Visible) { // FEyesColor ?>
    <tr id="r_FEyesColor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FEyesColor"><?= $Page->FEyesColor->caption() ?></span></td>
        <td data-name="FEyesColor" <?= $Page->FEyesColor->cellAttributes() ?>>
<span id="el_ivf_vitals_history_FEyesColor">
<span<?= $Page->FEyesColor->viewAttributes() ?>>
<?= $Page->FEyesColor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MEyesColor->Visible) { // MEyesColor ?>
    <tr id="r_MEyesColor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MEyesColor"><?= $Page->MEyesColor->caption() ?></span></td>
        <td data-name="MEyesColor" <?= $Page->MEyesColor->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MEyesColor">
<span<?= $Page->MEyesColor->viewAttributes() ?>>
<?= $Page->MEyesColor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FHairColor->Visible) { // FHairColor ?>
    <tr id="r_FHairColor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FHairColor"><?= $Page->FHairColor->caption() ?></span></td>
        <td data-name="FHairColor" <?= $Page->FHairColor->cellAttributes() ?>>
<span id="el_ivf_vitals_history_FHairColor">
<span<?= $Page->FHairColor->viewAttributes() ?>>
<?= $Page->FHairColor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MhairColor->Visible) { // MhairColor ?>
    <tr id="r_MhairColor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MhairColor"><?= $Page->MhairColor->caption() ?></span></td>
        <td data-name="MhairColor" <?= $Page->MhairColor->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MhairColor">
<span<?= $Page->MhairColor->viewAttributes() ?>>
<?= $Page->MhairColor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FhairTexture->Visible) { // FhairTexture ?>
    <tr id="r_FhairTexture">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FhairTexture"><?= $Page->FhairTexture->caption() ?></span></td>
        <td data-name="FhairTexture" <?= $Page->FhairTexture->cellAttributes() ?>>
<span id="el_ivf_vitals_history_FhairTexture">
<span<?= $Page->FhairTexture->viewAttributes() ?>>
<?= $Page->FhairTexture->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MHairTexture->Visible) { // MHairTexture ?>
    <tr id="r_MHairTexture">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MHairTexture"><?= $Page->MHairTexture->caption() ?></span></td>
        <td data-name="MHairTexture" <?= $Page->MHairTexture->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MHairTexture">
<span<?= $Page->MHairTexture->viewAttributes() ?>>
<?= $Page->MHairTexture->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Fothers->Visible) { // Fothers ?>
    <tr id="r_Fothers">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Fothers"><?= $Page->Fothers->caption() ?></span></td>
        <td data-name="Fothers" <?= $Page->Fothers->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Fothers">
<span<?= $Page->Fothers->viewAttributes() ?>>
<?= $Page->Fothers->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mothers->Visible) { // Mothers ?>
    <tr id="r_Mothers">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Mothers"><?= $Page->Mothers->caption() ?></span></td>
        <td data-name="Mothers" <?= $Page->Mothers->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Mothers">
<span<?= $Page->Mothers->viewAttributes() ?>>
<?= $Page->Mothers->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PGE->Visible) { // PGE ?>
    <tr id="r_PGE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PGE"><?= $Page->PGE->caption() ?></span></td>
        <td data-name="PGE" <?= $Page->PGE->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PGE">
<span<?= $Page->PGE->viewAttributes() ?>>
<?= $Page->PGE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PPR->Visible) { // PPR ?>
    <tr id="r_PPR">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PPR"><?= $Page->PPR->caption() ?></span></td>
        <td data-name="PPR" <?= $Page->PPR->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PPR">
<span<?= $Page->PPR->viewAttributes() ?>>
<?= $Page->PPR->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PBP->Visible) { // PBP ?>
    <tr id="r_PBP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PBP"><?= $Page->PBP->caption() ?></span></td>
        <td data-name="PBP" <?= $Page->PBP->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PBP">
<span<?= $Page->PBP->viewAttributes() ?>>
<?= $Page->PBP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Breast->Visible) { // Breast ?>
    <tr id="r_Breast">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Breast"><?= $Page->Breast->caption() ?></span></td>
        <td data-name="Breast" <?= $Page->Breast->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Breast">
<span<?= $Page->Breast->viewAttributes() ?>>
<?= $Page->Breast->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PPA->Visible) { // PPA ?>
    <tr id="r_PPA">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PPA"><?= $Page->PPA->caption() ?></span></td>
        <td data-name="PPA" <?= $Page->PPA->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PPA">
<span<?= $Page->PPA->viewAttributes() ?>>
<?= $Page->PPA->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PPSV->Visible) { // PPSV ?>
    <tr id="r_PPSV">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PPSV"><?= $Page->PPSV->caption() ?></span></td>
        <td data-name="PPSV" <?= $Page->PPSV->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PPSV">
<span<?= $Page->PPSV->viewAttributes() ?>>
<?= $Page->PPSV->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
    <tr id="r_PPAPSMEAR">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PPAPSMEAR"><?= $Page->PPAPSMEAR->caption() ?></span></td>
        <td data-name="PPAPSMEAR" <?= $Page->PPAPSMEAR->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PPAPSMEAR">
<span<?= $Page->PPAPSMEAR->viewAttributes() ?>>
<?= $Page->PPAPSMEAR->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PTHYROID->Visible) { // PTHYROID ?>
    <tr id="r_PTHYROID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PTHYROID"><?= $Page->PTHYROID->caption() ?></span></td>
        <td data-name="PTHYROID" <?= $Page->PTHYROID->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PTHYROID">
<span<?= $Page->PTHYROID->viewAttributes() ?>>
<?= $Page->PTHYROID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MTHYROID->Visible) { // MTHYROID ?>
    <tr id="r_MTHYROID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MTHYROID"><?= $Page->MTHYROID->caption() ?></span></td>
        <td data-name="MTHYROID" <?= $Page->MTHYROID->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MTHYROID">
<span<?= $Page->MTHYROID->viewAttributes() ?>>
<?= $Page->MTHYROID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SecSexCharacters->Visible) { // SecSexCharacters ?>
    <tr id="r_SecSexCharacters">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_SecSexCharacters"><?= $Page->SecSexCharacters->caption() ?></span></td>
        <td data-name="SecSexCharacters" <?= $Page->SecSexCharacters->cellAttributes() ?>>
<span id="el_ivf_vitals_history_SecSexCharacters">
<span<?= $Page->SecSexCharacters->viewAttributes() ?>>
<?= $Page->SecSexCharacters->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PenisUM->Visible) { // PenisUM ?>
    <tr id="r_PenisUM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PenisUM"><?= $Page->PenisUM->caption() ?></span></td>
        <td data-name="PenisUM" <?= $Page->PenisUM->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PenisUM">
<span<?= $Page->PenisUM->viewAttributes() ?>>
<?= $Page->PenisUM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VAS->Visible) { // VAS ?>
    <tr id="r_VAS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_VAS"><?= $Page->VAS->caption() ?></span></td>
        <td data-name="VAS" <?= $Page->VAS->cellAttributes() ?>>
<span id="el_ivf_vitals_history_VAS">
<span<?= $Page->VAS->viewAttributes() ?>>
<?= $Page->VAS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
    <tr id="r_EPIDIDYMIS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_EPIDIDYMIS"><?= $Page->EPIDIDYMIS->caption() ?></span></td>
        <td data-name="EPIDIDYMIS" <?= $Page->EPIDIDYMIS->cellAttributes() ?>>
<span id="el_ivf_vitals_history_EPIDIDYMIS">
<span<?= $Page->EPIDIDYMIS->viewAttributes() ?>>
<?= $Page->EPIDIDYMIS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Varicocele->Visible) { // Varicocele ?>
    <tr id="r_Varicocele">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Varicocele"><?= $Page->Varicocele->caption() ?></span></td>
        <td data-name="Varicocele" <?= $Page->Varicocele->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Varicocele">
<span<?= $Page->Varicocele->viewAttributes() ?>>
<?= $Page->Varicocele->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FertilityTreatmentHistory->Visible) { // FertilityTreatmentHistory ?>
    <tr id="r_FertilityTreatmentHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FertilityTreatmentHistory"><?= $Page->FertilityTreatmentHistory->caption() ?></span></td>
        <td data-name="FertilityTreatmentHistory" <?= $Page->FertilityTreatmentHistory->cellAttributes() ?>>
<span id="el_ivf_vitals_history_FertilityTreatmentHistory">
<span<?= $Page->FertilityTreatmentHistory->viewAttributes() ?>>
<?= $Page->FertilityTreatmentHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SurgeryHistory->Visible) { // SurgeryHistory ?>
    <tr id="r_SurgeryHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_SurgeryHistory"><?= $Page->SurgeryHistory->caption() ?></span></td>
        <td data-name="SurgeryHistory" <?= $Page->SurgeryHistory->cellAttributes() ?>>
<span id="el_ivf_vitals_history_SurgeryHistory">
<span<?= $Page->SurgeryHistory->viewAttributes() ?>>
<?= $Page->SurgeryHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
    <tr id="r_FamilyHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_FamilyHistory"><?= $Page->FamilyHistory->caption() ?></span></td>
        <td data-name="FamilyHistory" <?= $Page->FamilyHistory->cellAttributes() ?>>
<span id="el_ivf_vitals_history_FamilyHistory">
<span<?= $Page->FamilyHistory->viewAttributes() ?>>
<?= $Page->FamilyHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PInvestigations->Visible) { // PInvestigations ?>
    <tr id="r_PInvestigations">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PInvestigations"><?= $Page->PInvestigations->caption() ?></span></td>
        <td data-name="PInvestigations" <?= $Page->PInvestigations->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PInvestigations">
<span<?= $Page->PInvestigations->viewAttributes() ?>>
<?= $Page->PInvestigations->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Addictions->Visible) { // Addictions ?>
    <tr id="r_Addictions">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Addictions"><?= $Page->Addictions->caption() ?></span></td>
        <td data-name="Addictions" <?= $Page->Addictions->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Addictions">
<span<?= $Page->Addictions->viewAttributes() ?>>
<?= $Page->Addictions->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Medications->Visible) { // Medications ?>
    <tr id="r_Medications">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Medications"><?= $Page->Medications->caption() ?></span></td>
        <td data-name="Medications" <?= $Page->Medications->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Medications">
<span<?= $Page->Medications->viewAttributes() ?>>
<?= $Page->Medications->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Medical->Visible) { // Medical ?>
    <tr id="r_Medical">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Medical"><?= $Page->Medical->caption() ?></span></td>
        <td data-name="Medical" <?= $Page->Medical->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Medical">
<span<?= $Page->Medical->viewAttributes() ?>>
<?= $Page->Medical->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Surgical->Visible) { // Surgical ?>
    <tr id="r_Surgical">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_Surgical"><?= $Page->Surgical->caption() ?></span></td>
        <td data-name="Surgical" <?= $Page->Surgical->cellAttributes() ?>>
<span id="el_ivf_vitals_history_Surgical">
<span<?= $Page->Surgical->viewAttributes() ?>>
<?= $Page->Surgical->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CoitalHistory->Visible) { // CoitalHistory ?>
    <tr id="r_CoitalHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_CoitalHistory"><?= $Page->CoitalHistory->caption() ?></span></td>
        <td data-name="CoitalHistory" <?= $Page->CoitalHistory->cellAttributes() ?>>
<span id="el_ivf_vitals_history_CoitalHistory">
<span<?= $Page->CoitalHistory->viewAttributes() ?>>
<?= $Page->CoitalHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SemenAnalysis->Visible) { // SemenAnalysis ?>
    <tr id="r_SemenAnalysis">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_SemenAnalysis"><?= $Page->SemenAnalysis->caption() ?></span></td>
        <td data-name="SemenAnalysis" <?= $Page->SemenAnalysis->cellAttributes() ?>>
<span id="el_ivf_vitals_history_SemenAnalysis">
<span<?= $Page->SemenAnalysis->viewAttributes() ?>>
<?= $Page->SemenAnalysis->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MInsvestications->Visible) { // MInsvestications ?>
    <tr id="r_MInsvestications">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MInsvestications"><?= $Page->MInsvestications->caption() ?></span></td>
        <td data-name="MInsvestications" <?= $Page->MInsvestications->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MInsvestications">
<span<?= $Page->MInsvestications->viewAttributes() ?>>
<?= $Page->MInsvestications->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PImpression->Visible) { // PImpression ?>
    <tr id="r_PImpression">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PImpression"><?= $Page->PImpression->caption() ?></span></td>
        <td data-name="PImpression" <?= $Page->PImpression->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PImpression">
<span<?= $Page->PImpression->viewAttributes() ?>>
<?= $Page->PImpression->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MIMpression->Visible) { // MIMpression ?>
    <tr id="r_MIMpression">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MIMpression"><?= $Page->MIMpression->caption() ?></span></td>
        <td data-name="MIMpression" <?= $Page->MIMpression->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MIMpression">
<span<?= $Page->MIMpression->viewAttributes() ?>>
<?= $Page->MIMpression->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PPlanOfManagement->Visible) { // PPlanOfManagement ?>
    <tr id="r_PPlanOfManagement">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PPlanOfManagement"><?= $Page->PPlanOfManagement->caption() ?></span></td>
        <td data-name="PPlanOfManagement" <?= $Page->PPlanOfManagement->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PPlanOfManagement">
<span<?= $Page->PPlanOfManagement->viewAttributes() ?>>
<?= $Page->PPlanOfManagement->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MPlanOfManagement->Visible) { // MPlanOfManagement ?>
    <tr id="r_MPlanOfManagement">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MPlanOfManagement"><?= $Page->MPlanOfManagement->caption() ?></span></td>
        <td data-name="MPlanOfManagement" <?= $Page->MPlanOfManagement->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MPlanOfManagement">
<span<?= $Page->MPlanOfManagement->viewAttributes() ?>>
<?= $Page->MPlanOfManagement->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PReadMore->Visible) { // PReadMore ?>
    <tr id="r_PReadMore">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_PReadMore"><?= $Page->PReadMore->caption() ?></span></td>
        <td data-name="PReadMore" <?= $Page->PReadMore->cellAttributes() ?>>
<span id="el_ivf_vitals_history_PReadMore">
<span<?= $Page->PReadMore->viewAttributes() ?>>
<?= $Page->PReadMore->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MReadMore->Visible) { // MReadMore ?>
    <tr id="r_MReadMore">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MReadMore"><?= $Page->MReadMore->caption() ?></span></td>
        <td data-name="MReadMore" <?= $Page->MReadMore->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MReadMore">
<span<?= $Page->MReadMore->viewAttributes() ?>>
<?= $Page->MReadMore->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MariedFor->Visible) { // MariedFor ?>
    <tr id="r_MariedFor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_MariedFor"><?= $Page->MariedFor->caption() ?></span></td>
        <td data-name="MariedFor" <?= $Page->MariedFor->cellAttributes() ?>>
<span id="el_ivf_vitals_history_MariedFor">
<span<?= $Page->MariedFor->viewAttributes() ?>>
<?= $Page->MariedFor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CMNCM->Visible) { // CMNCM ?>
    <tr id="r_CMNCM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_CMNCM"><?= $Page->CMNCM->caption() ?></span></td>
        <td data-name="CMNCM" <?= $Page->CMNCM->cellAttributes() ?>>
<span id="el_ivf_vitals_history_CMNCM">
<span<?= $Page->CMNCM->viewAttributes() ?>>
<?= $Page->CMNCM->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_TidNo"><?= $Page->TidNo->caption() ?></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_vitals_history_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pFamilyHistory->Visible) { // pFamilyHistory ?>
    <tr id="r_pFamilyHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_pFamilyHistory"><?= $Page->pFamilyHistory->caption() ?></span></td>
        <td data-name="pFamilyHistory" <?= $Page->pFamilyHistory->cellAttributes() ?>>
<span id="el_ivf_vitals_history_pFamilyHistory">
<span<?= $Page->pFamilyHistory->viewAttributes() ?>>
<?= $Page->pFamilyHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pTemplateMedications->Visible) { // pTemplateMedications ?>
    <tr id="r_pTemplateMedications">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_vitals_history_pTemplateMedications"><?= $Page->pTemplateMedications->caption() ?></span></td>
        <td data-name="pTemplateMedications" <?= $Page->pTemplateMedications->cellAttributes() ?>>
<span id="el_ivf_vitals_history_pTemplateMedications">
<span<?= $Page->pTemplateMedications->viewAttributes() ?>>
<?= $Page->pTemplateMedications->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

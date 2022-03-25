<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewVitalsHistoryView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_vitals_historyview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fview_vitals_historyview = currentForm = new ew.Form("fview_vitals_historyview", "view");
    loadjs.done("fview_vitals_historyview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.view_vitals_history) ew.vars.tables.view_vitals_history = <?= JsonEncode(GetClientVar("tables", "view_vitals_history")) ?>;
</script>
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
<form name="fview_vitals_historyview" id="fview_vitals_historyview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_vitals_history">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_id"><template id="tpc_view_vitals_history_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_view_vitals_history_id"><span id="el_view_vitals_history_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <tr id="r_RIDNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_RIDNO"><template id="tpc_view_vitals_history_RIDNO"><?= $Page->RIDNO->caption() ?></template></span></td>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<template id="tpx_view_vitals_history_RIDNO"><span id="el_view_vitals_history_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Name"><template id="tpc_view_vitals_history_Name"><?= $Page->Name->caption() ?></template></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<template id="tpx_view_vitals_history_Name"><span id="el_view_vitals_history_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Age"><template id="tpc_view_vitals_history_Age"><?= $Page->Age->caption() ?></template></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_view_vitals_history_Age"><span id="el_view_vitals_history_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SEX->Visible) { // SEX ?>
    <tr id="r_SEX">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_SEX"><template id="tpc_view_vitals_history_SEX"><?= $Page->SEX->caption() ?></template></span></td>
        <td data-name="SEX" <?= $Page->SEX->cellAttributes() ?>>
<template id="tpx_view_vitals_history_SEX"><span id="el_view_vitals_history_SEX">
<span<?= $Page->SEX->viewAttributes() ?>>
<?= $Page->SEX->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Religion->Visible) { // Religion ?>
    <tr id="r_Religion">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Religion"><template id="tpc_view_vitals_history_Religion"><?= $Page->Religion->caption() ?></template></span></td>
        <td data-name="Religion" <?= $Page->Religion->cellAttributes() ?>>
<template id="tpx_view_vitals_history_Religion"><span id="el_view_vitals_history_Religion">
<span<?= $Page->Religion->viewAttributes() ?>>
<?= $Page->Religion->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address->Visible) { // Address ?>
    <tr id="r_Address">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Address"><template id="tpc_view_vitals_history_Address"><?= $Page->Address->caption() ?></template></span></td>
        <td data-name="Address" <?= $Page->Address->cellAttributes() ?>>
<template id="tpx_view_vitals_history_Address"><span id="el_view_vitals_history_Address">
<span<?= $Page->Address->viewAttributes() ?>>
<?= $Page->Address->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
    <tr id="r_IdentificationMark">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_IdentificationMark"><template id="tpc_view_vitals_history_IdentificationMark"><?= $Page->IdentificationMark->caption() ?></template></span></td>
        <td data-name="IdentificationMark" <?= $Page->IdentificationMark->cellAttributes() ?>>
<template id="tpx_view_vitals_history_IdentificationMark"><span id="el_view_vitals_history_IdentificationMark">
<span<?= $Page->IdentificationMark->viewAttributes() ?>>
<?= $Page->IdentificationMark->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DoublewitnessName1->Visible) { // DoublewitnessName1 ?>
    <tr id="r_DoublewitnessName1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_DoublewitnessName1"><template id="tpc_view_vitals_history_DoublewitnessName1"><?= $Page->DoublewitnessName1->caption() ?></template></span></td>
        <td data-name="DoublewitnessName1" <?= $Page->DoublewitnessName1->cellAttributes() ?>>
<template id="tpx_view_vitals_history_DoublewitnessName1"><span id="el_view_vitals_history_DoublewitnessName1">
<span<?= $Page->DoublewitnessName1->viewAttributes() ?>>
<?= $Page->DoublewitnessName1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DoublewitnessName2->Visible) { // DoublewitnessName2 ?>
    <tr id="r_DoublewitnessName2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_DoublewitnessName2"><template id="tpc_view_vitals_history_DoublewitnessName2"><?= $Page->DoublewitnessName2->caption() ?></template></span></td>
        <td data-name="DoublewitnessName2" <?= $Page->DoublewitnessName2->cellAttributes() ?>>
<template id="tpx_view_vitals_history_DoublewitnessName2"><span id="el_view_vitals_history_DoublewitnessName2">
<span<?= $Page->DoublewitnessName2->viewAttributes() ?>>
<?= $Page->DoublewitnessName2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
    <tr id="r_Chiefcomplaints">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Chiefcomplaints"><template id="tpc_view_vitals_history_Chiefcomplaints"><?= $Page->Chiefcomplaints->caption() ?></template></span></td>
        <td data-name="Chiefcomplaints" <?= $Page->Chiefcomplaints->cellAttributes() ?>>
<template id="tpx_view_vitals_history_Chiefcomplaints"><span id="el_view_vitals_history_Chiefcomplaints">
<span<?= $Page->Chiefcomplaints->viewAttributes() ?>>
<?= $Page->Chiefcomplaints->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
    <tr id="r_MenstrualHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MenstrualHistory"><template id="tpc_view_vitals_history_MenstrualHistory"><?= $Page->MenstrualHistory->caption() ?></template></span></td>
        <td data-name="MenstrualHistory" <?= $Page->MenstrualHistory->cellAttributes() ?>>
<template id="tpx_view_vitals_history_MenstrualHistory"><span id="el_view_vitals_history_MenstrualHistory">
<span<?= $Page->MenstrualHistory->viewAttributes() ?>>
<?= $Page->MenstrualHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ObstetricHistory->Visible) { // ObstetricHistory ?>
    <tr id="r_ObstetricHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_ObstetricHistory"><template id="tpc_view_vitals_history_ObstetricHistory"><?= $Page->ObstetricHistory->caption() ?></template></span></td>
        <td data-name="ObstetricHistory" <?= $Page->ObstetricHistory->cellAttributes() ?>>
<template id="tpx_view_vitals_history_ObstetricHistory"><span id="el_view_vitals_history_ObstetricHistory">
<span<?= $Page->ObstetricHistory->viewAttributes() ?>>
<?= $Page->ObstetricHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MedicalHistory->Visible) { // MedicalHistory ?>
    <tr id="r_MedicalHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MedicalHistory"><template id="tpc_view_vitals_history_MedicalHistory"><?= $Page->MedicalHistory->caption() ?></template></span></td>
        <td data-name="MedicalHistory" <?= $Page->MedicalHistory->cellAttributes() ?>>
<template id="tpx_view_vitals_history_MedicalHistory"><span id="el_view_vitals_history_MedicalHistory">
<span<?= $Page->MedicalHistory->viewAttributes() ?>>
<?= $Page->MedicalHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
    <tr id="r_SurgicalHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_SurgicalHistory"><template id="tpc_view_vitals_history_SurgicalHistory"><?= $Page->SurgicalHistory->caption() ?></template></span></td>
        <td data-name="SurgicalHistory" <?= $Page->SurgicalHistory->cellAttributes() ?>>
<template id="tpx_view_vitals_history_SurgicalHistory"><span id="el_view_vitals_history_SurgicalHistory">
<span<?= $Page->SurgicalHistory->viewAttributes() ?>>
<?= $Page->SurgicalHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Generalexaminationpallor->Visible) { // Generalexaminationpallor ?>
    <tr id="r_Generalexaminationpallor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Generalexaminationpallor"><template id="tpc_view_vitals_history_Generalexaminationpallor"><?= $Page->Generalexaminationpallor->caption() ?></template></span></td>
        <td data-name="Generalexaminationpallor" <?= $Page->Generalexaminationpallor->cellAttributes() ?>>
<template id="tpx_view_vitals_history_Generalexaminationpallor"><span id="el_view_vitals_history_Generalexaminationpallor">
<span<?= $Page->Generalexaminationpallor->viewAttributes() ?>>
<?= $Page->Generalexaminationpallor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PR->Visible) { // PR ?>
    <tr id="r_PR">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PR"><template id="tpc_view_vitals_history_PR"><?= $Page->PR->caption() ?></template></span></td>
        <td data-name="PR" <?= $Page->PR->cellAttributes() ?>>
<template id="tpx_view_vitals_history_PR"><span id="el_view_vitals_history_PR">
<span<?= $Page->PR->viewAttributes() ?>>
<?= $Page->PR->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
    <tr id="r_CVS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_CVS"><template id="tpc_view_vitals_history_CVS"><?= $Page->CVS->caption() ?></template></span></td>
        <td data-name="CVS" <?= $Page->CVS->cellAttributes() ?>>
<template id="tpx_view_vitals_history_CVS"><span id="el_view_vitals_history_CVS">
<span<?= $Page->CVS->viewAttributes() ?>>
<?= $Page->CVS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
    <tr id="r_PA">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PA"><template id="tpc_view_vitals_history_PA"><?= $Page->PA->caption() ?></template></span></td>
        <td data-name="PA" <?= $Page->PA->cellAttributes() ?>>
<template id="tpx_view_vitals_history_PA"><span id="el_view_vitals_history_PA">
<span<?= $Page->PA->viewAttributes() ?>>
<?= $Page->PA->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
    <tr id="r_PROVISIONALDIAGNOSIS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PROVISIONALDIAGNOSIS"><template id="tpc_view_vitals_history_PROVISIONALDIAGNOSIS"><?= $Page->PROVISIONALDIAGNOSIS->caption() ?></template></span></td>
        <td data-name="PROVISIONALDIAGNOSIS" <?= $Page->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<template id="tpx_view_vitals_history_PROVISIONALDIAGNOSIS"><span id="el_view_vitals_history_PROVISIONALDIAGNOSIS">
<span<?= $Page->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?= $Page->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Investigations->Visible) { // Investigations ?>
    <tr id="r_Investigations">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Investigations"><template id="tpc_view_vitals_history_Investigations"><?= $Page->Investigations->caption() ?></template></span></td>
        <td data-name="Investigations" <?= $Page->Investigations->cellAttributes() ?>>
<template id="tpx_view_vitals_history_Investigations"><span id="el_view_vitals_history_Investigations">
<span<?= $Page->Investigations->viewAttributes() ?>>
<?= $Page->Investigations->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Fheight->Visible) { // Fheight ?>
    <tr id="r_Fheight">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Fheight"><template id="tpc_view_vitals_history_Fheight"><?= $Page->Fheight->caption() ?></template></span></td>
        <td data-name="Fheight" <?= $Page->Fheight->cellAttributes() ?>>
<template id="tpx_view_vitals_history_Fheight"><span id="el_view_vitals_history_Fheight">
<span<?= $Page->Fheight->viewAttributes() ?>>
<?= $Page->Fheight->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Fweight->Visible) { // Fweight ?>
    <tr id="r_Fweight">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Fweight"><template id="tpc_view_vitals_history_Fweight"><?= $Page->Fweight->caption() ?></template></span></td>
        <td data-name="Fweight" <?= $Page->Fweight->cellAttributes() ?>>
<template id="tpx_view_vitals_history_Fweight"><span id="el_view_vitals_history_Fweight">
<span<?= $Page->Fweight->viewAttributes() ?>>
<?= $Page->Fweight->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FBMI->Visible) { // FBMI ?>
    <tr id="r_FBMI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_FBMI"><template id="tpc_view_vitals_history_FBMI"><?= $Page->FBMI->caption() ?></template></span></td>
        <td data-name="FBMI" <?= $Page->FBMI->cellAttributes() ?>>
<template id="tpx_view_vitals_history_FBMI"><span id="el_view_vitals_history_FBMI">
<span<?= $Page->FBMI->viewAttributes() ?>>
<?= $Page->FBMI->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FBloodgroup->Visible) { // FBloodgroup ?>
    <tr id="r_FBloodgroup">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_FBloodgroup"><template id="tpc_view_vitals_history_FBloodgroup"><?= $Page->FBloodgroup->caption() ?></template></span></td>
        <td data-name="FBloodgroup" <?= $Page->FBloodgroup->cellAttributes() ?>>
<template id="tpx_view_vitals_history_FBloodgroup"><span id="el_view_vitals_history_FBloodgroup">
<span<?= $Page->FBloodgroup->viewAttributes() ?>>
<?= $Page->FBloodgroup->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mheight->Visible) { // Mheight ?>
    <tr id="r_Mheight">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Mheight"><template id="tpc_view_vitals_history_Mheight"><?= $Page->Mheight->caption() ?></template></span></td>
        <td data-name="Mheight" <?= $Page->Mheight->cellAttributes() ?>>
<template id="tpx_view_vitals_history_Mheight"><span id="el_view_vitals_history_Mheight">
<span<?= $Page->Mheight->viewAttributes() ?>>
<?= $Page->Mheight->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mweight->Visible) { // Mweight ?>
    <tr id="r_Mweight">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Mweight"><template id="tpc_view_vitals_history_Mweight"><?= $Page->Mweight->caption() ?></template></span></td>
        <td data-name="Mweight" <?= $Page->Mweight->cellAttributes() ?>>
<template id="tpx_view_vitals_history_Mweight"><span id="el_view_vitals_history_Mweight">
<span<?= $Page->Mweight->viewAttributes() ?>>
<?= $Page->Mweight->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MBMI->Visible) { // MBMI ?>
    <tr id="r_MBMI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MBMI"><template id="tpc_view_vitals_history_MBMI"><?= $Page->MBMI->caption() ?></template></span></td>
        <td data-name="MBMI" <?= $Page->MBMI->cellAttributes() ?>>
<template id="tpx_view_vitals_history_MBMI"><span id="el_view_vitals_history_MBMI">
<span<?= $Page->MBMI->viewAttributes() ?>>
<?= $Page->MBMI->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MBloodgroup->Visible) { // MBloodgroup ?>
    <tr id="r_MBloodgroup">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MBloodgroup"><template id="tpc_view_vitals_history_MBloodgroup"><?= $Page->MBloodgroup->caption() ?></template></span></td>
        <td data-name="MBloodgroup" <?= $Page->MBloodgroup->cellAttributes() ?>>
<template id="tpx_view_vitals_history_MBloodgroup"><span id="el_view_vitals_history_MBloodgroup">
<span<?= $Page->MBloodgroup->viewAttributes() ?>>
<?= $Page->MBloodgroup->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FBuild->Visible) { // FBuild ?>
    <tr id="r_FBuild">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_FBuild"><template id="tpc_view_vitals_history_FBuild"><?= $Page->FBuild->caption() ?></template></span></td>
        <td data-name="FBuild" <?= $Page->FBuild->cellAttributes() ?>>
<template id="tpx_view_vitals_history_FBuild"><span id="el_view_vitals_history_FBuild">
<span<?= $Page->FBuild->viewAttributes() ?>>
<?= $Page->FBuild->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MBuild->Visible) { // MBuild ?>
    <tr id="r_MBuild">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MBuild"><template id="tpc_view_vitals_history_MBuild"><?= $Page->MBuild->caption() ?></template></span></td>
        <td data-name="MBuild" <?= $Page->MBuild->cellAttributes() ?>>
<template id="tpx_view_vitals_history_MBuild"><span id="el_view_vitals_history_MBuild">
<span<?= $Page->MBuild->viewAttributes() ?>>
<?= $Page->MBuild->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FSkinColor->Visible) { // FSkinColor ?>
    <tr id="r_FSkinColor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_FSkinColor"><template id="tpc_view_vitals_history_FSkinColor"><?= $Page->FSkinColor->caption() ?></template></span></td>
        <td data-name="FSkinColor" <?= $Page->FSkinColor->cellAttributes() ?>>
<template id="tpx_view_vitals_history_FSkinColor"><span id="el_view_vitals_history_FSkinColor">
<span<?= $Page->FSkinColor->viewAttributes() ?>>
<?= $Page->FSkinColor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MSkinColor->Visible) { // MSkinColor ?>
    <tr id="r_MSkinColor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MSkinColor"><template id="tpc_view_vitals_history_MSkinColor"><?= $Page->MSkinColor->caption() ?></template></span></td>
        <td data-name="MSkinColor" <?= $Page->MSkinColor->cellAttributes() ?>>
<template id="tpx_view_vitals_history_MSkinColor"><span id="el_view_vitals_history_MSkinColor">
<span<?= $Page->MSkinColor->viewAttributes() ?>>
<?= $Page->MSkinColor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FEyesColor->Visible) { // FEyesColor ?>
    <tr id="r_FEyesColor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_FEyesColor"><template id="tpc_view_vitals_history_FEyesColor"><?= $Page->FEyesColor->caption() ?></template></span></td>
        <td data-name="FEyesColor" <?= $Page->FEyesColor->cellAttributes() ?>>
<template id="tpx_view_vitals_history_FEyesColor"><span id="el_view_vitals_history_FEyesColor">
<span<?= $Page->FEyesColor->viewAttributes() ?>>
<?= $Page->FEyesColor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MEyesColor->Visible) { // MEyesColor ?>
    <tr id="r_MEyesColor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MEyesColor"><template id="tpc_view_vitals_history_MEyesColor"><?= $Page->MEyesColor->caption() ?></template></span></td>
        <td data-name="MEyesColor" <?= $Page->MEyesColor->cellAttributes() ?>>
<template id="tpx_view_vitals_history_MEyesColor"><span id="el_view_vitals_history_MEyesColor">
<span<?= $Page->MEyesColor->viewAttributes() ?>>
<?= $Page->MEyesColor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FHairColor->Visible) { // FHairColor ?>
    <tr id="r_FHairColor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_FHairColor"><template id="tpc_view_vitals_history_FHairColor"><?= $Page->FHairColor->caption() ?></template></span></td>
        <td data-name="FHairColor" <?= $Page->FHairColor->cellAttributes() ?>>
<template id="tpx_view_vitals_history_FHairColor"><span id="el_view_vitals_history_FHairColor">
<span<?= $Page->FHairColor->viewAttributes() ?>>
<?= $Page->FHairColor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MhairColor->Visible) { // MhairColor ?>
    <tr id="r_MhairColor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MhairColor"><template id="tpc_view_vitals_history_MhairColor"><?= $Page->MhairColor->caption() ?></template></span></td>
        <td data-name="MhairColor" <?= $Page->MhairColor->cellAttributes() ?>>
<template id="tpx_view_vitals_history_MhairColor"><span id="el_view_vitals_history_MhairColor">
<span<?= $Page->MhairColor->viewAttributes() ?>>
<?= $Page->MhairColor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FhairTexture->Visible) { // FhairTexture ?>
    <tr id="r_FhairTexture">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_FhairTexture"><template id="tpc_view_vitals_history_FhairTexture"><?= $Page->FhairTexture->caption() ?></template></span></td>
        <td data-name="FhairTexture" <?= $Page->FhairTexture->cellAttributes() ?>>
<template id="tpx_view_vitals_history_FhairTexture"><span id="el_view_vitals_history_FhairTexture">
<span<?= $Page->FhairTexture->viewAttributes() ?>>
<?= $Page->FhairTexture->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MHairTexture->Visible) { // MHairTexture ?>
    <tr id="r_MHairTexture">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MHairTexture"><template id="tpc_view_vitals_history_MHairTexture"><?= $Page->MHairTexture->caption() ?></template></span></td>
        <td data-name="MHairTexture" <?= $Page->MHairTexture->cellAttributes() ?>>
<template id="tpx_view_vitals_history_MHairTexture"><span id="el_view_vitals_history_MHairTexture">
<span<?= $Page->MHairTexture->viewAttributes() ?>>
<?= $Page->MHairTexture->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Fothers->Visible) { // Fothers ?>
    <tr id="r_Fothers">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Fothers"><template id="tpc_view_vitals_history_Fothers"><?= $Page->Fothers->caption() ?></template></span></td>
        <td data-name="Fothers" <?= $Page->Fothers->cellAttributes() ?>>
<template id="tpx_view_vitals_history_Fothers"><span id="el_view_vitals_history_Fothers">
<span<?= $Page->Fothers->viewAttributes() ?>>
<?= $Page->Fothers->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mothers->Visible) { // Mothers ?>
    <tr id="r_Mothers">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Mothers"><template id="tpc_view_vitals_history_Mothers"><?= $Page->Mothers->caption() ?></template></span></td>
        <td data-name="Mothers" <?= $Page->Mothers->cellAttributes() ?>>
<template id="tpx_view_vitals_history_Mothers"><span id="el_view_vitals_history_Mothers">
<span<?= $Page->Mothers->viewAttributes() ?>>
<?= $Page->Mothers->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PGE->Visible) { // PGE ?>
    <tr id="r_PGE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PGE"><template id="tpc_view_vitals_history_PGE"><?= $Page->PGE->caption() ?></template></span></td>
        <td data-name="PGE" <?= $Page->PGE->cellAttributes() ?>>
<template id="tpx_view_vitals_history_PGE"><span id="el_view_vitals_history_PGE">
<span<?= $Page->PGE->viewAttributes() ?>>
<?= $Page->PGE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PPR->Visible) { // PPR ?>
    <tr id="r_PPR">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PPR"><template id="tpc_view_vitals_history_PPR"><?= $Page->PPR->caption() ?></template></span></td>
        <td data-name="PPR" <?= $Page->PPR->cellAttributes() ?>>
<template id="tpx_view_vitals_history_PPR"><span id="el_view_vitals_history_PPR">
<span<?= $Page->PPR->viewAttributes() ?>>
<?= $Page->PPR->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PBP->Visible) { // PBP ?>
    <tr id="r_PBP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PBP"><template id="tpc_view_vitals_history_PBP"><?= $Page->PBP->caption() ?></template></span></td>
        <td data-name="PBP" <?= $Page->PBP->cellAttributes() ?>>
<template id="tpx_view_vitals_history_PBP"><span id="el_view_vitals_history_PBP">
<span<?= $Page->PBP->viewAttributes() ?>>
<?= $Page->PBP->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Breast->Visible) { // Breast ?>
    <tr id="r_Breast">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Breast"><template id="tpc_view_vitals_history_Breast"><?= $Page->Breast->caption() ?></template></span></td>
        <td data-name="Breast" <?= $Page->Breast->cellAttributes() ?>>
<template id="tpx_view_vitals_history_Breast"><span id="el_view_vitals_history_Breast">
<span<?= $Page->Breast->viewAttributes() ?>>
<?= $Page->Breast->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PPA->Visible) { // PPA ?>
    <tr id="r_PPA">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PPA"><template id="tpc_view_vitals_history_PPA"><?= $Page->PPA->caption() ?></template></span></td>
        <td data-name="PPA" <?= $Page->PPA->cellAttributes() ?>>
<template id="tpx_view_vitals_history_PPA"><span id="el_view_vitals_history_PPA">
<span<?= $Page->PPA->viewAttributes() ?>>
<?= $Page->PPA->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PPSV->Visible) { // PPSV ?>
    <tr id="r_PPSV">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PPSV"><template id="tpc_view_vitals_history_PPSV"><?= $Page->PPSV->caption() ?></template></span></td>
        <td data-name="PPSV" <?= $Page->PPSV->cellAttributes() ?>>
<template id="tpx_view_vitals_history_PPSV"><span id="el_view_vitals_history_PPSV">
<span<?= $Page->PPSV->viewAttributes() ?>>
<?= $Page->PPSV->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PPAPSMEAR->Visible) { // PPAPSMEAR ?>
    <tr id="r_PPAPSMEAR">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PPAPSMEAR"><template id="tpc_view_vitals_history_PPAPSMEAR"><?= $Page->PPAPSMEAR->caption() ?></template></span></td>
        <td data-name="PPAPSMEAR" <?= $Page->PPAPSMEAR->cellAttributes() ?>>
<template id="tpx_view_vitals_history_PPAPSMEAR"><span id="el_view_vitals_history_PPAPSMEAR">
<span<?= $Page->PPAPSMEAR->viewAttributes() ?>>
<?= $Page->PPAPSMEAR->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PTHYROID->Visible) { // PTHYROID ?>
    <tr id="r_PTHYROID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PTHYROID"><template id="tpc_view_vitals_history_PTHYROID"><?= $Page->PTHYROID->caption() ?></template></span></td>
        <td data-name="PTHYROID" <?= $Page->PTHYROID->cellAttributes() ?>>
<template id="tpx_view_vitals_history_PTHYROID"><span id="el_view_vitals_history_PTHYROID">
<span<?= $Page->PTHYROID->viewAttributes() ?>>
<?= $Page->PTHYROID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MTHYROID->Visible) { // MTHYROID ?>
    <tr id="r_MTHYROID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MTHYROID"><template id="tpc_view_vitals_history_MTHYROID"><?= $Page->MTHYROID->caption() ?></template></span></td>
        <td data-name="MTHYROID" <?= $Page->MTHYROID->cellAttributes() ?>>
<template id="tpx_view_vitals_history_MTHYROID"><span id="el_view_vitals_history_MTHYROID">
<span<?= $Page->MTHYROID->viewAttributes() ?>>
<?= $Page->MTHYROID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SecSexCharacters->Visible) { // SecSexCharacters ?>
    <tr id="r_SecSexCharacters">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_SecSexCharacters"><template id="tpc_view_vitals_history_SecSexCharacters"><?= $Page->SecSexCharacters->caption() ?></template></span></td>
        <td data-name="SecSexCharacters" <?= $Page->SecSexCharacters->cellAttributes() ?>>
<template id="tpx_view_vitals_history_SecSexCharacters"><span id="el_view_vitals_history_SecSexCharacters">
<span<?= $Page->SecSexCharacters->viewAttributes() ?>>
<?= $Page->SecSexCharacters->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PenisUM->Visible) { // PenisUM ?>
    <tr id="r_PenisUM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PenisUM"><template id="tpc_view_vitals_history_PenisUM"><?= $Page->PenisUM->caption() ?></template></span></td>
        <td data-name="PenisUM" <?= $Page->PenisUM->cellAttributes() ?>>
<template id="tpx_view_vitals_history_PenisUM"><span id="el_view_vitals_history_PenisUM">
<span<?= $Page->PenisUM->viewAttributes() ?>>
<?= $Page->PenisUM->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VAS->Visible) { // VAS ?>
    <tr id="r_VAS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_VAS"><template id="tpc_view_vitals_history_VAS"><?= $Page->VAS->caption() ?></template></span></td>
        <td data-name="VAS" <?= $Page->VAS->cellAttributes() ?>>
<template id="tpx_view_vitals_history_VAS"><span id="el_view_vitals_history_VAS">
<span<?= $Page->VAS->viewAttributes() ?>>
<?= $Page->VAS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EPIDIDYMIS->Visible) { // EPIDIDYMIS ?>
    <tr id="r_EPIDIDYMIS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_EPIDIDYMIS"><template id="tpc_view_vitals_history_EPIDIDYMIS"><?= $Page->EPIDIDYMIS->caption() ?></template></span></td>
        <td data-name="EPIDIDYMIS" <?= $Page->EPIDIDYMIS->cellAttributes() ?>>
<template id="tpx_view_vitals_history_EPIDIDYMIS"><span id="el_view_vitals_history_EPIDIDYMIS">
<span<?= $Page->EPIDIDYMIS->viewAttributes() ?>>
<?= $Page->EPIDIDYMIS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Varicocele->Visible) { // Varicocele ?>
    <tr id="r_Varicocele">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Varicocele"><template id="tpc_view_vitals_history_Varicocele"><?= $Page->Varicocele->caption() ?></template></span></td>
        <td data-name="Varicocele" <?= $Page->Varicocele->cellAttributes() ?>>
<template id="tpx_view_vitals_history_Varicocele"><span id="el_view_vitals_history_Varicocele">
<span<?= $Page->Varicocele->viewAttributes() ?>>
<?= $Page->Varicocele->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FertilityTreatmentHistory->Visible) { // FertilityTreatmentHistory ?>
    <tr id="r_FertilityTreatmentHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_FertilityTreatmentHistory"><template id="tpc_view_vitals_history_FertilityTreatmentHistory"><?= $Page->FertilityTreatmentHistory->caption() ?></template></span></td>
        <td data-name="FertilityTreatmentHistory" <?= $Page->FertilityTreatmentHistory->cellAttributes() ?>>
<template id="tpx_view_vitals_history_FertilityTreatmentHistory"><span id="el_view_vitals_history_FertilityTreatmentHistory">
<span<?= $Page->FertilityTreatmentHistory->viewAttributes() ?>>
<?= $Page->FertilityTreatmentHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SurgeryHistory->Visible) { // SurgeryHistory ?>
    <tr id="r_SurgeryHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_SurgeryHistory"><template id="tpc_view_vitals_history_SurgeryHistory"><?= $Page->SurgeryHistory->caption() ?></template></span></td>
        <td data-name="SurgeryHistory" <?= $Page->SurgeryHistory->cellAttributes() ?>>
<template id="tpx_view_vitals_history_SurgeryHistory"><span id="el_view_vitals_history_SurgeryHistory">
<span<?= $Page->SurgeryHistory->viewAttributes() ?>>
<?= $Page->SurgeryHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
    <tr id="r_FamilyHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_FamilyHistory"><template id="tpc_view_vitals_history_FamilyHistory"><?= $Page->FamilyHistory->caption() ?></template></span></td>
        <td data-name="FamilyHistory" <?= $Page->FamilyHistory->cellAttributes() ?>>
<template id="tpx_view_vitals_history_FamilyHistory"><span id="el_view_vitals_history_FamilyHistory">
<span<?= $Page->FamilyHistory->viewAttributes() ?>>
<?= $Page->FamilyHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PInvestigations->Visible) { // PInvestigations ?>
    <tr id="r_PInvestigations">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PInvestigations"><template id="tpc_view_vitals_history_PInvestigations"><?= $Page->PInvestigations->caption() ?></template></span></td>
        <td data-name="PInvestigations" <?= $Page->PInvestigations->cellAttributes() ?>>
<template id="tpx_view_vitals_history_PInvestigations"><span id="el_view_vitals_history_PInvestigations">
<span<?= $Page->PInvestigations->viewAttributes() ?>>
<?= $Page->PInvestigations->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Addictions->Visible) { // Addictions ?>
    <tr id="r_Addictions">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Addictions"><template id="tpc_view_vitals_history_Addictions"><?= $Page->Addictions->caption() ?></template></span></td>
        <td data-name="Addictions" <?= $Page->Addictions->cellAttributes() ?>>
<template id="tpx_view_vitals_history_Addictions"><span id="el_view_vitals_history_Addictions">
<span<?= $Page->Addictions->viewAttributes() ?>>
<?= $Page->Addictions->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Medications->Visible) { // Medications ?>
    <tr id="r_Medications">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Medications"><template id="tpc_view_vitals_history_Medications"><?= $Page->Medications->caption() ?></template></span></td>
        <td data-name="Medications" <?= $Page->Medications->cellAttributes() ?>>
<template id="tpx_view_vitals_history_Medications"><span id="el_view_vitals_history_Medications">
<span<?= $Page->Medications->viewAttributes() ?>>
<?= $Page->Medications->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Medical->Visible) { // Medical ?>
    <tr id="r_Medical">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Medical"><template id="tpc_view_vitals_history_Medical"><?= $Page->Medical->caption() ?></template></span></td>
        <td data-name="Medical" <?= $Page->Medical->cellAttributes() ?>>
<template id="tpx_view_vitals_history_Medical"><span id="el_view_vitals_history_Medical">
<span<?= $Page->Medical->viewAttributes() ?>>
<?= $Page->Medical->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Surgical->Visible) { // Surgical ?>
    <tr id="r_Surgical">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_Surgical"><template id="tpc_view_vitals_history_Surgical"><?= $Page->Surgical->caption() ?></template></span></td>
        <td data-name="Surgical" <?= $Page->Surgical->cellAttributes() ?>>
<template id="tpx_view_vitals_history_Surgical"><span id="el_view_vitals_history_Surgical">
<span<?= $Page->Surgical->viewAttributes() ?>>
<?= $Page->Surgical->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CoitalHistory->Visible) { // CoitalHistory ?>
    <tr id="r_CoitalHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_CoitalHistory"><template id="tpc_view_vitals_history_CoitalHistory"><?= $Page->CoitalHistory->caption() ?></template></span></td>
        <td data-name="CoitalHistory" <?= $Page->CoitalHistory->cellAttributes() ?>>
<template id="tpx_view_vitals_history_CoitalHistory"><span id="el_view_vitals_history_CoitalHistory">
<span<?= $Page->CoitalHistory->viewAttributes() ?>>
<?= $Page->CoitalHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SemenAnalysis->Visible) { // SemenAnalysis ?>
    <tr id="r_SemenAnalysis">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_SemenAnalysis"><template id="tpc_view_vitals_history_SemenAnalysis"><?= $Page->SemenAnalysis->caption() ?></template></span></td>
        <td data-name="SemenAnalysis" <?= $Page->SemenAnalysis->cellAttributes() ?>>
<template id="tpx_view_vitals_history_SemenAnalysis"><span id="el_view_vitals_history_SemenAnalysis">
<span<?= $Page->SemenAnalysis->viewAttributes() ?>>
<?= $Page->SemenAnalysis->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MInsvestications->Visible) { // MInsvestications ?>
    <tr id="r_MInsvestications">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MInsvestications"><template id="tpc_view_vitals_history_MInsvestications"><?= $Page->MInsvestications->caption() ?></template></span></td>
        <td data-name="MInsvestications" <?= $Page->MInsvestications->cellAttributes() ?>>
<template id="tpx_view_vitals_history_MInsvestications"><span id="el_view_vitals_history_MInsvestications">
<span<?= $Page->MInsvestications->viewAttributes() ?>>
<?= $Page->MInsvestications->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PImpression->Visible) { // PImpression ?>
    <tr id="r_PImpression">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PImpression"><template id="tpc_view_vitals_history_PImpression"><?= $Page->PImpression->caption() ?></template></span></td>
        <td data-name="PImpression" <?= $Page->PImpression->cellAttributes() ?>>
<template id="tpx_view_vitals_history_PImpression"><span id="el_view_vitals_history_PImpression">
<span<?= $Page->PImpression->viewAttributes() ?>>
<?= $Page->PImpression->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MIMpression->Visible) { // MIMpression ?>
    <tr id="r_MIMpression">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MIMpression"><template id="tpc_view_vitals_history_MIMpression"><?= $Page->MIMpression->caption() ?></template></span></td>
        <td data-name="MIMpression" <?= $Page->MIMpression->cellAttributes() ?>>
<template id="tpx_view_vitals_history_MIMpression"><span id="el_view_vitals_history_MIMpression">
<span<?= $Page->MIMpression->viewAttributes() ?>>
<?= $Page->MIMpression->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PPlanOfManagement->Visible) { // PPlanOfManagement ?>
    <tr id="r_PPlanOfManagement">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PPlanOfManagement"><template id="tpc_view_vitals_history_PPlanOfManagement"><?= $Page->PPlanOfManagement->caption() ?></template></span></td>
        <td data-name="PPlanOfManagement" <?= $Page->PPlanOfManagement->cellAttributes() ?>>
<template id="tpx_view_vitals_history_PPlanOfManagement"><span id="el_view_vitals_history_PPlanOfManagement">
<span<?= $Page->PPlanOfManagement->viewAttributes() ?>>
<?= $Page->PPlanOfManagement->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MPlanOfManagement->Visible) { // MPlanOfManagement ?>
    <tr id="r_MPlanOfManagement">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MPlanOfManagement"><template id="tpc_view_vitals_history_MPlanOfManagement"><?= $Page->MPlanOfManagement->caption() ?></template></span></td>
        <td data-name="MPlanOfManagement" <?= $Page->MPlanOfManagement->cellAttributes() ?>>
<template id="tpx_view_vitals_history_MPlanOfManagement"><span id="el_view_vitals_history_MPlanOfManagement">
<span<?= $Page->MPlanOfManagement->viewAttributes() ?>>
<?= $Page->MPlanOfManagement->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PReadMore->Visible) { // PReadMore ?>
    <tr id="r_PReadMore">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_PReadMore"><template id="tpc_view_vitals_history_PReadMore"><?= $Page->PReadMore->caption() ?></template></span></td>
        <td data-name="PReadMore" <?= $Page->PReadMore->cellAttributes() ?>>
<template id="tpx_view_vitals_history_PReadMore"><span id="el_view_vitals_history_PReadMore">
<span<?= $Page->PReadMore->viewAttributes() ?>>
<?= $Page->PReadMore->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MReadMore->Visible) { // MReadMore ?>
    <tr id="r_MReadMore">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MReadMore"><template id="tpc_view_vitals_history_MReadMore"><?= $Page->MReadMore->caption() ?></template></span></td>
        <td data-name="MReadMore" <?= $Page->MReadMore->cellAttributes() ?>>
<template id="tpx_view_vitals_history_MReadMore"><span id="el_view_vitals_history_MReadMore">
<span<?= $Page->MReadMore->viewAttributes() ?>>
<?= $Page->MReadMore->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MariedFor->Visible) { // MariedFor ?>
    <tr id="r_MariedFor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_MariedFor"><template id="tpc_view_vitals_history_MariedFor"><?= $Page->MariedFor->caption() ?></template></span></td>
        <td data-name="MariedFor" <?= $Page->MariedFor->cellAttributes() ?>>
<template id="tpx_view_vitals_history_MariedFor"><span id="el_view_vitals_history_MariedFor">
<span<?= $Page->MariedFor->viewAttributes() ?>>
<?= $Page->MariedFor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CMNCM->Visible) { // CMNCM ?>
    <tr id="r_CMNCM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_CMNCM"><template id="tpc_view_vitals_history_CMNCM"><?= $Page->CMNCM->caption() ?></template></span></td>
        <td data-name="CMNCM" <?= $Page->CMNCM->cellAttributes() ?>>
<template id="tpx_view_vitals_history_CMNCM"><span id="el_view_vitals_history_CMNCM">
<span<?= $Page->CMNCM->viewAttributes() ?>>
<?= $Page->CMNCM->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_TidNo"><template id="tpc_view_vitals_history_TidNo"><?= $Page->TidNo->caption() ?></template></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_view_vitals_history_TidNo"><span id="el_view_vitals_history_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pFamilyHistory->Visible) { // pFamilyHistory ?>
    <tr id="r_pFamilyHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_pFamilyHistory"><template id="tpc_view_vitals_history_pFamilyHistory"><?= $Page->pFamilyHistory->caption() ?></template></span></td>
        <td data-name="pFamilyHistory" <?= $Page->pFamilyHistory->cellAttributes() ?>>
<template id="tpx_view_vitals_history_pFamilyHistory"><span id="el_view_vitals_history_pFamilyHistory">
<span<?= $Page->pFamilyHistory->viewAttributes() ?>>
<?= $Page->pFamilyHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pTemplateMedications->Visible) { // pTemplateMedications ?>
    <tr id="r_pTemplateMedications">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_view_vitals_history_pTemplateMedications"><template id="tpc_view_vitals_history_pTemplateMedications"><?= $Page->pTemplateMedications->caption() ?></template></span></td>
        <td data-name="pTemplateMedications" <?= $Page->pTemplateMedications->cellAttributes() ?>>
<template id="tpx_view_vitals_history_pTemplateMedications"><span id="el_view_vitals_history_pTemplateMedications">
<span<?= $Page->pTemplateMedications->viewAttributes() ?>>
<?= $Page->pTemplateMedications->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_view_vitals_historyview" class="ew-custom-template"></div>
<template id="tpm_view_vitals_historyview">
<div id="ct_ViewVitalsHistoryView"><style>
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
<slot class="ew-slot" name="tpc_view_vitals_history_RIDNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_RIDNO"></slot>
<slot class="ew-slot" name="tpc_view_vitals_history_Name"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_Name"></slot>
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
			  				<tr><td><slot class="ew-slot" name="tpc_view_vitals_history_Fheight"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_Fheight"></slot> Cm.</td><td><slot class="ew-slot" name="tpc_view_vitals_history_Fweight"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_Fweight"></slot> Kg.</td></tr>
			  			</tbody>
			  		</table>
					<span class="ew-cell col-6"><slot class="ew-slot" name="tpc_view_vitals_history_FBMI"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_FBMI"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_vitals_history_IdentificationMark"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_IdentificationMark"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_vitals_history_FBuild"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_FBuild"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_vitals_history_FSkinColor"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_FSkinColor"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_vitals_history_FEyesColor"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_FEyesColor"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_vitals_history_FHairColor"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_FHairColor"></slot></span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_vitals_history_MHairTexture"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_MHairTexture"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_vitals_history_Mothers"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_Mothers"></slot></span>
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
			  				<tr><td><slot class="ew-slot" name="tpc_view_vitals_history_Mheight"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_Mheight"></slot> Cm.</td><td><slot class="ew-slot" name="tpc_view_vitals_history_Mweight"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_Mweight"></slot> Kg.</td></tr>
			  			</tbody>
			  		</table>
					<span class="ew-cell col-6"><slot class="ew-slot" name="tpc_view_vitals_history_MBMI"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_MBMI"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_vitals_history_Address"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_Address"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_vitals_history_MBuild"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_MBuild"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_vitals_history_MSkinColor"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_MSkinColor"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_vitals_history_MEyesColor"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_MEyesColor"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_vitals_history_MhairColor"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_MhairColor"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_vitals_history_FhairTexture"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_FhairTexture"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_view_vitals_history_Fothers"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_vitals_history_Fothers"></slot></span>
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
</div>
</template>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_view_vitals_historyview", "tpm_view_vitals_historyview", "view_vitals_historyview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
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

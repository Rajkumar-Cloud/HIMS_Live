<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfOtherprocedureView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_otherprocedureview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_otherprocedureview = currentForm = new ew.Form("fivf_otherprocedureview", "view");
    loadjs.done("fivf_otherprocedureview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.ivf_otherprocedure) ew.vars.tables.ivf_otherprocedure = <?= JsonEncode(GetClientVar("tables", "ivf_otherprocedure")) ?>;
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
<form name="fivf_otherprocedureview" id="fivf_otherprocedureview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_otherprocedure">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_id"><template id="tpc_ivf_otherprocedure_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_id"><span id="el_ivf_otherprocedure_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <tr id="r_RIDNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_RIDNO"><template id="tpc_ivf_otherprocedure_RIDNO"><?= $Page->RIDNO->caption() ?></template></span></td>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_RIDNO" class="ivf_otherprocedureview">
<?= Barcode()->show($Page->RIDNO->CurrentValue, 'EAN-13', 60) ?>
</template>
<template id="tpx_ivf_otherprocedure_RIDNO"><span id="el_ivf_otherprocedure_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>><slot name="tpx_ivf_otherprocedure_RIDNO"></slot></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Name"><template id="tpc_ivf_otherprocedure_Name"><?= $Page->Name->caption() ?></template></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Name"><span id="el_ivf_otherprocedure_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Age"><template id="tpc_ivf_otherprocedure_Age"><?= $Page->Age->caption() ?></template></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Age"><span id="el_ivf_otherprocedure_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SEX->Visible) { // SEX ?>
    <tr id="r_SEX">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_SEX"><template id="tpc_ivf_otherprocedure_SEX"><?= $Page->SEX->caption() ?></template></span></td>
        <td data-name="SEX" <?= $Page->SEX->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_SEX"><span id="el_ivf_otherprocedure_SEX">
<span<?= $Page->SEX->viewAttributes() ?>>
<?= $Page->SEX->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address->Visible) { // Address ?>
    <tr id="r_Address">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Address"><template id="tpc_ivf_otherprocedure_Address"><?= $Page->Address->caption() ?></template></span></td>
        <td data-name="Address" <?= $Page->Address->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Address"><span id="el_ivf_otherprocedure_Address">
<span<?= $Page->Address->viewAttributes() ?>>
<?= $Page->Address->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DateofAdmission->Visible) { // DateofAdmission ?>
    <tr id="r_DateofAdmission">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_DateofAdmission"><template id="tpc_ivf_otherprocedure_DateofAdmission"><?= $Page->DateofAdmission->caption() ?></template></span></td>
        <td data-name="DateofAdmission" <?= $Page->DateofAdmission->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_DateofAdmission"><span id="el_ivf_otherprocedure_DateofAdmission">
<span<?= $Page->DateofAdmission->viewAttributes() ?>>
<?= $Page->DateofAdmission->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DateofProcedure->Visible) { // DateofProcedure ?>
    <tr id="r_DateofProcedure">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_DateofProcedure"><template id="tpc_ivf_otherprocedure_DateofProcedure"><?= $Page->DateofProcedure->caption() ?></template></span></td>
        <td data-name="DateofProcedure" <?= $Page->DateofProcedure->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_DateofProcedure"><span id="el_ivf_otherprocedure_DateofProcedure">
<span<?= $Page->DateofProcedure->viewAttributes() ?>>
<?= $Page->DateofProcedure->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DateofDischarge->Visible) { // DateofDischarge ?>
    <tr id="r_DateofDischarge">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_DateofDischarge"><template id="tpc_ivf_otherprocedure_DateofDischarge"><?= $Page->DateofDischarge->caption() ?></template></span></td>
        <td data-name="DateofDischarge" <?= $Page->DateofDischarge->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_DateofDischarge"><span id="el_ivf_otherprocedure_DateofDischarge">
<span<?= $Page->DateofDischarge->viewAttributes() ?>>
<?= $Page->DateofDischarge->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <tr id="r_Consultant">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Consultant"><template id="tpc_ivf_otherprocedure_Consultant"><?= $Page->Consultant->caption() ?></template></span></td>
        <td data-name="Consultant" <?= $Page->Consultant->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Consultant"><span id="el_ivf_otherprocedure_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
    <tr id="r_Surgeon">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Surgeon"><template id="tpc_ivf_otherprocedure_Surgeon"><?= $Page->Surgeon->caption() ?></template></span></td>
        <td data-name="Surgeon" <?= $Page->Surgeon->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Surgeon"><span id="el_ivf_otherprocedure_Surgeon">
<span<?= $Page->Surgeon->viewAttributes() ?>>
<?= $Page->Surgeon->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
    <tr id="r_Anesthetist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Anesthetist"><template id="tpc_ivf_otherprocedure_Anesthetist"><?= $Page->Anesthetist->caption() ?></template></span></td>
        <td data-name="Anesthetist" <?= $Page->Anesthetist->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Anesthetist"><span id="el_ivf_otherprocedure_Anesthetist">
<span<?= $Page->Anesthetist->viewAttributes() ?>>
<?= $Page->Anesthetist->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
    <tr id="r_IdentificationMark">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_IdentificationMark"><template id="tpc_ivf_otherprocedure_IdentificationMark"><?= $Page->IdentificationMark->caption() ?></template></span></td>
        <td data-name="IdentificationMark" <?= $Page->IdentificationMark->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_IdentificationMark"><span id="el_ivf_otherprocedure_IdentificationMark">
<span<?= $Page->IdentificationMark->viewAttributes() ?>>
<?= $Page->IdentificationMark->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProcedureDone->Visible) { // ProcedureDone ?>
    <tr id="r_ProcedureDone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_ProcedureDone"><template id="tpc_ivf_otherprocedure_ProcedureDone"><?= $Page->ProcedureDone->caption() ?></template></span></td>
        <td data-name="ProcedureDone" <?= $Page->ProcedureDone->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_ProcedureDone"><span id="el_ivf_otherprocedure_ProcedureDone">
<span<?= $Page->ProcedureDone->viewAttributes() ?>>
<?= $Page->ProcedureDone->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
    <tr id="r_PROVISIONALDIAGNOSIS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_PROVISIONALDIAGNOSIS"><template id="tpc_ivf_otherprocedure_PROVISIONALDIAGNOSIS"><?= $Page->PROVISIONALDIAGNOSIS->caption() ?></template></span></td>
        <td data-name="PROVISIONALDIAGNOSIS" <?= $Page->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_PROVISIONALDIAGNOSIS"><span id="el_ivf_otherprocedure_PROVISIONALDIAGNOSIS">
<span<?= $Page->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?= $Page->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
    <tr id="r_Chiefcomplaints">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Chiefcomplaints"><template id="tpc_ivf_otherprocedure_Chiefcomplaints"><?= $Page->Chiefcomplaints->caption() ?></template></span></td>
        <td data-name="Chiefcomplaints" <?= $Page->Chiefcomplaints->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Chiefcomplaints"><span id="el_ivf_otherprocedure_Chiefcomplaints">
<span<?= $Page->Chiefcomplaints->viewAttributes() ?>>
<?= $Page->Chiefcomplaints->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MaritallHistory->Visible) { // MaritallHistory ?>
    <tr id="r_MaritallHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_MaritallHistory"><template id="tpc_ivf_otherprocedure_MaritallHistory"><?= $Page->MaritallHistory->caption() ?></template></span></td>
        <td data-name="MaritallHistory" <?= $Page->MaritallHistory->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_MaritallHistory"><span id="el_ivf_otherprocedure_MaritallHistory">
<span<?= $Page->MaritallHistory->viewAttributes() ?>>
<?= $Page->MaritallHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
    <tr id="r_MenstrualHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_MenstrualHistory"><template id="tpc_ivf_otherprocedure_MenstrualHistory"><?= $Page->MenstrualHistory->caption() ?></template></span></td>
        <td data-name="MenstrualHistory" <?= $Page->MenstrualHistory->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_MenstrualHistory"><span id="el_ivf_otherprocedure_MenstrualHistory">
<span<?= $Page->MenstrualHistory->viewAttributes() ?>>
<?= $Page->MenstrualHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
    <tr id="r_SurgicalHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_SurgicalHistory"><template id="tpc_ivf_otherprocedure_SurgicalHistory"><?= $Page->SurgicalHistory->caption() ?></template></span></td>
        <td data-name="SurgicalHistory" <?= $Page->SurgicalHistory->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_SurgicalHistory"><span id="el_ivf_otherprocedure_SurgicalHistory">
<span<?= $Page->SurgicalHistory->viewAttributes() ?>>
<?= $Page->SurgicalHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PastHistory->Visible) { // PastHistory ?>
    <tr id="r_PastHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_PastHistory"><template id="tpc_ivf_otherprocedure_PastHistory"><?= $Page->PastHistory->caption() ?></template></span></td>
        <td data-name="PastHistory" <?= $Page->PastHistory->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_PastHistory"><span id="el_ivf_otherprocedure_PastHistory">
<span<?= $Page->PastHistory->viewAttributes() ?>>
<?= $Page->PastHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
    <tr id="r_FamilyHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_FamilyHistory"><template id="tpc_ivf_otherprocedure_FamilyHistory"><?= $Page->FamilyHistory->caption() ?></template></span></td>
        <td data-name="FamilyHistory" <?= $Page->FamilyHistory->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_FamilyHistory"><span id="el_ivf_otherprocedure_FamilyHistory">
<span<?= $Page->FamilyHistory->viewAttributes() ?>>
<?= $Page->FamilyHistory->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Temp->Visible) { // Temp ?>
    <tr id="r_Temp">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Temp"><template id="tpc_ivf_otherprocedure_Temp"><?= $Page->Temp->caption() ?></template></span></td>
        <td data-name="Temp" <?= $Page->Temp->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Temp"><span id="el_ivf_otherprocedure_Temp">
<span<?= $Page->Temp->viewAttributes() ?>>
<?= $Page->Temp->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
    <tr id="r_Pulse">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Pulse"><template id="tpc_ivf_otherprocedure_Pulse"><?= $Page->Pulse->caption() ?></template></span></td>
        <td data-name="Pulse" <?= $Page->Pulse->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Pulse"><span id="el_ivf_otherprocedure_Pulse">
<span<?= $Page->Pulse->viewAttributes() ?>>
<?= $Page->Pulse->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
    <tr id="r_BP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_BP"><template id="tpc_ivf_otherprocedure_BP"><?= $Page->BP->caption() ?></template></span></td>
        <td data-name="BP" <?= $Page->BP->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_BP"><span id="el_ivf_otherprocedure_BP">
<span<?= $Page->BP->viewAttributes() ?>>
<?= $Page->BP->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CNS->Visible) { // CNS ?>
    <tr id="r_CNS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_CNS"><template id="tpc_ivf_otherprocedure_CNS"><?= $Page->CNS->caption() ?></template></span></td>
        <td data-name="CNS" <?= $Page->CNS->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_CNS"><span id="el_ivf_otherprocedure_CNS">
<span<?= $Page->CNS->viewAttributes() ?>>
<?= $Page->CNS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_RS->Visible) { // RS ?>
    <tr id="r__RS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure__RS"><template id="tpc_ivf_otherprocedure__RS"><?= $Page->_RS->caption() ?></template></span></td>
        <td data-name="_RS" <?= $Page->_RS->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure__RS"><span id="el_ivf_otherprocedure__RS">
<span<?= $Page->_RS->viewAttributes() ?>>
<?= $Page->_RS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
    <tr id="r_CVS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_CVS"><template id="tpc_ivf_otherprocedure_CVS"><?= $Page->CVS->caption() ?></template></span></td>
        <td data-name="CVS" <?= $Page->CVS->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_CVS"><span id="el_ivf_otherprocedure_CVS">
<span<?= $Page->CVS->viewAttributes() ?>>
<?= $Page->CVS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
    <tr id="r_PA">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_PA"><template id="tpc_ivf_otherprocedure_PA"><?= $Page->PA->caption() ?></template></span></td>
        <td data-name="PA" <?= $Page->PA->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_PA"><span id="el_ivf_otherprocedure_PA">
<span<?= $Page->PA->viewAttributes() ?>>
<?= $Page->PA->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->InvestigationReport->Visible) { // InvestigationReport ?>
    <tr id="r_InvestigationReport">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_InvestigationReport"><template id="tpc_ivf_otherprocedure_InvestigationReport"><?= $Page->InvestigationReport->caption() ?></template></span></td>
        <td data-name="InvestigationReport" <?= $Page->InvestigationReport->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_InvestigationReport"><span id="el_ivf_otherprocedure_InvestigationReport">
<span<?= $Page->InvestigationReport->viewAttributes() ?>>
<?= $Page->InvestigationReport->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FinalDiagnosis->Visible) { // FinalDiagnosis ?>
    <tr id="r_FinalDiagnosis">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_FinalDiagnosis"><template id="tpc_ivf_otherprocedure_FinalDiagnosis"><?= $Page->FinalDiagnosis->caption() ?></template></span></td>
        <td data-name="FinalDiagnosis" <?= $Page->FinalDiagnosis->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_FinalDiagnosis"><span id="el_ivf_otherprocedure_FinalDiagnosis">
<span<?= $Page->FinalDiagnosis->viewAttributes() ?>>
<?= $Page->FinalDiagnosis->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
    <tr id="r_Treatment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Treatment"><template id="tpc_ivf_otherprocedure_Treatment"><?= $Page->Treatment->caption() ?></template></span></td>
        <td data-name="Treatment" <?= $Page->Treatment->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Treatment"><span id="el_ivf_otherprocedure_Treatment">
<span<?= $Page->Treatment->viewAttributes() ?>>
<?= $Page->Treatment->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DetailOfOperation->Visible) { // DetailOfOperation ?>
    <tr id="r_DetailOfOperation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_DetailOfOperation"><template id="tpc_ivf_otherprocedure_DetailOfOperation"><?= $Page->DetailOfOperation->caption() ?></template></span></td>
        <td data-name="DetailOfOperation" <?= $Page->DetailOfOperation->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_DetailOfOperation"><span id="el_ivf_otherprocedure_DetailOfOperation">
<span<?= $Page->DetailOfOperation->viewAttributes() ?>>
<?= $Page->DetailOfOperation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FollowUpAdvice->Visible) { // FollowUpAdvice ?>
    <tr id="r_FollowUpAdvice">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_FollowUpAdvice"><template id="tpc_ivf_otherprocedure_FollowUpAdvice"><?= $Page->FollowUpAdvice->caption() ?></template></span></td>
        <td data-name="FollowUpAdvice" <?= $Page->FollowUpAdvice->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_FollowUpAdvice"><span id="el_ivf_otherprocedure_FollowUpAdvice">
<span<?= $Page->FollowUpAdvice->viewAttributes() ?>>
<?= $Page->FollowUpAdvice->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FollowUpMedication->Visible) { // FollowUpMedication ?>
    <tr id="r_FollowUpMedication">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_FollowUpMedication"><template id="tpc_ivf_otherprocedure_FollowUpMedication"><?= $Page->FollowUpMedication->caption() ?></template></span></td>
        <td data-name="FollowUpMedication" <?= $Page->FollowUpMedication->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_FollowUpMedication"><span id="el_ivf_otherprocedure_FollowUpMedication">
<span<?= $Page->FollowUpMedication->viewAttributes() ?>>
<?= $Page->FollowUpMedication->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Plan->Visible) { // Plan ?>
    <tr id="r_Plan">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Plan"><template id="tpc_ivf_otherprocedure_Plan"><?= $Page->Plan->caption() ?></template></span></td>
        <td data-name="Plan" <?= $Page->Plan->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_Plan"><span id="el_ivf_otherprocedure_Plan">
<span<?= $Page->Plan->viewAttributes() ?>>
<?= $Page->Plan->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TempleteFinalDiagnosis->Visible) { // TempleteFinalDiagnosis ?>
    <tr id="r_TempleteFinalDiagnosis">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TempleteFinalDiagnosis"><template id="tpc_ivf_otherprocedure_TempleteFinalDiagnosis"><?= $Page->TempleteFinalDiagnosis->caption() ?></template></span></td>
        <td data-name="TempleteFinalDiagnosis" <?= $Page->TempleteFinalDiagnosis->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_TempleteFinalDiagnosis"><span id="el_ivf_otherprocedure_TempleteFinalDiagnosis">
<span<?= $Page->TempleteFinalDiagnosis->viewAttributes() ?>>
<?= $Page->TempleteFinalDiagnosis->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TemplateTreatment->Visible) { // TemplateTreatment ?>
    <tr id="r_TemplateTreatment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TemplateTreatment"><template id="tpc_ivf_otherprocedure_TemplateTreatment"><?= $Page->TemplateTreatment->caption() ?></template></span></td>
        <td data-name="TemplateTreatment" <?= $Page->TemplateTreatment->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_TemplateTreatment"><span id="el_ivf_otherprocedure_TemplateTreatment">
<span<?= $Page->TemplateTreatment->viewAttributes() ?>>
<?= $Page->TemplateTreatment->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TemplateOperation->Visible) { // TemplateOperation ?>
    <tr id="r_TemplateOperation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TemplateOperation"><template id="tpc_ivf_otherprocedure_TemplateOperation"><?= $Page->TemplateOperation->caption() ?></template></span></td>
        <td data-name="TemplateOperation" <?= $Page->TemplateOperation->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_TemplateOperation"><span id="el_ivf_otherprocedure_TemplateOperation">
<span<?= $Page->TemplateOperation->viewAttributes() ?>>
<?= $Page->TemplateOperation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TemplateFollowUpAdvice->Visible) { // TemplateFollowUpAdvice ?>
    <tr id="r_TemplateFollowUpAdvice">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TemplateFollowUpAdvice"><template id="tpc_ivf_otherprocedure_TemplateFollowUpAdvice"><?= $Page->TemplateFollowUpAdvice->caption() ?></template></span></td>
        <td data-name="TemplateFollowUpAdvice" <?= $Page->TemplateFollowUpAdvice->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_TemplateFollowUpAdvice"><span id="el_ivf_otherprocedure_TemplateFollowUpAdvice">
<span<?= $Page->TemplateFollowUpAdvice->viewAttributes() ?>>
<?= $Page->TemplateFollowUpAdvice->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TemplateFollowUpMedication->Visible) { // TemplateFollowUpMedication ?>
    <tr id="r_TemplateFollowUpMedication">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TemplateFollowUpMedication"><template id="tpc_ivf_otherprocedure_TemplateFollowUpMedication"><?= $Page->TemplateFollowUpMedication->caption() ?></template></span></td>
        <td data-name="TemplateFollowUpMedication" <?= $Page->TemplateFollowUpMedication->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_TemplateFollowUpMedication"><span id="el_ivf_otherprocedure_TemplateFollowUpMedication">
<span<?= $Page->TemplateFollowUpMedication->viewAttributes() ?>>
<?= $Page->TemplateFollowUpMedication->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TemplatePlan->Visible) { // TemplatePlan ?>
    <tr id="r_TemplatePlan">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TemplatePlan"><template id="tpc_ivf_otherprocedure_TemplatePlan"><?= $Page->TemplatePlan->caption() ?></template></span></td>
        <td data-name="TemplatePlan" <?= $Page->TemplatePlan->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_TemplatePlan"><span id="el_ivf_otherprocedure_TemplatePlan">
<span<?= $Page->TemplatePlan->viewAttributes() ?>>
<?= $Page->TemplatePlan->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->QRCode->Visible) { // QRCode ?>
    <tr id="r_QRCode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_QRCode"><template id="tpc_ivf_otherprocedure_QRCode"><?= $Page->QRCode->caption() ?></template></span></td>
        <td data-name="QRCode" <?= $Page->QRCode->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_QRCode" class="ivf_otherprocedureview">
<?= Barcode()->show($Page->RIDNO->CurrentValue, 'QRCODE', 80) ?>
</template>
<template id="tpx_ivf_otherprocedure_QRCode"><span id="el_ivf_otherprocedure_QRCode">
<span<?= $Page->QRCode->viewAttributes() ?>><slot name="tpx_ivf_otherprocedure_QRCode"></slot></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TidNo"><template id="tpc_ivf_otherprocedure_TidNo"><?= $Page->TidNo->caption() ?></template></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_ivf_otherprocedure_TidNo"><span id="el_ivf_otherprocedure_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_ivf_otherprocedureview" class="ew-custom-template"></div>
<template id="tpm_ivf_otherprocedureview">
<div id="ct_IvfOtherprocedureView"><style>
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
<slot class="ew-slot" name="tpc_ivf_otherprocedure_RIDNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_RIDNO"></slot>
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
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_DateofAdmission"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_DateofAdmission"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_DateofProcedure"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_DateofProcedure"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_DateofDischarge"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_DateofDischarge"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_ProcedureDone"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_ProcedureDone"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_Consultant"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_Consultant"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_Surgeon"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_Surgeon"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_Anesthetist"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_Anesthetist"></slot></span>
				  </div>
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_InvestigationReport"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_InvestigationReport"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_otherprocedure_TempleteFinalDiagnosis"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_TempleteFinalDiagnosis"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_FinalDiagnosis"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_FinalDiagnosis"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_otherprocedure_TemplateTreatment"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_TemplateTreatment"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_Treatment"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_Treatment"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_otherprocedure_TemplateOperation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_TemplateOperation"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_DetailOfOperation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_DetailOfOperation"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_otherprocedure_TemplateFollowUpAdvice"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_TemplateFollowUpAdvice"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_FollowUpAdvice"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_FollowUpAdvice"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_otherprocedure_TemplateFollowUpMedication"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_TemplateFollowUpMedication"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_FollowUpMedication"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_FollowUpMedication"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_otherprocedure_TemplatePlan"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_TemplatePlan"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_otherprocedure_Plan"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_otherprocedure_Plan"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</div>
</template>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_ivf_otherprocedureview", "tpm_ivf_otherprocedureview", "ivf_otherprocedureview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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

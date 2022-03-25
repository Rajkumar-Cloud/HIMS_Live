<?php

namespace PHPMaker2021\project3;

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
<form name="fivf_otherprocedureview" id="fivf_otherprocedureview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_otherprocedure">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <tr id="r_RIDNO">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_RIDNO"><?= $Page->RIDNO->caption() ?></span></td>
        <td data-name="RIDNO" <?= $Page->RIDNO->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_RIDNO">
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Name"><?= $Page->Name->caption() ?></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Age"><?= $Page->Age->caption() ?></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SEX->Visible) { // SEX ?>
    <tr id="r_SEX">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_SEX"><?= $Page->SEX->caption() ?></span></td>
        <td data-name="SEX" <?= $Page->SEX->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_SEX">
<span<?= $Page->SEX->viewAttributes() ?>>
<?= $Page->SEX->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Address->Visible) { // Address ?>
    <tr id="r_Address">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Address"><?= $Page->Address->caption() ?></span></td>
        <td data-name="Address" <?= $Page->Address->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Address">
<span<?= $Page->Address->viewAttributes() ?>>
<?= $Page->Address->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DateofAdmission->Visible) { // DateofAdmission ?>
    <tr id="r_DateofAdmission">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_DateofAdmission"><?= $Page->DateofAdmission->caption() ?></span></td>
        <td data-name="DateofAdmission" <?= $Page->DateofAdmission->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_DateofAdmission">
<span<?= $Page->DateofAdmission->viewAttributes() ?>>
<?= $Page->DateofAdmission->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DateofProcedure->Visible) { // DateofProcedure ?>
    <tr id="r_DateofProcedure">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_DateofProcedure"><?= $Page->DateofProcedure->caption() ?></span></td>
        <td data-name="DateofProcedure" <?= $Page->DateofProcedure->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_DateofProcedure">
<span<?= $Page->DateofProcedure->viewAttributes() ?>>
<?= $Page->DateofProcedure->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DateofDischarge->Visible) { // DateofDischarge ?>
    <tr id="r_DateofDischarge">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_DateofDischarge"><?= $Page->DateofDischarge->caption() ?></span></td>
        <td data-name="DateofDischarge" <?= $Page->DateofDischarge->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_DateofDischarge">
<span<?= $Page->DateofDischarge->viewAttributes() ?>>
<?= $Page->DateofDischarge->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <tr id="r_Consultant">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Consultant"><?= $Page->Consultant->caption() ?></span></td>
        <td data-name="Consultant" <?= $Page->Consultant->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
    <tr id="r_Surgeon">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Surgeon"><?= $Page->Surgeon->caption() ?></span></td>
        <td data-name="Surgeon" <?= $Page->Surgeon->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Surgeon">
<span<?= $Page->Surgeon->viewAttributes() ?>>
<?= $Page->Surgeon->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Anesthetist->Visible) { // Anesthetist ?>
    <tr id="r_Anesthetist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Anesthetist"><?= $Page->Anesthetist->caption() ?></span></td>
        <td data-name="Anesthetist" <?= $Page->Anesthetist->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Anesthetist">
<span<?= $Page->Anesthetist->viewAttributes() ?>>
<?= $Page->Anesthetist->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IdentificationMark->Visible) { // IdentificationMark ?>
    <tr id="r_IdentificationMark">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_IdentificationMark"><?= $Page->IdentificationMark->caption() ?></span></td>
        <td data-name="IdentificationMark" <?= $Page->IdentificationMark->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_IdentificationMark">
<span<?= $Page->IdentificationMark->viewAttributes() ?>>
<?= $Page->IdentificationMark->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProcedureDone->Visible) { // ProcedureDone ?>
    <tr id="r_ProcedureDone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_ProcedureDone"><?= $Page->ProcedureDone->caption() ?></span></td>
        <td data-name="ProcedureDone" <?= $Page->ProcedureDone->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_ProcedureDone">
<span<?= $Page->ProcedureDone->viewAttributes() ?>>
<?= $Page->ProcedureDone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
    <tr id="r_PROVISIONALDIAGNOSIS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_PROVISIONALDIAGNOSIS"><?= $Page->PROVISIONALDIAGNOSIS->caption() ?></span></td>
        <td data-name="PROVISIONALDIAGNOSIS" <?= $Page->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_PROVISIONALDIAGNOSIS">
<span<?= $Page->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?= $Page->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
    <tr id="r_Chiefcomplaints">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Chiefcomplaints"><?= $Page->Chiefcomplaints->caption() ?></span></td>
        <td data-name="Chiefcomplaints" <?= $Page->Chiefcomplaints->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Chiefcomplaints">
<span<?= $Page->Chiefcomplaints->viewAttributes() ?>>
<?= $Page->Chiefcomplaints->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MaritallHistory->Visible) { // MaritallHistory ?>
    <tr id="r_MaritallHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_MaritallHistory"><?= $Page->MaritallHistory->caption() ?></span></td>
        <td data-name="MaritallHistory" <?= $Page->MaritallHistory->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_MaritallHistory">
<span<?= $Page->MaritallHistory->viewAttributes() ?>>
<?= $Page->MaritallHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
    <tr id="r_MenstrualHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_MenstrualHistory"><?= $Page->MenstrualHistory->caption() ?></span></td>
        <td data-name="MenstrualHistory" <?= $Page->MenstrualHistory->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_MenstrualHistory">
<span<?= $Page->MenstrualHistory->viewAttributes() ?>>
<?= $Page->MenstrualHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SurgicalHistory->Visible) { // SurgicalHistory ?>
    <tr id="r_SurgicalHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_SurgicalHistory"><?= $Page->SurgicalHistory->caption() ?></span></td>
        <td data-name="SurgicalHistory" <?= $Page->SurgicalHistory->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_SurgicalHistory">
<span<?= $Page->SurgicalHistory->viewAttributes() ?>>
<?= $Page->SurgicalHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PastHistory->Visible) { // PastHistory ?>
    <tr id="r_PastHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_PastHistory"><?= $Page->PastHistory->caption() ?></span></td>
        <td data-name="PastHistory" <?= $Page->PastHistory->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_PastHistory">
<span<?= $Page->PastHistory->viewAttributes() ?>>
<?= $Page->PastHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
    <tr id="r_FamilyHistory">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_FamilyHistory"><?= $Page->FamilyHistory->caption() ?></span></td>
        <td data-name="FamilyHistory" <?= $Page->FamilyHistory->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_FamilyHistory">
<span<?= $Page->FamilyHistory->viewAttributes() ?>>
<?= $Page->FamilyHistory->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Temp->Visible) { // Temp ?>
    <tr id="r_Temp">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Temp"><?= $Page->Temp->caption() ?></span></td>
        <td data-name="Temp" <?= $Page->Temp->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Temp">
<span<?= $Page->Temp->viewAttributes() ?>>
<?= $Page->Temp->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
    <tr id="r_Pulse">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Pulse"><?= $Page->Pulse->caption() ?></span></td>
        <td data-name="Pulse" <?= $Page->Pulse->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Pulse">
<span<?= $Page->Pulse->viewAttributes() ?>>
<?= $Page->Pulse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
    <tr id="r_BP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_BP"><?= $Page->BP->caption() ?></span></td>
        <td data-name="BP" <?= $Page->BP->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_BP">
<span<?= $Page->BP->viewAttributes() ?>>
<?= $Page->BP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CNS->Visible) { // CNS ?>
    <tr id="r_CNS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_CNS"><?= $Page->CNS->caption() ?></span></td>
        <td data-name="CNS" <?= $Page->CNS->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_CNS">
<span<?= $Page->CNS->viewAttributes() ?>>
<?= $Page->CNS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_RS->Visible) { // RS ?>
    <tr id="r__RS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure__RS"><?= $Page->_RS->caption() ?></span></td>
        <td data-name="_RS" <?= $Page->_RS->cellAttributes() ?>>
<span id="el_ivf_otherprocedure__RS">
<span<?= $Page->_RS->viewAttributes() ?>>
<?= $Page->_RS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
    <tr id="r_CVS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_CVS"><?= $Page->CVS->caption() ?></span></td>
        <td data-name="CVS" <?= $Page->CVS->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_CVS">
<span<?= $Page->CVS->viewAttributes() ?>>
<?= $Page->CVS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
    <tr id="r_PA">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_PA"><?= $Page->PA->caption() ?></span></td>
        <td data-name="PA" <?= $Page->PA->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_PA">
<span<?= $Page->PA->viewAttributes() ?>>
<?= $Page->PA->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->InvestigationReport->Visible) { // InvestigationReport ?>
    <tr id="r_InvestigationReport">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_InvestigationReport"><?= $Page->InvestigationReport->caption() ?></span></td>
        <td data-name="InvestigationReport" <?= $Page->InvestigationReport->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_InvestigationReport">
<span<?= $Page->InvestigationReport->viewAttributes() ?>>
<?= $Page->InvestigationReport->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FinalDiagnosis->Visible) { // FinalDiagnosis ?>
    <tr id="r_FinalDiagnosis">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_FinalDiagnosis"><?= $Page->FinalDiagnosis->caption() ?></span></td>
        <td data-name="FinalDiagnosis" <?= $Page->FinalDiagnosis->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_FinalDiagnosis">
<span<?= $Page->FinalDiagnosis->viewAttributes() ?>>
<?= $Page->FinalDiagnosis->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
    <tr id="r_Treatment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Treatment"><?= $Page->Treatment->caption() ?></span></td>
        <td data-name="Treatment" <?= $Page->Treatment->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Treatment">
<span<?= $Page->Treatment->viewAttributes() ?>>
<?= $Page->Treatment->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DetailOfOperation->Visible) { // DetailOfOperation ?>
    <tr id="r_DetailOfOperation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_DetailOfOperation"><?= $Page->DetailOfOperation->caption() ?></span></td>
        <td data-name="DetailOfOperation" <?= $Page->DetailOfOperation->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_DetailOfOperation">
<span<?= $Page->DetailOfOperation->viewAttributes() ?>>
<?= $Page->DetailOfOperation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FollowUpAdvice->Visible) { // FollowUpAdvice ?>
    <tr id="r_FollowUpAdvice">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_FollowUpAdvice"><?= $Page->FollowUpAdvice->caption() ?></span></td>
        <td data-name="FollowUpAdvice" <?= $Page->FollowUpAdvice->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_FollowUpAdvice">
<span<?= $Page->FollowUpAdvice->viewAttributes() ?>>
<?= $Page->FollowUpAdvice->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FollowUpMedication->Visible) { // FollowUpMedication ?>
    <tr id="r_FollowUpMedication">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_FollowUpMedication"><?= $Page->FollowUpMedication->caption() ?></span></td>
        <td data-name="FollowUpMedication" <?= $Page->FollowUpMedication->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_FollowUpMedication">
<span<?= $Page->FollowUpMedication->viewAttributes() ?>>
<?= $Page->FollowUpMedication->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Plan->Visible) { // Plan ?>
    <tr id="r_Plan">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_Plan"><?= $Page->Plan->caption() ?></span></td>
        <td data-name="Plan" <?= $Page->Plan->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_Plan">
<span<?= $Page->Plan->viewAttributes() ?>>
<?= $Page->Plan->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_otherprocedure_TidNo"><?= $Page->TidNo->caption() ?></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_otherprocedure_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
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

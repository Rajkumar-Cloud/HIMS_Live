<?php

namespace PHPMaker2021\project3;

// Page object
$IvfSemenanalysisreportView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_semenanalysisreportview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_semenanalysisreportview = currentForm = new ew.Form("fivf_semenanalysisreportview", "view");
    loadjs.done("fivf_semenanalysisreportview");
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
<form name="fivf_semenanalysisreportview" id="fivf_semenanalysisreportview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_semenanalysisreport">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <tr id="r_RIDNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_RIDNo"><?= $Page->RIDNo->caption() ?></span></td>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PatientName"><?= $Page->PatientName->caption() ?></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HusbandName->Visible) { // HusbandName ?>
    <tr id="r_HusbandName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_HusbandName"><?= $Page->HusbandName->caption() ?></span></td>
        <td data-name="HusbandName" <?= $Page->HusbandName->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_HusbandName">
<span<?= $Page->HusbandName->viewAttributes() ?>>
<?= $Page->HusbandName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RequestDr->Visible) { // RequestDr ?>
    <tr id="r_RequestDr">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_RequestDr"><?= $Page->RequestDr->caption() ?></span></td>
        <td data-name="RequestDr" <?= $Page->RequestDr->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_RequestDr">
<span<?= $Page->RequestDr->viewAttributes() ?>>
<?= $Page->RequestDr->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CollectionDate->Visible) { // CollectionDate ?>
    <tr id="r_CollectionDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_CollectionDate"><?= $Page->CollectionDate->caption() ?></span></td>
        <td data-name="CollectionDate" <?= $Page->CollectionDate->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_CollectionDate">
<span<?= $Page->CollectionDate->viewAttributes() ?>>
<?= $Page->CollectionDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
    <tr id="r_ResultDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_ResultDate"><?= $Page->ResultDate->caption() ?></span></td>
        <td data-name="ResultDate" <?= $Page->ResultDate->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_ResultDate">
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RequestSample->Visible) { // RequestSample ?>
    <tr id="r_RequestSample">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_RequestSample"><?= $Page->RequestSample->caption() ?></span></td>
        <td data-name="RequestSample" <?= $Page->RequestSample->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_RequestSample">
<span<?= $Page->RequestSample->viewAttributes() ?>>
<?= $Page->RequestSample->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CollectionType->Visible) { // CollectionType ?>
    <tr id="r_CollectionType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_CollectionType"><?= $Page->CollectionType->caption() ?></span></td>
        <td data-name="CollectionType" <?= $Page->CollectionType->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_CollectionType">
<span<?= $Page->CollectionType->viewAttributes() ?>>
<?= $Page->CollectionType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CollectionMethod->Visible) { // CollectionMethod ?>
    <tr id="r_CollectionMethod">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_CollectionMethod"><?= $Page->CollectionMethod->caption() ?></span></td>
        <td data-name="CollectionMethod" <?= $Page->CollectionMethod->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_CollectionMethod">
<span<?= $Page->CollectionMethod->viewAttributes() ?>>
<?= $Page->CollectionMethod->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Medicationused->Visible) { // Medicationused ?>
    <tr id="r_Medicationused">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Medicationused"><?= $Page->Medicationused->caption() ?></span></td>
        <td data-name="Medicationused" <?= $Page->Medicationused->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Medicationused">
<span<?= $Page->Medicationused->viewAttributes() ?>>
<?= $Page->Medicationused->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
    <tr id="r_DifficultiesinCollection">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_DifficultiesinCollection"><?= $Page->DifficultiesinCollection->caption() ?></span></td>
        <td data-name="DifficultiesinCollection" <?= $Page->DifficultiesinCollection->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_DifficultiesinCollection">
<span<?= $Page->DifficultiesinCollection->viewAttributes() ?>>
<?= $Page->DifficultiesinCollection->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
    <tr id="r_Volume">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Volume"><?= $Page->Volume->caption() ?></span></td>
        <td data-name="Volume" <?= $Page->Volume->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Volume">
<span<?= $Page->Volume->viewAttributes() ?>>
<?= $Page->Volume->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pH->Visible) { // pH ?>
    <tr id="r_pH">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_pH"><?= $Page->pH->caption() ?></span></td>
        <td data-name="pH" <?= $Page->pH->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_pH">
<span<?= $Page->pH->viewAttributes() ?>>
<?= $Page->pH->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Timeofcollection->Visible) { // Timeofcollection ?>
    <tr id="r_Timeofcollection">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Timeofcollection"><?= $Page->Timeofcollection->caption() ?></span></td>
        <td data-name="Timeofcollection" <?= $Page->Timeofcollection->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Timeofcollection">
<span<?= $Page->Timeofcollection->viewAttributes() ?>>
<?= $Page->Timeofcollection->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Timeofexamination->Visible) { // Timeofexamination ?>
    <tr id="r_Timeofexamination">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Timeofexamination"><?= $Page->Timeofexamination->caption() ?></span></td>
        <td data-name="Timeofexamination" <?= $Page->Timeofexamination->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Timeofexamination">
<span<?= $Page->Timeofexamination->viewAttributes() ?>>
<?= $Page->Timeofexamination->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Concentration->Visible) { // Concentration ?>
    <tr id="r_Concentration">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Concentration"><?= $Page->Concentration->caption() ?></span></td>
        <td data-name="Concentration" <?= $Page->Concentration->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Concentration">
<span<?= $Page->Concentration->viewAttributes() ?>>
<?= $Page->Concentration->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
    <tr id="r_Total">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Total"><?= $Page->Total->caption() ?></span></td>
        <td data-name="Total" <?= $Page->Total->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Total">
<span<?= $Page->Total->viewAttributes() ?>>
<?= $Page->Total->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
    <tr id="r_ProgressiveMotility">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_ProgressiveMotility"><?= $Page->ProgressiveMotility->caption() ?></span></td>
        <td data-name="ProgressiveMotility" <?= $Page->ProgressiveMotility->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_ProgressiveMotility">
<span<?= $Page->ProgressiveMotility->viewAttributes() ?>>
<?= $Page->ProgressiveMotility->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
    <tr id="r_NonProgrssiveMotile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_NonProgrssiveMotile"><?= $Page->NonProgrssiveMotile->caption() ?></span></td>
        <td data-name="NonProgrssiveMotile" <?= $Page->NonProgrssiveMotile->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_NonProgrssiveMotile">
<span<?= $Page->NonProgrssiveMotile->viewAttributes() ?>>
<?= $Page->NonProgrssiveMotile->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Immotile->Visible) { // Immotile ?>
    <tr id="r_Immotile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Immotile"><?= $Page->Immotile->caption() ?></span></td>
        <td data-name="Immotile" <?= $Page->Immotile->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Immotile">
<span<?= $Page->Immotile->viewAttributes() ?>>
<?= $Page->Immotile->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
    <tr id="r_TotalProgrssiveMotile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile"><?= $Page->TotalProgrssiveMotile->caption() ?></span></td>
        <td data-name="TotalProgrssiveMotile" <?= $Page->TotalProgrssiveMotile->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_TotalProgrssiveMotile">
<span<?= $Page->TotalProgrssiveMotile->viewAttributes() ?>>
<?= $Page->TotalProgrssiveMotile->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Appearance->Visible) { // Appearance ?>
    <tr id="r_Appearance">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Appearance"><?= $Page->Appearance->caption() ?></span></td>
        <td data-name="Appearance" <?= $Page->Appearance->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Appearance">
<span<?= $Page->Appearance->viewAttributes() ?>>
<?= $Page->Appearance->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Homogenosity->Visible) { // Homogenosity ?>
    <tr id="r_Homogenosity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Homogenosity"><?= $Page->Homogenosity->caption() ?></span></td>
        <td data-name="Homogenosity" <?= $Page->Homogenosity->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Homogenosity">
<span<?= $Page->Homogenosity->viewAttributes() ?>>
<?= $Page->Homogenosity->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CompleteSample->Visible) { // CompleteSample ?>
    <tr id="r_CompleteSample">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_CompleteSample"><?= $Page->CompleteSample->caption() ?></span></td>
        <td data-name="CompleteSample" <?= $Page->CompleteSample->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_CompleteSample">
<span<?= $Page->CompleteSample->viewAttributes() ?>>
<?= $Page->CompleteSample->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Liquefactiontime->Visible) { // Liquefactiontime ?>
    <tr id="r_Liquefactiontime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Liquefactiontime"><?= $Page->Liquefactiontime->caption() ?></span></td>
        <td data-name="Liquefactiontime" <?= $Page->Liquefactiontime->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Liquefactiontime">
<span<?= $Page->Liquefactiontime->viewAttributes() ?>>
<?= $Page->Liquefactiontime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Normal->Visible) { // Normal ?>
    <tr id="r_Normal">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Normal"><?= $Page->Normal->caption() ?></span></td>
        <td data-name="Normal" <?= $Page->Normal->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Normal">
<span<?= $Page->Normal->viewAttributes() ?>>
<?= $Page->Normal->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
    <tr id="r_Abnormal">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Abnormal"><?= $Page->Abnormal->caption() ?></span></td>
        <td data-name="Abnormal" <?= $Page->Abnormal->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Abnormal">
<span<?= $Page->Abnormal->viewAttributes() ?>>
<?= $Page->Abnormal->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Headdefects->Visible) { // Headdefects ?>
    <tr id="r_Headdefects">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Headdefects"><?= $Page->Headdefects->caption() ?></span></td>
        <td data-name="Headdefects" <?= $Page->Headdefects->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Headdefects">
<span<?= $Page->Headdefects->viewAttributes() ?>>
<?= $Page->Headdefects->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MidpieceDefects->Visible) { // MidpieceDefects ?>
    <tr id="r_MidpieceDefects">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_MidpieceDefects"><?= $Page->MidpieceDefects->caption() ?></span></td>
        <td data-name="MidpieceDefects" <?= $Page->MidpieceDefects->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_MidpieceDefects">
<span<?= $Page->MidpieceDefects->viewAttributes() ?>>
<?= $Page->MidpieceDefects->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TailDefects->Visible) { // TailDefects ?>
    <tr id="r_TailDefects">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TailDefects"><?= $Page->TailDefects->caption() ?></span></td>
        <td data-name="TailDefects" <?= $Page->TailDefects->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_TailDefects">
<span<?= $Page->TailDefects->viewAttributes() ?>>
<?= $Page->TailDefects->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NormalProgMotile->Visible) { // NormalProgMotile ?>
    <tr id="r_NormalProgMotile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_NormalProgMotile"><?= $Page->NormalProgMotile->caption() ?></span></td>
        <td data-name="NormalProgMotile" <?= $Page->NormalProgMotile->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_NormalProgMotile">
<span<?= $Page->NormalProgMotile->viewAttributes() ?>>
<?= $Page->NormalProgMotile->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ImmatureForms->Visible) { // ImmatureForms ?>
    <tr id="r_ImmatureForms">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_ImmatureForms"><?= $Page->ImmatureForms->caption() ?></span></td>
        <td data-name="ImmatureForms" <?= $Page->ImmatureForms->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_ImmatureForms">
<span<?= $Page->ImmatureForms->viewAttributes() ?>>
<?= $Page->ImmatureForms->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Leucocytes->Visible) { // Leucocytes ?>
    <tr id="r_Leucocytes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Leucocytes"><?= $Page->Leucocytes->caption() ?></span></td>
        <td data-name="Leucocytes" <?= $Page->Leucocytes->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Leucocytes">
<span<?= $Page->Leucocytes->viewAttributes() ?>>
<?= $Page->Leucocytes->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Agglutination->Visible) { // Agglutination ?>
    <tr id="r_Agglutination">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Agglutination"><?= $Page->Agglutination->caption() ?></span></td>
        <td data-name="Agglutination" <?= $Page->Agglutination->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Agglutination">
<span<?= $Page->Agglutination->viewAttributes() ?>>
<?= $Page->Agglutination->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Debris->Visible) { // Debris ?>
    <tr id="r_Debris">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Debris"><?= $Page->Debris->caption() ?></span></td>
        <td data-name="Debris" <?= $Page->Debris->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Debris">
<span<?= $Page->Debris->viewAttributes() ?>>
<?= $Page->Debris->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Diagnosis->Visible) { // Diagnosis ?>
    <tr id="r_Diagnosis">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Diagnosis"><?= $Page->Diagnosis->caption() ?></span></td>
        <td data-name="Diagnosis" <?= $Page->Diagnosis->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Diagnosis">
<span<?= $Page->Diagnosis->viewAttributes() ?>>
<?= $Page->Diagnosis->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Observations->Visible) { // Observations ?>
    <tr id="r_Observations">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Observations"><?= $Page->Observations->caption() ?></span></td>
        <td data-name="Observations" <?= $Page->Observations->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Observations">
<span<?= $Page->Observations->viewAttributes() ?>>
<?= $Page->Observations->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Signature->Visible) { // Signature ?>
    <tr id="r_Signature">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Signature"><?= $Page->Signature->caption() ?></span></td>
        <td data-name="Signature" <?= $Page->Signature->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Signature">
<span<?= $Page->Signature->viewAttributes() ?>>
<?= $Page->Signature->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SemenOrgin->Visible) { // SemenOrgin ?>
    <tr id="r_SemenOrgin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_SemenOrgin"><?= $Page->SemenOrgin->caption() ?></span></td>
        <td data-name="SemenOrgin" <?= $Page->SemenOrgin->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_SemenOrgin">
<span<?= $Page->SemenOrgin->viewAttributes() ?>>
<?= $Page->SemenOrgin->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Donor->Visible) { // Donor ?>
    <tr id="r_Donor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Donor"><?= $Page->Donor->caption() ?></span></td>
        <td data-name="Donor" <?= $Page->Donor->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Donor">
<span<?= $Page->Donor->viewAttributes() ?>>
<?= $Page->Donor->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
    <tr id="r_DonorBloodgroup">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_DonorBloodgroup"><?= $Page->DonorBloodgroup->caption() ?></span></td>
        <td data-name="DonorBloodgroup" <?= $Page->DonorBloodgroup->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_DonorBloodgroup">
<span<?= $Page->DonorBloodgroup->viewAttributes() ?>>
<?= $Page->DonorBloodgroup->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
    <tr id="r_Tank">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Tank"><?= $Page->Tank->caption() ?></span></td>
        <td data-name="Tank" <?= $Page->Tank->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Tank">
<span<?= $Page->Tank->viewAttributes() ?>>
<?= $Page->Tank->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Location->Visible) { // Location ?>
    <tr id="r_Location">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Location"><?= $Page->Location->caption() ?></span></td>
        <td data-name="Location" <?= $Page->Location->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Location">
<span<?= $Page->Location->viewAttributes() ?>>
<?= $Page->Location->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Volume1->Visible) { // Volume1 ?>
    <tr id="r_Volume1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Volume1"><?= $Page->Volume1->caption() ?></span></td>
        <td data-name="Volume1" <?= $Page->Volume1->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Volume1">
<span<?= $Page->Volume1->viewAttributes() ?>>
<?= $Page->Volume1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Concentration1->Visible) { // Concentration1 ?>
    <tr id="r_Concentration1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Concentration1"><?= $Page->Concentration1->caption() ?></span></td>
        <td data-name="Concentration1" <?= $Page->Concentration1->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Concentration1">
<span<?= $Page->Concentration1->viewAttributes() ?>>
<?= $Page->Concentration1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Total1->Visible) { // Total1 ?>
    <tr id="r_Total1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Total1"><?= $Page->Total1->caption() ?></span></td>
        <td data-name="Total1" <?= $Page->Total1->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Total1">
<span<?= $Page->Total1->viewAttributes() ?>>
<?= $Page->Total1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
    <tr id="r_ProgressiveMotility1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_ProgressiveMotility1"><?= $Page->ProgressiveMotility1->caption() ?></span></td>
        <td data-name="ProgressiveMotility1" <?= $Page->ProgressiveMotility1->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_ProgressiveMotility1">
<span<?= $Page->ProgressiveMotility1->viewAttributes() ?>>
<?= $Page->ProgressiveMotility1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
    <tr id="r_NonProgrssiveMotile1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_NonProgrssiveMotile1"><?= $Page->NonProgrssiveMotile1->caption() ?></span></td>
        <td data-name="NonProgrssiveMotile1" <?= $Page->NonProgrssiveMotile1->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_NonProgrssiveMotile1">
<span<?= $Page->NonProgrssiveMotile1->viewAttributes() ?>>
<?= $Page->NonProgrssiveMotile1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Immotile1->Visible) { // Immotile1 ?>
    <tr id="r_Immotile1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Immotile1"><?= $Page->Immotile1->caption() ?></span></td>
        <td data-name="Immotile1" <?= $Page->Immotile1->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Immotile1">
<span<?= $Page->Immotile1->viewAttributes() ?>>
<?= $Page->Immotile1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
    <tr id="r_TotalProgrssiveMotile1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile1"><?= $Page->TotalProgrssiveMotile1->caption() ?></span></td>
        <td data-name="TotalProgrssiveMotile1" <?= $Page->TotalProgrssiveMotile1->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_TotalProgrssiveMotile1">
<span<?= $Page->TotalProgrssiveMotile1->viewAttributes() ?>>
<?= $Page->TotalProgrssiveMotile1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TidNo"><?= $Page->TidNo->caption() ?></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Color->Visible) { // Color ?>
    <tr id="r_Color">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Color"><?= $Page->Color->caption() ?></span></td>
        <td data-name="Color" <?= $Page->Color->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Color">
<span<?= $Page->Color->viewAttributes() ?>>
<?= $Page->Color->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DoneBy->Visible) { // DoneBy ?>
    <tr id="r_DoneBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_DoneBy"><?= $Page->DoneBy->caption() ?></span></td>
        <td data-name="DoneBy" <?= $Page->DoneBy->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_DoneBy">
<span<?= $Page->DoneBy->viewAttributes() ?>>
<?= $Page->DoneBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <tr id="r_Method">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Method"><?= $Page->Method->caption() ?></span></td>
        <td data-name="Method" <?= $Page->Method->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Abstinence->Visible) { // Abstinence ?>
    <tr id="r_Abstinence">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Abstinence"><?= $Page->Abstinence->caption() ?></span></td>
        <td data-name="Abstinence" <?= $Page->Abstinence->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Abstinence">
<span<?= $Page->Abstinence->viewAttributes() ?>>
<?= $Page->Abstinence->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProcessedBy->Visible) { // ProcessedBy ?>
    <tr id="r_ProcessedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_ProcessedBy"><?= $Page->ProcessedBy->caption() ?></span></td>
        <td data-name="ProcessedBy" <?= $Page->ProcessedBy->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_ProcessedBy">
<span<?= $Page->ProcessedBy->viewAttributes() ?>>
<?= $Page->ProcessedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->InseminationTime->Visible) { // InseminationTime ?>
    <tr id="r_InseminationTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_InseminationTime"><?= $Page->InseminationTime->caption() ?></span></td>
        <td data-name="InseminationTime" <?= $Page->InseminationTime->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_InseminationTime">
<span<?= $Page->InseminationTime->viewAttributes() ?>>
<?= $Page->InseminationTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->InseminationBy->Visible) { // InseminationBy ?>
    <tr id="r_InseminationBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_InseminationBy"><?= $Page->InseminationBy->caption() ?></span></td>
        <td data-name="InseminationBy" <?= $Page->InseminationBy->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_InseminationBy">
<span<?= $Page->InseminationBy->viewAttributes() ?>>
<?= $Page->InseminationBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Big->Visible) { // Big ?>
    <tr id="r_Big">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Big"><?= $Page->Big->caption() ?></span></td>
        <td data-name="Big" <?= $Page->Big->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Big">
<span<?= $Page->Big->viewAttributes() ?>>
<?= $Page->Big->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Medium->Visible) { // Medium ?>
    <tr id="r_Medium">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Medium"><?= $Page->Medium->caption() ?></span></td>
        <td data-name="Medium" <?= $Page->Medium->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Medium">
<span<?= $Page->Medium->viewAttributes() ?>>
<?= $Page->Medium->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Small->Visible) { // Small ?>
    <tr id="r_Small">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Small"><?= $Page->Small->caption() ?></span></td>
        <td data-name="Small" <?= $Page->Small->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Small">
<span<?= $Page->Small->viewAttributes() ?>>
<?= $Page->Small->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoHalo->Visible) { // NoHalo ?>
    <tr id="r_NoHalo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_NoHalo"><?= $Page->NoHalo->caption() ?></span></td>
        <td data-name="NoHalo" <?= $Page->NoHalo->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_NoHalo">
<span<?= $Page->NoHalo->viewAttributes() ?>>
<?= $Page->NoHalo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Fragmented->Visible) { // Fragmented ?>
    <tr id="r_Fragmented">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Fragmented"><?= $Page->Fragmented->caption() ?></span></td>
        <td data-name="Fragmented" <?= $Page->Fragmented->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Fragmented">
<span<?= $Page->Fragmented->viewAttributes() ?>>
<?= $Page->Fragmented->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NonFragmented->Visible) { // NonFragmented ?>
    <tr id="r_NonFragmented">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_NonFragmented"><?= $Page->NonFragmented->caption() ?></span></td>
        <td data-name="NonFragmented" <?= $Page->NonFragmented->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_NonFragmented">
<span<?= $Page->NonFragmented->viewAttributes() ?>>
<?= $Page->NonFragmented->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DFI->Visible) { // DFI ?>
    <tr id="r_DFI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_DFI"><?= $Page->DFI->caption() ?></span></td>
        <td data-name="DFI" <?= $Page->DFI->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_DFI">
<span<?= $Page->DFI->viewAttributes() ?>>
<?= $Page->DFI->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IsueBy->Visible) { // IsueBy ?>
    <tr id="r_IsueBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_IsueBy"><?= $Page->IsueBy->caption() ?></span></td>
        <td data-name="IsueBy" <?= $Page->IsueBy->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_IsueBy">
<span<?= $Page->IsueBy->viewAttributes() ?>>
<?= $Page->IsueBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Volume2->Visible) { // Volume2 ?>
    <tr id="r_Volume2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Volume2"><?= $Page->Volume2->caption() ?></span></td>
        <td data-name="Volume2" <?= $Page->Volume2->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Volume2">
<span<?= $Page->Volume2->viewAttributes() ?>>
<?= $Page->Volume2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Concentration2->Visible) { // Concentration2 ?>
    <tr id="r_Concentration2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Concentration2"><?= $Page->Concentration2->caption() ?></span></td>
        <td data-name="Concentration2" <?= $Page->Concentration2->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Concentration2">
<span<?= $Page->Concentration2->viewAttributes() ?>>
<?= $Page->Concentration2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Total2->Visible) { // Total2 ?>
    <tr id="r_Total2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Total2"><?= $Page->Total2->caption() ?></span></td>
        <td data-name="Total2" <?= $Page->Total2->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Total2">
<span<?= $Page->Total2->viewAttributes() ?>>
<?= $Page->Total2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
    <tr id="r_ProgressiveMotility2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_ProgressiveMotility2"><?= $Page->ProgressiveMotility2->caption() ?></span></td>
        <td data-name="ProgressiveMotility2" <?= $Page->ProgressiveMotility2->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_ProgressiveMotility2">
<span<?= $Page->ProgressiveMotility2->viewAttributes() ?>>
<?= $Page->ProgressiveMotility2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
    <tr id="r_NonProgrssiveMotile2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_NonProgrssiveMotile2"><?= $Page->NonProgrssiveMotile2->caption() ?></span></td>
        <td data-name="NonProgrssiveMotile2" <?= $Page->NonProgrssiveMotile2->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_NonProgrssiveMotile2">
<span<?= $Page->NonProgrssiveMotile2->viewAttributes() ?>>
<?= $Page->NonProgrssiveMotile2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Immotile2->Visible) { // Immotile2 ?>
    <tr id="r_Immotile2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Immotile2"><?= $Page->Immotile2->caption() ?></span></td>
        <td data-name="Immotile2" <?= $Page->Immotile2->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_Immotile2">
<span<?= $Page->Immotile2->viewAttributes() ?>>
<?= $Page->Immotile2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
    <tr id="r_TotalProgrssiveMotile2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile2"><?= $Page->TotalProgrssiveMotile2->caption() ?></span></td>
        <td data-name="TotalProgrssiveMotile2" <?= $Page->TotalProgrssiveMotile2->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_TotalProgrssiveMotile2">
<span<?= $Page->TotalProgrssiveMotile2->viewAttributes() ?>>
<?= $Page->TotalProgrssiveMotile2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IssuedBy->Visible) { // IssuedBy ?>
    <tr id="r_IssuedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_IssuedBy"><?= $Page->IssuedBy->caption() ?></span></td>
        <td data-name="IssuedBy" <?= $Page->IssuedBy->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_IssuedBy">
<span<?= $Page->IssuedBy->viewAttributes() ?>>
<?= $Page->IssuedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IssuedTo->Visible) { // IssuedTo ?>
    <tr id="r_IssuedTo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_IssuedTo"><?= $Page->IssuedTo->caption() ?></span></td>
        <td data-name="IssuedTo" <?= $Page->IssuedTo->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_IssuedTo">
<span<?= $Page->IssuedTo->viewAttributes() ?>>
<?= $Page->IssuedTo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaID->Visible) { // PaID ?>
    <tr id="r_PaID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PaID"><?= $Page->PaID->caption() ?></span></td>
        <td data-name="PaID" <?= $Page->PaID->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_PaID">
<span<?= $Page->PaID->viewAttributes() ?>>
<?= $Page->PaID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaName->Visible) { // PaName ?>
    <tr id="r_PaName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PaName"><?= $Page->PaName->caption() ?></span></td>
        <td data-name="PaName" <?= $Page->PaName->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_PaName">
<span<?= $Page->PaName->viewAttributes() ?>>
<?= $Page->PaName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaMobile->Visible) { // PaMobile ?>
    <tr id="r_PaMobile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PaMobile"><?= $Page->PaMobile->caption() ?></span></td>
        <td data-name="PaMobile" <?= $Page->PaMobile->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_PaMobile">
<span<?= $Page->PaMobile->viewAttributes() ?>>
<?= $Page->PaMobile->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <tr id="r_PartnerID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PartnerID"><?= $Page->PartnerID->caption() ?></span></td>
        <td data-name="PartnerID" <?= $Page->PartnerID->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <tr id="r_PartnerName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PartnerName"><?= $Page->PartnerName->caption() ?></span></td>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
    <tr id="r_PartnerMobile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PartnerMobile"><?= $Page->PartnerMobile->caption() ?></span></td>
        <td data-name="PartnerMobile" <?= $Page->PartnerMobile->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_PartnerMobile">
<span<?= $Page->PartnerMobile->viewAttributes() ?>>
<?= $Page->PartnerMobile->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MACS->Visible) { // MACS ?>
    <tr id="r_MACS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_MACS"><?= $Page->MACS->caption() ?></span></td>
        <td data-name="MACS" <?= $Page->MACS->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_MACS">
<span<?= $Page->MACS->viewAttributes() ?>>
<?= $Page->MACS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
    <tr id="r_PREG_TEST_DATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PREG_TEST_DATE"><?= $Page->PREG_TEST_DATE->caption() ?></span></td>
        <td data-name="PREG_TEST_DATE" <?= $Page->PREG_TEST_DATE->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_PREG_TEST_DATE">
<span<?= $Page->PREG_TEST_DATE->viewAttributes() ?>>
<?= $Page->PREG_TEST_DATE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
    <tr id="r_SPECIFIC_PROBLEMS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_SPECIFIC_PROBLEMS"><?= $Page->SPECIFIC_PROBLEMS->caption() ?></span></td>
        <td data-name="SPECIFIC_PROBLEMS" <?= $Page->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<span<?= $Page->SPECIFIC_PROBLEMS->viewAttributes() ?>>
<?= $Page->SPECIFIC_PROBLEMS->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IMSC_1->Visible) { // IMSC_1 ?>
    <tr id="r_IMSC_1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_IMSC_1"><?= $Page->IMSC_1->caption() ?></span></td>
        <td data-name="IMSC_1" <?= $Page->IMSC_1->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_IMSC_1">
<span<?= $Page->IMSC_1->viewAttributes() ?>>
<?= $Page->IMSC_1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IMSC_2->Visible) { // IMSC_2 ?>
    <tr id="r_IMSC_2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_IMSC_2"><?= $Page->IMSC_2->caption() ?></span></td>
        <td data-name="IMSC_2" <?= $Page->IMSC_2->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_IMSC_2">
<span<?= $Page->IMSC_2->viewAttributes() ?>>
<?= $Page->IMSC_2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
    <tr id="r_LIQUIFACTION_STORAGE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_LIQUIFACTION_STORAGE"><?= $Page->LIQUIFACTION_STORAGE->caption() ?></span></td>
        <td data-name="LIQUIFACTION_STORAGE" <?= $Page->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<span<?= $Page->LIQUIFACTION_STORAGE->viewAttributes() ?>>
<?= $Page->LIQUIFACTION_STORAGE->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
    <tr id="r_IUI_PREP_METHOD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_IUI_PREP_METHOD"><?= $Page->IUI_PREP_METHOD->caption() ?></span></td>
        <td data-name="IUI_PREP_METHOD" <?= $Page->IUI_PREP_METHOD->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_IUI_PREP_METHOD">
<span<?= $Page->IUI_PREP_METHOD->viewAttributes() ?>>
<?= $Page->IUI_PREP_METHOD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
    <tr id="r_TIME_FROM_TRIGGER">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TIME_FROM_TRIGGER"><?= $Page->TIME_FROM_TRIGGER->caption() ?></span></td>
        <td data-name="TIME_FROM_TRIGGER" <?= $Page->TIME_FROM_TRIGGER->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<span<?= $Page->TIME_FROM_TRIGGER->viewAttributes() ?>>
<?= $Page->TIME_FROM_TRIGGER->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
    <tr id="r_COLLECTION_TO_PREPARATION">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION"><?= $Page->COLLECTION_TO_PREPARATION->caption() ?></span></td>
        <td data-name="COLLECTION_TO_PREPARATION" <?= $Page->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<span<?= $Page->COLLECTION_TO_PREPARATION->viewAttributes() ?>>
<?= $Page->COLLECTION_TO_PREPARATION->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
    <tr id="r_TIME_FROM_PREP_TO_INSEM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM"><?= $Page->TIME_FROM_PREP_TO_INSEM->caption() ?></span></td>
        <td data-name="TIME_FROM_PREP_TO_INSEM" <?= $Page->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<span id="el_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<span<?= $Page->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>>
<?= $Page->TIME_FROM_PREP_TO_INSEM->getViewValue() ?></span>
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

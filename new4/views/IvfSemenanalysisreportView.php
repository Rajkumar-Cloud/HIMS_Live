<?php

namespace PHPMaker2021\HIMS;

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
<script>
if (!ew.vars.tables.ivf_semenanalysisreport) ew.vars.tables.ivf_semenanalysisreport = <?= JsonEncode(GetClientVar("tables", "ivf_semenanalysisreport")) ?>;
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
<form name="fivf_semenanalysisreportview" id="fivf_semenanalysisreportview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_semenanalysisreport">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_id"><template id="tpc_ivf_semenanalysisreport_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_id"><span id="el_ivf_semenanalysisreport_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <tr id="r_RIDNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_RIDNo"><template id="tpc_ivf_semenanalysisreport_RIDNo"><?= $Page->RIDNo->caption() ?></template></span></td>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_RIDNo"><span id="el_ivf_semenanalysisreport_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PatientName"><template id="tpc_ivf_semenanalysisreport_PatientName"><?= $Page->PatientName->caption() ?></template></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_PatientName"><span id="el_ivf_semenanalysisreport_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HusbandName->Visible) { // HusbandName ?>
    <tr id="r_HusbandName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_HusbandName"><template id="tpc_ivf_semenanalysisreport_HusbandName"><?= $Page->HusbandName->caption() ?></template></span></td>
        <td data-name="HusbandName" <?= $Page->HusbandName->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_HusbandName"><span id="el_ivf_semenanalysisreport_HusbandName">
<span<?= $Page->HusbandName->viewAttributes() ?>>
<?= $Page->HusbandName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RequestDr->Visible) { // RequestDr ?>
    <tr id="r_RequestDr">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_RequestDr"><template id="tpc_ivf_semenanalysisreport_RequestDr"><?= $Page->RequestDr->caption() ?></template></span></td>
        <td data-name="RequestDr" <?= $Page->RequestDr->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_RequestDr"><span id="el_ivf_semenanalysisreport_RequestDr">
<span<?= $Page->RequestDr->viewAttributes() ?>>
<?= $Page->RequestDr->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CollectionDate->Visible) { // CollectionDate ?>
    <tr id="r_CollectionDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_CollectionDate"><template id="tpc_ivf_semenanalysisreport_CollectionDate"><?= $Page->CollectionDate->caption() ?></template></span></td>
        <td data-name="CollectionDate" <?= $Page->CollectionDate->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_CollectionDate"><span id="el_ivf_semenanalysisreport_CollectionDate">
<span<?= $Page->CollectionDate->viewAttributes() ?>>
<?= $Page->CollectionDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
    <tr id="r_ResultDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_ResultDate"><template id="tpc_ivf_semenanalysisreport_ResultDate"><?= $Page->ResultDate->caption() ?></template></span></td>
        <td data-name="ResultDate" <?= $Page->ResultDate->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_ResultDate"><span id="el_ivf_semenanalysisreport_ResultDate">
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RequestSample->Visible) { // RequestSample ?>
    <tr id="r_RequestSample">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_RequestSample"><template id="tpc_ivf_semenanalysisreport_RequestSample"><?= $Page->RequestSample->caption() ?></template></span></td>
        <td data-name="RequestSample" <?= $Page->RequestSample->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_RequestSample"><span id="el_ivf_semenanalysisreport_RequestSample">
<span<?= $Page->RequestSample->viewAttributes() ?>>
<?= $Page->RequestSample->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CollectionType->Visible) { // CollectionType ?>
    <tr id="r_CollectionType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_CollectionType"><template id="tpc_ivf_semenanalysisreport_CollectionType"><?= $Page->CollectionType->caption() ?></template></span></td>
        <td data-name="CollectionType" <?= $Page->CollectionType->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_CollectionType"><span id="el_ivf_semenanalysisreport_CollectionType">
<span<?= $Page->CollectionType->viewAttributes() ?>>
<?= $Page->CollectionType->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CollectionMethod->Visible) { // CollectionMethod ?>
    <tr id="r_CollectionMethod">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_CollectionMethod"><template id="tpc_ivf_semenanalysisreport_CollectionMethod"><?= $Page->CollectionMethod->caption() ?></template></span></td>
        <td data-name="CollectionMethod" <?= $Page->CollectionMethod->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_CollectionMethod"><span id="el_ivf_semenanalysisreport_CollectionMethod">
<span<?= $Page->CollectionMethod->viewAttributes() ?>>
<?= $Page->CollectionMethod->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Medicationused->Visible) { // Medicationused ?>
    <tr id="r_Medicationused">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Medicationused"><template id="tpc_ivf_semenanalysisreport_Medicationused"><?= $Page->Medicationused->caption() ?></template></span></td>
        <td data-name="Medicationused" <?= $Page->Medicationused->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Medicationused"><span id="el_ivf_semenanalysisreport_Medicationused">
<span<?= $Page->Medicationused->viewAttributes() ?>>
<?= $Page->Medicationused->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
    <tr id="r_DifficultiesinCollection">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_DifficultiesinCollection"><template id="tpc_ivf_semenanalysisreport_DifficultiesinCollection"><?= $Page->DifficultiesinCollection->caption() ?></template></span></td>
        <td data-name="DifficultiesinCollection" <?= $Page->DifficultiesinCollection->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_DifficultiesinCollection"><span id="el_ivf_semenanalysisreport_DifficultiesinCollection">
<span<?= $Page->DifficultiesinCollection->viewAttributes() ?>>
<?= $Page->DifficultiesinCollection->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pH->Visible) { // pH ?>
    <tr id="r_pH">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_pH"><template id="tpc_ivf_semenanalysisreport_pH"><?= $Page->pH->caption() ?></template></span></td>
        <td data-name="pH" <?= $Page->pH->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_pH"><span id="el_ivf_semenanalysisreport_pH">
<span<?= $Page->pH->viewAttributes() ?>>
<?= $Page->pH->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Timeofcollection->Visible) { // Timeofcollection ?>
    <tr id="r_Timeofcollection">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Timeofcollection"><template id="tpc_ivf_semenanalysisreport_Timeofcollection"><?= $Page->Timeofcollection->caption() ?></template></span></td>
        <td data-name="Timeofcollection" <?= $Page->Timeofcollection->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Timeofcollection"><span id="el_ivf_semenanalysisreport_Timeofcollection">
<span<?= $Page->Timeofcollection->viewAttributes() ?>>
<?= $Page->Timeofcollection->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Timeofexamination->Visible) { // Timeofexamination ?>
    <tr id="r_Timeofexamination">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Timeofexamination"><template id="tpc_ivf_semenanalysisreport_Timeofexamination"><?= $Page->Timeofexamination->caption() ?></template></span></td>
        <td data-name="Timeofexamination" <?= $Page->Timeofexamination->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Timeofexamination"><span id="el_ivf_semenanalysisreport_Timeofexamination">
<span<?= $Page->Timeofexamination->viewAttributes() ?>>
<?= $Page->Timeofexamination->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
    <tr id="r_Volume">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Volume"><template id="tpc_ivf_semenanalysisreport_Volume"><?= $Page->Volume->caption() ?></template></span></td>
        <td data-name="Volume" <?= $Page->Volume->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Volume"><span id="el_ivf_semenanalysisreport_Volume">
<span<?= $Page->Volume->viewAttributes() ?>>
<?= $Page->Volume->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Concentration->Visible) { // Concentration ?>
    <tr id="r_Concentration">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Concentration"><template id="tpc_ivf_semenanalysisreport_Concentration"><?= $Page->Concentration->caption() ?></template></span></td>
        <td data-name="Concentration" <?= $Page->Concentration->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Concentration"><span id="el_ivf_semenanalysisreport_Concentration">
<span<?= $Page->Concentration->viewAttributes() ?>>
<?= $Page->Concentration->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
    <tr id="r_Total">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Total"><template id="tpc_ivf_semenanalysisreport_Total"><?= $Page->Total->caption() ?></template></span></td>
        <td data-name="Total" <?= $Page->Total->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Total"><span id="el_ivf_semenanalysisreport_Total">
<span<?= $Page->Total->viewAttributes() ?>>
<?= $Page->Total->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
    <tr id="r_ProgressiveMotility">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_ProgressiveMotility"><template id="tpc_ivf_semenanalysisreport_ProgressiveMotility"><?= $Page->ProgressiveMotility->caption() ?></template></span></td>
        <td data-name="ProgressiveMotility" <?= $Page->ProgressiveMotility->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_ProgressiveMotility"><span id="el_ivf_semenanalysisreport_ProgressiveMotility">
<span<?= $Page->ProgressiveMotility->viewAttributes() ?>>
<?= $Page->ProgressiveMotility->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
    <tr id="r_NonProgrssiveMotile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_NonProgrssiveMotile"><template id="tpc_ivf_semenanalysisreport_NonProgrssiveMotile"><?= $Page->NonProgrssiveMotile->caption() ?></template></span></td>
        <td data-name="NonProgrssiveMotile" <?= $Page->NonProgrssiveMotile->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_NonProgrssiveMotile"><span id="el_ivf_semenanalysisreport_NonProgrssiveMotile">
<span<?= $Page->NonProgrssiveMotile->viewAttributes() ?>>
<?= $Page->NonProgrssiveMotile->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Immotile->Visible) { // Immotile ?>
    <tr id="r_Immotile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Immotile"><template id="tpc_ivf_semenanalysisreport_Immotile"><?= $Page->Immotile->caption() ?></template></span></td>
        <td data-name="Immotile" <?= $Page->Immotile->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Immotile"><span id="el_ivf_semenanalysisreport_Immotile">
<span<?= $Page->Immotile->viewAttributes() ?>>
<?= $Page->Immotile->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
    <tr id="r_TotalProgrssiveMotile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile"><template id="tpc_ivf_semenanalysisreport_TotalProgrssiveMotile"><?= $Page->TotalProgrssiveMotile->caption() ?></template></span></td>
        <td data-name="TotalProgrssiveMotile" <?= $Page->TotalProgrssiveMotile->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_TotalProgrssiveMotile"><span id="el_ivf_semenanalysisreport_TotalProgrssiveMotile">
<span<?= $Page->TotalProgrssiveMotile->viewAttributes() ?>>
<?= $Page->TotalProgrssiveMotile->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Appearance->Visible) { // Appearance ?>
    <tr id="r_Appearance">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Appearance"><template id="tpc_ivf_semenanalysisreport_Appearance"><?= $Page->Appearance->caption() ?></template></span></td>
        <td data-name="Appearance" <?= $Page->Appearance->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Appearance"><span id="el_ivf_semenanalysisreport_Appearance">
<span<?= $Page->Appearance->viewAttributes() ?>>
<?= $Page->Appearance->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Homogenosity->Visible) { // Homogenosity ?>
    <tr id="r_Homogenosity">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Homogenosity"><template id="tpc_ivf_semenanalysisreport_Homogenosity"><?= $Page->Homogenosity->caption() ?></template></span></td>
        <td data-name="Homogenosity" <?= $Page->Homogenosity->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Homogenosity"><span id="el_ivf_semenanalysisreport_Homogenosity">
<span<?= $Page->Homogenosity->viewAttributes() ?>>
<?= $Page->Homogenosity->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CompleteSample->Visible) { // CompleteSample ?>
    <tr id="r_CompleteSample">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_CompleteSample"><template id="tpc_ivf_semenanalysisreport_CompleteSample"><?= $Page->CompleteSample->caption() ?></template></span></td>
        <td data-name="CompleteSample" <?= $Page->CompleteSample->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_CompleteSample"><span id="el_ivf_semenanalysisreport_CompleteSample">
<span<?= $Page->CompleteSample->viewAttributes() ?>>
<?= $Page->CompleteSample->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Liquefactiontime->Visible) { // Liquefactiontime ?>
    <tr id="r_Liquefactiontime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Liquefactiontime"><template id="tpc_ivf_semenanalysisreport_Liquefactiontime"><?= $Page->Liquefactiontime->caption() ?></template></span></td>
        <td data-name="Liquefactiontime" <?= $Page->Liquefactiontime->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Liquefactiontime"><span id="el_ivf_semenanalysisreport_Liquefactiontime">
<span<?= $Page->Liquefactiontime->viewAttributes() ?>>
<?= $Page->Liquefactiontime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Normal->Visible) { // Normal ?>
    <tr id="r_Normal">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Normal"><template id="tpc_ivf_semenanalysisreport_Normal"><?= $Page->Normal->caption() ?></template></span></td>
        <td data-name="Normal" <?= $Page->Normal->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Normal"><span id="el_ivf_semenanalysisreport_Normal">
<span<?= $Page->Normal->viewAttributes() ?>>
<?= $Page->Normal->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
    <tr id="r_Abnormal">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Abnormal"><template id="tpc_ivf_semenanalysisreport_Abnormal"><?= $Page->Abnormal->caption() ?></template></span></td>
        <td data-name="Abnormal" <?= $Page->Abnormal->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Abnormal"><span id="el_ivf_semenanalysisreport_Abnormal">
<span<?= $Page->Abnormal->viewAttributes() ?>>
<?= $Page->Abnormal->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Headdefects->Visible) { // Headdefects ?>
    <tr id="r_Headdefects">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Headdefects"><template id="tpc_ivf_semenanalysisreport_Headdefects"><?= $Page->Headdefects->caption() ?></template></span></td>
        <td data-name="Headdefects" <?= $Page->Headdefects->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Headdefects"><span id="el_ivf_semenanalysisreport_Headdefects">
<span<?= $Page->Headdefects->viewAttributes() ?>>
<?= $Page->Headdefects->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MidpieceDefects->Visible) { // MidpieceDefects ?>
    <tr id="r_MidpieceDefects">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_MidpieceDefects"><template id="tpc_ivf_semenanalysisreport_MidpieceDefects"><?= $Page->MidpieceDefects->caption() ?></template></span></td>
        <td data-name="MidpieceDefects" <?= $Page->MidpieceDefects->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_MidpieceDefects"><span id="el_ivf_semenanalysisreport_MidpieceDefects">
<span<?= $Page->MidpieceDefects->viewAttributes() ?>>
<?= $Page->MidpieceDefects->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TailDefects->Visible) { // TailDefects ?>
    <tr id="r_TailDefects">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TailDefects"><template id="tpc_ivf_semenanalysisreport_TailDefects"><?= $Page->TailDefects->caption() ?></template></span></td>
        <td data-name="TailDefects" <?= $Page->TailDefects->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_TailDefects"><span id="el_ivf_semenanalysisreport_TailDefects">
<span<?= $Page->TailDefects->viewAttributes() ?>>
<?= $Page->TailDefects->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NormalProgMotile->Visible) { // NormalProgMotile ?>
    <tr id="r_NormalProgMotile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_NormalProgMotile"><template id="tpc_ivf_semenanalysisreport_NormalProgMotile"><?= $Page->NormalProgMotile->caption() ?></template></span></td>
        <td data-name="NormalProgMotile" <?= $Page->NormalProgMotile->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_NormalProgMotile"><span id="el_ivf_semenanalysisreport_NormalProgMotile">
<span<?= $Page->NormalProgMotile->viewAttributes() ?>>
<?= $Page->NormalProgMotile->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ImmatureForms->Visible) { // ImmatureForms ?>
    <tr id="r_ImmatureForms">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_ImmatureForms"><template id="tpc_ivf_semenanalysisreport_ImmatureForms"><?= $Page->ImmatureForms->caption() ?></template></span></td>
        <td data-name="ImmatureForms" <?= $Page->ImmatureForms->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_ImmatureForms"><span id="el_ivf_semenanalysisreport_ImmatureForms">
<span<?= $Page->ImmatureForms->viewAttributes() ?>>
<?= $Page->ImmatureForms->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Leucocytes->Visible) { // Leucocytes ?>
    <tr id="r_Leucocytes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Leucocytes"><template id="tpc_ivf_semenanalysisreport_Leucocytes"><?= $Page->Leucocytes->caption() ?></template></span></td>
        <td data-name="Leucocytes" <?= $Page->Leucocytes->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Leucocytes"><span id="el_ivf_semenanalysisreport_Leucocytes">
<span<?= $Page->Leucocytes->viewAttributes() ?>>
<?= $Page->Leucocytes->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Agglutination->Visible) { // Agglutination ?>
    <tr id="r_Agglutination">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Agglutination"><template id="tpc_ivf_semenanalysisreport_Agglutination"><?= $Page->Agglutination->caption() ?></template></span></td>
        <td data-name="Agglutination" <?= $Page->Agglutination->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Agglutination"><span id="el_ivf_semenanalysisreport_Agglutination">
<span<?= $Page->Agglutination->viewAttributes() ?>>
<?= $Page->Agglutination->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Debris->Visible) { // Debris ?>
    <tr id="r_Debris">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Debris"><template id="tpc_ivf_semenanalysisreport_Debris"><?= $Page->Debris->caption() ?></template></span></td>
        <td data-name="Debris" <?= $Page->Debris->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Debris"><span id="el_ivf_semenanalysisreport_Debris">
<span<?= $Page->Debris->viewAttributes() ?>>
<?= $Page->Debris->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Diagnosis->Visible) { // Diagnosis ?>
    <tr id="r_Diagnosis">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Diagnosis"><template id="tpc_ivf_semenanalysisreport_Diagnosis"><?= $Page->Diagnosis->caption() ?></template></span></td>
        <td data-name="Diagnosis" <?= $Page->Diagnosis->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Diagnosis"><span id="el_ivf_semenanalysisreport_Diagnosis">
<span<?= $Page->Diagnosis->viewAttributes() ?>>
<?= $Page->Diagnosis->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Observations->Visible) { // Observations ?>
    <tr id="r_Observations">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Observations"><template id="tpc_ivf_semenanalysisreport_Observations"><?= $Page->Observations->caption() ?></template></span></td>
        <td data-name="Observations" <?= $Page->Observations->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Observations"><span id="el_ivf_semenanalysisreport_Observations">
<span<?= $Page->Observations->viewAttributes() ?>>
<?= $Page->Observations->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Signature->Visible) { // Signature ?>
    <tr id="r_Signature">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Signature"><template id="tpc_ivf_semenanalysisreport_Signature"><?= $Page->Signature->caption() ?></template></span></td>
        <td data-name="Signature" <?= $Page->Signature->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Signature"><span id="el_ivf_semenanalysisreport_Signature">
<span<?= $Page->Signature->viewAttributes() ?>>
<?= $Page->Signature->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SemenOrgin->Visible) { // SemenOrgin ?>
    <tr id="r_SemenOrgin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_SemenOrgin"><template id="tpc_ivf_semenanalysisreport_SemenOrgin"><?= $Page->SemenOrgin->caption() ?></template></span></td>
        <td data-name="SemenOrgin" <?= $Page->SemenOrgin->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_SemenOrgin"><span id="el_ivf_semenanalysisreport_SemenOrgin">
<span<?= $Page->SemenOrgin->viewAttributes() ?>>
<?= $Page->SemenOrgin->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Donor->Visible) { // Donor ?>
    <tr id="r_Donor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Donor"><template id="tpc_ivf_semenanalysisreport_Donor"><?= $Page->Donor->caption() ?></template></span></td>
        <td data-name="Donor" <?= $Page->Donor->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Donor"><span id="el_ivf_semenanalysisreport_Donor">
<span<?= $Page->Donor->viewAttributes() ?>>
<?= $Page->Donor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
    <tr id="r_DonorBloodgroup">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_DonorBloodgroup"><template id="tpc_ivf_semenanalysisreport_DonorBloodgroup"><?= $Page->DonorBloodgroup->caption() ?></template></span></td>
        <td data-name="DonorBloodgroup" <?= $Page->DonorBloodgroup->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_DonorBloodgroup"><span id="el_ivf_semenanalysisreport_DonorBloodgroup">
<span<?= $Page->DonorBloodgroup->viewAttributes() ?>>
<?= $Page->DonorBloodgroup->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
    <tr id="r_Tank">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Tank"><template id="tpc_ivf_semenanalysisreport_Tank"><?= $Page->Tank->caption() ?></template></span></td>
        <td data-name="Tank" <?= $Page->Tank->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Tank"><span id="el_ivf_semenanalysisreport_Tank">
<span<?= $Page->Tank->viewAttributes() ?>>
<?= $Page->Tank->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Location->Visible) { // Location ?>
    <tr id="r_Location">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Location"><template id="tpc_ivf_semenanalysisreport_Location"><?= $Page->Location->caption() ?></template></span></td>
        <td data-name="Location" <?= $Page->Location->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Location"><span id="el_ivf_semenanalysisreport_Location">
<span<?= $Page->Location->viewAttributes() ?>>
<?= $Page->Location->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Volume1->Visible) { // Volume1 ?>
    <tr id="r_Volume1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Volume1"><template id="tpc_ivf_semenanalysisreport_Volume1"><?= $Page->Volume1->caption() ?></template></span></td>
        <td data-name="Volume1" <?= $Page->Volume1->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Volume1"><span id="el_ivf_semenanalysisreport_Volume1">
<span<?= $Page->Volume1->viewAttributes() ?>>
<?= $Page->Volume1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Concentration1->Visible) { // Concentration1 ?>
    <tr id="r_Concentration1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Concentration1"><template id="tpc_ivf_semenanalysisreport_Concentration1"><?= $Page->Concentration1->caption() ?></template></span></td>
        <td data-name="Concentration1" <?= $Page->Concentration1->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Concentration1"><span id="el_ivf_semenanalysisreport_Concentration1">
<span<?= $Page->Concentration1->viewAttributes() ?>>
<?= $Page->Concentration1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Total1->Visible) { // Total1 ?>
    <tr id="r_Total1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Total1"><template id="tpc_ivf_semenanalysisreport_Total1"><?= $Page->Total1->caption() ?></template></span></td>
        <td data-name="Total1" <?= $Page->Total1->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Total1"><span id="el_ivf_semenanalysisreport_Total1">
<span<?= $Page->Total1->viewAttributes() ?>>
<?= $Page->Total1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
    <tr id="r_ProgressiveMotility1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_ProgressiveMotility1"><template id="tpc_ivf_semenanalysisreport_ProgressiveMotility1"><?= $Page->ProgressiveMotility1->caption() ?></template></span></td>
        <td data-name="ProgressiveMotility1" <?= $Page->ProgressiveMotility1->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_ProgressiveMotility1"><span id="el_ivf_semenanalysisreport_ProgressiveMotility1">
<span<?= $Page->ProgressiveMotility1->viewAttributes() ?>>
<?= $Page->ProgressiveMotility1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
    <tr id="r_NonProgrssiveMotile1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_NonProgrssiveMotile1"><template id="tpc_ivf_semenanalysisreport_NonProgrssiveMotile1"><?= $Page->NonProgrssiveMotile1->caption() ?></template></span></td>
        <td data-name="NonProgrssiveMotile1" <?= $Page->NonProgrssiveMotile1->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_NonProgrssiveMotile1"><span id="el_ivf_semenanalysisreport_NonProgrssiveMotile1">
<span<?= $Page->NonProgrssiveMotile1->viewAttributes() ?>>
<?= $Page->NonProgrssiveMotile1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Immotile1->Visible) { // Immotile1 ?>
    <tr id="r_Immotile1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Immotile1"><template id="tpc_ivf_semenanalysisreport_Immotile1"><?= $Page->Immotile1->caption() ?></template></span></td>
        <td data-name="Immotile1" <?= $Page->Immotile1->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Immotile1"><span id="el_ivf_semenanalysisreport_Immotile1">
<span<?= $Page->Immotile1->viewAttributes() ?>>
<?= $Page->Immotile1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
    <tr id="r_TotalProgrssiveMotile1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile1"><template id="tpc_ivf_semenanalysisreport_TotalProgrssiveMotile1"><?= $Page->TotalProgrssiveMotile1->caption() ?></template></span></td>
        <td data-name="TotalProgrssiveMotile1" <?= $Page->TotalProgrssiveMotile1->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_TotalProgrssiveMotile1"><span id="el_ivf_semenanalysisreport_TotalProgrssiveMotile1">
<span<?= $Page->TotalProgrssiveMotile1->viewAttributes() ?>>
<?= $Page->TotalProgrssiveMotile1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TidNo"><template id="tpc_ivf_semenanalysisreport_TidNo"><?= $Page->TidNo->caption() ?></template></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_TidNo"><span id="el_ivf_semenanalysisreport_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Color->Visible) { // Color ?>
    <tr id="r_Color">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Color"><template id="tpc_ivf_semenanalysisreport_Color"><?= $Page->Color->caption() ?></template></span></td>
        <td data-name="Color" <?= $Page->Color->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Color"><span id="el_ivf_semenanalysisreport_Color">
<span<?= $Page->Color->viewAttributes() ?>>
<?= $Page->Color->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DoneBy->Visible) { // DoneBy ?>
    <tr id="r_DoneBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_DoneBy"><template id="tpc_ivf_semenanalysisreport_DoneBy"><?= $Page->DoneBy->caption() ?></template></span></td>
        <td data-name="DoneBy" <?= $Page->DoneBy->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_DoneBy"><span id="el_ivf_semenanalysisreport_DoneBy">
<span<?= $Page->DoneBy->viewAttributes() ?>>
<?= $Page->DoneBy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <tr id="r_Method">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Method"><template id="tpc_ivf_semenanalysisreport_Method"><?= $Page->Method->caption() ?></template></span></td>
        <td data-name="Method" <?= $Page->Method->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Method"><span id="el_ivf_semenanalysisreport_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Abstinence->Visible) { // Abstinence ?>
    <tr id="r_Abstinence">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Abstinence"><template id="tpc_ivf_semenanalysisreport_Abstinence"><?= $Page->Abstinence->caption() ?></template></span></td>
        <td data-name="Abstinence" <?= $Page->Abstinence->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Abstinence"><span id="el_ivf_semenanalysisreport_Abstinence">
<span<?= $Page->Abstinence->viewAttributes() ?>>
<?= $Page->Abstinence->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProcessedBy->Visible) { // ProcessedBy ?>
    <tr id="r_ProcessedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_ProcessedBy"><template id="tpc_ivf_semenanalysisreport_ProcessedBy"><?= $Page->ProcessedBy->caption() ?></template></span></td>
        <td data-name="ProcessedBy" <?= $Page->ProcessedBy->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_ProcessedBy"><span id="el_ivf_semenanalysisreport_ProcessedBy">
<span<?= $Page->ProcessedBy->viewAttributes() ?>>
<?= $Page->ProcessedBy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->InseminationTime->Visible) { // InseminationTime ?>
    <tr id="r_InseminationTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_InseminationTime"><template id="tpc_ivf_semenanalysisreport_InseminationTime"><?= $Page->InseminationTime->caption() ?></template></span></td>
        <td data-name="InseminationTime" <?= $Page->InseminationTime->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_InseminationTime"><span id="el_ivf_semenanalysisreport_InseminationTime">
<span<?= $Page->InseminationTime->viewAttributes() ?>>
<?= $Page->InseminationTime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->InseminationBy->Visible) { // InseminationBy ?>
    <tr id="r_InseminationBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_InseminationBy"><template id="tpc_ivf_semenanalysisreport_InseminationBy"><?= $Page->InseminationBy->caption() ?></template></span></td>
        <td data-name="InseminationBy" <?= $Page->InseminationBy->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_InseminationBy"><span id="el_ivf_semenanalysisreport_InseminationBy">
<span<?= $Page->InseminationBy->viewAttributes() ?>>
<?= $Page->InseminationBy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Big->Visible) { // Big ?>
    <tr id="r_Big">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Big"><template id="tpc_ivf_semenanalysisreport_Big"><?= $Page->Big->caption() ?></template></span></td>
        <td data-name="Big" <?= $Page->Big->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Big"><span id="el_ivf_semenanalysisreport_Big">
<span<?= $Page->Big->viewAttributes() ?>>
<?= $Page->Big->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Medium->Visible) { // Medium ?>
    <tr id="r_Medium">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Medium"><template id="tpc_ivf_semenanalysisreport_Medium"><?= $Page->Medium->caption() ?></template></span></td>
        <td data-name="Medium" <?= $Page->Medium->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Medium"><span id="el_ivf_semenanalysisreport_Medium">
<span<?= $Page->Medium->viewAttributes() ?>>
<?= $Page->Medium->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Small->Visible) { // Small ?>
    <tr id="r_Small">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Small"><template id="tpc_ivf_semenanalysisreport_Small"><?= $Page->Small->caption() ?></template></span></td>
        <td data-name="Small" <?= $Page->Small->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Small"><span id="el_ivf_semenanalysisreport_Small">
<span<?= $Page->Small->viewAttributes() ?>>
<?= $Page->Small->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoHalo->Visible) { // NoHalo ?>
    <tr id="r_NoHalo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_NoHalo"><template id="tpc_ivf_semenanalysisreport_NoHalo"><?= $Page->NoHalo->caption() ?></template></span></td>
        <td data-name="NoHalo" <?= $Page->NoHalo->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_NoHalo"><span id="el_ivf_semenanalysisreport_NoHalo">
<span<?= $Page->NoHalo->viewAttributes() ?>>
<?= $Page->NoHalo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Fragmented->Visible) { // Fragmented ?>
    <tr id="r_Fragmented">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Fragmented"><template id="tpc_ivf_semenanalysisreport_Fragmented"><?= $Page->Fragmented->caption() ?></template></span></td>
        <td data-name="Fragmented" <?= $Page->Fragmented->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Fragmented"><span id="el_ivf_semenanalysisreport_Fragmented">
<span<?= $Page->Fragmented->viewAttributes() ?>>
<?= $Page->Fragmented->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NonFragmented->Visible) { // NonFragmented ?>
    <tr id="r_NonFragmented">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_NonFragmented"><template id="tpc_ivf_semenanalysisreport_NonFragmented"><?= $Page->NonFragmented->caption() ?></template></span></td>
        <td data-name="NonFragmented" <?= $Page->NonFragmented->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_NonFragmented"><span id="el_ivf_semenanalysisreport_NonFragmented">
<span<?= $Page->NonFragmented->viewAttributes() ?>>
<?= $Page->NonFragmented->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DFI->Visible) { // DFI ?>
    <tr id="r_DFI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_DFI"><template id="tpc_ivf_semenanalysisreport_DFI"><?= $Page->DFI->caption() ?></template></span></td>
        <td data-name="DFI" <?= $Page->DFI->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_DFI"><span id="el_ivf_semenanalysisreport_DFI">
<span<?= $Page->DFI->viewAttributes() ?>>
<?= $Page->DFI->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IsueBy->Visible) { // IsueBy ?>
    <tr id="r_IsueBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_IsueBy"><template id="tpc_ivf_semenanalysisreport_IsueBy"><?= $Page->IsueBy->caption() ?></template></span></td>
        <td data-name="IsueBy" <?= $Page->IsueBy->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_IsueBy"><span id="el_ivf_semenanalysisreport_IsueBy">
<span<?= $Page->IsueBy->viewAttributes() ?>>
<?= $Page->IsueBy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Volume2->Visible) { // Volume2 ?>
    <tr id="r_Volume2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Volume2"><template id="tpc_ivf_semenanalysisreport_Volume2"><?= $Page->Volume2->caption() ?></template></span></td>
        <td data-name="Volume2" <?= $Page->Volume2->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Volume2"><span id="el_ivf_semenanalysisreport_Volume2">
<span<?= $Page->Volume2->viewAttributes() ?>>
<?= $Page->Volume2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Concentration2->Visible) { // Concentration2 ?>
    <tr id="r_Concentration2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Concentration2"><template id="tpc_ivf_semenanalysisreport_Concentration2"><?= $Page->Concentration2->caption() ?></template></span></td>
        <td data-name="Concentration2" <?= $Page->Concentration2->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Concentration2"><span id="el_ivf_semenanalysisreport_Concentration2">
<span<?= $Page->Concentration2->viewAttributes() ?>>
<?= $Page->Concentration2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Total2->Visible) { // Total2 ?>
    <tr id="r_Total2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Total2"><template id="tpc_ivf_semenanalysisreport_Total2"><?= $Page->Total2->caption() ?></template></span></td>
        <td data-name="Total2" <?= $Page->Total2->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Total2"><span id="el_ivf_semenanalysisreport_Total2">
<span<?= $Page->Total2->viewAttributes() ?>>
<?= $Page->Total2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
    <tr id="r_ProgressiveMotility2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_ProgressiveMotility2"><template id="tpc_ivf_semenanalysisreport_ProgressiveMotility2"><?= $Page->ProgressiveMotility2->caption() ?></template></span></td>
        <td data-name="ProgressiveMotility2" <?= $Page->ProgressiveMotility2->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_ProgressiveMotility2"><span id="el_ivf_semenanalysisreport_ProgressiveMotility2">
<span<?= $Page->ProgressiveMotility2->viewAttributes() ?>>
<?= $Page->ProgressiveMotility2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
    <tr id="r_NonProgrssiveMotile2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_NonProgrssiveMotile2"><template id="tpc_ivf_semenanalysisreport_NonProgrssiveMotile2"><?= $Page->NonProgrssiveMotile2->caption() ?></template></span></td>
        <td data-name="NonProgrssiveMotile2" <?= $Page->NonProgrssiveMotile2->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_NonProgrssiveMotile2"><span id="el_ivf_semenanalysisreport_NonProgrssiveMotile2">
<span<?= $Page->NonProgrssiveMotile2->viewAttributes() ?>>
<?= $Page->NonProgrssiveMotile2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Immotile2->Visible) { // Immotile2 ?>
    <tr id="r_Immotile2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_Immotile2"><template id="tpc_ivf_semenanalysisreport_Immotile2"><?= $Page->Immotile2->caption() ?></template></span></td>
        <td data-name="Immotile2" <?= $Page->Immotile2->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_Immotile2"><span id="el_ivf_semenanalysisreport_Immotile2">
<span<?= $Page->Immotile2->viewAttributes() ?>>
<?= $Page->Immotile2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
    <tr id="r_TotalProgrssiveMotile2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TotalProgrssiveMotile2"><template id="tpc_ivf_semenanalysisreport_TotalProgrssiveMotile2"><?= $Page->TotalProgrssiveMotile2->caption() ?></template></span></td>
        <td data-name="TotalProgrssiveMotile2" <?= $Page->TotalProgrssiveMotile2->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_TotalProgrssiveMotile2"><span id="el_ivf_semenanalysisreport_TotalProgrssiveMotile2">
<span<?= $Page->TotalProgrssiveMotile2->viewAttributes() ?>>
<?= $Page->TotalProgrssiveMotile2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MACS->Visible) { // MACS ?>
    <tr id="r_MACS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_MACS"><template id="tpc_ivf_semenanalysisreport_MACS"><?= $Page->MACS->caption() ?></template></span></td>
        <td data-name="MACS" <?= $Page->MACS->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_MACS"><span id="el_ivf_semenanalysisreport_MACS">
<span<?= $Page->MACS->viewAttributes() ?>>
<?= $Page->MACS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IssuedBy->Visible) { // IssuedBy ?>
    <tr id="r_IssuedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_IssuedBy"><template id="tpc_ivf_semenanalysisreport_IssuedBy"><?= $Page->IssuedBy->caption() ?></template></span></td>
        <td data-name="IssuedBy" <?= $Page->IssuedBy->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_IssuedBy"><span id="el_ivf_semenanalysisreport_IssuedBy">
<span<?= $Page->IssuedBy->viewAttributes() ?>>
<?= $Page->IssuedBy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IssuedTo->Visible) { // IssuedTo ?>
    <tr id="r_IssuedTo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_IssuedTo"><template id="tpc_ivf_semenanalysisreport_IssuedTo"><?= $Page->IssuedTo->caption() ?></template></span></td>
        <td data-name="IssuedTo" <?= $Page->IssuedTo->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_IssuedTo"><span id="el_ivf_semenanalysisreport_IssuedTo">
<span<?= $Page->IssuedTo->viewAttributes() ?>>
<?= $Page->IssuedTo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaID->Visible) { // PaID ?>
    <tr id="r_PaID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PaID"><template id="tpc_ivf_semenanalysisreport_PaID"><?= $Page->PaID->caption() ?></template></span></td>
        <td data-name="PaID" <?= $Page->PaID->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_PaID"><span id="el_ivf_semenanalysisreport_PaID">
<span<?= $Page->PaID->viewAttributes() ?>>
<?= $Page->PaID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaName->Visible) { // PaName ?>
    <tr id="r_PaName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PaName"><template id="tpc_ivf_semenanalysisreport_PaName"><?= $Page->PaName->caption() ?></template></span></td>
        <td data-name="PaName" <?= $Page->PaName->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_PaName"><span id="el_ivf_semenanalysisreport_PaName">
<span<?= $Page->PaName->viewAttributes() ?>>
<?= $Page->PaName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaMobile->Visible) { // PaMobile ?>
    <tr id="r_PaMobile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PaMobile"><template id="tpc_ivf_semenanalysisreport_PaMobile"><?= $Page->PaMobile->caption() ?></template></span></td>
        <td data-name="PaMobile" <?= $Page->PaMobile->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_PaMobile"><span id="el_ivf_semenanalysisreport_PaMobile">
<span<?= $Page->PaMobile->viewAttributes() ?>>
<?= $Page->PaMobile->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <tr id="r_PartnerID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PartnerID"><template id="tpc_ivf_semenanalysisreport_PartnerID"><?= $Page->PartnerID->caption() ?></template></span></td>
        <td data-name="PartnerID" <?= $Page->PartnerID->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_PartnerID"><span id="el_ivf_semenanalysisreport_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <tr id="r_PartnerName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PartnerName"><template id="tpc_ivf_semenanalysisreport_PartnerName"><?= $Page->PartnerName->caption() ?></template></span></td>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_PartnerName"><span id="el_ivf_semenanalysisreport_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
    <tr id="r_PartnerMobile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PartnerMobile"><template id="tpc_ivf_semenanalysisreport_PartnerMobile"><?= $Page->PartnerMobile->caption() ?></template></span></td>
        <td data-name="PartnerMobile" <?= $Page->PartnerMobile->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_PartnerMobile"><span id="el_ivf_semenanalysisreport_PartnerMobile">
<span<?= $Page->PartnerMobile->viewAttributes() ?>>
<?= $Page->PartnerMobile->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
    <tr id="r_PREG_TEST_DATE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_PREG_TEST_DATE"><template id="tpc_ivf_semenanalysisreport_PREG_TEST_DATE"><?= $Page->PREG_TEST_DATE->caption() ?></template></span></td>
        <td data-name="PREG_TEST_DATE" <?= $Page->PREG_TEST_DATE->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_PREG_TEST_DATE"><span id="el_ivf_semenanalysisreport_PREG_TEST_DATE">
<span<?= $Page->PREG_TEST_DATE->viewAttributes() ?>>
<?= $Page->PREG_TEST_DATE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
    <tr id="r_SPECIFIC_PROBLEMS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_SPECIFIC_PROBLEMS"><template id="tpc_ivf_semenanalysisreport_SPECIFIC_PROBLEMS"><?= $Page->SPECIFIC_PROBLEMS->caption() ?></template></span></td>
        <td data-name="SPECIFIC_PROBLEMS" <?= $Page->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_SPECIFIC_PROBLEMS"><span id="el_ivf_semenanalysisreport_SPECIFIC_PROBLEMS">
<span<?= $Page->SPECIFIC_PROBLEMS->viewAttributes() ?>>
<?= $Page->SPECIFIC_PROBLEMS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IMSC_1->Visible) { // IMSC_1 ?>
    <tr id="r_IMSC_1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_IMSC_1"><template id="tpc_ivf_semenanalysisreport_IMSC_1"><?= $Page->IMSC_1->caption() ?></template></span></td>
        <td data-name="IMSC_1" <?= $Page->IMSC_1->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_IMSC_1"><span id="el_ivf_semenanalysisreport_IMSC_1">
<span<?= $Page->IMSC_1->viewAttributes() ?>>
<?= $Page->IMSC_1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IMSC_2->Visible) { // IMSC_2 ?>
    <tr id="r_IMSC_2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_IMSC_2"><template id="tpc_ivf_semenanalysisreport_IMSC_2"><?= $Page->IMSC_2->caption() ?></template></span></td>
        <td data-name="IMSC_2" <?= $Page->IMSC_2->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_IMSC_2"><span id="el_ivf_semenanalysisreport_IMSC_2">
<span<?= $Page->IMSC_2->viewAttributes() ?>>
<?= $Page->IMSC_2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
    <tr id="r_LIQUIFACTION_STORAGE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_LIQUIFACTION_STORAGE"><template id="tpc_ivf_semenanalysisreport_LIQUIFACTION_STORAGE"><?= $Page->LIQUIFACTION_STORAGE->caption() ?></template></span></td>
        <td data-name="LIQUIFACTION_STORAGE" <?= $Page->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_LIQUIFACTION_STORAGE"><span id="el_ivf_semenanalysisreport_LIQUIFACTION_STORAGE">
<span<?= $Page->LIQUIFACTION_STORAGE->viewAttributes() ?>>
<?= $Page->LIQUIFACTION_STORAGE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
    <tr id="r_IUI_PREP_METHOD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_IUI_PREP_METHOD"><template id="tpc_ivf_semenanalysisreport_IUI_PREP_METHOD"><?= $Page->IUI_PREP_METHOD->caption() ?></template></span></td>
        <td data-name="IUI_PREP_METHOD" <?= $Page->IUI_PREP_METHOD->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_IUI_PREP_METHOD"><span id="el_ivf_semenanalysisreport_IUI_PREP_METHOD">
<span<?= $Page->IUI_PREP_METHOD->viewAttributes() ?>>
<?= $Page->IUI_PREP_METHOD->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
    <tr id="r_TIME_FROM_TRIGGER">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TIME_FROM_TRIGGER"><template id="tpc_ivf_semenanalysisreport_TIME_FROM_TRIGGER"><?= $Page->TIME_FROM_TRIGGER->caption() ?></template></span></td>
        <td data-name="TIME_FROM_TRIGGER" <?= $Page->TIME_FROM_TRIGGER->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_TIME_FROM_TRIGGER"><span id="el_ivf_semenanalysisreport_TIME_FROM_TRIGGER">
<span<?= $Page->TIME_FROM_TRIGGER->viewAttributes() ?>>
<?= $Page->TIME_FROM_TRIGGER->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
    <tr id="r_COLLECTION_TO_PREPARATION">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION"><template id="tpc_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION"><?= $Page->COLLECTION_TO_PREPARATION->caption() ?></template></span></td>
        <td data-name="COLLECTION_TO_PREPARATION" <?= $Page->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION"><span id="el_ivf_semenanalysisreport_COLLECTION_TO_PREPARATION">
<span<?= $Page->COLLECTION_TO_PREPARATION->viewAttributes() ?>>
<?= $Page->COLLECTION_TO_PREPARATION->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
    <tr id="r_TIME_FROM_PREP_TO_INSEM">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM"><template id="tpc_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM"><?= $Page->TIME_FROM_PREP_TO_INSEM->caption() ?></template></span></td>
        <td data-name="TIME_FROM_PREP_TO_INSEM" <?= $Page->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<template id="tpx_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM"><span id="el_ivf_semenanalysisreport_TIME_FROM_PREP_TO_INSEM">
<span<?= $Page->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>>
<?= $Page->TIME_FROM_PREP_TO_INSEM->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_ivf_semenanalysisreportview" class="ew-custom-template"></div>
<template id="tpm_ivf_semenanalysisreportview">
<div id="ct_IvfSemenanalysisreportView"><style>
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
.card-body {
	flex: 1 1 auto;
	padding: 0.25rem;
}
.ew-row {
	margin-bottom: 0.25rem;
}
.card {
	box-shadow: 0 0 1px rgba(0,0,0,0.125), 0 1px 3px rgba(0,0,0,0.2);
}
.border-right {
	border-right: 1px solid #ffc107 !important;
}
.mb-3, .small-box, .card, .info-box, .callout, .my-3 {
	margin-bottom: 0.1rem !important;
}
hr {
	margin-top: 0.1rem;
	margin-bottom: 0.21rem;
	border-right-style: initial;
	border-bottom-style: initial;
	border-left-style: initial;
	border-right-color: initial;
	border-bottom-color: initial;
	border-left-color: initial;
	border-width: 4px 0px 0px;
	border-image: initial;
	border-top: 2px solid rgba(0, 0, 0, 1);
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
			  	<div class="row">
<div class="col-sm-6 border-right">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
</div>
<div class="col-sm-6 border-right">
<?php
if($results[0]["CoupleID"] != '')
{
	echo '<font size="4" style="font-weight: bold;">Couple ID : </font>'. $results[0]["CoupleID"] ;
}
$aa = "ewbarcode.php?data=".$Page->id->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
?>
</div>
</div>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
	<div class="row">
<div class="col-sm-6 border-right">
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
</div>
<div class="col-sm-6 border-right">
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
</div>
</div>
			  </div>
			  <div class="widget-user-image">
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-12 border-left">
					<div class="description-block">
					  <h5 class="description-header text-left"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
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
	<div class="row">
<div class="col-sm-6 border-right">
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
</div>
<div class="col-sm-6 border-right">
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
</div>
</div>
			  </div>
			  <div class="widget-user-image">
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-12 border-right">
					<div class="description-block">
					  <h5 class="description-header text-left"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
 <div style="width:100%">
<font face = "courier" >
<font size="4" style="font-weight: bold;">
<div class="ew-row">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style='width:50%;'>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style="width:35%">  Semen Orgin</td>
			<td>:</td>
			<td><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_SemenOrgin"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_SemenOrgin"></slot> </td>
		</tr>
		<tr id="donorId">
			<td  style="width:35%">Donor</td>
			<td>:</td>
			<td><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Donor"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Donor"></slot></td>
		</tr>
		<tr id="DonorBloodGroupId">
			<td  style="width:35%">Donor Bloodgroup</td>
			<td>:</td>
			<td><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_DonorBloodgroup"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_DonorBloodgroup"></slot></td>
		</tr>
	</tbody>
</table>
			</td>
			<td>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td  style="width:35%">Request Dr</td>
			<td>:</td>
			<td>{{: RequestDr }}</td>
		</tr>
	<tr>
			<td  style="width:35%">Collection Date</td>
			<td>:</td>
			<td><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_CollectionDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_CollectionDate"></slot></td>
		</tr>
		<tr>
			<td  style="width:35%">Result Date</td>
			<td>:</td>
			<td><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_ResultDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_ResultDate"></slot></td>
		</tr>
	</tbody>
</table>
			</td>
		</tr>
	</tbody>
</table>
</div>
<table class="ew-table"  style="width:100%">
	 <tbody>
		<tr>
			<td style="width:15%"></td>
			<td  style="width:70%"><h2 id="SemenHeading" align="center">Semen Analysis</h2></td>
			<td  style="width:15%;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td>
		</tr>
	</tbody>
</table>
<hr>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-body">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style="width:40%">Request</td>
			<td>:</td>
			<td id="el_view_semenanalysis_RequestSample"><?php echo $Page->RequestSample->CurrentValue ?></td>
		</tr>
		<tr>
			<td style="width:40%">Collection Type</td>
			<td>:</td>
			<td>{{: CollectionType }}</td>
		</tr>
		<tr>
			<td style="width:40%">Collection Method</td>
			<td>:</td>
			<td>{{: CollectionMethod }}</td>
		</tr>
	</tbody>	
</table>							   
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-body">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style="width:40%">Abstinence</td>
			<td style="width:5%">:</td>
			<td>{{: Abstinence }}</td>
		</tr>
		<tr>
			<td style="width:40%">Medication</td>
			<td style="width:5%">:</td>
			<td>{{: Medicationused }}</td>
		</tr>
		<tr>
			<td style="width:40%">Collection Difficulty</td>
			<td style="width:5%">:</td>
			<td>{{: DifficultiesinCollection }}</td>
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
				<h3 class="card-title">Macroscopic Analysis</h3>
			</div>
			<div class="card-body">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:50%">
	<tbody>
		<tr>
		<td style="width:40%">p H</td>
		<td>:</td>
			<td>{{: pH }}>=7.2</td>
			<td></td>
		</tr>
		<tr>
		<td style="width:40%">Time of Collection</td>
		<td>:</td>
			<td>{{: Timeofcollection }}</td>
			<td></td>
		</tr>
		<tr>
		<td style="width:40%">Time of Examination</td>
		<td>:</td>
			<td>{{: Timeofexamination }}</td>
			<td></td>
		</tr>
	</tbody>
</table>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:50%">
	<tbody>
		<tr>
		<td style="width:40%">Appearance</td>
		<td>:</td>
			<td >{{: Appearance }}</td>
			<td ></td>
		</tr>
		<tr>
		<td style="width:40%">Color</td>
		<td>:</td>
			<td >{{: Color }}</td>
			<td ></td>
		</tr>
		<tr>
		<td style="width:40%">Homogenosity</td>
		<td>:</td>
			<td >{{: Homogenosity }}</td>
			<td ></td>
		</tr>
		<tr>
		<td style="width:40%">Complete Sample</td>
		<td>:</td>
			<td >{{: CompleteSample }}</td>
			<td ></td>
		</tr>
		<tr>
		<td style="width:40%">Liquefaction Time</td>
		<td>:</td>
			<td >{{: Liquefactiontime }}</td>
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
	<slot class="ew-slot" name="tpc_ivf_semenanalysisreport_MACS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_MACS"></slot>
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
			<td><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Volume"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Volume"></slot></td>
			<td id="Volume1"><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Volume1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Volume1"></slot></td>
			<td id="Volume2"><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Volume2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Volume2"></slot></td>
			<td>>=1.5ml</td>
		</tr>
		<tr>
			<td>Concentration (mill/ml)</td>
			<td>:</td>
			<td><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Concentration"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Concentration"></slot></td>
			<td  id="Concentration1"><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Concentration1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Concentration1"></slot></td>
			<td  id="Concentration2"><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Concentration2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Concentration2"></slot></td>
			<td>>= 15</td>
		</tr>
		<tr>
			<td>Total (mill/ejaculate)</td>
				<td>:</td>
			<td><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Total"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Total"></slot></td>
			<td  id="Total1"><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Total1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Total1"></slot></td>
			<td  id="Total2"><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Total2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Total2"></slot></td>
			<td>>=39</td>
		</tr>
		<tr>
			<td>Progressive Motility (%)</td>
			<td>:</td>
			<td><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_ProgressiveMotility"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_ProgressiveMotility"></slot></td>
			<td  id="ProgressiveMotility1"><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_ProgressiveMotility1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_ProgressiveMotility1"></slot></td>
			<td  id="ProgressiveMotility2"><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_ProgressiveMotility2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_ProgressiveMotility2"></slot></td>
			<td>>=32%</td>
		</tr>
		<tr>
			<td>Non Progrssive Motile (%)</td>
			<td>:</td>
			<td><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_NonProgrssiveMotile"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_NonProgrssiveMotile"></slot></td>
			<td  id="NonProgrssiveMotile1"><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_NonProgrssiveMotile1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_NonProgrssiveMotile1"></slot></td>
			<td  id="NonProgrssiveMotile2"><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_NonProgrssiveMotile2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_NonProgrssiveMotile2"></slot></td>
			<td></td>
		</tr>
		<tr>
			<td>Immotile (%)</td>
			<td>:</td>
			<td><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Immotile"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Immotile"></slot></td>
			<td  id="Immotile1"><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Immotile1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Immotile1"></slot></td>
			<td  id="Immotile2"><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Immotile2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Immotile2"></slot></td>
			<td></td>
		</tr>
		<tr>
			<td>Total Motility (%)</td>
				<td>:</td>
			<td><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_TotalProgrssiveMotile"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_TotalProgrssiveMotile"></slot></td>
			<td  id="TotalProgrssiveMotile1"><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_TotalProgrssiveMotile1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_TotalProgrssiveMotile1"></slot></td>
			<td  id="TotalProgrssiveMotile2"><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_TotalProgrssiveMotile2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_TotalProgrssiveMotile2"></slot></td>
			<td>>=40% PR+NP</td>
		</tr>
	</tbody>
</table>
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:40%">
	<tbody>
		<tr>
			<td >Normal</td>		
			<td >:<slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Normal"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Normal"></slot>%</td>
			<td >>=4%</td>
		</tr>
		<tr>
			<td >Abnormal</td>
			<td >:<slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Abnormal"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Abnormal"></slot>%</td>
			<td ></td>
		</tr>	
		<tr>
			<td >Head Defects</td>
			<td >:<slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Headdefects"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Headdefects"></slot>%</td>
			<td ></td>
		</tr>
		<tr>
			<td >Midpiece Defects</td>
			<td >:<slot class="ew-slot" name="tpc_ivf_semenanalysisreport_MidpieceDefects"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_MidpieceDefects"></slot>%</td>
			<td></td>
		</tr>
		<tr>
			<td >Tail Defects</td>
			<td >:<slot class="ew-slot" name="tpc_ivf_semenanalysisreport_TailDefects"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_TailDefects"></slot>%</td>
			<td ></td>
		</tr>
		<tr>
			<td >Vitality(%)</td>
			<td >:<slot class="ew-slot" name="tpc_ivf_semenanalysisreport_NormalProgMotile"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_NormalProgMotile"></slot></td>
			<td>>=58%</td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="ew-row">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
	<tr>
			<td id="Method" style="font-size:120%;width:25%" ><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Method"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Method"></slot></td>
			<td ></td>
			<td ></td>
			<td style="width:10%">Agglutination</td>
			<td style="width:2%">:</td>
			<td >{{: Agglutination }}</td>
		</tr>
		<tr>
			<td style="width:25%"><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_ImmatureForms"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_ImmatureForms"></slot></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
		</tr>
		<tr>
			<td style="width:25%"><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Leucocytes"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Leucocytes"></slot></td>
			<td style="width:35%">%   <1 mill/ml or 20/field </td>
			<td ></td>
			<td >Debris</td>
			<td style="width:2%">:</td>
			<td >{{: Debris }}</td>
		</tr>
	</tbody>
</table>
</div>
	<br />
<div style="font-size:120%" class="ew-row">
<slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Diagnosis"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Diagnosis"></slot>
</div>
	<br />
<div class="ew-row">
<slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Observations"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Observations"></slot>
</div>
<?php
$tt = "ewbarcode.php?data=".$Page->PaID->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
?>
<div class="ew-row">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td id='Big' ><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Big"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Big"></slot></td>
			<td id='Medium' ><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Medium"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Medium"></slot></td>
			<td id='Small'><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Small"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Small"></slot></td>
			<td id='NoHalo'><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_NoHalo"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_NoHalo"></slot></td>
		</tr>
		<tr>
			<td id='Fragmented'><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Fragmented"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Fragmented"></slot></td>
			<td id='NonFragmented'><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_NonFragmented"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_NonFragmented"></slot></td>
			<td id='DFI'><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_DFI"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_DFI"></slot></td>
		</tr>
		<tr>		
		<tr>
			<td id='InseminationTime'></td>
			<td ></td>
			<td ></td>
			<td id='InseminationBy'></td>
		</tr>
		<tr>
			<td style="width:10%;"><img src='<?php echo $tt; ?>' alt style="border: 0;"></td>
			<td id='IsueBy'><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_IsueBy"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_IsueBy"></slot></td>
			<td ></td>
			<td >Andrologist Signature</td>
		</tr>	
	</tbody>
</table>
</div>
<div class="row" id="TankLocation">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td ><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Tank"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Tank"></slot></td>
			<td ><slot class="ew-slot" name="tpc_ivf_semenanalysisreport_Location"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_semenanalysisreport_Location"></slot></td>
		</tr>
	</tbody>
</table>
</div>
<div  style="font-size:100%">* Percentage respect to total number of abnormal spermatozoa </div>
<div style="font-size:80%">New reference values 17-01-2011: pursuant to the information published by WHO in the Human Reproduction Update, Vol.16, No3 pp. 231-245, 2010</div>
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
		 document.getElementById("idMacs").style.visibility = "hidden";
	var e = document.getElementById("x_RequestSample");

//	var RequestSample = e.options[e.selectedIndex].value;
	var TankLocation = document.getElementById("TankLocation");
	var RequestSample = document.getElementById('el_view_semenanalysis_RequestSample').innerText;
	document.getElementById('SemenHeading').innerText = 'Spermiogram';
				if(RequestSample == "Freezing")
				{
					document.getElementById('SemenHeading').innerText = 'Semen Freezing';
					TankLocation.style.visibility = "hidden";
					document.getElementById("idMacs").style.display = "none";
				}else{
					TankLocation.style.visibility = "hidden";
				}
				var capacitationTable = document.getElementById("capacitationTable");
				if(RequestSample == "IUI processing")
				{
				document.getElementById('SemenHeading').innerText = 'INTRA UTERINE INSEMINATION';
					capacitationTable.style.width = "100%";
					 document.getElementById("Volume1").style.visibility = "visible";
					 document.getElementById("Concentration1").style.visibility = "visible";
					 document.getElementById("Total1").style.visibility = "visible";
					 document.getElementById("ProgressiveMotility1").style.visibility = "visible";
					 document.getElementById("NonProgrssiveMotile1").style.visibility = "visible";
					 document.getElementById("Immotile1").style.visibility = "visible";
					 document.getElementById("TotalProgrssiveMotile1").style.visibility = "visible";
					 document.getElementById("capacitationTableHead").style.visibility = "visible";
					 document.getElementById("PreCapacitation").innerText = "Pre Capacitation";
					document.getElementById("PostCapacitation").innerText = "Post Capacitation";
					document.getElementById("Big").style.visibility = "hidden";
					document.getElementById("Medium").style.visibility = "hidden";
					document.getElementById("Small").style.visibility = "hidden";
					document.getElementById("NoHalo").style.visibility = "hidden";
					document.getElementById("Fragmented").style.visibility = "hidden";
					document.getElementById("NonFragmented").style.visibility = "hidden";
					document.getElementById("DFI").style.visibility = "hidden";

					//document.getElementById("x_Volume1").style.width = "80px";
 				//	document.getElementById("x_Concentration1").style.width = "80px";
 				//	document.getElementById("x_Total1").style.width = "80px";
 				//	document.getElementById("x_ProgressiveMotility1").style.width = "80px";
 				//	document.getElementById("x_NonProgrssiveMotile1").style.width = "80px";
 				//	document.getElementById("x_Immotile1").style.width = "80px";
 				//	document.getElementById("x_TotalProgrssiveMotile1").style.width = "80px";
document.getElementById("MaxCapacitation").style.visibility = "hidden";
						 document.getElementById("MaxCapacitation").style.width = "0px";
						var MACS = document.getElementById('el_view_semenanalysis_MACS').innerText;
				if(MACS == "MACS")
				{
				  					 					 document.getElementById("Volume2").style.visibility = "visible";
					 document.getElementById("Concentration2").style.visibility = "visible";
					 document.getElementById("Total2").style.visibility = "visible";
					 document.getElementById("ProgressiveMotility2").style.visibility = "visible";
					 document.getElementById("NonProgrssiveMotile2").style.visibility = "visible";
					 document.getElementById("Immotile2").style.visibility = "visible";
					 document.getElementById("TotalProgrssiveMotile2").style.visibility = "visible";
document.getElementById("MaxCapacitation").style.visibility = "visible";

					//document.getElementById("x_Volume2").style.width = "80px";
 				//	document.getElementById("x_Concentration2").style.width = "80px";
 				//	document.getElementById("x_Total2").style.width = "80px";
 				//	document.getElementById("x_ProgressiveMotility2").style.width = "80px";
 				//	document.getElementById("x_NonProgrssiveMotile2").style.width = "80px";
 				//	document.getElementById("x_Immotile2").style.width = "80px";
 				//	document.getElementById("x_TotalProgrssiveMotile2").style.width = "80px";
				}else{
				//	 document.getElementById("x_Volume2").style.width = "0px";
				//	 document.getElementById("x_Concentration2").style.width = "0px";
				//	 document.getElementById("x_Total2").style.width = "0px";
				//	 document.getElementById("x_ProgressiveMotility2").style.width = "0px";
				//	 document.getElementById("x_NonProgrssiveMotile2").style.width = "0px";
				//	 document.getElementById("x_Immotile2").style.width = "0px";
				//	 document.getElementById("x_TotalProgrssiveMotile2").style.width = "0px";
					 document.getElementById("Volume2").style.visibility = "hidden";
					 document.getElementById("Concentration2").style.visibility = "hidden";
					 document.getElementById("Total2").style.visibility = "hidden";
					 document.getElementById("ProgressiveMotility2").style.visibility = "hidden";
					 document.getElementById("NonProgrssiveMotile2").style.visibility = "hidden";
					 document.getElementById("Immotile2").style.visibility = "hidden";
					 document.getElementById("TotalProgrssiveMotile2").style.visibility = "hidden";
										 document.getElementById("Volume2").style.display = "none";
					document.getElementById("Concentration2").style.display = "none";
					document.getElementById("Total2").style.display = "none";
					document.getElementById("ProgressiveMotility2").style.display = "none";
					document.getElementById("NonProgrssiveMotile2").style.display = "hidnoneden";
					document.getElementById("Immotile2").style.display = "none";
					document.getElementById("TotalProgrssiveMotile2").style.display = "none";
					 document.getElementById("idMacs").style.display = "none";
				}
				}else{
					capacitationTable.style.width = "60%";
					document.getElementById("idMacs").style.display = "none";
					 document.getElementById("Volume1").style.visibility = "hidden";
					 document.getElementById("Concentration1").style.visibility = "hidden";
					 document.getElementById("Total1").style.visibility = "hidden";
					 document.getElementById("ProgressiveMotility1").style.visibility = "hidden";
					 document.getElementById("NonProgrssiveMotile1").style.visibility = "hidden";
					 document.getElementById("Immotile1").style.visibility = "hidden";
					 document.getElementById("TotalProgrssiveMotile1").style.visibility = "hidden";
					 document.getElementById("capacitationTableHead").style.visibility = "hidden";
					 document.getElementById("PreCapacitation").innerText = "";
					 document.getElementById("PostCapacitation").innerText = "";

					 //document.getElementById("x_Volume1").style.width = "0px";
					 //document.getElementById("x_Concentration1").style.width = "0px";
					 //document.getElementById("x_Total1").style.width = "0px";
					 //document.getElementById("x_ProgressiveMotility1").style.width = "0px";
					 //document.getElementById("x_NonProgrssiveMotile1").style.width = "0px";
					 //document.getElementById("x_Immotile1").style.width = "0px";
					 //document.getElementById("x_TotalProgrssiveMotile1").style.width = "0px";
					 //document.getElementById("x_Volume2").style.width = "0px";
					 //document.getElementById("x_Concentration2").style.width = "0px";
					 //document.getElementById("x_Total2").style.width = "0px";
					 //document.getElementById("x_ProgressiveMotility2").style.width = "0px";
					 //document.getElementById("x_NonProgrssiveMotile2").style.width = "0px";
					 //document.getElementById("x_Immotile2").style.width = "0px";
					 //document.getElementById("x_TotalProgrssiveMotile2").style.width = "0px";
					 document.getElementById("Volume2").style.visibility = "hidden";
					 document.getElementById("Concentration2").style.visibility = "hidden";
					 document.getElementById("Total2").style.visibility = "hidden";
					 document.getElementById("ProgressiveMotility2").style.visibility = "hidden";
					 document.getElementById("NonProgrssiveMotile2").style.visibility = "hidden";
					 document.getElementById("Immotile2").style.visibility = "hidden";
					 document.getElementById("TotalProgrssiveMotile2").style.visibility = "hidden";
					 document.getElementById("Big").style.visibility = "hidden";
					 document.getElementById("Medium").style.visibility = "hidden";
					 document.getElementById("Small").style.visibility = "hidden";
					 document.getElementById("NoHalo").style.visibility = "hidden";
					 document.getElementById("Fragmented").style.visibility = "hidden";
					 document.getElementById("NonFragmented").style.visibility = "hidden";
					 document.getElementById("DFI").style.visibility = "hidden";
					 document.getElementById("InseminationTime").style.visibility = "hidden";
					 document.getElementById("InseminationBy").style.visibility = "hidden";
					 document.getElementById("IsueBy").style.visibility = "hidden";
	}
	if (RequestSample == "DFI") {
		document.getElementById('SemenHeading').innerText = 'DNA Framgmentation Index';
		document.getElementById("Big").style.visibility = "visible";
		document.getElementById("Medium").style.visibility = "visible";
		document.getElementById("Small").style.visibility = "visible";
		document.getElementById("NoHalo").style.visibility = "visible";
		document.getElementById("Fragmented").style.visibility = "visible";
		document.getElementById("NonFragmented").style.visibility = "visible";
		document.getElementById("DFI").style.visibility = "visible";
		document.getElementById("idMacs").style.display = "none";
	}
					var e = document.getElementById("x_SemenOrgin");

				//	var SemenOrgin = e.options[e.selectedIndex].value;
				var donorId = document.getElementById("donorId");
	var DonorBloodGroupId = document.getElementById("DonorBloodGroupId");
	var SemenOrgin = document.getElementById("el_view_semenanalysis_SemenOrgin").innerText;
				if(SemenOrgin == "Donor")
				{
					donorId.style.visibility = "hidden";
					DonorBloodGroupId.style.visibility = "visible";
				}else{
					donorId.style.visibility = "hidden";
					DonorBloodGroupId.style.visibility = "hidden";
				}
				if(capacitationTable.style.width == "60%")
				{
					document.getElementById("capacitationTableHead").style.display="none";
				}
	</script>
</div>
</template>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_ivf_semenanalysisreportview", "tpm_ivf_semenanalysisreportview", "ivf_semenanalysisreportview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    // Startup script
    document.getElementById("idMacs").style.visibility="hidden";var e=document.getElementById("x_RequestSample"),TankLocation=document.getElementById("TankLocation"),RequestSample=document.getElementById("el_view_semenanalysis_RequestSample").innerText;document.getElementById("SemenHeading").innerText="Spermiogram","Freezing"==RequestSample?(document.getElementById("idMacs").style.display="none",document.getElementById("SemenHeading").innerText="Semen Freezing",TankLocation.style.visibility="hidden"):TankLocation.style.visibility="hidden";var capacitationTable=document.getElementById("capacitationTable");if("IUI processing"==RequestSample){document.getElementById("SemenHeading").innerText="INTRA UTERINE INSEMINATION",capacitationTable.style.width="100%",document.getElementById("Volume1").style.visibility="visible",document.getElementById("Concentration1").style.visibility="visible",document.getElementById("Total1").style.visibility="visible",document.getElementById("ProgressiveMotility1").style.visibility="visible",document.getElementById("NonProgrssiveMotile1").style.visibility="visible",document.getElementById("Immotile1").style.visibility="visible",document.getElementById("TotalProgrssiveMotile1").style.visibility="visible",document.getElementById("capacitationTableHead").style.visibility="visible",document.getElementById("PreCapacitation").innerText="Pre Capacitation",document.getElementById("PostCapacitation").innerText="Post Capacitation",document.getElementById("Big").style.visibility="hidden",document.getElementById("Medium").style.visibility="hidden",document.getElementById("Small").style.visibility="hidden",document.getElementById("NoHalo").style.visibility="hidden",document.getElementById("Fragmented").style.visibility="hidden",document.getElementById("NonFragmented").style.visibility="hidden",document.getElementById("DFI").style.visibility="hidden",document.getElementById("Fragmented").style.display="none",document.getElementById("NonFragmented").style.display="none",document.getElementById("DFI").style.display="none",document.getElementById("IsueBy").style.visibility="hidden",document.getElementById("MaxCapacitation").style.visibility="hidden",document.getElementById("MaxCapacitation").style.width="0px";var MACS=document.getElementById("el_view_semenanalysis_MACS").innerText;"MACS"==MACS?(document.getElementById("Volume2").style.visibility="visible",document.getElementById("Concentration2").style.visibility="visible",document.getElementById("Total2").style.visibility="visible",document.getElementById("ProgressiveMotility2").style.visibility="visible",document.getElementById("NonProgrssiveMotile2").style.visibility="visible",document.getElementById("Immotile2").style.visibility="visible",document.getElementById("TotalProgrssiveMotile2").style.visibility="visible",document.getElementById("MaxCapacitation").style.visibility="visible"):(document.getElementById("Volume2").style.visibility="hidden",document.getElementById("Concentration2").style.visibility="hidden",document.getElementById("Total2").style.visibility="hidden",document.getElementById("ProgressiveMotility2").style.visibility="hidden",document.getElementById("NonProgrssiveMotile2").style.visibility="hidden",document.getElementById("Immotile2").style.visibility="hidden",document.getElementById("TotalProgrssiveMotile2").style.visibility="hidden",document.getElementById("Volume2").style.display="none",document.getElementById("Concentration2").style.display="none",document.getElementById("Total2").style.display="none",document.getElementById("ProgressiveMotility2").style.display="none",document.getElementById("NonProgrssiveMotile2").style.display="hidnoneden",document.getElementById("Immotile2").style.display="none",document.getElementById("TotalProgrssiveMotile2").style.display="none",document.getElementById("idMacs").style.display="none")}else capacitationTable.style.width="60%",document.getElementById("Volume1").style.visibility="hidden",document.getElementById("Concentration1").style.visibility="hidden",document.getElementById("Total1").style.visibility="hidden",document.getElementById("ProgressiveMotility1").style.visibility="hidden",document.getElementById("NonProgrssiveMotile1").style.visibility="hidden",document.getElementById("Immotile1").style.visibility="hidden",document.getElementById("TotalProgrssiveMotile1").style.visibility="hidden",document.getElementById("capacitationTableHead").style.visibility="hidden",document.getElementById("PreCapacitation").innerText="",document.getElementById("PostCapacitation").innerText="",document.getElementById("Volume2").style.visibility="hidden",document.getElementById("Concentration2").style.visibility="hidden",document.getElementById("Total2").style.visibility="hidden",document.getElementById("ProgressiveMotility2").style.visibility="hidden",document.getElementById("NonProgrssiveMotile2").style.visibility="hidden",document.getElementById("Immotile2").style.visibility="hidden",document.getElementById("TotalProgrssiveMotile2").style.visibility="hidden",document.getElementById("Big").style.visibility="hidden",document.getElementById("Medium").style.visibility="hidden",document.getElementById("Small").style.visibility="hidden",document.getElementById("NoHalo").style.visibility="hidden",document.getElementById("Fragmented").style.visibility="hidden",document.getElementById("NonFragmented").style.visibility="hidden",document.getElementById("DFI").style.visibility="hidden",document.getElementById("InseminationTime").style.visibility="hidden",document.getElementById("InseminationBy").style.visibility="hidden",document.getElementById("IsueBy").style.visibility="hidden",document.getElementById("idMacs").style.display="none";"DFI"==RequestSample&&(document.getElementById("SemenHeading").innerText="DNA Framgmentation Index",document.getElementById("Big").style.visibility="visible",document.getElementById("Medium").style.visibility="visible",document.getElementById("Small").style.visibility="visible",document.getElementById("NoHalo").style.visibility="visible",document.getElementById("Fragmented").style.visibility="visible",document.getElementById("NonFragmented").style.visibility="visible",document.getElementById("DFI").style.visibility="visible",document.getElementById("idMacs").style.display="none");e=document.getElementById("x_SemenOrgin");var donorId=document.getElementById("donorId"),DonorBloodGroupId=document.getElementById("DonorBloodGroupId"),SemenOrgin=document.getElementById("el_view_semenanalysis_SemenOrgin").innerText;"Donor"==SemenOrgin?(donorId.style.visibility="visible",DonorBloodGroupId.style.visibility="visible"):(donorId.style.visibility="hidden",DonorBloodGroupId.style.visibility="hidden");
});
</script>
<?php } ?>

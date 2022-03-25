<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfOocytedenudationView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_oocytedenudationview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_oocytedenudationview = currentForm = new ew.Form("fivf_oocytedenudationview", "view");
    loadjs.done("fivf_oocytedenudationview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.ivf_oocytedenudation) ew.vars.tables.ivf_oocytedenudation = <?= JsonEncode(GetClientVar("tables", "ivf_oocytedenudation")) ?>;
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
<form name="fivf_oocytedenudationview" id="fivf_oocytedenudationview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_oocytedenudation">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_id"><template id="tpc_ivf_oocytedenudation_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_id"><span id="el_ivf_oocytedenudation_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <tr id="r_RIDNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_RIDNo"><template id="tpc_ivf_oocytedenudation_RIDNo"><?= $Page->RIDNo->caption() ?></template></span></td>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_RIDNo"><span id="el_ivf_oocytedenudation_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_Name"><template id="tpc_ivf_oocytedenudation_Name"><?= $Page->Name->caption() ?></template></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_Name"><span id="el_ivf_oocytedenudation_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
    <tr id="r_ResultDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_ResultDate"><template id="tpc_ivf_oocytedenudation_ResultDate"><?= $Page->ResultDate->caption() ?></template></span></td>
        <td data-name="ResultDate" <?= $Page->ResultDate->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_ResultDate"><span id="el_ivf_oocytedenudation_ResultDate">
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
    <tr id="r_Surgeon">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_Surgeon"><template id="tpc_ivf_oocytedenudation_Surgeon"><?= $Page->Surgeon->caption() ?></template></span></td>
        <td data-name="Surgeon" <?= $Page->Surgeon->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_Surgeon"><span id="el_ivf_oocytedenudation_Surgeon">
<span<?= $Page->Surgeon->viewAttributes() ?>>
<?= $Page->Surgeon->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AsstSurgeon->Visible) { // AsstSurgeon ?>
    <tr id="r_AsstSurgeon">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_AsstSurgeon"><template id="tpc_ivf_oocytedenudation_AsstSurgeon"><?= $Page->AsstSurgeon->caption() ?></template></span></td>
        <td data-name="AsstSurgeon" <?= $Page->AsstSurgeon->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_AsstSurgeon"><span id="el_ivf_oocytedenudation_AsstSurgeon">
<span<?= $Page->AsstSurgeon->viewAttributes() ?>>
<?= $Page->AsstSurgeon->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
    <tr id="r_Anaesthetist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_Anaesthetist"><template id="tpc_ivf_oocytedenudation_Anaesthetist"><?= $Page->Anaesthetist->caption() ?></template></span></td>
        <td data-name="Anaesthetist" <?= $Page->Anaesthetist->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_Anaesthetist"><span id="el_ivf_oocytedenudation_Anaesthetist">
<span<?= $Page->Anaesthetist->viewAttributes() ?>>
<?= $Page->Anaesthetist->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AnaestheiaType->Visible) { // AnaestheiaType ?>
    <tr id="r_AnaestheiaType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_AnaestheiaType"><template id="tpc_ivf_oocytedenudation_AnaestheiaType"><?= $Page->AnaestheiaType->caption() ?></template></span></td>
        <td data-name="AnaestheiaType" <?= $Page->AnaestheiaType->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_AnaestheiaType"><span id="el_ivf_oocytedenudation_AnaestheiaType">
<span<?= $Page->AnaestheiaType->viewAttributes() ?>>
<?= $Page->AnaestheiaType->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
    <tr id="r_PrimaryEmbryologist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_PrimaryEmbryologist"><template id="tpc_ivf_oocytedenudation_PrimaryEmbryologist"><?= $Page->PrimaryEmbryologist->caption() ?></template></span></td>
        <td data-name="PrimaryEmbryologist" <?= $Page->PrimaryEmbryologist->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_PrimaryEmbryologist"><span id="el_ivf_oocytedenudation_PrimaryEmbryologist">
<span<?= $Page->PrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->PrimaryEmbryologist->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
    <tr id="r_SecondaryEmbryologist">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_SecondaryEmbryologist"><template id="tpc_ivf_oocytedenudation_SecondaryEmbryologist"><?= $Page->SecondaryEmbryologist->caption() ?></template></span></td>
        <td data-name="SecondaryEmbryologist" <?= $Page->SecondaryEmbryologist->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_SecondaryEmbryologist"><span id="el_ivf_oocytedenudation_SecondaryEmbryologist">
<span<?= $Page->SecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->SecondaryEmbryologist->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OPUNotes->Visible) { // OPUNotes ?>
    <tr id="r_OPUNotes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OPUNotes"><template id="tpc_ivf_oocytedenudation_OPUNotes"><?= $Page->OPUNotes->caption() ?></template></span></td>
        <td data-name="OPUNotes" <?= $Page->OPUNotes->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_OPUNotes"><span id="el_ivf_oocytedenudation_OPUNotes">
<span<?= $Page->OPUNotes->viewAttributes() ?>>
<?= $Page->OPUNotes->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
    <tr id="r_NoOfFolliclesRight">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_NoOfFolliclesRight"><template id="tpc_ivf_oocytedenudation_NoOfFolliclesRight"><?= $Page->NoOfFolliclesRight->caption() ?></template></span></td>
        <td data-name="NoOfFolliclesRight" <?= $Page->NoOfFolliclesRight->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_NoOfFolliclesRight"><span id="el_ivf_oocytedenudation_NoOfFolliclesRight">
<span<?= $Page->NoOfFolliclesRight->viewAttributes() ?>>
<?= $Page->NoOfFolliclesRight->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
    <tr id="r_NoOfFolliclesLeft">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_NoOfFolliclesLeft"><template id="tpc_ivf_oocytedenudation_NoOfFolliclesLeft"><?= $Page->NoOfFolliclesLeft->caption() ?></template></span></td>
        <td data-name="NoOfFolliclesLeft" <?= $Page->NoOfFolliclesLeft->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_NoOfFolliclesLeft"><span id="el_ivf_oocytedenudation_NoOfFolliclesLeft">
<span<?= $Page->NoOfFolliclesLeft->viewAttributes() ?>>
<?= $Page->NoOfFolliclesLeft->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoOfOocytes->Visible) { // NoOfOocytes ?>
    <tr id="r_NoOfOocytes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_NoOfOocytes"><template id="tpc_ivf_oocytedenudation_NoOfOocytes"><?= $Page->NoOfOocytes->caption() ?></template></span></td>
        <td data-name="NoOfOocytes" <?= $Page->NoOfOocytes->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_NoOfOocytes"><span id="el_ivf_oocytedenudation_NoOfOocytes">
<span<?= $Page->NoOfOocytes->viewAttributes() ?>>
<?= $Page->NoOfOocytes->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
    <tr id="r_RecordOocyteDenudation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_RecordOocyteDenudation"><template id="tpc_ivf_oocytedenudation_RecordOocyteDenudation"><?= $Page->RecordOocyteDenudation->caption() ?></template></span></td>
        <td data-name="RecordOocyteDenudation" <?= $Page->RecordOocyteDenudation->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_RecordOocyteDenudation"><span id="el_ivf_oocytedenudation_RecordOocyteDenudation">
<span<?= $Page->RecordOocyteDenudation->viewAttributes() ?>>
<?= $Page->RecordOocyteDenudation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DateOfDenudation->Visible) { // DateOfDenudation ?>
    <tr id="r_DateOfDenudation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_DateOfDenudation"><template id="tpc_ivf_oocytedenudation_DateOfDenudation"><?= $Page->DateOfDenudation->caption() ?></template></span></td>
        <td data-name="DateOfDenudation" <?= $Page->DateOfDenudation->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_DateOfDenudation"><span id="el_ivf_oocytedenudation_DateOfDenudation">
<span<?= $Page->DateOfDenudation->viewAttributes() ?>>
<?= $Page->DateOfDenudation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
    <tr id="r_DenudationDoneBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_DenudationDoneBy"><template id="tpc_ivf_oocytedenudation_DenudationDoneBy"><?= $Page->DenudationDoneBy->caption() ?></template></span></td>
        <td data-name="DenudationDoneBy" <?= $Page->DenudationDoneBy->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_DenudationDoneBy"><span id="el_ivf_oocytedenudation_DenudationDoneBy">
<span<?= $Page->DenudationDoneBy->viewAttributes() ?>>
<?= $Page->DenudationDoneBy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_status"><template id="tpc_ivf_oocytedenudation_status"><?= $Page->status->caption() ?></template></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_status"><span id="el_ivf_oocytedenudation_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_createdby"><template id="tpc_ivf_oocytedenudation_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_createdby"><span id="el_ivf_oocytedenudation_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_createddatetime"><template id="tpc_ivf_oocytedenudation_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_createddatetime"><span id="el_ivf_oocytedenudation_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_modifiedby"><template id="tpc_ivf_oocytedenudation_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_modifiedby"><span id="el_ivf_oocytedenudation_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_modifieddatetime"><template id="tpc_ivf_oocytedenudation_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_modifieddatetime"><span id="el_ivf_oocytedenudation_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_TidNo"><template id="tpc_ivf_oocytedenudation_TidNo"><?= $Page->TidNo->caption() ?></template></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_TidNo"><span id="el_ivf_oocytedenudation_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ExpFollicles->Visible) { // ExpFollicles ?>
    <tr id="r_ExpFollicles">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_ExpFollicles"><template id="tpc_ivf_oocytedenudation_ExpFollicles"><?= $Page->ExpFollicles->caption() ?></template></span></td>
        <td data-name="ExpFollicles" <?= $Page->ExpFollicles->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_ExpFollicles"><span id="el_ivf_oocytedenudation_ExpFollicles">
<span<?= $Page->ExpFollicles->viewAttributes() ?>>
<?= $Page->ExpFollicles->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
    <tr id="r_SecondaryDenudationDoneBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_SecondaryDenudationDoneBy"><template id="tpc_ivf_oocytedenudation_SecondaryDenudationDoneBy"><?= $Page->SecondaryDenudationDoneBy->caption() ?></template></span></td>
        <td data-name="SecondaryDenudationDoneBy" <?= $Page->SecondaryDenudationDoneBy->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_SecondaryDenudationDoneBy"><span id="el_ivf_oocytedenudation_SecondaryDenudationDoneBy">
<span<?= $Page->SecondaryDenudationDoneBy->viewAttributes() ?>>
<?= $Page->SecondaryDenudationDoneBy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient2->Visible) { // patient2 ?>
    <tr id="r_patient2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_patient2"><template id="tpc_ivf_oocytedenudation_patient2"><?= $Page->patient2->caption() ?></template></span></td>
        <td data-name="patient2" <?= $Page->patient2->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_patient2"><span id="el_ivf_oocytedenudation_patient2">
<span<?= $Page->patient2->viewAttributes() ?>>
<?= $Page->patient2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OocytesDonate1->Visible) { // OocytesDonate1 ?>
    <tr id="r_OocytesDonate1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OocytesDonate1"><template id="tpc_ivf_oocytedenudation_OocytesDonate1"><?= $Page->OocytesDonate1->caption() ?></template></span></td>
        <td data-name="OocytesDonate1" <?= $Page->OocytesDonate1->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_OocytesDonate1"><span id="el_ivf_oocytedenudation_OocytesDonate1">
<span<?= $Page->OocytesDonate1->viewAttributes() ?>>
<?= $Page->OocytesDonate1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OocytesDonate2->Visible) { // OocytesDonate2 ?>
    <tr id="r_OocytesDonate2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OocytesDonate2"><template id="tpc_ivf_oocytedenudation_OocytesDonate2"><?= $Page->OocytesDonate2->caption() ?></template></span></td>
        <td data-name="OocytesDonate2" <?= $Page->OocytesDonate2->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_OocytesDonate2"><span id="el_ivf_oocytedenudation_OocytesDonate2">
<span<?= $Page->OocytesDonate2->viewAttributes() ?>>
<?= $Page->OocytesDonate2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ETDonate->Visible) { // ETDonate ?>
    <tr id="r_ETDonate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_ETDonate"><template id="tpc_ivf_oocytedenudation_ETDonate"><?= $Page->ETDonate->caption() ?></template></span></td>
        <td data-name="ETDonate" <?= $Page->ETDonate->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_ETDonate"><span id="el_ivf_oocytedenudation_ETDonate">
<span<?= $Page->ETDonate->viewAttributes() ?>>
<?= $Page->ETDonate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OocyteOrgin->Visible) { // OocyteOrgin ?>
    <tr id="r_OocyteOrgin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OocyteOrgin"><template id="tpc_ivf_oocytedenudation_OocyteOrgin"><?= $Page->OocyteOrgin->caption() ?></template></span></td>
        <td data-name="OocyteOrgin" <?= $Page->OocyteOrgin->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_OocyteOrgin"><span id="el_ivf_oocytedenudation_OocyteOrgin">
<span<?= $Page->OocyteOrgin->viewAttributes() ?>>
<?= $Page->OocyteOrgin->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient1->Visible) { // patient1 ?>
    <tr id="r_patient1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_patient1"><template id="tpc_ivf_oocytedenudation_patient1"><?= $Page->patient1->caption() ?></template></span></td>
        <td data-name="patient1" <?= $Page->patient1->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_patient1"><span id="el_ivf_oocytedenudation_patient1">
<span<?= $Page->patient1->viewAttributes() ?>>
<?= $Page->patient1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OocyteType->Visible) { // OocyteType ?>
    <tr id="r_OocyteType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OocyteType"><template id="tpc_ivf_oocytedenudation_OocyteType"><?= $Page->OocyteType->caption() ?></template></span></td>
        <td data-name="OocyteType" <?= $Page->OocyteType->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_OocyteType"><span id="el_ivf_oocytedenudation_OocyteType">
<span<?= $Page->OocyteType->viewAttributes() ?>>
<?= $Page->OocyteType->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
    <tr id="r_MIOocytesDonate1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate1"><template id="tpc_ivf_oocytedenudation_MIOocytesDonate1"><?= $Page->MIOocytesDonate1->caption() ?></template></span></td>
        <td data-name="MIOocytesDonate1" <?= $Page->MIOocytesDonate1->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_MIOocytesDonate1"><span id="el_ivf_oocytedenudation_MIOocytesDonate1">
<span<?= $Page->MIOocytesDonate1->viewAttributes() ?>>
<?= $Page->MIOocytesDonate1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
    <tr id="r_MIOocytesDonate2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate2"><template id="tpc_ivf_oocytedenudation_MIOocytesDonate2"><?= $Page->MIOocytesDonate2->caption() ?></template></span></td>
        <td data-name="MIOocytesDonate2" <?= $Page->MIOocytesDonate2->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_MIOocytesDonate2"><span id="el_ivf_oocytedenudation_MIOocytesDonate2">
<span<?= $Page->MIOocytesDonate2->viewAttributes() ?>>
<?= $Page->MIOocytesDonate2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SelfMI->Visible) { // SelfMI ?>
    <tr id="r_SelfMI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_SelfMI"><template id="tpc_ivf_oocytedenudation_SelfMI"><?= $Page->SelfMI->caption() ?></template></span></td>
        <td data-name="SelfMI" <?= $Page->SelfMI->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_SelfMI"><span id="el_ivf_oocytedenudation_SelfMI">
<span<?= $Page->SelfMI->viewAttributes() ?>>
<?= $Page->SelfMI->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SelfMII->Visible) { // SelfMII ?>
    <tr id="r_SelfMII">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_SelfMII"><template id="tpc_ivf_oocytedenudation_SelfMII"><?= $Page->SelfMII->caption() ?></template></span></td>
        <td data-name="SelfMII" <?= $Page->SelfMII->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_SelfMII"><span id="el_ivf_oocytedenudation_SelfMII">
<span<?= $Page->SelfMII->viewAttributes() ?>>
<?= $Page->SelfMII->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient3->Visible) { // patient3 ?>
    <tr id="r_patient3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_patient3"><template id="tpc_ivf_oocytedenudation_patient3"><?= $Page->patient3->caption() ?></template></span></td>
        <td data-name="patient3" <?= $Page->patient3->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_patient3"><span id="el_ivf_oocytedenudation_patient3">
<span<?= $Page->patient3->viewAttributes() ?>>
<?= $Page->patient3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->patient4->Visible) { // patient4 ?>
    <tr id="r_patient4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_patient4"><template id="tpc_ivf_oocytedenudation_patient4"><?= $Page->patient4->caption() ?></template></span></td>
        <td data-name="patient4" <?= $Page->patient4->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_patient4"><span id="el_ivf_oocytedenudation_patient4">
<span<?= $Page->patient4->viewAttributes() ?>>
<?= $Page->patient4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OocytesDonate3->Visible) { // OocytesDonate3 ?>
    <tr id="r_OocytesDonate3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OocytesDonate3"><template id="tpc_ivf_oocytedenudation_OocytesDonate3"><?= $Page->OocytesDonate3->caption() ?></template></span></td>
        <td data-name="OocytesDonate3" <?= $Page->OocytesDonate3->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_OocytesDonate3"><span id="el_ivf_oocytedenudation_OocytesDonate3">
<span<?= $Page->OocytesDonate3->viewAttributes() ?>>
<?= $Page->OocytesDonate3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OocytesDonate4->Visible) { // OocytesDonate4 ?>
    <tr id="r_OocytesDonate4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_OocytesDonate4"><template id="tpc_ivf_oocytedenudation_OocytesDonate4"><?= $Page->OocytesDonate4->caption() ?></template></span></td>
        <td data-name="OocytesDonate4" <?= $Page->OocytesDonate4->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_OocytesDonate4"><span id="el_ivf_oocytedenudation_OocytesDonate4">
<span<?= $Page->OocytesDonate4->viewAttributes() ?>>
<?= $Page->OocytesDonate4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
    <tr id="r_MIOocytesDonate3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate3"><template id="tpc_ivf_oocytedenudation_MIOocytesDonate3"><?= $Page->MIOocytesDonate3->caption() ?></template></span></td>
        <td data-name="MIOocytesDonate3" <?= $Page->MIOocytesDonate3->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_MIOocytesDonate3"><span id="el_ivf_oocytedenudation_MIOocytesDonate3">
<span<?= $Page->MIOocytesDonate3->viewAttributes() ?>>
<?= $Page->MIOocytesDonate3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
    <tr id="r_MIOocytesDonate4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_MIOocytesDonate4"><template id="tpc_ivf_oocytedenudation_MIOocytesDonate4"><?= $Page->MIOocytesDonate4->caption() ?></template></span></td>
        <td data-name="MIOocytesDonate4" <?= $Page->MIOocytesDonate4->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_MIOocytesDonate4"><span id="el_ivf_oocytedenudation_MIOocytesDonate4">
<span<?= $Page->MIOocytesDonate4->viewAttributes() ?>>
<?= $Page->MIOocytesDonate4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
    <tr id="r_SelfOocytesMI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_SelfOocytesMI"><template id="tpc_ivf_oocytedenudation_SelfOocytesMI"><?= $Page->SelfOocytesMI->caption() ?></template></span></td>
        <td data-name="SelfOocytesMI" <?= $Page->SelfOocytesMI->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_SelfOocytesMI"><span id="el_ivf_oocytedenudation_SelfOocytesMI">
<span<?= $Page->SelfOocytesMI->viewAttributes() ?>>
<?= $Page->SelfOocytesMI->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
    <tr id="r_SelfOocytesMII">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_SelfOocytesMII"><template id="tpc_ivf_oocytedenudation_SelfOocytesMII"><?= $Page->SelfOocytesMII->caption() ?></template></span></td>
        <td data-name="SelfOocytesMII" <?= $Page->SelfOocytesMII->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_SelfOocytesMII"><span id="el_ivf_oocytedenudation_SelfOocytesMII">
<span<?= $Page->SelfOocytesMII->viewAttributes() ?>>
<?= $Page->SelfOocytesMII->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->donor->Visible) { // donor ?>
    <tr id="r_donor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_oocytedenudation_donor"><template id="tpc_ivf_oocytedenudation_donor"><?= $Page->donor->caption() ?></template></span></td>
        <td data-name="donor" <?= $Page->donor->cellAttributes() ?>>
<template id="tpx_ivf_oocytedenudation_donor"><span id="el_ivf_oocytedenudation_donor">
<span<?= $Page->donor->viewAttributes() ?>>
<?= $Page->donor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_ivf_oocytedenudationview" class="ew-custom-template"></div>
<template id="tpm_ivf_oocytedenudationview">
<div id="ct_IvfOocytedenudationView"><style>
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
$showmaster = $_GET["showmaster"] ;
if( $showmaster=="ivf_treatment_plan")
{
$sql = "SELECT * FROM ganeshkumar_bjhims.view_ivf_treatment where id='".$IVFid."'; ";
$resultst = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$resultst[0]["RIDNO"]."'; ";
$results = $dbhelper->ExecuteRows($sql);
}else{
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
}
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
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_treatment_plan where id='".$cid."'; ";
$resultsB = $dbhelper->ExecuteRows($sql);
?>	
<input type="hidden" id="TidNO" name="TidNO" value="<?php echo $resultst[0]["id"]; ?>">
<input type="hidden" id="RIDNO" name="RIDNO" value="<?php echo $results[0]["id"]; ?>">
<input type="hidden" id="Female" name="Female" value="<?php echo $results[0]["Female"]; ?>">
<div class="row">
<div class="col-md-6">
Couple ID : <?php echo $results[0]["CoupleID"]; ?>
</div>
<div class="col-md-6">
IVF Cycle NO : <?php echo $resultsB[0]["IVFCycleNO"]; ?>
</div>
</div>
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
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Ovum Pick Up </h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_ResultDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_ResultDate"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_Surgeon"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_Surgeon"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_AsstSurgeon"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_AsstSurgeon"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_Anaesthetist"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_Anaesthetist"></slot></span>
						</td>
						<td style="width:50%">
						<slot class="ew-slot" name="tpc_ivf_oocytedenudation_AnaestheiaType"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_AnaestheiaType"></slot>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_PrimaryEmbryologist"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_PrimaryEmbryologist"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_SecondaryEmbryologist"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_SecondaryEmbryologist"></slot></span>
						</td>
					</tr>
				</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_OPUNotes"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_OPUNotes"></slot></span>
						</td>
					</tr>
				</tbody>
			</table>
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_ExpFollicles"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_ExpFollicles"></slot></span>
						</td>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_NoOfFolliclesRight"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_NoOfFolliclesRight"></slot></span>
						</td>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_NoOfFolliclesLeft"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_NoOfFolliclesLeft"></slot></span>
						</td>
					</tr>
						<tr>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_NoOfOocytes"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_NoOfOocytes"></slot></span>
						</td>
						<td>
						</td>
												<td>
						</td>
					</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
<div class="col-4">
<button type="button" class="btn btn-block btn-success" onclick="ShowDenudationDoneBy()">Record Oocyte Denudation</button>
</div>
<div class="row" id="DateOfDenudationShow">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Denudation </h3>
			</div>
			<div class="card-body">  
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_DateOfDenudation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_DateOfDenudation"></slot></span>
						</td>
						<td>
							<span class="ew-cell"></span>
						</td>
					</tr>
						<tr>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_DenudationDoneBy"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_DenudationDoneBy"></slot></span>
						</td>
						<td>
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_SecondaryDenudationDoneBy"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_SecondaryDenudationDoneBy"></slot></span>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
</div>
<div class="row" id="SelfOocyteShow">
<div class="row">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Self Oocyte  </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
				<tbody>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_SelfOocytesMI"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_SelfOocytesMI"></slot></span></td>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_SelfOocytesMII"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_SelfOocytesMII"></slot></span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>
</div>
<div class="row" id="OocyteDonateToPatientShow">
<div class="row">
<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Donate To Patient 1 </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
				<tbody>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_patient1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_patient1"></slot></span></td></tr>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_MIOocytesDonate1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_MIOocytesDonate1"></slot></span></td>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_OocytesDonate1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_OocytesDonate1"></slot></span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>
<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Donate To Patient 2 </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
								<tbody>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_patient2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_patient2"></slot></span></td></tr>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_MIOocytesDonate2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_MIOocytesDonate2"></slot></span></td>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_OocytesDonate2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_OocytesDonate2"></slot></span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>			
</div>				
<div class="row">
<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Donate To Patient 3 </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
				<tbody>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_patient3"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_patient3"></slot></span></td></tr>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_MIOocytesDonate3"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_MIOocytesDonate3"></slot></span></td>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_OocytesDonate3"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_OocytesDonate3"></slot></span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>
<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Oocyte Donate To Patient 4 </h3>
			</div>
			<div class="card-body">
						<table class="ew-table" style="width:100%;">
								<tbody>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_patient4"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_patient4"></slot></span></td></tr>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_MIOocytesDonate4"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_MIOocytesDonate4"></slot></span></td>
					<tr><td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_oocytedenudation_OocytesDonate4"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_oocytedenudation_OocytesDonate4"></slot></span></td>
				</tbody>
			</table>
			</div>
		</div>
</div>			
</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
			</div>
			<div class="card-body">  
			</br>
				<div id="addElement"></div>
			</br>
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td>
							<span class="ew-cell">
<?php
$cidviddd = $_GET["id"] ;
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$sql = "SELECT count(Day0OocyteStage) as CountMIIStage FROM ganeshkumar_bjhims.ivf_embryology_chart where DidNO='".$cidviddd."'  and Day0OocyteStage='MII';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["CountMIIStage"];
	$rs->MoveNext();
}
echo 'Total Number of MII = ' .$Services;
?>	
							</span>
						</td>
						<td>
							<span class="ew-cell"></span>
						</td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
	<font size="4" >
<table class="table table-striped ew-table ew-export-table" style="width:40%;">
<tr>
<td><b>Oocyte No</b></td>
<td><b>Stage</b></td>
<td><b>Remarks</b></td>
</tr>
<?php
$cidviddd = $_GET["id"] ;
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_embryology_chart where DidNO='".$cidviddd."';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Day0sino"];
				$ItemCode =  $row["Day0OocyteStage"];
				$Qty = 1; //$row["Services"];
				$Rate =  $row["amount"];
				$SubTotal =  $row["Remarks"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
				$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
	$rs->MoveNext();
}
echo $hhh;
?>		
</table> 
<br><br>
	  </font>
</div>
</template>
<?php
    if (in_array("ivf_embryology_chart", explode(",", $Page->getCurrentDetailTable())) && $ivf_embryology_chart->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("ivf_embryology_chart", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "IvfEmbryologyChartGrid.php" ?>
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_ivf_oocytedenudationview", "tpm_ivf_oocytedenudationview", "ivf_oocytedenudationview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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

<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfArtSummaryView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_art_summaryview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_art_summaryview = currentForm = new ew.Form("fivf_art_summaryview", "view");
    loadjs.done("fivf_art_summaryview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.ivf_art_summary) ew.vars.tables.ivf_art_summary = <?= JsonEncode(GetClientVar("tables", "ivf_art_summary")) ?>;
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
<form name="fivf_art_summaryview" id="fivf_art_summaryview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_art_summary">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_id"><template id="tpc_ivf_art_summary_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_id"><span id="el_ivf_art_summary_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
    <tr id="r_ARTCycle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_ARTCycle"><template id="tpc_ivf_art_summary_ARTCycle"><?= $Page->ARTCycle->caption() ?></template></span></td>
        <td data-name="ARTCycle" <?= $Page->ARTCycle->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_ARTCycle"><span id="el_ivf_art_summary_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Spermorigin->Visible) { // Spermorigin ?>
    <tr id="r_Spermorigin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Spermorigin"><template id="tpc_ivf_art_summary_Spermorigin"><?= $Page->Spermorigin->caption() ?></template></span></td>
        <td data-name="Spermorigin" <?= $Page->Spermorigin->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Spermorigin"><span id="el_ivf_art_summary_Spermorigin">
<span<?= $Page->Spermorigin->viewAttributes() ?>>
<?= $Page->Spermorigin->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IndicationforART->Visible) { // IndicationforART ?>
    <tr id="r_IndicationforART">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_IndicationforART"><template id="tpc_ivf_art_summary_IndicationforART"><?= $Page->IndicationforART->caption() ?></template></span></td>
        <td data-name="IndicationforART" <?= $Page->IndicationforART->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_IndicationforART"><span id="el_ivf_art_summary_IndicationforART">
<span<?= $Page->IndicationforART->viewAttributes() ?>>
<?= $Page->IndicationforART->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DateofICSI->Visible) { // DateofICSI ?>
    <tr id="r_DateofICSI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_DateofICSI"><template id="tpc_ivf_art_summary_DateofICSI"><?= $Page->DateofICSI->caption() ?></template></span></td>
        <td data-name="DateofICSI" <?= $Page->DateofICSI->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_DateofICSI"><span id="el_ivf_art_summary_DateofICSI">
<span<?= $Page->DateofICSI->viewAttributes() ?>>
<?= $Page->DateofICSI->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
    <tr id="r_Origin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Origin"><template id="tpc_ivf_art_summary_Origin"><?= $Page->Origin->caption() ?></template></span></td>
        <td data-name="Origin" <?= $Page->Origin->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Origin"><span id="el_ivf_art_summary_Origin">
<span<?= $Page->Origin->viewAttributes() ?>>
<?= $Page->Origin->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <tr id="r_Status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Status"><template id="tpc_ivf_art_summary_Status"><?= $Page->Status->caption() ?></template></span></td>
        <td data-name="Status" <?= $Page->Status->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Status"><span id="el_ivf_art_summary_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <tr id="r_Method">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Method"><template id="tpc_ivf_art_summary_Method"><?= $Page->Method->caption() ?></template></span></td>
        <td data-name="Method" <?= $Page->Method->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Method"><span id="el_ivf_art_summary_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pre_Concentration->Visible) { // pre_Concentration ?>
    <tr id="r_pre_Concentration">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_pre_Concentration"><template id="tpc_ivf_art_summary_pre_Concentration"><?= $Page->pre_Concentration->caption() ?></template></span></td>
        <td data-name="pre_Concentration" <?= $Page->pre_Concentration->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_pre_Concentration"><span id="el_ivf_art_summary_pre_Concentration">
<span<?= $Page->pre_Concentration->viewAttributes() ?>>
<?= $Page->pre_Concentration->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pre_Motility->Visible) { // pre_Motility ?>
    <tr id="r_pre_Motility">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_pre_Motility"><template id="tpc_ivf_art_summary_pre_Motility"><?= $Page->pre_Motility->caption() ?></template></span></td>
        <td data-name="pre_Motility" <?= $Page->pre_Motility->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_pre_Motility"><span id="el_ivf_art_summary_pre_Motility">
<span<?= $Page->pre_Motility->viewAttributes() ?>>
<?= $Page->pre_Motility->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pre_Morphology->Visible) { // pre_Morphology ?>
    <tr id="r_pre_Morphology">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_pre_Morphology"><template id="tpc_ivf_art_summary_pre_Morphology"><?= $Page->pre_Morphology->caption() ?></template></span></td>
        <td data-name="pre_Morphology" <?= $Page->pre_Morphology->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_pre_Morphology"><span id="el_ivf_art_summary_pre_Morphology">
<span<?= $Page->pre_Morphology->viewAttributes() ?>>
<?= $Page->pre_Morphology->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->post_Concentration->Visible) { // post_Concentration ?>
    <tr id="r_post_Concentration">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_post_Concentration"><template id="tpc_ivf_art_summary_post_Concentration"><?= $Page->post_Concentration->caption() ?></template></span></td>
        <td data-name="post_Concentration" <?= $Page->post_Concentration->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_post_Concentration"><span id="el_ivf_art_summary_post_Concentration">
<span<?= $Page->post_Concentration->viewAttributes() ?>>
<?= $Page->post_Concentration->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->post_Motility->Visible) { // post_Motility ?>
    <tr id="r_post_Motility">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_post_Motility"><template id="tpc_ivf_art_summary_post_Motility"><?= $Page->post_Motility->caption() ?></template></span></td>
        <td data-name="post_Motility" <?= $Page->post_Motility->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_post_Motility"><span id="el_ivf_art_summary_post_Motility">
<span<?= $Page->post_Motility->viewAttributes() ?>>
<?= $Page->post_Motility->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->post_Morphology->Visible) { // post_Morphology ?>
    <tr id="r_post_Morphology">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_post_Morphology"><template id="tpc_ivf_art_summary_post_Morphology"><?= $Page->post_Morphology->caption() ?></template></span></td>
        <td data-name="post_Morphology" <?= $Page->post_Morphology->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_post_Morphology"><span id="el_ivf_art_summary_post_Morphology">
<span<?= $Page->post_Morphology->viewAttributes() ?>>
<?= $Page->post_Morphology->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
    <tr id="r_NumberofEmbryostransferred">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NumberofEmbryostransferred"><template id="tpc_ivf_art_summary_NumberofEmbryostransferred"><?= $Page->NumberofEmbryostransferred->caption() ?></template></span></td>
        <td data-name="NumberofEmbryostransferred" <?= $Page->NumberofEmbryostransferred->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_NumberofEmbryostransferred"><span id="el_ivf_art_summary_NumberofEmbryostransferred">
<span<?= $Page->NumberofEmbryostransferred->viewAttributes() ?>>
<?= $Page->NumberofEmbryostransferred->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
    <tr id="r_Embryosunderobservation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Embryosunderobservation"><template id="tpc_ivf_art_summary_Embryosunderobservation"><?= $Page->Embryosunderobservation->caption() ?></template></span></td>
        <td data-name="Embryosunderobservation" <?= $Page->Embryosunderobservation->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Embryosunderobservation"><span id="el_ivf_art_summary_Embryosunderobservation">
<span<?= $Page->Embryosunderobservation->viewAttributes() ?>>
<?= $Page->Embryosunderobservation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
    <tr id="r_EmbryoDevelopmentSummary">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_EmbryoDevelopmentSummary"><template id="tpc_ivf_art_summary_EmbryoDevelopmentSummary"><?= $Page->EmbryoDevelopmentSummary->caption() ?></template></span></td>
        <td data-name="EmbryoDevelopmentSummary" <?= $Page->EmbryoDevelopmentSummary->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_EmbryoDevelopmentSummary"><span id="el_ivf_art_summary_EmbryoDevelopmentSummary">
<span<?= $Page->EmbryoDevelopmentSummary->viewAttributes() ?>>
<?= $Page->EmbryoDevelopmentSummary->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
    <tr id="r_EmbryologistSignature">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_EmbryologistSignature"><template id="tpc_ivf_art_summary_EmbryologistSignature"><?= $Page->EmbryologistSignature->caption() ?></template></span></td>
        <td data-name="EmbryologistSignature" <?= $Page->EmbryologistSignature->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_EmbryologistSignature"><span id="el_ivf_art_summary_EmbryologistSignature">
<span<?= $Page->EmbryologistSignature->viewAttributes() ?>>
<?= $Page->EmbryologistSignature->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
    <tr id="r_IVFRegistrationID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_IVFRegistrationID"><template id="tpc_ivf_art_summary_IVFRegistrationID"><?= $Page->IVFRegistrationID->caption() ?></template></span></td>
        <td data-name="IVFRegistrationID" <?= $Page->IVFRegistrationID->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_IVFRegistrationID"><span id="el_ivf_art_summary_IVFRegistrationID">
<span<?= $Page->IVFRegistrationID->viewAttributes() ?>>
<?= $Page->IVFRegistrationID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
    <tr id="r_InseminatinTechnique">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_InseminatinTechnique"><template id="tpc_ivf_art_summary_InseminatinTechnique"><?= $Page->InseminatinTechnique->caption() ?></template></span></td>
        <td data-name="InseminatinTechnique" <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_InseminatinTechnique"><span id="el_ivf_art_summary_InseminatinTechnique">
<span<?= $Page->InseminatinTechnique->viewAttributes() ?>>
<?= $Page->InseminatinTechnique->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ICSIDetails->Visible) { // ICSIDetails ?>
    <tr id="r_ICSIDetails">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_ICSIDetails"><template id="tpc_ivf_art_summary_ICSIDetails"><?= $Page->ICSIDetails->caption() ?></template></span></td>
        <td data-name="ICSIDetails" <?= $Page->ICSIDetails->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_ICSIDetails"><span id="el_ivf_art_summary_ICSIDetails">
<span<?= $Page->ICSIDetails->viewAttributes() ?>>
<?= $Page->ICSIDetails->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DateofET->Visible) { // DateofET ?>
    <tr id="r_DateofET">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_DateofET"><template id="tpc_ivf_art_summary_DateofET"><?= $Page->DateofET->caption() ?></template></span></td>
        <td data-name="DateofET" <?= $Page->DateofET->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_DateofET"><span id="el_ivf_art_summary_DateofET">
<span<?= $Page->DateofET->viewAttributes() ?>>
<?= $Page->DateofET->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
    <tr id="r_Reasonfornotranfer">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Reasonfornotranfer"><template id="tpc_ivf_art_summary_Reasonfornotranfer"><?= $Page->Reasonfornotranfer->caption() ?></template></span></td>
        <td data-name="Reasonfornotranfer" <?= $Page->Reasonfornotranfer->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Reasonfornotranfer"><span id="el_ivf_art_summary_Reasonfornotranfer">
<span<?= $Page->Reasonfornotranfer->viewAttributes() ?>>
<?= $Page->Reasonfornotranfer->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
    <tr id="r_EmbryosCryopreserved">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_EmbryosCryopreserved"><template id="tpc_ivf_art_summary_EmbryosCryopreserved"><?= $Page->EmbryosCryopreserved->caption() ?></template></span></td>
        <td data-name="EmbryosCryopreserved" <?= $Page->EmbryosCryopreserved->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_EmbryosCryopreserved"><span id="el_ivf_art_summary_EmbryosCryopreserved">
<span<?= $Page->EmbryosCryopreserved->viewAttributes() ?>>
<?= $Page->EmbryosCryopreserved->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LegendCellStage->Visible) { // LegendCellStage ?>
    <tr id="r_LegendCellStage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_LegendCellStage"><template id="tpc_ivf_art_summary_LegendCellStage"><?= $Page->LegendCellStage->caption() ?></template></span></td>
        <td data-name="LegendCellStage" <?= $Page->LegendCellStage->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_LegendCellStage"><span id="el_ivf_art_summary_LegendCellStage">
<span<?= $Page->LegendCellStage->viewAttributes() ?>>
<?= $Page->LegendCellStage->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
    <tr id="r_ConsultantsSignature">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_ConsultantsSignature"><template id="tpc_ivf_art_summary_ConsultantsSignature"><?= $Page->ConsultantsSignature->caption() ?></template></span></td>
        <td data-name="ConsultantsSignature" <?= $Page->ConsultantsSignature->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_ConsultantsSignature"><span id="el_ivf_art_summary_ConsultantsSignature">
<span<?= $Page->ConsultantsSignature->viewAttributes() ?>>
<?= $Page->ConsultantsSignature->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Name"><template id="tpc_ivf_art_summary_Name"><?= $Page->Name->caption() ?></template></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Name"><span id="el_ivf_art_summary_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->M2->Visible) { // M2 ?>
    <tr id="r_M2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_M2"><template id="tpc_ivf_art_summary_M2"><?= $Page->M2->caption() ?></template></span></td>
        <td data-name="M2" <?= $Page->M2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_M2"><span id="el_ivf_art_summary_M2">
<span<?= $Page->M2->viewAttributes() ?>>
<?= $Page->M2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mi2->Visible) { // Mi2 ?>
    <tr id="r_Mi2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Mi2"><template id="tpc_ivf_art_summary_Mi2"><?= $Page->Mi2->caption() ?></template></span></td>
        <td data-name="Mi2" <?= $Page->Mi2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Mi2"><span id="el_ivf_art_summary_Mi2">
<span<?= $Page->Mi2->viewAttributes() ?>>
<?= $Page->Mi2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ICSI->Visible) { // ICSI ?>
    <tr id="r_ICSI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_ICSI"><template id="tpc_ivf_art_summary_ICSI"><?= $Page->ICSI->caption() ?></template></span></td>
        <td data-name="ICSI" <?= $Page->ICSI->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_ICSI"><span id="el_ivf_art_summary_ICSI">
<span<?= $Page->ICSI->viewAttributes() ?>>
<?= $Page->ICSI->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IVF->Visible) { // IVF ?>
    <tr id="r_IVF">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_IVF"><template id="tpc_ivf_art_summary_IVF"><?= $Page->IVF->caption() ?></template></span></td>
        <td data-name="IVF" <?= $Page->IVF->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_IVF"><span id="el_ivf_art_summary_IVF">
<span<?= $Page->IVF->viewAttributes() ?>>
<?= $Page->IVF->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->M1->Visible) { // M1 ?>
    <tr id="r_M1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_M1"><template id="tpc_ivf_art_summary_M1"><?= $Page->M1->caption() ?></template></span></td>
        <td data-name="M1" <?= $Page->M1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_M1"><span id="el_ivf_art_summary_M1">
<span<?= $Page->M1->viewAttributes() ?>>
<?= $Page->M1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GV->Visible) { // GV ?>
    <tr id="r_GV">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_GV"><template id="tpc_ivf_art_summary_GV"><?= $Page->GV->caption() ?></template></span></td>
        <td data-name="GV" <?= $Page->GV->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_GV"><span id="el_ivf_art_summary_GV">
<span<?= $Page->GV->viewAttributes() ?>>
<?= $Page->GV->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_Others->Visible) { // Others ?>
    <tr id="r__Others">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary__Others"><template id="tpc_ivf_art_summary__Others"><?= $Page->_Others->caption() ?></template></span></td>
        <td data-name="_Others" <?= $Page->_Others->cellAttributes() ?>>
<template id="tpx_ivf_art_summary__Others"><span id="el_ivf_art_summary__Others">
<span<?= $Page->_Others->viewAttributes() ?>>
<?= $Page->_Others->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Normal2PN->Visible) { // Normal2PN ?>
    <tr id="r_Normal2PN">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Normal2PN"><template id="tpc_ivf_art_summary_Normal2PN"><?= $Page->Normal2PN->caption() ?></template></span></td>
        <td data-name="Normal2PN" <?= $Page->Normal2PN->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Normal2PN"><span id="el_ivf_art_summary_Normal2PN">
<span<?= $Page->Normal2PN->viewAttributes() ?>>
<?= $Page->Normal2PN->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
    <tr id="r_Abnormalfertilisation1N">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Abnormalfertilisation1N"><template id="tpc_ivf_art_summary_Abnormalfertilisation1N"><?= $Page->Abnormalfertilisation1N->caption() ?></template></span></td>
        <td data-name="Abnormalfertilisation1N" <?= $Page->Abnormalfertilisation1N->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Abnormalfertilisation1N"><span id="el_ivf_art_summary_Abnormalfertilisation1N">
<span<?= $Page->Abnormalfertilisation1N->viewAttributes() ?>>
<?= $Page->Abnormalfertilisation1N->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
    <tr id="r_Abnormalfertilisation3N">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Abnormalfertilisation3N"><template id="tpc_ivf_art_summary_Abnormalfertilisation3N"><?= $Page->Abnormalfertilisation3N->caption() ?></template></span></td>
        <td data-name="Abnormalfertilisation3N" <?= $Page->Abnormalfertilisation3N->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Abnormalfertilisation3N"><span id="el_ivf_art_summary_Abnormalfertilisation3N">
<span<?= $Page->Abnormalfertilisation3N->viewAttributes() ?>>
<?= $Page->Abnormalfertilisation3N->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NotFertilized->Visible) { // NotFertilized ?>
    <tr id="r_NotFertilized">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NotFertilized"><template id="tpc_ivf_art_summary_NotFertilized"><?= $Page->NotFertilized->caption() ?></template></span></td>
        <td data-name="NotFertilized" <?= $Page->NotFertilized->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_NotFertilized"><span id="el_ivf_art_summary_NotFertilized">
<span<?= $Page->NotFertilized->viewAttributes() ?>>
<?= $Page->NotFertilized->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Degenerated->Visible) { // Degenerated ?>
    <tr id="r_Degenerated">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Degenerated"><template id="tpc_ivf_art_summary_Degenerated"><?= $Page->Degenerated->caption() ?></template></span></td>
        <td data-name="Degenerated" <?= $Page->Degenerated->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Degenerated"><span id="el_ivf_art_summary_Degenerated">
<span<?= $Page->Degenerated->viewAttributes() ?>>
<?= $Page->Degenerated->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SpermDate->Visible) { // SpermDate ?>
    <tr id="r_SpermDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_SpermDate"><template id="tpc_ivf_art_summary_SpermDate"><?= $Page->SpermDate->caption() ?></template></span></td>
        <td data-name="SpermDate" <?= $Page->SpermDate->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_SpermDate"><span id="el_ivf_art_summary_SpermDate">
<span<?= $Page->SpermDate->viewAttributes() ?>>
<?= $Page->SpermDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Code1->Visible) { // Code1 ?>
    <tr id="r_Code1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code1"><template id="tpc_ivf_art_summary_Code1"><?= $Page->Code1->caption() ?></template></span></td>
        <td data-name="Code1" <?= $Page->Code1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Code1"><span id="el_ivf_art_summary_Code1">
<span<?= $Page->Code1->viewAttributes() ?>>
<?= $Page->Code1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day1->Visible) { // Day1 ?>
    <tr id="r_Day1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day1"><template id="tpc_ivf_art_summary_Day1"><?= $Page->Day1->caption() ?></template></span></td>
        <td data-name="Day1" <?= $Page->Day1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Day1"><span id="el_ivf_art_summary_Day1">
<span<?= $Page->Day1->viewAttributes() ?>>
<?= $Page->Day1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CellStage1->Visible) { // CellStage1 ?>
    <tr id="r_CellStage1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage1"><template id="tpc_ivf_art_summary_CellStage1"><?= $Page->CellStage1->caption() ?></template></span></td>
        <td data-name="CellStage1" <?= $Page->CellStage1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_CellStage1"><span id="el_ivf_art_summary_CellStage1">
<span<?= $Page->CellStage1->viewAttributes() ?>>
<?= $Page->CellStage1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Grade1->Visible) { // Grade1 ?>
    <tr id="r_Grade1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade1"><template id="tpc_ivf_art_summary_Grade1"><?= $Page->Grade1->caption() ?></template></span></td>
        <td data-name="Grade1" <?= $Page->Grade1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Grade1"><span id="el_ivf_art_summary_Grade1">
<span<?= $Page->Grade1->viewAttributes() ?>>
<?= $Page->Grade1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State1->Visible) { // State1 ?>
    <tr id="r_State1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State1"><template id="tpc_ivf_art_summary_State1"><?= $Page->State1->caption() ?></template></span></td>
        <td data-name="State1" <?= $Page->State1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_State1"><span id="el_ivf_art_summary_State1">
<span<?= $Page->State1->viewAttributes() ?>>
<?= $Page->State1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Code2->Visible) { // Code2 ?>
    <tr id="r_Code2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code2"><template id="tpc_ivf_art_summary_Code2"><?= $Page->Code2->caption() ?></template></span></td>
        <td data-name="Code2" <?= $Page->Code2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Code2"><span id="el_ivf_art_summary_Code2">
<span<?= $Page->Code2->viewAttributes() ?>>
<?= $Page->Code2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day2->Visible) { // Day2 ?>
    <tr id="r_Day2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day2"><template id="tpc_ivf_art_summary_Day2"><?= $Page->Day2->caption() ?></template></span></td>
        <td data-name="Day2" <?= $Page->Day2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Day2"><span id="el_ivf_art_summary_Day2">
<span<?= $Page->Day2->viewAttributes() ?>>
<?= $Page->Day2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CellStage2->Visible) { // CellStage2 ?>
    <tr id="r_CellStage2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage2"><template id="tpc_ivf_art_summary_CellStage2"><?= $Page->CellStage2->caption() ?></template></span></td>
        <td data-name="CellStage2" <?= $Page->CellStage2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_CellStage2"><span id="el_ivf_art_summary_CellStage2">
<span<?= $Page->CellStage2->viewAttributes() ?>>
<?= $Page->CellStage2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Grade2->Visible) { // Grade2 ?>
    <tr id="r_Grade2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade2"><template id="tpc_ivf_art_summary_Grade2"><?= $Page->Grade2->caption() ?></template></span></td>
        <td data-name="Grade2" <?= $Page->Grade2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Grade2"><span id="el_ivf_art_summary_Grade2">
<span<?= $Page->Grade2->viewAttributes() ?>>
<?= $Page->Grade2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State2->Visible) { // State2 ?>
    <tr id="r_State2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State2"><template id="tpc_ivf_art_summary_State2"><?= $Page->State2->caption() ?></template></span></td>
        <td data-name="State2" <?= $Page->State2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_State2"><span id="el_ivf_art_summary_State2">
<span<?= $Page->State2->viewAttributes() ?>>
<?= $Page->State2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Code3->Visible) { // Code3 ?>
    <tr id="r_Code3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code3"><template id="tpc_ivf_art_summary_Code3"><?= $Page->Code3->caption() ?></template></span></td>
        <td data-name="Code3" <?= $Page->Code3->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Code3"><span id="el_ivf_art_summary_Code3">
<span<?= $Page->Code3->viewAttributes() ?>>
<?= $Page->Code3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day3->Visible) { // Day3 ?>
    <tr id="r_Day3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day3"><template id="tpc_ivf_art_summary_Day3"><?= $Page->Day3->caption() ?></template></span></td>
        <td data-name="Day3" <?= $Page->Day3->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Day3"><span id="el_ivf_art_summary_Day3">
<span<?= $Page->Day3->viewAttributes() ?>>
<?= $Page->Day3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CellStage3->Visible) { // CellStage3 ?>
    <tr id="r_CellStage3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage3"><template id="tpc_ivf_art_summary_CellStage3"><?= $Page->CellStage3->caption() ?></template></span></td>
        <td data-name="CellStage3" <?= $Page->CellStage3->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_CellStage3"><span id="el_ivf_art_summary_CellStage3">
<span<?= $Page->CellStage3->viewAttributes() ?>>
<?= $Page->CellStage3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Grade3->Visible) { // Grade3 ?>
    <tr id="r_Grade3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade3"><template id="tpc_ivf_art_summary_Grade3"><?= $Page->Grade3->caption() ?></template></span></td>
        <td data-name="Grade3" <?= $Page->Grade3->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Grade3"><span id="el_ivf_art_summary_Grade3">
<span<?= $Page->Grade3->viewAttributes() ?>>
<?= $Page->Grade3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State3->Visible) { // State3 ?>
    <tr id="r_State3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State3"><template id="tpc_ivf_art_summary_State3"><?= $Page->State3->caption() ?></template></span></td>
        <td data-name="State3" <?= $Page->State3->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_State3"><span id="el_ivf_art_summary_State3">
<span<?= $Page->State3->viewAttributes() ?>>
<?= $Page->State3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Code4->Visible) { // Code4 ?>
    <tr id="r_Code4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code4"><template id="tpc_ivf_art_summary_Code4"><?= $Page->Code4->caption() ?></template></span></td>
        <td data-name="Code4" <?= $Page->Code4->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Code4"><span id="el_ivf_art_summary_Code4">
<span<?= $Page->Code4->viewAttributes() ?>>
<?= $Page->Code4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day4->Visible) { // Day4 ?>
    <tr id="r_Day4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day4"><template id="tpc_ivf_art_summary_Day4"><?= $Page->Day4->caption() ?></template></span></td>
        <td data-name="Day4" <?= $Page->Day4->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Day4"><span id="el_ivf_art_summary_Day4">
<span<?= $Page->Day4->viewAttributes() ?>>
<?= $Page->Day4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CellStage4->Visible) { // CellStage4 ?>
    <tr id="r_CellStage4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage4"><template id="tpc_ivf_art_summary_CellStage4"><?= $Page->CellStage4->caption() ?></template></span></td>
        <td data-name="CellStage4" <?= $Page->CellStage4->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_CellStage4"><span id="el_ivf_art_summary_CellStage4">
<span<?= $Page->CellStage4->viewAttributes() ?>>
<?= $Page->CellStage4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Grade4->Visible) { // Grade4 ?>
    <tr id="r_Grade4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade4"><template id="tpc_ivf_art_summary_Grade4"><?= $Page->Grade4->caption() ?></template></span></td>
        <td data-name="Grade4" <?= $Page->Grade4->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Grade4"><span id="el_ivf_art_summary_Grade4">
<span<?= $Page->Grade4->viewAttributes() ?>>
<?= $Page->Grade4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State4->Visible) { // State4 ?>
    <tr id="r_State4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State4"><template id="tpc_ivf_art_summary_State4"><?= $Page->State4->caption() ?></template></span></td>
        <td data-name="State4" <?= $Page->State4->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_State4"><span id="el_ivf_art_summary_State4">
<span<?= $Page->State4->viewAttributes() ?>>
<?= $Page->State4->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Code5->Visible) { // Code5 ?>
    <tr id="r_Code5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code5"><template id="tpc_ivf_art_summary_Code5"><?= $Page->Code5->caption() ?></template></span></td>
        <td data-name="Code5" <?= $Page->Code5->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Code5"><span id="el_ivf_art_summary_Code5">
<span<?= $Page->Code5->viewAttributes() ?>>
<?= $Page->Code5->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day5->Visible) { // Day5 ?>
    <tr id="r_Day5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day5"><template id="tpc_ivf_art_summary_Day5"><?= $Page->Day5->caption() ?></template></span></td>
        <td data-name="Day5" <?= $Page->Day5->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Day5"><span id="el_ivf_art_summary_Day5">
<span<?= $Page->Day5->viewAttributes() ?>>
<?= $Page->Day5->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CellStage5->Visible) { // CellStage5 ?>
    <tr id="r_CellStage5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage5"><template id="tpc_ivf_art_summary_CellStage5"><?= $Page->CellStage5->caption() ?></template></span></td>
        <td data-name="CellStage5" <?= $Page->CellStage5->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_CellStage5"><span id="el_ivf_art_summary_CellStage5">
<span<?= $Page->CellStage5->viewAttributes() ?>>
<?= $Page->CellStage5->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Grade5->Visible) { // Grade5 ?>
    <tr id="r_Grade5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade5"><template id="tpc_ivf_art_summary_Grade5"><?= $Page->Grade5->caption() ?></template></span></td>
        <td data-name="Grade5" <?= $Page->Grade5->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Grade5"><span id="el_ivf_art_summary_Grade5">
<span<?= $Page->Grade5->viewAttributes() ?>>
<?= $Page->Grade5->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State5->Visible) { // State5 ?>
    <tr id="r_State5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State5"><template id="tpc_ivf_art_summary_State5"><?= $Page->State5->caption() ?></template></span></td>
        <td data-name="State5" <?= $Page->State5->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_State5"><span id="el_ivf_art_summary_State5">
<span<?= $Page->State5->viewAttributes() ?>>
<?= $Page->State5->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_TidNo"><template id="tpc_ivf_art_summary_TidNo"><?= $Page->TidNo->caption() ?></template></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_TidNo"><span id="el_ivf_art_summary_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <tr id="r_RIDNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_RIDNo"><template id="tpc_ivf_art_summary_RIDNo"><?= $Page->RIDNo->caption() ?></template></span></td>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_RIDNo"><span id="el_ivf_art_summary_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
    <tr id="r_Volume">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Volume"><template id="tpc_ivf_art_summary_Volume"><?= $Page->Volume->caption() ?></template></span></td>
        <td data-name="Volume" <?= $Page->Volume->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Volume"><span id="el_ivf_art_summary_Volume">
<span<?= $Page->Volume->viewAttributes() ?>>
<?= $Page->Volume->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Volume1->Visible) { // Volume1 ?>
    <tr id="r_Volume1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Volume1"><template id="tpc_ivf_art_summary_Volume1"><?= $Page->Volume1->caption() ?></template></span></td>
        <td data-name="Volume1" <?= $Page->Volume1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Volume1"><span id="el_ivf_art_summary_Volume1">
<span<?= $Page->Volume1->viewAttributes() ?>>
<?= $Page->Volume1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Volume2->Visible) { // Volume2 ?>
    <tr id="r_Volume2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Volume2"><template id="tpc_ivf_art_summary_Volume2"><?= $Page->Volume2->caption() ?></template></span></td>
        <td data-name="Volume2" <?= $Page->Volume2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Volume2"><span id="el_ivf_art_summary_Volume2">
<span<?= $Page->Volume2->viewAttributes() ?>>
<?= $Page->Volume2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Concentration2->Visible) { // Concentration2 ?>
    <tr id="r_Concentration2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Concentration2"><template id="tpc_ivf_art_summary_Concentration2"><?= $Page->Concentration2->caption() ?></template></span></td>
        <td data-name="Concentration2" <?= $Page->Concentration2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Concentration2"><span id="el_ivf_art_summary_Concentration2">
<span<?= $Page->Concentration2->viewAttributes() ?>>
<?= $Page->Concentration2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
    <tr id="r_Total">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Total"><template id="tpc_ivf_art_summary_Total"><?= $Page->Total->caption() ?></template></span></td>
        <td data-name="Total" <?= $Page->Total->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Total"><span id="el_ivf_art_summary_Total">
<span<?= $Page->Total->viewAttributes() ?>>
<?= $Page->Total->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Total1->Visible) { // Total1 ?>
    <tr id="r_Total1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Total1"><template id="tpc_ivf_art_summary_Total1"><?= $Page->Total1->caption() ?></template></span></td>
        <td data-name="Total1" <?= $Page->Total1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Total1"><span id="el_ivf_art_summary_Total1">
<span<?= $Page->Total1->viewAttributes() ?>>
<?= $Page->Total1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Total2->Visible) { // Total2 ?>
    <tr id="r_Total2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Total2"><template id="tpc_ivf_art_summary_Total2"><?= $Page->Total2->caption() ?></template></span></td>
        <td data-name="Total2" <?= $Page->Total2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Total2"><span id="el_ivf_art_summary_Total2">
<span<?= $Page->Total2->viewAttributes() ?>>
<?= $Page->Total2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Progressive->Visible) { // Progressive ?>
    <tr id="r_Progressive">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Progressive"><template id="tpc_ivf_art_summary_Progressive"><?= $Page->Progressive->caption() ?></template></span></td>
        <td data-name="Progressive" <?= $Page->Progressive->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Progressive"><span id="el_ivf_art_summary_Progressive">
<span<?= $Page->Progressive->viewAttributes() ?>>
<?= $Page->Progressive->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Progressive1->Visible) { // Progressive1 ?>
    <tr id="r_Progressive1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Progressive1"><template id="tpc_ivf_art_summary_Progressive1"><?= $Page->Progressive1->caption() ?></template></span></td>
        <td data-name="Progressive1" <?= $Page->Progressive1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Progressive1"><span id="el_ivf_art_summary_Progressive1">
<span<?= $Page->Progressive1->viewAttributes() ?>>
<?= $Page->Progressive1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Progressive2->Visible) { // Progressive2 ?>
    <tr id="r_Progressive2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Progressive2"><template id="tpc_ivf_art_summary_Progressive2"><?= $Page->Progressive2->caption() ?></template></span></td>
        <td data-name="Progressive2" <?= $Page->Progressive2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Progressive2"><span id="el_ivf_art_summary_Progressive2">
<span<?= $Page->Progressive2->viewAttributes() ?>>
<?= $Page->Progressive2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NotProgressive->Visible) { // NotProgressive ?>
    <tr id="r_NotProgressive">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NotProgressive"><template id="tpc_ivf_art_summary_NotProgressive"><?= $Page->NotProgressive->caption() ?></template></span></td>
        <td data-name="NotProgressive" <?= $Page->NotProgressive->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_NotProgressive"><span id="el_ivf_art_summary_NotProgressive">
<span<?= $Page->NotProgressive->viewAttributes() ?>>
<?= $Page->NotProgressive->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NotProgressive1->Visible) { // NotProgressive1 ?>
    <tr id="r_NotProgressive1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NotProgressive1"><template id="tpc_ivf_art_summary_NotProgressive1"><?= $Page->NotProgressive1->caption() ?></template></span></td>
        <td data-name="NotProgressive1" <?= $Page->NotProgressive1->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_NotProgressive1"><span id="el_ivf_art_summary_NotProgressive1">
<span<?= $Page->NotProgressive1->viewAttributes() ?>>
<?= $Page->NotProgressive1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NotProgressive2->Visible) { // NotProgressive2 ?>
    <tr id="r_NotProgressive2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NotProgressive2"><template id="tpc_ivf_art_summary_NotProgressive2"><?= $Page->NotProgressive2->caption() ?></template></span></td>
        <td data-name="NotProgressive2" <?= $Page->NotProgressive2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_NotProgressive2"><span id="el_ivf_art_summary_NotProgressive2">
<span<?= $Page->NotProgressive2->viewAttributes() ?>>
<?= $Page->NotProgressive2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Motility2->Visible) { // Motility2 ?>
    <tr id="r_Motility2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Motility2"><template id="tpc_ivf_art_summary_Motility2"><?= $Page->Motility2->caption() ?></template></span></td>
        <td data-name="Motility2" <?= $Page->Motility2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Motility2"><span id="el_ivf_art_summary_Motility2">
<span<?= $Page->Motility2->viewAttributes() ?>>
<?= $Page->Motility2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Morphology2->Visible) { // Morphology2 ?>
    <tr id="r_Morphology2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Morphology2"><template id="tpc_ivf_art_summary_Morphology2"><?= $Page->Morphology2->caption() ?></template></span></td>
        <td data-name="Morphology2" <?= $Page->Morphology2->cellAttributes() ?>>
<template id="tpx_ivf_art_summary_Morphology2"><span id="el_ivf_art_summary_Morphology2">
<span<?= $Page->Morphology2->viewAttributes() ?>>
<?= $Page->Morphology2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_ivf_art_summaryview" class="ew-custom-template"></div>
<template id="tpm_ivf_art_summaryview">
<div id="ct_IvfArtSummaryView"><style>
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
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results2[0]["profilePic"]; ?>' alt="User Avatar"> 
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
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$results1[0]["profilePic"]; ?>' alt="User Avatar"> 
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
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">CHARACTERSTICS OF CYCLE</h3>
			</div>
			<div class="card-body">
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td style="width:50%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_ARTCycle"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_ARTCycle"></slot></span>
				 </td>
				 <td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Spermorigin"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Spermorigin"></slot></span>
				</td>
		 </tr>
		 <tr>
				<td style="width:50%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_InseminatinTechnique"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_InseminatinTechnique"></slot></span>
				 </td>
				 <td>					
				 </td>
		 </tr>
		  <tr>
				<td style="width:50%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_IndicationforART"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_IndicationforART"></slot></span>
				</td>
				<td>				
				</td>
		 </tr>
		 <tr>
				<td style="width:50%">
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_ICSIDetails"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_ICSIDetails"></slot></span>
				</td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_DateofICSI"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_DateofICSI"></slot></span>
				</td>
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
				<h3 class="card-title">FOLLICULAR RETRIEVAL</h3>
			</div>
			<div class="card-body">
<table   class="table table-striped ew-table ew-export-table" style="width:100%;">
	<thead>
		<tr>
				<td style="width:33%">
					<span class="ew-cell">Mature Oocytes</span>
				 </td>
				 <td style="width:33%">
					<span class="ew-cell">Immature Oocytes</span>
				 </td>
				 <td>
					<span class="ew-cell">Fertilisation details</span>
				</td>
		 </tr>
	</thead>
	<tbody>
		 <tr>
				<td style="width:33%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_M2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_M2"></slot></span>
				 </td>
				 <td style="width:33%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_M1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_M1"></slot></span>
				 </td>
				 <td>
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Normal2PN"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Normal2PN"></slot></span>
				 </td>
		 </tr>
		  <tr>
				<td style="width:33%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Mi2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Mi2"></slot></span>
				</td>
				<td style="width:33%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_GV"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_GV"></slot></span>
				 </td>
				<td>
				<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Abnormalfertilisation1N"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Abnormalfertilisation1N"></slot></span>
				</td>
		 </tr>
		 <tr>
				<td style="width:33%">
					 <span class="ew-cell"></span>
				</td>
				<td style="width:33%">
					<span class="ew-cell"><slot class="ew-slot" name="tpx_Others"></slot></span>
				 </td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Abnormalfertilisation3N"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Abnormalfertilisation3N"></slot></span>
				</td>
		 </tr>
		  <tr>
				<td style="width:33%">
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_ICSI"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_ICSI"></slot></span>
				</td>
				<td style="width:33%">
					<span class="ew-cell"></span>
				 </td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_NotFertilized"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_NotFertilized"></slot></span>
				</td>
		 </tr>
		  <tr>
				<td style="width:33%">
					 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_IVF"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_IVF"></slot></span>
				</td>
				<td style="width:33%">
					<span class="ew-cell"></span>
				 </td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Degenerated"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Degenerated"></slot></span>
				</td>
		 </tr>		
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Sperm</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Origin"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Origin"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Status"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Status"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Method"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Method"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_SpermDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_SpermDate"></slot></span>
				  </div>		   
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-8">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Spermiogram</h3>
			</div>
			<div class="card-body">
<table   class="table table-striped ew-table ew-export-table" style="width:100%;">
	<thead>
		<tr>
				<td style="width:25%">
					<span class="ew-cell"></span>
				 </td>
				 <td style="width:25%">
					<span class="ew-cell">Pre Capacitation</span>
				 </td>
				 <td style="width:25%">
					<span class="ew-cell">Post Capacitation</span>
				</td>
				<td style="width:25%">
					<span class="ew-cell"></span>
				 </td>
		 </tr>
	</thead>
	<tbody>
		 <tr>
				<td style="width:25%">
					<span class="ew-cell">Volume (ml.) </span>
				 </td>
				 <td style="width:25%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Volume"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Volume"></slot></span>
				 </td>
				 <td>
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Volume1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Volume1"></slot></span>
				 </td>
				 <td>
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Volume2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Volume2"></slot></span>
				 </td>
		 </tr>
		  <tr>
				<td>
					<span class="ew-cell">Concentration (mili/ml)</span>
				</td>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_pre_Concentration"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_pre_Concentration"></slot></span>
				 </td>
				<td>
				<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_post_Concentration"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_post_Concentration"></slot></span>
				</td>
				<td>
				<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Concentration2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Concentration2"></slot></span>
				</td>
		 </tr>
		 <tr>
				<td>
					 <span class="ew-cell">Total</span>
				</td>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Total"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Total"></slot></span>
				 </td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Total1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Total1"></slot></span>
				</td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Total2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Total2"></slot></span>
				</td>
		 </tr>
		  <tr>
				<td>
					 <span class="ew-cell">Progressive (%)</span>
				</td>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Progressive"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Progressive"></slot></span>
				 </td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Progressive1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Progressive1"></slot></span>
				</td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Progressive2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Progressive2"></slot></span>
				</td>
		 </tr>
		  <tr>
				<td>
					 <span class="ew-cell">Not Progressive (%)</span>
				</td>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_NotProgressive"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_NotProgressive"></slot></span>
				 </td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_NotProgressive1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_NotProgressive1"></slot></span>
				</td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_NotProgressive2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_NotProgressive2"></slot></span>
				</td>
		 </tr>
		  <tr>
				<td>
					 <span class="ew-cell">Motility (%)</span>
				</td>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_pre_Motility"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_pre_Motility"></slot></span>
				 </td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_post_Motility"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_post_Motility"></slot></span>
				</td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Motility2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Motility2"></slot></span>
				</td>
		 </tr>
		  <tr>
				<td>
					 <span class="ew-cell">Morphology (%)</span>
				</td>
				<td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_pre_Morphology"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_pre_Morphology"></slot></span>
				 </td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_post_Morphology"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_post_Morphology"></slot></span>
				</td>
				<td>
				     <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Morphology2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Morphology2"></slot></span>
				</td>
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
				<h3 class="card-title">Summary of Embryo transfer( ET)</h3>
			</div>
			<div class="card-body">
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td style="width:50%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_DateofET"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_DateofET"></slot></span>
				 </td>
				 <td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_NumberofEmbryostransferred"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_NumberofEmbryostransferred"></slot></span>
				</td>
		 </tr>
		 <tr>
				<td style="width:50%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Reasonfornotranfer"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Reasonfornotranfer"></slot></span>
				 </td>
				 <td>
				 	<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Embryosunderobservation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Embryosunderobservation"></slot></span>
				 </td>
		 </tr>
  		  <tr>
				<td style="width:50%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_EmbryosCryopreserved"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_EmbryosCryopreserved"></slot></span>
				</td>
				<td>				
				</td>
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
				<h3 class="card-title">Embryo Development Summary</h3>
			</div>
			<div class="card-body">
<table   class="table table-striped ew-table ew-export-table" style="width:100%;">
	<thead>
		<tr>
				<td style="width:16%">
					<span class="ew-cell">Embryo</span>
				 </td>
				 <td style="width:16%">
					<span class="ew-cell">Code</span>
				 </td>
				 <td style="width:16%">
					<span class="ew-cell">Day</span>
				</td>
				 <td style="width:16%">
					<span class="ew-cell">Cell Stage</span>
				</td>
				 <td style="width:16%">
					<span class="ew-cell">Grade</span>
				</td>
				 <td style="width:16%">
					<span class="ew-cell">State</span>
				</td>
		 </tr>
	</thead>
	<tbody>
		 <tr>
				<td  style="width:16%">
					<span class="ew-cell">1</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Code1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Code1"></slot></span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Day1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Day1"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_CellStage1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_CellStage1"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Grade1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Grade1"></slot></span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_State1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_State1"></slot></span>
				 </td>
		 </tr>
		 		 <tr>
				<td  style="width:16%">
					<span class="ew-cell">2</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Code2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Code2"></slot></span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Day2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Day2"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_CellStage2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_CellStage2"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Grade2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Grade2"></slot></span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_State2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_State2"></slot></span>
				 </td>
		 </tr>
		 		 <tr>
				<td  style="width:16%">
					<span class="ew-cell">3</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Code3"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Code3"></slot></span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Day3"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Day3"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_CellStage3"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_CellStage3"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Grade3"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Grade3"></slot></span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_State3"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_State3"></slot></span>
				 </td>
		 </tr>
		 		 <tr>
				<td  style="width:16%">
					<span class="ew-cell">4</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Code4"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Code4"></slot></span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Day4"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Day4"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_CellStage4"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_CellStage4"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Grade4"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Grade4"></slot></span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_State4"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_State4"></slot></span>
				 </td>
		 </tr>
		 		 <tr>
				<td  style="width:16%">
					<span class="ew-cell">5</span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Code5"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Code5"></slot></span>
				 </td>
				 <td style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Day5"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Day5"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_CellStage5"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_CellStage5"></slot></span>
				 </td>
				 <td  style="width:16%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_Grade5"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_Grade5"></slot></span>
				 </td>
				 <td  style="width:16%">
				 <span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_State5"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_State5"></slot></span>
				 </td>
		 </tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td style="width:33%">
					<span class="ew-cell">Legend Cell Stage</span>
				 </td>
				 <td style="width:33%">
					<span class="ew-cell"></span>
				</td>
					<td style="width:33%">
					<span class="ew-cell"></span>
				 </td>
		 </tr>
		 <tr>
				<td style="width:33%">
					<span class="ew-cell">cleavage stage</span>
				 </td>
				 <td style="width:33%">
					<span class="ew-cell">Day 3 embryos</span>
				</td>
					<td  style="width:33%">
					<span class="ew-cell"></span>
				 </td>
		 </tr>
		 <tr>
				<td style="width:33%">
					<span class="ew-cell">CM : Compacting Morula</span>
				 </td>
				 <td  style="width:33%">
					<span class="ew-cell">CB : Cavitated Blastocyst</span>
				</td>
					<td  style="width:33%">
					<span class="ew-cell">XB : Expanded Blastocyst</span>
				 </td>
		 </tr>
		  <tr>
				<td style="width:33%">
					<span class="ew-cell">iHB : Hatching Blastocyst</span>
				 </td>
				 <td  style="width:33%">
					<span class="ew-cell">HB : Hatched Blastocyst</span>
				</td>
					<td  style="width:33%">
					<span class="ew-cell">EB : Early Blastocyst</span>
				 </td>
		 </tr>
	</tbody>
</table>
<table class="ew-table" style="width:100%;">
	 <tbody>
		<tr>
				<td style="width:50%">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_EmbryologistSignature"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_EmbryologistSignature"></slot></span>
				 </td>
				 <td>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_art_summary_ConsultantsSignature"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_art_summary_ConsultantsSignature"></slot></span>
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
    ew.applyTemplate("tpd_ivf_art_summaryview", "tpm_ivf_art_summaryview", "ivf_art_summaryview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    document.getElementById("x_M2").style.width="180px",document.getElementById("x_M1").style.width="180px",document.getElementById("x_Normal2PN").style.width="180px",document.getElementById("x_Mi2").style.width="180px",document.getElementById("x_GV").style.width="180px",document.getElementById("x_Abnormalfertilisation1N").style.width="180px",document.getElementById("x_Others").style.width="180px",document.getElementById("x_Abnormalfertilisation3N").style.width="180px",document.getElementById("x_ICSI").style.width="180px",document.getElementById("x_NotFertilized").style.width="180px",document.getElementById("x_IVF").style.width="180px",document.getElementById("x_Degenerated").style.width="180px",document.getElementById("x_pre_Concentration").style.width="180px",document.getElementById("x_post_Concentration").style.width="180px",document.getElementById("x_pre_Motility").style.width="180px",document.getElementById("x_post_Motility").style.width="180px",document.getElementById("x_pre_Morphology").style.width="180px",document.getElementById("x_post_Morphology").style.width="180px",document.getElementById("x_Volume").style.width="180px",document.getElementById("x_Volume1").style.width="180px",document.getElementById("x_Volume2").style.width="180px",document.getElementById("x_Concentration2").style.width="180px",document.getElementById("x_Total").style.width="180px",document.getElementById("x_Total1").style.width="180px",document.getElementById("x_Total2").style.width="180px",document.getElementById("x_Progressive").style.width="180px",document.getElementById("x_Progressive1").style.width="180px",document.getElementById("x_Progressive2").style.width="180px",document.getElementById("x_NotProgressive").style.width="180px",document.getElementById("x_NotProgressive1").style.width="180px",document.getElementById("x_NotProgressive2").style.width="180px",document.getElementById("x_Motility2").style.width="180px",document.getElementById("x_Morphology2").style.width="180px",document.getElementById("x_Code1").style.width="180px",document.getElementById("x_Day1").style.width="180px",document.getElementById("x_CellStage1").style.width="180px",document.getElementById("x_Grade1").style.width="180px",document.getElementById("x_State1").style.width="180px",document.getElementById("x_Code2").style.width="180px",document.getElementById("x_Day2").style.width="180px",document.getElementById("x_CellStage2").style.width="180px",document.getElementById("x_Grade2").style.width="180px",document.getElementById("x_State2").style.width="180px",document.getElementById("x_Code3").style.width="180px",document.getElementById("x_Day3").style.width="180px",document.getElementById("x_CellStage3").style.width="180px",document.getElementById("x_Grade3").style.width="180px",document.getElementById("x_State3").style.width="180px",document.getElementById("x_Code4").style.width="180px",document.getElementById("x_Day4").style.width="180px",document.getElementById("x_CellStage4").style.width="180px",document.getElementById("x_Grade4").style.width="180px",document.getElementById("x_State4").style.width="180px",document.getElementById("x_Code5").style.width="180px",document.getElementById("x_Day5").style.width="180px",document.getElementById("x_CellStage5").style.width="180px",document.getElementById("x_Grade5").style.width="180px",document.getElementById("x_State5").style.width="180px";
});
</script>
<?php } ?>

<?php

namespace PHPMaker2021\project3;

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
<form name="fivf_art_summaryview" id="fivf_art_summaryview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_art_summary">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_ivf_art_summary_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
    <tr id="r_IVFRegistrationID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_IVFRegistrationID"><?= $Page->IVFRegistrationID->caption() ?></span></td>
        <td data-name="IVFRegistrationID" <?= $Page->IVFRegistrationID->cellAttributes() ?>>
<span id="el_ivf_art_summary_IVFRegistrationID">
<span<?= $Page->IVFRegistrationID->viewAttributes() ?>>
<?= $Page->IVFRegistrationID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
    <tr id="r_ARTCycle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_ARTCycle"><?= $Page->ARTCycle->caption() ?></span></td>
        <td data-name="ARTCycle" <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el_ivf_art_summary_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Spermorigin->Visible) { // Spermorigin ?>
    <tr id="r_Spermorigin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Spermorigin"><?= $Page->Spermorigin->caption() ?></span></td>
        <td data-name="Spermorigin" <?= $Page->Spermorigin->cellAttributes() ?>>
<span id="el_ivf_art_summary_Spermorigin">
<span<?= $Page->Spermorigin->viewAttributes() ?>>
<?= $Page->Spermorigin->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
    <tr id="r_InseminatinTechnique">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_InseminatinTechnique"><?= $Page->InseminatinTechnique->caption() ?></span></td>
        <td data-name="InseminatinTechnique" <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<span id="el_ivf_art_summary_InseminatinTechnique">
<span<?= $Page->InseminatinTechnique->viewAttributes() ?>>
<?= $Page->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IndicationforART->Visible) { // IndicationforART ?>
    <tr id="r_IndicationforART">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_IndicationforART"><?= $Page->IndicationforART->caption() ?></span></td>
        <td data-name="IndicationforART" <?= $Page->IndicationforART->cellAttributes() ?>>
<span id="el_ivf_art_summary_IndicationforART">
<span<?= $Page->IndicationforART->viewAttributes() ?>>
<?= $Page->IndicationforART->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ICSIDetails->Visible) { // ICSIDetails ?>
    <tr id="r_ICSIDetails">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_ICSIDetails"><?= $Page->ICSIDetails->caption() ?></span></td>
        <td data-name="ICSIDetails" <?= $Page->ICSIDetails->cellAttributes() ?>>
<span id="el_ivf_art_summary_ICSIDetails">
<span<?= $Page->ICSIDetails->viewAttributes() ?>>
<?= $Page->ICSIDetails->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DateofICSI->Visible) { // DateofICSI ?>
    <tr id="r_DateofICSI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_DateofICSI"><?= $Page->DateofICSI->caption() ?></span></td>
        <td data-name="DateofICSI" <?= $Page->DateofICSI->cellAttributes() ?>>
<span id="el_ivf_art_summary_DateofICSI">
<span<?= $Page->DateofICSI->viewAttributes() ?>>
<?= $Page->DateofICSI->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
    <tr id="r_Origin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Origin"><?= $Page->Origin->caption() ?></span></td>
        <td data-name="Origin" <?= $Page->Origin->cellAttributes() ?>>
<span id="el_ivf_art_summary_Origin">
<span<?= $Page->Origin->viewAttributes() ?>>
<?= $Page->Origin->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <tr id="r_Status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Status"><?= $Page->Status->caption() ?></span></td>
        <td data-name="Status" <?= $Page->Status->cellAttributes() ?>>
<span id="el_ivf_art_summary_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <tr id="r_Method">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Method"><?= $Page->Method->caption() ?></span></td>
        <td data-name="Method" <?= $Page->Method->cellAttributes() ?>>
<span id="el_ivf_art_summary_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pre_Concentration->Visible) { // pre_Concentration ?>
    <tr id="r_pre_Concentration">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_pre_Concentration"><?= $Page->pre_Concentration->caption() ?></span></td>
        <td data-name="pre_Concentration" <?= $Page->pre_Concentration->cellAttributes() ?>>
<span id="el_ivf_art_summary_pre_Concentration">
<span<?= $Page->pre_Concentration->viewAttributes() ?>>
<?= $Page->pre_Concentration->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pre_Motility->Visible) { // pre_Motility ?>
    <tr id="r_pre_Motility">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_pre_Motility"><?= $Page->pre_Motility->caption() ?></span></td>
        <td data-name="pre_Motility" <?= $Page->pre_Motility->cellAttributes() ?>>
<span id="el_ivf_art_summary_pre_Motility">
<span<?= $Page->pre_Motility->viewAttributes() ?>>
<?= $Page->pre_Motility->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pre_Morphology->Visible) { // pre_Morphology ?>
    <tr id="r_pre_Morphology">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_pre_Morphology"><?= $Page->pre_Morphology->caption() ?></span></td>
        <td data-name="pre_Morphology" <?= $Page->pre_Morphology->cellAttributes() ?>>
<span id="el_ivf_art_summary_pre_Morphology">
<span<?= $Page->pre_Morphology->viewAttributes() ?>>
<?= $Page->pre_Morphology->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->post_Concentration->Visible) { // post_Concentration ?>
    <tr id="r_post_Concentration">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_post_Concentration"><?= $Page->post_Concentration->caption() ?></span></td>
        <td data-name="post_Concentration" <?= $Page->post_Concentration->cellAttributes() ?>>
<span id="el_ivf_art_summary_post_Concentration">
<span<?= $Page->post_Concentration->viewAttributes() ?>>
<?= $Page->post_Concentration->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->post_Motility->Visible) { // post_Motility ?>
    <tr id="r_post_Motility">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_post_Motility"><?= $Page->post_Motility->caption() ?></span></td>
        <td data-name="post_Motility" <?= $Page->post_Motility->cellAttributes() ?>>
<span id="el_ivf_art_summary_post_Motility">
<span<?= $Page->post_Motility->viewAttributes() ?>>
<?= $Page->post_Motility->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->post_Morphology->Visible) { // post_Morphology ?>
    <tr id="r_post_Morphology">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_post_Morphology"><?= $Page->post_Morphology->caption() ?></span></td>
        <td data-name="post_Morphology" <?= $Page->post_Morphology->cellAttributes() ?>>
<span id="el_ivf_art_summary_post_Morphology">
<span<?= $Page->post_Morphology->viewAttributes() ?>>
<?= $Page->post_Morphology->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DateofET->Visible) { // DateofET ?>
    <tr id="r_DateofET">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_DateofET"><?= $Page->DateofET->caption() ?></span></td>
        <td data-name="DateofET" <?= $Page->DateofET->cellAttributes() ?>>
<span id="el_ivf_art_summary_DateofET">
<span<?= $Page->DateofET->viewAttributes() ?>>
<?= $Page->DateofET->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
    <tr id="r_NumberofEmbryostransferred">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NumberofEmbryostransferred"><?= $Page->NumberofEmbryostransferred->caption() ?></span></td>
        <td data-name="NumberofEmbryostransferred" <?= $Page->NumberofEmbryostransferred->cellAttributes() ?>>
<span id="el_ivf_art_summary_NumberofEmbryostransferred">
<span<?= $Page->NumberofEmbryostransferred->viewAttributes() ?>>
<?= $Page->NumberofEmbryostransferred->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
    <tr id="r_Reasonfornotranfer">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Reasonfornotranfer"><?= $Page->Reasonfornotranfer->caption() ?></span></td>
        <td data-name="Reasonfornotranfer" <?= $Page->Reasonfornotranfer->cellAttributes() ?>>
<span id="el_ivf_art_summary_Reasonfornotranfer">
<span<?= $Page->Reasonfornotranfer->viewAttributes() ?>>
<?= $Page->Reasonfornotranfer->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
    <tr id="r_Embryosunderobservation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Embryosunderobservation"><?= $Page->Embryosunderobservation->caption() ?></span></td>
        <td data-name="Embryosunderobservation" <?= $Page->Embryosunderobservation->cellAttributes() ?>>
<span id="el_ivf_art_summary_Embryosunderobservation">
<span<?= $Page->Embryosunderobservation->viewAttributes() ?>>
<?= $Page->Embryosunderobservation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
    <tr id="r_EmbryosCryopreserved">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_EmbryosCryopreserved"><?= $Page->EmbryosCryopreserved->caption() ?></span></td>
        <td data-name="EmbryosCryopreserved" <?= $Page->EmbryosCryopreserved->cellAttributes() ?>>
<span id="el_ivf_art_summary_EmbryosCryopreserved">
<span<?= $Page->EmbryosCryopreserved->viewAttributes() ?>>
<?= $Page->EmbryosCryopreserved->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
    <tr id="r_EmbryoDevelopmentSummary">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_EmbryoDevelopmentSummary"><?= $Page->EmbryoDevelopmentSummary->caption() ?></span></td>
        <td data-name="EmbryoDevelopmentSummary" <?= $Page->EmbryoDevelopmentSummary->cellAttributes() ?>>
<span id="el_ivf_art_summary_EmbryoDevelopmentSummary">
<span<?= $Page->EmbryoDevelopmentSummary->viewAttributes() ?>>
<?= $Page->EmbryoDevelopmentSummary->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LegendCellStage->Visible) { // LegendCellStage ?>
    <tr id="r_LegendCellStage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_LegendCellStage"><?= $Page->LegendCellStage->caption() ?></span></td>
        <td data-name="LegendCellStage" <?= $Page->LegendCellStage->cellAttributes() ?>>
<span id="el_ivf_art_summary_LegendCellStage">
<span<?= $Page->LegendCellStage->viewAttributes() ?>>
<?= $Page->LegendCellStage->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
    <tr id="r_EmbryologistSignature">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_EmbryologistSignature"><?= $Page->EmbryologistSignature->caption() ?></span></td>
        <td data-name="EmbryologistSignature" <?= $Page->EmbryologistSignature->cellAttributes() ?>>
<span id="el_ivf_art_summary_EmbryologistSignature">
<span<?= $Page->EmbryologistSignature->viewAttributes() ?>>
<?= $Page->EmbryologistSignature->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
    <tr id="r_ConsultantsSignature">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_ConsultantsSignature"><?= $Page->ConsultantsSignature->caption() ?></span></td>
        <td data-name="ConsultantsSignature" <?= $Page->ConsultantsSignature->cellAttributes() ?>>
<span id="el_ivf_art_summary_ConsultantsSignature">
<span<?= $Page->ConsultantsSignature->viewAttributes() ?>>
<?= $Page->ConsultantsSignature->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Name"><?= $Page->Name->caption() ?></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el_ivf_art_summary_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->M2->Visible) { // M2 ?>
    <tr id="r_M2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_M2"><?= $Page->M2->caption() ?></span></td>
        <td data-name="M2" <?= $Page->M2->cellAttributes() ?>>
<span id="el_ivf_art_summary_M2">
<span<?= $Page->M2->viewAttributes() ?>>
<?= $Page->M2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mi2->Visible) { // Mi2 ?>
    <tr id="r_Mi2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Mi2"><?= $Page->Mi2->caption() ?></span></td>
        <td data-name="Mi2" <?= $Page->Mi2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Mi2">
<span<?= $Page->Mi2->viewAttributes() ?>>
<?= $Page->Mi2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ICSI->Visible) { // ICSI ?>
    <tr id="r_ICSI">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_ICSI"><?= $Page->ICSI->caption() ?></span></td>
        <td data-name="ICSI" <?= $Page->ICSI->cellAttributes() ?>>
<span id="el_ivf_art_summary_ICSI">
<span<?= $Page->ICSI->viewAttributes() ?>>
<?= $Page->ICSI->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IVF->Visible) { // IVF ?>
    <tr id="r_IVF">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_IVF"><?= $Page->IVF->caption() ?></span></td>
        <td data-name="IVF" <?= $Page->IVF->cellAttributes() ?>>
<span id="el_ivf_art_summary_IVF">
<span<?= $Page->IVF->viewAttributes() ?>>
<?= $Page->IVF->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->M1->Visible) { // M1 ?>
    <tr id="r_M1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_M1"><?= $Page->M1->caption() ?></span></td>
        <td data-name="M1" <?= $Page->M1->cellAttributes() ?>>
<span id="el_ivf_art_summary_M1">
<span<?= $Page->M1->viewAttributes() ?>>
<?= $Page->M1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GV->Visible) { // GV ?>
    <tr id="r_GV">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_GV"><?= $Page->GV->caption() ?></span></td>
        <td data-name="GV" <?= $Page->GV->cellAttributes() ?>>
<span id="el_ivf_art_summary_GV">
<span<?= $Page->GV->viewAttributes() ?>>
<?= $Page->GV->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_Others->Visible) { // Others ?>
    <tr id="r__Others">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary__Others"><?= $Page->_Others->caption() ?></span></td>
        <td data-name="_Others" <?= $Page->_Others->cellAttributes() ?>>
<span id="el_ivf_art_summary__Others">
<span<?= $Page->_Others->viewAttributes() ?>>
<?= $Page->_Others->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Normal2PN->Visible) { // Normal2PN ?>
    <tr id="r_Normal2PN">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Normal2PN"><?= $Page->Normal2PN->caption() ?></span></td>
        <td data-name="Normal2PN" <?= $Page->Normal2PN->cellAttributes() ?>>
<span id="el_ivf_art_summary_Normal2PN">
<span<?= $Page->Normal2PN->viewAttributes() ?>>
<?= $Page->Normal2PN->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
    <tr id="r_Abnormalfertilisation1N">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Abnormalfertilisation1N"><?= $Page->Abnormalfertilisation1N->caption() ?></span></td>
        <td data-name="Abnormalfertilisation1N" <?= $Page->Abnormalfertilisation1N->cellAttributes() ?>>
<span id="el_ivf_art_summary_Abnormalfertilisation1N">
<span<?= $Page->Abnormalfertilisation1N->viewAttributes() ?>>
<?= $Page->Abnormalfertilisation1N->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
    <tr id="r_Abnormalfertilisation3N">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Abnormalfertilisation3N"><?= $Page->Abnormalfertilisation3N->caption() ?></span></td>
        <td data-name="Abnormalfertilisation3N" <?= $Page->Abnormalfertilisation3N->cellAttributes() ?>>
<span id="el_ivf_art_summary_Abnormalfertilisation3N">
<span<?= $Page->Abnormalfertilisation3N->viewAttributes() ?>>
<?= $Page->Abnormalfertilisation3N->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NotFertilized->Visible) { // NotFertilized ?>
    <tr id="r_NotFertilized">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NotFertilized"><?= $Page->NotFertilized->caption() ?></span></td>
        <td data-name="NotFertilized" <?= $Page->NotFertilized->cellAttributes() ?>>
<span id="el_ivf_art_summary_NotFertilized">
<span<?= $Page->NotFertilized->viewAttributes() ?>>
<?= $Page->NotFertilized->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Degenerated->Visible) { // Degenerated ?>
    <tr id="r_Degenerated">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Degenerated"><?= $Page->Degenerated->caption() ?></span></td>
        <td data-name="Degenerated" <?= $Page->Degenerated->cellAttributes() ?>>
<span id="el_ivf_art_summary_Degenerated">
<span<?= $Page->Degenerated->viewAttributes() ?>>
<?= $Page->Degenerated->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SpermDate->Visible) { // SpermDate ?>
    <tr id="r_SpermDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_SpermDate"><?= $Page->SpermDate->caption() ?></span></td>
        <td data-name="SpermDate" <?= $Page->SpermDate->cellAttributes() ?>>
<span id="el_ivf_art_summary_SpermDate">
<span<?= $Page->SpermDate->viewAttributes() ?>>
<?= $Page->SpermDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Code1->Visible) { // Code1 ?>
    <tr id="r_Code1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code1"><?= $Page->Code1->caption() ?></span></td>
        <td data-name="Code1" <?= $Page->Code1->cellAttributes() ?>>
<span id="el_ivf_art_summary_Code1">
<span<?= $Page->Code1->viewAttributes() ?>>
<?= $Page->Code1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day1->Visible) { // Day1 ?>
    <tr id="r_Day1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day1"><?= $Page->Day1->caption() ?></span></td>
        <td data-name="Day1" <?= $Page->Day1->cellAttributes() ?>>
<span id="el_ivf_art_summary_Day1">
<span<?= $Page->Day1->viewAttributes() ?>>
<?= $Page->Day1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CellStage1->Visible) { // CellStage1 ?>
    <tr id="r_CellStage1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage1"><?= $Page->CellStage1->caption() ?></span></td>
        <td data-name="CellStage1" <?= $Page->CellStage1->cellAttributes() ?>>
<span id="el_ivf_art_summary_CellStage1">
<span<?= $Page->CellStage1->viewAttributes() ?>>
<?= $Page->CellStage1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Grade1->Visible) { // Grade1 ?>
    <tr id="r_Grade1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade1"><?= $Page->Grade1->caption() ?></span></td>
        <td data-name="Grade1" <?= $Page->Grade1->cellAttributes() ?>>
<span id="el_ivf_art_summary_Grade1">
<span<?= $Page->Grade1->viewAttributes() ?>>
<?= $Page->Grade1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State1->Visible) { // State1 ?>
    <tr id="r_State1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State1"><?= $Page->State1->caption() ?></span></td>
        <td data-name="State1" <?= $Page->State1->cellAttributes() ?>>
<span id="el_ivf_art_summary_State1">
<span<?= $Page->State1->viewAttributes() ?>>
<?= $Page->State1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Code2->Visible) { // Code2 ?>
    <tr id="r_Code2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code2"><?= $Page->Code2->caption() ?></span></td>
        <td data-name="Code2" <?= $Page->Code2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Code2">
<span<?= $Page->Code2->viewAttributes() ?>>
<?= $Page->Code2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day2->Visible) { // Day2 ?>
    <tr id="r_Day2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day2"><?= $Page->Day2->caption() ?></span></td>
        <td data-name="Day2" <?= $Page->Day2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Day2">
<span<?= $Page->Day2->viewAttributes() ?>>
<?= $Page->Day2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CellStage2->Visible) { // CellStage2 ?>
    <tr id="r_CellStage2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage2"><?= $Page->CellStage2->caption() ?></span></td>
        <td data-name="CellStage2" <?= $Page->CellStage2->cellAttributes() ?>>
<span id="el_ivf_art_summary_CellStage2">
<span<?= $Page->CellStage2->viewAttributes() ?>>
<?= $Page->CellStage2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Grade2->Visible) { // Grade2 ?>
    <tr id="r_Grade2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade2"><?= $Page->Grade2->caption() ?></span></td>
        <td data-name="Grade2" <?= $Page->Grade2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Grade2">
<span<?= $Page->Grade2->viewAttributes() ?>>
<?= $Page->Grade2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State2->Visible) { // State2 ?>
    <tr id="r_State2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State2"><?= $Page->State2->caption() ?></span></td>
        <td data-name="State2" <?= $Page->State2->cellAttributes() ?>>
<span id="el_ivf_art_summary_State2">
<span<?= $Page->State2->viewAttributes() ?>>
<?= $Page->State2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Code3->Visible) { // Code3 ?>
    <tr id="r_Code3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code3"><?= $Page->Code3->caption() ?></span></td>
        <td data-name="Code3" <?= $Page->Code3->cellAttributes() ?>>
<span id="el_ivf_art_summary_Code3">
<span<?= $Page->Code3->viewAttributes() ?>>
<?= $Page->Code3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day3->Visible) { // Day3 ?>
    <tr id="r_Day3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day3"><?= $Page->Day3->caption() ?></span></td>
        <td data-name="Day3" <?= $Page->Day3->cellAttributes() ?>>
<span id="el_ivf_art_summary_Day3">
<span<?= $Page->Day3->viewAttributes() ?>>
<?= $Page->Day3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CellStage3->Visible) { // CellStage3 ?>
    <tr id="r_CellStage3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage3"><?= $Page->CellStage3->caption() ?></span></td>
        <td data-name="CellStage3" <?= $Page->CellStage3->cellAttributes() ?>>
<span id="el_ivf_art_summary_CellStage3">
<span<?= $Page->CellStage3->viewAttributes() ?>>
<?= $Page->CellStage3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Grade3->Visible) { // Grade3 ?>
    <tr id="r_Grade3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade3"><?= $Page->Grade3->caption() ?></span></td>
        <td data-name="Grade3" <?= $Page->Grade3->cellAttributes() ?>>
<span id="el_ivf_art_summary_Grade3">
<span<?= $Page->Grade3->viewAttributes() ?>>
<?= $Page->Grade3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State3->Visible) { // State3 ?>
    <tr id="r_State3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State3"><?= $Page->State3->caption() ?></span></td>
        <td data-name="State3" <?= $Page->State3->cellAttributes() ?>>
<span id="el_ivf_art_summary_State3">
<span<?= $Page->State3->viewAttributes() ?>>
<?= $Page->State3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Code4->Visible) { // Code4 ?>
    <tr id="r_Code4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code4"><?= $Page->Code4->caption() ?></span></td>
        <td data-name="Code4" <?= $Page->Code4->cellAttributes() ?>>
<span id="el_ivf_art_summary_Code4">
<span<?= $Page->Code4->viewAttributes() ?>>
<?= $Page->Code4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day4->Visible) { // Day4 ?>
    <tr id="r_Day4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day4"><?= $Page->Day4->caption() ?></span></td>
        <td data-name="Day4" <?= $Page->Day4->cellAttributes() ?>>
<span id="el_ivf_art_summary_Day4">
<span<?= $Page->Day4->viewAttributes() ?>>
<?= $Page->Day4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CellStage4->Visible) { // CellStage4 ?>
    <tr id="r_CellStage4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage4"><?= $Page->CellStage4->caption() ?></span></td>
        <td data-name="CellStage4" <?= $Page->CellStage4->cellAttributes() ?>>
<span id="el_ivf_art_summary_CellStage4">
<span<?= $Page->CellStage4->viewAttributes() ?>>
<?= $Page->CellStage4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Grade4->Visible) { // Grade4 ?>
    <tr id="r_Grade4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade4"><?= $Page->Grade4->caption() ?></span></td>
        <td data-name="Grade4" <?= $Page->Grade4->cellAttributes() ?>>
<span id="el_ivf_art_summary_Grade4">
<span<?= $Page->Grade4->viewAttributes() ?>>
<?= $Page->Grade4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State4->Visible) { // State4 ?>
    <tr id="r_State4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State4"><?= $Page->State4->caption() ?></span></td>
        <td data-name="State4" <?= $Page->State4->cellAttributes() ?>>
<span id="el_ivf_art_summary_State4">
<span<?= $Page->State4->viewAttributes() ?>>
<?= $Page->State4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Code5->Visible) { // Code5 ?>
    <tr id="r_Code5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Code5"><?= $Page->Code5->caption() ?></span></td>
        <td data-name="Code5" <?= $Page->Code5->cellAttributes() ?>>
<span id="el_ivf_art_summary_Code5">
<span<?= $Page->Code5->viewAttributes() ?>>
<?= $Page->Code5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Day5->Visible) { // Day5 ?>
    <tr id="r_Day5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Day5"><?= $Page->Day5->caption() ?></span></td>
        <td data-name="Day5" <?= $Page->Day5->cellAttributes() ?>>
<span id="el_ivf_art_summary_Day5">
<span<?= $Page->Day5->viewAttributes() ?>>
<?= $Page->Day5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CellStage5->Visible) { // CellStage5 ?>
    <tr id="r_CellStage5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_CellStage5"><?= $Page->CellStage5->caption() ?></span></td>
        <td data-name="CellStage5" <?= $Page->CellStage5->cellAttributes() ?>>
<span id="el_ivf_art_summary_CellStage5">
<span<?= $Page->CellStage5->viewAttributes() ?>>
<?= $Page->CellStage5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Grade5->Visible) { // Grade5 ?>
    <tr id="r_Grade5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Grade5"><?= $Page->Grade5->caption() ?></span></td>
        <td data-name="Grade5" <?= $Page->Grade5->cellAttributes() ?>>
<span id="el_ivf_art_summary_Grade5">
<span<?= $Page->Grade5->viewAttributes() ?>>
<?= $Page->Grade5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->State5->Visible) { // State5 ?>
    <tr id="r_State5">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_State5"><?= $Page->State5->caption() ?></span></td>
        <td data-name="State5" <?= $Page->State5->cellAttributes() ?>>
<span id="el_ivf_art_summary_State5">
<span<?= $Page->State5->viewAttributes() ?>>
<?= $Page->State5->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_TidNo"><?= $Page->TidNo->caption() ?></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el_ivf_art_summary_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <tr id="r_RIDNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_RIDNo"><?= $Page->RIDNo->caption() ?></span></td>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_ivf_art_summary_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
    <tr id="r_Volume">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Volume"><?= $Page->Volume->caption() ?></span></td>
        <td data-name="Volume" <?= $Page->Volume->cellAttributes() ?>>
<span id="el_ivf_art_summary_Volume">
<span<?= $Page->Volume->viewAttributes() ?>>
<?= $Page->Volume->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Volume1->Visible) { // Volume1 ?>
    <tr id="r_Volume1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Volume1"><?= $Page->Volume1->caption() ?></span></td>
        <td data-name="Volume1" <?= $Page->Volume1->cellAttributes() ?>>
<span id="el_ivf_art_summary_Volume1">
<span<?= $Page->Volume1->viewAttributes() ?>>
<?= $Page->Volume1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Volume2->Visible) { // Volume2 ?>
    <tr id="r_Volume2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Volume2"><?= $Page->Volume2->caption() ?></span></td>
        <td data-name="Volume2" <?= $Page->Volume2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Volume2">
<span<?= $Page->Volume2->viewAttributes() ?>>
<?= $Page->Volume2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Concentration2->Visible) { // Concentration2 ?>
    <tr id="r_Concentration2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Concentration2"><?= $Page->Concentration2->caption() ?></span></td>
        <td data-name="Concentration2" <?= $Page->Concentration2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Concentration2">
<span<?= $Page->Concentration2->viewAttributes() ?>>
<?= $Page->Concentration2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
    <tr id="r_Total">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Total"><?= $Page->Total->caption() ?></span></td>
        <td data-name="Total" <?= $Page->Total->cellAttributes() ?>>
<span id="el_ivf_art_summary_Total">
<span<?= $Page->Total->viewAttributes() ?>>
<?= $Page->Total->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Total1->Visible) { // Total1 ?>
    <tr id="r_Total1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Total1"><?= $Page->Total1->caption() ?></span></td>
        <td data-name="Total1" <?= $Page->Total1->cellAttributes() ?>>
<span id="el_ivf_art_summary_Total1">
<span<?= $Page->Total1->viewAttributes() ?>>
<?= $Page->Total1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Total2->Visible) { // Total2 ?>
    <tr id="r_Total2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Total2"><?= $Page->Total2->caption() ?></span></td>
        <td data-name="Total2" <?= $Page->Total2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Total2">
<span<?= $Page->Total2->viewAttributes() ?>>
<?= $Page->Total2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Progressive->Visible) { // Progressive ?>
    <tr id="r_Progressive">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Progressive"><?= $Page->Progressive->caption() ?></span></td>
        <td data-name="Progressive" <?= $Page->Progressive->cellAttributes() ?>>
<span id="el_ivf_art_summary_Progressive">
<span<?= $Page->Progressive->viewAttributes() ?>>
<?= $Page->Progressive->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Progressive1->Visible) { // Progressive1 ?>
    <tr id="r_Progressive1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Progressive1"><?= $Page->Progressive1->caption() ?></span></td>
        <td data-name="Progressive1" <?= $Page->Progressive1->cellAttributes() ?>>
<span id="el_ivf_art_summary_Progressive1">
<span<?= $Page->Progressive1->viewAttributes() ?>>
<?= $Page->Progressive1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Progressive2->Visible) { // Progressive2 ?>
    <tr id="r_Progressive2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Progressive2"><?= $Page->Progressive2->caption() ?></span></td>
        <td data-name="Progressive2" <?= $Page->Progressive2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Progressive2">
<span<?= $Page->Progressive2->viewAttributes() ?>>
<?= $Page->Progressive2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NotProgressive->Visible) { // NotProgressive ?>
    <tr id="r_NotProgressive">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NotProgressive"><?= $Page->NotProgressive->caption() ?></span></td>
        <td data-name="NotProgressive" <?= $Page->NotProgressive->cellAttributes() ?>>
<span id="el_ivf_art_summary_NotProgressive">
<span<?= $Page->NotProgressive->viewAttributes() ?>>
<?= $Page->NotProgressive->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NotProgressive1->Visible) { // NotProgressive1 ?>
    <tr id="r_NotProgressive1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NotProgressive1"><?= $Page->NotProgressive1->caption() ?></span></td>
        <td data-name="NotProgressive1" <?= $Page->NotProgressive1->cellAttributes() ?>>
<span id="el_ivf_art_summary_NotProgressive1">
<span<?= $Page->NotProgressive1->viewAttributes() ?>>
<?= $Page->NotProgressive1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NotProgressive2->Visible) { // NotProgressive2 ?>
    <tr id="r_NotProgressive2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_NotProgressive2"><?= $Page->NotProgressive2->caption() ?></span></td>
        <td data-name="NotProgressive2" <?= $Page->NotProgressive2->cellAttributes() ?>>
<span id="el_ivf_art_summary_NotProgressive2">
<span<?= $Page->NotProgressive2->viewAttributes() ?>>
<?= $Page->NotProgressive2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Motility2->Visible) { // Motility2 ?>
    <tr id="r_Motility2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Motility2"><?= $Page->Motility2->caption() ?></span></td>
        <td data-name="Motility2" <?= $Page->Motility2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Motility2">
<span<?= $Page->Motility2->viewAttributes() ?>>
<?= $Page->Motility2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Morphology2->Visible) { // Morphology2 ?>
    <tr id="r_Morphology2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_art_summary_Morphology2"><?= $Page->Morphology2->caption() ?></span></td>
        <td data-name="Morphology2" <?= $Page->Morphology2->cellAttributes() ?>>
<span id="el_ivf_art_summary_Morphology2">
<span<?= $Page->Morphology2->viewAttributes() ?>>
<?= $Page->Morphology2->getViewValue() ?></span>
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

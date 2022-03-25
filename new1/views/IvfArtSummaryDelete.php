<?php

namespace PHPMaker2021\project3;

// Page object
$IvfArtSummaryDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_art_summarydelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fivf_art_summarydelete = currentForm = new ew.Form("fivf_art_summarydelete", "delete");
    loadjs.done("fivf_art_summarydelete");
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
<form name="fivf_art_summarydelete" id="fivf_art_summarydelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_art_summary">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id->Visible) { // id ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ivf_art_summary_id" class="ivf_art_summary_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
        <th class="<?= $Page->IVFRegistrationID->headerCellClass() ?>"><span id="elh_ivf_art_summary_IVFRegistrationID" class="ivf_art_summary_IVFRegistrationID"><?= $Page->IVFRegistrationID->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <th class="<?= $Page->ARTCycle->headerCellClass() ?>"><span id="elh_ivf_art_summary_ARTCycle" class="ivf_art_summary_ARTCycle"><?= $Page->ARTCycle->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Spermorigin->Visible) { // Spermorigin ?>
        <th class="<?= $Page->Spermorigin->headerCellClass() ?>"><span id="elh_ivf_art_summary_Spermorigin" class="ivf_art_summary_Spermorigin"><?= $Page->Spermorigin->caption() ?></span></th>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <th class="<?= $Page->InseminatinTechnique->headerCellClass() ?>"><span id="elh_ivf_art_summary_InseminatinTechnique" class="ivf_art_summary_InseminatinTechnique"><?= $Page->InseminatinTechnique->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IndicationforART->Visible) { // IndicationforART ?>
        <th class="<?= $Page->IndicationforART->headerCellClass() ?>"><span id="elh_ivf_art_summary_IndicationforART" class="ivf_art_summary_IndicationforART"><?= $Page->IndicationforART->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ICSIDetails->Visible) { // ICSIDetails ?>
        <th class="<?= $Page->ICSIDetails->headerCellClass() ?>"><span id="elh_ivf_art_summary_ICSIDetails" class="ivf_art_summary_ICSIDetails"><?= $Page->ICSIDetails->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DateofICSI->Visible) { // DateofICSI ?>
        <th class="<?= $Page->DateofICSI->headerCellClass() ?>"><span id="elh_ivf_art_summary_DateofICSI" class="ivf_art_summary_DateofICSI"><?= $Page->DateofICSI->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
        <th class="<?= $Page->Origin->headerCellClass() ?>"><span id="elh_ivf_art_summary_Origin" class="ivf_art_summary_Origin"><?= $Page->Origin->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
        <th class="<?= $Page->Status->headerCellClass() ?>"><span id="elh_ivf_art_summary_Status" class="ivf_art_summary_Status"><?= $Page->Status->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <th class="<?= $Page->Method->headerCellClass() ?>"><span id="elh_ivf_art_summary_Method" class="ivf_art_summary_Method"><?= $Page->Method->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pre_Concentration->Visible) { // pre_Concentration ?>
        <th class="<?= $Page->pre_Concentration->headerCellClass() ?>"><span id="elh_ivf_art_summary_pre_Concentration" class="ivf_art_summary_pre_Concentration"><?= $Page->pre_Concentration->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pre_Motility->Visible) { // pre_Motility ?>
        <th class="<?= $Page->pre_Motility->headerCellClass() ?>"><span id="elh_ivf_art_summary_pre_Motility" class="ivf_art_summary_pre_Motility"><?= $Page->pre_Motility->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pre_Morphology->Visible) { // pre_Morphology ?>
        <th class="<?= $Page->pre_Morphology->headerCellClass() ?>"><span id="elh_ivf_art_summary_pre_Morphology" class="ivf_art_summary_pre_Morphology"><?= $Page->pre_Morphology->caption() ?></span></th>
<?php } ?>
<?php if ($Page->post_Concentration->Visible) { // post_Concentration ?>
        <th class="<?= $Page->post_Concentration->headerCellClass() ?>"><span id="elh_ivf_art_summary_post_Concentration" class="ivf_art_summary_post_Concentration"><?= $Page->post_Concentration->caption() ?></span></th>
<?php } ?>
<?php if ($Page->post_Motility->Visible) { // post_Motility ?>
        <th class="<?= $Page->post_Motility->headerCellClass() ?>"><span id="elh_ivf_art_summary_post_Motility" class="ivf_art_summary_post_Motility"><?= $Page->post_Motility->caption() ?></span></th>
<?php } ?>
<?php if ($Page->post_Morphology->Visible) { // post_Morphology ?>
        <th class="<?= $Page->post_Morphology->headerCellClass() ?>"><span id="elh_ivf_art_summary_post_Morphology" class="ivf_art_summary_post_Morphology"><?= $Page->post_Morphology->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DateofET->Visible) { // DateofET ?>
        <th class="<?= $Page->DateofET->headerCellClass() ?>"><span id="elh_ivf_art_summary_DateofET" class="ivf_art_summary_DateofET"><?= $Page->DateofET->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
        <th class="<?= $Page->NumberofEmbryostransferred->headerCellClass() ?>"><span id="elh_ivf_art_summary_NumberofEmbryostransferred" class="ivf_art_summary_NumberofEmbryostransferred"><?= $Page->NumberofEmbryostransferred->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
        <th class="<?= $Page->Reasonfornotranfer->headerCellClass() ?>"><span id="elh_ivf_art_summary_Reasonfornotranfer" class="ivf_art_summary_Reasonfornotranfer"><?= $Page->Reasonfornotranfer->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
        <th class="<?= $Page->Embryosunderobservation->headerCellClass() ?>"><span id="elh_ivf_art_summary_Embryosunderobservation" class="ivf_art_summary_Embryosunderobservation"><?= $Page->Embryosunderobservation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
        <th class="<?= $Page->EmbryosCryopreserved->headerCellClass() ?>"><span id="elh_ivf_art_summary_EmbryosCryopreserved" class="ivf_art_summary_EmbryosCryopreserved"><?= $Page->EmbryosCryopreserved->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
        <th class="<?= $Page->EmbryoDevelopmentSummary->headerCellClass() ?>"><span id="elh_ivf_art_summary_EmbryoDevelopmentSummary" class="ivf_art_summary_EmbryoDevelopmentSummary"><?= $Page->EmbryoDevelopmentSummary->caption() ?></span></th>
<?php } ?>
<?php if ($Page->LegendCellStage->Visible) { // LegendCellStage ?>
        <th class="<?= $Page->LegendCellStage->headerCellClass() ?>"><span id="elh_ivf_art_summary_LegendCellStage" class="ivf_art_summary_LegendCellStage"><?= $Page->LegendCellStage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
        <th class="<?= $Page->EmbryologistSignature->headerCellClass() ?>"><span id="elh_ivf_art_summary_EmbryologistSignature" class="ivf_art_summary_EmbryologistSignature"><?= $Page->EmbryologistSignature->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
        <th class="<?= $Page->ConsultantsSignature->headerCellClass() ?>"><span id="elh_ivf_art_summary_ConsultantsSignature" class="ivf_art_summary_ConsultantsSignature"><?= $Page->ConsultantsSignature->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><span id="elh_ivf_art_summary_Name" class="ivf_art_summary_Name"><?= $Page->Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->M2->Visible) { // M2 ?>
        <th class="<?= $Page->M2->headerCellClass() ?>"><span id="elh_ivf_art_summary_M2" class="ivf_art_summary_M2"><?= $Page->M2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Mi2->Visible) { // Mi2 ?>
        <th class="<?= $Page->Mi2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Mi2" class="ivf_art_summary_Mi2"><?= $Page->Mi2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ICSI->Visible) { // ICSI ?>
        <th class="<?= $Page->ICSI->headerCellClass() ?>"><span id="elh_ivf_art_summary_ICSI" class="ivf_art_summary_ICSI"><?= $Page->ICSI->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IVF->Visible) { // IVF ?>
        <th class="<?= $Page->IVF->headerCellClass() ?>"><span id="elh_ivf_art_summary_IVF" class="ivf_art_summary_IVF"><?= $Page->IVF->caption() ?></span></th>
<?php } ?>
<?php if ($Page->M1->Visible) { // M1 ?>
        <th class="<?= $Page->M1->headerCellClass() ?>"><span id="elh_ivf_art_summary_M1" class="ivf_art_summary_M1"><?= $Page->M1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GV->Visible) { // GV ?>
        <th class="<?= $Page->GV->headerCellClass() ?>"><span id="elh_ivf_art_summary_GV" class="ivf_art_summary_GV"><?= $Page->GV->caption() ?></span></th>
<?php } ?>
<?php if ($Page->_Others->Visible) { // Others ?>
        <th class="<?= $Page->_Others->headerCellClass() ?>"><span id="elh_ivf_art_summary__Others" class="ivf_art_summary__Others"><?= $Page->_Others->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Normal2PN->Visible) { // Normal2PN ?>
        <th class="<?= $Page->Normal2PN->headerCellClass() ?>"><span id="elh_ivf_art_summary_Normal2PN" class="ivf_art_summary_Normal2PN"><?= $Page->Normal2PN->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
        <th class="<?= $Page->Abnormalfertilisation1N->headerCellClass() ?>"><span id="elh_ivf_art_summary_Abnormalfertilisation1N" class="ivf_art_summary_Abnormalfertilisation1N"><?= $Page->Abnormalfertilisation1N->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
        <th class="<?= $Page->Abnormalfertilisation3N->headerCellClass() ?>"><span id="elh_ivf_art_summary_Abnormalfertilisation3N" class="ivf_art_summary_Abnormalfertilisation3N"><?= $Page->Abnormalfertilisation3N->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NotFertilized->Visible) { // NotFertilized ?>
        <th class="<?= $Page->NotFertilized->headerCellClass() ?>"><span id="elh_ivf_art_summary_NotFertilized" class="ivf_art_summary_NotFertilized"><?= $Page->NotFertilized->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Degenerated->Visible) { // Degenerated ?>
        <th class="<?= $Page->Degenerated->headerCellClass() ?>"><span id="elh_ivf_art_summary_Degenerated" class="ivf_art_summary_Degenerated"><?= $Page->Degenerated->caption() ?></span></th>
<?php } ?>
<?php if ($Page->SpermDate->Visible) { // SpermDate ?>
        <th class="<?= $Page->SpermDate->headerCellClass() ?>"><span id="elh_ivf_art_summary_SpermDate" class="ivf_art_summary_SpermDate"><?= $Page->SpermDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Code1->Visible) { // Code1 ?>
        <th class="<?= $Page->Code1->headerCellClass() ?>"><span id="elh_ivf_art_summary_Code1" class="ivf_art_summary_Code1"><?= $Page->Code1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day1->Visible) { // Day1 ?>
        <th class="<?= $Page->Day1->headerCellClass() ?>"><span id="elh_ivf_art_summary_Day1" class="ivf_art_summary_Day1"><?= $Page->Day1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CellStage1->Visible) { // CellStage1 ?>
        <th class="<?= $Page->CellStage1->headerCellClass() ?>"><span id="elh_ivf_art_summary_CellStage1" class="ivf_art_summary_CellStage1"><?= $Page->CellStage1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Grade1->Visible) { // Grade1 ?>
        <th class="<?= $Page->Grade1->headerCellClass() ?>"><span id="elh_ivf_art_summary_Grade1" class="ivf_art_summary_Grade1"><?= $Page->Grade1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->State1->Visible) { // State1 ?>
        <th class="<?= $Page->State1->headerCellClass() ?>"><span id="elh_ivf_art_summary_State1" class="ivf_art_summary_State1"><?= $Page->State1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Code2->Visible) { // Code2 ?>
        <th class="<?= $Page->Code2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Code2" class="ivf_art_summary_Code2"><?= $Page->Code2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day2->Visible) { // Day2 ?>
        <th class="<?= $Page->Day2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Day2" class="ivf_art_summary_Day2"><?= $Page->Day2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CellStage2->Visible) { // CellStage2 ?>
        <th class="<?= $Page->CellStage2->headerCellClass() ?>"><span id="elh_ivf_art_summary_CellStage2" class="ivf_art_summary_CellStage2"><?= $Page->CellStage2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Grade2->Visible) { // Grade2 ?>
        <th class="<?= $Page->Grade2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Grade2" class="ivf_art_summary_Grade2"><?= $Page->Grade2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->State2->Visible) { // State2 ?>
        <th class="<?= $Page->State2->headerCellClass() ?>"><span id="elh_ivf_art_summary_State2" class="ivf_art_summary_State2"><?= $Page->State2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Code3->Visible) { // Code3 ?>
        <th class="<?= $Page->Code3->headerCellClass() ?>"><span id="elh_ivf_art_summary_Code3" class="ivf_art_summary_Code3"><?= $Page->Code3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day3->Visible) { // Day3 ?>
        <th class="<?= $Page->Day3->headerCellClass() ?>"><span id="elh_ivf_art_summary_Day3" class="ivf_art_summary_Day3"><?= $Page->Day3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CellStage3->Visible) { // CellStage3 ?>
        <th class="<?= $Page->CellStage3->headerCellClass() ?>"><span id="elh_ivf_art_summary_CellStage3" class="ivf_art_summary_CellStage3"><?= $Page->CellStage3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Grade3->Visible) { // Grade3 ?>
        <th class="<?= $Page->Grade3->headerCellClass() ?>"><span id="elh_ivf_art_summary_Grade3" class="ivf_art_summary_Grade3"><?= $Page->Grade3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->State3->Visible) { // State3 ?>
        <th class="<?= $Page->State3->headerCellClass() ?>"><span id="elh_ivf_art_summary_State3" class="ivf_art_summary_State3"><?= $Page->State3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Code4->Visible) { // Code4 ?>
        <th class="<?= $Page->Code4->headerCellClass() ?>"><span id="elh_ivf_art_summary_Code4" class="ivf_art_summary_Code4"><?= $Page->Code4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day4->Visible) { // Day4 ?>
        <th class="<?= $Page->Day4->headerCellClass() ?>"><span id="elh_ivf_art_summary_Day4" class="ivf_art_summary_Day4"><?= $Page->Day4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CellStage4->Visible) { // CellStage4 ?>
        <th class="<?= $Page->CellStage4->headerCellClass() ?>"><span id="elh_ivf_art_summary_CellStage4" class="ivf_art_summary_CellStage4"><?= $Page->CellStage4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Grade4->Visible) { // Grade4 ?>
        <th class="<?= $Page->Grade4->headerCellClass() ?>"><span id="elh_ivf_art_summary_Grade4" class="ivf_art_summary_Grade4"><?= $Page->Grade4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->State4->Visible) { // State4 ?>
        <th class="<?= $Page->State4->headerCellClass() ?>"><span id="elh_ivf_art_summary_State4" class="ivf_art_summary_State4"><?= $Page->State4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Code5->Visible) { // Code5 ?>
        <th class="<?= $Page->Code5->headerCellClass() ?>"><span id="elh_ivf_art_summary_Code5" class="ivf_art_summary_Code5"><?= $Page->Code5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Day5->Visible) { // Day5 ?>
        <th class="<?= $Page->Day5->headerCellClass() ?>"><span id="elh_ivf_art_summary_Day5" class="ivf_art_summary_Day5"><?= $Page->Day5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CellStage5->Visible) { // CellStage5 ?>
        <th class="<?= $Page->CellStage5->headerCellClass() ?>"><span id="elh_ivf_art_summary_CellStage5" class="ivf_art_summary_CellStage5"><?= $Page->CellStage5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Grade5->Visible) { // Grade5 ?>
        <th class="<?= $Page->Grade5->headerCellClass() ?>"><span id="elh_ivf_art_summary_Grade5" class="ivf_art_summary_Grade5"><?= $Page->Grade5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->State5->Visible) { // State5 ?>
        <th class="<?= $Page->State5->headerCellClass() ?>"><span id="elh_ivf_art_summary_State5" class="ivf_art_summary_State5"><?= $Page->State5->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><span id="elh_ivf_art_summary_TidNo" class="ivf_art_summary_TidNo"><?= $Page->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th class="<?= $Page->RIDNo->headerCellClass() ?>"><span id="elh_ivf_art_summary_RIDNo" class="ivf_art_summary_RIDNo"><?= $Page->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
        <th class="<?= $Page->Volume->headerCellClass() ?>"><span id="elh_ivf_art_summary_Volume" class="ivf_art_summary_Volume"><?= $Page->Volume->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Volume1->Visible) { // Volume1 ?>
        <th class="<?= $Page->Volume1->headerCellClass() ?>"><span id="elh_ivf_art_summary_Volume1" class="ivf_art_summary_Volume1"><?= $Page->Volume1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Volume2->Visible) { // Volume2 ?>
        <th class="<?= $Page->Volume2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Volume2" class="ivf_art_summary_Volume2"><?= $Page->Volume2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Concentration2->Visible) { // Concentration2 ?>
        <th class="<?= $Page->Concentration2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Concentration2" class="ivf_art_summary_Concentration2"><?= $Page->Concentration2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
        <th class="<?= $Page->Total->headerCellClass() ?>"><span id="elh_ivf_art_summary_Total" class="ivf_art_summary_Total"><?= $Page->Total->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Total1->Visible) { // Total1 ?>
        <th class="<?= $Page->Total1->headerCellClass() ?>"><span id="elh_ivf_art_summary_Total1" class="ivf_art_summary_Total1"><?= $Page->Total1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Total2->Visible) { // Total2 ?>
        <th class="<?= $Page->Total2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Total2" class="ivf_art_summary_Total2"><?= $Page->Total2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Progressive->Visible) { // Progressive ?>
        <th class="<?= $Page->Progressive->headerCellClass() ?>"><span id="elh_ivf_art_summary_Progressive" class="ivf_art_summary_Progressive"><?= $Page->Progressive->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Progressive1->Visible) { // Progressive1 ?>
        <th class="<?= $Page->Progressive1->headerCellClass() ?>"><span id="elh_ivf_art_summary_Progressive1" class="ivf_art_summary_Progressive1"><?= $Page->Progressive1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Progressive2->Visible) { // Progressive2 ?>
        <th class="<?= $Page->Progressive2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Progressive2" class="ivf_art_summary_Progressive2"><?= $Page->Progressive2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NotProgressive->Visible) { // NotProgressive ?>
        <th class="<?= $Page->NotProgressive->headerCellClass() ?>"><span id="elh_ivf_art_summary_NotProgressive" class="ivf_art_summary_NotProgressive"><?= $Page->NotProgressive->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NotProgressive1->Visible) { // NotProgressive1 ?>
        <th class="<?= $Page->NotProgressive1->headerCellClass() ?>"><span id="elh_ivf_art_summary_NotProgressive1" class="ivf_art_summary_NotProgressive1"><?= $Page->NotProgressive1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NotProgressive2->Visible) { // NotProgressive2 ?>
        <th class="<?= $Page->NotProgressive2->headerCellClass() ?>"><span id="elh_ivf_art_summary_NotProgressive2" class="ivf_art_summary_NotProgressive2"><?= $Page->NotProgressive2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Motility2->Visible) { // Motility2 ?>
        <th class="<?= $Page->Motility2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Motility2" class="ivf_art_summary_Motility2"><?= $Page->Motility2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Morphology2->Visible) { // Morphology2 ?>
        <th class="<?= $Page->Morphology2->headerCellClass() ?>"><span id="elh_ivf_art_summary_Morphology2" class="ivf_art_summary_Morphology2"><?= $Page->Morphology2->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id->Visible) { // id ?>
        <td <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_id" class="ivf_art_summary_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IVFRegistrationID->Visible) { // IVFRegistrationID ?>
        <td <?= $Page->IVFRegistrationID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_IVFRegistrationID" class="ivf_art_summary_IVFRegistrationID">
<span<?= $Page->IVFRegistrationID->viewAttributes() ?>>
<?= $Page->IVFRegistrationID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <td <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_ARTCycle" class="ivf_art_summary_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Spermorigin->Visible) { // Spermorigin ?>
        <td <?= $Page->Spermorigin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Spermorigin" class="ivf_art_summary_Spermorigin">
<span<?= $Page->Spermorigin->viewAttributes() ?>>
<?= $Page->Spermorigin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <td <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_InseminatinTechnique" class="ivf_art_summary_InseminatinTechnique">
<span<?= $Page->InseminatinTechnique->viewAttributes() ?>>
<?= $Page->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IndicationforART->Visible) { // IndicationforART ?>
        <td <?= $Page->IndicationforART->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_IndicationforART" class="ivf_art_summary_IndicationforART">
<span<?= $Page->IndicationforART->viewAttributes() ?>>
<?= $Page->IndicationforART->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ICSIDetails->Visible) { // ICSIDetails ?>
        <td <?= $Page->ICSIDetails->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_ICSIDetails" class="ivf_art_summary_ICSIDetails">
<span<?= $Page->ICSIDetails->viewAttributes() ?>>
<?= $Page->ICSIDetails->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DateofICSI->Visible) { // DateofICSI ?>
        <td <?= $Page->DateofICSI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_DateofICSI" class="ivf_art_summary_DateofICSI">
<span<?= $Page->DateofICSI->viewAttributes() ?>>
<?= $Page->DateofICSI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
        <td <?= $Page->Origin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Origin" class="ivf_art_summary_Origin">
<span<?= $Page->Origin->viewAttributes() ?>>
<?= $Page->Origin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
        <td <?= $Page->Status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Status" class="ivf_art_summary_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <td <?= $Page->Method->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Method" class="ivf_art_summary_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pre_Concentration->Visible) { // pre_Concentration ?>
        <td <?= $Page->pre_Concentration->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_pre_Concentration" class="ivf_art_summary_pre_Concentration">
<span<?= $Page->pre_Concentration->viewAttributes() ?>>
<?= $Page->pre_Concentration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pre_Motility->Visible) { // pre_Motility ?>
        <td <?= $Page->pre_Motility->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_pre_Motility" class="ivf_art_summary_pre_Motility">
<span<?= $Page->pre_Motility->viewAttributes() ?>>
<?= $Page->pre_Motility->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pre_Morphology->Visible) { // pre_Morphology ?>
        <td <?= $Page->pre_Morphology->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_pre_Morphology" class="ivf_art_summary_pre_Morphology">
<span<?= $Page->pre_Morphology->viewAttributes() ?>>
<?= $Page->pre_Morphology->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->post_Concentration->Visible) { // post_Concentration ?>
        <td <?= $Page->post_Concentration->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_post_Concentration" class="ivf_art_summary_post_Concentration">
<span<?= $Page->post_Concentration->viewAttributes() ?>>
<?= $Page->post_Concentration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->post_Motility->Visible) { // post_Motility ?>
        <td <?= $Page->post_Motility->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_post_Motility" class="ivf_art_summary_post_Motility">
<span<?= $Page->post_Motility->viewAttributes() ?>>
<?= $Page->post_Motility->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->post_Morphology->Visible) { // post_Morphology ?>
        <td <?= $Page->post_Morphology->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_post_Morphology" class="ivf_art_summary_post_Morphology">
<span<?= $Page->post_Morphology->viewAttributes() ?>>
<?= $Page->post_Morphology->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DateofET->Visible) { // DateofET ?>
        <td <?= $Page->DateofET->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_DateofET" class="ivf_art_summary_DateofET">
<span<?= $Page->DateofET->viewAttributes() ?>>
<?= $Page->DateofET->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NumberofEmbryostransferred->Visible) { // NumberofEmbryostransferred ?>
        <td <?= $Page->NumberofEmbryostransferred->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_NumberofEmbryostransferred" class="ivf_art_summary_NumberofEmbryostransferred">
<span<?= $Page->NumberofEmbryostransferred->viewAttributes() ?>>
<?= $Page->NumberofEmbryostransferred->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Reasonfornotranfer->Visible) { // Reasonfornotranfer ?>
        <td <?= $Page->Reasonfornotranfer->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Reasonfornotranfer" class="ivf_art_summary_Reasonfornotranfer">
<span<?= $Page->Reasonfornotranfer->viewAttributes() ?>>
<?= $Page->Reasonfornotranfer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Embryosunderobservation->Visible) { // Embryosunderobservation ?>
        <td <?= $Page->Embryosunderobservation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Embryosunderobservation" class="ivf_art_summary_Embryosunderobservation">
<span<?= $Page->Embryosunderobservation->viewAttributes() ?>>
<?= $Page->Embryosunderobservation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EmbryosCryopreserved->Visible) { // EmbryosCryopreserved ?>
        <td <?= $Page->EmbryosCryopreserved->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_EmbryosCryopreserved" class="ivf_art_summary_EmbryosCryopreserved">
<span<?= $Page->EmbryosCryopreserved->viewAttributes() ?>>
<?= $Page->EmbryosCryopreserved->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EmbryoDevelopmentSummary->Visible) { // EmbryoDevelopmentSummary ?>
        <td <?= $Page->EmbryoDevelopmentSummary->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_EmbryoDevelopmentSummary" class="ivf_art_summary_EmbryoDevelopmentSummary">
<span<?= $Page->EmbryoDevelopmentSummary->viewAttributes() ?>>
<?= $Page->EmbryoDevelopmentSummary->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->LegendCellStage->Visible) { // LegendCellStage ?>
        <td <?= $Page->LegendCellStage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_LegendCellStage" class="ivf_art_summary_LegendCellStage">
<span<?= $Page->LegendCellStage->viewAttributes() ?>>
<?= $Page->LegendCellStage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EmbryologistSignature->Visible) { // EmbryologistSignature ?>
        <td <?= $Page->EmbryologistSignature->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_EmbryologistSignature" class="ivf_art_summary_EmbryologistSignature">
<span<?= $Page->EmbryologistSignature->viewAttributes() ?>>
<?= $Page->EmbryologistSignature->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ConsultantsSignature->Visible) { // ConsultantsSignature ?>
        <td <?= $Page->ConsultantsSignature->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_ConsultantsSignature" class="ivf_art_summary_ConsultantsSignature">
<span<?= $Page->ConsultantsSignature->viewAttributes() ?>>
<?= $Page->ConsultantsSignature->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <td <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Name" class="ivf_art_summary_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->M2->Visible) { // M2 ?>
        <td <?= $Page->M2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_M2" class="ivf_art_summary_M2">
<span<?= $Page->M2->viewAttributes() ?>>
<?= $Page->M2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Mi2->Visible) { // Mi2 ?>
        <td <?= $Page->Mi2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Mi2" class="ivf_art_summary_Mi2">
<span<?= $Page->Mi2->viewAttributes() ?>>
<?= $Page->Mi2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ICSI->Visible) { // ICSI ?>
        <td <?= $Page->ICSI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_ICSI" class="ivf_art_summary_ICSI">
<span<?= $Page->ICSI->viewAttributes() ?>>
<?= $Page->ICSI->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IVF->Visible) { // IVF ?>
        <td <?= $Page->IVF->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_IVF" class="ivf_art_summary_IVF">
<span<?= $Page->IVF->viewAttributes() ?>>
<?= $Page->IVF->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->M1->Visible) { // M1 ?>
        <td <?= $Page->M1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_M1" class="ivf_art_summary_M1">
<span<?= $Page->M1->viewAttributes() ?>>
<?= $Page->M1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GV->Visible) { // GV ?>
        <td <?= $Page->GV->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_GV" class="ivf_art_summary_GV">
<span<?= $Page->GV->viewAttributes() ?>>
<?= $Page->GV->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->_Others->Visible) { // Others ?>
        <td <?= $Page->_Others->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary__Others" class="ivf_art_summary__Others">
<span<?= $Page->_Others->viewAttributes() ?>>
<?= $Page->_Others->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Normal2PN->Visible) { // Normal2PN ?>
        <td <?= $Page->Normal2PN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Normal2PN" class="ivf_art_summary_Normal2PN">
<span<?= $Page->Normal2PN->viewAttributes() ?>>
<?= $Page->Normal2PN->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Abnormalfertilisation1N->Visible) { // Abnormalfertilisation1N ?>
        <td <?= $Page->Abnormalfertilisation1N->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Abnormalfertilisation1N" class="ivf_art_summary_Abnormalfertilisation1N">
<span<?= $Page->Abnormalfertilisation1N->viewAttributes() ?>>
<?= $Page->Abnormalfertilisation1N->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Abnormalfertilisation3N->Visible) { // Abnormalfertilisation3N ?>
        <td <?= $Page->Abnormalfertilisation3N->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Abnormalfertilisation3N" class="ivf_art_summary_Abnormalfertilisation3N">
<span<?= $Page->Abnormalfertilisation3N->viewAttributes() ?>>
<?= $Page->Abnormalfertilisation3N->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NotFertilized->Visible) { // NotFertilized ?>
        <td <?= $Page->NotFertilized->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_NotFertilized" class="ivf_art_summary_NotFertilized">
<span<?= $Page->NotFertilized->viewAttributes() ?>>
<?= $Page->NotFertilized->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Degenerated->Visible) { // Degenerated ?>
        <td <?= $Page->Degenerated->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Degenerated" class="ivf_art_summary_Degenerated">
<span<?= $Page->Degenerated->viewAttributes() ?>>
<?= $Page->Degenerated->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->SpermDate->Visible) { // SpermDate ?>
        <td <?= $Page->SpermDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_SpermDate" class="ivf_art_summary_SpermDate">
<span<?= $Page->SpermDate->viewAttributes() ?>>
<?= $Page->SpermDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Code1->Visible) { // Code1 ?>
        <td <?= $Page->Code1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Code1" class="ivf_art_summary_Code1">
<span<?= $Page->Code1->viewAttributes() ?>>
<?= $Page->Code1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day1->Visible) { // Day1 ?>
        <td <?= $Page->Day1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Day1" class="ivf_art_summary_Day1">
<span<?= $Page->Day1->viewAttributes() ?>>
<?= $Page->Day1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CellStage1->Visible) { // CellStage1 ?>
        <td <?= $Page->CellStage1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_CellStage1" class="ivf_art_summary_CellStage1">
<span<?= $Page->CellStage1->viewAttributes() ?>>
<?= $Page->CellStage1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Grade1->Visible) { // Grade1 ?>
        <td <?= $Page->Grade1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Grade1" class="ivf_art_summary_Grade1">
<span<?= $Page->Grade1->viewAttributes() ?>>
<?= $Page->Grade1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->State1->Visible) { // State1 ?>
        <td <?= $Page->State1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_State1" class="ivf_art_summary_State1">
<span<?= $Page->State1->viewAttributes() ?>>
<?= $Page->State1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Code2->Visible) { // Code2 ?>
        <td <?= $Page->Code2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Code2" class="ivf_art_summary_Code2">
<span<?= $Page->Code2->viewAttributes() ?>>
<?= $Page->Code2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day2->Visible) { // Day2 ?>
        <td <?= $Page->Day2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Day2" class="ivf_art_summary_Day2">
<span<?= $Page->Day2->viewAttributes() ?>>
<?= $Page->Day2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CellStage2->Visible) { // CellStage2 ?>
        <td <?= $Page->CellStage2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_CellStage2" class="ivf_art_summary_CellStage2">
<span<?= $Page->CellStage2->viewAttributes() ?>>
<?= $Page->CellStage2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Grade2->Visible) { // Grade2 ?>
        <td <?= $Page->Grade2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Grade2" class="ivf_art_summary_Grade2">
<span<?= $Page->Grade2->viewAttributes() ?>>
<?= $Page->Grade2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->State2->Visible) { // State2 ?>
        <td <?= $Page->State2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_State2" class="ivf_art_summary_State2">
<span<?= $Page->State2->viewAttributes() ?>>
<?= $Page->State2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Code3->Visible) { // Code3 ?>
        <td <?= $Page->Code3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Code3" class="ivf_art_summary_Code3">
<span<?= $Page->Code3->viewAttributes() ?>>
<?= $Page->Code3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day3->Visible) { // Day3 ?>
        <td <?= $Page->Day3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Day3" class="ivf_art_summary_Day3">
<span<?= $Page->Day3->viewAttributes() ?>>
<?= $Page->Day3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CellStage3->Visible) { // CellStage3 ?>
        <td <?= $Page->CellStage3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_CellStage3" class="ivf_art_summary_CellStage3">
<span<?= $Page->CellStage3->viewAttributes() ?>>
<?= $Page->CellStage3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Grade3->Visible) { // Grade3 ?>
        <td <?= $Page->Grade3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Grade3" class="ivf_art_summary_Grade3">
<span<?= $Page->Grade3->viewAttributes() ?>>
<?= $Page->Grade3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->State3->Visible) { // State3 ?>
        <td <?= $Page->State3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_State3" class="ivf_art_summary_State3">
<span<?= $Page->State3->viewAttributes() ?>>
<?= $Page->State3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Code4->Visible) { // Code4 ?>
        <td <?= $Page->Code4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Code4" class="ivf_art_summary_Code4">
<span<?= $Page->Code4->viewAttributes() ?>>
<?= $Page->Code4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day4->Visible) { // Day4 ?>
        <td <?= $Page->Day4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Day4" class="ivf_art_summary_Day4">
<span<?= $Page->Day4->viewAttributes() ?>>
<?= $Page->Day4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CellStage4->Visible) { // CellStage4 ?>
        <td <?= $Page->CellStage4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_CellStage4" class="ivf_art_summary_CellStage4">
<span<?= $Page->CellStage4->viewAttributes() ?>>
<?= $Page->CellStage4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Grade4->Visible) { // Grade4 ?>
        <td <?= $Page->Grade4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Grade4" class="ivf_art_summary_Grade4">
<span<?= $Page->Grade4->viewAttributes() ?>>
<?= $Page->Grade4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->State4->Visible) { // State4 ?>
        <td <?= $Page->State4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_State4" class="ivf_art_summary_State4">
<span<?= $Page->State4->viewAttributes() ?>>
<?= $Page->State4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Code5->Visible) { // Code5 ?>
        <td <?= $Page->Code5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Code5" class="ivf_art_summary_Code5">
<span<?= $Page->Code5->viewAttributes() ?>>
<?= $Page->Code5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Day5->Visible) { // Day5 ?>
        <td <?= $Page->Day5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Day5" class="ivf_art_summary_Day5">
<span<?= $Page->Day5->viewAttributes() ?>>
<?= $Page->Day5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CellStage5->Visible) { // CellStage5 ?>
        <td <?= $Page->CellStage5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_CellStage5" class="ivf_art_summary_CellStage5">
<span<?= $Page->CellStage5->viewAttributes() ?>>
<?= $Page->CellStage5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Grade5->Visible) { // Grade5 ?>
        <td <?= $Page->Grade5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Grade5" class="ivf_art_summary_Grade5">
<span<?= $Page->Grade5->viewAttributes() ?>>
<?= $Page->Grade5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->State5->Visible) { // State5 ?>
        <td <?= $Page->State5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_State5" class="ivf_art_summary_State5">
<span<?= $Page->State5->viewAttributes() ?>>
<?= $Page->State5->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_TidNo" class="ivf_art_summary_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_RIDNo" class="ivf_art_summary_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
        <td <?= $Page->Volume->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Volume" class="ivf_art_summary_Volume">
<span<?= $Page->Volume->viewAttributes() ?>>
<?= $Page->Volume->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Volume1->Visible) { // Volume1 ?>
        <td <?= $Page->Volume1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Volume1" class="ivf_art_summary_Volume1">
<span<?= $Page->Volume1->viewAttributes() ?>>
<?= $Page->Volume1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Volume2->Visible) { // Volume2 ?>
        <td <?= $Page->Volume2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Volume2" class="ivf_art_summary_Volume2">
<span<?= $Page->Volume2->viewAttributes() ?>>
<?= $Page->Volume2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Concentration2->Visible) { // Concentration2 ?>
        <td <?= $Page->Concentration2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Concentration2" class="ivf_art_summary_Concentration2">
<span<?= $Page->Concentration2->viewAttributes() ?>>
<?= $Page->Concentration2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
        <td <?= $Page->Total->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Total" class="ivf_art_summary_Total">
<span<?= $Page->Total->viewAttributes() ?>>
<?= $Page->Total->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Total1->Visible) { // Total1 ?>
        <td <?= $Page->Total1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Total1" class="ivf_art_summary_Total1">
<span<?= $Page->Total1->viewAttributes() ?>>
<?= $Page->Total1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Total2->Visible) { // Total2 ?>
        <td <?= $Page->Total2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Total2" class="ivf_art_summary_Total2">
<span<?= $Page->Total2->viewAttributes() ?>>
<?= $Page->Total2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Progressive->Visible) { // Progressive ?>
        <td <?= $Page->Progressive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Progressive" class="ivf_art_summary_Progressive">
<span<?= $Page->Progressive->viewAttributes() ?>>
<?= $Page->Progressive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Progressive1->Visible) { // Progressive1 ?>
        <td <?= $Page->Progressive1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Progressive1" class="ivf_art_summary_Progressive1">
<span<?= $Page->Progressive1->viewAttributes() ?>>
<?= $Page->Progressive1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Progressive2->Visible) { // Progressive2 ?>
        <td <?= $Page->Progressive2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Progressive2" class="ivf_art_summary_Progressive2">
<span<?= $Page->Progressive2->viewAttributes() ?>>
<?= $Page->Progressive2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NotProgressive->Visible) { // NotProgressive ?>
        <td <?= $Page->NotProgressive->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_NotProgressive" class="ivf_art_summary_NotProgressive">
<span<?= $Page->NotProgressive->viewAttributes() ?>>
<?= $Page->NotProgressive->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NotProgressive1->Visible) { // NotProgressive1 ?>
        <td <?= $Page->NotProgressive1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_NotProgressive1" class="ivf_art_summary_NotProgressive1">
<span<?= $Page->NotProgressive1->viewAttributes() ?>>
<?= $Page->NotProgressive1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NotProgressive2->Visible) { // NotProgressive2 ?>
        <td <?= $Page->NotProgressive2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_NotProgressive2" class="ivf_art_summary_NotProgressive2">
<span<?= $Page->NotProgressive2->viewAttributes() ?>>
<?= $Page->NotProgressive2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Motility2->Visible) { // Motility2 ?>
        <td <?= $Page->Motility2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Motility2" class="ivf_art_summary_Motility2">
<span<?= $Page->Motility2->viewAttributes() ?>>
<?= $Page->Motility2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Morphology2->Visible) { // Morphology2 ?>
        <td <?= $Page->Morphology2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_art_summary_Morphology2" class="ivf_art_summary_Morphology2">
<span<?= $Page->Morphology2->viewAttributes() ?>>
<?= $Page->Morphology2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

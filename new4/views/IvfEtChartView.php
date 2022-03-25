<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfEtChartView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_et_chartview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivf_et_chartview = currentForm = new ew.Form("fivf_et_chartview", "view");
    loadjs.done("fivf_et_chartview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.ivf_et_chart) ew.vars.tables.ivf_et_chart = <?= JsonEncode(GetClientVar("tables", "ivf_et_chart")) ?>;
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
<form name="fivf_et_chartview" id="fivf_et_chartview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_et_chart">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_id"><template id="tpc_ivf_et_chart_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_id"><span id="el_ivf_et_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <tr id="r_RIDNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_RIDNo"><template id="tpc_ivf_et_chart_RIDNo"><?= $Page->RIDNo->caption() ?></template></span></td>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_RIDNo"><span id="el_ivf_et_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
    <tr id="r_Name">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Name"><template id="tpc_ivf_et_chart_Name"><?= $Page->Name->caption() ?></template></span></td>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_Name"><span id="el_ivf_et_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
    <tr id="r_ARTCycle">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ARTCycle"><template id="tpc_ivf_et_chart_ARTCycle"><?= $Page->ARTCycle->caption() ?></template></span></td>
        <td data-name="ARTCycle" <?= $Page->ARTCycle->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_ARTCycle"><span id="el_ivf_et_chart_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <tr id="r_Consultant">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Consultant"><template id="tpc_ivf_et_chart_Consultant"><?= $Page->Consultant->caption() ?></template></span></td>
        <td data-name="Consultant" <?= $Page->Consultant->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_Consultant"><span id="el_ivf_et_chart_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
    <tr id="r_InseminatinTechnique">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_InseminatinTechnique"><template id="tpc_ivf_et_chart_InseminatinTechnique"><?= $Page->InseminatinTechnique->caption() ?></template></span></td>
        <td data-name="InseminatinTechnique" <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_InseminatinTechnique"><span id="el_ivf_et_chart_InseminatinTechnique">
<span<?= $Page->InseminatinTechnique->viewAttributes() ?>>
<?= $Page->InseminatinTechnique->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
    <tr id="r_IndicationForART">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_IndicationForART"><template id="tpc_ivf_et_chart_IndicationForART"><?= $Page->IndicationForART->caption() ?></template></span></td>
        <td data-name="IndicationForART" <?= $Page->IndicationForART->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_IndicationForART"><span id="el_ivf_et_chart_IndicationForART">
<span<?= $Page->IndicationForART->viewAttributes() ?>>
<?= $Page->IndicationForART->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PreTreatment->Visible) { // PreTreatment ?>
    <tr id="r_PreTreatment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_PreTreatment"><template id="tpc_ivf_et_chart_PreTreatment"><?= $Page->PreTreatment->caption() ?></template></span></td>
        <td data-name="PreTreatment" <?= $Page->PreTreatment->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_PreTreatment"><span id="el_ivf_et_chart_PreTreatment">
<span<?= $Page->PreTreatment->viewAttributes() ?>>
<?= $Page->PreTreatment->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
    <tr id="r_Hysteroscopy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Hysteroscopy"><template id="tpc_ivf_et_chart_Hysteroscopy"><?= $Page->Hysteroscopy->caption() ?></template></span></td>
        <td data-name="Hysteroscopy" <?= $Page->Hysteroscopy->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_Hysteroscopy"><span id="el_ivf_et_chart_Hysteroscopy">
<span<?= $Page->Hysteroscopy->viewAttributes() ?>>
<?= $Page->Hysteroscopy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EndometrialScratching->Visible) { // EndometrialScratching ?>
    <tr id="r_EndometrialScratching">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_EndometrialScratching"><template id="tpc_ivf_et_chart_EndometrialScratching"><?= $Page->EndometrialScratching->caption() ?></template></span></td>
        <td data-name="EndometrialScratching" <?= $Page->EndometrialScratching->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_EndometrialScratching"><span id="el_ivf_et_chart_EndometrialScratching">
<span<?= $Page->EndometrialScratching->viewAttributes() ?>>
<?= $Page->EndometrialScratching->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
    <tr id="r_TrialCannulation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_TrialCannulation"><template id="tpc_ivf_et_chart_TrialCannulation"><?= $Page->TrialCannulation->caption() ?></template></span></td>
        <td data-name="TrialCannulation" <?= $Page->TrialCannulation->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_TrialCannulation"><span id="el_ivf_et_chart_TrialCannulation">
<span<?= $Page->TrialCannulation->viewAttributes() ?>>
<?= $Page->TrialCannulation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CYCLETYPE->Visible) { // CYCLETYPE ?>
    <tr id="r_CYCLETYPE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_CYCLETYPE"><template id="tpc_ivf_et_chart_CYCLETYPE"><?= $Page->CYCLETYPE->caption() ?></template></span></td>
        <td data-name="CYCLETYPE" <?= $Page->CYCLETYPE->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_CYCLETYPE"><span id="el_ivf_et_chart_CYCLETYPE">
<span<?= $Page->CYCLETYPE->viewAttributes() ?>>
<?= $Page->CYCLETYPE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HRTCYCLE->Visible) { // HRTCYCLE ?>
    <tr id="r_HRTCYCLE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_HRTCYCLE"><template id="tpc_ivf_et_chart_HRTCYCLE"><?= $Page->HRTCYCLE->caption() ?></template></span></td>
        <td data-name="HRTCYCLE" <?= $Page->HRTCYCLE->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_HRTCYCLE"><span id="el_ivf_et_chart_HRTCYCLE">
<span<?= $Page->HRTCYCLE->viewAttributes() ?>>
<?= $Page->HRTCYCLE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
    <tr id="r_OralEstrogenDosage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_OralEstrogenDosage"><template id="tpc_ivf_et_chart_OralEstrogenDosage"><?= $Page->OralEstrogenDosage->caption() ?></template></span></td>
        <td data-name="OralEstrogenDosage" <?= $Page->OralEstrogenDosage->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_OralEstrogenDosage"><span id="el_ivf_et_chart_OralEstrogenDosage">
<span<?= $Page->OralEstrogenDosage->viewAttributes() ?>>
<?= $Page->OralEstrogenDosage->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
    <tr id="r_VaginalEstrogen">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_VaginalEstrogen"><template id="tpc_ivf_et_chart_VaginalEstrogen"><?= $Page->VaginalEstrogen->caption() ?></template></span></td>
        <td data-name="VaginalEstrogen" <?= $Page->VaginalEstrogen->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_VaginalEstrogen"><span id="el_ivf_et_chart_VaginalEstrogen">
<span<?= $Page->VaginalEstrogen->viewAttributes() ?>>
<?= $Page->VaginalEstrogen->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GCSF->Visible) { // GCSF ?>
    <tr id="r_GCSF">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_GCSF"><template id="tpc_ivf_et_chart_GCSF"><?= $Page->GCSF->caption() ?></template></span></td>
        <td data-name="GCSF" <?= $Page->GCSF->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_GCSF"><span id="el_ivf_et_chart_GCSF">
<span<?= $Page->GCSF->viewAttributes() ?>>
<?= $Page->GCSF->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ActivatedPRP->Visible) { // ActivatedPRP ?>
    <tr id="r_ActivatedPRP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ActivatedPRP"><template id="tpc_ivf_et_chart_ActivatedPRP"><?= $Page->ActivatedPRP->caption() ?></template></span></td>
        <td data-name="ActivatedPRP" <?= $Page->ActivatedPRP->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_ActivatedPRP"><span id="el_ivf_et_chart_ActivatedPRP">
<span<?= $Page->ActivatedPRP->viewAttributes() ?>>
<?= $Page->ActivatedPRP->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ERA->Visible) { // ERA ?>
    <tr id="r_ERA">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ERA"><template id="tpc_ivf_et_chart_ERA"><?= $Page->ERA->caption() ?></template></span></td>
        <td data-name="ERA" <?= $Page->ERA->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_ERA"><span id="el_ivf_et_chart_ERA">
<span<?= $Page->ERA->viewAttributes() ?>>
<?= $Page->ERA->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UCLcm->Visible) { // UCLcm ?>
    <tr id="r_UCLcm">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_UCLcm"><template id="tpc_ivf_et_chart_UCLcm"><?= $Page->UCLcm->caption() ?></template></span></td>
        <td data-name="UCLcm" <?= $Page->UCLcm->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_UCLcm"><span id="el_ivf_et_chart_UCLcm">
<span<?= $Page->UCLcm->viewAttributes() ?>>
<?= $Page->UCLcm->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DATEOFSTART->Visible) { // DATEOFSTART ?>
    <tr id="r_DATEOFSTART">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_DATEOFSTART"><template id="tpc_ivf_et_chart_DATEOFSTART"><?= $Page->DATEOFSTART->caption() ?></template></span></td>
        <td data-name="DATEOFSTART" <?= $Page->DATEOFSTART->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_DATEOFSTART"><span id="el_ivf_et_chart_DATEOFSTART">
<span<?= $Page->DATEOFSTART->viewAttributes() ?>>
<?= $Page->DATEOFSTART->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
    <tr id="r_DATEOFEMBRYOTRANSFER">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_DATEOFEMBRYOTRANSFER"><template id="tpc_ivf_et_chart_DATEOFEMBRYOTRANSFER"><?= $Page->DATEOFEMBRYOTRANSFER->caption() ?></template></span></td>
        <td data-name="DATEOFEMBRYOTRANSFER" <?= $Page->DATEOFEMBRYOTRANSFER->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_DATEOFEMBRYOTRANSFER"><span id="el_ivf_et_chart_DATEOFEMBRYOTRANSFER">
<span<?= $Page->DATEOFEMBRYOTRANSFER->viewAttributes() ?>>
<?= $Page->DATEOFEMBRYOTRANSFER->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
    <tr id="r_DAYOFEMBRYOTRANSFER">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_DAYOFEMBRYOTRANSFER"><template id="tpc_ivf_et_chart_DAYOFEMBRYOTRANSFER"><?= $Page->DAYOFEMBRYOTRANSFER->caption() ?></template></span></td>
        <td data-name="DAYOFEMBRYOTRANSFER" <?= $Page->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_DAYOFEMBRYOTRANSFER"><span id="el_ivf_et_chart_DAYOFEMBRYOTRANSFER">
<span<?= $Page->DAYOFEMBRYOTRANSFER->viewAttributes() ?>>
<?= $Page->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
    <tr id="r_NOOFEMBRYOSTHAWED">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_NOOFEMBRYOSTHAWED"><template id="tpc_ivf_et_chart_NOOFEMBRYOSTHAWED"><?= $Page->NOOFEMBRYOSTHAWED->caption() ?></template></span></td>
        <td data-name="NOOFEMBRYOSTHAWED" <?= $Page->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_NOOFEMBRYOSTHAWED"><span id="el_ivf_et_chart_NOOFEMBRYOSTHAWED">
<span<?= $Page->NOOFEMBRYOSTHAWED->viewAttributes() ?>>
<?= $Page->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
    <tr id="r_NOOFEMBRYOSTRANSFERRED">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_NOOFEMBRYOSTRANSFERRED"><template id="tpc_ivf_et_chart_NOOFEMBRYOSTRANSFERRED"><?= $Page->NOOFEMBRYOSTRANSFERRED->caption() ?></template></span></td>
        <td data-name="NOOFEMBRYOSTRANSFERRED" <?= $Page->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_NOOFEMBRYOSTRANSFERRED"><span id="el_ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
<span<?= $Page->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>>
<?= $Page->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
    <tr id="r_DAYOFEMBRYOS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_DAYOFEMBRYOS"><template id="tpc_ivf_et_chart_DAYOFEMBRYOS"><?= $Page->DAYOFEMBRYOS->caption() ?></template></span></td>
        <td data-name="DAYOFEMBRYOS" <?= $Page->DAYOFEMBRYOS->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_DAYOFEMBRYOS"><span id="el_ivf_et_chart_DAYOFEMBRYOS">
<span<?= $Page->DAYOFEMBRYOS->viewAttributes() ?>>
<?= $Page->DAYOFEMBRYOS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
    <tr id="r_CRYOPRESERVEDEMBRYOS">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_CRYOPRESERVEDEMBRYOS"><template id="tpc_ivf_et_chart_CRYOPRESERVEDEMBRYOS"><?= $Page->CRYOPRESERVEDEMBRYOS->caption() ?></template></span></td>
        <td data-name="CRYOPRESERVEDEMBRYOS" <?= $Page->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_CRYOPRESERVEDEMBRYOS"><span id="el_ivf_et_chart_CRYOPRESERVEDEMBRYOS">
<span<?= $Page->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>>
<?= $Page->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Code1->Visible) { // Code1 ?>
    <tr id="r_Code1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Code1"><template id="tpc_ivf_et_chart_Code1"><?= $Page->Code1->caption() ?></template></span></td>
        <td data-name="Code1" <?= $Page->Code1->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_Code1"><span id="el_ivf_et_chart_Code1">
<span<?= $Page->Code1->viewAttributes() ?>>
<?= $Page->Code1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Code2->Visible) { // Code2 ?>
    <tr id="r_Code2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Code2"><template id="tpc_ivf_et_chart_Code2"><?= $Page->Code2->caption() ?></template></span></td>
        <td data-name="Code2" <?= $Page->Code2->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_Code2"><span id="el_ivf_et_chart_Code2">
<span<?= $Page->Code2->viewAttributes() ?>>
<?= $Page->Code2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CellStage1->Visible) { // CellStage1 ?>
    <tr id="r_CellStage1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_CellStage1"><template id="tpc_ivf_et_chart_CellStage1"><?= $Page->CellStage1->caption() ?></template></span></td>
        <td data-name="CellStage1" <?= $Page->CellStage1->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_CellStage1"><span id="el_ivf_et_chart_CellStage1">
<span<?= $Page->CellStage1->viewAttributes() ?>>
<?= $Page->CellStage1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CellStage2->Visible) { // CellStage2 ?>
    <tr id="r_CellStage2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_CellStage2"><template id="tpc_ivf_et_chart_CellStage2"><?= $Page->CellStage2->caption() ?></template></span></td>
        <td data-name="CellStage2" <?= $Page->CellStage2->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_CellStage2"><span id="el_ivf_et_chart_CellStage2">
<span<?= $Page->CellStage2->viewAttributes() ?>>
<?= $Page->CellStage2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Grade1->Visible) { // Grade1 ?>
    <tr id="r_Grade1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Grade1"><template id="tpc_ivf_et_chart_Grade1"><?= $Page->Grade1->caption() ?></template></span></td>
        <td data-name="Grade1" <?= $Page->Grade1->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_Grade1"><span id="el_ivf_et_chart_Grade1">
<span<?= $Page->Grade1->viewAttributes() ?>>
<?= $Page->Grade1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Grade2->Visible) { // Grade2 ?>
    <tr id="r_Grade2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Grade2"><template id="tpc_ivf_et_chart_Grade2"><?= $Page->Grade2->caption() ?></template></span></td>
        <td data-name="Grade2" <?= $Page->Grade2->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_Grade2"><span id="el_ivf_et_chart_Grade2">
<span<?= $Page->Grade2->viewAttributes() ?>>
<?= $Page->Grade2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProcedureRecord->Visible) { // ProcedureRecord ?>
    <tr id="r_ProcedureRecord">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ProcedureRecord"><template id="tpc_ivf_et_chart_ProcedureRecord"><?= $Page->ProcedureRecord->caption() ?></template></span></td>
        <td data-name="ProcedureRecord" <?= $Page->ProcedureRecord->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_ProcedureRecord"><span id="el_ivf_et_chart_ProcedureRecord">
<span<?= $Page->ProcedureRecord->viewAttributes() ?>>
<?= $Page->ProcedureRecord->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Medicationsadvised->Visible) { // Medicationsadvised ?>
    <tr id="r_Medicationsadvised">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_Medicationsadvised"><template id="tpc_ivf_et_chart_Medicationsadvised"><?= $Page->Medicationsadvised->caption() ?></template></span></td>
        <td data-name="Medicationsadvised" <?= $Page->Medicationsadvised->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_Medicationsadvised"><span id="el_ivf_et_chart_Medicationsadvised">
<span<?= $Page->Medicationsadvised->viewAttributes() ?>>
<?= $Page->Medicationsadvised->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PostProcedureInstructions->Visible) { // PostProcedureInstructions ?>
    <tr id="r_PostProcedureInstructions">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_PostProcedureInstructions"><template id="tpc_ivf_et_chart_PostProcedureInstructions"><?= $Page->PostProcedureInstructions->caption() ?></template></span></td>
        <td data-name="PostProcedureInstructions" <?= $Page->PostProcedureInstructions->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_PostProcedureInstructions"><span id="el_ivf_et_chart_PostProcedureInstructions">
<span<?= $Page->PostProcedureInstructions->viewAttributes() ?>>
<?= $Page->PostProcedureInstructions->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
    <tr id="r_PregnancyTestingWithSerumBetaHcG">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_PregnancyTestingWithSerumBetaHcG"><template id="tpc_ivf_et_chart_PregnancyTestingWithSerumBetaHcG"><?= $Page->PregnancyTestingWithSerumBetaHcG->caption() ?></template></span></td>
        <td data-name="PregnancyTestingWithSerumBetaHcG" <?= $Page->PregnancyTestingWithSerumBetaHcG->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_PregnancyTestingWithSerumBetaHcG"><span id="el_ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
<span<?= $Page->PregnancyTestingWithSerumBetaHcG->viewAttributes() ?>>
<?= $Page->PregnancyTestingWithSerumBetaHcG->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReviewDate->Visible) { // ReviewDate ?>
    <tr id="r_ReviewDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ReviewDate"><template id="tpc_ivf_et_chart_ReviewDate"><?= $Page->ReviewDate->caption() ?></template></span></td>
        <td data-name="ReviewDate" <?= $Page->ReviewDate->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_ReviewDate"><span id="el_ivf_et_chart_ReviewDate">
<span<?= $Page->ReviewDate->viewAttributes() ?>>
<?= $Page->ReviewDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReviewDoctor->Visible) { // ReviewDoctor ?>
    <tr id="r_ReviewDoctor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_ReviewDoctor"><template id="tpc_ivf_et_chart_ReviewDoctor"><?= $Page->ReviewDoctor->caption() ?></template></span></td>
        <td data-name="ReviewDoctor" <?= $Page->ReviewDoctor->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_ReviewDoctor"><span id="el_ivf_et_chart_ReviewDoctor">
<span<?= $Page->ReviewDoctor->viewAttributes() ?>>
<?= $Page->ReviewDoctor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TemplateProcedureRecord->Visible) { // TemplateProcedureRecord ?>
    <tr id="r_TemplateProcedureRecord">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_TemplateProcedureRecord"><template id="tpc_ivf_et_chart_TemplateProcedureRecord"><?= $Page->TemplateProcedureRecord->caption() ?></template></span></td>
        <td data-name="TemplateProcedureRecord" <?= $Page->TemplateProcedureRecord->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_TemplateProcedureRecord"><span id="el_ivf_et_chart_TemplateProcedureRecord">
<span<?= $Page->TemplateProcedureRecord->viewAttributes() ?>>
<?= $Page->TemplateProcedureRecord->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TemplateMedicationsadvised->Visible) { // TemplateMedicationsadvised ?>
    <tr id="r_TemplateMedicationsadvised">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_TemplateMedicationsadvised"><template id="tpc_ivf_et_chart_TemplateMedicationsadvised"><?= $Page->TemplateMedicationsadvised->caption() ?></template></span></td>
        <td data-name="TemplateMedicationsadvised" <?= $Page->TemplateMedicationsadvised->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_TemplateMedicationsadvised"><span id="el_ivf_et_chart_TemplateMedicationsadvised">
<span<?= $Page->TemplateMedicationsadvised->viewAttributes() ?>>
<?= $Page->TemplateMedicationsadvised->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TemplatePostProcedureInstructions->Visible) { // TemplatePostProcedureInstructions ?>
    <tr id="r_TemplatePostProcedureInstructions">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_TemplatePostProcedureInstructions"><template id="tpc_ivf_et_chart_TemplatePostProcedureInstructions"><?= $Page->TemplatePostProcedureInstructions->caption() ?></template></span></td>
        <td data-name="TemplatePostProcedureInstructions" <?= $Page->TemplatePostProcedureInstructions->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_TemplatePostProcedureInstructions"><span id="el_ivf_et_chart_TemplatePostProcedureInstructions">
<span<?= $Page->TemplatePostProcedureInstructions->viewAttributes() ?>>
<?= $Page->TemplatePostProcedureInstructions->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <tr id="r_TidNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_et_chart_TidNo"><template id="tpc_ivf_et_chart_TidNo"><?= $Page->TidNo->caption() ?></template></span></td>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_ivf_et_chart_TidNo"><span id="el_ivf_et_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_ivf_et_chartview" class="ew-custom-template"></div>
<template id="tpm_ivf_et_chartview">
<div id="ct_IvfEtChartView"><style>
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
<slot class="ew-slot" name="tpx_RIDNO"></slot>
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
				<h3 class="card-title">ET chart</h3>
			</div>
			<div class="card-body">
			<table class="ew-table" style="width:100%;">
				<tbody>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_ARTCycle"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_ARTCycle"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_Consultant"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_Consultant"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_InseminatinTechnique"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_InseminatinTechnique"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_IndicationForART"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_IndicationForART"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_PreTreatment"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_PreTreatment"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_Hysteroscopy"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_Hysteroscopy"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_EndometrialScratching"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_EndometrialScratching"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_TrialCannulation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_TrialCannulation"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_CYCLETYPE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_CYCLETYPE"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_HRTCYCLE"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_HRTCYCLE"></slot></span>
						</td>
					</tr>
					<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_OralEstrogenDosage"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_OralEstrogenDosage"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_VaginalEstrogen"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_VaginalEstrogen"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_GCSF"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_GCSF"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_ActivatedPRP"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_ActivatedPRP"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_ERA"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_ERA"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_UCLcm"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_UCLcm"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_DATEOFSTART"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_DATEOFSTART"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_DATEOFEMBRYOTRANSFER"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_DATEOFEMBRYOTRANSFER"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_DAYOFEMBRYOTRANSFER"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_DAYOFEMBRYOTRANSFER"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_NOOFEMBRYOSTHAWED"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_NOOFEMBRYOSTHAWED"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_NOOFEMBRYOSTRANSFERRED"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_NOOFEMBRYOSTRANSFERRED"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_DAYOFEMBRYOS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_DAYOFEMBRYOS"></slot></span>
						</td>
					</tr>
						<tr>
						<td style="width:50%">
							<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_CRYOPRESERVEDEMBRYOS"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_CRYOPRESERVEDEMBRYOS"></slot></span>
						</td>
						<td style="width:50%">
							<span class="ew-cell"></span>
						</td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Embryo development summary</h3>
			</div>
			<div class="card-body"  style="overflow-x:auto;">
			<table   class="table table-striped ew-table ew-export-table" style="width:100%;">
			<thead>
				<tr>
					<td ><span class="ew-cell">Embryo</span></td>
					<td ><span class="ew-cell">Code</span></td>
					<td><span class="ew-cell">Day</span></td>
					<td ><span class="ew-cell">Cell Stage</span></td>
					<td><span class="ew-cell">Grade</span></td>
					<td><span class="ew-cell">State</span></td>
					</tr>
		    </thead>
			<tbody>
				<tr>
					<td><span class="ew-cell">1</span></td>
					<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_Code1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_Code1"></slot></span></td>
					<td><span class="ew-cell">D5</span></td>
					<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_CellStage1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_CellStage1"></slot></span></td>
					<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_Grade1"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_Grade1"></slot></span></td>
					<td><span class="ew-cell">Transferred</span></td>
				</tr>
				<tr>
					<td><span class="ew-cell">2</span></td>
					<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_Code2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_Code2"></slot></span></td>
					<td><span class="ew-cell">D6</span></td>
					<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_CellStage2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_CellStage2"></slot></span></td>
					<td><span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_Grade2"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_Grade2"></slot></span></td>
					<td><span class="ew-cell">Transferred</span></td>
				</tr>
			</tbody>
			</table>				  
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
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Procedure</h3>
			</div>
			<div class="card-body">			
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_et_chart_TemplateProcedureRecord"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_TemplateProcedureRecord"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_ProcedureRecord"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_ProcedureRecord"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_et_chart_TemplateMedicationsadvised"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_TemplateMedicationsadvised"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_Medicationsadvised"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_Medicationsadvised"></slot></span>
				  </div>
				  <div class="ew-row">
				  <slot class="ew-slot" name="tpc_ivf_et_chart_TemplatePostProcedureInstructions"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_TemplatePostProcedureInstructions"></slot>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_PostProcedureInstructions"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_PostProcedureInstructions"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_PregnancyTestingWithSerumBetaHcG"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_PregnancyTestingWithSerumBetaHcG"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_ReviewDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_ReviewDate"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_et_chart_ReviewDoctor"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_et_chart_ReviewDoctor"></slot></span>
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
    ew.applyTemplate("tpd_ivf_et_chartview", "tpm_ivf_et_chartview", "ivf_et_chartview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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

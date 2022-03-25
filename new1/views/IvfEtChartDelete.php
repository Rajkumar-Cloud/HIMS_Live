<?php

namespace PHPMaker2021\project3;

// Page object
$IvfEtChartDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fivf_et_chartdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fivf_et_chartdelete = currentForm = new ew.Form("fivf_et_chartdelete", "delete");
    loadjs.done("fivf_et_chartdelete");
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
<form name="fivf_et_chartdelete" id="fivf_et_chartdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_et_chart">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_ivf_et_chart_id" class="ivf_et_chart_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th class="<?= $Page->RIDNo->headerCellClass() ?>"><span id="elh_ivf_et_chart_RIDNo" class="ivf_et_chart_RIDNo"><?= $Page->RIDNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><span id="elh_ivf_et_chart_Name" class="ivf_et_chart_Name"><?= $Page->Name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <th class="<?= $Page->ARTCycle->headerCellClass() ?>"><span id="elh_ivf_et_chart_ARTCycle" class="ivf_et_chart_ARTCycle"><?= $Page->ARTCycle->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <th class="<?= $Page->Consultant->headerCellClass() ?>"><span id="elh_ivf_et_chart_Consultant" class="ivf_et_chart_Consultant"><?= $Page->Consultant->caption() ?></span></th>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <th class="<?= $Page->InseminatinTechnique->headerCellClass() ?>"><span id="elh_ivf_et_chart_InseminatinTechnique" class="ivf_et_chart_InseminatinTechnique"><?= $Page->InseminatinTechnique->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
        <th class="<?= $Page->IndicationForART->headerCellClass() ?>"><span id="elh_ivf_et_chart_IndicationForART" class="ivf_et_chart_IndicationForART"><?= $Page->IndicationForART->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PreTreatment->Visible) { // PreTreatment ?>
        <th class="<?= $Page->PreTreatment->headerCellClass() ?>"><span id="elh_ivf_et_chart_PreTreatment" class="ivf_et_chart_PreTreatment"><?= $Page->PreTreatment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
        <th class="<?= $Page->Hysteroscopy->headerCellClass() ?>"><span id="elh_ivf_et_chart_Hysteroscopy" class="ivf_et_chart_Hysteroscopy"><?= $Page->Hysteroscopy->caption() ?></span></th>
<?php } ?>
<?php if ($Page->EndometrialScratching->Visible) { // EndometrialScratching ?>
        <th class="<?= $Page->EndometrialScratching->headerCellClass() ?>"><span id="elh_ivf_et_chart_EndometrialScratching" class="ivf_et_chart_EndometrialScratching"><?= $Page->EndometrialScratching->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
        <th class="<?= $Page->TrialCannulation->headerCellClass() ?>"><span id="elh_ivf_et_chart_TrialCannulation" class="ivf_et_chart_TrialCannulation"><?= $Page->TrialCannulation->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CYCLETYPE->Visible) { // CYCLETYPE ?>
        <th class="<?= $Page->CYCLETYPE->headerCellClass() ?>"><span id="elh_ivf_et_chart_CYCLETYPE" class="ivf_et_chart_CYCLETYPE"><?= $Page->CYCLETYPE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HRTCYCLE->Visible) { // HRTCYCLE ?>
        <th class="<?= $Page->HRTCYCLE->headerCellClass() ?>"><span id="elh_ivf_et_chart_HRTCYCLE" class="ivf_et_chart_HRTCYCLE"><?= $Page->HRTCYCLE->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
        <th class="<?= $Page->OralEstrogenDosage->headerCellClass() ?>"><span id="elh_ivf_et_chart_OralEstrogenDosage" class="ivf_et_chart_OralEstrogenDosage"><?= $Page->OralEstrogenDosage->caption() ?></span></th>
<?php } ?>
<?php if ($Page->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
        <th class="<?= $Page->VaginalEstrogen->headerCellClass() ?>"><span id="elh_ivf_et_chart_VaginalEstrogen" class="ivf_et_chart_VaginalEstrogen"><?= $Page->VaginalEstrogen->caption() ?></span></th>
<?php } ?>
<?php if ($Page->GCSF->Visible) { // GCSF ?>
        <th class="<?= $Page->GCSF->headerCellClass() ?>"><span id="elh_ivf_et_chart_GCSF" class="ivf_et_chart_GCSF"><?= $Page->GCSF->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ActivatedPRP->Visible) { // ActivatedPRP ?>
        <th class="<?= $Page->ActivatedPRP->headerCellClass() ?>"><span id="elh_ivf_et_chart_ActivatedPRP" class="ivf_et_chart_ActivatedPRP"><?= $Page->ActivatedPRP->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ERA->Visible) { // ERA ?>
        <th class="<?= $Page->ERA->headerCellClass() ?>"><span id="elh_ivf_et_chart_ERA" class="ivf_et_chart_ERA"><?= $Page->ERA->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UCLcm->Visible) { // UCLcm ?>
        <th class="<?= $Page->UCLcm->headerCellClass() ?>"><span id="elh_ivf_et_chart_UCLcm" class="ivf_et_chart_UCLcm"><?= $Page->UCLcm->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DATEOFSTART->Visible) { // DATEOFSTART ?>
        <th class="<?= $Page->DATEOFSTART->headerCellClass() ?>"><span id="elh_ivf_et_chart_DATEOFSTART" class="ivf_et_chart_DATEOFSTART"><?= $Page->DATEOFSTART->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
        <th class="<?= $Page->DATEOFEMBRYOTRANSFER->headerCellClass() ?>"><span id="elh_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="ivf_et_chart_DATEOFEMBRYOTRANSFER"><?= $Page->DATEOFEMBRYOTRANSFER->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
        <th class="<?= $Page->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><span id="elh_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="ivf_et_chart_DAYOFEMBRYOTRANSFER"><?= $Page->DAYOFEMBRYOTRANSFER->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
        <th class="<?= $Page->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><span id="elh_ivf_et_chart_NOOFEMBRYOSTHAWED" class="ivf_et_chart_NOOFEMBRYOSTHAWED"><?= $Page->NOOFEMBRYOSTHAWED->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
        <th class="<?= $Page->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><span id="elh_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_et_chart_NOOFEMBRYOSTRANSFERRED"><?= $Page->NOOFEMBRYOSTRANSFERRED->caption() ?></span></th>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
        <th class="<?= $Page->DAYOFEMBRYOS->headerCellClass() ?>"><span id="elh_ivf_et_chart_DAYOFEMBRYOS" class="ivf_et_chart_DAYOFEMBRYOS"><?= $Page->DAYOFEMBRYOS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
        <th class="<?= $Page->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><span id="elh_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="ivf_et_chart_CRYOPRESERVEDEMBRYOS"><?= $Page->CRYOPRESERVEDEMBRYOS->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Code1->Visible) { // Code1 ?>
        <th class="<?= $Page->Code1->headerCellClass() ?>"><span id="elh_ivf_et_chart_Code1" class="ivf_et_chart_Code1"><?= $Page->Code1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Code2->Visible) { // Code2 ?>
        <th class="<?= $Page->Code2->headerCellClass() ?>"><span id="elh_ivf_et_chart_Code2" class="ivf_et_chart_Code2"><?= $Page->Code2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CellStage1->Visible) { // CellStage1 ?>
        <th class="<?= $Page->CellStage1->headerCellClass() ?>"><span id="elh_ivf_et_chart_CellStage1" class="ivf_et_chart_CellStage1"><?= $Page->CellStage1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->CellStage2->Visible) { // CellStage2 ?>
        <th class="<?= $Page->CellStage2->headerCellClass() ?>"><span id="elh_ivf_et_chart_CellStage2" class="ivf_et_chart_CellStage2"><?= $Page->CellStage2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Grade1->Visible) { // Grade1 ?>
        <th class="<?= $Page->Grade1->headerCellClass() ?>"><span id="elh_ivf_et_chart_Grade1" class="ivf_et_chart_Grade1"><?= $Page->Grade1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Grade2->Visible) { // Grade2 ?>
        <th class="<?= $Page->Grade2->headerCellClass() ?>"><span id="elh_ivf_et_chart_Grade2" class="ivf_et_chart_Grade2"><?= $Page->Grade2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
        <th class="<?= $Page->PregnancyTestingWithSerumBetaHcG->headerCellClass() ?>"><span id="elh_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="ivf_et_chart_PregnancyTestingWithSerumBetaHcG"><?= $Page->PregnancyTestingWithSerumBetaHcG->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReviewDate->Visible) { // ReviewDate ?>
        <th class="<?= $Page->ReviewDate->headerCellClass() ?>"><span id="elh_ivf_et_chart_ReviewDate" class="ivf_et_chart_ReviewDate"><?= $Page->ReviewDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ReviewDoctor->Visible) { // ReviewDoctor ?>
        <th class="<?= $Page->ReviewDoctor->headerCellClass() ?>"><span id="elh_ivf_et_chart_ReviewDoctor" class="ivf_et_chart_ReviewDoctor"><?= $Page->ReviewDoctor->caption() ?></span></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><span id="elh_ivf_et_chart_TidNo" class="ivf_et_chart_TidNo"><?= $Page->TidNo->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_id" class="ivf_et_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_RIDNo" class="ivf_et_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <td <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_Name" class="ivf_et_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <td <?= $Page->ARTCycle->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_ARTCycle" class="ivf_et_chart_ARTCycle">
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <td <?= $Page->Consultant->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_Consultant" class="ivf_et_chart_Consultant">
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <td <?= $Page->InseminatinTechnique->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_InseminatinTechnique" class="ivf_et_chart_InseminatinTechnique">
<span<?= $Page->InseminatinTechnique->viewAttributes() ?>>
<?= $Page->InseminatinTechnique->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
        <td <?= $Page->IndicationForART->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_IndicationForART" class="ivf_et_chart_IndicationForART">
<span<?= $Page->IndicationForART->viewAttributes() ?>>
<?= $Page->IndicationForART->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PreTreatment->Visible) { // PreTreatment ?>
        <td <?= $Page->PreTreatment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_PreTreatment" class="ivf_et_chart_PreTreatment">
<span<?= $Page->PreTreatment->viewAttributes() ?>>
<?= $Page->PreTreatment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
        <td <?= $Page->Hysteroscopy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_Hysteroscopy" class="ivf_et_chart_Hysteroscopy">
<span<?= $Page->Hysteroscopy->viewAttributes() ?>>
<?= $Page->Hysteroscopy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->EndometrialScratching->Visible) { // EndometrialScratching ?>
        <td <?= $Page->EndometrialScratching->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_EndometrialScratching" class="ivf_et_chart_EndometrialScratching">
<span<?= $Page->EndometrialScratching->viewAttributes() ?>>
<?= $Page->EndometrialScratching->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
        <td <?= $Page->TrialCannulation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_TrialCannulation" class="ivf_et_chart_TrialCannulation">
<span<?= $Page->TrialCannulation->viewAttributes() ?>>
<?= $Page->TrialCannulation->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CYCLETYPE->Visible) { // CYCLETYPE ?>
        <td <?= $Page->CYCLETYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_CYCLETYPE" class="ivf_et_chart_CYCLETYPE">
<span<?= $Page->CYCLETYPE->viewAttributes() ?>>
<?= $Page->CYCLETYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HRTCYCLE->Visible) { // HRTCYCLE ?>
        <td <?= $Page->HRTCYCLE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_HRTCYCLE" class="ivf_et_chart_HRTCYCLE">
<span<?= $Page->HRTCYCLE->viewAttributes() ?>>
<?= $Page->HRTCYCLE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
        <td <?= $Page->OralEstrogenDosage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_OralEstrogenDosage" class="ivf_et_chart_OralEstrogenDosage">
<span<?= $Page->OralEstrogenDosage->viewAttributes() ?>>
<?= $Page->OralEstrogenDosage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
        <td <?= $Page->VaginalEstrogen->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_VaginalEstrogen" class="ivf_et_chart_VaginalEstrogen">
<span<?= $Page->VaginalEstrogen->viewAttributes() ?>>
<?= $Page->VaginalEstrogen->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->GCSF->Visible) { // GCSF ?>
        <td <?= $Page->GCSF->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_GCSF" class="ivf_et_chart_GCSF">
<span<?= $Page->GCSF->viewAttributes() ?>>
<?= $Page->GCSF->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ActivatedPRP->Visible) { // ActivatedPRP ?>
        <td <?= $Page->ActivatedPRP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_ActivatedPRP" class="ivf_et_chart_ActivatedPRP">
<span<?= $Page->ActivatedPRP->viewAttributes() ?>>
<?= $Page->ActivatedPRP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ERA->Visible) { // ERA ?>
        <td <?= $Page->ERA->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_ERA" class="ivf_et_chart_ERA">
<span<?= $Page->ERA->viewAttributes() ?>>
<?= $Page->ERA->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UCLcm->Visible) { // UCLcm ?>
        <td <?= $Page->UCLcm->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_UCLcm" class="ivf_et_chart_UCLcm">
<span<?= $Page->UCLcm->viewAttributes() ?>>
<?= $Page->UCLcm->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DATEOFSTART->Visible) { // DATEOFSTART ?>
        <td <?= $Page->DATEOFSTART->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_DATEOFSTART" class="ivf_et_chart_DATEOFSTART">
<span<?= $Page->DATEOFSTART->viewAttributes() ?>>
<?= $Page->DATEOFSTART->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DATEOFEMBRYOTRANSFER->Visible) { // DATEOFEMBRYOTRANSFER ?>
        <td <?= $Page->DATEOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_DATEOFEMBRYOTRANSFER" class="ivf_et_chart_DATEOFEMBRYOTRANSFER">
<span<?= $Page->DATEOFEMBRYOTRANSFER->viewAttributes() ?>>
<?= $Page->DATEOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
        <td <?= $Page->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_DAYOFEMBRYOTRANSFER" class="ivf_et_chart_DAYOFEMBRYOTRANSFER">
<span<?= $Page->DAYOFEMBRYOTRANSFER->viewAttributes() ?>>
<?= $Page->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
        <td <?= $Page->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_NOOFEMBRYOSTHAWED" class="ivf_et_chart_NOOFEMBRYOSTHAWED">
<span<?= $Page->NOOFEMBRYOSTHAWED->viewAttributes() ?>>
<?= $Page->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
        <td <?= $Page->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_NOOFEMBRYOSTRANSFERRED" class="ivf_et_chart_NOOFEMBRYOSTRANSFERRED">
<span<?= $Page->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>>
<?= $Page->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
        <td <?= $Page->DAYOFEMBRYOS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_DAYOFEMBRYOS" class="ivf_et_chart_DAYOFEMBRYOS">
<span<?= $Page->DAYOFEMBRYOS->viewAttributes() ?>>
<?= $Page->DAYOFEMBRYOS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
        <td <?= $Page->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_CRYOPRESERVEDEMBRYOS" class="ivf_et_chart_CRYOPRESERVEDEMBRYOS">
<span<?= $Page->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>>
<?= $Page->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Code1->Visible) { // Code1 ?>
        <td <?= $Page->Code1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_Code1" class="ivf_et_chart_Code1">
<span<?= $Page->Code1->viewAttributes() ?>>
<?= $Page->Code1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Code2->Visible) { // Code2 ?>
        <td <?= $Page->Code2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_Code2" class="ivf_et_chart_Code2">
<span<?= $Page->Code2->viewAttributes() ?>>
<?= $Page->Code2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CellStage1->Visible) { // CellStage1 ?>
        <td <?= $Page->CellStage1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_CellStage1" class="ivf_et_chart_CellStage1">
<span<?= $Page->CellStage1->viewAttributes() ?>>
<?= $Page->CellStage1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->CellStage2->Visible) { // CellStage2 ?>
        <td <?= $Page->CellStage2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_CellStage2" class="ivf_et_chart_CellStage2">
<span<?= $Page->CellStage2->viewAttributes() ?>>
<?= $Page->CellStage2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Grade1->Visible) { // Grade1 ?>
        <td <?= $Page->Grade1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_Grade1" class="ivf_et_chart_Grade1">
<span<?= $Page->Grade1->viewAttributes() ?>>
<?= $Page->Grade1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Grade2->Visible) { // Grade2 ?>
        <td <?= $Page->Grade2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_Grade2" class="ivf_et_chart_Grade2">
<span<?= $Page->Grade2->viewAttributes() ?>>
<?= $Page->Grade2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PregnancyTestingWithSerumBetaHcG->Visible) { // PregnancyTestingWithSerumBetaHcG ?>
        <td <?= $Page->PregnancyTestingWithSerumBetaHcG->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_PregnancyTestingWithSerumBetaHcG" class="ivf_et_chart_PregnancyTestingWithSerumBetaHcG">
<span<?= $Page->PregnancyTestingWithSerumBetaHcG->viewAttributes() ?>>
<?= $Page->PregnancyTestingWithSerumBetaHcG->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReviewDate->Visible) { // ReviewDate ?>
        <td <?= $Page->ReviewDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_ReviewDate" class="ivf_et_chart_ReviewDate">
<span<?= $Page->ReviewDate->viewAttributes() ?>>
<?= $Page->ReviewDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ReviewDoctor->Visible) { // ReviewDoctor ?>
        <td <?= $Page->ReviewDoctor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_ReviewDoctor" class="ivf_et_chart_ReviewDoctor">
<span<?= $Page->ReviewDoctor->viewAttributes() ?>>
<?= $Page->ReviewDoctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_et_chart_TidNo" class="ivf_et_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
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

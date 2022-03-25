<?php

namespace PHPMaker2021\project3;

// Page object
$MonitorTreatmentPlanDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmonitor_treatment_plandelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    fmonitor_treatment_plandelete = currentForm = new ew.Form("fmonitor_treatment_plandelete", "delete");
    loadjs.done("fmonitor_treatment_plandelete");
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
<form name="fmonitor_treatment_plandelete" id="fmonitor_treatment_plandelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="monitor_treatment_plan">
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
        <th class="<?= $Page->id->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_id" class="monitor_treatment_plan_id"><?= $Page->id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
        <th class="<?= $Page->PatId->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_PatId" class="monitor_treatment_plan_PatId"><?= $Page->PatId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th class="<?= $Page->PatientId->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_PatientId" class="monitor_treatment_plan_PatientId"><?= $Page->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_PatientName" class="monitor_treatment_plan_PatientName"><?= $Page->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_Age" class="monitor_treatment_plan_Age"><?= $Page->Age->caption() ?></span></th>
<?php } ?>
<?php if ($Page->MobileNo->Visible) { // MobileNo ?>
        <th class="<?= $Page->MobileNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_MobileNo" class="monitor_treatment_plan_MobileNo"><?= $Page->MobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ConsultantName->Visible) { // ConsultantName ?>
        <th class="<?= $Page->ConsultantName->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_ConsultantName" class="monitor_treatment_plan_ConsultantName"><?= $Page->ConsultantName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RefDrName->Visible) { // RefDrName ?>
        <th class="<?= $Page->RefDrName->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_RefDrName" class="monitor_treatment_plan_RefDrName"><?= $Page->RefDrName->caption() ?></span></th>
<?php } ?>
<?php if ($Page->RefDrMobileNo->Visible) { // RefDrMobileNo ?>
        <th class="<?= $Page->RefDrMobileNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_RefDrMobileNo" class="monitor_treatment_plan_RefDrMobileNo"><?= $Page->RefDrMobileNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NewVisitDate->Visible) { // NewVisitDate ?>
        <th class="<?= $Page->NewVisitDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_NewVisitDate" class="monitor_treatment_plan_NewVisitDate"><?= $Page->NewVisitDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->NewVisitYesNo->Visible) { // NewVisitYesNo ?>
        <th class="<?= $Page->NewVisitYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_NewVisitYesNo" class="monitor_treatment_plan_NewVisitYesNo"><?= $Page->NewVisitYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
        <th class="<?= $Page->Treatment->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_Treatment" class="monitor_treatment_plan_Treatment"><?= $Page->Treatment->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IUIDoneDate1->Visible) { // IUIDoneDate1 ?>
        <th class="<?= $Page->IUIDoneDate1->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate1" class="monitor_treatment_plan_IUIDoneDate1"><?= $Page->IUIDoneDate1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IUIDoneYesNo1->Visible) { // IUIDoneYesNo1 ?>
        <th class="<?= $Page->IUIDoneYesNo1->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo1" class="monitor_treatment_plan_IUIDoneYesNo1"><?= $Page->IUIDoneYesNo1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UPTTestDate1->Visible) { // UPTTestDate1 ?>
        <th class="<?= $Page->UPTTestDate1->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestDate1" class="monitor_treatment_plan_UPTTestDate1"><?= $Page->UPTTestDate1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UPTTestYesNo1->Visible) { // UPTTestYesNo1 ?>
        <th class="<?= $Page->UPTTestYesNo1->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo1" class="monitor_treatment_plan_UPTTestYesNo1"><?= $Page->UPTTestYesNo1->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IUIDoneDate2->Visible) { // IUIDoneDate2 ?>
        <th class="<?= $Page->IUIDoneDate2->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate2" class="monitor_treatment_plan_IUIDoneDate2"><?= $Page->IUIDoneDate2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IUIDoneYesNo2->Visible) { // IUIDoneYesNo2 ?>
        <th class="<?= $Page->IUIDoneYesNo2->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo2" class="monitor_treatment_plan_IUIDoneYesNo2"><?= $Page->IUIDoneYesNo2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UPTTestDate2->Visible) { // UPTTestDate2 ?>
        <th class="<?= $Page->UPTTestDate2->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestDate2" class="monitor_treatment_plan_UPTTestDate2"><?= $Page->UPTTestDate2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UPTTestYesNo2->Visible) { // UPTTestYesNo2 ?>
        <th class="<?= $Page->UPTTestYesNo2->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo2" class="monitor_treatment_plan_UPTTestYesNo2"><?= $Page->UPTTestYesNo2->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IUIDoneDate3->Visible) { // IUIDoneDate3 ?>
        <th class="<?= $Page->IUIDoneDate3->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate3" class="monitor_treatment_plan_IUIDoneDate3"><?= $Page->IUIDoneDate3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IUIDoneYesNo3->Visible) { // IUIDoneYesNo3 ?>
        <th class="<?= $Page->IUIDoneYesNo3->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo3" class="monitor_treatment_plan_IUIDoneYesNo3"><?= $Page->IUIDoneYesNo3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UPTTestDate3->Visible) { // UPTTestDate3 ?>
        <th class="<?= $Page->UPTTestDate3->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestDate3" class="monitor_treatment_plan_UPTTestDate3"><?= $Page->UPTTestDate3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UPTTestYesNo3->Visible) { // UPTTestYesNo3 ?>
        <th class="<?= $Page->UPTTestYesNo3->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo3" class="monitor_treatment_plan_UPTTestYesNo3"><?= $Page->UPTTestYesNo3->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IUIDoneDate4->Visible) { // IUIDoneDate4 ?>
        <th class="<?= $Page->IUIDoneDate4->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate4" class="monitor_treatment_plan_IUIDoneDate4"><?= $Page->IUIDoneDate4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IUIDoneYesNo4->Visible) { // IUIDoneYesNo4 ?>
        <th class="<?= $Page->IUIDoneYesNo4->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo4" class="monitor_treatment_plan_IUIDoneYesNo4"><?= $Page->IUIDoneYesNo4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UPTTestDate4->Visible) { // UPTTestDate4 ?>
        <th class="<?= $Page->UPTTestDate4->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestDate4" class="monitor_treatment_plan_UPTTestDate4"><?= $Page->UPTTestDate4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->UPTTestYesNo4->Visible) { // UPTTestYesNo4 ?>
        <th class="<?= $Page->UPTTestYesNo4->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo4" class="monitor_treatment_plan_UPTTestYesNo4"><?= $Page->UPTTestYesNo4->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IVFStimulationDate->Visible) { // IVFStimulationDate ?>
        <th class="<?= $Page->IVFStimulationDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IVFStimulationDate" class="monitor_treatment_plan_IVFStimulationDate"><?= $Page->IVFStimulationDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->IVFStimulationYesNo->Visible) { // IVFStimulationYesNo ?>
        <th class="<?= $Page->IVFStimulationYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_IVFStimulationYesNo" class="monitor_treatment_plan_IVFStimulationYesNo"><?= $Page->IVFStimulationYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OPUDate->Visible) { // OPUDate ?>
        <th class="<?= $Page->OPUDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_OPUDate" class="monitor_treatment_plan_OPUDate"><?= $Page->OPUDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->OPUYesNo->Visible) { // OPUYesNo ?>
        <th class="<?= $Page->OPUYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_OPUYesNo" class="monitor_treatment_plan_OPUYesNo"><?= $Page->OPUYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ETDate->Visible) { // ETDate ?>
        <th class="<?= $Page->ETDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_ETDate" class="monitor_treatment_plan_ETDate"><?= $Page->ETDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->ETYesNo->Visible) { // ETYesNo ?>
        <th class="<?= $Page->ETYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_ETYesNo" class="monitor_treatment_plan_ETYesNo"><?= $Page->ETYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BetaHCGDate->Visible) { // BetaHCGDate ?>
        <th class="<?= $Page->BetaHCGDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_BetaHCGDate" class="monitor_treatment_plan_BetaHCGDate"><?= $Page->BetaHCGDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->BetaHCGYesNo->Visible) { // BetaHCGYesNo ?>
        <th class="<?= $Page->BetaHCGYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_BetaHCGYesNo" class="monitor_treatment_plan_BetaHCGYesNo"><?= $Page->BetaHCGYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FETDate->Visible) { // FETDate ?>
        <th class="<?= $Page->FETDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_FETDate" class="monitor_treatment_plan_FETDate"><?= $Page->FETDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FETYesNo->Visible) { // FETYesNo ?>
        <th class="<?= $Page->FETYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_FETYesNo" class="monitor_treatment_plan_FETYesNo"><?= $Page->FETYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FBetaHCGDate->Visible) { // FBetaHCGDate ?>
        <th class="<?= $Page->FBetaHCGDate->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_FBetaHCGDate" class="monitor_treatment_plan_FBetaHCGDate"><?= $Page->FBetaHCGDate->caption() ?></span></th>
<?php } ?>
<?php if ($Page->FBetaHCGYesNo->Visible) { // FBetaHCGYesNo ?>
        <th class="<?= $Page->FBetaHCGYesNo->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_FBetaHCGYesNo" class="monitor_treatment_plan_FBetaHCGYesNo"><?= $Page->FBetaHCGYesNo->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_createdby" class="monitor_treatment_plan_createdby"><?= $Page->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_createddatetime" class="monitor_treatment_plan_createddatetime"><?= $Page->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_modifiedby" class="monitor_treatment_plan_modifiedby"><?= $Page->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_modifieddatetime" class="monitor_treatment_plan_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><span id="elh_monitor_treatment_plan_HospID" class="monitor_treatment_plan_HospID"><?= $Page->HospID->caption() ?></span></th>
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
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_id" class="monitor_treatment_plan_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
        <td <?= $Page->PatId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_PatId" class="monitor_treatment_plan_PatId">
<span<?= $Page->PatId->viewAttributes() ?>>
<?= $Page->PatId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td <?= $Page->PatientId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_PatientId" class="monitor_treatment_plan_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td <?= $Page->PatientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_PatientName" class="monitor_treatment_plan_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <td <?= $Page->Age->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_Age" class="monitor_treatment_plan_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->MobileNo->Visible) { // MobileNo ?>
        <td <?= $Page->MobileNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_MobileNo" class="monitor_treatment_plan_MobileNo">
<span<?= $Page->MobileNo->viewAttributes() ?>>
<?= $Page->MobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ConsultantName->Visible) { // ConsultantName ?>
        <td <?= $Page->ConsultantName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_ConsultantName" class="monitor_treatment_plan_ConsultantName">
<span<?= $Page->ConsultantName->viewAttributes() ?>>
<?= $Page->ConsultantName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RefDrName->Visible) { // RefDrName ?>
        <td <?= $Page->RefDrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_RefDrName" class="monitor_treatment_plan_RefDrName">
<span<?= $Page->RefDrName->viewAttributes() ?>>
<?= $Page->RefDrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->RefDrMobileNo->Visible) { // RefDrMobileNo ?>
        <td <?= $Page->RefDrMobileNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_RefDrMobileNo" class="monitor_treatment_plan_RefDrMobileNo">
<span<?= $Page->RefDrMobileNo->viewAttributes() ?>>
<?= $Page->RefDrMobileNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NewVisitDate->Visible) { // NewVisitDate ?>
        <td <?= $Page->NewVisitDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_NewVisitDate" class="monitor_treatment_plan_NewVisitDate">
<span<?= $Page->NewVisitDate->viewAttributes() ?>>
<?= $Page->NewVisitDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->NewVisitYesNo->Visible) { // NewVisitYesNo ?>
        <td <?= $Page->NewVisitYesNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_NewVisitYesNo" class="monitor_treatment_plan_NewVisitYesNo">
<span<?= $Page->NewVisitYesNo->viewAttributes() ?>>
<?= $Page->NewVisitYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
        <td <?= $Page->Treatment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_Treatment" class="monitor_treatment_plan_Treatment">
<span<?= $Page->Treatment->viewAttributes() ?>>
<?= $Page->Treatment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IUIDoneDate1->Visible) { // IUIDoneDate1 ?>
        <td <?= $Page->IUIDoneDate1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IUIDoneDate1" class="monitor_treatment_plan_IUIDoneDate1">
<span<?= $Page->IUIDoneDate1->viewAttributes() ?>>
<?= $Page->IUIDoneDate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IUIDoneYesNo1->Visible) { // IUIDoneYesNo1 ?>
        <td <?= $Page->IUIDoneYesNo1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IUIDoneYesNo1" class="monitor_treatment_plan_IUIDoneYesNo1">
<span<?= $Page->IUIDoneYesNo1->viewAttributes() ?>>
<?= $Page->IUIDoneYesNo1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UPTTestDate1->Visible) { // UPTTestDate1 ?>
        <td <?= $Page->UPTTestDate1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_UPTTestDate1" class="monitor_treatment_plan_UPTTestDate1">
<span<?= $Page->UPTTestDate1->viewAttributes() ?>>
<?= $Page->UPTTestDate1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UPTTestYesNo1->Visible) { // UPTTestYesNo1 ?>
        <td <?= $Page->UPTTestYesNo1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_UPTTestYesNo1" class="monitor_treatment_plan_UPTTestYesNo1">
<span<?= $Page->UPTTestYesNo1->viewAttributes() ?>>
<?= $Page->UPTTestYesNo1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IUIDoneDate2->Visible) { // IUIDoneDate2 ?>
        <td <?= $Page->IUIDoneDate2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IUIDoneDate2" class="monitor_treatment_plan_IUIDoneDate2">
<span<?= $Page->IUIDoneDate2->viewAttributes() ?>>
<?= $Page->IUIDoneDate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IUIDoneYesNo2->Visible) { // IUIDoneYesNo2 ?>
        <td <?= $Page->IUIDoneYesNo2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IUIDoneYesNo2" class="monitor_treatment_plan_IUIDoneYesNo2">
<span<?= $Page->IUIDoneYesNo2->viewAttributes() ?>>
<?= $Page->IUIDoneYesNo2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UPTTestDate2->Visible) { // UPTTestDate2 ?>
        <td <?= $Page->UPTTestDate2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_UPTTestDate2" class="monitor_treatment_plan_UPTTestDate2">
<span<?= $Page->UPTTestDate2->viewAttributes() ?>>
<?= $Page->UPTTestDate2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UPTTestYesNo2->Visible) { // UPTTestYesNo2 ?>
        <td <?= $Page->UPTTestYesNo2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_UPTTestYesNo2" class="monitor_treatment_plan_UPTTestYesNo2">
<span<?= $Page->UPTTestYesNo2->viewAttributes() ?>>
<?= $Page->UPTTestYesNo2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IUIDoneDate3->Visible) { // IUIDoneDate3 ?>
        <td <?= $Page->IUIDoneDate3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IUIDoneDate3" class="monitor_treatment_plan_IUIDoneDate3">
<span<?= $Page->IUIDoneDate3->viewAttributes() ?>>
<?= $Page->IUIDoneDate3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IUIDoneYesNo3->Visible) { // IUIDoneYesNo3 ?>
        <td <?= $Page->IUIDoneYesNo3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IUIDoneYesNo3" class="monitor_treatment_plan_IUIDoneYesNo3">
<span<?= $Page->IUIDoneYesNo3->viewAttributes() ?>>
<?= $Page->IUIDoneYesNo3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UPTTestDate3->Visible) { // UPTTestDate3 ?>
        <td <?= $Page->UPTTestDate3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_UPTTestDate3" class="monitor_treatment_plan_UPTTestDate3">
<span<?= $Page->UPTTestDate3->viewAttributes() ?>>
<?= $Page->UPTTestDate3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UPTTestYesNo3->Visible) { // UPTTestYesNo3 ?>
        <td <?= $Page->UPTTestYesNo3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_UPTTestYesNo3" class="monitor_treatment_plan_UPTTestYesNo3">
<span<?= $Page->UPTTestYesNo3->viewAttributes() ?>>
<?= $Page->UPTTestYesNo3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IUIDoneDate4->Visible) { // IUIDoneDate4 ?>
        <td <?= $Page->IUIDoneDate4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IUIDoneDate4" class="monitor_treatment_plan_IUIDoneDate4">
<span<?= $Page->IUIDoneDate4->viewAttributes() ?>>
<?= $Page->IUIDoneDate4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IUIDoneYesNo4->Visible) { // IUIDoneYesNo4 ?>
        <td <?= $Page->IUIDoneYesNo4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IUIDoneYesNo4" class="monitor_treatment_plan_IUIDoneYesNo4">
<span<?= $Page->IUIDoneYesNo4->viewAttributes() ?>>
<?= $Page->IUIDoneYesNo4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UPTTestDate4->Visible) { // UPTTestDate4 ?>
        <td <?= $Page->UPTTestDate4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_UPTTestDate4" class="monitor_treatment_plan_UPTTestDate4">
<span<?= $Page->UPTTestDate4->viewAttributes() ?>>
<?= $Page->UPTTestDate4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->UPTTestYesNo4->Visible) { // UPTTestYesNo4 ?>
        <td <?= $Page->UPTTestYesNo4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_UPTTestYesNo4" class="monitor_treatment_plan_UPTTestYesNo4">
<span<?= $Page->UPTTestYesNo4->viewAttributes() ?>>
<?= $Page->UPTTestYesNo4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IVFStimulationDate->Visible) { // IVFStimulationDate ?>
        <td <?= $Page->IVFStimulationDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IVFStimulationDate" class="monitor_treatment_plan_IVFStimulationDate">
<span<?= $Page->IVFStimulationDate->viewAttributes() ?>>
<?= $Page->IVFStimulationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->IVFStimulationYesNo->Visible) { // IVFStimulationYesNo ?>
        <td <?= $Page->IVFStimulationYesNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_IVFStimulationYesNo" class="monitor_treatment_plan_IVFStimulationYesNo">
<span<?= $Page->IVFStimulationYesNo->viewAttributes() ?>>
<?= $Page->IVFStimulationYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OPUDate->Visible) { // OPUDate ?>
        <td <?= $Page->OPUDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_OPUDate" class="monitor_treatment_plan_OPUDate">
<span<?= $Page->OPUDate->viewAttributes() ?>>
<?= $Page->OPUDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->OPUYesNo->Visible) { // OPUYesNo ?>
        <td <?= $Page->OPUYesNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_OPUYesNo" class="monitor_treatment_plan_OPUYesNo">
<span<?= $Page->OPUYesNo->viewAttributes() ?>>
<?= $Page->OPUYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ETDate->Visible) { // ETDate ?>
        <td <?= $Page->ETDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_ETDate" class="monitor_treatment_plan_ETDate">
<span<?= $Page->ETDate->viewAttributes() ?>>
<?= $Page->ETDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->ETYesNo->Visible) { // ETYesNo ?>
        <td <?= $Page->ETYesNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_ETYesNo" class="monitor_treatment_plan_ETYesNo">
<span<?= $Page->ETYesNo->viewAttributes() ?>>
<?= $Page->ETYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BetaHCGDate->Visible) { // BetaHCGDate ?>
        <td <?= $Page->BetaHCGDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_BetaHCGDate" class="monitor_treatment_plan_BetaHCGDate">
<span<?= $Page->BetaHCGDate->viewAttributes() ?>>
<?= $Page->BetaHCGDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->BetaHCGYesNo->Visible) { // BetaHCGYesNo ?>
        <td <?= $Page->BetaHCGYesNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_BetaHCGYesNo" class="monitor_treatment_plan_BetaHCGYesNo">
<span<?= $Page->BetaHCGYesNo->viewAttributes() ?>>
<?= $Page->BetaHCGYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FETDate->Visible) { // FETDate ?>
        <td <?= $Page->FETDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_FETDate" class="monitor_treatment_plan_FETDate">
<span<?= $Page->FETDate->viewAttributes() ?>>
<?= $Page->FETDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FETYesNo->Visible) { // FETYesNo ?>
        <td <?= $Page->FETYesNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_FETYesNo" class="monitor_treatment_plan_FETYesNo">
<span<?= $Page->FETYesNo->viewAttributes() ?>>
<?= $Page->FETYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FBetaHCGDate->Visible) { // FBetaHCGDate ?>
        <td <?= $Page->FBetaHCGDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_FBetaHCGDate" class="monitor_treatment_plan_FBetaHCGDate">
<span<?= $Page->FBetaHCGDate->viewAttributes() ?>>
<?= $Page->FBetaHCGDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->FBetaHCGYesNo->Visible) { // FBetaHCGYesNo ?>
        <td <?= $Page->FBetaHCGYesNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_FBetaHCGYesNo" class="monitor_treatment_plan_FBetaHCGYesNo">
<span<?= $Page->FBetaHCGYesNo->viewAttributes() ?>>
<?= $Page->FBetaHCGYesNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <td <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_createdby" class="monitor_treatment_plan_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_createddatetime" class="monitor_treatment_plan_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_modifiedby" class="monitor_treatment_plan_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_modifieddatetime" class="monitor_treatment_plan_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <td <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_monitor_treatment_plan_HospID" class="monitor_treatment_plan_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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

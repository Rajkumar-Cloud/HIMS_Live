<?php

namespace PHPMaker2021\project3;

// Page object
$MonitorTreatmentPlanView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fmonitor_treatment_planview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fmonitor_treatment_planview = currentForm = new ew.Form("fmonitor_treatment_planview", "view");
    loadjs.done("fmonitor_treatment_planview");
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
<form name="fmonitor_treatment_planview" id="fmonitor_treatment_planview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="monitor_treatment_plan">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
    <tr id="r_PatId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_PatId"><?= $Page->PatId->caption() ?></span></td>
        <td data-name="PatId" <?= $Page->PatId->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_PatId">
<span<?= $Page->PatId->viewAttributes() ?>>
<?= $Page->PatId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <tr id="r_PatientId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_PatientId"><?= $Page->PatientId->caption() ?></span></td>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_PatientName"><?= $Page->PatientName->caption() ?></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_Age"><?= $Page->Age->caption() ?></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MobileNo->Visible) { // MobileNo ?>
    <tr id="r_MobileNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_MobileNo"><?= $Page->MobileNo->caption() ?></span></td>
        <td data-name="MobileNo" <?= $Page->MobileNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_MobileNo">
<span<?= $Page->MobileNo->viewAttributes() ?>>
<?= $Page->MobileNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ConsultantName->Visible) { // ConsultantName ?>
    <tr id="r_ConsultantName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_ConsultantName"><?= $Page->ConsultantName->caption() ?></span></td>
        <td data-name="ConsultantName" <?= $Page->ConsultantName->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_ConsultantName">
<span<?= $Page->ConsultantName->viewAttributes() ?>>
<?= $Page->ConsultantName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RefDrName->Visible) { // RefDrName ?>
    <tr id="r_RefDrName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_RefDrName"><?= $Page->RefDrName->caption() ?></span></td>
        <td data-name="RefDrName" <?= $Page->RefDrName->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_RefDrName">
<span<?= $Page->RefDrName->viewAttributes() ?>>
<?= $Page->RefDrName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RefDrMobileNo->Visible) { // RefDrMobileNo ?>
    <tr id="r_RefDrMobileNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_RefDrMobileNo"><?= $Page->RefDrMobileNo->caption() ?></span></td>
        <td data-name="RefDrMobileNo" <?= $Page->RefDrMobileNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_RefDrMobileNo">
<span<?= $Page->RefDrMobileNo->viewAttributes() ?>>
<?= $Page->RefDrMobileNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NewVisitDate->Visible) { // NewVisitDate ?>
    <tr id="r_NewVisitDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_NewVisitDate"><?= $Page->NewVisitDate->caption() ?></span></td>
        <td data-name="NewVisitDate" <?= $Page->NewVisitDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_NewVisitDate">
<span<?= $Page->NewVisitDate->viewAttributes() ?>>
<?= $Page->NewVisitDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NewVisitYesNo->Visible) { // NewVisitYesNo ?>
    <tr id="r_NewVisitYesNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_NewVisitYesNo"><?= $Page->NewVisitYesNo->caption() ?></span></td>
        <td data-name="NewVisitYesNo" <?= $Page->NewVisitYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_NewVisitYesNo">
<span<?= $Page->NewVisitYesNo->viewAttributes() ?>>
<?= $Page->NewVisitYesNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
    <tr id="r_Treatment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_Treatment"><?= $Page->Treatment->caption() ?></span></td>
        <td data-name="Treatment" <?= $Page->Treatment->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_Treatment">
<span<?= $Page->Treatment->viewAttributes() ?>>
<?= $Page->Treatment->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IUIDoneDate1->Visible) { // IUIDoneDate1 ?>
    <tr id="r_IUIDoneDate1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate1"><?= $Page->IUIDoneDate1->caption() ?></span></td>
        <td data-name="IUIDoneDate1" <?= $Page->IUIDoneDate1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate1">
<span<?= $Page->IUIDoneDate1->viewAttributes() ?>>
<?= $Page->IUIDoneDate1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IUIDoneYesNo1->Visible) { // IUIDoneYesNo1 ?>
    <tr id="r_IUIDoneYesNo1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo1"><?= $Page->IUIDoneYesNo1->caption() ?></span></td>
        <td data-name="IUIDoneYesNo1" <?= $Page->IUIDoneYesNo1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo1">
<span<?= $Page->IUIDoneYesNo1->viewAttributes() ?>>
<?= $Page->IUIDoneYesNo1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UPTTestDate1->Visible) { // UPTTestDate1 ?>
    <tr id="r_UPTTestDate1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestDate1"><?= $Page->UPTTestDate1->caption() ?></span></td>
        <td data-name="UPTTestDate1" <?= $Page->UPTTestDate1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate1">
<span<?= $Page->UPTTestDate1->viewAttributes() ?>>
<?= $Page->UPTTestDate1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UPTTestYesNo1->Visible) { // UPTTestYesNo1 ?>
    <tr id="r_UPTTestYesNo1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo1"><?= $Page->UPTTestYesNo1->caption() ?></span></td>
        <td data-name="UPTTestYesNo1" <?= $Page->UPTTestYesNo1->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo1">
<span<?= $Page->UPTTestYesNo1->viewAttributes() ?>>
<?= $Page->UPTTestYesNo1->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IUIDoneDate2->Visible) { // IUIDoneDate2 ?>
    <tr id="r_IUIDoneDate2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate2"><?= $Page->IUIDoneDate2->caption() ?></span></td>
        <td data-name="IUIDoneDate2" <?= $Page->IUIDoneDate2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate2">
<span<?= $Page->IUIDoneDate2->viewAttributes() ?>>
<?= $Page->IUIDoneDate2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IUIDoneYesNo2->Visible) { // IUIDoneYesNo2 ?>
    <tr id="r_IUIDoneYesNo2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo2"><?= $Page->IUIDoneYesNo2->caption() ?></span></td>
        <td data-name="IUIDoneYesNo2" <?= $Page->IUIDoneYesNo2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo2">
<span<?= $Page->IUIDoneYesNo2->viewAttributes() ?>>
<?= $Page->IUIDoneYesNo2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UPTTestDate2->Visible) { // UPTTestDate2 ?>
    <tr id="r_UPTTestDate2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestDate2"><?= $Page->UPTTestDate2->caption() ?></span></td>
        <td data-name="UPTTestDate2" <?= $Page->UPTTestDate2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate2">
<span<?= $Page->UPTTestDate2->viewAttributes() ?>>
<?= $Page->UPTTestDate2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UPTTestYesNo2->Visible) { // UPTTestYesNo2 ?>
    <tr id="r_UPTTestYesNo2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo2"><?= $Page->UPTTestYesNo2->caption() ?></span></td>
        <td data-name="UPTTestYesNo2" <?= $Page->UPTTestYesNo2->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo2">
<span<?= $Page->UPTTestYesNo2->viewAttributes() ?>>
<?= $Page->UPTTestYesNo2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IUIDoneDate3->Visible) { // IUIDoneDate3 ?>
    <tr id="r_IUIDoneDate3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate3"><?= $Page->IUIDoneDate3->caption() ?></span></td>
        <td data-name="IUIDoneDate3" <?= $Page->IUIDoneDate3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate3">
<span<?= $Page->IUIDoneDate3->viewAttributes() ?>>
<?= $Page->IUIDoneDate3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IUIDoneYesNo3->Visible) { // IUIDoneYesNo3 ?>
    <tr id="r_IUIDoneYesNo3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo3"><?= $Page->IUIDoneYesNo3->caption() ?></span></td>
        <td data-name="IUIDoneYesNo3" <?= $Page->IUIDoneYesNo3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo3">
<span<?= $Page->IUIDoneYesNo3->viewAttributes() ?>>
<?= $Page->IUIDoneYesNo3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UPTTestDate3->Visible) { // UPTTestDate3 ?>
    <tr id="r_UPTTestDate3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestDate3"><?= $Page->UPTTestDate3->caption() ?></span></td>
        <td data-name="UPTTestDate3" <?= $Page->UPTTestDate3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate3">
<span<?= $Page->UPTTestDate3->viewAttributes() ?>>
<?= $Page->UPTTestDate3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UPTTestYesNo3->Visible) { // UPTTestYesNo3 ?>
    <tr id="r_UPTTestYesNo3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo3"><?= $Page->UPTTestYesNo3->caption() ?></span></td>
        <td data-name="UPTTestYesNo3" <?= $Page->UPTTestYesNo3->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo3">
<span<?= $Page->UPTTestYesNo3->viewAttributes() ?>>
<?= $Page->UPTTestYesNo3->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IUIDoneDate4->Visible) { // IUIDoneDate4 ?>
    <tr id="r_IUIDoneDate4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneDate4"><?= $Page->IUIDoneDate4->caption() ?></span></td>
        <td data-name="IUIDoneDate4" <?= $Page->IUIDoneDate4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneDate4">
<span<?= $Page->IUIDoneDate4->viewAttributes() ?>>
<?= $Page->IUIDoneDate4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IUIDoneYesNo4->Visible) { // IUIDoneYesNo4 ?>
    <tr id="r_IUIDoneYesNo4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IUIDoneYesNo4"><?= $Page->IUIDoneYesNo4->caption() ?></span></td>
        <td data-name="IUIDoneYesNo4" <?= $Page->IUIDoneYesNo4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IUIDoneYesNo4">
<span<?= $Page->IUIDoneYesNo4->viewAttributes() ?>>
<?= $Page->IUIDoneYesNo4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UPTTestDate4->Visible) { // UPTTestDate4 ?>
    <tr id="r_UPTTestDate4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestDate4"><?= $Page->UPTTestDate4->caption() ?></span></td>
        <td data-name="UPTTestDate4" <?= $Page->UPTTestDate4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestDate4">
<span<?= $Page->UPTTestDate4->viewAttributes() ?>>
<?= $Page->UPTTestDate4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->UPTTestYesNo4->Visible) { // UPTTestYesNo4 ?>
    <tr id="r_UPTTestYesNo4">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_UPTTestYesNo4"><?= $Page->UPTTestYesNo4->caption() ?></span></td>
        <td data-name="UPTTestYesNo4" <?= $Page->UPTTestYesNo4->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_UPTTestYesNo4">
<span<?= $Page->UPTTestYesNo4->viewAttributes() ?>>
<?= $Page->UPTTestYesNo4->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IVFStimulationDate->Visible) { // IVFStimulationDate ?>
    <tr id="r_IVFStimulationDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IVFStimulationDate"><?= $Page->IVFStimulationDate->caption() ?></span></td>
        <td data-name="IVFStimulationDate" <?= $Page->IVFStimulationDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IVFStimulationDate">
<span<?= $Page->IVFStimulationDate->viewAttributes() ?>>
<?= $Page->IVFStimulationDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->IVFStimulationYesNo->Visible) { // IVFStimulationYesNo ?>
    <tr id="r_IVFStimulationYesNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_IVFStimulationYesNo"><?= $Page->IVFStimulationYesNo->caption() ?></span></td>
        <td data-name="IVFStimulationYesNo" <?= $Page->IVFStimulationYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_IVFStimulationYesNo">
<span<?= $Page->IVFStimulationYesNo->viewAttributes() ?>>
<?= $Page->IVFStimulationYesNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OPUDate->Visible) { // OPUDate ?>
    <tr id="r_OPUDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_OPUDate"><?= $Page->OPUDate->caption() ?></span></td>
        <td data-name="OPUDate" <?= $Page->OPUDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_OPUDate">
<span<?= $Page->OPUDate->viewAttributes() ?>>
<?= $Page->OPUDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->OPUYesNo->Visible) { // OPUYesNo ?>
    <tr id="r_OPUYesNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_OPUYesNo"><?= $Page->OPUYesNo->caption() ?></span></td>
        <td data-name="OPUYesNo" <?= $Page->OPUYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_OPUYesNo">
<span<?= $Page->OPUYesNo->viewAttributes() ?>>
<?= $Page->OPUYesNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ETDate->Visible) { // ETDate ?>
    <tr id="r_ETDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_ETDate"><?= $Page->ETDate->caption() ?></span></td>
        <td data-name="ETDate" <?= $Page->ETDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_ETDate">
<span<?= $Page->ETDate->viewAttributes() ?>>
<?= $Page->ETDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ETYesNo->Visible) { // ETYesNo ?>
    <tr id="r_ETYesNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_ETYesNo"><?= $Page->ETYesNo->caption() ?></span></td>
        <td data-name="ETYesNo" <?= $Page->ETYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_ETYesNo">
<span<?= $Page->ETYesNo->viewAttributes() ?>>
<?= $Page->ETYesNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BetaHCGDate->Visible) { // BetaHCGDate ?>
    <tr id="r_BetaHCGDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_BetaHCGDate"><?= $Page->BetaHCGDate->caption() ?></span></td>
        <td data-name="BetaHCGDate" <?= $Page->BetaHCGDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_BetaHCGDate">
<span<?= $Page->BetaHCGDate->viewAttributes() ?>>
<?= $Page->BetaHCGDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BetaHCGYesNo->Visible) { // BetaHCGYesNo ?>
    <tr id="r_BetaHCGYesNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_BetaHCGYesNo"><?= $Page->BetaHCGYesNo->caption() ?></span></td>
        <td data-name="BetaHCGYesNo" <?= $Page->BetaHCGYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_BetaHCGYesNo">
<span<?= $Page->BetaHCGYesNo->viewAttributes() ?>>
<?= $Page->BetaHCGYesNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FETDate->Visible) { // FETDate ?>
    <tr id="r_FETDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_FETDate"><?= $Page->FETDate->caption() ?></span></td>
        <td data-name="FETDate" <?= $Page->FETDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FETDate">
<span<?= $Page->FETDate->viewAttributes() ?>>
<?= $Page->FETDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FETYesNo->Visible) { // FETYesNo ?>
    <tr id="r_FETYesNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_FETYesNo"><?= $Page->FETYesNo->caption() ?></span></td>
        <td data-name="FETYesNo" <?= $Page->FETYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FETYesNo">
<span<?= $Page->FETYesNo->viewAttributes() ?>>
<?= $Page->FETYesNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FBetaHCGDate->Visible) { // FBetaHCGDate ?>
    <tr id="r_FBetaHCGDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_FBetaHCGDate"><?= $Page->FBetaHCGDate->caption() ?></span></td>
        <td data-name="FBetaHCGDate" <?= $Page->FBetaHCGDate->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FBetaHCGDate">
<span<?= $Page->FBetaHCGDate->viewAttributes() ?>>
<?= $Page->FBetaHCGDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FBetaHCGYesNo->Visible) { // FBetaHCGYesNo ?>
    <tr id="r_FBetaHCGYesNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_FBetaHCGYesNo"><?= $Page->FBetaHCGYesNo->caption() ?></span></td>
        <td data-name="FBetaHCGYesNo" <?= $Page->FBetaHCGYesNo->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_FBetaHCGYesNo">
<span<?= $Page->FBetaHCGYesNo->viewAttributes() ?>>
<?= $Page->FBetaHCGYesNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_monitor_treatment_plan_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_monitor_treatment_plan_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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

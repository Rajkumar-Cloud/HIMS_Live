<?php

namespace PHPMaker2021\project3;

// Page object
$PatientInvestigationsView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_investigationsview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpatient_investigationsview = currentForm = new ew.Form("fpatient_investigationsview", "view");
    loadjs.done("fpatient_investigationsview");
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
<form name="fpatient_investigationsview" id="fpatient_investigationsview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_investigations">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_patient_investigations_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Reception"><?= $Page->Reception->caption() ?></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el_patient_investigations_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <tr id="r_PatientId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_PatientId"><?= $Page->PatientId->caption() ?></span></td>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_patient_investigations_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_mrnno"><?= $Page->mrnno->caption() ?></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_patient_investigations_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_PatientName"><?= $Page->PatientName->caption() ?></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_patient_investigations_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Age"><?= $Page->Age->caption() ?></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el_patient_investigations_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <tr id="r_Gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Gender"><?= $Page->Gender->caption() ?></span></td>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<span id="el_patient_investigations_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_profilePic"><?= $Page->profilePic->caption() ?></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_patient_investigations_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Investigation->Visible) { // Investigation ?>
    <tr id="r_Investigation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Investigation"><?= $Page->Investigation->caption() ?></span></td>
        <td data-name="Investigation" <?= $Page->Investigation->cellAttributes() ?>>
<span id="el_patient_investigations_Investigation">
<span<?= $Page->Investigation->viewAttributes() ?>>
<?= $Page->Investigation->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Value->Visible) { // Value ?>
    <tr id="r_Value">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Value"><?= $Page->Value->caption() ?></span></td>
        <td data-name="Value" <?= $Page->Value->cellAttributes() ?>>
<span id="el_patient_investigations_Value">
<span<?= $Page->Value->viewAttributes() ?>>
<?= $Page->Value->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NormalRange->Visible) { // NormalRange ?>
    <tr id="r_NormalRange">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_NormalRange"><?= $Page->NormalRange->caption() ?></span></td>
        <td data-name="NormalRange" <?= $Page->NormalRange->cellAttributes() ?>>
<span id="el_patient_investigations_NormalRange">
<span<?= $Page->NormalRange->viewAttributes() ?>>
<?= $Page->NormalRange->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SampleCollected->Visible) { // SampleCollected ?>
    <tr id="r_SampleCollected">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_SampleCollected"><?= $Page->SampleCollected->caption() ?></span></td>
        <td data-name="SampleCollected" <?= $Page->SampleCollected->cellAttributes() ?>>
<span id="el_patient_investigations_SampleCollected">
<span<?= $Page->SampleCollected->viewAttributes() ?>>
<?= $Page->SampleCollected->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
    <tr id="r_SampleCollectedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_SampleCollectedBy"><?= $Page->SampleCollectedBy->caption() ?></span></td>
        <td data-name="SampleCollectedBy" <?= $Page->SampleCollectedBy->cellAttributes() ?>>
<span id="el_patient_investigations_SampleCollectedBy">
<span<?= $Page->SampleCollectedBy->viewAttributes() ?>>
<?= $Page->SampleCollectedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ResultedDate->Visible) { // ResultedDate ?>
    <tr id="r_ResultedDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_ResultedDate"><?= $Page->ResultedDate->caption() ?></span></td>
        <td data-name="ResultedDate" <?= $Page->ResultedDate->cellAttributes() ?>>
<span id="el_patient_investigations_ResultedDate">
<span<?= $Page->ResultedDate->viewAttributes() ?>>
<?= $Page->ResultedDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
    <tr id="r_ResultedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_ResultedBy"><?= $Page->ResultedBy->caption() ?></span></td>
        <td data-name="ResultedBy" <?= $Page->ResultedBy->cellAttributes() ?>>
<span id="el_patient_investigations_ResultedBy">
<span<?= $Page->ResultedBy->viewAttributes() ?>>
<?= $Page->ResultedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Modified->Visible) { // Modified ?>
    <tr id="r_Modified">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Modified"><?= $Page->Modified->caption() ?></span></td>
        <td data-name="Modified" <?= $Page->Modified->cellAttributes() ?>>
<span id="el_patient_investigations_Modified">
<span<?= $Page->Modified->viewAttributes() ?>>
<?= $Page->Modified->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
    <tr id="r_ModifiedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_ModifiedBy"><?= $Page->ModifiedBy->caption() ?></span></td>
        <td data-name="ModifiedBy" <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el_patient_investigations_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Created->Visible) { // Created ?>
    <tr id="r_Created">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Created"><?= $Page->Created->caption() ?></span></td>
        <td data-name="Created" <?= $Page->Created->cellAttributes() ?>>
<span id="el_patient_investigations_Created">
<span<?= $Page->Created->viewAttributes() ?>>
<?= $Page->Created->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
    <tr id="r_CreatedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_CreatedBy"><?= $Page->CreatedBy->caption() ?></span></td>
        <td data-name="CreatedBy" <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el_patient_investigations_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->GroupHead->Visible) { // GroupHead ?>
    <tr id="r_GroupHead">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_GroupHead"><?= $Page->GroupHead->caption() ?></span></td>
        <td data-name="GroupHead" <?= $Page->GroupHead->cellAttributes() ?>>
<span id="el_patient_investigations_GroupHead">
<span<?= $Page->GroupHead->viewAttributes() ?>>
<?= $Page->GroupHead->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Cost->Visible) { // Cost ?>
    <tr id="r_Cost">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_Cost"><?= $Page->Cost->caption() ?></span></td>
        <td data-name="Cost" <?= $Page->Cost->cellAttributes() ?>>
<span id="el_patient_investigations_Cost">
<span<?= $Page->Cost->viewAttributes() ?>>
<?= $Page->Cost->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
    <tr id="r_PaymentStatus">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_PaymentStatus"><?= $Page->PaymentStatus->caption() ?></span></td>
        <td data-name="PaymentStatus" <?= $Page->PaymentStatus->cellAttributes() ?>>
<span id="el_patient_investigations_PaymentStatus">
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PayMode->Visible) { // PayMode ?>
    <tr id="r_PayMode">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_PayMode"><?= $Page->PayMode->caption() ?></span></td>
        <td data-name="PayMode" <?= $Page->PayMode->cellAttributes() ?>>
<span id="el_patient_investigations_PayMode">
<span<?= $Page->PayMode->viewAttributes() ?>>
<?= $Page->PayMode->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->VoucherNo->Visible) { // VoucherNo ?>
    <tr id="r_VoucherNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_investigations_VoucherNo"><?= $Page->VoucherNo->caption() ?></span></td>
        <td data-name="VoucherNo" <?= $Page->VoucherNo->cellAttributes() ?>>
<span id="el_patient_investigations_VoucherNo">
<span<?= $Page->VoucherNo->viewAttributes() ?>>
<?= $Page->VoucherNo->getViewValue() ?></span>
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

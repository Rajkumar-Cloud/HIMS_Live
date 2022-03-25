<?php

namespace PHPMaker2021\project3;

// Page object
$PatientFollowUpView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_follow_upview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpatient_follow_upview = currentForm = new ew.Form("fpatient_follow_upview", "view");
    loadjs.done("fpatient_follow_upview");
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
<form name="fpatient_follow_upview" id="fpatient_follow_upview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_follow_up">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_patient_follow_up_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Reception"><?= $Page->Reception->caption() ?></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el_patient_follow_up_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <tr id="r_PatientId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_PatientId"><?= $Page->PatientId->caption() ?></span></td>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_patient_follow_up_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_mrnno"><?= $Page->mrnno->caption() ?></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_patient_follow_up_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_PatientName"><?= $Page->PatientName->caption() ?></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_patient_follow_up_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Age"><?= $Page->Age->caption() ?></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el_patient_follow_up_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <tr id="r_Gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Gender"><?= $Page->Gender->caption() ?></span></td>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<span id="el_patient_follow_up_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_profilePic"><?= $Page->profilePic->caption() ?></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_patient_follow_up_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->courseinhospital->Visible) { // courseinhospital ?>
    <tr id="r_courseinhospital">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_courseinhospital"><?= $Page->courseinhospital->caption() ?></span></td>
        <td data-name="courseinhospital" <?= $Page->courseinhospital->cellAttributes() ?>>
<span id="el_patient_follow_up_courseinhospital">
<span<?= $Page->courseinhospital->viewAttributes() ?>>
<?= $Page->courseinhospital->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->procedurenotes->Visible) { // procedurenotes ?>
    <tr id="r_procedurenotes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_procedurenotes"><?= $Page->procedurenotes->caption() ?></span></td>
        <td data-name="procedurenotes" <?= $Page->procedurenotes->cellAttributes() ?>>
<span id="el_patient_follow_up_procedurenotes">
<span<?= $Page->procedurenotes->viewAttributes() ?>>
<?= $Page->procedurenotes->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->conditionatdischarge->Visible) { // conditionatdischarge ?>
    <tr id="r_conditionatdischarge">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_conditionatdischarge"><?= $Page->conditionatdischarge->caption() ?></span></td>
        <td data-name="conditionatdischarge" <?= $Page->conditionatdischarge->cellAttributes() ?>>
<span id="el_patient_follow_up_conditionatdischarge">
<span<?= $Page->conditionatdischarge->viewAttributes() ?>>
<?= $Page->conditionatdischarge->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
    <tr id="r_BP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_BP"><?= $Page->BP->caption() ?></span></td>
        <td data-name="BP" <?= $Page->BP->cellAttributes() ?>>
<span id="el_patient_follow_up_BP">
<span<?= $Page->BP->viewAttributes() ?>>
<?= $Page->BP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
    <tr id="r_Pulse">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Pulse"><?= $Page->Pulse->caption() ?></span></td>
        <td data-name="Pulse" <?= $Page->Pulse->cellAttributes() ?>>
<span id="el_patient_follow_up_Pulse">
<span<?= $Page->Pulse->viewAttributes() ?>>
<?= $Page->Pulse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Resp->Visible) { // Resp ?>
    <tr id="r_Resp">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Resp"><?= $Page->Resp->caption() ?></span></td>
        <td data-name="Resp" <?= $Page->Resp->cellAttributes() ?>>
<span id="el_patient_follow_up_Resp">
<span<?= $Page->Resp->viewAttributes() ?>>
<?= $Page->Resp->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SPO2->Visible) { // SPO2 ?>
    <tr id="r_SPO2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_SPO2"><?= $Page->SPO2->caption() ?></span></td>
        <td data-name="SPO2" <?= $Page->SPO2->cellAttributes() ?>>
<span id="el_patient_follow_up_SPO2">
<span<?= $Page->SPO2->viewAttributes() ?>>
<?= $Page->SPO2->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FollowupAdvice->Visible) { // FollowupAdvice ?>
    <tr id="r_FollowupAdvice">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_FollowupAdvice"><?= $Page->FollowupAdvice->caption() ?></span></td>
        <td data-name="FollowupAdvice" <?= $Page->FollowupAdvice->cellAttributes() ?>>
<span id="el_patient_follow_up_FollowupAdvice">
<span<?= $Page->FollowupAdvice->viewAttributes() ?>>
<?= $Page->FollowupAdvice->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
    <tr id="r_NextReviewDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_NextReviewDate"><?= $Page->NextReviewDate->caption() ?></span></td>
        <td data-name="NextReviewDate" <?= $Page->NextReviewDate->cellAttributes() ?>>
<span id="el_patient_follow_up_NextReviewDate">
<span<?= $Page->NextReviewDate->viewAttributes() ?>>
<?= $Page->NextReviewDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <tr id="r_PatID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_PatID"><?= $Page->PatID->caption() ?></span></td>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<span id="el_patient_follow_up_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <tr id="r_MobileNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_MobileNumber"><?= $Page->MobileNumber->caption() ?></span></td>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el_patient_follow_up_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_patient_follow_up_HospID">
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

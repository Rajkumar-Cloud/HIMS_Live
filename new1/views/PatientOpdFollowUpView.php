<?php

namespace PHPMaker2021\project3;

// Page object
$PatientOpdFollowUpView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_opd_follow_upview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpatient_opd_follow_upview = currentForm = new ew.Form("fpatient_opd_follow_upview", "view");
    loadjs.done("fpatient_opd_follow_upview");
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
<form name="fpatient_opd_follow_upview" id="fpatient_opd_follow_upview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_opd_follow_up">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Reception"><?= $Page->Reception->caption() ?></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <tr id="r_PatientId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientId"><?= $Page->PatientId->caption() ?></span></td>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_mrnno"><?= $Page->mrnno->caption() ?></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientName"><?= $Page->PatientName->caption() ?></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Telephone->Visible) { // Telephone ?>
    <tr id="r_Telephone">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Telephone"><?= $Page->Telephone->caption() ?></span></td>
        <td data-name="Telephone" <?= $Page->Telephone->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_Telephone">
<span<?= $Page->Telephone->viewAttributes() ?>>
<?= $Page->Telephone->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Age"><?= $Page->Age->caption() ?></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <tr id="r_Gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Gender"><?= $Page->Gender->caption() ?></span></td>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_profilePic"><?= $Page->profilePic->caption() ?></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->procedurenotes->Visible) { // procedurenotes ?>
    <tr id="r_procedurenotes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_procedurenotes"><?= $Page->procedurenotes->caption() ?></span></td>
        <td data-name="procedurenotes" <?= $Page->procedurenotes->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_procedurenotes">
<span<?= $Page->procedurenotes->viewAttributes() ?>>
<?= $Page->procedurenotes->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
    <tr id="r_NextReviewDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_NextReviewDate"><?= $Page->NextReviewDate->caption() ?></span></td>
        <td data-name="NextReviewDate" <?= $Page->NextReviewDate->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_NextReviewDate">
<span<?= $Page->NextReviewDate->viewAttributes() ?>>
<?= $Page->NextReviewDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ICSIAdvised->Visible) { // ICSIAdvised ?>
    <tr id="r_ICSIAdvised">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ICSIAdvised"><?= $Page->ICSIAdvised->caption() ?></span></td>
        <td data-name="ICSIAdvised" <?= $Page->ICSIAdvised->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_ICSIAdvised">
<span<?= $Page->ICSIAdvised->viewAttributes() ?>>
<?= $Page->ICSIAdvised->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
    <tr id="r_DeliveryRegistered">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_DeliveryRegistered"><?= $Page->DeliveryRegistered->caption() ?></span></td>
        <td data-name="DeliveryRegistered" <?= $Page->DeliveryRegistered->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_DeliveryRegistered">
<span<?= $Page->DeliveryRegistered->viewAttributes() ?>>
<?= $Page->DeliveryRegistered->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->EDD->Visible) { // EDD ?>
    <tr id="r_EDD">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_EDD"><?= $Page->EDD->caption() ?></span></td>
        <td data-name="EDD" <?= $Page->EDD->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_EDD">
<span<?= $Page->EDD->viewAttributes() ?>>
<?= $Page->EDD->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SerologyPositive->Visible) { // SerologyPositive ?>
    <tr id="r_SerologyPositive">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_SerologyPositive"><?= $Page->SerologyPositive->caption() ?></span></td>
        <td data-name="SerologyPositive" <?= $Page->SerologyPositive->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_SerologyPositive">
<span<?= $Page->SerologyPositive->viewAttributes() ?>>
<?= $Page->SerologyPositive->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Allergy->Visible) { // Allergy ?>
    <tr id="r_Allergy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Allergy"><?= $Page->Allergy->caption() ?></span></td>
        <td data-name="Allergy" <?= $Page->Allergy->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_Allergy">
<span<?= $Page->Allergy->viewAttributes() ?>>
<?= $Page->Allergy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_status"><?= $Page->status->caption() ?></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
    <tr id="r_LMP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_LMP"><?= $Page->LMP->caption() ?></span></td>
        <td data-name="LMP" <?= $Page->LMP->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_LMP">
<span<?= $Page->LMP->viewAttributes() ?>>
<?= $Page->LMP->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
    <tr id="r_Procedure">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Procedure"><?= $Page->Procedure->caption() ?></span></td>
        <td data-name="Procedure" <?= $Page->Procedure->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_Procedure">
<span<?= $Page->Procedure->viewAttributes() ?>>
<?= $Page->Procedure->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
    <tr id="r_ProcedureDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ProcedureDateTime"><?= $Page->ProcedureDateTime->caption() ?></span></td>
        <td data-name="ProcedureDateTime" <?= $Page->ProcedureDateTime->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_ProcedureDateTime">
<span<?= $Page->ProcedureDateTime->viewAttributes() ?>>
<?= $Page->ProcedureDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ICSIDate->Visible) { // ICSIDate ?>
    <tr id="r_ICSIDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ICSIDate"><?= $Page->ICSIDate->caption() ?></span></td>
        <td data-name="ICSIDate" <?= $Page->ICSIDate->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_ICSIDate">
<span<?= $Page->ICSIDate->viewAttributes() ?>>
<?= $Page->ICSIDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <tr id="r_PatID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatID"><?= $Page->PatID->caption() ?></span></td>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <tr id="r_MobileNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_MobileNumber"><?= $Page->MobileNumber->caption() ?></span></td>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_HospID"><?= $Page->HospID->caption() ?></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdUserName->Visible) { // createdUserName ?>
    <tr id="r_createdUserName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createdUserName"><?= $Page->createdUserName->caption() ?></span></td>
        <td data-name="createdUserName" <?= $Page->createdUserName->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_createdUserName">
<span<?= $Page->createdUserName->viewAttributes() ?>>
<?= $Page->createdUserName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->reportheader->Visible) { // reportheader ?>
    <tr id="r_reportheader">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_reportheader"><?= $Page->reportheader->caption() ?></span></td>
        <td data-name="reportheader" <?= $Page->reportheader->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_reportheader">
<span<?= $Page->reportheader->viewAttributes() ?>>
<?= $Page->reportheader->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientSearch->Visible) { // PatientSearch ?>
    <tr id="r_PatientSearch">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientSearch"><?= $Page->PatientSearch->caption() ?></span></td>
        <td data-name="PatientSearch" <?= $Page->PatientSearch->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_PatientSearch">
<span<?= $Page->PatientSearch->viewAttributes() ?>>
<?= $Page->PatientSearch->getViewValue() ?></span>
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

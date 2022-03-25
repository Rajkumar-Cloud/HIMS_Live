<?php

namespace PHPMaker2021\project3;

// Page object
$PatientPrescriptionView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_prescriptionview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpatient_prescriptionview = currentForm = new ew.Form("fpatient_prescriptionview", "view");
    loadjs.done("fpatient_prescriptionview");
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
<form name="fpatient_prescriptionview" id="fpatient_prescriptionview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_prescription">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_patient_prescription_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_Reception"><?= $Page->Reception->caption() ?></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el_patient_prescription_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <tr id="r_PatientId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_PatientId"><?= $Page->PatientId->caption() ?></span></td>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_patient_prescription_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_mrnno"><?= $Page->mrnno->caption() ?></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_patient_prescription_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_PatientName"><?= $Page->PatientName->caption() ?></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_patient_prescription_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_Age"><?= $Page->Age->caption() ?></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<span id="el_patient_prescription_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <tr id="r_Gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_Gender"><?= $Page->Gender->caption() ?></span></td>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<span id="el_patient_prescription_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_profilePic"><?= $Page->profilePic->caption() ?></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_patient_prescription_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Medicine->Visible) { // Medicine ?>
    <tr id="r_Medicine">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_Medicine"><?= $Page->Medicine->caption() ?></span></td>
        <td data-name="Medicine" <?= $Page->Medicine->cellAttributes() ?>>
<span id="el_patient_prescription_Medicine">
<span<?= $Page->Medicine->viewAttributes() ?>>
<?= $Page->Medicine->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
    <tr id="r_M">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_M"><?= $Page->M->caption() ?></span></td>
        <td data-name="M" <?= $Page->M->cellAttributes() ?>>
<span id="el_patient_prescription_M">
<span<?= $Page->M->viewAttributes() ?>>
<?= $Page->M->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
    <tr id="r_A">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_A"><?= $Page->A->caption() ?></span></td>
        <td data-name="A" <?= $Page->A->cellAttributes() ?>>
<span id="el_patient_prescription_A">
<span<?= $Page->A->viewAttributes() ?>>
<?= $Page->A->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->N->Visible) { // N ?>
    <tr id="r_N">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_N"><?= $Page->N->caption() ?></span></td>
        <td data-name="N" <?= $Page->N->cellAttributes() ?>>
<span id="el_patient_prescription_N">
<span<?= $Page->N->viewAttributes() ?>>
<?= $Page->N->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NoOfDays->Visible) { // NoOfDays ?>
    <tr id="r_NoOfDays">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_NoOfDays"><?= $Page->NoOfDays->caption() ?></span></td>
        <td data-name="NoOfDays" <?= $Page->NoOfDays->cellAttributes() ?>>
<span id="el_patient_prescription_NoOfDays">
<span<?= $Page->NoOfDays->viewAttributes() ?>>
<?= $Page->NoOfDays->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PreRoute->Visible) { // PreRoute ?>
    <tr id="r_PreRoute">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_PreRoute"><?= $Page->PreRoute->caption() ?></span></td>
        <td data-name="PreRoute" <?= $Page->PreRoute->cellAttributes() ?>>
<span id="el_patient_prescription_PreRoute">
<span<?= $Page->PreRoute->viewAttributes() ?>>
<?= $Page->PreRoute->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { // TimeOfTaking ?>
    <tr id="r_TimeOfTaking">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_TimeOfTaking"><?= $Page->TimeOfTaking->caption() ?></span></td>
        <td data-name="TimeOfTaking" <?= $Page->TimeOfTaking->cellAttributes() ?>>
<span id="el_patient_prescription_TimeOfTaking">
<span<?= $Page->TimeOfTaking->viewAttributes() ?>>
<?= $Page->TimeOfTaking->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
    <tr id="r_Type">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_Type"><?= $Page->Type->caption() ?></span></td>
        <td data-name="Type" <?= $Page->Type->cellAttributes() ?>>
<span id="el_patient_prescription_Type">
<span<?= $Page->Type->viewAttributes() ?>>
<?= $Page->Type->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <tr id="r_Status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_Status"><?= $Page->Status->caption() ?></span></td>
        <td data-name="Status" <?= $Page->Status->cellAttributes() ?>>
<span id="el_patient_prescription_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
    <tr id="r_CreatedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_CreatedBy"><?= $Page->CreatedBy->caption() ?></span></td>
        <td data-name="CreatedBy" <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el_patient_prescription_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CreateDateTime->Visible) { // CreateDateTime ?>
    <tr id="r_CreateDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_CreateDateTime"><?= $Page->CreateDateTime->caption() ?></span></td>
        <td data-name="CreateDateTime" <?= $Page->CreateDateTime->cellAttributes() ?>>
<span id="el_patient_prescription_CreateDateTime">
<span<?= $Page->CreateDateTime->viewAttributes() ?>>
<?= $Page->CreateDateTime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
    <tr id="r_ModifiedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_ModifiedBy"><?= $Page->ModifiedBy->caption() ?></span></td>
        <td data-name="ModifiedBy" <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el_patient_prescription_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
    <tr id="r_ModifiedDateTime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_prescription_ModifiedDateTime"><?= $Page->ModifiedDateTime->caption() ?></span></td>
        <td data-name="ModifiedDateTime" <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el_patient_prescription_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
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

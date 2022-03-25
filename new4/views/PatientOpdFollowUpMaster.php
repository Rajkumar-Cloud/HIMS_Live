<?php

namespace PHPMaker2021\HIMS;

// Table
$patient_opd_follow_up = Container("patient_opd_follow_up");
?>
<?php if ($patient_opd_follow_up->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_patient_opd_follow_upmaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($patient_opd_follow_up->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->id->caption() ?></td>
            <td <?= $patient_opd_follow_up->id->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_id">
<span<?= $patient_opd_follow_up->id->viewAttributes() ?>>
<?= $patient_opd_follow_up->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->PatID->Visible) { // PatID ?>
        <tr id="r_PatID">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->PatID->caption() ?></td>
            <td <?= $patient_opd_follow_up->PatID->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_PatID">
<span<?= $patient_opd_follow_up->PatID->viewAttributes() ?>>
<?= $patient_opd_follow_up->PatID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->PatientName->Visible) { // PatientName ?>
        <tr id="r_PatientName">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->PatientName->caption() ?></td>
            <td <?= $patient_opd_follow_up->PatientName->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_PatientName">
<span<?= $patient_opd_follow_up->PatientName->viewAttributes() ?>>
<?= $patient_opd_follow_up->PatientName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->MobileNumber->Visible) { // MobileNumber ?>
        <tr id="r_MobileNumber">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->MobileNumber->caption() ?></td>
            <td <?= $patient_opd_follow_up->MobileNumber->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_MobileNumber">
<span<?= $patient_opd_follow_up->MobileNumber->viewAttributes() ?>>
<?= $patient_opd_follow_up->MobileNumber->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->Gender->Visible) { // Gender ?>
        <tr id="r_Gender">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->Gender->caption() ?></td>
            <td <?= $patient_opd_follow_up->Gender->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_Gender">
<span<?= $patient_opd_follow_up->Gender->viewAttributes() ?>>
<?= $patient_opd_follow_up->Gender->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->NextReviewDate->Visible) { // NextReviewDate ?>
        <tr id="r_NextReviewDate">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->NextReviewDate->caption() ?></td>
            <td <?= $patient_opd_follow_up->NextReviewDate->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_NextReviewDate">
<span<?= $patient_opd_follow_up->NextReviewDate->viewAttributes() ?>>
<?= $patient_opd_follow_up->NextReviewDate->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->ICSIAdvised->Visible) { // ICSIAdvised ?>
        <tr id="r_ICSIAdvised">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->ICSIAdvised->caption() ?></td>
            <td <?= $patient_opd_follow_up->ICSIAdvised->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_ICSIAdvised">
<span<?= $patient_opd_follow_up->ICSIAdvised->viewAttributes() ?>>
<?= $patient_opd_follow_up->ICSIAdvised->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
        <tr id="r_DeliveryRegistered">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->DeliveryRegistered->caption() ?></td>
            <td <?= $patient_opd_follow_up->DeliveryRegistered->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_DeliveryRegistered">
<span<?= $patient_opd_follow_up->DeliveryRegistered->viewAttributes() ?>>
<?= $patient_opd_follow_up->DeliveryRegistered->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->EDD->Visible) { // EDD ?>
        <tr id="r_EDD">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->EDD->caption() ?></td>
            <td <?= $patient_opd_follow_up->EDD->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_EDD">
<span<?= $patient_opd_follow_up->EDD->viewAttributes() ?>>
<?= $patient_opd_follow_up->EDD->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->SerologyPositive->Visible) { // SerologyPositive ?>
        <tr id="r_SerologyPositive">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->SerologyPositive->caption() ?></td>
            <td <?= $patient_opd_follow_up->SerologyPositive->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_SerologyPositive">
<span<?= $patient_opd_follow_up->SerologyPositive->viewAttributes() ?>>
<?= $patient_opd_follow_up->SerologyPositive->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->Allergy->Visible) { // Allergy ?>
        <tr id="r_Allergy">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->Allergy->caption() ?></td>
            <td <?= $patient_opd_follow_up->Allergy->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_Allergy">
<span<?= $patient_opd_follow_up->Allergy->viewAttributes() ?>>
<?= $patient_opd_follow_up->Allergy->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->status->Visible) { // status ?>
        <tr id="r_status">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->status->caption() ?></td>
            <td <?= $patient_opd_follow_up->status->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_status">
<span<?= $patient_opd_follow_up->status->viewAttributes() ?>>
<?= $patient_opd_follow_up->status->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->createdby->Visible) { // createdby ?>
        <tr id="r_createdby">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->createdby->caption() ?></td>
            <td <?= $patient_opd_follow_up->createdby->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_createdby">
<span<?= $patient_opd_follow_up->createdby->viewAttributes() ?>>
<?= $patient_opd_follow_up->createdby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->createddatetime->caption() ?></td>
            <td <?= $patient_opd_follow_up->createddatetime->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_createddatetime">
<span<?= $patient_opd_follow_up->createddatetime->viewAttributes() ?>>
<?= $patient_opd_follow_up->createddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->modifiedby->Visible) { // modifiedby ?>
        <tr id="r_modifiedby">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->modifiedby->caption() ?></td>
            <td <?= $patient_opd_follow_up->modifiedby->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_modifiedby">
<span<?= $patient_opd_follow_up->modifiedby->viewAttributes() ?>>
<?= $patient_opd_follow_up->modifiedby->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->modifieddatetime->Visible) { // modifieddatetime ?>
        <tr id="r_modifieddatetime">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->modifieddatetime->caption() ?></td>
            <td <?= $patient_opd_follow_up->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_modifieddatetime">
<span<?= $patient_opd_follow_up->modifieddatetime->viewAttributes() ?>>
<?= $patient_opd_follow_up->modifieddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->LMP->Visible) { // LMP ?>
        <tr id="r_LMP">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->LMP->caption() ?></td>
            <td <?= $patient_opd_follow_up->LMP->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_LMP">
<span<?= $patient_opd_follow_up->LMP->viewAttributes() ?>>
<?= $patient_opd_follow_up->LMP->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
        <tr id="r_ProcedureDateTime">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->ProcedureDateTime->caption() ?></td>
            <td <?= $patient_opd_follow_up->ProcedureDateTime->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_ProcedureDateTime">
<span<?= $patient_opd_follow_up->ProcedureDateTime->viewAttributes() ?>>
<?= $patient_opd_follow_up->ProcedureDateTime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->ICSIDate->Visible) { // ICSIDate ?>
        <tr id="r_ICSIDate">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->ICSIDate->caption() ?></td>
            <td <?= $patient_opd_follow_up->ICSIDate->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_ICSIDate">
<span<?= $patient_opd_follow_up->ICSIDate->viewAttributes() ?>>
<?= $patient_opd_follow_up->ICSIDate->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->HospID->caption() ?></td>
            <td <?= $patient_opd_follow_up->HospID->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_HospID">
<span<?= $patient_opd_follow_up->HospID->viewAttributes() ?>>
<?= $patient_opd_follow_up->HospID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->createdUserName->Visible) { // createdUserName ?>
        <tr id="r_createdUserName">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->createdUserName->caption() ?></td>
            <td <?= $patient_opd_follow_up->createdUserName->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_createdUserName">
<span<?= $patient_opd_follow_up->createdUserName->viewAttributes() ?>>
<?= $patient_opd_follow_up->createdUserName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->reportheader->Visible) { // reportheader ?>
        <tr id="r_reportheader">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->reportheader->caption() ?></td>
            <td <?= $patient_opd_follow_up->reportheader->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_reportheader">
<span<?= $patient_opd_follow_up->reportheader->viewAttributes() ?>>
<?= $patient_opd_follow_up->reportheader->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient_opd_follow_up->DrName->Visible) { // DrName ?>
        <tr id="r_DrName">
            <td class="<?= $patient_opd_follow_up->TableLeftColumnClass ?>"><?= $patient_opd_follow_up->DrName->caption() ?></td>
            <td <?= $patient_opd_follow_up->DrName->cellAttributes() ?>>
<span id="el_patient_opd_follow_up_DrName">
<span<?= $patient_opd_follow_up->DrName->viewAttributes() ?>>
<?= $patient_opd_follow_up->DrName->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>

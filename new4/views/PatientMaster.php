<?php

namespace PHPMaker2021\HIMS;

// Table
$patient = Container("patient");
?>
<?php if ($patient->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_patientmaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($patient->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->id->caption() ?></td>
            <td <?= $patient->id->cellAttributes() ?>>
<span id="el_patient_id">
<span<?= $patient->id->viewAttributes() ?>>
<?= $patient->id->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->PatientID->Visible) { // PatientID ?>
        <tr id="r_PatientID">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->PatientID->caption() ?></td>
            <td <?= $patient->PatientID->cellAttributes() ?>>
<span id="el_patient_PatientID">
<span<?= $patient->PatientID->viewAttributes() ?>>
<?= $patient->PatientID->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->title->Visible) { // title ?>
        <tr id="r_title">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->title->caption() ?></td>
            <td <?= $patient->title->cellAttributes() ?>>
<span id="el_patient_title">
<span<?= $patient->title->viewAttributes() ?>>
<?= $patient->title->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->first_name->Visible) { // first_name ?>
        <tr id="r_first_name">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->first_name->caption() ?></td>
            <td <?= $patient->first_name->cellAttributes() ?>>
<span id="el_patient_first_name">
<span<?= $patient->first_name->viewAttributes() ?>>
<?= $patient->first_name->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->gender->Visible) { // gender ?>
        <tr id="r_gender">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->gender->caption() ?></td>
            <td <?= $patient->gender->cellAttributes() ?>>
<span id="el_patient_gender">
<span<?= $patient->gender->viewAttributes() ?>>
<?= $patient->gender->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->Age->Visible) { // Age ?>
        <tr id="r_Age">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->Age->caption() ?></td>
            <td <?= $patient->Age->cellAttributes() ?>>
<span id="el_patient_Age">
<span<?= $patient->Age->viewAttributes() ?>>
<?= $patient->Age->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->blood_group->Visible) { // blood_group ?>
        <tr id="r_blood_group">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->blood_group->caption() ?></td>
            <td <?= $patient->blood_group->cellAttributes() ?>>
<span id="el_patient_blood_group">
<span<?= $patient->blood_group->viewAttributes() ?>>
<?= $patient->blood_group->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->mobile_no->Visible) { // mobile_no ?>
        <tr id="r_mobile_no">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->mobile_no->caption() ?></td>
            <td <?= $patient->mobile_no->cellAttributes() ?>>
<span id="el_patient_mobile_no">
<span<?= $patient->mobile_no->viewAttributes() ?>>
<?= $patient->mobile_no->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->createddatetime->caption() ?></td>
            <td <?= $patient->createddatetime->cellAttributes() ?>>
<span id="el_patient_createddatetime">
<span<?= $patient->createddatetime->viewAttributes() ?>>
<?= $patient->createddatetime->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->profilePic->Visible) { // profilePic ?>
        <tr id="r_profilePic">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->profilePic->caption() ?></td>
            <td <?= $patient->profilePic->cellAttributes() ?>>
<span id="el_patient_profilePic">
<span>
<?= GetFileViewTag($patient->profilePic, $patient->profilePic->getViewValue(), false) ?>
</span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->IdentificationMark->Visible) { // IdentificationMark ?>
        <tr id="r_IdentificationMark">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->IdentificationMark->caption() ?></td>
            <td <?= $patient->IdentificationMark->cellAttributes() ?>>
<span id="el_patient_IdentificationMark">
<span<?= $patient->IdentificationMark->viewAttributes() ?>>
<?= $patient->IdentificationMark->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->Religion->Visible) { // Religion ?>
        <tr id="r_Religion">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->Religion->caption() ?></td>
            <td <?= $patient->Religion->cellAttributes() ?>>
<span id="el_patient_Religion">
<span<?= $patient->Religion->viewAttributes() ?>>
<?= $patient->Religion->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->Nationality->Visible) { // Nationality ?>
        <tr id="r_Nationality">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->Nationality->caption() ?></td>
            <td <?= $patient->Nationality->cellAttributes() ?>>
<span id="el_patient_Nationality">
<span<?= $patient->Nationality->viewAttributes() ?>>
<?= $patient->Nationality->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->ReferedByDr->Visible) { // ReferedByDr ?>
        <tr id="r_ReferedByDr">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->ReferedByDr->caption() ?></td>
            <td <?= $patient->ReferedByDr->cellAttributes() ?>>
<span id="el_patient_ReferedByDr">
<span<?= $patient->ReferedByDr->viewAttributes() ?>>
<?= $patient->ReferedByDr->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->ReferMobileNo->Visible) { // ReferMobileNo ?>
        <tr id="r_ReferMobileNo">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->ReferMobileNo->caption() ?></td>
            <td <?= $patient->ReferMobileNo->cellAttributes() ?>>
<span id="el_patient_ReferMobileNo">
<span<?= $patient->ReferMobileNo->viewAttributes() ?>>
<?= $patient->ReferMobileNo->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <tr id="r_ReferA4TreatingConsultant">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->ReferA4TreatingConsultant->caption() ?></td>
            <td <?= $patient->ReferA4TreatingConsultant->cellAttributes() ?>>
<span id="el_patient_ReferA4TreatingConsultant">
<span<?= $patient->ReferA4TreatingConsultant->viewAttributes() ?>>
<?= $patient->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->PurposreReferredfor->Visible) { // PurposreReferredfor ?>
        <tr id="r_PurposreReferredfor">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->PurposreReferredfor->caption() ?></td>
            <td <?= $patient->PurposreReferredfor->cellAttributes() ?>>
<span id="el_patient_PurposreReferredfor">
<span<?= $patient->PurposreReferredfor->viewAttributes() ?>>
<?= $patient->PurposreReferredfor->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->spouse_title->Visible) { // spouse_title ?>
        <tr id="r_spouse_title">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->spouse_title->caption() ?></td>
            <td <?= $patient->spouse_title->cellAttributes() ?>>
<span id="el_patient_spouse_title">
<span<?= $patient->spouse_title->viewAttributes() ?>>
<?= $patient->spouse_title->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->spouse_first_name->Visible) { // spouse_first_name ?>
        <tr id="r_spouse_first_name">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->spouse_first_name->caption() ?></td>
            <td <?= $patient->spouse_first_name->cellAttributes() ?>>
<span id="el_patient_spouse_first_name">
<span<?= $patient->spouse_first_name->viewAttributes() ?>>
<?= $patient->spouse_first_name->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->spouse_gender->Visible) { // spouse_gender ?>
        <tr id="r_spouse_gender">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->spouse_gender->caption() ?></td>
            <td <?= $patient->spouse_gender->cellAttributes() ?>>
<span id="el_patient_spouse_gender">
<span<?= $patient->spouse_gender->viewAttributes() ?>>
<?= $patient->spouse_gender->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->spouse_mobile_no->Visible) { // spouse_mobile_no ?>
        <tr id="r_spouse_mobile_no">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->spouse_mobile_no->caption() ?></td>
            <td <?= $patient->spouse_mobile_no->cellAttributes() ?>>
<span id="el_patient_spouse_mobile_no">
<span<?= $patient->spouse_mobile_no->viewAttributes() ?>>
<?= $patient->spouse_mobile_no->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->Passport->Visible) { // Passport ?>
        <tr id="r_Passport">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->Passport->caption() ?></td>
            <td <?= $patient->Passport->cellAttributes() ?>>
<span id="el_patient_Passport">
<span<?= $patient->Passport->viewAttributes() ?>>
<?= $patient->Passport->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->VisaNo->Visible) { // VisaNo ?>
        <tr id="r_VisaNo">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->VisaNo->caption() ?></td>
            <td <?= $patient->VisaNo->cellAttributes() ?>>
<span id="el_patient_VisaNo">
<span<?= $patient->VisaNo->viewAttributes() ?>>
<?= $patient->VisaNo->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <tr id="r_WhereDidYouHear">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->WhereDidYouHear->caption() ?></td>
            <td <?= $patient->WhereDidYouHear->cellAttributes() ?>>
<span id="el_patient_WhereDidYouHear">
<span<?= $patient->WhereDidYouHear->viewAttributes() ?>>
<?= $patient->WhereDidYouHear->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->street->Visible) { // street ?>
        <tr id="r_street">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->street->caption() ?></td>
            <td <?= $patient->street->cellAttributes() ?>>
<span id="el_patient_street">
<span<?= $patient->street->viewAttributes() ?>>
<?= $patient->street->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->town->Visible) { // town ?>
        <tr id="r_town">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->town->caption() ?></td>
            <td <?= $patient->town->cellAttributes() ?>>
<span id="el_patient_town">
<span<?= $patient->town->viewAttributes() ?>>
<?= $patient->town->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->province->Visible) { // province ?>
        <tr id="r_province">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->province->caption() ?></td>
            <td <?= $patient->province->cellAttributes() ?>>
<span id="el_patient_province">
<span<?= $patient->province->viewAttributes() ?>>
<?= $patient->province->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->country->Visible) { // country ?>
        <tr id="r_country">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->country->caption() ?></td>
            <td <?= $patient->country->cellAttributes() ?>>
<span id="el_patient_country">
<span<?= $patient->country->viewAttributes() ?>>
<?= $patient->country->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->postal_code->Visible) { // postal_code ?>
        <tr id="r_postal_code">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->postal_code->caption() ?></td>
            <td <?= $patient->postal_code->cellAttributes() ?>>
<span id="el_patient_postal_code">
<span<?= $patient->postal_code->viewAttributes() ?>>
<?= $patient->postal_code->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->PEmail->Visible) { // PEmail ?>
        <tr id="r_PEmail">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->PEmail->caption() ?></td>
            <td <?= $patient->PEmail->cellAttributes() ?>>
<span id="el_patient_PEmail">
<span<?= $patient->PEmail->viewAttributes() ?>>
<?= $patient->PEmail->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($patient->Clients->Visible) { // Clients ?>
        <tr id="r_Clients">
            <td class="<?= $patient->TableLeftColumnClass ?>"><?= $patient->Clients->caption() ?></td>
            <td <?= $patient->Clients->cellAttributes() ?>>
<span id="el_patient_Clients">
<span<?= $patient->Clients->viewAttributes() ?>>
<?= $patient->Clients->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>

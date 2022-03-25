<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientInsuranceView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_insuranceview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpatient_insuranceview = currentForm = new ew.Form("fpatient_insuranceview", "view");
    loadjs.done("fpatient_insuranceview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.patient_insurance) ew.vars.tables.patient_insurance = <?= JsonEncode(GetClientVar("tables", "patient_insurance")) ?>;
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
<form name="fpatient_insuranceview" id="fpatient_insuranceview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_insurance">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_patient_insurance_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_Reception"><?= $Page->Reception->caption() ?></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<span id="el_patient_insurance_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <tr id="r_PatientId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_PatientId"><?= $Page->PatientId->caption() ?></span></td>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_patient_insurance_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_PatientName"><?= $Page->PatientName->caption() ?></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_patient_insurance_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Company->Visible) { // Company ?>
    <tr id="r_Company">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_Company"><?= $Page->Company->caption() ?></span></td>
        <td data-name="Company" <?= $Page->Company->cellAttributes() ?>>
<span id="el_patient_insurance_Company">
<span<?= $Page->Company->viewAttributes() ?>>
<?= $Page->Company->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
    <tr id="r_AddressInsuranceCarierName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_AddressInsuranceCarierName"><?= $Page->AddressInsuranceCarierName->caption() ?></span></td>
        <td data-name="AddressInsuranceCarierName" <?= $Page->AddressInsuranceCarierName->cellAttributes() ?>>
<span id="el_patient_insurance_AddressInsuranceCarierName">
<span<?= $Page->AddressInsuranceCarierName->viewAttributes() ?>>
<?= $Page->AddressInsuranceCarierName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ContactName->Visible) { // ContactName ?>
    <tr id="r_ContactName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_ContactName"><?= $Page->ContactName->caption() ?></span></td>
        <td data-name="ContactName" <?= $Page->ContactName->cellAttributes() ?>>
<span id="el_patient_insurance_ContactName">
<span<?= $Page->ContactName->viewAttributes() ?>>
<?= $Page->ContactName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ContactMobile->Visible) { // ContactMobile ?>
    <tr id="r_ContactMobile">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_ContactMobile"><?= $Page->ContactMobile->caption() ?></span></td>
        <td data-name="ContactMobile" <?= $Page->ContactMobile->cellAttributes() ?>>
<span id="el_patient_insurance_ContactMobile">
<span<?= $Page->ContactMobile->viewAttributes() ?>>
<?= $Page->ContactMobile->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PolicyType->Visible) { // PolicyType ?>
    <tr id="r_PolicyType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_PolicyType"><?= $Page->PolicyType->caption() ?></span></td>
        <td data-name="PolicyType" <?= $Page->PolicyType->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyType">
<span<?= $Page->PolicyType->viewAttributes() ?>>
<?= $Page->PolicyType->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PolicyName->Visible) { // PolicyName ?>
    <tr id="r_PolicyName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_PolicyName"><?= $Page->PolicyName->caption() ?></span></td>
        <td data-name="PolicyName" <?= $Page->PolicyName->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyName">
<span<?= $Page->PolicyName->viewAttributes() ?>>
<?= $Page->PolicyName->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PolicyNo->Visible) { // PolicyNo ?>
    <tr id="r_PolicyNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_PolicyNo"><?= $Page->PolicyNo->caption() ?></span></td>
        <td data-name="PolicyNo" <?= $Page->PolicyNo->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyNo">
<span<?= $Page->PolicyNo->viewAttributes() ?>>
<?= $Page->PolicyNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PolicyAmount->Visible) { // PolicyAmount ?>
    <tr id="r_PolicyAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_PolicyAmount"><?= $Page->PolicyAmount->caption() ?></span></td>
        <td data-name="PolicyAmount" <?= $Page->PolicyAmount->cellAttributes() ?>>
<span id="el_patient_insurance_PolicyAmount">
<span<?= $Page->PolicyAmount->viewAttributes() ?>>
<?= $Page->PolicyAmount->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RefLetterNo->Visible) { // RefLetterNo ?>
    <tr id="r_RefLetterNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_RefLetterNo"><?= $Page->RefLetterNo->caption() ?></span></td>
        <td data-name="RefLetterNo" <?= $Page->RefLetterNo->cellAttributes() ?>>
<span id="el_patient_insurance_RefLetterNo">
<span<?= $Page->RefLetterNo->viewAttributes() ?>>
<?= $Page->RefLetterNo->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferenceBy->Visible) { // ReferenceBy ?>
    <tr id="r_ReferenceBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_ReferenceBy"><?= $Page->ReferenceBy->caption() ?></span></td>
        <td data-name="ReferenceBy" <?= $Page->ReferenceBy->cellAttributes() ?>>
<span id="el_patient_insurance_ReferenceBy">
<span<?= $Page->ReferenceBy->viewAttributes() ?>>
<?= $Page->ReferenceBy->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferenceDate->Visible) { // ReferenceDate ?>
    <tr id="r_ReferenceDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_ReferenceDate"><?= $Page->ReferenceDate->caption() ?></span></td>
        <td data-name="ReferenceDate" <?= $Page->ReferenceDate->cellAttributes() ?>>
<span id="el_patient_insurance_ReferenceDate">
<span<?= $Page->ReferenceDate->viewAttributes() ?>>
<?= $Page->ReferenceDate->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DocumentAttatch->Visible) { // DocumentAttatch ?>
    <tr id="r_DocumentAttatch">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_DocumentAttatch"><?= $Page->DocumentAttatch->caption() ?></span></td>
        <td data-name="DocumentAttatch" <?= $Page->DocumentAttatch->cellAttributes() ?>>
<span id="el_patient_insurance_DocumentAttatch">
<span<?= $Page->DocumentAttatch->viewAttributes() ?>>
<?= GetFileViewTag($Page->DocumentAttatch, $Page->DocumentAttatch->getViewValue(), false) ?>
</span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_createdby"><?= $Page->createdby->caption() ?></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el_patient_insurance_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_createddatetime"><?= $Page->createddatetime->caption() ?></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_patient_insurance_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_modifiedby"><?= $Page->modifiedby->caption() ?></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_patient_insurance_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_insurance_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_insurance_mrnno"><?= $Page->mrnno->caption() ?></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_patient_insurance_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
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

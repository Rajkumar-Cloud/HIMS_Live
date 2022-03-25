<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivfview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fivfview = currentForm = new ew.Form("fivfview", "view");
    loadjs.done("fivfview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.ivf) ew.vars.tables.ivf = <?= JsonEncode(GetClientVar("tables", "ivf")) ?>;
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
<form name="fivfview" id="fivfview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_id"><template id="tpc_ivf_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_ivf_id"><span id="el_ivf_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Male->Visible) { // Male ?>
    <tr id="r_Male">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_Male"><template id="tpc_ivf_Male"><?= $Page->Male->caption() ?></template></span></td>
        <td data-name="Male" <?= $Page->Male->cellAttributes() ?>>
<template id="tpx_ivf_Male"><span id="el_ivf_Male">
<span<?= $Page->Male->viewAttributes() ?>>
<?= $Page->Male->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Female->Visible) { // Female ?>
    <tr id="r_Female">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_Female"><template id="tpc_ivf_Female"><?= $Page->Female->caption() ?></template></span></td>
        <td data-name="Female" <?= $Page->Female->cellAttributes() ?>>
<template id="tpx_ivf_Female"><span id="el_ivf_Female">
<span<?= $Page->Female->viewAttributes() ?>>
<?= $Page->Female->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_status"><template id="tpc_ivf_status"><?= $Page->status->caption() ?></template></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<template id="tpx_ivf_status"><span id="el_ivf_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_createdby"><template id="tpc_ivf_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_ivf_createdby"><span id="el_ivf_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_createddatetime"><template id="tpc_ivf_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_ivf_createddatetime"><span id="el_ivf_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_modifiedby"><template id="tpc_ivf_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_ivf_modifiedby"><span id="el_ivf_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_modifieddatetime"><template id="tpc_ivf_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_ivf_modifieddatetime"><span id="el_ivf_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->malepropic->Visible) { // malepropic ?>
    <tr id="r_malepropic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_malepropic"><template id="tpc_ivf_malepropic"><?= $Page->malepropic->caption() ?></template></span></td>
        <td data-name="malepropic" <?= $Page->malepropic->cellAttributes() ?>>
<template id="tpx_ivf_malepropic"><span id="el_ivf_malepropic">
<span>
<?= GetFileViewTag($Page->malepropic, $Page->malepropic->getViewValue(), false) ?>
</span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->femalepropic->Visible) { // femalepropic ?>
    <tr id="r_femalepropic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_femalepropic"><template id="tpc_ivf_femalepropic"><?= $Page->femalepropic->caption() ?></template></span></td>
        <td data-name="femalepropic" <?= $Page->femalepropic->cellAttributes() ?>>
<template id="tpx_ivf_femalepropic"><span id="el_ivf_femalepropic">
<span>
<?= GetFileViewTag($Page->femalepropic, $Page->femalepropic->getViewValue(), false) ?>
</span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HusbandEducation->Visible) { // HusbandEducation ?>
    <tr id="r_HusbandEducation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_HusbandEducation"><template id="tpc_ivf_HusbandEducation"><?= $Page->HusbandEducation->caption() ?></template></span></td>
        <td data-name="HusbandEducation" <?= $Page->HusbandEducation->cellAttributes() ?>>
<template id="tpx_ivf_HusbandEducation"><span id="el_ivf_HusbandEducation">
<span<?= $Page->HusbandEducation->viewAttributes() ?>>
<?= $Page->HusbandEducation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->WifeEducation->Visible) { // WifeEducation ?>
    <tr id="r_WifeEducation">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_WifeEducation"><template id="tpc_ivf_WifeEducation"><?= $Page->WifeEducation->caption() ?></template></span></td>
        <td data-name="WifeEducation" <?= $Page->WifeEducation->cellAttributes() ?>>
<template id="tpx_ivf_WifeEducation"><span id="el_ivf_WifeEducation">
<span<?= $Page->WifeEducation->viewAttributes() ?>>
<?= $Page->WifeEducation->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
    <tr id="r_HusbandWorkHours">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_HusbandWorkHours"><template id="tpc_ivf_HusbandWorkHours"><?= $Page->HusbandWorkHours->caption() ?></template></span></td>
        <td data-name="HusbandWorkHours" <?= $Page->HusbandWorkHours->cellAttributes() ?>>
<template id="tpx_ivf_HusbandWorkHours"><span id="el_ivf_HusbandWorkHours">
<span<?= $Page->HusbandWorkHours->viewAttributes() ?>>
<?= $Page->HusbandWorkHours->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->WifeWorkHours->Visible) { // WifeWorkHours ?>
    <tr id="r_WifeWorkHours">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_WifeWorkHours"><template id="tpc_ivf_WifeWorkHours"><?= $Page->WifeWorkHours->caption() ?></template></span></td>
        <td data-name="WifeWorkHours" <?= $Page->WifeWorkHours->cellAttributes() ?>>
<template id="tpx_ivf_WifeWorkHours"><span id="el_ivf_WifeWorkHours">
<span<?= $Page->WifeWorkHours->viewAttributes() ?>>
<?= $Page->WifeWorkHours->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientLanguage->Visible) { // PatientLanguage ?>
    <tr id="r_PatientLanguage">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_PatientLanguage"><template id="tpc_ivf_PatientLanguage"><?= $Page->PatientLanguage->caption() ?></template></span></td>
        <td data-name="PatientLanguage" <?= $Page->PatientLanguage->cellAttributes() ?>>
<template id="tpx_ivf_PatientLanguage"><span id="el_ivf_PatientLanguage">
<span<?= $Page->PatientLanguage->viewAttributes() ?>>
<?= $Page->PatientLanguage->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferedBy->Visible) { // ReferedBy ?>
    <tr id="r_ReferedBy">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ReferedBy"><template id="tpc_ivf_ReferedBy"><?= $Page->ReferedBy->caption() ?></template></span></td>
        <td data-name="ReferedBy" <?= $Page->ReferedBy->cellAttributes() ?>>
<template id="tpx_ivf_ReferedBy"><span id="el_ivf_ReferedBy">
<span<?= $Page->ReferedBy->viewAttributes() ?>>
<?= $Page->ReferedBy->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ReferPhNo->Visible) { // ReferPhNo ?>
    <tr id="r_ReferPhNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ReferPhNo"><template id="tpc_ivf_ReferPhNo"><?= $Page->ReferPhNo->caption() ?></template></span></td>
        <td data-name="ReferPhNo" <?= $Page->ReferPhNo->cellAttributes() ?>>
<template id="tpx_ivf_ReferPhNo"><span id="el_ivf_ReferPhNo">
<span<?= $Page->ReferPhNo->viewAttributes() ?>>
<?= $Page->ReferPhNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->WifeCell->Visible) { // WifeCell ?>
    <tr id="r_WifeCell">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_WifeCell"><template id="tpc_ivf_WifeCell"><?= $Page->WifeCell->caption() ?></template></span></td>
        <td data-name="WifeCell" <?= $Page->WifeCell->cellAttributes() ?>>
<template id="tpx_ivf_WifeCell"><span id="el_ivf_WifeCell">
<span<?= $Page->WifeCell->viewAttributes() ?>>
<?= $Page->WifeCell->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HusbandCell->Visible) { // HusbandCell ?>
    <tr id="r_HusbandCell">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_HusbandCell"><template id="tpc_ivf_HusbandCell"><?= $Page->HusbandCell->caption() ?></template></span></td>
        <td data-name="HusbandCell" <?= $Page->HusbandCell->cellAttributes() ?>>
<template id="tpx_ivf_HusbandCell"><span id="el_ivf_HusbandCell">
<span<?= $Page->HusbandCell->viewAttributes() ?>>
<?= $Page->HusbandCell->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->WifeEmail->Visible) { // WifeEmail ?>
    <tr id="r_WifeEmail">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_WifeEmail"><template id="tpc_ivf_WifeEmail"><?= $Page->WifeEmail->caption() ?></template></span></td>
        <td data-name="WifeEmail" <?= $Page->WifeEmail->cellAttributes() ?>>
<template id="tpx_ivf_WifeEmail"><span id="el_ivf_WifeEmail">
<span<?= $Page->WifeEmail->viewAttributes() ?>>
<?= $Page->WifeEmail->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HusbandEmail->Visible) { // HusbandEmail ?>
    <tr id="r_HusbandEmail">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_HusbandEmail"><template id="tpc_ivf_HusbandEmail"><?= $Page->HusbandEmail->caption() ?></template></span></td>
        <td data-name="HusbandEmail" <?= $Page->HusbandEmail->cellAttributes() ?>>
<template id="tpx_ivf_HusbandEmail"><span id="el_ivf_HusbandEmail">
<span<?= $Page->HusbandEmail->viewAttributes() ?>>
<?= $Page->HusbandEmail->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
    <tr id="r_ARTCYCLE">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_ARTCYCLE"><template id="tpc_ivf_ARTCYCLE"><?= $Page->ARTCYCLE->caption() ?></template></span></td>
        <td data-name="ARTCYCLE" <?= $Page->ARTCYCLE->cellAttributes() ?>>
<template id="tpx_ivf_ARTCYCLE"><span id="el_ivf_ARTCYCLE">
<span<?= $Page->ARTCYCLE->viewAttributes() ?>>
<?= $Page->ARTCYCLE->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
    <tr id="r_RESULT">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_RESULT"><template id="tpc_ivf_RESULT"><?= $Page->RESULT->caption() ?></template></span></td>
        <td data-name="RESULT" <?= $Page->RESULT->cellAttributes() ?>>
<template id="tpx_ivf_RESULT"><span id="el_ivf_RESULT">
<span<?= $Page->RESULT->viewAttributes() ?>>
<?= $Page->RESULT->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->malepic->Visible) { // malepic ?>
    <tr id="r_malepic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_malepic"><template id="tpc_ivf_malepic"><?= $Page->malepic->caption() ?></template></span></td>
        <td data-name="malepic" <?= $Page->malepic->cellAttributes() ?>>
<template id="tpx_ivf_malepic"><span id="el_ivf_malepic">
<span<?= $Page->malepic->viewAttributes() ?>>
<?= $Page->malepic->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->femalepic->Visible) { // femalepic ?>
    <tr id="r_femalepic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_femalepic"><template id="tpc_ivf_femalepic"><?= $Page->femalepic->caption() ?></template></span></td>
        <td data-name="femalepic" <?= $Page->femalepic->cellAttributes() ?>>
<template id="tpx_ivf_femalepic"><span id="el_ivf_femalepic">
<span<?= $Page->femalepic->viewAttributes() ?>>
<?= $Page->femalepic->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Mgendar->Visible) { // Mgendar ?>
    <tr id="r_Mgendar">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_Mgendar"><template id="tpc_ivf_Mgendar"><?= $Page->Mgendar->caption() ?></template></span></td>
        <td data-name="Mgendar" <?= $Page->Mgendar->cellAttributes() ?>>
<template id="tpx_ivf_Mgendar"><span id="el_ivf_Mgendar">
<span<?= $Page->Mgendar->viewAttributes() ?>>
<?= $Page->Mgendar->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Fgendar->Visible) { // Fgendar ?>
    <tr id="r_Fgendar">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_Fgendar"><template id="tpc_ivf_Fgendar"><?= $Page->Fgendar->caption() ?></template></span></td>
        <td data-name="Fgendar" <?= $Page->Fgendar->cellAttributes() ?>>
<template id="tpx_ivf_Fgendar"><span id="el_ivf_Fgendar">
<span<?= $Page->Fgendar->viewAttributes() ?>>
<?= $Page->Fgendar->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
    <tr id="r_CoupleID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_CoupleID"><template id="tpc_ivf_CoupleID"><?= $Page->CoupleID->caption() ?></template></span></td>
        <td data-name="CoupleID" <?= $Page->CoupleID->cellAttributes() ?>>
<template id="tpx_ivf_CoupleID"><span id="el_ivf_CoupleID">
<span<?= $Page->CoupleID->viewAttributes() ?>>
<?= $Page->CoupleID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_HospID"><template id="tpc_ivf_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_ivf_HospID"><span id="el_ivf_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_PatientName"><template id="tpc_ivf_PatientName"><?= $Page->PatientName->caption() ?></template></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_ivf_PatientName"><span id="el_ivf_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <tr id="r_PatientID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_PatientID"><template id="tpc_ivf_PatientID"><?= $Page->PatientID->caption() ?></template></span></td>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx_ivf_PatientID"><span id="el_ivf_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <tr id="r_PartnerName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_PartnerName"><template id="tpc_ivf_PartnerName"><?= $Page->PartnerName->caption() ?></template></span></td>
        <td data-name="PartnerName" <?= $Page->PartnerName->cellAttributes() ?>>
<template id="tpx_ivf_PartnerName"><span id="el_ivf_PartnerName">
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <tr id="r_PartnerID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_PartnerID"><template id="tpc_ivf_PartnerID"><?= $Page->PartnerID->caption() ?></template></span></td>
        <td data-name="PartnerID" <?= $Page->PartnerID->cellAttributes() ?>>
<template id="tpx_ivf_PartnerID"><span id="el_ivf_PartnerID">
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <tr id="r_DrID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_DrID"><template id="tpc_ivf_DrID"><?= $Page->DrID->caption() ?></template></span></td>
        <td data-name="DrID" <?= $Page->DrID->cellAttributes() ?>>
<template id="tpx_ivf_DrID"><span id="el_ivf_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<?= $Page->DrID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DrDepartment->Visible) { // DrDepartment ?>
    <tr id="r_DrDepartment">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_DrDepartment"><template id="tpc_ivf_DrDepartment"><?= $Page->DrDepartment->caption() ?></template></span></td>
        <td data-name="DrDepartment" <?= $Page->DrDepartment->cellAttributes() ?>>
<template id="tpx_ivf_DrDepartment"><span id="el_ivf_DrDepartment">
<span<?= $Page->DrDepartment->viewAttributes() ?>>
<?= $Page->DrDepartment->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Doctor->Visible) { // Doctor ?>
    <tr id="r_Doctor">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_ivf_Doctor"><template id="tpc_ivf_Doctor"><?= $Page->Doctor->caption() ?></template></span></td>
        <td data-name="Doctor" <?= $Page->Doctor->cellAttributes() ?>>
<template id="tpx_ivf_Doctor"><span id="el_ivf_Doctor">
<span<?= $Page->Doctor->viewAttributes() ?>>
<?= $Page->Doctor->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_ivfview" class="ew-custom-template"></div>
<template id="tpm_ivfview">
<div id="ct_IvfView"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
</style>
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Patient</h3>
			</div>
			<div class="card-body">
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_Female"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_Female"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_femalepropic"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_femalepropic"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_WifeEducation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_WifeEducation"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_WifeWorkHours"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_WifeWorkHours"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_WifeCell"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_WifeCell"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_WifeEmail"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_WifeEmail"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Partner</h3>
			</div>
			<div class="card-body">
				<div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_Male"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_Male"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_malepropic"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_malepropic"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_HusbandEducation"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_HusbandEducation"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_HusbandWorkHours"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_HusbandWorkHours"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_HusbandCell"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_HusbandCell"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_HusbandEmail"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_HusbandEmail"></slot></span>
				  </div>
				  			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
<table class="ew-table">
	 <tbody>
		 <tr>
		 	<td><slot class="ew-slot" name="tpc_ivf_DrID"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_DrID"></slot></td>
			<td><slot class="ew-slot" name="tpc_ivf_Doctor"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_Doctor"></slot></td>
			<td><slot class="ew-slot" name="tpc_ivf_DrDepartment"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_DrDepartment"></slot></td>
		</tr>
	  </tbody>
</table>
 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_PatientLanguage"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_PatientLanguage"></slot></span>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ReferedBy"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ReferedBy"></slot></span>
					<span class="ew-cell"><slot class="ew-slot" name="tpc_ivf_ReferPhNo"></slot>&nbsp;<slot class="ew-slot" name="tpx_ivf_ReferPhNo"></slot></span>
</div>
</div>
</template>
<?php
    if (in_array("ivf_treatment_plan", explode(",", $Page->getCurrentDetailTable())) && $ivf_treatment_plan->DetailView) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("ivf_treatment_plan", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "IvfTreatmentPlanGrid.php" ?>
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_ivfview", "tpm_ivfview", "ivfview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
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

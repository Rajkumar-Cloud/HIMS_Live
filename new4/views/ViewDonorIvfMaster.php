<?php

namespace PHPMaker2021\HIMS;

// Table
$view_donor_ivf = Container("view_donor_ivf");
?>
<?php if ($view_donor_ivf->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_view_donor_ivfmaster" class="table ew-view-table ew-master-table ew-vertical d-none">
    <tbody>
<?php if ($view_donor_ivf->id->Visible) { // id ?>
        <tr id="r_id">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_id"><?= $view_donor_ivf->id->caption() ?></template></td>
            <td <?= $view_donor_ivf->id->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_id"><span id="el_view_donor_ivf_id">
<span<?= $view_donor_ivf->id->viewAttributes() ?>>
<?= $view_donor_ivf->id->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->Male->Visible) { // Male ?>
        <tr id="r_Male">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_Male"><?= $view_donor_ivf->Male->caption() ?></template></td>
            <td <?= $view_donor_ivf->Male->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_Male"><span id="el_view_donor_ivf_Male">
<span<?= $view_donor_ivf->Male->viewAttributes() ?>>
<?= $view_donor_ivf->Male->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->Female->Visible) { // Female ?>
        <tr id="r_Female">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_Female"><?= $view_donor_ivf->Female->caption() ?></template></td>
            <td <?= $view_donor_ivf->Female->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_Female"><span id="el_view_donor_ivf_Female">
<span<?= $view_donor_ivf->Female->viewAttributes() ?>>
<?= $view_donor_ivf->Female->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->status->Visible) { // status ?>
        <tr id="r_status">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_status"><?= $view_donor_ivf->status->caption() ?></template></td>
            <td <?= $view_donor_ivf->status->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_status"><span id="el_view_donor_ivf_status">
<span<?= $view_donor_ivf->status->viewAttributes() ?>>
<?= $view_donor_ivf->status->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->createdby->Visible) { // createdby ?>
        <tr id="r_createdby">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_createdby"><?= $view_donor_ivf->createdby->caption() ?></template></td>
            <td <?= $view_donor_ivf->createdby->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_createdby"><span id="el_view_donor_ivf_createdby">
<span<?= $view_donor_ivf->createdby->viewAttributes() ?>>
<?= $view_donor_ivf->createdby->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->createddatetime->Visible) { // createddatetime ?>
        <tr id="r_createddatetime">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_createddatetime"><?= $view_donor_ivf->createddatetime->caption() ?></template></td>
            <td <?= $view_donor_ivf->createddatetime->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_createddatetime"><span id="el_view_donor_ivf_createddatetime">
<span<?= $view_donor_ivf->createddatetime->viewAttributes() ?>>
<?= $view_donor_ivf->createddatetime->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->modifiedby->Visible) { // modifiedby ?>
        <tr id="r_modifiedby">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_modifiedby"><?= $view_donor_ivf->modifiedby->caption() ?></template></td>
            <td <?= $view_donor_ivf->modifiedby->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_modifiedby"><span id="el_view_donor_ivf_modifiedby">
<span<?= $view_donor_ivf->modifiedby->viewAttributes() ?>>
<?= $view_donor_ivf->modifiedby->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->modifieddatetime->Visible) { // modifieddatetime ?>
        <tr id="r_modifieddatetime">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_modifieddatetime"><?= $view_donor_ivf->modifieddatetime->caption() ?></template></td>
            <td <?= $view_donor_ivf->modifieddatetime->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_modifieddatetime"><span id="el_view_donor_ivf_modifieddatetime">
<span<?= $view_donor_ivf->modifieddatetime->viewAttributes() ?>>
<?= $view_donor_ivf->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->malepropic->Visible) { // malepropic ?>
        <tr id="r_malepropic">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_malepropic"><?= $view_donor_ivf->malepropic->caption() ?></template></td>
            <td <?= $view_donor_ivf->malepropic->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_malepropic"><span id="el_view_donor_ivf_malepropic">
<span>
<?= GetFileViewTag($view_donor_ivf->malepropic, $view_donor_ivf->malepropic->getViewValue(), false) ?>
</span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->femalepropic->Visible) { // femalepropic ?>
        <tr id="r_femalepropic">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_femalepropic"><?= $view_donor_ivf->femalepropic->caption() ?></template></td>
            <td <?= $view_donor_ivf->femalepropic->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_femalepropic"><span id="el_view_donor_ivf_femalepropic">
<span>
<?= GetFileViewTag($view_donor_ivf->femalepropic, $view_donor_ivf->femalepropic->getViewValue(), false) ?>
</span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->HusbandEducation->Visible) { // HusbandEducation ?>
        <tr id="r_HusbandEducation">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_HusbandEducation"><?= $view_donor_ivf->HusbandEducation->caption() ?></template></td>
            <td <?= $view_donor_ivf->HusbandEducation->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_HusbandEducation"><span id="el_view_donor_ivf_HusbandEducation">
<span<?= $view_donor_ivf->HusbandEducation->viewAttributes() ?>>
<?= $view_donor_ivf->HusbandEducation->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->WifeEducation->Visible) { // WifeEducation ?>
        <tr id="r_WifeEducation">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_WifeEducation"><?= $view_donor_ivf->WifeEducation->caption() ?></template></td>
            <td <?= $view_donor_ivf->WifeEducation->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_WifeEducation"><span id="el_view_donor_ivf_WifeEducation">
<span<?= $view_donor_ivf->WifeEducation->viewAttributes() ?>>
<?= $view_donor_ivf->WifeEducation->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->HusbandWorkHours->Visible) { // HusbandWorkHours ?>
        <tr id="r_HusbandWorkHours">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_HusbandWorkHours"><?= $view_donor_ivf->HusbandWorkHours->caption() ?></template></td>
            <td <?= $view_donor_ivf->HusbandWorkHours->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_HusbandWorkHours"><span id="el_view_donor_ivf_HusbandWorkHours">
<span<?= $view_donor_ivf->HusbandWorkHours->viewAttributes() ?>>
<?= $view_donor_ivf->HusbandWorkHours->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->WifeWorkHours->Visible) { // WifeWorkHours ?>
        <tr id="r_WifeWorkHours">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_WifeWorkHours"><?= $view_donor_ivf->WifeWorkHours->caption() ?></template></td>
            <td <?= $view_donor_ivf->WifeWorkHours->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_WifeWorkHours"><span id="el_view_donor_ivf_WifeWorkHours">
<span<?= $view_donor_ivf->WifeWorkHours->viewAttributes() ?>>
<?= $view_donor_ivf->WifeWorkHours->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->PatientLanguage->Visible) { // PatientLanguage ?>
        <tr id="r_PatientLanguage">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_PatientLanguage"><?= $view_donor_ivf->PatientLanguage->caption() ?></template></td>
            <td <?= $view_donor_ivf->PatientLanguage->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_PatientLanguage"><span id="el_view_donor_ivf_PatientLanguage">
<span<?= $view_donor_ivf->PatientLanguage->viewAttributes() ?>>
<?= $view_donor_ivf->PatientLanguage->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->ReferedBy->Visible) { // ReferedBy ?>
        <tr id="r_ReferedBy">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_ReferedBy"><?= $view_donor_ivf->ReferedBy->caption() ?></template></td>
            <td <?= $view_donor_ivf->ReferedBy->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_ReferedBy"><span id="el_view_donor_ivf_ReferedBy">
<span<?= $view_donor_ivf->ReferedBy->viewAttributes() ?>>
<?= $view_donor_ivf->ReferedBy->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->ReferPhNo->Visible) { // ReferPhNo ?>
        <tr id="r_ReferPhNo">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_ReferPhNo"><?= $view_donor_ivf->ReferPhNo->caption() ?></template></td>
            <td <?= $view_donor_ivf->ReferPhNo->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_ReferPhNo"><span id="el_view_donor_ivf_ReferPhNo">
<span<?= $view_donor_ivf->ReferPhNo->viewAttributes() ?>>
<?= $view_donor_ivf->ReferPhNo->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->WifeCell->Visible) { // WifeCell ?>
        <tr id="r_WifeCell">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_WifeCell"><?= $view_donor_ivf->WifeCell->caption() ?></template></td>
            <td <?= $view_donor_ivf->WifeCell->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_WifeCell"><span id="el_view_donor_ivf_WifeCell">
<span<?= $view_donor_ivf->WifeCell->viewAttributes() ?>>
<?= $view_donor_ivf->WifeCell->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->HusbandCell->Visible) { // HusbandCell ?>
        <tr id="r_HusbandCell">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_HusbandCell"><?= $view_donor_ivf->HusbandCell->caption() ?></template></td>
            <td <?= $view_donor_ivf->HusbandCell->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_HusbandCell"><span id="el_view_donor_ivf_HusbandCell">
<span<?= $view_donor_ivf->HusbandCell->viewAttributes() ?>>
<?= $view_donor_ivf->HusbandCell->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->WifeEmail->Visible) { // WifeEmail ?>
        <tr id="r_WifeEmail">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_WifeEmail"><?= $view_donor_ivf->WifeEmail->caption() ?></template></td>
            <td <?= $view_donor_ivf->WifeEmail->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_WifeEmail"><span id="el_view_donor_ivf_WifeEmail">
<span<?= $view_donor_ivf->WifeEmail->viewAttributes() ?>>
<?= $view_donor_ivf->WifeEmail->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->HusbandEmail->Visible) { // HusbandEmail ?>
        <tr id="r_HusbandEmail">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_HusbandEmail"><?= $view_donor_ivf->HusbandEmail->caption() ?></template></td>
            <td <?= $view_donor_ivf->HusbandEmail->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_HusbandEmail"><span id="el_view_donor_ivf_HusbandEmail">
<span<?= $view_donor_ivf->HusbandEmail->viewAttributes() ?>>
<?= $view_donor_ivf->HusbandEmail->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <tr id="r_ARTCYCLE">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_ARTCYCLE"><?= $view_donor_ivf->ARTCYCLE->caption() ?></template></td>
            <td <?= $view_donor_ivf->ARTCYCLE->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_ARTCYCLE"><span id="el_view_donor_ivf_ARTCYCLE">
<span<?= $view_donor_ivf->ARTCYCLE->viewAttributes() ?>>
<?= $view_donor_ivf->ARTCYCLE->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->RESULT->Visible) { // RESULT ?>
        <tr id="r_RESULT">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_RESULT"><?= $view_donor_ivf->RESULT->caption() ?></template></td>
            <td <?= $view_donor_ivf->RESULT->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_RESULT"><span id="el_view_donor_ivf_RESULT">
<span<?= $view_donor_ivf->RESULT->viewAttributes() ?>>
<?= $view_donor_ivf->RESULT->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->CoupleID->Visible) { // CoupleID ?>
        <tr id="r_CoupleID">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_CoupleID"><?= $view_donor_ivf->CoupleID->caption() ?></template></td>
            <td <?= $view_donor_ivf->CoupleID->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_CoupleID"><span id="el_view_donor_ivf_CoupleID">
<span<?= $view_donor_ivf->CoupleID->viewAttributes() ?>>
<?= $view_donor_ivf->CoupleID->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->HospID->Visible) { // HospID ?>
        <tr id="r_HospID">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_HospID"><?= $view_donor_ivf->HospID->caption() ?></template></td>
            <td <?= $view_donor_ivf->HospID->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_HospID"><span id="el_view_donor_ivf_HospID">
<span<?= $view_donor_ivf->HospID->viewAttributes() ?>>
<?= $view_donor_ivf->HospID->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->PatientName->Visible) { // PatientName ?>
        <tr id="r_PatientName">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_PatientName"><?= $view_donor_ivf->PatientName->caption() ?></template></td>
            <td <?= $view_donor_ivf->PatientName->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_PatientName"><span id="el_view_donor_ivf_PatientName">
<span<?= $view_donor_ivf->PatientName->viewAttributes() ?>>
<?= $view_donor_ivf->PatientName->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->PatientID->Visible) { // PatientID ?>
        <tr id="r_PatientID">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_PatientID"><?= $view_donor_ivf->PatientID->caption() ?></template></td>
            <td <?= $view_donor_ivf->PatientID->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_PatientID"><span id="el_view_donor_ivf_PatientID">
<span<?= $view_donor_ivf->PatientID->viewAttributes() ?>>
<?= $view_donor_ivf->PatientID->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->PartnerName->Visible) { // PartnerName ?>
        <tr id="r_PartnerName">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_PartnerName"><?= $view_donor_ivf->PartnerName->caption() ?></template></td>
            <td <?= $view_donor_ivf->PartnerName->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_PartnerName"><span id="el_view_donor_ivf_PartnerName">
<span<?= $view_donor_ivf->PartnerName->viewAttributes() ?>>
<?= $view_donor_ivf->PartnerName->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->PartnerID->Visible) { // PartnerID ?>
        <tr id="r_PartnerID">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_PartnerID"><?= $view_donor_ivf->PartnerID->caption() ?></template></td>
            <td <?= $view_donor_ivf->PartnerID->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_PartnerID"><span id="el_view_donor_ivf_PartnerID">
<span<?= $view_donor_ivf->PartnerID->viewAttributes() ?>>
<?= $view_donor_ivf->PartnerID->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->DrID->Visible) { // DrID ?>
        <tr id="r_DrID">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_DrID"><?= $view_donor_ivf->DrID->caption() ?></template></td>
            <td <?= $view_donor_ivf->DrID->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_DrID"><span id="el_view_donor_ivf_DrID">
<span<?= $view_donor_ivf->DrID->viewAttributes() ?>>
<?= $view_donor_ivf->DrID->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->DrDepartment->Visible) { // DrDepartment ?>
        <tr id="r_DrDepartment">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_DrDepartment"><?= $view_donor_ivf->DrDepartment->caption() ?></template></td>
            <td <?= $view_donor_ivf->DrDepartment->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_DrDepartment"><span id="el_view_donor_ivf_DrDepartment">
<span<?= $view_donor_ivf->DrDepartment->viewAttributes() ?>>
<?= $view_donor_ivf->DrDepartment->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
<?php if ($view_donor_ivf->Doctor->Visible) { // Doctor ?>
        <tr id="r_Doctor">
            <td class="<?= $view_donor_ivf->TableLeftColumnClass ?>"><template id="tpc_view_donor_ivf_Doctor"><?= $view_donor_ivf->Doctor->caption() ?></template></td>
            <td <?= $view_donor_ivf->Doctor->cellAttributes() ?>>
<template id="tpx_view_donor_ivf_Doctor"><span id="el_view_donor_ivf_Doctor">
<span<?= $view_donor_ivf->Doctor->viewAttributes() ?>>
<?= $view_donor_ivf->Doctor->getViewValue() ?></span>
</span></template>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<div id="tpd_view_donor_ivfmaster" class="ew-custom-template"></div>
<template id="tpm_view_donor_ivfmaster">
<div id="ct_ViewDonorIvfMaster"><style>
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
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["id"] ;
$IVFid = $_GET["fk_id"] ;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
$results2 = $dbhelper->ExecuteRows($sql);
if($results2[0]["profilePic"] == "")
{
   $PatientProfilePic = "hims\profile-picture.png";
}else{
 $PatientProfilePic = $results2[0]["profilePic"];
}
if($results1[0]["profilePic"] == "")
{
   $PartnerProfilePic = "hims\profile-picture.png";
}else{
 $PartnerProfilePic = $results1[0]["profilePic"];
}
?>	
 <?php  if($results[0]["Male"]== '0')
{ echo "Donor ID : ".$results[0]["CoupleID"]; }
else{ echo "Couple ID : ".$results[0]["CoupleID"]; }
  ?>
<div class="row">
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
<div style="visibility: hidden" class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Partner Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Partner Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PartnerProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results1[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results1[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<?php
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$VitalsHistory = $dbhelper->ExecuteRows($sql);
	$VitalsHistoryRowCount = count($VitalsHistory);
	if($VitalsHistory == false)
	{
		$$VitalsHistorywarn = "";
		$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$$VitalsHistorywarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
			if($cid == $VitalsHistory[$VitalsHistoryRowCount-1]["TidNo"])
			{
				$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $VitalsHistoryRowCount; $x++) {
					if($cid == $VitalsHistory[$x]["TidNo"])
					{
						$kk = 1;
						$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";
				}
			}
		}else{
			$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
	$opurl = "view_opd_follow_upadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";

	//$ivfTreatmentwarnUrl = "treatment.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$ivfTreatmentwarnUrl ="ivf_treatment_planlist.php?showdetail=&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_et_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivf_et_chart = $dbhelper->ExecuteRows($sql);
	$Vivf_et_chartRowCount = count($ivf_et_chart);
	if($ivf_et_chart == false)
	{
		$Etcountwarn = "";
		$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($Vivf_et_chartRowCount > 0)
		{
			$Etcountwarn ='<span class="badge bg-warning">'.$Vivf_et_chartRowCount.'</span>';
			if($cid == $ivf_et_chart[$Vivf_et_chartRowCount-1]["TidNo"])
			{
				$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $Vivf_et_chartRowCount; $x++) {
					if($cid == $ivf_et_chart[$x]["TidNo"])
					{
						$kk = 1;
						$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
	//http://localhost:1445/ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_art_summary where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfartsummary = $dbhelper->ExecuteRows($sql);
	$ivfartsummaryRowCount = count($ivfartsummary);
	if($ivfartsummary == false)
	{
		$ivfartsummarycountwarn = "";
		$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfartsummaryRowCount > 0)
		{
			$ivfartsummarycountwarn ='<span class="badge bg-warning">'.$ivfartsummaryRowCount.'</span>';
			if($cid == $ivfartsummary[$ivfartsummaryRowCount-1]["TidNo"])
			{
				$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfartsummaryRowCount; $x++) {
					if($cid == $ivfartsummary[$x]["TidNo"])
					{
						$kk = 1;
						$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_Name=597&fk_RIDNO=11
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_stimulation_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfstimulationchart = $dbhelper->ExecuteRows($sql);
	$ivfstimulationchartRowCount = count($ivfstimulationchart);
	if($ivfstimulationchart == false)
	{
		$ivfstimulationchartwarn = "";
		$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$ivfstimulationchartwarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
			if($cid == $ivfstimulationchart[$ivfstimulationchartRowCount-1]["TidNo"])
			{
				$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfstimulationchartRowCount; $x++) {
					if($cid == $ivfstimulationchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where RIDNo='".$IVFid."' and PatientName='".$results2[0]["id"]."' ;";
	$ivfsemenanalysisreport = $dbhelper->ExecuteRows($sql);
	$ivfsemenanalysisreportRowCount = count($ivfsemenanalysisreport);
	if($ivfsemenanalysisreport == false)
	{
		$ivfsemenanalysisreportwarn = "";
		$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfsemenanalysisreportRowCount > 0)
		{
			$ivfsemenanalysisreportwarn ='<span class="badge bg-warning">'.$ivfsemenanalysisreportRowCount.'</span>';
			if($cid == $ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["TidNo"])
			{
				$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfsemenanalysisreportRowCount; $x++) {
					if($cid == $ivfsemenanalysisreport[$x]["TidNo"])
					{
						$kk = 1;
						$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_ovum_pick_up_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfovumpickupchart = $dbhelper->ExecuteRows($sql);
	$ivfovumpickupchartRowCount = count($ivfovumpickupchart);
	if($ivfovumpickupchart == false)
	{
		$ivfovumpickupchartwarn = "";
		$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfovumpickupchartRowCount > 0)
		{
			$ivfovumpickupchartwarn ='<span class="badge bg-warning">'.$ivfovumpickupchartRowCount.'</span>';
			if($cid == $ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["TidNo"])
			{
				$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfovumpickupchartRowCount; $x++) {
					if($cid == $ivfovumpickupchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
   // http://localhost:1445/ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_otherprocedure where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfotherprocedure = $dbhelper->ExecuteRows($sql);
	$ivfotherprocedureRowCount = count($ivfotherprocedure);
	if($ivfotherprocedure == false)
	{
		$ivfotherprocedurewarn = "";
		$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfotherprocedureRowCount > 0)
		{
			$ivfotherprocedurewarn ='<span class="badge bg-warning">'.$ivfotherprocedureRowCount.'</span>';
			if($cid == $ivfotherprocedure[$ivfotherprocedureRowCount-1]["TidNo"])
			{
				$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfotherprocedureRowCount; $x++) {
					if($cid == $ivfotherprocedure[$x]["TidNo"])
					{
						$kk = 1;
						$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$ivfembryologychartlistUrl = "ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	//http://localhost:1445/ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$patientserviceslistUrl = "patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";
	//http://localhost:1445/patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_Name=597&fk_RIDNO=11&fk_id=1
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	//http://localhost:1445/ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_RIDNO=11&fk_Name=597
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$TrPlanurl = "ivf_treatment_planview.php?showdetail=&id=".$cid."&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";
	//http://localhost:1445/ivf_treatment_planview.php?showdetail=&id=1&showmaster=ivf&fk_id=11&fk_Female=597
?>
		<div class="card">
			  <div class="card-header">
				<h3 class="card-title">Application Buttons</h3>
			  </div>
			  <div class="card-body">
				<a class="btn btn-app"  href="javascript:history.back()">
				  <i class="fas fa-undo"></i> Back
				</a>	  
			  </div>
			  <!-- /.card-body -->
		</div>
</div>
</template>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($view_donor_ivf->Rows) ?> };
    ew.applyTemplate("tpd_view_donor_ivfmaster", "tpm_view_donor_ivfmaster", "view_donor_ivfmaster", "<?= $view_donor_ivf->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
<?php } ?>

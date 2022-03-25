<?php

namespace PHPMaker2021\HIMS;

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
<script>
if (!ew.vars.tables.patient_follow_up) ew.vars.tables.patient_follow_up = <?= JsonEncode(GetClientVar("tables", "patient_follow_up")) ?>;
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
<form name="fpatient_follow_upview" id="fpatient_follow_upview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_follow_up">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_id"><template id="tpc_patient_follow_up_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_patient_follow_up_id"><span id="el_patient_follow_up_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <tr id="r_PatID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_PatID"><template id="tpc_patient_follow_up_PatID"><?= $Page->PatID->caption() ?></template></span></td>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<template id="tpx_patient_follow_up_PatID"><span id="el_patient_follow_up_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_PatientName"><template id="tpc_patient_follow_up_PatientName"><?= $Page->PatientName->caption() ?></template></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_patient_follow_up_PatientName"><span id="el_patient_follow_up_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <tr id="r_MobileNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_MobileNumber"><template id="tpc_patient_follow_up_MobileNumber"><?= $Page->MobileNumber->caption() ?></template></span></td>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<template id="tpx_patient_follow_up_MobileNumber"><span id="el_patient_follow_up_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_mrnno"><template id="tpc_patient_follow_up_mrnno"><?= $Page->mrnno->caption() ?></template></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<template id="tpx_patient_follow_up_mrnno"><span id="el_patient_follow_up_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
    <tr id="r_BP">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_BP"><template id="tpc_patient_follow_up_BP"><?= $Page->BP->caption() ?></template></span></td>
        <td data-name="BP" <?= $Page->BP->cellAttributes() ?>>
<template id="tpx_patient_follow_up_BP"><span id="el_patient_follow_up_BP">
<span<?= $Page->BP->viewAttributes() ?>>
<?= $Page->BP->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
    <tr id="r_Pulse">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Pulse"><template id="tpc_patient_follow_up_Pulse"><?= $Page->Pulse->caption() ?></template></span></td>
        <td data-name="Pulse" <?= $Page->Pulse->cellAttributes() ?>>
<template id="tpx_patient_follow_up_Pulse"><span id="el_patient_follow_up_Pulse">
<span<?= $Page->Pulse->viewAttributes() ?>>
<?= $Page->Pulse->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Resp->Visible) { // Resp ?>
    <tr id="r_Resp">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Resp"><template id="tpc_patient_follow_up_Resp"><?= $Page->Resp->caption() ?></template></span></td>
        <td data-name="Resp" <?= $Page->Resp->cellAttributes() ?>>
<template id="tpx_patient_follow_up_Resp"><span id="el_patient_follow_up_Resp">
<span<?= $Page->Resp->viewAttributes() ?>>
<?= $Page->Resp->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SPO2->Visible) { // SPO2 ?>
    <tr id="r_SPO2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_SPO2"><template id="tpc_patient_follow_up_SPO2"><?= $Page->SPO2->caption() ?></template></span></td>
        <td data-name="SPO2" <?= $Page->SPO2->cellAttributes() ?>>
<template id="tpx_patient_follow_up_SPO2"><span id="el_patient_follow_up_SPO2">
<span<?= $Page->SPO2->viewAttributes() ?>>
<?= $Page->SPO2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->FollowupAdvice->Visible) { // FollowupAdvice ?>
    <tr id="r_FollowupAdvice">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_FollowupAdvice"><template id="tpc_patient_follow_up_FollowupAdvice"><?= $Page->FollowupAdvice->caption() ?></template></span></td>
        <td data-name="FollowupAdvice" <?= $Page->FollowupAdvice->cellAttributes() ?>>
<template id="tpx_patient_follow_up_FollowupAdvice"><span id="el_patient_follow_up_FollowupAdvice">
<span<?= $Page->FollowupAdvice->viewAttributes() ?>>
<?= $Page->FollowupAdvice->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
    <tr id="r_NextReviewDate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_NextReviewDate"><template id="tpc_patient_follow_up_NextReviewDate"><?= $Page->NextReviewDate->caption() ?></template></span></td>
        <td data-name="NextReviewDate" <?= $Page->NextReviewDate->cellAttributes() ?>>
<template id="tpx_patient_follow_up_NextReviewDate"><span id="el_patient_follow_up_NextReviewDate">
<span<?= $Page->NextReviewDate->viewAttributes() ?>>
<?= $Page->NextReviewDate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <tr id="r_Age">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Age"><template id="tpc_patient_follow_up_Age"><?= $Page->Age->caption() ?></template></span></td>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_patient_follow_up_Age"><span id="el_patient_follow_up_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <tr id="r_Gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Gender"><template id="tpc_patient_follow_up_Gender"><?= $Page->Gender->caption() ?></template></span></td>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<template id="tpx_patient_follow_up_Gender"><span id="el_patient_follow_up_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <tr id="r_profilePic">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_profilePic"><template id="tpc_patient_follow_up_profilePic"><?= $Page->profilePic->caption() ?></template></span></td>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_patient_follow_up_profilePic"><span id="el_patient_follow_up_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->_Template->Visible) { // Template ?>
    <tr id="r__Template">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up__Template"><template id="tpc_patient_follow_up__Template"><?= $Page->_Template->caption() ?></template></span></td>
        <td data-name="_Template" <?= $Page->_Template->cellAttributes() ?>>
<template id="tpx_patient_follow_up__Template"><span id="el_patient_follow_up__Template">
<span<?= $Page->_Template->viewAttributes() ?>>
<?= $Page->_Template->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->courseinhospital->Visible) { // courseinhospital ?>
    <tr id="r_courseinhospital">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_courseinhospital"><template id="tpc_patient_follow_up_courseinhospital"><?= $Page->courseinhospital->caption() ?></template></span></td>
        <td data-name="courseinhospital" <?= $Page->courseinhospital->cellAttributes() ?>>
<template id="tpx_patient_follow_up_courseinhospital"><span id="el_patient_follow_up_courseinhospital">
<span<?= $Page->courseinhospital->viewAttributes() ?>>
<?= $Page->courseinhospital->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->procedurenotes->Visible) { // procedurenotes ?>
    <tr id="r_procedurenotes">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_procedurenotes"><template id="tpc_patient_follow_up_procedurenotes"><?= $Page->procedurenotes->caption() ?></template></span></td>
        <td data-name="procedurenotes" <?= $Page->procedurenotes->cellAttributes() ?>>
<template id="tpx_patient_follow_up_procedurenotes"><span id="el_patient_follow_up_procedurenotes">
<span<?= $Page->procedurenotes->viewAttributes() ?>>
<?= $Page->procedurenotes->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->conditionatdischarge->Visible) { // conditionatdischarge ?>
    <tr id="r_conditionatdischarge">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_conditionatdischarge"><template id="tpc_patient_follow_up_conditionatdischarge"><?= $Page->conditionatdischarge->caption() ?></template></span></td>
        <td data-name="conditionatdischarge" <?= $Page->conditionatdischarge->cellAttributes() ?>>
<template id="tpx_patient_follow_up_conditionatdischarge"><span id="el_patient_follow_up_conditionatdischarge">
<span<?= $Page->conditionatdischarge->viewAttributes() ?>>
<?= $Page->conditionatdischarge->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Template1->Visible) { // Template1 ?>
    <tr id="r_Template1">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Template1"><template id="tpc_patient_follow_up_Template1"><?= $Page->Template1->caption() ?></template></span></td>
        <td data-name="Template1" <?= $Page->Template1->cellAttributes() ?>>
<template id="tpx_patient_follow_up_Template1"><span id="el_patient_follow_up_Template1">
<span<?= $Page->Template1->viewAttributes() ?>>
<?= $Page->Template1->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Template2->Visible) { // Template2 ?>
    <tr id="r_Template2">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Template2"><template id="tpc_patient_follow_up_Template2"><?= $Page->Template2->caption() ?></template></span></td>
        <td data-name="Template2" <?= $Page->Template2->cellAttributes() ?>>
<template id="tpx_patient_follow_up_Template2"><span id="el_patient_follow_up_Template2">
<span<?= $Page->Template2->viewAttributes() ?>>
<?= $Page->Template2->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Template3->Visible) { // Template3 ?>
    <tr id="r_Template3">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Template3"><template id="tpc_patient_follow_up_Template3"><?= $Page->Template3->caption() ?></template></span></td>
        <td data-name="Template3" <?= $Page->Template3->cellAttributes() ?>>
<template id="tpx_patient_follow_up_Template3"><span id="el_patient_follow_up_Template3">
<span<?= $Page->Template3->viewAttributes() ?>>
<?= $Page->Template3->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_HospID"><template id="tpc_patient_follow_up_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_patient_follow_up_HospID"><span id="el_patient_follow_up_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Reception"><template id="tpc_patient_follow_up_Reception"><?= $Page->Reception->caption() ?></template></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<template id="tpx_patient_follow_up_Reception"><span id="el_patient_follow_up_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <tr id="r_PatientId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_PatientId"><template id="tpc_patient_follow_up_PatientId"><?= $Page->PatientId->caption() ?></template></span></td>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<template id="tpx_patient_follow_up_PatientId"><span id="el_patient_follow_up_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientSearch->Visible) { // PatientSearch ?>
    <tr id="r_PatientSearch">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_PatientSearch"><template id="tpc_patient_follow_up_PatientSearch"><?= $Page->PatientSearch->caption() ?></template></span></td>
        <td data-name="PatientSearch" <?= $Page->PatientSearch->cellAttributes() ?>>
<template id="tpx_patient_follow_up_PatientSearch"><span id="el_patient_follow_up_PatientSearch">
<span<?= $Page->PatientSearch->viewAttributes() ?>>
<?= $Page->PatientSearch->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DischargeAdviceMedicine->Visible) { // DischargeAdviceMedicine ?>
    <tr id="r_DischargeAdviceMedicine">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_DischargeAdviceMedicine"><template id="tpc_patient_follow_up_DischargeAdviceMedicine"><?= $Page->DischargeAdviceMedicine->caption() ?></template></span></td>
        <td data-name="DischargeAdviceMedicine" <?= $Page->DischargeAdviceMedicine->cellAttributes() ?>>
<template id="tpx_patient_follow_up_DischargeAdviceMedicine"><span id="el_patient_follow_up_DischargeAdviceMedicine">
<span<?= $Page->DischargeAdviceMedicine->viewAttributes() ?>>
<?= $Page->DischargeAdviceMedicine->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DischargeAdviceMedicineTemplate->Visible) { // DischargeAdviceMedicineTemplate ?>
    <tr id="r_DischargeAdviceMedicineTemplate">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_DischargeAdviceMedicineTemplate"><template id="tpc_patient_follow_up_DischargeAdviceMedicineTemplate"><?= $Page->DischargeAdviceMedicineTemplate->caption() ?></template></span></td>
        <td data-name="DischargeAdviceMedicineTemplate" <?= $Page->DischargeAdviceMedicineTemplate->cellAttributes() ?>>
<template id="tpx_patient_follow_up_DischargeAdviceMedicineTemplate"><span id="el_patient_follow_up_DischargeAdviceMedicineTemplate">
<span<?= $Page->DischargeAdviceMedicineTemplate->viewAttributes() ?>>
<?= $Page->DischargeAdviceMedicineTemplate->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_patient_follow_upview" class="ew-custom-template"></div>
<template id="tpm_patient_follow_upview">
<div id="ct_PatientFollowUpView"><style>
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
</style>
	<?php
	$fk_id = $_GET["fk_id"] ;
	$fk_patient_id = $_GET["fk_patient_id"] ;
	$fk_mrnNo = $_GET["fk_mrnNo"] ;
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	if($Tid == "")
	{
		$vviid = $_GET["id"] ;
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_follow_up where id='".$vviid."'; ";
		$resuVi = $dbhelper->ExecuteRows($sql);
		$Tid = $resuVi[0]["PatientId"];
		$fk_mrnNo = $resuVi[0]["mrnno"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results1[0]["profilePic"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
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
<div hidden>
<p id="PPatientSearch" hidden><slot class="ew-slot" name="tpc_patient_follow_up_PatientSearch"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_PatientSearch"></slot></p>
</div>
<p id="profilePic" hidden><slot class="ew-slot" name="tpc_patient_follow_up_profilePic"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_profilePic"></slot></p>
<p id="SurfaceArea" hidden><slot class="ew-slot" name="tpx_SurfaceArea"></slot></p>
<p id="BodyMassIndex" hidden><slot class="ew-slot" name="tpx_BodyMassIndex"></slot></p>
<p id="idmrnnokk" hidden><slot class="ew-slot" name="tpc_patient_follow_up_mrnno"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_mrnno"></slot></p>
<div hidden>
  <p><slot class="ew-slot" name="tpc_patient_follow_up_Reception"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_Reception"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_follow_up_PatientId"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_PatientId"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_follow_up_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_PatientName"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_follow_up_Age"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_Age"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_follow_up_Gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_Gender"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_follow_up_PatID"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_PatID"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_follow_up_MobileNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_MobileNumber"></slot></p> 
</div>
	<div class="row">
<div id="patientdataview" class="col-md-12">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span id="SemPatientId" class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span id="SemPatientPatientName" class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span id="SemPatientGender" class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span id="SemPatientBloodGroup" class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient"  class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				<div class="col-sm-4">
					<div class="description-block">
					  <h5 id="SemPatientEmail" class="description-header">MRN No : <?php echo $fk_mrnNo; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span id="SemPatientAge" class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 id="SemPatientMobile" class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<slot class="ew-slot" name="tpx_Template"></slot>
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
<slot class="ew-slot" name="tpc_patient_follow_up_courseinhospital"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_courseinhospital"></slot>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<slot class="ew-slot" name="tpx_Template"></slot>
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
<slot class="ew-slot" name="tpc_patient_follow_up_procedurenotes"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_procedurenotes"></slot>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<slot class="ew-slot" name="tpx_Template"></slot>
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
<slot class="ew-slot" name="tpc_patient_follow_up_conditionatdischarge"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_conditionatdischarge"></slot>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  	<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_follow_up_BP"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_BP"></slot>  mm of Hg </td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_follow_up_Pulse"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_Pulse"></slot>  mints</td></tr>						
						<tr><td><slot class="ew-slot" name="tpc_patient_follow_up_Resp"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_Resp"></slot></td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  		<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
			  				<tr><td><slot class="ew-slot" name="tpc_patient_follow_up_SPO2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_SPO2"></slot> F</td></tr>
			  				<tr><td><slot class="ew-slot" name="tpc_patient_follow_up_NextReviewDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_NextReviewDate"></slot> </td></tr>
			  			</tbody>
			  		</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<slot class="ew-slot" name="tpc_patient_follow_up_DischargeAdviceMedicineTemplate"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_DischargeAdviceMedicineTemplate"></slot>
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
<slot class="ew-slot" name="tpc_patient_follow_up_DischargeAdviceMedicine"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_DischargeAdviceMedicine"></slot>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<slot class="ew-slot" name="tpx_Template"></slot>
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
<slot class="ew-slot" name="tpc_patient_follow_up_FollowupAdvice"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_FollowupAdvice"></slot>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<?php
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	$Reception = $_GET["fk_id"] ;
	$PatientId = $_GET["fk_patient_id"] ;
	$mrnno = $_GET["fk_mrnNo"] ;
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_vitals where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$vitalsURL = "patient_vitalsadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$vitalsURL = "patient_vitalsedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_history where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$historyURL = "patient_historyadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$historyURL = "patient_historyedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_provisional_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$provisionaldiagnosisURL = "patient_provisional_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$provisionaldiagnosisURL = "patient_provisional_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_prescription where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$prescriptionURL = "patient_prescriptionlist.php?action=gridadd&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$prescriptionURL = "patient_prescriptionlist.php?action=gridedit&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_final_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$finaldiagnosisURL = "patient_final_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$finaldiagnosisURL = "patient_final_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_follow_up where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$followupURL = "patient_follow_upadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$followupURL = "patient_follow_upedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_delivery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$deliveryregisterURL = "patient_ot_delivery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$deliveryregisterURL = "patient_ot_delivery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_surgery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$surgeryregisterURL = "patient_ot_surgery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$surgeryregisterURL = "patient_ot_surgery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
?>
<div class="row">
		 <div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  	<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr>
							<td>
								<a href="<?php echo $vitalsURL; ?>" class="btn btn-sm btn-success float-left">Vitals</a>
							</td>
							<td>
								<a href="<?php echo $historyURL; ?>" class="btn btn-sm btn-warning float-left">History</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="<?php echo $provisionaldiagnosisURL; ?>" class="btn btn-sm btn-danger float-left">Provisional Diagnosis</a>
							</td>
							<td>
								<a href="<?php echo $prescriptionURL; ?>" class="btn btn-sm btn-info float-left">Prescription</a>
							</td>
						</tr>						
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  		<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
						<tr>
							<td>
								<a href="<?php echo $finaldiagnosisURL; ?>" class="btn btn-sm btn-success float-left">Final Diagnosis</a>
							</td>
							<td>
								<a href="<?php echo $followupURL; ?>" class="btn btn-sm btn-warning float-left">Follow Up</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="<?php echo $deliveryregisterURL; ?>" class="btn btn-sm btn-danger float-left">Delivery Register</a>
							</td>
							<td>
								<a href="<?php echo $surgeryregisterURL; ?>" class="btn btn-sm btn-info float-left">Surgery Register</a>
							</td>
						</tr>
			  			</tbody>
			  		</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
</div>
</template>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_patient_follow_upview", "tpm_patient_follow_upview", "patient_follow_upview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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

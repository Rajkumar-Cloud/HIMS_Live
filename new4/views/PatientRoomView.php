<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientRoomView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_roomview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    fpatient_roomview = currentForm = new ew.Form("fpatient_roomview", "view");
    loadjs.done("fpatient_roomview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.patient_room) ew.vars.tables.patient_room = <?= JsonEncode(GetClientVar("tables", "patient_room")) ?>;
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
<form name="fpatient_roomview" id="fpatient_roomview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_room">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_id"><template id="tpc_patient_room_id"><?= $Page->id->caption() ?></template></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx_patient_room_id"><span id="el_patient_room_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <tr id="r_Reception">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_Reception"><template id="tpc_patient_room_Reception"><?= $Page->Reception->caption() ?></template></span></td>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<template id="tpx_patient_room_Reception"><span id="el_patient_room_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <tr id="r_PatientId">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_PatientId"><template id="tpc_patient_room_PatientId"><?= $Page->PatientId->caption() ?></template></span></td>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<template id="tpx_patient_room_PatientId"><span id="el_patient_room_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <tr id="r_mrnno">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_mrnno"><template id="tpc_patient_room_mrnno"><?= $Page->mrnno->caption() ?></template></span></td>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<template id="tpx_patient_room_mrnno"><span id="el_patient_room_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <tr id="r_PatientName">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_PatientName"><template id="tpc_patient_room_PatientName"><?= $Page->PatientName->caption() ?></template></span></td>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_patient_room_PatientName"><span id="el_patient_room_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <tr id="r_Gender">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_Gender"><template id="tpc_patient_room_Gender"><?= $Page->Gender->caption() ?></template></span></td>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<template id="tpx_patient_room_Gender"><span id="el_patient_room_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RoomID->Visible) { // RoomID ?>
    <tr id="r_RoomID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_RoomID"><template id="tpc_patient_room_RoomID"><?= $Page->RoomID->caption() ?></template></span></td>
        <td data-name="RoomID" <?= $Page->RoomID->cellAttributes() ?>>
<template id="tpx_patient_room_RoomID"><span id="el_patient_room_RoomID">
<span<?= $Page->RoomID->viewAttributes() ?>>
<?= $Page->RoomID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RoomNo->Visible) { // RoomNo ?>
    <tr id="r_RoomNo">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_RoomNo"><template id="tpc_patient_room_RoomNo"><?= $Page->RoomNo->caption() ?></template></span></td>
        <td data-name="RoomNo" <?= $Page->RoomNo->cellAttributes() ?>>
<template id="tpx_patient_room_RoomNo"><span id="el_patient_room_RoomNo">
<span<?= $Page->RoomNo->viewAttributes() ?>>
<?= $Page->RoomNo->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->RoomType->Visible) { // RoomType ?>
    <tr id="r_RoomType">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_RoomType"><template id="tpc_patient_room_RoomType"><?= $Page->RoomType->caption() ?></template></span></td>
        <td data-name="RoomType" <?= $Page->RoomType->cellAttributes() ?>>
<template id="tpx_patient_room_RoomType"><span id="el_patient_room_RoomType">
<span<?= $Page->RoomType->viewAttributes() ?>>
<?= $Page->RoomType->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->SharingRoom->Visible) { // SharingRoom ?>
    <tr id="r_SharingRoom">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_SharingRoom"><template id="tpc_patient_room_SharingRoom"><?= $Page->SharingRoom->caption() ?></template></span></td>
        <td data-name="SharingRoom" <?= $Page->SharingRoom->cellAttributes() ?>>
<template id="tpx_patient_room_SharingRoom"><span id="el_patient_room_SharingRoom">
<span<?= $Page->SharingRoom->viewAttributes() ?>>
<?= $Page->SharingRoom->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <tr id="r_Amount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_Amount"><template id="tpc_patient_room_Amount"><?= $Page->Amount->caption() ?></template></span></td>
        <td data-name="Amount" <?= $Page->Amount->cellAttributes() ?>>
<template id="tpx_patient_room_Amount"><span id="el_patient_room_Amount">
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Startdatetime->Visible) { // Startdatetime ?>
    <tr id="r_Startdatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_Startdatetime"><template id="tpc_patient_room_Startdatetime"><?= $Page->Startdatetime->caption() ?></template></span></td>
        <td data-name="Startdatetime" <?= $Page->Startdatetime->cellAttributes() ?>>
<template id="tpx_patient_room_Startdatetime"><span id="el_patient_room_Startdatetime">
<span<?= $Page->Startdatetime->viewAttributes() ?>>
<?= $Page->Startdatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Enddatetime->Visible) { // Enddatetime ?>
    <tr id="r_Enddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_Enddatetime"><template id="tpc_patient_room_Enddatetime"><?= $Page->Enddatetime->caption() ?></template></span></td>
        <td data-name="Enddatetime" <?= $Page->Enddatetime->cellAttributes() ?>>
<template id="tpx_patient_room_Enddatetime"><span id="el_patient_room_Enddatetime">
<span<?= $Page->Enddatetime->viewAttributes() ?>>
<?= $Page->Enddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->DaysHours->Visible) { // DaysHours ?>
    <tr id="r_DaysHours">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_DaysHours"><template id="tpc_patient_room_DaysHours"><?= $Page->DaysHours->caption() ?></template></span></td>
        <td data-name="DaysHours" <?= $Page->DaysHours->cellAttributes() ?>>
<template id="tpx_patient_room_DaysHours"><span id="el_patient_room_DaysHours">
<span<?= $Page->DaysHours->viewAttributes() ?>>
<?= $Page->DaysHours->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Days->Visible) { // Days ?>
    <tr id="r_Days">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_Days"><template id="tpc_patient_room_Days"><?= $Page->Days->caption() ?></template></span></td>
        <td data-name="Days" <?= $Page->Days->cellAttributes() ?>>
<template id="tpx_patient_room_Days"><span id="el_patient_room_Days">
<span<?= $Page->Days->viewAttributes() ?>>
<?= $Page->Days->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->Hours->Visible) { // Hours ?>
    <tr id="r_Hours">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_Hours"><template id="tpc_patient_room_Hours"><?= $Page->Hours->caption() ?></template></span></td>
        <td data-name="Hours" <?= $Page->Hours->cellAttributes() ?>>
<template id="tpx_patient_room_Hours"><span id="el_patient_room_Hours">
<span<?= $Page->Hours->viewAttributes() ?>>
<?= $Page->Hours->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->TotalAmount->Visible) { // TotalAmount ?>
    <tr id="r_TotalAmount">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_TotalAmount"><template id="tpc_patient_room_TotalAmount"><?= $Page->TotalAmount->caption() ?></template></span></td>
        <td data-name="TotalAmount" <?= $Page->TotalAmount->cellAttributes() ?>>
<template id="tpx_patient_room_TotalAmount"><span id="el_patient_room_TotalAmount">
<span<?= $Page->TotalAmount->viewAttributes() ?>>
<?= $Page->TotalAmount->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <tr id="r_PatID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_PatID"><template id="tpc_patient_room_PatID"><?= $Page->PatID->caption() ?></template></span></td>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<template id="tpx_patient_room_PatID"><span id="el_patient_room_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <tr id="r_MobileNumber">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_MobileNumber"><template id="tpc_patient_room_MobileNumber"><?= $Page->MobileNumber->caption() ?></template></span></td>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<template id="tpx_patient_room_MobileNumber"><span id="el_patient_room_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <tr id="r_HospID">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_HospID"><template id="tpc_patient_room_HospID"><?= $Page->HospID->caption() ?></template></span></td>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx_patient_room_HospID"><span id="el_patient_room_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <tr id="r_status">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_status"><template id="tpc_patient_room_status"><?= $Page->status->caption() ?></template></span></td>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<template id="tpx_patient_room_status"><span id="el_patient_room_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <tr id="r_createdby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_createdby"><template id="tpc_patient_room_createdby"><?= $Page->createdby->caption() ?></template></span></td>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_patient_room_createdby"><span id="el_patient_room_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <tr id="r_createddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_createddatetime"><template id="tpc_patient_room_createddatetime"><?= $Page->createddatetime->caption() ?></template></span></td>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_patient_room_createddatetime"><span id="el_patient_room_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <tr id="r_modifiedby">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_modifiedby"><template id="tpc_patient_room_modifiedby"><?= $Page->modifiedby->caption() ?></template></span></td>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_patient_room_modifiedby"><span id="el_patient_room_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <tr id="r_modifieddatetime">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_patient_room_modifieddatetime"><template id="tpc_patient_room_modifieddatetime"><?= $Page->modifieddatetime->caption() ?></template></span></td>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_patient_room_modifieddatetime"><span id="el_patient_room_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span></template>
</td>
    </tr>
<?php } ?>
</table>
<div id="tpd_patient_roomview" class="ew-custom-template"></div>
<template id="tpm_patient_roomview">
<div id="ct_PatientRoomView"><style>
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
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_final_diagnosis where id='".$vviid."'; ";
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
<p id="PPatientSearch" hidden><slot class="ew-slot" name="tpc_patient_room_Reception"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_room_Reception"></slot></p>
</div>
<p id="profilePic" hidden><slot class="ew-slot" name="tpx_profilePic"></slot></p>
<p id="SurfaceArea" hidden><slot class="ew-slot" name="tpx_SurfaceArea"></slot></p>
<p id="BodyMassIndex" hidden><slot class="ew-slot" name="tpx_BodyMassIndex"></slot></p>
<p id="idmrnnokk" hidden><slot class="ew-slot" name="tpc_patient_room_mrnno"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_room_mrnno"></slot></p>
<div hidden>
  <p><slot class="ew-slot" name="tpc_patient_room_Reception"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_room_Reception"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_room_PatientId"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_room_PatientId"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_room_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_room_PatientName"></slot></p> 
  <p><slot class="ew-slot" name="tpx_Age"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_room_Gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_room_Gender"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_room_PatID"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_room_PatID"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_room_MobileNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_room_MobileNumber"></slot></p> 
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
<slot class="ew-slot" name="tpx_FinalDiagnosisTemplate"></slot>
<div class="row">
 		<div class="col-lg-12">
			<div class="card bg-info" style="color:#ac3973;">             
			  <div class="card-body">
			  <slot class="ew-slot" name="tpx_FinalDiagnosis"></slot>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<slot class="ew-slot" name="tpx_TreatmentsTemplate"></slot>
<div class="row">
 		<div class="col-lg-12">
			<div class="card bg-info" style="color:#8a8a5c;">             
			  <div class="card-body">
			  <slot class="ew-slot" name="tpx_Treatments"></slot>
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
    ew.applyTemplate("tpd_patient_roomview", "tpm_patient_roomview", "patient_roomview", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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

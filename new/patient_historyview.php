<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$patient_history_view = new patient_history_view();

// Run the page
$patient_history_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_history_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_history_view->isExport()) { ?>
<script>
var fpatient_historyview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpatient_historyview = currentForm = new ew.Form("fpatient_historyview", "view");
	loadjs.done("fpatient_historyview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$patient_history_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_history_view->ExportOptions->render("body") ?>
<?php $patient_history_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_history_view->showPageHeader(); ?>
<?php
$patient_history_view->showMessage();
?>
<form name="fpatient_historyview" id="fpatient_historyview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_history">
<input type="hidden" name="modal" value="<?php echo (int)$patient_history_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($patient_history_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_id"><script id="tpc_patient_history_id" type="text/html"><?php echo $patient_history_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $patient_history_view->id->cellAttributes() ?>>
<script id="tpx_patient_history_id" type="text/html"><span id="el_patient_history_id">
<span<?php echo $patient_history_view->id->viewAttributes() ?>><?php echo $patient_history_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_mrnno"><script id="tpc_patient_history_mrnno" type="text/html"><?php echo $patient_history_view->mrnno->caption() ?></script></span></td>
		<td data-name="mrnno" <?php echo $patient_history_view->mrnno->cellAttributes() ?>>
<script id="tpx_patient_history_mrnno" type="text/html"><span id="el_patient_history_mrnno">
<span<?php echo $patient_history_view->mrnno->viewAttributes() ?>><?php echo $patient_history_view->mrnno->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_PatientName"><script id="tpc_patient_history_PatientName" type="text/html"><?php echo $patient_history_view->PatientName->caption() ?></script></span></td>
		<td data-name="PatientName" <?php echo $patient_history_view->PatientName->cellAttributes() ?>>
<script id="tpx_patient_history_PatientName" type="text/html"><span id="el_patient_history_PatientName">
<span<?php echo $patient_history_view->PatientName->viewAttributes() ?>><?php echo $patient_history_view->PatientName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_PatientId"><script id="tpc_patient_history_PatientId" type="text/html"><?php echo $patient_history_view->PatientId->caption() ?></script></span></td>
		<td data-name="PatientId" <?php echo $patient_history_view->PatientId->cellAttributes() ?>>
<script id="tpx_patient_history_PatientId" type="text/html"><span id="el_patient_history_PatientId">
<span<?php echo $patient_history_view->PatientId->viewAttributes() ?>><?php echo $patient_history_view->PatientId->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_MobileNumber"><script id="tpc_patient_history_MobileNumber" type="text/html"><?php echo $patient_history_view->MobileNumber->caption() ?></script></span></td>
		<td data-name="MobileNumber" <?php echo $patient_history_view->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_history_MobileNumber" type="text/html"><span id="el_patient_history_MobileNumber">
<span<?php echo $patient_history_view->MobileNumber->viewAttributes() ?>><?php echo $patient_history_view->MobileNumber->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->MaritalHistory->Visible) { // MaritalHistory ?>
	<tr id="r_MaritalHistory">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_MaritalHistory"><script id="tpc_patient_history_MaritalHistory" type="text/html"><?php echo $patient_history_view->MaritalHistory->caption() ?></script></span></td>
		<td data-name="MaritalHistory" <?php echo $patient_history_view->MaritalHistory->cellAttributes() ?>>
<script id="tpx_patient_history_MaritalHistory" type="text/html"><span id="el_patient_history_MaritalHistory">
<span<?php echo $patient_history_view->MaritalHistory->viewAttributes() ?>><?php echo $patient_history_view->MaritalHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<tr id="r_MenstrualHistory">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_MenstrualHistory"><script id="tpc_patient_history_MenstrualHistory" type="text/html"><?php echo $patient_history_view->MenstrualHistory->caption() ?></script></span></td>
		<td data-name="MenstrualHistory" <?php echo $patient_history_view->MenstrualHistory->cellAttributes() ?>>
<script id="tpx_patient_history_MenstrualHistory" type="text/html"><span id="el_patient_history_MenstrualHistory">
<span<?php echo $patient_history_view->MenstrualHistory->viewAttributes() ?>><?php echo $patient_history_view->MenstrualHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<tr id="r_ObstetricHistory">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_ObstetricHistory"><script id="tpc_patient_history_ObstetricHistory" type="text/html"><?php echo $patient_history_view->ObstetricHistory->caption() ?></script></span></td>
		<td data-name="ObstetricHistory" <?php echo $patient_history_view->ObstetricHistory->cellAttributes() ?>>
<script id="tpx_patient_history_ObstetricHistory" type="text/html"><span id="el_patient_history_ObstetricHistory">
<span<?php echo $patient_history_view->ObstetricHistory->viewAttributes() ?>><?php echo $patient_history_view->ObstetricHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->MedicalHistory->Visible) { // MedicalHistory ?>
	<tr id="r_MedicalHistory">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_MedicalHistory"><script id="tpc_patient_history_MedicalHistory" type="text/html"><?php echo $patient_history_view->MedicalHistory->caption() ?></script></span></td>
		<td data-name="MedicalHistory" <?php echo $patient_history_view->MedicalHistory->cellAttributes() ?>>
<script id="tpx_patient_history_MedicalHistory" type="text/html"><span id="el_patient_history_MedicalHistory">
<span<?php echo $patient_history_view->MedicalHistory->viewAttributes() ?>><?php echo $patient_history_view->MedicalHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<tr id="r_SurgicalHistory">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_SurgicalHistory"><script id="tpc_patient_history_SurgicalHistory" type="text/html"><?php echo $patient_history_view->SurgicalHistory->caption() ?></script></span></td>
		<td data-name="SurgicalHistory" <?php echo $patient_history_view->SurgicalHistory->cellAttributes() ?>>
<script id="tpx_patient_history_SurgicalHistory" type="text/html"><span id="el_patient_history_SurgicalHistory">
<span<?php echo $patient_history_view->SurgicalHistory->viewAttributes() ?>><?php echo $patient_history_view->SurgicalHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->PastHistory->Visible) { // PastHistory ?>
	<tr id="r_PastHistory">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_PastHistory"><script id="tpc_patient_history_PastHistory" type="text/html"><?php echo $patient_history_view->PastHistory->caption() ?></script></span></td>
		<td data-name="PastHistory" <?php echo $patient_history_view->PastHistory->cellAttributes() ?>>
<script id="tpx_patient_history_PastHistory" type="text/html"><span id="el_patient_history_PastHistory">
<span<?php echo $patient_history_view->PastHistory->viewAttributes() ?>><?php echo $patient_history_view->PastHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->TreatmentHistory->Visible) { // TreatmentHistory ?>
	<tr id="r_TreatmentHistory">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_TreatmentHistory"><script id="tpc_patient_history_TreatmentHistory" type="text/html"><?php echo $patient_history_view->TreatmentHistory->caption() ?></script></span></td>
		<td data-name="TreatmentHistory" <?php echo $patient_history_view->TreatmentHistory->cellAttributes() ?>>
<script id="tpx_patient_history_TreatmentHistory" type="text/html"><span id="el_patient_history_TreatmentHistory">
<span<?php echo $patient_history_view->TreatmentHistory->viewAttributes() ?>><?php echo $patient_history_view->TreatmentHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->FamilyHistory->Visible) { // FamilyHistory ?>
	<tr id="r_FamilyHistory">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_FamilyHistory"><script id="tpc_patient_history_FamilyHistory" type="text/html"><?php echo $patient_history_view->FamilyHistory->caption() ?></script></span></td>
		<td data-name="FamilyHistory" <?php echo $patient_history_view->FamilyHistory->cellAttributes() ?>>
<script id="tpx_patient_history_FamilyHistory" type="text/html"><span id="el_patient_history_FamilyHistory">
<span<?php echo $patient_history_view->FamilyHistory->viewAttributes() ?>><?php echo $patient_history_view->FamilyHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_Age"><script id="tpc_patient_history_Age" type="text/html"><?php echo $patient_history_view->Age->caption() ?></script></span></td>
		<td data-name="Age" <?php echo $patient_history_view->Age->cellAttributes() ?>>
<script id="tpx_patient_history_Age" type="text/html"><span id="el_patient_history_Age">
<span<?php echo $patient_history_view->Age->viewAttributes() ?>><?php echo $patient_history_view->Age->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_Gender"><script id="tpc_patient_history_Gender" type="text/html"><?php echo $patient_history_view->Gender->caption() ?></script></span></td>
		<td data-name="Gender" <?php echo $patient_history_view->Gender->cellAttributes() ?>>
<script id="tpx_patient_history_Gender" type="text/html"><span id="el_patient_history_Gender">
<span<?php echo $patient_history_view->Gender->viewAttributes() ?>><?php echo $patient_history_view->Gender->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_profilePic"><script id="tpc_patient_history_profilePic" type="text/html"><?php echo $patient_history_view->profilePic->caption() ?></script></span></td>
		<td data-name="profilePic" <?php echo $patient_history_view->profilePic->cellAttributes() ?>>
<script id="tpx_patient_history_profilePic" type="text/html"><span id="el_patient_history_profilePic">
<span<?php echo $patient_history_view->profilePic->viewAttributes() ?>><?php echo $patient_history_view->profilePic->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->Complaints->Visible) { // Complaints ?>
	<tr id="r_Complaints">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_Complaints"><script id="tpc_patient_history_Complaints" type="text/html"><?php echo $patient_history_view->Complaints->caption() ?></script></span></td>
		<td data-name="Complaints" <?php echo $patient_history_view->Complaints->cellAttributes() ?>>
<script id="tpx_patient_history_Complaints" type="text/html"><span id="el_patient_history_Complaints">
<span<?php echo $patient_history_view->Complaints->viewAttributes() ?>><?php echo $patient_history_view->Complaints->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->illness->Visible) { // illness ?>
	<tr id="r_illness">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_illness"><script id="tpc_patient_history_illness" type="text/html"><?php echo $patient_history_view->illness->caption() ?></script></span></td>
		<td data-name="illness" <?php echo $patient_history_view->illness->cellAttributes() ?>>
<script id="tpx_patient_history_illness" type="text/html"><span id="el_patient_history_illness">
<span<?php echo $patient_history_view->illness->viewAttributes() ?>><?php echo $patient_history_view->illness->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->PersonalHistory->Visible) { // PersonalHistory ?>
	<tr id="r_PersonalHistory">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_PersonalHistory"><script id="tpc_patient_history_PersonalHistory" type="text/html"><?php echo $patient_history_view->PersonalHistory->caption() ?></script></span></td>
		<td data-name="PersonalHistory" <?php echo $patient_history_view->PersonalHistory->cellAttributes() ?>>
<script id="tpx_patient_history_PersonalHistory" type="text/html"><span id="el_patient_history_PersonalHistory">
<span<?php echo $patient_history_view->PersonalHistory->viewAttributes() ?>><?php echo $patient_history_view->PersonalHistory->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->PatientSearch->Visible) { // PatientSearch ?>
	<tr id="r_PatientSearch">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_PatientSearch"><script id="tpc_patient_history_PatientSearch" type="text/html"><?php echo $patient_history_view->PatientSearch->caption() ?></script></span></td>
		<td data-name="PatientSearch" <?php echo $patient_history_view->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_history_PatientSearch" type="text/html"><span id="el_patient_history_PatientSearch">
<span<?php echo $patient_history_view->PatientSearch->viewAttributes() ?>><?php echo $patient_history_view->PatientSearch->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_PatID"><script id="tpc_patient_history_PatID" type="text/html"><?php echo $patient_history_view->PatID->caption() ?></script></span></td>
		<td data-name="PatID" <?php echo $patient_history_view->PatID->cellAttributes() ?>>
<script id="tpx_patient_history_PatID" type="text/html"><span id="el_patient_history_PatID">
<span<?php echo $patient_history_view->PatID->viewAttributes() ?>><?php echo $patient_history_view->PatID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_Reception"><script id="tpc_patient_history_Reception" type="text/html"><?php echo $patient_history_view->Reception->caption() ?></script></span></td>
		<td data-name="Reception" <?php echo $patient_history_view->Reception->cellAttributes() ?>>
<script id="tpx_patient_history_Reception" type="text/html"><span id="el_patient_history_Reception">
<span<?php echo $patient_history_view->Reception->viewAttributes() ?>><?php echo $patient_history_view->Reception->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_HospID"><script id="tpc_patient_history_HospID" type="text/html"><?php echo $patient_history_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $patient_history_view->HospID->cellAttributes() ?>>
<script id="tpx_patient_history_HospID" type="text/html"><span id="el_patient_history_HospID">
<span<?php echo $patient_history_view->HospID->viewAttributes() ?>><?php echo $patient_history_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_patient_historyview" class="ew-custom-template"></div>
<script id="tpm_patient_historyview" type="text/html">
<div id="ct_patient_history_view"><style>
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
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_history where id='".$vviid."'; ";
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
<p id="PPatientSearch" hidden>{{include tmpl="#tpc_patient_history_PatientSearch"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_PatientSearch")/}}</p>
</div>
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_history_profilePic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_profilePic")/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl=~getTemplate("#tpx_SurfaceArea")/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl=~getTemplate("#tpx_BodyMassIndex")/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_history_mrnno"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_mrnno")/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_history_Reception"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_Reception")/}}</p> 
  <p>{{include tmpl="#tpc_patient_history_PatientId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_PatientId")/}}</p> 
  <p>{{include tmpl="#tpc_patient_history_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_PatientName")/}}</p> 
  <p>{{include tmpl="#tpc_patient_history_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_Age")/}}</p> 
  <p>{{include tmpl="#tpc_patient_history_Gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_Gender")/}}</p>
  <p>{{include tmpl="#tpc_patient_history_PatID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_PatID")/}}</p>
  <p>{{include tmpl="#tpc_patient_history_MobileNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_MobileNumber")/}}</p> 
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
<div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_history_Complaints"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_Complaints")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_illness"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_illness")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_PastHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_PastHistory")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_SurgicalHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_SurgicalHistory")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_PersonalHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_PersonalHistory")/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td>{{include tmpl="#tpc_patient_history_MaritalHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_MaritalHistory")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_MenstrualHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_MenstrualHistory")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_ObstetricHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_ObstetricHistory")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_FamilyHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_FamilyHistory")/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_TreatmentHistory"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_history_TreatmentHistory")/}}</td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
</div>
</script>

</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient_history->Rows) ?> };
	ew.applyTemplate("tpd_patient_historyview", "tpm_patient_historyview", "patient_historyview", "<?php echo $patient_history->CustomExport ?>", ew.templateData.rows[0]);
	$("script.patient_historyview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_history_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_history_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$patient_history_view->terminate();
?>
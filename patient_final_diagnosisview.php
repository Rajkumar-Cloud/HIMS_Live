<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$patient_final_diagnosis_view = new patient_final_diagnosis_view();

// Run the page
$patient_final_diagnosis_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_final_diagnosis_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_final_diagnosis->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpatient_final_diagnosisview = currentForm = new ew.Form("fpatient_final_diagnosisview", "view");

// Form_CustomValidate event
fpatient_final_diagnosisview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_final_diagnosisview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_final_diagnosisview.lists["x_FinalDiagnosisTemplate"] = <?php echo $patient_final_diagnosis_view->FinalDiagnosisTemplate->Lookup->toClientList() ?>;
fpatient_final_diagnosisview.lists["x_FinalDiagnosisTemplate"].options = <?php echo JsonEncode($patient_final_diagnosis_view->FinalDiagnosisTemplate->lookupOptions()) ?>;
fpatient_final_diagnosisview.lists["x_TreatmentsTemplate"] = <?php echo $patient_final_diagnosis_view->TreatmentsTemplate->Lookup->toClientList() ?>;
fpatient_final_diagnosisview.lists["x_TreatmentsTemplate"].options = <?php echo JsonEncode($patient_final_diagnosis_view->TreatmentsTemplate->lookupOptions()) ?>;
fpatient_final_diagnosisview.lists["x_PatientSearch"] = <?php echo $patient_final_diagnosis_view->PatientSearch->Lookup->toClientList() ?>;
fpatient_final_diagnosisview.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_final_diagnosis_view->PatientSearch->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_final_diagnosis->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_final_diagnosis_view->ExportOptions->render("body") ?>
<?php $patient_final_diagnosis_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_final_diagnosis_view->showPageHeader(); ?>
<?php
$patient_final_diagnosis_view->showMessage();
?>
<form name="fpatient_final_diagnosisview" id="fpatient_final_diagnosisview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_final_diagnosis_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_final_diagnosis_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_final_diagnosis">
<input type="hidden" name="modal" value="<?php echo (int)$patient_final_diagnosis_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($patient_final_diagnosis->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_id"><script id="tpc_patient_final_diagnosis_id" class="patient_final_diagnosisview" type="text/html"><span><?php echo $patient_final_diagnosis->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $patient_final_diagnosis->id->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_id" class="patient_final_diagnosisview" type="text/html">
<span id="el_patient_final_diagnosis_id">
<span<?php echo $patient_final_diagnosis->id->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_PatID"><script id="tpc_patient_final_diagnosis_PatID" class="patient_final_diagnosisview" type="text/html"><span><?php echo $patient_final_diagnosis->PatID->caption() ?></span></script></span></td>
		<td data-name="PatID"<?php echo $patient_final_diagnosis->PatID->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_PatID" class="patient_final_diagnosisview" type="text/html">
<span id="el_patient_final_diagnosis_PatID">
<span<?php echo $patient_final_diagnosis->PatID->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->PatID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_PatientName"><script id="tpc_patient_final_diagnosis_PatientName" class="patient_final_diagnosisview" type="text/html"><span><?php echo $patient_final_diagnosis->PatientName->caption() ?></span></script></span></td>
		<td data-name="PatientName"<?php echo $patient_final_diagnosis->PatientName->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_PatientName" class="patient_final_diagnosisview" type="text/html">
<span id="el_patient_final_diagnosis_PatientName">
<span<?php echo $patient_final_diagnosis->PatientName->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_mrnno"><script id="tpc_patient_final_diagnosis_mrnno" class="patient_final_diagnosisview" type="text/html"><span><?php echo $patient_final_diagnosis->mrnno->caption() ?></span></script></span></td>
		<td data-name="mrnno"<?php echo $patient_final_diagnosis->mrnno->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_mrnno" class="patient_final_diagnosisview" type="text/html">
<span id="el_patient_final_diagnosis_mrnno">
<span<?php echo $patient_final_diagnosis->mrnno->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->mrnno->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_MobileNumber"><script id="tpc_patient_final_diagnosis_MobileNumber" class="patient_final_diagnosisview" type="text/html"><span><?php echo $patient_final_diagnosis->MobileNumber->caption() ?></span></script></span></td>
		<td data-name="MobileNumber"<?php echo $patient_final_diagnosis->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_MobileNumber" class="patient_final_diagnosisview" type="text/html">
<span id="el_patient_final_diagnosis_MobileNumber">
<span<?php echo $patient_final_diagnosis->MobileNumber->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->MobileNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis->FinalDiagnosis->Visible) { // FinalDiagnosis ?>
	<tr id="r_FinalDiagnosis">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_FinalDiagnosis"><script id="tpc_patient_final_diagnosis_FinalDiagnosis" class="patient_final_diagnosisview" type="text/html"><span><?php echo $patient_final_diagnosis->FinalDiagnosis->caption() ?></span></script></span></td>
		<td data-name="FinalDiagnosis"<?php echo $patient_final_diagnosis->FinalDiagnosis->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_FinalDiagnosis" class="patient_final_diagnosisview" type="text/html">
<span id="el_patient_final_diagnosis_FinalDiagnosis">
<span<?php echo $patient_final_diagnosis->FinalDiagnosis->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->FinalDiagnosis->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis->Treatments->Visible) { // Treatments ?>
	<tr id="r_Treatments">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_Treatments"><script id="tpc_patient_final_diagnosis_Treatments" class="patient_final_diagnosisview" type="text/html"><span><?php echo $patient_final_diagnosis->Treatments->caption() ?></span></script></span></td>
		<td data-name="Treatments"<?php echo $patient_final_diagnosis->Treatments->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_Treatments" class="patient_final_diagnosisview" type="text/html">
<span id="el_patient_final_diagnosis_Treatments">
<span<?php echo $patient_final_diagnosis->Treatments->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->Treatments->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_Age"><script id="tpc_patient_final_diagnosis_Age" class="patient_final_diagnosisview" type="text/html"><span><?php echo $patient_final_diagnosis->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $patient_final_diagnosis->Age->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_Age" class="patient_final_diagnosisview" type="text/html">
<span id="el_patient_final_diagnosis_Age">
<span<?php echo $patient_final_diagnosis->Age->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_Gender"><script id="tpc_patient_final_diagnosis_Gender" class="patient_final_diagnosisview" type="text/html"><span><?php echo $patient_final_diagnosis->Gender->caption() ?></span></script></span></td>
		<td data-name="Gender"<?php echo $patient_final_diagnosis->Gender->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_Gender" class="patient_final_diagnosisview" type="text/html">
<span id="el_patient_final_diagnosis_Gender">
<span<?php echo $patient_final_diagnosis->Gender->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->Gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_profilePic"><script id="tpc_patient_final_diagnosis_profilePic" class="patient_final_diagnosisview" type="text/html"><span><?php echo $patient_final_diagnosis->profilePic->caption() ?></span></script></span></td>
		<td data-name="profilePic"<?php echo $patient_final_diagnosis->profilePic->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_profilePic" class="patient_final_diagnosisview" type="text/html">
<span id="el_patient_final_diagnosis_profilePic">
<span<?php echo $patient_final_diagnosis->profilePic->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis->FinalDiagnosisTemplate->Visible) { // FinalDiagnosisTemplate ?>
	<tr id="r_FinalDiagnosisTemplate">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_FinalDiagnosisTemplate"><script id="tpc_patient_final_diagnosis_FinalDiagnosisTemplate" class="patient_final_diagnosisview" type="text/html"><span><?php echo $patient_final_diagnosis->FinalDiagnosisTemplate->caption() ?></span></script></span></td>
		<td data-name="FinalDiagnosisTemplate"<?php echo $patient_final_diagnosis->FinalDiagnosisTemplate->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_FinalDiagnosisTemplate" class="patient_final_diagnosisview" type="text/html">
<span id="el_patient_final_diagnosis_FinalDiagnosisTemplate">
<span<?php echo $patient_final_diagnosis->FinalDiagnosisTemplate->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->FinalDiagnosisTemplate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis->TreatmentsTemplate->Visible) { // TreatmentsTemplate ?>
	<tr id="r_TreatmentsTemplate">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_TreatmentsTemplate"><script id="tpc_patient_final_diagnosis_TreatmentsTemplate" class="patient_final_diagnosisview" type="text/html"><span><?php echo $patient_final_diagnosis->TreatmentsTemplate->caption() ?></span></script></span></td>
		<td data-name="TreatmentsTemplate"<?php echo $patient_final_diagnosis->TreatmentsTemplate->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_TreatmentsTemplate" class="patient_final_diagnosisview" type="text/html">
<span id="el_patient_final_diagnosis_TreatmentsTemplate">
<span<?php echo $patient_final_diagnosis->TreatmentsTemplate->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->TreatmentsTemplate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_PatientId"><script id="tpc_patient_final_diagnosis_PatientId" class="patient_final_diagnosisview" type="text/html"><span><?php echo $patient_final_diagnosis->PatientId->caption() ?></span></script></span></td>
		<td data-name="PatientId"<?php echo $patient_final_diagnosis->PatientId->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_PatientId" class="patient_final_diagnosisview" type="text/html">
<span id="el_patient_final_diagnosis_PatientId">
<span<?php echo $patient_final_diagnosis->PatientId->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->PatientId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_Reception"><script id="tpc_patient_final_diagnosis_Reception" class="patient_final_diagnosisview" type="text/html"><span><?php echo $patient_final_diagnosis->Reception->caption() ?></span></script></span></td>
		<td data-name="Reception"<?php echo $patient_final_diagnosis->Reception->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_Reception" class="patient_final_diagnosisview" type="text/html">
<span id="el_patient_final_diagnosis_Reception">
<span<?php echo $patient_final_diagnosis->Reception->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->Reception->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_HospID"><script id="tpc_patient_final_diagnosis_HospID" class="patient_final_diagnosisview" type="text/html"><span><?php echo $patient_final_diagnosis->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $patient_final_diagnosis->HospID->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_HospID" class="patient_final_diagnosisview" type="text/html">
<span id="el_patient_final_diagnosis_HospID">
<span<?php echo $patient_final_diagnosis->HospID->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis->PatientSearch->Visible) { // PatientSearch ?>
	<tr id="r_PatientSearch">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_PatientSearch"><script id="tpc_patient_final_diagnosis_PatientSearch" class="patient_final_diagnosisview" type="text/html"><span><?php echo $patient_final_diagnosis->PatientSearch->caption() ?></span></script></span></td>
		<td data-name="PatientSearch"<?php echo $patient_final_diagnosis->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_PatientSearch" class="patient_final_diagnosisview" type="text/html">
<span id="el_patient_final_diagnosis_PatientSearch">
<span<?php echo $patient_final_diagnosis->PatientSearch->viewAttributes() ?>>
<?php echo $patient_final_diagnosis->PatientSearch->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_patient_final_diagnosisview" class="ew-custom-template"></div>
<script id="tpm_patient_final_diagnosisview" type="text/html">
<div id="ct_patient_final_diagnosis_view"><style>
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
<p id="PPatientSearch" hidden>{{include tmpl="#tpc_patient_final_diagnosis_PatientSearch"/}}&nbsp;{{include tmpl="#tpx_patient_final_diagnosis_PatientSearch"/}}</p>
</div>
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_final_diagnosis_profilePic"/}}&nbsp;{{include tmpl="#tpx_patient_final_diagnosis_profilePic"/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl="#tpx_SurfaceArea"/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl="#tpx_BodyMassIndex"/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_final_diagnosis_mrnno"/}}&nbsp;{{include tmpl="#tpx_patient_final_diagnosis_mrnno"/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_final_diagnosis_Reception"/}}&nbsp;{{include tmpl="#tpx_patient_final_diagnosis_Reception"/}}</p> 
  <p>{{include tmpl="#tpc_patient_final_diagnosis_PatientId"/}}&nbsp;{{include tmpl="#tpx_patient_final_diagnosis_PatientId"/}}</p> 
  <p>{{include tmpl="#tpc_patient_final_diagnosis_PatientName"/}}&nbsp;{{include tmpl="#tpx_patient_final_diagnosis_PatientName"/}}</p> 
  <p>{{include tmpl="#tpc_patient_final_diagnosis_Age"/}}&nbsp;{{include tmpl="#tpx_patient_final_diagnosis_Age"/}}</p> 
  <p>{{include tmpl="#tpc_patient_final_diagnosis_Gender"/}}&nbsp;{{include tmpl="#tpx_patient_final_diagnosis_Gender"/}}</p>
  <p>{{include tmpl="#tpc_patient_final_diagnosis_PatID"/}}&nbsp;{{include tmpl="#tpx_patient_final_diagnosis_PatID"/}}</p>
  <p>{{include tmpl="#tpc_patient_final_diagnosis_MobileNumber"/}}&nbsp;{{include tmpl="#tpx_patient_final_diagnosis_MobileNumber"/}}</p> 
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
{{include tmpl="#tpc_patient_final_diagnosis_FinalDiagnosisTemplate"/}}&nbsp;{{include tmpl="#tpx_patient_final_diagnosis_FinalDiagnosisTemplate"/}}
<div class="row">
 		<div class="col-lg-12">
			<div class="card bg-info" style="color:#ac3973;">             
			  <div class="card-body">
			  {{include tmpl="#tpc_patient_final_diagnosis_FinalDiagnosis"/}}&nbsp;{{include tmpl="#tpx_patient_final_diagnosis_FinalDiagnosis"/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
{{include tmpl="#tpc_patient_final_diagnosis_TreatmentsTemplate"/}}&nbsp;{{include tmpl="#tpx_patient_final_diagnosis_TreatmentsTemplate"/}}
<div class="row">
 		<div class="col-lg-12">
			<div class="card bg-info" style="color:#8a8a5c;">             
			  <div class="card-body">
			  {{include tmpl="#tpc_patient_final_diagnosis_Treatments"/}}&nbsp;{{include tmpl="#tpx_patient_final_diagnosis_Treatments"/}}
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
</script>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_final_diagnosis->Rows) ?> };
ew.applyTemplate("tpd_patient_final_diagnosisview", "tpm_patient_final_diagnosisview", "patient_final_diagnosisview", "<?php echo $patient_final_diagnosis->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patient_final_diagnosisview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_final_diagnosis_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_final_diagnosis->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_final_diagnosis_view->terminate();
?>
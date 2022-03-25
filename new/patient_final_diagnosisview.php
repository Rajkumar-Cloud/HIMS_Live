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
<?php include_once "header.php"; ?>
<?php if (!$patient_final_diagnosis_view->isExport()) { ?>
<script>
var fpatient_final_diagnosisview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpatient_final_diagnosisview = currentForm = new ew.Form("fpatient_final_diagnosisview", "view");
	loadjs.done("fpatient_final_diagnosisview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$patient_final_diagnosis_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_final_diagnosis">
<input type="hidden" name="modal" value="<?php echo (int)$patient_final_diagnosis_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($patient_final_diagnosis_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_id"><script id="tpc_patient_final_diagnosis_id" type="text/html"><?php echo $patient_final_diagnosis_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $patient_final_diagnosis_view->id->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_id" type="text/html"><span id="el_patient_final_diagnosis_id">
<span<?php echo $patient_final_diagnosis_view->id->viewAttributes() ?>><?php echo $patient_final_diagnosis_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis_view->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_PatID"><script id="tpc_patient_final_diagnosis_PatID" type="text/html"><?php echo $patient_final_diagnosis_view->PatID->caption() ?></script></span></td>
		<td data-name="PatID" <?php echo $patient_final_diagnosis_view->PatID->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_PatID" type="text/html"><span id="el_patient_final_diagnosis_PatID">
<span<?php echo $patient_final_diagnosis_view->PatID->viewAttributes() ?>><?php echo $patient_final_diagnosis_view->PatID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_PatientName"><script id="tpc_patient_final_diagnosis_PatientName" type="text/html"><?php echo $patient_final_diagnosis_view->PatientName->caption() ?></script></span></td>
		<td data-name="PatientName" <?php echo $patient_final_diagnosis_view->PatientName->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_PatientName" type="text/html"><span id="el_patient_final_diagnosis_PatientName">
<span<?php echo $patient_final_diagnosis_view->PatientName->viewAttributes() ?>><?php echo $patient_final_diagnosis_view->PatientName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_mrnno"><script id="tpc_patient_final_diagnosis_mrnno" type="text/html"><?php echo $patient_final_diagnosis_view->mrnno->caption() ?></script></span></td>
		<td data-name="mrnno" <?php echo $patient_final_diagnosis_view->mrnno->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_mrnno" type="text/html"><span id="el_patient_final_diagnosis_mrnno">
<span<?php echo $patient_final_diagnosis_view->mrnno->viewAttributes() ?>><?php echo $patient_final_diagnosis_view->mrnno->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis_view->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_MobileNumber"><script id="tpc_patient_final_diagnosis_MobileNumber" type="text/html"><?php echo $patient_final_diagnosis_view->MobileNumber->caption() ?></script></span></td>
		<td data-name="MobileNumber" <?php echo $patient_final_diagnosis_view->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_MobileNumber" type="text/html"><span id="el_patient_final_diagnosis_MobileNumber">
<span<?php echo $patient_final_diagnosis_view->MobileNumber->viewAttributes() ?>><?php echo $patient_final_diagnosis_view->MobileNumber->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis_view->FinalDiagnosis->Visible) { // FinalDiagnosis ?>
	<tr id="r_FinalDiagnosis">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_FinalDiagnosis"><script id="tpc_patient_final_diagnosis_FinalDiagnosis" type="text/html"><?php echo $patient_final_diagnosis_view->FinalDiagnosis->caption() ?></script></span></td>
		<td data-name="FinalDiagnosis" <?php echo $patient_final_diagnosis_view->FinalDiagnosis->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_FinalDiagnosis" type="text/html"><span id="el_patient_final_diagnosis_FinalDiagnosis">
<span<?php echo $patient_final_diagnosis_view->FinalDiagnosis->viewAttributes() ?>><?php echo $patient_final_diagnosis_view->FinalDiagnosis->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis_view->Treatments->Visible) { // Treatments ?>
	<tr id="r_Treatments">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_Treatments"><script id="tpc_patient_final_diagnosis_Treatments" type="text/html"><?php echo $patient_final_diagnosis_view->Treatments->caption() ?></script></span></td>
		<td data-name="Treatments" <?php echo $patient_final_diagnosis_view->Treatments->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_Treatments" type="text/html"><span id="el_patient_final_diagnosis_Treatments">
<span<?php echo $patient_final_diagnosis_view->Treatments->viewAttributes() ?>><?php echo $patient_final_diagnosis_view->Treatments->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_Age"><script id="tpc_patient_final_diagnosis_Age" type="text/html"><?php echo $patient_final_diagnosis_view->Age->caption() ?></script></span></td>
		<td data-name="Age" <?php echo $patient_final_diagnosis_view->Age->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_Age" type="text/html"><span id="el_patient_final_diagnosis_Age">
<span<?php echo $patient_final_diagnosis_view->Age->viewAttributes() ?>><?php echo $patient_final_diagnosis_view->Age->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis_view->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_Gender"><script id="tpc_patient_final_diagnosis_Gender" type="text/html"><?php echo $patient_final_diagnosis_view->Gender->caption() ?></script></span></td>
		<td data-name="Gender" <?php echo $patient_final_diagnosis_view->Gender->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_Gender" type="text/html"><span id="el_patient_final_diagnosis_Gender">
<span<?php echo $patient_final_diagnosis_view->Gender->viewAttributes() ?>><?php echo $patient_final_diagnosis_view->Gender->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_profilePic"><script id="tpc_patient_final_diagnosis_profilePic" type="text/html"><?php echo $patient_final_diagnosis_view->profilePic->caption() ?></script></span></td>
		<td data-name="profilePic" <?php echo $patient_final_diagnosis_view->profilePic->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_profilePic" type="text/html"><span id="el_patient_final_diagnosis_profilePic">
<span<?php echo $patient_final_diagnosis_view->profilePic->viewAttributes() ?>><?php echo $patient_final_diagnosis_view->profilePic->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis_view->FinalDiagnosisTemplate->Visible) { // FinalDiagnosisTemplate ?>
	<tr id="r_FinalDiagnosisTemplate">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_FinalDiagnosisTemplate"><script id="tpc_patient_final_diagnosis_FinalDiagnosisTemplate" type="text/html"><?php echo $patient_final_diagnosis_view->FinalDiagnosisTemplate->caption() ?></script></span></td>
		<td data-name="FinalDiagnosisTemplate" <?php echo $patient_final_diagnosis_view->FinalDiagnosisTemplate->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_FinalDiagnosisTemplate" type="text/html"><span id="el_patient_final_diagnosis_FinalDiagnosisTemplate">
<span<?php echo $patient_final_diagnosis_view->FinalDiagnosisTemplate->viewAttributes() ?>><?php echo $patient_final_diagnosis_view->FinalDiagnosisTemplate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis_view->TreatmentsTemplate->Visible) { // TreatmentsTemplate ?>
	<tr id="r_TreatmentsTemplate">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_TreatmentsTemplate"><script id="tpc_patient_final_diagnosis_TreatmentsTemplate" type="text/html"><?php echo $patient_final_diagnosis_view->TreatmentsTemplate->caption() ?></script></span></td>
		<td data-name="TreatmentsTemplate" <?php echo $patient_final_diagnosis_view->TreatmentsTemplate->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_TreatmentsTemplate" type="text/html"><span id="el_patient_final_diagnosis_TreatmentsTemplate">
<span<?php echo $patient_final_diagnosis_view->TreatmentsTemplate->viewAttributes() ?>><?php echo $patient_final_diagnosis_view->TreatmentsTemplate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis_view->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_PatientId"><script id="tpc_patient_final_diagnosis_PatientId" type="text/html"><?php echo $patient_final_diagnosis_view->PatientId->caption() ?></script></span></td>
		<td data-name="PatientId" <?php echo $patient_final_diagnosis_view->PatientId->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_PatientId" type="text/html"><span id="el_patient_final_diagnosis_PatientId">
<span<?php echo $patient_final_diagnosis_view->PatientId->viewAttributes() ?>><?php echo $patient_final_diagnosis_view->PatientId->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_Reception"><script id="tpc_patient_final_diagnosis_Reception" type="text/html"><?php echo $patient_final_diagnosis_view->Reception->caption() ?></script></span></td>
		<td data-name="Reception" <?php echo $patient_final_diagnosis_view->Reception->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_Reception" type="text/html"><span id="el_patient_final_diagnosis_Reception">
<span<?php echo $patient_final_diagnosis_view->Reception->viewAttributes() ?>><?php echo $patient_final_diagnosis_view->Reception->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_HospID"><script id="tpc_patient_final_diagnosis_HospID" type="text/html"><?php echo $patient_final_diagnosis_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $patient_final_diagnosis_view->HospID->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_HospID" type="text/html"><span id="el_patient_final_diagnosis_HospID">
<span<?php echo $patient_final_diagnosis_view->HospID->viewAttributes() ?>><?php echo $patient_final_diagnosis_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_final_diagnosis_view->PatientSearch->Visible) { // PatientSearch ?>
	<tr id="r_PatientSearch">
		<td class="<?php echo $patient_final_diagnosis_view->TableLeftColumnClass ?>"><span id="elh_patient_final_diagnosis_PatientSearch"><script id="tpc_patient_final_diagnosis_PatientSearch" type="text/html"><?php echo $patient_final_diagnosis_view->PatientSearch->caption() ?></script></span></td>
		<td data-name="PatientSearch" <?php echo $patient_final_diagnosis_view->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_final_diagnosis_PatientSearch" type="text/html"><span id="el_patient_final_diagnosis_PatientSearch">
<span<?php echo $patient_final_diagnosis_view->PatientSearch->viewAttributes() ?>><?php echo $patient_final_diagnosis_view->PatientSearch->getViewValue() ?></span>
</span></script>
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
<p id="PPatientSearch" hidden>{{include tmpl="#tpc_patient_final_diagnosis_PatientSearch"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_PatientSearch")/}}</p>
</div>
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_final_diagnosis_profilePic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_profilePic")/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl=~getTemplate("#tpx_SurfaceArea")/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl=~getTemplate("#tpx_BodyMassIndex")/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_final_diagnosis_mrnno"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_mrnno")/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_final_diagnosis_Reception"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_Reception")/}}</p> 
  <p>{{include tmpl="#tpc_patient_final_diagnosis_PatientId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_PatientId")/}}</p> 
  <p>{{include tmpl="#tpc_patient_final_diagnosis_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_PatientName")/}}</p> 
  <p>{{include tmpl="#tpc_patient_final_diagnosis_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_Age")/}}</p> 
  <p>{{include tmpl="#tpc_patient_final_diagnosis_Gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_Gender")/}}</p>
  <p>{{include tmpl="#tpc_patient_final_diagnosis_PatID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_PatID")/}}</p>
  <p>{{include tmpl="#tpc_patient_final_diagnosis_MobileNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_MobileNumber")/}}</p> 
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
{{include tmpl="#tpc_patient_final_diagnosis_FinalDiagnosisTemplate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_FinalDiagnosisTemplate")/}}
<div class="row">
 		<div class="col-lg-12">
			<div class="card bg-info" style="color:#ac3973;">             
			  <div class="card-body">
			  {{include tmpl="#tpc_patient_final_diagnosis_FinalDiagnosis"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_FinalDiagnosis")/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
{{include tmpl="#tpc_patient_final_diagnosis_TreatmentsTemplate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_TreatmentsTemplate")/}}
<div class="row">
 		<div class="col-lg-12">
			<div class="card bg-info" style="color:#8a8a5c;">             
			  <div class="card-body">
			  {{include tmpl="#tpc_patient_final_diagnosis_Treatments"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_final_diagnosis_Treatments")/}}
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
	ew.templateData = { rows: <?php echo JsonEncode($patient_final_diagnosis->Rows) ?> };
	ew.applyTemplate("tpd_patient_final_diagnosisview", "tpm_patient_final_diagnosisview", "patient_final_diagnosisview", "<?php echo $patient_final_diagnosis->CustomExport ?>", ew.templateData.rows[0]);
	$("script.patient_final_diagnosisview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_final_diagnosis_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_final_diagnosis_view->isExport()) { ?>
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
$patient_final_diagnosis_view->terminate();
?>
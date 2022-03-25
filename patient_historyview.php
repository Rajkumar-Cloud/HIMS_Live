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
<?php include_once "header.php" ?>
<?php if (!$patient_history->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpatient_historyview = currentForm = new ew.Form("fpatient_historyview", "view");

// Form_CustomValidate event
fpatient_historyview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_historyview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_historyview.lists["x_PatientSearch"] = <?php echo $patient_history_view->PatientSearch->Lookup->toClientList() ?>;
fpatient_historyview.lists["x_PatientSearch"].options = <?php echo JsonEncode($patient_history_view->PatientSearch->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_history->isExport()) { ?>
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
<?php if ($patient_history_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_history_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_history">
<input type="hidden" name="modal" value="<?php echo (int)$patient_history_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($patient_history->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_id"><script id="tpc_patient_history_id" class="patient_historyview" type="text/html"><span><?php echo $patient_history->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $patient_history->id->cellAttributes() ?>>
<script id="tpx_patient_history_id" class="patient_historyview" type="text/html">
<span id="el_patient_history_id">
<span<?php echo $patient_history->id->viewAttributes() ?>>
<?php echo $patient_history->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_mrnno"><script id="tpc_patient_history_mrnno" class="patient_historyview" type="text/html"><span><?php echo $patient_history->mrnno->caption() ?></span></script></span></td>
		<td data-name="mrnno"<?php echo $patient_history->mrnno->cellAttributes() ?>>
<script id="tpx_patient_history_mrnno" class="patient_historyview" type="text/html">
<span id="el_patient_history_mrnno">
<span<?php echo $patient_history->mrnno->viewAttributes() ?>>
<?php echo $patient_history->mrnno->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_PatientName"><script id="tpc_patient_history_PatientName" class="patient_historyview" type="text/html"><span><?php echo $patient_history->PatientName->caption() ?></span></script></span></td>
		<td data-name="PatientName"<?php echo $patient_history->PatientName->cellAttributes() ?>>
<script id="tpx_patient_history_PatientName" class="patient_historyview" type="text/html">
<span id="el_patient_history_PatientName">
<span<?php echo $patient_history->PatientName->viewAttributes() ?>>
<?php echo $patient_history->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_PatientId"><script id="tpc_patient_history_PatientId" class="patient_historyview" type="text/html"><span><?php echo $patient_history->PatientId->caption() ?></span></script></span></td>
		<td data-name="PatientId"<?php echo $patient_history->PatientId->cellAttributes() ?>>
<script id="tpx_patient_history_PatientId" class="patient_historyview" type="text/html">
<span id="el_patient_history_PatientId">
<span<?php echo $patient_history->PatientId->viewAttributes() ?>>
<?php echo $patient_history->PatientId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_MobileNumber"><script id="tpc_patient_history_MobileNumber" class="patient_historyview" type="text/html"><span><?php echo $patient_history->MobileNumber->caption() ?></span></script></span></td>
		<td data-name="MobileNumber"<?php echo $patient_history->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_history_MobileNumber" class="patient_historyview" type="text/html">
<span id="el_patient_history_MobileNumber">
<span<?php echo $patient_history->MobileNumber->viewAttributes() ?>>
<?php echo $patient_history->MobileNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->MaritalHistory->Visible) { // MaritalHistory ?>
	<tr id="r_MaritalHistory">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_MaritalHistory"><script id="tpc_patient_history_MaritalHistory" class="patient_historyview" type="text/html"><span><?php echo $patient_history->MaritalHistory->caption() ?></span></script></span></td>
		<td data-name="MaritalHistory"<?php echo $patient_history->MaritalHistory->cellAttributes() ?>>
<script id="tpx_patient_history_MaritalHistory" class="patient_historyview" type="text/html">
<span id="el_patient_history_MaritalHistory">
<span<?php echo $patient_history->MaritalHistory->viewAttributes() ?>>
<?php echo $patient_history->MaritalHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<tr id="r_MenstrualHistory">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_MenstrualHistory"><script id="tpc_patient_history_MenstrualHistory" class="patient_historyview" type="text/html"><span><?php echo $patient_history->MenstrualHistory->caption() ?></span></script></span></td>
		<td data-name="MenstrualHistory"<?php echo $patient_history->MenstrualHistory->cellAttributes() ?>>
<script id="tpx_patient_history_MenstrualHistory" class="patient_historyview" type="text/html">
<span id="el_patient_history_MenstrualHistory">
<span<?php echo $patient_history->MenstrualHistory->viewAttributes() ?>>
<?php echo $patient_history->MenstrualHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->ObstetricHistory->Visible) { // ObstetricHistory ?>
	<tr id="r_ObstetricHistory">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_ObstetricHistory"><script id="tpc_patient_history_ObstetricHistory" class="patient_historyview" type="text/html"><span><?php echo $patient_history->ObstetricHistory->caption() ?></span></script></span></td>
		<td data-name="ObstetricHistory"<?php echo $patient_history->ObstetricHistory->cellAttributes() ?>>
<script id="tpx_patient_history_ObstetricHistory" class="patient_historyview" type="text/html">
<span id="el_patient_history_ObstetricHistory">
<span<?php echo $patient_history->ObstetricHistory->viewAttributes() ?>>
<?php echo $patient_history->ObstetricHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->MedicalHistory->Visible) { // MedicalHistory ?>
	<tr id="r_MedicalHistory">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_MedicalHistory"><script id="tpc_patient_history_MedicalHistory" class="patient_historyview" type="text/html"><span><?php echo $patient_history->MedicalHistory->caption() ?></span></script></span></td>
		<td data-name="MedicalHistory"<?php echo $patient_history->MedicalHistory->cellAttributes() ?>>
<script id="tpx_patient_history_MedicalHistory" class="patient_historyview" type="text/html">
<span id="el_patient_history_MedicalHistory">
<span<?php echo $patient_history->MedicalHistory->viewAttributes() ?>>
<?php echo $patient_history->MedicalHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<tr id="r_SurgicalHistory">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_SurgicalHistory"><script id="tpc_patient_history_SurgicalHistory" class="patient_historyview" type="text/html"><span><?php echo $patient_history->SurgicalHistory->caption() ?></span></script></span></td>
		<td data-name="SurgicalHistory"<?php echo $patient_history->SurgicalHistory->cellAttributes() ?>>
<script id="tpx_patient_history_SurgicalHistory" class="patient_historyview" type="text/html">
<span id="el_patient_history_SurgicalHistory">
<span<?php echo $patient_history->SurgicalHistory->viewAttributes() ?>>
<?php echo $patient_history->SurgicalHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->PastHistory->Visible) { // PastHistory ?>
	<tr id="r_PastHistory">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_PastHistory"><script id="tpc_patient_history_PastHistory" class="patient_historyview" type="text/html"><span><?php echo $patient_history->PastHistory->caption() ?></span></script></span></td>
		<td data-name="PastHistory"<?php echo $patient_history->PastHistory->cellAttributes() ?>>
<script id="tpx_patient_history_PastHistory" class="patient_historyview" type="text/html">
<span id="el_patient_history_PastHistory">
<span<?php echo $patient_history->PastHistory->viewAttributes() ?>>
<?php echo $patient_history->PastHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->TreatmentHistory->Visible) { // TreatmentHistory ?>
	<tr id="r_TreatmentHistory">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_TreatmentHistory"><script id="tpc_patient_history_TreatmentHistory" class="patient_historyview" type="text/html"><span><?php echo $patient_history->TreatmentHistory->caption() ?></span></script></span></td>
		<td data-name="TreatmentHistory"<?php echo $patient_history->TreatmentHistory->cellAttributes() ?>>
<script id="tpx_patient_history_TreatmentHistory" class="patient_historyview" type="text/html">
<span id="el_patient_history_TreatmentHistory">
<span<?php echo $patient_history->TreatmentHistory->viewAttributes() ?>>
<?php echo $patient_history->TreatmentHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->FamilyHistory->Visible) { // FamilyHistory ?>
	<tr id="r_FamilyHistory">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_FamilyHistory"><script id="tpc_patient_history_FamilyHistory" class="patient_historyview" type="text/html"><span><?php echo $patient_history->FamilyHistory->caption() ?></span></script></span></td>
		<td data-name="FamilyHistory"<?php echo $patient_history->FamilyHistory->cellAttributes() ?>>
<script id="tpx_patient_history_FamilyHistory" class="patient_historyview" type="text/html">
<span id="el_patient_history_FamilyHistory">
<span<?php echo $patient_history->FamilyHistory->viewAttributes() ?>>
<?php echo $patient_history->FamilyHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_Age"><script id="tpc_patient_history_Age" class="patient_historyview" type="text/html"><span><?php echo $patient_history->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $patient_history->Age->cellAttributes() ?>>
<script id="tpx_patient_history_Age" class="patient_historyview" type="text/html">
<span id="el_patient_history_Age">
<span<?php echo $patient_history->Age->viewAttributes() ?>>
<?php echo $patient_history->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_Gender"><script id="tpc_patient_history_Gender" class="patient_historyview" type="text/html"><span><?php echo $patient_history->Gender->caption() ?></span></script></span></td>
		<td data-name="Gender"<?php echo $patient_history->Gender->cellAttributes() ?>>
<script id="tpx_patient_history_Gender" class="patient_historyview" type="text/html">
<span id="el_patient_history_Gender">
<span<?php echo $patient_history->Gender->viewAttributes() ?>>
<?php echo $patient_history->Gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_profilePic"><script id="tpc_patient_history_profilePic" class="patient_historyview" type="text/html"><span><?php echo $patient_history->profilePic->caption() ?></span></script></span></td>
		<td data-name="profilePic"<?php echo $patient_history->profilePic->cellAttributes() ?>>
<script id="tpx_patient_history_profilePic" class="patient_historyview" type="text/html">
<span id="el_patient_history_profilePic">
<span<?php echo $patient_history->profilePic->viewAttributes() ?>>
<?php echo $patient_history->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->Complaints->Visible) { // Complaints ?>
	<tr id="r_Complaints">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_Complaints"><script id="tpc_patient_history_Complaints" class="patient_historyview" type="text/html"><span><?php echo $patient_history->Complaints->caption() ?></span></script></span></td>
		<td data-name="Complaints"<?php echo $patient_history->Complaints->cellAttributes() ?>>
<script id="tpx_patient_history_Complaints" class="patient_historyview" type="text/html">
<span id="el_patient_history_Complaints">
<span<?php echo $patient_history->Complaints->viewAttributes() ?>>
<?php echo $patient_history->Complaints->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->illness->Visible) { // illness ?>
	<tr id="r_illness">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_illness"><script id="tpc_patient_history_illness" class="patient_historyview" type="text/html"><span><?php echo $patient_history->illness->caption() ?></span></script></span></td>
		<td data-name="illness"<?php echo $patient_history->illness->cellAttributes() ?>>
<script id="tpx_patient_history_illness" class="patient_historyview" type="text/html">
<span id="el_patient_history_illness">
<span<?php echo $patient_history->illness->viewAttributes() ?>>
<?php echo $patient_history->illness->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->PersonalHistory->Visible) { // PersonalHistory ?>
	<tr id="r_PersonalHistory">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_PersonalHistory"><script id="tpc_patient_history_PersonalHistory" class="patient_historyview" type="text/html"><span><?php echo $patient_history->PersonalHistory->caption() ?></span></script></span></td>
		<td data-name="PersonalHistory"<?php echo $patient_history->PersonalHistory->cellAttributes() ?>>
<script id="tpx_patient_history_PersonalHistory" class="patient_historyview" type="text/html">
<span id="el_patient_history_PersonalHistory">
<span<?php echo $patient_history->PersonalHistory->viewAttributes() ?>>
<?php echo $patient_history->PersonalHistory->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->PatientSearch->Visible) { // PatientSearch ?>
	<tr id="r_PatientSearch">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_PatientSearch"><script id="tpc_patient_history_PatientSearch" class="patient_historyview" type="text/html"><span><?php echo $patient_history->PatientSearch->caption() ?></span></script></span></td>
		<td data-name="PatientSearch"<?php echo $patient_history->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_history_PatientSearch" class="patient_historyview" type="text/html">
<span id="el_patient_history_PatientSearch">
<span<?php echo $patient_history->PatientSearch->viewAttributes() ?>>
<?php echo $patient_history->PatientSearch->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_PatID"><script id="tpc_patient_history_PatID" class="patient_historyview" type="text/html"><span><?php echo $patient_history->PatID->caption() ?></span></script></span></td>
		<td data-name="PatID"<?php echo $patient_history->PatID->cellAttributes() ?>>
<script id="tpx_patient_history_PatID" class="patient_historyview" type="text/html">
<span id="el_patient_history_PatID">
<span<?php echo $patient_history->PatID->viewAttributes() ?>>
<?php echo $patient_history->PatID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_Reception"><script id="tpc_patient_history_Reception" class="patient_historyview" type="text/html"><span><?php echo $patient_history->Reception->caption() ?></span></script></span></td>
		<td data-name="Reception"<?php echo $patient_history->Reception->cellAttributes() ?>>
<script id="tpx_patient_history_Reception" class="patient_historyview" type="text/html">
<span id="el_patient_history_Reception">
<span<?php echo $patient_history->Reception->viewAttributes() ?>>
<?php echo $patient_history->Reception->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_history->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $patient_history_view->TableLeftColumnClass ?>"><span id="elh_patient_history_HospID"><script id="tpc_patient_history_HospID" class="patient_historyview" type="text/html"><span><?php echo $patient_history->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $patient_history->HospID->cellAttributes() ?>>
<script id="tpx_patient_history_HospID" class="patient_historyview" type="text/html">
<span id="el_patient_history_HospID">
<span<?php echo $patient_history->HospID->viewAttributes() ?>>
<?php echo $patient_history->HospID->getViewValue() ?></span>
</span>
</script>
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
<p id="PPatientSearch" hidden>{{include tmpl="#tpc_patient_history_PatientSearch"/}}&nbsp;{{include tmpl="#tpx_patient_history_PatientSearch"/}}</p>
</div>
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_history_profilePic"/}}&nbsp;{{include tmpl="#tpx_patient_history_profilePic"/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl="#tpx_SurfaceArea"/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl="#tpx_BodyMassIndex"/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_history_mrnno"/}}&nbsp;{{include tmpl="#tpx_patient_history_mrnno"/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_history_Reception"/}}&nbsp;{{include tmpl="#tpx_patient_history_Reception"/}}</p> 
  <p>{{include tmpl="#tpc_patient_history_PatientId"/}}&nbsp;{{include tmpl="#tpx_patient_history_PatientId"/}}</p> 
  <p>{{include tmpl="#tpc_patient_history_PatientName"/}}&nbsp;{{include tmpl="#tpx_patient_history_PatientName"/}}</p> 
  <p>{{include tmpl="#tpc_patient_history_Age"/}}&nbsp;{{include tmpl="#tpx_patient_history_Age"/}}</p> 
  <p>{{include tmpl="#tpc_patient_history_Gender"/}}&nbsp;{{include tmpl="#tpx_patient_history_Gender"/}}</p>
  <p>{{include tmpl="#tpc_patient_history_PatID"/}}&nbsp;{{include tmpl="#tpx_patient_history_PatID"/}}</p>
  <p>{{include tmpl="#tpc_patient_history_MobileNumber"/}}&nbsp;{{include tmpl="#tpx_patient_history_MobileNumber"/}}</p> 
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
						<tr><td>{{include tmpl="#tpc_patient_history_Complaints"/}}&nbsp;{{include tmpl="#tpx_patient_history_Complaints"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_illness"/}}&nbsp;{{include tmpl="#tpx_patient_history_illness"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_PastHistory"/}}&nbsp;{{include tmpl="#tpx_patient_history_PastHistory"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_SurgicalHistory"/}}&nbsp;{{include tmpl="#tpx_patient_history_SurgicalHistory"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_PersonalHistory"/}}&nbsp;{{include tmpl="#tpx_patient_history_PersonalHistory"/}}</td></tr>
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
						<tr><td>{{include tmpl="#tpc_patient_history_MaritalHistory"/}}&nbsp;{{include tmpl="#tpx_patient_history_MaritalHistory"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_MenstrualHistory"/}}&nbsp;{{include tmpl="#tpx_patient_history_MenstrualHistory"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_ObstetricHistory"/}}&nbsp;{{include tmpl="#tpx_patient_history_ObstetricHistory"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_FamilyHistory"/}}&nbsp;{{include tmpl="#tpx_patient_history_FamilyHistory"/}}</td></tr>
						<tr><td>{{include tmpl="#tpc_patient_history_TreatmentHistory"/}}&nbsp;{{include tmpl="#tpx_patient_history_TreatmentHistory"/}}</td></tr>
					</tbody>
				</table>
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
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_history->Rows) ?> };
ew.applyTemplate("tpd_patient_historyview", "tpm_patient_historyview", "patient_historyview", "<?php echo $patient_history->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patient_historyview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_history_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_history->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_history_view->terminate();
?>
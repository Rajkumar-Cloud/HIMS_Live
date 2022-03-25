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
$patient_follow_up_view = new patient_follow_up_view();

// Run the page
$patient_follow_up_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_follow_up_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_follow_up_view->isExport()) { ?>
<script>
var fpatient_follow_upview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpatient_follow_upview = currentForm = new ew.Form("fpatient_follow_upview", "view");
	loadjs.done("fpatient_follow_upview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$patient_follow_up_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_follow_up_view->ExportOptions->render("body") ?>
<?php $patient_follow_up_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_follow_up_view->showPageHeader(); ?>
<?php
$patient_follow_up_view->showMessage();
?>
<form name="fpatient_follow_upview" id="fpatient_follow_upview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_follow_up">
<input type="hidden" name="modal" value="<?php echo (int)$patient_follow_up_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($patient_follow_up_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_id"><script id="tpc_patient_follow_up_id" type="text/html"><?php echo $patient_follow_up_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $patient_follow_up_view->id->cellAttributes() ?>>
<script id="tpx_patient_follow_up_id" type="text/html"><span id="el_patient_follow_up_id">
<span<?php echo $patient_follow_up_view->id->viewAttributes() ?>><?php echo $patient_follow_up_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_PatID"><script id="tpc_patient_follow_up_PatID" type="text/html"><?php echo $patient_follow_up_view->PatID->caption() ?></script></span></td>
		<td data-name="PatID" <?php echo $patient_follow_up_view->PatID->cellAttributes() ?>>
<script id="tpx_patient_follow_up_PatID" type="text/html"><span id="el_patient_follow_up_PatID">
<span<?php echo $patient_follow_up_view->PatID->viewAttributes() ?>><?php echo $patient_follow_up_view->PatID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_PatientName"><script id="tpc_patient_follow_up_PatientName" type="text/html"><?php echo $patient_follow_up_view->PatientName->caption() ?></script></span></td>
		<td data-name="PatientName" <?php echo $patient_follow_up_view->PatientName->cellAttributes() ?>>
<script id="tpx_patient_follow_up_PatientName" type="text/html"><span id="el_patient_follow_up_PatientName">
<span<?php echo $patient_follow_up_view->PatientName->viewAttributes() ?>><?php echo $patient_follow_up_view->PatientName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_MobileNumber"><script id="tpc_patient_follow_up_MobileNumber" type="text/html"><?php echo $patient_follow_up_view->MobileNumber->caption() ?></script></span></td>
		<td data-name="MobileNumber" <?php echo $patient_follow_up_view->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_follow_up_MobileNumber" type="text/html"><span id="el_patient_follow_up_MobileNumber">
<span<?php echo $patient_follow_up_view->MobileNumber->viewAttributes() ?>><?php echo $patient_follow_up_view->MobileNumber->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_mrnno"><script id="tpc_patient_follow_up_mrnno" type="text/html"><?php echo $patient_follow_up_view->mrnno->caption() ?></script></span></td>
		<td data-name="mrnno" <?php echo $patient_follow_up_view->mrnno->cellAttributes() ?>>
<script id="tpx_patient_follow_up_mrnno" type="text/html"><span id="el_patient_follow_up_mrnno">
<span<?php echo $patient_follow_up_view->mrnno->viewAttributes() ?>><?php echo $patient_follow_up_view->mrnno->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->BP->Visible) { // BP ?>
	<tr id="r_BP">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_BP"><script id="tpc_patient_follow_up_BP" type="text/html"><?php echo $patient_follow_up_view->BP->caption() ?></script></span></td>
		<td data-name="BP" <?php echo $patient_follow_up_view->BP->cellAttributes() ?>>
<script id="tpx_patient_follow_up_BP" type="text/html"><span id="el_patient_follow_up_BP">
<span<?php echo $patient_follow_up_view->BP->viewAttributes() ?>><?php echo $patient_follow_up_view->BP->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->Pulse->Visible) { // Pulse ?>
	<tr id="r_Pulse">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Pulse"><script id="tpc_patient_follow_up_Pulse" type="text/html"><?php echo $patient_follow_up_view->Pulse->caption() ?></script></span></td>
		<td data-name="Pulse" <?php echo $patient_follow_up_view->Pulse->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Pulse" type="text/html"><span id="el_patient_follow_up_Pulse">
<span<?php echo $patient_follow_up_view->Pulse->viewAttributes() ?>><?php echo $patient_follow_up_view->Pulse->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->Resp->Visible) { // Resp ?>
	<tr id="r_Resp">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Resp"><script id="tpc_patient_follow_up_Resp" type="text/html"><?php echo $patient_follow_up_view->Resp->caption() ?></script></span></td>
		<td data-name="Resp" <?php echo $patient_follow_up_view->Resp->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Resp" type="text/html"><span id="el_patient_follow_up_Resp">
<span<?php echo $patient_follow_up_view->Resp->viewAttributes() ?>><?php echo $patient_follow_up_view->Resp->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->SPO2->Visible) { // SPO2 ?>
	<tr id="r_SPO2">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_SPO2"><script id="tpc_patient_follow_up_SPO2" type="text/html"><?php echo $patient_follow_up_view->SPO2->caption() ?></script></span></td>
		<td data-name="SPO2" <?php echo $patient_follow_up_view->SPO2->cellAttributes() ?>>
<script id="tpx_patient_follow_up_SPO2" type="text/html"><span id="el_patient_follow_up_SPO2">
<span<?php echo $patient_follow_up_view->SPO2->viewAttributes() ?>><?php echo $patient_follow_up_view->SPO2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->FollowupAdvice->Visible) { // FollowupAdvice ?>
	<tr id="r_FollowupAdvice">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_FollowupAdvice"><script id="tpc_patient_follow_up_FollowupAdvice" type="text/html"><?php echo $patient_follow_up_view->FollowupAdvice->caption() ?></script></span></td>
		<td data-name="FollowupAdvice" <?php echo $patient_follow_up_view->FollowupAdvice->cellAttributes() ?>>
<script id="tpx_patient_follow_up_FollowupAdvice" type="text/html"><span id="el_patient_follow_up_FollowupAdvice">
<span<?php echo $patient_follow_up_view->FollowupAdvice->viewAttributes() ?>><?php echo $patient_follow_up_view->FollowupAdvice->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->NextReviewDate->Visible) { // NextReviewDate ?>
	<tr id="r_NextReviewDate">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_NextReviewDate"><script id="tpc_patient_follow_up_NextReviewDate" type="text/html"><?php echo $patient_follow_up_view->NextReviewDate->caption() ?></script></span></td>
		<td data-name="NextReviewDate" <?php echo $patient_follow_up_view->NextReviewDate->cellAttributes() ?>>
<script id="tpx_patient_follow_up_NextReviewDate" type="text/html"><span id="el_patient_follow_up_NextReviewDate">
<span<?php echo $patient_follow_up_view->NextReviewDate->viewAttributes() ?>><?php echo $patient_follow_up_view->NextReviewDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Age"><script id="tpc_patient_follow_up_Age" type="text/html"><?php echo $patient_follow_up_view->Age->caption() ?></script></span></td>
		<td data-name="Age" <?php echo $patient_follow_up_view->Age->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Age" type="text/html"><span id="el_patient_follow_up_Age">
<span<?php echo $patient_follow_up_view->Age->viewAttributes() ?>><?php echo $patient_follow_up_view->Age->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Gender"><script id="tpc_patient_follow_up_Gender" type="text/html"><?php echo $patient_follow_up_view->Gender->caption() ?></script></span></td>
		<td data-name="Gender" <?php echo $patient_follow_up_view->Gender->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Gender" type="text/html"><span id="el_patient_follow_up_Gender">
<span<?php echo $patient_follow_up_view->Gender->viewAttributes() ?>><?php echo $patient_follow_up_view->Gender->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_profilePic"><script id="tpc_patient_follow_up_profilePic" type="text/html"><?php echo $patient_follow_up_view->profilePic->caption() ?></script></span></td>
		<td data-name="profilePic" <?php echo $patient_follow_up_view->profilePic->cellAttributes() ?>>
<script id="tpx_patient_follow_up_profilePic" type="text/html"><span id="el_patient_follow_up_profilePic">
<span<?php echo $patient_follow_up_view->profilePic->viewAttributes() ?>><?php echo $patient_follow_up_view->profilePic->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->Template->Visible) { // Template ?>
	<tr id="r_Template">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Template"><script id="tpc_patient_follow_up_Template" type="text/html"><?php echo $patient_follow_up_view->Template->caption() ?></script></span></td>
		<td data-name="Template" <?php echo $patient_follow_up_view->Template->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Template" type="text/html"><span id="el_patient_follow_up_Template">
<span<?php echo $patient_follow_up_view->Template->viewAttributes() ?>><?php echo $patient_follow_up_view->Template->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->courseinhospital->Visible) { // courseinhospital ?>
	<tr id="r_courseinhospital">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_courseinhospital"><script id="tpc_patient_follow_up_courseinhospital" type="text/html"><?php echo $patient_follow_up_view->courseinhospital->caption() ?></script></span></td>
		<td data-name="courseinhospital" <?php echo $patient_follow_up_view->courseinhospital->cellAttributes() ?>>
<script id="tpx_patient_follow_up_courseinhospital" type="text/html"><span id="el_patient_follow_up_courseinhospital">
<span<?php echo $patient_follow_up_view->courseinhospital->viewAttributes() ?>><?php echo $patient_follow_up_view->courseinhospital->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->procedurenotes->Visible) { // procedurenotes ?>
	<tr id="r_procedurenotes">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_procedurenotes"><script id="tpc_patient_follow_up_procedurenotes" type="text/html"><?php echo $patient_follow_up_view->procedurenotes->caption() ?></script></span></td>
		<td data-name="procedurenotes" <?php echo $patient_follow_up_view->procedurenotes->cellAttributes() ?>>
<script id="tpx_patient_follow_up_procedurenotes" type="text/html"><span id="el_patient_follow_up_procedurenotes">
<span<?php echo $patient_follow_up_view->procedurenotes->viewAttributes() ?>><?php echo $patient_follow_up_view->procedurenotes->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->conditionatdischarge->Visible) { // conditionatdischarge ?>
	<tr id="r_conditionatdischarge">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_conditionatdischarge"><script id="tpc_patient_follow_up_conditionatdischarge" type="text/html"><?php echo $patient_follow_up_view->conditionatdischarge->caption() ?></script></span></td>
		<td data-name="conditionatdischarge" <?php echo $patient_follow_up_view->conditionatdischarge->cellAttributes() ?>>
<script id="tpx_patient_follow_up_conditionatdischarge" type="text/html"><span id="el_patient_follow_up_conditionatdischarge">
<span<?php echo $patient_follow_up_view->conditionatdischarge->viewAttributes() ?>><?php echo $patient_follow_up_view->conditionatdischarge->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->Template1->Visible) { // Template1 ?>
	<tr id="r_Template1">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Template1"><script id="tpc_patient_follow_up_Template1" type="text/html"><?php echo $patient_follow_up_view->Template1->caption() ?></script></span></td>
		<td data-name="Template1" <?php echo $patient_follow_up_view->Template1->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Template1" type="text/html"><span id="el_patient_follow_up_Template1">
<span<?php echo $patient_follow_up_view->Template1->viewAttributes() ?>><?php echo $patient_follow_up_view->Template1->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->Template2->Visible) { // Template2 ?>
	<tr id="r_Template2">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Template2"><script id="tpc_patient_follow_up_Template2" type="text/html"><?php echo $patient_follow_up_view->Template2->caption() ?></script></span></td>
		<td data-name="Template2" <?php echo $patient_follow_up_view->Template2->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Template2" type="text/html"><span id="el_patient_follow_up_Template2">
<span<?php echo $patient_follow_up_view->Template2->viewAttributes() ?>><?php echo $patient_follow_up_view->Template2->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->Template3->Visible) { // Template3 ?>
	<tr id="r_Template3">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Template3"><script id="tpc_patient_follow_up_Template3" type="text/html"><?php echo $patient_follow_up_view->Template3->caption() ?></script></span></td>
		<td data-name="Template3" <?php echo $patient_follow_up_view->Template3->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Template3" type="text/html"><span id="el_patient_follow_up_Template3">
<span<?php echo $patient_follow_up_view->Template3->viewAttributes() ?>><?php echo $patient_follow_up_view->Template3->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_HospID"><script id="tpc_patient_follow_up_HospID" type="text/html"><?php echo $patient_follow_up_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $patient_follow_up_view->HospID->cellAttributes() ?>>
<script id="tpx_patient_follow_up_HospID" type="text/html"><span id="el_patient_follow_up_HospID">
<span<?php echo $patient_follow_up_view->HospID->viewAttributes() ?>><?php echo $patient_follow_up_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_Reception"><script id="tpc_patient_follow_up_Reception" type="text/html"><?php echo $patient_follow_up_view->Reception->caption() ?></script></span></td>
		<td data-name="Reception" <?php echo $patient_follow_up_view->Reception->cellAttributes() ?>>
<script id="tpx_patient_follow_up_Reception" type="text/html"><span id="el_patient_follow_up_Reception">
<span<?php echo $patient_follow_up_view->Reception->viewAttributes() ?>><?php echo $patient_follow_up_view->Reception->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_PatientId"><script id="tpc_patient_follow_up_PatientId" type="text/html"><?php echo $patient_follow_up_view->PatientId->caption() ?></script></span></td>
		<td data-name="PatientId" <?php echo $patient_follow_up_view->PatientId->cellAttributes() ?>>
<script id="tpx_patient_follow_up_PatientId" type="text/html"><span id="el_patient_follow_up_PatientId">
<span<?php echo $patient_follow_up_view->PatientId->viewAttributes() ?>><?php echo $patient_follow_up_view->PatientId->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_follow_up_view->PatientSearch->Visible) { // PatientSearch ?>
	<tr id="r_PatientSearch">
		<td class="<?php echo $patient_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_follow_up_PatientSearch"><script id="tpc_patient_follow_up_PatientSearch" type="text/html"><?php echo $patient_follow_up_view->PatientSearch->caption() ?></script></span></td>
		<td data-name="PatientSearch" <?php echo $patient_follow_up_view->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_follow_up_PatientSearch" type="text/html"><span id="el_patient_follow_up_PatientSearch">
<span<?php echo $patient_follow_up_view->PatientSearch->viewAttributes() ?>><?php echo $patient_follow_up_view->PatientSearch->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_patient_follow_upview" class="ew-custom-template"></div>
<script id="tpm_patient_follow_upview" type="text/html">
<div id="ct_patient_follow_up_view"><style>
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
<p id="PPatientSearch" hidden>{{include tmpl="#tpc_patient_follow_up_PatientSearch"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_PatientSearch")/}}</p>
</div>
<p id="profilePic" hidden>{{include tmpl="#tpc_patient_follow_up_profilePic"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_profilePic")/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl=~getTemplate("#tpx_SurfaceArea")/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl=~getTemplate("#tpx_BodyMassIndex")/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_follow_up_mrnno"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_mrnno")/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_follow_up_Reception"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_Reception")/}}</p> 
  <p>{{include tmpl="#tpc_patient_follow_up_PatientId"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_PatientId")/}}</p> 
  <p>{{include tmpl="#tpc_patient_follow_up_PatientName"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_PatientName")/}}</p> 
  <p>{{include tmpl="#tpc_patient_follow_up_Age"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_Age")/}}</p> 
  <p>{{include tmpl="#tpc_patient_follow_up_Gender"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_Gender")/}}</p>
  <p>{{include tmpl="#tpc_patient_follow_up_PatID"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_PatID")/}}</p>
  <p>{{include tmpl="#tpc_patient_follow_up_MobileNumber"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_MobileNumber")/}}</p> 
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
{{include tmpl="#tpc_patient_follow_up_Template"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_Template")/}}
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
{{include tmpl="#tpc_patient_follow_up_courseinhospital"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_courseinhospital")/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
{{include tmpl="#tpc_patient_follow_up_Template"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_Template")/}}
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
{{include tmpl="#tpc_patient_follow_up_procedurenotes"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_procedurenotes")/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
{{include tmpl="#tpc_patient_follow_up_Template"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_Template")/}}
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
{{include tmpl="#tpc_patient_follow_up_conditionatdischarge"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_conditionatdischarge")/}}
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
						<tr><td>{{include tmpl="#tpc_patient_follow_up_BP"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_BP")/}}  mm of Hg </td></tr>
						<tr><td>{{include tmpl="#tpc_patient_follow_up_Pulse"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_Pulse")/}}  mints</td></tr>						
						<tr><td>{{include tmpl="#tpc_patient_follow_up_Resp"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_Resp")/}}</td></tr>
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
			  				<tr><td>{{include tmpl="#tpc_patient_follow_up_SPO2"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_SPO2")/}} F</td></tr>
			  				<tr><td>{{include tmpl="#tpc_patient_follow_up_NextReviewDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_NextReviewDate")/}} </td></tr>
			  			</tbody>
			  		</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
{{include tmpl="#tpc_patient_follow_up_Template"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_Template")/}}
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
{{include tmpl="#tpc_patient_follow_up_FollowupAdvice"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_follow_up_FollowupAdvice")/}}
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
	ew.templateData = { rows: <?php echo JsonEncode($patient_follow_up->Rows) ?> };
	ew.applyTemplate("tpd_patient_follow_upview", "tpm_patient_follow_upview", "patient_follow_upview", "<?php echo $patient_follow_up->CustomExport ?>", ew.templateData.rows[0]);
	$("script.patient_follow_upview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_follow_up_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_follow_up_view->isExport()) { ?>
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
$patient_follow_up_view->terminate();
?>
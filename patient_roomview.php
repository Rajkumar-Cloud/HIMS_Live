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
$patient_room_view = new patient_room_view();

// Run the page
$patient_room_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_room_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$patient_room->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpatient_roomview = currentForm = new ew.Form("fpatient_roomview", "view");

// Form_CustomValidate event
fpatient_roomview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_roomview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_roomview.lists["x_Reception"] = <?php echo $patient_room_view->Reception->Lookup->toClientList() ?>;
fpatient_roomview.lists["x_Reception"].options = <?php echo JsonEncode($patient_room_view->Reception->lookupOptions()) ?>;
fpatient_roomview.lists["x_RoomID"] = <?php echo $patient_room_view->RoomID->Lookup->toClientList() ?>;
fpatient_roomview.lists["x_RoomID"].options = <?php echo JsonEncode($patient_room_view->RoomID->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$patient_room->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_room_view->ExportOptions->render("body") ?>
<?php $patient_room_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_room_view->showPageHeader(); ?>
<?php
$patient_room_view->showMessage();
?>
<form name="fpatient_roomview" id="fpatient_roomview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($patient_room_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $patient_room_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_room">
<input type="hidden" name="modal" value="<?php echo (int)$patient_room_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($patient_room->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_id"><script id="tpc_patient_room_id" class="patient_roomview" type="text/html"><span><?php echo $patient_room->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $patient_room->id->cellAttributes() ?>>
<script id="tpx_patient_room_id" class="patient_roomview" type="text/html">
<span id="el_patient_room_id">
<span<?php echo $patient_room->id->viewAttributes() ?>>
<?php echo $patient_room->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_Reception"><script id="tpc_patient_room_Reception" class="patient_roomview" type="text/html"><span><?php echo $patient_room->Reception->caption() ?></span></script></span></td>
		<td data-name="Reception"<?php echo $patient_room->Reception->cellAttributes() ?>>
<script id="tpx_patient_room_Reception" class="patient_roomview" type="text/html">
<span id="el_patient_room_Reception">
<span<?php echo $patient_room->Reception->viewAttributes() ?>>
<?php echo $patient_room->Reception->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_PatientId"><script id="tpc_patient_room_PatientId" class="patient_roomview" type="text/html"><span><?php echo $patient_room->PatientId->caption() ?></span></script></span></td>
		<td data-name="PatientId"<?php echo $patient_room->PatientId->cellAttributes() ?>>
<script id="tpx_patient_room_PatientId" class="patient_roomview" type="text/html">
<span id="el_patient_room_PatientId">
<span<?php echo $patient_room->PatientId->viewAttributes() ?>>
<?php echo $patient_room->PatientId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_mrnno"><script id="tpc_patient_room_mrnno" class="patient_roomview" type="text/html"><span><?php echo $patient_room->mrnno->caption() ?></span></script></span></td>
		<td data-name="mrnno"<?php echo $patient_room->mrnno->cellAttributes() ?>>
<script id="tpx_patient_room_mrnno" class="patient_roomview" type="text/html">
<span id="el_patient_room_mrnno">
<span<?php echo $patient_room->mrnno->viewAttributes() ?>>
<?php echo $patient_room->mrnno->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_PatientName"><script id="tpc_patient_room_PatientName" class="patient_roomview" type="text/html"><span><?php echo $patient_room->PatientName->caption() ?></span></script></span></td>
		<td data-name="PatientName"<?php echo $patient_room->PatientName->cellAttributes() ?>>
<script id="tpx_patient_room_PatientName" class="patient_roomview" type="text/html">
<span id="el_patient_room_PatientName">
<span<?php echo $patient_room->PatientName->viewAttributes() ?>>
<?php echo $patient_room->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_Gender"><script id="tpc_patient_room_Gender" class="patient_roomview" type="text/html"><span><?php echo $patient_room->Gender->caption() ?></span></script></span></td>
		<td data-name="Gender"<?php echo $patient_room->Gender->cellAttributes() ?>>
<script id="tpx_patient_room_Gender" class="patient_roomview" type="text/html">
<span id="el_patient_room_Gender">
<span<?php echo $patient_room->Gender->viewAttributes() ?>>
<?php echo $patient_room->Gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->RoomID->Visible) { // RoomID ?>
	<tr id="r_RoomID">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_RoomID"><script id="tpc_patient_room_RoomID" class="patient_roomview" type="text/html"><span><?php echo $patient_room->RoomID->caption() ?></span></script></span></td>
		<td data-name="RoomID"<?php echo $patient_room->RoomID->cellAttributes() ?>>
<script id="tpx_patient_room_RoomID" class="patient_roomview" type="text/html">
<span id="el_patient_room_RoomID">
<span<?php echo $patient_room->RoomID->viewAttributes() ?>>
<?php echo $patient_room->RoomID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->RoomNo->Visible) { // RoomNo ?>
	<tr id="r_RoomNo">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_RoomNo"><script id="tpc_patient_room_RoomNo" class="patient_roomview" type="text/html"><span><?php echo $patient_room->RoomNo->caption() ?></span></script></span></td>
		<td data-name="RoomNo"<?php echo $patient_room->RoomNo->cellAttributes() ?>>
<script id="tpx_patient_room_RoomNo" class="patient_roomview" type="text/html">
<span id="el_patient_room_RoomNo">
<span<?php echo $patient_room->RoomNo->viewAttributes() ?>>
<?php echo $patient_room->RoomNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->RoomType->Visible) { // RoomType ?>
	<tr id="r_RoomType">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_RoomType"><script id="tpc_patient_room_RoomType" class="patient_roomview" type="text/html"><span><?php echo $patient_room->RoomType->caption() ?></span></script></span></td>
		<td data-name="RoomType"<?php echo $patient_room->RoomType->cellAttributes() ?>>
<script id="tpx_patient_room_RoomType" class="patient_roomview" type="text/html">
<span id="el_patient_room_RoomType">
<span<?php echo $patient_room->RoomType->viewAttributes() ?>>
<?php echo $patient_room->RoomType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->SharingRoom->Visible) { // SharingRoom ?>
	<tr id="r_SharingRoom">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_SharingRoom"><script id="tpc_patient_room_SharingRoom" class="patient_roomview" type="text/html"><span><?php echo $patient_room->SharingRoom->caption() ?></span></script></span></td>
		<td data-name="SharingRoom"<?php echo $patient_room->SharingRoom->cellAttributes() ?>>
<script id="tpx_patient_room_SharingRoom" class="patient_roomview" type="text/html">
<span id="el_patient_room_SharingRoom">
<span<?php echo $patient_room->SharingRoom->viewAttributes() ?>>
<?php echo $patient_room->SharingRoom->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_Amount"><script id="tpc_patient_room_Amount" class="patient_roomview" type="text/html"><span><?php echo $patient_room->Amount->caption() ?></span></script></span></td>
		<td data-name="Amount"<?php echo $patient_room->Amount->cellAttributes() ?>>
<script id="tpx_patient_room_Amount" class="patient_roomview" type="text/html">
<span id="el_patient_room_Amount">
<span<?php echo $patient_room->Amount->viewAttributes() ?>>
<?php echo $patient_room->Amount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->Startdatetime->Visible) { // Startdatetime ?>
	<tr id="r_Startdatetime">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_Startdatetime"><script id="tpc_patient_room_Startdatetime" class="patient_roomview" type="text/html"><span><?php echo $patient_room->Startdatetime->caption() ?></span></script></span></td>
		<td data-name="Startdatetime"<?php echo $patient_room->Startdatetime->cellAttributes() ?>>
<script id="tpx_patient_room_Startdatetime" class="patient_roomview" type="text/html">
<span id="el_patient_room_Startdatetime">
<span<?php echo $patient_room->Startdatetime->viewAttributes() ?>>
<?php echo $patient_room->Startdatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->Enddatetime->Visible) { // Enddatetime ?>
	<tr id="r_Enddatetime">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_Enddatetime"><script id="tpc_patient_room_Enddatetime" class="patient_roomview" type="text/html"><span><?php echo $patient_room->Enddatetime->caption() ?></span></script></span></td>
		<td data-name="Enddatetime"<?php echo $patient_room->Enddatetime->cellAttributes() ?>>
<script id="tpx_patient_room_Enddatetime" class="patient_roomview" type="text/html">
<span id="el_patient_room_Enddatetime">
<span<?php echo $patient_room->Enddatetime->viewAttributes() ?>>
<?php echo $patient_room->Enddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->DaysHours->Visible) { // DaysHours ?>
	<tr id="r_DaysHours">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_DaysHours"><script id="tpc_patient_room_DaysHours" class="patient_roomview" type="text/html"><span><?php echo $patient_room->DaysHours->caption() ?></span></script></span></td>
		<td data-name="DaysHours"<?php echo $patient_room->DaysHours->cellAttributes() ?>>
<script id="tpx_patient_room_DaysHours" class="patient_roomview" type="text/html">
<span id="el_patient_room_DaysHours">
<span<?php echo $patient_room->DaysHours->viewAttributes() ?>>
<?php echo $patient_room->DaysHours->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->Days->Visible) { // Days ?>
	<tr id="r_Days">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_Days"><script id="tpc_patient_room_Days" class="patient_roomview" type="text/html"><span><?php echo $patient_room->Days->caption() ?></span></script></span></td>
		<td data-name="Days"<?php echo $patient_room->Days->cellAttributes() ?>>
<script id="tpx_patient_room_Days" class="patient_roomview" type="text/html">
<span id="el_patient_room_Days">
<span<?php echo $patient_room->Days->viewAttributes() ?>>
<?php echo $patient_room->Days->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->Hours->Visible) { // Hours ?>
	<tr id="r_Hours">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_Hours"><script id="tpc_patient_room_Hours" class="patient_roomview" type="text/html"><span><?php echo $patient_room->Hours->caption() ?></span></script></span></td>
		<td data-name="Hours"<?php echo $patient_room->Hours->cellAttributes() ?>>
<script id="tpx_patient_room_Hours" class="patient_roomview" type="text/html">
<span id="el_patient_room_Hours">
<span<?php echo $patient_room->Hours->viewAttributes() ?>>
<?php echo $patient_room->Hours->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->TotalAmount->Visible) { // TotalAmount ?>
	<tr id="r_TotalAmount">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_TotalAmount"><script id="tpc_patient_room_TotalAmount" class="patient_roomview" type="text/html"><span><?php echo $patient_room->TotalAmount->caption() ?></span></script></span></td>
		<td data-name="TotalAmount"<?php echo $patient_room->TotalAmount->cellAttributes() ?>>
<script id="tpx_patient_room_TotalAmount" class="patient_roomview" type="text/html">
<span id="el_patient_room_TotalAmount">
<span<?php echo $patient_room->TotalAmount->viewAttributes() ?>>
<?php echo $patient_room->TotalAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_PatID"><script id="tpc_patient_room_PatID" class="patient_roomview" type="text/html"><span><?php echo $patient_room->PatID->caption() ?></span></script></span></td>
		<td data-name="PatID"<?php echo $patient_room->PatID->cellAttributes() ?>>
<script id="tpx_patient_room_PatID" class="patient_roomview" type="text/html">
<span id="el_patient_room_PatID">
<span<?php echo $patient_room->PatID->viewAttributes() ?>>
<?php echo $patient_room->PatID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_MobileNumber"><script id="tpc_patient_room_MobileNumber" class="patient_roomview" type="text/html"><span><?php echo $patient_room->MobileNumber->caption() ?></span></script></span></td>
		<td data-name="MobileNumber"<?php echo $patient_room->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_room_MobileNumber" class="patient_roomview" type="text/html">
<span id="el_patient_room_MobileNumber">
<span<?php echo $patient_room->MobileNumber->viewAttributes() ?>>
<?php echo $patient_room->MobileNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_HospID"><script id="tpc_patient_room_HospID" class="patient_roomview" type="text/html"><span><?php echo $patient_room->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $patient_room->HospID->cellAttributes() ?>>
<script id="tpx_patient_room_HospID" class="patient_roomview" type="text/html">
<span id="el_patient_room_HospID">
<span<?php echo $patient_room->HospID->viewAttributes() ?>>
<?php echo $patient_room->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_status"><script id="tpc_patient_room_status" class="patient_roomview" type="text/html"><span><?php echo $patient_room->status->caption() ?></span></script></span></td>
		<td data-name="status"<?php echo $patient_room->status->cellAttributes() ?>>
<script id="tpx_patient_room_status" class="patient_roomview" type="text/html">
<span id="el_patient_room_status">
<span<?php echo $patient_room->status->viewAttributes() ?>>
<?php echo $patient_room->status->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_createdby"><script id="tpc_patient_room_createdby" class="patient_roomview" type="text/html"><span><?php echo $patient_room->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $patient_room->createdby->cellAttributes() ?>>
<script id="tpx_patient_room_createdby" class="patient_roomview" type="text/html">
<span id="el_patient_room_createdby">
<span<?php echo $patient_room->createdby->viewAttributes() ?>>
<?php echo $patient_room->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_createddatetime"><script id="tpc_patient_room_createddatetime" class="patient_roomview" type="text/html"><span><?php echo $patient_room->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $patient_room->createddatetime->cellAttributes() ?>>
<script id="tpx_patient_room_createddatetime" class="patient_roomview" type="text/html">
<span id="el_patient_room_createddatetime">
<span<?php echo $patient_room->createddatetime->viewAttributes() ?>>
<?php echo $patient_room->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_modifiedby"><script id="tpc_patient_room_modifiedby" class="patient_roomview" type="text/html"><span><?php echo $patient_room->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $patient_room->modifiedby->cellAttributes() ?>>
<script id="tpx_patient_room_modifiedby" class="patient_roomview" type="text/html">
<span id="el_patient_room_modifiedby">
<span<?php echo $patient_room->modifiedby->viewAttributes() ?>>
<?php echo $patient_room->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_room->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_room_view->TableLeftColumnClass ?>"><span id="elh_patient_room_modifieddatetime"><script id="tpc_patient_room_modifieddatetime" class="patient_roomview" type="text/html"><span><?php echo $patient_room->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $patient_room->modifieddatetime->cellAttributes() ?>>
<script id="tpx_patient_room_modifieddatetime" class="patient_roomview" type="text/html">
<span id="el_patient_room_modifieddatetime">
<span<?php echo $patient_room->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_room->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_patient_roomview" class="ew-custom-template"></div>
<script id="tpm_patient_roomview" type="text/html">
<div id="ct_patient_room_view"><style>
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
<p id="PPatientSearch" hidden>{{include tmpl="#tpc_patient_room_Reception"/}}&nbsp;{{include tmpl="#tpx_patient_room_Reception"/}}</p>
</div>
<p id="profilePic" hidden>{{include tmpl="#tpx_profilePic"/}}</p>
<p id="SurfaceArea" hidden>{{include tmpl="#tpx_SurfaceArea"/}}</p>
<p id="BodyMassIndex" hidden>{{include tmpl="#tpx_BodyMassIndex"/}}</p>
<p id="idmrnnokk" hidden>{{include tmpl="#tpc_patient_room_mrnno"/}}&nbsp;{{include tmpl="#tpx_patient_room_mrnno"/}}</p>
<div hidden>
  <p>{{include tmpl="#tpc_patient_room_Reception"/}}&nbsp;{{include tmpl="#tpx_patient_room_Reception"/}}</p> 
  <p>{{include tmpl="#tpc_patient_room_PatientId"/}}&nbsp;{{include tmpl="#tpx_patient_room_PatientId"/}}</p> 
  <p>{{include tmpl="#tpc_patient_room_PatientName"/}}&nbsp;{{include tmpl="#tpx_patient_room_PatientName"/}}</p> 
  <p>{{include tmpl="#tpx_Age"/}}</p> 
  <p>{{include tmpl="#tpc_patient_room_Gender"/}}&nbsp;{{include tmpl="#tpx_patient_room_Gender"/}}</p>
  <p>{{include tmpl="#tpc_patient_room_PatID"/}}&nbsp;{{include tmpl="#tpx_patient_room_PatID"/}}</p>
  <p>{{include tmpl="#tpc_patient_room_MobileNumber"/}}&nbsp;{{include tmpl="#tpx_patient_room_MobileNumber"/}}</p> 
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
{{include tmpl="#tpx_FinalDiagnosisTemplate"/}}
<div class="row">
 		<div class="col-lg-12">
			<div class="card bg-info" style="color:#ac3973;">             
			  <div class="card-body">
			  {{include tmpl="#tpx_FinalDiagnosis"/}}
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
{{include tmpl="#tpx_TreatmentsTemplate"/}}
<div class="row">
 		<div class="col-lg-12">
			<div class="card bg-info" style="color:#8a8a5c;">             
			  <div class="card-body">
			  {{include tmpl="#tpx_Treatments"/}}
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
ew.vars.templateData = { rows: <?php echo JsonEncode($patient_room->Rows) ?> };
ew.applyTemplate("tpd_patient_roomview", "tpm_patient_roomview", "patient_roomview", "<?php echo $patient_room->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.patient_roomview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$patient_room_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$patient_room->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$patient_room_view->terminate();
?>
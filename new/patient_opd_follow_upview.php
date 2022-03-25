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
$patient_opd_follow_up_view = new patient_opd_follow_up_view();

// Run the page
$patient_opd_follow_up_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_opd_follow_up_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$patient_opd_follow_up_view->isExport()) { ?>
<script>
var fpatient_opd_follow_upview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpatient_opd_follow_upview = currentForm = new ew.Form("fpatient_opd_follow_upview", "view");
	loadjs.done("fpatient_opd_follow_upview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$patient_opd_follow_up_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $patient_opd_follow_up_view->ExportOptions->render("body") ?>
<?php $patient_opd_follow_up_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $patient_opd_follow_up_view->showPageHeader(); ?>
<?php
$patient_opd_follow_up_view->showMessage();
?>
<form name="fpatient_opd_follow_upview" id="fpatient_opd_follow_upview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="patient_opd_follow_up">
<input type="hidden" name="modal" value="<?php echo (int)$patient_opd_follow_up_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($patient_opd_follow_up_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_id"><script id="tpc_patient_opd_follow_up_id" type="text/html"><?php echo $patient_opd_follow_up_view->id->caption() ?></script></span></td>
		<td data-name="id" <?php echo $patient_opd_follow_up_view->id->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_id" type="text/html"><span id="el_patient_opd_follow_up_id">
<span<?php echo $patient_opd_follow_up_view->id->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->id->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Reception"><script id="tpc_patient_opd_follow_up_Reception" type="text/html"><?php echo $patient_opd_follow_up_view->Reception->caption() ?></script></span></td>
		<td data-name="Reception" <?php echo $patient_opd_follow_up_view->Reception->cellAttributes() ?>>
<script id="orig_patient_opd_follow_up_Reception" class="patient_opd_follow_upview" type="text/html">
<?php echo $patient_opd_follow_up_view->Reception->getViewValue() ?>
</script><script id="tpx_patient_opd_follow_up_Reception" class="patient_opd_follow_upview" type="text/html">
<?php echo Barcode()->show($patient_opd_follow_up_view->Reception->CurrentValue, 'QRCODE', 80) ?>
</script>
<script id="tpx_patient_opd_follow_up_Reception" type="text/html"><span id="el_patient_opd_follow_up_Reception">
<span<?php echo $patient_opd_follow_up_view->Reception->viewAttributes() ?>>{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_Reception")/}}</span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->PatID->Visible) { // PatID ?>
	<tr id="r_PatID">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatID"><script id="tpc_patient_opd_follow_up_PatID" type="text/html"><?php echo $patient_opd_follow_up_view->PatID->caption() ?></script></span></td>
		<td data-name="PatID" <?php echo $patient_opd_follow_up_view->PatID->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_PatID" type="text/html"><span id="el_patient_opd_follow_up_PatID">
<span<?php echo $patient_opd_follow_up_view->PatID->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->PatID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientId"><script id="tpc_patient_opd_follow_up_PatientId" type="text/html"><?php echo $patient_opd_follow_up_view->PatientId->caption() ?></script></span></td>
		<td data-name="PatientId" <?php echo $patient_opd_follow_up_view->PatientId->cellAttributes() ?>>
<script id="orig_patient_opd_follow_up_PatientId" class="patient_opd_follow_upview" type="text/html">
<?php echo $patient_opd_follow_up_view->PatientId->getViewValue() ?>
</script><script id="tpx_patient_opd_follow_up_PatientId" class="patient_opd_follow_upview" type="text/html">
<?php echo Barcode()->show($patient_opd_follow_up_view->PatientId->CurrentValue, 'CODE128', 40) ?>
</script>
<script id="tpx_patient_opd_follow_up_PatientId" type="text/html"><span id="el_patient_opd_follow_up_PatientId">
<span<?php echo $patient_opd_follow_up_view->PatientId->viewAttributes() ?>>{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_PatientId")/}}</span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientName"><script id="tpc_patient_opd_follow_up_PatientName" type="text/html"><?php echo $patient_opd_follow_up_view->PatientName->caption() ?></script></span></td>
		<td data-name="PatientName" <?php echo $patient_opd_follow_up_view->PatientName->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_PatientName" type="text/html"><span id="el_patient_opd_follow_up_PatientName">
<span<?php echo $patient_opd_follow_up_view->PatientName->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->PatientName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->MobileNumber->Visible) { // MobileNumber ?>
	<tr id="r_MobileNumber">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_MobileNumber"><script id="tpc_patient_opd_follow_up_MobileNumber" type="text/html"><?php echo $patient_opd_follow_up_view->MobileNumber->caption() ?></script></span></td>
		<td data-name="MobileNumber" <?php echo $patient_opd_follow_up_view->MobileNumber->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_MobileNumber" type="text/html"><span id="el_patient_opd_follow_up_MobileNumber">
<span<?php echo $patient_opd_follow_up_view->MobileNumber->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->MobileNumber->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->Telephone->Visible) { // Telephone ?>
	<tr id="r_Telephone">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Telephone"><script id="tpc_patient_opd_follow_up_Telephone" type="text/html"><?php echo $patient_opd_follow_up_view->Telephone->caption() ?></script></span></td>
		<td data-name="Telephone" <?php echo $patient_opd_follow_up_view->Telephone->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Telephone" type="text/html"><span id="el_patient_opd_follow_up_Telephone">
<span<?php echo $patient_opd_follow_up_view->Telephone->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->Telephone->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_mrnno"><script id="tpc_patient_opd_follow_up_mrnno" type="text/html"><?php echo $patient_opd_follow_up_view->mrnno->caption() ?></script></span></td>
		<td data-name="mrnno" <?php echo $patient_opd_follow_up_view->mrnno->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_mrnno" type="text/html"><span id="el_patient_opd_follow_up_mrnno">
<span<?php echo $patient_opd_follow_up_view->mrnno->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->mrnno->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Age"><script id="tpc_patient_opd_follow_up_Age" type="text/html"><?php echo $patient_opd_follow_up_view->Age->caption() ?></script></span></td>
		<td data-name="Age" <?php echo $patient_opd_follow_up_view->Age->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Age" type="text/html"><span id="el_patient_opd_follow_up_Age">
<span<?php echo $patient_opd_follow_up_view->Age->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->Age->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Gender"><script id="tpc_patient_opd_follow_up_Gender" type="text/html"><?php echo $patient_opd_follow_up_view->Gender->caption() ?></script></span></td>
		<td data-name="Gender" <?php echo $patient_opd_follow_up_view->Gender->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Gender" type="text/html"><span id="el_patient_opd_follow_up_Gender">
<span<?php echo $patient_opd_follow_up_view->Gender->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->Gender->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_profilePic"><script id="tpc_patient_opd_follow_up_profilePic" type="text/html"><?php echo $patient_opd_follow_up_view->profilePic->caption() ?></script></span></td>
		<td data-name="profilePic" <?php echo $patient_opd_follow_up_view->profilePic->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_profilePic" type="text/html"><span id="el_patient_opd_follow_up_profilePic">
<span<?php echo $patient_opd_follow_up_view->profilePic->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->profilePic->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->procedurenotes->Visible) { // procedurenotes ?>
	<tr id="r_procedurenotes">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_procedurenotes"><script id="tpc_patient_opd_follow_up_procedurenotes" type="text/html"><?php echo $patient_opd_follow_up_view->procedurenotes->caption() ?></script></span></td>
		<td data-name="procedurenotes" <?php echo $patient_opd_follow_up_view->procedurenotes->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_procedurenotes" type="text/html"><span id="el_patient_opd_follow_up_procedurenotes">
<span<?php echo $patient_opd_follow_up_view->procedurenotes->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->procedurenotes->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->NextReviewDate->Visible) { // NextReviewDate ?>
	<tr id="r_NextReviewDate">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_NextReviewDate"><script id="tpc_patient_opd_follow_up_NextReviewDate" type="text/html"><?php echo $patient_opd_follow_up_view->NextReviewDate->caption() ?></script></span></td>
		<td data-name="NextReviewDate" <?php echo $patient_opd_follow_up_view->NextReviewDate->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_NextReviewDate" type="text/html"><span id="el_patient_opd_follow_up_NextReviewDate">
<span<?php echo $patient_opd_follow_up_view->NextReviewDate->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->NextReviewDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->ICSIAdvised->Visible) { // ICSIAdvised ?>
	<tr id="r_ICSIAdvised">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ICSIAdvised"><script id="tpc_patient_opd_follow_up_ICSIAdvised" type="text/html"><?php echo $patient_opd_follow_up_view->ICSIAdvised->caption() ?></script></span></td>
		<td data-name="ICSIAdvised" <?php echo $patient_opd_follow_up_view->ICSIAdvised->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_ICSIAdvised" type="text/html"><span id="el_patient_opd_follow_up_ICSIAdvised">
<span<?php echo $patient_opd_follow_up_view->ICSIAdvised->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->ICSIAdvised->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
	<tr id="r_DeliveryRegistered">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_DeliveryRegistered"><script id="tpc_patient_opd_follow_up_DeliveryRegistered" type="text/html"><?php echo $patient_opd_follow_up_view->DeliveryRegistered->caption() ?></script></span></td>
		<td data-name="DeliveryRegistered" <?php echo $patient_opd_follow_up_view->DeliveryRegistered->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_DeliveryRegistered" type="text/html"><span id="el_patient_opd_follow_up_DeliveryRegistered">
<span<?php echo $patient_opd_follow_up_view->DeliveryRegistered->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->DeliveryRegistered->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->EDD->Visible) { // EDD ?>
	<tr id="r_EDD">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_EDD"><script id="tpc_patient_opd_follow_up_EDD" type="text/html"><?php echo $patient_opd_follow_up_view->EDD->caption() ?></script></span></td>
		<td data-name="EDD" <?php echo $patient_opd_follow_up_view->EDD->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_EDD" type="text/html"><span id="el_patient_opd_follow_up_EDD">
<span<?php echo $patient_opd_follow_up_view->EDD->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->EDD->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->SerologyPositive->Visible) { // SerologyPositive ?>
	<tr id="r_SerologyPositive">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_SerologyPositive"><script id="tpc_patient_opd_follow_up_SerologyPositive" type="text/html"><?php echo $patient_opd_follow_up_view->SerologyPositive->caption() ?></script></span></td>
		<td data-name="SerologyPositive" <?php echo $patient_opd_follow_up_view->SerologyPositive->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_SerologyPositive" type="text/html"><span id="el_patient_opd_follow_up_SerologyPositive">
<span<?php echo $patient_opd_follow_up_view->SerologyPositive->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->SerologyPositive->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->Allergy->Visible) { // Allergy ?>
	<tr id="r_Allergy">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Allergy"><script id="tpc_patient_opd_follow_up_Allergy" type="text/html"><?php echo $patient_opd_follow_up_view->Allergy->caption() ?></script></span></td>
		<td data-name="Allergy" <?php echo $patient_opd_follow_up_view->Allergy->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Allergy" type="text/html"><span id="el_patient_opd_follow_up_Allergy">
<span<?php echo $patient_opd_follow_up_view->Allergy->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->Allergy->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_status"><script id="tpc_patient_opd_follow_up_status" type="text/html"><?php echo $patient_opd_follow_up_view->status->caption() ?></script></span></td>
		<td data-name="status" <?php echo $patient_opd_follow_up_view->status->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_status" type="text/html"><span id="el_patient_opd_follow_up_status">
<span<?php echo $patient_opd_follow_up_view->status->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->status->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createdby"><script id="tpc_patient_opd_follow_up_createdby" type="text/html"><?php echo $patient_opd_follow_up_view->createdby->caption() ?></script></span></td>
		<td data-name="createdby" <?php echo $patient_opd_follow_up_view->createdby->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_createdby" type="text/html"><span id="el_patient_opd_follow_up_createdby">
<span<?php echo $patient_opd_follow_up_view->createdby->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->createdby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createddatetime"><script id="tpc_patient_opd_follow_up_createddatetime" type="text/html"><?php echo $patient_opd_follow_up_view->createddatetime->caption() ?></script></span></td>
		<td data-name="createddatetime" <?php echo $patient_opd_follow_up_view->createddatetime->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_createddatetime" type="text/html"><span id="el_patient_opd_follow_up_createddatetime">
<span<?php echo $patient_opd_follow_up_view->createddatetime->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->createddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_modifiedby"><script id="tpc_patient_opd_follow_up_modifiedby" type="text/html"><?php echo $patient_opd_follow_up_view->modifiedby->caption() ?></script></span></td>
		<td data-name="modifiedby" <?php echo $patient_opd_follow_up_view->modifiedby->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_modifiedby" type="text/html"><span id="el_patient_opd_follow_up_modifiedby">
<span<?php echo $patient_opd_follow_up_view->modifiedby->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->modifiedby->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_modifieddatetime"><script id="tpc_patient_opd_follow_up_modifieddatetime" type="text/html"><?php echo $patient_opd_follow_up_view->modifieddatetime->caption() ?></script></span></td>
		<td data-name="modifieddatetime" <?php echo $patient_opd_follow_up_view->modifieddatetime->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_modifieddatetime" type="text/html"><span id="el_patient_opd_follow_up_modifieddatetime">
<span<?php echo $patient_opd_follow_up_view->modifieddatetime->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->modifieddatetime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->LMP->Visible) { // LMP ?>
	<tr id="r_LMP">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_LMP"><script id="tpc_patient_opd_follow_up_LMP" type="text/html"><?php echo $patient_opd_follow_up_view->LMP->caption() ?></script></span></td>
		<td data-name="LMP" <?php echo $patient_opd_follow_up_view->LMP->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_LMP" type="text/html"><span id="el_patient_opd_follow_up_LMP">
<span<?php echo $patient_opd_follow_up_view->LMP->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->LMP->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->Procedure->Visible) { // Procedure ?>
	<tr id="r_Procedure">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_Procedure"><script id="tpc_patient_opd_follow_up_Procedure" type="text/html"><?php echo $patient_opd_follow_up_view->Procedure->caption() ?></script></span></td>
		<td data-name="Procedure" <?php echo $patient_opd_follow_up_view->Procedure->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_Procedure" type="text/html"><span id="el_patient_opd_follow_up_Procedure">
<span<?php echo $patient_opd_follow_up_view->Procedure->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->Procedure->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
	<tr id="r_ProcedureDateTime">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ProcedureDateTime"><script id="tpc_patient_opd_follow_up_ProcedureDateTime" type="text/html"><?php echo $patient_opd_follow_up_view->ProcedureDateTime->caption() ?></script></span></td>
		<td data-name="ProcedureDateTime" <?php echo $patient_opd_follow_up_view->ProcedureDateTime->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_ProcedureDateTime" type="text/html"><span id="el_patient_opd_follow_up_ProcedureDateTime">
<span<?php echo $patient_opd_follow_up_view->ProcedureDateTime->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->ProcedureDateTime->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->ICSIDate->Visible) { // ICSIDate ?>
	<tr id="r_ICSIDate">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_ICSIDate"><script id="tpc_patient_opd_follow_up_ICSIDate" type="text/html"><?php echo $patient_opd_follow_up_view->ICSIDate->caption() ?></script></span></td>
		<td data-name="ICSIDate" <?php echo $patient_opd_follow_up_view->ICSIDate->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_ICSIDate" type="text/html"><span id="el_patient_opd_follow_up_ICSIDate">
<span<?php echo $patient_opd_follow_up_view->ICSIDate->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->ICSIDate->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->PatientSearch->Visible) { // PatientSearch ?>
	<tr id="r_PatientSearch">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_PatientSearch"><script id="tpc_patient_opd_follow_up_PatientSearch" type="text/html"><?php echo $patient_opd_follow_up_view->PatientSearch->caption() ?></script></span></td>
		<td data-name="PatientSearch" <?php echo $patient_opd_follow_up_view->PatientSearch->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_PatientSearch" type="text/html"><span id="el_patient_opd_follow_up_PatientSearch">
<span<?php echo $patient_opd_follow_up_view->PatientSearch->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->PatientSearch->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_HospID"><script id="tpc_patient_opd_follow_up_HospID" type="text/html"><?php echo $patient_opd_follow_up_view->HospID->caption() ?></script></span></td>
		<td data-name="HospID" <?php echo $patient_opd_follow_up_view->HospID->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_HospID" type="text/html"><span id="el_patient_opd_follow_up_HospID">
<span<?php echo $patient_opd_follow_up_view->HospID->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->HospID->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->createdUserName->Visible) { // createdUserName ?>
	<tr id="r_createdUserName">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_createdUserName"><script id="tpc_patient_opd_follow_up_createdUserName" type="text/html"><?php echo $patient_opd_follow_up_view->createdUserName->caption() ?></script></span></td>
		<td data-name="createdUserName" <?php echo $patient_opd_follow_up_view->createdUserName->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_createdUserName" type="text/html"><span id="el_patient_opd_follow_up_createdUserName">
<span<?php echo $patient_opd_follow_up_view->createdUserName->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->createdUserName->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->TemplateDrNotes->Visible) { // TemplateDrNotes ?>
	<tr id="r_TemplateDrNotes">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_TemplateDrNotes"><script id="tpc_patient_opd_follow_up_TemplateDrNotes" type="text/html"><?php echo $patient_opd_follow_up_view->TemplateDrNotes->caption() ?></script></span></td>
		<td data-name="TemplateDrNotes" <?php echo $patient_opd_follow_up_view->TemplateDrNotes->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_TemplateDrNotes" type="text/html"><span id="el_patient_opd_follow_up_TemplateDrNotes">
<span<?php echo $patient_opd_follow_up_view->TemplateDrNotes->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->TemplateDrNotes->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
<?php if ($patient_opd_follow_up_view->reportheader->Visible) { // reportheader ?>
	<tr id="r_reportheader">
		<td class="<?php echo $patient_opd_follow_up_view->TableLeftColumnClass ?>"><span id="elh_patient_opd_follow_up_reportheader"><script id="tpc_patient_opd_follow_up_reportheader" type="text/html"><?php echo $patient_opd_follow_up_view->reportheader->caption() ?></script></span></td>
		<td data-name="reportheader" <?php echo $patient_opd_follow_up_view->reportheader->cellAttributes() ?>>
<script id="tpx_patient_opd_follow_up_reportheader" type="text/html"><span id="el_patient_opd_follow_up_reportheader">
<span<?php echo $patient_opd_follow_up_view->reportheader->viewAttributes() ?>><?php echo $patient_opd_follow_up_view->reportheader->getViewValue() ?></span>
</span></script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_patient_opd_follow_upview" class="ew-custom-template"></div>
<script id="tpm_patient_opd_follow_upview" type="text/html">
<div id="ct_patient_opd_follow_up_view"><style>
.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
	width: 90%;
}
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 90%;
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
.alignleft {
	float: left;
}
.alignright {
	float: right;
}
</style>
																										<?php
 $Reception = $Page->id->CurrentValue;
 $patient_id = $Page->PatientId->CurrentValue;
 $fromdt = date('Y-m-d', strtotime('-1 months'));
 $todate = date('Y-m-d', strtotime('+2 months'));
 $Drid = $_GET['Drid'];
 $dbhelper = &DbHelper();
 $sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$patient_id."'; ";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $PatientID =  $row["PatientID"];
	 $title =  $row["title"];
	 $first_name =  $row["first_name"];
	 $gender =  $row["gender"];
	 $dob =  $row["dob"];
	 $Age =  $row["Age"];
	 $blood_group =  $row["blood_group"];
	 $mobile_no =  $row["mobile_no"];
	 $Patid =  $row["id"];
	 $mobile_no =  $row["mobile_no"];
	 $IdentificationMark =  $row["IdentificationMark"];
	 $Religion =  $row["Religion"];
	 $street =  $row["street"];
	 $town =  $row["town"];
	 $province =  $row["province"];
	 $country =  $row["country"];
	 $postal_code =  $row["postal_code"];
	 $PEmail =  $row["PEmail"];
	if( $street != '')
	{
		$address .= $street;
	}
	if( $town != '')
	{
		$address .= ', '.$town;
	}
	if( $province != '')
	{
		$address .= ', '.$province;
	}
	if( $country != '')
	{
		$address .= ', '.$country;
	}
	 if( $postal_code != '')
	{
		$address .= ', '.$postal_code;
	}
	 $rs->MoveNext();
 }
 $sql = "SELECT * FROM ganeshkumar_bjhims.ip_admission where id='".$Page->Reception->CurrentValue ."'; ";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $DrNameid =  $row["physician_id"];
	 $rs->MoveNext();
 }
 $sql = "SELECT * FROM ganeshkumar_bjhims.doctors where id='".$DrNameid."'; ";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $DrName =  $row["NAME"];
	 	 $rs->MoveNext();
 }
 $sql = "SELECT * FROM ganeshkumar_bjhims.hospital where id='".$Page->HospID->CurrentValue."'; ";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $DrName =  $row["NAME"];
	 $DrNameid =  $row["id"];
	 $DrNamelogo =  $row["logo"];
	 $DrNamehospital =  $row["hospital"];
	 $DrNamestreet =  $row["street"];
	 $DrNamearea =  $row["area"];
	 $DrNametown =  $row["town"];
	 $DrNameprovince =  $row["province"];
	 $DrNamepostal_code =  $row["postal_code"];
	 $DrNamephone_no =  $row["phone_no"];
	 $DrNamePreFixCode =  $row["PreFixCode"];
	 $DrNamestatus =  $row["status"];
	 $DrNamecreatedby =  $row["createdby"];
	 $DrNamecreateddatetime =  $row["createddatetime"];
	 $DrNamemodifiedby =  $row["modifiedby"];
	 $DrNamemodifieddatetime =  $row["modifieddatetime"];
	 $DrNameBillingGST =  $row["BillingGST"];
	 $DrNamepharmacyGST =  $row["pharmacyGST"];
	 	 $rs->MoveNext();
 }
  $sql = "SELECT * FROM ganeshkumar_bjhims.patient_history where Reception='".$Page->Reception->CurrentValue ."'; ";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $Complaints =  $row["Complaints"];
	 $rs->MoveNext();
 }
 $aa = "ewbarcode.php?data=".$Page->PatID->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
 ?>
<?php
if($Page->reportheader->CurrentValue == 'Yes')
{
if($Page->HospID->CurrentValue == '1')
{
$HospIDReport = 'phpimages/A4 Hospitals logo Final.png';
}else{
$HospIDReport = 'phpimages/logo.png';
}
$ReptHeader = '<div class="row invoice-info">
				<div class="col-sm-4 invoice-col">
				  <address>
					<strong style="color:#33B0FF;font-size:25px;">'.$DrNamehospital.'</strong><br>
					'.$DrNamestreet.', '.$DrNamearea.'<br>
					'.$DrNametown.', '.$DrNameprovince.'.  <br>
						Pincode: '.$DrNamepostal_code.'<br>
					Phone: '.$DrNamephone_no.'<br>
				  </address>
				</div>
				<div class="col-sm-4 invoice-col">
				  <address>
				  </address>
				</div>
				<div class="col-sm-4 invoice-col" align="right">
<img src="'.$HospIDReport.'" alt="" width="380" height="100">
				</div>
</div><hr style="height:2px;border-width:0;color:gray;background-color:#33B0FF">';
echo $ReptHeader;
}
?>
<h2 align="center">OP SUMMARY</h2>
<font size="4" style="font-weight: bold;">
<table align="left" border="0" cellpadding="1" cellspacing="1" style="width:100%">
	<tbody>
		<tr>
			<td style='width:50%;'>Patient Name: <?php echo $first_name; ?></td>
			<td align="right"><?php echo date("F j, Y"); ?></td>
		</tr>
		<tr>
			<td style='width:50%;'>Gender: <?php echo $gender; ?></td>
			<td align="right">Consultant: <?php echo $Page->createdUserName->CurrentValue; ?></td>
		</tr>
		<tr>
			<td style='width:50%;'>Age: <?php echo $Age; ?></td>
			<td align="right">Patient ID: <?php echo $PatientID; ?></td>
		</tr>
		<tr>
			<td style='width:50%;'>Contact No: <?php echo $mobile_no; ?></td>
			<td align="right"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td>
		</tr>
	</tbody>
</table>
</font>
<br><br>
<font size="4">
	<p>
<?php
if($Complaints!= null)
{
	echo 'Chief Complaints : ' . $Complaints;
}
?><br>
{{include tmpl="#tpc_patient_opd_follow_up_procedurenotes"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_procedurenotes")/}}<br>
<?php
$hhh = 'Medicine:
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td><b>Medicine</b></td>
<td><b>M</b></td>
<td><b>A</b></td>
<td><b>N</b></td>
<td><b>NoOfDays</b></td>
<td><b>Route</b></td>
<td><b>TimeOfTaking</b></td>
</tr>';
	 $Reception = $Page->Reception->CurrentValue;
	 $patient_id = $Page->PatientId->CurrentValue;
 $fromdt = date('Y-m-d', strtotime('-1 months'));
 $todate = date('Y-m-d', strtotime('+2 months'));
 $Drid = $_GET['Drid'];
 $dbhelper = &DbHelper();
 $hhjjj = 'false';
 $sql = "SELECT * FROM ganeshkumar_bjhims.patient_prescription where Reception='".$Reception."' and PatientId='".$patient_id."' and Type='OP Advice' ;";
 $rs = $dbhelper->LoadRecordset($sql);
 while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $Preid =  $row["id"];
	 $Medicine =  $row["Medicine"];
	 $M =  $row["M"];
	 $A =  $row["A"];
	 $N =  $row["N"];
	 $NoOfDays =  $row["NoOfDays"];
	 $PreRoute =  $row["PreRoute"];
	 $TimeOfTaking =  $row["TimeOfTaking"];
	 $hhjjj = 'true';
	 $hhh .= '<tr><td>'.$Medicine.'</td><td>'.$M.'</td><td>'.$A.'</td><td>'.$N.'</td><td>'.$NoOfDays.'</td><td>'.$PreRoute.'</td><td>'.$TimeOfTaking.'</td></tr>  ';
	 $rs->MoveNext();
 }
$hhh .= '</table>';
if($hhjjj!= 'false')
{
 echo $hhh;
}
$tt = "ewbarcode.php?data=".$Page->Reception->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
 ?>
	</p>
	</font>
<font size="4" style="font-weight: bold;">
	{{include tmpl="#tpc_patient_opd_follow_up_NextReviewDate"/}}&nbsp;{{include tmpl=~getTemplate("#tpx_patient_opd_follow_up_NextReviewDate")/}}
<br>
<p align="right">
<img src='<?php echo $tt; ?>' alt style="border: 0;">
<p>
</font>
<br><br>
<div id="textbox">
  <p class="alignleft">Consultant Signature</p>
  <p class="alignright">Signature of the patient&nbsp;&nbsp;&nbsp;&nbsp;</p>
</div>
</div>
</script>

<?php
	if (in_array("patient_an_registration", explode(",", $patient_opd_follow_up->getCurrentDetailTable())) && $patient_an_registration->DetailView) {
?>
<?php if ($patient_opd_follow_up->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("patient_an_registration", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "patient_an_registrationgrid.php" ?>
<?php } ?>
</form>
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
	var $ = jQuery;
	ew.templateData = { rows: <?php echo JsonEncode($patient_opd_follow_up->Rows) ?> };
	ew.applyTemplate("tpd_patient_opd_follow_upview", "tpm_patient_opd_follow_upview", "patient_opd_follow_upview", "<?php echo $patient_opd_follow_up->CustomExport ?>", ew.templateData.rows[0]);
	$("script.patient_opd_follow_upview_js").each(function() {
		ew.addScript(this.text);
	});
});
</script>
<?php
$patient_opd_follow_up_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$patient_opd_follow_up_view->isExport()) { ?>
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
$patient_opd_follow_up_view->terminate();
?>
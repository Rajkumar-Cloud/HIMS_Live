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
$view_lab_services_auth_view = new view_lab_services_auth_view();

// Run the page
$view_lab_services_auth_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_services_auth_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_lab_services_auth->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_lab_services_authview = currentForm = new ew.Form("fview_lab_services_authview", "view");

// Form_CustomValidate event
fview_lab_services_authview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_services_authview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_services_authview.lists["x_HospID"] = <?php echo $view_lab_services_auth_view->HospID->Lookup->toClientList() ?>;
fview_lab_services_authview.lists["x_HospID"].options = <?php echo JsonEncode($view_lab_services_auth_view->HospID->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_lab_services_auth->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_lab_services_auth_view->ExportOptions->render("body") ?>
<?php $view_lab_services_auth_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_lab_services_auth_view->showPageHeader(); ?>
<?php
$view_lab_services_auth_view->showMessage();
?>
<form name="fview_lab_services_authview" id="fview_lab_services_authview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_services_auth_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_services_auth_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_services_auth">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_services_auth_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_lab_services_auth->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_id"><script id="tpc_view_lab_services_auth_id" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $view_lab_services_auth->id->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_id" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_id">
<span<?php echo $view_lab_services_auth->id->viewAttributes() ?>>
<?php echo $view_lab_services_auth->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->SID->Visible) { // SID ?>
	<tr id="r_SID">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_SID"><script id="tpc_view_lab_services_auth_SID" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->SID->caption() ?></span></script></span></td>
		<td data-name="SID"<?php echo $view_lab_services_auth->SID->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_SID" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_SID">
<span<?php echo $view_lab_services_auth->SID->viewAttributes() ?>>
<?php echo $view_lab_services_auth->SID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_Reception"><script id="tpc_view_lab_services_auth_Reception" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->Reception->caption() ?></span></script></span></td>
		<td data-name="Reception"<?php echo $view_lab_services_auth->Reception->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_Reception" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_Reception">
<span<?php echo $view_lab_services_auth->Reception->viewAttributes() ?>>
<?php echo $view_lab_services_auth->Reception->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_PatientId"><script id="tpc_view_lab_services_auth_PatientId" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->PatientId->caption() ?></span></script></span></td>
		<td data-name="PatientId"<?php echo $view_lab_services_auth->PatientId->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_PatientId" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_PatientId">
<span<?php echo $view_lab_services_auth->PatientId->viewAttributes() ?>>
<?php echo $view_lab_services_auth->PatientId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_mrnno"><script id="tpc_view_lab_services_auth_mrnno" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->mrnno->caption() ?></span></script></span></td>
		<td data-name="mrnno"<?php echo $view_lab_services_auth->mrnno->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_mrnno" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_mrnno">
<span<?php echo $view_lab_services_auth->mrnno->viewAttributes() ?>>
<?php echo $view_lab_services_auth->mrnno->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_PatientName"><script id="tpc_view_lab_services_auth_PatientName" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->PatientName->caption() ?></span></script></span></td>
		<td data-name="PatientName"<?php echo $view_lab_services_auth->PatientName->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_PatientName" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_PatientName">
<span<?php echo $view_lab_services_auth->PatientName->viewAttributes() ?>>
<?php echo $view_lab_services_auth->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_Age"><script id="tpc_view_lab_services_auth_Age" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $view_lab_services_auth->Age->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_Age" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_Age">
<span<?php echo $view_lab_services_auth->Age->viewAttributes() ?>>
<?php echo $view_lab_services_auth->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_Gender"><script id="tpc_view_lab_services_auth_Gender" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->Gender->caption() ?></span></script></span></td>
		<td data-name="Gender"<?php echo $view_lab_services_auth->Gender->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_Gender" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_Gender">
<span<?php echo $view_lab_services_auth->Gender->viewAttributes() ?>>
<?php echo $view_lab_services_auth->Gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_profilePic"><script id="tpc_view_lab_services_auth_profilePic" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->profilePic->caption() ?></span></script></span></td>
		<td data-name="profilePic"<?php echo $view_lab_services_auth->profilePic->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_profilePic" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_profilePic">
<span<?php echo $view_lab_services_auth->profilePic->viewAttributes() ?>>
<?php echo $view_lab_services_auth->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->Mobile->Visible) { // Mobile ?>
	<tr id="r_Mobile">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_Mobile"><script id="tpc_view_lab_services_auth_Mobile" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->Mobile->caption() ?></span></script></span></td>
		<td data-name="Mobile"<?php echo $view_lab_services_auth->Mobile->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_Mobile" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_Mobile">
<span<?php echo $view_lab_services_auth->Mobile->viewAttributes() ?>>
<?php echo $view_lab_services_auth->Mobile->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->IP_OP->Visible) { // IP_OP ?>
	<tr id="r_IP_OP">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_IP_OP"><script id="tpc_view_lab_services_auth_IP_OP" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->IP_OP->caption() ?></span></script></span></td>
		<td data-name="IP_OP"<?php echo $view_lab_services_auth->IP_OP->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_IP_OP" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_IP_OP">
<span<?php echo $view_lab_services_auth->IP_OP->viewAttributes() ?>>
<?php echo $view_lab_services_auth->IP_OP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->Doctor->Visible) { // Doctor ?>
	<tr id="r_Doctor">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_Doctor"><script id="tpc_view_lab_services_auth_Doctor" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->Doctor->caption() ?></span></script></span></td>
		<td data-name="Doctor"<?php echo $view_lab_services_auth->Doctor->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_Doctor" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_Doctor">
<span<?php echo $view_lab_services_auth->Doctor->viewAttributes() ?>>
<?php echo $view_lab_services_auth->Doctor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->voucher_type->Visible) { // voucher_type ?>
	<tr id="r_voucher_type">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_voucher_type"><script id="tpc_view_lab_services_auth_voucher_type" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->voucher_type->caption() ?></span></script></span></td>
		<td data-name="voucher_type"<?php echo $view_lab_services_auth->voucher_type->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_voucher_type" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_voucher_type">
<span<?php echo $view_lab_services_auth->voucher_type->viewAttributes() ?>>
<?php echo $view_lab_services_auth->voucher_type->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_Details"><script id="tpc_view_lab_services_auth_Details" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->Details->caption() ?></span></script></span></td>
		<td data-name="Details"<?php echo $view_lab_services_auth->Details->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_Details" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_Details">
<span<?php echo $view_lab_services_auth->Details->viewAttributes() ?>>
<?php echo $view_lab_services_auth->Details->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->ModeofPayment->Visible) { // ModeofPayment ?>
	<tr id="r_ModeofPayment">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_ModeofPayment"><script id="tpc_view_lab_services_auth_ModeofPayment" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->ModeofPayment->caption() ?></span></script></span></td>
		<td data-name="ModeofPayment"<?php echo $view_lab_services_auth->ModeofPayment->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_ModeofPayment" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_ModeofPayment">
<span<?php echo $view_lab_services_auth->ModeofPayment->viewAttributes() ?>>
<?php echo $view_lab_services_auth->ModeofPayment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_Amount"><script id="tpc_view_lab_services_auth_Amount" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->Amount->caption() ?></span></script></span></td>
		<td data-name="Amount"<?php echo $view_lab_services_auth->Amount->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_Amount" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_Amount">
<span<?php echo $view_lab_services_auth->Amount->viewAttributes() ?>>
<?php echo $view_lab_services_auth->Amount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->AnyDues->Visible) { // AnyDues ?>
	<tr id="r_AnyDues">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_AnyDues"><script id="tpc_view_lab_services_auth_AnyDues" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->AnyDues->caption() ?></span></script></span></td>
		<td data-name="AnyDues"<?php echo $view_lab_services_auth->AnyDues->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_AnyDues" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_AnyDues">
<span<?php echo $view_lab_services_auth->AnyDues->viewAttributes() ?>>
<?php echo $view_lab_services_auth->AnyDues->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_createdby"><script id="tpc_view_lab_services_auth_createdby" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $view_lab_services_auth->createdby->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_createdby" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_createdby">
<span<?php echo $view_lab_services_auth->createdby->viewAttributes() ?>>
<?php echo $view_lab_services_auth->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_createddatetime"><script id="tpc_view_lab_services_auth_createddatetime" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $view_lab_services_auth->createddatetime->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_createddatetime" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_createddatetime">
<span<?php echo $view_lab_services_auth->createddatetime->viewAttributes() ?>>
<?php echo $view_lab_services_auth->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_modifiedby"><script id="tpc_view_lab_services_auth_modifiedby" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $view_lab_services_auth->modifiedby->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_modifiedby" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_modifiedby">
<span<?php echo $view_lab_services_auth->modifiedby->viewAttributes() ?>>
<?php echo $view_lab_services_auth->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_modifieddatetime"><script id="tpc_view_lab_services_auth_modifieddatetime" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $view_lab_services_auth->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_modifieddatetime" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_modifieddatetime">
<span<?php echo $view_lab_services_auth->modifieddatetime->viewAttributes() ?>>
<?php echo $view_lab_services_auth->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->RealizationAmount->Visible) { // RealizationAmount ?>
	<tr id="r_RealizationAmount">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_RealizationAmount"><script id="tpc_view_lab_services_auth_RealizationAmount" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->RealizationAmount->caption() ?></span></script></span></td>
		<td data-name="RealizationAmount"<?php echo $view_lab_services_auth->RealizationAmount->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_RealizationAmount" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_RealizationAmount">
<span<?php echo $view_lab_services_auth->RealizationAmount->viewAttributes() ?>>
<?php echo $view_lab_services_auth->RealizationAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->RealizationStatus->Visible) { // RealizationStatus ?>
	<tr id="r_RealizationStatus">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_RealizationStatus"><script id="tpc_view_lab_services_auth_RealizationStatus" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->RealizationStatus->caption() ?></span></script></span></td>
		<td data-name="RealizationStatus"<?php echo $view_lab_services_auth->RealizationStatus->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_RealizationStatus" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_RealizationStatus">
<span<?php echo $view_lab_services_auth->RealizationStatus->viewAttributes() ?>>
<?php echo $view_lab_services_auth->RealizationStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<tr id="r_RealizationRemarks">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_RealizationRemarks"><script id="tpc_view_lab_services_auth_RealizationRemarks" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->RealizationRemarks->caption() ?></span></script></span></td>
		<td data-name="RealizationRemarks"<?php echo $view_lab_services_auth->RealizationRemarks->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_RealizationRemarks" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_RealizationRemarks">
<span<?php echo $view_lab_services_auth->RealizationRemarks->viewAttributes() ?>>
<?php echo $view_lab_services_auth->RealizationRemarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<tr id="r_RealizationBatchNo">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_RealizationBatchNo"><script id="tpc_view_lab_services_auth_RealizationBatchNo" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->RealizationBatchNo->caption() ?></span></script></span></td>
		<td data-name="RealizationBatchNo"<?php echo $view_lab_services_auth->RealizationBatchNo->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_RealizationBatchNo" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_RealizationBatchNo">
<span<?php echo $view_lab_services_auth->RealizationBatchNo->viewAttributes() ?>>
<?php echo $view_lab_services_auth->RealizationBatchNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->RealizationDate->Visible) { // RealizationDate ?>
	<tr id="r_RealizationDate">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_RealizationDate"><script id="tpc_view_lab_services_auth_RealizationDate" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->RealizationDate->caption() ?></span></script></span></td>
		<td data-name="RealizationDate"<?php echo $view_lab_services_auth->RealizationDate->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_RealizationDate" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_RealizationDate">
<span<?php echo $view_lab_services_auth->RealizationDate->viewAttributes() ?>>
<?php echo $view_lab_services_auth->RealizationDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_HospID"><script id="tpc_view_lab_services_auth_HospID" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $view_lab_services_auth->HospID->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_HospID" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_HospID">
<span<?php echo $view_lab_services_auth->HospID->viewAttributes() ?>>
<?php echo $view_lab_services_auth->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_RIDNO"><script id="tpc_view_lab_services_auth_RIDNO" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->RIDNO->caption() ?></span></script></span></td>
		<td data-name="RIDNO"<?php echo $view_lab_services_auth->RIDNO->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_RIDNO" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_RIDNO">
<span<?php echo $view_lab_services_auth->RIDNO->viewAttributes() ?>>
<?php echo $view_lab_services_auth->RIDNO->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_TidNo"><script id="tpc_view_lab_services_auth_TidNo" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->TidNo->caption() ?></span></script></span></td>
		<td data-name="TidNo"<?php echo $view_lab_services_auth->TidNo->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_TidNo" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_TidNo">
<span<?php echo $view_lab_services_auth->TidNo->viewAttributes() ?>>
<?php echo $view_lab_services_auth->TidNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->CId->Visible) { // CId ?>
	<tr id="r_CId">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_CId"><script id="tpc_view_lab_services_auth_CId" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->CId->caption() ?></span></script></span></td>
		<td data-name="CId"<?php echo $view_lab_services_auth->CId->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_CId" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_CId">
<span<?php echo $view_lab_services_auth->CId->viewAttributes() ?>>
<?php echo $view_lab_services_auth->CId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_PartnerName"><script id="tpc_view_lab_services_auth_PartnerName" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->PartnerName->caption() ?></span></script></span></td>
		<td data-name="PartnerName"<?php echo $view_lab_services_auth->PartnerName->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_PartnerName" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_PartnerName">
<span<?php echo $view_lab_services_auth->PartnerName->viewAttributes() ?>>
<?php echo $view_lab_services_auth->PartnerName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->PayerType->Visible) { // PayerType ?>
	<tr id="r_PayerType">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_PayerType"><script id="tpc_view_lab_services_auth_PayerType" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->PayerType->caption() ?></span></script></span></td>
		<td data-name="PayerType"<?php echo $view_lab_services_auth->PayerType->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_PayerType" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_PayerType">
<span<?php echo $view_lab_services_auth->PayerType->viewAttributes() ?>>
<?php echo $view_lab_services_auth->PayerType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->Dob->Visible) { // Dob ?>
	<tr id="r_Dob">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_Dob"><script id="tpc_view_lab_services_auth_Dob" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->Dob->caption() ?></span></script></span></td>
		<td data-name="Dob"<?php echo $view_lab_services_auth->Dob->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_Dob" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_Dob">
<span<?php echo $view_lab_services_auth->Dob->viewAttributes() ?>>
<?php echo $view_lab_services_auth->Dob->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->Currency->Visible) { // Currency ?>
	<tr id="r_Currency">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_Currency"><script id="tpc_view_lab_services_auth_Currency" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->Currency->caption() ?></span></script></span></td>
		<td data-name="Currency"<?php echo $view_lab_services_auth->Currency->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_Currency" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_Currency">
<span<?php echo $view_lab_services_auth->Currency->viewAttributes() ?>>
<?php echo $view_lab_services_auth->Currency->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<tr id="r_DiscountRemarks">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_DiscountRemarks"><script id="tpc_view_lab_services_auth_DiscountRemarks" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->DiscountRemarks->caption() ?></span></script></span></td>
		<td data-name="DiscountRemarks"<?php echo $view_lab_services_auth->DiscountRemarks->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_DiscountRemarks" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_DiscountRemarks">
<span<?php echo $view_lab_services_auth->DiscountRemarks->viewAttributes() ?>>
<?php echo $view_lab_services_auth->DiscountRemarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_Remarks"><script id="tpc_view_lab_services_auth_Remarks" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->Remarks->caption() ?></span></script></span></td>
		<td data-name="Remarks"<?php echo $view_lab_services_auth->Remarks->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_Remarks" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_Remarks">
<span<?php echo $view_lab_services_auth->Remarks->viewAttributes() ?>>
<?php echo $view_lab_services_auth->Remarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->PatId->Visible) { // PatId ?>
	<tr id="r_PatId">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_PatId"><script id="tpc_view_lab_services_auth_PatId" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->PatId->caption() ?></span></script></span></td>
		<td data-name="PatId"<?php echo $view_lab_services_auth->PatId->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_PatId" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_PatId">
<span<?php echo $view_lab_services_auth->PatId->viewAttributes() ?>>
<?php echo $view_lab_services_auth->PatId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->DrDepartment->Visible) { // DrDepartment ?>
	<tr id="r_DrDepartment">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_DrDepartment"><script id="tpc_view_lab_services_auth_DrDepartment" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->DrDepartment->caption() ?></span></script></span></td>
		<td data-name="DrDepartment"<?php echo $view_lab_services_auth->DrDepartment->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_DrDepartment" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_DrDepartment">
<span<?php echo $view_lab_services_auth->DrDepartment->viewAttributes() ?>>
<?php echo $view_lab_services_auth->DrDepartment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->RefferedBy->Visible) { // RefferedBy ?>
	<tr id="r_RefferedBy">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_RefferedBy"><script id="tpc_view_lab_services_auth_RefferedBy" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->RefferedBy->caption() ?></span></script></span></td>
		<td data-name="RefferedBy"<?php echo $view_lab_services_auth->RefferedBy->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_RefferedBy" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_RefferedBy">
<span<?php echo $view_lab_services_auth->RefferedBy->viewAttributes() ?>>
<?php echo $view_lab_services_auth->RefferedBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->BillNumber->Visible) { // BillNumber ?>
	<tr id="r_BillNumber">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_BillNumber"><script id="tpc_view_lab_services_auth_BillNumber" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->BillNumber->caption() ?></span></script></span></td>
		<td data-name="BillNumber"<?php echo $view_lab_services_auth->BillNumber->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_BillNumber" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_BillNumber">
<span<?php echo $view_lab_services_auth->BillNumber->viewAttributes() ?>>
<?php echo $view_lab_services_auth->BillNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->CardNumber->Visible) { // CardNumber ?>
	<tr id="r_CardNumber">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_CardNumber"><script id="tpc_view_lab_services_auth_CardNumber" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->CardNumber->caption() ?></span></script></span></td>
		<td data-name="CardNumber"<?php echo $view_lab_services_auth->CardNumber->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_CardNumber" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_CardNumber">
<span<?php echo $view_lab_services_auth->CardNumber->viewAttributes() ?>>
<?php echo $view_lab_services_auth->CardNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->BankName->Visible) { // BankName ?>
	<tr id="r_BankName">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_BankName"><script id="tpc_view_lab_services_auth_BankName" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->BankName->caption() ?></span></script></span></td>
		<td data-name="BankName"<?php echo $view_lab_services_auth->BankName->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_BankName" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_BankName">
<span<?php echo $view_lab_services_auth->BankName->viewAttributes() ?>>
<?php echo $view_lab_services_auth->BankName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->DrID->Visible) { // DrID ?>
	<tr id="r_DrID">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_DrID"><script id="tpc_view_lab_services_auth_DrID" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->DrID->caption() ?></span></script></span></td>
		<td data-name="DrID"<?php echo $view_lab_services_auth->DrID->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_DrID" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_DrID">
<span<?php echo $view_lab_services_auth->DrID->viewAttributes() ?>>
<?php echo $view_lab_services_auth->DrID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->LabTestReleased->Visible) { // LabTestReleased ?>
	<tr id="r_LabTestReleased">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_LabTestReleased"><script id="tpc_view_lab_services_auth_LabTestReleased" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->LabTestReleased->caption() ?></span></script></span></td>
		<td data-name="LabTestReleased"<?php echo $view_lab_services_auth->LabTestReleased->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_LabTestReleased" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_LabTestReleased">
<span<?php echo $view_lab_services_auth->LabTestReleased->viewAttributes() ?>>
<?php echo $view_lab_services_auth->LabTestReleased->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services_auth->BillStatus->Visible) { // BillStatus ?>
	<tr id="r_BillStatus">
		<td class="<?php echo $view_lab_services_auth_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_auth_BillStatus"><script id="tpc_view_lab_services_auth_BillStatus" class="view_lab_services_authview" type="text/html"><span><?php echo $view_lab_services_auth->BillStatus->caption() ?></span></script></span></td>
		<td data-name="BillStatus"<?php echo $view_lab_services_auth->BillStatus->cellAttributes() ?>>
<script id="tpx_view_lab_services_auth_BillStatus" class="view_lab_services_authview" type="text/html">
<span id="el_view_lab_services_auth_BillStatus">
<span<?php echo $view_lab_services_auth->BillStatus->viewAttributes() ?>>
<?php echo $view_lab_services_auth->BillStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_lab_services_authview" class="ew-custom-template"></div>
<script id="tpm_view_lab_services_authview" type="text/html">
<div id="ct_view_lab_services_auth_view"><style>
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

function convertToIndianCurrency($number) {
	$no = round($number);
	$decimal = round($number - ($no = floor($number)), 2) * 100;    
	$digits_length = strlen($no);    
	$i = 0;
	$str = array();
	$words = array(
		0 => '',
		1 => 'One',
		2 => 'Two',
		3 => 'Three',
		4 => 'Four',
		5 => 'Five',
		6 => 'Six',
		7 => 'Seven',
		8 => 'Eight',
		9 => 'Nine',
		10 => 'Ten',
		11 => 'Eleven',
		12 => 'Twelve',
		13 => 'Thirteen',
		14 => 'Fourteen',
		15 => 'Fifteen',
		16 => 'Sixteen',
		17 => 'Seventeen',
		18 => 'Eighteen',
		19 => 'Nineteen',
		20 => 'Twenty',
		30 => 'Thirty',
		40 => 'Forty',
		50 => 'Fifty',
		60 => 'Sixty',
		70 => 'Seventy',
		80 => 'Eighty',
		90 => 'Ninety');
	$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
	while ($i < $digits_length) {
		$divider = ($i == 2) ? 10 : 100;
		$number = floor($no % $divider);
		$no = floor($no / $divider);
		$i += $divider == 10 ? 1 : 2;
		if ($number) {
			$plural = (($counter = count($str)) && $number > 9) ? 's' : null;            
			$str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
		} else {
			$str [] = null;
		}  
	}
	$Rupees = implode(' ', array_reverse($str));
	$paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
	return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
}
			$invoiceId = $Page->id->CurrentValue;
			$patient_id = $Page->PatientId->CurrentValue;
					 $PatId = $Page->PatId->CurrentValue;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$PatId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $Patid =  $row["id"];
	 $PatientID =  $row["PatientID"];
	 $gender =  $row["gender"];
	 $dob =  $row["dob"];
	 $Age =  $row["Age"];
	 if($dob != null)
	 {
	 	$Age = $Age;
	 }
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
$aa = "ewbarcode.php?data=".$Page->id->CurrentValue."&encode=EAN-13&height=40&color=%23000000";
 ?>
<h2 align="center">PATIENT BILL OF SUPPLY</h2>
<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr><td  style="float:left;">PatientId: <?php echo $PatientID; ?> </td><td  style="float: right;">Bill No: {{:BillNumber}}</td></tr>
		<tr><td  style="float:left;">Patient Name: {{:PatientName}}</td><td  style="float: right;">Bill Date:<?php echo date("d-m-Y", strtotime($Page->createddatetime->CurrentValue)); ?></td></tr>
		<tr><td  style="float:left;"> Age: <?php echo $Age; ?> </td><td  style="float: right;">Consultant: {{:Doctor}}</td></tr>
		<tr><td  style="float:left;width:50%;">Gender: <?php echo $gender; ?> </td><td  style="float: right;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td></tr>
		<tr><td  style="float:left;width:50%;">Address: <?php echo $address; ?> </td><td  style="float: right;"></td></tr>
	</tbody>
</table>
	</font>
		<font size="4" >
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td><b>Description</b></td>
<td><b>Item Code</b></td>
<td><b>Qty</b></td>
<td><b>Rate</b></td>
<td><b align="right">Amount</b></td>
</tr>
							 <?php
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_services where Vid='".$invoiceId."'  and TestType != 'ProfileSubTest';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Services"];
				$ItemCode =  $row["ItemCode"];
				$Qty = 1; //$row["Services"];
				$Rate =  $row["amount"];
				$SubTotal =  $row["SubTotal"];
				$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td></td><td align="right">Total</td><td align="right">'.$Page->Amount->CurrentValue.'</td></tr>  ';
echo $hhh;
$tt = "ewbarcode.php?data=".$Page->BillNumber->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
?>		
</table> 
<br><br>
<img src='<?php echo $tt; ?>' alt style="border: 0;">
<p align="right">Signature<p>
	  </font>
</div>
</script>
<?php
	if (in_array("view_lab_resultreleased_auth", explode(",", $view_lab_services_auth->getCurrentDetailTable())) && $view_lab_resultreleased_auth->DetailView) {
?>
<?php if ($view_lab_services_auth->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("view_lab_resultreleased_auth", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_lab_resultreleased_authgrid.php" ?>
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_lab_services_auth->Rows) ?> };
ew.applyTemplate("tpd_view_lab_services_authview", "tpm_view_lab_services_authview", "view_lab_services_authview", "<?php echo $view_lab_services_auth->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_lab_services_authview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_lab_services_auth_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_lab_services_auth->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_lab_services_auth_view->terminate();
?>
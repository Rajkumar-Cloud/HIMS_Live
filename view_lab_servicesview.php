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
$view_lab_services_view = new view_lab_services_view();

// Run the page
$view_lab_services_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_services_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_lab_services->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_lab_servicesview = currentForm = new ew.Form("fview_lab_servicesview", "view");

// Form_CustomValidate event
fview_lab_servicesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_servicesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_lab_servicesview.lists["x_HospID"] = <?php echo $view_lab_services_view->HospID->Lookup->toClientList() ?>;
fview_lab_servicesview.lists["x_HospID"].options = <?php echo JsonEncode($view_lab_services_view->HospID->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_lab_services->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_lab_services_view->ExportOptions->render("body") ?>
<?php $view_lab_services_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_lab_services_view->showPageHeader(); ?>
<?php
$view_lab_services_view->showMessage();
?>
<form name="fview_lab_servicesview" id="fview_lab_servicesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_services_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_services_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_services">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_services_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_lab_services->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_id"><script id="tpc_view_lab_services_id" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $view_lab_services->id->cellAttributes() ?>>
<script id="tpx_view_lab_services_id" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_id">
<span<?php echo $view_lab_services->id->viewAttributes() ?>>
<?php echo $view_lab_services->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->SID->Visible) { // SID ?>
	<tr id="r_SID">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_SID"><script id="tpc_view_lab_services_SID" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->SID->caption() ?></span></script></span></td>
		<td data-name="SID"<?php echo $view_lab_services->SID->cellAttributes() ?>>
<script id="tpx_view_lab_services_SID" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_SID">
<span<?php echo $view_lab_services->SID->viewAttributes() ?>>
<?php echo $view_lab_services->SID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_Reception"><script id="tpc_view_lab_services_Reception" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->Reception->caption() ?></span></script></span></td>
		<td data-name="Reception"<?php echo $view_lab_services->Reception->cellAttributes() ?>>
<script id="tpx_view_lab_services_Reception" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_Reception">
<span<?php echo $view_lab_services->Reception->viewAttributes() ?>>
<?php echo $view_lab_services->Reception->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_PatientId"><script id="tpc_view_lab_services_PatientId" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->PatientId->caption() ?></span></script></span></td>
		<td data-name="PatientId"<?php echo $view_lab_services->PatientId->cellAttributes() ?>>
<script id="tpx_view_lab_services_PatientId" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_PatientId">
<span<?php echo $view_lab_services->PatientId->viewAttributes() ?>>
<?php echo $view_lab_services->PatientId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_mrnno"><script id="tpc_view_lab_services_mrnno" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->mrnno->caption() ?></span></script></span></td>
		<td data-name="mrnno"<?php echo $view_lab_services->mrnno->cellAttributes() ?>>
<script id="tpx_view_lab_services_mrnno" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_mrnno">
<span<?php echo $view_lab_services->mrnno->viewAttributes() ?>>
<?php echo $view_lab_services->mrnno->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_PatientName"><script id="tpc_view_lab_services_PatientName" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->PatientName->caption() ?></span></script></span></td>
		<td data-name="PatientName"<?php echo $view_lab_services->PatientName->cellAttributes() ?>>
<script id="tpx_view_lab_services_PatientName" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_PatientName">
<span<?php echo $view_lab_services->PatientName->viewAttributes() ?>>
<?php echo $view_lab_services->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_Age"><script id="tpc_view_lab_services_Age" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $view_lab_services->Age->cellAttributes() ?>>
<script id="tpx_view_lab_services_Age" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_Age">
<span<?php echo $view_lab_services->Age->viewAttributes() ?>>
<?php echo $view_lab_services->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_Gender"><script id="tpc_view_lab_services_Gender" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->Gender->caption() ?></span></script></span></td>
		<td data-name="Gender"<?php echo $view_lab_services->Gender->cellAttributes() ?>>
<script id="tpx_view_lab_services_Gender" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_Gender">
<span<?php echo $view_lab_services->Gender->viewAttributes() ?>>
<?php echo $view_lab_services->Gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_profilePic"><script id="tpc_view_lab_services_profilePic" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->profilePic->caption() ?></span></script></span></td>
		<td data-name="profilePic"<?php echo $view_lab_services->profilePic->cellAttributes() ?>>
<script id="tpx_view_lab_services_profilePic" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_profilePic">
<span<?php echo $view_lab_services->profilePic->viewAttributes() ?>>
<?php echo $view_lab_services->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->Mobile->Visible) { // Mobile ?>
	<tr id="r_Mobile">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_Mobile"><script id="tpc_view_lab_services_Mobile" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->Mobile->caption() ?></span></script></span></td>
		<td data-name="Mobile"<?php echo $view_lab_services->Mobile->cellAttributes() ?>>
<script id="tpx_view_lab_services_Mobile" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_Mobile">
<span<?php echo $view_lab_services->Mobile->viewAttributes() ?>>
<?php echo $view_lab_services->Mobile->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->IP_OP->Visible) { // IP_OP ?>
	<tr id="r_IP_OP">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_IP_OP"><script id="tpc_view_lab_services_IP_OP" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->IP_OP->caption() ?></span></script></span></td>
		<td data-name="IP_OP"<?php echo $view_lab_services->IP_OP->cellAttributes() ?>>
<script id="tpx_view_lab_services_IP_OP" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_IP_OP">
<span<?php echo $view_lab_services->IP_OP->viewAttributes() ?>>
<?php echo $view_lab_services->IP_OP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->Doctor->Visible) { // Doctor ?>
	<tr id="r_Doctor">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_Doctor"><script id="tpc_view_lab_services_Doctor" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->Doctor->caption() ?></span></script></span></td>
		<td data-name="Doctor"<?php echo $view_lab_services->Doctor->cellAttributes() ?>>
<script id="tpx_view_lab_services_Doctor" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_Doctor">
<span<?php echo $view_lab_services->Doctor->viewAttributes() ?>>
<?php echo $view_lab_services->Doctor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->voucher_type->Visible) { // voucher_type ?>
	<tr id="r_voucher_type">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_voucher_type"><script id="tpc_view_lab_services_voucher_type" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->voucher_type->caption() ?></span></script></span></td>
		<td data-name="voucher_type"<?php echo $view_lab_services->voucher_type->cellAttributes() ?>>
<script id="tpx_view_lab_services_voucher_type" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_voucher_type">
<span<?php echo $view_lab_services->voucher_type->viewAttributes() ?>>
<?php echo $view_lab_services->voucher_type->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_Details"><script id="tpc_view_lab_services_Details" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->Details->caption() ?></span></script></span></td>
		<td data-name="Details"<?php echo $view_lab_services->Details->cellAttributes() ?>>
<script id="tpx_view_lab_services_Details" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_Details">
<span<?php echo $view_lab_services->Details->viewAttributes() ?>>
<?php echo $view_lab_services->Details->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->ModeofPayment->Visible) { // ModeofPayment ?>
	<tr id="r_ModeofPayment">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_ModeofPayment"><script id="tpc_view_lab_services_ModeofPayment" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->ModeofPayment->caption() ?></span></script></span></td>
		<td data-name="ModeofPayment"<?php echo $view_lab_services->ModeofPayment->cellAttributes() ?>>
<script id="tpx_view_lab_services_ModeofPayment" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_ModeofPayment">
<span<?php echo $view_lab_services->ModeofPayment->viewAttributes() ?>>
<?php echo $view_lab_services->ModeofPayment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_Amount"><script id="tpc_view_lab_services_Amount" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->Amount->caption() ?></span></script></span></td>
		<td data-name="Amount"<?php echo $view_lab_services->Amount->cellAttributes() ?>>
<script id="tpx_view_lab_services_Amount" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_Amount">
<span<?php echo $view_lab_services->Amount->viewAttributes() ?>>
<?php echo $view_lab_services->Amount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->AnyDues->Visible) { // AnyDues ?>
	<tr id="r_AnyDues">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_AnyDues"><script id="tpc_view_lab_services_AnyDues" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->AnyDues->caption() ?></span></script></span></td>
		<td data-name="AnyDues"<?php echo $view_lab_services->AnyDues->cellAttributes() ?>>
<script id="tpx_view_lab_services_AnyDues" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_AnyDues">
<span<?php echo $view_lab_services->AnyDues->viewAttributes() ?>>
<?php echo $view_lab_services->AnyDues->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_createdby"><script id="tpc_view_lab_services_createdby" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $view_lab_services->createdby->cellAttributes() ?>>
<script id="tpx_view_lab_services_createdby" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_createdby">
<span<?php echo $view_lab_services->createdby->viewAttributes() ?>>
<?php echo $view_lab_services->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_createddatetime"><script id="tpc_view_lab_services_createddatetime" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $view_lab_services->createddatetime->cellAttributes() ?>>
<script id="tpx_view_lab_services_createddatetime" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_createddatetime">
<span<?php echo $view_lab_services->createddatetime->viewAttributes() ?>>
<?php echo $view_lab_services->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_modifiedby"><script id="tpc_view_lab_services_modifiedby" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $view_lab_services->modifiedby->cellAttributes() ?>>
<script id="tpx_view_lab_services_modifiedby" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_modifiedby">
<span<?php echo $view_lab_services->modifiedby->viewAttributes() ?>>
<?php echo $view_lab_services->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_modifieddatetime"><script id="tpc_view_lab_services_modifieddatetime" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $view_lab_services->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_lab_services_modifieddatetime" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_modifieddatetime">
<span<?php echo $view_lab_services->modifieddatetime->viewAttributes() ?>>
<?php echo $view_lab_services->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->RealizationAmount->Visible) { // RealizationAmount ?>
	<tr id="r_RealizationAmount">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_RealizationAmount"><script id="tpc_view_lab_services_RealizationAmount" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->RealizationAmount->caption() ?></span></script></span></td>
		<td data-name="RealizationAmount"<?php echo $view_lab_services->RealizationAmount->cellAttributes() ?>>
<script id="tpx_view_lab_services_RealizationAmount" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_RealizationAmount">
<span<?php echo $view_lab_services->RealizationAmount->viewAttributes() ?>>
<?php echo $view_lab_services->RealizationAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->RealizationStatus->Visible) { // RealizationStatus ?>
	<tr id="r_RealizationStatus">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_RealizationStatus"><script id="tpc_view_lab_services_RealizationStatus" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->RealizationStatus->caption() ?></span></script></span></td>
		<td data-name="RealizationStatus"<?php echo $view_lab_services->RealizationStatus->cellAttributes() ?>>
<script id="tpx_view_lab_services_RealizationStatus" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_RealizationStatus">
<span<?php echo $view_lab_services->RealizationStatus->viewAttributes() ?>>
<?php echo $view_lab_services->RealizationStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<tr id="r_RealizationRemarks">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_RealizationRemarks"><script id="tpc_view_lab_services_RealizationRemarks" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->RealizationRemarks->caption() ?></span></script></span></td>
		<td data-name="RealizationRemarks"<?php echo $view_lab_services->RealizationRemarks->cellAttributes() ?>>
<script id="tpx_view_lab_services_RealizationRemarks" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_RealizationRemarks">
<span<?php echo $view_lab_services->RealizationRemarks->viewAttributes() ?>>
<?php echo $view_lab_services->RealizationRemarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<tr id="r_RealizationBatchNo">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_RealizationBatchNo"><script id="tpc_view_lab_services_RealizationBatchNo" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->RealizationBatchNo->caption() ?></span></script></span></td>
		<td data-name="RealizationBatchNo"<?php echo $view_lab_services->RealizationBatchNo->cellAttributes() ?>>
<script id="tpx_view_lab_services_RealizationBatchNo" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_RealizationBatchNo">
<span<?php echo $view_lab_services->RealizationBatchNo->viewAttributes() ?>>
<?php echo $view_lab_services->RealizationBatchNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->RealizationDate->Visible) { // RealizationDate ?>
	<tr id="r_RealizationDate">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_RealizationDate"><script id="tpc_view_lab_services_RealizationDate" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->RealizationDate->caption() ?></span></script></span></td>
		<td data-name="RealizationDate"<?php echo $view_lab_services->RealizationDate->cellAttributes() ?>>
<script id="tpx_view_lab_services_RealizationDate" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_RealizationDate">
<span<?php echo $view_lab_services->RealizationDate->viewAttributes() ?>>
<?php echo $view_lab_services->RealizationDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_HospID"><script id="tpc_view_lab_services_HospID" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $view_lab_services->HospID->cellAttributes() ?>>
<script id="tpx_view_lab_services_HospID" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_HospID">
<span<?php echo $view_lab_services->HospID->viewAttributes() ?>>
<?php echo $view_lab_services->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_RIDNO"><script id="tpc_view_lab_services_RIDNO" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->RIDNO->caption() ?></span></script></span></td>
		<td data-name="RIDNO"<?php echo $view_lab_services->RIDNO->cellAttributes() ?>>
<script id="tpx_view_lab_services_RIDNO" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_RIDNO">
<span<?php echo $view_lab_services->RIDNO->viewAttributes() ?>>
<?php echo $view_lab_services->RIDNO->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_TidNo"><script id="tpc_view_lab_services_TidNo" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->TidNo->caption() ?></span></script></span></td>
		<td data-name="TidNo"<?php echo $view_lab_services->TidNo->cellAttributes() ?>>
<script id="tpx_view_lab_services_TidNo" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_TidNo">
<span<?php echo $view_lab_services->TidNo->viewAttributes() ?>>
<?php echo $view_lab_services->TidNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->CId->Visible) { // CId ?>
	<tr id="r_CId">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_CId"><script id="tpc_view_lab_services_CId" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->CId->caption() ?></span></script></span></td>
		<td data-name="CId"<?php echo $view_lab_services->CId->cellAttributes() ?>>
<script id="tpx_view_lab_services_CId" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_CId">
<span<?php echo $view_lab_services->CId->viewAttributes() ?>>
<?php echo $view_lab_services->CId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_PartnerName"><script id="tpc_view_lab_services_PartnerName" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->PartnerName->caption() ?></span></script></span></td>
		<td data-name="PartnerName"<?php echo $view_lab_services->PartnerName->cellAttributes() ?>>
<script id="tpx_view_lab_services_PartnerName" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_PartnerName">
<span<?php echo $view_lab_services->PartnerName->viewAttributes() ?>>
<?php echo $view_lab_services->PartnerName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->PayerType->Visible) { // PayerType ?>
	<tr id="r_PayerType">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_PayerType"><script id="tpc_view_lab_services_PayerType" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->PayerType->caption() ?></span></script></span></td>
		<td data-name="PayerType"<?php echo $view_lab_services->PayerType->cellAttributes() ?>>
<script id="tpx_view_lab_services_PayerType" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_PayerType">
<span<?php echo $view_lab_services->PayerType->viewAttributes() ?>>
<?php echo $view_lab_services->PayerType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->Dob->Visible) { // Dob ?>
	<tr id="r_Dob">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_Dob"><script id="tpc_view_lab_services_Dob" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->Dob->caption() ?></span></script></span></td>
		<td data-name="Dob"<?php echo $view_lab_services->Dob->cellAttributes() ?>>
<script id="tpx_view_lab_services_Dob" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_Dob">
<span<?php echo $view_lab_services->Dob->viewAttributes() ?>>
<?php echo $view_lab_services->Dob->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->Currency->Visible) { // Currency ?>
	<tr id="r_Currency">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_Currency"><script id="tpc_view_lab_services_Currency" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->Currency->caption() ?></span></script></span></td>
		<td data-name="Currency"<?php echo $view_lab_services->Currency->cellAttributes() ?>>
<script id="tpx_view_lab_services_Currency" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_Currency">
<span<?php echo $view_lab_services->Currency->viewAttributes() ?>>
<?php echo $view_lab_services->Currency->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<tr id="r_DiscountRemarks">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_DiscountRemarks"><script id="tpc_view_lab_services_DiscountRemarks" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->DiscountRemarks->caption() ?></span></script></span></td>
		<td data-name="DiscountRemarks"<?php echo $view_lab_services->DiscountRemarks->cellAttributes() ?>>
<script id="tpx_view_lab_services_DiscountRemarks" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_DiscountRemarks">
<span<?php echo $view_lab_services->DiscountRemarks->viewAttributes() ?>>
<?php echo $view_lab_services->DiscountRemarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_Remarks"><script id="tpc_view_lab_services_Remarks" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->Remarks->caption() ?></span></script></span></td>
		<td data-name="Remarks"<?php echo $view_lab_services->Remarks->cellAttributes() ?>>
<script id="tpx_view_lab_services_Remarks" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_Remarks">
<span<?php echo $view_lab_services->Remarks->viewAttributes() ?>>
<?php echo $view_lab_services->Remarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->PatId->Visible) { // PatId ?>
	<tr id="r_PatId">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_PatId"><script id="tpc_view_lab_services_PatId" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->PatId->caption() ?></span></script></span></td>
		<td data-name="PatId"<?php echo $view_lab_services->PatId->cellAttributes() ?>>
<script id="tpx_view_lab_services_PatId" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_PatId">
<span<?php echo $view_lab_services->PatId->viewAttributes() ?>>
<?php echo $view_lab_services->PatId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->DrDepartment->Visible) { // DrDepartment ?>
	<tr id="r_DrDepartment">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_DrDepartment"><script id="tpc_view_lab_services_DrDepartment" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->DrDepartment->caption() ?></span></script></span></td>
		<td data-name="DrDepartment"<?php echo $view_lab_services->DrDepartment->cellAttributes() ?>>
<script id="tpx_view_lab_services_DrDepartment" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_DrDepartment">
<span<?php echo $view_lab_services->DrDepartment->viewAttributes() ?>>
<?php echo $view_lab_services->DrDepartment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->RefferedBy->Visible) { // RefferedBy ?>
	<tr id="r_RefferedBy">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_RefferedBy"><script id="tpc_view_lab_services_RefferedBy" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->RefferedBy->caption() ?></span></script></span></td>
		<td data-name="RefferedBy"<?php echo $view_lab_services->RefferedBy->cellAttributes() ?>>
<script id="tpx_view_lab_services_RefferedBy" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_RefferedBy">
<span<?php echo $view_lab_services->RefferedBy->viewAttributes() ?>>
<?php echo $view_lab_services->RefferedBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->BillNumber->Visible) { // BillNumber ?>
	<tr id="r_BillNumber">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_BillNumber"><script id="tpc_view_lab_services_BillNumber" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->BillNumber->caption() ?></span></script></span></td>
		<td data-name="BillNumber"<?php echo $view_lab_services->BillNumber->cellAttributes() ?>>
<script id="tpx_view_lab_services_BillNumber" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_BillNumber">
<span<?php echo $view_lab_services->BillNumber->viewAttributes() ?>>
<?php echo $view_lab_services->BillNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->CardNumber->Visible) { // CardNumber ?>
	<tr id="r_CardNumber">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_CardNumber"><script id="tpc_view_lab_services_CardNumber" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->CardNumber->caption() ?></span></script></span></td>
		<td data-name="CardNumber"<?php echo $view_lab_services->CardNumber->cellAttributes() ?>>
<script id="tpx_view_lab_services_CardNumber" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_CardNumber">
<span<?php echo $view_lab_services->CardNumber->viewAttributes() ?>>
<?php echo $view_lab_services->CardNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->BankName->Visible) { // BankName ?>
	<tr id="r_BankName">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_BankName"><script id="tpc_view_lab_services_BankName" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->BankName->caption() ?></span></script></span></td>
		<td data-name="BankName"<?php echo $view_lab_services->BankName->cellAttributes() ?>>
<script id="tpx_view_lab_services_BankName" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_BankName">
<span<?php echo $view_lab_services->BankName->viewAttributes() ?>>
<?php echo $view_lab_services->BankName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->DrID->Visible) { // DrID ?>
	<tr id="r_DrID">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_DrID"><script id="tpc_view_lab_services_DrID" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->DrID->caption() ?></span></script></span></td>
		<td data-name="DrID"<?php echo $view_lab_services->DrID->cellAttributes() ?>>
<script id="tpx_view_lab_services_DrID" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_DrID">
<span<?php echo $view_lab_services->DrID->viewAttributes() ?>>
<?php echo $view_lab_services->DrID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->BillStatus->Visible) { // BillStatus ?>
	<tr id="r_BillStatus">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_BillStatus"><script id="tpc_view_lab_services_BillStatus" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->BillStatus->caption() ?></span></script></span></td>
		<td data-name="BillStatus"<?php echo $view_lab_services->BillStatus->cellAttributes() ?>>
<script id="tpx_view_lab_services_BillStatus" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_BillStatus">
<span<?php echo $view_lab_services->BillStatus->viewAttributes() ?>>
<?php echo $view_lab_services->BillStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_services->LabTestReleased->Visible) { // LabTestReleased ?>
	<tr id="r_LabTestReleased">
		<td class="<?php echo $view_lab_services_view->TableLeftColumnClass ?>"><span id="elh_view_lab_services_LabTestReleased"><script id="tpc_view_lab_services_LabTestReleased" class="view_lab_servicesview" type="text/html"><span><?php echo $view_lab_services->LabTestReleased->caption() ?></span></script></span></td>
		<td data-name="LabTestReleased"<?php echo $view_lab_services->LabTestReleased->cellAttributes() ?>>
<script id="tpx_view_lab_services_LabTestReleased" class="view_lab_servicesview" type="text/html">
<span id="el_view_lab_services_LabTestReleased">
<span<?php echo $view_lab_services->LabTestReleased->viewAttributes() ?>>
<?php echo $view_lab_services->LabTestReleased->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_lab_servicesview" class="ew-custom-template"></div>
<script id="tpm_view_lab_servicesview" type="text/html">
<div id="ct_view_lab_services_view"><style>
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
	if (in_array("view_lab_resultreleased", explode(",", $view_lab_services->getCurrentDetailTable())) && $view_lab_resultreleased->DetailView) {
?>
<?php if ($view_lab_services->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("view_lab_resultreleased", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "view_lab_resultreleasedgrid.php" ?>
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_lab_services->Rows) ?> };
ew.applyTemplate("tpd_view_lab_servicesview", "tpm_view_lab_servicesview", "view_lab_servicesview", "<?php echo $view_lab_services->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_lab_servicesview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_lab_services_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_lab_services->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_lab_services_view->terminate();
?>
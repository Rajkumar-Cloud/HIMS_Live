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
$view_ip_af_billing_view = new view_ip_af_billing_view();

// Run the page
$view_ip_af_billing_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_ip_af_billing_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_ip_af_billing->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_ip_af_billingview = currentForm = new ew.Form("fview_ip_af_billingview", "view");

// Form_CustomValidate event
fview_ip_af_billingview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_ip_af_billingview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_ip_af_billing->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_ip_af_billing_view->ExportOptions->render("body") ?>
<?php $view_ip_af_billing_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_ip_af_billing_view->showPageHeader(); ?>
<?php
$view_ip_af_billing_view->showMessage();
?>
<form name="fview_ip_af_billingview" id="fview_ip_af_billingview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_ip_af_billing_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_ip_af_billing_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_ip_af_billing">
<input type="hidden" name="modal" value="<?php echo (int)$view_ip_af_billing_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_ip_af_billing->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_id"><script id="tpc_view_ip_af_billing_id" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $view_ip_af_billing->id->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_id" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_id">
<span<?php echo $view_ip_af_billing->id->viewAttributes() ?>>
<?php echo $view_ip_af_billing->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_mrnno"><script id="tpc_view_ip_af_billing_mrnno" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->mrnno->caption() ?></span></script></span></td>
		<td data-name="mrnno"<?php echo $view_ip_af_billing->mrnno->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_mrnno" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_mrnno">
<span<?php echo $view_ip_af_billing->mrnno->viewAttributes() ?>>
<?php echo $view_ip_af_billing->mrnno->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_profilePic"><script id="tpc_view_ip_af_billing_profilePic" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->profilePic->caption() ?></span></script></span></td>
		<td data-name="profilePic"<?php echo $view_ip_af_billing->profilePic->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_profilePic" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_profilePic">
<span<?php echo $view_ip_af_billing->profilePic->viewAttributes() ?>>
<?php echo $view_ip_af_billing->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Gender"><script id="tpc_view_ip_af_billing_Gender" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->Gender->caption() ?></span></script></span></td>
		<td data-name="Gender"<?php echo $view_ip_af_billing->Gender->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_Gender" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_Gender">
<span<?php echo $view_ip_af_billing->Gender->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Age"><script id="tpc_view_ip_af_billing_Age" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $view_ip_af_billing->Age->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_Age" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_Age">
<span<?php echo $view_ip_af_billing->Age->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_createdby"><script id="tpc_view_ip_af_billing_createdby" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $view_ip_af_billing->createdby->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_createdby" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_createdby">
<span<?php echo $view_ip_af_billing->createdby->viewAttributes() ?>>
<?php echo $view_ip_af_billing->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_createddatetime"><script id="tpc_view_ip_af_billing_createddatetime" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $view_ip_af_billing->createddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_createddatetime" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_createddatetime">
<span<?php echo $view_ip_af_billing->createddatetime->viewAttributes() ?>>
<?php echo $view_ip_af_billing->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_modifiedby"><script id="tpc_view_ip_af_billing_modifiedby" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $view_ip_af_billing->modifiedby->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_modifiedby" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_modifiedby">
<span<?php echo $view_ip_af_billing->modifiedby->viewAttributes() ?>>
<?php echo $view_ip_af_billing->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_modifieddatetime"><script id="tpc_view_ip_af_billing_modifieddatetime" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $view_ip_af_billing->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_modifieddatetime" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_modifieddatetime">
<span<?php echo $view_ip_af_billing->modifieddatetime->viewAttributes() ?>>
<?php echo $view_ip_af_billing->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_PatientId"><script id="tpc_view_ip_af_billing_PatientId" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->PatientId->caption() ?></span></script></span></td>
		<td data-name="PatientId"<?php echo $view_ip_af_billing->PatientId->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_PatientId" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_PatientId">
<span<?php echo $view_ip_af_billing->PatientId->viewAttributes() ?>>
<?php echo $view_ip_af_billing->PatientId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_HospID"><script id="tpc_view_ip_af_billing_HospID" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $view_ip_af_billing->HospID->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_HospID" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_HospID">
<span<?php echo $view_ip_af_billing->HospID->viewAttributes() ?>>
<?php echo $view_ip_af_billing->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->BillNumber->Visible) { // BillNumber ?>
	<tr id="r_BillNumber">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_BillNumber"><script id="tpc_view_ip_af_billing_BillNumber" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->BillNumber->caption() ?></span></script></span></td>
		<td data-name="BillNumber"<?php echo $view_ip_af_billing->BillNumber->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_BillNumber" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_BillNumber">
<span<?php echo $view_ip_af_billing->BillNumber->viewAttributes() ?>>
<?php echo $view_ip_af_billing->BillNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->ReportHeader->Visible) { // ReportHeader ?>
	<tr id="r_ReportHeader">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_ReportHeader"><script id="tpc_view_ip_af_billing_ReportHeader" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->ReportHeader->caption() ?></span></script></span></td>
		<td data-name="ReportHeader"<?php echo $view_ip_af_billing->ReportHeader->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_ReportHeader" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_ReportHeader">
<span<?php echo $view_ip_af_billing->ReportHeader->viewAttributes() ?>>
<?php echo $view_ip_af_billing->ReportHeader->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Reception"><script id="tpc_view_ip_af_billing_Reception" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->Reception->caption() ?></span></script></span></td>
		<td data-name="Reception"<?php echo $view_ip_af_billing->Reception->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_Reception" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_Reception">
<span<?php echo $view_ip_af_billing->Reception->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Reception->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_PatientName"><script id="tpc_view_ip_af_billing_PatientName" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->PatientName->caption() ?></span></script></span></td>
		<td data-name="PatientName"<?php echo $view_ip_af_billing->PatientName->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_PatientName" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_PatientName">
<span<?php echo $view_ip_af_billing->PatientName->viewAttributes() ?>>
<?php echo $view_ip_af_billing->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->Mobile->Visible) { // Mobile ?>
	<tr id="r_Mobile">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Mobile"><script id="tpc_view_ip_af_billing_Mobile" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->Mobile->caption() ?></span></script></span></td>
		<td data-name="Mobile"<?php echo $view_ip_af_billing->Mobile->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_Mobile" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_Mobile">
<span<?php echo $view_ip_af_billing->Mobile->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Mobile->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->IP_OP->Visible) { // IP_OP ?>
	<tr id="r_IP_OP">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_IP_OP"><script id="tpc_view_ip_af_billing_IP_OP" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->IP_OP->caption() ?></span></script></span></td>
		<td data-name="IP_OP"<?php echo $view_ip_af_billing->IP_OP->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_IP_OP" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_IP_OP">
<span<?php echo $view_ip_af_billing->IP_OP->viewAttributes() ?>>
<?php echo $view_ip_af_billing->IP_OP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->Doctor->Visible) { // Doctor ?>
	<tr id="r_Doctor">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Doctor"><script id="tpc_view_ip_af_billing_Doctor" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->Doctor->caption() ?></span></script></span></td>
		<td data-name="Doctor"<?php echo $view_ip_af_billing->Doctor->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_Doctor" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_Doctor">
<span<?php echo $view_ip_af_billing->Doctor->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Doctor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->voucher_type->Visible) { // voucher_type ?>
	<tr id="r_voucher_type">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_voucher_type"><script id="tpc_view_ip_af_billing_voucher_type" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->voucher_type->caption() ?></span></script></span></td>
		<td data-name="voucher_type"<?php echo $view_ip_af_billing->voucher_type->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_voucher_type" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_voucher_type">
<span<?php echo $view_ip_af_billing->voucher_type->viewAttributes() ?>>
<?php echo $view_ip_af_billing->voucher_type->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Details"><script id="tpc_view_ip_af_billing_Details" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->Details->caption() ?></span></script></span></td>
		<td data-name="Details"<?php echo $view_ip_af_billing->Details->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_Details" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_Details">
<span<?php echo $view_ip_af_billing->Details->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Details->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->ModeofPayment->Visible) { // ModeofPayment ?>
	<tr id="r_ModeofPayment">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_ModeofPayment"><script id="tpc_view_ip_af_billing_ModeofPayment" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->ModeofPayment->caption() ?></span></script></span></td>
		<td data-name="ModeofPayment"<?php echo $view_ip_af_billing->ModeofPayment->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_ModeofPayment" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_ModeofPayment">
<span<?php echo $view_ip_af_billing->ModeofPayment->viewAttributes() ?>>
<?php echo $view_ip_af_billing->ModeofPayment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Amount"><script id="tpc_view_ip_af_billing_Amount" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->Amount->caption() ?></span></script></span></td>
		<td data-name="Amount"<?php echo $view_ip_af_billing->Amount->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_Amount" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_Amount">
<span<?php echo $view_ip_af_billing->Amount->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Amount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->AnyDues->Visible) { // AnyDues ?>
	<tr id="r_AnyDues">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_AnyDues"><script id="tpc_view_ip_af_billing_AnyDues" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->AnyDues->caption() ?></span></script></span></td>
		<td data-name="AnyDues"<?php echo $view_ip_af_billing->AnyDues->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_AnyDues" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_AnyDues">
<span<?php echo $view_ip_af_billing->AnyDues->viewAttributes() ?>>
<?php echo $view_ip_af_billing->AnyDues->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->RealizationAmount->Visible) { // RealizationAmount ?>
	<tr id="r_RealizationAmount">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_RealizationAmount"><script id="tpc_view_ip_af_billing_RealizationAmount" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->RealizationAmount->caption() ?></span></script></span></td>
		<td data-name="RealizationAmount"<?php echo $view_ip_af_billing->RealizationAmount->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_RealizationAmount" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_RealizationAmount">
<span<?php echo $view_ip_af_billing->RealizationAmount->viewAttributes() ?>>
<?php echo $view_ip_af_billing->RealizationAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->RealizationStatus->Visible) { // RealizationStatus ?>
	<tr id="r_RealizationStatus">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_RealizationStatus"><script id="tpc_view_ip_af_billing_RealizationStatus" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->RealizationStatus->caption() ?></span></script></span></td>
		<td data-name="RealizationStatus"<?php echo $view_ip_af_billing->RealizationStatus->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_RealizationStatus" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_RealizationStatus">
<span<?php echo $view_ip_af_billing->RealizationStatus->viewAttributes() ?>>
<?php echo $view_ip_af_billing->RealizationStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<tr id="r_RealizationRemarks">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_RealizationRemarks"><script id="tpc_view_ip_af_billing_RealizationRemarks" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->RealizationRemarks->caption() ?></span></script></span></td>
		<td data-name="RealizationRemarks"<?php echo $view_ip_af_billing->RealizationRemarks->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_RealizationRemarks" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_RealizationRemarks">
<span<?php echo $view_ip_af_billing->RealizationRemarks->viewAttributes() ?>>
<?php echo $view_ip_af_billing->RealizationRemarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<tr id="r_RealizationBatchNo">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_RealizationBatchNo"><script id="tpc_view_ip_af_billing_RealizationBatchNo" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->RealizationBatchNo->caption() ?></span></script></span></td>
		<td data-name="RealizationBatchNo"<?php echo $view_ip_af_billing->RealizationBatchNo->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_RealizationBatchNo" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_RealizationBatchNo">
<span<?php echo $view_ip_af_billing->RealizationBatchNo->viewAttributes() ?>>
<?php echo $view_ip_af_billing->RealizationBatchNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->RealizationDate->Visible) { // RealizationDate ?>
	<tr id="r_RealizationDate">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_RealizationDate"><script id="tpc_view_ip_af_billing_RealizationDate" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->RealizationDate->caption() ?></span></script></span></td>
		<td data-name="RealizationDate"<?php echo $view_ip_af_billing->RealizationDate->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_RealizationDate" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_RealizationDate">
<span<?php echo $view_ip_af_billing->RealizationDate->viewAttributes() ?>>
<?php echo $view_ip_af_billing->RealizationDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_RIDNO"><script id="tpc_view_ip_af_billing_RIDNO" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->RIDNO->caption() ?></span></script></span></td>
		<td data-name="RIDNO"<?php echo $view_ip_af_billing->RIDNO->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_RIDNO" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_RIDNO">
<span<?php echo $view_ip_af_billing->RIDNO->viewAttributes() ?>>
<?php echo $view_ip_af_billing->RIDNO->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_TidNo"><script id="tpc_view_ip_af_billing_TidNo" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->TidNo->caption() ?></span></script></span></td>
		<td data-name="TidNo"<?php echo $view_ip_af_billing->TidNo->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_TidNo" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_TidNo">
<span<?php echo $view_ip_af_billing->TidNo->viewAttributes() ?>>
<?php echo $view_ip_af_billing->TidNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->CId->Visible) { // CId ?>
	<tr id="r_CId">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_CId"><script id="tpc_view_ip_af_billing_CId" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->CId->caption() ?></span></script></span></td>
		<td data-name="CId"<?php echo $view_ip_af_billing->CId->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_CId" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_CId">
<span<?php echo $view_ip_af_billing->CId->viewAttributes() ?>>
<?php echo $view_ip_af_billing->CId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_PartnerName"><script id="tpc_view_ip_af_billing_PartnerName" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->PartnerName->caption() ?></span></script></span></td>
		<td data-name="PartnerName"<?php echo $view_ip_af_billing->PartnerName->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_PartnerName" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_PartnerName">
<span<?php echo $view_ip_af_billing->PartnerName->viewAttributes() ?>>
<?php echo $view_ip_af_billing->PartnerName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->PayerType->Visible) { // PayerType ?>
	<tr id="r_PayerType">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_PayerType"><script id="tpc_view_ip_af_billing_PayerType" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->PayerType->caption() ?></span></script></span></td>
		<td data-name="PayerType"<?php echo $view_ip_af_billing->PayerType->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_PayerType" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_PayerType">
<span<?php echo $view_ip_af_billing->PayerType->viewAttributes() ?>>
<?php echo $view_ip_af_billing->PayerType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->Dob->Visible) { // Dob ?>
	<tr id="r_Dob">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Dob"><script id="tpc_view_ip_af_billing_Dob" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->Dob->caption() ?></span></script></span></td>
		<td data-name="Dob"<?php echo $view_ip_af_billing->Dob->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_Dob" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_Dob">
<span<?php echo $view_ip_af_billing->Dob->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Dob->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->Currency->Visible) { // Currency ?>
	<tr id="r_Currency">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Currency"><script id="tpc_view_ip_af_billing_Currency" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->Currency->caption() ?></span></script></span></td>
		<td data-name="Currency"<?php echo $view_ip_af_billing->Currency->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_Currency" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_Currency">
<span<?php echo $view_ip_af_billing->Currency->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Currency->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<tr id="r_DiscountRemarks">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_DiscountRemarks"><script id="tpc_view_ip_af_billing_DiscountRemarks" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->DiscountRemarks->caption() ?></span></script></span></td>
		<td data-name="DiscountRemarks"<?php echo $view_ip_af_billing->DiscountRemarks->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_DiscountRemarks" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_DiscountRemarks">
<span<?php echo $view_ip_af_billing->DiscountRemarks->viewAttributes() ?>>
<?php echo $view_ip_af_billing->DiscountRemarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Remarks"><script id="tpc_view_ip_af_billing_Remarks" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->Remarks->caption() ?></span></script></span></td>
		<td data-name="Remarks"<?php echo $view_ip_af_billing->Remarks->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_Remarks" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_Remarks">
<span<?php echo $view_ip_af_billing->Remarks->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Remarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->PatId->Visible) { // PatId ?>
	<tr id="r_PatId">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_PatId"><script id="tpc_view_ip_af_billing_PatId" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->PatId->caption() ?></span></script></span></td>
		<td data-name="PatId"<?php echo $view_ip_af_billing->PatId->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_PatId" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_PatId">
<span<?php echo $view_ip_af_billing->PatId->viewAttributes() ?>>
<?php echo $view_ip_af_billing->PatId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->DrDepartment->Visible) { // DrDepartment ?>
	<tr id="r_DrDepartment">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_DrDepartment"><script id="tpc_view_ip_af_billing_DrDepartment" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->DrDepartment->caption() ?></span></script></span></td>
		<td data-name="DrDepartment"<?php echo $view_ip_af_billing->DrDepartment->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_DrDepartment" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_DrDepartment">
<span<?php echo $view_ip_af_billing->DrDepartment->viewAttributes() ?>>
<?php echo $view_ip_af_billing->DrDepartment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->RefferedBy->Visible) { // RefferedBy ?>
	<tr id="r_RefferedBy">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_RefferedBy"><script id="tpc_view_ip_af_billing_RefferedBy" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->RefferedBy->caption() ?></span></script></span></td>
		<td data-name="RefferedBy"<?php echo $view_ip_af_billing->RefferedBy->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_RefferedBy" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_RefferedBy">
<span<?php echo $view_ip_af_billing->RefferedBy->viewAttributes() ?>>
<?php echo $view_ip_af_billing->RefferedBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->CardNumber->Visible) { // CardNumber ?>
	<tr id="r_CardNumber">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_CardNumber"><script id="tpc_view_ip_af_billing_CardNumber" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->CardNumber->caption() ?></span></script></span></td>
		<td data-name="CardNumber"<?php echo $view_ip_af_billing->CardNumber->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_CardNumber" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_CardNumber">
<span<?php echo $view_ip_af_billing->CardNumber->viewAttributes() ?>>
<?php echo $view_ip_af_billing->CardNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->BankName->Visible) { // BankName ?>
	<tr id="r_BankName">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_BankName"><script id="tpc_view_ip_af_billing_BankName" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->BankName->caption() ?></span></script></span></td>
		<td data-name="BankName"<?php echo $view_ip_af_billing->BankName->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_BankName" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_BankName">
<span<?php echo $view_ip_af_billing->BankName->viewAttributes() ?>>
<?php echo $view_ip_af_billing->BankName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->DrID->Visible) { // DrID ?>
	<tr id="r_DrID">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_DrID"><script id="tpc_view_ip_af_billing_DrID" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->DrID->caption() ?></span></script></span></td>
		<td data-name="DrID"<?php echo $view_ip_af_billing->DrID->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_DrID" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_DrID">
<span<?php echo $view_ip_af_billing->DrID->viewAttributes() ?>>
<?php echo $view_ip_af_billing->DrID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->BillStatus->Visible) { // BillStatus ?>
	<tr id="r_BillStatus">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_BillStatus"><script id="tpc_view_ip_af_billing_BillStatus" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->BillStatus->caption() ?></span></script></span></td>
		<td data-name="BillStatus"<?php echo $view_ip_af_billing->BillStatus->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_BillStatus" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_BillStatus">
<span<?php echo $view_ip_af_billing->BillStatus->viewAttributes() ?>>
<?php echo $view_ip_af_billing->BillStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->UserName->Visible) { // UserName ?>
	<tr id="r_UserName">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_UserName"><script id="tpc_view_ip_af_billing_UserName" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->UserName->caption() ?></span></script></span></td>
		<td data-name="UserName"<?php echo $view_ip_af_billing->UserName->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_UserName" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_UserName">
<span<?php echo $view_ip_af_billing->UserName->viewAttributes() ?>>
<?php echo $view_ip_af_billing->UserName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
	<tr id="r_AdjustmentAdvance">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_AdjustmentAdvance"><script id="tpc_view_ip_af_billing_AdjustmentAdvance" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->AdjustmentAdvance->caption() ?></span></script></span></td>
		<td data-name="AdjustmentAdvance"<?php echo $view_ip_af_billing->AdjustmentAdvance->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_AdjustmentAdvance" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_AdjustmentAdvance">
<span<?php echo $view_ip_af_billing->AdjustmentAdvance->viewAttributes() ?>>
<?php echo $view_ip_af_billing->AdjustmentAdvance->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->billing_vouchercol->Visible) { // billing_vouchercol ?>
	<tr id="r_billing_vouchercol">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_billing_vouchercol"><script id="tpc_view_ip_af_billing_billing_vouchercol" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->billing_vouchercol->caption() ?></span></script></span></td>
		<td data-name="billing_vouchercol"<?php echo $view_ip_af_billing->billing_vouchercol->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_billing_vouchercol" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_billing_vouchercol">
<span<?php echo $view_ip_af_billing->billing_vouchercol->viewAttributes() ?>>
<?php echo $view_ip_af_billing->billing_vouchercol->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->BillType->Visible) { // BillType ?>
	<tr id="r_BillType">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_BillType"><script id="tpc_view_ip_af_billing_BillType" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->BillType->caption() ?></span></script></span></td>
		<td data-name="BillType"<?php echo $view_ip_af_billing->BillType->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_BillType" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_BillType">
<span<?php echo $view_ip_af_billing->BillType->viewAttributes() ?>>
<?php echo $view_ip_af_billing->BillType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->ProcedureName->Visible) { // ProcedureName ?>
	<tr id="r_ProcedureName">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_ProcedureName"><script id="tpc_view_ip_af_billing_ProcedureName" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->ProcedureName->caption() ?></span></script></span></td>
		<td data-name="ProcedureName"<?php echo $view_ip_af_billing->ProcedureName->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_ProcedureName" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_ProcedureName">
<span<?php echo $view_ip_af_billing->ProcedureName->viewAttributes() ?>>
<?php echo $view_ip_af_billing->ProcedureName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->ProcedureAmount->Visible) { // ProcedureAmount ?>
	<tr id="r_ProcedureAmount">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_ProcedureAmount"><script id="tpc_view_ip_af_billing_ProcedureAmount" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->ProcedureAmount->caption() ?></span></script></span></td>
		<td data-name="ProcedureAmount"<?php echo $view_ip_af_billing->ProcedureAmount->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_ProcedureAmount" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_ProcedureAmount">
<span<?php echo $view_ip_af_billing->ProcedureAmount->viewAttributes() ?>>
<?php echo $view_ip_af_billing->ProcedureAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->IncludePackage->Visible) { // IncludePackage ?>
	<tr id="r_IncludePackage">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_IncludePackage"><script id="tpc_view_ip_af_billing_IncludePackage" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->IncludePackage->caption() ?></span></script></span></td>
		<td data-name="IncludePackage"<?php echo $view_ip_af_billing->IncludePackage->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_IncludePackage" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_IncludePackage">
<span<?php echo $view_ip_af_billing->IncludePackage->viewAttributes() ?>>
<?php echo $view_ip_af_billing->IncludePackage->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->CancelBill->Visible) { // CancelBill ?>
	<tr id="r_CancelBill">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_CancelBill"><script id="tpc_view_ip_af_billing_CancelBill" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->CancelBill->caption() ?></span></script></span></td>
		<td data-name="CancelBill"<?php echo $view_ip_af_billing->CancelBill->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_CancelBill" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_CancelBill">
<span<?php echo $view_ip_af_billing->CancelBill->viewAttributes() ?>>
<?php echo $view_ip_af_billing->CancelBill->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->CancelReason->Visible) { // CancelReason ?>
	<tr id="r_CancelReason">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_CancelReason"><script id="tpc_view_ip_af_billing_CancelReason" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->CancelReason->caption() ?></span></script></span></td>
		<td data-name="CancelReason"<?php echo $view_ip_af_billing->CancelReason->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_CancelReason" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_CancelReason">
<span<?php echo $view_ip_af_billing->CancelReason->viewAttributes() ?>>
<?php echo $view_ip_af_billing->CancelReason->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
	<tr id="r_CancelModeOfPayment">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_CancelModeOfPayment"><script id="tpc_view_ip_af_billing_CancelModeOfPayment" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->CancelModeOfPayment->caption() ?></span></script></span></td>
		<td data-name="CancelModeOfPayment"<?php echo $view_ip_af_billing->CancelModeOfPayment->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_CancelModeOfPayment" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_CancelModeOfPayment">
<span<?php echo $view_ip_af_billing->CancelModeOfPayment->viewAttributes() ?>>
<?php echo $view_ip_af_billing->CancelModeOfPayment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->CancelAmount->Visible) { // CancelAmount ?>
	<tr id="r_CancelAmount">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_CancelAmount"><script id="tpc_view_ip_af_billing_CancelAmount" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->CancelAmount->caption() ?></span></script></span></td>
		<td data-name="CancelAmount"<?php echo $view_ip_af_billing->CancelAmount->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_CancelAmount" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_CancelAmount">
<span<?php echo $view_ip_af_billing->CancelAmount->viewAttributes() ?>>
<?php echo $view_ip_af_billing->CancelAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->CancelBankName->Visible) { // CancelBankName ?>
	<tr id="r_CancelBankName">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_CancelBankName"><script id="tpc_view_ip_af_billing_CancelBankName" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->CancelBankName->caption() ?></span></script></span></td>
		<td data-name="CancelBankName"<?php echo $view_ip_af_billing->CancelBankName->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_CancelBankName" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_CancelBankName">
<span<?php echo $view_ip_af_billing->CancelBankName->viewAttributes() ?>>
<?php echo $view_ip_af_billing->CancelBankName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
	<tr id="r_CancelTransactionNumber">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_CancelTransactionNumber"><script id="tpc_view_ip_af_billing_CancelTransactionNumber" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->CancelTransactionNumber->caption() ?></span></script></span></td>
		<td data-name="CancelTransactionNumber"<?php echo $view_ip_af_billing->CancelTransactionNumber->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_CancelTransactionNumber" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_CancelTransactionNumber">
<span<?php echo $view_ip_af_billing->CancelTransactionNumber->viewAttributes() ?>>
<?php echo $view_ip_af_billing->CancelTransactionNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->LabTest->Visible) { // LabTest ?>
	<tr id="r_LabTest">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_LabTest"><script id="tpc_view_ip_af_billing_LabTest" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->LabTest->caption() ?></span></script></span></td>
		<td data-name="LabTest"<?php echo $view_ip_af_billing->LabTest->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_LabTest" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_LabTest">
<span<?php echo $view_ip_af_billing->LabTest->viewAttributes() ?>>
<?php echo $view_ip_af_billing->LabTest->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->sid->Visible) { // sid ?>
	<tr id="r_sid">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_sid"><script id="tpc_view_ip_af_billing_sid" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->sid->caption() ?></span></script></span></td>
		<td data-name="sid"<?php echo $view_ip_af_billing->sid->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_sid" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_sid">
<span<?php echo $view_ip_af_billing->sid->viewAttributes() ?>>
<?php echo $view_ip_af_billing->sid->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->SidNo->Visible) { // SidNo ?>
	<tr id="r_SidNo">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_SidNo"><script id="tpc_view_ip_af_billing_SidNo" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->SidNo->caption() ?></span></script></span></td>
		<td data-name="SidNo"<?php echo $view_ip_af_billing->SidNo->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_SidNo" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_SidNo">
<span<?php echo $view_ip_af_billing->SidNo->viewAttributes() ?>>
<?php echo $view_ip_af_billing->SidNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->createdDatettime->Visible) { // createdDatettime ?>
	<tr id="r_createdDatettime">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_createdDatettime"><script id="tpc_view_ip_af_billing_createdDatettime" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->createdDatettime->caption() ?></span></script></span></td>
		<td data-name="createdDatettime"<?php echo $view_ip_af_billing->createdDatettime->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_createdDatettime" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_createdDatettime">
<span<?php echo $view_ip_af_billing->createdDatettime->viewAttributes() ?>>
<?php echo $view_ip_af_billing->createdDatettime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->LabTestReleased->Visible) { // LabTestReleased ?>
	<tr id="r_LabTestReleased">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_LabTestReleased"><script id="tpc_view_ip_af_billing_LabTestReleased" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->LabTestReleased->caption() ?></span></script></span></td>
		<td data-name="LabTestReleased"<?php echo $view_ip_af_billing->LabTestReleased->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_LabTestReleased" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_LabTestReleased">
<span<?php echo $view_ip_af_billing->LabTestReleased->viewAttributes() ?>>
<?php echo $view_ip_af_billing->LabTestReleased->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->GoogleReviewID->Visible) { // GoogleReviewID ?>
	<tr id="r_GoogleReviewID">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_GoogleReviewID"><script id="tpc_view_ip_af_billing_GoogleReviewID" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->GoogleReviewID->caption() ?></span></script></span></td>
		<td data-name="GoogleReviewID"<?php echo $view_ip_af_billing->GoogleReviewID->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_GoogleReviewID" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_GoogleReviewID">
<span<?php echo $view_ip_af_billing->GoogleReviewID->viewAttributes() ?>>
<?php echo $view_ip_af_billing->GoogleReviewID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->CardType->Visible) { // CardType ?>
	<tr id="r_CardType">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_CardType"><script id="tpc_view_ip_af_billing_CardType" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->CardType->caption() ?></span></script></span></td>
		<td data-name="CardType"<?php echo $view_ip_af_billing->CardType->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_CardType" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_CardType">
<span<?php echo $view_ip_af_billing->CardType->viewAttributes() ?>>
<?php echo $view_ip_af_billing->CardType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->PharmacyBill->Visible) { // PharmacyBill ?>
	<tr id="r_PharmacyBill">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_PharmacyBill"><script id="tpc_view_ip_af_billing_PharmacyBill" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->PharmacyBill->caption() ?></span></script></span></td>
		<td data-name="PharmacyBill"<?php echo $view_ip_af_billing->PharmacyBill->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_PharmacyBill" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_PharmacyBill">
<span<?php echo $view_ip_af_billing->PharmacyBill->viewAttributes() ?>>
<?php echo $view_ip_af_billing->PharmacyBill->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->DiscountAmount->Visible) { // DiscountAmount ?>
	<tr id="r_DiscountAmount">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_DiscountAmount"><script id="tpc_view_ip_af_billing_DiscountAmount" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->DiscountAmount->caption() ?></span></script></span></td>
		<td data-name="DiscountAmount"<?php echo $view_ip_af_billing->DiscountAmount->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_DiscountAmount" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_DiscountAmount">
<span<?php echo $view_ip_af_billing->DiscountAmount->viewAttributes() ?>>
<?php echo $view_ip_af_billing->DiscountAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->Cash->Visible) { // Cash ?>
	<tr id="r_Cash">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Cash"><script id="tpc_view_ip_af_billing_Cash" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->Cash->caption() ?></span></script></span></td>
		<td data-name="Cash"<?php echo $view_ip_af_billing->Cash->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_Cash" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_Cash">
<span<?php echo $view_ip_af_billing->Cash->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Cash->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_ip_af_billing->Card->Visible) { // Card ?>
	<tr id="r_Card">
		<td class="<?php echo $view_ip_af_billing_view->TableLeftColumnClass ?>"><span id="elh_view_ip_af_billing_Card"><script id="tpc_view_ip_af_billing_Card" class="view_ip_af_billingview" type="text/html"><span><?php echo $view_ip_af_billing->Card->caption() ?></span></script></span></td>
		<td data-name="Card"<?php echo $view_ip_af_billing->Card->cellAttributes() ?>>
<script id="tpx_view_ip_af_billing_Card" class="view_ip_af_billingview" type="text/html">
<span id="el_view_ip_af_billing_Card">
<span<?php echo $view_ip_af_billing->Card->viewAttributes() ?>>
<?php echo $view_ip_af_billing->Card->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_ip_af_billingview" class="ew-custom-template"></div>
<script id="tpm_view_ip_af_billingview" type="text/html">
<div id="ct_view_ip_af_billing_view"><style>
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
  $BillNumber =  $Page->BillNumber->CurrentValue;
  echo $BillNumber;
	$invoiceId = $Page->id->CurrentValue;
	$dbhelper = &DbHelper();

	//$sql = "SELECT * FROM ganeshkumar_bjhims.ip_admission where id='".$invoiceId."'; ";
	$sql = "SELECT * FROM ganeshkumar_bjhims.ip_admission where BillNumber='".$BillNumber."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$physician_id = $results1[0]["physician_id"];
$BillNumber =  $results1[0]["BillNumber"];
	$sql = "SELECT * FROM ganeshkumar_bjhims.doctors where id='".$physician_id."'; ";
	$results1A = $dbhelper->ExecuteRows($sql);
	$Doctor = $results1A[0]["NAME"];
	$patient_id = $results1[0]["PatientID"];
	$PatId = $results1[0]["patient_id"];
	$HospID = $results1[0]["HospID"];
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$PatId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	 $row = &$rs->fields;
	 $Patid =  $row["id"];
	 $PatientID =  $row["PatientID"];
	 $PatientName =  $row["first_name"];
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
 $sql = "SELECT * FROM ganeshkumar_bjhims.hospital where id='".$HospID."' ;";
$results2 = $dbhelper->ExecuteRows($sql);
if($results2[0]["BillingGST"] != "")
{
$HospGST = "GST No:". $results2[0]["BillingGST"];
}
if($Page->ReportHeader->CurrentValue=="Yes")
{
$id =  $results2[0]["id"];
 $logo = $results2[0]["logo"];
 $hospital = $results2[0]["hospital"];
 $street = $results2[0]["street"];
 $area = $results2[0]["area"];
 $town = $results2[0]["town"];
 $province = $results2[0]["province"];
 $postal_code = $results2[0]["postal_code"];
 $phone_no = $results2[0]["phone_no"];
 $PreFixCode = $results2[0]["PreFixCode"];
 $status = $results2[0]["status"];
$createdby =  $results2[0]["createdby"];
$createddatetime =  $results2[0]["createddatetime"];
$modifiedby =  $results2[0]["modifiedby"];
$modifieddatetime =  $results2[0]["modifieddatetime"];
$BillingGST =  $results2[0]["BillingGST"];
$pharmacyGST =  $results2[0]["pharmacyGST"];
$hospaddress = '';
if( $street != '')
{
	$hospaddress .= $street;
}
if( $area != '')
{
	$hospaddress .= ', '.$area;
}
if( $town != '')
{
	$hospaddress .= ', '.$town;
}
if( $province != '')
{
	$hospaddress .= ', '.$province;
}
if( $country != '')
{
	$hospaddress .= ', '.$country;
}
if( $postal_code != '')
{
	$hospaddress .= ', '.$postal_code . '.';
	}
$hospphone_no = '';
if( $phone_no != '')
{
	$hospphone_no .= '		<tr>
			<td  style="width:50px;"></td>
			<td align="center">Ph: '.$phone_no.' .</td>
			<td  style="width:50px;"></td>
		</tr>';
}
$heeddeer = '<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr>
			<td  style="width:50px;"></td>
			<td><h2 align="center">'.$hospital.'</h2></td>
			<td  style="width:50px;"></td>
		</tr>
		<tr>
			<td  style="width:50px;"></td>
			<td align="center">'.$hospaddress.'</td>
			<td  style="width:50px;"></td>
		</tr>
		'.$hospphone_no.'
	</tbody>
</table>
';
echo $heeddeer;
}
 ?>
<table width="100%">
	 <tbody>
		<tr>
<td></td>
<td>
<?php
		if($Page->ReportHeader->CurrentValue=="Yes")
		{
			echo '<h5 align="center"><u>PATIENT IP BILL OF SUPPLY</u></h5>';
		}else{
			echo '<h2 align="center">PATIENT IP BILL OF SUPPLY</h2>';
		}
?>
</td>
<td  style="float: right;"><?php echo $HospGST; ?></td>
</tr>
	</tbody>
</table>
<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr><td  style="float:left;">Patient Id: <?php echo $PatientID; ?> </td><td  style="float: right;">Bill No: <?php echo $BillNumber; ?></td></tr>
		<tr><td  style="float:left;">Patient Name: <?php echo $PatientName; ?></td><td  style="float: right;">Bill Date:<?php echo date("d-m-Y", strtotime($Page->createddatetime->CurrentValue)); ?></td></tr>
		<tr><td  style="float:left;"> Age: <?php echo $Age; ?> </td><td  style="float: right;">Consultant: <?php echo $Doctor; ?></td></tr>
		<tr><td  style="float:left;width:50%;">Gender: <?php echo $gender; ?> </td><td  style="float: right;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td></tr>
		<tr><td  style="float:left;width:50%;">Address: <?php echo $address; ?> </td><td  style="float: right;"></td></tr>
	</tbody>
</table>
	</font>
<?php
$GRTotal = 0;
$dbhelper = &DbHelper();
$sqlA = "SELECT Service_Department FROM ganeshkumar_bjhims.patient_services where Reception='".$invoiceId."' group by Service_Department;";
$rsA = $dbhelper->LoadRecordset($sqlA);
while (!$rsA->EOF) {
	$rowA = &$rsA->fields;
 $hhh = '<font size="4" > <b>'.$rowA["Service_Department"].'</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Description</b></td>
<td align="center"><b>Unit Price</b></td>
<td align="center"><b>Quantity</b></td>
<td align="center"><b align="right">Price</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_services where Reception='".$invoiceId."' and  Service_Department='".$rowA["Service_Department"]."';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Services"];
				$ItemCode =  $row["ItemCode"];
				$Qty = $row["Quantity"];
				$Rate =  $row["amount"];
				$SubTotal =  $row["SubTotal"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$Rate.'</td><td align="center">'.$Qty.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SSTotal = $SSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
	  $GRTotal = $GRTotal + $SSTotal;
	  	$rsA->MoveNext();
}

//==============================
//$GRTotal = 0;

$dbhelper = &DbHelper();
$sqlA = "SELECT BRCODE,BRNAME FROM ganeshkumar_bjhims.pharmacy_pharled where Reception='".$invoiceId."' group by BRCODE,BRNAME;";
$rsA = $dbhelper->LoadRecordset($sqlA);
while (!$rsA->EOF) {
	$rowA = &$rsA->fields;
 $hhh = '<font size="4" > <b>'.$rowA["BRNAME"].'</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Description</b></td>
<td align="center"><b>Mfg</b></td>
<td align="center"><b>Exp</b></td>
<td align="center"><b>Batch</b></td>
<td align="center"><b>Unit Price</b></td>
<td align="center"><b>Quantity</b></td>
<td align="center"><b align="right">Price</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.pharmacy_pharled where Reception='".$invoiceId."' and  BRCODE='".$rowA["BRCODE"]."';";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Product"];
				$ItemCode =  $row["PRC"];
				$Mfg =  $row["Mfg"];

				//$EXPDT =  $row["EXPDT"];
				$EXPDT =  date("d-m-Y", strtotime($row["EXPDT"]));
				$BATCHNO =  $row["BATCHNO"];
				$Qty = number_format($row["IQ"]);
				$Rate =  $row["RT"];
				$SubTotal =  $row["DAMT"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

$hhh .= '<tr><td>'.$Services.'</td><td>'.$Mfg.'</td><td>'.$EXPDT.'</td><td>'.$BATCHNO.'</td><td align="right">'.$Rate.'</td><td align="center">'.$Qty.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SSTotal = $SSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td></td><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
	  $GRTotal = $GRTotal + $SSTotal;
	  	$rsA->MoveNext();
}
 $hhh = '<font size="4" > <b>Advance</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Advance No</b></td>
<td align="center"><b>Date </b></td>
<td align="center"><b>Mode Of Payment</b></td>
<td align="center"><b align="right">Amount</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->patient_id->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SASTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.billing_other_voucher where PatID='".$patient_id."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["AdvanceNo"];
				$ItemCode =  date("d-m-Y", strtotime( $row["Date"]));
				$Qty = 1; //$row["Services"];
				$Rate =  $row["ModeofPayment"];
				$SubTotal =  $row["Amount"];

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

				$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$ItemCode.'</td><td align="center">'.$Rate.'</td><td align="right">'.number_format($row["Amount"],2).'</td></tr>  ';
$SASTotal = $SASTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SASTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
	  echo $hhh;
 $hhh = '<font size="4" > <b>Refund</b>
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="center" style="width:50%"><b>Refund No</b></td>
<td align="center"><b>Date </b></td>
<td align="center"><b>Mode Of Payment</b></td>
<td align="center"><b align="right">Amount</b></td>
</tr>';
			$invoiceId = $Page->id->CurrentValue;
						    $patient_id = $Page->patient_id->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$SrSTotal = 0;
$sql = "SELECT * FROM ganeshkumar_bjhims.billing_refund_voucher where PatID='".$patient_id."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["AdvanceNo"];
				$ItemCode =  date("d-m-Y", strtotime( $row["Date"]));
				$Qty = 1; //$row["Services"];
				$Rate =  $row["ModeofPayment"];
				$SubTotal =  number_format($row["Amount"],2);

				//$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td align="right">'.$SubTotal.'</td></tr>  ';

				$hhh .= '<tr><td>'.$Services.'</td><td align="right">'.$ItemCode.'</td><td align="center">'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
$SrSTotal = $SrSTotal + $SubTotal;
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td align="right">Sub Total</td><td align="right">'.number_format($SrSTotal,2).'</td></tr>  ';
$hhh .= '</table> </font><br>';
if($SrSTotal != '')
{
	  echo $hhh;
}
 $hhh = '<font size="4" > 
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td align="left" style="width:50%"><b>Total Bill Amount</b></td>
<td align="right"><b align="right">'.number_format($GRTotal,2).'</b></td>
</tr>';
 $hhh .= '
<tr>
<td align="left" style="width:50%"><b>Total Advance Amount</b></td>
<td align="right"><b align="right">'.number_format($SASTotal,2).'</b></td>
</tr>';
if($SSTotal != '')
{
 $hhh .= '
<tr>
<td align="left" style="width:50%"><b>Total Refund Amount</b></td>
<td align="right"><b align="right">'.number_format($SrSTotal,2).'</b></td>
</tr>';
	   $BALTotal = ($GRTotal - $SASTotal)+$SrSTotal;
	$hhh .= '<tr><td align="left">(Total Bill Amount - Total Advance Amount) + Total Refund Amount </td><td align="right">'.number_format($BALTotal,2).'</td></tr>  ';
}else
{
 $BALTotal = $GRTotal - $SASTotal;
$hhh .= '<tr><td align="left">Total Bill Amount - Total Advance Amount </td><td align="right">'.number_format($BALTotal,2).'</td></tr>  ';
}
$hhh .= '</table> </font><br>';
 echo $hhh;
 if($BALTotal > 100)
 {
 	echo '</br><b>Balance amount to be paid : '.$BALTotal.' <b></br>';
 }
 if($BALTotal < 0)
 {
 	echo '</br><b>Balance amount to be Refund : '.$BALTotal.' <b></br>';
 }
 if($BALTotal >= 0 && $BALTotal <= 100)
 {
	 echo '</br><b>Bill Tallied <b> </br>';
 }
	  $tt = "ewbarcode.php?data=".$Page->BillNumber->CurrentValue."&encode=QRCODE&height=60&color=%23000000";
	  echo '<b>Grand Total :   '. number_format($GRTotal,2).' </b></br>';
	  echo '<b>Grand Total in words  :   '. convertToIndianCurrency($GRTotal).' </b></br>';
?>
<br><br>
<font size="4" >
<img src='<?php echo $tt; ?>' alt style="border: 0;">
<p align="right">Signature<p>
	  </font>
</div>
</script>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_ip_af_billing->Rows) ?> };
ew.applyTemplate("tpd_view_ip_af_billingview", "tpm_view_ip_af_billingview", "view_ip_af_billingview", "<?php echo $view_ip_af_billing->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_ip_af_billingview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_ip_af_billing_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_ip_af_billing->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_ip_af_billing_view->terminate();
?>
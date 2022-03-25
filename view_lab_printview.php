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
$view_lab_print_view = new view_lab_print_view();

// Run the page
$view_lab_print_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_lab_print_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_lab_print->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_lab_printview = currentForm = new ew.Form("fview_lab_printview", "view");

// Form_CustomValidate event
fview_lab_printview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_lab_printview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_lab_print->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_lab_print_view->ExportOptions->render("body") ?>
<?php $view_lab_print_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_lab_print_view->showPageHeader(); ?>
<?php
$view_lab_print_view->showMessage();
?>
<form name="fview_lab_printview" id="fview_lab_printview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_lab_print_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_lab_print_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_lab_print">
<input type="hidden" name="modal" value="<?php echo (int)$view_lab_print_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_lab_print->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_id"><script id="tpc_view_lab_print_id" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $view_lab_print->id->cellAttributes() ?>>
<script id="tpx_view_lab_print_id" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_id">
<span<?php echo $view_lab_print->id->viewAttributes() ?>>
<?php echo $view_lab_print->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->SID->Visible) { // SID ?>
	<tr id="r_SID">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_SID"><script id="tpc_view_lab_print_SID" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->SID->caption() ?></span></script></span></td>
		<td data-name="SID"<?php echo $view_lab_print->SID->cellAttributes() ?>>
<script id="tpx_view_lab_print_SID" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_SID">
<span<?php echo $view_lab_print->SID->viewAttributes() ?>>
<?php echo $view_lab_print->SID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_Reception"><script id="tpc_view_lab_print_Reception" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->Reception->caption() ?></span></script></span></td>
		<td data-name="Reception"<?php echo $view_lab_print->Reception->cellAttributes() ?>>
<script id="tpx_view_lab_print_Reception" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_Reception">
<span<?php echo $view_lab_print->Reception->viewAttributes() ?>>
<?php echo $view_lab_print->Reception->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_PatientId"><script id="tpc_view_lab_print_PatientId" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->PatientId->caption() ?></span></script></span></td>
		<td data-name="PatientId"<?php echo $view_lab_print->PatientId->cellAttributes() ?>>
<script id="tpx_view_lab_print_PatientId" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_PatientId">
<span<?php echo $view_lab_print->PatientId->viewAttributes() ?>>
<?php echo $view_lab_print->PatientId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_mrnno"><script id="tpc_view_lab_print_mrnno" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->mrnno->caption() ?></span></script></span></td>
		<td data-name="mrnno"<?php echo $view_lab_print->mrnno->cellAttributes() ?>>
<script id="tpx_view_lab_print_mrnno" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_mrnno">
<span<?php echo $view_lab_print->mrnno->viewAttributes() ?>>
<?php echo $view_lab_print->mrnno->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_PatientName"><script id="tpc_view_lab_print_PatientName" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->PatientName->caption() ?></span></script></span></td>
		<td data-name="PatientName"<?php echo $view_lab_print->PatientName->cellAttributes() ?>>
<script id="tpx_view_lab_print_PatientName" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_PatientName">
<span<?php echo $view_lab_print->PatientName->viewAttributes() ?>>
<?php echo $view_lab_print->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_Age"><script id="tpc_view_lab_print_Age" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $view_lab_print->Age->cellAttributes() ?>>
<script id="tpx_view_lab_print_Age" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_Age">
<span<?php echo $view_lab_print->Age->viewAttributes() ?>>
<?php echo $view_lab_print->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_Gender"><script id="tpc_view_lab_print_Gender" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->Gender->caption() ?></span></script></span></td>
		<td data-name="Gender"<?php echo $view_lab_print->Gender->cellAttributes() ?>>
<script id="tpx_view_lab_print_Gender" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_Gender">
<span<?php echo $view_lab_print->Gender->viewAttributes() ?>>
<?php echo $view_lab_print->Gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_profilePic"><script id="tpc_view_lab_print_profilePic" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->profilePic->caption() ?></span></script></span></td>
		<td data-name="profilePic"<?php echo $view_lab_print->profilePic->cellAttributes() ?>>
<script id="tpx_view_lab_print_profilePic" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_profilePic">
<span<?php echo $view_lab_print->profilePic->viewAttributes() ?>>
<?php echo $view_lab_print->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->Mobile->Visible) { // Mobile ?>
	<tr id="r_Mobile">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_Mobile"><script id="tpc_view_lab_print_Mobile" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->Mobile->caption() ?></span></script></span></td>
		<td data-name="Mobile"<?php echo $view_lab_print->Mobile->cellAttributes() ?>>
<script id="tpx_view_lab_print_Mobile" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_Mobile">
<span<?php echo $view_lab_print->Mobile->viewAttributes() ?>>
<?php echo $view_lab_print->Mobile->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->IP_OP->Visible) { // IP_OP ?>
	<tr id="r_IP_OP">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_IP_OP"><script id="tpc_view_lab_print_IP_OP" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->IP_OP->caption() ?></span></script></span></td>
		<td data-name="IP_OP"<?php echo $view_lab_print->IP_OP->cellAttributes() ?>>
<script id="tpx_view_lab_print_IP_OP" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_IP_OP">
<span<?php echo $view_lab_print->IP_OP->viewAttributes() ?>>
<?php echo $view_lab_print->IP_OP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->Doctor->Visible) { // Doctor ?>
	<tr id="r_Doctor">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_Doctor"><script id="tpc_view_lab_print_Doctor" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->Doctor->caption() ?></span></script></span></td>
		<td data-name="Doctor"<?php echo $view_lab_print->Doctor->cellAttributes() ?>>
<script id="tpx_view_lab_print_Doctor" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_Doctor">
<span<?php echo $view_lab_print->Doctor->viewAttributes() ?>>
<?php echo $view_lab_print->Doctor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->voucher_type->Visible) { // voucher_type ?>
	<tr id="r_voucher_type">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_voucher_type"><script id="tpc_view_lab_print_voucher_type" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->voucher_type->caption() ?></span></script></span></td>
		<td data-name="voucher_type"<?php echo $view_lab_print->voucher_type->cellAttributes() ?>>
<script id="tpx_view_lab_print_voucher_type" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_voucher_type">
<span<?php echo $view_lab_print->voucher_type->viewAttributes() ?>>
<?php echo $view_lab_print->voucher_type->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_Details"><script id="tpc_view_lab_print_Details" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->Details->caption() ?></span></script></span></td>
		<td data-name="Details"<?php echo $view_lab_print->Details->cellAttributes() ?>>
<script id="tpx_view_lab_print_Details" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_Details">
<span<?php echo $view_lab_print->Details->viewAttributes() ?>>
<?php echo $view_lab_print->Details->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->ModeofPayment->Visible) { // ModeofPayment ?>
	<tr id="r_ModeofPayment">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_ModeofPayment"><script id="tpc_view_lab_print_ModeofPayment" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->ModeofPayment->caption() ?></span></script></span></td>
		<td data-name="ModeofPayment"<?php echo $view_lab_print->ModeofPayment->cellAttributes() ?>>
<script id="tpx_view_lab_print_ModeofPayment" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_ModeofPayment">
<span<?php echo $view_lab_print->ModeofPayment->viewAttributes() ?>>
<?php echo $view_lab_print->ModeofPayment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_Amount"><script id="tpc_view_lab_print_Amount" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->Amount->caption() ?></span></script></span></td>
		<td data-name="Amount"<?php echo $view_lab_print->Amount->cellAttributes() ?>>
<script id="tpx_view_lab_print_Amount" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_Amount">
<span<?php echo $view_lab_print->Amount->viewAttributes() ?>>
<?php echo $view_lab_print->Amount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->AnyDues->Visible) { // AnyDues ?>
	<tr id="r_AnyDues">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_AnyDues"><script id="tpc_view_lab_print_AnyDues" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->AnyDues->caption() ?></span></script></span></td>
		<td data-name="AnyDues"<?php echo $view_lab_print->AnyDues->cellAttributes() ?>>
<script id="tpx_view_lab_print_AnyDues" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_AnyDues">
<span<?php echo $view_lab_print->AnyDues->viewAttributes() ?>>
<?php echo $view_lab_print->AnyDues->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_createdby"><script id="tpc_view_lab_print_createdby" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $view_lab_print->createdby->cellAttributes() ?>>
<script id="tpx_view_lab_print_createdby" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_createdby">
<span<?php echo $view_lab_print->createdby->viewAttributes() ?>>
<?php echo $view_lab_print->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_createddatetime"><script id="tpc_view_lab_print_createddatetime" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $view_lab_print->createddatetime->cellAttributes() ?>>
<script id="tpx_view_lab_print_createddatetime" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_createddatetime">
<span<?php echo $view_lab_print->createddatetime->viewAttributes() ?>>
<?php echo $view_lab_print->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_modifiedby"><script id="tpc_view_lab_print_modifiedby" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $view_lab_print->modifiedby->cellAttributes() ?>>
<script id="tpx_view_lab_print_modifiedby" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_modifiedby">
<span<?php echo $view_lab_print->modifiedby->viewAttributes() ?>>
<?php echo $view_lab_print->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_modifieddatetime"><script id="tpc_view_lab_print_modifieddatetime" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $view_lab_print->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_lab_print_modifieddatetime" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_modifieddatetime">
<span<?php echo $view_lab_print->modifieddatetime->viewAttributes() ?>>
<?php echo $view_lab_print->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->RealizationAmount->Visible) { // RealizationAmount ?>
	<tr id="r_RealizationAmount">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_RealizationAmount"><script id="tpc_view_lab_print_RealizationAmount" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->RealizationAmount->caption() ?></span></script></span></td>
		<td data-name="RealizationAmount"<?php echo $view_lab_print->RealizationAmount->cellAttributes() ?>>
<script id="tpx_view_lab_print_RealizationAmount" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_RealizationAmount">
<span<?php echo $view_lab_print->RealizationAmount->viewAttributes() ?>>
<?php echo $view_lab_print->RealizationAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->RealizationStatus->Visible) { // RealizationStatus ?>
	<tr id="r_RealizationStatus">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_RealizationStatus"><script id="tpc_view_lab_print_RealizationStatus" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->RealizationStatus->caption() ?></span></script></span></td>
		<td data-name="RealizationStatus"<?php echo $view_lab_print->RealizationStatus->cellAttributes() ?>>
<script id="tpx_view_lab_print_RealizationStatus" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_RealizationStatus">
<span<?php echo $view_lab_print->RealizationStatus->viewAttributes() ?>>
<?php echo $view_lab_print->RealizationStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<tr id="r_RealizationRemarks">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_RealizationRemarks"><script id="tpc_view_lab_print_RealizationRemarks" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->RealizationRemarks->caption() ?></span></script></span></td>
		<td data-name="RealizationRemarks"<?php echo $view_lab_print->RealizationRemarks->cellAttributes() ?>>
<script id="tpx_view_lab_print_RealizationRemarks" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_RealizationRemarks">
<span<?php echo $view_lab_print->RealizationRemarks->viewAttributes() ?>>
<?php echo $view_lab_print->RealizationRemarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<tr id="r_RealizationBatchNo">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_RealizationBatchNo"><script id="tpc_view_lab_print_RealizationBatchNo" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->RealizationBatchNo->caption() ?></span></script></span></td>
		<td data-name="RealizationBatchNo"<?php echo $view_lab_print->RealizationBatchNo->cellAttributes() ?>>
<script id="tpx_view_lab_print_RealizationBatchNo" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_RealizationBatchNo">
<span<?php echo $view_lab_print->RealizationBatchNo->viewAttributes() ?>>
<?php echo $view_lab_print->RealizationBatchNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->RealizationDate->Visible) { // RealizationDate ?>
	<tr id="r_RealizationDate">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_RealizationDate"><script id="tpc_view_lab_print_RealizationDate" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->RealizationDate->caption() ?></span></script></span></td>
		<td data-name="RealizationDate"<?php echo $view_lab_print->RealizationDate->cellAttributes() ?>>
<script id="tpx_view_lab_print_RealizationDate" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_RealizationDate">
<span<?php echo $view_lab_print->RealizationDate->viewAttributes() ?>>
<?php echo $view_lab_print->RealizationDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_HospID"><script id="tpc_view_lab_print_HospID" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $view_lab_print->HospID->cellAttributes() ?>>
<script id="tpx_view_lab_print_HospID" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_HospID">
<span<?php echo $view_lab_print->HospID->viewAttributes() ?>>
<?php echo $view_lab_print->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_RIDNO"><script id="tpc_view_lab_print_RIDNO" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->RIDNO->caption() ?></span></script></span></td>
		<td data-name="RIDNO"<?php echo $view_lab_print->RIDNO->cellAttributes() ?>>
<script id="tpx_view_lab_print_RIDNO" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_RIDNO">
<span<?php echo $view_lab_print->RIDNO->viewAttributes() ?>>
<?php echo $view_lab_print->RIDNO->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_TidNo"><script id="tpc_view_lab_print_TidNo" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->TidNo->caption() ?></span></script></span></td>
		<td data-name="TidNo"<?php echo $view_lab_print->TidNo->cellAttributes() ?>>
<script id="tpx_view_lab_print_TidNo" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_TidNo">
<span<?php echo $view_lab_print->TidNo->viewAttributes() ?>>
<?php echo $view_lab_print->TidNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->CId->Visible) { // CId ?>
	<tr id="r_CId">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_CId"><script id="tpc_view_lab_print_CId" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->CId->caption() ?></span></script></span></td>
		<td data-name="CId"<?php echo $view_lab_print->CId->cellAttributes() ?>>
<script id="tpx_view_lab_print_CId" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_CId">
<span<?php echo $view_lab_print->CId->viewAttributes() ?>>
<?php echo $view_lab_print->CId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_PartnerName"><script id="tpc_view_lab_print_PartnerName" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->PartnerName->caption() ?></span></script></span></td>
		<td data-name="PartnerName"<?php echo $view_lab_print->PartnerName->cellAttributes() ?>>
<script id="tpx_view_lab_print_PartnerName" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_PartnerName">
<span<?php echo $view_lab_print->PartnerName->viewAttributes() ?>>
<?php echo $view_lab_print->PartnerName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->PayerType->Visible) { // PayerType ?>
	<tr id="r_PayerType">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_PayerType"><script id="tpc_view_lab_print_PayerType" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->PayerType->caption() ?></span></script></span></td>
		<td data-name="PayerType"<?php echo $view_lab_print->PayerType->cellAttributes() ?>>
<script id="tpx_view_lab_print_PayerType" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_PayerType">
<span<?php echo $view_lab_print->PayerType->viewAttributes() ?>>
<?php echo $view_lab_print->PayerType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->Dob->Visible) { // Dob ?>
	<tr id="r_Dob">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_Dob"><script id="tpc_view_lab_print_Dob" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->Dob->caption() ?></span></script></span></td>
		<td data-name="Dob"<?php echo $view_lab_print->Dob->cellAttributes() ?>>
<script id="tpx_view_lab_print_Dob" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_Dob">
<span<?php echo $view_lab_print->Dob->viewAttributes() ?>>
<?php echo $view_lab_print->Dob->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->Currency->Visible) { // Currency ?>
	<tr id="r_Currency">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_Currency"><script id="tpc_view_lab_print_Currency" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->Currency->caption() ?></span></script></span></td>
		<td data-name="Currency"<?php echo $view_lab_print->Currency->cellAttributes() ?>>
<script id="tpx_view_lab_print_Currency" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_Currency">
<span<?php echo $view_lab_print->Currency->viewAttributes() ?>>
<?php echo $view_lab_print->Currency->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<tr id="r_DiscountRemarks">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_DiscountRemarks"><script id="tpc_view_lab_print_DiscountRemarks" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->DiscountRemarks->caption() ?></span></script></span></td>
		<td data-name="DiscountRemarks"<?php echo $view_lab_print->DiscountRemarks->cellAttributes() ?>>
<script id="tpx_view_lab_print_DiscountRemarks" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_DiscountRemarks">
<span<?php echo $view_lab_print->DiscountRemarks->viewAttributes() ?>>
<?php echo $view_lab_print->DiscountRemarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_Remarks"><script id="tpc_view_lab_print_Remarks" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->Remarks->caption() ?></span></script></span></td>
		<td data-name="Remarks"<?php echo $view_lab_print->Remarks->cellAttributes() ?>>
<script id="tpx_view_lab_print_Remarks" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_Remarks">
<span<?php echo $view_lab_print->Remarks->viewAttributes() ?>>
<?php echo $view_lab_print->Remarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->PatId->Visible) { // PatId ?>
	<tr id="r_PatId">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_PatId"><script id="tpc_view_lab_print_PatId" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->PatId->caption() ?></span></script></span></td>
		<td data-name="PatId"<?php echo $view_lab_print->PatId->cellAttributes() ?>>
<script id="tpx_view_lab_print_PatId" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_PatId">
<span<?php echo $view_lab_print->PatId->viewAttributes() ?>>
<?php echo $view_lab_print->PatId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->DrDepartment->Visible) { // DrDepartment ?>
	<tr id="r_DrDepartment">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_DrDepartment"><script id="tpc_view_lab_print_DrDepartment" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->DrDepartment->caption() ?></span></script></span></td>
		<td data-name="DrDepartment"<?php echo $view_lab_print->DrDepartment->cellAttributes() ?>>
<script id="tpx_view_lab_print_DrDepartment" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_DrDepartment">
<span<?php echo $view_lab_print->DrDepartment->viewAttributes() ?>>
<?php echo $view_lab_print->DrDepartment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->RefferedBy->Visible) { // RefferedBy ?>
	<tr id="r_RefferedBy">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_RefferedBy"><script id="tpc_view_lab_print_RefferedBy" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->RefferedBy->caption() ?></span></script></span></td>
		<td data-name="RefferedBy"<?php echo $view_lab_print->RefferedBy->cellAttributes() ?>>
<script id="tpx_view_lab_print_RefferedBy" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_RefferedBy">
<span<?php echo $view_lab_print->RefferedBy->viewAttributes() ?>>
<?php echo $view_lab_print->RefferedBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->BillNumber->Visible) { // BillNumber ?>
	<tr id="r_BillNumber">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_BillNumber"><script id="tpc_view_lab_print_BillNumber" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->BillNumber->caption() ?></span></script></span></td>
		<td data-name="BillNumber"<?php echo $view_lab_print->BillNumber->cellAttributes() ?>>
<script id="tpx_view_lab_print_BillNumber" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_BillNumber">
<span<?php echo $view_lab_print->BillNumber->viewAttributes() ?>>
<?php echo $view_lab_print->BillNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->CardNumber->Visible) { // CardNumber ?>
	<tr id="r_CardNumber">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_CardNumber"><script id="tpc_view_lab_print_CardNumber" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->CardNumber->caption() ?></span></script></span></td>
		<td data-name="CardNumber"<?php echo $view_lab_print->CardNumber->cellAttributes() ?>>
<script id="tpx_view_lab_print_CardNumber" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_CardNumber">
<span<?php echo $view_lab_print->CardNumber->viewAttributes() ?>>
<?php echo $view_lab_print->CardNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->BankName->Visible) { // BankName ?>
	<tr id="r_BankName">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_BankName"><script id="tpc_view_lab_print_BankName" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->BankName->caption() ?></span></script></span></td>
		<td data-name="BankName"<?php echo $view_lab_print->BankName->cellAttributes() ?>>
<script id="tpx_view_lab_print_BankName" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_BankName">
<span<?php echo $view_lab_print->BankName->viewAttributes() ?>>
<?php echo $view_lab_print->BankName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->DrID->Visible) { // DrID ?>
	<tr id="r_DrID">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_DrID"><script id="tpc_view_lab_print_DrID" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->DrID->caption() ?></span></script></span></td>
		<td data-name="DrID"<?php echo $view_lab_print->DrID->cellAttributes() ?>>
<script id="tpx_view_lab_print_DrID" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_DrID">
<span<?php echo $view_lab_print->DrID->viewAttributes() ?>>
<?php echo $view_lab_print->DrID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->BillStatus->Visible) { // BillStatus ?>
	<tr id="r_BillStatus">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_BillStatus"><script id="tpc_view_lab_print_BillStatus" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->BillStatus->caption() ?></span></script></span></td>
		<td data-name="BillStatus"<?php echo $view_lab_print->BillStatus->cellAttributes() ?>>
<script id="tpx_view_lab_print_BillStatus" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_BillStatus">
<span<?php echo $view_lab_print->BillStatus->viewAttributes() ?>>
<?php echo $view_lab_print->BillStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_lab_print->LabTestReleased->Visible) { // LabTestReleased ?>
	<tr id="r_LabTestReleased">
		<td class="<?php echo $view_lab_print_view->TableLeftColumnClass ?>"><span id="elh_view_lab_print_LabTestReleased"><script id="tpc_view_lab_print_LabTestReleased" class="view_lab_printview" type="text/html"><span><?php echo $view_lab_print->LabTestReleased->caption() ?></span></script></span></td>
		<td data-name="LabTestReleased"<?php echo $view_lab_print->LabTestReleased->cellAttributes() ?>>
<script id="tpx_view_lab_print_LabTestReleased" class="view_lab_printview" type="text/html">
<span id="el_view_lab_print_LabTestReleased">
<span<?php echo $view_lab_print->LabTestReleased->viewAttributes() ?>>
<?php echo $view_lab_print->LabTestReleased->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_lab_printview" class="ew-custom-template"></div>
<script id="tpm_view_lab_printview" type="text/html">
<div id="ct_view_lab_print_view"><style>
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
<h2 align="center">TEST REPORT</h2>
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
<td><b>Test</b></td>
<td><b>Result</b></td>
<td><b>Biological Reference Interval</b></td>
</tr>
							 <?php
			$invoiceId = $Page->id->CurrentValue;
						 $patient_id = $Page->PatientId->CurrentValue;
					 $Reception = $Page->Reception->CurrentValue;
$fromdt = date('Y-m-d', strtotime('-1 months'));
$todate = date('Y-m-d', strtotime('+2 months'));
$Drid = $_GET['Drid'];
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_services where Vid='".$invoiceId."'  AND (`patient_services`.`TestType` IN ('Lab Test' , 'Lab Profile', 'ProfileSubTest')) ";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
				$Services =  $row["Services"];
				$ItemCode =  $row["ItemCode"];
				$LabReport =  $row["LabReport"];
				$RefValue =  $row["RefValue"];
				$Qty = 1; //$row["Services"];
				$Rate =  $row["amount"];
				$SubTotal =  $row["SubTotal"];
				$TestUnit =  $row["TestUnit"];
				$TestUnitName = "";
				$sqlA = "SELECT * FROM ganeshkumar_bjhims.lab_unit_mast where Code='".$TestUnit."';";
				$rsA = $dbhelper->LoadRecordset($sqlA);
				while (!$rsA->EOF) {
				$rowA = &$rsA->fields;
				$TestUnitName =  $rowA["Name"];
					$rsA->MoveNext();
				}

			//	$hhh .= '<tr><td>'.$Services.'</td><td>'.$ItemCode.'</td><td>'.$Qty.'</td><td>'.$Rate.'</td><td align="right">'.$SubTotal.'</td></tr>  ';
				if($LabReport != '')
				{
					$hhh .= '<tr><td>'.$Services.'</td><td>'.$LabReport. "   " .$TestUnitName.'</td><td><pre>'.$RefValue.'</pre></td></tr>  ';
				}
	$rs->MoveNext();
}

//$hhh .= '<tr><td></td><td></td><td></td><td align="right">Total</td><td align="right">'.$Page->Amount->CurrentValue.'</td></tr>  ';
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
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_lab_print->Rows) ?> };
ew.applyTemplate("tpd_view_lab_printview", "tpm_view_lab_printview", "view_lab_printview", "<?php echo $view_lab_print->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_lab_printview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_lab_print_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_lab_print->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_lab_print_view->terminate();
?>
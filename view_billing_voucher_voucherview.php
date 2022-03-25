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
$view_billing_voucher_voucher_view = new view_billing_voucher_voucher_view();

// Run the page
$view_billing_voucher_voucher_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_billing_voucher_voucher_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$view_billing_voucher_voucher->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fview_billing_voucher_voucherview = currentForm = new ew.Form("fview_billing_voucher_voucherview", "view");

// Form_CustomValidate event
fview_billing_voucher_voucherview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_billing_voucher_voucherview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$view_billing_voucher_voucher->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $view_billing_voucher_voucher_view->ExportOptions->render("body") ?>
<?php $view_billing_voucher_voucher_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $view_billing_voucher_voucher_view->showPageHeader(); ?>
<?php
$view_billing_voucher_voucher_view->showMessage();
?>
<form name="fview_billing_voucher_voucherview" id="fview_billing_voucher_voucherview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_billing_voucher_voucher_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_billing_voucher_voucher_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher_voucher">
<input type="hidden" name="modal" value="<?php echo (int)$view_billing_voucher_voucher_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($view_billing_voucher_voucher->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_id"><script id="tpc_view_billing_voucher_voucher_id" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $view_billing_voucher_voucher->id->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_id" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_id">
<span<?php echo $view_billing_voucher_voucher->id->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_Reception"><script id="tpc_view_billing_voucher_voucher_Reception" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->Reception->caption() ?></span></script></span></td>
		<td data-name="Reception"<?php echo $view_billing_voucher_voucher->Reception->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_Reception" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_Reception">
<span<?php echo $view_billing_voucher_voucher->Reception->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->Reception->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_PatientId"><script id="tpc_view_billing_voucher_voucher_PatientId" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->PatientId->caption() ?></span></script></span></td>
		<td data-name="PatientId"<?php echo $view_billing_voucher_voucher->PatientId->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_PatientId" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_PatientId">
<span<?php echo $view_billing_voucher_voucher->PatientId->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->PatientId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_mrnno"><script id="tpc_view_billing_voucher_voucher_mrnno" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->mrnno->caption() ?></span></script></span></td>
		<td data-name="mrnno"<?php echo $view_billing_voucher_voucher->mrnno->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_mrnno" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_mrnno">
<span<?php echo $view_billing_voucher_voucher->mrnno->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->mrnno->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_PatientName"><script id="tpc_view_billing_voucher_voucher_PatientName" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->PatientName->caption() ?></span></script></span></td>
		<td data-name="PatientName"<?php echo $view_billing_voucher_voucher->PatientName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_PatientName" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_PatientName">
<span<?php echo $view_billing_voucher_voucher->PatientName->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_Age"><script id="tpc_view_billing_voucher_voucher_Age" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $view_billing_voucher_voucher->Age->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_Age" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_Age">
<span<?php echo $view_billing_voucher_voucher->Age->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_Gender"><script id="tpc_view_billing_voucher_voucher_Gender" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->Gender->caption() ?></span></script></span></td>
		<td data-name="Gender"<?php echo $view_billing_voucher_voucher->Gender->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_Gender" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_Gender">
<span<?php echo $view_billing_voucher_voucher->Gender->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->Gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_profilePic"><script id="tpc_view_billing_voucher_voucher_profilePic" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->profilePic->caption() ?></span></script></span></td>
		<td data-name="profilePic"<?php echo $view_billing_voucher_voucher->profilePic->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_profilePic" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_profilePic">
<span<?php echo $view_billing_voucher_voucher->profilePic->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_Amount"><script id="tpc_view_billing_voucher_voucher_Amount" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->Amount->caption() ?></span></script></span></td>
		<td data-name="Amount"<?php echo $view_billing_voucher_voucher->Amount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_Amount" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_Amount">
<span<?php echo $view_billing_voucher_voucher->Amount->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->Amount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->Mobile->Visible) { // Mobile ?>
	<tr id="r_Mobile">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_Mobile"><script id="tpc_view_billing_voucher_voucher_Mobile" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->Mobile->caption() ?></span></script></span></td>
		<td data-name="Mobile"<?php echo $view_billing_voucher_voucher->Mobile->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_Mobile" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_Mobile">
<span<?php echo $view_billing_voucher_voucher->Mobile->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->Mobile->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->IP_OP->Visible) { // IP_OP ?>
	<tr id="r_IP_OP">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_IP_OP"><script id="tpc_view_billing_voucher_voucher_IP_OP" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->IP_OP->caption() ?></span></script></span></td>
		<td data-name="IP_OP"<?php echo $view_billing_voucher_voucher->IP_OP->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_IP_OP" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_IP_OP">
<span<?php echo $view_billing_voucher_voucher->IP_OP->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->IP_OP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->Doctor->Visible) { // Doctor ?>
	<tr id="r_Doctor">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_Doctor"><script id="tpc_view_billing_voucher_voucher_Doctor" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->Doctor->caption() ?></span></script></span></td>
		<td data-name="Doctor"<?php echo $view_billing_voucher_voucher->Doctor->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_Doctor" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_Doctor">
<span<?php echo $view_billing_voucher_voucher->Doctor->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->Doctor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->voucher_type->Visible) { // voucher_type ?>
	<tr id="r_voucher_type">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_voucher_type"><script id="tpc_view_billing_voucher_voucher_voucher_type" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->voucher_type->caption() ?></span></script></span></td>
		<td data-name="voucher_type"<?php echo $view_billing_voucher_voucher->voucher_type->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_voucher_type" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_voucher_type">
<span<?php echo $view_billing_voucher_voucher->voucher_type->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->voucher_type->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_Details"><script id="tpc_view_billing_voucher_voucher_Details" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->Details->caption() ?></span></script></span></td>
		<td data-name="Details"<?php echo $view_billing_voucher_voucher->Details->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_Details" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_Details">
<span<?php echo $view_billing_voucher_voucher->Details->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->Details->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
	<tr id="r_ModeofPayment">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_ModeofPayment"><script id="tpc_view_billing_voucher_voucher_ModeofPayment" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->ModeofPayment->caption() ?></span></script></span></td>
		<td data-name="ModeofPayment"<?php echo $view_billing_voucher_voucher->ModeofPayment->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_ModeofPayment" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_ModeofPayment">
<span<?php echo $view_billing_voucher_voucher->ModeofPayment->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->ModeofPayment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->AnyDues->Visible) { // AnyDues ?>
	<tr id="r_AnyDues">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_AnyDues"><script id="tpc_view_billing_voucher_voucher_AnyDues" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->AnyDues->caption() ?></span></script></span></td>
		<td data-name="AnyDues"<?php echo $view_billing_voucher_voucher->AnyDues->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_AnyDues" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_AnyDues">
<span<?php echo $view_billing_voucher_voucher->AnyDues->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->AnyDues->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_createdby"><script id="tpc_view_billing_voucher_voucher_createdby" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $view_billing_voucher_voucher->createdby->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_createdby" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_createdby">
<span<?php echo $view_billing_voucher_voucher->createdby->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_createddatetime"><script id="tpc_view_billing_voucher_voucher_createddatetime" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $view_billing_voucher_voucher->createddatetime->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_createddatetime" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_createddatetime">
<span<?php echo $view_billing_voucher_voucher->createddatetime->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_modifiedby"><script id="tpc_view_billing_voucher_voucher_modifiedby" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $view_billing_voucher_voucher->modifiedby->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_modifiedby" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_modifiedby">
<span<?php echo $view_billing_voucher_voucher->modifiedby->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_modifieddatetime"><script id="tpc_view_billing_voucher_voucher_modifieddatetime" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $view_billing_voucher_voucher->modifieddatetime->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_modifieddatetime" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_modifieddatetime">
<span<?php echo $view_billing_voucher_voucher->modifieddatetime->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
	<tr id="r_RealizationAmount">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_RealizationAmount"><script id="tpc_view_billing_voucher_voucher_RealizationAmount" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->RealizationAmount->caption() ?></span></script></span></td>
		<td data-name="RealizationAmount"<?php echo $view_billing_voucher_voucher->RealizationAmount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_RealizationAmount" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_RealizationAmount">
<span<?php echo $view_billing_voucher_voucher->RealizationAmount->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->RealizationAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->RealizationStatus->Visible) { // RealizationStatus ?>
	<tr id="r_RealizationStatus">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_RealizationStatus"><script id="tpc_view_billing_voucher_voucher_RealizationStatus" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->RealizationStatus->caption() ?></span></script></span></td>
		<td data-name="RealizationStatus"<?php echo $view_billing_voucher_voucher->RealizationStatus->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_RealizationStatus" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_RealizationStatus">
<span<?php echo $view_billing_voucher_voucher->RealizationStatus->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->RealizationStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<tr id="r_RealizationRemarks">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_RealizationRemarks"><script id="tpc_view_billing_voucher_voucher_RealizationRemarks" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->RealizationRemarks->caption() ?></span></script></span></td>
		<td data-name="RealizationRemarks"<?php echo $view_billing_voucher_voucher->RealizationRemarks->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_RealizationRemarks" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_RealizationRemarks">
<span<?php echo $view_billing_voucher_voucher->RealizationRemarks->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->RealizationRemarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<tr id="r_RealizationBatchNo">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_RealizationBatchNo"><script id="tpc_view_billing_voucher_voucher_RealizationBatchNo" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->RealizationBatchNo->caption() ?></span></script></span></td>
		<td data-name="RealizationBatchNo"<?php echo $view_billing_voucher_voucher->RealizationBatchNo->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_RealizationBatchNo" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_RealizationBatchNo">
<span<?php echo $view_billing_voucher_voucher->RealizationBatchNo->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->RealizationBatchNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->RealizationDate->Visible) { // RealizationDate ?>
	<tr id="r_RealizationDate">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_RealizationDate"><script id="tpc_view_billing_voucher_voucher_RealizationDate" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->RealizationDate->caption() ?></span></script></span></td>
		<td data-name="RealizationDate"<?php echo $view_billing_voucher_voucher->RealizationDate->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_RealizationDate" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_RealizationDate">
<span<?php echo $view_billing_voucher_voucher->RealizationDate->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->RealizationDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_HospID"><script id="tpc_view_billing_voucher_voucher_HospID" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $view_billing_voucher_voucher->HospID->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_HospID" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_HospID">
<span<?php echo $view_billing_voucher_voucher->HospID->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_RIDNO"><script id="tpc_view_billing_voucher_voucher_RIDNO" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->RIDNO->caption() ?></span></script></span></td>
		<td data-name="RIDNO"<?php echo $view_billing_voucher_voucher->RIDNO->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_RIDNO" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_RIDNO">
<span<?php echo $view_billing_voucher_voucher->RIDNO->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->RIDNO->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_TidNo"><script id="tpc_view_billing_voucher_voucher_TidNo" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->TidNo->caption() ?></span></script></span></td>
		<td data-name="TidNo"<?php echo $view_billing_voucher_voucher->TidNo->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_TidNo" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_TidNo">
<span<?php echo $view_billing_voucher_voucher->TidNo->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->TidNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->CId->Visible) { // CId ?>
	<tr id="r_CId">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_CId"><script id="tpc_view_billing_voucher_voucher_CId" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->CId->caption() ?></span></script></span></td>
		<td data-name="CId"<?php echo $view_billing_voucher_voucher->CId->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_CId" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_CId">
<span<?php echo $view_billing_voucher_voucher->CId->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->CId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_PartnerName"><script id="tpc_view_billing_voucher_voucher_PartnerName" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->PartnerName->caption() ?></span></script></span></td>
		<td data-name="PartnerName"<?php echo $view_billing_voucher_voucher->PartnerName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_PartnerName" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_PartnerName">
<span<?php echo $view_billing_voucher_voucher->PartnerName->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->PartnerName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->PayerType->Visible) { // PayerType ?>
	<tr id="r_PayerType">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_PayerType"><script id="tpc_view_billing_voucher_voucher_PayerType" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->PayerType->caption() ?></span></script></span></td>
		<td data-name="PayerType"<?php echo $view_billing_voucher_voucher->PayerType->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_PayerType" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_PayerType">
<span<?php echo $view_billing_voucher_voucher->PayerType->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->PayerType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->Dob->Visible) { // Dob ?>
	<tr id="r_Dob">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_Dob"><script id="tpc_view_billing_voucher_voucher_Dob" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->Dob->caption() ?></span></script></span></td>
		<td data-name="Dob"<?php echo $view_billing_voucher_voucher->Dob->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_Dob" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_Dob">
<span<?php echo $view_billing_voucher_voucher->Dob->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->Dob->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->Currency->Visible) { // Currency ?>
	<tr id="r_Currency">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_Currency"><script id="tpc_view_billing_voucher_voucher_Currency" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->Currency->caption() ?></span></script></span></td>
		<td data-name="Currency"<?php echo $view_billing_voucher_voucher->Currency->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_Currency" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_Currency">
<span<?php echo $view_billing_voucher_voucher->Currency->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->Currency->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<tr id="r_DiscountRemarks">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_DiscountRemarks"><script id="tpc_view_billing_voucher_voucher_DiscountRemarks" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->DiscountRemarks->caption() ?></span></script></span></td>
		<td data-name="DiscountRemarks"<?php echo $view_billing_voucher_voucher->DiscountRemarks->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_DiscountRemarks" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_DiscountRemarks">
<span<?php echo $view_billing_voucher_voucher->DiscountRemarks->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->DiscountRemarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_Remarks"><script id="tpc_view_billing_voucher_voucher_Remarks" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->Remarks->caption() ?></span></script></span></td>
		<td data-name="Remarks"<?php echo $view_billing_voucher_voucher->Remarks->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_Remarks" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_Remarks">
<span<?php echo $view_billing_voucher_voucher->Remarks->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->Remarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->PatId->Visible) { // PatId ?>
	<tr id="r_PatId">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_PatId"><script id="tpc_view_billing_voucher_voucher_PatId" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->PatId->caption() ?></span></script></span></td>
		<td data-name="PatId"<?php echo $view_billing_voucher_voucher->PatId->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_PatId" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_PatId">
<span<?php echo $view_billing_voucher_voucher->PatId->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->PatId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->DrDepartment->Visible) { // DrDepartment ?>
	<tr id="r_DrDepartment">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_DrDepartment"><script id="tpc_view_billing_voucher_voucher_DrDepartment" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->DrDepartment->caption() ?></span></script></span></td>
		<td data-name="DrDepartment"<?php echo $view_billing_voucher_voucher->DrDepartment->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_DrDepartment" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_DrDepartment">
<span<?php echo $view_billing_voucher_voucher->DrDepartment->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->DrDepartment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->RefferedBy->Visible) { // RefferedBy ?>
	<tr id="r_RefferedBy">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_RefferedBy"><script id="tpc_view_billing_voucher_voucher_RefferedBy" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->RefferedBy->caption() ?></span></script></span></td>
		<td data-name="RefferedBy"<?php echo $view_billing_voucher_voucher->RefferedBy->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_RefferedBy" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_RefferedBy">
<span<?php echo $view_billing_voucher_voucher->RefferedBy->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->RefferedBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->BillNumber->Visible) { // BillNumber ?>
	<tr id="r_BillNumber">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_BillNumber"><script id="tpc_view_billing_voucher_voucher_BillNumber" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->BillNumber->caption() ?></span></script></span></td>
		<td data-name="BillNumber"<?php echo $view_billing_voucher_voucher->BillNumber->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_BillNumber" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_BillNumber">
<span<?php echo $view_billing_voucher_voucher->BillNumber->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->BillNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->CardNumber->Visible) { // CardNumber ?>
	<tr id="r_CardNumber">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_CardNumber"><script id="tpc_view_billing_voucher_voucher_CardNumber" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->CardNumber->caption() ?></span></script></span></td>
		<td data-name="CardNumber"<?php echo $view_billing_voucher_voucher->CardNumber->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_CardNumber" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_CardNumber">
<span<?php echo $view_billing_voucher_voucher->CardNumber->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->CardNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->BankName->Visible) { // BankName ?>
	<tr id="r_BankName">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_BankName"><script id="tpc_view_billing_voucher_voucher_BankName" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->BankName->caption() ?></span></script></span></td>
		<td data-name="BankName"<?php echo $view_billing_voucher_voucher->BankName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_BankName" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_BankName">
<span<?php echo $view_billing_voucher_voucher->BankName->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->BankName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->DrID->Visible) { // DrID ?>
	<tr id="r_DrID">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_DrID"><script id="tpc_view_billing_voucher_voucher_DrID" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->DrID->caption() ?></span></script></span></td>
		<td data-name="DrID"<?php echo $view_billing_voucher_voucher->DrID->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_DrID" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_DrID">
<span<?php echo $view_billing_voucher_voucher->DrID->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->DrID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->BillStatus->Visible) { // BillStatus ?>
	<tr id="r_BillStatus">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_BillStatus"><script id="tpc_view_billing_voucher_voucher_BillStatus" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->BillStatus->caption() ?></span></script></span></td>
		<td data-name="BillStatus"<?php echo $view_billing_voucher_voucher->BillStatus->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_BillStatus" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_BillStatus">
<span<?php echo $view_billing_voucher_voucher->BillStatus->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->BillStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->ReportHeader->Visible) { // ReportHeader ?>
	<tr id="r_ReportHeader">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_ReportHeader"><script id="tpc_view_billing_voucher_voucher_ReportHeader" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->ReportHeader->caption() ?></span></script></span></td>
		<td data-name="ReportHeader"<?php echo $view_billing_voucher_voucher->ReportHeader->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_ReportHeader" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_ReportHeader">
<span<?php echo $view_billing_voucher_voucher->ReportHeader->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->ReportHeader->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->UserName->Visible) { // UserName ?>
	<tr id="r_UserName">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_UserName"><script id="tpc_view_billing_voucher_voucher_UserName" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->UserName->caption() ?></span></script></span></td>
		<td data-name="UserName"<?php echo $view_billing_voucher_voucher->UserName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_UserName" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_UserName">
<span<?php echo $view_billing_voucher_voucher->UserName->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->UserName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
	<tr id="r_AdjustmentAdvance">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_AdjustmentAdvance"><script id="tpc_view_billing_voucher_voucher_AdjustmentAdvance" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->AdjustmentAdvance->caption() ?></span></script></span></td>
		<td data-name="AdjustmentAdvance"<?php echo $view_billing_voucher_voucher->AdjustmentAdvance->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_AdjustmentAdvance" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_AdjustmentAdvance">
<span<?php echo $view_billing_voucher_voucher->AdjustmentAdvance->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->AdjustmentAdvance->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->billing_vouchercol->Visible) { // billing_vouchercol ?>
	<tr id="r_billing_vouchercol">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_billing_vouchercol"><script id="tpc_view_billing_voucher_voucher_billing_vouchercol" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->billing_vouchercol->caption() ?></span></script></span></td>
		<td data-name="billing_vouchercol"<?php echo $view_billing_voucher_voucher->billing_vouchercol->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_billing_vouchercol" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_billing_vouchercol">
<span<?php echo $view_billing_voucher_voucher->billing_vouchercol->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->billing_vouchercol->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->BillType->Visible) { // BillType ?>
	<tr id="r_BillType">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_BillType"><script id="tpc_view_billing_voucher_voucher_BillType" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->BillType->caption() ?></span></script></span></td>
		<td data-name="BillType"<?php echo $view_billing_voucher_voucher->BillType->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_BillType" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_BillType">
<span<?php echo $view_billing_voucher_voucher->BillType->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->BillType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->ProcedureName->Visible) { // ProcedureName ?>
	<tr id="r_ProcedureName">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_ProcedureName"><script id="tpc_view_billing_voucher_voucher_ProcedureName" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->ProcedureName->caption() ?></span></script></span></td>
		<td data-name="ProcedureName"<?php echo $view_billing_voucher_voucher->ProcedureName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_ProcedureName" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_ProcedureName">
<span<?php echo $view_billing_voucher_voucher->ProcedureName->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->ProcedureName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->ProcedureAmount->Visible) { // ProcedureAmount ?>
	<tr id="r_ProcedureAmount">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_ProcedureAmount"><script id="tpc_view_billing_voucher_voucher_ProcedureAmount" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->ProcedureAmount->caption() ?></span></script></span></td>
		<td data-name="ProcedureAmount"<?php echo $view_billing_voucher_voucher->ProcedureAmount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_ProcedureAmount" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_ProcedureAmount">
<span<?php echo $view_billing_voucher_voucher->ProcedureAmount->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->ProcedureAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->IncludePackage->Visible) { // IncludePackage ?>
	<tr id="r_IncludePackage">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_IncludePackage"><script id="tpc_view_billing_voucher_voucher_IncludePackage" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->IncludePackage->caption() ?></span></script></span></td>
		<td data-name="IncludePackage"<?php echo $view_billing_voucher_voucher->IncludePackage->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_IncludePackage" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_IncludePackage">
<span<?php echo $view_billing_voucher_voucher->IncludePackage->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->IncludePackage->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->CancelBill->Visible) { // CancelBill ?>
	<tr id="r_CancelBill">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_CancelBill"><script id="tpc_view_billing_voucher_voucher_CancelBill" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->CancelBill->caption() ?></span></script></span></td>
		<td data-name="CancelBill"<?php echo $view_billing_voucher_voucher->CancelBill->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_CancelBill" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_CancelBill">
<span<?php echo $view_billing_voucher_voucher->CancelBill->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->CancelBill->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->CancelReason->Visible) { // CancelReason ?>
	<tr id="r_CancelReason">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_CancelReason"><script id="tpc_view_billing_voucher_voucher_CancelReason" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->CancelReason->caption() ?></span></script></span></td>
		<td data-name="CancelReason"<?php echo $view_billing_voucher_voucher->CancelReason->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_CancelReason" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_CancelReason">
<span<?php echo $view_billing_voucher_voucher->CancelReason->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->CancelReason->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
	<tr id="r_CancelModeOfPayment">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_CancelModeOfPayment"><script id="tpc_view_billing_voucher_voucher_CancelModeOfPayment" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->CancelModeOfPayment->caption() ?></span></script></span></td>
		<td data-name="CancelModeOfPayment"<?php echo $view_billing_voucher_voucher->CancelModeOfPayment->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_CancelModeOfPayment" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_CancelModeOfPayment">
<span<?php echo $view_billing_voucher_voucher->CancelModeOfPayment->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->CancelModeOfPayment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->CancelAmount->Visible) { // CancelAmount ?>
	<tr id="r_CancelAmount">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_CancelAmount"><script id="tpc_view_billing_voucher_voucher_CancelAmount" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->CancelAmount->caption() ?></span></script></span></td>
		<td data-name="CancelAmount"<?php echo $view_billing_voucher_voucher->CancelAmount->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_CancelAmount" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_CancelAmount">
<span<?php echo $view_billing_voucher_voucher->CancelAmount->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->CancelAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->CancelBankName->Visible) { // CancelBankName ?>
	<tr id="r_CancelBankName">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_CancelBankName"><script id="tpc_view_billing_voucher_voucher_CancelBankName" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->CancelBankName->caption() ?></span></script></span></td>
		<td data-name="CancelBankName"<?php echo $view_billing_voucher_voucher->CancelBankName->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_CancelBankName" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_CancelBankName">
<span<?php echo $view_billing_voucher_voucher->CancelBankName->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->CancelBankName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
	<tr id="r_CancelTransactionNumber">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_CancelTransactionNumber"><script id="tpc_view_billing_voucher_voucher_CancelTransactionNumber" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->CancelTransactionNumber->caption() ?></span></script></span></td>
		<td data-name="CancelTransactionNumber"<?php echo $view_billing_voucher_voucher->CancelTransactionNumber->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_CancelTransactionNumber" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_CancelTransactionNumber">
<span<?php echo $view_billing_voucher_voucher->CancelTransactionNumber->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->CancelTransactionNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->LabTest->Visible) { // LabTest ?>
	<tr id="r_LabTest">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_LabTest"><script id="tpc_view_billing_voucher_voucher_LabTest" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->LabTest->caption() ?></span></script></span></td>
		<td data-name="LabTest"<?php echo $view_billing_voucher_voucher->LabTest->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_LabTest" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_LabTest">
<span<?php echo $view_billing_voucher_voucher->LabTest->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->LabTest->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->sid->Visible) { // sid ?>
	<tr id="r_sid">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_sid"><script id="tpc_view_billing_voucher_voucher_sid" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->sid->caption() ?></span></script></span></td>
		<td data-name="sid"<?php echo $view_billing_voucher_voucher->sid->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_sid" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_sid">
<span<?php echo $view_billing_voucher_voucher->sid->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->sid->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->SidNo->Visible) { // SidNo ?>
	<tr id="r_SidNo">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_SidNo"><script id="tpc_view_billing_voucher_voucher_SidNo" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->SidNo->caption() ?></span></script></span></td>
		<td data-name="SidNo"<?php echo $view_billing_voucher_voucher->SidNo->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_SidNo" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_SidNo">
<span<?php echo $view_billing_voucher_voucher->SidNo->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->SidNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->createdDatettime->Visible) { // createdDatettime ?>
	<tr id="r_createdDatettime">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_createdDatettime"><script id="tpc_view_billing_voucher_voucher_createdDatettime" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->createdDatettime->caption() ?></span></script></span></td>
		<td data-name="createdDatettime"<?php echo $view_billing_voucher_voucher->createdDatettime->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_createdDatettime" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_createdDatettime">
<span<?php echo $view_billing_voucher_voucher->createdDatettime->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->createdDatettime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->LabTestReleased->Visible) { // LabTestReleased ?>
	<tr id="r_LabTestReleased">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_LabTestReleased"><script id="tpc_view_billing_voucher_voucher_LabTestReleased" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->LabTestReleased->caption() ?></span></script></span></td>
		<td data-name="LabTestReleased"<?php echo $view_billing_voucher_voucher->LabTestReleased->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_LabTestReleased" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_LabTestReleased">
<span<?php echo $view_billing_voucher_voucher->LabTestReleased->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->LabTestReleased->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($view_billing_voucher_voucher->GoogleReviewID->Visible) { // GoogleReviewID ?>
	<tr id="r_GoogleReviewID">
		<td class="<?php echo $view_billing_voucher_voucher_view->TableLeftColumnClass ?>"><span id="elh_view_billing_voucher_voucher_GoogleReviewID"><script id="tpc_view_billing_voucher_voucher_GoogleReviewID" class="view_billing_voucher_voucherview" type="text/html"><span><?php echo $view_billing_voucher_voucher->GoogleReviewID->caption() ?></span></script></span></td>
		<td data-name="GoogleReviewID"<?php echo $view_billing_voucher_voucher->GoogleReviewID->cellAttributes() ?>>
<script id="tpx_view_billing_voucher_voucher_GoogleReviewID" class="view_billing_voucher_voucherview" type="text/html">
<span id="el_view_billing_voucher_voucher_GoogleReviewID">
<span<?php echo $view_billing_voucher_voucher->GoogleReviewID->viewAttributes() ?>>
<?php echo $view_billing_voucher_voucher->GoogleReviewID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_view_billing_voucher_voucherview" class="ew-custom-template"></div>
<script id="tpm_view_billing_voucher_voucherview" type="text/html">
<div id="ct_view_billing_voucher_voucher_view"><style>
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
			$HospID = $Page->HospID->CurrentValue;
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
 $sqlip = "SELECT * FROM ganeshkumar_bjhims.ip_admission where BillNumber='".$Page->BillNumber->CurrentValue."' ;";
$ipadmission = $dbhelper->ExecuteRows($sqlip);
 ?>
<table width="100%">
	 <tbody>
		<tr>
<td></td>
<td>
<?php
		if($Page->ReportHeader->CurrentValue=="Yes")
		{
			echo '<h5 align="center"><u>PATIENT BILL OF SUPPLY</u></h5>';
		}else{
			echo '<h2 align="center">PATIENT BILL OF SUPPLY</h2>';
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
		<tr><td  style="float:left;">Patient Id: <?php echo $PatientID; ?> </td><td  style="float: right;">Date of Admission: <?php echo date("d-m-Y", strtotime($ipadmission[0]["admission_date"])); ?> </td></tr>
		<tr><td  style="float:left;">Patient Name: {{:PatientName}}</td><td  style="float: right;">Date of Discharge: <?php echo date("d-m-Y", strtotime($ipadmission[0]["release_date"])); ?> </td></tr>
		<tr><td  style="float:left;"> Age: <?php echo $Age; ?> </td><td  style="float: right;">Consultant: {{:Doctor}}</td></tr>
		<tr><td  style="float:left;width:50%;">Gender: <?php echo $gender; ?> </td><td  style="float: right;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td></tr>
		<tr><td  style="float:left;width:50%;">Address: <?php echo $address; ?> </td><td  style="float: right;"> <?php  if($Page->SidNo->CurrentValue != null){  echo "Sid No.:".$Page->SidNo->CurrentValue; }  ?></td></tr>
	</tbody>
</table>
	</font>
		<font size="4" >
<br><br>
Received with thanks from Mr/Mrs {{:PatientName}},
&nbsp; 
<br>
The sum of Rupees  <?php echo convertToIndianCurrency($Page->Amount->CurrentValue); ?> in {{:CancelBill}} of our Bill No: {{:BillNumber}} dated  <?php echo date("d-m-Y", strtotime($Page->createddatetime->CurrentValue)); ?> by {{:ModeofPayment}}.     
&nbsp; 
<br>
Amount :- {{:Amount}} <br>
Mode of Payment :- {{:ModeofPayment}}
<img src='<?php echo $tt; ?>' alt style="border: 0;">
<p align="right">Signature<p>
<p align="right">
{{:UserName}}
<p>
	  </font>
</div>
</script>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($view_billing_voucher_voucher->Rows) ?> };
ew.applyTemplate("tpd_view_billing_voucher_voucherview", "tpm_view_billing_voucher_voucherview", "view_billing_voucher_voucherview", "<?php echo $view_billing_voucher_voucher->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.view_billing_voucher_voucherview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$view_billing_voucher_voucher_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$view_billing_voucher_voucher->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$view_billing_voucher_voucher_view->terminate();
?>
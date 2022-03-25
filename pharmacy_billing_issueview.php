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
$pharmacy_billing_issue_view = new pharmacy_billing_issue_view();

// Run the page
$pharmacy_billing_issue_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_billing_issue_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$pharmacy_billing_issue->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpharmacy_billing_issueview = currentForm = new ew.Form("fpharmacy_billing_issueview", "view");

// Form_CustomValidate event
fpharmacy_billing_issueview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_billing_issueview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_billing_issueview.lists["x_Reception"] = <?php echo $pharmacy_billing_issue_view->Reception->Lookup->toClientList() ?>;
fpharmacy_billing_issueview.lists["x_Reception"].options = <?php echo JsonEncode($pharmacy_billing_issue_view->Reception->lookupOptions()) ?>;
fpharmacy_billing_issueview.lists["x_ModeofPayment"] = <?php echo $pharmacy_billing_issue_view->ModeofPayment->Lookup->toClientList() ?>;
fpharmacy_billing_issueview.lists["x_ModeofPayment"].options = <?php echo JsonEncode($pharmacy_billing_issue_view->ModeofPayment->options(FALSE, TRUE)) ?>;
fpharmacy_billing_issueview.lists["x_RIDNO"] = <?php echo $pharmacy_billing_issue_view->RIDNO->Lookup->toClientList() ?>;
fpharmacy_billing_issueview.lists["x_RIDNO"].options = <?php echo JsonEncode($pharmacy_billing_issue_view->RIDNO->lookupOptions()) ?>;
fpharmacy_billing_issueview.lists["x_CId"] = <?php echo $pharmacy_billing_issue_view->CId->Lookup->toClientList() ?>;
fpharmacy_billing_issueview.lists["x_CId"].options = <?php echo JsonEncode($pharmacy_billing_issue_view->CId->lookupOptions()) ?>;
fpharmacy_billing_issueview.lists["x_PatId"] = <?php echo $pharmacy_billing_issue_view->PatId->Lookup->toClientList() ?>;
fpharmacy_billing_issueview.lists["x_PatId"].options = <?php echo JsonEncode($pharmacy_billing_issue_view->PatId->lookupOptions()) ?>;
fpharmacy_billing_issueview.lists["x_RefferedBy"] = <?php echo $pharmacy_billing_issue_view->RefferedBy->Lookup->toClientList() ?>;
fpharmacy_billing_issueview.lists["x_RefferedBy"].options = <?php echo JsonEncode($pharmacy_billing_issue_view->RefferedBy->lookupOptions()) ?>;
fpharmacy_billing_issueview.lists["x_DrID"] = <?php echo $pharmacy_billing_issue_view->DrID->Lookup->toClientList() ?>;
fpharmacy_billing_issueview.lists["x_DrID"].options = <?php echo JsonEncode($pharmacy_billing_issue_view->DrID->lookupOptions()) ?>;
fpharmacy_billing_issueview.lists["x_ReportHeader[]"] = <?php echo $pharmacy_billing_issue_view->ReportHeader->Lookup->toClientList() ?>;
fpharmacy_billing_issueview.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($pharmacy_billing_issue_view->ReportHeader->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pharmacy_billing_issue->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_billing_issue_view->ExportOptions->render("body") ?>
<?php $pharmacy_billing_issue_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_billing_issue_view->showPageHeader(); ?>
<?php
$pharmacy_billing_issue_view->showMessage();
?>
<form name="fpharmacy_billing_issueview" id="fpharmacy_billing_issueview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_billing_issue_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_billing_issue_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_issue">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_billing_issue_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table d-none">
<?php if ($pharmacy_billing_issue->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_id"><script id="tpc_pharmacy_billing_issue_id" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->id->caption() ?></span></script></span></td>
		<td data-name="id"<?php echo $pharmacy_billing_issue->id->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_id" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_id">
<span<?php echo $pharmacy_billing_issue->id->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->id->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_Reception"><script id="tpc_pharmacy_billing_issue_Reception" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->Reception->caption() ?></span></script></span></td>
		<td data-name="Reception"<?php echo $pharmacy_billing_issue->Reception->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Reception" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_Reception">
<span<?php echo $pharmacy_billing_issue->Reception->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->Reception->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_PatientId"><script id="tpc_pharmacy_billing_issue_PatientId" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->PatientId->caption() ?></span></script></span></td>
		<td data-name="PatientId"<?php echo $pharmacy_billing_issue->PatientId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_PatientId" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_PatientId">
<span<?php echo $pharmacy_billing_issue->PatientId->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->PatientId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_mrnno"><script id="tpc_pharmacy_billing_issue_mrnno" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->mrnno->caption() ?></span></script></span></td>
		<td data-name="mrnno"<?php echo $pharmacy_billing_issue->mrnno->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_mrnno" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_mrnno">
<span<?php echo $pharmacy_billing_issue->mrnno->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->mrnno->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_PatientName"><script id="tpc_pharmacy_billing_issue_PatientName" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->PatientName->caption() ?></span></script></span></td>
		<td data-name="PatientName"<?php echo $pharmacy_billing_issue->PatientName->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_PatientName" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_PatientName">
<span<?php echo $pharmacy_billing_issue->PatientName->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->PatientName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_Age"><script id="tpc_pharmacy_billing_issue_Age" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->Age->caption() ?></span></script></span></td>
		<td data-name="Age"<?php echo $pharmacy_billing_issue->Age->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Age" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_Age">
<span<?php echo $pharmacy_billing_issue->Age->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->Age->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_Gender"><script id="tpc_pharmacy_billing_issue_Gender" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->Gender->caption() ?></span></script></span></td>
		<td data-name="Gender"<?php echo $pharmacy_billing_issue->Gender->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Gender" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_Gender">
<span<?php echo $pharmacy_billing_issue->Gender->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->Gender->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_profilePic"><script id="tpc_pharmacy_billing_issue_profilePic" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->profilePic->caption() ?></span></script></span></td>
		<td data-name="profilePic"<?php echo $pharmacy_billing_issue->profilePic->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_profilePic" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_profilePic">
<span<?php echo $pharmacy_billing_issue->profilePic->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->profilePic->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->Mobile->Visible) { // Mobile ?>
	<tr id="r_Mobile">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_Mobile"><script id="tpc_pharmacy_billing_issue_Mobile" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->Mobile->caption() ?></span></script></span></td>
		<td data-name="Mobile"<?php echo $pharmacy_billing_issue->Mobile->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Mobile" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_Mobile">
<span<?php echo $pharmacy_billing_issue->Mobile->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->Mobile->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->IP_OP->Visible) { // IP_OP ?>
	<tr id="r_IP_OP">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_IP_OP"><script id="tpc_pharmacy_billing_issue_IP_OP" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->IP_OP->caption() ?></span></script></span></td>
		<td data-name="IP_OP"<?php echo $pharmacy_billing_issue->IP_OP->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_IP_OP" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_IP_OP">
<span<?php echo $pharmacy_billing_issue->IP_OP->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->IP_OP->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->Doctor->Visible) { // Doctor ?>
	<tr id="r_Doctor">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_Doctor"><script id="tpc_pharmacy_billing_issue_Doctor" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->Doctor->caption() ?></span></script></span></td>
		<td data-name="Doctor"<?php echo $pharmacy_billing_issue->Doctor->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Doctor" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_Doctor">
<span<?php echo $pharmacy_billing_issue->Doctor->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->Doctor->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->voucher_type->Visible) { // voucher_type ?>
	<tr id="r_voucher_type">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_voucher_type"><script id="tpc_pharmacy_billing_issue_voucher_type" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->voucher_type->caption() ?></span></script></span></td>
		<td data-name="voucher_type"<?php echo $pharmacy_billing_issue->voucher_type->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_voucher_type" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_voucher_type">
<span<?php echo $pharmacy_billing_issue->voucher_type->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->voucher_type->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_Details"><script id="tpc_pharmacy_billing_issue_Details" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->Details->caption() ?></span></script></span></td>
		<td data-name="Details"<?php echo $pharmacy_billing_issue->Details->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Details" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_Details">
<span<?php echo $pharmacy_billing_issue->Details->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->Details->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->ModeofPayment->Visible) { // ModeofPayment ?>
	<tr id="r_ModeofPayment">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_ModeofPayment"><script id="tpc_pharmacy_billing_issue_ModeofPayment" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->ModeofPayment->caption() ?></span></script></span></td>
		<td data-name="ModeofPayment"<?php echo $pharmacy_billing_issue->ModeofPayment->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_ModeofPayment" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_ModeofPayment">
<span<?php echo $pharmacy_billing_issue->ModeofPayment->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->ModeofPayment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_Amount"><script id="tpc_pharmacy_billing_issue_Amount" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->Amount->caption() ?></span></script></span></td>
		<td data-name="Amount"<?php echo $pharmacy_billing_issue->Amount->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Amount" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_Amount">
<span<?php echo $pharmacy_billing_issue->Amount->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->Amount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->AnyDues->Visible) { // AnyDues ?>
	<tr id="r_AnyDues">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_AnyDues"><script id="tpc_pharmacy_billing_issue_AnyDues" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->AnyDues->caption() ?></span></script></span></td>
		<td data-name="AnyDues"<?php echo $pharmacy_billing_issue->AnyDues->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_AnyDues" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_AnyDues">
<span<?php echo $pharmacy_billing_issue->AnyDues->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->AnyDues->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_createdby"><script id="tpc_pharmacy_billing_issue_createdby" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->createdby->caption() ?></span></script></span></td>
		<td data-name="createdby"<?php echo $pharmacy_billing_issue->createdby->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_createdby" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_createdby">
<span<?php echo $pharmacy_billing_issue->createdby->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->createdby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_createddatetime"><script id="tpc_pharmacy_billing_issue_createddatetime" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->createddatetime->caption() ?></span></script></span></td>
		<td data-name="createddatetime"<?php echo $pharmacy_billing_issue->createddatetime->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_createddatetime" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_createddatetime">
<span<?php echo $pharmacy_billing_issue->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->createddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_modifiedby"><script id="tpc_pharmacy_billing_issue_modifiedby" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->modifiedby->caption() ?></span></script></span></td>
		<td data-name="modifiedby"<?php echo $pharmacy_billing_issue->modifiedby->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_modifiedby" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_modifiedby">
<span<?php echo $pharmacy_billing_issue->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->modifiedby->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_modifieddatetime"><script id="tpc_pharmacy_billing_issue_modifieddatetime" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->modifieddatetime->caption() ?></span></script></span></td>
		<td data-name="modifieddatetime"<?php echo $pharmacy_billing_issue->modifieddatetime->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_modifieddatetime" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_modifieddatetime">
<span<?php echo $pharmacy_billing_issue->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->modifieddatetime->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->RealizationAmount->Visible) { // RealizationAmount ?>
	<tr id="r_RealizationAmount">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_RealizationAmount"><script id="tpc_pharmacy_billing_issue_RealizationAmount" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->RealizationAmount->caption() ?></span></script></span></td>
		<td data-name="RealizationAmount"<?php echo $pharmacy_billing_issue->RealizationAmount->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_RealizationAmount" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_RealizationAmount">
<span<?php echo $pharmacy_billing_issue->RealizationAmount->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->RealizationAmount->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->RealizationStatus->Visible) { // RealizationStatus ?>
	<tr id="r_RealizationStatus">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_RealizationStatus"><script id="tpc_pharmacy_billing_issue_RealizationStatus" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->RealizationStatus->caption() ?></span></script></span></td>
		<td data-name="RealizationStatus"<?php echo $pharmacy_billing_issue->RealizationStatus->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_RealizationStatus" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_RealizationStatus">
<span<?php echo $pharmacy_billing_issue->RealizationStatus->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->RealizationStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<tr id="r_RealizationRemarks">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_RealizationRemarks"><script id="tpc_pharmacy_billing_issue_RealizationRemarks" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->RealizationRemarks->caption() ?></span></script></span></td>
		<td data-name="RealizationRemarks"<?php echo $pharmacy_billing_issue->RealizationRemarks->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_RealizationRemarks" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_RealizationRemarks">
<span<?php echo $pharmacy_billing_issue->RealizationRemarks->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->RealizationRemarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<tr id="r_RealizationBatchNo">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_RealizationBatchNo"><script id="tpc_pharmacy_billing_issue_RealizationBatchNo" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->RealizationBatchNo->caption() ?></span></script></span></td>
		<td data-name="RealizationBatchNo"<?php echo $pharmacy_billing_issue->RealizationBatchNo->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_RealizationBatchNo" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_RealizationBatchNo">
<span<?php echo $pharmacy_billing_issue->RealizationBatchNo->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->RealizationBatchNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->RealizationDate->Visible) { // RealizationDate ?>
	<tr id="r_RealizationDate">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_RealizationDate"><script id="tpc_pharmacy_billing_issue_RealizationDate" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->RealizationDate->caption() ?></span></script></span></td>
		<td data-name="RealizationDate"<?php echo $pharmacy_billing_issue->RealizationDate->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_RealizationDate" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_RealizationDate">
<span<?php echo $pharmacy_billing_issue->RealizationDate->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->RealizationDate->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_HospID"><script id="tpc_pharmacy_billing_issue_HospID" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->HospID->caption() ?></span></script></span></td>
		<td data-name="HospID"<?php echo $pharmacy_billing_issue->HospID->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_HospID" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_HospID">
<span<?php echo $pharmacy_billing_issue->HospID->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->HospID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_RIDNO"><script id="tpc_pharmacy_billing_issue_RIDNO" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->RIDNO->caption() ?></span></script></span></td>
		<td data-name="RIDNO"<?php echo $pharmacy_billing_issue->RIDNO->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_RIDNO" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_RIDNO">
<span<?php echo $pharmacy_billing_issue->RIDNO->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->RIDNO->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_TidNo"><script id="tpc_pharmacy_billing_issue_TidNo" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->TidNo->caption() ?></span></script></span></td>
		<td data-name="TidNo"<?php echo $pharmacy_billing_issue->TidNo->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_TidNo" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_TidNo">
<span<?php echo $pharmacy_billing_issue->TidNo->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->TidNo->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->CId->Visible) { // CId ?>
	<tr id="r_CId">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_CId"><script id="tpc_pharmacy_billing_issue_CId" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->CId->caption() ?></span></script></span></td>
		<td data-name="CId"<?php echo $pharmacy_billing_issue->CId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_CId" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_CId">
<span<?php echo $pharmacy_billing_issue->CId->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->CId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_PartnerName"><script id="tpc_pharmacy_billing_issue_PartnerName" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->PartnerName->caption() ?></span></script></span></td>
		<td data-name="PartnerName"<?php echo $pharmacy_billing_issue->PartnerName->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_PartnerName" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_PartnerName">
<span<?php echo $pharmacy_billing_issue->PartnerName->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->PartnerName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->PayerType->Visible) { // PayerType ?>
	<tr id="r_PayerType">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_PayerType"><script id="tpc_pharmacy_billing_issue_PayerType" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->PayerType->caption() ?></span></script></span></td>
		<td data-name="PayerType"<?php echo $pharmacy_billing_issue->PayerType->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_PayerType" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_PayerType">
<span<?php echo $pharmacy_billing_issue->PayerType->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->PayerType->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->Dob->Visible) { // Dob ?>
	<tr id="r_Dob">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_Dob"><script id="tpc_pharmacy_billing_issue_Dob" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->Dob->caption() ?></span></script></span></td>
		<td data-name="Dob"<?php echo $pharmacy_billing_issue->Dob->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Dob" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_Dob">
<span<?php echo $pharmacy_billing_issue->Dob->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->Dob->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->Currency->Visible) { // Currency ?>
	<tr id="r_Currency">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_Currency"><script id="tpc_pharmacy_billing_issue_Currency" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->Currency->caption() ?></span></script></span></td>
		<td data-name="Currency"<?php echo $pharmacy_billing_issue->Currency->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Currency" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_Currency">
<span<?php echo $pharmacy_billing_issue->Currency->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->Currency->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<tr id="r_DiscountRemarks">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_DiscountRemarks"><script id="tpc_pharmacy_billing_issue_DiscountRemarks" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->DiscountRemarks->caption() ?></span></script></span></td>
		<td data-name="DiscountRemarks"<?php echo $pharmacy_billing_issue->DiscountRemarks->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_DiscountRemarks" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_DiscountRemarks">
<span<?php echo $pharmacy_billing_issue->DiscountRemarks->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->DiscountRemarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_Remarks"><script id="tpc_pharmacy_billing_issue_Remarks" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->Remarks->caption() ?></span></script></span></td>
		<td data-name="Remarks"<?php echo $pharmacy_billing_issue->Remarks->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_Remarks" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_Remarks">
<span<?php echo $pharmacy_billing_issue->Remarks->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->Remarks->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->PatId->Visible) { // PatId ?>
	<tr id="r_PatId">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_PatId"><script id="tpc_pharmacy_billing_issue_PatId" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->PatId->caption() ?></span></script></span></td>
		<td data-name="PatId"<?php echo $pharmacy_billing_issue->PatId->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_PatId" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_PatId">
<span<?php echo $pharmacy_billing_issue->PatId->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->PatId->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->DrDepartment->Visible) { // DrDepartment ?>
	<tr id="r_DrDepartment">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_DrDepartment"><script id="tpc_pharmacy_billing_issue_DrDepartment" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->DrDepartment->caption() ?></span></script></span></td>
		<td data-name="DrDepartment"<?php echo $pharmacy_billing_issue->DrDepartment->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_DrDepartment" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_DrDepartment">
<span<?php echo $pharmacy_billing_issue->DrDepartment->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->DrDepartment->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->RefferedBy->Visible) { // RefferedBy ?>
	<tr id="r_RefferedBy">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_RefferedBy"><script id="tpc_pharmacy_billing_issue_RefferedBy" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->RefferedBy->caption() ?></span></script></span></td>
		<td data-name="RefferedBy"<?php echo $pharmacy_billing_issue->RefferedBy->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_RefferedBy" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_RefferedBy">
<span<?php echo $pharmacy_billing_issue->RefferedBy->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->RefferedBy->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->BillNumber->Visible) { // BillNumber ?>
	<tr id="r_BillNumber">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_BillNumber"><script id="tpc_pharmacy_billing_issue_BillNumber" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->BillNumber->caption() ?></span></script></span></td>
		<td data-name="BillNumber"<?php echo $pharmacy_billing_issue->BillNumber->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_BillNumber" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_BillNumber">
<span<?php echo $pharmacy_billing_issue->BillNumber->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->BillNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->CardNumber->Visible) { // CardNumber ?>
	<tr id="r_CardNumber">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_CardNumber"><script id="tpc_pharmacy_billing_issue_CardNumber" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->CardNumber->caption() ?></span></script></span></td>
		<td data-name="CardNumber"<?php echo $pharmacy_billing_issue->CardNumber->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_CardNumber" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_CardNumber">
<span<?php echo $pharmacy_billing_issue->CardNumber->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->CardNumber->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->BankName->Visible) { // BankName ?>
	<tr id="r_BankName">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_BankName"><script id="tpc_pharmacy_billing_issue_BankName" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->BankName->caption() ?></span></script></span></td>
		<td data-name="BankName"<?php echo $pharmacy_billing_issue->BankName->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_BankName" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_BankName">
<span<?php echo $pharmacy_billing_issue->BankName->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->BankName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->DrID->Visible) { // DrID ?>
	<tr id="r_DrID">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_DrID"><script id="tpc_pharmacy_billing_issue_DrID" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->DrID->caption() ?></span></script></span></td>
		<td data-name="DrID"<?php echo $pharmacy_billing_issue->DrID->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_DrID" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_DrID">
<span<?php echo $pharmacy_billing_issue->DrID->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->DrID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->BillStatus->Visible) { // BillStatus ?>
	<tr id="r_BillStatus">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_BillStatus"><script id="tpc_pharmacy_billing_issue_BillStatus" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->BillStatus->caption() ?></span></script></span></td>
		<td data-name="BillStatus"<?php echo $pharmacy_billing_issue->BillStatus->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_BillStatus" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_BillStatus">
<span<?php echo $pharmacy_billing_issue->BillStatus->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->BillStatus->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->ReportHeader->Visible) { // ReportHeader ?>
	<tr id="r_ReportHeader">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_ReportHeader"><script id="tpc_pharmacy_billing_issue_ReportHeader" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->ReportHeader->caption() ?></span></script></span></td>
		<td data-name="ReportHeader"<?php echo $pharmacy_billing_issue->ReportHeader->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_ReportHeader" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_ReportHeader">
<span<?php echo $pharmacy_billing_issue->ReportHeader->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->ReportHeader->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->PharID->Visible) { // PharID ?>
	<tr id="r_PharID">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_PharID"><script id="tpc_pharmacy_billing_issue_PharID" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->PharID->caption() ?></span></script></span></td>
		<td data-name="PharID"<?php echo $pharmacy_billing_issue->PharID->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_PharID" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_PharID">
<span<?php echo $pharmacy_billing_issue->PharID->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->PharID->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_billing_issue->UserName->Visible) { // UserName ?>
	<tr id="r_UserName">
		<td class="<?php echo $pharmacy_billing_issue_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_billing_issue_UserName"><script id="tpc_pharmacy_billing_issue_UserName" class="pharmacy_billing_issueview" type="text/html"><span><?php echo $pharmacy_billing_issue->UserName->caption() ?></span></script></span></td>
		<td data-name="UserName"<?php echo $pharmacy_billing_issue->UserName->cellAttributes() ?>>
<script id="tpx_pharmacy_billing_issue_UserName" class="pharmacy_billing_issueview" type="text/html">
<span id="el_pharmacy_billing_issue_UserName">
<span<?php echo $pharmacy_billing_issue->UserName->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->UserName->getViewValue() ?></span>
</span>
</script>
</td>
	</tr>
<?php } ?>
</table>
<div id="tpd_pharmacy_billing_issueview" class="ew-custom-template"></div>
<script id="tpm_pharmacy_billing_issueview" type="text/html">
<div id="ct_pharmacy_billing_issue_view"><style>
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
 ?>
<table width="100%">
	 <tbody>
		<tr>
<td  style="float: left;"> </td>
<td  style="float: center;">
</td>
<td  style="float: right;"></td>
</tr>
	</tbody>
</table>
<table width="100%">
	 <tbody>
		<tr>
<td  style="float: left;"> </td>
<td  style="float: center;">
<h2 align="center">A4 PHARMACY</h2>
</td>
<td  style="float: right;"></td>
</tr>
	</tbody>
</table>
<table width="100%">
	 <tbody>
		<tr>
<td  style="float: left;"> </td>
<td  style="float: center;">
<h6 align="center">(A Unit of A4 Hospital)</h6>
</td>
<td  style="float: right;"></td>
</tr>
	</tbody>
</table>
<table width="100%">
	 <tbody>
		<tr>
<td  style="float: left;"> </td>
<td  style="float: center;">
<h5 align="center">No 87, Ground Floor, Arcot Road, Virugambakkam, Chennai 600 092.</h5>
</td>
<td  style="float: right;"></td>
</tr>
	</tbody>
</table>
<table width="100%">
	 <tbody>
		<tr>
<td  style="float: left;">PHNo:9840833666,7305058474</td>
<td  style="float: center;">
<?php
		if($Page->ReportHeader->CurrentValue=="Yes")
		{
			echo '<h5 align="center"><u>PATIENT ISSUE OF SUPPLY</u></h5>';
		}else{
			echo '<h5 align="center">BILL</h5>';
		}
?>
</td>
<td  style="float: right;">GSTIN: 33ANAPA6665QIZR<?php echo $HospGST; ?></td>
</tr>
	</tbody>
</table>
<font size="4" style="font-weight: bold;">
<table width="100%">
	 <tbody>
		<tr><td  style="float:left;">Patient Id: <?php echo $PatientID; ?> </td><td  style="float: right;"> <?php if($Page->voucher_type->CurrentValue != ""){ echo "Bill No : " . $Page->voucher_type->CurrentValue;}else { echo "Bill No : AFPHIS" . $Page->id->CurrentValue;} ?>  </td></tr>
		<tr><td  style="float:left;">Patient Name: {{:PatientName}}</td><td  style="float: right;">Issue Date:<?php echo date("d-m-Y", strtotime($Page->createddatetime->CurrentValue)); ?></td></tr>
		<tr><td  style="float:left;"> Age: <?php echo $Age; ?> </td><td  style="float: right;">Consultant: {{:Doctor}}</td></tr>
		<tr><td  style="float:left;width:50%;">Gender: <?php echo $gender; ?> </td><td  style="float: right;"><img src='<?php echo $aa; ?>' alt style="border: 0;"></td></tr>
		<tr><td  style="float:left;width:50%;">Address: <?php echo $address; ?> </td><td  style="float: right;">D.L. NO:00142|ZII|20&21</td></tr>
	</tbody>
</table>
	</font>
		<font size="4" >
<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td><b>SiNo</b></td>
<td><b>Product</b></td>
		<td><b>Mfg</b></td>
		<td><b>Exp</b></td>
		<td><b>Batch</b></td>
		<td><b>Qty</b></td>
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
$sql = "SELECT * FROM ganeshkumar_bjhims.pharmacy_pharled where pbt='".$invoiceId."' ;";
$rs = $dbhelper->LoadRecordset($sql);
while (!$rs->EOF) {
	$row = &$rs->fields;
	$SiNo =  $row["SiNo"];
	$Product =  $row["Product"];
	$Mfg =  $row["Mfg"];
	$EXPDT =   date("Y-M", strtotime($row["EXPDT"]));
	$BATCHNO =  $row["BATCHNO"];
	$IQ =  (int)$row["IQ"];
	$DAMT =  $row["DAMT"];
	$hhh .= '<tr><td>'.$SiNo.'</td><td>'.$Product.'</td><td>'.$Mfg.'</td>  ';
	$hhh .= '<td>'.$EXPDT.'</td><td>'.$BATCHNO.'</td><td>'.$IQ.'</td>  ';
	$hhh .= '<td align="right">'.$DAMT.'</td></tr>  ';
	$rs->MoveNext();
}
$hhh .= '<tr><td></td><td></td><td></td><td></td><td></td><td align="right">Total</td><td align="right">'.$Page->Amount->CurrentValue.'</td></tr>  ';
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
	if (in_array("pharmacy_pharled", explode(",", $pharmacy_billing_issue->getCurrentDetailTable())) && $pharmacy_pharled->DetailView) {
?>
<?php if ($pharmacy_billing_issue->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("pharmacy_pharled", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "pharmacy_pharledgrid.php" ?>
<?php } ?>
</form>
<script>
ew.vars.templateData = { rows: <?php echo JsonEncode($pharmacy_billing_issue->Rows) ?> };
ew.applyTemplate("tpd_pharmacy_billing_issueview", "tpm_pharmacy_billing_issueview", "pharmacy_billing_issueview", "<?php echo $pharmacy_billing_issue->CustomExport ?>", ew.vars.templateData.rows[0]);
jQuery("script.pharmacy_billing_issueview_js").each(function(){ew.addScript(this.text);});
</script>
<?php
$pharmacy_billing_issue_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_billing_issue->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pharmacy_billing_issue_view->terminate();
?>
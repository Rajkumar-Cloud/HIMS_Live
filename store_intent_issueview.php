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
$store_intent_issue_view = new store_intent_issue_view();

// Run the page
$store_intent_issue_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_intent_issue_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$store_intent_issue->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fstore_intent_issueview = currentForm = new ew.Form("fstore_intent_issueview", "view");

// Form_CustomValidate event
fstore_intent_issueview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_intent_issueview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$store_intent_issue->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $store_intent_issue_view->ExportOptions->render("body") ?>
<?php $store_intent_issue_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $store_intent_issue_view->showPageHeader(); ?>
<?php
$store_intent_issue_view->showMessage();
?>
<form name="fstore_intent_issueview" id="fstore_intent_issueview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_intent_issue_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_intent_issue_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_intent_issue">
<input type="hidden" name="modal" value="<?php echo (int)$store_intent_issue_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($store_intent_issue->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_id"><?php echo $store_intent_issue->id->caption() ?></span></td>
		<td data-name="id"<?php echo $store_intent_issue->id->cellAttributes() ?>>
<span id="el_store_intent_issue_id">
<span<?php echo $store_intent_issue->id->viewAttributes() ?>>
<?php echo $store_intent_issue->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Reception"><?php echo $store_intent_issue->Reception->caption() ?></span></td>
		<td data-name="Reception"<?php echo $store_intent_issue->Reception->cellAttributes() ?>>
<span id="el_store_intent_issue_Reception">
<span<?php echo $store_intent_issue->Reception->viewAttributes() ?>>
<?php echo $store_intent_issue->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_PatientId"><?php echo $store_intent_issue->PatientId->caption() ?></span></td>
		<td data-name="PatientId"<?php echo $store_intent_issue->PatientId->cellAttributes() ?>>
<span id="el_store_intent_issue_PatientId">
<span<?php echo $store_intent_issue->PatientId->viewAttributes() ?>>
<?php echo $store_intent_issue->PatientId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_mrnno"><?php echo $store_intent_issue->mrnno->caption() ?></span></td>
		<td data-name="mrnno"<?php echo $store_intent_issue->mrnno->cellAttributes() ?>>
<span id="el_store_intent_issue_mrnno">
<span<?php echo $store_intent_issue->mrnno->viewAttributes() ?>>
<?php echo $store_intent_issue->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_PatientName"><?php echo $store_intent_issue->PatientName->caption() ?></span></td>
		<td data-name="PatientName"<?php echo $store_intent_issue->PatientName->cellAttributes() ?>>
<span id="el_store_intent_issue_PatientName">
<span<?php echo $store_intent_issue->PatientName->viewAttributes() ?>>
<?php echo $store_intent_issue->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Age"><?php echo $store_intent_issue->Age->caption() ?></span></td>
		<td data-name="Age"<?php echo $store_intent_issue->Age->cellAttributes() ?>>
<span id="el_store_intent_issue_Age">
<span<?php echo $store_intent_issue->Age->viewAttributes() ?>>
<?php echo $store_intent_issue->Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Gender"><?php echo $store_intent_issue->Gender->caption() ?></span></td>
		<td data-name="Gender"<?php echo $store_intent_issue->Gender->cellAttributes() ?>>
<span id="el_store_intent_issue_Gender">
<span<?php echo $store_intent_issue->Gender->viewAttributes() ?>>
<?php echo $store_intent_issue->Gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_profilePic"><?php echo $store_intent_issue->profilePic->caption() ?></span></td>
		<td data-name="profilePic"<?php echo $store_intent_issue->profilePic->cellAttributes() ?>>
<span id="el_store_intent_issue_profilePic">
<span<?php echo $store_intent_issue->profilePic->viewAttributes() ?>>
<?php echo $store_intent_issue->profilePic->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->Mobile->Visible) { // Mobile ?>
	<tr id="r_Mobile">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Mobile"><?php echo $store_intent_issue->Mobile->caption() ?></span></td>
		<td data-name="Mobile"<?php echo $store_intent_issue->Mobile->cellAttributes() ?>>
<span id="el_store_intent_issue_Mobile">
<span<?php echo $store_intent_issue->Mobile->viewAttributes() ?>>
<?php echo $store_intent_issue->Mobile->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->IP_OP->Visible) { // IP_OP ?>
	<tr id="r_IP_OP">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_IP_OP"><?php echo $store_intent_issue->IP_OP->caption() ?></span></td>
		<td data-name="IP_OP"<?php echo $store_intent_issue->IP_OP->cellAttributes() ?>>
<span id="el_store_intent_issue_IP_OP">
<span<?php echo $store_intent_issue->IP_OP->viewAttributes() ?>>
<?php echo $store_intent_issue->IP_OP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->Doctor->Visible) { // Doctor ?>
	<tr id="r_Doctor">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Doctor"><?php echo $store_intent_issue->Doctor->caption() ?></span></td>
		<td data-name="Doctor"<?php echo $store_intent_issue->Doctor->cellAttributes() ?>>
<span id="el_store_intent_issue_Doctor">
<span<?php echo $store_intent_issue->Doctor->viewAttributes() ?>>
<?php echo $store_intent_issue->Doctor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->voucher_type->Visible) { // voucher_type ?>
	<tr id="r_voucher_type">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_voucher_type"><?php echo $store_intent_issue->voucher_type->caption() ?></span></td>
		<td data-name="voucher_type"<?php echo $store_intent_issue->voucher_type->cellAttributes() ?>>
<span id="el_store_intent_issue_voucher_type">
<span<?php echo $store_intent_issue->voucher_type->viewAttributes() ?>>
<?php echo $store_intent_issue->voucher_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Details"><?php echo $store_intent_issue->Details->caption() ?></span></td>
		<td data-name="Details"<?php echo $store_intent_issue->Details->cellAttributes() ?>>
<span id="el_store_intent_issue_Details">
<span<?php echo $store_intent_issue->Details->viewAttributes() ?>>
<?php echo $store_intent_issue->Details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->ModeofPayment->Visible) { // ModeofPayment ?>
	<tr id="r_ModeofPayment">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_ModeofPayment"><?php echo $store_intent_issue->ModeofPayment->caption() ?></span></td>
		<td data-name="ModeofPayment"<?php echo $store_intent_issue->ModeofPayment->cellAttributes() ?>>
<span id="el_store_intent_issue_ModeofPayment">
<span<?php echo $store_intent_issue->ModeofPayment->viewAttributes() ?>>
<?php echo $store_intent_issue->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Amount"><?php echo $store_intent_issue->Amount->caption() ?></span></td>
		<td data-name="Amount"<?php echo $store_intent_issue->Amount->cellAttributes() ?>>
<span id="el_store_intent_issue_Amount">
<span<?php echo $store_intent_issue->Amount->viewAttributes() ?>>
<?php echo $store_intent_issue->Amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->AnyDues->Visible) { // AnyDues ?>
	<tr id="r_AnyDues">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_AnyDues"><?php echo $store_intent_issue->AnyDues->caption() ?></span></td>
		<td data-name="AnyDues"<?php echo $store_intent_issue->AnyDues->cellAttributes() ?>>
<span id="el_store_intent_issue_AnyDues">
<span<?php echo $store_intent_issue->AnyDues->viewAttributes() ?>>
<?php echo $store_intent_issue->AnyDues->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_createdby"><?php echo $store_intent_issue->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $store_intent_issue->createdby->cellAttributes() ?>>
<span id="el_store_intent_issue_createdby">
<span<?php echo $store_intent_issue->createdby->viewAttributes() ?>>
<?php echo $store_intent_issue->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_createddatetime"><?php echo $store_intent_issue->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $store_intent_issue->createddatetime->cellAttributes() ?>>
<span id="el_store_intent_issue_createddatetime">
<span<?php echo $store_intent_issue->createddatetime->viewAttributes() ?>>
<?php echo $store_intent_issue->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_modifiedby"><?php echo $store_intent_issue->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $store_intent_issue->modifiedby->cellAttributes() ?>>
<span id="el_store_intent_issue_modifiedby">
<span<?php echo $store_intent_issue->modifiedby->viewAttributes() ?>>
<?php echo $store_intent_issue->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_modifieddatetime"><?php echo $store_intent_issue->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $store_intent_issue->modifieddatetime->cellAttributes() ?>>
<span id="el_store_intent_issue_modifieddatetime">
<span<?php echo $store_intent_issue->modifieddatetime->viewAttributes() ?>>
<?php echo $store_intent_issue->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->RealizationAmount->Visible) { // RealizationAmount ?>
	<tr id="r_RealizationAmount">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RealizationAmount"><?php echo $store_intent_issue->RealizationAmount->caption() ?></span></td>
		<td data-name="RealizationAmount"<?php echo $store_intent_issue->RealizationAmount->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationAmount">
<span<?php echo $store_intent_issue->RealizationAmount->viewAttributes() ?>>
<?php echo $store_intent_issue->RealizationAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->RealizationStatus->Visible) { // RealizationStatus ?>
	<tr id="r_RealizationStatus">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RealizationStatus"><?php echo $store_intent_issue->RealizationStatus->caption() ?></span></td>
		<td data-name="RealizationStatus"<?php echo $store_intent_issue->RealizationStatus->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationStatus">
<span<?php echo $store_intent_issue->RealizationStatus->viewAttributes() ?>>
<?php echo $store_intent_issue->RealizationStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<tr id="r_RealizationRemarks">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RealizationRemarks"><?php echo $store_intent_issue->RealizationRemarks->caption() ?></span></td>
		<td data-name="RealizationRemarks"<?php echo $store_intent_issue->RealizationRemarks->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationRemarks">
<span<?php echo $store_intent_issue->RealizationRemarks->viewAttributes() ?>>
<?php echo $store_intent_issue->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<tr id="r_RealizationBatchNo">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RealizationBatchNo"><?php echo $store_intent_issue->RealizationBatchNo->caption() ?></span></td>
		<td data-name="RealizationBatchNo"<?php echo $store_intent_issue->RealizationBatchNo->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationBatchNo">
<span<?php echo $store_intent_issue->RealizationBatchNo->viewAttributes() ?>>
<?php echo $store_intent_issue->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->RealizationDate->Visible) { // RealizationDate ?>
	<tr id="r_RealizationDate">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RealizationDate"><?php echo $store_intent_issue->RealizationDate->caption() ?></span></td>
		<td data-name="RealizationDate"<?php echo $store_intent_issue->RealizationDate->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationDate">
<span<?php echo $store_intent_issue->RealizationDate->viewAttributes() ?>>
<?php echo $store_intent_issue->RealizationDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_HospID"><?php echo $store_intent_issue->HospID->caption() ?></span></td>
		<td data-name="HospID"<?php echo $store_intent_issue->HospID->cellAttributes() ?>>
<span id="el_store_intent_issue_HospID">
<span<?php echo $store_intent_issue->HospID->viewAttributes() ?>>
<?php echo $store_intent_issue->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RIDNO"><?php echo $store_intent_issue->RIDNO->caption() ?></span></td>
		<td data-name="RIDNO"<?php echo $store_intent_issue->RIDNO->cellAttributes() ?>>
<span id="el_store_intent_issue_RIDNO">
<span<?php echo $store_intent_issue->RIDNO->viewAttributes() ?>>
<?php echo $store_intent_issue->RIDNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_TidNo"><?php echo $store_intent_issue->TidNo->caption() ?></span></td>
		<td data-name="TidNo"<?php echo $store_intent_issue->TidNo->cellAttributes() ?>>
<span id="el_store_intent_issue_TidNo">
<span<?php echo $store_intent_issue->TidNo->viewAttributes() ?>>
<?php echo $store_intent_issue->TidNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->CId->Visible) { // CId ?>
	<tr id="r_CId">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_CId"><?php echo $store_intent_issue->CId->caption() ?></span></td>
		<td data-name="CId"<?php echo $store_intent_issue->CId->cellAttributes() ?>>
<span id="el_store_intent_issue_CId">
<span<?php echo $store_intent_issue->CId->viewAttributes() ?>>
<?php echo $store_intent_issue->CId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_PartnerName"><?php echo $store_intent_issue->PartnerName->caption() ?></span></td>
		<td data-name="PartnerName"<?php echo $store_intent_issue->PartnerName->cellAttributes() ?>>
<span id="el_store_intent_issue_PartnerName">
<span<?php echo $store_intent_issue->PartnerName->viewAttributes() ?>>
<?php echo $store_intent_issue->PartnerName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->PayerType->Visible) { // PayerType ?>
	<tr id="r_PayerType">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_PayerType"><?php echo $store_intent_issue->PayerType->caption() ?></span></td>
		<td data-name="PayerType"<?php echo $store_intent_issue->PayerType->cellAttributes() ?>>
<span id="el_store_intent_issue_PayerType">
<span<?php echo $store_intent_issue->PayerType->viewAttributes() ?>>
<?php echo $store_intent_issue->PayerType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->Dob->Visible) { // Dob ?>
	<tr id="r_Dob">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Dob"><?php echo $store_intent_issue->Dob->caption() ?></span></td>
		<td data-name="Dob"<?php echo $store_intent_issue->Dob->cellAttributes() ?>>
<span id="el_store_intent_issue_Dob">
<span<?php echo $store_intent_issue->Dob->viewAttributes() ?>>
<?php echo $store_intent_issue->Dob->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->Currency->Visible) { // Currency ?>
	<tr id="r_Currency">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Currency"><?php echo $store_intent_issue->Currency->caption() ?></span></td>
		<td data-name="Currency"<?php echo $store_intent_issue->Currency->cellAttributes() ?>>
<span id="el_store_intent_issue_Currency">
<span<?php echo $store_intent_issue->Currency->viewAttributes() ?>>
<?php echo $store_intent_issue->Currency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<tr id="r_DiscountRemarks">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_DiscountRemarks"><?php echo $store_intent_issue->DiscountRemarks->caption() ?></span></td>
		<td data-name="DiscountRemarks"<?php echo $store_intent_issue->DiscountRemarks->cellAttributes() ?>>
<span id="el_store_intent_issue_DiscountRemarks">
<span<?php echo $store_intent_issue->DiscountRemarks->viewAttributes() ?>>
<?php echo $store_intent_issue->DiscountRemarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Remarks"><?php echo $store_intent_issue->Remarks->caption() ?></span></td>
		<td data-name="Remarks"<?php echo $store_intent_issue->Remarks->cellAttributes() ?>>
<span id="el_store_intent_issue_Remarks">
<span<?php echo $store_intent_issue->Remarks->viewAttributes() ?>>
<?php echo $store_intent_issue->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->PatId->Visible) { // PatId ?>
	<tr id="r_PatId">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_PatId"><?php echo $store_intent_issue->PatId->caption() ?></span></td>
		<td data-name="PatId"<?php echo $store_intent_issue->PatId->cellAttributes() ?>>
<span id="el_store_intent_issue_PatId">
<span<?php echo $store_intent_issue->PatId->viewAttributes() ?>>
<?php echo $store_intent_issue->PatId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->DrDepartment->Visible) { // DrDepartment ?>
	<tr id="r_DrDepartment">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_DrDepartment"><?php echo $store_intent_issue->DrDepartment->caption() ?></span></td>
		<td data-name="DrDepartment"<?php echo $store_intent_issue->DrDepartment->cellAttributes() ?>>
<span id="el_store_intent_issue_DrDepartment">
<span<?php echo $store_intent_issue->DrDepartment->viewAttributes() ?>>
<?php echo $store_intent_issue->DrDepartment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->RefferedBy->Visible) { // RefferedBy ?>
	<tr id="r_RefferedBy">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RefferedBy"><?php echo $store_intent_issue->RefferedBy->caption() ?></span></td>
		<td data-name="RefferedBy"<?php echo $store_intent_issue->RefferedBy->cellAttributes() ?>>
<span id="el_store_intent_issue_RefferedBy">
<span<?php echo $store_intent_issue->RefferedBy->viewAttributes() ?>>
<?php echo $store_intent_issue->RefferedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->BillNumber->Visible) { // BillNumber ?>
	<tr id="r_BillNumber">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_BillNumber"><?php echo $store_intent_issue->BillNumber->caption() ?></span></td>
		<td data-name="BillNumber"<?php echo $store_intent_issue->BillNumber->cellAttributes() ?>>
<span id="el_store_intent_issue_BillNumber">
<span<?php echo $store_intent_issue->BillNumber->viewAttributes() ?>>
<?php echo $store_intent_issue->BillNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->CardNumber->Visible) { // CardNumber ?>
	<tr id="r_CardNumber">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_CardNumber"><?php echo $store_intent_issue->CardNumber->caption() ?></span></td>
		<td data-name="CardNumber"<?php echo $store_intent_issue->CardNumber->cellAttributes() ?>>
<span id="el_store_intent_issue_CardNumber">
<span<?php echo $store_intent_issue->CardNumber->viewAttributes() ?>>
<?php echo $store_intent_issue->CardNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->BankName->Visible) { // BankName ?>
	<tr id="r_BankName">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_BankName"><?php echo $store_intent_issue->BankName->caption() ?></span></td>
		<td data-name="BankName"<?php echo $store_intent_issue->BankName->cellAttributes() ?>>
<span id="el_store_intent_issue_BankName">
<span<?php echo $store_intent_issue->BankName->viewAttributes() ?>>
<?php echo $store_intent_issue->BankName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->DrID->Visible) { // DrID ?>
	<tr id="r_DrID">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_DrID"><?php echo $store_intent_issue->DrID->caption() ?></span></td>
		<td data-name="DrID"<?php echo $store_intent_issue->DrID->cellAttributes() ?>>
<span id="el_store_intent_issue_DrID">
<span<?php echo $store_intent_issue->DrID->viewAttributes() ?>>
<?php echo $store_intent_issue->DrID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->BillStatus->Visible) { // BillStatus ?>
	<tr id="r_BillStatus">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_BillStatus"><?php echo $store_intent_issue->BillStatus->caption() ?></span></td>
		<td data-name="BillStatus"<?php echo $store_intent_issue->BillStatus->cellAttributes() ?>>
<span id="el_store_intent_issue_BillStatus">
<span<?php echo $store_intent_issue->BillStatus->viewAttributes() ?>>
<?php echo $store_intent_issue->BillStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->ReportHeader->Visible) { // ReportHeader ?>
	<tr id="r_ReportHeader">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_ReportHeader"><?php echo $store_intent_issue->ReportHeader->caption() ?></span></td>
		<td data-name="ReportHeader"<?php echo $store_intent_issue->ReportHeader->cellAttributes() ?>>
<span id="el_store_intent_issue_ReportHeader">
<span<?php echo $store_intent_issue->ReportHeader->viewAttributes() ?>>
<?php echo $store_intent_issue->ReportHeader->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->StoreID->Visible) { // StoreID ?>
	<tr id="r_StoreID">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_StoreID"><?php echo $store_intent_issue->StoreID->caption() ?></span></td>
		<td data-name="StoreID"<?php echo $store_intent_issue->StoreID->cellAttributes() ?>>
<span id="el_store_intent_issue_StoreID">
<span<?php echo $store_intent_issue->StoreID->viewAttributes() ?>>
<?php echo $store_intent_issue->StoreID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue->BranchID->Visible) { // BranchID ?>
	<tr id="r_BranchID">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_BranchID"><?php echo $store_intent_issue->BranchID->caption() ?></span></td>
		<td data-name="BranchID"<?php echo $store_intent_issue->BranchID->cellAttributes() ?>>
<span id="el_store_intent_issue_BranchID">
<span<?php echo $store_intent_issue->BranchID->viewAttributes() ?>>
<?php echo $store_intent_issue->BranchID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$store_intent_issue_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$store_intent_issue->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$store_intent_issue_view->terminate();
?>
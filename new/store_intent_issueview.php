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
<?php include_once "header.php"; ?>
<?php if (!$store_intent_issue_view->isExport()) { ?>
<script>
var fstore_intent_issueview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fstore_intent_issueview = currentForm = new ew.Form("fstore_intent_issueview", "view");
	loadjs.done("fstore_intent_issueview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$store_intent_issue_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_intent_issue">
<input type="hidden" name="modal" value="<?php echo (int)$store_intent_issue_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($store_intent_issue_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_id"><?php echo $store_intent_issue_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $store_intent_issue_view->id->cellAttributes() ?>>
<span id="el_store_intent_issue_id">
<span<?php echo $store_intent_issue_view->id->viewAttributes() ?>><?php echo $store_intent_issue_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Reception"><?php echo $store_intent_issue_view->Reception->caption() ?></span></td>
		<td data-name="Reception" <?php echo $store_intent_issue_view->Reception->cellAttributes() ?>>
<span id="el_store_intent_issue_Reception">
<span<?php echo $store_intent_issue_view->Reception->viewAttributes() ?>><?php echo $store_intent_issue_view->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->PatientId->Visible) { // PatientId ?>
	<tr id="r_PatientId">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_PatientId"><?php echo $store_intent_issue_view->PatientId->caption() ?></span></td>
		<td data-name="PatientId" <?php echo $store_intent_issue_view->PatientId->cellAttributes() ?>>
<span id="el_store_intent_issue_PatientId">
<span<?php echo $store_intent_issue_view->PatientId->viewAttributes() ?>><?php echo $store_intent_issue_view->PatientId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_mrnno"><?php echo $store_intent_issue_view->mrnno->caption() ?></span></td>
		<td data-name="mrnno" <?php echo $store_intent_issue_view->mrnno->cellAttributes() ?>>
<span id="el_store_intent_issue_mrnno">
<span<?php echo $store_intent_issue_view->mrnno->viewAttributes() ?>><?php echo $store_intent_issue_view->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_PatientName"><?php echo $store_intent_issue_view->PatientName->caption() ?></span></td>
		<td data-name="PatientName" <?php echo $store_intent_issue_view->PatientName->cellAttributes() ?>>
<span id="el_store_intent_issue_PatientName">
<span<?php echo $store_intent_issue_view->PatientName->viewAttributes() ?>><?php echo $store_intent_issue_view->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->Age->Visible) { // Age ?>
	<tr id="r_Age">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Age"><?php echo $store_intent_issue_view->Age->caption() ?></span></td>
		<td data-name="Age" <?php echo $store_intent_issue_view->Age->cellAttributes() ?>>
<span id="el_store_intent_issue_Age">
<span<?php echo $store_intent_issue_view->Age->viewAttributes() ?>><?php echo $store_intent_issue_view->Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->Gender->Visible) { // Gender ?>
	<tr id="r_Gender">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Gender"><?php echo $store_intent_issue_view->Gender->caption() ?></span></td>
		<td data-name="Gender" <?php echo $store_intent_issue_view->Gender->cellAttributes() ?>>
<span id="el_store_intent_issue_Gender">
<span<?php echo $store_intent_issue_view->Gender->viewAttributes() ?>><?php echo $store_intent_issue_view->Gender->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->profilePic->Visible) { // profilePic ?>
	<tr id="r_profilePic">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_profilePic"><?php echo $store_intent_issue_view->profilePic->caption() ?></span></td>
		<td data-name="profilePic" <?php echo $store_intent_issue_view->profilePic->cellAttributes() ?>>
<span id="el_store_intent_issue_profilePic">
<span<?php echo $store_intent_issue_view->profilePic->viewAttributes() ?>><?php echo $store_intent_issue_view->profilePic->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->Mobile->Visible) { // Mobile ?>
	<tr id="r_Mobile">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Mobile"><?php echo $store_intent_issue_view->Mobile->caption() ?></span></td>
		<td data-name="Mobile" <?php echo $store_intent_issue_view->Mobile->cellAttributes() ?>>
<span id="el_store_intent_issue_Mobile">
<span<?php echo $store_intent_issue_view->Mobile->viewAttributes() ?>><?php echo $store_intent_issue_view->Mobile->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->IP_OP->Visible) { // IP_OP ?>
	<tr id="r_IP_OP">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_IP_OP"><?php echo $store_intent_issue_view->IP_OP->caption() ?></span></td>
		<td data-name="IP_OP" <?php echo $store_intent_issue_view->IP_OP->cellAttributes() ?>>
<span id="el_store_intent_issue_IP_OP">
<span<?php echo $store_intent_issue_view->IP_OP->viewAttributes() ?>><?php echo $store_intent_issue_view->IP_OP->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->Doctor->Visible) { // Doctor ?>
	<tr id="r_Doctor">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Doctor"><?php echo $store_intent_issue_view->Doctor->caption() ?></span></td>
		<td data-name="Doctor" <?php echo $store_intent_issue_view->Doctor->cellAttributes() ?>>
<span id="el_store_intent_issue_Doctor">
<span<?php echo $store_intent_issue_view->Doctor->viewAttributes() ?>><?php echo $store_intent_issue_view->Doctor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->voucher_type->Visible) { // voucher_type ?>
	<tr id="r_voucher_type">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_voucher_type"><?php echo $store_intent_issue_view->voucher_type->caption() ?></span></td>
		<td data-name="voucher_type" <?php echo $store_intent_issue_view->voucher_type->cellAttributes() ?>>
<span id="el_store_intent_issue_voucher_type">
<span<?php echo $store_intent_issue_view->voucher_type->viewAttributes() ?>><?php echo $store_intent_issue_view->voucher_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->Details->Visible) { // Details ?>
	<tr id="r_Details">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Details"><?php echo $store_intent_issue_view->Details->caption() ?></span></td>
		<td data-name="Details" <?php echo $store_intent_issue_view->Details->cellAttributes() ?>>
<span id="el_store_intent_issue_Details">
<span<?php echo $store_intent_issue_view->Details->viewAttributes() ?>><?php echo $store_intent_issue_view->Details->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->ModeofPayment->Visible) { // ModeofPayment ?>
	<tr id="r_ModeofPayment">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_ModeofPayment"><?php echo $store_intent_issue_view->ModeofPayment->caption() ?></span></td>
		<td data-name="ModeofPayment" <?php echo $store_intent_issue_view->ModeofPayment->cellAttributes() ?>>
<span id="el_store_intent_issue_ModeofPayment">
<span<?php echo $store_intent_issue_view->ModeofPayment->viewAttributes() ?>><?php echo $store_intent_issue_view->ModeofPayment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->Amount->Visible) { // Amount ?>
	<tr id="r_Amount">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Amount"><?php echo $store_intent_issue_view->Amount->caption() ?></span></td>
		<td data-name="Amount" <?php echo $store_intent_issue_view->Amount->cellAttributes() ?>>
<span id="el_store_intent_issue_Amount">
<span<?php echo $store_intent_issue_view->Amount->viewAttributes() ?>><?php echo $store_intent_issue_view->Amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->AnyDues->Visible) { // AnyDues ?>
	<tr id="r_AnyDues">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_AnyDues"><?php echo $store_intent_issue_view->AnyDues->caption() ?></span></td>
		<td data-name="AnyDues" <?php echo $store_intent_issue_view->AnyDues->cellAttributes() ?>>
<span id="el_store_intent_issue_AnyDues">
<span<?php echo $store_intent_issue_view->AnyDues->viewAttributes() ?>><?php echo $store_intent_issue_view->AnyDues->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_createdby"><?php echo $store_intent_issue_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $store_intent_issue_view->createdby->cellAttributes() ?>>
<span id="el_store_intent_issue_createdby">
<span<?php echo $store_intent_issue_view->createdby->viewAttributes() ?>><?php echo $store_intent_issue_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_createddatetime"><?php echo $store_intent_issue_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $store_intent_issue_view->createddatetime->cellAttributes() ?>>
<span id="el_store_intent_issue_createddatetime">
<span<?php echo $store_intent_issue_view->createddatetime->viewAttributes() ?>><?php echo $store_intent_issue_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_modifiedby"><?php echo $store_intent_issue_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $store_intent_issue_view->modifiedby->cellAttributes() ?>>
<span id="el_store_intent_issue_modifiedby">
<span<?php echo $store_intent_issue_view->modifiedby->viewAttributes() ?>><?php echo $store_intent_issue_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_modifieddatetime"><?php echo $store_intent_issue_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $store_intent_issue_view->modifieddatetime->cellAttributes() ?>>
<span id="el_store_intent_issue_modifieddatetime">
<span<?php echo $store_intent_issue_view->modifieddatetime->viewAttributes() ?>><?php echo $store_intent_issue_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->RealizationAmount->Visible) { // RealizationAmount ?>
	<tr id="r_RealizationAmount">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RealizationAmount"><?php echo $store_intent_issue_view->RealizationAmount->caption() ?></span></td>
		<td data-name="RealizationAmount" <?php echo $store_intent_issue_view->RealizationAmount->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationAmount">
<span<?php echo $store_intent_issue_view->RealizationAmount->viewAttributes() ?>><?php echo $store_intent_issue_view->RealizationAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->RealizationStatus->Visible) { // RealizationStatus ?>
	<tr id="r_RealizationStatus">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RealizationStatus"><?php echo $store_intent_issue_view->RealizationStatus->caption() ?></span></td>
		<td data-name="RealizationStatus" <?php echo $store_intent_issue_view->RealizationStatus->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationStatus">
<span<?php echo $store_intent_issue_view->RealizationStatus->viewAttributes() ?>><?php echo $store_intent_issue_view->RealizationStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<tr id="r_RealizationRemarks">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RealizationRemarks"><?php echo $store_intent_issue_view->RealizationRemarks->caption() ?></span></td>
		<td data-name="RealizationRemarks" <?php echo $store_intent_issue_view->RealizationRemarks->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationRemarks">
<span<?php echo $store_intent_issue_view->RealizationRemarks->viewAttributes() ?>><?php echo $store_intent_issue_view->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<tr id="r_RealizationBatchNo">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RealizationBatchNo"><?php echo $store_intent_issue_view->RealizationBatchNo->caption() ?></span></td>
		<td data-name="RealizationBatchNo" <?php echo $store_intent_issue_view->RealizationBatchNo->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationBatchNo">
<span<?php echo $store_intent_issue_view->RealizationBatchNo->viewAttributes() ?>><?php echo $store_intent_issue_view->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->RealizationDate->Visible) { // RealizationDate ?>
	<tr id="r_RealizationDate">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RealizationDate"><?php echo $store_intent_issue_view->RealizationDate->caption() ?></span></td>
		<td data-name="RealizationDate" <?php echo $store_intent_issue_view->RealizationDate->cellAttributes() ?>>
<span id="el_store_intent_issue_RealizationDate">
<span<?php echo $store_intent_issue_view->RealizationDate->viewAttributes() ?>><?php echo $store_intent_issue_view->RealizationDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->HospID->Visible) { // HospID ?>
	<tr id="r_HospID">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_HospID"><?php echo $store_intent_issue_view->HospID->caption() ?></span></td>
		<td data-name="HospID" <?php echo $store_intent_issue_view->HospID->cellAttributes() ?>>
<span id="el_store_intent_issue_HospID">
<span<?php echo $store_intent_issue_view->HospID->viewAttributes() ?>><?php echo $store_intent_issue_view->HospID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->RIDNO->Visible) { // RIDNO ?>
	<tr id="r_RIDNO">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RIDNO"><?php echo $store_intent_issue_view->RIDNO->caption() ?></span></td>
		<td data-name="RIDNO" <?php echo $store_intent_issue_view->RIDNO->cellAttributes() ?>>
<span id="el_store_intent_issue_RIDNO">
<span<?php echo $store_intent_issue_view->RIDNO->viewAttributes() ?>><?php echo $store_intent_issue_view->RIDNO->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->TidNo->Visible) { // TidNo ?>
	<tr id="r_TidNo">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_TidNo"><?php echo $store_intent_issue_view->TidNo->caption() ?></span></td>
		<td data-name="TidNo" <?php echo $store_intent_issue_view->TidNo->cellAttributes() ?>>
<span id="el_store_intent_issue_TidNo">
<span<?php echo $store_intent_issue_view->TidNo->viewAttributes() ?>><?php echo $store_intent_issue_view->TidNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->CId->Visible) { // CId ?>
	<tr id="r_CId">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_CId"><?php echo $store_intent_issue_view->CId->caption() ?></span></td>
		<td data-name="CId" <?php echo $store_intent_issue_view->CId->cellAttributes() ?>>
<span id="el_store_intent_issue_CId">
<span<?php echo $store_intent_issue_view->CId->viewAttributes() ?>><?php echo $store_intent_issue_view->CId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->PartnerName->Visible) { // PartnerName ?>
	<tr id="r_PartnerName">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_PartnerName"><?php echo $store_intent_issue_view->PartnerName->caption() ?></span></td>
		<td data-name="PartnerName" <?php echo $store_intent_issue_view->PartnerName->cellAttributes() ?>>
<span id="el_store_intent_issue_PartnerName">
<span<?php echo $store_intent_issue_view->PartnerName->viewAttributes() ?>><?php echo $store_intent_issue_view->PartnerName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->PayerType->Visible) { // PayerType ?>
	<tr id="r_PayerType">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_PayerType"><?php echo $store_intent_issue_view->PayerType->caption() ?></span></td>
		<td data-name="PayerType" <?php echo $store_intent_issue_view->PayerType->cellAttributes() ?>>
<span id="el_store_intent_issue_PayerType">
<span<?php echo $store_intent_issue_view->PayerType->viewAttributes() ?>><?php echo $store_intent_issue_view->PayerType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->Dob->Visible) { // Dob ?>
	<tr id="r_Dob">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Dob"><?php echo $store_intent_issue_view->Dob->caption() ?></span></td>
		<td data-name="Dob" <?php echo $store_intent_issue_view->Dob->cellAttributes() ?>>
<span id="el_store_intent_issue_Dob">
<span<?php echo $store_intent_issue_view->Dob->viewAttributes() ?>><?php echo $store_intent_issue_view->Dob->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->Currency->Visible) { // Currency ?>
	<tr id="r_Currency">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Currency"><?php echo $store_intent_issue_view->Currency->caption() ?></span></td>
		<td data-name="Currency" <?php echo $store_intent_issue_view->Currency->cellAttributes() ?>>
<span id="el_store_intent_issue_Currency">
<span<?php echo $store_intent_issue_view->Currency->viewAttributes() ?>><?php echo $store_intent_issue_view->Currency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->DiscountRemarks->Visible) { // DiscountRemarks ?>
	<tr id="r_DiscountRemarks">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_DiscountRemarks"><?php echo $store_intent_issue_view->DiscountRemarks->caption() ?></span></td>
		<td data-name="DiscountRemarks" <?php echo $store_intent_issue_view->DiscountRemarks->cellAttributes() ?>>
<span id="el_store_intent_issue_DiscountRemarks">
<span<?php echo $store_intent_issue_view->DiscountRemarks->viewAttributes() ?>><?php echo $store_intent_issue_view->DiscountRemarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_Remarks"><?php echo $store_intent_issue_view->Remarks->caption() ?></span></td>
		<td data-name="Remarks" <?php echo $store_intent_issue_view->Remarks->cellAttributes() ?>>
<span id="el_store_intent_issue_Remarks">
<span<?php echo $store_intent_issue_view->Remarks->viewAttributes() ?>><?php echo $store_intent_issue_view->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->PatId->Visible) { // PatId ?>
	<tr id="r_PatId">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_PatId"><?php echo $store_intent_issue_view->PatId->caption() ?></span></td>
		<td data-name="PatId" <?php echo $store_intent_issue_view->PatId->cellAttributes() ?>>
<span id="el_store_intent_issue_PatId">
<span<?php echo $store_intent_issue_view->PatId->viewAttributes() ?>><?php echo $store_intent_issue_view->PatId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->DrDepartment->Visible) { // DrDepartment ?>
	<tr id="r_DrDepartment">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_DrDepartment"><?php echo $store_intent_issue_view->DrDepartment->caption() ?></span></td>
		<td data-name="DrDepartment" <?php echo $store_intent_issue_view->DrDepartment->cellAttributes() ?>>
<span id="el_store_intent_issue_DrDepartment">
<span<?php echo $store_intent_issue_view->DrDepartment->viewAttributes() ?>><?php echo $store_intent_issue_view->DrDepartment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->RefferedBy->Visible) { // RefferedBy ?>
	<tr id="r_RefferedBy">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_RefferedBy"><?php echo $store_intent_issue_view->RefferedBy->caption() ?></span></td>
		<td data-name="RefferedBy" <?php echo $store_intent_issue_view->RefferedBy->cellAttributes() ?>>
<span id="el_store_intent_issue_RefferedBy">
<span<?php echo $store_intent_issue_view->RefferedBy->viewAttributes() ?>><?php echo $store_intent_issue_view->RefferedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->BillNumber->Visible) { // BillNumber ?>
	<tr id="r_BillNumber">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_BillNumber"><?php echo $store_intent_issue_view->BillNumber->caption() ?></span></td>
		<td data-name="BillNumber" <?php echo $store_intent_issue_view->BillNumber->cellAttributes() ?>>
<span id="el_store_intent_issue_BillNumber">
<span<?php echo $store_intent_issue_view->BillNumber->viewAttributes() ?>><?php echo $store_intent_issue_view->BillNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->CardNumber->Visible) { // CardNumber ?>
	<tr id="r_CardNumber">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_CardNumber"><?php echo $store_intent_issue_view->CardNumber->caption() ?></span></td>
		<td data-name="CardNumber" <?php echo $store_intent_issue_view->CardNumber->cellAttributes() ?>>
<span id="el_store_intent_issue_CardNumber">
<span<?php echo $store_intent_issue_view->CardNumber->viewAttributes() ?>><?php echo $store_intent_issue_view->CardNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->BankName->Visible) { // BankName ?>
	<tr id="r_BankName">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_BankName"><?php echo $store_intent_issue_view->BankName->caption() ?></span></td>
		<td data-name="BankName" <?php echo $store_intent_issue_view->BankName->cellAttributes() ?>>
<span id="el_store_intent_issue_BankName">
<span<?php echo $store_intent_issue_view->BankName->viewAttributes() ?>><?php echo $store_intent_issue_view->BankName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->DrID->Visible) { // DrID ?>
	<tr id="r_DrID">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_DrID"><?php echo $store_intent_issue_view->DrID->caption() ?></span></td>
		<td data-name="DrID" <?php echo $store_intent_issue_view->DrID->cellAttributes() ?>>
<span id="el_store_intent_issue_DrID">
<span<?php echo $store_intent_issue_view->DrID->viewAttributes() ?>><?php echo $store_intent_issue_view->DrID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->BillStatus->Visible) { // BillStatus ?>
	<tr id="r_BillStatus">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_BillStatus"><?php echo $store_intent_issue_view->BillStatus->caption() ?></span></td>
		<td data-name="BillStatus" <?php echo $store_intent_issue_view->BillStatus->cellAttributes() ?>>
<span id="el_store_intent_issue_BillStatus">
<span<?php echo $store_intent_issue_view->BillStatus->viewAttributes() ?>><?php echo $store_intent_issue_view->BillStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->ReportHeader->Visible) { // ReportHeader ?>
	<tr id="r_ReportHeader">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_ReportHeader"><?php echo $store_intent_issue_view->ReportHeader->caption() ?></span></td>
		<td data-name="ReportHeader" <?php echo $store_intent_issue_view->ReportHeader->cellAttributes() ?>>
<span id="el_store_intent_issue_ReportHeader">
<span<?php echo $store_intent_issue_view->ReportHeader->viewAttributes() ?>><?php echo $store_intent_issue_view->ReportHeader->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($store_intent_issue_view->PharID->Visible) { // PharID ?>
	<tr id="r_PharID">
		<td class="<?php echo $store_intent_issue_view->TableLeftColumnClass ?>"><span id="elh_store_intent_issue_PharID"><?php echo $store_intent_issue_view->PharID->caption() ?></span></td>
		<td data-name="PharID" <?php echo $store_intent_issue_view->PharID->cellAttributes() ?>>
<span id="el_store_intent_issue_PharID">
<span<?php echo $store_intent_issue_view->PharID->viewAttributes() ?>><?php echo $store_intent_issue_view->PharID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$store_intent_issue_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$store_intent_issue_view->isExport()) { ?>
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
$store_intent_issue_view->terminate();
?>
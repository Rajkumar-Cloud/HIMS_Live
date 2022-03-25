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
$receipts_view = new receipts_view();

// Run the page
$receipts_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$receipts_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$receipts_view->isExport()) { ?>
<script>
var freceiptsview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	freceiptsview = currentForm = new ew.Form("freceiptsview", "view");
	loadjs.done("freceiptsview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$receipts_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $receipts_view->ExportOptions->render("body") ?>
<?php $receipts_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $receipts_view->showPageHeader(); ?>
<?php
$receipts_view->showMessage();
?>
<form name="freceiptsview" id="freceiptsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="receipts">
<input type="hidden" name="modal" value="<?php echo (int)$receipts_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($receipts_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_id"><?php echo $receipts_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $receipts_view->id->cellAttributes() ?>>
<span id="el_receipts_id">
<span<?php echo $receipts_view->id->viewAttributes() ?>><?php echo $receipts_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_Reception"><?php echo $receipts_view->Reception->caption() ?></span></td>
		<td data-name="Reception" <?php echo $receipts_view->Reception->cellAttributes() ?>>
<span id="el_receipts_Reception">
<span<?php echo $receipts_view->Reception->viewAttributes() ?>><?php echo $receipts_view->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->Aid->Visible) { // Aid ?>
	<tr id="r_Aid">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_Aid"><?php echo $receipts_view->Aid->caption() ?></span></td>
		<td data-name="Aid" <?php echo $receipts_view->Aid->cellAttributes() ?>>
<span id="el_receipts_Aid">
<span<?php echo $receipts_view->Aid->viewAttributes() ?>><?php echo $receipts_view->Aid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->Vid->Visible) { // Vid ?>
	<tr id="r_Vid">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_Vid"><?php echo $receipts_view->Vid->caption() ?></span></td>
		<td data-name="Vid" <?php echo $receipts_view->Vid->cellAttributes() ?>>
<span id="el_receipts_Vid">
<span<?php echo $receipts_view->Vid->viewAttributes() ?>><?php echo $receipts_view->Vid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_patient_id"><?php echo $receipts_view->patient_id->caption() ?></span></td>
		<td data-name="patient_id" <?php echo $receipts_view->patient_id->cellAttributes() ?>>
<span id="el_receipts_patient_id">
<span<?php echo $receipts_view->patient_id->viewAttributes() ?>><?php echo $receipts_view->patient_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_mrnno"><?php echo $receipts_view->mrnno->caption() ?></span></td>
		<td data-name="mrnno" <?php echo $receipts_view->mrnno->cellAttributes() ?>>
<span id="el_receipts_mrnno">
<span<?php echo $receipts_view->mrnno->viewAttributes() ?>><?php echo $receipts_view->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_PatientName"><?php echo $receipts_view->PatientName->caption() ?></span></td>
		<td data-name="PatientName" <?php echo $receipts_view->PatientName->cellAttributes() ?>>
<span id="el_receipts_PatientName">
<span<?php echo $receipts_view->PatientName->viewAttributes() ?>><?php echo $receipts_view->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->amount->Visible) { // amount ?>
	<tr id="r_amount">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_amount"><?php echo $receipts_view->amount->caption() ?></span></td>
		<td data-name="amount" <?php echo $receipts_view->amount->cellAttributes() ?>>
<span id="el_receipts_amount">
<span<?php echo $receipts_view->amount->viewAttributes() ?>><?php echo $receipts_view->amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->Discount->Visible) { // Discount ?>
	<tr id="r_Discount">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_Discount"><?php echo $receipts_view->Discount->caption() ?></span></td>
		<td data-name="Discount" <?php echo $receipts_view->Discount->cellAttributes() ?>>
<span id="el_receipts_Discount">
<span<?php echo $receipts_view->Discount->viewAttributes() ?>><?php echo $receipts_view->Discount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->SubTotal->Visible) { // SubTotal ?>
	<tr id="r_SubTotal">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_SubTotal"><?php echo $receipts_view->SubTotal->caption() ?></span></td>
		<td data-name="SubTotal" <?php echo $receipts_view->SubTotal->cellAttributes() ?>>
<span id="el_receipts_SubTotal">
<span<?php echo $receipts_view->SubTotal->viewAttributes() ?>><?php echo $receipts_view->SubTotal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->patient_type->Visible) { // patient_type ?>
	<tr id="r_patient_type">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_patient_type"><?php echo $receipts_view->patient_type->caption() ?></span></td>
		<td data-name="patient_type" <?php echo $receipts_view->patient_type->cellAttributes() ?>>
<span id="el_receipts_patient_type">
<span<?php echo $receipts_view->patient_type->viewAttributes() ?>><?php echo $receipts_view->patient_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->invoiceId->Visible) { // invoiceId ?>
	<tr id="r_invoiceId">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_invoiceId"><?php echo $receipts_view->invoiceId->caption() ?></span></td>
		<td data-name="invoiceId" <?php echo $receipts_view->invoiceId->cellAttributes() ?>>
<span id="el_receipts_invoiceId">
<span<?php echo $receipts_view->invoiceId->viewAttributes() ?>><?php echo $receipts_view->invoiceId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->invoiceAmount->Visible) { // invoiceAmount ?>
	<tr id="r_invoiceAmount">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_invoiceAmount"><?php echo $receipts_view->invoiceAmount->caption() ?></span></td>
		<td data-name="invoiceAmount" <?php echo $receipts_view->invoiceAmount->cellAttributes() ?>>
<span id="el_receipts_invoiceAmount">
<span<?php echo $receipts_view->invoiceAmount->viewAttributes() ?>><?php echo $receipts_view->invoiceAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->invoiceStatus->Visible) { // invoiceStatus ?>
	<tr id="r_invoiceStatus">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_invoiceStatus"><?php echo $receipts_view->invoiceStatus->caption() ?></span></td>
		<td data-name="invoiceStatus" <?php echo $receipts_view->invoiceStatus->cellAttributes() ?>>
<span id="el_receipts_invoiceStatus">
<span<?php echo $receipts_view->invoiceStatus->viewAttributes() ?>><?php echo $receipts_view->invoiceStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->modeOfPayment->Visible) { // modeOfPayment ?>
	<tr id="r_modeOfPayment">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_modeOfPayment"><?php echo $receipts_view->modeOfPayment->caption() ?></span></td>
		<td data-name="modeOfPayment" <?php echo $receipts_view->modeOfPayment->cellAttributes() ?>>
<span id="el_receipts_modeOfPayment">
<span<?php echo $receipts_view->modeOfPayment->viewAttributes() ?>><?php echo $receipts_view->modeOfPayment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->charged_date->Visible) { // charged_date ?>
	<tr id="r_charged_date">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_charged_date"><?php echo $receipts_view->charged_date->caption() ?></span></td>
		<td data-name="charged_date" <?php echo $receipts_view->charged_date->cellAttributes() ?>>
<span id="el_receipts_charged_date">
<span<?php echo $receipts_view->charged_date->viewAttributes() ?>><?php echo $receipts_view->charged_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_status"><?php echo $receipts_view->status->caption() ?></span></td>
		<td data-name="status" <?php echo $receipts_view->status->cellAttributes() ?>>
<span id="el_receipts_status">
<span<?php echo $receipts_view->status->viewAttributes() ?>><?php echo $receipts_view->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_createdby"><?php echo $receipts_view->createdby->caption() ?></span></td>
		<td data-name="createdby" <?php echo $receipts_view->createdby->cellAttributes() ?>>
<span id="el_receipts_createdby">
<span<?php echo $receipts_view->createdby->viewAttributes() ?>><?php echo $receipts_view->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_createddatetime"><?php echo $receipts_view->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime" <?php echo $receipts_view->createddatetime->cellAttributes() ?>>
<span id="el_receipts_createddatetime">
<span<?php echo $receipts_view->createddatetime->viewAttributes() ?>><?php echo $receipts_view->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_modifiedby"><?php echo $receipts_view->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby" <?php echo $receipts_view->modifiedby->cellAttributes() ?>>
<span id="el_receipts_modifiedby">
<span<?php echo $receipts_view->modifiedby->viewAttributes() ?>><?php echo $receipts_view->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_modifieddatetime"><?php echo $receipts_view->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime" <?php echo $receipts_view->modifieddatetime->cellAttributes() ?>>
<span id="el_receipts_modifieddatetime">
<span<?php echo $receipts_view->modifieddatetime->viewAttributes() ?>><?php echo $receipts_view->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->ChequeCardNo->Visible) { // ChequeCardNo ?>
	<tr id="r_ChequeCardNo">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_ChequeCardNo"><?php echo $receipts_view->ChequeCardNo->caption() ?></span></td>
		<td data-name="ChequeCardNo" <?php echo $receipts_view->ChequeCardNo->cellAttributes() ?>>
<span id="el_receipts_ChequeCardNo">
<span<?php echo $receipts_view->ChequeCardNo->viewAttributes() ?>><?php echo $receipts_view->ChequeCardNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->CreditBankName->Visible) { // CreditBankName ?>
	<tr id="r_CreditBankName">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_CreditBankName"><?php echo $receipts_view->CreditBankName->caption() ?></span></td>
		<td data-name="CreditBankName" <?php echo $receipts_view->CreditBankName->cellAttributes() ?>>
<span id="el_receipts_CreditBankName">
<span<?php echo $receipts_view->CreditBankName->viewAttributes() ?>><?php echo $receipts_view->CreditBankName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->CreditCardHolder->Visible) { // CreditCardHolder ?>
	<tr id="r_CreditCardHolder">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_CreditCardHolder"><?php echo $receipts_view->CreditCardHolder->caption() ?></span></td>
		<td data-name="CreditCardHolder" <?php echo $receipts_view->CreditCardHolder->cellAttributes() ?>>
<span id="el_receipts_CreditCardHolder">
<span<?php echo $receipts_view->CreditCardHolder->viewAttributes() ?>><?php echo $receipts_view->CreditCardHolder->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->CreditCardType->Visible) { // CreditCardType ?>
	<tr id="r_CreditCardType">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_CreditCardType"><?php echo $receipts_view->CreditCardType->caption() ?></span></td>
		<td data-name="CreditCardType" <?php echo $receipts_view->CreditCardType->cellAttributes() ?>>
<span id="el_receipts_CreditCardType">
<span<?php echo $receipts_view->CreditCardType->viewAttributes() ?>><?php echo $receipts_view->CreditCardType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->CreditCardMachine->Visible) { // CreditCardMachine ?>
	<tr id="r_CreditCardMachine">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_CreditCardMachine"><?php echo $receipts_view->CreditCardMachine->caption() ?></span></td>
		<td data-name="CreditCardMachine" <?php echo $receipts_view->CreditCardMachine->cellAttributes() ?>>
<span id="el_receipts_CreditCardMachine">
<span<?php echo $receipts_view->CreditCardMachine->viewAttributes() ?>><?php echo $receipts_view->CreditCardMachine->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->CreditCardBatchNo->Visible) { // CreditCardBatchNo ?>
	<tr id="r_CreditCardBatchNo">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_CreditCardBatchNo"><?php echo $receipts_view->CreditCardBatchNo->caption() ?></span></td>
		<td data-name="CreditCardBatchNo" <?php echo $receipts_view->CreditCardBatchNo->cellAttributes() ?>>
<span id="el_receipts_CreditCardBatchNo">
<span<?php echo $receipts_view->CreditCardBatchNo->viewAttributes() ?>><?php echo $receipts_view->CreditCardBatchNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->CreditCardTax->Visible) { // CreditCardTax ?>
	<tr id="r_CreditCardTax">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_CreditCardTax"><?php echo $receipts_view->CreditCardTax->caption() ?></span></td>
		<td data-name="CreditCardTax" <?php echo $receipts_view->CreditCardTax->cellAttributes() ?>>
<span id="el_receipts_CreditCardTax">
<span<?php echo $receipts_view->CreditCardTax->viewAttributes() ?>><?php echo $receipts_view->CreditCardTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->CreditDeductionAmount->Visible) { // CreditDeductionAmount ?>
	<tr id="r_CreditDeductionAmount">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_CreditDeductionAmount"><?php echo $receipts_view->CreditDeductionAmount->caption() ?></span></td>
		<td data-name="CreditDeductionAmount" <?php echo $receipts_view->CreditDeductionAmount->cellAttributes() ?>>
<span id="el_receipts_CreditDeductionAmount">
<span<?php echo $receipts_view->CreditDeductionAmount->viewAttributes() ?>><?php echo $receipts_view->CreditDeductionAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->RealizationAmount->Visible) { // RealizationAmount ?>
	<tr id="r_RealizationAmount">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_RealizationAmount"><?php echo $receipts_view->RealizationAmount->caption() ?></span></td>
		<td data-name="RealizationAmount" <?php echo $receipts_view->RealizationAmount->cellAttributes() ?>>
<span id="el_receipts_RealizationAmount">
<span<?php echo $receipts_view->RealizationAmount->viewAttributes() ?>><?php echo $receipts_view->RealizationAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->RealizationStatus->Visible) { // RealizationStatus ?>
	<tr id="r_RealizationStatus">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_RealizationStatus"><?php echo $receipts_view->RealizationStatus->caption() ?></span></td>
		<td data-name="RealizationStatus" <?php echo $receipts_view->RealizationStatus->cellAttributes() ?>>
<span id="el_receipts_RealizationStatus">
<span<?php echo $receipts_view->RealizationStatus->viewAttributes() ?>><?php echo $receipts_view->RealizationStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<tr id="r_RealizationRemarks">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_RealizationRemarks"><?php echo $receipts_view->RealizationRemarks->caption() ?></span></td>
		<td data-name="RealizationRemarks" <?php echo $receipts_view->RealizationRemarks->cellAttributes() ?>>
<span id="el_receipts_RealizationRemarks">
<span<?php echo $receipts_view->RealizationRemarks->viewAttributes() ?>><?php echo $receipts_view->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<tr id="r_RealizationBatchNo">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_RealizationBatchNo"><?php echo $receipts_view->RealizationBatchNo->caption() ?></span></td>
		<td data-name="RealizationBatchNo" <?php echo $receipts_view->RealizationBatchNo->cellAttributes() ?>>
<span id="el_receipts_RealizationBatchNo">
<span<?php echo $receipts_view->RealizationBatchNo->viewAttributes() ?>><?php echo $receipts_view->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->RealizationDate->Visible) { // RealizationDate ?>
	<tr id="r_RealizationDate">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_RealizationDate"><?php echo $receipts_view->RealizationDate->caption() ?></span></td>
		<td data-name="RealizationDate" <?php echo $receipts_view->RealizationDate->cellAttributes() ?>>
<span id="el_receipts_RealizationDate">
<span<?php echo $receipts_view->RealizationDate->viewAttributes() ?>><?php echo $receipts_view->RealizationDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts_view->BankAccHolderMobileNumber->Visible) { // BankAccHolderMobileNumber ?>
	<tr id="r_BankAccHolderMobileNumber">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_BankAccHolderMobileNumber"><?php echo $receipts_view->BankAccHolderMobileNumber->caption() ?></span></td>
		<td data-name="BankAccHolderMobileNumber" <?php echo $receipts_view->BankAccHolderMobileNumber->cellAttributes() ?>>
<span id="el_receipts_BankAccHolderMobileNumber">
<span<?php echo $receipts_view->BankAccHolderMobileNumber->viewAttributes() ?>><?php echo $receipts_view->BankAccHolderMobileNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$receipts_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$receipts_view->isExport()) { ?>
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
$receipts_view->terminate();
?>
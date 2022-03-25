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
<?php include_once "header.php" ?>
<?php if (!$receipts->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var freceiptsview = currentForm = new ew.Form("freceiptsview", "view");

// Form_CustomValidate event
freceiptsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
freceiptsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$receipts->isExport()) { ?>
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
<?php if ($receipts_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $receipts_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="receipts">
<input type="hidden" name="modal" value="<?php echo (int)$receipts_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($receipts->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_id"><?php echo $receipts->id->caption() ?></span></td>
		<td data-name="id"<?php echo $receipts->id->cellAttributes() ?>>
<span id="el_receipts_id">
<span<?php echo $receipts->id->viewAttributes() ?>>
<?php echo $receipts->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->Reception->Visible) { // Reception ?>
	<tr id="r_Reception">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_Reception"><?php echo $receipts->Reception->caption() ?></span></td>
		<td data-name="Reception"<?php echo $receipts->Reception->cellAttributes() ?>>
<span id="el_receipts_Reception">
<span<?php echo $receipts->Reception->viewAttributes() ?>>
<?php echo $receipts->Reception->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->Aid->Visible) { // Aid ?>
	<tr id="r_Aid">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_Aid"><?php echo $receipts->Aid->caption() ?></span></td>
		<td data-name="Aid"<?php echo $receipts->Aid->cellAttributes() ?>>
<span id="el_receipts_Aid">
<span<?php echo $receipts->Aid->viewAttributes() ?>>
<?php echo $receipts->Aid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->Vid->Visible) { // Vid ?>
	<tr id="r_Vid">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_Vid"><?php echo $receipts->Vid->caption() ?></span></td>
		<td data-name="Vid"<?php echo $receipts->Vid->cellAttributes() ?>>
<span id="el_receipts_Vid">
<span<?php echo $receipts->Vid->viewAttributes() ?>>
<?php echo $receipts->Vid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->patient_id->Visible) { // patient_id ?>
	<tr id="r_patient_id">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_patient_id"><?php echo $receipts->patient_id->caption() ?></span></td>
		<td data-name="patient_id"<?php echo $receipts->patient_id->cellAttributes() ?>>
<span id="el_receipts_patient_id">
<span<?php echo $receipts->patient_id->viewAttributes() ?>>
<?php echo $receipts->patient_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->mrnno->Visible) { // mrnno ?>
	<tr id="r_mrnno">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_mrnno"><?php echo $receipts->mrnno->caption() ?></span></td>
		<td data-name="mrnno"<?php echo $receipts->mrnno->cellAttributes() ?>>
<span id="el_receipts_mrnno">
<span<?php echo $receipts->mrnno->viewAttributes() ?>>
<?php echo $receipts->mrnno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->PatientName->Visible) { // PatientName ?>
	<tr id="r_PatientName">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_PatientName"><?php echo $receipts->PatientName->caption() ?></span></td>
		<td data-name="PatientName"<?php echo $receipts->PatientName->cellAttributes() ?>>
<span id="el_receipts_PatientName">
<span<?php echo $receipts->PatientName->viewAttributes() ?>>
<?php echo $receipts->PatientName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->amount->Visible) { // amount ?>
	<tr id="r_amount">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_amount"><?php echo $receipts->amount->caption() ?></span></td>
		<td data-name="amount"<?php echo $receipts->amount->cellAttributes() ?>>
<span id="el_receipts_amount">
<span<?php echo $receipts->amount->viewAttributes() ?>>
<?php echo $receipts->amount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->Discount->Visible) { // Discount ?>
	<tr id="r_Discount">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_Discount"><?php echo $receipts->Discount->caption() ?></span></td>
		<td data-name="Discount"<?php echo $receipts->Discount->cellAttributes() ?>>
<span id="el_receipts_Discount">
<span<?php echo $receipts->Discount->viewAttributes() ?>>
<?php echo $receipts->Discount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->SubTotal->Visible) { // SubTotal ?>
	<tr id="r_SubTotal">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_SubTotal"><?php echo $receipts->SubTotal->caption() ?></span></td>
		<td data-name="SubTotal"<?php echo $receipts->SubTotal->cellAttributes() ?>>
<span id="el_receipts_SubTotal">
<span<?php echo $receipts->SubTotal->viewAttributes() ?>>
<?php echo $receipts->SubTotal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->patient_type->Visible) { // patient_type ?>
	<tr id="r_patient_type">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_patient_type"><?php echo $receipts->patient_type->caption() ?></span></td>
		<td data-name="patient_type"<?php echo $receipts->patient_type->cellAttributes() ?>>
<span id="el_receipts_patient_type">
<span<?php echo $receipts->patient_type->viewAttributes() ?>>
<?php echo $receipts->patient_type->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->invoiceId->Visible) { // invoiceId ?>
	<tr id="r_invoiceId">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_invoiceId"><?php echo $receipts->invoiceId->caption() ?></span></td>
		<td data-name="invoiceId"<?php echo $receipts->invoiceId->cellAttributes() ?>>
<span id="el_receipts_invoiceId">
<span<?php echo $receipts->invoiceId->viewAttributes() ?>>
<?php echo $receipts->invoiceId->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->invoiceAmount->Visible) { // invoiceAmount ?>
	<tr id="r_invoiceAmount">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_invoiceAmount"><?php echo $receipts->invoiceAmount->caption() ?></span></td>
		<td data-name="invoiceAmount"<?php echo $receipts->invoiceAmount->cellAttributes() ?>>
<span id="el_receipts_invoiceAmount">
<span<?php echo $receipts->invoiceAmount->viewAttributes() ?>>
<?php echo $receipts->invoiceAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->invoiceStatus->Visible) { // invoiceStatus ?>
	<tr id="r_invoiceStatus">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_invoiceStatus"><?php echo $receipts->invoiceStatus->caption() ?></span></td>
		<td data-name="invoiceStatus"<?php echo $receipts->invoiceStatus->cellAttributes() ?>>
<span id="el_receipts_invoiceStatus">
<span<?php echo $receipts->invoiceStatus->viewAttributes() ?>>
<?php echo $receipts->invoiceStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->modeOfPayment->Visible) { // modeOfPayment ?>
	<tr id="r_modeOfPayment">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_modeOfPayment"><?php echo $receipts->modeOfPayment->caption() ?></span></td>
		<td data-name="modeOfPayment"<?php echo $receipts->modeOfPayment->cellAttributes() ?>>
<span id="el_receipts_modeOfPayment">
<span<?php echo $receipts->modeOfPayment->viewAttributes() ?>>
<?php echo $receipts->modeOfPayment->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->charged_date->Visible) { // charged_date ?>
	<tr id="r_charged_date">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_charged_date"><?php echo $receipts->charged_date->caption() ?></span></td>
		<td data-name="charged_date"<?php echo $receipts->charged_date->cellAttributes() ?>>
<span id="el_receipts_charged_date">
<span<?php echo $receipts->charged_date->viewAttributes() ?>>
<?php echo $receipts->charged_date->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->status->Visible) { // status ?>
	<tr id="r_status">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_status"><?php echo $receipts->status->caption() ?></span></td>
		<td data-name="status"<?php echo $receipts->status->cellAttributes() ?>>
<span id="el_receipts_status">
<span<?php echo $receipts->status->viewAttributes() ?>>
<?php echo $receipts->status->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->createdby->Visible) { // createdby ?>
	<tr id="r_createdby">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_createdby"><?php echo $receipts->createdby->caption() ?></span></td>
		<td data-name="createdby"<?php echo $receipts->createdby->cellAttributes() ?>>
<span id="el_receipts_createdby">
<span<?php echo $receipts->createdby->viewAttributes() ?>>
<?php echo $receipts->createdby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->createddatetime->Visible) { // createddatetime ?>
	<tr id="r_createddatetime">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_createddatetime"><?php echo $receipts->createddatetime->caption() ?></span></td>
		<td data-name="createddatetime"<?php echo $receipts->createddatetime->cellAttributes() ?>>
<span id="el_receipts_createddatetime">
<span<?php echo $receipts->createddatetime->viewAttributes() ?>>
<?php echo $receipts->createddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->modifiedby->Visible) { // modifiedby ?>
	<tr id="r_modifiedby">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_modifiedby"><?php echo $receipts->modifiedby->caption() ?></span></td>
		<td data-name="modifiedby"<?php echo $receipts->modifiedby->cellAttributes() ?>>
<span id="el_receipts_modifiedby">
<span<?php echo $receipts->modifiedby->viewAttributes() ?>>
<?php echo $receipts->modifiedby->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->modifieddatetime->Visible) { // modifieddatetime ?>
	<tr id="r_modifieddatetime">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_modifieddatetime"><?php echo $receipts->modifieddatetime->caption() ?></span></td>
		<td data-name="modifieddatetime"<?php echo $receipts->modifieddatetime->cellAttributes() ?>>
<span id="el_receipts_modifieddatetime">
<span<?php echo $receipts->modifieddatetime->viewAttributes() ?>>
<?php echo $receipts->modifieddatetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->ChequeCardNo->Visible) { // ChequeCardNo ?>
	<tr id="r_ChequeCardNo">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_ChequeCardNo"><?php echo $receipts->ChequeCardNo->caption() ?></span></td>
		<td data-name="ChequeCardNo"<?php echo $receipts->ChequeCardNo->cellAttributes() ?>>
<span id="el_receipts_ChequeCardNo">
<span<?php echo $receipts->ChequeCardNo->viewAttributes() ?>>
<?php echo $receipts->ChequeCardNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->CreditBankName->Visible) { // CreditBankName ?>
	<tr id="r_CreditBankName">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_CreditBankName"><?php echo $receipts->CreditBankName->caption() ?></span></td>
		<td data-name="CreditBankName"<?php echo $receipts->CreditBankName->cellAttributes() ?>>
<span id="el_receipts_CreditBankName">
<span<?php echo $receipts->CreditBankName->viewAttributes() ?>>
<?php echo $receipts->CreditBankName->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->CreditCardHolder->Visible) { // CreditCardHolder ?>
	<tr id="r_CreditCardHolder">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_CreditCardHolder"><?php echo $receipts->CreditCardHolder->caption() ?></span></td>
		<td data-name="CreditCardHolder"<?php echo $receipts->CreditCardHolder->cellAttributes() ?>>
<span id="el_receipts_CreditCardHolder">
<span<?php echo $receipts->CreditCardHolder->viewAttributes() ?>>
<?php echo $receipts->CreditCardHolder->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->CreditCardType->Visible) { // CreditCardType ?>
	<tr id="r_CreditCardType">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_CreditCardType"><?php echo $receipts->CreditCardType->caption() ?></span></td>
		<td data-name="CreditCardType"<?php echo $receipts->CreditCardType->cellAttributes() ?>>
<span id="el_receipts_CreditCardType">
<span<?php echo $receipts->CreditCardType->viewAttributes() ?>>
<?php echo $receipts->CreditCardType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->CreditCardMachine->Visible) { // CreditCardMachine ?>
	<tr id="r_CreditCardMachine">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_CreditCardMachine"><?php echo $receipts->CreditCardMachine->caption() ?></span></td>
		<td data-name="CreditCardMachine"<?php echo $receipts->CreditCardMachine->cellAttributes() ?>>
<span id="el_receipts_CreditCardMachine">
<span<?php echo $receipts->CreditCardMachine->viewAttributes() ?>>
<?php echo $receipts->CreditCardMachine->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->CreditCardBatchNo->Visible) { // CreditCardBatchNo ?>
	<tr id="r_CreditCardBatchNo">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_CreditCardBatchNo"><?php echo $receipts->CreditCardBatchNo->caption() ?></span></td>
		<td data-name="CreditCardBatchNo"<?php echo $receipts->CreditCardBatchNo->cellAttributes() ?>>
<span id="el_receipts_CreditCardBatchNo">
<span<?php echo $receipts->CreditCardBatchNo->viewAttributes() ?>>
<?php echo $receipts->CreditCardBatchNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->CreditCardTax->Visible) { // CreditCardTax ?>
	<tr id="r_CreditCardTax">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_CreditCardTax"><?php echo $receipts->CreditCardTax->caption() ?></span></td>
		<td data-name="CreditCardTax"<?php echo $receipts->CreditCardTax->cellAttributes() ?>>
<span id="el_receipts_CreditCardTax">
<span<?php echo $receipts->CreditCardTax->viewAttributes() ?>>
<?php echo $receipts->CreditCardTax->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->CreditDeductionAmount->Visible) { // CreditDeductionAmount ?>
	<tr id="r_CreditDeductionAmount">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_CreditDeductionAmount"><?php echo $receipts->CreditDeductionAmount->caption() ?></span></td>
		<td data-name="CreditDeductionAmount"<?php echo $receipts->CreditDeductionAmount->cellAttributes() ?>>
<span id="el_receipts_CreditDeductionAmount">
<span<?php echo $receipts->CreditDeductionAmount->viewAttributes() ?>>
<?php echo $receipts->CreditDeductionAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->RealizationAmount->Visible) { // RealizationAmount ?>
	<tr id="r_RealizationAmount">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_RealizationAmount"><?php echo $receipts->RealizationAmount->caption() ?></span></td>
		<td data-name="RealizationAmount"<?php echo $receipts->RealizationAmount->cellAttributes() ?>>
<span id="el_receipts_RealizationAmount">
<span<?php echo $receipts->RealizationAmount->viewAttributes() ?>>
<?php echo $receipts->RealizationAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->RealizationStatus->Visible) { // RealizationStatus ?>
	<tr id="r_RealizationStatus">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_RealizationStatus"><?php echo $receipts->RealizationStatus->caption() ?></span></td>
		<td data-name="RealizationStatus"<?php echo $receipts->RealizationStatus->cellAttributes() ?>>
<span id="el_receipts_RealizationStatus">
<span<?php echo $receipts->RealizationStatus->viewAttributes() ?>>
<?php echo $receipts->RealizationStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->RealizationRemarks->Visible) { // RealizationRemarks ?>
	<tr id="r_RealizationRemarks">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_RealizationRemarks"><?php echo $receipts->RealizationRemarks->caption() ?></span></td>
		<td data-name="RealizationRemarks"<?php echo $receipts->RealizationRemarks->cellAttributes() ?>>
<span id="el_receipts_RealizationRemarks">
<span<?php echo $receipts->RealizationRemarks->viewAttributes() ?>>
<?php echo $receipts->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
	<tr id="r_RealizationBatchNo">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_RealizationBatchNo"><?php echo $receipts->RealizationBatchNo->caption() ?></span></td>
		<td data-name="RealizationBatchNo"<?php echo $receipts->RealizationBatchNo->cellAttributes() ?>>
<span id="el_receipts_RealizationBatchNo">
<span<?php echo $receipts->RealizationBatchNo->viewAttributes() ?>>
<?php echo $receipts->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->RealizationDate->Visible) { // RealizationDate ?>
	<tr id="r_RealizationDate">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_RealizationDate"><?php echo $receipts->RealizationDate->caption() ?></span></td>
		<td data-name="RealizationDate"<?php echo $receipts->RealizationDate->cellAttributes() ?>>
<span id="el_receipts_RealizationDate">
<span<?php echo $receipts->RealizationDate->viewAttributes() ?>>
<?php echo $receipts->RealizationDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($receipts->BankAccHolderMobileNumber->Visible) { // BankAccHolderMobileNumber ?>
	<tr id="r_BankAccHolderMobileNumber">
		<td class="<?php echo $receipts_view->TableLeftColumnClass ?>"><span id="elh_receipts_BankAccHolderMobileNumber"><?php echo $receipts->BankAccHolderMobileNumber->caption() ?></span></td>
		<td data-name="BankAccHolderMobileNumber"<?php echo $receipts->BankAccHolderMobileNumber->cellAttributes() ?>>
<span id="el_receipts_BankAccHolderMobileNumber">
<span<?php echo $receipts->BankAccHolderMobileNumber->viewAttributes() ?>>
<?php echo $receipts->BankAccHolderMobileNumber->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$receipts_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$receipts->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$receipts_view->terminate();
?>
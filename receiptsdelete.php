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
$receipts_delete = new receipts_delete();

// Run the page
$receipts_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$receipts_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var freceiptsdelete = currentForm = new ew.Form("freceiptsdelete", "delete");

// Form_CustomValidate event
freceiptsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
freceiptsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $receipts_delete->showPageHeader(); ?>
<?php
$receipts_delete->showMessage();
?>
<form name="freceiptsdelete" id="freceiptsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($receipts_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $receipts_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="receipts">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($receipts_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($receipts->id->Visible) { // id ?>
		<th class="<?php echo $receipts->id->headerCellClass() ?>"><span id="elh_receipts_id" class="receipts_id"><?php echo $receipts->id->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->Reception->Visible) { // Reception ?>
		<th class="<?php echo $receipts->Reception->headerCellClass() ?>"><span id="elh_receipts_Reception" class="receipts_Reception"><?php echo $receipts->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->Aid->Visible) { // Aid ?>
		<th class="<?php echo $receipts->Aid->headerCellClass() ?>"><span id="elh_receipts_Aid" class="receipts_Aid"><?php echo $receipts->Aid->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->Vid->Visible) { // Vid ?>
		<th class="<?php echo $receipts->Vid->headerCellClass() ?>"><span id="elh_receipts_Vid" class="receipts_Vid"><?php echo $receipts->Vid->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->patient_id->Visible) { // patient_id ?>
		<th class="<?php echo $receipts->patient_id->headerCellClass() ?>"><span id="elh_receipts_patient_id" class="receipts_patient_id"><?php echo $receipts->patient_id->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $receipts->mrnno->headerCellClass() ?>"><span id="elh_receipts_mrnno" class="receipts_mrnno"><?php echo $receipts->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $receipts->PatientName->headerCellClass() ?>"><span id="elh_receipts_PatientName" class="receipts_PatientName"><?php echo $receipts->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->amount->Visible) { // amount ?>
		<th class="<?php echo $receipts->amount->headerCellClass() ?>"><span id="elh_receipts_amount" class="receipts_amount"><?php echo $receipts->amount->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->Discount->Visible) { // Discount ?>
		<th class="<?php echo $receipts->Discount->headerCellClass() ?>"><span id="elh_receipts_Discount" class="receipts_Discount"><?php echo $receipts->Discount->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->SubTotal->Visible) { // SubTotal ?>
		<th class="<?php echo $receipts->SubTotal->headerCellClass() ?>"><span id="elh_receipts_SubTotal" class="receipts_SubTotal"><?php echo $receipts->SubTotal->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->patient_type->Visible) { // patient_type ?>
		<th class="<?php echo $receipts->patient_type->headerCellClass() ?>"><span id="elh_receipts_patient_type" class="receipts_patient_type"><?php echo $receipts->patient_type->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->invoiceId->Visible) { // invoiceId ?>
		<th class="<?php echo $receipts->invoiceId->headerCellClass() ?>"><span id="elh_receipts_invoiceId" class="receipts_invoiceId"><?php echo $receipts->invoiceId->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->invoiceAmount->Visible) { // invoiceAmount ?>
		<th class="<?php echo $receipts->invoiceAmount->headerCellClass() ?>"><span id="elh_receipts_invoiceAmount" class="receipts_invoiceAmount"><?php echo $receipts->invoiceAmount->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->invoiceStatus->Visible) { // invoiceStatus ?>
		<th class="<?php echo $receipts->invoiceStatus->headerCellClass() ?>"><span id="elh_receipts_invoiceStatus" class="receipts_invoiceStatus"><?php echo $receipts->invoiceStatus->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->modeOfPayment->Visible) { // modeOfPayment ?>
		<th class="<?php echo $receipts->modeOfPayment->headerCellClass() ?>"><span id="elh_receipts_modeOfPayment" class="receipts_modeOfPayment"><?php echo $receipts->modeOfPayment->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->charged_date->Visible) { // charged_date ?>
		<th class="<?php echo $receipts->charged_date->headerCellClass() ?>"><span id="elh_receipts_charged_date" class="receipts_charged_date"><?php echo $receipts->charged_date->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->status->Visible) { // status ?>
		<th class="<?php echo $receipts->status->headerCellClass() ?>"><span id="elh_receipts_status" class="receipts_status"><?php echo $receipts->status->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->createdby->Visible) { // createdby ?>
		<th class="<?php echo $receipts->createdby->headerCellClass() ?>"><span id="elh_receipts_createdby" class="receipts_createdby"><?php echo $receipts->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $receipts->createddatetime->headerCellClass() ?>"><span id="elh_receipts_createddatetime" class="receipts_createddatetime"><?php echo $receipts->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $receipts->modifiedby->headerCellClass() ?>"><span id="elh_receipts_modifiedby" class="receipts_modifiedby"><?php echo $receipts->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $receipts->modifieddatetime->headerCellClass() ?>"><span id="elh_receipts_modifieddatetime" class="receipts_modifieddatetime"><?php echo $receipts->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->ChequeCardNo->Visible) { // ChequeCardNo ?>
		<th class="<?php echo $receipts->ChequeCardNo->headerCellClass() ?>"><span id="elh_receipts_ChequeCardNo" class="receipts_ChequeCardNo"><?php echo $receipts->ChequeCardNo->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->CreditBankName->Visible) { // CreditBankName ?>
		<th class="<?php echo $receipts->CreditBankName->headerCellClass() ?>"><span id="elh_receipts_CreditBankName" class="receipts_CreditBankName"><?php echo $receipts->CreditBankName->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->CreditCardHolder->Visible) { // CreditCardHolder ?>
		<th class="<?php echo $receipts->CreditCardHolder->headerCellClass() ?>"><span id="elh_receipts_CreditCardHolder" class="receipts_CreditCardHolder"><?php echo $receipts->CreditCardHolder->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->CreditCardType->Visible) { // CreditCardType ?>
		<th class="<?php echo $receipts->CreditCardType->headerCellClass() ?>"><span id="elh_receipts_CreditCardType" class="receipts_CreditCardType"><?php echo $receipts->CreditCardType->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->CreditCardMachine->Visible) { // CreditCardMachine ?>
		<th class="<?php echo $receipts->CreditCardMachine->headerCellClass() ?>"><span id="elh_receipts_CreditCardMachine" class="receipts_CreditCardMachine"><?php echo $receipts->CreditCardMachine->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->CreditCardBatchNo->Visible) { // CreditCardBatchNo ?>
		<th class="<?php echo $receipts->CreditCardBatchNo->headerCellClass() ?>"><span id="elh_receipts_CreditCardBatchNo" class="receipts_CreditCardBatchNo"><?php echo $receipts->CreditCardBatchNo->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->CreditCardTax->Visible) { // CreditCardTax ?>
		<th class="<?php echo $receipts->CreditCardTax->headerCellClass() ?>"><span id="elh_receipts_CreditCardTax" class="receipts_CreditCardTax"><?php echo $receipts->CreditCardTax->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->CreditDeductionAmount->Visible) { // CreditDeductionAmount ?>
		<th class="<?php echo $receipts->CreditDeductionAmount->headerCellClass() ?>"><span id="elh_receipts_CreditDeductionAmount" class="receipts_CreditDeductionAmount"><?php echo $receipts->CreditDeductionAmount->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->RealizationAmount->Visible) { // RealizationAmount ?>
		<th class="<?php echo $receipts->RealizationAmount->headerCellClass() ?>"><span id="elh_receipts_RealizationAmount" class="receipts_RealizationAmount"><?php echo $receipts->RealizationAmount->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->RealizationStatus->Visible) { // RealizationStatus ?>
		<th class="<?php echo $receipts->RealizationStatus->headerCellClass() ?>"><span id="elh_receipts_RealizationStatus" class="receipts_RealizationStatus"><?php echo $receipts->RealizationStatus->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<th class="<?php echo $receipts->RealizationRemarks->headerCellClass() ?>"><span id="elh_receipts_RealizationRemarks" class="receipts_RealizationRemarks"><?php echo $receipts->RealizationRemarks->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<th class="<?php echo $receipts->RealizationBatchNo->headerCellClass() ?>"><span id="elh_receipts_RealizationBatchNo" class="receipts_RealizationBatchNo"><?php echo $receipts->RealizationBatchNo->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->RealizationDate->Visible) { // RealizationDate ?>
		<th class="<?php echo $receipts->RealizationDate->headerCellClass() ?>"><span id="elh_receipts_RealizationDate" class="receipts_RealizationDate"><?php echo $receipts->RealizationDate->caption() ?></span></th>
<?php } ?>
<?php if ($receipts->BankAccHolderMobileNumber->Visible) { // BankAccHolderMobileNumber ?>
		<th class="<?php echo $receipts->BankAccHolderMobileNumber->headerCellClass() ?>"><span id="elh_receipts_BankAccHolderMobileNumber" class="receipts_BankAccHolderMobileNumber"><?php echo $receipts->BankAccHolderMobileNumber->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$receipts_delete->RecCnt = 0;
$i = 0;
while (!$receipts_delete->Recordset->EOF) {
	$receipts_delete->RecCnt++;
	$receipts_delete->RowCnt++;

	// Set row properties
	$receipts->resetAttributes();
	$receipts->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$receipts_delete->loadRowValues($receipts_delete->Recordset);

	// Render row
	$receipts_delete->renderRow();
?>
	<tr<?php echo $receipts->rowAttributes() ?>>
<?php if ($receipts->id->Visible) { // id ?>
		<td<?php echo $receipts->id->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_id" class="receipts_id">
<span<?php echo $receipts->id->viewAttributes() ?>>
<?php echo $receipts->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->Reception->Visible) { // Reception ?>
		<td<?php echo $receipts->Reception->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_Reception" class="receipts_Reception">
<span<?php echo $receipts->Reception->viewAttributes() ?>>
<?php echo $receipts->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->Aid->Visible) { // Aid ?>
		<td<?php echo $receipts->Aid->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_Aid" class="receipts_Aid">
<span<?php echo $receipts->Aid->viewAttributes() ?>>
<?php echo $receipts->Aid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->Vid->Visible) { // Vid ?>
		<td<?php echo $receipts->Vid->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_Vid" class="receipts_Vid">
<span<?php echo $receipts->Vid->viewAttributes() ?>>
<?php echo $receipts->Vid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->patient_id->Visible) { // patient_id ?>
		<td<?php echo $receipts->patient_id->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_patient_id" class="receipts_patient_id">
<span<?php echo $receipts->patient_id->viewAttributes() ?>>
<?php echo $receipts->patient_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->mrnno->Visible) { // mrnno ?>
		<td<?php echo $receipts->mrnno->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_mrnno" class="receipts_mrnno">
<span<?php echo $receipts->mrnno->viewAttributes() ?>>
<?php echo $receipts->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->PatientName->Visible) { // PatientName ?>
		<td<?php echo $receipts->PatientName->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_PatientName" class="receipts_PatientName">
<span<?php echo $receipts->PatientName->viewAttributes() ?>>
<?php echo $receipts->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->amount->Visible) { // amount ?>
		<td<?php echo $receipts->amount->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_amount" class="receipts_amount">
<span<?php echo $receipts->amount->viewAttributes() ?>>
<?php echo $receipts->amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->Discount->Visible) { // Discount ?>
		<td<?php echo $receipts->Discount->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_Discount" class="receipts_Discount">
<span<?php echo $receipts->Discount->viewAttributes() ?>>
<?php echo $receipts->Discount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->SubTotal->Visible) { // SubTotal ?>
		<td<?php echo $receipts->SubTotal->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_SubTotal" class="receipts_SubTotal">
<span<?php echo $receipts->SubTotal->viewAttributes() ?>>
<?php echo $receipts->SubTotal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->patient_type->Visible) { // patient_type ?>
		<td<?php echo $receipts->patient_type->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_patient_type" class="receipts_patient_type">
<span<?php echo $receipts->patient_type->viewAttributes() ?>>
<?php echo $receipts->patient_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->invoiceId->Visible) { // invoiceId ?>
		<td<?php echo $receipts->invoiceId->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_invoiceId" class="receipts_invoiceId">
<span<?php echo $receipts->invoiceId->viewAttributes() ?>>
<?php echo $receipts->invoiceId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->invoiceAmount->Visible) { // invoiceAmount ?>
		<td<?php echo $receipts->invoiceAmount->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_invoiceAmount" class="receipts_invoiceAmount">
<span<?php echo $receipts->invoiceAmount->viewAttributes() ?>>
<?php echo $receipts->invoiceAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->invoiceStatus->Visible) { // invoiceStatus ?>
		<td<?php echo $receipts->invoiceStatus->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_invoiceStatus" class="receipts_invoiceStatus">
<span<?php echo $receipts->invoiceStatus->viewAttributes() ?>>
<?php echo $receipts->invoiceStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->modeOfPayment->Visible) { // modeOfPayment ?>
		<td<?php echo $receipts->modeOfPayment->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_modeOfPayment" class="receipts_modeOfPayment">
<span<?php echo $receipts->modeOfPayment->viewAttributes() ?>>
<?php echo $receipts->modeOfPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->charged_date->Visible) { // charged_date ?>
		<td<?php echo $receipts->charged_date->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_charged_date" class="receipts_charged_date">
<span<?php echo $receipts->charged_date->viewAttributes() ?>>
<?php echo $receipts->charged_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->status->Visible) { // status ?>
		<td<?php echo $receipts->status->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_status" class="receipts_status">
<span<?php echo $receipts->status->viewAttributes() ?>>
<?php echo $receipts->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->createdby->Visible) { // createdby ?>
		<td<?php echo $receipts->createdby->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_createdby" class="receipts_createdby">
<span<?php echo $receipts->createdby->viewAttributes() ?>>
<?php echo $receipts->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $receipts->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_createddatetime" class="receipts_createddatetime">
<span<?php echo $receipts->createddatetime->viewAttributes() ?>>
<?php echo $receipts->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $receipts->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_modifiedby" class="receipts_modifiedby">
<span<?php echo $receipts->modifiedby->viewAttributes() ?>>
<?php echo $receipts->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $receipts->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_modifieddatetime" class="receipts_modifieddatetime">
<span<?php echo $receipts->modifieddatetime->viewAttributes() ?>>
<?php echo $receipts->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->ChequeCardNo->Visible) { // ChequeCardNo ?>
		<td<?php echo $receipts->ChequeCardNo->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_ChequeCardNo" class="receipts_ChequeCardNo">
<span<?php echo $receipts->ChequeCardNo->viewAttributes() ?>>
<?php echo $receipts->ChequeCardNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->CreditBankName->Visible) { // CreditBankName ?>
		<td<?php echo $receipts->CreditBankName->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_CreditBankName" class="receipts_CreditBankName">
<span<?php echo $receipts->CreditBankName->viewAttributes() ?>>
<?php echo $receipts->CreditBankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->CreditCardHolder->Visible) { // CreditCardHolder ?>
		<td<?php echo $receipts->CreditCardHolder->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_CreditCardHolder" class="receipts_CreditCardHolder">
<span<?php echo $receipts->CreditCardHolder->viewAttributes() ?>>
<?php echo $receipts->CreditCardHolder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->CreditCardType->Visible) { // CreditCardType ?>
		<td<?php echo $receipts->CreditCardType->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_CreditCardType" class="receipts_CreditCardType">
<span<?php echo $receipts->CreditCardType->viewAttributes() ?>>
<?php echo $receipts->CreditCardType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->CreditCardMachine->Visible) { // CreditCardMachine ?>
		<td<?php echo $receipts->CreditCardMachine->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_CreditCardMachine" class="receipts_CreditCardMachine">
<span<?php echo $receipts->CreditCardMachine->viewAttributes() ?>>
<?php echo $receipts->CreditCardMachine->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->CreditCardBatchNo->Visible) { // CreditCardBatchNo ?>
		<td<?php echo $receipts->CreditCardBatchNo->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_CreditCardBatchNo" class="receipts_CreditCardBatchNo">
<span<?php echo $receipts->CreditCardBatchNo->viewAttributes() ?>>
<?php echo $receipts->CreditCardBatchNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->CreditCardTax->Visible) { // CreditCardTax ?>
		<td<?php echo $receipts->CreditCardTax->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_CreditCardTax" class="receipts_CreditCardTax">
<span<?php echo $receipts->CreditCardTax->viewAttributes() ?>>
<?php echo $receipts->CreditCardTax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->CreditDeductionAmount->Visible) { // CreditDeductionAmount ?>
		<td<?php echo $receipts->CreditDeductionAmount->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_CreditDeductionAmount" class="receipts_CreditDeductionAmount">
<span<?php echo $receipts->CreditDeductionAmount->viewAttributes() ?>>
<?php echo $receipts->CreditDeductionAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->RealizationAmount->Visible) { // RealizationAmount ?>
		<td<?php echo $receipts->RealizationAmount->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_RealizationAmount" class="receipts_RealizationAmount">
<span<?php echo $receipts->RealizationAmount->viewAttributes() ?>>
<?php echo $receipts->RealizationAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->RealizationStatus->Visible) { // RealizationStatus ?>
		<td<?php echo $receipts->RealizationStatus->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_RealizationStatus" class="receipts_RealizationStatus">
<span<?php echo $receipts->RealizationStatus->viewAttributes() ?>>
<?php echo $receipts->RealizationStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<td<?php echo $receipts->RealizationRemarks->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_RealizationRemarks" class="receipts_RealizationRemarks">
<span<?php echo $receipts->RealizationRemarks->viewAttributes() ?>>
<?php echo $receipts->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<td<?php echo $receipts->RealizationBatchNo->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_RealizationBatchNo" class="receipts_RealizationBatchNo">
<span<?php echo $receipts->RealizationBatchNo->viewAttributes() ?>>
<?php echo $receipts->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->RealizationDate->Visible) { // RealizationDate ?>
		<td<?php echo $receipts->RealizationDate->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_RealizationDate" class="receipts_RealizationDate">
<span<?php echo $receipts->RealizationDate->viewAttributes() ?>>
<?php echo $receipts->RealizationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts->BankAccHolderMobileNumber->Visible) { // BankAccHolderMobileNumber ?>
		<td<?php echo $receipts->BankAccHolderMobileNumber->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCnt ?>_receipts_BankAccHolderMobileNumber" class="receipts_BankAccHolderMobileNumber">
<span<?php echo $receipts->BankAccHolderMobileNumber->viewAttributes() ?>>
<?php echo $receipts->BankAccHolderMobileNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$receipts_delete->Recordset->moveNext();
}
$receipts_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $receipts_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$receipts_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$receipts_delete->terminate();
?>
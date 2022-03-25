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
<?php include_once "header.php"; ?>
<script>
var freceiptsdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	freceiptsdelete = currentForm = new ew.Form("freceiptsdelete", "delete");
	loadjs.done("freceiptsdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $receipts_delete->showPageHeader(); ?>
<?php
$receipts_delete->showMessage();
?>
<form name="freceiptsdelete" id="freceiptsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="receipts">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($receipts_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($receipts_delete->id->Visible) { // id ?>
		<th class="<?php echo $receipts_delete->id->headerCellClass() ?>"><span id="elh_receipts_id" class="receipts_id"><?php echo $receipts_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->Reception->Visible) { // Reception ?>
		<th class="<?php echo $receipts_delete->Reception->headerCellClass() ?>"><span id="elh_receipts_Reception" class="receipts_Reception"><?php echo $receipts_delete->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->Aid->Visible) { // Aid ?>
		<th class="<?php echo $receipts_delete->Aid->headerCellClass() ?>"><span id="elh_receipts_Aid" class="receipts_Aid"><?php echo $receipts_delete->Aid->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->Vid->Visible) { // Vid ?>
		<th class="<?php echo $receipts_delete->Vid->headerCellClass() ?>"><span id="elh_receipts_Vid" class="receipts_Vid"><?php echo $receipts_delete->Vid->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->patient_id->Visible) { // patient_id ?>
		<th class="<?php echo $receipts_delete->patient_id->headerCellClass() ?>"><span id="elh_receipts_patient_id" class="receipts_patient_id"><?php echo $receipts_delete->patient_id->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $receipts_delete->mrnno->headerCellClass() ?>"><span id="elh_receipts_mrnno" class="receipts_mrnno"><?php echo $receipts_delete->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $receipts_delete->PatientName->headerCellClass() ?>"><span id="elh_receipts_PatientName" class="receipts_PatientName"><?php echo $receipts_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->amount->Visible) { // amount ?>
		<th class="<?php echo $receipts_delete->amount->headerCellClass() ?>"><span id="elh_receipts_amount" class="receipts_amount"><?php echo $receipts_delete->amount->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->Discount->Visible) { // Discount ?>
		<th class="<?php echo $receipts_delete->Discount->headerCellClass() ?>"><span id="elh_receipts_Discount" class="receipts_Discount"><?php echo $receipts_delete->Discount->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->SubTotal->Visible) { // SubTotal ?>
		<th class="<?php echo $receipts_delete->SubTotal->headerCellClass() ?>"><span id="elh_receipts_SubTotal" class="receipts_SubTotal"><?php echo $receipts_delete->SubTotal->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->patient_type->Visible) { // patient_type ?>
		<th class="<?php echo $receipts_delete->patient_type->headerCellClass() ?>"><span id="elh_receipts_patient_type" class="receipts_patient_type"><?php echo $receipts_delete->patient_type->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->invoiceId->Visible) { // invoiceId ?>
		<th class="<?php echo $receipts_delete->invoiceId->headerCellClass() ?>"><span id="elh_receipts_invoiceId" class="receipts_invoiceId"><?php echo $receipts_delete->invoiceId->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->invoiceAmount->Visible) { // invoiceAmount ?>
		<th class="<?php echo $receipts_delete->invoiceAmount->headerCellClass() ?>"><span id="elh_receipts_invoiceAmount" class="receipts_invoiceAmount"><?php echo $receipts_delete->invoiceAmount->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->invoiceStatus->Visible) { // invoiceStatus ?>
		<th class="<?php echo $receipts_delete->invoiceStatus->headerCellClass() ?>"><span id="elh_receipts_invoiceStatus" class="receipts_invoiceStatus"><?php echo $receipts_delete->invoiceStatus->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->modeOfPayment->Visible) { // modeOfPayment ?>
		<th class="<?php echo $receipts_delete->modeOfPayment->headerCellClass() ?>"><span id="elh_receipts_modeOfPayment" class="receipts_modeOfPayment"><?php echo $receipts_delete->modeOfPayment->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->charged_date->Visible) { // charged_date ?>
		<th class="<?php echo $receipts_delete->charged_date->headerCellClass() ?>"><span id="elh_receipts_charged_date" class="receipts_charged_date"><?php echo $receipts_delete->charged_date->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->status->Visible) { // status ?>
		<th class="<?php echo $receipts_delete->status->headerCellClass() ?>"><span id="elh_receipts_status" class="receipts_status"><?php echo $receipts_delete->status->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $receipts_delete->createdby->headerCellClass() ?>"><span id="elh_receipts_createdby" class="receipts_createdby"><?php echo $receipts_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $receipts_delete->createddatetime->headerCellClass() ?>"><span id="elh_receipts_createddatetime" class="receipts_createddatetime"><?php echo $receipts_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $receipts_delete->modifiedby->headerCellClass() ?>"><span id="elh_receipts_modifiedby" class="receipts_modifiedby"><?php echo $receipts_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $receipts_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_receipts_modifieddatetime" class="receipts_modifieddatetime"><?php echo $receipts_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->ChequeCardNo->Visible) { // ChequeCardNo ?>
		<th class="<?php echo $receipts_delete->ChequeCardNo->headerCellClass() ?>"><span id="elh_receipts_ChequeCardNo" class="receipts_ChequeCardNo"><?php echo $receipts_delete->ChequeCardNo->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->CreditBankName->Visible) { // CreditBankName ?>
		<th class="<?php echo $receipts_delete->CreditBankName->headerCellClass() ?>"><span id="elh_receipts_CreditBankName" class="receipts_CreditBankName"><?php echo $receipts_delete->CreditBankName->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->CreditCardHolder->Visible) { // CreditCardHolder ?>
		<th class="<?php echo $receipts_delete->CreditCardHolder->headerCellClass() ?>"><span id="elh_receipts_CreditCardHolder" class="receipts_CreditCardHolder"><?php echo $receipts_delete->CreditCardHolder->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->CreditCardType->Visible) { // CreditCardType ?>
		<th class="<?php echo $receipts_delete->CreditCardType->headerCellClass() ?>"><span id="elh_receipts_CreditCardType" class="receipts_CreditCardType"><?php echo $receipts_delete->CreditCardType->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->CreditCardMachine->Visible) { // CreditCardMachine ?>
		<th class="<?php echo $receipts_delete->CreditCardMachine->headerCellClass() ?>"><span id="elh_receipts_CreditCardMachine" class="receipts_CreditCardMachine"><?php echo $receipts_delete->CreditCardMachine->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->CreditCardBatchNo->Visible) { // CreditCardBatchNo ?>
		<th class="<?php echo $receipts_delete->CreditCardBatchNo->headerCellClass() ?>"><span id="elh_receipts_CreditCardBatchNo" class="receipts_CreditCardBatchNo"><?php echo $receipts_delete->CreditCardBatchNo->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->CreditCardTax->Visible) { // CreditCardTax ?>
		<th class="<?php echo $receipts_delete->CreditCardTax->headerCellClass() ?>"><span id="elh_receipts_CreditCardTax" class="receipts_CreditCardTax"><?php echo $receipts_delete->CreditCardTax->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->CreditDeductionAmount->Visible) { // CreditDeductionAmount ?>
		<th class="<?php echo $receipts_delete->CreditDeductionAmount->headerCellClass() ?>"><span id="elh_receipts_CreditDeductionAmount" class="receipts_CreditDeductionAmount"><?php echo $receipts_delete->CreditDeductionAmount->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->RealizationAmount->Visible) { // RealizationAmount ?>
		<th class="<?php echo $receipts_delete->RealizationAmount->headerCellClass() ?>"><span id="elh_receipts_RealizationAmount" class="receipts_RealizationAmount"><?php echo $receipts_delete->RealizationAmount->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->RealizationStatus->Visible) { // RealizationStatus ?>
		<th class="<?php echo $receipts_delete->RealizationStatus->headerCellClass() ?>"><span id="elh_receipts_RealizationStatus" class="receipts_RealizationStatus"><?php echo $receipts_delete->RealizationStatus->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<th class="<?php echo $receipts_delete->RealizationRemarks->headerCellClass() ?>"><span id="elh_receipts_RealizationRemarks" class="receipts_RealizationRemarks"><?php echo $receipts_delete->RealizationRemarks->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<th class="<?php echo $receipts_delete->RealizationBatchNo->headerCellClass() ?>"><span id="elh_receipts_RealizationBatchNo" class="receipts_RealizationBatchNo"><?php echo $receipts_delete->RealizationBatchNo->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->RealizationDate->Visible) { // RealizationDate ?>
		<th class="<?php echo $receipts_delete->RealizationDate->headerCellClass() ?>"><span id="elh_receipts_RealizationDate" class="receipts_RealizationDate"><?php echo $receipts_delete->RealizationDate->caption() ?></span></th>
<?php } ?>
<?php if ($receipts_delete->BankAccHolderMobileNumber->Visible) { // BankAccHolderMobileNumber ?>
		<th class="<?php echo $receipts_delete->BankAccHolderMobileNumber->headerCellClass() ?>"><span id="elh_receipts_BankAccHolderMobileNumber" class="receipts_BankAccHolderMobileNumber"><?php echo $receipts_delete->BankAccHolderMobileNumber->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$receipts_delete->RecordCount = 0;
$i = 0;
while (!$receipts_delete->Recordset->EOF) {
	$receipts_delete->RecordCount++;
	$receipts_delete->RowCount++;

	// Set row properties
	$receipts->resetAttributes();
	$receipts->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$receipts_delete->loadRowValues($receipts_delete->Recordset);

	// Render row
	$receipts_delete->renderRow();
?>
	<tr <?php echo $receipts->rowAttributes() ?>>
<?php if ($receipts_delete->id->Visible) { // id ?>
		<td <?php echo $receipts_delete->id->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_id" class="receipts_id">
<span<?php echo $receipts_delete->id->viewAttributes() ?>><?php echo $receipts_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->Reception->Visible) { // Reception ?>
		<td <?php echo $receipts_delete->Reception->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_Reception" class="receipts_Reception">
<span<?php echo $receipts_delete->Reception->viewAttributes() ?>><?php echo $receipts_delete->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->Aid->Visible) { // Aid ?>
		<td <?php echo $receipts_delete->Aid->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_Aid" class="receipts_Aid">
<span<?php echo $receipts_delete->Aid->viewAttributes() ?>><?php echo $receipts_delete->Aid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->Vid->Visible) { // Vid ?>
		<td <?php echo $receipts_delete->Vid->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_Vid" class="receipts_Vid">
<span<?php echo $receipts_delete->Vid->viewAttributes() ?>><?php echo $receipts_delete->Vid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->patient_id->Visible) { // patient_id ?>
		<td <?php echo $receipts_delete->patient_id->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_patient_id" class="receipts_patient_id">
<span<?php echo $receipts_delete->patient_id->viewAttributes() ?>><?php echo $receipts_delete->patient_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->mrnno->Visible) { // mrnno ?>
		<td <?php echo $receipts_delete->mrnno->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_mrnno" class="receipts_mrnno">
<span<?php echo $receipts_delete->mrnno->viewAttributes() ?>><?php echo $receipts_delete->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $receipts_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_PatientName" class="receipts_PatientName">
<span<?php echo $receipts_delete->PatientName->viewAttributes() ?>><?php echo $receipts_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->amount->Visible) { // amount ?>
		<td <?php echo $receipts_delete->amount->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_amount" class="receipts_amount">
<span<?php echo $receipts_delete->amount->viewAttributes() ?>><?php echo $receipts_delete->amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->Discount->Visible) { // Discount ?>
		<td <?php echo $receipts_delete->Discount->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_Discount" class="receipts_Discount">
<span<?php echo $receipts_delete->Discount->viewAttributes() ?>><?php echo $receipts_delete->Discount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->SubTotal->Visible) { // SubTotal ?>
		<td <?php echo $receipts_delete->SubTotal->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_SubTotal" class="receipts_SubTotal">
<span<?php echo $receipts_delete->SubTotal->viewAttributes() ?>><?php echo $receipts_delete->SubTotal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->patient_type->Visible) { // patient_type ?>
		<td <?php echo $receipts_delete->patient_type->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_patient_type" class="receipts_patient_type">
<span<?php echo $receipts_delete->patient_type->viewAttributes() ?>><?php echo $receipts_delete->patient_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->invoiceId->Visible) { // invoiceId ?>
		<td <?php echo $receipts_delete->invoiceId->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_invoiceId" class="receipts_invoiceId">
<span<?php echo $receipts_delete->invoiceId->viewAttributes() ?>><?php echo $receipts_delete->invoiceId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->invoiceAmount->Visible) { // invoiceAmount ?>
		<td <?php echo $receipts_delete->invoiceAmount->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_invoiceAmount" class="receipts_invoiceAmount">
<span<?php echo $receipts_delete->invoiceAmount->viewAttributes() ?>><?php echo $receipts_delete->invoiceAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->invoiceStatus->Visible) { // invoiceStatus ?>
		<td <?php echo $receipts_delete->invoiceStatus->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_invoiceStatus" class="receipts_invoiceStatus">
<span<?php echo $receipts_delete->invoiceStatus->viewAttributes() ?>><?php echo $receipts_delete->invoiceStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->modeOfPayment->Visible) { // modeOfPayment ?>
		<td <?php echo $receipts_delete->modeOfPayment->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_modeOfPayment" class="receipts_modeOfPayment">
<span<?php echo $receipts_delete->modeOfPayment->viewAttributes() ?>><?php echo $receipts_delete->modeOfPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->charged_date->Visible) { // charged_date ?>
		<td <?php echo $receipts_delete->charged_date->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_charged_date" class="receipts_charged_date">
<span<?php echo $receipts_delete->charged_date->viewAttributes() ?>><?php echo $receipts_delete->charged_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->status->Visible) { // status ?>
		<td <?php echo $receipts_delete->status->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_status" class="receipts_status">
<span<?php echo $receipts_delete->status->viewAttributes() ?>><?php echo $receipts_delete->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $receipts_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_createdby" class="receipts_createdby">
<span<?php echo $receipts_delete->createdby->viewAttributes() ?>><?php echo $receipts_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $receipts_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_createddatetime" class="receipts_createddatetime">
<span<?php echo $receipts_delete->createddatetime->viewAttributes() ?>><?php echo $receipts_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $receipts_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_modifiedby" class="receipts_modifiedby">
<span<?php echo $receipts_delete->modifiedby->viewAttributes() ?>><?php echo $receipts_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $receipts_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_modifieddatetime" class="receipts_modifieddatetime">
<span<?php echo $receipts_delete->modifieddatetime->viewAttributes() ?>><?php echo $receipts_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->ChequeCardNo->Visible) { // ChequeCardNo ?>
		<td <?php echo $receipts_delete->ChequeCardNo->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_ChequeCardNo" class="receipts_ChequeCardNo">
<span<?php echo $receipts_delete->ChequeCardNo->viewAttributes() ?>><?php echo $receipts_delete->ChequeCardNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->CreditBankName->Visible) { // CreditBankName ?>
		<td <?php echo $receipts_delete->CreditBankName->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_CreditBankName" class="receipts_CreditBankName">
<span<?php echo $receipts_delete->CreditBankName->viewAttributes() ?>><?php echo $receipts_delete->CreditBankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->CreditCardHolder->Visible) { // CreditCardHolder ?>
		<td <?php echo $receipts_delete->CreditCardHolder->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_CreditCardHolder" class="receipts_CreditCardHolder">
<span<?php echo $receipts_delete->CreditCardHolder->viewAttributes() ?>><?php echo $receipts_delete->CreditCardHolder->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->CreditCardType->Visible) { // CreditCardType ?>
		<td <?php echo $receipts_delete->CreditCardType->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_CreditCardType" class="receipts_CreditCardType">
<span<?php echo $receipts_delete->CreditCardType->viewAttributes() ?>><?php echo $receipts_delete->CreditCardType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->CreditCardMachine->Visible) { // CreditCardMachine ?>
		<td <?php echo $receipts_delete->CreditCardMachine->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_CreditCardMachine" class="receipts_CreditCardMachine">
<span<?php echo $receipts_delete->CreditCardMachine->viewAttributes() ?>><?php echo $receipts_delete->CreditCardMachine->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->CreditCardBatchNo->Visible) { // CreditCardBatchNo ?>
		<td <?php echo $receipts_delete->CreditCardBatchNo->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_CreditCardBatchNo" class="receipts_CreditCardBatchNo">
<span<?php echo $receipts_delete->CreditCardBatchNo->viewAttributes() ?>><?php echo $receipts_delete->CreditCardBatchNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->CreditCardTax->Visible) { // CreditCardTax ?>
		<td <?php echo $receipts_delete->CreditCardTax->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_CreditCardTax" class="receipts_CreditCardTax">
<span<?php echo $receipts_delete->CreditCardTax->viewAttributes() ?>><?php echo $receipts_delete->CreditCardTax->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->CreditDeductionAmount->Visible) { // CreditDeductionAmount ?>
		<td <?php echo $receipts_delete->CreditDeductionAmount->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_CreditDeductionAmount" class="receipts_CreditDeductionAmount">
<span<?php echo $receipts_delete->CreditDeductionAmount->viewAttributes() ?>><?php echo $receipts_delete->CreditDeductionAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->RealizationAmount->Visible) { // RealizationAmount ?>
		<td <?php echo $receipts_delete->RealizationAmount->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_RealizationAmount" class="receipts_RealizationAmount">
<span<?php echo $receipts_delete->RealizationAmount->viewAttributes() ?>><?php echo $receipts_delete->RealizationAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->RealizationStatus->Visible) { // RealizationStatus ?>
		<td <?php echo $receipts_delete->RealizationStatus->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_RealizationStatus" class="receipts_RealizationStatus">
<span<?php echo $receipts_delete->RealizationStatus->viewAttributes() ?>><?php echo $receipts_delete->RealizationStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<td <?php echo $receipts_delete->RealizationRemarks->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_RealizationRemarks" class="receipts_RealizationRemarks">
<span<?php echo $receipts_delete->RealizationRemarks->viewAttributes() ?>><?php echo $receipts_delete->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<td <?php echo $receipts_delete->RealizationBatchNo->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_RealizationBatchNo" class="receipts_RealizationBatchNo">
<span<?php echo $receipts_delete->RealizationBatchNo->viewAttributes() ?>><?php echo $receipts_delete->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->RealizationDate->Visible) { // RealizationDate ?>
		<td <?php echo $receipts_delete->RealizationDate->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_RealizationDate" class="receipts_RealizationDate">
<span<?php echo $receipts_delete->RealizationDate->viewAttributes() ?>><?php echo $receipts_delete->RealizationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($receipts_delete->BankAccHolderMobileNumber->Visible) { // BankAccHolderMobileNumber ?>
		<td <?php echo $receipts_delete->BankAccHolderMobileNumber->cellAttributes() ?>>
<span id="el<?php echo $receipts_delete->RowCount ?>_receipts_BankAccHolderMobileNumber" class="receipts_BankAccHolderMobileNumber">
<span<?php echo $receipts_delete->BankAccHolderMobileNumber->viewAttributes() ?>><?php echo $receipts_delete->BankAccHolderMobileNumber->getViewValue() ?></span>
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
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$receipts_delete->terminate();
?>
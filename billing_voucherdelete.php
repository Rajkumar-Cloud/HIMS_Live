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
$billing_voucher_delete = new billing_voucher_delete();

// Run the page
$billing_voucher_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_voucher_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fbilling_voucherdelete = currentForm = new ew.Form("fbilling_voucherdelete", "delete");

// Form_CustomValidate event
fbilling_voucherdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbilling_voucherdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fbilling_voucherdelete.lists["x_Doctor"] = <?php echo $billing_voucher_delete->Doctor->Lookup->toClientList() ?>;
fbilling_voucherdelete.lists["x_Doctor"].options = <?php echo JsonEncode($billing_voucher_delete->Doctor->lookupOptions()) ?>;
fbilling_voucherdelete.autoSuggests["x_Doctor"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fbilling_voucherdelete.lists["x_ModeofPayment"] = <?php echo $billing_voucher_delete->ModeofPayment->Lookup->toClientList() ?>;
fbilling_voucherdelete.lists["x_ModeofPayment"].options = <?php echo JsonEncode($billing_voucher_delete->ModeofPayment->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $billing_voucher_delete->showPageHeader(); ?>
<?php
$billing_voucher_delete->showMessage();
?>
<form name="fbilling_voucherdelete" id="fbilling_voucherdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($billing_voucher_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $billing_voucher_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_voucher">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($billing_voucher_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($billing_voucher->id->Visible) { // id ?>
		<th class="<?php echo $billing_voucher->id->headerCellClass() ?>"><span id="elh_billing_voucher_id" class="billing_voucher_id"><?php echo $billing_voucher->id->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->PatId->Visible) { // PatId ?>
		<th class="<?php echo $billing_voucher->PatId->headerCellClass() ?>"><span id="elh_billing_voucher_PatId" class="billing_voucher_PatId"><?php echo $billing_voucher->PatId->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->BillNumber->Visible) { // BillNumber ?>
		<th class="<?php echo $billing_voucher->BillNumber->headerCellClass() ?>"><span id="elh_billing_voucher_BillNumber" class="billing_voucher_BillNumber"><?php echo $billing_voucher->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $billing_voucher->PatientId->headerCellClass() ?>"><span id="elh_billing_voucher_PatientId" class="billing_voucher_PatientId"><?php echo $billing_voucher->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $billing_voucher->PatientName->headerCellClass() ?>"><span id="elh_billing_voucher_PatientName" class="billing_voucher_PatientName"><?php echo $billing_voucher->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->Gender->Visible) { // Gender ?>
		<th class="<?php echo $billing_voucher->Gender->headerCellClass() ?>"><span id="elh_billing_voucher_Gender" class="billing_voucher_Gender"><?php echo $billing_voucher->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->Mobile->Visible) { // Mobile ?>
		<th class="<?php echo $billing_voucher->Mobile->headerCellClass() ?>"><span id="elh_billing_voucher_Mobile" class="billing_voucher_Mobile"><?php echo $billing_voucher->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->Doctor->Visible) { // Doctor ?>
		<th class="<?php echo $billing_voucher->Doctor->headerCellClass() ?>"><span id="elh_billing_voucher_Doctor" class="billing_voucher_Doctor"><?php echo $billing_voucher->Doctor->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<th class="<?php echo $billing_voucher->ModeofPayment->headerCellClass() ?>"><span id="elh_billing_voucher_ModeofPayment" class="billing_voucher_ModeofPayment"><?php echo $billing_voucher->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->Amount->Visible) { // Amount ?>
		<th class="<?php echo $billing_voucher->Amount->headerCellClass() ?>"><span id="elh_billing_voucher_Amount" class="billing_voucher_Amount"><?php echo $billing_voucher->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->AnyDues->Visible) { // AnyDues ?>
		<th class="<?php echo $billing_voucher->AnyDues->headerCellClass() ?>"><span id="elh_billing_voucher_AnyDues" class="billing_voucher_AnyDues"><?php echo $billing_voucher->AnyDues->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->createdby->Visible) { // createdby ?>
		<th class="<?php echo $billing_voucher->createdby->headerCellClass() ?>"><span id="elh_billing_voucher_createdby" class="billing_voucher_createdby"><?php echo $billing_voucher->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $billing_voucher->createddatetime->headerCellClass() ?>"><span id="elh_billing_voucher_createddatetime" class="billing_voucher_createddatetime"><?php echo $billing_voucher->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $billing_voucher->modifiedby->headerCellClass() ?>"><span id="elh_billing_voucher_modifiedby" class="billing_voucher_modifiedby"><?php echo $billing_voucher->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $billing_voucher->modifieddatetime->headerCellClass() ?>"><span id="elh_billing_voucher_modifieddatetime" class="billing_voucher_modifieddatetime"><?php echo $billing_voucher->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->HospID->Visible) { // HospID ?>
		<th class="<?php echo $billing_voucher->HospID->headerCellClass() ?>"><span id="elh_billing_voucher_HospID" class="billing_voucher_HospID"><?php echo $billing_voucher->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->RIDNO->Visible) { // RIDNO ?>
		<th class="<?php echo $billing_voucher->RIDNO->headerCellClass() ?>"><span id="elh_billing_voucher_RIDNO" class="billing_voucher_RIDNO"><?php echo $billing_voucher->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $billing_voucher->TidNo->headerCellClass() ?>"><span id="elh_billing_voucher_TidNo" class="billing_voucher_TidNo"><?php echo $billing_voucher->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->CId->Visible) { // CId ?>
		<th class="<?php echo $billing_voucher->CId->headerCellClass() ?>"><span id="elh_billing_voucher_CId" class="billing_voucher_CId"><?php echo $billing_voucher->CId->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $billing_voucher->PartnerName->headerCellClass() ?>"><span id="elh_billing_voucher_PartnerName" class="billing_voucher_PartnerName"><?php echo $billing_voucher->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->PayerType->Visible) { // PayerType ?>
		<th class="<?php echo $billing_voucher->PayerType->headerCellClass() ?>"><span id="elh_billing_voucher_PayerType" class="billing_voucher_PayerType"><?php echo $billing_voucher->PayerType->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->Dob->Visible) { // Dob ?>
		<th class="<?php echo $billing_voucher->Dob->headerCellClass() ?>"><span id="elh_billing_voucher_Dob" class="billing_voucher_Dob"><?php echo $billing_voucher->Dob->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->DrDepartment->Visible) { // DrDepartment ?>
		<th class="<?php echo $billing_voucher->DrDepartment->headerCellClass() ?>"><span id="elh_billing_voucher_DrDepartment" class="billing_voucher_DrDepartment"><?php echo $billing_voucher->DrDepartment->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->RefferedBy->Visible) { // RefferedBy ?>
		<th class="<?php echo $billing_voucher->RefferedBy->headerCellClass() ?>"><span id="elh_billing_voucher_RefferedBy" class="billing_voucher_RefferedBy"><?php echo $billing_voucher->RefferedBy->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->CardNumber->Visible) { // CardNumber ?>
		<th class="<?php echo $billing_voucher->CardNumber->headerCellClass() ?>"><span id="elh_billing_voucher_CardNumber" class="billing_voucher_CardNumber"><?php echo $billing_voucher->CardNumber->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->BankName->Visible) { // BankName ?>
		<th class="<?php echo $billing_voucher->BankName->headerCellClass() ?>"><span id="elh_billing_voucher_BankName" class="billing_voucher_BankName"><?php echo $billing_voucher->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->UserName->Visible) { // UserName ?>
		<th class="<?php echo $billing_voucher->UserName->headerCellClass() ?>"><span id="elh_billing_voucher_UserName" class="billing_voucher_UserName"><?php echo $billing_voucher->UserName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
		<th class="<?php echo $billing_voucher->AdjustmentAdvance->headerCellClass() ?>"><span id="elh_billing_voucher_AdjustmentAdvance" class="billing_voucher_AdjustmentAdvance"><?php echo $billing_voucher->AdjustmentAdvance->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->billing_vouchercol->Visible) { // billing_vouchercol ?>
		<th class="<?php echo $billing_voucher->billing_vouchercol->headerCellClass() ?>"><span id="elh_billing_voucher_billing_vouchercol" class="billing_voucher_billing_vouchercol"><?php echo $billing_voucher->billing_vouchercol->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->BillType->Visible) { // BillType ?>
		<th class="<?php echo $billing_voucher->BillType->headerCellClass() ?>"><span id="elh_billing_voucher_BillType" class="billing_voucher_BillType"><?php echo $billing_voucher->BillType->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->ProcedureName->Visible) { // ProcedureName ?>
		<th class="<?php echo $billing_voucher->ProcedureName->headerCellClass() ?>"><span id="elh_billing_voucher_ProcedureName" class="billing_voucher_ProcedureName"><?php echo $billing_voucher->ProcedureName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->ProcedureAmount->Visible) { // ProcedureAmount ?>
		<th class="<?php echo $billing_voucher->ProcedureAmount->headerCellClass() ?>"><span id="elh_billing_voucher_ProcedureAmount" class="billing_voucher_ProcedureAmount"><?php echo $billing_voucher->ProcedureAmount->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->IncludePackage->Visible) { // IncludePackage ?>
		<th class="<?php echo $billing_voucher->IncludePackage->headerCellClass() ?>"><span id="elh_billing_voucher_IncludePackage" class="billing_voucher_IncludePackage"><?php echo $billing_voucher->IncludePackage->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->CancelBill->Visible) { // CancelBill ?>
		<th class="<?php echo $billing_voucher->CancelBill->headerCellClass() ?>"><span id="elh_billing_voucher_CancelBill" class="billing_voucher_CancelBill"><?php echo $billing_voucher->CancelBill->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->CancelReason->Visible) { // CancelReason ?>
		<th class="<?php echo $billing_voucher->CancelReason->headerCellClass() ?>"><span id="elh_billing_voucher_CancelReason" class="billing_voucher_CancelReason"><?php echo $billing_voucher->CancelReason->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
		<th class="<?php echo $billing_voucher->CancelModeOfPayment->headerCellClass() ?>"><span id="elh_billing_voucher_CancelModeOfPayment" class="billing_voucher_CancelModeOfPayment"><?php echo $billing_voucher->CancelModeOfPayment->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->CancelAmount->Visible) { // CancelAmount ?>
		<th class="<?php echo $billing_voucher->CancelAmount->headerCellClass() ?>"><span id="elh_billing_voucher_CancelAmount" class="billing_voucher_CancelAmount"><?php echo $billing_voucher->CancelAmount->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->CancelBankName->Visible) { // CancelBankName ?>
		<th class="<?php echo $billing_voucher->CancelBankName->headerCellClass() ?>"><span id="elh_billing_voucher_CancelBankName" class="billing_voucher_CancelBankName"><?php echo $billing_voucher->CancelBankName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
		<th class="<?php echo $billing_voucher->CancelTransactionNumber->headerCellClass() ?>"><span id="elh_billing_voucher_CancelTransactionNumber" class="billing_voucher_CancelTransactionNumber"><?php echo $billing_voucher->CancelTransactionNumber->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->LabTest->Visible) { // LabTest ?>
		<th class="<?php echo $billing_voucher->LabTest->headerCellClass() ?>"><span id="elh_billing_voucher_LabTest" class="billing_voucher_LabTest"><?php echo $billing_voucher->LabTest->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->sid->Visible) { // sid ?>
		<th class="<?php echo $billing_voucher->sid->headerCellClass() ?>"><span id="elh_billing_voucher_sid" class="billing_voucher_sid"><?php echo $billing_voucher->sid->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->SidNo->Visible) { // SidNo ?>
		<th class="<?php echo $billing_voucher->SidNo->headerCellClass() ?>"><span id="elh_billing_voucher_SidNo" class="billing_voucher_SidNo"><?php echo $billing_voucher->SidNo->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->createdDatettime->Visible) { // createdDatettime ?>
		<th class="<?php echo $billing_voucher->createdDatettime->headerCellClass() ?>"><span id="elh_billing_voucher_createdDatettime" class="billing_voucher_createdDatettime"><?php echo $billing_voucher->createdDatettime->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->LabTestReleased->Visible) { // LabTestReleased ?>
		<th class="<?php echo $billing_voucher->LabTestReleased->headerCellClass() ?>"><span id="elh_billing_voucher_LabTestReleased" class="billing_voucher_LabTestReleased"><?php echo $billing_voucher->LabTestReleased->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->GoogleReviewID->Visible) { // GoogleReviewID ?>
		<th class="<?php echo $billing_voucher->GoogleReviewID->headerCellClass() ?>"><span id="elh_billing_voucher_GoogleReviewID" class="billing_voucher_GoogleReviewID"><?php echo $billing_voucher->GoogleReviewID->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->CardType->Visible) { // CardType ?>
		<th class="<?php echo $billing_voucher->CardType->headerCellClass() ?>"><span id="elh_billing_voucher_CardType" class="billing_voucher_CardType"><?php echo $billing_voucher->CardType->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->PharmacyBill->Visible) { // PharmacyBill ?>
		<th class="<?php echo $billing_voucher->PharmacyBill->headerCellClass() ?>"><span id="elh_billing_voucher_PharmacyBill" class="billing_voucher_PharmacyBill"><?php echo $billing_voucher->PharmacyBill->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
		<th class="<?php echo $billing_voucher->DiscountAmount->headerCellClass() ?>"><span id="elh_billing_voucher_DiscountAmount" class="billing_voucher_DiscountAmount"><?php echo $billing_voucher->DiscountAmount->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->Cash->Visible) { // Cash ?>
		<th class="<?php echo $billing_voucher->Cash->headerCellClass() ?>"><span id="elh_billing_voucher_Cash" class="billing_voucher_Cash"><?php echo $billing_voucher->Cash->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher->Card->Visible) { // Card ?>
		<th class="<?php echo $billing_voucher->Card->headerCellClass() ?>"><span id="elh_billing_voucher_Card" class="billing_voucher_Card"><?php echo $billing_voucher->Card->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$billing_voucher_delete->RecCnt = 0;
$i = 0;
while (!$billing_voucher_delete->Recordset->EOF) {
	$billing_voucher_delete->RecCnt++;
	$billing_voucher_delete->RowCnt++;

	// Set row properties
	$billing_voucher->resetAttributes();
	$billing_voucher->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$billing_voucher_delete->loadRowValues($billing_voucher_delete->Recordset);

	// Render row
	$billing_voucher_delete->renderRow();
?>
	<tr<?php echo $billing_voucher->rowAttributes() ?>>
<?php if ($billing_voucher->id->Visible) { // id ?>
		<td<?php echo $billing_voucher->id->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_id" class="billing_voucher_id">
<span<?php echo $billing_voucher->id->viewAttributes() ?>>
<?php echo $billing_voucher->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->PatId->Visible) { // PatId ?>
		<td<?php echo $billing_voucher->PatId->cellAttributes() ?>>
<script id="orig<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_PatId" class="billing_voucheredit" type="text/html">
<?php echo $billing_voucher->PatId->getViewValue() ?>
</script>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_PatId" class="billing_voucher_PatId">
<span<?php echo $billing_voucher->PatId->viewAttributes() ?>><?php echo Barcode()->show($billing_voucher->PatId->CurrentValue, 'QRCODE', 60) ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->BillNumber->Visible) { // BillNumber ?>
		<td<?php echo $billing_voucher->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_BillNumber" class="billing_voucher_BillNumber">
<span<?php echo $billing_voucher->BillNumber->viewAttributes() ?>>
<?php echo $billing_voucher->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->PatientId->Visible) { // PatientId ?>
		<td<?php echo $billing_voucher->PatientId->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_PatientId" class="billing_voucher_PatientId">
<span>
<?php echo GetImageViewTag($billing_voucher->PatientId, $billing_voucher->PatientId->getViewValue()) ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->PatientName->Visible) { // PatientName ?>
		<td<?php echo $billing_voucher->PatientName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_PatientName" class="billing_voucher_PatientName">
<span<?php echo $billing_voucher->PatientName->viewAttributes() ?>>
<?php echo $billing_voucher->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->Gender->Visible) { // Gender ?>
		<td<?php echo $billing_voucher->Gender->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_Gender" class="billing_voucher_Gender">
<span<?php echo $billing_voucher->Gender->viewAttributes() ?>>
<?php echo $billing_voucher->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->Mobile->Visible) { // Mobile ?>
		<td<?php echo $billing_voucher->Mobile->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_Mobile" class="billing_voucher_Mobile">
<span<?php echo $billing_voucher->Mobile->viewAttributes() ?>>
<?php echo $billing_voucher->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->Doctor->Visible) { // Doctor ?>
		<td<?php echo $billing_voucher->Doctor->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_Doctor" class="billing_voucher_Doctor">
<span<?php echo $billing_voucher->Doctor->viewAttributes() ?>>
<?php echo $billing_voucher->Doctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<td<?php echo $billing_voucher->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_ModeofPayment" class="billing_voucher_ModeofPayment">
<span<?php echo $billing_voucher->ModeofPayment->viewAttributes() ?>>
<?php echo $billing_voucher->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->Amount->Visible) { // Amount ?>
		<td<?php echo $billing_voucher->Amount->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_Amount" class="billing_voucher_Amount">
<span<?php echo $billing_voucher->Amount->viewAttributes() ?>>
<?php echo $billing_voucher->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->AnyDues->Visible) { // AnyDues ?>
		<td<?php echo $billing_voucher->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_AnyDues" class="billing_voucher_AnyDues">
<span<?php echo $billing_voucher->AnyDues->viewAttributes() ?>>
<?php echo $billing_voucher->AnyDues->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->createdby->Visible) { // createdby ?>
		<td<?php echo $billing_voucher->createdby->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_createdby" class="billing_voucher_createdby">
<span<?php echo $billing_voucher->createdby->viewAttributes() ?>>
<?php echo $billing_voucher->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $billing_voucher->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_createddatetime" class="billing_voucher_createddatetime">
<span<?php echo $billing_voucher->createddatetime->viewAttributes() ?>>
<?php echo $billing_voucher->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $billing_voucher->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_modifiedby" class="billing_voucher_modifiedby">
<span<?php echo $billing_voucher->modifiedby->viewAttributes() ?>>
<?php echo $billing_voucher->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $billing_voucher->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_modifieddatetime" class="billing_voucher_modifieddatetime">
<span<?php echo $billing_voucher->modifieddatetime->viewAttributes() ?>>
<?php echo $billing_voucher->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->HospID->Visible) { // HospID ?>
		<td<?php echo $billing_voucher->HospID->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_HospID" class="billing_voucher_HospID">
<span<?php echo $billing_voucher->HospID->viewAttributes() ?>>
<?php echo $billing_voucher->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->RIDNO->Visible) { // RIDNO ?>
		<td<?php echo $billing_voucher->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_RIDNO" class="billing_voucher_RIDNO">
<span<?php echo $billing_voucher->RIDNO->viewAttributes() ?>>
<?php echo $billing_voucher->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->TidNo->Visible) { // TidNo ?>
		<td<?php echo $billing_voucher->TidNo->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_TidNo" class="billing_voucher_TidNo">
<span<?php echo $billing_voucher->TidNo->viewAttributes() ?>>
<?php echo $billing_voucher->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->CId->Visible) { // CId ?>
		<td<?php echo $billing_voucher->CId->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_CId" class="billing_voucher_CId">
<span<?php echo $billing_voucher->CId->viewAttributes() ?>>
<?php echo $billing_voucher->CId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->PartnerName->Visible) { // PartnerName ?>
		<td<?php echo $billing_voucher->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_PartnerName" class="billing_voucher_PartnerName">
<span<?php echo $billing_voucher->PartnerName->viewAttributes() ?>>
<?php echo $billing_voucher->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->PayerType->Visible) { // PayerType ?>
		<td<?php echo $billing_voucher->PayerType->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_PayerType" class="billing_voucher_PayerType">
<span<?php echo $billing_voucher->PayerType->viewAttributes() ?>>
<?php echo $billing_voucher->PayerType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->Dob->Visible) { // Dob ?>
		<td<?php echo $billing_voucher->Dob->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_Dob" class="billing_voucher_Dob">
<span<?php echo $billing_voucher->Dob->viewAttributes() ?>>
<?php echo $billing_voucher->Dob->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->DrDepartment->Visible) { // DrDepartment ?>
		<td<?php echo $billing_voucher->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_DrDepartment" class="billing_voucher_DrDepartment">
<span<?php echo $billing_voucher->DrDepartment->viewAttributes() ?>>
<?php echo $billing_voucher->DrDepartment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->RefferedBy->Visible) { // RefferedBy ?>
		<td<?php echo $billing_voucher->RefferedBy->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_RefferedBy" class="billing_voucher_RefferedBy">
<span<?php echo $billing_voucher->RefferedBy->viewAttributes() ?>>
<?php echo $billing_voucher->RefferedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->CardNumber->Visible) { // CardNumber ?>
		<td<?php echo $billing_voucher->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_CardNumber" class="billing_voucher_CardNumber">
<span<?php echo $billing_voucher->CardNumber->viewAttributes() ?>>
<?php echo $billing_voucher->CardNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->BankName->Visible) { // BankName ?>
		<td<?php echo $billing_voucher->BankName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_BankName" class="billing_voucher_BankName">
<span<?php echo $billing_voucher->BankName->viewAttributes() ?>>
<?php echo $billing_voucher->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->UserName->Visible) { // UserName ?>
		<td<?php echo $billing_voucher->UserName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_UserName" class="billing_voucher_UserName">
<span<?php echo $billing_voucher->UserName->viewAttributes() ?>>
<?php echo $billing_voucher->UserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
		<td<?php echo $billing_voucher->AdjustmentAdvance->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_AdjustmentAdvance" class="billing_voucher_AdjustmentAdvance">
<span<?php echo $billing_voucher->AdjustmentAdvance->viewAttributes() ?>>
<?php echo $billing_voucher->AdjustmentAdvance->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->billing_vouchercol->Visible) { // billing_vouchercol ?>
		<td<?php echo $billing_voucher->billing_vouchercol->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_billing_vouchercol" class="billing_voucher_billing_vouchercol">
<span<?php echo $billing_voucher->billing_vouchercol->viewAttributes() ?>>
<?php echo $billing_voucher->billing_vouchercol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->BillType->Visible) { // BillType ?>
		<td<?php echo $billing_voucher->BillType->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_BillType" class="billing_voucher_BillType">
<span<?php echo $billing_voucher->BillType->viewAttributes() ?>>
<?php echo $billing_voucher->BillType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->ProcedureName->Visible) { // ProcedureName ?>
		<td<?php echo $billing_voucher->ProcedureName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_ProcedureName" class="billing_voucher_ProcedureName">
<span<?php echo $billing_voucher->ProcedureName->viewAttributes() ?>>
<?php echo $billing_voucher->ProcedureName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->ProcedureAmount->Visible) { // ProcedureAmount ?>
		<td<?php echo $billing_voucher->ProcedureAmount->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_ProcedureAmount" class="billing_voucher_ProcedureAmount">
<span<?php echo $billing_voucher->ProcedureAmount->viewAttributes() ?>>
<?php echo $billing_voucher->ProcedureAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->IncludePackage->Visible) { // IncludePackage ?>
		<td<?php echo $billing_voucher->IncludePackage->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_IncludePackage" class="billing_voucher_IncludePackage">
<span<?php echo $billing_voucher->IncludePackage->viewAttributes() ?>>
<?php echo $billing_voucher->IncludePackage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->CancelBill->Visible) { // CancelBill ?>
		<td<?php echo $billing_voucher->CancelBill->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_CancelBill" class="billing_voucher_CancelBill">
<span<?php echo $billing_voucher->CancelBill->viewAttributes() ?>>
<?php echo $billing_voucher->CancelBill->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->CancelReason->Visible) { // CancelReason ?>
		<td<?php echo $billing_voucher->CancelReason->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_CancelReason" class="billing_voucher_CancelReason">
<span<?php echo $billing_voucher->CancelReason->viewAttributes() ?>>
<?php echo $billing_voucher->CancelReason->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
		<td<?php echo $billing_voucher->CancelModeOfPayment->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_CancelModeOfPayment" class="billing_voucher_CancelModeOfPayment">
<span<?php echo $billing_voucher->CancelModeOfPayment->viewAttributes() ?>>
<?php echo $billing_voucher->CancelModeOfPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->CancelAmount->Visible) { // CancelAmount ?>
		<td<?php echo $billing_voucher->CancelAmount->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_CancelAmount" class="billing_voucher_CancelAmount">
<span<?php echo $billing_voucher->CancelAmount->viewAttributes() ?>>
<?php echo $billing_voucher->CancelAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->CancelBankName->Visible) { // CancelBankName ?>
		<td<?php echo $billing_voucher->CancelBankName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_CancelBankName" class="billing_voucher_CancelBankName">
<span<?php echo $billing_voucher->CancelBankName->viewAttributes() ?>>
<?php echo $billing_voucher->CancelBankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
		<td<?php echo $billing_voucher->CancelTransactionNumber->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_CancelTransactionNumber" class="billing_voucher_CancelTransactionNumber">
<span<?php echo $billing_voucher->CancelTransactionNumber->viewAttributes() ?>>
<?php echo $billing_voucher->CancelTransactionNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->LabTest->Visible) { // LabTest ?>
		<td<?php echo $billing_voucher->LabTest->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_LabTest" class="billing_voucher_LabTest">
<span<?php echo $billing_voucher->LabTest->viewAttributes() ?>>
<?php echo $billing_voucher->LabTest->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->sid->Visible) { // sid ?>
		<td<?php echo $billing_voucher->sid->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_sid" class="billing_voucher_sid">
<span<?php echo $billing_voucher->sid->viewAttributes() ?>>
<?php echo $billing_voucher->sid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->SidNo->Visible) { // SidNo ?>
		<td<?php echo $billing_voucher->SidNo->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_SidNo" class="billing_voucher_SidNo">
<span<?php echo $billing_voucher->SidNo->viewAttributes() ?>>
<?php echo $billing_voucher->SidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->createdDatettime->Visible) { // createdDatettime ?>
		<td<?php echo $billing_voucher->createdDatettime->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_createdDatettime" class="billing_voucher_createdDatettime">
<span<?php echo $billing_voucher->createdDatettime->viewAttributes() ?>>
<?php echo $billing_voucher->createdDatettime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->LabTestReleased->Visible) { // LabTestReleased ?>
		<td<?php echo $billing_voucher->LabTestReleased->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_LabTestReleased" class="billing_voucher_LabTestReleased">
<span<?php echo $billing_voucher->LabTestReleased->viewAttributes() ?>>
<?php echo $billing_voucher->LabTestReleased->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->GoogleReviewID->Visible) { // GoogleReviewID ?>
		<td<?php echo $billing_voucher->GoogleReviewID->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_GoogleReviewID" class="billing_voucher_GoogleReviewID">
<span<?php echo $billing_voucher->GoogleReviewID->viewAttributes() ?>>
<?php echo $billing_voucher->GoogleReviewID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->CardType->Visible) { // CardType ?>
		<td<?php echo $billing_voucher->CardType->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_CardType" class="billing_voucher_CardType">
<span<?php echo $billing_voucher->CardType->viewAttributes() ?>>
<?php echo $billing_voucher->CardType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->PharmacyBill->Visible) { // PharmacyBill ?>
		<td<?php echo $billing_voucher->PharmacyBill->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_PharmacyBill" class="billing_voucher_PharmacyBill">
<span<?php echo $billing_voucher->PharmacyBill->viewAttributes() ?>>
<?php echo $billing_voucher->PharmacyBill->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
		<td<?php echo $billing_voucher->DiscountAmount->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_DiscountAmount" class="billing_voucher_DiscountAmount">
<span<?php echo $billing_voucher->DiscountAmount->viewAttributes() ?>>
<?php echo $billing_voucher->DiscountAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->Cash->Visible) { // Cash ?>
		<td<?php echo $billing_voucher->Cash->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_Cash" class="billing_voucher_Cash">
<span<?php echo $billing_voucher->Cash->viewAttributes() ?>>
<?php echo $billing_voucher->Cash->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher->Card->Visible) { // Card ?>
		<td<?php echo $billing_voucher->Card->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCnt ?>_billing_voucher_Card" class="billing_voucher_Card">
<span<?php echo $billing_voucher->Card->viewAttributes() ?>>
<?php echo $billing_voucher->Card->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$billing_voucher_delete->Recordset->moveNext();
}
$billing_voucher_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $billing_voucher_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$billing_voucher_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$billing_voucher_delete->terminate();
?>
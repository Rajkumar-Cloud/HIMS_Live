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
<?php include_once "header.php"; ?>
<script>
var fbilling_voucherdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fbilling_voucherdelete = currentForm = new ew.Form("fbilling_voucherdelete", "delete");
	loadjs.done("fbilling_voucherdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $billing_voucher_delete->showPageHeader(); ?>
<?php
$billing_voucher_delete->showMessage();
?>
<form name="fbilling_voucherdelete" id="fbilling_voucherdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_voucher">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($billing_voucher_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($billing_voucher_delete->id->Visible) { // id ?>
		<th class="<?php echo $billing_voucher_delete->id->headerCellClass() ?>"><span id="elh_billing_voucher_id" class="billing_voucher_id"><?php echo $billing_voucher_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->PatId->Visible) { // PatId ?>
		<th class="<?php echo $billing_voucher_delete->PatId->headerCellClass() ?>"><span id="elh_billing_voucher_PatId" class="billing_voucher_PatId"><?php echo $billing_voucher_delete->PatId->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->BillNumber->Visible) { // BillNumber ?>
		<th class="<?php echo $billing_voucher_delete->BillNumber->headerCellClass() ?>"><span id="elh_billing_voucher_BillNumber" class="billing_voucher_BillNumber"><?php echo $billing_voucher_delete->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $billing_voucher_delete->PatientId->headerCellClass() ?>"><span id="elh_billing_voucher_PatientId" class="billing_voucher_PatientId"><?php echo $billing_voucher_delete->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $billing_voucher_delete->PatientName->headerCellClass() ?>"><span id="elh_billing_voucher_PatientName" class="billing_voucher_PatientName"><?php echo $billing_voucher_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->Gender->Visible) { // Gender ?>
		<th class="<?php echo $billing_voucher_delete->Gender->headerCellClass() ?>"><span id="elh_billing_voucher_Gender" class="billing_voucher_Gender"><?php echo $billing_voucher_delete->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->Mobile->Visible) { // Mobile ?>
		<th class="<?php echo $billing_voucher_delete->Mobile->headerCellClass() ?>"><span id="elh_billing_voucher_Mobile" class="billing_voucher_Mobile"><?php echo $billing_voucher_delete->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->Doctor->Visible) { // Doctor ?>
		<th class="<?php echo $billing_voucher_delete->Doctor->headerCellClass() ?>"><span id="elh_billing_voucher_Doctor" class="billing_voucher_Doctor"><?php echo $billing_voucher_delete->Doctor->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->ModeofPayment->Visible) { // ModeofPayment ?>
		<th class="<?php echo $billing_voucher_delete->ModeofPayment->headerCellClass() ?>"><span id="elh_billing_voucher_ModeofPayment" class="billing_voucher_ModeofPayment"><?php echo $billing_voucher_delete->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->Amount->Visible) { // Amount ?>
		<th class="<?php echo $billing_voucher_delete->Amount->headerCellClass() ?>"><span id="elh_billing_voucher_Amount" class="billing_voucher_Amount"><?php echo $billing_voucher_delete->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->AnyDues->Visible) { // AnyDues ?>
		<th class="<?php echo $billing_voucher_delete->AnyDues->headerCellClass() ?>"><span id="elh_billing_voucher_AnyDues" class="billing_voucher_AnyDues"><?php echo $billing_voucher_delete->AnyDues->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $billing_voucher_delete->createdby->headerCellClass() ?>"><span id="elh_billing_voucher_createdby" class="billing_voucher_createdby"><?php echo $billing_voucher_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $billing_voucher_delete->createddatetime->headerCellClass() ?>"><span id="elh_billing_voucher_createddatetime" class="billing_voucher_createddatetime"><?php echo $billing_voucher_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $billing_voucher_delete->modifiedby->headerCellClass() ?>"><span id="elh_billing_voucher_modifiedby" class="billing_voucher_modifiedby"><?php echo $billing_voucher_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $billing_voucher_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_billing_voucher_modifieddatetime" class="billing_voucher_modifieddatetime"><?php echo $billing_voucher_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $billing_voucher_delete->HospID->headerCellClass() ?>"><span id="elh_billing_voucher_HospID" class="billing_voucher_HospID"><?php echo $billing_voucher_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->RIDNO->Visible) { // RIDNO ?>
		<th class="<?php echo $billing_voucher_delete->RIDNO->headerCellClass() ?>"><span id="elh_billing_voucher_RIDNO" class="billing_voucher_RIDNO"><?php echo $billing_voucher_delete->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $billing_voucher_delete->TidNo->headerCellClass() ?>"><span id="elh_billing_voucher_TidNo" class="billing_voucher_TidNo"><?php echo $billing_voucher_delete->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->CId->Visible) { // CId ?>
		<th class="<?php echo $billing_voucher_delete->CId->headerCellClass() ?>"><span id="elh_billing_voucher_CId" class="billing_voucher_CId"><?php echo $billing_voucher_delete->CId->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $billing_voucher_delete->PartnerName->headerCellClass() ?>"><span id="elh_billing_voucher_PartnerName" class="billing_voucher_PartnerName"><?php echo $billing_voucher_delete->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->PayerType->Visible) { // PayerType ?>
		<th class="<?php echo $billing_voucher_delete->PayerType->headerCellClass() ?>"><span id="elh_billing_voucher_PayerType" class="billing_voucher_PayerType"><?php echo $billing_voucher_delete->PayerType->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->Dob->Visible) { // Dob ?>
		<th class="<?php echo $billing_voucher_delete->Dob->headerCellClass() ?>"><span id="elh_billing_voucher_Dob" class="billing_voucher_Dob"><?php echo $billing_voucher_delete->Dob->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->DrDepartment->Visible) { // DrDepartment ?>
		<th class="<?php echo $billing_voucher_delete->DrDepartment->headerCellClass() ?>"><span id="elh_billing_voucher_DrDepartment" class="billing_voucher_DrDepartment"><?php echo $billing_voucher_delete->DrDepartment->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->RefferedBy->Visible) { // RefferedBy ?>
		<th class="<?php echo $billing_voucher_delete->RefferedBy->headerCellClass() ?>"><span id="elh_billing_voucher_RefferedBy" class="billing_voucher_RefferedBy"><?php echo $billing_voucher_delete->RefferedBy->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->CardNumber->Visible) { // CardNumber ?>
		<th class="<?php echo $billing_voucher_delete->CardNumber->headerCellClass() ?>"><span id="elh_billing_voucher_CardNumber" class="billing_voucher_CardNumber"><?php echo $billing_voucher_delete->CardNumber->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->BankName->Visible) { // BankName ?>
		<th class="<?php echo $billing_voucher_delete->BankName->headerCellClass() ?>"><span id="elh_billing_voucher_BankName" class="billing_voucher_BankName"><?php echo $billing_voucher_delete->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->UserName->Visible) { // UserName ?>
		<th class="<?php echo $billing_voucher_delete->UserName->headerCellClass() ?>"><span id="elh_billing_voucher_UserName" class="billing_voucher_UserName"><?php echo $billing_voucher_delete->UserName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
		<th class="<?php echo $billing_voucher_delete->AdjustmentAdvance->headerCellClass() ?>"><span id="elh_billing_voucher_AdjustmentAdvance" class="billing_voucher_AdjustmentAdvance"><?php echo $billing_voucher_delete->AdjustmentAdvance->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->billing_vouchercol->Visible) { // billing_vouchercol ?>
		<th class="<?php echo $billing_voucher_delete->billing_vouchercol->headerCellClass() ?>"><span id="elh_billing_voucher_billing_vouchercol" class="billing_voucher_billing_vouchercol"><?php echo $billing_voucher_delete->billing_vouchercol->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->BillType->Visible) { // BillType ?>
		<th class="<?php echo $billing_voucher_delete->BillType->headerCellClass() ?>"><span id="elh_billing_voucher_BillType" class="billing_voucher_BillType"><?php echo $billing_voucher_delete->BillType->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->ProcedureName->Visible) { // ProcedureName ?>
		<th class="<?php echo $billing_voucher_delete->ProcedureName->headerCellClass() ?>"><span id="elh_billing_voucher_ProcedureName" class="billing_voucher_ProcedureName"><?php echo $billing_voucher_delete->ProcedureName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->ProcedureAmount->Visible) { // ProcedureAmount ?>
		<th class="<?php echo $billing_voucher_delete->ProcedureAmount->headerCellClass() ?>"><span id="elh_billing_voucher_ProcedureAmount" class="billing_voucher_ProcedureAmount"><?php echo $billing_voucher_delete->ProcedureAmount->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->IncludePackage->Visible) { // IncludePackage ?>
		<th class="<?php echo $billing_voucher_delete->IncludePackage->headerCellClass() ?>"><span id="elh_billing_voucher_IncludePackage" class="billing_voucher_IncludePackage"><?php echo $billing_voucher_delete->IncludePackage->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->CancelBill->Visible) { // CancelBill ?>
		<th class="<?php echo $billing_voucher_delete->CancelBill->headerCellClass() ?>"><span id="elh_billing_voucher_CancelBill" class="billing_voucher_CancelBill"><?php echo $billing_voucher_delete->CancelBill->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->CancelReason->Visible) { // CancelReason ?>
		<th class="<?php echo $billing_voucher_delete->CancelReason->headerCellClass() ?>"><span id="elh_billing_voucher_CancelReason" class="billing_voucher_CancelReason"><?php echo $billing_voucher_delete->CancelReason->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
		<th class="<?php echo $billing_voucher_delete->CancelModeOfPayment->headerCellClass() ?>"><span id="elh_billing_voucher_CancelModeOfPayment" class="billing_voucher_CancelModeOfPayment"><?php echo $billing_voucher_delete->CancelModeOfPayment->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->CancelAmount->Visible) { // CancelAmount ?>
		<th class="<?php echo $billing_voucher_delete->CancelAmount->headerCellClass() ?>"><span id="elh_billing_voucher_CancelAmount" class="billing_voucher_CancelAmount"><?php echo $billing_voucher_delete->CancelAmount->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->CancelBankName->Visible) { // CancelBankName ?>
		<th class="<?php echo $billing_voucher_delete->CancelBankName->headerCellClass() ?>"><span id="elh_billing_voucher_CancelBankName" class="billing_voucher_CancelBankName"><?php echo $billing_voucher_delete->CancelBankName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
		<th class="<?php echo $billing_voucher_delete->CancelTransactionNumber->headerCellClass() ?>"><span id="elh_billing_voucher_CancelTransactionNumber" class="billing_voucher_CancelTransactionNumber"><?php echo $billing_voucher_delete->CancelTransactionNumber->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->LabTest->Visible) { // LabTest ?>
		<th class="<?php echo $billing_voucher_delete->LabTest->headerCellClass() ?>"><span id="elh_billing_voucher_LabTest" class="billing_voucher_LabTest"><?php echo $billing_voucher_delete->LabTest->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->sid->Visible) { // sid ?>
		<th class="<?php echo $billing_voucher_delete->sid->headerCellClass() ?>"><span id="elh_billing_voucher_sid" class="billing_voucher_sid"><?php echo $billing_voucher_delete->sid->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->SidNo->Visible) { // SidNo ?>
		<th class="<?php echo $billing_voucher_delete->SidNo->headerCellClass() ?>"><span id="elh_billing_voucher_SidNo" class="billing_voucher_SidNo"><?php echo $billing_voucher_delete->SidNo->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->createdDatettime->Visible) { // createdDatettime ?>
		<th class="<?php echo $billing_voucher_delete->createdDatettime->headerCellClass() ?>"><span id="elh_billing_voucher_createdDatettime" class="billing_voucher_createdDatettime"><?php echo $billing_voucher_delete->createdDatettime->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->LabTestReleased->Visible) { // LabTestReleased ?>
		<th class="<?php echo $billing_voucher_delete->LabTestReleased->headerCellClass() ?>"><span id="elh_billing_voucher_LabTestReleased" class="billing_voucher_LabTestReleased"><?php echo $billing_voucher_delete->LabTestReleased->caption() ?></span></th>
<?php } ?>
<?php if ($billing_voucher_delete->GoogleReviewID->Visible) { // GoogleReviewID ?>
		<th class="<?php echo $billing_voucher_delete->GoogleReviewID->headerCellClass() ?>"><span id="elh_billing_voucher_GoogleReviewID" class="billing_voucher_GoogleReviewID"><?php echo $billing_voucher_delete->GoogleReviewID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$billing_voucher_delete->RecordCount = 0;
$i = 0;
while (!$billing_voucher_delete->Recordset->EOF) {
	$billing_voucher_delete->RecordCount++;
	$billing_voucher_delete->RowCount++;

	// Set row properties
	$billing_voucher->resetAttributes();
	$billing_voucher->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$billing_voucher_delete->loadRowValues($billing_voucher_delete->Recordset);

	// Render row
	$billing_voucher_delete->renderRow();
?>
	<tr <?php echo $billing_voucher->rowAttributes() ?>>
<?php if ($billing_voucher_delete->id->Visible) { // id ?>
		<td <?php echo $billing_voucher_delete->id->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_id" class="billing_voucher_id">
<span<?php echo $billing_voucher_delete->id->viewAttributes() ?>><?php echo $billing_voucher_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->PatId->Visible) { // PatId ?>
		<td <?php echo $billing_voucher_delete->PatId->cellAttributes() ?>>
<script id="orig<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_PatId" class="billing_voucheredit" type="text/html">
<?php echo $billing_voucher_delete->PatId->getViewValue() ?>
</script>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_PatId" class="billing_voucher_PatId">
<span<?php echo $billing_voucher_delete->PatId->viewAttributes() ?>><?php echo Barcode()->show($billing_voucher_delete->PatId->CurrentValue, 'QRCODE', 60) ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->BillNumber->Visible) { // BillNumber ?>
		<td <?php echo $billing_voucher_delete->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_BillNumber" class="billing_voucher_BillNumber">
<span<?php echo $billing_voucher_delete->BillNumber->viewAttributes() ?>><?php echo $billing_voucher_delete->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->PatientId->Visible) { // PatientId ?>
		<td <?php echo $billing_voucher_delete->PatientId->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_PatientId" class="billing_voucher_PatientId">
<span><?php echo GetImageViewTag($billing_voucher_delete->PatientId, $billing_voucher_delete->PatientId->getViewValue()) ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $billing_voucher_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_PatientName" class="billing_voucher_PatientName">
<span<?php echo $billing_voucher_delete->PatientName->viewAttributes() ?>><?php echo $billing_voucher_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->Gender->Visible) { // Gender ?>
		<td <?php echo $billing_voucher_delete->Gender->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_Gender" class="billing_voucher_Gender">
<span<?php echo $billing_voucher_delete->Gender->viewAttributes() ?>><?php echo $billing_voucher_delete->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->Mobile->Visible) { // Mobile ?>
		<td <?php echo $billing_voucher_delete->Mobile->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_Mobile" class="billing_voucher_Mobile">
<span<?php echo $billing_voucher_delete->Mobile->viewAttributes() ?>><?php echo $billing_voucher_delete->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->Doctor->Visible) { // Doctor ?>
		<td <?php echo $billing_voucher_delete->Doctor->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_Doctor" class="billing_voucher_Doctor">
<span<?php echo $billing_voucher_delete->Doctor->viewAttributes() ?>><?php echo $billing_voucher_delete->Doctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->ModeofPayment->Visible) { // ModeofPayment ?>
		<td <?php echo $billing_voucher_delete->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_ModeofPayment" class="billing_voucher_ModeofPayment">
<span<?php echo $billing_voucher_delete->ModeofPayment->viewAttributes() ?>><?php echo $billing_voucher_delete->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->Amount->Visible) { // Amount ?>
		<td <?php echo $billing_voucher_delete->Amount->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_Amount" class="billing_voucher_Amount">
<span<?php echo $billing_voucher_delete->Amount->viewAttributes() ?>><?php echo $billing_voucher_delete->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->AnyDues->Visible) { // AnyDues ?>
		<td <?php echo $billing_voucher_delete->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_AnyDues" class="billing_voucher_AnyDues">
<span<?php echo $billing_voucher_delete->AnyDues->viewAttributes() ?>><?php echo $billing_voucher_delete->AnyDues->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $billing_voucher_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_createdby" class="billing_voucher_createdby">
<span<?php echo $billing_voucher_delete->createdby->viewAttributes() ?>><?php echo $billing_voucher_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $billing_voucher_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_createddatetime" class="billing_voucher_createddatetime">
<span<?php echo $billing_voucher_delete->createddatetime->viewAttributes() ?>><?php echo $billing_voucher_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $billing_voucher_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_modifiedby" class="billing_voucher_modifiedby">
<span<?php echo $billing_voucher_delete->modifiedby->viewAttributes() ?>><?php echo $billing_voucher_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $billing_voucher_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_modifieddatetime" class="billing_voucher_modifieddatetime">
<span<?php echo $billing_voucher_delete->modifieddatetime->viewAttributes() ?>><?php echo $billing_voucher_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $billing_voucher_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_HospID" class="billing_voucher_HospID">
<span<?php echo $billing_voucher_delete->HospID->viewAttributes() ?>><?php echo $billing_voucher_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->RIDNO->Visible) { // RIDNO ?>
		<td <?php echo $billing_voucher_delete->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_RIDNO" class="billing_voucher_RIDNO">
<span<?php echo $billing_voucher_delete->RIDNO->viewAttributes() ?>><?php echo $billing_voucher_delete->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->TidNo->Visible) { // TidNo ?>
		<td <?php echo $billing_voucher_delete->TidNo->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_TidNo" class="billing_voucher_TidNo">
<span<?php echo $billing_voucher_delete->TidNo->viewAttributes() ?>><?php echo $billing_voucher_delete->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->CId->Visible) { // CId ?>
		<td <?php echo $billing_voucher_delete->CId->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_CId" class="billing_voucher_CId">
<span<?php echo $billing_voucher_delete->CId->viewAttributes() ?>><?php echo $billing_voucher_delete->CId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->PartnerName->Visible) { // PartnerName ?>
		<td <?php echo $billing_voucher_delete->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_PartnerName" class="billing_voucher_PartnerName">
<span<?php echo $billing_voucher_delete->PartnerName->viewAttributes() ?>><?php echo $billing_voucher_delete->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->PayerType->Visible) { // PayerType ?>
		<td <?php echo $billing_voucher_delete->PayerType->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_PayerType" class="billing_voucher_PayerType">
<span<?php echo $billing_voucher_delete->PayerType->viewAttributes() ?>><?php echo $billing_voucher_delete->PayerType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->Dob->Visible) { // Dob ?>
		<td <?php echo $billing_voucher_delete->Dob->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_Dob" class="billing_voucher_Dob">
<span<?php echo $billing_voucher_delete->Dob->viewAttributes() ?>><?php echo $billing_voucher_delete->Dob->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->DrDepartment->Visible) { // DrDepartment ?>
		<td <?php echo $billing_voucher_delete->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_DrDepartment" class="billing_voucher_DrDepartment">
<span<?php echo $billing_voucher_delete->DrDepartment->viewAttributes() ?>><?php echo $billing_voucher_delete->DrDepartment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->RefferedBy->Visible) { // RefferedBy ?>
		<td <?php echo $billing_voucher_delete->RefferedBy->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_RefferedBy" class="billing_voucher_RefferedBy">
<span<?php echo $billing_voucher_delete->RefferedBy->viewAttributes() ?>><?php echo $billing_voucher_delete->RefferedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->CardNumber->Visible) { // CardNumber ?>
		<td <?php echo $billing_voucher_delete->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_CardNumber" class="billing_voucher_CardNumber">
<span<?php echo $billing_voucher_delete->CardNumber->viewAttributes() ?>><?php echo $billing_voucher_delete->CardNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->BankName->Visible) { // BankName ?>
		<td <?php echo $billing_voucher_delete->BankName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_BankName" class="billing_voucher_BankName">
<span<?php echo $billing_voucher_delete->BankName->viewAttributes() ?>><?php echo $billing_voucher_delete->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->UserName->Visible) { // UserName ?>
		<td <?php echo $billing_voucher_delete->UserName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_UserName" class="billing_voucher_UserName">
<span<?php echo $billing_voucher_delete->UserName->viewAttributes() ?>><?php echo $billing_voucher_delete->UserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->AdjustmentAdvance->Visible) { // AdjustmentAdvance ?>
		<td <?php echo $billing_voucher_delete->AdjustmentAdvance->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_AdjustmentAdvance" class="billing_voucher_AdjustmentAdvance">
<span<?php echo $billing_voucher_delete->AdjustmentAdvance->viewAttributes() ?>><?php echo $billing_voucher_delete->AdjustmentAdvance->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->billing_vouchercol->Visible) { // billing_vouchercol ?>
		<td <?php echo $billing_voucher_delete->billing_vouchercol->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_billing_vouchercol" class="billing_voucher_billing_vouchercol">
<span<?php echo $billing_voucher_delete->billing_vouchercol->viewAttributes() ?>><?php echo $billing_voucher_delete->billing_vouchercol->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->BillType->Visible) { // BillType ?>
		<td <?php echo $billing_voucher_delete->BillType->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_BillType" class="billing_voucher_BillType">
<span<?php echo $billing_voucher_delete->BillType->viewAttributes() ?>><?php echo $billing_voucher_delete->BillType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->ProcedureName->Visible) { // ProcedureName ?>
		<td <?php echo $billing_voucher_delete->ProcedureName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_ProcedureName" class="billing_voucher_ProcedureName">
<span<?php echo $billing_voucher_delete->ProcedureName->viewAttributes() ?>><?php echo $billing_voucher_delete->ProcedureName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->ProcedureAmount->Visible) { // ProcedureAmount ?>
		<td <?php echo $billing_voucher_delete->ProcedureAmount->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_ProcedureAmount" class="billing_voucher_ProcedureAmount">
<span<?php echo $billing_voucher_delete->ProcedureAmount->viewAttributes() ?>><?php echo $billing_voucher_delete->ProcedureAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->IncludePackage->Visible) { // IncludePackage ?>
		<td <?php echo $billing_voucher_delete->IncludePackage->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_IncludePackage" class="billing_voucher_IncludePackage">
<span<?php echo $billing_voucher_delete->IncludePackage->viewAttributes() ?>><?php echo $billing_voucher_delete->IncludePackage->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->CancelBill->Visible) { // CancelBill ?>
		<td <?php echo $billing_voucher_delete->CancelBill->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_CancelBill" class="billing_voucher_CancelBill">
<span<?php echo $billing_voucher_delete->CancelBill->viewAttributes() ?>><?php echo $billing_voucher_delete->CancelBill->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->CancelReason->Visible) { // CancelReason ?>
		<td <?php echo $billing_voucher_delete->CancelReason->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_CancelReason" class="billing_voucher_CancelReason">
<span<?php echo $billing_voucher_delete->CancelReason->viewAttributes() ?>><?php echo $billing_voucher_delete->CancelReason->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
		<td <?php echo $billing_voucher_delete->CancelModeOfPayment->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_CancelModeOfPayment" class="billing_voucher_CancelModeOfPayment">
<span<?php echo $billing_voucher_delete->CancelModeOfPayment->viewAttributes() ?>><?php echo $billing_voucher_delete->CancelModeOfPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->CancelAmount->Visible) { // CancelAmount ?>
		<td <?php echo $billing_voucher_delete->CancelAmount->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_CancelAmount" class="billing_voucher_CancelAmount">
<span<?php echo $billing_voucher_delete->CancelAmount->viewAttributes() ?>><?php echo $billing_voucher_delete->CancelAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->CancelBankName->Visible) { // CancelBankName ?>
		<td <?php echo $billing_voucher_delete->CancelBankName->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_CancelBankName" class="billing_voucher_CancelBankName">
<span<?php echo $billing_voucher_delete->CancelBankName->viewAttributes() ?>><?php echo $billing_voucher_delete->CancelBankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
		<td <?php echo $billing_voucher_delete->CancelTransactionNumber->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_CancelTransactionNumber" class="billing_voucher_CancelTransactionNumber">
<span<?php echo $billing_voucher_delete->CancelTransactionNumber->viewAttributes() ?>><?php echo $billing_voucher_delete->CancelTransactionNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->LabTest->Visible) { // LabTest ?>
		<td <?php echo $billing_voucher_delete->LabTest->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_LabTest" class="billing_voucher_LabTest">
<span<?php echo $billing_voucher_delete->LabTest->viewAttributes() ?>><?php echo $billing_voucher_delete->LabTest->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->sid->Visible) { // sid ?>
		<td <?php echo $billing_voucher_delete->sid->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_sid" class="billing_voucher_sid">
<span<?php echo $billing_voucher_delete->sid->viewAttributes() ?>><?php echo $billing_voucher_delete->sid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->SidNo->Visible) { // SidNo ?>
		<td <?php echo $billing_voucher_delete->SidNo->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_SidNo" class="billing_voucher_SidNo">
<span<?php echo $billing_voucher_delete->SidNo->viewAttributes() ?>><?php echo $billing_voucher_delete->SidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->createdDatettime->Visible) { // createdDatettime ?>
		<td <?php echo $billing_voucher_delete->createdDatettime->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_createdDatettime" class="billing_voucher_createdDatettime">
<span<?php echo $billing_voucher_delete->createdDatettime->viewAttributes() ?>><?php echo $billing_voucher_delete->createdDatettime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->LabTestReleased->Visible) { // LabTestReleased ?>
		<td <?php echo $billing_voucher_delete->LabTestReleased->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_LabTestReleased" class="billing_voucher_LabTestReleased">
<span<?php echo $billing_voucher_delete->LabTestReleased->viewAttributes() ?>><?php echo $billing_voucher_delete->LabTestReleased->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_voucher_delete->GoogleReviewID->Visible) { // GoogleReviewID ?>
		<td <?php echo $billing_voucher_delete->GoogleReviewID->cellAttributes() ?>>
<span id="el<?php echo $billing_voucher_delete->RowCount ?>_billing_voucher_GoogleReviewID" class="billing_voucher_GoogleReviewID">
<span<?php echo $billing_voucher_delete->GoogleReviewID->viewAttributes() ?>><?php echo $billing_voucher_delete->GoogleReviewID->getViewValue() ?></span>
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
$billing_voucher_delete->terminate();
?>
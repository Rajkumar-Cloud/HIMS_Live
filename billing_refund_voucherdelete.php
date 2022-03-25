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
$billing_refund_voucher_delete = new billing_refund_voucher_delete();

// Run the page
$billing_refund_voucher_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_refund_voucher_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fbilling_refund_voucherdelete = currentForm = new ew.Form("fbilling_refund_voucherdelete", "delete");

// Form_CustomValidate event
fbilling_refund_voucherdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbilling_refund_voucherdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fbilling_refund_voucherdelete.lists["x_ModeofPayment"] = <?php echo $billing_refund_voucher_delete->ModeofPayment->Lookup->toClientList() ?>;
fbilling_refund_voucherdelete.lists["x_ModeofPayment"].options = <?php echo JsonEncode($billing_refund_voucher_delete->ModeofPayment->lookupOptions()) ?>;
fbilling_refund_voucherdelete.lists["x_Reception"] = <?php echo $billing_refund_voucher_delete->Reception->Lookup->toClientList() ?>;
fbilling_refund_voucherdelete.lists["x_Reception"].options = <?php echo JsonEncode($billing_refund_voucher_delete->Reception->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $billing_refund_voucher_delete->showPageHeader(); ?>
<?php
$billing_refund_voucher_delete->showMessage();
?>
<form name="fbilling_refund_voucherdelete" id="fbilling_refund_voucherdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($billing_refund_voucher_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $billing_refund_voucher_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_refund_voucher">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($billing_refund_voucher_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($billing_refund_voucher->id->Visible) { // id ?>
		<th class="<?php echo $billing_refund_voucher->id->headerCellClass() ?>"><span id="elh_billing_refund_voucher_id" class="billing_refund_voucher_id"><?php echo $billing_refund_voucher->id->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->Name->Visible) { // Name ?>
		<th class="<?php echo $billing_refund_voucher->Name->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Name" class="billing_refund_voucher_Name"><?php echo $billing_refund_voucher->Name->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->Mobile->Visible) { // Mobile ?>
		<th class="<?php echo $billing_refund_voucher->Mobile->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Mobile" class="billing_refund_voucher_Mobile"><?php echo $billing_refund_voucher->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->voucher_type->Visible) { // voucher_type ?>
		<th class="<?php echo $billing_refund_voucher->voucher_type->headerCellClass() ?>"><span id="elh_billing_refund_voucher_voucher_type" class="billing_refund_voucher_voucher_type"><?php echo $billing_refund_voucher->voucher_type->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->Details->Visible) { // Details ?>
		<th class="<?php echo $billing_refund_voucher->Details->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Details" class="billing_refund_voucher_Details"><?php echo $billing_refund_voucher->Details->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<th class="<?php echo $billing_refund_voucher->ModeofPayment->headerCellClass() ?>"><span id="elh_billing_refund_voucher_ModeofPayment" class="billing_refund_voucher_ModeofPayment"><?php echo $billing_refund_voucher->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->Amount->Visible) { // Amount ?>
		<th class="<?php echo $billing_refund_voucher->Amount->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Amount" class="billing_refund_voucher_Amount"><?php echo $billing_refund_voucher->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->AnyDues->Visible) { // AnyDues ?>
		<th class="<?php echo $billing_refund_voucher->AnyDues->headerCellClass() ?>"><span id="elh_billing_refund_voucher_AnyDues" class="billing_refund_voucher_AnyDues"><?php echo $billing_refund_voucher->AnyDues->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->createdby->Visible) { // createdby ?>
		<th class="<?php echo $billing_refund_voucher->createdby->headerCellClass() ?>"><span id="elh_billing_refund_voucher_createdby" class="billing_refund_voucher_createdby"><?php echo $billing_refund_voucher->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $billing_refund_voucher->createddatetime->headerCellClass() ?>"><span id="elh_billing_refund_voucher_createddatetime" class="billing_refund_voucher_createddatetime"><?php echo $billing_refund_voucher->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $billing_refund_voucher->modifiedby->headerCellClass() ?>"><span id="elh_billing_refund_voucher_modifiedby" class="billing_refund_voucher_modifiedby"><?php echo $billing_refund_voucher->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $billing_refund_voucher->modifieddatetime->headerCellClass() ?>"><span id="elh_billing_refund_voucher_modifieddatetime" class="billing_refund_voucher_modifieddatetime"><?php echo $billing_refund_voucher->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->PatID->Visible) { // PatID ?>
		<th class="<?php echo $billing_refund_voucher->PatID->headerCellClass() ?>"><span id="elh_billing_refund_voucher_PatID" class="billing_refund_voucher_PatID"><?php echo $billing_refund_voucher->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $billing_refund_voucher->PatientID->headerCellClass() ?>"><span id="elh_billing_refund_voucher_PatientID" class="billing_refund_voucher_PatientID"><?php echo $billing_refund_voucher->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $billing_refund_voucher->PatientName->headerCellClass() ?>"><span id="elh_billing_refund_voucher_PatientName" class="billing_refund_voucher_PatientName"><?php echo $billing_refund_voucher->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->VisiteType->Visible) { // VisiteType ?>
		<th class="<?php echo $billing_refund_voucher->VisiteType->headerCellClass() ?>"><span id="elh_billing_refund_voucher_VisiteType" class="billing_refund_voucher_VisiteType"><?php echo $billing_refund_voucher->VisiteType->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->VisitDate->Visible) { // VisitDate ?>
		<th class="<?php echo $billing_refund_voucher->VisitDate->headerCellClass() ?>"><span id="elh_billing_refund_voucher_VisitDate" class="billing_refund_voucher_VisitDate"><?php echo $billing_refund_voucher->VisitDate->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->AdvanceNo->Visible) { // AdvanceNo ?>
		<th class="<?php echo $billing_refund_voucher->AdvanceNo->headerCellClass() ?>"><span id="elh_billing_refund_voucher_AdvanceNo" class="billing_refund_voucher_AdvanceNo"><?php echo $billing_refund_voucher->AdvanceNo->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->Status->Visible) { // Status ?>
		<th class="<?php echo $billing_refund_voucher->Status->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Status" class="billing_refund_voucher_Status"><?php echo $billing_refund_voucher->Status->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->Date->Visible) { // Date ?>
		<th class="<?php echo $billing_refund_voucher->Date->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Date" class="billing_refund_voucher_Date"><?php echo $billing_refund_voucher->Date->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
		<th class="<?php echo $billing_refund_voucher->AdvanceValidityDate->headerCellClass() ?>"><span id="elh_billing_refund_voucher_AdvanceValidityDate" class="billing_refund_voucher_AdvanceValidityDate"><?php echo $billing_refund_voucher->AdvanceValidityDate->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
		<th class="<?php echo $billing_refund_voucher->TotalRemainingAdvance->headerCellClass() ?>"><span id="elh_billing_refund_voucher_TotalRemainingAdvance" class="billing_refund_voucher_TotalRemainingAdvance"><?php echo $billing_refund_voucher->TotalRemainingAdvance->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->Remarks->Visible) { // Remarks ?>
		<th class="<?php echo $billing_refund_voucher->Remarks->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Remarks" class="billing_refund_voucher_Remarks"><?php echo $billing_refund_voucher->Remarks->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<th class="<?php echo $billing_refund_voucher->SeectPaymentMode->headerCellClass() ?>"><span id="elh_billing_refund_voucher_SeectPaymentMode" class="billing_refund_voucher_SeectPaymentMode"><?php echo $billing_refund_voucher->SeectPaymentMode->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->PaidAmount->Visible) { // PaidAmount ?>
		<th class="<?php echo $billing_refund_voucher->PaidAmount->headerCellClass() ?>"><span id="elh_billing_refund_voucher_PaidAmount" class="billing_refund_voucher_PaidAmount"><?php echo $billing_refund_voucher->PaidAmount->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->Currency->Visible) { // Currency ?>
		<th class="<?php echo $billing_refund_voucher->Currency->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Currency" class="billing_refund_voucher_Currency"><?php echo $billing_refund_voucher->Currency->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->CardNumber->Visible) { // CardNumber ?>
		<th class="<?php echo $billing_refund_voucher->CardNumber->headerCellClass() ?>"><span id="elh_billing_refund_voucher_CardNumber" class="billing_refund_voucher_CardNumber"><?php echo $billing_refund_voucher->CardNumber->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->BankName->Visible) { // BankName ?>
		<th class="<?php echo $billing_refund_voucher->BankName->headerCellClass() ?>"><span id="elh_billing_refund_voucher_BankName" class="billing_refund_voucher_BankName"><?php echo $billing_refund_voucher->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->HospID->Visible) { // HospID ?>
		<th class="<?php echo $billing_refund_voucher->HospID->headerCellClass() ?>"><span id="elh_billing_refund_voucher_HospID" class="billing_refund_voucher_HospID"><?php echo $billing_refund_voucher->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->Reception->Visible) { // Reception ?>
		<th class="<?php echo $billing_refund_voucher->Reception->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Reception" class="billing_refund_voucher_Reception"><?php echo $billing_refund_voucher->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $billing_refund_voucher->mrnno->headerCellClass() ?>"><span id="elh_billing_refund_voucher_mrnno" class="billing_refund_voucher_mrnno"><?php echo $billing_refund_voucher->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher->GetUserName->Visible) { // GetUserName ?>
		<th class="<?php echo $billing_refund_voucher->GetUserName->headerCellClass() ?>"><span id="elh_billing_refund_voucher_GetUserName" class="billing_refund_voucher_GetUserName"><?php echo $billing_refund_voucher->GetUserName->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$billing_refund_voucher_delete->RecCnt = 0;
$i = 0;
while (!$billing_refund_voucher_delete->Recordset->EOF) {
	$billing_refund_voucher_delete->RecCnt++;
	$billing_refund_voucher_delete->RowCnt++;

	// Set row properties
	$billing_refund_voucher->resetAttributes();
	$billing_refund_voucher->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$billing_refund_voucher_delete->loadRowValues($billing_refund_voucher_delete->Recordset);

	// Render row
	$billing_refund_voucher_delete->renderRow();
?>
	<tr<?php echo $billing_refund_voucher->rowAttributes() ?>>
<?php if ($billing_refund_voucher->id->Visible) { // id ?>
		<td<?php echo $billing_refund_voucher->id->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_id" class="billing_refund_voucher_id">
<span<?php echo $billing_refund_voucher->id->viewAttributes() ?>>
<?php echo $billing_refund_voucher->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->Name->Visible) { // Name ?>
		<td<?php echo $billing_refund_voucher->Name->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_Name" class="billing_refund_voucher_Name">
<span<?php echo $billing_refund_voucher->Name->viewAttributes() ?>>
<?php echo $billing_refund_voucher->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->Mobile->Visible) { // Mobile ?>
		<td<?php echo $billing_refund_voucher->Mobile->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_Mobile" class="billing_refund_voucher_Mobile">
<span<?php echo $billing_refund_voucher->Mobile->viewAttributes() ?>>
<?php echo $billing_refund_voucher->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->voucher_type->Visible) { // voucher_type ?>
		<td<?php echo $billing_refund_voucher->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_voucher_type" class="billing_refund_voucher_voucher_type">
<span<?php echo $billing_refund_voucher->voucher_type->viewAttributes() ?>>
<?php echo $billing_refund_voucher->voucher_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->Details->Visible) { // Details ?>
		<td<?php echo $billing_refund_voucher->Details->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_Details" class="billing_refund_voucher_Details">
<span<?php echo $billing_refund_voucher->Details->viewAttributes() ?>>
<?php echo $billing_refund_voucher->Details->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<td<?php echo $billing_refund_voucher->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_ModeofPayment" class="billing_refund_voucher_ModeofPayment">
<span<?php echo $billing_refund_voucher->ModeofPayment->viewAttributes() ?>>
<?php echo $billing_refund_voucher->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->Amount->Visible) { // Amount ?>
		<td<?php echo $billing_refund_voucher->Amount->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_Amount" class="billing_refund_voucher_Amount">
<span<?php echo $billing_refund_voucher->Amount->viewAttributes() ?>>
<?php echo $billing_refund_voucher->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->AnyDues->Visible) { // AnyDues ?>
		<td<?php echo $billing_refund_voucher->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_AnyDues" class="billing_refund_voucher_AnyDues">
<span<?php echo $billing_refund_voucher->AnyDues->viewAttributes() ?>>
<?php echo $billing_refund_voucher->AnyDues->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->createdby->Visible) { // createdby ?>
		<td<?php echo $billing_refund_voucher->createdby->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_createdby" class="billing_refund_voucher_createdby">
<span<?php echo $billing_refund_voucher->createdby->viewAttributes() ?>>
<?php echo $billing_refund_voucher->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $billing_refund_voucher->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_createddatetime" class="billing_refund_voucher_createddatetime">
<span<?php echo $billing_refund_voucher->createddatetime->viewAttributes() ?>>
<?php echo $billing_refund_voucher->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $billing_refund_voucher->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_modifiedby" class="billing_refund_voucher_modifiedby">
<span<?php echo $billing_refund_voucher->modifiedby->viewAttributes() ?>>
<?php echo $billing_refund_voucher->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $billing_refund_voucher->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_modifieddatetime" class="billing_refund_voucher_modifieddatetime">
<span<?php echo $billing_refund_voucher->modifieddatetime->viewAttributes() ?>>
<?php echo $billing_refund_voucher->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->PatID->Visible) { // PatID ?>
		<td<?php echo $billing_refund_voucher->PatID->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_PatID" class="billing_refund_voucher_PatID">
<span<?php echo $billing_refund_voucher->PatID->viewAttributes() ?>>
<?php echo $billing_refund_voucher->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->PatientID->Visible) { // PatientID ?>
		<td<?php echo $billing_refund_voucher->PatientID->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_PatientID" class="billing_refund_voucher_PatientID">
<span<?php echo $billing_refund_voucher->PatientID->viewAttributes() ?>>
<?php echo $billing_refund_voucher->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->PatientName->Visible) { // PatientName ?>
		<td<?php echo $billing_refund_voucher->PatientName->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_PatientName" class="billing_refund_voucher_PatientName">
<span<?php echo $billing_refund_voucher->PatientName->viewAttributes() ?>>
<?php echo $billing_refund_voucher->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->VisiteType->Visible) { // VisiteType ?>
		<td<?php echo $billing_refund_voucher->VisiteType->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_VisiteType" class="billing_refund_voucher_VisiteType">
<span<?php echo $billing_refund_voucher->VisiteType->viewAttributes() ?>>
<?php echo $billing_refund_voucher->VisiteType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->VisitDate->Visible) { // VisitDate ?>
		<td<?php echo $billing_refund_voucher->VisitDate->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_VisitDate" class="billing_refund_voucher_VisitDate">
<span<?php echo $billing_refund_voucher->VisitDate->viewAttributes() ?>>
<?php echo $billing_refund_voucher->VisitDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->AdvanceNo->Visible) { // AdvanceNo ?>
		<td<?php echo $billing_refund_voucher->AdvanceNo->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_AdvanceNo" class="billing_refund_voucher_AdvanceNo">
<span<?php echo $billing_refund_voucher->AdvanceNo->viewAttributes() ?>>
<?php echo $billing_refund_voucher->AdvanceNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->Status->Visible) { // Status ?>
		<td<?php echo $billing_refund_voucher->Status->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_Status" class="billing_refund_voucher_Status">
<span<?php echo $billing_refund_voucher->Status->viewAttributes() ?>>
<?php echo $billing_refund_voucher->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->Date->Visible) { // Date ?>
		<td<?php echo $billing_refund_voucher->Date->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_Date" class="billing_refund_voucher_Date">
<span<?php echo $billing_refund_voucher->Date->viewAttributes() ?>>
<?php echo $billing_refund_voucher->Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
		<td<?php echo $billing_refund_voucher->AdvanceValidityDate->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_AdvanceValidityDate" class="billing_refund_voucher_AdvanceValidityDate">
<span<?php echo $billing_refund_voucher->AdvanceValidityDate->viewAttributes() ?>>
<?php echo $billing_refund_voucher->AdvanceValidityDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
		<td<?php echo $billing_refund_voucher->TotalRemainingAdvance->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_TotalRemainingAdvance" class="billing_refund_voucher_TotalRemainingAdvance">
<span<?php echo $billing_refund_voucher->TotalRemainingAdvance->viewAttributes() ?>>
<?php echo $billing_refund_voucher->TotalRemainingAdvance->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->Remarks->Visible) { // Remarks ?>
		<td<?php echo $billing_refund_voucher->Remarks->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_Remarks" class="billing_refund_voucher_Remarks">
<span<?php echo $billing_refund_voucher->Remarks->viewAttributes() ?>>
<?php echo $billing_refund_voucher->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<td<?php echo $billing_refund_voucher->SeectPaymentMode->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_SeectPaymentMode" class="billing_refund_voucher_SeectPaymentMode">
<span<?php echo $billing_refund_voucher->SeectPaymentMode->viewAttributes() ?>>
<?php echo $billing_refund_voucher->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->PaidAmount->Visible) { // PaidAmount ?>
		<td<?php echo $billing_refund_voucher->PaidAmount->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_PaidAmount" class="billing_refund_voucher_PaidAmount">
<span<?php echo $billing_refund_voucher->PaidAmount->viewAttributes() ?>>
<?php echo $billing_refund_voucher->PaidAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->Currency->Visible) { // Currency ?>
		<td<?php echo $billing_refund_voucher->Currency->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_Currency" class="billing_refund_voucher_Currency">
<span<?php echo $billing_refund_voucher->Currency->viewAttributes() ?>>
<?php echo $billing_refund_voucher->Currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->CardNumber->Visible) { // CardNumber ?>
		<td<?php echo $billing_refund_voucher->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_CardNumber" class="billing_refund_voucher_CardNumber">
<span<?php echo $billing_refund_voucher->CardNumber->viewAttributes() ?>>
<?php echo $billing_refund_voucher->CardNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->BankName->Visible) { // BankName ?>
		<td<?php echo $billing_refund_voucher->BankName->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_BankName" class="billing_refund_voucher_BankName">
<span<?php echo $billing_refund_voucher->BankName->viewAttributes() ?>>
<?php echo $billing_refund_voucher->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->HospID->Visible) { // HospID ?>
		<td<?php echo $billing_refund_voucher->HospID->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_HospID" class="billing_refund_voucher_HospID">
<span<?php echo $billing_refund_voucher->HospID->viewAttributes() ?>>
<?php echo $billing_refund_voucher->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->Reception->Visible) { // Reception ?>
		<td<?php echo $billing_refund_voucher->Reception->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_Reception" class="billing_refund_voucher_Reception">
<span<?php echo $billing_refund_voucher->Reception->viewAttributes() ?>>
<?php echo $billing_refund_voucher->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->mrnno->Visible) { // mrnno ?>
		<td<?php echo $billing_refund_voucher->mrnno->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_mrnno" class="billing_refund_voucher_mrnno">
<span<?php echo $billing_refund_voucher->mrnno->viewAttributes() ?>>
<?php echo $billing_refund_voucher->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher->GetUserName->Visible) { // GetUserName ?>
		<td<?php echo $billing_refund_voucher->GetUserName->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCnt ?>_billing_refund_voucher_GetUserName" class="billing_refund_voucher_GetUserName">
<span<?php echo $billing_refund_voucher->GetUserName->viewAttributes() ?>>
<?php echo $billing_refund_voucher->GetUserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$billing_refund_voucher_delete->Recordset->moveNext();
}
$billing_refund_voucher_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $billing_refund_voucher_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$billing_refund_voucher_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$billing_refund_voucher_delete->terminate();
?>
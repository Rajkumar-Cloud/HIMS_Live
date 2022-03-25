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
$store_intent_issue_delete = new store_intent_issue_delete();

// Run the page
$store_intent_issue_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_intent_issue_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fstore_intent_issuedelete = currentForm = new ew.Form("fstore_intent_issuedelete", "delete");

// Form_CustomValidate event
fstore_intent_issuedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_intent_issuedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $store_intent_issue_delete->showPageHeader(); ?>
<?php
$store_intent_issue_delete->showMessage();
?>
<form name="fstore_intent_issuedelete" id="fstore_intent_issuedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_intent_issue_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_intent_issue_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_intent_issue">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($store_intent_issue_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($store_intent_issue->id->Visible) { // id ?>
		<th class="<?php echo $store_intent_issue->id->headerCellClass() ?>"><span id="elh_store_intent_issue_id" class="store_intent_issue_id"><?php echo $store_intent_issue->id->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->Reception->Visible) { // Reception ?>
		<th class="<?php echo $store_intent_issue->Reception->headerCellClass() ?>"><span id="elh_store_intent_issue_Reception" class="store_intent_issue_Reception"><?php echo $store_intent_issue->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $store_intent_issue->PatientId->headerCellClass() ?>"><span id="elh_store_intent_issue_PatientId" class="store_intent_issue_PatientId"><?php echo $store_intent_issue->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $store_intent_issue->mrnno->headerCellClass() ?>"><span id="elh_store_intent_issue_mrnno" class="store_intent_issue_mrnno"><?php echo $store_intent_issue->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $store_intent_issue->PatientName->headerCellClass() ?>"><span id="elh_store_intent_issue_PatientName" class="store_intent_issue_PatientName"><?php echo $store_intent_issue->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->Age->Visible) { // Age ?>
		<th class="<?php echo $store_intent_issue->Age->headerCellClass() ?>"><span id="elh_store_intent_issue_Age" class="store_intent_issue_Age"><?php echo $store_intent_issue->Age->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->Gender->Visible) { // Gender ?>
		<th class="<?php echo $store_intent_issue->Gender->headerCellClass() ?>"><span id="elh_store_intent_issue_Gender" class="store_intent_issue_Gender"><?php echo $store_intent_issue->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->Mobile->Visible) { // Mobile ?>
		<th class="<?php echo $store_intent_issue->Mobile->headerCellClass() ?>"><span id="elh_store_intent_issue_Mobile" class="store_intent_issue_Mobile"><?php echo $store_intent_issue->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->IP_OP->Visible) { // IP_OP ?>
		<th class="<?php echo $store_intent_issue->IP_OP->headerCellClass() ?>"><span id="elh_store_intent_issue_IP_OP" class="store_intent_issue_IP_OP"><?php echo $store_intent_issue->IP_OP->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->Doctor->Visible) { // Doctor ?>
		<th class="<?php echo $store_intent_issue->Doctor->headerCellClass() ?>"><span id="elh_store_intent_issue_Doctor" class="store_intent_issue_Doctor"><?php echo $store_intent_issue->Doctor->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->voucher_type->Visible) { // voucher_type ?>
		<th class="<?php echo $store_intent_issue->voucher_type->headerCellClass() ?>"><span id="elh_store_intent_issue_voucher_type" class="store_intent_issue_voucher_type"><?php echo $store_intent_issue->voucher_type->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->Details->Visible) { // Details ?>
		<th class="<?php echo $store_intent_issue->Details->headerCellClass() ?>"><span id="elh_store_intent_issue_Details" class="store_intent_issue_Details"><?php echo $store_intent_issue->Details->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->ModeofPayment->Visible) { // ModeofPayment ?>
		<th class="<?php echo $store_intent_issue->ModeofPayment->headerCellClass() ?>"><span id="elh_store_intent_issue_ModeofPayment" class="store_intent_issue_ModeofPayment"><?php echo $store_intent_issue->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->Amount->Visible) { // Amount ?>
		<th class="<?php echo $store_intent_issue->Amount->headerCellClass() ?>"><span id="elh_store_intent_issue_Amount" class="store_intent_issue_Amount"><?php echo $store_intent_issue->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->AnyDues->Visible) { // AnyDues ?>
		<th class="<?php echo $store_intent_issue->AnyDues->headerCellClass() ?>"><span id="elh_store_intent_issue_AnyDues" class="store_intent_issue_AnyDues"><?php echo $store_intent_issue->AnyDues->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->createdby->Visible) { // createdby ?>
		<th class="<?php echo $store_intent_issue->createdby->headerCellClass() ?>"><span id="elh_store_intent_issue_createdby" class="store_intent_issue_createdby"><?php echo $store_intent_issue->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $store_intent_issue->createddatetime->headerCellClass() ?>"><span id="elh_store_intent_issue_createddatetime" class="store_intent_issue_createddatetime"><?php echo $store_intent_issue->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $store_intent_issue->modifiedby->headerCellClass() ?>"><span id="elh_store_intent_issue_modifiedby" class="store_intent_issue_modifiedby"><?php echo $store_intent_issue->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $store_intent_issue->modifieddatetime->headerCellClass() ?>"><span id="elh_store_intent_issue_modifieddatetime" class="store_intent_issue_modifieddatetime"><?php echo $store_intent_issue->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->RealizationAmount->Visible) { // RealizationAmount ?>
		<th class="<?php echo $store_intent_issue->RealizationAmount->headerCellClass() ?>"><span id="elh_store_intent_issue_RealizationAmount" class="store_intent_issue_RealizationAmount"><?php echo $store_intent_issue->RealizationAmount->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->RealizationStatus->Visible) { // RealizationStatus ?>
		<th class="<?php echo $store_intent_issue->RealizationStatus->headerCellClass() ?>"><span id="elh_store_intent_issue_RealizationStatus" class="store_intent_issue_RealizationStatus"><?php echo $store_intent_issue->RealizationStatus->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<th class="<?php echo $store_intent_issue->RealizationRemarks->headerCellClass() ?>"><span id="elh_store_intent_issue_RealizationRemarks" class="store_intent_issue_RealizationRemarks"><?php echo $store_intent_issue->RealizationRemarks->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<th class="<?php echo $store_intent_issue->RealizationBatchNo->headerCellClass() ?>"><span id="elh_store_intent_issue_RealizationBatchNo" class="store_intent_issue_RealizationBatchNo"><?php echo $store_intent_issue->RealizationBatchNo->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->RealizationDate->Visible) { // RealizationDate ?>
		<th class="<?php echo $store_intent_issue->RealizationDate->headerCellClass() ?>"><span id="elh_store_intent_issue_RealizationDate" class="store_intent_issue_RealizationDate"><?php echo $store_intent_issue->RealizationDate->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->HospID->Visible) { // HospID ?>
		<th class="<?php echo $store_intent_issue->HospID->headerCellClass() ?>"><span id="elh_store_intent_issue_HospID" class="store_intent_issue_HospID"><?php echo $store_intent_issue->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->RIDNO->Visible) { // RIDNO ?>
		<th class="<?php echo $store_intent_issue->RIDNO->headerCellClass() ?>"><span id="elh_store_intent_issue_RIDNO" class="store_intent_issue_RIDNO"><?php echo $store_intent_issue->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $store_intent_issue->TidNo->headerCellClass() ?>"><span id="elh_store_intent_issue_TidNo" class="store_intent_issue_TidNo"><?php echo $store_intent_issue->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->CId->Visible) { // CId ?>
		<th class="<?php echo $store_intent_issue->CId->headerCellClass() ?>"><span id="elh_store_intent_issue_CId" class="store_intent_issue_CId"><?php echo $store_intent_issue->CId->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $store_intent_issue->PartnerName->headerCellClass() ?>"><span id="elh_store_intent_issue_PartnerName" class="store_intent_issue_PartnerName"><?php echo $store_intent_issue->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->PayerType->Visible) { // PayerType ?>
		<th class="<?php echo $store_intent_issue->PayerType->headerCellClass() ?>"><span id="elh_store_intent_issue_PayerType" class="store_intent_issue_PayerType"><?php echo $store_intent_issue->PayerType->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->Dob->Visible) { // Dob ?>
		<th class="<?php echo $store_intent_issue->Dob->headerCellClass() ?>"><span id="elh_store_intent_issue_Dob" class="store_intent_issue_Dob"><?php echo $store_intent_issue->Dob->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->Currency->Visible) { // Currency ?>
		<th class="<?php echo $store_intent_issue->Currency->headerCellClass() ?>"><span id="elh_store_intent_issue_Currency" class="store_intent_issue_Currency"><?php echo $store_intent_issue->Currency->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->DiscountRemarks->Visible) { // DiscountRemarks ?>
		<th class="<?php echo $store_intent_issue->DiscountRemarks->headerCellClass() ?>"><span id="elh_store_intent_issue_DiscountRemarks" class="store_intent_issue_DiscountRemarks"><?php echo $store_intent_issue->DiscountRemarks->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->Remarks->Visible) { // Remarks ?>
		<th class="<?php echo $store_intent_issue->Remarks->headerCellClass() ?>"><span id="elh_store_intent_issue_Remarks" class="store_intent_issue_Remarks"><?php echo $store_intent_issue->Remarks->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->PatId->Visible) { // PatId ?>
		<th class="<?php echo $store_intent_issue->PatId->headerCellClass() ?>"><span id="elh_store_intent_issue_PatId" class="store_intent_issue_PatId"><?php echo $store_intent_issue->PatId->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->DrDepartment->Visible) { // DrDepartment ?>
		<th class="<?php echo $store_intent_issue->DrDepartment->headerCellClass() ?>"><span id="elh_store_intent_issue_DrDepartment" class="store_intent_issue_DrDepartment"><?php echo $store_intent_issue->DrDepartment->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->RefferedBy->Visible) { // RefferedBy ?>
		<th class="<?php echo $store_intent_issue->RefferedBy->headerCellClass() ?>"><span id="elh_store_intent_issue_RefferedBy" class="store_intent_issue_RefferedBy"><?php echo $store_intent_issue->RefferedBy->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->BillNumber->Visible) { // BillNumber ?>
		<th class="<?php echo $store_intent_issue->BillNumber->headerCellClass() ?>"><span id="elh_store_intent_issue_BillNumber" class="store_intent_issue_BillNumber"><?php echo $store_intent_issue->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->CardNumber->Visible) { // CardNumber ?>
		<th class="<?php echo $store_intent_issue->CardNumber->headerCellClass() ?>"><span id="elh_store_intent_issue_CardNumber" class="store_intent_issue_CardNumber"><?php echo $store_intent_issue->CardNumber->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->BankName->Visible) { // BankName ?>
		<th class="<?php echo $store_intent_issue->BankName->headerCellClass() ?>"><span id="elh_store_intent_issue_BankName" class="store_intent_issue_BankName"><?php echo $store_intent_issue->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->DrID->Visible) { // DrID ?>
		<th class="<?php echo $store_intent_issue->DrID->headerCellClass() ?>"><span id="elh_store_intent_issue_DrID" class="store_intent_issue_DrID"><?php echo $store_intent_issue->DrID->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->BillStatus->Visible) { // BillStatus ?>
		<th class="<?php echo $store_intent_issue->BillStatus->headerCellClass() ?>"><span id="elh_store_intent_issue_BillStatus" class="store_intent_issue_BillStatus"><?php echo $store_intent_issue->BillStatus->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->ReportHeader->Visible) { // ReportHeader ?>
		<th class="<?php echo $store_intent_issue->ReportHeader->headerCellClass() ?>"><span id="elh_store_intent_issue_ReportHeader" class="store_intent_issue_ReportHeader"><?php echo $store_intent_issue->ReportHeader->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->StoreID->Visible) { // StoreID ?>
		<th class="<?php echo $store_intent_issue->StoreID->headerCellClass() ?>"><span id="elh_store_intent_issue_StoreID" class="store_intent_issue_StoreID"><?php echo $store_intent_issue->StoreID->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue->BranchID->Visible) { // BranchID ?>
		<th class="<?php echo $store_intent_issue->BranchID->headerCellClass() ?>"><span id="elh_store_intent_issue_BranchID" class="store_intent_issue_BranchID"><?php echo $store_intent_issue->BranchID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$store_intent_issue_delete->RecCnt = 0;
$i = 0;
while (!$store_intent_issue_delete->Recordset->EOF) {
	$store_intent_issue_delete->RecCnt++;
	$store_intent_issue_delete->RowCnt++;

	// Set row properties
	$store_intent_issue->resetAttributes();
	$store_intent_issue->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$store_intent_issue_delete->loadRowValues($store_intent_issue_delete->Recordset);

	// Render row
	$store_intent_issue_delete->renderRow();
?>
	<tr<?php echo $store_intent_issue->rowAttributes() ?>>
<?php if ($store_intent_issue->id->Visible) { // id ?>
		<td<?php echo $store_intent_issue->id->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_id" class="store_intent_issue_id">
<span<?php echo $store_intent_issue->id->viewAttributes() ?>>
<?php echo $store_intent_issue->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->Reception->Visible) { // Reception ?>
		<td<?php echo $store_intent_issue->Reception->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_Reception" class="store_intent_issue_Reception">
<span<?php echo $store_intent_issue->Reception->viewAttributes() ?>>
<?php echo $store_intent_issue->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->PatientId->Visible) { // PatientId ?>
		<td<?php echo $store_intent_issue->PatientId->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_PatientId" class="store_intent_issue_PatientId">
<span<?php echo $store_intent_issue->PatientId->viewAttributes() ?>>
<?php echo $store_intent_issue->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->mrnno->Visible) { // mrnno ?>
		<td<?php echo $store_intent_issue->mrnno->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_mrnno" class="store_intent_issue_mrnno">
<span<?php echo $store_intent_issue->mrnno->viewAttributes() ?>>
<?php echo $store_intent_issue->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->PatientName->Visible) { // PatientName ?>
		<td<?php echo $store_intent_issue->PatientName->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_PatientName" class="store_intent_issue_PatientName">
<span<?php echo $store_intent_issue->PatientName->viewAttributes() ?>>
<?php echo $store_intent_issue->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->Age->Visible) { // Age ?>
		<td<?php echo $store_intent_issue->Age->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_Age" class="store_intent_issue_Age">
<span<?php echo $store_intent_issue->Age->viewAttributes() ?>>
<?php echo $store_intent_issue->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->Gender->Visible) { // Gender ?>
		<td<?php echo $store_intent_issue->Gender->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_Gender" class="store_intent_issue_Gender">
<span<?php echo $store_intent_issue->Gender->viewAttributes() ?>>
<?php echo $store_intent_issue->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->Mobile->Visible) { // Mobile ?>
		<td<?php echo $store_intent_issue->Mobile->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_Mobile" class="store_intent_issue_Mobile">
<span<?php echo $store_intent_issue->Mobile->viewAttributes() ?>>
<?php echo $store_intent_issue->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->IP_OP->Visible) { // IP_OP ?>
		<td<?php echo $store_intent_issue->IP_OP->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_IP_OP" class="store_intent_issue_IP_OP">
<span<?php echo $store_intent_issue->IP_OP->viewAttributes() ?>>
<?php echo $store_intent_issue->IP_OP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->Doctor->Visible) { // Doctor ?>
		<td<?php echo $store_intent_issue->Doctor->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_Doctor" class="store_intent_issue_Doctor">
<span<?php echo $store_intent_issue->Doctor->viewAttributes() ?>>
<?php echo $store_intent_issue->Doctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->voucher_type->Visible) { // voucher_type ?>
		<td<?php echo $store_intent_issue->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_voucher_type" class="store_intent_issue_voucher_type">
<span<?php echo $store_intent_issue->voucher_type->viewAttributes() ?>>
<?php echo $store_intent_issue->voucher_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->Details->Visible) { // Details ?>
		<td<?php echo $store_intent_issue->Details->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_Details" class="store_intent_issue_Details">
<span<?php echo $store_intent_issue->Details->viewAttributes() ?>>
<?php echo $store_intent_issue->Details->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->ModeofPayment->Visible) { // ModeofPayment ?>
		<td<?php echo $store_intent_issue->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_ModeofPayment" class="store_intent_issue_ModeofPayment">
<span<?php echo $store_intent_issue->ModeofPayment->viewAttributes() ?>>
<?php echo $store_intent_issue->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->Amount->Visible) { // Amount ?>
		<td<?php echo $store_intent_issue->Amount->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_Amount" class="store_intent_issue_Amount">
<span<?php echo $store_intent_issue->Amount->viewAttributes() ?>>
<?php echo $store_intent_issue->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->AnyDues->Visible) { // AnyDues ?>
		<td<?php echo $store_intent_issue->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_AnyDues" class="store_intent_issue_AnyDues">
<span<?php echo $store_intent_issue->AnyDues->viewAttributes() ?>>
<?php echo $store_intent_issue->AnyDues->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->createdby->Visible) { // createdby ?>
		<td<?php echo $store_intent_issue->createdby->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_createdby" class="store_intent_issue_createdby">
<span<?php echo $store_intent_issue->createdby->viewAttributes() ?>>
<?php echo $store_intent_issue->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $store_intent_issue->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_createddatetime" class="store_intent_issue_createddatetime">
<span<?php echo $store_intent_issue->createddatetime->viewAttributes() ?>>
<?php echo $store_intent_issue->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $store_intent_issue->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_modifiedby" class="store_intent_issue_modifiedby">
<span<?php echo $store_intent_issue->modifiedby->viewAttributes() ?>>
<?php echo $store_intent_issue->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $store_intent_issue->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_modifieddatetime" class="store_intent_issue_modifieddatetime">
<span<?php echo $store_intent_issue->modifieddatetime->viewAttributes() ?>>
<?php echo $store_intent_issue->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->RealizationAmount->Visible) { // RealizationAmount ?>
		<td<?php echo $store_intent_issue->RealizationAmount->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_RealizationAmount" class="store_intent_issue_RealizationAmount">
<span<?php echo $store_intent_issue->RealizationAmount->viewAttributes() ?>>
<?php echo $store_intent_issue->RealizationAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->RealizationStatus->Visible) { // RealizationStatus ?>
		<td<?php echo $store_intent_issue->RealizationStatus->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_RealizationStatus" class="store_intent_issue_RealizationStatus">
<span<?php echo $store_intent_issue->RealizationStatus->viewAttributes() ?>>
<?php echo $store_intent_issue->RealizationStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<td<?php echo $store_intent_issue->RealizationRemarks->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_RealizationRemarks" class="store_intent_issue_RealizationRemarks">
<span<?php echo $store_intent_issue->RealizationRemarks->viewAttributes() ?>>
<?php echo $store_intent_issue->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<td<?php echo $store_intent_issue->RealizationBatchNo->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_RealizationBatchNo" class="store_intent_issue_RealizationBatchNo">
<span<?php echo $store_intent_issue->RealizationBatchNo->viewAttributes() ?>>
<?php echo $store_intent_issue->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->RealizationDate->Visible) { // RealizationDate ?>
		<td<?php echo $store_intent_issue->RealizationDate->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_RealizationDate" class="store_intent_issue_RealizationDate">
<span<?php echo $store_intent_issue->RealizationDate->viewAttributes() ?>>
<?php echo $store_intent_issue->RealizationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->HospID->Visible) { // HospID ?>
		<td<?php echo $store_intent_issue->HospID->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_HospID" class="store_intent_issue_HospID">
<span<?php echo $store_intent_issue->HospID->viewAttributes() ?>>
<?php echo $store_intent_issue->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->RIDNO->Visible) { // RIDNO ?>
		<td<?php echo $store_intent_issue->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_RIDNO" class="store_intent_issue_RIDNO">
<span<?php echo $store_intent_issue->RIDNO->viewAttributes() ?>>
<?php echo $store_intent_issue->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->TidNo->Visible) { // TidNo ?>
		<td<?php echo $store_intent_issue->TidNo->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_TidNo" class="store_intent_issue_TidNo">
<span<?php echo $store_intent_issue->TidNo->viewAttributes() ?>>
<?php echo $store_intent_issue->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->CId->Visible) { // CId ?>
		<td<?php echo $store_intent_issue->CId->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_CId" class="store_intent_issue_CId">
<span<?php echo $store_intent_issue->CId->viewAttributes() ?>>
<?php echo $store_intent_issue->CId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->PartnerName->Visible) { // PartnerName ?>
		<td<?php echo $store_intent_issue->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_PartnerName" class="store_intent_issue_PartnerName">
<span<?php echo $store_intent_issue->PartnerName->viewAttributes() ?>>
<?php echo $store_intent_issue->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->PayerType->Visible) { // PayerType ?>
		<td<?php echo $store_intent_issue->PayerType->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_PayerType" class="store_intent_issue_PayerType">
<span<?php echo $store_intent_issue->PayerType->viewAttributes() ?>>
<?php echo $store_intent_issue->PayerType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->Dob->Visible) { // Dob ?>
		<td<?php echo $store_intent_issue->Dob->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_Dob" class="store_intent_issue_Dob">
<span<?php echo $store_intent_issue->Dob->viewAttributes() ?>>
<?php echo $store_intent_issue->Dob->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->Currency->Visible) { // Currency ?>
		<td<?php echo $store_intent_issue->Currency->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_Currency" class="store_intent_issue_Currency">
<span<?php echo $store_intent_issue->Currency->viewAttributes() ?>>
<?php echo $store_intent_issue->Currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->DiscountRemarks->Visible) { // DiscountRemarks ?>
		<td<?php echo $store_intent_issue->DiscountRemarks->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_DiscountRemarks" class="store_intent_issue_DiscountRemarks">
<span<?php echo $store_intent_issue->DiscountRemarks->viewAttributes() ?>>
<?php echo $store_intent_issue->DiscountRemarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->Remarks->Visible) { // Remarks ?>
		<td<?php echo $store_intent_issue->Remarks->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_Remarks" class="store_intent_issue_Remarks">
<span<?php echo $store_intent_issue->Remarks->viewAttributes() ?>>
<?php echo $store_intent_issue->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->PatId->Visible) { // PatId ?>
		<td<?php echo $store_intent_issue->PatId->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_PatId" class="store_intent_issue_PatId">
<span<?php echo $store_intent_issue->PatId->viewAttributes() ?>>
<?php echo $store_intent_issue->PatId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->DrDepartment->Visible) { // DrDepartment ?>
		<td<?php echo $store_intent_issue->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_DrDepartment" class="store_intent_issue_DrDepartment">
<span<?php echo $store_intent_issue->DrDepartment->viewAttributes() ?>>
<?php echo $store_intent_issue->DrDepartment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->RefferedBy->Visible) { // RefferedBy ?>
		<td<?php echo $store_intent_issue->RefferedBy->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_RefferedBy" class="store_intent_issue_RefferedBy">
<span<?php echo $store_intent_issue->RefferedBy->viewAttributes() ?>>
<?php echo $store_intent_issue->RefferedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->BillNumber->Visible) { // BillNumber ?>
		<td<?php echo $store_intent_issue->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_BillNumber" class="store_intent_issue_BillNumber">
<span<?php echo $store_intent_issue->BillNumber->viewAttributes() ?>>
<?php echo $store_intent_issue->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->CardNumber->Visible) { // CardNumber ?>
		<td<?php echo $store_intent_issue->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_CardNumber" class="store_intent_issue_CardNumber">
<span<?php echo $store_intent_issue->CardNumber->viewAttributes() ?>>
<?php echo $store_intent_issue->CardNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->BankName->Visible) { // BankName ?>
		<td<?php echo $store_intent_issue->BankName->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_BankName" class="store_intent_issue_BankName">
<span<?php echo $store_intent_issue->BankName->viewAttributes() ?>>
<?php echo $store_intent_issue->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->DrID->Visible) { // DrID ?>
		<td<?php echo $store_intent_issue->DrID->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_DrID" class="store_intent_issue_DrID">
<span<?php echo $store_intent_issue->DrID->viewAttributes() ?>>
<?php echo $store_intent_issue->DrID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->BillStatus->Visible) { // BillStatus ?>
		<td<?php echo $store_intent_issue->BillStatus->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_BillStatus" class="store_intent_issue_BillStatus">
<span<?php echo $store_intent_issue->BillStatus->viewAttributes() ?>>
<?php echo $store_intent_issue->BillStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->ReportHeader->Visible) { // ReportHeader ?>
		<td<?php echo $store_intent_issue->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_ReportHeader" class="store_intent_issue_ReportHeader">
<span<?php echo $store_intent_issue->ReportHeader->viewAttributes() ?>>
<?php echo $store_intent_issue->ReportHeader->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->StoreID->Visible) { // StoreID ?>
		<td<?php echo $store_intent_issue->StoreID->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_StoreID" class="store_intent_issue_StoreID">
<span<?php echo $store_intent_issue->StoreID->viewAttributes() ?>>
<?php echo $store_intent_issue->StoreID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue->BranchID->Visible) { // BranchID ?>
		<td<?php echo $store_intent_issue->BranchID->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCnt ?>_store_intent_issue_BranchID" class="store_intent_issue_BranchID">
<span<?php echo $store_intent_issue->BranchID->viewAttributes() ?>>
<?php echo $store_intent_issue->BranchID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$store_intent_issue_delete->Recordset->moveNext();
}
$store_intent_issue_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_intent_issue_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$store_intent_issue_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$store_intent_issue_delete->terminate();
?>
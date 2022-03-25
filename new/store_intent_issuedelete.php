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
<?php include_once "header.php"; ?>
<script>
var fstore_intent_issuedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fstore_intent_issuedelete = currentForm = new ew.Form("fstore_intent_issuedelete", "delete");
	loadjs.done("fstore_intent_issuedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $store_intent_issue_delete->showPageHeader(); ?>
<?php
$store_intent_issue_delete->showMessage();
?>
<form name="fstore_intent_issuedelete" id="fstore_intent_issuedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_intent_issue">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($store_intent_issue_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($store_intent_issue_delete->id->Visible) { // id ?>
		<th class="<?php echo $store_intent_issue_delete->id->headerCellClass() ?>"><span id="elh_store_intent_issue_id" class="store_intent_issue_id"><?php echo $store_intent_issue_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->Reception->Visible) { // Reception ?>
		<th class="<?php echo $store_intent_issue_delete->Reception->headerCellClass() ?>"><span id="elh_store_intent_issue_Reception" class="store_intent_issue_Reception"><?php echo $store_intent_issue_delete->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $store_intent_issue_delete->PatientId->headerCellClass() ?>"><span id="elh_store_intent_issue_PatientId" class="store_intent_issue_PatientId"><?php echo $store_intent_issue_delete->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $store_intent_issue_delete->mrnno->headerCellClass() ?>"><span id="elh_store_intent_issue_mrnno" class="store_intent_issue_mrnno"><?php echo $store_intent_issue_delete->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $store_intent_issue_delete->PatientName->headerCellClass() ?>"><span id="elh_store_intent_issue_PatientName" class="store_intent_issue_PatientName"><?php echo $store_intent_issue_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->Age->Visible) { // Age ?>
		<th class="<?php echo $store_intent_issue_delete->Age->headerCellClass() ?>"><span id="elh_store_intent_issue_Age" class="store_intent_issue_Age"><?php echo $store_intent_issue_delete->Age->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->Gender->Visible) { // Gender ?>
		<th class="<?php echo $store_intent_issue_delete->Gender->headerCellClass() ?>"><span id="elh_store_intent_issue_Gender" class="store_intent_issue_Gender"><?php echo $store_intent_issue_delete->Gender->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->Mobile->Visible) { // Mobile ?>
		<th class="<?php echo $store_intent_issue_delete->Mobile->headerCellClass() ?>"><span id="elh_store_intent_issue_Mobile" class="store_intent_issue_Mobile"><?php echo $store_intent_issue_delete->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->IP_OP->Visible) { // IP_OP ?>
		<th class="<?php echo $store_intent_issue_delete->IP_OP->headerCellClass() ?>"><span id="elh_store_intent_issue_IP_OP" class="store_intent_issue_IP_OP"><?php echo $store_intent_issue_delete->IP_OP->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->Doctor->Visible) { // Doctor ?>
		<th class="<?php echo $store_intent_issue_delete->Doctor->headerCellClass() ?>"><span id="elh_store_intent_issue_Doctor" class="store_intent_issue_Doctor"><?php echo $store_intent_issue_delete->Doctor->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->voucher_type->Visible) { // voucher_type ?>
		<th class="<?php echo $store_intent_issue_delete->voucher_type->headerCellClass() ?>"><span id="elh_store_intent_issue_voucher_type" class="store_intent_issue_voucher_type"><?php echo $store_intent_issue_delete->voucher_type->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->Details->Visible) { // Details ?>
		<th class="<?php echo $store_intent_issue_delete->Details->headerCellClass() ?>"><span id="elh_store_intent_issue_Details" class="store_intent_issue_Details"><?php echo $store_intent_issue_delete->Details->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->ModeofPayment->Visible) { // ModeofPayment ?>
		<th class="<?php echo $store_intent_issue_delete->ModeofPayment->headerCellClass() ?>"><span id="elh_store_intent_issue_ModeofPayment" class="store_intent_issue_ModeofPayment"><?php echo $store_intent_issue_delete->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->Amount->Visible) { // Amount ?>
		<th class="<?php echo $store_intent_issue_delete->Amount->headerCellClass() ?>"><span id="elh_store_intent_issue_Amount" class="store_intent_issue_Amount"><?php echo $store_intent_issue_delete->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->AnyDues->Visible) { // AnyDues ?>
		<th class="<?php echo $store_intent_issue_delete->AnyDues->headerCellClass() ?>"><span id="elh_store_intent_issue_AnyDues" class="store_intent_issue_AnyDues"><?php echo $store_intent_issue_delete->AnyDues->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $store_intent_issue_delete->createdby->headerCellClass() ?>"><span id="elh_store_intent_issue_createdby" class="store_intent_issue_createdby"><?php echo $store_intent_issue_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $store_intent_issue_delete->createddatetime->headerCellClass() ?>"><span id="elh_store_intent_issue_createddatetime" class="store_intent_issue_createddatetime"><?php echo $store_intent_issue_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $store_intent_issue_delete->modifiedby->headerCellClass() ?>"><span id="elh_store_intent_issue_modifiedby" class="store_intent_issue_modifiedby"><?php echo $store_intent_issue_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $store_intent_issue_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_store_intent_issue_modifieddatetime" class="store_intent_issue_modifieddatetime"><?php echo $store_intent_issue_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->RealizationAmount->Visible) { // RealizationAmount ?>
		<th class="<?php echo $store_intent_issue_delete->RealizationAmount->headerCellClass() ?>"><span id="elh_store_intent_issue_RealizationAmount" class="store_intent_issue_RealizationAmount"><?php echo $store_intent_issue_delete->RealizationAmount->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->RealizationStatus->Visible) { // RealizationStatus ?>
		<th class="<?php echo $store_intent_issue_delete->RealizationStatus->headerCellClass() ?>"><span id="elh_store_intent_issue_RealizationStatus" class="store_intent_issue_RealizationStatus"><?php echo $store_intent_issue_delete->RealizationStatus->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<th class="<?php echo $store_intent_issue_delete->RealizationRemarks->headerCellClass() ?>"><span id="elh_store_intent_issue_RealizationRemarks" class="store_intent_issue_RealizationRemarks"><?php echo $store_intent_issue_delete->RealizationRemarks->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<th class="<?php echo $store_intent_issue_delete->RealizationBatchNo->headerCellClass() ?>"><span id="elh_store_intent_issue_RealizationBatchNo" class="store_intent_issue_RealizationBatchNo"><?php echo $store_intent_issue_delete->RealizationBatchNo->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->RealizationDate->Visible) { // RealizationDate ?>
		<th class="<?php echo $store_intent_issue_delete->RealizationDate->headerCellClass() ?>"><span id="elh_store_intent_issue_RealizationDate" class="store_intent_issue_RealizationDate"><?php echo $store_intent_issue_delete->RealizationDate->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $store_intent_issue_delete->HospID->headerCellClass() ?>"><span id="elh_store_intent_issue_HospID" class="store_intent_issue_HospID"><?php echo $store_intent_issue_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->RIDNO->Visible) { // RIDNO ?>
		<th class="<?php echo $store_intent_issue_delete->RIDNO->headerCellClass() ?>"><span id="elh_store_intent_issue_RIDNO" class="store_intent_issue_RIDNO"><?php echo $store_intent_issue_delete->RIDNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->TidNo->Visible) { // TidNo ?>
		<th class="<?php echo $store_intent_issue_delete->TidNo->headerCellClass() ?>"><span id="elh_store_intent_issue_TidNo" class="store_intent_issue_TidNo"><?php echo $store_intent_issue_delete->TidNo->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->CId->Visible) { // CId ?>
		<th class="<?php echo $store_intent_issue_delete->CId->headerCellClass() ?>"><span id="elh_store_intent_issue_CId" class="store_intent_issue_CId"><?php echo $store_intent_issue_delete->CId->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $store_intent_issue_delete->PartnerName->headerCellClass() ?>"><span id="elh_store_intent_issue_PartnerName" class="store_intent_issue_PartnerName"><?php echo $store_intent_issue_delete->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->PayerType->Visible) { // PayerType ?>
		<th class="<?php echo $store_intent_issue_delete->PayerType->headerCellClass() ?>"><span id="elh_store_intent_issue_PayerType" class="store_intent_issue_PayerType"><?php echo $store_intent_issue_delete->PayerType->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->Dob->Visible) { // Dob ?>
		<th class="<?php echo $store_intent_issue_delete->Dob->headerCellClass() ?>"><span id="elh_store_intent_issue_Dob" class="store_intent_issue_Dob"><?php echo $store_intent_issue_delete->Dob->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->Currency->Visible) { // Currency ?>
		<th class="<?php echo $store_intent_issue_delete->Currency->headerCellClass() ?>"><span id="elh_store_intent_issue_Currency" class="store_intent_issue_Currency"><?php echo $store_intent_issue_delete->Currency->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->DiscountRemarks->Visible) { // DiscountRemarks ?>
		<th class="<?php echo $store_intent_issue_delete->DiscountRemarks->headerCellClass() ?>"><span id="elh_store_intent_issue_DiscountRemarks" class="store_intent_issue_DiscountRemarks"><?php echo $store_intent_issue_delete->DiscountRemarks->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->Remarks->Visible) { // Remarks ?>
		<th class="<?php echo $store_intent_issue_delete->Remarks->headerCellClass() ?>"><span id="elh_store_intent_issue_Remarks" class="store_intent_issue_Remarks"><?php echo $store_intent_issue_delete->Remarks->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->PatId->Visible) { // PatId ?>
		<th class="<?php echo $store_intent_issue_delete->PatId->headerCellClass() ?>"><span id="elh_store_intent_issue_PatId" class="store_intent_issue_PatId"><?php echo $store_intent_issue_delete->PatId->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->DrDepartment->Visible) { // DrDepartment ?>
		<th class="<?php echo $store_intent_issue_delete->DrDepartment->headerCellClass() ?>"><span id="elh_store_intent_issue_DrDepartment" class="store_intent_issue_DrDepartment"><?php echo $store_intent_issue_delete->DrDepartment->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->RefferedBy->Visible) { // RefferedBy ?>
		<th class="<?php echo $store_intent_issue_delete->RefferedBy->headerCellClass() ?>"><span id="elh_store_intent_issue_RefferedBy" class="store_intent_issue_RefferedBy"><?php echo $store_intent_issue_delete->RefferedBy->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->BillNumber->Visible) { // BillNumber ?>
		<th class="<?php echo $store_intent_issue_delete->BillNumber->headerCellClass() ?>"><span id="elh_store_intent_issue_BillNumber" class="store_intent_issue_BillNumber"><?php echo $store_intent_issue_delete->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->CardNumber->Visible) { // CardNumber ?>
		<th class="<?php echo $store_intent_issue_delete->CardNumber->headerCellClass() ?>"><span id="elh_store_intent_issue_CardNumber" class="store_intent_issue_CardNumber"><?php echo $store_intent_issue_delete->CardNumber->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->BankName->Visible) { // BankName ?>
		<th class="<?php echo $store_intent_issue_delete->BankName->headerCellClass() ?>"><span id="elh_store_intent_issue_BankName" class="store_intent_issue_BankName"><?php echo $store_intent_issue_delete->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->DrID->Visible) { // DrID ?>
		<th class="<?php echo $store_intent_issue_delete->DrID->headerCellClass() ?>"><span id="elh_store_intent_issue_DrID" class="store_intent_issue_DrID"><?php echo $store_intent_issue_delete->DrID->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->BillStatus->Visible) { // BillStatus ?>
		<th class="<?php echo $store_intent_issue_delete->BillStatus->headerCellClass() ?>"><span id="elh_store_intent_issue_BillStatus" class="store_intent_issue_BillStatus"><?php echo $store_intent_issue_delete->BillStatus->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->ReportHeader->Visible) { // ReportHeader ?>
		<th class="<?php echo $store_intent_issue_delete->ReportHeader->headerCellClass() ?>"><span id="elh_store_intent_issue_ReportHeader" class="store_intent_issue_ReportHeader"><?php echo $store_intent_issue_delete->ReportHeader->caption() ?></span></th>
<?php } ?>
<?php if ($store_intent_issue_delete->PharID->Visible) { // PharID ?>
		<th class="<?php echo $store_intent_issue_delete->PharID->headerCellClass() ?>"><span id="elh_store_intent_issue_PharID" class="store_intent_issue_PharID"><?php echo $store_intent_issue_delete->PharID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$store_intent_issue_delete->RecordCount = 0;
$i = 0;
while (!$store_intent_issue_delete->Recordset->EOF) {
	$store_intent_issue_delete->RecordCount++;
	$store_intent_issue_delete->RowCount++;

	// Set row properties
	$store_intent_issue->resetAttributes();
	$store_intent_issue->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$store_intent_issue_delete->loadRowValues($store_intent_issue_delete->Recordset);

	// Render row
	$store_intent_issue_delete->renderRow();
?>
	<tr <?php echo $store_intent_issue->rowAttributes() ?>>
<?php if ($store_intent_issue_delete->id->Visible) { // id ?>
		<td <?php echo $store_intent_issue_delete->id->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_id" class="store_intent_issue_id">
<span<?php echo $store_intent_issue_delete->id->viewAttributes() ?>><?php echo $store_intent_issue_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->Reception->Visible) { // Reception ?>
		<td <?php echo $store_intent_issue_delete->Reception->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_Reception" class="store_intent_issue_Reception">
<span<?php echo $store_intent_issue_delete->Reception->viewAttributes() ?>><?php echo $store_intent_issue_delete->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->PatientId->Visible) { // PatientId ?>
		<td <?php echo $store_intent_issue_delete->PatientId->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_PatientId" class="store_intent_issue_PatientId">
<span<?php echo $store_intent_issue_delete->PatientId->viewAttributes() ?>><?php echo $store_intent_issue_delete->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->mrnno->Visible) { // mrnno ?>
		<td <?php echo $store_intent_issue_delete->mrnno->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_mrnno" class="store_intent_issue_mrnno">
<span<?php echo $store_intent_issue_delete->mrnno->viewAttributes() ?>><?php echo $store_intent_issue_delete->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $store_intent_issue_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_PatientName" class="store_intent_issue_PatientName">
<span<?php echo $store_intent_issue_delete->PatientName->viewAttributes() ?>><?php echo $store_intent_issue_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->Age->Visible) { // Age ?>
		<td <?php echo $store_intent_issue_delete->Age->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_Age" class="store_intent_issue_Age">
<span<?php echo $store_intent_issue_delete->Age->viewAttributes() ?>><?php echo $store_intent_issue_delete->Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->Gender->Visible) { // Gender ?>
		<td <?php echo $store_intent_issue_delete->Gender->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_Gender" class="store_intent_issue_Gender">
<span<?php echo $store_intent_issue_delete->Gender->viewAttributes() ?>><?php echo $store_intent_issue_delete->Gender->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->Mobile->Visible) { // Mobile ?>
		<td <?php echo $store_intent_issue_delete->Mobile->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_Mobile" class="store_intent_issue_Mobile">
<span<?php echo $store_intent_issue_delete->Mobile->viewAttributes() ?>><?php echo $store_intent_issue_delete->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->IP_OP->Visible) { // IP_OP ?>
		<td <?php echo $store_intent_issue_delete->IP_OP->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_IP_OP" class="store_intent_issue_IP_OP">
<span<?php echo $store_intent_issue_delete->IP_OP->viewAttributes() ?>><?php echo $store_intent_issue_delete->IP_OP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->Doctor->Visible) { // Doctor ?>
		<td <?php echo $store_intent_issue_delete->Doctor->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_Doctor" class="store_intent_issue_Doctor">
<span<?php echo $store_intent_issue_delete->Doctor->viewAttributes() ?>><?php echo $store_intent_issue_delete->Doctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->voucher_type->Visible) { // voucher_type ?>
		<td <?php echo $store_intent_issue_delete->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_voucher_type" class="store_intent_issue_voucher_type">
<span<?php echo $store_intent_issue_delete->voucher_type->viewAttributes() ?>><?php echo $store_intent_issue_delete->voucher_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->Details->Visible) { // Details ?>
		<td <?php echo $store_intent_issue_delete->Details->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_Details" class="store_intent_issue_Details">
<span<?php echo $store_intent_issue_delete->Details->viewAttributes() ?>><?php echo $store_intent_issue_delete->Details->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->ModeofPayment->Visible) { // ModeofPayment ?>
		<td <?php echo $store_intent_issue_delete->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_ModeofPayment" class="store_intent_issue_ModeofPayment">
<span<?php echo $store_intent_issue_delete->ModeofPayment->viewAttributes() ?>><?php echo $store_intent_issue_delete->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->Amount->Visible) { // Amount ?>
		<td <?php echo $store_intent_issue_delete->Amount->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_Amount" class="store_intent_issue_Amount">
<span<?php echo $store_intent_issue_delete->Amount->viewAttributes() ?>><?php echo $store_intent_issue_delete->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->AnyDues->Visible) { // AnyDues ?>
		<td <?php echo $store_intent_issue_delete->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_AnyDues" class="store_intent_issue_AnyDues">
<span<?php echo $store_intent_issue_delete->AnyDues->viewAttributes() ?>><?php echo $store_intent_issue_delete->AnyDues->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $store_intent_issue_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_createdby" class="store_intent_issue_createdby">
<span<?php echo $store_intent_issue_delete->createdby->viewAttributes() ?>><?php echo $store_intent_issue_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $store_intent_issue_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_createddatetime" class="store_intent_issue_createddatetime">
<span<?php echo $store_intent_issue_delete->createddatetime->viewAttributes() ?>><?php echo $store_intent_issue_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $store_intent_issue_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_modifiedby" class="store_intent_issue_modifiedby">
<span<?php echo $store_intent_issue_delete->modifiedby->viewAttributes() ?>><?php echo $store_intent_issue_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $store_intent_issue_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_modifieddatetime" class="store_intent_issue_modifieddatetime">
<span<?php echo $store_intent_issue_delete->modifieddatetime->viewAttributes() ?>><?php echo $store_intent_issue_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->RealizationAmount->Visible) { // RealizationAmount ?>
		<td <?php echo $store_intent_issue_delete->RealizationAmount->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_RealizationAmount" class="store_intent_issue_RealizationAmount">
<span<?php echo $store_intent_issue_delete->RealizationAmount->viewAttributes() ?>><?php echo $store_intent_issue_delete->RealizationAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->RealizationStatus->Visible) { // RealizationStatus ?>
		<td <?php echo $store_intent_issue_delete->RealizationStatus->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_RealizationStatus" class="store_intent_issue_RealizationStatus">
<span<?php echo $store_intent_issue_delete->RealizationStatus->viewAttributes() ?>><?php echo $store_intent_issue_delete->RealizationStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->RealizationRemarks->Visible) { // RealizationRemarks ?>
		<td <?php echo $store_intent_issue_delete->RealizationRemarks->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_RealizationRemarks" class="store_intent_issue_RealizationRemarks">
<span<?php echo $store_intent_issue_delete->RealizationRemarks->viewAttributes() ?>><?php echo $store_intent_issue_delete->RealizationRemarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->RealizationBatchNo->Visible) { // RealizationBatchNo ?>
		<td <?php echo $store_intent_issue_delete->RealizationBatchNo->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_RealizationBatchNo" class="store_intent_issue_RealizationBatchNo">
<span<?php echo $store_intent_issue_delete->RealizationBatchNo->viewAttributes() ?>><?php echo $store_intent_issue_delete->RealizationBatchNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->RealizationDate->Visible) { // RealizationDate ?>
		<td <?php echo $store_intent_issue_delete->RealizationDate->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_RealizationDate" class="store_intent_issue_RealizationDate">
<span<?php echo $store_intent_issue_delete->RealizationDate->viewAttributes() ?>><?php echo $store_intent_issue_delete->RealizationDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $store_intent_issue_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_HospID" class="store_intent_issue_HospID">
<span<?php echo $store_intent_issue_delete->HospID->viewAttributes() ?>><?php echo $store_intent_issue_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->RIDNO->Visible) { // RIDNO ?>
		<td <?php echo $store_intent_issue_delete->RIDNO->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_RIDNO" class="store_intent_issue_RIDNO">
<span<?php echo $store_intent_issue_delete->RIDNO->viewAttributes() ?>><?php echo $store_intent_issue_delete->RIDNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->TidNo->Visible) { // TidNo ?>
		<td <?php echo $store_intent_issue_delete->TidNo->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_TidNo" class="store_intent_issue_TidNo">
<span<?php echo $store_intent_issue_delete->TidNo->viewAttributes() ?>><?php echo $store_intent_issue_delete->TidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->CId->Visible) { // CId ?>
		<td <?php echo $store_intent_issue_delete->CId->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_CId" class="store_intent_issue_CId">
<span<?php echo $store_intent_issue_delete->CId->viewAttributes() ?>><?php echo $store_intent_issue_delete->CId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->PartnerName->Visible) { // PartnerName ?>
		<td <?php echo $store_intent_issue_delete->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_PartnerName" class="store_intent_issue_PartnerName">
<span<?php echo $store_intent_issue_delete->PartnerName->viewAttributes() ?>><?php echo $store_intent_issue_delete->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->PayerType->Visible) { // PayerType ?>
		<td <?php echo $store_intent_issue_delete->PayerType->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_PayerType" class="store_intent_issue_PayerType">
<span<?php echo $store_intent_issue_delete->PayerType->viewAttributes() ?>><?php echo $store_intent_issue_delete->PayerType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->Dob->Visible) { // Dob ?>
		<td <?php echo $store_intent_issue_delete->Dob->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_Dob" class="store_intent_issue_Dob">
<span<?php echo $store_intent_issue_delete->Dob->viewAttributes() ?>><?php echo $store_intent_issue_delete->Dob->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->Currency->Visible) { // Currency ?>
		<td <?php echo $store_intent_issue_delete->Currency->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_Currency" class="store_intent_issue_Currency">
<span<?php echo $store_intent_issue_delete->Currency->viewAttributes() ?>><?php echo $store_intent_issue_delete->Currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->DiscountRemarks->Visible) { // DiscountRemarks ?>
		<td <?php echo $store_intent_issue_delete->DiscountRemarks->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_DiscountRemarks" class="store_intent_issue_DiscountRemarks">
<span<?php echo $store_intent_issue_delete->DiscountRemarks->viewAttributes() ?>><?php echo $store_intent_issue_delete->DiscountRemarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->Remarks->Visible) { // Remarks ?>
		<td <?php echo $store_intent_issue_delete->Remarks->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_Remarks" class="store_intent_issue_Remarks">
<span<?php echo $store_intent_issue_delete->Remarks->viewAttributes() ?>><?php echo $store_intent_issue_delete->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->PatId->Visible) { // PatId ?>
		<td <?php echo $store_intent_issue_delete->PatId->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_PatId" class="store_intent_issue_PatId">
<span<?php echo $store_intent_issue_delete->PatId->viewAttributes() ?>><?php echo $store_intent_issue_delete->PatId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->DrDepartment->Visible) { // DrDepartment ?>
		<td <?php echo $store_intent_issue_delete->DrDepartment->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_DrDepartment" class="store_intent_issue_DrDepartment">
<span<?php echo $store_intent_issue_delete->DrDepartment->viewAttributes() ?>><?php echo $store_intent_issue_delete->DrDepartment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->RefferedBy->Visible) { // RefferedBy ?>
		<td <?php echo $store_intent_issue_delete->RefferedBy->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_RefferedBy" class="store_intent_issue_RefferedBy">
<span<?php echo $store_intent_issue_delete->RefferedBy->viewAttributes() ?>><?php echo $store_intent_issue_delete->RefferedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->BillNumber->Visible) { // BillNumber ?>
		<td <?php echo $store_intent_issue_delete->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_BillNumber" class="store_intent_issue_BillNumber">
<span<?php echo $store_intent_issue_delete->BillNumber->viewAttributes() ?>><?php echo $store_intent_issue_delete->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->CardNumber->Visible) { // CardNumber ?>
		<td <?php echo $store_intent_issue_delete->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_CardNumber" class="store_intent_issue_CardNumber">
<span<?php echo $store_intent_issue_delete->CardNumber->viewAttributes() ?>><?php echo $store_intent_issue_delete->CardNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->BankName->Visible) { // BankName ?>
		<td <?php echo $store_intent_issue_delete->BankName->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_BankName" class="store_intent_issue_BankName">
<span<?php echo $store_intent_issue_delete->BankName->viewAttributes() ?>><?php echo $store_intent_issue_delete->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->DrID->Visible) { // DrID ?>
		<td <?php echo $store_intent_issue_delete->DrID->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_DrID" class="store_intent_issue_DrID">
<span<?php echo $store_intent_issue_delete->DrID->viewAttributes() ?>><?php echo $store_intent_issue_delete->DrID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->BillStatus->Visible) { // BillStatus ?>
		<td <?php echo $store_intent_issue_delete->BillStatus->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_BillStatus" class="store_intent_issue_BillStatus">
<span<?php echo $store_intent_issue_delete->BillStatus->viewAttributes() ?>><?php echo $store_intent_issue_delete->BillStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->ReportHeader->Visible) { // ReportHeader ?>
		<td <?php echo $store_intent_issue_delete->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_ReportHeader" class="store_intent_issue_ReportHeader">
<span<?php echo $store_intent_issue_delete->ReportHeader->viewAttributes() ?>><?php echo $store_intent_issue_delete->ReportHeader->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_intent_issue_delete->PharID->Visible) { // PharID ?>
		<td <?php echo $store_intent_issue_delete->PharID->cellAttributes() ?>>
<span id="el<?php echo $store_intent_issue_delete->RowCount ?>_store_intent_issue_PharID" class="store_intent_issue_PharID">
<span<?php echo $store_intent_issue_delete->PharID->viewAttributes() ?>><?php echo $store_intent_issue_delete->PharID->getViewValue() ?></span>
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
$store_intent_issue_delete->terminate();
?>
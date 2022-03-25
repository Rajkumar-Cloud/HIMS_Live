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
<?php include_once "header.php"; ?>
<script>
var fbilling_refund_voucherdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fbilling_refund_voucherdelete = currentForm = new ew.Form("fbilling_refund_voucherdelete", "delete");
	loadjs.done("fbilling_refund_voucherdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $billing_refund_voucher_delete->showPageHeader(); ?>
<?php
$billing_refund_voucher_delete->showMessage();
?>
<form name="fbilling_refund_voucherdelete" id="fbilling_refund_voucherdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_refund_voucher">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($billing_refund_voucher_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($billing_refund_voucher_delete->id->Visible) { // id ?>
		<th class="<?php echo $billing_refund_voucher_delete->id->headerCellClass() ?>"><span id="elh_billing_refund_voucher_id" class="billing_refund_voucher_id"><?php echo $billing_refund_voucher_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->Name->Visible) { // Name ?>
		<th class="<?php echo $billing_refund_voucher_delete->Name->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Name" class="billing_refund_voucher_Name"><?php echo $billing_refund_voucher_delete->Name->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->Mobile->Visible) { // Mobile ?>
		<th class="<?php echo $billing_refund_voucher_delete->Mobile->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Mobile" class="billing_refund_voucher_Mobile"><?php echo $billing_refund_voucher_delete->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->voucher_type->Visible) { // voucher_type ?>
		<th class="<?php echo $billing_refund_voucher_delete->voucher_type->headerCellClass() ?>"><span id="elh_billing_refund_voucher_voucher_type" class="billing_refund_voucher_voucher_type"><?php echo $billing_refund_voucher_delete->voucher_type->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->Details->Visible) { // Details ?>
		<th class="<?php echo $billing_refund_voucher_delete->Details->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Details" class="billing_refund_voucher_Details"><?php echo $billing_refund_voucher_delete->Details->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->ModeofPayment->Visible) { // ModeofPayment ?>
		<th class="<?php echo $billing_refund_voucher_delete->ModeofPayment->headerCellClass() ?>"><span id="elh_billing_refund_voucher_ModeofPayment" class="billing_refund_voucher_ModeofPayment"><?php echo $billing_refund_voucher_delete->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->Amount->Visible) { // Amount ?>
		<th class="<?php echo $billing_refund_voucher_delete->Amount->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Amount" class="billing_refund_voucher_Amount"><?php echo $billing_refund_voucher_delete->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->AnyDues->Visible) { // AnyDues ?>
		<th class="<?php echo $billing_refund_voucher_delete->AnyDues->headerCellClass() ?>"><span id="elh_billing_refund_voucher_AnyDues" class="billing_refund_voucher_AnyDues"><?php echo $billing_refund_voucher_delete->AnyDues->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $billing_refund_voucher_delete->createdby->headerCellClass() ?>"><span id="elh_billing_refund_voucher_createdby" class="billing_refund_voucher_createdby"><?php echo $billing_refund_voucher_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $billing_refund_voucher_delete->createddatetime->headerCellClass() ?>"><span id="elh_billing_refund_voucher_createddatetime" class="billing_refund_voucher_createddatetime"><?php echo $billing_refund_voucher_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $billing_refund_voucher_delete->modifiedby->headerCellClass() ?>"><span id="elh_billing_refund_voucher_modifiedby" class="billing_refund_voucher_modifiedby"><?php echo $billing_refund_voucher_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $billing_refund_voucher_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_billing_refund_voucher_modifieddatetime" class="billing_refund_voucher_modifieddatetime"><?php echo $billing_refund_voucher_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->PatID->Visible) { // PatID ?>
		<th class="<?php echo $billing_refund_voucher_delete->PatID->headerCellClass() ?>"><span id="elh_billing_refund_voucher_PatID" class="billing_refund_voucher_PatID"><?php echo $billing_refund_voucher_delete->PatID->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $billing_refund_voucher_delete->PatientID->headerCellClass() ?>"><span id="elh_billing_refund_voucher_PatientID" class="billing_refund_voucher_PatientID"><?php echo $billing_refund_voucher_delete->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $billing_refund_voucher_delete->PatientName->headerCellClass() ?>"><span id="elh_billing_refund_voucher_PatientName" class="billing_refund_voucher_PatientName"><?php echo $billing_refund_voucher_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->VisiteType->Visible) { // VisiteType ?>
		<th class="<?php echo $billing_refund_voucher_delete->VisiteType->headerCellClass() ?>"><span id="elh_billing_refund_voucher_VisiteType" class="billing_refund_voucher_VisiteType"><?php echo $billing_refund_voucher_delete->VisiteType->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->VisitDate->Visible) { // VisitDate ?>
		<th class="<?php echo $billing_refund_voucher_delete->VisitDate->headerCellClass() ?>"><span id="elh_billing_refund_voucher_VisitDate" class="billing_refund_voucher_VisitDate"><?php echo $billing_refund_voucher_delete->VisitDate->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->AdvanceNo->Visible) { // AdvanceNo ?>
		<th class="<?php echo $billing_refund_voucher_delete->AdvanceNo->headerCellClass() ?>"><span id="elh_billing_refund_voucher_AdvanceNo" class="billing_refund_voucher_AdvanceNo"><?php echo $billing_refund_voucher_delete->AdvanceNo->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->Status->Visible) { // Status ?>
		<th class="<?php echo $billing_refund_voucher_delete->Status->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Status" class="billing_refund_voucher_Status"><?php echo $billing_refund_voucher_delete->Status->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->Date->Visible) { // Date ?>
		<th class="<?php echo $billing_refund_voucher_delete->Date->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Date" class="billing_refund_voucher_Date"><?php echo $billing_refund_voucher_delete->Date->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
		<th class="<?php echo $billing_refund_voucher_delete->AdvanceValidityDate->headerCellClass() ?>"><span id="elh_billing_refund_voucher_AdvanceValidityDate" class="billing_refund_voucher_AdvanceValidityDate"><?php echo $billing_refund_voucher_delete->AdvanceValidityDate->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
		<th class="<?php echo $billing_refund_voucher_delete->TotalRemainingAdvance->headerCellClass() ?>"><span id="elh_billing_refund_voucher_TotalRemainingAdvance" class="billing_refund_voucher_TotalRemainingAdvance"><?php echo $billing_refund_voucher_delete->TotalRemainingAdvance->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->Remarks->Visible) { // Remarks ?>
		<th class="<?php echo $billing_refund_voucher_delete->Remarks->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Remarks" class="billing_refund_voucher_Remarks"><?php echo $billing_refund_voucher_delete->Remarks->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<th class="<?php echo $billing_refund_voucher_delete->SeectPaymentMode->headerCellClass() ?>"><span id="elh_billing_refund_voucher_SeectPaymentMode" class="billing_refund_voucher_SeectPaymentMode"><?php echo $billing_refund_voucher_delete->SeectPaymentMode->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->PaidAmount->Visible) { // PaidAmount ?>
		<th class="<?php echo $billing_refund_voucher_delete->PaidAmount->headerCellClass() ?>"><span id="elh_billing_refund_voucher_PaidAmount" class="billing_refund_voucher_PaidAmount"><?php echo $billing_refund_voucher_delete->PaidAmount->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->Currency->Visible) { // Currency ?>
		<th class="<?php echo $billing_refund_voucher_delete->Currency->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Currency" class="billing_refund_voucher_Currency"><?php echo $billing_refund_voucher_delete->Currency->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->CardNumber->Visible) { // CardNumber ?>
		<th class="<?php echo $billing_refund_voucher_delete->CardNumber->headerCellClass() ?>"><span id="elh_billing_refund_voucher_CardNumber" class="billing_refund_voucher_CardNumber"><?php echo $billing_refund_voucher_delete->CardNumber->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->BankName->Visible) { // BankName ?>
		<th class="<?php echo $billing_refund_voucher_delete->BankName->headerCellClass() ?>"><span id="elh_billing_refund_voucher_BankName" class="billing_refund_voucher_BankName"><?php echo $billing_refund_voucher_delete->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $billing_refund_voucher_delete->HospID->headerCellClass() ?>"><span id="elh_billing_refund_voucher_HospID" class="billing_refund_voucher_HospID"><?php echo $billing_refund_voucher_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->Reception->Visible) { // Reception ?>
		<th class="<?php echo $billing_refund_voucher_delete->Reception->headerCellClass() ?>"><span id="elh_billing_refund_voucher_Reception" class="billing_refund_voucher_Reception"><?php echo $billing_refund_voucher_delete->Reception->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $billing_refund_voucher_delete->mrnno->headerCellClass() ?>"><span id="elh_billing_refund_voucher_mrnno" class="billing_refund_voucher_mrnno"><?php echo $billing_refund_voucher_delete->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($billing_refund_voucher_delete->GetUserName->Visible) { // GetUserName ?>
		<th class="<?php echo $billing_refund_voucher_delete->GetUserName->headerCellClass() ?>"><span id="elh_billing_refund_voucher_GetUserName" class="billing_refund_voucher_GetUserName"><?php echo $billing_refund_voucher_delete->GetUserName->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$billing_refund_voucher_delete->RecordCount = 0;
$i = 0;
while (!$billing_refund_voucher_delete->Recordset->EOF) {
	$billing_refund_voucher_delete->RecordCount++;
	$billing_refund_voucher_delete->RowCount++;

	// Set row properties
	$billing_refund_voucher->resetAttributes();
	$billing_refund_voucher->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$billing_refund_voucher_delete->loadRowValues($billing_refund_voucher_delete->Recordset);

	// Render row
	$billing_refund_voucher_delete->renderRow();
?>
	<tr <?php echo $billing_refund_voucher->rowAttributes() ?>>
<?php if ($billing_refund_voucher_delete->id->Visible) { // id ?>
		<td <?php echo $billing_refund_voucher_delete->id->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_id" class="billing_refund_voucher_id">
<span<?php echo $billing_refund_voucher_delete->id->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->Name->Visible) { // Name ?>
		<td <?php echo $billing_refund_voucher_delete->Name->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_Name" class="billing_refund_voucher_Name">
<span<?php echo $billing_refund_voucher_delete->Name->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->Mobile->Visible) { // Mobile ?>
		<td <?php echo $billing_refund_voucher_delete->Mobile->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_Mobile" class="billing_refund_voucher_Mobile">
<span<?php echo $billing_refund_voucher_delete->Mobile->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->voucher_type->Visible) { // voucher_type ?>
		<td <?php echo $billing_refund_voucher_delete->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_voucher_type" class="billing_refund_voucher_voucher_type">
<span<?php echo $billing_refund_voucher_delete->voucher_type->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->voucher_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->Details->Visible) { // Details ?>
		<td <?php echo $billing_refund_voucher_delete->Details->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_Details" class="billing_refund_voucher_Details">
<span<?php echo $billing_refund_voucher_delete->Details->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->Details->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->ModeofPayment->Visible) { // ModeofPayment ?>
		<td <?php echo $billing_refund_voucher_delete->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_ModeofPayment" class="billing_refund_voucher_ModeofPayment">
<span<?php echo $billing_refund_voucher_delete->ModeofPayment->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->Amount->Visible) { // Amount ?>
		<td <?php echo $billing_refund_voucher_delete->Amount->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_Amount" class="billing_refund_voucher_Amount">
<span<?php echo $billing_refund_voucher_delete->Amount->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->AnyDues->Visible) { // AnyDues ?>
		<td <?php echo $billing_refund_voucher_delete->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_AnyDues" class="billing_refund_voucher_AnyDues">
<span<?php echo $billing_refund_voucher_delete->AnyDues->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->AnyDues->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $billing_refund_voucher_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_createdby" class="billing_refund_voucher_createdby">
<span<?php echo $billing_refund_voucher_delete->createdby->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $billing_refund_voucher_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_createddatetime" class="billing_refund_voucher_createddatetime">
<span<?php echo $billing_refund_voucher_delete->createddatetime->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $billing_refund_voucher_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_modifiedby" class="billing_refund_voucher_modifiedby">
<span<?php echo $billing_refund_voucher_delete->modifiedby->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $billing_refund_voucher_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_modifieddatetime" class="billing_refund_voucher_modifieddatetime">
<span<?php echo $billing_refund_voucher_delete->modifieddatetime->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->PatID->Visible) { // PatID ?>
		<td <?php echo $billing_refund_voucher_delete->PatID->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_PatID" class="billing_refund_voucher_PatID">
<span<?php echo $billing_refund_voucher_delete->PatID->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->PatID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->PatientID->Visible) { // PatientID ?>
		<td <?php echo $billing_refund_voucher_delete->PatientID->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_PatientID" class="billing_refund_voucher_PatientID">
<span<?php echo $billing_refund_voucher_delete->PatientID->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $billing_refund_voucher_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_PatientName" class="billing_refund_voucher_PatientName">
<span<?php echo $billing_refund_voucher_delete->PatientName->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->VisiteType->Visible) { // VisiteType ?>
		<td <?php echo $billing_refund_voucher_delete->VisiteType->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_VisiteType" class="billing_refund_voucher_VisiteType">
<span<?php echo $billing_refund_voucher_delete->VisiteType->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->VisiteType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->VisitDate->Visible) { // VisitDate ?>
		<td <?php echo $billing_refund_voucher_delete->VisitDate->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_VisitDate" class="billing_refund_voucher_VisitDate">
<span<?php echo $billing_refund_voucher_delete->VisitDate->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->VisitDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->AdvanceNo->Visible) { // AdvanceNo ?>
		<td <?php echo $billing_refund_voucher_delete->AdvanceNo->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_AdvanceNo" class="billing_refund_voucher_AdvanceNo">
<span<?php echo $billing_refund_voucher_delete->AdvanceNo->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->AdvanceNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->Status->Visible) { // Status ?>
		<td <?php echo $billing_refund_voucher_delete->Status->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_Status" class="billing_refund_voucher_Status">
<span<?php echo $billing_refund_voucher_delete->Status->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->Date->Visible) { // Date ?>
		<td <?php echo $billing_refund_voucher_delete->Date->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_Date" class="billing_refund_voucher_Date">
<span<?php echo $billing_refund_voucher_delete->Date->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
		<td <?php echo $billing_refund_voucher_delete->AdvanceValidityDate->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_AdvanceValidityDate" class="billing_refund_voucher_AdvanceValidityDate">
<span<?php echo $billing_refund_voucher_delete->AdvanceValidityDate->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->AdvanceValidityDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
		<td <?php echo $billing_refund_voucher_delete->TotalRemainingAdvance->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_TotalRemainingAdvance" class="billing_refund_voucher_TotalRemainingAdvance">
<span<?php echo $billing_refund_voucher_delete->TotalRemainingAdvance->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->TotalRemainingAdvance->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->Remarks->Visible) { // Remarks ?>
		<td <?php echo $billing_refund_voucher_delete->Remarks->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_Remarks" class="billing_refund_voucher_Remarks">
<span<?php echo $billing_refund_voucher_delete->Remarks->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
		<td <?php echo $billing_refund_voucher_delete->SeectPaymentMode->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_SeectPaymentMode" class="billing_refund_voucher_SeectPaymentMode">
<span<?php echo $billing_refund_voucher_delete->SeectPaymentMode->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->SeectPaymentMode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->PaidAmount->Visible) { // PaidAmount ?>
		<td <?php echo $billing_refund_voucher_delete->PaidAmount->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_PaidAmount" class="billing_refund_voucher_PaidAmount">
<span<?php echo $billing_refund_voucher_delete->PaidAmount->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->PaidAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->Currency->Visible) { // Currency ?>
		<td <?php echo $billing_refund_voucher_delete->Currency->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_Currency" class="billing_refund_voucher_Currency">
<span<?php echo $billing_refund_voucher_delete->Currency->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->Currency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->CardNumber->Visible) { // CardNumber ?>
		<td <?php echo $billing_refund_voucher_delete->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_CardNumber" class="billing_refund_voucher_CardNumber">
<span<?php echo $billing_refund_voucher_delete->CardNumber->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->CardNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->BankName->Visible) { // BankName ?>
		<td <?php echo $billing_refund_voucher_delete->BankName->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_BankName" class="billing_refund_voucher_BankName">
<span<?php echo $billing_refund_voucher_delete->BankName->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $billing_refund_voucher_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_HospID" class="billing_refund_voucher_HospID">
<span<?php echo $billing_refund_voucher_delete->HospID->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->Reception->Visible) { // Reception ?>
		<td <?php echo $billing_refund_voucher_delete->Reception->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_Reception" class="billing_refund_voucher_Reception">
<span<?php echo $billing_refund_voucher_delete->Reception->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->Reception->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->mrnno->Visible) { // mrnno ?>
		<td <?php echo $billing_refund_voucher_delete->mrnno->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_mrnno" class="billing_refund_voucher_mrnno">
<span<?php echo $billing_refund_voucher_delete->mrnno->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_refund_voucher_delete->GetUserName->Visible) { // GetUserName ?>
		<td <?php echo $billing_refund_voucher_delete->GetUserName->cellAttributes() ?>>
<span id="el<?php echo $billing_refund_voucher_delete->RowCount ?>_billing_refund_voucher_GetUserName" class="billing_refund_voucher_GetUserName">
<span<?php echo $billing_refund_voucher_delete->GetUserName->viewAttributes() ?>><?php echo $billing_refund_voucher_delete->GetUserName->getViewValue() ?></span>
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
$billing_refund_voucher_delete->terminate();
?>
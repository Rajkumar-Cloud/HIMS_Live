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
$pharmacy_billing_voucher_delete = new pharmacy_billing_voucher_delete();

// Run the page
$pharmacy_billing_voucher_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_billing_voucher_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacy_billing_voucherdelete = currentForm = new ew.Form("fpharmacy_billing_voucherdelete", "delete");

// Form_CustomValidate event
fpharmacy_billing_voucherdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_billing_voucherdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_billing_voucherdelete.lists["x_ModeofPayment"] = <?php echo $pharmacy_billing_voucher_delete->ModeofPayment->Lookup->toClientList() ?>;
fpharmacy_billing_voucherdelete.lists["x_ModeofPayment"].options = <?php echo JsonEncode($pharmacy_billing_voucher_delete->ModeofPayment->lookupOptions()) ?>;
fpharmacy_billing_voucherdelete.lists["x_CId"] = <?php echo $pharmacy_billing_voucher_delete->CId->Lookup->toClientList() ?>;
fpharmacy_billing_voucherdelete.lists["x_CId"].options = <?php echo JsonEncode($pharmacy_billing_voucher_delete->CId->lookupOptions()) ?>;
fpharmacy_billing_voucherdelete.lists["x_ReportHeader[]"] = <?php echo $pharmacy_billing_voucher_delete->ReportHeader->Lookup->toClientList() ?>;
fpharmacy_billing_voucherdelete.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($pharmacy_billing_voucher_delete->ReportHeader->options(FALSE, TRUE)) ?>;
fpharmacy_billing_voucherdelete.lists["x_CardType"] = <?php echo $pharmacy_billing_voucher_delete->CardType->Lookup->toClientList() ?>;
fpharmacy_billing_voucherdelete.lists["x_CardType"].options = <?php echo JsonEncode($pharmacy_billing_voucher_delete->CardType->options(FALSE, TRUE)) ?>;
fpharmacy_billing_voucherdelete.lists["x_BillType"] = <?php echo $pharmacy_billing_voucher_delete->BillType->Lookup->toClientList() ?>;
fpharmacy_billing_voucherdelete.lists["x_BillType"].options = <?php echo JsonEncode($pharmacy_billing_voucher_delete->BillType->options(FALSE, TRUE)) ?>;
fpharmacy_billing_voucherdelete.lists["x_PartialSave[]"] = <?php echo $pharmacy_billing_voucher_delete->PartialSave->Lookup->toClientList() ?>;
fpharmacy_billing_voucherdelete.lists["x_PartialSave[]"].options = <?php echo JsonEncode($pharmacy_billing_voucher_delete->PartialSave->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_billing_voucher_delete->showPageHeader(); ?>
<?php
$pharmacy_billing_voucher_delete->showMessage();
?>
<form name="fpharmacy_billing_voucherdelete" id="fpharmacy_billing_voucherdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_billing_voucher_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_billing_voucher_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_voucher">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_billing_voucher_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_billing_voucher->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_billing_voucher->id->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_id" class="pharmacy_billing_voucher_id"><?php echo $pharmacy_billing_voucher->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->BillNumber->Visible) { // BillNumber ?>
		<th class="<?php echo $pharmacy_billing_voucher->BillNumber->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_BillNumber" class="pharmacy_billing_voucher_BillNumber"><?php echo $pharmacy_billing_voucher->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $pharmacy_billing_voucher->PatientId->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_PatientId" class="pharmacy_billing_voucher_PatientId"><?php echo $pharmacy_billing_voucher->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $pharmacy_billing_voucher->PatientName->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_PatientName" class="pharmacy_billing_voucher_PatientName"><?php echo $pharmacy_billing_voucher->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Mobile->Visible) { // Mobile ?>
		<th class="<?php echo $pharmacy_billing_voucher->Mobile->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_Mobile" class="pharmacy_billing_voucher_Mobile"><?php echo $pharmacy_billing_voucher->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $pharmacy_billing_voucher->mrnno->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_mrnno" class="pharmacy_billing_voucher_mrnno"><?php echo $pharmacy_billing_voucher->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->IP_OP->Visible) { // IP_OP ?>
		<th class="<?php echo $pharmacy_billing_voucher->IP_OP->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_IP_OP" class="pharmacy_billing_voucher_IP_OP"><?php echo $pharmacy_billing_voucher->IP_OP->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Doctor->Visible) { // Doctor ?>
		<th class="<?php echo $pharmacy_billing_voucher->Doctor->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_Doctor" class="pharmacy_billing_voucher_Doctor"><?php echo $pharmacy_billing_voucher->Doctor->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<th class="<?php echo $pharmacy_billing_voucher->ModeofPayment->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_ModeofPayment" class="pharmacy_billing_voucher_ModeofPayment"><?php echo $pharmacy_billing_voucher->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Amount->Visible) { // Amount ?>
		<th class="<?php echo $pharmacy_billing_voucher->Amount->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_Amount" class="pharmacy_billing_voucher_Amount"><?php echo $pharmacy_billing_voucher->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->AnyDues->Visible) { // AnyDues ?>
		<th class="<?php echo $pharmacy_billing_voucher->AnyDues->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_AnyDues" class="pharmacy_billing_voucher_AnyDues"><?php echo $pharmacy_billing_voucher->AnyDues->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->createdby->Visible) { // createdby ?>
		<th class="<?php echo $pharmacy_billing_voucher->createdby->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_createdby" class="pharmacy_billing_voucher_createdby"><?php echo $pharmacy_billing_voucher->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $pharmacy_billing_voucher->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_createddatetime" class="pharmacy_billing_voucher_createddatetime"><?php echo $pharmacy_billing_voucher->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $pharmacy_billing_voucher->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_modifiedby" class="pharmacy_billing_voucher_modifiedby"><?php echo $pharmacy_billing_voucher->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $pharmacy_billing_voucher->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_modifieddatetime" class="pharmacy_billing_voucher_modifieddatetime"><?php echo $pharmacy_billing_voucher->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
		<th class="<?php echo $pharmacy_billing_voucher->RealizationAmount->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_RealizationAmount" class="pharmacy_billing_voucher_RealizationAmount"><?php echo $pharmacy_billing_voucher->RealizationAmount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->CId->Visible) { // CId ?>
		<th class="<?php echo $pharmacy_billing_voucher->CId->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_CId" class="pharmacy_billing_voucher_CId"><?php echo $pharmacy_billing_voucher->CId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $pharmacy_billing_voucher->PartnerName->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_PartnerName" class="pharmacy_billing_voucher_PartnerName"><?php echo $pharmacy_billing_voucher->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->CardNumber->Visible) { // CardNumber ?>
		<th class="<?php echo $pharmacy_billing_voucher->CardNumber->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_CardNumber" class="pharmacy_billing_voucher_CardNumber"><?php echo $pharmacy_billing_voucher->CardNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->BillStatus->Visible) { // BillStatus ?>
		<th class="<?php echo $pharmacy_billing_voucher->BillStatus->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_BillStatus" class="pharmacy_billing_voucher_BillStatus"><?php echo $pharmacy_billing_voucher->BillStatus->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->ReportHeader->Visible) { // ReportHeader ?>
		<th class="<?php echo $pharmacy_billing_voucher->ReportHeader->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_ReportHeader" class="pharmacy_billing_voucher_ReportHeader"><?php echo $pharmacy_billing_voucher->ReportHeader->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PharID->Visible) { // PharID ?>
		<th class="<?php echo $pharmacy_billing_voucher->PharID->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_PharID" class="pharmacy_billing_voucher_PharID"><?php echo $pharmacy_billing_voucher->PharID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->UserName->Visible) { // UserName ?>
		<th class="<?php echo $pharmacy_billing_voucher->UserName->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_UserName" class="pharmacy_billing_voucher_UserName"><?php echo $pharmacy_billing_voucher->UserName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->CardType->Visible) { // CardType ?>
		<th class="<?php echo $pharmacy_billing_voucher->CardType->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_CardType" class="pharmacy_billing_voucher_CardType"><?php echo $pharmacy_billing_voucher->CardType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
		<th class="<?php echo $pharmacy_billing_voucher->DiscountAmount->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_DiscountAmount" class="pharmacy_billing_voucher_DiscountAmount"><?php echo $pharmacy_billing_voucher->DiscountAmount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->ApprovalNumber->Visible) { // ApprovalNumber ?>
		<th class="<?php echo $pharmacy_billing_voucher->ApprovalNumber->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_ApprovalNumber" class="pharmacy_billing_voucher_ApprovalNumber"><?php echo $pharmacy_billing_voucher->ApprovalNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Cash->Visible) { // Cash ?>
		<th class="<?php echo $pharmacy_billing_voucher->Cash->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_Cash" class="pharmacy_billing_voucher_Cash"><?php echo $pharmacy_billing_voucher->Cash->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Card->Visible) { // Card ?>
		<th class="<?php echo $pharmacy_billing_voucher->Card->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_Card" class="pharmacy_billing_voucher_Card"><?php echo $pharmacy_billing_voucher->Card->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->BillType->Visible) { // BillType ?>
		<th class="<?php echo $pharmacy_billing_voucher->BillType->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_BillType" class="pharmacy_billing_voucher_BillType"><?php echo $pharmacy_billing_voucher->BillType->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PartialSave->Visible) { // PartialSave ?>
		<th class="<?php echo $pharmacy_billing_voucher->PartialSave->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_PartialSave" class="pharmacy_billing_voucher_PartialSave"><?php echo $pharmacy_billing_voucher->PartialSave->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PatientGST->Visible) { // PatientGST ?>
		<th class="<?php echo $pharmacy_billing_voucher->PatientGST->headerCellClass() ?>"><span id="elh_pharmacy_billing_voucher_PatientGST" class="pharmacy_billing_voucher_PatientGST"><?php echo $pharmacy_billing_voucher->PatientGST->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_billing_voucher_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_billing_voucher_delete->Recordset->EOF) {
	$pharmacy_billing_voucher_delete->RecCnt++;
	$pharmacy_billing_voucher_delete->RowCnt++;

	// Set row properties
	$pharmacy_billing_voucher->resetAttributes();
	$pharmacy_billing_voucher->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_billing_voucher_delete->loadRowValues($pharmacy_billing_voucher_delete->Recordset);

	// Render row
	$pharmacy_billing_voucher_delete->renderRow();
?>
	<tr<?php echo $pharmacy_billing_voucher->rowAttributes() ?>>
<?php if ($pharmacy_billing_voucher->id->Visible) { // id ?>
		<td<?php echo $pharmacy_billing_voucher->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_id" class="pharmacy_billing_voucher_id">
<span<?php echo $pharmacy_billing_voucher->id->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->BillNumber->Visible) { // BillNumber ?>
		<td<?php echo $pharmacy_billing_voucher->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_BillNumber" class="pharmacy_billing_voucher_BillNumber">
<span<?php echo $pharmacy_billing_voucher->BillNumber->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PatientId->Visible) { // PatientId ?>
		<td<?php echo $pharmacy_billing_voucher->PatientId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_PatientId" class="pharmacy_billing_voucher_PatientId">
<span<?php echo $pharmacy_billing_voucher->PatientId->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PatientName->Visible) { // PatientName ?>
		<td<?php echo $pharmacy_billing_voucher->PatientName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_PatientName" class="pharmacy_billing_voucher_PatientName">
<span<?php echo $pharmacy_billing_voucher->PatientName->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Mobile->Visible) { // Mobile ?>
		<td<?php echo $pharmacy_billing_voucher->Mobile->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_Mobile" class="pharmacy_billing_voucher_Mobile">
<span<?php echo $pharmacy_billing_voucher->Mobile->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->mrnno->Visible) { // mrnno ?>
		<td<?php echo $pharmacy_billing_voucher->mrnno->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_mrnno" class="pharmacy_billing_voucher_mrnno">
<span<?php echo $pharmacy_billing_voucher->mrnno->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->IP_OP->Visible) { // IP_OP ?>
		<td<?php echo $pharmacy_billing_voucher->IP_OP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_IP_OP" class="pharmacy_billing_voucher_IP_OP">
<span<?php echo $pharmacy_billing_voucher->IP_OP->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->IP_OP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Doctor->Visible) { // Doctor ?>
		<td<?php echo $pharmacy_billing_voucher->Doctor->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_Doctor" class="pharmacy_billing_voucher_Doctor">
<span<?php echo $pharmacy_billing_voucher->Doctor->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->Doctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<td<?php echo $pharmacy_billing_voucher->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_ModeofPayment" class="pharmacy_billing_voucher_ModeofPayment">
<span<?php echo $pharmacy_billing_voucher->ModeofPayment->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Amount->Visible) { // Amount ?>
		<td<?php echo $pharmacy_billing_voucher->Amount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_Amount" class="pharmacy_billing_voucher_Amount">
<span<?php echo $pharmacy_billing_voucher->Amount->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->AnyDues->Visible) { // AnyDues ?>
		<td<?php echo $pharmacy_billing_voucher->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_AnyDues" class="pharmacy_billing_voucher_AnyDues">
<span<?php echo $pharmacy_billing_voucher->AnyDues->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->AnyDues->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->createdby->Visible) { // createdby ?>
		<td<?php echo $pharmacy_billing_voucher->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_createdby" class="pharmacy_billing_voucher_createdby">
<span<?php echo $pharmacy_billing_voucher->createdby->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $pharmacy_billing_voucher->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_createddatetime" class="pharmacy_billing_voucher_createddatetime">
<span<?php echo $pharmacy_billing_voucher->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $pharmacy_billing_voucher->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_modifiedby" class="pharmacy_billing_voucher_modifiedby">
<span<?php echo $pharmacy_billing_voucher->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $pharmacy_billing_voucher->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_modifieddatetime" class="pharmacy_billing_voucher_modifieddatetime">
<span<?php echo $pharmacy_billing_voucher->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->RealizationAmount->Visible) { // RealizationAmount ?>
		<td<?php echo $pharmacy_billing_voucher->RealizationAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_RealizationAmount" class="pharmacy_billing_voucher_RealizationAmount">
<span<?php echo $pharmacy_billing_voucher->RealizationAmount->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->RealizationAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->CId->Visible) { // CId ?>
		<td<?php echo $pharmacy_billing_voucher->CId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_CId" class="pharmacy_billing_voucher_CId">
<span<?php echo $pharmacy_billing_voucher->CId->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->CId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PartnerName->Visible) { // PartnerName ?>
		<td<?php echo $pharmacy_billing_voucher->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_PartnerName" class="pharmacy_billing_voucher_PartnerName">
<span<?php echo $pharmacy_billing_voucher->PartnerName->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->CardNumber->Visible) { // CardNumber ?>
		<td<?php echo $pharmacy_billing_voucher->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_CardNumber" class="pharmacy_billing_voucher_CardNumber">
<span<?php echo $pharmacy_billing_voucher->CardNumber->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->CardNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->BillStatus->Visible) { // BillStatus ?>
		<td<?php echo $pharmacy_billing_voucher->BillStatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_BillStatus" class="pharmacy_billing_voucher_BillStatus">
<span<?php echo $pharmacy_billing_voucher->BillStatus->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->BillStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->ReportHeader->Visible) { // ReportHeader ?>
		<td<?php echo $pharmacy_billing_voucher->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_ReportHeader" class="pharmacy_billing_voucher_ReportHeader">
<span<?php echo $pharmacy_billing_voucher->ReportHeader->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->ReportHeader->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PharID->Visible) { // PharID ?>
		<td<?php echo $pharmacy_billing_voucher->PharID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_PharID" class="pharmacy_billing_voucher_PharID">
<span<?php echo $pharmacy_billing_voucher->PharID->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->PharID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->UserName->Visible) { // UserName ?>
		<td<?php echo $pharmacy_billing_voucher->UserName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_UserName" class="pharmacy_billing_voucher_UserName">
<span<?php echo $pharmacy_billing_voucher->UserName->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->UserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->CardType->Visible) { // CardType ?>
		<td<?php echo $pharmacy_billing_voucher->CardType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_CardType" class="pharmacy_billing_voucher_CardType">
<span<?php echo $pharmacy_billing_voucher->CardType->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->CardType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
		<td<?php echo $pharmacy_billing_voucher->DiscountAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_DiscountAmount" class="pharmacy_billing_voucher_DiscountAmount">
<span<?php echo $pharmacy_billing_voucher->DiscountAmount->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->DiscountAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->ApprovalNumber->Visible) { // ApprovalNumber ?>
		<td<?php echo $pharmacy_billing_voucher->ApprovalNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_ApprovalNumber" class="pharmacy_billing_voucher_ApprovalNumber">
<span<?php echo $pharmacy_billing_voucher->ApprovalNumber->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->ApprovalNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Cash->Visible) { // Cash ?>
		<td<?php echo $pharmacy_billing_voucher->Cash->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_Cash" class="pharmacy_billing_voucher_Cash">
<span<?php echo $pharmacy_billing_voucher->Cash->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->Cash->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->Card->Visible) { // Card ?>
		<td<?php echo $pharmacy_billing_voucher->Card->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_Card" class="pharmacy_billing_voucher_Card">
<span<?php echo $pharmacy_billing_voucher->Card->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->Card->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->BillType->Visible) { // BillType ?>
		<td<?php echo $pharmacy_billing_voucher->BillType->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_BillType" class="pharmacy_billing_voucher_BillType">
<span<?php echo $pharmacy_billing_voucher->BillType->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->BillType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PartialSave->Visible) { // PartialSave ?>
		<td<?php echo $pharmacy_billing_voucher->PartialSave->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_PartialSave" class="pharmacy_billing_voucher_PartialSave">
<span<?php echo $pharmacy_billing_voucher->PartialSave->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->PartialSave->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_voucher->PatientGST->Visible) { // PatientGST ?>
		<td<?php echo $pharmacy_billing_voucher->PatientGST->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_voucher_delete->RowCnt ?>_pharmacy_billing_voucher_PatientGST" class="pharmacy_billing_voucher_PatientGST">
<span<?php echo $pharmacy_billing_voucher->PatientGST->viewAttributes() ?>>
<?php echo $pharmacy_billing_voucher->PatientGST->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_billing_voucher_delete->Recordset->moveNext();
}
$pharmacy_billing_voucher_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_billing_voucher_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_billing_voucher_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_billing_voucher_delete->terminate();
?>
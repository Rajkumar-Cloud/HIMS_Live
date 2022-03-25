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
$pharmacy_billing_return_delete = new pharmacy_billing_return_delete();

// Run the page
$pharmacy_billing_return_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_billing_return_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacy_billing_returndelete = currentForm = new ew.Form("fpharmacy_billing_returndelete", "delete");

// Form_CustomValidate event
fpharmacy_billing_returndelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_billing_returndelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_billing_returndelete.lists["x_ModeofPayment"] = <?php echo $pharmacy_billing_return_delete->ModeofPayment->Lookup->toClientList() ?>;
fpharmacy_billing_returndelete.lists["x_ModeofPayment"].options = <?php echo JsonEncode($pharmacy_billing_return_delete->ModeofPayment->lookupOptions()) ?>;
fpharmacy_billing_returndelete.lists["x_CId"] = <?php echo $pharmacy_billing_return_delete->CId->Lookup->toClientList() ?>;
fpharmacy_billing_returndelete.lists["x_CId"].options = <?php echo JsonEncode($pharmacy_billing_return_delete->CId->lookupOptions()) ?>;
fpharmacy_billing_returndelete.lists["x_ReportHeader[]"] = <?php echo $pharmacy_billing_return_delete->ReportHeader->Lookup->toClientList() ?>;
fpharmacy_billing_returndelete.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($pharmacy_billing_return_delete->ReportHeader->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_billing_return_delete->showPageHeader(); ?>
<?php
$pharmacy_billing_return_delete->showMessage();
?>
<form name="fpharmacy_billing_returndelete" id="fpharmacy_billing_returndelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_billing_return_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_billing_return_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_return">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_billing_return_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_billing_return->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_billing_return->id->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_id" class="pharmacy_billing_return_id"><?php echo $pharmacy_billing_return->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $pharmacy_billing_return->PatientId->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_PatientId" class="pharmacy_billing_return_PatientId"><?php echo $pharmacy_billing_return->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $pharmacy_billing_return->mrnno->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_mrnno" class="pharmacy_billing_return_mrnno"><?php echo $pharmacy_billing_return->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $pharmacy_billing_return->PatientName->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_PatientName" class="pharmacy_billing_return_PatientName"><?php echo $pharmacy_billing_return->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->Mobile->Visible) { // Mobile ?>
		<th class="<?php echo $pharmacy_billing_return->Mobile->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_Mobile" class="pharmacy_billing_return_Mobile"><?php echo $pharmacy_billing_return->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->IP_OP->Visible) { // IP_OP ?>
		<th class="<?php echo $pharmacy_billing_return->IP_OP->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_IP_OP" class="pharmacy_billing_return_IP_OP"><?php echo $pharmacy_billing_return->IP_OP->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->Doctor->Visible) { // Doctor ?>
		<th class="<?php echo $pharmacy_billing_return->Doctor->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_Doctor" class="pharmacy_billing_return_Doctor"><?php echo $pharmacy_billing_return->Doctor->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->voucher_type->Visible) { // voucher_type ?>
		<th class="<?php echo $pharmacy_billing_return->voucher_type->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_voucher_type" class="pharmacy_billing_return_voucher_type"><?php echo $pharmacy_billing_return->voucher_type->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->ModeofPayment->Visible) { // ModeofPayment ?>
		<th class="<?php echo $pharmacy_billing_return->ModeofPayment->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_ModeofPayment" class="pharmacy_billing_return_ModeofPayment"><?php echo $pharmacy_billing_return->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->Amount->Visible) { // Amount ?>
		<th class="<?php echo $pharmacy_billing_return->Amount->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_Amount" class="pharmacy_billing_return_Amount"><?php echo $pharmacy_billing_return->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->AnyDues->Visible) { // AnyDues ?>
		<th class="<?php echo $pharmacy_billing_return->AnyDues->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_AnyDues" class="pharmacy_billing_return_AnyDues"><?php echo $pharmacy_billing_return->AnyDues->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->createdby->Visible) { // createdby ?>
		<th class="<?php echo $pharmacy_billing_return->createdby->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_createdby" class="pharmacy_billing_return_createdby"><?php echo $pharmacy_billing_return->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $pharmacy_billing_return->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_createddatetime" class="pharmacy_billing_return_createddatetime"><?php echo $pharmacy_billing_return->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $pharmacy_billing_return->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_modifiedby" class="pharmacy_billing_return_modifiedby"><?php echo $pharmacy_billing_return->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $pharmacy_billing_return->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_modifieddatetime" class="pharmacy_billing_return_modifieddatetime"><?php echo $pharmacy_billing_return->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->RealizationAmount->Visible) { // RealizationAmount ?>
		<th class="<?php echo $pharmacy_billing_return->RealizationAmount->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_RealizationAmount" class="pharmacy_billing_return_RealizationAmount"><?php echo $pharmacy_billing_return->RealizationAmount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->CId->Visible) { // CId ?>
		<th class="<?php echo $pharmacy_billing_return->CId->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_CId" class="pharmacy_billing_return_CId"><?php echo $pharmacy_billing_return->CId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $pharmacy_billing_return->PartnerName->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_PartnerName" class="pharmacy_billing_return_PartnerName"><?php echo $pharmacy_billing_return->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->BillNumber->Visible) { // BillNumber ?>
		<th class="<?php echo $pharmacy_billing_return->BillNumber->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_BillNumber" class="pharmacy_billing_return_BillNumber"><?php echo $pharmacy_billing_return->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->CardNumber->Visible) { // CardNumber ?>
		<th class="<?php echo $pharmacy_billing_return->CardNumber->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_CardNumber" class="pharmacy_billing_return_CardNumber"><?php echo $pharmacy_billing_return->CardNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->BillStatus->Visible) { // BillStatus ?>
		<th class="<?php echo $pharmacy_billing_return->BillStatus->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_BillStatus" class="pharmacy_billing_return_BillStatus"><?php echo $pharmacy_billing_return->BillStatus->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->ReportHeader->Visible) { // ReportHeader ?>
		<th class="<?php echo $pharmacy_billing_return->ReportHeader->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_ReportHeader" class="pharmacy_billing_return_ReportHeader"><?php echo $pharmacy_billing_return->ReportHeader->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_return->PharID->Visible) { // PharID ?>
		<th class="<?php echo $pharmacy_billing_return->PharID->headerCellClass() ?>"><span id="elh_pharmacy_billing_return_PharID" class="pharmacy_billing_return_PharID"><?php echo $pharmacy_billing_return->PharID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_billing_return_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_billing_return_delete->Recordset->EOF) {
	$pharmacy_billing_return_delete->RecCnt++;
	$pharmacy_billing_return_delete->RowCnt++;

	// Set row properties
	$pharmacy_billing_return->resetAttributes();
	$pharmacy_billing_return->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_billing_return_delete->loadRowValues($pharmacy_billing_return_delete->Recordset);

	// Render row
	$pharmacy_billing_return_delete->renderRow();
?>
	<tr<?php echo $pharmacy_billing_return->rowAttributes() ?>>
<?php if ($pharmacy_billing_return->id->Visible) { // id ?>
		<td<?php echo $pharmacy_billing_return->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_id" class="pharmacy_billing_return_id">
<span<?php echo $pharmacy_billing_return->id->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->PatientId->Visible) { // PatientId ?>
		<td<?php echo $pharmacy_billing_return->PatientId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_PatientId" class="pharmacy_billing_return_PatientId">
<span<?php echo $pharmacy_billing_return->PatientId->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->mrnno->Visible) { // mrnno ?>
		<td<?php echo $pharmacy_billing_return->mrnno->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_mrnno" class="pharmacy_billing_return_mrnno">
<span<?php echo $pharmacy_billing_return->mrnno->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->PatientName->Visible) { // PatientName ?>
		<td<?php echo $pharmacy_billing_return->PatientName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_PatientName" class="pharmacy_billing_return_PatientName">
<span<?php echo $pharmacy_billing_return->PatientName->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->Mobile->Visible) { // Mobile ?>
		<td<?php echo $pharmacy_billing_return->Mobile->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_Mobile" class="pharmacy_billing_return_Mobile">
<span<?php echo $pharmacy_billing_return->Mobile->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->IP_OP->Visible) { // IP_OP ?>
		<td<?php echo $pharmacy_billing_return->IP_OP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_IP_OP" class="pharmacy_billing_return_IP_OP">
<span<?php echo $pharmacy_billing_return->IP_OP->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->IP_OP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->Doctor->Visible) { // Doctor ?>
		<td<?php echo $pharmacy_billing_return->Doctor->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_Doctor" class="pharmacy_billing_return_Doctor">
<span<?php echo $pharmacy_billing_return->Doctor->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->Doctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->voucher_type->Visible) { // voucher_type ?>
		<td<?php echo $pharmacy_billing_return->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_voucher_type" class="pharmacy_billing_return_voucher_type">
<span<?php echo $pharmacy_billing_return->voucher_type->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->voucher_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->ModeofPayment->Visible) { // ModeofPayment ?>
		<td<?php echo $pharmacy_billing_return->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_ModeofPayment" class="pharmacy_billing_return_ModeofPayment">
<span<?php echo $pharmacy_billing_return->ModeofPayment->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->Amount->Visible) { // Amount ?>
		<td<?php echo $pharmacy_billing_return->Amount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_Amount" class="pharmacy_billing_return_Amount">
<span<?php echo $pharmacy_billing_return->Amount->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->AnyDues->Visible) { // AnyDues ?>
		<td<?php echo $pharmacy_billing_return->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_AnyDues" class="pharmacy_billing_return_AnyDues">
<span<?php echo $pharmacy_billing_return->AnyDues->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->AnyDues->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->createdby->Visible) { // createdby ?>
		<td<?php echo $pharmacy_billing_return->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_createdby" class="pharmacy_billing_return_createdby">
<span<?php echo $pharmacy_billing_return->createdby->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $pharmacy_billing_return->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_createddatetime" class="pharmacy_billing_return_createddatetime">
<span<?php echo $pharmacy_billing_return->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $pharmacy_billing_return->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_modifiedby" class="pharmacy_billing_return_modifiedby">
<span<?php echo $pharmacy_billing_return->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $pharmacy_billing_return->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_modifieddatetime" class="pharmacy_billing_return_modifieddatetime">
<span<?php echo $pharmacy_billing_return->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->RealizationAmount->Visible) { // RealizationAmount ?>
		<td<?php echo $pharmacy_billing_return->RealizationAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_RealizationAmount" class="pharmacy_billing_return_RealizationAmount">
<span<?php echo $pharmacy_billing_return->RealizationAmount->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->RealizationAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->CId->Visible) { // CId ?>
		<td<?php echo $pharmacy_billing_return->CId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_CId" class="pharmacy_billing_return_CId">
<span<?php echo $pharmacy_billing_return->CId->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->CId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->PartnerName->Visible) { // PartnerName ?>
		<td<?php echo $pharmacy_billing_return->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_PartnerName" class="pharmacy_billing_return_PartnerName">
<span<?php echo $pharmacy_billing_return->PartnerName->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->BillNumber->Visible) { // BillNumber ?>
		<td<?php echo $pharmacy_billing_return->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_BillNumber" class="pharmacy_billing_return_BillNumber">
<span<?php echo $pharmacy_billing_return->BillNumber->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->CardNumber->Visible) { // CardNumber ?>
		<td<?php echo $pharmacy_billing_return->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_CardNumber" class="pharmacy_billing_return_CardNumber">
<span<?php echo $pharmacy_billing_return->CardNumber->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->CardNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->BillStatus->Visible) { // BillStatus ?>
		<td<?php echo $pharmacy_billing_return->BillStatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_BillStatus" class="pharmacy_billing_return_BillStatus">
<span<?php echo $pharmacy_billing_return->BillStatus->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->BillStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->ReportHeader->Visible) { // ReportHeader ?>
		<td<?php echo $pharmacy_billing_return->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_ReportHeader" class="pharmacy_billing_return_ReportHeader">
<span<?php echo $pharmacy_billing_return->ReportHeader->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->ReportHeader->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_return->PharID->Visible) { // PharID ?>
		<td<?php echo $pharmacy_billing_return->PharID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_return_delete->RowCnt ?>_pharmacy_billing_return_PharID" class="pharmacy_billing_return_PharID">
<span<?php echo $pharmacy_billing_return->PharID->viewAttributes() ?>>
<?php echo $pharmacy_billing_return->PharID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_billing_return_delete->Recordset->moveNext();
}
$pharmacy_billing_return_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_billing_return_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_billing_return_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_billing_return_delete->terminate();
?>
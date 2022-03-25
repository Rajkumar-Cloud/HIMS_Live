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
$pharmacy_billing_issue_delete = new pharmacy_billing_issue_delete();

// Run the page
$pharmacy_billing_issue_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_billing_issue_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacy_billing_issuedelete = currentForm = new ew.Form("fpharmacy_billing_issuedelete", "delete");

// Form_CustomValidate event
fpharmacy_billing_issuedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_billing_issuedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_billing_issuedelete.lists["x_ModeofPayment"] = <?php echo $pharmacy_billing_issue_delete->ModeofPayment->Lookup->toClientList() ?>;
fpharmacy_billing_issuedelete.lists["x_ModeofPayment"].options = <?php echo JsonEncode($pharmacy_billing_issue_delete->ModeofPayment->options(FALSE, TRUE)) ?>;
fpharmacy_billing_issuedelete.lists["x_CId"] = <?php echo $pharmacy_billing_issue_delete->CId->Lookup->toClientList() ?>;
fpharmacy_billing_issuedelete.lists["x_CId"].options = <?php echo JsonEncode($pharmacy_billing_issue_delete->CId->lookupOptions()) ?>;
fpharmacy_billing_issuedelete.lists["x_ReportHeader[]"] = <?php echo $pharmacy_billing_issue_delete->ReportHeader->Lookup->toClientList() ?>;
fpharmacy_billing_issuedelete.lists["x_ReportHeader[]"].options = <?php echo JsonEncode($pharmacy_billing_issue_delete->ReportHeader->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_billing_issue_delete->showPageHeader(); ?>
<?php
$pharmacy_billing_issue_delete->showMessage();
?>
<form name="fpharmacy_billing_issuedelete" id="fpharmacy_billing_issuedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_billing_issue_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_billing_issue_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_issue">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_billing_issue_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_billing_issue->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_billing_issue->id->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_id" class="pharmacy_billing_issue_id"><?php echo $pharmacy_billing_issue->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $pharmacy_billing_issue->PatientId->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_PatientId" class="pharmacy_billing_issue_PatientId"><?php echo $pharmacy_billing_issue->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->mrnno->Visible) { // mrnno ?>
		<th class="<?php echo $pharmacy_billing_issue->mrnno->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_mrnno" class="pharmacy_billing_issue_mrnno"><?php echo $pharmacy_billing_issue->mrnno->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $pharmacy_billing_issue->PatientName->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_PatientName" class="pharmacy_billing_issue_PatientName"><?php echo $pharmacy_billing_issue->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->Mobile->Visible) { // Mobile ?>
		<th class="<?php echo $pharmacy_billing_issue->Mobile->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_Mobile" class="pharmacy_billing_issue_Mobile"><?php echo $pharmacy_billing_issue->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->IP_OP->Visible) { // IP_OP ?>
		<th class="<?php echo $pharmacy_billing_issue->IP_OP->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_IP_OP" class="pharmacy_billing_issue_IP_OP"><?php echo $pharmacy_billing_issue->IP_OP->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->Doctor->Visible) { // Doctor ?>
		<th class="<?php echo $pharmacy_billing_issue->Doctor->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_Doctor" class="pharmacy_billing_issue_Doctor"><?php echo $pharmacy_billing_issue->Doctor->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->voucher_type->Visible) { // voucher_type ?>
		<th class="<?php echo $pharmacy_billing_issue->voucher_type->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_voucher_type" class="pharmacy_billing_issue_voucher_type"><?php echo $pharmacy_billing_issue->voucher_type->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->ModeofPayment->Visible) { // ModeofPayment ?>
		<th class="<?php echo $pharmacy_billing_issue->ModeofPayment->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_ModeofPayment" class="pharmacy_billing_issue_ModeofPayment"><?php echo $pharmacy_billing_issue->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->Amount->Visible) { // Amount ?>
		<th class="<?php echo $pharmacy_billing_issue->Amount->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_Amount" class="pharmacy_billing_issue_Amount"><?php echo $pharmacy_billing_issue->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->AnyDues->Visible) { // AnyDues ?>
		<th class="<?php echo $pharmacy_billing_issue->AnyDues->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_AnyDues" class="pharmacy_billing_issue_AnyDues"><?php echo $pharmacy_billing_issue->AnyDues->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->createdby->Visible) { // createdby ?>
		<th class="<?php echo $pharmacy_billing_issue->createdby->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_createdby" class="pharmacy_billing_issue_createdby"><?php echo $pharmacy_billing_issue->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $pharmacy_billing_issue->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_createddatetime" class="pharmacy_billing_issue_createddatetime"><?php echo $pharmacy_billing_issue->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $pharmacy_billing_issue->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_modifiedby" class="pharmacy_billing_issue_modifiedby"><?php echo $pharmacy_billing_issue->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $pharmacy_billing_issue->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_modifieddatetime" class="pharmacy_billing_issue_modifieddatetime"><?php echo $pharmacy_billing_issue->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->RealizationAmount->Visible) { // RealizationAmount ?>
		<th class="<?php echo $pharmacy_billing_issue->RealizationAmount->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_RealizationAmount" class="pharmacy_billing_issue_RealizationAmount"><?php echo $pharmacy_billing_issue->RealizationAmount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->CId->Visible) { // CId ?>
		<th class="<?php echo $pharmacy_billing_issue->CId->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_CId" class="pharmacy_billing_issue_CId"><?php echo $pharmacy_billing_issue->CId->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->PartnerName->Visible) { // PartnerName ?>
		<th class="<?php echo $pharmacy_billing_issue->PartnerName->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_PartnerName" class="pharmacy_billing_issue_PartnerName"><?php echo $pharmacy_billing_issue->PartnerName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->BillNumber->Visible) { // BillNumber ?>
		<th class="<?php echo $pharmacy_billing_issue->BillNumber->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_BillNumber" class="pharmacy_billing_issue_BillNumber"><?php echo $pharmacy_billing_issue->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->CardNumber->Visible) { // CardNumber ?>
		<th class="<?php echo $pharmacy_billing_issue->CardNumber->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_CardNumber" class="pharmacy_billing_issue_CardNumber"><?php echo $pharmacy_billing_issue->CardNumber->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->BillStatus->Visible) { // BillStatus ?>
		<th class="<?php echo $pharmacy_billing_issue->BillStatus->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_BillStatus" class="pharmacy_billing_issue_BillStatus"><?php echo $pharmacy_billing_issue->BillStatus->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->ReportHeader->Visible) { // ReportHeader ?>
		<th class="<?php echo $pharmacy_billing_issue->ReportHeader->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_ReportHeader" class="pharmacy_billing_issue_ReportHeader"><?php echo $pharmacy_billing_issue->ReportHeader->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->PharID->Visible) { // PharID ?>
		<th class="<?php echo $pharmacy_billing_issue->PharID->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_PharID" class="pharmacy_billing_issue_PharID"><?php echo $pharmacy_billing_issue->PharID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_billing_issue->UserName->Visible) { // UserName ?>
		<th class="<?php echo $pharmacy_billing_issue->UserName->headerCellClass() ?>"><span id="elh_pharmacy_billing_issue_UserName" class="pharmacy_billing_issue_UserName"><?php echo $pharmacy_billing_issue->UserName->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_billing_issue_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_billing_issue_delete->Recordset->EOF) {
	$pharmacy_billing_issue_delete->RecCnt++;
	$pharmacy_billing_issue_delete->RowCnt++;

	// Set row properties
	$pharmacy_billing_issue->resetAttributes();
	$pharmacy_billing_issue->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_billing_issue_delete->loadRowValues($pharmacy_billing_issue_delete->Recordset);

	// Render row
	$pharmacy_billing_issue_delete->renderRow();
?>
	<tr<?php echo $pharmacy_billing_issue->rowAttributes() ?>>
<?php if ($pharmacy_billing_issue->id->Visible) { // id ?>
		<td<?php echo $pharmacy_billing_issue->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_id" class="pharmacy_billing_issue_id">
<span<?php echo $pharmacy_billing_issue->id->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->PatientId->Visible) { // PatientId ?>
		<td<?php echo $pharmacy_billing_issue->PatientId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_PatientId" class="pharmacy_billing_issue_PatientId">
<span<?php echo $pharmacy_billing_issue->PatientId->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->mrnno->Visible) { // mrnno ?>
		<td<?php echo $pharmacy_billing_issue->mrnno->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_mrnno" class="pharmacy_billing_issue_mrnno">
<span<?php echo $pharmacy_billing_issue->mrnno->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->mrnno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->PatientName->Visible) { // PatientName ?>
		<td<?php echo $pharmacy_billing_issue->PatientName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_PatientName" class="pharmacy_billing_issue_PatientName">
<span<?php echo $pharmacy_billing_issue->PatientName->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->Mobile->Visible) { // Mobile ?>
		<td<?php echo $pharmacy_billing_issue->Mobile->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_Mobile" class="pharmacy_billing_issue_Mobile">
<span<?php echo $pharmacy_billing_issue->Mobile->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->IP_OP->Visible) { // IP_OP ?>
		<td<?php echo $pharmacy_billing_issue->IP_OP->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_IP_OP" class="pharmacy_billing_issue_IP_OP">
<span<?php echo $pharmacy_billing_issue->IP_OP->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->IP_OP->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->Doctor->Visible) { // Doctor ?>
		<td<?php echo $pharmacy_billing_issue->Doctor->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_Doctor" class="pharmacy_billing_issue_Doctor">
<span<?php echo $pharmacy_billing_issue->Doctor->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->Doctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->voucher_type->Visible) { // voucher_type ?>
		<td<?php echo $pharmacy_billing_issue->voucher_type->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_voucher_type" class="pharmacy_billing_issue_voucher_type">
<span<?php echo $pharmacy_billing_issue->voucher_type->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->voucher_type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->ModeofPayment->Visible) { // ModeofPayment ?>
		<td<?php echo $pharmacy_billing_issue->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_ModeofPayment" class="pharmacy_billing_issue_ModeofPayment">
<span<?php echo $pharmacy_billing_issue->ModeofPayment->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->Amount->Visible) { // Amount ?>
		<td<?php echo $pharmacy_billing_issue->Amount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_Amount" class="pharmacy_billing_issue_Amount">
<span<?php echo $pharmacy_billing_issue->Amount->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->AnyDues->Visible) { // AnyDues ?>
		<td<?php echo $pharmacy_billing_issue->AnyDues->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_AnyDues" class="pharmacy_billing_issue_AnyDues">
<span<?php echo $pharmacy_billing_issue->AnyDues->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->AnyDues->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->createdby->Visible) { // createdby ?>
		<td<?php echo $pharmacy_billing_issue->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_createdby" class="pharmacy_billing_issue_createdby">
<span<?php echo $pharmacy_billing_issue->createdby->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $pharmacy_billing_issue->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_createddatetime" class="pharmacy_billing_issue_createddatetime">
<span<?php echo $pharmacy_billing_issue->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $pharmacy_billing_issue->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_modifiedby" class="pharmacy_billing_issue_modifiedby">
<span<?php echo $pharmacy_billing_issue->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $pharmacy_billing_issue->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_modifieddatetime" class="pharmacy_billing_issue_modifieddatetime">
<span<?php echo $pharmacy_billing_issue->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->RealizationAmount->Visible) { // RealizationAmount ?>
		<td<?php echo $pharmacy_billing_issue->RealizationAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_RealizationAmount" class="pharmacy_billing_issue_RealizationAmount">
<span<?php echo $pharmacy_billing_issue->RealizationAmount->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->RealizationAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->CId->Visible) { // CId ?>
		<td<?php echo $pharmacy_billing_issue->CId->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_CId" class="pharmacy_billing_issue_CId">
<span<?php echo $pharmacy_billing_issue->CId->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->CId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->PartnerName->Visible) { // PartnerName ?>
		<td<?php echo $pharmacy_billing_issue->PartnerName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_PartnerName" class="pharmacy_billing_issue_PartnerName">
<span<?php echo $pharmacy_billing_issue->PartnerName->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->PartnerName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->BillNumber->Visible) { // BillNumber ?>
		<td<?php echo $pharmacy_billing_issue->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_BillNumber" class="pharmacy_billing_issue_BillNumber">
<span<?php echo $pharmacy_billing_issue->BillNumber->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->CardNumber->Visible) { // CardNumber ?>
		<td<?php echo $pharmacy_billing_issue->CardNumber->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_CardNumber" class="pharmacy_billing_issue_CardNumber">
<span<?php echo $pharmacy_billing_issue->CardNumber->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->CardNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->BillStatus->Visible) { // BillStatus ?>
		<td<?php echo $pharmacy_billing_issue->BillStatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_BillStatus" class="pharmacy_billing_issue_BillStatus">
<span<?php echo $pharmacy_billing_issue->BillStatus->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->BillStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->ReportHeader->Visible) { // ReportHeader ?>
		<td<?php echo $pharmacy_billing_issue->ReportHeader->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_ReportHeader" class="pharmacy_billing_issue_ReportHeader">
<span<?php echo $pharmacy_billing_issue->ReportHeader->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->ReportHeader->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->PharID->Visible) { // PharID ?>
		<td<?php echo $pharmacy_billing_issue->PharID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_PharID" class="pharmacy_billing_issue_PharID">
<span<?php echo $pharmacy_billing_issue->PharID->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->PharID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_billing_issue->UserName->Visible) { // UserName ?>
		<td<?php echo $pharmacy_billing_issue->UserName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_billing_issue_delete->RowCnt ?>_pharmacy_billing_issue_UserName" class="pharmacy_billing_issue_UserName">
<span<?php echo $pharmacy_billing_issue->UserName->viewAttributes() ?>>
<?php echo $pharmacy_billing_issue->UserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_billing_issue_delete->Recordset->moveNext();
}
$pharmacy_billing_issue_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_billing_issue_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_billing_issue_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_billing_issue_delete->terminate();
?>
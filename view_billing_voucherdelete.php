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
$view_billing_voucher_delete = new view_billing_voucher_delete();

// Run the page
$view_billing_voucher_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_billing_voucher_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fview_billing_voucherdelete = currentForm = new ew.Form("fview_billing_voucherdelete", "delete");

// Form_CustomValidate event
fview_billing_voucherdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_billing_voucherdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_billing_voucherdelete.lists["x_ModeofPayment"] = <?php echo $view_billing_voucher_delete->ModeofPayment->Lookup->toClientList() ?>;
fview_billing_voucherdelete.lists["x_ModeofPayment"].options = <?php echo JsonEncode($view_billing_voucher_delete->ModeofPayment->lookupOptions()) ?>;
fview_billing_voucherdelete.lists["x_BillType"] = <?php echo $view_billing_voucher_delete->BillType->Lookup->toClientList() ?>;
fview_billing_voucherdelete.lists["x_BillType"].options = <?php echo JsonEncode($view_billing_voucher_delete->BillType->options(FALSE, TRUE)) ?>;
fview_billing_voucherdelete.lists["x_CancelBill"] = <?php echo $view_billing_voucher_delete->CancelBill->Lookup->toClientList() ?>;
fview_billing_voucherdelete.lists["x_CancelBill"].options = <?php echo JsonEncode($view_billing_voucher_delete->CancelBill->options(FALSE, TRUE)) ?>;
fview_billing_voucherdelete.lists["x_GoogleReviewID[]"] = <?php echo $view_billing_voucher_delete->GoogleReviewID->Lookup->toClientList() ?>;
fview_billing_voucherdelete.lists["x_GoogleReviewID[]"].options = <?php echo JsonEncode($view_billing_voucher_delete->GoogleReviewID->options(FALSE, TRUE)) ?>;
fview_billing_voucherdelete.lists["x_CardType"] = <?php echo $view_billing_voucher_delete->CardType->Lookup->toClientList() ?>;
fview_billing_voucherdelete.lists["x_CardType"].options = <?php echo JsonEncode($view_billing_voucher_delete->CardType->options(FALSE, TRUE)) ?>;
fview_billing_voucherdelete.lists["x_PharmacyBill[]"] = <?php echo $view_billing_voucher_delete->PharmacyBill->Lookup->toClientList() ?>;
fview_billing_voucherdelete.lists["x_PharmacyBill[]"].options = <?php echo JsonEncode($view_billing_voucher_delete->PharmacyBill->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_billing_voucher_delete->showPageHeader(); ?>
<?php
$view_billing_voucher_delete->showMessage();
?>
<form name="fview_billing_voucherdelete" id="fview_billing_voucherdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_billing_voucher_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_billing_voucher_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_billing_voucher_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_billing_voucher->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $view_billing_voucher->createddatetime->headerCellClass() ?>"><span id="elh_view_billing_voucher_createddatetime" class="view_billing_voucher_createddatetime"><?php echo $view_billing_voucher->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->BillNumber->Visible) { // BillNumber ?>
		<th class="<?php echo $view_billing_voucher->BillNumber->headerCellClass() ?>"><span id="elh_view_billing_voucher_BillNumber" class="view_billing_voucher_BillNumber"><?php echo $view_billing_voucher->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $view_billing_voucher->PatientId->headerCellClass() ?>"><span id="elh_view_billing_voucher_PatientId" class="view_billing_voucher_PatientId"><?php echo $view_billing_voucher->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $view_billing_voucher->PatientName->headerCellClass() ?>"><span id="elh_view_billing_voucher_PatientName" class="view_billing_voucher_PatientName"><?php echo $view_billing_voucher->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->Mobile->Visible) { // Mobile ?>
		<th class="<?php echo $view_billing_voucher->Mobile->headerCellClass() ?>"><span id="elh_view_billing_voucher_Mobile" class="view_billing_voucher_Mobile"><?php echo $view_billing_voucher->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->Doctor->Visible) { // Doctor ?>
		<th class="<?php echo $view_billing_voucher->Doctor->headerCellClass() ?>"><span id="elh_view_billing_voucher_Doctor" class="view_billing_voucher_Doctor"><?php echo $view_billing_voucher->Doctor->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<th class="<?php echo $view_billing_voucher->ModeofPayment->headerCellClass() ?>"><span id="elh_view_billing_voucher_ModeofPayment" class="view_billing_voucher_ModeofPayment"><?php echo $view_billing_voucher->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->Amount->Visible) { // Amount ?>
		<th class="<?php echo $view_billing_voucher->Amount->headerCellClass() ?>"><span id="elh_view_billing_voucher_Amount" class="view_billing_voucher_Amount"><?php echo $view_billing_voucher->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
		<th class="<?php echo $view_billing_voucher->DiscountAmount->headerCellClass() ?>"><span id="elh_view_billing_voucher_DiscountAmount" class="view_billing_voucher_DiscountAmount"><?php echo $view_billing_voucher->DiscountAmount->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->BankName->Visible) { // BankName ?>
		<th class="<?php echo $view_billing_voucher->BankName->headerCellClass() ?>"><span id="elh_view_billing_voucher_BankName" class="view_billing_voucher_BankName"><?php echo $view_billing_voucher->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->UserName->Visible) { // UserName ?>
		<th class="<?php echo $view_billing_voucher->UserName->headerCellClass() ?>"><span id="elh_view_billing_voucher_UserName" class="view_billing_voucher_UserName"><?php echo $view_billing_voucher->UserName->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->BillType->Visible) { // BillType ?>
		<th class="<?php echo $view_billing_voucher->BillType->headerCellClass() ?>"><span id="elh_view_billing_voucher_BillType" class="view_billing_voucher_BillType"><?php echo $view_billing_voucher->BillType->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->CancelBill->Visible) { // CancelBill ?>
		<th class="<?php echo $view_billing_voucher->CancelBill->headerCellClass() ?>"><span id="elh_view_billing_voucher_CancelBill" class="view_billing_voucher_CancelBill"><?php echo $view_billing_voucher->CancelBill->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->LabTest->Visible) { // LabTest ?>
		<th class="<?php echo $view_billing_voucher->LabTest->headerCellClass() ?>"><span id="elh_view_billing_voucher_LabTest" class="view_billing_voucher_LabTest"><?php echo $view_billing_voucher->LabTest->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->sid->Visible) { // sid ?>
		<th class="<?php echo $view_billing_voucher->sid->headerCellClass() ?>"><span id="elh_view_billing_voucher_sid" class="view_billing_voucher_sid"><?php echo $view_billing_voucher->sid->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->SidNo->Visible) { // SidNo ?>
		<th class="<?php echo $view_billing_voucher->SidNo->headerCellClass() ?>"><span id="elh_view_billing_voucher_SidNo" class="view_billing_voucher_SidNo"><?php echo $view_billing_voucher->SidNo->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->createdDatettime->Visible) { // createdDatettime ?>
		<th class="<?php echo $view_billing_voucher->createdDatettime->headerCellClass() ?>"><span id="elh_view_billing_voucher_createdDatettime" class="view_billing_voucher_createdDatettime"><?php echo $view_billing_voucher->createdDatettime->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->GoogleReviewID->Visible) { // GoogleReviewID ?>
		<th class="<?php echo $view_billing_voucher->GoogleReviewID->headerCellClass() ?>"><span id="elh_view_billing_voucher_GoogleReviewID" class="view_billing_voucher_GoogleReviewID"><?php echo $view_billing_voucher->GoogleReviewID->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->CardType->Visible) { // CardType ?>
		<th class="<?php echo $view_billing_voucher->CardType->headerCellClass() ?>"><span id="elh_view_billing_voucher_CardType" class="view_billing_voucher_CardType"><?php echo $view_billing_voucher->CardType->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->PharmacyBill->Visible) { // PharmacyBill ?>
		<th class="<?php echo $view_billing_voucher->PharmacyBill->headerCellClass() ?>"><span id="elh_view_billing_voucher_PharmacyBill" class="view_billing_voucher_PharmacyBill"><?php echo $view_billing_voucher->PharmacyBill->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->cash->Visible) { // cash ?>
		<th class="<?php echo $view_billing_voucher->cash->headerCellClass() ?>"><span id="elh_view_billing_voucher_cash" class="view_billing_voucher_cash"><?php echo $view_billing_voucher->cash->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher->Card->Visible) { // Card ?>
		<th class="<?php echo $view_billing_voucher->Card->headerCellClass() ?>"><span id="elh_view_billing_voucher_Card" class="view_billing_voucher_Card"><?php echo $view_billing_voucher->Card->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_billing_voucher_delete->RecCnt = 0;
$i = 0;
while (!$view_billing_voucher_delete->Recordset->EOF) {
	$view_billing_voucher_delete->RecCnt++;
	$view_billing_voucher_delete->RowCnt++;

	// Set row properties
	$view_billing_voucher->resetAttributes();
	$view_billing_voucher->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_billing_voucher_delete->loadRowValues($view_billing_voucher_delete->Recordset);

	// Render row
	$view_billing_voucher_delete->renderRow();
?>
	<tr<?php echo $view_billing_voucher->rowAttributes() ?>>
<?php if ($view_billing_voucher->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $view_billing_voucher->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_createddatetime" class="view_billing_voucher_createddatetime">
<span<?php echo $view_billing_voucher->createddatetime->viewAttributes() ?>>
<?php echo $view_billing_voucher->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->BillNumber->Visible) { // BillNumber ?>
		<td<?php echo $view_billing_voucher->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_BillNumber" class="view_billing_voucher_BillNumber">
<span<?php echo $view_billing_voucher->BillNumber->viewAttributes() ?>>
<?php echo $view_billing_voucher->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->PatientId->Visible) { // PatientId ?>
		<td<?php echo $view_billing_voucher->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_PatientId" class="view_billing_voucher_PatientId">
<span<?php echo $view_billing_voucher->PatientId->viewAttributes() ?>>
<?php echo $view_billing_voucher->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->PatientName->Visible) { // PatientName ?>
		<td<?php echo $view_billing_voucher->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_PatientName" class="view_billing_voucher_PatientName">
<span<?php echo $view_billing_voucher->PatientName->viewAttributes() ?>>
<?php echo $view_billing_voucher->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->Mobile->Visible) { // Mobile ?>
		<td<?php echo $view_billing_voucher->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_Mobile" class="view_billing_voucher_Mobile">
<span<?php echo $view_billing_voucher->Mobile->viewAttributes() ?>>
<?php echo $view_billing_voucher->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->Doctor->Visible) { // Doctor ?>
		<td<?php echo $view_billing_voucher->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_Doctor" class="view_billing_voucher_Doctor">
<span<?php echo $view_billing_voucher->Doctor->viewAttributes() ?>>
<?php echo $view_billing_voucher->Doctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<td<?php echo $view_billing_voucher->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_ModeofPayment" class="view_billing_voucher_ModeofPayment">
<span<?php echo $view_billing_voucher->ModeofPayment->viewAttributes() ?>>
<?php echo $view_billing_voucher->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->Amount->Visible) { // Amount ?>
		<td<?php echo $view_billing_voucher->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_Amount" class="view_billing_voucher_Amount">
<span<?php echo $view_billing_voucher->Amount->viewAttributes() ?>>
<?php echo $view_billing_voucher->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->DiscountAmount->Visible) { // DiscountAmount ?>
		<td<?php echo $view_billing_voucher->DiscountAmount->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_DiscountAmount" class="view_billing_voucher_DiscountAmount">
<span<?php echo $view_billing_voucher->DiscountAmount->viewAttributes() ?>>
<?php echo $view_billing_voucher->DiscountAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->BankName->Visible) { // BankName ?>
		<td<?php echo $view_billing_voucher->BankName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_BankName" class="view_billing_voucher_BankName">
<span<?php echo $view_billing_voucher->BankName->viewAttributes() ?>>
<?php echo $view_billing_voucher->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->UserName->Visible) { // UserName ?>
		<td<?php echo $view_billing_voucher->UserName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_UserName" class="view_billing_voucher_UserName">
<span<?php echo $view_billing_voucher->UserName->viewAttributes() ?>>
<?php echo $view_billing_voucher->UserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->BillType->Visible) { // BillType ?>
		<td<?php echo $view_billing_voucher->BillType->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_BillType" class="view_billing_voucher_BillType">
<span<?php echo $view_billing_voucher->BillType->viewAttributes() ?>>
<?php echo $view_billing_voucher->BillType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->CancelBill->Visible) { // CancelBill ?>
		<td<?php echo $view_billing_voucher->CancelBill->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_CancelBill" class="view_billing_voucher_CancelBill">
<span<?php echo $view_billing_voucher->CancelBill->viewAttributes() ?>>
<?php echo $view_billing_voucher->CancelBill->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->LabTest->Visible) { // LabTest ?>
		<td<?php echo $view_billing_voucher->LabTest->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_LabTest" class="view_billing_voucher_LabTest">
<span<?php echo $view_billing_voucher->LabTest->viewAttributes() ?>>
<?php echo $view_billing_voucher->LabTest->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->sid->Visible) { // sid ?>
		<td<?php echo $view_billing_voucher->sid->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_sid" class="view_billing_voucher_sid">
<span<?php echo $view_billing_voucher->sid->viewAttributes() ?>>
<?php echo $view_billing_voucher->sid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->SidNo->Visible) { // SidNo ?>
		<td<?php echo $view_billing_voucher->SidNo->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_SidNo" class="view_billing_voucher_SidNo">
<span<?php echo $view_billing_voucher->SidNo->viewAttributes() ?>>
<?php echo $view_billing_voucher->SidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->createdDatettime->Visible) { // createdDatettime ?>
		<td<?php echo $view_billing_voucher->createdDatettime->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_createdDatettime" class="view_billing_voucher_createdDatettime">
<span<?php echo $view_billing_voucher->createdDatettime->viewAttributes() ?>>
<?php echo $view_billing_voucher->createdDatettime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->GoogleReviewID->Visible) { // GoogleReviewID ?>
		<td<?php echo $view_billing_voucher->GoogleReviewID->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_GoogleReviewID" class="view_billing_voucher_GoogleReviewID">
<span<?php echo $view_billing_voucher->GoogleReviewID->viewAttributes() ?>>
<?php echo $view_billing_voucher->GoogleReviewID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->CardType->Visible) { // CardType ?>
		<td<?php echo $view_billing_voucher->CardType->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_CardType" class="view_billing_voucher_CardType">
<span<?php echo $view_billing_voucher->CardType->viewAttributes() ?>>
<?php echo $view_billing_voucher->CardType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->PharmacyBill->Visible) { // PharmacyBill ?>
		<td<?php echo $view_billing_voucher->PharmacyBill->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_PharmacyBill" class="view_billing_voucher_PharmacyBill">
<span<?php echo $view_billing_voucher->PharmacyBill->viewAttributes() ?>>
<?php echo $view_billing_voucher->PharmacyBill->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->cash->Visible) { // cash ?>
		<td<?php echo $view_billing_voucher->cash->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_cash" class="view_billing_voucher_cash">
<span<?php echo $view_billing_voucher->cash->viewAttributes() ?>>
<?php echo $view_billing_voucher->cash->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher->Card->Visible) { // Card ?>
		<td<?php echo $view_billing_voucher->Card->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_delete->RowCnt ?>_view_billing_voucher_Card" class="view_billing_voucher_Card">
<span<?php echo $view_billing_voucher->Card->viewAttributes() ?>>
<?php echo $view_billing_voucher->Card->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_billing_voucher_delete->Recordset->moveNext();
}
$view_billing_voucher_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_billing_voucher_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_billing_voucher_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_billing_voucher_delete->terminate();
?>
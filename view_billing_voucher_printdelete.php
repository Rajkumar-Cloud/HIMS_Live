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
$view_billing_voucher_print_delete = new view_billing_voucher_print_delete();

// Run the page
$view_billing_voucher_print_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_billing_voucher_print_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fview_billing_voucher_printdelete = currentForm = new ew.Form("fview_billing_voucher_printdelete", "delete");

// Form_CustomValidate event
fview_billing_voucher_printdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_billing_voucher_printdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_billing_voucher_printdelete.lists["x_ModeofPayment"] = <?php echo $view_billing_voucher_print_delete->ModeofPayment->Lookup->toClientList() ?>;
fview_billing_voucher_printdelete.lists["x_ModeofPayment"].options = <?php echo JsonEncode($view_billing_voucher_print_delete->ModeofPayment->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_billing_voucher_print_delete->showPageHeader(); ?>
<?php
$view_billing_voucher_print_delete->showMessage();
?>
<form name="fview_billing_voucher_printdelete" id="fview_billing_voucher_printdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_billing_voucher_print_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_billing_voucher_print_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_billing_voucher_print">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_billing_voucher_print_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_billing_voucher_print->PatientId->Visible) { // PatientId ?>
		<th class="<?php echo $view_billing_voucher_print->PatientId->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_PatientId" class="view_billing_voucher_print_PatientId"><?php echo $view_billing_voucher_print->PatientId->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_print->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $view_billing_voucher_print->PatientName->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_PatientName" class="view_billing_voucher_print_PatientName"><?php echo $view_billing_voucher_print->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_print->Mobile->Visible) { // Mobile ?>
		<th class="<?php echo $view_billing_voucher_print->Mobile->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_Mobile" class="view_billing_voucher_print_Mobile"><?php echo $view_billing_voucher_print->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_print->Doctor->Visible) { // Doctor ?>
		<th class="<?php echo $view_billing_voucher_print->Doctor->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_Doctor" class="view_billing_voucher_print_Doctor"><?php echo $view_billing_voucher_print->Doctor->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_print->ModeofPayment->Visible) { // ModeofPayment ?>
		<th class="<?php echo $view_billing_voucher_print->ModeofPayment->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_ModeofPayment" class="view_billing_voucher_print_ModeofPayment"><?php echo $view_billing_voucher_print->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_print->Amount->Visible) { // Amount ?>
		<th class="<?php echo $view_billing_voucher_print->Amount->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_Amount" class="view_billing_voucher_print_Amount"><?php echo $view_billing_voucher_print->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_print->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $view_billing_voucher_print->createddatetime->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_createddatetime" class="view_billing_voucher_print_createddatetime"><?php echo $view_billing_voucher_print->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_print->BillNumber->Visible) { // BillNumber ?>
		<th class="<?php echo $view_billing_voucher_print->BillNumber->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_BillNumber" class="view_billing_voucher_print_BillNumber"><?php echo $view_billing_voucher_print->BillNumber->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_print->BankName->Visible) { // BankName ?>
		<th class="<?php echo $view_billing_voucher_print->BankName->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_BankName" class="view_billing_voucher_print_BankName"><?php echo $view_billing_voucher_print->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_print->UserName->Visible) { // UserName ?>
		<th class="<?php echo $view_billing_voucher_print->UserName->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_UserName" class="view_billing_voucher_print_UserName"><?php echo $view_billing_voucher_print->UserName->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_print->BillType->Visible) { // BillType ?>
		<th class="<?php echo $view_billing_voucher_print->BillType->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_BillType" class="view_billing_voucher_print_BillType"><?php echo $view_billing_voucher_print->BillType->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
		<th class="<?php echo $view_billing_voucher_print->CancelModeOfPayment->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_CancelModeOfPayment" class="view_billing_voucher_print_CancelModeOfPayment"><?php echo $view_billing_voucher_print->CancelModeOfPayment->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelAmount->Visible) { // CancelAmount ?>
		<th class="<?php echo $view_billing_voucher_print->CancelAmount->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_CancelAmount" class="view_billing_voucher_print_CancelAmount"><?php echo $view_billing_voucher_print->CancelAmount->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelBankName->Visible) { // CancelBankName ?>
		<th class="<?php echo $view_billing_voucher_print->CancelBankName->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_CancelBankName" class="view_billing_voucher_print_CancelBankName"><?php echo $view_billing_voucher_print->CancelBankName->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
		<th class="<?php echo $view_billing_voucher_print->CancelTransactionNumber->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_CancelTransactionNumber" class="view_billing_voucher_print_CancelTransactionNumber"><?php echo $view_billing_voucher_print->CancelTransactionNumber->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_print->LabTest->Visible) { // LabTest ?>
		<th class="<?php echo $view_billing_voucher_print->LabTest->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_LabTest" class="view_billing_voucher_print_LabTest"><?php echo $view_billing_voucher_print->LabTest->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_print->sid->Visible) { // sid ?>
		<th class="<?php echo $view_billing_voucher_print->sid->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_sid" class="view_billing_voucher_print_sid"><?php echo $view_billing_voucher_print->sid->caption() ?></span></th>
<?php } ?>
<?php if ($view_billing_voucher_print->SidNo->Visible) { // SidNo ?>
		<th class="<?php echo $view_billing_voucher_print->SidNo->headerCellClass() ?>"><span id="elh_view_billing_voucher_print_SidNo" class="view_billing_voucher_print_SidNo"><?php echo $view_billing_voucher_print->SidNo->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_billing_voucher_print_delete->RecCnt = 0;
$i = 0;
while (!$view_billing_voucher_print_delete->Recordset->EOF) {
	$view_billing_voucher_print_delete->RecCnt++;
	$view_billing_voucher_print_delete->RowCnt++;

	// Set row properties
	$view_billing_voucher_print->resetAttributes();
	$view_billing_voucher_print->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_billing_voucher_print_delete->loadRowValues($view_billing_voucher_print_delete->Recordset);

	// Render row
	$view_billing_voucher_print_delete->renderRow();
?>
	<tr<?php echo $view_billing_voucher_print->rowAttributes() ?>>
<?php if ($view_billing_voucher_print->PatientId->Visible) { // PatientId ?>
		<td<?php echo $view_billing_voucher_print->PatientId->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_print_delete->RowCnt ?>_view_billing_voucher_print_PatientId" class="view_billing_voucher_print_PatientId">
<span<?php echo $view_billing_voucher_print->PatientId->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->PatientId->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_print->PatientName->Visible) { // PatientName ?>
		<td<?php echo $view_billing_voucher_print->PatientName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_print_delete->RowCnt ?>_view_billing_voucher_print_PatientName" class="view_billing_voucher_print_PatientName">
<span<?php echo $view_billing_voucher_print->PatientName->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_print->Mobile->Visible) { // Mobile ?>
		<td<?php echo $view_billing_voucher_print->Mobile->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_print_delete->RowCnt ?>_view_billing_voucher_print_Mobile" class="view_billing_voucher_print_Mobile">
<span<?php echo $view_billing_voucher_print->Mobile->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_print->Doctor->Visible) { // Doctor ?>
		<td<?php echo $view_billing_voucher_print->Doctor->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_print_delete->RowCnt ?>_view_billing_voucher_print_Doctor" class="view_billing_voucher_print_Doctor">
<span<?php echo $view_billing_voucher_print->Doctor->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->Doctor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_print->ModeofPayment->Visible) { // ModeofPayment ?>
		<td<?php echo $view_billing_voucher_print->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_print_delete->RowCnt ?>_view_billing_voucher_print_ModeofPayment" class="view_billing_voucher_print_ModeofPayment">
<span<?php echo $view_billing_voucher_print->ModeofPayment->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_print->Amount->Visible) { // Amount ?>
		<td<?php echo $view_billing_voucher_print->Amount->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_print_delete->RowCnt ?>_view_billing_voucher_print_Amount" class="view_billing_voucher_print_Amount">
<span<?php echo $view_billing_voucher_print->Amount->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_print->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $view_billing_voucher_print->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_print_delete->RowCnt ?>_view_billing_voucher_print_createddatetime" class="view_billing_voucher_print_createddatetime">
<span<?php echo $view_billing_voucher_print->createddatetime->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_print->BillNumber->Visible) { // BillNumber ?>
		<td<?php echo $view_billing_voucher_print->BillNumber->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_print_delete->RowCnt ?>_view_billing_voucher_print_BillNumber" class="view_billing_voucher_print_BillNumber">
<span<?php echo $view_billing_voucher_print->BillNumber->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->BillNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_print->BankName->Visible) { // BankName ?>
		<td<?php echo $view_billing_voucher_print->BankName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_print_delete->RowCnt ?>_view_billing_voucher_print_BankName" class="view_billing_voucher_print_BankName">
<span<?php echo $view_billing_voucher_print->BankName->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_print->UserName->Visible) { // UserName ?>
		<td<?php echo $view_billing_voucher_print->UserName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_print_delete->RowCnt ?>_view_billing_voucher_print_UserName" class="view_billing_voucher_print_UserName">
<span<?php echo $view_billing_voucher_print->UserName->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->UserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_print->BillType->Visible) { // BillType ?>
		<td<?php echo $view_billing_voucher_print->BillType->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_print_delete->RowCnt ?>_view_billing_voucher_print_BillType" class="view_billing_voucher_print_BillType">
<span<?php echo $view_billing_voucher_print->BillType->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->BillType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelModeOfPayment->Visible) { // CancelModeOfPayment ?>
		<td<?php echo $view_billing_voucher_print->CancelModeOfPayment->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_print_delete->RowCnt ?>_view_billing_voucher_print_CancelModeOfPayment" class="view_billing_voucher_print_CancelModeOfPayment">
<span<?php echo $view_billing_voucher_print->CancelModeOfPayment->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->CancelModeOfPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelAmount->Visible) { // CancelAmount ?>
		<td<?php echo $view_billing_voucher_print->CancelAmount->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_print_delete->RowCnt ?>_view_billing_voucher_print_CancelAmount" class="view_billing_voucher_print_CancelAmount">
<span<?php echo $view_billing_voucher_print->CancelAmount->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->CancelAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelBankName->Visible) { // CancelBankName ?>
		<td<?php echo $view_billing_voucher_print->CancelBankName->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_print_delete->RowCnt ?>_view_billing_voucher_print_CancelBankName" class="view_billing_voucher_print_CancelBankName">
<span<?php echo $view_billing_voucher_print->CancelBankName->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->CancelBankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_print->CancelTransactionNumber->Visible) { // CancelTransactionNumber ?>
		<td<?php echo $view_billing_voucher_print->CancelTransactionNumber->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_print_delete->RowCnt ?>_view_billing_voucher_print_CancelTransactionNumber" class="view_billing_voucher_print_CancelTransactionNumber">
<span<?php echo $view_billing_voucher_print->CancelTransactionNumber->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->CancelTransactionNumber->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_print->LabTest->Visible) { // LabTest ?>
		<td<?php echo $view_billing_voucher_print->LabTest->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_print_delete->RowCnt ?>_view_billing_voucher_print_LabTest" class="view_billing_voucher_print_LabTest">
<span<?php echo $view_billing_voucher_print->LabTest->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->LabTest->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_print->sid->Visible) { // sid ?>
		<td<?php echo $view_billing_voucher_print->sid->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_print_delete->RowCnt ?>_view_billing_voucher_print_sid" class="view_billing_voucher_print_sid">
<span<?php echo $view_billing_voucher_print->sid->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->sid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_billing_voucher_print->SidNo->Visible) { // SidNo ?>
		<td<?php echo $view_billing_voucher_print->SidNo->cellAttributes() ?>>
<span id="el<?php echo $view_billing_voucher_print_delete->RowCnt ?>_view_billing_voucher_print_SidNo" class="view_billing_voucher_print_SidNo">
<span<?php echo $view_billing_voucher_print->SidNo->viewAttributes() ?>>
<?php echo $view_billing_voucher_print->SidNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_billing_voucher_print_delete->Recordset->moveNext();
}
$view_billing_voucher_print_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_billing_voucher_print_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_billing_voucher_print_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_billing_voucher_print_delete->terminate();
?>
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
$billing_other_voucher_delete = new billing_other_voucher_delete();

// Run the page
$billing_other_voucher_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_other_voucher_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fbilling_other_voucherdelete = currentForm = new ew.Form("fbilling_other_voucherdelete", "delete");

// Form_CustomValidate event
fbilling_other_voucherdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fbilling_other_voucherdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fbilling_other_voucherdelete.lists["x_ModeofPayment"] = <?php echo $billing_other_voucher_delete->ModeofPayment->Lookup->toClientList() ?>;
fbilling_other_voucherdelete.lists["x_ModeofPayment"].options = <?php echo JsonEncode($billing_other_voucher_delete->ModeofPayment->lookupOptions()) ?>;
fbilling_other_voucherdelete.lists["x_CancelAdvance[]"] = <?php echo $billing_other_voucher_delete->CancelAdvance->Lookup->toClientList() ?>;
fbilling_other_voucherdelete.lists["x_CancelAdvance[]"].options = <?php echo JsonEncode($billing_other_voucher_delete->CancelAdvance->options(FALSE, TRUE)) ?>;
fbilling_other_voucherdelete.lists["x_CancelStatus"] = <?php echo $billing_other_voucher_delete->CancelStatus->Lookup->toClientList() ?>;
fbilling_other_voucherdelete.lists["x_CancelStatus"].options = <?php echo JsonEncode($billing_other_voucher_delete->CancelStatus->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $billing_other_voucher_delete->showPageHeader(); ?>
<?php
$billing_other_voucher_delete->showMessage();
?>
<form name="fbilling_other_voucherdelete" id="fbilling_other_voucherdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($billing_other_voucher_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $billing_other_voucher_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_other_voucher">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($billing_other_voucher_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($billing_other_voucher->id->Visible) { // id ?>
		<th class="<?php echo $billing_other_voucher->id->headerCellClass() ?>"><span id="elh_billing_other_voucher_id" class="billing_other_voucher_id"><?php echo $billing_other_voucher->id->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher->AdvanceNo->Visible) { // AdvanceNo ?>
		<th class="<?php echo $billing_other_voucher->AdvanceNo->headerCellClass() ?>"><span id="elh_billing_other_voucher_AdvanceNo" class="billing_other_voucher_AdvanceNo"><?php echo $billing_other_voucher->AdvanceNo->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $billing_other_voucher->PatientID->headerCellClass() ?>"><span id="elh_billing_other_voucher_PatientID" class="billing_other_voucher_PatientID"><?php echo $billing_other_voucher->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $billing_other_voucher->PatientName->headerCellClass() ?>"><span id="elh_billing_other_voucher_PatientName" class="billing_other_voucher_PatientName"><?php echo $billing_other_voucher->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher->Mobile->Visible) { // Mobile ?>
		<th class="<?php echo $billing_other_voucher->Mobile->headerCellClass() ?>"><span id="elh_billing_other_voucher_Mobile" class="billing_other_voucher_Mobile"><?php echo $billing_other_voucher->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<th class="<?php echo $billing_other_voucher->ModeofPayment->headerCellClass() ?>"><span id="elh_billing_other_voucher_ModeofPayment" class="billing_other_voucher_ModeofPayment"><?php echo $billing_other_voucher->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher->Amount->Visible) { // Amount ?>
		<th class="<?php echo $billing_other_voucher->Amount->headerCellClass() ?>"><span id="elh_billing_other_voucher_Amount" class="billing_other_voucher_Amount"><?php echo $billing_other_voucher->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher->BankName->Visible) { // BankName ?>
		<th class="<?php echo $billing_other_voucher->BankName->headerCellClass() ?>"><span id="elh_billing_other_voucher_BankName" class="billing_other_voucher_BankName"><?php echo $billing_other_voucher->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher->Date->Visible) { // Date ?>
		<th class="<?php echo $billing_other_voucher->Date->headerCellClass() ?>"><span id="elh_billing_other_voucher_Date" class="billing_other_voucher_Date"><?php echo $billing_other_voucher->Date->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher->GetUserName->Visible) { // GetUserName ?>
		<th class="<?php echo $billing_other_voucher->GetUserName->headerCellClass() ?>"><span id="elh_billing_other_voucher_GetUserName" class="billing_other_voucher_GetUserName"><?php echo $billing_other_voucher->GetUserName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher->CancelAdvance->Visible) { // CancelAdvance ?>
		<th class="<?php echo $billing_other_voucher->CancelAdvance->headerCellClass() ?>"><span id="elh_billing_other_voucher_CancelAdvance" class="billing_other_voucher_CancelAdvance"><?php echo $billing_other_voucher->CancelAdvance->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher->CancelStatus->Visible) { // CancelStatus ?>
		<th class="<?php echo $billing_other_voucher->CancelStatus->headerCellClass() ?>"><span id="elh_billing_other_voucher_CancelStatus" class="billing_other_voucher_CancelStatus"><?php echo $billing_other_voucher->CancelStatus->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher->Cash->Visible) { // Cash ?>
		<th class="<?php echo $billing_other_voucher->Cash->headerCellClass() ?>"><span id="elh_billing_other_voucher_Cash" class="billing_other_voucher_Cash"><?php echo $billing_other_voucher->Cash->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher->Card->Visible) { // Card ?>
		<th class="<?php echo $billing_other_voucher->Card->headerCellClass() ?>"><span id="elh_billing_other_voucher_Card" class="billing_other_voucher_Card"><?php echo $billing_other_voucher->Card->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$billing_other_voucher_delete->RecCnt = 0;
$i = 0;
while (!$billing_other_voucher_delete->Recordset->EOF) {
	$billing_other_voucher_delete->RecCnt++;
	$billing_other_voucher_delete->RowCnt++;

	// Set row properties
	$billing_other_voucher->resetAttributes();
	$billing_other_voucher->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$billing_other_voucher_delete->loadRowValues($billing_other_voucher_delete->Recordset);

	// Render row
	$billing_other_voucher_delete->renderRow();
?>
	<tr<?php echo $billing_other_voucher->rowAttributes() ?>>
<?php if ($billing_other_voucher->id->Visible) { // id ?>
		<td<?php echo $billing_other_voucher->id->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCnt ?>_billing_other_voucher_id" class="billing_other_voucher_id">
<span<?php echo $billing_other_voucher->id->viewAttributes() ?>>
<?php echo $billing_other_voucher->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher->AdvanceNo->Visible) { // AdvanceNo ?>
		<td<?php echo $billing_other_voucher->AdvanceNo->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCnt ?>_billing_other_voucher_AdvanceNo" class="billing_other_voucher_AdvanceNo">
<span<?php echo $billing_other_voucher->AdvanceNo->viewAttributes() ?>>
<?php echo $billing_other_voucher->AdvanceNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher->PatientID->Visible) { // PatientID ?>
		<td<?php echo $billing_other_voucher->PatientID->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCnt ?>_billing_other_voucher_PatientID" class="billing_other_voucher_PatientID">
<span<?php echo $billing_other_voucher->PatientID->viewAttributes() ?>>
<?php echo $billing_other_voucher->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher->PatientName->Visible) { // PatientName ?>
		<td<?php echo $billing_other_voucher->PatientName->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCnt ?>_billing_other_voucher_PatientName" class="billing_other_voucher_PatientName">
<span<?php echo $billing_other_voucher->PatientName->viewAttributes() ?>>
<?php echo $billing_other_voucher->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher->Mobile->Visible) { // Mobile ?>
		<td<?php echo $billing_other_voucher->Mobile->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCnt ?>_billing_other_voucher_Mobile" class="billing_other_voucher_Mobile">
<span<?php echo $billing_other_voucher->Mobile->viewAttributes() ?>>
<?php echo $billing_other_voucher->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher->ModeofPayment->Visible) { // ModeofPayment ?>
		<td<?php echo $billing_other_voucher->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCnt ?>_billing_other_voucher_ModeofPayment" class="billing_other_voucher_ModeofPayment">
<span<?php echo $billing_other_voucher->ModeofPayment->viewAttributes() ?>>
<?php echo $billing_other_voucher->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher->Amount->Visible) { // Amount ?>
		<td<?php echo $billing_other_voucher->Amount->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCnt ?>_billing_other_voucher_Amount" class="billing_other_voucher_Amount">
<span<?php echo $billing_other_voucher->Amount->viewAttributes() ?>>
<?php echo $billing_other_voucher->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher->BankName->Visible) { // BankName ?>
		<td<?php echo $billing_other_voucher->BankName->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCnt ?>_billing_other_voucher_BankName" class="billing_other_voucher_BankName">
<span<?php echo $billing_other_voucher->BankName->viewAttributes() ?>>
<?php echo $billing_other_voucher->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher->Date->Visible) { // Date ?>
		<td<?php echo $billing_other_voucher->Date->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCnt ?>_billing_other_voucher_Date" class="billing_other_voucher_Date">
<span<?php echo $billing_other_voucher->Date->viewAttributes() ?>>
<?php echo $billing_other_voucher->Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher->GetUserName->Visible) { // GetUserName ?>
		<td<?php echo $billing_other_voucher->GetUserName->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCnt ?>_billing_other_voucher_GetUserName" class="billing_other_voucher_GetUserName">
<span<?php echo $billing_other_voucher->GetUserName->viewAttributes() ?>>
<?php echo $billing_other_voucher->GetUserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher->CancelAdvance->Visible) { // CancelAdvance ?>
		<td<?php echo $billing_other_voucher->CancelAdvance->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCnt ?>_billing_other_voucher_CancelAdvance" class="billing_other_voucher_CancelAdvance">
<span<?php echo $billing_other_voucher->CancelAdvance->viewAttributes() ?>>
<?php echo $billing_other_voucher->CancelAdvance->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher->CancelStatus->Visible) { // CancelStatus ?>
		<td<?php echo $billing_other_voucher->CancelStatus->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCnt ?>_billing_other_voucher_CancelStatus" class="billing_other_voucher_CancelStatus">
<span<?php echo $billing_other_voucher->CancelStatus->viewAttributes() ?>>
<?php echo $billing_other_voucher->CancelStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher->Cash->Visible) { // Cash ?>
		<td<?php echo $billing_other_voucher->Cash->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCnt ?>_billing_other_voucher_Cash" class="billing_other_voucher_Cash">
<span<?php echo $billing_other_voucher->Cash->viewAttributes() ?>>
<?php echo $billing_other_voucher->Cash->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher->Card->Visible) { // Card ?>
		<td<?php echo $billing_other_voucher->Card->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCnt ?>_billing_other_voucher_Card" class="billing_other_voucher_Card">
<span<?php echo $billing_other_voucher->Card->viewAttributes() ?>>
<?php echo $billing_other_voucher->Card->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$billing_other_voucher_delete->Recordset->moveNext();
}
$billing_other_voucher_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $billing_other_voucher_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$billing_other_voucher_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$billing_other_voucher_delete->terminate();
?>
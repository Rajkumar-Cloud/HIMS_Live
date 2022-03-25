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
$depositdetails_delete = new depositdetails_delete();

// Run the page
$depositdetails_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$depositdetails_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fdepositdetailsdelete = currentForm = new ew.Form("fdepositdetailsdelete", "delete");

// Form_CustomValidate event
fdepositdetailsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fdepositdetailsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fdepositdetailsdelete.lists["x_TransferTo"] = <?php echo $depositdetails_delete->TransferTo->Lookup->toClientList() ?>;
fdepositdetailsdelete.lists["x_TransferTo"].options = <?php echo JsonEncode($depositdetails_delete->TransferTo->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $depositdetails_delete->showPageHeader(); ?>
<?php
$depositdetails_delete->showMessage();
?>
<form name="fdepositdetailsdelete" id="fdepositdetailsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($depositdetails_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $depositdetails_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="depositdetails">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($depositdetails_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($depositdetails->id->Visible) { // id ?>
		<th class="<?php echo $depositdetails->id->headerCellClass() ?>"><span id="elh_depositdetails_id" class="depositdetails_id"><?php echo $depositdetails->id->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails->DepositDate->Visible) { // DepositDate ?>
		<th class="<?php echo $depositdetails->DepositDate->headerCellClass() ?>"><span id="elh_depositdetails_DepositDate" class="depositdetails_DepositDate"><?php echo $depositdetails->DepositDate->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails->TransferTo->Visible) { // TransferTo ?>
		<th class="<?php echo $depositdetails->TransferTo->headerCellClass() ?>"><span id="elh_depositdetails_TransferTo" class="depositdetails_TransferTo"><?php echo $depositdetails->TransferTo->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails->OpeningBalance->Visible) { // OpeningBalance ?>
		<th class="<?php echo $depositdetails->OpeningBalance->headerCellClass() ?>"><span id="elh_depositdetails_OpeningBalance" class="depositdetails_OpeningBalance"><?php echo $depositdetails->OpeningBalance->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails->Other->Visible) { // Other ?>
		<th class="<?php echo $depositdetails->Other->headerCellClass() ?>"><span id="elh_depositdetails_Other" class="depositdetails_Other"><?php echo $depositdetails->Other->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails->TotalCash->Visible) { // TotalCash ?>
		<th class="<?php echo $depositdetails->TotalCash->headerCellClass() ?>"><span id="elh_depositdetails_TotalCash" class="depositdetails_TotalCash"><?php echo $depositdetails->TotalCash->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails->Cheque->Visible) { // Cheque ?>
		<th class="<?php echo $depositdetails->Cheque->headerCellClass() ?>"><span id="elh_depositdetails_Cheque" class="depositdetails_Cheque"><?php echo $depositdetails->Cheque->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails->Card->Visible) { // Card ?>
		<th class="<?php echo $depositdetails->Card->headerCellClass() ?>"><span id="elh_depositdetails_Card" class="depositdetails_Card"><?php echo $depositdetails->Card->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails->NEFTRTGS->Visible) { // NEFTRTGS ?>
		<th class="<?php echo $depositdetails->NEFTRTGS->headerCellClass() ?>"><span id="elh_depositdetails_NEFTRTGS" class="depositdetails_NEFTRTGS"><?php echo $depositdetails->NEFTRTGS->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
		<th class="<?php echo $depositdetails->TotalTransferDepositAmount->headerCellClass() ?>"><span id="elh_depositdetails_TotalTransferDepositAmount" class="depositdetails_TotalTransferDepositAmount"><?php echo $depositdetails->TotalTransferDepositAmount->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails->CreatedUserName->Visible) { // CreatedUserName ?>
		<th class="<?php echo $depositdetails->CreatedUserName->headerCellClass() ?>"><span id="elh_depositdetails_CreatedUserName" class="depositdetails_CreatedUserName"><?php echo $depositdetails->CreatedUserName->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails->CashCollected->Visible) { // CashCollected ?>
		<th class="<?php echo $depositdetails->CashCollected->headerCellClass() ?>"><span id="elh_depositdetails_CashCollected" class="depositdetails_CashCollected"><?php echo $depositdetails->CashCollected->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails->RTGS->Visible) { // RTGS ?>
		<th class="<?php echo $depositdetails->RTGS->headerCellClass() ?>"><span id="elh_depositdetails_RTGS" class="depositdetails_RTGS"><?php echo $depositdetails->RTGS->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails->PAYTM->Visible) { // PAYTM ?>
		<th class="<?php echo $depositdetails->PAYTM->headerCellClass() ?>"><span id="elh_depositdetails_PAYTM" class="depositdetails_PAYTM"><?php echo $depositdetails->PAYTM->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails->ManualCash->Visible) { // ManualCash ?>
		<th class="<?php echo $depositdetails->ManualCash->headerCellClass() ?>"><span id="elh_depositdetails_ManualCash" class="depositdetails_ManualCash"><?php echo $depositdetails->ManualCash->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails->ManualCard->Visible) { // ManualCard ?>
		<th class="<?php echo $depositdetails->ManualCard->headerCellClass() ?>"><span id="elh_depositdetails_ManualCard" class="depositdetails_ManualCard"><?php echo $depositdetails->ManualCard->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$depositdetails_delete->RecCnt = 0;
$i = 0;
while (!$depositdetails_delete->Recordset->EOF) {
	$depositdetails_delete->RecCnt++;
	$depositdetails_delete->RowCnt++;

	// Set row properties
	$depositdetails->resetAttributes();
	$depositdetails->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$depositdetails_delete->loadRowValues($depositdetails_delete->Recordset);

	// Render row
	$depositdetails_delete->renderRow();
?>
	<tr<?php echo $depositdetails->rowAttributes() ?>>
<?php if ($depositdetails->id->Visible) { // id ?>
		<td<?php echo $depositdetails->id->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCnt ?>_depositdetails_id" class="depositdetails_id">
<span<?php echo $depositdetails->id->viewAttributes() ?>>
<?php echo $depositdetails->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails->DepositDate->Visible) { // DepositDate ?>
		<td<?php echo $depositdetails->DepositDate->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCnt ?>_depositdetails_DepositDate" class="depositdetails_DepositDate">
<span<?php echo $depositdetails->DepositDate->viewAttributes() ?>>
<?php echo $depositdetails->DepositDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails->TransferTo->Visible) { // TransferTo ?>
		<td<?php echo $depositdetails->TransferTo->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCnt ?>_depositdetails_TransferTo" class="depositdetails_TransferTo">
<span<?php echo $depositdetails->TransferTo->viewAttributes() ?>>
<?php echo $depositdetails->TransferTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails->OpeningBalance->Visible) { // OpeningBalance ?>
		<td<?php echo $depositdetails->OpeningBalance->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCnt ?>_depositdetails_OpeningBalance" class="depositdetails_OpeningBalance">
<span<?php echo $depositdetails->OpeningBalance->viewAttributes() ?>>
<?php echo $depositdetails->OpeningBalance->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails->Other->Visible) { // Other ?>
		<td<?php echo $depositdetails->Other->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCnt ?>_depositdetails_Other" class="depositdetails_Other">
<span<?php echo $depositdetails->Other->viewAttributes() ?>>
<?php echo $depositdetails->Other->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails->TotalCash->Visible) { // TotalCash ?>
		<td<?php echo $depositdetails->TotalCash->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCnt ?>_depositdetails_TotalCash" class="depositdetails_TotalCash">
<span<?php echo $depositdetails->TotalCash->viewAttributes() ?>>
<?php echo $depositdetails->TotalCash->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails->Cheque->Visible) { // Cheque ?>
		<td<?php echo $depositdetails->Cheque->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCnt ?>_depositdetails_Cheque" class="depositdetails_Cheque">
<span<?php echo $depositdetails->Cheque->viewAttributes() ?>>
<?php echo $depositdetails->Cheque->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails->Card->Visible) { // Card ?>
		<td<?php echo $depositdetails->Card->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCnt ?>_depositdetails_Card" class="depositdetails_Card">
<span<?php echo $depositdetails->Card->viewAttributes() ?>>
<?php echo $depositdetails->Card->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails->NEFTRTGS->Visible) { // NEFTRTGS ?>
		<td<?php echo $depositdetails->NEFTRTGS->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCnt ?>_depositdetails_NEFTRTGS" class="depositdetails_NEFTRTGS">
<span<?php echo $depositdetails->NEFTRTGS->viewAttributes() ?>>
<?php echo $depositdetails->NEFTRTGS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
		<td<?php echo $depositdetails->TotalTransferDepositAmount->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCnt ?>_depositdetails_TotalTransferDepositAmount" class="depositdetails_TotalTransferDepositAmount">
<span<?php echo $depositdetails->TotalTransferDepositAmount->viewAttributes() ?>>
<?php echo $depositdetails->TotalTransferDepositAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails->CreatedUserName->Visible) { // CreatedUserName ?>
		<td<?php echo $depositdetails->CreatedUserName->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCnt ?>_depositdetails_CreatedUserName" class="depositdetails_CreatedUserName">
<span<?php echo $depositdetails->CreatedUserName->viewAttributes() ?>>
<?php echo $depositdetails->CreatedUserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails->CashCollected->Visible) { // CashCollected ?>
		<td<?php echo $depositdetails->CashCollected->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCnt ?>_depositdetails_CashCollected" class="depositdetails_CashCollected">
<span<?php echo $depositdetails->CashCollected->viewAttributes() ?>>
<?php echo $depositdetails->CashCollected->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails->RTGS->Visible) { // RTGS ?>
		<td<?php echo $depositdetails->RTGS->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCnt ?>_depositdetails_RTGS" class="depositdetails_RTGS">
<span<?php echo $depositdetails->RTGS->viewAttributes() ?>>
<?php echo $depositdetails->RTGS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails->PAYTM->Visible) { // PAYTM ?>
		<td<?php echo $depositdetails->PAYTM->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCnt ?>_depositdetails_PAYTM" class="depositdetails_PAYTM">
<span<?php echo $depositdetails->PAYTM->viewAttributes() ?>>
<?php echo $depositdetails->PAYTM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails->ManualCash->Visible) { // ManualCash ?>
		<td<?php echo $depositdetails->ManualCash->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCnt ?>_depositdetails_ManualCash" class="depositdetails_ManualCash">
<span<?php echo $depositdetails->ManualCash->viewAttributes() ?>>
<?php echo $depositdetails->ManualCash->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails->ManualCard->Visible) { // ManualCard ?>
		<td<?php echo $depositdetails->ManualCard->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCnt ?>_depositdetails_ManualCard" class="depositdetails_ManualCard">
<span<?php echo $depositdetails->ManualCard->viewAttributes() ?>>
<?php echo $depositdetails->ManualCard->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$depositdetails_delete->Recordset->moveNext();
}
$depositdetails_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $depositdetails_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$depositdetails_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$depositdetails_delete->terminate();
?>
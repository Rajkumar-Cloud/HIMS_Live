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
<?php include_once "header.php"; ?>
<script>
var fdepositdetailsdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fdepositdetailsdelete = currentForm = new ew.Form("fdepositdetailsdelete", "delete");
	loadjs.done("fdepositdetailsdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $depositdetails_delete->showPageHeader(); ?>
<?php
$depositdetails_delete->showMessage();
?>
<form name="fdepositdetailsdelete" id="fdepositdetailsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="depositdetails">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($depositdetails_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($depositdetails_delete->id->Visible) { // id ?>
		<th class="<?php echo $depositdetails_delete->id->headerCellClass() ?>"><span id="elh_depositdetails_id" class="depositdetails_id"><?php echo $depositdetails_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails_delete->DepositDate->Visible) { // DepositDate ?>
		<th class="<?php echo $depositdetails_delete->DepositDate->headerCellClass() ?>"><span id="elh_depositdetails_DepositDate" class="depositdetails_DepositDate"><?php echo $depositdetails_delete->DepositDate->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails_delete->TransferTo->Visible) { // TransferTo ?>
		<th class="<?php echo $depositdetails_delete->TransferTo->headerCellClass() ?>"><span id="elh_depositdetails_TransferTo" class="depositdetails_TransferTo"><?php echo $depositdetails_delete->TransferTo->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails_delete->OpeningBalance->Visible) { // OpeningBalance ?>
		<th class="<?php echo $depositdetails_delete->OpeningBalance->headerCellClass() ?>"><span id="elh_depositdetails_OpeningBalance" class="depositdetails_OpeningBalance"><?php echo $depositdetails_delete->OpeningBalance->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails_delete->Other->Visible) { // Other ?>
		<th class="<?php echo $depositdetails_delete->Other->headerCellClass() ?>"><span id="elh_depositdetails_Other" class="depositdetails_Other"><?php echo $depositdetails_delete->Other->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails_delete->TotalCash->Visible) { // TotalCash ?>
		<th class="<?php echo $depositdetails_delete->TotalCash->headerCellClass() ?>"><span id="elh_depositdetails_TotalCash" class="depositdetails_TotalCash"><?php echo $depositdetails_delete->TotalCash->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails_delete->Cheque->Visible) { // Cheque ?>
		<th class="<?php echo $depositdetails_delete->Cheque->headerCellClass() ?>"><span id="elh_depositdetails_Cheque" class="depositdetails_Cheque"><?php echo $depositdetails_delete->Cheque->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails_delete->Card->Visible) { // Card ?>
		<th class="<?php echo $depositdetails_delete->Card->headerCellClass() ?>"><span id="elh_depositdetails_Card" class="depositdetails_Card"><?php echo $depositdetails_delete->Card->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails_delete->NEFTRTGS->Visible) { // NEFTRTGS ?>
		<th class="<?php echo $depositdetails_delete->NEFTRTGS->headerCellClass() ?>"><span id="elh_depositdetails_NEFTRTGS" class="depositdetails_NEFTRTGS"><?php echo $depositdetails_delete->NEFTRTGS->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails_delete->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
		<th class="<?php echo $depositdetails_delete->TotalTransferDepositAmount->headerCellClass() ?>"><span id="elh_depositdetails_TotalTransferDepositAmount" class="depositdetails_TotalTransferDepositAmount"><?php echo $depositdetails_delete->TotalTransferDepositAmount->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails_delete->CreatedUserName->Visible) { // CreatedUserName ?>
		<th class="<?php echo $depositdetails_delete->CreatedUserName->headerCellClass() ?>"><span id="elh_depositdetails_CreatedUserName" class="depositdetails_CreatedUserName"><?php echo $depositdetails_delete->CreatedUserName->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails_delete->CashCollected->Visible) { // CashCollected ?>
		<th class="<?php echo $depositdetails_delete->CashCollected->headerCellClass() ?>"><span id="elh_depositdetails_CashCollected" class="depositdetails_CashCollected"><?php echo $depositdetails_delete->CashCollected->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails_delete->RTGS->Visible) { // RTGS ?>
		<th class="<?php echo $depositdetails_delete->RTGS->headerCellClass() ?>"><span id="elh_depositdetails_RTGS" class="depositdetails_RTGS"><?php echo $depositdetails_delete->RTGS->caption() ?></span></th>
<?php } ?>
<?php if ($depositdetails_delete->PAYTM->Visible) { // PAYTM ?>
		<th class="<?php echo $depositdetails_delete->PAYTM->headerCellClass() ?>"><span id="elh_depositdetails_PAYTM" class="depositdetails_PAYTM"><?php echo $depositdetails_delete->PAYTM->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$depositdetails_delete->RecordCount = 0;
$i = 0;
while (!$depositdetails_delete->Recordset->EOF) {
	$depositdetails_delete->RecordCount++;
	$depositdetails_delete->RowCount++;

	// Set row properties
	$depositdetails->resetAttributes();
	$depositdetails->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$depositdetails_delete->loadRowValues($depositdetails_delete->Recordset);

	// Render row
	$depositdetails_delete->renderRow();
?>
	<tr <?php echo $depositdetails->rowAttributes() ?>>
<?php if ($depositdetails_delete->id->Visible) { // id ?>
		<td <?php echo $depositdetails_delete->id->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCount ?>_depositdetails_id" class="depositdetails_id">
<span<?php echo $depositdetails_delete->id->viewAttributes() ?>><?php echo $depositdetails_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails_delete->DepositDate->Visible) { // DepositDate ?>
		<td <?php echo $depositdetails_delete->DepositDate->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCount ?>_depositdetails_DepositDate" class="depositdetails_DepositDate">
<span<?php echo $depositdetails_delete->DepositDate->viewAttributes() ?>><?php echo $depositdetails_delete->DepositDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails_delete->TransferTo->Visible) { // TransferTo ?>
		<td <?php echo $depositdetails_delete->TransferTo->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCount ?>_depositdetails_TransferTo" class="depositdetails_TransferTo">
<span<?php echo $depositdetails_delete->TransferTo->viewAttributes() ?>><?php echo $depositdetails_delete->TransferTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails_delete->OpeningBalance->Visible) { // OpeningBalance ?>
		<td <?php echo $depositdetails_delete->OpeningBalance->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCount ?>_depositdetails_OpeningBalance" class="depositdetails_OpeningBalance">
<span<?php echo $depositdetails_delete->OpeningBalance->viewAttributes() ?>><?php echo $depositdetails_delete->OpeningBalance->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails_delete->Other->Visible) { // Other ?>
		<td <?php echo $depositdetails_delete->Other->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCount ?>_depositdetails_Other" class="depositdetails_Other">
<span<?php echo $depositdetails_delete->Other->viewAttributes() ?>><?php echo $depositdetails_delete->Other->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails_delete->TotalCash->Visible) { // TotalCash ?>
		<td <?php echo $depositdetails_delete->TotalCash->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCount ?>_depositdetails_TotalCash" class="depositdetails_TotalCash">
<span<?php echo $depositdetails_delete->TotalCash->viewAttributes() ?>><?php echo $depositdetails_delete->TotalCash->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails_delete->Cheque->Visible) { // Cheque ?>
		<td <?php echo $depositdetails_delete->Cheque->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCount ?>_depositdetails_Cheque" class="depositdetails_Cheque">
<span<?php echo $depositdetails_delete->Cheque->viewAttributes() ?>><?php echo $depositdetails_delete->Cheque->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails_delete->Card->Visible) { // Card ?>
		<td <?php echo $depositdetails_delete->Card->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCount ?>_depositdetails_Card" class="depositdetails_Card">
<span<?php echo $depositdetails_delete->Card->viewAttributes() ?>><?php echo $depositdetails_delete->Card->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails_delete->NEFTRTGS->Visible) { // NEFTRTGS ?>
		<td <?php echo $depositdetails_delete->NEFTRTGS->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCount ?>_depositdetails_NEFTRTGS" class="depositdetails_NEFTRTGS">
<span<?php echo $depositdetails_delete->NEFTRTGS->viewAttributes() ?>><?php echo $depositdetails_delete->NEFTRTGS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails_delete->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
		<td <?php echo $depositdetails_delete->TotalTransferDepositAmount->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCount ?>_depositdetails_TotalTransferDepositAmount" class="depositdetails_TotalTransferDepositAmount">
<span<?php echo $depositdetails_delete->TotalTransferDepositAmount->viewAttributes() ?>><?php echo $depositdetails_delete->TotalTransferDepositAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails_delete->CreatedUserName->Visible) { // CreatedUserName ?>
		<td <?php echo $depositdetails_delete->CreatedUserName->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCount ?>_depositdetails_CreatedUserName" class="depositdetails_CreatedUserName">
<span<?php echo $depositdetails_delete->CreatedUserName->viewAttributes() ?>><?php echo $depositdetails_delete->CreatedUserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails_delete->CashCollected->Visible) { // CashCollected ?>
		<td <?php echo $depositdetails_delete->CashCollected->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCount ?>_depositdetails_CashCollected" class="depositdetails_CashCollected">
<span<?php echo $depositdetails_delete->CashCollected->viewAttributes() ?>><?php echo $depositdetails_delete->CashCollected->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails_delete->RTGS->Visible) { // RTGS ?>
		<td <?php echo $depositdetails_delete->RTGS->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCount ?>_depositdetails_RTGS" class="depositdetails_RTGS">
<span<?php echo $depositdetails_delete->RTGS->viewAttributes() ?>><?php echo $depositdetails_delete->RTGS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($depositdetails_delete->PAYTM->Visible) { // PAYTM ?>
		<td <?php echo $depositdetails_delete->PAYTM->cellAttributes() ?>>
<span id="el<?php echo $depositdetails_delete->RowCount ?>_depositdetails_PAYTM" class="depositdetails_PAYTM">
<span<?php echo $depositdetails_delete->PAYTM->viewAttributes() ?>><?php echo $depositdetails_delete->PAYTM->getViewValue() ?></span>
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
$depositdetails_delete->terminate();
?>
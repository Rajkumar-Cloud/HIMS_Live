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
<?php include_once "header.php"; ?>
<script>
var fbilling_other_voucherdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fbilling_other_voucherdelete = currentForm = new ew.Form("fbilling_other_voucherdelete", "delete");
	loadjs.done("fbilling_other_voucherdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $billing_other_voucher_delete->showPageHeader(); ?>
<?php
$billing_other_voucher_delete->showMessage();
?>
<form name="fbilling_other_voucherdelete" id="fbilling_other_voucherdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_other_voucher">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($billing_other_voucher_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($billing_other_voucher_delete->id->Visible) { // id ?>
		<th class="<?php echo $billing_other_voucher_delete->id->headerCellClass() ?>"><span id="elh_billing_other_voucher_id" class="billing_other_voucher_id"><?php echo $billing_other_voucher_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher_delete->AdvanceNo->Visible) { // AdvanceNo ?>
		<th class="<?php echo $billing_other_voucher_delete->AdvanceNo->headerCellClass() ?>"><span id="elh_billing_other_voucher_AdvanceNo" class="billing_other_voucher_AdvanceNo"><?php echo $billing_other_voucher_delete->AdvanceNo->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher_delete->PatientID->Visible) { // PatientID ?>
		<th class="<?php echo $billing_other_voucher_delete->PatientID->headerCellClass() ?>"><span id="elh_billing_other_voucher_PatientID" class="billing_other_voucher_PatientID"><?php echo $billing_other_voucher_delete->PatientID->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher_delete->PatientName->Visible) { // PatientName ?>
		<th class="<?php echo $billing_other_voucher_delete->PatientName->headerCellClass() ?>"><span id="elh_billing_other_voucher_PatientName" class="billing_other_voucher_PatientName"><?php echo $billing_other_voucher_delete->PatientName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher_delete->Mobile->Visible) { // Mobile ?>
		<th class="<?php echo $billing_other_voucher_delete->Mobile->headerCellClass() ?>"><span id="elh_billing_other_voucher_Mobile" class="billing_other_voucher_Mobile"><?php echo $billing_other_voucher_delete->Mobile->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher_delete->ModeofPayment->Visible) { // ModeofPayment ?>
		<th class="<?php echo $billing_other_voucher_delete->ModeofPayment->headerCellClass() ?>"><span id="elh_billing_other_voucher_ModeofPayment" class="billing_other_voucher_ModeofPayment"><?php echo $billing_other_voucher_delete->ModeofPayment->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher_delete->Amount->Visible) { // Amount ?>
		<th class="<?php echo $billing_other_voucher_delete->Amount->headerCellClass() ?>"><span id="elh_billing_other_voucher_Amount" class="billing_other_voucher_Amount"><?php echo $billing_other_voucher_delete->Amount->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher_delete->BankName->Visible) { // BankName ?>
		<th class="<?php echo $billing_other_voucher_delete->BankName->headerCellClass() ?>"><span id="elh_billing_other_voucher_BankName" class="billing_other_voucher_BankName"><?php echo $billing_other_voucher_delete->BankName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher_delete->Date->Visible) { // Date ?>
		<th class="<?php echo $billing_other_voucher_delete->Date->headerCellClass() ?>"><span id="elh_billing_other_voucher_Date" class="billing_other_voucher_Date"><?php echo $billing_other_voucher_delete->Date->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher_delete->GetUserName->Visible) { // GetUserName ?>
		<th class="<?php echo $billing_other_voucher_delete->GetUserName->headerCellClass() ?>"><span id="elh_billing_other_voucher_GetUserName" class="billing_other_voucher_GetUserName"><?php echo $billing_other_voucher_delete->GetUserName->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher_delete->CancelAdvance->Visible) { // CancelAdvance ?>
		<th class="<?php echo $billing_other_voucher_delete->CancelAdvance->headerCellClass() ?>"><span id="elh_billing_other_voucher_CancelAdvance" class="billing_other_voucher_CancelAdvance"><?php echo $billing_other_voucher_delete->CancelAdvance->caption() ?></span></th>
<?php } ?>
<?php if ($billing_other_voucher_delete->CancelStatus->Visible) { // CancelStatus ?>
		<th class="<?php echo $billing_other_voucher_delete->CancelStatus->headerCellClass() ?>"><span id="elh_billing_other_voucher_CancelStatus" class="billing_other_voucher_CancelStatus"><?php echo $billing_other_voucher_delete->CancelStatus->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$billing_other_voucher_delete->RecordCount = 0;
$i = 0;
while (!$billing_other_voucher_delete->Recordset->EOF) {
	$billing_other_voucher_delete->RecordCount++;
	$billing_other_voucher_delete->RowCount++;

	// Set row properties
	$billing_other_voucher->resetAttributes();
	$billing_other_voucher->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$billing_other_voucher_delete->loadRowValues($billing_other_voucher_delete->Recordset);

	// Render row
	$billing_other_voucher_delete->renderRow();
?>
	<tr <?php echo $billing_other_voucher->rowAttributes() ?>>
<?php if ($billing_other_voucher_delete->id->Visible) { // id ?>
		<td <?php echo $billing_other_voucher_delete->id->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCount ?>_billing_other_voucher_id" class="billing_other_voucher_id">
<span<?php echo $billing_other_voucher_delete->id->viewAttributes() ?>><?php echo $billing_other_voucher_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher_delete->AdvanceNo->Visible) { // AdvanceNo ?>
		<td <?php echo $billing_other_voucher_delete->AdvanceNo->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCount ?>_billing_other_voucher_AdvanceNo" class="billing_other_voucher_AdvanceNo">
<span<?php echo $billing_other_voucher_delete->AdvanceNo->viewAttributes() ?>><?php echo $billing_other_voucher_delete->AdvanceNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher_delete->PatientID->Visible) { // PatientID ?>
		<td <?php echo $billing_other_voucher_delete->PatientID->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCount ?>_billing_other_voucher_PatientID" class="billing_other_voucher_PatientID">
<span<?php echo $billing_other_voucher_delete->PatientID->viewAttributes() ?>><?php echo $billing_other_voucher_delete->PatientID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher_delete->PatientName->Visible) { // PatientName ?>
		<td <?php echo $billing_other_voucher_delete->PatientName->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCount ?>_billing_other_voucher_PatientName" class="billing_other_voucher_PatientName">
<span<?php echo $billing_other_voucher_delete->PatientName->viewAttributes() ?>><?php echo $billing_other_voucher_delete->PatientName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher_delete->Mobile->Visible) { // Mobile ?>
		<td <?php echo $billing_other_voucher_delete->Mobile->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCount ?>_billing_other_voucher_Mobile" class="billing_other_voucher_Mobile">
<span<?php echo $billing_other_voucher_delete->Mobile->viewAttributes() ?>><?php echo $billing_other_voucher_delete->Mobile->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher_delete->ModeofPayment->Visible) { // ModeofPayment ?>
		<td <?php echo $billing_other_voucher_delete->ModeofPayment->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCount ?>_billing_other_voucher_ModeofPayment" class="billing_other_voucher_ModeofPayment">
<span<?php echo $billing_other_voucher_delete->ModeofPayment->viewAttributes() ?>><?php echo $billing_other_voucher_delete->ModeofPayment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher_delete->Amount->Visible) { // Amount ?>
		<td <?php echo $billing_other_voucher_delete->Amount->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCount ?>_billing_other_voucher_Amount" class="billing_other_voucher_Amount">
<span<?php echo $billing_other_voucher_delete->Amount->viewAttributes() ?>><?php echo $billing_other_voucher_delete->Amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher_delete->BankName->Visible) { // BankName ?>
		<td <?php echo $billing_other_voucher_delete->BankName->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCount ?>_billing_other_voucher_BankName" class="billing_other_voucher_BankName">
<span<?php echo $billing_other_voucher_delete->BankName->viewAttributes() ?>><?php echo $billing_other_voucher_delete->BankName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher_delete->Date->Visible) { // Date ?>
		<td <?php echo $billing_other_voucher_delete->Date->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCount ?>_billing_other_voucher_Date" class="billing_other_voucher_Date">
<span<?php echo $billing_other_voucher_delete->Date->viewAttributes() ?>><?php echo $billing_other_voucher_delete->Date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher_delete->GetUserName->Visible) { // GetUserName ?>
		<td <?php echo $billing_other_voucher_delete->GetUserName->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCount ?>_billing_other_voucher_GetUserName" class="billing_other_voucher_GetUserName">
<span<?php echo $billing_other_voucher_delete->GetUserName->viewAttributes() ?>><?php echo $billing_other_voucher_delete->GetUserName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher_delete->CancelAdvance->Visible) { // CancelAdvance ?>
		<td <?php echo $billing_other_voucher_delete->CancelAdvance->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCount ?>_billing_other_voucher_CancelAdvance" class="billing_other_voucher_CancelAdvance">
<span<?php echo $billing_other_voucher_delete->CancelAdvance->viewAttributes() ?>><?php echo $billing_other_voucher_delete->CancelAdvance->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_other_voucher_delete->CancelStatus->Visible) { // CancelStatus ?>
		<td <?php echo $billing_other_voucher_delete->CancelStatus->cellAttributes() ?>>
<span id="el<?php echo $billing_other_voucher_delete->RowCount ?>_billing_other_voucher_CancelStatus" class="billing_other_voucher_CancelStatus">
<span<?php echo $billing_other_voucher_delete->CancelStatus->viewAttributes() ?>><?php echo $billing_other_voucher_delete->CancelStatus->getViewValue() ?></span>
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
$billing_other_voucher_delete->terminate();
?>
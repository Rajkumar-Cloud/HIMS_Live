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
$pharmacy_grn_delete = new pharmacy_grn_delete();

// Run the page
$pharmacy_grn_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_grn_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_grndelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpharmacy_grndelete = currentForm = new ew.Form("fpharmacy_grndelete", "delete");
	loadjs.done("fpharmacy_grndelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_grn_delete->showPageHeader(); ?>
<?php
$pharmacy_grn_delete->showMessage();
?>
<form name="fpharmacy_grndelete" id="fpharmacy_grndelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_grn">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_grn_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_grn_delete->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_grn_delete->id->headerCellClass() ?>"><span id="elh_pharmacy_grn_id" class="pharmacy_grn_id"><?php echo $pharmacy_grn_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn_delete->GRNNO->Visible) { // GRNNO ?>
		<th class="<?php echo $pharmacy_grn_delete->GRNNO->headerCellClass() ?>"><span id="elh_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO"><?php echo $pharmacy_grn_delete->GRNNO->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn_delete->DT->Visible) { // DT ?>
		<th class="<?php echo $pharmacy_grn_delete->DT->headerCellClass() ?>"><span id="elh_pharmacy_grn_DT" class="pharmacy_grn_DT"><?php echo $pharmacy_grn_delete->DT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn_delete->Customername->Visible) { // Customername ?>
		<th class="<?php echo $pharmacy_grn_delete->Customername->headerCellClass() ?>"><span id="elh_pharmacy_grn_Customername" class="pharmacy_grn_Customername"><?php echo $pharmacy_grn_delete->Customername->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn_delete->State->Visible) { // State ?>
		<th class="<?php echo $pharmacy_grn_delete->State->headerCellClass() ?>"><span id="elh_pharmacy_grn_State" class="pharmacy_grn_State"><?php echo $pharmacy_grn_delete->State->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn_delete->Pincode->Visible) { // Pincode ?>
		<th class="<?php echo $pharmacy_grn_delete->Pincode->headerCellClass() ?>"><span id="elh_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode"><?php echo $pharmacy_grn_delete->Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn_delete->Phone->Visible) { // Phone ?>
		<th class="<?php echo $pharmacy_grn_delete->Phone->headerCellClass() ?>"><span id="elh_pharmacy_grn_Phone" class="pharmacy_grn_Phone"><?php echo $pharmacy_grn_delete->Phone->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn_delete->BILLNO->Visible) { // BILLNO ?>
		<th class="<?php echo $pharmacy_grn_delete->BILLNO->headerCellClass() ?>"><span id="elh_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO"><?php echo $pharmacy_grn_delete->BILLNO->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn_delete->BILLDT->Visible) { // BILLDT ?>
		<th class="<?php echo $pharmacy_grn_delete->BILLDT->headerCellClass() ?>"><span id="elh_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT"><?php echo $pharmacy_grn_delete->BILLDT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn_delete->BillTotalValue->Visible) { // BillTotalValue ?>
		<th class="<?php echo $pharmacy_grn_delete->BillTotalValue->headerCellClass() ?>"><span id="elh_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue"><?php echo $pharmacy_grn_delete->BillTotalValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn_delete->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<th class="<?php echo $pharmacy_grn_delete->GRNTotalValue->headerCellClass() ?>"><span id="elh_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue"><?php echo $pharmacy_grn_delete->GRNTotalValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn_delete->BillDiscount->Visible) { // BillDiscount ?>
		<th class="<?php echo $pharmacy_grn_delete->BillDiscount->headerCellClass() ?>"><span id="elh_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount"><?php echo $pharmacy_grn_delete->BillDiscount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn_delete->GrnValue->Visible) { // GrnValue ?>
		<th class="<?php echo $pharmacy_grn_delete->GrnValue->headerCellClass() ?>"><span id="elh_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue"><?php echo $pharmacy_grn_delete->GrnValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn_delete->Pid->Visible) { // Pid ?>
		<th class="<?php echo $pharmacy_grn_delete->Pid->headerCellClass() ?>"><span id="elh_pharmacy_grn_Pid" class="pharmacy_grn_Pid"><?php echo $pharmacy_grn_delete->Pid->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn_delete->PaymentNo->Visible) { // PaymentNo ?>
		<th class="<?php echo $pharmacy_grn_delete->PaymentNo->headerCellClass() ?>"><span id="elh_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo"><?php echo $pharmacy_grn_delete->PaymentNo->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn_delete->PaymentStatus->Visible) { // PaymentStatus ?>
		<th class="<?php echo $pharmacy_grn_delete->PaymentStatus->headerCellClass() ?>"><span id="elh_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus"><?php echo $pharmacy_grn_delete->PaymentStatus->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn_delete->PaidAmount->Visible) { // PaidAmount ?>
		<th class="<?php echo $pharmacy_grn_delete->PaidAmount->headerCellClass() ?>"><span id="elh_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount"><?php echo $pharmacy_grn_delete->PaidAmount->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_grn_delete->RecordCount = 0;
$i = 0;
while (!$pharmacy_grn_delete->Recordset->EOF) {
	$pharmacy_grn_delete->RecordCount++;
	$pharmacy_grn_delete->RowCount++;

	// Set row properties
	$pharmacy_grn->resetAttributes();
	$pharmacy_grn->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_grn_delete->loadRowValues($pharmacy_grn_delete->Recordset);

	// Render row
	$pharmacy_grn_delete->renderRow();
?>
	<tr <?php echo $pharmacy_grn->rowAttributes() ?>>
<?php if ($pharmacy_grn_delete->id->Visible) { // id ?>
		<td <?php echo $pharmacy_grn_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCount ?>_pharmacy_grn_id" class="pharmacy_grn_id">
<span<?php echo $pharmacy_grn_delete->id->viewAttributes() ?>><?php echo $pharmacy_grn_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_delete->GRNNO->Visible) { // GRNNO ?>
		<td <?php echo $pharmacy_grn_delete->GRNNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCount ?>_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO">
<span<?php echo $pharmacy_grn_delete->GRNNO->viewAttributes() ?>><?php echo $pharmacy_grn_delete->GRNNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_delete->DT->Visible) { // DT ?>
		<td <?php echo $pharmacy_grn_delete->DT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCount ?>_pharmacy_grn_DT" class="pharmacy_grn_DT">
<span<?php echo $pharmacy_grn_delete->DT->viewAttributes() ?>><?php echo $pharmacy_grn_delete->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_delete->Customername->Visible) { // Customername ?>
		<td <?php echo $pharmacy_grn_delete->Customername->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCount ?>_pharmacy_grn_Customername" class="pharmacy_grn_Customername">
<span<?php echo $pharmacy_grn_delete->Customername->viewAttributes() ?>><?php echo $pharmacy_grn_delete->Customername->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_delete->State->Visible) { // State ?>
		<td <?php echo $pharmacy_grn_delete->State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCount ?>_pharmacy_grn_State" class="pharmacy_grn_State">
<span<?php echo $pharmacy_grn_delete->State->viewAttributes() ?>><?php echo $pharmacy_grn_delete->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_delete->Pincode->Visible) { // Pincode ?>
		<td <?php echo $pharmacy_grn_delete->Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCount ?>_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode">
<span<?php echo $pharmacy_grn_delete->Pincode->viewAttributes() ?>><?php echo $pharmacy_grn_delete->Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_delete->Phone->Visible) { // Phone ?>
		<td <?php echo $pharmacy_grn_delete->Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCount ?>_pharmacy_grn_Phone" class="pharmacy_grn_Phone">
<span<?php echo $pharmacy_grn_delete->Phone->viewAttributes() ?>><?php echo $pharmacy_grn_delete->Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_delete->BILLNO->Visible) { // BILLNO ?>
		<td <?php echo $pharmacy_grn_delete->BILLNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCount ?>_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO">
<span<?php echo $pharmacy_grn_delete->BILLNO->viewAttributes() ?>><?php echo $pharmacy_grn_delete->BILLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_delete->BILLDT->Visible) { // BILLDT ?>
		<td <?php echo $pharmacy_grn_delete->BILLDT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCount ?>_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT">
<span<?php echo $pharmacy_grn_delete->BILLDT->viewAttributes() ?>><?php echo $pharmacy_grn_delete->BILLDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_delete->BillTotalValue->Visible) { // BillTotalValue ?>
		<td <?php echo $pharmacy_grn_delete->BillTotalValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCount ?>_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue">
<span<?php echo $pharmacy_grn_delete->BillTotalValue->viewAttributes() ?>><?php echo $pharmacy_grn_delete->BillTotalValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_delete->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td <?php echo $pharmacy_grn_delete->GRNTotalValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCount ?>_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue">
<span<?php echo $pharmacy_grn_delete->GRNTotalValue->viewAttributes() ?>><?php echo $pharmacy_grn_delete->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_delete->BillDiscount->Visible) { // BillDiscount ?>
		<td <?php echo $pharmacy_grn_delete->BillDiscount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCount ?>_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount">
<span<?php echo $pharmacy_grn_delete->BillDiscount->viewAttributes() ?>><?php echo $pharmacy_grn_delete->BillDiscount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_delete->GrnValue->Visible) { // GrnValue ?>
		<td <?php echo $pharmacy_grn_delete->GrnValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCount ?>_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue">
<span<?php echo $pharmacy_grn_delete->GrnValue->viewAttributes() ?>><?php echo $pharmacy_grn_delete->GrnValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_delete->Pid->Visible) { // Pid ?>
		<td <?php echo $pharmacy_grn_delete->Pid->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCount ?>_pharmacy_grn_Pid" class="pharmacy_grn_Pid">
<span<?php echo $pharmacy_grn_delete->Pid->viewAttributes() ?>><?php echo $pharmacy_grn_delete->Pid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_delete->PaymentNo->Visible) { // PaymentNo ?>
		<td <?php echo $pharmacy_grn_delete->PaymentNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCount ?>_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo">
<span<?php echo $pharmacy_grn_delete->PaymentNo->viewAttributes() ?>><?php echo $pharmacy_grn_delete->PaymentNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_delete->PaymentStatus->Visible) { // PaymentStatus ?>
		<td <?php echo $pharmacy_grn_delete->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCount ?>_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus">
<span<?php echo $pharmacy_grn_delete->PaymentStatus->viewAttributes() ?>><?php echo $pharmacy_grn_delete->PaymentStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn_delete->PaidAmount->Visible) { // PaidAmount ?>
		<td <?php echo $pharmacy_grn_delete->PaidAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCount ?>_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount">
<span<?php echo $pharmacy_grn_delete->PaidAmount->viewAttributes() ?>><?php echo $pharmacy_grn_delete->PaidAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_grn_delete->Recordset->moveNext();
}
$pharmacy_grn_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_grn_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_grn_delete->showPageFooter();
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
$pharmacy_grn_delete->terminate();
?>
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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacy_grndelete = currentForm = new ew.Form("fpharmacy_grndelete", "delete");

// Form_CustomValidate event
fpharmacy_grndelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_grndelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_grn_delete->showPageHeader(); ?>
<?php
$pharmacy_grn_delete->showMessage();
?>
<form name="fpharmacy_grndelete" id="fpharmacy_grndelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_grn_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_grn_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_grn">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_grn_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_grn->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_grn->id->headerCellClass() ?>"><span id="elh_pharmacy_grn_id" class="pharmacy_grn_id"><?php echo $pharmacy_grn->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn->GRNNO->Visible) { // GRNNO ?>
		<th class="<?php echo $pharmacy_grn->GRNNO->headerCellClass() ?>"><span id="elh_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO"><?php echo $pharmacy_grn->GRNNO->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn->DT->Visible) { // DT ?>
		<th class="<?php echo $pharmacy_grn->DT->headerCellClass() ?>"><span id="elh_pharmacy_grn_DT" class="pharmacy_grn_DT"><?php echo $pharmacy_grn->DT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn->Customername->Visible) { // Customername ?>
		<th class="<?php echo $pharmacy_grn->Customername->headerCellClass() ?>"><span id="elh_pharmacy_grn_Customername" class="pharmacy_grn_Customername"><?php echo $pharmacy_grn->Customername->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn->State->Visible) { // State ?>
		<th class="<?php echo $pharmacy_grn->State->headerCellClass() ?>"><span id="elh_pharmacy_grn_State" class="pharmacy_grn_State"><?php echo $pharmacy_grn->State->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn->Pincode->Visible) { // Pincode ?>
		<th class="<?php echo $pharmacy_grn->Pincode->headerCellClass() ?>"><span id="elh_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode"><?php echo $pharmacy_grn->Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn->Phone->Visible) { // Phone ?>
		<th class="<?php echo $pharmacy_grn->Phone->headerCellClass() ?>"><span id="elh_pharmacy_grn_Phone" class="pharmacy_grn_Phone"><?php echo $pharmacy_grn->Phone->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn->BILLNO->Visible) { // BILLNO ?>
		<th class="<?php echo $pharmacy_grn->BILLNO->headerCellClass() ?>"><span id="elh_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO"><?php echo $pharmacy_grn->BILLNO->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn->BILLDT->Visible) { // BILLDT ?>
		<th class="<?php echo $pharmacy_grn->BILLDT->headerCellClass() ?>"><span id="elh_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT"><?php echo $pharmacy_grn->BILLDT->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn->BillTotalValue->Visible) { // BillTotalValue ?>
		<th class="<?php echo $pharmacy_grn->BillTotalValue->headerCellClass() ?>"><span id="elh_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue"><?php echo $pharmacy_grn->BillTotalValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<th class="<?php echo $pharmacy_grn->GRNTotalValue->headerCellClass() ?>"><span id="elh_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue"><?php echo $pharmacy_grn->GRNTotalValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn->BillDiscount->Visible) { // BillDiscount ?>
		<th class="<?php echo $pharmacy_grn->BillDiscount->headerCellClass() ?>"><span id="elh_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount"><?php echo $pharmacy_grn->BillDiscount->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn->GrnValue->Visible) { // GrnValue ?>
		<th class="<?php echo $pharmacy_grn->GrnValue->headerCellClass() ?>"><span id="elh_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue"><?php echo $pharmacy_grn->GrnValue->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn->Pid->Visible) { // Pid ?>
		<th class="<?php echo $pharmacy_grn->Pid->headerCellClass() ?>"><span id="elh_pharmacy_grn_Pid" class="pharmacy_grn_Pid"><?php echo $pharmacy_grn->Pid->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn->PaymentNo->Visible) { // PaymentNo ?>
		<th class="<?php echo $pharmacy_grn->PaymentNo->headerCellClass() ?>"><span id="elh_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo"><?php echo $pharmacy_grn->PaymentNo->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn->PaymentStatus->Visible) { // PaymentStatus ?>
		<th class="<?php echo $pharmacy_grn->PaymentStatus->headerCellClass() ?>"><span id="elh_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus"><?php echo $pharmacy_grn->PaymentStatus->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_grn->PaidAmount->Visible) { // PaidAmount ?>
		<th class="<?php echo $pharmacy_grn->PaidAmount->headerCellClass() ?>"><span id="elh_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount"><?php echo $pharmacy_grn->PaidAmount->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_grn_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_grn_delete->Recordset->EOF) {
	$pharmacy_grn_delete->RecCnt++;
	$pharmacy_grn_delete->RowCnt++;

	// Set row properties
	$pharmacy_grn->resetAttributes();
	$pharmacy_grn->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_grn_delete->loadRowValues($pharmacy_grn_delete->Recordset);

	// Render row
	$pharmacy_grn_delete->renderRow();
?>
	<tr<?php echo $pharmacy_grn->rowAttributes() ?>>
<?php if ($pharmacy_grn->id->Visible) { // id ?>
		<td<?php echo $pharmacy_grn->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCnt ?>_pharmacy_grn_id" class="pharmacy_grn_id">
<span<?php echo $pharmacy_grn->id->viewAttributes() ?>>
<?php echo $pharmacy_grn->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->GRNNO->Visible) { // GRNNO ?>
		<td<?php echo $pharmacy_grn->GRNNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCnt ?>_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO">
<span<?php echo $pharmacy_grn->GRNNO->viewAttributes() ?>>
<?php echo $pharmacy_grn->GRNNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->DT->Visible) { // DT ?>
		<td<?php echo $pharmacy_grn->DT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCnt ?>_pharmacy_grn_DT" class="pharmacy_grn_DT">
<span<?php echo $pharmacy_grn->DT->viewAttributes() ?>>
<?php echo $pharmacy_grn->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->Customername->Visible) { // Customername ?>
		<td<?php echo $pharmacy_grn->Customername->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCnt ?>_pharmacy_grn_Customername" class="pharmacy_grn_Customername">
<span<?php echo $pharmacy_grn->Customername->viewAttributes() ?>>
<?php echo $pharmacy_grn->Customername->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->State->Visible) { // State ?>
		<td<?php echo $pharmacy_grn->State->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCnt ?>_pharmacy_grn_State" class="pharmacy_grn_State">
<span<?php echo $pharmacy_grn->State->viewAttributes() ?>>
<?php echo $pharmacy_grn->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->Pincode->Visible) { // Pincode ?>
		<td<?php echo $pharmacy_grn->Pincode->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCnt ?>_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode">
<span<?php echo $pharmacy_grn->Pincode->viewAttributes() ?>>
<?php echo $pharmacy_grn->Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->Phone->Visible) { // Phone ?>
		<td<?php echo $pharmacy_grn->Phone->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCnt ?>_pharmacy_grn_Phone" class="pharmacy_grn_Phone">
<span<?php echo $pharmacy_grn->Phone->viewAttributes() ?>>
<?php echo $pharmacy_grn->Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->BILLNO->Visible) { // BILLNO ?>
		<td<?php echo $pharmacy_grn->BILLNO->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCnt ?>_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO">
<span<?php echo $pharmacy_grn->BILLNO->viewAttributes() ?>>
<?php echo $pharmacy_grn->BILLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->BILLDT->Visible) { // BILLDT ?>
		<td<?php echo $pharmacy_grn->BILLDT->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCnt ?>_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT">
<span<?php echo $pharmacy_grn->BILLDT->viewAttributes() ?>>
<?php echo $pharmacy_grn->BILLDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->BillTotalValue->Visible) { // BillTotalValue ?>
		<td<?php echo $pharmacy_grn->BillTotalValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCnt ?>_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue">
<span<?php echo $pharmacy_grn->BillTotalValue->viewAttributes() ?>>
<?php echo $pharmacy_grn->BillTotalValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td<?php echo $pharmacy_grn->GRNTotalValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCnt ?>_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue">
<span<?php echo $pharmacy_grn->GRNTotalValue->viewAttributes() ?>>
<?php echo $pharmacy_grn->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->BillDiscount->Visible) { // BillDiscount ?>
		<td<?php echo $pharmacy_grn->BillDiscount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCnt ?>_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount">
<span<?php echo $pharmacy_grn->BillDiscount->viewAttributes() ?>>
<?php echo $pharmacy_grn->BillDiscount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->GrnValue->Visible) { // GrnValue ?>
		<td<?php echo $pharmacy_grn->GrnValue->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCnt ?>_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue">
<span<?php echo $pharmacy_grn->GrnValue->viewAttributes() ?>>
<?php echo $pharmacy_grn->GrnValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->Pid->Visible) { // Pid ?>
		<td<?php echo $pharmacy_grn->Pid->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCnt ?>_pharmacy_grn_Pid" class="pharmacy_grn_Pid">
<span<?php echo $pharmacy_grn->Pid->viewAttributes() ?>>
<?php echo $pharmacy_grn->Pid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->PaymentNo->Visible) { // PaymentNo ?>
		<td<?php echo $pharmacy_grn->PaymentNo->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCnt ?>_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo">
<span<?php echo $pharmacy_grn->PaymentNo->viewAttributes() ?>>
<?php echo $pharmacy_grn->PaymentNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->PaymentStatus->Visible) { // PaymentStatus ?>
		<td<?php echo $pharmacy_grn->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCnt ?>_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus">
<span<?php echo $pharmacy_grn->PaymentStatus->viewAttributes() ?>>
<?php echo $pharmacy_grn->PaymentStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_grn->PaidAmount->Visible) { // PaidAmount ?>
		<td<?php echo $pharmacy_grn->PaidAmount->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_grn_delete->RowCnt ?>_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount">
<span<?php echo $pharmacy_grn->PaidAmount->viewAttributes() ?>>
<?php echo $pharmacy_grn->PaidAmount->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_grn_delete->terminate();
?>
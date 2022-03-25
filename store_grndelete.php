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
$store_grn_delete = new store_grn_delete();

// Run the page
$store_grn_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$store_grn_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fstore_grndelete = currentForm = new ew.Form("fstore_grndelete", "delete");

// Form_CustomValidate event
fstore_grndelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fstore_grndelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $store_grn_delete->showPageHeader(); ?>
<?php
$store_grn_delete->showMessage();
?>
<form name="fstore_grndelete" id="fstore_grndelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($store_grn_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $store_grn_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="store_grn">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($store_grn_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($store_grn->id->Visible) { // id ?>
		<th class="<?php echo $store_grn->id->headerCellClass() ?>"><span id="elh_store_grn_id" class="store_grn_id"><?php echo $store_grn->id->caption() ?></span></th>
<?php } ?>
<?php if ($store_grn->GRNNO->Visible) { // GRNNO ?>
		<th class="<?php echo $store_grn->GRNNO->headerCellClass() ?>"><span id="elh_store_grn_GRNNO" class="store_grn_GRNNO"><?php echo $store_grn->GRNNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_grn->DT->Visible) { // DT ?>
		<th class="<?php echo $store_grn->DT->headerCellClass() ?>"><span id="elh_store_grn_DT" class="store_grn_DT"><?php echo $store_grn->DT->caption() ?></span></th>
<?php } ?>
<?php if ($store_grn->Customername->Visible) { // Customername ?>
		<th class="<?php echo $store_grn->Customername->headerCellClass() ?>"><span id="elh_store_grn_Customername" class="store_grn_Customername"><?php echo $store_grn->Customername->caption() ?></span></th>
<?php } ?>
<?php if ($store_grn->State->Visible) { // State ?>
		<th class="<?php echo $store_grn->State->headerCellClass() ?>"><span id="elh_store_grn_State" class="store_grn_State"><?php echo $store_grn->State->caption() ?></span></th>
<?php } ?>
<?php if ($store_grn->Pincode->Visible) { // Pincode ?>
		<th class="<?php echo $store_grn->Pincode->headerCellClass() ?>"><span id="elh_store_grn_Pincode" class="store_grn_Pincode"><?php echo $store_grn->Pincode->caption() ?></span></th>
<?php } ?>
<?php if ($store_grn->Phone->Visible) { // Phone ?>
		<th class="<?php echo $store_grn->Phone->headerCellClass() ?>"><span id="elh_store_grn_Phone" class="store_grn_Phone"><?php echo $store_grn->Phone->caption() ?></span></th>
<?php } ?>
<?php if ($store_grn->BILLNO->Visible) { // BILLNO ?>
		<th class="<?php echo $store_grn->BILLNO->headerCellClass() ?>"><span id="elh_store_grn_BILLNO" class="store_grn_BILLNO"><?php echo $store_grn->BILLNO->caption() ?></span></th>
<?php } ?>
<?php if ($store_grn->BILLDT->Visible) { // BILLDT ?>
		<th class="<?php echo $store_grn->BILLDT->headerCellClass() ?>"><span id="elh_store_grn_BILLDT" class="store_grn_BILLDT"><?php echo $store_grn->BILLDT->caption() ?></span></th>
<?php } ?>
<?php if ($store_grn->BillTotalValue->Visible) { // BillTotalValue ?>
		<th class="<?php echo $store_grn->BillTotalValue->headerCellClass() ?>"><span id="elh_store_grn_BillTotalValue" class="store_grn_BillTotalValue"><?php echo $store_grn->BillTotalValue->caption() ?></span></th>
<?php } ?>
<?php if ($store_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<th class="<?php echo $store_grn->GRNTotalValue->headerCellClass() ?>"><span id="elh_store_grn_GRNTotalValue" class="store_grn_GRNTotalValue"><?php echo $store_grn->GRNTotalValue->caption() ?></span></th>
<?php } ?>
<?php if ($store_grn->BillDiscount->Visible) { // BillDiscount ?>
		<th class="<?php echo $store_grn->BillDiscount->headerCellClass() ?>"><span id="elh_store_grn_BillDiscount" class="store_grn_BillDiscount"><?php echo $store_grn->BillDiscount->caption() ?></span></th>
<?php } ?>
<?php if ($store_grn->GrnValue->Visible) { // GrnValue ?>
		<th class="<?php echo $store_grn->GrnValue->headerCellClass() ?>"><span id="elh_store_grn_GrnValue" class="store_grn_GrnValue"><?php echo $store_grn->GrnValue->caption() ?></span></th>
<?php } ?>
<?php if ($store_grn->Pid->Visible) { // Pid ?>
		<th class="<?php echo $store_grn->Pid->headerCellClass() ?>"><span id="elh_store_grn_Pid" class="store_grn_Pid"><?php echo $store_grn->Pid->caption() ?></span></th>
<?php } ?>
<?php if ($store_grn->PaymentNo->Visible) { // PaymentNo ?>
		<th class="<?php echo $store_grn->PaymentNo->headerCellClass() ?>"><span id="elh_store_grn_PaymentNo" class="store_grn_PaymentNo"><?php echo $store_grn->PaymentNo->caption() ?></span></th>
<?php } ?>
<?php if ($store_grn->PaymentStatus->Visible) { // PaymentStatus ?>
		<th class="<?php echo $store_grn->PaymentStatus->headerCellClass() ?>"><span id="elh_store_grn_PaymentStatus" class="store_grn_PaymentStatus"><?php echo $store_grn->PaymentStatus->caption() ?></span></th>
<?php } ?>
<?php if ($store_grn->PaidAmount->Visible) { // PaidAmount ?>
		<th class="<?php echo $store_grn->PaidAmount->headerCellClass() ?>"><span id="elh_store_grn_PaidAmount" class="store_grn_PaidAmount"><?php echo $store_grn->PaidAmount->caption() ?></span></th>
<?php } ?>
<?php if ($store_grn->StoreID->Visible) { // StoreID ?>
		<th class="<?php echo $store_grn->StoreID->headerCellClass() ?>"><span id="elh_store_grn_StoreID" class="store_grn_StoreID"><?php echo $store_grn->StoreID->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$store_grn_delete->RecCnt = 0;
$i = 0;
while (!$store_grn_delete->Recordset->EOF) {
	$store_grn_delete->RecCnt++;
	$store_grn_delete->RowCnt++;

	// Set row properties
	$store_grn->resetAttributes();
	$store_grn->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$store_grn_delete->loadRowValues($store_grn_delete->Recordset);

	// Render row
	$store_grn_delete->renderRow();
?>
	<tr<?php echo $store_grn->rowAttributes() ?>>
<?php if ($store_grn->id->Visible) { // id ?>
		<td<?php echo $store_grn->id->cellAttributes() ?>>
<span id="el<?php echo $store_grn_delete->RowCnt ?>_store_grn_id" class="store_grn_id">
<span<?php echo $store_grn->id->viewAttributes() ?>>
<?php echo $store_grn->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_grn->GRNNO->Visible) { // GRNNO ?>
		<td<?php echo $store_grn->GRNNO->cellAttributes() ?>>
<span id="el<?php echo $store_grn_delete->RowCnt ?>_store_grn_GRNNO" class="store_grn_GRNNO">
<span<?php echo $store_grn->GRNNO->viewAttributes() ?>>
<?php echo $store_grn->GRNNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_grn->DT->Visible) { // DT ?>
		<td<?php echo $store_grn->DT->cellAttributes() ?>>
<span id="el<?php echo $store_grn_delete->RowCnt ?>_store_grn_DT" class="store_grn_DT">
<span<?php echo $store_grn->DT->viewAttributes() ?>>
<?php echo $store_grn->DT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_grn->Customername->Visible) { // Customername ?>
		<td<?php echo $store_grn->Customername->cellAttributes() ?>>
<span id="el<?php echo $store_grn_delete->RowCnt ?>_store_grn_Customername" class="store_grn_Customername">
<span<?php echo $store_grn->Customername->viewAttributes() ?>>
<?php echo $store_grn->Customername->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_grn->State->Visible) { // State ?>
		<td<?php echo $store_grn->State->cellAttributes() ?>>
<span id="el<?php echo $store_grn_delete->RowCnt ?>_store_grn_State" class="store_grn_State">
<span<?php echo $store_grn->State->viewAttributes() ?>>
<?php echo $store_grn->State->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_grn->Pincode->Visible) { // Pincode ?>
		<td<?php echo $store_grn->Pincode->cellAttributes() ?>>
<span id="el<?php echo $store_grn_delete->RowCnt ?>_store_grn_Pincode" class="store_grn_Pincode">
<span<?php echo $store_grn->Pincode->viewAttributes() ?>>
<?php echo $store_grn->Pincode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_grn->Phone->Visible) { // Phone ?>
		<td<?php echo $store_grn->Phone->cellAttributes() ?>>
<span id="el<?php echo $store_grn_delete->RowCnt ?>_store_grn_Phone" class="store_grn_Phone">
<span<?php echo $store_grn->Phone->viewAttributes() ?>>
<?php echo $store_grn->Phone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_grn->BILLNO->Visible) { // BILLNO ?>
		<td<?php echo $store_grn->BILLNO->cellAttributes() ?>>
<span id="el<?php echo $store_grn_delete->RowCnt ?>_store_grn_BILLNO" class="store_grn_BILLNO">
<span<?php echo $store_grn->BILLNO->viewAttributes() ?>>
<?php echo $store_grn->BILLNO->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_grn->BILLDT->Visible) { // BILLDT ?>
		<td<?php echo $store_grn->BILLDT->cellAttributes() ?>>
<span id="el<?php echo $store_grn_delete->RowCnt ?>_store_grn_BILLDT" class="store_grn_BILLDT">
<span<?php echo $store_grn->BILLDT->viewAttributes() ?>>
<?php echo $store_grn->BILLDT->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_grn->BillTotalValue->Visible) { // BillTotalValue ?>
		<td<?php echo $store_grn->BillTotalValue->cellAttributes() ?>>
<span id="el<?php echo $store_grn_delete->RowCnt ?>_store_grn_BillTotalValue" class="store_grn_BillTotalValue">
<span<?php echo $store_grn->BillTotalValue->viewAttributes() ?>>
<?php echo $store_grn->BillTotalValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_grn->GRNTotalValue->Visible) { // GRNTotalValue ?>
		<td<?php echo $store_grn->GRNTotalValue->cellAttributes() ?>>
<span id="el<?php echo $store_grn_delete->RowCnt ?>_store_grn_GRNTotalValue" class="store_grn_GRNTotalValue">
<span<?php echo $store_grn->GRNTotalValue->viewAttributes() ?>>
<?php echo $store_grn->GRNTotalValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_grn->BillDiscount->Visible) { // BillDiscount ?>
		<td<?php echo $store_grn->BillDiscount->cellAttributes() ?>>
<span id="el<?php echo $store_grn_delete->RowCnt ?>_store_grn_BillDiscount" class="store_grn_BillDiscount">
<span<?php echo $store_grn->BillDiscount->viewAttributes() ?>>
<?php echo $store_grn->BillDiscount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_grn->GrnValue->Visible) { // GrnValue ?>
		<td<?php echo $store_grn->GrnValue->cellAttributes() ?>>
<span id="el<?php echo $store_grn_delete->RowCnt ?>_store_grn_GrnValue" class="store_grn_GrnValue">
<span<?php echo $store_grn->GrnValue->viewAttributes() ?>>
<?php echo $store_grn->GrnValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_grn->Pid->Visible) { // Pid ?>
		<td<?php echo $store_grn->Pid->cellAttributes() ?>>
<span id="el<?php echo $store_grn_delete->RowCnt ?>_store_grn_Pid" class="store_grn_Pid">
<span<?php echo $store_grn->Pid->viewAttributes() ?>>
<?php echo $store_grn->Pid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_grn->PaymentNo->Visible) { // PaymentNo ?>
		<td<?php echo $store_grn->PaymentNo->cellAttributes() ?>>
<span id="el<?php echo $store_grn_delete->RowCnt ?>_store_grn_PaymentNo" class="store_grn_PaymentNo">
<span<?php echo $store_grn->PaymentNo->viewAttributes() ?>>
<?php echo $store_grn->PaymentNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_grn->PaymentStatus->Visible) { // PaymentStatus ?>
		<td<?php echo $store_grn->PaymentStatus->cellAttributes() ?>>
<span id="el<?php echo $store_grn_delete->RowCnt ?>_store_grn_PaymentStatus" class="store_grn_PaymentStatus">
<span<?php echo $store_grn->PaymentStatus->viewAttributes() ?>>
<?php echo $store_grn->PaymentStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_grn->PaidAmount->Visible) { // PaidAmount ?>
		<td<?php echo $store_grn->PaidAmount->cellAttributes() ?>>
<span id="el<?php echo $store_grn_delete->RowCnt ?>_store_grn_PaidAmount" class="store_grn_PaidAmount">
<span<?php echo $store_grn->PaidAmount->viewAttributes() ?>>
<?php echo $store_grn->PaidAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($store_grn->StoreID->Visible) { // StoreID ?>
		<td<?php echo $store_grn->StoreID->cellAttributes() ?>>
<span id="el<?php echo $store_grn_delete->RowCnt ?>_store_grn_StoreID" class="store_grn_StoreID">
<span<?php echo $store_grn->StoreID->viewAttributes() ?>>
<?php echo $store_grn->StoreID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$store_grn_delete->Recordset->moveNext();
}
$store_grn_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $store_grn_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$store_grn_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$store_grn_delete->terminate();
?>
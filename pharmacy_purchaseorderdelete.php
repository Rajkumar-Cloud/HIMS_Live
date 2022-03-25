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
$pharmacy_purchaseorder_delete = new pharmacy_purchaseorder_delete();

// Run the page
$pharmacy_purchaseorder_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchaseorder_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacy_purchaseorderdelete = currentForm = new ew.Form("fpharmacy_purchaseorderdelete", "delete");

// Form_CustomValidate event
fpharmacy_purchaseorderdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_purchaseorderdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_purchaseorderdelete.lists["x_PRC"] = <?php echo $pharmacy_purchaseorder_delete->PRC->Lookup->toClientList() ?>;
fpharmacy_purchaseorderdelete.lists["x_PRC"].options = <?php echo JsonEncode($pharmacy_purchaseorder_delete->PRC->lookupOptions()) ?>;
fpharmacy_purchaseorderdelete.autoSuggests["x_PRC"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_purchaseorder_delete->showPageHeader(); ?>
<?php
$pharmacy_purchaseorder_delete->showMessage();
?>
<form name="fpharmacy_purchaseorderdelete" id="fpharmacy_purchaseorderdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_purchaseorder_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_purchaseorder_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchaseorder">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_purchaseorder_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_purchaseorder->PRC->Visible) { // PRC ?>
		<th class="<?php echo $pharmacy_purchaseorder->PRC->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_PRC" class="pharmacy_purchaseorder_PRC"><?php echo $pharmacy_purchaseorder->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder->QTY->Visible) { // QTY ?>
		<th class="<?php echo $pharmacy_purchaseorder->QTY->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_QTY" class="pharmacy_purchaseorder_QTY"><?php echo $pharmacy_purchaseorder->QTY->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder->Stock->Visible) { // Stock ?>
		<th class="<?php echo $pharmacy_purchaseorder->Stock->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_Stock" class="pharmacy_purchaseorder_Stock"><?php echo $pharmacy_purchaseorder->Stock->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder->LastMonthSale->Visible) { // LastMonthSale ?>
		<th class="<?php echo $pharmacy_purchaseorder->LastMonthSale->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_LastMonthSale" class="pharmacy_purchaseorder_LastMonthSale"><?php echo $pharmacy_purchaseorder->LastMonthSale->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder->HospID->Visible) { // HospID ?>
		<th class="<?php echo $pharmacy_purchaseorder->HospID->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_HospID" class="pharmacy_purchaseorder_HospID"><?php echo $pharmacy_purchaseorder->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CreatedBy->Visible) { // CreatedBy ?>
		<th class="<?php echo $pharmacy_purchaseorder->CreatedBy->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_CreatedBy" class="pharmacy_purchaseorder_CreatedBy"><?php echo $pharmacy_purchaseorder->CreatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<th class="<?php echo $pharmacy_purchaseorder->CreatedDateTime->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_CreatedDateTime" class="pharmacy_purchaseorder_CreatedDateTime"><?php echo $pharmacy_purchaseorder->CreatedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder->ModifiedBy->Visible) { // ModifiedBy ?>
		<th class="<?php echo $pharmacy_purchaseorder->ModifiedBy->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_ModifiedBy" class="pharmacy_purchaseorder_ModifiedBy"><?php echo $pharmacy_purchaseorder->ModifiedBy->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<th class="<?php echo $pharmacy_purchaseorder->ModifiedDateTime->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_ModifiedDateTime" class="pharmacy_purchaseorder_ModifiedDateTime"><?php echo $pharmacy_purchaseorder->ModifiedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder->BillDate->Visible) { // BillDate ?>
		<th class="<?php echo $pharmacy_purchaseorder->BillDate->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_BillDate" class="pharmacy_purchaseorder_BillDate"><?php echo $pharmacy_purchaseorder->BillDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CurStock->Visible) { // CurStock ?>
		<th class="<?php echo $pharmacy_purchaseorder->CurStock->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_CurStock" class="pharmacy_purchaseorder_CurStock"><?php echo $pharmacy_purchaseorder->CurStock->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grndate->Visible) { // grndate ?>
		<th class="<?php echo $pharmacy_purchaseorder->grndate->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_grndate" class="pharmacy_purchaseorder_grndate"><?php echo $pharmacy_purchaseorder->grndate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grndatetime->Visible) { // grndatetime ?>
		<th class="<?php echo $pharmacy_purchaseorder->grndatetime->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_grndatetime" class="pharmacy_purchaseorder_grndatetime"><?php echo $pharmacy_purchaseorder->grndatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder->strid->Visible) { // strid ?>
		<th class="<?php echo $pharmacy_purchaseorder->strid->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_strid" class="pharmacy_purchaseorder_strid"><?php echo $pharmacy_purchaseorder->strid->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder->GRNPer->Visible) { // GRNPer ?>
		<th class="<?php echo $pharmacy_purchaseorder->GRNPer->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_GRNPer" class="pharmacy_purchaseorder_GRNPer"><?php echo $pharmacy_purchaseorder->GRNPer->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<th class="<?php echo $pharmacy_purchaseorder->FreeQtyyy->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_FreeQtyyy" class="pharmacy_purchaseorder_FreeQtyyy"><?php echo $pharmacy_purchaseorder->FreeQtyyy->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_purchaseorder_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_purchaseorder_delete->Recordset->EOF) {
	$pharmacy_purchaseorder_delete->RecCnt++;
	$pharmacy_purchaseorder_delete->RowCnt++;

	// Set row properties
	$pharmacy_purchaseorder->resetAttributes();
	$pharmacy_purchaseorder->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_purchaseorder_delete->loadRowValues($pharmacy_purchaseorder_delete->Recordset);

	// Render row
	$pharmacy_purchaseorder_delete->renderRow();
?>
	<tr<?php echo $pharmacy_purchaseorder->rowAttributes() ?>>
<?php if ($pharmacy_purchaseorder->PRC->Visible) { // PRC ?>
		<td<?php echo $pharmacy_purchaseorder->PRC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCnt ?>_pharmacy_purchaseorder_PRC" class="pharmacy_purchaseorder_PRC">
<span<?php echo $pharmacy_purchaseorder->PRC->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->QTY->Visible) { // QTY ?>
		<td<?php echo $pharmacy_purchaseorder->QTY->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCnt ?>_pharmacy_purchaseorder_QTY" class="pharmacy_purchaseorder_QTY">
<span<?php echo $pharmacy_purchaseorder->QTY->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->QTY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->Stock->Visible) { // Stock ?>
		<td<?php echo $pharmacy_purchaseorder->Stock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCnt ?>_pharmacy_purchaseorder_Stock" class="pharmacy_purchaseorder_Stock">
<span<?php echo $pharmacy_purchaseorder->Stock->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->Stock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->LastMonthSale->Visible) { // LastMonthSale ?>
		<td<?php echo $pharmacy_purchaseorder->LastMonthSale->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCnt ?>_pharmacy_purchaseorder_LastMonthSale" class="pharmacy_purchaseorder_LastMonthSale">
<span<?php echo $pharmacy_purchaseorder->LastMonthSale->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->LastMonthSale->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->HospID->Visible) { // HospID ?>
		<td<?php echo $pharmacy_purchaseorder->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCnt ?>_pharmacy_purchaseorder_HospID" class="pharmacy_purchaseorder_HospID">
<span<?php echo $pharmacy_purchaseorder->HospID->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CreatedBy->Visible) { // CreatedBy ?>
		<td<?php echo $pharmacy_purchaseorder->CreatedBy->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCnt ?>_pharmacy_purchaseorder_CreatedBy" class="pharmacy_purchaseorder_CreatedBy">
<span<?php echo $pharmacy_purchaseorder->CreatedBy->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->CreatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td<?php echo $pharmacy_purchaseorder->CreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCnt ?>_pharmacy_purchaseorder_CreatedDateTime" class="pharmacy_purchaseorder_CreatedDateTime">
<span<?php echo $pharmacy_purchaseorder->CreatedDateTime->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->ModifiedBy->Visible) { // ModifiedBy ?>
		<td<?php echo $pharmacy_purchaseorder->ModifiedBy->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCnt ?>_pharmacy_purchaseorder_ModifiedBy" class="pharmacy_purchaseorder_ModifiedBy">
<span<?php echo $pharmacy_purchaseorder->ModifiedBy->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->ModifiedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td<?php echo $pharmacy_purchaseorder->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCnt ?>_pharmacy_purchaseorder_ModifiedDateTime" class="pharmacy_purchaseorder_ModifiedDateTime">
<span<?php echo $pharmacy_purchaseorder->ModifiedDateTime->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->BillDate->Visible) { // BillDate ?>
		<td<?php echo $pharmacy_purchaseorder->BillDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCnt ?>_pharmacy_purchaseorder_BillDate" class="pharmacy_purchaseorder_BillDate">
<span<?php echo $pharmacy_purchaseorder->BillDate->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->BillDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->CurStock->Visible) { // CurStock ?>
		<td<?php echo $pharmacy_purchaseorder->CurStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCnt ?>_pharmacy_purchaseorder_CurStock" class="pharmacy_purchaseorder_CurStock">
<span<?php echo $pharmacy_purchaseorder->CurStock->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->CurStock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grndate->Visible) { // grndate ?>
		<td<?php echo $pharmacy_purchaseorder->grndate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCnt ?>_pharmacy_purchaseorder_grndate" class="pharmacy_purchaseorder_grndate">
<span<?php echo $pharmacy_purchaseorder->grndate->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->grndate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->grndatetime->Visible) { // grndatetime ?>
		<td<?php echo $pharmacy_purchaseorder->grndatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCnt ?>_pharmacy_purchaseorder_grndatetime" class="pharmacy_purchaseorder_grndatetime">
<span<?php echo $pharmacy_purchaseorder->grndatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->grndatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->strid->Visible) { // strid ?>
		<td<?php echo $pharmacy_purchaseorder->strid->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCnt ?>_pharmacy_purchaseorder_strid" class="pharmacy_purchaseorder_strid">
<span<?php echo $pharmacy_purchaseorder->strid->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->strid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->GRNPer->Visible) { // GRNPer ?>
		<td<?php echo $pharmacy_purchaseorder->GRNPer->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCnt ?>_pharmacy_purchaseorder_GRNPer" class="pharmacy_purchaseorder_GRNPer">
<span<?php echo $pharmacy_purchaseorder->GRNPer->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->GRNPer->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder->FreeQtyyy->Visible) { // FreeQtyyy ?>
		<td<?php echo $pharmacy_purchaseorder->FreeQtyyy->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCnt ?>_pharmacy_purchaseorder_FreeQtyyy" class="pharmacy_purchaseorder_FreeQtyyy">
<span<?php echo $pharmacy_purchaseorder->FreeQtyyy->viewAttributes() ?>>
<?php echo $pharmacy_purchaseorder->FreeQtyyy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_purchaseorder_delete->Recordset->moveNext();
}
$pharmacy_purchaseorder_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_purchaseorder_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_purchaseorder_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_purchaseorder_delete->terminate();
?>
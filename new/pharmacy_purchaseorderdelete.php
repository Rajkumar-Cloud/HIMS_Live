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
<?php include_once "header.php"; ?>
<script>
var fpharmacy_purchaseorderdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpharmacy_purchaseorderdelete = currentForm = new ew.Form("fpharmacy_purchaseorderdelete", "delete");
	loadjs.done("fpharmacy_purchaseorderdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_purchaseorder_delete->showPageHeader(); ?>
<?php
$pharmacy_purchaseorder_delete->showMessage();
?>
<form name="fpharmacy_purchaseorderdelete" id="fpharmacy_purchaseorderdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchaseorder">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_purchaseorder_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_purchaseorder_delete->PRC->Visible) { // PRC ?>
		<th class="<?php echo $pharmacy_purchaseorder_delete->PRC->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_PRC" class="pharmacy_purchaseorder_PRC"><?php echo $pharmacy_purchaseorder_delete->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->QTY->Visible) { // QTY ?>
		<th class="<?php echo $pharmacy_purchaseorder_delete->QTY->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_QTY" class="pharmacy_purchaseorder_QTY"><?php echo $pharmacy_purchaseorder_delete->QTY->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->Stock->Visible) { // Stock ?>
		<th class="<?php echo $pharmacy_purchaseorder_delete->Stock->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_Stock" class="pharmacy_purchaseorder_Stock"><?php echo $pharmacy_purchaseorder_delete->Stock->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->LastMonthSale->Visible) { // LastMonthSale ?>
		<th class="<?php echo $pharmacy_purchaseorder_delete->LastMonthSale->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_LastMonthSale" class="pharmacy_purchaseorder_LastMonthSale"><?php echo $pharmacy_purchaseorder_delete->LastMonthSale->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $pharmacy_purchaseorder_delete->HospID->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_HospID" class="pharmacy_purchaseorder_HospID"><?php echo $pharmacy_purchaseorder_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->CreatedBy->Visible) { // CreatedBy ?>
		<th class="<?php echo $pharmacy_purchaseorder_delete->CreatedBy->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_CreatedBy" class="pharmacy_purchaseorder_CreatedBy"><?php echo $pharmacy_purchaseorder_delete->CreatedBy->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<th class="<?php echo $pharmacy_purchaseorder_delete->CreatedDateTime->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_CreatedDateTime" class="pharmacy_purchaseorder_CreatedDateTime"><?php echo $pharmacy_purchaseorder_delete->CreatedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->ModifiedBy->Visible) { // ModifiedBy ?>
		<th class="<?php echo $pharmacy_purchaseorder_delete->ModifiedBy->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_ModifiedBy" class="pharmacy_purchaseorder_ModifiedBy"><?php echo $pharmacy_purchaseorder_delete->ModifiedBy->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<th class="<?php echo $pharmacy_purchaseorder_delete->ModifiedDateTime->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_ModifiedDateTime" class="pharmacy_purchaseorder_ModifiedDateTime"><?php echo $pharmacy_purchaseorder_delete->ModifiedDateTime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->BillDate->Visible) { // BillDate ?>
		<th class="<?php echo $pharmacy_purchaseorder_delete->BillDate->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_BillDate" class="pharmacy_purchaseorder_BillDate"><?php echo $pharmacy_purchaseorder_delete->BillDate->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->CurStock->Visible) { // CurStock ?>
		<th class="<?php echo $pharmacy_purchaseorder_delete->CurStock->headerCellClass() ?>"><span id="elh_pharmacy_purchaseorder_CurStock" class="pharmacy_purchaseorder_CurStock"><?php echo $pharmacy_purchaseorder_delete->CurStock->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_purchaseorder_delete->RecordCount = 0;
$i = 0;
while (!$pharmacy_purchaseorder_delete->Recordset->EOF) {
	$pharmacy_purchaseorder_delete->RecordCount++;
	$pharmacy_purchaseorder_delete->RowCount++;

	// Set row properties
	$pharmacy_purchaseorder->resetAttributes();
	$pharmacy_purchaseorder->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_purchaseorder_delete->loadRowValues($pharmacy_purchaseorder_delete->Recordset);

	// Render row
	$pharmacy_purchaseorder_delete->renderRow();
?>
	<tr <?php echo $pharmacy_purchaseorder->rowAttributes() ?>>
<?php if ($pharmacy_purchaseorder_delete->PRC->Visible) { // PRC ?>
		<td <?php echo $pharmacy_purchaseorder_delete->PRC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCount ?>_pharmacy_purchaseorder_PRC" class="pharmacy_purchaseorder_PRC">
<span<?php echo $pharmacy_purchaseorder_delete->PRC->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_delete->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->QTY->Visible) { // QTY ?>
		<td <?php echo $pharmacy_purchaseorder_delete->QTY->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCount ?>_pharmacy_purchaseorder_QTY" class="pharmacy_purchaseorder_QTY">
<span<?php echo $pharmacy_purchaseorder_delete->QTY->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_delete->QTY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->Stock->Visible) { // Stock ?>
		<td <?php echo $pharmacy_purchaseorder_delete->Stock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCount ?>_pharmacy_purchaseorder_Stock" class="pharmacy_purchaseorder_Stock">
<span<?php echo $pharmacy_purchaseorder_delete->Stock->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_delete->Stock->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->LastMonthSale->Visible) { // LastMonthSale ?>
		<td <?php echo $pharmacy_purchaseorder_delete->LastMonthSale->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCount ?>_pharmacy_purchaseorder_LastMonthSale" class="pharmacy_purchaseorder_LastMonthSale">
<span<?php echo $pharmacy_purchaseorder_delete->LastMonthSale->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_delete->LastMonthSale->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $pharmacy_purchaseorder_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCount ?>_pharmacy_purchaseorder_HospID" class="pharmacy_purchaseorder_HospID">
<span<?php echo $pharmacy_purchaseorder_delete->HospID->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->CreatedBy->Visible) { // CreatedBy ?>
		<td <?php echo $pharmacy_purchaseorder_delete->CreatedBy->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCount ?>_pharmacy_purchaseorder_CreatedBy" class="pharmacy_purchaseorder_CreatedBy">
<span<?php echo $pharmacy_purchaseorder_delete->CreatedBy->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_delete->CreatedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->CreatedDateTime->Visible) { // CreatedDateTime ?>
		<td <?php echo $pharmacy_purchaseorder_delete->CreatedDateTime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCount ?>_pharmacy_purchaseorder_CreatedDateTime" class="pharmacy_purchaseorder_CreatedDateTime">
<span<?php echo $pharmacy_purchaseorder_delete->CreatedDateTime->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_delete->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->ModifiedBy->Visible) { // ModifiedBy ?>
		<td <?php echo $pharmacy_purchaseorder_delete->ModifiedBy->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCount ?>_pharmacy_purchaseorder_ModifiedBy" class="pharmacy_purchaseorder_ModifiedBy">
<span<?php echo $pharmacy_purchaseorder_delete->ModifiedBy->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_delete->ModifiedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
		<td <?php echo $pharmacy_purchaseorder_delete->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCount ?>_pharmacy_purchaseorder_ModifiedDateTime" class="pharmacy_purchaseorder_ModifiedDateTime">
<span<?php echo $pharmacy_purchaseorder_delete->ModifiedDateTime->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_delete->ModifiedDateTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->BillDate->Visible) { // BillDate ?>
		<td <?php echo $pharmacy_purchaseorder_delete->BillDate->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCount ?>_pharmacy_purchaseorder_BillDate" class="pharmacy_purchaseorder_BillDate">
<span<?php echo $pharmacy_purchaseorder_delete->BillDate->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_delete->BillDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchaseorder_delete->CurStock->Visible) { // CurStock ?>
		<td <?php echo $pharmacy_purchaseorder_delete->CurStock->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchaseorder_delete->RowCount ?>_pharmacy_purchaseorder_CurStock" class="pharmacy_purchaseorder_CurStock">
<span<?php echo $pharmacy_purchaseorder_delete->CurStock->viewAttributes() ?>><?php echo $pharmacy_purchaseorder_delete->CurStock->getViewValue() ?></span>
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
$pharmacy_purchaseorder_delete->terminate();
?>
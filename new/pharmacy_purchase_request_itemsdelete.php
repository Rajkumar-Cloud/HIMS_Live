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
$pharmacy_purchase_request_items_delete = new pharmacy_purchase_request_items_delete();

// Run the page
$pharmacy_purchase_request_items_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_purchase_request_items_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_purchase_request_itemsdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpharmacy_purchase_request_itemsdelete = currentForm = new ew.Form("fpharmacy_purchase_request_itemsdelete", "delete");
	loadjs.done("fpharmacy_purchase_request_itemsdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_purchase_request_items_delete->showPageHeader(); ?>
<?php
$pharmacy_purchase_request_items_delete->showMessage();
?>
<form name="fpharmacy_purchase_request_itemsdelete" id="fpharmacy_purchase_request_itemsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request_items">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_purchase_request_items_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_purchase_request_items_delete->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_purchase_request_items_delete->id->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_id" class="pharmacy_purchase_request_items_id"><?php echo $pharmacy_purchase_request_items_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->PRC->Visible) { // PRC ?>
		<th class="<?php echo $pharmacy_purchase_request_items_delete->PRC->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_PRC" class="pharmacy_purchase_request_items_PRC"><?php echo $pharmacy_purchase_request_items_delete->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->PrName->Visible) { // PrName ?>
		<th class="<?php echo $pharmacy_purchase_request_items_delete->PrName->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_PrName" class="pharmacy_purchase_request_items_PrName"><?php echo $pharmacy_purchase_request_items_delete->PrName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->Quantity->Visible) { // Quantity ?>
		<th class="<?php echo $pharmacy_purchase_request_items_delete->Quantity->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_Quantity" class="pharmacy_purchase_request_items_Quantity"><?php echo $pharmacy_purchase_request_items_delete->Quantity->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->HospID->Visible) { // HospID ?>
		<th class="<?php echo $pharmacy_purchase_request_items_delete->HospID->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_HospID" class="pharmacy_purchase_request_items_HospID"><?php echo $pharmacy_purchase_request_items_delete->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->createdby->Visible) { // createdby ?>
		<th class="<?php echo $pharmacy_purchase_request_items_delete->createdby->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_createdby" class="pharmacy_purchase_request_items_createdby"><?php echo $pharmacy_purchase_request_items_delete->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $pharmacy_purchase_request_items_delete->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_createddatetime" class="pharmacy_purchase_request_items_createddatetime"><?php echo $pharmacy_purchase_request_items_delete->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $pharmacy_purchase_request_items_delete->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_modifiedby" class="pharmacy_purchase_request_items_modifiedby"><?php echo $pharmacy_purchase_request_items_delete->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $pharmacy_purchase_request_items_delete->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_modifieddatetime" class="pharmacy_purchase_request_items_modifieddatetime"><?php echo $pharmacy_purchase_request_items_delete->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $pharmacy_purchase_request_items_delete->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_BRCODE" class="pharmacy_purchase_request_items_BRCODE"><?php echo $pharmacy_purchase_request_items_delete->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->prid->Visible) { // prid ?>
		<th class="<?php echo $pharmacy_purchase_request_items_delete->prid->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_prid" class="pharmacy_purchase_request_items_prid"><?php echo $pharmacy_purchase_request_items_delete->prid->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_purchase_request_items_delete->RecordCount = 0;
$i = 0;
while (!$pharmacy_purchase_request_items_delete->Recordset->EOF) {
	$pharmacy_purchase_request_items_delete->RecordCount++;
	$pharmacy_purchase_request_items_delete->RowCount++;

	// Set row properties
	$pharmacy_purchase_request_items->resetAttributes();
	$pharmacy_purchase_request_items->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_purchase_request_items_delete->loadRowValues($pharmacy_purchase_request_items_delete->Recordset);

	// Render row
	$pharmacy_purchase_request_items_delete->renderRow();
?>
	<tr <?php echo $pharmacy_purchase_request_items->rowAttributes() ?>>
<?php if ($pharmacy_purchase_request_items_delete->id->Visible) { // id ?>
		<td <?php echo $pharmacy_purchase_request_items_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCount ?>_pharmacy_purchase_request_items_id" class="pharmacy_purchase_request_items_id">
<span<?php echo $pharmacy_purchase_request_items_delete->id->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->PRC->Visible) { // PRC ?>
		<td <?php echo $pharmacy_purchase_request_items_delete->PRC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCount ?>_pharmacy_purchase_request_items_PRC" class="pharmacy_purchase_request_items_PRC">
<span<?php echo $pharmacy_purchase_request_items_delete->PRC->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_delete->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->PrName->Visible) { // PrName ?>
		<td <?php echo $pharmacy_purchase_request_items_delete->PrName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCount ?>_pharmacy_purchase_request_items_PrName" class="pharmacy_purchase_request_items_PrName">
<span<?php echo $pharmacy_purchase_request_items_delete->PrName->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_delete->PrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->Quantity->Visible) { // Quantity ?>
		<td <?php echo $pharmacy_purchase_request_items_delete->Quantity->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCount ?>_pharmacy_purchase_request_items_Quantity" class="pharmacy_purchase_request_items_Quantity">
<span<?php echo $pharmacy_purchase_request_items_delete->Quantity->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_delete->Quantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->HospID->Visible) { // HospID ?>
		<td <?php echo $pharmacy_purchase_request_items_delete->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCount ?>_pharmacy_purchase_request_items_HospID" class="pharmacy_purchase_request_items_HospID">
<span<?php echo $pharmacy_purchase_request_items_delete->HospID->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_delete->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->createdby->Visible) { // createdby ?>
		<td <?php echo $pharmacy_purchase_request_items_delete->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCount ?>_pharmacy_purchase_request_items_createdby" class="pharmacy_purchase_request_items_createdby">
<span<?php echo $pharmacy_purchase_request_items_delete->createdby->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_delete->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->createddatetime->Visible) { // createddatetime ?>
		<td <?php echo $pharmacy_purchase_request_items_delete->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCount ?>_pharmacy_purchase_request_items_createddatetime" class="pharmacy_purchase_request_items_createddatetime">
<span<?php echo $pharmacy_purchase_request_items_delete->createddatetime->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_delete->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->modifiedby->Visible) { // modifiedby ?>
		<td <?php echo $pharmacy_purchase_request_items_delete->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCount ?>_pharmacy_purchase_request_items_modifiedby" class="pharmacy_purchase_request_items_modifiedby">
<span<?php echo $pharmacy_purchase_request_items_delete->modifiedby->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_delete->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->modifieddatetime->Visible) { // modifieddatetime ?>
		<td <?php echo $pharmacy_purchase_request_items_delete->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCount ?>_pharmacy_purchase_request_items_modifieddatetime" class="pharmacy_purchase_request_items_modifieddatetime">
<span<?php echo $pharmacy_purchase_request_items_delete->modifieddatetime->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_delete->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->BRCODE->Visible) { // BRCODE ?>
		<td <?php echo $pharmacy_purchase_request_items_delete->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCount ?>_pharmacy_purchase_request_items_BRCODE" class="pharmacy_purchase_request_items_BRCODE">
<span<?php echo $pharmacy_purchase_request_items_delete->BRCODE->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_delete->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items_delete->prid->Visible) { // prid ?>
		<td <?php echo $pharmacy_purchase_request_items_delete->prid->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCount ?>_pharmacy_purchase_request_items_prid" class="pharmacy_purchase_request_items_prid">
<span<?php echo $pharmacy_purchase_request_items_delete->prid->viewAttributes() ?>><?php echo $pharmacy_purchase_request_items_delete->prid->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_purchase_request_items_delete->Recordset->moveNext();
}
$pharmacy_purchase_request_items_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_purchase_request_items_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_purchase_request_items_delete->showPageFooter();
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
$pharmacy_purchase_request_items_delete->terminate();
?>
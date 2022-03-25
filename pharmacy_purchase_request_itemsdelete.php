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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacy_purchase_request_itemsdelete = currentForm = new ew.Form("fpharmacy_purchase_request_itemsdelete", "delete");

// Form_CustomValidate event
fpharmacy_purchase_request_itemsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_purchase_request_itemsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_purchase_request_itemsdelete.lists["x_PrName"] = <?php echo $pharmacy_purchase_request_items_delete->PrName->Lookup->toClientList() ?>;
fpharmacy_purchase_request_itemsdelete.lists["x_PrName"].options = <?php echo JsonEncode($pharmacy_purchase_request_items_delete->PrName->lookupOptions()) ?>;
fpharmacy_purchase_request_itemsdelete.autoSuggests["x_PrName"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_purchase_request_items_delete->showPageHeader(); ?>
<?php
$pharmacy_purchase_request_items_delete->showMessage();
?>
<form name="fpharmacy_purchase_request_itemsdelete" id="fpharmacy_purchase_request_itemsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_purchase_request_items_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_purchase_request_items_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_purchase_request_items">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_purchase_request_items_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_purchase_request_items->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_purchase_request_items->id->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_id" class="pharmacy_purchase_request_items_id"><?php echo $pharmacy_purchase_request_items->id->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->PRC->Visible) { // PRC ?>
		<th class="<?php echo $pharmacy_purchase_request_items->PRC->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_PRC" class="pharmacy_purchase_request_items_PRC"><?php echo $pharmacy_purchase_request_items->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->PrName->Visible) { // PrName ?>
		<th class="<?php echo $pharmacy_purchase_request_items->PrName->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_PrName" class="pharmacy_purchase_request_items_PrName"><?php echo $pharmacy_purchase_request_items->PrName->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->Quantity->Visible) { // Quantity ?>
		<th class="<?php echo $pharmacy_purchase_request_items->Quantity->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_Quantity" class="pharmacy_purchase_request_items_Quantity"><?php echo $pharmacy_purchase_request_items->Quantity->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->HospID->Visible) { // HospID ?>
		<th class="<?php echo $pharmacy_purchase_request_items->HospID->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_HospID" class="pharmacy_purchase_request_items_HospID"><?php echo $pharmacy_purchase_request_items->HospID->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->createdby->Visible) { // createdby ?>
		<th class="<?php echo $pharmacy_purchase_request_items->createdby->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_createdby" class="pharmacy_purchase_request_items_createdby"><?php echo $pharmacy_purchase_request_items->createdby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->createddatetime->Visible) { // createddatetime ?>
		<th class="<?php echo $pharmacy_purchase_request_items->createddatetime->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_createddatetime" class="pharmacy_purchase_request_items_createddatetime"><?php echo $pharmacy_purchase_request_items->createddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->modifiedby->Visible) { // modifiedby ?>
		<th class="<?php echo $pharmacy_purchase_request_items->modifiedby->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_modifiedby" class="pharmacy_purchase_request_items_modifiedby"><?php echo $pharmacy_purchase_request_items->modifiedby->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->modifieddatetime->Visible) { // modifieddatetime ?>
		<th class="<?php echo $pharmacy_purchase_request_items->modifieddatetime->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_modifieddatetime" class="pharmacy_purchase_request_items_modifieddatetime"><?php echo $pharmacy_purchase_request_items->modifieddatetime->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->BRCODE->Visible) { // BRCODE ?>
		<th class="<?php echo $pharmacy_purchase_request_items->BRCODE->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_BRCODE" class="pharmacy_purchase_request_items_BRCODE"><?php echo $pharmacy_purchase_request_items->BRCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->prid->Visible) { // prid ?>
		<th class="<?php echo $pharmacy_purchase_request_items->prid->headerCellClass() ?>"><span id="elh_pharmacy_purchase_request_items_prid" class="pharmacy_purchase_request_items_prid"><?php echo $pharmacy_purchase_request_items->prid->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_purchase_request_items_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_purchase_request_items_delete->Recordset->EOF) {
	$pharmacy_purchase_request_items_delete->RecCnt++;
	$pharmacy_purchase_request_items_delete->RowCnt++;

	// Set row properties
	$pharmacy_purchase_request_items->resetAttributes();
	$pharmacy_purchase_request_items->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_purchase_request_items_delete->loadRowValues($pharmacy_purchase_request_items_delete->Recordset);

	// Render row
	$pharmacy_purchase_request_items_delete->renderRow();
?>
	<tr<?php echo $pharmacy_purchase_request_items->rowAttributes() ?>>
<?php if ($pharmacy_purchase_request_items->id->Visible) { // id ?>
		<td<?php echo $pharmacy_purchase_request_items->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCnt ?>_pharmacy_purchase_request_items_id" class="pharmacy_purchase_request_items_id">
<span<?php echo $pharmacy_purchase_request_items->id->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->PRC->Visible) { // PRC ?>
		<td<?php echo $pharmacy_purchase_request_items->PRC->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCnt ?>_pharmacy_purchase_request_items_PRC" class="pharmacy_purchase_request_items_PRC">
<span<?php echo $pharmacy_purchase_request_items->PRC->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->PrName->Visible) { // PrName ?>
		<td<?php echo $pharmacy_purchase_request_items->PrName->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCnt ?>_pharmacy_purchase_request_items_PrName" class="pharmacy_purchase_request_items_PrName">
<span<?php echo $pharmacy_purchase_request_items->PrName->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->PrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->Quantity->Visible) { // Quantity ?>
		<td<?php echo $pharmacy_purchase_request_items->Quantity->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCnt ?>_pharmacy_purchase_request_items_Quantity" class="pharmacy_purchase_request_items_Quantity">
<span<?php echo $pharmacy_purchase_request_items->Quantity->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->Quantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->HospID->Visible) { // HospID ?>
		<td<?php echo $pharmacy_purchase_request_items->HospID->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCnt ?>_pharmacy_purchase_request_items_HospID" class="pharmacy_purchase_request_items_HospID">
<span<?php echo $pharmacy_purchase_request_items->HospID->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->HospID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->createdby->Visible) { // createdby ?>
		<td<?php echo $pharmacy_purchase_request_items->createdby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCnt ?>_pharmacy_purchase_request_items_createdby" class="pharmacy_purchase_request_items_createdby">
<span<?php echo $pharmacy_purchase_request_items->createdby->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->createdby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->createddatetime->Visible) { // createddatetime ?>
		<td<?php echo $pharmacy_purchase_request_items->createddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCnt ?>_pharmacy_purchase_request_items_createddatetime" class="pharmacy_purchase_request_items_createddatetime">
<span<?php echo $pharmacy_purchase_request_items->createddatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->createddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->modifiedby->Visible) { // modifiedby ?>
		<td<?php echo $pharmacy_purchase_request_items->modifiedby->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCnt ?>_pharmacy_purchase_request_items_modifiedby" class="pharmacy_purchase_request_items_modifiedby">
<span<?php echo $pharmacy_purchase_request_items->modifiedby->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->modifiedby->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->modifieddatetime->Visible) { // modifieddatetime ?>
		<td<?php echo $pharmacy_purchase_request_items->modifieddatetime->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCnt ?>_pharmacy_purchase_request_items_modifieddatetime" class="pharmacy_purchase_request_items_modifieddatetime">
<span<?php echo $pharmacy_purchase_request_items->modifieddatetime->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->modifieddatetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->BRCODE->Visible) { // BRCODE ?>
		<td<?php echo $pharmacy_purchase_request_items->BRCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCnt ?>_pharmacy_purchase_request_items_BRCODE" class="pharmacy_purchase_request_items_BRCODE">
<span<?php echo $pharmacy_purchase_request_items->BRCODE->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->BRCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_purchase_request_items->prid->Visible) { // prid ?>
		<td<?php echo $pharmacy_purchase_request_items->prid->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_purchase_request_items_delete->RowCnt ?>_pharmacy_purchase_request_items_prid" class="pharmacy_purchase_request_items_prid">
<span<?php echo $pharmacy_purchase_request_items->prid->viewAttributes() ?>>
<?php echo $pharmacy_purchase_request_items->prid->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_purchase_request_items_delete->terminate();
?>
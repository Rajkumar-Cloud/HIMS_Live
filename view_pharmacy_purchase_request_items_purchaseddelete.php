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
$view_pharmacy_purchase_request_items_purchased_delete = new view_pharmacy_purchase_request_items_purchased_delete();

// Run the page
$view_pharmacy_purchase_request_items_purchased_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_purchase_request_items_purchased_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fview_pharmacy_purchase_request_items_purchaseddelete = currentForm = new ew.Form("fview_pharmacy_purchase_request_items_purchaseddelete", "delete");

// Form_CustomValidate event
fview_pharmacy_purchase_request_items_purchaseddelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fview_pharmacy_purchase_request_items_purchaseddelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fview_pharmacy_purchase_request_items_purchaseddelete.lists["x_PurchaseStatus"] = <?php echo $view_pharmacy_purchase_request_items_purchased_delete->PurchaseStatus->Lookup->toClientList() ?>;
fview_pharmacy_purchase_request_items_purchaseddelete.lists["x_PurchaseStatus"].options = <?php echo JsonEncode($view_pharmacy_purchase_request_items_purchased_delete->PurchaseStatus->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $view_pharmacy_purchase_request_items_purchased_delete->showPageHeader(); ?>
<?php
$view_pharmacy_purchase_request_items_purchased_delete->showMessage();
?>
<form name="fview_pharmacy_purchase_request_items_purchaseddelete" id="fview_pharmacy_purchase_request_items_purchaseddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($view_pharmacy_purchase_request_items_purchased_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $view_pharmacy_purchase_request_items_purchased_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_items_purchased">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_pharmacy_purchase_request_items_purchased_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_pharmacy_purchase_request_items_purchased->id->Visible) { // id ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_purchased->id->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_id" class="view_pharmacy_purchase_request_items_purchased_id"><?php echo $view_pharmacy_purchase_request_items_purchased->id->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->PRC->Visible) { // PRC ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_PRC" class="view_pharmacy_purchase_request_items_purchased_PRC"><?php echo $view_pharmacy_purchase_request_items_purchased->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->PrName->Visible) { // PrName ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_PrName" class="view_pharmacy_purchase_request_items_purchased_PrName"><?php echo $view_pharmacy_purchase_request_items_purchased->PrName->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->Quantity->Visible) { // Quantity ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_Quantity" class="view_pharmacy_purchase_request_items_purchased_Quantity"><?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_items_purchased_ApprovedStatus"><?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_items_purchased_PurchaseStatus"><?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_pharmacy_purchase_request_items_purchased_delete->RecCnt = 0;
$i = 0;
while (!$view_pharmacy_purchase_request_items_purchased_delete->Recordset->EOF) {
	$view_pharmacy_purchase_request_items_purchased_delete->RecCnt++;
	$view_pharmacy_purchase_request_items_purchased_delete->RowCnt++;

	// Set row properties
	$view_pharmacy_purchase_request_items_purchased->resetAttributes();
	$view_pharmacy_purchase_request_items_purchased->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_pharmacy_purchase_request_items_purchased_delete->loadRowValues($view_pharmacy_purchase_request_items_purchased_delete->Recordset);

	// Render row
	$view_pharmacy_purchase_request_items_purchased_delete->renderRow();
?>
	<tr<?php echo $view_pharmacy_purchase_request_items_purchased->rowAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_purchased->id->Visible) { // id ?>
		<td<?php echo $view_pharmacy_purchase_request_items_purchased->id->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_delete->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_id" class="view_pharmacy_purchase_request_items_purchased_id">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->id->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->PRC->Visible) { // PRC ?>
		<td<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_delete->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PRC" class="view_pharmacy_purchase_request_items_purchased_PRC">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->PrName->Visible) { // PrName ?>
		<td<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_delete->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PrName" class="view_pharmacy_purchase_request_items_purchased_PrName">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->PrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->Quantity->Visible) { // Quantity ?>
		<td<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_delete->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_Quantity" class="view_pharmacy_purchase_request_items_purchased_Quantity">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->Quantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_delete->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_purchased->PurchaseStatus->Visible) { // PurchaseStatus ?>
		<td<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_items_purchased_delete->RowCnt ?>_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<span<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->viewAttributes() ?>>
<?php echo $view_pharmacy_purchase_request_items_purchased->PurchaseStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_pharmacy_purchase_request_items_purchased_delete->Recordset->moveNext();
}
$view_pharmacy_purchase_request_items_purchased_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_pharmacy_purchase_request_items_purchased_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_pharmacy_purchase_request_items_purchased_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$view_pharmacy_purchase_request_items_purchased_delete->terminate();
?>
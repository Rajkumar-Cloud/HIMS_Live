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
$view_pharmacy_purchase_request_items_approved_delete = new view_pharmacy_purchase_request_items_approved_delete();

// Run the page
$view_pharmacy_purchase_request_items_approved_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$view_pharmacy_purchase_request_items_approved_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fview_pharmacy_purchase_request_items_approveddelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fview_pharmacy_purchase_request_items_approveddelete = currentForm = new ew.Form("fview_pharmacy_purchase_request_items_approveddelete", "delete");
	loadjs.done("fview_pharmacy_purchase_request_items_approveddelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $view_pharmacy_purchase_request_items_approved_delete->showPageHeader(); ?>
<?php
$view_pharmacy_purchase_request_items_approved_delete->showMessage();
?>
<form name="fview_pharmacy_purchase_request_items_approveddelete" id="fview_pharmacy_purchase_request_items_approveddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_purchase_request_items_approved">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($view_pharmacy_purchase_request_items_approved_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($view_pharmacy_purchase_request_items_approved_delete->id->Visible) { // id ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved_delete->id->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_id" class="view_pharmacy_purchase_request_items_approved_id"><?php echo $view_pharmacy_purchase_request_items_approved_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_delete->PRC->Visible) { // PRC ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved_delete->PRC->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_PRC" class="view_pharmacy_purchase_request_items_approved_PRC"><?php echo $view_pharmacy_purchase_request_items_approved_delete->PRC->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_delete->PrName->Visible) { // PrName ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved_delete->PrName->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_PrName" class="view_pharmacy_purchase_request_items_approved_PrName"><?php echo $view_pharmacy_purchase_request_items_approved_delete->PrName->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_delete->Quantity->Visible) { // Quantity ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved_delete->Quantity->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_Quantity" class="view_pharmacy_purchase_request_items_approved_Quantity"><?php echo $view_pharmacy_purchase_request_items_approved_delete->Quantity->caption() ?></span></th>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_delete->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<th class="<?php echo $view_pharmacy_purchase_request_items_approved_delete->ApprovedStatus->headerCellClass() ?>"><span id="elh_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="view_pharmacy_purchase_request_items_approved_ApprovedStatus"><?php echo $view_pharmacy_purchase_request_items_approved_delete->ApprovedStatus->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$view_pharmacy_purchase_request_items_approved_delete->RecordCount = 0;
$i = 0;
while (!$view_pharmacy_purchase_request_items_approved_delete->Recordset->EOF) {
	$view_pharmacy_purchase_request_items_approved_delete->RecordCount++;
	$view_pharmacy_purchase_request_items_approved_delete->RowCount++;

	// Set row properties
	$view_pharmacy_purchase_request_items_approved->resetAttributes();
	$view_pharmacy_purchase_request_items_approved->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$view_pharmacy_purchase_request_items_approved_delete->loadRowValues($view_pharmacy_purchase_request_items_approved_delete->Recordset);

	// Render row
	$view_pharmacy_purchase_request_items_approved_delete->renderRow();
?>
	<tr <?php echo $view_pharmacy_purchase_request_items_approved->rowAttributes() ?>>
<?php if ($view_pharmacy_purchase_request_items_approved_delete->id->Visible) { // id ?>
		<td <?php echo $view_pharmacy_purchase_request_items_approved_delete->id->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_delete->RowCount ?>_view_pharmacy_purchase_request_items_approved_id" class="view_pharmacy_purchase_request_items_approved_id">
<span<?php echo $view_pharmacy_purchase_request_items_approved_delete->id->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_delete->PRC->Visible) { // PRC ?>
		<td <?php echo $view_pharmacy_purchase_request_items_approved_delete->PRC->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_delete->RowCount ?>_view_pharmacy_purchase_request_items_approved_PRC" class="view_pharmacy_purchase_request_items_approved_PRC">
<span<?php echo $view_pharmacy_purchase_request_items_approved_delete->PRC->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_delete->PRC->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_delete->PrName->Visible) { // PrName ?>
		<td <?php echo $view_pharmacy_purchase_request_items_approved_delete->PrName->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_delete->RowCount ?>_view_pharmacy_purchase_request_items_approved_PrName" class="view_pharmacy_purchase_request_items_approved_PrName">
<span<?php echo $view_pharmacy_purchase_request_items_approved_delete->PrName->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_delete->PrName->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_delete->Quantity->Visible) { // Quantity ?>
		<td <?php echo $view_pharmacy_purchase_request_items_approved_delete->Quantity->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_delete->RowCount ?>_view_pharmacy_purchase_request_items_approved_Quantity" class="view_pharmacy_purchase_request_items_approved_Quantity">
<span<?php echo $view_pharmacy_purchase_request_items_approved_delete->Quantity->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_delete->Quantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($view_pharmacy_purchase_request_items_approved_delete->ApprovedStatus->Visible) { // ApprovedStatus ?>
		<td <?php echo $view_pharmacy_purchase_request_items_approved_delete->ApprovedStatus->cellAttributes() ?>>
<span id="el<?php echo $view_pharmacy_purchase_request_items_approved_delete->RowCount ?>_view_pharmacy_purchase_request_items_approved_ApprovedStatus" class="view_pharmacy_purchase_request_items_approved_ApprovedStatus">
<span<?php echo $view_pharmacy_purchase_request_items_approved_delete->ApprovedStatus->viewAttributes() ?>><?php echo $view_pharmacy_purchase_request_items_approved_delete->ApprovedStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$view_pharmacy_purchase_request_items_approved_delete->Recordset->moveNext();
}
$view_pharmacy_purchase_request_items_approved_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $view_pharmacy_purchase_request_items_approved_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$view_pharmacy_purchase_request_items_approved_delete->showPageFooter();
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
$view_pharmacy_purchase_request_items_approved_delete->terminate();
?>
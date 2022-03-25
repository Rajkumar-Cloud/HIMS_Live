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
$billing_discount_delete = new billing_discount_delete();

// Run the page
$billing_discount_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_discount_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbilling_discountdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fbilling_discountdelete = currentForm = new ew.Form("fbilling_discountdelete", "delete");
	loadjs.done("fbilling_discountdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $billing_discount_delete->showPageHeader(); ?>
<?php
$billing_discount_delete->showMessage();
?>
<form name="fbilling_discountdelete" id="fbilling_discountdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_discount">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($billing_discount_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($billing_discount_delete->id->Visible) { // id ?>
		<th class="<?php echo $billing_discount_delete->id->headerCellClass() ?>"><span id="elh_billing_discount_id" class="billing_discount_id"><?php echo $billing_discount_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($billing_discount_delete->Particulars->Visible) { // Particulars ?>
		<th class="<?php echo $billing_discount_delete->Particulars->headerCellClass() ?>"><span id="elh_billing_discount_Particulars" class="billing_discount_Particulars"><?php echo $billing_discount_delete->Particulars->caption() ?></span></th>
<?php } ?>
<?php if ($billing_discount_delete->Procedure->Visible) { // Procedure ?>
		<th class="<?php echo $billing_discount_delete->Procedure->headerCellClass() ?>"><span id="elh_billing_discount_Procedure" class="billing_discount_Procedure"><?php echo $billing_discount_delete->Procedure->caption() ?></span></th>
<?php } ?>
<?php if ($billing_discount_delete->Pharmacy->Visible) { // Pharmacy ?>
		<th class="<?php echo $billing_discount_delete->Pharmacy->headerCellClass() ?>"><span id="elh_billing_discount_Pharmacy" class="billing_discount_Pharmacy"><?php echo $billing_discount_delete->Pharmacy->caption() ?></span></th>
<?php } ?>
<?php if ($billing_discount_delete->Investication->Visible) { // Investication ?>
		<th class="<?php echo $billing_discount_delete->Investication->headerCellClass() ?>"><span id="elh_billing_discount_Investication" class="billing_discount_Investication"><?php echo $billing_discount_delete->Investication->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$billing_discount_delete->RecordCount = 0;
$i = 0;
while (!$billing_discount_delete->Recordset->EOF) {
	$billing_discount_delete->RecordCount++;
	$billing_discount_delete->RowCount++;

	// Set row properties
	$billing_discount->resetAttributes();
	$billing_discount->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$billing_discount_delete->loadRowValues($billing_discount_delete->Recordset);

	// Render row
	$billing_discount_delete->renderRow();
?>
	<tr <?php echo $billing_discount->rowAttributes() ?>>
<?php if ($billing_discount_delete->id->Visible) { // id ?>
		<td <?php echo $billing_discount_delete->id->cellAttributes() ?>>
<span id="el<?php echo $billing_discount_delete->RowCount ?>_billing_discount_id" class="billing_discount_id">
<span<?php echo $billing_discount_delete->id->viewAttributes() ?>><?php echo $billing_discount_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_discount_delete->Particulars->Visible) { // Particulars ?>
		<td <?php echo $billing_discount_delete->Particulars->cellAttributes() ?>>
<span id="el<?php echo $billing_discount_delete->RowCount ?>_billing_discount_Particulars" class="billing_discount_Particulars">
<span<?php echo $billing_discount_delete->Particulars->viewAttributes() ?>><?php echo $billing_discount_delete->Particulars->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_discount_delete->Procedure->Visible) { // Procedure ?>
		<td <?php echo $billing_discount_delete->Procedure->cellAttributes() ?>>
<span id="el<?php echo $billing_discount_delete->RowCount ?>_billing_discount_Procedure" class="billing_discount_Procedure">
<span<?php echo $billing_discount_delete->Procedure->viewAttributes() ?>><?php echo $billing_discount_delete->Procedure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_discount_delete->Pharmacy->Visible) { // Pharmacy ?>
		<td <?php echo $billing_discount_delete->Pharmacy->cellAttributes() ?>>
<span id="el<?php echo $billing_discount_delete->RowCount ?>_billing_discount_Pharmacy" class="billing_discount_Pharmacy">
<span<?php echo $billing_discount_delete->Pharmacy->viewAttributes() ?>><?php echo $billing_discount_delete->Pharmacy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_discount_delete->Investication->Visible) { // Investication ?>
		<td <?php echo $billing_discount_delete->Investication->cellAttributes() ?>>
<span id="el<?php echo $billing_discount_delete->RowCount ?>_billing_discount_Investication" class="billing_discount_Investication">
<span<?php echo $billing_discount_delete->Investication->viewAttributes() ?>><?php echo $billing_discount_delete->Investication->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$billing_discount_delete->Recordset->moveNext();
}
$billing_discount_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $billing_discount_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$billing_discount_delete->showPageFooter();
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
$billing_discount_delete->terminate();
?>
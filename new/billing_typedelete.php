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
$billing_type_delete = new billing_type_delete();

// Run the page
$billing_type_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_type_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fbilling_typedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fbilling_typedelete = currentForm = new ew.Form("fbilling_typedelete", "delete");
	loadjs.done("fbilling_typedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $billing_type_delete->showPageHeader(); ?>
<?php
$billing_type_delete->showMessage();
?>
<form name="fbilling_typedelete" id="fbilling_typedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_type">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($billing_type_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($billing_type_delete->id->Visible) { // id ?>
		<th class="<?php echo $billing_type_delete->id->headerCellClass() ?>"><span id="elh_billing_type_id" class="billing_type_id"><?php echo $billing_type_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($billing_type_delete->Type->Visible) { // Type ?>
		<th class="<?php echo $billing_type_delete->Type->headerCellClass() ?>"><span id="elh_billing_type_Type" class="billing_type_Type"><?php echo $billing_type_delete->Type->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$billing_type_delete->RecordCount = 0;
$i = 0;
while (!$billing_type_delete->Recordset->EOF) {
	$billing_type_delete->RecordCount++;
	$billing_type_delete->RowCount++;

	// Set row properties
	$billing_type->resetAttributes();
	$billing_type->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$billing_type_delete->loadRowValues($billing_type_delete->Recordset);

	// Render row
	$billing_type_delete->renderRow();
?>
	<tr <?php echo $billing_type->rowAttributes() ?>>
<?php if ($billing_type_delete->id->Visible) { // id ?>
		<td <?php echo $billing_type_delete->id->cellAttributes() ?>>
<span id="el<?php echo $billing_type_delete->RowCount ?>_billing_type_id" class="billing_type_id">
<span<?php echo $billing_type_delete->id->viewAttributes() ?>><?php echo $billing_type_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($billing_type_delete->Type->Visible) { // Type ?>
		<td <?php echo $billing_type_delete->Type->cellAttributes() ?>>
<span id="el<?php echo $billing_type_delete->RowCount ?>_billing_type_Type" class="billing_type_Type">
<span<?php echo $billing_type_delete->Type->viewAttributes() ?>><?php echo $billing_type_delete->Type->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$billing_type_delete->Recordset->moveNext();
}
$billing_type_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $billing_type_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$billing_type_delete->showPageFooter();
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
$billing_type_delete->terminate();
?>
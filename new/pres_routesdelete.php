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
$pres_routes_delete = new pres_routes_delete();

// Run the page
$pres_routes_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_routes_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_routesdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpres_routesdelete = currentForm = new ew.Form("fpres_routesdelete", "delete");
	loadjs.done("fpres_routesdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_routes_delete->showPageHeader(); ?>
<?php
$pres_routes_delete->showMessage();
?>
<form name="fpres_routesdelete" id="fpres_routesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_routes">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_routes_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_routes_delete->S_No->Visible) { // S.No ?>
		<th class="<?php echo $pres_routes_delete->S_No->headerCellClass() ?>"><span id="elh_pres_routes_S_No" class="pres_routes_S_No"><?php echo $pres_routes_delete->S_No->caption() ?></span></th>
<?php } ?>
<?php if ($pres_routes_delete->_Route->Visible) { // Route ?>
		<th class="<?php echo $pres_routes_delete->_Route->headerCellClass() ?>"><span id="elh_pres_routes__Route" class="pres_routes__Route"><?php echo $pres_routes_delete->_Route->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_routes_delete->RecordCount = 0;
$i = 0;
while (!$pres_routes_delete->Recordset->EOF) {
	$pres_routes_delete->RecordCount++;
	$pres_routes_delete->RowCount++;

	// Set row properties
	$pres_routes->resetAttributes();
	$pres_routes->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_routes_delete->loadRowValues($pres_routes_delete->Recordset);

	// Render row
	$pres_routes_delete->renderRow();
?>
	<tr <?php echo $pres_routes->rowAttributes() ?>>
<?php if ($pres_routes_delete->S_No->Visible) { // S.No ?>
		<td <?php echo $pres_routes_delete->S_No->cellAttributes() ?>>
<span id="el<?php echo $pres_routes_delete->RowCount ?>_pres_routes_S_No" class="pres_routes_S_No">
<span<?php echo $pres_routes_delete->S_No->viewAttributes() ?>><?php echo $pres_routes_delete->S_No->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_routes_delete->_Route->Visible) { // Route ?>
		<td <?php echo $pres_routes_delete->_Route->cellAttributes() ?>>
<span id="el<?php echo $pres_routes_delete->RowCount ?>_pres_routes__Route" class="pres_routes__Route">
<span<?php echo $pres_routes_delete->_Route->viewAttributes() ?>><?php echo $pres_routes_delete->_Route->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_routes_delete->Recordset->moveNext();
}
$pres_routes_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_routes_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_routes_delete->showPageFooter();
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
$pres_routes_delete->terminate();
?>
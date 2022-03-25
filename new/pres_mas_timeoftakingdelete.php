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
$pres_mas_timeoftaking_delete = new pres_mas_timeoftaking_delete();

// Run the page
$pres_mas_timeoftaking_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_mas_timeoftaking_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_mas_timeoftakingdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpres_mas_timeoftakingdelete = currentForm = new ew.Form("fpres_mas_timeoftakingdelete", "delete");
	loadjs.done("fpres_mas_timeoftakingdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_mas_timeoftaking_delete->showPageHeader(); ?>
<?php
$pres_mas_timeoftaking_delete->showMessage();
?>
<form name="fpres_mas_timeoftakingdelete" id="fpres_mas_timeoftakingdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_mas_timeoftaking">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_mas_timeoftaking_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_mas_timeoftaking_delete->ID->Visible) { // ID ?>
		<th class="<?php echo $pres_mas_timeoftaking_delete->ID->headerCellClass() ?>"><span id="elh_pres_mas_timeoftaking_ID" class="pres_mas_timeoftaking_ID"><?php echo $pres_mas_timeoftaking_delete->ID->caption() ?></span></th>
<?php } ?>
<?php if ($pres_mas_timeoftaking_delete->Time_Of_Taking->Visible) { // Time Of Taking ?>
		<th class="<?php echo $pres_mas_timeoftaking_delete->Time_Of_Taking->headerCellClass() ?>"><span id="elh_pres_mas_timeoftaking_Time_Of_Taking" class="pres_mas_timeoftaking_Time_Of_Taking"><?php echo $pres_mas_timeoftaking_delete->Time_Of_Taking->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_mas_timeoftaking_delete->RecordCount = 0;
$i = 0;
while (!$pres_mas_timeoftaking_delete->Recordset->EOF) {
	$pres_mas_timeoftaking_delete->RecordCount++;
	$pres_mas_timeoftaking_delete->RowCount++;

	// Set row properties
	$pres_mas_timeoftaking->resetAttributes();
	$pres_mas_timeoftaking->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_mas_timeoftaking_delete->loadRowValues($pres_mas_timeoftaking_delete->Recordset);

	// Render row
	$pres_mas_timeoftaking_delete->renderRow();
?>
	<tr <?php echo $pres_mas_timeoftaking->rowAttributes() ?>>
<?php if ($pres_mas_timeoftaking_delete->ID->Visible) { // ID ?>
		<td <?php echo $pres_mas_timeoftaking_delete->ID->cellAttributes() ?>>
<span id="el<?php echo $pres_mas_timeoftaking_delete->RowCount ?>_pres_mas_timeoftaking_ID" class="pres_mas_timeoftaking_ID">
<span<?php echo $pres_mas_timeoftaking_delete->ID->viewAttributes() ?>><?php echo $pres_mas_timeoftaking_delete->ID->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_mas_timeoftaking_delete->Time_Of_Taking->Visible) { // Time Of Taking ?>
		<td <?php echo $pres_mas_timeoftaking_delete->Time_Of_Taking->cellAttributes() ?>>
<span id="el<?php echo $pres_mas_timeoftaking_delete->RowCount ?>_pres_mas_timeoftaking_Time_Of_Taking" class="pres_mas_timeoftaking_Time_Of_Taking">
<span<?php echo $pres_mas_timeoftaking_delete->Time_Of_Taking->viewAttributes() ?>><?php echo $pres_mas_timeoftaking_delete->Time_Of_Taking->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_mas_timeoftaking_delete->Recordset->moveNext();
}
$pres_mas_timeoftaking_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_mas_timeoftaking_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_mas_timeoftaking_delete->showPageFooter();
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
$pres_mas_timeoftaking_delete->terminate();
?>
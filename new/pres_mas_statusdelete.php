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
$pres_mas_status_delete = new pres_mas_status_delete();

// Run the page
$pres_mas_status_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_mas_status_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_mas_statusdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpres_mas_statusdelete = currentForm = new ew.Form("fpres_mas_statusdelete", "delete");
	loadjs.done("fpres_mas_statusdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_mas_status_delete->showPageHeader(); ?>
<?php
$pres_mas_status_delete->showMessage();
?>
<form name="fpres_mas_statusdelete" id="fpres_mas_statusdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_mas_status">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_mas_status_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_mas_status_delete->id->Visible) { // id ?>
		<th class="<?php echo $pres_mas_status_delete->id->headerCellClass() ?>"><span id="elh_pres_mas_status_id" class="pres_mas_status_id"><?php echo $pres_mas_status_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($pres_mas_status_delete->Status->Visible) { // Status ?>
		<th class="<?php echo $pres_mas_status_delete->Status->headerCellClass() ?>"><span id="elh_pres_mas_status_Status" class="pres_mas_status_Status"><?php echo $pres_mas_status_delete->Status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_mas_status_delete->RecordCount = 0;
$i = 0;
while (!$pres_mas_status_delete->Recordset->EOF) {
	$pres_mas_status_delete->RecordCount++;
	$pres_mas_status_delete->RowCount++;

	// Set row properties
	$pres_mas_status->resetAttributes();
	$pres_mas_status->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_mas_status_delete->loadRowValues($pres_mas_status_delete->Recordset);

	// Render row
	$pres_mas_status_delete->renderRow();
?>
	<tr <?php echo $pres_mas_status->rowAttributes() ?>>
<?php if ($pres_mas_status_delete->id->Visible) { // id ?>
		<td <?php echo $pres_mas_status_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pres_mas_status_delete->RowCount ?>_pres_mas_status_id" class="pres_mas_status_id">
<span<?php echo $pres_mas_status_delete->id->viewAttributes() ?>><?php echo $pres_mas_status_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_mas_status_delete->Status->Visible) { // Status ?>
		<td <?php echo $pres_mas_status_delete->Status->cellAttributes() ?>>
<span id="el<?php echo $pres_mas_status_delete->RowCount ?>_pres_mas_status_Status" class="pres_mas_status_Status">
<span<?php echo $pres_mas_status_delete->Status->viewAttributes() ?>><?php echo $pres_mas_status_delete->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_mas_status_delete->Recordset->moveNext();
}
$pres_mas_status_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_mas_status_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_mas_status_delete->showPageFooter();
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
$pres_mas_status_delete->terminate();
?>
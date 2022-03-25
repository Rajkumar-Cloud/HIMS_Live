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
$pres_restricteddruglist_delete = new pres_restricteddruglist_delete();

// Run the page
$pres_restricteddruglist_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_restricteddruglist_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_restricteddruglistdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpres_restricteddruglistdelete = currentForm = new ew.Form("fpres_restricteddruglistdelete", "delete");
	loadjs.done("fpres_restricteddruglistdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_restricteddruglist_delete->showPageHeader(); ?>
<?php
$pres_restricteddruglist_delete->showMessage();
?>
<form name="fpres_restricteddruglistdelete" id="fpres_restricteddruglistdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_restricteddruglist">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_restricteddruglist_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_restricteddruglist_delete->id->Visible) { // id ?>
		<th class="<?php echo $pres_restricteddruglist_delete->id->headerCellClass() ?>"><span id="elh_pres_restricteddruglist_id" class="pres_restricteddruglist_id"><?php echo $pres_restricteddruglist_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($pres_restricteddruglist_delete->Genericname->Visible) { // Genericname ?>
		<th class="<?php echo $pres_restricteddruglist_delete->Genericname->headerCellClass() ?>"><span id="elh_pres_restricteddruglist_Genericname" class="pres_restricteddruglist_Genericname"><?php echo $pres_restricteddruglist_delete->Genericname->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_restricteddruglist_delete->RecordCount = 0;
$i = 0;
while (!$pres_restricteddruglist_delete->Recordset->EOF) {
	$pres_restricteddruglist_delete->RecordCount++;
	$pres_restricteddruglist_delete->RowCount++;

	// Set row properties
	$pres_restricteddruglist->resetAttributes();
	$pres_restricteddruglist->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_restricteddruglist_delete->loadRowValues($pres_restricteddruglist_delete->Recordset);

	// Render row
	$pres_restricteddruglist_delete->renderRow();
?>
	<tr <?php echo $pres_restricteddruglist->rowAttributes() ?>>
<?php if ($pres_restricteddruglist_delete->id->Visible) { // id ?>
		<td <?php echo $pres_restricteddruglist_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pres_restricteddruglist_delete->RowCount ?>_pres_restricteddruglist_id" class="pres_restricteddruglist_id">
<span<?php echo $pres_restricteddruglist_delete->id->viewAttributes() ?>><?php echo $pres_restricteddruglist_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_restricteddruglist_delete->Genericname->Visible) { // Genericname ?>
		<td <?php echo $pres_restricteddruglist_delete->Genericname->cellAttributes() ?>>
<span id="el<?php echo $pres_restricteddruglist_delete->RowCount ?>_pres_restricteddruglist_Genericname" class="pres_restricteddruglist_Genericname">
<span<?php echo $pres_restricteddruglist_delete->Genericname->viewAttributes() ?>><?php echo $pres_restricteddruglist_delete->Genericname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_restricteddruglist_delete->Recordset->moveNext();
}
$pres_restricteddruglist_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_restricteddruglist_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_restricteddruglist_delete->showPageFooter();
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
$pres_restricteddruglist_delete->terminate();
?>
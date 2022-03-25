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
$pres_fluids_delete = new pres_fluids_delete();

// Run the page
$pres_fluids_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_fluids_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_fluidsdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpres_fluidsdelete = currentForm = new ew.Form("fpres_fluidsdelete", "delete");
	loadjs.done("fpres_fluidsdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_fluids_delete->showPageHeader(); ?>
<?php
$pres_fluids_delete->showMessage();
?>
<form name="fpres_fluidsdelete" id="fpres_fluidsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_fluids">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_fluids_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_fluids_delete->id->Visible) { // id ?>
		<th class="<?php echo $pres_fluids_delete->id->headerCellClass() ?>"><span id="elh_pres_fluids_id" class="pres_fluids_id"><?php echo $pres_fluids_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluids_delete->FORMS->Visible) { // FORMS ?>
		<th class="<?php echo $pres_fluids_delete->FORMS->headerCellClass() ?>"><span id="elh_pres_fluids_FORMS" class="pres_fluids_FORMS"><?php echo $pres_fluids_delete->FORMS->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_fluids_delete->RecordCount = 0;
$i = 0;
while (!$pres_fluids_delete->Recordset->EOF) {
	$pres_fluids_delete->RecordCount++;
	$pres_fluids_delete->RowCount++;

	// Set row properties
	$pres_fluids->resetAttributes();
	$pres_fluids->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_fluids_delete->loadRowValues($pres_fluids_delete->Recordset);

	// Render row
	$pres_fluids_delete->renderRow();
?>
	<tr <?php echo $pres_fluids->rowAttributes() ?>>
<?php if ($pres_fluids_delete->id->Visible) { // id ?>
		<td <?php echo $pres_fluids_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pres_fluids_delete->RowCount ?>_pres_fluids_id" class="pres_fluids_id">
<span<?php echo $pres_fluids_delete->id->viewAttributes() ?>><?php echo $pres_fluids_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluids_delete->FORMS->Visible) { // FORMS ?>
		<td <?php echo $pres_fluids_delete->FORMS->cellAttributes() ?>>
<span id="el<?php echo $pres_fluids_delete->RowCount ?>_pres_fluids_FORMS" class="pres_fluids_FORMS">
<span<?php echo $pres_fluids_delete->FORMS->viewAttributes() ?>><?php echo $pres_fluids_delete->FORMS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_fluids_delete->Recordset->moveNext();
}
$pres_fluids_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_fluids_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_fluids_delete->showPageFooter();
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
$pres_fluids_delete->terminate();
?>
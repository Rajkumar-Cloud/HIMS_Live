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
$pharmacy_master_generic_delete = new pharmacy_master_generic_delete();

// Run the page
$pharmacy_master_generic_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_master_generic_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpharmacy_master_genericdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpharmacy_master_genericdelete = currentForm = new ew.Form("fpharmacy_master_genericdelete", "delete");
	loadjs.done("fpharmacy_master_genericdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pharmacy_master_generic_delete->showPageHeader(); ?>
<?php
$pharmacy_master_generic_delete->showMessage();
?>
<form name="fpharmacy_master_genericdelete" id="fpharmacy_master_genericdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_generic">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_master_generic_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_master_generic_delete->GENNAME->Visible) { // GENNAME ?>
		<th class="<?php echo $pharmacy_master_generic_delete->GENNAME->headerCellClass() ?>"><span id="elh_pharmacy_master_generic_GENNAME" class="pharmacy_master_generic_GENNAME"><?php echo $pharmacy_master_generic_delete->GENNAME->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_master_generic_delete->CODE->Visible) { // CODE ?>
		<th class="<?php echo $pharmacy_master_generic_delete->CODE->headerCellClass() ?>"><span id="elh_pharmacy_master_generic_CODE" class="pharmacy_master_generic_CODE"><?php echo $pharmacy_master_generic_delete->CODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_master_generic_delete->GRPCODE->Visible) { // GRPCODE ?>
		<th class="<?php echo $pharmacy_master_generic_delete->GRPCODE->headerCellClass() ?>"><span id="elh_pharmacy_master_generic_GRPCODE" class="pharmacy_master_generic_GRPCODE"><?php echo $pharmacy_master_generic_delete->GRPCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_master_generic_delete->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_master_generic_delete->id->headerCellClass() ?>"><span id="elh_pharmacy_master_generic_id" class="pharmacy_master_generic_id"><?php echo $pharmacy_master_generic_delete->id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_master_generic_delete->RecordCount = 0;
$i = 0;
while (!$pharmacy_master_generic_delete->Recordset->EOF) {
	$pharmacy_master_generic_delete->RecordCount++;
	$pharmacy_master_generic_delete->RowCount++;

	// Set row properties
	$pharmacy_master_generic->resetAttributes();
	$pharmacy_master_generic->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_master_generic_delete->loadRowValues($pharmacy_master_generic_delete->Recordset);

	// Render row
	$pharmacy_master_generic_delete->renderRow();
?>
	<tr <?php echo $pharmacy_master_generic->rowAttributes() ?>>
<?php if ($pharmacy_master_generic_delete->GENNAME->Visible) { // GENNAME ?>
		<td <?php echo $pharmacy_master_generic_delete->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_generic_delete->RowCount ?>_pharmacy_master_generic_GENNAME" class="pharmacy_master_generic_GENNAME">
<span<?php echo $pharmacy_master_generic_delete->GENNAME->viewAttributes() ?>><?php echo $pharmacy_master_generic_delete->GENNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_master_generic_delete->CODE->Visible) { // CODE ?>
		<td <?php echo $pharmacy_master_generic_delete->CODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_generic_delete->RowCount ?>_pharmacy_master_generic_CODE" class="pharmacy_master_generic_CODE">
<span<?php echo $pharmacy_master_generic_delete->CODE->viewAttributes() ?>><?php echo $pharmacy_master_generic_delete->CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_master_generic_delete->GRPCODE->Visible) { // GRPCODE ?>
		<td <?php echo $pharmacy_master_generic_delete->GRPCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_generic_delete->RowCount ?>_pharmacy_master_generic_GRPCODE" class="pharmacy_master_generic_GRPCODE">
<span<?php echo $pharmacy_master_generic_delete->GRPCODE->viewAttributes() ?>><?php echo $pharmacy_master_generic_delete->GRPCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_master_generic_delete->id->Visible) { // id ?>
		<td <?php echo $pharmacy_master_generic_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_generic_delete->RowCount ?>_pharmacy_master_generic_id" class="pharmacy_master_generic_id">
<span<?php echo $pharmacy_master_generic_delete->id->viewAttributes() ?>><?php echo $pharmacy_master_generic_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_master_generic_delete->Recordset->moveNext();
}
$pharmacy_master_generic_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_master_generic_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_master_generic_delete->showPageFooter();
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
$pharmacy_master_generic_delete->terminate();
?>
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
$pres_tradenames_delete = new pres_tradenames_delete();

// Run the page
$pres_tradenames_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_tradenames_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_tradenamesdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpres_tradenamesdelete = currentForm = new ew.Form("fpres_tradenamesdelete", "delete");
	loadjs.done("fpres_tradenamesdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_tradenames_delete->showPageHeader(); ?>
<?php
$pres_tradenames_delete->showMessage();
?>
<form name="fpres_tradenamesdelete" id="fpres_tradenamesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_tradenames">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_tradenames_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_tradenames_delete->id->Visible) { // id ?>
		<th class="<?php echo $pres_tradenames_delete->id->headerCellClass() ?>"><span id="elh_pres_tradenames_id" class="pres_tradenames_id"><?php echo $pres_tradenames_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_delete->PR_CODE->Visible) { // PR_CODE ?>
		<th class="<?php echo $pres_tradenames_delete->PR_CODE->headerCellClass() ?>"><span id="elh_pres_tradenames_PR_CODE" class="pres_tradenames_PR_CODE"><?php echo $pres_tradenames_delete->PR_CODE->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_delete->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
		<th class="<?php echo $pres_tradenames_delete->CONTAINER_TYPE->headerCellClass() ?>"><span id="elh_pres_tradenames_CONTAINER_TYPE" class="pres_tradenames_CONTAINER_TYPE"><?php echo $pres_tradenames_delete->CONTAINER_TYPE->caption() ?></span></th>
<?php } ?>
<?php if ($pres_tradenames_delete->STRENGTH->Visible) { // STRENGTH ?>
		<th class="<?php echo $pres_tradenames_delete->STRENGTH->headerCellClass() ?>"><span id="elh_pres_tradenames_STRENGTH" class="pres_tradenames_STRENGTH"><?php echo $pres_tradenames_delete->STRENGTH->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_tradenames_delete->RecordCount = 0;
$i = 0;
while (!$pres_tradenames_delete->Recordset->EOF) {
	$pres_tradenames_delete->RecordCount++;
	$pres_tradenames_delete->RowCount++;

	// Set row properties
	$pres_tradenames->resetAttributes();
	$pres_tradenames->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_tradenames_delete->loadRowValues($pres_tradenames_delete->Recordset);

	// Render row
	$pres_tradenames_delete->renderRow();
?>
	<tr <?php echo $pres_tradenames->rowAttributes() ?>>
<?php if ($pres_tradenames_delete->id->Visible) { // id ?>
		<td <?php echo $pres_tradenames_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_delete->RowCount ?>_pres_tradenames_id" class="pres_tradenames_id">
<span<?php echo $pres_tradenames_delete->id->viewAttributes() ?>><?php echo $pres_tradenames_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_delete->PR_CODE->Visible) { // PR_CODE ?>
		<td <?php echo $pres_tradenames_delete->PR_CODE->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_delete->RowCount ?>_pres_tradenames_PR_CODE" class="pres_tradenames_PR_CODE">
<span<?php echo $pres_tradenames_delete->PR_CODE->viewAttributes() ?>><?php echo $pres_tradenames_delete->PR_CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_delete->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
		<td <?php echo $pres_tradenames_delete->CONTAINER_TYPE->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_delete->RowCount ?>_pres_tradenames_CONTAINER_TYPE" class="pres_tradenames_CONTAINER_TYPE">
<span<?php echo $pres_tradenames_delete->CONTAINER_TYPE->viewAttributes() ?>><?php echo $pres_tradenames_delete->CONTAINER_TYPE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_tradenames_delete->STRENGTH->Visible) { // STRENGTH ?>
		<td <?php echo $pres_tradenames_delete->STRENGTH->cellAttributes() ?>>
<span id="el<?php echo $pres_tradenames_delete->RowCount ?>_pres_tradenames_STRENGTH" class="pres_tradenames_STRENGTH">
<span<?php echo $pres_tradenames_delete->STRENGTH->viewAttributes() ?>><?php echo $pres_tradenames_delete->STRENGTH->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_tradenames_delete->Recordset->moveNext();
}
$pres_tradenames_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_tradenames_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_tradenames_delete->showPageFooter();
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
$pres_tradenames_delete->terminate();
?>
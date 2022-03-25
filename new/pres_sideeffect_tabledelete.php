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
$pres_sideeffect_table_delete = new pres_sideeffect_table_delete();

// Run the page
$pres_sideeffect_table_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_sideeffect_table_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_sideeffect_tabledelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpres_sideeffect_tabledelete = currentForm = new ew.Form("fpres_sideeffect_tabledelete", "delete");
	loadjs.done("fpres_sideeffect_tabledelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_sideeffect_table_delete->showPageHeader(); ?>
<?php
$pres_sideeffect_table_delete->showMessage();
?>
<form name="fpres_sideeffect_tabledelete" id="fpres_sideeffect_tabledelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_sideeffect_table">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_sideeffect_table_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_sideeffect_table_delete->id->Visible) { // id ?>
		<th class="<?php echo $pres_sideeffect_table_delete->id->headerCellClass() ?>"><span id="elh_pres_sideeffect_table_id" class="pres_sideeffect_table_id"><?php echo $pres_sideeffect_table_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($pres_sideeffect_table_delete->Genericname->Visible) { // Genericname ?>
		<th class="<?php echo $pres_sideeffect_table_delete->Genericname->headerCellClass() ?>"><span id="elh_pres_sideeffect_table_Genericname" class="pres_sideeffect_table_Genericname"><?php echo $pres_sideeffect_table_delete->Genericname->caption() ?></span></th>
<?php } ?>
<?php if ($pres_sideeffect_table_delete->SideEffects->Visible) { // SideEffects ?>
		<th class="<?php echo $pres_sideeffect_table_delete->SideEffects->headerCellClass() ?>"><span id="elh_pres_sideeffect_table_SideEffects" class="pres_sideeffect_table_SideEffects"><?php echo $pres_sideeffect_table_delete->SideEffects->caption() ?></span></th>
<?php } ?>
<?php if ($pres_sideeffect_table_delete->Contraindications->Visible) { // Contraindications ?>
		<th class="<?php echo $pres_sideeffect_table_delete->Contraindications->headerCellClass() ?>"><span id="elh_pres_sideeffect_table_Contraindications" class="pres_sideeffect_table_Contraindications"><?php echo $pres_sideeffect_table_delete->Contraindications->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_sideeffect_table_delete->RecordCount = 0;
$i = 0;
while (!$pres_sideeffect_table_delete->Recordset->EOF) {
	$pres_sideeffect_table_delete->RecordCount++;
	$pres_sideeffect_table_delete->RowCount++;

	// Set row properties
	$pres_sideeffect_table->resetAttributes();
	$pres_sideeffect_table->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_sideeffect_table_delete->loadRowValues($pres_sideeffect_table_delete->Recordset);

	// Render row
	$pres_sideeffect_table_delete->renderRow();
?>
	<tr <?php echo $pres_sideeffect_table->rowAttributes() ?>>
<?php if ($pres_sideeffect_table_delete->id->Visible) { // id ?>
		<td <?php echo $pres_sideeffect_table_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pres_sideeffect_table_delete->RowCount ?>_pres_sideeffect_table_id" class="pres_sideeffect_table_id">
<span<?php echo $pres_sideeffect_table_delete->id->viewAttributes() ?>><?php echo $pres_sideeffect_table_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_sideeffect_table_delete->Genericname->Visible) { // Genericname ?>
		<td <?php echo $pres_sideeffect_table_delete->Genericname->cellAttributes() ?>>
<span id="el<?php echo $pres_sideeffect_table_delete->RowCount ?>_pres_sideeffect_table_Genericname" class="pres_sideeffect_table_Genericname">
<span<?php echo $pres_sideeffect_table_delete->Genericname->viewAttributes() ?>><?php echo $pres_sideeffect_table_delete->Genericname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_sideeffect_table_delete->SideEffects->Visible) { // SideEffects ?>
		<td <?php echo $pres_sideeffect_table_delete->SideEffects->cellAttributes() ?>>
<span id="el<?php echo $pres_sideeffect_table_delete->RowCount ?>_pres_sideeffect_table_SideEffects" class="pres_sideeffect_table_SideEffects">
<span<?php echo $pres_sideeffect_table_delete->SideEffects->viewAttributes() ?>><?php echo $pres_sideeffect_table_delete->SideEffects->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_sideeffect_table_delete->Contraindications->Visible) { // Contraindications ?>
		<td <?php echo $pres_sideeffect_table_delete->Contraindications->cellAttributes() ?>>
<span id="el<?php echo $pres_sideeffect_table_delete->RowCount ?>_pres_sideeffect_table_Contraindications" class="pres_sideeffect_table_Contraindications">
<span<?php echo $pres_sideeffect_table_delete->Contraindications->viewAttributes() ?>><?php echo $pres_sideeffect_table_delete->Contraindications->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_sideeffect_table_delete->Recordset->moveNext();
}
$pres_sideeffect_table_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_sideeffect_table_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_sideeffect_table_delete->showPageFooter();
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
$pres_sideeffect_table_delete->terminate();
?>
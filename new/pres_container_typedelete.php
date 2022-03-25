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
$pres_container_type_delete = new pres_container_type_delete();

// Run the page
$pres_container_type_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_container_type_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_container_typedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpres_container_typedelete = currentForm = new ew.Form("fpres_container_typedelete", "delete");
	loadjs.done("fpres_container_typedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_container_type_delete->showPageHeader(); ?>
<?php
$pres_container_type_delete->showMessage();
?>
<form name="fpres_container_typedelete" id="fpres_container_typedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_container_type">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_container_type_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_container_type_delete->id->Visible) { // id ?>
		<th class="<?php echo $pres_container_type_delete->id->headerCellClass() ?>"><span id="elh_pres_container_type_id" class="pres_container_type_id"><?php echo $pres_container_type_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($pres_container_type_delete->Container->Visible) { // Container ?>
		<th class="<?php echo $pres_container_type_delete->Container->headerCellClass() ?>"><span id="elh_pres_container_type_Container" class="pres_container_type_Container"><?php echo $pres_container_type_delete->Container->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_container_type_delete->RecordCount = 0;
$i = 0;
while (!$pres_container_type_delete->Recordset->EOF) {
	$pres_container_type_delete->RecordCount++;
	$pres_container_type_delete->RowCount++;

	// Set row properties
	$pres_container_type->resetAttributes();
	$pres_container_type->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_container_type_delete->loadRowValues($pres_container_type_delete->Recordset);

	// Render row
	$pres_container_type_delete->renderRow();
?>
	<tr <?php echo $pres_container_type->rowAttributes() ?>>
<?php if ($pres_container_type_delete->id->Visible) { // id ?>
		<td <?php echo $pres_container_type_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pres_container_type_delete->RowCount ?>_pres_container_type_id" class="pres_container_type_id">
<span<?php echo $pres_container_type_delete->id->viewAttributes() ?>><?php echo $pres_container_type_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_container_type_delete->Container->Visible) { // Container ?>
		<td <?php echo $pres_container_type_delete->Container->cellAttributes() ?>>
<span id="el<?php echo $pres_container_type_delete->RowCount ?>_pres_container_type_Container" class="pres_container_type_Container">
<span<?php echo $pres_container_type_delete->Container->viewAttributes() ?>><?php echo $pres_container_type_delete->Container->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_container_type_delete->Recordset->moveNext();
}
$pres_container_type_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_container_type_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_container_type_delete->showPageFooter();
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
$pres_container_type_delete->terminate();
?>
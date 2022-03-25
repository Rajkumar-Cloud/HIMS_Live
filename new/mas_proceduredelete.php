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
$mas_procedure_delete = new mas_procedure_delete();

// Run the page
$mas_procedure_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_procedure_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_proceduredelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmas_proceduredelete = currentForm = new ew.Form("fmas_proceduredelete", "delete");
	loadjs.done("fmas_proceduredelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_procedure_delete->showPageHeader(); ?>
<?php
$mas_procedure_delete->showMessage();
?>
<form name="fmas_proceduredelete" id="fmas_proceduredelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_procedure">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_procedure_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_procedure_delete->id->Visible) { // id ?>
		<th class="<?php echo $mas_procedure_delete->id->headerCellClass() ?>"><span id="elh_mas_procedure_id" class="mas_procedure_id"><?php echo $mas_procedure_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_procedure_delete->PROCEDURE->Visible) { // PROCEDURE ?>
		<th class="<?php echo $mas_procedure_delete->PROCEDURE->headerCellClass() ?>"><span id="elh_mas_procedure_PROCEDURE" class="mas_procedure_PROCEDURE"><?php echo $mas_procedure_delete->PROCEDURE->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_procedure_delete->RecordCount = 0;
$i = 0;
while (!$mas_procedure_delete->Recordset->EOF) {
	$mas_procedure_delete->RecordCount++;
	$mas_procedure_delete->RowCount++;

	// Set row properties
	$mas_procedure->resetAttributes();
	$mas_procedure->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_procedure_delete->loadRowValues($mas_procedure_delete->Recordset);

	// Render row
	$mas_procedure_delete->renderRow();
?>
	<tr <?php echo $mas_procedure->rowAttributes() ?>>
<?php if ($mas_procedure_delete->id->Visible) { // id ?>
		<td <?php echo $mas_procedure_delete->id->cellAttributes() ?>>
<span id="el<?php echo $mas_procedure_delete->RowCount ?>_mas_procedure_id" class="mas_procedure_id">
<span<?php echo $mas_procedure_delete->id->viewAttributes() ?>><?php echo $mas_procedure_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_procedure_delete->PROCEDURE->Visible) { // PROCEDURE ?>
		<td <?php echo $mas_procedure_delete->PROCEDURE->cellAttributes() ?>>
<span id="el<?php echo $mas_procedure_delete->RowCount ?>_mas_procedure_PROCEDURE" class="mas_procedure_PROCEDURE">
<span<?php echo $mas_procedure_delete->PROCEDURE->viewAttributes() ?>><?php echo $mas_procedure_delete->PROCEDURE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_procedure_delete->Recordset->moveNext();
}
$mas_procedure_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_procedure_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_procedure_delete->showPageFooter();
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
$mas_procedure_delete->terminate();
?>
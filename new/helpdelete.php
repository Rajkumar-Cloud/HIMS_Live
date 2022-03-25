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
$help_delete = new help_delete();

// Run the page
$help_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$help_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fhelpdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fhelpdelete = currentForm = new ew.Form("fhelpdelete", "delete");
	loadjs.done("fhelpdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $help_delete->showPageHeader(); ?>
<?php
$help_delete->showMessage();
?>
<form name="fhelpdelete" id="fhelpdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="help">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($help_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($help_delete->id->Visible) { // id ?>
		<th class="<?php echo $help_delete->id->headerCellClass() ?>"><span id="elh_help_id" class="help_id"><?php echo $help_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($help_delete->Tittle->Visible) { // Tittle ?>
		<th class="<?php echo $help_delete->Tittle->headerCellClass() ?>"><span id="elh_help_Tittle" class="help_Tittle"><?php echo $help_delete->Tittle->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$help_delete->RecordCount = 0;
$i = 0;
while (!$help_delete->Recordset->EOF) {
	$help_delete->RecordCount++;
	$help_delete->RowCount++;

	// Set row properties
	$help->resetAttributes();
	$help->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$help_delete->loadRowValues($help_delete->Recordset);

	// Render row
	$help_delete->renderRow();
?>
	<tr <?php echo $help->rowAttributes() ?>>
<?php if ($help_delete->id->Visible) { // id ?>
		<td <?php echo $help_delete->id->cellAttributes() ?>>
<span id="el<?php echo $help_delete->RowCount ?>_help_id" class="help_id">
<span<?php echo $help_delete->id->viewAttributes() ?>><?php echo $help_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($help_delete->Tittle->Visible) { // Tittle ?>
		<td <?php echo $help_delete->Tittle->cellAttributes() ?>>
<span id="el<?php echo $help_delete->RowCount ?>_help_Tittle" class="help_Tittle">
<span<?php echo $help_delete->Tittle->viewAttributes() ?>><?php echo $help_delete->Tittle->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$help_delete->Recordset->moveNext();
}
$help_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $help_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$help_delete->showPageFooter();
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
$help_delete->terminate();
?>
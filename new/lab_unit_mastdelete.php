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
$lab_unit_mast_delete = new lab_unit_mast_delete();

// Run the page
$lab_unit_mast_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_unit_mast_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flab_unit_mastdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	flab_unit_mastdelete = currentForm = new ew.Form("flab_unit_mastdelete", "delete");
	loadjs.done("flab_unit_mastdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lab_unit_mast_delete->showPageHeader(); ?>
<?php
$lab_unit_mast_delete->showMessage();
?>
<form name="flab_unit_mastdelete" id="flab_unit_mastdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_unit_mast">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lab_unit_mast_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lab_unit_mast_delete->id->Visible) { // id ?>
		<th class="<?php echo $lab_unit_mast_delete->id->headerCellClass() ?>"><span id="elh_lab_unit_mast_id" class="lab_unit_mast_id"><?php echo $lab_unit_mast_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($lab_unit_mast_delete->Code->Visible) { // Code ?>
		<th class="<?php echo $lab_unit_mast_delete->Code->headerCellClass() ?>"><span id="elh_lab_unit_mast_Code" class="lab_unit_mast_Code"><?php echo $lab_unit_mast_delete->Code->caption() ?></span></th>
<?php } ?>
<?php if ($lab_unit_mast_delete->Name->Visible) { // Name ?>
		<th class="<?php echo $lab_unit_mast_delete->Name->headerCellClass() ?>"><span id="elh_lab_unit_mast_Name" class="lab_unit_mast_Name"><?php echo $lab_unit_mast_delete->Name->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lab_unit_mast_delete->RecordCount = 0;
$i = 0;
while (!$lab_unit_mast_delete->Recordset->EOF) {
	$lab_unit_mast_delete->RecordCount++;
	$lab_unit_mast_delete->RowCount++;

	// Set row properties
	$lab_unit_mast->resetAttributes();
	$lab_unit_mast->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lab_unit_mast_delete->loadRowValues($lab_unit_mast_delete->Recordset);

	// Render row
	$lab_unit_mast_delete->renderRow();
?>
	<tr <?php echo $lab_unit_mast->rowAttributes() ?>>
<?php if ($lab_unit_mast_delete->id->Visible) { // id ?>
		<td <?php echo $lab_unit_mast_delete->id->cellAttributes() ?>>
<span id="el<?php echo $lab_unit_mast_delete->RowCount ?>_lab_unit_mast_id" class="lab_unit_mast_id">
<span<?php echo $lab_unit_mast_delete->id->viewAttributes() ?>><?php echo $lab_unit_mast_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_unit_mast_delete->Code->Visible) { // Code ?>
		<td <?php echo $lab_unit_mast_delete->Code->cellAttributes() ?>>
<span id="el<?php echo $lab_unit_mast_delete->RowCount ?>_lab_unit_mast_Code" class="lab_unit_mast_Code">
<span<?php echo $lab_unit_mast_delete->Code->viewAttributes() ?>><?php echo $lab_unit_mast_delete->Code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_unit_mast_delete->Name->Visible) { // Name ?>
		<td <?php echo $lab_unit_mast_delete->Name->cellAttributes() ?>>
<span id="el<?php echo $lab_unit_mast_delete->RowCount ?>_lab_unit_mast_Name" class="lab_unit_mast_Name">
<span<?php echo $lab_unit_mast_delete->Name->viewAttributes() ?>><?php echo $lab_unit_mast_delete->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$lab_unit_mast_delete->Recordset->moveNext();
}
$lab_unit_mast_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_unit_mast_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$lab_unit_mast_delete->showPageFooter();
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
$lab_unit_mast_delete->terminate();
?>
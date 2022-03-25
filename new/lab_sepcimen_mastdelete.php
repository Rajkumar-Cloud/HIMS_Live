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
$lab_sepcimen_mast_delete = new lab_sepcimen_mast_delete();

// Run the page
$lab_sepcimen_mast_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_sepcimen_mast_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flab_sepcimen_mastdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	flab_sepcimen_mastdelete = currentForm = new ew.Form("flab_sepcimen_mastdelete", "delete");
	loadjs.done("flab_sepcimen_mastdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lab_sepcimen_mast_delete->showPageHeader(); ?>
<?php
$lab_sepcimen_mast_delete->showMessage();
?>
<form name="flab_sepcimen_mastdelete" id="flab_sepcimen_mastdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_sepcimen_mast">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lab_sepcimen_mast_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lab_sepcimen_mast_delete->SpecimenCD->Visible) { // SpecimenCD ?>
		<th class="<?php echo $lab_sepcimen_mast_delete->SpecimenCD->headerCellClass() ?>"><span id="elh_lab_sepcimen_mast_SpecimenCD" class="lab_sepcimen_mast_SpecimenCD"><?php echo $lab_sepcimen_mast_delete->SpecimenCD->caption() ?></span></th>
<?php } ?>
<?php if ($lab_sepcimen_mast_delete->SpecimenDesc->Visible) { // SpecimenDesc ?>
		<th class="<?php echo $lab_sepcimen_mast_delete->SpecimenDesc->headerCellClass() ?>"><span id="elh_lab_sepcimen_mast_SpecimenDesc" class="lab_sepcimen_mast_SpecimenDesc"><?php echo $lab_sepcimen_mast_delete->SpecimenDesc->caption() ?></span></th>
<?php } ?>
<?php if ($lab_sepcimen_mast_delete->id->Visible) { // id ?>
		<th class="<?php echo $lab_sepcimen_mast_delete->id->headerCellClass() ?>"><span id="elh_lab_sepcimen_mast_id" class="lab_sepcimen_mast_id"><?php echo $lab_sepcimen_mast_delete->id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lab_sepcimen_mast_delete->RecordCount = 0;
$i = 0;
while (!$lab_sepcimen_mast_delete->Recordset->EOF) {
	$lab_sepcimen_mast_delete->RecordCount++;
	$lab_sepcimen_mast_delete->RowCount++;

	// Set row properties
	$lab_sepcimen_mast->resetAttributes();
	$lab_sepcimen_mast->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lab_sepcimen_mast_delete->loadRowValues($lab_sepcimen_mast_delete->Recordset);

	// Render row
	$lab_sepcimen_mast_delete->renderRow();
?>
	<tr <?php echo $lab_sepcimen_mast->rowAttributes() ?>>
<?php if ($lab_sepcimen_mast_delete->SpecimenCD->Visible) { // SpecimenCD ?>
		<td <?php echo $lab_sepcimen_mast_delete->SpecimenCD->cellAttributes() ?>>
<span id="el<?php echo $lab_sepcimen_mast_delete->RowCount ?>_lab_sepcimen_mast_SpecimenCD" class="lab_sepcimen_mast_SpecimenCD">
<span<?php echo $lab_sepcimen_mast_delete->SpecimenCD->viewAttributes() ?>><?php echo $lab_sepcimen_mast_delete->SpecimenCD->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_sepcimen_mast_delete->SpecimenDesc->Visible) { // SpecimenDesc ?>
		<td <?php echo $lab_sepcimen_mast_delete->SpecimenDesc->cellAttributes() ?>>
<span id="el<?php echo $lab_sepcimen_mast_delete->RowCount ?>_lab_sepcimen_mast_SpecimenDesc" class="lab_sepcimen_mast_SpecimenDesc">
<span<?php echo $lab_sepcimen_mast_delete->SpecimenDesc->viewAttributes() ?>><?php echo $lab_sepcimen_mast_delete->SpecimenDesc->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_sepcimen_mast_delete->id->Visible) { // id ?>
		<td <?php echo $lab_sepcimen_mast_delete->id->cellAttributes() ?>>
<span id="el<?php echo $lab_sepcimen_mast_delete->RowCount ?>_lab_sepcimen_mast_id" class="lab_sepcimen_mast_id">
<span<?php echo $lab_sepcimen_mast_delete->id->viewAttributes() ?>><?php echo $lab_sepcimen_mast_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$lab_sepcimen_mast_delete->Recordset->moveNext();
}
$lab_sepcimen_mast_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_sepcimen_mast_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$lab_sepcimen_mast_delete->showPageFooter();
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
$lab_sepcimen_mast_delete->terminate();
?>
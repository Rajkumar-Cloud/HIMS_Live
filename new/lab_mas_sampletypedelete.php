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
$lab_mas_sampletype_delete = new lab_mas_sampletype_delete();

// Run the page
$lab_mas_sampletype_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$lab_mas_sampletype_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var flab_mas_sampletypedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	flab_mas_sampletypedelete = currentForm = new ew.Form("flab_mas_sampletypedelete", "delete");
	loadjs.done("flab_mas_sampletypedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $lab_mas_sampletype_delete->showPageHeader(); ?>
<?php
$lab_mas_sampletype_delete->showMessage();
?>
<form name="flab_mas_sampletypedelete" id="flab_mas_sampletypedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="lab_mas_sampletype">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($lab_mas_sampletype_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($lab_mas_sampletype_delete->id->Visible) { // id ?>
		<th class="<?php echo $lab_mas_sampletype_delete->id->headerCellClass() ?>"><span id="elh_lab_mas_sampletype_id" class="lab_mas_sampletype_id"><?php echo $lab_mas_sampletype_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($lab_mas_sampletype_delete->CATEGORY->Visible) { // CATEGORY ?>
		<th class="<?php echo $lab_mas_sampletype_delete->CATEGORY->headerCellClass() ?>"><span id="elh_lab_mas_sampletype_CATEGORY" class="lab_mas_sampletype_CATEGORY"><?php echo $lab_mas_sampletype_delete->CATEGORY->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$lab_mas_sampletype_delete->RecordCount = 0;
$i = 0;
while (!$lab_mas_sampletype_delete->Recordset->EOF) {
	$lab_mas_sampletype_delete->RecordCount++;
	$lab_mas_sampletype_delete->RowCount++;

	// Set row properties
	$lab_mas_sampletype->resetAttributes();
	$lab_mas_sampletype->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$lab_mas_sampletype_delete->loadRowValues($lab_mas_sampletype_delete->Recordset);

	// Render row
	$lab_mas_sampletype_delete->renderRow();
?>
	<tr <?php echo $lab_mas_sampletype->rowAttributes() ?>>
<?php if ($lab_mas_sampletype_delete->id->Visible) { // id ?>
		<td <?php echo $lab_mas_sampletype_delete->id->cellAttributes() ?>>
<span id="el<?php echo $lab_mas_sampletype_delete->RowCount ?>_lab_mas_sampletype_id" class="lab_mas_sampletype_id">
<span<?php echo $lab_mas_sampletype_delete->id->viewAttributes() ?>><?php echo $lab_mas_sampletype_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($lab_mas_sampletype_delete->CATEGORY->Visible) { // CATEGORY ?>
		<td <?php echo $lab_mas_sampletype_delete->CATEGORY->cellAttributes() ?>>
<span id="el<?php echo $lab_mas_sampletype_delete->RowCount ?>_lab_mas_sampletype_CATEGORY" class="lab_mas_sampletype_CATEGORY">
<span<?php echo $lab_mas_sampletype_delete->CATEGORY->viewAttributes() ?>><?php echo $lab_mas_sampletype_delete->CATEGORY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$lab_mas_sampletype_delete->Recordset->moveNext();
}
$lab_mas_sampletype_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $lab_mas_sampletype_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$lab_mas_sampletype_delete->showPageFooter();
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
$lab_mas_sampletype_delete->terminate();
?>
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
$mas_category_delete = new mas_category_delete();

// Run the page
$mas_category_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_category_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_categorydelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmas_categorydelete = currentForm = new ew.Form("fmas_categorydelete", "delete");
	loadjs.done("fmas_categorydelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_category_delete->showPageHeader(); ?>
<?php
$mas_category_delete->showMessage();
?>
<form name="fmas_categorydelete" id="fmas_categorydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_category">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_category_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_category_delete->id->Visible) { // id ?>
		<th class="<?php echo $mas_category_delete->id->headerCellClass() ?>"><span id="elh_mas_category_id" class="mas_category_id"><?php echo $mas_category_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_category_delete->CATEGORY->Visible) { // CATEGORY ?>
		<th class="<?php echo $mas_category_delete->CATEGORY->headerCellClass() ?>"><span id="elh_mas_category_CATEGORY" class="mas_category_CATEGORY"><?php echo $mas_category_delete->CATEGORY->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_category_delete->RecordCount = 0;
$i = 0;
while (!$mas_category_delete->Recordset->EOF) {
	$mas_category_delete->RecordCount++;
	$mas_category_delete->RowCount++;

	// Set row properties
	$mas_category->resetAttributes();
	$mas_category->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_category_delete->loadRowValues($mas_category_delete->Recordset);

	// Render row
	$mas_category_delete->renderRow();
?>
	<tr <?php echo $mas_category->rowAttributes() ?>>
<?php if ($mas_category_delete->id->Visible) { // id ?>
		<td <?php echo $mas_category_delete->id->cellAttributes() ?>>
<span id="el<?php echo $mas_category_delete->RowCount ?>_mas_category_id" class="mas_category_id">
<span<?php echo $mas_category_delete->id->viewAttributes() ?>><?php echo $mas_category_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_category_delete->CATEGORY->Visible) { // CATEGORY ?>
		<td <?php echo $mas_category_delete->CATEGORY->cellAttributes() ?>>
<span id="el<?php echo $mas_category_delete->RowCount ?>_mas_category_CATEGORY" class="mas_category_CATEGORY">
<span<?php echo $mas_category_delete->CATEGORY->viewAttributes() ?>><?php echo $mas_category_delete->CATEGORY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_category_delete->Recordset->moveNext();
}
$mas_category_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_category_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_category_delete->showPageFooter();
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
$mas_category_delete->terminate();
?>
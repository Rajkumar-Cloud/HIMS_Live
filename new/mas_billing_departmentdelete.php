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
$mas_billing_department_delete = new mas_billing_department_delete();

// Run the page
$mas_billing_department_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_billing_department_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fmas_billing_departmentdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fmas_billing_departmentdelete = currentForm = new ew.Form("fmas_billing_departmentdelete", "delete");
	loadjs.done("fmas_billing_departmentdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $mas_billing_department_delete->showPageHeader(); ?>
<?php
$mas_billing_department_delete->showMessage();
?>
<form name="fmas_billing_departmentdelete" id="fmas_billing_departmentdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_billing_department">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_billing_department_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_billing_department_delete->id->Visible) { // id ?>
		<th class="<?php echo $mas_billing_department_delete->id->headerCellClass() ?>"><span id="elh_mas_billing_department_id" class="mas_billing_department_id"><?php echo $mas_billing_department_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_billing_department_delete->department->Visible) { // department ?>
		<th class="<?php echo $mas_billing_department_delete->department->headerCellClass() ?>"><span id="elh_mas_billing_department_department" class="mas_billing_department_department"><?php echo $mas_billing_department_delete->department->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_billing_department_delete->RecordCount = 0;
$i = 0;
while (!$mas_billing_department_delete->Recordset->EOF) {
	$mas_billing_department_delete->RecordCount++;
	$mas_billing_department_delete->RowCount++;

	// Set row properties
	$mas_billing_department->resetAttributes();
	$mas_billing_department->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_billing_department_delete->loadRowValues($mas_billing_department_delete->Recordset);

	// Render row
	$mas_billing_department_delete->renderRow();
?>
	<tr <?php echo $mas_billing_department->rowAttributes() ?>>
<?php if ($mas_billing_department_delete->id->Visible) { // id ?>
		<td <?php echo $mas_billing_department_delete->id->cellAttributes() ?>>
<span id="el<?php echo $mas_billing_department_delete->RowCount ?>_mas_billing_department_id" class="mas_billing_department_id">
<span<?php echo $mas_billing_department_delete->id->viewAttributes() ?>><?php echo $mas_billing_department_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_billing_department_delete->department->Visible) { // department ?>
		<td <?php echo $mas_billing_department_delete->department->cellAttributes() ?>>
<span id="el<?php echo $mas_billing_department_delete->RowCount ?>_mas_billing_department_department" class="mas_billing_department_department">
<span<?php echo $mas_billing_department_delete->department->viewAttributes() ?>><?php echo $mas_billing_department_delete->department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_billing_department_delete->Recordset->moveNext();
}
$mas_billing_department_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_billing_department_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_billing_department_delete->showPageFooter();
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
$mas_billing_department_delete->terminate();
?>
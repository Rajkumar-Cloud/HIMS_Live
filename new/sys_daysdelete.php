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
$sys_days_delete = new sys_days_delete();

// Run the page
$sys_days_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_days_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fsys_daysdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fsys_daysdelete = currentForm = new ew.Form("fsys_daysdelete", "delete");
	loadjs.done("fsys_daysdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $sys_days_delete->showPageHeader(); ?>
<?php
$sys_days_delete->showMessage();
?>
<form name="fsys_daysdelete" id="fsys_daysdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_days">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sys_days_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sys_days_delete->id->Visible) { // id ?>
		<th class="<?php echo $sys_days_delete->id->headerCellClass() ?>"><span id="elh_sys_days_id" class="sys_days_id"><?php echo $sys_days_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($sys_days_delete->Days->Visible) { // Days ?>
		<th class="<?php echo $sys_days_delete->Days->headerCellClass() ?>"><span id="elh_sys_days_Days" class="sys_days_Days"><?php echo $sys_days_delete->Days->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sys_days_delete->RecordCount = 0;
$i = 0;
while (!$sys_days_delete->Recordset->EOF) {
	$sys_days_delete->RecordCount++;
	$sys_days_delete->RowCount++;

	// Set row properties
	$sys_days->resetAttributes();
	$sys_days->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sys_days_delete->loadRowValues($sys_days_delete->Recordset);

	// Render row
	$sys_days_delete->renderRow();
?>
	<tr <?php echo $sys_days->rowAttributes() ?>>
<?php if ($sys_days_delete->id->Visible) { // id ?>
		<td <?php echo $sys_days_delete->id->cellAttributes() ?>>
<span id="el<?php echo $sys_days_delete->RowCount ?>_sys_days_id" class="sys_days_id">
<span<?php echo $sys_days_delete->id->viewAttributes() ?>><?php echo $sys_days_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_days_delete->Days->Visible) { // Days ?>
		<td <?php echo $sys_days_delete->Days->cellAttributes() ?>>
<span id="el<?php echo $sys_days_delete->RowCount ?>_sys_days_Days" class="sys_days_Days">
<span<?php echo $sys_days_delete->Days->viewAttributes() ?>><?php echo $sys_days_delete->Days->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sys_days_delete->Recordset->moveNext();
}
$sys_days_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sys_days_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sys_days_delete->showPageFooter();
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
$sys_days_delete->terminate();
?>
<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$sys_timezones_delete = new sys_timezones_delete();

// Run the page
$sys_timezones_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_timezones_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fsys_timezonesdelete = currentForm = new ew.Form("fsys_timezonesdelete", "delete");

// Form_CustomValidate event
fsys_timezonesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_timezonesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sys_timezones_delete->showPageHeader(); ?>
<?php
$sys_timezones_delete->showMessage();
?>
<form name="fsys_timezonesdelete" id="fsys_timezonesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_timezones_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_timezones_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_timezones">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sys_timezones_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sys_timezones->id->Visible) { // id ?>
		<th class="<?php echo $sys_timezones->id->headerCellClass() ?>"><span id="elh_sys_timezones_id" class="sys_timezones_id"><?php echo $sys_timezones->id->caption() ?></span></th>
<?php } ?>
<?php if ($sys_timezones->name->Visible) { // name ?>
		<th class="<?php echo $sys_timezones->name->headerCellClass() ?>"><span id="elh_sys_timezones_name" class="sys_timezones_name"><?php echo $sys_timezones->name->caption() ?></span></th>
<?php } ?>
<?php if ($sys_timezones->details->Visible) { // details ?>
		<th class="<?php echo $sys_timezones->details->headerCellClass() ?>"><span id="elh_sys_timezones_details" class="sys_timezones_details"><?php echo $sys_timezones->details->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sys_timezones_delete->RecCnt = 0;
$i = 0;
while (!$sys_timezones_delete->Recordset->EOF) {
	$sys_timezones_delete->RecCnt++;
	$sys_timezones_delete->RowCnt++;

	// Set row properties
	$sys_timezones->resetAttributes();
	$sys_timezones->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sys_timezones_delete->loadRowValues($sys_timezones_delete->Recordset);

	// Render row
	$sys_timezones_delete->renderRow();
?>
	<tr<?php echo $sys_timezones->rowAttributes() ?>>
<?php if ($sys_timezones->id->Visible) { // id ?>
		<td<?php echo $sys_timezones->id->cellAttributes() ?>>
<span id="el<?php echo $sys_timezones_delete->RowCnt ?>_sys_timezones_id" class="sys_timezones_id">
<span<?php echo $sys_timezones->id->viewAttributes() ?>>
<?php echo $sys_timezones->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_timezones->name->Visible) { // name ?>
		<td<?php echo $sys_timezones->name->cellAttributes() ?>>
<span id="el<?php echo $sys_timezones_delete->RowCnt ?>_sys_timezones_name" class="sys_timezones_name">
<span<?php echo $sys_timezones->name->viewAttributes() ?>>
<?php echo $sys_timezones->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_timezones->details->Visible) { // details ?>
		<td<?php echo $sys_timezones->details->cellAttributes() ?>>
<span id="el<?php echo $sys_timezones_delete->RowCnt ?>_sys_timezones_details" class="sys_timezones_details">
<span<?php echo $sys_timezones->details->viewAttributes() ?>>
<?php echo $sys_timezones->details->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sys_timezones_delete->Recordset->moveNext();
}
$sys_timezones_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sys_timezones_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sys_timezones_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sys_timezones_delete->terminate();
?>
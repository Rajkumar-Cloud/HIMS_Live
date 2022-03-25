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
$sys_status_delete = new sys_status_delete();

// Run the page
$sys_status_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_status_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fsys_statusdelete = currentForm = new ew.Form("fsys_statusdelete", "delete");

// Form_CustomValidate event
fsys_statusdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_statusdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sys_status_delete->showPageHeader(); ?>
<?php
$sys_status_delete->showMessage();
?>
<form name="fsys_statusdelete" id="fsys_statusdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_status_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_status_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_status">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sys_status_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sys_status->id->Visible) { // id ?>
		<th class="<?php echo $sys_status->id->headerCellClass() ?>"><span id="elh_sys_status_id" class="sys_status_id"><?php echo $sys_status->id->caption() ?></span></th>
<?php } ?>
<?php if ($sys_status->Name->Visible) { // Name ?>
		<th class="<?php echo $sys_status->Name->headerCellClass() ?>"><span id="elh_sys_status_Name" class="sys_status_Name"><?php echo $sys_status->Name->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sys_status_delete->RecCnt = 0;
$i = 0;
while (!$sys_status_delete->Recordset->EOF) {
	$sys_status_delete->RecCnt++;
	$sys_status_delete->RowCnt++;

	// Set row properties
	$sys_status->resetAttributes();
	$sys_status->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sys_status_delete->loadRowValues($sys_status_delete->Recordset);

	// Render row
	$sys_status_delete->renderRow();
?>
	<tr<?php echo $sys_status->rowAttributes() ?>>
<?php if ($sys_status->id->Visible) { // id ?>
		<td<?php echo $sys_status->id->cellAttributes() ?>>
<span id="el<?php echo $sys_status_delete->RowCnt ?>_sys_status_id" class="sys_status_id">
<span<?php echo $sys_status->id->viewAttributes() ?>>
<?php echo $sys_status->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_status->Name->Visible) { // Name ?>
		<td<?php echo $sys_status->Name->cellAttributes() ?>>
<span id="el<?php echo $sys_status_delete->RowCnt ?>_sys_status_Name" class="sys_status_Name">
<span<?php echo $sys_status->Name->viewAttributes() ?>>
<?php echo $sys_status->Name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sys_status_delete->Recordset->moveNext();
}
$sys_status_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sys_status_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sys_status_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sys_status_delete->terminate();
?>
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
$sys_nationality_delete = new sys_nationality_delete();

// Run the page
$sys_nationality_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_nationality_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fsys_nationalitydelete = currentForm = new ew.Form("fsys_nationalitydelete", "delete");

// Form_CustomValidate event
fsys_nationalitydelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_nationalitydelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sys_nationality_delete->showPageHeader(); ?>
<?php
$sys_nationality_delete->showMessage();
?>
<form name="fsys_nationalitydelete" id="fsys_nationalitydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_nationality_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_nationality_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_nationality">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sys_nationality_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sys_nationality->id->Visible) { // id ?>
		<th class="<?php echo $sys_nationality->id->headerCellClass() ?>"><span id="elh_sys_nationality_id" class="sys_nationality_id"><?php echo $sys_nationality->id->caption() ?></span></th>
<?php } ?>
<?php if ($sys_nationality->name->Visible) { // name ?>
		<th class="<?php echo $sys_nationality->name->headerCellClass() ?>"><span id="elh_sys_nationality_name" class="sys_nationality_name"><?php echo $sys_nationality->name->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sys_nationality_delete->RecCnt = 0;
$i = 0;
while (!$sys_nationality_delete->Recordset->EOF) {
	$sys_nationality_delete->RecCnt++;
	$sys_nationality_delete->RowCnt++;

	// Set row properties
	$sys_nationality->resetAttributes();
	$sys_nationality->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sys_nationality_delete->loadRowValues($sys_nationality_delete->Recordset);

	// Render row
	$sys_nationality_delete->renderRow();
?>
	<tr<?php echo $sys_nationality->rowAttributes() ?>>
<?php if ($sys_nationality->id->Visible) { // id ?>
		<td<?php echo $sys_nationality->id->cellAttributes() ?>>
<span id="el<?php echo $sys_nationality_delete->RowCnt ?>_sys_nationality_id" class="sys_nationality_id">
<span<?php echo $sys_nationality->id->viewAttributes() ?>>
<?php echo $sys_nationality->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_nationality->name->Visible) { // name ?>
		<td<?php echo $sys_nationality->name->cellAttributes() ?>>
<span id="el<?php echo $sys_nationality_delete->RowCnt ?>_sys_nationality_name" class="sys_nationality_name">
<span<?php echo $sys_nationality->name->viewAttributes() ?>>
<?php echo $sys_nationality->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sys_nationality_delete->Recordset->moveNext();
}
$sys_nationality_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sys_nationality_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sys_nationality_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sys_nationality_delete->terminate();
?>
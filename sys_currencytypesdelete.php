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
$sys_currencytypes_delete = new sys_currencytypes_delete();

// Run the page
$sys_currencytypes_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_currencytypes_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fsys_currencytypesdelete = currentForm = new ew.Form("fsys_currencytypesdelete", "delete");

// Form_CustomValidate event
fsys_currencytypesdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_currencytypesdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sys_currencytypes_delete->showPageHeader(); ?>
<?php
$sys_currencytypes_delete->showMessage();
?>
<form name="fsys_currencytypesdelete" id="fsys_currencytypesdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_currencytypes_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_currencytypes_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_currencytypes">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sys_currencytypes_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sys_currencytypes->id->Visible) { // id ?>
		<th class="<?php echo $sys_currencytypes->id->headerCellClass() ?>"><span id="elh_sys_currencytypes_id" class="sys_currencytypes_id"><?php echo $sys_currencytypes->id->caption() ?></span></th>
<?php } ?>
<?php if ($sys_currencytypes->code->Visible) { // code ?>
		<th class="<?php echo $sys_currencytypes->code->headerCellClass() ?>"><span id="elh_sys_currencytypes_code" class="sys_currencytypes_code"><?php echo $sys_currencytypes->code->caption() ?></span></th>
<?php } ?>
<?php if ($sys_currencytypes->name->Visible) { // name ?>
		<th class="<?php echo $sys_currencytypes->name->headerCellClass() ?>"><span id="elh_sys_currencytypes_name" class="sys_currencytypes_name"><?php echo $sys_currencytypes->name->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sys_currencytypes_delete->RecCnt = 0;
$i = 0;
while (!$sys_currencytypes_delete->Recordset->EOF) {
	$sys_currencytypes_delete->RecCnt++;
	$sys_currencytypes_delete->RowCnt++;

	// Set row properties
	$sys_currencytypes->resetAttributes();
	$sys_currencytypes->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sys_currencytypes_delete->loadRowValues($sys_currencytypes_delete->Recordset);

	// Render row
	$sys_currencytypes_delete->renderRow();
?>
	<tr<?php echo $sys_currencytypes->rowAttributes() ?>>
<?php if ($sys_currencytypes->id->Visible) { // id ?>
		<td<?php echo $sys_currencytypes->id->cellAttributes() ?>>
<span id="el<?php echo $sys_currencytypes_delete->RowCnt ?>_sys_currencytypes_id" class="sys_currencytypes_id">
<span<?php echo $sys_currencytypes->id->viewAttributes() ?>>
<?php echo $sys_currencytypes->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_currencytypes->code->Visible) { // code ?>
		<td<?php echo $sys_currencytypes->code->cellAttributes() ?>>
<span id="el<?php echo $sys_currencytypes_delete->RowCnt ?>_sys_currencytypes_code" class="sys_currencytypes_code">
<span<?php echo $sys_currencytypes->code->viewAttributes() ?>>
<?php echo $sys_currencytypes->code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_currencytypes->name->Visible) { // name ?>
		<td<?php echo $sys_currencytypes->name->cellAttributes() ?>>
<span id="el<?php echo $sys_currencytypes_delete->RowCnt ?>_sys_currencytypes_name" class="sys_currencytypes_name">
<span<?php echo $sys_currencytypes->name->viewAttributes() ?>>
<?php echo $sys_currencytypes->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sys_currencytypes_delete->Recordset->moveNext();
}
$sys_currencytypes_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sys_currencytypes_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sys_currencytypes_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sys_currencytypes_delete->terminate();
?>
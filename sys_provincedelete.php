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
$sys_province_delete = new sys_province_delete();

// Run the page
$sys_province_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_province_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fsys_provincedelete = currentForm = new ew.Form("fsys_provincedelete", "delete");

// Form_CustomValidate event
fsys_provincedelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_provincedelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sys_province_delete->showPageHeader(); ?>
<?php
$sys_province_delete->showMessage();
?>
<form name="fsys_provincedelete" id="fsys_provincedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_province_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_province_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_province">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sys_province_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sys_province->id->Visible) { // id ?>
		<th class="<?php echo $sys_province->id->headerCellClass() ?>"><span id="elh_sys_province_id" class="sys_province_id"><?php echo $sys_province->id->caption() ?></span></th>
<?php } ?>
<?php if ($sys_province->name->Visible) { // name ?>
		<th class="<?php echo $sys_province->name->headerCellClass() ?>"><span id="elh_sys_province_name" class="sys_province_name"><?php echo $sys_province->name->caption() ?></span></th>
<?php } ?>
<?php if ($sys_province->code->Visible) { // code ?>
		<th class="<?php echo $sys_province->code->headerCellClass() ?>"><span id="elh_sys_province_code" class="sys_province_code"><?php echo $sys_province->code->caption() ?></span></th>
<?php } ?>
<?php if ($sys_province->country->Visible) { // country ?>
		<th class="<?php echo $sys_province->country->headerCellClass() ?>"><span id="elh_sys_province_country" class="sys_province_country"><?php echo $sys_province->country->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sys_province_delete->RecCnt = 0;
$i = 0;
while (!$sys_province_delete->Recordset->EOF) {
	$sys_province_delete->RecCnt++;
	$sys_province_delete->RowCnt++;

	// Set row properties
	$sys_province->resetAttributes();
	$sys_province->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sys_province_delete->loadRowValues($sys_province_delete->Recordset);

	// Render row
	$sys_province_delete->renderRow();
?>
	<tr<?php echo $sys_province->rowAttributes() ?>>
<?php if ($sys_province->id->Visible) { // id ?>
		<td<?php echo $sys_province->id->cellAttributes() ?>>
<span id="el<?php echo $sys_province_delete->RowCnt ?>_sys_province_id" class="sys_province_id">
<span<?php echo $sys_province->id->viewAttributes() ?>>
<?php echo $sys_province->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_province->name->Visible) { // name ?>
		<td<?php echo $sys_province->name->cellAttributes() ?>>
<span id="el<?php echo $sys_province_delete->RowCnt ?>_sys_province_name" class="sys_province_name">
<span<?php echo $sys_province->name->viewAttributes() ?>>
<?php echo $sys_province->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_province->code->Visible) { // code ?>
		<td<?php echo $sys_province->code->cellAttributes() ?>>
<span id="el<?php echo $sys_province_delete->RowCnt ?>_sys_province_code" class="sys_province_code">
<span<?php echo $sys_province->code->viewAttributes() ?>>
<?php echo $sys_province->code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sys_province->country->Visible) { // country ?>
		<td<?php echo $sys_province->country->cellAttributes() ?>>
<span id="el<?php echo $sys_province_delete->RowCnt ?>_sys_province_country" class="sys_province_country">
<span<?php echo $sys_province->country->viewAttributes() ?>>
<?php echo $sys_province->country->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sys_province_delete->Recordset->moveNext();
}
$sys_province_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sys_province_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sys_province_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sys_province_delete->terminate();
?>
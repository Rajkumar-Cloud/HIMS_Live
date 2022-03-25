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
$employee_permissions_delete = new employee_permissions_delete();

// Run the page
$employee_permissions_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_permissions_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var femployee_permissionsdelete = currentForm = new ew.Form("femployee_permissionsdelete", "delete");

// Form_CustomValidate event
femployee_permissionsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_permissionsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_permissionsdelete.lists["x_user_level"] = <?php echo $employee_permissions_delete->user_level->Lookup->toClientList() ?>;
femployee_permissionsdelete.lists["x_user_level"].options = <?php echo JsonEncode($employee_permissions_delete->user_level->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $employee_permissions_delete->showPageHeader(); ?>
<?php
$employee_permissions_delete->showMessage();
?>
<form name="femployee_permissionsdelete" id="femployee_permissionsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_permissions_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_permissions_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_permissions">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($employee_permissions_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($employee_permissions->id->Visible) { // id ?>
		<th class="<?php echo $employee_permissions->id->headerCellClass() ?>"><span id="elh_employee_permissions_id" class="employee_permissions_id"><?php echo $employee_permissions->id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_permissions->user_level->Visible) { // user_level ?>
		<th class="<?php echo $employee_permissions->user_level->headerCellClass() ?>"><span id="elh_employee_permissions_user_level" class="employee_permissions_user_level"><?php echo $employee_permissions->user_level->caption() ?></span></th>
<?php } ?>
<?php if ($employee_permissions->module_id->Visible) { // module_id ?>
		<th class="<?php echo $employee_permissions->module_id->headerCellClass() ?>"><span id="elh_employee_permissions_module_id" class="employee_permissions_module_id"><?php echo $employee_permissions->module_id->caption() ?></span></th>
<?php } ?>
<?php if ($employee_permissions->permission->Visible) { // permission ?>
		<th class="<?php echo $employee_permissions->permission->headerCellClass() ?>"><span id="elh_employee_permissions_permission" class="employee_permissions_permission"><?php echo $employee_permissions->permission->caption() ?></span></th>
<?php } ?>
<?php if ($employee_permissions->value->Visible) { // value ?>
		<th class="<?php echo $employee_permissions->value->headerCellClass() ?>"><span id="elh_employee_permissions_value" class="employee_permissions_value"><?php echo $employee_permissions->value->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$employee_permissions_delete->RecCnt = 0;
$i = 0;
while (!$employee_permissions_delete->Recordset->EOF) {
	$employee_permissions_delete->RecCnt++;
	$employee_permissions_delete->RowCnt++;

	// Set row properties
	$employee_permissions->resetAttributes();
	$employee_permissions->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$employee_permissions_delete->loadRowValues($employee_permissions_delete->Recordset);

	// Render row
	$employee_permissions_delete->renderRow();
?>
	<tr<?php echo $employee_permissions->rowAttributes() ?>>
<?php if ($employee_permissions->id->Visible) { // id ?>
		<td<?php echo $employee_permissions->id->cellAttributes() ?>>
<span id="el<?php echo $employee_permissions_delete->RowCnt ?>_employee_permissions_id" class="employee_permissions_id">
<span<?php echo $employee_permissions->id->viewAttributes() ?>>
<?php echo $employee_permissions->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_permissions->user_level->Visible) { // user_level ?>
		<td<?php echo $employee_permissions->user_level->cellAttributes() ?>>
<span id="el<?php echo $employee_permissions_delete->RowCnt ?>_employee_permissions_user_level" class="employee_permissions_user_level">
<span<?php echo $employee_permissions->user_level->viewAttributes() ?>>
<?php echo $employee_permissions->user_level->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_permissions->module_id->Visible) { // module_id ?>
		<td<?php echo $employee_permissions->module_id->cellAttributes() ?>>
<span id="el<?php echo $employee_permissions_delete->RowCnt ?>_employee_permissions_module_id" class="employee_permissions_module_id">
<span<?php echo $employee_permissions->module_id->viewAttributes() ?>>
<?php echo $employee_permissions->module_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_permissions->permission->Visible) { // permission ?>
		<td<?php echo $employee_permissions->permission->cellAttributes() ?>>
<span id="el<?php echo $employee_permissions_delete->RowCnt ?>_employee_permissions_permission" class="employee_permissions_permission">
<span<?php echo $employee_permissions->permission->viewAttributes() ?>>
<?php echo $employee_permissions->permission->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($employee_permissions->value->Visible) { // value ?>
		<td<?php echo $employee_permissions->value->cellAttributes() ?>>
<span id="el<?php echo $employee_permissions_delete->RowCnt ?>_employee_permissions_value" class="employee_permissions_value">
<span<?php echo $employee_permissions->value->viewAttributes() ?>>
<?php echo $employee_permissions->value->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$employee_permissions_delete->Recordset->moveNext();
}
$employee_permissions_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $employee_permissions_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$employee_permissions_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$employee_permissions_delete->terminate();
?>
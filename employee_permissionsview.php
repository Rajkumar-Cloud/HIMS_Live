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
$employee_permissions_view = new employee_permissions_view();

// Run the page
$employee_permissions_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_permissions_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$employee_permissions->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var femployee_permissionsview = currentForm = new ew.Form("femployee_permissionsview", "view");

// Form_CustomValidate event
femployee_permissionsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_permissionsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_permissionsview.lists["x_user_level"] = <?php echo $employee_permissions_view->user_level->Lookup->toClientList() ?>;
femployee_permissionsview.lists["x_user_level"].options = <?php echo JsonEncode($employee_permissions_view->user_level->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$employee_permissions->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $employee_permissions_view->ExportOptions->render("body") ?>
<?php $employee_permissions_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $employee_permissions_view->showPageHeader(); ?>
<?php
$employee_permissions_view->showMessage();
?>
<form name="femployee_permissionsview" id="femployee_permissionsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($employee_permissions_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $employee_permissions_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="employee_permissions">
<input type="hidden" name="modal" value="<?php echo (int)$employee_permissions_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($employee_permissions->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $employee_permissions_view->TableLeftColumnClass ?>"><span id="elh_employee_permissions_id"><?php echo $employee_permissions->id->caption() ?></span></td>
		<td data-name="id"<?php echo $employee_permissions->id->cellAttributes() ?>>
<span id="el_employee_permissions_id">
<span<?php echo $employee_permissions->id->viewAttributes() ?>>
<?php echo $employee_permissions->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_permissions->user_level->Visible) { // user_level ?>
	<tr id="r_user_level">
		<td class="<?php echo $employee_permissions_view->TableLeftColumnClass ?>"><span id="elh_employee_permissions_user_level"><?php echo $employee_permissions->user_level->caption() ?></span></td>
		<td data-name="user_level"<?php echo $employee_permissions->user_level->cellAttributes() ?>>
<span id="el_employee_permissions_user_level">
<span<?php echo $employee_permissions->user_level->viewAttributes() ?>>
<?php echo $employee_permissions->user_level->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_permissions->module_id->Visible) { // module_id ?>
	<tr id="r_module_id">
		<td class="<?php echo $employee_permissions_view->TableLeftColumnClass ?>"><span id="elh_employee_permissions_module_id"><?php echo $employee_permissions->module_id->caption() ?></span></td>
		<td data-name="module_id"<?php echo $employee_permissions->module_id->cellAttributes() ?>>
<span id="el_employee_permissions_module_id">
<span<?php echo $employee_permissions->module_id->viewAttributes() ?>>
<?php echo $employee_permissions->module_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_permissions->permission->Visible) { // permission ?>
	<tr id="r_permission">
		<td class="<?php echo $employee_permissions_view->TableLeftColumnClass ?>"><span id="elh_employee_permissions_permission"><?php echo $employee_permissions->permission->caption() ?></span></td>
		<td data-name="permission"<?php echo $employee_permissions->permission->cellAttributes() ?>>
<span id="el_employee_permissions_permission">
<span<?php echo $employee_permissions->permission->viewAttributes() ?>>
<?php echo $employee_permissions->permission->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_permissions->meta->Visible) { // meta ?>
	<tr id="r_meta">
		<td class="<?php echo $employee_permissions_view->TableLeftColumnClass ?>"><span id="elh_employee_permissions_meta"><?php echo $employee_permissions->meta->caption() ?></span></td>
		<td data-name="meta"<?php echo $employee_permissions->meta->cellAttributes() ?>>
<span id="el_employee_permissions_meta">
<span<?php echo $employee_permissions->meta->viewAttributes() ?>>
<?php echo $employee_permissions->meta->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($employee_permissions->value->Visible) { // value ?>
	<tr id="r_value">
		<td class="<?php echo $employee_permissions_view->TableLeftColumnClass ?>"><span id="elh_employee_permissions_value"><?php echo $employee_permissions->value->caption() ?></span></td>
		<td data-name="value"<?php echo $employee_permissions->value->cellAttributes() ?>>
<span id="el_employee_permissions_value">
<span<?php echo $employee_permissions->value->viewAttributes() ?>>
<?php echo $employee_permissions->value->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$employee_permissions_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$employee_permissions->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$employee_permissions_view->terminate();
?>
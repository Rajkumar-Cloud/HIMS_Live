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
$sys_province_view = new sys_province_view();

// Run the page
$sys_province_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_province_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sys_province->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fsys_provinceview = currentForm = new ew.Form("fsys_provinceview", "view");

// Form_CustomValidate event
fsys_provinceview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_provinceview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$sys_province->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sys_province_view->ExportOptions->render("body") ?>
<?php $sys_province_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sys_province_view->showPageHeader(); ?>
<?php
$sys_province_view->showMessage();
?>
<form name="fsys_provinceview" id="fsys_provinceview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_province_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_province_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_province">
<input type="hidden" name="modal" value="<?php echo (int)$sys_province_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sys_province->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $sys_province_view->TableLeftColumnClass ?>"><span id="elh_sys_province_id"><?php echo $sys_province->id->caption() ?></span></td>
		<td data-name="id"<?php echo $sys_province->id->cellAttributes() ?>>
<span id="el_sys_province_id">
<span<?php echo $sys_province->id->viewAttributes() ?>>
<?php echo $sys_province->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_province->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $sys_province_view->TableLeftColumnClass ?>"><span id="elh_sys_province_name"><?php echo $sys_province->name->caption() ?></span></td>
		<td data-name="name"<?php echo $sys_province->name->cellAttributes() ?>>
<span id="el_sys_province_name">
<span<?php echo $sys_province->name->viewAttributes() ?>>
<?php echo $sys_province->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_province->code->Visible) { // code ?>
	<tr id="r_code">
		<td class="<?php echo $sys_province_view->TableLeftColumnClass ?>"><span id="elh_sys_province_code"><?php echo $sys_province->code->caption() ?></span></td>
		<td data-name="code"<?php echo $sys_province->code->cellAttributes() ?>>
<span id="el_sys_province_code">
<span<?php echo $sys_province->code->viewAttributes() ?>>
<?php echo $sys_province->code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_province->country->Visible) { // country ?>
	<tr id="r_country">
		<td class="<?php echo $sys_province_view->TableLeftColumnClass ?>"><span id="elh_sys_province_country"><?php echo $sys_province->country->caption() ?></span></td>
		<td data-name="country"<?php echo $sys_province->country->cellAttributes() ?>>
<span id="el_sys_province_country">
<span<?php echo $sys_province->country->viewAttributes() ?>>
<?php echo $sys_province->country->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sys_province_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sys_province->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sys_province_view->terminate();
?>
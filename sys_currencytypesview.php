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
$sys_currencytypes_view = new sys_currencytypes_view();

// Run the page
$sys_currencytypes_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_currencytypes_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sys_currencytypes->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fsys_currencytypesview = currentForm = new ew.Form("fsys_currencytypesview", "view");

// Form_CustomValidate event
fsys_currencytypesview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_currencytypesview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$sys_currencytypes->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sys_currencytypes_view->ExportOptions->render("body") ?>
<?php $sys_currencytypes_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sys_currencytypes_view->showPageHeader(); ?>
<?php
$sys_currencytypes_view->showMessage();
?>
<form name="fsys_currencytypesview" id="fsys_currencytypesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_currencytypes_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_currencytypes_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_currencytypes">
<input type="hidden" name="modal" value="<?php echo (int)$sys_currencytypes_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sys_currencytypes->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $sys_currencytypes_view->TableLeftColumnClass ?>"><span id="elh_sys_currencytypes_id"><?php echo $sys_currencytypes->id->caption() ?></span></td>
		<td data-name="id"<?php echo $sys_currencytypes->id->cellAttributes() ?>>
<span id="el_sys_currencytypes_id">
<span<?php echo $sys_currencytypes->id->viewAttributes() ?>>
<?php echo $sys_currencytypes->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_currencytypes->code->Visible) { // code ?>
	<tr id="r_code">
		<td class="<?php echo $sys_currencytypes_view->TableLeftColumnClass ?>"><span id="elh_sys_currencytypes_code"><?php echo $sys_currencytypes->code->caption() ?></span></td>
		<td data-name="code"<?php echo $sys_currencytypes->code->cellAttributes() ?>>
<span id="el_sys_currencytypes_code">
<span<?php echo $sys_currencytypes->code->viewAttributes() ?>>
<?php echo $sys_currencytypes->code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_currencytypes->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $sys_currencytypes_view->TableLeftColumnClass ?>"><span id="elh_sys_currencytypes_name"><?php echo $sys_currencytypes->name->caption() ?></span></td>
		<td data-name="name"<?php echo $sys_currencytypes->name->cellAttributes() ?>>
<span id="el_sys_currencytypes_name">
<span<?php echo $sys_currencytypes->name->viewAttributes() ?>>
<?php echo $sys_currencytypes->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sys_currencytypes_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sys_currencytypes->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sys_currencytypes_view->terminate();
?>
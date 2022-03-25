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
$sys_nationality_view = new sys_nationality_view();

// Run the page
$sys_nationality_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_nationality_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sys_nationality->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fsys_nationalityview = currentForm = new ew.Form("fsys_nationalityview", "view");

// Form_CustomValidate event
fsys_nationalityview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_nationalityview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$sys_nationality->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sys_nationality_view->ExportOptions->render("body") ?>
<?php $sys_nationality_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sys_nationality_view->showPageHeader(); ?>
<?php
$sys_nationality_view->showMessage();
?>
<form name="fsys_nationalityview" id="fsys_nationalityview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_nationality_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_nationality_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_nationality">
<input type="hidden" name="modal" value="<?php echo (int)$sys_nationality_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sys_nationality->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $sys_nationality_view->TableLeftColumnClass ?>"><span id="elh_sys_nationality_id"><?php echo $sys_nationality->id->caption() ?></span></td>
		<td data-name="id"<?php echo $sys_nationality->id->cellAttributes() ?>>
<span id="el_sys_nationality_id">
<span<?php echo $sys_nationality->id->viewAttributes() ?>>
<?php echo $sys_nationality->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_nationality->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $sys_nationality_view->TableLeftColumnClass ?>"><span id="elh_sys_nationality_name"><?php echo $sys_nationality->name->caption() ?></span></td>
		<td data-name="name"<?php echo $sys_nationality->name->cellAttributes() ?>>
<span id="el_sys_nationality_name">
<span<?php echo $sys_nationality->name->viewAttributes() ?>>
<?php echo $sys_nationality->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sys_nationality_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sys_nationality->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sys_nationality_view->terminate();
?>
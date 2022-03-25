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
$sys_status_view = new sys_status_view();

// Run the page
$sys_status_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_status_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$sys_status->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fsys_statusview = currentForm = new ew.Form("fsys_statusview", "view");

// Form_CustomValidate event
fsys_statusview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsys_statusview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$sys_status->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sys_status_view->ExportOptions->render("body") ?>
<?php $sys_status_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sys_status_view->showPageHeader(); ?>
<?php
$sys_status_view->showMessage();
?>
<form name="fsys_statusview" id="fsys_statusview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sys_status_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sys_status_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_status">
<input type="hidden" name="modal" value="<?php echo (int)$sys_status_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sys_status->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $sys_status_view->TableLeftColumnClass ?>"><span id="elh_sys_status_id"><?php echo $sys_status->id->caption() ?></span></td>
		<td data-name="id"<?php echo $sys_status->id->cellAttributes() ?>>
<span id="el_sys_status_id">
<span<?php echo $sys_status->id->viewAttributes() ?>>
<?php echo $sys_status->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_status->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $sys_status_view->TableLeftColumnClass ?>"><span id="elh_sys_status_Name"><?php echo $sys_status->Name->caption() ?></span></td>
		<td data-name="Name"<?php echo $sys_status->Name->cellAttributes() ?>>
<span id="el_sys_status_Name">
<span<?php echo $sys_status->Name->viewAttributes() ?>>
<?php echo $sys_status->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sys_status_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$sys_status->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$sys_status_view->terminate();
?>
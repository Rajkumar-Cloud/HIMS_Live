<?php
namespace PHPMaker2020\HIMS;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
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
<?php include_once "header.php"; ?>
<?php if (!$sys_status_view->isExport()) { ?>
<script>
var fsys_statusview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fsys_statusview = currentForm = new ew.Form("fsys_statusview", "view");
	loadjs.done("fsys_statusview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$sys_status_view->isExport()) { ?>
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
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_status">
<input type="hidden" name="modal" value="<?php echo (int)$sys_status_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sys_status_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $sys_status_view->TableLeftColumnClass ?>"><span id="elh_sys_status_id"><?php echo $sys_status_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $sys_status_view->id->cellAttributes() ?>>
<span id="el_sys_status_id">
<span<?php echo $sys_status_view->id->viewAttributes() ?>><?php echo $sys_status_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_status_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $sys_status_view->TableLeftColumnClass ?>"><span id="elh_sys_status_Name"><?php echo $sys_status_view->Name->caption() ?></span></td>
		<td data-name="Name" <?php echo $sys_status_view->Name->cellAttributes() ?>>
<span id="el_sys_status_Name">
<span<?php echo $sys_status_view->Name->viewAttributes() ?>><?php echo $sys_status_view->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sys_status_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$sys_status_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$sys_status_view->terminate();
?>
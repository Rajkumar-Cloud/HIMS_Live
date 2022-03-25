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
$sys_gender_view = new sys_gender_view();

// Run the page
$sys_gender_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sys_gender_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$sys_gender_view->isExport()) { ?>
<script>
var fsys_genderview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fsys_genderview = currentForm = new ew.Form("fsys_genderview", "view");
	loadjs.done("fsys_genderview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$sys_gender_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $sys_gender_view->ExportOptions->render("body") ?>
<?php $sys_gender_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $sys_gender_view->showPageHeader(); ?>
<?php
$sys_gender_view->showMessage();
?>
<form name="fsys_genderview" id="fsys_genderview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sys_gender">
<input type="hidden" name="modal" value="<?php echo (int)$sys_gender_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($sys_gender_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $sys_gender_view->TableLeftColumnClass ?>"><span id="elh_sys_gender_id"><?php echo $sys_gender_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $sys_gender_view->id->cellAttributes() ?>>
<span id="el_sys_gender_id">
<span<?php echo $sys_gender_view->id->viewAttributes() ?>><?php echo $sys_gender_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($sys_gender_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $sys_gender_view->TableLeftColumnClass ?>"><span id="elh_sys_gender_Name"><?php echo $sys_gender_view->Name->caption() ?></span></td>
		<td data-name="Name" <?php echo $sys_gender_view->Name->cellAttributes() ?>>
<span id="el_sys_gender_Name">
<span<?php echo $sys_gender_view->Name->viewAttributes() ?>><?php echo $sys_gender_view->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$sys_gender_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$sys_gender_view->isExport()) { ?>
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
$sys_gender_view->terminate();
?>
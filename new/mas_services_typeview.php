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
$mas_services_type_view = new mas_services_type_view();

// Run the page
$mas_services_type_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_services_type_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mas_services_type_view->isExport()) { ?>
<script>
var fmas_services_typeview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmas_services_typeview = currentForm = new ew.Form("fmas_services_typeview", "view");
	loadjs.done("fmas_services_typeview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$mas_services_type_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_services_type_view->ExportOptions->render("body") ?>
<?php $mas_services_type_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_services_type_view->showPageHeader(); ?>
<?php
$mas_services_type_view->showMessage();
?>
<form name="fmas_services_typeview" id="fmas_services_typeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_services_type">
<input type="hidden" name="modal" value="<?php echo (int)$mas_services_type_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_services_type_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_services_type_view->TableLeftColumnClass ?>"><span id="elh_mas_services_type_id"><?php echo $mas_services_type_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $mas_services_type_view->id->cellAttributes() ?>>
<span id="el_mas_services_type_id">
<span<?php echo $mas_services_type_view->id->viewAttributes() ?>><?php echo $mas_services_type_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_services_type_view->name->Visible) { // name ?>
	<tr id="r_name">
		<td class="<?php echo $mas_services_type_view->TableLeftColumnClass ?>"><span id="elh_mas_services_type_name"><?php echo $mas_services_type_view->name->caption() ?></span></td>
		<td data-name="name" <?php echo $mas_services_type_view->name->cellAttributes() ?>>
<span id="el_mas_services_type_name">
<span<?php echo $mas_services_type_view->name->viewAttributes() ?>><?php echo $mas_services_type_view->name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_services_type_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_services_type_view->isExport()) { ?>
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
$mas_services_type_view->terminate();
?>
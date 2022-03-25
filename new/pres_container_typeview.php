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
$pres_container_type_view = new pres_container_type_view();

// Run the page
$pres_container_type_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_container_type_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_container_type_view->isExport()) { ?>
<script>
var fpres_container_typeview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpres_container_typeview = currentForm = new ew.Form("fpres_container_typeview", "view");
	loadjs.done("fpres_container_typeview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pres_container_type_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_container_type_view->ExportOptions->render("body") ?>
<?php $pres_container_type_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_container_type_view->showPageHeader(); ?>
<?php
$pres_container_type_view->showMessage();
?>
<form name="fpres_container_typeview" id="fpres_container_typeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_container_type">
<input type="hidden" name="modal" value="<?php echo (int)$pres_container_type_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_container_type_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_container_type_view->TableLeftColumnClass ?>"><span id="elh_pres_container_type_id"><?php echo $pres_container_type_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pres_container_type_view->id->cellAttributes() ?>>
<span id="el_pres_container_type_id">
<span<?php echo $pres_container_type_view->id->viewAttributes() ?>><?php echo $pres_container_type_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_container_type_view->Container->Visible) { // Container ?>
	<tr id="r_Container">
		<td class="<?php echo $pres_container_type_view->TableLeftColumnClass ?>"><span id="elh_pres_container_type_Container"><?php echo $pres_container_type_view->Container->caption() ?></span></td>
		<td data-name="Container" <?php echo $pres_container_type_view->Container->cellAttributes() ?>>
<span id="el_pres_container_type_Container">
<span<?php echo $pres_container_type_view->Container->viewAttributes() ?>><?php echo $pres_container_type_view->Container->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_container_type_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_container_type_view->isExport()) { ?>
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
$pres_container_type_view->terminate();
?>
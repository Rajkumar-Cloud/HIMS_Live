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
$pres_routes_view = new pres_routes_view();

// Run the page
$pres_routes_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_routes_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_routes_view->isExport()) { ?>
<script>
var fpres_routesview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpres_routesview = currentForm = new ew.Form("fpres_routesview", "view");
	loadjs.done("fpres_routesview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pres_routes_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_routes_view->ExportOptions->render("body") ?>
<?php $pres_routes_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_routes_view->showPageHeader(); ?>
<?php
$pres_routes_view->showMessage();
?>
<form name="fpres_routesview" id="fpres_routesview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_routes">
<input type="hidden" name="modal" value="<?php echo (int)$pres_routes_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_routes_view->S_No->Visible) { // S.No ?>
	<tr id="r_S_No">
		<td class="<?php echo $pres_routes_view->TableLeftColumnClass ?>"><span id="elh_pres_routes_S_No"><?php echo $pres_routes_view->S_No->caption() ?></span></td>
		<td data-name="S_No" <?php echo $pres_routes_view->S_No->cellAttributes() ?>>
<span id="el_pres_routes_S_No">
<span<?php echo $pres_routes_view->S_No->viewAttributes() ?>><?php echo $pres_routes_view->S_No->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_routes_view->_Route->Visible) { // Route ?>
	<tr id="r__Route">
		<td class="<?php echo $pres_routes_view->TableLeftColumnClass ?>"><span id="elh_pres_routes__Route"><?php echo $pres_routes_view->_Route->caption() ?></span></td>
		<td data-name="_Route" <?php echo $pres_routes_view->_Route->cellAttributes() ?>>
<span id="el_pres_routes__Route">
<span<?php echo $pres_routes_view->_Route->viewAttributes() ?>><?php echo $pres_routes_view->_Route->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_routes_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_routes_view->isExport()) { ?>
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
$pres_routes_view->terminate();
?>
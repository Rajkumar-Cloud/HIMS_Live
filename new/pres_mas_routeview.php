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
$pres_mas_route_view = new pres_mas_route_view();

// Run the page
$pres_mas_route_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_mas_route_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_mas_route_view->isExport()) { ?>
<script>
var fpres_mas_routeview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpres_mas_routeview = currentForm = new ew.Form("fpres_mas_routeview", "view");
	loadjs.done("fpres_mas_routeview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pres_mas_route_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_mas_route_view->ExportOptions->render("body") ?>
<?php $pres_mas_route_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_mas_route_view->showPageHeader(); ?>
<?php
$pres_mas_route_view->showMessage();
?>
<form name="fpres_mas_routeview" id="fpres_mas_routeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_mas_route">
<input type="hidden" name="modal" value="<?php echo (int)$pres_mas_route_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_mas_route_view->ID->Visible) { // ID ?>
	<tr id="r_ID">
		<td class="<?php echo $pres_mas_route_view->TableLeftColumnClass ?>"><span id="elh_pres_mas_route_ID"><?php echo $pres_mas_route_view->ID->caption() ?></span></td>
		<td data-name="ID" <?php echo $pres_mas_route_view->ID->cellAttributes() ?>>
<span id="el_pres_mas_route_ID">
<span<?php echo $pres_mas_route_view->ID->viewAttributes() ?>><?php echo $pres_mas_route_view->ID->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_mas_route_view->_Route->Visible) { // Route ?>
	<tr id="r__Route">
		<td class="<?php echo $pres_mas_route_view->TableLeftColumnClass ?>"><span id="elh_pres_mas_route__Route"><?php echo $pres_mas_route_view->_Route->caption() ?></span></td>
		<td data-name="_Route" <?php echo $pres_mas_route_view->_Route->cellAttributes() ?>>
<span id="el_pres_mas_route__Route">
<span<?php echo $pres_mas_route_view->_Route->viewAttributes() ?>><?php echo $pres_mas_route_view->_Route->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_mas_route_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_mas_route_view->isExport()) { ?>
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
$pres_mas_route_view->terminate();
?>
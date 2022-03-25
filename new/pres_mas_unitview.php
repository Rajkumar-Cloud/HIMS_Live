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
$pres_mas_unit_view = new pres_mas_unit_view();

// Run the page
$pres_mas_unit_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_mas_unit_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_mas_unit_view->isExport()) { ?>
<script>
var fpres_mas_unitview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpres_mas_unitview = currentForm = new ew.Form("fpres_mas_unitview", "view");
	loadjs.done("fpres_mas_unitview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pres_mas_unit_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_mas_unit_view->ExportOptions->render("body") ?>
<?php $pres_mas_unit_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_mas_unit_view->showPageHeader(); ?>
<?php
$pres_mas_unit_view->showMessage();
?>
<form name="fpres_mas_unitview" id="fpres_mas_unitview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_mas_unit">
<input type="hidden" name="modal" value="<?php echo (int)$pres_mas_unit_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_mas_unit_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_mas_unit_view->TableLeftColumnClass ?>"><span id="elh_pres_mas_unit_id"><?php echo $pres_mas_unit_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pres_mas_unit_view->id->cellAttributes() ?>>
<span id="el_pres_mas_unit_id">
<span<?php echo $pres_mas_unit_view->id->viewAttributes() ?>><?php echo $pres_mas_unit_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_mas_unit_view->Units->Visible) { // Units ?>
	<tr id="r_Units">
		<td class="<?php echo $pres_mas_unit_view->TableLeftColumnClass ?>"><span id="elh_pres_mas_unit_Units"><?php echo $pres_mas_unit_view->Units->caption() ?></span></td>
		<td data-name="Units" <?php echo $pres_mas_unit_view->Units->cellAttributes() ?>>
<span id="el_pres_mas_unit_Units">
<span<?php echo $pres_mas_unit_view->Units->viewAttributes() ?>><?php echo $pres_mas_unit_view->Units->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_mas_unit_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_mas_unit_view->isExport()) { ?>
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
$pres_mas_unit_view->terminate();
?>
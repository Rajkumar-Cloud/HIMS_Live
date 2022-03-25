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
$pres_quantity_view = new pres_quantity_view();

// Run the page
$pres_quantity_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_quantity_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_quantity_view->isExport()) { ?>
<script>
var fpres_quantityview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpres_quantityview = currentForm = new ew.Form("fpres_quantityview", "view");
	loadjs.done("fpres_quantityview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pres_quantity_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_quantity_view->ExportOptions->render("body") ?>
<?php $pres_quantity_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_quantity_view->showPageHeader(); ?>
<?php
$pres_quantity_view->showMessage();
?>
<form name="fpres_quantityview" id="fpres_quantityview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_quantity">
<input type="hidden" name="modal" value="<?php echo (int)$pres_quantity_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_quantity_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_quantity_view->TableLeftColumnClass ?>"><span id="elh_pres_quantity_id"><?php echo $pres_quantity_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pres_quantity_view->id->cellAttributes() ?>>
<span id="el_pres_quantity_id">
<span<?php echo $pres_quantity_view->id->viewAttributes() ?>><?php echo $pres_quantity_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_quantity_view->Quantity->Visible) { // Quantity ?>
	<tr id="r_Quantity">
		<td class="<?php echo $pres_quantity_view->TableLeftColumnClass ?>"><span id="elh_pres_quantity_Quantity"><?php echo $pres_quantity_view->Quantity->caption() ?></span></td>
		<td data-name="Quantity" <?php echo $pres_quantity_view->Quantity->cellAttributes() ?>>
<span id="el_pres_quantity_Quantity">
<span<?php echo $pres_quantity_view->Quantity->viewAttributes() ?>><?php echo $pres_quantity_view->Quantity->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_quantity_view->Value->Visible) { // Value ?>
	<tr id="r_Value">
		<td class="<?php echo $pres_quantity_view->TableLeftColumnClass ?>"><span id="elh_pres_quantity_Value"><?php echo $pres_quantity_view->Value->caption() ?></span></td>
		<td data-name="Value" <?php echo $pres_quantity_view->Value->cellAttributes() ?>>
<span id="el_pres_quantity_Value">
<span<?php echo $pres_quantity_view->Value->viewAttributes() ?>><?php echo $pres_quantity_view->Value->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_quantity_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_quantity_view->isExport()) { ?>
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
$pres_quantity_view->terminate();
?>
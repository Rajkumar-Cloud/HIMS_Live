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
$mas_paymentcategory_view = new mas_paymentcategory_view();

// Run the page
$mas_paymentcategory_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_paymentcategory_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mas_paymentcategory_view->isExport()) { ?>
<script>
var fmas_paymentcategoryview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmas_paymentcategoryview = currentForm = new ew.Form("fmas_paymentcategoryview", "view");
	loadjs.done("fmas_paymentcategoryview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$mas_paymentcategory_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_paymentcategory_view->ExportOptions->render("body") ?>
<?php $mas_paymentcategory_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_paymentcategory_view->showPageHeader(); ?>
<?php
$mas_paymentcategory_view->showMessage();
?>
<form name="fmas_paymentcategoryview" id="fmas_paymentcategoryview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_paymentcategory">
<input type="hidden" name="modal" value="<?php echo (int)$mas_paymentcategory_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_paymentcategory_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_paymentcategory_view->TableLeftColumnClass ?>"><span id="elh_mas_paymentcategory_id"><?php echo $mas_paymentcategory_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $mas_paymentcategory_view->id->cellAttributes() ?>>
<span id="el_mas_paymentcategory_id">
<span<?php echo $mas_paymentcategory_view->id->viewAttributes() ?>><?php echo $mas_paymentcategory_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_paymentcategory_view->Category->Visible) { // Category ?>
	<tr id="r_Category">
		<td class="<?php echo $mas_paymentcategory_view->TableLeftColumnClass ?>"><span id="elh_mas_paymentcategory_Category"><?php echo $mas_paymentcategory_view->Category->caption() ?></span></td>
		<td data-name="Category" <?php echo $mas_paymentcategory_view->Category->cellAttributes() ?>>
<span id="el_mas_paymentcategory_Category">
<span<?php echo $mas_paymentcategory_view->Category->viewAttributes() ?>><?php echo $mas_paymentcategory_view->Category->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_paymentcategory_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_paymentcategory_view->isExport()) { ?>
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
$mas_paymentcategory_view->terminate();
?>
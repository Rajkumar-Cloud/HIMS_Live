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
$billing_discount_view = new billing_discount_view();

// Run the page
$billing_discount_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$billing_discount_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$billing_discount_view->isExport()) { ?>
<script>
var fbilling_discountview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fbilling_discountview = currentForm = new ew.Form("fbilling_discountview", "view");
	loadjs.done("fbilling_discountview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$billing_discount_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $billing_discount_view->ExportOptions->render("body") ?>
<?php $billing_discount_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $billing_discount_view->showPageHeader(); ?>
<?php
$billing_discount_view->showMessage();
?>
<form name="fbilling_discountview" id="fbilling_discountview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="billing_discount">
<input type="hidden" name="modal" value="<?php echo (int)$billing_discount_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($billing_discount_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $billing_discount_view->TableLeftColumnClass ?>"><span id="elh_billing_discount_id"><?php echo $billing_discount_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $billing_discount_view->id->cellAttributes() ?>>
<span id="el_billing_discount_id">
<span<?php echo $billing_discount_view->id->viewAttributes() ?>><?php echo $billing_discount_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($billing_discount_view->Particulars->Visible) { // Particulars ?>
	<tr id="r_Particulars">
		<td class="<?php echo $billing_discount_view->TableLeftColumnClass ?>"><span id="elh_billing_discount_Particulars"><?php echo $billing_discount_view->Particulars->caption() ?></span></td>
		<td data-name="Particulars" <?php echo $billing_discount_view->Particulars->cellAttributes() ?>>
<span id="el_billing_discount_Particulars">
<span<?php echo $billing_discount_view->Particulars->viewAttributes() ?>><?php echo $billing_discount_view->Particulars->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($billing_discount_view->Procedure->Visible) { // Procedure ?>
	<tr id="r_Procedure">
		<td class="<?php echo $billing_discount_view->TableLeftColumnClass ?>"><span id="elh_billing_discount_Procedure"><?php echo $billing_discount_view->Procedure->caption() ?></span></td>
		<td data-name="Procedure" <?php echo $billing_discount_view->Procedure->cellAttributes() ?>>
<span id="el_billing_discount_Procedure">
<span<?php echo $billing_discount_view->Procedure->viewAttributes() ?>><?php echo $billing_discount_view->Procedure->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($billing_discount_view->Pharmacy->Visible) { // Pharmacy ?>
	<tr id="r_Pharmacy">
		<td class="<?php echo $billing_discount_view->TableLeftColumnClass ?>"><span id="elh_billing_discount_Pharmacy"><?php echo $billing_discount_view->Pharmacy->caption() ?></span></td>
		<td data-name="Pharmacy" <?php echo $billing_discount_view->Pharmacy->cellAttributes() ?>>
<span id="el_billing_discount_Pharmacy">
<span<?php echo $billing_discount_view->Pharmacy->viewAttributes() ?>><?php echo $billing_discount_view->Pharmacy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($billing_discount_view->Investication->Visible) { // Investication ?>
	<tr id="r_Investication">
		<td class="<?php echo $billing_discount_view->TableLeftColumnClass ?>"><span id="elh_billing_discount_Investication"><?php echo $billing_discount_view->Investication->caption() ?></span></td>
		<td data-name="Investication" <?php echo $billing_discount_view->Investication->cellAttributes() ?>>
<span id="el_billing_discount_Investication">
<span<?php echo $billing_discount_view->Investication->viewAttributes() ?>><?php echo $billing_discount_view->Investication->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$billing_discount_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$billing_discount_view->isExport()) { ?>
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
$billing_discount_view->terminate();
?>
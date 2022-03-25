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
$pharmacy_master_generic_view = new pharmacy_master_generic_view();

// Run the page
$pharmacy_master_generic_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_master_generic_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pharmacy_master_generic_view->isExport()) { ?>
<script>
var fpharmacy_master_genericview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpharmacy_master_genericview = currentForm = new ew.Form("fpharmacy_master_genericview", "view");
	loadjs.done("fpharmacy_master_genericview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pharmacy_master_generic_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pharmacy_master_generic_view->ExportOptions->render("body") ?>
<?php $pharmacy_master_generic_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pharmacy_master_generic_view->showPageHeader(); ?>
<?php
$pharmacy_master_generic_view->showMessage();
?>
<form name="fpharmacy_master_genericview" id="fpharmacy_master_genericview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_generic">
<input type="hidden" name="modal" value="<?php echo (int)$pharmacy_master_generic_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pharmacy_master_generic_view->GENNAME->Visible) { // GENNAME ?>
	<tr id="r_GENNAME">
		<td class="<?php echo $pharmacy_master_generic_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_generic_GENNAME"><?php echo $pharmacy_master_generic_view->GENNAME->caption() ?></span></td>
		<td data-name="GENNAME" <?php echo $pharmacy_master_generic_view->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_master_generic_GENNAME">
<span<?php echo $pharmacy_master_generic_view->GENNAME->viewAttributes() ?>><?php echo $pharmacy_master_generic_view->GENNAME->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_master_generic_view->CODE->Visible) { // CODE ?>
	<tr id="r_CODE">
		<td class="<?php echo $pharmacy_master_generic_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_generic_CODE"><?php echo $pharmacy_master_generic_view->CODE->caption() ?></span></td>
		<td data-name="CODE" <?php echo $pharmacy_master_generic_view->CODE->cellAttributes() ?>>
<span id="el_pharmacy_master_generic_CODE">
<span<?php echo $pharmacy_master_generic_view->CODE->viewAttributes() ?>><?php echo $pharmacy_master_generic_view->CODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_master_generic_view->GRPCODE->Visible) { // GRPCODE ?>
	<tr id="r_GRPCODE">
		<td class="<?php echo $pharmacy_master_generic_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_generic_GRPCODE"><?php echo $pharmacy_master_generic_view->GRPCODE->caption() ?></span></td>
		<td data-name="GRPCODE" <?php echo $pharmacy_master_generic_view->GRPCODE->cellAttributes() ?>>
<span id="el_pharmacy_master_generic_GRPCODE">
<span<?php echo $pharmacy_master_generic_view->GRPCODE->viewAttributes() ?>><?php echo $pharmacy_master_generic_view->GRPCODE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pharmacy_master_generic_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pharmacy_master_generic_view->TableLeftColumnClass ?>"><span id="elh_pharmacy_master_generic_id"><?php echo $pharmacy_master_generic_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pharmacy_master_generic_view->id->cellAttributes() ?>>
<span id="el_pharmacy_master_generic_id">
<span<?php echo $pharmacy_master_generic_view->id->viewAttributes() ?>><?php echo $pharmacy_master_generic_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pharmacy_master_generic_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pharmacy_master_generic_view->isExport()) { ?>
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
$pharmacy_master_generic_view->terminate();
?>
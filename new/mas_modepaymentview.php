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
$mas_modepayment_view = new mas_modepayment_view();

// Run the page
$mas_modepayment_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_modepayment_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mas_modepayment_view->isExport()) { ?>
<script>
var fmas_modepaymentview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmas_modepaymentview = currentForm = new ew.Form("fmas_modepaymentview", "view");
	loadjs.done("fmas_modepaymentview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$mas_modepayment_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_modepayment_view->ExportOptions->render("body") ?>
<?php $mas_modepayment_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_modepayment_view->showPageHeader(); ?>
<?php
$mas_modepayment_view->showMessage();
?>
<form name="fmas_modepaymentview" id="fmas_modepaymentview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_modepayment">
<input type="hidden" name="modal" value="<?php echo (int)$mas_modepayment_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_modepayment_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_modepayment_view->TableLeftColumnClass ?>"><span id="elh_mas_modepayment_id"><?php echo $mas_modepayment_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $mas_modepayment_view->id->cellAttributes() ?>>
<span id="el_mas_modepayment_id">
<span<?php echo $mas_modepayment_view->id->viewAttributes() ?>><?php echo $mas_modepayment_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_modepayment_view->Mode->Visible) { // Mode ?>
	<tr id="r_Mode">
		<td class="<?php echo $mas_modepayment_view->TableLeftColumnClass ?>"><span id="elh_mas_modepayment_Mode"><?php echo $mas_modepayment_view->Mode->caption() ?></span></td>
		<td data-name="Mode" <?php echo $mas_modepayment_view->Mode->cellAttributes() ?>>
<span id="el_mas_modepayment_Mode">
<span<?php echo $mas_modepayment_view->Mode->viewAttributes() ?>><?php echo $mas_modepayment_view->Mode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_modepayment_view->BankingDatails->Visible) { // BankingDatails ?>
	<tr id="r_BankingDatails">
		<td class="<?php echo $mas_modepayment_view->TableLeftColumnClass ?>"><span id="elh_mas_modepayment_BankingDatails"><?php echo $mas_modepayment_view->BankingDatails->caption() ?></span></td>
		<td data-name="BankingDatails" <?php echo $mas_modepayment_view->BankingDatails->cellAttributes() ?>>
<span id="el_mas_modepayment_BankingDatails">
<span<?php echo $mas_modepayment_view->BankingDatails->viewAttributes() ?>><?php echo $mas_modepayment_view->BankingDatails->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_modepayment_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_modepayment_view->isExport()) { ?>
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
$mas_modepayment_view->terminate();
?>
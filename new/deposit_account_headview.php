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
$deposit_account_head_view = new deposit_account_head_view();

// Run the page
$deposit_account_head_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$deposit_account_head_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$deposit_account_head_view->isExport()) { ?>
<script>
var fdeposit_account_headview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fdeposit_account_headview = currentForm = new ew.Form("fdeposit_account_headview", "view");
	loadjs.done("fdeposit_account_headview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$deposit_account_head_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $deposit_account_head_view->ExportOptions->render("body") ?>
<?php $deposit_account_head_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $deposit_account_head_view->showPageHeader(); ?>
<?php
$deposit_account_head_view->showMessage();
?>
<form name="fdeposit_account_headview" id="fdeposit_account_headview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="deposit_account_head">
<input type="hidden" name="modal" value="<?php echo (int)$deposit_account_head_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($deposit_account_head_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $deposit_account_head_view->TableLeftColumnClass ?>"><span id="elh_deposit_account_head_id"><?php echo $deposit_account_head_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $deposit_account_head_view->id->cellAttributes() ?>>
<span id="el_deposit_account_head_id">
<span<?php echo $deposit_account_head_view->id->viewAttributes() ?>><?php echo $deposit_account_head_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($deposit_account_head_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $deposit_account_head_view->TableLeftColumnClass ?>"><span id="elh_deposit_account_head_Name"><?php echo $deposit_account_head_view->Name->caption() ?></span></td>
		<td data-name="Name" <?php echo $deposit_account_head_view->Name->cellAttributes() ?>>
<span id="el_deposit_account_head_Name">
<span<?php echo $deposit_account_head_view->Name->viewAttributes() ?>><?php echo $deposit_account_head_view->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$deposit_account_head_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$deposit_account_head_view->isExport()) { ?>
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
$deposit_account_head_view->terminate();
?>
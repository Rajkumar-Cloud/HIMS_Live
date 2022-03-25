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
$ivf_history_master_view = new ivf_history_master_view();

// Run the page
$ivf_history_master_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_history_master_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_history_master_view->isExport()) { ?>
<script>
var fivf_history_masterview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_history_masterview = currentForm = new ew.Form("fivf_history_masterview", "view");
	loadjs.done("fivf_history_masterview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_history_master_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_history_master_view->ExportOptions->render("body") ?>
<?php $ivf_history_master_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_history_master_view->showPageHeader(); ?>
<?php
$ivf_history_master_view->showMessage();
?>
<form name="fivf_history_masterview" id="fivf_history_masterview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_history_master">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_history_master_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_history_master_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_history_master_view->TableLeftColumnClass ?>"><span id="elh_ivf_history_master_id"><?php echo $ivf_history_master_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $ivf_history_master_view->id->cellAttributes() ?>>
<span id="el_ivf_history_master_id">
<span<?php echo $ivf_history_master_view->id->viewAttributes() ?>><?php echo $ivf_history_master_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_history_master_view->History->Visible) { // History ?>
	<tr id="r_History">
		<td class="<?php echo $ivf_history_master_view->TableLeftColumnClass ?>"><span id="elh_ivf_history_master_History"><?php echo $ivf_history_master_view->History->caption() ?></span></td>
		<td data-name="History" <?php echo $ivf_history_master_view->History->cellAttributes() ?>>
<span id="el_ivf_history_master_History">
<span<?php echo $ivf_history_master_view->History->viewAttributes() ?>><?php echo $ivf_history_master_view->History->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_history_master_view->HistoryType->Visible) { // HistoryType ?>
	<tr id="r_HistoryType">
		<td class="<?php echo $ivf_history_master_view->TableLeftColumnClass ?>"><span id="elh_ivf_history_master_HistoryType"><?php echo $ivf_history_master_view->HistoryType->caption() ?></span></td>
		<td data-name="HistoryType" <?php echo $ivf_history_master_view->HistoryType->cellAttributes() ?>>
<span id="el_ivf_history_master_HistoryType">
<span<?php echo $ivf_history_master_view->HistoryType->viewAttributes() ?>><?php echo $ivf_history_master_view->HistoryType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_history_master_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_history_master_view->isExport()) { ?>
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
$ivf_history_master_view->terminate();
?>
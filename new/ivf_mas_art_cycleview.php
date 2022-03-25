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
$ivf_mas_art_cycle_view = new ivf_mas_art_cycle_view();

// Run the page
$ivf_mas_art_cycle_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_mas_art_cycle_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_mas_art_cycle_view->isExport()) { ?>
<script>
var fivf_mas_art_cycleview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_mas_art_cycleview = currentForm = new ew.Form("fivf_mas_art_cycleview", "view");
	loadjs.done("fivf_mas_art_cycleview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_mas_art_cycle_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_mas_art_cycle_view->ExportOptions->render("body") ?>
<?php $ivf_mas_art_cycle_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_mas_art_cycle_view->showPageHeader(); ?>
<?php
$ivf_mas_art_cycle_view->showMessage();
?>
<form name="fivf_mas_art_cycleview" id="fivf_mas_art_cycleview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_mas_art_cycle">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_mas_art_cycle_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_mas_art_cycle_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_mas_art_cycle_view->TableLeftColumnClass ?>"><span id="elh_ivf_mas_art_cycle_id"><?php echo $ivf_mas_art_cycle_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $ivf_mas_art_cycle_view->id->cellAttributes() ?>>
<span id="el_ivf_mas_art_cycle_id">
<span<?php echo $ivf_mas_art_cycle_view->id->viewAttributes() ?>><?php echo $ivf_mas_art_cycle_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_mas_art_cycle_view->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<tr id="r_ARTCYCLE">
		<td class="<?php echo $ivf_mas_art_cycle_view->TableLeftColumnClass ?>"><span id="elh_ivf_mas_art_cycle_ARTCYCLE"><?php echo $ivf_mas_art_cycle_view->ARTCYCLE->caption() ?></span></td>
		<td data-name="ARTCYCLE" <?php echo $ivf_mas_art_cycle_view->ARTCYCLE->cellAttributes() ?>>
<span id="el_ivf_mas_art_cycle_ARTCYCLE">
<span<?php echo $ivf_mas_art_cycle_view->ARTCYCLE->viewAttributes() ?>><?php echo $ivf_mas_art_cycle_view->ARTCYCLE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_mas_art_cycle_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_mas_art_cycle_view->isExport()) { ?>
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
$ivf_mas_art_cycle_view->terminate();
?>
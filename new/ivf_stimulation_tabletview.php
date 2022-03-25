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
$ivf_stimulation_tablet_view = new ivf_stimulation_tablet_view();

// Run the page
$ivf_stimulation_tablet_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_stimulation_tablet_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$ivf_stimulation_tablet_view->isExport()) { ?>
<script>
var fivf_stimulation_tabletview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fivf_stimulation_tabletview = currentForm = new ew.Form("fivf_stimulation_tabletview", "view");
	loadjs.done("fivf_stimulation_tabletview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$ivf_stimulation_tablet_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $ivf_stimulation_tablet_view->ExportOptions->render("body") ?>
<?php $ivf_stimulation_tablet_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $ivf_stimulation_tablet_view->showPageHeader(); ?>
<?php
$ivf_stimulation_tablet_view->showMessage();
?>
<form name="fivf_stimulation_tabletview" id="fivf_stimulation_tabletview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="ivf_stimulation_tablet">
<input type="hidden" name="modal" value="<?php echo (int)$ivf_stimulation_tablet_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($ivf_stimulation_tablet_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $ivf_stimulation_tablet_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_tablet_id"><?php echo $ivf_stimulation_tablet_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $ivf_stimulation_tablet_view->id->cellAttributes() ?>>
<span id="el_ivf_stimulation_tablet_id">
<span<?php echo $ivf_stimulation_tablet_view->id->viewAttributes() ?>><?php echo $ivf_stimulation_tablet_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($ivf_stimulation_tablet_view->Name->Visible) { // Name ?>
	<tr id="r_Name">
		<td class="<?php echo $ivf_stimulation_tablet_view->TableLeftColumnClass ?>"><span id="elh_ivf_stimulation_tablet_Name"><?php echo $ivf_stimulation_tablet_view->Name->caption() ?></span></td>
		<td data-name="Name" <?php echo $ivf_stimulation_tablet_view->Name->cellAttributes() ?>>
<span id="el_ivf_stimulation_tablet_Name">
<span<?php echo $ivf_stimulation_tablet_view->Name->viewAttributes() ?>><?php echo $ivf_stimulation_tablet_view->Name->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$ivf_stimulation_tablet_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$ivf_stimulation_tablet_view->isExport()) { ?>
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
$ivf_stimulation_tablet_view->terminate();
?>
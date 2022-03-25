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
$mas_where_didyou_hear_view = new mas_where_didyou_hear_view();

// Run the page
$mas_where_didyou_hear_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_where_didyou_hear_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mas_where_didyou_hear_view->isExport()) { ?>
<script>
var fmas_where_didyou_hearview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmas_where_didyou_hearview = currentForm = new ew.Form("fmas_where_didyou_hearview", "view");
	loadjs.done("fmas_where_didyou_hearview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$mas_where_didyou_hear_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_where_didyou_hear_view->ExportOptions->render("body") ?>
<?php $mas_where_didyou_hear_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_where_didyou_hear_view->showPageHeader(); ?>
<?php
$mas_where_didyou_hear_view->showMessage();
?>
<form name="fmas_where_didyou_hearview" id="fmas_where_didyou_hearview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_where_didyou_hear">
<input type="hidden" name="modal" value="<?php echo (int)$mas_where_didyou_hear_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_where_didyou_hear_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_where_didyou_hear_view->TableLeftColumnClass ?>"><span id="elh_mas_where_didyou_hear_id"><?php echo $mas_where_didyou_hear_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $mas_where_didyou_hear_view->id->cellAttributes() ?>>
<span id="el_mas_where_didyou_hear_id">
<span<?php echo $mas_where_didyou_hear_view->id->viewAttributes() ?>><?php echo $mas_where_didyou_hear_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_where_didyou_hear_view->Job->Visible) { // Job ?>
	<tr id="r_Job">
		<td class="<?php echo $mas_where_didyou_hear_view->TableLeftColumnClass ?>"><span id="elh_mas_where_didyou_hear_Job"><?php echo $mas_where_didyou_hear_view->Job->caption() ?></span></td>
		<td data-name="Job" <?php echo $mas_where_didyou_hear_view->Job->cellAttributes() ?>>
<span id="el_mas_where_didyou_hear_Job">
<span<?php echo $mas_where_didyou_hear_view->Job->viewAttributes() ?>><?php echo $mas_where_didyou_hear_view->Job->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_where_didyou_hear_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_where_didyou_hear_view->isExport()) { ?>
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
$mas_where_didyou_hear_view->terminate();
?>
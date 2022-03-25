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
$mas_job_view = new mas_job_view();

// Run the page
$mas_job_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_job_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mas_job_view->isExport()) { ?>
<script>
var fmas_jobview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmas_jobview = currentForm = new ew.Form("fmas_jobview", "view");
	loadjs.done("fmas_jobview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$mas_job_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_job_view->ExportOptions->render("body") ?>
<?php $mas_job_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_job_view->showPageHeader(); ?>
<?php
$mas_job_view->showMessage();
?>
<form name="fmas_jobview" id="fmas_jobview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_job">
<input type="hidden" name="modal" value="<?php echo (int)$mas_job_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_job_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_job_view->TableLeftColumnClass ?>"><span id="elh_mas_job_id"><?php echo $mas_job_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $mas_job_view->id->cellAttributes() ?>>
<span id="el_mas_job_id">
<span<?php echo $mas_job_view->id->viewAttributes() ?>><?php echo $mas_job_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_job_view->Job->Visible) { // Job ?>
	<tr id="r_Job">
		<td class="<?php echo $mas_job_view->TableLeftColumnClass ?>"><span id="elh_mas_job_Job"><?php echo $mas_job_view->Job->caption() ?></span></td>
		<td data-name="Job" <?php echo $mas_job_view->Job->cellAttributes() ?>>
<span id="el_mas_job_Job">
<span<?php echo $mas_job_view->Job->viewAttributes() ?>><?php echo $mas_job_view->Job->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_job_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_job_view->isExport()) { ?>
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
$mas_job_view->terminate();
?>
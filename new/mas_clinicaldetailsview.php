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
$mas_clinicaldetails_view = new mas_clinicaldetails_view();

// Run the page
$mas_clinicaldetails_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_clinicaldetails_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mas_clinicaldetails_view->isExport()) { ?>
<script>
var fmas_clinicaldetailsview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmas_clinicaldetailsview = currentForm = new ew.Form("fmas_clinicaldetailsview", "view");
	loadjs.done("fmas_clinicaldetailsview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$mas_clinicaldetails_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_clinicaldetails_view->ExportOptions->render("body") ?>
<?php $mas_clinicaldetails_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_clinicaldetails_view->showPageHeader(); ?>
<?php
$mas_clinicaldetails_view->showMessage();
?>
<form name="fmas_clinicaldetailsview" id="fmas_clinicaldetailsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_clinicaldetails">
<input type="hidden" name="modal" value="<?php echo (int)$mas_clinicaldetails_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_clinicaldetails_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_clinicaldetails_view->TableLeftColumnClass ?>"><span id="elh_mas_clinicaldetails_id"><?php echo $mas_clinicaldetails_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $mas_clinicaldetails_view->id->cellAttributes() ?>>
<span id="el_mas_clinicaldetails_id">
<span<?php echo $mas_clinicaldetails_view->id->viewAttributes() ?>><?php echo $mas_clinicaldetails_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_clinicaldetails_view->ClinicalDetails->Visible) { // ClinicalDetails ?>
	<tr id="r_ClinicalDetails">
		<td class="<?php echo $mas_clinicaldetails_view->TableLeftColumnClass ?>"><span id="elh_mas_clinicaldetails_ClinicalDetails"><?php echo $mas_clinicaldetails_view->ClinicalDetails->caption() ?></span></td>
		<td data-name="ClinicalDetails" <?php echo $mas_clinicaldetails_view->ClinicalDetails->cellAttributes() ?>>
<span id="el_mas_clinicaldetails_ClinicalDetails">
<span<?php echo $mas_clinicaldetails_view->ClinicalDetails->viewAttributes() ?>><?php echo $mas_clinicaldetails_view->ClinicalDetails->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_clinicaldetails_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_clinicaldetails_view->isExport()) { ?>
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
$mas_clinicaldetails_view->terminate();
?>
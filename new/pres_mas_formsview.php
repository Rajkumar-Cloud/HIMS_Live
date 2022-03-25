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
$pres_mas_forms_view = new pres_mas_forms_view();

// Run the page
$pres_mas_forms_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_mas_forms_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_mas_forms_view->isExport()) { ?>
<script>
var fpres_mas_formsview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpres_mas_formsview = currentForm = new ew.Form("fpres_mas_formsview", "view");
	loadjs.done("fpres_mas_formsview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pres_mas_forms_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_mas_forms_view->ExportOptions->render("body") ?>
<?php $pres_mas_forms_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_mas_forms_view->showPageHeader(); ?>
<?php
$pres_mas_forms_view->showMessage();
?>
<form name="fpres_mas_formsview" id="fpres_mas_formsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_mas_forms">
<input type="hidden" name="modal" value="<?php echo (int)$pres_mas_forms_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_mas_forms_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_mas_forms_view->TableLeftColumnClass ?>"><span id="elh_pres_mas_forms_id"><?php echo $pres_mas_forms_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pres_mas_forms_view->id->cellAttributes() ?>>
<span id="el_pres_mas_forms_id">
<span<?php echo $pres_mas_forms_view->id->viewAttributes() ?>><?php echo $pres_mas_forms_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_mas_forms_view->Forms->Visible) { // Forms ?>
	<tr id="r_Forms">
		<td class="<?php echo $pres_mas_forms_view->TableLeftColumnClass ?>"><span id="elh_pres_mas_forms_Forms"><?php echo $pres_mas_forms_view->Forms->caption() ?></span></td>
		<td data-name="Forms" <?php echo $pres_mas_forms_view->Forms->cellAttributes() ?>>
<span id="el_pres_mas_forms_Forms">
<span<?php echo $pres_mas_forms_view->Forms->viewAttributes() ?>><?php echo $pres_mas_forms_view->Forms->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_mas_forms_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_mas_forms_view->isExport()) { ?>
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
$pres_mas_forms_view->terminate();
?>
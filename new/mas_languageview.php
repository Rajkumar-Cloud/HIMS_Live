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
$mas_language_view = new mas_language_view();

// Run the page
$mas_language_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_language_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$mas_language_view->isExport()) { ?>
<script>
var fmas_languageview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fmas_languageview = currentForm = new ew.Form("fmas_languageview", "view");
	loadjs.done("fmas_languageview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$mas_language_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $mas_language_view->ExportOptions->render("body") ?>
<?php $mas_language_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $mas_language_view->showPageHeader(); ?>
<?php
$mas_language_view->showMessage();
?>
<form name="fmas_languageview" id="fmas_languageview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_language">
<input type="hidden" name="modal" value="<?php echo (int)$mas_language_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($mas_language_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $mas_language_view->TableLeftColumnClass ?>"><span id="elh_mas_language_id"><?php echo $mas_language_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $mas_language_view->id->cellAttributes() ?>>
<span id="el_mas_language_id">
<span<?php echo $mas_language_view->id->viewAttributes() ?>><?php echo $mas_language_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($mas_language_view->_Language->Visible) { // Language ?>
	<tr id="r__Language">
		<td class="<?php echo $mas_language_view->TableLeftColumnClass ?>"><span id="elh_mas_language__Language"><?php echo $mas_language_view->_Language->caption() ?></span></td>
		<td data-name="_Language" <?php echo $mas_language_view->_Language->cellAttributes() ?>>
<span id="el_mas_language__Language">
<span<?php echo $mas_language_view->_Language->viewAttributes() ?>><?php echo $mas_language_view->_Language->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$mas_language_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$mas_language_view->isExport()) { ?>
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
$mas_language_view->terminate();
?>
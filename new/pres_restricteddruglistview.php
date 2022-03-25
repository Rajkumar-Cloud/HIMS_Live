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
$pres_restricteddruglist_view = new pres_restricteddruglist_view();

// Run the page
$pres_restricteddruglist_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_restricteddruglist_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_restricteddruglist_view->isExport()) { ?>
<script>
var fpres_restricteddruglistview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpres_restricteddruglistview = currentForm = new ew.Form("fpres_restricteddruglistview", "view");
	loadjs.done("fpres_restricteddruglistview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pres_restricteddruglist_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_restricteddruglist_view->ExportOptions->render("body") ?>
<?php $pres_restricteddruglist_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_restricteddruglist_view->showPageHeader(); ?>
<?php
$pres_restricteddruglist_view->showMessage();
?>
<form name="fpres_restricteddruglistview" id="fpres_restricteddruglistview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_restricteddruglist">
<input type="hidden" name="modal" value="<?php echo (int)$pres_restricteddruglist_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_restricteddruglist_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_restricteddruglist_view->TableLeftColumnClass ?>"><span id="elh_pres_restricteddruglist_id"><?php echo $pres_restricteddruglist_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pres_restricteddruglist_view->id->cellAttributes() ?>>
<span id="el_pres_restricteddruglist_id">
<span<?php echo $pres_restricteddruglist_view->id->viewAttributes() ?>><?php echo $pres_restricteddruglist_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_restricteddruglist_view->Genericname->Visible) { // Genericname ?>
	<tr id="r_Genericname">
		<td class="<?php echo $pres_restricteddruglist_view->TableLeftColumnClass ?>"><span id="elh_pres_restricteddruglist_Genericname"><?php echo $pres_restricteddruglist_view->Genericname->caption() ?></span></td>
		<td data-name="Genericname" <?php echo $pres_restricteddruglist_view->Genericname->cellAttributes() ?>>
<span id="el_pres_restricteddruglist_Genericname">
<span<?php echo $pres_restricteddruglist_view->Genericname->viewAttributes() ?>><?php echo $pres_restricteddruglist_view->Genericname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_restricteddruglist_view->RestrictedWarning->Visible) { // RestrictedWarning ?>
	<tr id="r_RestrictedWarning">
		<td class="<?php echo $pres_restricteddruglist_view->TableLeftColumnClass ?>"><span id="elh_pres_restricteddruglist_RestrictedWarning"><?php echo $pres_restricteddruglist_view->RestrictedWarning->caption() ?></span></td>
		<td data-name="RestrictedWarning" <?php echo $pres_restricteddruglist_view->RestrictedWarning->cellAttributes() ?>>
<span id="el_pres_restricteddruglist_RestrictedWarning">
<span<?php echo $pres_restricteddruglist_view->RestrictedWarning->viewAttributes() ?>><?php echo $pres_restricteddruglist_view->RestrictedWarning->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_restricteddruglist_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_restricteddruglist_view->isExport()) { ?>
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
$pres_restricteddruglist_view->terminate();
?>
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
$pres_categoryallergy_view = new pres_categoryallergy_view();

// Run the page
$pres_categoryallergy_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_categoryallergy_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_categoryallergy_view->isExport()) { ?>
<script>
var fpres_categoryallergyview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpres_categoryallergyview = currentForm = new ew.Form("fpres_categoryallergyview", "view");
	loadjs.done("fpres_categoryallergyview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pres_categoryallergy_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_categoryallergy_view->ExportOptions->render("body") ?>
<?php $pres_categoryallergy_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_categoryallergy_view->showPageHeader(); ?>
<?php
$pres_categoryallergy_view->showMessage();
?>
<form name="fpres_categoryallergyview" id="fpres_categoryallergyview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_categoryallergy">
<input type="hidden" name="modal" value="<?php echo (int)$pres_categoryallergy_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_categoryallergy_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_categoryallergy_view->TableLeftColumnClass ?>"><span id="elh_pres_categoryallergy_id"><?php echo $pres_categoryallergy_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pres_categoryallergy_view->id->cellAttributes() ?>>
<span id="el_pres_categoryallergy_id">
<span<?php echo $pres_categoryallergy_view->id->viewAttributes() ?>><?php echo $pres_categoryallergy_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_categoryallergy_view->Genericname->Visible) { // Genericname ?>
	<tr id="r_Genericname">
		<td class="<?php echo $pres_categoryallergy_view->TableLeftColumnClass ?>"><span id="elh_pres_categoryallergy_Genericname"><?php echo $pres_categoryallergy_view->Genericname->caption() ?></span></td>
		<td data-name="Genericname" <?php echo $pres_categoryallergy_view->Genericname->cellAttributes() ?>>
<span id="el_pres_categoryallergy_Genericname">
<span<?php echo $pres_categoryallergy_view->Genericname->viewAttributes() ?>><?php echo $pres_categoryallergy_view->Genericname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_categoryallergy_view->CategoryDrug->Visible) { // CategoryDrug ?>
	<tr id="r_CategoryDrug">
		<td class="<?php echo $pres_categoryallergy_view->TableLeftColumnClass ?>"><span id="elh_pres_categoryallergy_CategoryDrug"><?php echo $pres_categoryallergy_view->CategoryDrug->caption() ?></span></td>
		<td data-name="CategoryDrug" <?php echo $pres_categoryallergy_view->CategoryDrug->cellAttributes() ?>>
<span id="el_pres_categoryallergy_CategoryDrug">
<span<?php echo $pres_categoryallergy_view->CategoryDrug->viewAttributes() ?>><?php echo $pres_categoryallergy_view->CategoryDrug->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_categoryallergy_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_categoryallergy_view->isExport()) { ?>
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
$pres_categoryallergy_view->terminate();
?>
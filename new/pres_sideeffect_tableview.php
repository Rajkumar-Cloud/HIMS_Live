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
$pres_sideeffect_table_view = new pres_sideeffect_table_view();

// Run the page
$pres_sideeffect_table_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_sideeffect_table_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_sideeffect_table_view->isExport()) { ?>
<script>
var fpres_sideeffect_tableview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpres_sideeffect_tableview = currentForm = new ew.Form("fpres_sideeffect_tableview", "view");
	loadjs.done("fpres_sideeffect_tableview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pres_sideeffect_table_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_sideeffect_table_view->ExportOptions->render("body") ?>
<?php $pres_sideeffect_table_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_sideeffect_table_view->showPageHeader(); ?>
<?php
$pres_sideeffect_table_view->showMessage();
?>
<form name="fpres_sideeffect_tableview" id="fpres_sideeffect_tableview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_sideeffect_table">
<input type="hidden" name="modal" value="<?php echo (int)$pres_sideeffect_table_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_sideeffect_table_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_sideeffect_table_view->TableLeftColumnClass ?>"><span id="elh_pres_sideeffect_table_id"><?php echo $pres_sideeffect_table_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pres_sideeffect_table_view->id->cellAttributes() ?>>
<span id="el_pres_sideeffect_table_id">
<span<?php echo $pres_sideeffect_table_view->id->viewAttributes() ?>><?php echo $pres_sideeffect_table_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_sideeffect_table_view->Genericname->Visible) { // Genericname ?>
	<tr id="r_Genericname">
		<td class="<?php echo $pres_sideeffect_table_view->TableLeftColumnClass ?>"><span id="elh_pres_sideeffect_table_Genericname"><?php echo $pres_sideeffect_table_view->Genericname->caption() ?></span></td>
		<td data-name="Genericname" <?php echo $pres_sideeffect_table_view->Genericname->cellAttributes() ?>>
<span id="el_pres_sideeffect_table_Genericname">
<span<?php echo $pres_sideeffect_table_view->Genericname->viewAttributes() ?>><?php echo $pres_sideeffect_table_view->Genericname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_sideeffect_table_view->SideEffects->Visible) { // SideEffects ?>
	<tr id="r_SideEffects">
		<td class="<?php echo $pres_sideeffect_table_view->TableLeftColumnClass ?>"><span id="elh_pres_sideeffect_table_SideEffects"><?php echo $pres_sideeffect_table_view->SideEffects->caption() ?></span></td>
		<td data-name="SideEffects" <?php echo $pres_sideeffect_table_view->SideEffects->cellAttributes() ?>>
<span id="el_pres_sideeffect_table_SideEffects">
<span<?php echo $pres_sideeffect_table_view->SideEffects->viewAttributes() ?>><?php echo $pres_sideeffect_table_view->SideEffects->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_sideeffect_table_view->Contraindications->Visible) { // Contraindications ?>
	<tr id="r_Contraindications">
		<td class="<?php echo $pres_sideeffect_table_view->TableLeftColumnClass ?>"><span id="elh_pres_sideeffect_table_Contraindications"><?php echo $pres_sideeffect_table_view->Contraindications->caption() ?></span></td>
		<td data-name="Contraindications" <?php echo $pres_sideeffect_table_view->Contraindications->cellAttributes() ?>>
<span id="el_pres_sideeffect_table_Contraindications">
<span<?php echo $pres_sideeffect_table_view->Contraindications->viewAttributes() ?>><?php echo $pres_sideeffect_table_view->Contraindications->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_sideeffect_table_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_sideeffect_table_view->isExport()) { ?>
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
$pres_sideeffect_table_view->terminate();
?>
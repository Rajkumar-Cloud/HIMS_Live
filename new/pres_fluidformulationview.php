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
$pres_fluidformulation_view = new pres_fluidformulation_view();

// Run the page
$pres_fluidformulation_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_fluidformulation_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_fluidformulation_view->isExport()) { ?>
<script>
var fpres_fluidformulationview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpres_fluidformulationview = currentForm = new ew.Form("fpres_fluidformulationview", "view");
	loadjs.done("fpres_fluidformulationview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pres_fluidformulation_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_fluidformulation_view->ExportOptions->render("body") ?>
<?php $pres_fluidformulation_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_fluidformulation_view->showPageHeader(); ?>
<?php
$pres_fluidformulation_view->showMessage();
?>
<form name="fpres_fluidformulationview" id="fpres_fluidformulationview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_fluidformulation">
<input type="hidden" name="modal" value="<?php echo (int)$pres_fluidformulation_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_fluidformulation_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_id"><?php echo $pres_fluidformulation_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $pres_fluidformulation_view->id->cellAttributes() ?>>
<span id="el_pres_fluidformulation_id">
<span<?php echo $pres_fluidformulation_view->id->viewAttributes() ?>><?php echo $pres_fluidformulation_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_fluidformulation_view->Tradename->Visible) { // Tradename ?>
	<tr id="r_Tradename">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_Tradename"><?php echo $pres_fluidformulation_view->Tradename->caption() ?></span></td>
		<td data-name="Tradename" <?php echo $pres_fluidformulation_view->Tradename->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Tradename">
<span<?php echo $pres_fluidformulation_view->Tradename->viewAttributes() ?>><?php echo $pres_fluidformulation_view->Tradename->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_fluidformulation_view->Itemcode->Visible) { // Itemcode ?>
	<tr id="r_Itemcode">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_Itemcode"><?php echo $pres_fluidformulation_view->Itemcode->caption() ?></span></td>
		<td data-name="Itemcode" <?php echo $pres_fluidformulation_view->Itemcode->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Itemcode">
<span<?php echo $pres_fluidformulation_view->Itemcode->viewAttributes() ?>><?php echo $pres_fluidformulation_view->Itemcode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_fluidformulation_view->Genericname->Visible) { // Genericname ?>
	<tr id="r_Genericname">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_Genericname"><?php echo $pres_fluidformulation_view->Genericname->caption() ?></span></td>
		<td data-name="Genericname" <?php echo $pres_fluidformulation_view->Genericname->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Genericname">
<span<?php echo $pres_fluidformulation_view->Genericname->viewAttributes() ?>><?php echo $pres_fluidformulation_view->Genericname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_fluidformulation_view->Volume->Visible) { // Volume ?>
	<tr id="r_Volume">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_Volume"><?php echo $pres_fluidformulation_view->Volume->caption() ?></span></td>
		<td data-name="Volume" <?php echo $pres_fluidformulation_view->Volume->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Volume">
<span<?php echo $pres_fluidformulation_view->Volume->viewAttributes() ?>><?php echo $pres_fluidformulation_view->Volume->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_fluidformulation_view->VolumeUnit->Visible) { // VolumeUnit ?>
	<tr id="r_VolumeUnit">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_VolumeUnit"><?php echo $pres_fluidformulation_view->VolumeUnit->caption() ?></span></td>
		<td data-name="VolumeUnit" <?php echo $pres_fluidformulation_view->VolumeUnit->cellAttributes() ?>>
<span id="el_pres_fluidformulation_VolumeUnit">
<span<?php echo $pres_fluidformulation_view->VolumeUnit->viewAttributes() ?>><?php echo $pres_fluidformulation_view->VolumeUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_fluidformulation_view->Strength->Visible) { // Strength ?>
	<tr id="r_Strength">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_Strength"><?php echo $pres_fluidformulation_view->Strength->caption() ?></span></td>
		<td data-name="Strength" <?php echo $pres_fluidformulation_view->Strength->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Strength">
<span<?php echo $pres_fluidformulation_view->Strength->viewAttributes() ?>><?php echo $pres_fluidformulation_view->Strength->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_fluidformulation_view->StrengthUnit->Visible) { // StrengthUnit ?>
	<tr id="r_StrengthUnit">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_StrengthUnit"><?php echo $pres_fluidformulation_view->StrengthUnit->caption() ?></span></td>
		<td data-name="StrengthUnit" <?php echo $pres_fluidformulation_view->StrengthUnit->cellAttributes() ?>>
<span id="el_pres_fluidformulation_StrengthUnit">
<span<?php echo $pres_fluidformulation_view->StrengthUnit->viewAttributes() ?>><?php echo $pres_fluidformulation_view->StrengthUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_fluidformulation_view->_Route->Visible) { // Route ?>
	<tr id="r__Route">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation__Route"><?php echo $pres_fluidformulation_view->_Route->caption() ?></span></td>
		<td data-name="_Route" <?php echo $pres_fluidformulation_view->_Route->cellAttributes() ?>>
<span id="el_pres_fluidformulation__Route">
<span<?php echo $pres_fluidformulation_view->_Route->viewAttributes() ?>><?php echo $pres_fluidformulation_view->_Route->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_fluidformulation_view->Forms->Visible) { // Forms ?>
	<tr id="r_Forms">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_Forms"><?php echo $pres_fluidformulation_view->Forms->caption() ?></span></td>
		<td data-name="Forms" <?php echo $pres_fluidformulation_view->Forms->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Forms">
<span<?php echo $pres_fluidformulation_view->Forms->viewAttributes() ?>><?php echo $pres_fluidformulation_view->Forms->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_fluidformulation_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_fluidformulation_view->isExport()) { ?>
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
$pres_fluidformulation_view->terminate();
?>
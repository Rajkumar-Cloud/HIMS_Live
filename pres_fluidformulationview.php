<?php
namespace PHPMaker2019\HIMS;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
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
<?php include_once "header.php" ?>
<?php if (!$pres_fluidformulation->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpres_fluidformulationview = currentForm = new ew.Form("fpres_fluidformulationview", "view");

// Form_CustomValidate event
fpres_fluidformulationview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_fluidformulationview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pres_fluidformulation->isExport()) { ?>
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
<?php if ($pres_fluidformulation_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_fluidformulation_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_fluidformulation">
<input type="hidden" name="modal" value="<?php echo (int)$pres_fluidformulation_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_fluidformulation->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_id"><?php echo $pres_fluidformulation->id->caption() ?></span></td>
		<td data-name="id"<?php echo $pres_fluidformulation->id->cellAttributes() ?>>
<span id="el_pres_fluidformulation_id">
<span<?php echo $pres_fluidformulation->id->viewAttributes() ?>>
<?php echo $pres_fluidformulation->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_fluidformulation->Tradename->Visible) { // Tradename ?>
	<tr id="r_Tradename">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_Tradename"><?php echo $pres_fluidformulation->Tradename->caption() ?></span></td>
		<td data-name="Tradename"<?php echo $pres_fluidformulation->Tradename->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Tradename">
<span<?php echo $pres_fluidformulation->Tradename->viewAttributes() ?>>
<?php echo $pres_fluidformulation->Tradename->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_fluidformulation->Itemcode->Visible) { // Itemcode ?>
	<tr id="r_Itemcode">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_Itemcode"><?php echo $pres_fluidformulation->Itemcode->caption() ?></span></td>
		<td data-name="Itemcode"<?php echo $pres_fluidformulation->Itemcode->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Itemcode">
<span<?php echo $pres_fluidformulation->Itemcode->viewAttributes() ?>>
<?php echo $pres_fluidformulation->Itemcode->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_fluidformulation->Genericname->Visible) { // Genericname ?>
	<tr id="r_Genericname">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_Genericname"><?php echo $pres_fluidformulation->Genericname->caption() ?></span></td>
		<td data-name="Genericname"<?php echo $pres_fluidformulation->Genericname->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Genericname">
<span<?php echo $pres_fluidformulation->Genericname->viewAttributes() ?>>
<?php echo $pres_fluidformulation->Genericname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_fluidformulation->Volume->Visible) { // Volume ?>
	<tr id="r_Volume">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_Volume"><?php echo $pres_fluidformulation->Volume->caption() ?></span></td>
		<td data-name="Volume"<?php echo $pres_fluidformulation->Volume->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Volume">
<span<?php echo $pres_fluidformulation->Volume->viewAttributes() ?>>
<?php echo $pres_fluidformulation->Volume->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_fluidformulation->VolumeUnit->Visible) { // VolumeUnit ?>
	<tr id="r_VolumeUnit">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_VolumeUnit"><?php echo $pres_fluidformulation->VolumeUnit->caption() ?></span></td>
		<td data-name="VolumeUnit"<?php echo $pres_fluidformulation->VolumeUnit->cellAttributes() ?>>
<span id="el_pres_fluidformulation_VolumeUnit">
<span<?php echo $pres_fluidformulation->VolumeUnit->viewAttributes() ?>>
<?php echo $pres_fluidformulation->VolumeUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_fluidformulation->Strength->Visible) { // Strength ?>
	<tr id="r_Strength">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_Strength"><?php echo $pres_fluidformulation->Strength->caption() ?></span></td>
		<td data-name="Strength"<?php echo $pres_fluidformulation->Strength->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Strength">
<span<?php echo $pres_fluidformulation->Strength->viewAttributes() ?>>
<?php echo $pres_fluidformulation->Strength->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_fluidformulation->StrengthUnit->Visible) { // StrengthUnit ?>
	<tr id="r_StrengthUnit">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_StrengthUnit"><?php echo $pres_fluidformulation->StrengthUnit->caption() ?></span></td>
		<td data-name="StrengthUnit"<?php echo $pres_fluidformulation->StrengthUnit->cellAttributes() ?>>
<span id="el_pres_fluidformulation_StrengthUnit">
<span<?php echo $pres_fluidformulation->StrengthUnit->viewAttributes() ?>>
<?php echo $pres_fluidformulation->StrengthUnit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_fluidformulation->_Route->Visible) { // Route ?>
	<tr id="r__Route">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation__Route"><?php echo $pres_fluidformulation->_Route->caption() ?></span></td>
		<td data-name="_Route"<?php echo $pres_fluidformulation->_Route->cellAttributes() ?>>
<span id="el_pres_fluidformulation__Route">
<span<?php echo $pres_fluidformulation->_Route->viewAttributes() ?>>
<?php echo $pres_fluidformulation->_Route->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_fluidformulation->Forms->Visible) { // Forms ?>
	<tr id="r_Forms">
		<td class="<?php echo $pres_fluidformulation_view->TableLeftColumnClass ?>"><span id="elh_pres_fluidformulation_Forms"><?php echo $pres_fluidformulation->Forms->caption() ?></span></td>
		<td data-name="Forms"<?php echo $pres_fluidformulation->Forms->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Forms">
<span<?php echo $pres_fluidformulation->Forms->viewAttributes() ?>>
<?php echo $pres_fluidformulation->Forms->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_fluidformulation_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_fluidformulation->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_fluidformulation_view->terminate();
?>
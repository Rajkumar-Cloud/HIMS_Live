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
$pres_indicationstable_view = new pres_indicationstable_view();

// Run the page
$pres_indicationstable_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_indicationstable_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$pres_indicationstable_view->isExport()) { ?>
<script>
var fpres_indicationstableview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	fpres_indicationstableview = currentForm = new ew.Form("fpres_indicationstableview", "view");
	loadjs.done("fpres_indicationstableview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$pres_indicationstable_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $pres_indicationstable_view->ExportOptions->render("body") ?>
<?php $pres_indicationstable_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $pres_indicationstable_view->showPageHeader(); ?>
<?php
$pres_indicationstable_view->showMessage();
?>
<form name="fpres_indicationstableview" id="fpres_indicationstableview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_indicationstable">
<input type="hidden" name="modal" value="<?php echo (int)$pres_indicationstable_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_indicationstable_view->Sno->Visible) { // Sno ?>
	<tr id="r_Sno">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Sno"><?php echo $pres_indicationstable_view->Sno->caption() ?></span></td>
		<td data-name="Sno" <?php echo $pres_indicationstable_view->Sno->cellAttributes() ?>>
<span id="el_pres_indicationstable_Sno">
<span<?php echo $pres_indicationstable_view->Sno->viewAttributes() ?>><?php echo $pres_indicationstable_view->Sno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable_view->Genericname->Visible) { // Genericname ?>
	<tr id="r_Genericname">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Genericname"><?php echo $pres_indicationstable_view->Genericname->caption() ?></span></td>
		<td data-name="Genericname" <?php echo $pres_indicationstable_view->Genericname->cellAttributes() ?>>
<span id="el_pres_indicationstable_Genericname">
<span<?php echo $pres_indicationstable_view->Genericname->viewAttributes() ?>><?php echo $pres_indicationstable_view->Genericname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable_view->Indications->Visible) { // Indications ?>
	<tr id="r_Indications">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Indications"><?php echo $pres_indicationstable_view->Indications->caption() ?></span></td>
		<td data-name="Indications" <?php echo $pres_indicationstable_view->Indications->cellAttributes() ?>>
<span id="el_pres_indicationstable_Indications">
<span<?php echo $pres_indicationstable_view->Indications->viewAttributes() ?>><?php echo $pres_indicationstable_view->Indications->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable_view->Category->Visible) { // Category ?>
	<tr id="r_Category">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Category"><?php echo $pres_indicationstable_view->Category->caption() ?></span></td>
		<td data-name="Category" <?php echo $pres_indicationstable_view->Category->cellAttributes() ?>>
<span id="el_pres_indicationstable_Category">
<span<?php echo $pres_indicationstable_view->Category->viewAttributes() ?>><?php echo $pres_indicationstable_view->Category->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable_view->Min_Age->Visible) { // Min_Age ?>
	<tr id="r_Min_Age">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Min_Age"><?php echo $pres_indicationstable_view->Min_Age->caption() ?></span></td>
		<td data-name="Min_Age" <?php echo $pres_indicationstable_view->Min_Age->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Age">
<span<?php echo $pres_indicationstable_view->Min_Age->viewAttributes() ?>><?php echo $pres_indicationstable_view->Min_Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable_view->Min_Days->Visible) { // Min_Days ?>
	<tr id="r_Min_Days">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Min_Days"><?php echo $pres_indicationstable_view->Min_Days->caption() ?></span></td>
		<td data-name="Min_Days" <?php echo $pres_indicationstable_view->Min_Days->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Days">
<span<?php echo $pres_indicationstable_view->Min_Days->viewAttributes() ?>><?php echo $pres_indicationstable_view->Min_Days->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable_view->Max_Age->Visible) { // Max_Age ?>
	<tr id="r_Max_Age">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Max_Age"><?php echo $pres_indicationstable_view->Max_Age->caption() ?></span></td>
		<td data-name="Max_Age" <?php echo $pres_indicationstable_view->Max_Age->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Age">
<span<?php echo $pres_indicationstable_view->Max_Age->viewAttributes() ?>><?php echo $pres_indicationstable_view->Max_Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable_view->Max_Days->Visible) { // Max_Days ?>
	<tr id="r_Max_Days">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Max_Days"><?php echo $pres_indicationstable_view->Max_Days->caption() ?></span></td>
		<td data-name="Max_Days" <?php echo $pres_indicationstable_view->Max_Days->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Days">
<span<?php echo $pres_indicationstable_view->Max_Days->viewAttributes() ?>><?php echo $pres_indicationstable_view->Max_Days->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable_view->_Route->Visible) { // Route ?>
	<tr id="r__Route">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable__Route"><?php echo $pres_indicationstable_view->_Route->caption() ?></span></td>
		<td data-name="_Route" <?php echo $pres_indicationstable_view->_Route->cellAttributes() ?>>
<span id="el_pres_indicationstable__Route">
<span<?php echo $pres_indicationstable_view->_Route->viewAttributes() ?>><?php echo $pres_indicationstable_view->_Route->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable_view->Form->Visible) { // Form ?>
	<tr id="r_Form">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Form"><?php echo $pres_indicationstable_view->Form->caption() ?></span></td>
		<td data-name="Form" <?php echo $pres_indicationstable_view->Form->cellAttributes() ?>>
<span id="el_pres_indicationstable_Form">
<span<?php echo $pres_indicationstable_view->Form->viewAttributes() ?>><?php echo $pres_indicationstable_view->Form->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable_view->Min_Dose_Val->Visible) { // Min_Dose_Val ?>
	<tr id="r_Min_Dose_Val">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Min_Dose_Val"><?php echo $pres_indicationstable_view->Min_Dose_Val->caption() ?></span></td>
		<td data-name="Min_Dose_Val" <?php echo $pres_indicationstable_view->Min_Dose_Val->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Dose_Val">
<span<?php echo $pres_indicationstable_view->Min_Dose_Val->viewAttributes() ?>><?php echo $pres_indicationstable_view->Min_Dose_Val->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable_view->Min_Dose_Unit->Visible) { // Min_Dose_Unit ?>
	<tr id="r_Min_Dose_Unit">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Min_Dose_Unit"><?php echo $pres_indicationstable_view->Min_Dose_Unit->caption() ?></span></td>
		<td data-name="Min_Dose_Unit" <?php echo $pres_indicationstable_view->Min_Dose_Unit->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Dose_Unit">
<span<?php echo $pres_indicationstable_view->Min_Dose_Unit->viewAttributes() ?>><?php echo $pres_indicationstable_view->Min_Dose_Unit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable_view->Max_Dose_Val->Visible) { // Max_Dose_Val ?>
	<tr id="r_Max_Dose_Val">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Max_Dose_Val"><?php echo $pres_indicationstable_view->Max_Dose_Val->caption() ?></span></td>
		<td data-name="Max_Dose_Val" <?php echo $pres_indicationstable_view->Max_Dose_Val->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Dose_Val">
<span<?php echo $pres_indicationstable_view->Max_Dose_Val->viewAttributes() ?>><?php echo $pres_indicationstable_view->Max_Dose_Val->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable_view->Max_Dose_Unit->Visible) { // Max_Dose_Unit ?>
	<tr id="r_Max_Dose_Unit">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Max_Dose_Unit"><?php echo $pres_indicationstable_view->Max_Dose_Unit->caption() ?></span></td>
		<td data-name="Max_Dose_Unit" <?php echo $pres_indicationstable_view->Max_Dose_Unit->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Dose_Unit">
<span<?php echo $pres_indicationstable_view->Max_Dose_Unit->viewAttributes() ?>><?php echo $pres_indicationstable_view->Max_Dose_Unit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable_view->Frequency->Visible) { // Frequency ?>
	<tr id="r_Frequency">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Frequency"><?php echo $pres_indicationstable_view->Frequency->caption() ?></span></td>
		<td data-name="Frequency" <?php echo $pres_indicationstable_view->Frequency->cellAttributes() ?>>
<span id="el_pres_indicationstable_Frequency">
<span<?php echo $pres_indicationstable_view->Frequency->viewAttributes() ?>><?php echo $pres_indicationstable_view->Frequency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable_view->Duration->Visible) { // Duration ?>
	<tr id="r_Duration">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Duration"><?php echo $pres_indicationstable_view->Duration->caption() ?></span></td>
		<td data-name="Duration" <?php echo $pres_indicationstable_view->Duration->cellAttributes() ?>>
<span id="el_pres_indicationstable_Duration">
<span<?php echo $pres_indicationstable_view->Duration->viewAttributes() ?>><?php echo $pres_indicationstable_view->Duration->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable_view->DWMY->Visible) { // DWMY ?>
	<tr id="r_DWMY">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_DWMY"><?php echo $pres_indicationstable_view->DWMY->caption() ?></span></td>
		<td data-name="DWMY" <?php echo $pres_indicationstable_view->DWMY->cellAttributes() ?>>
<span id="el_pres_indicationstable_DWMY">
<span<?php echo $pres_indicationstable_view->DWMY->viewAttributes() ?>><?php echo $pres_indicationstable_view->DWMY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable_view->Contraindications->Visible) { // Contraindications ?>
	<tr id="r_Contraindications">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Contraindications"><?php echo $pres_indicationstable_view->Contraindications->caption() ?></span></td>
		<td data-name="Contraindications" <?php echo $pres_indicationstable_view->Contraindications->cellAttributes() ?>>
<span id="el_pres_indicationstable_Contraindications">
<span<?php echo $pres_indicationstable_view->Contraindications->viewAttributes() ?>><?php echo $pres_indicationstable_view->Contraindications->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable_view->RecStatus->Visible) { // RecStatus ?>
	<tr id="r_RecStatus">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_RecStatus"><?php echo $pres_indicationstable_view->RecStatus->caption() ?></span></td>
		<td data-name="RecStatus" <?php echo $pres_indicationstable_view->RecStatus->cellAttributes() ?>>
<span id="el_pres_indicationstable_RecStatus">
<span<?php echo $pres_indicationstable_view->RecStatus->viewAttributes() ?>><?php echo $pres_indicationstable_view->RecStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_indicationstable_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$pres_indicationstable_view->isExport()) { ?>
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
$pres_indicationstable_view->terminate();
?>
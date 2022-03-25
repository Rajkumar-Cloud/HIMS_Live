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
<?php include_once "header.php" ?>
<?php if (!$pres_indicationstable->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var fpres_indicationstableview = currentForm = new ew.Form("fpres_indicationstableview", "view");

// Form_CustomValidate event
fpres_indicationstableview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_indicationstableview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$pres_indicationstable->isExport()) { ?>
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
<?php if ($pres_indicationstable_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_indicationstable_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_indicationstable">
<input type="hidden" name="modal" value="<?php echo (int)$pres_indicationstable_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($pres_indicationstable->Sno->Visible) { // Sno ?>
	<tr id="r_Sno">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Sno"><?php echo $pres_indicationstable->Sno->caption() ?></span></td>
		<td data-name="Sno"<?php echo $pres_indicationstable->Sno->cellAttributes() ?>>
<span id="el_pres_indicationstable_Sno">
<span<?php echo $pres_indicationstable->Sno->viewAttributes() ?>>
<?php echo $pres_indicationstable->Sno->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable->Genericname->Visible) { // Genericname ?>
	<tr id="r_Genericname">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Genericname"><?php echo $pres_indicationstable->Genericname->caption() ?></span></td>
		<td data-name="Genericname"<?php echo $pres_indicationstable->Genericname->cellAttributes() ?>>
<span id="el_pres_indicationstable_Genericname">
<span<?php echo $pres_indicationstable->Genericname->viewAttributes() ?>>
<?php echo $pres_indicationstable->Genericname->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable->Indications->Visible) { // Indications ?>
	<tr id="r_Indications">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Indications"><?php echo $pres_indicationstable->Indications->caption() ?></span></td>
		<td data-name="Indications"<?php echo $pres_indicationstable->Indications->cellAttributes() ?>>
<span id="el_pres_indicationstable_Indications">
<span<?php echo $pres_indicationstable->Indications->viewAttributes() ?>>
<?php echo $pres_indicationstable->Indications->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable->Category->Visible) { // Category ?>
	<tr id="r_Category">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Category"><?php echo $pres_indicationstable->Category->caption() ?></span></td>
		<td data-name="Category"<?php echo $pres_indicationstable->Category->cellAttributes() ?>>
<span id="el_pres_indicationstable_Category">
<span<?php echo $pres_indicationstable->Category->viewAttributes() ?>>
<?php echo $pres_indicationstable->Category->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable->Min_Age->Visible) { // Min_Age ?>
	<tr id="r_Min_Age">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Min_Age"><?php echo $pres_indicationstable->Min_Age->caption() ?></span></td>
		<td data-name="Min_Age"<?php echo $pres_indicationstable->Min_Age->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Age">
<span<?php echo $pres_indicationstable->Min_Age->viewAttributes() ?>>
<?php echo $pres_indicationstable->Min_Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable->Min_Days->Visible) { // Min_Days ?>
	<tr id="r_Min_Days">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Min_Days"><?php echo $pres_indicationstable->Min_Days->caption() ?></span></td>
		<td data-name="Min_Days"<?php echo $pres_indicationstable->Min_Days->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Days">
<span<?php echo $pres_indicationstable->Min_Days->viewAttributes() ?>>
<?php echo $pres_indicationstable->Min_Days->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable->Max_Age->Visible) { // Max_Age ?>
	<tr id="r_Max_Age">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Max_Age"><?php echo $pres_indicationstable->Max_Age->caption() ?></span></td>
		<td data-name="Max_Age"<?php echo $pres_indicationstable->Max_Age->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Age">
<span<?php echo $pres_indicationstable->Max_Age->viewAttributes() ?>>
<?php echo $pres_indicationstable->Max_Age->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable->Max_Days->Visible) { // Max_Days ?>
	<tr id="r_Max_Days">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Max_Days"><?php echo $pres_indicationstable->Max_Days->caption() ?></span></td>
		<td data-name="Max_Days"<?php echo $pres_indicationstable->Max_Days->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Days">
<span<?php echo $pres_indicationstable->Max_Days->viewAttributes() ?>>
<?php echo $pres_indicationstable->Max_Days->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable->_Route->Visible) { // Route ?>
	<tr id="r__Route">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable__Route"><?php echo $pres_indicationstable->_Route->caption() ?></span></td>
		<td data-name="_Route"<?php echo $pres_indicationstable->_Route->cellAttributes() ?>>
<span id="el_pres_indicationstable__Route">
<span<?php echo $pres_indicationstable->_Route->viewAttributes() ?>>
<?php echo $pres_indicationstable->_Route->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable->Form->Visible) { // Form ?>
	<tr id="r_Form">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Form"><?php echo $pres_indicationstable->Form->caption() ?></span></td>
		<td data-name="Form"<?php echo $pres_indicationstable->Form->cellAttributes() ?>>
<span id="el_pres_indicationstable_Form">
<span<?php echo $pres_indicationstable->Form->viewAttributes() ?>>
<?php echo $pres_indicationstable->Form->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable->Min_Dose_Val->Visible) { // Min_Dose_Val ?>
	<tr id="r_Min_Dose_Val">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Min_Dose_Val"><?php echo $pres_indicationstable->Min_Dose_Val->caption() ?></span></td>
		<td data-name="Min_Dose_Val"<?php echo $pres_indicationstable->Min_Dose_Val->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Dose_Val">
<span<?php echo $pres_indicationstable->Min_Dose_Val->viewAttributes() ?>>
<?php echo $pres_indicationstable->Min_Dose_Val->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable->Min_Dose_Unit->Visible) { // Min_Dose_Unit ?>
	<tr id="r_Min_Dose_Unit">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Min_Dose_Unit"><?php echo $pres_indicationstable->Min_Dose_Unit->caption() ?></span></td>
		<td data-name="Min_Dose_Unit"<?php echo $pres_indicationstable->Min_Dose_Unit->cellAttributes() ?>>
<span id="el_pres_indicationstable_Min_Dose_Unit">
<span<?php echo $pres_indicationstable->Min_Dose_Unit->viewAttributes() ?>>
<?php echo $pres_indicationstable->Min_Dose_Unit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable->Max_Dose_Val->Visible) { // Max_Dose_Val ?>
	<tr id="r_Max_Dose_Val">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Max_Dose_Val"><?php echo $pres_indicationstable->Max_Dose_Val->caption() ?></span></td>
		<td data-name="Max_Dose_Val"<?php echo $pres_indicationstable->Max_Dose_Val->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Dose_Val">
<span<?php echo $pres_indicationstable->Max_Dose_Val->viewAttributes() ?>>
<?php echo $pres_indicationstable->Max_Dose_Val->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable->Max_Dose_Unit->Visible) { // Max_Dose_Unit ?>
	<tr id="r_Max_Dose_Unit">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Max_Dose_Unit"><?php echo $pres_indicationstable->Max_Dose_Unit->caption() ?></span></td>
		<td data-name="Max_Dose_Unit"<?php echo $pres_indicationstable->Max_Dose_Unit->cellAttributes() ?>>
<span id="el_pres_indicationstable_Max_Dose_Unit">
<span<?php echo $pres_indicationstable->Max_Dose_Unit->viewAttributes() ?>>
<?php echo $pres_indicationstable->Max_Dose_Unit->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable->Frequency->Visible) { // Frequency ?>
	<tr id="r_Frequency">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Frequency"><?php echo $pres_indicationstable->Frequency->caption() ?></span></td>
		<td data-name="Frequency"<?php echo $pres_indicationstable->Frequency->cellAttributes() ?>>
<span id="el_pres_indicationstable_Frequency">
<span<?php echo $pres_indicationstable->Frequency->viewAttributes() ?>>
<?php echo $pres_indicationstable->Frequency->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable->Duration->Visible) { // Duration ?>
	<tr id="r_Duration">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Duration"><?php echo $pres_indicationstable->Duration->caption() ?></span></td>
		<td data-name="Duration"<?php echo $pres_indicationstable->Duration->cellAttributes() ?>>
<span id="el_pres_indicationstable_Duration">
<span<?php echo $pres_indicationstable->Duration->viewAttributes() ?>>
<?php echo $pres_indicationstable->Duration->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable->DWMY->Visible) { // DWMY ?>
	<tr id="r_DWMY">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_DWMY"><?php echo $pres_indicationstable->DWMY->caption() ?></span></td>
		<td data-name="DWMY"<?php echo $pres_indicationstable->DWMY->cellAttributes() ?>>
<span id="el_pres_indicationstable_DWMY">
<span<?php echo $pres_indicationstable->DWMY->viewAttributes() ?>>
<?php echo $pres_indicationstable->DWMY->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable->Contraindications->Visible) { // Contraindications ?>
	<tr id="r_Contraindications">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_Contraindications"><?php echo $pres_indicationstable->Contraindications->caption() ?></span></td>
		<td data-name="Contraindications"<?php echo $pres_indicationstable->Contraindications->cellAttributes() ?>>
<span id="el_pres_indicationstable_Contraindications">
<span<?php echo $pres_indicationstable->Contraindications->viewAttributes() ?>>
<?php echo $pres_indicationstable->Contraindications->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($pres_indicationstable->RecStatus->Visible) { // RecStatus ?>
	<tr id="r_RecStatus">
		<td class="<?php echo $pres_indicationstable_view->TableLeftColumnClass ?>"><span id="elh_pres_indicationstable_RecStatus"><?php echo $pres_indicationstable->RecStatus->caption() ?></span></td>
		<td data-name="RecStatus"<?php echo $pres_indicationstable->RecStatus->cellAttributes() ?>>
<span id="el_pres_indicationstable_RecStatus">
<span<?php echo $pres_indicationstable->RecStatus->viewAttributes() ?>>
<?php echo $pres_indicationstable->RecStatus->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$pres_indicationstable_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$pres_indicationstable->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$pres_indicationstable_view->terminate();
?>
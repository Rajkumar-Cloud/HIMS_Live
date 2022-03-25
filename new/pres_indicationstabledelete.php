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
$pres_indicationstable_delete = new pres_indicationstable_delete();

// Run the page
$pres_indicationstable_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_indicationstable_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_indicationstabledelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpres_indicationstabledelete = currentForm = new ew.Form("fpres_indicationstabledelete", "delete");
	loadjs.done("fpres_indicationstabledelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_indicationstable_delete->showPageHeader(); ?>
<?php
$pres_indicationstable_delete->showMessage();
?>
<form name="fpres_indicationstabledelete" id="fpres_indicationstabledelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_indicationstable">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_indicationstable_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_indicationstable_delete->Sno->Visible) { // Sno ?>
		<th class="<?php echo $pres_indicationstable_delete->Sno->headerCellClass() ?>"><span id="elh_pres_indicationstable_Sno" class="pres_indicationstable_Sno"><?php echo $pres_indicationstable_delete->Sno->caption() ?></span></th>
<?php } ?>
<?php if ($pres_indicationstable_delete->Genericname->Visible) { // Genericname ?>
		<th class="<?php echo $pres_indicationstable_delete->Genericname->headerCellClass() ?>"><span id="elh_pres_indicationstable_Genericname" class="pres_indicationstable_Genericname"><?php echo $pres_indicationstable_delete->Genericname->caption() ?></span></th>
<?php } ?>
<?php if ($pres_indicationstable_delete->Indications->Visible) { // Indications ?>
		<th class="<?php echo $pres_indicationstable_delete->Indications->headerCellClass() ?>"><span id="elh_pres_indicationstable_Indications" class="pres_indicationstable_Indications"><?php echo $pres_indicationstable_delete->Indications->caption() ?></span></th>
<?php } ?>
<?php if ($pres_indicationstable_delete->Category->Visible) { // Category ?>
		<th class="<?php echo $pres_indicationstable_delete->Category->headerCellClass() ?>"><span id="elh_pres_indicationstable_Category" class="pres_indicationstable_Category"><?php echo $pres_indicationstable_delete->Category->caption() ?></span></th>
<?php } ?>
<?php if ($pres_indicationstable_delete->Min_Age->Visible) { // Min_Age ?>
		<th class="<?php echo $pres_indicationstable_delete->Min_Age->headerCellClass() ?>"><span id="elh_pres_indicationstable_Min_Age" class="pres_indicationstable_Min_Age"><?php echo $pres_indicationstable_delete->Min_Age->caption() ?></span></th>
<?php } ?>
<?php if ($pres_indicationstable_delete->Min_Days->Visible) { // Min_Days ?>
		<th class="<?php echo $pres_indicationstable_delete->Min_Days->headerCellClass() ?>"><span id="elh_pres_indicationstable_Min_Days" class="pres_indicationstable_Min_Days"><?php echo $pres_indicationstable_delete->Min_Days->caption() ?></span></th>
<?php } ?>
<?php if ($pres_indicationstable_delete->Max_Age->Visible) { // Max_Age ?>
		<th class="<?php echo $pres_indicationstable_delete->Max_Age->headerCellClass() ?>"><span id="elh_pres_indicationstable_Max_Age" class="pres_indicationstable_Max_Age"><?php echo $pres_indicationstable_delete->Max_Age->caption() ?></span></th>
<?php } ?>
<?php if ($pres_indicationstable_delete->Max_Days->Visible) { // Max_Days ?>
		<th class="<?php echo $pres_indicationstable_delete->Max_Days->headerCellClass() ?>"><span id="elh_pres_indicationstable_Max_Days" class="pres_indicationstable_Max_Days"><?php echo $pres_indicationstable_delete->Max_Days->caption() ?></span></th>
<?php } ?>
<?php if ($pres_indicationstable_delete->_Route->Visible) { // Route ?>
		<th class="<?php echo $pres_indicationstable_delete->_Route->headerCellClass() ?>"><span id="elh_pres_indicationstable__Route" class="pres_indicationstable__Route"><?php echo $pres_indicationstable_delete->_Route->caption() ?></span></th>
<?php } ?>
<?php if ($pres_indicationstable_delete->Form->Visible) { // Form ?>
		<th class="<?php echo $pres_indicationstable_delete->Form->headerCellClass() ?>"><span id="elh_pres_indicationstable_Form" class="pres_indicationstable_Form"><?php echo $pres_indicationstable_delete->Form->caption() ?></span></th>
<?php } ?>
<?php if ($pres_indicationstable_delete->Min_Dose_Val->Visible) { // Min_Dose_Val ?>
		<th class="<?php echo $pres_indicationstable_delete->Min_Dose_Val->headerCellClass() ?>"><span id="elh_pres_indicationstable_Min_Dose_Val" class="pres_indicationstable_Min_Dose_Val"><?php echo $pres_indicationstable_delete->Min_Dose_Val->caption() ?></span></th>
<?php } ?>
<?php if ($pres_indicationstable_delete->Min_Dose_Unit->Visible) { // Min_Dose_Unit ?>
		<th class="<?php echo $pres_indicationstable_delete->Min_Dose_Unit->headerCellClass() ?>"><span id="elh_pres_indicationstable_Min_Dose_Unit" class="pres_indicationstable_Min_Dose_Unit"><?php echo $pres_indicationstable_delete->Min_Dose_Unit->caption() ?></span></th>
<?php } ?>
<?php if ($pres_indicationstable_delete->Max_Dose_Val->Visible) { // Max_Dose_Val ?>
		<th class="<?php echo $pres_indicationstable_delete->Max_Dose_Val->headerCellClass() ?>"><span id="elh_pres_indicationstable_Max_Dose_Val" class="pres_indicationstable_Max_Dose_Val"><?php echo $pres_indicationstable_delete->Max_Dose_Val->caption() ?></span></th>
<?php } ?>
<?php if ($pres_indicationstable_delete->Max_Dose_Unit->Visible) { // Max_Dose_Unit ?>
		<th class="<?php echo $pres_indicationstable_delete->Max_Dose_Unit->headerCellClass() ?>"><span id="elh_pres_indicationstable_Max_Dose_Unit" class="pres_indicationstable_Max_Dose_Unit"><?php echo $pres_indicationstable_delete->Max_Dose_Unit->caption() ?></span></th>
<?php } ?>
<?php if ($pres_indicationstable_delete->Frequency->Visible) { // Frequency ?>
		<th class="<?php echo $pres_indicationstable_delete->Frequency->headerCellClass() ?>"><span id="elh_pres_indicationstable_Frequency" class="pres_indicationstable_Frequency"><?php echo $pres_indicationstable_delete->Frequency->caption() ?></span></th>
<?php } ?>
<?php if ($pres_indicationstable_delete->Duration->Visible) { // Duration ?>
		<th class="<?php echo $pres_indicationstable_delete->Duration->headerCellClass() ?>"><span id="elh_pres_indicationstable_Duration" class="pres_indicationstable_Duration"><?php echo $pres_indicationstable_delete->Duration->caption() ?></span></th>
<?php } ?>
<?php if ($pres_indicationstable_delete->DWMY->Visible) { // DWMY ?>
		<th class="<?php echo $pres_indicationstable_delete->DWMY->headerCellClass() ?>"><span id="elh_pres_indicationstable_DWMY" class="pres_indicationstable_DWMY"><?php echo $pres_indicationstable_delete->DWMY->caption() ?></span></th>
<?php } ?>
<?php if ($pres_indicationstable_delete->Contraindications->Visible) { // Contraindications ?>
		<th class="<?php echo $pres_indicationstable_delete->Contraindications->headerCellClass() ?>"><span id="elh_pres_indicationstable_Contraindications" class="pres_indicationstable_Contraindications"><?php echo $pres_indicationstable_delete->Contraindications->caption() ?></span></th>
<?php } ?>
<?php if ($pres_indicationstable_delete->RecStatus->Visible) { // RecStatus ?>
		<th class="<?php echo $pres_indicationstable_delete->RecStatus->headerCellClass() ?>"><span id="elh_pres_indicationstable_RecStatus" class="pres_indicationstable_RecStatus"><?php echo $pres_indicationstable_delete->RecStatus->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_indicationstable_delete->RecordCount = 0;
$i = 0;
while (!$pres_indicationstable_delete->Recordset->EOF) {
	$pres_indicationstable_delete->RecordCount++;
	$pres_indicationstable_delete->RowCount++;

	// Set row properties
	$pres_indicationstable->resetAttributes();
	$pres_indicationstable->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_indicationstable_delete->loadRowValues($pres_indicationstable_delete->Recordset);

	// Render row
	$pres_indicationstable_delete->renderRow();
?>
	<tr <?php echo $pres_indicationstable->rowAttributes() ?>>
<?php if ($pres_indicationstable_delete->Sno->Visible) { // Sno ?>
		<td <?php echo $pres_indicationstable_delete->Sno->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_delete->RowCount ?>_pres_indicationstable_Sno" class="pres_indicationstable_Sno">
<span<?php echo $pres_indicationstable_delete->Sno->viewAttributes() ?>><?php echo $pres_indicationstable_delete->Sno->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_indicationstable_delete->Genericname->Visible) { // Genericname ?>
		<td <?php echo $pres_indicationstable_delete->Genericname->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_delete->RowCount ?>_pres_indicationstable_Genericname" class="pres_indicationstable_Genericname">
<span<?php echo $pres_indicationstable_delete->Genericname->viewAttributes() ?>><?php echo $pres_indicationstable_delete->Genericname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_indicationstable_delete->Indications->Visible) { // Indications ?>
		<td <?php echo $pres_indicationstable_delete->Indications->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_delete->RowCount ?>_pres_indicationstable_Indications" class="pres_indicationstable_Indications">
<span<?php echo $pres_indicationstable_delete->Indications->viewAttributes() ?>><?php echo $pres_indicationstable_delete->Indications->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_indicationstable_delete->Category->Visible) { // Category ?>
		<td <?php echo $pres_indicationstable_delete->Category->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_delete->RowCount ?>_pres_indicationstable_Category" class="pres_indicationstable_Category">
<span<?php echo $pres_indicationstable_delete->Category->viewAttributes() ?>><?php echo $pres_indicationstable_delete->Category->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_indicationstable_delete->Min_Age->Visible) { // Min_Age ?>
		<td <?php echo $pres_indicationstable_delete->Min_Age->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_delete->RowCount ?>_pres_indicationstable_Min_Age" class="pres_indicationstable_Min_Age">
<span<?php echo $pres_indicationstable_delete->Min_Age->viewAttributes() ?>><?php echo $pres_indicationstable_delete->Min_Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_indicationstable_delete->Min_Days->Visible) { // Min_Days ?>
		<td <?php echo $pres_indicationstable_delete->Min_Days->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_delete->RowCount ?>_pres_indicationstable_Min_Days" class="pres_indicationstable_Min_Days">
<span<?php echo $pres_indicationstable_delete->Min_Days->viewAttributes() ?>><?php echo $pres_indicationstable_delete->Min_Days->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_indicationstable_delete->Max_Age->Visible) { // Max_Age ?>
		<td <?php echo $pres_indicationstable_delete->Max_Age->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_delete->RowCount ?>_pres_indicationstable_Max_Age" class="pres_indicationstable_Max_Age">
<span<?php echo $pres_indicationstable_delete->Max_Age->viewAttributes() ?>><?php echo $pres_indicationstable_delete->Max_Age->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_indicationstable_delete->Max_Days->Visible) { // Max_Days ?>
		<td <?php echo $pres_indicationstable_delete->Max_Days->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_delete->RowCount ?>_pres_indicationstable_Max_Days" class="pres_indicationstable_Max_Days">
<span<?php echo $pres_indicationstable_delete->Max_Days->viewAttributes() ?>><?php echo $pres_indicationstable_delete->Max_Days->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_indicationstable_delete->_Route->Visible) { // Route ?>
		<td <?php echo $pres_indicationstable_delete->_Route->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_delete->RowCount ?>_pres_indicationstable__Route" class="pres_indicationstable__Route">
<span<?php echo $pres_indicationstable_delete->_Route->viewAttributes() ?>><?php echo $pres_indicationstable_delete->_Route->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_indicationstable_delete->Form->Visible) { // Form ?>
		<td <?php echo $pres_indicationstable_delete->Form->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_delete->RowCount ?>_pres_indicationstable_Form" class="pres_indicationstable_Form">
<span<?php echo $pres_indicationstable_delete->Form->viewAttributes() ?>><?php echo $pres_indicationstable_delete->Form->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_indicationstable_delete->Min_Dose_Val->Visible) { // Min_Dose_Val ?>
		<td <?php echo $pres_indicationstable_delete->Min_Dose_Val->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_delete->RowCount ?>_pres_indicationstable_Min_Dose_Val" class="pres_indicationstable_Min_Dose_Val">
<span<?php echo $pres_indicationstable_delete->Min_Dose_Val->viewAttributes() ?>><?php echo $pres_indicationstable_delete->Min_Dose_Val->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_indicationstable_delete->Min_Dose_Unit->Visible) { // Min_Dose_Unit ?>
		<td <?php echo $pres_indicationstable_delete->Min_Dose_Unit->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_delete->RowCount ?>_pres_indicationstable_Min_Dose_Unit" class="pres_indicationstable_Min_Dose_Unit">
<span<?php echo $pres_indicationstable_delete->Min_Dose_Unit->viewAttributes() ?>><?php echo $pres_indicationstable_delete->Min_Dose_Unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_indicationstable_delete->Max_Dose_Val->Visible) { // Max_Dose_Val ?>
		<td <?php echo $pres_indicationstable_delete->Max_Dose_Val->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_delete->RowCount ?>_pres_indicationstable_Max_Dose_Val" class="pres_indicationstable_Max_Dose_Val">
<span<?php echo $pres_indicationstable_delete->Max_Dose_Val->viewAttributes() ?>><?php echo $pres_indicationstable_delete->Max_Dose_Val->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_indicationstable_delete->Max_Dose_Unit->Visible) { // Max_Dose_Unit ?>
		<td <?php echo $pres_indicationstable_delete->Max_Dose_Unit->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_delete->RowCount ?>_pres_indicationstable_Max_Dose_Unit" class="pres_indicationstable_Max_Dose_Unit">
<span<?php echo $pres_indicationstable_delete->Max_Dose_Unit->viewAttributes() ?>><?php echo $pres_indicationstable_delete->Max_Dose_Unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_indicationstable_delete->Frequency->Visible) { // Frequency ?>
		<td <?php echo $pres_indicationstable_delete->Frequency->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_delete->RowCount ?>_pres_indicationstable_Frequency" class="pres_indicationstable_Frequency">
<span<?php echo $pres_indicationstable_delete->Frequency->viewAttributes() ?>><?php echo $pres_indicationstable_delete->Frequency->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_indicationstable_delete->Duration->Visible) { // Duration ?>
		<td <?php echo $pres_indicationstable_delete->Duration->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_delete->RowCount ?>_pres_indicationstable_Duration" class="pres_indicationstable_Duration">
<span<?php echo $pres_indicationstable_delete->Duration->viewAttributes() ?>><?php echo $pres_indicationstable_delete->Duration->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_indicationstable_delete->DWMY->Visible) { // DWMY ?>
		<td <?php echo $pres_indicationstable_delete->DWMY->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_delete->RowCount ?>_pres_indicationstable_DWMY" class="pres_indicationstable_DWMY">
<span<?php echo $pres_indicationstable_delete->DWMY->viewAttributes() ?>><?php echo $pres_indicationstable_delete->DWMY->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_indicationstable_delete->Contraindications->Visible) { // Contraindications ?>
		<td <?php echo $pres_indicationstable_delete->Contraindications->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_delete->RowCount ?>_pres_indicationstable_Contraindications" class="pres_indicationstable_Contraindications">
<span<?php echo $pres_indicationstable_delete->Contraindications->viewAttributes() ?>><?php echo $pres_indicationstable_delete->Contraindications->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_indicationstable_delete->RecStatus->Visible) { // RecStatus ?>
		<td <?php echo $pres_indicationstable_delete->RecStatus->cellAttributes() ?>>
<span id="el<?php echo $pres_indicationstable_delete->RowCount ?>_pres_indicationstable_RecStatus" class="pres_indicationstable_RecStatus">
<span<?php echo $pres_indicationstable_delete->RecStatus->viewAttributes() ?>><?php echo $pres_indicationstable_delete->RecStatus->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_indicationstable_delete->Recordset->moveNext();
}
$pres_indicationstable_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_indicationstable_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_indicationstable_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$pres_indicationstable_delete->terminate();
?>
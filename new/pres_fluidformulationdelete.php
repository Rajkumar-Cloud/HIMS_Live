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
$pres_fluidformulation_delete = new pres_fluidformulation_delete();

// Run the page
$pres_fluidformulation_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_fluidformulation_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fpres_fluidformulationdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	fpres_fluidformulationdelete = currentForm = new ew.Form("fpres_fluidformulationdelete", "delete");
	loadjs.done("fpres_fluidformulationdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $pres_fluidformulation_delete->showPageHeader(); ?>
<?php
$pres_fluidformulation_delete->showMessage();
?>
<form name="fpres_fluidformulationdelete" id="fpres_fluidformulationdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_fluidformulation">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_fluidformulation_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_fluidformulation_delete->id->Visible) { // id ?>
		<th class="<?php echo $pres_fluidformulation_delete->id->headerCellClass() ?>"><span id="elh_pres_fluidformulation_id" class="pres_fluidformulation_id"><?php echo $pres_fluidformulation_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluidformulation_delete->Tradename->Visible) { // Tradename ?>
		<th class="<?php echo $pres_fluidformulation_delete->Tradename->headerCellClass() ?>"><span id="elh_pres_fluidformulation_Tradename" class="pres_fluidformulation_Tradename"><?php echo $pres_fluidformulation_delete->Tradename->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluidformulation_delete->Itemcode->Visible) { // Itemcode ?>
		<th class="<?php echo $pres_fluidformulation_delete->Itemcode->headerCellClass() ?>"><span id="elh_pres_fluidformulation_Itemcode" class="pres_fluidformulation_Itemcode"><?php echo $pres_fluidformulation_delete->Itemcode->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluidformulation_delete->Genericname->Visible) { // Genericname ?>
		<th class="<?php echo $pres_fluidformulation_delete->Genericname->headerCellClass() ?>"><span id="elh_pres_fluidformulation_Genericname" class="pres_fluidformulation_Genericname"><?php echo $pres_fluidformulation_delete->Genericname->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluidformulation_delete->Volume->Visible) { // Volume ?>
		<th class="<?php echo $pres_fluidformulation_delete->Volume->headerCellClass() ?>"><span id="elh_pres_fluidformulation_Volume" class="pres_fluidformulation_Volume"><?php echo $pres_fluidformulation_delete->Volume->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluidformulation_delete->VolumeUnit->Visible) { // VolumeUnit ?>
		<th class="<?php echo $pres_fluidformulation_delete->VolumeUnit->headerCellClass() ?>"><span id="elh_pres_fluidformulation_VolumeUnit" class="pres_fluidformulation_VolumeUnit"><?php echo $pres_fluidformulation_delete->VolumeUnit->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluidformulation_delete->Strength->Visible) { // Strength ?>
		<th class="<?php echo $pres_fluidformulation_delete->Strength->headerCellClass() ?>"><span id="elh_pres_fluidformulation_Strength" class="pres_fluidformulation_Strength"><?php echo $pres_fluidformulation_delete->Strength->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluidformulation_delete->StrengthUnit->Visible) { // StrengthUnit ?>
		<th class="<?php echo $pres_fluidformulation_delete->StrengthUnit->headerCellClass() ?>"><span id="elh_pres_fluidformulation_StrengthUnit" class="pres_fluidformulation_StrengthUnit"><?php echo $pres_fluidformulation_delete->StrengthUnit->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluidformulation_delete->_Route->Visible) { // Route ?>
		<th class="<?php echo $pres_fluidformulation_delete->_Route->headerCellClass() ?>"><span id="elh_pres_fluidformulation__Route" class="pres_fluidformulation__Route"><?php echo $pres_fluidformulation_delete->_Route->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluidformulation_delete->Forms->Visible) { // Forms ?>
		<th class="<?php echo $pres_fluidformulation_delete->Forms->headerCellClass() ?>"><span id="elh_pres_fluidformulation_Forms" class="pres_fluidformulation_Forms"><?php echo $pres_fluidformulation_delete->Forms->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_fluidformulation_delete->RecordCount = 0;
$i = 0;
while (!$pres_fluidformulation_delete->Recordset->EOF) {
	$pres_fluidformulation_delete->RecordCount++;
	$pres_fluidformulation_delete->RowCount++;

	// Set row properties
	$pres_fluidformulation->resetAttributes();
	$pres_fluidformulation->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_fluidformulation_delete->loadRowValues($pres_fluidformulation_delete->Recordset);

	// Render row
	$pres_fluidformulation_delete->renderRow();
?>
	<tr <?php echo $pres_fluidformulation->rowAttributes() ?>>
<?php if ($pres_fluidformulation_delete->id->Visible) { // id ?>
		<td <?php echo $pres_fluidformulation_delete->id->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCount ?>_pres_fluidformulation_id" class="pres_fluidformulation_id">
<span<?php echo $pres_fluidformulation_delete->id->viewAttributes() ?>><?php echo $pres_fluidformulation_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluidformulation_delete->Tradename->Visible) { // Tradename ?>
		<td <?php echo $pres_fluidformulation_delete->Tradename->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCount ?>_pres_fluidformulation_Tradename" class="pres_fluidformulation_Tradename">
<span<?php echo $pres_fluidformulation_delete->Tradename->viewAttributes() ?>><?php echo $pres_fluidformulation_delete->Tradename->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluidformulation_delete->Itemcode->Visible) { // Itemcode ?>
		<td <?php echo $pres_fluidformulation_delete->Itemcode->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCount ?>_pres_fluidformulation_Itemcode" class="pres_fluidformulation_Itemcode">
<span<?php echo $pres_fluidformulation_delete->Itemcode->viewAttributes() ?>><?php echo $pres_fluidformulation_delete->Itemcode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluidformulation_delete->Genericname->Visible) { // Genericname ?>
		<td <?php echo $pres_fluidformulation_delete->Genericname->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCount ?>_pres_fluidformulation_Genericname" class="pres_fluidformulation_Genericname">
<span<?php echo $pres_fluidformulation_delete->Genericname->viewAttributes() ?>><?php echo $pres_fluidformulation_delete->Genericname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluidformulation_delete->Volume->Visible) { // Volume ?>
		<td <?php echo $pres_fluidformulation_delete->Volume->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCount ?>_pres_fluidformulation_Volume" class="pres_fluidformulation_Volume">
<span<?php echo $pres_fluidformulation_delete->Volume->viewAttributes() ?>><?php echo $pres_fluidformulation_delete->Volume->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluidformulation_delete->VolumeUnit->Visible) { // VolumeUnit ?>
		<td <?php echo $pres_fluidformulation_delete->VolumeUnit->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCount ?>_pres_fluidformulation_VolumeUnit" class="pres_fluidformulation_VolumeUnit">
<span<?php echo $pres_fluidformulation_delete->VolumeUnit->viewAttributes() ?>><?php echo $pres_fluidformulation_delete->VolumeUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluidformulation_delete->Strength->Visible) { // Strength ?>
		<td <?php echo $pres_fluidformulation_delete->Strength->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCount ?>_pres_fluidformulation_Strength" class="pres_fluidformulation_Strength">
<span<?php echo $pres_fluidformulation_delete->Strength->viewAttributes() ?>><?php echo $pres_fluidformulation_delete->Strength->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluidformulation_delete->StrengthUnit->Visible) { // StrengthUnit ?>
		<td <?php echo $pres_fluidformulation_delete->StrengthUnit->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCount ?>_pres_fluidformulation_StrengthUnit" class="pres_fluidformulation_StrengthUnit">
<span<?php echo $pres_fluidformulation_delete->StrengthUnit->viewAttributes() ?>><?php echo $pres_fluidformulation_delete->StrengthUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluidformulation_delete->_Route->Visible) { // Route ?>
		<td <?php echo $pres_fluidformulation_delete->_Route->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCount ?>_pres_fluidformulation__Route" class="pres_fluidformulation__Route">
<span<?php echo $pres_fluidformulation_delete->_Route->viewAttributes() ?>><?php echo $pres_fluidformulation_delete->_Route->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluidformulation_delete->Forms->Visible) { // Forms ?>
		<td <?php echo $pres_fluidformulation_delete->Forms->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCount ?>_pres_fluidformulation_Forms" class="pres_fluidformulation_Forms">
<span<?php echo $pres_fluidformulation_delete->Forms->viewAttributes() ?>><?php echo $pres_fluidformulation_delete->Forms->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_fluidformulation_delete->Recordset->moveNext();
}
$pres_fluidformulation_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_fluidformulation_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_fluidformulation_delete->showPageFooter();
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
$pres_fluidformulation_delete->terminate();
?>
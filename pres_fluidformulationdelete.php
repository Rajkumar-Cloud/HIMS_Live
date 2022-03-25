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
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpres_fluidformulationdelete = currentForm = new ew.Form("fpres_fluidformulationdelete", "delete");

// Form_CustomValidate event
fpres_fluidformulationdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_fluidformulationdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_fluidformulation_delete->showPageHeader(); ?>
<?php
$pres_fluidformulation_delete->showMessage();
?>
<form name="fpres_fluidformulationdelete" id="fpres_fluidformulationdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_fluidformulation_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_fluidformulation_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_fluidformulation">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_fluidformulation_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_fluidformulation->id->Visible) { // id ?>
		<th class="<?php echo $pres_fluidformulation->id->headerCellClass() ?>"><span id="elh_pres_fluidformulation_id" class="pres_fluidformulation_id"><?php echo $pres_fluidformulation->id->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluidformulation->Tradename->Visible) { // Tradename ?>
		<th class="<?php echo $pres_fluidformulation->Tradename->headerCellClass() ?>"><span id="elh_pres_fluidformulation_Tradename" class="pres_fluidformulation_Tradename"><?php echo $pres_fluidformulation->Tradename->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluidformulation->Itemcode->Visible) { // Itemcode ?>
		<th class="<?php echo $pres_fluidformulation->Itemcode->headerCellClass() ?>"><span id="elh_pres_fluidformulation_Itemcode" class="pres_fluidformulation_Itemcode"><?php echo $pres_fluidformulation->Itemcode->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluidformulation->Genericname->Visible) { // Genericname ?>
		<th class="<?php echo $pres_fluidformulation->Genericname->headerCellClass() ?>"><span id="elh_pres_fluidformulation_Genericname" class="pres_fluidformulation_Genericname"><?php echo $pres_fluidformulation->Genericname->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluidformulation->Volume->Visible) { // Volume ?>
		<th class="<?php echo $pres_fluidformulation->Volume->headerCellClass() ?>"><span id="elh_pres_fluidformulation_Volume" class="pres_fluidformulation_Volume"><?php echo $pres_fluidformulation->Volume->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluidformulation->VolumeUnit->Visible) { // VolumeUnit ?>
		<th class="<?php echo $pres_fluidformulation->VolumeUnit->headerCellClass() ?>"><span id="elh_pres_fluidformulation_VolumeUnit" class="pres_fluidformulation_VolumeUnit"><?php echo $pres_fluidformulation->VolumeUnit->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluidformulation->Strength->Visible) { // Strength ?>
		<th class="<?php echo $pres_fluidformulation->Strength->headerCellClass() ?>"><span id="elh_pres_fluidformulation_Strength" class="pres_fluidformulation_Strength"><?php echo $pres_fluidformulation->Strength->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluidformulation->StrengthUnit->Visible) { // StrengthUnit ?>
		<th class="<?php echo $pres_fluidformulation->StrengthUnit->headerCellClass() ?>"><span id="elh_pres_fluidformulation_StrengthUnit" class="pres_fluidformulation_StrengthUnit"><?php echo $pres_fluidformulation->StrengthUnit->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluidformulation->_Route->Visible) { // Route ?>
		<th class="<?php echo $pres_fluidformulation->_Route->headerCellClass() ?>"><span id="elh_pres_fluidformulation__Route" class="pres_fluidformulation__Route"><?php echo $pres_fluidformulation->_Route->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluidformulation->Forms->Visible) { // Forms ?>
		<th class="<?php echo $pres_fluidformulation->Forms->headerCellClass() ?>"><span id="elh_pres_fluidformulation_Forms" class="pres_fluidformulation_Forms"><?php echo $pres_fluidformulation->Forms->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_fluidformulation_delete->RecCnt = 0;
$i = 0;
while (!$pres_fluidformulation_delete->Recordset->EOF) {
	$pres_fluidformulation_delete->RecCnt++;
	$pres_fluidformulation_delete->RowCnt++;

	// Set row properties
	$pres_fluidformulation->resetAttributes();
	$pres_fluidformulation->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_fluidformulation_delete->loadRowValues($pres_fluidformulation_delete->Recordset);

	// Render row
	$pres_fluidformulation_delete->renderRow();
?>
	<tr<?php echo $pres_fluidformulation->rowAttributes() ?>>
<?php if ($pres_fluidformulation->id->Visible) { // id ?>
		<td<?php echo $pres_fluidformulation->id->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCnt ?>_pres_fluidformulation_id" class="pres_fluidformulation_id">
<span<?php echo $pres_fluidformulation->id->viewAttributes() ?>>
<?php echo $pres_fluidformulation->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluidformulation->Tradename->Visible) { // Tradename ?>
		<td<?php echo $pres_fluidformulation->Tradename->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCnt ?>_pres_fluidformulation_Tradename" class="pres_fluidformulation_Tradename">
<span<?php echo $pres_fluidformulation->Tradename->viewAttributes() ?>>
<?php echo $pres_fluidformulation->Tradename->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluidformulation->Itemcode->Visible) { // Itemcode ?>
		<td<?php echo $pres_fluidformulation->Itemcode->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCnt ?>_pres_fluidformulation_Itemcode" class="pres_fluidformulation_Itemcode">
<span<?php echo $pres_fluidformulation->Itemcode->viewAttributes() ?>>
<?php echo $pres_fluidformulation->Itemcode->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluidformulation->Genericname->Visible) { // Genericname ?>
		<td<?php echo $pres_fluidformulation->Genericname->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCnt ?>_pres_fluidformulation_Genericname" class="pres_fluidformulation_Genericname">
<span<?php echo $pres_fluidformulation->Genericname->viewAttributes() ?>>
<?php echo $pres_fluidformulation->Genericname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluidformulation->Volume->Visible) { // Volume ?>
		<td<?php echo $pres_fluidformulation->Volume->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCnt ?>_pres_fluidformulation_Volume" class="pres_fluidformulation_Volume">
<span<?php echo $pres_fluidformulation->Volume->viewAttributes() ?>>
<?php echo $pres_fluidformulation->Volume->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluidformulation->VolumeUnit->Visible) { // VolumeUnit ?>
		<td<?php echo $pres_fluidformulation->VolumeUnit->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCnt ?>_pres_fluidformulation_VolumeUnit" class="pres_fluidformulation_VolumeUnit">
<span<?php echo $pres_fluidformulation->VolumeUnit->viewAttributes() ?>>
<?php echo $pres_fluidformulation->VolumeUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluidformulation->Strength->Visible) { // Strength ?>
		<td<?php echo $pres_fluidformulation->Strength->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCnt ?>_pres_fluidformulation_Strength" class="pres_fluidformulation_Strength">
<span<?php echo $pres_fluidformulation->Strength->viewAttributes() ?>>
<?php echo $pres_fluidformulation->Strength->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluidformulation->StrengthUnit->Visible) { // StrengthUnit ?>
		<td<?php echo $pres_fluidformulation->StrengthUnit->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCnt ?>_pres_fluidformulation_StrengthUnit" class="pres_fluidformulation_StrengthUnit">
<span<?php echo $pres_fluidformulation->StrengthUnit->viewAttributes() ?>>
<?php echo $pres_fluidformulation->StrengthUnit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluidformulation->_Route->Visible) { // Route ?>
		<td<?php echo $pres_fluidformulation->_Route->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCnt ?>_pres_fluidformulation__Route" class="pres_fluidformulation__Route">
<span<?php echo $pres_fluidformulation->_Route->viewAttributes() ?>>
<?php echo $pres_fluidformulation->_Route->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluidformulation->Forms->Visible) { // Forms ?>
		<td<?php echo $pres_fluidformulation->Forms->cellAttributes() ?>>
<span id="el<?php echo $pres_fluidformulation_delete->RowCnt ?>_pres_fluidformulation_Forms" class="pres_fluidformulation_Forms">
<span<?php echo $pres_fluidformulation->Forms->viewAttributes() ?>>
<?php echo $pres_fluidformulation->Forms->getViewValue() ?></span>
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
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pres_fluidformulation_delete->terminate();
?>
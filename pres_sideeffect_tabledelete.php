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
$pres_sideeffect_table_delete = new pres_sideeffect_table_delete();

// Run the page
$pres_sideeffect_table_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_sideeffect_table_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpres_sideeffect_tabledelete = currentForm = new ew.Form("fpres_sideeffect_tabledelete", "delete");

// Form_CustomValidate event
fpres_sideeffect_tabledelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_sideeffect_tabledelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_sideeffect_table_delete->showPageHeader(); ?>
<?php
$pres_sideeffect_table_delete->showMessage();
?>
<form name="fpres_sideeffect_tabledelete" id="fpres_sideeffect_tabledelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_sideeffect_table_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_sideeffect_table_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_sideeffect_table">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_sideeffect_table_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_sideeffect_table->id->Visible) { // id ?>
		<th class="<?php echo $pres_sideeffect_table->id->headerCellClass() ?>"><span id="elh_pres_sideeffect_table_id" class="pres_sideeffect_table_id"><?php echo $pres_sideeffect_table->id->caption() ?></span></th>
<?php } ?>
<?php if ($pres_sideeffect_table->Genericname->Visible) { // Genericname ?>
		<th class="<?php echo $pres_sideeffect_table->Genericname->headerCellClass() ?>"><span id="elh_pres_sideeffect_table_Genericname" class="pres_sideeffect_table_Genericname"><?php echo $pres_sideeffect_table->Genericname->caption() ?></span></th>
<?php } ?>
<?php if ($pres_sideeffect_table->SideEffects->Visible) { // SideEffects ?>
		<th class="<?php echo $pres_sideeffect_table->SideEffects->headerCellClass() ?>"><span id="elh_pres_sideeffect_table_SideEffects" class="pres_sideeffect_table_SideEffects"><?php echo $pres_sideeffect_table->SideEffects->caption() ?></span></th>
<?php } ?>
<?php if ($pres_sideeffect_table->Contraindications->Visible) { // Contraindications ?>
		<th class="<?php echo $pres_sideeffect_table->Contraindications->headerCellClass() ?>"><span id="elh_pres_sideeffect_table_Contraindications" class="pres_sideeffect_table_Contraindications"><?php echo $pres_sideeffect_table->Contraindications->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_sideeffect_table_delete->RecCnt = 0;
$i = 0;
while (!$pres_sideeffect_table_delete->Recordset->EOF) {
	$pres_sideeffect_table_delete->RecCnt++;
	$pres_sideeffect_table_delete->RowCnt++;

	// Set row properties
	$pres_sideeffect_table->resetAttributes();
	$pres_sideeffect_table->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_sideeffect_table_delete->loadRowValues($pres_sideeffect_table_delete->Recordset);

	// Render row
	$pres_sideeffect_table_delete->renderRow();
?>
	<tr<?php echo $pres_sideeffect_table->rowAttributes() ?>>
<?php if ($pres_sideeffect_table->id->Visible) { // id ?>
		<td<?php echo $pres_sideeffect_table->id->cellAttributes() ?>>
<span id="el<?php echo $pres_sideeffect_table_delete->RowCnt ?>_pres_sideeffect_table_id" class="pres_sideeffect_table_id">
<span<?php echo $pres_sideeffect_table->id->viewAttributes() ?>>
<?php echo $pres_sideeffect_table->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_sideeffect_table->Genericname->Visible) { // Genericname ?>
		<td<?php echo $pres_sideeffect_table->Genericname->cellAttributes() ?>>
<span id="el<?php echo $pres_sideeffect_table_delete->RowCnt ?>_pres_sideeffect_table_Genericname" class="pres_sideeffect_table_Genericname">
<span<?php echo $pres_sideeffect_table->Genericname->viewAttributes() ?>>
<?php echo $pres_sideeffect_table->Genericname->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_sideeffect_table->SideEffects->Visible) { // SideEffects ?>
		<td<?php echo $pres_sideeffect_table->SideEffects->cellAttributes() ?>>
<span id="el<?php echo $pres_sideeffect_table_delete->RowCnt ?>_pres_sideeffect_table_SideEffects" class="pres_sideeffect_table_SideEffects">
<span<?php echo $pres_sideeffect_table->SideEffects->viewAttributes() ?>>
<?php echo $pres_sideeffect_table->SideEffects->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_sideeffect_table->Contraindications->Visible) { // Contraindications ?>
		<td<?php echo $pres_sideeffect_table->Contraindications->cellAttributes() ?>>
<span id="el<?php echo $pres_sideeffect_table_delete->RowCnt ?>_pres_sideeffect_table_Contraindications" class="pres_sideeffect_table_Contraindications">
<span<?php echo $pres_sideeffect_table->Contraindications->viewAttributes() ?>>
<?php echo $pres_sideeffect_table->Contraindications->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_sideeffect_table_delete->Recordset->moveNext();
}
$pres_sideeffect_table_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_sideeffect_table_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_sideeffect_table_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pres_sideeffect_table_delete->terminate();
?>
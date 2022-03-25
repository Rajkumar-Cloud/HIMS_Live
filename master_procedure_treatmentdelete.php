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
$master_procedure_treatment_delete = new master_procedure_treatment_delete();

// Run the page
$master_procedure_treatment_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$master_procedure_treatment_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fmaster_procedure_treatmentdelete = currentForm = new ew.Form("fmaster_procedure_treatmentdelete", "delete");

// Form_CustomValidate event
fmaster_procedure_treatmentdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmaster_procedure_treatmentdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $master_procedure_treatment_delete->showPageHeader(); ?>
<?php
$master_procedure_treatment_delete->showMessage();
?>
<form name="fmaster_procedure_treatmentdelete" id="fmaster_procedure_treatmentdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($master_procedure_treatment_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $master_procedure_treatment_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="master_procedure_treatment">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($master_procedure_treatment_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($master_procedure_treatment->id->Visible) { // id ?>
		<th class="<?php echo $master_procedure_treatment->id->headerCellClass() ?>"><span id="elh_master_procedure_treatment_id" class="master_procedure_treatment_id"><?php echo $master_procedure_treatment->id->caption() ?></span></th>
<?php } ?>
<?php if ($master_procedure_treatment->Treatment->Visible) { // Treatment ?>
		<th class="<?php echo $master_procedure_treatment->Treatment->headerCellClass() ?>"><span id="elh_master_procedure_treatment_Treatment" class="master_procedure_treatment_Treatment"><?php echo $master_procedure_treatment->Treatment->caption() ?></span></th>
<?php } ?>
<?php if ($master_procedure_treatment->Procedure->Visible) { // Procedure ?>
		<th class="<?php echo $master_procedure_treatment->Procedure->headerCellClass() ?>"><span id="elh_master_procedure_treatment_Procedure" class="master_procedure_treatment_Procedure"><?php echo $master_procedure_treatment->Procedure->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$master_procedure_treatment_delete->RecCnt = 0;
$i = 0;
while (!$master_procedure_treatment_delete->Recordset->EOF) {
	$master_procedure_treatment_delete->RecCnt++;
	$master_procedure_treatment_delete->RowCnt++;

	// Set row properties
	$master_procedure_treatment->resetAttributes();
	$master_procedure_treatment->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$master_procedure_treatment_delete->loadRowValues($master_procedure_treatment_delete->Recordset);

	// Render row
	$master_procedure_treatment_delete->renderRow();
?>
	<tr<?php echo $master_procedure_treatment->rowAttributes() ?>>
<?php if ($master_procedure_treatment->id->Visible) { // id ?>
		<td<?php echo $master_procedure_treatment->id->cellAttributes() ?>>
<span id="el<?php echo $master_procedure_treatment_delete->RowCnt ?>_master_procedure_treatment_id" class="master_procedure_treatment_id">
<span<?php echo $master_procedure_treatment->id->viewAttributes() ?>>
<?php echo $master_procedure_treatment->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_procedure_treatment->Treatment->Visible) { // Treatment ?>
		<td<?php echo $master_procedure_treatment->Treatment->cellAttributes() ?>>
<span id="el<?php echo $master_procedure_treatment_delete->RowCnt ?>_master_procedure_treatment_Treatment" class="master_procedure_treatment_Treatment">
<span<?php echo $master_procedure_treatment->Treatment->viewAttributes() ?>>
<?php echo $master_procedure_treatment->Treatment->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($master_procedure_treatment->Procedure->Visible) { // Procedure ?>
		<td<?php echo $master_procedure_treatment->Procedure->cellAttributes() ?>>
<span id="el<?php echo $master_procedure_treatment_delete->RowCnt ?>_master_procedure_treatment_Procedure" class="master_procedure_treatment_Procedure">
<span<?php echo $master_procedure_treatment->Procedure->viewAttributes() ?>>
<?php echo $master_procedure_treatment->Procedure->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$master_procedure_treatment_delete->Recordset->moveNext();
}
$master_procedure_treatment_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $master_procedure_treatment_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$master_procedure_treatment_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$master_procedure_treatment_delete->terminate();
?>
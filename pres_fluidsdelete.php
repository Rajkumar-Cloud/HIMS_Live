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
$pres_fluids_delete = new pres_fluids_delete();

// Run the page
$pres_fluids_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_fluids_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpres_fluidsdelete = currentForm = new ew.Form("fpres_fluidsdelete", "delete");

// Form_CustomValidate event
fpres_fluidsdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_fluidsdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_fluids_delete->showPageHeader(); ?>
<?php
$pres_fluids_delete->showMessage();
?>
<form name="fpres_fluidsdelete" id="fpres_fluidsdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_fluids_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_fluids_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_fluids">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_fluids_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_fluids->id->Visible) { // id ?>
		<th class="<?php echo $pres_fluids->id->headerCellClass() ?>"><span id="elh_pres_fluids_id" class="pres_fluids_id"><?php echo $pres_fluids->id->caption() ?></span></th>
<?php } ?>
<?php if ($pres_fluids->FORMS->Visible) { // FORMS ?>
		<th class="<?php echo $pres_fluids->FORMS->headerCellClass() ?>"><span id="elh_pres_fluids_FORMS" class="pres_fluids_FORMS"><?php echo $pres_fluids->FORMS->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_fluids_delete->RecCnt = 0;
$i = 0;
while (!$pres_fluids_delete->Recordset->EOF) {
	$pres_fluids_delete->RecCnt++;
	$pres_fluids_delete->RowCnt++;

	// Set row properties
	$pres_fluids->resetAttributes();
	$pres_fluids->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_fluids_delete->loadRowValues($pres_fluids_delete->Recordset);

	// Render row
	$pres_fluids_delete->renderRow();
?>
	<tr<?php echo $pres_fluids->rowAttributes() ?>>
<?php if ($pres_fluids->id->Visible) { // id ?>
		<td<?php echo $pres_fluids->id->cellAttributes() ?>>
<span id="el<?php echo $pres_fluids_delete->RowCnt ?>_pres_fluids_id" class="pres_fluids_id">
<span<?php echo $pres_fluids->id->viewAttributes() ?>>
<?php echo $pres_fluids->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_fluids->FORMS->Visible) { // FORMS ?>
		<td<?php echo $pres_fluids->FORMS->cellAttributes() ?>>
<span id="el<?php echo $pres_fluids_delete->RowCnt ?>_pres_fluids_FORMS" class="pres_fluids_FORMS">
<span<?php echo $pres_fluids->FORMS->viewAttributes() ?>>
<?php echo $pres_fluids->FORMS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_fluids_delete->Recordset->moveNext();
}
$pres_fluids_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_fluids_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_fluids_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pres_fluids_delete->terminate();
?>
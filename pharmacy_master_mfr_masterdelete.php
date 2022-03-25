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
$pharmacy_master_mfr_master_delete = new pharmacy_master_mfr_master_delete();

// Run the page
$pharmacy_master_mfr_master_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_master_mfr_master_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacy_master_mfr_masterdelete = currentForm = new ew.Form("fpharmacy_master_mfr_masterdelete", "delete");

// Form_CustomValidate event
fpharmacy_master_mfr_masterdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_master_mfr_masterdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_master_mfr_master_delete->showPageHeader(); ?>
<?php
$pharmacy_master_mfr_master_delete->showMessage();
?>
<form name="fpharmacy_master_mfr_masterdelete" id="fpharmacy_master_mfr_masterdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_master_mfr_master_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_master_mfr_master_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_mfr_master">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_master_mfr_master_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_master_mfr_master->CODE->Visible) { // CODE ?>
		<th class="<?php echo $pharmacy_master_mfr_master->CODE->headerCellClass() ?>"><span id="elh_pharmacy_master_mfr_master_CODE" class="pharmacy_master_mfr_master_CODE"><?php echo $pharmacy_master_mfr_master->CODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_master_mfr_master->NAME->Visible) { // NAME ?>
		<th class="<?php echo $pharmacy_master_mfr_master->NAME->headerCellClass() ?>"><span id="elh_pharmacy_master_mfr_master_NAME" class="pharmacy_master_mfr_master_NAME"><?php echo $pharmacy_master_mfr_master->NAME->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_master_mfr_master->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_master_mfr_master->id->headerCellClass() ?>"><span id="elh_pharmacy_master_mfr_master_id" class="pharmacy_master_mfr_master_id"><?php echo $pharmacy_master_mfr_master->id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_master_mfr_master_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_master_mfr_master_delete->Recordset->EOF) {
	$pharmacy_master_mfr_master_delete->RecCnt++;
	$pharmacy_master_mfr_master_delete->RowCnt++;

	// Set row properties
	$pharmacy_master_mfr_master->resetAttributes();
	$pharmacy_master_mfr_master->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_master_mfr_master_delete->loadRowValues($pharmacy_master_mfr_master_delete->Recordset);

	// Render row
	$pharmacy_master_mfr_master_delete->renderRow();
?>
	<tr<?php echo $pharmacy_master_mfr_master->rowAttributes() ?>>
<?php if ($pharmacy_master_mfr_master->CODE->Visible) { // CODE ?>
		<td<?php echo $pharmacy_master_mfr_master->CODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_mfr_master_delete->RowCnt ?>_pharmacy_master_mfr_master_CODE" class="pharmacy_master_mfr_master_CODE">
<span<?php echo $pharmacy_master_mfr_master->CODE->viewAttributes() ?>>
<?php echo $pharmacy_master_mfr_master->CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_master_mfr_master->NAME->Visible) { // NAME ?>
		<td<?php echo $pharmacy_master_mfr_master->NAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_mfr_master_delete->RowCnt ?>_pharmacy_master_mfr_master_NAME" class="pharmacy_master_mfr_master_NAME">
<span<?php echo $pharmacy_master_mfr_master->NAME->viewAttributes() ?>>
<?php echo $pharmacy_master_mfr_master->NAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_master_mfr_master->id->Visible) { // id ?>
		<td<?php echo $pharmacy_master_mfr_master->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_mfr_master_delete->RowCnt ?>_pharmacy_master_mfr_master_id" class="pharmacy_master_mfr_master_id">
<span<?php echo $pharmacy_master_mfr_master->id->viewAttributes() ?>>
<?php echo $pharmacy_master_mfr_master->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_master_mfr_master_delete->Recordset->moveNext();
}
$pharmacy_master_mfr_master_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_master_mfr_master_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_master_mfr_master_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_master_mfr_master_delete->terminate();
?>
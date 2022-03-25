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
$pharmacy_master_generic_delete = new pharmacy_master_generic_delete();

// Run the page
$pharmacy_master_generic_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pharmacy_master_generic_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpharmacy_master_genericdelete = currentForm = new ew.Form("fpharmacy_master_genericdelete", "delete");

// Form_CustomValidate event
fpharmacy_master_genericdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpharmacy_master_genericdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpharmacy_master_genericdelete.lists["x_GRPCODE"] = <?php echo $pharmacy_master_generic_delete->GRPCODE->Lookup->toClientList() ?>;
fpharmacy_master_genericdelete.lists["x_GRPCODE"].options = <?php echo JsonEncode($pharmacy_master_generic_delete->GRPCODE->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pharmacy_master_generic_delete->showPageHeader(); ?>
<?php
$pharmacy_master_generic_delete->showMessage();
?>
<form name="fpharmacy_master_genericdelete" id="fpharmacy_master_genericdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pharmacy_master_generic_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pharmacy_master_generic_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_generic">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pharmacy_master_generic_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pharmacy_master_generic->GENNAME->Visible) { // GENNAME ?>
		<th class="<?php echo $pharmacy_master_generic->GENNAME->headerCellClass() ?>"><span id="elh_pharmacy_master_generic_GENNAME" class="pharmacy_master_generic_GENNAME"><?php echo $pharmacy_master_generic->GENNAME->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_master_generic->CODE->Visible) { // CODE ?>
		<th class="<?php echo $pharmacy_master_generic->CODE->headerCellClass() ?>"><span id="elh_pharmacy_master_generic_CODE" class="pharmacy_master_generic_CODE"><?php echo $pharmacy_master_generic->CODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_master_generic->GRPCODE->Visible) { // GRPCODE ?>
		<th class="<?php echo $pharmacy_master_generic->GRPCODE->headerCellClass() ?>"><span id="elh_pharmacy_master_generic_GRPCODE" class="pharmacy_master_generic_GRPCODE"><?php echo $pharmacy_master_generic->GRPCODE->caption() ?></span></th>
<?php } ?>
<?php if ($pharmacy_master_generic->id->Visible) { // id ?>
		<th class="<?php echo $pharmacy_master_generic->id->headerCellClass() ?>"><span id="elh_pharmacy_master_generic_id" class="pharmacy_master_generic_id"><?php echo $pharmacy_master_generic->id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pharmacy_master_generic_delete->RecCnt = 0;
$i = 0;
while (!$pharmacy_master_generic_delete->Recordset->EOF) {
	$pharmacy_master_generic_delete->RecCnt++;
	$pharmacy_master_generic_delete->RowCnt++;

	// Set row properties
	$pharmacy_master_generic->resetAttributes();
	$pharmacy_master_generic->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pharmacy_master_generic_delete->loadRowValues($pharmacy_master_generic_delete->Recordset);

	// Render row
	$pharmacy_master_generic_delete->renderRow();
?>
	<tr<?php echo $pharmacy_master_generic->rowAttributes() ?>>
<?php if ($pharmacy_master_generic->GENNAME->Visible) { // GENNAME ?>
		<td<?php echo $pharmacy_master_generic->GENNAME->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_generic_delete->RowCnt ?>_pharmacy_master_generic_GENNAME" class="pharmacy_master_generic_GENNAME">
<span<?php echo $pharmacy_master_generic->GENNAME->viewAttributes() ?>>
<?php echo $pharmacy_master_generic->GENNAME->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_master_generic->CODE->Visible) { // CODE ?>
		<td<?php echo $pharmacy_master_generic->CODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_generic_delete->RowCnt ?>_pharmacy_master_generic_CODE" class="pharmacy_master_generic_CODE">
<span<?php echo $pharmacy_master_generic->CODE->viewAttributes() ?>>
<?php echo $pharmacy_master_generic->CODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_master_generic->GRPCODE->Visible) { // GRPCODE ?>
		<td<?php echo $pharmacy_master_generic->GRPCODE->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_generic_delete->RowCnt ?>_pharmacy_master_generic_GRPCODE" class="pharmacy_master_generic_GRPCODE">
<span<?php echo $pharmacy_master_generic->GRPCODE->viewAttributes() ?>>
<?php echo $pharmacy_master_generic->GRPCODE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pharmacy_master_generic->id->Visible) { // id ?>
		<td<?php echo $pharmacy_master_generic->id->cellAttributes() ?>>
<span id="el<?php echo $pharmacy_master_generic_delete->RowCnt ?>_pharmacy_master_generic_id" class="pharmacy_master_generic_id">
<span<?php echo $pharmacy_master_generic->id->viewAttributes() ?>>
<?php echo $pharmacy_master_generic->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pharmacy_master_generic_delete->Recordset->moveNext();
}
$pharmacy_master_generic_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pharmacy_master_generic_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pharmacy_master_generic_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pharmacy_master_generic_delete->terminate();
?>
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
$pres_quantity_delete = new pres_quantity_delete();

// Run the page
$pres_quantity_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$pres_quantity_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fpres_quantitydelete = currentForm = new ew.Form("fpres_quantitydelete", "delete");

// Form_CustomValidate event
fpres_quantitydelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpres_quantitydelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $pres_quantity_delete->showPageHeader(); ?>
<?php
$pres_quantity_delete->showMessage();
?>
<form name="fpres_quantitydelete" id="fpres_quantitydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($pres_quantity_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $pres_quantity_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="pres_quantity">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($pres_quantity_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($pres_quantity->id->Visible) { // id ?>
		<th class="<?php echo $pres_quantity->id->headerCellClass() ?>"><span id="elh_pres_quantity_id" class="pres_quantity_id"><?php echo $pres_quantity->id->caption() ?></span></th>
<?php } ?>
<?php if ($pres_quantity->Quantity->Visible) { // Quantity ?>
		<th class="<?php echo $pres_quantity->Quantity->headerCellClass() ?>"><span id="elh_pres_quantity_Quantity" class="pres_quantity_Quantity"><?php echo $pres_quantity->Quantity->caption() ?></span></th>
<?php } ?>
<?php if ($pres_quantity->Value->Visible) { // Value ?>
		<th class="<?php echo $pres_quantity->Value->headerCellClass() ?>"><span id="elh_pres_quantity_Value" class="pres_quantity_Value"><?php echo $pres_quantity->Value->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$pres_quantity_delete->RecCnt = 0;
$i = 0;
while (!$pres_quantity_delete->Recordset->EOF) {
	$pres_quantity_delete->RecCnt++;
	$pres_quantity_delete->RowCnt++;

	// Set row properties
	$pres_quantity->resetAttributes();
	$pres_quantity->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$pres_quantity_delete->loadRowValues($pres_quantity_delete->Recordset);

	// Render row
	$pres_quantity_delete->renderRow();
?>
	<tr<?php echo $pres_quantity->rowAttributes() ?>>
<?php if ($pres_quantity->id->Visible) { // id ?>
		<td<?php echo $pres_quantity->id->cellAttributes() ?>>
<span id="el<?php echo $pres_quantity_delete->RowCnt ?>_pres_quantity_id" class="pres_quantity_id">
<span<?php echo $pres_quantity->id->viewAttributes() ?>>
<?php echo $pres_quantity->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_quantity->Quantity->Visible) { // Quantity ?>
		<td<?php echo $pres_quantity->Quantity->cellAttributes() ?>>
<span id="el<?php echo $pres_quantity_delete->RowCnt ?>_pres_quantity_Quantity" class="pres_quantity_Quantity">
<span<?php echo $pres_quantity->Quantity->viewAttributes() ?>>
<?php echo $pres_quantity->Quantity->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($pres_quantity->Value->Visible) { // Value ?>
		<td<?php echo $pres_quantity->Value->cellAttributes() ?>>
<span id="el<?php echo $pres_quantity_delete->RowCnt ?>_pres_quantity_Value" class="pres_quantity_Value">
<span<?php echo $pres_quantity->Value->viewAttributes() ?>>
<?php echo $pres_quantity->Value->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$pres_quantity_delete->Recordset->moveNext();
}
$pres_quantity_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $pres_quantity_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$pres_quantity_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$pres_quantity_delete->terminate();
?>
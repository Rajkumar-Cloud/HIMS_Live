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
$mas_pharmacy_delete = new mas_pharmacy_delete();

// Run the page
$mas_pharmacy_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$mas_pharmacy_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fmas_pharmacydelete = currentForm = new ew.Form("fmas_pharmacydelete", "delete");

// Form_CustomValidate event
fmas_pharmacydelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fmas_pharmacydelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fmas_pharmacydelete.lists["x_status"] = <?php echo $mas_pharmacy_delete->status->Lookup->toClientList() ?>;
fmas_pharmacydelete.lists["x_status"].options = <?php echo JsonEncode($mas_pharmacy_delete->status->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $mas_pharmacy_delete->showPageHeader(); ?>
<?php
$mas_pharmacy_delete->showMessage();
?>
<form name="fmas_pharmacydelete" id="fmas_pharmacydelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($mas_pharmacy_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $mas_pharmacy_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="mas_pharmacy">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($mas_pharmacy_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($mas_pharmacy->id->Visible) { // id ?>
		<th class="<?php echo $mas_pharmacy->id->headerCellClass() ?>"><span id="elh_mas_pharmacy_id" class="mas_pharmacy_id"><?php echo $mas_pharmacy->id->caption() ?></span></th>
<?php } ?>
<?php if ($mas_pharmacy->name->Visible) { // name ?>
		<th class="<?php echo $mas_pharmacy->name->headerCellClass() ?>"><span id="elh_mas_pharmacy_name" class="mas_pharmacy_name"><?php echo $mas_pharmacy->name->caption() ?></span></th>
<?php } ?>
<?php if ($mas_pharmacy->amount->Visible) { // amount ?>
		<th class="<?php echo $mas_pharmacy->amount->headerCellClass() ?>"><span id="elh_mas_pharmacy_amount" class="mas_pharmacy_amount"><?php echo $mas_pharmacy->amount->caption() ?></span></th>
<?php } ?>
<?php if ($mas_pharmacy->charged_date->Visible) { // charged_date ?>
		<th class="<?php echo $mas_pharmacy->charged_date->headerCellClass() ?>"><span id="elh_mas_pharmacy_charged_date" class="mas_pharmacy_charged_date"><?php echo $mas_pharmacy->charged_date->caption() ?></span></th>
<?php } ?>
<?php if ($mas_pharmacy->status->Visible) { // status ?>
		<th class="<?php echo $mas_pharmacy->status->headerCellClass() ?>"><span id="elh_mas_pharmacy_status" class="mas_pharmacy_status"><?php echo $mas_pharmacy->status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$mas_pharmacy_delete->RecCnt = 0;
$i = 0;
while (!$mas_pharmacy_delete->Recordset->EOF) {
	$mas_pharmacy_delete->RecCnt++;
	$mas_pharmacy_delete->RowCnt++;

	// Set row properties
	$mas_pharmacy->resetAttributes();
	$mas_pharmacy->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$mas_pharmacy_delete->loadRowValues($mas_pharmacy_delete->Recordset);

	// Render row
	$mas_pharmacy_delete->renderRow();
?>
	<tr<?php echo $mas_pharmacy->rowAttributes() ?>>
<?php if ($mas_pharmacy->id->Visible) { // id ?>
		<td<?php echo $mas_pharmacy->id->cellAttributes() ?>>
<span id="el<?php echo $mas_pharmacy_delete->RowCnt ?>_mas_pharmacy_id" class="mas_pharmacy_id">
<span<?php echo $mas_pharmacy->id->viewAttributes() ?>>
<?php echo $mas_pharmacy->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_pharmacy->name->Visible) { // name ?>
		<td<?php echo $mas_pharmacy->name->cellAttributes() ?>>
<span id="el<?php echo $mas_pharmacy_delete->RowCnt ?>_mas_pharmacy_name" class="mas_pharmacy_name">
<span<?php echo $mas_pharmacy->name->viewAttributes() ?>>
<?php echo $mas_pharmacy->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_pharmacy->amount->Visible) { // amount ?>
		<td<?php echo $mas_pharmacy->amount->cellAttributes() ?>>
<span id="el<?php echo $mas_pharmacy_delete->RowCnt ?>_mas_pharmacy_amount" class="mas_pharmacy_amount">
<span<?php echo $mas_pharmacy->amount->viewAttributes() ?>>
<?php echo $mas_pharmacy->amount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_pharmacy->charged_date->Visible) { // charged_date ?>
		<td<?php echo $mas_pharmacy->charged_date->cellAttributes() ?>>
<span id="el<?php echo $mas_pharmacy_delete->RowCnt ?>_mas_pharmacy_charged_date" class="mas_pharmacy_charged_date">
<span<?php echo $mas_pharmacy->charged_date->viewAttributes() ?>>
<?php echo $mas_pharmacy->charged_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($mas_pharmacy->status->Visible) { // status ?>
		<td<?php echo $mas_pharmacy->status->cellAttributes() ?>>
<span id="el<?php echo $mas_pharmacy_delete->RowCnt ?>_mas_pharmacy_status" class="mas_pharmacy_status">
<span<?php echo $mas_pharmacy->status->viewAttributes() ?>>
<?php echo $mas_pharmacy->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$mas_pharmacy_delete->Recordset->moveNext();
}
$mas_pharmacy_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $mas_pharmacy_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$mas_pharmacy_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$mas_pharmacy_delete->terminate();
?>